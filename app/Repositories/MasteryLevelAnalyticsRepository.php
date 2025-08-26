<?php

namespace App\Repositories;

use App\Models\PracticeSet;
use App\Models\Skill;

class MasteryLevelAnalyticsRepository
{
    /**
     * Get progress links
     * @param $active
     * @return array[]
     */
    public function getProgressLinks($skill_id,$user_id,$active)
    {
        $practice_set = PracticeSet::where("skill_id",$skill_id)->get();
        $ProgressLinks = [];
        array_push($ProgressLinks, [
            'key' => 0,
            'title' => 'All',
            // 'url' => route('answer_sheet/{'.$skill_id.'}/{'.$user_id.'}'),
            'url' => route("answer_sheet",[
                "s_id"=>$skill_id,
                "u_id"=>$user_id,
            ]),
            // 'active' => $active == 'answer-sheet'
            'active' =>route("answer_sheet",[
                "s_id"=>$skill_id,
                "u_id"=>$user_id
            ])
        ],);
        foreach ($practice_set as $value) {
            array_push($ProgressLinks, [
                'key' => $value["id"],
                'title' => $value["title"],
                // 'url' => 'http://t11.com/answer-sheet/'.$skill_id.'/'.$user_id.'?practiceset='.$value["id"],
                'url' => route("answer_sheet",[
                    "s_id"=>$skill_id,
                    "u_id"=>$user_id,
                    "practiceset"=>$value["id"]
                ]),

                // 'active' => $active == 'answer-sheet/'.$skill_id.'/'.$user_id.'?practiceset='.$value["id"]
                'active' => $active ==  route("answer_sheet",[
                    "s_id"=>$skill_id,
                    "u_id"=>$user_id,
                    "practiceset"=>$value["id"]
                ]),
            ],);
        }
        return $ProgressLinks;
    }
}
