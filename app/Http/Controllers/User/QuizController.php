<?php

/**
 * File name: QuizController.php
 * Last modified: 18/07/21, 12:11 AM
 * Author: NearCraft - https://codecanyon.net/user/nearcraft
 * Copyright (c) 2021
 */

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Platform\QuizUpdateAnswerRequest;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\QuizSession;
use App\Repositories\QuestionRepository;
use App\Repositories\UserQuizRepository;
use App\Repositories\ColorsRepository;
use App\Settings\LocalizationSettings;
use App\Settings\SiteSettings;
use App\Transformers\Admin\QuizScoreReportTransformer;
use App\Transformers\Platform\QuizDetailTransformer;
use App\Transformers\Platform\QuizQuestionTransformer;
use App\Transformers\Platform\QuizSolutionTransformer;
use App\Transformers\Platform\TopScorerTransformer;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    private UserQuizRepository $repository;
    private QuestionRepository $questionRepository;
    private $chart_colors;# 0 index for correct answer , 1 index for wrong answer and 2 index for unanswered questions ,

    public function __construct(UserQuizRepository $repository, QuestionRepository $questionRepository,ColorsRepository $colors)
    {
        $this->middleware(['role:guest|student|employee|parent|teacher']);
        $this->repository = $repository;
        $this->questionRepository = $questionRepository;
        $this->chart_colors = [
            $colors->getPositiveColor(),
            $colors->getNegativeColor(),
            $colors->getNeutralColor(),
            "transparent"=>[
                $colors->transparent()["positive_color"],
                $colors->transparent()["negative_color"],
                $colors->transparent()["neutral_color"],
            ]
        ];
    }

    /**
     * Load Quiz Instructions Page
     *
     * @param $slug
     * @return \Inertia\Response
     */
    public function instructions($slug)
    {
        $quiz = Quiz::where('slug', $slug)
            ->published()
            ->isPublic()
            ->with(['subCategory:id,name', 'quizType:id,name'])
            ->withCount(['sessions' => function ($query) {
                $query->where('user_id', auth()->user()->id)->where('status', '=', 'started');
            }])
            ->firstOrFail();
            
        $quiz_schedule = DB::table('quiz_schedules')->where('quiz_id', $quiz->id)->where('status', '=', "active")->first();
        $now = Carbon::now()->toDateTimeString();

        return view('User/QuizInstructions', [ 
            'quiz' => fractal($quiz, new QuizDetailTransformer())->toArray()['data'],
            'instructions' => $this->repository->getInstructions($quiz),
            'subscription' => request()->user()->hasActiveSubscription(request()->user()->id),
            'cutoff' => $quiz['settings']['cutoff'],
            'setting' => $quiz['settings'],
            'quiz_schedule' => $quiz_schedule,
            'now' => $now
        ]);
    }

    /**
     * Create or Load a Quiz Session and redirect to quiz screen
     *
     * @param Quiz $quiz
     * @return \Illuminate\Http\RedirectResponse
     */
    public function initQuiz(Quiz $quiz)
    {
        $subscription = request()->user()->hasActiveSubscription(request()->user()->id);

        // load completed quiz sessions
        $loadCount = $quiz->loadCount(['sessions' => function ($query) {
            $query->where('user_id', auth()->user()->id)->where('status', 'completed');
        }]);
        if($loadCount->sessions_count > 0){
            $session = QuizSession::where('quiz_id', $quiz->id)->where('user_id', auth()->user()->id)->first();
            return redirect()->route('quiz_results', ['quiz' => $quiz->slug, 'session' => $session->code]);   
        } else {
            // check if any uncompleted sessions
            if ($quiz->sessions()->where('user_id', auth()->user()->id)->where('status', '=', 'started')->count() > 0) {
                $session = $this->repository->getSession($quiz);
            } else {
                // check restricted attempts
                if ($quiz->settings->get('restrict_attempts')) {
                    if ($quiz->sessions_count >= $quiz->settings->get('no_of_attempts')) {
                        return redirect()->back()->with('errorMessage', __('max_attempts_text'));
                    }
                }

                if ($quiz->is_paid && !$subscription) {
                    // check redeem eligibility
                    if ($quiz->can_redeem) {
                        if (auth()->user()->balance < $quiz->points_required) {
                            $msg = __('insufficient_points') . ' ' . str_replace('--', auth()->user()->balance . ' XP', __('wallet_balance_text')) . ' ' . str_replace('--', $quiz->points_required . ' XP', __('required_points_are'));
                            return redirect()->back()->with('errorMessage', $msg);
                        }
                    } else {
                        return redirect()->back()->with('errorMessage', __('You don\'t have an active plan to access this content. Please subscribe.'));
                    }
                }

                $session = $this->repository->createSession($quiz, $this->questionRepository);

                // deduct wallet points in case of not having a subscription for a paid quiz
                if ($session) {
                    if ($quiz->is_paid && !$subscription && $quiz->can_redeem) {
                        auth()->user()->withdraw($quiz->points_required, [
                            'session' => $session->code,
                            'description' => 'Attempt of Quiz ' . $quiz->title,
                        ]);
                    }
                }
            }
            return redirect()->route('go_to_quiz', ['quiz' => $quiz->slug, 'session' => $session->code]);   
        }
    }

    /**
     * Go To Quiz Screen
     *
     * @param Quiz $quiz
     * @param $session
     * @return \Illuminate\Http\RedirectResponse|\Inertia\Response
     */
    public function goToQuiz(Quiz $quiz, $session)
    {
        $session = QuizSession::with('questions')->where('code', $session)->firstOrFail();

        $now = Carbon::now();

        $remainingTime =  $now->diffInSeconds($session->ends_at, false);

        if ($session->status !== 'completed' && $remainingTime < 15) {
            $session->results = $this->repository->sessionResults($session, $quiz);
            $session->status = 'completed';
            $session->completed_at = Carbon::now()->toDateTimeString();
            $session->update();

            return redirect()->route('quiz_thank_you', ['quiz' => $quiz->slug, 'session' => $session->code]);
        }
        $questions = fractal(
            $session->questions()->with(['questionType:id,name,code', 'skill:id,name', 'comprehensionPassage:id,body'])
                ->orderBy('sno')
                ->get(),
            new QuizQuestionTransformer()
        )->toArray()['data'];
        return view('User/QuizScreen', [
            'quiz' => $quiz->only('code', 'title', 'slug', 'total_questions', 'settings'),
            'questions' => $questions,
            'session' => $session,
            'remainingTime' => $remainingTime,
            'totalQuestions' => count($questions),
            'answeredQuestions' => $session->questions()->wherePivotIn('status', ['answered', 'not_answered'])->count(),
            'answered_mark_for_review' => $session->questions()->wherePivotIn('status', ['answered_mark_for_review'])->count(),
            'mark_for_review' => $session->questions()->wherePivotIn('status', ['mark_for_review'])->count(),
        ]);
    }

    /**
     * Get quiz questions api endpoint
     *
     * @param Quiz $quiz
     * @param $session
     * @return \Illuminate\Http\JsonResponse
     */
    public function getQuizQuestions(Quiz $quiz, $session)
    {
        $session = QuizSession::with('questions')->where('code', $session)->firstOrFail();

        $questions = fractal(
            $session->questions()->with(['questionType:id,name,code', 'skill:id,name', 'comprehensionPassage:id,body'])
                ->orderBy('sno')
                ->get(),
            new QuizQuestionTransformer()
        )->toArray();

        return response()->json([
            'questions' => $questions['data'],
        ], 200);
    }

    /**
     * Check the user submitted answer is correct or not and update session accordingly
     *
     * @param QuizUpdateAnswerRequest $request
     * @param Quiz $quiz
     * @param $session
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateAnswer(QuizUpdateAnswerRequest $request, Quiz $quiz, $session)
    {
        $session = QuizSession::select(['id', 'code', 'quiz_id', 'total_time_taken', 'current_question'])
            ->where('code', $session)
            ->firstOrFail();

        if ($session->status == 'completed') {
            return response()->json([
                'total' => $session->questions()->count(),
                'answered' => $session->questions()->wherePivotIn('status', ['answered', 'not_answered'])->count()
            ], 200);
        }

        $question = Question::select(['id', 'question', 'options', 'correct_answer', 'default_marks', 'solution', 'question_type_id'])
            ->with(['questionType:id,name,code'])
            ->where('code', $request->question_id)
            ->firstOrFail();

        $isCorrect = false;
        $correctAnswer = null;
        $marksEarned = 0;
        $marksDeducted = 0;

        if ($request->status === 'answered' || $request->status === 'answered_mark_for_review') {
            $isCorrect = $this->questionRepository->evaluateAnswer($question, $request->user_answer);

            // Calculate Positive & Negative Marks based on preferences
            $marks = $quiz->settings->get('auto_grading', true) ? $question->default_marks : $quiz->settings->get('correct_marks');
            if ($isCorrect) {
                $marksEarned = $marks;
            } else {
                if ($quiz->settings->get('enable_negative_marking', false)) {
                    if ($quiz->settings->get('negative_marking_type', 'fixed') == 'fixed') {
                        $marksDeducted = $quiz->settings->get('negative_marks', 0);
                    } else {
                        $marksDeducted = $quiz->settings->get('negative_marks', 0) != 0 ? round(($marks * $quiz->settings->get('negative_marks', 0))  / 100, 2) : 0;
                    }
                }
            }
        }

        /*Insert or Update Session Question*/
        DB::table('quiz_session_questions')->upsert(
            [
                'question_id' => $question->id,
                'original_question' => formatQuestionProperty($question->question, $question->questionType->code),
                'quiz_session_id' => $session->id,
                'user_answer' => serialize($request->user_answer),
                'time_taken' => $request->time_taken,
                'is_correct' => $isCorrect,
                'status' => $request->status,
                'marks_earned' => $marksEarned,
                'marks_deducted' => $marksDeducted
            ],
            ['question_id', 'quiz_session_id'],
            ['user_answer', 'time_taken', 'is_correct', 'status', 'marks_earned', 'marks_deducted']
        );

        /*Update Session */
        $session->current_question = $request->current_question;
        $session->total_time_taken = $request->total_time_taken;
        $session->update();

        return response()->json([
            'total' => $session->questions()->count(),
            'answered' => $session->questions()->wherePivotIn('status', ['answered', 'not_answered'])->count(),
            'answered_mark_for_review' => $session->questions()->wherePivotIn('status', ['answered_mark_for_review'])->count(),
            'mark_for_review' => $session->questions()->wherePivotIn('status', ['mark_for_review'])->count(),
        ], 200);
    }

    /**
     * Finish the quiz
     *
     * @param Quiz $quiz
     * @param $session
     * @return \Illuminate\Http\RedirectResponse
     */
    public function finish(Quiz $quiz, $session)
    {
        $session = QuizSession::with('questions')->where('code', $session)->firstOrFail();
        if ($session->status == 'completed') {
            return [
                'success' => true,
                'quiz' => $quiz->slug, 
                'session' => $session->code
            ];
        }
        $session->results = $this->repository->sessionResults($session, $quiz);
        $session->status = 'completed';
        $session->completed_at = Carbon::now()->toDateTimeString();
        $session->update();
        return [
            'success' => true,
            'quiz' => $quiz->slug, 
            'session' => $session->code
        ];
    }

    /**
     * Quiz thank you screen
     *
     * @param Quiz $quiz
     * @param $session
     * @return \Inertia\Response
     */
    public function thankYou(Quiz $quiz, $session)
    {
        $session = QuizSession::where('code', $session)->firstOrFail();

        return view('User/QuizThanksScreen', [
            'quiz' => $quiz->only('code', 'title', 'slug', 'total_marks'),
            'session' => $session,
        ]);
    }

    /**
     * Quiz Session Analysis and Progress Status
     *
     * @param Quiz $quiz
     * @param $session
     * @return \Inertia\Response
     */
    public function results(Quiz $quiz, $session)
    {
        $session = QuizSession::where('code', $session)->firstOrFail();
        if (session()->has("selected_child")) {
            $childName = session("selected_child")["name"];
        } else {
            $childName = '';
        }
        return view('User/QuizResults/Analysis', [
            "chartColors"=>$this->chart_colors,
            'quiz' => $quiz->only('code', 'title', 'slug', 'total_questions', 'total_marks', 'settings'),
            'session' => $session->only('code', 'total_time_taken', 'results', 'status'),
            'steps' => $this->repository->getQuizProgressLinks($quiz->slug, $session->code, 'quiz_results'),
            "childName" => $childName
        ]);
    }

    /**
     * Quiz session solutions page
     *
     * @param Quiz $quiz
     * @param $session
     * @return \Inertia\Response
     */
    public function solutions(Quiz $quiz, $session)
    {
        $session = QuizSession::where('code', $session)->firstOrFail();
        if (session()->has("selected_child")) {
            $childName = session("selected_child")["name"];
        } else {
            $childName = '';
        }
        return view('User/QuizResults/Solutions', [
            "chartColors"=>$this->chart_colors,
            'quiz' => $quiz->only('code', 'title', 'slug', 'total_questions', 'total_marks', 'settings'),
            'session' => $session->only('code', 'total_time_taken', 'results', 'status'),
            'steps' => $this->repository->getQuizProgressLinks($quiz->slug, $session->code, 'quiz_solutions'),
            'childName' => $childName,
            'questions' => $questions = fractal(
                $session->questions()->with(['questionType:id,name,code', 'skill:id,name'])
                    ->orderBy('sno')->get(['id', 'code', 'question', 'question_type_id', 'skill_id', 'solution', 'solution_video']),
                new QuizSolutionTransformer()
            )->toArray()
        ]);
    }

    /**
     * Get quiz solutions api endpoint
     *
     * @param Quiz $quiz
     * @param $session
     * @return \Illuminate\Http\JsonResponse
     */
    public function fetchSolutions(Quiz $quiz, $session)
    {
        $session = QuizSession::where('code', $session)->firstOrFail();

        $questions = fractal(
            $session->questions()->with(['questionType:id,name,code', 'skill:id,name'])
                ->orderBy('sno')->get(['id', 'code', 'question', 'question_type_id', 'skill_id', 'solution', 'solution_video']),
            new QuizSolutionTransformer()
        )->toArray();

        return response()->json([
            'questions' => $questions['data'],
        ], 200);
    }

    /**
     * Quiz Session Leaderboard
     *
     * @param Quiz $quiz
     * @param $session
     * @return \Inertia\Response
     */
    public function leaderboard(Quiz $quiz, $session)
    {
        $session = QuizSession::where('code', $session)->firstOrFail();

        $key = $session->quiz_schedule_id ? 'quiz_schedule_id' : 'quiz_id';
        $value = $session->quiz_schedule_id ? $session->quiz_schedule_id : $quiz->id;

        $topScorers = QuizSession::select('user_id', 'quiz_id')
            ->with('user:id,first_name,last_name')
            ->selectRaw("max(CAST(JSON_EXTRACT(`results`, \"$.score\") AS DECIMAL(10,6))) as high_score")
            ->selectRaw("max(CAST(JSON_EXTRACT(`results`, \"$.percentage\") AS DECIMAL(10,6))) as high_percentage")
            ->where($key, $value)
            ->groupBy('user_id', 'quiz_id')
            ->orderBy('high_score', 'desc')
            ->get();
        if (session()->has("selected_child")) {
            $childName = session("selected_child")["name"];
        } else {
            $childName = '';
        }
        return view('User/QuizResults/LeaderBoard', [
            'quiz' => $quiz->only('code', 'title', 'slug', 'total_questions', 'total_marks', 'settings'),
            'session' => $session->only('code', 'total_time_taken', 'results', 'status'),
            'topScorers' => fractal($topScorers, new TopScorerTransformer())->toArray()['data'],
            'steps' => $this->repository->getQuizProgressLinks($quiz->slug, $session->code, 'quiz_leaderboard'),
            "childName" => $childName, "user_id" => $session->user_id,
        ]);
    }

    /**
     * User Quiz Session Export PDF
     *
     * @param Quiz $quiz
     * @param $session
     * @param LocalizationSettings $localization
     * @param SiteSettings $settings
     * @return \Illuminate\Http\Response
     */
    public function exportPDF(Quiz $quiz, $session, LocalizationSettings $localization, SiteSettings $settings)
    {
        $session = QuizSession::with('user')->where('code', $session)->firstOrFail();

        $now = Carbon::now()->timezone($localization->default_timezone);
        $user = auth()->user()->first_name . ' ' . auth()->user()->last_name;
        $pdf = PDF::loadView('pdf.quiz-session-report', [
            'quiz' => $quiz->only('code', 'title'),
            'session' => fractal($session, new QuizScoreReportTransformer())->toArray()['data'],
            'footer' => "* Report Generated from {$settings->app_name} by {$user} on {$now->toDayDateTimeString()}",
            'logo' => url('storage/' . $settings->logo_path),
            'rtl' => $localization->default_direction == 'rtl'
        ]);

        return $pdf->download("report-{$session->code}.pdf");
    }
}
