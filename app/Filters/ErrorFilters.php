<?php
/**
 * File name: SectionFilters.php
 * Last modified: 11/05/21, 3:32 PM
 * Author: NearCraft - https://codecanyon.net/user/nearcraft
 * Copyright (c) 2021
 */

namespace App\Filters;

class ErrorFilters extends QueryFilter
{
    /*
    |--------------------------------------------------------------------------
    | DEFINE ALL COLUMN FILTERS BELOW
    |--------------------------------------------------------------------------
    */

    public function ip($query)
    {
        return $this->builder->where('ip', 'like', '%'.$query.'%');
    }

    public function url($query)
    {
        return $this->builder->where('url', 'like', '%'.$query.'%');
    }

    public function filename($query)
    {
        return $this->builder->where('filename', 'like', '%'.$query.'%');
    }

    public function message($query)
    {
        return $this->builder->where('message', 'like', '%'.$query.'%');
    }

}

