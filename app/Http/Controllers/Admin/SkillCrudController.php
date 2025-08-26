<?php
/**
 * File name: SkillCrudController.php
 * Last modified: 19/07/21, 12:55 AM
 * Author: NearCraft - https://codecanyon.net/user/nearcraft
 * Copyright (c) 2021
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Section;
use App\Models\Skill;
use App\Transformers\Admin\SkillSearchTransformer;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Filters\SkillFilters;
use App\Http\Requests\Admin\StoreSkillRequest;
use App\Http\Requests\Admin\UpdateSkillRequest;
use App\Transformers\Admin\SkillTransformer;

class SkillCrudController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:admin|instructor'])->except('search');
    }

    /**
     * List all skills
     *
     * @param SkillFilters $filters
     * @return \Inertia\Response
     */
    public function index(SkillFilters $filters)
    {
        return view('Admin/Skills', [
            'sections' => Section::select(['name', 'id'])->get(),
            'skills' => function () use($filters) {
                return fractal(Skill::filter($filters)->with('section:id,name')
                    ->orderBy('name')->paginate(request()->perPage != null ? request()->perPage : 10),
                    new SkillTransformer())->toArray();
            },
        ]);
    }

    /**
     * Search skills api endpoint
     *
     * @param Request $request
     * @param SkillFilters $filters
     * @return \Illuminate\Http\JsonResponse
     */
    public function search(Request $request, SkillFilters $filters)
    {
        $query = $request->get('query');
        return response()->json([
            'skills' => fractal(Skill::select(['id', 'name', 'section_id'])
                ->filter($filters)
                ->with('section:id,name')
                ->where('name', 'like', '%'.$query.'%')->limit(20)
                ->get(), new SkillSearchTransformer())
                ->toArray()['data']
        ]);
    }

    /**
     * Store a skill
     *
     * @param StoreSkillRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreSkillRequest $request)
    {
        $request['is_active'] = $request['is_active'] == 'true' ? true : false;
        $request['section_id'] = (int)$request['section_id'];
        Skill::create($request->all());
        return [
            'success' => true,
            'message' => 'Topic was successfully added!'
        ];
    }

    /**
     * Show a skill
     *
     * @param $id
     * @return array
     */
    public function show($id)
    {
        $skill = Skill::find($id);
        return fractal($skill, new SkillTransformer())->toArray();
    }

    /**
     * Edit a skill
     *
     * @param $id
     * @return Skill|Skill[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null
     */
    public function edit($id)
    {
        
        $skill = Skill::find($id);
        return view('Admin/Skills/Update', [
            'sections' => Section::select(['name', 'id'])->get(),
            'skill' => $skill
        ]);
    }

    /**
     * Update a skill
     *
     * @param UpdateSkillRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateSkillRequest $request, $id)
    {
        $request['is_active'] = $request['is_active'] == 'true' ? true : false;
        $request['section_id'] = (int)$request['section_id'];
        $skill = Skill::find($id);
        $skill->update($request->all());
        return [
            'success' => true,
            'message' => "Skill was successfully updated!"
        ];
    }

    /**
     * Delete a skill
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        try {
            $skill = Skill::find($id);
            $skill->deleted_by = auth()->user()->id;
            $skill->save();
            $skill->delete();
        }
        catch (\Illuminate\Database\QueryException $e) {
            return [
                'success' => false,
                'message' => 'Unable to delete topic . Remove all associations and Try again!'
            ];
        }
        return [
            'success' => true,
            'message' => 'Topic was successfully deleted!'
        ];
    }
}
