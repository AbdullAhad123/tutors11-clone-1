<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use App\Models\Category;
use App\Transformers\Platform\SubCategoryCardTransformer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Inertia\Inertia;

class SyllabusController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:guest|student|employee']);
    }
    public function changeSyllabus()
    {
        // return Inertia::render('User/ChangeSyllabus', [
        //     'categories' => fractal(SubCategory::active()->has('sections')
        //         ->with(['sections:id,name,code,slug', 'subCategoryType:id,name', 'category:id,name'])
        //         ->orderBy('name')->get(), new SubCategoryCardTransformer())
        //         ->toArray()['data']
        // ]);
        [
            'categories' => fractal(SubCategory::active()->has('sections')
                ->with(['sections:id,name,code,slug', 'subCategoryType:id,name', 'category:id,name'])
                ->orderBy('name')->get(), new SubCategoryCardTransformer())
                ->toArray()['data']
        ];
        return view('User/ChangeSyllabus', [
            'categories' => fractal(SubCategory::active()->has('sections')
                ->with(['sections:id,name,code,slug', 'subCategoryType:id,name', 'category:id,name'])
                ->orderBy('name')->get(), new SubCategoryCardTransformer())
                ->toArray()['data']
        ]);

    }

    // public function changeSyllabus(){
    //     // $category = DB::table('Category');
    //     // dd($category);


    // }

    public function updateSyllabus(Request $request)
    {
        // dd($request->category);
        $category = SubCategory::where('code', $request->category)->firstOrFail();
        session()->put('category_id', $category->id);
        session()->put('category_name', $category->name);

        redirect()->route('user_dashboard')->with('successMessage', 'Syllabus updated to '.$category->name);
    }
}
