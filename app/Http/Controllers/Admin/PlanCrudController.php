<?php
/**
 * File name: PlanCrudController.php
 * Last modified: 19/07/21, 12:55 AM
 * Author: NearCraft - https://codecanyon.net/plan/nearcraft
 * Copyright (c) 2021
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Filters\PlanFilters;
use App\Filters\PlanFeatureFilters;
use App\Http\Requests\Admin\StorePlanRequest;
use App\Http\Requests\Admin\StorePlanFeatureRequest;
use App\Http\Requests\Admin\UpdatePlanRequest;
use App\Http\Requests\Admin\UpdatePlanFeatureRequest;
use App\Models\Feature;
use App\Models\Plan;
use App\Models\SubCategory;
use App\Transformers\Admin\PlanSearchTransformer;
use App\Transformers\Admin\PlanTransformer;
use App\Transformers\Platform\PlanFeatureTransformer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

class PlanCrudController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:admin']);
    }

    /**
     * List all plans
     *
     * @param PlanFilters $filters
     * @return \Inertia\Response
     */
    public function index(PlanFilters $filters)
    {
        return view('Admin/Plans', [
            'plans' => function () use($filters) {
                return fractal(Plan::with('category:id,name')->filter($filters)
                ->paginate(request()->perPage != null ? request()->perPage : 10),
		               new PlanTransformer())->toArray();
		          },
            'features' => Feature::select(['id', 'name'])->active()->get(),
            'subCategories' => SubCategory::select(['id', 'name'])->active()->get()
        ]);
    }

    public function features(PlanFeatureFilters $filters)
    {
        return view('Admin/PlansFeature/Index', [
            'features' => Feature::select(['id', 'name', 'code', 'description', 'is_active'])->get(),
        ]);
    }
    public function createFeature()
    {
        return view('Admin/PlansFeature/Create');
    }
    

    /**
     * Search users api endpoint
     *
     * @param Request $request
     * @param PlanFilters $filters
     * @return \Illuminate\Http\JsonResponse
     */
    public function search(Request $request, PlanFilters $filters)
    {
        $query = $request->get('query');
        return response()->json([
            'plans' => fractal(Plan::filter($filters)
                ->where('name', 'like', '%'.$query.'%')->limit(20)
                ->get(), new PlanSearchTransformer())
                ->toArray()['data']
        ]);
    }

    /**
     * Store an plan
     *
     * @param StorePlanRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StorePlanRequest $request)
    {
        $data = $request->all();
        $data['category_id'] = (int)$data['category_id'];
        $data['duration'] = (int)$data['duration'];
        $data['price'] = (int)$data['price'];
        $data['sort_order'] = (int)$data['sort_order'];
        $data['has_discount'] = $data['has_discount']=='true'?true:false;
        $data['feature_restrictions'] = $data['feature_restrictions']=='true'?true:false;
        $data['is_active'] = $data['is_active']=='true'?true:false;
        $data['is_popular'] = $data['is_popular']=='true'?true:false;
        $data['is_yearly'] = $data['is_yearly']=='true'?true:false;
        if($data['has_discount']){
            $data['discount_percentage'] = (int)$data['discount_percentage'];
        } else {
            $data['discount_percentage'] = 0;
        }
        if(isset($data['features'])){
            $count_items = count($data['features']);
            for($i = 0; $i<$count_items; $i++)
            {
                $data['features'][$i] = (int)$data['features'][$i];
            }
        } else {
            $data['features'] = array();
        }
        $plan = Plan::create($data);
        if($plan) {
            if($plan->feature_restrictions) {
                $plan->features()->sync($data['features']);
            } else {
                $plan->features()->sync(Feature::active()->pluck('id'));
            }
        }
        return [
            'success' => true,
            'message' => 'Plan was successfully added!',
        ];
    }

    public function addFeature(StorePlanFeatureRequest $request){
        $data = $request->all();
        $data['is_active'] = $data['is_active']=='true'?true:false;
        $feature = Feature::create($data);
        return [
            'success' => true,
            'message' => 'Plan was successfully added!',
        ];
    }
    public function editFeature($id)
    {
        $feature = Feature::find($id);
        return view('Admin/PlansFeature/Update', [
            'feature' => $feature
        ]);
    }


    /**
     * Show an plan
     *
     * @param $id
     * @return array
     */
    public function show($id)
    {
        $plan = Plan::find($id);
        return fractal($plan, new PlanTransformer())->toArray();
    }

    /**
     * Edit an plan
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit($id)
    {
        $plan = Plan::find($id);
        $subCategories = SubCategory::find($plan->category_id);
        return view('Admin/Plans/Update', [
            'plan' => $plan,
            'features' => Feature::select(['id', 'name'])->active()->get(),
            'selected_features' => $plan->features()->pluck('id', 'name'),
            'features_ids' => $plan->features()->pluck('id'),
            'category' => $subCategories->only(['id', 'name'])
        ]);
    }

    /**
     * Update an plan
     *
     * @param UpdatePlanRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdatePlanRequest $request, $id)
    {
        if(config('tutor11.demo_mode')) {
            return redirect()->back()->with('errorMessage', 'Demo Mode! Plans can\'t be changed.');
        }

        $plan = Plan::find($id);
        $data = $request->all();        
        $data['category_id'] = $plan->category_id;
        $data['duration'] = (int)$data['duration'];
        $data['price'] = (int)$data['price'];
        $data['sort_order'] = (int)$data['sort_order'];
        $data['has_discount'] = $data['has_discount']=='true'?true:false;
        $data['feature_restrictions'] = $data['feature_restrictions']=='true'?true:false;
        $data['is_active'] = $data['is_active']=='true'?true:false;
        $data['is_popular'] = $data['is_popular']=='true'?true:false;
        $data['is_yearly'] = $data['is_yearly']=='true'?true:false;
        if($data['has_discount']){
            $data['discount_percentage'] = (int)$data['discount_percentage'];
        } else {
            $data['discount_percentage'] = 0;
        }
        if(isset($data['features'])){
            $count_items = count($data['features']);
            for($i = 0; $i<$count_items; $i++)
            {
                $data['features'][$i] = (int)$data['features'][$i];
            }
        } else {
            $data['features'] = array();
        }
        $plan->update($data);

        if($plan->feature_restrictions) {
            $plan->features()->sync($request->features);
        } else {
            $plan->features()->sync(Feature::active()->pluck('id'));
        }
        return [
            'success' => true,
            'message' => 'Plan was successfully updated!',
        ];
    }
    public function updateFeature($id, UpdatePlanFeatureRequest $request){
        $feature = Feature::find($id);
        $data = $request->all(); 
        $data['is_active'] = $data['is_active']=='true'?true:false;
        $feature->update($data);

        return [
            'success' => true,
            'message' => 'Feature was successfully updated!',
        ];
    }

    /**
     * Delete an plan
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        if(config('tutor11.demo_mode')) {
            return redirect()->back()->with('errorMessage', 'Demo Mode! Plans can\'t be deleted.');
            return [
                'success' => false,
                'message' => 'Demo Mode! Plans can\'t be deleted!',
            ];
        }

        try {
            $plan = Plan::find($id);

            if(!$plan->canSecureDelete('subscriptions', 'payments')) {
                return [
                    'success' => false,
                    'message' => 'Unable to Delete Plan! Subscriptions or Payments Exist.',
                ];
            }

            $plan->secureDelete('subscriptions', 'payments');
        }
        catch (\Illuminate\Database\QueryException $e){
            return [
                'success' => false,
                'message' => 'Unable to Delete Plan . Remove all associations and Try again!',
            ];
        }
        return [
            'success' => true,
            'message' => 'Plan was successfully deleted!',
        ];
    }
    public function deleteFeature($id)
    {
        if(config('tutor11.demo_mode')) {
            return redirect()->back()->with('errorMessage', 'Demo Mode! Plans can\'t be deleted.');
            return [
                'success' => false,
                'message' => 'Demo Mode! Plans can\'t be deleted!',
            ];
        }

        try {
            $feature = Feature::find($id);

            if(!$feature->canSecureDelete()) {
                return [
                    'success' => false,
                    'message' => 'Unable to Delete Plan! Subscriptions or Payments Exist.',
                ];
            }

            $feature->secureDelete();
        }
        catch (\Illuminate\Database\QueryException $e){
            return [
                'success' => false,
                'message' => 'Unable to Plan Feature. Remove all associations and Try again!',
            ];
        }
        return [
            'success' => true,
            'message' => 'Plan Feature was successfully deleted!',
        ];
    }
}
