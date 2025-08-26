<?php
/**
 * File name: QuestionTransformer.php
 * Last modified: 09/07/21, 6:53 PM
 * Author: NearCraft - https://codecanyon.net/user/nearcraft
 * Copyright (c) 2021
 */

namespace App\Transformers\Admin;

use App\Models\Question;
use App\Models\User;
use League\Fractal\TransformerAbstract;

class QuestionTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @param Question $question
     * @return array
     */
    public function transform(Question $question)
    {
        return [
            'id' => $question->id,
            'code' => $question->code,
            'question' => formatQuestionProperty($question->question, $question->questionType->code),
            'questionType' => $question->questionType ? $question->questionType->name : '--',
            'questionTypeCode' => $question->questionType ? $question->questionType->code : '--',
            'section' => $question->section ? $question->section->name : '--',
            'book' => $question->book ? $question->book->Publisher.' - '.$question->book->Title.' Year-'.$question->book->Year.' '.$question->book->Subject . ' - Ages ' .$question->book->Age_Group : '--',
            'skill' => $question->skill ? $question->skill->name : '--',
            'skill_id' => $question->skill ? $question->skill->id : '--',
            'topic' => $question->topic ? $question->topic->name : '--',
            'topic_id' => $question->topic ? $question->topic->id : '--',
            'status' => $question->is_active ? 'Active' : 'In-active',
            'reject_reason' => $question->comment !== null ? $question->comment : '--',
            'approve_status' => $question->approve_status !== null ? $question->approve_status === 1 ? "Approved" : "Not Approved" : "--",
            'approve_by' => $question->approve_status !== null && $question->approve_status === 1 ? $question->approve_by !== null ? User::findOrFail($question->approve_by)->first_name . ' ' . User::findOrFail($question->approve_by)->last_name : '--' : '--',
            'created_by' => $question->created_by !== null ? User::findOrFail($question->created_by)->first_name . ' ' . User::findOrFail($question->created_by)->last_name : '--',
            'created_at' => $question->created_at ? $question->created_at->format('d-m-Y h:i A') : '--',
            'approve_datetime' => $question->approve_status === 1 ? $question->approve_datetime : '--',
            'options' => $question->options,
            'correct_answer' => $question->correct_answer,
            'has_solution' => $question->solution ? true : false,
        ];
    }
}
