<?php

namespace App\Http\Controllers\Parent;

use App\Http\Controllers\Controller;
use App\Models\ExamSession;
use App\Models\mock_sessions;
use App\Models\PracticeSession;
use App\Models\QuizSession;
use App\Repositories\TimeSpentRepository;
use App\Repositories\ColorsRepository;
use Illuminate\Http\Request;
use App\Services\MyService;
use Inertia\Inertia;
class TimeSpent extends Controller
{
    private TimeSpentRepository $repository;
    private $last_days = 7 ; # 7 for one week result  'rgba(52, 211, 153,.4)'
    private $time_spent_days =[];
    private $chart_background_color;# array 0 index for line , 1 index for circle color and 2 index for circle hover color

    public function __construct(TimeSpentRepository $repository,ColorsRepository $colors,Request $request)
    {
        $this->middleware(['role:parent|teacher']);
        $this->repository = $repository;
        $this->chart_background_color = [$colors->getPositiveColor(), $colors->transparent()["positive_color"], $colors->getPositiveColor()];
        // time_spent_values
        $time_spent_values = [7, 10, 15, 20, 30];
        foreach ($time_spent_values as $key => $value) {
            if (isset($request->days) && in_array($request->days, $time_spent_values)) {
                array_push($this->time_spent_days, ["value" => $value, "active" => $request->days == $value]);
            } else {
                if ($key == 0) {
                    array_push($this->time_spent_days, ["value" => $value, "active" => true]);
                } else {
                    array_push($this->time_spent_days, ["value" => $value, "active" => false]);
                }
            }
        }
    }
    public function overall(Request $request, MyService $myService)
    {
        // Setting
        $last_days = $request->days? $request->days :$this->last_days;
        // Define Variables
        $childName = '';
        $time_taken_days = [];
        $seven_day_dates = [];
        #Chart Data Variables
        $datasets = [];
        $days = [];
        $minutes = [];
        #Chart Options Variables
        $borderColor = $this->chart_background_color[0];
        $backgroundColor = $this->chart_background_color[1];
        $pointStyle =  'circle';
        $pointRadius =  10;
        $pointHoverRadius =  15;
        $pointHoverBackgroundColor= $this->chart_background_color[2];
        // Set List Of Week
        $monday_date = date_create("now");
        for ($i = 1; $i < $last_days;$i++){
            date_modify($monday_date,"-1 days");
            array_unshift($days, date_format($monday_date, "Y-m-d"));
            array_unshift($seven_day_dates, date_format($monday_date, "M j, Y"));
        }
        array_push($days, date("Y-m-d"));
        array_push($seven_day_dates, date("M j, Y"));

        if($myService->getTotalChildsCount() <= 0){
            return redirect()->route('create_new_child');
        }
        
        if (session()->has("selected_child")) {
            // Get total_time_taken in Exam of selected child
            $examsSession = ExamSession::where('user_id', session("selected_child")["id"])->get();
            foreach ($examsSession as $value) {
                foreach($seven_day_dates as $date){
                    if ($value->completed_at == null) {
                        continue;
                    }
                    // dd($value->completed_at->toFormattedDateString() == $date);
                    if ($value->completed_at->toFormattedDateString() == $date) {
                        if (!empty($time_taken_days[$value->completed_at->toFormattedDateString()])) {
                            $time_taken_days[$value->completed_at->toFormattedDateString("l")] += $value->total_time_taken;
                        }else{
                            $time_taken_days[$value->completed_at->toFormattedDateString("l")] = $value->total_time_taken;
                        }
                    }
                }
            }
            
            // Get total_time_taken in Quizzes of selected child
            $quizSession = QuizSession::where('user_id', session("selected_child")["id"])->get();
            foreach ($quizSession as $value) {
                if($value->completed_at != null){
                    foreach($seven_day_dates as $date){
                        if ($value->completed_at->toFormattedDateString() == $date) {
                            if (!empty($time_taken_days[$value->completed_at->toFormattedDateString()])) {
                                $time_taken_days[$value->completed_at->toFormattedDateString("l")] += $value->total_time_taken;
                            }else{
                                $time_taken_days[$value->completed_at->toFormattedDateString("l")] = $value->total_time_taken;
                            }
                        }
                    }
                }
            }
            // Get total_time_taken in Practices of selected child
            $practiceSession = PracticeSession::where('user_id', session("selected_child")["id"])->get();
            foreach ($practiceSession as $value) {
                foreach($seven_day_dates as $date){
                    if ($value->completed_at == null) {
                        continue;
                    }
                    if ($value->completed_at->toFormattedDateString() == $date) {
                        if (!empty($time_taken_days[$value->completed_at->toFormattedDateString()])) {
                            $time_taken_days[$value->completed_at->toFormattedDateString("l")] += $value->total_time_taken;
                        }else{
                            $time_taken_days[$value->completed_at->toFormattedDateString("l")] = $value->total_time_taken;
                        }
                    }
                }
            }
            // dd($time_taken_days);
            // Set Minutes
            foreach ($seven_day_dates as $value) {
                if (isset($time_taken_days[$value])) {
                    array_push($minutes, ["y"=> number_format($time_taken_days[$value] / 60,2),"seconds"=> $time_taken_days[$value]]);
                    continue;
                }
                array_push($minutes, ["y"=> 0,"seconds"=> 0]);
            }
            // Get selected_child name
            $childName = session("selected_child")["name"];
        }
        // Finalize Data
        array_push($datasets,[
            "label" => "Minutes",
            "data"=>$minutes,
            "backgroundColor"=>$backgroundColor,
            "borderColor"=>$borderColor,
            "pointStyle"=>$pointStyle,
            "pointRadius"=>$pointRadius,
            "pointHoverRadius"=>$pointHoverRadius,
            "pointHoverBackgroundColor"=>$pointHoverBackgroundColor,
            "fill"=>false,
            "tension"=>0
        ]);
        $data = ["labels"=>$days,"datasets" => $datasets];

        return view('Parent/TimeSpent/TimeSpent', [
            'data' => $data,
            'steps' => $this->repository->getProgressLinks('overall_time'),
            "childName" => $childName,
            "heading" => "Overall Time Spent",
            "timeSpentDays"=>$this->time_spent_days
        ]);
    }
    public function exams(Request $request)
    {
        // Setting
        $last_days = $request->days? $request->days :$this->last_days;
        // Define Variables
        $childName = '';
        $time_taken_days = [];
        $seven_day_dates = [];
        #Chart Data Variables
        $datasets = [];
        $days = [];
        $minutes = [];
        #Chart Options Variables
        $borderColor = $this->chart_background_color[0];
        $backgroundColor = $this->chart_background_color[1];
        $pointStyle =  'circle';
        $pointRadius =  10;
        $pointHoverRadius =  15;
        $pointHoverBackgroundColor= $this->chart_background_color[2];
        // Set List Of Week
        $current_date = date_create("now");
        for ($i = 1; $i < $last_days;$i++){
            date_modify($current_date,"-1 days");
            array_unshift($days, date_format($current_date, "Y-m-d"));
            array_unshift($seven_day_dates, date_format($current_date, "M j, Y"));
        }
        array_push($days, date("Y-m-d"));
        array_push($seven_day_dates, date("M j, Y"));
        if (session()->has("selected_child")) {
            // Get total_time_taken in Exam of selected child
            $examsSession = ExamSession::where('user_id', session("selected_child")["id"])->get();
            foreach ($examsSession as $value) {
                foreach($seven_day_dates as $date){
                    // dd($value->completed_at);
                    if ($value->completed_at == null) {
                        continue;
                    }
                    if ($value->completed_at->toFormattedDateString() == $date) {
                        if (!empty($time_taken_days[$value->completed_at->toFormattedDateString()])) {
                            $time_taken_days[$value->completed_at->toFormattedDateString("l")] += $value->total_time_taken;
                        }else{
                            $time_taken_days[$value->completed_at->toFormattedDateString("l")] = $value->total_time_taken;
                        }
                    }
                }
            }
            // Set Minutes
            foreach ($seven_day_dates as $value) {
                if (isset($time_taken_days[$value])) {
                    array_push($minutes, ["y"=> number_format($time_taken_days[$value] / 60,2),"seconds"=> $time_taken_days[$value]]);
                    continue;
                }
                array_push($minutes, ["y"=> 0,"seconds"=> 0]);
            }
            // Get selected_child name
            $childName = session("selected_child")["name"];
        }
        // Finalize Data
        array_push($datasets,[
            "label" => "Minutes",
            "data"=>$minutes,
            "backgroundColor"=>$backgroundColor,
            "borderColor"=>$borderColor,
            "pointStyle"=>$pointStyle,
            "pointRadius"=>$pointRadius,
            "pointHoverRadius"=>$pointHoverRadius,
            "pointHoverBackgroundColor"=>$pointHoverBackgroundColor,
            "fill"=>false,
            "tension"=>0
        ]);
        $data = ["labels"=>$days,"datasets" => $datasets];
        return view('Parent/TimeSpent/Exam', [
            'data' => $data,
            'steps' => $this->repository->getProgressLinks('exams_time'),
            "childName" => $childName,
            "heading" => "Exams Time Spent",
            "timeSpentDays"=>$this->time_spent_days
        ]);
    }
    public function mocks(Request $request)
    {
        // Setting
        $last_days = $request->days? $request->days :$this->last_days;
        // Define Variables
        $childName = '';
        $time_taken_days = [];
        $seven_day_dates = [];
        #Chart Data Variables
        $datasets = [];
        $days = [];
        $minutes = [];
        #Chart Options Variables
        $borderColor = $this->chart_background_color[0];
        $backgroundColor = $this->chart_background_color[1];
        $pointStyle =  'circle';
        $pointRadius =  10;
        $pointHoverRadius =  15;
        $pointHoverBackgroundColor= $this->chart_background_color[2];
        // Set List Of Week
        $current_date = date_create("now");
        for ($i = 1; $i < $last_days;$i++){
            date_modify($current_date,"-1 days");
            array_unshift($days, date_format($current_date, "Y-m-d"));
            array_unshift($seven_day_dates, date_format($current_date, "M j, Y"));
        }
        array_push($days, date("Y-m-d"));
        array_push($seven_day_dates, date("M j, Y"));
        if (session()->has("selected_child")) {
            // Get total_time_taken in Exam of selected child
            $mocksSession = mock_sessions::where('user_id', session("selected_child")["id"])->get();
            foreach ($mocksSession as $value) {
                foreach($seven_day_dates as $date){
                    if ($value->completed_at->toFormattedDateString() == $date) {
                        if (!empty($time_taken_days[$value->completed_at->toFormattedDateString()])) {
                            $time_taken_days[$value->completed_at->toFormattedDateString("l")] += $value->total_time_taken;
                        }else{
                            $time_taken_days[$value->completed_at->toFormattedDateString("l")] = $value->total_time_taken;
                        }
                    }
                }
            }
            // Set Minutes
            foreach ($seven_day_dates as $value) {
                if (isset($time_taken_days[$value])) {
                    array_push($minutes, ["y"=> number_format($time_taken_days[$value] / 60,2),"seconds"=> $time_taken_days[$value]]);
                    continue;
                }
                array_push($minutes, ["y"=> 0,"seconds"=> 0]);
            }
            // Get selected_child name
            $childName = session("selected_child")["name"];
        }
        // Finalize Data
        array_push($datasets,[
            "label" => "Minutes",
            "data"=>$minutes,
            "backgroundColor"=>$backgroundColor,
            "borderColor"=>$borderColor,
            "pointStyle"=>$pointStyle,
            "pointRadius"=>$pointRadius,
            "pointHoverRadius"=>$pointHoverRadius,
            "pointHoverBackgroundColor"=>$pointHoverBackgroundColor,
            "fill"=>false,
            "tension"=>0
        ]);
        $data = ["labels"=>$days,"datasets" => $datasets];
        return Inertia::render('Parent/TimeSpent', [
            'data' => $data,
            'steps' => $this->repository->getProgressLinks('mocks_time'),
            "childName" => $childName,
            "heading" => "Mocks Time Spent",
            "timeSpentDays"=>$this->time_spent_days
        ]);
    }
    public function quizzes(Request $request)
    {
        // Setting
        $last_days = $request->days? $request->days :$this->last_days;
        // Define Variables
        $childName = '';
        $time_taken_days = [];
        $seven_day_dates = [];
        #Chart Data Variables
        $datasets = [];
        $days = [];
        $minutes = [];
        #Chart Options Variables
        $borderColor = $this->chart_background_color[0];
        $backgroundColor = $this->chart_background_color[1];
        $pointStyle =  'circle';
        $pointRadius =  10;
        $pointHoverRadius =  15;
        $pointHoverBackgroundColor= $this->chart_background_color[2];
        // Set List Of Week
        $monday_date = date_create("now");
        for ($i = 1; $i < $last_days;$i++){
            date_modify($monday_date,"-1 days");
            array_unshift($days, date_format($monday_date, "Y-m-d"));
            array_unshift($seven_day_dates, date_format($monday_date, "M j, Y"));
        }
        array_push($days, date("Y-m-d"));
        array_push($seven_day_dates, date("M j, Y"));
        if (session()->has("selected_child")) {
            // Get total_time_taken in Quizzes of selected child
            $examsSession = QuizSession::where('user_id', session("selected_child")["id"])->get();
            foreach ($examsSession as $value) {
                // working here
                if($value->completed_at != null){
                    foreach($seven_day_dates as $date){
                        if ($value->completed_at->toFormattedDateString() == $date) {
                            if (!empty($time_taken_days[$value->completed_at->toFormattedDateString()])) {
                                $time_taken_days[$value->completed_at->toFormattedDateString("l")] += $value->total_time_taken;
                            }else{
                                $time_taken_days[$value->completed_at->toFormattedDateString("l")] = $value->total_time_taken;
                            }
                        }
                    }
                }
            }
            // Set Minutes
            foreach ($seven_day_dates as $value) {
                if (isset($time_taken_days[$value])) {
                    array_push($minutes, ["y"=> number_format($time_taken_days[$value] / 60,2),"seconds"=> $time_taken_days[$value]]);
                    continue;
                }
                array_push($minutes, ["y"=> 0,"seconds"=> 0]);
            }
            // Get selected_child name
            $childName = session("selected_child")["name"];
        }
        // Finalize Data
        array_push($datasets,[
            "label" => "Minutes",
            "data"=>$minutes,
            "backgroundColor"=>$backgroundColor,
            "borderColor"=>$borderColor,
            "pointStyle"=>$pointStyle,
            "pointRadius"=>$pointRadius,
            "pointHoverRadius"=>$pointHoverRadius,
            "pointHoverBackgroundColor"=>$pointHoverBackgroundColor,
            "fill"=>false,
            "tension"=>0
        ]);
        $data = ["labels"=>$days,"datasets" => $datasets];
        return view('Parent/TimeSpent/Quiz', [
            'data' => $data,
            'steps' => $this->repository->getProgressLinks('quiz_time'),
            "childName" => $childName,
            "heading" => "Quizzes Time Spent",
            "timeSpentDays"=>$this->time_spent_days
        ]);
    }
    public function practices(Request $request)
    {
        // Setting
        $last_days = $request->days? $request->days :$this->last_days;
        // Define Variables
        $childName = '';
        $time_taken_days = [];
        $seven_day_dates = [];
        #Chart Data Variables
        $datasets = [];
        $days = [];
        $minutes = [];
        #Chart Options Variables
        $borderColor = $this->chart_background_color[0];
        $backgroundColor = $this->chart_background_color[1];
        $pointStyle =  'circle';
        $pointRadius =  10;
        $pointHoverRadius =  15;
        $pointHoverBackgroundColor= $this->chart_background_color[2];
        // Set List Of Week
        $monday_date = date_create("now");
        for ($i = 1; $i < $last_days;$i++){
            date_modify($monday_date,"-1 days");
            array_unshift($days, date_format($monday_date, "Y-m-d"));
            array_unshift($seven_day_dates, date_format($monday_date, "M j, Y"));
        }
        array_push($days, date("Y-m-d"));
        array_push($seven_day_dates, date("M j, Y"));
        if (session()->has("selected_child")) {
            // Get total_time_taken in Practices of selected child
            $examsSession = PracticeSession::where('user_id', session("selected_child")["id"])->get();
            foreach ($examsSession as $value) {
                if ($value->completed_at == null) {
                    continue;
                }
                foreach($seven_day_dates as $date){
                    if ($value->completed_at->toFormattedDateString() == $date) {
                        if (!empty($time_taken_days[$value->completed_at->toFormattedDateString()])) {
                            $time_taken_days[$value->completed_at->toFormattedDateString("l")] += $value->total_time_taken;
                        }else{
                            $time_taken_days[$value->completed_at->toFormattedDateString("l")] = $value->total_time_taken;
                        }
                    }
                }
            }
            // Set Minutes
            foreach ($seven_day_dates as $value) {
                if (isset($time_taken_days[$value])) {
                    array_push($minutes, ["y"=> number_format($time_taken_days[$value] / 60,2),"seconds"=> $time_taken_days[$value]]);
                    continue;
                }
                array_push($minutes, ["y"=> 0,"seconds"=> 0]);
            }
            // Get selected_child name
            $childName = session("selected_child")["name"];
        }
        // Finalize Data
        array_push($datasets,[
            "label" => "Minutes",
            "data"=>$minutes,
            "backgroundColor"=>$backgroundColor,
            "borderColor"=>$borderColor,
            "pointStyle"=>$pointStyle,
            "pointRadius"=>$pointRadius,
            "pointHoverRadius"=>$pointHoverRadius,
            "pointHoverBackgroundColor"=>$pointHoverBackgroundColor,
            "fill"=>false,
            "tension"=>0
        ]);
        $data = ["labels"=>$days,"datasets" => $datasets];
        return view('Parent/TimeSpent/Practice', [
            'data' => $data,
            'steps' => $this->repository->getProgressLinks('practice_time'),
            "childName" => $childName,
            "heading" => "Practices Time Spent",
            "timeSpentDays"=>$this->time_spent_days
        ]);
    }
}

?>
