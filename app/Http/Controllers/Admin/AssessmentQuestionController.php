<?php

namespace App\Http\Controllers\Admin;

use App\Filters\QuestionFilters;
use App\Http\Controllers\Controller;
use App\Models\AssessmentTest;
use App\Models\AssessmentTestSections;
use App\Models\DifficultyLevel;
use App\Models\Question;
use App\Models\QuestionType;
use App\Repositories\AssessmentRepository;
use App\Repositories\QuestionRepository;
use App\Transformers\Admin\AssessmentSectionTransformer;
use App\Transformers\Admin\QuestionPreviewTransformer;
use Inertia\Inertia;

class AssessmentQuestionController extends Controller
{
    private QuestionRepository $questionRepository;
    private AssessmentRepository $repository;

    public function __construct(AssessmentRepository $repository, QuestionRepository $questionRepository)
    {
        $this->middleware(['role:admin|instructor']);
        $this->repository = $repository;
        $this->questionRepository = $questionRepository;
    }

    /**
     * Quiz questions page
     *
     * @param $assessment
     * @return \Illuminate\Http\RedirectResponse|\Inertia\Response
     */
    public function index($assessment)
    {
        $assessment = AssessmentTest::select(['id', 'title'])->with([
            'assessmentSections' => function ($query) {
                $query->with('section:id,name');
            }
        ])->withCount(['assessmentSections'])->findOrFail($assessment);

        if ($assessment->assessment_sections_count == 0) {
            return redirect()->back()->with('errorMessage', 'Please add at least one section to the assessment.');
        }

        return Inertia::render('Admin/Assessment/Questions', [
            'assessment' => $assessment->only(['id', 'title']),
            'steps' => $this->repository->getSteps($assessment->id, 'questions'),
            'editFlag' => true,
            'difficultyLevels' => DifficultyLevel::select(['id', 'name'])->active()->get(),
            'questionTypes' => QuestionType::select(['id', 'name'])->active()->get(),
            'sections' => function () use ($assessment) {
                return fractal($assessment->assessmentSections, new AssessmentSectionTransformer())->toArray()['data'];
            },
        ]);
    }

    /**
     * Fetch assessment section questions api endpoint
     *
     * @param $assessment
     * @param $section
     * @param QuestionFilters $filters
     * @return \Illuminate\Http\JsonResponse
     */
    public function fetchQuestions($assessment, $section, QuestionFilters $filters)
    {
        $assessment = AssessmentTest::select(['id', 'title'])->findOrFail($assessment);
        // dd($assessment);
        $questions = $assessment->questions()->filter($filters)
        ->where('assessment_test_section_id', '=', $section)
        ->with(['questionType:id,name,code', 'difficultyLevel:id,name,code', 'skill:id,name'])
        ->paginate(10);
        // dd($questions);/

        return response()->json([
            'questions' => fractal($questions, new QuestionPreviewTransformer())->toArray(),
        ], 200);
    }

    /**
     * Fetch available questions api endpoint
     *
     * @param $assessment
     * @param $section
     * @param QuestionFilters $filters
     * @return \Illuminate\Http\JsonResponse
     */
    public function fetchAvailableQuestions($assessment, $section, QuestionFilters $filters)
    {
        $assessment = AssessmentTest::select(['id', 'title'])->findOrFail($assessment);

        $questions = Question::filter($filters)->whereNotIn('id', $assessment->questions->pluck('id'))
            ->with(['questionType:id,name,code', 'difficultyLevel:id,name,code'])
            ->whereHas('section', function ($q) use ($section) {
                $q->where('sections.id', '=', $section);
            })->paginate(10);

        return response()->json([
            'questions' => fractal($questions, new QuestionPreviewTransformer())->toArray()
        ], 200);
    }

    /**
     * Add question to assessment section
     *
     * @param $assessment
     * @param $section
     * @return \Illuminate\Http\JsonResponse
     */
    public function addQuestion(AssessmentTest $assessment, AssessmentTestSections $section)
    {
        try {
            $question = Question::with('questionType:id,code')->findOrFail(request()->get('question_id'));
            // dd(!$this->questionRepository->checkAutoEvaluationEligibility($question->questionType->code));

            if ($assessment->settings->auto_evaluation == false) {
                if (!$this->questionRepository->checkAutoEvaluationEligibility($question->questionType->code)) {

                    return response()->json([
                        'status' => 'warning',
                        'message' => 'This question type does not supports auto evaluation.'
                    ], 200);
                }
            }
            if (!$section->questions->contains($question->id)) {
                $section->questions()->attach([
                    $question->id => ['assessment_id' => $assessment->id]
                ]);
            }

            $section->updateMeta($assessment);
            $assessment->updateMeta($assessment);
        //    dd($assessment->updateMeta($assessment));

            return response()->json(['status' => 'success', 'message' => 'Question Added Successfully'], 200);

        } catch (\Exception $e) {
            dd($e);
            return response()->json(['status' => 'error', 'message' => 'Something Went Wrong']);
        }
    }

    /**
     * Remove question from assessment section
     *
     * @param $assessment
     * @param $section
     * @return \Illuminate\Http\JsonResponse
     */
    public function removeQuestion(AssessmentTest $assessment, AssessmentTestSections $section)
    {
        try {
            $question = Question::with('questionType:id,type')->findOrFail(request()->get('question_id'));

            $section->questions()->detach($question->id);

            $section->updateMeta();
            $assessment->updateMeta();

            return response()->json(['status' => 'success', 'message' => 'Question Removed Successfully'], 200);

        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e]);
        }
    }
}
