<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        Schools - Manage Schools - 
        @if(Auth::user()->hasRole('instructor'))
            Instructor Portal
        @elseif(Auth::user()->hasRole('admin'))
            Admin Portal
        @endif
    </title>
    <!-- rel icon -->
    <link rel="icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}">
    <meta name="description" content="{{ app(\App\Settings\SiteSettings::class)->seo_description }}">
    <meta name="author" content="{{ app(\App\Settings\SiteSettings::class)->app_name }}">
    <style>
        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }
    </style>
</head>

<body>
    @include('sidebar')
    @include('header')


    <section class="p-4">

        <h1 class="text-dark my-3 h2">Create School</h1>
        
        @if (Session::has('errorMessage'))
            <div class="alert_failed rounded-3 p-3 d-flex align-items-center my-4"><i class='bx bx-x-circle me-1 fs-5'></i>{{Session::get('errorMessage')}}</div>
        @endif

        <div class="bg-white container-fluid py-1 mt-4 rounded-2 shadow">
            <form class="row py-3" action="{{ route('update_school',['id'=>$school->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="form-group mb-4 d-grid col-sm-6 col-12">
                    <label class="text-dark fw-medium" for="title">Page Title</label>
                    <input type="text" name="title" id="title" class="shadow-sm mt-2 form-control" value="{{$school->title}}" required>
                </div>
                <div class="form-group mb-4 d-grid col-sm-6 col-12">
                    <label class="text-dark fw-medium" for="keywords">Keywords</label>
                    <input type="text" name="keywords" id="keywords" class="shadow-sm mt-2 form-control" value="{{$school->keywords}}" required>
                </div>
                <div class="form-group mb-4 d-grid col-12">
                    <label class="text-dark fw-medium" for="description">Page Description</label>
                    <textarea name="description" id="description" rows="4" class="shadow-sm mt-2 form-control">@if($school->description){{$school->description}}@endif<</textarea>
                </div>
                <div class="form-group mb-4 d-grid col-sm-6 col-12">
                    <label class="text-dark fw-medium" for="name">Name</label>
                    <input type="text" name="name" id="name" class="shadow-sm mt-2 form-control" value="{{$school->name}}" required>
                </div>
                <div class="form-group mb-4 d-grid col-sm-6 col-12">
                    <label class="text-dark fw-medium" for="website">Website</label>
                    <input type="text" name="website" id="website" class="shadow-sm mt-2 form-control" value="{{$school->website}}" required>
                </div>
                <div class="form-group mb-4 d-grid col-sm-6 col-12">
                    <label class="text-dark fw-medium" for="phone">Phone</label>
                    <input type="number" name="phone" id="phone" class="shadow-sm mt-2 form-control" value="{{$school->phone}}" required>
                </div>
                <div class="form-group mb-4 d-grid col-sm-6 col-12">
                    <label class="text-dark fw-medium" for="email">Email</label>
                    <input type="email" name="email" id="email" class="shadow-sm mt-2 form-control" value="{{$school->email}}" required>
                </div>
                <div class="form-group mb-4 d-grid col-sm-6 col-12">
                    <label class="text-dark fw-medium" for="type">Type</label>
                    <input type="text" name="type" id="type" class="shadow-sm mt-2 form-control" value="{{$school->type}}" required>
                </div>
                <div class="form-group mb-4 d-grid col-sm-6 col-12">
                    <label class="text-dark fw-medium" for="region">Region ({{$school->region}})</label>
                    <!-- <input type="text" name="region" id="region" class="shadow-sm mt-2 form-control" value="{{$school->region}}" required> -->
                    <select class="shadow-sm mt-2 form-control" name="region" id="region">
                        @foreach($regions as $region)
                            @if($school->region_id == $region['id'])
                                <option value="{{$region['id']}}" selected>{{$region['name']}}</option>
                            @else
                                <option value="{{$region['id']}}">{{$region['name']}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-4 d-grid col-sm-6 col-12">
                    <label class="text-dark fw-medium" for="lat">Location (latitude)</label>
                    <input type="text" name="lat" id="lat" class="shadow-sm mt-2 form-control" value="{{$lat}}" required>
                </div>
                <div class="form-group mb-4 d-grid col-sm-6 col-12">
                    <label class="text-dark fw-medium" for="lon">Location (longitude)</label>
                    <input type="text" name="lon" id="lon" class="shadow-sm mt-2 form-control" value="{{$lon}}" required>
                </div>
                <div class="form-group mb-4 d-grid col-12">
                    <label class="text-dark fw-medium" for="lat">Address</label>
                    <input type="text" name="address" id="address" class="shadow-sm mt-2 form-control" value="{{$school->address}}" required>
                </div>
                <div class="form-group mb-4 d-grid col-sm-6 col-12">
                    <label class="text-dark fw-medium" for="logo">Logo</label>
                    <input type="file" name="logo" id="logo" class="shadow-sm mt-2 form-control">
                </div> 
                <div class="form-group mb-4 d-grid col-sm-6 col-12">
                    <label class="text-dark fw-medium" for="image">Image</label>
                    <input type="file" name="image" id="image" class="shadow-sm mt-2 form-control">
                </div> 
                <div class="form-group mb-4 d-grid col-sm-6 col-12">
                    <label class="text-dark fw-medium" for="exam_boards">Exam Boards</label>
                    <input type="text" name="exam_boards" id="exam_boards" class="shadow-sm mt-2 form-control" value="{{$school->exam_boards}}" required>
                </div>
                <div class="form-group mb-4 d-grid col-sm-6 col-12">
                    <label class="text-dark fw-medium" for="exam_styles">Exam Styles</label>
                    <input type="text" name="exam_styles" id="exam_styles" class="shadow-sm mt-2 form-control" value="{{$school->exam_styles}}" required>
                </div>
                <h2 class="text-dark h3">Admissions</h2>
                <div class="row mb-4 justify-content-center">
                    <div class="form-group mb-4 d-grid col-12">
                        <label class="text-dark fw-medium" for="admission_policy">Policy URL</label>
                        <input type="text" name="admission_policy" id="admission_policy" class="shadow-sm mt-2 form-control" placeholder="https://www.google.com" value="{{$school->admission_policy}}" required>
                    </div>
                    <div id="admission_wrap">
                        @if($school->admissions)
                            @foreach(json_decode($school->admissions, true) as $key => $admission)
                                <div class="row admission_box">
                                    <div class="col-6 mb-4 pe-1">
                                        <label class="text-dark fw-medium" for="admissions_label_{{ ++$loop->index }}">Label</label>
                                        <input type="text" name="admissions_label_{{ $loop->index }}" id="admissions_label_{{ $loop->index }}" class="shadow-sm mt-2 form-control" placeholder="Admission Year.." value="{{ $key }}" required>
                                    </div>
                                    <div class="col-6 mb-4 ps-1">
                                        <label class="text-dark fw-medium" for="admissions_value_{{ $loop->index }}">Value</label>
                                        <input type="text" name="admissions_value_{{ $loop->index }}" id="admissions_value_{{ $loop->index }}" class="shadow-sm mt-2 form-control" placeholder="Sept 2024.." value="{{ $admission }}" required>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="row admission_box">
                                <div class="col-6 mb-4 pe-1">
                                    <label class="text-dark fw-medium" for="admissions_label_1">Label</label>
                                    <input type="text" name="admissions_label_1" id="admissions_label_1" class="shadow-sm mt-2 form-control" placeholder="Admission Year.." required>
                                </div>
                                <div class="col-6 mb-4 ps-1">
                                    <label class="text-dark fw-medium" for="admissions_value_1">Value</label>
                                    <input type="text" name="admissions_value_1" id="admissions_value_1" class="shadow-sm mt-2 form-control" placeholder="Sept 2024.." required>
                                </div>
                            </div>
                        @endif
                    </div>

                    <button type="button" role="button" class="col-6 col-sm-4 col-md-3 col-lg-2 btn btn-primary" id="addAdmission">
                        <i class="bx bx-plus"></i>
                    </button>
                </div>
                <h2 class="text-dark h3">Calendar</h2>
                <div class="row mb-4 justify-content-center">
                    <div id="calendar_wrap">
                        @if($school->calendar)
                            @foreach(json_decode($school->calendar, true) as $key => $value)
                                <div class="row calendar_box">
                                    <div class="col-6 mb-4 pe-1">
                                        <label class="text-dark fw-medium" for="calendar_label_{{ ++$loop->index }}">Label</label>
                                        <input type="text" name="calendar_label_{{ $loop->index }}" id="calendar_label_{{ $loop->index }}" class="shadow-sm mt-2 form-control" placeholder="Registration.." value="{{$key}}" required>
                                    </div>
                                    <div class="col-6 mb-4 ps-1">
                                        <label class="text-dark fw-medium" for="calendar_value_{{ $loop->index }}">Value</label>
                                        <input type="text" name="calendar_value_{{ $loop->index }}" id="calendar_value_{{ $loop->index }}" class="shadow-sm mt-2 form-control" placeholder="15/5/2023 - 30/6/2023.." value="{{$value}}" required>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="row calendar_box">
                                <div class="col-6 mb-4 pe-1">
                                    <label class="text-dark fw-medium" for="calendar_label_1">Label</label>
                                    <input type="text" name="calendar_label_1" id="calendar_label_1" class="shadow-sm mt-2 form-control" placeholder="Registration.." required>
                                </div>
                                <div class="col-6 mb-4 ps-1">
                                    <label class="text-dark fw-medium" for="calendar_value_1">Value</label>
                                    <input type="text" name="calendar_value_1" id="calendar_value_1" class="shadow-sm mt-2 form-control" placeholder="15/5/2023 - 30/6/2023.." required>
                                </div>
                            </div>
                        @endif
                    </div>

                    <button type="button" role="button" class="col-6 col-sm-4 col-md-3 col-lg-2 btn btn-primary" id="addCalendar">
                        <i class="bx bx-plus"></i>
                    </button>
                </div>
                <h2 class="text-dark h3">Academic Selection</h2>
                <div class="row mb-4 justify-content-center">
                    <div id="selection_wrap">
                        @if($school->academic_selection)
                            @foreach(json_decode($school->academic_selection, true) as $key => $value)
                                <div class="row selection_box">
                                    <div class="col-6 mb-4 pe-1">
                                        <label class="text-dark fw-medium" for="selection_label_{{ ++$loop->index }}">Label</label>
                                        <input type="text" name="selection_label_{{ $loop->index }}" id="selection_label_{{ $loop->index }}" class="shadow-sm mt-2 form-control" placeholder="Number of Places.." value="{{$key}}" required>
                                    </div>
                                    <div class="col-6 mb-4 ps-1">
                                        <label class="text-dark fw-medium" for="selection_value_{{ $loop->index }}">Value</label>
                                        <input type="text" name="selection_value_{{ $loop->index }}" id="selection_value_{{ $loop->index }}" class="shadow-sm mt-2 form-control" placeholder="192.." value="{{$value}}" required>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="row selection_box">
                                <div class="col-6 mb-4 pe-1">
                                    <label class="text-dark fw-medium" for="selection_label_1">Label</label>
                                    <input type="text" name="selection_label_1" id="selection_label_1" class="shadow-sm mt-2 form-control" placeholder="Number of Places.." required>
                                </div>
                                <div class="col-6 mb-4 ps-1">
                                    <label class="text-dark fw-medium" for="selection_value_1">Value</label>
                                    <input type="text" name="selection_value_1" id="selection_value_1" class="shadow-sm mt-2 form-control" placeholder="192.." required>
                                </div>
                            </div>
                        @endif
                    </div>

                    <button type="button" role="button" class="col-6 col-sm-4 col-md-3 col-lg-2 btn btn-primary" id="addSelection">
                        <i class="bx bx-plus"></i>
                    </button>
                </div>
                <h2 class="text-dark h3">Sample Papers</h2>
                <div class="row mb-4 justify-content-center">
                    <div id="sample_paper_wrap">
                        @if($school->sample_papers)
                            @foreach(json_decode($school->sample_papers, true) as $key => $value)
                                <div class="row sample_paper_box">
                                    <div class="col-12 col-sm-4 mb-4 pe-1">
                                        <label class="text-dark fw-medium" for="sample_paper_name_{{++$key}}">Name</label>
                                        <input type="text" name="sample_paper_name_{{$key}}" id="sample_paper_name{{$key}}" class="shadow-sm mt-2 form-control" placeholder="XYZ booklet.." value="{{$value['name']}}" required>
                                    </div>
                                    <div class="col-6 col-sm-4 mb-4 ps-1">
                                        <label class="text-dark fw-medium" for="sample_paper_link_{{$key}}">Link</label>
                                        <input type="text" name="sample_paper_link_{{$key}}" id="sample_paper_link_{{$key}}" class="shadow-sm mt-2 form-control" placeholder="https://www.google.com.." value="{{$value['link']}}" required>
                                    </div>
                                    <div class="col-6 col-sm-4 mb-4 ps-1">
                                        <label class="text-dark fw-medium" for="sample_paper_subjects_{{$key}}">Subjects</label>
                                        <input type="text" name="sample_paper_subjects_{{$key}}" id="sample_paper_subjects_{{$key}}" class="shadow-sm mt-2 form-control" placeholder="Maths, English, etc.." value="{{$value['subjects']}}" required>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="row sample_paper_box">
                                <div class="col-12 col-sm-4 mb-4 pe-1">
                                    <label class="text-dark fw-medium" for="sample_paper_name_1">Name</label>
                                    <input type="text" name="sample_paper_name_1" id="sample_paper_name_1" class="shadow-sm mt-2 form-control" placeholder="XYZ booklet.." required>
                                </div>
                                <div class="col-6 col-sm-4 mb-4 ps-1">
                                    <label class="text-dark fw-medium" for="sample_paper_link_1">Link</label>
                                    <input type="text" name="sample_paper_link_1" id="sample_paper_link_1" class="shadow-sm mt-2 form-control" placeholder="https://www.google.com.." required>
                                </div>
                                <div class="col-6 col-sm-4 mb-4 ps-1">
                                    <label class="text-dark fw-medium" for="sample_paper_subjects_1">Subjects</label>
                                    <input type="text" name="sample_paper_subjects_1" id="sample_paper_subjects_1" class="shadow-sm mt-2 form-control" placeholder="Maths, English, etc.." required>
                                </div>
                            </div>
                        @endif
                    </div>
                    <button type="button" role="button" class="col-6 col-sm-4 col-md-3 col-lg-2 btn btn-primary" id="addSamplePaper">
                        <i class="bx bx-plus"></i>
                    </button>
                </div>
                <h2 class="text-dark h3">FAQ's</h2>
                <div class="row mb-4 justify-content-center">
                    <div id="faq_wrap">
                        @if($school->faq)
                            @foreach(json_decode($school->faq, true) as $key => $value)
                                <div class="row faq_box">
                                    <div class="col-6 mb-4 pe-1">
                                        <label class="text-dark fw-medium" for="faq_question_{{ ++$loop->index }}">Question</label>
                                        <input type="text" name="faq_question_{{ $loop->index }}" id="faq_question_{{ $loop->index }}" class="shadow-sm mt-2 form-control" placeholder="What is the 11+?" value="{{$key}}" required>
                                    </div>
                                    <div class="col-6 mb-4 pe-1">
                                        <label class="text-dark fw-medium" for="faq_answer_{{ $loop->index }}">Answer</label>
                                        <input type="text" name="faq_answer_{{ $loop->index }}" id="faq_answer_{{ $loop->index }}" class="shadow-sm mt-2 form-control" placeholder="The 11+ is a test for admission to UK grammar schools." value="{{$value}}" required>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="row faq_box">
                                <div class="col-6 mb-4 pe-1">
                                    <label class="text-dark fw-medium" for="faq_question_1">Question</label>
                                    <input type="text" name="faq_question_1" id="faq_question_1" class="shadow-sm mt-2 form-control" placeholder="What is the 11+?" required>
                                </div>
                                <div class="col-6 mb-4 pe-1">
                                    <label class="text-dark fw-medium" for="faq_answer_1">Answer</label>
                                    <input type="text" name="faq_answer_1" id="faq_answer_1" class="shadow-sm mt-2 form-control" placeholder="The 11+ is a test for admission to UK grammar schools." required>
                                </div>
                            </div>
                        @endif
                    </div>
                    <button type="button" role="button" class="col-6 col-sm-4 col-md-3 col-lg-2 btn btn-primary" id="addFaq">
                        <i class="bx bx-plus"></i>
                    </button>
                </div>
                <div class="form-group mb-4">
                    <h2 class="text-dark h3">About School</h2>
                    @if($school->about)
                        <textarea class="form-control mt-2" name="about" id="about">{!!$school->about!!}</textarea>
                    @else
                        <textarea class="form-control mt-2" name="about" id="about"></textarea>
                    @endif
                </div>
                <div class="form-group mb-4">
                    <h2 class="text-dark h3">How To Apply</h2>
                    @if($school->about)
                        <textarea class="form-control mt-2" name="how_to_apply" id="how_to_apply">{!!$school->how_to_apply!!}</textarea>
                    @else
                        <textarea class="form-control mt-2" name="how_to_apply" id="how_to_apply"></textarea>
                    @endif
                </div>
                <div class="form-group mb-4">
                    <h2 class="text-dark h3">What's On School</h2>
                    @if($school->whats_on_school)
                        <textarea class="form-control mt-2" name="whats_on_school" id="whats_on_school">{!!$school->whats_on_school!!}</textarea>
                    @else
                        <textarea class="form-control mt-2" name="whats_on_school" id="whats_on_school"></textarea>
                    @endif
                </div>
                <div class="form-group mb-4">
                    <h2 class="text-dark h3">Admission Criteria</h2>
                    @if($school->admission_criteria_details)
                        <textarea class="form-control mt-2" name="admission_criteria_details" id="admission_criteria_details">{!!$school->admission_criteria_details!!}</textarea>
                    @else
                        <textarea class="form-control mt-2" name="admission_criteria_details" id="admission_criteria_details"></textarea>
                    @endif
                </div>
                <div class="form-group mb-4">
                    <h2 class="text-dark h3">Details About Pass Mark</h2>
                    @if($school->pass_mark_details)
                        <textarea class="form-control mt-2" name="pass_mark_details" id="pass_mark_details">{!!$school->pass_mark_details!!} </textarea>
                    @else
                    <textarea class="form-control mt-2" name="pass_mark_details" id="pass_mark_details"></textarea>
                    @endif
                </div>
                <div class="form-group mb-4">
                    <h2 class="text-dark h3">Details About Catchment Area</h2>
                    @if($school->catchment_area_details)
                        <textarea class="form-control mt-2" name="catchment_area_details" id="catchment_area_details">{!!$school->catchment_area_details!!}</textarea>
                    @else
                        <textarea class="form-control mt-2" name="catchment_area_details" id="catchment_area_details"></textarea>
                    @endif
                </div>
                <div class="form-group mb-4">
                    <h2 class="text-dark h3">Term Dates</h2>
                    @if($school->term_dates)
                        <textarea class="form-control mt-2" name="term_dates" id="term_dates">{!!$school->term_dates!!}</textarea>
                    @else
                        <textarea class="form-control mt-2" name="term_dates" id="term_dates"></textarea>
                    @endif
                </div>
                <div class="text-end">
                    <input type="submit" id="save" class="btn btn-primary" value="Update">
                </div>
            </form>
        </div>

    </section>
    @include('parentsidebar.sidebarending')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css">
    <script>
        $(document).ready(function() {
            $("#addAdmission").click(function(){
                let length = $('.admission_box').length + 1;
                let tab = `<div class="row admission_box">
                            <div class="col-6 mb-4 pe-1">
                                <label class="text-dark fw-medium" for="admissions_label_`+length+`">Label</label>
                                <input type="text" name="admissions_label_`+length+`" id="admissions_label_`+length+`" class="shadow-sm mt-2 form-control" placeholder="Admission Year.." required>
                            </div>
                            <div class="col-6 mb-4 ps-1">
                                <label class="text-dark fw-medium" for="admissions_value_`+length+`">Value</label>
                                <input type="text" name="admissions_value_`+length+`" id="admissions_value_`+length+`" class="shadow-sm mt-2 form-control" placeholder="Sept 2024.." required>
                            </div>
                        </div>`;
                $("#admission_wrap").append(tab);
            });
            $("#addCalendar").click(function(){
                let length = $('.calendar_box').length + 1;
                let tab = `<div class="row calendar_box">
                            <div class="col-6 mb-4 pe-1">
                                <label class="text-dark fw-medium" for="calendar_label_`+length+`">Label</label>
                                <input type="text" name="calendar_label_`+length+`" id="calendar_label_`+length+`" class="shadow-sm mt-2 form-control" placeholder="Registration.." required>
                            </div>
                            <div class="col-6 mb-4 ps-1">
                                <label class="text-dark fw-medium" for="calendar_value_`+length+`">Value</label>
                                <input type="text" name="calendar_value_`+length+`" id="calendar_value_`+length+`" class="shadow-sm mt-2 form-control" placeholder="15/5/2023 - 30/6/2023" required>
                            </div>
                        </div>`;
                $("#calendar_wrap").append(tab);
            });
            $("#addSelection").click(function(){
                let length = $('.selection_box').length + 1;
                let tab = `<div class="row selection_box">
                            <div class="col-6 mb-4 pe-1">
                                <label class="text-dark fw-medium" for="selection_label_`+length+`">Label</label>
                                <input type="text" name="selection_label_`+length+`" id="selection_label_`+length+`" class="shadow-sm mt-2 form-control" placeholder="Number of Places.." required>
                            </div>
                            <div class="col-6 mb-4 ps-1">
                                <label class="text-dark fw-medium" for="selection_value_`+length+`">Value</label>
                                <input type="text" name="selection_value_`+length+`" id="selection_value_`+length+`" class="shadow-sm mt-2 form-control" placeholder="192.." required>
                            </div>
                        </div>`;
                $("#selection_wrap").append(tab);
            });
            $("#addSamplePaper").click(function(){
                let length = $('.sample_paper_box').length + 1;
                let tab = `<div class="row sample_paper_box">
                            <div class="col-12 col-sm-4 mb-4 pe-1">
                                <label class="text-dark fw-medium" for="sample_paper_name_`+length+`">Name</label>
                                <input type="text" name="sample_paper_name_`+length+`" id="sample_paper_name_`+length+`" class="shadow-sm mt-2 form-control" placeholder="Enter Name.." required>
                            </div>
                            <div class="col-6 col-sm-4 mb-4 ps-1">
                                <label class="text-dark fw-medium" for="sample_paper_link_`+length+`">Link</label>
                                <input type="text" name="sample_paper_link_`+length+`" id="sample_paper_link_`+length+`" class="shadow-sm mt-2 form-control" placeholder="Enter Link.." required>
                            </div>
                            <div class="col-6 col-sm-4 mb-4 ps-1">
                                <label class="text-dark fw-medium" for="sample_paper_subjects_`+length+`">Subjects</label>
                                <input type="text" name="sample_paper_subjects_`+length+`" id="sample_paper_subjects_`+length+`" class="shadow-sm mt-2 form-control" placeholder="Enter Subjects.." required>
                            </div>
                        </div>`;
                $("#sample_paper_wrap").append(tab);
            });
            $("#addFaq").click(function(){
                let length = $('.faq_box').length + 1;
                let tab = `<div class="row faq_box">
                                <div class="col-6 mb-4 pe-1">
                                    <label class="text-dark fw-medium" for="faq_question_`+length+`">Question</label>
                                    <input type="text" name="faq_question_`+length+`" id="faq_question_`+length+`" class="shadow-sm mt-2 form-control" placeholder="What is the 11+?" required>
                                </div>
                                <div class="col-6 mb-4 pe-1">
                                    <label class="text-dark fw-medium" for="faq_answer_`+length+`">Answer</label>
                                    <input type="text" name="faq_answer_`+length+`" id="faq_answer_`+length+`" class="shadow-sm mt-2 form-control" placeholder="The 11+ is a test for admission to UK grammar schools." required>
                                </div>
                            </div>`;
                $("#faq_wrap").append(tab);
            });
            $('#about, #how_to_apply, #term_dates, #whats_on_school, #pass_mark_details, #catchment_area_details, #admission_criteria_details').summernote({
                placeholder: 'Start Typing here...',
                tabsize: 2,
                height: 100,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'fullscreen', 'superscript', 'subscript']],
                    ['view', ['codeview', 'help']]
                ],
                callbacks: {
                    onInit: function() {
                        $('.note-toolbar').addClass('custom-toolbar');
                    }
                }
            });
            $('.note-btn').click(function() {
                $(this).next().toggleClass('d-block top-100');
            });
            $('.note-dropdown-menu, .note-dropdown-menu *').click(function() {
                $('.note-dropdown-menu').removeClass('d-block top-100');
            });
        });
    </script>

</body>

</html>