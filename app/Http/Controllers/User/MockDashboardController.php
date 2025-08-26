<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\ExamSchedule;
use App\Models\ExamType;
use App\Models\MockTypes;
use App\Models\mock_schedules;
use App\Models\SubCategory;
use App\Settings\LocalizationSettings;
use App\Transformers\Platform\MockCardTransformer;
use App\Transformers\Platform\MockScheduleCardTransformer;
use App\Transformers\Platform\MockTypeTransformer;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Cookie;
use Inertia\Inertia;

class MockDashboardController extends Controller
{
    private LocalizationSettings $localizationSettings;

    public function __construct(LocalizationSettings $localizationSettings)
    {
        $this->middleware(['role:guest|student|employee', 'verify.syllabus']);
        $this->localizationSettings = $localizationSettings;
    }

    /**
     * User's mock Dashboard
     *
     * @return \Inertia\Response
     */
    public function mock()
    {
        $userGroups = auth()->user()->userGroups()->pluck('id');
        $category = SubCategory::find(session('category_id'));

        // Fetch mocks scheduled for current user via user groups
        $schedules = mock_schedules::whereHas('userGroups', function (Builder $query) use ($userGroups) {
            $query->whereIn('user_group_id', $userGroups);
        })->whereHas('mock', function (Builder $query) use ($category) {
            $query->where('sub_category_id', '=', $category->id);
        })->with(['mock' => function($builder) {
            $builder->with(['subCategory:id,name', 'mockType:id,name']);
        }])->orderBy('end_date', 'asc')->active()->limit(4)->get();

        // Fetch public Mock Tests by mock type
        $mockTypes = MockTypes::active()->orderBy('name')->get();
        return Inertia::render('User/MockDashboard', [
            'mockSchedules' => fractal($schedules, new MockScheduleCardTransformer())->toArray()['data'],
            'mockTypes' => fractal($mockTypes, new MockTypeTransformer())->toArray()['data'],
            'subscription' => request()->user()->hasActiveSubscription(request()->user()->id)
        ]);
        // -------------------------------

    }

    /**
     * Live Mocks Screen
     *
     * @return \Inertia\Response
     */
    public function liveMocks()
    {
        $category = SubCategory::find(session('category_id'));
        return Inertia::render('User/LiveMocks', [
            'subscription' => request()->user()->hasActiveSubscription(request()->user()->id)
        ]);
    }

    /**
     * Fetch live exams api endpoint
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function fetchLiveMocks()
    {
        $userGroups = auth()->user()->userGroups()->pluck('id');
        $category = SubCategory::find(session('category_id'));

        // Fetch exams scheduled for current user via user groups
        $schedules = mock_schedules::whereHas('userGroups', function (Builder $query) use ($userGroups) {
            $query->whereIn('user_group_id', $userGroups);
        })->whereHas('mock', function (Builder $query) use ($category) {
            $query->where('sub_category_id', '=', $category->id);
        })->with(['mock' => function($builder) {
            $builder->with(['subCategory:id,name', 'mockType:id,name']);
        }])->orderBy('end_date', 'asc')->active()->paginate(10);

        return response()->json([
            'schedules' => fractal($schedules, new MockScheduleCardTransformer())->toArray()
        ], 200);
    }

    /**
     * Get Exams by type page
     *
     * @param mockTypes $type
     * @return \Inertia\Response
     */
    public function mocksByType(mockTypes $type)
    {
        $category = SubCategory::find(session('category_id'));
        return Inertia::render('User/MocksByType', [
            'type' => $type,
            'subscription' => request()->user()->hasActiveSubscription(request()->user()->id)
        ]);
    }

    /**
     * Fetch exams by type
     *
     * @param mockTypes $type
     * @return \Illuminate\Http\JsonResponse
     */
    public function fetchMocksByType(mockTypes $type)
    {
        $subCategory = SubCategory::find(session('category_id'));
        $mocks = $type->mock()->has('questions')
        ->where('sub_category_id', '=', $subCategory->id)
        ->orderBy('mocks.is_paid', 'asc')
        ->with(['subCategory:id,name', 'mockType:id,name'])
        ->isPublic()->published()
        ->paginate(10);
        return response()->json([
            'mock' => fractal($mocks, new MockCardTransformer())->toArray(),
        ], 200);

    }
}
