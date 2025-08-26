<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\School;
use App\Models\Region;
use App\Filters\SchoolFilters;
use App\Filters\SchoolRegionFilters;
use Illuminate\Http\Request;
use App\Transformers\Admin\SchoolTransformer;
use App\Transformers\Admin\SchoolRegionTransformer;
use Illuminate\Support\Str;
use Inertia\Inertia;

class RegionCrudController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:admin|instructor']);
    }

    /**
     * Display a listing of the resource.
     *
     * @param SchoolFilters $filters
     * @return \Inertia\Response
     */
    public function index(SchoolRegionFilters $filters)
    {
        return view('Admin/School/Regions/Index', [
            'regions' => function () use($filters) {
                return fractal(Region::filter($filters)
                    ->paginate(request()->perPage != null ? request()->perPage : 10),
                    new SchoolRegionTransformer())->toArray();
            }
        ]);
    }
    public function create()
    {
        return view('Admin/School/Regions/Create');
    }
    public function store(Request $request)
    {
        $existingCount = Region::where('slug', $request->slug)->count();
        if ($existingCount > 0) {
            return redirect()->back()->with('errorMessage', 'Slug already exists');
        } else {
            $data = [
                'name' => $request->name,
                'slug' => $request->slug,
                'description' => $request->description,
            ];
            Region::create($data);
            return redirect()->route('regions_index')->with('success','true')->with('message','Region created successfully!');
        }
    }
    public function edit($id)
    {
        $region = Region::findOrFail($id);
        return view('Admin/School/Regions/Update', [
            'region' => $region,
        ]);
    }

    public function update(Request $request, $id)
    {
        $region = Region::findOrFail($id);
        $data = $request->all();
        $existingCount = Region::where('slug', $request->slug)->count();
        if ($existingCount > 0 && $region->slug != $request->slug) {
            return redirect()->back()->with('errorMessage', 'Slug already exists');
        } else {
            $data['name'] = $request->name;
            $data['slug'] = $request->slug;
            $data['description'] = $request->description;
            $region->update($data);
            return redirect()->route('regions_index')->with('success','true')->with('message','Region updated successfully!');
        }
    }

    public function delete($id)
    {
        try {
            $region = Region::find($id);
            $region->delete();
        }
        catch (\Illuminate\Database\QueryException $e){
            return [
                'success' => false,
                'message' => 'Something went wrong!',
            ];
        }
        return [
            'success' => true,
            'message' => 'Region was successfully deleted!',
        ];
    }
}
