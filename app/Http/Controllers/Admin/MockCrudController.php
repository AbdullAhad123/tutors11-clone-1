<?php

namespace App\Http\Controllers\Admin;

use App\Filters\MockFilters;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreMockRequest;
use App\Http\Requests\Admin\UpdateMockRequest;
use App\Http\Requests\Admin\UpdateMockSettingsRequest;
use App\Models\mocks;
use App\Models\MockTypes;
use App\Models\SubCategory;
use App\Repositories\MockRepository;
use App\Transformers\Admin\MockSearchTransformer;
use App\Transformers\Admin\MockTransformer;
use App\Transformers\Admin\SubCategorySearchTransformer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class MockCrudController extends Controller
{
    private MockRepository $repository;

    public function __construct(MockRepository $repository)
    {
        $this->middleware(['role:admin|instructor|parent'])->except('search');
        $this->repository = $repository;
    }

    /**
     * List all exams
     *
     * @param MockFilters $filters
     * @return \Inertia\Response
     */
    public function index(MockFilters $filters)
    {

        return Inertia::render('Admin/Mock', [
            'examTypes' => MockTypes::select(['id as value', 'name as text'])->active()->get(),
            'exams' => function () use($filters) {
                return fractal(Mocks::filter($filters)->with(['subCategory:id,name', 'mockType:id,name'])
                    ->withCount(['mockSections'])
                    ->orderBy('id', 'desc')
                    ->paginate(request()->perPage != null ? request()->perPage : 10),
                    new MockTransformer())->toArray();
            }
        ]);
    }

    /**
     * Search exams api endpoint
     *
     * @param Request $request
     * @param MockFilters $filters
     * @return \Illuminate\Http\JsonResponse
     */
    public function search(Request $request, MockFilters $filters)
    {
        $query = $request->get('query');
        return response()->json([
            'exams' => fractal(mocks::select(['id', 'title'])->filter($filters)
                ->where('title', 'like', '%'.$query.'%')->published()->limit(20)
                ->get(), new MockSearchTransformer())
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

        if (Auth::user()->hasRole("admin")) {
            return Inertia::render('Admin/Mock/Details', [
                'steps' => $this->repository->getSteps(),
                'mockTypes' => MockTypes::select(['id', 'name'])->get(),
                'initialSubCategories' => fractal(SubCategory::select(['id', 'name', 'category_id'])->latest()->take(10)->get(),
                    new SubCategorySearchTransformer())->toArray()['data']
            ]);
        } else if (Auth::user()->hasRole("parent")) {
            return Inertia::render('Parent/Mock/Details', [
                'steps' => $this->repository->getSteps(),
                'mockTypes' => MockTypes::select(['id', 'name'])->get(),
                'initialSubCategories' => fractal(SubCategory::select(['id', 'name', 'category_id'])->latest()->take(10)->get(),
                    new SubCategorySearchTransformer())->toArray()['data']
            ]);
        }

    }

    /**
     * Store an exam
     *
     * @param StoreMockRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreMockRequest $request)
    {
        // dd($mock = mocks::create($request->validated()));
        $mock = mocks::create($request->validated());
        return redirect()->route('mock.settings', ['mock' => $mock->id])
            ->with('successMessage', 'Mock was successfully added!');
    }

    /**
     * Show an mock
     *
     * @param $id
     * @return array
     */
    public function show($id)
    {
        $mock = mocks::find($id);
        return fractal($mock, new MockTransformer())->toArray();
    }

    /**
     * Edit an mock$mock
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Inertia\Response
     */
    public function edit($id)
    {
        $mock = mocks::findOrFail($id);
        if (Auth::user()->hasRole("admin")) {
            return Inertia::render('Admin/Mock/Details', [
                'steps' => $this->repository->getSteps($mock->id, 'details'),
                'editFlag' => true,
                'mock' => $mock,
                'mockId' => $mock->id,
                'mockTypes' => MockTypes::select(['id', 'name'])->get(),
                'initialSubCategories' => fractal(SubCategory::select(['id', 'name', 'category_id'])
                    ->with('category:id,name')
                    ->where('id', $mock->sub_category_id)
                    ->get(), new SubCategorySearchTransformer())
                    ->toArray()['data'],
            ]);
        }else if (Auth::user()->hasRole("parent")) {
            return Inertia::render('Parent/Mock/Details', [
                'steps' => $this->repository->getSteps($mock->id, 'details'),
                'editFlag' => true,
                'mock' => $mock,
                'mockId' => $mock->id,
                'mockTypes' => MockTypes::select(['id', 'name'])->get(),
                'initialSubCategories' => fractal(SubCategory::select(['id', 'name', 'category_id'])
                    ->with('category:id,name')
                    ->where('id', $mock->sub_category_id)
                    ->get(), new SubCategorySearchTransformer())
                    ->toArray()['data'],
            ]);
        }
    }

    /**
     * Update an exam
     *
     * @param UpdateMockRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateMockRequest $request, $id)
    {
        $mock = mocks::find($id);
        $mock->update($request->validated());

        return redirect()->route('mock.settings', ['mock' => $mock->id])->with('successMessage', 'Mock was successfully updated!');
    }

    /**
     * Exam settings page
     *
     * @param $id
     * @return \Inertia\Response
     */
    public function settings($id)
    {
        $mock = mocks::findOrFail($id);
        if (Auth::user()->hasRole("admin")) {
            return Inertia::render('Admin/Mock/Settings', [
                'mock' => $mock,
                'steps' => $this->repository->getSteps($mock->id, 'settings'),
                'editFlag' => true,
                'settings' => [
                    'auto_duration' => $mock->settings->get('auto_duration', true),
                    'auto_grading' => $mock->settings->get('auto_grading', true),
                    'cutoff' => $mock->settings->get('cutoff', 60),
                    'enable_section_cutoff' => $mock->settings->get('enable_section_cutoff', false),
                    'enable_negative_marking' => $mock->settings->get('enable_negative_marking', false),
                    'restrict_attempts' =>  $mock->settings->get('restrict_attempts', false),
                    'no_of_attempts' => $mock->settings->get('no_of_attempts', null),
                    'disable_section_navigation' => $mock->settings->get('disable_section_navigation', false),
                    'disable_question_navigation' => $mock->settings->get('disable_question_navigation', false),
                    'disable_finish_button' => $mock->settings->get('disable_finish_button', false),
                    'hide_solutions' => $mock->settings->get('hide_solutions', false),
                    'list_questions' => $mock->settings->get('list_questions', true),
                    'shuffle_questions' => $mock->settings->get('shuffle_questions', false),
                ],
            ]);
        }else if (Auth::user()->hasRole("parent")) {
            return Inertia::render('Parent/Mock/Settings', [
                'mock' => $mock,
                'steps' => $this->repository->getSteps($mock->id, 'settings'),
                'editFlag' => true,
                'settings' => [
                    'auto_duration' => $mock->settings->get('auto_duration', true),
                    'auto_grading' => $mock->settings->get('auto_grading', true),
                    'cutoff' => $mock->settings->get('cutoff', 60),
                    'enable_section_cutoff' => $mock->settings->get('enable_section_cutoff', false),
                    'enable_negative_marking' => $mock->settings->get('enable_negative_marking', false),
                    'restrict_attempts' =>  $mock->settings->get('restrict_attempts', false),
                    'no_of_attempts' => $mock->settings->get('no_of_attempts', null),
                    'disable_section_navigation' => $mock->settings->get('disable_section_navigation', false),
                    'disable_question_navigation' => $mock->settings->get('disable_question_navigation', false),
                    'disable_finish_button' => $mock->settings->get('disable_finish_button', false),
                    'hide_solutions' => $mock->settings->get('hide_solutions', false),
                    'list_questions' => $mock->settings->get('list_questions', true),
                    'shuffle_questions' => $mock->settings->get('shuffle_questions', false),
                ],
            ]);
        }
    }

    /**
     * Update exam settings
     *
     * @param UpdateMockSettingsRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateSettings(UpdateMockSettingsRequest $request, $id)
    {
        $mock = mocks::with('mockSections')->find($id);
        $mock->settings = $request->validated();
        $mock->update();

        foreach ($mock->mockSections as $mockSection) {
            $mockSection->updateMeta();
        }

        $mock->updateMeta();

        return redirect()->route('mock.sections.index', ['mock' => $mock->id])->with('successMessage', 'Mock Settings Successfully Updated.');
    }

    /**
     * Delete an mock
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        try {
            $mock = mocks::with('mockSchedules')->find($id);
            if(!$mock->canSecureDelete('mockSchedules', 'sessions')) {
                return redirect()->route('mocks.index')
                    ->with('errorMessage', 'Unable to Delete Mock . Mock schedules or sessions exist. if');
            }
            DB::transaction(function () use ($mock) {
                foreach ($mock->mockSections as $mockSection) {
                    $mockSection->questions()->detach();
                    $mockSection->secureDelete();
                }
                $mock->secureDelete('sessions', 'mockSchedules');
            });
        }
        catch (\Illuminate\Database\QueryException $e){
            dd($e);
            return redirect()->route('mock.index')
                ->with('errorMessage', 'Unable to Delete Mock . Remove all associations and Try again! catch');
        }
        return redirect()->route('mock.index')
            ->with('successMessage', 'Mock was successfully deleted!');
    }
}
