<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$quiz['title']}} | Intructions - Student Portal - Tutors 11 Plus</title>
    <link rel="shortcut icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}" type="image/x-icon">
</head>
<style>
    /* navbar css end */
    .not_allowed {
        cursor: not-allowed !important;
    }

    /* decription css start */
    .quiz_intruction_heading {
        color: #000;
        font-size: 1.2rem;
        font-weight: 600;
    }

    .description_heading {
        color: #000;
        font-size: 1rem;
        font-weight: 400;
    }

    .table_edit {
        color: #000;
        font-size: 0.9rem;
        font-weight: 400;
    }

    /* decription css start */

    .first_term_name {
        color: #000;
        font-size: 0.9rem;
        font-weight: 400;
    }


    .Fixed_heading {
        color: #000;
        font-size: 0.9rem;
        font-weight: 600;
    }

    .quiz_sheet_all_styling li {
        color: #000;
        font-size: 0.9rem;
        font-weight: 400;
    }

    .border-right {
        border-right: 1px solid #D9DEE2;
    }

    @media screen and (max-width:991px) {
        .border-right {
            border-right: none;
        }
    }

    /* custom css end */
</style>

<body>
    @include('sidebar')
    @include('header')

    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- start quiz sheet start -->
        <div class="bg-white h-auto py-4 px-3 rounded shadow quiz_sheet_all_styling">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <p class="mb-0 d-inline bg-label-primary badge py-1 text-capitalize">{{$quiz['category']}}</p>
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-9 col-12 border-right">
                        <h3 class="mb-0 py-2" style="color: #000; font-size: 1.3rem; font-weight: 600;">
                            {{$quiz['title']}}</h3>
                        <div class="text-warning fw-lighter"> <span class="bg-warning d-inline-block rounded-circle"
                                style="width:10px;height:10px;"></span> {{$quiz['type']}}</div>
                        <hr class="my-4">
                        <div class="row py-4">
                            <div class="col-4">
                                <h5 class="font-monospace fs-6 text-primary">Total Duration</h5>
                                <h4 class="fs-5 fw-normal text-dark">{{$quiz['total_duration']}} Minutes</h4>
                            </div>
                            <div class="col-4">
                                <h5 class="font-monospace fs-6 text-primary">No. of Questions</h5>
                                <h4 class="fs-5 fw-normal text-dark">{{$quiz['total_questions']}} Questions</h4>
                            </div>
                            <div class="col-4">
                                <h5 class="font-monospace fs-6 text-primary">Total Marks</h5>
                                <h4 class="fs-5 fw-normal text-dark">{{$quiz['total_marks']}} Marks</h4>
                            </div>
                        </div>


                        <!-- content section start -->
                        <div class="description my-5">
                            <p class="description_heading fw-lighter text-secondary"> {{$quiz['description']}} </p>
                            <hr class="my-5">
                            <h5 class="quiz_intruction_heading">Quiz Instructions</h5>
                            <ul>
                                <li class="my-2 text-black">Total duration of quiz is {{$quiz['total_duration']}}
                                    minutes.</li>
                                <li class="my-2 text-black">The quiz contains {{$quiz['total_questions']}} questions.
                                </li>
                                @if($setting['auto_grading'])
                                <li class="my-2 text-black">You will be awarded Random marks for each correct answer.
                                </li>
                                @else
                                <li class="my-2 text-black">You will be awarded {{$setting['correct_marks']}} marks for
                                    each correct answer.</li>
                                @endif
                                @if($setting['enable_negative_marking'])
                                <li class="my-2 text-black">{{$setting['negative_marks']}} marks will be deducted for
                                    each wrong answer.</li>
                                @else
                                <li class="my-2 text-black">There is no negative marking for wrong answers.</li>
                                @endif
                                <li class="my-2 text-black">Minimum Pass Percentage is {{$cutoff}}%.</li>
                            </ul>

                            <hr class="my-5">
                            <h5 class="quiz_intruction_heading">Standard Instructions</h5>
                            <ul>
                                <li class="my-2 text-black">The clock will be set at the server. The countdown timer in
                                    the top right corner of screen will display the remaining time available for you to
                                    complete the test. When the timer reaches zero, the test will end by itself.</li>
                                <li class="my-2 text-black">Click on the question number in the Question Palette at the
                                    right of your screen to go to that numbered question directly. Note that using this
                                    option does <b>NOT</b> save your answer to the current question.</li>
                                <li class="my-2 text-black">Click on <b>Save & Next</b> to save your answer for the
                                    current question and then go to the next question.</li>
                                <li class="my-2 text-black">The Question Palette displayed on the right side of screen
                                    will show the status of each question.</li>
                            </ul>
                        </div>
                        <!-- content section end -->
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-9 col-12 start_quiz_wrap">
                        <div class="bg-dark text-white rounded-2 p-2">
                            <div class="text-center mb-3 fs-5">Quiz Starts in</div>
                            <div id="timer" class="d-flex justify-content-around">
                                <div class="d-grid text-center"><span id="days"></span>days</div>
                                <div class="d-grid text-center"><span id="hours"></span>hours</div>
                                <div class="d-grid text-center"><span id="minutes"></span>minutes</div>
                                <div class="d-grid text-center"><span id="seconds"></span>seconds</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"
        integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/0.6.7/js/min/perfect-scrollbar.jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>

    <script>
        let slug = {!! str_replace("'", "\'", json_encode($quiz['slug'])) !!};
        let now_server = {!! str_replace("'", "\'", json_encode($now)) !!};
        let schedule_type = {!! str_replace("'", "\'", json_encode($quiz_schedule->schedule_type)) !!};
        let start_date = {!! str_replace("'", "\'", json_encode($quiz_schedule->start_date)) !!};
        let start_time = {!! str_replace("'", "\'", json_encode($quiz_schedule->start_time)) !!};
        let end_date = {!! str_replace("'", "\'", json_encode($quiz_schedule->end_date)) !!};
        let end_time = {!! str_replace("'", "\'", json_encode($quiz_schedule->end_time)) !!};
        let grace_period = {!! str_replace("'", "\'", json_encode($quiz_schedule->grace_period)) !!};
        let split = end_time.split(":");
        split[1] = parseInt(split[1]) + grace_period;
        split[1] = String(split[1]).padStart(2, '0');
        end_time = split.join(':')
        var countDownDate = new Date(start_date+' '+start_time).getTime();
        var endcountDownDate = new Date(end_date+' '+end_time).getTime();
        var x = setInterval(function() {
            var now = new Date().getTime();
            var distance = countDownDate - now;
            var enddistance = endcountDownDate - now;
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);
            $("#days").text(days);
            $("#hours").text(hours);
            $("#minutes").text(minutes);
            $("#seconds").text(seconds);
            if (distance <= 0) {
                clearInterval(x);
                let tab = `<div class="text-center mb-3">Quiz Ends in</div>
                            <div id="timer" class="d-flex justify-content-around mb-4 fs-tiny">
                                <div class="d-grid text-center"><span id="days"></span>days</div>
                                <div class="d-grid text-center"><span id="hours"></span>hours</div>
                                <div class="d-grid text-center"><span id="minutes"></span>minutes</div>
                                <div class="d-grid text-center"><span id="seconds"></span>seconds</div>
                            </div>
                            <label class="cursor-pointer" id="userAgreeText" for="userAgree"><input id="userAgree" type="checkbox" class="me-2">I've read all the instructions
                                carefully and have understood them.</label>
                            <div id="startquizWrap">
                                <button class="btn-primary rounded btn w-100 my-3 not_allowed" id="startquizBtn">Start Now</button>
                            </div>`;
                const myTimeout = setTimeout(myGreeting, 1000);
                function myGreeting() {
                    $(".start_quiz_wrap").empty().append(tab);
                }
                var y = setInterval(function() {
                    var now = new Date().getTime();
                    var enddistance = endcountDownDate - now;
                    var days = Math.floor(enddistance / (1000 * 60 * 60 * 24));
                    var hours = Math.floor((enddistance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    var minutes = Math.floor((enddistance % (1000 * 60 * 60)) / (1000 * 60));
                    var seconds = Math.floor((enddistance % (1000 * 60)) / 1000);
                    $("#days").text(days);
                    $("#hours").text(hours);
                    $("#minutes").text(minutes);
                    $("#seconds").text(seconds);
                    if (enddistance <= 0) {
                        clearInterval(y);
                        clearTimeout(myTimeout);
                        let tab = `<div class="text-center bg-dark text-white rounded-2 p-4">Quiz Schedule Ended</div>`;
                        $(".start_quiz_wrap").empty().append(tab);
                    }
                }, 1000);
            }
        }, 1000);
        $(document).on('click', '#startquizBtn', function(){ 
            let userAgree = $('#userAgree').is(':checked');
            if (!userAgree){
                $("#userAgreeText").addClass("text-danger");
            }
        }); 
        $(document).on('change', '#userAgree', function(){ 
            let userAgree = $(this).is(':checked'); 
            $("#startquizWrap").empty();
            if (userAgree){
                $("#userAgreeText").removeClass('text-danger');
                $("#startquizWrap").append('<a href="/quiz/'+slug+'/init" class=""><button class="btn-primary rounded btn w-100 my-3" id="startquizBtn">Start Now</button></a>');
            } else {
                $("#startquizWrap").append('<button class="btn-primary rounded btn w-100 my-3 not_allowed" id="startquizBtn">Start Now</button>');
            }
        }); 
    </script>
</body>

</html>