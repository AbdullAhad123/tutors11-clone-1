<?php

namespace App\Http\Controllers\Parent;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserGroupUsers;
use App\Models\UserGroup;
use App\Models\Subscription;
use App\Models\ExamSession;
use App\Models\PracticeSession;
use App\Models\QuizSession;
use App\Models\SubCategory;
use App\Models\Plan;
use App\Models\Skill;
use App\Models\UserAvatar;
use App\Models\PracticeSet;
use App\Models\SubCategorySections;
use App\Models\SuggestedPracticeSets;
use App\Models\Section;
use App\Models\JourneySet;
use App\Models\JourneySession;
use FontLib\Table\Type\name;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\StoreUserRequest;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;
use DateTime;

class ChangeChild extends Controller
{
    public $include_in_user_group_name;
    public function __construct()
    {
        $this->middleware(['role:parent|teacher', 'verified']);
        $this->include_in_user_group_name = "family"; # Note this match case-insensitive
    }
    public function index(Request $request){
        $total_questions = $correct_questions = $total_time_spent = $total_exam_score = $total_exam_score_earned = $total_quiz_score = $total_quiz_score_earned = $total_practice_score = $total_practice_score_earned = 0;
        $users = [];
        $childs = [];
        $journeyAnalysis = [
            'total_questions' => 0,
            'total_time_spent' => 0,
            'correct_questions' => 0,
            'total_score' => 0,
            'total_score_earned' => 0,
            'formatted_total_time_spent' => [
                'time' => 0,
                'format_type' => 'sec'
            ],
        ];
        $user_group_names = auth()->user()->userGroups()->pluck("name");
        $user_group_ids = auth()->user()->userGroups()->pluck("id");
        if(count($user_group_names) > 0){
            foreach ($user_group_names as $key => $value) {
                foreach ($user_group_ids as $key2 => $value2) {
                    if ($key == $key2) {
                        $users = User::find(UserGroupUsers::where("user_group_id",$value2 )->get("user_id"));
                    }
                }
            }
            foreach ($users as $value) {
                if ($value->role_id == "parent" || $value->role_id == "teacher") {continue;}
                if($value->avatar_selected){
                    $path = UserAvatar::join('avatars', 'users_avatars.avatar', '=', 'avatars.id')
                    ->where('users_avatars.user', $value->id)
                    ->where('users_avatars.is_selected', true)
                    ->select('avatars.path')
                    ->first();
                    $profile_photo_path = $path->path;
                } else {
                    $profile_photo_path = $value->profile_photo_path;
                }
                array_push($childs, ['id' => $value->id, 'name' => $value->first_name." ".$value->last_name,'email' => $value->email,'profile_photo' => $profile_photo_path]);
            }
        }
        if(count($childs) > 0) {
            if(!session()->has("selected_child")) {
                try {
                    $subscription = Subscription::where('user_id', $childs[0]['id'])->firstOrFail();
                    session()->put("selected_child",["id"=>$childs[0]['id'],"name"=>$childs[0]['name'],"email"=>$childs[0]['email'],"classId"=>$subscription->category_id]);
                } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {}
            }
            if (session()->has("selected_child")) {
                try {
                    $subscription = Subscription::where('user_id', session("selected_child")["id"])->firstOrFail();
                } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {}
                if(isset($subscription)){
                    $childName = session("selected_child")["name"];
                    $examsSession = ExamSession::where('user_id', session("selected_child")["id"])->with("exam")->get();
                    $quizzesSession = QuizSession::where('user_id', session("selected_child")["id"])->with("quiz")->get();
                    $practicesSession = PracticeSession::where('user_id', session("selected_child")["id"])->with("practiceSet")->get();
                    $journeySession = JourneySession::where('user_id', session("selected_child")["id"])->with("journeySet")->get();
                    foreach ($journeySession as $key => $value) {
                        $journeyAnalysis['total_questions'] = $journeyAnalysis['total_questions'] + $value->results->total_questions;
                        $journeyAnalysis['correct_questions'] = $journeyAnalysis['correct_questions'] + $value->results->correct_answered_questions;
                        if($value->completed_at != null){
                            $journeyAnalysis['total_time_spent'] = $journeyAnalysis['total_time_spent'] + $value->results->total_time_taken['seconds'];
                            $journeyAnalysis['total_score'] += $value->results->total_questions;
                            $journeyAnalysis['total_score_earned'] += $value->results->correct_answered_questions;
                        }
                    }
                    if($journeyAnalysis['total_time_spent'] > 200){
                        if($journeyAnalysis['total_time_spent'] / 60 > 200){
                            $journeyAnalysis['formatted_total_time_spent']['time'] = round(($journeyAnalysis['total_time_spent'] / 60) / 60, 2);
                            $journeyAnalysis['formatted_total_time_spent']['format_type'] = 'hrs';
                        } else {
                            $journeyAnalysis['formatted_total_time_spent']['time'] = round($journeyAnalysis['total_time_spent'] / 60, 2);
                            $journeyAnalysis['formatted_total_time_spent']['format_type'] = 'min';
                        }
                    } else {
                        $journeyAnalysis['formatted_total_time_spent']['time'] = round($journeyAnalysis['total_time_spent'], 2);
                        $journeyAnalysis['formatted_total_time_spent']['format_type'] = 'sec';
                    }
                    foreach ($examsSession as $key => $value) {
                        $total_questions = $total_questions + $value->results->total_questions;
                        $correct_questions = $correct_questions + $value->results->correct_answered_questions;
                        if($value->completed_at != null){
                            $total_time_spent = $total_time_spent + $value->results->total_time_taken['seconds'];
                            $total_exam_score += $value->results->total_marks;
                            $total_exam_score_earned += $value->results->marks_earned;
                        }
                    }
                    foreach ($quizzesSession as $key => $value) {
                        $total_questions = $total_questions + $value->results->total_questions;
                        $correct_questions = $correct_questions + $value->results->correct_answered_questions;
                        if($value->completed_at != null){
                            $total_time_spent = $total_time_spent + $value->results->total_time_taken['seconds'];
                            $total_quiz_score += $value->results->total_marks;
                            $total_quiz_score_earned += $value->results->marks_earned;
                        }
                    }
                    foreach ($practicesSession as $key => $value) {
                        $total_questions = $total_questions + $value->results->total_questions;
                        $correct_questions = $correct_questions + $value->results->correct_answered_questions;
                        if($value->completed_at != null){
                            $total_time_spent = $total_time_spent + $value->results->total_time_taken['seconds'];
                            $total_practice_score += $value->results->total_questions;
                            $total_practice_score_earned += $value->results->correct_answered_questions;
                        }
                    }
                    $subscription = Subscription::where('user_id', session("selected_child")["id"])->firstOrFail();
                    $category = SubCategory::where('id', $subscription->category_id)->firstOrFail();
                    $plan = Plan::findOrFail($subscription->plan_id);
                    $plan_name = $plan->name;
                    $plan_year = str_replace(" ","",str_replace("Year","",$category->name));
                    $mastery_level = [];

                    // ---------------------------------------------------------------
                    
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
                                $mastery_message = "Strong";
                            }
                            array_push($sections, [
                                "id" => $sec['id'],
                                "name" => $sec['name'],
                                "slug" => $sec['slug'],
                                "mastery_level" => $mastery_message,
                            ]);
                        }
                    }
                }
                // ---------------------------------------------------------------

            }else{
                session()->put("selected_child",["id"=>$childs[0]['id'],"name"=>$childs[0]['name'],"email"=>$childs[0]['email']]);
                $childName = session("selected_child")["name"];
                $plan_name = '';
                $plan_year = '';
                $mastery_level = null;
            }
            if(isset($subscription)) {
                $journey_set = journeySet::where('sub_category_id', $subscription->category_id)->count();
                $journey_session = JourneySession::where('user_id', session("selected_child")["id"])->where('status', 'completed')->count();
                $completed_journey = $journey_session <= 0 || $journey_set <= 0 ? 0 : ($journey_session/$journey_set) * 100;
                $countParentPractice = SuggestedPracticeSets::where('user_id', session('selected_child')['id'])->count();
                if($total_time_spent > 200){
                    if($total_time_spent / 60 > 200){
                        $formatted_total_time_spent = [
                            'time' => round(($total_time_spent / 60) / 60, 2),
                            'format_type' => 'hrs'
                        ];
                    } else {
                        $formatted_total_time_spent = [
                            'time' => round($total_time_spent / 60, 2),
                            'format_type' => 'min'
                        ];
                    }
                } else {
                    $formatted_total_time_spent = [
                        'time' => round($total_time_spent, 2),
                        'format_type' => 'sec'
                    ];
                }
                $exam_total = $total_exam_score == 0 || $total_exam_score_earned == 0 ? 0 : intval(($total_exam_score_earned / $total_exam_score) * 100);
                $quiz_total = $total_quiz_score == 0 || $total_quiz_score_earned == 0 ? 0 : intval(($total_quiz_score_earned / $total_quiz_score) * 100);
                $practice_total = $total_practice_score == 0 || $total_practice_score_earned == 0 ? 0 : intval(($total_practice_score_earned / $total_practice_score) * 100);
            }
        }
        return view('Parent/ChangeChild', [
            'journeyAnalysis' => $journeyAnalysis,
            'childs' => $childs,
            'childName' => isset($childName) ? $childName : null,
            'total_questions' => $total_questions,
            'correct_questions' => $correct_questions,
            'total_time_spent' => isset($formatted_total_time_spent) ? $formatted_total_time_spent : [],
            'plan_name' => isset($plan_name) ? $plan_name : null,
            'plan_year' => isset($plan_year) ? $plan_year : null,
            'mastery_level' => isset($sections) ? $sections : null,
            'count_parent_practice' => isset($countParentPractice) ? $countParentPractice : 0,
            'completed_journey' => isset($completed_journey) ? (int)$completed_journey : 0,
            'exam_total' => isset($exam_total) ? $exam_total : 0,
            'quiz_total' => isset($quiz_total) ? $quiz_total : 0,
            'practice_total' => isset($practice_total) ? $practice_total : 0,
        ]);
    }

    public function createChild(Request $request){
        $user = User::find(Auth::user()->id);
        $user_group = $user->userGroups()->pluck('id','name');
        $now = new DateTime();
        try {
            $user = User::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'user_name' => $request->user_name,
                'email' => $request->user_name,
                'password' => Hash::make($request->password),
                'email_verified_at' => $now->format('Y-m-d H:i:s'),  
                'is_active' => true,  
                'login_at' => $now->format('Y-m-d'),  
            ]);
            if ($user) {
                $user->assignRole(3);
                foreach ($user_group as $key => $value) {
                    DB::table('user_group_users')->insert([
                        'user_id' => $user->id,
                        'user_group_id' => $value
                    ]);
                }
                return [
                    'success' => true,
                    'exception' => false,
                    'user' => $user,
                    'message' => 'Student created successfully'
                ];
            } else {
                return [
                    'success' => false,
                    'exception' => false,
                    'user' => '',
                    'message' => 'Something went wrong!'
                ];
            }
        } catch (\Illuminate\Database\QueryException $e){
            return [
                'success' => false,
                'exception' => true,
                'user' => '',
                'message' => $e
            ];
        }
    }
     
    public function createNewChild(Request $request){   

        return view('Parent/CreateChild', [
            'childs' => "xyzChild",
            "childName"=>"xyzChild"
        ]);
    }
    public function change(Request $request){
        $data = $request->all();
        try {
            $subscription = Subscription::where('user_id', $data['reqData']['childId'])->firstOrFail();
            session()->put("selected_child",["id"=>$data['reqData']['childId'],"name"=>$data['reqData']['childName'],"email"=>$data['reqData']['childEmail'],"classId"=>$subscription->category_id]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            session()->put("selected_child",["id"=>$data['reqData']['childId'],"name"=>$data['reqData']['childName'],"email"=>$data['reqData']['childEmail']]);
        }
        return \Response::json(session()->get('selected_child'));
    }
    public function getSelectedChild(){
        return session("selected_child")["name"];
    }
}
