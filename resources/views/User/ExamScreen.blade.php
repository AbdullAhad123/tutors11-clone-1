<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>{{$exam['title']}}</title>
    <meta name="description" content="" />
    <!-- Favicon -->
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
            padding-top: 125px;
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
        .sections{
            overflow-x: auto;
            overflow-y: hidden;
        }
        .sections::-webkit-scrollbar {
            height: 3px;
        }

        /* Track */
        .sections::-webkit-scrollbar-track {
            box-shadow: inset 0 0 5px #f1f1f1;
            border-radius: 10px;
        }

        /* Handle */
        .sections::-webkit-scrollbar-thumb {
            background: #0d6efd;
            border: 0px solid #fff;
            outline: none;
        }

        /* Handle on hover */
        .sections::-webkit-scrollbar-thumb:hover {
            background: #065edf; 
        }
        .sections_btn{
            min-width: 100px;
        }
    </style>
</head>
<body>
    @include('components.website-preloader')
    <div class="bg-white shadow fixed-top container-fluid pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <button class="btn border-0" onclick="history.back()"><i class="fa fa-arrow-left"></i></button>
            <div class="text-center">
                <h4 class="my-2">{{$exam['title']}}</h4>
                <h6>Question <span id="current_ques">1</span>/<span id="total_ques">{{$totalQuestions}}</span></h6>
            </div>
            <div class="d-flex align-items-center">
                <span class="countdown_timer btn shadow-sm mx-1 btn-sm bg_label_warning" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Timer">
                    <i class="fa fa-clock me-1">
                    </i><span id="count_downTimer" data-name="">00:00</span>
                </span>
                <div class="d-md-flex d-none">
                    <button class="btn shadow-sm mx-1 btn-sm report_issue bg_label_success" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Report an Issue"><i class="fa fa-flag"></i> Report</button>
                    <button class="btn shadow-sm mx-1 btn-sm bg_label_danger" id="exitExam" data-bs-toggle="modal" data-bs-target="#finishTest"><i class="fa fa-sign-out"></i> End</button>
                    <button class="btn shadow-sm mx-1 btn-sm bg_label_primary me-2" id="fullscreenMode" onclick="Fullscreen()"><i class="fa fa-expand"></i></button>
                </div>
                <div class="dropdown d-md-none d-inline-block">
                    <button class="btn border-0 shadow-none" id="menu_sm" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-bars"></i>
                    </button>
                    <div class="dropdown-menu dropdown_shadow border-0" aria-labelledby="menu_sm">
                        <a class="dropdown-item small py-2 cursor-pointer" id="fullscreenMode" onclick="Fullscreen()">
                            <i class="fa fa-expand me-1"></i>FullScreen Mode
                        </a>
                        <a class="dropdown-item small py-2 report_issue cursor-pointer">
                            <i class="fa fa-flag me-1"></i>
                            Report an Issue
                        </a>
                        <a class="dropdown-item small py-2 cursor-pointer" id="exitExam" data-bs-toggle="modal" data-bs-target="#finishTest">
                            <i class="fa fa-sign-out me-1"></i>
                            End Session
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="progress">
            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
        </div> -->
        <ul class="nav nav-tabs border-0 flex-nowrap sections">
            @php
                $is_active = false;
                $first_active_found = false;
                $section_active = [];
            @endphp
            @foreach($examSections as $key => $section)
                @php
                    ++$key;
                    if($section['answered'] < $section['total_questions'] && !$first_active_found){
                        $is_active = true;
                        $first_active_found = true;
                    } else {
                        $is_active = false;
                    }
                    $active = $is_active ? "active" : "inactive";
                    $section_active[$key-1] = $active;
                @endphp
                <li class="nav-item text-nowrap mb-2">
                    @if($section['answered'] < $section['total_questions'])
                        <a class="btn btn-sm btn-outline-primary me-2 sections_btn {{$section_active[$key-1]}}" data-index="{{$key}}" data-total_questions="{{$section['total_questions']}}" data-bs-toggle="tab" href="#exam{{$section['id']}}" data-id="{{$section['id']}}">{{$section['name']}}</a>
                    @else
                        <a class="btn btn-sm btn-primary text-white me-2 sections_btn" data-index="{{$key}}" data-total_questions="{{$section['total_questions']}}" data-id="{{$section['id']}}">{{$section['name']}}</a>
                    @endif
                </li>
            @endforeach
        </ul>
    </div>
    <div class="vh-100 overflow-auto container-fluid main_content m-auto tab-content">
        @foreach($examSections as $key => $section)
            <div class="tab-pane container  
                @if($section_active[$key] == 'active')
                    active
                @else
                    fade
                @endif
                " id="exam{{$section['id']}}">
                @if($section['answered'] < $section['total_questions'])
                    @foreach($section['questions'] as $key => $question)
                        @if($question['status'] != 'answered')
                            <div class="my-4 question_content
                                @if($section['answered'] > 0 && $section['answered'] < $section['total_questions'])
                                    @if($key == $section['answered'])
                                        active
                                    @endif
                                @else
                                    @if($key <= 0)
                                        active
                                    @endif
                                @endif
                            " data-number="{{$key}}" data-index="{{++$key}}" data-id="{{$question['id']}}" data-type="{{$question['questionType']}}" data-code="{{$question['code']}}">
                                <div class="my-2 d-flex align-items-center justify-content-between h6">
                                    <div>
                                        <span class="fw-semibold">Q{{$key}} of {{$section['total_questions']}}</span>
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
                                                <div class="border border-2 input-group my-2 p-3 py-2 rounded-4 border-primary animate__animated animate__fadeInRight animate__slow
                                                    @if($question['status'] != 'answered')
                                                        MSA_inp_wrap cursor-pointer
                                                    @endif
                                                ">
                                                    <span class="bg-opacity-10 border-0 fw-semibold input-group-text align-self-center p-0 px-2 rounded-circle small">{{++$oKey}}</span>
                                                    <div class="bg-transparent border-0 form-control ms-1 shadow-none MSA_inp select_wrap" data-id="{{$oKey}}">{!! $option !!}</div>
                                                </div>
                                            @endforeach
                                            @break
                                        @case('MMA')
                                            @foreach($question['options'] as $oKey => $option)
                                                <div class="border border-2 border-primary input-group my-2 p-3 py-2 rounded-4 animate__animated animate__fadeInRight animate__slow
                                                    @if($question['status'] != 'answered')
                                                        MMA_inp cursor-pointer
                                                    @endif
                                                ">
                                                    <span class="bg-opacity-10 border-0 fw-semibold input-group-text align-self-center p-0 px-2 rounded-circle small">{{++$oKey}}</span>
                                                    <div class="bg-transparent border-0 form-control ms-1 shadow-none select_wrap" data-id="{{$oKey}}">{!! $option !!}</div>
                                                </div>
                                            @endforeach
                                            @break
                                        @case('TOF')
                                            @foreach($question['options'] as $oKey => $option)
                                                <div class="border border-2 border-primary input-group my-2 p-3 py-2 rounded-4 animate__animated animate__fadeInRight animate__slow
                                                    @if($question['status'] != 'answered')
                                                        MSA_inp_wrap cursor-pointer
                                                    @endif
                                                ">
                                                    <span class="bg-opacity-10 border-0 fw-semibold input-group-text align-self-center p-0 px-2 rounded-circle small">{{++$oKey}}</span>
                                                    <div class="bg-transparent border-0 form-control ms-1 shadow-none MSA_inp select_wrap" data-id="{{$oKey}}">{!! $option !!}</div>
                                                </div>
                                            @endforeach
                                            @break
                                        @case('SAQ')
                                            <div class="border border-2 input-group my-2 p-3 py-2 rounded-4 animate__animated animate__fadeInRight animate__slow border-primary">
                                                <span class="bg-opacity-10 border-0 fw-semibold input-group-text align-self-center p-0 px-2 rounded-circle small">1</span>
                                                <input type="text" class="answer_inp bg-transparent border-0 form-control ms-1 shadow-none" placeholder="Type your answer">
                                            </div>
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
                                                <div class="drop_container" id="drop_items_{{$question['code']}}">
                                                    @foreach($question['options']['pairs'] as $pKey => $pair)
                                                        <div class="border border-2 border-primary input-group my-2 p-3 py-2 rounded-4 bg-white drop_card animate__animated animate__fadeInRight animate__slow" ondragend="drop(event)">
                                                            <span class="bg-opacity-10 border-0 fw-semibold input-group-text align-self-center p-0 px-2 rounded-2 small"><span class="MTF_index me-1">{{++$pKey}} </span> - {{$pair['code']}}</span>
                                                            <div class="bg-transparent border-0 form-control ms-1 shadow-none" data-id="{{$pKey}}" data-match_id="{{$pair['id']}}" data-match_code="{{$pair['code']}}">{!! $pair['value'] !!}</div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            @break
                                        @case('ORD')
                                            <div class="drop">
                                                <div class="drop_container" id="drop_items_{{$question['code']}}">
                                                    @foreach($question['options'] as $oKey => $option)
                                                        <div class="border border-2 border-primary input-group my-2 p-3 py-2 rounded-4 bg-white drop_card animate__animated animate__fadeInRight animate__slow" ondragend="drop(event)">
                                                            <span class="bg-opacity-10 border-0 fw-semibold input-group-text align-self-center p-0 px-2 rounded-2 small"><span class="MTF_index me-1">{{++$oKey}} </span> - {{$option['code']}}</span>
                                                            <div class="bg-transparent border-0 form-control ms-1 shadow-none" data-id="{{$oKey}}" data-match_id="{{$option['id']}}" data-match_code="{{$option['code']}}">{!! $option['value'] !!}</div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            @break
                                        @case('FIB')
                                            @for($i = 0; $i < $question['options']; $i++)
                                                <div class="border border-2 border-primary input-group my-2 p-3 py-2 rounded-4 animate__animated animate__fadeInRight animate__slow">
                                                    <span class="bg-opacity-10 border-0 fw-semibold input-group-text align-self-center p-0 px-2 rounded-circle small">{{$i + 1}}</span>
                                                    <input type="text" class="answer_inp bg-transparent border-0 form-control ms-1 shadow-none" placeholder="Type your answer for blank {{$i + 1}}">
                                                </div>
                                            @endfor
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
                        @endif
                    @endforeach
                @endif
            </div>
        @endforeach
            <!-- <div class="tab-pane container fade active" id="home">Home</div>
            <div class="tab-pane container fade" id="menu1">Menu 1</div>
            <div class="tab-pane container fade" id="menu2">Menu 2</div> -->
    </div>
    <div class="bg-white shadow fixed-bottom px-2 py-3">
        <div id="move_question" class="d-flex justify-content-end m-auto">
            <button id="submit" class="btn btn-primary text-white px-4
            @if($answeredQuestions >= $totalQuestions)
                d-none
            @endif
            ">
                Submit
            </button>
            <button id="finish" class="btn btn-primary text-white px-4 
            @if($answeredQuestions < $totalQuestions)
                d-none
            @endif
            ">
                Finish
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
        var totalTimeTaken = {!! str_replace("'", "\'", json_encode($session['total_time_taken'])) !!};
        var remainingTime = {!! str_replace("'", "\'", json_encode($remainingTime)) !!};
        var examSections = {!! str_replace("'", "\'", json_encode($examSections)) !!};
        var time = 0;
        var sectionTime = [];
        currentQuestionIndex();
        examSections.forEach(function(section, i) {
            let data = {
                index: i,
                id : section.id,
                total_time_taken: section.total_time_taken
            }
            sectionTime.push(data);
        });
        startsectionTimer(activeSectionIndex());
        startTimer();
        var intervalId;
        var sectionIntervalId;
        function startTimer(){
            intervalId = setInterval(getTime, 1000, remainingTime);
            setInterval(incrementTime, 1000);
        }
        function startsectionTimer(index) {
            let section = sectionTime[index];
            sectionIntervalId = setInterval(function() {
                setsectionTime(section.total_time_taken, section.index);
            }, 1000);
        }
        function pauseSectionTimer() {
            clearInterval(sectionIntervalId);
        }
        function setsectionTime(totalSectionTime, index) {
            sectionTime[index].total_time_taken = sectionTime[index].total_time_taken + 1;
        }
        function incrementTime() {
            let status = $(".question_tab.active").data("status");
            totalTimeTaken = totalTimeTaken + 1;
            if(status != 'answered'){
                time = time + 1;
            }
        }
        function getTime(remaining) {
            remainingTime = remainingTime - 1;
            var timeLeft = remainingTime * 1000;
            if (timeLeft <= 0) {
                // Countdown has ended
                clearInterval(intervalId);
                finishTest();
                return;
            }
            var time = new Date(timeLeft);
            var hours = time.getUTCHours().toString().padStart(2, '0');
            var minutes = time.getUTCMinutes().toString().padStart(2, '0');
            var seconds = time.getUTCSeconds().toString().padStart(2, '0');
            var formattedTime = hours !== '00' ? `${hours}:${minutes}:${seconds}` : `${minutes}:${seconds}`;
            $("#count_downTimer").text(formattedTime);
        }
        $(".report_issue").click(function(){
            let id = activeQuesId();
            $('#wrong_ques'+id).modal('show');
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
        $(document).on('click', '.MSA_inp_wrap', function(){
            $(this).addClass('bg-success border-success').removeClass('border-primary');
            $(this).find(".MSA_inp").addClass('active text-white');
            $(this).siblings().find(".MSA_inp").removeClass('active text-white');
            $(this).siblings().removeClass('bg-success border-success').addClass('border-primary');
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
        });
        $(document).on('click', '.sections_btn', function(){
            currentQuestionIndex();
            pauseSectionTimer();
            let index = $(this).data("index") - 1;
            startsectionTimer(index)
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
            var questions = [];
            examSections.forEach(function(section, i) {
                $.ajax({
                    type: "GET",
                    url: "/exam/{{$exam['slug']}}/questions/{{$session['code']}}/"+section.id,
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        data.questions.forEach(function(question) {
                            questions.push(question);
                        });
                        if(examSections.length == ++i){
                            $.ajax({
                                type: "POST",
                                url: "/exam/{{$exam['slug']}}/finish/{{$session['code']}}",
                                data: {
                                    questions: questions,
                                    total_time_taken: totalTimeTaken,
                                    _token: '{{ csrf_token() }}'
                                },
                                success: function(data) {
                                    window.location.href = "/exam/"+data.exam+"/thank-you/"+data.session;
                                },
                                error: function(data, textStatus, errorThrown) {
                                    console.log(textStatus);
                                },
                            });
                        }
                    },
                    error: function(data, textStatus, errorThrown) {},
                });
            });
        });
        function activeQuesId() {
            return $("#exam"+activeSectionId()).find(".question_content.active").data("id");
        }
        function activeQuesType() {
            return $("#exam"+activeSectionId()).find(".question_content.active").data("type");
        }
        function activeQuesCode() {
            return $("#exam"+activeSectionId()).find(".question_content.active").data("code");
        }
        function activeQuesIndex() {
            return $("#exam"+activeSectionId()).find(".question_content.active").data("index");
        }
        function activeSectionId() {
            return $(".sections_btn.active").data("id");
        }
        function activeSectionIndex() {
            return $(".sections_btn.active").data("index")-1;
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
        function currentQuestionIndex() {
            let prevQuestions = 0;
            let index = $(".sections_btn.active").data("index");
            for (let i = 1; i < index; i++) {
                decrement = i-1;
                prevQuestions = prevQuestions + $(".sections_btn").eq(decrement).data("total_questions");
            }
            currentQuestion = prevQuestions + $("#exam"+activeSectionId()).find(".question_content.active").data("index")
            // working here
            if(activeSectionId() != undefined){
                $("#current_ques").text(currentQuestion);
            } else {
                $("#current_ques").text($("#total_ques").text());
            }
            stopTimer();
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
        }
        function stopTimer() {
            time = 0;
        }
        function finishTest() {
            $("#finish").click()
        }
        function next_question() {
            let section_next_questions = $(".question_content.active[data-id="+activeQuesId()+"]").nextAll().length;
            let next_sections = $(".sections_btn.active").parent().nextAll().length;            
            if(section_next_questions <= 0 && next_sections <= 0){
                finishTest();
                $("#finish").removeClass("d-none");
                $("#submit").addClass("d-none");
            }
            if(next_sections > 0){
                if(section_next_questions > 0) {
                    $(".question_content.active[data-id="+activeQuesId()+"]").removeClass("active").next().addClass("active");
                    $(".question_content.active[data-id="+activeQuesId()+"]").prev().remove();
                } else {
                    let section_id = activeSectionId();
                    let question_id = activeQuesId();
                    $("#exam"+section_id).removeClass("active");
                    $("#exam"+section_id).find(".question_content[data-id="+question_id+"]").remove();
                    $(".sections_btn.active").removeAttr("href role data-bs-toggle").removeClass("active").addClass("btn-primary text-white").parent().next().find(".sections_btn").addClass("active");
                    $("#exam"+activeSectionId()).addClass("active show");
                    pauseSectionTimer();
                    startsectionTimer(activeSectionIndex());
                    let total_ques = $("#exam"+activeSectionId()).children().length;
                    if(total_ques <= 0){
                        next_question();
                    }
                }
            } else {
                if(section_next_questions > 0) {
                    $(".question_content.active[data-id="+activeQuesId()+"]").removeClass("active").next().addClass("active");
                    $(".question_content.active[data-id="+activeQuesId()+"]").prev().remove();
                }
            }
        }
        function submitMSA(answer){
            $.ajax({
                type: "POST",
                url: "/update_exam_answer/{{$exam['slug']}}/{{$session['code']}}/"+activeSectionId(),
                data: {
                    current_question: activeQuesIndex(),
                    current_section: activeSectionId(),
                    current_section_total_time_taken: sectionTime[activeSectionIndex()].total_time_taken,
                    question_id: activeQuesCode(),
                    status: answer == undefined ? "not_answered" : "answered",
                    time_taken: time,
                    total_time_taken: totalTimeTaken,
                    user_answer: answer,
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    next_question();
                    currentQuestionIndex();
                    loader_off();
                },
                error: function(data, textStatus, errorThrown) {
                },
            });
        }
        function submitMMA(answer){
            $.ajax({
                type: "POST",
                url: "/update_exam_answer/{{$exam['slug']}}/{{$session['code']}}/"+activeSectionId(),
                data: {
                    current_question: activeQuesIndex(),
                    current_section: activeSectionId(),
                    current_section_total_time_taken: sectionTime[activeSectionIndex()].total_time_taken,
                    question_id: activeQuesCode(),
                    status: answer.length <= 0 ? "not_answered" : "answered",
                    time_taken: time,
                    total_time_taken: totalTimeTaken,
                    user_answer: answer,
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    next_question();
                    currentQuestionIndex();
                    loader_off();
                },
                error: function(data, textStatus, errorThrown) {
                },
            });
        }
        function submitTOF(answer){
            $.ajax({
                type: "POST",
                url: "/update_exam_answer/{{$exam['slug']}}/{{$session['code']}}/"+activeSectionId(),
                data: {
                    current_question: activeQuesIndex(),
                    current_section: activeSectionId(),
                    current_section_total_time_taken: sectionTime[activeSectionIndex()].total_time_taken,
                    question_id: activeQuesCode(),
                    status: answer == undefined ? "not_answered" : "answered",
                    time_taken: time,
                    total_time_taken: totalTimeTaken,
                    user_answer: answer,
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    next_question();
                    currentQuestionIndex();
                    loader_off();
                },
                error: function(data, textStatus, errorThrown) {
                },
            });
        }
        function submitSAQ(answer){
            $.ajax({
                type: "POST",
                url: "/update_exam_answer/{{$exam['slug']}}/{{$session['code']}}/"+activeSectionId(),
                data: {
                    current_question: activeQuesIndex(),
                    current_section: activeSectionId(),
                    current_section_total_time_taken: sectionTime[activeSectionIndex()].total_time_taken,
                    question_id: activeQuesCode(),
                    status: answer ? "answered" : "not_answered",
                    time_taken: time,
                    total_time_taken: totalTimeTaken,
                    user_answer: answer,
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    next_question();
                    currentQuestionIndex();
                    loader_off();
                },
                error: function(data, textStatus, errorThrown) {
                },
            });
        }
        function submitMTF(answer){
            $.ajax({
                type: "POST",
                url: "/update_exam_answer/{{$exam['slug']}}/{{$session['code']}}/"+activeSectionId(),
                data: {
                    current_question: activeQuesIndex(),
                    current_section: activeSectionId(),
                    current_section_total_time_taken: sectionTime[activeSectionIndex()].total_time_taken,
                    question_id: activeQuesCode(),
                    status: "answered",
                    time_taken: time,
                    total_time_taken: totalTimeTaken,
                    user_answer: answer,
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    next_question();
                    currentQuestionIndex();
                    loader_off();
                },
                error: function(data, textStatus, errorThrown) {
                },
            });
        }
        function submitORD(answer){
            $.ajax({
                type: "POST",
                url: "/update_exam_answer/{{$exam['slug']}}/{{$session['code']}}/"+activeSectionId(),
                data: {
                    current_question: activeQuesIndex(),
                    current_section: activeSectionId(),
                    current_section_total_time_taken: sectionTime[activeSectionIndex()].total_time_taken,
                    question_id: activeQuesCode(),
                    status: "answered",
                    time_taken: time,
                    total_time_taken: totalTimeTaken,
                    user_answer: answer,
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    next_question();
                    currentQuestionIndex();
                    loader_off();
                },
                error: function(data, textStatus, errorThrown) {
                },
            });
        }
        function submitFIB(answer){
            $.ajax({
                type: "POST",
                url: "/update_exam_answer/{{$exam['slug']}}/{{$session['code']}}/"+activeSectionId(),
                data: {
                    current_question: activeQuesIndex(),
                    current_section: activeSectionId(),
                    current_section_total_time_taken: sectionTime[activeSectionIndex()].total_time_taken,
                    question_id: activeQuesCode(),
                    status: checkEmptyVal(answer) ? "answered" : "not_answered",
                    time_taken: time,
                    total_time_taken: totalTimeTaken,
                    user_answer: answer,
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    next_question();
                    currentQuestionIndex();
                    loader_off();
                },
                error: function(data, textStatus, errorThrown) {
                },
            });
        }
    </script>
</body>

</html>