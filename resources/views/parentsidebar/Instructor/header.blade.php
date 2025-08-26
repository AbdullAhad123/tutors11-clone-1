<?php
    $firstN = Auth::user()->first_name;
    $lastN = Auth::user()->last_name;
    $fullname = $firstN . ' ' . $lastN;
    $imgpath = Auth::user()->profile_photo_path;
?>

<style>
  @media (min-width: 1199px) {
    .off_canvas_display {
      display: none !important;
    }
  }
  .navbar_user_avatar {
    height: 45px !important;
    width: 45px !important;
    position: relative;
    border: 2px solid #ffffff !important;
    outline: 2px solid #6cff00;
  }
  .user_avatar_online {
    height: 12px;
    width: 12px;
    background: #6cff00;
    position: absolute;
    bottom: -2px;
    right: 0px;
  }
  .portal_navbar {
    z-index: 999
  }
</style>

<div class="layout-page vh-100 overflow-auto">
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->
        <div>
            <!-- Layout Demo -->
            <div class="end-0 position-fixed progress-text shadow-sm start-0 portal_navbar">
                <div class="bg-white h-auto w-100">
                    <div class="px-3">
                        <!-- instructor navbar -->
                        <!-- <ul class="row justify-content-between align-items-center list-unstyled border-bottom m-0">
                            <li class="nav-item text-dark col-6 d-inline-flex transform_sidebar">
                                <button class="btn nav-item nav-link px-0 me-xl-4 bar_responsive "
                                    href="javascript:void(0)" type="button" data-bs-toggle="offcanvas"
                                    data-bs-target="#instructorSidebar" aria-controls="instructorSidebar">
                                    <i class="bx bx-menu bx-sm"></i>
                                </button>
                            </li>
                            <li class="col-6 nav-item navbar-dropdown dropdown-user dropdown text-end">
                                <a class="nav-link dropdown-toggle hide-arrow d-inline-flex" href="" data-bs-toggle="dropdown">
                                    <div class="avatar avatar-online ms-auto mb-2">
                                        @if($imgpath)
                                        <img src="/{{ $imgpath }}" alt class="w-px-40 h-auto rounded-3" />
                                        @else
                                        <img src="/profile-photos/user-profile-icon.svg" alt
                                            class="w-px-40 h-auto rounded-3" style="opacity: 0.2;" />
                                        @endif
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="/instructor/profile">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar avatar-online">
                                                        @if($imgpath)
                                                        <img src="/{{ $imgpath }}" alt
                                                            class="w-px-40 h-auto text-end rounded-3" />
                                                        @else
                                                        <img src="/profile-photos/user-profile-icon.svg" alt
                                                            class="w-px-40 h-auto text-end rounded-3"
                                                            style="opacity: 0.2;" />
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">

                                                    <span class="fw-semibold d-block">{{ $fullname }}</span>
                                                    {{-- <small class="text-muted">Admin</small> --}}
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="/instructor/profile">
                                            <i class="bx bx-user me-2"></i>
                                            <span class="align-middle">My Profile</span>
                                        </a>
                                    </li>
                                    <li>
                                        <form method="POST" action="{{ route('destroy') }}">
                                            @csrf
                                            <button type="submit" class="dropdown-item">
                                                <i class="bx bx-power-off me-2"></i>
                                                <span class="align-middle">Log Out</span>
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        </ul> -->
                        <ul class="row align-items-center border-bottom justify-content-between list-unstyled m-0 px-3">
                            <li class="nav-item col-6 text-dark d-inline-flex transform_sidebar">
                                <button class="btn nav-item nav-link px-0 me-xl-4 bar_responsive " href="javascript:void(0)" type="button" data-bs-toggle="offcanvas" data-bs-target="#instructorSidebar" aria-controls="instructorSidebar">
                                    <img src="{{url('images/admin_menu.png')}}" height="30" width="30" alt="menu icon">
                                </button>
                            </li>

                            <li class="nav-item col-6 d-inline-flex align-items-center justify-content-end">
                                <a type="button" href="/admin/media" class="mx-1 me-2 btn bg-transparent border-0 shadow-none px-1">
                                    <i class='bx bx-image-add fs-3' ></i>
                                </a>
                                <div class="dropdown">
                                <a class="nav-link hide-arrow px-1" type="button" data-bs-toggle="dropdown">
                                    @if($imgpath)
                                        <div class="navbar_user_avatar rounded-circle" style="background: url('/{{$imgpath}}') center no-repeat; background-size: cover">
                                    @else
                                        <div class="navbar_user_avatar rounded-circle" style="background: url('/images/user_avatar.webp') center no-repeat; background-size: cover">
                                    @endif
                                    <div class="user_avatar_online rounded-circle"></div>
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a href="/admin/profile" class="dropdown-item text-dark"><i class="bx bx-user me-1"></i><span class="m-0">My Profile</span></a></li>
                                    <li>
                                    <form method="POST" action="{{ route('destroy') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item text-dark"><i class="bx bx-log-out-circle me-1"></i><span class="m-0">Signout</span></button>
                                    </form>
                                    </li>
                                </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="offcanvas offcanvas-start off_canvas_display bg-white" tabindex="-1" id="instructorSidebar"
                aria-labelledby="instructorSidebarLabel" style="z-index: 10000!important;">
                <div class="offcanvas-header">
                    <div class="app-brand demo mt-3">
                        <a href="/admin/dashboard" class="app-brand-link">
                            <img src="{{url('profile-photos\3EXQhHaEDgzJJyYDWu8369Susv56n1E3URC3Aa15.png')}}"
                                alt="tutor 11 logo" style="width: 160px;">
                            <!-- <span class="app-brand-text demo menu-text fw-bolder ms-2">Tutor 11</span> -->
                        </a>
                        <a href="" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                            <i class="bx bx-chevron-left bx-sm align-middle"></i>
                        </a>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>

                <div class="offcanvas-body menu-vertical menu bg-menu-theme w-100 p-0">
                    <!-- Dashboard -->
                    <ul class="menu-inner py-3">
                        <!-- Layouts -->
                        <li class="menu-item w-100 active">
                            <a href="/instructor/dashboard" class="menu-link">
                            <span class="me-2">
                                <svg class="flex-shrink-0 w-5 h-5 ltr:mr-2 rtl:ml-2 transition group-hover:text-gray-300" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                </path>
                                </svg>
                            </span>
                            <div data-i18n="Home Dashboard">Home Dashboard</div>
                            </a>
                        </li>

                        <li class=" menu-item-header-active my-2 menu-header small text-uppercase rounded-3">
                            <span class="menu-header-text text-primary">ENGAGE</span>
                        </li>

                        <li class="menu-item w-100 menu_item_dropdown">
                            <a class="menu-link cursor-pointer">
                            <span class="me-2">
                                <svg class="flex-shrink-0 w-5 h-5 ltr:mr-2 rtl:ml-2 transition group-hover:text-gray-300" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                </path>
                                </svg>
                            </span>
                            <div data-i18n="Manage Tests" class="w-100 d-flex justify-content-between"><span>Manage Tests</span>
                                <span><i class="bx bx-chevron-right aside_chevron_icon"></i></span>

                            </div>
                            </a>
                            <ul class="list-unstyled p-0 m-0 px-5 menu_dropdown_sec list-unstyled" style="display: none;">
                            <li class="my-2">
                                <a class="ps-2 py-1 d-block sidebar_mini_links" href="/admin/quizzes">Quizzes</a>
                            </li>
                            <li class="my-2">
                                <a class="ps-2 py-1 d-block sidebar_mini_links" href="/admin/exams">Exams</a>
                            </li>
                            <li class="my-2">
                                <a class="ps-2 py-1 d-block sidebar_mini_links" href="/admin/quiz-types">Quiz Types</a>
                            </li>
                            <li class="my-2">
                                <a class="ps-2 py-1 d-block sidebar_mini_links" href="/admin/exam-types">Exam Types</a>
                            </li>
                            </ul>
                        </li>

                        <li class="menu-item w-100 menu_item_dropdown">
                            <a class="menu-link cursor-pointer">
                            <span class="me-2">
                                <svg class="flex-shrink-0 w-5 h-5 ltr:mr-2 rtl:ml-2 transition group-hover:text-gray-300"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M0 0h24v24H0z" fill="none"></path>
                                <path
                                    d="M9 21c0 .55.45 1 1 1h4c.55 0 1-.45 1-1v-1H9v1zm3-19C8.14 2 5 5.14 5 9c0 2.38 1.19 4.47 3 5.74V17c0 .55.45 1 1 1h6c.55 0 1-.45 1-1v-2.26c1.81-1.27 3-3.36 3-5.74 0-3.86-3.14-7-7-7zm2.85 11.1l-.85.6V16h-4v-2.3l-.85-.6C7.8 12.16 7 10.63 7 9c0-2.76 2.24-5 5-5s5 2.24 5 5c0 1.63-.8 3.16-2.15 4.1z">
                                </path>
                                </svg>
                            </span>
                            <div data-i18n="Manage Learning" class="w-100 d-flex justify-content-between"><span>Manage Learning</span>
                                <span><i class="bx bx-chevron-right aside_chevron_icon"></i></span></div>
                            </a>
                            <ul class="list-unstyled p-0 m-0 px-5 menu_dropdown_sec list-unstyled" style="display: none;">
                            <li class="my-2">
                                <a class="ps-2 py-1 d-block sidebar_mini_links" href="/admin/journeys">Journeys</a>
                            </li>
                            <li class="my-2">
                                <a class="ps-2 py-1 d-block sidebar_mini_links" href="/admin/practice-sets">Question Sets</a>
                            </li>
                            <li class="my-2">
                                <a class="ps-2 py-1 d-block sidebar_mini_links" href="/admin/practice/configure-lessons">Lessons</a>
                            </li>
                            <li class="my-2">
                                <a class="ps-2 py-1 d-block sidebar_mini_links" href="/admin/practice/configure-videos">Videos</a>
                            </li>
                            </ul>
                        </li>

                        <li class="menu-item w-100 w-100 menu_item_dropdown">
                            <a class="menu-link cursor-pointer">
                            <span class="me-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill='currentColor'><path d="m6.516 14.323-1.49 6.452a.998.998 0 0 0 1.529 1.057L12 18.202l5.445 3.63a1.001 1.001 0 0 0 1.517-1.106l-1.829-6.4 4.536-4.082a1 1 0 0 0-.59-1.74l-5.701-.454-2.467-5.461a.998.998 0 0 0-1.822 0L8.622 8.05l-5.701.453a1 1 0 0 0-.619 1.713l4.214 4.107zm2.853-4.326a.998.998 0 0 0 .832-.586L12 5.43l1.799 3.981a.998.998 0 0 0 .832.586l3.972.315-3.271 2.944c-.284.256-.397.65-.293 1.018l1.253 4.385-3.736-2.491a.995.995 0 0 0-1.109 0l-3.904 2.603 1.05-4.546a1 1 0 0 0-.276-.94l-3.038-2.962 4.09-.326z"></path></svg>
                            </span>
                            <div data-i18n="blogs" class="w-100 d-flex justify-content-between"><span>Reviews</span>
                                <span><i class="bx bx-chevron-right aside_chevron_icon"></i></span>
                            </div>
                            </a>
                            <ul class="list-unstyled p-0 m-0 px-5 menu_dropdown_sec list-unstyled" style="display: none;">
                            <li class="my-2">
                                <a class="ps-2 py-1 d-block sidebar_mini_links" href="/admin/reviews">Review List</a>
                            </li>
                            <li class="my-2">
                                <a class="ps-2 py-1 d-block sidebar_mini_links" href="{{route('create_review')}}">Create Review</a>
                            </li>
                            </ul>
                        </li>

                        <li class=" menu-item-header-active my-2 menu-header small text-uppercase rounded-3">
                            <span class="menu-header-text text-primary">LIBRARY</span>
                        </li>

                        <li class="menu-item w-100 menu_item_dropdown">
                            <a class="menu-link cursor-pointer">
                            <span class="me-2">
                                <svg class="flex-shrink-0 w-5 h-5 ltr:mr-2 rtl:ml-2 transition group-hover:text-gray-300" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                </path>
                                </svg>
                            </span>
                            <div data-i18n="Question Bank" class="w-100 d-flex justify-content-between"><span>Question Bank</span>
                                <span><i class="bx bx-chevron-right aside_chevron_icon"></i></span></div>
                            </a>
                            <ul class="list-unstyled p-0 m-0 px-5 menu_dropdown_sec list-unstyled" style="display: none;">
                                <li class="my-2">
                                    <a class="ps-2 py-1 d-block sidebar_mini_links" href="/admin/questions">All Questions</a>
                                </li>
                                <li class="my-2">
                                    <a class="ps-2 py-1 d-block sidebar_mini_links" href="/admin/approve-questions">Approve Questions</a>
                                </li>
                                <li class="my-2">
                                    <a class="ps-2 py-1 d-block sidebar_mini_links" href="/admin/approved-qustion">Approved</a>
                                </li>
                                <li class="my-2">
                                <a class="ps-2 py-1 d-block sidebar_mini_links" href="/admin/not-approved-qustion">Not Approved</a>
                                </li>
                                <li class="my-2">
                                    <a class="ps-2 py-1 d-block sidebar_mini_links" href="/admin/bulk-question-editor">Bulk Question Editor</a>
                                </li>
                                <li class="my-2">
                                    <a class="ps-2 py-1 d-block sidebar_mini_links" href="/admin/import-questions">Import Questions</a>
                                </li>
                                <li class="my-2">
                                    <a class="ps-2 py-1 d-block sidebar_mini_links" href="/admin/comprehensions">Comprehensions</a>
                                </li>
                                <li class="my-2">
                                    <a class="ps-2 py-1 d-block sidebar_mini_links" href="/admin/question-types">Question Types</a>
                                </li>
                                <li class="my-2">
                                    <a class="ps-2 py-1 d-block sidebar_mini_links" href="{{route('single_questions_transfer')}}">Single Questions Transfer</a>
                                </li>
                            </ul>
                        </li>

                        <li class="menu-item w-100">
                            <a href="/admin/lessons" class="menu-link">
                            <span class="me-2">
                                <svg class="flex-shrink-0 w-5 h-5 ltr:mr-2 rtl:ml-2 transition group-hover:text-gray-300" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                </path>
                                </svg>
                            </span>
                            <div data-i18n="Lesson Bank">Lesson Bank</div>
                            </a>
                        </li>

                        <li class="menu-item w-100">
                            <a href="/admin/videos" class="menu-link">
                            <span class="me-2">
                                <svg class="flex-shrink-0 w-5 h-5 ltr:mr-2 rtl:ml-2 transition group-hover:text-gray-300" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z">
                                </path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </span>
                            <div data-i18n="Video Bank">Video Bank</div>
                            </a>
                        </li>

                        <li class="menu-item w-100 menu_item_dropdown">
                            <a class="menu-link cursor-pointer">
                            <span class="me-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill='currentColor'><path d="M21 10h-2V4h1V2H4v2h1v6H3a1 1 0 0 0-1 1v9h20v-9a1 1 0 0 0-1-1zm-7 8v-4h-4v4H7V4h10v14h-3z"></path><path d="M9 6h2v2H9zm4 0h2v2h-2zm-4 4h2v2H9zm4 0h2v2h-2z"></path></svg>
                            </span>
                            <div data-i18n="Manage Learning" class="w-100 d-flex justify-content-between"><span>Manage Schools</span>
                                <span><i class="bx bx-chevron-right aside_chevron_icon"></i></span>
                            </div>
                            </a>
                            <ul class="list-unstyled p-0 m-0 px-5 menu_dropdown_sec list-unstyled" style="display: none;">
                                <li class="my-2">
                                    <a class="ps-2 py-1 d-block sidebar_mini_links" href="{{route('school.index')}}">Schools List</a>
                                </li>
                                <li class="my-2">
                                    <a class="ps-2 py-1 d-block sidebar_mini_links" href="{{route('school.create')}}">Create School</a>
                                </li>
                                <li class="my-2">
                                    <a class="ps-2 py-1 d-block sidebar_mini_links" href="{{route('regions_index')}}">Regions</a>
                                </li>
                            </ul>
                        </li>

                        <li class="menu-item w-100 menu_item_dropdown">
                            <a class="menu-link cursor-pointer">
                            <span class="me-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill='currentColor'><path d="M19.045 7.401c.378-.378.586-.88.586-1.414s-.208-1.036-.586-1.414l-1.586-1.586c-.378-.378-.88-.586-1.414-.586s-1.036.208-1.413.585L4 13.585V18h4.413L19.045 7.401zm-3-3 1.587 1.585-1.59 1.584-1.586-1.585 1.589-1.584zM6 16v-1.585l7.04-7.018 1.586 1.586L7.587 16H6zm-2 4h16v2H4z"></path></svg>
                            </span>
                            <div data-i18n="Blogs" class="w-100 d-flex justify-content-between"><span>Manage Blogs</span>
                                <span><i class="bx bx-chevron-right aside_chevron_icon"></i></span>
                            </div>
                            </a>
                            <ul class="list-unstyled p-0 m-0 px-5 menu_dropdown_sec list-unstyled" style="display: none;">
                            <li class="my-2">
                                <a class="ps-2 py-1 d-block sidebar_mini_links" href="/admin/blogs">Blogs List</a>
                            </li>
                            <li class="my-2">
                                <a class="ps-2 py-1 d-block sidebar_mini_links" href="{{route('create_blog')}}">Create Blogs</a>
                            </li>
                            </ul>
                        </li>

                        <li class="menu-item w-100">
                            <a href="{{route('get_media')}}" class="menu-link">
                            <span class="me-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill='currentColor'><path d="M4 5h13v7h2V5c0-1.103-.897-2-2-2H4c-1.103 0-2 .897-2 2v12c0 1.103.897 2 2 2h8v-2H4V5z"></path><path d="m8 11-3 4h11l-4-6-3 4z"></path><path d="M19 14h-2v3h-3v2h3v3h2v-3h3v-2h-3z"></path></svg>
                            </span>
                            <div data-i18n="Media">Media</div>
                            </a>
                        </li>

                        <li class=" menu-item-header-active my-2 menu-header small text-uppercase rounded-3">
                            <span class="menu-header-text text-primary">CONFIGURATION</span>
                        </li>

                        <li class="menu-item w-100 menu_item_dropdown">
                            <a class="menu-link cursor-pointer">
                            <span class="me-2">
                                <svg class="flex-shrink-0 w-5 h-5 ltr:mr-2 rtl:ml-2 transition group-hover:text-gray-300" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                                </path>
                                </svg>
                            </span>
                            <div data-i18n="Manage Subjects" class="w-100 d-flex justify-content-between"><span>Manage Subjects</span>
                                <span><i class="bx bx-chevron-right aside_chevron_icon"></i></span></div>
                            </a>
                            <ul class="list-unstyled p-0 m-0 px-5 menu_dropdown_sec list-unstyled" style="display: none;">
                            <li class="my-2">
                                <a class="ps-2 py-1 d-block sidebar_mini_links" href="/admin/sections">Subjects</a>
                            </li>
                            <li class="my-2">
                                <a class="ps-2 py-1 d-block sidebar_mini_links" href="/admin/skills">Topics</a>
                            </li>
                            <li class="my-2">
                                <a class="ps-2 py-1 d-block sidebar_mini_links" href="/admin/topics">Sub-topics</a>
                            </li>
                            </ul>
                        </li>

                        <li class="menu-item w-100 menu_item_dropdown">
                            <a class="menu-link cursor-pointer">
                                <span class="me-2">
                                <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 24 24" role="img" aria-labelledby="bugIconTitle" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" fill="none" stroke="currentColor"> <title id="bugIconTitle">Bug</title> <path d="M15 6.99989086C16.1045695 6.99989086 17 7.89532136 17 8.99989086L17 16.458686C17 17.1113133 16.6815784 17.722892 16.1469254 18.0971494L12 21 7.85307456 18.0971494C7.31842164 17.722892 7 17.1113133 7 16.458686L7 8.99989086C7 7.89532136 7.8954305 6.99989086 9 6.99989086 9.00005899 5.34308677 10.3431821 4 12 4 13.6568179 4 14.999941 5.34308677 15 6.99989086zM4 13L7 13"/> <polyline points="3 7 5 9 7 9"/> <polyline points="21 7 19 9 17 9"/> <polyline points="3 19 5 17 7 17"/> <polyline points="17 17 19 17 21 19 21 19"/> <path d="M17,13 L20,13"/> </svg>
                                </span>
                                <div data-i18n="Bugs" class="w-100 d-flex justify-content-between"><span>Bugs</span>
                                <span><i class="bx bx-chevron-right aside_chevron_icon"></i></span>
                                </div>
                            </a>
                            <ul class="list-unstyled p-0 m-0 px-5 menu_dropdown_sec list-unstyled" style="display: none;">
                                <li class="my-2">
                                <a class="ps-2 py-1 d-block sidebar_mini_links" href="{{route('software_errors')}}">Errors</a>
                                </li>
                                <li class="my-2">
                                <a class="ps-2 py-1 d-block sidebar_mini_links" href="{{route('questions_errors')}}">Ques. Faults</a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </div>
            </div>

            <div class="mt-2 pt-5 pb-3">