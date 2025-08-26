<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ url('Frontend_css/masterylevel.css') }}">
    <title>MasteryLevel</title>
    <!-- rel icon -->
    <link rel="icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}">
    <meta name="description" content="{{ app(\App\Settings\SiteSettings::class)->seo_description }}">
    <meta name="author" content="{{ app(\App\Settings\SiteSettings::class)->app_name }}">
    <style>
        .mastery_level{max-width: 190px;height: 10px;}
        .mastery_level .col-4{padding:0 2px !important;}
        .transform_arrowUp {transition: 0.3s; transform: rotate(180deg)}
        .transform_arrowDown {transition: 0.3s; transform: rotate(0deg)} 
        .w_100 {min-width: 100px}
        .w_200 {min-width: 200px}
        .w_250 {min-width: 250px}
        .mastery_table_btn {background: #f8f8f8!important;}
        .mastery_cards_container {
            height: auto;
            width: auto;
            margin: 3rem auto;
        }
        .greeting_section {
            height: auto;
            width: auto;
            margin: 2rem auto !important;
            background: linear-gradient(53deg, #003e97, #1da9ff);
        }
        .strong_level {border-top: 3px solid red;}
        .topics_card {background: linear-gradient( to top , red , green)}
        .performance_card {transition: 0.25s;overflow: hidden}
        .performance_card:hover {scale: 1.04}
        .master_performance_card {background: radial-gradient(#cd82f2, #8d46bf) !important;}
        .good_performance_card {background: radial-gradient(#85dc99, #589967) !important;}
        .average_performance_card {background: radial-gradient(#ffdc64, #e19b00) !important;}
        .not_atttempt_performance_card {background: radial-gradient(#54a2ff, #1d6ecd) !important;}
        .not_set_performance_card {background: radial-gradient(#ea6868, #c83838) !important;}
        .card_shade {
            height: 120px;
            width: 120px;
            border-radius: 50rem;
            background: #ffffff36;
            bottom: 45px;
            right: -65px;
            opacity: 0.6;
        }
        .select_subject{border: 2px solid #ffffff;width:200px}
        .select_subject.active{border: 2px solid #0e6efb !important;}
        .mastery_level_bar{height: 7px;}
        .bs-gutter-x-0 {--bs-gutter-x: 0 !important;}
        .bar_danger{background-color: #810003;}
        .bar_warning{background-color: #a56a00;}
        .bar_success{background-color: #00703c;}
        .bar_purple{background-color: #700070;}
    </style>
</head>
<body>

    @include('sidebar')
    @include('header')
    <nav class='mb-4'
        style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
        aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item fw-light small text-dark">Dashboard</li>
            <li class="breadcrumb-item fw-light small text-dark">Resources</li>
            <li class="breadcrumb-item fw-light active small text-primary" aria-current="page">Mastery Level</li>
        </ol>
    </nav>
    <!-- main content  -->
    <div class="greeting_section rounded-5 p-4 row m-0 my-3 align-items-center">
        <div class='col-lg-6 col-md-6 col-sm-12 col-12'>
            <h1 class="display-5 text-white text-capitalize my-1 fw-semibold">Mastery Level</h1>
            <p class="fs-6 fw-light text-white">Seamlessly track and evaluate your child's academic performance in every subject and topic using our monitoring system. Stay informed and involved in your child's education with ease, ensuring their success and progress in every area of study.</p>
        </div>
        <div class='col-lg-6 col-md-6 col-sm-12 col-12 text-lg-end text-md-end text-center'>
            <img src="{{url('images\mastery_level_header.png')}}" height='auto' width='280' class='parent_portal_banner_image' alt="">
        </div>
    </div>

    <div class="align-items-center d-flex flex-wrap justify-content-center mt-5">
        @foreach ($sections as $key => $section)
            <div class="my-2 ">
                <label class="bg-white cursor-pointer text-center m-2 p-2 rounded-4 select_subject shadow-sm  
                @if($key <= 0)
                    active
                @endif
                " data-id="{{$section['section']['id']}}">
                    <img src="
                    @if(str_contains($section['section']['name'], 'Maths'))
                        {{url('images/maths.png')}}
                    @elseif(str_contains($section['section']['name'], 'English'))
                        {{url('images/english.png')}}
                    @elseif(str_contains($section['section']['name'], 'Verbal'))
                        {{url('images\verbal_reasoning.png')}}
                    @elseif(str_contains($section['section']['name'], 'Science'))
                        {{url('images\science.png')}}
                    @endif
                    " height="50" width='50' alt="{{$section['section']['name']}}">
                    <h2 class="fs-6 mt-3 fw-normal text-dark">
                    @if(str_contains($section['section']['name'], 'Maths'))
                        Maths
                    @elseif(str_contains($section['section']['name'], 'English'))
                        English
                    @elseif(str_contains($section['section']['name'], 'Non-Verbal'))
                        Non-Verbal
                    @elseif(str_contains($section['section']['name'], 'Verbal'))
                        Verbal
                    @elseif(str_contains($section['section']['name'], 'Science'))
                        Science
                    @endif
                    </h2> 
                    @if($key <= 0)
                        <input type="radio" class="form-check-input subject visually-hidden" name="subject" value="{{$section['section']['id']}}" checked>
                    @else
                        <input type="radio" class="form-check-input subject visually-hidden" name="subject" value="{{$section['section']['id']}}">
                    @endif
                </label>
            </div>
        @endforeach
    </div>

    <!-- <div class='my-5'> 
        <h2 class="fw-normal h3 my-2">Select a Subject</h2>
        <div class="row align-items-center justify-content-around">
            <div class="col-lg-3 col-md-4 col-sm-6 col-8 my-2">
                <button class="btn bg-white shadow p-4 rounded-4 select_subject_btn" data-id="1">
                    <div class="text-center"><img src="{{url('images/maths.png')}}" height='50' width='50' class='mb-2' alt="Maths"></div>
                    <h2 class="text-center h5 fw-normal my-2">Maths</h2>
                    <p class="text-center fw-light small">Choose a subject to assess your child's performance in topics and subtopics.</p> 
                </button>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 col-8 my-2">
                <button class="btn bg-white shadow p-4 rounded-4 select_subject_btn" data-id="1">
                    <div class="text-center"><img src="{{url('images/maths.png')}}" height='50' width='50' class='mb-2' alt="Maths"></div>
                    <h2 class="text-center h5 fw-normal my-2">Maths</h2>
                    <p class="text-center fw-light small">Choose a subject to assess your child's performance in topics and subtopics.</p> 
                </button>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 col-8 my-2">
                <button class="btn bg-white shadow p-4 rounded-4 select_subject_btn" data-id="1">
                    <div class="text-center"><img src="{{url('images/maths.png')}}" height='50' width='50' class='mb-2' alt="Maths"></div>
                    <h2 class="text-center h5 fw-normal my-2">Maths</h2>
                    <p class="text-center fw-light small">Choose a subject to assess your child's performance in topics and subtopics.</p> 
                </button>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 col-8 my-2">
                <button class="btn bg-white shadow p-4 rounded-4 select_subject_btn" data-id="1">
                    <div class="text-center"><img src="{{url('images/maths.png')}}" height='50' width='50' class='mb-2' alt="Maths"></div>
                    <h2 class="text-center h5 fw-normal my-2">Maths</h2>
                    <p class="text-center fw-light small">Choose a subject to assess your child's performance in topics and subtopics.</p> 
                </button>
            </div>
        </div>
    </div> -->

    @foreach ($sections as $key => $section)
        <div class="mastery_cards_container @if($key > 0) d-none @endif" id="mastery_cards_{{$section['section']['id']}}">
            <h2 class="text-capitalize fw-normal h3 my-2">{{$section['section']['name']}}</h2>
            <div class="row m-0 align-item-center">
                @foreach ($section['tableData'] as $mKey => $mastery)
                    <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                        <a href="/parent/practice-sets?subject={{$section['section']['id']}}&topic={{$mastery['skill_id']}}&sub_topics=null">
                            <div class="performance_card cursor-pointer rounded-4 p-4 position-relative h-100 d-grid
                                @if($mastery['mastery_level'] <= 33.100)
                                    not_set_performance_card
                                @elseif($mastery['mastery_level'] < 66.100 && $mastery['mastery_level'] > 33.100)
                                    average_performance_card
                                @elseif($mastery['mastery_level'] < 89.100 && $mastery['mastery_level'] > 66.100)
                                    good_performance_card
                                @elseif($mastery['mastery_level'] <= 100 && $mastery['mastery_level'] > 89.100)
                                    master_performance_card
                                @elseif($mastery['mastery_level'] == 'Not Set' || $mastery['mastery_level'] == 'Not Attempt')
                                    not_atttempt_performance_card
                                @endif">
                                <p class="fw-normal my-2 text-white">
                                    @if($mastery['mastery_level'] <= 33.100)
                                        Needs Practise
                                    @elseif($mastery['mastery_level'] < 66.100 && $mastery['mastery_level'] > 33.100)
                                        Good
                                    @elseif($mastery['mastery_level'] < 89.100 && $mastery['mastery_level'] > 66.100)
                                        Strong
                                    @elseif($mastery['mastery_level'] <= 100 && $mastery['mastery_level'] > 89.100)
                                        Master
                                    @elseif($mastery['mastery_level'] == 'Not Set')
                                        Not Set
                                    @elseif($mastery['mastery_level'] == 'Not Attempt')
                                        Not Attempt
                                    @endif
                                </p>
                                <h2 class="fs_cs_5 fw-medium text-white">{{$mastery['skill_name']}}</h2>
                                <div class="row mastery_level_bar bs-gutter-x-0 mt-1 w-50">
                                    @if($mastery['mastery_level'] <= 33.100)
                                        <div class="col-3 ps-0 pe-1"><div class="h-100 rounded bar_danger"></div></div>
                                        <div class="col-3 ps-0 pe-1"><div class="h-100 rounded bg-label-secondary"></div></div>
                                        <div class="col-3 ps-0 pe-1"><div class="h-100 rounded bg-label-secondary"></div></div>
                                        <div class="col-3 ps-0 pe-1"><div class="h-100 rounded bg-label-secondary"></div></div>
                                    @elseif($mastery['mastery_level'] < 66.100 && $mastery['mastery_level'] > 33.100)
                                        <div class="col-3 ps-0 pe-1"><div class="h-100 rounded bar_warning"></div></div>
                                        <div class="col-3 ps-0 pe-1"><div class="h-100 rounded bar_warning"></div></div>
                                        <div class="col-3 ps-0 pe-1"><div class="h-100 rounded bg-label-secondary"></div></div>
                                        <div class="col-3 ps-0 pe-1"><div class="h-100 rounded bg-label-secondary"></div></div>
                                    @elseif($mastery['mastery_level'] < 89.100 && $mastery['mastery_level'] > 66.100)
                                        <div class="col-3 ps-0 pe-1"><div class="h-100 rounded bar_success"></div></div>
                                        <div class="col-3 ps-0 pe-1"><div class="h-100 rounded bar_success"></div></div>
                                        <div class="col-3 ps-0 pe-1"><div class="h-100 rounded bar_success"></div></div>
                                        <div class="col-3 ps-0 pe-1"><div class="h-100 rounded bg-label-secondary"></div></div>
                                    @elseif($mastery['mastery_level'] <= 100 && $mastery['mastery_level'] > 89.100)
                                        <div class="col-3 ps-0 pe-1"><div class="h-100 rounded bar_purple"></div></div>
                                        <div class="col-3 ps-0 pe-1"><div class="h-100 rounded bar_purple"></div></div>
                                        <div class="col-3 ps-0 pe-1"><div class="h-100 rounded bar_purple"></div></div>
                                        <div class="col-3 ps-0 pe-1"><div class="h-100 rounded bar_purple"></div></div>
                                    @else 
                                        <div class="col-3 ps-0 pe-1"><div class="h-100 rounded bg-label-secondary"></div></div>
                                        <div class="col-3 ps-0 pe-1"><div class="h-100 rounded bg-label-secondary"></div></div>
                                        <div class="col-3 ps-0 pe-1"><div class="h-100 rounded bg-label-secondary"></div></div>
                                        <div class="col-3 ps-0 pe-1"><div class="h-100 rounded bg-label-secondary"></div></div>
                                    @endif
                                </div>
                                <div class="card_shade position-absolute"></div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    @endforeach

    <script>
        $('.select_subject').click(function(){
            $(this).addClass('active').parent().siblings().find(".select_subject").removeClass('active');
            $('#mastery_cards_'+$(this).data('id')).removeClass('d-none');
            $('.mastery_cards_container').not('#mastery_cards_'+$(this).data('id')).addClass('d-none');
        });
    </script>
</body>
</html>