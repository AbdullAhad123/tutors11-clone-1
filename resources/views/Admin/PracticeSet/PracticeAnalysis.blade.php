<!-- practiceSet session analytics -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Score Report - {{$practiceSet['title']}}</title>
    <!-- rel icon -->
    <link rel="icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}">
    <meta name="description" content="{{ app(\App\Settings\SiteSettings::class)->seo_description }}">
    <meta name="author" content="{{ app(\App\Settings\SiteSettings::class)->app_name }}">
    <style>
        .svg-indicator{height: 20px;}
        .bs-gutter-x-0{--bs-gutter-x:0 !important;}
        .font-size-13{font-size: 13px;}
        .bg-green{background-color:#3c7c5a}
        .text-green{color:#3c7c5a}
        .option p{margin-bottom:0}
        .correct_answers p{margin-bottom: 0;display: inline-block;}
    </style>
</head>
<body>
    @include('sidebar')
    @include('header')


    <section class="p-4">

        <h1 class="text-dark h2 my-4">Score Report for {{$practiceSet['title']}}</h1>

        <div class="bg-white rounded-3 py-4 my-4 px-3 shadow">
            <div class="d-flex align-items-center justify-content-between border-bottom mb-1">
                <div class="d-flex align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="300px" height="300px" viewBox="0 0 300 300" enable-background="new 0 0 300 300" xml:space="preserve" class="w-7 h-7 me-1"><g><ellipse fill="#FFC843" cx="149.833" cy="149.501" rx="147.833" ry="146.166"></ellipse><ellipse fill="#D38700" cx="150" cy="150.168" rx="113.667" ry="113.833"></ellipse> <polygon fill="#FFC843" points="192.716,211.945 151.021,190.203 109.476,212.222 117.27,165.852 83.489,133.142 129.999,126.226150.667,83.991 171.618,126.086 218.172,132.693 184.611,165.626"></polygon></g></svg> 
                    <h4 class="mb-0 fs-6 text-dark">Score/Points</h4>
                </div> 
                <div class="text-sm">{{$session['total_points_earned']}}</div>
            </div>

            <div class="d-flex align-items-center justify-content-between border-bottom mb-1">
                <div class="d-flex align-items-center">
                <svg height="30" width="30" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
                        viewBox="0 0 511.974 511.974" xml:space="preserve">
                        <path style="fill:#ED5564;" d="M450.867,185.987c-11.828-27.952-28.732-53.044-50.295-74.59
                            c-21.545-21.546-46.638-38.467-74.574-50.279c-28.936-12.249-59.676-18.452-91.346-18.452c-31.678,0-62.403,6.203-91.339,18.452
                            c-27.944,11.812-53.044,28.733-74.59,50.279c-21.546,21.546-38.459,46.639-50.278,74.59C6.203,214.924,0,245.656,0,277.326
                            c0,31.671,6.203,62.403,18.444,91.34c11.82,27.936,28.733,53.044,50.279,74.59c21.545,21.545,46.646,38.451,74.59,50.278
                            c28.936,12.233,59.661,18.437,91.339,18.437c31.67,0,62.41-6.203,91.346-18.437c27.937-11.827,53.029-28.733,74.574-50.278
                            c21.562-21.546,38.467-46.654,50.295-74.59c12.233-28.937,18.437-59.669,18.437-91.34
                            C469.303,245.656,463.1,214.924,450.867,185.987z"/>
                        <path style="fill:#E6E9ED;" d="M347.779,164.192c-30.218-30.217-70.388-46.857-113.127-46.857c-42.74,0-82.917,16.64-113.135,46.857
                            S74.66,234.595,74.66,277.326c0,42.732,16.64,82.902,46.857,113.135c30.217,30.218,70.395,46.857,113.135,46.857
                            c42.739,0,82.909-16.64,113.127-46.857c30.232-30.232,46.872-70.402,46.872-113.135
                            C394.651,234.594,378.011,194.409,347.779,164.192z"/>
                        <path style="fill:#ED5564;" d="M234.652,191.987c-47.052,0-85.332,38.279-85.332,85.339c0,47.045,38.279,85.324,85.332,85.324
                            c47.052,0,85.331-38.279,85.331-85.324C319.983,230.266,281.704,191.987,234.652,191.987z"/>
                        <path style="fill:#F6BB42;" d="M511.379,82.555c-1.359-3.859-4.812-6.609-8.89-7.062l-59.403-6.608l-6.594-59.388
                            c-0.453-4.078-3.203-7.531-7.077-8.891c-3.859-1.359-8.171-0.375-11.077,2.516L342.92,78.556c-1.734,1.734-2.828,4.031-3.062,6.484
                            l-5.453,54.888c-0.406,4.156,1.641,8.171,5.25,10.28c1.672,0.969,3.516,1.438,5.375,1.438c2.156,0,4.312-0.641,6.155-1.953
                            l37.779-26.686l-26.687,37.795c-2.406,3.406-2.609,7.905-0.5,11.515c1.922,3.312,5.438,5.297,9.203,5.297
                            c0.359,0,0.703-0.016,1.062-0.047l54.903-5.438c2.453-0.25,4.734-1.328,6.483-3.078l75.418-75.417
                            C511.754,90.742,512.722,86.43,511.379,82.555z"/>
                        <path style="fill:#434A54;" d="M234.652,287.982c-2.734,0-5.461-1.031-7.546-3.125c-4.164-4.156-4.164-10.905,0.008-15.077
                            l32.841-32.842c4.164-4.172,10.922-4.172,15.093,0c4.156,4.156,4.156,10.921,0,15.077l-32.857,32.842
                            C240.112,286.951,237.378,287.982,234.652,287.982z"/>
                        <path style="fill:#FFCE54;" d="M440.976,71.009c-1.812-1.812-5.016-3.968-9.999-3.968c-9.812,0-28.452,8.608-97.761,71.043
                            c-37.623,33.904-72.824,68.246-73.168,68.59c-2.055,2.016-3.218,4.766-3.218,7.641v30.154c0,5.891,4.781,10.672,10.671,10.672h30.17
                            c2.875,0,5.625-1.156,7.625-3.219c0.375-0.375,37.842-38.764,73.199-78.293c20.889-23.358,36.998-42.576,47.888-57.138
                            c6.812-9.108,11.562-16.327,14.53-22.108C442.883,90.555,448.867,78.899,440.976,71.009z"/>
                    </svg>
                    <h4 class="mb-0 fs-6 text-dark">Accuracy</h4>
                </div> 
                <div class="text-sm">{{$session['accuracy']}}</div>
            </div>

            <div class="d-flex align-items-center justify-content-between border-bottom mb-1">
                <div class="d-flex align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1"  viewBox="0 0 454.999 454.999" xml:space="preserve" width="30" height="30">
                        <g>
                            <path style="fill:#BD1515;" d="M247.499,27.744h-40c-4.143,0-7.5,3.358-7.5,7.5s3.357,7.5,7.5,7.5h12.5v32.5h15v-32.5h12.5   c4.143,0,7.5-3.358,7.5-7.5S251.642,27.744,247.499,27.744z"/>
                            <path style="fill:#F2484B;" d="M227.499,65.249c-107.63,0-194.88,87.25-194.88,194.87c0,107.63,87.25,194.88,194.88,194.88   s194.88-87.25,194.88-194.88C422.379,152.499,335.129,65.249,227.499,65.249z"/>
                            <path style="fill:#FFFFFF;" d="M227.499,95.249c-90.91,0-164.88,73.96-164.88,164.87c0,90.92,73.97,164.88,164.88,164.88   s164.88-73.96,164.88-164.88C392.379,169.209,318.409,95.249,227.499,95.249z"/>
                            <path style="fill:#FFCC75;" d="M174.549,185.959c-5.85-5.85-15.35-5.85-21.21,0c-5.86,5.86-5.86,15.36,0,21.22l59.16,59.16   l25.6-16.82L174.549,185.959z"/>
                            <path style="fill:#F2484B;" d="M212.499,260.119v54.88c0,8.28,6.72,15,15,15s15-6.72,15-15v-54.88H212.499z"/>
                            <path style="fill:#185F8D;" d="M322.376,252.621h-94.877v15h94.877c4.143,0,7.5-3.358,7.5-7.5   C329.876,255.979,326.519,252.621,322.376,252.621z"/>
                            <circle style="fill:#BD1515;" cx="227.499" cy="260.119" r="15"/>
                            <path style="fill:#F2484B;" d="M389.059,13.769c32.17,23.38,39.28,68.41,15.9,100.57l-116.47-84.67   C311.869-2.501,356.899-9.611,389.059,13.769z"/>
                            <path style="fill:#F2484B;" d="M166.509,29.669l-116.47,84.67c-23.38-32.16-16.27-77.19,15.9-100.57   C98.099-9.611,143.129-2.501,166.509,29.669z"/>
                            <path style="fill:#274B6D;" d="M227.499,142.744c-4.143,0-7.5-3.358-7.5-7.5v-10c0-4.142,3.357-7.5,7.5-7.5s7.5,3.358,7.5,7.5v10   C234.999,139.387,231.642,142.744,227.499,142.744z"/>
                            <path style="fill:#274B6D;" d="M168.812,158.47c-3.588,2.071-8.174,0.842-10.245-2.745l-5-8.66   c-2.071-3.587-0.842-8.174,2.745-10.245c3.588-2.071,8.174-0.842,10.245,2.745l5,8.66   C173.628,151.812,172.4,156.398,168.812,158.47z"/>
                            <path style="fill:#274B6D;" d="M125.85,201.432c-2.071,3.588-6.658,4.816-10.245,2.745l-8.66-5   c-3.587-2.071-4.816-6.658-2.745-10.245c2.071-3.588,6.658-4.816,10.245-2.745l8.66,5   C126.692,193.258,127.922,197.844,125.85,201.432z"/>
                            <path style="fill:#274B6D;" d="M110.125,260.119c0,4.143-3.358,7.5-7.5,7.5h-10c-4.142,0-7.5-3.357-7.5-7.5s3.358-7.5,7.5-7.5h10   C106.767,252.619,110.125,255.976,110.125,260.119z"/>
                            <path style="fill:#274B6D;" d="M125.85,318.806c2.071,3.588,0.842,8.174-2.745,10.245l-8.66,5   c-3.587,2.071-8.174,0.842-10.245-2.745s-0.842-8.174,2.745-10.245l8.66-5C119.192,313.99,123.779,315.218,125.85,318.806z"/>
                            <path style="fill:#274B6D;" d="M168.812,361.768c3.588,2.071,4.816,6.658,2.745,10.245l-5,8.66   c-2.071,3.587-6.658,4.816-10.245,2.745c-3.588-2.071-4.816-6.658-2.745-10.245l5-8.66   C160.638,360.926,165.225,359.697,168.812,361.768z"/>
                            <path style="fill:#274B6D;" d="M227.499,377.493c4.143,0,7.5,3.358,7.5,7.5v10c0,4.142-3.357,7.5-7.5,7.5s-7.5-3.358-7.5-7.5v-10   C219.999,380.851,223.357,377.493,227.499,377.493z"/>
                            <path style="fill:#274B6D;" d="M286.187,361.768c3.588-2.071,8.174-0.842,10.245,2.745l5,8.66   c2.071,3.587,0.842,8.174-2.745,10.245c-3.588,2.071-8.174,0.842-10.245-2.745l-5-8.66   C281.37,368.426,282.599,363.839,286.187,361.768z"/>
                            <path style="fill:#274B6D;" d="M329.149,318.806c2.071-3.588,6.658-4.816,10.245-2.745l8.66,5   c3.587,2.071,4.816,6.658,2.745,10.245s-6.658,4.816-10.245,2.745l-8.66-5C328.307,326.98,327.077,322.394,329.149,318.806z"/>
                            <path style="fill:#274B6D;" d="M344.874,260.119c0-4.143,3.358-7.5,7.5-7.5h10c4.142,0,7.5,3.357,7.5,7.5s-3.358,7.5-7.5,7.5h-10   C348.232,267.619,344.874,264.261,344.874,260.119z"/>
                            <path style="fill:#274B6D;" d="M329.149,201.432c-2.071-3.588-0.842-8.174,2.745-10.245l8.66-5   c3.587-2.071,8.174-0.842,10.245,2.745c2.071,3.588,0.842,8.174-2.745,10.245l-8.66,5   C335.807,206.248,331.22,205.019,329.149,201.432z"/>
                            <path style="fill:#274B6D;" d="M286.187,158.47c-3.588-2.071-4.816-6.658-2.745-10.245l5-8.66   c2.071-3.587,6.658-4.816,10.245-2.745c3.588,2.071,4.816,6.658,2.745,10.245l-5,8.66   C294.361,159.312,289.774,160.541,286.187,158.47z"/>
                        </g>
                    </svg>
                    <h4 class="mb-0 fs-6 text-dark">Avg. Speed</h4>
                </div> 
                <div class="text-sm">{{$session['speed']}}</div>
            </div>

            <div class="row">
                <div class="col-md-6 col-12">
                    <div class="row bs-gutter-x-0 py-4 px-3 m-auto" style="max-width: 350px;">
                        <div class="m-auto col-md-12 col-lg-6"><canvas class="w-100 h-100" id="myQuestionChart"></canvas></div>
                        <div class="col-md-12 col-lg-6 align-self-center font-size-13 ps-2">
                            <div>
                                <svg class="svg-indicator" style="color:{{$chartColors[0]}};" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                {{ $analytics['correct_answered_questions'] }} Correct
                            </div>
                            <div>
                                <svg class="svg-indicator" style="color:{{$chartColors[1]}};" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                {{ $analytics['wrong_answered_questions'] }} Wrong
                            </div>
                            <div>
                                <svg class="svg-indicator" style="color:{{$chartColors[2]}};" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                {{ $analytics['unanswered_questions'] }} Unanswered
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-12">
                <div class="row bs-gutter-x-0 py-4 px-3 m-auto" style="max-width: 350px;">
                        <div class="m-auto col-md-12 col-lg-6"><canvas class="w-100 h-100" id="myTimeChart"></canvas></div>
                        <div class="col-md-12 col-lg-6 align-self-center font-size-13 ps-2">
                            <div>
                                <svg class="svg-indicator" style="color:{{$chartColors[0]}};" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                {{ $analytics['time_taken_for_correct_answered']['detailed_readable'] }} Correct
                            </div>
                            <div>
                                <svg class="svg-indicator" style="color:{{$chartColors[1]}};" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                {{ $analytics['time_taken_for_wrong_answered']['detailed_readable'] }} Wrong
                            </div>
                            <div>
                                <svg class="svg-indicator" style="color:{{$chartColors[2]}};" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                {{ $analytics['time_taken_for_other']['detailed_readable'] }} Other
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-3 py-4 my-4 px-3 shadow">
            <div class="table-responsive">
                <table class="table table-bordered mb-0">
                    <tbody>
                        <tr>
                            <td class="py-2 px-3">Test Taker</td>
                            <td class="py-2 px-3 text-end">{{ $session['name'] }}</td>
                        </tr>
                        <tr>
                            <td class="py-2 px-3">Email</td>
                            <td class="py-2 px-3 text-end">{{ $session['email'] }}</td>
                        </tr>
                        <tr>
                            <td class="py-2 px-3">Session</td>
                            <td class="py-2 px-3 text-end text-uppercase">{{ $session['id'] }}</td>
                        </tr>
                        <tr>
                            <td class="py-2 px-3">Completion</td>
                            <td class="py-2 px-3 text-end">{{ $session['completed'] }}</td>
                        </tr>
                        <tr>
                            <td class="py-2 px-3">IP</td>
                            <td class="py-2 px-3 text-end">{{ $session['ip'] }}</td>
                        </tr>
                        <tr>
                            <td class="py-2 px-3">Device</td>
                            <td class="py-2 px-3 text-end">{{ $session['device'] }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>


        <div class="bg-white rounded-3 shadow-3 w-100 p-4">
            <h2 class="text-dark my-3 h3">User Answers</h2>
            <div id="solution_sec" class="row">
                <div class="col-md-4 border-end">
                    <div class="nav nav-tabs justify-content-center mb-3 mb-md-0"  role="tablist" id="question_nums"></div>
                </div>
                <div class="col-md-8">
                    <div class="tab-content rounded-0 p-0" id="question_tab_content"></div>
                </div>
            </div>
        </div>

    </section>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
    <script>
        var chartColors = {!! str_replace("'", "\'", json_encode($chartColors)) !!};
        var total_question_data = [{{$analytics['correct_answered_questions']}}, {{$analytics['wrong_answered_questions']}}, {{$analytics['unanswered_questions']}}];
        var total_time_data = [{{$analytics['time_taken_for_correct_answered']['seconds']}}, {{$analytics['time_taken_for_wrong_answered']['seconds']}}, {{$analytics['time_taken_for_other']['seconds']}}];
        var total_question_chart_data = {
            labels: ['Correct', 'Wrong', 'Unanswered'],
            datasets: [{
                data: total_question_data,
                backgroundColor: [chartColors[0],chartColors[1],chartColors[2]],
                hoverBackgroundColor: [chartColors['transparent'][0],chartColors['transparent'][1],chartColors['transparent'][2]]
            }]
        };
        var totalQuestionChart = new Chart(document.getElementById('myQuestionChart'), {
            type: 'doughnut',
            data: total_question_chart_data,
            options: {
                aspectRatio: 1,
                responsive: false,
                maintainAspectRatio: true,
                cutoutPercentage: 90,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                legend: {
                    display: false
                },
            },
            plugins: [{
                id: 'text',
                beforeDraw: function(chart, a, b) {
                var width = chart.width,
                    height = chart.height,
                    ctx = chart.ctx;

                ctx.restore();
                var fontSize = (height / 200).toFixed(2);
                ctx.font = fontSize + "em sans-serif";
                ctx.textBaseline = "center";
                // session.results.answered_questions+'/'+session.results.total_questions+' '+__('Answered');,
                var text = "{{$analytics['answered_questions']}}/{{$analytics['total_questions']}} Answered"
                    textX = Math.round((width - ctx.measureText(text).width) / 2),
                    textY = height / 2;

                ctx.fillText(text, textX, textY);
                ctx.save();
                }
            }]
        });
        var total_time_chart_data = {
            labels: ['Correct', 'Wrong', 'Other'],
            datasets: [{
                label: 'Time Spent',
                data: total_time_data,
                backgroundColor: [chartColors[0],chartColors[1],chartColors[2]],
                hoverBackgroundColor: [chartColors['transparent'][0],chartColors['transparent'][1],chartColors['transparent'][2]]
            }]
        };
        var totalTimeChart = new Chart(document.getElementById('myTimeChart'), {
            type: 'doughnut',
            data: total_time_chart_data,
            options: {
                aspectRatio: 1,
                responsive: false,
                maintainAspectRatio: true,
                cutoutPercentage: 90,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                legend: {
                    display: false
                },
            },
            plugins: [{
                id: 'text',
                beforeDraw: function(chart, a, b) {
                var width = chart.width,
                    height = chart.height,
                    ctx = chart.ctx;

                ctx.restore();
                var fontSize = (height / 200).toFixed(2);
                ctx.font = fontSize + "em sans-serif";
                ctx.textBaseline = "center";
                // session.results.answered_questions+'/'+session.results.total_questions+' '+__('Answered');,
                var text = "{{$analytics['total_time_taken']['detailed_readable']}} Spent"
                    textX = Math.round((width - ctx.measureText(text).width) / 2),
                    textY = height / 2;

                ctx.fillText(text, textX, textY);
                ctx.save();
                }
            }]
        });
    </script>

    <script>
        let quizSlug = {!! str_replace("'", "\'", json_encode($practiceSet['slug'])) !!};
        let sessionId = {!! str_replace("'", "\'", json_encode($session['id'])) !!};
        fetchQuestions(quizSlug, sessionId);
        function fetchQuestions(practice, session) {
            var reqData = {
                practice: practice,
                session: session
            }
            $.ajax({
                type: "GET",
                url: "/admin/practice/"+practice+"/solutions/"+session,
                data: { reqData, _token: '{{csrf_token()}}' },
                success: function (data) {
                    data['questions'].forEach(function(question, i) {
                        console.log(question);
                        var i = ++i;
                        let tab =   '<div class="tab-pane fade" id="question_'+i+'" role="tabpanel" aria-labelledby="question_'+i+'_tab">'+
                                        '<div class="d-flex justify-content-between"><div class="alert-primary px-2 rounded shadow-sm">Time Spent: '+question.time_taken.detailed_readable+'</div> <div class="px-2 rounded shadow-sm" id="question_marks_earned_'+i+'">+'+question.points_earned+' Marks Earned</div></div>'+
                                        '<div class="my-3 bg-body p-3 rounded-1 shadow-sm">'+ 
                                            '<div><span class="text-dark">Q'+i+' of '+data['questions'].length+' | </span> <span class="text-uppercase fs-tiny">'+question.skill+'</span> </div>'+
                                            '<div class="mt-3 text-dark">'+question.question+'</div>'+
                                        '</div>'+
                                        '<div id="options'+i+'"></div>'+
                                        '<div class="mt-3 bg-label-success py-2 px-3 border border-success text-black rounded-1">'+
                                            '<svg class="me-1 h-px-20" style="color:#73dd37;" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>'+
                                            '<span id="count_options_'+i+'"></span>'+
                                            '<span class="correct_answers" id="correct_answers_'+i+'"></span>'+
                                        '</div>'+
                                    '</div>';
                        $("#question_nums").append('<button class="btn me-2 mt-2" id="question_'+i+'_tab" data-bs-toggle="tab" data-bs-target="#question_'+i+'" type="button" role="tab" aria-controls="question_'+i+'" aria-selected="true">'+i+'</button>')
                        $("#question_tab_content").append(tab);
                        if(question.options > 1){
                            $("#count_options_"+i).append('Correct answers are: ');
                        } else{
                            $("#count_options_"+i).append('Correct answer is: ');
                        }
                        if(Array.isArray(question.ca)){
                            question.ca.forEach(function(answer, a) {
                                if(question.ca.length != ++a){
                                    $("#correct_answers_"+i).append("Q"+a+". "+answer+", ");
                                } else {
                                    $("#correct_answers_"+i).append(answer);
                                }
                            });
                            question.user_answer.forEach(function(ua, u) {
                                // bg-label-danger
                                let index = u;
                                $("#options"+i).append('<div id="option_'+i+'_'+u+'" class="border d-flex mt-2 rounded-1"><div class="border-end py-1 px-3"><span style="font-size: 13px;" class="bg-body shadow-sm text-dark px-1 rounded-1">'+(++u)+'</span></div><div class="w-100 align-self-center px-2 option">'+ua+'</div></div>');
                                if(ua == question.ca[index]){
                                    $("#option_"+i+"_"+index).addClass('bg-label-success');
                                } else {
                                    $("#option_"+i+"_"+index).addClass('bg-label-danger');
                                }
                            });
                        } else {
                            question.options.forEach(function(ua, u) {
                                // bg-label-danger
                                let index = u;
                                $("#options"+i).append('<div id="option_'+i+'_'+u+'" class="border d-flex mt-2 rounded-1"><div class="border-end py-1 px-3"><span style="font-size: 13px;" class="bg-body shadow-sm text-dark px-1 rounded-1">'+(++u)+'</span></div><div class="w-100 align-self-center px-2 option">'+ua+'</div></div>');
                                if(u == question.ca){
                                    $("#option_"+i+"_"+index).addClass('bg-label-success');
                                } else {
                                    if(question.is_correct == false && u == question.user_answer){
                                        $("#option_"+i+"_"+index).addClass('bg-label-danger');
                                    }
                                }
                            });
                            if(question.options > 1){
                                $("#correct_answers_"+i).append("1. "+question.ca);
                            } else{
                                $("#correct_answers_"+i).append("1. "+question.options[question.ca-1]);
                            }
                        }
                        // $("#question_tab_content").append('<div class="tab-pane fade" id="question_'+i+'" role="tabpanel" aria-labelledby="question_'+i+'_tab"><h1>'+i+'</h1></div></div>')
                        if(i == 1){
                            $("#question_num"+i).addClass('active');
                            $("#question_"+i).addClass('show active');
                        }
                        if(question.is_correct){
                            $("#question_"+i+"_tab").addClass('bg-label-success border-success');
                            $("#question_marks_earned_"+i).addClass('bg-label-success border-success');
                            
                        } else{
                            $("#question_"+i+"_tab").addClass('bg-label-danger border-danger');
                            $("#question_marks_earned_"+i).text('-'+question.points_earned+' Marks Deducted').addClass('bg-label-danger border-danger');
                        }
                    });
                },
                error: function (data, textStatus, errorThrown) {
                    console.log(errorThrown);
                    console.log(data);
                },
            });
        }
    </script>
    @include('User.ProgressScript')

</body>
</html>