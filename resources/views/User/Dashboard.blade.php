<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}" type="image/x-icon">
    <title>User Dashboard - {{Auth::user()->first_name}} {{Auth::user()->last_name}} - Student Portal - {{app(\App\Settings\SiteSettings::class)->app_name}}</title>
    <!-- bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preload" as="style" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css">

    <style>
        .btn_primary_customized {
            background-color: #696cff !important;
        }

        .btn_primary_customized:hover {
            box-shadow: 0px 0px 10px 1px #34343425;
        }

        .syllabus_customized_box {
            transition: 0.3s;
        }

        .syllabus_customized_box:hover {
            scale: 1.04;
            box-shadow: 0 0 10px 3px rgba(0, 0, 0, 0.039);
        }

        @media (max-width: 425px) {
            .syllabus_customized_box {
                margin: auto;
            }
        }

        #child_parent_name {
            color: #6700a0 !important;
        }

        .syllabus_card {
            height: 300px;
            width: auto;
            background: #fff;
            transition: 0.3s
        }

        .syllabus_card:hover {
            scale: 1.03;
            box-shadow: -1px 6px 10px 1px #4a4a4a4a !important;
        }

        .syllabus_card_image {
            height: 200px;
            width: 100%;
            background: url("../images/syllabus_banner.png") no-repeat center;
            background-size: 75%;
        }

        .btn_select_syllabus {
            background: #696cff !important;
            color: #fff !important;
        }

        .to_do_list_card {
            height: 100px;
            width: auto;
            background: #fff;
            transition: 0.3s;
        }

        .to_do_list_card:hover {
            scale: 1.01;
            box-shadow: -1px 6px 10px 1px #4a4a4a4a !important;
        }

        .to_do_list_name {
            /* width: 200px; */
            white-space: nowrap;
            text-overflow: ellipsis;
            overflow: hidden;
        }

        @media (max-width: 350px) {
            .to_do_list_iconparent {
                display: none;
            }

            .to_do_list_name {
                width: 150px !important;
            }
        }

        /* journey  */

        .journey_title {
            grid-area: header;
        }

        .journey_progress {
            grid-area: main;
        }

        .journey_card {
            display: grid;
            grid-template-areas: 'header header header header header header' 'main main main main main main';
            background-color: #fff;
            transition: 0.3s
        }

        .journey_card:hover {
            scale: 1.01;
            box-shadow: -1px 6px 10px 1px #4a4a4a4a !important;
        }

        .journey_card .journey_grid_child {
            display: flex;
            justify-content: start;
            align-items: center;
            font-size: 16px;
        }

        .journey_reward {
            height: auto;
            width: auto;
            bottom: 75%;
            left: 100%;
        }

        @media (max-width: 425px) {
            .journey_progress_parent {
                width: 100% !important;
            }

            .journey_subject_image {
                height: 50px !important;
                width: 50px !important;
            }

            .journey_subject_image img {
                height: 25px !important;
                width: 25px !important;
            }

            .journey_reward {
                left: 95% !important;
            }

            .journey_reward img {
                height: 30px !important;
                width: 30px !important;
            }
        }

        @media (max-width: 320px) {
            .journey_card_name {
                font-size: 6.5vw !important;
            }
        }

        .welcome_student_section {
            height: auto;
            width: auto;
        }

        .welcome_user_image {
            height: 90px;
            width: 90px;
            /* outline: 3px solid #818181; */
            border: 2px solid white;
        }

        .exp_coins_container {
            position: absolute;
            top: -20px;
            left: 50px;
        }


        /* for practcie card */
        .practice_card {
            display: grid;
            grid-template-columns: minmax(80px, 100px) 1fr;
            grid-gap: 5px;
            background-color: #fff;
            transition: 0.3s
        }

        @media (max-width: 575px) {
            .user_header_container {
                width: fit-content;
                margin: auto;
            }

            .welcome_user_image {
                height: 100px;
                width: 100px
            }

            .child_portal_header_image {
                /* margin-top: 1rem!important; */
                width: 280px !important;
            }
        }

        @media (max-width: 425px) {
            .practice_card {
                grid-template-columns: minmax(50px, 60px) 1fr !important;
            }
        }

        .practice_card:hover {
            scale: 1.01;
            box-shadow: -1px 6px 10px 1px #4a4a4a4a !important;
        }

        .practice_card .practice_grid_child {
            display: flex;
            justify-content: start;
            align-items: center;
            font-size: 16px;
        }

        .practice_reward {
            height: auto;
            width: auto;
            bottom: 75%;
            left: 100%;
            background-color: red;
        }

        .progress {
            height: 0.75rem;
        }

        @media (max-width: 425px) {
            .practice_progress_parent {
                width: 100% !important;
            }

            .practice_subject_image {
                height: 50px !important;
                width: 50px !important;
            }

            .practice_subject_image img {
                height: 25px !important;
                width: 25px !important;
            }

            .practice_reward {
                left: 95% !important;
            }

            .practice_reward img {
                height: 30px !important;
                width: 30px !important;
            }

            .progress {
                height: 0.5rem;
                background: #adb8c36e;
            }
        }

        @media (max-width: 320px) {
            .practice_card_name {
                font-size: 6.5vw !important;
            }
        }

        .progress_completion {
            position: absolute;
            left: 95%;
            bottom: 100%;
        }

        .message_container {
            height: auto;
            width: auto;
            background: #e6eeff;
            color: #0442bb !important;
            font-size: 1rem;
        }

        /* welcome profile  */
        .welcome_student_container {
            display: flex;
            align-items: center;
        }

        @media (max-width: 425px) {
            .welcome_student_container {
                display: block !important;
                text-align: center !important;
            }

            .message_container {
                margin-top: 1rem !important;
            }
        }

        .progress-student {
            height: 0.75rem;
        }

        .journey-section {
            height: 200px;
        }

        .journey_icon {
            max-width: 70px;
        }

        .bs-gutter-x-0 {
            --bs-gutter-x: 0 !important;
        }

        .custom-fit {
            width: fit-content;
        }

        .font-sie-13 {
            font-size: 13px;
        }

        @media screen and (max-width: 316px) {
            .journey_coin {
                width: 30%;
            }
        }

        .start-btn {
            background-color: var(--portal-primary) !important;
            color: white !important;
        }

        .journey_item_card {
            transition: 0.3s;
        }

        .journey_item_card:hover {
            scale: 1.01;
            box-shadow: -1px 6px 10px 1px #4a4a4a4a !important;
        }

        .to_do_list_img {
            width: 50px;
            height: 50px;
            background: transparent;
        }

        .to_do_list_iconparent {
            flex-basis: 20%;
        }

        .practice_subject_image {
            width: 80px;
            height: 80px;
        }

        .practice_progress_parent {
            width: 90%;
        }

        .user_avatar_span {
            left: 80%;
        }

        .more_activities_img {
            width: 50px;
            height: 50px;
            background: transparent;
        }

        .learn_practice_img {
            width: 50px;
            height: 50px;
            background: transparent;
        }

        .heading_separator {
            height: 0.4rem;
            width: 120px;
            background: orange;
            border-radius: 20rem;
        }

        /* Child header */
        .child_header {
            background: radial-gradient(#0083ff, #005ab0);
        }

        .progress_session_card {
            min-height: 250px;
            max-height: fit-content;
            transition: 0.25s;
        }

        .progress_session_card:hover {
            scale: 1.02;
            box-shadow: 0px 7px 9px 0px #0000003b !important;
        }

        .swiper {
            height: fit-content;
            width: auto;
            user-select: none;
            -webkit-user-select: none;
        }

        .swiper-slide {
            height: auto;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .to_do_card_item {
            height: 100%;
            width: 100%;
            background: linear-gradient(45deg, #175298, #127af4);
            position: relative;
            overflow: hidden;
        }

        .to_do_card_image {
            height: 55px;
            width: 55px;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #ffffff30
        }

        .top_circle_shade {
            height: 150px;
            width: 150px;
            background: #ffffff1a;
            position: absolute;
            top: -45px;
            right: -70px;
        }

        .bottom_circle_shade {
            height: 150px;
            width: 150px;
            background: #ffffff1a;
            position: absolute;
            bottom: -45px;
            left: -70px;
        }

        .pratice_sets_cards {
            height: auto;
            width: auto;
            background: linear-gradient(45deg, #0062e9, #0055ca) !important;
        }

        .practice_set_completion {
            height: 50px;
            width: 50px;
            background: #00000035 !important;
            color: #ffffff !important;
        }

        .activity_card {
            height: auto;
            width: auto;
        }

        .activity_card_shade {
            height: 150px;
            width: 150px;
            background: #ffffff21;
            position: absolute;
            right: -90px;
            top: -55px;
        }

        .practice_activities {
            background: radial-gradient(#339bff, #0066ff) !important;
        }

        .video_activities {
            background: radial-gradient(#ffb95d, #f28a00) !important;
        }

        .nav-tabs .nav-link.active,
        .nav-tabs .nav-item.show .nav-link {
            background: transparent !important;
            color: #000 !important;
            border-bottom: 2px solid #0098ff !important
        }

        .avatar_store_section {
            height: 420px;
            width: auto;
            overflow: auto;
        }

        .display_cards {
            height: auto;
            width: auto;
            box-shadow: 0px 4px 6px 0px #0000002b !important;
        }

        .performance_card {
            min-height: 140px;
            max-height: fit-content;
            width: auto;
            background: radial-gradient(#47c36d , #2a7842);
        }

    </style>
</head>

<body>
    @include('sidebar')
    @include('header')

    <!-- Child header section -->
    <section class="child_header my-3 rounded-5">   
        <div class="align-items-center header m-0 p-3 py-lg-4 py-md-4 py-5 rounded-5 row">
            <div class="col-lg-6 col-md-12 col-sm-12 my-3"> 
                <div class="d-lg-flex d-md-flex d-sm-flex d-block align-items-center my-1 ">
                    <div class="user_header_container position-relative">
                        <a href="/profile" class="text-decoration-none rounded-circle m-2 ms-0" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Profile Settings" data-bs-original-title="" title="">
                        @if($profile_photo_path)
                            <div class="welcome_user_image rounded-circle shadow position-relative mx-auto" style="background: url({{ url($profile_photo_path) }}) top center no-repeat; background-size: cover;"></div>
                        @else 
                            <div class="welcome_user_image rounded-circle shadow position-relative mx-auto" style="background: url('{{url('images/login_form_imagee.webp')}}') center no-repeat; background-size: cover;"></div>
                        @endif    
                        </a>
                        <a href="/profile?coins_shop=avatar" class="exp_coins_container bg-white shadow rounded-pill">
                            <span class="d-flex align-items-center py-2 p-3" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Coins Shop">    
                                <img src="{{url('images\reward.png')}}" height="25" width="25" alt="reward coin">
                                <span class="fw-bold m-0 ms-1 text-dark">{{$total_coins}}</span>
                            </span>
                        </a>
                    </div>
                    <h2 class="fw-bold text-white fs-1 m-0 mx-1"><span id="greetings_time"></span>, {{Auth::user()->first_name}}!</h2>
                </div>
                <p class="fs_cs_5 mt-2 text-white">Welcome to our Student Portal – your gateway to academic excellence! Explore resources, connect with peers, and embark on a journey of knowledge and growth. Your success is our priority – enjoy the adventure!</p>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 my-3 text-center">
                <img src="{{url('images\child_portal_header.png')}}" class='child_portal_header_image' width="320" height="auto" alt="sudent 3d character">
            </div>
        </div>
    </section>

    <section class="progressed_sessions">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-3 col-md-6 col-sm-6 my-2">
                <a href="/student/practice-sets" class="text-decoration-none">
                    <div class="progress_session_card rounded-5 p-3 pb-4" style="background: radial-gradient(#2f5bff ,#153ccc) !important;">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h2 class="fw-bold m-0 text-white h3">{{-- {{$PracticeSetCount}} --}}</h2>
                            <img src="{{url('images\to_do_image2.png')}}" width="50" height="50" alt="" style="filter: invert(1);">
                        </div>
                        <h2 class="text-white mb-2 fs-4">Question Sets</h2>
                        <p class="fw-normal mt-2 text-white">Explore educational resources and apply concepts actively with ease.</p>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 my-2" >
                <a href="/exams" class="text-decoration-none">
                    <div class="progress_session_card rounded-5 p-3 pb-4 " style="background: radial-gradient(#ffb33f ,#ffa400) !important;">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h2 class="fw-bold m-0 text-white h3">{{-- {{$ExamCount}} --}}</h2>
                            <img src="{{url('images\open-book.png')}}" width="50" height="50" alt="" style="filter: invert(1);">
                        </div>
                        <h2 class="text-white mb-2 fs-4">Exams</h2>
                        <p class="fw-normal mt-2 text-white">Assess your knowledge through comprehensive examination.</p>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 my-2" >
                <a href="/quizzes" class="text-decoration-none">
                    <div class="progress_session_card rounded-5 p-3 pb-4 "style="background:  radial-gradient( #6600de , #4c00a6)!important;">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h2 class="fw-bold m-0 text-white h3">{{-- {{$QuizCount}} --}}</h2>
                            <img src="{{url('images\quizzes_icon.png')}}" width="50" height="50" alt="" style="filter:invert(1)">
                        </div>
                        <h2 class="text-white mb-2 fs-4">Quizzes</h2>
                        <p class="fw-normal mt-2 text-white">Engage in interactive assessments to reinforce understanding.</p>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 my-2" >
                <a href="student/journey-progress" class="text-decoration-none">
                    <div class="progress_session_card rounded-5 p-3 pb-4 "style="background: radial-gradient(#45c83c ,#2c8c26) !important;">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h2 class="fw-bold m-0 text-white h3">{{-- {{$JourneySetCount}} --}}</h2>
                            <img src="{{url('images\to_do_image3.png')}}" width="50" height="50" alt="" style="filter: invert(1);">
                        </div>
                        <h2 class="text-white mb-2 fs-4">Journey Sets</h2>
                        <p class="fw-normal mt-2 text-white">Embark on a Personalised path of curated learning experiences.</p>
                    </div>
                </a>
            </div>
        </div>
    </section>
    <!-- to do list  -->
    @if(count($practiceSets) > 0)
        <section class="to_do_list py-2">
            <div class="mb-4">
                <h2 class="h1 fw-semibold mb-1 mt-4 mt-lg-5 mt-md-5 text-dark">To-do Practises</h2>
                <div class="heading_separator"></div>
            </div>
            <div class="swiper to_do_list_swiper p-2">
                <div class="swiper-wrapper text-center">
                @foreach($practiceSets as $list)
                    <div class="swiper-slide my-1 p-1">
                        <a href="{{ route('init_practice_set', ['practiceSet' => $list['slug'], 'suggestedPracticeSetId' => $list['SuggestedPracticeSetId']]) }}" class="text-decoration-none h-100 w-100">
                            <div class="to_do_card_item p-3 rounded-4 py-4">
                                <div class="top_circle_shade rounded-circle"></div>
                                <div class="bottom_circle_shade rounded-circle"></div>
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div class="to_do_card_image p-2 rounded-3">
                                        <img src="{{url('images/total_exams_img.png')}}" height='35' width='35' alt="">
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill='var(--portal-white)'><path d="m11.293 17.293 1.414 1.414L19.414 12l-6.707-6.707-1.414 1.414L15.586 11H6v2h9.586z"></path></svg>
                                </div>
                                <div class="to_do_card_details">
                                    <h2 class="fs_cs_5 fw-light my-2 text-start text-white">{{$list['title']}}</h2>
                                    <h2 class="fs-4 fw-normal my-2 text-start text-white">({{$list['skill']}})</h2>
                                    <h2 class="fs-5 text-start mt-5 text-white fw-light">Practise - {{$list['set_by']}} </h2>
                                </div>
                            </div>                    
                        </a>
                    </div>
                @endforeach
                </div>
            </div>
        </section>
    @endif 

    <!-- Learning Journeys  -->
    @if(count($journeys) > 0)
        <section class='py-2'>
            <div class="mb-4">
                <h2 class="h1 fw-semibold mb-1 mt-4 mt-lg-5 mt-md-5 text-dark">Learning Journeys</h2>
                <div class="heading_separator"></div>
            </div>
            @foreach($journeys as $key => $journey)
                <div class="rounded journey_item_card bg-white py-3 my-3 container-fluid shadow-sm">
                    <div class="row">
                        <div class="col-12 col-md-9 my-2">
                            <div class="d-sm-flex">
                                <div class="align-self-center">
                                    <img class="journey_icon p-1" src="{{$journey['iconImgPath']}}" alt="{{$journey['subject']}}">
                                </div>
                                <div class="w-100 ms-sm-3">
                                    <div class="fs-4 text-dark fw-normal">{{$journey['subject']}}</div>
                                    <div class="row bs-gutter-x-0">
                                        <div class="col-9 col-sm-10 align-self-center">
                                            <div class="my-2 my-2 w-100 bg-label-secondary rounded-2" role="progressbar" aria-valuenow="75" aria-valuemin="10" aria-valuemax="100">
                                                <div class="h-px-20 rounded-2" style="background-color:{{$journey['movingLineColor']}};width:{{$journey['percentage_completed']}}%;"></div>
                                            </div>
                                        </div>
                                        <div class="col-3 col-sm-2 align-self-center">
                                            <div class="bg-label-secondary px-2 py-1 rounded-3 text-dark custom-fit font-sie-13">
                                                <img class="journey_coin" src="{{url('images/reward.png')}}" width="20" height='20' alt="tutorselevenplus coin"> +{{$journey['total_points_earned']}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-3 my-2 text-center align-self-center">
                            <a href="{{route('student_journey', ['id' => $journey['id']])}}" class="btn btn-primary p-2 px-4 text-white">Start</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </section>
    @endif

    <!-- practice sets  -->
    @if (count($practiceSessions) > 0)
        <section class="practice_section py-2">
            <div class="mb-4">
                <h2 class="h1 fw-semibold mb-1 mt-4 mt-lg-5 mt-md-5 text-dark">Continue Your Practises</h2>
                <div class="heading_separator"></div>
            </div>
            <div class="row align-items-center justify-content-center my-3">
                @foreach ($practiceSessions as $practiceSession)
                    @if(count($practiceSession) > 0)
                        <div class="col-12 col-lg-6 col-md-10 mx-auto my-2">
                            @if($practiceSession['parent_suggested'])
                                <a href="{{ route('init_practice_set', ['practiceSet' => $practiceSession['slug'], 'suggestedPracticeSetId' => $practiceSession['parent_suggested_id']]) }}" class="text-decoration-none">
                            @else
                                <a href="{{ route('init_practice_set', ['practiceSet' => $practiceSession['slug']]) }}" class="text-decoration-none">
                            @endif
                                <div class="pratice_sets_cards p-4 rounded-4 d-flex align-items-center" style="min-height: 180px; max-height: fit-content;">
                                    <div class="d-flex justify-content-between align-items-center w-100">
                                        <div class="d-flex align-items-center">
                                            <div class='me-lg-3 me-md-3 me-2'>
                                                <img src="{{url('images/practice.png')}}" height='50' width='50' alt="question sets">
                                            </div>
                                            <div>
                                                <h2 class="fs-4 fw-medium my-1 text-white">{{$practiceSession['title']}}</h2>
                                                <p class="fs-6 fw-normal my-2 text-white">{{$practiceSession['skill']}}</p>
                                                <p class="fs-6 fw-light mb-2 text-white">Questions set by {{$practiceSession['set_by']}}</p>
                                            </div>
                                        </div>
                                        <div><div class="align-items-center practice_set_completion d-flex justify-content-center rounded-circle">{{$practiceSession['percentage_completed']}}%</div></div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endif
                @endforeach
                <!-- <div class="col-12 col-lg-6 col-md-10 mx-auto my-2">
                    <a href="http://localhost:8000/practice/shahida-test-set/init?suggestedPracticeSetId=170" class="text-decoration-none">
                        <div class="align-items-center d-flex p-4 pratice_sets_cards rounded-4">
                            <div class="align-items-center d-flex justify-content-between w-100">
                                <div class="d-flex align-items-center">
                                    <div class="me-lg-3 me-md-3 me-2">
                                        <img src="http://localhost:8000/images/practice.png" height="50" width="50" alt="question sets">
                                    </div>
                                    <div>
                                        <h2 class="fs-4 fw-medium my-1 text-white">Shahida Test Set</h2>
                                        <p class="fs-6 fw-normal my-2 text-white">Measurement</p>
                                        <p class="fs-6 fw-light mb-2 text-white">Questions set by Shahida</p>
                                    </div>
                                </div>
                                <div><div class="align-items-center practice_set_completion d-flex justify-content-center rounded-circle">38%</div></div>
                            </div>
                        </div>
                    </a>
                </div> -->
            </div>
        </section>
    @endif

    <!-- practice sets  -->
    @if (count($journeySessions) > 0)
        <section class="practice_section py-2">
            <div class="mb-4">
                <h2 class="h1 fw-semibold mb-1 mt-4 mt-lg-5 mt-md-5 text-dark">Continue Journey</h2>
                <div class="heading_separator"></div>
            </div>
            <div class="row align-items-center justify-content-center my-3">
                @foreach ($journeySessions as $journeySession)
                    @if(count($journeySession) > 0)
                        <div class="col-12 col-lg-6 col-md-10 mx-auto my-2">
                            <a href="{{ route('init_journey_set', ['journeySet' => $journeySession['slug'], 'journey' => true]) }}" class="text-decoration-none">
                                <div class="pratice_sets_cards p-4 rounded-4 d-flex align-items-center" style="min-height: 180px; max-height: fit-content;">
                                    <div class="d-flex justify-content-between align-items-center w-100">
                                        <div class="d-flex align-items-center">
                                            <div class='me-lg-3 me-md-3 me-2'>
                                                <img src="{{url('images/practice.png')}}" height='50' width='50' alt="question sets">
                                            </div>
                                            <div>
                                                <h2 class="fs-4 fw-medium my-1 text-white">{{$journeySession['title']}}</h2>
                                                <p class="fs-6 fw-normal my-2 text-white">{{$journeySession['skill']}}</p>
                                                <p class="fs-6 fw-light mb-2 text-white">Questions set by {{$journeySession['set_by']}}</p>
                                            </div>
                                        </div>
                                        <div><div class="align-items-center practice_set_completion d-flex justify-content-center rounded-circle">{{$journeySession['percentage_completed']}}%</div></div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endif
                @endforeach
            </div>
        </section>
    @endif

    <!-- performance cards -->
    @if(count($sections) > 0)
        <div class="performance_section">
            <div class="mb-4">
                <h2 class="h1 fw-semibold mb-1 mt-4 mt-lg-5 mt-md-5 text-dark">Performance</h2>
                <div class="heading_separator"></div>
            </div>
            <div class="row justify-content-center">
                @foreach($sections as $sec)
                    <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                        <a href="{{route('student_performance', ['id' => $sec['id']])}}" class="text-decoration-none">
                            <div class="performance_card rounded-4 p-4 position-relative d-flex align-items-center overflow-hidden">
                                <div>
                                    <h2 class="fw-medium h5 text-white">{{$sec['name']}}</h2>
                                    <p class="fw-light fs-6 text-white mt-3">Track and Improve your progress</p>
                                </div>
                                <div class="top_circle_shade rounded-circle"></div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    <!-- more activities  -->
    <div class="misc_activities mb-5">
        <div class="mb-4">
            <h2 class="h1 fw-semibold mb-1 mt-4 mt-lg-5 mt-md-5 text-dark">More Activities</h2>
            <div class="heading_separator"></div>
        </div>
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6 col-sm-12 col-12 my-2">
                <a href="{{ route('student_practice_sets_create') }}" class="text-decoration-none">
                    <div class="activity_card practice_activities p-4 rounded-4 d-flex align-items-center position-relative overflow-hidden">
                        <img src="{{url('images/practice_screen_solid_icon.png')}}" height='40' width='40' alt="Practise sets icon" style="filter:invert(1)">
                        <div class='ms-2'>
                            <h2 class="fw-medium h4 my-1 text-white">Question Sets</h2>
                            <p class="fw-normal my-1 text-white">Choose what you want to Practise.</p>
                        </div>
                        <div class="activity_card_shade rounded-circle"></div>
                    </div>
                </a>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-12 my-2">
                <a href="{{ route('learn_practice') }}" class="text-decoration-none">
                    <div class="activity_card video_activities p-4 rounded-4 d-flex align-items-center position-relative overflow-hidden">
                        <img src="{{url('images/learning_videos_solid_icon.png')}}" height='45' width='45' alt="learning videos icon" style="filter:invert(1)">
                        <div class='ms-2'>
                            <h2 class="fw-medium h4 my-1 text-white">Learning Videos</h2>
                            <p class="fw-normal my-1 text-white">Watch and Learn lessons, Practise anytime.</p>
                        </div>
                        <div class="activity_card_shade rounded-circle"></div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    
    <!-- Learning Journey progress bar -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/raphael/2.3.0/raphael.min.js'></script>
    <script type='text/javascript'>
        !(function (a) {
            a.fn.percentageLoader = function (b) {
                this.each(function () {
                    function q() {
                        // Update the path attribute to make it a dashed circle
                        p.customAttributes.arc = function (a, b, c) {
                            var h,
                                d = (360 / b) * a,
                                e = ((90 - d) * Math.PI) / 180,
                                f = j + c * Math.cos(e),
                                g = k - c * Math.sin(e);
                            return (
                                (h = [
                                    "M", j, k - c,
                                    "A", c, c, 0, +(d > 180), 1, f, g
                                ]),
                                { path: h }
                            );
                        };

                        // Update the path attribute to make it a dashed circle
                        m.attr({ "stroke-dasharray": "- " });

                        r(e, 100, l, m, 2);
                    }

                    var c = a(this),
                        d = a.extend({}, a.fn.percentageLoader.defaultConfig, b),
                        e = parseInt(c.children(d.valElement).text()),
                        f = !0,
                        h = parseInt(c.css("width")),
                        i = parseInt(c.css("height")),
                        j = h / 2,
                        k = i / 2,
                        l = j - d.strokeWidth / 2,
                        m = null,
                        n = null,
                        p = Raphael(this, h, i);
                    
                    // ... existing code
                    
                    q();
                });
            };

            a.fn.percentageLoader.defaultConfig = {
                valElement: "p",
                strokeWidth: 20,
                bgColor: "#d9d9d9",
                ringColor: "#d53f3f",
                textColor: "#9a9a9a",
                fontSize: "12px",
                fontWeight: "normal",
                callback: null
            };
        })(jQuery);
    </script>

	<script type="text/javascript">		
		$('.percent').percentageLoader({
		  bgColor: 'rgba(0,0,0,.2)',
		  ringColor: '#0abde3',
		  textColor: '#fff',
		  fontSize: '20px',
		  strokeWidth: 10
		});
	</script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"
        integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        // custom greetings by the time 
        function greetingMessage() {
            let greetingTime = $("#greetings_time");
            let todayTime = new Date(); 
            let hours = todayTime.getHours();
            let greeting = '';
            if (hours >= 5 && hours < 12) {
                greeting = 'Good Morning';
            } else if (hours >= 12 && hours < 16) {
                greeting = 'Good Afternoon';
            } else if (hours >= 16 && hours < 24) {
                greeting = 'Good Evening';
            } else {
                greeting = 'Good Midnight';
            }
            // Display the greeting
            greetingTime.text(greeting);
        }
        // callback greetings function 
        greetingMessage();

        // avatars_spinner
        $(".exp_coins_container").one('click', function(){
            $(".avatars_spinner").removeClass('d-none');
            setTimeout(() => {
                $(".avatars_spinner").addClass('d-none');
                $(".avatar_cards_container").removeClass('d-none');               
            }, 1200);
        });

    </script>

    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js" ></script>
    <script>
        var swiper = new Swiper(".to_do_list_swiper", {
            slidesPerView: 1.2,
            spaceBetween: 8,
            autoplay: {
                delay: 5000 ,
                disableOnInteraction: !1
            },
            breakpoints: {
                500: {
                    slidesPerView: 1.5,
                    spaceBetween: 10
                },
                768: {
                    slidesPerView: 2.75,
                    spaceBetween: 10
                },
                1024: {
                    slidesPerView: 3.1,
                    spaceBetween: 15
                },
                1440: {
                    slidesPerView: 4,
                    spaceBetween: 20
                }
            }
        })
    </script>

</body>
</html>