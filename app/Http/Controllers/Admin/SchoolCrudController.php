<?php

namespace App\Http\Controllers\Admin;

use App\Filters\VideoFilters;
use App\Http\Controllers\Controller;
use App\Models\School;
use App\Models\Region;
use App\Filters\SchoolFilters;
use App\Filters\SchoolRegionFilters;
use Illuminate\Http\Request;
use App\Transformers\Admin\SchoolTransformer;
use App\Transformers\Admin\SchoolRegionTransformer;
use Illuminate\Support\Str;
use Inertia\Inertia;

class SchoolCrudController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:admin|instructor']);
    }

    /**
     * Display a listing of the resource.
     *
     * @param SchoolFilters $filters
     * @return \Inertia\Response
     */
    public function index(SchoolFilters $filters)
    {
        return view('Admin/School/Index', [
            'schools' => function () use($filters) {
                return fractal(School::filter($filters)
                    ->paginate(request()->perPage != null ? request()->perPage : 10),
                    new SchoolTransformer())->toArray();
            }
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Inertia\Response
     */
    public function create()
    {
        return view('Admin/School/Create', []);
    }

    public function store(Request $request)
    {
        $admissions = [];
        $calendar = [];
        $academic_selection = [];
        $sample_papers = [];
        $faq = [];
        $admissionsDataCount = count(array_filter($request->all(), function ($key) {
            return strpos($key, 'admissions_value') === 0;
        }, ARRAY_FILTER_USE_KEY));
        $calendarDataCount = count(array_filter($request->all(), function ($key) {
            return strpos($key, 'calendar_value') === 0;
        }, ARRAY_FILTER_USE_KEY));
        $selectionDataCount = count(array_filter($request->all(), function ($key) {
            return strpos($key, 'selection_value') === 0;
        }, ARRAY_FILTER_USE_KEY));
        $samplePaperDataCount = count(array_filter($request->all(), function ($key) {
            return strpos($key, 'sample_paper_name') === 0;
        }, ARRAY_FILTER_USE_KEY));
        $faqDataCount = count(array_filter($request->all(), function ($key) {
            return strpos($key, 'faq_answer') === 0;
        }, ARRAY_FILTER_USE_KEY));
        for ($x = 1; $x <= $admissionsDataCount; $x++) {
            $admissions[$request['admissions_label_'.$x]] = $request['admissions_value_'.$x];
        }
        for ($x = 1; $x <= $calendarDataCount; $x++) {
            $calendar[$request['calendar_label_'.$x]] = $request['calendar_value_'.$x];
        }
        for ($x = 1; $x <= $selectionDataCount; $x++) {
            $academic_selection[$request['selection_label_'.$x]] = $request['selection_value_'.$x];
        }
        for ($x = 1; $x <= $samplePaperDataCount; $x++) {
            $academic_selection[$request['selection_label_'.$x]] = $request['selection_value_'.$x];
            $i = [
                'name' => $request['sample_paper_name_'.$x],
                'link' => $request['sample_paper_link_'.$x],
                'subjects' => $request['sample_paper_subjects_'.$x],
            ];
            array_push($sample_papers, $i);
        }
        for ($x = 1; $x <= $faqDataCount; $x++) {
            $faq[$request['faq_question_'.$x]] = $request['faq_answer_'.$x];
        }

        $schoolImage = time().'.'.$request->image->extension();  
        $schoolLogo = time().'.'.$request->logo->extension();  
        $request->image->move(public_path('images/schools'), 'school_'.$schoolImage);
        $request->logo->move(public_path('images/schools'), 'school_logo_'.$schoolLogo);
        $school_image_path = 'images/schools/school_'.$schoolImage;
        $school_logo_path = 'images/schools/school_logo_'.$schoolLogo;

        $data = [
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'website' => $request->website,
            'phone' => $request->phone,
            'email' => $request->email,
            'type' => $request->type,
            'location' => '['.$request->lat.','.$request->lon.']',
            'address' => $request->address,
            'region' => $request->region,
            'image' => $school_image_path,
            'logo' => $school_logo_path,
            'exam_boards' => $request->exam_boards,
            'exam_styles' => $request->exam_styles,
            'title' => $request->title,
            'keywords' => $request->keywords,
            'description' => $request->description,
            'admission_policy' => isset($request->admission_policy) ? $request->admission_policy : null,
            'admissions' => json_encode($admissions),
            'calendar' => json_encode($calendar),
            'academic_selection' => json_encode($academic_selection),
            'sample_papers' => json_encode($sample_papers),
            'faq' => json_encode($faq),
            'about' => $request->about,
            'term_dates' => $request->term_dates,
            'how_to_apply' => $request->how_to_apply,
            'whats_on_school' => $request->whats_on_school,
            'pass_mark_details' => $request->pass_mark_details,
            'catchment_area_details' => $request->catchment_area_details,
            'admission_criteria_details' => $request->admission_criteria_details
        ];
        School::create($data);
        return redirect()->route('school.index')->with('success','true')->with('message','School created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Inertia\Response
     */
    public function edit($id)
    {
        $school = School::findOrFail($id);
        if($school->location){
            $lat = $school->location ? json_decode($school->location) != null ? json_decode($school->location)[0] : null : null;
            $lon = $school->location ? json_decode($school->location) != null ? json_decode($school->location)[1] : null : null;
        }
        $regions = fractal(Region::all(), new SchoolRegionTransformer())->toArray()['data'];
        return view('Admin/School/Update', [
            'school' => $school,
            'lat' => $lat,
            'lon' => $lon,
            'regions' => $regions
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateVideoRequest $request
     * @param int $id
     * @param TagRepository $tagRepository
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateSchool(Request $request, $id)
    {
        $admissions = [];
        $calendar = [];
        $academic_selection = [];
        $sample_papers = [];
        $faq = [];
        $admissionsDataCount = count(array_filter($request->all(), function ($key) {
            return strpos($key, 'admissions_value') === 0;
        }, ARRAY_FILTER_USE_KEY));
        $calendarDataCount = count(array_filter($request->all(), function ($key) {
            return strpos($key, 'calendar_value') === 0;
        }, ARRAY_FILTER_USE_KEY));
        $selectionDataCount = count(array_filter($request->all(), function ($key) {
            return strpos($key, 'selection_value') === 0;
        }, ARRAY_FILTER_USE_KEY));
        $samplePaperDataCount = count(array_filter($request->all(), function ($key) {
            return strpos($key, 'sample_paper_name') === 0;
        }, ARRAY_FILTER_USE_KEY));

        $faqDataCount = count(array_filter($request->all(), function ($key) {
            return strpos($key, 'faq_answer') === 0;
        }, ARRAY_FILTER_USE_KEY));
        for ($x = 1; $x <= $admissionsDataCount; $x++) {
            $admissions[$request['admissions_label_'.$x]] = $request['admissions_value_'.$x];
        }
        for ($x = 1; $x <= $calendarDataCount; $x++) {
            $calendar[$request['calendar_label_'.$x]] = $request['calendar_value_'.$x];
        }
        for ($x = 1; $x <= $selectionDataCount; $x++) {
            $academic_selection[$request['selection_label_'.$x]] = $request['selection_value_'.$x];
        }
        for ($x = 1; $x <= $samplePaperDataCount; $x++) {
            $academic_selection[$request['selection_label_'.$x]] = $request['selection_value_'.$x];
            $i = [
                'name' => $request['sample_paper_name_'.$x],
                'link' => $request['sample_paper_link_'.$x],
                'subjects' => $request['sample_paper_subjects_'.$x],
            ];
            array_push($sample_papers, $i);
        }
        for ($x = 1; $x <= $faqDataCount; $x++) {
            $faq[$request['faq_question_'.$x]] = $request['faq_answer_'.$x];
        }
        $school = School::findOrFail($id);
        $data = [
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'website' => $request->website,
            'phone' => $request->phone,
            'email' => $request->email,
            'type' => $request->type,
            'location' => '['.$request->lat.','.$request->lon.']',
            'address' => $request->address,
            'region_id' => (int)$request->region,
            'exam_boards' => $request->exam_boards,
            'exam_styles' => $request->exam_styles,
            'title' => $request->title,
            'keywords' => $request->keywords,
            'description' => $request->description,
            'admission_policy' => isset($request->admission_policy) ? $request->admission_policy : null,
            'admissions' => json_encode($admissions),
            'calendar' => json_encode($calendar),
            'academic_selection' => json_encode($academic_selection),
            'sample_papers' => json_encode($sample_papers),
            'faq' => json_encode($faq),
            'about' => $request->about,
            'term_dates' => $request->term_dates,
            'how_to_apply' => $request->how_to_apply,
            'whats_on_school' => $request->whats_on_school,
            'pass_mark_details' => $request->pass_mark_details,
            'catchment_area_details' => $request->catchment_area_details,
            'admission_criteria_details' => $request->admission_criteria_details
        ];
        if(isset($request->image)){
            $schoolImage = time().'.'.$request->image->extension();  
            $request->image->move(public_path('images/schools'), 'school_'.$schoolImage);
            $school_image_path = 'images/schools/school_'.$schoolImage;
            $data['image'] = $school_image_path;
        }
        if(isset($request->logo)){
            $schoolLogo = time().'.'.$request->logo->extension();  
            $request->logo->move(public_path('images/schools'), 'school_logo_'.$schoolLogo);
            $school_logo_path = 'images/schools/school_logo_'.$schoolLogo;
            $data['logo'] = $school_logo_path;
        }
        $school->update($data);
        return redirect()->route('school.index')->with('success','true')->with('message','School updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function removeSchool($id)
    {
        try {
            $school = School::find($id);
            $school->delete();
        }
        catch (\Illuminate\Database\QueryException $e){
            return [
                'success' => false,
                'message' => 'Something went wrong!',
            ];
        }
        return [
            'success' => true,
            'message' => 'School was successfully deleted!',
        ];
    }
}
