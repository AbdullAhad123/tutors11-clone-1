<?php
/**
 * File name: QuestionCrudController.php
 * Last modified: 19/07/21, 12:55 AM
 * Author: NearCraft - https://codecanyon.net/user/nearcraft
 * Copyright (c) 2021
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\QuestionsErrorLog;
use App\Repositories\QuestionRepository;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class SendQuestionQueryController extends Controller
{
    private QuestionRepository $repository;

    public function __construct(QuestionRepository $repository)
    {
        $this->middleware(['role:admin|instructor|teacher|parent|student']);
        $this->repository = $repository;
    }

    public function sendQuestionQuery(Request $request, $id)
    {
        $errorLog = new QuestionsErrorLog;    
        $errorLog->message = $request->message;
        $errorLog->question_id = (int)$id;
        $errorLog->user_id = Auth::user() ? (int)Auth::user()->id: null;
        $errorLog->ip = request()->ip();
        $errorLog->url = session('_previous.url') ? session('_previous.url') : request()->url();
        $errorLog->is_index_question = $request->is_index_question === 'true' ? true : false;
        $errorLog->save();
        return [
            'success' => true,
            'errorLog' => $errorLog,
        ];
    }
}
