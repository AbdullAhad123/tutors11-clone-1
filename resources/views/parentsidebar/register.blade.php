<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- rel icon -->
    {{-- <title>Boost your 11+ Exam Preparation - Join {{ app(\App\Settings\SiteSettings::class)->app_name }} Now</title> --}}
    <title>Create Your Free Account at {{ app(\App\Settings\SiteSettings::class)->app_name }} Today</title>
    <link rel="icon" href="{{ url('storage/' . app(\App\Settings\SiteSettings::class)->favicon_path) }}">
    <meta name="description"
        content="Join TutorsElevenPlus for a personalised 11+ study journey. Access expert tutors, custom study plans, and top-notch resources to excel in your exams.">
    <meta name="keywords"
        content="registration, sign up for TutorsElevenPlus, join TutorsElevenPlus, 11+ exam registration, create account for 11+ study, enroll 11+ tutoring, {{ app(\App\Settings\KeywordsSettings::class)->keywords['home_keywords'] }}">
    <meta name="author" content="{{ app(\App\Settings\SiteSettings::class)->app_name }}">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Kanit:wght@200;300;400;500&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ url('Frontend_css/all.css') }}" />
    <link rel="stylesheet" href="{{ url('Frontend_css/assets/vendor/css/core.css') }}"
        class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ url('Frontend_css/assets/vendor/css/theme-default.css') }}"
        class="template-customizer-theme-css" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css"
        integrity="sha512-ZnR2wlLbSbr8/c9AgLg3jQPAattCUImNsae6NHYnS9KrIwRdcY9DxFotXhNAKIKbAXlRnujIqUWoXXwqyFOeIQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
        .login_inp::placeholder {
            color: #ccc;
            opacity: 1;
            /* Firefox */
        }

        .login_inp:-ms-input-placeholder {
            /* Internet Explorer 10-11 */
            color: #ccc;
        }

        .login_inp::-ms-input-placeholder {
            /* Microsoft Edge */
            color: #ccc;
        }

        .login_content_container {
            min-height: 100vh;
            max-height: auto;
            width: 100%;
        }

        .btn_login_primary {
            background-color: var(--primary);
            color: #fff !important;
            transition: 0.25s;
        }

        .btn_login_primary:hover {
            background: #162e4f;
        }

        .user_login_avatar {
            height: 150px;
            width: 150px;
            object-fit: cover;
        }

        .login_card {
            background-color: #f4faff;
        }

        .checkbox-animate {
            display: flex;
            justify-content: start;
            align-items: center;
            width: 100%;
            height: auto;
            font-family: arial;
            font-size: 16px;
        }

        .checkbox-animate label {
            position: relative;
            cursor: pointer;
        }

        .checkbox-animate label input {
            opacity: 0;
            position: absolute;
            left: 0;
            top: 0;
            z-index: -1;
        }

        .input-check {
            display: inline-block;
            width: 20px;
            height: 20px;
            border-radius: 4px;
            border: 2px solid #ccc;
            position: relative;
            top: 6px;
            margin-right: 4px;
            transition: 0.4s;
        }

        .input-check::before {
            content: '';
            display: inline-block;
            width: 10px;
            height: 5px;
            border-bottom: 3px solid #fff;
            border-left: 3px solid #fff;
            transform: scale(0) rotate(-45deg);
            position: absolute;
            top: 6px;
            left: 4px;
            transition: 0.4s;
        }

        .checkbox-animate label input:checked~.input-check {
            background-color: var(--primary);
            border-color: var(--primary);
            animation-name: input-animate;
            animation-duration: 0.7s;
        }

        .checkbox-animate label input:checked~.input-check::before {
            transform: scale(1) rotate(-45deg);
            animation-name: input-check;
            animation-duration: 0.2s;
            animation-delay: 0.3s;
        }

        @keyframes input-animate {
            0% {
                transform: scale(1);
            }

            40% {
                transform: scale(1.3, 0.7);
            }

            55% {
                transform: scale(1);
            }

            70% {
                transform: scale(1.2, 0.8);
            }

            80% {
                transform: scale(1);
            }

            90% {
                transform: scale(1.1, 0.9);
            }

            100% {
                transform: scale(1);
            }
        }

        @keyframes input-check {
            0% {
                transform: scale(0) rotate(-45deg);
            }

            100% {
                transform: scale(1) rotate(-45deg);
            }
        }

        .form-floating>label {
            padding: 1.2rem 0.875rem !important;
        }

        .role_wrap {
            max-width: 250px;
            border: 2px solid #ffffff;
            transition: 0.3s
        }

        .role_wrap:hover {
            cursor: pointer;
            border: 2px solid var(--primary);
            scale: 1.04;
        }

        * {
            padding: 0;
            margin: 0;
            font-family: Kanit, sans-serif
        }

        :root {
            --primary: #A8229C;
            --lighter_primary: #ffe1fc;
            --dark_primary: #a01594;
            --primary_em: #5f255a;
            --secondary: #F8B55F;
            --secondary_em: #b97013;
            --navbar-secondary: #F8B55F;
            --dark_secondary: #ffb759;
            --light_secondary: #ffc67c;
            --cta_primary: #F8E7F6;
            --dark_cta_primary: #ffeffd;
            --lightersecondary: #ffe3b9;
            --lightblue: #97bcef;
            --lightprimary: #df3bd1;
            --greyprimary: #0074d9;
            --whiteprimary: #95ceff;
            --white: #ffffff;
            --light: #dbdbdbe0;
            --facebook: #0050ff;
            --instagram: #ff0081;
            --linkedin: #003f91;
            --youtube: #ff1010;
            --twitter: #00aeff
        }

        .text_shadow {
            text-shadow: 1px 1px #0000003d !important
        }

        .fixed_nav {
            background-color: var(--primary);
            box-shadow: 1px 3px 7px 1px #000000ad !important;
            margin: .25rem auto !important;
            border-radius: 50rem !important
        }

        @media (max-width:991px) {
            .fixed_nav {
                margin: 0 auto !important;
                border-radius: 0 !important
            }
        }

        html {
            overflow-x: hidden
        }

        .fixed_width {
            max-width: 1300px !important;
            margin-left: auto !important;
            margin-right: auto !important
        }

        ::-webkit-scrollbar {
            width: 8px
        }

        ::-webkit-scrollbar-thumb {
            border-radius: 10px;
            background-color: var(--secondary)
        }

        #offcanvasTop {
            background-color: var(--primary) !important
        }

        .dropdown_svg_icon {
            fill: #fff
        }

        a.nav-link {
            color: #fff !important;
            font-size: 1rem;
            font-family: Kanit, sans-serif;
            letter-spacing: normal;
            word-spacing: normal;
            -webkit-user-select: none
        }

        a.nav-link:hover {
            border-radius: 5px;
            color: var(--navbar-secondary) !important
        }

        a.nav-link:hover .dropdown_svg_icon {
            fill: var(--navbar-secondary) !important
        }

        .customize_dropdown:hover {
            font-family: Kanit, sans-serif;
            transition: .3s;
            font-size: 1rem;
            font-family: Kanit, sans-serif;
            color: var(--secondary)
        }

        .offcanvas-body .customize_dropdown:hover {
            background-color: #bdbbbb !important
        }

        .offcanvas-body a.nav-link:hover {
            background-color: transparent !important
        }

        .offcanvas-body .customize_dropdown:hover {
            color: #0f67f5 !important
        }

        a.dropdown-item:hover {
            background-color: hsl(0deg 0% 96.85% / 73%) !important;
            border-radius: 5px;
            color: var(--primary) !important
        }

        a.dropdown-item {
            font-size: 1rem;
            color: #353535
        }

        a.dropdown-item:active {
            color: var(--primary) !important
        }

        .btn_explore_customize {
            background: linear-gradient(to right, #8ed1fc, #9900ef)
        }

        a {
            text-decoration: none !important
        }

        .container2 {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            margin: 15px;
            padding: 50px 0;
            gap: 40px 60px
        }

        .content {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            text-align: center;
            padding: 40px;
            gap: 15px
        }

        .content a::before {
            content: '';
            position: absolute;
            top: 8px;
            left: 50%;
            transform: translateX(-50%);
            width: 65%;
            height: 5px;
            border-radius: 5px
        }

        .content p {
            color: #534c4c
        }

        .id {
            background-image: linear-gradient(to right, #8ed1fc, #eac6ff);
            background-size: contain;
            padding: 20px
        }

        .login_content_container {
            min-height: 100vh;
            max-height: auto;
            width: 100%
        }

        @keyframes input-animate {
            0% {
                transform: scale(1)
            }

            40% {
                transform: scale(1.3, .7)
            }

            55% {
                transform: scale(1)
            }

            70% {
                transform: scale(1.2, .8)
            }

            80% {
                transform: scale(1)
            }

            90% {
                transform: scale(1.1, .9)
            }

            100% {
                transform: scale(1)
            }
        }

        @keyframes input-check {
            0% {
                transform: scale(0) rotate(-45deg)
            }

            100% {
                transform: scale(1) rotate(-45deg)
            }
        }

        .login_close_image {
            display: none;
        }

        .login_form_image,
        .login_close_image {
            background: var(--primary) !important;
        }

        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }
    </style>

    <script src="{{ url('Frontend_css/assets/vendor/js/helpers.js') }}"></script>
</head>

<body>

    @include('components.website-preloader')
    <nav class="navbar navbar-expand-lg fixed-top fixed_nav py-1 col-lg-11 col-12 py-2" id="navbar_nav">
        <div class="container-lg cont_wrapper py-1 px-2 px-md-4">
            <a class="m-0 navbar-brand p-0 me-lg-4" href="/">
                <img src="{{ url('storage/' . app(\App\Settings\SiteSettings::class)->logo_path) }}" width="45"
                    height="45" class="img-fluid"
                    alt="{{ url('storage/' . app(\App\Settings\SiteSettings::class)->app_name) }}" />
            </a>
            <div>
                <ul class="navbar-nav m-0 align-items-center d-lg-none d-inline-block">
                    @if (Auth::user() == null)
                        <li class="nav-item mx-1 d-inline-flex">
                            <a role="button" href="/registration"
                                class="border-2 cta_btn p-2 px-3 rounded-2 rounded-pill small">Register</a>
                        </li>
                    @else
                        <li class="nav-item mx-1 d-none">
                            <a role="button" href="/registration"
                                class="border-2 cta_btn p-2 px-3 rounded-2 rounded-pill small">Register</a>
                        </li>
                    @endif
                    @if (Auth::user() == null)
                        <li class="nav-item d-inline-flex">
                            <a role="button" href="/login"
                                class="border-2 secondary_btn p-2 px-3 rounded-2 rounded-pill small">Login</a>
                        </li>
                    @else
                        @if (Auth::user()->hasRole('student'))
                            <li class="nav-item d-inline-flex">
                                <a role="button" href="/dashboard"
                                    class="border-2 secondary_btn p-2 px-3 rounded-2 rounded-pill small @if (Request::is('change-syllabus')) active @endif">Dashboard</a>
                            </li>
                        @elseif(Auth::user()->hasRole('parent'))
                            <li class="nav-item d-inline-flex"><a role="button" href="/change-child"
                                    class="border-2 secondary_btn p-2 px-3 rounded-2 rounded-pill small @if (Request::is('change-child')) active @endif">Dashboard</a>
                            </li>
                        @elseif(Auth::user()->hasRole('instructor'))
                            <li class="nav-item d-inline-flex"><a role="button" href="/instructor/dashboard"
                                    class="border-2 secondary_btn p-2 px-3 rounded-2 rounded-pill small @if (Request::is('instructor/dashboard')) active @endif">Dashboard</a>
                            </li>
                        @elseif(Auth::user()->hasRole('admin'))
                            <li class="nav-item d-inline-flex"><a role="button" href="/admin/dashboard"
                                    class="border-2 d-inline-flex secondary_btn p-2 px-3 rounded-2 rounded-pill small @if (Request::is('admin/dashboard')) active @endif">Dashboard</a>
                            </li>
                        @elseif(Auth::user()->hasRole('teacher'))
                            <li class="nav-item d-inline-flex"><a role="button" href="/change-child"
                                    class="border-2 secondary_btn p-2 px-3 rounded-2 rounded-pill small @if (Request::is('change-child')) active @endif">Dashboard</a>
                            </li>
                        @endif
                    @endif
                </ul>
                <svg class="navbar-toggler border-0 text-white shadow-none px-1 navbar_menu ms-1"
                    xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 24 24"
                    style="fill:#fff" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop"
                    aria-controls="offcanvasTop" aria-label="navbar Navigation">
                    <path d="M4 6h16v2H4zm0 5h16v2H4zm0 5h16v2H4z"></path>
                </svg>
            </div>
            <div class="collapse navbar-collapse align-items-center justify-content-lg-between" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item text-center mx-1"><a aria-label="Home" class="nav-link border-0 px-2"
                            href="/">Home</a></li>
                    <li class="nav-item text-center mx-1"><a aria-label="Explore Pricings"
                            class="nav-link border-0 px-2" href="/pricing">Pricing</a></li>
                    <li class="nav-item text-center mx-1"><a aria-label="About us" class="nav-link border-0 px-2"
                            href="/about">About Us</a></li>
                    <li class="nav-item text-center dropdown mx-1">
                        <button class="nav-link customize_dropdown border-0 px-2 bg-transparent text-white"
                            type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <span>Start Learning</span>
                            <i class="fa fa-chevron-down fa-xs small ms-1 dropdown_toggle_icon"></i>
                        </button>
                        <ul class="border-0 dropdown-menu dropdown-menu-start p-2 rounded-1 shadow-lg navDropdownMenu">
                            @php
                                $loggedIn = Auth::user() != null;
                                $isStudent = $loggedIn && Auth::user()->hasRole('student');
                            @endphp
                            <li><a class="align-items-center d-flex dropdown-item fw-normal p-2"
                                    href="{{ $isStudent ? '/quizzes' : '/login' }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" height="20"
                                        width="20">
                                        <path
                                            d="M20 16V4H8V16H20M22 16C22 17.1 21.1 18 20 18H8C6.9 18 6 17.1 6 16V4C6 2.9 6.9 2 8 2H20C21.1 2 22 2.9 22 4V16M16 20V22H4C2.9 22 2 21.1 2 20V7H4V20H16M14.2 5C13.3 5 12.6 5.2 12.1 5.6C11.6 6 11.3 6.6 11.3 7.4H13.2C13.2 7.1 13.3 6.9 13.5 6.7C13.7 6.6 13.9 6.5 14.2 6.5C14.5 6.5 14.8 6.6 15 6.8C15.2 7 15.3 7.2 15.3 7.6C15.3 7.9 15.2 8.2 15.1 8.4C15 8.6 14.7 8.8 14.5 9C14 9.3 13.6 9.6 13.5 9.9C13.1 10.1 13 10.5 13 11H15C15 10.7 15 10.4 15.1 10.3C15.2 10.1 15.4 9.9 15.6 9.8C16 9.6 16.4 9.3 16.7 8.9C17 8.4 17.2 8 17.2 7.5C17.2 6.7 16.9 6.1 16.4 5.7C15.9 5.2 15.1 5 14.2 5M13 12V14H15V12H13Z" />
                                    </svg>
                                    <span class="ms-2">Quizzes</span>
                                </a></li>
                            <li><a class="align-items-center d-flex dropdown-item fw-normal p-2"
                                    href="{{ $isStudent ? '/learn-practice' : '/login' }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" height="20"
                                        width="20">
                                        <path
                                            d="M12 3L1 9L5 11.18V17.18L12 21L19 17.18V11.18L21 10.09V17H23V9L12 3M18.82 9L12 12.72L5.18 9L12 5.28L18.82 9M17 16L12 18.72L7 16V12.27L12 15L17 12.27V16Z" />
                                    </svg>
                                    <span class="ms-2">Learn and Practise</span>
                                </a></li>
                        </ul>
                    </li>
                    <li class="nav-item text-center dropdown mx-1">
                        <button class="nav-link customize_dropdown border-0 px-2 bg-transparent text-white"
                            type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <span>Explore</span>
                            <i class="fa fa-chevron-down fa-xs small ms-1 dropdown_toggle_icon"></i>
                        </button>
                        <ul class="border-0 dropdown-menu dropdown-menu-start p-2 rounded-1 shadow-lg navDropdownMenu">
                            <li>
                                <a class="align-items-center d-flex dropdown-item fw-normal p-2" href="/blogs">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" height="20"
                                        width="20">
                                        <path
                                            d="M19 5V19H5V5H19M21 3H3V21H21V3M17 17H7V16H17V17M17 15H7V14H17V15M17 12H7V7H17V12Z" />
                                    </svg>
                                    <span class="ms-2">Blogs</span>
                                </a>
                            </li>
                            <li>
                                <a class="align-items-center d-flex dropdown-item fw-normal p-2" href="/explore">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" height="20"
                                        width="20">
                                        <path
                                            d="M14.19,14.19L6,18L9.81,9.81L18,6M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2M12,10.9A1.1,1.1 0 0,0 10.9,12A1.1,1.1 0 0,0 12,13.1A1.1,1.1 0 0,0 13.1,12A1.1,1.1 0 0,0 12,10.9Z" />
                                    </svg>
                                    <span class="ms-2">Explore</span>
                                </a>
                            </li>
                            <li>
                                <a class="align-items-center d-flex dropdown-item fw-normal p-2"
                                    href="{{ route('school_list', ['page' => 1]) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" height="20"
                                        width="20">
                                        <path
                                            d="M21 10H17V8L12.5 6.2V4H15V2H11.5V6.2L7 8V10H3C2.45 10 2 10.45 2 11V22H10V17H14V22H22V11C22 10.45 21.55 10 21 10M8 20H4V17H8V20M8 15H4V12H8V15M12 8C12.55 8 13 8.45 13 9S12.55 10 12 10 11 9.55 11 9 11.45 8 12 8M14 15H10V12H14V15M20 20H16V17H20V20M20 15H16V12H20V15Z" />
                                    </svg>
                                    <span class="ms-2">Schools</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item text-center dropdown mx-1">
                        <button class="nav-link customize_dropdown border-0 px-2 bg-transparent text-white"
                            type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <span>Resources</span>
                            <i class="fa fa-chevron-down fa-xs small ms-1 dropdown_toggle_icon"></i>
                        </button>
                        <ul class="border-0 dropdown-menu dropdown-menu-start p-2 rounded-1 shadow-lg navDropdownMenu">
                            <li>
                                <a class="align-items-center d-flex dropdown-item fw-normal p-2" href="/contact">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" height="20"
                                        width="20">
                                        <path
                                            d="M12,1C7,1 3,5 3,10V17A3,3 0 0,0 6,20H9V12H5V10A7,7 0 0,1 12,3A7,7 0 0,1 19,10V12H15V20H19V21H12V23H18A3,3 0 0,0 21,20V10C21,5 16.97,1 12,1Z" />
                                    </svg>
                                    <span class="ms-2">Contact Us</span>
                                </a>
                            </li>
                            <li>
                                <a class="align-items-center d-flex dropdown-item fw-normal p-2" href="/help">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" height="20"
                                        width="20">
                                        <path
                                            d="M12.3 7.29C12.5 7.11 12.74 7 13 7C13.27 7 13.5 7.11 13.71 7.29C13.9 7.5 14 7.74 14 8C14 8.27 13.9 8.5 13.71 8.71C13.5 8.9 13.27 9 13 9C12.74 9 12.5 8.9 12.3 8.71C12.11 8.5 12 8.27 12 8C12 7.74 12.11 7.5 12.3 7.29M9.8 11.97C9.8 11.97 11.97 10.25 12.76 10.18C13.5 10.12 13.35 10.97 13.28 11.41L13.27 11.47C13.13 12 12.96 12.64 12.79 13.25C12.41 14.64 12.04 16 12.13 16.25C12.23 16.59 12.85 16.16 13.3 15.86C13.36 15.82 13.41 15.78 13.46 15.75C13.46 15.75 13.54 15.67 13.62 15.78C13.64 15.81 13.66 15.84 13.68 15.86C13.77 16 13.82 16.05 13.7 16.13L13.66 16.15C13.44 16.3 12.5 16.96 12.12 17.2C11.71 17.47 10.14 18.37 10.38 16.62C10.59 15.39 10.87 14.33 11.09 13.5C11.5 12 11.68 11.32 10.76 11.91C10.39 12.13 10.17 12.27 10.04 12.36C9.93 12.44 9.92 12.44 9.85 12.31L9.82 12.25L9.77 12.17C9.7 12.07 9.7 12.06 9.8 11.97M22 12C22 17.5 17.5 22 12 22C6.5 22 2 17.5 2 12C2 6.5 6.5 2 12 2C17.5 2 22 6.5 22 12M20 12C20 7.58 16.42 4 12 4C7.58 4 4 7.58 4 12C4 16.42 7.58 20 12 20C16.42 20 20 16.42 20 12Z" />
                                    </svg>
                                    <span class="ms-2">Help & Support</span>
                                </a>
                            </li>
                            <li>
                                <a class="align-items-center d-flex dropdown-item fw-normal p-2" href="/reviews">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" height="20"
                                        width="20">
                                        <path
                                            d="M15,4A4,4 0 0,1 19,8A4,4 0 0,1 15,12A4,4 0 0,1 11,8A4,4 0 0,1 15,4M15,5.9A2.1,2.1 0 0,0 12.9,8A2.1,2.1 0 0,0 15,10.1C16.16,10.1 17.1,9.16 17.1,8C17.1,6.84 16.16,5.9 15,5.9M15,13C17.67,13 23,14.33 23,17V20H7V17C7,14.33 12.33,13 15,13M15,14.9C12,14.9 8.9,16.36 8.9,17V18.1H21.1V17C21.1,16.36 17.97,14.9 15,14.9M5,13.28L2.5,14.77L3.18,11.96L1,10.08L3.87,9.83L5,7.19L6.11,9.83L9,10.08L6.8,11.96L7.45,14.77L5,13.28Z" />
                                    </svg>
                                    <span class="ms-2">Reviews</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <ul class="align-items-center m-0 navbar-nav">
                    <li class="nav-item mx-2 d-lg-flex d-none">
                        <a role="button" href="/registration"
                            class="border-2 secondary_btn p-2 px-4 rounded-2 rounded-pill py-2">Register</a>
                    </li>
                    @if (Auth::user() == null)
                        <li class="nav-item mx-2 d-lg-flex d-none">
                            <a role="button" href="/login"
                                class="border-2 cta_btn p-2 px-4 rounded-2 rounded-pill py-2 text_shadow">Login</a>
                        </li>
                    @else
                        @if (Auth::user()->hasRole('student'))
                            <li class="nav-item mx-2 d-lg-flex d-none">
                                <a role="button" href="/dashboard"
                                    class="border-2 cta_btn p-2 px-4 rounded-2 rounded-pill py-2 text_shadow @if (Request::is('change-syllabus')) active @endif">Dashboard</a>
                            </li>
                        @elseif(Auth::user()->hasRole('parent'))
                            <li class="nav-item mx-2 d-lg-flex d-none">
                                <a role="button" href="/change-child"
                                    class="border-2 cta_btn p-2 px-4 rounded-2 rounded-pill py-2 @if (Request::is('change-child')) active @endif">Dashboard</a>
                            </li>
                        @elseif(Auth::user()->hasRole('instructor'))
                            <li class="nav-item mx-2 d-lg-flex d-none">
                                <a role="button" href="/instructor/dashboard"
                                    class="border-2 cta_btn p-2 px-4 rounded-2 rounded-pill py-2 @if (Request::is('instructor/dashboard')) active @endif">Dashboard</a>
                            </li>
                        @elseif(Auth::user()->hasRole('admin'))
                            <li class="nav-item mx-2 d-lg-flex d-none">
                                <a role="button" href="/admin/dashboard"
                                    class="border-2 d-inline-flex cta_btn p-2 px-4 rounded-2 rounded-pill py-2 @if (Request::is('admin/dashboard')) active @endif">Dashboard</a>
                            </li>
                        @elseif(Auth::user()->hasRole('teacher'))
                            <li class="nav-item mx-2 d-lg-flex d-none">
                                <a role="button" href="/change-child"
                                    class="border-2 cta_btn p-2 px-4 rounded-2 rounded-pill py-2 @if (Request::is('change-child')) active @endif">Dashboard</a>
                            </li>
                        @endif
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <div class="offcanvas offcanvas-top vh-100" data-bs-scroll="true" tabindex="-1" id="offcanvasTop"
        aria-labelledby="offcanvasTopLabel">
        <div class="offcanvas-header customize_sidebar_header">
            <a aria-label="Home" class="text-decoration-none text-dark d-flex align-items-center" href="/">
                <img src="{{ url('storage/' . app(\App\Settings\SiteSettings::class)->logo_path) }}" width="45"
                    height="45" class=""
                    alt="{{ url('storage/' . app(\App\Settings\SiteSettings::class)->app_name) }}">
            </a>
            <button type="button" class="border-0 bg-transparent" data-bs-dismiss="offcanvas" aria-label="Close">
                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 24 24"
                    fill="var(--cta_primary)">
                    <path
                        d="m16.192 6.344-4.243 4.242-4.242-4.242-1.414 1.414L10.535 12l-4.242 4.242 1.414 1.414 4.242-4.242 4.243 4.242 1.414-1.414L13.364 12l4.242-4.242z">
                    </path>
                </svg>
            </button>
        </div>
        <hr>
        <div class="offcanvas-body" style="list-style:none">
            <ul class="list-unstyled m-0">
                <li class="nav-item my-3"><a aria-label="Home" class="nav-link border-0 px-2"
                        href="/">Home</a>
                </li>
                <li class="nav-item my-3"><a aria-label="Explore Pricings" class="nav-link border-0 px-2"
                        href="/pricing">Pricings</a></li>
                <li class="nav-item my-3"><a aria-label="Learn With Us"
                        class="nav-link border-0 px-2 nav_dropdown_btn" data-bs-toggle="collapse" href="#learnWithUs"
                        role="button" aria-expanded="false" aria-controls="learnWithUs">Learn With Us <svg
                            xmlns="http://www.w3.org/2000/svg" class="dropdown_svg_icon" width="16"
                            height="16" viewBox="0 0 24 24">
                            <path d="M16.939 7.939 12 12.879l-4.939-4.94-2.122 2.122L12 17.121l7.061-7.06z"></path>
                        </svg></a>
                    <div class="collapse" id="learnWithUs">
                        <div class="p-2"><a class="nav-link p-2 fw-normal text-white"
                                href="{{ $isStudent ? '/quizzes' : '/login' }}">Quizzes</a> <a
                                class="nav-link p-2 fw-normal text-white"
                                href="{{ $isStudent ? '/learn-practice' : '/login' }}">Learn and Practise</a></div>
                    </div>
                </li>
                <li class="nav-item my-3"><a aria-label="Explore Tutors Eleven Plus"
                        class="nav-link border-0 px-2 nav_dropdown_btn" data-bs-toggle="collapse"
                        href="#exploreTutors" role="button" aria-expanded="false"
                        aria-controls="exploreTutors">Explore Tutors 11+ <svg xmlns="http://www.w3.org/2000/svg"
                            class="dropdown_svg_icon" width="16" height="16" viewBox="0 0 24 24">
                            <path d="M16.939 7.939 12 12.879l-4.939-4.94-2.122 2.122L12 17.121l7.061-7.06z"></path>
                        </svg></a>
                    <div class="collapse" id="exploreTutors">
                        <div class="p-2"><a class="nav-link p-2 fw-normal text-white" href="/blogs">Blogs</a> <a
                                class="nav-link p-2 fw-normal text-white" href="/explore">Explore</a> <a
                                class="nav-link p-2 fw-normal text-white"
                                href="{{ route('school_list', ['page' => 1]) }}">Schools</a></div>
                    </div>
                </li>
                <li class="nav-item my-3"><a aria-label="More For You"
                        class="nav-link border-0 px-2 nav_dropdown_btn" data-bs-toggle="collapse" href="#moreforyou"
                        role="button" aria-expanded="false" aria-controls="moreforyou">More For You <svg
                            xmlns="http://www.w3.org/2000/svg" class="dropdown_svg_icon" width="16"
                            height="16" viewBox="0 0 24 24">
                            <path d="M16.939 7.939 12 12.879l-4.939-4.94-2.122 2.122L12 17.121l7.061-7.06z"></path>
                        </svg></a>
                    <div class="collapse" id="moreforyou">
                        <div class="p-2"><a class="nav-link p-2 fw-normal text-white" href="/about">About Us</a>
                            <a class="nav-link p-2 fw-normal text-white" href="/contact">Contact Us</a> <a
                                class="nav-link p-2 fw-normal text-white" href="/help">Help & Support</a> <a
                                class="nav-link p-2 fw-normal text-white" href="/reviews">Reviews</a></div>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <!-- This form contains some jquery codes, written in the end of the document  -->
    <div class="login_content_container d-flex justify-content-center align-items-center"
        style="background: url('{{ url('images/account_login_bg.jpg') }}') center no-repeat; background-size: cover;">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-10 mx-auto">
                    <div class="card bg-transparent" style='margin: 7rem auto;'>
                        <form method="POST" action="{{ route('user_register') }}"
                            class="card-body login_card p-lg-5 rounded-3">
                            @csrf
                            @method('post')
                            <h1 class="h2 text-center text-dark text-uppercase">Create <span id="createTitle">
                                    @if (count($errors->all()) > 0)
                                        {{ Request::old('role') }}
                                    @endif
                                </span> account</h1>
                            @if (count($errors->all()) > 0)
                                <div id="creation_form">
                                @else
                                    <div id="creation_form" class="d-none">
                            @endif
                            @if (Session::has('error'))
                                <p class="text-danger">{{ Session::get('error') }}</p>
                            @endif
                            @if (Session::has('success'))
                                <p class="text-success">{{ Session::get('success') }}</p>
                            @endif
                            <div class="text-center my-3">
                                <img src="{{ url('images\login_form_imagee.png') }}"
                                    class="img-fluid login_form_image user_login_avatar p-0 img-thumbnail mx-auto rounded-circle"
                                    width="200px" alt="profile">
                                <img src="{{ url('images\logn_form_closedd_eyes.png') }}"
                                    class="img-fluid login_close_image user_login_avatar p-0 img-thumbnail mx-auto rounded-circle"
                                    width="200px" alt="profile">
                            </div>
                            <div class="mb-3">
                                <select class="form-select shadow-sm p-3 text-uppercase text-dark" id="role_select"
                                    aria-label="role_select">
                                    <option value="parent">Parent</option>
                                    <option value="teacher">Teacher</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <div class="form-floating bg-white">
                                    <input type="text" name="first_name"
                                        class="form-control text-dark shadow-sm login_inp" required
                                        id="loginFirstName" placeholder="Enter first name" required
                                        autocomplete="given-name"
                                        value="@if (count($errors->all()) > 0) {{ Request::old('first_name') }} @endif" />
                                    <label for="loginFirstName" class="text-uppercase text-dark"><span
                                            class="position-relative">First Name <span
                                                class="position-absolute text-danger"
                                                style="bottom: 2px;">*</span></span></label>
                                </div>
                                <p class="small my-1 text-danger" id="firstName_error">
                                    @if ($errors->has('first_name'))
                                        {{ $errors->first('first_name') }}
                                    @endif
                                </p>
                            </div>
                            <div class="mb-3">
                                <div class="form-floating bg-white">
                                    <input type="text" name="last_name"
                                        class="form-control text-dark shadow-sm login_inp" required id="loginLastName"
                                        placeholder="Enter last name" required autocomplete="given-name"
                                        value="@if (count($errors->all()) > 0) {{ Request::old('last_name') }} @endif" />
                                    <label for="loginLastName" class="text-uppercase text-dark"><span
                                            class="position-relative">Last Name <span
                                                class="position-absolute text-danger"
                                                style="bottom: 2px;">*</span></span></label>
                                </div>
                                <p class="small my-1 text-danger" id="lastName_error">
                                    @if ($errors->has('last_name'))
                                        {{ $errors->first('last_name') }}
                                    @endif
                                </p>
                            </div>
                            {{-- <div class="mb-3">
                                    <div class="d-flex align-items-center">
                                        <div class="bg-white hstack px-3 border rounded">+44</div>
                                        <div class="form-floating bg-white w-100">
                                            <input type="number" name="mobile" class="form-control text-dark shadow-sm login_inp" required id="loginMobile"
                                                placeholder="Enter Phone Number" required autocomplete="given-name" value="@if (count($errors->all()) > 0){{Request::old('mobile')}}@endif"/>
                                                <label for="loginMobile" class="text-uppercase text-dark"><span class="position-relative">Phone Number <span class="position-absolute text-danger" style="bottom: 2px;">*</span></span></label>
                                        </div>
                                    </div>
                                    <p class="small my-1 text-danger" id="mobile_error">
                                        @if ($errors->has('mobile'))
                                            {{ $errors->first('mobile') }}
                                        @endif
                                    </p>
                                </div> --}}
                            <div class="mb-3">
                                <div class="form-floating bg-white">
                                    <input type="text" name="user_name"
                                        class="form-control text-dark shadow-sm login_inp" required id="loginUserName"
                                        placeholder="Enter username" required autocomplete="off"
                                        value="@if (count($errors->all()) > 0) {{ Request::old('user_name') }} @endif" />
                                    <label for="loginUserName" class="text-uppercase text-dark">
                                        <span class="position-relative">Username <span
                                                class="position-absolute text-danger"
                                                style="bottom: 2px;">*</span></span>
                                    </label>
                                </div>
                                <p class="small my-1 text-danger" id="userName_error">
                                    @if ($errors->has('user_name'))
                                        {{ $errors->first('user_name') }}
                                    @endif
                                </p>
                            </div>
                            <div class="mb-3">
                                <div class="form-floating bg-white">
                                    <input type="text" name="email"
                                        class="form-control text-dark shadow-sm login_inp" required id="loginEmail"
                                        placeholder="Enter email" required autocomplete="given-name"
                                        value="@if (count($errors->all()) > 0) {{ Request::old('email') }} @endif" />
                                    <label for="loginEmail" class="text-uppercase text-dark"><span
                                            class="position-relative">Email <span
                                                class="position-absolute text-danger"
                                                style="bottom: 2px;">*</span></span></label>
                                </div>
                                <p class="small my-1 text-danger" id="email_error">
                                    @if ($errors->has('email'))
                                        {{ $errors->first('email') }}
                                    @endif
                                </p>
                            </div>
                            <div class="mb-3">
                                <div class="form-floating bg-white position-relative  text-dark">
                                    <input type="password" name="password"
                                        class="form-control text-dark shadow-sm login_inp" required id="loginPass"
                                        placeholder="Enter password"
                                        value="@if (count($errors->all()) > 0) {{ Request::old('password') }} @endif" />
                                    <label for="loginPass" class="text-uppercase text-dark"><span
                                            class="position-relative">Password <span
                                                class="position-absolute text-danger"
                                                style="bottom: 2px;">*</span></span></label>
                                    <button type="button" style="opacity: 0.85;"
                                        class="btn btn_showPass d-none shadow-none border-0 position-absolute top-0 end-0 bottom-0">
                                        <i class="bi bi-eye-fill fs-5" id="showPass_icon"></i>
                                    </button>
                                </div>
                                <p class="small my-1 text-danger" id="password_error">
                                    @if ($errors->has('password'))
                                        {{ $errors->first('password') }}
                                    @endif
                                </p>
                            </div>
                            <div class="g-recaptcha mt-2" data-sitekey="6LeOxk8qAAAAACSzzsTTDDgfPp0rQHZAm6iLKFb2">
                            </div>

                            @if ($errors->has('g-recaptcha-response'))
                                <p class="small mt-1 mb-4 text-danger" id="captchaError">
                                    {{ $errors->first('g-recaptcha-response') }}
                                </p>
                            @endif

                            <div class="text-center visually-hidden">
                                <button id="login_button"
                                    class="button primary_btn px-5 mb-2 py-2 w-100 text-uppercase fw-semibold shadow-none"
                                    type="submit">Create an Account</button>
                            </div>
                            <div class="text-center">
                                <button id="check_credentials"
                                    class="primary_btn fs-5 fw-medium mb-2 p-2 shadow-none text-uppercase w-100"
                                    type="button">Create an Account</button>
                            </div>
                            <div id="emailHelp" class="form-text text-center mb-5 text-dark fs-6">Already have an
                                account? <a href="/login" class="text_primary"> Sign in</a></div>
                    </div>
                    @if (count($errors->all()) > 0)
                        <div id="choose_role" class="d-none">
                    @else
                        <div id="choose_role">
                    @endif
                        <h2 class="fw-normal fs-4 text-center text-dark">Choose your role</h4>
                        <input type="hidden" name="role" id="role" value="@if (count($errors->all()) > 0) {{ Request::old('role') }} @endif">
                        <div class="row">
                            <div class="col-sm-6 my-3">
                                <div class="bg-white m-auto text-center py-3 pb-0 px-2 rounded role_wrap shadow-sm"
                                    data-role="parent">
                                    <h2 class="fw-normal mb-0 text-dark fs-5">I'm a parent</h2>
                                    <img width="250" height="auto" class="mt-4"
                                        src="{{ url('images\parent_account.png') }}"
                                        alt="a couple of parent standing together showing love for tutorselevenplus">
                                </div>
                            </div>
                            <div class="col-sm-6 my-3">
                                <div class="bg-white m-auto text-center py-3 pb-0 px-2 rounded role_wrap shadow-sm"
                                    data-role="teacher">
                                    <h2 class="fw-normal mb-0 text-dark fs-5">I'm a teacher</h2>
                                    <img width="250" height="auto" class="mt-4"
                                        src="{{ url('images\teacher_account.png') }}"
                                        alt="an experienced teacher is standing alone showing love for tutorselevenplus">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    </div>

    <!-- Footer -->
    @if (app(\App\Settings\HomepageSettings::class)->enable_footer)
        <footer class="footer_section text-center text-lg-start text-muted">
            <section class="align-items-center border-bottom d-flex fixed_width justify-content-center justify-content-lg-between py-4 p-3">
            <div class="me-5 d-none d-lg-block"><span class="text-white">Get connected with us on social networks:</span></div>
            <div>
                <a target="_blank" href="https://www.facebook.com/tutorselevenplus/" class="footer_bg_facebook footer_icons_link rounded-circle d-inline-flex justify-content-center align-items-center mx-1" aria-label="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
                <a target="_blank" href="https://www.instagram.com/tutorselevenplus/" class="footer_bg_instagram footer_icons_link rounded-circle d-inline-flex justify-content-center align-items-center mx-1" aria-label="Instagram"><i class="fa-brands fa-instagram"></i> </a>
                <a target="_blank" href="https://www.linkedin.com/in/tutors-elevenplus-9a6469298/" class="footer_bg_linkedin footer_icons_link rounded-circle d-inline-flex justify-content-center align-items-center mx-1" aria-label="LinkedIn"><i class="fa-brands fa-linkedin"></i> </a>
                <a target="_blank" href="https://www.youtube.com/@TutorsElevenplus/" class="footer_bg_youtube footer_icons_link rounded-circle d-inline-flex justify-content-center align-items-center mx-1" aria-label="YouTube"><i class="fa-brands fa-youtube"></i> </a>
                <a target="_blank" href="https://twitter.com/tutorelevenplus/" class="footer_bg_twitter footer_icons_link rounded-circle d-inline-flex justify-content-center align-items-center mx-1" aria-label="Twitter">
                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                    <path d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z" />
                </svg>
                </a>
                <a target="_blank" href="https://www.tiktok.com/@tutorselevenplus/" class="footer_icons_link footer_bg_tiktok rounded-circle d-inline-flex justify-content-center align-items-center mx-1" aria-label="TikTok"><i class="fa-brands fa-tiktok"></i></a>
            </div>
            </section>
            <section class="w-100">
            <div class="fixed_width text-center mt-5">
                <div class="row m-0 mt-3">
                    <div class="col-md-12 col-lg-4 col-xl-3 mx-auto mb-4">
                    <div class="d-flex align-items-center justify-content-start my-3">
                        <a class="navbar-brand" href="/">
                        <img src="{{ url('storage/' . app(\App\Settings\SiteSettings::class)->logo_path) }}" width="45" height="45" class="img-fluid" alt="{{ url('storage/' . app(\App\Settings\SiteSettings::class)->app_name) }}">
                        </a>
                        <span class="m-0 ms-2 h4 text-white">{{ app(\App\Settings\SiteSettings::class)->app_name }}</span>
                    </div>
                    <p class="text-white fw-light text-start">TutorsElevenPlus is a ground-breaking online platform that provides a dynamic learning experience for students</p>
                    </div>
                    <div class="col-6 col-lg-2 col-md-6 col-sm-6 col-xl-2 mb-4 mx-auto">
                        <h2 class="fw-medium h5 my-2 text-start text-uppercase text-white">Quick Links</h2>
                        <div class="footer_heading_line mb-4"></div>
                        <ul class="list-unstyled m-0">
                            <li class="footer_list_item my-3"><a href="/">Home</a></li>
                            <li class="footer_list_item my-3"><a href="/blogs">Blogs</a></li>
                            <li class="footer_list_item my-3"><a href="/pricing">pricing plans</a></li>
                            <li class="footer_list_item my-3"><a href="{{ route('school_list', ['page' => 1]) }}">Schools</a></li>
                            <li class="footer_list_item my-3"><a href="/help">Help & Support</a></li>
                            <li class="footer_list_item my-3"><a href="/registration">Create an Account</a></li>
                        </ul>
                    </div>
                    <div class="col-6 col-lg-2 col-md-6 col-sm-6 col-xl-2 mb-4 mx-auto">
                        <h2 class="fw-medium h5 my-2 text-start text-uppercase text-white">Explore</h2>
                        <div class="footer_heading_line mb-4"></div>
                        <ul class="list-unstyled m-0">
                            <li class="footer_list_item my-3"><a href="/explore">Explore</a></li>
                            <li class="footer_list_item my-3"><a href="/reviews">Reviews</a></li>
                            <li class="footer_list_item my-3"><a href="/about">About Us</a></li>
                            <li class="footer_list_item my-3"><a href="/contact">Contact Us</a></li>
                            <li class="footer_list_item my-3"><a href="/cookie-policy">Cookie Policy</a></li>
                            <li class="footer_list_item my-3"><a href="/privacy-policy">Privacy Policy</a></li>
                        </ul>
                    </div>
                    <div class="col-md-6 col-lg-3 col-xl-3 col-sm-12 col-12 mx-auto mb-md-4 mb-4">
                        <div class="footer-widget">
                            <h2 class="fw-medium h5 my-2 text-start text-uppercase text-white">subscribe</h2>
                            <div class="footer_heading_line mb-4"></div>
                            <div class="text-white fw-light text-start mb-3">
                            <p>Don't miss out on our latest blogs, subscribe by completing the form below</p>
                            </div>
                            <div class="subscribe-form-parent">
                            <div class="subscribe-form">
                                <input class="form-control rounded-pill px-3" id="subscribeEmail" placeholder="Enter email to subscribe"> 
                                <button id="submitSubscribebtn" aria-label="Subscribe with Telegram">
                                <i class="fab fa-telegram-plane"></i> 
                                <span class="ms-1 text-white d-none spinner-border spinner-border-sm" aria-hidden="true"></span>
                                </button>
                            </div>
                            <p class="my-1 text-warning fw-light text-start subscribeEmail_error d-none"></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center p-4 text-white fw-normal border-top">&copy; {{ date('Y') }} {{ app(\App\Settings\FooterSettings::class)->copyright_text }} <a href="/" class="text-reset">{{ app(\App\Settings\SiteSettings::class)->app_name }}</a></div>
            </div>
            </section>
        </footer>
        <!-- subscribe  -->
        <button type="button" class="btn btn-primary open_newsletter visually-hidden" data-bs-toggle="modal" data-bs-target="#subscribe_modal">Launch</button>
        <div class="modal fade" id="subscribe_modal" tabindex="-1" aria-labelledby="subscribe_modalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-0 shadow-lg">
                <div class="modal-header d-flex justify-content-end border-0"><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div>
                <div class="modal-body p-4 text-center">
                <img src="{{ url('images/subscribe_email_image.webp') }}" height="auto" width="280" alt="an illustration of boy submitting mails">
                <h2 class="text-center my-2 mb-1">Thanks for Subscribing!</h2>
                <div class="heading_separator mx-auto mb-3 px-1 rounded"></div>
                <p class="fs-5 my-2 fw-light">Stay in the loop! Receive our latest updates and information right in your inbox.</p>
                </div>
            </div>
            </div>
        </div>
    @endif

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.4/TweenMax.min.js" integrity="sha256-S6G5lg9rzC1JCAkx3dQFqP2lefkFxwlNVn0rWCOueXA=" crossorigin="anonymous"></script>
    <script src="{{ url('Frontend_css/assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ url('Frontend_css/assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ url('Frontend_css/assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ url('Frontend_css/assets/vendor/js/menu.js') }}"></script>
    <script src="{{ url('Frontend_css/assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
    <script src="{{ url('Frontend_css/assets/js/main.js') }}"></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"
        integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script>
        $("#submitSubscribebtn").click(function(e) {
            e.preventDefault();
            let email = $("#subscribeEmail").val();
            let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            if (email == '') {
                $(".subscribeEmail_error").removeClass("d-none");
                $(".subscribeEmail_error").text("The email field is required");
            } else if (!emailRegex.test(email)) {
                $(".subscribeEmail_error").removeClass("d-none");
                $(".subscribeEmail_error").text("Invalid email address");
            } else {
                $(".subscribeEmail_error").addClass("d-none");
            }

            if (email && emailRegex.test(email)) {
                $("#submitSubscribebtn").find(".fa-telegram-plane").addClass("d-none");
                $("#submitSubscribebtn").find(".spinner-border").removeClass("d-none");
                $.ajax({
                    dataType: 'json',
                    type: "POST",
                    url: '/add-subscribe',
                    data: {
                        email: email,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        if (data) {
                            $(".open_newsletter").click();
                            $("#submitSubscribebtn").find(".fa-telegram-plane").removeClass("d-none");
                            $("#submitSubscribebtn").find(".spinner-border").addClass("d-none");
                        }
                    },
                    error: function(data, textStatus, errorThrown) {
                        console.log(textStatus);
                    },
                });
            }
        });

        $(document).ready(function() {
            // password keyup 
            $("#loginPass").keyup(function() {
                let userPass = $("#loginPass").val();
                if (userPass.length > 0) {
                    $(".btn_showPass").removeClass("d-none");
                } else {
                    $(".btn_showPass").addClass("d-none");
                }
            });
            // hide show password 
            $(".btn_showPass").click(function() {
                let passwordValue = $("#loginPass").val();
                if ($("#loginPass").prop('type') === 'password') {
                    let newInput = $("<input>", {
                        class: 'form-control text-dark shadow-sm login_inp',
                        type: "text",
                        name: "password",
                        id: "loginPass",
                        value: passwordValue,
                        placeholder: 'Enter password',
                        required: ''
                    });

                    $("#loginPass").replaceWith(newInput);
                    $("#showPass_icon").removeClass("bi-eye-fill").addClass("bi-eye-slash-fill");
                    $(".login_form_image").hide();
                    $(".login_close_image").show();
                } else {
                    let newInput = $("<input>", {
                        class: 'form-control text-dark shadow-sm login_inp',
                        type: "password",
                        name: "password",
                        id: "loginPass",
                        value: passwordValue,
                        placeholder: 'Enter password',
                        required: ''
                    });

                    $("#loginPass").replaceWith(newInput);
                    $("#showPass_icon").removeClass("bi-eye-slash-fill").addClass("bi-eye-fill");
                    $(".login_close_image").hide();
                    $(".login_form_image").show()
                }
            });
        });
        $(".role_wrap").click(function() {
            let role = $(this).data("role");
            $("#role").val(role);
            $("#createTitle").text(role);
            $("#choose_role").addClass("d-none");
            $("#creation_form").removeClass("d-none");
            $("#role_select").val(role);
        });
        $("#role_select").on('change', function() {
            $("#role").val($(this).val());
        });
        // // keyup functions for inputs 
        $("#loginFirstName").keyup(function() {
            const input = $(this).val();
            const regex = /^[a-zA-Z\s]+$/;

            if (input.length > 0 && input.length <= 25) {
                if (!regex.test(input)) {
                    $("#firstName_error").removeClass("d-none");
                    $("#firstName_error").text("Special Characters and numbers are not allowed");
                    $("#loginFirstName").addClass("is-invalid").removeClass("is-valid");
                } else {
                    $("#loginFirstName").removeClass("is-invalid").addClass("is-valid");
                    $("#firstName_error").addClass("d-none");
                }
            } else if (input.length > 25) {
                $("#firstName_error").removeClass("d-none");
                $("#firstName_error").html("First name doesn't exceed 25 characters.");
                $("#loginFirstName").addClass("is-invalid").removeClass("is-valid");
            } else {
                $("#firstName_error").html("The first name field is required.").removeClass("d-none");
                $("#loginFirstName").removeClass("is-valid").addClass("is-invalid");
            }
        });
        $("#loginLastName").keyup(function() {
            const input = $(this).val();
            const regex = /^[a-zA-Z\s]+$/;

            if (input.length > 0 && input.length <= 25) {
                if (!regex.test(input)) {
                    $("#lastName_error").removeClass("d-none");
                    $("#lastName_error").text("Special Characters and numbers are not allowed");
                    $("#loginLastName").addClass("is-invalid").removeClass("is-valid");
                } else {
                    $("#loginLastName").removeClass("is-invalid").addClass("is-valid");
                    $("#lastName_error").addClass("d-none");
                }
            } else if (input.length > 25) {
                $("#lastName_error").removeClass("d-none");
                $("#lastName_error").html("Last name doesn't exceed 25 characters.");
                $("#loginLastName").addClass("is-invalid").removeClass("is-valid");
            } else {
                $("#lastName_error").html("The last name field is required.").removeClass("d-none");
                $("#loginLastName").removeClass("is-valid").addClass("is-invalid");
            }
        });
        // $("#loginMobile").keyup(function () {
        //     const input = $(this).val();

        //     if (input.length > 0) {
        //         $("#loginMobile").removeClass("is-invalid").addClass("is-valid");
        //         $("#mobile_error").addClass("d-none");
        //     } else {
        //         $("#mobile_error").html("The phone number field is required.").removeClass("d-none");
        //         $("#loginMobile").removeClass("is-valid").addClass("is-invalid");
        //     }
        // });
        $("#loginUserName").keyup(function() {
            const input = $(this).val();
            const regex = /^[a-zA-Z0-9]+$/;

            if (input.length >= 3 && input.length <= 25) {
                if (!regex.test(input)) {
                    $("#userName_error").removeClass("d-none");
                    $("#userName_error").text("Special Characters are not allowed");
                    $("#loginUserName").addClass("is-invalid").removeClass("is-valid");
                } else {
                    $("#loginUserName").removeClass("is-invalid").addClass("is-valid");
                    $("#userName_error").addClass("d-none");
                }
            } else if (input.length < 3) {
                $("#userName_error").removeClass("d-none");
                $("#userName_error").html("Username must be at least 3 characters.");
                $("#loginUserName").addClass("is-invalid").removeClass("is-valid");
            } else if (input.length > 25) {
                $("#userName_error").removeClass("d-none");
                $("#userName_error").html("Username doesn't exceed 25 characters.");
                $("#loginUserName").addClass("is-invalid").removeClass("is-valid");
            } else {
                $("#userName_error").html("The username field is required.").removeClass("d-none");
                $("#loginUserName").removeClass("is-valid").addClass("is-invalid");
            }
        });
        $("#loginEmail").keyup(function() {
            const input = $(this).val();
            const rgex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            if (input.length > 0) {
                if (!rgex.test(input)) {
                    $("#email_error").removeClass("d-none");
                    $("#email_error").text("Invalid email address");
                    $("#loginEmail").addClass("is-invalid").removeClass("is-valid");
                } else {
                    $("#loginEmail").removeClass("is-invalid").addClass("is-valid");
                    $("#email_error").addClass("d-none");
                }
            } else {
                $("#email_error").html("The email field is required.").removeClass("d-none");
                $("#loginEmail").removeClass("is-valid").addClass("is-invalid");
            }
        });
        $("#loginPass").keyup(function() {
            const password = $(this).val();
            const passwordLength = password.length;

            // Reset styles and messages
            $("#loginPass").removeClass("border-danger border-success");
            $("#password_error").addClass("d-none");

            // Check password length and provide feedback
            if (passwordLength === 0) {
                $("#loginPass").addClass("border-danger").removeClass("border-success is-valid");
                $("#password_error").removeClass("d-none").text("The password field is required.");
            } else if (passwordLength < 9) {
                // Weak password
                $("#loginPass").addClass("border-danger").removeClass("border-success is-valid");
                $("#password_error").removeClass("d-none").text("Password should be atleast 9 characters long.");
            } else {
                // Strong password
                $("#loginPass").addClass("border-success").removeClass("border-danger is-invalid");
            }
        });
        // check credentials and submit form 
        $("#check_credentials").click(function() {
            const firstName = $("#loginFirstName").val();
            const lastName = $("#loginLastName").val();
            const userName = $("#loginUserName").val();
            const email = $("#loginEmail").val();
            const pass = $("#loginPass").val();
            // const mobile = $("#loginMobile").val();
            const name_regex = /^[a-zA-Z\s]+$/
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            const userNameRegex = /^[a-zA-Z0-9]+$/;
            const password_regex = /^\d+$/;

            if (firstName == "") {
                $("#firstName_error").removeClass("d-none");
                $("#firstName_error").html("The first name field is required.");
                $("#loginFirstName").addClass("is-invalid");
            } else if (!name_regex.test(firstName)) {
                $("#firstName_error").removeClass("d-none");
                $("#firstName_error").html("Special Characters and numbers are not allowed.");
                $("#loginFirstName").addClass("is-invalid");
            } else if (firstName.length > 25) {
                $("#firstName_error").removeClass("d-none");
                $("#firstName_error").html("First name doesn't exceed 25 characters.");
                $("#loginFirstName").addClass("is-invalid");
            } else {
                $("#loginFirstName").removeClass("is-invalid");
                $("#firstName_error").addClass("d-none");
            }

            if (lastName == "") {
                $("#lastName_error").removeClass("d-none");
                $("#lastName_error").html("The last name field is required.");
                $("#loginLastName").addClass("is-invalid");
            } else if (!name_regex.test(lastName)) {
                $("#lastName_error").removeClass("d-none");
                $("#lastName_error").html("Special Characters and numbers are not allowed.");
                $("#loginLastName").addClass("is-invalid");
            } else if (lastName.length > 25) {
                $("#lastName_error").removeClass("d-none");
                $("#lastName_error").html("Last name doesn't exceed 25 characters.");
                $("#loginLastName").addClass("is-invalid");
            } else {
                $("#loginLastName").removeClass("is-invalid");
                $("#lastName_error").addClass("d-none");
            }

            if (userName == "") {
                $("#userName_error").removeClass("d-none");
                $("#userName_error").html("The username field is required.");
                $("#loginUserName").addClass("is-invalid");
            } else if (!userNameRegex.test(userName)) {
                $("#userName_error").removeClass("d-none");
                $("#userName_error").html("Special Characters are not allowed.");
                $("#loginUserName").addClass("is-invalid");
            } else if (userName.length > 25) {
                $("#userName_error").removeClass("d-none");
                $("#userName_error").html("Username doesn't exceed 25 characters.");
                $("#loginUserName").addClass("is-invalid");
            } else {
                $("#loginUserName").removeClass("is-invalid");
                $("#userName_error").addClass("d-none");
            }

            if (email.length > 0) {
                if (!emailRegex.test(email)) {
                    $("#email_error").removeClass("d-none");
                    $("#email_error").text("Invalid email address");
                    $("#loginEmail").addClass("is-invalid").removeClass("is-valid");
                } else {
                    $("#loginEmail").removeClass("is-invalid").addClass("is-valid");
                    $("#email_error").addClass("d-none");
                }
            } else {
                $("#email_error").html("The email field is required.").removeClass("d-none");
                $("#loginEmail").removeClass("is-valid").addClass("is-invalid");
            }

            if (pass == "") {
                $("#password_error").html("The password field is required.").removeClass("d-none");
                $("#loginPass").removeClass("is-valid").addClass("is-invalid");
            } else if (pass.length < 9) {
                $("#loginPass").addClass("border-danger").removeClass("border-success is-valid");
                $("#password_error").removeClass("d-none").text("Password should be atleast 9 characters long.");
            } else {
                $("#loginPass").addClass("border-success").removeClass("border-danger is-invalid");
            }

            // if (mobile == "") {
            //     $("#mobile_error").removeClass("d-none");
            //     $("#mobile_error").html("The phone number field is required.");
            //     $("#loginMobile").addClass("is-invalid");
            // }

            if (
                firstName && name_regex.test(firstName) && firstName.length <= 25 &&
                lastName && name_regex.test(lastName) && lastName.length <= 25 &&
                userName && userNameRegex.test(userName) && userName.length <= 25 &&
                email && emailRegex.test(email) &&
                pass && pass.length >= 9 // && mobile
            ) {
                $("#login_button").click();
            }
        });
    </script>
</body>

</html>
