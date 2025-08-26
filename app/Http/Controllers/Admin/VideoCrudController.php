<?php

namespace App\Http\Controllers\Admin;

use App\Filters\VideoFilters;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreVideoRequest;
use App\Http\Requests\Admin\UpdateVideoRequest;
use App\Models\DifficultyLevel;
use App\Models\Skill;
use App\Models\Topic;
use App\Models\Video;
use App\Models\Tag;
use App\Repositories\TagRepository;
use App\Transformers\Admin\VideoTransformer;
use App\Transformers\Admin\SkillSearchTransformer;
use App\Transformers\Admin\TopicSearchTransformer;
use Illuminate\Http\Request;
use Inertia\Inertia;

class VideoCrudController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:admin|instructor']);
    }

    /**
     * Display a listing of the resource.
     *
     * @param VideoFilters $filters
     * @return \Inertia\Response
     */
    public function index(VideoFilters $filters)
    {
        return view('Admin/Videos', [
            'videos' => function () use ($filters) {
                return fractal(Video::with(['section:sections.id,sections.name', 'skill:id,name', 'topic:id,name'])->filter($filters)
                    ->paginate(request()->perPage != null ? request()->perPage : 10),
                    new VideoTransformer())->toArray();
            },
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Inertia\Response
     */
    public function create()
    {
        return view('Admin/Video/Form', [
            'difficultyLevels' => DifficultyLevel::select(['name', 'id'])->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreVideoRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreVideoRequest $request)
    {
        $data = $request->all();
        $data['thumbnail'] = "";
        $data['is_active'] = $request['is_active'] == "true"?true:false;
        $data['is_paid'] = $request['is_paid'] == 'true'?true:false;
        $data['difficulty_level_id'] = (int)$request['difficulty_level_id'];
        $data['duration'] = (int)$request['duration'];
        $data['skill_id'] = (int)$request['skill_id'];
        $data['tags'] = (int)$request['tags']?[(int)$request['tags']]:[];
        $data['topic_id'] = $request['topic_id']?(int)$request['topic_id']:null;
        Video::create($data);
        return [
            'success' => true,
            'messages' => 'Video created successfully!',
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Inertia\Response
     */
    public function edit($id)
    {
        $video = Video::with('tags')->findOrFail($id);
        return view('Admin/Video/Form', [
            'video' => $video,
            'editFlag' => true,
            'videoId' => $video->id,
            'difficultyLevels' => DifficultyLevel::select(['name', 'id'])->get(),
            'initialSkills' => fractal(Skill::select(['id', 'name', 'section_id'])
                ->with('section:id,name')
                ->where('id', $video->skill_id)
                ->get(), new SkillSearchTransformer())
                ->toArray()['data'],
            'initialTopics' => fractal(Topic::select(['id', 'name', 'skill_id'])
                ->with('skill:id,name')
                ->where('skill_id', $video->skill_id)
                ->get(), new TopicSearchTransformer())
                ->toArray()['data'],
            'initialTags' => Tag::select(['id', 'name'])
                ->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateVideoRequest $request
     * @param int $id
     * @param TagRepository $tagRepository
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateVideoRequest $request, $id, TagRepository $tagRepository)
    {
        $video = Video::findOrFail($id);
        $data = $request->all();
        $data['thumbnail'] = "";
        $data['is_active'] = $request['is_active'] == "true"?true:false;
        $data['is_paid'] = $request['is_paid'] == 'true'?true:false;
        $data['difficulty_level_id'] = (int)$request['difficulty_level_id'];
        $data['duration'] = (int)$request['duration'];
        $data['skill_id'] = (int)$request['skill_id'];
        $data['topic_id'] = $request['topic_id']?(int)$request['topic_id']:null;
        $video->update($data);
        
        // Check if tags exists, otherwise create
        if($request['topic_id']){
            $tagRepository->createIfNotExists($request->tags);
            $tagData = Tag::whereIn('name', $request->tags)->pluck('id');
            $video->tags()->sync($tagData);
        }

        return [
            'success' => true,
            'messages' => 'Video updated successfully!',
        ];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        try {
            $video = Video::find($id);
            $video->subCategories()->detach();
            $video->tags()->detach();
            $video->secureDelete();
        }
        catch (\Illuminate\Database\QueryException $e){
            return [
                'success' => false,
                'message' => 'Unable to Delete Video . Remove all associations and Try again!',
            ];
        }
        return [
            'success' => true,
            'message' => 'Video was successfully deleted!',
        ];
    }
}
