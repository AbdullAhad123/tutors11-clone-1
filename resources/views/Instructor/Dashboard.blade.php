<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Dashboard</title>
  <!-- rel icon -->
  <link rel="icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}">
  <meta name="description" content="{{ app(\App\Settings\SiteSettings::class)->seo_description }}">
  <meta name="author" content="{{ app(\App\Settings\SiteSettings::class)->app_name }}">
  <style>
    .user_avater {
      background-size: cover;
      background-position: center;
    }

    .user_online_circle {
      width: 10px;
      height: 10px;
    }

    .online_users_wrap {
      max-height: 447px;
    }

    .header_section {
      height: auto;
      width: auto;
      background: #0067e5 !important;
      /* background: linear-gradient( 286deg , #003cc4 , #008eff) !important; */
      border-radius: 2rem;
    }

    .student_icons {
      height: 50px;
      width: 50px;
      background: #ff3232;
    }

    .teacher_icons {
      height: 50px;
      width: 50px;
      background: #ff9c00
    }

    @media (max-width: 768px) {
      .header_image {
        display: none !important
      }
    }

    .quick_info_cards {
      height: auto;
      width: auto;
      box-shadow: 0px 0px 4px 0px #00000017;
      border-radius: 0.9rem;
      transition: 0.25s
    }

    .quick_info_cards:hover {
      scale: 1.02;
      box-shadow: -1px 7px 5px 0px #00000024 !important
    }

    .w_120 {
      min-width: 120px !important;
    }

    .w_140 {
      min-width: 140px !important;
    }

    .w_250 {
      min-width: 250px !important;
    }

    .w_180 {
      min-width: 180px !important;
    }

    .user_photo {
      height: 40px;
      width: 40px;
      border: 1px solid #ffffff !important;
      outline: 1px solid #00ff2a;
    }

    .bg_label_online {
      background: #c2ffcc !important;
      color: #00c61f !important;
    }

    .documentation_overview {
      background: linear-gradient(315deg, #c38529, #d3a765);
    }

    .settings_section {
      background: linear-gradient(49deg, #198d5d, #00d47c);
      border-radius: 1.3rem
    }

    .docs_navigate_section {
      height: auto;
      width: auto;
      background: linear-gradient(108deg, #ef8f00, #ffaf37);
      border-radius: 1rem
    }

    .arrow_icon_link,
    .arrow_icon_link i.bx {
      transition: 0.2s
    }

    .arrow_icon_link:hover.arrow_icon_link i.bx {
      transform: translateX(3px)
    }

    .quick_links_section {
      height: auto;
      width: auto;
      background: linear-gradient(281deg, #0080ef, #0683ad);
      border-radius: 1rem
    }

    .docs_quick_links {
      color: #ffffff80;
      transition: 0.2s
    }

    .docs_quick_links:hover {
      color: #ffffff !important;
    }
  </style>

</head>

<body>
  @include('sidebar')
  @include('header')

  {{--<div class="col-lg-12">
    <div class="choose_child px-3 mt-2">
      <!-- row strat -->
      <div class="row m-0 justify-content-center">
        @foreach($stats as $stat)
        <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-4">
          <div class="bg-white px-2 py-3 syllabus_customized_box shadow">
            <div class="text-center">
              <h6 class="mt-2">{{ $stat['title'] }}</h6>
            </div>
            <div class="row text-center py-2">
              <h3 class="text-primary font_bold">{{ $stat['count'] }}</h3>
            </div>
          </div>
        </div>
        @endforeach

      </div>
      <!-- row end -->

      <div class="row m-0">
        <div class="col-lg-6 col-md-6 col-sm-12 col-12 p-2">
          <div class="bg-primary p-4 shadow">
            <h5 class="text-white font_bold my-3">To Teach To Learn Twice Over.</h5>
            <p class="text-white small my-3">
              To get most of your account, checkout our docs to understand how this app can serve
              you and your team.
            </p>
            <div class="col-12 text-end mb-4 mt-2">
              <a href="/admin/docs" target="_blank">
                <button class="btn btn-light btn-sm text-primary px-2 py-1 my-2 mb-3">ViewDocs</button>
              </a>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-12 p-2">
          <div class="bg-light p-3 shadow">
            <h6 class="text_black font_bold mt-2 px-2">QUICK LINKS</h6>
            <div class="row m-0">
              <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                <ul class="list-unstyled pt-1">
                  <li class="my-1"><a href="/admin/quizzes" class="text-primary">New Quiz Schedule</a></li>
                  <li class="my-1"><a href="/admin/quizzes/create" class="text-primary">Create New Quiz</a></li>
                  <li class="my-1"><a href="/admin/practice-sets/create" class="text-primary">Create Practise Set</a>
                  </li>
                  <li class="my-1"><a href="/admin/quizzes" class="text-primary">View Quizzes</a></li>
                  <li class="my-1"><a href="/admin/practice-sets" class="text-primary">View Question Sets</a></li>
                </ul>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                <ul class="list-unstyled pt-1">
                  <li class="my-1"><a href="/admin/questions" class="text-primary">Create New Question</a>
                  </li>
                  <li class="my-1"><a href="/admin/import-questions" class="text-primary">Import Question</a></li>
                  <li class="my-1"><a href="/admin/comprehensions" class="text-primary">Create New Comprehension</a></li>
                  <li class="my-1"><a href="/admin/skills" class="text-primary">Create New Topic</a></li>
                  <li class="my-1"><a href="/admin/topics" class="text-primary">Create New Sub-topic</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>--}}

  <section class="container-p-x my-5 py-4">

    <section class="header_section p-4 rounded-4 pb-2">
        <div class="row align-items-center m-0">
          <div class="col-lg-6 col-md-6 col-sm-12 col-12 my-2">
            <h1 class="mb-2 text-white text-capitalize">Welcome {{Auth::user()->first_name}}</h1>
            <p class="fs-5 text-white">Track, Manage and Update data on the website. You are in control now!</p>
            <div class="d-flex flex-wrap align-items-center my-3">
              <div class="active_students_container my-2 me-5 d-flex align-items-center">
                <div class="student_icons me-2 rounded-circle border d-inline-flex align-items-center justify-content-center">
                  <img src="{{url('images/graduation_icon.png')}}" height="30" width="30" alt="graduation icon">
                </div>
                <div>
                  <h2 class="h4 fw-medium text-white my-1">75,000</h2>
                  <p class="fw-normal text-white my-1">Active Students</p>
                </div>
              </div>
              <div class="active_teachers_container my-2 me-5 d-flex align-items-center">
                <div class="teacher_icons me-2 rounded-circle border d-inline-flex align-items-center justify-content-center">                    
                  <img src="{{url('images/teacher_icon.png')}}" height="30" width="30" alt="teacher icon">
                </div>
                <div>
                  <h2 class="h4 fw-medium text-white my-1">5,000</h2>
                  <p class="fw-normal text-white my-1">Experienced Mentors</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 col-lg-6 col-md-6 col-sm-12 my-2 text-center">
            <img src="{{url('images/instructor_header.png')}}" height="auto" width="350" class="header_image" alt="admin isometric">
          </div>
        </div>
    </section>

    <section class="quick_overview my-5">
        <h2 class="text-dark my-2">Quick Overview</h2>
        <div class="row my-4 mb-5 align-items-center">
          @foreach($stats as $stat)
            <div class="col-lg-6 col-md-6 col-sm-12 col-12 my-2">
              <a href="/admin/{{$stat['slug']}}" class="text-decoration-none">
                <div class="quick_info_cards d-flex w-100 align-items-center justify-content-between p-4 bg-white">
                  <div class="d-flex align-items-center">
                    <img src="{{url('images/' . $stat['key'] . '.png')}}" width="40" height="40" alt="{{$stat['title']}}">
                    <div class="ms-3">
                      <h2 class="h3 text-dark m-0">{{$stat['count']}}</h2>
                      <p class="text-dark fw-normal">{{$stat['title']}}</p>
                    </div>
                  </div>
                  <button class="bg-transparent border-0 btn btn-sm shadow-none"><i class="bx bx-right-arrow-alt text-dark fs-3"></i></button>
                </div>
              </a>
            </div>
            @endforeach
        </div>
    </section>

    <section class="settings_section my-5 shadow p-4">
      <div class="row m-0 align-items-center">
        <div class="col-lg-6 col-md-6 col-sm-12 col-12 my-2">
          <h2 class="text-white my-2">Upload Questions</h2>
          <p class="text-white my-2 mb-4 fs-5">Simplify the task of uploading questions on the student portal with incredible ease. With just one click, instructors can seamlessly initiate and streamline the process, making it quick and efficient for an optimal user experience.</p>
          <button onclick="document.location.href='/admin/questions'" class="btn btn-outline-light px-3 p-2">Start Uploading <i class='bx bx-right-arrow-alt'></i></button>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-12 my-2 text-center">
          <img src="{{url('images/data_entry.png')}}" width="500" height="auto" class="header_image" alt="admin settings illustration">
        </div>
      </div>
    </section>

    <section class="docs_section my-5">
      <div class="row align-items-center">
        <div class="col-lg-6 col-md-6 col-sm-12 col-12 my-2">
          <div class="docs_navigate_section p-4 py-5 shadow">
              <h2 class="text-white my-2 fw-semibold">Portal Management Basics</h2>
              <p class="text-white fs-5 my-2 mb-3">Unlock the full potential of your account by delving into our documentation, understanding how this app can best serve you and your team.</p>
              <a href="/admin/docs" target="_blank" class="arrow_icon_link fw-normal text-white mb-2">Start Reading <i class="bx bx-right-arrow-alt"></i></a>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-12 my-2">
          <div class="quick_links_section p-4 shadow bg-white rounded-5">
            <h2 class="text-white my-2 fw-semibold ">Quick Links</h2>
            <div class="d-flex flex-wrap align-items-center my-3 mb-0 justify-content-between">
              <ul class="list-unstyled p-0">
                <li class="my-1"><a href="/admin/quizzes" class="text-white docs_quick_links">New Quiz Schedule</a></li>
                <li class="my-1"><a href="/admin/quizzes/create" class="text-white docs_quick_links">Create New Quiz</a></li>
                <li class="my-1"><a href="/admin/practice-sets/create" class="text-white docs_quick_links">Create Practise Set</a></li>
              
              </ul>
              <ul class="list-unstyled p-0">
                <li class="my-1"><a href="/admin/quizzes" class="text-white docs_quick_links">View Quizzes</a></li>
                <li class="my-1"><a href="/admin/practice-sets" class="text-white docs_quick_links">View Question Sets</a></li>
                <li class="my-1"><a href="/admin/questions" class="text-white docs_quick_links">Create New Question</a></li>
              </ul>
              <ul class="list-unstyled p-0">
                <li class="my-1"><a href="/admin/comprehensions" class="text-white docs_quick_links">Create New Comprehension</a></li>
                <li class="my-1"><a href="/admin/skills" class="text-white docs_quick_links">Create New Topic</a></li>
                <li class="my-1"><a href="/admin/topics" class="text-white docs_quick_links">Create New Sub-topic</a></li>
                <li class="my-1"><a href="/admin/import-questions" class="text-white docs_quick_links">Import Question</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
    
  </section>  

  @include('parentsidebar.sidebarending')

</body>

</html>