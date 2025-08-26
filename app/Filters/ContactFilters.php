<?php
/**
 * File name: ContactFilters.php
 * Last modified: 11/05/21, 3:32 PM
 * Author: NearCraft - https://codecanyon.net/user/nearcraft
 * Copyright (c) 2021
 */

namespace App\Filters;

class ContactFilters extends QueryFilter
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
    public function phone($query)
    {
        return $this->builder->where('phone', 'like', '%'.$query.'%');
    }
    public function email($query)
    {
        return $this->builder->where('email', 'like', '%'.$query.'%');
    }
    public function message($query)
    {
        return $this->builder->where('message', 'like', '%'.$query.'%');
    }
}

