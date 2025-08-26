<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="{{url('User_css/assets/')}}"
    data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Exams - Student Portal | Tutor 11 Plus Portal</title>
    <link rel="shortcut icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}" type="image/x-icon">

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{url('User_css/assets/img/favicon/title_logo.png')}}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{url('User_css/assets/vendor/fonts/boxicons.css')}}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"
        integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{url('User_css/assets/vendor/css/core.css" class="template-customizer-core-css')}}" />
    <link rel="stylesheet" href="{{url('User_css/assets/vendor/css/theme-default.css')}}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{url('User_css/assets/css/demo.css')}}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{url('User_css/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />

    <!-- Page CSS -->
    <link rel="stylesheet" href="{{url('User_css/assets/css/style.css')}}">

    <!-- Helpers -->
    <script src="{{url('User_css/assets/vendor/js/helpers.js')}}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{url('User_css/assets/js/config.js')}}"></script>
</head>
<style>
        .slick-track{
            float: left!important;
        }
</style>
<body>

    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">

        <div class="layout-container">

            <!-- Menu -->

            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme overflow_scroll_aside vh-100">
                <div class="app-brand demo mt-3">
                    <a href="index.html" class="app-brand-link">
                        <img src="../assets/img/favicon/logo.png" alt="tutor 11 logo" style="width: 160px;">
                        <!-- <span class="app-brand-text demo menu-text fw-bolder ms-2">Tutor 11</span> -->
                    </a>

                    <a href="" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                        <i class="bx bx-chevron-left bx-sm align-middle"></i>
                    </a>
                </div>

                <!-- <div class="menu-inner-shadow"></div> -->

                <ul class="menu-inner py-3">
                    <!-- Dashboard -->

                    <!-- Layouts -->
                    <li
                        class="menu-item-header menu-item-header-active my-4 menu-header small text-uppercase rounded-3">
                        <a href="index.html" class="menu-link d-block">
                            <span class="menu-header-text text-dark">Year 3</span>
                            <div data-i18n="Change Syllabus" class="text-primary text-decoration-underline my-2">Change
                                Syllabus</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="index.html" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-layout"></i>
                            <div data-i18n="Choose Child">Dashboard</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="progress.html" class="menu-link">
                            <span class="me-2">
                                <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24"
                                    viewBox="0 0 24 24" fill="currentColor"
                                    class="group-hover:text-white ltr:mr-3 rtl:ml-3 flex-shrink-0 h-6 w-6 text-secondary">
                                    <g>
                                        <path d="M0,0h24v24H0V0z" fill="none"></path>
                                    </g>
                                    <g>
                                        <path
                                            d="M5,20V4h2v7l2.5-1.5L12,11V4h5v7.08c0.33-0.05,0.66-0.08,1-0.08s0.67,0.03,1,0.08V4c0-1.1-0.9-2-2-2H5C3.9,2,3,2.9,3,4v16 c0,1.1,0.9,2,2,2h7.26c-0.42-0.6-0.75-1.28-0.97-2H5z M18,13c-2.76,0-5,2.24-5,5s2.24,5,5,5s5-2.24,5-5S20.76,13,18,13z M16.75,20.5v-5l4,2.5L16.75,20.5z">
                                        </path>
                                    </g>
                                </svg>
                            </span>
                            <div data-i18n="Learn & Practice">Learn & Practise</div>
                        </a>
                    </li>
                    <li class="menu-item active">
                        <a href="attainments.html" class="menu-link">
                            <span class="me-2">
                                <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24"
                                    viewBox="0 0 24 24" fill="currentColor"
                                    class="group-hover:text-white ltr:mr-3 rtl:ml-3 flex-shrink-0 h-6 w-6 text-secondary">
                                    <path
                                        d="M10 11H18V9H10ZM10 14H14V12H10ZM10 8H18V6H10ZM8 18Q7.175 18 6.588 17.413Q6 16.825 6 16V4Q6 3.175 6.588 2.587Q7.175 2 8 2H20Q20.825 2 21.413 2.587Q22 3.175 22 4V16Q22 16.825 21.413 17.413Q20.825 18 20 18ZM8 16H20Q20 16 20 16Q20 16 20 16V4Q20 4 20 4Q20 4 20 4H8Q8 4 8 4Q8 4 8 4V16Q8 16 8 16Q8 16 8 16ZM8 4Q8 4 8 4Q8 4 8 4V16Q8 16 8 16Q8 16 8 16Q8 16 8 16Q8 16 8 16V4Q8 4 8 4Q8 4 8 4ZM4 22Q3.175 22 2.588 21.413Q2 20.825 2 20V6H4V20Q4 20 4 20Q4 20 4 20H18V22Z">
                                    </path>
                                </svg>
                            </span>
                            <div data-i18n="Exams">Exams</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="timespent.html" class="menu-link">
                            <span class="me-2">
                                <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24"
                                    viewBox="0 0 24 24" fill="currentColor"
                                    class="group-hover:text-white ltr:mr-3 rtl:ml-3 flex-shrink-0 h-6 w-6 text-secondary">
                                    <g>
                                        <path d="M0,0h24v24H0V0z" fill="none"></path>
                                    </g>
                                    <g>
                                        <path
                                            d="M4,6H2v14c0,1.1,0.9,2,2,2h14v-2H4V6z M20,2H8C6.9,2,6,2.9,6,4v12c0,1.1,0.9,2,2,2h12c1.1,0,2-0.9,2-2V4 C22,2.9,21.1,2,20,2z M20,16H8V4h12V16z M13.51,10.16c0.41-0.73,1.18-1.16,1.63-1.8c0.48-0.68,0.21-1.94-1.14-1.94 c-0.88,0-1.32,0.67-1.5,1.23l-1.37-0.57C11.51,5.96,12.52,5,13.99,5c1.23,0,2.08,0.56,2.51,1.26c0.37,0.6,0.58,1.73,0.01,2.57 c-0.63,0.93-1.23,1.21-1.56,1.81c-0.13,0.24-0.18,0.4-0.18,1.18h-1.52C13.26,11.41,13.19,10.74,13.51,10.16z M12.95,13.95 c0-0.59,0.47-1.04,1.05-1.04c0.59,0,1.04,0.45,1.04,1.04c0,0.58-0.44,1.05-1.04,1.05C13.42,15,12.95,14.53,12.95,13.95z">
                                        </path>
                                    </g>
                                </svg>
                            </span>
                            <div data-i18n="Quizzes">Exams</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="QuestionsAnalysi.html" class="menu-link">
                            <span class="me-2">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="group-hover:text-white ltr:mr-3 rtl:ml-3 flex-shrink-0 h-6 w-6 text-secondary">
                                    <path d="M0 0h24v24H0V0z" fill="none"></path>
                                    <path
                                        d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V5h14v14zM7 10h2v7H7zm4-3h2v10h-2zm4 6h2v4h-2z">
                                    </path>
                                </svg>
                            </span>
                            <div data-i18n="My Progress">My Progress</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="MasteryLevel.html" class="menu-link">
                            <span class="me-2">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="group-hover:text-white ltr:mr-3 rtl:ml-3 flex-shrink-0 h-6 w-6 text-secondary">
                                    <path d="M0 0h24v24H0V0z" fill="none"></path>
                                    <path
                                        d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V5h14v14zM7 10h2v7H7zm4-3h2v10h-2zm4 6h2v4h-2z">
                                    </path>
                                </svg>
                            </span>
                            <div data-i18n="Parent Set">Parent Set</div>
                        </a>
                    </li>
                </ul>
            </aside>

            <!-- / Menu -->

            <!-- Layout container -->

            <div class="layout-page vh-100 overflow-auto">
                <!-- Navbar -->
                <nav class="layout-navbar mb-5 responsive-navbatr container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                    id="layout-navbar">
                    <div class="align-items-xl-center d-xl-none layout-menu-toggle me-xl-0 navbar-nav">
                        <a class="nav-item nav-link px-0 me-xl-4 bar_responsive" href="javascript:void(0)" type="button"
                            data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample"
                            aria-controls="offcanvasExample">
                            <i class="bx bx-menu bx-sm"></i>
                        </a>
                    </div>

                    <div class="navbar-nav-right  align-items-center" id="navbar-collapse">
                        <div class="row justify-content-end">
                            <div class="col-lg-12 border-bottom mb-4">
                                <ul
                                    class="navbar-nav all_css_padding flex-row align-items-center justify-content-end ms-auto w-px-40">
                                    <!-- Place this tag where you want the button to render. -->
                                    <li class="nav-item me-2">
                                        <div class="d-flex align-items-center">
                                            <img src="../assets/img/illustrations/coin.png" height="35" width="35"
                                                alt="XP COIN" class="me-1">
                                            <span
                                                style="font-size: 1rem; letter-spacing: 1px; color: black ;font-weight: 600;">34XP</span>
                                        </div>

                                    </li>
                                    <!-- User -->

                                    <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                        <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                                            data-bs-toggle="dropdown">
                                            <div class="avatar avatar-online">
                                                <img src="https://www.kindpng.com/picc/m/490-4904536_user-3d-icon-png-transparent-png.png"
                                                    alt class="h-auto rounded-circle" />
                                            </div>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li>
                                                <a class="dropdown-item" href="#">
                                                    <div class="d-flex">
                                                        <div class="flex-shrink-0 me-3">
                                                            <div class="avatar avatar-online">
                                                                <img src="https://www.kindpng.com/picc/m/490-4904536_user-3d-icon-png-transparent-png.png"
                                                                    alt class="w-px-40 h-auto rounded-circle" />
                                                            </div>
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <span class="fw-semibold d-block">Anonymous</span>
                                                            <small class="text-muted">Guest</small>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <div class="dropdown-divider"></div>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="profile.html">
                                                    <i class="bx bx-user me-2"></i>
                                                    <span class="align-middle">Profile</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="subscriptions.html">
                                                    <i class="bx bx-pound me-2"></i>
                                                    <span class="align-middle">Subscriptions</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="payments.html">
                                                    <i class="bx bx-card me-2"></i>
                                                    <span class="align-middle">Payments</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="">
                                                    <i class="bx bx-user-plus me-2"></i>
                                                    <span class="align-middle">Switch To Parent</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="signin.html">
                                                    <i class="bx bx-power-off me-2"></i>
                                                    <span class="align-middle">Log Out</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <!--/ User -->
                                </ul>
                            </div>
                            <div class="col-lg-12">
                                <div class="row justify-content-around py-3">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <h4 class="math_year_heading">Quizzes</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
                <!-- off canvas  -->
                <div class="offcanvas offcanvas-start bg-white" tabindex="-1" id="offcanvasExample"
                    aria-labelledby="offcanvasExampleLabel" style="z-index: 10000!important;">
                    <div class="offcanvas-header">
                        <div class="app-brand demo mt-3">
                            <a href="index.html" class="app-brand-link">
                                <img src="../assets/img/favicon/logo.png" alt="tutor 11 logo" style="width: 160px;">
                                <!-- <span class="app-brand-text demo menu-text fw-bolder ms-2">Tutor 11</span> -->
                            </a>

                            <a href="" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                                <i class="bx bx-chevron-left bx-sm align-middle"></i>
                            </a>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body menu-vertical menu bg-menu-theme w-100">
                        <ul class="menu-inner py-3">
                            <!-- Dashboard -->

                            <!-- Layouts -->
                            <li class="menu-item">
                                <a href="index.html" class="menu-link">
                                    <i class="menu-icon tf-icons bx bx-layout"></i>
                                    <div data-i18n="Choose Child">Choose child</div>
                                </a>
                            </li>
                            <li class="menu-header small text-uppercase">
                                <span class="menu-header-text">Pages</span>
                            </li>
                            <li class="menu-item active">
                                <a href="progress.html" class="menu-link">
                                    <span class="me-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                            class="group-hover:text-white ltr:mr-3 rtl:ml-3 flex-shrink-0 h-6 w-6 text-secondary">
                                            <path d="M0 0h24v24H0V0z" fill="none"></path>
                                            <path
                                                d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V5h14v14zM7 10h2v7H7zm4-3h2v10h-2zm4 6h2v4h-2z">
                                            </path>
                                        </svg>
                                    </span>
                                    <div data-i18n="Progress">Progress</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="attainments.html" class="menu-link">
                                    <span class="me-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 122.88 87.46"
                                            fill="currentColor"
                                            class="group-hover:text-white ltr:mr-3 rtl:ml-3 flex-shrink-0 h-6 w-6 text-secondary">
                                            <g>
                                                <path
                                                    d="M2.17,87.46c-1.2,0-2.17-0.91-2.17-2.04c0-1.13,0.97-2.04,2.17-2.04h9.16V20.59c0-0.65,0.27-1.25,0.7-1.68 c0.44-0.44,1.03-0.71,1.68-0.71h13.02c0.66,0,1.25,0.27,1.68,0.71c0.43,0.43,0.7,1.03,0.7,1.68v62.78h9.69V38.8 c0-0.65,0.27-1.24,0.7-1.68l0,0l0,0l0,0c0.43-0.43,1.03-0.7,1.67-0.7h13.02c0.67,0,1.26,0.27,1.68,0.7c0.43,0.43,0.7,1.04,0.7,1.68 v44.57h9.69V2.38c0-0.65,0.27-1.24,0.7-1.68l0,0l0,0C67.42,0.27,68.01,0,68.67,0h13.02c0.66,0,1.25,0.27,1.68,0.7l0,0 c0.43,0.43,0.7,1.04,0.7,1.68v80.99h9.69V25.8c0-0.65,0.27-1.25,0.7-1.68l0,0c0.43-0.43,1.03-0.7,1.69-0.7h13.02 c0.66,0,1.26,0.27,1.68,0.7c0.43,0.43,0.7,1.03,0.7,1.68v57.58h9.16c1.2,0,2.17,0.91,2.17,2.04c0,1.13-0.97,2.04-2.17,2.04h-11.27 c-0.02,0-0.04,0-0.06,0H95.94c-0.02,0-0.04,0-0.06,0H81.96c-0.02,0-0.04,0-0.06,0H68.46c-0.02,0-0.04,0-0.06,0H54.49 c-0.02,0-0.04,0-0.06,0H40.98c-0.02,0-0.04,0-0.06,0H27l-0.06,0H13.5l-0.06,0H2.17L2.17,87.46z M24.77,22.55h-9.1v60.56h9.1V22.55 L24.77,22.55z M52.25,40.76h-9.1v42.35h9.1V40.76L52.25,40.76z M79.73,4.34h-9.1v78.77h9.1V4.34L79.73,4.34z M107.2,27.76h-9.1 v55.36h9.1V27.76L107.2,27.76z">
                                                </path>
                                            </g>
                                        </svg>
                                    </span>
                                    <div data-i18n="Attainments">Attainments</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="timespent.html" class="menu-link">
                                    <span class="me-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 122.88 112.9"
                                            fill="currentColor"
                                            class="group-hover:text-white ltr:mr-3 rtl:ml-3 flex-shrink-0 h-6 w-6 text-secondary">
                                            <path
                                                d="M35.69,101.21a24.08,24.08,0,0,0-4.23-11.35c-2.27-3.17-5.22-5.33-8.32-5.33s-6.06,2.16-8.33,5.33a24.08,24.08,0,0,0-4.23,11.35Zm78.39-73.63a4.17,4.17,0,0,0-7.37,3.81,4.68,4.68,0,0,0,.37.7,44,44,0,0,1,3.6,6.74,4.17,4.17,0,0,0,7.94-2.29,4.32,4.32,0,0,0-.3-1,52.05,52.05,0,0,0-4.24-7.93ZM107.14,16.5a4.63,4.63,0,0,1-3.23,5.18L91.54,25.46a4.63,4.63,0,1,1-2.69-8.86L90,16.24A47,47,0,0,0,22.46,44.49H13.84A55.33,55.33,0,0,1,94.7,9.33l-1.16-3A4.64,4.64,0,1,1,102.22,3l4.62,12.09a4.81,4.81,0,0,1,.3,1.42ZM67.6,104.55a53.52,53.52,0,0,0,9.43-.87,4.17,4.17,0,0,1,1,8.25,61.44,61.44,0,0,1-7.38.94c-1.31.06-3,0-4.34,0a55.19,55.19,0,0,1-10.91-1.33V103a46.85,46.85,0,0,0,12.15,1.59Zm23.25-6a4.17,4.17,0,1,0,4.09,7.26,55.27,55.27,0,0,0,7.46-5.06,4.17,4.17,0,0,0-3.89-7.21,4.07,4.07,0,0,0-1.34.73,47.39,47.39,0,0,1-6.32,4.28Zm16.42-15.64a4.16,4.16,0,1,0,7.06,4.41,55.51,55.51,0,0,0,4.15-8,4.17,4.17,0,0,0-7.15-4.14,4.11,4.11,0,0,0-.54.93,46,46,0,0,1-3.52,6.79Zm7.13-21.62a4.17,4.17,0,0,0,8.16,1.46,3.91,3.91,0,0,0,.15-.83,56.09,56.09,0,0,0,0-9,4.16,4.16,0,1,0-8.3.69,47.78,47.78,0,0,1,0,7.66ZM59.12,35a4.29,4.29,0,0,1,8.57,0V61.09l17.84,7.85a4.28,4.28,0,1,1-3.44,7.83L61.91,67.9a4.29,4.29,0,0,1-2.79-4V35ZM12.59,70.51h21.1a20.92,20.92,0,0,0,2-7H10.56a20.7,20.7,0,0,0,2,7ZM2.47,105.83a2.09,2.09,0,1,1,0-4.1H5.55a28.67,28.67,0,0,1,5.13-14.44,19.38,19.38,0,0,1,6.1-5.67,18.41,18.41,0,0,1-6.17-5.21,24.83,24.83,0,0,1-5.07-14H2.61a2.09,2.09,0,1,1,0-4.1H43.93a2.09,2.09,0,1,1,0,4.1h-3.2a24.83,24.83,0,0,1-5.07,14,18.41,18.41,0,0,1-6.17,5.21,19.38,19.38,0,0,1,6.1,5.67,28.67,28.67,0,0,1,5.13,14.44H43.8a2.09,2.09,0,1,1,0,4.1H2.47Z">
                                            </path>
                                        </svg>
                                    </span>
                                    <div data-i18n="Time Spent">Time Spent</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="QuestionsAnalysi.html" class="menu-link">
                                    <span class="me-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" shape-rendering="geometricPrecision"
                                            text-rendering="geometricPrecision" image-rendering="optimizeQuality"
                                            fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 509 512.19"
                                            fill="currentColor"
                                            class="group-hover:text-white ltr:mr-3 rtl:ml-3 flex-shrink-0 h-6 w-6 text-secondary">
                                            <path fill-rule="nonzero"
                                                d="m244.45 267.64 228.14-3.67.13 11.84c.03 65.27-26.43 124.37-69.21 167.15-42.77 42.77-101.87 69.23-167.14 69.23-65.27 0-124.36-26.46-167.14-69.23C26.46 400.18 0 341.08 0 275.81c0-65.26 26.46-124.36 69.23-167.13C112.01 65.9 171.1 39.44 236.37 39.44h8.08v228.2zm30.01-33.1L275.36 0C404.54.5 509 105.35 509 234.54H274.46zm182.08 45.79-228.25 3.66V55.75C170.7 57.83 118.74 82.02 80.66 120.1c-39.85 39.85-64.5 94.91-64.5 155.71 0 60.82 24.65 115.87 64.5 155.72 39.85 39.85 94.9 64.5 155.71 64.5s115.87-24.65 155.72-64.5c38.86-38.86 63.26-92.18 64.45-151.2z">
                                            </path>
                                        </svg>
                                    </span>
                                    <div data-i18n="Question Analysis">Question Analysis</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="MasteryLevel.html" class="menu-link">
                                    <span class="me-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" shape-rendering="geometricPrecision"
                                            text-rendering="geometricPrecision" image-rendering="optimizeQuality"
                                            fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 441 512.02"
                                            fill="currentColor"
                                            class="group-hover:text-white ltr:mr-3 rtl:ml-3 flex-shrink-0 h-6 w-6 text-secondary">
                                            <path
                                                d="M324.87 279.77c32.01 0 61.01 13.01 82.03 34.02 21.09 21 34.1 50.05 34.1 82.1 0 32.06-13.01 61.11-34.02 82.11l-1.32 1.22c-20.92 20.29-49.41 32.8-80.79 32.8-32.06 0-61.1-13.01-82.1-34.02-21.01-21-34.02-50.05-34.02-82.11s13.01-61.1 34.02-82.1c21-21.01 50.04-34.02 82.1-34.02zM243.11 38.08v54.18c.99 12.93 5.5 23.09 13.42 29.85 8.2 7.01 20.46 10.94 36.69 11.23l37.92-.04-88.03-95.22zm91.21 120.49-41.3-.04c-22.49-.35-40.21-6.4-52.9-17.24-13.23-11.31-20.68-27.35-22.19-47.23l-.11-1.74V25.29H62.87c-10.34 0-19.75 4.23-26.55 11.03-6.8 6.8-11.03 16.21-11.03 26.55v336.49c0 10.3 4.25 19.71 11.06 26.52 6.8 6.8 16.22 11.05 26.52 11.05h119.41c2.54 8.79 5.87 17.25 9.92 25.29H62.87c-17.28 0-33.02-7.08-44.41-18.46C7.08 432.37 0 416.64 0 399.36V62.87c0-17.26 7.08-32.98 18.45-44.36C29.89 7.08 45.61 0 62.87 0h173.88c4.11 0 7.76 1.96 10.07 5l109.39 118.34c2.24 2.43 3.34 5.49 3.34 8.55l.03 119.72c-8.18-1.97-16.62-3.25-25.26-3.79v-89.25zm-229.76 54.49c-6.98 0-12.64-5.66-12.64-12.64 0-6.99 5.66-12.65 12.64-12.65h150.49c6.98 0 12.65 5.66 12.65 12.65 0 6.98-5.67 12.64-12.65 12.64H104.56zm0 72.3c-6.98 0-12.64-5.66-12.64-12.65 0-6.98 5.66-12.64 12.64-12.64h142.52c3.71 0 7.05 1.6 9.37 4.15a149.03 149.03 0 0 0-30.54 21.14H104.56zm0 72.3c-6.98 0-12.64-5.66-12.64-12.65 0-6.98 5.66-12.64 12.64-12.64h86.2c-3.82 8.05-6.95 16.51-9.29 25.29h-76.91zm187.98 17.13 20.56 19.44 41.38-42.02c3.86-3.92 6.27-7.05 11.05-2.17l15.45 15.82c5.06 5.01 4.8 7.94.01 12.63l-59.09 58.07c-10.07 9.88-8.33 10.51-18.54.34l-36.84-36.62c-2.1-2.3-1.88-4.63.42-6.96l17.93-18.57c2.72-2.82 4.88-2.64 7.67.04z">
                                            </path>
                                        </svg>
                                    </span>
                                    <div data-i18n="Mastery Level">Mastery Level</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="curiculum.html" class="menu-link">
                                    <span class="me-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 122.88 119.86"
                                            fill="currentColor"
                                            class="group-hover:text-white ltr:mr-3 rtl:ml-3 flex-shrink-0 h-6 w-6 text-secondary">
                                            <title>publisher</title>
                                            <path
                                                d="M20.72,72a3,3,0,0,1-2.84-3.1,3,3,0,0,1,2.84-3.1H57.47a3,3,0,0,1,2.84,3.1A3,3,0,0,1,57.47,72ZM83.08,95.75c-1-1.53-2.77-3.62-2.77-5.42a2.92,2.92,0,0,1,1.94-2.64c-.09-1.51-.15-3.06-.15-4.59,0-.9,0-1.82.05-2.72A6.52,6.52,0,0,1,82.46,79a9.7,9.7,0,0,1,4.32-5.48,12.28,12.28,0,0,1,2.34-1.12c1.48-.54.76-2.88,2.39-2.91,3.79-.1,10,3.22,12.47,5.86a8.84,8.84,0,0,1,2.49,5.93L106.32,88a2.17,2.17,0,0,1,1.59,1.37c.52,2.1-1.66,4.71-2.67,6.38s-4.5,5.74-4.51,5.78a1.39,1.39,0,0,0,.32.77c5.54,7.62,21.83,1.74,21.83,16.89H65.33c0-15.16,16.29-9.27,21.82-16.89a1.68,1.68,0,0,0,.4-.79c0-.1-4.1-5.12-4.47-5.71Zm8-76.89h10.18A7.16,7.16,0,0,1,106.39,21a7.26,7.26,0,0,1,2.13,5.13V61.9l-6.27-2.46V26.13a1,1,0,0,0-1-1H91V57.88l-6.24,2.46V7.27a1,1,0,0,0-1-1H7.24a1,1,0,0,0-1,1V93.72a1,1,0,0,0,1,1H64.42L62,101H23.66v11.6a1,1,0,0,0,1,1H56.37l-2.46,6.24H24.73a7.31,7.31,0,0,1-7.27-7.28V101H7.27A7.31,7.31,0,0,1,0,93.72V7.27A7.16,7.16,0,0,1,2.14,2.14,7.23,7.23,0,0,1,7.27,0H83.79a7.18,7.18,0,0,1,5.14,2.14,7.27,7.27,0,0,1,2.14,5.13V18.86Zm-70.38,10a3,3,0,0,1-2.85-3.1,3,3,0,0,1,2.85-3.1H69.77a3,3,0,0,1,2.84,3.1,3,3,0,0,1-2.84,3.1Zm0,21.57a3,3,0,0,1-2.85-3.1,3,3,0,0,1,2.85-3.1H69.77a3,3,0,0,1,2.84,3.1,3,3,0,0,1-2.84,3.1Z">
                                            </path>
                                        </svg>
                                    </span>
                                    <div data-i18n="Curriculum">Curiculum</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="set.html" class="menu-link">
                                    <span class="me-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 122.88 119.86"
                                            fill="currentColor"
                                            class="group-hover:text-white ltr:mr-3 rtl:ml-3 flex-shrink-0 h-6 w-6 text-secondary">
                                            <title>publisher</title>
                                            <path
                                                d="M20.72,72a3,3,0,0,1-2.84-3.1,3,3,0,0,1,2.84-3.1H57.47a3,3,0,0,1,2.84,3.1A3,3,0,0,1,57.47,72ZM83.08,95.75c-1-1.53-2.77-3.62-2.77-5.42a2.92,2.92,0,0,1,1.94-2.64c-.09-1.51-.15-3.06-.15-4.59,0-.9,0-1.82.05-2.72A6.52,6.52,0,0,1,82.46,79a9.7,9.7,0,0,1,4.32-5.48,12.28,12.28,0,0,1,2.34-1.12c1.48-.54.76-2.88,2.39-2.91,3.79-.1,10,3.22,12.47,5.86a8.84,8.84,0,0,1,2.49,5.93L106.32,88a2.17,2.17,0,0,1,1.59,1.37c.52,2.1-1.66,4.71-2.67,6.38s-4.5,5.74-4.51,5.78a1.39,1.39,0,0,0,.32.77c5.54,7.62,21.83,1.74,21.83,16.89H65.33c0-15.16,16.29-9.27,21.82-16.89a1.68,1.68,0,0,0,.4-.79c0-.1-4.1-5.12-4.47-5.71Zm8-76.89h10.18A7.16,7.16,0,0,1,106.39,21a7.26,7.26,0,0,1,2.13,5.13V61.9l-6.27-2.46V26.13a1,1,0,0,0-1-1H91V57.88l-6.24,2.46V7.27a1,1,0,0,0-1-1H7.24a1,1,0,0,0-1,1V93.72a1,1,0,0,0,1,1H64.42L62,101H23.66v11.6a1,1,0,0,0,1,1H56.37l-2.46,6.24H24.73a7.31,7.31,0,0,1-7.27-7.28V101H7.27A7.31,7.31,0,0,1,0,93.72V7.27A7.16,7.16,0,0,1,2.14,2.14,7.23,7.23,0,0,1,7.27,0H83.79a7.18,7.18,0,0,1,5.14,2.14,7.27,7.27,0,0,1,2.14,5.13V18.86Zm-70.38,10a3,3,0,0,1-2.85-3.1,3,3,0,0,1,2.85-3.1H69.77a3,3,0,0,1,2.84,3.1,3,3,0,0,1-2.84,3.1Zm0,21.57a3,3,0,0,1-2.85-3.1,3,3,0,0,1,2.85-3.1H69.77a3,3,0,0,1,2.84,3.1,3,3,0,0,1-2.84,3.1Z">
                                            </path>
                                        </svg>
                                    </span>
                                    <div data-i18n="Sets">Sets</div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- main content  -->
                <div class="container-xxl flex-grow-1 container-p-y">

                    <!-- slider start -->
                    <div class="card-slider justify-content-start">
                        <div class="px-2">
                            <div class="card">
                                <!-- Notice that both the image and the product title are in the same link. This can massively reduce the number of redundant tabstops on a page with lots of products, creating a better UX for keyboard-only and screen reader users. -->
                                <a href="https://accessible360.com" target="_blank" class="main-link">
                                    <h2 class="title text-center my-1">First term</h2>
                                    <!-- This image has a descriptive alt attribute, so it helps to place it after the heading in the DOM. Flexbox is used to place it above the heading visually (see the CSS tab to see how). -->
                                    <div class="image">
                                        <img src="../images/term1.jpg "
                                            alt="Small succulent with long, spikey leaves in a mug-like planter.">
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="px-2">
                            <div class="card">
                                <!-- Notice that both the image and the product title are in the same link. This can massively reduce the number of redundant tabstops on a page with lots of products, creating a better UX for keyboard-only and screen reader users. -->
                                <a href="https://accessible360.com" target="_blank" class="main-link">
                                    <h2 class="title text-center my-1">Second term</h2>
                                    <!-- This image has a descriptive alt attribute, so it helps to place it after the heading in the DOM. Flexbox is used to place it above the heading visually (see the CSS tab to see how). -->
                                    <div class="image">
                                        <img src="../images/term2.jpg"
                                            alt="Small succulent with long, spikey leaves in a mug-like planter.">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- slider start -->


                    <!-- start exam sheet start -->
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="d-flex justify-content-between align-items-center py-3">
                            <h4 style="color: #000; font-size: 1.2rem; font-weight:600;" class="mb-0">Live Exams</h4>
                            <a href="" class="viewall_button">View All</a>
                        </div>
                        <div class="col-lg-6 col-md-8 col-sm-9x col-12">
                            <div class="bg-white h-auto py-4 px-3 rounded shadow">
                                <h3 class="mb-0 pb-4" style="color: #000; font-size: 1.1rem; font-weight: 600;">English
                                    Exam</h3>
                                <div class="Fixed_schedule_time rounded h-auto py-3 px-3">
                                    <h6 class="Fixed_heading">FIXED SCHEDULE TIME</h6>
                                    <div class="d-flex align-items-center">
                                        <i class="bx bx-calendar text-green me-3"></i>
                                        <p class="mb-0 time_styling">Tue, Jan 10th, 2023</p>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <i class="bx bx-time text-danger me-3"></i>
                                        <p class="mb-0 py-4 time_styling">07:00 PM - 07:02 PM</p>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <i class="bx bx-globe text-green me-3"></i>
                                        <p class="mb-0 time_styling">Timezone - UTC</p>
                                    </div>
                                </div>
                                <div class="row py-4">
                                    <div class="col-4">
                                        <h5 class="number_style">3</h5>
                                        <h4 class="Question_heading">Questions</h4>
                                    </div>
                                    <div class="col-4">
                                        <h5 class="number_style">2.1</h5>
                                        <h4 class="Question_heading">Minutes</h4>
                                    </div>
                                    <div class="col-4">
                                        <h5 class="number_style">3</h5>
                                        <h4 class="Question_heading">Marks</h4>
                                    </div>
                                </div>
                                <div class="row align-items-center">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-12 my-2">
                                        <span class="first_term_name">First term</span>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-12 my-2 text-end">
                                        <div class="btn text-end">
                                            <a href="" class="Start_exam_button rounded px-3 py-2">Start Exam</a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>

                    <!-- start exam sheet End -->
                </div>
            </div>
        </div>
    </div>

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{url('User_css/assets/vendor/libs/jquery/jquery.js')}}"></script>
    <script src="{{url('User_css/assets/vendor/libs/popper/popper.js')}}"></script>
    <script src="{{url('User_css/assets/vendor/js/bootstrap.js')}}"></script>
    <script src="{{url('User_css/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
    <script src="https://use.fontawesome.com/4ecc3dbb0b.js"></script>

    <script src="{{url('User_css/assets/vendor/js/menu.js')}}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{('User_css/assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>

    <!-- Main JS -->
    <script src="{{url('User_css/assets/js/main.js')}}"></script>

    <!-- Page JS -->
    <script src="{{url('/assets/js/dashboards-analytics.js')}}"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"
        integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/spectrum/1.7.1/spectrum.min.js"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/0.6.7/js/min/perfect-scrollbar.jquery.min.js">
    </script>
    
        <style>

                        

            /* slider css  start*/
            .card-slider {
                max-width: 1000px;
                margin: 0 auto;
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
                height: 150px;
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
                justify-content: start ;
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

            /* slider css end */

            /* custom css start */
            .viewall_button {
                font-size: 1rem;
                font-weight: 500;
                cursor: pointer;
                color: #696CFF;
            }

            .number_style {
                font-size: 1rem;
                font-weight: 500;
                color: #000;
            }

            .Question_heading {
                color: #059669;
                font-size: 1rem;
                font-weight: 400;
            }

            .dot_overlay {
                width: 7px;
                height: 7px;
                background: #696CFF;
            }

            .Fixed_heading {
                color: #6a21dd;
                font-size: 0.9rem;
                font-weight: 500;
            }

            .time_styling {
                color: #000;
                font-size: 0.9rem;
                font-weight: 500;
            }

            .Fixed_schedule_time {
                background: #ebeeff;
            }

            .first_term_name {
                color: #000;
                font-size: 0.9rem;
                font-weight: 400;
            }

            .Start_exam_button {
                color: #fff;
                background: #696CFF;
                font-size: 0.9rem;
                cursor: pointer;
            }

            .Start_exam_button:hover {
                background: #696CFF;
                color: #fff;
            }

            .text-green {
                color: #059669;
            }


            /* custom css end */
        </style>

    <script>
        // slider jquery start
        $(document).ready(function() {
            $('.card-slider').slick({
                dots: false,
                arrows: true,
                slidesToShow: 4,
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

            // slider jquery end
    </script>
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@accessible360/accessible-slick@1.0.1/slick/slick.min.css">
    <link rel="stylesheet"
        href="https:////cdn.jsdelivr.net/npm/@accessible360/accessible-slick@1.0.1/slick/accessible-slick-theme.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@accessible360/accessible-slick@1.0.1/slick/slick.min.js"></script>
</body>

</html>