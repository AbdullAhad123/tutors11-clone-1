<?php
/**
 * File name: PracticeSetQuestionController.php
 * Last modified: 19/07/21, 12:55 AM
 * Author: NearCraft - https://codecanyon.net/user/nearcraft
 * Copyright (c) 2021
 */

namespace App\Http\Controllers\Admin;

use App\Filters\QuestionFilters;
use App\Http\Controllers\Controller;
use App\Models\SuggestedPracticeSets;
use App\Models\DifficultyLevel;
use App\Models\PracticeSet;
use App\Models\Question;
use App\Models\QuestionType;
use App\Models\Skill;
use App\Models\Topic;
use App\Repositories\PracticeSetRepository;
use App\Transformers\Admin\QuestionPreviewTransformer; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;

class PracticeSetQuestionController extends Controller
{
    private PracticeSetRepository $repository;

    public function __construct(PracticeSetRepository $repository)
    {
        $this->middleware(['role:admin|instructor|parent|teacher|student']);
        $this->repository = $repository;
    }

    /**
     * Practice set questions page
     *
     * @param $id
     * @return \Inertia\Response
     */
    public function fetchIndex($id)
    {
        $practiceSet = PracticeSet::select(['id', 'title'])->findOrFail($id);
        return ['practice_set' => $practiceSet->id];
        // if (Auth::user()->hasRole("admin")) {
        //     return Inertia::render('Admin/PracticeSet/Questions', [
        //         'practiceSet' => $test->only(['id', 'title']),
        //         'steps' => $this->repository->getSteps($test->id, 'questions'),
        //         'editFlag' => true,
        //         'difficultyLevels' => DifficultyLevel::select(['id', 'name'])->active()->get(),
        //         'questionTypes' => QuestionType::select(['id', 'name'])->active()->get()
        //     ]);
        // }else if (Auth::user()->hasRole("parent")){
        //     return Inertia::render('Parent/PracticeSet/Questions', [
        //         'practiceSet' => $test->only(['id', 'title']),
        //         'steps' => $this->repository->getSteps($test->id, 'questions'),
        //         'editFlag' => true,
        //         'difficultyLevels' => DifficultyLevel::select(['id', 'name'])->active()->get(),
        //         'questionTypes' => QuestionType::select(['id', 'name'])->active()->get()
        //     ]);
        // }
    }
    public function Index($id)
    {
        $practiceSet = PracticeSet::select(['id', 'title', 'skill_id'])->findOrFail($id);
        $skill = Skill::select(['id', 'name'])->findOrFail($practiceSet['skill_id']);
        if (Auth::user()->hasRole("admin")) {
            return view('Admin/PracticeSet/Questions', [
                'practiceSet' => $practiceSet->only(['id', 'title']),
                'steps' => $this->repository->getSteps($practiceSet->id, 'questions'),
                'editFlag' => true,
                'difficultyLevels' => DifficultyLevel::select(['id', 'name'])->active()->get(),
                'questionTypes' => QuestionType::select(['id', 'name'])->active()->get()
            ]);
        }
        return redirect()->back();
    }
    public function studentIndex($id)
    {
        $practiceSet = PracticeSet::select(['id', 'title', 'skill_id'])->findOrFail($id);
        $skill = Skill::select(['id', 'name'])->findOrFail($practiceSet['skill_id']);
        if (Auth::user()->hasRole("admin")) {
            return view('Admin/PracticeSet/Questions', [
                'practiceSet' => $practiceSet->only(['id', 'title']),
                'steps' => $this->repository->getSteps($practiceSet->id, 'questions'),
                'editFlag' => true,
                'difficultyLevels' => DifficultyLevel::select(['id', 'name'])->active()->get(),
                'questionTypes' => QuestionType::select(['id', 'name'])->active()->get()
            ]);
        }else if (Auth::user()->hasRole("parent") || Auth::user()->hasRole("teacher") || Auth::user()->hasRole("student")){
            return view('User/PracticeSet/Questions', [
                'practiceSet' => $practiceSet->only(['id', 'title', 'skill_id']),
                'steps' => $this->repository->getSteps($practiceSet->id, 'questions'),
                'editFlag' => true,
                'difficultyLevels' => DifficultyLevel::select(['id', 'name', 'code'])->active()->get(),
                'questionTypes' => QuestionType::select(['id', 'name', 'code'])->active()->get(),
                'skill' => $skill->only(['id', 'name'])
            ]);
        }
    }

    public function parentIndex($id)
    {
        $practiceSet = PracticeSet::select(['id', 'title', 'skill_id'])->findOrFail($id);
        $skill = Skill::select(['id', 'name'])->findOrFail($practiceSet['skill_id']);
        if (Auth::user()->hasRole("admin")) {
            return view('Admin/PracticeSet/Questions', [
                'practiceSet' => $practiceSet->only(['id', 'title']),
                'steps' => $this->repository->getSteps($practiceSet->id, 'questions'),
                'editFlag' => true,
                'difficultyLevels' => DifficultyLevel::select(['id', 'name'])->active()->get(),
                'questionTypes' => QuestionType::select(['id', 'name'])->active()->get()
            ]);
        }else if (Auth::user()->hasRole("parent") || Auth::user()->hasRole("teacher") || Auth::user()->hasRole("student")){
            return view('Parent/PracticeSet/Questions', [
                'practiceSet' => $practiceSet->only(['id', 'title', 'skill_id']),
                'steps' => $this->repository->getSteps($practiceSet->id, 'questions'),
                'editFlag' => true,
                'difficultyLevels' => DifficultyLevel::select(['id', 'name', 'code'])->active()->get(),
                'questionTypes' => QuestionType::select(['id', 'name', 'code'])->active()->get(),
                'skill' => $skill->only(['id', 'name'])
            ]);
        }
    }

    /**
     * Fetch practice set questions api endpoint
     *
     * @param $id
     * @param QuestionFilters $filters
     * @return \Illuminate\Http\JsonResponse
     */
    public function fetchQuestions($id, QuestionFilters $filters)
    {
        $set = PracticeSet::select(['id', 'title'])->findOrFail($id);

        $questions = $set->questions()->with(['questionType:id,name,code', 'difficultyLevel:id,name,code', 'skill:id,name'])
            ->filter($filters)
            ->paginate(10);

        return response()->json([
            'questions' => fractal($questions, new QuestionPreviewTransformer())->toArray()
        ], 200);
    }

    public function addQuestions($id, QuestionFilters $filters)
    {
        
        $questionTypes = request()->get('questionTypes') ? array_map('intval', request()->get('questionTypes')) : null;
        $noOfQuestions = (int)request()->get('noOfQuestions');
        $practiceSetId = (int)request()->get('practiceSetId');
        $set = PracticeSet::select(['id', 'title', 'skill_id'])->with(['questions' => function($builder) {
            $builder->select('id');
        }])->findOrFail($id);
        $practice_set = PracticeSet::select(['id', 'title', 'skill_id', 'sub_topics'])->findOrFail($practiceSetId);
        $practice_sub_topic_count = count(json_decode($practice_set->sub_topics));
        $sub_topic_count = Topic::where('skill_id', $practice_set->skill_id)->count();
        if($practice_sub_topic_count == $sub_topic_count){
            $questions = Question::filter($filters)->where('skill_id', $practice_set->skill_id)->whereNotIn('id', $set->questions->pluck('id'))
            ->whereHas('skill')
            ->active()
            ->with(['questionType:id,name,code', 'difficultyLevel:id,name,code', 'skill:id,name'])
            ->where('skill_id', $set->skill_id)->paginate(PHP_INT_MAX);
        } else {
            $questions = Question::filter($filters)->whereIn('topic_id', json_decode($practice_set->sub_topics))->whereNotIn('id', $set->questions->pluck('id'))
            ->whereHas('skill')
            ->active()
            ->with(['questionType:id,name,code', 'difficultyLevel:id,name,code', 'skill:id,name'])
            ->where('skill_id', $set->skill_id)->paginate(PHP_INT_MAX);
        }


        $questionsData = fractal($questions, new QuestionPreviewTransformer())->toArray();
        $questionIds = [];
        foreach($questionsData['data'] as $question){
            if($questionTypes != null){
                if(in_array($question['question_type_id'], $questionTypes)){
                    array_push($questionIds,$question['id']);
                }
            } else {
                array_push($questionIds,$question['id']);
            }
        }
        $questionToBeAdded = [];
        if($noOfQuestions <= count($questionsData['data'])){
            $uniqueNumbers = range(0, count($questionIds) - 1);
            for ($i = 0; $i < $noOfQuestions; $i++) {
                if (!empty($uniqueNumbers)) {
                    shuffle($uniqueNumbers);
                    $randomNumber = array_pop($uniqueNumbers);
                    if(isset($questionIds[$randomNumber])){
                        array_push($questionToBeAdded,$questionIds[$randomNumber]);
                    }
                }
            }
        } else {
            $questionToBeAdded = $questionIds;
        }
        foreach($questionToBeAdded as $id){
            $question = Question::with('questionType:id,type')->findOrFail($id);
            $Practiceset = PracticeSet::select(['id', 'title'])->findOrFail($practiceSetId);
            if($question->questionType->type != 'subjective') {
                if (!$Practiceset->questions->contains($question->id)) {
                    $Practiceset->questions()->attach($question->id, ['practice_set_id' => $Practiceset->id]);
                    $Practiceset->total_questions = $Practiceset->questions()->count();
                    $Practiceset->update();
                }
            }
        }
        $count = PracticeSet::findOrFail($practiceSetId)->questions()->count();
        if($count > 0){
            if(Auth::user()->hasRole("parent") || Auth::user()->hasRole("teacher")){
                if (session()->has("selected_child") && isset(session("selected_child")["classId"])) {
                    $u_id = session("selected_child")["id"];
                    $SuggestedPracticeSets = new SuggestedPracticeSets;
                    $SuggestedPracticeSets->practice_set_id = $set->id;
                    $SuggestedPracticeSets->user_id = $u_id;
                    $SuggestedPracticeSets->title = $set->title;
                    $SuggestedPracticeSets->due_date = date_format(date_create(request()->get('due_date')), "Y-m-d");
                    $SuggestedPracticeSets->total_questions = $count;
                    $SuggestedPracticeSets->save();
                    return response()->json([
                        'success' => true,
                        'role' => 'parent',
                        'message' => 'Questions added successfully!'
                    ], 200);
                } else {
                    return redirect()->route('change_child');
                }
            } else if (Auth::user()->hasRole("student")){
                $u_id = Auth::user()->id;
                $SuggestedPracticeSets = new SuggestedPracticeSets;
                $SuggestedPracticeSets->practice_set_id = $set->id;
                $SuggestedPracticeSets->user_id = $u_id;
                $SuggestedPracticeSets->title = $set->title;
                $SuggestedPracticeSets->due_date = date_format(date_create(request()->get('due_date')), "Y-m-d");
                $SuggestedPracticeSets->total_questions = $count;
                $SuggestedPracticeSets->save();
                return response()->json([
                    'success' => true,
                    'role' => 'student',
                    'message' => 'Questions added successfully!'
                ], 200);
            }
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Zero questions found based on the specified criteria!'
            ], 200);
        }
    }

    /**
     * Fetch available questions api endpoint
     *
     * @param $id
     * @param QuestionFilters $filters
     * @return \Illuminate\Http\JsonResponse
     */
    public function fetchAvailableQuestions($id, QuestionFilters $filters)
    {
        $set = PracticeSet::select(['id', 'title', 'skill_id'])->with(['questions' => function($builder) {
            $builder->select('id');
        }])->findOrFail($id);

        $questions = Question::filter($filters)->whereNotIn('id', $set->questions->pluck('id'))
            ->with(['questionType:id,name,code', 'difficultyLevel:id,name,code', 'skill:id,name'])
            ->where('skill_id', $set->skill_id)->paginate(10);

        return response()->json([
            'questions' => fractal($questions, new QuestionPreviewTransformer())->toArray()
        ], 200);
    }

    /**
     * Add a question to practice set
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function addQuestion($id)
    {
        try {
            $question = Question::with('questionType:id,type')->findOrFail(request()->get('question_id'));
            $set = PracticeSet::select(['id', 'title'])->findOrFail($id);

            if($question->questionType->type == 'subjective') {
                return response()->json([
                    'status' => 'warning',
                    'message' => 'Can\'t add subjective type questions to practice set.'
                ], 200);
            }

            if (!$set->questions->contains($question->id)) {
                $set->questions()->attach($question->id, ['practice_set_id' => $set->id]);
                $set->total_questions = $set->questions()->count();

                $set->update();
            }
            return response()->json(['status' => 'success', 'message' => 'Question Added Successfully'], 200);

        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'Something Went Wrong']);
        }
    }

    /**
     * Remove a question from practice set
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function removeQuestion($id)
    {
        try {
            $question = Question::with('questionType:id,type')->findOrFail(request()->get('question_id'));
            $set = PracticeSet::select(['id', 'title'])->findOrFail($id);

            $set->questions()->detach($question->id);
            $set->total_questions = $set->questions()->count();
            $set->update();

            return response()->json(['status' => 'success', 'message' => 'Question Removed Successfully'], 200);

        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'Something Went Wrong']);
        }
    }
}
