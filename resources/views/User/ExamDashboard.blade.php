<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
        <title>Exam Dashboard - Student Portal - Tutors 11 Plus</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="shortcut icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}" type="image/x-icon">
        <style>
            .exam_schedule_card {
                transition: 0.2s;
            }

            .exam_schedule_card:hover {
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
                color: #000 !important;
            }

            .Question_heading {
                font-size: 0.85rem;
                font-weight: 500;
                color: #000 !important;
            }

            @media (max-width: 320px) {
                .Question_heading {
                    font-size: 5vw !important;
                }
            }

            @media (max-width: 350px) {
                .dynamic_text_name {
                    font-size: 5.5vw !important;
                }

                .first_term_name {
                    font-size: 3.5vw !important
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
                background: #91c7ff1f;
            }

            .first_term_name {
                font-size: 0.9rem;
                font-weight: 400;
                background: #85c5ff42;
                color: #004bb2;
            }

            .test_session_details {
                font-size: 0.9rem !important;
                font-weight: 400;
                background: #f4f4f4;
                color: #004bb2 !important;
            }

            .Start_exam_button {
                color: #fff !important;
                background: #004bb2 !important;
                font-size: 0.9rem;
                cursor: pointer;
                transition: 0.3s
            }

            .Start_exam_button:hover {
                background: #004bb2 !important;
            }

            .text-green {
                color: orange;
            }
            .exam_cards_details{
                transition:0.25s !important;
            }
            .exam_cards_details:hover{
             scale:1.04;
            }
            .exam_card{
                transition:0.25s !important;
            }
            .exam_card:hover{
             scale:1.04;
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
                border-radius: 10px
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
                box-shadow: 0px 3px 8px 0px #00000026 !important;
            }

            .exam_type_tag {
                background: #fc8c6c;
                color: white;
                padding: 0.4rem 0.8rem !important;
            }

            .exam_session_image {
                height: 150px;
                width: auto;
                background: url('../images/exam_session_bg.png') center no-repeat;
                background-size: contain
            }

            .exam_content {
                background: #f9fcff;
            }

            /* exams new cards  */

            .exam_card {
                min-height: 200px;
                max-height: fit-content;
                background: #fff
            }

            .blog_subtitle {
                overflow: hidden;
                display: -webkit-box;
                -webkit-line-clamp: 2;
                line-clamp: 2;
                -webkit-box-orient: vertical;
            }

            @media (max-width: 767px) {
                .blog_image {
                    height: 200px
                }
            }

            .exam_type_badge {
                position: absolute;
                top: 10px;
                right: 10px;
                background: #fff5e4;
                color: #e47200;
                border: 1px solid #ffbc7a;
                font-size: 12px;
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
        </style>
    </head>
    <body>

        @include('sidebar')
        @include('header')

        <section>
     
            <!-- type slider  -->
            {{-- <!-- <div class="my-4">
                    <h3 class="text-dark fw-normal h2 mb-4">Exam Categories</h3> 
                    <div class="swiper_section p-2">
                        <div class="swiper mySwiper">
                            <div class="swiper-wrapper p-2">
                                @foreach ($examTypes as $key => $examType)
                                    <div class="swiper-slide">
                                        <a href="/exams/{{$examType['slug']}}" class="h-100 w-100 text-decoration-none">
                                            <div class="session_card"> 
                                                <div class="session_exam" style="background: url('{{url('images/exam_session_banner.jpg')}}') center no-repeat; background-size: cover"></div>
                                                <div style="height: 55px"
                                                    class="session_details d-flex justify-content-center align-items-center">
                                                    <h5 class="fw-normal text-dark mb-0">{{$examType['name']}}</h5>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>   -->
            <!-- live quizzes  -->
            
            <!-- <div class="my-4">
                <h2 class="text-dark fw-normal mt-5  h2 mb-4">Live Exam Sessions <span class="d-inline-flex translate-middle-y rounded-circle" style="width: 15px;height: 15px;padding: 2px;border: 1px solid #0014ff!important;"><span class="h-100 w-100 spinner-grow" style="background-color: #0058ff!important;"></span></span></h2>
                @if(count($examSchedules) > 0)
                    <div class="row m-0 align-items-center">
                        @foreach ($examSchedules as $examSchedule)
                       
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12 my-3">
                                <div class="exam_sessions_card p-4">
                                    <div class="text-end"><span class="border border-warning exam_type_tag font-monospace rounded-pill small">{{$examSchedule['type']}}</span></div>
                                    <div class="exam_session_image"></div>
                                    <h2 class="h4 text-dark text-center my-2">{{$examSchedule['title']}}</h2>
                                    <hr class="my-3">
                                    <div class="align-items-center d-flex my-3">
                                        <h2 class="fs-6 text-dark text-start m-0 me-1">
                                            @if($examSchedule['scheduleType'] == 'Flexible')
                                                EXAM AVAILABLE BETWEEN
                                            @else
                                                FIXED SCHEDULE TIME
                                            @endif</h2>
                                        <span class="d-inline-flex translate-middle-y rounded-circle" style="width: 10px;height: 10px;padding: 2px;border: 1px solid var(--portal-secondary)!important;">
                                            <span class="h-100 w-100 spinner-grow" style="background-color: var(--portal-secondary)!important;"></span>
                                        </span>
                                    </div>
                                    <div class="exam_content p-3 rounded-3" style='box-shadow: 0px 1px 4px 0px #0000004f !important;'>
                                        <div class="row">
                                            <div class="col-lg-5 col-md-8 col-sm-11 col-12 p-3">
                                                <div class="d-flex align-items-center mb-3">
                                                    <i class='bx bx-question-mark text-primary me-2'></i>
                                                    <p class="mb-0 time_styling">{{ $examSchedule['total_questions'] }} Questions</p>
                                                </div>
                                                <div class="d-flex align-items-center mb-3">
                                                    <i class='bx bx-time text-green me-2'></i>
                                                    <p class="mb-0 time_styling">{{ $examSchedule['total_duration'] }} Minutes</p>
                                                </div>
                                                <div class="d-flex align-items-center mb-3">
                                                    <i class='bx bxs-coin-stack text-warning me-2'></i>
                                                    <p class="mb-0 time_styling">{{ $examSchedule['total_marks']}} Marks</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-7 col-md-8 col-sm-11 col-12 p-3">         
                                                <div class="d-flex align-items-center mb-3">
                                                    <i class="bx bx-calendar text-green me-2"></i>
                                                    <p class="mb-0 time_styling">{{$examSchedule['starts_at'] }}</p>
                                                </div>
                                                <div class="d-flex align-items-center mb-3">
                                                    <i class='bx bx-calendar-x text-danger me-2'></i>
                                                    <p class="mb-0 time_styling">{{$examSchedule['ends_at'] }}</p>
                                                </div>
                                                <div class="d-flex align-items-center mb-3">
                                                    <i class="bx bx-globe text-warning me-2"></i>
                                                    <p class="mb-0 time_styling">Timezone - UTC</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="/exam/{{ $examSchedule['slug'] }}/instructions"class="btn btn-primary p-2 text-white w-100 my-3 shadow-sm">Start Exam</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <section id="home_tab_section">
                        <div class="px-3 text-center">
                            <img src="{{url('images\no_results.png')}}" height="100" width="100" alt="no results">
                            <p class="text-capitalize my-2" style="color: orange;">No Schedules Found</p>
                        </div>
                    </section>
                @endif          
            </div> --> --}}            
            <!-- header -->

            
        </section>
       
        <section class="header rounded-5 mt-3 p-3">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-5 col-md-7 col-sm-9">
                <h1 class="text-white">Exam Overview Hub</h1>
                <p class="fs-big mt-3 text-white">Here, you'll find everything you need to know about upcoming exams, including the types of exams you'll encounter and your scheduled assessments.</p>
                </div>
                <div class="col-lg-6 col-md-5 col-sm-9">
                    <img src="images/exam _schedule.png" height="400" width="500" alt="" class="img-fluid">
                </div>
            </div>
        </section>


        <section class="exams_types">
            <div class="mb-4">
                <h2 class="fw-semibold mb-1 mt-4 mt-lg-5 mt-md-5 text-dark">Categories</h2>
                <div class="heading_separator"></div>
                    <div class="row mt-5">      
                        @foreach ($examTypes as $key => $examType)
                            <div class="col-lg-3 col-md-6 col-sm-11">
                                <div class="exam_cards_details rounded-4 bg-white p-3 my-2">
                                    <div class="bg-white exam_icons p-2 rounded-4 ">
                                        <img src="images/exam-icon.png"  height="60" width="60" alt="" class="exam_icon_bg p-2 rounded">
                                    </div>
                                    <h4 >{{$examType['name']}}</h4>
                                    @if($examType['name']=='First Terms')  
                                      <p>{{$examType['name']}} exams play a crucial role in assessing students' progress
                                          </p>
                                    @else
                                    <p>{{$examType['name']}} exams allow students to deepen their understanding of concepts </p>
                                    @endif
                                      <div class="text-end mt-2">
                                        <a href="/exams/{{$examType['slug']}}" class="text-primary ">View Sessions <i class="fa-solid fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
            </div>
        </section>
       
        <section class="exam_schedule my-5">
            <div class="row align-items-center m-0 my-4">
                <div class="col-7">
                    <h2 class="fw-semibold my-2 text-dark">Exam Schedule</h2>
                    <div class="heading_separator"></div>
                </div>
                <div class="col-lg-5 col-md-12">
                    <!-- nav tabs -->
                    <ul class="nav nav-pills mt-md-3 mt-sm-3" id="pills-tab" role="tablist">
                        <li class="nav-item d-flex mx-2 my-2" role="presentation">
                            <button class="nav-link rounded-4 shadow active"  id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="false"> <img src="images/live_Session_icon.png" class="live_session_icon" width="25" height="25" alt=""> Live Exam Sessions</button>
                        </li>
                        <li class="nav-item my-2" role="presentation">
                            <button class="nav-link rounded-4 shadow " id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="true"><img src="images/live_Session_icon.png" class="live_session_icon" width="25" height="25" alt=""> Completed Exam Sessions</button>
                        </li>
                    </ul>
                </div>
                   <p class="mt-3">Welcome to the Exam Schedule section, your go-to resource for staying organized and informed about all your upcoming assessments. Here, you'll find detailed information about the dates, times, and locations of your exams, ensuring you're well-prepared on that time schedule. </p>
                   <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
                            <div class="row align-items-center justify-content-center my-4">
                                @if($startedCount > 0)
                                    @foreach($examSchedules as $key => $examSchedule)
                                        @if($examSchedule['status'] == 'started')
                                            <div class="col-lg-6 col-md-12 col-sm-12 col-12 my-2">
                                                <div class="exam_card shadow rounded-4 overflow-hidden row m-0 border position-relative">
                                                    <div class="blog_image col-12 col-lg-4 col-md-4 col-sm-12 p-0" style="background: url('images/exam_Schedule.png') center no-repeat;background-size: contain;">
                                                    </div>
                                                    <div class="align-items-center blog_details col-12 col-lg-8 col-md-8 col-sm-12 d-flex p-4">
                                                        <div class="exam_type_badge rounded-pill p-1">{{$examSchedule['type']}}</div>    
                                                        <div class="py-2">
                                                            <h2 class="text-white fw-semibold h4 mt-1">{{$examSchedule['title']}}</h2>
                                                            <p class="blog_subtitle text-white">Embark on your journey to knowledge with the commencement of your exam.</p>
                                                            <hr class="my-2">
                                                            <div class="align-items-center d-flex flex-wrap justify-content-between">
                                                                <div class="d-inline-flex align-items-center my-2">
                                                                    <i class="bx bx-calendar text-green me-2"></i>
                                                                    <span class="fw-light    small text-white">{{$examSchedule['starts_at']}}</span>
                                                                </div>
                                                                <div class="d-inline-flex align-items-center my-2">
                                                                    <i class="bx bx-calendar-x text-danger me-2"></i>
                                                                    <span class="fw-light    small text-white">{{$examSchedule['ends_at']}}</span>
                                                                </div>
                                                            </div>
                                                            <div class="mt-2 text-end">
                                                                <a class="small py-2 btn-sm btn btn-warning" href="{{route('exam_instructions', ['exam' => $examSchedule['slug']])}}">Start Exam <i class="bx bx-arrow-back bx-rotate-180 fs-6"></i></a>
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
                                            <img src="{{url('images\no_results.png')}}" height="100" width="100" alt="no results">
                                            <p class="text-capitalize my-2" style="color: orange;">No Schedules Found</p>
                                        </div>
                                    </section>
                                @endif
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
                            <div class="row align-items-center justify-content-center my-4"> 
                                @if($completedCount > 0)
                                    @foreach($examSchedules as $key => $examSchedule)
                                        @if($examSchedule['status'] == 'completed')
                                            <div class="col-lg-6 col-md-12 col-sm-12 col-12 my-2">
                                                <div class="exam_card shadow rounded-4 overflow-hidden row m-0 border position-relative">
                                                    <div class="blog_image col-12 col-lg-4 col-md-4 col-sm-12 p-0" style="background: url('images/exam_Schedule.png') center no-repeat;background-size: contain;">
                                                    </div>
                                                    <div class="align-items-center blog_details col-12 col-lg-8 col-md-8 col-sm-12 d-flex p-4">
                                                        <div class="exam_type_badge rounded-pill p-1">{{$examSchedule['type']}}</div>    
                                                        <div class="py-2">
                                                            <h2 class="text-white fw-semibold h4 mt-1">{{$examSchedule['title']}}</h2>
                                                            <p class="blog_subtitle text-white">Embark on your journey to knowledge with the commencement of your exam.</p>
                                                            <hr class="my-2">
                                                            <div class="align-items-center d-flex flex-wrap justify-content-between">
                                                                <div class="d-inline-flex align-items-center my-2">
                                                                    <i class="bx bx-calendar text-green me-2"></i>
                                                                    <span class="fw-light    small text-white">{{$examSchedule['starts_at']}}</span>
                                                                </div>
                                                                <div class="d-inline-flex align-items-center my-2">
                                                                    <i class="bx bx-calendar-x text-danger me-2"></i>
                                                                    <span class="fw-light    small text-white">{{$examSchedule['ends_at']}}</span>
                                                                </div>
                                                            </div>
                                                            <div class="mt-2 text-end">
                                                                <a class="small py-2 btn-sm btn btn-warning" href="{{route('exam_results', ['exam' => $examSchedule['slug'], 'session' => $examSchedule['session_code']])}}">Results <i class="bx bx-arrow-back bx-rotate-180 fs-6"></i></a>
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
                                            <img src="{{url('images\no_results.png')}}" height="100" width="100" alt="no results">
                                            <p class="text-capitalize my-2" style="color: orange;">No Schedules Found</p>
                                        </div>
                                    </section>
                                @endif
                            </div>
                        </div>
                    </div>       
            </div>
        </section>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"
            integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/spectrum/1.7.1/spectrum.min.js"></script>
        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/0.6.7/js/min/perfect-scrollbar.jquery.min.js"></script>
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
