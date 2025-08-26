<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$practiceSet['title']}} Analysis - Student Portal - Tutors 11 Plus</title>
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
            margin-bottom: 0
        }

        .correct_answers p {
            display: inline;
        }

        .optionMatch p {
            margin-bottom: 0 !important;
        }

        /* for practcie card */
        .practice_card {
            display: grid;
            grid-template-columns: minmax(50px, 60px) 1fr;
            grid-gap: 5px;
            transition: 0.25s;
            background: radial-gradient(#288bff, #0064db);

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

        .progress {
            height: 0.75rem;
        }

        @media (max-width: 425px) {
            .practice_results_image {
                height: 40px !important;
                width: 40px !important;
            }

        }

        @media (max-width: 320px) {
            .practice_card_name {
                font-size: 6.5vw !important;
            }
        }

        .progress_completion {
            position: absolute;
            left: 95%;
            bottom: 100%;
        }

        /* questions sol  */
        .questions_button {
            background: white !important;
            color: black !important;
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
            color: #000 !important;
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
            background: green !important;
            color: white !important;
        }

        .not_question_answered border {
            border: 1px solid #9b9b9b !important;
        }

        .wrong_question_answered {
            background: white !important;
            color: red !important;
            border: 1px solid red !important;
        }

        .wrong_question_option {
            background: red !important;
        }

        .wrong_question_option .question_items_serial {
            background-color: #fff;
            color: red !important;
        }

        .wrong_question_option .option_item {
            color: #fff !important;
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
            min-height: 180px !important;
            max-height: 180px !important;
        }

        .fs_md {
            font-size: 1.08rem !important
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

        .heading_line {
            height: 0.3rem;
            width: 100px;
            background: var(--portal-secondary);
            border-radius: 10rem;
        }


        .practice_results_container {
            height: auto;
            width: auto;
        }

        .result_card {
            height: auto;
            background: #fff;
        }

        .result_card_text {
            font-size: 1.1rem;
            line-height: 1.5;
            margin-bottom: 0 !important;
        }

        .main_contianer {
            height: auto;
        }

        .practice_card {
            height: auto;
            width: 100%;
        }

        .result_name {
            height: auto;
            width: auto;
        }

        .result_details {
            height: auto;
            width: auto;
        }

        .image_container {
            height: 350px;
            max-width: 500px;
            min-width: 290px;
        }

        .view_analytics {
            background: #004bb2 !important;
            color: #fff !important;
        }

        .quiz_image_container {
            background: #f1fff1;
        }

        .btn-back,
        .btn-start {
            background: linear-gradient(45deg, #f0a43f, #e9aa70) !important;
        }

        .results_container {
            /* background: linear-gradient( 5deg , orange , #0056f4); */
            /* background: linear-gradient( 5deg , #ffd793 , #ffd248); */
            background: #e8d52554;
        }

        .progress_chart {
            position: relative;
            width: 100%;
            height: 100%;
            text-align: center;
            font-size: 22px;
            line-height: 120px;
        }

        .pass {
            color: #0081EA;
        }

        .fail {
            color: orange;
        }

        .progress_chart canvas {
            position: absolute;
            top: 0;
            left: 50%;
            right: 50%;
            transform: translateX(-50%);
        }

        .my_progress_chart canvas {
            filter: drop-shadow(1px 2px 3px #00000040)
        }

        .pass {
            color: #0081EA;
        }

        .fail {
            color: orange;
        }

        .progress_chart canvas {
            position: absolute;
            top: 0;
            left: 50%;
            right: 50%;
            transform: translateX(-50%);
        }

        .my_progress_chart canvas {
            filter: drop-shadow(1px 2px 3px #00000040)
        }

        .main_container {
            height: auto;
            width: auto;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        #confetti-holder {
            position: fixed;
            height: 100vh;
            pointer-events: none;
            width: 100%;
            top: 0;
            left: 0;
            z-index: 2;
            text-align: center;
            vertical-align: middle;
        }

        #e0DQ82qcIov1 {
            height: 150vh;
            max-width: 1200px;
            min-height: 600px;
        }

        .result_container {
            height: 600px;
            width: 600px;
        }

        .result_image_section {
            height: auto;
            width: auto;
        }

        .congo_text {
            color: #59da59 !important;
        }

        .actions_button {
            width: 200px;
            height: 45px;
        }

        .need_practice_text {
            color: #f85e5e !important;
        }

        .good_text {
            color: #ffc107 !important;
        }
        .question_container>*:not(img) {
            width: 100% !important;
        }
    </style>
</head>

<body>
    @include('sidebar')
    @include('header')

    <!-- result container -->
    <div class="main_container">
        <div class="my-4 overflow-hidden result_container rounded-4 shadow text-center" style="background: linear-gradient(to top , #ffffffb0 ,white),url( {{url('images/result_bg_image.webp')}} ) bottom no-repeat; background-size: 110%; background-position-y: 100%;">
            <div class="result_image_section position-relative" style="background: url({{url('images/result_screen_svg.webp')}}) top no-repeat; background-size: 100%;">
                <button onclick="document.location.href = '/dashboard'" class="bg-transparent border-0 fw-semibold m-3 position-absolute start-0 text-white top-0"><i class="bx bx-arrow-back fs-5 fw-semibold"></i></button>
                <img src="{{ url('images/result_screen_image.webp') }}" class="m-1" height="auto" width="250" alt="an image of completeing session">
            </div>
            <div class="results_details position-relative p-2">
                @if(($analytics['correct_answered_questions'] / $analytics['total_questions']) * 100 < 40)
                    <h1 class="fw-bold h3 my-1  text-center text-uppercase need_practice_text">Need Practise!</h1>
                @elseif(($analytics['correct_answered_questions'] / $analytics['total_questions']) * 100 >= 80)
                    <h1 class="fw-bold h3 my-1  text-center text-uppercase congo_text">Excellent!</h1>
                @else
                    <h1 class="fw-bold h3 my-1  text-center text-uppercase good_text">Good Job!</h1>
                @endif
                <hr class="my-2 border">
                <h2 class="fs-5 mt-2 my-1 text-center text-uppercase">Here's Your Score</h2>
                <div class="align-items-center d-flex fw-bold justify-content-center my-3 my_progress_chart progress_chart" data-percent="{{ number_format(($analytics['correct_answered_questions'] / $analytics['total_questions']) * 100, 2) }}">{{ number_format(($analytics['correct_answered_questions'] / $analytics['total_questions']) * 100, 2) }} <span class="fs-6">%</span><canvas height="100" width="100"></canvas></div>
               
                <div class="text-center my-3">
                    <a class="actions_button align-items-center btn btn-warning d-inline-flex fw-medium justify-content-center m-2 p-2 px-4 rounded-pill shadow">Continue <i class="bx bx-arrow-back bx-rotate-180 fw-semibold ms-1"></i></a>
                </div>
            </div> 
        </div>
    </div>
    <div id="confetti-holder">
        <svg id="e0DQ82qcIov1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 400 400" shape-rendering="geometricPrecision" text-rendering="geometricPrecision"><g id="e0DQ82qcIov2" transform="matrix(.5 0 0 0.5 25.964331 264.154351)"><g><rect id="e0DQ82qcIov4" width="5.05" height="5.05" rx="0" ry="0" transform="matrix(.936393-.282895 0.286251 0.981448 64.977577 368.672426)" opacity="0.977955" fill="#c072ff"/><rect id="e0DQ82qcIov5" width="5.36" height="5.36" rx="0" ry="0" transform="matrix(-.52026 0.880062-.736215-.676747 48.193974 354.593138)" opacity="0.495795" fill="#c072ff"/><rect id="e0DQ82qcIov6" width="5.46" height="5.46" rx="0" ry="0" transform="matrix(.273897-.984967 0.886688 0.462368 73.798015 371.925674)" opacity="0.979768" fill="#ff648b"/><rect id="e0DQ82qcIov7" width="5.54" height="5.54" rx="0" ry="0" transform="matrix(-.594399 0.776885-.805945-.628994 30.669552 351.24617)" opacity="0.586336" fill="#ff648b"/><rect id="e0DQ82qcIov8" width="5.73" height="5.73" rx="0" ry="0" transform="matrix(.826776-.60135 0.407215 0.913332 35.887649 362.339551)" opacity="0.723288" fill="#00cfff"/><rect id="e0DQ82qcIov9" width="5.6" height="5.6" rx="0" ry="0" transform="matrix(.119809-1.015296 0.947042 0.321109 56.065517 361.261792)" opacity="0.567307" fill="#00cfff"/><rect id="e0DQ82qcIov10" width="5.07" height="5.07" rx="0" ry="0" transform="matrix(-.904592 0.476332-.271776-.96236 53.206615 363.602305)" opacity="0.713493" fill="#fbff45"/><rect id="e0DQ82qcIov11" width="4.4" height="4.4" rx="0" ry="0" transform="matrix(1.002242-.201723-.010821 0.999941 48.410803 340.641092)" opacity="0.659697" fill="#fbff45"/><rect id="e0DQ82qcIov12" width="4.79" height="4.79" rx="0" ry="0" transform="matrix(-.728809-.71695 0.834175-.5515 31.057268 346.447909)" opacity="0.842201" fill="#fbff45"/></g><rect id="e0DQ82qcIov13" width="4.31" height="4.31" rx="0" ry="0" transform="matrix(.917199-.398429 0.398429 0.917199 43.298438 368.953002)" opacity="0.673915" fill="#bdff34"/><rect id="e0DQ82qcIov14" width="4.1" height="4.1" rx="0" ry="0" transform="matrix(-.081417-.99668 0.99668-.081417 26.811226 362.919013)" opacity="0.90469" fill="#bdff34"/><rect id="e0DQ82qcIov15" width="4.19" height="4.19" rx="0" ry="0" transform="matrix(-.99218 0.124814-.335708-.96565 53.592025 335.720453)" opacity="0.38981" fill="#bdff34"/><rect id="e0DQ82qcIov16" width="5" height="5" rx="0" ry="0" transform="matrix(-.208082-.978111 0.978111-.208082 64.721271 330.656082)" opacity="0.89513" fill="#bdff34"/><rect id="e0DQ82qcIov17" width="5.49" height="5.49" rx="0" ry="0" transform="matrix(.999714 0.023909-.023909 0.999714 39.643755 341.438936)" opacity="0.729057" fill="#bdff34"/><rect id="e0DQ82qcIov18" width="5.38" height="5.38" rx="0" ry="0" transform="matrix(-.951755-.306858 0.104556-1.01698 35.098205 371.498135)" opacity="0.815943" fill="#0af"/><rect id="e0DQ82qcIov19" width="4.4" height="4.4" rx="0" ry="0" transform="matrix(.696163 0.717883-.717883 0.696163 69.474594 340.093007)" opacity="0.851205" fill="#0af"/><rect id="e0DQ82qcIov20" width="4.33" height="4.33" rx="0" ry="0" transform="matrix(.734915 0.67816-.67816 0.734915 57.020715 379.065431)" opacity="0.55536" fill="#0af"/><rect id="e0DQ82qcIov21" width="5.22" height="5.22" rx="0" ry="0" transform="matrix(-.775496-.631353 0.631353-.775496 35.902264 339.066393)" opacity="0.614565" fill="#0af"/><rect id="e0DQ82qcIov22" width="4.83" height="4.83" rx="0" ry="0" transform="matrix(.840567 0.541708-.36304 0.95571 70.962808 331.267633)" opacity="0.766126" fill="#fdb168"/><rect id="e0DQ82qcIov23" width="4.2" height="4.2" rx="0" ry="0" transform="matrix(-.852823-.522201 0.522201-.852823 81.806291 363.566238)" opacity="0.559862" fill="#fdb168"/><rect id="e0DQ82qcIov24" width="4.54" height="4.54" rx="0" ry="0" transform="matrix(.598884 0.800836-.800836 0.598884 80.494029 335.455588)" opacity="0.950555" fill="#fdb168"/><rect id="e0DQ82qcIov25" width="5.74" height="5.74" rx="0" ry="0" transform="matrix(.999985-.00541 0.00541 0.999985 39.928055 326.929249)" opacity="0.677693" fill="#fdb168"/><path id="e0DQ82qcIov26" d="M65.36,380.69l-1,.55-.54-1c-.291171-.535898-.846123-.875751-1.455811-.891538s-1.181484.294889-1.5.815-.33536,1.17064-.044189,1.706538l2.18,4l4-2.18c.828427-.452874,1.132873-1.491573.68-2.32s-1.491573-1.132873-2.32-.68Z" transform="matrix(.913672-.406453 0.406453 0.913672-169.96593 59.145085)" fill="#ff648b"/><path id="e0DQ82qcIov27" d="M73.25,326l-1,.48-.48-1c-.403168-.828427-1.401573-1.173168-2.23-.77s-1.173168,1.401573-.77,2.23l1.95,4l4-1.95c.535898-.260804.891952-.787695.934038-1.382199s-.236188-1.1663-.73-1.5-1.12814-.378605-1.664038-.117801Z" transform="translate(-20.000595 0.001253)" fill="#ffa4bb"/><path id="e0DQ82qcIov28" d="M59.79,359.68l-1.09.91-.92-1.09c-.474847-.63703-1.263543-.958542-2.048422-.835037s-1.436723.671692-1.692987,1.423766-.07476,1.584221.471409,2.161271l3.66,4.36L62.53,363c.902986-.75663,1.02163-2.102014.265-3.005s-2.102014-1.02163-3.005-.265Z" transform="translate(-19.99905 0.000039)" fill="#e0b9ff"/><polygon id="e0DQ82qcIov29" points="84.7,374.79 82.18,375.73 82.97,373.16 81.3,371.05 83.99,371 85.48,368.76 86.36,371.31 88.95,372.03 86.8,373.65 86.91,376.34 84.7,374.79" transform="translate(-20.000002 0.000003)" fill="#fdb168"/><polygon id="e0DQ82qcIov30" points="86.87,345.57 84.55,347.61 84.34,344.52 81.69,342.95 84.55,341.8 85.23,338.79 87.21,341.16 90.28,340.88 88.64,343.49 89.86,346.32 86.87,345.57" transform="translate(-20.000001-.000003)" fill="#fed3aa"/><polygon id="e0DQ82qcIov31" points="52.58,342.08 50.64,344.06 50.25,341.32 47.78,340.09 50.26,338.87 50.67,336.14 52.59,338.12 55.32,337.66 54.02,340.11 55.3,342.56 52.58,342.08" transform="translate(-20 0.000006)" fill="#fed3aa"/><circle id="e0DQ82qcIov32" r="2.84" transform="matrix(1 0 0.212557 1 21.079994 358.87)" fill="#00cfff"/><circle id="e0DQ82qcIov33" r="3.37" transform="matrix(1 0 0.212557 1 81.819993 336.5)" fill="#00cfff"/></g><g id="e0DQ82qcIov34" transform="matrix(.5 0 0 0.5 169.566513 264.155382)"><g><rect id="e0DQ82qcIov36" width="5.33" height="5.33" rx="0" ry="0" transform="matrix(-.259082-.988968 0.998906-.046758 337.859707 326.538286)" opacity="0.494701" fill="#c072ff"/><rect id="e0DQ82qcIov37" width="5.36" height="5.36" rx="0" ry="0" transform="matrix(-.52026 0.880062-.736215-.676747 335.40214 354.604187)" opacity="0.495795" fill="#c072ff"/><rect id="e0DQ82qcIov38" width="5.54" height="5.54" rx="0" ry="0" transform="matrix(-.594399 0.776885-.805945-.628994 317.848305 351.239972)" opacity="0.586336" fill="#ff648b"/><rect id="e0DQ82qcIov39" width="5.6" height="5.6" rx="0" ry="0" transform="matrix(.105301-.972508 1.015296 0.119809 343.104343 361.714571)" opacity="0.567307" fill="#00cfff"/><rect id="e0DQ82qcIov40" width="4.4" height="4.4" rx="0" ry="0" transform="matrix(.957064-.202212 0.201723 1.002242 335.225782 340.62479)" opacity="0.659697" fill="#fbff45"/></g><rect id="e0DQ82qcIov41" width="4.31" height="4.31" rx="0" ry="0" transform="matrix(.917199-.398429 0.398429 0.917199 330.488863 368.958161)" opacity="0.673915" fill="#bdff34"/><rect id="e0DQ82qcIov42" width="4.19" height="4.19" rx="0" ry="0" transform="matrix(-.99218 0.124814-.124814-.99218 340.346061 335.782621)" opacity="0.38981" fill="#bdff34"/><rect id="e0DQ82qcIov43" width="4.4" height="4.4" rx="0" ry="0" transform="matrix(.696163 0.717883-.569909 0.848753 356.330011 339.76603)" opacity="0.851205" fill="#0af"/><rect id="e0DQ82qcIov44" width="4.33" height="4.33" rx="0" ry="0" transform="matrix(.734915 0.67816-.67816 0.734915 344.231055 379.046296)" opacity="0.55536" fill="#0af"/><rect id="e0DQ82qcIov45" width="5.22" height="5.22" rx="0" ry="0" transform="matrix(-.775496-.631353 0.466516-.909694 323.53011 339.412127)" opacity="0.614565" fill="#0af"/><rect id="e0DQ82qcIov46" width="5.16" height="5.16" rx="0" ry="0" transform="matrix(-.587644-.80912 0.80912-.587644 368.660951 351.715923)" opacity="0.561724" fill="#fdb168"/><rect id="e0DQ82qcIov47" width="4.83" height="4.83" rx="0" ry="0" transform="matrix(.840567 0.541708-.541708 0.840567 358.58508 331.55421)" opacity="0.766126" fill="#fdb168"/><rect id="e0DQ82qcIov48" width="4.2" height="4.2" rx="0" ry="0" transform="matrix(-.852823-.522201 0.340928-.96382 369.386316 363.793275)" opacity="0.559862" fill="#fdb168"/><rect id="e0DQ82qcIov49" width="4.54" height="4.54" rx="0" ry="0" transform="matrix(.598884 0.800836-.673539 0.769107 367.404518 335.079243)" opacity="0.950555" fill="#fdb168"/><rect id="e0DQ82qcIov50" width="5.74" height="3" rx="0" ry="0" transform="matrix(.915917 0.401368-.401368 0.915917 328.522583 325.989372)" opacity="0.677693" fill="#fdb168"/><path id="e0DQ82qcIov51" d="M312.56,380.69l-1,.55-.55-1c-.291171-.535898-.846123-.875751-1.455811-.891538s-1.181484.294889-1.5.815-.33536,1.17064-.044189,1.706538l2.18,4l4-2.18c.828427-.452873,1.132873-1.491573.68-2.32s-1.491573-1.132873-2.32-.68Z" transform="translate(19.999862-.000002)" fill="#ffa4bb"/><path id="e0DQ82qcIov52" d="M320.45,326l-1,.48-.49-1c-.403168-.828427-1.401573-1.173168-2.23-.77s-1.173168,1.401573-.77,2.23l1.94,4l4-1.95c.828427-.400406,1.175406-1.396573.775-2.225s-1.396573-1.175406-2.225-.775Z" transform="translate(20.00151-.00183)" fill="#ff648b"/><path id="e0DQ82qcIov53" d="M307,359.68l-1.1.91-.9-1.09c-.77893-.822972-2.06436-.896096-2.931595-.16677s-1.015618,2.008256-.338405,2.91677l3.65,4.36l4.37-3.66c.902986-.75663,1.02163-2.102014.265-3.005s-2.102014-1.02163-3.005-.265Z" transform="translate(19.998733 0.000008)" fill="#c072ff"/><polygon id="e0DQ82qcIov54" points="331.9,374.79 329.38,375.73 330.17,373.16 328.49,371.05 331.19,371 332.68,368.76 333.55,371.31 336.15,372.03 333.99,373.65 334.11,376.34 331.9,374.79" transform="matrix(.962685-.270623 0.270623 0.962685-68.420318 103.835142)" fill="#fdb168"/><polygon id="e0DQ82qcIov55" points="334.06,345.57 331.74,347.61 331.54,344.52 328.88,342.95 331.75,341.8 332.43,338.79 334.41,341.16 337.48,340.88 335.84,343.49 337.06,346.32 334.06,345.57" transform="matrix(.772735 0.634728-.634728 0.772735 313.558859-133.481571)" fill="#fed3aa"/><polygon id="e0DQ82qcIov56" points="319.78,342.08 317.84,344.06 317.45,341.32 314.98,340.09 317.46,338.87 317.87,336.14 319.79,338.12 322.52,337.66 321.22,340.11 322.5,342.56 319.78,342.08" transform="translate(0 0.000006)" fill="#cfff6b"/><circle id="e0DQ82qcIov57" r="2.51" transform="translate(350.29 359.83)" fill="#0af"/><circle id="e0DQ82qcIov58" r="3.37" transform="translate(369.01 336.5)" fill="#00cfff"/></g><path id="e0DQ82qcIov74" d="M102.82,10c0,2-2,2-2,4s2,2,2,4-2,2-2,4s2,2,2,4-2,2-2,4s2,2,2,4-2,2-2,4s2,2,2,4-2,2-2,4s2,2,2,4-2,2-2,4" transform="matrix(1.993734 0.158196-.158196 1.993734-117.819725 332.826905)" fill="none" stroke="#ff648b" stroke-linecap="round" stroke-miterlimit="10" stroke-dashoffset="153.37" stroke-dasharray="16,85.68"/><path id="e0DQ82qcIov75" d="M89.77,10c0,2-2,2-2,4s2,2,2,4-2,2-2,4s2,2,2,4-2,2-2,4s2,2,2,4-2,2-2,4s2,2,2,4-2,2-2,4s2,2,2,4-2,2-2,4" transform="matrix(1.993734 0.158196-.158196 1.993734-181.43862 318.626535)" fill="none" stroke="#00cfff" stroke-linecap="round" stroke-miterlimit="10" stroke-dashoffset="153.37" stroke-dasharray="16,85.68"/><path id="e0DQ82qcIov76" d="M96.3,10c0,2-2,2-2,4s2,2,2,4-2,2-2,4s2,2,2,4-2,2-2,4s2,2,2,4-2,2-2,4s2,2,2,4-2,2-2,4s2,2,2,4-2,2-2,4" transform="matrix(1.987757-.220959 0.220959 1.987757 190.754493 289.449147)" fill="none" stroke="#fbff45" stroke-linecap="round" stroke-miterlimit="10" stroke-dashoffset="153.37" stroke-dasharray="16,85.68"/><path id="e0DQ82qcIov77" d="M109.34,10c0,2-2,2-2,4s2,2,2,4-2,2-2,4s2,2,2,4-2,2-2,4s2,2,2,4-2,2-2,4s2,2,2,4-2,2-2,4s2,2,2,4-2,2-2,4" transform="matrix(1.987757-.220959 0.220959 1.987757 117.393384 310.099187)" fill="none" stroke="#0af" stroke-linecap="round" stroke-miterlimit="10" stroke-dashoffset="153.37" stroke-dasharray="16,85.68"/>
            <script><![CDATA[
            (function(s,i,u,o,c,w,d,t,n,x,e,p,a,b){(a=document.getElementById(i.root)).svgatorPlayer={ready:(function(a){b=[];return function(c){return c?(b.push(c),a.svgatorPlayer):b}})(a)};w[o]=w[o]||{};w[o][s]=w[o][s]||[];w[o][s].push(i);e=d.createElementNS(n,t);e.async=true;e.setAttributeNS(x,'href',[u,s,'.','j','s','?','v','=',c].join(''));e.setAttributeNS(null,'src',[u,s,'.','j','s','?','v','=',c].join(''));p=d.getElementsByTagName(t)[0];p.parentNode.insertBefore(e,p);})('91c80d77',{"root":"e0DQ82qcIov1","version":"2022-05-04","animations":[{"elements":{"e0DQ82qcIov2":{"transform":{"data":{"t":{"x":-51.928662,"y":-353.428619}},"keys":{"o":[{"t":200,"v":{"x":51.928662,"y":440.868661,"type":"corner"},"e":[0,0,0.58,1]},{"t":600,"v":{"x":120.290877,"y":0.059958,"type":"corner"},"e":[0.42,0,1,1]},{"t":1880,"v":{"x":172.503841,"y":132.490147,"type":"corner"}},{"t":3200,"v":{"x":290.290877,"y":432.441375,"type":"corner"}}],"s":[{"t":200,"v":{"x":0.5,"y":0.5},"e":[0,0,0.58,1]},{"t":600,"v":{"x":1,"y":1}}]}}},"e0DQ82qcIov4":{"transform":{"data":{"k":{"x":12,"y":-12},"t":{"x":-2.525,"y":-2.525}},"keys":{"o":[{"t":0,"v":{"x":68.064753,"y":370.436272,"type":"corner"},"e":[0.42,0,0.58,1]},{"t":600,"v":{"x":138.217652,"y":366.183102,"type":"corner"},"e":[0.42,0,1,1]},{"t":3000,"v":{"x":62.969741,"y":597.053495,"type":"corner"}}],"r":[{"t":0,"v":-4.25997,"e":[0.42,0,0.58,1]},{"t":600,"v":3.089446},{"t":3000,"v":715.74003}],"s":[{"t":0,"v":{"x":1,"y":1},"e":[0.42,0,0.58,1]},{"t":500,"v":{"x":1,"y":-1},"e":[0.42,0,0.58,1]},{"t":1000,"v":{"x":1,"y":1},"e":[0.42,0,0.58,1]},{"t":1500,"v":{"x":-1,"y":1},"e":[0.42,0,0.58,1]},{"t":2000,"v":{"x":1,"y":1},"e":[0.42,0,0.58,1]},{"t":2500,"v":{"x":1,"y":-1},"e":[0.42,0,0.58,1]},{"t":3000,"v":{"x":1,"y":1}}]}}},"e0DQ82qcIov5":{"transform":{"data":{"k":{"x":0,"y":-12},"t":{"x":-2.68,"y":-2.68}},"keys":{"o":[{"t":0,"v":{"x":44.82662,"y":355.138022,"type":"corner"},"e":[0.42,0,0.58,1]},{"t":600,"v":{"x":59.1463,"y":304.670723,"type":"corner"},"e":[0.42,0,1,1]},{"t":3000,"v":{"x":-73.608537,"y":494.439665,"type":"corner"}}],"r":[{"t":0,"v":132.589988,"e":[0.42,0,0.58,1]},{"t":600,"v":139.939404},{"t":3000,"v":852.589988}],"s":[{"t":0,"v":{"x":1,"y":1},"e":[0.42,0,0.58,1]},{"t":500,"v":{"x":1,"y":-1},"e":[0.42,0,0.58,1]},{"t":1000,"v":{"x":1,"y":1},"e":[0.42,0,0.58,1]},{"t":1500,"v":{"x":-1,"y":1},"e":[0.42,0,0.58,1]},{"t":2000,"v":{"x":1,"y":1},"e":[0.42,0,0.58,1]},{"t":2500,"v":{"x":1,"y":-1},"e":[0.42,0,0.58,1]},{"t":3000,"v":{"x":1,"y":1}}]}}},"e0DQ82qcIov6":{"transform":{"data":{"k":{"x":0,"y":-12},"t":{"x":-2.73,"y":-2.73}},"keys":{"o":[{"t":0,"v":{"x":76.966411,"y":370.498978,"type":"corner"},"e":[0.42,0,0.58,1]},{"t":600,"v":{"x":155.616925,"y":356.566181,"type":"corner"},"e":[0.42,0,1,1]},{"t":3000,"v":{"x":93.036148,"y":575.583428,"type":"corner"}}],"r":[{"t":0,"v":-62.459981,"e":[0.42,0,0.58,1]},{"t":600,"v":-55.110565},{"t":3000,"v":657.540019}],"s":[{"t":0,"v":{"x":1,"y":1},"e":[0.42,0,0.58,1]},{"t":500,"v":{"x":1,"y":-1},"e":[0.42,0,0.58,1]},{"t":1000,"v":{"x":1,"y":1},"e":[0.42,0,0.58,1]},{"t":1500,"v":{"x":-1,"y":1},"e":[0.42,0,0.58,1]},{"t":2000,"v":{"x":1,"y":1},"e":[0.42,0,0.58,1]},{"t":2500,"v":{"x":1,"y":-1},"e":[0.42,0,0.58,1]},{"t":3000,"v":{"x":1,"y":1}}]}}},"e0DQ82qcIov7":{"transform":{"data":{"k":{"x":12,"y":-12},"t":{"x":-2.77,"y":-2.77}},"keys":{"o":[{"t":0,"v":{"x":26.7906,"y":351.65583,"type":"corner"},"e":[0.42,0,0.58,1]},{"t":600,"v":{"x":-2.272941,"y":293.411173,"type":"corner"},"e":[0.42,0,1,1]},{"t":3000,"v":{"x":-163.981636,"y":470.444934,"type":"corner"}}],"r":[{"t":0,"v":139.969992,"e":[0.42,0,0.58,1]},{"t":600,"v":147.319408},{"t":3000,"v":859.969992}],"s":[{"t":0,"v":{"x":1,"y":1},"e":[0.42,0,0.58,1]},{"t":500,"v":{"x":1,"y":-1},"e":[0.42,0,0.58,1]},{"t":1000,"v":{"x":1,"y":1},"e":[0.42,0,0.58,1]},{"t":1500,"v":{"x":-1,"y":1},"e":[0.42,0,0.58,1]},{"t":2000,"v":{"x":1,"y":1},"e":[0.42,0,0.58,1]},{"t":2500,"v":{"x":1,"y":-1},"e":[0.42,0,0.58,1]},{"t":3000,"v":{"x":1,"y":1}}]}}},"e0DQ82qcIov8":{"transform":{"data":{"k":{"x":0,"y":-12},"t":{"x":-2.865,"y":-2.865}},"keys":{"o":[{"t":0,"v":{"x":39.423034,"y":363.233381,"type":"corner"},"e":[0.42,0,0.58,1]},{"t":600,"v":{"x":36.500064,"y":344.648626,"type":"corner"},"e":[0.42,0,1,1]},{"t":3000,"v":{"x":-112.122565,"y":559.021139,"type":"corner"}}],"r":[{"t":0,"v":-24.030013,"e":[0.42,0,0.58,1]},{"t":600,"v":-16.680597},{"t":3000,"v":695.969987}],"s":[{"t":0,"v":{"x":1,"y":1},"e":[0.42,0,0.58,1]},{"t":500,"v":{"x":1,"y":-1},"e":[0.42,0,0.58,1]},{"t":1000,"v":{"x":1,"y":1},"e":[0.42,0,0.58,1]},{"t":1500,"v":{"x":-1,"y":1},"e":[0.42,0,0.58,1]},{"t":2000,"v":{"x":1,"y":1},"e":[0.42,0,0.58,1]},{"t":2500,"v":{"x":1,"y":-1},"e":[0.42,0,0.58,1]},{"t":3000,"v":{"x":1,"y":1}}]}}},"e0DQ82qcIov9":{"transform":{"data":{"k":{"x":0,"y":-12},"t":{"x":-2.8,"y":-2.8}},"keys":{"o":[{"t":0,"v":{"x":59.052701,"y":359.318068,"type":"corner"},"e":[0.42,0,0.58,1]},{"t":600,"v":{"x":-10.947299,"y":310.72201,"type":"corner"},"e":[0.42,0,1,1]},{"t":3000,"v":{"x":-178.694775,"y":502.764104,"type":"corner"}}],"r":[{"t":0,"v":-71.26999,"e":[0.42,0,0.58,1]},{"t":600,"v":-63.920574},{"t":3000,"v":648.73001}],"s":[{"t":0,"v":{"x":1,"y":1},"e":[0.42,0,0.58,1]},{"t":500,"v":{"x":1,"y":-1},"e":[0.42,0,0.58,1]},{"t":1000,"v":{"x":1,"y":1},"e":[0.42,0,0.58,1]},{"t":1500,"v":{"x":-1,"y":1},"e":[0.42,0,0.58,1]},{"t":2000,"v":{"x":1,"y":1},"e":[0.42,0,0.58,1]},{"t":2500,"v":{"x":1,"y":-1},"e":[0.42,0,0.58,1]},{"t":3000,"v":{"x":1,"y":1}}]}}},"e0DQ82qcIov10":{"transform":{"data":{"k":{"x":0,"y":-12},"t":{"x":-2.535,"y":-2.535}},"keys":{"o":[{"t":0,"v":{"x":50.224523,"y":362.370224,"type":"corner"},"e":[0.42,0,0.58,1]},{"t":600,"v":{"x":67.315377,"y":339.995252,"type":"corner"},"e":[0.42,0,1,1]},{"t":3000,"v":{"x":-59.443231,"y":551.12236,"type":"corner"}}],"r":[{"t":0,"v":164.230015,"e":[0.42,0,0.58,1]},{"t":600,"v":171.579431},{"t":3000,"v":884.230015}],"s":[{"t":0,"v":{"x":0.999999,"y":0.999999},"e":[0.42,0,0.58,1]},{"t":500,"v":{"x":0.999999,"y":-1},"e":[0.42,0,0.58,1]},{"t":1000,"v":{"x":0.999999,"y":1},"e":[0.42,0,0.58,1]},{"t":1500,"v":{"x":-1,"y":1},"e":[0.42,0,0.58,1]},{"t":2000,"v":{"x":1,"y":1},"e":[0.42,0,0.58,1]},{"t":2500,"v":{"x":1,"y":-1},"e":[0.42,0,0.58,1]},{"t":3000,"v":{"x":1,"y":1}}]}}},"e0DQ82qcIov11":{"transform":{"data":{"k":{"x":0,"y":-12},"t":{"x":-2.2,"y":-2.2}},"keys":{"o":[{"t":0,"v":{"x":50.591928,"y":342.397172,"type":"corner"},"e":[0.42,0,0.58,1]},{"t":600,"v":{"x":70.805055,"y":272.948791,"type":"corner"},"e":[0.42,0,1,1]},{"t":3000,"v":{"x":-53.301182,"y":445.3462,"type":"corner"}}],"r":[{"t":0,"v":0.62001,"e":[0.42,0,0.58,1]},{"t":600,"v":7.969426},{"t":3000,"v":720.62001}],"s":[{"t":0,"v":{"x":1,"y":1},"e":[0.42,0,0.58,1]},{"t":500,"v":{"x":1,"y":-1},"e":[0.42,0,0.58,1]},{"t":1000,"v":{"x":1,"y":1},"e":[0.42,0,0.58,1]},{"t":1500,"v":{"x":-1,"y":1},"e":[0.42,0,0.58,1]},{"t":2000,"v":{"x":1,"y":1},"e":[0.42,0,0.58,1]},{"t":2500,"v":{"x":1,"y":-1},"e":[0.42,0,0.58,1]},{"t":3000,"v":{"x":1,"y":1}}]}}},"e0DQ82qcIov12":{"transform":{"data":{"k":{"x":0,"y":-12},"t":{"x":-2.395,"y":-2.395}},"keys":{"o":[{"t":0,"v":{"x":31.309619,"y":343.409971,"type":"corner"},"e":[0.42,0,0.58,1]},{"t":600,"v":{"x":10.075504,"y":277.1748,"type":"corner"},"e":[0.42,0,1,1]},{"t":3000,"v":{"x":-150.760432,"y":425.001715,"type":"corner"}}],"r":[{"t":0,"v":236.530023,"e":[0.42,0,0.58,1]},{"t":600,"v":243.879439},{"t":3000,"v":956.530023}],"s":[{"t":0,"v":{"x":1,"y":1},"e":[0.42,0,0.58,1]},{"t":500,"v":{"x":1,"y":-1},"e":[0.42,0,0.58,1]},{"t":1000,"v":{"x":1,"y":1},"e":[0.42,0,0.58,1]},{"t":1500,"v":{"x":-1,"y":1},"e":[0.42,0,0.58,1]},{"t":2000,"v":{"x":1,"y":1},"e":[0.42,0,0.58,1]},{"t":2500,"v":{"x":1,"y":-1},"e":[0.42,0,0.58,1]},{"t":3000,"v":{"x":1,"y":1}}]}}},"e0DQ82qcIov13":{"transform":{"data":{"r":-23.480008,"t":{"x":-2.155,"y":-2.155}},"keys":{"o":[{"t":0,"v":{"x":46.133617,"y":370.070952,"type":"corner"},"e":[0.42,0,0.58,1]},{"t":600,"v":{"x":23.496828,"y":362.012633,"type":"corner"},"e":[0.42,0,1,1]},{"t":3000,"v":{"x":-66.196782,"y":589.990632,"type":"corner"}}]}}},"e0DQ82qcIov14":{"transform":{"data":{"r":265.32998,"t":{"x":-2.05,"y":-2.05}},"keys":{"o":[{"t":0,"v":{"x":28.687515,"y":360.708914,"type":"corner"},"e":[0.42,0,0.58,1]},{"t":600,"v":{"x":-38.480575,"y":329.213846,"type":"corner"},"e":[0.42,0,1,1]},{"t":3000,"v":{"x":-157.079058,"y":544.79685,"type":"corner"}}],"s":[{"t":600,"v":{"x":1,"y":1},"e":[0.645,0.045,0.355,1]},{"t":800,"v":{"x":0,"y":0},"e":[0.645,0.045,0.355,1]},{"t":1000,"v":{"x":1,"y":1},"e":[0.645,0.045,0.355,1]},{"t":1200,"v":{"x":0,"y":0},"e":[0.645,0.045,0.355,1]},{"t":1400,"v":{"x":1,"y":1},"e":[0.645,0.045,0.355,1]},{"t":1600,"v":{"x":0,"y":0},"e":[0.645,0.045,0.355,1]},{"t":1800,"v":{"x":1,"y":1},"e":[0.645,0.045,0.355,1]},{"t":2000,"v":{"x":0,"y":0},"e":[0.645,0.045,0.355,1]},{"t":2200,"v":{"x":1,"y":1},"e":[0.645,0.045,0.355,1]},{"t":2400,"v":{"x":0,"y":0},"e":[0.645,0.045,0.355,1]},{"t":2600,"v":{"x":1,"y":1},"e":[0.645,0.045,0.355,1]},{"t":2800,"v":{"x":0,"y":0},"e":[0.645,0.045,0.355,1]},{"t":3000,"v":{"x":1,"y":1}}]}}},"e0DQ82qcIov15":{"transform":{"data":{"r":172.829984,"k":{"x":12,"y":0},"t":{"x":-2.095,"y":-2.095}},"keys":{"o":[{"t":0,"v":{"x":50.810098,"y":333.958901,"type":"corner"},"e":[0.42,0,0.58,1]},{"t":600,"v":{"x":34.042574,"y":225.979204,"type":"corner"},"e":[0.42,0,1,1]},{"t":3000,"v":{"x":-39.880905,"y":368.085033,"type":"corner"}}]}}},"e0DQ82qcIov16":{"transform":{"data":{"r":257.990019,"t":{"x":-2.5,"y":-2.5}},"keys":{"o":[{"t":0,"v":{"x":66.646344,"y":327.690598,"type":"corner"},"e":[0.42,0,0.58,1]},{"t":600,"v":{"x":85.54472,"y":215.365754,"type":"corner"},"e":[0.42,0,1,1]},{"t":3000,"v":{"x":25.149435,"y":337.898437,"type":"corner"}}],"s":[{"t":600,"v":{"x":1,"y":1},"e":[0.645,0.045,0.355,1]},{"t":800,"v":{"x":0,"y":0},"e":[0.645,0.045,0.355,1]},{"t":1000,"v":{"x":1,"y":1},"e":[0.645,0.045,0.355,1]},{"t":1200,"v":{"x":0,"y":0},"e":[0.645,0.045,0.355,1]},{"t":1400,"v":{"x":1,"y":1},"e":[0.645,0.045,0.355,1]},{"t":1600,"v":{"x":0,"y":0},"e":[0.645,0.045,0.355,1]},{"t":1800,"v":{"x":1,"y":1},"e":[0.645,0.045,0.355,1]},{"t":2000,"v":{"x":0,"y":0},"e":[0.645,0.045,0.355,1]},{"t":2200,"v":{"x":1,"y":1},"e":[0.645,0.045,0.355,1]},{"t":2400,"v":{"x":0,"y":0},"e":[0.645,0.045,0.355,1]},{"t":2600,"v":{"x":1,"y":1},"e":[0.645,0.045,0.355,1]},{"t":2800,"v":{"x":0,"y":0},"e":[0.645,0.045,0.355,1]},{"t":3000,"v":{"x":1,"y":1}}]}}},"e0DQ82qcIov17":{"transform":{"data":{"r":1.370016,"t":{"x":-2.745,"y":-2.745}},"keys":{"o":[{"t":0,"v":{"x":42.32234,"y":344.248782,"type":"corner"},"e":[0.42,0,0.58,1]},{"t":600,"v":{"x":4.991094,"y":282.082718,"type":"corner"},"e":[0.42,0,1,1]},{"t":3000,"v":{"x":-97.714501,"y":439.325802,"type":"corner"}}],"s":[{"t":600,"v":{"x":1,"y":1},"e":[0.645,0.045,0.355,1]},{"t":800,"v":{"x":0,"y":0},"e":[0.645,0.045,0.355,1]},{"t":1000,"v":{"x":1,"y":1},"e":[0.645,0.045,0.355,1]},{"t":1200,"v":{"x":0,"y":0},"e":[0.645,0.045,0.355,1]},{"t":1400,"v":{"x":1,"y":1},"e":[0.645,0.045,0.355,1]},{"t":1600,"v":{"x":0,"y":0},"e":[0.645,0.045,0.355,1]},{"t":1800,"v":{"x":1,"y":1},"e":[0.645,0.045,0.355,1]},{"t":2000,"v":{"x":0,"y":0},"e":[0.645,0.045,0.355,1]},{"t":2200,"v":{"x":1,"y":1},"e":[0.645,0.045,0.355,1]},{"t":2400,"v":{"x":0,"y":0},"e":[0.645,0.045,0.355,1]},{"t":2600,"v":{"x":1,"y":1},"e":[0.645,0.045,0.355,1]},{"t":2800,"v":{"x":0,"y":0},"e":[0.645,0.045,0.355,1]},{"t":3000,"v":{"x":1,"y":1}}]}}},"e0DQ82qcIov18":{"transform":{"data":{"r":197.869986,"k":{"x":12,"y":0},"t":{"x":-2.69,"y":-2.69}},"keys":{"o":[{"t":0,"v":{"x":32.81924,"y":367.937011,"type":"corner"},"e":[0.42,0,0.58,1]},{"t":600,"v":{"x":-26.123954,"y":350.393784,"type":"corner"},"e":[0.42,0,1,1]},{"t":3000,"v":{"x":-143.266235,"y":567.352506,"type":"corner"}}],"s":[{"t":600,"v":{"x":1,"y":1},"e":[0.645,0.045,0.355,1]},{"t":800,"v":{"x":0,"y":0},"e":[0.645,0.045,0.355,1]},{"t":1000,"v":{"x":1,"y":1},"e":[0.645,0.045,0.355,1]},{"t":1200,"v":{"x":0,"y":0},"e":[0.645,0.045,0.355,1]},{"t":1400,"v":{"x":1,"y":1},"e":[0.645,0.045,0.355,1]},{"t":1600,"v":{"x":0,"y":0},"e":[0.645,0.045,0.355,1]},{"t":1800,"v":{"x":1,"y":1},"e":[0.645,0.045,0.355,1]},{"t":2000,"v":{"x":0,"y":0},"e":[0.645,0.045,0.355,1]},{"t":2200,"v":{"x":1,"y":1},"e":[0.645,0.045,0.355,1]},{"t":2400,"v":{"x":0,"y":0},"e":[0.645,0.045,0.355,1]},{"t":2600,"v":{"x":1,"y":1},"e":[0.645,0.045,0.355,1]},{"t":2800,"v":{"x":0,"y":0},"e":[0.645,0.045,0.355,1]},{"t":3000,"v":{"x":1,"y":1}}]}}},"e0DQ82qcIov19":{"transform":{"data":{"r":45.880004,"s":{"x":0.999999,"y":0.999999},"t":{"x":-2.2,"y":-2.2}},"keys":{"o":[{"t":0,"v":{"x":69.42681,"y":343.203907,"type":"corner"},"e":[0.42,0,0.58,1]},{"t":600,"v":{"x":102.53224,"y":268.644497,"type":"corner"},"e":[0.42,0,1,1]},{"t":3000,"v":{"x":69.576063,"y":432.418181,"type":"corner"}}]}}},"e0DQ82qcIov20":{"transform":{"data":{"r":42.699998,"s":{"x":1.000001,"y":1.000001},"t":{"x":-2.165,"y":-2.165}},"keys":{"o":[{"t":0,"v":{"x":57.14359,"y":382.12474,"type":"corner"},"e":[0.42,0,0.58,1]},{"t":600,"v":{"x":52.363073,"y":377.223158,"type":"corner"},"e":[0.42,0,1,1]},{"t":3000,"v":{"x":-18.856827,"y":649.588199,"type":"corner"}}]}}},"e0DQ82qcIov21":{"transform":{"data":{"r":219.15,"t":{"x":-2.61,"y":-2.61}},"keys":{"o":[{"t":0,"v":{"x":35.526051,"y":335.394518,"type":"corner"},"e":[0.42,0,0.58,1]},{"t":600,"v":{"x":-20.675301,"y":231.001058,"type":"corner"},"e":[0.42,0,1,1]},{"t":3000,"v":{"x":-135.418854,"y":375.028305,"type":"corner"}}]}}},"e0DQ82qcIov22":{"transform":{"data":{"r":32.799978,"k":{"x":12,"y":0},"t":{"x":-2.415,"y":-2.415}},"keys":{"o":[{"t":0,"v":{"x":72.116036,"y":334.883898,"type":"corner"},"e":[0.42,0,0.58,1]},{"t":600,"v":{"x":107.372441,"y":221.01296,"type":"corner"},"e":[0.42,0,1,1]},{"t":3000,"v":{"x":76.814992,"y":361.197371,"type":"corner"}}],"s":[{"t":600,"v":{"x":1,"y":1},"e":[0.645,0.045,0.355,1]},{"t":800,"v":{"x":0,"y":0},"e":[0.645,0.045,0.355,1]},{"t":1000,"v":{"x":1,"y":1},"e":[0.645,0.045,0.355,1]},{"t":1200,"v":{"x":0,"y":0},"e":[0.645,0.045,0.355,1]},{"t":1400,"v":{"x":1,"y":1},"e":[0.645,0.045,0.355,1]},{"t":1600,"v":{"x":0,"y":0},"e":[0.645,0.045,0.355,1]},{"t":1800,"v":{"x":1,"y":1},"e":[0.645,0.045,0.355,1]},{"t":2000,"v":{"x":0,"y":0},"e":[0.645,0.045,0.355,1]},{"t":2200,"v":{"x":1,"y":1},"e":[0.645,0.045,0.355,1]},{"t":2400,"v":{"x":0,"y":0},"e":[0.645,0.045,0.355,1]},{"t":2600,"v":{"x":1,"y":1},"e":[0.645,0.045,0.355,1]},{"t":2800,"v":{"x":0,"y":0},"e":[0.645,0.045,0.355,1]},{"t":3000,"v":{"x":1,"y":1}}]}}},"e0DQ82qcIov23":{"transform":{"data":{"r":211.47999,"t":{"x":-2.1,"y":-2.1}},"keys":{"o":[{"t":0,"v":{"x":81.111985,"y":360.678689,"type":"corner"},"e":[0.42,0,0.58,1]},{"t":600,"v":{"x":124.737201,"y":325.050741,"type":"corner"},"e":[0.42,0,1,1]},{"t":3000,"v":{"x":107.54102,"y":522.863102,"type":"corner"}}],"s":[{"t":600,"v":{"x":1,"y":1},"e":[0.645,0.045,0.355,1]},{"t":800,"v":{"x":0,"y":0},"e":[0.645,0.045,0.355,1]},{"t":1000,"v":{"x":1,"y":1},"e":[0.645,0.045,0.355,1]},{"t":1200,"v":{"x":0,"y":0},"e":[0.645,0.045,0.355,1]},{"t":1400,"v":{"x":1,"y":1},"e":[0.645,0.045,0.355,1]},{"t":1600,"v":{"x":0,"y":0},"e":[0.645,0.045,0.355,1]},{"t":1800,"v":{"x":1,"y":1},"e":[0.645,0.045,0.355,1]},{"t":2000,"v":{"x":0,"y":0},"e":[0.645,0.045,0.355,1]},{"t":2200,"v":{"x":1,"y":1},"e":[0.645,0.045,0.355,1]},{"t":2400,"v":{"x":0,"y":0},"e":[0.645,0.045,0.355,1]},{"t":2600,"v":{"x":1,"y":1},"e":[0.645,0.045,0.355,1]},{"t":2800,"v":{"x":0,"y":0},"e":[0.645,0.045,0.355,1]},{"t":3000,"v":{"x":1,"y":1}}]}}},"e0DQ82qcIov24":{"transform":{"data":{"r":53.209996,"t":{"x":-2.27,"y":-2.27}},"keys":{"o":[{"t":0,"v":{"x":80.035598,"y":338.632952,"type":"corner"},"e":[0.42,0,0.58,1]},{"t":600,"v":{"x":120.28118,"y":242.721211,"type":"corner"},"e":[0.42,0,1,1]},{"t":3000,"v":{"x":100.686271,"y":390.591294,"type":"corner"}}]}}},"e0DQ82qcIov25":{"transform":{"data":{"r":-0.309972,"t":{"x":-2.87,"y":-2.87}},"keys":{"o":[{"t":0,"v":{"x":42.81354,"y":329.78368,"type":"corner"},"e":[0.42,0,0.58,1]},{"t":600,"v":{"x":9.077533,"y":200.244515,"type":"corner"},"e":[0.42,0,1,1]},{"t":3000,"v":{"x":-81.070598,"y":353.708746,"type":"corner"}}]}}},"e0DQ82qcIov26":{"transform":{"data":{"t":{"x":-64.251358,"y":-382.608965}},"keys":{"o":[{"t":0,"v":{"x":44.251196,"y":382.608963,"type":"corner"},"e":[0.42,0,0.58,1]},{"t":600,"v":{"x":5.056724,"y":240.47839,"type":"corner"},"e":[0.42,0,1,1]},{"t":3000,"v":{"x":-48.895685,"y":624.464424,"type":"corner"}}],"r":[{"t":600,"v":-23.982197},{"t":3000,"v":-27.416918}]}}},"e0DQ82qcIov27":{"transform":{"data":{"t":{"x":-72.129825,"y":-327.740721}},"keys":{"o":[{"t":0,"v":{"x":52.12923,"y":327.741974,"type":"corner"},"e":[0.42,0,0.58,1]},{"t":600,"v":{"x":28.30154,"y":210.136787,"type":"corner"},"e":[0.42,0,1,1]},{"t":3000,"v":{"x":-8.016826,"y":321.537428,"type":"corner"}}],"r":[{"t":600,"v":0},{"t":3000,"v":-27.416918}]}}},"e0DQ82qcIov28":{"transform":{"data":{"t":{"x":-58.60866,"y":-362.624473}},"keys":{"o":[{"t":0,"v":{"x":38.60961,"y":362.624512,"type":"corner"},"e":[0.42,0,0.58,1]},{"t":600,"v":{"x":-19.604272,"y":334.474967,"type":"corner"},"e":[0.42,0,1,1]},{"t":3000,"v":{"x":-91.676691,"y":528.405553,"type":"corner"}}],"r":[{"t":600,"v":0},{"t":3000,"v":-27.416918}]}}},"e0DQ82qcIov29":{"transform":{"data":{"t":{"x":-85.125,"y":-372.55}},"keys":{"o":[{"t":0,"v":{"x":65.124998,"y":372.550003,"type":"corner"},"e":[0.42,0,0.58,1]},{"t":600,"v":{"x":60.58287,"y":328.985605,"type":"corner"},"e":[0.42,0,1,1]},{"t":3000,"v":{"x":39.906257,"y":605.071179,"type":"corner"}}]}}},"e0DQ82qcIov30":{"transform":{"data":{"t":{"x":-85.985,"y":-343.2}},"keys":{"o":[{"t":0,"v":{"x":65.984999,"y":343.199997,"type":"corner"},"e":[0.42,0,0.58,1]},{"t":600,"v":{"x":67.093979,"y":256.359486,"type":"corner"},"e":[0.42,0,1,1]},{"t":3000,"v":{"x":55.179319,"y":416.286149,"type":"corner"}}]}}},"e0DQ82qcIov31":{"transform":{"data":{"t":{"x":-51.55,"y":-340.1}},"keys":{"o":[{"t":0,"v":{"x":31.55,"y":340.100006,"type":"corner"},"e":[0.42,0,0.58,1]},{"t":600,"v":{"x":-44.109368,"y":248.924038,"type":"corner"},"e":[0.42,0,1,1]},{"t":3000,"v":{"x":-120.465769,"y":398.715533,"type":"corner"}}]}}},"e0DQ82qcIov32":{"transform":{"data":{"k":{"x":12,"y":0},"t":{"x":0,"y":-0.000026}},"keys":{"o":[{"t":0,"v":{"x":21.08,"y":358.870026,"type":"corner"},"e":[0.42,0,0.58,1]},{"t":600,"v":{"x":-56.695208,"y":316.172304,"type":"corner"},"e":[0.42,0,1,1]},{"t":3000,"v":{"x":-171.514115,"y":510.141829,"type":"corner"}}]}}},"e0DQ82qcIov33":{"transform":{"data":{"k":{"x":12,"y":0},"t":{"x":0.000004,"y":-0.000031}},"keys":{"o":[{"t":0,"v":{"x":81.819996,"y":336.500031,"type":"corner"},"e":[0.42,0,0.58,1]},{"t":600,"v":{"x":124.984262,"y":237.108421,"type":"corner"},"e":[0.42,0,1,1]},{"t":3000,"v":{"x":122.585537,"y":383.057086,"type":"corner"}}]}}},"e0DQ82qcIov34":{"transform":{"data":{"t":{"x":-339.133026,"y":-353.430679}},"keys":{"o":[{"t":0,"v":{"x":339.133026,"y":440.870722,"type":"corner"},"e":[0,0,0.58,1]},{"t":400,"v":{"x":260.436988,"y":0.00206,"type":"corner"},"e":[0.42,0,1,1]},{"t":3000,"v":{"x":120.436988,"y":472.443436,"type":"corner"}}],"s":[{"t":0,"v":{"x":0.5,"y":0.5},"e":[0,0,0.58,1]},{"t":400,"v":{"x":1,"y":1}}]}}},"e0DQ82qcIov36":{"transform":{"data":{"k":{"x":0,"y":-12},"t":{"x":-2.665,"y":-2.665}},"keys":{"o":[{"t":0,"v":{"x":339.831338,"y":323.778077,"type":"corner"},"e":[0.42,0,0.58,1]},{"t":600,"v":{"x":360.698425,"y":165.66525,"type":"corner"},"e":[0.42,0,1,1]},{"t":3000,"v":{"x":404.696728,"y":305.971088,"type":"corner"}}],"r":[{"t":0,"v":267.319986,"e":[0.42,0,0.58,1]},{"t":600,"v":274.669402},{"t":3000,"v":987.319986}],"s":[{"t":0,"v":{"x":1,"y":1},"e":[0.42,0,0.58,1]},{"t":500,"v":{"x":1,"y":-1},"e":[0.42,0,0.58,1]},{"t":1000,"v":{"x":1,"y":1},"e":[0.42,0,0.58,1]},{"t":1500,"v":{"x":-1,"y":1},"e":[0.42,0,0.58,1]},{"t":2000,"v":{"x":1,"y":1},"e":[0.42,0,0.58,1]},{"t":2500,"v":{"x":1,"y":-1},"e":[0.42,0,0.58,1]},{"t":3000,"v":{"x":1,"y":1}}]}}},"e0DQ82qcIov37":{"transform":{"data":{"k":{"x":0,"y":-12},"t":{"x":-2.68,"y":-2.679999}},"keys":{"o":[{"t":0,"v":{"x":332.034787,"y":355.149072,"type":"corner"},"e":[0.42,0,0.58,1]},{"t":600,"v":{"x":335.734711,"y":291.35666,"type":"corner"},"e":[0.42,0,1,1]},{"t":3000,"v":{"x":365.763922,"y":456.825595,"type":"corner"}}],"r":[{"t":0,"v":132.589988,"e":[0.42,0,0.58,1]},{"t":600,"v":139.939404},{"t":3000,"v":852.589988}],"s":[{"t":0,"v":{"x":1,"y":1},"e":[0.42,0,0.58,1]},{"t":500,"v":{"x":1,"y":-1},"e":[0.42,0,0.58,1]},{"t":1000,"v":{"x":1,"y":1},"e":[0.42,0,0.58,1]},{"t":1500,"v":{"x":-1,"y":1},"e":[0.42,0,0.58,1]},{"t":2000,"v":{"x":1,"y":1},"e":[0.42,0,0.58,1]},{"t":2500,"v":{"x":1,"y":-1},"e":[0.42,0,0.58,1]},{"t":3000,"v":{"x":1,"y":1}}]}}},"e0DQ82qcIov38":{"transform":{"data":{"k":{"x":12,"y":-12},"t":{"x":-2.77,"y":-2.77}},"keys":{"o":[{"t":0,"v":{"x":313.969353,"y":351.649632,"type":"corner"},"e":[0.42,0,0.58,1]},{"t":600,"v":{"x":274.477002,"y":277.997683,"type":"corner"},"e":[0.42,0,1,1]},{"t":3000,"v":{"x":257.724466,"y":430.117852,"type":"corner"}}],"r":[{"t":0,"v":139.969992,"e":[0.42,0,0.58,1]},{"t":600,"v":147.319408},{"t":3000,"v":859.969992}],"s":[{"t":0,"v":{"x":1,"y":1},"e":[0.42,0,0.58,1]},{"t":500,"v":{"x":1,"y":-1},"e":[0.42,0,0.58,1]},{"t":1000,"v":{"x":1,"y":1},"e":[0.42,0,0.58,1]},{"t":1500,"v":{"x":-1,"y":1},"e":[0.42,0,0.58,1]},{"t":2000,"v":{"x":1,"y":1},"e":[0.42,0,0.58,1]},{"t":2500,"v":{"x":1,"y":-1},"e":[0.42,0,0.58,1]},{"t":3000,"v":{"x":1,"y":1}}]}}},"e0DQ82qcIov39":{"transform":{"data":{"k":{"x":12,"y":-12},"t":{"x":-2.8,"y":-2.8}},"keys":{"o":[{"t":0,"v":{"x":346.242015,"y":359.327013,"type":"corner"},"e":[0.42,0,0.58,1]},{"t":600,"v":{"x":381.987786,"y":159.327013,"type":"corner"},"e":[0.42,0,1,1]},{"t":3000,"v":{"x":460.321097,"y":464.011506,"type":"corner"}}],"r":[{"t":0,"v":-71.26999,"e":[0.42,0,0.58,1]},{"t":600,"v":-63.920574},{"t":3000,"v":648.73001}],"s":[{"t":0,"v":{"x":1,"y":1},"e":[0.42,0,0.58,1]},{"t":500,"v":{"x":1,"y":-1},"e":[0.42,0,0.58,1]},{"t":1000,"v":{"x":1,"y":1},"e":[0.42,0,0.58,1]},{"t":1500,"v":{"x":-1,"y":1},"e":[0.42,0,0.58,1]},{"t":2000,"v":{"x":1,"y":1},"e":[0.42,0,0.58,1]},{"t":2500,"v":{"x":1,"y":-1},"e":[0.42,0,0.58,1]},{"t":3000,"v":{"x":1,"y":1}}]}}},"e0DQ82qcIov40":{"transform":{"data":{"k":{"x":12,"y":-12},"t":{"x":-2.2,"y":-2.2}},"keys":{"o":[{"t":0,"v":{"x":337.775113,"y":342.384855,"type":"corner"},"e":[0.42,0,0.58,1]},{"t":600,"v":{"x":347.393466,"y":258.599075,"type":"corner"},"e":[0.42,0,1,1]},{"t":3000,"v":{"x":386.483034,"y":404.151462,"type":"corner"}}],"r":[{"t":0,"v":0.62001,"e":[0.42,0,0.58,1]},{"t":600,"v":7.969426},{"t":3000,"v":720.62001}],"s":[{"t":0,"v":{"x":1,"y":1},"e":[0.42,0,0.58,1]},{"t":500,"v":{"x":1,"y":-1},"e":[0.42,0,0.58,1]},{"t":1000,"v":{"x":1,"y":1},"e":[0.42,0,0.58,1]},{"t":1500,"v":{"x":-1,"y":1},"e":[0.42,0,0.58,1]},{"t":2000,"v":{"x":1,"y":1},"e":[0.42,0,0.58,1]},{"t":2500,"v":{"x":1,"y":-1},"e":[0.42,0,0.58,1]},{"t":3000,"v":{"x":1,"y":1}}]}}},"e0DQ82qcIov41":{"transform":{"data":{"r":-23.480008,"t":{"x":-2.155,"y":-2.155}},"keys":{"o":[{"t":0,"v":{"x":333.324042,"y":370.076111,"type":"corner"},"e":[0.42,0,0.58,1]},{"t":600,"v":{"x":280.085239,"y":356.710812,"type":"corner"},"e":[0.42,0,1,1]},{"t":3000,"v":{"x":373.31293,"y":536.26526,"type":"corner"}}]}}},"e0DQ82qcIov42":{"transform":{"data":{"r":172.829984,"t":{"x":-2.095,"y":-2.095}},"keys":{"o":[{"t":0,"v":{"x":338.005958,"y":333.965489,"type":"corner"},"e":[0.42,0,0.58,1]},{"t":600,"v":{"x":290.630985,"y":207.121767,"type":"corner"},"e":[0.42,0,1,1]},{"t":3000,"v":{"x":391.973902,"y":342.843305,"type":"corner"}}]}}},"e0DQ82qcIov43":{"transform":{"data":{"r":45.880004,"k":{"x":12,"y":0},"s":{"x":0.999999,"y":0.999999},"t":{"x":-2.2,"y":-2.2}},"keys":{"o":[{"t":0,"v":{"x":356.60777,"y":343.212629,"type":"corner"},"e":[0.42,0,0.58,1]},{"t":600,"v":{"x":363.566855,"y":252.567281,"type":"corner"},"e":[0.42,0,1,1]},{"t":3000,"v":{"x":510.386099,"y":398.403963,"type":"corner"}}]}}},"e0DQ82qcIov44":{"transform":{"data":{"r":42.699998,"t":{"x":-2.165,"y":-2.165}},"keys":{"o":[{"t":0,"v":{"x":344.35393,"y":382.105602,"type":"corner"},"e":[0.42,0,0.58,1]},{"t":600,"v":{"x":308.944614,"y":375.885601,"type":"corner"},"e":[0.42,0,1,1]},{"t":3000,"v":{"x":419.910214,"y":566.056536,"type":"corner"}}],"s":[{"t":600,"v":{"x":1,"y":1},"e":[0.645,0.045,0.355,1]},{"t":800,"v":{"x":0,"y":0},"e":[0.645,0.045,0.355,1]},{"t":1000,"v":{"x":1,"y":1},"e":[0.645,0.045,0.355,1]},{"t":1200,"v":{"x":0,"y":0},"e":[0.645,0.045,0.355,1]},{"t":1400,"v":{"x":1,"y":1},"e":[0.645,0.045,0.355,1]},{"t":1600,"v":{"x":0,"y":0},"e":[0.645,0.045,0.355,1]},{"t":1800,"v":{"x":1,"y":1},"e":[0.645,0.045,0.355,1]},{"t":2000,"v":{"x":0,"y":0},"e":[0.645,0.045,0.355,1]},{"t":2200,"v":{"x":1,"y":1},"e":[0.645,0.045,0.355,1]},{"t":2400,"v":{"x":0,"y":0},"e":[0.645,0.045,0.355,1]},{"t":2600,"v":{"x":1,"y":1},"e":[0.645,0.045,0.355,1]},{"t":2800,"v":{"x":0,"y":0},"e":[0.645,0.045,0.355,1]},{"t":3000,"v":{"x":1,"y":1}}]}}},"e0DQ82qcIov45":{"transform":{"data":{"r":219.15,"k":{"x":12,"y":0},"t":{"x":-2.61,"y":-2.61}},"keys":{"o":[{"t":0,"v":{"x":322.723673,"y":335.389995,"type":"corner"},"e":[0.42,0,0.58,1]},{"t":600,"v":{"x":236.074642,"y":193.27712,"type":"corner"},"e":[0.42,0,1,1]},{"t":3000,"v":{"x":305.43786,"y":348.862778,"type":"corner"}}],"s":[{"t":600,"v":{"x":1,"y":1},"e":[0.645,0.045,0.355,1]},{"t":800,"v":{"x":0,"y":0},"e":[0.645,0.045,0.355,1]},{"t":1000,"v":{"x":1,"y":1},"e":[0.645,0.045,0.355,1]},{"t":1200,"v":{"x":0,"y":0},"e":[0.645,0.045,0.355,1]},{"t":1400,"v":{"x":1,"y":1},"e":[0.645,0.045,0.355,1]},{"t":1600,"v":{"x":0,"y":0},"e":[0.645,0.045,0.355,1]},{"t":1800,"v":{"x":1,"y":1},"e":[0.645,0.045,0.355,1]},{"t":2000,"v":{"x":0,"y":0},"e":[0.645,0.045,0.355,1]},{"t":2200,"v":{"x":1,"y":1},"e":[0.645,0.045,0.355,1]},{"t":2400,"v":{"x":0,"y":0},"e":[0.645,0.045,0.355,1]},{"t":2600,"v":{"x":1,"y":1},"e":[0.645,0.045,0.355,1]},{"t":2800,"v":{"x":0,"y":0},"e":[0.645,0.045,0.355,1]},{"t":3000,"v":{"x":1,"y":1}}]}}},"e0DQ82qcIov46":{"transform":{"data":{"r":234.010016,"t":{"x":-2.58,"y":-2.58}},"keys":{"o":[{"t":0,"v":{"x":369.232359,"y":348.112273,"type":"corner"},"e":[0.42,0,0.58,1]},{"t":600,"v":{"x":390.654123,"y":270.810625,"type":"corner"},"e":[0.42,0,1,1]},{"t":3000,"v":{"x":570.069779,"y":415.332942,"type":"corner"}}],"s":[{"t":600,"v":{"x":1,"y":1},"e":[0.645,0.045,0.355,1]},{"t":800,"v":{"x":0,"y":0},"e":[0.645,0.045,0.355,1]},{"t":1000,"v":{"x":1,"y":1},"e":[0.645,0.045,0.355,1]},{"t":1200,"v":{"x":0,"y":0},"e":[0.645,0.045,0.355,1]},{"t":1400,"v":{"x":1,"y":1},"e":[0.645,0.045,0.355,1]},{"t":1600,"v":{"x":0,"y":0},"e":[0.645,0.045,0.355,1]},{"t":1800,"v":{"x":1,"y":1},"e":[0.645,0.045,0.355,1]},{"t":2000,"v":{"x":0,"y":0},"e":[0.645,0.045,0.355,1]},{"t":2200,"v":{"x":1,"y":1},"e":[0.645,0.045,0.355,1]},{"t":2400,"v":{"x":0,"y":0},"e":[0.645,0.045,0.355,1]},{"t":2600,"v":{"x":1,"y":1},"e":[0.645,0.045,0.355,1]},{"t":2800,"v":{"x":0,"y":0},"e":[0.645,0.045,0.355,1]},{"t":3000,"v":{"x":1,"y":1}}]}}},"e0DQ82qcIov47":{"transform":{"data":{"r":32.799978,"t":{"x":-2.415,"y":-2.415}},"keys":{"o":[{"t":0,"v":{"x":359.306824,"y":334.892403,"type":"corner"},"e":[0.42,0,0.58,1]},{"t":600,"v":{"x":368.407056,"y":201.040458,"type":"corner"},"e":[0.42,0,1,1]},{"t":3000,"v":{"x":517.76228,"y":337.507771,"type":"corner"}}]}}},"e0DQ82qcIov48":{"transform":{"data":{"r":211.47999,"k":{"x":12,"y":0},"t":{"x":-2.1,"y":-2.1}},"keys":{"o":[{"t":0,"v":{"x":368.311337,"y":360.672632,"type":"corner"},"e":[0.42,0,0.58,1]},{"t":600,"v":{"x":385.771816,"y":309.827362,"type":"corner"},"e":[0.42,0,1,1]},{"t":3000,"v":{"x":549.037316,"y":480.545797,"type":"corner"}}],"s":[{"t":600,"v":{"x":1,"y":1},"e":[0.645,0.045,0.355,1]},{"t":800,"v":{"x":0,"y":0},"e":[0.645,0.045,0.355,1]},{"t":1000,"v":{"x":1,"y":1},"e":[0.645,0.045,0.355,1]},{"t":1200,"v":{"x":0,"y":0},"e":[0.645,0.045,0.355,1]},{"t":1400,"v":{"x":1,"y":1},"e":[0.645,0.045,0.355,1]},{"t":1600,"v":{"x":0,"y":0},"e":[0.645,0.045,0.355,1]},{"t":1800,"v":{"x":1,"y":1},"e":[0.645,0.045,0.355,1]},{"t":2000,"v":{"x":0,"y":0},"e":[0.645,0.045,0.355,1]},{"t":2200,"v":{"x":1,"y":1},"e":[0.645,0.045,0.355,1]},{"t":2400,"v":{"x":0,"y":0},"e":[0.645,0.045,0.355,1]},{"t":2600,"v":{"x":1,"y":1},"e":[0.645,0.045,0.355,1]},{"t":2800,"v":{"x":0,"y":0},"e":[0.645,0.045,0.355,1]},{"t":3000,"v":{"x":1,"y":1}}]}}},"e0DQ82qcIov49":{"transform":{"data":{"r":53.209996,"k":{"x":12,"y":0},"t":{"x":-2.27,"y":-2.27}},"keys":{"o":[{"t":0,"v":{"x":367.235051,"y":338.643013,"type":"corner"},"e":[0.42,0,0.58,1]},{"t":600,"v":{"x":381.315795,"y":220.571666,"type":"corner"},"e":[0.42,0,1,1]},{"t":3000,"v":{"x":542.045315,"y":362.503156,"type":"corner"}}],"s":[{"t":600,"v":{"x":1,"y":1},"e":[0.645,0.045,0.355,1]},{"t":800,"v":{"x":0,"y":0},"e":[0.645,0.045,0.355,1]},{"t":1000,"v":{"x":1,"y":1},"e":[0.645,0.045,0.355,1]},{"t":1200,"v":{"x":0,"y":0},"e":[0.645,0.045,0.355,1]},{"t":1400,"v":{"x":1,"y":1},"e":[0.645,0.045,0.355,1]},{"t":1600,"v":{"x":0,"y":0},"e":[0.645,0.045,0.355,1]},{"t":1800,"v":{"x":1,"y":1},"e":[0.645,0.045,0.355,1]},{"t":2000,"v":{"x":0,"y":0},"e":[0.645,0.045,0.355,1]},{"t":2200,"v":{"x":1,"y":1},"e":[0.645,0.045,0.355,1]},{"t":2400,"v":{"x":0,"y":0},"e":[0.645,0.045,0.355,1]},{"t":2600,"v":{"x":1,"y":1},"e":[0.645,0.045,0.355,1]},{"t":2800,"v":{"x":0,"y":0},"e":[0.645,0.045,0.355,1]},{"t":3000,"v":{"x":1,"y":1}}]}}},"e0DQ82qcIov50":{"transform":{"data":{"r":23.663757,"t":{"x":-2.87,"y":-2.87}},"keys":{"o":[{"t":0,"v":{"x":329.999336,"y":329.76998,"type":"corner"},"e":[0.42,0,0.58,1]},{"t":600,"v":{"x":265.665974,"y":185.96649,"type":"corner"},"e":[0.42,0,1,1]},{"t":3000,"v":{"x":350.187687,"y":331.626855,"type":"corner"}}]}}},"e0DQ82qcIov51":{"transform":{"data":{"t":{"x":-311.441315,"y":-382.608965}},"keys":{"o":[{"t":0,"v":{"x":331.441177,"y":382.608963,"type":"corner"},"e":[0.42,0,0.58,1]},{"t":600,"v":{"x":370.580827,"y":282.608955,"type":"corner"},"e":[0.42,0,1,1]},{"t":3000,"v":{"x":322.780243,"y":581.243292,"type":"corner"}}],"r":[{"t":600,"v":0},{"t":3000,"v":-27.416918}]}}},"e0DQ82qcIov52":{"transform":{"data":{"t":{"x":-319.316361,"y":-327.740722}},"keys":{"o":[{"t":0,"v":{"x":339.317871,"y":327.738892,"type":"corner"},"e":[0.42,0,0.58,1]},{"t":600,"v":{"x":364.888624,"y":179.476884,"type":"corner"},"e":[0.42,0,1,1]},{"t":3000,"v":{"x":359.772601,"y":320.824028,"type":"corner"}}],"r":[{"t":600,"v":0},{"t":3000,"v":-27.416918}]}}},"e0DQ82qcIov53":{"transform":{"data":{"t":{"x":-305.909409,"y":-362.720527}},"keys":{"o":[{"t":0,"v":{"x":325.908142,"y":362.720535,"type":"corner"},"e":[0.42,0,0.58,1]},{"t":600,"v":{"x":317.062688,"y":322.932297,"type":"corner"},"e":[0.42,0,1,1]},{"t":3000,"v":{"x":283.21855,"y":506.92949,"type":"corner"}}],"r":[{"t":600,"v":0},{"t":3000,"v":-27.416918}]}}},"e0DQ82qcIov54":{"transform":{"data":{"r":-15.701363,"t":{"x":-332.32,"y":-372.55}},"keys":{"o":[{"t":0,"v":{"x":352.319992,"y":372.550003,"type":"corner"},"e":[0.42,0,0.58,1]},{"t":600,"v":{"x":398.087773,"y":327.631014,"type":"corner"},"e":[0.42,0,1,1]},{"t":3000,"v":{"x":427.726611,"y":542.547677,"type":"corner"}}]}}},"e0DQ82qcIov55":{"transform":{"data":{"r":39.399845,"t":{"x":-333.18,"y":-343.2}},"keys":{"o":[{"t":0,"v":{"x":353.180008,"y":343.199997,"type":"corner"},"e":[0.42,0,0.58,1]},{"t":600,"v":{"x":408.123603,"y":237.271459,"type":"corner"},"e":[0.42,0,1,1]},{"t":3000,"v":{"x":451.543185,"y":384.595506,"type":"corner"}}]}}},"e0DQ82qcIov56":{"transform":{"data":{"t":{"x":-318.75,"y":-340.1}},"keys":{"o":[{"t":0,"v":{"x":318.75,"y":340.100006,"type":"corner"},"e":[0.42,0,0.58,1]},{"t":600,"v":{"x":292.640575,"y":228.498455,"type":"corner"},"e":[0.42,0,1,1]},{"t":3000,"v":{"x":271.671483,"y":369.684164,"type":"corner"}}]}}},"e0DQ82qcIov57":{"transform":{"data":{"t":{"x":0.000007,"y":0.000029}},"keys":{"o":[{"t":0,"v":{"x":350.289993,"y":359.829971,"type":"corner"},"e":[0.42,0,0.58,1]},{"t":600,"v":{"x":470.289982,"y":303.793677,"type":"corner"},"e":[0.42,0,1,1]},{"t":3000,"v":{"x":416.116329,"y":488.36212,"type":"corner"}}]}}},"e0DQ82qcIov58":{"transform":{"data":{"t":{"x":0.000021,"y":-0.000031}},"keys":{"o":[{"t":0,"v":{"x":369.009979,"y":336.500031,"type":"corner"},"e":[0.42,0,0.58,1]},{"t":600,"v":{"x":466.01886,"y":213.234914,"type":"corner"},"e":[0.42,0,1,1]},{"t":3000,"v":{"x":556.221932,"y":355.912179,"type":"corner"}}]}}},"e0DQ82qcIov74":{"transform":{"data":{"s":{"x":2,"y":2},"t":{"x":-101.82,"y":-32}},"keys":{"o":[{"t":0,"v":{"x":80.119972,"y":412.733887,"type":"corner"},"e":[0,0,0.58,1]},{"t":600,"v":{"x":110.119972,"y":22.733887,"type":"corner"},"e":[0.55,0.055,0.675,0.19]},{"t":3000,"v":{"x":110.119972,"y":632.733887,"type":"corner"}}],"r":[{"t":0,"v":4.536717,"e":[0,0,0.58,1]},{"t":600,"v":0}]}},"opacity":[{"t":2900,"v":1},{"t":3000,"v":0}],"stroke-dashoffset":[{"t":0,"v":153.37,"e":[0,0,0.58,1]},{"t":600,"v":243.37},{"t":3000,"v":153.37,"e":[0,0,0.58,1]}],"stroke-dasharray":[{"t":0,"v":[16,85.68]},{"t":600,"v":[50,51.68]},{"t":700,"v":[30,71.68]},{"t":3000,"v":[30,71.68]}]},"e0DQ82qcIov75":{"transform":{"data":{"s":{"x":2,"y":2},"t":{"x":-88.769997,"y":-32}},"keys":{"o":[{"t":0,"v":{"x":-9.517153,"y":396.469061,"type":"corner"},"e":[0,0,0.58,1]},{"t":600,"v":{"x":20.482847,"y":6.469061,"type":"corner"},"e":[0.55,0.055,0.675,0.19]},{"t":3000,"v":{"x":20.482847,"y":426.469061,"type":"corner"}}],"r":[{"t":0,"v":4.536717,"e":[0,0,0.58,1]},{"t":600,"v":0}]}},"opacity":[{"t":2900,"v":1},{"t":3000,"v":0}],"stroke-dashoffset":[{"t":0,"v":153.37,"e":[0,0,0.58,1]},{"t":600,"v":243.37},{"t":3000,"v":153.37,"e":[0,0,0.58,1]}],"stroke-dasharray":[{"t":0,"v":[16,85.68]},{"t":600,"v":[50,51.68]},{"t":700,"v":[30,71.68]},{"t":3000,"v":[30,71.68]}]},"e0DQ82qcIov76":{"transform":{"data":{"s":{"x":2,"y":2},"t":{"x":-95.300003,"y":-32}},"keys":{"o":[{"t":0,"v":{"x":387.258404,"y":332,"type":"corner"},"e":[0,0,0.58,1]},{"t":600,"v":{"x":347.258404,"y":-28,"type":"corner"},"e":[0.55,0.055,0.675,0.19]},{"t":3000,"v":{"x":347.258404,"y":402,"type":"corner"}}],"r":[{"t":0,"v":-6.342949,"e":[0,0,0.58,1]},{"t":600,"v":0}]}},"opacity":[{"t":2900,"v":1},{"t":3000,"v":0}],"stroke-dashoffset":[{"t":0,"v":153.37,"e":[0,0,0.58,1]},{"t":600,"v":243.37},{"t":3000,"v":153.37,"e":[0,0,0.58,1]}],"stroke-dasharray":[{"t":0,"v":[16,85.68]},{"t":600,"v":[50,51.68]},{"t":700,"v":[30,71.68]},{"t":3000,"v":[30,71.68]}]},"e0DQ82qcIov77":{"transform":{"data":{"s":{"x":2,"y":2},"t":{"x":-108.339996,"y":-32}},"keys":{"o":[{"t":0,"v":{"x":339.817631,"y":349.76874,"type":"corner"},"e":[0,0,0.58,1]},{"t":600,"v":{"x":299.817631,"y":-10.23126,"type":"corner"},"e":[0.55,0.055,0.675,0.19]},{"t":3000,"v":{"x":299.817631,"y":579.76874,"type":"corner"}}],"r":[{"t":0,"v":-6.342949,"e":[0,0,0.58,1]},{"t":600,"v":0}]}},"opacity":[{"t":2900,"v":1},{"t":3000,"v":0}],"stroke-dashoffset":[{"t":0,"v":153.37,"e":[0,0,0.58,1]},{"t":600,"v":243.37},{"t":3000,"v":153.37,"e":[0,0,0.58,1]}],"stroke-dasharray":[{"t":0,"v":[16,85.68]},{"t":600,"v":[50,51.68]},{"t":700,"v":[30,71.68]},{"t":3000,"v":[30,71.68]}]}},"s":"MDSA1ZDliNDI4NVDk1OTI4MTk0JODk4ZjhlSzQAyNWE1MzUyNTHA1MDRjNDI4NGDg5VTkyODU4WMzk0ODk4ZjhTlNDI1YTUxNGGNMNDI4OTk0OTDU5MjgxOTQ4LOThmOGU5M08P0MjVhNTE0YzKQyODZRODk4YDzhjNDI1YTUxVNGM0MkY4MThOjOTRGODU5MjWhlODE5NDg1NNDI1YTg2ODE4CYzkzODU0YzQJyOTM5MFRCODAU4NTg0NDI1YJTUxNGM0Mko4HNjkwOTM0MjVGhNTE1MDUwOWPQ/"}],"options":"MDIAxODkyMzlZOMGE4Ykc3ODg5NOGIzOTUxMzkO4Nzg5ODY3ZTNg5Nzg4NDg0NRzg4Ykg4MDdhKSzM5OTQ/"},'https://cdn.svgator.com/ply/','__SVGATOR_PLAYER__','2022-05-04',window,document,'script','http://www.w3.org/2000/svg','http://www.w3.org/1999/xlink')
            ]]></script>
        </svg>
    </div>

    <!-- detail result  -->
    <div class="main_div d-none">
        <div class="mt-4 mb-5">
            <div class="my-3">
                @if(isset($journey) && $journey)
                    <a class="text-decoration-underline text-primary" href="{{route('student_journey', ['id' => $practiceSet['journey_id']])}}"><i class="bx bx-arrow-back fw-semibold fs-5 me-1"></i>Back to Journey</a>
                @else 
                    <a class="text-decoration-underline text-primary" href="/dashboard"><i class="bx bx-arrow-back fw-semibold fs-5 me-1"></i>Back to Dashboard</a>
                @endif
            </div>
            <h1 class="my-2 text-dark fs-2 fw-semibold">
                Detailed
                @if(isset($journey) && $journey)
                    Journey 
                @else
                    Practise
                @endif
                Results
            </h1>
            <p class="fs-6">Get a detailed overview of your performance with practise results that include scores, time spent, earned coins and solution of questions.</p>
            <div class="row m-0 align-items-center justify-content-center mt-5">
                <div class="col-12 col-lg-4 col-md-4 col-sm-6 my-2">
                    <div class="practice_sets_cards bg-white shadow rounded-4 p-3">
                        <div class="text-center">
                        <img src="{{url('images\question.webp')}}" class="practice_results_image" height="60" width="60" alt="pratice result image">
                        </div>
                        <p class="fs-5 text-center text-dark"><span class="fs-3 fw-bold">{{$analytics['correct_answered_questions']}}</span>/{{$analytics['total_questions']}}</p>
                        <h5 class="fs-5 my-2 practice_card_name text-center text-dark">Correct Questions</h5>
                    </div>
                </div>
                <div class="col-12 col-lg-4 col-md-4 col-sm-6 my-2">
                    <div class="practice_sets_cards bg-white shadow rounded-4 p-3">
                        <div class="text-center">
                        <img src="{{url('images\reward.png')}}" class="practice_results_image" height="60" width="60" alt="pratice test image">
                        </div>
                        <p class="fs-5 text-center text-dark"><span class="fs-3 fw-bold">{{$session['total_points_earned']}}</span>&nbsp;xp</p>
                        <h5 class="fs-5 my-2 practice_card_name text-center text-dark">Coins earned</h5>
                    </div>
                </div>
                <div class="col-12 col-lg-4 col-md-4 col-sm-6 my-2">
                    <div class="practice_sets_cards bg-white shadow rounded-4 p-3">
                        <div class="text-center">
                            <img src="{{url('images\clock.png')}}" class="practice_results_image" height="60" width="60" alt="pratice test image">
                        </div>
                        <p class="fs-5 text-center text-dark"><span class="fs-3 fw-bold">{{$analytics['total_time_taken']['seconds']}}</span>&nbsp;que/sec</p>
                        <h5 class="fs-5 my-2 practice_card_name text-center text-dark">Average Time</h5>
                    </div>
                </div>
            </div>
            <div class="p-lg-3 p-md-3 p-2 mt-2">
                <div class="justify-content-center row pb-3">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-12 my-3">
                        <div class="bg-white rounded-3 p-4 shadow">
                            <h2 class="h4 my-2">Correct Answers Chart</h2>
                            <div class="heading_line my-2"></div>
                            <p class="my-2 mb-4">This chart shows the correct answers to questions during the current session.</p>
                            <div class="row bs-gutter-x-0">
                                <div class="m-auto col-md-6 col-lg-4 col-sm-6 col-6"><canvas class="w-100 h-100" id="myQuestionChart"></canvas>
                                </div>
                                <div class="col-md-12 col-lg-6 align-self-center font-size-13 ps-2">
                                    <div>
                                        <svg class="svg-indicator" style="color:{{$chartColors[0]}};" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        {{ $analytics['correct_answered_questions'] }} Correct
                                    </div>
                                    <div>
                                        <svg class="svg-indicator" style="color:{{$chartColors[1]}};" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        {{ $analytics['wrong_answered_questions'] }} Wrong
                                    </div>
                                    <div>
                                        <svg class="svg-indicator" style="color:{{$chartColors[2]}};" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        {{ $analytics['unanswered_questions'] }} Unanswered
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-12 my-3">
                        <div class="bg-white rounded-3 p-4 shadow">
                            <h2 class="h4 my-2">Time Spent Chart</h2>
                            <div class="heading_line my-2"></div>
                            <p class="my-2 mb-4">This chart showcases the duration of time you allocate during this session.</p>
                            <div class="row bs-gutter-x-0">
                                <div class="m-auto col-md-6 col-lg-4 col-sm-6 col-6"><canvas class="w-100 h-100" id="myTimeChart"></canvas></div>
                                <div class="col-md-12 col-lg-6 align-self-center font-size-13 ps-2">
                                    <div>
                                        <svg class="svg-indicator" style="color:{{$chartColors[0]}};" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        {{ $analytics['time_taken_for_correct_answered']['detailed_readable'] }} Correct
                                    </div>
                                    <div>
                                        <svg class="svg-indicator" style="color:{{$chartColors[1]}};" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        {{ $analytics['time_taken_for_wrong_answered']['detailed_readable'] }} Wrong
                                    </div>
                                    <div>
                                        <svg class="svg-indicator" style="color:{{$chartColors[2]}};" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        {{ $analytics['time_taken_for_other']['detailed_readable'] }} Other
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- solution  -->
        <div class="my-5">
            <h2 class="text-dark fs-2 fw-semibold">Transcripts</h2>
                <div class="row m-0 align-items-center justify-content-center my-4">
                    <div class="col-12 col-lg-4 col-md-6 col-sm-6 my-2">
                        <div class="p-3 position-relative practice_card rounded-4 shadow">
                            <div class="practice_title practice_grid_child justify-content-center">
                                <img src="{{url('images\question_answered.png')}}" class="practice_results_image" height="50" width="50" alt="question attempted">
                            </div>
                            <div class="practice_progress practice_grid_child my-1">
                                <div class="practice_progress_parent ms-2" style="width: 90%;">
                                    <span class="fs-4 text-white"><span class="fs-3 fw-bold">{{$analytics['answered_questions']}}</span>/{{$analytics['total_questions']}}</span>
                                    <p class="fw-normal mb-2 practice_card_name text-white">Question Answered</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4 col-md-6 col-sm-6 my-2">
                        <div class="p-3 position-relative practice_card rounded-4 shadow">
                            <div class="practice_title practice_grid_child justify-content-center">
                                <img src="{{url('images\darts.png')}}" class="practice_results_image" height="50" width="50" alt="accuracy image">
                            </div>
                            <div class="practice_progress practice_grid_child my-1">
                                <div class="practice_progress_parent ms-2" style="width: 90%;">
                                    <span class="fs-4 text-white"><span class="fs-3 fw-bold">{{$analytics['accuracy']}}</span>&nbsp;%</span>
                                    <p class="fw-normal mb-2 practice_card_name text-white">Accuracy</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4 col-md-6 col-sm-6 my-2">
                        <div class="p-3 position-relative practice_card rounded-4 shadow">
                            <div class="practice_title practice_grid_child justify-content-center">
                                <img src="{{url('images\timer.png')}}" class="practice_results_image" height="50" width="50" alt="time spent image">
                            </div>
                            <div class="practice_progress practice_grid_child my-1">
                                <div class="practice_progress_parent ms-2" style="width: 90%;">
                                <span class="fs-4 text-white"><span class="fs-3 fw-bold">{{$analytics['total_time_taken']['seconds']}}</span>&nbsp;sec</span>
                                    <p class="fw-normal mb-2 practice_card_name text-white">Time Spent</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="bg-white p-lg-3 p-md-3 p-2 rounded-3 shadow"> 
                <h2 class="text-dark text-center my-3 fs-3">Take a look at Solutions!</h2>
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
                                    p-3 w-100 rounded-1" type="button" data-bs-toggle="collapse" data-bs-target="#question_solution_{{++$key}}" aria-expanded="false" aria-controls="question_solution_{{$key}}">
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
                                    <div class="card-body p-0">
                                        <div class="question_details p-2 py-5 shadow">
                                            <h4 class="text-center text-dark question_container">
                                                {!!$question['question']!!}
                                            </h4>
                                            @if($question['questionType'] == 'FIB')
                                                <ul class="question_options_container m-0 p-0 my-4">
                                                    @foreach($question['user_answer'] as $userAnsKey => $answer)
                                                        <li 
                                                            class="question_options_items 
                                                            @if(strtolower($answer) == strtolower($question['ca'][$userAnsKey]))
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
                                                    @endforeach
                                                </ul>
                                                @if(!$question['is_correct'])
                                                    <div class="text-center fs-5 mb-3">
                                                        @if($question['options'] > 1)
                                                            Correct answers are 
                                                            @foreach($question['ca'] as $caKey => $ca)
                                                                <span class="badge text-black bg-label-primary p-1">{{++$caKey}}.</span> <span class="ms-1 me-2">{{$ca}}</span>
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
                                                                <span class="badge text-black bg-label-primary p-1">{{++$caKey}}.</span> 
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
                                                                    <span class="badge text-black bg-label-primary p-1">{{++$caKey}}.</span> <span class="ms-1 me-2 d-inline-block">{!!$option['value']!!}</span>
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
                                                        <span class="badge text-black bg-label-primary p-1">{{$question['ca'][0]}}.</span> <span class="ms-1 me-2 d-inline-block">{!!$question['options'][--$question['ca'][0]]!!}</span>
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
                                                            @foreach($question['user_answer'] as $userAnsKey => $answer)
                                                                @if($optionKey + 1 == $answer)
                                                                    @if(in_array($answer, $question['ca']))
                                                                        correct_question_option
                                                                    @else
                                                                        wrong_question_option
                                                                    @endif
                                                                @endif
                                                            @endforeach
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
                                                @if(!$question['is_correct'])
                                                    <div class="text-center fs-5 mb-3">
                                                        Correct answers are 
                                                        @foreach($question['ca'] as $caKey => $ca)
                                                            <span class="badge text-black bg-label-primary p-1">{{++$caKey}}.</span> <span class="ms-1 me-2 d-inline-block">{!!$ca!!}</span>
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
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="wrong_ques{{$question['id']}}" aria-labelledby="modalToggleLabel" tabindex="-1" aria-hidden="true">
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
                                                <div id="query_error_{{$question['id']}}" class="fw-light mb-1 small text-danger"></div>
                                                <button class="btn btn-success submit_question_issue" data-id="{{$question['id']}}">Message</button>
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
    </div> 

    @include('User.ProgressScript')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/easy-pie-chart/2.1.6/jquery.easypiechart.min.js'></script>
    <script>
    
        $(function() {
            let score = $(".my_progress_chart").data('percent');
            console.log(score);
            $('.progress_chart').easyPieChart({
                size: 120,
                // barColor: "#ffc107",
                barColor: (score >= 80) ? '#59da59' : ((score >= 40 && score < 80) ? '#ffc107' : '#f85e5e'),
                scaleLength: 0,
                lineWidth: 12,
                trackColor: "#ededed",
                lineCap: "circle",
                animate: 2000,
            });
        });
        function confettiShooter() {
            const element = document.getElementById('e0DQ82qcIov1');
            element.svgatorPlayer.ready(function() {
                // this refers to the player object
                const player = element ? element.svgatorPlayer : {};
                if (player.play) {
                player.play();
                }
            });
        }

        $(document).ready(function() {
            setTimeout(() => {
                confettiShooter();
            }, 3200);
        });

        $(".actions_button").click(function(){
            $(this).find(".bx-arrow-back").removeClass("bx-arrow-back").addClass("bx-loader-alt bx-spin");
            setTimeout(() => {
                $(this).find(".bx-loader-alt").removeClass("bx-loader-alt bx-spin").addClass("bx-arrow-back");
                $(".main_div").removeClass("d-none");
                $(".main_container").addClass("d-none");
                confettiShooter();
            }, 3000);
        });
    
    </script>
   
    <script>
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
        function preventBack() {
            window.history.forward();
        }
        setTimeout("preventBack()", 0);
        window.onunload = function () { null };
        var chartColors = {!! str_replace("'", "\'", json_encode($chartColors))!!};
        var total_question_data = [{{ $analytics['correct_answered_questions']}}, {{ $analytics['wrong_answered_questions']}}, {{ $analytics['unanswered_questions'] }}];
        var total_time_data = [{{ $analytics['time_taken_for_correct_answered']['seconds'] }}, {{ $analytics['time_taken_for_wrong_answered']['seconds'] }}, {{ $analytics['time_taken_for_other']['seconds'] }}];
        var total_question_chart_data = {
            labels: ['Correct', 'Wrong', 'Unanswered'],
            datasets: [{
                data: total_question_data,
                backgroundColor: [chartColors[0], chartColors[1], chartColors[2]],
                hoverBackgroundColor: [chartColors['transparent'][0], chartColors['transparent'][1], chartColors['transparent'][2]]
            }]
        };
        var total_time_chart_data = {
            labels: ['Correct', 'Wrong', 'Other'],
            datasets: [{
                label: 'Time Spent',
                data: total_time_data,
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
                    var text = "{{$analytics['answered_questions']}}/{{$analytics['total_questions']}} Answered"
                    textX = Math.round((width - ctx.measureText(text).width) / 2),
                        textY = height / 2;

                    ctx.fillText(text, textX, textY);
                    ctx.save();
                }
            }]
        });
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
                    var text = "{{$analytics['total_time_taken']['detailed_readable']}} Spent"
                    textX = Math.round((width - ctx.measureText(text).width) / 2),
                        textY = height / 2;

                    ctx.fillText(text, textX, textY);
                    ctx.save();
                }
            }]
        });
        let practiceSlug = {!! str_replace("'", "\'", json_encode($practiceSet['slug']))!!};
        let sessionCode = {!! str_replace("'", "\'", json_encode($session['code']))!!};
        var reqData = {
            practiceSet: practiceSlug,
            session: sessionCode
        }
        $.ajax({
            type: "GET",
            url: "/practice/" + practiceSlug + "/solutions/" + sessionCode,
            data: { reqData, _token: '{{csrf_token()}}' },
            success: function (data) {
                data['questions'].forEach(function (question, i) {
                    var i = ++i;
                    var tab = '<div class="tab-pane fade" id="question_' + i + '" role="tabpanel" aria-labelledby="question_' + i + '_tab">' +
                        '<div class="d-flex justify-content-between">' +
                        '<div class="alert-primary px-2 rounded shadow-sm">Time Spent: ' + question.time_taken.detailed_readable + '</div>' +
                        '<div class="px-2 rounded shadow-sm bg-label-success border-success" id="question_marks_earned_' + i + '">+' + question.points_earned + ' Points Earned</div>' +
                        '</div>' +
                        '<div class="my-3 bg-body p-3 rounded-1 shadow-sm">' +
                        '<div><span class="text-dark">Q' + i + ' of ' + data['questions'].length + ' | </span> <span class="text-uppercase fs-tiny">' + question.skill + '</span> </div>' +
                        '<div class="mt-3 text-dark">' + question.question + '</div>' +
                        '</div>' +
                        '<div id="options' + i + '"></div>' +
                        '<div class="mt-3 bg-label-success py-2 px-3 border border-success text-black rounded-1">' +
                        '<svg class="me-1 h-px-20" style="color:#73dd37;" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>' +
                        '<span id="count_options_' + i + '"></span>' +
                        '<span class="correct_answers" id="correct_answers_' + i + '"></span>' +
                        '</div>' +
                        '</div>';
                    $("#question_nums").append('<button class="btn me-2 mt-2" id="question_' + i + '_tab" data-bs-toggle="tab" data-bs-target="#question_' + i + '" type="button" role="tab" aria-controls="question_' + i + '" aria-selected="true">' + i + '</button>');
                    $("#question_solution").append(tab)
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
                            if(question.is_correct){
                                options +=  `<div id="option_`+i+`_0" class="border d-flex mt-2 rounded-1 bg-label-success"><div class="w-100 align-self-center px-3 py-4">`+question.user_answer+`</div></div>`;
                            } else {
                                options +=  `<div id="option_`+i+`_0" class="border d-flex mt-2 rounded-1 bg-label-danger"><div class="w-100 align-self-center px-3 py-4">`+question.user_answer+`</div></div>`;
                            }
                            $("#options"+i).append(options);
                            break;
                        case 'MTF':
                            let matches = "";
                            let pairs = "";
                            question.options.matches.forEach(function(match,m){
                                matches +=  `<div id="option_`+i+`_`+m+`" class="border d-flex mt-2 rounded-1"><div class="border-end py-1 px-3"><span style="font-size: 13px;" class="bg-body shadow-sm text-dark px-1 rounded-1">`+(++m)+`</span></div><div class="w-100 align-self-center px-2">`+match.value+`</div></div>`;
                            });
                            question.user_answer.forEach(function(pair,p){
                                if(pair.id == question.ca[p]){
                                    pairs +=  `<div id="option_`+i+`_`+p+`" class="border d-flex mt-2 rounded-1 bg-label-success"><div class="border-end py-1 px-3"><span style="font-size: 13px;" class="bg-body shadow-sm text-dark px-1 rounded-1">`+(++p)+`</span></div><div class="w-100 align-self-center px-2">`+pair.value+`</div></div>`;
                                } else {
                                    pairs +=  `<div id="option_`+i+`_`+p+`" class="border d-flex mt-2 rounded-1 bg-label-danger"><div class="border-end py-1 px-3"><span style="font-size: 13px;" class="bg-body shadow-sm text-dark px-1 rounded-1">`+(++p)+`</span></div><div class="w-100 align-self-center px-2">`+pair.value+`</div></div>`;
                                }
                            });
                            var options = `<div class="row"><div class="col-6">`+matches+`</div><div class="col-6">`+pairs+`</div></div>`;
                            $("#options"+i).append(options);
                            break;
                        case 'ORD':
                            var options = "";
                            question.user_answer.forEach(function(pair,p){
                                if(pair.id == question.ca[p]){
                                    options +=  `<div id="option_`+i+`_`+p+`" class="border d-flex mt-2 rounded-1 bg-label-success"><div class="border-end py-1 px-3"><span style="font-size: 13px;" class="bg-body shadow-sm text-dark px-1 rounded-1">`+(++p)+`</span></div><div class="w-100 align-self-center px-2">`+pair.value+`</div></div>`;
                                } else {
                                    options +=  `<div id="option_`+i+`_`+p+`" class="border d-flex mt-2 rounded-1 bg-label-danger"><div class="border-end py-1 px-3"><span style="font-size: 13px;" class="bg-body shadow-sm text-dark px-1 rounded-1">`+(++p)+`</span></div><div class="w-100 align-self-center px-2">`+pair.value+`</div></div>`;
                                }
                            });
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
                            let found = question.user_answer.find(x => x.id == answer);
                            if (question.ca.length != ++a) {
                                $("#correct_answers_" + i).append("<span class='text-dark fw-bold'>Q" + a + ".</span> " + found.value + ", ");
                            } else {
                                $("#correct_answers_" + i).append("<span class='text-dark fw-bold'>" + found.value );
                            }
                        });
                    } else {
                        if(typeof question.ca != 'string'){
                            if (question.ca.length != undefined || question.ca.length > 1 ) {
                                $("#count_options_" + i).text("Correct answers are: ");
                                question.ca.forEach(function (answer, a) {
                                    if (question.ca.length != ++a) {
                                        $("#correct_answers_" + i).append("<span class='text-dark fw-bold'>Q" + a + ".</span> " + answer + ", ");
                                    } else {
                                        $("#correct_answers_" + i).append("<span class='text-dark fw-bold'>" + answer);
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
                    if (i == 1) {
                        $("#question_num" + i).addClass('active');
                        $("#question_" + i).addClass('show active');
                    }
                    if (question.is_correct) {
                        $("#question_" + i + "_tab").addClass('bg-label-success border-success');
                        $("#question_marks_earned_" + i).addClass('bg-label-success border-success');

                    } else {
                        $("#question_" + i + "_tab").addClass('bg-label-danger border-danger');
                        $("#question_marks_earned_" + i).addClass('bg-label-danger border-danger');
                    }
                });
            },
            error: function (data, textStatus, errorThrown) {
                console.log(errorThrown);
                console.log(data);
            },
        });
    </script>
</body>

</html>