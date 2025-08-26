<?php
/**
 * File name: QuestionCrudController.php
 * Last modified: 19/07/21, 12:55 AM
 * Author: NearCraft - https://codecanyon.net/user/nearcraft
 * Copyright (c) 2021
 */

namespace App\Http\Controllers\Admin;

use App\Filters\QuestionFilters;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\QuestionAttachmentRequest;
use App\Http\Requests\Admin\QuestionSettingsRequest;
use App\Http\Requests\Admin\QuestionSolutionRequest;
use App\Http\Requests\Admin\StoreQuestionRequest;
use App\Http\Requests\Admin\UpdateQuestionRequest;
use App\Models\ComprehensionPassage;
use App\Models\DifficultyLevel;
use App\Models\Question;
use App\Models\Book;
use App\Models\QuestionType;
use App\Models\Skill;
use App\Models\Tag;
use App\Models\Topic;
use App\Models\Section;
use App\Models\User;
use App\Repositories\QuestionRepository;
use App\Repositories\TagRepository;
use App\Transformers\Admin\QuestionTransformer;
use App\Transformers\Admin\SkillSearchTransformer;
use App\Transformers\Admin\TopicSearchTransformer;
use Illuminate\Support\Str;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class QuestionCrudController extends Controller
{
    private QuestionRepository $repository;

    public function __construct(QuestionRepository $repository)
    {
        $this->middleware(['role:admin|instructor']);
        $this->repository = $repository;
    }

    /**
     * List all questions
     *
     * @param QuestionFilters $filters
     * @return \Inertia\Response
     */
    public function index(QuestionFilters $filters)
    {
        return view('Admin/Questions', [
            'questionTypes' => QuestionType::select(['id as value', 'code', 'name as text'])->active()->get(),
            'questions' => function () use($filters) {
                return fractal(Question::filter($filters)
                    ->with(['questionType:id,name,code', 'section:sections.id,sections.name', 'skill:id,name', 'topic:id,name', 'book:id,Title,Publisher,Year,Subject,Age_Group'])
                    // ->where('approve_status', null)
                    ->orderBy('id', 'desc')
                    ->paginate(request()->perPage != null ? request()->perPage : 10),
                    new QuestionTransformer())->toArray();
            },
            'type' => 'all'
        ]);
    }
    public function ApprovedQuestion(QuestionFilters $filters)
    {
        return view('Admin/Questions', [
            'questionTypes' => QuestionType::select(['id as value', 'code', 'name as text'])->active()->get(),
            'questions' => function () use($filters) {
                
                return fractal(Question::filter($filters)
                    ->with(['questionType:id,name,code', 'section:sections.id,sections.name', 'skill:id,name', 'topic:id,name', 'book:id,Title,Publisher,Year,Subject,Age_Group'])
                    ->orderBy('id', 'desc')
                    ->where('approve_status', 1)
                    ->paginate(request()->perPage != null ? request()->perPage : 10),
                    new QuestionTransformer())->toArray();
                    
            },
            'type' => 'approved'
        ]);
    }
    public function ApproveQuestions()
    {
        return view('Admin/Question/ApproveQuestions',[
            'sections' => Section::active()->get(['id', 'name']),
            'books' => Book::select('id', 'Title')->get(),
        ]);
    }
    public function fetchYetToApproveQuestions(QuestionFilters $filters)
    {   
        if(request()->get('books')){
            $questions = function () use($filters) {
                return fractal(Question::filter($filters)
                    ->with(['questionType:id,name,code', 'section:sections.id,sections.name', 'skill:id,name', 'topic:id,name', 'book:id,Title,Publisher,Year,Subject,Age_Group'])
                    ->orderBy('id', 'asc')
                    ->where('approve_status', null)
                    ->whereIn('skill_id', Skill::select()->whereIn('section_id', Section::active()->whereIn('id', request()->get('subjects'))->pluck("id"))->pluck("id"))
                    ->whereIn('book_id', request()->get('books'))
                    ->paginate(),
                    new QuestionTransformer())->toArray();
            };
        } else {
            $questions = function () use($filters) {
                return fractal(Question::filter($filters)
                    ->with(['questionType:id,name,code', 'section:sections.id,sections.name', 'skill:id,name', 'topic:id,name', 'book:id,Title,Publisher,Year,Subject,Age_Group'])
                    ->orderBy('id', 'asc')
                    ->where('approve_status', null)
                    ->whereIn('skill_id', Skill::select()->whereIn('section_id', Section::active()->whereIn('id', request()->get('subjects'))->pluck("id"))->pluck("id"))
                    ->paginate(),
                    new QuestionTransformer())->toArray();
            };
        }
        if($questions()['meta']['pagination']['total'] > 0){
            return [
                "success" => true,
                "question" => $questions()['data'][0]
            ];
        } else {
            return [
                "success" => false,
                "question" => null
            ];
        }
    }
    public function refreashApproveQuestions(QuestionFilters $filters){
        $questions = function () use($filters) {
            return fractal(Question::filter($filters)
                ->with(['questionType:id,name,code', 'section:sections.id,sections.name', 'skill:id,name', 'topic:id,name', 'book:id,Title,Publisher,Year,Subject,Age_Group'])
                ->orderBy('id', 'asc')
                ->where('id', request()->get('id'))
                ->paginate(),
                new QuestionTransformer())->toArray();
        };
        if($questions()['meta']['pagination']['total'] > 0){
            return [
                "success" => true,
                "question" => $questions()['data'][0]
            ];
        } else {
            return [
                "success" => false,
                "question" => null
            ];
        }
    }
    public function approveQuestionId(QuestionFilters $filters, $id)
    {
        $question = Question::findOrFail($id);
        $question->approve_status = 1;
        $question->approve_by = Auth::user()->id;
        $question->approve_datetime = Carbon::now()->toDateTimeString();
        $question->update();
        $next_record = fractal(Question::where('id', '>', $question->id)->whereIn('skill_id', Skill::select()->whereIn('section_id', Section::active()->whereIn('id', request()->get('subjects'))->pluck("id"))->pluck("id"))->where('approve_status', '=' , null)->orderBy('id')->first(), new QuestionTransformer())->toArray();
        return [
            'success' => true,
            'question' => $next_record['data']
        ];
    }
    public function rejectQuestionId(QuestionFilters $filters, $id)
    {
        $question = Question::findOrFail($id);
        $question->approve_status = 0;
        $question->approve_by = Auth::user()->id;
        $question->approve_datetime = Carbon::now()->toDateTimeString();
        $question->comment = Auth::user()->first_name . ' ' . Auth::user()->last_name . ' - ' . $question->approve_datetime . ' <br> ' . request()->get('rejectReason') . ' <br> ---------------------------------- <br> ' . $question->comment;
        $question->update();
        $next_record = fractal(Question::where('id', '>', $question->id)->whereIn('skill_id', Skill::select()->whereIn('section_id', Section::active()->whereIn('id', request()->get('subjects'))->pluck("id"))->pluck("id"))->where('approve_status', '=' , null)->orderBy('id')->first(), new QuestionTransformer())->toArray();
        return [
            'success' => true,
            'question' => $next_record['data']
        ];
    }
    public function prevQuestionId(QuestionFilters $filters, $id)
    {
        $question = Question::findOrFail($id);
        $next_record = fractal(Question::where('id', '<', $question->id)->whereIn('skill_id', Skill::select()->whereIn('section_id', Section::active()->whereIn('id', request()->get('subjects'))->pluck("id"))->pluck("id"))->where('approve_status', '=' , null)->orderBy('id', 'desc')->first(), new QuestionTransformer())->toArray();
        return [
            'success' => true,
            'question' => $next_record['data']
        ];
    }
    public function nextQuestionId(QuestionFilters $filters, $id)
    {
        $question = Question::findOrFail($id);
        $next_record = fractal(Question::where('id', '>', $question->id)->whereIn('skill_id', Skill::select()->whereIn('section_id', Section::active()->whereIn('id', request()->get('subjects'))->pluck("id"))->pluck("id"))->where('approve_status', '=' , null)->orderBy('id')->first(), new QuestionTransformer())->toArray();
        return [
            'success' => true,
            'question' => $next_record['data']
        ];
    }
    public function NotApprovedQuestion(QuestionFilters $filters)
    {
        return view('Admin/Questions', [
            'questionTypes' => QuestionType::select(['id as value', 'code', 'name as text'])->active()->get(),
            'questions' => function () use($filters) {
                return fractal(Question::filter($filters)
                    ->with(['questionType:id,name,code', 'section:sections.id,sections.name', 'skill:id,name', 'topic:id,name', 'book:id,Title,Publisher,Year,Subject,Age_Group'])
                    ->where('approve_status', 0)
                    ->orderBy('id', 'desc')
                    ->paginate(request()->perPage != null ? request()->perPage : 10),
                    new QuestionTransformer())->toArray();
            },
            'type' => 'not-approved'
        ]);
    }
    public function BulkQuestionEditor(QuestionFilters $filters)
    {
        return view('Admin/BulkQuestionEditor', [
            'questionTypes' => QuestionType::select(['id as value', 'code', 'name as text'])->active()->get(),
            'questions' => function () use($filters) {
                return fractal(Question::filter($filters)
                    ->with(['questionType:id,name,code', 'section:sections.id,sections.name', 'skill:id,name', 'topic:id,name'])
                    ->orderBy('id', 'desc')
                    ->paginate(request()->perPage != null ? request()->perPage : 10),
                    new QuestionTransformer())->toArray();
            },
        ]);
    }

    /**
     * Create a question
     *
     * @return \Inertia\Response
     */
    public function create()
    {
        $pretty_books = array();
        $books = DB::table('books')->get();
        foreach ($books as $book){ 
            $newCompete = array('id'=>$book->id, 'name'=>$book->Publisher.' - '.$book->Title.' Year-'.$book->Year.' '.$book->Subject.' - Ages '.$book->Age_Group);
            array_push($pretty_books, $newCompete);
        }
        // Select MSA as default question type if no question type specified
        if(request()->has('question_type')) {
            $questionType = QuestionType::select(['id', 'code', 'name'])
                ->where('code', request()->get('question_type'))
                ->firstOrFail();
        } else {
            $questionType = QuestionType::select(['id', 'code', 'name'])->first();
        }

        return view('Admin/Question/Details', [
            'steps' => $this->repository->getSteps(),
            'questionType' => $questionType,
            'initialOptions' => $this->repository->setDefaultOptions($questionType->code),
            'initialAnswers' => $this->repository->setDefaultAnswers($questionType->code),
            'initialPreferences' => $this->repository->setDefaultPreferences($questionType->code),
            'books' => $pretty_books
        ]);
    }

    /**
     * Store a question
     *
     * @param StoreQuestionRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreQuestionRequest $request)
    {
        $book_id = (int)$request->book_id;
        session(['book' => $book_id]);
        $question = new Question();
        $question->question = $request->question;
        $question->comprehension = $request->comprehension;
        $question->question_type_id = $request->question_type_id;
        $question->options = $request->options;
        $question->correct_answer = $request->question_type_id == 7 ? getBlankItems($request->question) :  $request->correct_answer;
        $question->skill_id = $request->skill_id;
        $question->book_id = $book_id;
        $question->preferences = $request->preferences;
        $question->save();

        return [
            'success' => true,
            'question' => $question->id
        ];
    }

    /**
     * Show a question
     *
     * @param $id
     * @return array
     */
    public function show($id)
    {
        $question= Question::find($id);
        return fractal($question, new QuestionTransformer())->toArray();
    }

    /**
     * Preview a question
     *
     * @param $id
     * @return \Inertia\Response
     */
    public function preview($id)
    {
        $question = Question::findOrFail($id);
        $questionTransformer = fractal($question, new QuestionTransformer())->toArray();
        $skill = Skill::select(['id', 'name'])->find($question->skill_id);
        return view('Admin/Question/Preview', [
            'questionType' => QuestionType::select(['id', 'code', 'name'])->find($question->question_type_id),
            'question' => $questionTransformer['data'],
            'questionId' => $question->id,
            'skill' => $skill,
        ]);
    }

    /**
     * Edit a question
     *
     * @param $id
     * @return \Inertia\Response
     */
    public function edit($id)
    {
        $pretty_books = array();
        $books = DB::table('books')->get();
        foreach ($books as $book){ 
            $newCompete = array('id'=>$book->id, 'name'=>$book->Publisher.' - '.$book->Title.' Year-'.$book->Year.' '.$book->Subject.' - Ages '.$book->Age_Group);
            array_push($pretty_books, $newCompete);
        }
        $question = Question::findOrFail($id);
        $skill = Skill::select(['id', 'name'])->find($question->skill_id);
        return view('Admin/Question/Details', [
            'steps' => $this->repository->getSteps($question->id, 'details'),
            'questionType' => QuestionType::select(['id', 'code', 'name'])->find($question->question_type_id),
            'question' => $question,
            'editFlag' => true,
            'questionId' => $question->id,
            'skill' => $skill,
            'books' => $pretty_books
        ]);
    }
    /**
     * Approve a question
     *
     * @param $id
     * @return \Inertia\Response
     */
    public function QuestionApprove($id)
    {
        $pretty_books = array();
        $books = DB::table('books')->get();
        foreach ($books as $book){ 
            $newCompete = array('id'=>$book->id, 'name'=>$book->Publisher.' - '.$book->Title.' Year-'.$book->Year.' '.$book->Subject.' - Ages '.$book->Age_Group);
            array_push($pretty_books, $newCompete);
        }
        $question = Question::findOrFail($id);
        $skill = Skill::select(['id', 'name'])->find($question->skill_id);
        $topic = Topic::select(['id', 'name'])->find($question->topic_id);
        return view('Admin/Question/Approve', [
            'steps' => $this->repository->getSteps($question->id, 'details'),
            'questionType' => QuestionType::select(['id', 'code', 'name'])->find($question->question_type_id),
            'question' => $question,
            'editFlag' => true,
            'questionId' => $question->id,
            'skill' => $skill,
            'topic_id' => $topic,
            'sections' => Section::select(['name', 'id'])->get(),
            'books' => $pretty_books,
            'initialTopics' => fractal(Topic::select(['id', 'name', 'skill_id'])
                ->with('skill:id,name')
                ->where('skill_id', $question->skill_id)
                ->get(), new TopicSearchTransformer())
                ->toArray()['data'],
            'initialTags' => Tag::select(['id', 'name'])
                ->get(),
            'difficultyLevels' => DifficultyLevel::select(['name', 'id'])->get(),
            'initialComprehensions' => ComprehensionPassage::get(['id', 'title']),
            'skills' => Skill::select(['name', 'id'])->get(),
            
        ]);
    }

    /**
     * Update a question
     *
     * @param UpdateQuestionRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateQuestionRequest $request, $id)
    {
        $book_id = (int)$request->book_id;
        $skill_id = (int)$request->skill_id;
        $question = Question::findOrFail($id);
        $question->question = $request->question;
        $question->question_type_id = (int)$request->question_type_id;
        $question->options = $request->options;
        $question->correct_answer = $request->question_type_id == 7 ? getBlankItems($request->question) :  $request->correct_answer;
        $question->preferences = $request->preferences;
        $question->book_id = $book_id;
        $question->skill_id = $skill_id;
        $question->comprehension = $request->comprehension;
        $question->approve_status = null;
        $question->approve_by = null;
        $question->approve_datetime = null;
        $question->update();

        return [
            'success' => true,
            'question' => $question->id
        ];

        return redirect()->route('question_settings', ['id' => $question->id])->with('successMessage', 'Details saved successfully!');
    }

    
     /**
     * Update a Question Approve
     *
     * @param UpdateQuestionRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateQuestionApprove(UpdateQuestionRequest $request, $id, TagRepository $tagRepository)
    {
        // approve_status
        $book_id = (int)$request->book_id;
        $question = Question::findOrFail($id);
        $question->question = $request->question;
        $question->question_type_id = (int)$request->question_type_id;
        $question->options = $request->options;
        $question->correct_answer = $request->question_type_id == 7 ? getBlankItems($request->question) :  $request->correct_answer;
        $question->preferences = $request->preferences;
        $question->book_id = $book_id;
        $question->is_active = $request->is_active === 'true'? true: false;
        if($request->approve_status === 'true'){
            $question->approve_status = 1;
            $question->approve_by = Auth::user()->id;
            $question->approve_datetime = Carbon::now()->toDateTimeString();
        } else {
            $question->approve_status = null;
            $question->approve_by = null;
            $question->approve_datetime = null;
        }
        $question->skill_id = (int)$request->skill_id;
        $question->topic_id = $request->topic_id?(int)$request->topic_id:null;
        $question->difficulty_level_id = (int)$request->difficulty_level_id;
        $question->default_marks = (int)$request->default_marks;
        $question->default_time = (int)$request->default_time;
        $request->solution_has_video = $request->solution_has_video == 'true' ? true : false;
        $question->hint = $request->hint;
        $question->solution = $request->solution;
        $question->solution_video = $request->solution_has_video == true ? $request->solution_video : null;
        $question->has_attachment = $request->has_attachment == 'true' ? true : false;
        $question->attachment_type = $request->attachment_type;
        $question->comprehension_passage_id = $request->attachment_type == 'comprehension' ? (int)$request->comprehension_id : null;
        $question->attachment_options = $request->attachment_type == 'comprehension' ? null : $request->attachment_options;        

        $question->update();

        $request->tags = $request->tags?$request->tags:[];
        // Check if tags exists, otherwise create
        $tagRepository->createIfNotExists($request->tags);
        $tagData = Tag::whereIn('name', $request->tags)->pluck('id');
        $question->tags()->sync($tagData);

        return [
            'success' => true,
            'question' => $question->id
        ];
    }

    public function skillUpdate($id, $skill_id)
    {
        $question = Question::findOrFail($id);
        $question->skill_id = (int)$skill_id;
        $initialTopics = fractal(Topic::select(['id', 'name', 'skill_id'])
        ->with('skill:id,name')
        ->where('skill_id', $question->skill_id)
        ->get(), new TopicSearchTransformer())
        ->toArray()['data'];
        $question->update();
        return [
            'success' => true,
            'initialSubTopics' => $initialTopics
        ];
    }

    /**
     * Question settings page
     *
     * @param $id
     * @return \Inertia\Response
     */
    public function settings($id)
    {
        $question = Question::with('tags')->findOrFail($id);
        return view('Admin/Question/Settings', [
            'steps' => $this->repository->getSteps($question->id, 'settings'),
            'question' => $question,
            'questionType' => QuestionType::select(['id', 'code', 'name'])->find($question->question_type_id),
            'editFlag' => true,
            'questionId' => $question->id,
            'difficultyLevels' => DifficultyLevel::select(['name', 'id'])->get(),
            'initialSkills' => fractal(Skill::select(['id', 'name', 'section_id'])
                ->with('section:id,name')
                ->where('id', $question->skill_id)
                ->get(), new SkillSearchTransformer())
                ->toArray()['data'],
            'initialTopics' => fractal(Topic::select(['id', 'name', 'skill_id'])
                ->with('skill:id,name')
                ->where('skill_id', $question->skill_id)
                ->get(), new TopicSearchTransformer())
                ->toArray()['data'],
            'initialTags' => Tag::select(['id', 'name'])
                ->get(),
        ]);
    }
    public function getTopic($id)
    {
        $question = Question::with('tags')->findOrFail($id);
        return  [
            'initialTopics' => fractal(Topic::select(['id', 'name', 'skill_id'])
                ->with('skill:id,name')
                ->where('skill_id', $question->skill_id)
                ->get(), new TopicSearchTransformer())
                ->toArray()['data']
        ];
    }
    

    /**
     * Update question settings
     *
     * @param QuestionSettingsRequest $request
     * @param $id
     * @param TagRepository $tagRepository
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateSettings(QuestionSettingsRequest $request, $id, TagRepository $tagRepository)
    {
        $question = Question::findOrFail($id);
        $question->is_active = $request->is_active === 'true'? true: false;
        $question->skill_id = (int)$request->skill_id;
        $question->topic_id = (int)$request->topic_id;
        $question->difficulty_level_id = (int)$request->difficulty_level_id;
        $question->default_marks = (int)$request->default_marks;
        $question->default_time = (int)$request->default_time;
        $question->update();

        $request->tags = $request->tags?$request->tags:[];

        // Check if tags exists, otherwise create

        $tagRepository->createIfNotExists($request->tags);


        $tagData = Tag::whereIn('name', $request->tags)->pluck('id');
        $question->tags()->sync($tagData);

        return ['question' => $question->id];
    }

    public function updateTopic($id, $topic)
    {
        $question = Question::findOrFail((int)$id);
        $question->topic_id = (int)$topic != 0 ? (int)$topic : null ;
        $question->update();
        return [
            'success' => true,
            'topic' => $question->topic_id?$question->topic_id:'--'
        ];
    }

    /**
     * Question solution page
     *
     * @param $id
     * @return \Inertia\Response
     */
    public function solution($id)
    {
        $question = Question::findOrFail($id);
        return view('Admin/Question/Solution', [
            'steps' => $this->repository->getSteps($question->id, 'solution'),
            'questionType' => QuestionType::select(['id', 'code', 'name'])->find($question->question_type_id),
            'question' => $question,
            'editFlag' => true,
            'questionId' => $question->id,
        ]);
    }

    /**
     * Update question solution
     *
     * @param QuestionSolutionRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateSolution(QuestionSolutionRequest $request, $id)
    {
        $question = Question::findOrFail($id);
        $request->solution_has_video = $request->solution_has_video == 'true' ? true : false;
        $question->hint = $request->hint;
        $question->solution = $request->solution;
        $question->solution_video = $request->solution_has_video == true ? $request->solution_video : null;
        $question->update();

        return ['question' => $question->id];
    }

    /**
     * Question attachment page
     *
     * @param $id
     * @return \Inertia\Response
     */
    public function attachment($id)
    {
        $question = Question::findOrFail($id);
        return view('Admin/Question/Attachment', [
            'steps' => $this->repository->getSteps($question->id, 'attachment'),
            'questionType' => QuestionType::select(['id', 'code', 'name'])->find($question->question_type_id),
            'question' => $question,
            'editFlag' => true,
            'questionId' => $question->id,
            'initialComprehensions' => ComprehensionPassage::get(['id', 'title'])
        ]);
    }

    /**
     * Update question attachment
     *
     * @param QuestionAttachmentRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateAttachment(QuestionAttachmentRequest $request, $id)
    {
        $question = Question::findOrFail($id);
        $question->has_attachment = $request->has_attachment == 'true' ? true : false;
        $question->attachment_type = $request->attachment_type;
        $question->comprehension_passage_id = $request->attachment_type == 'comprehension' ? (int)$request->comprehension_id : null;
        $question->attachment_options = $request->attachment_type == 'comprehension' ? null : $request->attachment_options;        
        $question->update();
        return ['question' => $question->id];

    }
    public function topicSelector()
    {
        return view('Admin/Question/TopicSelector', [
            'sections' => Section::select(['name', 'id'])->orderBy('name', 'asc')->get(),
            'topics' => Skill::select(['name', 'id', 'section_id'])->orderBy('name', 'asc')->get(),
            'sub_topics' => Topic::select(['name', 'id', 'skill_id'])->orderBy('name', 'asc')->get(),
        ]);
    }
    public function changeTopics(Request $request)
    {
        $requestData = $request->all();
        $updatedCount = DB::table('questions')
        ->withTrashed()
        ->where('skill_id', $requestData['old_topic'])
        ->where('topic_id', $requestData['old_sub_topic'])
        ->update([
            'skill_id' => $requestData['new_topic'],
            'topic_id' => $requestData['new_sub_topic'],
        ]);
        return redirect()->route('topic_selector')->with('success','You have successfully updated questions.');
    }
    public function changeQuestionsTopics(Request $request)
    {
        $codes = explode(',', $request->codes);
        $subject = (int)$request->subject;
        $topic = (int)$request->topic;
        $sub_topic = (int)$request->sub_topic;
        $updatedCount = DB::table('questions')
        ->whereIn('code', $codes)
        ->update([
            'skill_id' => $topic,
            'topic_id' => $sub_topic,
        ]);
        if($updatedCount > 0){
            return redirect()->route('questions.index');
        } else {
            return redirect()->back()->with('error','Zero questions were updated in selected criteria');
        }
    }
    
    public function singleQuestionsTransfer()
    {
        return view('Admin/Question/SingleQuestionsTransfer', [
            'sections' => Section::select(['name', 'id'])->orderBy('name', 'asc')->get(),
            'topics' => Skill::select(['name', 'id', 'section_id'])->orderBy('name', 'asc')->get(),
            'sub_topics' => Topic::select(['name', 'id', 'skill_id'])->orderBy('name', 'asc')->get(),
        ]);
    }
    
    public function topicsQuestions(Request $request)
    {
        $topic = isset($request->topic) ? $request->topic : null;
        $sub_topic = isset($request->sub_topic) ? $request->sub_topic : null;
        $updatedCount = Question::where('skill_id', $topic)->where('topic_id', $sub_topic)->count();
        return [
            'success' => true,
            'count' => $updatedCount,
        ];
    }
    public function CountUserQuestions(Request $request)
    {
        $data = array();
        $instructors = User::whereHas('roles', function ($query) {
            $query->where('name', 'instructor');
        })->get(['id', 'first_name', 'last_name']);
        foreach($instructors as $instructor){
            $i = [
                "user" => $instructor->first_name." ".$instructor->last_name,
                "value" => Question::where('created_by', $instructor->id)->count()
            ];
            if($i['value'] > 0){
                array_push($data, $i);
            }
        }
        return [
            'success' => true,
            'data' => $data
        ];
    }
    

    /**
     * Delete a question
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        try {
            $question = Question::find($id);

            if(!$question->canSecureDelete('quizzes', 'practiceSets')) {
                return [
                    'success' => false,
                    'message' => 'Unable to Delete Question . Remove all associations and Try again!',
                ];
            } else {
                $question->deleted_by = auth()->user()->id;
                $question->save();
                $question->delete();
            }
        }
        catch (\Illuminate\Database\QueryException $e){
            return [
                'success' => false,
                'message' => 'something went wrong!',
            ];
        }
        return [
            'success' => true,
            'message' => 'Question was successfully deleted!',
        ];
    }

    public function cloneQuestion(QuestionFilters $filters, $id)
    {
        $question = Question::find($id);
        $newQuestion = $question->replicate();
        $newQuestion->created_at = Carbon::now();
        $newQuestion->created_by = Auth::user()->id;
        $newQuestion->save();
        return redirect()->route('QuestionApprove', ['id' => $newQuestion->id])->with('successMessage', 'Question clone successfully!');
    }
}
