<?php
/**
 * File name: CategoryCrudController.php
 * Last modified: 19/07/21, 12:55 AM
 * Author: NearCraft - https://codecanyon.net/user/nearcraft
 * Copyright (c) 2021
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Filters\CategoryFilters;
use App\Http\Requests\Admin\StoreCategoryRequest;
use App\Http\Requests\Admin\UpdateCategoryRequest;
use App\Models\Category;
use App\Transformers\Admin\CategoryTransformer;
use Inertia\Inertia;

class CategoryCrudController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:admin']);
    }

    /**
     * List all categories
     *
     * @param CategoryFilters $filters
     * @return \Inertia\Response
     */
    public function index(CategoryFilters $filters)
    {
        return view('Admin/Categories', [
            'categories' => function () use ($filters) {
                return fractal(Category::filter($filters)
                    ->paginate(request()->perPage != null ? request()->perPage : 10),
                    new CategoryTransformer())->toArray();
            },
        ]);
    }

    /**
     * Store a category
     *
     * @param StoreCategoryRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreCategoryRequest $request)
    {
        $data = $request->all();
        $data['is_active'] = $request['is_active']=='true'?true:false;
        Category::create($data);
        return [
            'success' => true,
            'message' => 'Category was successfully added!'
        ];
    }

    /**
     * Show a category
     *
     * @param $id
     * @return array
     */
    public function show($id)
    {
        return fractal(Category::findOrFail($id), new CategoryTransformer())->toArray();
    }

    /**
     * Edit a category
     *
     * @param $id
     * @return Category|Category[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null
     */
    public function edit($id)
    {
        return view('Admin/Category/Update', [
            'category' => Category::find($id)
        ]);
    }

    /**
     * Update a category
     *
     * @param UpdateCategoryRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateCategoryRequest $request, $id)
    {
        $category = Category::find($id);
        $data = $request->all();
        $data['is_active'] = $request['is_active']=='true'?true:false;
        $category->update($data);
        return [
            'success' => true,
            'message' => 'Category was successfully updated!'
        ];
    }

    /**
     * Delete a category
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        try {
            $category = Category::find($id);

            if(!$category->canSecureDelete('subCategories')) {
                return [
                    'success' => false,
                    'message' => 'Unable to Delete Category . Remove all associations and Try again!'
                ];
            }

            $category->secureDelete('subCategories');

        } catch (\Illuminate\Database\QueryException $e) {
            return [
                'success' => false,
                'message' => 'Unable to Delete Category . Remove all associations and Try again!'
            ];
        }
        return [
            'success' => true,
            'message' => 'Category was successfully deleted!'
        ];
    }
}
