<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Learn & Practise {{$category['name']}} - Student Portal - {{app(\App\Settings\SiteSettings::class)->app_name}}</title>
   
    <meta name="description" content="" />
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}" type="image/x-icon">
    <!-- fontawesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

    <style>
        .practice_card {
            display: grid;
            grid-template-columns: minmax(60px, 70px) 1fr;
            grid-gap: 5px;
            background-color: #fff;
            transition: .3s
        }

        @media (max-width:425px) {
            .practice_card {
                grid-template-columns: minmax(50px, 60px) 1fr !important
            }
        }

        .practice_card:hover {
            scale: 1.01;
            box-shadow: -1px 4px 10px 1px #4a4a4a4a !important
        }

        .practice_card .practice_grid_child {
            display: flex;
            justify-content: start;
            align-items: center;
            font-size: 16px
        }

        .progress {
            height: .75rem
        }

        @media (max-width:425px) {
            .practice_progress_parent {
                width: 100% !important
            }

            .practice_subject_image {
                height: 50px !important;
                width: 50px !important
            }

            .practice_subject_image img {
                height: 35px !important;
                width: 35px !important
            }

            .progress {
                height: .5rem
            }
        }

        @media (max-width:425px) {
            .practice_card_name {
                font-size: 5vw !important
            }
        }

        @media (max-width:320px) {
            .practice_card_name {
                font-size: 5vw !important
            }
        }
        .practice_progress_parent{
            width: 90%;
        }
        .practice_subject_image{
            width: 60px;
            height: 60px;"
        }

        .message_section {
            height: auto;
            max-width: 600px;
        }
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

    <!-- main content  -->
    <section class="py-3">
        <h1 class="text-dark fw-medium my-4">Select Subject to Continue</h1>
        <div class="row justify-content-start align-items-center py-3 mb-3 m-0">
            @foreach ($category['sections'] as $section)
            @php
            $firstChar = substr($section->name, 0, 1);
            @endphp
                <div class="col-12 my-2 mx-auto">
                    <a href="{{ url('/learn-practice/' . $category['slug'] . '/' . $section->slug) }}"
                        class="text-decoration-none">
                        <div class="practice_card rounded-3 p-4 position-relative shadow-sm">
                            <div class="practice_title practice_grid_child justify-content-center">
                                <div class="practice_subject_image d-flex justify-content-center align-items-center rounded-circle"
                                  >
                                    @if($firstChar == 'M')
                                    <img src="{{url('images\maths.png')}}" height="50"
                                        width="50" alt="subjects icon">
                                    @elseif($firstChar == 'E')
                                    <img src="{{url('images\english.png')}}" height="50"
                                        width="50" alt="subjects icon">
                                    @elseif($firstChar == 'V')
                                    <img src="{{url('images\verbal_reasoning.png')}}" height="50"
                                        width="50" alt="subjects icon">
                                    @elseif($firstChar == 'N')
                                    <img src="{{url('images\non_verbal_reasoning.png')}}" height="50"
                                        width="50" alt="subjects icon">
                                        @elseif($firstChar == 'S')
                                    <img src="{{url('images\science.png')}}" height="50"
                                        width="50" alt="subjects icon">
                                    @endif

                                </div>
                            </div>
                            <div class="practice_progress practice_grid_child my-1">
                                <div class="practice_progress_parent ms-2">
                                    <h2 class="practice_card_name h4 fw-normal text-dark mb-1">{{ $section->name }}  </h2>
                                    @if($firstChar == 'M')
                                    <p class="text-dark">Mathematical Excellence for Strong Foundations.</p>
                                    @elseif($firstChar == 'E')
                                    <p class="text-dark">Linguistic Prowess: Mastering the Art of English.</p>
                                    @elseif($firstChar == 'V')
                                    <p class="text-dark">Expressive Skills: Navigating the World of Verbal Communication.</p>
                                    @elseif($firstChar == 'N')
                                    <p class="text-dark">Visual Intelligence: Unleashing Potential in Non-Verbal Thinking.</p>
                                    @endif
                                </div>
                                <i class="fa fa-arrow-right text-end "></i>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </section>

    <div class="text-center my-3">
        <img src="{{url('images/available_soon.png')}}" class="responsive_image" width="500" height="auto" alt="an illustration of girl waiting with excitement">
        <h2 class="fw-normal h4 my-2 text-center">This functionality will soon be accessible.</h2>
        <a href="/dashboard"  class="btn btn-primary text-white px-3 p-2 my-3">Go to Dashboard</a>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"
        integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/spectrum/1.7.1/spectrum.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/0.6.7/js/min/perfect-scrollbar.jquery.min.js"></script>

    <script>
        $(document).ready(function () {

            $("#home_tab").click(function () {
                $("#home_tab_section").show();
                $("#exam_tab_section").hide();
                $("#quiz_tab_section").hide();
                $("#practice_tab_section").hide();
                $("#text_print").text("Test in progress")
            });

            $("#exam_tab").click(function () {
                $("#home_tab_section").hide();
                $("#exam_tab_section").show();
                $("#quiz_tab_section").hide();
                $("#practice_tab_section").hide();
                $("#text_print").text("Exam Attempts")
            });

            $("#quiz_tab").click(function () {
                $("#home_tab_section").hide();
                $("#exam_tab_section").hide();
                $("#quiz_tab_section").show();
                $("#practice_tab_section").hide();
                $("#text_print").text("Quiz Attempts")
            });

            $("#practise_tab").click(function () {
                $("#home_tab_section").hide();
                $("#exam_tab_section").hide();
                $("#quiz_tab_section").hide();
                $("#practice_tab_section").show();
                $("#text_print").text("Practice")
            });

        })
    </script>
</body>

</html>