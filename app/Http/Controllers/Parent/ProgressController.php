<?php

namespace App\Http\Controllers\Parent;

use App\Http\Controllers\Controller;
use App\Models\AssessmentTestSections;
use App\Models\AssessmentTestSession;
use App\Models\mock_sessions;
use App\Transformers\Platform\UserAssessmnetSessionTransformer;
use App\Transformers\Platform\UserMockSessionTransformer;
use Illuminate\Http\Request;
use App\Models\ExamSession;
use App\Models\PracticeSession;
use App\Models\JourneySession;
use App\Models\QuizSession;
use App\Repositories\ParentRepository;
use App\Transformers\Platform\QuizSessionCardTransformer;
use App\Transformers\Platform\ExamSessionCardTransformer;
use App\Transformers\Platform\PracticeSessionCardTransformer;
use App\Transformers\Platform\JourneySessionCardTransformer;
use App\Transformers\Platform\UserExamSessionTransformer;
use App\Transformers\Platform\UserPracticeSessionTransformer;
use App\Transformers\Platform\UserJourneySessionTransformer;
use App\Transformers\Platform\UserQuizSessionTransformer;
use App\Services\MyService;
use Inertia\Inertia;

class ProgressController extends Controller
{
    /**
     * @var ParentRepository
     */
    private ParentRepository $repository;
    public function __construct(ParentRepository $repository)
    {
        $this->middleware(['role:parent|teacher']);
        $this->repository = $repository;
    }

    /**
     * User My Progress Screen
     *
     * @return \Inertia\Response
     */
    public function Progress(MyService $myService)
    {
        // Fetch Child in-completed practice sessions
        if($myService->getTotalChildsCount() <= 0){
            return redirect()->route('create_new_child');
        }
        if (session()->has("selected_child")) {
            $childName = session("selected_child")["name"];
            $practiceSessions = PracticeSession::with('practiceSet:id,slug,title,skill_id')->where('user_id', session("selected_child")["id"])->pending()->get();
            $practice_sessions = fractal($practiceSessions, new PracticeSessionCardTransformer())->toArray();
        }else{
            $childName = '';
            $quizSessions = [];
        }

        return view('User/MyProgress', [
            'steps' => $this->repository->getProgressNavigatorLinks('progress'),
            'practice_sessions' => $practice_sessions['data'],
            "childName"=> $childName
        ]);
    }

    public function parentJourneyProgress(MyService $myService)
    {
        if($myService->getTotalChildsCount() <= 0){
            return redirect()->route('create_new_child');
        }
        // Fetch Child in-completed journey sessions
        if (session()->has("selected_child")) {
            $childName = session("selected_child")["name"];
            $journeySessions = JourneySession::with('journeySet:id,slug,title,skill_id')->where('user_id', session("selected_child")["id"])->where("status", "started")->where("total_time_taken","<>", 0)->pending()->take(10)->get();
            $journey_sessions = fractal($journeySessions, new JourneySessionCardTransformer())->toArray();
        }else{
            $childName = '';
            $quizSessions = [];
        }

        return view('Parent/MyJourneyProgress', [
            'steps' => $this->repository->getProgressNavigatorLinks('progress'),
            'journey_sessions' => $journey_sessions['data'],
            "childName"=> $childName
        ]);
    }

    /**
     * User My Quizzes Screen
     *
     * @return \Inertia\Response
     */
    public function Quizzes()
    {
        if (session()->has("selected_child")) {
            $sessions = QuizSession::with('quiz:id,slug,title')
                ->where('user_id', session("selected_child")["id"])
                ->where('status', '=', 'completed')
                ->paginate(request()->perPage != null ? request()->perPage : 10);
                $childName = session("selected_child")["name"];
            $sessions = fractal($sessions, new UserQuizSessionTransformer())->toArray();
        }else{
            $childName = '';
            $sessions = ["data"=>[],"meta"=>["pagination"=>["total"=>2]]];
        }
        return view('User/MyQuizzes', [
            'steps' => $this->repository->getProgressNavigatorLinks('quizzes'),
            'quizSessions' => $sessions,
            "childName"=> $childName
        ]);
    }

    /**
     * User My Exams Screen
     *
     * @return \Inertia\Response
     */
    public function Exams()
    {
        if (session()->has("selected_child")) {
            $sessions = ExamSession::with('exam:id,slug,title')
                ->where('user_id', session("selected_child")["id"])
                ->where('status', '=', 'completed')
                ->paginate(request()->perPage != null ? request()->perPage : 10);

            $childName = session("selected_child")["name"];
            $sessions = fractal($sessions, new UserExamSessionTransformer())->toArray();
        }else{
            $childName = '';
            $sessions = ["data"=>[],"meta"=>["pagination"=>["total"=>2]]];
        }
        // dd($sessions);

        

        return view('User/MyExams', [
            'steps' => $this->repository->getProgressNavigatorLinks('exams'),
            'examSessions' => $sessions,
            "childName"=> $childName
        ]);
    }



        /**
     * User My Mocks Screen
     *
     * @return \Inertia\Response
     */
    public function Mocks()
    {
        if (session()->has("selected_child")) {
            $sessions = mock_sessions::with('mock:id,slug,title')
                ->where('user_id', session("selected_child")["id"])
                ->where('status', '=', 'completed')
                ->paginate(request()->perPage != null ? request()->perPage : 10);
            $childName = session("selected_child")["name"];
            $sessions = fractal($sessions, new UserMockSessionTransformer())->toArray();
        }else{
            $childName = '';
            $sessions = ["data"=>[],"meta"=>["pagination"=>["total"=>2]]];
        }


        return Inertia::render('User/MyMocks', [
            'steps' => $this->repository->getProgressNavigatorLinks('mocks'),
            'mockSessions' => $sessions,
            "childName"=> $childName
        ]);
    }

    /**
     * User My Practice Screen
     *
     * @return \Inertia\Response
     */
    public function Practice()
    {
        if (session()->has("selected_child")) {
            $sessions = PracticeSession::with('practiceSet:id,slug,title')
                ->where('user_id', session("selected_child")["id"])
                ->where('status', '=', 'completed')
                ->paginate(request()->perPage != null ? request()->perPage : 10);
                $childName = session("selected_child")["name"];
                // dd($sessions);
                if ($sessions) {
                    # code...
                }
                $sessions = fractal($sessions, new UserPracticeSessionTransformer())->toArray();
        }else{
            $childName = '';
            $sessions = ["data"=>[],"meta"=>["pagination"=>["total"=>2]]];
        }

        return view('User/MyPractice', [
            'steps' => $this->repository->getProgressNavigatorLinks('practice'),
            'practiceSessions' => $sessions,
            "childName"=> $childName
        ]);
    }
    public function myJourney()
    {
        if (session()->has("selected_child")) {
            $sessions = JourneySession::with('journeySet:id,slug,title,subtitle')
                ->where('user_id', session("selected_child")["id"])
                ->where('status', '=', 'completed')
                ->orderBy('updated_at', 'desc')
                ->paginate(request()->perPage != null ? request()->perPage : 10);
                $childName = session("selected_child")["name"];
                // dd($sessions);
                if ($sessions) {
                    # code...
                }
                $sessions = fractal($sessions, new UserJourneySessionTransformer())->toArray();
        }else{
            $childName = '';
            $sessions = ["data"=>[],"meta"=>["pagination"=>["total"=>2]]];
        }
        return view('Parent/MyJourney', [
            'steps' => $this->repository->getProgressNavigatorLinks('journey'),
            'journeySessions' => $sessions,
            "childName"=> $childName
        ]);
    }
    
    public function Assessment()
    {
        if (session()->has("selected_child")) {
            $sessions = AssessmentTestSession::with('assessment:id,slug,title')
                ->where('user_id', session("selected_child")["id"])
                ->where('status', '=', 'completed')
                ->paginate(request()->perPage != null ? request()->perPage : 10);
            $childName = session("selected_child")["name"];
            $sessions = fractal($sessions, new UserAssessmnetSessionTransformer())->toArray();
        }else{
            $childName = '';
            $sessions = ["data"=>[],"meta"=>["pagination"=>["total"=>2]]];
        }

        return Inertia::render('User/MyAssessment', [
            'steps' => $this->repository->getProgressNavigatorLinks('assessment'),
            'assessmentSessions' => $sessions,
            "childName"=> $childName
        ]);
    }
}
