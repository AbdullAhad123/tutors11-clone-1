<?php
namespace App\Repositories;
 class QuestionsAnalysisRepository{
    public function getProgressLinks($active)
    {
        return [
            [
                'key' => 'exams',
                'title' => __('Exams'),
                'url' => route('exams_question_analysis'),
                'active' => $active == 'exams_question_analysis'
            ],
            [
                'key' => 'mocks',
                'title' => __('Mocks'),
                'url' => route('mocks_question_analysis'),
                'active' => $active == 'mocks_question_analysis'
            ],
            [
                'key' => 'quizzes',
                'title' => __('Quizzes'),
                'url' => route('quizzes_question_analysis'),
                'active' => $active == 'quizzes_question_analysis'
            ],
            [
                'key' => 'practices',
                'title' => __('Practices'),
                'url' => route('practices_question_analysis'),
                'active' => $active == 'practices_question_analysis'
            ],
        ];
    }
 }
?>
