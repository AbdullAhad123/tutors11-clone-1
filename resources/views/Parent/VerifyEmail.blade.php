<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- rel icon -->
    <link rel="icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}">
    <meta name="description" content="{{ app(\App\Settings\SiteSettings::class)->seo_description }}">
    <meta name="author" content="{{ app(\App\Settings\SiteSettings::class)->app_name }}">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Kanit:wght@200;300;400;500&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Core CSS -->
    <link rel="stylesheet" href="{{url('Frontend_css/assets/vendor/css/core.css')}}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{url('Frontend_css/assets/vendor/css/theme-default.css')}}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" integrity="sha512-ZnR2wlLbSbr8/c9AgLg3jQPAattCUImNsae6NHYnS9KrIwRdcY9DxFotXhNAKIKbAXlRnujIqUWoXXwqyFOeIQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <style>
        * {
            padding: 0;
            margin: 0;
            font-family: Kanit, sans-serif
        }

        :root {
            --primary: #006ae7;
            --secondary: #ff9d0b;
            --navbar-secondary: #ffaa0b;
            --lightersecondary: #ffe3b9;
            --lightblue: #97bcef;
            --lightprimary: #2f9aff;
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

        :root {
            --primary: #006ae7;
            --secondary: #ff9d0b;
            --navbar-secondary: #ffaa0b;
            --lightersecondary: #ffe3b9;
            --lightblue: #97bcef;
            --lightprimary: #2f9aff;
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

        .footer_section {
            background: var(--primary)
        }

        footer a {
            text-decoration: none
        }

        .footer_list_item a {
            color: var(--white);
            transition: .3s;
            text-transform: capitalize
        }

        .footer_list_item a:hover {
            color: var(--secondary)
        }

        .footer_list_item a:hover {
            color: var(--secondary)
        }

        .footer_list_item {
            transition: .3s;
            text-align: left;
        }

        .footer_list_item:hover {
            transform: translateX(2px)
        }

        .footer_bg_facebook {
            height: 35px;
            width: 35px;
            transition: .3s
        }

        .footer_bg_facebook:hover {
            background: #fff !important;
            color: var(--facebook)
        }

        .footer_bg_instagram {
            height: 35px;
            width: 35px;
            transition: .3s
        }

        .footer_bg_instagram:hover {
            background: #fff !important;
            color: var(--instagram)
        }

        .footer_bg_linkedin {
            height: 35px;
            width: 35px;
            transition: .3s
        }

        .footer_bg_linkedin:hover {
            background: #fff !important;
            color: var(--linkedin)
        }

        .footer_bg_youtube {
            height: 35px;
            width: 35px;
            transition: .3s
        }

        .footer_bg_youtube:hover {
            background: #fff !important;
            color: var(--youtube)
        }

        .footer_bg_twitter {
            height: 35px;
            width: 35px
        }

        .footer_bg_twitter svg {
            fill: #fff
        }

        .footer_bg_twitter:hover {
            background: #fff !important
        }

        .footer_bg_twitter:hover.footer_bg_twitter svg {
            fill: #000
        }

        .footer_bg_tiktok {
            height: 35px;
            width: 35px
        }

        .footer_bg_tiktok:hover {
            border: 2px solid #000 !important;
            background: #000 !important;
            color: var(--white);
            text-shadow: 1px 1px 0 #ff003b
        }

        .about_section {
            height: auto;
            width: auto;
            margin: 5rem auto
        }

        a {
            text-decoration: none !important
        }

        .contact_section {
            height: auto;
            width: auto;
            margin: 4rem auto
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

        .footer-section {
            background: var(--primary);
            position: relative
        }

        .footer_icons_link {
            height: 35px;
            width: 35px;
            background: #ffffff00 !important;
            color: #fff;
            border: 2px solid #fff !important
        }

        .footer-content {
            position: relative;
            z-index: 2
        }

        .footer-logo img {
            max-width: 120px
        }

        .footer-text p {
            margin-bottom: 14px;
            font-size: 14px;
            color: #ffffff;
            line-height: 21px
        }

        .facebook-bg {
            background: #3b5998
        }

        .twitter-bg {
            background: #55acee
        }

        .copyright-text p {
            margin: 0;
            font-size: 14px;
            color: #878787
        }

        .copyright-text p a {
            color: #ff5e14
        }

        .twitter-bg {
            background: #eceeee
        }

        .instagram-bg {
            background: linear-gradient(#ffb302, #d400ff)
        }

        .linkedin-bg {
            background: #0a66c2
        }

        .youtube-bg {
            background: #f12626
        }

        .subscribe-form {
            position: relative;
            overflow: hidden;
        }

        .subscribe-form input {
            width: 100%;
            padding: 14px 28px;
            color: hsl(0, 0%, 100%);
            background-color: #fff !important
        }

        .subscribe-form button {
            position: absolute;
            right: 0;
            background: #ff9d0b;
            padding: 14px 18px;
            border: 1px solid #ff9d0b;
            top: 0;
            border-bottom-right-radius: 8px;
            border-top-right-radius: 8px;
        }

        .subscribe-form button i {
            color: #fff;
            font-size: 22px;
            transform: rotate(-6deg);
        }

        .login_form_image,
        .login_close_image {
            background: #2589ff !important;
        }

        .secondary_btn {
            background: var(--secondary);
            color: black;
            box-shadow: 0 8px 11px 0 #00000057;
            transition: 0.25s;
        }

        .verification_container {
            min-height: 500px;
            max-height: fit-content;
            background-color: #ffffff;
            margin: 6rem auto;
        }
        .heading_line {
            height: 0.3rem;
            width: 160px;
            background: var(--secondary);
        }
        .code_input {
            width: 55px;
            height: 65px;
            border: 1px solid #60acff;
            font-size: 2rem;
            outline: none;
            border-radius: 5px;
        }
        #error{
            font-size: 14px;
        }

        @media (max-width: 575px) {
            .code_input {
                width: 45px;
                height: 55px;
            }
        }

        @media (max-width: 400px) {
            .code_input {
                width: 35px;
                height: 40px;
            }
        }
    </style>
    
    <title>Verify Your Email | Tutorselevenplus Parent Portal</title>
    
    <script src="{{ url('Frontend_css/assets/vendor/js/helpers.js') }}"></script>
</head>

<body>
    @include('components.website-preloader')<nav class="navbar navbar-expand-lg fixed-top fixed_nav py-1 col-lg-11 col-12 py-2" id="navbar_nav"><div class="container-fluid col-xl-10 col-lg-12 col-md-12 col-sm-12 col-12 py-1"><a class="m-0 navbar-brand p-0 me-lg-3" href="/"><img src="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->logo_path) }}" width="45" height="45" class="img-fluid" alt="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->app_name) }}"></a><div><ul class="navbar-nav m-0 align-items-center d-lg-none d-inline-block">@if(Auth::user() == null)<li class="nav-item mx-1 d-inline-flex"><a role="button" href="/registration" class="border-2 outlined_secondary_btn p-2 px-3 rounded-2 rounded-pill small">Signup</a></li>@else<li class="nav-item mx-1 d-none"><a role="button" href="/registration" class="border-2 outlined_secondary_btn p-2 px-3 rounded-2 rounded-pill small">Signup</a></li>@endif @if(Auth::user() == null)<li class="nav-item d-inline-flex"><a role="button" href="/login" class="border-2 secondary_btn p-2 px-3 rounded-2 rounded-pill small">Login</a></li>@else @if(Auth::user()->hasRole('student'))<li class="nav-item d-inline-flex"><a role="button" href="/dashboard" class="border-2 secondary_btn p-2 px-3 rounded-2 rounded-pill small @if(Request::is('change-syllabus')) active @endif">Dashboard</a></li>@elseif(Auth::user()->hasRole('parent'))<li class="nav-item d-inline-flex"><a role="button" href="/change-child" class="border-2 secondary_btn p-2 px-3 rounded-2 rounded-pill small @if(Request::is('change-child')) active @endif">Dashboard</a></li>@elseif(Auth::user()->hasRole('instructor'))<li class="nav-item d-inline-flex"><a role="button" href="/instructor/dashboard" class="border-2 secondary_btn p-2 px-3 rounded-2 rounded-pill small @if(Request::is('instructor/dashboard')) active @endif">Dashboard</a></li>@elseif(Auth::user()->hasRole('admin'))<li class="nav-item d-inline-flex"><a role="button" href="/admin/dashboard" class="border-2 d-inline-flex secondary_btn p-2 px-3 rounded-2 rounded-pill small @if(Request::is('admin/dashboard')) active @endif">Dashboard</a></li>@elseif(Auth::user()->hasRole('teacher'))<li class="nav-item d-inline-flex"><a role="button" href="/change-child" class="border-2 secondary_btn p-2 px-3 rounded-2 rounded-pill small @if(Request::is('change-child')) active @endif">Dashboard</a></li>@endif @endif</ul><svg class="navbar-toggler border-0 text-white shadow-none px-1 navbar_menu ms-1" xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 24 24" style="fill:#fff" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop" aria-controls="offcanvasTop" aria-label="navbar Navigation"><path d="M4 6h16v2H4zm0 5h16v2H4zm0 5h16v2H4z"></path></svg></div><div class="collapse navbar-collapse align-items-center justify-content-lg-between" id="navbarNav"><ul class="navbar-nav"><li class="nav-item text-center mx-2"><a aria-label="Home" class="nav-link border-0 px-2" href="/">Home</a></li><li class="nav-item text-center mx-2"><a aria-label="Explore Pricings" class="nav-link border-0 px-2" href="/pricing">Pricings</a></li><li class="nav-item text-center dropdown mx-2"><button class="nav-link customize_dropdown border-0 px-2 bg-transparent text-white" type="button" data-bs-toggle="dropdown" aria-expanded="false"><span>Learn With Us</span> <i class="fa fa-chevron-down fa-xs small ms-1 dropdown_toggle_icon"></i></button><ul class="border-0 dropdown-menu dropdown-menu-start p-2 rounded-1 shadow-lg">@php $loggedIn = Auth::user() != null; $isStudent = $loggedIn && Auth::user()->hasRole('student'); @endphp<li><a class="align-items-baseline d-flex dropdown-item fw-normal p-2" href="{{ $isStudent ? '/quizzes' : '/login' }}"><i class="fa-regular fa-file-lines"></i> <span class="ms-2">Quizzes</span></a></li><li><a class="align-items-baseline d-flex dropdown-item fw-normal p-2" href="{{ $isStudent ? '/learn-practice' : '/login' }}"><i class="fa-solid fa-graduation-cap"></i> <span class="ms-2">Learn and Practice</span></a></li></ul></li><li class="nav-item text-center dropdown mx-2"><button class="nav-link customize_dropdown border-0 px-2 bg-transparent text-white" type="button" data-bs-toggle="dropdown" aria-expanded="false"><span>Explore Hub</span> <i class="fa fa-chevron-down fa-xs small ms-1 dropdown_toggle_icon"></i></button><ul class="border-0 dropdown-menu dropdown-menu-start p-2 rounded-1 shadow-lg"><li><a class="align-items-baseline d-flex dropdown-item fw-normal p-2" href="/blogs"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="black"><path d="M19.875 3H4.125C2.953 3 2 3.897 2 5v14c0 1.103.953 2 2.125 2h15.75C21.047 21 22 20.103 22 19V5c0-1.103-.953-2-2.125-2zm0 16H4.125c-.057 0-.096-.016-.113-.016-.007 0-.011.002-.012.008L3.988 5.046c.007-.01.052-.046.137-.046h15.75c.079.001.122.028.125.008l.012 13.946c-.007.01-.052.046-.137.046z"></path><path d="M6 7h6v6H6zm7 8H6v2h12v-2h-4zm1-4h4v2h-4zm0-4h4v2h-4z"></path></svg> <span class="ms-2">Blogs</span></a></li><li><a class="align-items-baseline d-flex dropdown-item fw-normal p-2" href="/explore"><i class="fa-solid fa-earth-europe"></i> <span class="ms-2">Explore</span></a></li><li><a class="align-items-baseline d-flex dropdown-item fw-normal p-2" href="{{route('school_list' , ['page' => 1])}}"><i class="fa-solid fa-school"></i> <span class="ms-2">Schools</span></a></li></ul></li><li class="nav-item text-center dropdown mx-2"><button class="nav-link customize_dropdown border-0 px-2 bg-transparent text-white" type="button" data-bs-toggle="dropdown" aria-expanded="false"><span>More For You</span> <i class="fa fa-chevron-down fa-xs small ms-1 dropdown_toggle_icon"></i></button><ul class="border-0 dropdown-menu dropdown-menu-start p-2 rounded-1 shadow-lg"><li><a class="align-items-baseline d-flex dropdown-item fw-normal p-2" href="/about"><i class="fa-solid fa-people-group"></i> <span class="ms-2">About Us</span></a></li><li><a class="align-items-baseline d-flex dropdown-item fw-normal p-2" href="/contact"><i class="fa-solid fa-headset"></i> <span class="ms-2">Contact Us</span></a></li><li><a class="align-items-baseline d-flex dropdown-item fw-normal p-2" href="/help"><i class="fa-solid fa-circle-info"></i> <span class="ms-2">Help & Support</span></a></li><li><a class="align-items-baseline d-flex dropdown-item fw-normal p-2" href="/reviews"><i class="fa-solid fa-star text-reset"></i> <span class="ms-2">Reviews</span></a></li></ul></li></ul><ul class="align-items-center m-0 navbar-nav">@if(Auth::user() == null)<li class="nav-item mx-2 d-lg-flex d-none"><a role="button" href="/login" class="border-2 secondary_btn p-2 px-4 rounded-2 rounded-pill py-2 text_shadow">Login</a></li>@else @if(Auth::user()->hasRole('student'))<li class="nav-item mx-2 d-lg-flex d-none"><a role="button" href="/dashboard" class="border-2 secondbtn p-2 px-4 rounded-2 rounded-pill py-2 text_shadow @if(Request::is('change-syllabus')) active @endif">Dashboard</a></li>@elseif(Auth::user()->hasRole('parent'))<li class="nav-item mx-2 d-lg-flex d-none"><a role="button" href="/change-child" class="border-2 secondary_btn p-2 px-4 rounded-2 rounded-pill py-2 @if(Request::is('change-child')) active @endif">Dashboard</a></li>@elseif(Auth::user()->hasRole('instructor'))<li class="nav-item mx-2 d-lg-flex d-none"><a role="button" href="/instructor/dashboard" class="border-2 secondary_btn p-2 px-4 rounded-2 rounded-pill py-2 @if(Request::is('instructor/dashboard')) active @endif">Dashboard</a></li>@elseif(Auth::user()->hasRole('admin'))<li class="nav-item mx-2 d-lg-flex d-none"><a role="button" href="/admin/dashboard" class="border-2 d-inline-flex secondary_btn p-2 px-4 rounded-2 rounded-pill py-2 @if(Request::is('admin/dashboard')) active @endif">Dashboard</a></li>@elseif(Auth::user()->hasRole('teacher'))<li class="nav-item mx-2 d-lg-flex d-none"><a role="button" href="/change-child" class="border-2 secondary_btn p-2 px-4 rounded-2 rounded-pill py-2 @if(Request::is('change-child')) active @endif">Dashboard</a></li>@endif @endif</ul></div></div></nav><div class="offcanvas offcanvas-top vh-100" data-bs-scroll="true" tabindex="-1" id="offcanvasTop" aria-labelledby="offcanvasTopLabel"><div class="offcanvas-header customize_sidebar_header"><a aria-label="Home" class="text-decoration-none text-dark d-flex align-items-center" href="/"><img src="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->logo_path) }}" width="45" height="45" class="" alt="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->app_name) }}"> </a><button type="button" class="border-0 bg-transparent" data-bs-dismiss="offcanvas" aria-label="Close"><svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 24 24" style="stroke:#0f67f5"><path d="m16.192 6.344-4.243 4.242-4.242-4.242-1.414 1.414L10.535 12l-4.242 4.242 1.414 1.414 4.242-4.242 4.243 4.242 1.414-1.414L13.364 12l4.242-4.242z"></path></svg></button></div><hr><div class="offcanvas-body" style="list-style:none"><ul class="list-unstyled m-0"><li class="nav-item my-3"><a aria-label="Home" class="nav-link border-0 px-2" href="/">Home</a></li><li class="nav-item my-3"><a aria-label="Explore Pricings" class="nav-link border-0 px-2" href="/pricing">Pricings</a></li><li class="nav-item my-3"><a aria-label="Learn With Us" class="nav-link border-0 px-2 nav_dropdown_btn" data-bs-toggle="collapse" href="#learnWithUs" role="button" aria-expanded="false" aria-controls="learnWithUs">Learn With Us <svg xmlns="http://www.w3.org/2000/svg" class="dropdown_svg_icon" width="16" height="16" viewBox="0 0 24 24"><path d="M16.939 7.939 12 12.879l-4.939-4.94-2.122 2.122L12 17.121l7.061-7.06z"></path></svg></a><div class="collapse" id="learnWithUs"><div class="p-2"><a class="nav-link p-2 fw-normal text-white" href="{{ $isStudent ? '/quizzes' : '/login' }}">Quizzes</a> <a class="nav-link p-2 fw-normal text-white" href="{{ $isStudent ? '/learn-practice' : '/login' }}">Learn and Practice</a></div></div></li><li class="nav-item my-3"><a aria-label="Explore Tutors Eleven Plus" class="nav-link border-0 px-2 nav_dropdown_btn" data-bs-toggle="collapse" href="#exploreTutors" role="button" aria-expanded="false" aria-controls="exploreTutors">Explore Tutors 11+ <svg xmlns="http://www.w3.org/2000/svg" class="dropdown_svg_icon" width="16" height="16" viewBox="0 0 24 24"><path d="M16.939 7.939 12 12.879l-4.939-4.94-2.122 2.122L12 17.121l7.061-7.06z"></path></svg></a><div class="collapse" id="exploreTutors"><div class="p-2"><a class="nav-link p-2 fw-normal text-white" href="/blogs">Blogs</a> <a class="nav-link p-2 fw-normal text-white" href="/explore">Explore</a> <a class="nav-link p-2 fw-normal text-white" href="{{route('school_list' , ['page' => 1])}}">Schools</a></div></div></li><li class="nav-item my-3"><a aria-label="More For You" class="nav-link border-0 px-2 nav_dropdown_btn" data-bs-toggle="collapse" href="#moreforyou" role="button" aria-expanded="false" aria-controls="moreforyou">More For You <svg xmlns="http://www.w3.org/2000/svg" class="dropdown_svg_icon" width="16" height="16" viewBox="0 0 24 24"><path d="M16.939 7.939 12 12.879l-4.939-4.94-2.122 2.122L12 17.121l7.061-7.06z"></path></svg></a><div class="collapse" id="moreforyou"><div class="p-2"><a class="nav-link p-2 fw-normal text-white" href="/about">About Us</a> <a class="nav-link p-2 fw-normal text-white" href="/contact">Contact Us</a> <a class="nav-link p-2 fw-normal text-white" href="/help">Help & Support</a> <a class="nav-link p-2 fw-normal text-white" href="/reviews">Reviews</a></div></div></li></ul></div></div>

    <div class="login_content_container d-flex justify-content-center align-items-center p-lg-3 p-2" style="background: url('{{url('images/account_login_bg.jpg')}}') center no-repeat; background-size: cover;">
        <div class="verification_container col-lg-6 col-md-8 col-12 p-4 shadow rounded-4 text-center">
            <img src="{{ url('images/subscribe_email_image.png') }}" height="auto" width="160" alt="email verification image">
            <div class="my-4">
                <h1 class="text-center my-2 h2">Verify Your Email</h1>
                <div class="heading_line rounded-5 mx-auto my-2"></div>
            </div>
            <p class="text-center fs-5 my-2 fw-light">We've emailed you a six-digit verification code to your email. Enter the code below to confirm your email.</p>
            <div class="d-flex align-items-center justify-content-center my-3">
                <input type="text" class="code_input fw-light m-sm-2 m-1 text-center" maxlength="1">
                <input type="text" class="code_input fw-light m-sm-2 m-1 text-center" maxlength="1">
                <input type="text" class="code_input fw-light m-sm-2 m-1 text-center" maxlength="1">
                <input type="text" class="code_input fw-light m-sm-2 m-1 text-center" maxlength="1">
                <input type="text" class="code_input fw-light m-sm-2 m-1 text-center" maxlength="1">
                <input type="text" class="code_input fw-light m-sm-2 m-1 text-center" maxlength="1" id="last_code">
            </div>
            <div class="mb-3 mt-4 text-center">
                <p id="error" class="text-danger fw-light mb-1"></p>
                <button id="verify" class="btn btn-primary p-2 px-4 rounded-pill d-inline-flex align-items-center">Verify <i class='bx bx-arrow-back bx-rotate-180 ms-1'></i></button>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer_section text-center text-lg-start text-muted"><section class="align-items-center border-bottom d-flex fixed_width justify-content-center justify-content-lg-between py-4 p-3"><div class="me-5 d-none d-lg-block"><span class="text-white">Get connected with us on social networks:</span></div><div><a target="_blank" href="https://www.facebook.com/tutorselevenplus/" class="footer_bg_facebook footer_icons_link rounded-circle d-inline-flex justify-content-center align-items-center mx-1" aria-label="Facebook"><i class="fa-brands fa-facebook-f"></i> </a><a target="_blank" href="https://www.instagram.com/tutorselevenplus/" class="footer_bg_instagram footer_icons_link rounded-circle d-inline-flex justify-content-center align-items-center mx-1" aria-label="Instagram"><i class="fa-brands fa-instagram"></i> </a><a target="_blank" href="https://www.linkedin.com/in/tutors-elevenplus-9a6469298/" class="footer_bg_linkedin footer_icons_link rounded-circle d-inline-flex justify-content-center align-items-center mx-1" aria-label="LinkedIn"><i class="fa-brands fa-linkedin"></i> </a><a target="_blank" href="https://www.youtube.com/@TutorsElevenplus/" class="footer_bg_youtube footer_icons_link rounded-circle d-inline-flex justify-content-center align-items-center mx-1" aria-label="YouTube"><i class="fa-brands fa-youtube"></i> </a><a target="_blank" href="https://twitter.com/tutorelevenplus/" class="footer_bg_twitter footer_icons_link rounded-circle d-inline-flex justify-content-center align-items-center mx-1" aria-label="Twitter"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><path d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z"/></svg> </a><a target="_blank" href="https://www.tiktok.com/@tutorselevenplus/" class="footer_icons_link footer_bg_tiktok rounded-circle d-inline-flex justify-content-center align-items-center mx-1" aria-label="TikTok"><i class="fa-brands fa-tiktok"></i></a></div></section><section class="w-100"><div class="fixed_width text-center mt-5"><div class="row m-0 mt-3"><div class="col-md-12 col-lg-4 col-xl-3 mx-auto mb-4"><div class="d-flex align-items-center justify-content-start my-3"><a class="navbar-brand" href="/"><img src="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->logo_path) }}" width="45" height="45" class="img-fluid" alt="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->app_name) }}"> </a><span class="m-0 ms-2 h4 text-white">{{app(\App\Settings\SiteSettings::class)->app_name}}</span></div><p class="text-white fw-light text-start">TutorsElevenPlus is a ground-breaking online platform that provides a dynamic learning experience for students</p></div><div class="col-6 col-lg-2 col-md-6 col-sm-6 col-xl-2 mb-4 mx-auto"><h2 class="fw-medium h5 my-2 text-start text-uppercase text-white">Quick Links</h2><div class="footer_heading_line mb-4"></div><ul class="list-unstyled m-0"><li class="footer_list_item my-3"><a href="/">Home</a></li><li class="footer_list_item my-3"><a href="/blogs">Blogs</a></li><li class="footer_list_item my-3"><a href="/pricing">pricing plans</a></li><li class="footer_list_item my-3"><a href="{{route('school_list' , ['page' => 1])}}">Schools</a></li><li class="footer_list_item my-3"><a href="/help">Help & Support</a></li><li class="footer_list_item my-3"><a href="/registration">Create an Account</a></li></ul></div><div class="col-6 col-lg-2 col-md-6 col-sm-6 col-xl-2 mb-4 mx-auto"><h2 class="fw-medium h5 my-2 text-start text-uppercase text-white">Explore</h2><div class="footer_heading_line mb-4"></div><ul class="list-unstyled m-0"><li class="footer_list_item my-3"><a href="/explore">Explore</a></li><li class="footer_list_item my-3"><a href="/reviews">Reviews</a></li><li class="footer_list_item my-3"><a href="/about">About Us</a></li><li class="footer_list_item my-3"><a href="/contact">Contact Us</a></li><li class="footer_list_item my-3"><a href="/cookie-policy">Cookie Policy</a></li><li class="footer_list_item my-3"><a href="/privacy-policy">Privacy Policy</a></li></ul></div><div class="col-md-6 col-lg-3 col-xl-3 col-sm-12 col-12 mx-auto mb-md-4 mb-4"><div class="footer-widget"><h2 class="fw-medium h5 my-2 text-start text-uppercase text-white">subscribe</h2><div class="footer_heading_line mb-4"></div><div class="footer-text mb-3 text-start"><p>Don't miss out on our latest blogs, subscribe by completing the form below</p></div><div class="subscribe-form-parent"><div class="subscribe-form"><input class="form-control text-dark px-3" id="subscribeEmail" placeholder="Enter email to subscribe"> <button id="submitSubscribebtn" aria-label="Subscribe with Telegram"><i class="fab fa-telegram-plane"></i> <span class="ms-1 text-white d-none spinner-border spinner-border-sm" aria-hidden="true"></span></button></div><p class="my-1 text-warning fw-light text-start subscribeEmail_error d-none"></p></div></div></div></div><div class="text-center p-4 text-white fw-normal">&copy; {{ date('Y') }} {{app(\App\Settings\FooterSettings::class)->copyright_text}} <a href="/" class="text-reset">{{ app(\App\Settings\SiteSettings::class)->app_name }}</a></div></div></section></footer>

    <!-- subscribe  -->
    <button type="button" class="btn btn-primary open_newsletter visually-hidden" data-bs-toggle="modal" data-bs-target="#subscribe_modal">Launch</button><div class="modal fade" id="subscribe_modal" tabindex="-1" aria-labelledby="subscribe_modalLabel" aria-hidden="true"><div class="modal-dialog modal-dialog-centered"><div class="modal-content rounded-0 shadow-lg"><div class="modal-header d-flex justify-content-end border-0"><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div><div class="modal-body p-4 text-center"><img src="{{ url('images/subscribe_email_image.png') }}" height="auto" width="280" alt="an illustration of boy submitting mails"><h2 class="text-center my-2 mb-1">Thanks for Subscribing!</h2><div class="heading_separator mx-auto mb-3 px-1 rounded"></div><p class="fs-5 my-2 fw-light">Stay in the loop! Receive our latest updates and information right in your inbox.</p></div></div></div></div>

    <script src="{{ url('Frontend_css/assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ url('Frontend_css/assets/vendor/js/bootstrap.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
                        _token: '{{csrf_token() }}'
                    },
                    success: function(data) {
                        if (data) {
                            $(".open_newsletter").click();
                            $("#submitSubscribebtn").find(".fa-telegram-plane").removeClass("d-none");
                            $("#submitSubscribebtn").find(".spinner-border").addClass("d-none");
                        }},
                    error: function (data, textStatus, errorThrown) {
                        console.log(textStatus);
                    }, 
                });
            }
        });
        $(".code_input").keyup(function(e){
            $("#error").text("");
            const keycode = e.which || e.keyCode;
            if(keycode == 39 && $(this).next().length > 0){
                $(this).next().focus()
            }
            if(keycode == 37 || keycode == 8 && $(this).prev().length > 0){
                $(this).prev().focus()
            }
            if(keycode != 8 && keycode != 37 && keycode != 39){
                $(this).next().focus()
            }
        });
        $("#last_code").keyup(function(e){
            const keycode = e.which || e.keyCode;
            if(keycode == 13){
                $("#verify").click()
            }
        });
        $("#verify").click(function(){
            let code = '';
            $(".code_input").each(function(){
                code += $(this).val();
            });
            $.ajax({
                type: "POST",
                url: "{{route('verify_email_code')}}",
                data: {
                    code: code,
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    if(data.success){
                        window.location.href = "{{route('create_new_child')}}";
                    }
                    else {
                        $("#error").text(data.message);
                    }
                },
                error: function(data, textStatus, errorThrown) {
                    console.log(data);
                },
            });
        });
    </script>
</body>

</html>
