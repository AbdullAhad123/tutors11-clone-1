<?php

namespace App\Http\Controllers\User;

use App\Filters\LessonFilters;
use App\Http\Controllers\Controller;
use App\Models\Section;
use App\Models\Skill;
use App\Models\SubCategory;
use App\Transformers\User\PracticeVideoTransformer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class PracticeVideoController extends Controller
{
    private int $perPage = 10;

    /**
     * Skill Videos Page
     *
     * @param SubCategory $category
     * @param Section $section
     * @param $skill
     * @return \Inertia\Response
     */
    public function skillVideos(SubCategory $category, Section $section, $skill)
    {
        $skill = Skill::where('slug', $skill)->firstOrFail();
        if (Auth::user()->hasRole(['guest', 'student', 'employee'])) {
            // Inertia::render('User/Practice11Videos'
            return view('User/NoPracticeVideos', [
                'category' => $category,
                'section' => $section,
                'skill' => $skill,
                'subscription' => request()->user()->hasActiveSubscription(request()->user()->id)
            ]);
        }else if (Auth::user()->hasRole("parent")){
            // Inertia::render('Parent/PracticeSet/PracticeVideos'
            return view('User/PracticeVideos', [
                'category' => $category,
                'section' => $section,
                'skill' => $skill,
            ]);
        }
    }
    public function PracticeVideosForApp(SubCategory $category, Section $section, $skill)
    {
        $skill = Skill::where('slug', $skill)->firstOrFail();
        return Inertia::render('User/PracticeVideosForApp', [
            'category' => $category,
            'section' => $section,
            'skill' => $skill,
            'subscription' => request()->user()->hasActiveSubscription(request()->user()->id)
        ]);
    }

    /**
     * Fetch videos of a skill
     *
     * @param Request $request
     * @param SubCategory $category
     * @param Section $section
     * @param $skill
     * @param LessonFilters $filters
     * @return \Illuminate\Http\JsonResponse
     */
    public function fetchPracticeVideos(Request $request, SubCategory $category, Section $section, $skill, LessonFilters $filters)
    {
        $skill = Skill::where('slug', $skill)->firstOrFail();
        $subscription = request()->user()->hasActiveSubscription(request()->user()->id);

        $lessons = fractal($skill->practiceVideos()->filter($filters)->where('sub_category_id', $category->id)
            ->orderBy('videos.is_paid', 'asc')
            ->paginate($this->perPage), new PracticeVideoTransformer($subscription))
            ->toArray();

        return response()->json([
            'videos' => $lessons['data'],
            'pagination' => $lessons['meta']['pagination'],
        ], 200);
    }

    /**
     * Go to Video watch mode
     *
     * @param Request $request
     * @param SubCategory $category
     * @param Section $section
     * @param $skill
     * @return \Inertia\Response
     */
    public function watchVideos(Request $request, SubCategory $category, Section $section, $skill)
    {
        $skill = Skill::where('slug', $skill)->firstOrFail();
        $subscription = request()->user()->hasActiveSubscription(request()->user()->id);
        $currentItem = 1;

        if($request->has('start')) {
            $currentItem = (int) $request->get('start') + 1;
        }

        $index = ceil($currentItem%$this->perPage);

        return view('User/VideoScreen', [
            'category' => $category, 
            'section' => $section,
            'skill' => $skill,
            'currentPage' => ceil($currentItem/$this->perPage),
            'videoIndex' => $index == 0 ? 0 : $index-1,
            'subscription' => $subscription
        ]);
    }
}
