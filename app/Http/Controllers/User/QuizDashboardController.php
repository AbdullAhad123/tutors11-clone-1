<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\QuizSchedule;
use App\Models\QuizType;
use App\Models\SubCategory;
use App\Models\QuizSession;
use App\Settings\LocalizationSettings;
use App\Transformers\Platform\QuizCardTransformer;
use App\Transformers\Platform\QuizScheduleCardTransformer;
use App\Transformers\Platform\QuizTypeTransformer;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Cookie;
use Inertia\Inertia;

class QuizDashboardController extends Controller 
{
    private LocalizationSettings $localizationSettings;

    public function __construct(LocalizationSettings $localizationSettings)
    {
        $this->middleware(['role:guest|student|employee', 'verify.syllabus']);
        $this->localizationSettings = $localizationSettings;
    }

    /**
     * User's Quiz Dashboard
     *
     * @return \Inertia\Response
     */
    public function quiz()
    {
        if(!session('category_id')){
            return redirect()->route('select_plan');
        }
        $userGroups = auth()->user()->userGroups()->pluck('id');
        $category = SubCategory::find(session('category_id'));

        // Fetch quizzes scheduled for current user via user groups
        $schedules = QuizSchedule::whereHas('userGroups', function (Builder $query) use ($userGroups) {
            $query->whereIn('user_group_id', $userGroups);
        })->whereHas('quiz', function (Builder $query) use ($category) {
            $query->where('sub_category_id', '=', $category->id);
        })->with(['quiz' => function($builder) {
            $builder->with(['subCategory:id,name', 'quizType:id,name']);
        }])->orderBy('end_date', 'asc')->where('end_date','>=',now()->toDateString())
        ->active()->get();

        // Fetch public quizzes by quiz type
        $quizTypes = QuizType::active()->orderBy('name')->get();

        $quizSchedules = fractal($schedules, new QuizScheduleCardTransformer())->toArray()['data'];

        $completedCount = 0;
        $startedCount = 0;
        foreach($quizSchedules as $key => $quizSchedule){
            $session = QuizSession::where('user_id', auth()->user()->id)->where('quiz_id', $schedules[$key]->quiz_id)->first();
            if($session != null){
                $quizSchedules[$key]["status"] = $session->status;
                $quizSchedules[$key]["session_code"] = $session->code;
                if($session->status == 'completed'){
                    $completedCount = $completedCount + 1;
                }
            } else {
                $quizSchedules[$key]["status"] = "started";
                $quizSchedules[$key]["session_code"] = null;
                $startedCount = $startedCount + 1;
            }
        }


        return view('User/QuizDashboard', [
            'completedCount' => $completedCount,
            'startedCount' => $startedCount,
            'quizSchedules' => $quizSchedules,
            'quizTypes' => fractal($quizTypes, new QuizTypeTransformer())->toArray()['data'],
            'subscription' => request()->user()->hasActiveSubscription(request()->user()->id)
        ]);
    }

    /**
     * Live Quizzes Screen
     *
     * @return \Inertia\Response
     */
    public function liveQuizzes()
    {
        if(!session('category_id')){
            return redirect()->route('select_plan');
        }
        $category = SubCategory::find(session('category_id'));
        return view('User/LiveQuizzes', [
            'subscription' => request()->user()->hasActiveSubscription(request()->user()->id)
        ]);
    }

    /**
     * Fetch live quizzes api endpoint
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function fetchLiveQuizzes()
    {
        if(!session('category_id')){
            return redirect()->route('select_plan');
        }
        $userGroups = auth()->user()->userGroups()->pluck('id');
        $category = SubCategory::find(session('category_id'));

        // Fetch quizzes scheduled for current user via user groups
        $schedules = QuizSchedule::whereHas('userGroups', function (Builder $query) use ($userGroups) {
            $query->whereIn('user_group_id', $userGroups);
        })->whereHas('quiz', function (Builder $query) use ($category) {
            $query->where('sub_category_id', '=', $category->id);
        })->with(['quiz' => function($builder) {
            $builder->with(['subCategory:id,name', 'quizType:id,name']);
        }])->orderBy('end_date', 'asc')->active()->paginate(10);
        return response()->json([
            'schedules' => fractal($schedules, new QuizScheduleCardTransformer())->toArray()
        ], 200);
    }

    /**
     * Get Quizzes by type page
     *
     * @param QuizType $type
     * @return \Inertia\Response
     */
    public function quizzesByType(QuizType $type)
    {
        if(!session('category_id')){
            return redirect()->route('select_plan');
        }
        $category = SubCategory::find(session('category_id'));
        return view('User/QuizzesByType', [
            'type' => $type,
            'subscription' => request()->user()->hasActiveSubscription(request()->user()->id)
        ]);
    }

    /**
     * Fetch quizzes by type
     *
     * @param QuizType $type
     * @return \Illuminate\Http\JsonResponse
     */
    public function fetchQuizzesByType(QuizType $type)
    {
        if(!session('category_id')){
            return redirect()->route('select_plan');
        }
        $subCategory = SubCategory::find(session('category_id'));

        // Fetch public quizzes by quiz type
        $quizzes = $type->quizzes()->has('questions')
            ->where('sub_category_id', '=', $subCategory->id)
            ->orderBy('quizzes.is_paid', 'asc')
            ->with(['subCategory:id,name', 'quizType:id,name'])
            ->isPublic()->published()
            ->get();

        return response()->json([
            'quizzes' => fractal($quizzes, new QuizCardTransformer())->toArray(),
        ], 200);
    }
}
