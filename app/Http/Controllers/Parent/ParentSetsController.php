<?php

namespace App\Http\Controllers\Parent;

use App\Filters\PracticeSetFilters;
use App\Http\Controllers\Controller;
use App\Models\MockTypes;
use App\Models\mock_schedules;
use App\Models\mocks;
use App\Models\Skill;
use App\Models\SubCategory;
use App\Models\SuggestedMockTest;
use App\Models\SuggestedPracticeSets;
use App\Models\PracticeSet;
use App\Repositories\ParentRepository;
use App\Transformers\Platform\MockCardTransformerForParent;
use App\Transformers\Platform\MockScheduleCardTransformerForParent;
use App\Transformers\Platform\MockTypeTransformer;
use App\Transformers\Platform\PracticeSetCardTransformer;
use App\Transformers\Platform\SubCategoryCardTransformer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Inertia\Inertia;
use Illuminate\Database\Eloquent\Builder;

class ParentSetsController extends Controller
{
    private ParentRepository $repository;
    public function __construct(ParentRepository $repository)
    {
        $this->middleware(['role:parent|teacher']);
        $this->repository = $repository;

    }
    public function mock(Request $request)
    {
        if (!session()->has("selected_child") || !isset(session("selected_child")["classId"])) {
            return redirect()->route('change_child');
        }

        $userGroups = auth()->user()->userGroups()->pluck('id');
        $category = SubCategory::find(session('category_id'));
        $category = session("selected_child")["classId"];
        $category = session("selected_child")["classId"];
        $sub_categories = [];
        $sub_category = SubCategory::find(session("selected_child")["classId"]);
        // Fetch mocks scheduled for current user via user groups
        $schedules = mock_schedules::whereHas('userGroups', function (Builder $query) use ($userGroups) {
            $query->whereIn('user_group_id', $userGroups);
        })->whereHas('mock', function (Builder $query) use ($request) {
            $query->where('sub_category_id', '=', session("selected_child")["classId"]);
        })->with([
                'mock' => function ($builder) {
                    $builder->with(['subCategory:id,name', 'mockType:id,name']);
                }
            ])->orderBy('end_date', 'asc')->active()->limit(4)->get();
        array_push($sub_categories, ["id" => $sub_category->id, "name" => $sub_category->name, "category" => $sub_category->category->name, "active" => false]);
        // Fetch public Mock Tests by mock type
        $mockTypes = MockTypes::active()->whereHas('mock', function (Builder $query) use ($request) {
            $query->where('sub_category_id', '=', session("selected_child")["classId"]);
        })->orderBy('name')->get();

        return Inertia::render('Parent/ParentSetMockTests', [
            "steps" => $this->repository->getParentSetNavigatorLinks('mocks'),
            'mockSchedules' => fractal($schedules, new MockScheduleCardTransformerForParent())->toArray()['data'],
            'mockTypes' => fractal($mockTypes, new MockTypeTransformer())->toArray()['data'],
            'subscription' => request()->user()->hasActiveSubscription(request()->user()->id)
        ]);
        // -------------------------------
    }
     public function liveMocks()
    {
        $category = session("selected_child")["classId"];
        return Inertia::render('Parent/LiveMocks', [
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
        $category = session("selected_child")["classId"];

        // Fetch exams scheduled for current user via user groups
        $schedules = mock_schedules::whereHas('userGroups', function (Builder $query) use ($userGroups) {
            $query->whereIn('user_group_id', $userGroups);
        })->whereHas('mock', function (Builder $query) use ($category) {
            $query->where('sub_category_id', '=', $category);
        })->with(['mock' => function($builder) {
            $builder->with(['subCategory:id,name', 'mockType:id,name']);
        }])->orderBy('end_date', 'asc')->active()->paginate(10);

        return response()->json([
            'schedules' => fractal($schedules, new MockScheduleCardTransformerForParent())->toArray()
        ], 200);
    }
    public function mocksByType(mockTypes $type)
    {
        $category = session("selected_child")["classId"];
        return Inertia::render('Parent/MocksByType', [
            'type' => $type,
            'subscription' => request()->user()->hasActiveSubscription(request()->user()->id)
        ]);
    }
    public function fetchMocksByType(mockTypes $type)
    {
        $category = session("selected_child")["classId"];
        $mocks = $type->mock()->has('questions')
            ->where('sub_category_id', '=', $category)
            ->orderBy('mocks.is_paid', 'asc')
            ->with(['subCategory:id,name', 'mockType:id,name'])
            ->isPublic()->published()
            ->paginate(10);

        return response()->json([
            'mock' => fractal($mocks, new MockCardTransformerForParent() )->toArray(),
        ], 200);

    }
    public function sub_category()
    {
        $child = '';
        if (session()->has("selected_child")) {
            $child = [
                "id" => session("selected_child")["id"],
                "name" => session("selected_child")["name"]
            ];
        }
        return Inertia::render('User/LearnPractice', [
            "steps" => $this->repository->getParentSetNavigatorLinks('practices'),
            'category' => fractal(SubCategory::with(['sections:id,name,code,slug', 'subCategoryType:id,name', 'category:id,name'])
                ->orderBy('name')->find(session('category_id')), new SubCategoryCardTransformer())
                ->toArray()['data'],
            "child" => $child
        ]);
    }
    public function practice(SubCategory $category, $section, $skill, PracticeSetFilters $filters)
    {
        $skill = Skill::where('slug', $skill)->firstOrFail();
        $child = '';

        $sets = fractal($skill->practiceSets()->with('skill:id,name')
            ->where('sub_category_id', $category->id)
            ->where('practice_sets.is_active', '=', 1)
            ->where('custom_set', 0)
            ->orderBy('practice_sets.is_paid', 'asc')
            ->get(), new PracticeSetCardTransformer())
            ->toArray();
        foreach ($sets["data"] as $key => $value) {
            $suggested_practice_sets = SuggestedPracticeSets::where("user_id",auth()->user()->roles[0]->name!="parent"?auth()->user()->id:session("selected_child")["id"])->where("practice_set_id", $value["id"])->get();
            if (count($suggested_practice_sets) > 0) {
                $sets["data"][$key]['already_set'] = true;
            } else {
                $sets["data"][$key]['already_set'] = false;
            }
        }
        if (session()->has("selected_child")) {
            $child = [
                "id" => session("selected_child")["id"],
                "name" => session("selected_child")["name"]
            ];
        }
        return view("Parent/PracticeSet/ParentSetPractices", [
            "practiceSets" => $sets,
            "heading" => "Set Practice",
            "child" => $child['name']
        ]);
    }
    public function mock_settings($m_id, Request $request)
    {
        $custom = false;
        $child = '';

        $mock = mocks::find($m_id);
        session()->flash("mock_add_url",$request->server("HTTP_REFERER"));
        if (isset($request->custom) && $request->custom==1) {
            $custom = true;
        }
        if (session()->has("selected_child")) {
            $child = [
                "id" => session("selected_child")["id"],
                "name" => session("selected_child")["name"]
            ];
        }
        return Inertia::render("Parent/ParentSetMockSetting", [
            "mockId" => $m_id,
            "total_questions" => $mock->total_questions,
            "mockTitle" => $mock->title,
            "custom" => $custom,
            "heading" => "Set Practice",
            "child" => $child
        ]);
    }
    public function practice_settings($p_id, Request $request)
    {
        $custom = false;
        $child = '';
        $practice_set = PracticeSet::find($p_id);
        session()->flash("practice_add_url", $request->server("HTTP_REFERER"));
        if (isset($request->custom) && $request->custom == 1) {
            $custom = true;
        }
        if (session()->has("selected_child")) {
            $child = [
                "id" => session("selected_child")["id"],
                "name" => session("selected_child")["name"]
            ];
        }

        return view("Parent/PracticeSet/ParentSetPracticeSetting", [
            "practiceId" => $p_id,
            "total_questions" => $practice_set->total_questions,
            "practiceTitle" => $practice_set->title,
            "custom" => $custom,
            "heading" => "Set Practice",
            "childName" => $child['name']
        ]);
    }
    public function practice_add(Request $request)
    {
        $request->validate([
            "title"=>"required",
        ]);
        if (session()->has("selected_child") && isset(session("selected_child")["classId"])) {
            $u_id = session("selected_child")["id"];
            $SuggestedPracticeSets = new SuggestedPracticeSets;
            $SuggestedPracticeSets->practice_set_id = $request->practiceId;
            $SuggestedPracticeSets->user_id = $u_id;
            $SuggestedPracticeSets->title = $request->title;
            $SuggestedPracticeSets->due_date = date_format(date_create($request->due_date), "Y-m-d");
            $SuggestedPracticeSets->total_questions = $request->total_questions;
            $SuggestedPracticeSets->save();
            if ((isset($request->custom) && $request->custom == 1) || !session()->has("practice_add_url")) {
                return ["success" => true,"sc_id" => 1];
            }
            return session("practice_add_url");
        } else {
            return redirect()->route('change_child');
        }
    }

    public function mock_add(Request $request)
    {
        $request->validate([
            "title"=>"required",
        ]);
        if (session()->has("selected_child") && isset(session("selected_child")["classId"])) {
            $u_id = session("selected_child")["id"];
            $SuggestedMockTest = new SuggestedMockTest;
            $SuggestedMockTest->mock_test_id = $request->mockId;
            $SuggestedMockTest->user_id = $u_id;
            $SuggestedMockTest->title = $request->title;

            $SuggestedMockTest->due_date = date_format(date_create($request->due_date),"Y-m-d");
            $SuggestedMockTest->total_questions = $request->total_questions;
            $mockQuestions = mocks::with("questions")->find($request->mockId);
            $total_marks = 0;
            for ($i=0; $i < $request->total_questions; $i++) {
                $total_marks += $mockQuestions->questions[$i]->default_marks;
            }
            $SuggestedMockTest->total_marks = $total_marks;
            $SuggestedMockTest->save();
            if ((isset($request->custom) && $request->custom==1) || !session()->has("mock_add_url")) {
                return redirect()->route("parent_set_section",[
                    "sc_id"=>1
                ]);
            }
            return redirect(session("mock_add_url"));
        }else{
            return redirect()->route('change_child');
        }
    }
    public function practice_delete($p_id)
    {
        $SuggestedPracticeSets = SuggestedPracticeSets::where("practice_set_id", $p_id);
        $SuggestedPracticeSets->delete();
        return redirect()->back();
    }
    public function mock_delete($m_id)
    {

        $SuggestedMockTest = SuggestedMockTest::where("mock_test_id",$m_id);
        $SuggestedMockTest->delete();
        return redirect()->back();
    }
}

?>
