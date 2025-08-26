<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$exam['title']}} Results - Student Portal - Tutors 11 Plus</title>
    <link rel="shortcut icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}" type="image/x-icon">
    <style>
        .svg-indicator {
            height: 20px;
        }

        .bs-gutter-x-0 {
            --bs-gutter-x: 0 !important;
        }

        .font-size-13 {
            font-size: 13px;
        }

        .bg-green {
            background-color: #3c7c5a
        }

        .text-green {
            color: #3c7c5a
        }
    </style>
</head>

<body>
    @include('sidebar')
    @include('header')
    @if ($childName == '')
    <section id="exam_tab_section" style="display:;">
        <div class="col-12 col-lg-12 order-2 order-md-3 order-lg-2 mb-4">
            <div class="card">
                <p class="px-3 py-5 text-center text-black">Child Not Selected</p>
            </div>
        </div>
    </section>
    @else
    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a href="{{$steps[0]['url']}}" class="nav-link w-auto active"
                id="nav-{{$steps[0]['key']}}-tab">{{$steps[0]['title']}}</a>
            <a href="{{$steps[1]['url']}}" class="nav-link w-auto"
                id="nav-{{$steps[1]['key']}}-tab">{{$steps[1]['title']}}</a>
            <a href="{{$steps[2]['url']}}" class="nav-link w-auto"
                id="nav-{{$steps[2]['key']}}-tab">{{$steps[2]['title']}}</a>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-analysis" role="tabpanel" aria-labelledby="nav-analysis-tab">
            <div class="row">
                <div class="col-12 col-sm-6 col-lg-3 px-3 position-relative mt-2">
                    <div class="row bg-white rounded-3 py-3 px-2 h-100 shadow-sm">
                        <div class="col-6 fs-4 align-self-center">
                            <p class="mb-0 text-dark">{{ $session['results']['pass_or_fail'] }}</p>
                        </div>
                        <div class="col-6 text-end col-6 fs-4 align-self-center">
                            @if ( $session['results']['pass_or_fail'] == 'Failed')
                            <p class="mb-2 text-danger">{{ $session['results']['percentage'] < 0 ? 0 :
                                    $session['results']['percentage'] }}%</p>
                                    @else
                                    <p class="mb-2 text-green">{{ $session['results']['percentage'] < 0 ? 0 :
                                            $session['results']['percentage'] }}%</p>
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
                        <div class="col-6 fs-4 align-self-center">
                            <p class="mb-0 text-dark">Score</p>
                        </div>
                        <div class="col-6 text-end col-6 fs-4 align-self-center">
                            @if ( $session['results']['pass_or_fail'] == 'Failed')
                            <p class="mb-2 text-danger">{{ $session['results']['score'] < 0 ? 0 :
                                    $session['results']['score'] }}</p>
                                    @else
                                    <p class="mb-2 text-green">{{ $session['results']['score'] < 0 ? 0 :
                                            $session['results']['score'] }}</p>
                                            @endif
                                            <p class="mb-0 font-size-13">Marks {{ $session['results']['total_marks'] }}
                                            </p>
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
                        <div class="col-6 fs-4 align-self-center">
                            <p class="mb-0 text-dark">Accuracy</p>
                        </div>
                        <div class="col-6 text-end col-6 fs-4 align-self-center">
                            @if ( $session['results']['pass_or_fail'] == 'Failed')
                            <p class="mb-2 text-danger">{{ $session['results']['accuracy'] }}%</p>
                            @else
                            <p class="mb-2 text-green">{{ $session['results']['accuracy'] }}%</p>
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
                        <div class="col-6 fs-4 align-self-center">
                            <p class="mb-0 text-dark">Speed</p>
                        </div>
                        <div class="col-6 text-end col-6 fs-4 align-self-center">
                            @if ( $session['results']['pass_or_fail'] == 'Failed')
                            <p class="mb-2 text-danger">{{ $session['results']['speed'] }}</p>
                            @else
                            <p class="mb-2 text-green">{{ $session['results']['speed'] }}</p>
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
                        <div class="m-auto col-md-12 col-lg-6"><canvas class="w-100 h-100"
                                id="myQuestionChart"></canvas></div>
                        <div class="col-md-12 col-lg-6 align-self-center font-size-13 ps-2">
                            <div>
                                <svg class="svg-indicator" style="color:{{$chartColors[0]}};" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                {{ $session['results']['correct_answered_questions'] }} Correct
                            </div>
                            <div>
                                <svg class="svg-indicator" style="color:{{$chartColors[1]}};" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                {{ $session['results']['wrong_answered_questions'] }} Wrong
                            </div>
                            <div>
                                <svg class="svg-indicator" style="color:{{$chartColors[2]}};" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                {{ $session['results']['unanswered_questions'] }} Unanswered
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 mt-3">
                    <div class="row bs-gutter-x-0 bg-white rounded-3 py-4 px-3 shadow-sm">
                        <p class="text-center text-dark">TOTAL {{ number_format($session['results']['total_duration'],
                            1) }} Minutes</p>
                        <div class="m-auto col-md-12 col-lg-6"><canvas class="w-100 h-100" id="myTimeChart"></canvas>
                        </div>
                        <div class="col-md-12 col-lg-6 align-self-center font-size-13 ps-2">
                            <div>
                                <svg class="svg-indicator" style="color:{{$chartColors[0]}};" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                {{ $session['results']['time_taken_for_correct_answered']['detailed_readable'] }}
                                Correct
                            </div>
                            <div>
                                <svg class="svg-indicator" style="color:{{$chartColors[1]}};" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                {{ $session['results']['time_taken_for_wrong_answered']['detailed_readable'] }} Wrong
                            </div>
                            <div>
                                <svg class="svg-indicator" style="color:{{$chartColors[2]}};" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
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
            <div class="bg-white rounded-3 py-4 px-3 h-100 shadow-sm mt-4">
                <p class="text-dark">Sectional Summary</p>
                <div class="table-responsive">
                    <table class="table table-bordered mb-0">
                        <thead>
                            <tr>
                                <th class="py-2 px-3">#</th>
                                <th class="py-2 px-3">Name</th>
                                <th class="py-2 px-3">Score</th>
                                <th class="py-2 px-3">Attempted</th>
                                <th class="py-2 px-3">Accuracy</th>
                                <th class="py-2 px-3">Time Spent</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @foreach ($sections as $key => $section)
                            <tr class="table_row">
                                <td>
                                    <?php echo $i; ?>
                                </td>
                                <td>{{ $section['name'] }}</td>
                                <td>{{ $section['results']['score'] }}/{{ $section['results']['total_marks'] }}</td>
                                <td>{{ $section['results']['answered_questions'] }}/{{
                                    $section['results']['total_questions'] }}</td>
                                <td>{{ $section['results']['accuracy'] }}%</td>
                                <td>{{ $section['results']['total_time_taken']['detailed_readable'] }}</td>
                            </tr>
                            <?php $i++; ?>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endif

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        var chartColors = {!! str_replace("'", "\'", json_encode($chartColors))!!};
        var total_question_data = [{{ $session['results']['correct_answered_questions'] }}, {{ $session['results']['wrong_answered_questions'] }}, {{ $session['results']['unanswered_questions'] }}];
        var total_time_data = [{{ $session['results']['time_taken_for_correct_answered']['seconds'] }}, {{ $session['results']['time_taken_for_wrong_answered']['seconds'] }}, {{ $session['results']['time_taken_for_other']['seconds'] }}];
        var total_question_chart_data = {
            labels: ['Correct', 'Wrong', 'Unanswered'],
            datasets: [{
                data: total_question_data,
                backgroundColor: [chartColors[0], chartColors[1], chartColors[2]],
                hoverBackgroundColor: [chartColors['transparent'][0], chartColors['transparent'][1], chartColors['transparent'][2]]
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
                beforeDraw: function (chart, a, b) {
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
                backgroundColor: [chartColors[0], chartColors[1], chartColors[2]],
                hoverBackgroundColor: [chartColors['transparent'][0], chartColors['transparent'][1], chartColors['transparent'][2]]
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
                beforeDraw: function (chart, a, b) {
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

    @include('User.ProgressScript')
</body>

</html>