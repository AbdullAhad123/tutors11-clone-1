<?php

/**
 * File name: MockController.php
 * Last modified: 18/07/21, 12:11 AM
 * Author: NearCraft - https://codecanyon.net/user/nearcraft
 * Copyright (c) 2021
 */

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Platform\MockUpdateAnswerRequest;
use App\Models\mocks;
use App\Models\mock_sections;
use App\Models\mock_sessions;
use App\Models\Question;
use App\Models\SuggestedMockTest;
use App\Models\SuggestedPracticeSets;
use App\Repositories\ColorsRepository;
use App\Repositories\QuestionRepository;
use App\Repositories\UserMockRepository;
use App\Settings\LocalizationSettings;
use App\Settings\SiteSettings;
use App\Transformers\Admin\MockScoreReportTransformer;
use App\Transformers\Platform\MockDetailTransformer;
use App\Transformers\Platform\MockQuestionTransformer;
use App\Transformers\Platform\MockResultSectionTransformer;
use App\Transformers\Platform\MockSessionSectionTransformer;
use App\Transformers\Platform\QuizSolutionTransformer;
use App\Transformers\Platform\TopScorerTransformer;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;


class MockController extends Controller
{
    private UserMockRepository $repository;
    private QuestionRepository $questionRepository;
    private $chart_colors; # 0 index for correct answer , 1 index for wrong answer and 2 index for unanswered questions ,

    public function __construct(UserMockRepository $repository, QuestionRepository $questionRepository, ColorsRepository $colors)
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
     * Load mock Instructions Page
     *
     * @param $slug
     * @return \Inertia\Response
     */
    public function instructions($slug)
    {
        // dd($slug);
        $mock = mocks::where('slug', $slug)
            ->published()
            ->isPublic()
            ->with(['subCategory:id,name', 'mockType:id,name', 'mockSections:id,mock_id,name,total_questions,total_duration,total_marks'])
            ->withCount(['sessions' => function ($query) {
                $query->where('user_id', auth()->user()->id)->where('status', '=', 'started');
            }])
            ->firstOrFail();

        return Inertia::render('User/MockInstructions', [
            'mock' => fractal($mock, new MockDetailTransformer())->toArray()['data'],
            'instructions' => $this->repository->getInstructions($mock),
            'subscription' => request()->user()->hasActiveSubscription(request()->user()->id),
        ]);
    }

    /**
     * Create or Load a mock Session and redirect to mock screen
     *
     * @param mocks $mock
     * @return \Illuminate\Http\RedirectResponse
     */
    public function initMock(mocks $mock)
    {

        $subscription = request()->user()->hasActiveSubscription(request()->user()->id);
        // load completed mock sessions
        $mock->loadCount(['sessions' => function ($query) {
            $query->where('user_id', auth()->user()->id)->where('status', 'completed');
        }]);

        // check if any uncompleted sessions
        if ($mock->sessions()->where('user_id', auth()->user()->id)->where('status', '=', 'started')->count() > 0) {
            $session = $this->repository->getSession($mock);
        } else {
            // check restricted attempts
            if ($mock->settings->get('restrict_attempts')) {
                if ($mock->sessions_count >= $mock->settings->get('no_of_attempts')) {
                    return redirect()->back()->with('errorMessage', __('max_attempts_text'));
                }
            }

            if ($mock->is_paid && !$subscription) {
                // check redeem eligibility
                if ($mock->can_redeem) {
                    if (auth()->user()->balance < $mock->points_required) {
                        $msg = __('insufficient_points') . ' ' . str_replace('--', auth()->user()->balance . ' XP', __('wallet_balance_text')) . ' ' . str_replace('--', $mock->points_required . ' XP', __('required_points_are'));
                        return redirect()->back()->with('errorMessage', $msg);
                    }
                } else {
                    return redirect()->back()->with('errorMessage', __('You don\'t have an active plan to access this content. Please subscribe.'));
                }
            }

            $session = $this->repository->createSession($mock, $this->questionRepository);

            // deduct wallet points in case of not having a subscription for a paid mock
            if ($session) {
                if ($mock->is_paid && !$subscription && $mock->can_redeem) {
                    auth()->user()->withdraw($mock->points_required, [
                        'session' => $session->code,
                        'description' => 'Attempt of mock ' . $mock->title,
                    ]);
                }
            }
        }

        return redirect()->route('go_to_mock', ['mock' => $mock->slug, 'session' => $session->code]);
    }

    /**
     * Go To mock Screen
     *
     * @param mocks $mock
     * @param $session
     * @return \Illuminate\Http\RedirectResponse|\Inertia\Response
     */


    public function goToMock(mocks $mock, $session)
    {

        $session = mock_sessions::with('sections', 'questions')->where('code', $session)->firstOrFail();

        $now = Carbon::now();

        $remainingTime =  $now->diffInSeconds($session->ends_at, false);
        // dd($remainingTime);
        // var_dump($remainingTime==true);die;

        if ($session->status !== 'completed' && $remainingTime < 15) {
            $session->results = $this->repository->sessionResults($session, $mock);
            $session->status = 'completed';
            $session->completed_at = Carbon::now()->toDateTimeString();
            $session->update();

            return redirect()->route('mock_thank_you', ['mock' => $mock->slug, 'session' => $session->code]);
        }
        $result = $mock->only('code', 'title', 'slug', 'total_questions', 'settings');
        $SuggestedMockTest = SuggestedMockTest::where("mock_test_id",$mock->id)->get();
        if (count($SuggestedMockTest)>0) {
            $result["title"] = $SuggestedMockTest[0]->title;
            $result["total_questions"] = $SuggestedMockTest[0]->total_questions;
        }
        return Inertia::render('User/MockScreen', [
            'mock' => $result,
            'session' => $session,
            'mockSections' => fractal($session->sections, new MockSessionSectionTransformer())->toArray()['data'],
            'remainingTime' => $remainingTime,
            "chartColors" => $this->chart_colors,
        ]);
    }


    /**
     * Get mock section questions api endpoint
     *
     * @param mocks $mock
     * @param $session
     * @param $section
     * @return \Illuminate\Http\JsonResponse
     */


    public function getMockSectionQuestions(mocks $mock, $session, $section)
    {

        $session = mock_sessions::with(['questions', 'sections'])->where('code', $session)->firstOrFail();

        $now = Carbon::now();
        $mockSection = $session->sections()->wherePivot('mock_section_id', $section)->first();
        $remainingTime =  $now->diffInSeconds($mockSection->pivot->ends_at, false);

        $questions = fractal(
            $session->questions()->with(['questionType:id,name,code', 'skill:id,name', 'comprehensionPassage:id,body'])
                ->withPivot('mock_section_id', 'sno')
                ->where('mock_section_id', $section)
                ->orderBy('sno')->paginate(5),
            new MockQuestionTransformer()
        )->toArray();
            // return $questions;
        $data = SuggestedMockTest::where("mock_test_id", $mock->id)->get();
        if (count($data)>0) {
            $questions["meta"]["pagination"]["total"] = $data[0]->total_questions;

            $questions["meta"]["pagination"]["total_pages"] = $this->calculateTotalPages($data[0]->total_questions,$questions["meta"]["pagination"]["per_page"]);
            if($questions["meta"]["pagination"]["current_page"] == $questions["meta"]["pagination"]["total_pages"]){
                $total = $questions["meta"]["pagination"]["total"];
                for ($i=0; $i < $questions["meta"]["pagination"]["total_pages"]; $i++) {
                    $total-=$questions["meta"]["pagination"]["per_page"];
                }
                $total = $total ==0 ?$questions["meta"]["pagination"]["total"]:$total;
                // array_splice($questions["data"],$total,5);
                $Tquestions = [];
                // dd($questions["data"][$i]);
                for ($i=0; $i <$data[0]->total_questions; $i++) {
                    if (!isset($questions["data"][$i])) {continue;}
                    array_push($Tquestions,$questions["data"][$i]);
                }
                $questions["data"] = $Tquestions;
            }
        }
        return response()->json([
            'questions' => $questions['data'],
            'pagination' => $questions['meta']['pagination'],
            'answered' => $session->questions()->wherePivot('mock_section_id', $section)->wherePivotIn('status', ['answered', 'answered_mark_for_review'])->count(),
            'remainingTime' => $remainingTime
        ], 200);
    }
    public function calculateTotalPages($Total,$PerPage,$Page=0){
        if ($Total>0) {
            $Total-=$PerPage;
            $Page++;
            return $this->calculateTotalPages($Total,$PerPage,$Page);
        }
        return $Page;
    }
    /**
     * Check the user submitted answer is correct or not and update session accordingly
     *
     * @param MockUpdateAnswerRequest $request
     * @param mocks $mock
     * @param $session
     * @param $section
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateAnswer(MockUpdateAnswerRequest $request, mocks $mock, $session, mock_sections $section)
    {
        $session = mock_sessions::select(['id', 'code', 'mock_id', 'total_time_taken', 'current_section'])
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
            $marks = $mock->settings->get('auto_grading', true) ? $question->default_marks : $section->correct_marks;
            if ($isCorrect) {
                $marksEarned = $marks;
            } else {
                if ($mock->settings->get('enable_negative_marking', false)) {
                    if ($section->negative_marking_type == 'fixed') {
                        $marksDeducted = $section->negative_marks;
                    } else {
                        $marksDeducted = $section->negative_marks != 0 ? round(($marks * $section->negative_marks)  / 100, 2) : 0;
                    }
                }
            }
        }

        /*Insert or Update Session Question*/
        DB::table('mock_session_questions')->upsert(
            [
                'question_id' => $question->id,
                'original_question' => formatQuestionProperty($question->question, $question->questionType->code),
                'mock_session_id' => $session->id,
                'mock_section_id' => $section->id,
                'user_answer' => serialize($request->user_answer),
                'time_taken' => $request->time_taken,
                'is_correct' => $isCorrect,
                'status' => $request->status,
                'marks_earned' => $marksEarned,
                'marks_deducted' => $marksDeducted
            ],
            ['question_id', 'mock_session_id', 'mock_section_id'],
            ['user_answer', 'time_taken', 'is_correct', 'status', 'marks_earned', 'marks_deducted']
        );

        /*Update Session */
        $session->current_section = $request->current_section;
        $session->current_question = $request->current_question;
        $session->total_time_taken = $request->total_time_taken;
        $session->update();

        DB::table('mock_session_sections')
            ->where('mock_section_id', $section->id)
            ->where('mock_session_id', $session->id)
            ->update([
                'current_question' => $request->current_question,
                'total_time_taken' => $request->current_section_total_time_taken,
                'status' => 'visited'
            ]);

        return response()->json([
            'answered' => $session->questions()->wherePivot('mock_section_id', $section->id)->wherePivotIn('status', ['answered', 'answered_mark_for_review'])->count()
        ], 200);
    }

    /**
     * Finish the mock
     *
     * @param Request $request
     * @param mocks $mock
     * @param $session
     * @return \Illuminate\Http\RedirectResponse
     */
    public function finish(Request $request, mocks $mock, $session)
    {
        $session = mock_sessions::with(['questions', 'sections'])->where('code', $session)->firstOrFail();

        if ($session->status == 'completed') {
            redirect()->route('mock_thank_you', ['mock' => $mock->slug, 'session' => $session->code]);
        }

        $session->total_time_taken = $request->get('total_time_taken');
        $session->status = 'completed';
        $session->completed_at = Carbon::now()->toDateTimeString();
        $session->update();

        foreach ($session->sections as $section) {
            $results = $this->repository->sectionResults($session, $mock, $section);
            DB::table('mock_session_sections')
                ->where('mock_section_id', $section->id)
                ->where('mock_session_id', $session->id)
                ->update([
                    'results' => $results,
                ]);
        }
        $session = mock_sessions::with(['questions', 'sections'])->where('code', $session->code)->firstOrFail();
        $session->results = $this->repository->sessionResults($session, $mock);
        $session->update();

        return redirect()->route('mock_thank_you', ['mock' => $mock->slug, 'session' => $session->code]);
    }

    /**
     * mock thank you screen
     *
     * @param mocks $mock
     * @param $session
     * @return \Inertia\Response
     */
    public function thankYou(mocks $mock, $session)
    {
        $session = mock_sessions::where('code', $session)->firstOrFail();
        $result = $mock->only('code', 'title', 'slug', 'total_marks');

        $SuggestedMockTest = SuggestedMockTest::where("mock_test_id",$mock->id)->get();
        if (count($SuggestedMockTest)>0) {
            $result["title"] = $SuggestedMockTest[0]->title;
            $session->results->total_questions  = $SuggestedMockTest[0]->total_questions;
        }
        // dd();
        return Inertia::render('User/MockThanksScreen', [
            'mock' => $result,
            'session' => $session,
        ]);
    }

    /**
     * mock Session Analysis and Progress Status
     *
     * @param mocks $mock
     * @param $session
     * @return \Inertia\Response
     */
    public function results(mocks $mock, $session)
    {
        $session = mock_sessions::where('code', $session)->firstOrFail();
        if (session()->has("selected_child")) {
            $childName = session("selected_child")["name"];
        } else {
            $childName = '';
        }
        $result = $mock->only('code', 'title', 'slug', 'total_questions', 'total_marks', 'settings');
        $SuggestedMockTest = SuggestedMockTest::where("mock_test_id",$mock->id)->get();
        if (count($SuggestedMockTest)>0) {
            $result["title"] = $SuggestedMockTest[0]->title;
        }
        return Inertia::render('User/MockResults', [
            'mock' => $result,
            "chartColors" => $this->chart_colors,
            'session' => $session->only('code', 'total_time_taken', 'results', 'status'),
            'sections' => fractal($session->sections, new MockResultSectionTransformer())->toArray()['data'],
            'steps' => $this->repository->getMockProgressLinks($mock->slug, $session->code, 'mock_results'),
            "childName" => $childName
        ]);
    }

    /**
     * mock session solutions page
     *
     * @param mocks $mock
     * @param $session
     * @return \Inertia\Response
     */
    public function solutions(mocks $mock, $session)
    {
        // $session = mock_sessions::with('sections')->firstOrFail();
        $session = mock_sessions::with(['sections' => function ($query) {
            $query->orderBy('mock_session_sections.sno');
        }])->where('code', $session)->firstOrFail();

        // dd($session);
        if (session()->has("selected_child")) {
            $childName = session("selected_child")["name"];
        } else {
            $childName = '';
        }
        // dd(fractal($session->sections, new MockResultSectionTransformer())->toArray()['data']);
        $result = $mock->only('code', 'title', 'slug', 'total_questions', 'total_marks', 'settings');
        $SuggestedMockTest = SuggestedMockTest::where("mock_test_id",$mock->id)->get();
        if (count($SuggestedMockTest)>0) {
            $result["title"] = $SuggestedMockTest[0]->title;
        }
        return Inertia::render('User/MockSolutions', [
            'mock' => $result,
            "chartColors" => $this->chart_colors,
            'sections' => fractal($session->sections, new MockResultSectionTransformer())->toArray()['data'],
            'session' => $session->only('code', 'total_time_taken', 'results', 'status'),
            'steps' => $this->repository->getMockProgressLinks($mock->slug, $session->code, 'mock_solutions'),
            "childName" => $childName
        ]);
    }


    /**
     * Get mock solutions api endpoint
     *
     * @param mocks $mock
     * @param $session
     * @param $section
     * @return \Illuminate\Http\JsonResponse
     */
    public function fetchSolutions(mocks $mock, $session, $section)
    {
        $session = mock_sessions::where('code', $session)->firstOrFail();
        // dd($session);
        $questions = fractal(
            $session->questions()->wherePivot('mock_section_id', $section)->with(['questionType:id,name,code', 'skill:id,name'])
                ->orderBy('sno')->get(['id', 'code', 'question', 'question_type_id', 'skill_id', 'solution', 'solution_video']),
            new QuizSolutionTransformer()
        )->toArray();

        return response()->json([
            'questions' => $questions['data'],
        ], 200);
    }

    /**
     * mock Session Leaderboard
     *
     * @param mocks $mock
     * @param $session
     * @return \Inertia\Response
     */
    public function leaderboard(mocks $mock, $session)
    {
        $session = mock_sessions::where('code', $session)->firstOrFail();

        $key = $session->mock_schedule_id ? 'mock_schedule_id' : 'mock_id';
        $value = $session->mock_schedule_id ? $session->mock_schedule_id : $mock->id;

        $topScorers = mock_sessions::select('user_id', 'mock_id')
            ->with('user:id,first_name,last_name')
            ->selectRaw("max(CAST(JSON_EXTRACT(`results`, \"$.score\") AS DECIMAL(10,6))) as high_score")
            ->selectRaw("max(CAST(JSON_EXTRACT(`results`, \"$.percentage\") AS DECIMAL(10,6))) as high_percentage")
            ->where($key, $value)
            ->groupBy('user_id', 'mock_id')
            ->orderBy('high_score', 'desc')
            ->get();
        if (session()->has("selected_child")) {
            $childName = session("selected_child")["name"];
        } else {
            $childName = '';
        }
        $result = $mock->only('code', 'title', 'slug', 'total_questions', 'total_marks', 'settings');
        $SuggestedMockTest = SuggestedMockTest::where("mock_test_id",$mock->id)->get();
        if (count($SuggestedMockTest)>0) {
            $result["title"] = $SuggestedMockTest[0]->title;
        }
        return Inertia::render('User/MockLeaderBoard', [
            'mock' => $result,
            'session' => $session->only('code', 'total_time_taken', 'results', 'status'),
            'topScorers' => fractal($topScorers, new TopScorerTransformer())->toArray()['data'],
            'steps' => $this->repository->getMockProgressLinks($mock->slug, $session->code, 'mock_leaderboard'),
            "childName" => $childName
        ]);
    }

    /**
     * User mock Session Export PDF
     *
     * @param mocks $mock
     * @param $session
     * @param LocalizationSettings $localization
     * @param SiteSettings $settings
     * @return \Illuminate\Http\Response
     */
    public function exportPDF(mocks $mock, $session, LocalizationSettings $localization, SiteSettings $settings)
    {
        $session = mock_sessions::with('user')->where('code', $session)->firstOrFail();

        $now = Carbon::now()->timezone($localization->default_timezone);
        $user = auth()->user()->first_name . ' ' . auth()->user()->last_name;

        $pdf = PDF::loadView('pdf.mock-session-report', [
            'mock' => $mock->only('code', 'title'),
            'session' => fractal($session, new MockScoreReportTransformer())->toArray()['data'],
            'footer' => "* Report Generated from {$settings->app_name} by {$user} on {$now->toDayDateTimeString()}",
            'logo' => url('storage/' . $settings->logo_path),
            'rtl' => $localization->default_direction == 'rtl',
            'isParent' => Auth::user()->hasRole("parent")
        ]);

        return $pdf->download("report-{$session->code}.pdf");
    }
}
