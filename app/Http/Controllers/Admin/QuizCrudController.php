<?php
/**
 * File name: QuizCrudController.php
 * Last modified: 19/07/21, 12:55 AM
 * Author: NearCraft - https://codecanyon.net/user/nearcraft
 * Copyright (c) 2021
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Filters\QuizFilters;
use App\Http\Requests\Admin\StoreQuizRequest;
use App\Http\Requests\Admin\UpdateQuizRequest;
use App\Http\Requests\Admin\UpdateQuizSettingsRequest;
use App\Models\Quiz;
use App\Models\QuizType;
use App\Models\SubCategory;
use App\Repositories\QuizRepository;
use App\Transformers\Admin\QuizSearchTransformer;
use App\Transformers\Admin\QuizTransformer;
use App\Transformers\Admin\SubCategorySearchTransformer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class QuizCrudController extends Controller
{
    private QuizRepository $repository;

    public function __construct(QuizRepository $repository)
    {
        $this->middleware(['role:admin|instructor'])->except('search');
        $this->repository = $repository;
    }

    /**
     * List all quizzes
     *
     * @param QuizFilters $filters
     * @return \Inertia\Response
     */
    public function index(QuizFilters $filters)
    {
        return view('Admin/Quizzes', [
            'quizzes' => function () use($filters) {
                return fractal(Quiz::filter($filters)->with(['subCategory:id,name', 'quizType:id,name'])
                    ->withCount(['quizSchedules' => function($query) {
                        $query->where('status', '=', 'active');
                    }])
                    ->paginate(request()->perPage != null ? request()->perPage : 10),
                    new QuizTransformer())->toArray();
            },
        ]);
    }

    /**
     * Search quizzes api endpoint
     *
     * @param Request $request
     * @param QuizFilters $filters
     * @return \Illuminate\Http\JsonResponse
     */
    public function search(Request $request, QuizFilters $filters)
    {
        $query = $request->get('query');
        return response()->json([
            'quizzes' => fractal(Quiz::select(['id', 'title'])->filter($filters)
                ->where('title', 'like', '%'.$query.'%')->published()->limit(20)
                ->get(), new QuizSearchTransformer())
                ->toArray()['data']
        ]);
    }

    /**
     * Create a quiz
     *
     * @return \Inertia\Response
     */
    public function create()
    {
        return view('Admin/Quiz/Details', [
            'steps' => $this->repository->getSteps(),
            'quizTypes' => QuizType::select(['name', 'id'])->get(),
            'initialSubCategories' => fractal(SubCategory::select(['id', 'name', 'category_id'])->latest()->take(10)->get(),
                new SubCategorySearchTransformer())->toArray()['data']
        ]);
    }

    /**
     * Store a quiz
     *
     * @param StoreQuizRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreQuizRequest $request)
    {
        $data = $request->all();
        $data['description'] = "";
        $data['can_redeem'] = $data['can_redeem'] === 'true'? true: false;
        $data['is_active'] = $data['is_active'] === 'true'? true: false;
        $data['is_paid'] = $data['is_paid'] === 'true'? true: false;
        $data['is_private'] = $data['is_private'] === 'true'? true: false;
        $data['price'] = 0;
        settype($data['quiz_type_id'], 'integer');
        settype($data['sub_category_id'], 'integer');
        if($data['points_required'] != null){
            settype($data['points_required'], 'integer');
        }
        $quiz = quiz::create($data);
        return ['quiz' => $quiz->id];
    }

    /**
     * Show a quiz
     *
     * @param $id
     * @return array
     */
    public function show($id)
    {
        $quiz = Quiz::find($id);
        return fractal($quiz, new QuizTransformer())->toArray();
    }

    /**
     * Edit a quiz
     *
     * @param $id
     * @return \Inertia\Response
     */
    public function edit($id)
    {
        $quiz = Quiz::find($id);
        return view('Admin/Quiz/Details', [
            'steps' => $this->repository->getSteps($quiz->id, 'details'),
            'quizTypes' => QuizType::select(['name', 'id'])->get(),
            'editFlag' => true,
            'quiz' => $quiz,
            'quizId' => $quiz->id,
            'initialSubCategories' => fractal(SubCategory::select(['id', 'name', 'category_id'])->latest()->take(10)->get(),
                new SubCategorySearchTransformer())->toArray()['data'],
        ]);
    }

    /**
     * Update a quiz
     *
     * @param UpdateQuizRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateQuizRequest $request, $id)
    {
        $quiz = Quiz::find($id);
        $data = $request->all();
        $data['description'] = "";
        $data['can_redeem'] = $data['can_redeem'] === 'true'? true: false;
        $data['is_active'] = $data['is_active'] === 'true'? true: false;
        $data['is_paid'] = $data['is_paid'] === 'true'? true: false;
        $data['is_private'] = $data['is_private'] === 'true'? true: false;
        $data['price'] = 0;
        settype($data['quiz_type_id'], 'integer');
        settype($data['sub_category_id'], 'integer');
        if($data['points_required'] != null){
            settype($data['points_required'], 'integer');
        }
        $quiz->update($data);
        return ['quiz' => $quiz->id];
    }

    /**
     * Quiz settings page
     *
     * @param $id
     * @return \Inertia\Response
     */
    public function settings($id)
    {
        $quiz = Quiz::findOrFail($id);
        return view('Admin/Quiz/Settings', [
            'quiz' => $quiz,
            'steps' => $this->repository->getSteps($quiz->id, 'settings'),
            'editFlag' => true,
            'settings' => [
                'auto_duration' => $quiz->settings->get('auto_duration', true),
                'total_duration' => $quiz->settings->get('total_duration', null),
                'auto_grading' => $quiz->settings->get('auto_grading', true),
                'correct_marks' => $quiz->settings->get('correct_marks', null),
                'cutoff' => $quiz->settings->get('cutoff', 60),
                'enable_negative_marking' => $quiz->settings->get('enable_negative_marking', false),
                'negative_marking_type' => $quiz->settings->get('negative_marking_type', 'fixed'),
                'negative_marks' => $quiz->settings->get('negative_marks', null),
                'restrict_attempts' =>  $quiz->settings->get('restrict_attempts', false),
                'no_of_attempts' => $quiz->settings->get('no_of_attempts', null),
                'disable_question_navigation' => $quiz->settings->get('disable_question_navigation', false),
                'disable_finish_button' => $quiz->settings->get('disable_finish_button', false),
                'hide_solutions' => $quiz->settings->get('hide_solutions', false),
                'list_questions' => $quiz->settings->get('list_questions', true),
                'shuffle_questions' => $quiz->settings->get('shuffle_questions', false),
            ],
        ]);
    }

    /**
     * Update quiz settings
     *
     * @param UpdateQuizSettingsRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateSettings(UpdateQuizSettingsRequest $request, $id)
    {
        $quiz = Quiz::find($id);


        $quiz->settings = $request->validated();

        $quiz->settings['restrict_attempts'] = $quiz->settings['restrict_attempts'] === 'true'? true: false;
        $quiz->settings['disable_question_navigation'] = $quiz->settings['disable_question_navigation'] === 'true'? true: false;
        $quiz->settings['list_questions'] = $quiz->settings['list_questions'] === 'true'? true: false;
        $quiz->settings['auto_duration'] = $quiz->settings['auto_duration'] === 'true'? true: false;
        $quiz->settings['auto_grading'] = $quiz->settings['auto_grading'] === 'true'? true: false;
        $quiz->settings['enable_negative_marking'] = $quiz->settings['enable_negative_marking'] === 'true'? true: false;
        $quiz->settings['disable_finish_button'] = $quiz->settings['disable_finish_button'] === 'true'? true: false;
        $quiz->settings['hide_solutions'] = $quiz->settings['hide_solutions'] === 'true'? true: false;
        $quiz->settings['shuffle_questions'] = $quiz->settings['shuffle_questions'] === 'true'? true: false;   
        if($quiz->settings['no_of_attempts'] != null){$quiz->settings['no_of_attempts'] = (int)$quiz->settings['no_of_attempts'];}
        if($quiz->settings['total_duration'] != null){$quiz->settings['total_duration'] = (int)$quiz->settings['total_duration'];}
        if($quiz->settings['correct_marks'] != null){$quiz->settings['correct_marks'] = (int)$quiz->settings['correct_marks'];}
        if($quiz->settings['cutoff'] != null){$quiz->settings['cutoff'] = (int)$quiz->settings['cutoff'];}
        if($quiz->settings['negative_marks'] != null){$quiz->settings['negative_marks'] = (int)$quiz->settings['negative_marks'];}
        
        if($quiz->settings->get('auto_duration', true)) {
            $quiz->total_duration = $quiz->questions()->sum('default_time');
        } else {
            $quiz->total_duration = $request->total_duration * 60;
        }

        if($quiz->settings->get('auto_grading', true)) {
            $quiz->total_marks = $quiz->questions()->sum('default_marks');
        } else {
            $quiz->total_marks = $quiz->questions()->count() * $request->correct_marks;
        }

        $quiz->update();
        return ['quiz' => $quiz->id];
    }

    /**
     * Delete a quiz
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        try {
            $quiz = Quiz::find($id);
            if(!$quiz->canSecureDelete('quizSchedules')) {
                return [
                    'message' => "Unable to Delete Quiz. Remove all associations and Try again!",
                    'success' => false,
                ];
            }
            DB::transaction(function () use ($quiz) {
                $quiz->questions()->detach();
                $quiz->secureDelete('sessions', 'quizSchedules');
            });
            return [
                'message' => "Quiz was successfully deleted!",
                'success' => true,
            ];
        }
        catch (\Illuminate\Database\QueryException $e){
            return [
                'message' => "Unable to Delete Quiz. Remove all associations and Try again!",
                'success' => false,
            ];
        }
    }
}
