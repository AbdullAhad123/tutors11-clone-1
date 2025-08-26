<?php
/**
 * File name: DashboardController.php
 * Last modified: 19/07/21, 12:55 AM
 * Author: NearCraft - https://codecanyon.net/user/nearcraft
 * Copyright (c) 2021
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PracticeSet;
use App\Models\JourneySet;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\Exam;
use App\Models\User;
use Inertia\Inertia;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:admin']);
    }

    /**
     * Admin dashboard statistics
     *
     * @return \Inertia\Response
     */
    public function index()
    {
        // Get the date 30 days ago from today
        $thirtyDaysAgo = Carbon::now()->subDays(30);

        // Count active users with the 'student' role who have been active within the last 30 days
        $total_students = User::where('is_active', true)
            ->whereHas('roles', function($query) {
                $query->where('roles.name', 'like', '%student%');
            })
            ->whereBetween('last_seen', [$thirtyDaysAgo, Carbon::now()])
            ->count();

        // Count active users with the 'parent' role who have been active within the last 30 days
        $total_parents = User::where('is_active', true)
            ->whereHas('roles', function($query) {
                $query->where('roles.name', 'like', '%parent%');
            })
            ->whereBetween('last_seen', [$thirtyDaysAgo, Carbon::now()])
            ->count();

        $stats = [
            [
                'key' => 'total_registered_users',
                'slug' => 'users',
                'title' => 'Total Registered Users',
                'count' => User::active()->count()
            ],
            [
                'key' => 'total_questions_uploaded',
                'slug' => 'questions',
                'title' => 'Total Questions Uploaded',
                'count' => Question::active()->count()
            ],
            [
                'key' => 'total_approve_questions',
                'slug' => 'approved-qustion',
                'title' => 'Total Questions Approved',
                'count' => Question::where('approve_status', true)->active()->count()
            ],
            [
                'key' => 'total_rejected_questions',
                'slug' => 'not-approved-qustion',
                'title' => 'Total Questions Rejected',
                'count' => Question::where('approve_status', false)->active()->count()
            ],
            [
                'key' => 'total_quiz_sessions',
                'slug' => 'quizzes',
                'title' => 'Total Quiz Sessions',
                'count' => Quiz::published()->count()
            ],
            [
                'key' => 'total_practice_sets',
                'slug' => 'practice-sets',
                'title' => 'Total Practice Sets',
                'count' => PracticeSet::published()->count()
            ],
            [
                'key' => 'total_journey_sets',
                'slug' => 'journeys',
                'title' => 'Total Journey Sets',
                'count' => JourneySet::published()->count()
            ],
            [
                'key' => 'total_exam_sessions',
                'slug' => 'exams',
                'title' => 'Total Exam Sessions',
                'count' => Exam::published()->count()
            ]
        ];
        return view('Admin/Dashboard', [
            'stats' => $stats,
            'total_students' => $total_students, 
            'total_parents' => $total_parents
        ]);
    }
}
