<?php
/**
 * File name: PracticeSetCrudController.php
 * Last modified: 19/07/21, 12:55 AM
 * Author: NearCraft - https://codecanyon.net/user/nearcraft
 * Copyright (c) 2021
 */

namespace App\Http\Controllers\Admin;

use App\Filters\JourneyFilters;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StorePracticeSetRequest;
use App\Http\Requests\Admin\UpdatePracticeSetRequest;
use App\Http\Requests\Admin\UpdatePracticeSetSettingsRequest;
use App\Models\Journey;
use App\Models\JourneyLevel;
use App\Models\JourneySet;
use App\Models\Skill;
use App\Models\Topic;
use App\Models\SubCategory;
use App\Models\Section;
use App\Models\SubCategorySections;
use App\Models\Question;
use App\Repositories\JourneySetRepository;
use App\Transformers\Admin\JourneyTransformer;
use App\Transformers\Admin\JourneyLevelTransformer;
use App\Transformers\Admin\SkillSearchTransformer;
use App\Transformers\Admin\TopicSearchTransformer;
use App\Transformers\Admin\SubCategorySearchTransformer;
use App\Transformers\Admin\SectionTransformer;
use App\Transformers\Admin\SubCategoryTransformer;
use App\Transformers\Admin\JourneySetTransformer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Inertia\Inertia;
use Carbon\Carbon;
use DB;

class JourneySetCrudController extends Controller
{
    private JourneySetRepository $repository;

    public function __construct(JourneySetRepository $repository)
    {
        $this->middleware(['role:admin|instructor|parent|teacher|student']);
        $this->repository = $repository;
    }

    /**
     * List all practice sets
     *
     * @param JourneyFilters $filters
     * @return \Inertia\Response
     */
    public function index(JourneyFilters $filters)
    {   
        return view('Admin/Journeys', [
            'journeys' => function () use($filters) {
                return fractal(Journey::filter($filters)
                    ->with(['subCategory:id,name', 'section:id,name', 'user:id,first_name,last_name'])
                    ->paginate(request()->perPage != null ? request()->perPage : 10),
                    new JourneyTransformer())->toArray();
            },
        ]);
    }

    /**
     * Create a practice set
     *
     * @return \Inertia\Response
     */
    public function create()
    {
        return view('Admin/Journey/Details', [
            'subjects' => Section::select('id', 'name' )->active()->get(),
            'years' => SubCategory::select('id', 'name' )->active()->get(),
            'SubCategorySections' => SubCategorySections::select('sub_category_id', 'section_id' )->get(),
            'editFlag' => false
        ]);
    }

    /**
     * Store a practice set
     *
     * @param StorePracticeSetRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function JourneyCreate(Request $request)
    {
        $is_active = $request->is_active === "on" ? true : false;
        $repeat_theme = $request->repeat_theme === "on" ? true : false;
        $themeImageName = time().'.'.$request->theme->extension();  
        $iconImageName = time().'.'.$request->icon->extension();  
        $request->theme->move(public_path('images'), 'theme_'.$themeImageName);
        $request->icon->move(public_path('images'), 'icon_'.$iconImageName);
        $theme_photo_path = 'images/theme_'.$themeImageName;
        $icon_photo_path = 'images/icon_'.$iconImageName;
 
        $journeyId = DB::table('journey')->insertGetId([
            'code' => 'jrny_' . Str::random(11),
            'theme_img_path' => $theme_photo_path,
            'sub_category_id' => $request->year,
            'section_id' => $request->subject,
            'icon_img_path' => $icon_photo_path,
            'is_active' => $is_active,
            'repeat_theme' => $repeat_theme,
            'moving_line_color' => $request->line_color,
            'description' => $request->description,
            'set_by' => Auth::user()->id,
            'created_at' => Carbon::now()->toDateTimeString()
        ]);

        return redirect()->route('journey_create_levels', ['id' => $journeyId]);
    }
    public function JourneyUpdate($id, Request $request)
    {
        $journey = Journey::find($id); 

        $journey->is_active = $request->is_active === "on" ? true : false;
        $journey->repeat_theme = $request->repeat_theme === "on" ? true : false;
        $journey->sub_category_id = $request->year;
        $journey->section_id = $request->subject;
        $journey->moving_line_color = $request->line_color;
        $journey->description = $request->description;
        $journey->set_by = Auth::user()->id;
        $journey->updated_at = Carbon::now()->toDateTimeString();

        if(isset($request->theme)){
            $themeImageName = time().'.'.$request->theme->extension();
            $theme_photo_path = 'images/theme_'.$themeImageName;
            $request->theme->move(public_path('images'), 'theme_'.$themeImageName);
            $journey->theme_img_path = $theme_photo_path;
        }
        if(isset($request->icon)){
            $iconImageName = time().'.'.$request->icon->extension();
            $icon_photo_path = 'images/icon_'.$iconImageName;
            $request->icon->move(public_path('images'), 'icon_'.$iconImageName);
            $journey->icon_img_path = $icon_photo_path;
        }     
        $journey->update();
        return redirect()->route('journeys.index');
    }
    public function JourneyCreateLevels($id)
    {
        $journey = Journey::findOrFail($id);

        $initialTopics = fractal(Skill::select(['id', 'name', 'section_id'])
            ->with('section:id,name')
            ->where('section_id', $journey->section_id)
            ->get(), new SkillSearchTransformer())
            ->toArray()['data'];

        $initialTopicsIds = Skill::where('section_id', $journey->section_id)->pluck("id");

        $initialSubTopics = fractal(Topic::select(['id', 'name', 'skill_id'])
            ->with('skill:id,name')
            ->whereIn('skill_id', $initialTopicsIds)
            ->get(), new TopicSearchTransformer())
            ->toArray()['data'];
        return view('Admin/Journey/Levels', [
            'journey' => $journey,
            'levels' =>  fractal(JourneyLevel::where("journey_id", $id)->where("is_active", true)->get(), new JourneyLevelTransformer())->toArray(),
            'initialTopics' => $initialTopics,
            'initialSubTopics' => $initialSubTopics,
        ]);
    }
    public function JourneyCreateLevel(Request $request)
    {
        $is_active = $request->is_active == "on" ? true : false;
        $ImageName = time().'.'.$request->photo->extension();  
        $request->photo->move(public_path('images'), $ImageName);
        $photo_path = 'images/'.$ImageName;
        $level = new JourneyLevel();
        $level->img_path = $photo_path;
        $level->img_width = $request->width;
        $level->img_position_x = $request->position_x;
        $level->img_position_y = $request->position_y;
        $level->journey_id = $request->id;
        $level->description = $request->description;
        $level->is_active = $is_active;
        $level->save();
        return redirect()->route('journey_create_levels', ['id' => $level->journey_id]);
    }
    public function addJourneySet($journey_id, $level_id, Request $request)
    {
        $data = $request->all();
        $data['is_active'] = $data['is_active'] == 'true' ? true : false;
        $data['is_paid'] = $data['is_paid'] == 'true' ? true : false;
        $data['allow_rewards'] = $data['allow_rewards'] == 'true' ? true : false;
        $data['auto_grading'] = $data['auto_grading'] == 'true' ? true : false;
        $data['show_reward_popup'] = $data['show_reward_popup'] == 'true' ? true : false;
        $data['correct_marks'] = $data['show_reward_popup'] != true ? (int)$data['correct_marks'] : null;
        $data['questions'] = (int)$data['questions'];
        $data['topic'] = (int)$data['topic'];
        $subtopicsArr = $data['subtopics_arr'] ? explode(',', $data['subtopics_arr']) : array();

        $journeySet = JourneySet::create([
            "title" => $data['title'],
            "subtitle" => $data['subtitle'],
            "sub_category_id" => Journey::findOrFail($journey_id)->sub_category_id,
            "skill_id" => $data['topic'],
            "journey_level_id" => $level_id,
            "journey_id" => $journey_id,
            "description" => $data['description'],
            "total_questions" => 0,
            "auto_grading" => $data['auto_grading'],
            "correct_marks" => $data['correct_marks'],
            "allow_rewards" => $data['allow_rewards'],
            "is_paid" => $data['is_paid'],
            "is_active" => $data['is_active']
        ]);
        $existing_ques = [];
        $fetch_ques_journey_set = JourneySet::where('is_active', true)->where("journey_level_id", $level_id)->pluck('id');
        foreach($fetch_ques_journey_set as $id){
            $set_questions = DB::table('journey_set_questions')->where('journey_set_id', $id)->get()->toArray();
            foreach($set_questions as $set){
                array_push($existing_ques,$set->question_id);
            }
        }
    

        $all_ques = count($subtopicsArr) <= 0 ? Question::active()->whereHas('skill')->whereNotIn('id', $existing_ques)->where('skill_id', $data['topic'])->take($data['questions'])->pluck('id') : Question::active()->whereHas('skill')->whereNotIn('id', $existing_ques)->where('skill_id', $data['topic'])->whereIn('topic_id', $subtopicsArr)->take($data['questions'])->pluck('id');

        foreach($all_ques as $id){
            if (!$journeySet->questions->contains($id)) {
                $journeySet->questions()->attach($id, ['journey_set_id' => $journeySet->id]);
                $journeySet->total_questions = $journeySet->questions()->count();
                $journeySet->update();
            }
        }
        return [
            "success" => true,
            'journeySet' => fractal($journeySet, new JourneySetTransformer())->toArray()
        ];
    }
    
    public function JourneyLevelSetUpdate($id, Request $request)
    {
        $journeySet = JourneySet::find($id);
        $data = $request->all();
        $data['is_active'] = isset($data['is_active']) ? $data['is_active'] == 'on' ? true : false : false;
        $data['is_paid'] = isset($data['is_paid']) ? $data['is_paid'] == 'on' ? true : false : false;
        $data['allow_rewards'] = isset($data['allow_rewards']) ? $data['allow_rewards'] == 'true' ? true : false : false;
        $data['auto_grading'] = isset($data['auto_grading']) ? $data['auto_grading'] == 'true' ? true : false : false;
        $data['show_reward_popup'] = isset($data['show_reward_popup']) ? $data['show_reward_popup'] == 'true' ? true : false : false;
        $data['update_question'] = isset($data['update_question']) ? $data['update_question'] == 'true' ? true : false : false;
        $data['correct_marks'] = $data['show_reward_popup'] != true ? (int)$data['correct_marks'] : null;
        $data['questions_num'] = (int)$data['questions_num'];
        $data['topic'] = (int)$data['topic'];
        $subtopicsArr = $data['subtopics_arr'] ? explode(',', $data['subtopics_arr']) : array();

        if(!$data['update_question']){
            $journeySet->update([
                "title" => $data['title'],
                "subtitle" => $data['subtitle'],
                "description" => $data['description'],
                "auto_grading" => $data['auto_grading'],
                "correct_marks" => $data['correct_marks'],
                "allow_rewards" => $data['allow_rewards'],
                "is_paid" => $data['is_paid'],
                "is_active" => $data['is_active']
            ]);
            return redirect()->route('journey_create_levels', ['id' => $journeySet->journey_id]);
        }


        $affectedRows = DB::table('journey_set_questions')->where('journey_set_id', $id)->delete();
        
        $journeySet->update([
            "title" => $data['title'],
            "subtitle" => $data['subtitle'],
            "description" => $data['description'],
            "auto_grading" => $data['auto_grading'],
            "correct_marks" => $data['correct_marks'],
            "allow_rewards" => $data['allow_rewards'],
            "total_questions" => 0,
            "skill_id" => $data['topic'],
            "is_paid" => $data['is_paid'],
            "is_active" => $data['is_active']
        ]);

        $existing_ques = [];
        $fetch_ques_journey_set = JourneySet::where('is_active', true)->where("journey_level_id", $journeySet->journey_level_id)->pluck('id');
        foreach($fetch_ques_journey_set as $id){
            $set_questions = DB::table('journey_set_questions')->where('journey_set_id', $id)->get()->toArray();
            foreach($set_questions as $set){
                array_push($existing_ques,$set->question_id);
            }
        }
    

        $all_ques = count($subtopicsArr) <= 0 ? Question::active()->whereHas('skill')->whereNotIn('id', $existing_ques)->where('skill_id', $data['topic'])->take($data['questions_num'])->pluck('id') : Question::active()->whereHas('skill')->whereNotIn('id', $existing_ques)->where('skill_id', $data['topic'])->whereIn('topic_id', $subtopicsArr)->take($data['questions_num'])->pluck('id');

        foreach($all_ques as $id){
            if (!$journeySet->questions->contains($id)) {
                $journeySet->questions()->attach($id, ['journey_set_id' => $journeySet->id]);
                $journeySet->total_questions = $journeySet->questions()->count();
                $journeySet->update();
            }
        }
        return redirect()->route('journey_create_levels', ['id' => $journeySet->journey_id]);
    }

    public function JourneyEdit($id)
    {
        return view('Admin/Journey/Details', [
            'subjects' => Section::select('id', 'name' )->active()->get(),
            'years' => SubCategory::select('id', 'name' )->active()->get(),
            'SubCategorySections' => SubCategorySections::select('sub_category_id', 'section_id' )->get(),
            'journey' => fractal(Journey::findOrFail($id), new JourneyTransformer())->toArray()['data'],
            'raw_journey' => Journey::findOrFail($id),
            'editFlag' => true
        ]);
    }

    /**
     * Show a practice set
     *
     * @param $id
     * @return array
     */
    public function show($id)
    {
        $practiceSet = PracticeSet::find($id);
        return fractal($practiceSet, new JourneyTransformer())->toArray();
    }

    /**
     * Edit a practice set
     *
     * @param $id
     * @return \Inertia\Response
     */
    public function edit($id)
    {
        $set = PracticeSet::findOrfail($id);
        if (Auth::user()->hasRole("admin")) {
            return view('Admin/PracticeSet/Details', [
                'steps' => $this->repository->getSteps($set->id, 'details'),
                'editFlag' => true,
                'practiceSet' => $set,
            'practiceSetId' => $set->id,
            'initialSubCategories' => fractal(SubCategory::select(['id', 'name', 'category_id'])
                ->where('is_active', true)
                ->with('category:id,name')
                ->where('id', $set->sub_category_id)
                ->get(), new SubCategorySearchTransformer())
                ->toArray()['data'],
            'initialSkills' => fractal(Skill::select(['id', 'name', 'section_id'])
            ->where('is_active', true)
            ->with('section:id,name')
            ->where('id', $set->skill_id)
            ->get(), new SkillSearchTransformer())
            ->toArray()['data'],
        ]);
    }else if (Auth::user()->hasRole("parent") || Auth::user()->hasRole("teacher") || Auth::user()->hasRole("student")){
        return view('Parent/PracticeSet/Details', [
            // 'steps' => $id,
            'steps' => $this->repository->getSteps($set->id, 'details'),
            'editFlag' => true,
            'practiceSet' => $set,
            'practiceSetId' => $set->id,
            'initialSubCategories' => fractal(SubCategory::select(['id', 'name', 'category_id'])
                ->where('is_active', true)
                ->with('category:id,name')
                ->where('id', $set->sub_category_id)
                ->get(), new SubCategorySearchTransformer())
                ->toArray()['data'],
            'initialSkills' => fractal(Skill::select(['id', 'name', 'section_id'])
                ->where('is_active', true)
                ->with('section:id,name')
                ->where('id', $set->skill_id)
                ->get(), new SkillSearchTransformer())
                ->toArray()['data'],
        ]);
    }
    }

    /**
     * Update a practice set
     *
     * @param UpdatePracticeSetRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdatePracticeSetRequest $request, $id)
    {
        $practiceSet = PracticeSet::find($id);
        $data = $request->all();
        $data['is_active'] = $data['is_active'] === 'true'? true: false;
        $data['is_paid'] = $data['is_paid'] === 'true'? true: false;
        if($data['skill_id'] != null){$data['skill_id'] = (int)$data['skill_id'];}
        if($data['sub_category_id'] != null){$data['sub_category_id'] = (int)$data['sub_category_id'];}        
        $practiceSet->update($data);
        return ['practice_set' => $practiceSet->id];
    }

    /**
     * Practice set settings page
     *
     * @param $id
     * @return \Inertia\Response
     */
    public function settings($id)
    {
        $practiceSet = PracticeSet::findOrFail($id);
        if (Auth::user()->hasRole("admin")) {

            return view('Admin/PracticeSet/Settings', [
                'practiceSet' => $practiceSet,
                'steps' => $this->repository->getSteps($practiceSet->id, 'settings'),
                'editFlag' => true
            ]);
        }else if(Auth::user()->hasRole("parent") || Auth::user()->hasRole("teacher") || Auth::user()->hasRole("student")){

            return view('Parent/PracticeSet/Settings', [
                'practiceSet' => $practiceSet,
                'steps' => $this->repository->getSteps($practiceSet->id, 'settings'),
                'editFlag' => true
            ]);
        }
    }

    /**
     * Update practice set settings
     *
     * @param UpdatePracticeSetSettingsRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateSettings(UpdatePracticeSetSettingsRequest $request, $id)
    {
        $request['auto_grading'] = $request['auto_grading']?true:false;
        $request['show_reward_popup'] = $request['show_reward_popup']?true:false;
        $request['allow_rewards'] = $request['allow_rewards']?true:false;
        $request['correct_marks'] = $request['correct_marks']?(int)$request['correct_marks']:null;
        $practiceSet = PracticeSet::findOrFail($id);
        $practiceSet->update($request->validated());
        return ['practice_set' => $practiceSet->id];
    }

    /**
     * Delete a practice set
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function JourneyDelete($id)
    {
        try {
            $journey = Journey::find($id);
            $journey->secureDelete();
        }
        catch (\Illuminate\Database\QueryException $e){
            return redirect()->route('journeys.index')->with('success','false')->with('errorMessage','Unable to Delete Journey. Remove all associations and Try again!');
        }
        return redirect()->route('journeys.index')->with('success','true')->with('message','Journey was successfully deleted!');
    }
    public function JourneyLevelEdit($id)
    {
        $level = JourneyLevel::find($id);
        return view('Admin/Journey/LevelUpdate', [
            "level" => $level
        ]);
    }
    public function JourneyLevelSetEdit($id)
    {
        $set = JourneySet::find($id);
        $journey = Journey::findOrFail($set->journey_id);

        $initialTopics = fractal(Skill::select(['id', 'name', 'section_id'])
            ->with('section:id,name')
            ->where('section_id', $journey->section_id)
            ->get(), new SkillSearchTransformer())
            ->toArray()['data'];

        $initialTopicsIds = Skill::where('section_id', $journey->section_id)->pluck("id");

        $initialSubTopics = fractal(Topic::select(['id', 'name', 'skill_id'])
            ->with('skill:id,name')
            ->whereIn('skill_id', $initialTopicsIds)
            ->get(), new TopicSearchTransformer())
            ->toArray()['data'];

            
        return view('Admin/Journey/SetUpdate', [
            "set" => $set,
            "initialTopics" => $initialTopics,
            "initialSubTopics" => $initialSubTopics,
        ]);
    }
    public function JourneyLevelUpdate($id, Request $request)
    {
        $level = JourneyLevel::find($id);    

        if(isset($request->photo)){
            $ImageName = time().'.'.$request->photo->extension();  
            $request->photo->move(public_path('images'), $ImageName);
            $photo_path = 'images/'.$ImageName;
            $level->img_path = $photo_path;
        }
        $level->img_width = $request->width;
        $level->img_position_x = $request->position_x;
        $level->img_position_y = $request->position_y;
        $level->description = $request->description;
        $level->is_active = $request->is_active == "on" ? true : false;

        $level->update();
        return redirect()->route('journey_create_levels', ['id' => $level->journey_id]);
    }
    public function JourneyLevelDelete($id)
    {
        try {
            $level = JourneyLevel::find($id);
            $level->secureDelete();
        }
        catch (\Illuminate\Database\QueryException $e){
            return redirect()->route('journey_create_levels', ['id' => $level->journey_id])->with('success','false')->with('errorMessage','Unable to Delete Journey level. Remove all associations and Try again!');
        }
        return redirect()->route('journey_create_levels', ['id' => $level->journey_id])->with('success','true')->with('message','Journey level was successfully deleted!');
    }

    
    public function JourneyLevelSetDelete($id)
    {
        try {
            $set = JourneySet::find($id);
            $set->secureDelete();
        }
        catch (\Illuminate\Database\QueryException $e){
            return redirect()->back()->with('success','false')->with('errorMessage','Unable to delete level set. Remove all associations and Try again!');
        }
        return redirect()->back()->with('success','true')->with('message','Level set was successfully deleted!');
    }
}
