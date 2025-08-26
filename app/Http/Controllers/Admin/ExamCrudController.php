<?php

namespace App\Http\Controllers\Admin;

use App\Filters\ExamFilters;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreExamRequest;
use App\Http\Requests\Admin\UpdateExamRequest;
use App\Http\Requests\Admin\UpdateExamSettingsRequest;
use App\Models\Exam;
use App\Models\ExamType;
use App\Models\SubCategory;
use App\Repositories\ExamRepository;
use App\Transformers\Admin\ExamSearchTransformer;
use App\Transformers\Admin\ExamTransformer;
use App\Transformers\Admin\SubCategorySearchTransformer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class ExamCrudController extends Controller
{
    private ExamRepository $repository;

    public function __construct(ExamRepository $repository)
    {
        $this->middleware(['role:admin|instructor'])->except('search');
        $this->repository = $repository;
    }

    /**
     * List all exams
     *
     * @param ExamFilters $filters
     * @return \Inertia\Response
     */
    public function index(ExamFilters $filters)
    {
        return view('Admin/Exams', [
            'examTypes' => ExamType::select(['id as value', 'name as text'])->active()->get(),
            'exams' => function () use($filters) {
                return fractal(Exam::filter($filters)->with(['subCategory:id,name', 'examType:id,name'])
                    ->withCount(['examSections'])
                    ->orderBy('id', 'desc')
                    ->paginate(request()->perPage != null ? request()->perPage : 10),
                    new ExamTransformer())->toArray();
            }
        ]);
    }

    /**
     * Search exams api endpoint
     *
     * @param Request $request
     * @param ExamFilters $filtersre
     * @return \Illuminate\Http\JsonResponse
     */
    public function search(Request $request, ExamFilters $filters)
    {
        $query = $request->get('query');
        return response()->json([
            'exams' => fractal(Exam::select(['id', 'title'])->filter($filters)
                ->where('title', 'like', '%'.$query.'%')->published()->limit(20)
                ->get(), new ExamSearchTransformer())
                ->toArray()['data']
        ]);
    }

    /**
     * Create an exam
     *
     * @return \Inertia\Response
     */
    public function create()
    {
        return view('Admin/Exam/Details', [
            'steps' => $this->repository->getSteps(),
            'examTypes' => ExamType::select(['id', 'name'])->get(),
            'initialSubCategories' => fractal(SubCategory::select(['id', 'name', 'category_id'])->latest()->take(10)->get(),
                new SubCategorySearchTransformer())->toArray()['data']
        ]);
    }

    /**
     * Store an exam
     *
     * @param StoreExamRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreExamRequest $request)
    {
        $data = $request->all();
        $data['description'] = "";
        $data['can_redeem'] = $data['can_redeem'] === 'true'? true: false;
        $data['is_active'] = $data['is_active'] === 'true'? true: false;
        $data['is_paid'] = $data['is_paid'] === 'true'? true: false;
        $data['is_private'] = $data['is_private'] === 'true'? true: false;
        $data['price'] = 0;
        settype($data['exam_type_id'], 'integer');
        settype($data['sub_category_id'], 'integer');
        if($data['points_required'] != null){
            settype($data['points_required'], 'integer');
        }
        $exam = Exam::create($data);
        return ['exam' => $exam->id];
    }

    /**
     * Show an exam
     *
     * @param $id
     * @return array
     */
    public function show($id)
    {
        $exam = Exam::find($id);
        return fractal($exam, new ExamTransformer())->toArray();
    }

    /**
     * Edit an exam
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Inertia\Response
     */
    public function edit($id)
    {
        $exam = Exam::findOrFail($id);
        // dd(fractal(SubCategory::select(['id', 'name', 'category_id'])
        // ->with('category:id,name')
        // ->where('id', $exam->sub_category_id)
        // ->get(),new SubCategorySearchTransformer())
        // ->toArray()['data']);
        // dd($this->repository->getSteps($exam->id, 'details'));
        return view('Admin/Exam/Details', [
            'steps' => $this->repository->getSteps($exam->id, 'details'),
            'editFlag' => true,
            'exam' => $exam,
            'examId' => $exam->id,
            'examTypes' => ExamType::select(['id', 'name'])->get(),
            'initialSubCategories' => fractal(SubCategory::select(['id', 'name', 'category_id'])
                ->with('category:id,name')
                ->where('id', $exam->sub_category_id)
                ->get(), new SubCategorySearchTransformer())
                ->toArray()['data'],
        ]);
    }

    /**
     * Update an exam
     *
     * @param UpdateExamRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateExamRequest $request, $id)
    {

        $exam = Exam::find($id);
        $data = $request->all();
        $data['description'] = "";
        $data['can_redeem'] = $data['can_redeem'] === 'true'? true: false;
        $data['is_active'] = $data['is_active'] === 'true'? true: false;
        $data['is_paid'] = $data['is_paid'] === 'true'? true: false;
        $data['is_private'] = $data['is_private'] === 'true'? true: false;
        $data['price'] = 0;
        settype($data['exam_type_id'], 'integer');
        settype($data['sub_category_id'], 'integer');
        if($data['points_required'] != null){
            settype($data['points_required'], 'integer');
        }
        $exam->update($data);
        return ['exam' => $exam->id];
    }

    /**
     * Exam settings page
     *
     * @param $id
     * @return \Inertia\Response
     */
    public function settings($id)
    {
        $exam = Exam::findOrFail($id);
        // dd($exam->settings);
        return view('Admin/Exam/Settings', [
            'exam' => $exam,
            'steps' => $this->repository->getSteps($exam->id, 'settings'),
            'editFlag' => true,
            'settings' => [
                'auto_duration' => $exam->settings->get('auto_duration', true),
                'auto_grading' => $exam->settings->get('auto_grading', true),
                'cutoff' => $exam->settings->get('cutoff', 60),
                'enable_section_cutoff' => $exam->settings->get('enable_section_cutoff', false),
                'enable_negative_marking' => $exam->settings->get('enable_negative_marking', false),
                'restrict_attempts' =>  $exam->settings->get('restrict_attempts', false),
                'no_of_attempts' => $exam->settings->get('no_of_attempts', null),
                'disable_section_navigation' => $exam->settings->get('disable_section_navigation', false),
                'disable_question_navigation' => $exam->settings->get('disable_question_navigation', false),
                'disable_finish_button' => $exam->settings->get('disable_finish_button', false),
                'hide_solutions' => $exam->settings->get('hide_solutions', false),
                'list_questions' => $exam->settings->get('list_questions', true),
                'shuffle_questions' => $exam->settings->get('shuffle_questions', false),
            ],
        ]);
    }

    /**
     * Update exam settings
     *
     * @param UpdateExamSettingsRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateSettings(UpdateExamSettingsRequest $request, $id)
    {
        $exam = Exam::with('examSections')->find($id);
        $exam->settings = $request->validated();
        $exam->settings['restrict_attempts'] = $exam->settings['restrict_attempts'] === 'true'? true: false;
        $exam->settings['disable_question_navigation'] = $exam->settings['disable_question_navigation'] === 'true'? true: false;
        $exam->settings['list_questions'] = $exam->settings['list_questions'] === 'true'? true: false;
        $exam->settings['auto_duration'] = $exam->settings['auto_duration'] === 'true'? true: false;
        $exam->settings['auto_grading'] = $exam->settings['auto_grading'] === 'true'? true: false;
        $exam->settings['enable_negative_marking'] = $exam->settings['enable_negative_marking'] === 'true'? true: false;
        $exam->settings['disable_finish_button'] = $exam->settings['disable_finish_button'] === 'true'? true: false;
        $exam->settings['hide_solutions'] = $exam->settings['hide_solutions'] === 'true'? true: false;
        $exam->settings['shuffle_questions'] = $exam->settings['shuffle_questions'] === 'true'? true: false;
        $exam->settings['disable_section_navigation'] = $exam->settings['disable_section_navigation'] === 'true'? true: false;
        $exam->settings['enable_section_cutoff'] = $exam->settings['enable_section_cutoff'] === 'true'? true: false;
        if($exam->settings['no_of_attempts'] != null){$exam->settings['no_of_attempts'] = (int)$exam->settings['no_of_attempts'];}
        if($exam->settings['total_duration'] != null){$exam->settings['total_duration'] = (int)$exam->settings['total_duration'];}
        if($exam->settings['correct_marks'] != null){$exam->settings['correct_marks'] = (int)$exam->settings['correct_marks'];}
        if($exam->settings['cutoff'] != null){$exam->settings['cutoff'] = (int)$exam->settings['cutoff'];}
        if($exam->settings['negative_marks'] != null){$exam->settings['negative_marks'] = (int)$exam->settings['negative_marks'];}
        $exam->update();
        foreach ($exam->examSections as $examSection) {
            $examSection->updateMeta();
        }
        $exam->updateMeta();
        return ['exam' => $exam->id];
    }

    /**
     * Delete an exam
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        try {
            $exam = Exam::with('examSchedules')->find($id);
            if(!$exam->canSecureDelete('examSchedules', 'sessions')) {
                return [
                    'success' => false,
                    'message' => 'Unable to Delete Exam. Exam schedules or sessions exist.'
                ];
            }
            DB::transaction(function () use ($exam) {
                foreach ($exam->examSections as $examSection) {
                    $examSection->questions()->detach();
                    $examSection->secureDelete();
                }
                $exam->secureDelete('sessions', 'examSchedules');
            });
        }
        catch (\Illuminate\Database\QueryException $e){
            return[
                'success' => false,
                'message' => 'Unable to Delete Exam. Remove all associations and Try again!'
            ];
        }
        return [
            'success' => true,
            'message' => 'Exam was successfully deleted!'
        ];
    }
}
