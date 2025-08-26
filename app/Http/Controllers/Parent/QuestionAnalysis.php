<?php

namespace App\Http\Controllers\Parent;

use App\Http\Controllers\Controller;
use App\Models\mock_sessions;
use Illuminate\Http\Request;
use App\Models\ExamSession;
use App\Models\PracticeSession;
use App\Models\QuizSession;
use App\Models\SubCategory;
use App\Repositories\QuestionsAnalysisRepository;
use App\Repositories\ColorsRepository;
use App\Services\MyService;
use Inertia\Inertia; 

class QuestionAnalysis extends Controller
{
    private QuestionsAnalysisRepository $repository;
    // Analysis Settings
    private $last_days = 7; # Display last days question report | 7 for one week | Always starting today.
    private $repetition = true; # count repeated/same exams,quizzes and practice sets or not | false for Not True for Yes
    private $analysis_days = [];
    private $repeatedQuestions = [];
    private $chart_background_color;# 0 index for unanswered questions , 1 index for correct answer and 2 index for wrong answer
    // 32064a primary color
    public function __construct(QuestionsAnalysisRepository $repository,ColorsRepository $colors,Request $request)
    {
        $this->repository = $repository;
        $this->middleware(['role:parent|teacher']);
        // analysisDays
        $this->chart_background_color = [$colors->getNeutralColor(),$colors->getPositiveColor(),$colors->getNegativeColor()];
        $analysis_values = [7, 10, 15, 20, 30, 40, 50, 60];
        foreach ($analysis_values as $key => $value) {
            if (isset($request->days) && in_array($request->days, $analysis_values)) {
                array_push($this->analysis_days, ["value" => $value, "active" => $request->days == $value]);
            } else {
                if ($key == 0) {
                    array_push($this->analysis_days, ["value" => $value, "active" => true]);
                } else {
                    array_push($this->analysis_days, ["value" => $value, "active" => false]);
                }
            }
        }
        if (isset($request->repetition)) {
            if ($request->repetition == "true") {
                $this->repetition = true;
                array_push($this->repeatedQuestions, ["value"=>true , "text" => "Show Same", "active" => true]);
                array_push($this->repeatedQuestions, ["value"=>false , "text" => "Only One Same", "active" => false]);
            }else{
                $this->repetition = false;
                array_push($this->repeatedQuestions, ["value"=>true , "text" => "Show Same", "active" => false]);
                array_push($this->repeatedQuestions, ["value"=>false , "text" => "Only One Same", "active" => true]);
            }
        }else{
            array_push($this->repeatedQuestions, ["value"=>true , "text" => "Show Same", "active" => true]);
            array_push($this->repeatedQuestions, ["value"=>false , "text" => "Only One Same", "active" => false]);
        }

    }
    public function exams(Request $request, MyService $myService)
    {
        // Define Variables
        $childName = '';
        $exams = []; #for check repeatation
        $sub_category = [];
        // Analysis Settings
        $last_days = $request->days ? $request->days : $this->last_days; # display last days question report | today report must be display | 6 for one week started today
        $repeated_exams = $this->repetition; # count repeated/same exams question or not | false for Not True for Yes

        // overall exams vars
        if (!$repeated_exams) {
            $exam_overall_correct_answers = []; # In this var plus final exam_overall_correct_answers
            $exam_overall_wrong_answers = []; # In this var plus final exam_overall_correct_answers
            $exam_overall_total_questions = []; # In this var plus final exam_overall_total_questions
            $exam_overall_unanswered_questions = []; # In this var plus final exam_overall_total_questions
        }else{
            $exam_overall_correct_answers = 0; # In this var plus final exam_overall_correct_answers
            $exam_overall_wrong_answers = 0; # In this var plus final exam_overall_correct_answers
            $exam_overall_total_questions = 0; # In this var plus final exam_overall_total_questions
            $exam_overall_unanswered_questions = 0; # In this var plus final exam_overall_total_questions
        }
        // seprate exams vars
        if (!$repeated_exams) {
            $exam_correct_answers = 0; # In this var plus final exam_overall_correct_answers
            $exam_total_questions = 0; # In this var plus final exam_overall_total_questions
            $exam_unanswered_questions = 0; # In this var plus final exam_overall_total_questions
            $exam_wrong_answers = 0; # In this var plus final exam_overall_total_questions
        } else {
            $exam_correct_answers = []; # In this var plus final exam_overall_total_questions
            $exam_total_questions = []; # In this var plus final exam_overall_total_questions
            $exam_unanswered_questions = []; # In this var plus final exam_overall_total_questions
            $exam_wrong_answers = []; # In this var plus final exam_overall_total_questions
        }
        $examsChartDatasets = [];
        $examsChartData = [];
        
        if($myService->getTotalChildsCount() <= 0){
            return redirect()->route('create_new_child');
        }
        
        if (session()->has("selected_child")) {
            // get Exam Details
            $exams = [];
            $examsSession = ExamSession::where('user_id', session("selected_child")["id"])->with("exam")->get();
            foreach ($examsSession as $key => $value) {
                if ($value->completed_at == null) {
                    continue;
                }
                if($value->completed_at){
                    if (date_format($value->completed_at, "d") <= date("d") && date_format($value->completed_at, "d") > date("d") - $last_days) {
                        if (!$repeated_exams) {
                            // for Overall Chart ------------>
                            $exam_overall_correct_answers[$value->exam->title]= $value->results->correct_answered_questions;
                            $exam_overall_wrong_answers[$value->exam->title]= $value->results->wrong_answered_questions;
                            $exam_overall_unanswered_questions[$value->exam->title]= $value->results->unanswered_questions;
                            $exam_overall_total_questions[$value->exam->title]= $value->results->total_questions;
                            // <------------
                            if (!is_bool(array_search($value->exam->title, $exams))) {
                                $examsChartData[array_search($value->exam->title, $exams)]["datasets"][0]["data"] = [
                                    $value->results->unanswered_questions,
                                    $value->results->correct_answered_questions,
                                    $value->results->wrong_answered_questions
                                ];
                                continue;
                            } else {
                                array_push($exams, $value->exam->title);
                                $sub_category = SubCategory::where("id", $value->exam->sub_category_id)->get("name")[0]->name;
                                // set question chart data
                                $examsChartDatasets = [
                                    [
                                        "data" => [$value->results->unanswered_questions, $value->results->correct_answered_questions, $value->results->wrong_answered_questions],
                                        "backgroundColor" => $this->chart_background_color,
                                        "totalQuestions" => $value->results->total_questions,
                                        "subCategory" => $sub_category
                                    ]
                                ];
                                array_push($examsChartData, ["labels" => ["Unanswered Questions", "Correct Answers", "Wrong Answers"], "datasets" => $examsChartDatasets]);
                            }
                        } else {
                            array_push($exam_total_questions, $value->results->total_questions);
                            array_push($exam_unanswered_questions, $value->results->unanswered_questions);
                            array_push($exam_correct_answers, $value->results->correct_answered_questions);
                            array_push($exam_wrong_answers, $value->results->wrong_answered_questions);
                            array_push($exams, $value->exam->title);
                            array_push($sub_category, SubCategory::where("id", $value->exam->sub_category_id)->get("name")[0]->name);
                            $exam_overall_correct_answers += $value->results->correct_answered_questions;
                            $exam_overall_wrong_answers += $value->results->wrong_answered_questions;
                            $exam_overall_unanswered_questions += $value->results->unanswered_questions;
                            $exam_overall_total_questions += $value->results->total_questions;
                        }
                    }
                }
            }
            // Get selected_child name
            $childName = session("selected_child")["name"];
        }
        // set data for overall question chart
        $exam_overall_unanswered_questions_calculated = 0;
        $exam_overall_correct_answers_calculated = 0;
        $exam_overall_wrong_answers_calculated = 0;
        $exam_overall_total_questions_calculated = 0;
        if (!is_numeric($exam_overall_total_questions)) {
            foreach ($exam_overall_total_questions as $key => $value) {
                $exam_overall_total_questions_calculated += $value;
                $exam_overall_correct_answers_calculated += $exam_overall_correct_answers[$key];
                $exam_overall_wrong_answers_calculated += $exam_overall_wrong_answers[$key];
                $exam_overall_unanswered_questions_calculated += $exam_overall_unanswered_questions[$key];
            }
        }else{
            $exam_overall_total_questions_calculated = $exam_overall_total_questions;
            $exam_overall_correct_answers_calculated = $exam_overall_correct_answers;
            $exam_overall_wrong_answers_calculated = $exam_overall_wrong_answers;
            $exam_overall_unanswered_questions_calculated = $exam_overall_unanswered_questions;

        }
        $overallChartDatasets = [
            [
                "data" => [$exam_overall_unanswered_questions_calculated, $exam_overall_correct_answers_calculated, $exam_overall_wrong_answers_calculated],
                "backgroundColor" => $this->chart_background_color,
                "totalQuestions" => $exam_overall_total_questions_calculated,
                "subCategory" => $sub_category
            ]
        ];
        $overallChartData = ["labels" => ["Unanswered Questions", "Correct Answers", "Wrong Answers"], "datasets" => $overallChartDatasets, "empty" => $exam_overall_total_questions_calculated == 0];
        // set question chart data
        if (!is_numeric($exam_correct_answers)) {
            foreach ($exam_correct_answers as $key => $value) {
                $examsChartDatasets = [
                    [
                        "data" => [$exam_unanswered_questions[$key], $value, $exam_wrong_answers[$key]],
                        "backgroundColor" => $this->chart_background_color,
                        "totalQuestions" => $exam_total_questions[$key],
                        "subCategory" => $sub_category[$key]
                    ]
                ];
                array_push($examsChartData, ["labels" => ["Unanswered Questions", "Correct Answers", "Wrong Answers"], "datasets" => $examsChartDatasets]);
            }
        }
        return view("Parent/QuestionAnalysis", [
            "heading" => "Exams Questions",
            "steps" => $this->repository->getProgressLinks("exams_question_analysis"),
            "overallChartData" => $overallChartData,
            "titles" => $exams,
            "chartData" => $examsChartData,
            "childName" => $childName,
            "analysisDays" => $this->analysis_days,
            "repeatedQuestionsObject"=>$this->repeatedQuestions
        ]);
    }
    public function mocks(Request $request)
    {
        // Define Variables
        $childName = '';
        $exams = []; #for check repeatation
        $sub_category = [];
        // Analysis Settings
        $last_days = $request->days ? $request->days : $this->last_days; # display last days question report | today report must be display | 6 for one week started today
        $repeated_mocks = $this->repetition; # count repeated/same exams question or not | false for Not True for Yes

        // overall exams vars
        if (!$repeated_mocks) {
            $mock_overall_correct_answers = []; # In this var plus final mock_overall_correct_answers
            $mock_overall_wrong_answers = []; # In this var plus final mock_overall_correct_answers
            $mock_overall_total_questions = []; # In this var plus final mock_overall_total_questions
            $mock_overall_unanswered_questions = []; # In this var plus final mock_overall_total_questions
        }else{
            $mock_overall_correct_answers = 0; # In this var plus final mock_overall_correct_answers
            $mock_overall_wrong_answers = 0; # In this var plus final mock_overall_correct_answers
            $mock_overall_total_questions = 0; # In this var plus final mock_overall_total_questions
            $mock_overall_unanswered_questions = 0; # In this var plus final mock_overall_total_questions
        }
        // seprate exams vars
        if (!$repeated_mocks) {
            $mock_correct_answers = 0; # In this var plus final mock_overall_correct_answers
            $mock_total_questions = 0; # In this var plus final mock_overall_total_questions
            $mock_unanswered_questions = 0; # In this var plus final mock_overall_total_questions
            $mock_wrong_answers = 0; # In this var plus final mock_overall_total_questions
        } else {
            $mock_correct_answers = []; # In this var plus final mock_overall_total_questions
            $mock_total_questions = []; # In this var plus final mock_overall_total_questions
            $mock_unanswered_questions = []; # In this var plus final mock_overall_total_questions
            $mock_wrong_answers = []; # In this var plus final mock_overall_total_questions
        }
        $mocksChartDatasets = [];
        $mocksChartData = [];
        if (session()->has("selected_child")) {
            // get Exam Details
            $mocks = [];
            $mocksSession = mock_sessions::where('user_id', session("selected_child")["id"])->with("mock")->get();
            foreach ($mocksSession as $key => $value) {
                if ($value->completed_at == null) {
                    continue;
                }
                if($value->completed_at){
                    if (date_format($value->completed_at, "d") <= date("d") && date_format($value->completed_at, "d") > date("d") - $last_days) {
                        if (!$repeated_mocks) {
                            // for Overall Chart ------------>
                            $mock_overall_correct_answers[$value->mock->title]= $value->results->correct_answered_questions;
                            $mock_overall_wrong_answers[$value->mock->title]= $value->results->wrong_answered_questions;
                            $mock_overall_unanswered_questions[$value->mock->title]= $value->results->unanswered_questions;
                            $mock_overall_total_questions[$value->mock->title]= $value->results->total_questions;
                            // <------------
                            if (!is_bool(array_search($value->mock->title, $mocks))) {
                                $mocksChartData[array_search($value->mock->title, $mocks)]["datasets"][0]["data"] = [
                                    $value->results->unanswered_questions,
                                    $value->results->correct_answered_questions,
                                    $value->results->wrong_answered_questions
                                ];
                                continue;
                            } else {
                                array_push($mocks, $value->mock->title);
                                $sub_category = SubCategory::where("id", $value->mock->sub_category_id)->get("name")[0]->name;
                                // set question chart data
                                $mocksChartDatasets = [
                                    [
                                        "data" => [$value->results->unanswered_questions, $value->results->correct_answered_questions, $value->results->wrong_answered_questions],
                                        "backgroundColor" => $this->chart_background_color,
                                        "totalQuestions" => $value->results->total_questions,
                                        "subCategory" => $sub_category
                                    ]
                                ];
                                array_push($mocksChartData, ["labels" => ["Unanswered Questions", "Correct Answers", "Wrong Answers"], "datasets" => $mocksChartDatasets]);
                            }
                        } else {
                            array_push($mock_total_questions, $value->results->total_questions);
                            array_push($mock_unanswered_questions, $value->results->unanswered_questions);
                            array_push($mock_correct_answers, $value->results->correct_answered_questions);
                            array_push($mock_wrong_answers, $value->results->wrong_answered_questions);
                            array_push($mocks, $value->mock->title);
                            array_push($sub_category, SubCategory::where("id", $value->mock->sub_category_id)->get("name")[0]->name);
                            $mock_overall_correct_answers += $value->results->correct_answered_questions;
                            $mock_overall_wrong_answers += $value->results->wrong_answered_questions;
                            $mock_overall_unanswered_questions += $value->results->unanswered_questions;
                            $mock_overall_total_questions += $value->results->total_questions;
                        }
                    }
                }
            }
            // Get selected_child name
            $childName = session("selected_child")["name"];
        }
        // set data for overall question chart
        $mock_overall_unanswered_questions_calculated = 0;
        $mock_overall_correct_answers_calculated = 0;
        $mock_overall_wrong_answers_calculated = 0;
        $mock_overall_total_questions_calculated = 0;
        if (!is_numeric($mock_overall_total_questions)) {
            foreach ($mock_overall_total_questions as $key => $value) {
                $mock_overall_total_questions_calculated += $value;
                $mock_overall_correct_answers_calculated += $mock_overall_correct_answers[$key];
                $mock_overall_wrong_answers_calculated += $mock_overall_wrong_answers[$key];
                $mock_overall_unanswered_questions_calculated += $mock_overall_unanswered_questions[$key];
            }
        }else{
            $mock_overall_total_questions_calculated = $mock_overall_total_questions;
            $mock_overall_correct_answers_calculated = $mock_overall_correct_answers;
            $mock_overall_wrong_answers_calculated = $mock_overall_wrong_answers;
            $mock_overall_unanswered_questions_calculated = $mock_overall_unanswered_questions;

        }
        $overallChartDatasets = [
            [
                "data" => [$mock_overall_unanswered_questions_calculated, $mock_overall_correct_answers_calculated, $mock_overall_wrong_answers_calculated],
                "backgroundColor" => $this->chart_background_color,
                "totalQuestions" => $mock_overall_total_questions_calculated,
                "subCategory" => $sub_category
            ]
        ];
        $overallChartData = ["labels" => ["Unanswered Questions", "Correct Answers", "Wrong Answers"], "datasets" => $overallChartDatasets, "empty" => $mock_overall_total_questions_calculated == 0];
        // set question chart data
        if (!is_numeric($mock_correct_answers)) {
            foreach ($mock_correct_answers as $key => $value) {
                $mocksChartDatasets = [
                    [
                        "data" => [$mock_unanswered_questions[$key], $value, $mock_wrong_answers[$key]],
                        "backgroundColor" => $this->chart_background_color,
                        "totalQuestions" => $mock_total_questions[$key],
                        "subCategory" => $sub_category[$key]
                    ]
                ];
                array_push($mocksChartData, ["labels" => ["Unanswered Questions", "Correct Answers", "Wrong Answers"], "datasets" => $mocksChartDatasets]);
            }
        }
        return view("Parent/QuestionAnalysis", [
            "heading" => "Mock Test Questions",
            "steps" => $this->repository->getProgressLinks("mocks_question_analysis"),
            "overallChartData" => $overallChartData,
            "titles" => $mocks,
            "chartData" => $mocksChartData,
            "childName" => $childName,
            "analysisDays" => $this->analysis_days,
            "repeatedQuestionsObject"=>$this->repeatedQuestions
        ]);
    }
    public function quizzes(Request $request)
    {
        // Define Variables
        $childName = '';
        $quizzes = []; #for check repeatation
        $sub_category = [];
        // Analysis Settings
        $last_days = $request->days ? $request->days : $this->last_days; # display last days question report | today report must be display | 6 for one week started today
        $repeated_quizzes = $this->repetition; # count repeated/same quizzes question or not | false for Not True for Yes
        // overall quizzes vars
        if (!$repeated_quizzes) {
            $quiz_overall_correct_answers = []; # In this var plus final quiz_overall_correct_answers
            $quiz_overall_wrong_answers = []; # In this var plus final quiz_overall_correct_answers
            $quiz_overall_total_questions = []; # In this var plus final quiz_overall_total_questions
            $quiz_overall_unanswered_questions = []; # In this var plus final quiz_overall_total_questions
        }else{
            $quiz_overall_correct_answers = 0; # In this var plus final quiz_overall_correct_answers
            $quiz_overall_wrong_answers = 0; # In this var plus final quiz_overall_correct_answers
            $quiz_overall_total_questions = 0; # In this var plus final quiz_overall_total_questions
            $quiz_overall_unanswered_questions = 0; # In this var plus final quiz_overall_total_questions
        }
        // seprate quizzes vars
        if (!$repeated_quizzes) {
            $quiz_correct_answers = 0; # In this var plus final quiz_overall_correct_answers
            $quiz_total_questions = 0; # In this var plus final quiz_overall_total_questions
            $quiz_unanswered_questions = 0; # In this var plus final quiz_overall_total_questions
            $quiz_wrong_answers = 0; # In this var plus final quiz_overall_total_questions
        } else {
            $quiz_correct_answers = []; # In this var plus final quiz_overall_total_questions
            $quiz_total_questions = []; # In this var plus final quiz_overall_total_questions
            $quiz_unanswered_questions = []; # In this var plus final quiz_overall_total_questions
            $quiz_wrong_answers = []; # In this var plus final quiz_overall_total_questions
        }
        $quizzesChartDatasets = [];
        $quizzesChartData = [];
        if (session()->has("selected_child")) {
            // get quiz Details
            $quizzes = [];
            $quizzesSession = QuizSession::where('user_id', session("selected_child")["id"])->with("quiz")->get();
            foreach ($quizzesSession as $key => $value) {
                if($value->completed_at){
                    if (date_format($value->completed_at, "d") <= date("d") && date_format($value->completed_at, "d") >= date("d") - $last_days) {

                        if (!$repeated_quizzes) {
                            // for Overall Chart ------------>
                            $quiz_overall_correct_answers[$value->quiz->title]= $value->results->correct_answered_questions;
                            $quiz_overall_wrong_answers[$value->quiz->title]= $value->results->wrong_answered_questions;
                            $quiz_overall_unanswered_questions[$value->quiz->title]= $value->results->unanswered_questions;
                            $quiz_overall_total_questions[$value->quiz->title]= $value->results->total_questions;
                            // <------------
                            if (!is_bool(array_search($value->quiz->title, $quizzes))) {
                                $quizzesChartData[array_search($value->quiz->title, $quizzes)]["datasets"][0]["data"] = [
                                    $value->results->unanswered_questions,
                                    $value->results->correct_answered_questions,
                                    $value->results->wrong_answered_questions
                                ];
                                continue;
                            } else {
                                array_push($quizzes, $value->quiz->title);
                                $sub_category = SubCategory::where("id", $value->quiz->sub_category_id)->get("name")[0]->name;
                                // set question chart data
                                $quizzesChartDatasets = [
                                    [
                                        "data" => [$value->results->unanswered_questions, $value->results->correct_answered_questions, $value->results->wrong_answered_questions],
                                        "backgroundColor" => $this->chart_background_color,
                                        "totalQuestions" => $value->results->total_questions,
                                        "subCategory" => $sub_category
                                    ]
                                ];
                                array_push($quizzesChartData, ["labels" => ["Unanswered Questions", "Correct Answers", "Wrong Answers"], "datasets" => $quizzesChartDatasets]);
                            }
                        } else {
                            array_push($quiz_total_questions, $value->results->total_questions);
                            array_push($quiz_unanswered_questions, $value->results->unanswered_questions);
                            array_push($quiz_correct_answers, $value->results->correct_answered_questions);
                            array_push($quiz_wrong_answers, $value->results->wrong_answered_questions);
                            array_push($quizzes, $value->quiz->title);
                            array_push($sub_category, SubCategory::where("id", $value->quiz->sub_category_id)->get("name")[0]->name);
                            $quiz_overall_correct_answers += $value->results->correct_answered_questions;
                            $quiz_overall_wrong_answers += $value->results->wrong_answered_questions;
                            $quiz_overall_unanswered_questions += $value->results->unanswered_questions;
                            $quiz_overall_total_questions += $value->results->total_questions;
                        }
                    }
                }
            }
            // Get selected_child name
            $childName = session("selected_child")["name"];
        }
        // set data for overall question chart
        $quiz_overall_unanswered_questions_calculated = 0;
        $quiz_overall_correct_answers_calculated = 0;
        $quiz_overall_wrong_answers_calculated = 0;
        $quiz_overall_total_questions_calculated = 0;
        if (!is_numeric($quiz_overall_total_questions)) {
            foreach ($quiz_overall_total_questions as $key => $value) {
                $quiz_overall_total_questions_calculated += $value;
                $quiz_overall_correct_answers_calculated += $quiz_overall_correct_answers[$key];
                $quiz_overall_wrong_answers_calculated += $quiz_overall_wrong_answers[$key];
                $quiz_overall_unanswered_questions_calculated += $quiz_overall_unanswered_questions[$key];
            }
        }else{
            $quiz_overall_total_questions_calculated = $quiz_overall_total_questions;
            $quiz_overall_correct_answers_calculated = $quiz_overall_correct_answers;
            $quiz_overall_wrong_answers_calculated = $quiz_overall_wrong_answers;
            $quiz_overall_unanswered_questions_calculated = $quiz_overall_unanswered_questions;

        }
        $overallChartDatasets = [
            [
                "data" => [$quiz_overall_unanswered_questions_calculated, $quiz_overall_correct_answers_calculated, $quiz_overall_wrong_answers_calculated],
                "backgroundColor" => $this->chart_background_color,
                "totalQuestions" => $quiz_overall_total_questions_calculated,
                "subCategory" => $sub_category
            ]
        ];
        $overallChartData = ["labels" => ["Unanswered Questions", "Correct Answers", "Wrong Answers"], "datasets" => $overallChartDatasets, "empty" => $quiz_overall_total_questions_calculated == 0];
        // set question chart data
        if (!is_numeric($quiz_correct_answers)) {
            foreach ($quiz_correct_answers as $key => $value) {
                $quizzesChartDatasets = [
                    [
                        "data" => [$quiz_unanswered_questions[$key], $value, $quiz_wrong_answers[$key]],
                        "backgroundColor" => $this->chart_background_color,
                        "totalQuestions" => $quiz_total_questions[$key],
                        "subCategory" => $sub_category[$key]
                    ]
                ];
                array_push($quizzesChartData, ["labels" => ["Unanswered Questions", "Correct Answers", "Wrong Answers"], "datasets" => $quizzesChartDatasets]);
            }
        }
        return view("Parent/QuestionAnalysisQuiz", [
            "heading" => "Quizzes Questions",
            "steps" => $this->repository->getProgressLinks("quizzes_question_analysis"),
            "overallChartData" => $overallChartData,
            "titles" => $quizzes,
            "chartData" => $quizzesChartData,
            "childName" => $childName,
            "analysisDays" => $this->analysis_days,
            "repeatedQuestionsObject"=>$this->repeatedQuestions
        ]);
    }

    public function practices(Request $request)
    {
        // Define Variables
        $childName = '';
        $practices = []; #for check repeatation
        $sub_category = [];
        // Analysis Settings
        $last_days = $request->days ? $request->days : $this->last_days; # display last days question report | today report must be display | 6 for one week started today
        $repeated_practices = $this->repetition; # count repeated/same practices question or not | false for Not True for Yes
        // overall practices vars
        if (!$repeated_practices) {
            $practice_overall_correct_answers = []; # In this var plus final practice_overall_correct_answers
            $practice_overall_wrong_answers = []; # In this var plus final practice_overall_correct_answers
            $practice_overall_total_questions = []; # In this var plus final practice_overall_total_questions
            $practice_overall_unanswered_questions = []; # In this var plus final practice_overall_total_questions
        }else{
            $practice_overall_correct_answers = 0; # In this var plus final practice_overall_correct_answers
            $practice_overall_wrong_answers = 0; # In this var plus final practice_overall_correct_answers
            $practice_overall_total_questions = 0; # In this var plus final practice_overall_total_questions
            $practice_overall_unanswered_questions = 0; # In this var plus final practice_overall_total_questions
        }
        // seprate practices vars
        if (!$repeated_practices) {
            $practice_correct_answers = 0; # In this var plus final practice_overall_correct_answers
            $practice_total_questions = 0; # In this var plus final practice_overall_total_questions
            $practice_unanswered_questions = 0; # In this var plus final practice_overall_total_questions
            $practice_wrong_answers = 0; # In this var plus final practice_overall_total_questions
        } else {
            $practice_correct_answers = []; # In this var plus final practice_overall_total_questions
            $practice_total_questions = []; # In this var plus final practice_overall_total_questions
            $practice_unanswered_questions = []; # In this var plus final practice_overall_total_questions
            $practice_wrong_answers = []; # In this var plus final practice_overall_total_questions
        }
        $practicesChartDatasets = [];
        $practicesChartData = [];
        if (session()->has("selected_child")) {
            // get practice Details
            $practices = [];
            $practicesSession = PracticeSession::where('user_id', session("selected_child")["id"])->with("practiceSet")->get();
            foreach ($practicesSession as $key => $value) {
                if($value->completed_at == null){
                    continue;
                }
                if($value->completed_at && $value->practiceSet != null){
                    if (date_format($value->completed_at, "d") <= date("d") && date_format($value->completed_at, "d") >= date("d") - $last_days) {
                        if (!$repeated_practices) {
                            // for Overall Chart ------------>
                            $practice_overall_correct_answers[$value->practiceSet->title]= $value->results->correct_answered_questions;
                            $practice_overall_wrong_answers[$value->practiceSet->title]= $value->results->wrong_answered_questions;
                            $practice_overall_unanswered_questions[$value->practiceSet->title]= $value->results->unanswered_questions;
                            $practice_overall_total_questions[$value->practiceSet->title]= $value->results->total_questions;
                            // <------------
                            if (!is_bool(array_search($value->practiceSet->title, $practices))) {
                                $practicesChartData[array_search($value->practiceSet->title, $practices)]["datasets"][0]["data"] = [
                                    $value->results->unanswered_questions,
                                    $value->results->correct_answered_questions,
                                    $value->results->wrong_answered_questions
                                ];
                                continue;
                            } else {
                                array_push($practices, $value->practiceSet->title);
                                $sub_category = SubCategory::where("id", $value->practiceSet->sub_category_id)->get("name")[0]->name;
                                // set question chart data
                                $practicesChartDatasets = [
                                    [
                                        "data" => [$value->results->unanswered_questions, $value->results->correct_answered_questions, $value->results->wrong_answered_questions],
                                        "backgroundColor" => $this->chart_background_color,
                                        "totalQuestions" => $value->results->total_questions,
                                        "subCategory" => $sub_category
                                    ]
                                ];
                                array_push($practicesChartData, ["labels" => ["Unanswered Questions", "Correct Answers", "Wrong Answers"], "datasets" => $practicesChartDatasets]);
                            }
                        } else {
                            array_push($practice_total_questions, $value->results->total_questions);
                            array_push($practice_unanswered_questions, $value->results->unanswered_questions);
                            array_push($practice_correct_answers, $value->results->correct_answered_questions);
                            array_push($practice_wrong_answers, $value->results->wrong_answered_questions);
                            array_push($practices, $value->practiceSet->title);
                            array_push($sub_category, SubCategory::where("id", $value->practiceSet->sub_category_id)->get("name")[0]->name);
                            $practice_overall_correct_answers += $value->results->correct_answered_questions;
                            $practice_overall_wrong_answers += $value->results->wrong_answered_questions;
                            $practice_overall_unanswered_questions += $value->results->unanswered_questions;
                            $practice_overall_total_questions += $value->results->total_questions;
                        }
                    }
                }
            }
            // Get selected_child name
            $childName = session("selected_child")["name"];
        }
        // set data for overall question chart
        $practice_overall_unanswered_questions_calculated = 0;
        $practice_overall_correct_answers_calculated = 0;
        $practice_overall_wrong_answers_calculated = 0;
        $practice_overall_total_questions_calculated = 0;
        if (!is_numeric($practice_overall_total_questions)) {
            foreach ($practice_overall_total_questions as $key => $value) {
                $practice_overall_total_questions_calculated += $value;
                $practice_overall_correct_answers_calculated += $practice_overall_correct_answers[$key];
                $practice_overall_wrong_answers_calculated += $practice_overall_wrong_answers[$key];
                $practice_overall_unanswered_questions_calculated += $practice_overall_unanswered_questions[$key];
            }
        }else{
            $practice_overall_total_questions_calculated = $practice_overall_total_questions;
            $practice_overall_correct_answers_calculated = $practice_overall_correct_answers;
            $practice_overall_wrong_answers_calculated = $practice_overall_wrong_answers;
            $practice_overall_unanswered_questions_calculated = $practice_overall_unanswered_questions;

        }
        $overallChartDatasets = [
            [
                "data" => [$practice_overall_unanswered_questions_calculated, $practice_overall_correct_answers_calculated, $practice_overall_wrong_answers_calculated],
                "backgroundColor" => $this->chart_background_color,
                "totalQuestions" => $practice_overall_total_questions_calculated,
                "subCategory" => $sub_category
            ]
        ];
        $overallChartData = ["labels" => ["Unanswered Questions", "Correct Answers", "Wrong Answers"], "datasets" => $overallChartDatasets, "empty" => $practice_overall_total_questions_calculated == 0];
        // set question chart data
        if (!is_numeric($practice_correct_answers)) {
            foreach ($practice_correct_answers as $key => $value) {
                $practicesChartDatasets = [
                    [
                        "data" => [$practice_unanswered_questions[$key], $value, $practice_wrong_answers[$key]],
                        "backgroundColor" => $this->chart_background_color,
                        "totalQuestions" => $practice_total_questions[$key],
                        "subCategory" => $sub_category[$key]
                    ]
                ];
                array_push($practicesChartData, ["labels" => ["Unanswered Questions", "Correct Answers", "Wrong Answers"], "datasets" => $practicesChartDatasets]);
            }
        }
        return view("Parent/QuestionAnalysisPractice", [
            "heading" => "Practices Questions",
            "steps" => $this->repository->getProgressLinks("practices_question_analysis"),
            "overallChartData" => $overallChartData,
            "titles" => $practices,
            "chartData" => $practicesChartData,
            "childName" => $childName,
            "analysisDays" => $this->analysis_days,
            "repeatedQuestionsObject"=>$this->repeatedQuestions
        ]);
    }
}
