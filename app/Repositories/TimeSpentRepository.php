<?php

namespace App\Repositories;
class TimeSpentRepository
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
                'key' => 'overall',
                'title' => __('Overall'),
                'url' => route('overall_time'),
                'active' => $active == 'overall_time'
            ],
            [
                'key' => 'exam',
                'title' => __('Exams'),
                'url' => route('exams_time'),
                'active' => $active == 'exams_time'
            ],
            [
                'key' => 'mock',
                'title' => __('Mocks'),
                'url' => route('mocks_time'),
                'active' => $active == 'mocks_time'
            ],
            [
                'key' => 'quiz',
                'title' => __('Quizzes'),
                'url' => route('quiz_time'),
                'active' => $active == 'quiz_time'
            ],
            [
                'key' => 'practice',
                'title' => __('Practices'),
                'url' => route('practice_time'),
                'active' => $active == 'practice_time'
            ]
        ];
    }
}
