<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="test, tutor 11+, good schooling">
    <title>Eleven Plus Preparation: Expert Guidance - Practise Tests | Ace the 11+ Exam - Tutor&#039;s 11 Plu</title>    
    <meta name="description" content="Discover our expert-led Eleven Plus preparation strategies to excel in your 11+ exam. Access comprehensive study materials, practise tests, and tailored tutoring to ensure your child succeeds. Start the journey to academic excellence today!">
    <meta name="author" content="{{ app(\App\Settings\SiteSettings::class)->app_name }}">
    <link rel="icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}">
    <!-- preload links  -->
    <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" as="style">
    <link rel="preload" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" as="style" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="preload" href="{{url('Frontend_css/style.css')}}" as="style">
    <link rel="preconnect" href="https://googleads.g.doubleclick.net">
    <link rel="preconnect" href="https://td.doubleclick.net">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://www.google-analytics.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- css links  -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Kanit:wght@200;300;400;500&display=swap">
    <link rel="stylesheet" href="{{url('Frontend_css/style.css')}}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    @include('components.google-tags')
    <style>
        .checkout_section {
            height: auto;
            width: auto;
            z-index: 1;
        }
        .fs-13{
            font-size: 13px;
        }
        .payment_method_label,
        .payment_method_input {
            cursor: pointer;
            user-select: none !important;
            -webkit-user-select: none !important;
        }

        .form_label , .order_price {
            font-size: 1.1rem;
            font-weight: normal;
        }

        .font_medium{
            font-size: 1.1rem;
        }

        .font_semibold {
            font-weight: 500;
        }

        .input_card {
            border: 1px solid #00000014;
            box-shadow: 0px 0px 10px 2px #62626211;
        }
        .text_small {
            font-size: 12px;
        }
        .glass_wrap {
            border-radius: 5px;
            background-color: rgba(255, 255, 255, 0.45);
            box-shadow: 0 0 8px 0px rgba(0, 0, 0, 0.15);
            backdrop-filter: blur(15px);
        }
        /* .glass_bck{
            background: red;
            width: 100px;
            height: 100px;
            position: absolute;
        } */
        .circle{
            width: 400px;
            height: 400px;
            background: linear-gradient(to top right, #8ed1fc, #9900ef);
        }
        .square{
            top: -130px;
            left: -65px;
            width: 500px;
            height: 500px;
            background-repeat: no-repeat;
            background-position: center;
            background-size: contain;
            background-image: url('https://portal.tutors11plus.co.uk/storage/site/1692277228.png');
            rotate: y -180deg;
            /* background: linear-gradient(to bottom left, #8ed1fc, #9900ef); */
        }
        .checkout_btn{
            background: linear-gradient(to top right, #9900ef61, #9900ef);
            /* background-color: #e7e7e7 !important; */
        }
        @media screen and (max-width: 500px) {
            .square{
                width: 70%;
            }
            .glass_container{
                padding: 0 !important;
            }
        }

        .progress {
            max-width: 100% !important
        }

        .checkout_wrapper {
            height: auto;
            width: auto;
            margin: 5rem auto;
        }
        .new_child_image {
            height: 180px;
            width: 180px;
            user-select: none;
            -webkit-user-drag: none;
        }

        .newChildForm input::placeholder {
            color: #878787;
        }

        .first_step {
            height: 50px;
            width: 50px;
            position: absolute;
            left: 10%;
            top: -23px;
            background: var(--primary)
        }

        .second_step {
            height: 50px;
            width: 50px;
            position: absolute;
            left: 45%;
            top: -23px;
            background: var(--primary)
        }

        .third_step {
            height: 50px;
            width: 50px;
            position: absolute;
            left: 85%;
            top: -23px;
            background: var(--primary)
        }

        @media (max-width: 768px) {

            .first_step,
            .second_step,
            .third_step {
                height: 40px !important;
                width: 40px !important;
                top: -17px;
            }

            .first_step svg,
            .second_step svg,
            .third_step svg {
                height: 25px !important;
                width: 25px !important;
            }
        }

        @media (max-width: 500px) {
            .third_step {
                left: 80% !important;
            }
        }

        @media (max-width: 350px) {
            .third_step {
                left: 75% !important;
            }
        }
        input[type="number"] {
        -moz-appearance: textfield; /* Firefox */
        }

        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
        }

    </style>
    
</head>

<body>
    <!-- navbar  -->
    <nav class="navbar navbar-expand-lg fixed-top fixed_nav py-1 col-lg-11 col-12 py-2" id="navbar_nav"><div class="container-fluid col-xl-10 col-lg-12 col-md-12 col-sm-12 col-12 py-1"><a class="m-0 navbar-brand p-0 me-lg-3" href="/"><img src="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->logo_path) }}" width="45" height="45" class="img-fluid" alt="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->app_name) }}"></a><div><ul class="navbar-nav m-0 align-items-center d-lg-none d-inline-block">@if(Auth::user() == null)<li class="nav-item mx-1 d-inline-flex"><a role="button" href="/registration" class="border-2 outlined_secondary_btn p-2 px-3 rounded-2 rounded-pill small">Signup</a></li>@else<li class="nav-item mx-1 d-none"><a role="button" href="/registration" class="border-2 outlined_secondary_btn p-2 px-3 rounded-2 rounded-pill small">Signup</a></li>@endif @if(Auth::user() == null)<li class="nav-item d-inline-flex"><a role="button" href="/login" class="border-2 secondary_btn p-2 px-3 rounded-2 rounded-pill small">Login</a></li>@else @if(Auth::user()->hasRole('student'))<li class="nav-item d-inline-flex"><a role="button" href="/dashboard" class="border-2 secondary_btn p-2 px-3 rounded-2 rounded-pill small @if(Request::is('change-syllabus')) active @endif">Dashboard</a></li>@elseif(Auth::user()->hasRole('parent'))<li class="nav-item d-inline-flex"><a role="button" href="/change-child" class="border-2 secondary_btn p-2 px-3 rounded-2 rounded-pill small @if(Request::is('change-child')) active @endif">Dashboard</a></li>@elseif(Auth::user()->hasRole('instructor'))<li class="nav-item d-inline-flex"><a role="button" href="/instructor/dashboard" class="border-2 secondary_btn p-2 px-3 rounded-2 rounded-pill small @if(Request::is('instructor/dashboard')) active @endif">Dashboard</a></li>@elseif(Auth::user()->hasRole('admin'))<li class="nav-item d-inline-flex"><a role="button" href="/admin/dashboard" class="border-2 d-inline-flex secondary_btn p-2 px-3 rounded-2 rounded-pill small @if(Request::is('admin/dashboard')) active @endif">Dashboard</a></li>@elseif(Auth::user()->hasRole('teacher'))<li class="nav-item d-inline-flex"><a role="button" href="/change-child" class="border-2 secondary_btn p-2 px-3 rounded-2 rounded-pill small @if(Request::is('change-child')) active @endif">Dashboard</a></li>@endif @endif</ul><svg class="navbar-toggler border-0 text-white shadow-none px-1 navbar_menu ms-1" xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 24 24" style="fill:#fff" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop" aria-controls="offcanvasTop" aria-label="navbar Navigation"><path d="M4 6h16v2H4zm0 5h16v2H4zm0 5h16v2H4z"></path></svg></div><div class="collapse navbar-collapse align-items-center justify-content-lg-between" id="navbarNav"><ul class="navbar-nav"><li class="nav-item text-center mx-2"><a aria-label="Home" class="nav-link border-0 px-2" href="/">Home</a></li><li class="nav-item text-center mx-2"><a aria-label="Explore Pricings" class="nav-link border-0 px-2" href="/pricing">Pricings</a></li><li class="nav-item text-center dropdown mx-2"><button class="nav-link customize_dropdown border-0 px-2 bg-transparent text-white" type="button" data-bs-toggle="dropdown" aria-expanded="false"><span>Learn With Us</span> <i class="fa fa-chevron-down fa-xs small ms-1 dropdown_toggle_icon"></i></button><ul class="border-0 dropdown-menu dropdown-menu-start p-2 rounded-1 shadow-lg">@php $loggedIn = Auth::user() != null; $isStudent = $loggedIn && Auth::user()->hasRole('student'); @endphp<li><a class="align-items-baseline d-flex dropdown-item fw-normal p-2" href="{{ $isStudent ? '/quizzes' : '/login' }}"><i class="fa-regular fa-file-lines"></i> <span class="ms-2">Quizzes</span></a></li><li><a class="align-items-baseline d-flex dropdown-item fw-normal p-2" href="{{ $isStudent ? '/learn-practice' : '/login' }}"><i class="fa-solid fa-graduation-cap"></i> <span class="ms-2">Learn and Practise</span></a></li></ul></li><li class="nav-item text-center dropdown mx-2"><button class="nav-link customize_dropdown border-0 px-2 bg-transparent text-white" type="button" data-bs-toggle="dropdown" aria-expanded="false"><span>Explore Hub</span> <i class="fa fa-chevron-down fa-xs small ms-1 dropdown_toggle_icon"></i></button><ul class="border-0 dropdown-menu dropdown-menu-start p-2 rounded-1 shadow-lg"><li><a class="align-items-baseline d-flex dropdown-item fw-normal p-2" href="/blogs"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="black"><path d="M19.875 3H4.125C2.953 3 2 3.897 2 5v14c0 1.103.953 2 2.125 2h15.75C21.047 21 22 20.103 22 19V5c0-1.103-.953-2-2.125-2zm0 16H4.125c-.057 0-.096-.016-.113-.016-.007 0-.011.002-.012.008L3.988 5.046c.007-.01.052-.046.137-.046h15.75c.079.001.122.028.125.008l.012 13.946c-.007.01-.052.046-.137.046z"></path><path d="M6 7h6v6H6zm7 8H6v2h12v-2h-4zm1-4h4v2h-4zm0-4h4v2h-4z"></path></svg> <span class="ms-2">Blogs</span></a></li><li><a class="align-items-baseline d-flex dropdown-item fw-normal p-2" href="/explore"><i class="fa-solid fa-earth-europe"></i> <span class="ms-2">Explore</span></a></li><li><a class="align-items-baseline d-flex dropdown-item fw-normal p-2" href="{{route('school_list' , ['page' => 1])}}"><i class="fa-solid fa-school"></i> <span class="ms-2">Schools</span></a></li></ul></li><li class="nav-item text-center dropdown mx-2"><button class="nav-link customize_dropdown border-0 px-2 bg-transparent text-white" type="button" data-bs-toggle="dropdown" aria-expanded="false"><span>More For You</span> <i class="fa fa-chevron-down fa-xs small ms-1 dropdown_toggle_icon"></i></button><ul class="border-0 dropdown-menu dropdown-menu-start p-2 rounded-1 shadow-lg"><li><a class="align-items-baseline d-flex dropdown-item fw-normal p-2" href="/about"><i class="fa-solid fa-people-group"></i> <span class="ms-2">About Us</span></a></li><li><a class="align-items-baseline d-flex dropdown-item fw-normal p-2" href="/contact"><i class="fa-solid fa-headset"></i> <span class="ms-2">Contact Us</span></a></li><li><a class="align-items-baseline d-flex dropdown-item fw-normal p-2" href="/help"><i class="fa-solid fa-circle-info"></i> <span class="ms-2">Help & Support</span></a></li><li><a class="align-items-baseline d-flex dropdown-item fw-normal p-2" href="/reviews"><i class="fa-solid fa-star text-reset"></i> <span class="ms-2">Reviews</span></a></li></ul></li></ul><ul class="align-items-center m-0 navbar-nav"><li class="nav-item mx-2 d-lg-flex d-none"><a role="button" href="/registration" class="border-2 outlined_secondary_btn p-2 px-4 rounded-2 rounded-pill py-2">Signup</a></li>@if(Auth::user() == null)<li class="nav-item mx-2 d-lg-flex d-none"><a role="button" href="/login" class="border-2 secondary_btn p-2 px-4 rounded-2 rounded-pill py-2 text_shadow">Login</a></li>@else @if(Auth::user()->hasRole('student'))<li class="nav-item mx-2 d-lg-flex d-none"><a role="button" href="/dashboard" class="border-2 secondary_btn p-2 px-4 rounded-2 rounded-pill py-2 text_shadow @if(Request::is('change-syllabus')) active @endif">Dashboard</a></li>@elseif(Auth::user()->hasRole('parent'))<li class="nav-item mx-2 d-lg-flex d-none"><a role="button" href="/change-child" class="border-2 secondary_btn p-2 px-4 rounded-2 rounded-pill py-2 @if(Request::is('change-child')) active @endif">Dashboard</a></li>@elseif(Auth::user()->hasRole('instructor'))<li class="nav-item mx-2 d-lg-flex d-none"><a role="button" href="/instructor/dashboard" class="border-2 secondary_btn p-2 px-4 rounded-2 rounded-pill py-2 @if(Request::is('instructor/dashboard')) active @endif">Dashboard</a></li>@elseif(Auth::user()->hasRole('admin'))<li class="nav-item mx-2 d-lg-flex d-none"><a role="button" href="/admin/dashboard" class="border-2 d-inline-flex secondary_btn p-2 px-4 rounded-2 rounded-pill py-2 @if(Request::is('admin/dashboard')) active @endif">Dashboard</a></li>@elseif(Auth::user()->hasRole('teacher'))<li class="nav-item mx-2 d-lg-flex d-none"><a role="button" href="/change-child" class="border-2 secondary_btn p-2 px-4 rounded-2 rounded-pill py-2 @if(Request::is('change-child')) active @endif">Dashboard</a></li>@endif @endif</ul></div></div></nav><div class="offcanvas offcanvas-top vh-100" data-bs-scroll="true" tabindex="-1" id="offcanvasTop" aria-labelledby="offcanvasTopLabel"><div class="offcanvas-header customize_sidebar_header"><a aria-label="Home" class="text-decoration-none text-dark d-flex align-items-center" href="/"><img src="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->logo_path) }}" width="45" height="45" class="" alt="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->app_name) }}"> </a><button type="button" class="border-0 bg-transparent" data-bs-dismiss="offcanvas" aria-label="Close"><svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 24 24" style="stroke:#0f67f5"><path d="m16.192 6.344-4.243 4.242-4.242-4.242-1.414 1.414L10.535 12l-4.242 4.242 1.414 1.414 4.242-4.242 4.243 4.242 1.414-1.414L13.364 12l4.242-4.242z"></path></svg></button></div><hr><div class="offcanvas-body" style="list-style:none"><ul class="list-unstyled m-0"><li class="nav-item my-3"><a aria-label="Home" class="nav-link border-0 px-2" href="/">Home</a></li><li class="nav-item my-3"><a aria-label="Explore Pricings" class="nav-link border-0 px-2" href="/pricing">Pricings</a></li><li class="nav-item my-3"><a aria-label="Learn With Us" class="nav-link border-0 px-2 nav_dropdown_btn" data-bs-toggle="collapse" href="#learnWithUs" role="button" aria-expanded="false" aria-controls="learnWithUs">Learn With Us <svg xmlns="http://www.w3.org/2000/svg" class="dropdown_svg_icon" width="16" height="16" viewBox="0 0 24 24"><path d="M16.939 7.939 12 12.879l-4.939-4.94-2.122 2.122L12 17.121l7.061-7.06z"></path></svg></a><div class="collapse" id="learnWithUs"><div class="p-2"><a class="nav-link p-2 fw-normal text-white" href="{{ $isStudent ? '/quizzes' : '/login' }}">Quizzes</a> <a class="nav-link p-2 fw-normal text-white" href="{{ $isStudent ? '/learn-practice' : '/login' }}">Learn and Practise</a></div></div></li><li class="nav-item my-3"><a aria-label="Explore Tutors Eleven Plus" class="nav-link border-0 px-2 nav_dropdown_btn" data-bs-toggle="collapse" href="#exploreTutors" role="button" aria-expanded="false" aria-controls="exploreTutors">Explore Tutors 11+ <svg xmlns="http://www.w3.org/2000/svg" class="dropdown_svg_icon" width="16" height="16" viewBox="0 0 24 24"><path d="M16.939 7.939 12 12.879l-4.939-4.94-2.122 2.122L12 17.121l7.061-7.06z"></path></svg></a><div class="collapse" id="exploreTutors"><div class="p-2"><a class="nav-link p-2 fw-normal text-white" href="/blogs">Blogs</a> <a class="nav-link p-2 fw-normal text-white" href="/explore">Explore</a> <a class="nav-link p-2 fw-normal text-white" href="{{route('school_list' , ['page' => 1])}}">Schools</a></div></div></li><li class="nav-item my-3"><a aria-label="More For You" class="nav-link border-0 px-2 nav_dropdown_btn" data-bs-toggle="collapse" href="#moreforyou" role="button" aria-expanded="false" aria-controls="moreforyou">More For You <svg xmlns="http://www.w3.org/2000/svg" class="dropdown_svg_icon" width="16" height="16" viewBox="0 0 24 24"><path d="M16.939 7.939 12 12.879l-4.939-4.94-2.122 2.122L12 17.121l7.061-7.06z"></path></svg></a><div class="collapse" id="moreforyou"><div class="p-2"><a class="nav-link p-2 fw-normal text-white" href="/about">About Us</a> <a class="nav-link p-2 fw-normal text-white" href="/contact">Contact Us</a> <a class="nav-link p-2 fw-normal text-white" href="/help">Help & Support</a> <a class="nav-link p-2 fw-normal text-white" href="/reviews">Reviews</a></div></div></li></ul></div></div>

    <section class="checkout_wrapper p-lg-5 p-md-5 p-sm-4 p-3 mb-0">    
        <!-- steps  -->
        <div class="newchild_steps position-relative mb-5">
            <div class="progress m-2" style="height: 0.6rem" role="progressbar" aria-label="Basic example" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                <div class="progress-bar" style="width: 100%; height: 0.6rem; background: var(--primary) !important"></div>
            </div>
            <div class="first_step rounded-circle d-flex justify-content-center align-items-center shadow border" style="background: url({{url('images/create_user.gif')}}) center no-repeat; background-size: contain;"></div>
            <div class="second_step rounded-circle d-flex justify-content-center align-items-center shadow border" style="background: url({{url('images/select_plan.gif')}}) center no-repeat; background-size: contain;"></div>
            <div class="third_step rounded-circle d-flex justify-content-center align-items-center shadow border" style="background: url({{url('images/payment_checkout.gif')}}) center no-repeat; background-size: contain;"></div>
        </div>

        <h1 class="text-dark my-3 text-center display-5 fw-medium">Checkout Details</h1>
        <div id="pageMessage" class="my-4"></div>

        <section class="checkout_section p-3">
            <div class="container position-relative p-0 glass_container">
                <!-- <div class="position-absolute glass_bck top-0 end-0"></div> -->
                <!-- <div class="position-absolute square"></div>
                <div class="position-absolute circle rounded-circle bottom-0 end-0"></div> -->
                <div class="mb-5 glass_wrap">
                    <!-- <div class="my-4">
                        <h2 class="text-start fw-bold">Checkout</h2>
                    </div> -->
                    <div class="row m-0 justify-content-between align-items-baseline">
                        <!-- left hand side --- remove after work  -->
                        <div class="col-lg-6 col-md-12 col-sm-12 col-12" class="billing_details">
                            @if($order['total'] > 0)
                                <div class="p-3">
                                    <h2 class="h5 text-uppercase fw-normal my-2">Payment Method</h2>
                                    <hr>
                                    <div class="form-input">
                                        @foreach($paymentProcessors as $paymentProcessor)
                                            <div class="form-group align-items-center border border-dark-subtle d-flex justify-content-between my-4 p-3 shadow-sm rounded-1">
                                                <div>
                                                    @if($paymentProcessor['default'])
                                                        <input type="radio" name="payment_method" id="{{$paymentProcessor['code']}}_method" class="btn-group btn-close payment_method_input shadow-none" value="{{$paymentProcessor['code']}}" data-name="{{$paymentProcessor['code']}}" checked>
                                                    @else
                                                        <input type="radio" name="payment_method" id="{{$paymentProcessor['code']}}_method" class="btn-group btn-close payment_method_input shadow-none" value="{{$paymentProcessor['code']}}" data-name="{{$paymentProcessor['code']}}">
                                                    @endif
                                                    <label class="payment_method_label" for="{{$paymentProcessor['code']}}_method">
                                                        <span class="mx-2">
                                                            @if($paymentProcessor['code'] == 'bank')
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="24"
                                                                    viewBox="0 0 40 24">
                                                                    <g id="bank" transform="translate(-3633 -1740)">
                                                                        <rect id="Rectangle_7" data-name="Rectangle 7" width="40" height="24"
                                                                            transform="translate(3633 1740)" fill="transparent" />
                                                                        <g id="XMLID_2_" transform="translate(3646.001 1744.999)">
                                                                            <path id="XMLID_4_"
                                                                                d="M.645,5.593H1.29v4.3H2.58v-4.3H4.731v4.3h1.29v-4.3H8.172v4.3h1.29v-4.3h2.151v4.3H12.9v-4.3h.645a.645.645,0,0,0,.358-1.182L7.454.11a.645.645,0,0,0-.716,0L.287,4.411A.645.645,0,0,0,.645,5.593Z"
                                                                                transform="translate(0 0)" fill="#248571" />
                                                                            <path id="XMLID_5_"
                                                                                d="M13.55,260H.646a.645.645,0,0,0-.645.645v1.72a.645.645,0,0,0,.645.645h12.9a.645.645,0,0,0,.645-.645v-1.72A.645.645,0,0,0,13.55,260Z"
                                                                                transform="translate(-0.002 -248.817)" fill="#248571" />
                                                                        </g>
                                                                    </g>
                                                                </svg>
                                                            @elseif($paymentProcessor['code'] == 'razorpay')
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="24"
                                                                    viewBox="0 0 40 24">
                                                                    <g id="razorpay" transform="translate(-3633 -1740)">
                                                                        <rect id="Rectangle_7" data-name="Rectangle 7" width="40" height="24"
                                                                            transform="translate(3633 1740)" fill="#fff" />
                                                                        <g id="razorpay-2" data-name="razorpay"
                                                                            transform="translate(3634 1748)">
                                                                            <path id="Path_5" data-name="Path 5"
                                                                                d="M3.467,9.03,2.46,12.885H0l.5-1.9Z"
                                                                                transform="translate(0 -6.232)" fill="#072654" />
                                                                            <path id="Path_6" data-name="Path 6"
                                                                                d="M20.195,5.08a1.585,1.585,0,0,1,1.212.387,1.137,1.137,0,0,1,.158,1.1,1.886,1.886,0,0,1-.493.868,2.01,2.01,0,0,1-.889.521.6.6,0,0,1,.465.555l.009.068.186,1.577H19.7l-.192-1.7a.372.372,0,0,0-.046-.161.357.357,0,0,0-.115-.121.716.716,0,0,0-.31-.077h-.772l-.539,2.054H16.65L17.982,5.08ZM49.566,6.409,48.2,8.374,46.595,10.7l-.012.012-.359.521-.012.019-.015.025-.31.446H44.819L46.065,9.97,45.5,6.533h1.106l.279,2.24,1.351-1.918.019-.028.022-.031.022-.028.167-.356h1.1Zm-9.444.273a1.14,1.14,0,0,1,.384.679,2.219,2.219,0,0,1-.065,1,2.956,2.956,0,0,1-.452.988,2.215,2.215,0,0,1-.728.66,1.836,1.836,0,0,1-.883.226,1.137,1.137,0,0,1-.626-.158.763.763,0,0,1-.319-.378l-.019-.062-.548,2.092H35.8L36.89,7.574l.006-.019,0-.019.266-1.007H38.2l-.177.583,0,.025a1.56,1.56,0,0,1,.592-.508,1.627,1.627,0,0,1,.759-.186,1.123,1.123,0,0,1,.747.239Zm-1.283.576a.934.934,0,0,0-.366.068.981.981,0,0,0-.31.2,1.642,1.642,0,0,0-.421.787,1.1,1.1,0,0,0,.006.784.544.544,0,0,0,.533.273.938.938,0,0,0,.675-.266,1.629,1.629,0,0,0,.412-.772,1.16,1.16,0,0,0-.009-.8.525.525,0,0,0-.521-.282ZM43.611,6.6a.794.794,0,0,1,.316.381l.022.059.136-.514h1.041l-.954,3.625H43.127l.139-.536A1.67,1.67,0,0,1,42,10.208a1.2,1.2,0,0,1-.768-.229,1.057,1.057,0,0,1-.384-.654,2.15,2.15,0,0,1,.059-.982,3.037,3.037,0,0,1,.462-.995,2.329,2.329,0,0,1,.737-.675,1.75,1.75,0,0,1,.877-.239,1.106,1.106,0,0,1,.626.167Zm-.539.666a.933.933,0,0,0-.369.074.978.978,0,0,0-.313.211,1.678,1.678,0,0,0-.421.79,1.069,1.069,0,0,0,.012.772.552.552,0,0,0,.542.27.934.934,0,0,0,.366-.068.947.947,0,0,0,.31-.2,1.673,1.673,0,0,0,.39-.688l.025-.1a1.068,1.068,0,0,0-.009-.784.547.547,0,0,0-.533-.276ZM36.63,6.49l.068.028-.266.988a1.038,1.038,0,0,0-.486-.121,1.076,1.076,0,0,0-.7.232,1.2,1.2,0,0,0-.366.564l-.022.084-.5,1.893H33.3l.961-3.625H35.3l-.136.533a1.55,1.55,0,0,1,.486-.434,1.377,1.377,0,0,1,.688-.183.707.707,0,0,1,.288.04Zm-3.914.174a1.073,1.073,0,0,1,.471.657,1.913,1.913,0,0,1-.034,1,2.636,2.636,0,0,1-.49,1,2.274,2.274,0,0,1-.818.657,2.4,2.4,0,0,1-1.038.226,1.722,1.722,0,0,1-.93-.226,1.082,1.082,0,0,1-.477-.657,1.98,1.98,0,0,1,.034-1,2.682,2.682,0,0,1,.49-1,2.3,2.3,0,0,1,.824-.657,2.411,2.411,0,0,1,1.05-.226,1.676,1.676,0,0,1,.917.226Zm-1.134.592a.964.964,0,0,0-.675.266,1.622,1.622,0,0,0-.421.8q-.279,1.064.539,1.063a.926.926,0,0,0,.666-.263,1.652,1.652,0,0,0,.415-.8,1.149,1.149,0,0,0,0-.8.526.526,0,0,0-.527-.266ZM29.429,6.53l-.186.719L26.9,9.316h1.878l-.223.846H25.45l.2-.747,2.3-2.036H26.2l.223-.846h3.009ZM24.183,6.6a.794.794,0,0,1,.316.381l.022.059.136-.514H25.7l-.951,3.625H23.705l.139-.536a1.683,1.683,0,0,1-.573.437,1.664,1.664,0,0,1-.7.155,1.19,1.19,0,0,1-.759-.229,1.057,1.057,0,0,1-.384-.654,2.15,2.15,0,0,1,.059-.982,2.975,2.975,0,0,1,.462-.995,2.352,2.352,0,0,1,.734-.675,1.747,1.747,0,0,1,.877-.235,1.129,1.129,0,0,1,.626.164Zm-.536.666a.945.945,0,0,0-.369.074.978.978,0,0,0-.313.211,1.651,1.651,0,0,0-.421.79,1.085,1.085,0,0,0,.012.772.552.552,0,0,0,.542.27.934.934,0,0,0,.366-.068.947.947,0,0,0,.31-.2,1.62,1.62,0,0,0,.39-.688l.025-.1a1.138,1.138,0,0,0-.009-.784.55.55,0,0,0-.533-.276ZM19.811,5.926h-.995l-.35,1.326h.995a1.357,1.357,0,0,0,.728-.161.809.809,0,0,0,.35-.505.471.471,0,0,0-.084-.5,1,1,0,0,0-.645-.158Z"
                                                                                transform="translate(-11.491 -3.506)" fill="#072654" />
                                                                            <path id="Path_7" data-name="Path 7"
                                                                                d="M10.436,0,8.688,6.653h-1.2L8.67,2.147,6.86,3.34l.322-1.187Z"
                                                                                transform="translate(-4.734)" fill="#3395ff" />
                                                                        </g>
                                                                    </g>
                                                                </svg>
                                                            @elseif($paymentProcessor['code'] == 'stripe')
                                                                <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 48 48" width="40" height="24"><linearGradient id="PYSOqyBwdc8Fg7jFp5VlLa" x1="20.375" x2="28.748" y1="-165.061" y2="-194.946" gradientTransform="matrix(1 0 0 -1 0 -154)" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#00b3ee"/><stop offset="1" stop-color="#0082d8"/></linearGradient><path fill="url(#PYSOqyBwdc8Fg7jFp5VlLa)" d="M43.125,9H4.875C3.287,9,2,10.287,2,11.875v24.25C2,37.713,3.287,39,4.875,39h38.25	C44.713,39,46,37.713,46,36.125v-24.25C46,10.287,44.713,9,43.125,9z"/><path d="M41.894,25.003c0.054-0.238,0.06-0.826,0.06-1.068c0-1.443-0.33-2.615-0.991-3.497	C40.234,19.497,39.145,19,37.813,19c-1.523,0-2.739,0.642-3.503,1.759c-0.117-0.243-0.252-0.464-0.406-0.661	c-0.624-0.812-1.536-1.241-2.636-1.241c-0.427,0-0.836,0.078-1.226,0.233l-0.015-0.082h-3.213c0.173-0.324,0.271-0.695,0.271-1.088	c0-1.279-1.032-2.32-2.3-2.32c-1.281,0-2.323,1.041-2.323,2.32c0,0.354,0.081,0.69,0.224,0.99c-0.366-0.031-0.701,0.01-1.013,0.1	h-2.504l0-0.003h-1.781v-2.426l-4.001,0.666l-0.308,1.89l-0.751,0.123l-0.024,0.15C11.716,19.192,10.919,19,9.94,19	c-1.071,0-1.989,0.296-2.642,0.843c-0.769,0.619-1.174,1.506-1.174,2.564c0,0.668,0.152,1.203,0.406,1.637l-0.583,3.831l0.604,0.339	C7.201,28.576,8.437,29,9.788,29c1.13,0,2.077-0.289,2.707-0.811c0.271-0.205,0.565-0.499,0.8-0.909	c0.18,0.387,0.43,0.714,0.75,0.978c0.601,0.479,1.407,0.711,2.465,0.711c0.488,0,0.86-0.053,1.142-0.112V29h4.482v-5.739	c0.088-0.019,0.218-0.029,0.393-0.03V29H26v3.182l4.476-0.751l0.015-2.463c0.046,0.001,0.093,0.002,0.138,0.002	c0.833,0,2.026-0.217,2.973-1.251c0.193-0.211,0.365-0.446,0.514-0.705c0.181,0.305,0.396,0.576,0.646,0.813	C35.568,28.605,36.686,29,38.085,29c1.229,0,2.389-0.299,3.181-0.819l0.54-0.355l-0.324-2.041h0.236L41.894,25.003z M17.652,22.851	v1.978l-0.139,0.042c-0.029,0.009-0.075,0.02-0.127,0.03v-2.05H17.652z M12.947,23.321c-0.003-0.003-0.005-0.006-0.008-0.009	l0.008-0.049V23.321z" opacity=".05"/><path d="M40.567,20.743c-0.63-0.813-1.583-1.243-2.754-1.243c-1.749,0-3.04,0.969-3.595,2.583	c-0.138-0.688-0.375-1.25-0.709-1.68c-0.533-0.694-1.287-1.047-2.241-1.047c-0.577,0-1.105,0.161-1.598,0.488l-0.061-0.337H26.5	h-0.847c0.555-0.31,0.931-0.905,0.931-1.588c0-1.004-0.808-1.82-1.8-1.82c-1.005,0-1.823,0.816-1.823,1.82	c0,0.683,0.381,1.278,0.943,1.588h-0.71l-0.151-0.034c-0.224-0.05-0.409-0.073-0.581-0.073c-0.445,0-0.849,0.118-1.18,0.334	l-0.037-0.225h-2.669l0-0.003h-1.69v-2.335l-3.065,0.51l-0.309,1.89l-0.75,0.124l-0.069,0.429L12.6,20.078	c-0.447-0.216-1.386-0.578-2.66-0.578c-0.952,0-1.759,0.255-2.328,0.731c-0.646,0.521-0.988,1.273-0.988,2.176	c0,1.733,1.2,2.404,2.497,2.872c0.649,0.233,0.792,0.358,0.839,0.358c0.007,0,0.127,0.054-0.311,0.054	c-0.532,0-1.465-0.286-2.079-0.637l-0.633-0.362l-0.443,2.916l0.302,0.169C7.392,28.11,8.533,28.5,9.788,28.5	c1.013,0,1.85-0.249,2.405-0.708c0.691-0.525,1.041-1.3,1.041-2.302c0.002-1.768-1.215-2.443-2.532-2.91	c-0.324-0.122-0.522-0.211-0.64-0.267c0.526,0.001,1.196,0.184,1.792,0.489l0.61,0.312l0.125-0.759h0.858v3.121	c0,1.087,0.303,1.889,0.909,2.39c0.516,0.41,1.201,0.602,2.154,0.602c0.722,0,1.167-0.127,1.434-0.203l0.208-0.059V28.5h3.482	v-5.549c0.149-0.124,0.387-0.221,0.862-0.221c0.104-0.001,0.216-0.001,0.369,0.021l0.162,0.022V28.5H26.5v3.091l3.479-0.583	l0.016-2.592c0.217,0.035,0.431,0.054,0.635,0.054c0.733,0,1.78-0.188,2.604-1.089c0.4-0.438,0.695-0.997,0.882-1.675	c0.192,0.727,0.524,1.316,0.993,1.762c0.71,0.685,1.712,1.032,2.977,1.032c1.134,0,2.194-0.269,2.907-0.737l0.27-0.178l-0.365-2.301	h0.422l0.087-0.391c0.047-0.208,0.047-0.929,0.047-0.959C41.453,22.603,41.157,21.53,40.567,20.743z M18.152,25.197l-0.492,0.151	c-0.103,0.031-0.397,0.093-0.569,0.093c-0.118,0-0.154-0.023-0.154-0.023c0-0.001-0.051-0.062-0.051-0.302v-2.766h0.794v-0.454	l0.472,0.039V25.197z M30.881,23.776c0.003,0.817-0.139,1.273-0.261,1.515c-0.171,0.285-0.4,0.344-0.622,0.31v-3.135	c0.253-0.206,0.433-0.209,0.442-0.209C30.765,22.257,30.881,23.041,30.881,23.776z M38.354,25.668c-0.337,0-0.572-0.061-0.723-0.19	c-0.057-0.048-0.106-0.112-0.146-0.193h2.598C39.566,25.539,38.985,25.668,38.354,25.668z M37.405,22.777	c0.072-0.407,0.195-0.613,0.368-0.613c0.192,0,0.289,0.309,0.338,0.613H37.405z" opacity=".07"/><path fill="#fff" d="M36.847,23.277c0.069-1.101,0.354-1.613,0.926-1.613c0.548,0,0.848,0.527,0.886,1.613H36.847z M40.953,23.935c0-1.23-0.27-2.203-0.781-2.885c-0.54-0.697-1.346-1.05-2.359-1.05c-2.088,0-3.396,1.546-3.396,4.022	c0,1.384,0.345,2.427,1.038,3.085C36.072,27.702,36.958,28,38.085,28c1.047,0,2.017-0.251,2.632-0.655l-0.268-1.688	c-0.607,0.331-1.31,0.511-2.095,0.511c-0.47,0-0.806-0.103-1.044-0.308c-0.262-0.219-0.408-0.572-0.46-1.076h4.068	C40.944,24.669,40.953,24.106,40.953,23.935z M31.057,25.533c-0.221,0.377-0.531,0.58-0.89,0.58c-0.241,0-0.472-0.053-0.669-0.147	v-3.718c0.428-0.441,0.814-0.491,0.942-0.491c0.631,0,0.941,0.681,0.941,2.017C31.384,24.534,31.269,25.126,31.057,25.533z M33.113,20.709c-0.438-0.571-1.059-0.853-1.845-0.853c-0.712,0-1.343,0.302-1.934,0.936l-0.142-0.784H27V31l2.481-0.416	l0.017-2.799c0.387,0.121,0.779,0.185,1.131,0.185c0.627,0,1.53-0.157,2.235-0.926c0.667-0.73,0.996-1.862,0.996-3.361	C33.86,22.358,33.615,21.353,33.113,20.709z M23.527,20.008H26V28h-2.473V20.008z M24.784,19.233c0.718,0,1.3-0.594,1.3-1.313	c0-0.733-0.584-1.32-1.3-1.32c-0.738,0-1.323,0.587-1.323,1.32C23.461,18.64,24.046,19.233,24.784,19.233z M22.463,19.9	c-0.705,0-1.279,0.372-1.491,1.031l-0.15-0.921h-2.17V28h2.482v-5.25c0.312-0.382,0.749-0.52,1.362-0.52	c0.127,0,0.256,0,0.438,0.026v-2.294C22.751,19.921,22.6,19.9,22.463,19.9z M17.68,21.855l0.308-1.848h-1.601v-2.245l-2.129,0.354	l-0.309,1.891L13.2,20.13l-0.277,1.726h1.024v3.622c0,0.941,0.238,1.599,0.72,1.998c0.421,0.335,1.011,0.493,1.843,0.493	c0.654,0,1.043-0.112,1.297-0.184v-1.959c-0.133,0.041-0.48,0.115-0.716,0.115c-0.48,0-0.705-0.25-0.705-0.825v-3.265h1.294	C17.68,21.851,17.68,21.855,17.68,21.855z M10.531,23.05c-0.707-0.265-1.118-0.473-1.118-0.803c0-0.275,0.229-0.434,0.646-0.434	c0.737,0,1.509,0.281,2.023,0.544l0.3-1.829C11.964,20.326,11.113,20,9.94,20c-0.84,0-1.535,0.22-2.014,0.621	c-0.532,0.429-0.802,1.043-0.802,1.786c0,1.347,0.824,1.918,2.166,2.402c0.857,0.308,1.154,0.527,1.154,0.868	c0,0.322-0.274,0.514-0.795,0.514c-0.624,0-1.641-0.31-2.327-0.703L7.04,27.341C7.616,27.663,8.676,28,9.788,28	c0.887,0,1.622-0.21,2.102-0.606c0.568-0.432,0.844-1.077,0.844-1.905C12.736,24.106,11.891,23.531,10.531,23.05L10.531,23.05z"/></svg>
                                                            @elseif($paymentProcessor['code'] == 'paypal')
                                                                <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 48 48" width="40" height="24"><path fill="#0d62ab" d="M18.7,13.767l0.005,0.002C18.809,13.326,19.187,13,19.66,13h13.472c0.017,0,0.034-0.007,0.051-0.006	C32.896,8.215,28.887,6,25.35,6H11.878c-0.474,0-0.852,0.335-0.955,0.777l-0.005-0.002L5.029,33.813l0.013,0.001	c-0.014,0.064-0.039,0.125-0.039,0.194c0,0.553,0.447,0.991,1,0.991h8.071L18.7,13.767z"/><path fill="#199be2" d="M33.183,12.994c0.053,0.876-0.005,1.829-0.229,2.882c-1.281,5.995-5.912,9.115-11.635,9.115	c0,0-3.47,0-4.313,0c-0.521,0-0.767,0.306-0.88,0.54l-1.74,8.049l-0.305,1.429h-0.006l-1.263,5.796l0.013,0.001	c-0.014,0.064-0.039,0.125-0.039,0.194c0,0.553,0.447,1,1,1h7.333l0.013-0.01c0.472-0.007,0.847-0.344,0.945-0.788l0.018-0.015	l1.812-8.416c0,0,0.126-0.803,0.97-0.803s4.178,0,4.178,0c5.723,0,10.401-3.106,11.683-9.102	C42.18,16.106,37.358,13.019,33.183,12.994z"/><path fill="#006fc4" d="M19.66,13c-0.474,0-0.852,0.326-0.955,0.769L18.7,13.767l-2.575,11.765	c0.113-0.234,0.359-0.54,0.88-0.54c0.844,0,4.235,0,4.235,0c5.723,0,10.432-3.12,11.713-9.115c0.225-1.053,0.282-2.006,0.229-2.882	C33.166,12.993,33.148,13,33.132,13H19.66z"/></svg>
                                                            @endif
                                                        </span>
                                                        <span class="fw-normal" style="font-size: 1.1rem;">{{$paymentProcessor['name']}}</span>
                                                    </label>
                                                </div>
                                                <div>
                                                    <p class="m-0 small">{{$paymentProcessor['description']}}</p>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                            <div class="p-4">
                                <h2 class="h5 text-uppercase fw-normal my-2">Billing Information</h2>
                                <hr>
                                <div class="form-input mt-3">
                                    <div class="form-group my-2">
                                        <label for="fullname" class="form_label" data-name="name" id="reviewfullname">Full Name</label>
                                        <input type="text" name="fullname" id="fullname" class="border form-control fw-light my-2 p-3 shadow-sm"
                                            placeholder="Your full name..." value="@if(isset($billing_information['full_name'])){{$billing_information['full_name']}}@endif">
                                        <span class="text-danger text_small fullname_error"></span>
                                    </div>

                                    <div class="my-2">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                <div class="form-group">
                                                    <label for="email" class="form-label my-1" id="reviewemail">Email</label>
                                                    <input type="email" name="email" id="email"
                                                        class="border form-control fw-light my-2 p-3 shadow-sm"
                                                        value="@if(isset($billing_information['email'])){{$billing_information['email']}}@endif"
                                                        placeholder="example@gmail.com" autocomplete="on">
                                                    <span class="text-danger text_small email_error"></span>    
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                <div class="form-group">
                                                    <label for="phone" class="form-label my-1" id="reviewphone">Phone</label>
                                                    <!-- <input type="number" name="phone" id="phone"
                                                        class="border form-control fw-light my-2 p-3 shadow-sm"
                                                        value="@if(isset($billing_information['phone'])){{$billing_information['phone']}}@endif"
                                                        placeholder="+1xxx-xxx-xxxx" autocomplete="on"> -->
                                                        <div class="input-group my-2 shadow-sm rounded">
                                                            <select class="input-group-text bg-transparent text-dark" id="callingcodes">
                                                                <option class="text-dark text-start"value="+44">+44</option>
                                                            </select>
                                                            <input type="tel" name="phone" maxlength="10" id="phone" class="form-control fw-light p-3 shadow-none" value="@if(isset($billing_information['phone'])){{$billing_information['phone']}}@endif" placeholder="XXX XXXXXXX" autocomplete="on">
                                                        </div>
                                                    <span class="text-danger text_small phone_error"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group my-2">
                                        <label for="address" class="form-label my-1">Address</label>
                                        <input type="text" name="address" id="address" class="border form-control fw-light my-2 p-3 shadow-sm"
                                            value="@if(isset($billing_information['address'])){{$billing_information['address']}}@endif"
                                            placeholder="123 Main Street, London, UK" autocomplete="on">
                                        <span class="text-danger text_small address_error"></span>
                                    </div>

                                    <div class="form-group my-2">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                <div class="form-group">
                                                    <label for="city" class="form-label my-1" id="reviewcity">City</label>
                                                    <input type="text" name="city" id="city"
                                                        class="border form-control fw-light my-2 p-3 shadow-sm"
                                                        value="@if(isset($billing_information['city'])){{$billing_information['city']}}@endif"
                                                        placeholder="Your city name">
                                                    <span class="text-danger text_small city_error"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                <div class="form-group">
                                                    <label for="state" class="form-label my-1" id="reviewstate">County</label>
                                                    <input type="text" name="state" id="state"
                                                        value="@if(isset($billing_information['state'])){{$billing_information['state']}}@endif"
                                                        class="border form-control fw-light my-2 p-3 shadow-sm"
                                                        placeholder="i.e: London">
                                                    <span class="text-danger text_small state_error"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                <div class="form-group my-2">
                                                    <label for="select_country" class="form-label my-1">Country</label>
                                                    <select name="select_country" id="select_country" class="border form-select fw-light my-2 p-3 shadow-sm">
                                                    @foreach($countries as $country)
                                                        @if(isset($billing_information['country']) && $country['code'] == $billing_information['country'])
                                                            <option value="{{$country['code']}}" selected>{{$country['name']}}</option>
                                                        @else
                                                            <option value="{{$country['code']}}">{{$country['name']}}</option>
                                                        @endif
                                                    @endforeach    
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                <div class="form-group my-2">
                                                    <label for="post_code" class="form-label my-1" id="reviewpostal">Postal Code</label>
                                                    <input type="text" id="post_code"
                                                        value="@if(isset($billing_information['zip'])){{$billing_information['zip']}}@endif"
                                                        class="border form-control fw-light my-2 p-3 shadow-sm"
                                                        placeholder="AB1 2CD" style="text-transform: uppercase">
                                                    <span class="text-danger text_small post_code_error"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- right hand side --- remove after work  -->
                        <div class="col-lg-6 col-md-12 col-sm-12 col-12 " class="order_details">
                            <div class="my-4 p-3">
                                <h2 class="h5 text-uppercase fw-normal my-2">Order Summary</h2>
                                <hr>
                                <div class="order_details">
                                    @foreach($order['items'] as $item)
                                        <div class="d-flex justify-content-between align-items-center my-3">
                                            <p class="fw-light m-0">{{$item['name']}}</p>
                                            <p class="order_price m-0">{{$item['amount_formatted']}}</p>
                                        </div>
                                    @endforeach
                                    @foreach($order['taxes'] as $tax)
                                        <div class="d-flex justify-content-between align-items-center my-3">
                                            <p class="fw-light m-0">{{$tax['name']}} <span class="text-capitalize text-muted fs-6">({{$tax['type']}})</span></p>
                                            <p class="order_price m-0">{{$tax['amount_formatted']}}</p>
                                        </div>
                                    @endforeach
                                    <hr class="border border-dark my-3">
                                    <div class="d-flex justify-content-between align-items-center my-3">
                                        <p class="order_price m-0">Sub Total</p>
                                        <p class="order_price m-0">{{$order['sub_total_formatted']}}</p>
                                    </div>
                                    <hr class="border border-dark my-3">
                                    <div class="d-flex justify-content-between align-items-center my-3">
                                        <p class="order_price m-0">Total</p>
                                        <p class="order_price m-0">{{$order['total_formatted']}}</p>
                                    </div>
                                    @foreach($paymentProcessors as $paymentProcessor)
                                        <div class="paymentProcessor" id="{{$paymentProcessor['code']}}_order" style="@if(!$paymentProcessor['default'])display: none;@endif">
                                            @if($paymentProcessor['code'] == 'bank')
                                                <div class="my-3">
                                                    <div class="border p-3 pb-0 rounded-2 shadow">
                                                        <p class="fw-normal h5 m-0">
                                                            {{$paymentProcessor['name']}} Account Details
                                                            <div class="table-responsive mt-3">
                                                                <table class="table p-3">
                                                                    <tbody>
                                                                        @if($bankSettings->bank_name != '-')
                                                                            <tr>
                                                                                <td colspan="8" class="border-0 fw-normal px-3">Bank Name</td>
                                                                                <td colspan="4" class="border-0 fw-light px-3">{{$bankSettings->bank_name}}</td>
                                                                            </tr>
                                                                        @endif
                                                                        @if($bankSettings->account_owner != '-')
                                                                            <tr>
                                                                                <td colspan="8" class="border-0 fw-normal px-3">Account Owner</td>
                                                                                <td colspan="4" class="border-0 fw-light px-3">{{$bankSettings->account_owner}}</td>
                                                                            </tr>
                                                                        @endif
                                                                        @if($bankSettings->account_number != '-')
                                                                            <tr>
                                                                                <td colspan="8" class="border-0 fw-normal px-3">Account Number</td>
                                                                                <td colspan="4" class="border-0 fw-light px-3">{{$bankSettings->account_number}}</td>
                                                                            </tr>
                                                                        @endif
                                                                        @if($bankSettings->iban != '-')
                                                                            <tr>
                                                                                <td colspan="8" class="border-0 fw-normal px-3">IBAN</td>
                                                                                <td colspan="4" class="border-0 fw-light px-3">{{$bankSettings->iban}}</td>
                                                                            </tr>
                                                                        @endif
                                                                        @if($bankSettings->routing_number != '-')
                                                                            <tr>
                                                                                <td colspan="8" class="border-0 fw-normal px-3">Routing Number</td>
                                                                                <td colspan="4" class="border-0 fw-light px-3">{{$bankSettings->routing_number}}</td>
                                                                            </tr>
                                                                        @endif
                                                                        @if($bankSettings->bic_swift != '-')
                                                                            <tr>
                                                                                <td colspan="8" class="border-0 fw-normal px-3">BIC/Swift</td>
                                                                                <td colspan="4" class="border-0 fw-light px-3">{{$bankSettings->bic_swift}}</td>
                                                                            </tr>
                                                                        @endif
                                                                        @if($bankSettings->other_details != '-')
                                                                            <tr>
                                                                                <td colspan="8" class="border-0 fw-normal px-3">Other Details</td>
                                                                                <td colspan="4" class="border-0 fw-light px-3">{{$bankSettings->other_details}}</td>
                                                                            </tr>
                                                                        @endif
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </p>
                                                    </div>
                                                </div>
                                            @endif
                                            <div class="alert alert-warning my-4">
                                                <p class="m-0">
                                                    @if($paymentProcessor['code'] == 'bank')
                                                        When transferring the bank payment, please must include the following Payment ID in the reference field of the payment.
                                                    @elseif($paymentProcessor['code'] == 'razorpay' || $paymentProcessor['code'] == 'paypal' || $paymentProcessor['code'] == 'stripe')
                                                        Note: You can review your order on the next page before making the payment.
                                                    @endif
                                                </p>
                                            </div>
                                            @if($paymentProcessor['code'] == 'bank')
                                                <div class="border d-flex my-3 p-3 rounded-3 shadow">
                                                    {{$payment_id}}
                                                </div>
                                            @endif
                                            <div class="my-4 py-2">
                                                @if($order['total'] > 0)
                                                    <div id="{{$paymentProcessor['code']}}_formError" class="FormError"></div>
                                                @else
                                                    <div id="free_formError" class="FormError"></div>
                                                @endif
                                                <button type="submit" class="btn btn_free_trial border-0 shadow-sm w-100 py-2 rounded-3 
                                                @if($order['total'] > 0)
                                                    submit_{{$paymentProcessor['code']}}_pay
                                                @else
                                                    submit_free_pay
                                                @endif
                                                ">
                                                    @if($order['total'] > 0)
                                                        @if($paymentProcessor['code'] == 'bank')
                                                            Submit {{$paymentProcessor['name']}} Payment
                                                        @else
                                                            Review & Checkout 
                                                        @endif
                                                    @else
                                                        Get This Plan
                                                    @endif
                                                    <span class="spinner-border spinner-border-sm text-white d-none" aria-hidden="true"></span>
                                                </button>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </section>

    <!-- footer start  -->
    @include('components.home-footer')

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
        integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD"
        crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            $(".payment_method_input").click(function(){
                let id = "#"+$(this).data('name')+"_order";
                $(id).css("display", "block").siblings(".paymentProcessor").css("display", "none")
            });
            // form validation 
            $(".submit_razorpay_pay, .submit_bank_pay, .submit_stripe_pay, .submit_free_pay").click(function() {
                $(".FormError").empty();
                let fullname = $("#fullname").val();
                let email = $("#email").val();
                let phone = $("#phone").val();
                let address = $("#address").val();
                let city = $("#city").val();
                let state = $("#state").val();
                let post_code = $("#post_code").val();
                const name_regex = /^[a-zA-Z\s]+$/;
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                const phoneRegex = /^[0-9-]+$/;
                const cityRegex = /^[a-zA-Z ]+$/;
                const stateRegex = /^[a-zA-Z ]+$/;
                const postalRegex = /^[a-zA-Z0-9\s-]{1,10}$/;

                // Initialize an error flag
                // var hasErrors = false;

                // for name field 
                if (fullname == "") {
                    $("#fullname").addClass("border-danger");
                    $(".fullname_error").show().text("The full name field is required.");
                } else if (!name_regex.test(fullname)) {
                    $("#fullname").addClass("border-danger");
                    $(".fullname_error").show().text("Special Characters and numbers are not allowed.");
                    $("#reviewfullname").addClass("is-invalid");
                } else if (fullname.length < 3) {
                    $("#fullname").addClass("border-danger");
                    $(".fullname_error").show().text("Full name field contains atleast 3 letters.");
                } else {
                        $("#fullname").removeClass("border-danger");
                    $(".fullname_error").hide();
                }
                // for email field 
                if (email == "") {
                    $("#email").addClass("border-danger");
                    $(".email_error").show().text("The email field is required.");
                } else if(!emailRegex.test(email)){
                    $("#email").addClass("border-danger");
                    $(".email_error").show().text("The email is not valid");
                    $("#reviewemail").addClass("is-invalid")
                } else {
                    $("#email").removeClass("border-danger");
                    $(".email_error").hide();
                }
                // for phone field 
                if (phone == "") {
                    $("#phone").addClass("border-danger");
                    $(".phone_error").show().text("The phone field is required.");
                } else if(!phoneRegex.test(phone)){
                    $("#phone").addClass("border-danger");
                    $(".phone_error").show().text("Special characters and letters are not allowed");
                    $("#reviewphone").addClass("is-invalid")
                } else if(phone.length < 10){
                    $("#phone").addClass("border-danger");
                    $(".phone_error").show().text("Phone must contain 10 digits");
                    $("#reviewphone").addClass("is-invalid")
                } else {
                    $("#phone").removeClass("border-danger");
                    $(".phone_error").hide();
                }
                // for address field 
                if (address == "") {
                    $("#address").addClass("border-danger");
                    $(".address_error").show().text("The address field is required.");
                } else {
                    $("#address").removeClass("border-danger");
                    $(".address_error").hide();
                }
                // for city field 
                if (city == "") {
                    $("#city").addClass("border-danger");
                    $(".city_error").show().text("The city field is required.");
                } else if(!cityRegex.test(city)){
                    $("#city").addClass("border-danger");
                    $(".city_error").show().text("Special Characters and numbers are not allowed.");
                    $("#reviewcity").addClass("is-invalid");
                } else {
                    $("#city").removeClass("border-danger");
                    $(".city_error").hide();
                }
                // for state field 
                if (state == "") {
                    $("#state").addClass("border-danger");
                    $(".state_error").show().text("The state field is required.");
                } else if(!stateRegex.test(state)){
                    $("#state").addClass("border-danger");
                    $(".state_error").show().text("Special Characters and numbers are not allowed.");
                    $("#reviewstate").addClass("is-invalid");
                } else {
                    $("#state").removeClass("border-danger");
                    $(".state_error").hide();
                }
                // for post_code
                if (post_code == "") {
                    $("#post_code").addClass("border-danger");
                    $(".post_code_error").show().text("The Post Code field is required.");
                } else if(!postalRegex.test(post_code)){
                    $("#post_code").addClass("border-danger");
                    $(".post_code_error").show().text("Special Characters are not allowed.");
                    $("#reviewpost").addClass("is-invalid");
                  
                }else {
                    $("#post_code").removeClass("border-danger");
                    $(".post_code_error").hide();
                }
                // switch case 
                switch (true) {
                    case fullname == "":
                        $("#fullname").focus();
                        break;
                    case email == "":
                        $("#email").focus();
                        break;
                    case phone == "":
                        $("#phone").focus();
                        break;
                    case address == "":
                        $("#address").focus();
                        break;
                    case city == "":
                        $("#city").focus();
                        break;
                    case state == "":
                        $("#state").focus();
                        break;
                    case post_code == "":
                        $("#post_code").focus();
                        break;
                }

                // form Filled 
                if (fullname && name_regex.test(fullname) && fullname.length >= 3 && email && emailRegex.test(email) && phone && phoneRegex.test(phone) && phone.length == 10 && address && city && cityRegex.test(city) && state && stateRegex.test(state) && post_code && postalRegex.test(post_code)) {
                    $(".btn_free_trial").find(".spinner-border").removeClass("d-none");
                    var country = $("#select_country").val();
                    var paymentMethod = $('.payment_method_input[name="payment_method"]:checked').val() ? $('.payment_method_input[name="payment_method"]:checked').val() : 'free';
                    $.ajax({
                        type: "POST",
                        url: '/checkout/{{$plan}}',
                        data: {
                            'full_name': fullname,
                            'email': email,
                            'phone': "+44"+phone,
                            'address': address,
                            'city': city,
                            'state': state,
                            'country': country,
                            'zip': post_code,
                            'payment_method': paymentMethod,
                            'payment_id': '{{$payment_id}}',
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(data) {
                            $(".btn_free_trial").find(".spinner-border").addClass("d-none");
                            $("#pageMessage").empty();
                            $('html,body').animate({ scrollTop: 0 }, 'slow');
                            if(paymentMethod == 'free' && data.status == 'payment_success'){
                                window.location.href = data.url;
                            }
                            if(data.status == 'payment_failed' || data.status == 'payment_pending' || data.status == 'redirect_stripe_checkout'){
                                window.location.href = data.url;
                            } else {
                                if(data.success){
                                    $("#pageMessage").append('<div class="alert alert-success fs-6 mx-5 text-black shadow-sm">'+data.message+'</div>');
                                } else {
                                    $("#pageMessage").append('<div class="alert alert-danger fs-6 mx-5 shadow-sm">'+data.message+'</div>');
                                }
                            }
                        },
                        error: function(data, textStatus, errorThrown) {
                            var obj = data.responseJSON.errors;
                            let formError = obj[Object.keys(obj)[0]][0];
                            $("#"+paymentMethod+"_formError").append(`<div class="fs-13 mb-2 alert alert-danger">`+formError+`</div>`);
                        },
                    });
                }

            });
            $(".form-control").keyup(function(){
                $(this).removeClass("border-danger");
                $(this).parents('.form-group').find('span.text-danger').text("");
            });
        });
    </script>
    <script>
        function gettingCalled(){
            fetch('https://restcountries.com/v2/all')
            .then(response=>response.json())
            .then(data=>{
                $("#callingcodes").empty();
                let code = '';
                for(var i=0;i<=data.length;i++){
                    code = data[i].callingCodes[0];
                    if(data[i].callingCodes[0]=="44"){
                        code=`<option class="text-dark text-start" selected value="${data[i].callingCodes[0]}">+${data[i].callingCodes[0]}</option>`
                    }
                    else{
                        code=`<option class="text-dark text-start" value="${data[i].callingCodes[0]}">+${data[i].callingCodes[0]}</option>`   
                    }
                    $("#callingcodes").append(code);

                }

            })
        }
        gettingCalled();
    </script>
    <script>
        $(document).ready(function(){
            // toggle dropdown 
            $(".dropdown_menu").slideUp(200);
            $("a.customize_dropdown").click(function(){
                $(".dropdown_menu").slideUp(200);
                var isOpen = $(this).siblings(".dropdown_menu").is(":visible");
                if (!isOpen) {
                    $(this).siblings(".dropdown_menu").slideDown(200);
                }
            });
        });
    </script>  
    
</body>

</html>