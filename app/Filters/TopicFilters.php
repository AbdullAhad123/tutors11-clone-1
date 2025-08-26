<?php
/**
 * File name: TopicFilters.php
 * Last modified: 11/05/21, 4:10 PM
 * Author: NearCraft - https://codecanyon.net/user/nearcraft
 * Copyright (c) 2021
 */

namespace App\Filters;

class TopicFilters extends QueryFilter
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

    function skill_id($query)
    {
        return $this->builder->where('skill_id', $query);
    }

    public function topic($skillName)
    {
        return $this->builder->whereHas('skill', function ($query) use ($skillName) {
            $query->where('name', 'like', '%' . $skillName . '%');
        });
    }

    public function year($yearName)
    {
        return $this->builder->whereHas('skill.section.subCategories', function ($query) use ($yearName) {
            $query->where('name', 'like', '%' . $yearName . '%');
        });
    }

    public function is_active($query)
    {
        return $this->builder->where('is_active', $query);
    }
}
