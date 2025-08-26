<?php
/**
 * File name: SiteController.php
 * Last modified: 06/07/21, 11:42 AM
 * Author: NearCraft - https://codecanyon.net/user/nearcraft
 * Copyright (c) 2021
 */

namespace App\Http\Controllers;

use App\Models\Feature;
use App\Models\SubCategory;
use App\Models\Section;
use App\Models\Skill;
use App\Models\Topic;
use App\Models\School;
use App\Models\Region;
use App\Models\SubCategorySections;
use App\Models\BlogComment;
use App\Models\Plan;
use App\Models\User;
use App\Settings\HomePageSettings;
use App\Settings\PaymentSettings;
use App\Settings\SiteSettings;
use App\Transformers\Platform\PlanTransformer;
use App\Transformers\Platform\PricingTransformer;
use App\Transformers\Admin\SchoolsTransformer;
use App\Transformers\Admin\ReviewTransformer;
use App\Models\Blog;
use App\Models\Review;
use App\Transformers\Admin\BlogTransformer;
use App\Transformers\Admin\SchoolRegionTransformer;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class SiteController extends Controller
{
    /**
     * Welcome page
     *
     * @param HomePageSettings $homePageSettings
     * @param SiteSettings $siteSettings
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(HomePageSettings $homePageSettings, SiteSettings $siteSettings)
    {

        $features = Feature::orderBy('sort_order')->select('id', 'name')->get();
        $categories = SubCategory::whereHas('plans')->with(['category:id,name', 'plans' => function($query) {
            $query->where('is_active', '=', 1)->orderBy('sort_order')->with('features');
        }])->orderBy('sub_categories.name')->get();
        $plans = [];
        $pricing_categories = fractal($categories, new PricingTransformer($features))->toArray()['data'];
        foreach($pricing_categories as $category) {
            if(count($category['plans']) > 0){
                foreach($category['plans'] as $plan) {
                    $i = [
                        'duration' => $plan['duration'],
                        'total_price' => $plan['total_price']
                    ];
                    array_push($plans, $i);
                }
            }
        }
        return view('store.index', [
            'plans' => $plans,
            'reviews' => Review::select('id', 'name', 'message', 'date', 'rating')->get(),
            'pricing_categories' => $pricing_categories,
            'categories' => $categories,
            'siteSettings' => $siteSettings,
            'homePageSettings' => $homePageSettings
        ]);
    }
    public function subject(HomePageSettings $homePageSettings, SiteSettings $siteSettings, $subject)
    {
        $subject = Section::where('slug', $subject)->first();
        if ($subject) {
            $subject = $subject->only('id', 'name', 'slug', 'short_description', 'icon_path');
            $topics = Skill::select('id', 'name', 'slug', 'short_description')->where('section_id', $subject['id'])->where('is_active', true)->get();
            $section = Section::findOrFail($subject['id']);
            $subject_year = [];
            $sectionFrom  = SubCategorySections::with("section")->where("section_id",$section->id)->first();
                $year = SubCategory::findOrFail($sectionFrom->sub_category_id);
                $topicsArr = [];
                $topics = Skill::select('id', 'name', 'code', 'slug', 'short_description')->where('section_id', $section->id)->get();
                foreach($topics as $topic){
                    $sub_topics = Topic::select('id', 'name', 'code', 'slug', 'short_description')->where('skill_id', $topic->id)->get();
                    if(count($sub_topics) > 0){
                        $t = [
                            'id' => $topic->id,
                            'name' => $topic->name,
                            'code' => $topic->code,
                            'slug' => $topic->slug,
                            'short_description' => $topic->short_description,
                            'sub_topics' => $sub_topics
                        ];
                        array_push($topicsArr, $t);
                    }
                }
                $i = [
                    'section_id' => $section->id,
                    'section_name' => $section->name,
                    'section_slug' => $section->slug,
                    'section_short_description' => $section->short_description,
                    'section_created_at' => Carbon::parse($section->created_at)->format('Y-m-d'),
                    'year_id' => $year->id,
                    'year_name' => $year->name,
                    'year_slug' => $year->slug,
                    'year_short_description' => $year->short_description,
                    'year_description' => $year->description,
                    'topics' => $topicsArr
                ];
                array_push($subject_year, $i);
            
            return view('store.subject',[
                'sections' => $subject_year,
                'subject' => $subject,
                'topics' => $topics,
                'siteSettings' => $siteSettings,
                'homePageSettings' => $homePageSettings,
                'reviews' => Review::select('id', 'name', 'message', 'date', 'rating')->get(),
                'plans' => Plan::select('code', 'name', 'duration', 'price')->get(),
                'total_students' => User::whereHas('roles', function ($query) {$query->where('name', 'student');})->count(),
            ]);
        } else {
            return redirect()->route('welcome');
        }
    }
    public function topic(HomePageSettings $homePageSettings, SiteSettings $siteSettings, $subject_region, $topic_school)
    {
        $subject = Section::where('slug', $subject_region)->first();
        if ($subject) {
            $subject = $subject->only('id', 'name', 'slug', 'short_description', 'icon_path');
            $topic = Skill::where('slug', $topic_school)->where('section_id', $subject['id'])->where('is_active', true)->first();
            if($topic){
                $topic = $topic->only('id', 'name', 'slug', 'short_description');
                $subtopics = Topic::select('id', 'name', 'slug', 'short_description')->where('skill_id', $topic['id'])->where('is_active', true)->get();
                return view('store.topic',[
                    'subject' => $subject,
                    'topic' => $topic,
                    'subtopics' => $subtopics,
                    'siteSettings' => $siteSettings,
                    'homePageSettings' => $homePageSettings
                ]);
            }
        }
        $school = School::where('slug', $topic_school)->first();
        if ($school) {
            $regions = fractal(Region::all(), new SchoolRegionTransformer())->toArray()['data'];
            $lat = json_decode($school->location)[0];
            $lon = json_decode($school->location)[1];
            return view('store.school',[
                'regions' => $regions,
                'school' => $school,
                'lat' => $lat,
                'lon' => $lon,
                'exam_boards' => explode(',', $school->exam_boards),
                'exam_styles' => explode(',', $school->exam_styles),
                'siteSettings' => $siteSettings,
                'homePageSettings' => $homePageSettings
            ]);
        }
        return redirect()->route('welcome');
    }
    public function subTopic(HomePageSettings $homePageSettings, SiteSettings $siteSettings, $subject, $topic, $subtopic)
    {
        $subject = Section::where('slug', $subject)->first();
        if ($subject) {
            $subject = $subject->only('id', 'name', 'slug', 'short_description', 'icon_path');
            $topic = Skill::where('slug', $topic)->where('section_id', $subject['id'])->where('is_active', true)->first();
            if($topic){
                $topic = $topic->only('id', 'name', 'slug', 'short_description');
                $subtopic = Topic::where('slug', $subtopic)->where('skill_id', $topic['id'])->where('is_active', true)->first();
                if($topic){
                    $subtopics = Topic::select('id', 'name', 'slug', 'short_description')->where('skill_id', $topic['id'])->where('is_active', true)->get();
                    $subtopic = $subtopic->only('id', 'name', 'slug', 'short_description');
                        return view('store.subtopic',[
                        'subject' => $subject,
                        'topic' => $topic,
                        'subtopic' => $subtopic,
                        'subtopics' => $subtopics,
                        'siteSettings' => $siteSettings,
                        'homePageSettings' => $homePageSettings
                    ]);
                }
            }
        }
        return redirect()->route('welcome');
    }
    public function school(HomePageSettings $homePageSettings, SiteSettings $siteSettings, $region, $school)
    {
        $regions = [];
        $distinctRegions = School::select('region')->distinct()->groupBy('region')->get();
        foreach($distinctRegions as $distinctRegion){
            $region = Str::of($distinctRegion->region)->slug('-');
            $regions[$distinctRegion->region] = $region;
        }
        $school = School::where('slug', $school)->first();
        $lat = json_decode($school->location)[0];
        $lon = json_decode($school->location)[1];
        return view('store.school',[
            'regions' => $regions,
            'school' => $school,
            'lat' => $lat,
            'lon' => $lon,
            'exam_boards' => explode(',', $school->exam_boards),
            'exam_styles' => explode(',', $school->exam_styles),
            'siteSettings' => $siteSettings,
            'homePageSettings' => $homePageSettings
        ]);
    } 
    public function schoolList(HomePageSettings $homePageSettings, SiteSettings $siteSettings, $page)
    {
        return view('store.school-list', [
            'schools' => fractal(
                School::select('id', 'name', 'slug', 'image', 'logo', 'type', 'region', 'region_id')
                ->with('regionData')
                    ->paginate(request()->perPage != null ? request()->perPage : 9, ['*'], 'page', $page),
                new SchoolsTransformer())->toArray(),
            'siteSettings' => $siteSettings,
            'homePageSettings' => $homePageSettings
        ]);
    }
    public function schoolRegion(HomePageSettings $homePageSettings, SiteSettings $siteSettings, $region)
    {
        $region = Region::where('slug', $region)
        ->with(['schools' => function ($query) {
            $query->select('name', 'slug', 'image', 'logo', 'type', 'region', 'region_id');
            $query->with('regionData:id,name,slug');
        }])
        ->first();
        return view('store.school-region',[
            'schools' => $region->schools,
            'region' => $region,
            'siteSettings' => $siteSettings,
            'homePageSettings' => $homePageSettings
        ]);
    }
    public function about(HomePageSettings $homePageSettings, SiteSettings $siteSettings)
    {
        return view('store.about', [
            'siteSettings' => $siteSettings,
            'homePageSettings' => $homePageSettings
        ]);
    }
    public function detailedJourneyPlanner(HomePageSettings $homePageSettings, SiteSettings $siteSettings)
    {
        return view('store.detailedJourneyPlanner', [
            'siteSettings' => $siteSettings,
            'homePageSettings' => $homePageSettings
        ]);
    }
    public function explorePage(HomePageSettings $homePageSettings, SiteSettings $siteSettings)
    {
        $categories = DB::table('sub_categories')
            ->join('categories', 'sub_categories.category_id', '=', 'categories.id')
            ->select('sub_categories.name', 'sub_categories.slug', 'categories.name as category_name')
            ->where('sub_categories.is_active', '=', 1)
            ->orderBy('sub_categories.name')
            ->get();
        return view('store.explore-page', [
            'categories' => $categories,
            'siteSettings' => $siteSettings,
            'homePageSettings' => $homePageSettings
        ]);
    }
public function help(HomePageSettings $homePageSettings, SiteSettings $siteSettings)
    {
        return view('store.help', [
            'siteSettings' => $siteSettings,
            'homePageSettings' => $homePageSettings
        ]);
    }
    public function contact(HomePageSettings $homePageSettings, SiteSettings $siteSettings)
    {
        return view('store.contact', [
            'siteSettings' => $siteSettings,
            'homePageSettings' => $homePageSettings
        ]);
    }
    public function get_contact(Request $request)
    {
        $contact = DB::insert('insert into contact (name, phone, email, message, date) values (?, ?, ?, ?, now())', [$request->name, $request->phone, $request->email, $request->message]);
        return true;
    }
    public function add_subscribe(Request $request)
    {
        $subscribe = DB::insert('insert into subscribe_emails (email, created_at) values (?, ?)', [$request->email, Carbon::now()]);
        return true;
    }
    public function teachers(HomePageSettings $homePageSettings, SiteSettings $siteSettings)
    {
        return view('store.teachers', [
            'siteSettings' => $siteSettings,
            'homePageSettings' => $homePageSettings
        ]);
    }

    public function blogs(HomePageSettings $homePageSettings, SiteSettings $siteSettings)
    {
        return view('store.blogs', [
            'siteSettings' => $siteSettings,
            'homePageSettings' => $homePageSettings,
            'blogs' => fractal(Blog::paginate(request()
            ->perPage != null ? request()->perPage : 10), 
            new BlogTransformer())->toArray(),
        ]);
    }

    public function getBlog(HomePageSettings $homePageSettings, SiteSettings $siteSettings, $slug)
    {
        $blog = Blog::where('slug', $slug)->first();
        $comments = BlogComment::where('blog_id', $blog->id)->where('is_active', true)->get();
        $author_blogs = Blog::select('id', 'title', 'slug', 'category', 'image', 'author', 'meta_description', 'created_at')->where('author', $blog->author)->inRandomOrder()->take(4)->get();
        $recommended = Blog::select('id', 'title', 'slug', 'category', 'image', 'author', 'meta_description', 'created_at')->where('category', $blog->category)->inRandomOrder()->take(4)->get();
        if ($recommended->isEmpty()) {
            $recommended = Blog::select('id', 'title', 'slug', 'category', 'image', 'author', 'meta_description', 'created_at')->inRandomOrder()->take(4)->get();
        }
        return view('store.getBlog', [
            'siteSettings' => $siteSettings,
            'homePageSettings' => $homePageSettings,
            'blog' => $blog,
            'comments' => $comments,
            'author_blogs' => $author_blogs,
            'recommended' => $recommended
        ]);
    }
    public function sendBlogComment(Request $request, $blog_id)
    {
        $data = [
            'random_color' => 'rgb('.mt_rand(0, 255) . ' ' . mt_rand(0, 255) . ' ' . mt_rand(0, 255).')',
            'blog_id' => $blog_id,
            'comment' => $request->comment,
        ]; 
        if(isset($request->user) && $request->user){
            $data['name'] = $request->user;
            $data['first_letter'] =  substr($request->user, 0, 1);
            $data['email'] = $request->email;
        } else {
            $data['name'] = Auth::user()->first_name. ' ' . Auth::user()->last_name;
            $data['email'] = Auth::user()->email;
            if(Auth::user()->profile_photo_path != 'profile-photos/user-profile-icon.svg') {
                $data['image'] = Auth::user()->profile_photo_path;
            }
            $data['first_letter'] =  substr(Auth::user()->first_name, 0, 1);
        }
        $comment = BlogComment::create($data);
        return [
            'success' => true,
            'comment' => $comment
        ];
    }
    

    public function privacyPolicy(HomePageSettings $homePageSettings, SiteSettings $siteSettings)
    {
        return view('store.privacy-policy', [
            'siteSettings' => $siteSettings,
            'homePageSettings' => $homePageSettings
        ]);
    }

    public function cookiePolicy(HomePageSettings $homePageSettings, SiteSettings $siteSettings)
    {
        return view('store.cookie-policy', [
            'siteSettings' => $siteSettings,
            'homePageSettings' => $homePageSettings
        ]);
    }
    
    public function review(HomePageSettings $homePageSettings, SiteSettings $siteSettings)
    {
        $reviews = fractal(Review::paginate(4), new ReviewTransformer())->toArray();
        $rating_analysis = [
            1 => Review::where('rating', 1)->count()/Review::count()*100 > 0 ? number_format(Review::where('rating', 1)->count()/Review::count()*100) : 0,
            2 => Review::where('rating', 2)->count()/Review::count()*100 > 0 ? number_format(Review::where('rating', 2)->count()/Review::count()*100) : 0,
            3 => Review::where('rating', 3)->count()/Review::count()*100 > 0 ? number_format(Review::where('rating', 3)->count()/Review::count()*100) : 0,
            4 => Review::where('rating', 4)->count()/Review::count()*100 > 0 ? number_format(Review::where('rating', 4)->count()/Review::count()*100) : 0,
            5 => Review::where('rating', 5)->count()/Review::count()*100 > 0 ? number_format(Review::where('rating', 5)->count()/Review::count()*100) : 0,
        ];
        return view('store.reviews', [
            'siteSettings' => $siteSettings,
            'homePageSettings' => $homePageSettings,
            'avg' => number_format(DB::table('reviews')->avg('rating'), 1),
            'rating_analysis' => $rating_analysis,
            'load_more' => Review::count() > 4 ? true : false,
            'reviews' => $reviews
        ]);
    }
    
    public function getReview(HomePageSettings $homePageSettings, SiteSettings $siteSettings, $id)
    {
        $review = Review::findOrFail($id);
        return view('store.review', [
            'siteSettings' => $siteSettings,
            'homePageSettings' => $homePageSettings,
            'review' => $review
        ]);
    }
    
    public function subject_science(HomePageSettings $homePageSettings, SiteSettings $siteSettings)
    {
        $sections = Section::whereRaw('LOWER(name) LIKE ?', ['%'.strtolower('science').'%'])->where('is_active', true)->get();
        $subject_year = [];
        foreach($sections as $section){
            $sectionFrom  = SubCategorySections::with("section")->where("section_id",$section->id)->first();
            $year = SubCategory::findOrFail($sectionFrom->sub_category_id);
            $topicsArr = [];
            $topics = Skill::select('id', 'name', 'code', 'slug', 'short_description')->where('section_id', $section->id)->get();
            foreach($topics as $topic){
                $sub_topics = Topic::select('id', 'name', 'code', 'slug', 'short_description')->where('skill_id', $topic->id)->get();
                if(count($sub_topics) > 0){
                    $t = [
                        'id' => $topic->id,
                        'name' => $topic->name,
                        'code' => $topic->code,
                        'slug' => $topic->slug,
                        'short_description' => $topic->short_description,
                        'sub_topics' => $sub_topics
                    ];
                    array_push($topicsArr, $t);
                }
            }

            $i = [
                'section_id' => $section->id,
                'section_name' => $section->name,
                'section_slug' => $section->slug,
                'section_short_description' => $section->short_description,
                'section_created_at' => Carbon::parse($section->created_at)->format('Y-m-d'),
                'year_id' => $year->id,
                'year_name' => $year->name,
                'year_slug' => $year->slug,
                'year_short_description' => $year->short_description,
                'year_description' => $year->description,
                'topics' => $topicsArr
            ];
            array_push($subject_year, $i);
        }
        usort($subject_year, function($a, $b) {
            return strcmp($a['year_name'], $b['year_name']);
        });
        return view('store.subject-maths', [
            'siteSettings' => $siteSettings,
            'homePageSettings' => $homePageSettings,
            'reviews' => Review::select('id', 'name', 'message', 'date', 'rating')->get(),
            'sections' => $subject_year,
            'plans' => Plan::select('code', 'name', 'duration', 'price')->get(),
            'total_students' => User::whereHas('roles', function ($query) {$query->where('name', 'student');})->count(),
            'subject' => 'science',
        ]);
    }

    public function subject_english(HomePageSettings $homePageSettings, SiteSettings $siteSettings)
    {
        $sections = Section::whereRaw('LOWER(name) LIKE ?', ['%'.strtolower('english').'%'])->where('is_active', true)->get();
        $subject_year = [];
        foreach($sections as $section){
            $sectionFrom  = SubCategorySections::with("section")->where("section_id",$section->id)->first();
            $year = SubCategory::findOrFail($sectionFrom->sub_category_id);
            $topicsArr = [];
            $topics = Skill::select('id', 'name', 'code', 'slug', 'short_description')->where('section_id', $section->id)->get();
            foreach($topics as $topic){
                $sub_topics = Topic::select('id', 'name', 'code', 'slug', 'short_description')->where('skill_id', $topic->id)->get();
                if(count($sub_topics) > 0){
                    $t = [
                        'id' => $topic->id,
                        'name' => $topic->name,
                        'code' => $topic->code,
                        'slug' => $topic->slug,
                        'short_description' => $topic->short_description,
                        'sub_topics' => $sub_topics
                    ];
                    array_push($topicsArr, $t);
                }
            }

            $i = [
                'section_id' => $section->id,
                'section_name' => $section->name,
                'section_slug' => $section->slug,
                'section_short_description' => $section->short_description,
                'section_created_at' => Carbon::parse($section->created_at)->format('Y-m-d'),
                'year_id' => $year->id,
                'year_name' => $year->name,
                'year_slug' => $year->slug,
                'year_short_description' => $year->short_description,
                'year_description' => $year->description,
                'topics' => $topicsArr
            ];
            array_push($subject_year, $i);
        }
        usort($subject_year, function($a, $b) {
            return strcmp($a['year_name'], $b['year_name']);
        });
        return view('store.subject-english', [
            'siteSettings' => $siteSettings,
            'homePageSettings' => $homePageSettings,
            'reviews' => Review::select('id', 'name', 'message', 'date', 'rating')->get(),
            'sections' => $subject_year,
            'plans' => Plan::select('code', 'name', 'duration', 'price')->get(),
            'total_students' => User::whereHas('roles', function ($query) {$query->where('name', 'student');})->count()
        ]);
    }

    public function subject_maths(HomePageSettings $homePageSettings, SiteSettings $siteSettings)
    {
        $sections = Section::whereRaw('LOWER(name) LIKE ?', ['%'.strtolower('maths').'%'])->where('is_active', true)->get();
        $subject_year = [];
        foreach($sections as $section){
            $sectionFrom  = SubCategorySections::with("section")->where("section_id",$section->id)->first();
            $year = SubCategory::findOrFail($sectionFrom->sub_category_id);
            $topicsArr = [];
            $topics = Skill::select('id', 'name', 'code', 'slug', 'short_description')->where('section_id', $section->id)->get();
            foreach($topics as $topic){
                $sub_topics = Topic::select('id', 'name', 'code', 'slug', 'short_description')->where('skill_id', $topic->id)->get();
                if(count($sub_topics) > 0){
                    $t = [
                        'id' => $topic->id,
                        'name' => $topic->name,
                        'code' => $topic->code,
                        'slug' => $topic->slug,
                        'short_description' => $topic->short_description,
                        'sub_topics' => $sub_topics
                    ];
                    array_push($topicsArr, $t);
                }
            }

            $i = [
                'section_id' => $section->id,
                'section_name' => $section->name,
                'section_slug' => $section->slug,
                'section_short_description' => $section->short_description,
                'section_created_at' => Carbon::parse($section->created_at)->format('Y-m-d'),
                'year_id' => $year->id,
                'year_name' => $year->name,
                'year_slug' => $year->slug,
                'year_short_description' => $year->short_description,
                'year_description' => $year->description,
                'topics' => $topicsArr
            ];
            array_push($subject_year, $i);
        }
        usort($subject_year, function($a, $b) {
            return strcmp($a['year_name'], $b['year_name']);
        });
        return view('store.subject-maths', [
            'siteSettings' => $siteSettings,
            'homePageSettings' => $homePageSettings,
            'reviews' => Review::select('id', 'name', 'message', 'date', 'rating')->get(),
            'sections' => $subject_year,
            'plans' => Plan::select('code', 'name', 'duration', 'price')->get(),
            'total_students' => User::whereHas('roles', function ($query) {$query->where('name', 'student');})->count(),
            'subject' => 'maths'
        ]);
    }

    public function subject_verbal_reasoning(HomePageSettings $homePageSettings, SiteSettings $siteSettings)
    {
        $sections = Section::whereRaw('LOWER(name) LIKE ?', ['%'.strtolower('verbal reasoning').'%'])
        ->where(function ($query) {
            $query->whereRaw('LOWER(name) NOT LIKE ?', ['%'.strtolower('non').'%']);
        })
        ->where('is_active', true)
        ->get();
        $subject_year = [];
        foreach($sections as $section){
            $sectionFrom  = SubCategorySections::with("section")->where("section_id",$section->id)->first();
            $year = SubCategory::findOrFail($sectionFrom->sub_category_id);
            $topicsArr = [];
            $topics = Skill::select('id', 'name', 'code', 'slug', 'short_description')->where('section_id', $section->id)->get();
            foreach($topics as $topic){
                $sub_topics = Topic::select('id', 'name', 'code', 'slug', 'short_description')->where('skill_id', $topic->id)->get();
                if(count($sub_topics) > 0){
                    $t = [
                        'id' => $topic->id,
                        'name' => $topic->name,
                        'code' => $topic->code,
                        'slug' => $topic->slug,
                        'short_description' => $topic->short_description,
                        'sub_topics' => $sub_topics
                    ];
                    array_push($topicsArr, $t);
                }
            }

            $i = [
                'section_id' => $section->id,
                'section_name' => $section->name,
                'section_slug' => $section->slug,
                'section_short_description' => $section->short_description,
                'section_created_at' => Carbon::parse($section->created_at)->format('Y-m-d'),
                'year_id' => $year->id,
                'year_name' => $year->name,
                'year_slug' => $year->slug,
                'year_short_description' => $year->short_description,
                'year_description' => $year->description,
                'topics' => $topicsArr
            ];
            array_push($subject_year, $i);
        }
        usort($subject_year, function($a, $b) {
            return strcmp($a['year_name'], $b['year_name']);
        });
        return view('store.subject-verbal', [
            'siteSettings' => $siteSettings,
            'homePageSettings' => $homePageSettings,
            'reviews' => Review::select('id', 'name', 'message', 'date', 'rating')->get(),
            'sections' => $subject_year,
            'plans' => Plan::select('code', 'name', 'duration', 'price')->get(),
            'total_students' => User::whereHas('roles', function ($query) {$query->where('name', 'student');})->count()
        ]);
    }

    public function subject_non_verbal_reasoning(HomePageSettings $homePageSettings, SiteSettings $siteSettings)
    {
        $sections = Section::whereRaw('LOWER(name) LIKE ?', ['%'.strtolower('non verbal reasoning').'%'])->where('is_active', true)->get();
        $subject_year = [];
        foreach($sections as $section){
            $sectionFrom  = SubCategorySections::with("section")->where("section_id",$section->id)->first();
            $year = SubCategory::findOrFail($sectionFrom->sub_category_id);
            $topicsArr = [];
            $topics = Skill::select('id', 'name', 'code', 'slug', 'short_description')->where('section_id', $section->id)->get();
            foreach($topics as $topic){
                $sub_topics = Topic::select('id', 'name', 'code', 'slug', 'short_description')->where('skill_id', $topic->id)->get();
                if(count($sub_topics) > 0){
                    $t = [
                        'id' => $topic->id,
                        'name' => $topic->name,
                        'code' => $topic->code,
                        'slug' => $topic->slug,
                        'short_description' => $topic->short_description,
                        'sub_topics' => $sub_topics
                    ];
                    array_push($topicsArr, $t);
                }
            }

            $i = [
                'section_id' => $section->id,
                'section_name' => $section->name,
                'section_slug' => $section->slug,
                'section_short_description' => $section->short_description,
                'section_created_at' => Carbon::parse($section->created_at)->format('Y-m-d'),
                'year_id' => $year->id,
                'year_name' => $year->name,
                'year_slug' => $year->slug,
                'year_short_description' => $year->short_description,
                'year_description' => $year->description,
                'topics' => $topicsArr
            ];
            array_push($subject_year, $i);
        }
        usort($subject_year, function($a, $b) {
            return strcmp($a['year_name'], $b['year_name']);
        });
        return view('store.subject-non-verbal', [
            'siteSettings' => $siteSettings,
            'homePageSettings' => $homePageSettings,
            'reviews' => Review::select('id', 'name', 'message', 'date', 'rating')->get(),
            'sections' => $subject_year,
            'plans' => Plan::select('code', 'name', 'duration', 'price')->get(),
            'total_students' => User::whereHas('roles', function ($query) {$query->where('name', 'student');})->count()
        ]);
    }

    /**
     * Explore category page
     *
     * @param $slug
     * @param HomePageSettings $homePageSettings
     * @param SiteSettings $siteSettings
     * @param PaymentSettings $paymentSettings
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function explore($slug, HomePageSettings $homePageSettings, SiteSettings $siteSettings, PaymentSettings $paymentSettings)
    {
        $category = SubCategory::with(['plans' => function($query) {
            $query->where('is_active', '=', 1)->orderBy('sort_order')->with('features');
        }])->where('slug', $slug)->firstOrFail();

        $features = Feature::orderBy('sort_order')->get();
        return view('store.explore', [
            'category' => $category->only(['id', 'name', 'headline', 'short_description', 'slug']),
            'least_price' => formatPrice($category->plans->min('price'), $paymentSettings->currency_symbol, $paymentSettings->currency_symbol_position),
            'plans' => fractal($category->plans, new PlanTransformer($features))->toArray()['data'],
            'siteSettings' => $siteSettings,
            'homePageSettings' => $homePageSettings
        ]);  
    }

    public function pricing(HomePageSettings $homePageSettings, SiteSettings $siteSettings)
    {
        $features = Feature::orderBy('sort_order')->get();
        $categories = SubCategory::whereHas('plans')->with(['category:id,name', 'plans' => function($query) {
            $query->where('is_active', '=', 1)->orderBy('sort_order')->with('features');
        }])->orderBy('sub_categories.name')->get();
        return view('store.pricing', [
            'pricing_categories' => fractal($categories, new PricingTransformer($features))->toArray()['data'],
            'selectedCategory' => $categories->count() > 0 ? $categories->first()->code : '',
            'siteSettings' => $siteSettings,
            'homePageSettings' => $homePageSettings
        ]);
    }

}
