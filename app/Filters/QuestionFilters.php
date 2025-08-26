<?php
/**
 * File name: QuestionFilters.php
 * Last modified: 14/07/21, 4:04 PM
 * Author: NearCraft - https://codecanyon.net/user/nearcraft
 * Copyright (c) 2021
 */

namespace App\Filters;


class QuestionFilters extends QueryFilter
{
    /*
    |--------------------------------------------------------------------------
    | DEFINE ALL COLUMN FILTERS BELOW
    |--------------------------------------------------------------------------
    */

    public function code($query = "")
    {
        return $this->builder->where('code', 'like', '%'.$query.'%');
    }

    public function question($query = "")
    {
        return $this->builder->where('question', 'like', '%'.$query.'%');
    }

    public function questionType($query = 0)
    {
        return $this->builder->where('question_type_id', $query);
    }

    public function section($query = '')
    {
        if ($query !== '') {
            if ($query === 'null') {
                // Filter questions where the related skill or section is soft deleted
                return $this->builder->where(function ($q) {
                    $q->orWhereHas('skill', function ($q) {
                        $q->onlyTrashed();
                    })->orWhereHas('section', function ($q) {
                        $q->onlyTrashed();
                    });
                });
            } else {
                // Filter questions based on section name, including soft deleted sections and skills
                return $this->builder->whereHas('section', function ($q) use ($query) {
                    $q->where('sections.name', 'like', "%{$query}%")->orWhere('sections.name', 'like', "%{$query}%")->onlyTrashed();
                });
            }
        }

        return null;
    }

    public function skill($query = '')
    {
        if ($query !== '') {
            if ($query === 'null') {
                return $this->builder->where(function ($q) {
                    $q->whereNull('skill_id')->orWhereHas('skill', function ($q) {
                        $q->onlyTrashed();
                    });
                });
            } else {
                return $this->builder->whereHas('skill', function ($q) use ($query) {
                    $q->where('name', 'like', "%{$query}%")->orWhere('name', 'like', "%{$query}%")->onlyTrashed();
                });
            }
        }

        return null;
    }

    public function topic($query = '')
    {
        if($query !== '') {
            if ($query === 'null') {
                return $this->builder->where(function ($q) {
                    $q->whereNull('topic_id')->orWhereHas('topic', function ($q) {
                        $q->onlyTrashed();
                    });
                });
            } else {
                return $this->builder->whereHas('topic', function ($q) use ($query) {
                    $q->where('name', 'like', "%{$query}%");
                });
            }
        }
        return null;
    }

    public function solutionChecked($query = '')
    {
        if($query !== '') {
            if ($query === 'null') {
                return $this->builder->whereNull('solution');
            } else if ($query === 'fill') {
                return $this->builder->whereNotNull('solution');
            } else {
                return $this->builder;
            }
        }
        return null;
    }

    public function book($query = '')
    {
        if($query !== '') {
            return $this->builder->whereHas('book', function ($q) use ($query) {
                $q->where('Title', 'like', "%{$query}%");
            });
        }
        return null;
    }

    public function status($query = 0)
    {
        return $this->builder->where('is_active', $query);
    }

    public function difficulty_levels($query = [])
    {
        return $this->builder->whereIn('difficulty_level_id', $query);
    }

    public function question_types($query = [])
    {
        return $this->builder->whereIn('question_type_id', $query);
    }

    public function tags($query = [])
    {
        if($query !== '') {
            return $this->builder->whereHas('tags', function ($q) use ($query) {
                $q->whereIn('tags.id', $query);
            });
        }
        return null;
    }
    public function created_by($query)
    {
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
    public function date($query)
    {
        $dates = explode('-to-', $query);
        if (count($dates) == 2) {
            $start = $dates[0];
            $end = $dates[1];
            if ($start == $end) {
                return $this->builder->whereDate('created_at', $start);
            } else {
                return $this->builder->whereBetween('created_at', [$start, $end]);
            }
        }

        return null;
    }
}
