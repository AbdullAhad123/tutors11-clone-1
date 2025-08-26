<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Filters\MockTypeFilters;
use App\Http\Requests\Admin\StoreMockTypeRequest;
use App\Http\Requests\Admin\UpdateMockTypeRequest;
use App\Models\MockTypes;
use App\Transformers\Admin\MockTypeTransformer;
use Inertia\Inertia;

class MockTypeCrudController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:admin|instructor'])->except('search');
    }

    /**
     * List all Exam Types
     *
     * @param MockTypeFilters $filters
     * @return \Inertia\Response
     */
    public function index(MockTypeFilters $filters)
    {
        return Inertia::render('Admin/MockTypes', [
            'mockTypes' => function () use($filters) {
                return fractal(MockTypes::filter($filters)
                    ->paginate(request()->perPage != null ? request()->perPage : 10),
                    new MockTypeTransformer())->toArray();
            },
        ]);
    }

    /**
     * Store a mockType
     *
     * @param StoreMockTypeRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreMockTypeRequest $request)
    {
        // dd($request->validated());
        MockTypes::create($request->validated());
        return redirect()->back()->with('successMessage', 'Mock Type was successfully added!');
    }

    /**
     * Show a mockType
     *
     * @param $id
     * @return array
     */
    public function show($id)
    {
        return fractal(MockTypes::find($id), new MockTypeTransformer())->toArray();
    }

    /**
     * Edit a mockType
     *
     * @param $id
     * @return MockTypes|MockTypes[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null
     */
    public function edit($id)
    {
        return MockTypes::find($id);
    }

    /**
     * Update a mockType
     *
     * @param UpdateMockTypeRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateMockTypeRequest $request, $id)
    {
        $mockType = MockTypes::find($id);
        // dd($mockType);
        $mockType->update($request->validated());
        return redirect()->back()->with('successMessage', 'Mock Type was successfully updated!');
    }
    /**
     * Delete a mockType
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        try {
            $mockType = MockTypes::find($id);
            // var_dump($mockType->canSecureDelete('mock'));
            // dd('mock');
            if(!$mockType->canSecureDelete('mock')) {
                return redirect()->back()->with('errorMessage', 'Unable to Delete Mock Type . Remove all associations and Try again!');
            }
            $mockType->secureDelete('mock');
        }
        catch (\Illuminate\Database\QueryException $e){
            dd($e);
            return redirect()->back()->with('errorMessage', 'Unable to Delete Mock Type . Remove all associations and Try again! dobule');
        }
        return redirect()->back()->with('successMessage', 'Mock Type was successfully deleted!');
    }

}
