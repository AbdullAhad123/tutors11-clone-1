<?php
/**
 * File name: MockScheduleController.php
 * Last modified: 18/07/21, 12:11 AM
 * Author: NearCraft - https://codecanyon.net/user/nearcraft
 * Copyright (c) 2021
 */

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\mocks;
use App\Models\mock_schedules;
use App\Repositories\QuestionRepository;
use App\Repositories\UserMockRepository;
use App\Settings\LocalizationSettings;
use App\Transformers\Platform\MockDetailTransformer;
use App\Transformers\Platform\MOckScheduleDetailTransformer;
use Carbon\Carbon;
use Inertia\Inertia;

class MockScheduleController extends Controller
{
    private UserMockRepository $repository;
    private QuestionRepository $questionRepository;

    public function __construct(UserMockRepository $repository, QuestionRepository $questionRepository)
    {
        $this->middleware(['role:guest|student|employee']);
        $this->repository = $repository;
        $this->questionRepository = $questionRepository;
    }

    /**
     * Load mock Schedule Instructions Page
     *
     * @param $slug
     * @param $schedule
     * @param LocalizationSettings $localization
     * @return \Inertia\Response
     */
    public function instructions($slug, $schedule, LocalizationSettings $localization)
    {
        $mockSchedule = mock_Schedules::with('userGroups:id,name')->where('code', $schedule)->firstOrFail();

        // Load mock with unfinished sessions
        $mock = mocks::where('slug', $slug)
            ->published()
            ->with(['subCategory:id,name', 'mockType:id,name', 'mockSections:id,mock_id,name,total_questions,total_duration,total_marks'])
            ->withCount(['sessions' => function ($query) use ($mockSchedule) {
                $query->where('user_id', auth()->user()->id)->where('mock_schedule_id', $mockSchedule->id)->where('status', '=', 'started');
            }])
            ->firstOrFail();

        $scheduleUserGroups = $mockSchedule->userGroups()->pluck('id');
        $authUserGroups = auth()->user()->userGroups()->pluck('id');

        // check user exists in mock schedule user groups
        $userHasAccess = count(array_intersect($scheduleUserGroups->toArray(), $authUserGroups->toArray())) > 0;

        // check access is open
        $allowAccess = false;
        $closesAt = '';
        $now = Carbon::now()->timezone($localization->default_timezone);

        if($mockSchedule->schedule_type == 'fixed') {
            $grace = $mockSchedule->starts_at->addMinutes($mockSchedule->grace_period);
            $allowAccess = $now->between($mockSchedule->starts_at, $grace);
            $closesAt = $grace->toDayDateTimeString();
        }

        if($mockSchedule->schedule_type == 'flexible') {
            $allowAccess = $now->between($mockSchedule->starts_at, $mockSchedule->ends_at);
            $closesAt = $mockSchedule->ends_at->toDayDateTimeString();
        }

        if($mockSchedule->status == 'expired' || $mockSchedule->status == 'cancelled') {
            $allowAccess = false;
        }

        // Countdown timer
        $startsIn =  $now->diffInSeconds($mockSchedule->starts_at, false);

        return Inertia::render('User/MockScheduleInstructions', [
            'mock' => fractal($mock, new MockDetailTransformer())->toArray()['data'],
            'schedule' => fractal($mockSchedule, new MOckScheduleDetailTransformer())->toArray()['data'],
            'instructions' => $this->repository->getInstructions($mock),
            'userHasAccess' => $userHasAccess,
            'startsIn' => $startsIn,
            'allowAccess' => $allowAccess,
            'closesAt' => $closesAt,
            'subscription' => request()->user()->hasActiveSubscription(request()->user()->id),
        ]);
    }

    /**
     * Create or Load a mock Session of a schedule and redirect to mock screen
     *
     * @param mocks $mock
     * @param $schedule
     * @param LocalizationSettings $localization
     * @return \Illuminate\Http\RedirectResponse
     */
    public function initExamSchedule(mocks $mock, $schedule, LocalizationSettings $localization)
    {
        $mockSchedule = mock_Schedules::with('userGroups:id,name')->where('code', $schedule)->firstOrFail();
        $subscription = request()->user()->hasActiveSubscription(request()->user()->id);

        // Load completed mock sessions in this schedule
        $mock->loadCount(['sessions' => function ($query) use ($mockSchedule) {
            $query->where('user_id', auth()->user()->id)->where('mock_schedule_id', $mockSchedule->id)->where('status', 'completed');
        }]);

        $scheduleUserGroups = $mockSchedule->userGroups()->pluck('id');
        $authUserGroups = auth()->user()->userGroups()->pluck('id');

        // check user exists in mock schedule user groups
        $userHasAccess = count(array_intersect($scheduleUserGroups->toArray(), $authUserGroups->toArray())) > 0;
        if(!$userHasAccess) {
            return redirect()->back()->with('errorMessage', __('mock_no_access_note'));
        }

        // check access is open
        $allowAccess = false;
        $now = Carbon::now()->timezone($localization->default_timezone);

        if($mockSchedule->schedule_type == 'fixed') {
            $grace = $mockSchedule->starts_at->addMinutes($mockSchedule->grace_period);
            $allowAccess = $now->between($mockSchedule->starts_at, $grace);
        }

        if($mockSchedule->schedule_type == 'flexible') {
            $allowAccess = $now->between($mockSchedule->starts_at, $mockSchedule->ends_at);
        }

        if($mockSchedule->status == 'expired' || $mockSchedule->status == 'cancelled') {
            $allowAccess = false;
        }

        if(!$allowAccess) {
            return redirect()->back()->with('errorMessage', __('schedule_close_note'));
        }

        // Check if any uncompleted sessions
        if($mock->sessions()->where('user_id', auth()->user()->id)->where('status', '=', 'started')->where('mock_schedule_id', $mockSchedule->id)->count() > 0) {
            $session = $this->repository->getScheduleSession($mock, $mockSchedule->id);
        } else {
            // Restrict mock schedule attempt to one time
            if($mock->sessions_count >= 1) {
                return redirect()->back()->with('errorMessage', __('schedule_completed_msg'));
            }

            if($mock->is_paid && !$subscription) {
                // check redeem eligibility
                if($mock->can_redeem) {
                    if(auth()->user()->balance < $mock->points_required) {
                        $msg = __('insufficient_points').' '.str_replace('--', auth()->user()->balance.' XP', __('wallet_balance_text')).' '.str_replace('--',$mock->points_required.' XP',__('required_points_are'));
                        return redirect()->back()->with('errorMessage', $msg);
                    }
                } else {
                    return redirect()->back()->with('errorMessage', __('You don\'t have an active plan to access this mock. Please subscribe.'));
                }
            }

            $session = $this->repository->createScheduleSession($mock, $mockSchedule, $this->questionRepository);

            // deduct wallet points in case of not having a subscription for a paid mock
            if($session) {
                if($mock->is_paid && !$subscription && $mock->can_redeem) {
                    auth()->user()->withdraw($mock->points_required, [
                        'session' => $session->code,
                        'description' => 'Attempt of mock ' . $mock->title,
                    ]);
                }
            }
        }

        return redirect()->route('go_to_mock', ['mock' => $mock->slug, 'session' => $session->code]);
    }
}
