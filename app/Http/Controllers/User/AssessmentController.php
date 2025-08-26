<?php

/**
 * File name: ExamController.php
 * Last modified: 18/07/21, 12:11 AM
 * Author: NearCraft - https://codecanyon.net/user/nearcraft
 * Copyright (c) 2021
 */

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Platform\AssessmentUpdateAnswerRequest;
use App\Models\AssessmentTest;
use App\Models\AssessmentTestSections;
use App\Models\AssessmentTestSession;
use App\Models\PracticeSession;
use App\Models\Question;
use App\Models\Skill;
use App\Repositories\ColorsRepository;
use App\Repositories\QuestionRepository;
use App\Repositories\UserAssessmentRepository;
use App\Settings\LocalizationSettings;
use App\Settings\SiteSettings;
use App\Transformers\Admin\AssessmentScoreReportTransformer;
use App\Transformers\Platform\AssessmentDetailTransformer;
use App\Transformers\Platform\AssessmentQuestionTransformer;
use App\Transformers\Platform\AssessmentResultSectionTransformer;
use App\Transformers\Platform\AssessmentSessionSectionTransformer;
use App\Transformers\Platform\AssessmentSolutionTransformer;
use App\Transformers\Platform\QuizSolutionTransformer;
use App\Transformers\Platform\TopScorerTransformer;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class AssessmentController extends Controller
{
    private UserAssessmentRepository $repository;
    private QuestionRepository $questionRepository;
    private $chart_colors;# 0 index for correct answer , 1 index for wrong answer and 2 index for unanswered questions ,

    public function __construct(UserAssessmentRepository $repository, QuestionRepository $questionRepository,ColorsRepository $colors)
    {

        $this->middleware(['role:guest|student|employee|parent']);
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
     * Load AssessmentTest Instructions Page
     *
     * @param $slug
     * @return \Inertia\Response
     */
    public function instructions($slug)
    {
        $assessment = AssessmentTest::where('slug', $slug)
            ->with(['subCategory:id,name', 'assessmentType:id,name', 'assessmentSections:id,assessment_id,name,total_questions,total_duration,total_marks'])
            ->withCount(['sessions' => function ($query) {
                $query->where('user_id', auth()->user()->id)->where('status', '=', 'started');
            }])
            ->firstOrFail();

        return Inertia::render('User/AssessmentInstructions', [
            'assessment' => fractal($assessment, new AssessmentDetailTransformer())->toArray()['data'],
            'instructions' => $this->repository->getInstructions($assessment),
            'subscription' => request()->user()->hasActiveSubscription(request()->user()->id),
        ]);
    }

    /**
     * Create or Load a AssessmentTest Session and redirect to assessment screen
     *
     * @param AssessmentTest $assessment
     * @return \Illuminate\Http\RedirectResponse
     */
    public function initAssessment($s_id)
    {
        $assessment = AssessmentTest::where('section_id',$s_id)->with("sessions")->get();
        // load completed assessment sessions
        $assessment->loadCount(['sessions' => function ($query) {
            $query->where('user_id', auth()->user()->id)->where('status', 'completed');
        }]);
        // check if any uncompleted sessions
        if ($assessment[0]->sessions()->where('user_id', auth()->user()->id)->where('status', '=', 'started')->count() > 0) {
            $session = $this->repository->getSession($assessment[0]);
        } else {
            // check restricted attempt
            if ($assessment[0]->settings->get('restrict_attempts')) {
                if ($assessment->sessions_count >= $assessment->settings->get('no_of_attempts')) {
                    return redirect()->back()->with('errorMessage', __('max_attempts_text'));
                }
            }

            $session = $this->repository->createSession($assessment[0], $this->questionRepository);
            // dd($session);
            // deduct wallet points in case of not having a subscription for a paid assessment
            // if ($session) {
            //     if ($assessment->is_paid && !$subscription && $assessment->can_redeem) {
            //         auth()->user()->withdraw($assessment->points_required, [
            //             'session' => $session->code,
            //             'description' => 'Attempt of Assessment ' . $assessment->title,
            //         ]);
            //     }
            // }
        }

        return redirect()->route('go_to_assessment', ['assessment' => $assessment[0]->slug, 'session' => $session->code]);
    }

    /**
     * Go To Assessment Screen
     *
     * @param AssessmentTest $assessment
     * @param $session
     * @return \Illuminate\Http\RedirectResponse|\Inertia\Response
     */
    public function goToAssessment(AssessmentTest $assessment, $session)
    {
        $session = AssessmentTestSession::with('sections', 'questions')->where('code', $session)->firstOrFail();
        $now = Carbon::now();

        $remainingTime =  $now->diffInSeconds($session->ends_at);

        // dd($remainingTime);
        // dd($session->results = $this->repository->sessionResults($session, $assessment));
        if ($session->status !== 'completed' && $remainingTime < 15) {
            $session->results = $this->repository->sessionResults($session, $assessment);
            $session->status = 'completed';
            $session->completed_at = Carbon::now()->toDateTimeString();
            $session->update();

            return redirect()->route('assessment_thank_you', ['assessment' => $assessment->slug, 'session' => $session->code]);
        }
        // dd(fractal($session->sections, new AssessmentSessionSectionTransformer())->toArray()['data']);
        // dd($session);
        // dd($session->sections);
        // dd(fractal($session->sections, new AssessmentSessionSectionTransformer())->toArray()['data']);

        return Inertia::render('User/AssessmentScreen', [
            'assessment' => $assessment->only('code', 'title', 'slug', 'total_questions', 'settings'),
            'session' => $session,
            'assessmentSections' => fractal($session->sections, new AssessmentSessionSectionTransformer())->toArray()['data'],
            'remainingTime' => $remainingTime,
            "chartColors" => $this->chart_colors,
        ]);
    }

    /**
     * Get assessment section questions api endpoint
     *
     * @param AssessmentTest $assessment
     * @param $session
     * @param $section
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAssessmentSectionQuestions(AssessmentTest $assessment, $session, $section)
    {
        $session = AssessmentTestSession::with(['questions', 'sections'])->where('code', $session)->firstOrFail();

        $now = Carbon::now();
        $assessmentSection = $session->sections()->wherePivot('assessment_section_id', $section)->first();
        $remainingTime =  $now->diffInSeconds($assessmentSection->pivot->ends_at, false);
        // dd($remainingTime);
        $questions = fractal(
            $session->questions()->with(['questionType:id,name,code','comprehensionPassage:id,body'])
                ->withPivot('assessment_section_id', 'sno')
                ->where('assessment_section_id', $section)
                ->orderBy('sno')
                ->get(),
            new AssessmentQuestionTransformer()
        )->toArray();

        return response()->json([
            'questions' => $questions['data'],
            'answered' => $session->questions()->wherePivot('assessment_section_id', $section)->wherePivotIn('status', ['answered', 'answered_mark_for_review'])->count(),
            'remainingTime' => $remainingTime
        ], 200);
    }

    /**
     * Check the user submitted answer is correct or not and update session accordingly
     *
     * @param AssessmentUpdateAnswerRequest $request
     * @param AssessmentTest $assessment
     * @param $session
     * @param $section
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateAnswer(AssessmentUpdateAnswerRequest $request, AssessmentTest $assessment, $session, AssessmentTestSections $section)
    {
        $session = AssessmentTestSession::select(['id', 'code', 'assessment_id', 'total_time_taken', 'current_section'])
            ->where('code', $session)
            ->firstOrFail();

        if ($session->status == 'completed') {
            return response()->json([
                'answered' => $session->questions()->wherePivotIn('status', ['answered', 'answered_mark_for_review'])->count()
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
            $marks = $assessment->settings->get('auto_grading', true) ? $question->default_marks : $section->correct_marks;
            if ($isCorrect) {
                $marksEarned = $marks;
            } else {
                if ($assessment->settings->get('enable_negative_marking', false)) {
                    if ($section->negative_marking_type == 'fixed') {
                        $marksDeducted = $section->negative_marks;
                    } else {
                        $marksDeducted = $section->negative_marks != 0 ? round(($marks * $section->negative_marks)  / 100, 2) : 0;
                    }
                }
            }
        }

        /*Insert or Update Session Question*/

        DB::table('assessment_test_session_questions')->upsert(
            [
                'question_id' => $question->id,
                'original_question' => formatQuestionProperty($question->question, $question->questionType->code),
                'assessment_session_id' => $session->id,
                'assessment_section_id' => $section->id,
                'user_answer' => serialize($request->user_answer),
                'time_taken' => $request->time_taken,
                'is_correct' => $isCorrect,
                'status' => $request->status,
                'marks_earned' => $marksEarned,
                'marks_deducted' => $marksDeducted
            ],
            ['question_id', 'assessment_session_id', 'assessment_section_id'],
            ['user_answer', 'time_taken', 'is_correct', 'status', 'marks_earned', 'marks_deducted']
        );

        /*Update Session */
        $session->current_section = $request->current_section;
        $session->current_question = $request->current_question;
        $session->total_time_taken = $request->total_time_taken;
        $session->update();

        DB::table('assessment_test_session_sections')
            ->where('assessment_section_id', $section->id)
            ->where('assessment_session_id', $session->id)
            ->update([
                'current_question' => $request->current_question,
                'total_time_taken' => $request->current_section_total_time_taken,
                'status' => 'visited'
            ]);

        return response()->json([
            'answered' => $session->questions()->wherePivot('assessment_section_id', $section->id)->wherePivotIn('status', ['answered', 'answered_mark_for_review'])->count()
        ], 200);
    }

    /**
     * Finish the assessment
     *
     * @param Request $request
     * @param AssessmentTest $assessment
     * @param $session
     * @return \Illuminate\Http\RedirectResponse
     */
    public function finish(Request $request, AssessmentTest $assessment, $session)
    {
        $session = AssessmentTestSession::with(['questions', 'sections'])->where('code', $session)->firstOrFail();

        if ($session->status == 'completed') {
            redirect()->route('assessment_thank_you', ['assessment' => $assessment->slug, 'session' => $session->code]);
        }
        // ----------------------------
// //start for Practice set
        $u_id = auth()->user()->id;
        $percentage = [];
        $arr_for_expect = [];
        // dd($assessment->section_id);
        $skills = Skill::where('section_id', $assessment->section_id)->with("practiceSets")->get();
        foreach ($skills as $key => $value) {
            // dd($value);
            foreach ($value->practiceSets as $key => $value1) {
                $practice_session = PracticeSession::where('user_id', $u_id)->where('practice_set_id', $value1->id)->get();
                foreach ($practice_session as $key => $value2) {
                    array_push($percentage, $value2->results->accuracy);
                }
            }
        }

        $arr_len = count($percentage);
        $arr_sum = array_sum($percentage);
        $practiceaverage = $arr_sum / $arr_len;
        // dd($average);

        //end for Practice set

        //start for Mock Test
        // $mockarr = [];
        // $mtype = MockTypes::get();
        // foreach ($mtype as $key => $value) {
        //     $mock = mocks::where('mock_type_id', $value->id)->get("id");
        //     foreach ($mock as $key => $value1) {
        //         $msession = mock_sessions::where('mock_id', $value1->id)->where('user_id', $u_id)->get();
        //         foreach ($msession as $key => $value2) {
        //             array_push($mockarr,$value2->results->percentage);
        //         }
        //     }
        // }
        // $Mockarr_len = count($mockarr);
        // $Mockarr_sum = array_sum($mockarr);
        // $Mockaverage = $Mockarr_sum / $Mockarr_len;

        //end for Mock Test

        // total result
        // array_push($arr_for_expect,$practiceaverage,$Mockaverage);
        array_push($arr_for_expect,$practiceaverage);
        $expected = (array_sum($arr_for_expect) / (int)(count($arr_for_expect)."00")) * 100;
            // dd($session );
        $target_percentage = round($expected);
        // ----------------------------
        $session->total_time_taken = $request->get('total_time_taken');
        $session->status = 'completed';
        $session->section_id =  $assessment->section_id;
        $session->expected = $target_percentage;
        $session->completed_at = Carbon::now()->toDateTimeString();
        $session->update();
        // dd($session->sections);
        foreach ($session->sections as $section) {
            $results = $this->repository->sectionResults($session, $assessment, $section);
            DB::table('assessment_test_session_sections')
                ->where('assessment_section_id', $section->id)
                ->where('assessment_session_id', $session->id)
                ->update([
                    'results' => $results,
                ]);
        }

        // dd($session->results = $this->repository->sessionResults($session, $assessment));
        $session = AssessmentTestSession::with(['questions', 'sections'])->where('code', $session->code)->firstOrFail();
        $session->results = $this->repository->sessionResults($session, $assessment);
        $session->update();

        return redirect()->route('assessment_thank_you', ['assessment' => $assessment->slug, 'session' => $session->code]);
    }

    /**
     * Assesssment thank you screen
     *
     * @param AssessmentTest $assessment
     * @param $session
     * @return \Inertia\Response
     */
    public function thankYou(AssessmentTest $assessment, $session)
    {

        $session = AssessmentTestSession::where('code', $session)->firstOrFail();
        return Inertia::render('User/AssessmentThanksScreen', [
            'assessment' => $assessment->only('code', 'title', 'slug', 'total_marks'),
            'session' => $session,
        ]);
    }
    /**
     * Assessment Session Analysis and Progress Status
     *
     * @param AssessmentTest $assessment
     * @param $session
     * @return \Inertia\Response
     */
    public function results(AssessmentTest $assessment, $session)
    {
        $session = AssessmentTestSession::where('code', $session)->firstOrFail();
        if (session()->has("selected_child")) {
            $childName = session("selected_child")["name"];
        } else {
            $childName = '';
        }
        return Inertia::render('User/AssessmentResults', [
            'assessment' => $assessment->only('code', 'title', 'slug', 'total_questions', 'total_marks', 'settings'),
            "chartColors"=>$this->chart_colors,
            'session' => $session->only('code', 'total_time_taken', 'results', 'status'),
            'sections' => fractal($session->sections, new AssessmentResultSectionTransformer())->toArray()['data'],
            'steps' => $this->repository->getAssessmentProgressLinks($assessment->slug, $session->code, 'assessment_results'),
            "childName" => $childName
        ]);
    }

    /**
     * Assessment session solutions page
     *
     * @param AssessmentTest $assessment
     * @param $session
     * @return \Inertia\Response
     */
    public function solutions(AssessmentTest $assessment, $session)
    {
        $session = AssessmentTestSession::with(['sections' => function ($query) {
            $query->orderBy('assessment_test_session_sections.sno');
        }])->where('code', $session)->firstOrFail();
        // dd($session);
        if (session()->has("selected_child")) {
            $childName = session("selected_child")["name"];
        } else {
            $childName = '';
        }
        return Inertia::render('User/AssessmentSolutions', [
            'assessment' => $assessment->only('code', 'title', 'slug', 'total_questions', 'total_marks', 'settings'),
            "chartColors"=>$this->chart_colors,
            'sections' => fractal($session->sections, new AssessmentResultSectionTransformer())->toArray()['data'],
            'session' => $session->only('code', 'total_time_taken', 'results', 'status'),
            'steps' => $this->repository->getAssessmentProgressLinks($assessment->slug, $session->code, 'assessment_solutions'),
            "childName" => $childName
        ]);
    }

    /**
     * Get assesssment solutions api endpoint
     *
     * @param AssessmentTest $assessment
     * @param $session
     * @param $section
     * @return \Illuminate\Http\JsonResponse
     */
    public function fetchSolutions(AssessmentTest $assessment, $session, $section)
    {
        $session = AssessmentTestSession::where('code', $session)->firstOrFail();
        $questions = fractal(

            $session->questions()->wherePivot('assessment_section_id', $section)->with(['questionType:id,name,code'])
                ->orderBy('sno')->get(['id', 'code', 'question', 'question_type_id', 'solution', 'solution_video']),
            new AssessmentSolutionTransformer()
        )->toArray();
        return response()->json([
            'questions' => $questions['data'],
        ], 200);
    }

    /**
     * Assessment Session Leaderboard
     *
     * @param AssessmentTest $assessment
     * @param $session
     * @return \Inertia\Response
     */
    public function leaderboard(AssessmentTest $assessment, $session)
    {
        $session = AssessmentTestSession::where('code', $session)->firstOrFail();

        $key = $session->assessment_schedule_id ? 'assessment_schedule_id' : 'assessment_id';
        $value = $session->assessment_schedule_id ? $session->assessment_schedule_id : $assessment->id;

        $topScorers = AssessmentTestSession::select('user_id', 'assessment_id')
            ->with('user:id,first_name,last_name')
            ->selectRaw("max(CAST(JSON_EXTRACT(`results`, \"$.score\") AS DECIMAL(10,6))) as high_score")
            ->selectRaw("max(CAST(JSON_EXTRACT(`results`, \"$.percentage\") AS DECIMAL(10,6))) as high_percentage")
            ->where($key, $value)
            ->groupBy('user_id', 'assessment_id')
            ->orderBy('high_score', 'desc')
            ->get();
        if (session()->has("selected_child")) {
            $childName = session("selected_child")["name"];
        } else {
            $childName = '';
        }
        return Inertia::render('User/AssessmentLeaderBoard', [
            'assessment' => $assessment->only('code', 'title', 'slug', 'total_questions', 'total_marks', 'settings'),
            'session' => $session->only('code', 'total_time_taken', 'results', 'status'),
            'topScorers' => fractal($topScorers, new TopScorerTransformer())->toArray()['data'],
            'steps' => $this->repository->getAssessmentProgressLinks($assessment->slug, $session->code, 'assessment_leaderboard'),
            "childName" => $childName
        ]);
    }

    /**
     * User Assessment Session Export PDF
     *
     * @param AssessmentTest $assessment
     * @param $session
     * @param LocalizationSettings $localization 
     * @param SiteSettings $settings
     * @return \Illuminate\Http\Response
     */
    public function exportPDF(AssessmentTest $assessment, $session, LocalizationSettings $localization, SiteSettings $settings)
    {
        $session = AssessmentTestSession::with('user')->where('code', $session)->firstOrFail();

        $now = Carbon::now()->timezone($localization->default_timezone);
        $user = auth()->user()->first_name . ' ' . auth()->user()->last_name;

        $pdf = PDF::loadView('pdf.assessment-session-report', [
            'assessment' => $assessment->only('code', 'title'),
            'session' => fractal($session, new AssessmentScoreReportTransformer())->toArray()['data'],
            'footer' => "* Report Generated from {$settings->app_name} by {$user} on {$now->toDayDateTimeString()}",
            'logo' => url('storage/' . $settings->logo_path),
            'rtl' => $localization->default_direction == 'rtl',
            'isParent' => Auth::user()->hasRole("parent")
        ]);

        return $pdf->download("report-{$session->code}.pdf");
    }
}
