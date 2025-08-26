<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Journey Progress - Student Portal - Tutors 11 Plus</title>
    <link rel="shortcut icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}" type="image/x-icon">
    <!-- bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">      
    <style>    
        .activity_progress_card img { -webkit-user-select: none; -webkit-user-drag: none; } .performance_details_svg { fill: #0000ee !important; } .button { min-width: 100px; color: #fff !important; background-color: var(--portal-primary)!important; border: none; border-radius: 90px; box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none; } .button:hover { background-color:#0d6efd!important; box-shadow:#003277; transform: translateY(-7px); } .text-dark-primary{ color: #0000ee; } .performance_details_svg { fill: var(--portal-primary) !important; } .performance_badge { min-height: 90px; max-height: fit-content; width: fit-content; margin: 0.8rem auto; } .master_perf_badge { background-color: #f3ecff; } .master_perf_badge h2{ color: #8257c8; } .strong_perf_badge { background-color: #edfaf0; } .strong_perf_badge h2 { color: #57c8a9; } .good_perf_badge { background-color: #e4f6ff; } .good_perf_badge h2 { color: #49a6e5; } .practise_perf_badge { background-color: #fff5eb; } .practise_perf_badge h2 { color: #ffa200; } .set_practice_alert { border-radius: 1.5rem; border: 2px solid #46aeff; background: #e9f5ff; color: #0066b5; } .btn_success_primary { background: #3A833A!important; color: #fff!important; border: 1px solid #3A833A!important; } .w_100 { min-width: 100px } .w_180 { min-width: 180px } .w_200 { min-width: 200px } .w_250 { min-width: 250px } .master_performance_card { background: radial-gradient(#bb76dd, #9141c9) !important; } .poor_performance_card { background: radial-gradient(#85dc99, #589967) !important; } .good_performance_card { background: radial-gradient(#1e96ff, #084ddc) !important; } .average_performance_card { background: radial-gradient(#ffc352, #e79700) !important; } .top_circle_shade {height: 120px;width: 120px;background: #ffffff1a;position: absolute;top: -35px;right: -55px;}
    </style>
    
</head>

<body>
    @include('sidebar')
    @include('header')
    <div class="row m-0 mt-5">
        <div class="mb-4 w-100 px-0">
            <ul class="nav nav-tabs bg-white justify-content-center shadow my-2" id="myTab" role="tablist" style="border-bottom: none;">
                <li class="nav-item col-sm-6 col-12 hstack" role="presentation">
                    <button class="nav-link body_section_nav p-0" id="progress" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="false">
                        <a style="color: black" class="nav_tab_link d-block py-2 px-1 text-capitalize text-white bg-primary" href="{{route('student_journey_progress')}}">In-progress</a>
                    </button>
                </li>
                <li class="nav-item col-sm-6 col-12 hstack" role="presentation">
                    <button class="nav-link body_section_nav p-0 bg-white" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">
                        <a style="color: black" class="nav_tab_link d-block py-2 px-1 text-capitalize" href="{{route('my_journey')}}">Past Journeys</a>
                    </button>
                </li>
            </ul>
        </div>
    </div>
    @if(count($journey_sessions) > 0)
        <div class="bg-white shadow table-responsive border_rounded m-1">
            <table class="table table-hover table-striped p-3">
                <thead class='table_head'>
                    <tr class="border-bottom">
                        <th scope="col" class="py-3 px-3 font_medium w_200 table_text fs-6">Serial</th>
                        <th scope="col" class="py-3 font_medium w_200 table_text fs-6">Test Name</th>
                        <th scope="col" class="py-3 font_medium w_200  table_text fs-6" >Topic</th>
                        <th scope="col" class="py-3 font_medium w_200  table_text fs-6">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white" >
                    @foreach($journey_sessions as $key => $sess)
                        @if(count($sess) > 0)
                            <tr class='border-bottom'>
                                <td><p class="font_medium fw-normal table_text py-2 px-3">{{++$key}}</p></td>
                                <td><p class="table_text font_medium fw-normal py-2 m-0">{{$sess['title']}}</p></td>
                                <td><p class="table_text font_medium fw-normal py-2 m-0">{{$sess['skill']}}</p></td>
                                <td>
                                    <a href="{{ route('init_journey_set', ['journeySet' => $sess['slug']]) }}" class="text-decoration-none resume_btn  button btn">
                                        @if($sess['percentage_completed'] > 0)
                                            Resume
                                        @else
                                            Start
                                        @endif
                                    </a>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <section id="home_tab_section">
            <div class="col-12 col-lg-12 order-2 order-md-3 order-lg-2 mb-4 shadow rounded-3 ">
                <div class="card">
                    <div class="text-center">
                        <img src="{{url('images\not_found_error.png')}}" width="60" height="60" class="my-4" alt="No Result Found">
                        <p class="text-capitalize h5 text-black mb-4">No Sessions Found</p>
                    </div>
                </div>
            </div>
        </section>
    @endif
    <!-- progress summary   -->
    <div class="review_progress my-5 px-2">
        <h2 class="text-dark fw-semibold">Progress Summary</h2>
        <div class="bg-white p-2 py-4 shadow rounded-3 mt-4">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6 col-12 my-3">
                    <div class="activity_progress_card d-flex align-items-center px-3 w-100">
                        <img src="{{url('images\question.webp')}}" width="50" height="50" alt="">
                        <div class="ms-2">
                            <h4 class="text-dark fw-bold mb-1">{{$correct_questions}}/{{$total_questions}}</h4>
                            <h5 class="fw-normal text-dark mb-0">Questions</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-12 my-3">
                    <div class="activity_progress_card d-flex align-items-center px-3 w-100">
                        <img src="{{url('images\reward.png')}}" width="50" height="50" alt="">
                        <div class="ms-2">
                            <h4 class="text-dark fw-bold mb-1">{{$total_coins}}</h4>
                            <h5 class="fw-normal text-dark mb-0">Coins</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-12 my-3">
                    <div class="activity_progress_card d-flex align-items-center px-3 w-100">
                        <img src="{{url('images\time_spent.webp')}}" width="50" height="50" alt="">
                        <div class="ms-2">
                            <h4 class="text-dark fw-bold mb-1">{{$total_time_spent['time']}}&nbsp;{{$total_time_spent['format_type']}}</h4>
                            <h5 class="fw-normal text-dark mb-0">Time</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- performance  -->
    @if(isset($mastery_level))
        <section class="section_gap">            
            <div class="performance_section my-5 px-2">
            <h2 class="text-dark fw-semibold">Performance Overview</h2>
                <div class="row m-0">
                    @foreach($mastery_level as $sec)
                        <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                            <a href="/student/detailed-journey-performance?subject={{$sec['id']}}" class="text-decoration-none">
                            <div class="performance_card rounded-4 p-4 position-relative overflow-hidden @if($sec['mastery_level'] == 'Strong') master_performance_card @elseif($sec['mastery_level'] == 'Master') poor_performance_card @elseif($sec['mastery_level'] == 'Good') good_performance_card @elseif($sec['mastery_level'] == 'Needs Practice') average_performance_card @endif">
                                <h2 class="fs_cs_5 fw-normal my-1 text-white">{{$sec['mastery_level']}}</h2>
                                <h2 class="fw-medium h5 text-white">{{$sec['name']}}</h2>
                                <p class="fw-light fs-6 text-white mt-3">Assess your child's progress in this @if(str_contains($sec['name'], 'Maths')) Mathematics @elseif(str_contains($sec['name'], 'English')) English @elseif(str_contains($sec['name'], 'Verbal')) Verbal Reasoning @endif.</p>
                                <div class="top_circle_shade rounded-circle"></div>
                            </div>
                            </a>
                        </div>
                    @endforeach
                </div>
                @if(isset($childs[0]['name']))
                    <div class=" my-4 p-3 set_practice_alert">
                        <div class="row m-0 justify-content-between align-items-center">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <p class="fs-5 lead">Set a practise in the area where {{$childs[0]['name']}} can improve</p>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12 mt-2 mb-1 text-lg-end text-md-end text-sm-center text-center">
                                <a href="/parent-set/section" type="button" class="btn set_practice_button p-2">Set Question</a>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </section>
    @endif

    @include('User.ProgressScript')

</body>

</html>