<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Progress - Student Portal - Tutors 11 Plus</title>
    <link rel="shortcut icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}" type="image/x-icon">
    <!-- bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">      
    <style>    
        .activity_progress_card img { -webkit-user-select: none; -webkit-user-drag: none; } .performance_details_svg { fill: #0000ee !important; } .button { min-width: 100px; color: #fff !important; background-color: var(--portal-primary)!important; border: none; border-radius: 90px; box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none; } .button:hover { background-color:#0d6efd!important; box-shadow:#003277; transform: translateY(-7px); } .text-dark-primary{ color: #0000ee; } .performance_details_svg { fill: var(--portal-primary) !important; } .performance_badge { min-height: 90px; max-height: fit-content; width: fit-content; margin: 0.8rem auto; } .master_perf_badge { background-color: #f3ecff; } .master_perf_badge h2{ color: #8257c8; } .strong_perf_badge { background-color: #edfaf0; } .strong_perf_badge h2 { color: #57c8a9; } .good_perf_badge { background-color: #e4f6ff; } .good_perf_badge h2 { color: #49a6e5; } .practise_perf_badge { background-color: #fff5eb; } .practise_perf_badge h2 { color: #ffa200; } .set_practice_alert { border-radius: 1.5rem; border: 2px solid #46aeff; background: #e9f5ff; color: #0066b5; } .btn_success_primary { background: #3A833A!important; color: #fff!important; border: 1px solid #3A833A!important; } .w_100 { min-width: 100px } .w_180 { min-width: 180px } .w_200 { min-width: 200px } .w_250 { min-width: 250px } .master_performance_card { background: radial-gradient(#bb76dd, #9141c9) !important; } .poor_performance_card { background: radial-gradient(#85dc99, #589967) !important; } .good_performance_card { background: radial-gradient(#1e96ff, #084ddc) !important; } .average_performance_card { background: radial-gradient(#ffc352, #e79700) !important; } .top_circle_shade {height: 120px;width: 120px;background: #ffffff1a;position: absolute;top: -35px;right: -55px;}
        @media (max-width: 575px) {
            .responsive_image {
                width: 280px !important
            }
        }
    </style>
    
</head>

<body>
    @include('sidebar')
    @include('header')
    @include('User.Progresstopbar')
    @if(count($practice_sessions) > 0)
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
                    @foreach($practice_sessions as $key => $sess)
                        @if(count($sess) > 0)
                            <tr class='border-bottom'>
                                <td><p class="font_medium fw-normal table_text py-2 px-3">{{++$key}}</p></td>
                                <td><p class="table_text font_medium fw-normal py-2 m-0">{{$sess['title']}}</p></td>
                                <td><p class="table_text font_medium fw-normal py-2 m-0">{{$sess['skill']}}</p></td>
                                <td>
                                    @if($sess['parent_suggested'])
                                        <a href="{{ route('init_practice_set', ['practiceSet' => $sess['slug'], 'suggestedPracticeSetId' => $sess['parent_suggested_id']]) }}" class="text-decoration-none btn button btn-primary text-white">
                                    @else
                                        <a href="{{ route('init_practice_set', ['practiceSet' => $sess['slug']]) }}" class="text-decoration-none resume_btn  button btn">
                                    @endif
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
    {{--<div class="review_progress my-5 px-2">
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
    </div>--}}
    <!-- performance  -->
    {{--@if(isset($mastery_level))
        <section class="section_gap">            
            <div class="performance_section my-5 px-2">
            <h2 class="text-dark fw-semibold">Performance Overview</h2>
                <div class="row m-0">}}
                    {{--@foreach($mastery_level as $sec)
                        <div class="col-lg-4 col-md-4 col-sm-6 col-12 my-3">
                            <div class="bg-white p-2 shadow-sm py-3 d-flex justify-content-center align-items-center rounded-3">
                                <div class="w-100">
                                    <div class="performance_badge">
                                        @if($sec['mastery_level'] == 'Strong')
                                            <!-- strong  -->
                                            <div class="strong_perf_badge h-100 p-2 px-3 rounded-3 w-100">
                                                <h2 class="fw-semibold h4 my-1 text-center">A</h2>
                                                <h2 class="fw-light h5 my-1 text-center">Strong</h2>
                                            </div>
                                        @elseif($sec['mastery_level'] == 'Master')
                                            <!-- master  -->
                                            <div class="master_perf_badge h-100 p-2 px-3 rounded-3 w-100">
                                                <h2 class="fw-semibold h4 my-1 text-center">A+</h2>
                                                <h2 class="fw-light h5 my-1 text-center">Master</h2>
                                            </div>
                                        @elseif($sec['mastery_level'] == 'Good')
                                            <!-- good  -->
                                            <div class="good_perf_badge h-100 p-2 px-3 rounded-3 w-100">
                                                <h2 class="fw-semibold h4 my-1 text-center">B</h2>
                                                <h2 class="fw-light h5 my-1 text-center">Good</h2>
                                            </div>
                                        @elseif($sec['mastery_level'] == 'Needs Practice')
                                            <!-- need practise  -->
                                            <div class="practise_perf_badge h-100 p-2 px-3 rounded-3 w-100">
                                                <h2 class="fw-semibold h4 my-1 text-center">C</h2>
                                                <h2 class="fw-light h5 my-1 text-center">Needs Practise</h2>
                                            </div>
                                        @endif
                                    </div>
                                    <h2 class="h4 text-center text-dark fw-normal">{{$sec['name']}}</h2>
                                    <hr>
                                    <div class="text-center">
                                        <a href="{{route('student_mastery_level')}}" class="text-decoration-underline fw-normal text-dark-primary">Details
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" class="performance_details_svg" viewBox="0 0 24 24"><path d="m11.293 17.293 1.414 1.414L19.414 12l-6.707-6.707-1.414 1.414L15.586 11H6v2h9.586z"></path></svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach--}}
                    {{--@foreach($mastery_level as $sec)
                        <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                            <a href="{{route('student_performance', ['id' => $sec['id']])}}" class="text-decoration-none">
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

    {{--<div class="text-center my-3">
        <img src="{{url('images/available_soon.png')}}" class="responsive_image" width="500" height="auto" alt="an illustration of girl waiting with excitement">
        <h2 class="fw-normal h4 my-2 text-center">This functionality will soon be accessible.</h2>
        <a href="/dashboard" class="btn btn-primary text-white px-3 p-2 my-3">Go to Dashboard</a>
    </div>--}}
    

</body>

</html>