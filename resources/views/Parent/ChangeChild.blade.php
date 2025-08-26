<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Dashboard - Parent Portal | {{ app(\App\Settings\SiteSettings::class)->app_name }}</title>
    <!-- rel icon -->
    <link rel="icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}">
    <meta name="description" content="{{ app(\App\Settings\SiteSettings::class)->seo_description }}">
    <meta name="author" content="{{ app(\App\Settings\SiteSettings::class)->app_name }}">         
    <!-- preconnect links  -->
    <link rel="preload" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"  as="style" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="preconnect" href="https://googleads.g.doubleclick.net">
    <link rel="preconnect" href="https://td.doubleclick.net">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://www.google-analytics.com">
    <!-- css links  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flat-ui/2.3.0/css/flat-ui.min.css" integrity="sha512-6f7HT84a/AplPkpSRSKWqbseRTG4aRrhadjZezYQ0oVk/B+nm/US5KzQkyyOyh0Mn9cyDdChRdS9qaxJRHayww=="  crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <style>
        .overview_section {height: auto;width: auto;margin: 2rem auto !important;}.heading_separator {height: 0.4rem;width: 120px;background: var(--portal-secondary);border-radius: 20rem;}.overview_cards {height: auto;width: auto; background: #fff;transition: 0.25s; box-shadow: 0px 4px 10px 0px #00000024}.overview_cards:hover {transform: translateY(-5px); box-shadow: 0px 7px 13px 0px #00000040 }.overview_cards_image {height: 80px;width: 80px;display: flex;align-items: center;justify-content: center;}.select-dropdown {position: relative;display: block;width: 100%;}.select-dropdown__button {padding: 10px 35px 10px 15px;background-color: #fff;color: #616161;border: 1px solid #cecece;border-radius: 3px;cursor: pointer;width: 210px;text-align: left;}.select-dropdown__button::focus {outline: none;}.select-dropdown__button .zmdi-chevron-down {position: absolute;right: 10px;top: 12px;}.select-dropdown__list {position: absolute;display: block;left: 0;right: 0;max-height: 300px;overflow: auto;margin: 0;padding: 0;list-style-type: none;opacity: 0;pointer-events: none;transform-origin: top left;transform: scale(1, 0);transition: all ease-in-out 0.3s;z-index: 2;}.select-dropdown__list-item {display: block;list-style-type: none;padding: 10px 15px;background: #fff;border-top: 1px solid #e6e6e6;font-size: 14px;line-height: 1.4;cursor: pointer;color: #616161;transition: all ease-in-out 0.3s;}.greeting_section {height: auto;width: auto;margin: 2rem auto !important;background: linear-gradient(45deg, #005fba, #40a2ff);}.performance_section {height: auto;width: auto;margin: 2rem auto !important;}.performance_card {min-height: 200px; box-shadow: 0px 3px 8px 0px #0000006e} .master_performance_card {background: radial-gradient(#bb76dd, #9141c9) !important;}.poor_performance_card {background: radial-gradient(#85dc99, #589967) !important;}.good_performance_card {background: radial-gradient(#1e96ff, #084ddc) !important;}.average_performance_card {background: radial-gradient(#ffc352, #e79700) !important}.practice_banner {height: auto;width: auto;margin: 3rem auto !important;background: linear-gradient(289deg, #0000001c, #0000008f), url(../images/set_practice_bg.jpg) center no-repeat;background-size: cover;}.course_card {box-shadow: 0px 3px 5px 0px #0000001a !important;transition: 0.25s;}.course_card:hover {transform: translateY(-5px); box-shadow: 0px 6px 10px 0px #0000002e !important }.btn_secondary {background: linear-gradient(358deg, #ef8f00, var(--portal-secondary)) !important;color: #fff !important;}.btn_secondary_outlined {background: transparent !important;color: #fff !important;border: 2px solid var(--portal-secondary) !important;transition: 0.25s;}.btn_secondary_outlined:hover {background: linear-gradient(358deg, #ef8f00, var(--portal-secondary)) !important;color: #fff !important;}.top_circle_shade {height: 120px;width: 120px;background: #ffffff1a;position: absolute;top: -35px;right: -55px;}.disable_screen {background: #ffffff54 !important;z-index: 99999 }.refferal_section {background: linear-gradient(45deg, #005fba, #40a2ff);border-radius: 1.3rem }ul {list-style-type: none;}a, a:hover {text-decoration: none;}body .testimonial {padding: 10px 0;}body .testimonial .row .tabs {all: unset;margin-right: 50px;display: flex;flex-direction: column;}body .testimonial .row .tabs li {all: unset;display: block;position: relative;}body .testimonial .row .tabs li.active::before {position: absolute;content: "";width: 50px;height: 50px;background-color: #71b85f;border-radius: 50%;}body .testimonial .row .tabs li.active::after {position: absolute;content: "";width: 30px;height: 30px;background-color: #71b85f;border-radius: 50%;}body .testimonial .row .tabs li:nth-child(1) {align-self: flex-end;}body .testimonial .row .tabs li:nth-child(1)::before {left: 110%;bottom: -50px;}body .testimonial .row .tabs li:nth-child(1)::after {left: 97%;bottom: 130px;}body .testimonial .row .tabs li:nth-child(1) figure img {margin-left: auto;}body .testimonial .row .tabs li:nth-child(2) {align-self: flex-start;}body .testimonial .row .tabs li:nth-child(2)::before {right: 0px;top: 16%;left:336px;}body .testimonial .row .tabs li:nth-child(2)::after {bottom: 155px;border-radius: 50%;right: -120px;left:304px;}body .testimonial .row .tabs li:nth-child(2) figure img {margin-right: auto;max-width: 300px;width: 100%;margin-top: -50px;}body .testimonial .row .tabs li:nth-child(3) {align-self: flex-end;}body .testimonial .row .tabs li:nth-child(3)::before {right: 0px;top: -57%;left:145px;}body .testimonial .row .tabs li:nth-child(3)::after {top: -127px;border-radius: 50%;right: -40px;left:197px;}body .testimonial .row .tabs li:nth-child(3) figure img {margin-left: auto;margin-top: -50px;}body .testimonial .row .tabs li:nth-child(3):focus {border: 10px solid red;}body .testimonial .row .tabs li figure {position: relative;}body .testimonial .row .tabs li figure img {display: block;}body .testimonial .row .tabs li figure::after {content: "";position: absolute;top: 0;z-index: -1;width: 100%;height: 100%;border: 4px solid #dff9d9;border-radius: 50%;-webkit-transform: scale(1);-ms-transform: scale(1);transform: scale(1);-webkit-transition: 0.3s;-o-transition: 0.3s;transition: 0.3s;}body .testimonial .row .tabs li figure:hover::after {-webkit-transform: scale(1.1);-ms-transform: scale(1.1);transform: scale(1.1);}body .testimonial .row .tabs.carousel-indicators li.active figure::after {-webkit-transform: scale(1.1);-ms-transform: scale(1.1);transform: scale(1.1);}body .testimonial .row .carousel > h3 {font-size: 20px;line-height: 1.45;color: rgba(0, 0, 0, 0.5);font-weight: 600;margin-bottom: 0;}body .testimonial .row .carousel h1 {font-size: 40px;line-height: 1.225;margin-top: 23px;font-weight: 700;margin-bottom: 0;}body .testimonial .row .carousel .carousel-indicators {all: unset;padding-top: 10px;display: flex;list-style: none;}body .testimonial .row .carousel .carousel-indicators li {background: #000;background-clip: padding-box;height: 2px;}body .testimonial .row .carousel .carousel-inner .carousel-item .quote-wrapper {margin-top: 20px;}@media only screen and (max-width: 1200px) {body .testimonial .row .tabs {margin-right: 25px;}}.trophy{bottom:-117px;right:52px;}.banner_image{display:none }@media (max-width:768px) {.banner_image{display:flex }.trophy{display:none }}@media (max-width: 991px) {.responsive_image {display: none !important }}.selectChild:hover {scale: 1.01 !important;}.btn_card_login_customized {border: 1px solid var(--portal-primary) !important;background: var(--portal-primary) !important;border-radius: 5px;color: #fff !important;}.cursor-not-allowed {cursor: not-allowed !important;}img {max-width: 100%;}ul {list-style: none;}.select-dropdown {position: relative;display: block;width: 100%;}.select-dropdown__button {padding: 10px 35px 10px 15px;background-color: #fff;color: #616161;border: 1px solid #cecece;border-radius: 3px;cursor: pointer;width: 210px;text-align: left;}.select-dropdown__button::focus {outline: none;}.select-dropdown__button .zmdi-chevron-down {position: absolute;right: 10px;top: 12px;}.select-dropdown__list {position: absolute;display: block;left: 0;right: 0;max-height: 300px;overflow: auto;margin: 0;padding: 0;list-style-type: none;opacity: 0;pointer-events: none;transform-origin: top left;transform: scale(1, 0);transition: all ease-in-out 0.3s;z-index: 2;}.select-dropdown__list.active {opacity: 1;pointer-events: auto;transform: scale(1, 1);}.select-dropdown__list-item {display: block;list-style-type: none;padding: 10px 15px;background: #fff;border-top: 1px solid #e6e6e6;font-size: 14px;line-height: 1.4;cursor: pointer;color: #616161;transition: all ease-in-out 0.3s;}.answer_parent{display:none}.revive_icon{transition:.3s;transform:rotate(0);color:#74a244}.transform_icon{transition:.3s;transform:rotate(135deg);color:#c41e1ee6}.question.active::after{color:var(--secondary)!important;transform:rotate(45deg)}.question::after{content:"\002B";font-size:2.2rem;position:absolute;right:20px;transition:.2s}{background-color:#fff;color:#000;border-radius:20px;box-shadow:0 1px 4px 2px rgb(0 0 0 / 17%);margin:20px 0}.question{font-size:1.2rem;padding:20px 80px 20px 20px;position:relative;display:flex;align-items:center;cursor:pointer}.answercont{max-height:0;overflow:hidden;transition:.3s}.answer{padding:0 20px 20px;color:#444}
    </style>
</head>
<body>
    @include('sidebar')
    @include('header')
    @if (count($childs) > 0)<div class="col-12 p-0">
    <div class="greeting_section rounded-5 p-4 pt-lg-4 pt-md-4 pt-5 pb-0 row align-items-end">
        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
            <h1 class="fw-medium h2 mt-3 my-1 text-capitalize text-white">Welcome back, {{auth()->user()->first_name}}</h1>
            <p class="fw-light text-white">You are in control now. Track and manage your child's portal information.</p>
            <div class="my-4">
                <h2 class="fw-normal h4 my-1 mb-2 text-capitalize text-white">Select Child</h2>
                <div class="mx-auto select_child_container">
                @if (count($childs) > 0)
                <div class="select-dropdown mx-auto">
                    <button href="#" role="button" data-value="4" class="bg-transparent border-2 border-white d-flex justify-content-between rounded-3 select-dropdown__button shadow-sm text-center text-dark text-white w-100">@if(session()->has("selected_child"))<span>{{session('selected_child')['name']}}</span>@else<span>{{$childs[0]['name']}}</span>@endif<i class="bx bx-chevron-down"></i></button>
                    <ul class="select-dropdown__list shadow-lg">
                        @foreach ($childs as $key => $item)
                        <li class="select-dropdown__list-item d-flex align-items-center selectChild" data-value="1" data-id="{{ $item['id'] }}" data-name="{{ $item['name'] }}" data-email="{{ $item['email'] }}">
                        <!-- <img src="{{$item['profile_photo']}}" height="40" width="40" class="rounded-circle shadow me-2" alt="Profile photo of {{$item['name']}}">{{$item['name']}} -->
                        <div class="rounded-circle profile-view shadow me-2" style="height: 45px; width: 45px; background: url('{{$item['profile_photo']}}') center top no-repeat; background-size: cover;"></div>{{$item['name']}}
                    </li>
                        @endforeach
                        <li class="select-dropdown__list-item d-flex align-items-center">
                            <a href="/create-student-account"   class="text-decoration-none w-100">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" style="fill:#005fce">
                                <path d="M13 7h-2v4H7v2h4v4h2v-4h4v-2h-4z"></path>
                                <path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm0 18c-4.411 0-8-3.589-8-8s3.589-8 8-8 8 3.589 8 8-3.589 8-8 8z"></path>
                            </svg>
                            <span class="ms-2 text-dark">Add New Child</span>
                            </a>
                        </li>
                    </ul>
                </div>
                @else
                <div class="select-dropdown mx-auto">
                    <button href="#" role="button" data-value="4" class="bg-transparent border-2 border-white d-flex justify-content-between rounded-3 select-dropdown__button shadow-sm text-center text-dark text-white w-100"><span>Add New Child</span><i class="zmdi zmdi-chevron-down"></i></button>
                    <ul class="select-dropdown__list shadow-lg">
                        <li data-value="1" class="select-dropdown__list-item">Select Your Child</li>
                    </ul>
                </div>
                @endif
                </div>
            </div>
            <div class="mb-4">@if(session()->has("selected_child"))<button class="btn btn_secondary p-3 py-2 loginChild login_loader" data-email="{{session('selected_child')['email']}}">Login as {{session('selected_child')['name']}}<span class="spinner-border d-none spinner-border-sm" aria-hidden="true"></span></button>@else<button class="btn btn_secondary p-3 py-2 loginChild login_loader" data-email="{{$childs[0]['email']}}">Login as {{$childs[0]['name']}}<span class="spinner-border d-none spinner-border-sm" aria-hidden="true"></span></button>@endif</div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-12 text-lg-end text-md-end text-center"><img src="{{url('images/parent_portal_header.webp')}}" height="auto" width="280" class="parent_portal_banner_image" alt="an happy parent cartoon couple with learning concept"></div>
    </div>
    <section class="overview_section">
        <div class="mb-4">
            <h2 class="fw-medium mb-1 mt-4 mt-lg-5 mt-md-5 text-capitalize text-dark">Activity Overview</h2>
            <div class="heading_separator"></div>
        </div>
        <div class="row justify-content-around align-items-center my-2">
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="overview_cards p-3 rounded-4 my-3">
                    <img src="{{url('images/questions_marks_icon.webp')}}" width="50" height="50" alt="questions marks icon">
                    <div class="overview_cards_details">
                        <h2 class="h3 my-1 text-dark">{{$correct_questions}}<span class="fs-5">/{{$total_questions}}</span> <span class="fs-5">&nbsp;Q's</span></h2>
                        <p class="text-uppercase m-0 border-bottom small text-dark">Correct Answers 
                            @if($correct_questions > 0)
                                <span>{{ number_format(($correct_questions / $total_questions) * 100, 2) }}%</span>
                            @endif
                        </p>
                        <p class="my-1 small text-dark-emphasis">Track the total correct answers in practise sets</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="overview_cards p-3 rounded-4 my-3">
                    <img src="{{url('images/stopwatch_icon.webp')}}" width="50" height="50" alt="stopwatch icon">
                    <div class="overview_cards_details">
                        <h2 class="h3 my-1 text-dark">{{ $total_time_spent ? (int)$total_time_spent['time'] : 0}}<span class="fs-5">&nbsp;{{ $total_time_spent ? $total_time_spent['format_type'] : 'sec'}}</span></h2>
                        <p class="text-uppercase m-0 border-bottom small text-dark">Time Spent</p>
                        <p class="my-1 small text-dark-emphasis">Track the total time spent in practise sets.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="overview_cards p-3 rounded-4 my-3">
                    <img src="{{url('images/practice_brain_icon.webp')}}" width="50" height="50" alt="practice brain icon">
                    <div class="overview_cards_details">
                        <h2 class="h3 my-1 text-dark">{{$count_parent_practice}}<span class="fs-5">&nbsp;Sets</span></h2>
                        <p class="text-uppercase m-0 border-bottom small text-dark">Parent Pratices</p>
                        <p class="my-1 small text-dark-emphasis">Track the total practise sets details of your child.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="overview_cards p-3 rounded-4 my-3">
                    <img src="{{url('images/learning_journey_icon.webp')}}" width="50" height="50" alt="learning journey icon">
                    <div class="overview_cards_details">
                        <h2 class="h3 my-1 text-dark">{{$completed_journey}}<span class="fs-5">&nbsp;%</span></h2>
                        <p class="text-uppercase m-0 border-bottom small text-dark">Journey Completed</p>
                        <p class="my-1 small text-dark-emphasis">Track the total journey's completed by your child.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="overview_cards p-3 rounded-4 my-3">
                    <img src="{{url('images/questions_marks_icon.png')}}" width="50" height="50" alt="learning journey icon">
                    <div class="overview_cards_details">
                        <h2 class="h3 my-1 text-dark">{{$journeyAnalysis['correct_questions']}}<span class="fs-5">/{{$journeyAnalysis['total_questions']}}</span> <span class="fs-5">&nbsp;Q's</span></h2>
                        <p class="text-uppercase m-0 border-bottom small text-dark">Journey Correct Answers
                            @if($journeyAnalysis['correct_questions'] > 0)
                                <span>{{ number_format(($journeyAnalysis['correct_questions'] / $journeyAnalysis['total_questions']) * 100, 2) }}%</span>
                            @endif
                        </p>
                        <p class="my-1 small text-dark-emphasis">Track the total correct answers in journey sets.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="overview_cards p-3 rounded-4 my-3">
                    <img src="{{url('images/time_spent.webp')}}" width="50" height="50" alt="learning journey icon">
                    <div class="overview_cards_details">
                        <h2 class="h3 my-1 text-dark">{{ $journeyAnalysis['formatted_total_time_spent'] ? (int)$journeyAnalysis['formatted_total_time_spent']['time'] : 0 }}<span class="fs-5">&nbsp;{{ $journeyAnalysis['formatted_total_time_spent']['format_type'] }}</span></h2>
                        <p class="text-uppercase m-0 border-bottom small text-dark">Journey Time Spent</p>
                        <p class="my-1 small text-dark-emphasis">Track the total time spent in learning journey.</p>
                    </div>
                </div> 
            </div> 
        </div>
    </section>
    @if(isset($mastery_level))
    <div class="performance_section">
        <div class="mb-4">
            <h2 class="fw-medium mb-1 mt-4 mt-lg-5 mt-md-5 text-capitalize text-dark">Performance</h2>
            <div class="heading_separator"></div>
        </div>
        <div class="row justify-content-center">
            @foreach($mastery_level as $sec)
            <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                <a href="{{route('parent_performance', ['id' => $sec['id']])}}" class="text-decoration-none">
                    <div class="performance_card rounded-4 p-4 d-flex align-items-center position-relative overflow-hidden @if($sec['mastery_level'] == 'Strong') master_performance_card @elseif($sec['mastery_level'] == 'Master') poor_performance_card @elseif($sec['mastery_level'] == 'Good') good_performance_card @elseif($sec['mastery_level'] == 'Needs Practice') average_performance_card @endif">
                        <div>
                            <h2 class="fs_cs_5 fw-normal my-1 text-white">{{$sec['mastery_level']}}</h2>
                            <h2 class="fw-medium h5 text-white">
                                @if(str_contains($sec['name'], 'Maths'))
                                    Maths
                                @elseif(str_contains($sec['name'], 'English'))
                                    English
                                @elseif(str_contains($sec['name'], 'Non-Verbal'))
                                    Non-Verbal
                                @elseif(str_contains($sec['name'], 'Verbal'))
                                    Verbal
                                @elseif(str_contains($sec['name'], 'Science'))
                                    Science
                                @endif
                            </h2>
                            <p class="fw-light fs-6 text-white mt-3">Assess your child's progress in this @if(str_contains($sec['name'], 'Maths')) Mathematics @elseif(str_contains($sec['name'], 'English')) English @elseif(str_contains($sec['name'], 'Verbal')) Verbal Reasoning @endif.</p>
                            <div class="top_circle_shade rounded-circle"></div>
                        </div>  
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
    @endif
    <div class="practice_banner rounded-5 p-5">
        <div class="col-12 col-lg-6 col-md-8">
            <h2 class="my-2 text-capitalize text-white" style="letter-spacing:1.5px">Hey {{auth()->user()->first_name}} {{auth()->user()->last_name}},</h2>
            <p class="fs_cs_5 fw-light my-2 text-white">Let's create some custom question sets to empower your child's academic journey with targeted question sets, ensuring Personalised learning, mastery of subjects, and academic excellence.</p>
            <a   href="/parent-set/section" class="text-white border-2 btn btn_secondary_outlined btn-sm my-2 p-3 py-2">Get Started</a>
        </div>
    </div>
    <section class="progress_cards my-5">
        <div class="mb-4">
            <h2 class="fw-medium h3 mb-1 mt-4 mt-lg-5 mt-md-5 text-capitalize text-dark">Your Child's Progress</h2>
            <div class="heading_separator"></div>
        </div>
        <div class="row align-item-center justify-content-center">
            <div class="col-lg-4 col-md-6 col-sm-12 my-3">
                <div class="course_card bg-white p-4 d-flex align-items-center rounded-4">
                <img src="{{url('images/exam.webp')}}" height="60" width="60" alt="exam attempts">
                <div class="ms-3 w-100">
                    <h2 class="text-dark h5">Exam progress</h2>
                    <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                        <div class="progress-bar" style="width:{{$exam_total}}%;"></div>
                    </div>
                    <p class="mt-1 fs-6">Overall:<span class="text-dark">{{$exam_total}}%</span></p>
                </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 my-3">
                <div class="course_card bg-white p-4 d-flex align-items-center rounded-4">
                <img src="{{url('images/quiz.webp')}}" height="60" width="60" alt="quiz attempts">
                <div class="ms-3 w-100">
                    <h2 class="text-dark h5">Quiz progress</h2>
                    <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                        <div class="progress-bar" style="width:{{$quiz_total}}%;"></div>
                    </div>
                    <p class="mt-1 fs-6">Overall:<span class="text-dark">{{$quiz_total}}%</span></p>
                </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 my-3">
                <div class="course_card bg-white p-4 d-flex align-items-center rounded-4">
                <img src="{{url('images/practice.webp')}}" height="60" width="60" alt="practice attempts">
                <div class="ms-3 w-100">
                    <h2 class="text-dark h5">Journey progress</h2>
                    <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                        <div class="progress-bar" style="width:{{$completed_journey}}%;"></div>
                    </div>
                    <p class="mt-1 fs-6">Overall:<span class="text-dark">{{$completed_journey}}%</span></p>
                </div>
                </div>
            </div>
        </div>
    </section>
    </div>
    <div class="disable_screen position-fixed top-0 end-0 start-0 bottom-0 vh-100 w-100 d-none"></div>
    @else
    <div class="col-12 p-0">
    <div class="greeting_section rounded-5 p-4 pt-lg-4 pt-md-4 pt-5 pb-0 row align-items-center my-5">
        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
            <h1 class="fw-medium h2 mt-3 my-1 text-capitalize text-white">Welcome, {{auth()->user()->first_name}}</h1>
            <p class="fw-light text-white">Welcome to your Parent Portal at {{ app(\App\Settings\SiteSettings::class)->app_name }}! Take control of your child's educational journey by managing, tracking, and updating their data. Get started by creating an account for your student.</p>
            <div class="my-4"><a   href="/create-student-account" class="btn btn_secondary text-white p-2 px-3">Create Student Account</a></div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-12 text-lg-end text-md-end text-center"><img src="{{url('images/parent_portal_header.webp')}}" height="auto" width="280" class="parent_portal_banner_image" alt="an happy parent cartoon couple with learning concept"></div>
    </div>
    <section class="my-5">
        <h2 class="h2 text-dark my-2">Enhanced Learning Features</h2>
        <p class="fs-5 text-dark my-2">Elevate Learning of Your Child with Our Exclusive Features. Stay on top of your academic progress with our real-time tracking feature</p>
        <div class="row align-items-center justify-content-center my-4">
            <div class="col-lg-4 col-md-6 col-sm-10 col-12 my-3">
                <div class="features p-4 bg-white rounded-5 shadow">
                <img src="images/sets.png" width="50" height="50" alt="" class="">
                <h2 class="fs-3 my-2">Sets</h2>
                <p>Unlock Your Child's Pathway to Mastery and Confidence in Every Subject with {{ app(\App\Settings\SiteSettings::class)->app_name }}</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-10 col-12 my-3">
                <div class="features p-4 bg-white rounded-5 shadow">
                <img src="images/currriculum.png" width="50" height="50" alt="">
                <h2 class="fs-3 my-2">Curriculum</h2>
                <p>Stay informed about academic performance, achievements and track progress of your child.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-10 col-12 my-3">
                <div class="features p-4 bg-white rounded-5 shadow">
                <img src="images/mastery-level.png" width="50" height="50" alt="">
                <h2 class="fs-3 my-2">Mastery Level</h2>
                <p>Assess mastery level – a gauge of proficiency and understanding of your child in each subject</p>
                </div>
            </div>
        </div>
    </section>
    <section class="elearning_platform my-5">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-5 col-md-12 col-sm-12 text-center"><img src="{{url('images/start_learning_journey.png')}}" height="auto" width="400" class="responsive_image" alt="e-learning concept"></div>
            <div class="col-lg-7 col-md-12 col-sm-12">
                <h2 class="my-2">Kickstart 11+ Learning Journey</h2>
                <p class="fs-5">Register now for a Personalised learning experience. Unleash a rich tapestry of knowledge, interactive courses, and tailored support to propel your child towards 11+ academic excellence. Get Started Now!</p>
                <a   href="/create-student-account" class="btn btn_secondary p-2 px-3 my-3">Register Now</a>
            </div>
        </div>
    </section>
    <section class="faq_section">
        <div class="faq_section_container pt-2 rounded-3">
            <h2 class="my-4">Have queries? get answers</h2>
            <div class="row align-items-center">
                <div class="col-lg-8 col-md-12 col-sm-12 col-12">
                <div class="faq_question_section py-4">
                    <ul class="question_list list-unstyled faq_question_section py-4 px-0"><li class="question_item shadow-sm h-auto w-auto"><div class="faq_question p-3 fw-medium d-flex align-items-center justify-content-between border-bottom"><span class="font_medium">{{app(\App\Settings\Helpsettings::class)->faqs[0][0]}}</span><span class="plus_icon"><i class="fa fa-plus fa-sm revive_icon"></i></span></div><div class="answer_parent"><div class="faq_answer bg-light bg-opacity-50 fw-normal p-3 d-flex align-items-center">{{app(\App\Settings\Helpsettings::class)->faqs[0][1]}}</div></div></li><li class="question_item shadow-sm h-auto w-auto"><div class="faq_question p-3 fw-medium d-flex align-items-center justify-content-between border-bottom"><span class="font_medium">{{app(\App\Settings\Helpsettings::class)->faqs[1][0]}}</span><span class="plus_icon"><i class="fa fa-plus fa-sm revive_icon"></i></span></div><div class="answer_parent"><div class="faq_answer bg-light bg-opacity-50 fw-normal p-3 d-flex align-items-center">{{app(\App\Settings\Helpsettings::class)->faqs[1][1]}}</div></div></li><li class="question_item shadow-sm h-auto w-auto"><div class="faq_question p-3 fw-medium d-flex align-items-center justify-content-between border-bottom"><span class="font_medium">{{app(\App\Settings\Helpsettings::class)->faqs[2][0]}}</span><span class="plus_icon"><i class="fa fa-plus fa-sm revive_icon"></i></span></div><div class="answer_parent"><div class="faq_answer bg-light bg-opacity-50 fw-normal p-3 d-flex align-items-center">{{app(\App\Settings\Helpsettings::class)->faqs[2][1]}}</div></div></li><li class="question_item shadow-sm h-auto w-auto"><div class="faq_question p-3 fw-medium d-flex align-items-center justify-content-between border-bottom"><span class="font_medium">{{app(\App\Settings\Helpsettings::class)->faqs[4][0]}}</span><span class="plus_icon"><i class="fa fa-plus fa-sm revive_icon"></i></span></div><div class="answer_parent"><div class="faq_answer bg-light bg-opacity-50 fw-normal p-3 d-flex align-items-center">{{app(\App\Settings\Helpsettings::class)->faqs[4][1]}}</div></div></li></ul>
                </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 col-12 d-flex justify-content-center"><img loading="lazy" src="{{url('images/faq_section.png')}}" alt="3d faq image" height="283" width="377" class="learning-image img-fluid"></div>
            </div>
        </div>
    </section>
    </div>
    @endif

    @include('parentsidebar.sidebarending')
    <script>
        $.ajaxSetup({
            headers: {
                "X-CSRF-Token": $("meta[name=token]").attr("content")
            }
        }), $(".selectChild").click(function() {
            reqData = {
                childId: $(this).data("id"),
                childName: $(this).data("name"),
                childEmail: $(this).data("email")
            }, $.ajax({
                type: "POST",
                url: "/change-child",
                data: {
                    reqData,
                    _token: "{{ csrf_token() }}"
                },
                success: function(t) {
                    $(".loginChild").text("Login as " + t.name).attr("data-email", t.email), window.location.href = window.location.href
                },
                error: function(t, a, e) {
                    console.log(t)
                }
            })
        }), $(".loginChild").click(function() {
            var t = {
                email: $(this).data("email")
            };
            $.ajax({
                type: "GET",
                url: "/switch-to-child",
                data: {
                    reqData: t,
                    _token: "{{ csrf_token() }}"
                },
                success: function(t) {
                    window.location.href = "/dashboard"
                },
                error: function(t, a, e) {
                    console.log(t)
                }
            })
        }), $(".buy_plan").click(function() {
            var t = {
                email: $(this).data("email")
            };
            $.ajax({
                type: "GET",
                url: "/switch-to-child",
                data: {
                    reqData: t,
                    _token: "{{ csrf_token() }}"
                },
                success: function(t) {
                    window.location.href = "/select-plan"
                },
                error: function(t, a, e) {
                    console.log(t)
                }
            })
        }), $(document).ready(function() {
            let t = $(".profile_dropdown_button img").attr("src");
            $(".parent_profile_image").attr("src", t)
        }), $(".select-dropdown__button").on("click", function() {
            $(".select-dropdown__list").toggleClass("active")
        }), $(".select-dropdown__list-item").on("click", function() {
            var t = $(this).data("value");
            console.log(t), $(".select-dropdown__button span").text($(this).text()).parent().attr("data-value", t), $(".select-dropdown__list").toggleClass("active")
        }), $(".login_loader").click(function() {
            $(this).find(".spinner-border").removeClass("d-none"), $(".disable_screen").removeClass("d-none")
        }), $(document).ready(function() {
            $(".testimonial .indicators li").click(function() {
                var t = $(this).index(),
                    a = $(".testimonial .tabs li");
                a.eq(t).addClass("active"), a.not(a[t]).removeClass("active")
            }), $(".testimonial .tabs li").click(function() {
                var t = $(".testimonial .tabs li");
                t.addClass("active"), t.not($(this)).removeClass("active")
            }), $(".slider .swiper-pagination span").each(function(t) {
                $(this).text(t + 1).prepend("0")
            })
        });
        $(".question_item").click(function() {
            let s = $(this),
                n = s.find(".answer_parent"),
                a = s.find(".plus_icon i");
            $(a).hasClass("revive_icon") ? ($(".question_item").removeClass("active"), $(".answer_parent").slideUp(300), s.addClass("active"), $(a).addClass("transform_icon").removeClass("revive_icon"), $(n).slideDown()) : $(a).hasClass("transform_icon") && (s.removeClass("active"), $(a).addClass("revive_icon").removeClass("transform_icon"), $(n).slideUp(300)), $(".question_item").not(s).removeClass("active"), $(".plus_icon i").not(a).removeClass("transform_icon").addClass("revive_icon")
        });
    </script>
</body>

</html>
