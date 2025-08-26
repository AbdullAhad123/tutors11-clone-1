<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>{{$journeySet['title']}} journey - Student Portal - Tutors 11 Plus</title>
        <link rel="icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" integrity="sha512-c42qTSw/wPZ3/5LBzD+Bw5f7bSF2oxou6wEb+I/lqeaKV5FDIfMvvRp772y4jcJLKuGUOpbJMdg/BTl50fJYAw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <style>
            @media (max-width: 575px) { .question_title_container img{ width: 100%!important; } } ::-webkit-scrollbar { width: 7px; } ::-webkit-scrollbar-track { box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3); } ::-webkit-scrollbar-thumb { background-color: darkgrey; outline: 1px solid slategrey; } .sidenav { width: 350px; z-index: 1; background-color: #fff; overflow-x: hidden; transition: 0.5s; } .custom-btn{ background-color: #696bfc !important; } #main { transition: margin-left .5s; padding: 16px; margin-left: 350px; } td { border: 1px solid lightgray; padding: 5px 12px; } table{ margin-bottom: 12px; } .cursor-pointer{ cursor: pointer; } .font-size-13{ font-size:13px; } .font-size-14{ font-size:14px; } p img { margin: 0 5px; /* width: 98% !important; */ } .select_wrap p{margin-bottom:0;} .z-index-1{z-index: 1;} .z-index-5{z-index: 5;} .MMA_inp.active span, .MMA_inp.active .select_wrap, .MMA_wrap.correct span, .MMA_wrap.correct .select_wrap{ background-color: #c7e1d4; } .MMA_wrap.incorrect span, .MMA_wrap.incorrect .select_wrap{ background-color: #f2c3cd; } .sortable-drag { opacity: 0; } .drop_card{cursor: grab;} .bg-light{ background-color: #f6f9ff !important; } @media screen and (max-width: 767px) { .sidenav { width: 0; } #main { margin-left: 0; } } @media screen and (min-width: 768px) { .sidenav { width: 350px !important; } } .answer_wrap p { margin-bottom: 0; } .tooltiptext { background-color: #000; color: #fff; text-align: center; border-radius: 6px; padding: 5px 0; position: absolute; z-index: 1; top: 150%; visibility: hidden; } .tooltiptext::before { content: ""; position: absolute; bottom: 100%; left: 50%; border-style: solid; border-color: #000 transparent transparent transparent; margin-left: -5px; border-width: 5px; rotate: 180deg; } .tooltip:hover .tooltiptext { visibility: visible; } .progress { height: 12px; background: #e4e8ec !important; border: 1px solid #cbcbcb !important; } #progressBar{ width: 0%; } .main_test_container { min-height: 94vh; max-height: fit-content; max-width: 1400px; padding-top: 6.5rem; padding-bottom: 3rem; } .main_test_container::-webkit-scrollbar { width: 4px !important; } /* report modal */ .modal_header { height: auto; width: auto; background: #38c182; } .modal_dissmiss_btn { position: absolute; top: 5px; right: 5px; } .modal_body { height: auto; width: auto; } .message_description_input { min-height: 180px!important; max-height: 180px!important; } .fs_md { font-size: 1.08rem!important } .modal_loader { display: none; } #check-group { animation: 0.32s ease-in-out 1.03s check-group; transform-origin: center; } #check-group #check { animation: 0.34s cubic-bezier(0.65, 0, 1, 1) 0.8s forwards check; stroke-dasharray: 0, 75px; stroke-linecap: round; stroke-linejoin: round; } #check-group #outline { animation: 0.38s ease-in outline; transform: rotate(0deg); transform-origin: center; } #check-group #white-circle { animation: 0.35s ease-in 0.35s forwards circle; transform: none; transform-origin: center; } @keyframes outline { from { stroke-dasharray: 0, 345.576px; } to { stroke-dasharray: 345.576px, 345.576px; } } @keyframes circle { from { transform: scale(1); } to { transform: scale(0); } } @keyframes check { from { stroke-dasharray: 0, 75px; } to { stroke-dasharray: 75px, 75px; } } @keyframes check-group { from { transform: scale(1); } 50% { transform: scale(1.09); } to { transform: scale(1); } } #comprehension_body { height: 75vh; overflow-y: auto; } .submit_loading { background: #ffffff96; z-index: 100; } .test_navbar { box-shadow: 1px 4px 10px 2px #0000002b !important; } .dropdown_shadow { box-shadow: 0px 3px 10px 2px #00000033 !important; } 
            .bg_label_danger { background: #ffdddd !important; color: #ca1e1e !important; border: 1px solid #df5757 !important; outline: none !important; filter: drop-shadow(0px 2px 2px #00000040); } .bg_label_success { background: #e4ffe4 !important; color: #006400 !important; border: 1px solid #00ad00 !important; outline: none !important; filter: drop-shadow(0px 2px 2px #00000040); } .bg_label_primary { background: #daf4ff !important; color: #0072a3 !important; border: 1px solid #0072a3 !important; outline: none !important; filter: drop-shadow(0px 2px 2px #00000040); } .bg_label_warning { background: #fff0d3 !important; color: #ad7000 !important; border: 1px solid #ad7000 !important; outline: none !important; filter: drop-shadow(0px 2px 2px #00000040); }
            @media (max-width: 320px) {
                .session_title {
                    font-size: 6vw !important;
                }
            }
        </style>
    </head>
    <body>
        <div id="mySidenav" class="d-none">
            <div class="bg-white d-flex justify-content-between align-items-center position-sticky top-0 px-2 pt-3 pb-2">
                <div>
                    <h5 class="fw-normal mb-1">{{$journeySet['title']}}</h5>
                    <div class="rounded w-50" style="border-bottom: 5px solid #696bfc;"></div>
                </div>
                <a class="p-0 px-3 py-1 fs-4 text-body nav-link d-md-none" href="javascript:void(0)" onclick="closeNav()">&times;</a>
            </div>
            <nav class="p-2" style="min-height: 100%;">
                <div id="nav-tab" role="tablist"></div>
            </nav>
            <div class="bg-white position-sticky bottom-0 d-flex justify-content-between py-4 px-2 shadow-lg">
                <div id="prev_page" class="move_page" data-url=""><svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" style="width:22px;"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 15l-3-3m0 0l3-3m-3 3h8M3 12a9 9 0 1118 0 9 9 0 01-18 0z"></path></svg></div>
                <div>Page <span id="current_page"></span>/<span id="total_page"></span></div>
                <div id="next_page" class="move_page" data-url=""><svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" style="width:22px;"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg></div>
            </div>
        </div>
        <div class="shadow bg-white overflow-auto p-0 position-relative rounded-3">
            <div class="bg-white py-2 px-md-4 px-2 test_navbar w-100 fixed-top z-index-1 shadow">
                <div class="d-flex m-auto align-items-center justify-content-between">
                    <button class="btn border-0 shadow-none" onclick="history.back()">
                        <i class="fa-solid fa-arrow-left"></i>
                    </button>
                    <div class="text-center">
                        <h1 class="h4 fw-semibold mb-2 session_title">{{$journeySet['title']}}</h1>
                        <h2 class='h6'> <span>Answered</span> <span id="questions_attempted">0</span> <span class="fw-light font-size-14">/</span> <span id="totalQues">0</span></h2>
                    </div>   
                    <div class="d-md-flex d-none align-items-center justify-content-evenly">
                        <button class="btn shadow-sm mx-1 btn-sm report_issue bg_label_success" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Report an Issue"><i class="fa-regular fa-flag"></i>&nbsp;Report</button>    
                        <a class="btn shadow-sm mx-1 btn-sm bg_label_warning" type="button" href="/journey/{{$journeySet['slug']}}/analysis/{{$session['code']}}" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Pause Session"><i class="fa-regular fa-circle-pause"></i>&nbsp;Pause</a>
                        <button class="btn shadow-sm mx-1 btn-sm bg_label_danger" id="exitExam" data-bs-toggle="modal" data-bs-target="#finishTest" type='button'><i class="fa-solid fa-right-from-bracket"></i>&nbsp;End</button>
                        <button class="btn shadow-sm mx-1 btn-sm bg_label_primary me-2" id="large_fullscreenMode"  data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Fullscreen"><i class="fa-solid fa-expand"></i></button>
                    </div>               
                    <div class="dropdown d-md-none d-inline-block">
                        <button class="btn border-0 shadow-none" type="button" id='menu_sm' data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-bars"></i>
                        </button>
                        <div class="dropdown-menu dropdown_shadow border-0" aria-labelledby="menu_sm">
                            @if($lesson_url)
                                <a class="dropdown-item small py-2" href="{{$lesson_url}}">
                                    <i class="fa-solid fa-chalkboard me-1"></i>
                                    Learn
                                </a>
                            @endif
                            <a    class="dropdown-item small py-2" id="fullscreenMode">
                                <i class="fa-solid fa-expand me-1"></i>
                                FullScreen Mode
                            </a>
                            <a class="dropdown-item small py-2" href="/journey/{{$journeySet['slug']}}/analysis/{{$session['code']}}">
                                <i class="fa-regular fa-circle-pause me-1"></i>
                                Pause Session
                            </a>
                            <a class="dropdown-item small py-2 report_issue">
                                <i class="fa-regular fa-flag me-1"></i>
                                Report an Issue
                            </a>
                            <a class="dropdown-item small py-2" id="exitExam" data-bs-toggle="modal" data-bs-target="#finishTest"  >
                                <i class="fa-solid fa-right-from-bracket me-1"></i>
                                End Session
                            </a>
                        </div>
                    </div>
                </div>
                <div class="progress rounded-3">
                    <div class="progress-bar bg-primary progress-bar-striped" id="progressBar" role="progressbar"></div>
                </div>
            </div>
            <div class="my-2 px-md-5 px-3 m-auto main_test_container">
                <div class="tab-content pb-3" id="nav-tabContent"></div>
            </div>
            <!-- end session modal  -->
            <div class="modal fade" id="finishTest" tabindex="-1" aria-labelledby="finishTestLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content p-3 py-4 shadow border-0">
                        <div class="modal-body">
                            <div class="my-3 text-center">
                                <!-- <svg fill="none" height="100" viewBox="0 0 24 24" width="100" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><linearGradient id="paint0_linear_21_1170" gradientUnits="userSpaceOnUse" x1="12" x2="12" y1="0" y2="24"><stop offset="0" stop-color="#f12711"/><stop offset="1" stop-color="#f5ba3d"/></linearGradient><path clip-rule="evenodd" d="m12 2c-5.52285 0-10 4.47715-10 10 0 5.5228 4.47715 10 10 10 5.5228 0 10-4.4772 10-10 0-5.52285-4.4772-10-10-10zm-12 10c0-6.62742 5.37258-12 12-12 6.6274 0 12 5.37258 12 12 0 6.6274-5.3726 12-12 12-6.62742 0-12-5.3726-12-12zm12-5c.5523 0 1 .44772 1 1v6c0 .5523-.4477 1-1 1s-1-.4477-1-1v-6c0-.55228.4477-1 1-1zm0 9c.5523 0 1 .4477 1 1v.01c0 .5523-.4477 1-1 1s-1-.4477-1-1v-.01c0-.5523.4477-1 1-1z" fill="#ffc107" fill-rule="evenodd"/></svg> -->
                                <img src="{{ url('images/end_session_image.webp') }}" height="auto" width="100%" alt="an illusrtation of students finishing session in TutorsElevenPlus">
                            </div>
                            <h2 class="h3 my-2 text-center text-uppercase">Ready to wrap up?</h2>
                            <p class="my-2 text-center fs-5">Confirm if you're sure about ending the session. Appreciate your participation!</p>
                        </div>
                        <div class="align-items-center d-flex justify-content-center">
                            <button class="btn btn-outline-danger mx-2 p-2 px-4" data-bs-dismiss="modal">Not Sure</button>
                            <button class="btn btn-outline-success mx-2 p-2 px-4 finish" id="finishTestBtn">End Session</button>                                
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-white py-3 px-md-5 px-3 shadow-lg w-100 fixed-bottom z-index-5">
                <div id="move_question" class="d-flex m-auto justify-content-between" style="max-width: 1400px;">
                    <button id="prev" class="btn btn-primary d-flex align-items-center">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" style="width: 20px;" class="me-1"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                        Previous
                    </button>
                    <button id="next" class="btn btn-primary d-flex align-items-center">
                        Next
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" style="width: 20px;" class="ms-1"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </button>
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
            let journeySetSlug = {!! str_replace("'", "\'", json_encode($journeySet['slug'])) !!};
            let sessionCode = {!! str_replace("'", "\'", json_encode($session['code'])) !!};
            let totalTimeTaken = {!! str_replace("'", "\'", json_encode($session['total_time_taken'])) !!};
            var total_page = 1;
            var current_page = 1;
            var total_answered = 0;
            var total_questions = 0;
            var current_question = 0;
            var time = 0;
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
                            // console.log(textStatus);
                        },
                    });
                } else {
                    $("#query_error_"+id).text("Please enter your query!");
                }
            });
            function openNav() {
                document.getElementById("mySidenav").style.width = "350px";
                $(".openNavToggle").attr("onclick","closeNav()")
                // document.getElementById("main").style.marginLeft = "350px";
            }
            function closeNav() {
                document.getElementById("mySidenav").style.width = "0";
                $(".openNavToggle").attr("onclick","openNav()")
                // document.getElementById("main").style.marginLeft= "0";
            }
            fetchjourneyQuestions('/journey/'+journeySetSlug+'/questions/'+sessionCode+'?page=1',1);
            function fetchjourneyQuestions(reqUrl, page) {
                $.ajax({
                    type: "GET",
                    url: reqUrl,
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        if(data){
                            let questions = data.questions;
                            let pagination = data.pagination;
                            total_answered = data.answered;
                            total_page = data.total_pages;
                            current_page = pagination.current_page;
                            total_questions = data.total;
                            $("#questions_attempted").text(data.answered);
                            let completePer = Math.round((total_answered / total_questions) * 100);
                            $("#progressBar").attr("style","width:"+completePer+"%");
                            $("#nav-tab").empty();
                            $("#nav-tabContent").empty();
                            $("#totalQues").text(data.total);
                            $("#questions_attempted").text(data.answered);
                            questions.forEach(function(question, i){
                                var index;
                                if(pagination.current_page > 1){
                                    index = pagination.current_page * pagination.per_page - 5 + (i + 1);
                                } else {
                                    index = ++i;
                                    i = --i;
                                }
                                let modal_btn = '';
                                let modal = '';
                                if(question.comprehension){
                                    modal_btn = `<div><button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#comprehension_`+question.code+`"><i class="fa fa-eye"></i> Comprehension</button></div>`;
                                    modal = `<div class="modal fade" id="comprehension_`+question.code+`" aria-labelledby="modalToggleLabel" tabindex="-1" style="display: none;"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-lg">
                                                    <div class="modal-content rounded-0 shadow">
                                                        <div class="modal-header">
                                                            <h2 class="h5 modal-title text-dark text-uppercase" id="modalToggleLabel">Comprehension passage</h2>
                                                            <button    class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body" id='comprehension_body'>`+question.comprehension+`</div>
                                                    </div>
                                                </div>
                                            </div>`;
                                }
                                wrong_ques_modal =  `<div class="modal fade" id="wrong_ques`+question.id+`" aria-labelledby="modalToggleLabel" tabindex="-1" style="display: none;" aria-hidden="true">
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
                                                                        <textarea class="form-control message_description_input shadow-none border" placeholder="Write Message" id="message_`+question.id+`"></textarea>
                                                                        <label for="message_`+question.id+`" class="text-dark text-uppercase">Description</label>
                                                                    </div>
                                                                    <div class="text-end my-3">
                                                                        <div id="query_error_`+question.id+`" class="my-2 small text-danger"></div>
                                                                        <button class="btn btn-success submit_question_issue" data-id="`+question.id+`">Message</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>`;
                                let button =    `<div class="video_btn_wrap">
                                                    <div class="text-black m-2">`+index+`.</div>
                                                    <button class="d-flex align-items-center mb-3 w-100 bg-light border-0 rounded-1 py-2 video_btn shadow-sm" data-index="`+index+`" data-page="`+pagination.current_page+`" id="video-tab-`+page+i+`" data-bs-toggle="tab" data-bs-target="#video-`+page+i+`"    role="tab" aria-controls="video-`+page+i+`" aria-selected="false">
                                                        <div class="video_title text-start font-size-13">`+question.question+`</div>
                                                    </button>
                                                </div>`;
                                let tab =   `<div class="bg-white tab-pane fade video_tab rounded-5" data-type="`+question.questionType+`" data-status="`+question.status+`" data-ques="`+question.id+`" data-id="`+question.code+`" id="video-`+page+i+`" role="tabpanel" aria-labelledby="video-tab-`+page+i+`" data-index="`+index+`">
                                                <div class="animate__animated animate__fadeIn">
                                                    <div class="my-2 font-size-13 d-flex justify-content-between align-items-center"> <div class='h6'><span class="fw-semibold">Q`+index+` of `+data.total+`</span> <span class="fw-normal text-uppercase">| `+question.skill+`</span></div> `+modal_btn+` </div>
                                                    <div class="question_title_container fw-semibold h5 my-4">`+question.question+`</div>
                                                    <div id="answer`+pagination.current_page+i+`"></div>
                                                </div>
                                                `+ wrong_ques_modal +`
                                            </div>`;
                                $("#nav-tab").append(button);
                                $("#nav-tabContent").append(tab+modal);
                                if(i == data.answered){
                                    $("#video-tab-"+page+i).addClass("active").attr("aria-selected", "true");
                                    $("#video-"+page+i).addClass("show active");
                                    if(pagination.current_page > 1){
                                        let test = pagination.current_page.toString() + 0 ;
                                        $("#active_video_num").text(parseInt(test) - 10 + index);
                                    } else {
                                        $("#active_video_num").text(index);
                                    }
                                }
                                if(question.status == 'answered'){
                                    var answer;
                                    if(question.questionType == "FIB"){
                                        answer = answeredFIB(question);
                                    } else if(question.questionType == "MSA"){
                                        answer = answeredMSA(question);
                                    } else if(question.questionType == "MMA"){
                                        answer = answeredMMA(question);
                                    } else if(question.questionType == "MTF"){
                                        answer = answeredMTF(question);
                                    } else if(question.questionType == "TOF"){
                                        answer = answeredTOF(question);
                                    } else if(question.questionType == "ORD"){
                                        answer = answeredORD(question);
                                    } else if(question.questionType == "SAQ"){
                                        answer = answeredSAQ(question);
                                    }
                                    $("#answer"+pagination.current_page+i).append(answer);
                                } else {
                                    var unanswer;
                                    if(question.questionType == "FIB"){
                                        unanswer = unansweredFIB(question);
                                    } else if(question.questionType == "MSA"){
                                        unanswer = unansweredMSA(question);
                                    } else if(question.questionType == "MMA"){
                                        unanswer = unansweredMMA(question);
                                    } else if(question.questionType == "MTF"){
                                        unanswer = unansweredMTF(question);
                                    } else if(question.questionType == "TOF"){
                                        unanswer = unansweredTOF(question);
                                    } else if(question.questionType == "ORD"){
                                        unanswer = unansweredORD(question);
                                    } else if(question.questionType == "SAQ"){
                                        unanswer = unansweredSAQ(question);
                                    }
                                    $("#answer"+pagination.current_page+i).append(unanswer);
                                }
                            });
                            $("p").find("img").each(function(){
                                $(this).attr("src", $(this).attr("src").replace("http://localhost", "")).addClass('img-thumbnail');
                            });
                            $("#current_page").text(pagination.current_page);
                            $("#total_page").text(pagination.total_pages);
                            // prev_page next_page
                           if(pagination.links){
                                if(pagination.links.previous){
                                    $("#prev_page").addClass("cursor-pointer").attr("data-url", pagination.links.previous);
                                } else {
                                    $("#prev_page").removeClass("cursor-pointer").attr("data-url", "");
                                }
                                if(pagination.links.next){
                                    $("#next_page").addClass("cursor-pointer").attr("data-url", pagination.links.next);
                                } else {
                                    $("#next_page").removeClass("cursor-pointer").attr("data-url", "");
                                }
                           }
                            current_question = $(".video_btn.active").data("index");
                            checkFinish(current_page, total_page, total_questions, total_answered, current_question);
                        }
                    },
                    error: function(data, textStatus, errorThrown) {
                        // console.log(textStatus);
                    },
                });
            }
            startTimer();
            function startTimer(){
                setInterval(incrementTime, 1000);
            }
            function incrementTime() {
                let status = $(".video_tab.active").data("status");
                totalTimeTaken = totalTimeTaken + 1;
                if(status != 'answered'){
                    time = time + 1;
                }
            }
            $(document).on('click', '.video_btn', function(){ 
                stopTimer();
                let index = $(this).data("index");
                $("#next").removeClass("d-none");
                $("#submit").remove();
                $(".answer_inp").val("");
                $(".MSA_inp").removeClass('border-success bg-success bg-opacity-25 active');
                $(".MSA_inp").siblings("span").removeClass('border-success bg-success bg-opacity-25 border-opacity-10');
                $(".MMA_inp").removeClass("active");
                checkFinish(current_page, total_page, total_questions, total_answered, index)
            });
            function stopTimer(){
                time = 0;
            }
            $(document).on('keyup', '.answer_inp', function(){
                var myArray = [];
                $(this).parents(".answer_wrap").find(".answer_inp").each(function(i){
                    myArray.push($(this).val());
                });
                if(checkEmptyVal(myArray) && $("#submit").length < 1) {
                    let type = $(".video_tab.active").data("type");
                    $("#next").addClass("d-none");
                    $("#finish").addClass("d-none");
                    $("#move_question").append('<button id="submit" data-type="'+type+'" class="btn btn-primary text-capitalize text-white px-4">submit</button>')
                } else if (!checkEmptyVal(myArray)){
                    $("#next").removeClass("d-none");
                    $("#finish").removeClass("d-none");
                    $("#submit").remove();
                }
            });
            function checkEmptyVal(arr) {
                return arr.indexOf("") === -1;
            }
            $(document).on('click', '#next', function(){
                let hasNext = $(".video_btn.active").parent().nextAll().length;
                if(hasNext > 0){
                    $(".video_btn.active").parent().next().find(".video_btn").click();
                }
                if(hasNext <= 1){
                    $(this).attr("id","finish").text("Finish");
                }
            });
            $(document).on('click', '#prev', function(){
                let hasPrev = $(".video_btn.active").parent().prevAll().not(".questions_attempted").length;
                let hasNext = $(".video_btn.active").parent().nextAll().length;
                if(hasPrev > 0){
                    $(".video_btn.active").parent().prev().find(".video_btn").click();
                }
                if(hasNext <= 0 && $("#next").length <= 0){
                    let nextBtn = '<button id="next" class="btn btn-primary d-flex align-items-center">Next<svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" style="width: 20px;" class="ms-1"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg></button>';
                    $("#move_question").append(nextBtn);
                }
                $("#finish").remove();
            });
            $(document).on('click', '#submit', function(){
                total_answered = total_answered + 1;
                let index = $(".video_btn.active").data("index");
                let type = $(".video_tab.active").data("type");
                $(".submit_loading").removeClass("d-none");
                $(".submit_loading").addClass("screen_locked");
                setTimeout(() => {
                    $(".submit_loading").addClass("d-none");
                    $(".submit_loading").removeClass("screen_locked");
                }, 1900);
                if(type == "FIB"){
                    var myArray = [];
                    $(".video_tab.active").find(".answer_inp").each(function(i){
                        myArray.push(escapeHtmlEntities($(this).val()));
                    });
                    submitFIB(myArray);
                } else if(type == "MSA"){
                    let MSA_answer = $(".video_tab.active").find(".MSA_inp.active").data("id")
                    submitMSA(MSA_answer);
                } else if(type == "MMA"){
                    let MMA_answer = [];
                    $(".video_tab.active").find(".MMA_inp").each(function(i) {
                        let active = $(this).hasClass("active");
                        if(active){
                            MMA_answer.push(++i);
                        }
                    });
                    submitMMA(MMA_answer);
                } else if(type == "MTF"){
                    let MTF_answer = [];
                    $(".video_tab.active").find(".drop_card").each(function(i) {
                        let id = $(this).find(".form-control").data("match_id");
                        let code = $(this).find(".form-control").data("match_code");
                        let value = $(this).find(".form-control").text();
                        MTF_answer.push({id: id, value: value, code: code});
                    });
                    submitMTF(MTF_answer);
                } else if(type == "TOF"){
                    let TOF_answer = $(".video_tab.active").find(".MSA_inp.active").data("id")
                    submitTOF(TOF_answer);
                } else if(type == "ORD"){
                    let ORD_answer = [];
                    $(".video_tab.active").find(".drop_card").each(function(i) {
                        let id = $(this).find(".form-control").data("match_id");
                        let code = $(this).find(".form-control").data("match_code");
                        let value = $(this).find(".form-control").text();
                        ORD_answer.push({id: id, value: value, code: code});
                    });
                    submitORD(ORD_answer);
                } else if(type == "SAQ"){
                    let value = $(".video_tab.active").find(".answer_inp").val();
                    submitSAQ(escapeHtmlEntities(value));
                }
                checkFinish(current_page, total_page, total_questions, total_answered, index);
                // if(index == total_questions){
                //     $("#move_question").append('<button id="finish" class="btn text-white custom-btn fw-light px-4 finish">Finish</button>');
                // }
            });
            $(document).on('click', '.finish, #finish', function(){
                $.ajax({
                    type: "POST",
                    url: '/journey/'+journeySetSlug+'/finish/'+sessionCode,
                    data: {
                        replace: true,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        if(data){
                            window.location.href = "/journey/"+journeySetSlug+"/analysis/"+sessionCode;
                        }
                    },
                    error: function(data, textStatus, errorThrown) {
                    },
                });
            });
            $(".move_page").click(function(){
                let url = $(this).attr("data-url");
                if(url && url != ""){
                    fetchjourneyQuestions(url,1);
                }
            });
            $(document).on('click', '.MSA_inp_wrap', function(){
                let type = $(".video_tab.active").data("type");
                $(this).addClass('bg-success border-success').removeClass('border-primary');
                $(this).find(".MSA_inp").addClass('active text-white');
                $(this).siblings().find(".MSA_inp").removeClass('active text-white');
                $(this).siblings().removeClass('bg-success border-success').addClass('border-primary');
                // $(this).siblings('span').addClass('border-success bg-success bg-opacity-25 border-opacity-10');
                // $(this).parents(".input-group").siblings().find('span').removeClass('border-success bg-success bg-opacity-25 border-opacity-10');
                // $(this).parents(".input-group").siblings().find('.MSA_inp').removeClass('border-success bg-success bg-opacity-25 active');
                if($("#submit").length < 1) {
                    $("#next").addClass("d-none");
                    $("#finish").addClass("d-none");
                    $("#move_question").append('<button id="submit" data-type="'+type+'" class="btn btn-primary text-capitalize text-white px-4">submit</button>')
                }
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
                let type = $(".video_tab.active").data("type");
                let answered = $(".video_tab.active").find(".MMA_inp.active").length;
                if(answered > 0){
                    if($("#submit").length < 1) {
                        $("#next").addClass("d-none");
                        $("#finish").addClass("d-none");
                        $("#move_question").append('<button id="submit" data-type="'+type+'" class="btn btn-primary text-capitalize text-white px-4">submit</button>')
                    }
                } else {
                    $("#next").removeClass("d-none");
                    $("#move_question").find("#submit").remove();
                }
            });
            // FIB Starts //
            function answeredFIB(question){
                let options = [];
                let answers = [];
                question.user_answer.forEach(function(answer, i) {
                    if(answer.toLowerCase() == question.ca[i].toLowerCase()){
                        options.push('<div class="border border-2 border-success bg-success text-white shadow-sm input-group my-2 p-3 py-2 rounded-4 align-items-center font-size-14"><span class="align-self-center bg-opacity-10 border-0 fw-semibold input-group-text p-0 px-2 rounded-circle me-2">'+(++i)+'</span> '+answer+'</div>');
                    } else {
                        options.push('<div class="border border-2 border-danger bg-danger text-white shadow-sm input-group my-2 p-3 py-2 rounded-4 align-items-center font-size-14"><span class="align-self-center bg-opacity-10 border-0 fw-semibold input-group-text p-0 px-2 rounded-circle me-2">'+(++i)+'</span> '+answer+'</div>');
                    }
                });
                question.ca.forEach(function(answer, i) {
                    answers.push('<span>'+(++i)+'. '+answer+' </span>');
                });
                var anwerwrap;
                if(question.ca.length > 1){
                    anwerwrap = '<div class="alert alert-success border border-2 border-success font-size-14 mt-3 rounded-4 text-dark"><i class="fa fa-bolt-lightning me-1 text-success"></i>Correct answers for the blanks are '+answers.join("")+' </div>'
                } else {
                    anwerwrap = '<div class="alert alert-success border border-2 border-success font-size-14 mt-3 rounded-4 text-dark"><i class="fa fa-bolt-lightning me-1 text-success"></i>Correct answer for the blank is '+answers.join("")+' </div>'
                }
                let tab = `<div>`+options.join("")+anwerwrap+`</div>`;
                return tab;
            }
            function unansweredFIB(question){
                let input = "";
                for (let i = 0; i < question.options; i++) {
                    let index = i+1;
                      input +=  `<div class="border border-2 border-primary input-group my-2 p-3 py-2 rounded-4  animate__animated animate__fadeInRight animate__slow">
                                    <span class="bg-opacity-10 border-0 fw-semibold input-group-text align-self-center p-0 px-2 rounded-circle small">`+index+`</span>
                                    <input type="text" class="answer_inp bg-transparent border-0 form-control ms-1 shadow-none" placeholder="Type your answer for blank `+index+`">
                                </div>`;
                }
                let tab =  `<div class="d-inline-block font-size-14 fw-semibold my-2 notice py-1 rounded text-uppercase">Fill the blanks in the below text boxes</div>
                            <div class="answer_wrap">`+input+`</div>`;
                return tab;
            }
            function submitFIB(myArray) {
                $.ajax({
                    type: "POST",
                    url: '/check_journey_answer/'+journeySetSlug+'/'+sessionCode,
                    data: {
                        question_id: $(".video_tab.active").data("id"),
                        time_taken: time,
                        total_time_taken: totalTimeTaken,
                        user_answer: myArray,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        if(data){
                            stopTimer();
                            $("#submit").remove();
                            $("#next").removeClass("d-none");
                            $(".video_tab.active").find(".notice").remove();
                            $("#questions_attempted").text(data.answered);
                            let options = [];
                            let answers = [];
                            let completePer = Math.round((data.answered / total_questions) * 100);
                            $("#progressBar").attr("style","width:"+completePer+"%");
                            myArray.forEach(function(answer, i) {
                                if(answer.toLowerCase() == data.ca[i].toLowerCase()){
                                    options.push('<div class="border border-2 border-success bg-success text-white shadow-sm input-group my-2 p-3 py-2 rounded-4 align-items-center font-size-14"><span class="align-self-center bg-opacity-10 border-0 fw-semibold input-group-text p-0 px-2 rounded-circle me-2">'+(++i)+'</span> '+answer+'</div>');
                                } else {
                                    options.push('<div class="border border-2 border-danger bg-danger text-white shadow-sm input-group my-2 p-3 py-2 rounded-4 align-items-center font-size-14"><span class="align-self-center bg-opacity-10 border-0 fw-semibold input-group-text p-0 px-2 rounded-circle me-2">'+(++i)+'</span> '+answer+'</div>');
                                }
                            });
                            data.ca.forEach(function(answer, i) {
                                answers.push('<span>'+(++i)+'. '+answer+' </span>');
                            });
                            var anwerwrap;
                            if(data.ca.length > 1){
                                anwerwrap = '<div class="alert alert-success border border-2 border-success font-size-14 mt-3 rounded-4 text-dark"><i class="fa fa-bolt-lightning me-1 text-success"></i>Correct answers for the blanks are '+answers.join("")+' </div>'
                            } else {
                                anwerwrap = '<div class="alert alert-success border border-2 border-success font-size-14 mt-3 rounded-4 text-dark"><i class="fa fa-bolt-lightning me-1 text-success"></i>Correct answer for the blank is '+answers.join("")+' </div>'
                            }
                            let tab = `<div class="mt-3">`+options.join("")+anwerwrap+`</div>`;
                            $(".video_tab.active").find(".answer_wrap").empty().append(tab);
                        }
                    },
                    error: function(data, textStatus, errorThrown) {
                    },
                });
            }
            // FIB Ends //
            // MSA Starts //
            function answeredMSA(question) {
                let input = "";
                let correctAnswer = "";
                question.options.forEach(function(option, i) {
                    let index = i+1;
                    if(question.user_answer == index){
                        if(question.is_correct){
                            input +=  `<div class="border border-2 border-success bg-success input-group my-2 p-3 py-2 rounded-4">
                                    <span class="bg-opacity-10 border-0 fw-semibold input-group-text align-self-center p-0 px-2 rounded-circle small">`+index+`</span>
                                    <div class="bg-transparent border-0 form-control ms-1 shadow-none text-white select_wrap">`+option+`</div>
                                </div>`;
                        } else {
                            input +=  `<div class="border border-2 border-danger bg-danger input-group my-2 p-3 py-2 rounded-4">
                                    <span class="bg-opacity-10 border-0 fw-semibold input-group-text align-self-center p-0 px-2 rounded-circle small">`+index+`</span>
                                    <div class="bg-transparent border-0 form-control ms-1 shadow-none text-white select_wrap">`+option+`</div>
                                </div>`;
                        }
                    } else {
                        input +=  `<div class="border border-2 border-primary input-group my-2 p-3 py-2 rounded-4">
                                    <span class="bg-opacity-10 border-0 fw-semibold input-group-text align-self-center p-0 px-2 rounded-circle small">`+index+`</span>
                                    <div class="bg-transparent border-0 form-control ms-1 shadow-none select_wrap">`+option+`</div>
                                </div>`;
                    }
                correctAnswer = `<div class="alert alert-success border border-2 border-success font-size-14 mt-3 rounded-4 text-dark"><i class="fa fa-bolt-lightning me-1 text-success"></i>Correct answer is Option `+question.ca+`</div>`;
                });
                let tab =  `<div class="answer_wrap">`+input+correctAnswer+`</div>`;
                return tab;
            }
            function unansweredMSA(question) {
                let input = "";
                question.options.forEach(function(option, i) {
                    let index = i+1;
                    input +=  `<div class="border border-2 border-primary input-group my-2 p-3 py-2 rounded-4 MSA_inp_wrap  animate__animated animate__fadeInRight animate__slow">
                        <span class="bg-opacity-10 border-0 fw-semibold input-group-text align-self-center p-0 px-2 rounded-circle small">`+index+`</span>
                        <div class="bg-transparent border-0 form-control ms-1 shadow-none cursor-pointer MSA_inp select_wrap" data-id="`+index+`">`+option+`</div>
                    </div>`;
                });
                let tab =  `<div class="d-inline-block font-size-14 fw-semibold my-2 notice py-1 rounded text-uppercase">Choose one option</div>
                            <div class="answer_wrap">`+input+`</div>`;
                return tab;
            }
            function submitMSA(answer) {
                $.ajax({
                    type: "POST",
                    url: '/check_journey_answer/'+journeySetSlug+'/'+sessionCode,
                    data: {
                        question_id: $(".video_tab.active").data("id"),
                        time_taken: time,
                        total_time_taken: totalTimeTaken,
                        user_answer: answer,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        stopTimer();
                        $("#next").removeClass("d-none");
                        $("#submit").remove();
                        $("#questions_attempted").text(data.answered);
                        let completePer = Math.round((data.answered / total_questions) * 100);
                        $("#progressBar").attr("style","width:"+completePer+"%");
                        if(!data.is_correct){
                            $(".video_tab.active").find(".MSA_inp_wrap").each(function(i){
                                if(++i == data.ca){
                                    $(this).addClass('bg-success border-success').removeClass('border-primary').find(".MSA_inp").addClass('text-white');
                                }
                            });
                            $(".MSA_inp.active").parent().removeClass('bg-success border-success').addClass('bg-danger border-danger');
                        }
                        $(".video_tab.active").find(".notice").remove();
                        $(".video_tab.active").find(".MSA_inp_wrap").removeClass("MSA_inp_wrap cursor-pointer");
                        $(".video_tab.active").find(".MSA_inp").removeClass("MSA_inp active cursor-pointer");
                        $(".video_tab.active").find(".answer_wrap").append('<div class="alert alert-success border border-2 border-success font-size-14 mt-3 rounded-4 text-dark"><i class="fa fa-bolt-lightning me-1 text-success"></i>Correct answer is Option '+data.ca+'</div>');
                    },
                    error: function(data, textStatus, errorThrown) {
                    },
                });
            }
            // MSA Ends //
            // MMA Starts //
            function answeredMMA(question) {
                let input = "";
                question.options.forEach(function(option, i) {
                    let index = i+1;
                    if(question.is_correct){
                        input +=  `<div class="border border-2 border-success bg-success input-group my-2 p-3 py-2 rounded-4 MMA_wrap correct">
                                        <span class="input-group-text px-3">`+index+`</span>
                                        <div class="form-control shadow-none border-secondary border-opacity-25 select_wrap" data-id="`+index+`">`+option+`</div>
                                    </div>`;
                    } else {
                        if(question.user_answer.includes(index.toString())){
                            if(question.ca.includes(index.toString())){
                                input +=  `<div class="border border-2 border-success bg-success input-group my-2 p-3 py-2 rounded-4 MMA_wrap correct">
                                        <span class="bg-opacity-10 border-0 fw-semibold input-group-text align-self-center p-0 px-2 rounded-circle small bg-light">`+index+`</span>
                                        <div class="bg-transparent border-0 form-control ms-1 shadow-none text-white select_wrap" data-id="`+index+`">`+option+`</div>
                                    </div>`;
                            } else {
                                input +=  `<div class="border border-2 border-danger bg-danger input-group my-2 p-3 py-2 rounded-4 MMA_wrap incorrect">
                                        <span class="bg-opacity-10 border-0 fw-semibold input-group-text align-self-center p-0 px-2 rounded-circle small bg-light">`+index+`</span>
                                        <div class="bg-transparent border-0 form-control ms-1 shadow-none text-white select_wrap" data-id="`+index+`">`+option+`</div>
                                    </div>`;
                            }
                        } else {
                            input +=  `<div class="border border-2 border-primary input-group my-2 p-3 py-2 rounded-4 MMA_wrap">
                                        <span class="bg-opacity-10 border-0 fw-semibold input-group-text align-self-center p-0 px-2 rounded-circle small">`+index+`</span>
                                        <div class="bg-transparent border-0 form-control ms-1 shadow-none select_wrap" data-id="`+index+`">`+option+`</div>
                                    </div>`;
                        }
                    }
                });
                let tab =  `<div class="answer_wrap">`+input+`<div class="alert alert-success border border-2 border-success font-size-14 mt-3 rounded-4 text-dark"><i class="fa fa-bolt-lightning me-1 text-success"></i>Correct answers are option `+question.ca.join(", ")+`</div></div>`;
                return tab;
            }
            function unansweredMMA(question) {
                let input = "";
                question.options.forEach(function(option, i) {
                    let index = i+1;
                    input +=  `<div class="border border-2 border-primary input-group my-2 p-3 py-2 rounded-4 MMA_inp cursor-pointer  animate__animated animate__fadeInRight animate__slow">
                                    <span class="bg-opacity-10 border-0 fw-semibold input-group-text align-self-center p-0 px-2 rounded-circle small">`+index+`</span>
                                    <div class="bg-transparent border-0 form-control ms-1 shadow-none select_wrap" data-id="`+index+`">`+option+`</div>
                                </div>`;
                });
                let tab =  `<div class="d-inline-block font-size-14 fw-semibold my-2 notice py-1 rounded text-uppercase">Choose multiple option</div>
                            <div class="answer_wrap">`+input+`</div>`;
                return tab;
            }
            function submitMMA(answer) {
                $.ajax({
                    type: "POST",
                    url: '/check_journey_answer/'+journeySetSlug+'/'+sessionCode,
                    data: {
                        question_id: $(".video_tab.active").data("id"),
                        time_taken: time,
                        total_time_taken: totalTimeTaken,
                        user_answer: answer,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        stopTimer();
                        $("#next").removeClass("d-none");
                        $("#submit").remove();
                        $(".video_tab.active").find(".MMA_inp").removeClass("active");
                        $("#questions_attempted").text(data.answered);
                        let completePer = Math.round((data.answered / total_questions) * 100);
                        $("#progressBar").attr("style","width:"+completePer+"%");
                        if(data.is_correct){
                            answer.forEach(function(a, i){
                                decrement = a-1;
                                $(".video_tab.active").find(".MMA_inp").eq(decrement).removeClass("border-primay").addClass("border-success bg-success correct")
                                $(".video_tab.active").find(".MMA_inp").eq(decrement).find("div").addClass("text-white");
                                $(".video_tab.active").find(".MMA_inp").eq(decrement).find("span").addClass("bg-light");
                            });
                        } else {
                            answer.forEach(function(a, i){
                                decrement = a-1;
                                data.ca.forEach(function(correctAns, ca) {
                                    if(a == correctAns){
                                        $(".video_tab.active").find(".MMA_inp").eq(decrement).removeClass("border-primay").addClass("border-success bg-success correct")
                                        $(".video_tab.active").find(".MMA_inp").eq(decrement).find("div").addClass("text-white");
                                        $(".video_tab.active").find(".MMA_inp").eq(decrement).find("span").addClass("bg-light");
                                    }
                                });
                                if(!data.ca.includes(a.toString())){
                                    $(".video_tab.active").find(".MMA_inp").eq(decrement).removeClass("border-primay").addClass("border-danger bg-danger incorrect")
                                    $(".video_tab.active").find(".MMA_inp").eq(decrement).find("div").addClass("text-white");
                                    $(".video_tab.active").find(".MMA_inp").eq(decrement).find("span").addClass("bg-light");
                                }
                            });
                        }
                        $(".video_tab.active").find(".MMA_inp").addClass("MMA_wrap").removeClass("MMA_inp");
                        let tab = `<div class="alert alert-success border border-2 border-success font-size-14 mt-3 rounded-4 text-dark"><i class="fa fa-bolt-lightning me-1 text-success"></i>Correct answers are option `+data.ca.join(", ")+`</div>`;
                        $(".video_tab.active").find(".answer_wrap").append(tab);
                    },
                    error: function(data, textStatus, errorThrown) {
                    },
                });
            }
            // MMA Ends //
            // MTF Starts //
            function answeredMTF(question) {
                let matches = "";
                let pairs = "";
                question.options.matches.forEach(function(match, i) {
                    let index = i+1;
                    matches +=  `<div class="border border-2 border-primary input-group my-2 p-3 py-2 rounded-4">
                                    <span class="bg-opacity-10 border-0 fw-semibold input-group-text align-self-center p-0 px-2 rounded-circle small">`+index+`</span>
                                    <div class="bg-transparent border-0 form-control ms-1 shadow-none" data-id="`+index+`" data-match_id=`+match.id+`>`+match.value+`</div>
                                </div>`;
                });
                question.user_answer.forEach(function(pair , i) {
                    let index = i+1;
                    if (pair.id == question.ca[i]) {
                        pairs += `<div class="input-group my-2 p-3 py-2 rounded-4 bg-success border border-2 border-success">
                                    <span class="bg-opacity-10 border-0 fw-semibold input-group-text align-self-center p-0 px-2 rounded-2 small">`+index+`</span>
                                    <div class="bg-transparent border-0 form-control ms-1 shadow-none text-white" data-id="`+index+`" data-match_id=`+pair.id+`>`+pair.value+`</div>
                                </div>`;
                    } else {
                        pairs += `<div class="input-group my-2 p-3 py-2 rounded-4 bg-danger border border-2 border-danger">
                                    <span class="bg-opacity-10 border-0 fw-semibold input-group-text align-self-center p-0 px-2 rounded-2 small">`+index+`</span>
                                    <div class="bg-transparent border-0 form-control ms-1 shadow-none text-white" data-id="`+index+`" data-match_id=`+pair.id+`>`+pair.value+`</div>
                                </div>`;
                    }
                });

                let tab =  `<div class="d-inline-block font-size-14 fw-semibold my-2 notice py-1 rounded text-uppercase">
                                Match the following by drag and drop right side items
                                </div>
                                <div class="answer_wrap row">
                                    <div class="col-6">`+matches+`</div>
                                    <div class="col-6">`+pairs+`</div>
                                </div>`;
                return tab;
            }
            function unansweredMTF(question) {
                let matches = "";
                let pairs = "";
                const myTimeout = setTimeout(Dragable, 500, question.code);
                question.options.matches.forEach(function(match, i) {
                    let index = i+1;
                    matches +=  `<div class="border border-2 border-primary input-group my-2 p-3 py-2 rounded-4 animate__animated animate__fadeInLeft animate__slow">
                                    <span class="bg-opacity-10 border-0 fw-semibold input-group-text align-self-center p-0 px-2 rounded-circle small">`+index+`</span>
                                    <div class="bg-transparent border-0 form-control ms-1 shadow-none" data-id="`+index+`" data-match_id=`+match.id+`>`+match.value+`</div>
                                </div>`;
                });
                question.options.pairs.forEach(function(pair, i) {
                    let index = i+1;
                    // index - pair.id - pair.value
                    pairs +=  `<div class="border border-2 border-primary input-group my-2 p-3 py-2 rounded-4 bg-white drop_card animate__animated animate__fadeInRight animate__slow" ondragend="drop(event)">
                                    <span class="bg-opacity-10 border-0 fw-semibold input-group-text align-self-center p-0 px-2 rounded-2 small"><span class="MTF_index me-1">`+index+` </span> - `+pair.code+`</span>
                                    <div class="bg-transparent border-0 form-control ms-1 shadow-none" data-id="`+index+`" data-match_id=`+pair.id+` data-match_code=`+pair.code+`>`+pair.value+`</div>
                                </div>`;
                });
                let tab =  `<div class="d-inline-block font-size-14 fw-semibold my-2 notice py-1 rounded text-uppercase">
                            Match the following by drag and drop right side items
                            </div>
                            <div class="answer_wrap row">
                                <div class="col-6">`+matches+`</div>
                                <div class="col-6 drop"><div class="drop_container" id="drop_items_`+question.code+`">`+pairs+`</div></div>
                            </div>`;
                return tab;
            }
            function submitMTF(answer) {
                $.ajax({
                    type: "POST",
                    url: '/check_journey_answer/'+journeySetSlug+'/'+sessionCode,
                    data: {
                        question_id: $(".video_tab.active").data("id"),
                        time_taken: time,
                        total_time_taken: totalTimeTaken,
                        user_answer: answer,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        let matches = "";
                        stopTimer();
                        $("#next").removeClass("d-none");
                        $("#submit").remove();
                        $(".video_tab.active").find(".notice").remove();
                        $("#questions_attempted").text(data.answered);
                        let completePer = Math.round((data.answered / total_questions) * 100);
                        $("#progressBar").attr("style","width:"+completePer+"%");
                        answer.forEach(function(match, i) {
                            let index = i+1;
                            if(answer[i].id == data.ca[i]){
                                matches +=  `<div class="input-group my-2 p-3 py-2 rounded-4 bg-success border border-2 border-success">
                                            <span class="bg-opacity-10 border-0 fw-semibold input-group-text align-self-center p-0 px-2 rounded-2 small">`+index+` - `+match.code+`</span>
                                            <div class="bg-transparent border-0 form-control ms-1 shadow-none text-white" data-id="`+index+`" data-match_id=`+match.id+`>`+match.value+`</div>
                                        </div>`;
                            } else {
                                matches +=  `<div class="input-group my-2 p-3 py-2 rounded-4 bg-danger border border-2 border-danger">
                                            <span class="bg-opacity-10 border-0 fw-semibold input-group-text align-self-center p-0 px-2 rounded-2 small">`+index+` - `+match.code+`</span>
                                            <div class="bg-transparent border-0 form-control ms-1 shadow-none text-white" data-id="`+index+`" data-match_id=`+match.id+`>`+match.value+`</div>
                                        </div>`;
                            }
                        });
                        $(".video_tab.active").find(".drop").empty().append(matches);
                    },
                    error: function(data, textStatus, errorThrown) {
                    },
                });
            }
            // MTF Ends //
            // TOF Starts //
            function answeredTOF(question) {
                let input = "";
                let correctAnswer = "";
                question.options.forEach(function(option, i) {
                    let index = i+1;
                    if(question.user_answer == index){
                        if(question.is_correct){
                            input +=  `<div class="border border-2 border-success bg-success input-group my-2 p-3 py-2 rounded-4">
                                    <span class="bg-opacity-10 border-0 fw-semibold input-group-text align-self-center p-0 px-2 rounded-circle small">`+index+`</span>
                                    <div class="bg-transparent border-0 form-control ms-1 shadow-none text-white select_wrap">`+option+`</div>
                                </div>`;
                        } else {
                            input +=  `<div class="border border-2 border-danger bg-danger input-group my-2 p-3 py-2 rounded-4">
                                    <span class="bg-opacity-10 border-0 fw-semibold input-group-text align-self-center p-0 px-2 rounded-circle small">`+index+`</span>
                                    <div class="bg-transparent border-0 form-control ms-1 shadow-none text-white select_wrap">`+option+`</div>
                                </div>`;
                        }
                    } else {
                        input +=  `<div class="border border-2 border-primary input-group my-2 p-3 py-2 rounded-4">
                                    <span class="bg-opacity-10 border-0 fw-semibold input-group-text align-self-center p-0 px-2 rounded-circle small">`+index+`</span>
                                    <div class="bg-transparent border-0 form-control ms-1 shadow-none select_wrap">`+option+`</div>
                                </div>`;
                    }
                correctAnswer = `<div class="alert alert-success border border-2 border-success font-size-14 mt-3 rounded-4 text-dark"><i class="fa fa-bolt-lightning me-1 text-success"></i>Correct answer is Option `+question.ca+`</div>`;
                });
                let tab =  `<div class="answer_wrap">`+input+correctAnswer+`</div>`;
                return tab;
            }
            function unansweredTOF(question) {
                let input = "";
                question.options.forEach(function(option, i) {
                    let index = i+1;
                    input +=  `<div class="border border-2 border-primary input-group my-2 p-3 py-2 rounded-4 MSA_inp_wrap animate__animated animate__fadeInRight animate__slow">
                                    <span class="bg-opacity-10 border-0 fw-semibold input-group-text align-self-center p-0 px-2 rounded-circle small">`+index+`</span>
                                    <div class="bg-transparent border-0 form-control ms-1 shadow-none cursor-pointer MSA_inp select_wrap" data-id="`+index+`">`+option+`</div>
                                </div>`;
                });
                let tab =  `<div class="d-inline-block font-size-14 fw-semibold my-2 notice py-1 rounded text-uppercase">Choose one option</div>
                            <div class="answer_wrap">`+input+`</div>`;
                return tab;
            }
            function submitTOF(answer) {
                $.ajax({
                    type: "POST",
                    url: '/check_journey_answer/'+journeySetSlug+'/'+sessionCode,
                    data: {
                        question_id: $(".video_tab.active").data("id"),
                        time_taken: time,
                        total_time_taken: totalTimeTaken,
                        user_answer: answer,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        stopTimer();
                        $("#next").removeClass("d-none");
                        $("#submit").remove();
                        $("#questions_attempted").text(data.answered);
                        let completePer = Math.round((data.answered / total_questions) * 100);
                        $("#progressBar").attr("style","width:"+completePer+"%");
                        if(!data.is_correct){
                            $(".video_tab.active").find(".MSA_inp_wrap").each(function(i){
                                if(++i == data.ca){
                                    $(this).addClass('bg-success border-success').removeClass('border-primary').find(".MSA_inp").addClass('text-white');
                                }
                            });
                            $(".MSA_inp.active").parent().removeClass('bg-success border-success').addClass('bg-danger border-danger');
                        }
                        $(".video_tab.active").find(".notice").remove();
                        $(".video_tab.active").find(".MSA_inp_wrap").removeClass("MSA_inp_wrap cursor-pointer");
                        $(".video_tab.active").find(".MSA_inp").removeClass("MSA_inp active cursor-pointer");
                        $(".video_tab.active").find(".answer_wrap").append('<div class="alert alert-success border border-2 border-success font-size-14 mt-3 rounded-4 text-dark"><i class="fa fa-bolt-lightning me-1 text-success"></i>Correct answer is Option '+data.ca+'</div>');
                    },
                    error: function(data, textStatus, errorThrown) {
                    },
                });
            }
            // TOF Ends //
            // ORD Starts //
            function answeredORD(question) {
                let orders = "";
                question.user_answer.forEach(function(order , i) {
                    let index = i+1;
                    if (order.id == question.ca[i]) {
                        orders += `<div class="input-group my-2 p-3 py-2 rounded-4 bg-success border border-2 border-success">
                                    <span class="bg-opacity-10 border-0 fw-semibold input-group-text align-self-center p-0 px-2 rounded-circle   small">`+index+`</span>
                                    <div class="bg-transparent border-0 form-control ms-1 shadow-none text-white" data-id="`+index+`" data-match_id=`+order.id+`>`+order.value+`</div>
                                </div>`;
                    } else {
                        orders += `<div class="input-group my-2 p-3 py-2 rounded-4 bg-danger border border-2 border-danger">
                                    <span class="bg-opacity-10 border-0 fw-semibold input-group-text align-self-center p-0 px-2 rounded-circle   small">`+index+`</span>
                                    <div class="bg-transparent border-0 form-control ms-1 shadow-none text-white" data-id="`+index+`" data-match_id=`+order.id+`>`+order.value+`</div>
                                </div>`;
                    }
                });

                let tab =  `<div class="answer_wrap">`+orders+`</div>`;
                return tab;
            }
            function unansweredORD(question) {
                let order = "";
                const myTimeout = setTimeout(Dragable, 500, question.code);
                question.options.forEach(function(ord, i) {
                    let index = i+1;
                    order +=  `<div class="border border-2 border-primary input-group my-2 p-3 py-2 rounded-4 bg-white drop_card  animate__animated animate__fadeInRight animate__slow" ondragend="drop(event)">
                                    <span class="bg-opacity-10 border-0 fw-semibold input-group-text align-self-center p-0 px-2 rounded-circle small"><span class="MTF_index me-1">`+index+` </span> - `+ord.code+`</span>
                                    <div class="bg-transparent border-0 form-control ms-1 shadow-none" data-id="`+index+`" data-match_id=`+ord.id+` data-match_code=`+ord.code+`>`+ord.value+`</div>
                                </div>`;
                });
                let tab =  `<div class="d-inline-block font-size-14 fw-semibold my-2 notice py-1 rounded text-uppercase">
                            Arrange the following in order by drag and drop the items
                            </div>
                            <div class="answer_wrap">
                                <div class="drop"><div class="drop_container" id="drop_items_`+question.code+`">`+order+`</div></div>
                            </div>`;
                return tab;
            }
            function submitORD(answer) {
                $.ajax({
                    type: "POST",
                    url: '/check_journey_answer/'+journeySetSlug+'/'+sessionCode,
                    data: {
                        question_id: $(".video_tab.active").data("id"),
                        time_taken: time,
                        total_time_taken: totalTimeTaken,
                        user_answer: answer,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        let matches = "";
                        stopTimer();
                        $("#next").removeClass("d-none");
                        $("#submit").remove();
                        $(".video_tab.active").find(".notice").remove();
                        $("#questions_attempted").text(data.answered);
                        let completePer = Math.round((data.answered / total_questions) * 100);
                        $("#progressBar").attr("style","width:"+completePer+"%");
                        answer.forEach(function(match, i) {
                            let index = i+1;
                            if(answer[i].id == data.ca[i]){
                                matches +=  `<div class="input-group my-2 p-3 py-2 rounded-4 bg-success border border-2 border-success">
                                            <span class="bg-opacity-10 border-0 fw-semibold input-group-text align-self-center p-0 px-2 rounded-3 small">`+index+` - `+match.code+`</span>
                                            <div class="bg-transparent border-0 form-control ms-1 shadow-none text-white" data-id="`+index+`" data-match_id=`+match.id+`>`+match.value+`</div>
                                        </div>`;
                            } else {
                                matches +=  `<div class="input-group my-2 p-3 py-2 rounded-4 bg-danger border border-2 border-danger">
                                            <span class="bg-opacity-10 border-0 fw-semibold input-group-text align-self-center p-0 px-2 rounded-3 small">`+index+` - `+match.code+`</span>
                                            <div class="bg-transparent border-0 form-control ms-1 shadow-none text-white" data-id="`+index+`" data-match_id=`+match.id+`>`+match.value+`</div>
                                        </div>`;
                            }
                        });
                        $(".video_tab.active").find(".drop").empty().append(matches);
                    },
                    error: function(data, textStatus, errorThrown) {
                    },
                });
            }
            // ORD Ends //
            // SAQ Starts //
            function answeredSAQ(question) {
                let tab, correctAnswers;
                if(question.is_correct) {
                    tab = `<div class="border border-2 border-success bg-success input-group my-2 p-3 py-2 rounded-4">
                                    <span class="bg-opacity-10 border-0 fw-semibold input-group-text align-self-center p-0 px-2 rounded-circle small">1</span>
                                    <div class="bg-transparent border-0 form-control ms-1 shadow-none text-white">`+question.user_answer+`</div>
                                </div>`
                } else {
                    tab = `<div class="border border-2 border-danger bg-danger input-group my-2 p-3 py-2 rounded-4">
                                    <span class="bg-opacity-10 border-0 fw-semibold input-group-text align-self-center p-0 px-2 rounded-circle small">1</span>
                                    <div class="bg-transparent border-0 form-control ms-1 shadow-none text-white">`+question.user_answer+`</div>
                                </div>`
                }
                if(question.ca.length > 1) {
                    correctAnswers = '<div class="alert alert-success border border-2 border-success font-size-14 mt-3 rounded-4 text-dark"><i class="fa fa-bolt-lightning me-1 text-success"></i>Acceptable answers are: '+question.ca.join(", ")+' </div>'
                } else {
                    correctAnswers = '<div class="alert alert-success border border-2 border-success font-size-14 mt-3 rounded-4 text-dark"><i class="fa fa-bolt-lightning me-1 text-success"></i>Acceptable answer is: '+question.ca.join(", ")+' </div>'
                }
                return tab+correctAnswers;
            }
            function unansweredSAQ(question) {
                let input = "";
                let tab =  `<div class="d-inline-block font-size-14 fw-semibold my-2 notice py-1 rounded text-uppercase">Type your answer in the below text box</div>
                            <div class="answer_wrap">
                                <div class="border border-2 border-primary input-group my-2 p-3 py-2 rounded-4 animate__animated animate__fadeInRight animate__slow">
                                    <span class="bg-opacity-10 border-0 fw-semibold input-group-text align-self-center p-0 px-2 rounded-circle small">1</span>
                                    <input type="text" class="answer_inp bg-transparent border-0 form-control ms-1 shadow-none" placeholder="Type your answer">
                                </div>
                            </div>`;
                return tab;
            }
            function submitSAQ(answer) {
                $.ajax({
                    type: "POST",
                    url: '/check_journey_answer/'+journeySetSlug+'/'+sessionCode,
                    data: {
                        question_id: $(".video_tab.active").data("id"),
                        time_taken: time,
                        total_time_taken: totalTimeTaken,
                        user_answer: answer,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        if(data){
                            stopTimer();
                            $("#submit").remove();
                            $("#next").removeClass("d-none");
                            $(".video_tab.active").find(".notice").remove();
                            $("#questions_attempted").text(data.answered);
                            let completePer = Math.round((data.answered / total_questions) * 100);
                            $("#progressBar").attr("style","width:"+completePer+"%");
                            let tab, correctAnswers;
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
                            }
                            if(data.ca.length > 1) {
                                correctAnswers = '<div class="alert alert-success border border-2 border-success font-size-14 mt-3 rounded-4 text-dark"><i class="fa fa-bolt-lightning me-1 text-success"></i>Acceptable answers are: '+data.ca.join(", ")+' </div>'
                            } else {
                                correctAnswers = '<div class="alert alert-success border border-2 border-success font-size-14 mt-3 rounded-4 text-dark"><i class="fa fa-bolt-lightning me-1 text-success"></i>Acceptable answer is: '+data.ca.join(", ")+' </div>'
                            }
                            $(".video_tab.show").find(".answer_wrap").empty().append(tab+correctAnswers);
                        }
                    },
                    error: function(data, textStatus, errorThrown) {
                    },
                });
            }
            // SAQ Ends //
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
            function checkFinish(currentPage, totalPages, totalQuestions, totalAnswered, currentQuestion) {
                if(currentPage == totalPages && totalQuestions == totalAnswered && totalQuestions ==  currentQuestion){
                    if($(".finish").length < 2){
                        $("#move_question").append('<button id="finish" class="btn text-white btn-primary text-capitalize px-4 finish">Finish</button>');
                        $("#next").addClass('d-none');
                    }
                    $("#move_question").find("#next").addClass("d-none");
                    const myTimeout = setTimeout(myGreeting, 200);
                    function myGreeting() {
                        $("#move_question").find("#next").addClass("d-none");
                    }
                } else {
                    $("#move_question").find("#finish").remove();
                }
            }
            function Dragable(id) {
                let dropItems = document.getElementById('drop_items_'+id);
                new Sortable(dropItems, {
                    animation: 350,
                    chosenClass: "sortable-chosen",
                    dragClass: "sortable-drag"
                });
            }
            function drop(event) {
                let type = $(".video_tab.active").data("type");
                $(".video_tab.active").find(".drop_card").each(function(i){
                    $(this).find(".MTF_index").text(++i)
                });
                if($("#submit").length < 1) {
                    $("#next").addClass("d-none");
                    $("#finish").addClass("d-none");
                    $("#move_question").append('<button id="submit" data-type="'+type+'" class="btn btn-primary text-capitalize text-white px-4">submit</button>')
                }
            }
            // fullscreen 
            $('#fullscreenMode , #large_fullscreenMode').click(function () {
                const element = $('html');

                if (element) {
                    if (element[0].requestFullscreen) {
                        if (!document.fullscreenElement) {
                            element[0].requestFullscreen();
                        } else {
                            document.exitFullscreen();
                        }
                    } else if (element[0].mozRequestFullScreen) {
                        if (!document.mozFullScreenElement) {
                            element[0].mozRequestFullScreen();
                        } else {
                            document.mozCancelFullScreen();
                        }
                    } else if (element[0].webkitRequestFullscreen) {
                        if (!document.webkitFullscreenElement) {
                            element[0].webkitRequestFullscreen();
                        } else {
                            document.webkitExitFullscreen();
                        }
                    } else if (element[0].msRequestFullscreen) {
                        if (!document.msFullscreenElement) {
                            element[0].msRequestFullscreen();
                        } else {
                            document.msExitFullscreen();
                        }
                    }
                }
            });
            $(".report_issue").click(function(){
                let id = $(".video_tab.active").first().data("ques");
                $('#wrong_ques'+id).modal('show');
            });
            // Hiding all empty p tags 
            function hideEmptyOrBrTags() {
                $(".question_title_container p").each(function() {
                    var $pTag = $(this);

                    // Check if the p tag is empty or contains only br tags
                    if ($pTag.is(':empty') || $pTag.contents().filter(function() {
                        return this.nodeType === 1 && this.tagName !== 'BR' || this.nodeType === 3 && $.trim(this.nodeValue) !== '';
                    }).length === 0) {
                        $pTag.addClass("d-none");
                    }
                });
                // Set font size for all p descendants
                $("p *").css({
                    "font-size": "18px"
                });
                $("p:has(img)").addClass("text-center");
            }
            // call back hideEmptyOrBrTags function in setinterval 
            setInterval(() => {
                hideEmptyOrBrTags();
            }, 1000);
            // enable tooltip
            const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
            const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl)) 
            // keycontrols for navigation with keys
            function keyControls(event) {
                const keycode = event.which || event.keycode;
                if (keycode == 39 || keycode == 38) {
                    $("#next").click();
                }
                if (keycode == 37 || keycode == 40) {
                    $("#prev").click();
                }
                if (keycode == 27) {
                    $("#exitExam").click();
                }
                if (keycode == 18) {
                    $(".report_issue").click();
                }
            }
            // callback keycontrols on keyup event 
            $(document).keyup(function(event) {
                if (!$(".submit_loading").hasClass("screen_locked")) {
                    keyControls(event);
                }
            });
        </script>
    </body>
</html>