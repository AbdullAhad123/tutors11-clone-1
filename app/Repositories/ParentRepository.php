<?php
/**
 * File name: UserRepository.php
 * Last modified: 16/07/21, 6:25 PM
 * Author: NearCraft - https://codecanyon.net/user/nearcraft
 * Copyright (c) 2021
 */

namespace App\Repositories;


class ParentRepository
{
    /**
     * Get user my progress links
     *
     * @param $active
     * @return array[]
     */
    public function getProgressNavigatorLinks($active)
    {
        return [
            [
                'key' => 'progress',
                'title' => __('Tests in progress'),
                'url' => route('progress'),
                'active' => $active == 'progress'
            ],
            [
                'key' => 'exams',
                'title' => __('Exam Attempts'),
                'url' => route('exams'),
                'active' => $active == 'exams'
            ],
            [
                'key' => 'mocks',
                'title' => __('Mock Attempts'),
                'url' => route('mocks'),
                'active' => $active == 'mocks'
            ],
            [
                'key' => 'quizzes',
                'title' => __('Quiz Attempts'),
                'url' => route('quizzes'),
                'active' => $active == 'quizzes'
            ],
            [
                'key' => 'practice',
                'title' => __('Practices Sessions'),
                'url' => route('practices'),
                'active' => $active == 'practice'
            ],
            [
                'key' => 'assessment_test',
                'title' => __('Assessment Tests'),
                'url' => route('assessment'),
                'active' => $active == 'assessment'
            ]
        ];
    }
    public function getParentSetNavigatorLinks($active)
    {
        return [
            [
                'key' => 'Practice Sets',
                'title' => __('Practice Sets'),
                'url' => route('parent_set_section'),
                'active' => $active == 'practices'
            ],
            [
                'key' => 'Mock Tests',
                'title' => __('Mock Tests'),
                'url' => route('parent_set_mock_test'),
                'active' => $active == 'mocks'
            ]
        ];
    }

}
