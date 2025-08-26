<?php

namespace App\Repositories;

class CurriculumRepository
{
    /**
     * Get progress links
     * @param $active
     * @return array[]
     */
    public function getProgressLinks($sub_category_id, $user_id, $active)
    {

        return [
            [
                'key' => 1,
                'title' => 'Exams',
                'url' => route("curriculum_exam"),
                'active' => route("curriculum_exam") == $active
            ],
            [
                'key' => 1,
                'title' => 'Mocks',
                'url' => route("curriculum_mock"),
                'active' => route("curriculum_mock") == $active
            ],
            [
                'key' => 2,
                'title' => 'Pracrices',
                'url' => route("curriculum_practice"),
                'active' => route("curriculum_practice") == $active
            ],
            [
                'key' => 3,
                'title' => 'Quizzes',
                'url' => route("curriculum_quiz"),
                'active' => route("curriculum_quiz") == $active
            ]
        ];
    }
}
