<?php

namespace App\Http\Controllers\Admin;

use App\Filters\AssessmentFilters;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreAssessmentRequest;
use App\Http\Requests\Admin\StoreExamRequest;
use App\Http\Requests\Admin\UpdateAssessmentRequest;
use App\Http\Requests\Admin\UpdateAssessmentSettingsRequest;
use App\Models\AssessmentTest;
use App\Models\AssessmentTestSections;
use App\Models\Section;
use App\Models\SubCategory;
use App\Models\SubCategorySections;
use App\Repositories\AssessmentRepository;
use App\Transformers\Admin\AssessmentSearchTransformer;
use App\Transformers\Admin\AssessmentTransformer;
use App\Transformers\Admin\SubCategorySearchTransformer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class AssessmentCrudController extends Controller
{
    private AssessmentRepository $repository;

    public function __construct(AssessmentRepository $repository)
    {
        $this->middleware(['role:admin|instructor'])->except('search');
        $this->repository = $repository;
    }

    /**
     * List all assessments
     *
     * @param AssessmentFilters $filters
     * @return \Inertia\Response
     */
    public function index(AssessmentFilters $filters)
    {
        // dd(AssessmentTest::filter($filters)->with(['subCategory:id,name' , 'section:id,name'])->get());
        return Inertia::render('Admin/Assessments', [
            'assessment' => function () use($filters) {
                return fractal(AssessmentTest::filter($filters)->with(['subCategory:id,name' , 'section:id,name'])
                    ->withCount(['assessmentSections'])
                    ->orderBy('id', 'desc')
                    ->paginate(request()->perPage != null ? request()->perPage : 10),
                    new AssessmentTransformer())->toArray();
            }
        ]);
    }

    /**
     * Search assessments api endpoint
     *
     * @param Request $request
     * @param AssessmentFilters $filtersre
     * @return \Illuminate\Http\JsonResponse
     */
    public function search(Request $request, AssessmentFilters $filters)
    {
        $query = $request->get('query');
        return response()->json([
            'assessment' => fractal(AssessmentTest::select(['id', 'title'])->filter($filters)
                ->where('title', 'like', '%'.$query.'%')->published()->limit(20)
                ->get(), new AssessmentSearchTransformer())
                ->toArray()['data']
        ]);
    }

    /**
     * Create an assessment
     *
     * @return \Inertia\Response
     */
    public function create()
    {
        return Inertia::render('Admin/Assessment/Details', [
            'steps' => $this->repository->getSteps(),
            'initialSubCategories' => fractal(SubCategory::select(['id', 'name', 'category_id'])->latest()->take(10)->get(),
                new SubCategorySearchTransformer())->toArray()['data']
        ]);

    }

    /**
     * Store an assessment
     *
     * @param StoreAssessmentRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreAssessmentRequest $request)
    {
        // dd($request->validated());
        // // dd(AssessmentTest::create($request->validated()));
        // $assessment = AssessmentTest::create($request->validated());
        // return redirect()->route('assessments.settings', ['' => $assessment->id])
        //     ->with('successMessage', 'Assessment was successfully added!');


        $assessment = new AssessmentTest;
        $assessment->title = $request->title;
        $assessment->description = $request->description;
        $assessment->sub_category_id = $request->sub_category_id;
        $assessment->total_duration = $request->total_duration;
        $assessment->total_marks = $request->total_marks;
        $assessment->section_id = $request->section_id;
        // dd($assessment);
        $assessment->save();
        return redirect()->route('assessments.settings', ['assessment' => $assessment->id])
            ->with('successMessage', 'Assessment was successfully added!');
    }

    /**
     * Show an assessment
     *
     * @param $id
     * @return array
     */
    public function show($id)
    {
        $assessment = AssessmentTest::find($id);
        return fractal($assessment, new AssessmentTransformer())->toArray();
    }
    function fetchSection(Request $req)
    {
        $sections = [];
        $sectionFrom  = SubCategorySections::with("section")->where("sub_category_id",$req->sub_id)->get();
        foreach ($sectionFrom as $key => $value) {
            if (count(AssessmentTest::where("section_id",$value->section->id)->get()) > 0) {continue;}
            array_push($sections,[
                "id"=>$value->section->id,
                "name"=>$value->section->name,
            ]);
        }
        return $sections;
    }
    /**
     * Edit an assessment
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Inertia\Response
     */
    public function edit($id)
    {
        $assessment = AssessmentTest::findOrFail($id);
        // dd(fractal(SubCategory::select(['id', 'name', 'category_id'])
        // ->with('category:id,name')
        // ->where('id', $assessment->sub_category_id)
        // ->get(),new SubCategorySearchTransformer())
        // ->toArray()['data']);
        // dd($this->repository->getSteps($assessment->id, 'details'));
        return Inertia::render('Admin/Assessment/Details', [
            'steps' => $this->repository->getSteps($assessment->id, 'details'),
            'editFlag' => true,
            'assessment' => $assessment,
            'assessmentId' => $assessment->id,
            'assessmentTypes' => AssessmentTestSections::select(['id', 'name'])->get(),
            'initialSubCategories' => fractal(SubCategory::select(['id', 'name', 'category_id'])
                ->with('category:id,name')
                ->where('id', $assessment->sub_category_id)
                ->get(), new SubCategorySearchTransformer())
                ->toArray()['data'],
        ]);
    }

    /**
     * Update an assessment
     *
     * @param UpdateAssessmentRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateAssessmentRequest $request, $id)
    {
        // dd('sadsadasd');
        // $assessment = AssessmentTest::find($id);
        // dd($assessment);
        // $assessment->update($request->validated());

        $assessment = AssessmentTest::find($id);;
        $assessment->title = $request->title;
        $assessment->description = $request->description;
        $assessment->sub_category_id = $request->sub_category_id;
        $assessment->total_duration = $request->total_duration;
        $assessment->total_marks = $request->total_marks;
        $assessment->section_id = $request->section_id;
        $assessment->update();
        // return redirect()->route('assessments.settings', ['assessment' => $assessment->id])
        //     ->with('successMessage', 'Assessment was successfully added!');

        return redirect()->route('assessments.settings', ['assessment' => $assessment->id])->with('successMessage', 'Assessment was successfully updated!');
    }

    /**
     * Exam settings page
     *
     * @param $id
     * @return \Inertia\Response
     */
    public function settings($id)
    {
        $assessment = AssessmentTest::findOrFail($id);
        // dd($assessment);
        return Inertia::render('Admin/Assessment/Settings', [
            'assessment' => $assessment,
            'steps' => $this->repository->getSteps($assessment->id, 'settings'),
            'editFlag' => true,
            'settings' => [
                'auto_duration' => $assessment->settings->get('auto_duration', true),
                'auto_grading' => $assessment->settings->get('auto_grading', true),
                'cutoff' => $assessment->settings->get('cutoff', 60),
                'enable_section_cutoff' => $assessment->settings->get('enable_section_cutoff', false),
                'enable_negative_marking' => $assessment->settings->get('enable_negative_marking', false),
                'restrict_attempts' =>  $assessment->settings->get('restrict_attempts', false),
                'no_of_attempts' => $assessment->settings->get('no_of_attempts', null),
                'disable_section_navigation' => $assessment->settings->get('disable_section_navigation', false),
                'disable_question_navigation' => $assessment->settings->get('disable_question_navigation', false),
                'disable_finish_button' => $assessment->settings->get('disable_finish_button', false),
                'hide_solutions' => $assessment->settings->get('hide_solutions', false),
                'list_questions' => $assessment->settings->get('list_questions', true),
                'shuffle_questions' => $assessment->settings->get('shuffle_questions', false),
            ],
        ]);
    }

    /**
     * Update assessment settings
     *
     * @param UpdateAssessmentSettingsRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateSettings(UpdateAssessmentSettingsRequest $request, $id)
    {
        // dd($request->validated());
        $assessment = AssessmentTest::with('assessmentSections')->find($id);
        $assessment->settings = $request->all();
        $assessment->update();

        foreach ($assessment->assessmentSections as $assessmentSection) {
            $assessmentSection->updateMeta($assessment);
        }

        // $assessment->updateMeta();
        $assessment->updateMeta($assessment);

        return redirect()->route('assessments.sections.index', ['assessment' => $assessment->id])->with('successMessage', 'Assesssment Settings Successfully Updated.');
    }

    /**
     * Delete an assessment
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        try {
            $assessment = AssessmentTest::find($id);
            if(!$assessment->canSecureDelete('sessions')) {
                return redirect()->route('assessments.index')
                ->with('errorMessage', 'Unable to Delete assessment . assessment schedules or sessions exist.');
            }
            // dd("AS");

            DB::transaction(function () use ($assessment) {
                foreach ($assessment->assessmentSections as $assessmentSection) {
                    $assessmentSection->questions()->detach();
                    $assessmentSection->secureDelete();
                }
                $assessment->secureDelete('sessions');
            });
        }
        catch (\Illuminate\Database\QueryException $e){
            return redirect()->route('assessments.index')
                ->with('errorMessage', 'Unable to Delete assessment . Remove all associations and Try again!');
        }
        return redirect()->route('assessments.index')
            ->with('successMessage', 'assessment was successfully deleted!');
    }

}
