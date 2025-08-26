<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}" type="image/x-icon">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Change Syllabus - Student Portal - Tutors 11 Plus</title>
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
            color: #6700a0!important;
        }   

        .syllabus_card {
            height: 300px;
            width: auto;
            background: #fff;
            transition: 0.3s
        }

        .syllabus_card:hover {
            scale: 1.03;
            box-shadow: -1px 6px 10px 1px #4a4a4a4a!important;
        }

        .syllabus_card_image {
            height: 200px;
            width: 100%;
            background: url(https://portal.tutors11plus.co.uk/images/syllabus_banner.png) no-repeat center;
            background-size: 75%;
        }

        .btn_select_syllabus {
            background: #696cff!important;
            color: #fff!important;
        }

        .to_do_list_card {
            height: 100px;
            width: auto;
            background: #fff;
            transition: 0.3s;
        }

        .to_do_list_card:hover {
            scale: 1.01;
            box-shadow: -1px 6px 10px 1px #4a4a4a4a!important;
        }

        .to_do_list_name{
            width: 200px;
            white-space: nowrap;
            text-overflow: ellipsis;
            overflow: hidden;
        }

        @media (max-width: 350px) {
            .to_do_list_iconparent {
                display: none;
            }
            .to_do_list_name {
                width: 150px!important;
            }
        }

        /* journey  */

        .journey_title { grid-area: header; }
        .journey_progress { grid-area: main; }

        .journey_card {
            display: grid;
            grid-template-areas: 'header header header header header header' 'main main main main main main';
            background-color: #fff;
            transition: 0.3s
        }

        .journey_card:hover {
            scale: 1.01;
            box-shadow: -1px 6px 10px 1px #4a4a4a4a!important;
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
                width: 100%!important;
            }
            .journey_subject_image {
                height: 50px!important;
                width: 50px!important;
            }
            .journey_subject_image img {
                height: 25px!important;
                width: 25px!important;
            }
            .journey_reward {
                left: 95%!important;
            }
            .journey_reward img {
                height: 30px!important;
                width: 30px!important;
            }
        }

        @media (max-width: 320px) {
            .journey_card_name {
                font-size: 6.5vw!important;
            }
        }

        .welcome_student_section {
            height: auto;
            width: auto;
        }

        .welcome_user_image {
            height: 120px;
            width: 120px;
            outline: 3px solid #818181;
            border: 3px solid white;
        }

    </style>    
</head>

<body>
    @include('sidebar')
    @include('header')

    {{-- ------------------------------------- --}}

    <div class="col-lg-12 mb-5 px-3">
        <div class="welcome_student_section my-4">
            <div class="d-flex align-items-center welcome_student_container">
                <div class="welcome_user_image my-2 me-3 rounded-circle shadow position-relative" style="background: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRf37KBpIn8fSGaEJLmp20EWwNwRHf6YOBobF3G_KCykmbLH3psQ5b7UeeVfur8nJgbe-Y&usqp=CAU') center no-repeat; background-size: cover;">
                    <span class="position-absolute top-0 start-100 p-2 shadow-sm translate-middle badge rounded-pill bg-white">
                        <p class="mb-0 fs-6 text-warning">
                        <img src="{{url('images\reward.png')}}" height="20px" width="20px" alt="">    
                        100XP
                        </p>
                    </span>
                </div>
                <h2 class="text-dark display-4 fw-semibold my-2">Good Afternoon, {{Auth::user()->first_name}}!</h2>
            </div>
        </div>
        <!-- to do list  -->
        <div class="to_do_list_section my-5">
            <h3 class="text-dark fw-semibold mb-4">Question Sets</h3> 
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-12 my-2">
                    <a href="#" class="text-decoration-none">
                        <div class="to_do_list_card p-3 rounded-3">   
                            <div class="d-flex align-items-center h-100">
                                <div class="me-3">
                                    <div class="d-flex justify-content-center align-items-center rounded-circle" style="width: 50px; height: 50px; background: transparent;">
                                        <img src="https://cdn-icons-png.flaticon.com/512/9385/9385441.png" height="50" width="50" alt="">
                                    </div>
                                </div>
                                <div class="col-lg-10 col-md-8 col-10">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div style="flex-basis: 80%">
                                            <h4 class="to_do_list_name fw-semibold text-dark mb-1">
                                                Maths Test
                                            </h4>
                                            <span class="fs-6 text-dark fw-light">
                                                Practise - {{Auth::user()->first_name}} 
                                            </span>
                                        </div>
                                        <div class="text-end to_do_list_iconparent" style="flex-basis: 20%">
                                            <span class="fs-5">
                                                <svg class="to_do_list_icon" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" style="fill:#696cff "><path d="m11.293 17.293 1.414 1.414L19.414 12l-6.707-6.707-1.414 1.414L15.586 11H6v2h9.586z"></path></svg>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-12 my-2">
                    <a href="#" class="text-decoration-none">
                        <div class="to_do_list_card p-3 rounded-3">   
                            <div class="d-flex align-items-center h-100">
                                <div class="me-3">
                                    <div class="d-flex justify-content-center align-items-center rounded-circle" style="width: 50px; height: 50px; background: transparent;">
                                        <img src="https://cdn-icons-png.flaticon.com/512/9385/9385441.png" height="50" width="50" alt="">
                                    </div>
                                </div>
                                <div class="col-lg-10 col-md-8 col-10">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div style="flex-basis: 80%">
                                            <h4 class="to_do_list_name fw-semibold text-dark mb-1">
                                                English Test
                                            </h4>
                                            <span class="fs-6 text-dark fw-light">
                                                Practise - {{Auth::user()->first_name}} 
                                            </span>
                                        </div>
                                        <div class="text-end to_do_list_iconparent" style="flex-basis: 20%">
                                            <span class="fs-5">
                                                <svg class="to_do_list_icon" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" style="fill:#696cff "><path d="m11.293 17.293 1.414 1.414L19.414 12l-6.707-6.707-1.414 1.414L15.586 11H6v2h9.586z"></path></svg>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-12 my-2">
                    <a href="#" class="text-decoration-none">
                        <div class="to_do_list_card p-3 rounded-3">   
                            <div class="d-flex align-items-center h-100">
                                <div class="me-3">
                                    <div class="d-flex justify-content-center align-items-center rounded-circle" style="width: 50px; height: 50px; background: transparent;">
                                        <img src="https://cdn-icons-png.flaticon.com/512/9385/9385441.png" height="50" width="50" alt="">
                                    </div>
                                </div>
                                <div class="col-lg-10 col-md-8 col-10">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div style="flex-basis: 80%">
                                            <h4 class="to_do_list_name fw-semibold text-dark mb-1">
                                                VR Test
                                            </h4>
                                            <span class="fs-6 text-dark fw-light">
                                                Practise - {{Auth::user()->first_name}} 
                                            </span>
                                        </div>
                                        <div class="text-end to_do_list_iconparent" style="flex-basis: 20%">
                                            <span class="fs-5">
                                                <svg class="to_do_list_icon" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" style="fill:#696cff "><path d="m11.293 17.293 1.414 1.414L19.414 12l-6.707-6.707-1.414 1.414L15.586 11H6v2h9.586z"></path></svg>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-12 my-2">
                    <a href="#" class="text-decoration-none">
                        <div class="to_do_list_card p-3 rounded-3">   
                            <div class="d-flex align-items-center h-100">
                                <div class="me-3">
                                    <div class="d-flex justify-content-center align-items-center rounded-circle" style="width: 50px; height: 50px; background: transparent;">
                                        <img src="https://cdn-icons-png.flaticon.com/512/9385/9385441.png" height="50" width="50" alt="">
                                    </div>
                                </div>
                                <div class="col-lg-10 col-md-8 col-10">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div style="flex-basis: 80%">
                                            <h4 class="to_do_list_name fw-semibold text-dark mb-1">
                                                NVR Test
                                            </h4>
                                            <span class="fs-6 text-dark fw-light">
                                                Practise - {{Auth::user()->first_name}} 
                                            </span>
                                        </div>
                                        <div class="text-end to_do_list_iconparent" style="flex-basis: 20%">
                                            <span class="fs-5">
                                                <svg class="to_do_list_icon" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" style="fill:#696cff "><path d="m11.293 17.293 1.414 1.414L19.414 12l-6.707-6.707-1.414 1.414L15.586 11H6v2h9.586z"></path></svg>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <!-- journery  -->
        <div class="journey_section my-5">
            <h3 class="text-dark fw-semibold mb-4">Learning Journey</h3>
            <a href="/journey" class="text-decoration-none">
                <div class="journey_card shadow-sm rounded-2 p-4 position-relative">
                    <div class="journey_title journey_grid_child">
                        <div class="journey_subject_image me-2 d-flex justify-content-center align-items-center rounded-circle" style="width: 70px; height: 70px; background: #34d4903d;">
                            <img src="{{url('images\english-journey.png')}}" height="30" width="30" alt="">
                        </div>
                        <h3 class="journey_card_name fw-semibold text-dark mb-1">English</h3>
                    </div>
                    <div class="journey_progress journey_grid_child my-1">
                        <div class="journey_progress_parent mx-auto" style="width: 90%;">
                            <div class="progress position-relative my-2" style="background: #34d4903d;" role="progressbar"
                                aria-label="Animated striped example" aria-valuenow="75" aria-valuemin="0"
                                aria-valuemax="100">
                                <div class="progress-bar" style="width: 75%; background: #2eb77c;"></div>
                                <div
                                    class="journey_reward position-absolute d-flex align-items-center justify-content-center">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <img src="{{url('images\finish.png')}}" height="40" width="40" class="me-2"
                                            alt="reward coin">
                                        <!-- <h5 style="color: #2eb77c!important" class=" mb-0">75%</h5> -->
                                    </div>
                                </div>
                            </div>
                            <span class="fs-6 text-dark fw-light">
                                <span class="fw-semibold">0/12</span> correct questions this week
                            </span>
                        </div>
                    </div>
                </div>
            </a>
        </div>

    </div>

    {{--
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script> --}}

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });

        $('.syllabusSelected').click(function (e) {
            e.preventDefault();
            var code = $(this).data('code');
            $.ajax({
                type: "POST",
                url: 'update-syllabus',
                data: {
                    category: code,
                    _token: '{{ csrf_token() }}'
                },

                success: function (data) {
                    window.location.href = "/dashboard";

                },
                error: function (data, textStatus, errorThrown) {
                    console.log(data);
                },
            });

        });
    </script>
</body>
</html>