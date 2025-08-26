<?php
/**
 * File name: TopicTransformer.php
 * Last modified: 11/05/21, 11:10 PM
 * Author: NearCraft - https://codecanyon.net/user/nearcraft
 * Copyright (c) 2021
 */

namespace App\Transformers\Admin;

use App\Models\Topic;
use App\Models\Question;
use App\Models\SubCategorySections;
use App\Models\SubCategory;
use League\Fractal\TransformerAbstract;

class TopicTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @param Topic $topic
     * @return array
     */
    public function transform(Topic $topic)
    {
        return [
            'id' => $topic->id,
            'code' => $topic->code,
            'name' => $topic->name,
            'skill' => $topic->skill ? $topic->skill->name : '--',
            'helpsheet' => $topic->helpsheet ? $topic->helpsheet : '--',
            'year' => $topic->skill ? SubCategory::findOrFail(SubCategorySections::where('section_id', $topic->skill->section->id)->first()->sub_category_id)->name : '--',
            'status' => $topic->is_active,
            'ques_count' => Question::where('topic_id', $topic->id)->count(),
        ];
    }
}
