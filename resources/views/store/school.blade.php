<?php use Illuminate\Support\Str; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $school->title ? $school->title . ': ' : '' }}Comprehensive 11+ Prep Services in {{ $school['region'] }} | Tutorselevenplus</title>
    <meta name="description" content="{{$school->description ? $school->description : app(\App\Settings\KeywordsSettings::class)->description['school_description']}}">
    <meta name="keywords" content="{{$school->keywords ? $school->keywords : app(\App\Settings\KeywordsSettings::class)->keywords['school_keywords']}}">
    <link rel="canonical" href="{{ url()->current() }}"/>
	<link rel="alternate" href="{{ url()->current() }}" hreflang="en-gb">
    <meta name="author" content="{{ app(\App\Settings\SiteSettings::class)->app_name }}">
    <link rel="icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}">
    <link rel="preload" href="{{url('Frontend_css/all.css')}}" as="style">
    <link rel="preload" href="{{url('Frontend_css/style.css')}}" as="style">
    <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" as="style">
    <link rel="preconnect" href="https://googleads.g.doubleclick.net">
    <link rel="preconnect" href="https://td.doubleclick.net">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://www.google-analytics.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Kanit:wght@200;300;400;500&display=swap">
    <link rel="stylesheet" href="{{url('Frontend_css/all.css')}}" />
    <link rel="stylesheet" href="{{url('Frontend_css/style.css')}}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    @include('components.google-tags')
    <style>
        #map {height: 300px;}
        .school_item_detail {
            margin-top: 6rem
        }
        a {
            color: var(--primary) !important
        }
    </style>
</head>
<body>


    @include('components.website-preloader')<nav class="navbar navbar-expand-lg fixed-top fixed_nav py-1 col-lg-11 col-12 py-2" id="navbar_nav"><div class="container-fluid col-xl-10 col-lg-12 col-md-12 col-sm-12 col-12 py-1"><a class="m-0 navbar-brand p-0 me-lg-3" href="/"><img src="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->logo_path) }}" width="45" height="45" class="img-fluid" alt="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->app_name) }}"></a><div><ul class="navbar-nav m-0 align-items-center d-lg-none d-inline-block">@if(Auth::user() == null)<li class="nav-item mx-1 d-inline-flex"><a role="button" href="/registration" class="border-2 outlined_secondary_btn p-2 px-3 rounded-2 rounded-pill small">Signup</a></li>@else<li class="nav-item mx-1 d-none"><a role="button" href="/registration" class="border-2 outlined_secondary_btn p-2 px-3 rounded-2 rounded-pill small">Signup</a></li>@endif @if(Auth::user() == null)<li class="nav-item d-inline-flex"><a role="button" href="/login" class="border-2 secondary_btn p-2 px-3 rounded-2 rounded-pill small">Login</a></li>@else @if(Auth::user()->hasRole('student'))<li class="nav-item d-inline-flex"><a role="button" href="/dashboard" class="border-2 secondary_btn p-2 px-3 rounded-2 rounded-pill small @if(Request::is('change-syllabus')) active @endif">Dashboard</a></li>@elseif(Auth::user()->hasRole('parent'))<li class="nav-item d-inline-flex"><a role="button" href="/change-child" class="border-2 secondary_btn p-2 px-3 rounded-2 rounded-pill small @if(Request::is('change-child')) active @endif">Dashboard</a></li>@elseif(Auth::user()->hasRole('instructor'))<li class="nav-item d-inline-flex"><a role="button" href="/instructor/dashboard" class="border-2 secondary_btn p-2 px-3 rounded-2 rounded-pill small @if(Request::is('instructor/dashboard')) active @endif">Dashboard</a></li>@elseif(Auth::user()->hasRole('admin'))<li class="nav-item d-inline-flex"><a role="button" href="/admin/dashboard" class="border-2 d-inline-flex secondary_btn p-2 px-3 rounded-2 rounded-pill small @if(Request::is('admin/dashboard')) active @endif">Dashboard</a></li>@elseif(Auth::user()->hasRole('teacher'))<li class="nav-item d-inline-flex"><a role="button" href="/change-child" class="border-2 secondary_btn p-2 px-3 rounded-2 rounded-pill small @if(Request::is('change-child')) active @endif">Dashboard</a></li>@endif @endif</ul><svg class="navbar-toggler border-0 text-white shadow-none px-1 navbar_menu ms-1" xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 24 24" style="fill:#fff" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop" aria-controls="offcanvasTop" aria-label="navbar Navigation"><path d="M4 6h16v2H4zm0 5h16v2H4zm0 5h16v2H4z"></path></svg></div><div class="collapse navbar-collapse align-items-center justify-content-lg-between" id="navbarNav"><ul class="navbar-nav"><li class="nav-item text-center mx-2"><a aria-label="Home" class="nav-link border-0 px-2" href="/">Home</a></li><li class="nav-item text-center mx-2"><a aria-label="Explore Pricings" class="nav-link border-0 px-2" href="/pricing">Pricings</a></li><li class="nav-item text-center dropdown mx-2"><button class="nav-link customize_dropdown border-0 px-2 bg-transparent text-white" type="button" data-bs-toggle="dropdown" aria-expanded="false"><span>Learn With Us</span> <i class="fa fa-chevron-down fa-xs small ms-1 dropdown_toggle_icon"></i></button><ul class="border-0 dropdown-menu dropdown-menu-start p-2 rounded-1 shadow-lg">@php $loggedIn = Auth::user() != null; $isStudent = $loggedIn && Auth::user()->hasRole('student'); @endphp<li><a class="align-items-baseline d-flex dropdown-item fw-normal p-2" href="{{ $isStudent ? '/quizzes' : '/login' }}"><i class="fa-regular fa-file-lines"></i> <span class="ms-2">Quizzes</span></a></li><li><a class="align-items-baseline d-flex dropdown-item fw-normal p-2" href="{{ $isStudent ? '/learn-practice' : '/login' }}"><i class="fa-solid fa-graduation-cap"></i> <span class="ms-2">Learn and Practise</span></a></li></ul></li><li class="nav-item text-center dropdown mx-2"><button class="nav-link customize_dropdown border-0 px-2 bg-transparent text-white" type="button" data-bs-toggle="dropdown" aria-expanded="false"><span>Explore Hub</span> <i class="fa fa-chevron-down fa-xs small ms-1 dropdown_toggle_icon"></i></button><ul class="border-0 dropdown-menu dropdown-menu-start p-2 rounded-1 shadow-lg"><li><a class="align-items-baseline d-flex dropdown-item fw-normal p-2" href="/blogs"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="black"><path d="M19.875 3H4.125C2.953 3 2 3.897 2 5v14c0 1.103.953 2 2.125 2h15.75C21.047 21 22 20.103 22 19V5c0-1.103-.953-2-2.125-2zm0 16H4.125c-.057 0-.096-.016-.113-.016-.007 0-.011.002-.012.008L3.988 5.046c.007-.01.052-.046.137-.046h15.75c.079.001.122.028.125.008l.012 13.946c-.007.01-.052.046-.137.046z"></path><path d="M6 7h6v6H6zm7 8H6v2h12v-2h-4zm1-4h4v2h-4zm0-4h4v2h-4z"></path></svg> <span class="ms-2">Blogs</span></a></li><li><a class="align-items-baseline d-flex dropdown-item fw-normal p-2" href="/explore"><i class="fa-solid fa-earth-europe"></i> <span class="ms-2">Explore</span></a></li><li><a class="align-items-baseline d-flex dropdown-item fw-normal p-2" href="{{route('school_list' , ['page' => 1])}}"><i class="fa-solid fa-school"></i> <span class="ms-2">Schools</span></a></li></ul></li><li class="nav-item text-center dropdown mx-2"><button class="nav-link customize_dropdown border-0 px-2 bg-transparent text-white" type="button" data-bs-toggle="dropdown" aria-expanded="false"><span>More For You</span> <i class="fa fa-chevron-down fa-xs small ms-1 dropdown_toggle_icon"></i></button><ul class="border-0 dropdown-menu dropdown-menu-start p-2 rounded-1 shadow-lg"><li><a class="align-items-baseline d-flex dropdown-item fw-normal p-2" href="/about"><i class="fa-solid fa-people-group"></i> <span class="ms-2">About Us</span></a></li><li><a class="align-items-baseline d-flex dropdown-item fw-normal p-2" href="/contact"><i class="fa-solid fa-headset"></i> <span class="ms-2">Contact Us</span></a></li><li><a class="align-items-baseline d-flex dropdown-item fw-normal p-2" href="/help"><i class="fa-solid fa-circle-info"></i> <span class="ms-2">Help & Support</span></a></li><li><a class="align-items-baseline d-flex dropdown-item fw-normal p-2" href="/reviews"><i class="fa-solid fa-star text-reset"></i> <span class="ms-2">Reviews</span></a></li></ul></li></ul><ul class="align-items-center m-0 navbar-nav"><li class="nav-item mx-2 d-lg-flex d-none"><a role="button" href="/registration" class="border-2 outlined_secondary_btn p-2 px-4 rounded-2 rounded-pill py-2">Signup</a></li>@if(Auth::user() == null)<li class="nav-item mx-2 d-lg-flex d-none"><a role="button" href="/login" class="border-2 secondary_btn p-2 px-4 rounded-2 rounded-pill py-2 text_shadow">Login</a></li>@else @if(Auth::user()->hasRole('student'))<li class="nav-item mx-2 d-lg-flex d-none"><a role="button" href="/dashboard" class="border-2 secondary_btn p-2 px-4 rounded-2 rounded-pill py-2 text_shadow @if(Request::is('change-syllabus')) active @endif">Dashboard</a></li>@elseif(Auth::user()->hasRole('parent'))<li class="nav-item mx-2 d-lg-flex d-none"><a role="button" href="/change-child" class="border-2 secondary_btn p-2 px-4 rounded-2 rounded-pill py-2 @if(Request::is('change-child')) active @endif">Dashboard</a></li>@elseif(Auth::user()->hasRole('instructor'))<li class="nav-item mx-2 d-lg-flex d-none"><a role="button" href="/instructor/dashboard" class="border-2 secondary_btn p-2 px-4 rounded-2 rounded-pill py-2 @if(Request::is('instructor/dashboard')) active @endif">Dashboard</a></li>@elseif(Auth::user()->hasRole('admin'))<li class="nav-item mx-2 d-lg-flex d-none"><a role="button" href="/admin/dashboard" class="border-2 d-inline-flex secondary_btn p-2 px-4 rounded-2 rounded-pill py-2 @if(Request::is('admin/dashboard')) active @endif">Dashboard</a></li>@elseif(Auth::user()->hasRole('teacher'))<li class="nav-item mx-2 d-lg-flex d-none"><a role="button" href="/change-child" class="border-2 secondary_btn p-2 px-4 rounded-2 rounded-pill py-2 @if(Request::is('change-child')) active @endif">Dashboard</a></li>@endif @endif</ul></div></div></nav><div class="offcanvas offcanvas-top vh-100" data-bs-scroll="true" tabindex="-1" id="offcanvasTop" aria-labelledby="offcanvasTopLabel"><div class="offcanvas-header customize_sidebar_header"><a aria-label="Home" class="text-decoration-none text-dark d-flex align-items-center" href="/"><img src="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->logo_path) }}" width="45" height="45" class="" alt="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->app_name) }}"> </a><button type="button" class="border-0 bg-transparent" data-bs-dismiss="offcanvas" aria-label="Close"><svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 24 24" style="stroke:#0f67f5"><path d="m16.192 6.344-4.243 4.242-4.242-4.242-1.414 1.414L10.535 12l-4.242 4.242 1.414 1.414 4.242-4.242 4.243 4.242 1.414-1.414L13.364 12l4.242-4.242z"></path></svg></button></div><hr><div class="offcanvas-body" style="list-style:none"><ul class="list-unstyled m-0"><li class="nav-item my-3"><a aria-label="Home" class="nav-link border-0 px-2" href="/">Home</a></li><li class="nav-item my-3"><a aria-label="Explore Pricings" class="nav-link border-0 px-2" href="/pricing">Pricings</a></li><li class="nav-item my-3"><a aria-label="Learn With Us" class="nav-link border-0 px-2 nav_dropdown_btn" data-bs-toggle="collapse" href="#learnWithUs" role="button" aria-expanded="false" aria-controls="learnWithUs">Learn With Us <svg xmlns="http://www.w3.org/2000/svg" class="dropdown_svg_icon" width="16" height="16" viewBox="0 0 24 24"><path d="M16.939 7.939 12 12.879l-4.939-4.94-2.122 2.122L12 17.121l7.061-7.06z"></path></svg></a><div class="collapse" id="learnWithUs"><div class="p-2"><a class="nav-link p-2 fw-normal text-white" href="{{ $isStudent ? '/quizzes' : '/login' }}">Quizzes</a> <a class="nav-link p-2 fw-normal text-white" href="{{ $isStudent ? '/learn-practice' : '/login' }}">Learn and Practise</a></div></div></li><li class="nav-item my-3"><a aria-label="Explore Tutors Eleven Plus" class="nav-link border-0 px-2 nav_dropdown_btn" data-bs-toggle="collapse" href="#exploreTutors" role="button" aria-expanded="false" aria-controls="exploreTutors">Explore Tutors 11+ <svg xmlns="http://www.w3.org/2000/svg" class="dropdown_svg_icon" width="16" height="16" viewBox="0 0 24 24"><path d="M16.939 7.939 12 12.879l-4.939-4.94-2.122 2.122L12 17.121l7.061-7.06z"></path></svg></a><div class="collapse" id="exploreTutors"><div class="p-2"><a class="nav-link p-2 fw-normal text-white" href="/blogs">Blogs</a> <a class="nav-link p-2 fw-normal text-white" href="/explore">Explore</a> <a class="nav-link p-2 fw-normal text-white" href="{{route('school_list' , ['page' => 1])}}">Schools</a></div></div></li><li class="nav-item my-3"><a aria-label="More For You" class="nav-link border-0 px-2 nav_dropdown_btn" data-bs-toggle="collapse" href="#moreforyou" role="button" aria-expanded="false" aria-controls="moreforyou">More For You <svg xmlns="http://www.w3.org/2000/svg" class="dropdown_svg_icon" width="16" height="16" viewBox="0 0 24 24"><path d="M16.939 7.939 12 12.879l-4.939-4.94-2.122 2.122L12 17.121l7.061-7.06z"></path></svg></a><div class="collapse" id="moreforyou"><div class="p-2"><a class="nav-link p-2 fw-normal text-white" href="/about">About Us</a> <a class="nav-link p-2 fw-normal text-white" href="/contact">Contact Us</a> <a class="nav-link p-2 fw-normal text-white" href="/help">Help & Support</a> <a class="nav-link p-2 fw-normal text-white" href="/reviews">Reviews</a></div></div></li></ul></div></div>

    <section class="school school_item_detail py-2">
        <div class="container-fluid col-lg-10 col-sm-12 col-md-11">
            <h1 class="display-5 fw-medium my-4">{{$school->name}}</h1>
            <div class="row">
                <div class="col-lg-8 col-md-12 col-sm-12">
                    <div class="text-center">
                        <img src="{{url($school->image)}}" alt="{{$school->name}}" class="rounded-4 img-fluid mb-5">
                    </div>
                    @if($school->about)
                        <div class="my-3">
                            <h2 class="text-capitalize">About {{$school->name}}</h2>
                            <div>{!!$school->about!!}</div>
                        </div>
                    @endif
                    @if($school->term_dates)
                        <div class="my-3 bg-body-secondary rounded-1 p-4">
                            <h2 class="text-capitalize">{{$school->name}} term dates</h2>
                            <div>{!!$school->term_dates!!}</div>
                        </div>
                    @endif
                    @if($school->how_to_apply)
                        <div class="my-3">
                            <h2 class="text-capitalize">How to apply to {{$school->name}}</h2>
                            <div>{!!$school->how_to_apply!!}</div>
                        </div>
                    @endif
                    @if($school->whats_on_school)
                        <div class="my-3 bg_primary text-white rounded-1 p-4">
                            <h2 class="text-capitalize">What's on the {{$school->name}} 11 plus?</h2>
                            <div style="color:#ffffff !important;">{!!$school->whats_on_school!!}</div>
                        </div>
                    @endif
                    @if($school->pass_mark_details)
                        <div class="my-3">
                            <h2 class="text-capitalize">What is the pass mark for {{$school->name}}?</h2>
                            <div>{!!$school->pass_mark_details!!}</div>
                        </div>
                    @endif
                    @if($school->admission_criteria_details)
                        <div class="my-3">
                            <h2 class="text-capitalize">{{$school->name}} admission criteria</h2>
                            <div>{!!$school->admission_criteria_details!!}</div>
                        </div>
                    @endif
                    @if($school->catchment_area_details)
                        <div class="my-3">
                            <h2 class="text-capitalize">{{$school->name}} catchment area</h2>
                            <div>{!!$school->catchment_area_details!!}</div>
                        </div>
                    @endif
                    <h2 class="fs-4 fw-normal mb-2 mt-4 text-dark-emphasis text-uppercase">School Details</h2>
                    <div class="mb-3 table-responsive">
                        <table class="table table-bordered table-striped table-hover mt-3">
                            <thead>
                                <tr>
                                    <th scope="col" class="fw-normal fs-6" >Type of School</th> 
                                    <td>{{$school->type}}</td>
                                </tr>
                            </thead>      
                            <tbody >
                                <tr>
                                <th scope="row" class="fw-normal fs-6" >Website</th>
                                <td><a href="{{$school->website}}" target="_blank">{{$school->website}}</a></td>
                                </tr>
                                <tr>
                                <th scope="row" class="fw-normal fs-6"  >Address</th>
                                <td>{{$school->address}}</td>
                                </tr>
                                <tr>
                                <th scope="row" class="fw-normal fs-6" >Phone</th>
                                <td>{{$school->phone}}</td>
                                </tr>
                                <th scope="row" class="fw-normal fs-6">Email</th>
                                <td><a href="mailto:{{$school->email}}" target="_blank">{{$school->email}}</a></td>
                                </tr>
                                </tr>
                                <th scope="row" class="fw-normal fs-6" >Location</th>
                                <td>
                                    <div id="map"></div>
                                </td>
                                </tr>
                                <th scope="row" class="fw-normal fs-6" >Region</th>
                                <td><a href="{{route('school_region',['region' => Illuminate\Support\Str::of($school->region)->slug('-')])}}">{{$school->region}}</a></td>
                                </tr>
                            </tbody>
                        </table> 
                        @if($school->admissions)
                            <h2 class="fs-4 fw-normal mb-2 mt-4 text-dark-emphasis text-uppercase">Admissions</h2>
                            <table class="table table-bordered  table-striped table-hover mt-3">
                                <tbody>
                                    @foreach(json_decode($school->admissions, true) as $key => $value)
                                        <tr>
                                            <th scope="col" class="fw-normal fs-6" >{{$key}}</th> 
                                            <td>{{$value}}</td>
                                        </tr>
                                    @endforeach
                                </tbody> 
                                
                            </table> 
                        @endif
                        @if($school->calendar)
                            <h2 class="fs-4 fw-normal mb-2 mt-4 text-dark-emphasis text-uppercase">Calendar</h2>
                            <table class="table table-bordered  table-striped table-hover mt-3">
                                <tbody>
                                    @foreach(json_decode($school->calendar, true) as $key => $value)
                                        <tr>
                                            <th scope="col" class="fw-normal fs-6" >{{$key}}</th> 
                                            <td>{{$value}}</td>
                                        </tr>
                                    @endforeach
                                </tbody> 
                                
                            </table> 
                        @endif
                        @if($school->academic_selection)
                            <h2 class="fs-4 fw-normal mb-2 mt-4 text-dark-emphasis text-uppercase">Academic Selection</h2>
                            <table class="table table-bordered  table-striped table-hover mt-3">
                                <tbody>
                                    @foreach(json_decode($school->academic_selection, true) as $key => $value)
                                        <tr>
                                            <th scope="col" class="fw-normal fs-6" >{{$key}}</th> 
                                            <td>{{$value}}</td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <th scope="col" class="fw-normal fs-6" >Admission Policy</th> 
                                        <td>
                                            <a href="{{$school->admission_policy}}" target="_blank" rel="noopener noreferrer">View</a>
                                        </td>
                                    </tr>
                                </tbody> 
                                
                            </table> 
                        @endif
                        @if(count($exam_boards) > 0)
                            <h2 class="fs-4 fw-normal mb-2 mt-4 text-dark-emphasis text-uppercase">Exam Boards</h2>
                            <ul>
                                @foreach($exam_boards as $board)
                                    <li class="my-2">{{$board}}</li>
                                @endforeach
                            </ul>
                        @endif
                        @if(count($exam_styles) > 0)
                            <h2 class="fs-4 fw-normal mb-2 mt-4 text-dark-emphasis text-uppercase">Exam Styles</h2>
                            <ul>
                                @foreach($exam_styles as $style)
                                    <li class="my-2">{{$style}}</li>
                                @endforeach
                            </ul>
                        @endif
                        @if($school->sample_papers)
                            <h2 class="fs-4 fw-normal mb-2 mt-4 text-dark-emphasis text-uppercase">Sample Papers</h2>
                            <table class="table table-bordered  table-striped table-hover mt-3">
                                <thead>
                                    <tr>
                                        <th>Name</th> 
                                        <th>Document or Link</th> 
                                        <th>Subjects</th> 
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach(json_decode($school->sample_papers, true) as $key => $value)
                                        <tr>
                                            <td>{{$value['name']}}</td>
                                            <td>
                                                <a href="{{$value['link']}}" target="_blank" rel="noopener noreferrer">View</a>
                                            </td>
                                            <td>{{$value['subjects']}}</td>
                                        </tr>
                                    @endforeach
                                </tbody> 
                                
                            </table> 
                        @endif
                        <a href="/login">
                            <img src="{{url('images/mocks-rectangle.png')}}" height="300px" class="img-fluid mb-4" alt="">
                        </a>
                    </div>
                    @if($school->faq)
                    <section class="faq_section">
                        <div class="faq_section_container pt-2 rounded-3">
                            <h2 class="m-0">Find answers to our frequently asked questions about {{$school->name}}</h2>
                            <div class="faq_question_section py-4">
                                <ul class="question_list list-unstyled faq_question_section px-0">
                                    @foreach(json_decode($school->faq, true) as $key => $value)
                                        <li class="question_item shadow-sm h-auto w-auto">
                                            <div class="faq_question p-3 fw-medium d-flex align-items-center justify-content-between border-bottom">
                                                <span class="font_medium">{{$key}}</span>
                                                <span class="plus_icon">
                                                <i class="fa fa-plus fa-sm revive_icon"></i>
                                                </span>
                                            </div>
                                            <div class="answer_parent">
                                                <div class="faq_answer bg-light bg-opacity-50 fw-normal p-3 d-flex align-items-center">{{$value}}</div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </section>
                    @endif
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 align-items-center justify-content-center">  

                    <div class="p-3 mx-auto">
                        <img src="{{url($school->logo)}}" class="img-fluid" alt="{{$school->name}}">
                            <div>
                            <a class="d-lg-none p-1"  data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseWidthExample">
                                <i class="fa-solid fa-plus plus-icon mt-3"> Schools </i>
                            </a> 
                            </div>
                        <div class="collapse  d-lg-block " id="collapseExample">
                            <div class="mt-2 p-1">
                                <a class="fw-light" href="{{route('school_list' , ['page' => 1])}}">Schools</a>
                            </div>
                            <div class="p-1">
                                <a class="fw-light" href="{{route('contact')}}">Contact us</a>
                            </div>
                            <div class="p-1">
                                <a class="fw-light" href="{{route('about')}}">About us</a>
                            </div>
                        </div>
                        <a class="d-lg-none p-1"  data-bs-toggle="collapse" data-bs-target="#collapseWidthExample" aria-expanded="false" aria-controls="collapseWidthExample">
                            <i class="fa-solid fa-plus plus-icon"> Region </i>
                        </a> 
                        <div class="collapse  d-lg-block " id="collapseWidthExample">
                            <div class="p-1 d-lg-block d-none">
                                <a class="fw-light">Regions</a>
                            </div>
                            @foreach($regions as $key => $region)
                                <div class="p-1">
                                    <a class="fw-light" href="{{route('school_region', ['region' => $region['slug']])}}">{{$region['name']}}</a>
                                </div>
                            @endforeach
                            <a class="fw-light" href="/login">
                                <img src="{{url('images/square2.png')}}" class="img-fluid" alt="">
                            </a>
                            <div class="mt-2 p-1">
                                <a class="fw-light" href="{{route('privacyPolicy')}}">Privacy policy</a>
                            </div>
                            <div class="p-1">
                                <a class="fw-light" href="{{route('cookiePolicy')}}">Cookie policy</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- footer  -->
    @include('components.home-footer')
    <!-- old api key AIzaSyCJJezTGMGy8KcosHg77frJkmUq-bim3OI -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyClDGFnyszA_dpXvvYW63HqTSOvz04JJps&libraries=places"></script>
    <script>
        $(document).ready(function() {
            $('.plus-icon').click(function() {
                $(this).toggleClass('fa-plus fa-minus');
            });
            $(".question_item").click(function(){let s=$(this),n=s.find(".answer_parent"),a=s.find(".plus_icon i");$(a).hasClass("revive_icon")?($(".question_item").removeClass("active"),$(".answer_parent").slideUp(300),s.addClass("active"),$(a).addClass("transform_icon").removeClass("revive_icon"),$(n).slideDown()):$(a).hasClass("transform_icon")&&(s.removeClass("active"),$(a).addClass("revive_icon").removeClass("transform_icon"),$(n).slideUp(300)),$(".question_item").not(s).removeClass("active"),$(".plus_icon i").not(a).removeClass("transform_icon").addClass("revive_icon")});
        });
        // Initialize and add the map
        let map;

        async function initMap() {
        lat = {!! str_replace("'", "\'", json_encode($lat)) !!};
        lng = {!! str_replace("'", "\'", json_encode($lon)) !!};
        // The location of Uluru
        const position = { lat: lat, lng: lng};
        // Request needed libraries.
        //@ts-ignore
        const { Map } = await google.maps.importLibrary("maps");
        const { AdvancedMarkerElement } = await google.maps.importLibrary("marker");

        // The map, centered at Uluru
        map = new Map(document.getElementById("map"), {
            zoom: 15,
            center: position,
            mapId: "School",
        });

        // The marker, positioned at Uluru
        const marker = new AdvancedMarkerElement({
            map: map,
            position: position,
            title: "School",
        });
        }

        initMap();
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
        integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD"
        crossorigin="anonymous"></script>
      
</body>

</html>