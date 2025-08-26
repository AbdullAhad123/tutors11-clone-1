<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}">
  <meta name="description" content="{{ app(\App\Settings\SiteSettings::class)->seo_description }}">
  <meta name="author" content="{{ app(\App\Settings\SiteSettings::class)->app_name }}">

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet" />

  <!-- Icons. Uncomment required icon fonts -->
  <link rel="stylesheet" href="{{url('Frontend_css/assets/fonts/boxicons.css')}}">

  <!-- Core CSS -->
  <link rel="stylesheet" href="{{url('Frontend_css/assets/vendor/css/core.css')}}"
    class="template-customizer-core-css" />
  <link rel="stylesheet" href="{{url('Frontend_css/assets/vendor/css/theme-default.css')}}"
    class="template-customizer-theme-css" />
  <link rel="stylesheet" href="{{url('Frontend_css/assets/css/demo.css')}}" />

  <!-- Vendors CSS -->
  <link rel="stylesheet" href="{{url('Frontend_css/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />

  <link rel="stylesheet" href="{{url('Frontend_css/assets/vendor/libs/apex-charts/apex-charts.css')}}" />

  <!-- Page CSS -->

  <!-- Helpers -->
  <script src="{{url('Frontend_css/assets/vendor/js/helpers.js')}}"></script>

  <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
  <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
  <script src="{{url('Frontend_css/assets/js/config.js')}}"></script>
  <style>
    svg {
      width: 22px;
      height: 38px;
    }

    .question_inner_image {
      /* width: 50%; */
      display: block;
    }

    a.sidebar_mini_links {
      color: #000 !important;
      transition: 0.25s
    }

    a.sidebar_mini_links:hover {
      color: var(--portal-primary) !important;
      scale: 1.03
    }

    .bg_label_published {
      background: #e2ffe6;
      color: #009b06;
    }

    .bg_label_draft {
      background: #ffe9e9;
      color: #e40000;
    }

    .bg_primary_label {
      background: #dcecff !important;
      color: #0075ff !important;
    }

    .alert_success {
      background: #eeffeb;
      color: #19a600;
      border: 1px solid #19a600;
    }

    .alert_failed {
      background: #ffebeb;
      color: #a60000;
      border: 1px solid #a60000;
    }

    .w_160 {
      min-width: 160px !important;
    }

    .w_250 {
      min-width: 250px !important;
    }

    .w_300 {
      min-width: 300px !important;
    }

    .w_400 {
      min-width: 400px !important;
    }

    .w_180 {
      min-width: 180px !important;
    }

    .w_200 {
      min-width: 200px !important;
    }

    .create_new_btn {
      background-color: orange !important;
    }

    .portal_sidebar {
      z-index: 1001 !important;
    }
  </style>


  <title>Document</title>
</head>

<body>
  @include('components.website-preloader')
  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <!-- Menu -->

      <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme overflow_scroll_aside vh-100 portal_sidebar">
        <div class="app-brand demo mt-3">
          <a href="/admin/dashboard" class="app-brand-link">
            <img src="{{url('profile-photos\3EXQhHaEDgzJJyYDWu8369Susv56n1E3URC3Aa15.png')}}" alt="tutor 11 logo"
              style="width: 160px;">
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
          <li class="menu-item active">
            <a href="/admin/dashboard" class="menu-link">
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

          <li class="menu-item menu_item_dropdown">
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

          <li class="menu-item menu_item_dropdown">
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
                <span><i class="bx bx-chevron-right aside_chevron_icon"></i></span>
              </div>
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

          <li class="menu-item menu_item_dropdown">
            <a class="menu-link cursor-pointer">
              <span class="me-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M19 13.586V10c0-3.217-2.185-5.927-5.145-6.742C13.562 2.52 12.846 2 12 2s-1.562.52-1.855 1.258C7.185 4.074 5 6.783 5 10v3.586l-1.707 1.707A.996.996 0 0 0 3 16v2a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1v-2a.996.996 0 0 0-.293-.707L19 13.586zM19 17H5v-.586l1.707-1.707A.996.996 0 0 0 7 14v-4c0-2.757 2.243-5 5-5s5 2.243 5 5v4c0 .266.105.52.293.707L19 16.414V17zm-7 5a2.98 2.98 0 0 0 2.818-2H9.182A2.98 2.98 0 0 0 12 22z"></path></svg>
              </span>
              <div data-i18n="Manage Learning" class="w-100 d-flex justify-content-between"><span>Notification</span>
                <span><i class="bx bx-chevron-right aside_chevron_icon"></i></span>
              </div>
            </a>
            <ul class="list-unstyled p-0 m-0 px-5 menu_dropdown_sec list-unstyled" style="display: none;">
              <li class="my-2">
                <a class="ps-2 py-1 d-block sidebar_mini_links" href="/admin/notifications/show">Notifications</a>
              </li>
              <li class="my-2">
                <a class="ps-2 py-1 d-block sidebar_mini_links" href="/admin/send-notification">Send Notification</a>
              </li>
            </ul>
          </li>

          <li class="menu-item">
            <a href="{{route('chat')}}" class="menu-link">
              <span class="me-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill='currentColor'><path d="M16 14h.5c.827 0 1.5-.673 1.5-1.5v-9c0-.827-.673-1.5-1.5-1.5h-13C2.673 2 2 2.673 2 3.5V18l5.333-4H16zm-9.333-2L4 14V4h12v8H6.667z"></path><path d="M20.5 8H20v6.001c0 1.1-.893 1.993-1.99 1.999H8v.5c0 .827.673 1.5 1.5 1.5h7.167L22 22V9.5c0-.827-.673-1.5-1.5-1.5z"></path></svg>
              </span>
              <div data-i18n="Chat">Chat</div>
            </a>
          </li>

          <li class="menu-item w-100 menu_item_dropdown">
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

          <li class="menu-item menu_item_dropdown">
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
                <span><i class="bx bx-chevron-right aside_chevron_icon"></i></span>
              </div>
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
              <li class="my-2">
                <a class="ps-2 py-1 d-block sidebar_mini_links" href="{{route('topic_selector')}}">Question Transfer</a>
              </li>
            </ul>
          </li>

          <li class="menu-item">
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

          <li class="menu-item">
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

          <li class="menu-item menu_item_dropdown">
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

          <li class="menu-item menu_item_dropdown">
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

          <li class="menu-item">
            <a href="{{route('get_media')}}" class="menu-link">
              <span class="me-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill='currentColor'><path d="M4 5h13v7h2V5c0-1.103-.897-2-2-2H4c-1.103 0-2 .897-2 2v12c0 1.103.897 2 2 2h8v-2H4V5z"></path><path d="m8 11-3 4h11l-4-6-3 4z"></path><path d="M19 14h-2v3h-3v2h3v3h2v-3h3v-2h-3z"></path></svg>
              </span>
              <div data-i18n="Media">Media</div>
            </a>
          </li>

          <li class="menu-item w-100">
              <a href="{{route('get_avatars')}}" class="menu-link">
                <span class="me-2">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill='currentColor'><path d="M4 5h13v7h2V5c0-1.103-.897-2-2-2H4c-1.103 0-2 .897-2 2v12c0 1.103.897 2 2 2h8v-2H4V5z"></path><path d="m8 11-3 4h11l-4-6-3 4z"></path><path d="M19 14h-2v3h-3v2h3v3h2v-3h3v-2h-3z"></path></svg>
                </span>
                <div data-i18n="Avatars">Avatars</div>
              </a>
            </li>

          <li class=" menu-item-header-active my-2 menu-header small text-uppercase rounded-3">
            <span class="menu-header-text text-primary">CONFIGURATION</span>
          </li>

          <li class="menu-item menu_item_dropdown">
            <a class="menu-link cursor-pointer">
              <span class="me-2">
                <svg class="flex-shrink-0 w-5 h-5 ltr:mr-2 rtl:ml-2 transition group-hover:text-gray-300"
                  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                  <path d="M0 0h24v24H0V0z" fill="none"></path>
                  <path
                    d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm.31-8.86c-1.77-.45-2.34-.94-2.34-1.67 0-.84.79-1.43 2.1-1.43 1.38 0 1.9.66 1.94 1.64h1.71c-.05-1.34-.87-2.57-2.49-2.97V5H10.9v1.69c-1.51.32-2.72 1.3-2.72 2.81 0 1.79 1.49 2.69 3.66 3.21 1.95.46 2.34 1.15 2.34 1.87 0 .53-.39 1.39-2.1 1.39-1.6 0-2.23-.72-2.32-1.64H8.04c.1 1.7 1.36 2.66 2.86 2.97V19h2.34v-1.67c1.52-.29 2.72-1.16 2.73-2.77-.01-2.2-1.9-2.96-3.66-3.42z">
                  </path>
                </svg>
              </span>
              <div data-i18n="Monetization" class="w-100 d-flex justify-content-between"><span>Monetization</span>
                <span><i class="bx bx-chevron-right aside_chevron_icon"></i></span>
              </div>
            </a>
            <ul class="list-unstyled p-0 m-0 px-5 menu_dropdown_sec list-unstyled" style="display: none;">
              <li class="my-2">
                <a class="ps-2 py-1 d-block sidebar_mini_links" href="/admin/plans">Plans</a>
              </li>
              <li class="my-2">
                <a class="ps-2 py-1 d-block sidebar_mini_links" href="/admin/plan-features">Plan Features</a>
              </li>
              <li class="my-2">
                <a class="ps-2 py-1 d-block sidebar_mini_links" href="/admin/subscriptions">Subscriptions</a>
              </li>
              <li class="my-2">
                <a class="ps-2 py-1 d-block sidebar_mini_links" href="/admin/payments">Payments</a>
              </li>
            </ul>
          </li>

          <li class="menu-item menu_item_dropdown">
            <a class="menu-link cursor-pointer">
              <span class="me-2">
                <svg class="flex-shrink-0 w-5 h-5 ltr:mr-2 rtl:ml-2 transition group-hover:text-gray-300" fill="none"
                  stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                  </path>
                </svg>
              </span>
              <div data-i18n="Monetization" class="w-100 d-flex justify-content-between"><span>Manage Users</span>
                <span><i class="bx bx-chevron-right aside_chevron_icon"></i></span>
              </div>
            </a>
            <ul class="list-unstyled p-0 m-0 px-5 menu_dropdown_sec list-unstyled" style="display: none;">
              <li class="my-2">
                <a class="ps-2 py-1 d-block sidebar_mini_links" href="/admin/users">Users</a>
              </li>
              <li class="my-2">
                <a class="ps-2 py-1 d-block sidebar_mini_links" href="/admin/user-groups">User Group</a>
              </li>
              <li class="my-2">
                <a class="ps-2 py-1 d-block sidebar_mini_links" href="/admin/contact">Users Contact</a>
              </li>
              <li class="my-2">
                <a class="ps-2 py-1 d-block sidebar_mini_links" href="/admin/subscripted-user">Subscripted Users</a>
              </li>
            </ul>
          </li>

          <li class="menu-item menu_item_dropdown">
            <a class="menu-link cursor-pointer">
              <span class="me-2">
                <svg class="flex-shrink-0 w-5 h-5 ltr:mr-2 rtl:ml-2 transition group-hover:text-gray-300" fill="none"
                  stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                  </path>
                </svg>
              </span>
              <div data-i18n="Monetization" class="w-100 d-flex justify-content-between"><span>Manage Categories</span>
                <span><i class="bx bx-chevron-right aside_chevron_icon"></i></span>
              </div>
            </a>
            <ul class="list-unstyled p-0 m-0 px-5 menu_dropdown_sec list-unstyled" style="display: none;">
              <li class="my-2">
                <a class="ps-2 py-1 d-block sidebar_mini_links" href="/admin/categories">Categories</a>
              </li>
              <li class="my-2">
                <a class="ps-2 py-1 d-block sidebar_mini_links" href="/admin/sub-categories">Year</a>
              </li>
              <li class="my-2">
                <a class="ps-2 py-1 d-block sidebar_mini_links" href="/admin/tags">Tags</a>
              </li>
            </ul>
          </li>

          <li class="menu-item menu_item_dropdown">
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
                <span><i class="bx bx-chevron-right aside_chevron_icon"></i></span>
              </div>
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

          <li class="menu-item menu_item_dropdown">
            <a class="menu-link cursor-pointer">
              <span class="me-2">
                <svg class="flex-shrink-0 w-5 h-5 ltr:mr-2 rtl:ml-2 transition group-hover:text-gray-300" fill="none"
                  stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                  </path>
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                </svg>
              </span>
              <div data-i18n="Manage Subjects" class="w-100 d-flex justify-content-between"><span>Settings</span>
                <span><i class="bx bx-chevron-right aside_chevron_icon"></i></span>
              </div>
            </a>
            <ul class="list-unstyled p-0 m-0 px-5 menu_dropdown_sec list-unstyled" style="display: none;">
              <li class="my-2">
                <a class="ps-2 py-1 d-block sidebar_mini_links" href="/admin/general-settings">General Settings</a>
              </li>
              <!-- <li class="my-2">
                <a class="ps-2 py-1 d-block sidebar_mini_links" href="/admin/localization-settings">Localization Settings</a>
              </li> -->
              <li class="my-2">
                <a class="ps-2 py-1 d-block sidebar_mini_links" href="/admin/home-settings">Page Settings</a>
              </li>
              <li class="my-2">
                <a class="ps-2 py-1 d-block sidebar_mini_links" href="/admin/email-settings">Email Settings</a>
              </li>
              <li class="my-2">
                <a class="ps-2 py-1 d-block sidebar_mini_links" href="/admin/payment-settings">Payment Settings</a>
              </li>
              <li class="my-2">
                <a class="ps-2 py-1 d-block sidebar_mini_links" href="/admin/billing-tax-settings">Billing & Tax Settings</a>
              </li>
              <!-- <li class="my-2">
                <a class="ps-2 py-1 d-block sidebar_mini_links" href="/admin/theme-settings">Theme Settings</a>
              </li> -->
              <li class="my-2">
                <a class="ps-2 py-1 d-block sidebar_mini_links" href="/admin/maintenance-settings">Maintenance Settings</a>
              </li>
            </ul>
          </li>

          <li class="menu-item menu_item_dropdown">
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
      </aside>

      <!-- / Menu -->




      <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css"> -->

      <!-- Core JS -->
      <!-- build:js assets/vendor/js/core.js -->
      <script src="{{url('Frontend_css/assets/vendor/libs/jquery/jquery.js')}}"></script>
      <script src="{{url('Frontend_css/assets/vendor/libs/popper/popper.js')}}"></script>
      <script src="{{url('Frontend_css/assets/vendor/js/bootstrap.js')}}"></script>
      <script src="{{url('Frontend_css/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>

      <script src="{{url('Frontend_css/assets/vendor/js/menu.js')}}"></script>
      <!-- endbuild -->

      <!-- Vendors JS -->
      <script src="{{url('Frontend_css/assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>

      <!-- Main JS -->
      <script src="{{url('Frontend_css/assets/js/main.js')}}"></script>

      <!-- Page JS -->
      <script src="{{url('Frontend_css/assets/js/dashboards-analytics.js')}}"></script>

      <!-- Place this tag in your head or just before your close body tag. -->
      <!-- <script async defer src="https://buttons.github.io/buttons.js"></script> -->

      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"
        integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

      <script>
        $(document).ready(function () {
          $(".menu_item_dropdown .menu-link").click(function () {
            let siderighticon = $(this).find(".aside_chevron_icon");
            let menuDropdownSec = $(this).siblings(".menu_dropdown_sec");

            if (siderighticon.hasClass("bx-chevron-right")) {
              siderighticon.removeClass("bx-chevron-right");
              siderighticon.addClass("bx-chevron-down");
              menuDropdownSec.slideDown(250);

            } else if (siderighticon.hasClass("bx-chevron-down")) {
              siderighticon.removeClass("bx-chevron-down");
              siderighticon.addClass("bx-chevron-right");
              menuDropdownSec.slideUp(250);
            }
          });
        });
      </script>

</body>

</html>
