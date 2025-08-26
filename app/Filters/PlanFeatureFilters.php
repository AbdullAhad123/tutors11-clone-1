<?php
/**
 * File name: PlanFilters.php
 * Last modified: 30/01/22, 3:01 PM
 * Author: NearCraft - https://codecanyon.net/user/nearcraft
 * Copyright (c) 2022
 */

namespace App\Filters;


class PlanFeatureFilters extends QueryFilter
{
    public function name($query = "")
    {
        return $this->builder->where('name', 'like', '%'.$query.'%');
    }

    public function code($query = "")
    {
        return $this->builder->where('code', 'like', '%'.$query.'%');
    }

    public function description($query = null)
    {
        return $this->builder->where('description', 'like', '%'.$query.'%');
    }

    public function is_active($status = 0)
    {
        return $this->builder->where('is_active', $status);
    }
}
