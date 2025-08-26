<?php
/**
 * File name: ReviewTransformer.php
 * Last modified: 01/02/21, 5:16 PM
 * Author: NearCraft - https://codecanyon.net/user/nearcraft
 * Copyright (c) 2021
 */

namespace App\Transformers\Admin;

use App\Models\Review;
use League\Fractal\TransformerAbstract;

class ReviewTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @param Review $Review
     * @return array
     */
    public static function randomNum()
    {
        return rand(1, 255);
    }
    public function transform(Review $review)
    {
        return [
            'id' => $review->id,
            'name' => $review->name,
            'user_image' => $review->user_image ? $review->user_image : '--',
            'message' => $review->message,
            'rating' => $review->rating,
            'date' => $review->date,
            'random_color' => 'rgba('.self::randomNum().','.self::randomNum().','.self::randomNum().')',
            'first_letter' => strtoupper(substr($review->name, 0, 1)),
            'created_at' => $review->created_at->format('Y-m-d')
        ];
    }
}
