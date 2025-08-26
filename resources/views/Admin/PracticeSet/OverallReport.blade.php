
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Overall Report - {{$practiceSet['title']}}</title>
    <!-- rel icon -->
    <link rel="icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}">
    <meta name="description" content="{{ app(\App\Settings\SiteSettings::class)->seo_description }}">
    <meta name="author" content="{{ app(\App\Settings\SiteSettings::class)->app_name }}">
    <!-- bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
        .cursor-not-allowed{cursor:not-allowed !important}
        .practice_set_form{max-width: 600px !important;}
        #start_search:hover,#start_search:active{background: transparent;cursor: default;color: #bcc4cc !important;}
        #skill_Dropdown{max-height: 175px;}
        .font-size-13{font-size:13px;}
        .report_card{height:auto;width:auto;box-shadow:0px 0px 7px 0px #00000017; transition:0.2s}
        .report_card:hover {scale: 1.03; box-shadow: 1px 6px 8px 3px #0000003b !important}
    </style>
</head>

<body> 
    @include('sidebar')
    @include('header')

    <section class="p-4">

        <div class="d-flex justify-content-between align-items-center my-4">
            <h1 class="text-dark h2 my-2">Overall Report</h1>
            <a href="/admin/practice-sets" class="my-2"><button class="btn bg_primary_label border-primary text-primary p-2 px-3"><i class='bx bx-arrow-back'></i><span>Back to Question Set</span></button></a>
        </div>

        <div class="align-items-center bg-white d-flex justify-content-between my-3 p-3 py-4 rounded-4 shadow-sm">
            <h2 class="text-dark fw-bold m-0 h4">{{$practiceSet['title']}}</h2>
            <a href="/admin/practice-sets/{{$practiceSet['id']}}/detailed-report"><button class="btn btn-outline-warning">DETAILED REPORT</button></a>
        </div>

        <div class="row align-items-center justify-content-center my-4">
            <div class="col-lg-4 col-md-6 col-sm-12 col-12 my-3">
                <div class="bg-white text-center report_card p-3 rounded-4">
                    <img src="{{url('images/total_attempts.png')}}" height="100" width="100" alt="Total Attempts" class="my-2">
                    <h2 class="h3 text-dark text-center my-2">{{$stats['total_attempts']}}</h2>
                    <h2 class="text-dark text-center my-2 h5">Total Attempts</h2>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 col-12 my-3">
                <div class="bg-white text-center report_card p-3 rounded-4">
                    <img src="{{url('images/test_taker.png')}}" height="100" width="100" alt="Unique Test Takers" class="my-2">
                    <h2 class="h3 text-dark text-center my-2">{{$stats['unique_test_takers']}}</h2>
                    <h2 class="text-dark text-center my-2 h5">Unique Test Takers</h2>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 col-12 my-3">
                <div class="bg-white text-center report_card p-3 rounded-4">
                    <img src="{{url('images/avg_accuracy.png')}}" height="100" width="100" alt="Average Accuracy" class="my-2">
                    <h2 class="h3 text-dark text-center my-2">{{$stats['avg_accuracy']}}</h2>
                    <h2 class="text-dark text-center my-2 h5">Average Accuracy</h2>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 col-12 my-3">
                <div class="bg-white text-center report_card p-3 rounded-4">
                    <img src="{{url('images/avg_speed.png')}}" height="100" width="100" alt="Average Speed" class="my-2">
                    <h2 class="h3 text-dark text-center my-2">{{$stats['avg_speed']}}</h2>
                    <h2 class="text-dark text-center my-2 h5">Average Speed</h2>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 col-12 my-3">
                <div class="bg-white text-center report_card p-3 rounded-4">
                    <img src="{{url('images/time_spent.webp')}}" height="100" width="100" alt="Average Time Spent" class="my-2">
                    <h2 class="h3 text-dark text-center my-2">{{$stats['avg_time']['detailed_readable']}}</h2>
                    <h2 class="text-dark text-center my-2 h5">Average Time Spent</h2>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 col-12 my-3">
                <div class="bg-white text-center report_card p-3 rounded-4">
                    <img src="{{url('images/avg_score.png')}}" height="100" width="100" alt="Average Score" class="my-2">
                    <h2 class="h3 text-dark text-center my-2">{{$stats['avg_score']}}</h2>
                    <h2 class="text-dark text-center my-2 h5">Average Score</h2>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 col-12 my-3">
                <div class="bg-white text-center report_card p-3 rounded-4">
                    <img src="{{url('images/high_score.png')}}" height="100" width="100" alt="High Score" class="my-2">
                    <h2 class="h3 text-dark text-center my-2">{{$stats['high_score']}}</h2>
                    <h2 class="text-dark text-center my-2 h5">High Score</h2>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 col-12 my-3">
                <div class="bg-white text-center report_card p-3 rounded-4">
                    <img src="{{url('images/low_score.png')}}" height="100" width="100" alt="Low Score" class="my-2">
                    <h2 class="h3 text-dark text-center my-2">{{$stats['low_score']}}</h2>
                    <h2 class="text-dark text-center my-2 h5">Low Score</h2>
                </div>
            </div>
        </div>

    </section>

</body>

</html>
