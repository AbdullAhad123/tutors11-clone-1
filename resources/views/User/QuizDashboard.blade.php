<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quiz Dashboard - Student Portal - Tutors 11 Plus</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <link rel="shortcut icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}" type="image/x-icon"/>
    <!-- bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <style>
        .quiz_schedule_card  {
            transition: 0.2s;
        }

        .quiz_schedule_card:hover {
            scale: 1.01;
            box-shadow: -1px 6px 7px 0px #00000045;
        }

        .viewall_button {
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            color: #696CFF;
        }

        .number_style {
            font-size: 0.85rem;
            font-weight: 400;
            color: #000!important;
        }

        .Question_heading {
            font-size: 0.85rem;
            font-weight: 500;
            color: #000!important;
        }

        @media (max-width: 320px) {
            .Question_heading {
                font-size: 5vw!important;
            }
        }

        @media (max-width: 350px) {
            .dynamic_text_name {
                font-size: 5.5vw!important;
            }
            .first_term_name {
                font-size: 3.5vw!important
            }
        }

        .dot_overlay {
            width: 7px;
            height: 7px;
            background: #696CFF;
        }

        .Fixed_heading {
            color: #004bb2;
            font-size: 0.9rem;
            font-weight: 500;
        }

        .time_styling {
            color: #000;
            font-size: 0.9rem;
            font-weight: 500;
        }

        .Fixed_schedule_time {
            background:#b1a9a91f;
        }

        .first_term_name {
            font-size: 0.9rem;
            font-weight: 400;
            background: #d5d5d591; 
            
        }

        .test_session_details {
            font-size: 0.9rem!important;
            font-weight: 400;
            background: #f4f4f4; 
            color: #004bb2!important;
        }   


        .Start_exam_button {
            color: #fff!important;
            background: #004bb2!important;
            font-size: 0.9rem;
            cursor: pointer;
            transition: 0.3s
        }

        .Start_exam_button:hover {
            background: #004bb2!important;
        }

        .text-green {
            color: orange;
        }

        /* swiper css  */

        .swiper_section {
            height: auto;
            width: auto;
            font-size: 14px;
            margin: 0;
            padding: 0;
            position: relative;
        }

        .swiper {
            width: 100%;
            height: 100%;
        }

        .swiper-slide {
            height: 200px;
            width: auto;
            text-align: center;
            font-size: 18px;
            background: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            transition: 0.3s;
        }

        .swiper-slide:hover {
            scale: 1.01;
            box-shadow: -1px 6px 7px 0px #00000045;
        }

        .session_card {
            height: 100%;
            width: 100%;
        }

        .session_exam {
            height: 140px;
            width: 100%;
        }
        .exam_sessions_card {
            height: auto;
            width: auto;
            background: #fff;
            border-radius: 1.2rem;
            box-shadow: 0px 3px 8px 0px #00000026!important;
        }
        .exam_content
        {
            background:#f9fcff;
        }
        .exam_session_image {
            height: 300px;
            width: auto;
            background: url('../images/online_exam.png') center no-repeat; 
            background-size: contain
        }
        .exam_type_tag {
            background: #fc8c6c;
            color: white;
            padding: 0.4rem 0.8rem!important;
        }
        .header{
                background:linear-gradient(45deg, #455595, #4d7dc2);
            }
            .heading_separator {
                height: 0.4rem;
                width: 120px;
                background: orange;
                border-radius: 20rem;
            }
            .exam_icon_bg{
                background:#c23333;
            }
            .nav-link.active:focus .live_session_icon{
                filter:invert(1);
            }
            /* .nav .nav-link:hover{
                color:white !important;
            } */
            .nav-link.active >.live_session_icon{
                filter:invert(1);
            }
            .exam_card{
                background: linear-gradient(106deg, #008a69, #00b686);
            }
            .quiz_type_badge {
                position: absolute;
                top: 10px;
                right: 10px;
                background: #fff5e4;
                color: #e47200;
                border: 1px solid #ffbc7a;
                font-size: 12px;
            }
    </style>
</head>

<body>

    @include('sidebar')
    @include('header')

    <section>
        {{--<div class="my-4">
            <h1 class="h3 text-dark fw-semibold mb-4">Quiz Types</h1> 
            <div class="swiper_section p-2">
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper p-2">
                        @foreach ($quizTypes as $key => $type)
                            <div class="swiper-slide">
                                <a href="/quizzes/{{$type['slug']}}" class="h-100 w-100 text-decoration-none">
                                    <div class="session_card"> 
                                        <!-- {{$type['image']}} -->
                                        @if($key == 0)
                                            <div class="session_exam" style="background: url('{{url('images/assignments_quiz.jpg')}}') center no-repeat; background-size: cover"></div>
                                        @elseif($key == 1)  
                                            <div class="session_exam" style="background: url('{{url('images/contest_quiz.jpg')}}') center no-repeat; background-size: cover"></div>  
                                        @elseif($key == 2)    
                                            <div class="session_exam" style="background: url('{{url('images/dailyChallenge_quiz.jpg')}}') center no-repeat; background-size: cover"></div>
                                        @elseif($key == 3)    
                                            <div class="session_exam" style="background: url('{{url('images/dailyTask_quiz.jpg')}}') center no-repeat; background-size: cover"></div>
                                        @elseif($key == 4)    
                                            <div class="session_exam" style="background: url('{{url('images/hackathon_quiz.jpg')}}') center no-repeat; background-size: cover"></div>
                                        @elseif($key == 5)    
                                            <div class="session_exam" style="background: url('{{url('images/quizzes_quiz.jpg')}}') center no-repeat; background-size: cover"></div>
                                        @elseif($key == 6)    
                                            <div class="session_exam" style="background: url('{{url('images/exam_session_banner.jpg')}}') center no-repeat; background-size: cover"></div>
                                        @endif
                                        <div style="height: 55px"
                                            class="session_details d-flex justify-content-center align-items-center">
                                            <h5 class="fw-semibold text-dark mb-0">{{$type['name']}}</h5>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="my-4">
            <h2 class="h3 text-dark fw-semibold mt-5 mb-4">Live Quizzes 
                <span class="d-inline-flex translate-middle-y rounded-circle" style="width: 15px;height: 15px;padding: 2px;border: 1px solid #0014ff!important;">
                    <span class="h-100 w-100 spinner-grow" style="background-color: #0058ff!important;"></span>
                </span>
            </h2>
            @if(count($quizSchedules) > 0)
               <div class="row m-0 align-items-center">
                    @foreach($quizSchedules as $quiz)
                        <div class="col-lg-6 col-md-6 col-sm-12 col-12 mx-auto my-3">
                            <div class="exam_sessions_card p-4">
                                <div class="text-end"><span class="border border-warning exam_type_tag font-monospace rounded-pill small p-2">First Term</span></div>
                                <div class="exam_session_image"></div>
                                <h2 class="h4 text-dark text-center my-2">{{$quiz['title']}}</h2>
                                <hr class="my-3">
                                <div class="align-items-center d-flex my-3">
                                    <h2 class="fs-6 text-dark text-start m-0 me-1 fw-bold">Flexible Schedule Time</h2>
                                    <span class="d-inline-flex translate-middle-y rounded-circle" style="width: 10px;height: 10px;padding: 2px;border: 1px solid var(--portal-secondary)!important;">
                                        <span class="h-100 w-100 spinner-grow" style="background-color: var(--portal-secondary)!important;"></span>
                                    </span>
                                </div>
                                <div class="exam_content p-3 rounded-3" style='box-shadow: 0px 1px 4px 0px #0000004f !important;'>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-8 col-sm-11 p-3">
                                            <div class="d-flex align-items-center mb-3">
                                                <i class='bx bx-question-mark text-primary me-2'></i>
                                                <p class="mb-0 time_styling">{{$quiz['total_questions']}} Questions</p>
                                            </div>
                                            <div class="d-flex align-items-center mb-3">
                                                <i class='bx bx-time text-green me-2'></i>
                                                <p class="mb-0 time_styling">{{$quiz['total_duration']}} Minutes</p>
                                            </div>
                                            <div class="d-flex align-items-center mb-3">
                                                <i class='bx bxs-coin-stack text-warning me-2'></i>
                                                <p class="mb-0 time_styling">{{$quiz['total_marks']}} Marks</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-8 col-sm-11 p-3">         
                                            <div class="d-flex align-items-center mb-3">
                                                <i class="bx bx-calendar text-green me-2"></i>
                                                <p class="mb-0 time_styling">{{$quiz['starts_at']}}</p>
                                            </div>
                                            <div class="d-flex align-items-center mb-3">
                                                <i class='bx bx-calendar-x text-danger me-2'></i>
                                                <p class="mb-0 time_styling">{{$quiz['ends_at']}}</p>
                                            </div>
                                            <div class="d-flex align-items-center mb-3">
                                                <i class="bx bx-globe text-warning me-2"></i>
                                                <p class="mb-0 time_styling">Timezone - {{$quiz['timezone']}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a href="/quiz/{{ $quiz['slug'] }}/instructions" type='button' class="btn btn-primary p-2 text-white w-100 my-3 shadow-sm">Start Quiz</a>
                            </div>
                         
                        </div>
                    @endforeach
               </div>
            @else
                <section id="home_tab_section">
                    <div class="px-3 text-center">
                        <img src="images/no_results.png" height="100" width="100" alt="">
                        <p class="text-capitalize my-2 fs-5" style="color: #004bb2;">No Schedules Found</p>
                    </div>
                </section>
            @endif
        </div>--}}
        <!-- Quiz Dashboard -->
      
        <section class="header rounded-5 mt-3 p-3">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-5 col-md-7 col-sm-9">
                <h1 class="text-white">Quiz Overview Hub</h1>
                <p class="fs-big mt-3 text-white">Welcome to the Quiz Overview Hub! Here, you'll find all the information you need about upcoming quizzes, including the types of quizzes you'll encounter and your scheduled assessments.</p>
                </div>
                <div class="col-lg-5 col-md-5 col-sm-9">
                    <img src="{{url('images/exam _schedule.png')}}" height="350" width="350" alt="" class="w-100 img-fluid">
                </div>
            </div>
        </section>
        <section class="exam_types">
                <div class="mb-4">
                   <h2 class="fw-semibold mb-1 mt-4 mt-lg-5 mt-md-5 text-dark">Categories</h2>
                   <div class="heading_separator"></div>
                    <div class="row mt-5">      
                        <div class="swiper_section p-2">
                            <div class="swiper mySwiper">
                                <div class="swiper-wrapper p-2">
                                    @foreach ($quizTypes as $key => $type)
                                        <div class="swiper-slide">
                                            <a href="/quizzes/{{$type['slug']}}" class="h-100 w-100 text-decoration-none">
                                                <div class="session_card"> 
                                                    <!-- {{$type['image']}} -->
                                                    @if($key == 0)
                                                        <div class="session_exam" style="background: url('{{url('images/assignments_quiz.jpg')}}') center no-repeat; background-size: cover"></div>
                                                    @elseif($key == 1)  
                                                        <div class="session_exam" style="background: url('{{url('images/contest_quiz.jpg')}}') center no-repeat; background-size: cover"></div>  
                                                    @elseif($key == 2)    
                                                        <div class="session_exam" style="background: url('{{url('images/dailyChallenge_quiz.jpg')}}') center no-repeat; background-size: cover"></div>
                                                    @elseif($key == 3)    
                                                        <div class="session_exam" style="background: url('{{url('images/dailyTask_quiz.jpg')}}') center no-repeat; background-size: cover"></div>
                                                    @elseif($key == 4)    
                                                        <div class="session_exam" style="background: url('{{url('images/hackathon_quiz.jpg')}}') center no-repeat; background-size: cover"></div>
                                                    @elseif($key == 5)    
                                                        <div class="session_exam" style="background: url('{{url('images/quizzes_quiz.jpg')}}') center no-repeat; background-size: cover"></div>
                                                    @elseif($key == 6)    
                                                        <div class="session_exam" style="background: url('{{url('images/exam_session_banner.jpg')}}') center no-repeat; background-size: cover"></div>
                                                    @endif
                                                    <div style="height: 55px"
                                                        class="session_details d-flex justify-content-center align-items-center">
                                                        <h5 class="fw-semibold text-dark mb-0">{{$type['name']}}</h5>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </section> 
        <section class="exam_schedule my-5">
            <div class="row align-items-center m-0 my-4">
                <div class="col-7">
                    <h2 class="fw-semibold my-2 text-dark">Quiz Schedule</h2>
                    <div class="heading_separator"></div>
                </div>
                <div class="col-lg-5 col-md-12">
                    <!-- nav tabs -->
                    <ul class="nav nav-pills mt-md-3 mt-sm-3" id="pills-tab" role="tablist">
                        <li class="nav-item d-flex mx-2 my-2" role="presentation">
                            <button class="nav-link rounded-4 shadow active"  id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="false"> <img src="images/live_Session_icon.png" class="live_session_icon" width="25" height="25" alt=""> Live Quiz Sessions</button>
                        </li>
                        <li class="nav-item my-2" role="presentation">
                            <button class="nav-link rounded-4 shadow " id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="true"><img src="images/live_Session_icon.png" class="live_session_icon" width="25" height="25" alt=""> Completed  Quiz Sessions</button>
                        </li>
                    </ul>
                </div>
                <p class="mt-3">Welcome to the Quiz Schedule section, your go-to resource for staying organised and up-to-date with all your upcoming assessments. Here, you'll find detailed information about the dates, times, and formats of your quizzes, ensuring you're fully prepared and on schedule.</p>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
                        <div class="row align-items-center justify-content-center my-4">
                            @if($startedCount>0)
                                @foreach($quizSchedules as $key => $quizSchedule)
                                    @if($quizSchedule['status'] == 'started')
                                        <div class="col-lg-6 col-md-12 col-sm-12 col-12 my-2">
                                            <div class="exam_card shadow rounded-4 overflow-hidden row m-0 border position-relative">
                                                <div class="blog_image col-12 col-lg-4 col-md-4 col-sm-12 p-0" style="background: url('images/exam_Schedule.png') center no-repeat;background-size: contain;">
                                                </div>
                                                <div class="align-items-center blog_details col-12 col-lg-8 col-md-8 col-sm-12 d-flex p-4">
                                                    <div class="quiz_type_badge rounded-pill p-1">{{$quizSchedule['scheduleType']}}</div>    
                                                    <div class="py-2">
                                                        <h2 class="text-white fw-semibold h4 mt-1">{{$quizSchedule['title']}}</h2>
                                                        <p class="blog_subtitle text-white">Embark on your journey to knowledge with the commencement of your exam.</p>
                                                        <hr class="my-2">
                                                        <div class="align-items-center d-flex flex-wrap justify-content-between">
                                                            <div class="d-inline-flex align-items-center my-2">
                                                                <i class="bx bx-calendar text-green me-2"></i>
                                                                <span class="fw-light    small text-white">{{$quizSchedule['starts_at']}}</span>
                                                            </div>
                                                            <div class="d-inline-flex align-items-center my-2">
                                                                <i class="bx bx-calendar-x text-danger me-2"></i>
                                                                <span class="fw-light    small text-white">{{$quizSchedule['ends_at']}}</span>
                                                            </div>
                                                        </div>
                                                  
                                                        <div class="mt-2 text-end">
                                                            <a class="small py-2 btn-sm btn btn-warning" href="{{route('quiz_instructions',['quiz'=>$quizSchedule['slug']])}}">Start Quiz <i class="bx bx-arrow-back bx-rotate-180 fs-6"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            @else
                            <section id="home_tab_section">
                                <div class="px-3 text-center">
                                    <img src="images/no_results.png" height="100" width="100" alt="">
                                    <p class="text-capitalize my-2 fs-5" style="color: #004bb2;">No Schedules Found</p>
                                </div>
                            </section>
                            @endif
                        </div>
                    </div>
        
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
                        <div class="row align-items-center justify-content-center my-4"> 
                            
                            @if($completedCount > 0)
                                @foreach($quizSchedules as $key => $quizSchedule)
                                    @if($quizSchedule['status'] == 'completed')
                                        <div class="col-lg-6 col-md-12 col-sm-12 col-12 my-2">
                                            <div class="exam_card shadow rounded-4 overflow-hidden row m-0 border position-relative">
                                                <div class="blog_image col-12 col-lg-4 col-md-4 col-sm-12 p-0" style="background: url('images/exam_Schedule.png') center no-repeat;background-size: contain;">
                                                </div>
                                                <div class="align-items-center blog_details col-12 col-lg-8 col-md-8 col-sm-12 d-flex p-4">
                                                    <div class="quiz_type_badge rounded-pill p-1">{{$quizSchedule['scheduleType']}}</div>    
                                                    <div class="py-2">
                                                        <h2 class="text-white fw-semibold h4 mt-1">{{$quizSchedule['title']}}</h2>
                                                        <p class="blog_subtitle text-white">Embark on your journey to knowledge with the commencement of your exam.</p>
                                                        <hr class="my-2">
                                                        <div class="align-items-center d-flex flex-wrap justify-content-between">
                                                            <div class="d-inline-flex align-items-center my-2">
                                                                <i class="bx bx-calendar text-green me-2"></i>
                                                                <span class="fw-light    small text-white">{{$quizSchedule['starts_at']}}</span>
                                                            </div>
                                                            <div class="d-inline-flex align-items-center my-2">
                                                                <i class="bx bx-calendar-x text-danger me-2"></i>
                                                                <span class="fw-light    small text-white">{{$quizSchedule['ends_at']}}</span>
                                                            </div>
                                                        </div>
                                                        <div class="mt-2 text-end">
                                                            <a class="small py-2 btn-sm btn btn-warning" href="{{route('quiz_results',['quiz'=>$quizSchedule['slug'],'session'=>$quizSchedule['session_code']])}}">Results <i class="bx bx-arrow-back bx-rotate-180 fs-6"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            @else
                            <section id="home_tab_section">
                                <div class="px-3 text-center">
                                    <img src="images/no_results.png" height="100" width="100" alt="">
                                    <p class="text-capitalize my-2 fs-5" style="color: #004bb2;">No Schedules Found</p>
                                </div>
                            </section>
                            @endif
                        </div>
                    </div>
                </div>  
           </div>
        </section>
    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
        integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 1.3,
            spaceBetween: 10,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            breakpoints: {
                640: {
                    slidesPerView: 2.2,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 3.2,
                    spaceBetween: 15,
                },
                1024: {
                    slidesPerView: 4.3,
                    spaceBetween: 20,
                },
            },
        });
    </script>

</body>

</html>