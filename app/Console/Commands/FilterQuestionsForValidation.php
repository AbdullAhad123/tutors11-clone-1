<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Question;
use Illuminate\Support\Facades\DB;

class FilterQuestionsForValidation extends Command
{
    protected $signature = 'questions:filter 
                            {--min-priority=5 : Minimum priority score (1-10)}
                            {--issues-only : Only questions with detected issues}
                            {--recent-only : Only questions from last 6 months}
                            {--high-traffic : Only questions with high view counts}
                            {--show-savings : Show potential cost savings}';

    protected $description = 'Filter questions to reduce validation costs by focusing on priority items';

    public function handle()
    {
        $minPriority = $this->option('min-priority');
        $issuesOnly = $this->option('issues-only');
        $recentOnly = $this->option('recent-only');
        $highTraffic = $this->option('high-traffic');
        $showSavings = $this->option('show-savings');

        $this->info("🔍 SMART QUESTION FILTERING");
        $this->info("═══════════════════════════");

        // Get baseline counts
        $totalQuestions = Question::where('is_active', true)->count();
        $this->info("📊 Total Active Questions: " . number_format($totalQuestions));

        // Apply filters and calculate priorities
        $prioritizedQuestions = $this->calculateQuestionPriorities();
        
        $this->displayFilterResults($prioritizedQuestions, $minPriority, $totalQuestions);
        
        if ($showSavings) {
            $this->showCostSavings($prioritizedQuestions, $totalQuestions);
        }

        return 0;
    }

    protected function calculateQuestionPriorities()
    {
        $this->info("🧮 Calculating question priorities...");

        // Complex query to score questions based on multiple factors
        $questions = DB::table('questions')
            ->select([
                'id',
                'created_at',
                'updated_at',
                'total_attempts',
                'avg_time_taken',
                'default_time',
                'question',
                'correct_answer',
                'options',
                'solution',
                'validated',
                'corrected'
            ])
            ->where('is_active', true)
            ->get()
            ->map(function ($question) {
                $priority = $this->calculatePriorityScore($question);
                $issues = $this->detectIssues($question);
                
                return (object) [
                    'id' => $question->id,
                    'priority_score' => $priority,
                    'issues' => $issues,
                    'issue_count' => count($issues),
                    'created_at' => $question->created_at,
                    'total_attempts' => $question->total_attempts ?? 0,
                    'validated' => $question->validated,
                    'needs_validation' => $priority >= 5 || count($issues) > 0
                ];
            });

        return $questions->sortByDesc('priority_score');
    }

    protected function calculatePriorityScore($question)
    {
        $score = 0;

        // Recency (higher score for newer questions)
        $daysSinceCreated = now()->diffInDays($question->created_at);
        if ($daysSinceCreated <= 30) $score += 3;
        elseif ($daysSinceCreated <= 90) $score += 2;
        elseif ($daysSinceCreated <= 180) $score += 1;

        // Usage frequency
        $attempts = $question->total_attempts ?? 0;
        if ($attempts > 100) $score += 3;
        elseif ($attempts > 50) $score += 2;
        elseif ($attempts > 10) $score += 1;

        // Performance indicators
        if ($question->avg_time_taken > 0 && $question->default_time > 0) {
            $timeRatio = $question->avg_time_taken / $question->default_time;
            if ($timeRatio > 2) $score += 2; // Takes much longer than expected
            elseif ($timeRatio < 0.5) $score += 1; // Too fast (might be too easy/confusing)
        }

        // Validation status
        if (!$question->validated) $score += 2;
        if (!$question->corrected) $score += 1;

        // Content length (shorter questions often have issues)
        $questionLength = strlen(strip_tags($question->question ?? ''));
        if ($questionLength < 50) $score += 2;
        elseif ($questionLength > 500) $score += 1;

        return min($score, 10);
    }

    protected function detectIssues($question)
    {
        $issues = [];

        // HTML/formatting issues
        $questionText = $question->question ?? '';
        if (strpos($questionText, '<p><p>') !== false) {
            $issues[] = 'nested_html_tags';
        }
        if (strpos($questionText, 'MathJax') !== false) {
            $issues[] = 'mathjax_remnants';
        }
        if (substr_count($questionText, '<') > 10) {
            $issues[] = 'excessive_html';
        }

        // Answer format issues
        $correctAnswer = $question->correct_answer;
        if (is_array($correctAnswer)) {
            $issues[] = 'array_answer_format';
        }
        if (empty($correctAnswer)) {
            $issues[] = 'missing_answer';
        }

        // Options issues
        $options = $question->options;
        if (is_string($options)) {
            $decoded = json_decode($options, true);
            if (json_last_error() !== JSON_ERROR_NONE) {
                $issues[] = 'invalid_options_json';
            } elseif (count($decoded) < 2) {
                $issues[] = 'insufficient_options';
            } elseif (count($decoded) > 6) {
                $issues[] = 'too_many_options';
            }
        }

        // Solution quality issues
        $solution = $question->solution ?? '';
        if (empty(trim(strip_tags($solution)))) {
            $issues[] = 'missing_solution';
        } elseif (strlen(strip_tags($solution)) < 20) {
            $issues[] = 'short_solution';
        }

        // Grammar/spelling indicators (basic)
        $cleanText = strip_tags($questionText);
        if (preg_match('/\b(teh|recieve|seperate|occured)\b/i', $cleanText)) {
            $issues[] = 'spelling_errors';
        }

        return $issues;
    }

    protected function displayFilterResults($questions, $minPriority, $totalQuestions)
    {
        // Filter by priority
        $highPriority = $questions->where('priority_score', '>=', $minPriority);
        $withIssues = $questions->where('issue_count', '>', 0);
        $needsValidation = $questions->where('needs_validation', true);

        $this->newLine();
        $this->info("📊 FILTERING RESULTS");
        $this->info("══════════════════");

        $this->table(['Filter', 'Count', 'Percentage', 'Cost Reduction'], [
            [
                'All Questions', 
                number_format($totalQuestions), 
                '100%', 
                '$0'
            ],
            [
                "Priority ≥{$minPriority}", 
                number_format($highPriority->count()), 
                round(($highPriority->count() / $totalQuestions) * 100, 1) . '%',
                '$' . number_format($this->calculateSavings($totalQuestions - $highPriority->count()), 0)
            ],
            [
                'With Issues Only', 
                number_format($withIssues->count()), 
                round(($withIssues->count() / $totalQuestions) * 100, 1) . '%',
                '$' . number_format($this->calculateSavings($totalQuestions - $withIssues->count()), 0)
            ],
            [
                'Needs Validation', 
                number_format($needsValidation->count()), 
                round(($needsValidation->count() / $totalQuestions) * 100, 1) . '%',
                '$' . number_format($this->calculateSavings($totalQuestions - $needsValidation->count()), 0)
            ]
        ]);

        // Issue breakdown
        $this->newLine();
        $this->info("🔍 COMMON ISSUES FOUND");
        $this->info("════════════════════");

        $allIssues = $questions->flatMap(function ($q) {
            return $q->issues;
        });

        $issueStats = $allIssues->countBy();
        $issueData = [];
        foreach ($issueStats->sortDesc()->take(10) as $issue => $count) {
            $issueData[] = [
                str_replace('_', ' ', ucwords($issue, '_')),
                number_format($count),
                round(($count / $totalQuestions) * 100, 1) . '%'
            ];
        }

        $this->table(['Issue Type', 'Count', 'Percentage'], $issueData);
    }

    protected function showCostSavings($questions, $totalQuestions)
    {
        $this->newLine();
        $this->info("💰 COST OPTIMIZATION SCENARIOS");
        $this->info("═════════════════════════════");

        $scenarios = [
            [
                'name' => 'Process All (Baseline)',
                'count' => $totalQuestions,
                'cost_per_question' => 0.025, // GPT-4o
                'description' => 'GPT-4o for all questions'
            ],
            [
                'name' => 'Smart Filtering + GPT-3.5',
                'count' => $questions->where('needs_validation', true)->count(),
                'cost_per_question' => 0.003, // GPT-3.5-turbo
                'description' => 'Filter + cheaper model'
            ],
            [
                'name' => 'Issues Only + Mixed Models',
                'count' => $questions->where('issue_count', '>', 0)->count(),
                'cost_per_question' => 0.008, // Mixed average
                'description' => 'Smart model selection'
            ],
            [
                'name' => 'High Priority Only',
                'count' => $questions->where('priority_score', '>=', 7)->count(),
                'cost_per_question' => 0.015, // GPT-4o-mini
                'description' => 'Focus on critical questions'
            ]
        ];

        $scenarioData = [];
        foreach ($scenarios as $scenario) {
            $totalCost = $scenario['count'] * $scenario['cost_per_question'];
            $savings = $scenarios[0]['count'] * $scenarios[0]['cost_per_question'] - $totalCost;
            
            $scenarioData[] = [
                $scenario['name'],
                number_format($scenario['count']),
                '$' . number_format($totalCost, 0),
                '$' . number_format($savings, 0),
                round(($savings / ($scenarios[0]['count'] * $scenarios[0]['cost_per_question'])) * 100, 0) . '%'
            ];
        }

        $this->table([
            'Scenario', 'Questions', 'Total Cost', 'Savings', 'Reduction'
        ], $scenarioData);

        $this->newLine();
        $this->warn("💡 RECOMMENDATION:");
        $this->line("Use 'Smart Filtering + GPT-3.5' for 80-90% cost reduction with minimal quality impact.");
    }

    protected function calculateSavings($questionsSkipped)
    {
        return $questionsSkipped * 0.025; // Assuming $0.025 per question baseline
    }
}