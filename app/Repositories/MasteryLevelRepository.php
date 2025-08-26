<?php

namespace App\Repositories;

use App\Models\Section;

class MasteryLevelRepository
{
    /**
     * Get progress links
     * @param $active
     * @return array[]
     */
    public function getProgressLinks($active)
    {
        $section = Section::all();
        $ProgressLinks = [];
        array_push($ProgressLinks, [
            'key' => 0,
            'title' => 'All',
            'url' => route('parent_mastery_level'),
            'active' => $active == 'mastery-level'
        ],);
        foreach ($section as $value) {
            array_push($ProgressLinks, [
                'key' => $value["id"],
                'title' => $value["name"],
                'url' => route('parent_mastery_level', [
                    "section" => $value["id"]
                ]),
                'active' => $active == "mastery-level?section=".$value["id"]
            ],);
        }
        return $ProgressLinks;
    }
}
