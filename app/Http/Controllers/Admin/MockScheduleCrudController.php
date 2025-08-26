<?php
/**
 * File name: ExamScheduleCrudController.php
 * Last modified: 19/07/21, 12:55 AM
 * Author: NearCraft - https://codecanyon.net/user/nearcraft
 * Copyright (c) 2021
 */

namespace App\Http\Controllers\Admin;

use App\Filters\MockScheduleFilters;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreMockScheduleRequest;
use App\Http\Requests\Admin\UpdateExamScheduleRequest;
use App\Http\Requests\Admin\UpdateMockScheduleRequest;
use App\Models\mocks;
use App\Models\ExamSchedule;
use App\Models\mock_schedules;
use App\Models\UserGroup;
use App\Repositories\MockRepository;
use App\Settings\LocalizationSettings;
use App\Transformers\Admin\MockScheduleTransformer;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class MockScheduleCrudController extends Controller
{
    private MockRepository $repository;

    public function __construct(MockRepository $repository)
    {
        $this->middleware(['role:admin|instructor|parent']);
        $this->repository = $repository;
    }

    /**
     * List all mock schedules of a mock
     *
     * @param $id
     * @param MockScheduleFilters $filters
     * @return \Illuminate\Http\RedirectResponse|\Inertia\Response
     */
    public function index($id, MockScheduleFilters $filters)
    {
        $mock = mocks::findOrFail($id);

        if(!$mock->is_active) {
            return redirect()->back()->with('errorMessage', 'Mock is in draft mode. Kindly publish Mock before scheduling it to users');
        }
        if (Auth::user()->hasRole("admin")) {
            return Inertia::render('Admin/MockSchedules', [
                'mock' => $mock->only(['id', 'title']),
                'steps' => $this->repository->getSteps($mock->id, 'schedules'),
                'editFlag' => true,
                'mockSchedules' => function () use($filters, $mock) {
                    return fractal(mock_schedules::filter($filters)
                        ->with('mock:id,title')
                        ->where('mock_id', $mock->id)
                        ->paginate(request()->perPage != null ? request()->perPage : 10),
                        new MockScheduleTransformer())->toArray();
                },
                'userGroups' => UserGroup::select(['id', 'name'])->active()->get()
            ]);
        }else if (Auth::user()->hasRole("parent")) {
            return Inertia::render('Parent/MockSchedules', [
                'mock' => $mock->only(['id', 'title']),
                'steps' => $this->repository->getSteps($mock->id, 'schedules'),
                'editFlag' => true,
                'mockSchedules' => function () use($filters, $mock) {
                    return fractal(mock_schedules::filter($filters)
                        ->with('mock:id,title')
                        ->where('mock_id', $mock->id)
                        ->paginate(request()->perPage != null ? request()->perPage : 10),
                        new MockScheduleTransformer())->toArray();
                },
                'userGroups' => UserGroup::select(['id', 'name'])->active()->get()
            ]);
        }
    }

    /**
     * Store a mock schedule
     *
     * @param StoreMockScheduleRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreMockScheduleRequest $request)
    {
        $mock = mocks::findOrFail($request->mock_id);
        $schedule = new mock_schedules();

        if($request->schedule_type == 'fixed') {
            $startDate = Carbon::createFromFormat('Y-m-d H:i:s', $request->start_date.' '.$request->start_time);
            $schedule->start_date = $startDate->toDateString();
            $schedule->start_time = $startDate->toTimeString();

            $endDate = $startDate->addSeconds($mock->total_duration);
            $schedule->end_date = $endDate->toDateString();
            $schedule->end_time = $endDate->toTimeString();

            $schedule->grace_period = $request->grace_period;
        }

        if($request->schedule_type == 'flexible') {
            $startDate = Carbon::createFromFormat('Y-m-d H:i:s', $request->start_date.' '.$request->start_time);
            $schedule->start_date = $startDate->toDateString();
            $schedule->start_time = $startDate->toTimeString();

            $endDate = Carbon::createFromFormat('Y-m-d H:i:s', $request->end_date.' '.$request->end_time);
            $schedule->end_date = $endDate->toDateString();
            $schedule->end_time = $endDate->toTimeString();
        }

        $schedule->mock_id = $request->mock_id;
        $schedule->schedule_type = $request->schedule_type;
        $schedule->status = $request->status;
        $schedule->save();

        if($schedule) {
            $schedule->userGroups()->sync($request->user_groups);
        }

        return redirect()->back()->with('successMessage', 'Mock Schedule was successfully added!');
    }

    /**
     * Show a mock schedule
     *
     * @param $id
     * @return array
     */
    public function show($id)
    {
        $mockSchedule = mock_schedules::find($id);
        return fractal($mockSchedule, new MockScheduleTransformer())->toArray();
    }

    /**
     * Edit a mock schedule
     *
     * @param mocks $mock
     * @param $id
     * @param LocalizationSettings $localization
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit(mocks $mock, $id, LocalizationSettings $localization)
    {
        $schedule = mock_schedules::with(['userGroups:id'])->find($id);
        $now = Carbon::now()->timezone($localization->default_timezone);
        $startsIn =  $now->diffInSeconds($schedule->starts_at, false);
        return response()->json([
            'schedule' => $schedule,
            'userGroups' => $schedule->userGroups()->pluck('id'),
            'disableFlag' => $schedule->status == 'expired' || $startsIn < 15
        ]);
    }

    /**
     * Update a mock schedule
     *
     * @param UpdateMockScheduleRequest $request
     * @param mocks $mock
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateMockScheduleRequest $request, mocks $mock, $id)
    {
        $schedule = mock_schedules::with('mock:id,total_duration')->find($id);

        if($schedule->status == 'expired') {
            return redirect()->back()->with('errorMessage', 'You can\'t update once Mock schedule starts or expired. Please create a new schedule.');
        }

        if($schedule->schedule_type == 'fixed') {
            $startDate = Carbon::createFromFormat('Y-m-d H:i:s', $request->start_date.' '.$request->start_time);
            $schedule->start_date = $startDate->toDateString();
            $schedule->start_time = $startDate->toTimeString();

            $endDate = $startDate->addSeconds($schedule->mock->total_duration);
            $schedule->end_date = $endDate->toDateString();
            $schedule->end_time = $endDate->toTimeString();

            $schedule->grace_period = $request->grace_period;
        }

        if($schedule->schedule_type == 'flexible') {
            $startDate = Carbon::createFromFormat('Y-m-d H:i:s', $request->start_date.' '.$request->start_time);
            $schedule->start_date = $startDate->toDateString();
            $schedule->start_time = $startDate->toTimeString();

            $endDate = Carbon::createFromFormat('Y-m-d H:i:s', $request->end_date.' '.$request->end_time);
            $schedule->end_date = $endDate->toDateString();
            $schedule->end_time = $endDate->toTimeString();
        }

        $schedule->status = $request->status;
        $schedule->update();

        if($schedule) {
            $schedule->userGroups()->sync($request->user_groups);
        }

        return redirect()->back()->with('successMessage', 'mock Schedule was successfully updated!');
    }

    /**
     * Delete a mock schedule
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(mocks $mock, $id)
    {
        // dd($mock);
        try {
            $mockSchedule = mock_schedules::find($id);
            $mockSchedule->userGroups()->detach();
            $mockSchedule->secureDelete('sessions');
        }
        catch (\Illuminate\Database\QueryException $e){
            return redirect()->back()->with('errorMessage', 'Unable to Delete Mock Schedule . Remove all associations and Try again!');
        }
        return redirect()->back()->with('successMessage', 'Mock Schedule was successfully deleted!');
    }
}
