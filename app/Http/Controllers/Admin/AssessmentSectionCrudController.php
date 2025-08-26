<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreAssessmentSectionRequest;
use App\Http\Requests\Admin\UpdateAssessmentSectionRequest;
use App\Models\AssessmentTest;
use App\Models\AssessmentTestSections;
use App\Repositories\AssessmentRepository;
use App\Transformers\Admin\AssessmentSectionTransformer;
use App\Transformers\Admin\ExamSectionTransformer;
use Inertia\Inertia;

class AssessmentSectionCrudController extends Controller
{
    private AssessmentRepository $repository;

    public function __construct(AssessmentRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * List all assessment sections
     *
     * @param $assessment
     * @return \Inertia\Response
     */
    public function index(AssessmentTest $assessment)
    {
        // dd($assessment);
        if($assessment["settings"] == null) {
            return redirect()->back()->with('errorMessage', 'Please Update Settings to the assessment.');
        }
        $assessment = $assessment->id;
        $test = AssessmentTest::select(['id', 'title', 'settings'])->with(['assessmentSections' => function($query) {
            $query->with('section:id,name')->orderBy('section_order');
        }])->findOrFail($assessment);


        return Inertia::render('Admin/Assessment/Sections', [
            'editFlag' => true,
            'assessment' => $test->only(['id', 'title', 'settings']),
            'steps' => $this->repository->getSteps($assessment, 'sections'),
            'sections' => function () use ($test) {
                return fractal($test->assessmentSections, new AssessmentSectionTransformer())->toArray()['data'];
            },
        ]);
    }

    /**
     * Store an assessment section
     *
     * @param StoreAssessmentSectionRequest $request
     * @param $assessment
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreAssessmentSectionRequest $request, AssessmentTest $assessment)
    {
        // dd($assessment);
        $assessmentSection = new AssessmentTestSections();
        $assessmentSection->assessment_test_id = $assessment->id;
        $assessmentSection->name = $request->name;
        $assessmentSection->section_id = $request->section_id;
        $assessmentSection->correct_marks = $request->correct_marks;
        $assessmentSection->negative_marking_type = $request->negative_marking_type;
        $assessmentSection->negative_marks = $request->negative_marks;
        $assessmentSection->section_cutoff = $request->section_cutoff;
        $assessmentSection->section_order = $request->section_order;

        if($assessment->settings->get('auto_grading', true)) {
            $assessmentSection->total_marks = $assessmentSection->questions()->sum('default_marks');
        } else {
            $assessmentSection->total_marks = $assessmentSection->questions()->count() * $request->correct_marks;
        }
        $assessmentSection->save();

        $assessment->updateMeta($assessment);

        return redirect()->back()
            ->with('successMessage', 'Aseessment Section was successfully added!');
    }

    /**
     * Edit a section
     *
     * @param $assessment
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit($assessment, $id)
    {
        $section = AssessmentTestSections::with(['section:id,name'])->findOrFail($id);
        return response()->json($section, 200);
    }

    /**
     * Update a section
     *
     * @param UpdateAssessmentSectionRequest $request
     * @param AssessmentTest $assessment
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateAssessmentSectionRequest $request, AssessmentTest $assessment, $id)
    {
        $assessmentSection = AssessmentTestSections::findOrFail($id);
        $assessmentSection->name = $request->name;
        $assessmentSection->section_id = $request->section_id;
        $assessmentSection->correct_marks = $request->correct_marks;
        $assessmentSection->negative_marking_type = $request->negative_marking_type;
        $assessmentSection->negative_marks = $request->negative_marks;
        $assessmentSection->section_cutoff = $request->section_cutoff;
        $assessmentSection->section_order = $request->section_order;

        if($assessment->settings->get('auto_grading', true)) {
            $assessmentSection->total_marks = $assessmentSection->questions()->sum('default_marks');
        } else {
            $assessmentSection->total_marks = $assessmentSection->questions()->count() * $request->correct_marks;
        }
        $assessmentSection->update();

        $assessmentSection->updateMeta();
        $assessment->updateMeta();

        return redirect()->back()
            ->with('successMessage', 'Assessment Section was successfully updated!');
    }

    /**
     * Delete a section
     *
     * @param AssessmentTest $assessment
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(AssessmentTest $assessment, $id)
    {
        try {
            $assessmentSection = AssessmentTestSections::find($id);
            if(!$assessmentSection->canSecureDelete('assessmentSessions')) {
                return redirect()->back()->with('errorMessage', 'Unable to delete assessment section. Assessment sessions exist and deleting section will disrupt analytics!');
            }
            $assessmentSection->questions()->detach();
            $assessmentSection->secureDelete('assessmentSessions');

            $assessment->updateMeta($assessment);
        }
        catch (\Illuminate\Database\QueryException $e){
            // dd($e);
            return redirect()->route('assessments.sections.index', ['assessment' => $assessment])
                ->with('errorMessage', 'Unable to Delete Section . Remove all associations and Try again!');
        }
        return redirect()->route('assessments.sections.index', ['assessment' => $assessment])
            ->with('successMessage', 'Section was successfully deleted!');
    }
}
