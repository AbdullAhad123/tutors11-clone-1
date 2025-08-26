<?php
/**
 * File name: BlogFilters.php
 * Last modified: 01/02/21, 5:27 PM
 * Author: NearCraft - https://codecanyon.net/user/nearcraft
 * Copyright (c) 2021
 */

namespace App\Filters;

class BlogFilters extends QueryFilter
{
    /*
    |--------------------------------------------------------------------------
    | DEFINE ALL COLUMN FILTERS BELOW
    |--------------------------------------------------------------------------
    */

    public function title($query = "")
    {
        return $this->builder->where('title', 'like', '%'.$query.'%');
    }

    public function slug($query = "")
    {
        return $this->builder->where('slug', 'like', '%'.$query.'%');
    }

    public function category($query = "")
    {
        return $this->builder->where('category', 'like', '%'.$query.'%');
    }
    public function author($query = "")
    {
        return $this->builder->where('author', 'like', '%'.$query.'%');
    }
}
