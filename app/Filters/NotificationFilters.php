<?php
/**
 * File name: PlanFilters.php
 * Last modified: 30/01/22, 3:01 PM
 * Author: NearCraft - https://codecanyon.net/user/nearcraft
 * Copyright (c) 2022
 */

namespace App\Filters;


class NotificationFilters extends QueryFilter
{
    public function sms($query = "")
    {
        return $this->builder->where('sms', 'like', '%'.$query.'%');
    }

    public function email($query = "")
    {
        return $this->builder->where('email', 'like', '%'.$query.'%');
    }

    public function title($query = null)
    {
        return $this->builder->where('title', '=', $query);
    }
    public function message($query = null)
    {
        return $this->builder->where('message', '=', $query);
    }
}
