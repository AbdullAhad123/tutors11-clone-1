<?php
/**
 * File name: BlogTransformer.php
 * Last modified: 01/02/21, 5:16 PM
 * Author: NearCraft - https://codecanyon.net/user/nearcraft
 * Copyright (c) 2021
 */

namespace App\Transformers\Admin;

use App\Models\Blog;
use League\Fractal\TransformerAbstract;

class BlogTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @param Blog $Blog
     * @return array
     */
    public function transform(Blog $blog)
    {
        return [
            'id' => $blog->id,
            'title' => $blog->title,
            'slug' => $blog->slug,
            'category' => $blog->category,
            'image' => $blog->image,
            'author' => $blog->author,
            'body' => $blog->body,
            'keywords' => $blog->keywords,
            'meta_description' => $blog->meta_description,
            'created_at' => $blog->created_at->format('Y-m-d'),
        ];
    }
}
