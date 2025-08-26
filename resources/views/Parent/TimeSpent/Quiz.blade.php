<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quiz - Time Spent</title>
    <!-- rel icon -->
    <link rel="icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}">
    <meta name="description" content="{{ app(\App\Settings\SiteSettings::class)->seo_description }}">
    <meta name="author" content="{{ app(\App\Settings\SiteSettings::class)->app_name }}">
    <style>
        .time_spent_header {
            height: auto;
            width: auto;
            margin: 2rem auto !important;
            background: linear-gradient(45deg, #005fba, #40a2ff);
        }
        .nav-tabs .nav-link{
        border: 2px solid #ffffff;
        }
        .nav-tabs .nav-link.active{
        border: 2px solid #0b54a3 !important;
        }
        @media screen and (max-width: 796px) {
            #nav-overall-tab, #nav-exam-tab, #nav-quiz-tab, #nav-practice-tab{
                margin-top: 40px;
            }
        }
        .overallChart{
            height: 600px;
        }
    </style>
</head>
<body>
    @include('sidebar')
    @include('header')
    <nav class='mb-4' style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item fw-light small text-dark">Dashboard</li>
            <li class="breadcrumb-item fw-light small text-dark">Analysis</li>
            <li class="breadcrumb-item fw-light active small text-primary" aria-current="page">Time Spent | Quiz Duration Overview</li>
        </ol>
    </nav>

    <div class="time_spent_header rounded-5 p-4 row m-0 align-items-center">
        <div class='col-lg-6 col-md-6 col-sm-12 col-12'>
            <h1 class="display-5 text-white text-capitalize my-1">Quiz Time Tracking</h1>
            <p class="text-white">Track the time your child allocates to quizzes, ensuring a balanced approach to assessment preparation.</p>
        </div>
        <div class='col-lg-6 col-md-6 col-sm-12 col-12 text-lg-end text-md-end text-center'>
            <img src="{{url('images\progress_report.png')}}" height='auto' width='280' class='parent_portal_banner_image' alt="">
        </div>
    </div>

    <h2 class="fw-semibold mb-4 mt-4 mt-lg-5 mt-md-5 text-capitalize text-dark">Quiz Time Spent Details</h2>

    @if ($childName == '')
        <section id="exam_tab_section" style="display:;">
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
        <nav class="my-5">
            <div class="nav nav-tabs justify-content-center mt-5 border-bottom-0" id="nav-tab" role="tablist">
                <a href="/time-spent/overall" class="nav-link w-auto shadow-sm rounded-3 mx-2 bg-white" id="nav-overall-tab">
                    <div class="services_card service_child1 p-3 py-0 rounded-5 position-relative">
                        <div class="services_image position-relative mx-auto h-px-40"><img class="translate-middle-y h-px-75 w-auto" loading="lazy" src="{{url('images\detail_analysis_guy.webp')}}" alt="overall"></div>
                        <div class="services-details">
                        <h2 class="text-center my-1 text-uppercase h5 text-black">Overall</h2>
                        </div>
                    </div>
                </a>
                <a href="/time-spent/exams" class="nav-link w-auto shadow-sm rounded-3 mx-2 bg-white" id="nav-exam-tab">
                    <div class="services_card service_child1 p-3 py-0 rounded-5 position-relative">
                        <div class="services_image position-relative mx-auto h-px-40"><img class="translate-middle-y h-px-75 w-auto" loading="lazy" src="{{url('images\top_quality_question_guy.webp')}}" alt="exam"></div>
                        <div class="services-details">
                        <h2 class="text-center my-1 text-uppercase h5 text-black">Exam</h2>
                        </div>
                    </div>
                </a>
                <button class="nav-link w-auto shadow-sm rounded-3 mx-2 bg-white active" id="nav-quiz-tab">
                    <div class="services_card service_child1 p-3 py-0 rounded-5 position-relative">
                        <div class="services_image position-relative mx-auto h-px-40"><img class="translate-middle-y h-px-75 w-auto" loading="lazy" src="{{url('images\exam_quiz_guy.webp')}}" alt="quiz"></div>
                        <div class="services-details">
                        <h2 class="text-center my-1 text-uppercase h5 text-black">Quiz</h2>
                        </div>
                    </div>
                </button>
                <a href="/time-spent/practices" class="nav-link w-auto shadow-sm rounded-3 mx-2 bg-white" id="nav-practice-tab">
                    <div class="services_card service_child1 p-3 py-0 rounded-5 position-relative">
                        <div class="services_image position-relative mx-auto h-px-40"><img class="translate-middle-y h-px-75 w-auto" loading="lazy" src="{{url('images\learning_videos_guy.webp')}}" alt="Practise"></div>
                        <div class="services-details">
                        <h2 class="text-center my-1 text-uppercase h5 text-black">Practise</h2>
                        </div>
                    </div>
                </a>
            </div>
        </nav>
        <div class="tab-content p-0" id="nav-tabContent">
            <div class="tab-pane fade show active px-2" id="nav-overall" role="tabpanel" aria-labelledby="nav-overall-tab">
                <canvas id="overallChart"></canvas>
            </div>
        </div>
    @endif

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        var overallChartLabels = {!! str_replace("'", "\'", json_encode($data['labels'])) !!};
        var overallRawChartDataSet = {!! str_replace("'", "\'", json_encode($data['datasets'][0]['data'])) !!};
        overallRawChartDataSet
        overallChartDatasets = [];
        overallRawChartDataSet.forEach(function (second) {
            overallChartDatasets.push(second['seconds'])
        });
        const overallChart = document.getElementById('overallChart');
        new Chart(overallChart, {
            type: 'line',
            data: {
            labels: overallChartLabels,
            datasets: [{
                label: 'Minutes',
                data: overallChartDatasets,
                borderWidth: 2,
                pointStyle: 'circle',
                pointRadius: 10,
                pointHoverRadius: 15,
                backgroundColor: 'rgb(11 84 154 / 30%)',
                borderColor: 'rgb(11 84 154 / 90%)',
                fill: true,
            }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                aspectRatio: 1,
                scales: {
                    xAxes: [
                    {
                        display: true,
                        ticks: {
                            display: true,
                            fontColor: "#0b54a3",
                            beginAtZero: false,
                            stepSize: 10,
                            max: 100
                        },
                        gridLines: {
                        display: false
                        },
                    }
                    ],
                    yAxes: [
                    {
                        barPercentage: 0.4,
                        ticks: {
                            display: true,
                            fontColor: "#222",
                            beginAtZero: true,
                        },
                        gridLines: {
                        display: false   
                        },
                    }
                    ]
                }
            }
        });
    </script>

    @include('User.ProgressScript')
</body>
</html>