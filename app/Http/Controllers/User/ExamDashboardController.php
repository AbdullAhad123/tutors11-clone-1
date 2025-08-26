<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\ExamSchedule;
use App\Models\ExamType;
use App\Models\SubCategory;
use App\Models\ExamSession;
use App\Settings\LocalizationSettings;
use App\Transformers\Platform\ExamCardTransformer;
use App\Transformers\Platform\ExamScheduleCardTransformer;
use App\Transformers\Platform\ExamTypeTransformer;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Cookie;
use Inertia\Inertia;

class ExamDashboardController extends Controller
{
    private LocalizationSettings $localizationSettings;

    public function __construct(LocalizationSettings $localizationSettings)
    {
        $this->middleware(['role:guest|student|employee', 'verify.syllabus']);
        $this->localizationSettings = $localizationSettings;
    }

    /**
     * User's Exam Dashboard
     *
     * @return \Inertia\Response
     */
    public function exam()
    {
        if(!session('category_id')){
            return redirect()->route('select_plan');
        }
        $userGroups = auth()->user()->userGroups()->pluck('id');
        $category = SubCategory::find(session('category_id'));
        // Fetch exams scheduled for current user via user groups
        $schedules = ExamSchedule::whereHas('userGroups', function (Builder $query) use ($userGroups) {
            $query->whereIn('user_group_id', $userGroups);
        })->whereHas('exam', function (Builder $query) use ($category) {
            $query->where('sub_category_id', '=', $category->id);
        })->with(['exam' => function($builder) {
            $builder->with(['subCategory:id,name', 'examType:id,name']);
        }])->orderBy('end_date', 'asc')->where('end_date','>=',now()->toDateString())
        ->where('end_time','>',now()->toTimeString())->active()->get();

        // Fetch public exams by exam type
        $examTypes = ExamType::active()->orderBy('name')->get();
        $examSchedules = fractal($schedules, new ExamScheduleCardTransformer())->toArray()['data'];
        $completedCount = 0;
        $startedCount = 0;
        foreach($examSchedules as $key => $examSchedule){
            $session = ExamSession::where('user_id', auth()->user()->id)->where('exam_id', $schedules[$key]->exam_id)->first();
            if($session != null){
                $examSchedules[$key]["status"] = $session->status;
                $examSchedules[$key]["session_code"] = $session->code;
                if($session->status == 'completed'){
                    $completedCount = $completedCount + 1;
                }
            } else {
                $examSchedules[$key]["status"] = "started";
                $examSchedules[$key]["session_code"] = null;
                $startedCount = $startedCount + 1;
            }
        }
        return view('User/ExamDashboard', [
            'completedCount' => $completedCount,
            'startedCount' => $startedCount,
            'examSchedules' => $examSchedules,
            'examTypes' => fractal($examTypes, new ExamTypeTransformer())->toArray()['data'],
            'subscription' => request()->user()->hasActiveSubscription(request()->user()->id)
        ]);
    }

    /**
     * Live Exams Screen
     *
     * @return \Inertia\Response
     */
    public function liveExams()
    {
        if(!session('category_id')){
            return redirect()->route('select_plan');
        }
        $category = SubCategory::find(session('category_id'));
        return view('User/LiveExams', [
            'subscription' => request()->user()->hasActiveSubscription(request()->user()->id)
        ]);
    }

    /**
     * Fetch live exams api endpoint
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function fetchLiveExams()
    {
        if(!session('category_id')){
            return redirect()->route('select_plan');
        }
        $userGroups = auth()->user()->userGroups()->pluck('id');
        $category = SubCategory::find(session('category_id'));

        // Fetch exams scheduled for current user via user groups
        $schedules = ExamSchedule::whereHas('userGroups', function (Builder $query) use ($userGroups) {
            $query->whereIn('user_group_id', $userGroups);
        })->whereHas('exam', function (Builder $query) use ($category) {
            $query->where('sub_category_id', '=', $category->id);
        })->with(['exam' => function($builder) {
            $builder->with(['subCategory:id,name', 'examType:id,name']);
        }])->orderBy('end_date', 'asc')->active()->paginate(10);

        return response()->json([
            'schedules' => fractal($schedules, new ExamScheduleCardTransformer())->toArray()
        ], 200);
    }

    /**
     * Get Exams by type page
     *
     * @param ExamType $type
     * @return \Inertia\Response
     */
    public function examsByType(ExamType $type)
    {
        if(!session('category_id')){
            return redirect()->route('select_plan');
        }
        $category = SubCategory::find(session('category_id'));
        return view('User/ExamsByType', [
            'type' => $type,
            'subscription' => request()->user()->hasActiveSubscription(request()->user()->id)
        ]);
    }

    /**
     * Fetch exams by type
     *
     * @param ExamType $type
     * @return \Illuminate\Http\JsonResponse
     */
    public function fetchExamsByType(ExamType $type)
    {
        if(!session('category_id')){
            return redirect()->route('select_plan');
        }
        $subCategory = SubCategory::find(session('category_id'));

        // Fetch public exams by exam type
        $exams = $type->exams()->has('questions')
            ->where('sub_category_id', '=', $subCategory->id)
            ->orderBy('exams.is_paid', 'asc')
            ->with(['subCategory:id,name', 'examType:id,name'])
            ->isPublic()->published()
            ->paginate(10);
        return response()->json([
            'exams' => fractal($exams, new ExamCardTransformer())->toArray(),
        ], 200);
    }
}
