<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Overall Report - {{$quiz['title']}}</title>
    <!-- rel icon -->
    <link rel="icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}">
    <meta name="description" content="{{ app(\App\Settings\SiteSettings::class)->seo_description }}">
    <meta name="author" content="{{ app(\App\Settings\SiteSettings::class)->app_name }}">
    <style>
        .cursor-not-allowed{cursor:not-allowed !important}
        .practice_set_form{max-width: 600px !important;}
        #start_search:hover,#start_search:active{background: transparent;cursor: default;color: #bcc4cc !important;}
        #skill_Dropdown{max-height: 175px;}
        .font-size-13{font-size:13px;}
    </style>
</head>

<body> 
    @include('sidebar')
    @include('header')
    <div class="text-start my-4 align-items-center">
        <a href="/admin/quizzes">
        <button class="btn bg-label-primary border-primary text-primary p-2 px-3">
            <i class='bx bx-arrow-back'></i>
            <span>
                Back to Quizzes
            </span>
        </button>
        </a>
    </div>

    <div class="d-flex justify-content-between align-items-center py-3 mb-4">
        <span>
            <h5 class="text_black font_bold m-0">Overall Report - {{$quiz['title']}}</h5>
        </span>
        <span>
            <a href="/admin/quizzes/{{$quiz['id']}}/detailed-report"><button class="btn bg-label-primary border-primary">DETAILED REPORT</button></a>
        </span>
    </div>
    
    <div class="bg-white rounded py-4 mt-4 shadow-sm">
        <div class="container-xxl flex-grow-1 container-p-y">

        <div class="border cursor_default">
            <div class="row m-0">
                <div class="col-lg-3 col-md-3 col-sm-6 col-12 border">
                    <div class="row justify-content-center align-items-center p-5">
                        <h5 class="col-12 text-center m-0 my-2 report_column_text text_black">Total Attempts</h5>     
                        <h4 class="col-12 text-center m-0 my-2 report_column_text text_black">{{$stats['total_attempts']}}</h4>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-6 col-12 border">
                    <div class="row justify-content-center align-items-center p-5">
                        <h5 class="col-12 text-center m-0 my-2 report_column_text text_black">Pass Attempts</h5>     
                        <h4 class="col-12 text-center m-0 my-2 report_column_text text_black">{{$stats['pass_count']}}</h4>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-6 col-12 border">
                    <div class="row justify-content-center align-items-center p-5">
                        <h5 class="col-12 text-center m-0 my-2 report_column_text text_black">Fail Attempts</h5>     
                        <h4 class="col-12 text-center m-0 my-2 report_column_text text_black">{{$stats['failed_count']}}</h4>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-6 col-12 border">
                    <div class="row justify-content-center align-items-center p-5">
                        <h5 class="col-12 text-center m-0 my-2 report_column_text text_black">Unique Test Takers</h5>     
                        <h4 class="col-12 text-center m-0 my-2 report_column_text text_black">{{$stats['unique_test_takers']}}</h4>
                    </div>
                </div>

            </div>
            
            <div class="row m-0">
                <div class="col-lg-3 col-md-3 col-sm-6 col-12 border">
                    <div class="row justify-content-center align-items-center p-5">
                        <h5 class="col-12 text-center m-0 my-2 report_column_text text_black">Avg. Time Spent</h5>     
                        <h4 class="col-12 text-center m-0 my-2 report_column_text text_black">{{$stats['avg_time']['detailed_readable']}}</h4>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-6 col-12 border">
                    <div class="row justify-content-center align-items-center p-5">
                        <h5 class="col-12 text-center m-0 my-2 report_column_text text_black">Avg. Score</h5>     
                        <h4 class="col-12 text-center m-0 my-2 report_column_text text_black">{{$stats['avg_score']}}</h4>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-6 col-12 border">
                    <div class="row justify-content-center align-items-center p-5">
                        <h5 class="col-12 text-center m-0 my-2 report_column_text text_black">High Score</h5>     
                        <h4 class="col-12 text-center m-0 my-2 report_column_text text_black">{{$stats['high_score']}}</h4>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-6 col-12 border">
                    <div class="row justify-content-center align-items-center p-5">
                        <h5 class="col-12 text-center m-0 my-2 report_column_text text_black">Low Score</h5>     
                        <h4 class="col-12 text-center m-0 my-2 report_column_text text_black">{{$stats['low_score']}}</h4>
                    </div>
                </div>

            </div>

            <div class="row m-0">
                <div class="col-lg-3 col-md-3 col-sm-6 col-12 border">
                    <div class="row justify-content-center align-items-center p-5">
                        <h5 class="col-12 text-center m-0 my-2 report_column_text text_black">Avg. Percentage</h5>     
                        <h4 class="col-12 text-center m-0 my-2 report_column_text text_black">{{$stats['avg_percentage']}}</h4>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-6 col-12 border">
                    <div class="row justify-content-center align-items-center p-5">
                        <h5 class="col-12 text-center m-0 my-2 report_column_text text_black">Avg. Accuracy</h5>     
                        <h4 class="col-12 text-center m-0 my-2 report_column_text text_black">{{$stats['avg_accuracy']}}</h4>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-6 col-12 border">
                    <div class="row justify-content-center align-items-center p-5">
                        <h5 class="col-12 text-center m-0 my-2 report_column_text text_black">Avg. Speed</h5>     
                        <h4 class="col-12 text-center m-0 my-2 report_column_text text_black">{{$stats['avg_accuracy']}}</h4>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-6 col-12 border">
                    <div class="row justify-content-center align-items-center p-5">
                        <h5 class="col-12 text-center m-0 my-2 report_column_text text_black">Avg. Questions Answered</h5>     
                        <h4 class="col-12 text-center m-0 my-2 report_column_text text_black">{{$stats['avg_questions_answered']}}</h4>
                    </div>
                </div>

            </div>

        </div>

        </div>
    </div>



</body>

</html>
