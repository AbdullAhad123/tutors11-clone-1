<?php

namespace App\Http\Controllers\Parent;

use App\Http\Controllers\Controller;
use App\Models\ExamSession;
use App\Models\mock_sessions;
use App\Models\PracticeSession;
use App\Models\QuizSession;
use App\Repositories\AttainmentsRepository;
use App\Repositories\ColorsRepository;
use App\Services\MyService;
use Inertia\Inertia;

class Attainment extends Controller
{
    private AttainmentsRepository $repository;
    private $chart_color;# array 0 index for bar and 1 index for line and text

    public function __construct(AttainmentsRepository $repository,ColorsRepository $colors)
    {
        $this->middleware(['role:parent|teacher']);
        $this->repository = $repository;
        $this->chart_color = [$colors->getPositiveColor(),$colors->getNeutralColor()];
    }
    public function exams(MyService $myService)
    {
        $averagePercentage = 0;
        $percentageCount = 0;
        $titles = [];
        $percentages = [];
        $chart_color = $this->chart_color;
        $childName = '';
        $quizTitles = [];
        $practiceTitles = [];
        $quizPercentages = [];
        $chart_color = $this->chart_color;
        $quizAveragePercentage = 0;
        $quizPercentageCount = 0;
        $accuracies = [];
        $averageAccuracies = 0;
        $accuraciesCount = 0;
        if($myService->getTotalChildsCount() <= 0){
            return redirect()->route('create_new_child');
        }
        if (session()->has("selected_child")) {
            // Get title and percentage of selected child
            $mocksSession = ExamSession::where('user_id', session("selected_child")["id"])->with("exam")->get();
            foreach ($mocksSession as $value) {
                if($value->exam){
                    array_push($titles, $value->exam->title);
                    array_push($percentages, ["x" => $value->results->percentage]);
                }
            }
            // Calculate Average Percentage
            $allPercentage = ExamSession::get();
            foreach ($allPercentage as $value) {
                if (is_numeric($value->results->percentage)) {
                    $averagePercentage += $value->results->percentage;
                    $percentageCount++;
                }
            }
            if ($percentageCount != 0) {
                $averagePercentage /= $percentageCount;
            } else {
                $averagePercentage = 0; 
            }
             // Get title and percentage of selected child
             $quizesSession = QuizSession::where('user_id', session("selected_child")["id"])->with("quiz")->get();
             foreach ($quizesSession as $value) {
                 if($value->quiz){
                    array_push($quizTitles, $value->quiz->title);
                    array_push($quizPercentages, ["x" => $value->results->percentage]);
                 }
             }
             // Calculate Average Percentage
             $allPercentage = QuizSession::get();
             foreach ($allPercentage as $value) {
                 if (is_numeric($value->results->percentage)) {
                     $quizAveragePercentage += $value->results->percentage;
                     $quizPercentageCount++;
                 }
             }
             if ($quizPercentageCount != 0) {
                $quizAveragePercentage /= $quizPercentageCount;
            } else {
                $quizAveragePercentage = 0; 
            }
             // Get title and accuracy of selected child
            $practicesSession = PracticeSession::where('user_id', session("selected_child")["id"])->with("practiceSet")->get();
            foreach ($practicesSession as $value) {
                if($value->practiceSet){
                    array_push($practiceTitles, $value->practiceSet->title);
                    array_push($accuracies, ["x" => $value->results->accuracy]);
                }
            }
            // Calculate Average Accuracy
            $Accuracies = PracticeSession::get();
            foreach ($Accuracies as $value) {
                if (is_numeric($value->results->accuracy)) {
                    $averageAccuracies += $value->results->accuracy;
                    $accuraciesCount++;
                }
            }
            if ($accuraciesCount != 0) {
                $averageAccuracies /= $accuraciesCount;
            } else {
                $averageAccuracies = 0; 
            }
            $childName = session("selected_child")["name"];
        }
        $chart_data = [
            "labels" => $titles,
            "datasets" => [
                [
                    "data" => $percentages,
                    "label" => "Percentage",
                    "backgroundColor" => $chart_color[0]
                ]
            ],
            "averagePercentage" => $averagePercentage,
            "lineColor" => $chart_color[1]
        ];
        $quiz_chart_data = [
            "labels" => $quizTitles,
            "datasets" => [
                [
                    "data" => $quizPercentages,
                    "label" => "Percentage",
                    "backgroundColor" => $chart_color[0]
                ]
            ],
            "quizAveragePercentage" => $quizAveragePercentage,
            "lineColor" => $chart_color[1]
        ];
        $practice_chart_data = [
            "labels" => $practiceTitles,
            "datasets" => [
                [
                    "data" => $accuracies,
                    "label" => "Accuracy",
                    "backgroundColor" => $chart_color[0]
                ]
            ],
            "averagePercentage" => $averageAccuracies,
            "lineColor" => $chart_color[1]
        ];
        
        return view('Parent/Attainments', [
            "chartData" => $chart_data,
            "quizChartData" => $quiz_chart_data,
            "practiceChartData" => $practice_chart_data,
            'steps' => $this->repository->getProgressLinks('exams_attainment'),
            "childName" => $childName,
            "heading" => "Exam",
        ]);
    }
    public function mocks()
    {
        $averagePercentage = 0;
        $percentageCount = 0;
        $titles = [];
        $percentages = [];
        $chart_color = $this->chart_color;
        $childName = '';
        if (session()->has("selected_child")) {
            // Get title and percentage of selected child
            $mocksSession = mock_sessions::where('user_id', session("selected_child")["id"])->with("mock")->get();
            foreach ($mocksSession as $value) {
                if($value->mock){
                    array_push($titles, $value->mock->title);
                    array_push($percentages, ["x" => $value->results->percentage]);
                }
            }
            // Calculate Average Percentage
            $allPercentage = mock_sessions::get();
            foreach ($allPercentage as $value) {
                if (is_numeric($value->results->percentage)) {
                    $averagePercentage += $value->results->percentage;
                    $percentageCount++;
                }
            }
            if ($percentageCount != 0) {
                $averagePercentage /= $percentageCount;
            } else {
                $averagePercentage = 0; 
            }
            $childName = session("selected_child")["name"];
        }
        $chart_data = [
            "labels" => $titles,
            "datasets" => [
                [
                    "data" => $percentages,
                    "label" => "Percentage",
                    "backgroundColor" => $chart_color[0]
                ]
            ],
            "averagePercentage" => $averagePercentage,
            "lineColor" => $chart_color[1]
        ];
        return Inertia::render('Parent/Attainments', [
            "chartData" => $chart_data,
            'steps' => $this->repository->getProgressLinks('mocks_attainment'),
            "childName" => $childName,
            "heading" => "Mock",
        ]);
    }
    public function quiz()
    {
        $titles = [];
        $percentages = [];
        $chart_color = $this->chart_color;
        $averagePercentage = 0;
        $percentageCount = 0;
        $childName = '';
        if (session()->has("selected_child")) {
            // Get title and percentage of selected child
            $quizesSession = QuizSession::where('user_id', session("selected_child")["id"])->with("quiz")->get();
            foreach ($quizesSession as $value) {
                if($value->quiz){
                    array_push($titles, $value->quiz->title);
                    array_push($percentages, ["x" => $value->results->percentage]);
                }
            }
            // Calculate Average Percentage
            $allPercentage = QuizSession::get();
            foreach ($allPercentage as $value) {
                if (is_numeric($value->results->percentage)) {
                    $averagePercentage += $value->results->percentage;
                    $percentageCount++;
                }
            }
            if ($percentageCount != 0) {
                $averagePercentage /= $percentageCount;
            } else {
                $averagePercentage = 0; 
            }
            $childName = session("selected_child")["name"];
        }
        $chart_data = [
            "labels" => $titles,
            "datasets" => [
                [
                    "data" => $percentages,
                    "label" => "Percentage",
                    "backgroundColor" => $chart_color[0]
                ]
            ],
            "averagePercentage" => $averagePercentage,
            "lineColor" => $chart_color[1]
        ];
        return Inertia::render('Parent/Attainments', [
            "chartData" => $chart_data,
            'steps' => $this->repository->getProgressLinks('quiz_attainment'),
            "childName" => $childName,
            "heading" => "Quiz",
        ]);
    }
    public function practice()
    {
        $titles = [];
        $accuracies = [];
        $chart_color = $this->chart_color;
        $averageAccuracies = 0;
        $accuraciesCount = 0;
        $childName = '';
        if (session()->has("selected_child")) {
            // Get title and accuracy of selected child
            $practicesSession = PracticeSession::where('user_id', session("selected_child")["id"])->with("practiceSet")->get();
            foreach ($practicesSession as $value) {
                if($value->practiceSet){
                    array_push($titles, $value->practiceSet->title);
                    array_push($accuracies, ["x" => $value->results->accuracy]);
                }
            }
            // Calculate Average Accuracy
            $Accuracies = PracticeSession::get();
            foreach ($Accuracies as $value) {
                if (is_numeric($value->results->accuracy)) {
                    $averageAccuracies += $value->results->accuracy;
                    $accuraciesCount++;
                }
            }
            if ($accuraciesCount != 0) {
                $averageAccuracies /= $accuraciesCount;
            } else {
                $averageAccuracies = 0; 
            }
            $childName = session("selected_child")["name"];
        }
        $chart_data = [
            "labels" => $titles,
            "datasets" => [
                [
                    "data" => $accuracies,
                    "label" => "Accuracy",
                    "backgroundColor" => $chart_color[0]
                ]
            ],
            "averagePercentage" => $averageAccuracies,
            "lineColor" => $chart_color[1]
        ];
        return Inertia::render('Parent/Attainments', [
            "chartData" => $chart_data,
            'steps' => $this->repository->getProgressLinks('practice_attainment'),
            "childName" => $childName,
            "heading" => "Practice",
        ]);
    }
}


?>
