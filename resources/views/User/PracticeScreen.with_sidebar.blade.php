<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>{{$practiceSet['title']}} Practise - Student Portal - Tutors 11 Plus</title>
        <link rel="shortcut icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}" type="image/x-icon">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
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
        </style>
    </head>
    <body>
        <div id="mySidenav" class="sidenav py-0 h-100 position-fixed top-0 start-0">
            <div class="bg-white d-flex justify-content-between align-items-center position-sticky top-0 px-2 pt-3 pb-2">
                <div>
                    <h5 class="fw-normal mb-1">{{$practiceSet['title']}}</h5>
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
        <div id="main" class="bg-light overflow-scroll p-0 position-relative vh-100">
            <div class="bg-white py-2 px-4 shadow-sm position-sticky w-100 top-0 z-index-1">
                <div class="d-flex m-auto justify-content-end" style="max-width: 900px;">
                    <div class="me-3 h1">
                        <span class="d-block d-md-none openNavToggle" style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
                    </div>                    
                    <a href="/practice/{{$practiceSet['slug']}}/analysis/{{$session['code']}}" style="background:#f6f9ff;" class="btn border py-1 px-2 opacity-75 d-flex h-100">
                        <img src="https://cdn-icons-png.flaticon.com/512/9858/9858878.png" width="25" alt="">
                    </a>
                </div>
            </div>
            <div class="my-2 p-3 m-auto" style="min-height: 90%;max-width:900px;">
                <div class="tab-content" id="nav-tabContent"></div>
            </div>
            <div class="bg-white py-3 px-4 shadow-lg position-sticky w-100 bottom-0 z-index-5">
                <div id="move_question" class="d-flex m-auto justify-content-between" style="max-width: 900px;">
                    <button id="prev" class="btn btn-light border border-secondary opacity-75 d-flex align-items-center">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" style="width: 20px;" class="me-1"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                        Previous
                    </button>
                    <button id="next" class="btn btn-light border border-secondary opacity-75 d-flex align-items-center">
                        Next
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" style="width: 20px;" class="ms-1"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </button>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
        <script>
            let practiceSetSlug = {!! str_replace("'", "\'", json_encode($practiceSet['slug'])) !!};
            let sessionCode = {!! str_replace("'", "\'", json_encode($session['code'])) !!};
            let totalTimeTaken = {!! str_replace("'", "\'", json_encode($session['total_time_taken'])) !!};
            var total_page = 1;
            var current_page = 1;
            var total_answered = 0;
            var total_questions = 0;
            var current_question = 0;
            var time = 0;
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
            fetchPracticeQuestions('/practice/'+practiceSetSlug+'/questions/'+sessionCode+'?page=1',1);
            function fetchPracticeQuestions(reqUrl, page) {
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
                            total_page = pagination.total_pages;
                            current_page = pagination.current_page;
                            total_questions = pagination.total;
                            $("#nav-tab").empty();
                            $("#nav-tabContent").empty();
                            $("#nav-tab").append('<div class="text-black my-3 mx-2 fw-light questions_attempted">'+total_answered+'/'+pagination.total+' Attempted</div>');
                            questions.forEach(function(question, i){
                                console.log(question.comprehension);
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
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-xl">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title text-dark" id="modalToggleLabel">Comprehension passage</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">`+question.comprehension+`</div>
                                                    </div>
                                                </div>
                                            </div>`;
                                }
                                let button = `<div class="video_btn_wrap">
                                                <div class="text-black m-2">`+index+`.</div>
                                                <button class="d-flex align-items-center mb-3 w-100 bg-light border-0 rounded-1 py-2 video_btn shadow-sm" data-index="`+index+`" data-page="`+pagination.current_page+`" id="video-tab-`+page+i+`" data-bs-toggle="tab" data-bs-target="#video-`+page+i+`" type="button" role="tab" aria-controls="video-`+page+i+`" aria-selected="false">
                                                    <div class="video_title text-start font-size-13">`+question.question+`</div>
                                                </button>
                                            </div>`;
                                let tab = `<div class="bg-white shadow-sm rounded py-4 px-5 tab-pane fade video_tab rounded-5" data-type="`+question.questionType+`" data-status="`+question.status+`" data-id="`+question.code+`" id="video-`+page+i+`" role="tabpanel" aria-labelledby="video-tab-`+page+i+`">
                                            <div class="mb-2 font-size-13 d-flex justify-content-between"> <div><span class="fw-semibold">Q`+index+` of `+pagination.total+`</span> <span class="fw-light text-muted text-uppercase">| `+question.skill+`</span></div> `+modal_btn+` </div>
                                            <div class="fw-light d-flex"><div class="me-2"><div class="m-auto rounded-circle" style="width: 50px;height: 50px;background-position: center;background-size: cover;background-image: url(/{{ Auth::user()->profile_photo_path }});"></div></div><div class="">`+question.question+`</div></div>
                                            <div id="answer`+pagination.current_page+i+`"></div>
                                        </div>`;
                                $("#nav-tab").append(button);
                                $("#nav-tabContent").append(tab+modal);
                                if(i == 0){
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
                            current_question = $(".video_btn.active").data("index");
                            checkFinish(current_page, total_page, total_questions, total_answered, current_question);
                        }
                    },
                    error: function(data, textStatus, errorThrown) {
                        console.log(textStatus);
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
                    $("#move_question").append('<button id="submit" data-type="'+type+'" class="btn custom-btn fw-light text-white px-4">submit</button>')
                } else if (!checkEmptyVal(myArray)){
                    $("#next").removeClass("d-none");
                    $("#submit").remove();
                }
            });
            function checkEmptyVal(arr) {
                return arr.indexOf("") === -1;
            }
            $(document).on('click', '#next', function(){
                let hasNext = $(".video_btn.active").parent().next().length;
                if(hasNext > 0){
                    $(".video_btn.active").parent().next().find(".video_btn").click();
                }
            });
            $(document).on('click', '#prev', function(){
                let hasPrev = $(".video_btn.active").parent().prev().not(".questions_attempted").length;
                if(hasPrev > 0){
                    $(".video_btn.active").parent().prev().find(".video_btn").click();
                }
            });
            $(document).on('click', '#submit', function(){
                total_answered = total_answered + 1;
                let index = $(".video_btn.active").data("index");
                let type = $(".video_tab.active").data("type");
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
                checkFinish(current_page, total_page, total_questions, total_answered, index)
            });
            $(document).on('click', '#finish', function(){
                $.ajax({
                    type: "POST",
                    url: '/practice/'+practiceSetSlug+'/finish/'+sessionCode,
                    data: {
                        replace: true,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        if(data){
                            window.location.href = "/practice/"+practiceSetSlug+"/analysis/"+sessionCode;
                        }
                    },
                    error: function(data, textStatus, errorThrown) {
                    },
                });
                console.log("Finished")
            });
            $(".move_page").click(function(){
                let url = $(this).attr("data-url");
                if(url && url != ""){
                    fetchPracticeQuestions(url,1);
                }
            });
            $(document).on('click', '.MSA_inp', function(){
                let type = $(".video_tab.active").data("type");
                $(this).addClass('border-success bg-success bg-opacity-25 active');
                $(this).siblings('span').addClass('border-success bg-success bg-opacity-25 border-opacity-10');
                $(this).parents(".input-group").siblings().find('span').removeClass('border-success bg-success bg-opacity-25 border-opacity-10');
                $(this).parents(".input-group").siblings().find('.MSA_inp').removeClass('border-success bg-success bg-opacity-25 active');
                if($("#submit").length < 1) {
                    $("#next").addClass("d-none");
                    $("#move_question").append('<button id="submit" data-type="'+type+'" class="btn custom-btn fw-light text-white px-4">submit</button>')
                }
            });
            $(document).on('click', '.MMA_inp', function(){
                $(this).toggleClass("active");
                let type = $(".video_tab.active").data("type");
                let answered = $(".video_tab.active").find(".MMA_inp.active").length;
                if(answered > 0){
                    if($("#submit").length < 1) {
                        $("#next").addClass("d-none");
                        $("#move_question").append('<button id="submit" data-type="'+type+'" class="btn custom-btn fw-light text-white px-4">submit</button>')
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
                        options.push('<div class="alert alert-success border rounded p-2 mb-2"><span class="badge bg-dark me-1">'+(++i)+'</span> '+answer+'</div>');
                    } else {
                        options.push('<div class="alert alert-danger border rounded p-2 mb-2"><span class="badge bg-dark me-1">'+(++i)+'</span> '+answer+'</div>');
                    }
                });
                question.ca.forEach(function(answer, i) {
                    answers.push('<span>'+(++i)+'. '+answer+' </span>');
                });
                var anwerwrap;
                if(question.ca.length > 1){
                    anwerwrap = '<div class="alert alert-success py-2 mt-3 text-dark">Correct answers for the blanks are '+answers.join("")+' </div>'
                } else {
                    anwerwrap = '<div class="alert alert-success py-2 mt-3 text-dark">Correct answer for the blank is '+answers.join("")+' </div>'
                }
                let tab = `<div>`+options.join("")+anwerwrap+`</div>`;
                return tab;
            }
            function unansweredFIB(question){
                let input = "";
                for (let i = 0; i < question.options; i++) {
                    let index = i+1;
                      input +=  `<div class="input-group my-3">
                                    <span class="input-group-text px-3">`+index+`</span>
                                    <input type="text" class="form-control shadow-none border-secondary border-opacity-25 answer_inp" placeholder="Type your answer for blank `+index+`">
                                </div>`;
                }
                let tab =  `<div class="bg-light bg-opacity-25 d-inline-block font-monospace font-size-13 mt-2 notice px-2 py-1 rounded shadow-sm">Fill the blanks in the below text boxes</div>
                            <div class="answer_wrap">`+input+`</div>`;
                return tab;
            }
            function submitFIB(myArray) {
                $.ajax({
                    type: "POST",
                    url: '/check_practice_answer/'+practiceSetSlug+'/'+sessionCode,
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
                            let options = [];
                            let answers = [];
                            myArray.forEach(function(answer, i) {
                                if(answer.toLowerCase() == data.ca[i].toLowerCase()){
                                    options.push('<div class="alert alert-success border rounded p-2 mb-2"><span class="badge bg-dark me-1">'+(++i)+'</span> '+answer+'</div>');
                                } else {
                                    options.push('<div class="alert alert-danger border rounded p-2 mb-2"><span class="badge bg-dark me-1">'+(++i)+'</span> '+answer+'</div>');
                                }
                            });
                            data.ca.forEach(function(answer, i) {
                                answers.push('<span>'+(++i)+'. '+answer+' </span>');
                            });
                            var anwerwrap;
                            if(data.ca.length > 1){
                                anwerwrap = '<div class="alert alert-success py-2 mt-3 text-dark">Correct answers for the blanks are '+answers.join("")+' </div>'
                            } else {
                                anwerwrap = '<div class="alert alert-success py-2 mt-3 text-dark">Correct answer for the blank is '+answers.join("")+' </div>'
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
                            input +=  `<div class="input-group my-3">
                                    <span class="input-group-text px-3 input-group-text px-3 bg-success bg-opacity-25">`+index+`</span>
                                    <div class="form-control shadow-none border-opacity-25 select_wrap bg-success bg-opacity-25">`+option+`</div>
                                </div>`;
                        } else {
                            input +=  `<div class="input-group my-3">
                                    <span class="input-group-text px-3 input-group-text px-3 bg-danger bg-opacity-25">`+index+`</span>
                                    <div class="form-control shadow-none border-opacity-25 select_wrap bg-danger bg-opacity-25">`+option+`</div>
                                </div>`;
                        }
                    } else {
                        input +=  `<div class="input-group my-3">
                                    <span class="input-group-text px-3">`+index+`</span>
                                    <div class="form-control shadow-none border-secondary border-opacity-25 select_wrap">`+option+`</div>
                                </div>`;
                    }
                correctAnswer = `<div class="alert alert-success py-2 mt-3 text-dark">Correct answer is Option `+question.ca+`</div>`;
                });
                let tab =  `<div class="answer_wrap">`+input+correctAnswer+`</div>`;
                return tab;
            }
            function unansweredMSA(question) {
                let input = "";
                question.options.forEach(function(option, i) {
                    let index = i+1;
                    input +=  `<div class="input-group my-3">
                                    <span class="input-group-text px-3">`+index+`</span>
                                    <div class="form-control shadow-none border-secondary border-opacity-25 cursor-pointer MSA_inp select_wrap" data-id="`+index+`">`+option+`</div>
                                </div>`;
                });
                let tab =  `<div class="bg-light bg-opacity-25 d-inline-block font-monospace font-size-13 mt-2 notice px-2 py-1 rounded shadow-sm">Choose one option</div>
                            <div class="answer_wrap">`+input+`</div>`;
                return tab;
            }
            function submitMSA(answer) {
                $.ajax({
                    type: "POST",
                    url: '/check_practice_answer/'+practiceSetSlug+'/'+sessionCode,
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
                        if(!data.is_correct){
                            $(".video_tab.active").find(".MSA_inp").each(function(i){
                                if(++i == data.ca){
                                    $(this).addClass('border-success bg-success bg-opacity-25')
                                    $(this).siblings('span').addClass('border-success bg-success bg-opacity-25 border-opacity-10')
                                }
                            });
                            $(".MSA_inp.active").removeClass('border-success bg-success');
                            $(".MSA_inp.active").siblings('span').removeClass('border-success bg-success');
                            $(".MSA_inp.active").addClass('border-danger bg-danger');
                            $(".MSA_inp.active").siblings('span').addClass('border-danger bg-danger');
                        }
                        $(".video_tab.active").find(".notice").remove();
                        $(".video_tab.active").find(".MSA_inp").removeClass("MSA_inp active cursor-pointer");
                        $(".video_tab.active").find(".answer_wrap").append('<div class="alert alert-success py-2 mt-3 text-dark">Correct answer is Option '+data.ca+'</div>');
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
                        input +=  `<div class="input-group my-3 MMA_wrap correct">
                                        <span class="input-group-text px-3">`+index+`</span>
                                        <div class="form-control shadow-none border-secondary border-opacity-25 select_wrap" data-id="`+index+`">`+option+`</div>
                                    </div>`;
                    } else {
                        if(question.user_answer.includes(index.toString())){
                            if(question.ca.includes(index.toString())){
                                input +=  `<div class="input-group my-3 MMA_wrap correct">
                                        <span class="input-group-text px-3">`+index+`</span>
                                        <div class="form-control shadow-none border-secondary border-opacity-25 select_wrap" data-id="`+index+`">`+option+`</div>
                                    </div>`;
                            } else {
                                input +=  `<div class="input-group my-3 MMA_wrap incorrect">
                                        <span class="input-group-text px-3">`+index+`</span>
                                        <div class="form-control shadow-none border-secondary border-opacity-25 select_wrap" data-id="`+index+`">`+option+`</div>
                                    </div>`;
                            }
                        } else {
                            input +=  `<div class="input-group my-3 MMA_wrap">
                                        <span class="input-group-text px-3">`+index+`</span>
                                        <div class="form-control shadow-none border-secondary border-opacity-25 select_wrap" data-id="`+index+`">`+option+`</div>
                                    </div>`;
                        }
                    }
                });
                let tab =  `<div class="answer_wrap">`+input+`<div class="alert alert-success py-2 mt-3 text-dark">Correct answers are option `+question.ca.join(", ")+`</div></div>`;
                return tab;
            }
            function unansweredMMA(question) {
                let input = "";
                question.options.forEach(function(option, i) {
                    let index = i+1;
                    input +=  `<div class="input-group my-3 MMA_inp cursor-pointer">
                                    <span class="input-group-text px-3">`+index+`</span>
                                    <div class="form-control shadow-none border-secondary border-opacity-25 select_wrap" data-id="`+index+`">`+option+`</div>
                                </div>`;
                });
                let tab =  `<div class="bg-light bg-opacity-25 d-inline-block font-monospace font-size-13 mt-2 notice px-2 py-1 rounded shadow-sm">Choose multiple option</div>
                            <div class="answer_wrap">`+input+`</div>`;
                return tab;
            }
            function submitMMA(answer) {
                $.ajax({
                    type: "POST",
                    url: '/check_practice_answer/'+practiceSetSlug+'/'+sessionCode,
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
                        if(data.is_correct){
                            answer.forEach(function(a, i){
                                decrement = a-1;
                                $(".video_tab.active").find(".MMA_inp").eq(decrement).addClass("correct");
                            });
                        } else {
                            answer.forEach(function(a, i){
                                decrement = a-1;
                                data.ca.forEach(function(correctAns, ca) {
                                    if(a == correctAns){
                                        $(".video_tab.active").find(".MMA_inp").eq(decrement).addClass("correct");
                                    }
                                });
                                if(!data.ca.includes(a.toString())){
                                    $(".video_tab.active").find(".MMA_inp").eq(decrement).addClass("incorrect");
                                }
                            });
                        }
                        $(".video_tab.active").find(".MMA_inp").addClass("MMA_wrap").removeClass("MMA_inp");
                        let tab = `<div class="alert alert-success py-2 mt-3 text-dark">Correct answers are option `+data.ca.join(", ")+`</div>`;
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
                    matches +=  `<div class="input-group my-3">
                                    <span class="input-group-text px-3">`+index+`</span>
                                    <div class="form-control shadow-none border-secondary border-opacity-25" data-id="`+index+`" data-match_id=`+match.id+`>`+match.value+`</div>
                                </div>`;
                });
                question.user_answer.forEach(function(pair , i) {
                    let index = i+1;
                    if (pair.id == question.ca[i]) {
                        pairs += `<div class="input-group my-3">
                                    <span class="input-group-text px-3 bg-success  bg-opacity-25">`+index+`</span>
                                    <div class="form-control shadow-none border-secondary bg-success  bg-opacity-25 border-opacity-25" data-id="`+index+`" data-match_id=`+pair.id+`>`+pair.value+`</div>
                                </div>`;
                    } else {
                        pairs += `<div class="input-group my-3">
                                    <span class="input-group-text px-3 bg-danger bg-opacity-25">`+index+`</span>
                                    <div class="form-control shadow-none border-secondary bg-danger bg-opacity-25 border-opacity-25" data-id="`+index+`" data-match_id=`+pair.id+`>`+pair.value+`</div>
                                </div>`;
                    }
                });

                let tab =  `<div class="bg-light bg-opacity-25 d-inline-block font-monospace font-size-13 mt-2 notice px-2 py-1 rounded shadow-sm">
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
                    matches +=  `<div class="input-group my-3">
                                    <span class="input-group-text px-3">`+index+`</span>
                                    <div class="form-control shadow-none border-secondary border-opacity-25" data-id="`+index+`" data-match_id=`+match.id+`>`+match.value+`</div>
                                </div>`;
                });
                question.options.pairs.forEach(function(pair, i) {
                    let index = i+1;
                    // index - pair.id - pair.value
                    pairs +=  `<div class="input-group my-3 drop_card" ondragend="drop(event)">
                                    <span class="input-group-text px-3"><span class="MTF_index me-1">`+index+` </span> - `+pair.code+`</span>
                                    <div class="form-control shadow-none border-secondary border-opacity-25" data-id="`+index+`" data-match_id=`+pair.id+` data-match_code=`+pair.code+`>`+pair.value+`</div>
                                </div>`;
                });
                let tab =  `<div class="bg-light bg-opacity-25 d-inline-block font-monospace font-size-13 mt-2 notice px-2 py-1 rounded shadow-sm">
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
                    url: '/check_practice_answer/'+practiceSetSlug+'/'+sessionCode,
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
                        answer.forEach(function(match, i) {
                            let index = i+1;
                            if(answer[i].id == data.ca[i]){
                                matches +=  `<div class="input-group my-3">
                                            <span class="input-group-text px-3 bg-success bg-opacity-25">`+index+` - `+match.code+`</span>
                                            <div class="form-control bg-success bg-opacity-25 shadow-none border-secondary border-opacity-25" data-id="`+index+`" data-match_id=`+match.id+`>`+match.value+`</div>
                                        </div>`;
                            } else {
                                matches +=  `<div class="input-group my-3">
                                            <span class="input-group-text px-3 bg-danger bg-opacity-25">`+index+` - `+match.code+`</span>
                                            <div class="form-control bg-danger bg-opacity-25 shadow-none border-secondary border-opacity-25" data-id="`+index+`" data-match_id=`+match.id+`>`+match.value+`</div>
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
                            input +=  `<div class="input-group my-3">
                                    <span class="input-group-text px-3 input-group-text px-3 bg-success bg-opacity-25">`+index+`</span>
                                    <div class="form-control shadow-none border-opacity-25 select_wrap bg-success bg-opacity-25">`+option+`</div>
                                </div>`;
                        } else {
                            input +=  `<div class="input-group my-3">
                                    <span class="input-group-text px-3 input-group-text px-3 bg-danger bg-opacity-25">`+index+`</span>
                                    <div class="form-control shadow-none border-opacity-25 select_wrap bg-danger bg-opacity-25">`+option+`</div>
                                </div>`;
                        }
                    } else {
                        input +=  `<div class="input-group my-3">
                                    <span class="input-group-text px-3">`+index+`</span>
                                    <div class="form-control shadow-none border-secondary border-opacity-25 select_wrap">`+option+`</div>
                                </div>`;
                    }
                correctAnswer = `<div class="alert alert-success py-2 mt-3 text-dark">Correct answer is Option `+question.ca+`</div>`;
                });
                let tab =  `<div class="answer_wrap">`+input+correctAnswer+`</div>`;
                return tab;
            }
            function unansweredTOF(question) {
                let input = "";
                question.options.forEach(function(option, i) {
                    let index = i+1;
                    input +=  `<div class="input-group my-3">
                                    <span class="input-group-text px-3">`+index+`</span>
                                    <div class="form-control shadow-none border-secondary border-opacity-25 cursor-pointer MSA_inp select_wrap" data-id="`+index+`">`+option+`</div>
                                </div>`;
                });
                let tab =  `<div class="bg-light bg-opacity-25 d-inline-block font-monospace font-size-13 mt-2 notice px-2 py-1 rounded shadow-sm">Choose one option</div>
                            <div class="answer_wrap">`+input+`</div>`;
                return tab;
            }
            function submitTOF(answer) {
                $.ajax({
                    type: "POST",
                    url: '/check_practice_answer/'+practiceSetSlug+'/'+sessionCode,
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
                        if(!data.is_correct){
                            $(".video_tab.active").find(".MSA_inp").each(function(i){
                                if(++i == data.ca){
                                    $(this).addClass('border-success bg-success bg-opacity-25')
                                    $(this).siblings('span').addClass('border-success bg-success bg-opacity-25 border-opacity-10')
                                }
                            });
                            $(".MSA_inp.active").removeClass('border-success bg-success');
                            $(".MSA_inp.active").siblings('span').removeClass('border-success bg-success');
                            $(".MSA_inp.active").addClass('border-danger bg-danger');
                            $(".MSA_inp.active").siblings('span').addClass('border-danger bg-danger');
                        }
                        $(".video_tab.active").find(".notice").remove();
                        $(".video_tab.active").find(".MSA_inp").removeClass("MSA_inp active cursor-pointer");
                        $(".video_tab.active").find(".answer_wrap").append('<div class="alert alert-success py-2 mt-3 text-dark">Correct answer is Option '+data.ca+'</div>');
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
                        orders += `<div class="input-group my-3">
                                    <span class="input-group-text px-3 bg-success  bg-opacity-25">`+index+`</span>
                                    <div class="form-control shadow-none border-secondary bg-success  bg-opacity-25 border-opacity-25" data-id="`+index+`" data-match_id=`+order.id+`>`+order.value+`</div>
                                </div>`;
                    } else {
                        orders += `<div class="input-group my-3">
                                    <span class="input-group-text px-3 bg-danger bg-opacity-25">`+index+`</span>
                                    <div class="form-control shadow-none border-secondary bg-danger bg-opacity-25 border-opacity-25" data-id="`+index+`" data-match_id=`+order.id+`>`+order.value+`</div>
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
                    order +=  `<div class="input-group my-3 drop_card" ondragend="drop(event)">
                                    <span class="input-group-text px-3"><span class="MTF_index me-1">`+index+` </span> - `+ord.code+`</span>
                                    <div class="form-control shadow-none border-secondary border-opacity-25" data-id="`+index+`" data-match_id=`+ord.id+` data-match_code=`+ord.code+`>`+ord.value+`</div>
                                </div>`;
                });
                let tab =  `<div class="bg-light bg-opacity-25 d-inline-block font-monospace font-size-13 mt-2 notice px-2 py-1 rounded shadow-sm">
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
                    url: '/check_practice_answer/'+practiceSetSlug+'/'+sessionCode,
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
                        answer.forEach(function(match, i) {
                            let index = i+1;
                            if(answer[i].id == data.ca[i]){
                                matches +=  `<div class="input-group my-3">
                                            <span class="input-group-text px-3 bg-success bg-opacity-25">`+index+` - `+match.code+`</span>
                                            <div class="form-control bg-success bg-opacity-25 shadow-none border-secondary border-opacity-25" data-id="`+index+`" data-match_id=`+match.id+`>`+match.value+`</div>
                                        </div>`;
                            } else {
                                matches +=  `<div class="input-group my-3">
                                            <span class="input-group-text px-3 bg-danger bg-opacity-25">`+index+` - `+match.code+`</span>
                                            <div class="form-control bg-danger bg-opacity-25 shadow-none border-secondary border-opacity-25" data-id="`+index+`" data-match_id=`+match.id+`>`+match.value+`</div>
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
                if(question.is_correct){
                    tab = `<div class="input-group my-3">
                            <span class="input-group-text px-3 bg-success bg-opacity-25">1</span>
                            <div class="form-control shadow-none border-secondary border-opacity-25 bg-success bg-opacity-25">`+question.user_answer+`</div>
                        </div>`
                } else {
                    tab = `<div class="input-group my-3">
                            <span class="input-group-text px-3 bg-danger bg-opacity-25">1</span>
                            <div class="form-control shadow-none border-secondary border-opacity-25 bg-danger bg-opacity-25">`+question.user_answer+`</div>
                        </div>`
                }
                if(question.ca.length > 1) {
                    correctAnswers = '<div class="alert alert-success py-2 mt-3 text-dark">Acceptable answers are: '+question.ca.join(", ")+' </div>'
                } else {
                    correctAnswers = '<div class="alert alert-success py-2 mt-3 text-dark">Acceptable answer is: '+question.ca.join(", ")+' </div>'
                }
                return tab+correctAnswers;
            }
            function unansweredSAQ(question) {
                let input = "";
                let tab =  `<div class="bg-light bg-opacity-25 d-inline-block font-monospace font-size-13 mt-2 notice px-2 py-1 rounded shadow-sm">Type your answer in the below text box</div>
                            <div class="answer_wrap">
                                <div class="input-group my-3">
                                    <span class="input-group-text px-3">1</span>
                                    <input type="text" class="form-control shadow-none border-secondary border-opacity-25 answer_inp" placeholder="Type your answer">
                                </div>
                            </div>`;
                return tab;
            }
            function submitSAQ(answer) {
                $.ajax({
                    type: "POST",
                    url: '/check_practice_answer/'+practiceSetSlug+'/'+sessionCode,
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
                            let tab, correctAnswers;
                            if(data.is_correct){
                                tab = `<div class="input-group my-3">
                                                <span class="input-group-text px-3 bg-success bg-opacity-25">1</span>
                                                <div class="form-control shadow-none border-secondary border-opacity-25 bg-success bg-opacity-25">`+answer+`</div>
                                            </div>`
                            } else {
                                tab = `<div class="input-group my-3">
                                                <span class="input-group-text px-3 bg-danger bg-opacity-25">1</span>
                                                <div class="form-control shadow-none border-secondary border-opacity-25 bg-danger bg-opacity-25">`+answer+`</div>
                                            </div>`
                            }
                            if(data.ca.length > 1) {
                                correctAnswers = '<div class="alert alert-success py-2 mt-3 text-dark">Acceptable answers are: '+data.ca.join(", ")+' </div>'
                            } else {
                                correctAnswers = '<div class="alert alert-success py-2 mt-3 text-dark">Acceptable answer is: '+data.ca.join(", ")+' </div>'
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
                // console.log("currentPage: ", currentPage, "totalPages: ", totalPages, "totalQuestions: ", totalQuestions, "totalAnswered", totalAnswered, "currentQuestion: ", currentQuestion);
                if(currentPage == totalPages && totalQuestions == totalAnswered && totalQuestions ==  currentQuestion){
                    if($(".finish").length < 1){
                        $("#move_question").append('<button id="finish" class="btn text-white custom-btn fw-light px-4 finish">Finish</button>');
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
                    $("#move_question").append('<button id="submit" data-type="'+type+'" class="btn custom-btn fw-light text-white px-4">submit</button>')
                }
            }
        </script>
    </body>
</html>
