<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\AssessmentTestSession;
use App\Models\mock_sessions;
use App\Models\Subscription;
use App\Models\Skill;
use App\Models\journey;
use App\Models\SubCategorySections;
use App\Models\PracticeSet;
use App\Models\JourneySet;
use App\Models\Section;
use Illuminate\Support\Facades\Auth;
use App\Transformers\Platform\UserMockSessionTransformer;
use Illuminate\Http\Request;
use App\Models\ExamSession;
use App\Models\PracticeSession;
use App\Models\JourneySession;
use App\Models\QuizSession;
use App\Repositories\UserRepository;
use App\Transformers\Platform\QuizSessionCardTransformer;
use App\Transformers\Platform\UserExamSessionTransformer;
use App\Transformers\Platform\PracticeSessionCardTransformer;
use App\Transformers\Platform\JourneySessionCardTransformer;
use App\Transformers\Platform\UserPracticeSessionTransformer;
use App\Transformers\Platform\UserJourneySessionTransformer;
use App\Transformers\Platform\UserAssessmnetSessionTransformer;
use App\Transformers\Platform\UserQuizSessionTransformer;
use Inertia\Inertia;

class ProgressController extends Controller
{
    /**
     * @var UserRepository
     */
    private UserRepository $repository;

    public function __construct(UserRepository $repository)
    {
        $this->middleware(['role:guest|student|employee']);
        $this->repository = $repository;
    }

    /**
     * User My Progress Screen
     *
     * @return \Inertia\Response
     */
    public function myProgress()
    {
        $total_questions = 0;
        $correct_questions = 0;
        $total_time_spent = 0;
        $total_coins = 0;
        $practice_set_ids = [];
        $practice_set_skill_ids = [];
        $practice_session = [];
        $sections = [];

        $examsSession = ExamSession::where('user_id', Auth::user()->id)->with("exam")->get();
        $quizzesSession = QuizSession::where('user_id', Auth::user()->id)->with("quiz")->get();
        $practicesSession = PracticeSession::where('user_id', Auth::user()->id)->with("practiceSet")->get();
        foreach ($examsSession as $key => $value) {
            $total_questions = $total_questions + $value->results->total_questions;
            $correct_questions = $correct_questions + $value->results->correct_answered_questions;
            if($value->completed_at != null){
                $total_time_spent = $total_time_spent + $value->results->total_time_taken['seconds'];
            }
        }
        foreach ($quizzesSession as $key => $value) {
            $total_questions = $total_questions + $value->results->total_questions;
            $correct_questions = $correct_questions + $value->results->correct_answered_questions;
            if($value->completed_at != null){
                $total_time_spent = $total_time_spent + $value->results->total_time_taken['seconds'];
            }
        }
        foreach ($practicesSession as $key => $value) {
            $total_coins = $total_coins + $value->total_points_earned;
            $total_questions = $total_questions + $value->results->total_questions;
            $correct_questions = $correct_questions + $value->results->correct_answered_questions;
            if($value->completed_at != null){
                $total_time_spent = $total_time_spent + $value->results->total_time_taken['seconds'];
            }
        }

        $practiceSessions = PracticeSession::with('practiceSet:id,slug,title,skill_id')->where('user_id', auth()->user()->id)->where("status", "started")->pending()->get();
        $practice_sessions = fractal($practiceSessions, new PracticeSessionCardTransformer())->toArray();
        try {
            $subscription = Subscription::where('user_id', auth()->user()->id)->firstOrFail();
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->route('select_plan');
        }
        $skills = Skill::where("is_active", true)->get(["id", "name", "section_id"]);
        $sectionFrom  = SubCategorySections::with("section")->where("sub_category_id",$subscription->category_id)->get();
        $skills = Skill::where("is_active", true)->get(["id", "name", "section_id"]);
        $sectionFrom  = SubCategorySections::with("section")->where("sub_category_id",$subscription->category_id)->get();

        foreach ($skills as $value1) {
            $id = PracticeSet::where("skill_id", $value1->id)->where("is_active", true)->get(["id", "skill_id"]);
            foreach ($id as $key => $value) {
                array_push($practice_set_ids, [$id[$key]->skill_id => $id[$key]->id]);
                $practice_set_skill_ids[$id[$key]->id] = $id[$key]->skill_id;

            }
        }
        foreach ($practice_set_ids as $key => $value) {
            if(Auth::user()->hasRole('student')){
                $results = PracticeSession::where("practice_set_id", $value)->where("user_id", Auth::user()->id)->get(["results", "practice_set_id"]);
            } else {
                $results = PracticeSession::where("practice_set_id", $value)->where("user_id", Auth::user()->id)->get(["results", "practice_set_id"]);
            }
            if (count($results) > 0) {
                foreach ($results as $key => $value1) {
                    if (isset($value1->results->accuracy)) {
                        foreach ($value as $skill_id => $ps_id) {
                            if (isset($practice_session[$skill_id][$ps_id])) {
                                $practice_session[$skill_id][$ps_id]["total_questions"] += $value1->results->total_questions;
                                $practice_session[$skill_id][$ps_id]["correct_answered_questions"] += $value1->results->correct_answered_questions;
                                continue;
                            } else {
                                $practice_session[$skill_id][$ps_id] = ["total_questions" => $value1->results->total_questions, "correct_answered_questions" => $value1->results->correct_answered_questions, "id" => $value1->practice_set_id];
                            }
                        }
                    }
                }
            }
        }
        foreach ($sectionFrom as $key => $section) {
            $tableData = [];
            $mastery_level_score = [];
            $sec = Section::find($section->section_id)->only("id", "name", "slug");
            foreach ($skills as $key => $skill) {
                if($skill->section_id == $section->section_id){
                    $skill_id = $skill->id;
                    $skill_name = $skill->name;
                    $mastery_level2 = "Not Set";
                    foreach ($practice_set_ids as $key => $value) {
                        if (array_key_exists($skill->id, $value)) {
                            $mastery_level2 = "Not Attempt";
                        }
                    }
                    if (array_key_exists($skill->id, $practice_session)) {
                        $total_question = 0;
                        $correct_answered_questions = 0;
                        foreach ($practice_session[$skill->id] as $key => $practice_set) {
                            $total_question += $practice_set["total_questions"];
                            $correct_answered_questions += $practice_set["correct_answered_questions"];
                        }
                        $mastery_level2 = number_format($correct_answered_questions / $total_question * 100, 2);
                    }
                    if($mastery_level2 != "Not Set"){
                        if($mastery_level2 != "Not Attempt"){
                            array_push($mastery_level_score, (float)$mastery_level2);
                        } else {
                            array_push($mastery_level_score, 0);
                        }
                    }
                }
            }
            $a = array_filter($mastery_level_score);
            if(count($a) > 0){
                $average = array_sum($a)/count($a);
            } else {
                $average = 0;
            }
            if (round($average, 2) <= 33.100){
                $mastery_message = "Needs Practice";
            } elseif(round($average, 2) < 66.100 && round($average, 2) > 33.100){
                $mastery_message = "Good";
            } elseif(round($average, 2) >= 66.100){
                $mastery_message = "Strong";
            } else {
                $mastery_message = "Strong";
            }
            array_push($sections, [
                "id" => $sec['id'],
                "name" => $sec['name'],
                "slug" => $sec['slug'],
                "mastery_level" => $mastery_message,
            ]);
        }
        if($total_time_spent > 200){
            if($total_time_spent / 60 > 200){
                $formatted_total_time_spent = [
                    'time' => round(($total_time_spent / 60) / 60, 2),
                    'format_type' => 'H'
                ];
            } else {
                $formatted_total_time_spent = [
                    'time' => round($total_time_spent / 60, 2),
                    'format_type' => 'M'
                ];
            }
        } else {
            $formatted_total_time_spent = [
                'time' => round($total_time_spent, 2),
                'format_type' => 'S'
            ];
        }
        return view('User/UserProgress/MyProgress', [
            'steps' => $this->repository->getProgressNavigatorLinks('my_progress'),
            'practice_sessions' => $practice_sessions['data'],
            'mastery_level' => $sections,
            'total_questions' => $total_questions,
            'total_coins' => $total_coins,
            'correct_questions' => $correct_questions,
            'total_time_spent' => $formatted_total_time_spent,
        ]);
    }
    public function studentJourneyProgress()
    {
        $total_questions = 0;
        $correct_questions = 0;
        $total_time_spent = 0;
        $total_coins = 0;
        $journey_set_ids = [];
        $journey_set_skill_ids = [];
        $journey_session = [];
        $sections = [];

        $journeySession = JourneySession::where('user_id', Auth::user()->id)->with("journeySet")->get();
        foreach ($journeySession as $key => $value) {
            $total_coins = $total_coins + $value->total_points_earned;
            $total_questions = $total_questions + $value->results->total_questions;
            $correct_questions = $correct_questions + $value->results->correct_answered_questions;
            if($value->completed_at != null){
                $total_time_spent = $total_time_spent + $value->results->total_time_taken['seconds'];
            }
        }

        $journeySessions = JourneySession::with('journeySet:id,slug,title,skill_id')->where('user_id', auth()->user()->id)->where("status", "started")->where("total_time_taken","<>", 0)->pending()->take(10)->get();
        $journey_sessions = fractal($journeySessions, new JourneySessionCardTransformer())->toArray();
        try {
            $subscription = Subscription::where('user_id', auth()->user()->id)->firstOrFail();
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->route('select_plan');
        }
        $skills = Skill::where("is_active", true)->get(["id", "name", "section_id"]);
        $sectionFrom  = Journey::with("section")->where("sub_category_id",$subscription->category_id)->get();

        foreach ($skills as $value1) {
            $id = JourneySet::where("skill_id", $value1->id)->where("is_active", true)->get(["id", "skill_id"]);
            foreach ($id as $key => $value) {
                array_push($journey_set_ids, [$id[$key]->skill_id => $id[$key]->id]);
                $journey_set_skill_ids[$id[$key]->id] = $id[$key]->skill_id;

            }
        }
        foreach ($journey_set_ids as $key => $value) {
            if(Auth::user()->hasRole('student')){
                $results = JourneySession::where("journey_set_id", $value)->where("user_id", Auth::user()->id)->get(["results", "journey_set_id"]);
            } else {
                $results = JourneySession::where("journey_set_id", $value)->where("user_id", Auth::user()->id)->get(["results", "journey_set_id"]);
            }
            if (count($results) > 0) {
                foreach ($results as $key => $value1) {
                    if (isset($value1->results->accuracy)) {
                        foreach ($value as $skill_id => $ps_id) {
                            if (isset($journey_session[$skill_id][$ps_id])) {
                                $journey_session[$skill_id][$ps_id]["total_questions"] += $value1->results->total_questions;
                                $journey_session[$skill_id][$ps_id]["correct_answered_questions"] += $value1->results->correct_answered_questions;
                                continue;
                            } else {
                                $journey_session[$skill_id][$ps_id] = ["total_questions" => $value1->results->total_questions, "correct_answered_questions" => $value1->results->correct_answered_questions, "id" => $value1->journey_set_id];
                            }
                        }
                    }
                }
            }
        }
        foreach ($sectionFrom as $key => $section) {
            $tableData = [];
            $mastery_level_score = [];
            $sec = Section::find($section->section_id)->only("id", "name", "slug");

            foreach ($skills as $key => $skill) {
                if($skill->section_id == $section->section_id){
                    $skill_id = $skill->id;
                    $skill_name = $skill->name;
                    $mastery_level2 = "Not Set";
                    foreach ($journey_set_ids as $key => $value) {
                        if (array_key_exists($skill->id, $value)) {
                            $mastery_level2 = "Not Attempt";
                        }
                    }
                    if (array_key_exists($skill->id, $journey_session)) {
                        $total_question = 0;
                        $correct_answered_questions = 0;
                        foreach ($journey_session[$skill->id] as $key => $journey_set) {
                            $total_question += $journey_set["total_questions"];
                            $correct_answered_questions += $journey_set["correct_answered_questions"];
                        }
                        $mastery_level2 = number_format($correct_answered_questions / $total_question * 100, 2);
                    }
                    if($mastery_level2 != "Not Set"){
                        if($mastery_level2 != "Not Attempt"){
                            array_push($mastery_level_score, (float)$mastery_level2);
                        } else {
                            array_push($mastery_level_score, 0);
                        }
                    }
                }
            }
            $a = array_filter($mastery_level_score);
            if(count($a) > 0){
                $average = array_sum($a)/count($a);
            } else {
                $average = 0;
            }
            if (round($average, 2) <= 33.100){
                $mastery_message = "Needs Practice";
            } elseif(round($average, 2) < 66.100 && round($average, 2) > 33.100){
                $mastery_message = "Good";
            } elseif(round($average, 2) >= 66.100){
                $mastery_message = "Strong";
            } else {
                $mastery_message = "Strong";
            }
            array_push($sections, [
                "id" => $sec['id'],
                "name" => $sec['name'],
                "slug" => $sec['slug'],
                "mastery_level" => $mastery_message,
            ]);
        }
        if($total_time_spent > 200){
            if($total_time_spent / 60 > 200){
                $formatted_total_time_spent = [
                    'time' => round(($total_time_spent / 60) / 60, 2),
                    'format_type' => 'H'
                ];
            } else {
                $formatted_total_time_spent = [
                    'time' => round($total_time_spent / 60, 2),
                    'format_type' => 'M'
                ];
            }
        } else {
            $formatted_total_time_spent = [
                'time' => round($total_time_spent, 2),
                'format_type' => 'S'
            ];
        }
        return view('User/UserProgress/JourneyProgress', [
            'journey_sessions' => $journey_sessions['data'],
            'mastery_level' => $sections,
            'total_questions' => $total_questions,
            'total_coins' => $total_coins,
            'correct_questions' => $correct_questions,
            'total_time_spent' => $formatted_total_time_spent,
        ]);
    }

    /**
     * User My Quizzes Screen
     *
     * @return \Inertia\Response
     */
    public function myQuizzes()
    {
        $sessions = QuizSession::with('quiz:id,slug,title')
            ->where('user_id', auth()->user()->id)
            ->where('status', '=', 'completed')
            ->paginate(request()->perPage != null ? request()->perPage : 10);

        return view('User/UserProgress/MyQuizzes', [
            'steps' => $this->repository->getProgressNavigatorLinks('my_quizzes'),
            'quizSessions' => fractal($sessions, new UserQuizSessionTransformer())->toArray(),
        ]);
    }

    /**
     * User My Exams Screen
     *
     * @return \Inertia\Response
     */
    public function myExams()
    {
        $sessions = ExamSession::with('exam:id,slug,title')
            ->where('user_id', auth()->user()->id)
            ->where('status', '=', 'completed')
            ->paginate(request()->perPage != null ? request()->perPage : 10);
            return view('User/UserProgress/MyExams', [
            'steps' => $this->repository->getProgressNavigatorLinks('my_exams'),
            'examSessions' => fractal($sessions, new UserExamSessionTransformer())->toArray(),
        ]);
    }


     /**
     * User My Mocks Screen
     *
     * @return \Inertia\Response
     */
    public function myMocks()
    {
        $sessions = mock_sessions::with('mock:id,slug,title')
        ->where('user_id', auth()->user()->id)
        ->where('status', '=', 'completed')
        ->paginate(request()->perPage != null ? request()->perPage : 10);

        return view('User/UserProgress/MyMocks', [
            'steps' => $this->repository->getProgressNavigatorLinks('my_mocks'),
            'mockSessions' => fractal($sessions, new UserMockSessionTransformer())->toArray(),
        ]);
    }

    /**
     * User My Practice Screen
     *
     * @return \Inertia\Response
     */
    public function myPractice(Request $request)
    {
        $sessions = PracticeSession::with('practiceSet:id,slug,title')
            ->where('user_id', auth()->user()->id)
            ->where('status', '=', 'completed')
            ->paginate(request()->perPage != null ? request()->perPage : 10);

        return view('User/UserProgress/MyPractice', [
            'steps' => $this->repository->getProgressNavigatorLinks('my_practice'),
            'practiceSessions' => fractal($sessions, new UserPracticeSessionTransformer())->toArray(),
        ]);
    }

    public function myJourney(Request $request)
    {
        $sessions = JourneySession::with('journeySet:id,slug,title,subtitle')
            ->where('user_id', auth()->user()->id)
            ->where('status', '=', 'completed')
            ->orderBy('updated_at', 'desc')
            ->paginate(request()->perPage != null ? request()->perPage : 10);
        return view('User/UserProgress/MyJourney', [
            'steps' => $this->repository->getProgressNavigatorLinks('my_practice'),
            'journeySessions' => fractal($sessions, new UserJourneySessionTransformer())->toArray(),
        ]);
    }

    public function myAssessments(Request $request)
    {
        $sessions = AssessmentTestSession::with('assessment:id,slug,title')
            ->where('user_id', auth()->user()->id)
            ->where('status', '=', 'completed')
            ->paginate(request()->perPage != null ? request()->perPage : 10);
        // dd(fractal($sessions, new UserAssessmnetSessionTransformer())->toArray());
        return view('User/UserProgress/MyAssessment', [
            'steps' => $this->repository->getProgressNavigatorLinks('my_assessment'),
            'assessmentSessions' => fractal($sessions, new UserAssessmnetSessionTransformer())->toArray(),
        ]);
    }
}
