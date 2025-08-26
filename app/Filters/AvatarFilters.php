<?php
/**
 * File name: AvatarFilters.php
 * Last modified: 11/05/21, 3:32 PM
 * Author: NearCraft - https://codecanyon.net/user/nearcraft
 * Copyright (c) 2021
 */

namespace App\Filters;

class AvatarFilters extends QueryFilter
{
    /*
    |--------------------------------------------------------------------------
    | DEFINE ALL COLUMN FILTERS BELOW
    |--------------------------------------------------------------------------
    */

    public function title($query)
    {
        return $this->builder->where('title', 'like', '%'.$query.'%');
    }
    public function path($query)
    {
        return $this->builder->where('path', 'like', '%'.$query.'%');
    }
    public function points($query)
    {
        return $this->builder->where('points', 'like', '%'.$query.'%');
    }
    public function description($query)
    {
        return $this->builder->where('description', 'like', '%'.$query.'%');
    }
    public function created_by($query)
    {
        // Assuming the full name is provided as a single string (e.g., "John Doe")
        $nameParts = explode(' ', $query);

        return $this->builder->whereHas('user', function ($userQuery) use ($nameParts) {
            foreach ($nameParts as $part) {
                $userQuery->where(function ($q) use ($part) {
                    $q->where('first_name', 'like', '%' . $part . '%')
                      ->orWhere('last_name', 'like', '%' . $part . '%');
                });
            }
        });
    }
}

