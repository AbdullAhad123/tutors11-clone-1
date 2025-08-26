<?php

namespace App\Http\Controllers\Parent;

use Carbon\Carbon;
use Inertia\Inertia;
use App\Models\Skill;
use App\Models\Topic;
use App\Models\Section;
use App\Models\Video;
use App\Models\Journey;
use App\Http\Controllers\Controller;
use App\Models\PracticeSession;
use App\Models\PracticeSet;
use App\Models\SubCategory;
use App\Models\Subscription;
use App\Models\JourneySession;
use App\Models\JourneySet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\SubCategorySections;
use Illuminate\Support\Facades\Auth;
use App\Repositories\ColorsRepository;
use App\Models\PracticeSessionQuestion;
use App\Models\JourneySessionQuestion;
use App\Repositories\MasteryLevelRepository;
use App\Services\MyService;

class MasteryLevel extends Controller
{
    public MasteryLevelRepository $repository;
    private $chart_colors; # 0 index for correct answer , 1 index for wrong answer and 2 index for unanswered questions ,

    public function __construct(MasteryLevelRepository $repository, ColorsRepository $colors)
    {
        $this->repository = $repository;
        $this->chart_colors = [
            $colors->getPositiveColor(),
            $colors->getNegativeColor(),
            $colors->getNeutralColor(),
            $colors->getYellowColor()
        ];
    }
    function parentIndex(Request $request, MyService $myService)
    {        
        if($myService->getTotalChildsCount() <= 0){
            return redirect()->route('create_new_child');
        }
        $sectionId = 0;
        if (isset($request->section)) {
            $skills = Skill::where("section_id", $request->section)->where("is_active", true)->get(["id", "name", "section_id"]);
            $sectionId = $request->section;
        } else {
            $skills = Skill::where("is_active", true)->get(["id", "name", "section_id"]);
        }
        $practice_set_ids = [];
        $practice_set_skill_ids = [];
        $practice_session = [];
        $sections = [];
        $childName = "";
        if (session()->has("selected_child") || Auth::user()->hasRole('student')) {
            if(Auth::user()->hasRole('student')){
                try {
                    $subscription = Subscription::where('user_id', Auth::user()->id)->firstOrFail();
                } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
                    return redirect()->route('select_plan');
                }
                $childName = Auth::user()->name;
            } else {
                try {
                    $subscription = Subscription::where('user_id', session('selected_child')['id'])->firstOrFail();
                } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
                    return redirect()->route('change_child');
                }
                $childName = session("selected_child")["name"];
            }
            $category = SubCategory::where('id', $subscription->category_id)->firstOrFail()->only('id');
            $sectionFrom  = SubCategorySections::with("section")->where("sub_category_id",$category['id'])->get();
            
            
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
                    $results = PracticeSession::where("practice_set_id", $value)->where("user_id", session("selected_child")["id"])->get(["results", "practice_set_id"]);
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
                $sec = Section::where('id',$section->section_id)->active()->first();
                if($sec){
                    $sec = $sec->only(["id", "name", "slug"]);
                    foreach ($skills as $key => $skill) {
                        if($skill->section_id == $section->section_id){
                            $skill_id = $skill->id;
                            $skill_name = $skill->name;
                            $mastery_level = "Not Set";
                            foreach ($practice_set_ids as $key => $value) {
                                if (array_key_exists($skill->id, $value)) {
                                    $mastery_level = "Not Attempt";
                                }
                            }
                            if (array_key_exists($skill->id, $practice_session)) {
                                $total_question = 0;
                                $correct_answered_questions = 0;
                                foreach ($practice_session[$skill->id] as $key => $practice_set) {
                                    $total_question += $practice_set["total_questions"];
                                    $correct_answered_questions += $practice_set["correct_answered_questions"];
                                }
                                $mastery_level = number_format($correct_answered_questions / $total_question * 100, 2);
                            }
                            if(Auth::user()->hasRole('student')){
                                array_push($tableData, ["user_id" => Auth::user()->id, "skill_id" => $skill_id, "skill_name" => $skill_name, "mastery_level" => $mastery_level]);
                            } else {
                                array_push($tableData, ["user_id" => session("selected_child")["id"], "skill_id" => $skill_id, "skill_name" => $skill_name, "mastery_level" => $mastery_level]);
                            }
                        }
                    }
                    array_push($sections, [
                        "section" => $sec, 
                        "tableData" => $tableData
                    ]);
                }
            }
        }
        if (isset($request->section)) {
            $currentRoute = $this->repository->getProgressLinks("mastery-level?section=$request->section");
        } else {
            $currentRoute = $this->repository->getProgressLinks("mastery-level");
        }
        $view = Auth::user()->hasRole('student') ? 'User/MasteryLevel' : 'Parent/MasteryLevel';
        return view($view, [
            "sectionId" => $sectionId,
            "steps" => $currentRoute,
            "sections" => $sections, 
            "chartColors" => $this->chart_colors,
            "childName" => $childName
        ]);
    }
    
    function studentIndex(Request $request)
    {        
        $sectionId = 0;
        if (isset($request->section)) {
            $skills = Skill::where("section_id", $request->section)->where("is_active", true)->get(["id", "name", "section_id"]);
            $sectionId = $request->section;
        } else {
            $skills = Skill::where("is_active", true)->get(["id", "name", "section_id"]);
        }
        $practice_set_ids = [];
        $practice_set_skill_ids = [];
        $practice_session = [];
        $sections = [];
        $childName = "";
        if (session()->has("selected_child") || Auth::user()->hasRole('student')) {
            if(Auth::user()->hasRole('student')){
                try {
                    $subscription = Subscription::where('user_id', Auth::user()->id)->firstOrFail();
                } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
                    return redirect()->route('select_plan');
                }
                $childName = Auth::user()->name;
            } else {
                try {
                    $subscription = Subscription::where('user_id', session('selected_child')['id'])->firstOrFail();
                } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
                    return redirect()->route('change_child');
                }
                $childName = session("selected_child")["name"];
            }
            $category = SubCategory::where('id', $subscription->category_id)->firstOrFail()->only('id');
            $sectionFrom  = SubCategorySections::with("section")->where("sub_category_id",$category['id'])->get();
            
            
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
                    $results = PracticeSession::where("practice_set_id", $value)->where("user_id", session("selected_child")["id"])->get(["results", "practice_set_id"]);
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
                $sec = Section::where('id',$section->section_id)->active()->first();
                if($sec){
                    $sec = $sec->only(["id", "name", "slug"]);
                    foreach ($skills as $key => $skill) {
                        if($skill->section_id == $section->section_id){
                            $skill_id = $skill->id;
                            $skill_name = $skill->name;
                            $mastery_level = "Not Set";
                            foreach ($practice_set_ids as $key => $value) {
                                if (array_key_exists($skill->id, $value)) {
                                    $mastery_level = "Not Attempt";
                                }
                            }
                            if (array_key_exists($skill->id, $practice_session)) {
                                $total_question = 0;
                                $correct_answered_questions = 0;
                                foreach ($practice_session[$skill->id] as $key => $practice_set) {
                                    $total_question += $practice_set["total_questions"];
                                    $correct_answered_questions += $practice_set["correct_answered_questions"];
                                }
                                $mastery_level = number_format($correct_answered_questions / $total_question * 100, 2);
                            }
                            if(Auth::user()->hasRole('student')){
                                array_push($tableData, ["user_id" => Auth::user()->id, "skill_id" => $skill_id, "skill_name" => $skill_name, "mastery_level" => $mastery_level]);
                            } else {
                                array_push($tableData, ["user_id" => session("selected_child")["id"], "skill_id" => $skill_id, "skill_name" => $skill_name, "mastery_level" => $mastery_level]);
                            }
                        }
                    }
                    array_push($sections, [
                        "section" => $sec, 
                        "tableData" => $tableData
                    ]);
                }
            }
        }
        if (isset($request->section)) {
            $currentRoute = $this->repository->getProgressLinks("mastery-level?section=$request->section");
        } else {
            $currentRoute = $this->repository->getProgressLinks("mastery-level");
        }
        $view = Auth::user()->hasRole('student') ? 'User/MasteryLevel' : 'Parent/MasteryLevel';
        return view($view, [
            "sectionId" => $sectionId,
            "steps" => $currentRoute,
            "sections" => $sections, 
            "chartColors" => $this->chart_colors,
            "childName" => $childName,
        ]);
    }
    function studentJourneyIndex(Request $request)
    {        
        $sectionId = 0;
        if (isset($request->section)) {
            $skills = Skill::where("section_id", $request->section)->where("is_active", true)->get(["id", "name", "section_id"]);
            $sectionId = $request->section;
        } else {
            $skills = Skill::where("is_active", true)->get(["id", "name", "section_id"]);
        }
        $journey_set_ids = [];
        $journey_set_skill_ids = [];
        $journey_session = [];
        $sections = [];
        $childName = "";
        if (session()->has("selected_child") || Auth::user()->hasRole('student')) {
            if(Auth::user()->hasRole('student')){
                try {
                    $subscription = Subscription::where('user_id', Auth::user()->id)->firstOrFail();
                } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
                    return redirect()->route('select_plan');
                }
                $childName = Auth::user()->name;
            } else {
                try {
                    $subscription = Subscription::where('user_id', session('selected_child')['id'])->firstOrFail();
                } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
                    return redirect()->route('change_child');
                }
                $childName = session("selected_child")["name"];
            }
            $category = SubCategory::where('id', $subscription->category_id)->firstOrFail()->only('id');
            $sectionFrom = Journey::with("section")->where("sub_category_id",$category['id'])->get();
            
            foreach ($skills as $value1) {
                $id = journeySet::where("skill_id", $value1->id)->where("is_active", true)->get(["id", "skill_id"]);
                foreach ($id as $key => $value) {
                    array_push($journey_set_ids, [$id[$key]->skill_id => $id[$key]->id]);
                    $journey_set_skill_ids[$id[$key]->id] = $id[$key]->skill_id;

                }
            }
            foreach ($journey_set_ids as $key => $value) {
                if(Auth::user()->hasRole('student')){
                    $results = journeySession::where("journey_set_id", $value)->where("user_id", Auth::user()->id)->get(["results", "journey_set_id"]);
                } else {
                    $results = journeySession::where("journey_set_id", $value)->where("user_id", session("selected_child")["id"])->get(["results", "journey_set_id"]);
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
                $sec = Section::find($section->section_id)->only("id", "name", "slug");
                foreach ($skills as $key => $skill) {
                    if($skill->section_id == $section->section_id){
                        $skill_id = $skill->id;
                        $skill_name = $skill->name;
                        $mastery_level = "Not Set";
                        foreach ($journey_set_ids as $key => $value) {
                            if (array_key_exists($skill->id, $value)) {
                                $mastery_level = "Not Attempt";
                            }
                        }
                        if (array_key_exists($skill->id, $journey_session)) {
                            $total_question = 0;
                            $correct_answered_questions = 0;
                            foreach ($journey_session[$skill->id] as $key => $journey_set) {
                                $total_question += $journey_set["total_questions"];
                                $correct_answered_questions += $journey_set["correct_answered_questions"];
                            }
                            $mastery_level = number_format($correct_answered_questions / $total_question * 100, 2);
                        }
                        if(Auth::user()->hasRole('student')){
                            array_push($tableData, ["user_id" => Auth::user()->id, "skill_id" => $skill_id, "skill_name" => $skill_name, "mastery_level" => $mastery_level]);
                        } else {
                            array_push($tableData, ["user_id" => session("selected_child")["id"], "skill_id" => $skill_id, "skill_name" => $skill_name, "mastery_level" => $mastery_level]);
                        }
                    }
                }
                array_push($sections, [
                    "section" => $sec, 
                    "tableData" => $tableData
                ]);
            }
        }
        if (isset($request->section)) {
            $currentRoute = $this->repository->getProgressLinks("mastery-level?section=$request->section");
        } else {
            $currentRoute = $this->repository->getProgressLinks("mastery-level");
        }
        $view = Auth::user()->hasRole('student') ? 'User/MasteryLevel' : 'Parent/MasteryLevel';
        return view($view, [
            "sectionId" => $sectionId,
            "steps" => $currentRoute,
            "sections" => $sections, 
            "chartColors" => $this->chart_colors,
            "childName" => $childName,
        ]);
    }
    function parentJourneyIndex(Request $request, MyService $myService)
    {        
        if($myService->getTotalChildsCount() <= 0){
            return redirect()->route('create_new_child');
        }
        $sectionId = 0;
        if (isset($request->section)) {
            $skills = Skill::where("section_id", $request->section)->where("is_active", true)->get(["id", "name", "section_id"]);
            $sectionId = $request->section;
        } else {
            $skills = Skill::where("is_active", true)->get(["id", "name", "section_id"]);
        }
        $journey_set_ids = [];
        $journey_set_skill_ids = [];
        $journey_session = [];
        $sections = [];
        $childName = "";
        if (session()->has("selected_child") || Auth::user()->hasRole('student')) {
            if(Auth::user()->hasRole('student')){
                try {
                    $subscription = Subscription::where('user_id', Auth::user()->id)->firstOrFail();
                } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
                    return redirect()->route('select_plan');
                }
                $childName = Auth::user()->name;
            } else {
                try {
                    $subscription = Subscription::where('user_id', session('selected_child')['id'])->firstOrFail();
                } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
                    return redirect()->route('change_child');
                }
                $childName = session("selected_child")["name"];
            }
            $category = SubCategory::where('id', $subscription->category_id)->firstOrFail()->only('id');
            $sectionFrom = Journey::with("section")->where("sub_category_id",$category['id'])->get();
            
            foreach ($skills as $value1) {
                $id = journeySet::where("skill_id", $value1->id)->where("is_active", true)->get(["id", "skill_id"]);
                foreach ($id as $key => $value) {
                    array_push($journey_set_ids, [$id[$key]->skill_id => $id[$key]->id]);
                    $journey_set_skill_ids[$id[$key]->id] = $id[$key]->skill_id;

                }
            }
            foreach ($journey_set_ids as $key => $value) {
                if(Auth::user()->hasRole('student')){
                    $results = journeySession::where("journey_set_id", $value)->where("user_id", Auth::user()->id)->get(["results", "journey_set_id"]);
                } else {
                    $results = journeySession::where("journey_set_id", $value)->where("user_id", session("selected_child")["id"])->get(["results", "journey_set_id"]);
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
                $sec = Section::find($section->section_id)->only("id", "name", "slug");
                foreach ($skills as $key => $skill) {
                    if($skill->section_id == $section->section_id){
                        $skill_id = $skill->id;
                        $skill_name = $skill->name;
                        $mastery_level = "Not Set";
                        foreach ($journey_set_ids as $key => $value) {
                            if (array_key_exists($skill->id, $value)) {
                                $mastery_level = "Not Attempt";
                            }
                        }
                        if (array_key_exists($skill->id, $journey_session)) {
                            $total_question = 0;
                            $correct_answered_questions = 0;
                            foreach ($journey_session[$skill->id] as $key => $journey_set) {
                                $total_question += $journey_set["total_questions"];
                                $correct_answered_questions += $journey_set["correct_answered_questions"];
                            }
                            $mastery_level = number_format($correct_answered_questions / $total_question * 100, 2);
                        }
                        if(Auth::user()->hasRole('student')){
                            array_push($tableData, ["user_id" => Auth::user()->id, "skill_id" => $skill_id, "skill_name" => $skill_name, "mastery_level" => $mastery_level]);
                        } else {
                            array_push($tableData, ["user_id" => session("selected_child")["id"], "skill_id" => $skill_id, "skill_name" => $skill_name, "mastery_level" => $mastery_level]);
                        }
                    }
                }
                array_push($sections, [
                    "section" => $sec, 
                    "tableData" => $tableData
                ]);
            }
        }
        if (isset($request->section)) {
            $currentRoute = $this->repository->getProgressLinks("mastery-level?section=$request->section");
        } else {
            $currentRoute = $this->repository->getProgressLinks("mastery-level");
        }
        $view = Auth::user()->hasRole('student') ? 'User/MasteryLevel' : 'Parent/MasteryLevel';
        return view($view, [
            "sectionId" => $sectionId,
            "steps" => $currentRoute,
            "sections" => $sections, 
            "chartColors" => $this->chart_colors,
            "childName" => $childName,
        ]);
    }
    
    function parentPerformance($id)
    {
        if(auth()->user()->roles()->first()->name == 'student'){
            $u_id = auth()->user()->id;
        } else {
            if (!session()->has("selected_child") || !isset(session("selected_child")["classId"])) {
                return redirect()->route('change_child');
            }
            $u_id = session("selected_child")["id"];
        }
        $results = [];
        $strong_level = [];
        $weak_level = [];
        try {
            $subscription = Subscription::where('user_id', $u_id)->firstOrFail();
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->route('change_child');
        }
        $category = SubCategory::where('id', $subscription->category_id)->firstOrFail();
        $section = Section::findOrFail($id);
        $current_section = $section;
        $skills = Skill::where("is_active", true)->where("section_id", $section->id)->get(["id", "name", "section_id"]);
        $skill_ques = [];
        foreach($skills as $skill){
            $topics = Topic::where("is_active", true)->where("skill_id", $skill->id)->get(["id", "name", "skill_id", "helpsheet"]);
            $topic_ques = [];
            foreach($topics as $key => $topic){
                $total_question = 0;
                $correct_answered_questions = 0;
                $last_seen = "--";
                $sess_ques = PracticeSessionQuestion::where('status', 'answered')
                ->whereHas('question', function ($query) use ($topic) {
                    $query->where('topic_id', $topic->id);
                })
                ->with('practiceSession') // Eager load the practice_sessions relationship
                ->get()
                ->filter(function ($item) use ($u_id) {
                    return $item->practiceSession->user_id == $u_id;
                });

                $practice_set_ques = DB::table('practice_set_questions')
                ->join('questions', 'practice_set_questions.question_id', '=', 'questions.id')
                ->where('questions.topic_id', '=', $topic->id)->get();


                foreach($sess_ques as $ques){
                    if($ques->is_correct){
                        $correct_answered_questions += 1;
                    }
                    $total_question += 1;
                    $set = PracticeSession::findOrFail($ques->practice_session_id);
                }
                $mastery_level = 0;
                if(count($practice_set_ques) > 0 && count($sess_ques) == 0){
                    $mastery_level = "Not Attempt";
                } else if(count($practice_set_ques) == 0 && count($sess_ques) == 0){
                    $mastery_level = "Not Set";
                }
                if($correct_answered_questions > 0 && $total_question > 0){
                    $mastery_level = number_format($correct_answered_questions / $total_question * 100, 2);
                }
                if($mastery_level >= 89 && $mastery_level <= 100){

                    $mastery_msg = "Master";
                    array_push($strong_level, $topic->name);
                } 
                if($mastery_level >= 83 && $mastery_level <= 88) {
                    $mastery_msg = "Strong";
                    array_push($strong_level, $topic->name);
                } 
                if($mastery_level >= 69 && $mastery_level <= 82) {
                    $mastery_msg = "Good";
                } 
                if($mastery_level <= 68) {
                    $mastery_msg = "Need Practice";
                    array_push($weak_level, $topic->name);
                }
                if($mastery_level == 'Not Attempt'){
                    $mastery_msg = "Not Attempt";
                }
                if($mastery_level == 'Not Set'){
                    $mastery_msg = "Not Set";
                }

                $last_seen = DB::table('practice_session_questions')
                    ->select('practice_sessions.completed_at')
                    ->where('practice_session_questions.status', 'answered')
                    ->join('questions', 'practice_session_questions.question_id', '=', 'questions.id')
                    ->where('questions.topic_id', '=', $topic->id)
                    ->leftJoin('practice_sessions', 'practice_session_questions.practice_session_id', '=', 'practice_sessions.id')
                    ->orderBy('practice_sessions.completed_at', 'desc')
                    ->first();

                $videos = Video::where('topic_id', $topic->id)->get();

                $t = [
                    "id" => $topic->id,
                    "name" => $topic->name,
                    "skill_id" => $topic->skill_id,
                    "mastery_level" => $mastery_level,
                    "mastery_msg" => isset($mastery_msg) ? $mastery_msg : null,
                    "last_seen" => isset($last_seen->completed_at) ? str_replace("-","/",substr($last_seen->completed_at, 0, strrpos($last_seen->completed_at, ' '))) : "--",
                    "videos" => $videos,
                    "helpsheet" => $topic->helpsheet,
                ];
                array_push($topic_ques, $t);
            }
            $s = [
                "id" => $skill->id,
                "name" => $skill->name,
                "section_id" => $skill->section_id,
                "topics" => $topic_ques
            ];
            array_push($skill_ques, $s);
        }
        $student_correct = PracticeSession::where('status', 'completed')
            ->where('user_id', $u_id)
            ->whereHas('practiceSet.skill', function ($query) use ($section) {
                $query->where('section_id', $section->id);
            })
            ->get();

        $student_totalCorrect = $student_correct->sum(function ($practiceSession) {
            return data_get($practiceSession, 'results.correct_answered_questions', 0);
        });

        $student_ques = PracticeSession::where('status', 'completed')
            ->where('user_id', $u_id)
            ->whereHas('practiceSet.skill', function ($query) use ($section) {
                $query->where('section_id', $section->id);
            })
            ->get();

        $student_totalQues = $student_ques->sum(function ($practiceSession) {
            return data_get($practiceSession, 'results.total_questions', 0);
        });

        $all_student_correct = PracticeSession::where('status', 'completed')
            ->whereHas('practiceSet.skill', function ($query) use ($section) {
                $query->where('section_id', $section->id);
            })
            ->get();

        $all_student_totalCorrect = $all_student_correct->sum(function ($practiceSession) {
            return data_get($practiceSession, 'results.correct_answered_questions', 0);
        });

        $all_student_ques = PracticeSession::where('status', 'completed')
            ->whereHas('practiceSet.skill', function ($query) use ($section) {
                $query->where('section_id', $section->id);
            })
            ->get();

        $all_student_totalQues = $all_student_ques->sum(function ($practiceSession) {
            return data_get($practiceSession, 'results.total_questions', 0);
        });


        $currentYear = Carbon::now()->year;
        


        

        $sec_mastery = PracticeSession::where('status', 'completed')
        ->where('user_id', $u_id)
        ->whereYear('created_at', $currentYear)
        ->whereHas('practiceSet.skill', function ($query) use ($section) {
            $query->where('section_id', $section->id);
        })->get();

        $sec_year_mastery = [
            "Jan" => [
                "total" => 0,
                "correct" => 0, 
            ],
            "Feb" => [
                "total" => 0,
                "correct" => 0,
            ],
            "Mar" => [
                "total" => 0,
                "correct" => 0,
            ],
            "Apr" => [
                "total" => 0,
                "correct" => 0,
            ],
            "May" => [
                "total" => 0,
                "correct" => 0,
            ],
            "Jun" => [
                "total" => 0,
                "correct" => 0,
            ],
            "Jul" => [
                "total" => 0,
                "correct" => 0,
            ],
            "Aug" => [
                "total" => 0,
                "correct" => 0,
            ],
            "Sep" => [
                "total" => 0,
                "correct" => 0,
            ],
            "Oct" => [
                "total" => 0,
                "correct" => 0,
            ],
            "Nov" => [
                "total" => 0,
                "correct" => 0,
            ],
            "Dec" => [
                "total" => 0,
                "correct" => 0,
            ],
        ];

        foreach($sec_mastery as $mastery) {
            $completedAt = Carbon::parse($mastery->completed_at);
            $month = $completedAt->format('M');
            $sec_year_mastery[$month]['total'] += $mastery['results']['total_questions'];
            $sec_year_mastery[$month]['correct'] += $mastery['results']['correct_answered_questions'];
        }
        foreach($sec_year_mastery as $key => $month){
            if($month['correct'] > 0){
                $sec_year_mastery[$key] = number_format($month['correct'] / $month['total'] * 100, 2);
            } else {
                $sec_year_mastery[$key] = 0;
            }
        }

        $practice_set_ids = [];
        $practice_set_skill_ids = [];
        $practice_session = [];
        $sections = [];
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
            $results = PracticeSession::where("practice_set_id", $value)->where("user_id", $u_id)->get(["results", "practice_set_id"]);
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
            $sec = Section::where('id',$section->section_id)->active()->first();
            if($sec){
                $sec = $sec->only(["id", "name", "slug"]);
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
                    $mastery_message = "Master";
                }
                array_push($sections, [
                    "id" => $sec['id'],
                    "name" => $sec['name'],
                    "slug" => $sec['slug'],
                    "mastery_level" => $mastery_message,
                ]);
            }
        }
        return view("Parent/Performance", [
            "year" => $category->name,
            "topics" => $skill_ques,
            "student_comparison" => $student_totalCorrect != 0 || $student_totalQues != 0 ? number_format($student_totalCorrect / $student_totalQues * 100, 0) : 0,
            "all_comparison" => $all_student_totalCorrect != 0 || $all_student_totalQues != 0 ? number_format($all_student_totalCorrect / $all_student_totalQues * 100, 0) : 0,
            "sec_year_mastery" => $sec_year_mastery,
            "sections" => $sections,
            "current_section" => $current_section,
            "strong_levels" => $strong_level,
            "weak_levels" => $weak_level,
        ]);
    }
    function studentPerformance($id)
    {
        if(auth()->user()->roles()->first()->name == 'student'){
            $u_id = auth()->user()->id;
        } else {
            if (!session()->has("selected_child") || !isset(session("selected_child")["classId"])) {
                return redirect()->route('change_child');
            }
            $u_id = session("selected_child")["id"];
        }
        $results = [];
        $strong_level = [];
        $weak_level = [];
        try {
            $subscription = Subscription::where('user_id', $u_id)->firstOrFail();
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->route('change_child');
        }
        $category = SubCategory::where('id', $subscription->category_id)->firstOrFail();
        $section = Section::findOrFail($id);
        $current_section = $section;
        $skills = Skill::where("is_active", true)->where("section_id", $section->id)->get(["id", "name", "section_id"]);
        $skill_ques = [];
        foreach($skills as $skill){
            $topics = Topic::where("is_active", true)->where("skill_id", $skill->id)->get(["id", "name", "skill_id", "helpsheet"]);
            $topic_ques = [];
            foreach($topics as $key => $topic){
                $total_question = 0;
                $correct_answered_questions = 0;
                $last_seen = "--";
                $sess_ques = PracticeSessionQuestion::where('status', 'answered')
                ->whereHas('question', function ($query) use ($topic) {
                    $query->where('topic_id', $topic->id);
                })
                ->with('practiceSession') // Eager load the practice_sessions relationship
                ->get()
                ->filter(function ($item) use ($u_id) {
                    return $item->practiceSession->user_id == $u_id;
                });

                $practice_set_ques = DB::table('practice_set_questions')
                ->join('questions', 'practice_set_questions.question_id', '=', 'questions.id')
                ->where('questions.topic_id', '=', $topic->id)->get();


                foreach($sess_ques as $ques){
                    if($ques->is_correct){
                        $correct_answered_questions += 1;
                    }
                    $total_question += 1;
                    $set = PracticeSession::findOrFail($ques->practice_session_id);
                }
                $mastery_level = 0;
                if(count($practice_set_ques) > 0 && count($sess_ques) == 0){
                    $mastery_level = "Not Attempt";
                } else if(count($practice_set_ques) == 0 && count($sess_ques) == 0){
                    $mastery_level = "Not Set";
                }
                if($correct_answered_questions > 0 && $total_question > 0){
                    $mastery_level = number_format($correct_answered_questions / $total_question * 100, 2);
                }
                if($mastery_level >= 89 && $mastery_level <= 100){

                    $mastery_msg = "Master";
                    array_push($strong_level, $topic->name);
                } 
                if($mastery_level >= 83 && $mastery_level <= 88) {
                    $mastery_msg = "Strong";
                    array_push($strong_level, $topic->name);
                } 
                if($mastery_level >= 69 && $mastery_level <= 82) {
                    $mastery_msg = "Good";
                } 
                if($mastery_level <= 68) {
                    $mastery_msg = "Need Practice";
                    array_push($weak_level, $topic->name);
                }
                if($mastery_level == 'Not Attempt'){
                    $mastery_msg = "Not Attempt";
                }
                if($mastery_level == 'Not Set'){
                    $mastery_msg = "Not Set";
                }

                $last_seen = DB::table('practice_session_questions')
                    ->select('practice_sessions.completed_at')
                    ->where('practice_session_questions.status', 'answered')
                    ->join('questions', 'practice_session_questions.question_id', '=', 'questions.id')
                    ->where('questions.topic_id', '=', $topic->id)
                    ->leftJoin('practice_sessions', 'practice_session_questions.practice_session_id', '=', 'practice_sessions.id')
                    ->orderBy('practice_sessions.completed_at', 'desc')
                    ->first();

                $videos = Video::where('topic_id', $topic->id)->get();

                $t = [
                    "id" => $topic->id,
                    "name" => $topic->name,
                    "skill_id" => $topic->skill_id,
                    "mastery_level" => $mastery_level,
                    "mastery_msg" => isset($mastery_msg) ? $mastery_msg : null,
                    "last_seen" => isset($last_seen->completed_at) ? str_replace("-","/",substr($last_seen->completed_at, 0, strrpos($last_seen->completed_at, ' '))) : "--",
                    "videos" => $videos,
                    "helpsheet" => $topic->helpsheet,
                ];
                array_push($topic_ques, $t);
            }
            $s = [
                "id" => $skill->id,
                "name" => $skill->name,
                "section_id" => $skill->section_id,
                "topics" => $topic_ques
            ];
            array_push($skill_ques, $s);
        }
        $student_correct = PracticeSession::where('status', 'completed')
            ->where('user_id', $u_id)
            ->whereHas('practiceSet.skill', function ($query) use ($section) {
                $query->where('section_id', $section->id);
            })
            ->get();

        $student_totalCorrect = $student_correct->sum(function ($practiceSession) {
            return data_get($practiceSession, 'results.correct_answered_questions', 0);
        });

        $student_ques = PracticeSession::where('status', 'completed')
            ->where('user_id', $u_id)
            ->whereHas('practiceSet.skill', function ($query) use ($section) {
                $query->where('section_id', $section->id);
            })
            ->get();

        $student_totalQues = $student_ques->sum(function ($practiceSession) {
            return data_get($practiceSession, 'results.total_questions', 0);
        });

        $all_student_correct = PracticeSession::where('status', 'completed')
            ->whereHas('practiceSet.skill', function ($query) use ($section) {
                $query->where('section_id', $section->id);
            })
            ->get();

        $all_student_totalCorrect = $all_student_correct->sum(function ($practiceSession) {
            return data_get($practiceSession, 'results.correct_answered_questions', 0);
        });

        $all_student_ques = PracticeSession::where('status', 'completed')
            ->whereHas('practiceSet.skill', function ($query) use ($section) {
                $query->where('section_id', $section->id);
            })
            ->get();

        $all_student_totalQues = $all_student_ques->sum(function ($practiceSession) {
            return data_get($practiceSession, 'results.total_questions', 0);
        });


        $currentYear = Carbon::now()->year;
        


        

        $sec_mastery = PracticeSession::where('status', 'completed')
        ->where('user_id', $u_id)
        ->whereYear('created_at', $currentYear)
        ->whereHas('practiceSet.skill', function ($query) use ($section) {
            $query->where('section_id', $section->id);
        })->get();

        $sec_year_mastery = [
            "Jan" => [
                "total" => 0,
                "correct" => 0, 
            ],
            "Feb" => [
                "total" => 0,
                "correct" => 0,
            ],
            "Mar" => [
                "total" => 0,
                "correct" => 0,
            ],
            "Apr" => [
                "total" => 0,
                "correct" => 0,
            ],
            "May" => [
                "total" => 0,
                "correct" => 0,
            ],
            "Jun" => [
                "total" => 0,
                "correct" => 0,
            ],
            "Jul" => [
                "total" => 0,
                "correct" => 0,
            ],
            "Aug" => [
                "total" => 0,
                "correct" => 0,
            ],
            "Sep" => [
                "total" => 0,
                "correct" => 0,
            ],
            "Oct" => [
                "total" => 0,
                "correct" => 0,
            ],
            "Nov" => [
                "total" => 0,
                "correct" => 0,
            ],
            "Dec" => [
                "total" => 0,
                "correct" => 0,
            ],
        ];

        foreach($sec_mastery as $mastery) {
            $completedAt = Carbon::parse($mastery->completed_at);
            $month = $completedAt->format('M');
            $sec_year_mastery[$month]['total'] += $mastery['results']['total_questions'];
            $sec_year_mastery[$month]['correct'] += $mastery['results']['correct_answered_questions'];
        }
        foreach($sec_year_mastery as $key => $month){
            if($month['correct'] > 0){
                $sec_year_mastery[$key] = number_format($month['correct'] / $month['total'] * 100, 2);
            } else {
                $sec_year_mastery[$key] = 0;
            }
        }

        $practice_set_ids = [];
        $practice_set_skill_ids = [];
        $practice_session = [];
        $sections = [];
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
            $results = PracticeSession::where("practice_set_id", $value)->where("user_id", $u_id)->get(["results", "practice_set_id"]);
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
            $sec = Section::where('id',$section->section_id)->active()->first();
            if($sec){
                $sec = $sec->only(["id", "name", "slug"]);
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
                    $mastery_message = "Master";
                }
                array_push($sections, [
                    "id" => $sec['id'],
                    "name" => $sec['name'],
                    "slug" => $sec['slug'],
                    "mastery_level" => $mastery_message,
                ]);
            }
        }
        return view("User/Performance", [
            "year" => $category->name,
            "topics" => $skill_ques,
            "student_comparison" => $student_totalCorrect != 0 || $student_totalQues != 0 ? number_format($student_totalCorrect / $student_totalQues * 100, 0) : 0,
            "all_comparison" => $all_student_totalCorrect != 0 || $all_student_totalQues != 0 ? number_format($all_student_totalCorrect / $all_student_totalQues * 100, 0) : 0,
            "sec_year_mastery" => $sec_year_mastery,
            "sections" => $sections,
            "current_section" => $current_section,
            "strong_levels" => $strong_level,
            "weak_levels" => $weak_level,
        ]);
    }
    function studentJourneyPerformance(Request $request)
    {
        if(auth()->user()->roles()->first()->name == 'student'){
            $u_id = auth()->user()->id;
        } else {
            if (!session()->has("selected_child") || !isset(session("selected_child")["classId"])) {
                return redirect()->route('change_child');
            }
            $u_id = session("selected_child")["id"];
        }
        $results = [];
        $strong_level = [];
        $weak_level = [];
        try {
            $subscription = Subscription::where('user_id', $u_id)->firstOrFail();
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            if(auth()->user()->roles()->first()->name == 'student') {
                return redirect()->route('select_plan');
            } else {
                return redirect()->route('change_child');
            }
            
        }
        if ($request->has('subject')) {
            $id  = $request->query('subject');
        } else {
            $id  = Journey::with("section")->where("sub_category_id",$subscription->category_id)->first()->section_id;
        }

        $category = SubCategory::where('id', $subscription->category_id)->firstOrFail();
        $section = Section::findOrFail($id);
        $current_section = $section;
        $skills = Skill::where("is_active", true)->where("section_id", $section->id)->get(["id", "name", "section_id"]);
        $skill_ques = [];
        foreach($skills as $skill){
            $topics = Topic::where("is_active", true)->where("skill_id", $skill->id)->get(["id", "name", "skill_id", "helpsheet"]);
            $topic_ques = [];
            foreach($topics as $key => $topic){
                $total_question = 0;
                $correct_answered_questions = 0;
                $last_seen = "--";
                $sess_ques = JourneySessionQuestion::where('status', 'answered')
                ->whereHas('question', function ($query) use ($topic) {
                    $query->where('topic_id', $topic->id);
                })
                ->with('journeySession') // Eager load the journey_sessions relationship
                ->get()
                ->filter(function ($item) use ($u_id) {
                    $journeySession = JourneySession::find($item->journey_session_id);
                    if ($journeySession) {
                        return $journeySession->user_id == $u_id;
                    } else {
                        return false;
                    }
                });

                $journey_set_ques = DB::table('journey_set_questions')
                ->join('questions', 'journey_set_questions.question_id', '=', 'questions.id')
                ->where('questions.topic_id', '=', $topic->id)->get();


                foreach($sess_ques as $ques){
                    if($ques->is_correct){
                        $correct_answered_questions += 1;
                    }
                    $total_question += 1;
                    $set = JourneySession::findOrFail($ques->journey_session_id);
                }
                $mastery_level = 0;
                if(count($journey_set_ques) > 0 && count($sess_ques) == 0){
                    $mastery_level = "Not Attempt";
                } else if(count($journey_set_ques) == 0 && count($sess_ques) == 0){
                    $mastery_level = "Not Set";
                }
                if($correct_answered_questions > 0 && $total_question > 0){
                    $mastery_level = number_format($correct_answered_questions / $total_question * 100, 2);
                }
                if($mastery_level >= 89 && $mastery_level <= 100){

                    $mastery_msg = "Master";
                    array_push($strong_level, $topic->name);
                } 
                if($mastery_level >= 83 && $mastery_level <= 88) {
                    $mastery_msg = "Strong";
                    array_push($strong_level, $topic->name);
                } 
                if($mastery_level >= 69 && $mastery_level <= 82) {
                    $mastery_msg = "Good";
                } 
                if($mastery_level <= 68) {
                    $mastery_msg = "Need Practice";
                    array_push($weak_level, $topic->name);
                }
                if($mastery_level == 'Not Attempt'){
                    $mastery_msg = "Not Attempt";
                }
                if($mastery_level == 'Not Set'){
                    $mastery_msg = "Not Set";
                }

                $last_seen = DB::table('journey_session_questions')
                    ->select('journey_sessions.completed_at')
                    ->where('journey_session_questions.status', 'answered')
                    ->join('questions', 'journey_session_questions.question_id', '=', 'questions.id')
                    ->where('questions.topic_id', '=', $topic->id)
                    ->leftJoin('journey_sessions', 'journey_session_questions.journey_session_id', '=', 'journey_sessions.id')
                    ->orderBy('journey_sessions.completed_at', 'desc')
                    ->first();

                $videos = Video::where('topic_id', $topic->id)->get();

                $t = [
                    "id" => $topic->id,
                    "name" => $topic->name,
                    "skill_id" => $topic->skill_id,
                    "mastery_level" => $mastery_level,
                    "mastery_msg" => isset($mastery_msg) ? $mastery_msg : null,
                    "last_seen" => isset($last_seen->completed_at) ? str_replace("-","/",substr($last_seen->completed_at, 0, strrpos($last_seen->completed_at, ' '))) : "--",
                    "videos" => $videos,
                    "helpsheet" => $topic->helpsheet,
                ];
                array_push($topic_ques, $t);
            }
            $s = [
                "id" => $skill->id,
                "name" => $skill->name,
                "section_id" => $skill->section_id,
                "topics" => $topic_ques
            ];
            array_push($skill_ques, $s);
        }
        $student_correct = JourneySession::where('status', 'completed')
            ->where('user_id', $u_id)
            ->whereHas('journeySet.skill', function ($query) use ($section) {
                $query->where('section_id', $section->id);
            })
            ->get();

        $student_totalCorrect = $student_correct->sum(function ($journeySession) {
            return data_get($journeySession, 'results.correct_answered_questions', 0);
        });

        $student_ques = JourneySession::where('status', 'completed')
            ->where('user_id', $u_id)
            ->whereHas('journeySet.skill', function ($query) use ($section) {
                $query->where('section_id', $section->id);
            })
            ->get();

        $student_totalQues = $student_ques->sum(function ($journeySession) {
            return data_get($journeySession, 'results.total_questions', 0);
        });

        $all_student_correct = JourneySession::where('status', 'completed')
            ->whereHas('journeySet.skill', function ($query) use ($section) {
                $query->where('section_id', $section->id);
            })
            ->get();

        $all_student_totalCorrect = $all_student_correct->sum(function ($journeySession) {
            return data_get($journeySession, 'results.correct_answered_questions', 0);
        });

        $all_student_ques = JourneySession::where('status', 'completed')
            ->whereHas('journeySet.skill', function ($query) use ($section) {
                $query->where('section_id', $section->id);
            })
            ->get();

        $all_student_totalQues = $all_student_ques->sum(function ($journeySession) {
            return data_get($journeySession, 'results.total_questions', 0);
        });


        $currentYear = Carbon::now()->year;
        


        

        $sec_mastery = JourneySession::where('status', 'completed')
        ->where('user_id', $u_id)
        ->whereYear('created_at', $currentYear)
        ->whereHas('journeySet.skill', function ($query) use ($section) {
            $query->where('section_id', $section->id);
        })->get();

        $sec_year_mastery = [
            "Jan" => [
                "total" => 0,
                "correct" => 0, 
            ],
            "Feb" => [
                "total" => 0,
                "correct" => 0,
            ],
            "Mar" => [
                "total" => 0,
                "correct" => 0,
            ],
            "Apr" => [
                "total" => 0,
                "correct" => 0,
            ],
            "May" => [
                "total" => 0,
                "correct" => 0,
            ],
            "Jun" => [
                "total" => 0,
                "correct" => 0,
            ],
            "Jul" => [
                "total" => 0,
                "correct" => 0,
            ],
            "Aug" => [
                "total" => 0,
                "correct" => 0,
            ],
            "Sep" => [
                "total" => 0,
                "correct" => 0,
            ],
            "Oct" => [
                "total" => 0,
                "correct" => 0,
            ],
            "Nov" => [
                "total" => 0,
                "correct" => 0,
            ],
            "Dec" => [
                "total" => 0,
                "correct" => 0,
            ],
        ];

        foreach($sec_mastery as $mastery) {
            $completedAt = Carbon::parse($mastery->completed_at);
            $month = $completedAt->format('M');
            $sec_year_mastery[$month]['total'] += $mastery['results']['total_questions'];
            $sec_year_mastery[$month]['correct'] += $mastery['results']['correct_answered_questions'];
        }
        foreach($sec_year_mastery as $key => $month){
            if($month['correct'] > 0){
                $sec_year_mastery[$key] = number_format($month['correct'] / $month['total'] * 100, 2);
            } else {
                $sec_year_mastery[$key] = 0;
            }
        }

        $journey_set_ids = [];
        $journey_set_skill_ids = [];
        $journey_session = [];
        $sections = [];
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
            $results = JourneySession::where("journey_set_id", $value)->where("user_id", $u_id)->get(["results", "journey_set_id"]);
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
                $mastery_message = "Master";
            }
            array_push($sections, [
                "id" => $sec['id'],
                "name" => $sec['name'],
                "slug" => $sec['slug'],
                "mastery_level" => $mastery_message,
            ]);
        }
        return view("User/JourneyPerformance", [
            "year" => $category->name,
            "topics" => $skill_ques,
            "student_comparison" => $student_totalCorrect != 0 || $student_totalQues != 0 ? number_format($student_totalCorrect / $student_totalQues * 100, 0) : 0,
            "all_comparison" => $all_student_totalCorrect != 0 || $all_student_totalQues != 0 ? number_format($all_student_totalCorrect / $all_student_totalQues * 100, 0) : 0,
            "sec_year_mastery" => $sec_year_mastery,
            "sections" => $sections,
            "current_section" => $current_section,
            "strong_levels" => $strong_level,
            "weak_levels" => $weak_level,
        ]);
    }
    function parentJourneyPerformance(Request $request)
    {
        if(auth()->user()->roles()->first()->name == 'student'){
            $u_id = auth()->user()->id;
        } else {
            if (!session()->has("selected_child") || !isset(session("selected_child")["classId"])) {
                return redirect()->route('change_child');
            }
            $u_id = session("selected_child")["id"];
        }
        $results = [];
        $strong_level = [];
        $weak_level = [];
        try {
            $subscription = Subscription::where('user_id', $u_id)->firstOrFail();
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->route('change_child');
        }
        if ($request->has('subject')) {
            $id  = $request->query('subject');
        } else {
            $id  = Journey::with("section")->where("sub_category_id",$subscription->category_id)->first()->section_id;
        }

        $category = SubCategory::where('id', $subscription->category_id)->firstOrFail();
        $section = Section::findOrFail($id);
        $current_section = $section;
        $skills = Skill::where("is_active", true)->where("section_id", $section->id)->get(["id", "name", "section_id"]);
        $skill_ques = [];
        foreach($skills as $skill){
            $topics = Topic::where("is_active", true)->where("skill_id", $skill->id)->get(["id", "name", "skill_id", "helpsheet"]);
            $topic_ques = [];
            foreach($topics as $key => $topic){
                $total_question = 0;
                $correct_answered_questions = 0;
                $last_seen = "--";
                $sess_ques = JourneySessionQuestion::where('status', 'answered')
                ->whereHas('question', function ($query) use ($topic) {
                    $query->where('topic_id', $topic->id);
                })
                ->with('journeySession') // Eager load the journey_sessions relationship
                ->get()
                ->filter(function ($item) use ($u_id) {
                    $journeySession = JourneySession::find($item->journey_session_id);
                    if ($journeySession) {
                        return $journeySession->user_id == $u_id;
                    } else {
                        return false;
                    }
                });

                $journey_set_ques = DB::table('journey_set_questions')
                ->join('questions', 'journey_set_questions.question_id', '=', 'questions.id')
                ->where('questions.topic_id', '=', $topic->id)->get();


                foreach($sess_ques as $ques){
                    if($ques->is_correct){
                        $correct_answered_questions += 1;
                    }
                    $total_question += 1;
                    $set = JourneySession::findOrFail($ques->journey_session_id);
                }
                $mastery_level = 0;
                if(count($journey_set_ques) > 0 && count($sess_ques) == 0){
                    $mastery_level = "Not Attempt";
                } else if(count($journey_set_ques) == 0 && count($sess_ques) == 0){
                    $mastery_level = "Not Set";
                }
                if($correct_answered_questions > 0 && $total_question > 0){
                    $mastery_level = number_format($correct_answered_questions / $total_question * 100, 2);
                }
                if($mastery_level >= 89 && $mastery_level <= 100){

                    $mastery_msg = "Master";
                    array_push($strong_level, $topic->name);
                } 
                if($mastery_level >= 83 && $mastery_level <= 88) {
                    $mastery_msg = "Strong";
                    array_push($strong_level, $topic->name);
                } 
                if($mastery_level >= 69 && $mastery_level <= 82) {
                    $mastery_msg = "Good";
                } 
                if($mastery_level <= 68) {
                    $mastery_msg = "Need Practice";
                    array_push($weak_level, $topic->name);
                }
                if($mastery_level == 'Not Attempt'){
                    $mastery_msg = "Not Attempt";
                }
                if($mastery_level == 'Not Set'){
                    $mastery_msg = "Not Set";
                }

                $last_seen = DB::table('journey_session_questions')
                    ->select('journey_sessions.completed_at')
                    ->where('journey_session_questions.status', 'answered')
                    ->join('questions', 'journey_session_questions.question_id', '=', 'questions.id')
                    ->where('questions.topic_id', '=', $topic->id)
                    ->leftJoin('journey_sessions', 'journey_session_questions.journey_session_id', '=', 'journey_sessions.id')
                    ->orderBy('journey_sessions.completed_at', 'desc')
                    ->first();

                $videos = Video::where('topic_id', $topic->id)->get();

                $t = [
                    "id" => $topic->id,
                    "name" => $topic->name,
                    "skill_id" => $topic->skill_id,
                    "mastery_level" => $mastery_level,
                    "mastery_msg" => isset($mastery_msg) ? $mastery_msg : null,
                    "last_seen" => isset($last_seen->completed_at) ? str_replace("-","/",substr($last_seen->completed_at, 0, strrpos($last_seen->completed_at, ' '))) : "--",
                    "videos" => $videos,
                    "helpsheet" => $topic->helpsheet,
                ];
                array_push($topic_ques, $t);
            }
            $s = [
                "id" => $skill->id,
                "name" => $skill->name,
                "section_id" => $skill->section_id,
                "topics" => $topic_ques
            ];
            array_push($skill_ques, $s);
        }
        $student_correct = JourneySession::where('status', 'completed')
            ->where('user_id', $u_id)
            ->whereHas('journeySet.skill', function ($query) use ($section) {
                $query->where('section_id', $section->id);
            })
            ->get();

        $student_totalCorrect = $student_correct->sum(function ($journeySession) {
            return data_get($journeySession, 'results.correct_answered_questions', 0);
        });

        $student_ques = JourneySession::where('status', 'completed')
            ->where('user_id', $u_id)
            ->whereHas('journeySet.skill', function ($query) use ($section) {
                $query->where('section_id', $section->id);
            })
            ->get();

        $student_totalQues = $student_ques->sum(function ($journeySession) {
            return data_get($journeySession, 'results.total_questions', 0);
        });

        $all_student_correct = JourneySession::where('status', 'completed')
            ->whereHas('journeySet.skill', function ($query) use ($section) {
                $query->where('section_id', $section->id);
            })
            ->get();

        $all_student_totalCorrect = $all_student_correct->sum(function ($journeySession) {
            return data_get($journeySession, 'results.correct_answered_questions', 0);
        });

        $all_student_ques = JourneySession::where('status', 'completed')
            ->whereHas('journeySet.skill', function ($query) use ($section) {
                $query->where('section_id', $section->id);
            })
            ->get();

        $all_student_totalQues = $all_student_ques->sum(function ($journeySession) {
            return data_get($journeySession, 'results.total_questions', 0);
        });


        $currentYear = Carbon::now()->year;
        


        

        $sec_mastery = JourneySession::where('status', 'completed')
        ->where('user_id', $u_id)
        ->whereYear('created_at', $currentYear)
        ->whereHas('journeySet.skill', function ($query) use ($section) {
            $query->where('section_id', $section->id);
        })->get();

        $sec_year_mastery = [
            "Jan" => [
                "total" => 0,
                "correct" => 0, 
            ],
            "Feb" => [
                "total" => 0,
                "correct" => 0,
            ],
            "Mar" => [
                "total" => 0,
                "correct" => 0,
            ],
            "Apr" => [
                "total" => 0,
                "correct" => 0,
            ],
            "May" => [
                "total" => 0,
                "correct" => 0,
            ],
            "Jun" => [
                "total" => 0,
                "correct" => 0,
            ],
            "Jul" => [
                "total" => 0,
                "correct" => 0,
            ],
            "Aug" => [
                "total" => 0,
                "correct" => 0,
            ],
            "Sep" => [
                "total" => 0,
                "correct" => 0,
            ],
            "Oct" => [
                "total" => 0,
                "correct" => 0,
            ],
            "Nov" => [
                "total" => 0,
                "correct" => 0,
            ],
            "Dec" => [
                "total" => 0,
                "correct" => 0,
            ],
        ];

        foreach($sec_mastery as $mastery) {
            $completedAt = Carbon::parse($mastery->completed_at);
            $month = $completedAt->format('M');
            $sec_year_mastery[$month]['total'] += $mastery['results']['total_questions'];
            $sec_year_mastery[$month]['correct'] += $mastery['results']['correct_answered_questions'];
        }
        foreach($sec_year_mastery as $key => $month){
            if($month['correct'] > 0){
                $sec_year_mastery[$key] = number_format($month['correct'] / $month['total'] * 100, 2);
            } else {
                $sec_year_mastery[$key] = 0;
            }
        }

        $journey_set_ids = [];
        $journey_set_skill_ids = [];
        $journey_session = [];
        $sections = [];
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
            $results = JourneySession::where("journey_set_id", $value)->where("user_id", $u_id)->get(["results", "journey_set_id"]);
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
                $mastery_message = "Master";
            }
            array_push($sections, [
                "id" => $sec['id'],
                "name" => $sec['name'],
                "slug" => $sec['slug'],
                "mastery_level" => $mastery_message,
            ]);
        }
        return view("Parent/JourneyPerformance", [
            "year" => $category->name,
            "topics" => $skill_ques,
            "student_comparison" => $student_totalCorrect != 0 || $student_totalQues != 0 ? number_format($student_totalCorrect / $student_totalQues * 100, 0) : 0,
            "all_comparison" => $all_student_totalCorrect != 0 || $all_student_totalQues != 0 ? number_format($all_student_totalCorrect / $all_student_totalQues * 100, 0) : 0,
            "sec_year_mastery" => $sec_year_mastery,
            "sections" => $sections,
            "current_section" => $current_section,
            "strong_levels" => $strong_level,
            "weak_levels" => $weak_level,
        ]);
    }
}