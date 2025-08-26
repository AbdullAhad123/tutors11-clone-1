<?php
/**
 * File name: TopicCrudController.php
 * Last modified: 19/07/21, 12:55 AM
 * Author: NearCraft - https://codecanyon.net/user/nearcraft
 * Copyright (c) 2021
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use App\Models\Topic;
use App\Models\Section;
use App\Transformers\Admin\TopicSearchTransformer;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Filters\TopicFilters;
use App\Http\Requests\Admin\StoreTopicRequest;
use App\Http\Requests\Admin\UpdateTopicRequest;
use App\Transformers\Admin\TopicTransformer;
use Illuminate\Support\Str;

class TopicCrudController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:admin|instructor'])->except('search');
    }

    /**
     * List all topics
     *
     * @param TopicFilters $filters
     * @return \Inertia\Response
     */
    public function index(TopicFilters $filters)
    {
        $sections = Section::select()->get();
        return view('Admin/Topics', [
            'sections' => $sections,
            'skills' => Skill::select(['name', 'id', 'section_id'])->orderBy('name', 'asc')->get(),
            'topics' => function () use($filters) {
                return fractal(Topic::filter($filters)
                    ->paginate(request()->perPage != null ? request()->perPage : 10),
                    new TopicTransformer())->toArray();
            },
        ]);
    }


    /**
     * Search topics api endpoint
     *
     * @param Request $request
     * @param TopicFilters $filters
     * @return \Illuminate\Http\JsonResponse
     */
    public function search(Request $request, TopicFilters $filters)
    {
        $query = $request->get('query');
        return response()->json([
            'topics' => fractal(Topic::select(['id', 'name', 'skill_id'])
                ->filter($filters)
                ->with(['skill:id,name,section_id', 'skill.section:id,name'])
                ->where('name', 'like', '%'.$query.'%')->limit(20)
                ->get(), new TopicSearchTransformer())
                ->toArray()['data']
        ]);
    }

    /**
     * Store a topic
     *
     * @param StoreTopicRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreTopicRequest $request)
    {
        $data = $request->all();
        $data['is_active'] = $request['is_active'] == 'on'?true:false;
        $data['skill_id'] = (int)$request['skill_id'];
        if(isset($request->helpsheet_photo)){
            $ImageName = time().'.'.$request->helpsheet_photo->extension();
            $photo_path = 'images/helpsheets/helpsheet_'.$ImageName;
            $request->helpsheet_photo->move(public_path('images/helpsheets'), 'helpsheet_'.$ImageName);
            $data['helpsheet'] = $photo_path;
            unset($data['helpsheet_photo']);
        }
        try{
            Topic::create($data);
        } catch (\Illuminate\Database\QueryException $e){
            if($e->getCode() == 23000){
                $data['slug'] = Str::slug($request->name).'-'.str_pad(rand(0, 99), 2, '0', STR_PAD_LEFT);
                Topic::create($data);
            }
        }
        return redirect()->route('topics.index');
    }

    /**
     * Show a topic
     *
     * @param $id
     * @return array
     */
 
    /**
     * Edit a topic
     *
     * @param $id
     * @return Topic|Topic[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null
     */
    public function edit($id)
    {
        $topic = Topic::find($id);
        $skill = Skill::find($topic->skill_id);
        return view('Admin/Topics/Update', [
            'current_section' => $skill->section_id,
            'sections' => Section::select()->get(),
            'topic' => $topic,
            'skills' => Skill::select(['name', 'id', 'section_id'])->orderBy('name', 'asc')->get()
        ]);
    }

    /**
     * Update a topic
     *
     * @param UpdateTopicRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateTopicRequest $request, $id)
    {
        $topic = Topic::find($id);
        $data = $request->all();
        $data['is_active'] = $request['is_active'] == 'on'?true:false;
        $data['skill_id'] = (int)$request['skill_id'];
        if(isset($request->helpsheet_photo)){
            $ImageName = time().'.'.$request->helpsheet_photo->extension();
            $photo_path = 'images/helpsheets/helpsheet_'.$ImageName;
            $request->helpsheet_photo->move(public_path('images/helpsheets'), 'helpsheet_'.$ImageName);
            $data['helpsheet'] = $photo_path;
            unset($data['helpsheet_photo']);
        }
        $topic->update($data);
        return redirect()->route('topics.index');
    }

    /**
     * Delete a topic
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        try {
            $topic = Topic::find($id);

            // if(!$topic->canSecureDelete('questions')) {
            //     return [
            //         'success' => false,
            //         'message' => 'Unable to Delete Topic. Remove all associations and Try again!'
            //     ];
            // }
            $topic->deleted_by = auth()->user()->id;
            $topic->save();
            $topic->delete();
        }
        catch (\Illuminate\Database\QueryException $e){
            // testing issue while deleting sub topic:
            dd($e);
            return [
                'success' => false,
                'message' => 'Unable to delete sub topic. Remove all associations and Try again!'
            ];
        }
        return [
            'success' => true,
            'message' => 'Sub Topic was successfully deleted!'
        ];
    }
}
