<?php
/**
 * File name: BlogCommentsFilters.php
 * Last modified: 01/02/21, 5:27 PM
 * Author: NearCraft - https://codecanyon.net/user/nearcraft
 * Copyright (c) 2021
 */

namespace App\Filters;

class BlogCommentsFilters extends QueryFilter
{
    /*
    |--------------------------------------------------------------------------
    | DEFINE ALL COLUMN FILTERS BELOW
    |--------------------------------------------------------------------------
    */

    public function name($query = "")
    {
        return $this->builder->where('name', 'like', '%'.$query.'%');
    }

    public function email($query = "")
    {
        return $this->builder->where('email', 'like', '%'.$query.'%');
    }

    public function comment($query = "")
    {
        return $this->builder->where('comment', 'like', '%'.$query.'%');
    }
}
