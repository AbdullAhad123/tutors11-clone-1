<?php

/**
 * File name: PracticeController.php
 * Last modified: 18/07/21, 3:06 PM
 * Author: NearCraft - https://codecanyon.net/user/nearcraft
 * Copyright (c) 2021
 */

namespace App\Http\Controllers\User;


use App\Http\Controllers\Controller;
use App\Models\JourneySession;
use App\Models\JourneySet;
use App\Models\Question;
use App\Models\Section;
use App\Models\Skill;
use App\Models\SubCategory;
use App\Models\SubCategorySections;
use App\Models\JourneySetQuestion;
use App\Repositories\QuestionRepository;
use App\Repositories\UserJourneySetRepository;
use App\Repositories\ColorsRepository;
use App\Transformers\Platform\JourneyQuestionTransformer;
use App\Transformers\Platform\JourneySetCardTransformer;
use App\Transformers\Platform\JourneySolutionTransformer;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\CodeCoverage\Report\Xml\Totals;

class JourneyController extends Controller
{
    private UserJourneySetRepository $repository;
    private QuestionRepository $questionRepository;
    private $chart_colors; # 0 index for correct answer , 1 index for wrong answer and 2 index for unanswered questions ,

    public function __construct(UserJourneySetRepository $repository, QuestionRepository $questionRepository, ColorsRepository $colors)
    {
        $this->middleware(['role:guest|student|employee|parent|teacher']);
        $this->repository = $repository;
        $this->questionRepository = $questionRepository;
        $this->chart_colors = [
            $colors->getPositiveColor(),
            $colors->getNegativeColor(),
            $colors->getNeutralColor(),
            "transparent" => [
                $colors->transparent()["positive_color"],
                $colors->transparent()["negative_color"],
                $colors->transparent()["neutral_color"],
            ]
        ];
    }
    /**
     * View available practice sets for a section
     *
     * @param SubCategory $category
     * @param Section $section
     * @param $skill
     * @return \Inertia\Response
     */
    public function practiceSets(SubCategory $category, Section $section, $skill)
    {
        $skill = Skill::where('slug', $skill)->firstOrFail();
        return view('User/NoPracticeSets', [
            'category' => $category,
            'section' => $section,
            'skill' => $skill,
            'subscription' => request()->user()->hasActiveSubscription(request()->user()->id)
        ]);
    }

    /**
     * Fetch practice sets for the practice sets screen
     *
     * @param SubCategory $category
     * @param Section $section
     * @param $skill
     * @return \Illuminate\Http\JsonResponse
     */
    public function fetchPracticeSets(SubCategory $category, Section $section, $skill)
    {
        $skill = Skill::where('slug', $skill)->firstOrFail();
        $sets = fractal($skill->practiceSets()->with('skill:id,name')
            ->where('sub_category_id', $category->id)
            ->where('practice_sets.is_active', '=', 1)
            ->where('custom_set', 0)
            ->orderBy('practice_sets.is_paid', 'asc')
            ->paginate(20), new PracticeSetCardTransformer())
            ->toArray();
        return response()->json([
            'sets' => $sets
        ], 200);
    }

    /**
     * Create or Load a Practice Session and redirect to practice screen
     *
     * @param JourneySet $practiceSet
     * @return \Illuminate\Http\RedirectResponse
     */
    public function initJourneySet(JourneySet $journeySet, Request $request)
    {
        $subscription = request()->user()->hasActiveSubscription(request()->user()->id);
        if ($journeySet->is_paid && !$subscription) {
            return redirect()->back()->with('errorMessage', __('You don\'t have an active plan to access this content. Please subscribe.'));
        }

        $journeySet->loadCount(['questions', 'sessions' => function ($query) {
            $query->where('user_id', auth()->user()->id);
        }]);

        // Restrict if there are no questions in this practice set
        if ($journeySet->questions_count == 0) {
            return redirect()->back()->with('errorMessage', __('There are no questions in this practice set'));
        }

        $sessions_count = DB::table('journey_sessions')->where('journey_set_id', $journeySet->id)->where('user_id', auth()->user()->id)->count();

        if ($sessions_count > 0) {
            $session = $this->repository->getSession($journeySet);
        } else {
            $session = $this->repository->createSession($journeySet);
        }

        if ($session->status == 'completed') {
            return redirect()->route('get_journey_session_analysis', ['journeySet' => $journeySet->slug, 'session' => $session->code])
                ->with('successMessage', __('You completed this practice set'));
        }
        $set_by = null;
        if (!Skill::find($journeySet->skill_id)) {
            return redirect()->back()->with('errorMessage', __('Topic not found, please contact the administrator!'));
        }
        $total_questions = JourneySetQuestion::where('journey_set_id', $session->journey_set_id)
        ->whereHas('questions', function ($query) {
            $query->whereNull('deleted_at');
        })
        ->count();
        return view('User/Welcome_to_pratice', [
            'practiceSet' => $journeySet,
            'session' => $session,
            'skill' => Skill::findOrFail($journeySet->skill_id),
            'parentSet' => isset($request->parentSet) ? $request->parentSet : false,
            'set_by' => $set_by,
            'total_questions' => $total_questions,
            'now' => Carbon::now()->toDateTimeString()
        ]);
    }

    /**
     * Go To Practice Screen
     *
     * @param PracticeSet $practiceSet
     * @param $session
     * @return \Illuminate\Http\RedirectResponse|\Inertia\Response
     */
    public function goToJourney(JourneySet $journeySet, $session, Request $request)
    {  
        $subscription = request()->user()->hasActiveSubscription(request()->user()->id);
        $session = JourneySession::with('questions')->where('code', $session)->firstOrFail();
        $questions = fractal(
            $journeySet->questions()->with([
                'questionType:id,name,code', 'skill:id,name', 'comprehensionPassage:id,body',
                'journeySessions' => function ($query) use ($session) {
                    $query->where('journey_session_id', $session->id);
                }
            ])->get(),
            new JourneyQuestionTransformer()
        )->toArray(); 
        if ($journeySet->is_paid && !$subscription) {
            return redirect()->back()->with('errorMessage', __('You don\'t have an active plan to access this content. Please subscribe.'));
        }
        $topic = Skill::findOrFail($journeySet->skill_id);
        $subject = Section::findOrFail($topic->section_id)->only('slug', 'id');
        $year_id = SubCategorySections::where('section_id', $subject['id'])->first()->only('sub_category_id');
        $year = SubCategory::findOrFail($year_id['sub_category_id']);
        $Lessonscount = $year->practiceLessons()->where('practice_lessons.skill_id', '=', $topic->id)->count();
        if($Lessonscount > 0){
            $lesson_url = '/lessons/'.$year->slug.'/'.$subject['slug'].'/'.$topic->slug.'/read';
        }
        $total_questions = JourneySetQuestion::where('journey_set_id', $session->journey_set_id)
        ->whereHas('questions', function ($query) {
            $query->whereNull('deleted_at');
        })
        ->count();
        return view('User/JourneyScreen', [
            'journeySet' => $journeySet->only('code', 'title', 'slug', 'total_questions'),
            'session' => $session,
            'chartColors' => $this->chart_colors,
            'lesson_url' => isset($lesson_url) ? $lesson_url : null,
            'questions' => $questions['data'],
            'total' => $total_questions,
            'answered' => $session->questions()->wherePivot('status', '=', 'answered')->count(),
        ]);
    }

    /**
     * Fetch practice set questions with session questions
     *
     * @param JourneySet $journeySet
     * @param $session
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function getJourneyQuestions(JourneySet $journeySet, $session)
    {
        $subscription = request()->user()->hasActiveSubscription(request()->user()->id);
        if ($journeySet->is_paid && !$subscription) {
            return redirect()->back()->with('errorMessage', __('You don\'t have an active plan to access this content. Please subscribe.'));
        }
        $session = JourneySession::with('questions')->where('code', $session)->firstOrFail();
        $questions = fractal(
            $journeySet->questions()->with([
                'questionType:id,name,code', 'skill:id,name', 'comprehensionPassage:id,body',
                'journeySessions' => function ($query) use ($session) {
                    $query->where('journey_session_id', $session->id);
                }
            ])->get(),
            new JourneyQuestionTransformer()
        )->toArray();
        return response()->json([
            'questions' => $questions['data'],
            'pagination' => 1,
            'total' => count($questions['data']),
            'answered' => $session->questions()->wherePivot('status', '=', 'answered')->count(),
        ], 200);
    }
    public function calculateTotalPages($Total, $PerPage, $Page = 0)
    {
        if ($Total > 0) {
            $Total -= $PerPage;
            $Page++;
            return $this->calculateTotalPages($Total, $PerPage, $Page);
        }
        return $Page;
    }
    /**
     * Check the user submitted answer is correct or not and update session accordingly
     *
     * @param Request $request
     * @param PracticeSet $practiceSet
     * @param $session
     * @return \Illuminate\Http\JsonResponse
     */
    public function checkAnswer(Request $request, JourneySet $JourneySet, $slug, $session)
    {
        $session = JourneySession::select(['id', 'code', 'journey_set_id', 'total_time_taken', 'total_points_earned', 'percentage_completed'])
            ->where('code', $session)
            ->firstOrFail();
        $JourneySet = JourneySet::findOrFail($session->journey_set_id);
        $total_questions = JourneySetQuestion::where('journey_set_id', $session->journey_set_id)
        ->whereHas('questions', function ($query) {
            $query->whereNull('deleted_at');
        })
        ->count();
        $question = Question::select(['id', 'question', 'options', 'correct_answer', 'default_marks', 'solution', 'question_type_id'])
            ->with(['questionType:id,name,code'])
            ->where('code', $request->question_id)
            ->firstOrFail();
        $isCorrect = $this->questionRepository->evaluateAnswer($question, $request->user_answer);
        
        $correctAnswer = $this->questionRepository->formatCorrectAnswer($question, $request->user_answer);

        $pointsEarned = $JourneySet->auto_grading ? $question->default_marks : $JourneySet->correct_marks;

        $pointsEarned = $pointsEarned ?? $question->default_marks;

        /*Insert or Update Session Question*/
        DB::table('journey_session_questions')->upsert(
            [
                'question_id' => $question->id,
                'Journey_session_id' => $session->id,
                'original_question' => formatQuestionProperty($question->question, $question->questionType->code),
                'options' => serialize(formatOptionsProperty($question->options, $question->questionType->code, $question->question)),
                'user_answer' => serialize($request->user_answer),
                'correct_answer' => serialize($correctAnswer),
                'time_taken' => $request->time_taken,
                'points_earned' => $isCorrect ? $pointsEarned : 0,
                'is_correct' => $isCorrect,
                'status' => 'answered'
            ],
            ['question_id', 'Journey_session_id'],
            ['user_answer', 'is_correct', 'time_taken', 'status']
        );

        /*Update Session */
        if ($isCorrect) {
            $session->total_points_earned = $session->total_points_earned + $pointsEarned;
        }
        $totalAnswered = $session->questions()->wherePivot('status', '=', 'answered')->count();

        $session->percentage_completed = $totalAnswered != 0 ? round(($totalAnswered / $total_questions) * 100, 2) : 0;
        $session->total_time_taken = $request->total_time_taken;
        $session->update();
        
        return response()->json([
            'is_correct' => $isCorrect,
            'status' => 'answered',
            'solution' => $question->solution,
            'solution_video' => $question->solution_video,
            'ca' => $correctAnswer,
            'points_earned' => $isCorrect ? $pointsEarned : 0,
            'total_points_earned' => $session->total_points_earned,
            'answered' => $totalAnswered,
            'total' => $total_questions,
            'percentage_completed' => $session->percentage_completed
        ], 200);
    }

    /**
     * Finish Journey Session and Redirect to Analysis Screen
     *
     * @param JourneySet $JourneySet
     * @param $session
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Throwable
     */
    public function finish(JourneySet $JourneySet, $slug, $session)
    {
        $session = JourneySession::with('questions')->where('code', $session)->firstOrFail();
        $JourneySet = JourneySet::findOrFail($session->journey_set_id);
        if ($session->total_points_earned > 0 && $session->status != 'completed') {
            auth()->user()->deposit($session->total_points_earned, ['description' => $JourneySet->title, 'session' => $session->code]);
        }
        $total_questions = JourneySetQuestion::where('journey_set_id', $session->journey_set_id)
        ->whereHas('questions', function ($query) {
            $query->whereNull('deleted_at');
        })
        ->count();
        $session->results = $this->repository->sessionAnalytics($session, $total_questions);
        $session->percentage_completed = round(100, 2);
        $session->status = 'completed';
        $session->completed_at = Carbon::now()->toDateTimeString();
        $session->update();
        return true;
    }

    /**
     * Journey Session Analysis and Progress Status
     *
     * @param PracticeSet $JourneySet
     * @param $session
     * @return \Inertia\Response
     */
    public function analysis(JourneySet $journeySet, $session)
    {
        $session = JourneySession::with('questions')->where('code', $session)->firstOrFail();
        if (request()->has('total_time_taken')) {
            $session->total_time_taken = request()->get('total_time_taken');
            $session->update();
        }
        if (session()->has("selected_child")) {
            $childName = session("selected_child")["name"];
        } else {
            $childName = '';
        }
        $questions = fractal(
            $session->questions()->with(['questionType:id,name,code', 'skill:id,name'])
                ->get(['id', 'code', 'question', 'question_type_id', 'skill_id', 'solution', 'solution_video']),
            new JourneySolutionTransformer()
        )->toArray();
        $topic = Skill::findOrFail($journeySet->skill_id);
        $subject = Section::findOrFail($topic->section_id)->only('slug', 'id');
        $year_id = SubCategorySections::where('section_id', $subject['id'])->first()->only('sub_category_id');
        $year = SubCategory::findOrFail($year_id['sub_category_id']);
        $Lessonscount = $year->practiceLessons()->where('practice_lessons.skill_id', '=', $topic->id)->count();
        if($Lessonscount > 0){
            $lesson_url = '/lessons/'.$year->slug.'/'.$subject['slug'].'/'.$topic->slug.'/read';
        }
        $total_questions = JourneySetQuestion::where('journey_set_id', $session->journey_set_id)
        ->whereHas('questions', function ($query) {
            $query->whereNull('deleted_at');
        })
        ->count();

        return view('User/PracticeAnalysis', [
            "chartColors" => $this->chart_colors,
            'practiceSet' => $journeySet->only('code', 'title', 'slug', 'total_questions', 'journey_id'),
            'session' => $session->only('code', 'total_time_taken', 'total_points_earned', 'status'),
            'analytics' => $session->status == 'completed' ? $session->results : $this->repository->sessionAnalytics($session, $total_questions),
            'questions' => $questions,
            "childName" => $childName,
            "journey" => true,
            'lesson_url' => isset($lesson_url) ? $lesson_url : null,
        ]);
    }

    /**
     * Get Practice Session solutions api endpoint
     *
     * @param PracticeSet $practiceSet
     * @param $session
     * @return \Illuminate\Http\JsonResponse
     */
    public function solutions(PracticeSet $practiceSet, $session)
    {
        $session = PracticeSession::with('questions')->where('code', $session)->firstOrFail();

        $questions = fractal(
            $session->questions()->with(['questionType:id,name,code', 'skill:id,name'])
                ->get(['id', 'code', 'question', 'question_type_id', 'skill_id', 'solution', 'solution_video']),
            new PracticeSolutionTransformer()
        )->toArray();

        return response()->json([
            'questions' => $questions['data'],
        ], 200);
    }
}
