<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$quiz['title']}} Solutions - Student Portal - Tutors 11 Plus</title>
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

        .options p {
            margin: 0!important;
        }

        .correct_answers p {
            display: inline;
        }

        .optionMatch p {
            margin: 0!important; 
        }

        .input-group-text p{
            margin: 0!important;
        }
         /* questions sol  */
         .questions_button {
            background: white!important;
            color: black!important;
        }

        .question_grid_container {
            display: grid;
            grid-template-columns: 45px 1fr 45px;
            align-items: center;
            gap: 10px;
        }

        .question_left {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            gap: 5px;
        }

        .question_expression {
            font-size: 20px;
        }

        .questionNum {
            font-size: 16px;
        }

        .question_right {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 3px;
        }

        .time_taken {
            font-size: 14px;
        }

        .arrow_icon {
            font-size: 18px;
        }
        
        /* question details  */

        .question_details {
            height: auto;
            width: auto;
        }

        .question_options_container {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-wrap: wrap;
            list-style: none !important;
        }

        .question_options_items {
            width: fit-content;
            margin: 0.5rem 0.5rem !important;
            user-select: none;
            color: #000!important;
        }

        .correct_question_option {
            background-color: green;
        }

        .correct_question_option .question_items_serial {
            background-color: #fff;
            color: green !important;
        }

        .correct_question_option .option_item {
            color: white !important;
        }

        .question_items_serial {
            background-color: grey;
        }

        .correct_question_answered {
            background: green!important;
            color: white!important;
        }

        .wrong_question_answered {
            background: white!important;
            color: red!important;
            border: 1px solid red!important;
        }
        .wrong_question_option {
            background: red!important;
        }

        .wrong_question_option .question_items_serial {
            background-color: #fff;
            color: red !important;
        }

        .wrong_question_option .option_item {
            color: #fff!important;
        }

        /* for practcie card */
        .practice_card {
            display: grid;
            grid-template-columns: minmax(50px, 60px) 1fr;
            grid-gap: 5px;
            transition: 0.3s
        }

        @media (max-width: 425px) {
            .practice_card {
                grid-template-columns: minmax(40px, 45px) 1fr !important;
            }
        }

        .practice_card .practice_grid_child {
            display: flex;
            justify-content: start;
            align-items: center;
            font-size: 16px;
        }

        .practice_reward {
            height: auto;
            width: auto;
            bottom: 75%;
            left: 100%;
            background-color: red;
        }

        .question_details img {
            width: 35%;
            display: block;
            margin: 1rem auto;
        }
        .question_container>*:not(img) {
            width: 100% !important;
        }
    </style>
</head>

<body>
    @include('sidebar')
    @include('header')
    <?php $role = auth()->user()->roles[0]->name; ?>

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

    {{--<div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-{{$steps[1]['key']}}" role="tabpanel"
            aria-labelledby="nav-{{$steps[1]['key']}}-tab">
            <div class="bg-white rounded-3 shadow-3 w-100 p-4">
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
    </div>--}}

    <div clas="mb-5">
        <div class="bg-white p-lg-3 p-md-3 p-2">
            <h3 class="text-dark text-center my-3 fw-semibold">Take a look at Solutions!</h3>
            <div class="row m-0 align-items-center my-4">
                <div class="col-lg-4 col-md-4 col-sm-6 col-12 my-2">
                    <div class="practice_card rounded-3 position-relative">
                        <div class="practice_title practice_grid_child justify-content-center">
                            <img src="{{url('images\question_answered.png')}}" class="practice_results_image" height="40"
                                width="40" alt="question attempted">
                        </div>
                        <div class="practice_progress practice_grid_child my-1">
                            <div class="practice_progress_parent ms-2" style="width: 90%;">
                                <span class="fs-6 text-dark"><span class="fs-4 fw-bold">{{$session['results']['answered_questions']}}</span>/{{$session['results']['total_questions']}}</span>
                                <h5 class="practice_card_name fs-6 text-dark mb-1">Question Answered</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-12 my-2">
                    <div class="practice_card rounded-3 position-relative">
                        <div class="practice_title practice_grid_child justify-content-center">
                            <img src="{{url('images\darts.png')}}" class="practice_results_image" height="40" width="40"
                                alt="accuracy image">
                        </div>
                        <div class="practice_progress practice_grid_child my-1">
                            <div class="practice_progress_parent ms-2" style="width: 90%;">
                                <span class="fs-6 text-dark"><span class="fs-4 fw-bold">{{$session['results']['accuracy']}}</span>&nbsp;%</span>
                                <h5 class="practice_card_name fs-6 text-dark mb-1">Accuracy</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-12 my-2">
                    <div class="practice_card rounded-3 position-relative">
                        <div class="practice_title practice_grid_child justify-content-center">
                            <img src="{{url('images\timer.png')}}" class="practice_results_image" height="40" width="40"
                                alt="time spent image">
                        </div>
                        <div class="practice_progress practice_grid_child my-1">
                            <div class="practice_progress_parent ms-2" style="width: 90%;">
                                <span class="fs-6 text-dark"><span class="fs-4 fw-bold">{{$session['total_time_taken']}}</span>&nbsp;sec</span>
                                <h5 class="practice_card_name fs-6 text-dark mb-1">Time Spent</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- question solutions  -->
            <div class="question_solutions my-5">
                @if($questions['data'])
                    @foreach($questions['data'] as $key => $question)
                        <div class="question_button_container my-3">
                            <!-- question button  -->
                            <div class="w-100">
                                <button class="btn questions_button 
                                    @if($question['status'] == 'answered')
                                        @if($question['is_correct'])
                                            correct_question_answered
                                        @else
                                            wrong_question_answered
                                        @endif
                                    @else
                                        not_question_answered border
                                    @endif
                                    p-2 w-100 rounded-1" type="button" data-bs-toggle="collapse" data-bs-target="#question_solution_{{++$key}}" aria-expanded="false" aria-controls="question_solution_{{$key}}">
                                    <div class="question_grid_container">
                                        <div class="question_left">
                                            <span>
                                                <i class="bx 
                                                    @if($question['is_correct'])
                                                        bx-check 
                                                    @else
                                                        bx-x 
                                                    @endif
                                                bx-sm"></i>
                                            </span>
                                            <span class="questionNum">{{$key}}.</span>
                                        </div>
                                        <div class="question_center text-start">
                                            {{$question['questionTypeName']}}:
                                        </div>
                                        <div class="question_right">
                                            <span class="time_taken">{{$question['time_taken']['seconds']}}s</span>
                                            <span class="arrow_icon">
                                                <i class='bx bx-chevron-down'></i>
                                            </span>
                                        </div>
                                    </div>
                                </button>
                            </div>
                            <!-- answer body  -->
                            <div class="collapse border border-1 mt-2" id="question_solution_{{$key}}">
                                <div class=" card-body p-0">
                                    <div class="question_details p-2 py-5 shadow">
                                        <h4 class="text-center text-dark question_container">
                                            {!!$question['question']!!}
                                        </h4>
                                        @if($question['questionType'] == 'FIB')
                                            <ul class="question_options_container m-0 p-0 my-4">
                                                @foreach($question['user_answer'] as $userAnsKey => $answer)
                                                    @if($answer !== null)
                                                        <li 
                                                            class="question_options_items 
                                                            @if($answer == $question['ca'][$userAnsKey] || $question['is_correct'])
                                                                correct_question_option 
                                                            @else
                                                                wrong_question_option
                                                            @endif
                                                            p-2 text-decoration-none text-dark rounded-3 overflow-hidden border border-2 shadow-sm d-flex justify-content-start align-items-center">
                                                            @if(count($question['user_answer']) > 1)
                                                                <span class="question_items_serial px-2 rounded-3 text-white">
                                                                    {{++$userAnsKey}}
                                                                </span>
                                                            @endif
                                                            <span class="option_item px-3">
                                                                {!!$answer!!}
                                                            </span>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                            @if(!$question['is_correct'])
                                                <div class="text-center fs-5 mb-3">
                                                    @if($question['options'] > 1)
                                                        Correct answers are 
                                                        @foreach($question['ca'] as $caKey => $ca)
                                                            <span class="badge text-black bg-label-primary p-1">Q{{++$caKey}}.</span> <span class="ms-1 me-2">{{$ca}}</span>
                                                        @endforeach
                                                    @else
                                                        Correct answer is
                                                        @foreach($question['ca'] as $caKey => $ca)
                                                            <span class="ms-1 me-2">{{$ca}}</span>
                                                        @endforeach
                                                    @endif
                                                </div>
                                            @endif
                                        @elseif($question['questionType'] == 'MTF')
                                            @foreach($question['options']['matches'] as $optionKey => $option)
                                                <ul class="question_options_container m-0 p-0">
                                                    <li style="max-width: 50%;" class="question_options_items p-2 text-decoration-none text-dark rounded-3 overflow-hidden border border-2 shadow-sm d-flex justify-content-start align-items-center">
                                                        <span class="question_items_serial px-2 rounded-3 text-white">
                                                            {{++$optionKey}}
                                                        </span>
                                                        <span class="option_item px-3">
                                                            {!!$option['value']!!}
                                                        </span>
                                                    </li>
                                                    <li style="max-width: 50%;" class="question_options_items p-2 text-decoration-none text-dark rounded-3 overflow-hidden border border-2 shadow-sm d-flex justify-content-start align-items-center
                                                        @if($question['user_answer'][--$optionKey]['id'] == $question['ca'][$optionKey])
                                                        correct_question_option
                                                        @else
                                                        wrong_question_option
                                                        @endif
                                                    ">
                                                        <span class="option_item px-3">
                                                            {!!$question['user_answer'][$optionKey]['value']!!}
                                                        </span>
                                                    </li>
                                                </ul>
                                            @endforeach
                                            @if(!$question['is_correct'])
                                                <div class="text-center fs-5 mb-3">
                                                        Correct answers are
                                                        @foreach($question['ca'] as $caKey => $ca)
                                                            <span class="badge text-black bg-label-primary p-1">Option {{++$caKey}}.</span> 
                                                            @foreach($question['user_answer'] as $userAnsKey => $answer)
                                                                @if($answer['id'] == $ca)
                                                                    <span class="ms-1 me-2">{{$answer['value']}}</span>
                                                                @endif
                                                            @endforeach
                                                        @endforeach
                                                </div>
                                            @endif
                                        @elseif($question['questionType'] == 'ORD')
                                            <ul class="question_options_container m-0 p-0 my-4">
                                                @foreach($question['user_answer'] as $userAnsKey => $answer)
                                                    <li 
                                                        class="question_options_items 
                                                        @if($answer['id'] == $question['ca'][$userAnsKey])
                                                            correct_question_option 
                                                        @else
                                                            wrong_question_option
                                                        @endif
                                                        p-2 text-decoration-none text-dark rounded-3 overflow-hidden border border-2 shadow-sm d-flex justify-content-start align-items-center">
                                                        <span class="question_items_serial px-2 rounded-3 text-white">
                                                            {{++$userAnsKey}}
                                                        </span>
                                                        <span class="option_item px-3">
                                                            {!!$answer['value']!!}
                                                        </span>
                                                    </li>
                                                @endforeach
                                            </ul>
                                            @if(!$question['is_correct'])
                                                <div class="text-center fs-5 mb-3">
                                                    Correct answers are 
                                                    @foreach($question['ca'] as $caKey => $ca)
                                                        @foreach($question['options'] as $optionKey => $option)
                                                            @if($option['id'] == $ca)
                                                                <span class="badge text-black bg-label-primary p-1">Option {{++$caKey}}.</span> <span class="ms-1 me-2 d-inline-block">{!!$option['value']!!}</span>
                                                            @endif
                                                        @endforeach
                                                    @endforeach
                                                </div>
                                            @endif
                                        @elseif($question['questionType'] == 'TOF')
                                            <ul class="question_options_container m-0 p-0 my-4">
                                                @foreach($question['options'] as $optionKey => $option)
                                                    <li 
                                                        class="question_options_items 
                                                        @if(++$optionKey == $question['user_answer'])
                                                            @if($question['is_correct'])
                                                                correct_question_option 
                                                            @else
                                                                wrong_question_option 
                                                            @endif
                                                        @endif
                                                        p-2 text-decoration-none text-dark rounded-3 overflow-hidden border border-2 shadow-sm d-flex justify-content-start align-items-center">
                                                        <span class="question_items_serial px-2 rounded-3 text-white">
                                                            {{$optionKey}}
                                                        </span>
                                                        <span class="option_item px-3">
                                                            {!!$option!!}
                                                        </span>
                                                    </li>
                                                @endforeach
                                            </ul>
                                            @if(!$question['is_correct'])
                                                <div class="text-center fs-5 mb-3">
                                                    Correct answer is 
                                                    <span class="ms-1 me-2 d-inline-block">{!!$question['options'][--$question['ca'][0]]!!}</span>
                                                </div>
                                            @endif
                                        @elseif($question['questionType'] == 'MSA')
                                            <ul class="question_options_container m-0 p-0 my-4">
                                                @foreach($question['options'] as $optionKey => $option)                                                        
                                                    <li class="question_options_items p-2 text-decoration-none text-dark rounded-3 overflow-hidden border border-2 shadow-sm d-flex justify-content-start align-items-center
                                                        @if(++$optionKey == $question['user_answer'])
                                                            @if($question['user_answer'] == $question['ca'])
                                                                correct_question_option 
                                                            @else
                                                                wrong_question_option 
                                                            @endif
                                                        @endif
                                                    ">
                                                        <span class="question_items_serial px-2 rounded-3 text-white">
                                                            {{$optionKey}}
                                                        </span>
                                                        <span class="option_item px-3">
                                                            {!!$option!!}
                                                        </span>
                                                    </li>
                                                @endforeach
                                            </ul>
                                            @if(!$question['is_correct'])
                                                <div class="text-center fs-5 mb-3">
                                                    Correct option is 
                                                    <span class="badge text-black bg-label-primary p-1">{{$question['ca']}}.</span> <span class="ms-1 me-2 d-inline-block">{!!$question['options'][--$question['ca']]!!}</span>
                                                </div>
                                            @endif
                                        @elseif($question['questionType'] == 'MMA')
                                            <ul class="question_options_container m-0 p-0 my-4">
                                                @foreach($question['options'] as $optionKey => $option)
                                                    <li class="question_options_items p-2 text-decoration-none text-dark rounded-3 overflow-hidden border border-2 shadow-sm d-flex justify-content-start align-items-center
                                                    @if($question['user_answer'])
                                                        @foreach($question['user_answer'] as $userAnsKey => $answer)
                                                            @if($optionKey + 1 == $answer)
                                                                @if(in_array($answer, $question['ca']))
                                                                    correct_question_option
                                                                @else
                                                                    wrong_question_option
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                    ">
                                                        <span class="question_items_serial px-2 rounded-3 text-white">
                                                            {{++$optionKey}}
                                                        </span>
                                                        <span class="option_item px-3">
                                                            {!!$option!!}
                                                        </span>
                                                    </li>
                                                @endforeach
                                            </ul>
                                            @if(!$question['is_correct'])
                                                <div class="text-center fs-5 mb-3">
                                                    Correct options are 
                                                    @foreach($question['ca'] as $caKey => $ca)
                                                        <span class="badge text-black bg-label-primary p-1">{{$ca}}.</span> <span class="ms-1 me-2 d-inline-block">{!!$question['options'][--$ca]!!}</span>
                                                    @endforeach
                                                </div>
                                            @endif
                                        @elseif($question['questionType'] == 'SAQ')
                                            @if($question['user_answer'])
                                                <ul class="question_options_container m-0 p-0 my-4">
                                                    <li class="question_options_items p-2 text-decoration-none text-dark rounded-3 overflow-hidden border border-2 shadow-sm d-flex justify-content-start align-items-center
                                                        @if($question['is_correct'])
                                                            correct_question_option
                                                        @else
                                                            wrong_question_option
                                                        @endif
                                                    ">
                                                        <span class="question_items_serial px-2 rounded-3 text-white">
                                                            1
                                                        </span>
                                                        <span class="option_item px-3">
                                                            {!!$question['user_answer']!!}
                                                        </span>
                                                    </li>
                                                </ul>
                                            @endif
                                            @if(!$question['is_correct'])
                                                <div class="text-center fs-5 mb-3">
                                                    Correct answers are 
                                                    @foreach($question['ca'] as $caKey => $ca)
                                                        <span class="badge text-black bg-label-primary p-1">Q{{++$caKey}}.</span> <span class="ms-1 me-2 d-inline-block">{!!$ca!!}</span>
                                                    @endforeach
                                                </div>
                                            @endif
                                        @endif
                                        <div class="text-center">
                                            <p class="mb-0">
                                                Mistake detected?
                                                <a class="d-inline-block cursor-pointer text-primary" data-bs-toggle="modal" data-bs-target="#wrong_ques{{$question['id']}}">
                                                    Tell us!
                                                </a>
                                                <div class="modal fade" id="wrong_ques{{$question['id']}}" aria-labelledby="modalToggleLabel" tabindex="-1" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title text-dark" id="modalToggleLabel">Something wrong</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body text-start">
                                                                <label for="message_{{$question['id']}}">Message</label>
                                                                <textarea id="message_{{$question['id']}}" placeholder="Write Message" class="form-control"></textarea>
                                                                <div class="mt-3 text-end">
                                                                    <div id="query_error_{{$question['id']}}" class="fw-light mb-1 small text-danger"></div>
                                                                    <button class="submit_question_issue btn btn-light border border-dark" data-id="{{$question['id']}}">Submit</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>

    @include('User.ProgressScript')

    <script>
        let quizSlug = {!! str_replace("'", "\'", json_encode($quiz['slug']))!!};
        let sessionCode = {!! str_replace("'", "\'", json_encode($session['code']))!!};
        fetchQuestions(quizSlug, sessionCode);
        function fetchQuestions(quiz, session) {
            var reqData = {
                quiz: quiz,
                session: session
            }
            $.ajax({
                type: "GET",
                url: "/quiz/" + quiz + "/fetch-solutions/" + session,
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
                            '<div class="mt-3 bg-label-success py-2 px-3 border border-success text-black rounded-1 correct_answers">' +
                            '<svg class="me-1 h-px-20" style="color:#73dd37;" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>' +
                            '<span id="count_options_' + i + '"></span>' +
                            '<span id="correct_answers_' + i + '"></span>' +
                            '</div>' +
                            '</div>';
                        $("#question_nums").append('<button class="btn me-2 mt-2" id="question_' + i + '_tab" data-bs-toggle="tab" data-bs-target="#question_' + i + '" type="button" role="tab" aria-controls="question_' + i + '" aria-selected="true">' + i + '</button>')
                        $("#question_tab_content").append(tab);
                        // start if question length greater than 1 
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
                                    question.options.pairs.forEach(function(pair,p){
                                        pairs +=  `<div id="option_`+i+`_`+p+`" class="border d-flex mt-2 rounded-1"><div class="border-end py-1 px-3"><span style="font-size: 13px;" class="bg-body shadow-sm text-dark px-1 rounded-1">`+(++p)+`</span></div><div class="w-100 align-self-center px-2">`+pair.value+`</div></div>`;
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
                                    question.options.forEach(function(pair,p){
                                        options +=  `<div id="option_`+i+`_`+p+`" class="border d-flex mt-2 rounded-1"><div class="border-end py-1 px-3"><span style="font-size: 13px;" class="bg-body shadow-sm text-dark px-1 rounded-1">`+(++p)+`</span></div><div class="w-100 align-self-center px-2">`+pair.value+`</div></div>`;
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
        $(document).on('click', '.submit_question_issue', function(){
            let _this = $(this);
            let id = $(this).data("id");
            let message = $("#message_"+id).val();
            if(message){
                $.ajax({
                    type: "POST",
                    url: "/question/"+id+"/send-query",
                    data: {
                        id: id,
                        message: message,
                        is_index_question: false,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        if(data.success){
                            $("#query_error_"+id).text("");
                            let tab = `<div class="alert alert-success text-black">Your inquiry has been received, and we appreciate your communication.</div>`
                            _this.parents('.modal-body').empty().append(tab);
                        }
                    },
                    error: function(data, textStatus, errorThrown) {
                        console.log(textStatus);
                    },
                });
            } else {
                $("#query_error_"+id).text("Please enter your query!");
            }
        });
    </script>
</body>

</html>