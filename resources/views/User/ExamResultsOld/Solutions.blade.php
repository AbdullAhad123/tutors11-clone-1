<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$exam['title']}} Solutions - Student Portal - Tutors 11 Plus</title>
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
            <a href="{{$steps[0]['url']}}" class="nav-link w-auto"
                id="nav-{{$steps[0]['key']}}-tab">{{$steps[0]['title']}}</a>
            <a href="{{$steps[1]['url']}}" class="nav-link w-auto active"
                id="nav-{{$steps[1]['key']}}-tab">{{$steps[1]['title']}}</a>
            <a href="{{$steps[2]['url']}}" class="nav-link w-auto"
                id="nav-{{$steps[2]['key']}}-tab">{{$steps[2]['title']}}</a>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-{{$steps[1]['key']}}" role="tabpanel"
            aria-labelledby="nav-{{$steps[1]['key']}}-tab">
            <div class="bg-white rounded-3 shadow-3 w-100 p-4">
                <div class="">
                    @foreach ($sections as $key => $section)
                    <button class="btn btn-primary w-px-200 section-btn" data-id="{{$section['id']}}"
                        data-section_id="{{$section['section_id']}}"> {{$section['name']}} <span
                            class="text-dark bg-white px-1 rounded-1 fs-tiny d-inline-block translate-middle-y">+{{$section['results']['score']}}</span></button>
                    @endforeach
                </div>
                <hr>
                <div id="solution_sec" class="row">
                    <div class="col-md-4 border-end">
                        <div class="nav nav-tabs justify-content-center mb-3 mb-md-0" role="tablist" id="question_nums">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content rounded-0 p-0" id="question_tab_content"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    @include('User.ProgressScript')
    <script>
        let examSlug = {!! str_replace("'", "\'", json_encode($exam['slug']))!!};
        let sessionCode = {!! str_replace("'", "\'", json_encode($session['code']))!!};
        let sectionId = {!! str_replace("'", "\'", json_encode($section['id']))!!};
        fetchQuestions(examSlug, sessionCode, sectionId);
        $(".section-btn").click(function () {
            let sectionId = $(this).data("id");
            fetchQuestions(examSlug, sessionCode, sectionId);
            $("#question_nums").empty();
            $("#question_tab_content").empty();
        });

        function fetchQuestions(exam, session, section) {
            var reqData = {
                exam: exam,
                session: session,
                section: section
            }
            $.ajax({
                type: "GET",
                url: "/exam/" + exam + "/fetch-solutions/" + session + "/section/" + section,
                data: { reqData, _token: '{{csrf_token()}}' },
                success: function (data) {
                    console.log(data);
                    data['questions'].forEach(function (question, i) {
                        var i = ++i;
                        let tab = '<div class="tab-pane fade" id="question_' + i + '" role="tabpanel" aria-labelledby="question_' + i + '_tab">' +
                            '<div class="d-flex justify-content-between"><div class="alert-primary px-2 rounded shadow-sm">Time Spent: ' + question.time_taken.detailed_readable + '</div> <div class="px-2 rounded shadow-sm" id="question_marks_earned_' + i + '">+' + question.marks_earned + ' Marks Earned</div></div>' +
                            '<div class="my-3 bg-body p-3 rounded-1 shadow-sm">' +
                            '<div><span class="text-dark">Q' + i + ' of ' + data['questions'].length + ' | </span> <span class="text-uppercase fs-tiny">' + question.skill + '</span> </div>' +
                            '<div class="mt-3 text-dark">' + question.question + '</div>' +
                            '</div>' +
                            '<div id="options' + i + '"></div>' +
                            '<div class="mt-3 bg-label-success py-2 px-3 border border-success text-black rounded-1">' +
                            '<svg class="me-1 h-px-20" style="color:#73dd37;" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>' +
                            '<span id="count_options_' + i + '"></span>' +
                            '<span id="correct_answers_' + i + '"></span>' +
                            '</div>' +
                            '</div>';
                        $("#question_nums").append('<button class="btn me-2 mt-2" id="question_' + i + '_tab" data-bs-toggle="tab" data-bs-target="#question_' + i + '" type="button" role="tab" aria-controls="question_' + i + '" aria-selected="true">' + i + '</button>')
                        $("#question_tab_content").append(tab);
                        if (question.options > 1) {
                            $("#count_options_" + i).append('Correct answers are: ');
                        } else {
                            $("#count_options_" + i).append('Correct answer is: ');
                        }
                        question.ca.forEach(function (answer, a) {
                            if (question.ca.length != ++a) {
                                $("#correct_answers_" + i).append("Q" + a + ". " + answer + ", ");
                            } else {
                                $("#correct_answers_" + i).append(answer);
                            }
                        });
                        question.user_answer.forEach(function (ua, u) {
                            // bg-label-danger
                            let index = u;
                            $("#options" + i).append('<div id="option_' + i + '_' + u + '" class="border d-flex mt-2 rounded-1"><div class="border-end py-1 px-3"><span style="font-size: 13px;" class="bg-body shadow-sm text-dark px-1 rounded-1">' + (++u) + '</span></div><div class="w-100 align-self-center px-2">' + ua + '</div></div>');
                            if (ua == question.ca[index]) {
                                $("#option_" + i + "_" + index).addClass('bg-label-success');
                            } else {
                                $("#option_" + i + "_" + index).addClass('bg-label-danger');
                            }
                        });
                        // $("#question_tab_content").append('<div class="tab-pane fade" id="question_'+i+'" role="tabpanel" aria-labelledby="question_'+i+'_tab"><h1>'+i+'</h1></div></div>')
                        if (i == 1) {
                            $("#question_num" + i).addClass('active');
                            $("#question_" + i).addClass('show active');
                        }
                        if (question.is_correct) {
                            $("#question_" + i + "_tab").addClass('bg-label-success border-success');
                            $("#question_marks_earned_" + i).addClass('bg-label-success border-success');

                        } else {
                            $("#question_" + i + "_tab").addClass('bg-label-danger border-danger');
                            $("#question_marks_earned_" + i).text('-' + question.marks_deducted + ' Marks Deducted').addClass('bg-label-danger border-danger');
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
</body>

</html>