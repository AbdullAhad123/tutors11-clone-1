<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Score Report - {{$exam['title']}}</title>
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
        p{margin-bottom:0 !important;display: inline;}
    </style>
</head>
<body>
    @include('sidebar')
    @include('header')

    <div class="container-fluid my-4">
        <div class="row">
            <div class="col-12 col-sm-6 h5 text-dark mb-0 align-self-center">
                Score Report - {{$exam['title']}}
            </div>
            <div class="col-12 col-sm-6 text-sm-end">
                <a href="/admin/exam/{{$exam['slug']}}/report/{{ $session['id'] }}">
                    <button class="btn bg-label-primary border-primary text-uppercase">Download Score Report</button>
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-sm-6 col-lg-3 px-3 position-relative mt-2">
            <div class="row bg-white rounded-3 py-3 px-2 h-100 shadow-sm">
                <div class="col-6 fs-4 align-self-center"><p class="mb-0 text-dark">{{ $session['results']['pass_or_fail'] }}</p></div>
                <div class="col-6 text-end col-6 fs-4 align-self-center">
                @if ( $session['results']['pass_or_fail'] == 'Failed')
                    <p class="mb-2 text-danger">{{ $session['results']['percentage'] < 0 ? 0 : $session['results']['percentage'] }}%</p>
                @else
                    <p class="mb-2 text-green">{{ $session['results']['percentage'] < 0 ? 0 : $session['results']['percentage'] }}%</p>
                @endif
                    <p class="mb-0 font-size-13">Min. {{ $session['results']['cutoff'] }}%</p>
                </div>                        
            </div>
            @if ( $session['results']['pass_or_fail'] == 'Failed')
                <div class="start-0 top-50 position-absolute bg-danger" style="height: 10px;width: 10px;"></div>
            @else
                <div class="start-0 top-50 position-absolute bg-green" style="height: 10px;width: 10px;"></div>
            @endif
        </div>
        <div class="col-12 col-sm-6 col-lg-3 px-3 position-relative mt-2">
            <div class="row bg-white rounded-3 py-3 px-2 h-100 shadow-sm">
                <div class="col-6 fs-4 align-self-center"><p class="mb-0 text-dark">Score</p></div>
                <div class="col-6 text-end col-6 fs-4 align-self-center">
                @if ( $session['results']['pass_or_fail'] == 'Failed')
                    <p class="mb-2 text-danger">{{  $session['results']['score'] < 0 ? 0 :  $session['results']['score'] }}</p>
                @else
                    <p class="mb-2 text-green">{{  $session['results']['score'] < 0 ? 0 :  $session['results']['score'] }}</p>
                @endif
                    <p class="mb-0 font-size-13">Marks {{  $session['results']['total_marks'] }}</p>
                </div>                        
            </div>
            @if ( $session['results']['pass_or_fail'] == 'Failed')
                <div class="start-0 top-50 position-absolute bg-danger" style="height: 10px;width: 10px;"></div>
            @else
                <div class="start-0 top-50 position-absolute bg-green" style="height: 10px;width: 10px;"></div>
            @endif
        </div>
        <div class="col-12 col-sm-6 col-lg-3 px-3 position-relative mt-2">
            <div class="row bg-white rounded-3 py-3 px-2 h-100 shadow-sm">
                <div class="col-6 fs-4 align-self-center"><p class="mb-0 text-dark">Accuracy</p></div>
                <div class="col-6 text-end col-6 fs-4 align-self-center">
                @if ( $session['results']['pass_or_fail'] == 'Failed')
                    <p class="mb-2 text-danger">{{  $session['results']['accuracy'] }}%</p>
                @else
                    <p class="mb-2 text-green">{{  $session['results']['accuracy'] }}%</p>
                @endif
                </div>                        
            </div>
            @if ( $session['results']['pass_or_fail'] == 'Failed')
                <div class="start-0 top-50 position-absolute bg-danger" style="height: 10px;width: 10px;"></div>
            @else
                <div class="start-0 top-50 position-absolute bg-green" style="height: 10px;width: 10px;"></div>
            @endif
        </div>
        <div class="col-12 col-sm-6 col-lg-3 px-3 position-relative mt-2">
            <div class="row bg-white rounded-3 py-3 px-2 h-100 shadow-sm">
                <div class="col-6 fs-4 align-self-center"><p class="mb-0 text-dark">Speed</p></div>
                <div class="col-6 text-end col-6 fs-4 align-self-center">
                @if ( $session['results']['pass_or_fail'] == 'Failed')
                    <p class="mb-2 text-danger">{{  $session['results']['speed'] }}</p>
                @else
                    <p class="mb-2 text-green">{{  $session['results']['speed'] }}</p>
                @endif
                    <p class="mb-0 font-size-13">Que/Hour</p>
                </div>                        
            </div>
            @if ( $session['results']['pass_or_fail'] == 'Failed')
                <div class="start-0 top-50 position-absolute bg-danger" style="height: 10px;width: 10px;"></div>
            @else
                <div class="start-0 top-50 position-absolute bg-green" style="height: 10px;width: 10px;"></div>
            @endif
        </div>
    </div>

    <div class="justify-content-center row">
        <div class="col-12 col-sm-6 col-md-4 mt-3">
            <div class="row bs-gutter-x-0 bg-white rounded-3 py-4 px-3 shadow-sm">
                <p class="text-center text-dark">TOTAL {{$session['results']['total_questions']}} QUESTIONS</p>
                <div class="m-auto col-md-12 col-lg-6"><canvas class="w-100 h-100" id="myQuestionChart"></canvas></div>
                <div class="col-md-12 col-lg-6 align-self-center font-size-13 ps-2">
                    <div>
                        <svg class="svg-indicator" style="color:{{$chartColors[0]}};" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        {{ $session['results']['correct_answered_questions'] }} Correct
                    </div>
                    <div>
                        <svg class="svg-indicator" style="color:{{$chartColors[1]}};" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        {{ $session['results']['wrong_answered_questions'] }} Wrong
                    </div>
                    <div>
                        <svg class="svg-indicator" style="color:{{$chartColors[2]}};" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        {{ $session['results']['unanswered_questions'] }} Unanswered
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-4 mt-3">
            <div class="row bs-gutter-x-0 bg-white rounded-3 py-4 px-3 shadow-sm">
                <p class="text-center text-dark">TOTAL {{  number_format($session['results']['total_duration'], 1) }} Minutes</p>
                <div class="m-auto col-md-12 col-lg-6"><canvas class="w-100 h-100" id="myTimeChart"></canvas></div>
                <div class="col-md-12 col-lg-6 align-self-center font-size-13 ps-2">
                    <div>
                        <svg class="svg-indicator" style="color:{{$chartColors[0]}};" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        {{ $session['results']['time_taken_for_correct_answered']['detailed_readable'] }} Correct
                    </div>
                    <div>
                        <svg class="svg-indicator" style="color:{{$chartColors[1]}};" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        {{ $session['results']['time_taken_for_wrong_answered']['detailed_readable'] }} Wrong
                    </div>
                    <div>
                        <svg class="svg-indicator" style="color:{{$chartColors[2]}};" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        {{ $session['results']['time_taken_for_other']['detailed_readable'] }} Other
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-4 mt-3">
            <div class="bg-white rounded-3 py-4 px-3 h-100 shadow-sm">
                <p class="text-center text-dark">Total Scored Marks</p>
                <div class="table-responsive">
                    <table class="table table-bordered mb-0">
                        <tbody>
                        <tr>
                            <td class="py-2 px-3">Marks Earned</td>
                            <td class="py-2 px-3 text-end">{{ $session['results']['marks_earned'] }}</td>
                        </tr>
                        <tr>
                            <td class="py-2 px-3">Negative Marks</td>
                            <td class="py-2 px-3 text-end">-{{ $session['results']['marks_deducted'] }}</td>
                        </tr>
                        <tr>
                            <td class="py-2 px-3">Total Marks</td>
                            <td class="py-2 px-3 text-end">{{ $session['results']['total_marks'] }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    <div class="py-4">
        <div class="bg-white rounded-3 py-4 px-3 shadow-sm">
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
    </div>

    <div class="text-dark fs-4">User Answers</div>

    <div class="py-4">
        <div class="bg-white rounded-3 shadow-3 w-100 p-4">
            <div id="solution_sec" class="row">
                <div class="col-md-4 border-end">
                    <div class="nav nav-tabs justify-content-center mb-3 mb-md-0"  role="tablist" id="question_nums"></div>
                </div>
                <div class="col-md-8">
                    <div class="tab-content rounded-0 p-0" id="question_tab_content"></div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script>
        var chartColors = {!! str_replace("'", "\'", json_encode($chartColors)) !!};
        var total_question_data = [{{$session['results']['correct_answered_questions']}}, {{$session['results']['wrong_answered_questions']}}, {{$session['results']['unanswered_questions']}}];
        var total_time_data = [{{$session['results']['time_taken_for_correct_answered']['seconds']}}, {{$session['results']['time_taken_for_wrong_answered']['seconds']}}, {{$session['results']['time_taken_for_other']['seconds']}}];
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
                var text = "{{$session['results']['answered_questions']}}/{{$session['results']['total_questions']}} Answered"
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
                var text = "{{$session['results']['total_time_taken']['detailed_readable']}} Spent"
                    textX = Math.round((width - ctx.measureText(text).width) / 2),
                    textY = height / 2;

                ctx.fillText(text, textX, textY);
                ctx.save();
                }
            }]
        });
    </script>

    <script>
        let quizSlug = {!! str_replace("'", "\'", json_encode($exam['slug'])) !!};
        let sessionId = {!! str_replace("'", "\'", json_encode($session['id'])) !!};
        fetchQuestions(quizSlug, sessionId);
        function fetchQuestions(exam, session) {
            var reqData = {
                exam: exam,
                session: session
            }
            $.ajax({
                type: "GET",
                url: "/admin/exam/"+exam+"/solutions/"+session,
                data: { reqData, _token: '{{csrf_token()}}' },
                success: function (data) {
                    data['questions'].forEach(function(question, i) {
                        var i = ++i;
                        let tab =   '<div class="tab-pane fade" id="question_'+i+'" role="tabpanel" aria-labelledby="question_'+i+'_tab">'+
                                        '<div class="d-flex justify-content-between"><div class="alert-primary px-2 rounded shadow-sm">Time Spent: '+question.time_taken.detailed_readable+'</div> <div class="px-2 rounded shadow-sm" id="question_marks_earned_'+i+'">+'+question.marks_earned+' Marks Earned</div></div>'+
                                        '<div class="my-3 bg-body p-3 rounded-1 shadow-sm">'+ 
                                            '<div><span class="text-dark">Q'+i+' of '+data['questions'].length+' | </span> <span class="text-uppercase fs-tiny">'+question.skill+'</span> </div>'+
                                            '<div class="mt-3 text-dark">'+question.question+'</div>'+
                                        '</div>'+
                                        '<div id="options'+i+'"></div>'+
                                        '<div class="mt-3 bg-label-success py-2 px-3 border border-success text-black rounded-1">'+
                                            '<svg class="me-1 h-px-20" style="color:#73dd37;" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>'+
                                            '<span id="count_options_'+i+'"></span>'+
                                            '<span id="correct_answers_'+i+'"></span>'+
                                        '</div>'+
                                    '</div>';
                        $("#question_nums").append('<button class="btn me-2 mt-2" id="question_'+i+'_tab" data-bs-toggle="tab" data-bs-target="#question_'+i+'" type="button" role="tab" aria-controls="question_'+i+'" aria-selected="true">'+i+'</button>')
                        $("#question_tab_content").append(tab);
                        switch(question.questionType) {
                                case 'FIB':                            
                                    var options = "";
                                    question.user_answer.forEach(function(user_answer,o){
                                        if(user_answer == question.ca[o]){
                                            options +=  `<div id="option_`+i+`_`+o+`" class="border d-flex mt-2 rounded-1 bg-label-success"><div class="border-end py-1 px-3"><span style="font-size: 13px;" class="bg-body shadow-sm text-dark px-1 rounded-1">`+(++o)+`</span></div><div class="w-100 align-self-center px-2">`+user_answer+`</div></div>`;
                                        } else {
                                            options +=  `<div id="option_`+i+`_`+o+`" class="border d-flex mt-2 rounded-1 bg-label-danger"><div class="border-end py-1 px-3"><span style="font-size: 13px;" class="bg-body shadow-sm text-dark px-1 rounded-1">`+(++o)+`</span></div><div class="w-100 align-self-center px-2">`+user_answer+`</div></div>`;
                                        }
                                    });
                                    $("#options"+i).append(options);
                                    break;
                                case 'MSA':
                                    var options = "";
                                    question.options.forEach(function(option,o){
                                        if(++o == question.user_answer){
                                            if(question.is_correct){
                                                options +=  `<div id="option_`+i+`_`+o+`" class="border d-flex mt-2 rounded-1 bg-label-success"><div class="border-end py-1 px-3"><span style="font-size: 13px;" class="bg-body shadow-sm text-dark px-1 rounded-1">`+o+`</span></div><div class="w-100 align-self-center px-2">`+option+`</div></div>`;
                                            } else {
                                                options +=  `<div id="option_`+i+`_`+o+`" class="border d-flex mt-2 rounded-1 bg-label-danger"><div class="border-end py-1 px-3"><span style="font-size: 13px;" class="bg-body shadow-sm text-dark px-1 rounded-1">`+o+`</span></div><div class="w-100 align-self-center px-2">`+option+`</div></div>`;
                                            }
                                        } else {
                                            options +=  `<div id="option_`+i+`_`+o+`" class="border d-flex mt-2 rounded-1"><div class="border-end py-1 px-3"><span style="font-size: 13px;" class="bg-body shadow-sm text-dark px-1 rounded-1">`+o+`</span></div><div class="w-100 align-self-center px-2">`+option+`</div></div>`;
                                        }
                                    });
                                    $("#options"+i).append(options);
                                    break;
                                case 'TOF':
                                    var options = "";
                                    question.options.forEach(function(option,o){
                                        if(++o == question.user_answer){
                                            if(question.is_correct){
                                                options +=  `<div id="option_`+i+`_`+o+`" class="border d-flex mt-2 rounded-1 bg-label-success"><div class="border-end py-1 px-3"><span style="font-size: 13px;" class="bg-body shadow-sm text-dark px-1 rounded-1">`+o+`</span></div><div class="w-100 align-self-center px-2">`+option+`</div></div>`;
                                            } else {
                                                options +=  `<div id="option_`+i+`_`+o+`" class="border d-flex mt-2 rounded-1 bg-label-danger"><div class="border-end py-1 px-3"><span style="font-size: 13px;" class="bg-body shadow-sm text-dark px-1 rounded-1">`+o+`</span></div><div class="w-100 align-self-center px-2">`+option+`</div></div>`;
                                            }
                                        } else {
                                            options +=  `<div id="option_`+i+`_`+o+`" class="border d-flex mt-2 rounded-1"><div class="border-end py-1 px-3"><span style="font-size: 13px;" class="bg-body shadow-sm text-dark px-1 rounded-1">`+o+`</span></div><div class="w-100 align-self-center px-2">`+option+`</div></div>`;
                                        }
                                    });
                                    $("#options"+i).append(options);
                                    break;
                                case 'MMA':
                                    var options = "";
                                    question.options.forEach(function(option,o){
                                        let index = o+1;
                                        if(question.user_answer.includes(index.toString())){
                                            if(question.ca.includes(index.toString())){
                                                options +=  `<div id="option_`+i+`_`+o+`" class="border d-flex mt-2 rounded-1 bg-label-success"><div class="border-end py-1 px-3"><span style="font-size: 13px;" class="bg-body shadow-sm text-dark px-1 rounded-1">`+index+`</span></div><div class="w-100 align-self-center px-2">`+option+`</div></div>`;
                                            } else {
                                                options +=  `<div id="option_`+i+`_`+o+`" class="border d-flex mt-2 rounded-1 bg-label-danger"><div class="border-end py-1 px-3"><span style="font-size: 13px;" class="bg-body shadow-sm text-dark px-1 rounded-1">`+index+`</span></div><div class="w-100 align-self-center px-2">`+option+`</div></div>`;
                                            }
                                        } else {
                                            options +=  `<div id="option_`+i+`_`+o+`" class="border d-flex mt-2 rounded-1"><div class="border-end py-1 px-3"><span style="font-size: 13px;" class="bg-body shadow-sm text-dark px-1 rounded-1">`+index+`</span></div><div class="w-100 align-self-center px-2">`+option+`</div></div>`;
                                        }
                                    });
                                    $("#options"+i).append(options);
                                    break;
                                case 'SAQ':
                                    var options = "";
                                    if(question.user_answer){
                                        if(question.is_correct){
                                            options +=  `<div id="option_`+i+`_0" class="border d-flex mt-2 rounded-1 bg-label-success"><div class="w-100 align-self-center px-3 py-4">`+question.user_answer+`</div></div>`;
                                        } else {
                                            options +=  `<div id="option_`+i+`_0" class="border d-flex mt-2 rounded-1 bg-label-danger"><div class="w-100 align-self-center px-3 py-4">`+question.user_answer+`</div></div>`;
                                        }
                                        $("#options"+i).append(options);
                                    }
                                    break;
                                case 'MTF':
                                    let matches = "";
                                    let pairs = "";
                                    question.options.matches.forEach(function(match,m){
                                        matches +=  `<div id="option_`+i+`_`+m+`" class="border d-flex mt-2 rounded-1"><div class="border-end py-1 px-3"><span style="font-size: 13px;" class="bg-body shadow-sm text-dark px-1 rounded-1">`+(++m)+`</span></div><div class="w-100 align-self-center px-2">`+match.value+`</div></div>`;
                                    });
                                    if(question.user_answer.length > 0){
                                        question.user_answer.forEach(function(pair,p){
                                            if(pair.id == question.ca[p]){
                                                pairs +=  `<div id="option_`+i+`_`+p+`" class="border d-flex mt-2 rounded-1 bg-label-success"><div class="border-end py-1 px-3"><span style="font-size: 13px;" class="bg-body shadow-sm text-dark px-1 rounded-1">`+(++p)+`</span></div><div class="w-100 align-self-center px-2">`+pair.value+`</div></div>`;
                                            } else {
                                                pairs +=  `<div id="option_`+i+`_`+p+`" class="border d-flex mt-2 rounded-1 bg-label-danger"><div class="border-end py-1 px-3"><span style="font-size: 13px;" class="bg-body shadow-sm text-dark px-1 rounded-1">`+(++p)+`</span></div><div class="w-100 align-self-center px-2">`+pair.value+`</div></div>`;
                                            }
                                        });
                                    } else {
                                        question.ca.forEach(function (answer, a) {
                                            var found = question.options.pairs.find(x => x.id == answer);
                                            pairs +=  `<div id="option_`+i+`_`+a+`" class="border d-flex mt-2 rounded-1"><div class="border-end py-1 px-3"><span style="font-size: 13px;" class="bg-body shadow-sm text-dark px-1 rounded-1">`+(++a)+`</span></div><div class="w-100 align-self-center px-2">`+found.value+`</div></div>`;
                                        });
                                    }
                                    var options = `<div class="row"><div class="col-6">`+matches+`</div><div class="col-6">`+pairs+`</div></div>`;
                                    $("#options"+i).append(options);
                                    break;
                                case 'ORD':
                                    var options = "";
                                    if(question.user_answer.length > 0){
                                        question.user_answer.forEach(function(pair,p){
                                            if(pair.id == question.ca[p]){
                                                options +=  `<div id="option_`+i+`_`+p+`" class="border d-flex mt-2 rounded-1 bg-label-success"><div class="border-end py-1 px-3"><span style="font-size: 13px;" class="bg-body shadow-sm text-dark px-1 rounded-1">`+(++p)+`</span></div><div class="w-100 align-self-center px-2">`+pair.value+`</div></div>`;
                                            } else {
                                                options +=  `<div id="option_`+i+`_`+p+`" class="border d-flex mt-2 rounded-1 bg-label-danger"><div class="border-end py-1 px-3"><span style="font-size: 13px;" class="bg-body shadow-sm text-dark px-1 rounded-1">`+(++p)+`</span></div><div class="w-100 align-self-center px-2">`+pair.value+`</div></div>`;
                                            }
                                        });
                                    } else {
                                        question.ca.forEach(function (answer, a) {
                                            var found = question.options.find(x => x.id == answer);
                                            options +=  `<div id="option_`+i+`_`+a+`" class="border d-flex mt-2 rounded-1"><div class="border-end py-1 px-3"><span style="font-size: 13px;" class="bg-body shadow-sm text-dark px-1 rounded-1">`+(++a)+`</span></div><div class="w-100 align-self-center px-2">`+found.value+`</div></div>`;
                                        });
                                    }
                                    $("#options"+i).append(options);
                                    break;
                            }  
                            // CORRECT ANSWER 
                            if (question.options > 1) {
                                $("#count_options_" + i).append('Correct answers are: ');
                            } else {
                                $("#count_options_" + i).append('Correct answer is: ');
                            }
                        if(question.questionType == 'ORD' || question.questionType == 'MTF'){
                            question.ca.forEach(function (answer, a) {
                                var found;
                                if(question.user_answer.length > 0){
                                    found = question.user_answer.find(x => x.id == answer);
                                } else {
                                    if(question.questionType == 'ORD'){
                                        found = question.options.find(x => x.id == answer);
                                    } else {
                                        found = question.options.pairs.find(x => x.id == answer);
                                    }
                                }
                                if (question.ca.length != ++a) {
                                    $("#correct_answers_" + i).append("<span class='text-dark fw-bold'>Q" + a + ".</span> " + found.value + ", ");
                                } else {
                                    $("#correct_answers_" + i).append("<span class='text-dark fw-bold'>" + found.value );
                                }
                            });
                        } else {
                            if(typeof question.ca != 'string'){
                                if (question.ca.length != undefined || question.ca.length > 1) {
                                    $("#count_options_" + i).text("Correct answers are: ");
                                    question.ca.forEach(function (answer, a) {
                                        if (question.ca.length != ++a) {
                                            $("#correct_answers_" + i).append("Q" + a + ". " + answer + ", ");
                                        } else {
                                            $("#correct_answers_" + i).append(answer);
                                        }
                                    });
                                }
                                else {
                                    $("#correct_answers_" + i).append(question.options[question.ca - 1]);
                                }
                            } else {
                                $("#correct_answers_" + i).append(question.options[question.ca - 1]);
                            }
                        }
                        if(i == 1){
                            $("#question_num"+i).addClass('active');
                            $("#question_"+i).addClass('show active');
                        }
                        if(question.status == 'not_visited' || question.status == 'not_answered'){
                            $("#question_"+i+"_tab").addClass('border-secondary');
                            $("#question_marks_earned_"+i).text(question.status.replace("_", " ")).addClass('bg-label-dark text-capitalize');
                        } else {
                            if(question.is_correct){
                                $("#question_"+i+"_tab").addClass('bg-label-success border-success');
                                $("#question_marks_earned_"+i).addClass('bg-label-success border-success');
                            } else{
                                $("#question_"+i+"_tab").addClass('bg-label-danger border-danger');
                                $("#question_marks_earned_"+i).text('-'+question.marks_deducted+' Marks Deducted').addClass('bg-label-danger border-danger');
                            }
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