<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>{{$practiceSet['title']}} Practise - Student Portal - Tutors 11 Plus</title>
        <link rel="icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" integrity="sha512-c42qTSw/wPZ3/5LBzD+Bw5f7bSF2oxou6wEb+I/lqeaKV5FDIfMvvRp772y4jcJLKuGUOpbJMdg/BTl50fJYAw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <style>
            @media (max-width: 575px) {
                .question_title_container img{
                    width: 100%!important;
                }
            }
            ::-webkit-scrollbar {
                width: 7px;
            }
            
            ::-webkit-scrollbar-track {
                box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
            }
            
            ::-webkit-scrollbar-thumb {
                background-color: darkgrey;
                outline: 1px solid slategrey;
            }
            .sidenav {
                width: 350px;
                z-index: 1;
                background-color: #fff;
                overflow-x: hidden;
                transition: 0.5s;
            }

            .custom-btn{
                background-color: #696bfc !important;
            }
            #main {
                transition: margin-left .5s;
                padding: 16px;
                margin-left: 350px;
            }
            td {
                border: 1px solid lightgray;
                padding: 5px 12px;
            }
            table{
                margin-bottom: 12px;
            }
            .cursor-pointer{
                cursor: pointer;
            }
            .font-size-13{
                font-size:13px;
            }
            .font-size-14{
                font-size:14px;
            }
            p img {
                margin: 0 5px;
                /* width: 98% !important; */
            }
            .select_wrap p{margin-bottom:0;}
            .z-index-1{z-index: 1;}
            .z-index-5{z-index: 5;}
            .MMA_inp.active span, .MMA_inp.active .select_wrap, .MMA_wrap.correct span, .MMA_wrap.correct .select_wrap{
                background-color: #c7e1d4;
            }
            .MMA_wrap.incorrect span, .MMA_wrap.incorrect .select_wrap{
                background-color: #f2c3cd;
            }
            .sortable-drag {
                opacity: 0;
            }
            .drop_card{cursor: grab;}
            .bg-light{
                background-color: #f6f9ff !important;
            }
            @media screen and (max-width: 767px) {
                .sidenav {
                    width: 0;
                }
                #main {
                    margin-left: 0;
                }
            }
            @media screen and (min-width: 768px) {
                .sidenav {
                    width: 350px !important;
                }
            }
            .answer_wrap p {
                margin-bottom: 0;
            }
            .tooltiptext {
                background-color: #000;
                color: #fff;
                text-align: center;
                border-radius: 6px;
                padding: 5px 0;
                position: absolute;
                z-index: 1;
                top: 150%;
                visibility: hidden;
            }
            .tooltiptext::before {
                content: "";
                position: absolute;
                bottom: 100%;
                left: 50%;
                border-style: solid;
                border-color: #000 transparent transparent transparent;
                margin-left: -5px;
                border-width: 5px;
                rotate: 180deg;
            }

            .tooltip:hover .tooltiptext {
                visibility: visible;
            }

            .main_test_container {
                min-height: 94vh;
                max-height: fit-content;
                max-width: 1400px; 
                padding-top: 6.5rem; 
                padding-bottom: 3rem;
            }

            .main_test_container::-webkit-scrollbar {
                width: 4px !important;
            }

            .progress {
                height: 12px;
            }
            #progressBar{
                width: 0%;
            }

            /* report modal  */

            .modal_header {
                height: auto;
                width: auto;
                background: #38c182;
            }

            .modal_dissmiss_btn {
                position: absolute;
                top: 5px;
                right: 5px;
            }

            .modal_body {
                height: auto;
                width: auto;
            }

            .message_description_input {
                min-height: 180px!important;
                max-height: 180px!important;
            }

            .fs_md {
                font-size: 1.08rem!important
            }

            .modal_loader {
                display: none;
            }

            #check-group {
                animation: 0.32s ease-in-out 1.03s check-group;
                transform-origin: center;
            }

            #check-group #check {
                animation: 0.34s cubic-bezier(0.65, 0, 1, 1) 0.8s forwards check;
                stroke-dasharray: 0, 75px;
                stroke-linecap: round;
                stroke-linejoin: round;
            }

            #check-group #outline {
                animation: 0.38s ease-in outline;
                transform: rotate(0deg);
                transform-origin: center;
            }

            #check-group #white-circle {
                animation: 0.35s ease-in 0.35s forwards circle;
                transform: none;
                transform-origin: center;
            }

            @keyframes outline {
            from {
                stroke-dasharray: 0, 345.576px;
            }
            to {
                stroke-dasharray: 345.576px, 345.576px;
            }
            }
            @keyframes circle {
            from {
                transform: scale(1);
            }
            to {
                transform: scale(0);
            }
            }
            @keyframes check {
            from {
                stroke-dasharray: 0, 75px;
            }
            to {
                stroke-dasharray: 75px, 75px;
            }
            }
            @keyframes check-group {
            from {
                transform: scale(1);
            }
            50% {
                transform: scale(1.09);
            }
            to {
                transform: scale(1);
            }
            }
            #comprehension_body {
                height: 75vh;
                overflow-y: auto;
            }
            .submit_loading {
                z-index: 1055 !important;
                background: #ffffff96;
            }
            .bg_label_danger { background: #ffdddd !important; color: #ca1e1e !important; border: 1px solid #df5757 !important; outline: none !important; filter: drop-shadow(0px 2px 2px #00000040); } .bg_label_success { background: #e4ffe4 !important; color: #006400 !important; border: 1px solid #00ad00 !important; outline: none !important; filter: drop-shadow(0px 2px 2px #00000040); } .bg_label_primary { background: #daf4ff !important; color: #0072a3 !important; border: 1px solid #0072a3 !important; outline: none !important; filter: drop-shadow(0px 2px 2px #00000040); } .bg_label_warning { background: #fff0d3 !important; color: #ad7000 !important; border: 1px solid #ad7000 !important; outline: none !important; filter: drop-shadow(0px 2px 2px #00000040); }
            @media (max-width: 320px) {
                .session_title {
                    font-size: 6vw !important;
                }
            }
            .dropdown_shadow { box-shadow: 0px 3px 10px 2px #00000033 !important; } 
            .main_content{
                padding-top: 95px;
                padding-bottom:75px;
            }
            #move_question, .main_content{
                max-width: 1400px;
            }
            .question_content {
                display: none;
            }
            .question_content.active {
                display: block;
            }
        </style>
    </head>
    <body>
        @include('components.website-preloader')
        <div class="bg-white shadow fixed-top container-fluid pb-2">
            <div class="d-flex align-items-center justify-content-between">
                <button class="btn border-0" onclick="history.back()"><i class="fa fa-arrow-left"></i></button>
                <div class="text-center">
                    <h4 class="my-2">{{$practiceSet['title']}}</h4>
                    <h6>Question <span id="current_ques">1</span>/{{$total}}</h6>
                </div>
                <div class="d-md-flex d-none">
                    <button class="btn shadow-sm mx-1 btn-sm report_issue bg_label_success" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Report an Issue"><i class="fa-regular fa-flag"></i> Report</button>
                    <a class="btn shadow-sm mx-1 btn-sm bg_label_warning" href="{{route('get_practice_session_analysis', ['practiceSet' => $practiceSet['slug'], 'session' => $session['code']])}}" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Pause Session"><i class="fa-regular fa-circle-pause"></i>&nbsp;Pause</a>
                    <button class="btn shadow-sm mx-1 btn-sm bg_label_danger" id="exitExam" data-bs-toggle="modal" data-bs-target="#finishTest"><i class="fa-solid fa-right-from-bracket"></i> End</button>
                    <button class="btn shadow-sm mx-1 btn-sm bg_label_primary me-2" id="fullscreenMode" onclick="Fullscreen()"><i class="fa-solid fa-expand"></i></button>
                </div>
                <div class="dropdown d-md-none d-inline-block">
                    <button class="btn border-0 shadow-none" id="menu_sm" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-bars"></i>
                    </button>
                    <div class="dropdown-menu dropdown_shadow border-0" aria-labelledby="menu_sm">
                        <a class="dropdown-item small py-2 cursor-pointer" id="fullscreenMode" onclick="Fullscreen()">
                            <i class="fa-solid fa-expand me-1"></i>FullScreen Mode
                        </a>
                        <a class="dropdown-item small py-2" href="{{route('get_practice_session_analysis', ['practiceSet' => $practiceSet['slug'], 'session' => $session['code']])}}">
                            <i class="fa-regular fa-circle-pause me-1"></i>
                            Pause Session
                        </a>
                        <a class="dropdown-item small py-2 report_issue cursor-pointer">
                            <i class="fa-regular fa-flag me-1"></i>
                            Report an Issue
                        </a>
                        <a class="dropdown-item small py-2 cursor-pointer" id="exitExam" data-bs-toggle="modal" data-bs-target="#finishTest">
                            <i class="fa-solid fa-right-from-bracket me-1"></i>
                            End Session
                        </a>
                    </div>
                </div>
            </div>
            <div class="progress">
                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
            </div>
        </div>
        <div class="vh-100 overflow-auto container-fluid main_content m-auto">
            @foreach($questions as $key => $question)
                <div class="my-4 question_content
                    @if($answered > 0 && $answered < $total)
                        @if($key == $answered)
                            active
                        @endif
                    @else
                        @if($key <= 0)
                            active
                        @endif
                    @endif
                " data-index="{{++$key}}" data-id="{{$question['id']}}" data-type="{{$question['questionType']}}" data-code="{{$question['code']}}">
                    <div class="my-2 d-flex align-items-center justify-content-between h6">
                        <div>
                            <span class="fw-semibold">Q{{$key}} of {{$total}}</span>
                            <span class="fw-normal text-uppercase ms-1"> | {{$question['skill']}}</span>
                        </div>
                        
                        @if($question['comprehension'])
                            <button class="btn btn-outline-danger btn-sm ms-2" data-bs-toggle="modal" data-bs-target="#comprehension_{{$question['code']}}"><i class="fa fa-eye"></i> Comprehension</button>
                        @else
                            <div style="height:1px;width:1px;"></div>
                        @endif
                    </div>
                    <div class="question_title_container fw-semibold h5 my-4">
                        {!! $question['question'] !!}
                    </div>
                    <div class="d-inline-block font-size-14 fw-semibold my-2 notice py-1 rounded text-uppercase">
                        @switch($question['questionType'])
                            @case('MSA')
                                Choose one option
                                @break
                            @case('MMA')
                                Choose multiple option
                                @break
                            @case('TOF')
                                Choose one option
                                @break
                            @case('SAQ')
                                Type your answer in the below text box
                                @break
                            @case('MTF')
                                Match the following by drag and drop right side items
                                @break
                            @case('ORD')
                                Arrange the following in order by drag and drop the items
                                @break
                            @case('FIB')
                                Fill the blanks in the below text boxes
                                @break
                        @endswitch
                    </div>
                    <div class="answer_wrap
                        @if($question['questionType'] == 'MTF')
                            row
                        @endif
                    ">
                        @switch($question['questionType'])
                            @case('MSA')
                                @foreach($question['options'] as $oKey => $option)
                                    <div class="border border-2 input-group my-2 p-3 py-2 rounded-4 animate__animated animate__fadeInRight animate__slow
                                        @if($question['status'] != 'answered')
                                            MSA_inp_wrap cursor-pointer
                                        @endif
                                        @if(++$oKey == $question['user_answer'] || $oKey == $question['ca'])
                                            @if(!$question['is_correct'])
                                                @if($oKey == $question['user_answer'])
                                                    border-danger bg-danger
                                                @elseif($oKey == $question['ca'])
                                                    border-success bg-success
                                                @endif
                                            @else
                                                border-success bg-success
                                            @endif
                                        @else
                                            border-primary
                                        @endif
                                    ">
                                        <span class="bg-opacity-10 border-0 fw-semibold input-group-text align-self-center p-0 px-2 rounded-circle small">{{$oKey}}</span>
                                        <div class="bg-transparent border-0 form-control ms-1 shadow-none MSA_inp select_wrap
                                            @if($oKey == $question['user_answer'] || $oKey == $question['ca'])
                                                text-white
                                            @endif
                                        " data-id="{{$oKey}}">{!! $option !!}</div>
                                    </div>
                                @endforeach
                                @if($question['status'] == 'answered')
                                    <div class="alert alert-success border border-2 border-success my-3 rounded-4 text-dark">
                                        <i class="fa fa-bolt-lightning me-2 text-success"></i>
                                        Correct option is {{$question['ca']}}
                                    </div>
                                @endif
                                @break
                            @case('MMA')
                                @foreach($question['options'] as $oKey => $option)
                                    <div class="border border-2 input-group my-2 p-3 py-2 rounded-4 animate__animated animate__fadeInRight animate__slow
                                        @if($question['status'] != 'answered')
                                            MMA_inp cursor-pointer
                                        @endif
                                        @if(in_array(++$oKey, $question['user_answer']))
                                            @if(in_array($oKey, $question['ca']))
                                                border-success bg-success
                                            @else
                                                border-danger bg-danger
                                            @endif
                                        @else
                                            border-primary
                                        @endif
                                    ">
                                        <span class="bg-opacity-10 border-0 fw-semibold input-group-text align-self-center p-0 px-2 rounded-circle small
                                            @if(in_array($oKey, $question['user_answer']))
                                                bg-light
                                            @endif
                                        ">{{$oKey}}</span>
                                        <div class="bg-transparent border-0 form-control ms-1 shadow-none select_wrap
                                            @if(in_array($oKey, $question['user_answer']))
                                                text-white
                                            @endif
                                        " data-id="{{$oKey}}">{!! $option !!}</div>
                                    </div>
                                @endforeach
                                @if($question['status'] == 'answered')
                                    <div class="alert alert-success border border-2 border-success my-3 rounded-4 text-dark">
                                        <i class="fa fa-bolt-lightning me-2 text-success"></i>
                                        Correct options are {{ implode(', ', $question['ca']) }}
                                    </div>
                                @endif
                                @break
                            @case('TOF')
                                @foreach($question['options'] as $oKey => $option)
                                    @php
                                        ++$oKey;
                                    @endphp
                                    <div class="border border-2 border-primary input-group my-2 p-3 py-2 rounded-4 animate__animated animate__fadeInRight animate__slow
                                        @if($question['status'] != 'answered')
                                            MSA_inp_wrap cursor-pointer border-primary
                                        @else
                                            @if($oKey == $question['user_answer'] || $oKey == $question['ca'][0])
                                                @if(!$question['is_correct'])
                                                    @if($oKey == $question['user_answer'])
                                                        border-danger bg-danger
                                                    @elseif($oKey == $question['ca'][0])
                                                        border-success bg-success
                                                    @endif
                                                @else
                                                    border-success bg-success
                                                @endif
                                            @else
                                                border-primary
                                            @endif
                                        @endif
                                    ">
                                        <span class="bg-opacity-10 border-0 fw-semibold input-group-text align-self-center p-0 px-2 rounded-circle small">{{$oKey}}</span>
                                        <div class="bg-transparent border-0 form-control ms-1 shadow-none MSA_inp select_wrap
                                        @if($question['status'] == 'answered')
                                            @if($oKey == $question['user_answer'] || $oKey == $question['ca'][0])
                                                text-white
                                            @endif
                                        @endif 
                                        " data-id="{{$oKey}}">{!! $option !!}</div>
                                    </div>
                                @endforeach
                                @if($question['status'] == 'answered')
                                    <div class="alert alert-success border border-2 border-success my-3 rounded-4 text-dark">
                                        <i class="fa fa-bolt-lightning me-2 text-success"></i>
                                        Correct option is {{$question['ca'][0]}}
                                    </div>
                                @endif
                                @break
                            @case('SAQ')
                                <div class="border border-2 input-group my-2 p-3 py-2 rounded-4 animate__animated animate__fadeInRight animate__slow border-primary
                                    @if($question['status'] == 'answered')
                                        @if($question['is_correct'])
                                            border-success bg-success
                                        @else
                                            border-danger bg-danger
                                        @endif
                                    @endif
                                ">
                                    <span class="bg-opacity-10 border-0 fw-semibold input-group-text align-self-center p-0 px-2 rounded-circle small">1</span>
                                    @if($question['status'] != 'answered')
                                        <input type="text" class="answer_inp bg-transparent border-0 form-control ms-1 shadow-none" placeholder="Type your answer">
                                    @else
                                        <div class="bg-transparent border-0 form-control ms-1 shadow-none text-white">{{$question['user_answer']}}</div>
                                    @endif
                                </div>
                                @if($question['status'] == 'answered' && !$question['is_correct'])
                                    <div class="alert alert-success border border-2 border-success my-3 rounded-4 text-dark">
                                        <i class="fa fa-bolt-lightning me-2 text-success"></i>
                                        Acceptable answers are: 
                                        @foreach($question['ca'] as $key => $answer)
                                            {{$answer}}@if(++$key < count($question['ca'])),@endif
                                        @endforeach
                                    </div>
                                @endif
                                @break
                            @case('MTF')
                                <div class="col-6">
                                    @foreach($question['options']['matches'] as $mKey => $match)
                                        <div class="border border-2 border-primary input-group my-2 p-3 py-2 rounded-4 animate__animated animate__fadeInLeft animate__slow">
                                            <span class="bg-opacity-10 border-0 fw-semibold input-group-text align-self-center p-0 px-2 rounded-circle small">{{++$mKey}}</span>
                                            <div class="bg-transparent border-0 form-control ms-1 shadow-none" data-id="{{$mKey}}" data-match_id="{{$match['id']}}">{!! $match['value'] !!}</div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="col-6 drop">
                                    @if($question['status'] != 'answered')
                                        <div class="drop_container" id="drop_items_{{$question['code']}}">
                                            @foreach($question['options']['pairs'] as $pKey => $pair)
                                                <div class="border border-2 border-primary input-group my-2 p-3 py-2 rounded-4 bg-white drop_card animate__animated animate__fadeInRight animate__slow" ondragend="drop(event)">
                                                    <span class="bg-opacity-10 border-0 fw-semibold input-group-text align-self-center p-0 px-2 rounded-2 small"><span class="MTF_index me-1">{{++$pKey}} </span> - {{$pair['code']}}</span>
                                                    <div class="bg-transparent border-0 form-control ms-1 shadow-none" data-id="{{$pKey}}" data-match_id="{{$pair['id']}}" data-match_code="{{$pair['code']}}">{!! $pair['value'] !!}</div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @else
                                        @foreach($question['user_answer'] as $pKey => $pair)
                                            <div class="input-group my-2 p-3 py-2 rounded-4 border border-2 animate__animated animate__fadeInRight animate__slow
                                                @if($pair['id'] == $question['ca'][$pKey])
                                                    bg-success border-success
                                                @else
                                                    bg-danger border-danger
                                                @endif
                                            ">
                                                <span class="bg-opacity-10 border-0 fw-semibold input-group-text align-self-center p-0 px-2 rounded-2 small bg-light">{{++$pKey}} - {{$pair['code']}}</span>
                                                <div class="bg-transparent border-0 form-control ms-1 shadow-none text-white">{!! $pair['value'] !!}</div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                                @if($question['status'] == 'answered' && !$question['is_correct'])
                                    <div class="alert alert-success border border-2 border-success my-3 rounded-4 text-dark">
                                        <i class="fa fa-bolt-lightning me-2 text-success"></i>
                                        Correct sequence is 
                                        @foreach($question['ca'] as $key => $answer)
                                            @foreach($question['user_answer'] as $pair)
                                                @if($answer === $pair['id'])
                                                    {{$pair['code']}}@if(++$key < count($question['ca'])), @endif
                                                @endif
                                            @endforeach
                                        @endforeach
                                    </div>
                                @endif
                                @break
                            @case('ORD')
                                <div class="drop">
                                    @if($question['status'] != 'answered')
                                        <div class="drop_container" id="drop_items_{{$question['code']}}">
                                            @foreach($question['options'] as $oKey => $option)
                                                <div class="border border-2 border-primary input-group my-2 p-3 py-2 rounded-4 bg-white drop_card animate__animated animate__fadeInRight animate__slow" ondragend="drop(event)">
                                                    <span class="bg-opacity-10 border-0 fw-semibold input-group-text align-self-center p-0 px-2 rounded-2 small"><span class="MTF_index me-1">{{++$oKey}} </span> - {{$option['code']}}</span>
                                                    <div class="bg-transparent border-0 form-control ms-1 shadow-none" data-id="{{$oKey}}" data-match_id="{{$option['id']}}" data-match_code="{{$option['code']}}">{!! $option['value'] !!}</div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @else
                                        @foreach($question['user_answer'] as $pKey => $pair)
                                            <div class="input-group my-2 p-3 py-2 rounded-4 border border-2 animate__animated animate__fadeInRight animate__slow
                                                @if($pair['id'] == $question['ca'][$pKey])
                                                    bg-success border-success
                                                @else
                                                    bg-danger border-danger
                                                @endif
                                            ">
                                                <span class="bg-opacity-10 border-0 fw-semibold input-group-text align-self-center p-0 px-2 rounded-2 small bg-light">{{++$pKey}} - {{$pair['code']}}</span>
                                                <div class="bg-transparent border-0 form-control ms-1 shadow-none text-white">{!! $pair['value'] !!}</div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                                @if($question['status'] == 'answered' && !$question['is_correct'])
                                    <div class="alert alert-success border border-2 border-success my-3 rounded-4 text-dark">
                                        <i class="fa fa-bolt-lightning me-2 text-success"></i>
                                        Correct sequence is 
                                        @foreach($question['ca'] as $key => $answer)
                                            @foreach($question['user_answer'] as $pair)
                                                @if($answer === $pair['id'])
                                                    {{$pair['code']}}@if(++$key < count($question['ca'])), @endif
                                                @endif
                                            @endforeach
                                        @endforeach
                                    </div>
                                @endif
                                @break
                            @case('FIB')
                                @if($question['status'] == 'answered')
                                    <!-- <div>`+options.join("")+anwerwrap+`</div> -->
                                    @foreach($question['user_answer'] as $key => $answer)
                                        <div class="border border-2 text-white shadow-sm input-group my-2 p-3 py-2 rounded-4 align-items-center font-size-14
                                        @if(strtolower($answer) == strtolower($question['ca'][$key]))
                                            border-success bg-success
                                        @else
                                            border-danger bg-danger
                                        @endif
                                        ">
                                            <span class="align-self-center bg-opacity-10 border-0 fw-semibold input-group-text p-0 px-2 rounded-circle me-2">{{++$key}}</span> 
                                            {{$answer}}
                                        </div>
                                    @endforeach
                                    <div class="alert alert-success border border-2 border-success my-3 rounded-4 text-dark"><i class="fa fa-bolt-lightning me-2 text-success"></i>
                                        @if(count($question['ca']) > 1)
                                            Correct answers for the blanks are 
                                        @else
                                            Correct answer for the blank is
                                        @endif
                                        @foreach($question['ca'] as $key => $answer)
                                            {!! $answer !!}@if(++$key < count($question['ca'])), @endif
                                        @endforeach
                                    </div>
                                @else
                                    @for($i = 0; $i < $question['options']; $i++)
                                        <div class="border border-2 border-primary input-group my-2 p-3 py-2 rounded-4 animate__animated animate__fadeInRight animate__slow">
                                            <span class="bg-opacity-10 border-0 fw-semibold input-group-text align-self-center p-0 px-2 rounded-circle small">{{$i + 1}}</span>
                                            <input type="text" class="answer_inp bg-transparent border-0 form-control ms-1 shadow-none" placeholder="Type your answer for blank {{$i + 1}}">
                                        </div>
                                    @endfor
                                @endif
                                @break
                        @endswitch
                    </div>
                    <div class="modal fade" id="wrong_ques{{$question['id']}}" aria-labelledby="modalToggleLabel" tabindex="-1" style="display: none;" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-centered">
                            <div class="modal-content rounded-0 shadow border-0">
                                <div class="modal_loader align-items-center bg-opacity-50 bg-white bottom-0 end-0 h-100 justify-content-center left-0 position-absolute top-0 w-100 z-index-5">
                                    <div class="spinner-border text-success" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                </div>
                                <div class="modal_header p-3">
                                    <div class="text-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 24 24"
                                            style="fill: #fff;">
                                            <path
                                                d="M16 2H8C4.691 2 2 4.691 2 8v13a1 1 0 0 0 1 1h13c3.309 0 6-2.691 6-6V8c0-3.309-2.691-6-6-6zm4 14c0 2.206-1.794 4-4 4H4V8c0-2.206 1.794-4 4-4h8c2.206 0 4 1.794 4 4v8z">
                                            </path>
                                            <path d="M7 14.987v1.999h1.999l5.529-5.522-1.998-1.998zm8.47-4.465-1.998-2L14.995 7l2 1.999z">
                                            </path>
                                        </svg>
                                    </div>
                                    <button class="btn modal_dissmiss_btn bg-transparent border-0 rounded-0 shadow-none"
                                        data-bs-dismiss="modal" aria-label="Close">
                                        <i class="fa-solid fa-xmark text-white fs-5"></i>
                                    </button>
                                </div>
                                <div class="modal_body p-3">
                                    <h2 class="my-3 text-center text-capitalize">Anomalies & Feedback</h2>
                                    <div class="form-floating">
                                        <textarea class="form-control message_description_input shadow-none border" placeholder="Write Message" id="message_{{$question['id']}}"></textarea>
                                        <label for="message_{{$question['id']}}" class="text-dark text-uppercase">Description</label>
                                    </div>
                                    <div class="text-end my-3">
                                        <div id="query_error_{{$question['id']}}" class="my-2 small text-danger"></div>
                                        <button class="btn btn-success submit_question_issue" data-id="{{$question['id']}}">Message</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="comprehension_{{$question['code']}}" aria-labelledby="modalToggleLabel" tabindex="-1" style="display: none;" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-lg">
                            <div class="modal-content rounded-0 shadow">
                                <div class="modal-header">
                                    <h2 class="h5 modal-title text-dark text-uppercase" id="modalToggleLabel">Comprehension passage</h2>
                                    <button    class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body" id='comprehension_body'>{!! $question['comprehension'] !!}</div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="bg-white shadow fixed-bottom px-2 py-3">
            <div id="move_question" class="d-flex justify-content-between m-auto">
                <button id="prev" class="btn btn-primary d-flex align-items-center mx-1">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" style="width: 20px;" class="me-1"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Previous
                </button>
                <button id="next" class="btn btn-primary d-flex align-items-center mx-1">
                    Next
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" style="width: 20px;" class="ms-1"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </button>
                <button id="finish" class="btn btn-primary d-flex align-items-center mx-1 d-none">
                    Finish
                </button>
                <button id="submit" class="btn btn-primary text-capitalize text-white px-4 d-none">
                    Submit
                </button>
            </div>
        </div>
        <div class="modal fade" id="finishTest" tabindex="-1" aria-labelledby="finishTestLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content p-3 py-4 shadow border-0">
                    <div class="modal-body">
                        <div class="my-3 text-center">
                            <img src="{{ url('images/end_session_image.webp') }}" height="auto" width="100%" alt="an illusrtation of students finishing session in TutorsElevenPlus">
                        </div>
                        <h2 class="h3 my-2 text-center text-uppercase">Ready to wrap up?</h2>
                        <p class="my-2 text-center fs-5">Confirm if you're sure about ending the session. Appreciate your participation!</p>
                    </div>
                    <div class="align-items-center d-flex justify-content-center">
                        <button class="btn btn-outline-danger mx-2 p-2 px-4" data-bs-dismiss="modal">Not Sure</button>
                        <button class="btn btn-outline-success mx-2 p-2 px-4 finish" id="finish">End Session</button>                                
                    </div>
                </div>
            </div>
        </div>
        <div class="vh-100 w-100 submit_loading position-fixed top-0 bottom-0 d-none start-0 end-0 text-white">
            <div class="h-100 w-100 d-flex justify-content-center align-items-center">
                <div class="spinner-grow text-primary" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
        <script>
            let ques_answered = {!! str_replace("'", "\'", json_encode($answered)) !!};
            let ques_total = {!! str_replace("'", "\'", json_encode($total)) !!};
            let totalTimeTaken = {!! str_replace("'", "\'", json_encode($session['total_time_taken'])) !!};
            var time = 0;
            updateProgressBar(ques_answered, ques_total);
            currentQuestionIndex();
            startTimer();
            $("#prev").click(function(){
                $("#finish").addClass("d-none");
                if($(".question_content.active").prev().length > 0) {
                    $("#next").removeClass("d-none");
                    $("#submit").addClass("d-none");
                    $(".question_content.active").removeClass("active").prev().addClass("active");
                    currentQuestionIndex();
                    stopTimer();
                }
            });
            $("#next").click(function(){
                $("#submit").addClass("d-none");
                if($(".question_content.active").next().length) {
                    $(".question_content.active").removeClass("active").next().addClass("active");
                    currentQuestionIndex();
                    stopTimer();
                }
                if($(".question_content.active").next().length <= 0) {
                    $(this).addClass("d-none");
                    $("#finish").removeClass("d-none");
                }
            });
            $(document).on('click', '#submit', function(){
                loader_on();
                switch(activeQuesType()) {
                    case "MSA":
                        let MSA_answer = $(".question_content.active").find(".MSA_inp.active").data("id");
                        submitMSA(MSA_answer);
                        break;
                    case "MMA":
                        let MMA_answer = [];
                        $(".question_content.active").find(".MMA_inp").each(function(i) {
                            let active = $(this).hasClass("active");
                            if(active){
                                MMA_answer.push(++i);
                            }
                        });
                        submitMMA(MMA_answer);
                        break;
                    case "TOF":
                        let TOF_answer = $(".question_content.active").find(".MSA_inp.active").data("id")
                        submitTOF(TOF_answer);
                        break;
                    case "SAQ":
                        let value = $(".question_content.active").find(".answer_inp").val();
                        submitSAQ(escapeHtmlEntities(value));
                        break;
                    case "MTF":
                        let MTF_answer = [];
                        $(".question_content.active").find(".drop_card").each(function(i) {
                            let id = $(this).find(".form-control").data("match_id");
                            let code = $(this).find(".form-control").data("match_code");
                            let value = $(this).find(".form-control").text();
                            MTF_answer.push({id: id, value: value, code: code});
                        });
                        submitMTF(MTF_answer);
                        break;
                    case "ORD":
                        let ORD_answer = [];
                        $(".question_content.active").find(".drop_card").each(function(i) {
                            let id = $(this).find(".form-control").data("match_id");
                            let code = $(this).find(".form-control").data("match_code");
                            let value = $(this).find(".form-control").text();
                            ORD_answer.push({id: id, value: value, code: code});
                        });
                        submitORD(ORD_answer);
                        break;
                    case "FIB":
                        var myArray = [];
                        $(".question_content.active").find(".answer_inp").each(function(i){
                            myArray.push(escapeHtmlEntities($(this).val()));
                        });
                        submitFIB(myArray);
                        break;
                    // Additional cases as needed
                }
            });
            $(document).on('click', '#finish, .finish', function(){
                loader_on();
                $.ajax({
                    type: "POST",
                    url: "{{route('finish_practice_session', ['practiceSet' => $practiceSet['slug'], 'session' => $session['code']])}}",
                    data: {
                        replace: true,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        if(data){
                            window.location.href = "{{route('get_practice_session_analysis', ['practiceSet' => $practiceSet['slug'], 'session' => $session['code']])}}";
                        }
                    },
                    error: function(data, textStatus, errorThrown) {
                    },
                });
            });
            $(".report_issue").click(function(){
                let id = activeQuesId();
                $('#wrong_ques'+id).modal('show');
            });
            $(document).on('click', '.MSA_inp_wrap', function(){
                let type = activeQuesType();
                $(this).addClass('bg-success border-success').removeClass('border-primary');
                $(this).find(".MSA_inp").addClass('active text-white');
                $(this).siblings().find(".MSA_inp").removeClass('active text-white');
                $(this).siblings().removeClass('bg-success border-success').addClass('border-primary');
                showSubmitBtn();
            });
            $(document).on('click', '.MMA_inp', function(){
                if($(this).hasClass("active")){
                    $(this).removeClass("border-success bg-success").addClass("border-primary");
                    $(this).find("span").removeClass("bg-light");
                    $(this).find("div").removeClass("text-white");
                } else {
                    $(this).removeClass("border-primary").addClass("border-success bg-success");
                    $(this).find("span").addClass("bg-light");
                    $(this).find("div").addClass("text-white");
                }
                $(this).toggleClass("active");
                showSubmitBtn();
            });
            $(document).on('click', '.submit_question_issue', function(){
                let _this = $(this);
                let id = $(this).data("id");
                let message = $("#message_"+id).val();
                if(message){
                    let modal_loader = $(".modal_loader").fadeIn();
                    $(".modal_loader").css({'display' : 'flex'});
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
                                setTimeout(function() {
                                    $("#query_error_"+id).text("");
                                    let modal_loader = $(".modal_loader").fadeOut();
                                    let tab = `<div class="modal_header p-2 py-4"><div class="text-center"><svg width="100" height="100" viewBox="0 0 133 133" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="check-group" stroke="#fff" stroke-width="4" fill="transparent" fill-rule="evenodd"><circle id="filled-circle" fill="none" cx="66.5" cy="66.5" r="54.5" /><circle id="white-circle" fill="#FFFFFF" cx="66.5" cy="66.5" r="55.5" /><circle id="outline" stroke="none" stroke-width="4" cx="66.5" cy="66.5" r="54.5" /><polyline id="check" stroke="#FFFFFF" stroke-width="5.5" points="41 70 56 85 92 49" /></g></svg></div><button class="btn modal_dissmiss_btn bg-transparent border-0 rounded-0 shadow-none" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-xmark text-white fs-5"></i></button></div><div class="modal_body p-2 py-4"><h2 class="h1 mb-2 my-3 text-center text-capitalize">Great!</h2><p class="fs_md mb-4 mt-3 text-center">Thanks for your feedback! Our team will now review it and address issues promptly.</p></div>`
                                    _this.parents('.modal-content').empty().append(tab);
                                }, 1500);
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
            $(document).on('keyup', '.answer_inp', function(){
                var myArray = [];
                $(".question_content.active").find(".answer_inp").each(function(i){
                    myArray.push($(this).val());
                });
                if(checkEmptyVal(myArray)) {
                    showSubmitBtn();
                }
                // else if (!checkEmptyVal(myArray)){
                //     $("#next").removeClass("d-none");
                //     $("#finish").removeClass("d-none");
                //     $("#submit").remove();
                // }
            });
            function currentQuestionIndex() {
                $("#current_ques").text($(".question_content.active").data("index"));
            }
            function updateProgressBar(answered, total) {
                let total_percentage = (answered / total) * 100;
                $(".progress-bar").attr("aria-valuenow", total_percentage);
                $(".progress-bar").css('width', total_percentage+'%')
            }
            function Fullscreen(){
                var element = document.documentElement;
                if (document.fullscreenElement || document.webkitFullscreenElement || document.mozFullScreenElement || document.msFullscreenElement) {
                    exitFullscreen();
                } else {
                    if (element.requestFullscreen) {
                        element.requestFullscreen();
                    } else if (element.webkitRequestFullscreen) {
                        element.webkitRequestFullscreen();
                    } else if (element.mozRequestFullScreen) {
                        element.mozRequestFullScreen();
                    } else if (element.msRequestFullscreen) {
                        element.msRequestFullscreen();
                    }
                }
            }
            function exitFullscreen(){
                if (document.exitFullscreen) {
                    document.exitFullscreen();
                } else if (document.webkitExitFullscreen) {
                    document.webkitExitFullscreen();
                } else if (document.mozCancelFullScreen) {
                    document.mozCancelFullScreen();
                } else if (document.msExitFullscreen) {
                    document.msExitFullscreen();
                }
            }
            function loader_on(){
                $(".submit_loading").removeClass("d-none");
                $(".submit_loading").addClass("screen_locked");
            }
            function loader_off(){
                $(".submit_loading").addClass("d-none");
                $(".submit_loading").removeClass("screen_locked");
            }
            function submitMSA(answer){
                $.ajax({
                    type: "POST",
                    url: "{{route('check_practice_answer', ['practiceSet' => $practiceSet['slug'], 'session' => $session['code']])}}",
                    data: {
                        question_id: activeQuesCode(),
                        time_taken: time,
                        total_time_taken: totalTimeTaken,
                        user_answer: answer,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        updateProgressBar(data.answered, data.total);
                        if(!data.is_correct){
                            $(".question_content.active").find(".MSA_inp_wrap").each(function(i){
                                if(++i == data.ca){
                                    $(this).addClass('bg-success border-success').removeClass('border-primary').find(".MSA_inp").addClass('text-white');
                                }
                            });
                            $(".MSA_inp.active").parent().removeClass('bg-success border-success').addClass('bg-danger border-danger');
                            $(".question_content.active").find(".answer_wrap").append('<div class="alert alert-success border border-2 border-success my-3 rounded-4 text-dark"><i class="fa fa-bolt-lightning me-2 text-success"></i>Correct option is '+data.ca+'</div>');
                        }
                        $(".question_content.active").find(".notice").remove();
                        $(".question_content.active").find(".MSA_inp_wrap").removeClass("MSA_inp_wrap cursor-pointer");
                        $(".question_content.active").find(".MSA_inp").removeClass("MSA_inp active cursor-pointer");
                        stopTimer();
                        showNextBtn();
                        loader_off();
                    },
                    error: function(data, textStatus, errorThrown) {
                    },
                });
            }
            function submitMMA(answer){
                $.ajax({
                    type: "POST",
                    url: "{{route('check_practice_answer', ['practiceSet' => $practiceSet['slug'], 'session' => $session['code']])}}",
                    data: {
                        question_id: activeQuesCode(),
                        time_taken: time,
                        total_time_taken: totalTimeTaken,
                        user_answer: answer,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        console.log(data, answer);
                        updateProgressBar(data.answered, data.total);
                        $(".question_content.active").find(".MMA_inp").removeClass("active");
                        if(!data.is_correct){
                            answer.forEach(function(answer, i){
                                let option = answer - 1;
                                if(data.ca.includes(answer.toString())){
                                    $(".question_content.active").find(".MMA_inp").eq(option).removeClass("border-primay").addClass("border-success bg-success correct")
                                    $(".question_content.active").find(".MMA_inp").eq(option).find(".select_wrap").addClass("text-white");
                                    $(".question_content.active").find(".MMA_inp").eq(option).find("span").addClass("bg-light");
                                } else {
                                    $(".question_content.active").find(".MMA_inp").eq(option).removeClass("border-primay").addClass("border-danger bg-danger incorrect")
                                    $(".question_content.active").find(".MMA_inp").eq(option).find(".select_wrap").addClass("text-white");
                                    $(".question_content.active").find(".MMA_inp").eq(option).find("span").addClass("bg-light");
                                }
                            });
                        }
                        $(".question_content.active").find(".MMA_inp").removeClass("MMA_inp cursor-pointer");
                        let tab = `<div class="alert alert-success border border-2 border-success my-3 rounded-4 text-dark"><i class="fa fa-bolt-lightning me-2 text-success"></i>Correct options are  `+data.ca.join(", ")+`</div>`;
                        $(".question_content.active").find(".answer_wrap").append(tab);
                        stopTimer();
                        showNextBtn();
                        loader_off();
                    },
                    error: function(data, textStatus, errorThrown) {
                    },
                });
            }
            function submitTOF(answer){
                $.ajax({
                    type: "POST",
                    url: "{{route('check_practice_answer', ['practiceSet' => $practiceSet['slug'], 'session' => $session['code']])}}",
                    data: {
                        question_id: activeQuesCode(),
                        time_taken: time,
                        total_time_taken: totalTimeTaken,
                        user_answer: answer,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        console.log(data);
                        updateProgressBar(data.answered, data.total);
                        if(!data.is_correct){
                            $(".question_content.active").find(".MSA_inp_wrap").each(function(i){
                                if(++i == data.ca){
                                    $(this).addClass('bg-success border-success').removeClass('border-primary').find(".MSA_inp").addClass('text-white');
                                }
                            });
                            $(".MSA_inp.active").parent().removeClass('bg-success border-success').addClass('bg-danger border-danger');
                            $(".question_content.active").find(".answer_wrap").append('<div class="alert alert-success border border-2 border-success my-3 rounded-4 text-dark"><i class="fa fa-bolt-lightning me-2 text-success"></i>Correct option is '+data.ca+'</div>');
                        }
                        $(".question_content.active").find(".notice").remove();
                        $(".question_content.active").find(".MSA_inp_wrap").removeClass("MSA_inp_wrap cursor-pointer");
                        $(".question_content.active").find(".MSA_inp").removeClass("MSA_inp active cursor-pointer");
                        stopTimer();
                        showNextBtn();
                        loader_off();
                    },
                    error: function(data, textStatus, errorThrown) {
                    },
                });
            }
            function submitSAQ(answer){
                $.ajax({
                    type: "POST",
                    url: "{{route('check_practice_answer', ['practiceSet' => $practiceSet['slug'], 'session' => $session['code']])}}",
                    data: {
                        question_id: activeQuesCode(),
                        time_taken: time,
                        total_time_taken: totalTimeTaken,
                        user_answer: answer,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        if(data){
                            updateProgressBar(data.answered, data.total);
                            var tab, correctAnswers = "";
                            if(data.is_correct){
                                tab = `<div class="border border-2 border-success bg-success input-group my-2 p-3 py-2 rounded-4">
                                    <span class="bg-opacity-10 border-0 fw-semibold input-group-text align-self-center p-0 px-2 rounded-circle small">1</span>
                                    <div class="bg-transparent border-0 form-control ms-1 shadow-none text-white">`+answer+`</div>
                                </div>`
                            } else {
                                tab = `<div class="border border-2 border-danger bg-danger input-group my-2 p-3 py-2 rounded-4">
                                    <span class="bg-opacity-10 border-0 fw-semibold input-group-text align-self-center p-0 px-2 rounded-circle small">1</span>
                                    <div class="bg-transparent border-0 form-control ms-1 shadow-none text-white">`+answer+`</div>
                                </div>`
                                correctAnswers = '<div class="alert alert-success border border-2 border-success my-3 rounded-4 text-dark"><i class="fa fa-bolt-lightning me-2 text-success"></i>Acceptable answers are: '+data.ca.join(", ")+' </div>';
                            }
                            $(".question_content.active").find(".answer_wrap").empty().append(tab+correctAnswers);
                            stopTimer();
                            showNextBtn();
                            loader_off();
                        }
                    },
                    error: function(data, textStatus, errorThrown) {
                    },
                });
            }
            function submitMTF(answer){
                $.ajax({
                    type: "POST",
                    url: "{{route('check_practice_answer', ['practiceSet' => $practiceSet['slug'], 'session' => $session['code']])}}",
                    data: {
                        question_id: activeQuesCode(),
                        time_taken: time,
                        total_time_taken: totalTimeTaken,
                        user_answer: answer,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        updateProgressBar(data.answered, data.total);
                        let matches = "";
                        $(".question_content.active").find(".notice").remove();
                        answer.forEach(function(match, i) {
                            let index = i+1;
                            if(answer[i].id == data.ca[i]){
                                matches +=  `<div class="input-group my-2 p-3 py-2 rounded-4 bg-success border border-2 border-success">
                                            <span class="bg-opacity-10 border-0 fw-semibold input-group-text align-self-center p-0 px-2 rounded-2 small bg-light">`+index+` - `+match.code+`</span>
                                            <div class="bg-transparent border-0 form-control ms-1 shadow-none text-white" data-id="`+index+`" data-match_id=`+match.id+`>`+match.value+`</div>
                                        </div>`;
                            } else {
                                matches +=  `<div class="input-group my-2 p-3 py-2 rounded-4 bg-danger border border-2 border-danger">
                                            <span class="bg-opacity-10 border-0 fw-semibold input-group-text align-self-center p-0 px-2 rounded-2 small bg-light">`+index+` - `+match.code+`</span>
                                            <div class="bg-transparent border-0 form-control ms-1 shadow-none text-white" data-id="`+index+`" data-match_id=`+match.id+`>`+match.value+`</div>
                                        </div>`;
                            }
                        });
                        if(!data.is_correct){
                            let correct_answers = "";
                            data.ca.forEach(function(answer, i) {
                                index = 1 + i;
                                coma = "";
                                if(index < data.ca.length){
                                    coma = ", ";
                                }
                                correct_answers += $(".question_content.active").find(".drop_container").find(".form-control[data-match_id="+answer+"]").data("match_code") + coma;
                            })
                            $(".question_content.active").find(".answer_wrap").append(`<div class="alert alert-success border border-2 border-success my-3 rounded-4 text-dark"><i class="fa fa-bolt-lightning me-2 text-success"></i>Correct sequence is `+correct_answers+`</div>`);
                        }
                        $(".question_content.active").find(".drop").empty().append(matches);
                        stopTimer();
                        showNextBtn();
                        loader_off();
                    },
                    error: function(data, textStatus, errorThrown) {
                    },
                });
            }
            function submitORD(answer){
                $.ajax({
                    type: "POST",
                    url: "{{route('check_practice_answer', ['practiceSet' => $practiceSet['slug'], 'session' => $session['code']])}}",
                    data: {
                        question_id: activeQuesCode(),
                        time_taken: time,
                        total_time_taken: totalTimeTaken,
                        user_answer: answer,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        updateProgressBar(data.answered, data.total);
                        let matches = "";
                        $(".question_content.active").find(".notice").remove();
                        answer.forEach(function(match, i) {
                            let index = i+1;
                            if(answer[i].id == data.ca[i]){
                                matches +=  `<div class="input-group my-2 p-3 py-2 rounded-4 bg-success border border-2 border-success">
                                            <span class="bg-opacity-10 border-0 fw-semibold input-group-text align-self-center p-0 px-2 rounded-2 bg-light small">`+index+` - `+match.code+`</span>
                                            <div class="bg-transparent border-0 form-control ms-1 shadow-none text-white" data-id="`+index+`" data-match_id=`+match.id+`>`+match.value+`</div>
                                        </div>`;
                            } else {
                                matches +=  `<div class="input-group my-2 p-3 py-2 rounded-4 bg-danger border border-2 border-danger">
                                            <span class="bg-opacity-10 border-0 fw-semibold input-group-text align-self-center p-0 px-2 rounded-2 bg-light small">`+index+` - `+match.code+`</span>
                                            <div class="bg-transparent border-0 form-control ms-1 shadow-none text-white" data-id="`+index+`" data-match_id=`+match.id+`>`+match.value+`</div>
                                        </div>`;
                            }
                        });
                        if(!data.is_correct){
                            let correct_answers = "";
                            data.ca.forEach(function(answer, i) {
                                index = 1 + i;
                                coma = "";
                                if(index < data.ca.length){
                                    coma = ", ";
                                }
                                correct_answers += $(".question_content.active").find(".drop_container").find(".form-control[data-match_id="+answer+"]").data("match_code") + coma;
                            })
                            $(".question_content.active").find(".answer_wrap").append(`<div class="alert alert-success border border-2 border-success my-3 rounded-4 text-dark"><i class="fa fa-bolt-lightning me-2 text-success"></i>Correct sequence is `+correct_answers+`</div>`);
                        }
                        $(".question_content.active").find(".drop").empty().append(matches);
                        stopTimer();
                        showNextBtn();
                        loader_off();
                    },
                    error: function(data, textStatus, errorThrown) {
                    },
                });
            }
            function submitFIB(answer){
                $.ajax({
                    type: "POST",
                    url: "{{route('check_practice_answer', ['practiceSet' => $practiceSet['slug'], 'session' => $session['code']])}}",
                    data: {
                        question_id: activeQuesCode(),
                        time_taken: time,
                        total_time_taken: totalTimeTaken,
                        user_answer: answer,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        if(data){
                            updateProgressBar(data.answered, data.total);
                            $(".question_content.active").find(".notice").remove();
                            let options = [];
                            let answers = [];
                            answer.forEach(function(answer, i) {
                                if (answer.trim().toLowerCase() === data.ca[i].trim().toLowerCase()) {
                                    options.push('<div class="border border-2 border-success bg-success text-white shadow-sm input-group my-2 p-3 py-2 rounded-4 align-items-center font-size-14"><span class="align-self-center bg-opacity-10 border-0 fw-semibold input-group-text p-0 px-2 rounded-circle me-2">'+(++i)+'</span> '+answer+'</div>');
                                } else {
                                    options.push('<div class="border border-2 border-danger bg-danger text-white shadow-sm input-group my-2 p-3 py-2 rounded-4 align-items-center font-size-14"><span class="align-self-center bg-opacity-10 border-0 fw-semibold input-group-text p-0 px-2 rounded-circle me-2">'+(++i)+'</span> '+answer+'</div>');
                                }
                            });
                            data.ca.forEach(function(answer, i) {
                                answers.push('<span>Q'+(++i)+'. '+answer+' </span>');
                            });
                            var anwerwrap = "";
                            if(data.ca.length > 1){
                                anwerwrap = '<div class="alert alert-success border border-2 border-success my-3 rounded-4 text-dark"><i class="fa fa-bolt-lightning me-2 text-success"></i>Correct answers for the blanks are '+answers.join("")+' </div>'
                            } else {
                                anwerwrap = '<div class="alert alert-success border border-2 border-success my-3 rounded-4 text-dark"><i class="fa fa-bolt-lightning me-2 text-success"></i>Correct answer for the blank is '+answers.join("")+' </div>'
                            }
                            let tab = `<div class="mt-3">`+options.join("")+anwerwrap+`</div>`;
                            $(".question_content.active").find(".answer_wrap").empty().append(tab);
                            stopTimer();
                            showNextBtn();
                            loader_off();
                        }
                    },
                    error: function(data, textStatus, errorThrown) {
                    },
                });
            }
            if(typeof escapeHtmlEntities == 'undefined') {
                escapeHtmlEntities = function (text) {
                    return text.replace(/[\u00A0-\u2666<>\&]/g, function(c) {
                        return '&' + 
                        (escapeHtmlEntities.entityTable[c.charCodeAt(0)] || '#'+c.charCodeAt(0)) + ';';
                    });
                };

                // all HTML4 entities as defined here: http://www.w3.org/TR/html4/sgml/entities.html
                // added: amp, lt, gt, quot and apos
                escapeHtmlEntities.entityTable = {
                    34 : 'quot', 
                    38 : 'amp', 
                    39 : 'apos', 
                    60 : 'lt', 
                    62 : 'gt', 
                    160 : 'nbsp', 
                    161 : 'iexcl', 
                    162 : 'cent', 
                    163 : 'pound', 
                    164 : 'curren', 
                    165 : 'yen', 
                    166 : 'brvbar', 
                    167 : 'sect', 
                    168 : 'uml', 
                    169 : 'copy', 
                    170 : 'ordf', 
                    171 : 'laquo', 
                    172 : 'not', 
                    173 : 'shy', 
                    174 : 'reg', 
                    175 : 'macr', 
                    176 : 'deg', 
                    177 : 'plusmn', 
                    178 : 'sup2', 
                    179 : 'sup3', 
                    180 : 'acute', 
                    181 : 'micro', 
                    182 : 'para', 
                    183 : 'middot', 
                    184 : 'cedil', 
                    185 : 'sup1', 
                    186 : 'ordm', 
                    187 : 'raquo', 
                    188 : 'frac14', 
                    189 : 'frac12', 
                    190 : 'frac34', 
                    191 : 'iquest', 
                    192 : 'Agrave', 
                    193 : 'Aacute', 
                    194 : 'Acirc', 
                    195 : 'Atilde', 
                    196 : 'Auml', 
                    197 : 'Aring', 
                    198 : 'AElig', 
                    199 : 'Ccedil', 
                    200 : 'Egrave', 
                    201 : 'Eacute', 
                    202 : 'Ecirc', 
                    203 : 'Euml', 
                    204 : 'Igrave', 
                    205 : 'Iacute', 
                    206 : 'Icirc', 
                    207 : 'Iuml', 
                    208 : 'ETH', 
                    209 : 'Ntilde', 
                    210 : 'Ograve', 
                    211 : 'Oacute', 
                    212 : 'Ocirc', 
                    213 : 'Otilde', 
                    214 : 'Ouml', 
                    215 : 'times', 
                    216 : 'Oslash', 
                    217 : 'Ugrave', 
                    218 : 'Uacute', 
                    219 : 'Ucirc', 
                    220 : 'Uuml', 
                    221 : 'Yacute', 
                    222 : 'THORN', 
                    223 : 'szlig', 
                    224 : 'agrave', 
                    225 : 'aacute', 
                    226 : 'acirc', 
                    227 : 'atilde', 
                    228 : 'auml', 
                    229 : 'aring', 
                    230 : 'aelig', 
                    231 : 'ccedil', 
                    232 : 'egrave', 
                    233 : 'eacute', 
                    234 : 'ecirc', 
                    235 : 'euml', 
                    236 : 'igrave', 
                    237 : 'iacute', 
                    238 : 'icirc', 
                    239 : 'iuml', 
                    240 : 'eth', 
                    241 : 'ntilde', 
                    242 : 'ograve', 
                    243 : 'oacute', 
                    244 : 'ocirc', 
                    245 : 'otilde', 
                    246 : 'ouml', 
                    247 : 'divide', 
                    248 : 'oslash', 
                    249 : 'ugrave', 
                    250 : 'uacute', 
                    251 : 'ucirc', 
                    252 : 'uuml', 
                    253 : 'yacute', 
                    254 : 'thorn', 
                    255 : 'yuml', 
                    402 : 'fnof', 
                    913 : 'Alpha', 
                    914 : 'Beta', 
                    915 : 'Gamma', 
                    916 : 'Delta', 
                    917 : 'Epsilon', 
                    918 : 'Zeta', 
                    919 : 'Eta', 
                    920 : 'Theta', 
                    921 : 'Iota', 
                    922 : 'Kappa', 
                    923 : 'Lambda', 
                    924 : 'Mu', 
                    925 : 'Nu', 
                    926 : 'Xi', 
                    927 : 'Omicron', 
                    928 : 'Pi', 
                    929 : 'Rho', 
                    931 : 'Sigma', 
                    932 : 'Tau', 
                    933 : 'Upsilon', 
                    934 : 'Phi', 
                    935 : 'Chi', 
                    936 : 'Psi', 
                    937 : 'Omega', 
                    945 : 'alpha', 
                    946 : 'beta', 
                    947 : 'gamma', 
                    948 : 'delta', 
                    949 : 'epsilon', 
                    950 : 'zeta', 
                    951 : 'eta', 
                    952 : 'theta', 
                    953 : 'iota', 
                    954 : 'kappa', 
                    955 : 'lambda', 
                    956 : 'mu', 
                    957 : 'nu', 
                    958 : 'xi', 
                    959 : 'omicron', 
                    960 : 'pi', 
                    961 : 'rho', 
                    962 : 'sigmaf', 
                    963 : 'sigma', 
                    964 : 'tau', 
                    965 : 'upsilon', 
                    966 : 'phi', 
                    967 : 'chi', 
                    968 : 'psi', 
                    969 : 'omega', 
                    977 : 'thetasym', 
                    978 : 'upsih', 
                    982 : 'piv', 
                    8226 : 'bull', 
                    8230 : 'hellip', 
                    8242 : 'prime', 
                    8243 : 'Prime', 
                    8254 : 'oline', 
                    8260 : 'frasl', 
                    8472 : 'weierp', 
                    8465 : 'image', 
                    8476 : 'real', 
                    8482 : 'trade', 
                    8501 : 'alefsym', 
                    8592 : 'larr', 
                    8593 : 'uarr', 
                    8594 : 'rarr', 
                    8595 : 'darr', 
                    8596 : 'harr', 
                    8629 : 'crarr', 
                    8656 : 'lArr', 
                    8657 : 'uArr', 
                    8658 : 'rArr', 
                    8659 : 'dArr', 
                    8660 : 'hArr', 
                    8704 : 'forall', 
                    8706 : 'part', 
                    8707 : 'exist', 
                    8709 : 'empty', 
                    8711 : 'nabla', 
                    8712 : 'isin', 
                    8713 : 'notin', 
                    8715 : 'ni', 
                    8719 : 'prod', 
                    8721 : 'sum', 
                    8722 : 'minus', 
                    8727 : 'lowast', 
                    8730 : 'radic', 
                    8733 : 'prop', 
                    8734 : 'infin', 
                    8736 : 'ang', 
                    8743 : 'and', 
                    8744 : 'or', 
                    8745 : 'cap', 
                    8746 : 'cup', 
                    8747 : 'int', 
                    8756 : 'there4', 
                    8764 : 'sim', 
                    8773 : 'cong', 
                    8776 : 'asymp', 
                    8800 : 'ne', 
                    8801 : 'equiv', 
                    8804 : 'le', 
                    8805 : 'ge', 
                    8834 : 'sub', 
                    8835 : 'sup', 
                    8836 : 'nsub', 
                    8838 : 'sube', 
                    8839 : 'supe', 
                    8853 : 'oplus', 
                    8855 : 'otimes', 
                    8869 : 'perp', 
                    8901 : 'sdot', 
                    8968 : 'lceil', 
                    8969 : 'rceil', 
                    8970 : 'lfloor', 
                    8971 : 'rfloor', 
                    9001 : 'lang', 
                    9002 : 'rang', 
                    9674 : 'loz', 
                    9824 : 'spades', 
                    9827 : 'clubs', 
                    9829 : 'hearts', 
                    9830 : 'diams', 
                    338 : 'OElig', 
                    339 : 'oelig', 
                    352 : 'Scaron', 
                    353 : 'scaron', 
                    376 : 'Yuml', 
                    710 : 'circ', 
                    732 : 'tilde', 
                    8194 : 'ensp', 
                    8195 : 'emsp', 
                    8201 : 'thinsp', 
                    8204 : 'zwnj', 
                    8205 : 'zwj', 
                    8206 : 'lrm', 
                    8207 : 'rlm', 
                    8211 : 'ndash', 
                    8212 : 'mdash', 
                    8216 : 'lsquo', 
                    8217 : 'rsquo', 
                    8218 : 'sbquo', 
                    8220 : 'ldquo', 
                    8221 : 'rdquo', 
                    8222 : 'bdquo', 
                    8224 : 'dagger', 
                    8225 : 'Dagger', 
                    8240 : 'permil', 
                    8249 : 'lsaquo', 
                    8250 : 'rsaquo', 
                    8364 : 'euro'
                };
            }
            function checkEmptyVal(arr) {
                return arr.indexOf("") === -1;
            }
            $(".question_content").filter(
                (index, element) => 
                $(element).data('type') === 'ORD' || $(element).data('type') === 'MTF'
            ).each((index, element) => {
                    let code = $(element).data('code');
                    const myTimeout = setTimeout(Dragable, 500, code);
            });
            function Dragable(id) {
                let dropItems = document.getElementById('drop_items_' + id);
                if(dropItems){
                    new Sortable(dropItems, {
                        onStart: function(evt) {
                            $(evt.item).removeClass("animate__animated animate__fadeInRight animate__slow");
                        },
                        onEnd: function(evt) {
                            $(evt.item).addClass("animate__animated animate__fadeInRight animate__slow");
                        },
                        animation: 50,
                        chosenClass: "sortable-chosen",
                        dragClass: "sortable-drag"
                    });
                }
            }
            function drop(event) {
                let type = activeQuesType();
                $(".question_content.active").find(".drop_card").each(function(i){
                    $(this).find(".MTF_index").text(++i)
                });
                showSubmitBtn();
            }
            function activeQuesId() {
                return $(".question_content.active").data("id");
            }
            function activeQuesType() {
                return $(".question_content.active").data("type");
            }
            function activeQuesCode() {
                return $(".question_content.active").data("code");
            }
            function startTimer(){
                setInterval(incrementTime, 1000);
            }
            function incrementTime() {
                totalTimeTaken = totalTimeTaken + 1;
                time = time + 1;
            }
            function stopTimer(){
                time = 0;
            }
            function showSubmitBtn(){
                $("#next").addClass("d-none");
                $("#finish").addClass("d-none");
                $("#submit").removeClass("d-none");
            }
            function showNextBtn(){
                $("#submit").addClass("d-none");
                if($(".question_content.active").next().length <= 0) {
                    $("#finish").removeClass("d-none");
                    $("#next").addClass("d-none");
                } else {
                    $("#finish").addClass("d-none");
                    $("#next").removeClass("d-none");
                }
            }
            function keyControls(event) {
                const keycode = event.which || event.keycode;
                if (keycode == 39 || keycode == 38) {
                    if(!$(event.target).is('input[type="text"], textarea')){
                        $("#next").click();
                    }
                }
                if (keycode == 37 || keycode == 40) {
                    if(!$(event.target).is('input[type="text"], textarea')){
                        $("#prev").click();
                    }
                }
                if (keycode == 27) {
                    $("#exitExam").click();
                }
                if (keycode == 18) {
                    $(".report_issue").click();
                }
            }
            $(document).keyup(function(event) {
                if (!$(".submit_loading").hasClass("screen_locked")) {
                    keyControls(event);
                }
            });
        </script>
    </body>
</html>