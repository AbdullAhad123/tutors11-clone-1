<?php

namespace App\Repositories;

use App\Models\AssessmentTest;
use App\Models\AssessmentTestSession;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Jenssegers\Agent\Agent;

class UserAssessmentRepository
{
    /**
     * Get the existing in-completed session
     *
     * @param AssessmentTest $assessment
     * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Relations\HasMany|object|null
     */
    public function getSession(AssessmentTest $assessment)
    {
        return $assessment->sessions()->where('user_id', auth()->user()->id)->latest()->first();
    }

    /**
     * Get the existing in-completed session of a assessment schedule
     *
     * @param AssessmentTest $assessment
     * @param $scheduleId
     * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Relations\HasMany|object|null
     */
    public function getScheduleSession(AssessmentTest $assessment, $scheduleId)
    {
        return $assessment->sessions()->where('user_id', auth()->user()->id)->latest()->first();
    }

    /**
     * Create a new assessment session
     *
     * @param AssessmentTest $assessment
     * @param QuestionRepository $questionRepository
     * @return |null
     */
    public function createSession(AssessmentTest $assessment, QuestionRepository $questionRepository)
    {
        $now = Carbon::now();
        $questions = $assessment->questions()->withPivot('assessment_test_section_id')->with(['questionType:id,name,code'])->get()->groupBy('pivot.assessment_test_section_id');
        $sections = $assessment->assessmentSections()->orderBy('section_order', 'asc')->get();

        $session = AssessmentTestSession::create([
            'assessment_id' => $assessment->id,
            'user_id' => auth()->user()->id,
            'starts_at' => $now->toDateTimeString(),
            'ends_at' => $now->addSeconds($assessment->total_duration)->toDateTimeString(),
            'status' => 'started'
        ]);

        // Attach sections & questions to assessment session
        if($session) {
            $formattedSections = [];
            $formattedQuestions = [];
            $sno = 1;
            $nowTime = Carbon::now();
            foreach ($sections as $section) {
                $formattedSections[$section->id] = [
                    'sno' => $section->section_order,
                    'name' => $section->name,
                    'section_id' => $section->section_id,
                    'status' => $sno == 1 ? 'started' : 'not_visited',
                    'starts_at' => $nowTime->toDateTimeString(),
                    'ends_at' => $nowTime->addSeconds($section->total_duration)->toDateTimeString(),
                ];
                $sno++;

                if($assessment->settings->get('shuffle_questions', false)) {
                    $sectionQuestions = $questions[$section->id]->shuffle();
                } else {
                    $sectionQuestions = $questions[$section->id];
                }

                $qno = 1;
                foreach ($sectionQuestions as $question) {
                    $formattedQuestions[$question->id] = [
                        'sno' => $qno,
                        'original_question' => formatQuestionProperty($question->question, $question->questionType->code),
                        'options' => serialize(formatOptionsProperty($question->options, $question->questionType->code, $question->question)),
                        'correct_answer' => serialize($questionRepository->formatCorrectAnswer($question, [])),
                        'status' => 'not_visited',
                        'assessment_section_id' => $section->id,
                    ];
                    $qno++;
                }
            }
            DB::transaction(function () use($session, $formattedSections, $formattedQuestions) {
                $session->sections()->attach($formattedSections);
                $session->questions()->attach($formattedQuestions);
            });
            return $session;
        }

        return null;
    }

    /**
     * Create a new assessment session for a schedule
     *
     * @param AssessmentTest $assessment
     * @param $schedule
     * @param QuestionRepository $questionRepository
     * @return |null
     */
    public function createScheduleSession(AssessmentTest $assessment, $schedule, QuestionRepository $questionRepository)
    {
        $now = Carbon::now();
        $questions = $assessment->questions()->with(['questionType:id,name,code'])->get();

        if($schedule->schedule_type == 'fixed') {
            $starts_at = $now->toDateTimeString();
            $ends_at = $schedule->ends_at->timezone('UTC')->toDateTimeString();
        } else {
            $starts_at = $now->toDateTimeString();
            $ends_at = $now->addSeconds($assessment->total_duration)->toDateTimeString();
        }

        $session = AssessmentTestSession::create([
            'assessment_id' => $assessment->id,
            'user_id' => auth()->user()->id,
            'starts_at' => $starts_at,
            'ends_at' => $ends_at,
            'status' => 'started',
        ]);

        // Attach questions to assessment session
        if($session) {
            if($assessment->settings->get('shuffle_questions', false)) {
                $questions = $questions->shuffle();
            }
            $formattedQuestions = [];
            $sno = 1;
            foreach ($questions as $question) {
                $formattedQuestions[$question->id] = [
                    'sno' => $sno,
                    'original_question' => formatQuestionProperty($question->question, $question->questionType->code),
                    'options' => serialize(formatOptionsProperty($question->options, $question->questionType->code, $question->question)),
                    'correct_answer' => serialize($questionRepository->formatCorrectAnswer($question, [])),
                    'status' => 'not_visited',
                ];
                $sno++;
            }
            $session->questions()->attach($formattedQuestions);
            return $session;
        }

        return null;
    }

    /**
     * Get AssessmentTest Instructions
     *
     * @param AssessmentTest $assessment
     * @return \string[][]
     */
    public function getInstructions(AssessmentTest $assessment)
    {
        $duration = $assessment->total_duration/60;
        $negativeMarksText= "";

        if($assessment->settings->get('auto_grading', true)) {
            $marks = __('Random');
        } else {
            $marks = $assessment->settings->get('correct_marks');
        }

        $marksText = str_replace("--", $marks ,__('quiz_marks_instruction'));

        if($assessment->settings->get('enable_negative_marking', false)) {
            $negative_marks = $assessment->settings->get('negative_marking_type', 'fixed') == 'fixed'
                ? $assessment->settings->get('negative_marks', 0)
                : $assessment->settings->get('negative_marks', 0)."%";
            $negativeMarksText .= str_replace("--", $negative_marks ,__('negative_marks_text'));
        } else {
            $negativeMarksText .= __('no_negative_marks_text');
        }

        return [
            'assessment' => [
                str_replace("--", $duration ,__('quiz_duration_instruction')),
                str_replace("--", $assessment->total_questions ,__('quiz_questions_instruction')),
                str_replace("--", $assessment->settings->get('cutoff', 0).'%',__('quiz_percentage_instruction')),
            ],
            "standard" => [
                __('quiz_clock_instruction'),
                __('question_navigation_instruction'),
                __('question_save_instruction'),
                __('question_palette_instruction')
            ]
        ];
    }

    /**
     * Get session result object
     *
     * @param $session
     * @param $assessment
     * @return array
     */
    public function sessionResults($session, $assessment)
    {
        $questions = collect($session->questions);
        $answered = $questions->whereIn('pivot.status', ['answered', 'answered_mark_for_review'])->count();
        $correct = $questions->whereIn('pivot.status', ['answered', 'answered_mark_for_review'])->where('pivot.is_correct', '=', true)->count();
        $wrong = $questions->whereIn('pivot.status', ['answered', 'answered_mark_for_review'])->where('pivot.is_correct', '=', false)->count();
        $answered_time = $questions->whereIn('pivot.status', ['answered', 'answered_mark_for_review'])->sum('pivot.time_taken');
        $correctMarks = $questions->whereIn('pivot.status', ['answered', 'answered_mark_for_review'])->sum('pivot.marks_earned');
        $negativeMarks = $questions->whereIn('pivot.status', ['answered', 'answered_mark_for_review'])->sum('pivot.marks_deducted');
        $percentage = $assessment->total_marks != 0 ? round(($correctMarks - $negativeMarks) * (100/$assessment->total_marks), 2) : 0;
        $section_cutoff_cleared = true;
        if($assessment->settings->get('enable_section_cutoff', false)) {
            $failed_count = 0;
            foreach ($session->sections as $section) {
                $results = json_decode($section->pivot->results, true);
                if($results['pass_or_fail'] == 'Failed') {
                    $failed_count++;
                }
            }
            $pass_or_fail = $failed_count > 0 ? 'Failed' : 'Passed';
            $section_cutoff_cleared = $failed_count > 0 ? false : true;
        } else {
            $pass_or_fail = $percentage >= $assessment->settings->get('cutoff') ? 'Passed' : 'Failed';
        }
        $agent = new Agent();
        return [
            'score' => $correctMarks - $negativeMarks,
            'marks_earned' => $correctMarks,
            'marks_deducted' => $negativeMarks,
            'percentage' =>  $percentage,
            'cutoff' => $assessment->settings->get('cutoff'),
            'section_cutoff' => $assessment->settings->get('enable_section_cutoff'),
            'section_cutoff_cleared' => $section_cutoff_cleared,
            'pass_or_fail' => $pass_or_fail,
            'speed' => round(calculateSpeedPerHour($answered, $session->total_time_taken)),//que/hr
            'accuracy' => round(calculateAccuracy($correct, $answered), 2), //%
            'total_questions' => $assessment->total_questions,
            'total_duration' => $assessment->total_duration / 60,
            'total_marks' => $assessment->total_marks,
            'answered_questions' => $answered,
            'unanswered_questions' => $assessment->total_questions - $answered,
            'correct_answered_questions' => $correct,
            'wrong_answered_questions' => $wrong,
            'total_time_taken' => formattedSeconds($session->total_time_taken),
            'time_taken_for_answered' => formattedSeconds($answered_time),
            'time_taken_for_other' => formattedSeconds($session->total_time_taken - $answered_time),
            'time_taken_for_correct_answered' => formattedSeconds($questions->whereIn('pivot.status', ['answered', 'answered_mark_for_review'])->where('pivot.is_correct', '=', true)->sum('pivot.time_taken')),
            'time_taken_for_wrong_answered' => formattedSeconds($questions->whereIn('pivot.status', ['answered', 'answered_mark_for_review'])->where('pivot.is_correct', '=', false)->sum('pivot.time_taken')),
            'user_agent' => $agent->getUserAgent(),
            'ip_address' => request()->getClientIp()
        ];
    }

    /**
     * Get session section result object
     *
     * @param $session
     * @param $assessment
     * @param $section
     * @return array
     */
    public function sectionResults($session, $assessment, $section)
    {
        $questions = $session->questions()->where('assessment_section_id', $section->id)->get();
        $answered = $questions->whereIn('pivot.status', ['answered', 'answered_mark_for_review'])->count();
        $correct = $questions->whereIn('pivot.status', ['answered', 'answered_mark_for_review'])->where('pivot.is_correct', '=', true)->count();
        $wrong = $questions->whereIn('pivot.status', ['answered', 'answered_mark_for_review'])->where('pivot.is_correct', '=', false)->count();
        $answered_time = $questions->whereIn('pivot.status', ['answered', 'answered_mark_for_review'])->sum('pivot.time_taken');
        $correctMarks = $questions->whereIn('pivot.status', ['answered', 'answered_mark_for_review'])->sum('pivot.marks_earned');
        $negativeMarks = $questions->whereIn('pivot.status', ['answered', 'answered_mark_for_review'])->sum('pivot.marks_deducted');
        $percentage = $section->total_marks != 0 ? round(($correctMarks - $negativeMarks) * (100/$section->total_marks), 2) : 0;
        // return $section->pivot->total_time_taken;
        return [
            'score' => $correctMarks - $negativeMarks,
            'marks_earned' => $correctMarks,
            'marks_deducted' => $negativeMarks,
            'percentage' =>  $percentage,
            'cutoff' => $assessment->settings->get('enable_section_cutoff', false) ? $section->section_cutoff : 'No',
            'pass_or_fail' => $assessment->settings->get('enable_section_cutoff', false) ? $percentage >= $section->section_cutoff ? 'Passed' : 'Failed' : 'N/A',
            'speed' => round(calculateSpeedPerHour($answered, $section->pivot->total_time_taken)),//que/hr
            'accuracy' => round(calculateAccuracy($correct, $answered), 2), //%
            'total_questions' => $section->total_questions,
            'total_duration' => $section->total_duration / 60,
            'total_marks' => $section->total_marks,
            'answered_questions' => $answered,
            'unanswered_questions' => $section->total_questions - $answered,
            'correct_answered_questions' => $correct,
            'wrong_answered_questions' => $wrong,
            'total_time_taken' => formattedSeconds($section->pivot->total_time_taken),
            'time_taken_for_answered' => formattedSeconds($answered_time),
            'time_taken_for_other' => formattedSeconds($section->pivot->total_time_taken - $answered_time),
            'time_taken_for_correct_answered' => formattedSeconds($questions->whereIn('pivot.status', ['answered', 'answered_mark_for_review'])->where('pivot.is_correct', '=', true)->sum('pivot.time_taken')),
            'time_taken_for_wrong_answered' => formattedSeconds($questions->whereIn('pivot.status', ['answered', 'answered_mark_for_review'])->where('pivot.is_correct', '=', false)->sum('pivot.time_taken')),
        ];
    }

    /**
     * Get assessment progress links
     *
     * @param $slug
     * @param $session
     * @param $active
     * @return array[]
     */
    public function getAssessmentProgressLinks($slug, $session, $active)
    {
        return [
            [
                'key' => 'analysis',
                'title' => __('Analysis'),
                'url' => route('assessment_results', ['assessment' => $slug, 'session' => $session]),
                'active' => $active == 'assessment_results'
            ],
            [
                'key' => 'solutions',
                'title' => __('Solutions'),
                'url' => route('assessment_solutions', ['assessment' => $slug, 'session' => $session]),
                'active' => $active == 'assessment_solutions'
            ],
            [
                'key' => 'leaderboard',
                'title' => __('Top Scorers'),
                'url' => route('assessment_leaderboard', ['assessment' => $slug, 'session' => $session]),
                'active' => $active == 'assessment_leaderboard'
            ]
        ];
    }
}
