<?php

namespace App\Http\Controllers\Admin;

use App\Filters\QuestionFilters;
use App\Http\Controllers\Controller;
use App\Models\DifficultyLevel;
use App\Models\mocks;
use App\Models\ExamSection;
use App\Models\mock_sections;
use App\Models\Question;
use App\Models\QuestionType;
use App\Repositories\ExamRepository;
use App\Repositories\MockRepository;
use App\Repositories\QuestionRepository;
use App\Transformers\Admin\MockSectionTransformer;
use App\Transformers\Admin\QuestionPreviewTransformer;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class MockQuestionController extends Controller
{
    private QuestionRepository $questionRepository;
    private MockRepository $repository;

    public function __construct(MockRepository $repository, QuestionRepository $questionRepository)
    {
        $this->middleware(['role:admin|instructor|parent']);
        $this->repository = $repository;
        $this->questionRepository = $questionRepository;
    }

    /**
     * Quiz questions page
     *
     * @param $mock
     * @return \Illuminate\Http\RedirectResponse|\Inertia\Response
     */
    public function index($mock)
    {
        $mock = mocks::select(['id', 'title'])->with(['mockSections' => function($query) {
            $query->with('section:id,name');
        }])->withCount(['mockSections'])->findOrFail($mock);
        // dd($mock);
        if($mock->mock_sections_count == 0) {
            return redirect()->back()->with('errorMessage', 'Please add at least one section to the mock.');
        }
        if (Auth::user()->hasRole("admin")) {
            return Inertia::render('Admin/Mock/Questions', [
                'editFlag' => true,
                'mock' => $mock->only(['id', 'title', 'settings']),
                'steps' => $this->repository->getSteps($mock, 'questions'),
                'sections' => function () use ($mock) {
                    return fractal($mock->mockSections, new MockSectionTransformer())->toArray()['data'];
                },
            ]);
        }else if (Auth::user()->hasRole("parent")) {
            return Inertia::render('Parent/Mock/Questions', [
                'editFlag' => true,
                'mock' => $mock->only(['id', 'title', 'settings']),
                'steps' => $this->repository->getSteps($mock, 'questions'),
                'sections' => function () use ($mock) {
                    return fractal($mock->mockSections, new MockSectionTransformer())->toArray()['data'];
                },
            ]);
        }
    }

    /**
     * Fetch mock section questions api endpoint
     *
     * @param $mock
     * @param $section
     * @param QuestionFilters $filters
     * @return \Illuminate\Http\JsonResponse
     */
    public function fetchQuestions($mock, $section, QuestionFilters $filters)
    {
        $mock = mocks::select(['id', 'title'])->findOrFail($mock);

        $questions = $mock->questions()->filter($filters)
            ->where('mock_section_id', '=', $section)
            ->with(['questionType:id,name,code', 'difficultyLevel:id,name,code', 'skill:id,name'])
            ->paginate(10);

       return response()->json([
            'questions' => fractal($questions, new QuestionPreviewTransformer())->toArray(),
        ], 200);
    }

    /**
     * Fetch available questions api endpoint
     *
     * @param $mock
     * @param $section
     * @param QuestionFilters $filters
     * @return \Illuminate\Http\JsonResponse
     */
    public function fetchAvailableQuestions($mock, $section, QuestionFilters $filters)
    {
        $mock = mocks::select(['id', 'title'])->findOrFail($mock);

        $questions = Question::filter($filters)->whereNotIn('id', $mock->questions->pluck('id'))
            ->with(['questionType:id,name,code', 'difficultyLevel:id,name,code', 'skill:id,name'])
            ->whereHas('section', function ($q) use ($section) {
                $q->where('sections.id', '=', $section);
            })->paginate(10);

        return response()->json([
            'questions' => fractal($questions, new QuestionPreviewTransformer())->toArray()
        ], 200);
    }

    /**
     * Add question to mock section
     *
     * @param $mock
     * @param $section
     * @return \Illuminate\Http\JsonResponse
     */
    public function addQuestion(mocks $mock, mock_sections $section)
    {
        try {
            $question = Question::with('questionType:id,code')->findOrFail(request()->get('question_id'));
            // dd($this->questionRepository->checkAutoEvaluationEligibility($question->questionType->code));

            if($mock->settings->auto_evaluation == false) {
                if(!$this->questionRepository->checkAutoEvaluationEligibility($question->questionType->code)) {
                    return response()->json([
                        'status' => 'warning',
                        'message' => 'This question type does not supports auto evaluation.'
                    ], 200);
                }
            }
            // dd(!$section->questions->contains($question->id));
            if (!$section->questions->contains($question->id)) {

                $section->questions()->attach([
                    $question->id => ['mock_id' => $mock->id]
                ]);
            }

            $section->updateMeta();
            // dd($mock->updateMeta());
            $mock->updateMeta();

            return response()->json(['status' => 'success', 'message' => 'Question Added Successfully'], 200);

        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'Something Went Wrong']);
        }
    }

    /**
     * Remove question from mock section
     *
     * @param $mock
     * @param $section
     * @return \Illuminate\Http\JsonResponse
     */
    public function removeQuestion(mocks $mock, mock_sections $section)
    {
        try {
            $question = Question::with('questionType:id,type')->findOrFail(request()->get('question_id'));

            $section->questions()->detach($question->id);

            $section->updateMeta();
            $mock->updateMeta();

            return response()->json(['status' => 'success', 'message' => 'Question Removed Successfully'], 200);

        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e]);
        }
    }
}
