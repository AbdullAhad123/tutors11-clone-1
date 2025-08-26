<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>{{$exam['title']}}</title>
    <meta name="description" content="" />
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="" />
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />
    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{url('Frontend_css/assets/fonts/boxicons.css')}}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .tooltip_custom {
            --bs-tooltip-bg: #2b2b2b !important
        }

        @media (max-width:425px) {
            .row>* {
                text-align: start !important
            }
        }

        #bold {
            font-size: 18px
        }

        #align-right {
            margin-right: 17px
        }
        .font-size-12{font-size:12px;}
        .result_btn {
            padding: 8px;
            border: 0;
            background-color: #29b785 !important;
            font-size: .8rem;
            color: #fff;
            border-radius: 5px
        }

        .sol_btn_grade {
            width: 200px;
            padding: .5rem;
            border: 0;
            transition: .3s;
            user-select: none
        }

        .badge_bg_light {
            background-color: #ecfffaea
        }

        .sol_box_body {
            height: auto
        }

        .sol_body_result_btn {
            background-color: transparent
        }

        .normal_text {
            font-size: 1.1rem
        }

        @media (max-width:380px) {
            .flexbox_container {
                padding: 1rem !important
            }

            .sol_box_body {
                padding: 0 !important
            }
        }

        .flexbox_container {
            height: fit-content;
            background-color: #f3f3f3 !important
        }

        .question_separator {
            border-left: 2px solid #000
        }

        .sol_box_body_right_answer {
            text-decoration: 2px underline #000
        }

        .inline_flexbox_result {
            height: fit-content;
            border: 1px solid #009845
        }

        .inline_flexbox_result_answer {
            height: fit-content;
            border: 1px solid #00ff73;
            background-color: #d6ffe9;
            color: #000
        }

        .inline_flexbox_result_badgeside {
            border-right: 1px solid #5b5b5b2c
        }

        .inline_flexbox_result_badge {
            background-color: #34d399
        }

        .inline_flexbox_result_bottom {
            height: fit-content;
            border: 1px solid #ffea00;
            background-color: #fff6d6;
            color: #000
        }

        .question_border_black {
            border: 1px solid #00000056
        }

        .result_box_container {
            height: auto;
            width: auto;
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            margin: 3rem auto
        }

        @media (max-width:992px) {
            .result_box_container {
                justify-content: space-evenly
            }
        }

        .progress {
            margin: 20px auto;
            padding: 0;
            width: 95%;
            height: 5px;
            overflow: hidden;
            background: #e5e5e5;
            border-radius: 6px
        }

        .bar {
            position: relative;
            float: left;
            min-width: 1%;
            height: 100%;
            background: #6495ed
        }

        .exam_navbar {
            height: 60px !important;
            width: auto;
            overflow: hidden;
            background-color: #55569e;
            color: #fff !important;
            user-select: none;
            -webkit-user-select: none
        }

        .test_name {
            font-size: .9rem;
            text-transform: uppercase !important
        }

        .fullscreen_option {
            padding: .3rem;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #7c7db4
        }

        .countdown_timer {
            padding: .3rem;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #7c7db4
        }

        .main_content_wrapper {
            height: 100vh;
            width: auto;
            background-color: #000;
            -webkit-user-select: none;
            -webkit-user-drag: none;
            user-select: none;
            overflow: hidden
        }

        .content_container {
            height: 100%;
            padding-left: 1rem;
            background-color: #fff;
            border-right: 1px solid #0000003b;
            overflow-x: hidden;
            overflow-y: scroll
        }

        .content_container::-webkit-scrollbar {
            width: 0
        }

        .offcanvas {
            width: 350px;
            position: sticky !important;
            left: 100%;
            right: 0;
            height: 100%;
            background-color: #fff;
            border-left: 1px solid #0000003b;
            z-index: 1000 !important
        }

        .offcanvas::-webkit-scrollbar {
            width: 0
        }

        .content_container_nav {
            height: 70px
        }

        .content_rightbar_nav {
            height: 70px;
            background-color: #fafafa
        }

        .badge_grade {
            width: 80px
        }

        .bg_customized_light {
            background-color: #e3e3e3
        }

        .content_rightbar_questions {
            height: 250px;
            overflow-x: hidden;
            overflow-y: scroll
        }

        .content_rightbar_questions::-webkit-scrollbar {
            width: 0
        }

        .content_question_bottombar_btns {
            width: auto;
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            z-index: 100;
            background-color: rgb(255, 255, 255); 
            padding-bottom: 10px;
        }

        .content_question {
            height: fit-content;
            margin-bottom: 5rem;
        }

        .btn_clear_danger {
            border: 1px solid #ff1717;
            color: #ff1717;
            background-color: transparent;
            transition: .2s
        }

        .btn_clear_danger:hover {
            background-color: #ff1717;
            border: 1px solid #ff1717;
            color: #fff
        }

        .btn_save_next {
            border: 1px solid #696cff;
            color: #fff;
            background-color: #696cff;
            transition: .2s
        }

        .btn_save_next:hover {
            background-color: transparent;
            border: 1px solid #696cff;
            color: #696cff
        }

        @media (max-width:1200px) {
            .content_rightbar {
                flex-basis: 0 !important;
                border: none !important
            }

            .content_container {
                flex-basis: 100%;
                border: none !important
            }

            .bars_button {
                visibility: visible !important
            }

            .content_container_bottom {
                width: 100% !important
            }
        }

        @media (max-width:500px) {

            .content_container,
            .content_question {
                padding-left: 0 !important
            }
        }

        @media (max-width:400px) {
            .content_container_bottom {
                padding: 0 !important
            }
        }
        .question_btn.active a{
            background-color:#fff;
        }   
        p img {
            margin: 0 5px;
        } 
        .cursor-pointer{
            cursor: pointer;
        }
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

    </style>
    <style>

        .card-slider {
            width: 100%;
        }

        @media screen and (max-width: 1024px) {
            .card-slider {
                width: 80%;
            }
        }

        .card-slider .card {
            position: relative;
            display: flex !important;
            flex-direction: column;
            height: auto;
            width: fit-content;
            border-radius: 3px;
            border: 1px solid rgba(0, 0, 0, 0.2);
            background-color: #fff;
            text-decoration: none;
            color: rgba(0, 0, 0, 0.9);
            transition: all 0.1s linear;
        }

        @media screen and (max-width: 600px) {
            .card-slider .card {
                height: auto;
            }
        }

        .card-slider .card .main-link {
            text-decoration: none;
            display: flex;
            flex-direction: column;
        }

        .card-slider .card .main-link:focus {
            outline: 0;
        }

        .card-slider .card .title {
            color: #000;
            margin: 0;
            padding: 10px 10px 5px 10px;
            font-size: 16px;
            font-weight: 700;
        }

        .card-slider .card .image {
            order: -1;
            position: relative;
            height: 100px;
            padding: 2px;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card-slider .card .image img {
            width: 100%;
            height: 100%;
            -o-object-fit: cover;
            object-fit: cover;
            filter: grayscale(0.5);
            transition: all 0.3s ease-in-out;
        }

        .card-slider .card .image:hover img {
            width: 110%;
            height: 110%;
        }

        .card-slider .card:hover {
            border-color: rgba(0, 0, 0, 0.4);
            box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.15);
        }

        .card-slider .card:focus .image img,
        .card-slider .card:hover .image img {
            filter: grayscale(0);
        }

        .card-slider .card a:focus {
            outline: 0;
        }
    </style>
</head>
<body class="overflow-hidden">
    
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-page">
            <!-- navbar  -->
            <nav class="exam_navbar ">
                <div
                    class="d-flex justify-content-between align-items-center cutomized_container_fluid w-100 h-100 px-3">
                    <div class="exam_name_side">
                        <span class="h5">
                            {{$exam['title']}}
                        </span>
                    </div>
                    <div class="exam_details_side align-items-center">
                        <div class="d-flex">
                            <span class="fullscreen_option mx-1" style="cursor: pointer;" id="fullscreen_btn"
                                class="tooltip_custom" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                data-bs-title="Fullscreen">
                                <i class="bx bx-fullscreen"></i>
                            </span>
                            <span class="countdown_timer mx-1" class="tooltip_custom" data-bs-toggle="tooltip"
                                data-bs-placement="bottom" data-bs-title="Timer">
                                <i class="bx bx-time me-2">
                                </i><span id="count_downTimer" data-name="">00:00</span>
                            </span>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- main content  -->
            <div class="main_content_wrapper">
                <!-- main body  -->
                <div class="content_container overflow-scroll">
                    <div class="content_container_nav p-1 px-2">
                        <div class="row justify-content-between align-items-center m-0">
                            <div class="col-lg-8 col-md-8 col-sm-9 col-9 me-auto">
                                <div class="card-slider mb-0 py-3">
                                    @foreach($examSections as $key => $section)
                                        <div class="card px-2 bg-transparent border-0 shadow-none">
                                            <button class="btn btn-success changeSection" data-index="{{$key}}" data-id="{{$section['id']}}">
                                                <span class="me-1">
                                                    <span class="badge">{{++$key}}</span>
                                                </span> 
                                                {{$section['name']}}
                                            </button>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-3 col-3">
                                <div class="bars_button text-end">
                                    <button class="btn bx bx-menu bx-md text-dark border-0" id="rightBar_btn"
                                        class="tooltip_custom" data-bs-toggle="offcanvas"
                                        data-bs-target="#right_bar_offcanvas"
                                        aria-controls="right_bar_offcanvas"></button>
                                </div>
                            </div>
                        </div>
 


                    </div>

                    <div class="content_question col-lg-8 col-md-9 col-sm-12 col-12 p-1 px-3 mx-2 py-4">
                        <div class="tab-content" id="questions_wrap"></div>
                    </div>

                    <div class="content_question_bottombar_btns shadow-lg py-3">
                        <div class="content_container_bottom px-4">
                            <div class="row">
                                <div class="d-flex justify-content-start align-items-center flex-wrap">
                                    <button id="clear"
                                        data-current_section="0"
                                        class="btn btn-sm shadow bg-danger-subtle border-1 border-danger my-2 mx-1 px-2 py-2 rounded-2 text-danger">Clear
                                        Answer</button>
                                    <button id="review"
                                        data-current_section="0"
                                        class="btn btn-sm shadow bg-primary-subtle border-1 border-primary my-2 mx-1 px-2 py-2 rounded-2 text-primary">Mark
                                        For
                                        Review</button>
                                    <button id="submit"
                                        data-current_section="0"
                                        class="btn btn-sm shadow bg-success-subtle border-1 border-success my-2 mx-1 px-2 py-2 rounded-2 text-success">Save
                                        & Next</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- rightbar   -->
                <div class="offcanvas offcanvas-end show d-none d-lg-block overflow-scroll" data-bs-scroll="true"
                    data-bs-backdrop="false" tabindex="-1" id="right_bar_offcanvas"
                    aria-labelledby="right_bar_offcanvasLabel">
                    <div class="offcanvas-header py-4">
                        <h6 class="offcanvas-title text-uppercase">{{$exam['title']}}</h6>
                        <button type="button" id="rightBar_close" class="btn-close d-block d-lg-none"
                            data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <div class="row align-items-center">
                            <div class="col-6 px-3">
                                <div class="d-inline-flex text_black tooltip_custom" data-bs-toggle="tooltip"
                                    data-bs-placement="bottom" data-bs-title="Progress Saved">
                                    <span id="answeredQuestions">0</span>/<span id="totalQuestions" class="me-2">0 </span> Answered
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="bars_button text-end">
                                    <button class="btn bx bx-category bx-sm text-dark border-0 menu_btn"></button>
                                </div>
                            </div>
                        </div>
                        <div class="content_rightbar_questions shadow-sm bg-body-secondary mt-2 p-2">
                            <div class="category_question h-auto">
                            <ul class="list-group" id="question_btn_wrap"></ul>
                            </div>
                        </div>
                        <div class="d-flex justify-content-around align-items-center small mt-4">
                            <p class="text-center m-0 mt-1">Not Answered</p>
                            <p class="text-center m-0 mt-1">Answered</p>
                        </div>
                        <div class="content_rightbar_bottom p-2 mt-3">
                            <div class="row align-items-center small">
                                <div class="col-gl-6 col-md-6 col-sm-12 col-12 vstack">
                                   
                                    <div
                                        class="row d-flex justify-content-center align-items-start m-0 h-auto my-1 rounded-1">
                                        <div class="col-2 p-3 border">
                                            <p class="m-0" id="mark_for_review">
                                                0
                                            </p>
                                        </div>
                                        <div class="col-8">
                                            <p>Marked For Review</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-gl-6 col-md-6 col-sm-12 col-12">
                                   
                                    <div
                                        class="row d-flex justify-content-center align-items-start m-0 h-auto my-1 rounded-1">
                                        <div class="col-2 border p-3">
                                            <p class="m-0" id="answered_mark_for_review">
                                                0
                                            </p>
                                        </div>
                                        <div class="col-8">
                                            <p>Answered & Marked For Review</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4 mb-5">
                                <p class="text-success">Answered</p>
                            </div>
                            <div class="mt-5 mb-5">
                                <button class="btn btn-danger shadow small rounded-1 w-100" id="finish">
                                    <i class="bx bx-stop-circle bx-sm me-1"></i>Finish Test
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /main content -->
            </div>

        </div>
    </div>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@accessible360/accessible-slick@1.0.1/slick/slick.min.css">
    <link rel="stylesheet" href="https:////cdn.jsdelivr.net/npm/@accessible360/accessible-slick@1.0.1/slick/accessible-slick-theme.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@accessible360/accessible-slick@1.0.1/slick/slick.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
    <script>
        let totalTimeTaken = {!! str_replace("'", "\'", json_encode($session['total_time_taken'])) !!};
        let examSlug = {!! str_replace("'", "\'", json_encode($exam['slug'])) !!};
        let sessionCode = {!! str_replace("'", "\'", json_encode($session['code'])) !!};
        let firstSection = {!! str_replace("'", "\'", json_encode($examSections[0])) !!};
        var remainingTime = {!! str_replace("'", "\'", json_encode($remainingTime)) !!};
        var examSections = {!! str_replace("'", "\'", json_encode($examSections)) !!};
        var time = 1;
        var sectionTime = [];
        examSections.forEach(function(section, i) {
            let data = {
                index: i,
                id : section.id,
                total_time_taken: section.total_time_taken
            }
            sectionTime.push(data);
        });
        startsectionTimer(0);
        startTimer();
        var intervalId, sectionintervalId;
        function startTimer(){
            intervalId = setInterval(getTime, 1000, remainingTime);
            setInterval(incrementTime, 1000);
        }
        function startsectionTimer(index){
            let section = sectionTime[index]
            sectionintervalId = setInterval(setsectionTime, 1000, section.total_time_taken, section.index);
        }
        function setsectionTime(totalSectionTime, index) {
            sectionTime[index].total_time_taken = sectionTime[index].total_time_taken + 1;
            // working here
            // console.log(sectionTime[0].total_time_taken, sectionTime[1].total_time_taken);
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
        function finishTest() {
            $("#finish").click()
        }
        $(document).on('click', '.question_btn_a', function(){
            stopTimer();
        });
        function stopTimer(){
            time = 0;
        }
        fetchQuestions("/exam/"+examSlug+"/questions/"+sessionCode+"/"+firstSection.id, firstSection.id);
        function fetchQuestions(reqUrl, section) {
            $.ajax({
                type: "GET",
                url: reqUrl,
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    let questions = data.questions;
                    let buttons = "";
                    let question_box = "";
                    $("#questions_wrap").empty();
                    $("#question_btn_wrap").empty();
                    questions.forEach(function(question, i) {
                        let index = i+1;
                        let answer = "";
                        if(question.questionType == "FIB"){
                            answer = unansweredFIB(question);
                        } else if(question.questionType == "MSA"){
                            answer = unansweredMSA(question);
                        } else if(question.questionType == "MMA"){
                            answer = unansweredMMA(question);
                        } else if(question.questionType == "MTF"){
                            answer = unansweredMTF(question);
                        } else if(question.questionType == "TOF"){
                            answer = unansweredTOF(question);
                        } else if(question.questionType == "ORD"){
                            answer = unansweredORD(question);
                        } else if(question.questionType == "SAQ"){
                            answer = unansweredSAQ(question);
                        }
                        let modal_btn = '';
                        let modal = '';
                        if(question.comprehension){
                            modal_btn = `<button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#comprehension_`+question.code+`"><i class="fa fa-eye"></i> Comprehension</button>`;
                            modal = `<div class="modal fade" id="comprehension_`+question.code+`" role="dialog">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header justify-content-end">
                                                    <button type="button" class="close fs-1" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body">`+question.comprehension+`</div>
                                            </div>
                                        </div>
                                    </div>`;
                        }
                        if(i < 1){
                            buttons +=  `<li class="question_btn active">
                                        <a class="question_btn_a border border-dark border-opacity-25 d-block mb-4 px-3 py-2 rounded text-decoration-none text-secondary" data-toggle="tab" href="#`+question.code+`">`+question.question+`</a>
                                    </li>`;
                            question_box += `<div id="`+question.code+`" data-type="`+question.questionType+`" data-status="`+question.status+`" data-index="`+i+`" class="question_tab tab-pane fade in active"><div class="mb-4 d-flex align-items-center justify-content-between"><div><span class="fw-semibold">Q`+index+` of `+data.total_questions+`</span><span class="text-uppercase font-size-12 text-secondary">| `+question.skill+`</span></div>`+modal_btn+`</div>`+question.question+answer+modal+`</div>`;
                        } else {
                            buttons +=  `<li class="question_btn">
                                        <a class="question_btn_a border border-dark border-opacity-25 d-block mb-4 px-3 py-2 rounded text-decoration-none text-secondary" data-toggle="tab" href="#`+question.code+`">`+question.question+`</a>
                                    </li>`;
                                    question_box += `<div id="`+question.code+`" data-type="`+question.questionType+`" data-status="`+question.status+`" data-index="`+i+`" class="question_tab tab-pane fade"><div class="mb-4 d-flex align-items-center justify-content-between"><div><span class="fw-semibold">Q`+index+` of `+data.total_questions+`</span><span class="text-uppercase font-size-12 text-secondary">| `+question.skill+`</span></div>`+modal_btn+`</div>`+question.question+answer+modal+`</div>`;
                        }
                    });
                    $("#question_btn_wrap").append(buttons);
                    $("#questions_wrap").append(question_box);
                    $("#answeredQuestions").text(data.answered);
                    $("#totalQuestions").text(data.total_questions);
                    $("#mark_for_review").text(data.mark_for_review);
                    $("#answered_mark_for_review").text(data.answered_mark_for_review);
                    $("#clear, #review, #submit").attr("data-section_id", section)
                    $("p").find("img").each(function(){
                        $(this).attr("src", $(this).attr("src").replace("http://localhost", "")).addClass('img-thumbnail');
                    });
                },
                error: function(data, textStatus, errorThrown) {
                    console.log(textStatus);
                    console.log(data);
                },
            });
        };
        // FIB Start
        function unansweredFIB(question) {
            let input = "";
            for (let i = 0; i < question.options; i++) {                
                let input_group_text = question.status == "answered"?"bg-success-subtle border-opacity-25 border-success":"";
                let form_control = question.status == "answered"?"border-success":"";
                let FIBAnswer = question.status == "answered"?question.user_answer[i]:"";
                let index = i+1;
                    input +=  `<div class="input-group my-3">
                                <span class="input-group-text px-3 input-group-addon `+input_group_text+`">`+index+`</span>
                                <input type="text" class="form-control shadow-none border-secondary border-opacity-25 answer_inp `+form_control+`" placeholder="Type your answer for blank `+index+`" value="`+FIBAnswer+`">
                            </div>`;
            }
            let tab =  `<div class="mt-2 d-inline-block py-1 px-2 rounded bg-secondary bg-opacity-25 font-size-13 font-monospace notice">Fill the blanks in the below text boxes</div>
                        <div class="answer_wrap pb-5 mb-5">`+input+`</div>`;
            return tab;
        }
        function submitFIB(answer, action, section, current_section) {
            let current_question = $(".question_tab.active").data("index");
            let id = $(".question_tab.active").attr("id");
            var status;
            if(action == "submit" || action == "clear"){
                status = answer.includes("")?"not_answered":"answered";
            } else {
                status = action;
            }
            $.ajax({
                type: "POST",
                url: '/update_exam_answer/'+examSlug+'/'+sessionCode+'/'+section,
                data: {
                    current_question: current_question,
                    current_section: current_section,
                    current_section_total_time_taken: sectionTime[current_section].total_time_taken,
                    question_id: id,
                    status: status,
                    time_taken: time,
                    total_time_taken: totalTimeTaken,
                    user_answer: answer,
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    if(data){
                        stopTimer();
                        $("#answeredQuestions").text(data.answered);
                        $("#mark_for_review").text(data.mark_for_review);
                        $("#answered_mark_for_review").text(data.answered_mark_for_review);
                        if(action == "clear"){
                            $(".question_tab.active").find(".answer_inp").val("");
                            $(".question_tab.active").find(".answer_inp").removeClass("border-success");
                            $(".question_tab.active").attr("data-status", "not_answered");
                        } else {
                            $(".question_tab.active").find(".input-group-text").addClass("border-success border-opacity-25 bg-success-subtle")
                            $(".question_tab.active").find(".answer_inp").addClass("border-success");
                            $(".question_tab.active").attr("data-status", "answered");
                        }
                        let hasNext = $(".question_btn.active").next().length;
                        if(hasNext > 0){
                            $(".question_btn.active").next().addClass("active");
                            $(".question_btn.active").eq(0).removeClass("active");
                            $(".question_tab.active").next().addClass("in active")
                            $(".question_tab.active").eq(0).removeClass("in active")
                        }
                    }
                },
                error: function(data, textStatus, errorThrown) {
                },
            });
        }
        // FIB End
        // MSA Start
        function unansweredMSA(question) {
            let input = "";
            question.options.forEach(function(option, i) {
                let index = i+1;
                if(question.status == "answered"){
                    if(question.user_answer == index){
                        input +=  `<div class="input-group my-3">
                                <span class="input-group-text px-3 input-group-addon bg-success-subtle">`+index+`</span>
                                <div class="form-control shadow-none border-secondary border-opacity-25 cursor-pointer MSA_inp select_wrap bg-success-subtle" data-id="`+index+`">`+option+`</div>
                            </div>`;
                    } else {
                        input +=  `<div class="input-group my-3">
                                <span class="input-group-text px-3 input-group-addon">`+index+`</span>
                                <div class="form-control shadow-none border-secondary border-opacity-25 cursor-pointer MSA_inp select_wrap" data-id="`+index+`">`+option+`</div>
                            </div>`;
                    }
                } else {
                    input +=  `<div class="input-group my-3">
                                <span class="input-group-text px-3 input-group-addon">`+index+`</span>
                                <div class="form-control shadow-none border-secondary border-opacity-25 cursor-pointer MSA_inp select_wrap" data-id="`+index+`">`+option+`</div>
                            </div>`;
                }
            });
            let tab =  `<div class="mt-2 d-inline-block py-1 px-2 rounded bg-secondary bg-opacity-25 font-size-13 font-monospace notice">Choose one option</div>
                        <div class="answer_wrap mb-5 pb-5">`+input+`</div>`;
            return tab;
        }
        function submitMSA(answer, action, section, current_section) {
            let current_question = $(".question_tab.active").data("index");
            let id = $(".question_tab.active").attr("id");
            var status;
            if(action == "submit" || action == "clear"){
                status = answer == undefined ? "not_answered" : "answered";
            } else {
                status = action;
            }
            $.ajax({
                type: "POST",
                url: '/update_exam_answer/'+examSlug+'/'+sessionCode+'/'+section,
                data: {
                    current_question: current_question,
                    current_section: current_section,
                    current_section_total_time_taken: sectionTime[current_section].total_time_taken,
                    question_id: id,
                    status: status,
                    time_taken: time,
                    total_time_taken: totalTimeTaken,
                    user_answer: answer,
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    if(data){
                        stopTimer();
                        $("#answeredQuestions").text(data.answered);
                        $("#mark_for_review").text(data.mark_for_review);
                        $("#answered_mark_for_review").text(data.answered_mark_for_review);
                        if(action == "clear"){
                            $(".question_tab.active").find(".input-group-text").removeClass("bg-opacity-25 bg-success border-success");
                            $(".question_tab.active").find(".MSA_inp").removeClass("border-success bg-success bg-opacity-25 active");
                        } else {
                            $(".question_tab.active").attr("data-status", "answered")
                        }
                        let hasNext = $(".question_btn.active").next().length;
                        if(hasNext > 0){
                            $(".question_btn.active").next().addClass("active");
                            $(".question_btn.active").eq(0).removeClass("active");
                            $(".question_tab.active").next().addClass("in active")
                            $(".question_tab.active").eq(0).removeClass("in active")
                        }
                    }
                },
                error: function(data, textStatus, errorThrown) {
                },
            });
        }
        // MSA End
        // MMA Start
        function unansweredMMA(question) {
            var input = "";
            question.options.forEach(function(option, i) {
                var index = i+1;
                if(question.status == "answered"){
                    question.user_answer.forEach(function(ua, u) {
                        if(ua == index){
                            input +=  `<div class="input-group my-3 MMA_inp cursor-pointer">
                                    <span class="input-group-text px-3 input-group-addon bg-success-subtle">`+index+`</span>
                                    <div class="form-control shadow-none border-secondary border-opacity-25 select_wrap bg-success-subtle" data-id="`+index+`">`+option+`</div>
                                </div>`; 
                        } else {
                            input +=  `<div class="input-group my-3 MMA_inp cursor-pointer">
                                    <span class="input-group-text px-3 input-group-addon">`+index+`</span>
                                    <div class="form-control shadow-none border-secondary border-opacity-25 select_wrap" data-id="`+index+`">`+option+`</div>
                                </div>`; 
                        }
                    });
                } else {
                    input +=  `<div class="input-group my-3 MMA_inp cursor-pointer">
                                    <span class="input-group-text px-3 input-group-addon">`+index+`</span>
                                    <div class="form-control shadow-none border-secondary border-opacity-25 select_wrap" data-id="`+index+`">`+option+`</div>
                                </div>`;   
                }
            });
            let tab =  `<div><div class="mt-2 d-inline-block py-1 px-2 rounded bg-secondary bg-opacity-25 font-size-13 font-monospace notice">Choose multiple option</div></div>
                        <div class="answer_wrap mb-5 pb-5">`+input+`</div>`;
            return tab;
        }
        function submitMMA(answer, action, section, current_section) {
            let current_question = $(".question_tab.active").data("index");
            let id = $(".question_tab.active").attr("id");
            var status;
            if(action == "submit" || action == "clear"){
                status = answer.length > 0 ? "answered" : "not_answered";
            } else {
                status = action;
            }
            $.ajax({
                type: "POST",
                url: '/update_exam_answer/'+examSlug+'/'+sessionCode+'/'+section,
                data: {
                    current_question: current_question,
                    current_section: current_section,
                    current_section_total_time_taken: sectionTime[current_section].total_time_taken,
                    question_id: id,
                    status: status,
                    time_taken: time,
                    total_time_taken: totalTimeTaken,
                    user_answer: answer,
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    if(data){
                        stopTimer();
                        $("#answeredQuestions").text(data.answered);
                        $("#mark_for_review").text(data.mark_for_review);
                        $("#answered_mark_for_review").text(data.answered_mark_for_review);
                        if(action == "clear"){
                            $(".question_tab.active").find(".MMA_inp").removeClass("active");
                        } else {
                            $(".question_tab.active").attr("data-status", "answered")
                        }
                        let hasNext = $(".question_btn.active").next().length;
                        if(hasNext > 0){
                            $(".question_btn.active").next().addClass("active");
                            $(".question_btn.active").eq(0).removeClass("active");
                            $(".question_tab.active").next().addClass("in active")
                            $(".question_tab.active").eq(0).removeClass("in active")
                        }
                    }
                },
                error: function(data, textStatus, errorThrown) {
                },
            });
        }
        // MMA End
        // MTF Start
        function unansweredMTF(question) {
            let matches = "";
            let pairs = "";
            const myTimeout = setTimeout(Dragable, 500, question.code);
            question.options.matches.forEach(function(match, i) {
                let index = i+1;
                matches +=  `<div class="input-group my-3">
                                <span class="input-group-text px-3 input-group-addon">`+index+`</span>
                                <div class="form-control shadow-none border-secondary border-opacity-25" data-id="`+index+`" data-match_id=`+match.id+`>`+match.value+`</div>
                            </div>`;
            });
            if(question.status == "answered"){
                question.user_answer.forEach(function(pair, i) {
                    let index = i+1;
                    pairs +=  `<div class="input-group my-3 drop_card" ondragend="drop(event)">
                                <span class="input-group-text px-3 input-group-addon bg-success-subtle"><span class="MTF_index me-1">`+index+` </span> - `+pair.code+`</span>
                                <div class="form-control shadow-none border-secondary border-opacity-25 bg-success-subtle" data-id="`+index+`" data-match_id=`+pair.id+` data-match_code=`+pair.code+`>`+pair.value+`</div>
                            </div>`;
                });
            } else {
                question.options.pairs.forEach(function(pair, i) {
                    let index = i+1;
                    pairs +=  `<div class="input-group my-3 drop_card" ondragend="drop(event)">
                                    <span class="input-group-text px-3 input-group-addon"><span class="MTF_index me-1">`+index+` </span> - `+pair.code+`</span>
                                    <div class="form-control shadow-none border-secondary border-opacity-25" data-id="`+index+`" data-match_id=`+pair.id+` data-match_code=`+pair.code+`>`+pair.value+`</div>
                                </div>`;
                }); 
            }
            let tab =  `<div><div class="mt-2 d-inline-block py-1 px-2 rounded bg-secondary bg-opacity-25 font-size-13 font-monospace notice">
                            Match the following by drag and drop right side items
                        </div></div>
                        <div class="answer_wrap row mb-5 pb-5">
                            <div class="col-6">`+matches+`</div>
                            <div class="col-6 drop"><div class="drop_container" id="drop_items_`+question.code+`">`+pairs+`</div></div>
                        </div>`;
            return tab;
        }
        function submitMTF(answer, action, section, current_section) {
            let current_question = $(".question_tab.active").data("index");
            let id = $(".question_tab.active").attr("id");
            var status;
            if(action == "submit" || action == "clear"){
                status = action=="submit"?"answered":"not_answered";
            } else {
                status = action;
            }
            $.ajax({
                type: "POST",
                url: '/update_exam_answer/'+examSlug+'/'+sessionCode+'/'+section,
                data: {
                    current_question: current_question,
                    current_section: current_section,
                    current_section_total_time_taken: sectionTime[current_section].total_time_taken,
                    question_id: id,
                    status: status,
                    time_taken: time,
                    total_time_taken: totalTimeTaken,
                    user_answer: answer,
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    if(data){
                        stopTimer();
                        $("#answeredQuestions").text(data.answered);
                        $("#mark_for_review").text(data.mark_for_review);
                        $("#answered_mark_for_review").text(data.answered_mark_for_review);
                        if(action == "clear"){
                            $(".question_tab.active").find(".drop_card .input-group-addon").removeClass("bg-success-subtle");
                            $(".question_tab.active").find(".drop_card .form-control").removeClass("bg-success-subtle ");
                        } else {
                            $(".question_tab.active").find(".drop_card .input-group-addon").addClass("bg-success-subtle");
                            $(".question_tab.active").find(".drop_card .form-control").addClass("bg-success-subtle ");
                            $(".question_tab.active").attr("data-status", "answered")
                        }
                        let hasNext = $(".question_btn.active").next().length;
                        if(hasNext > 0){
                            $(".question_btn.active").next().addClass("active");
                            $(".question_btn.active").eq(0).removeClass("active");
                            $(".question_tab.active").next().addClass("in active")
                            $(".question_tab.active").eq(0).removeClass("in active")
                        }
                    }
                },
                error: function(data, textStatus, errorThrown) {
                },
            });
        }
        // MTF End
        // TOF Start
        function unansweredTOF(question) {
            let input = "";
            question.options.forEach(function(option, i) {
                let index = i+1;
                if(question.status == "answered"){
                    if(question.user_answer == index){
                        input +=  `<div class="input-group my-3">
                                <span class="input-group-text px-3 input-group-addon bg-success-subtle">`+index+`</span>
                                <div class="form-control shadow-none border-secondary border-opacity-25 cursor-pointer MSA_inp select_wrap bg-success-subtle" data-id="`+index+`">`+option+`</div>
                            </div>`;
                    } else {
                        input +=  `<div class="input-group my-3">
                                <span class="input-group-text px-3 input-group-addon">`+index+`</span>
                                <div class="form-control shadow-none border-secondary border-opacity-25 cursor-pointer MSA_inp select_wrap" data-id="`+index+`">`+option+`</div>
                            </div>`;
                    }
                } else {
                    input +=  `<div class="input-group my-3">
                                <span class="input-group-text px-3 input-group-addon">`+index+`</span>
                                <div class="form-control shadow-none border-secondary border-opacity-25 cursor-pointer MSA_inp select_wrap" data-id="`+index+`">`+option+`</div>
                            </div>`;
                }
            });
            let tab =  `<div><div class="mt-2 d-inline-block py-1 px-2 rounded bg-secondary bg-opacity-25 font-size-13 font-monospace notice">Choose one option</div></div>
                        <div class="answer_wrap mb-5 pb-5">`+input+`</div>`;
            return tab;
        }
        function submitTOF(answer, action, section, current_section) {
            let current_question = $(".question_tab.active").data("index");
            let id = $(".question_tab.active").attr("id");
            var status;
            if(action == "submit" || action == "clear"){
                status = answer == undefined ? "not_answered" : "answered";
            } else {
                status = action;
            }
            $.ajax({
                type: "POST",
                url: '/update_exam_answer/'+examSlug+'/'+sessionCode+'/'+section,
                data: {
                    current_question: current_question,
                    current_section: current_section,
                    current_section_total_time_taken: sectionTime[current_section].total_time_taken,
                    question_id: id,
                    status: status,
                    time_taken: time,
                    total_time_taken: totalTimeTaken,
                    user_answer: answer,
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    if(data){
                        stopTimer();
                        $("#answeredQuestions").text(data.answered);
                        $("#mark_for_review").text(data.mark_for_review);
                        $("#answered_mark_for_review").text(data.answered_mark_for_review);
                        if(action == "clear"){
                            $(".question_tab.active").find(".input-group-addon").removeClass("border-success bg-success bg-opacity-25 border-opacity-10");
                            $(".question_tab.active").find(".MSA_inp").removeClass("border-success bg-success bg-opacity-25 active");
                        } else {
                            $(".question_tab.active").attr("data-status", "answered")
                        }
                        let hasNext = $(".question_btn.active").next().length;
                        if(hasNext > 0){
                            $(".question_btn.active").next().addClass("active");
                            $(".question_btn.active").eq(0).removeClass("active");
                            $(".question_tab.active").next().addClass("in active")
                            $(".question_tab.active").eq(0).removeClass("in active")
                        }
                    }
                },
                error: function(data, textStatus, errorThrown) {
                },
            });
        }
        // TOF End
        // ORD Start
        function unansweredORD(question) {
            let order = "";
            const myTimeout = setTimeout(Dragable, 500, question.code);
            if(question.status == "answered"){
                question.user_answer.forEach(function(ord, i) {
                    let index = i+1;
                    order +=  `<div class="input-group my-3 drop_card" ondragend="drop(event)">
                                <span class="input-group-text px-3 input-group-addon bg-success-subtle"><span class="MTF_index me-1">`+index+` </span> - `+ord.code+`</span>
                                <div class="form-control shadow-none border-secondary border-opacity-25 bg-success-subtle" data-id="`+index+`" data-match_id=`+ord.id+` data-match_code=`+ord.code+`>`+ord.value+`</div>
                            </div>`;
                });
            } else {
                question.options.forEach(function(ord, i) {
                    let index = i+1;
                    order +=  `<div class="input-group my-3 drop_card" ondragend="drop(event)">
                                    <span class="input-group-text px-3 input-group-addon"><span class="MTF_index me-1">`+index+` </span> - `+ord.code+`</span>
                                    <div class="form-control shadow-none border-secondary border-opacity-25" data-id="`+index+`" data-match_id=`+ord.id+` data-match_code=`+ord.code+`>`+ord.value+`</div>
                                </div>`;
                });
            }
            let tab =  `<div><div class="mt-2 d-inline-block py-1 px-2 rounded bg-secondary bg-opacity-25 font-size-13 font-monospace notice">
                        Arrange the following in order by drag and drop the items
                        </div></div>
                        <div class="answer_wrap mb-5 pb-5">
                            <div class="drop"><div class="drop_container" id="drop_items_`+question.code+`">`+order+`</div></div>
                        </div>`;
            return tab;
        }
        function submitORD(answer, action, section, current_section) {
            let current_question = $(".question_tab.active").data("index");
            let id = $(".question_tab.active").attr("id");
            var status;
            if(action == "submit" || action == "clear"){
                status = action=="submit"?"answered":"not_answered";
            } else {
                status = action;
            }
            $.ajax({
                type: "POST",
                url: '/update_exam_answer/'+examSlug+'/'+sessionCode+'/'+section,
                data: {
                    current_question: current_question,
                    current_section: current_section,
                    current_section_total_time_taken: sectionTime[current_section].total_time_taken,
                    question_id: id,
                    status: status,
                    time_taken: time,
                    total_time_taken: totalTimeTaken,
                    user_answer: answer,
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    if(data){
                        stopTimer();
                        $("#answeredQuestions").text(data.answered);
                        $("#mark_for_review").text(data.mark_for_review);
                        $("#answered_mark_for_review").text(data.answered_mark_for_review);
                        if(action == "clear"){
                            $(".question_tab.active").find(".drop_card .input-group-addon").removeClass("bg-success-subtle");
                            $(".question_tab.active").find(".drop_card .form-control").removeClass("bg-success-subtle ");
                        } else {
                            $(".question_tab.active").attr("data-status", "answered")
                            $(".question_tab.active").find(".drop_card .input-group-addon").addClass("bg-success-subtle");
                            $(".question_tab.active").find(".drop_card .form-control").addClass("bg-success-subtle ");
                        }
                        let hasNext = $(".question_btn.active").next().length;
                        if(hasNext > 0){
                            $(".question_btn.active").next().addClass("active");
                            $(".question_btn.active").eq(0).removeClass("active");
                            $(".question_tab.active").next().addClass("in active")
                            $(".question_tab.active").eq(0).removeClass("in active")
                        }
                    }
                },
                error: function(data, textStatus, errorThrown) {
                },
            });
        }
        // ORD End
        // SAQ Start
        function unansweredSAQ(question) {
            let input = "";
            let input_group_text = question.status == "answered"?"bg-success-subtle border-opacity-25 border-success":"";
            let form_control = question.status == "answered"?"border-success":"";
            let FIBAnswer = question.status == "answered"?question.user_answer:"";
            let tab =  `<div><div class="mt-2 d-inline-block py-1 px-2 rounded bg-secondary bg-opacity-25 font-size-13 font-monospace notice">Type your answer in the below text box</div></div>
                        <div class="answer_wrap mb-5 pb-5">
                            <div class="input-group my-3">
                                <span class="input-group-text px-3 input-group-addon `+input_group_text+`">1</span>
                                <input type="text" class="form-control shadow-none border-secondary border-opacity-25 answer_inp `+form_control+`" placeholder="Type your answer" value="`+FIBAnswer+`">
                            </div>
                        </div>`;
            return tab;
        }
        function submitSAQ(answer, action, section, current_section) {
            let current_question = $(".question_tab.active").data("index");
            let id = $(".question_tab.active").attr("id");
            var status;
            if(action == "submit" || action == "clear"){
                status = answer == ""?"not_answered":"answered";
            } else {
                status = action;
            }
            $.ajax({
                type: "POST",
                url: '/update_exam_answer/'+examSlug+'/'+sessionCode+'/'+section,
                data: {
                    current_question: current_question,
                    current_section: current_section,
                    current_section_total_time_taken: sectionTime[current_section].total_time_taken,
                    question_id: id,
                    status: status,
                    time_taken: time,
                    total_time_taken: totalTimeTaken,
                    user_answer: answer,
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    if(data){
                        stopTimer();
                        $("#answeredQuestions").text(data.answered);
                        $("#mark_for_review").text(data.mark_for_review);
                        $("#answered_mark_for_review").text(data.answered_mark_for_review);
                        if(action == "clear"){
                            $(".question_tab.active").find(".input-group-text").removeClass("border-success border-opacity-25 bg-success-subtle")
                            $(".question_tab.active").find(".answer_inp").removeClass("border-success")
                        } else {
                            $(".question_tab.active").find(".input-group-text").addClass("border-success border-opacity-25 bg-success-subtle")
                            $(".question_tab.active").find(".answer_inp").addClass("border-success")
                            $(".question_tab.active").attr("data-status", "answered")
                        }
                        let hasNext = $(".question_btn.active").next().length;
                        if(hasNext > 0){
                            $(".question_btn.active").next().addClass("active");
                            $(".question_btn.active").eq(0).removeClass("active");
                            $(".question_tab.active").next().addClass("in active")
                            $(".question_tab.active").eq(0).removeClass("in active")
                        }
                    }
                },
                error: function(data, textStatus, errorThrown) {
                },
            });
        }
        // SAQ End
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
        $(document).on('click', '.MSA_inp', function(){
            let type = $(".question_tab.active").data("type");
            $(this).addClass('border-success bg-success bg-opacity-25 active');
            $(this).siblings('span').addClass('border-success bg-success bg-opacity-25 border-opacity-10');
            $(this).parents(".input-group").siblings().find('span').removeClass('border-success bg-success bg-opacity-25 border-opacity-10');
            $(this).parents(".input-group").siblings().find('.MSA_inp').removeClass('border-success bg-success bg-opacity-25 active');
        });
        $(document).on('click', '.MMA_inp', function(){
            $(this).toggleClass("active");
        });
        function Dragable(id) {
            let dropItems = document.getElementById('drop_items_'+id);
            new Sortable(dropItems, {
                animation: 350,
                chosenClass: "sortable-chosen",
                dragClass: "sortable-drag"
            });
        }
        function drop(event) {
            let type = $(".question_tab.active").data("type");
            $(".question_tab.active").find(".drop_card").each(function(i){
                $(this).find(".MTF_index").text(++i)
            });
        }
        $(document).on('click', '.changeSection', function(){
            let id = $(this).data('id');
            let index = $(this).data('index');
            $("#clear, #review, #submit").attr("data-current_section", index);
            clearInterval(sectionintervalId);
            startsectionTimer(index);
            fetchQuestions("/exam/"+examSlug+"/questions/"+sessionCode+"/"+id, id);
        });
        $("#submit").click(function(){
            let type = $(".question_tab.active").data("type");
            var section = $(this).attr("data-section_id");
            var current_section = $(this).attr("data-current_section");
            if(type == "FIB"){
                var myArray = [];
                $(".question_tab.active").find(".answer_inp").each(function(i){
                    myArray.push(escapeHtmlEntities($(this).val()));
                });
                submitFIB(myArray, 'submit', section, current_section);
            } else if(type == "MSA"){
                let MSA_answer = $(".question_tab.active").find(".MSA_inp.active").data("id")
                submitMSA(MSA_answer, 'submit', section, current_section);
            } else if(type == "MMA"){
                let MMA_answer = [];
                $(".question_tab.active").find(".MMA_inp").each(function(i) {
                    let active = $(this).hasClass("active");
                    if(active){
                        MMA_answer.push(++i);
                    }
                });
                submitMMA(MMA_answer, 'submit', section, current_section);
            } else if(type == "MTF"){
                let MTF_answer = [];
                $(".question_tab.active").find(".drop_card").each(function(i) {
                    let id = $(this).find(".form-control").data("match_id");
                    let code = $(this).find(".form-control").data("match_code");
                    let value = $(this).find(".form-control").text();
                    MTF_answer.push({id: id, value: value, code: code});
                });
                submitMTF(MTF_answer, 'submit', section, current_section);
            } else if(type == "TOF"){
                let TOF_answer = $(".question_tab.active").find(".MSA_inp.active").data("id")
                submitTOF(TOF_answer, 'submit', section, current_section);
            } else if(type == "ORD"){
                let ORD_answer = [];
                $(".question_tab.active").find(".drop_card").each(function(i) {
                    let id = $(this).find(".form-control").data("match_id");
                    let code = $(this).find(".form-control").data("match_code");
                    let value = $(this).find(".form-control").text();
                    ORD_answer.push({id: id, value: value, code: code});
                });
                submitORD(ORD_answer, 'submit', section, current_section);
            } else if(type == "SAQ"){
                let value = $(".question_tab.active").find(".answer_inp").val();
                submitSAQ(escapeHtmlEntities(value), 'submit', section, current_section);
            }
        }); 
        $("#clear").click(function(){
            let type = $(".question_tab.active").data("type");
            var section = $(this).attr("data-section_id");
            var current_section = $(this).attr("data-current_section");
            
            if(type == "FIB"){
                $(".question_tab.active").find(".input-group-addon").removeClass("bg-success-subtle border-opacity-25 border-success")
                $(".question_tab.active").find(".answer_inp").removeClass("border-success")
                submitFIB([''], 'clear', section, current_section);
            } else if(type == "MSA"){
                submitMSA("", 'clear', section, current_section);
            } else if(type == "MMA"){
                submitMMA([''], 'clear', section, current_section);
            } else if(type == "MTF"){
                submitMTF([''], 'clear', section, current_section);
            } else if(type == "TOF"){
                submitTOF("", 'clear', section, current_section);
            } else if(type == "ORD"){
                submitORD([''], 'clear', section, current_section);
            } else if(type == "SAQ"){
                submitSAQ("", 'clear', section, current_section);
            }
        }); 
        $("#review").click(function(){
            let type = $(".question_tab.active").data("type");
            var section = $(this).attr("data-section_id");
            var current_section = $(this).attr("data-current_section");
            
            if(type == "FIB"){
                var myArray = [];
                $(".question_tab.active").find(".answer_inp").each(function(i){
                    myArray.push(escapeHtmlEntities($(this).val()));
                });
                let status = myArray.includes("")?"mark_for_review":"answered_mark_for_review";
                submitFIB(myArray, status, section, current_section);
            } else if(type == "MSA"){
                let MSA_answer = $(".question_tab.active").find(".MSA_inp.active").data("id")
                // console.log(MSA_answer);
                let status = MSA_answer==undefined?"mark_for_review":"answered_mark_for_review";
                submitMSA(MSA_answer, status, section, current_section);
            } else if(type == "MMA"){
                let MMA_answer = [];
                $(".question_tab.active").find(".MMA_inp").each(function(i) {
                    let active = $(this).hasClass("active");
                    if(active){
                        MMA_answer.push(++i);
                    }
                });
                let status = MMA_answer.length < 1 ? "mark_for_review" : "answered_mark_for_review";
                submitMMA(MMA_answer, status, section, current_section);
            } else if(type == "MTF"){
                let MTF_answer = [];
                $(".question_tab.active").find(".drop_card").each(function(i) {
                    let id = $(this).find(".form-control").data("match_id");
                    let code = $(this).find(".form-control").data("match_code");
                    let value = $(this).find(".form-control").text();
                    MTF_answer.push({id: id, value: value, code: code});
                });
                let status = $(".question_tab.active").find(".drop_card .form-control").hasClass("bg-success-subtle")?"answered_mark_for_review":"mark_for_review";
                submitMTF(MTF_answer, status, section, current_section);
            } else if(type == "TOF"){
                let TOF_answer = $(".question_tab.active").find(".MSA_inp.active").data("id")
                let status = TOF_answer==undefined?"mark_for_review":"answered_mark_for_review";
                submitTOF(TOF_answer, status, section, current_section);
            } else if(type == "ORD"){
                let ORD_answer = [];
                $(".question_tab.active").find(".drop_card").each(function(i) {
                    let id = $(this).find(".form-control").data("match_id");
                    let code = $(this).find(".form-control").data("match_code");
                    let value = $(this).find(".form-control").text();
                    ORD_answer.push({id: id, value: value, code: code});
                });
                let status = $(".question_tab.active").find(".drop_card .form-control").hasClass("bg-success-subtle")?"answered_mark_for_review":"mark_for_review";
                submitORD(ORD_answer, status, section, current_section);
            } else if(type == "SAQ"){
                let value = $(".question_tab.active").find(".answer_inp").val();
                let status = value==""?"mark_for_review":"answered_mark_for_review";
                submitSAQ(escapeHtmlEntities(value), status, section, current_section);
            }
        });
        $(document).on('click', '#finish', function(){
            var questions = [];
            examSections.forEach(function(section, i) {
                $.ajax({
                    type: "GET",
                    url: "/exam/"+examSlug+"/questions/"+sessionCode+"/"+section.id,
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
                                url: "/exam/"+examSlug+"/finish/"+sessionCode,
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
                                    console.log(data);
                                },
                            });
                        }
                    },
                    error: function(data, textStatus, errorThrown) {},
                });
            });  
        });
        $(document).ready(function () {
            $(".menu_btn").click(function () {
                if ($(this).hasClass("bx-menu")) {
                    $(this).removeClass("bx-menu");
                    $(this).addClass("bx-category");
                    $(".category_question").hide();
                }
                else {
                    $(this).addClass("bx-menu");
                    $(this).removeClass("bx-category");
                    $(".category_question").show();
                }
            })
            $("#rightBar_btn").click(function () {
                $("#right_bar_offcanvas").removeClass("d-none");
                $("#right_bar_offcanvas").hide().fadeIn(200);
            });
            $("#rightBar_close").click(function () {
                $("#right_bar_offcanvas").show().fadeOut(200);
                $("#right_bar_offcanvas").addClass("d-none");

            });
            $("#fullscreen_btn").click(function () {
                let docElement = document.documentElement;
                if (docElement.requestFullscreen) {
                    docElement.requestFullscreen();
                } else if (docElement.mozRequestFullScreen) {
                    docElement.mozRequestFullScreen();
                } else if (docElement.webkitRequestFullscreen) {
                    docElement.webkitRequestFullscreen();
                } else if (docElement.msRequestFullscreen) {
                    docElement.msRequestFullscreen();
                }
            });
            $('.card-slider').slick({
                dots: false,
                arrows: true,
                variableWidth: true,
                infinite: false,
                responsive: [
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 3
                        }
                    },
                    {
                        breakpoint: 800,
                        settings: {
                            slidesToShow: 2
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 1
                        }
                    }
                ]
            });
        });
    </script>
</body>

</html>