<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quizzes - Question Analysis | {{ app(\App\Settings\SiteSettings::class)->app_name }}</title>
    <!-- rel icon -->
    <link rel="icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}">
    <meta name="description" content="{{ app(\App\Settings\SiteSettings::class)->seo_description }}">
    <meta name="author" content="{{ app(\App\Settings\SiteSettings::class)->app_name }}">

    <style>
        #days{
            max-width: 200px;
        }
        .chart-container {
            position: relative;
            margin: auto;
            max-height: fit-content;
        }

        @media (max-width: 320px) {
            .tab_navigation_buttons img{
                width: 35px!important;
            }
            .tab_navigation_buttons h6{
                font-size: 13px!important
            }
        }
        .questions_analysis_card {
            height: auto;
            width: auto;
            background: linear-gradient(160deg, #000000d9, #00000036), url('../images/question_analysis_bg.jpg') center;
            background-size: cover;
        }

        .selected_questions_analysis_card {
            border: 2px solid var(--portal-secondary) !important;
        }

        .additional_detailss_section {
            height: auto;
            width: auto;
            margin: 2rem auto;
        }
    </style>
</head>
<body>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @include('sidebar')
    @include('header')

    <nav class='mb-4'
        style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
        aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item fw-light small text-dark">Dashboard</li>
            <li class="breadcrumb-item fw-light small text-dark">Resources</li>
            <li class="breadcrumb-item fw-light active small text-primary" aria-current="page">Question Analysis - Quizzes</li>
        </ol>
    </nav>

    <!-- curriculum  -->
    <section class="question_section my-4 mt-5">
        <h1 class="display-6 text-capitalize my-3 mb-2">Quiz Question Analysis</h1>
        <p class="fs-5 my-3">Explore your child's performance with detailed question analysis, revealing answered, unanswered, and overall progress in quizzes.</p>
        <div class="row m-0 my-4 align-items-center justify-content-center">
            <div class="col-lg-4 col-md-6 col-sm-10 col-12 mx-auto my-2">
                <a href="{{url('question-analysis/exams')}}" class="text-decoration-none">
                    <div
                        class="align-items-center questions_analysis_card d-flex p-lg-4 p-md-4 p-3 rounded-3 shadow">
                        <svg fill="white" height="50" class="me-2 step_svg" viewBox="0 0 32 32" width="50" xmlns="http://www.w3.org/2000/svg"><g id="Layer_10"><path d="m8.689 12.535c-.497 0-.9.403-.9.9s.403.9.9.9h9.65c.497 0 .9-.403.9-.9s-.403-.9-.9-.9z"/><path d="m13.028 17.644h-4.339c-.497 0-.9.403-.9.9s.403.9.9.9h4.339c.497 0 .9-.403.9-.9s-.403-.9-.9-.9z"/><path d="m12.895 29.1h-6.85c-1.473 0-2.67-1.202-2.67-2.68v-18.23c0-1.478 1.197-2.68 2.67-2.68h1.859v.226c0 1.313 1.068 2.38 2.381 2.38h8.6c1.313 0 2.381-1.067 2.381-2.38v-.226h1.85c1.497 0 2.669 1.177 2.669 2.68v5.13c0 .497.403.9.9.9s.9-.403.9-.9v-5.13c0-2.47-2.005-4.48-4.47-4.48h-1.85v-.23c0-1.313-1.068-2.38-2.381-2.38h-8.6c-1.313 0-2.381 1.067-2.381 2.38v.23h-1.858c-2.465 0-4.471 2.01-4.471 4.48v18.23c0 2.47 2.006 4.48 4.471 4.48h6.85c.497 0 .9-.403.9-.9s-.403-.9-.9-.9zm-3.19-25.62c0-.32.26-.58.58-.58h8.6c.32 0 .58.26.58.58v2.255c0 .32-.26.58-.58.58h-8.6c-.32 0-.58-.26-.58-.58z"/><path d="m29.47 17.358c-1.232-1.233-3.383-1.234-4.616 0l-7.979 7.979c-.257.257-.425.583-.486.942l-.438 2.589c-.093.555.09 1.125.488 1.522.329.329.774.509 1.231.509.097 0 .193-.008.289-.024l2.588-.437c.359-.061.685-.229.942-.486l7.979-7.979c1.273-1.272 1.273-3.342.002-4.615zm-9.222 11.306-2.521.503.422-2.557 5.719-5.719 2.071 2.071zm7.948-7.964-.986.988-2.07-2.07.987-.987c.276-.276.644-.429 1.034-.429.392 0 .759.152 1.035.429.571.571.571 1.498 0 2.069z"/></g></svg>
                        <div class="my-2">
                            <h2 class="text-white h4 mb-2">Exams Analysis</h2>
                            <p class="text-white my-2">Track Your Exam Questions Analysis Reports.</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-10 col-12 mx-auto my-2">
                <a href="{{url('question-analysis/quizzes')}}" class="text-decoration-none">
                    <div class="align-items-center questions_analysis_card selected_questions_analysis_card d-flex p-lg-4 p-md-4 p-3 rounded-3 shadow">
                    <svg class="me-2 step_svg" height="50" fill="white" viewBox="0 0 485.002 485.002" width="50" xmlns="http://www.w3.org/2000/svg"><g><g>
                           <path d="m242.501 0c-14.284 0-28.48 1.896-42.193 5.637-5.329 1.453-8.47 6.951-7.017 12.279 1.453 5.329 6.956 8.471 12.278 7.016 11.999-3.273 24.425-4.932 36.932-4.932 77.196 0 140 62.804 140 140 0 71.729-28.603 99.744-53.837 124.461-16.435 16.096-32.054 31.411-35.467 55.54h-101.392c-3.413-24.129-19.032-39.444-35.467-55.54-25.234-24.717-53.837-52.732-53.837-124.461 0-33.063 11.746-65.153 33.075-90.36 3.567-4.216 3.042-10.526-1.175-14.093-4.215-3.568-10.526-3.042-14.093 1.174-24.38 28.813-37.807 65.492-37.807 103.279 0 80.135 33.181 112.635 59.843 138.75 15.18 14.868 26.701 26.163 29.498 43.056-12.699 4.423-21.841 16.508-21.841 30.696 0 14.432 9.458 26.69 22.5 30.919v21.582h-2.499c-5.522 0-10 4.477-10 10s4.478 10 10 10h2.499v10c0 16.542 13.458 30 30 30h80c16.542 0 30-13.458 30-30v-10h2.5c5.522 0 10-4.477 10-10s-4.478-10-10-10h-2.5v-21.582c13.042-4.228 22.5-16.487 22.5-30.919 0-14.187-9.142-26.273-21.841-30.696 2.797-16.893 14.318-28.188 29.498-43.056 26.662-26.114 59.843-58.614 59.843-138.75 0-88.224-71.775-160-160-160zm50 455.002c0 5.514-4.486 10-10 10h-80c-5.514 0-10-4.486-10-10v-10h100zm-100-29.999v-20.001h100v20.001zm110-40.002h-120c-6.893 0-12.5-5.607-12.5-12.5s5.607-12.5 12.5-12.5h120c6.893 0 12.5 5.608 12.5 12.5 0 6.893-5.607 12.5-12.5 12.5z"/><path d="m42.499 170c5.522 0 10-4.477 10-10s-4.478-10-10-10h-22.999c-5.522 0-10 4.477-10 10s4.478 10 10 10z"/><path d="m64.294 251.341-39.836 23c-4.783 2.761-6.422 8.877-3.66 13.66 1.853 3.208 5.213 5.002 8.67 5.002 1.696 0 3.416-.433 4.99-1.342l39.836-23c4.783-2.761 6.422-8.877 3.66-13.66-2.761-4.782-8.876-6.422-13.66-3.66z"/><path d="m460.544 274.34-39.836-23c-4.784-2.762-10.9-1.122-13.66 3.66-2.762 4.783-1.123 10.899 3.66 13.66l39.836 23c1.575.91 3.294 1.342 4.99 1.342 3.456 0 6.818-1.794 8.67-5.002 2.762-4.782 1.123-10.898-3.66-13.66z"/><path d="m465.502 150h-22.999c-5.522 0-10 4.477-10 10s4.478 10 10 10h22.999c5.522 0 10-4.477 10-10s-4.478-10-10-10z"/><path d="m415.718 70.001c1.696 0 3.416-.433 4.99-1.342l39.836-23c4.783-2.761 6.422-8.877 3.66-13.66-2.762-4.782-8.876-6.421-13.66-3.66l-39.836 23c-4.783 2.761-6.422 8.877-3.66 13.66 1.852 3.209 5.213 5.002 8.67 5.002z"/><path d="m74.294 51.339-39.836-23c-4.785-2.763-10.899-1.123-13.66 3.66-2.762 4.783-1.123 10.899 3.66 13.66l39.836 23c1.575.909 3.294 1.342 4.99 1.342 3.456 0 6.818-1.794 8.67-5.002 2.762-4.783 1.123-10.899-3.66-13.66z"/><path d="m275.234 217.333c4.261-6.403 12.555-14.986 20.107-22.538 7.016-7.016 12.523-15.243 16.371-24.454 3.841-9.195 5.788-18.874 5.788-28.767 0-20.031-7.802-38.865-21.969-53.032s-33-21.968-53.031-21.968-38.864 7.802-53.031 21.968c-14.167 14.167-21.969 33.001-21.969 53.032 0 16.542 13.458 30 30 30s30-13.458 30-30c0-4.009 1.56-7.776 4.393-10.608 2.832-2.832 6.599-4.392 10.607-4.392s7.775 1.56 10.608 4.392c2.832 2.832 4.392 6.599 4.392 10.608 0 2.036-.376 3.969-1.118 5.745-.756 1.809-1.922 3.509-3.465 5.053-13.635 13.635-21.636 22.863-27.614 31.85-8.734 13.126-12.803 25.581-12.803 39.195 0 7.678 2.903 14.689 7.664 20.001-4.762 5.313-7.664 12.326-7.664 20.008 0 16.542 13.458 30 30 30s30-13.458 30-30v-.007c0-7.678-2.903-14.689-7.664-20.001 4.761-5.312 7.664-12.323 7.664-20.001.001-.9.476-2.688 2.734-6.084zm-33.279-22.031c5.196-7.812 12.47-16.151 25.106-28.788 3.395-3.396 6.012-7.26 7.776-11.485 1.767-4.23 2.663-8.757 2.663-13.454 0-9.351-3.641-18.141-10.25-24.75-6.609-6.61-15.398-10.25-24.75-10.25s-18.141 3.64-24.749 10.25c-6.61 6.609-10.251 15.399-10.251 24.75 0 5.514-4.486 10-10 10s-10-4.486-10-10c0-14.689 5.722-28.5 16.111-38.889s24.2-16.111 38.889-16.111 28.5 5.722 38.889 16.111c10.39 10.389 16.111 24.2 16.111 38.889 0 7.233-1.428 14.318-4.243 21.058-2.838 6.794-6.896 12.857-12.058 18.021-11.848 11.846-18.399 19.263-22.617 25.601-4.149 6.237-6.082 11.691-6.082 17.163 0 5.514-4.486 10-10 10s-10-4.486-10-10c.001-9.62 2.917-18.291 9.455-28.116zm10.546 68.124c0 5.514-4.486 10-10 10s-10-4.486-10-10.007c0-5.514 4.486-10 10-10s10 4.486 10 10z"/>
                          <path d="m161.801 43.537c5.522 0 10-4.477 10-10s-4.478-10-10-10h-.008c-5.522 0-9.996 4.477-9.996 10s4.481 10 10.004 10z"/></g></g>
                       </svg>
                        <div class="my-2">
                            <h2 class="text-white h4 mb-2">Quizzes Analysis</h2>
                            <p class="text-white my-2">Track Your Quiz Questions Analysis Reports.</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-10 col-12 mx-auto my-2">
                <a href="{{url('question-analysis/practices')}}" class="text-decoration-none">
                    <div class="align-items-center questions_analysis_card d-flex p-lg-4 p-md-4 p-3 rounded-3 shadow">
                    <svg class="me-2 step_svg" fill="#ffffff" height="50" viewBox="0 0 512.074 512.074" width="50" xmlns="http://www.w3.org/2000/svg">
                            <path d="m498.936 211.166-38.24-4.784c-4.473-17.045-11.216-33.297-20.134-48.531l23.68-30.447c4.644-5.972 4.115-14.467-1.234-19.815l-42.416-42.416c-5.349-5.349-13.843-5.877-19.815-1.234l-30.45 23.681c-15.239-8.92-31.492-15.662-48.53-20.135l-4.784-38.241c-.939-7.506-7.319-13.138-14.884-13.138h-46.055c-4.28 0-8.131 1.802-10.864 4.677-44.766-41.883-120.393-16.387-131.253 43.56-62.412-2.502-103.16 68.042-69.996 120.761-58.561 30.395-58.669 111.325 0 141.867-33.168 52.741 7.594 123.26 69.996 120.761 10.872 59.975 86.505 85.427 131.253 43.562 2.733 2.875 6.584 4.677 10.864 4.677h46.055c7.564 0 13.945-5.632 14.884-13.138l4.784-38.241c17.044-4.473 33.297-11.216 48.531-20.134l30.448 23.68c5.971 4.643 14.466 4.116 19.815-1.234l42.416-42.416c5.349-5.349 5.878-13.844 1.234-19.815l-23.681-30.448c8.92-15.241 15.662-31.491 20.135-48.53l38.24-4.784c7.506-.938 13.138-7.319 13.138-14.884v-59.977c.001-7.565-5.631-13.946-13.137-14.884zm-257.862 29.872h-41.233c-27.166 0-49.267-22.101-49.267-49.267 0-8.284-6.716-15-15-15s-15 6.716-15 15c0 26.426 13.011 49.856 32.949 64.267-19.939 14.41-32.949 37.841-32.949 64.267 0 8.284 6.716 15 15 15s15-6.716 15-15c0-27.166 22.101-49.267 49.267-49.267h41.233v161.733c0 27.166-22.101 49.267-49.267 49.267-65.28-2.486-65.243-96.067.001-98.533 8.284 0 14.999-6.716 14.999-15s-6.716-15-15-15c-38.551 0-70.746 27.669-77.81 64.187-46.735 2.375-70.048-56.362-34.465-86.683 4.472-3.815 6.304-9.893 4.683-15.546-1.62-5.652-6.394-9.836-12.209-10.702-55.528-9.562-55.491-87.905 0-97.447 5.815-.866 10.589-5.05 12.209-10.702 1.621-5.652-.211-11.73-4.684-15.546-35.593-30.332-12.251-89.063 34.465-86.682 7.064 36.519 39.259 64.187 77.81 64.187 8.284 0 15-6.716 15-15s-6.716-15-15-15c-27.166 0-49.267-22.101-49.267-49.267 2.468-65.253 96.062-65.265 98.533 0v161.734zm30-66.379c109.247 2.821 109.189 159.964 0 162.756zm211 98.127-35.472 4.438c-6.386.799-11.551 5.582-12.836 11.889-4.214 20.678-12.28 40.12-23.974 57.786-3.554 5.368-3.285 12.405.667 17.488l21.972 28.252-23.69 23.689-28.252-21.972c-5.083-3.953-12.122-4.224-17.491-.665-17.654 11.691-37.095 19.757-57.783 23.972-6.306 1.285-11.09 6.45-11.889 12.836l-4.438 35.473h-17.814v-98.538c149.004-4.414 148.925-218.415 0-222.791v-98.539h17.814l4.438 35.473c.799 6.386 5.583 11.551 11.889 12.836 20.677 4.213 40.119 12.279 57.785 23.974 5.368 3.553 12.406 3.286 17.488-.667l28.252-21.972 23.69 23.689-21.972 28.252c-3.953 5.083-4.221 12.122-.666 17.491 11.691 17.653 19.756 37.095 23.973 57.783 1.285 6.307 6.45 11.09 12.836 11.889l35.472 4.438v33.496z"/>
                        </svg>
                        <div class="my-2">
                            <h2 class="text-white h4 mb-2">Practises Analysis</h2>
                            <p class="text-white my-2">Track Your Practise Questions Analysis Reports.</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <!-- @if ($childName == '')
        <section id="exam_tab_section">
            <div class="col-12 col-lg-12 order-2 order-md-3 order-lg-2 mb-4">
                <div class="card py-4 shadow-lg">
                    <img src="{{url('images\select_child.png')}}" width="120px" height="auto" alt="" class="mt-2 mx-auto">
                    <p class="py-2 text-center text-black">Please Select a Child First</p>
                    <div class="rounded-2 navbar_right_button bg-transparent mx-auto mt-2 mb-4"
                        style="font-size: 17px; border: 2px solid #9a65f6;">
                        <a class="nav-link fw-medium p-1 px-2 fs-6" style="color: #9a65f6;" aria-current="page"
                            href="{{route('change_child')}}">
                            Select One
                        </a>
                    </div>
                </div>
            </div>
        </section>
    @else
        <nav>
            <div class="nav nav-tabs justify-content-center" id="nav-tab" role="tablist">
                <a href="{{ url('question-analysis/exams') }}">
                    <button class="nav-link w-auto active tab_navigation_buttons" id="nav-exam-tab" data-bs-toggle="tab" data-bs-target="#nav-exam" type="button" role="tab" aria-controls="nav-exam" aria-selected="true">
                        <img src="{{url('images\exam.png')}}" width="50px" alt="Exams Image">
                        <h6 class="text-center text-dark m-0 mt-2">Exam</h6>
                    </button>
                </a>
                <a href="{{ url('question-analysis/quizzes') }}">
                    <button class="nav-link w-auto tab_navigation_buttons" id="nav-quiz-tab" data-bs-toggle="tab" data-bs-target="#nav-quiz" type="button" role="tab" aria-controls="nav-quiz" aria-selected="false">
                        <img src="{{url('images\quiz.png')}}" width="50px" alt="Exams Image">
                        <h6 class="text-center text-dark m-0 mt-2">Quiz</h6>
                    </button>
                </a>
                <a href="{{ url('question-analysis/practices') }}">
                    <button class="nav-link w-auto tab_navigation_buttons" id="nav-practice-tab" data-bs-toggle="tab" data-bs-target="#nav-practice" type="button" role="tab" aria-controls="nav-practice" aria-selected="false">
                        <img src="{{url('images\practice.png')}}" width="50px" alt="Exams Image">
                        <h6 class="text-center text-dark m-0 mt-2">Practice</h6>
                    </button>
                </a>
            </div>
        </nav>
    @endif -->

    <section class="my-3 container-fluid">
        <div class="row align-items-center">
            <div class="col-sm-6 col-12">
                <h2 class="h4 mb-0">Questions Analysis Chart</h2>
            </div>
            <div class="col-sm-6 col-12">
                <select id="days" class="form-select shadow-none border-secondary-subtle ms-sm-auto mt-3 mt-sm-0">
                    <option class="select_days" data-type="week" data-num="1" value="1">1 Week</option>
                    <option class="select_days" data-type="week" data-num="2" value="2">2 Week</option>
                    <option class="select_days" data-type="month" data-num="1" value="3">1 Month</option>
                    <option class="select_days" data-type="month" data-num="2" value="4">2 Month</option>
                    <option class="select_days" data-type="year" data-num="1" value="5">1 Year</option>
                </select>
            </div>
        </div>
    </section>

    <div class="row">
        <div class="col-md-6 col-12">
            <div class="bg-white chart-container overall rounded-5 shadow p-4 mt-5">
                <h2 class="fw-normal h4 mb-2">Overall Analysis</h2>
                <canvas class="mx-auto" id="evaluationchart"></canvas>
            </div>
        </div>
        <div class="col-md-6 col-12">
            <div class="bg-white chart-container overall rounded-5 shadow p-4 mt-5">
                <h2 class="fw-normal h4 mb-2">Correct Analysis</h2>
                <canvas class="mx-auto" id="correctchart"></canvas>
            </div>
        </div>
        <div class="col-md-6 col-12">
            <div class="bg-white chart-container overall rounded-5 shadow p-4 mt-5">
                <h2 class="fw-normal h4 mb-2">Incorrect Analysis</h2>
                <canvas class="mx-auto" id="incorrectchart"></canvas>
            </div>
        </div>
        <div class="col-md-6 col-12">
            <div class="bg-white chart-container overall rounded-5 shadow p-4 mt-5">
                <h2 class="fw-normal h4 mb-2">Unanswered Analysis</h2>
                <canvas class="mx-auto" id="unansweredchart"></canvas>
            </div>
        </div>
    </div>

    <script>
        var labels = {!! str_replace("'", "\'", json_encode($overallChartData['labels'])) !!};
        var dataSet = {!! str_replace("'", "\'", json_encode($overallChartData['datasets'][0]['data'])) !!};
        var backgroundColor = ['rgba(199,199,199,0.6)', 'rgba(104,186,114,0.6)', 'rgba(219,84,106,0.6)']
        var heading = {!! str_replace("'", "\'", json_encode($heading)) !!};
        var oilCanvas = document.getElementById("evaluationchart");
        var dataSetCount = 0;
        dataSet.forEach(function(i) {
            dataSetCount = dataSetCount + i;
        });
        if (dataSetCount > 0) {
            var evaluationData = {
                labels: labels,
                datasets: [{
                    data: dataSet,
                    backgroundColor: backgroundColor,
                    borderColor: ['rgb(199,199,199)', 'rgb(104,186,114)', 'rgb(219,84,106)'],
                    borderRadius: 7,
                    spacing: 1,
                    cutout: 90
                }]
            };
            // var pieChart = new Chart(evaluationchart, {
            //     type: 'pie',
            //     data: evaluationData,
            //     options: {
            //         responsive: true,
            //         plugins: {
            //             legend: {
            //                 position: 'top',
            //             },
            //             title: {
            //                 display: false
            //             }
            //         }
            //     },
            // });
            var doughnutChart = new Chart(evaluationchart, {
                type: 'doughnut',
                data: evaluationData,
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        title: {
                            display: false
                        }
                    }
                },
            });
            let total = dataSet.reduce(function (accumulator, currentValue) {
                return accumulator + currentValue;
            }, 0);

            var ctx = document.getElementById('correctchart').getContext('2d');
            var myCorrectDoughnutChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: [labels[1], 'Total'],
                    datasets: [{
                        data: [dataSet[1], total-dataSet[1]],
                        backgroundColor: ['rgba(104,186,114,0.6)','rgba(199,199,199,0.6)',],
                        borderColor: ['rgb(104,186,114)','rgb(199,199,199)'],
                        borderRadius: 7,
                        spacing: 1,
                        cutout: 100
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: true,
                    title: {
                        display: false,
                    },
                }
            });

            var inctx = document.getElementById('incorrectchart').getContext('2d');
            var myIncorrectDoughnutChart = new Chart(inctx, {
                type: 'doughnut',
                data: {
                    labels: [labels[2], 'Total'],
                    datasets: [{
                        data: [dataSet[2], total-dataSet[2]],
                        backgroundColor: ['rgba(219,84,106,0.6)','rgba(199,199,199,0.6)',],
                        borderColor: ['rgb(219,84,106)','rgb(199,199,199)'],
                        borderRadius: 7,
                        spacing: 1,
                        cutout: 100
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: true,
                    title: {
                        display: false,
                    },
                }
            });

            var unctx = document.getElementById('unansweredchart').getContext('2d');
            var myUnansweredDoughnutChart = new Chart(unctx, {
                type: 'doughnut',
                data: {
                    labels: [labels[0], 'Total'],
                    datasets: [{
                        data: [dataSet[0], total-dataSet[0]],
                        backgroundColor: ['rgba(255,219,123,0.5)','rgba(199,199,199,0.6)',],
                        borderColor: ['rgb(255,219,123)','rgb(199,199,199)'],
                        borderRadius: 7,
                        spacing: 1,
                        cutout: 100
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: true,
                    title: {
                        display: false,
                    },
                }
            });
        } else {
            $('.chart-container.overall').empty().append(`<div class="text-center"><img src="{{url('images/no_record_found.png')}}" width="300" height="300" alt="No Result Found"><p class="h5 text-black mb-4">No Data available to show!</p></div>`);
        }

        $(function(){
            $("#days").change(function(){
                let value = $(this).val();
                let type = $(".select_days[value="+value+"]").data("type");
                let number = $(".select_days[value="+value+"]").data("num");
                var currentDate = new Date();
                let days = 7;
                if(type == 'week'){
                    days = number * 7;
                } else if(type == 'month'){
                    if(number == 1){
                        days = currentDate.getDate();
                    } else {
                        var prevMonth = new Date();
                        prevMonth.setDate(0);
                        days = prevMonth.getDate() + currentDate.getDate();
                    }
                } else if(type == 'year') {
                    var currentYear = currentDate.getFullYear();
                    var firstDayOfYear = new Date(currentYear, 0, 1);
                    var timeDifference = currentDate - firstDayOfYear;
                    days = Math.floor(timeDifference / (1000 * 60 * 60 * 24));
                }
                window.location.href = window.location.origin+window.location.pathname+"?days="+days+"&type="+type.split('')[0];
            });

            var urlParams = new URLSearchParams(window.location.search);
            var typeValue = urlParams.get("type");
            var daysValue = urlParams.get("days");
            if(typeValue){
                if (typeValue == 'w'){
                    let remaining = daysValue - 7;
                    if(remaining <= 0){
                        $("#days").val(1);
                    } else {
                        $("#days").val(2);
                    }
                } else if (typeValue == 'm'){
                    var prevMonth = new Date();
                    prevMonth.setDate(0);
                    let remaining = daysValue - prevMonth.getDate();
                    if(remaining <= 0){
                        $("#days").val(3);
                    } else {
                        $("#days").val(4);
                    }
                } else if (typeValue == 'y'){
                    $("#days").val(5);
                }
            } 
        });
    </script>

</body>

</html>
