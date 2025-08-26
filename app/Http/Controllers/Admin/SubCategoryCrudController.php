<?php
/**
 * File name: SubCategoryCrudController.php
 * Last modified: 19/07/21, 12:55 AM
 * Author: NearCraft - https://codecanyon.net/user/nearcraft
 * Copyright (c) 2021
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Filters\SubCategoryFilters;
use App\Http\Requests\Admin\StoreSubCategoryRequest;
use App\Http\Requests\Admin\UpdateSubCategoryRequest;
use App\Models\Category;
use App\Models\Section;
use App\Models\SubCategory;
use App\Models\SubCategoryType;
use App\Transformers\Admin\SubCategorySearchTransformer;
use App\Transformers\Admin\SubCategoryTransformer;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SubCategoryCrudController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:admin'])->except('search');
    }

    /**
     * List all subcategories
     *
     * @param SubCategoryFilters $filters
     * @return \Inertia\Response
     */
    public function index(SubCategoryFilters $filters)
    {
        return view('Admin/SubCategories', [
            'categories' => Category::select(['name', 'id'])->get(),
            'types' => SubCategoryType::select(['name', 'id'])->get(),
            'subCategories' => function () use($filters) {
                return fractal(SubCategory::filter($filters)->with('category:id,name')
                    ->with('subCategoryType:id,name')
                    ->paginate(request()->perPage != null ? request()->perPage : 10),
                    new SubCategoryTransformer())->toArray();
            },
        ]);
    }

    /**
     * Search subcategories api endpoint
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function search(Request $request)
    {
        $query = $request->get('query');
        return response()->json([
            'subCategories' => fractal(SubCategory::select(['id', 'name', 'category_id'])
                ->with('category:id,name')
                ->where('name', 'like', '%'.$query.'%')
                ->orWhere('code', 'like', '%'.$query.'%')
                ->limit(20)
                ->get(), new SubCategorySearchTransformer())
                ->toArray()['data']
        ]);
    }

    /**
     * Store a section
     *
     * @param StoreSubCategoryRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreSubCategoryRequest $request)
    {
        $data = $request->all();
        $data['is_active'] = $request['is_active']=='true'?true:false;
        $data['category_id'] = (int)$request['category_id'];
        $data['sub_category_type_id'] = (int)$request['sub_category_type_id'];
        SubCategory::create($data);
        return [
            'success' => true,
            'message' =>  'Sub Category was successfully added!'
        ];
    }

    /**
     * Show a section
     *
     * @param $id
     * @return array
     */
    public function show($id)
    {
        $subCategory = SubCategory::find($id);
        return fractal($subCategory, new SubCategoryTransformer())->toArray();
    }

    /**
     * Edit a section
     *
     * @param $id
     * @return SubCategory|SubCategory[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null
     */
    public function edit($id)
    {
        return view('Admin/SubCategory/Update', [
            'categories' => Category::select(['name', 'id'])->get(),
            'types' => SubCategoryType::select(['name', 'id'])->get(),
            'subCategory' => SubCategory::find($id)
        ]);
    }

    /**
     * Update a section
     *
     * @param UpdateSubCategoryRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateSubCategoryRequest $request, $id)
    {
        $data = $request->all();
        $subCategory = SubCategory::find($id);
        $data['is_active'] = $request['is_active']=='true'?true:false;
        $data['category_id'] = (int)$request['category_id'];
        $data['sub_category_type_id'] = (int)$request['sub_category_type_id'];
        $subCategory->update($data);
        return [
            'success' => true,
            'message' =>  'Sub Category was successfully updated!'
        ];
    }

    /**
     * Fetch sections api endpoint for mapping
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function fetchSections($id)
    {
        $subCategory = SubCategory::findOrFail($id);
        return view('Admin/SubCategory/MapSections', [
            'sections' => Section::active()->get(['id', 'name']),
            'selected_sections' => $subCategory->sections()->pluck('id', 'name'),
            'selected_sectionsIds' => $subCategory->sections()->pluck('id'),
            'subCategory' => $subCategory->only(['id']),
        ]);
    }

    /**
     * Update subcategory sections
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateSections(Request $request, $id)
    {
        $data = $request->all();
        if(isset($data['selected_sections']['selected_sections'])){
            $count_items = count($data['selected_sections']['selected_sections']);
            for($i = 0; $i<$count_items; $i++)
            {
                $data['selected_sections']['selected_sections'][$i] = (int)$data['selected_sections']['selected_sections'][$i];
            }
        } else {
            $data['selected_sections']['selected_sections'] = array();
        }
        $subCategory = SubCategory::findOrFail($id);
        $subCategory->sections()->sync($data['selected_sections']['selected_sections']);
        return [
            'success' => true,
            'message' => 'Sections successfully updated!',
            'selectedSubCategory' => $data['selected_sections']['selected_sections']
        ];
    }

    /**
     * Delete a section
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        try {
            $subCategory = SubCategory::find($id);

            if(!$subCategory->canSecureDelete('practiceSets', 'quizzes')) {
                return [
                    'success' => false,
                    'message' => 'Unable to Delete Sub Category . Remove all associations and Try again!'
                ];
            }

            $subCategory->sections()->detach();

            $subCategory->secureDelete('practiceSets', 'quizzes');
        }
        catch (\Illuminate\Database\QueryException $e){
            return [
                'success' => false,
                'message' => 'Unable to Delete Sub Category . Remove all associations and Try again!'
            ];
        }
        return [
            'success' => true,
            'message' => 'Sub Category was successfully deleted!'
        ];
    }
}
