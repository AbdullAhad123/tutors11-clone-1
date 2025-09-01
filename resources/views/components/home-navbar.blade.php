@include('components.website-preloader')
<nav class="navbar navbar-expand-lg absolute_nav" id="navbar_nav">
    <div class="container-lg cont_wrapper py-1 px-2 px-md-4">
        <a class="m-0 navbar-brand p-0 me-lg-4" href="/">
            <img src="{{ url('storage/' . app(\App\Settings\SiteSettings::class)->logo_path) }}" width="45" height="45" class="img-fluid" alt="{{ url('storage/' . app(\App\Settings\SiteSettings::class)->app_name) }}" />
        </a>
        <div>
            <ul class="navbar-nav m-0 align-items-center d-lg-none d-inline-block">
                @if (Auth::user() == null)
                    <li class="nav-item mx-1 d-inline-flex">
                        <a role="button" href="/registration" class="border-2 cta_btn p-2 px-3 rounded-2 rounded-pill small">Register</a>
                    </li>
                @else
                    <li class="nav-item mx-1 d-none">
                        <a role="button" href="/registration" class="border-2 cta_btn p-2 px-3 rounded-2 rounded-pill small">Register</a>
                    </li>
                @endif 
                @if (Auth::user() == null)
                    <li class="nav-item d-inline-flex">
                        <a role="button" href="/login" class="border-2 secondary_btn p-2 px-3 rounded-2 rounded-pill small">Login</a>
                    </li>
                @else
                    @if (Auth::user()->hasRole('student'))
                        <li class="nav-item d-inline-flex">
                            <a role="button" href="/dashboard" class="border-2 secondary_btn p-2 px-3 rounded-2 rounded-pill small @if (Request::is('change-syllabus')) active @endif">Dashboard</a>
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
            <svg class="navbar-toggler border-0 text-white shadow-none px-1 navbar_menu ms-1" xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 24 24" style="fill:#fff" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop" aria-controls="offcanvasTop" aria-label="navbar Navigation">
                <path d="M4 6h16v2H4zm0 5h16v2H4zm0 5h16v2H4z"></path>
            </svg>
        </div>
        <div class="collapse navbar-collapse align-items-center justify-content-lg-between" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item text-center mx-1"><a aria-label="Home" class="nav-link border-0 px-2" href="/">Home</a></li>
                <li class="nav-item text-center mx-1"><a aria-label="Explore Pricings" class="nav-link border-0 px-2" href="/pricing">Pricing</a></li>
                <li class="nav-item text-center mx-1"><a aria-label="About us" class="nav-link border-0 px-2" href="/about">About Us</a></li>
                <li class="nav-item text-center dropdown mx-1">
                    <button class="nav-link customize_dropdown border-0 px-2 bg-transparent text-white" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <span>Start Learning</span> 
                        <i class="fa fa-chevron-down fa-xs small ms-1 dropdown_toggle_icon"></i>
                    </button>
                    <ul class="border-0 dropdown-menu dropdown-menu-start p-2 rounded-1 shadow-lg navDropdownMenu">
                        @php
                            $loggedIn = Auth::user() != null;
                            $isStudent = $loggedIn && Auth::user()->hasRole('student');
                        @endphp
                        <li><a class="align-items-center d-flex dropdown-item fw-normal p-2" href="{{ $isStudent ? '/quizzes' : '/login' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" height="20" width="20"><path d="M20 16V4H8V16H20M22 16C22 17.1 21.1 18 20 18H8C6.9 18 6 17.1 6 16V4C6 2.9 6.9 2 8 2H20C21.1 2 22 2.9 22 4V16M16 20V22H4C2.9 22 2 21.1 2 20V7H4V20H16M14.2 5C13.3 5 12.6 5.2 12.1 5.6C11.6 6 11.3 6.6 11.3 7.4H13.2C13.2 7.1 13.3 6.9 13.5 6.7C13.7 6.6 13.9 6.5 14.2 6.5C14.5 6.5 14.8 6.6 15 6.8C15.2 7 15.3 7.2 15.3 7.6C15.3 7.9 15.2 8.2 15.1 8.4C15 8.6 14.7 8.8 14.5 9C14 9.3 13.6 9.6 13.5 9.9C13.1 10.1 13 10.5 13 11H15C15 10.7 15 10.4 15.1 10.3C15.2 10.1 15.4 9.9 15.6 9.8C16 9.6 16.4 9.3 16.7 8.9C17 8.4 17.2 8 17.2 7.5C17.2 6.7 16.9 6.1 16.4 5.7C15.9 5.2 15.1 5 14.2 5M13 12V14H15V12H13Z" /></svg>
                            <span class="ms-2">Quizzes</span>
                        </a></li>
                        <li><a class="align-items-center d-flex dropdown-item fw-normal p-2" href="{{ $isStudent ? '/learn-practice' : '/login' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" height="20" width="20"><path d="M12 3L1 9L5 11.18V17.18L12 21L19 17.18V11.18L21 10.09V17H23V9L12 3M18.82 9L12 12.72L5.18 9L12 5.28L18.82 9M17 16L12 18.72L7 16V12.27L12 15L17 12.27V16Z" /></svg>
                            <span class="ms-2">Learn and Practise</span>
                        </a></li>
                    </ul>
                </li>
                <li class="nav-item text-center dropdown mx-1">
                    <button class="nav-link customize_dropdown border-0 px-2 bg-transparent text-white" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <span>Explore</span> 
                        <i class="fa fa-chevron-down fa-xs small ms-1 dropdown_toggle_icon"></i>
                    </button>
                    <ul class="border-0 dropdown-menu dropdown-menu-start p-2 rounded-1 shadow-lg navDropdownMenu">
                        <li>
                            <a class="align-items-center d-flex dropdown-item fw-normal p-2" href="/blogs">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" height="20" width="20"><path d="M19 5V19H5V5H19M21 3H3V21H21V3M17 17H7V16H17V17M17 15H7V14H17V15M17 12H7V7H17V12Z" /></svg>
                                <span class="ms-2">Blogs</span>
                            </a>
                        </li>
                        <li>
                            <a class="align-items-center d-flex dropdown-item fw-normal p-2" href="/explore">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" height="20" width="20"><path d="M14.19,14.19L6,18L9.81,9.81L18,6M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2M12,10.9A1.1,1.1 0 0,0 10.9,12A1.1,1.1 0 0,0 12,13.1A1.1,1.1 0 0,0 13.1,12A1.1,1.1 0 0,0 12,10.9Z" /></svg>
                                <span class="ms-2">Explore</span>
                            </a>
                        </li>
                        <li>
                            <a class="align-items-center d-flex dropdown-item fw-normal p-2" href="{{ route('school_list', ['page' => 1]) }}">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" height="20" width="20"><path d="M21 10H17V8L12.5 6.2V4H15V2H11.5V6.2L7 8V10H3C2.45 10 2 10.45 2 11V22H10V17H14V22H22V11C22 10.45 21.55 10 21 10M8 20H4V17H8V20M8 15H4V12H8V15M12 8C12.55 8 13 8.45 13 9S12.55 10 12 10 11 9.55 11 9 11.45 8 12 8M14 15H10V12H14V15M20 20H16V17H20V20M20 15H16V12H20V15Z" /></svg>
                                <span class="ms-2">Schools</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item text-center dropdown mx-1">
                    <button class="nav-link customize_dropdown border-0 px-2 bg-transparent text-white" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <span>Resources</span> 
                        <i class="fa fa-chevron-down fa-xs small ms-1 dropdown_toggle_icon"></i>
                    </button>
                    <ul class="border-0 dropdown-menu dropdown-menu-start p-2 rounded-1 shadow-lg navDropdownMenu">
                        <li>
                            <a class="align-items-center d-flex dropdown-item fw-normal p-2" href="/contact">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" height="20" width="20"><path d="M12,1C7,1 3,5 3,10V17A3,3 0 0,0 6,20H9V12H5V10A7,7 0 0,1 12,3A7,7 0 0,1 19,10V12H15V20H19V21H12V23H18A3,3 0 0,0 21,20V10C21,5 16.97,1 12,1Z" /></svg>
                                <span class="ms-2">Contact Us</span>
                            </a>
                        </li>
                        <li>
                            <a class="align-items-center d-flex dropdown-item fw-normal p-2" href="/help">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" height="20" width="20"><path d="M12.3 7.29C12.5 7.11 12.74 7 13 7C13.27 7 13.5 7.11 13.71 7.29C13.9 7.5 14 7.74 14 8C14 8.27 13.9 8.5 13.71 8.71C13.5 8.9 13.27 9 13 9C12.74 9 12.5 8.9 12.3 8.71C12.11 8.5 12 8.27 12 8C12 7.74 12.11 7.5 12.3 7.29M9.8 11.97C9.8 11.97 11.97 10.25 12.76 10.18C13.5 10.12 13.35 10.97 13.28 11.41L13.27 11.47C13.13 12 12.96 12.64 12.79 13.25C12.41 14.64 12.04 16 12.13 16.25C12.23 16.59 12.85 16.16 13.3 15.86C13.36 15.82 13.41 15.78 13.46 15.75C13.46 15.75 13.54 15.67 13.62 15.78C13.64 15.81 13.66 15.84 13.68 15.86C13.77 16 13.82 16.05 13.7 16.13L13.66 16.15C13.44 16.3 12.5 16.96 12.12 17.2C11.71 17.47 10.14 18.37 10.38 16.62C10.59 15.39 10.87 14.33 11.09 13.5C11.5 12 11.68 11.32 10.76 11.91C10.39 12.13 10.17 12.27 10.04 12.36C9.93 12.44 9.92 12.44 9.85 12.31L9.82 12.25L9.77 12.17C9.7 12.07 9.7 12.06 9.8 11.97M22 12C22 17.5 17.5 22 12 22C6.5 22 2 17.5 2 12C2 6.5 6.5 2 12 2C17.5 2 22 6.5 22 12M20 12C20 7.58 16.42 4 12 4C7.58 4 4 7.58 4 12C4 16.42 7.58 20 12 20C16.42 20 20 16.42 20 12Z" /></svg>
                                <span class="ms-2">Help & Support</span>
                            </a>
                        </li>
                        <li>
                            <a class="align-items-center d-flex dropdown-item fw-normal p-2" href="/reviews">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" height="20" width="20"><path d="M15,4A4,4 0 0,1 19,8A4,4 0 0,1 15,12A4,4 0 0,1 11,8A4,4 0 0,1 15,4M15,5.9A2.1,2.1 0 0,0 12.9,8A2.1,2.1 0 0,0 15,10.1C16.16,10.1 17.1,9.16 17.1,8C17.1,6.84 16.16,5.9 15,5.9M15,13C17.67,13 23,14.33 23,17V20H7V17C7,14.33 12.33,13 15,13M15,14.9C12,14.9 8.9,16.36 8.9,17V18.1H21.1V17C21.1,16.36 17.97,14.9 15,14.9M5,13.28L2.5,14.77L3.18,11.96L1,10.08L3.87,9.83L5,7.19L6.11,9.83L9,10.08L6.8,11.96L7.45,14.77L5,13.28Z" /></svg>
                                <span class="ms-2">Reviews</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
            <ul class="align-items-center m-0 navbar-nav">
                <li class="nav-item mx-2 d-lg-flex d-none">
                    <a role="button" href="/registration" class="border-2 secondary_btn p-2 px-4 rounded-2 rounded-pill py-2">Register</a>
                </li>
                @if (Auth::user() == null)
                    <li class="nav-item mx-2 d-lg-flex d-none">
                        <a role="button" href="/login" class="border-2 cta_btn p-2 px-4 rounded-2 rounded-pill py-2 text_shadow">Login</a>
                    </li>
                @else
                    @if (Auth::user()->hasRole('student'))
                        <li class="nav-item mx-2 d-lg-flex d-none">
                            <a role="button" href="/dashboard" class="border-2 cta_btn p-2 px-4 rounded-2 rounded-pill py-2 text_shadow @if (Request::is('change-syllabus')) active @endif">Dashboard</a>
                        </li>
                    @elseif(Auth::user()->hasRole('parent'))
                        <li class="nav-item mx-2 d-lg-flex d-none">
                            <a role="button" href="/change-child" class="border-2 cta_btn p-2 px-4 rounded-2 rounded-pill py-2 @if (Request::is('change-child')) active @endif">Dashboard</a>
                        </li>
                    @elseif(Auth::user()->hasRole('instructor'))
                        <li class="nav-item mx-2 d-lg-flex d-none">
                            <a role="button" href="/instructor/dashboard" class="border-2 cta_btn p-2 px-4 rounded-2 rounded-pill py-2 @if (Request::is('instructor/dashboard')) active @endif">Dashboard</a>
                        </li>
                    @elseif(Auth::user()->hasRole('admin'))
                        <li class="nav-item mx-2 d-lg-flex d-none">
                            <a role="button" href="/admin/dashboard" class="border-2 d-inline-flex cta_btn p-2 px-4 rounded-2 rounded-pill py-2 @if (Request::is('admin/dashboard')) active @endif">Dashboard</a>
                        </li>
                    @elseif(Auth::user()->hasRole('teacher'))
                        <li class="nav-item mx-2 d-lg-flex d-none">
                            <a role="button" href="/change-child" class="border-2 cta_btn p-2 px-4 rounded-2 rounded-pill py-2 @if (Request::is('change-child')) active @endif">Dashboard</a>
                        </li>
                    @endif
                @endif
            </ul>
        </div>
    </div>
</nav>
<div class="offcanvas offcanvas-top vh-100" data-bs-scroll="true" tabindex="-1" id="offcanvasTop" aria-labelledby="offcanvasTopLabel">
    <div class="offcanvas-header customize_sidebar_header">
        <a aria-label="Home" class="text-decoration-none text-dark d-flex align-items-center" href="/">
            <img src="{{ url('storage/' . app(\App\Settings\SiteSettings::class)->logo_path) }}" width="45" height="45" class="" alt="{{ url('storage/' . app(\App\Settings\SiteSettings::class)->app_name) }}"> 
        </a>
        <button type="button" class="border-0 bg-transparent" data-bs-dismiss="offcanvas" aria-label="Close">
            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 24 24" fill="var(--cta_primary)">
                <path d="m16.192 6.344-4.243 4.242-4.242-4.242-1.414 1.414L10.535 12l-4.242 4.242 1.414 1.414 4.242-4.242 4.243 4.242 1.414-1.414L13.364 12l4.242-4.242z"></path>
            </svg>
        </button>
    </div>
    <hr>
    <div class="offcanvas-body" style="list-style:none">
        <ul class="list-unstyled m-0">
            <li class="nav-item my-3"><a aria-label="Home" class="nav-link border-0 px-2" href="/">Home</a>
            </li>
            <li class="nav-item my-3"><a aria-label="Explore Pricings" class="nav-link border-0 px-2"
                    href="/pricing">Pricings</a></li>
            <li class="nav-item my-3"><a aria-label="Learn With Us" class="nav-link border-0 px-2 nav_dropdown_btn"
                    data-bs-toggle="collapse" href="#learnWithUs" role="button" aria-expanded="false"
                    aria-controls="learnWithUs">Learn With Us <svg xmlns="http://www.w3.org/2000/svg"
                        class="dropdown_svg_icon" width="16" height="16" viewBox="0 0 24 24">
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
                    class="nav-link border-0 px-2 nav_dropdown_btn" data-bs-toggle="collapse" href="#exploreTutors"
                    role="button" aria-expanded="false" aria-controls="exploreTutors">Explore Tutors 11+ <svg
                        xmlns="http://www.w3.org/2000/svg" class="dropdown_svg_icon" width="16" height="16"
                        viewBox="0 0 24 24">
                        <path d="M16.939 7.939 12 12.879l-4.939-4.94-2.122 2.122L12 17.121l7.061-7.06z"></path>
                    </svg></a>
                <div class="collapse" id="exploreTutors">
                    <div class="p-2"><a class="nav-link p-2 fw-normal text-white" href="/blogs">Blogs</a> <a
                            class="nav-link p-2 fw-normal text-white" href="/explore">Explore</a> <a
                            class="nav-link p-2 fw-normal text-white"
                            href="{{ route('school_list', ['page' => 1]) }}">Schools</a></div>
                </div>
            </li>
            <li class="nav-item my-3"><a aria-label="More For You" class="nav-link border-0 px-2 nav_dropdown_btn"
                    data-bs-toggle="collapse" href="#moreforyou" role="button" aria-expanded="false"
                    aria-controls="moreforyou">More For You <svg xmlns="http://www.w3.org/2000/svg"
                        class="dropdown_svg_icon" width="16" height="16" viewBox="0 0 24 24">
                        <path d="M16.939 7.939 12 12.879l-4.939-4.94-2.122 2.122L12 17.121l7.061-7.06z"></path>
                    </svg></a>
                <div class="collapse" id="moreforyou">
                    <div class="p-2"><a class="nav-link p-2 fw-normal text-white" href="/about">About Us</a> <a
                            class="nav-link p-2 fw-normal text-white" href="/contact">Contact Us</a> <a
                            class="nav-link p-2 fw-normal text-white" href="/help">Help & Support</a> <a
                            class="nav-link p-2 fw-normal text-white" href="/reviews">Reviews</a></div>
                </div>
            </li>
        </ul>
    </div>
</div>
