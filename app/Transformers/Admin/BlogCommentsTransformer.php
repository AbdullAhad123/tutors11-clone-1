<?php
/**
 * File name: BlogCommentsTransformer.php
 * Last modified: 01/02/21, 5:16 PM
 * Author: NearCraft - https://codecanyon.net/user/nearcraft
 * Copyright (c) 2021
 */

namespace App\Transformers\Admin;

use App\Models\BlogComment;
use League\Fractal\TransformerAbstract;

class BlogCommentsTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @param BlogComment $Blog
     * @return array
     */
    public function transform(BlogComment $comment)
    {
        return [
            'id' => $comment->id,
            'name' => $comment->name,
            'email' => $comment->email ? $comment->email : '--',
            'image' => $comment->image ? $comment->image : '--',
            'first_letter' => $comment->first_letter,
            'random_color' => $comment->random_color,
            'comment' => $comment->comment,
            'is_active' => $comment->is_active,
            'created_at' => $comment->created_at->format('Y-m-d'),
        ];
    }
}