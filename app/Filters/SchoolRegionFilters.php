<?php
/**
 * File name: SchoolRegionFilters.php
 * Last modified: 11/05/21, 3:32 PM
 * Author: NearCraft - https://codecanyon.net/user/nearcraft
 * Copyright (c) 2021
 */

namespace App\Filters;

class SchoolRegionFilters extends QueryFilter
{
    /*
    |--------------------------------------------------------------------------
    | DEFINE ALL COLUMN FILTERS BELOW
    |--------------------------------------------------------------------------
    */

    public function name($query)
    {
        return $this->builder->where('name', 'like', '%'.$query.'%');
    }
    public function slug($query)
    {
        return $this->builder->where('slug', 'like', '%'.$query.'%');
    }
    public function description($query)
    {
        return $this->builder->where('description', 'like', '%'.$query.'%');
    }
}

