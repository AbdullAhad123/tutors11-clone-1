<?php
/**
 * File name: SchoolFilters.php
 * Last modified: 11/05/21, 3:32 PM
 * Author: NearCraft - https://codecanyon.net/user/nearcraft
 * Copyright (c) 2021
 */

namespace App\Filters;

class SchoolFilters extends QueryFilter
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
    public function website($query)
    {
        return $this->builder->where('website', 'like', '%'.$query.'%');
    }
    public function type($query)
    {
        return $this->builder->where('type', 'like', '%'.$query.'%');
    }
    public function phone($query)
    {
        return $this->builder->where('phone', 'like', '%'.$query.'%');
    }
    public function email($query)
    {
        return $this->builder->where('email', 'like', '%'.$query.'%');
    }
    public function address($query)
    {
        return $this->builder->where('address', 'like', '%'.$query.'%');
    }
    public function region($query)
    {
        return $this->builder->where('region', 'like', '%'.$query.'%');
    }
    public function examBoards($query)
    {
        return $this->builder->where('exam_boards', 'like', '%'.$query.'%');
    }
    public function examStyles($query)
    {
        return $this->builder->where('exam_styles', 'like', '%'.$query.'%');
    }
}

