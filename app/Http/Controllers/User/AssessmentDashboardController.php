<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\AssessmentTest;
use App\Models\AssessmentTestSchedules;
use App\Models\AssessmentTestSession;
use App\Models\AssessmentTestType;
use App\Models\mocks;
use App\Models\MockTypes;
use App\Models\mock_sections;
use App\Models\mock_sessions;
use App\Models\PracticeSession;
use App\Models\Skill;
use App\Models\SubCategory;
use App\Models\SubCategorySections;
use App\Settings\LocalizationSettings;
use App\Transformers\Platform\AssessmentCardTransformer;
use App\Transformers\Platform\ExamCardTransformer; 
use App\Transformers\Platform\AssessmentScheduleCardTransformer;
use App\Transformers\Platform\AssessmentTypeTransformer;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Cookie;
use Inertia\Inertia;
use Mockery\Mock;
use Symfony\Component\Stopwatch\Section;

class AssessmentDashboardController extends Controller
{
    private LocalizationSettings $localizationSettings;

    public function __construct(LocalizationSettings $localizationSettings)
    {
        $this->middleware(['role:guest|student|employee', 'verify.syllabus']);
        $this->localizationSettings = $localizationSettings;
    }

    /**
     * User's Assessment Dashboard
     *
     * @return \Inertia\Response
     */
    public function assessment()
    {
        $loginAt = auth()->user()->login_at;
        $todaysDate = now()->format('Y-m-d');

        $date1 = date_create($loginAt);
        $date2 = date_create($todaysDate);
        $diff = date_diff($date1, $date2);
        if ($diff->format("%a") <= 90) {
            return Inertia::render('User/AssessmentDashboardNoAccess',[message=>""]);
        } else {
            $sections = [];
            // $userGroups = auth()->user()->userGroups()->pluck('id');
            $category = SubCategory::where("id", session('category_id'))->with("sections:id,name,icon_path")->get();
            foreach ($category as $key => $value) {
                foreach ($value->sections as $key => $value1) {
                    $AssessmentTestSession = AssessmentTestSession::where("section_id",$value1->id)->get();
                    if(count($AssessmentTestSession)>9){
                        $start = date_create($AssessmentTestSession[0]->starts_at);
                        $now  =date("Y-m-d");
                        $diff = date_diff(date_create($now),$start);
                        if($diff->format("%a") < 30){
                            array_push($sections, [
                                'id' => $value1->id,
                                'name' => $value1->name,
                                'icon_path' => $value1->icon_path,
                                "lock"=>true,
                                "message"=>"Unlock After 30 days"
                            ]);
                        }else{
                            array_push($sections, [
                                'id' => $value1->id,
                                'name' => $value1->name,
                                'icon_path' => $value1->icon_path,
                                "lock"=>true,
                                "message"=>"You Can Attempt"
                            ]);
                        }
                    }else{
                        array_push($sections, [
                            'id' => $value1->id,
                            'name' => $value1->name,
                            'icon_path' => $value1->icon_path,
                            "lock"=>true,
                            "message"=>"Please Attempt atleast 10 question Sets"
                        ]);
                    }
                    }
                }
            }

            return Inertia::render('User/AssessmentDashboard', [
                'sections' => $sections,
            ]);
        }

    /**
     * Live Assessments Screen
     *
     * @return \Inertia\Response
     */
    public function liveAssessments()
    {
        $category = SubCategory::find(session('category_id'));
        return Inertia::render('User/LiveExams', [
            'subscription' => request()->user()->hasActiveSubscription(request()->user()->id)
        ]);
    }

    /**
     * Fetch live assessments api endpoint
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function fetchLiveAssessments()
    {
        $userGroups = auth()->user()->userGroups()->pluck('id');
        $category = SubCategory::find(session('category_id'));

        // Fetch assessments scheduled for current user via user groups
        $schedules = AssessmentTestSchedules::whereHas('userGroups', function (Builder $query) use ($userGroups) {
            $query->whereIn('user_group_id', $userGroups);
        })->whereHas('assessment', function (Builder $query) use ($category) {
            $query->where('sub_category_id', '=', $category->id);
        })->with([
                'assessment' => function ($builder) {
                    $builder->with(['subCategory:id,name']);
                }
            ])->orderBy('end_date', 'asc')->active()->paginate(10);

        return response()->json([
            'schedules' => fractal($schedules, new AssessmentScheduleCardTransformer())->toArray()
        ], 200);
    }

    /**
     * Get assessments by type page
     *
     * @param AssessmentTestType $type
     * @return \Inertia\Response
     */
    public function assessmentsByType(AssessmentTestType $type)
    {
        // dd($type);
        $category = SubCategory::find(session('category_id'));
        return Inertia::render('User/AssessmentsByType', [
            'type' => $type,
            'subscription' => request()->user()->hasActiveSubscription(request()->user()->id)
        ]);
    }

    /**
     * Fetch assessments by type
     *
     * @param AssessmentTestType $type
     * @return \Illuminate\Http\JsonResponse
     */
    public function fetchAssessmentsByType(AssessmentTestType $type)
    {
        // dd($type);

        $subCategory = SubCategory::find(session('category_id'));

        // Fetch public assessments by assessment type
        $assessments = $type->assessments()->has('questions')
            ->where('sub_category_id', '=', $subCategory->id)
            ->orderBy('assessments.is_paid', 'asc')
            ->with(['subCategory:id,name', 'assessmentType:id,name'])
            ->paginate(10);

        return response()->json([
            'assessments' => fractal($assessments, new AssessmentCardTransformer())->toArray(),
        ], 200);
    }
}
