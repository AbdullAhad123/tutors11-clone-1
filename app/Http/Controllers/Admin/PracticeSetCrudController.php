<?php
/**
 * File name: PracticeSetCrudController.php
 * Last modified: 19/07/21, 12:55 AM
 * Author: NearCraft - https://codecanyon.net/user/nearcraft
 * Copyright (c) 2021
 */

namespace App\Http\Controllers\Admin;
use Inertia\Inertia;

use App\Models\Skill;
use App\Models\Topic;
use App\Models\Section;
use App\Models\PracticeSet;
use App\Models\SubCategory;
use App\Models\subCategorySections;
use App\Filters\PracticeSetFilters;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Repositories\PracticeSetRepository;
use App\Transformers\Admin\SectionTransformer;
use App\Transformers\Admin\PracticeSetTransformer;
use App\Transformers\Admin\SkillSearchTransformer;
use App\Transformers\Admin\TopicSearchTransformer;
use App\Transformers\Admin\SubCategorySearchTransformer;
use App\Http\Requests\Admin\StorePracticeSetRequest;
use App\Http\Requests\Admin\UpdatePracticeSetRequest;
use App\Http\Requests\Admin\UpdatePracticeSetSettingsRequest;


class PracticeSetCrudController extends Controller
{
    private PracticeSetRepository $repository;

    public function __construct(PracticeSetRepository $repository)
    {
        $this->middleware(['role:admin|instructor|parent|teacher|student']);
        $this->repository = $repository;
    }

    /**
     * List all practice sets
     *
     * @param PracticeSetFilters $filters
     * @return \Inertia\Response
     */
    public function index(PracticeSetFilters $filters)
    {
        return view('Admin/PracticeSets', [
            'practiceSets' => function () use($filters) {
                return fractal(PracticeSet::filter($filters)->with(['subCategory:id,name', 'skill:id,name'])
                    ->paginate(request()->perPage != null ? request()->perPage : 10),
                    new PracticeSetTransformer())->toArray();
            },
        ]);
    }

    /**
     * Create a practice set
     *
     * @return \Inertia\Response
     */
    public function create(Request $request)
    {
        if (Auth::user()->hasRole("admin")) {
            return view('Admin/PracticeSet/Details', [
                'steps' => $this->repository->getSteps(),
                'initialSubCategories' => fractal(SubCategory::select(['id', 'name', 'category_id'])->latest()->take(10)->get(),
                new SubCategorySearchTransformer())->toArray()['data']
            ]);
        } else if (Auth::user()->hasRole("instructor")){
            return view('Admin/PracticeSet/Details', [
                'steps' => $this->repository->getSteps(),
                'initialSubCategories' => fractal(SubCategory::select(['id', 'name', 'category_id'])->latest()->take(10)->get(),
                    new SubCategorySearchTransformer())->toArray()['data']
            ]);
        }else if (Auth::user()->hasRole("parent") || Auth::user()->hasRole("teacher") || Auth::user()->hasRole("student")){
            $formatted_sections = [];
            $formatted_topics = [];
            $sections_ids = [];
            if(Auth::user()->hasRole("parent") || Auth::user()->hasRole("teacher")){
                $sections = fractal(Section::select(['id', 'name'])->where('is_active', true)->whereIn('id', subCategorySections::where('sub_category_id', session('selected_child')['classId'])->pluck('section_id'))->get(), new SectionTransformer())->toArray()['data'];
            } else {
                
                $sections = fractal(Section::select(['id', 'name'])->where('is_active', true)->whereIn('id', subCategorySections::where('sub_category_id', session('category_id'))->pluck('section_id'))->get(), new SectionTransformer())->toArray()['data'];
            }
            foreach($sections as $section){
                if (str_contains($section['name'], 'Math')) {
                    $icon = '../images/maths-icon.png';
                } else if (str_contains($section['name'], 'English')){
                    $icon = '../images/english_journey.png';
                } else if(str_contains($section['name'], 'Verbal')){
                    $icon = '../images/verbal-icon.png';
                } else if(str_contains($section['name'], 'Non Verbal')){
                    $icon = 'https://cdn-icons-png.flaticon.com/128/5090/5090482.png';
                } else {
                    $icon = 'https://cdn-icons-png.flaticon.com/128/3771/3771361.png';
                }
                $i = [
                    'id' => $section['id'],
                    'name' => $section['name'],
                    'icon' => $icon
                ];
                array_push($sections_ids, $section['id']);
                array_push($formatted_sections, $i);
            }
            $topics = fractal(Skill::select(['id', 'name', 'section_id'])->where('is_active', true)->with('section:id,name')->whereIn('section_id', $sections_ids)->get(), new SkillSearchTransformer())->toArray()['data'];
            foreach($topics as $topic){
                $i = [
                    'id' => $topic['id'],
                    'name' => $topic['name'],
                    'section_id' => $topic['section_id'],
                    'subTopics' => fractal(Topic::select(['id', 'name', 'skill_id'])->where('is_active', true)->where('skill_id', $topic['id'])->with('skill:id,name')->get(), new TopicSearchTransformer())->toArray()['data']
                ];
                array_push($formatted_topics, $i);
            }
            $practice_subject = null;
            $practice_topic = null;
            $practice_sub_topics = null;
            if ($request->has('subject') && $request->has('topic') && $request->has('sub_topics') && $request->input('subject') && $request->input('topic') && $request->input('sub_topics')) {
                $practice_subject = (int)$request->input('subject');
                $practice_topic = (int)$request->input('topic');
                $practice_sub_topics = explode(",",$request->input('sub_topics'));
            }
            return view('Parent/PracticeSet/Details', [
                'steps' => $this->repository->getSteps(),
                'sections' => $formatted_sections,
                'initialSubCategories' => fractal(SubCategory::select(['id', 'name', 'category_id'])->latest()->take(10)->get(), new SubCategorySearchTransformer())->toArray()['data'],
                'topics' => $formatted_topics,
                'practice_subject' => $practice_subject,
                'practice_topic' => $practice_topic,
                'practice_sub_topics' => $practice_sub_topics,
            ]);
        }
    }
    public function parentCreate(Request $request)
    {
        if (Auth::user()->hasRole("admin")) {
            return view('Admin/PracticeSet/Details', [
                'steps' => $this->repository->getSteps(),
                'initialSubCategories' => fractal(SubCategory::select(['id', 'name', 'category_id'])->latest()->take(10)->get(),
                new SubCategorySearchTransformer())->toArray()['data']
            ]);
        } else if (Auth::user()->hasRole("instructor")){
            return view('Admin/PracticeSet/Details', [
                'steps' => $this->repository->getSteps(),
                'initialSubCategories' => fractal(SubCategory::select(['id', 'name', 'category_id'])->latest()->take(10)->get(),
                    new SubCategorySearchTransformer())->toArray()['data']
            ]);
        }else if (Auth::user()->hasRole("parent") || Auth::user()->hasRole("teacher") || Auth::user()->hasRole("student")){
            $formatted_sections = [];
            $formatted_topics = [];
            $sections_ids = [];
            if(Auth::user()->hasRole("parent") || Auth::user()->hasRole("teacher")){
                $sections = fractal(Section::select(['id', 'name'])->where('is_active', true)->whereIn('id', subCategorySections::where('sub_category_id', session('selected_child')['classId'])->pluck('section_id'))->get(), new SectionTransformer())->toArray()['data'];
            } else {
                
                $sections = fractal(Section::select(['id', 'name'])->where('is_active', true)->whereIn('id', subCategorySections::where('sub_category_id', session('category_id'))->pluck('section_id'))->get(), new SectionTransformer())->toArray()['data'];
            }
            foreach($sections as $section){
                if (str_contains($section['name'], 'Math')) {
                    $icon = '../images/maths-icon.png';
                } else if (str_contains($section['name'], 'English')){
                    $icon = '../images/english_journey.png';
                } else if(str_contains($section['name'], 'Verbal')){
                    $icon = '../images/verbal-icon.png';
                } else if(str_contains($section['name'], 'Non Verbal')){
                    $icon = 'https://cdn-icons-png.flaticon.com/128/5090/5090482.png';
                } else {
                    $icon = 'https://cdn-icons-png.flaticon.com/128/3771/3771361.png';
                }
                $i = [
                    'id' => $section['id'],
                    'name' => $section['name'],
                    'icon' => $icon
                ];
                array_push($sections_ids, $section['id']);
                array_push($formatted_sections, $i);
            }
            $topics = fractal(Skill::select(['id', 'name', 'section_id'])->where('is_active', true)->with('section:id,name')->whereIn('section_id', $sections_ids)->get(), new SkillSearchTransformer())->toArray()['data'];
            foreach($topics as $topic){
                $i = [
                    'id' => $topic['id'],
                    'name' => $topic['name'],
                    'section_id' => $topic['section_id'],
                    'subTopics' => fractal(Topic::select(['id', 'name', 'skill_id'])->where('is_active', true)->where('skill_id', $topic['id'])->with('skill:id,name')->get(), new TopicSearchTransformer())->toArray()['data']
                ];
                array_push($formatted_topics, $i);
            }
            $practice_subject = null;
            $practice_topic = null;
            $practice_sub_topics = null;
            if ($request->has('subject') && $request->has('topic') && $request->has('sub_topics') && $request->input('subject') && $request->input('topic') && $request->input('sub_topics')) {
                $practice_subject = (int)$request->input('subject');
                $practice_topic = (int)$request->input('topic');
                $practice_sub_topics = explode(",",$request->input('sub_topics'));
            }
            return view('Parent/PracticeSet/Details', [
                'steps' => $this->repository->getSteps(),
                'sections' => $formatted_sections,
                'initialSubCategories' => fractal(SubCategory::select(['id', 'name', 'category_id'])->latest()->take(10)->get(), new SubCategorySearchTransformer())->toArray()['data'],
                'topics' => $formatted_topics,
                'practice_subject' => $practice_subject,
                'practice_topic' => $practice_topic,
                'practice_sub_topics' => $practice_sub_topics,
            ]);
        }
    }

    public function studentCreate(Request $request)
    {
        if (Auth::user()->hasRole("admin")) {
            return view('Admin/PracticeSet/Details', [
                'steps' => $this->repository->getSteps(),
                'initialSubCategories' => fractal(SubCategory::select(['id', 'name', 'category_id'])->latest()->take(10)->get(),
                new SubCategorySearchTransformer())->toArray()['data']
            ]);
        } else if (Auth::user()->hasRole("instructor")){
            return view('Admin/PracticeSet/Details', [
                'steps' => $this->repository->getSteps(),
                'initialSubCategories' => fractal(SubCategory::select(['id', 'name', 'category_id'])->latest()->take(10)->get(),
                    new SubCategorySearchTransformer())->toArray()['data']
            ]);
        }else if (Auth::user()->hasRole("parent") || Auth::user()->hasRole("teacher") || Auth::user()->hasRole("student")){
            $formatted_sections = [];
            $formatted_topics = [];
            $sections_ids = [];
            if(Auth::user()->hasRole("parent") || Auth::user()->hasRole("teacher")){
                $sections = fractal(Section::select(['id', 'name'])->where('is_active', true)->whereIn('id', subCategorySections::where('sub_category_id', session('selected_child')['classId'])->pluck('section_id'))->get(), new SectionTransformer())->toArray()['data'];
            } else {
                $sections = fractal(Section::select(['id', 'name'])->where('is_active', true)->whereIn('id', subCategorySections::where('sub_category_id', session('category_id'))->pluck('section_id'))->get(), new SectionTransformer())->toArray()['data'];
            }
            foreach($sections as $section){
                if (str_contains($section['name'], 'Math')) {
                    $icon = '../images/maths-icon.png';
                } else if (str_contains($section['name'], 'English')){
                    $icon = '../images/english_journey.png';
                } else if(str_contains($section['name'], 'Verbal')){
                    $icon = '../images/verbal-icon.png';
                } else if(str_contains($section['name'], 'Non Verbal')){
                    $icon = 'https://cdn-icons-png.flaticon.com/128/5090/5090482.png';
                } else {
                    $icon = 'https://cdn-icons-png.flaticon.com/128/3771/3771361.png';
                }
                $i = [
                    'id' => $section['id'],
                    'name' => $section['name'],
                    'icon' => $icon
                ];
                array_push($sections_ids, $section['id']);
                array_push($formatted_sections, $i);
            }
            $topics = fractal(Skill::select(['id', 'name', 'section_id'])->where('is_active', true)->with('section:id,name')->whereIn('section_id', $sections_ids)->get(), new SkillSearchTransformer())->toArray()['data'];
            foreach($topics as $topic){
                $i = [
                    'id' => $topic['id'],
                    'name' => $topic['name'],
                    'section_id' => $topic['section_id'],
                    'subTopics' => fractal(Topic::select(['id', 'name', 'skill_id'])->where('is_active', true)->where('skill_id', $topic['id'])->with('skill:id,name')->get(), new TopicSearchTransformer())->toArray()['data']
                ];
                array_push($formatted_topics, $i);
            }
            $practice_subject = null;
            $practice_topic = null;
            $practice_sub_topics = null;
            if ($request->has('subject') && $request->has('topic') && $request->input('subject') && $request->input('topic')) {
                $practice_subject = (int)$request->input('subject');
                $practice_topic = (int)$request->input('topic');
                if($request->has('sub_topics') && $request->input('sub_topics')){
                    $practice_sub_topics = explode(",",$request->input('sub_topics'));
                } else {
                    $selectedSkill = Skill::where('id', $practice_topic)->with('topics')->first();
                    if ($selectedSkill && $selectedSkill->topics) {
                        $practice_sub_topics = $selectedSkill->topics->pluck('id')->toArray();
                    }
                }
            }
            return view('User/PracticeSet/Details', [
                'steps' => $this->repository->getSteps(),
                'sections' => $formatted_sections,
                'initialSubCategories' => fractal(SubCategory::select(['id', 'name', 'category_id'])->latest()->take(10)->get(), new SubCategorySearchTransformer())->toArray()['data'],
                'topics' => $formatted_topics,
                'practice_subject' => $practice_subject,
                'practice_topic' => $practice_topic,
                'practice_sub_topics' => $practice_sub_topics,
            ]);
        }
    }

    /**
     * Store a practice set
     *
     * @param StorePracticeSetRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $data = $request->all();
        if (Auth::user()->hasRole("parent") || Auth::user()->hasRole("teacher") || Auth::user()->hasRole("student")){
            $data['is_active'] = true;
            $data['is_paid'] = false;
            $data['auto_grading'] = true;
            $data['allow_rewards'] = true;
            $data['correct_marks'] = 1;
            $data['custom_set'] = 1;
            $data['sub_category_id'] = subCategorySections::where('section_id', $data['section_id'])->get('sub_category_id')->take(1)[0]->sub_category_id;
            $data['skill_id'] = (int)$data['skill_id'];
            $data['section_id'] = (int)$data['section_id'];
            if(isset($data['sub_topics']) && count($data['sub_topics']) > 0){
                $data['sub_topics'] = json_encode($data['sub_topics']);
            }
            $practiceSet = PracticeSet::create($data);
        } else {
            $data['is_active'] = $data['is_active'] === 'true'? true: false;
            $data['is_paid'] = $data['is_paid'] === 'true'? true: false;
            if($data['skill_id'] != null){$data['skill_id'] = (int)$data['skill_id'];}
            if($data['sub_category_id'] != null){$data['sub_category_id'] = (int)$data['sub_category_id'];}
            $practiceSet = PracticeSet::create($data);
        }
        return ['practice_set' => $practiceSet->id];
        
        // return redirect()->route('practice-sets.settings', ['practice_set' => $practiceSet->id])->with('successMessage', 'Details saved successfully!');
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
        return fractal($practiceSet, new PracticeSetTransformer())->toArray();
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
    public function destroy($id)
    {
        try {
            $practiceSet = PracticeSet::find($id);
            $practiceSet->secureDelete('questions', 'sessions');
        }
        catch (\Illuminate\Database\QueryException $e){
            return [
                'message' => "Unable to Delete Practice Set. Remove all associations and Try again!",
                'success' => false,
            ];
        }
        return [
            'message' => "Practice Set was successfully deleted!",
            'success' => true,
        ];
    }
}
