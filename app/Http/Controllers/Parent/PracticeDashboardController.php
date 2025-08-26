<?php

namespace App\Http\Controllers\Parent;

use App\Http\Controllers\Controller;
use App\Models\Section;
use App\Models\SubCategory;
use App\Models\SubCategorySections;
use App\Repositories\ParentRepository;
use App\Settings\LocalizationSettings;
use App\Transformers\Platform\SubCategoryCardTransformer;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Cookie;
use Inertia\Inertia;

class PracticeDashboardController extends Controller
{
    private LocalizationSettings $localizationSettings;
    private ParentRepository $repository;


    public function __construct(ParentRepository $repository)
    {
        $this->middleware(['role:parent|teacher']);
        $this->repository = $repository;
    }
    /**
     * User's Learn & Practice Screen
     *
     * @return \Inertia\Response
     */
    public function section()
    {
        $successMessage = request('success');
        if (!session()->has("selected_child") || !isset(session("selected_child")["classId"])) {
            return redirect()->route('change_child');
        }
        $sc_id = session("selected_child")["classId"];
        $sub_categories = [];
        $sub_category = SubCategory::find(session("selected_child")["classId"]);
        // foreach ($sub_category as $value) {
        if ($sc_id == $sub_category->id) {
            array_push($sub_categories, ["id" => $sub_category->id, "name" => $sub_category->name, "category" => $sub_category->category->name, "active" => true]);
        } else {
            array_push($sub_categories, ["id" => $sub_category->id, "name" => $sub_category->name, "category" => $sub_category->category->name, "active" => false]);
        }
        // }
        $categories = [];
        $categories = fractal(SubCategory::with(['sections:id,name,code,slug', 'subCategoryType:id,name', 'category:id,name'])
            ->orderBy('name')->find($sc_id), new SubCategoryCardTransformer())->toArray()["data"];
        return view('Parent/Sets/SubCategory', [
            "steps" => $this->repository->getParentSetNavigatorLinks('practices'),
            'categories' => $categories,
            "successMessage" => $successMessage
        ]);
    }
    /**
     * Section's Learn & Practice Screen
     *
     * @param SubCategory $category
     * @param $section
     * @return \Inertia\Response
     */
    public function skill(SubCategory $category, $section)
    {
        $catId = $category->id;
        $child = '';
        if (session()->has("selected_child")) {
            $child = [
                "id" => session("selected_child")["id"],
                "name" => session("selected_child")["name"]
            ];
        }
        $section = Section::with(['skills' => function ($query) use ($catId) {
            $query->withCount(['practiceSets' => function (Builder $builder) use ($catId) {
                $builder->where('is_active', '=', 1)->where('sub_category_id', '=', $catId)->where('custom_set', 0);
            }, 'practiceLessons' => function (Builder $builder) use ($catId) {
                $builder->where('sub_category_id', '=', $catId);
            }, 'practiceVideos' => function (Builder $builder) use ($catId) {
                $builder->where('sub_category_id', '=', $catId);
            }]);
        }])->where('slug', $section)
            ->firstOrFail();
        return view('Parent/PracticeSet/PracticeSection', [
            'category' => $category,
            'section' => $section,
            "childName" => $child['name']
        ]);
    }
}
