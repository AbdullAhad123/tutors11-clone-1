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
    <!-- bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
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

        <div class="bg-white my-4 p-4 shadow rounded-4">
            <form class="row py-3" action="{{ route('school.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="form-group mb-4 d-grid col-sm-6 col-12">
                    <label class="fw-medium text-dark" for="title">Page Title</label>
                    <input type="text" name="title" id="title" placeholder="Enter page title..." class="mt-2 form-control shadow-sm" required>
                </div>
                <div class="form-group mb-4 d-grid col-sm-6 col-12">
                    <label class="fw-medium text-dark" for="keywords">Keywords</label>
                    <input type="text" name="keywords" id="keywords" placeholder="Enter keywords..." class="mt-2 form-control shadow-sm" required>
                </div>
                <div class="form-group mb-4 d-grid col-12">
                    <label class="fw-medium text-dark" for="description">Page Description</label>
                    <textarea name="description" id="description" placeholder="Enter description..." rows="4" class="mt-2 form-control shadow-sm"></textarea>
                </div>
                <div class="form-group mb-4 d-grid col-sm-6 col-12">
                    <label class="fw-medium text-dark" for="name">School Name</label>
                    <input type="text" name="name" id="name" placeholder="Enter school name..." class="mt-2 form-control shadow-sm" required>
                </div>
                <div class="form-group mb-4 d-grid col-sm-6 col-12">
                    <label class="fw-medium text-dark" for="website">Website</label>
                    <input type="text" name="website" id="website" placeholder="Enter website URL..." class="mt-2 form-control shadow-sm" required>
                </div>
                <div class="form-group mb-4 d-grid col-sm-6 col-12">
                    <label class="fw-medium text-dark" for="phone">Phone</label>
                    <input type="number" name="phone" id="phone" placeholder="Enter phone number..." class="mt-2 form-control shadow-sm" required>
                </div>
                <div class="form-group mb-4 d-grid col-sm-6 col-12">
                    <label class="fw-medium text-dark" for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="Enter emai address..." class="mt-2 form-control shadow-sm" required>
                </div>
                <div class="form-group mb-4 d-grid col-sm-6 col-12">
                    <label class="fw-medium text-dark" for="type">Type</label>
                    <input type="text" name="type" id="type" placeholder="Enter school type..." class="mt-2 form-control shadow-sm" required>
                </div>
                <div class="form-group mb-4 d-grid col-sm-6 col-12">
                    <label class="fw-medium text-dark" for="region">Region</label>
                    <input type="text" name="region" id="region" placeholder="Enter school region..." class="mt-2 form-control shadow-sm" required>
                </div>
                <div class="form-group mb-4 d-grid col-sm-6 col-12">
                    <label class="fw-medium text-dark" for="lat">Location (latitude)</label>
                    <input type="text" name="lat" id="lat" placeholder="Enter latitute..." class="mt-2 form-control shadow-sm" required>
                </div>
                <div class="form-group mb-4 d-grid col-sm-6 col-12">
                    <label class="fw-medium text-dark" for="lon">Location (longitude)</label>
                    <input type="text" name="lon" id="lon" placeholder="Enter longitute..." class="mt-2 form-control shadow-sm" required>
                </div>
                <div class="form-group mb-4 d-grid col-12">
                    <label class="fw-medium text-dark" for="lat">Address</label>
                    <input type="text" name="address" id="address" placeholder="Enter school address..." class="mt-2 form-control shadow-sm" required>
                </div>
                <div class="form-group mb-4 d-grid col-sm-6 col-12">
                    <label class="fw-medium text-dark" for="logo">Logo</label>
                    <input type="file" name="logo" id="logo" class="mt-2 form-control shadow-sm" required>
                </div> 
                <div class="form-group mb-4 d-grid col-sm-6 col-12">
                    <label class="fw-medium text-dark" for="image">Image</label>
                    <input type="file" name="image" id="image" class="mt-2 form-control shadow-sm" required>
                </div> 
                <div class="form-group mb-4 d-grid col-sm-6 col-12">
                    <label class="fw-medium text-dark" for="exam_boards">Exam Boards</label>
                    <input type="text" name="exam_boards" placeholder="Enter board name..." id="exam_boards" class="mt-2 form-control shadow-sm" required>
                </div>
                <div class="form-group mb-4 d-grid col-sm-6 col-12">
                    <label class="fw-medium text-dark" for="exam_styles">Exam Styles</label>
                    <input type="text" name="exam_styles" id="exam_styles" placeholder="Enter exam type..." class="mt-2 form-control shadow-sm" required>
                </div>
                <div class="my-4">
                    <h2 class="text-dark h3">Admissions</h2>
                    <div class="row mb-4 justify-content-center">
                        <div class="form-group mb-4 d-grid col-12">
                            <label class="fw-medium text-dark" for="admission_policy">Policy URL</label>
                            <input type="text" name="admission_policy" id="admission_policy" class="mt-2 form-control shadow-sm" placeholder="https://www.google.com" required>
                        </div>
                        <div id="admission_wrap">
                            <div class="row admission_box">
                                <div class="col-6 mb-4 pe-1">
                                    <label class="fw-medium text-dark" for="admissions_label_1">Label</label>
                                    <input type="text" name="admissions_label_1" id="admissions_label_1" class="mt-2 form-control shadow-sm" placeholder="Admission Year.." required>
                                </div>
                                <div class="col-6 mb-4 ps-1">
                                    <label class="fw-medium text-dark" for="admissions_value_1">Value</label>
                                    <input type="text" name="admissions_value_1" id="admissions_value_1" class="mt-2 form-control shadow-sm" placeholder="Sept 2024.." required>
                                </div>
                            </div>
                        </div>

                        <button type="button" role="button" class="col-6 col-sm-4 col-md-3 col-lg-2 btn btn-primary" id="addAdmission">
                            Add<i class="bx bx-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="my-4">
                    <h2 class="text-dark h3">Calendar</h2>
                    <div class="row mb-4 justify-content-center">
                        <div id="calendar_wrap">
                            <div class="row calendar_box">
                                <div class="col-6 mb-4 pe-1">
                                    <label class="fw-medium text-dark" for="calendar_label_1">Label</label>
                                    <input type="text" name="calendar_label_1" id="calendar_label_1" class="mt-2 form-control shadow-sm" placeholder="Registration.." required>
                                </div>
                                <div class="col-6 mb-4 ps-1">
                                    <label class="fw-medium text-dark" for="calendar_value_1">Value</label>
                                    <input type="text" name="calendar_value_1" id="calendar_value_1" class="mt-2 form-control shadow-sm" placeholder="15/5/2023 - 30/6/2023.." required>
                                </div>
                            </div>
                        </div>

                        <button type="button" role="button" class="col-6 col-sm-4 col-md-3 col-lg-2 btn btn-primary" id="addCalendar">
                            Add<i class="bx bx-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="my-4">
                    <h2 class="text-dark h3">Academic Selection</h2>
                    <div class="row mb-4 justify-content-center">
                        <div id="selection_wrap">
                            <div class="row selection_box">
                                <div class="col-6 mb-4 pe-1">
                                    <label class="fw-medium text-dark" for="selection_label_1">Label</label>
                                    <input type="text" name="selection_label_1" id="selection_label_1" class="mt-2 form-control shadow-sm" placeholder="Number of Places.." required>
                                </div>
                                <div class="col-6 mb-4 ps-1">
                                    <label class="fw-medium text-dark" for="selection_value_1">Value</label>
                                    <input type="text" name="selection_value_1" id="selection_value_1" class="mt-2 form-control shadow-sm" placeholder="192.." required>
                                </div>
                            </div>
                        </div>

                        <button type="button" role="button" class="col-6 col-sm-4 col-md-3 col-lg-2 btn btn-primary" id="addSelection">
                        Add <i class="bx bx-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="my-4">
                    <h2 class="text-dark h3">Sample Papers</h2>
                    <div class="row mb-4 justify-content-center">
                        <div id="sample_paper_wrap">
                            <div class="row sample_paper_box">
                                <div class="col-12 col-sm-4 mb-4 pe-1">
                                    <label class="fw-medium text-dark" for="sample_paper_name_1">Name</label>
                                    <input type="text" name="sample_paper_name_1" id="sample_paper_name_1" class="mt-2 form-control shadow-sm" placeholder="XYZ booklet.." required>
                                </div>
                                <div class="col-6 col-sm-4 mb-4 ps-1">
                                    <label class="fw-medium text-dark" for="sample_paper_link_1">Link</label>
                                    <input type="text" name="sample_paper_link_1" id="sample_paper_link_1" class="mt-2 form-control shadow-sm" placeholder="https://www.google.com.." required>
                                </div>
                                <div class="col-6 col-sm-4 mb-4 ps-1">
                                    <label class="fw-medium text-dark" for="sample_paper_subjects_1">Subjects</label>
                                    <input type="text" name="sample_paper_subjects_1" id="sample_paper_subjects_1" class="mt-2 form-control shadow-sm" placeholder="Maths, English, etc.." required>
                                </div>
                            </div>
                        </div>

                        <button type="button" role="button" class="col-6 col-sm-4 col-md-3 col-lg-2 btn btn-primary" id="addSamplePaper">
                            Add<i class="bx bx-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="my-4">
                    <h2 class="text-dark h3">FAQ's Section</h2>
                    <div class="row mb-4 justify-content-center">
                        <div id="faq_wrap">
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
                        </div>
                        <button type="button" role="button" class="col-6 col-sm-4 col-md-3 col-lg-2 btn btn-primary" id="addFaq">
                            <i class="bx bx-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="form-group mb-4">
                    <h2 class="text-dark h3">About School</h2>
                    <textarea class="form-control mt-2" name="about" id="about"></textarea>
                </div>
                <div class="form-group mb-4">
                    <h2 class="text-dark h3">How To Apply</h2>
                    <textarea class="form-control mt-2" name="how_to_apply" id="how_to_apply"></textarea>
                </div>
                <div class="form-group mb-4">
                    <h2 class="text-dark h3">What's On School</h2>
                    <textarea class="form-control mt-2" name="whats_on_school" id="whats_on_school"></textarea>
                </div>
                <div class="form-group mb-4">
                    <h2 class="text-dark h3">Admission Criteria</h2>
                    <textarea class="form-control mt-2" name="admission_criteria_details" id="admission_criteria_details"></textarea>
                </div>
                <div class="form-group mb-4">
                    <h2 class="text-dark h3">Details About Pass Mark</h2>
                    <textarea class="form-control mt-2" name="pass_mark_details" id="pass_mark_details"></textarea>
                </div>
                <div class="form-group mb-4">
                    <h2 class="text-dark h3">Details About Catchment Area</h2>
                    <textarea class="form-control mt-2" name="catchment_area_details" id="catchment_area_details"></textarea>
                </div>
                <div class="form-group mb-4">
                    <h2 class="text-dark h3">Term Dates</h2>
                    <textarea class="form-control mt-2" name="term_dates" id="term_dates"></textarea>
                </div>
                <div class="text-end">
                    <input type="submit" id="save" class="btn btn-primary" value="Save">
                </div>
            </form>
        </div>

    </section>


    @include('parentsidebar.sidebarending')

    <script>
        $(document).ready(function() {
            $("#addAdmission").click(function(){
                let length = $('.admission_box').length + 1;
                let tab = `<div class="row admission_box">
                            <div class="col-6 mb-4 pe-1">
                                <label class="fw-medium text-dark" for="admissions_label_`+length+`">Label</label>
                                <input type="text" name="admissions_label_`+length+`" id="admissions_label_`+length+`" class="mt-2 form-control shadow-sm" placeholder="Admission Year.." required>
                            </div>
                            <div class="col-6 mb-4 ps-1">
                                <label class="fw-medium text-dark" for="admissions_value_`+length+`">Value</label>
                                <input type="text" name="admissions_value_`+length+`" id="admissions_value_`+length+`" class="mt-2 form-control shadow-sm" placeholder="Sept 2024.." required>
                            </div>
                        </div>`;
                $("#admission_wrap").append(tab);
            });
            $("#addCalendar").click(function(){
                let length = $('.calendar_box').length + 1;
                let tab = `<div class="row calendar_box">
                            <div class="col-6 mb-4 pe-1">
                                <label class="fw-medium text-dark" for="calendar_label_`+length+`">Label</label>
                                <input type="text" name="calendar_label_`+length+`" id="calendar_label_`+length+`" class="mt-2 form-control shadow-sm" placeholder="Registration.." required>
                            </div>
                            <div class="col-6 mb-4 ps-1">
                                <label class="fw-medium text-dark" for="calendar_value_`+length+`">Value</label>
                                <input type="text" name="calendar_value_`+length+`" id="calendar_value_`+length+`" class="mt-2 form-control shadow-sm" placeholder="15/5/2023 - 30/6/2023" required>
                            </div>
                        </div>`;
                $("#calendar_wrap").append(tab);
            });
            $("#addSelection").click(function(){
                let length = $('.selection_box').length + 1;
                let tab = `<div class="row selection_box">
                            <div class="col-6 mb-4 pe-1">
                                <label class="fw-medium text-dark" for="selection_label_`+length+`">Label</label>
                                <input type="text" name="selection_label_`+length+`" id="selection_label_`+length+`" class="mt-2 form-control shadow-sm" placeholder="Number of Places.." required>
                            </div>
                            <div class="col-6 mb-4 ps-1">
                                <label class="fw-medium text-dark" for="selection_value_`+length+`">Value</label>
                                <input type="text" name="selection_value_`+length+`" id="selection_value_`+length+`" class="mt-2 form-control shadow-sm" placeholder="192.." required>
                            </div>
                        </div>`;
                $("#selection_wrap").append(tab);
            });
            $("#addSamplePaper").click(function(){
                let length = $('.sample_paper_box').length + 1;
                let tab = `<div class="row sample_paper_box">
                            <div class="col-12 col-sm-4 mb-4 pe-1">
                                <label class="fw-medium text-dark" for="sample_paper_name_`+length+`">Name</label>
                                <input type="text" name="sample_paper_name_`+length+`" id="sample_paper_name_`+length+`" class="mt-2 form-control shadow-sm" placeholder="Enter Name.." required>
                            </div>
                            <div class="col-6 col-sm-4 mb-4 ps-1">
                                <label class="fw-medium text-dark" for="sample_paper_link_`+length+`">Link</label>
                                <input type="text" name="sample_paper_link_`+length+`" id="sample_paper_link_`+length+`" class="mt-2 form-control shadow-sm" placeholder="Enter Link.." required>
                            </div>
                            <div class="col-6 col-sm-4 mb-4 ps-1">
                                <label class="fw-medium text-dark" for="sample_paper_subjects_`+length+`">Subjects</label>
                                <input type="text" name="sample_paper_subjects_`+length+`" id="sample_paper_subjects_`+length+`" class="mt-2 form-control shadow-sm" placeholder="Enter Subjects.." required>
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
        });
    </script>

</body>

</html>