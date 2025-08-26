<?php
/**
 * File name: UserFilters.php
 * Last modified: 01/02/21, 12:19 PM
 * Author: NearCraft - https://codecanyon.net/user/nearcraft
 * Copyright (c) 2021
 */

namespace App\Filters;


class UserFilters extends QueryFilter
{
    /*
    |--------------------------------------------------------------------------
    | DEFINE ALL COLUMN FILTERS BELOW
    |--------------------------------------------------------------------------
    */

    public function fullName($query = "")
    {
        return $this->builder->where('first_name', 'like', '%'.$query.'%')
            ->orWhere('last_name', 'like', '%'.$query.'%');
    }

    public function firstName($query = "")
    {
        return $this->builder->where('first_name', 'like', '%'.$query.'%');
    }

    public function lastName($query = "")
    {
        return $this->builder->where('last_name', 'like', '%'.$query.'%');
    }

    public function userName($query = "")
    {
        return $this->builder->where('user_name', 'like', '%'.$query.'%');
    }

    public function mobile($query = "")
    {
        return $this->builder->where('mobile', 'like', '%'.$query.'%');
    }

    public function email($query = "")
    {
        return $this->builder->where('email', 'like', '%'.$query.'%');
    }

    public function ipAddress($query = "")
    {
        return $this->builder->where('ip_address', $query);
    }

    public function role($query = "")
    {
        return $this->builder->role($query);
    }

    public function status($status = 0)
    {
        return $this->builder->where('is_active', $status);
    }
    
    public function lastSeen($timeFrame = "")
    {
        $query = now();
        
        // Apply the appropriate filtering based on the timeframe
        switch ($timeFrame) {
            case '7d':
                $this->builder->where('last_seen', '>=', $query->subDays(7));
                break;
            case '15d':
                $this->builder->where('last_seen', '>=', $query->subDays(15));
                break;
            case '30d':
                $this->builder->where('last_seen', '>=', $query->subDays(30));
                break;
            case '1m':
                $this->builder->where('last_seen', '>=', $query->subMonths(1));
                break;
            case '2m':
                $this->builder->where('last_seen', '>=', $query->subMonths(2));
                break;
            case '3m':
                $this->builder->where('last_seen', '>=', $query->subMonths(3));
                break;
            case '6m':
                $this->builder->where('last_seen', '>=', $query->subMonths(6));
                break;
            case '1y':
                $this->builder->where('last_seen', '>=', $query->subYear());
                break;
            case '2y':
                $this->builder->where('last_seen', '>=', $query->subYears(2));
                break;
            case 'since_start_of_year':
                $this->builder->where('last_seen', '>=', $query->startOfYear());
                break;
            case '14w':
                $this->builder->where('last_seen', '>=', $query->subWeeks(14));
                break;
            case 'true':
                // This case does not apply a date filter, so we order directly
                return $this->builder->orderByRaw('last_seen IS NULL, last_seen DESC');
            default:
                return $this->builder; // No filter applied
        }
        
        // Apply ordering for all cases
        return $this->builder->orderBy('last_seen', 'DESC');
    }

}
