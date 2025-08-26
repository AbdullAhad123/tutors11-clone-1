<?php

namespace App\Repositories;
class AttainmentsRepository
{
    /**
     * Get progress links
     * @param $active
     * @return array[]
     */
    public function getProgressLinks($active)
    {
        return [
            [
                'key' => 'exams',
                'title' => __('Exams'),
                'url' => route('exams_attainment'),
                'active' => $active == 'exams_attainment'
            ],
            [
                'key' => 'mocks',
                'title' => __('Mocks'),
                'url' => route('mocks_attainment'),
                'active' => $active == 'mocks_attainment'
            ],
            [
                'key' => 'quiz',
                'title' => __('Quizzes'),
                'url' => route('quiz_attainment'),
                'active' => $active == 'quiz_attainment'
            ],
            [
                'key' => 'practice',
                'title' => __('Practices'),
                'url' => route('practice_attainment'),
                'active' => $active == 'practice_attainment'
            ]
        ];
    }
}
