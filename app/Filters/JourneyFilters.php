<?php
/**
 * File name: JourneyFilters.php
 * Last modified: 14/05/21, 2:58 PM
 * Author: NearCraft - https://codecanyon.net/user/nearcraft
 * Copyright (c) 2021
 */

namespace App\Filters;

class JourneyFilters extends QueryFilter
{
    /*
    |--------------------------------------------------------------------------
    | DEFINE ALL COLUMN FILTERS BELOW
    |--------------------------------------------------------------------------
    */


    public function code($query)
    {
        return $this->builder->where('code', 'like', '%'.$query.'%');
    }

    public function is_active($query)
    {
        return $this->builder->where('is_active', $query);
    }
}
