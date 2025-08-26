@include('components.website-preloader')<nav class="navbar navbar-expand-lg absolute_nav" id="navbar_nav">
    <div class="container-lg py-1">
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
                    <ul class="border-0 dropdown-menu dropdown-menu-start p-2 rounded-1 shadow-lg">
                        @php
                            $loggedIn = Auth::user() != null;
                            $isStudent = $loggedIn && Auth::user()->hasRole('student');
                        @endphp
                        <li><a class="align-items-baseline d-flex dropdown-item fw-normal p-2" href="{{ $isStudent ? '/quizzes' : '/login' }}"><i class="fa-regular fa-file-lines"></i><span class="ms-2">Quizzes</span></a></li>
                        <li><a class="align-items-baseline d-flex dropdown-item fw-normal p-2" href="{{ $isStudent ? '/learn-practice' : '/login' }}"><i class="fa-solid fa-graduation-cap"></i> <span class="ms-2">Learn and Practise</span></a></li>
                    </ul>
                </li>
                <li class="nav-item text-center dropdown mx-1">
                    <button class="nav-link customize_dropdown border-0 px-2 bg-transparent text-white" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <span>Explore</span> 
                        <i class="fa fa-chevron-down fa-xs small ms-1 dropdown_toggle_icon"></i>
                    </button>
                    <ul class="border-0 dropdown-menu dropdown-menu-start p-2 rounded-1 shadow-lg">
                        <li>
                            <a class="align-items-baseline d-flex dropdown-item fw-normal p-2" href="/blogs">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="black"><path d="M19.875 3H4.125C2.953 3 2 3.897 2 5v14c0 1.103.953 2 2.125 2h15.75C21.047 21 22 20.103 22 19V5c0-1.103-.953-2-2.125-2zm0 16H4.125c-.057 0-.096-.016-.113-.016-.007 0-.011.002-.012.008L3.988 5.046c.007-.01.052-.046.137-.046h15.75c.079.001.122.028.125.008l.012 13.946c-.007.01-.052.046-.137.046z"></path><path d="M6 7h6v6H6zm7 8H6v2h12v-2h-4zm1-4h4v2h-4zm0-4h4v2h-4z"></path></svg> 
                                <span class="ms-2">Blogs</span>
                            </a>
                        </li>
                        <li>
                            <a class="align-items-baseline d-flex dropdown-item fw-normal p-2" href="/explore">
                                <i class="fa-solid fa-earth-europe"></i> <span class="ms-2">Explore</span>
                            </a>
                        </li>
                        <li>
                            <a class="align-items-baseline d-flex dropdown-item fw-normal p-2" href="{{ route('school_list', ['page' => 1]) }}">
                                <i class="fa-solid fa-school"></i>
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
                    <ul class="border-0 dropdown-menu dropdown-menu-start p-2 rounded-1 shadow-lg">
                        <li>
                            <a class="align-items-baseline d-flex dropdown-item fw-normal p-2" href="/contact">
                                <i class="fa-solid fa-headset"></i> <span class="ms-2">Contact Us</span>
                            </a>
                        </li>
                        <li>
                            <a class="align-items-baseline d-flex dropdown-item fw-normal p-2" href="/help">
                                <i class="fa-solid fa-circle-info"></i> <span class="ms-2">Help & Support</span>
                            </a>
                        </li>
                        <li>
                            <a class="align-items-baseline d-flex dropdown-item fw-normal p-2" href="/reviews">
                                <i class="fa-solid fa-star text-reset"></i> <span class="ms-2">Reviews</span>
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
<div class="offcanvas offcanvas-top vh-100" data-bs-scroll="true" tabindex="-1" id="offcanvasTop"
    aria-labelledby="offcanvasTopLabel">
    <div class="offcanvas-header customize_sidebar_header"><a aria-label="Home"
            class="text-decoration-none text-dark d-flex align-items-center" href="/"><img
                src="{{ url('storage/' . app(\App\Settings\SiteSettings::class)->logo_path) }}" width="45"
                height="45" class=""
                alt="{{ url('storage/' . app(\App\Settings\SiteSettings::class)->app_name) }}"> </a><button
            type="button" class="border-0 bg-transparent" data-bs-dismiss="offcanvas" aria-label="Close"><svg
                xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 24 24"
                style="stroke:#0f67f5">
                <path
                    d="m16.192 6.344-4.243 4.242-4.242-4.242-1.414 1.414L10.535 12l-4.242 4.242 1.414 1.414 4.242-4.242 4.243 4.242 1.414-1.414L13.364 12l4.242-4.242z">
                </path>
            </svg></button></div>
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
