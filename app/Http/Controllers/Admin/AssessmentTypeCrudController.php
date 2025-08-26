<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Filters\AssessmentTypeFilters;
use App\Http\Requests\Admin\StoreAssessmentTypeRequest;
use App\Http\Requests\Admin\UpdateAssessmentTypeRequest;
use App\Models\AssessmentTestType;
use App\Transformers\Admin\AssessmentTypeTransformer;
use Inertia\Inertia;

class AssessmentTypeCrudController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:admin|instructor'])->except('search');
    }

    /**
     * List all Assessment Types
     *
     * @param AssessmentTypeFilters $filters
     * @return \Inertia\Response
     */
    public function index(AssessmentTypeFilters $filters)
    {
        return Inertia::render('Admin/AssessmentTypes', [
            'assessmentTypes' => function () use($filters) {
                return fractal(AssessmentTestType::filter($filters)
                    ->paginate(request()->perPage != null ? request()->perPage : 10),
                    new AssessmentTypeTransformer())->toArray();
            },
        ]);
    }

    /**
     * Store a AssessmentTestType
     *
     * @param StoreAssessmentTypeRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreAssessmentTypeRequest $request)
    {
        AssessmentTestType::create($request->validated());
        return redirect()->back()->with('successMessage', 'Assessment Type was successfully added!');
    }

    /**
     * Show a AssessmentTestType
     *
     * @param $id
     * @return array
     */
    public function show($id)
    {
        return fractal(AssessmentTestType::find($id), new AssessmentTypeTransformer())->toArray();
    }

    /**
     * Edit a AssessmentTestType
     *
     * @param $id
     * @return AssessmentTestType|AssessmentTestType[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null
     */
    public function edit($id)
    {
        return AssessmentTestType::find($id);
    }

    /**
     * Update a AssessmentTestType
     *
     * @param UpdateAssessmentTypeRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateAssessmentTypeRequest $request, $id)
    {
        $assessmentType = AssessmentTestType::find($id);
        $assessmentType->update($request->validated());
        return redirect()->back()->with('successMessage', 'Assessment Type was successfully updated!');
    }
    /**
     * Delete a AssessmentTestType
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        try {
            $assessmentType = AssessmentTestType::find($id);
            if(!$assessmentType->canSecureDelete('assessments')) {
                return redirect()->back()->with('errorMessage', 'Unable to Delete Assessment Type . Remove all associations and Try again!');
            }

            $assessmentType->secureDelete('assessments');
        }
        catch (\Illuminate\Database\QueryException $e){
            // dd($e);
            return redirect()->back()->with('errorMessage', 'Unable to Delete Assessment Type . Remove all associations and Try again!');
        }
        return redirect()->back()->with('successMessage', 'Assessment Type was successfully deleted!');
    }
}

