<?php
/**
 * File name: DashboardController.php
 * Last modified: 18/07/21, 3:59 PM
 * Author: NearCraft - https://codecanyon.net/user/nearcraft
 * Copyright (c) 2021
 */

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use Inertia\Inertia;
use App\Models\User;
use App\Models\Skill;
use App\Models\Plan;
use App\Models\Exam;
use App\Models\Quiz;
use App\Models\Section;
use App\Models\Journey;
use App\Models\UserAvatar;
use App\Models\JourneySet;
use App\Models\PracticeSet;
use App\Models\SubCategory;
use App\Models\JourneyLevel;
use App\Models\ExamSchedule;
use App\Models\Subscription;
use App\Models\QuizSchedule;
use App\Models\JourneySession;
use App\Models\UserGroupUsers;
use App\Models\PracticeSession;
use App\Models\SubCategorySections;
use App\Models\SuggestedPracticeSets;
use App\Http\Controllers\Controller;
use App\Settings\LocalizationSettings;
use App\Services\MyService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Database\Eloquent\Builder;
use App\Repositories\UserPracticeSetRepository;
use App\Repositories\UserJourneySetRepository;
use App\Transformers\Admin\JourneyTransformer;
use App\Transformers\Platform\PracticeSessionCardTransformer;
use App\Transformers\Platform\JourneySessionCardTransformer;
use App\Transformers\Platform\UserPracticeSessionTransformer;
use App\Transformers\Platform\ExamScheduleCalendarTransformer;
use App\Transformers\Platform\QuizScheduleCalendarTransformer;

class DashboardController extends Controller
{
    private LocalizationSettings $localizationSettings;
    private UserPracticeSetRepository $repository;

    public function __construct(LocalizationSettings $localizationSettings, UserPracticeSetRepository $repository, UserJourneySetRepository $journey_repository)
    {
        $this->repository = $repository;
        $this->journey_repository = $journey_repository;
        $this->localizationSettings = $localizationSettings;
        $this->middleware(['role:guest|student|employee|parent|teacher', 'verify.syllabus']);
    }

    /**
     * User's Main Dashboard
     *
     * @return \Inertia\Response
     */
    public function index(PracticeSet $practiceSet, MyService $myService)
    {
        $total_coins = 0;
        try {
            $subscription = Subscription::where('user_id', auth()->user()->id)->firstOrFail();
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->route('select_plan');
        }
        $category = SubCategory::where('id', $subscription->category_id)->firstOrFail();
        $plan = Plan::findOrFail($subscription->plan_id);
        $groups = auth()->user()->userGroups()->pluck('id');
        $parent_emails = [];
        foreach ($groups as $key => $group){
            $userIds = UserGroupUsers::where("user_group_id", $group)->pluck("user_id");
            $users = User::whereIn('id', $userIds)->get();
            foreach ($users as $user) {
                if ($user->role_id == "parent" || $user->role_id == "teacher") {
                    array_push($parent_emails, [$user->first_name.' '.$user->last_name => $user->email]);
                }
            }
        }
        
        session()->put('parent_emails', $parent_emails);
        session()->put('category_id', $category->id);
        session()->put('category_name', $category->name);
         if(is_null(auth()->user()->login_at)){
            $userData = User::find(auth()->user()->id);
            $userData->login_at = now()->format('Y-m-d');
            $userData->save();
        }
        $userGroups = auth()->user()->userGroups()->pluck('id');
        $minDate = Carbon::today()->timezone($this->localizationSettings->default_timezone);
        $maxDate = Carbon::today()->addMonths(1)->endOfMonth()->timezone($this->localizationSettings->default_timezone);
        $subCategory = SubCategory::find(session('category_id'));

        // Fetch quizzes scheduled for current user via user groups
        $quizSchedules = QuizSchedule::whereHas('userGroups', function (Builder $query) use ($userGroups) {
            $query->whereIn('user_group_id', $userGroups);
        })->whereHas('quiz', function (Builder $query) use ($subCategory) {
            $query->where('sub_category_id', $subCategory->id);
        })->with('quiz')->orderBy('end_date', 'asc')->active()->limit(4)->get();


        // Fetch exams scheduled for current user via user groups
        $examSchedules = ExamSchedule::whereHas('userGroups', function (Builder $query) use ($userGroups) {
            $query->whereIn('user_group_id', $userGroups);
        })->whereHas('exam', function (Builder $query) use ($subCategory) {
            $query->where('sub_category_id', $subCategory->id);
        })->with('exam')->orderBy('end_date', 'asc')->active()->limit(4)->get();

        // Fetch current user in-completed practice sessions
        $practiceSessions = PracticeSession::with(['practiceSet' => function($query) {
            $query->with('skill:id,name');
        }])->whereHas('practiceSet', function (Builder $query) use ($subCategory) {
            $query->where('sub_category_id', $subCategory->id)->where(function ($query) {
                $query->whereNull('description')
                    ->orWhere(function ($query) {
                        $query->whereNotNull('description')
                            ->where('description', 'NOT LIKE', '%Journey%');
                    });
            });
        })->where('user_id', auth()->user()->id)->where('total_time_taken', '<>', 0)->pending()
        ->orderBy('updated_at', 'desc')->take(4)->get();

        // Fetch current user in-completed journey sessions
        $journeySessions = JourneySession::with(['journeySet' => function($query) {
            $query->with('skill:id,name');
        }])->where('user_id', auth()->user()->id)->where('total_time_taken', '<>', 0)->pending()
        ->orderBy('updated_at', 'desc')->take(4)->get();

        // --------------------------------To Do List----------------------------------------


        // --------------------------------To Do List----------------------------------------

        // --------------------------------Continue Journey----------------------------------------
        
        $jokes = ["Why did the math book look sad? Because it had too many problems!","What did one ocean say to the other ocean? Nothing, they just waved.","How do you organize a space party? You 'planet' ahead!","Why did the scarecrow win an award? Because he was outstanding in his field.","What kind of tree fits in your hand? A palm tree!","What's orange and sounds like a parrot? A carrot.","Why don't skeletons fight each other? They don't have the guts!","How do you make a tissue dance? You put a little boogie in it!","What's a vampire's favorite fruit? A blood orange.","What's a pirate's favorite letter? Arrr, you'd think it be the 'R,' but it's really the 'C.'","What did one wall say to the other wall? 'I'll meet you at the corner!'","How do you catch a squirrel? Climb a tree and act like a nut!","What do you call a bear with no teeth? A gummy bear.","How do you make a lemon drop? Just let it fall!","Why did the bicycle fall over? Because it was two-tired.","What do you call a bear that's stuck in the rain? A drizzly bear.","What do you call a fish with no eyes? Fsh.","Why did the tomato turn red? Because it saw the salad dressing!","Why was the math book sad? Because it had too many problems.","Why did the scarecrow become a successful politician? Because he was outstanding in his field.","What did one plate say to the other plate? Dinner's on me!","Why don't scientists trust atoms? Because they make up everything!","What kind of tree can fit in your hand? A palm tree!","How does a snowman get around? By riding an 'ice'-cycle!","What do you get when you cross a vampire with a snowman? Frostbite!","Why did the bicycle fall over? Because it was two-tired.","What did one wall say to the other wall? I'll meet you at the corner!","What do you call a bear with no teeth? A gummy bear.","How do you make a lemon drop? Just let it fall!","Why did the golfer bring two pairs of pants? In case he got a hole in one!"];

        $result = [];
        $suggested_practice_sets = SuggestedPracticeSets::where("user_id", auth()->user()->id)->where('due_date', '>=', Carbon::now()->format('Y-m-d'))->with("practiceset")->get();
        foreach ($suggested_practice_sets as $key => $value) {
            foreach ($value->practiceset as $key => $value1) {
                $practiceSession =  PracticeSession::where("practice_set_id", $value1->id)->first();
                $set_by = null;
                if($value1->set_by !== null){
                    $user = User::findOrFail($value1->set_by);
                    $set_by = $user->first_name;
                }
                
                if(!isset($practiceSession->status) || $practiceSession->status == "started"){
                    if(!isset($practiceSession->total_time_taken) || $practiceSession->total_time_taken == 0){
                        $skills = Skill::where("id", $value1->skill_id)->get("name");
                        array_push($result, [
                            'id' => $value1->id,
                            'title' => $value->title,
                            'slug' => $value1->slug,
                            "skill"=>$skills[0]->name,
                            'category' => session('category_name'),
                            'total_questions' => $value->total_questions,
                            'due_date' =>date_format(date_create($value->due_date),"Y-m-d"),
                            'paid' => $value1->is_paid,
                            'SuggestedPracticeSetId' => $value->id,
                            'set_by' => $set_by !== null ? $set_by : Auth::user()->first_name,
                        ]);
                    }
                }
            }
        }
        $journeys = fractal(Journey::where('sub_category_id', $category->id)->get(),new JourneyTransformer())->toArray()['data'];
        $journeys_analytics = [];
        foreach($journeys as $journey){
            if($journey['status']){
                $sets_ids = JourneySet::where('journey_id', $journey['id'])->pluck('id');
                $total_points_earned = JourneySession::whereIn('journey_set_id', $sets_ids)->where('user_id', auth()->user()->id)->pluck('total_points_earned')->toArray();
                $completed_count = JourneySession::whereIn('journey_set_id', $sets_ids)->where('user_id', auth()->user()->id)->where('status', '=' , 'completed')->count();
                if($completed_count > 0 && count($sets_ids) > 0){
                    $percentage_completed = ($completed_count/count($sets_ids)) * 100;
                } else {
                    $percentage_completed = 0;
                }
                $i = [
                    'id' => $journey['id'],
                    'subject' => $journey['subject'],
                    'iconImgPath' => $journey['iconImgPath'],
                    'total_points_earned' => array_sum($total_points_earned),
                    'percentage_completed' => $percentage_completed,
                    'movingLineColor' => $journey['movingLineColor']
                ];
                array_push($journeys_analytics, $i);
            }
        }
        $PracticeSetCount = PracticeSet::where('sub_category_id', $category->id)->where('custom_set', false)->count();
        $ExamCount = Exam::where('sub_category_id', $category->id)->where('is_active', true)->count();
        $QuizCount = Quiz::where('sub_category_id', $category->id)->where('is_active', true)->count();
        $JourneySetCount = JourneySet::where('sub_category_id', $category->id)->count();
        $sections = [];
        $sectionFrom = SubCategorySections::with("section")->where("sub_category_id",$subscription->category_id)->get();
        foreach ($sectionFrom as $sec) {
            $section = Section::where('id',$sec->section_id)->active()->first();
            if($section){
                array_push($sections, [
                    "id" => $section['id'],
                    "name" => $section['name'],
                    "slug" => $section['slug']
                ]);
            }
        }
        if(Auth::user()->avatar_selected){
            $path = UserAvatar::join('avatars', 'users_avatars.avatar', '=', 'avatars.id')
            ->where('users_avatars.user', Auth::user()->id)
            ->where('users_avatars.is_selected', true)
            ->select('avatars.path')
            ->first();
            $profile_photo_path = $path->path;
        } else {
            $profile_photo_path = Auth::user()->profile_photo_path;
        }
        return view('User/Dashboard', [
            'profile_photo_path' => $profile_photo_path,
            'scheduleCalendar' => array_merge(fractal($quizSchedules, new QuizScheduleCalendarTransformer())->toArray()['data'], fractal($examSchedules, new ExamScheduleCalendarTransformer())->toArray()['data']),
            'practiceSessions' => fractal($practiceSessions, new PracticeSessionCardTransformer())->toArray()['data'],
            'journeySessions' => fractal($journeySessions, new JourneySessionCardTransformer())->toArray()['data'],
            'joke' => $jokes[rand(0, count($jokes) -1 )],
            'isParent'=>Auth::user()->hasRole("parent"),
            'journeys' => $journeys_analytics,
            'practiceSets' => $result,
            'minDate' => $minDate,
            'maxDate' => $maxDate,
            'plan_name' => $plan->name,
            'plan_year' => str_replace(" ","",str_replace("Year","",$category->name)),
            'total_coins' => $myService->getTotalCoins(),
            'PracticeSetCount' => $PracticeSetCount, 
            'ExamCount' => $ExamCount, 
            'QuizCount' => $QuizCount, 
            'JourneySetCount' => $JourneySetCount,
            'sections' => $sections
        ]);
    }
    public function studentJourney(JourneySet $journeySet, Request $request, $id)
    {
        $category_id = session('category_id');
        $category_name = session('category_name');
        $journey = Journey::findOrFail($id);
        $journey['levels'] = JourneyLevel::where('journey_id', $journey->id)->get();
        $level_count = JourneyLevel::where('journey_id', $journey->id)->count();
        $is_decimal = (is_numeric( $level_count/12 ) && ceil( $level_count/12 ) != $level_count/12);
        $svg_count = $is_decimal ? (int)($level_count/12) + 1 : (int)round($level_count/12);
        $locked = 0;
        $levels_completed = [];
        foreach($journey['levels'] as $key => $level){
            $levelset = null;
            $sets = JourneySet::where('journey_level_id', $level->id)->where('journey_id', $level->journey_id)->get();
            $sets_count = JourneySet::where('journey_level_id', $level->id)->where('journey_id', $level->journey_id)->count();
            $sets_completed = [];
            $level_locker = 0;
            foreach($sets as $Skey => $set){
                $sessions_count = DB::table('journey_sessions')->where('journey_set_id', $set->id)->where('user_id', auth()->user()->id)->count();
                if ($sessions_count > 0) {
                    $session = $this->journey_repository->getSession($set);
                } else {
                    $session = $this->journey_repository->createSession($set);
                }

                array_push($sets_completed, $session->percentage_completed);
                if($level_locker == 0){
                    if($session->status == 'completed'){
                        $session_locked = true;
                        $levelset = [
                            'slug' => $set->slug,
                            'title' => $set->title,
                            'subtitle' => $set->subtitle,
                            'level_locked' => $session_locked,
                            'session_status' => $session->status
                        ];
                    } else {
                        $level_locker = $level_locker + 1;
                        $locked = $locked + 1;
                        if($locked <= count($sets)){
                            $session_locked = false;
                        } else {
                            $session_locked = true;
                        }
                        $levelset = [
                            'slug' => $set->slug,
                            'title' => $set->title,
                            'subtitle' => $set->subtitle,
                            'level_locked' => $session_locked,
                            'session_status' => $session->status
                        ];
                    }
                }
            }
            // Convert each value to a float
            $sets_completed = array_map('floatval', $sets_completed);

            // Calculate the average percentage
            $average_percentage = array_sum($sets_completed) / count($sets_completed);

            // Format the result as a percentage
            $average_percentage_formatted = number_format($average_percentage, 2);
            array_push($levels_completed, $average_percentage_formatted);
            $level['set'] = $levelset;
            $level['sets_count'] = $sets_count;
            if($key % 2 == 0){
                $level['position'] = 'even';
            }
            else{
                $level['position'] = 'odd';
            }
        }
        if(isset($journey['levels'][0]['position'])){$journey['levels'][0]['position'] = 'first';}
        if($journey['levels'][count($journey['levels']) - 1]['position']){$journey['levels'][count($journey['levels']) - 1]['position'] = 'last';}
        return view('User/Journey', [
            'journey' => $journey,
            'svg_count' => $svg_count,
            'levels_completed' => $levels_completed
        ]);
    }
}
