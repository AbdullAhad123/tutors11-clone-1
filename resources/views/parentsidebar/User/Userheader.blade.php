<?php
    use App\Models\UserAvatar;
    $firstN = Auth::user()->first_name;
    $lastN = Auth::user()->last_name;
    $fullname = $firstN . ' ' . $lastN;

    if(Auth::user()->avatar_selected){
      $path = UserAvatar::join('avatars', 'users_avatars.avatar', '=', 'avatars.id')
      ->where('users_avatars.user', Auth::user()->id)
      ->where('users_avatars.is_selected', true)
      ->select('avatars.path')
      ->first();
      $imgpath = $path->path;
  } else {
      $imgpath = Auth::user()->profile_photo_path;
  }
  $imgpath = $imgpath ? $imgpath : url('images/user_profile.png')
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
<script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

<style>
  body {
    background-color: #a2abc514 !important;
  }

  .username_overflow {
    width: 150px;
    white-space: nowrap;
    text-overflow: ellipsis;
    overflow: hidden;
  }

  .custom_navbar_list li.nav-item {
    transition: 0.25s;
  }

  .custom_navbar_list li.nav-item .active {
    color: #000000 !important;
    font-weight: 500;
  }

  .custom_navbar_list li.nav-item:hover {
    color: #000000 !important;
    background: #f0f0f0;
  }

  .small_bx_icon {
    font-size: 20px;
  }

  .navbar_svg {
    height: 20px !important;
    fill: #6d6d6d !important;
  }

  a.nav-link {
    font-size: 17px;
    transition: 0.25s;
    color: #585858 !important;
  }

  a.nav-link:hover .color_bx_icon {
    color: #004bb2 !important
  }

  a.nav-link:hover {
    color: #004bb2 !important
  }

  a.dropdown-item {
    transition: 0.3s;
  }

  a.dropdown-item:hover {
    color: #004bb2 !important;
  }

  a.dropdown-item:hover .navbar_svg {
    fill: #004bb2 !important
  }

  .menu-item:hover .navbar_svg {
    fill: #004bb2 !important
  }

  a.dropdown-item:hover i.bx {
    color: #004bb2 !important
  }

  .menu-item {
    color: #000 !important;
    transition: 0.3s;
  }

  .menu-item:hover {
    color: #004bb2 !important
  }

  .menu-item:hover a.menu-link {
    color: #004bb2 !important
  }

  .menu-item:hover .color_bx_icon {
    color: #004bb2 !important
  }

  .color_bx_icon {
    color: #6d6d6d;
  }

  .profile_dropdown_button {
    height: 40px;
    width: 40px;
  }

  @media (max-width: 375px) {
    .navbar_right_button {
      display: none !important;
    }

    .profile_avatar_section {
      margin-left: auto;
    }
  }

  thead,
  .table_head {
    /* background-color: var(--portal-primary)!important; */
  }

  .resume_btn:hover {
    background-color: var(--portal-secondary) !important;

  }

  .resume_btn {
    background-color: var(--portal-secondary) !important;

  }

  /* thead th {
            color: #fff !important;
            font-weight: 600 !important;
        } */

  @media (max-width: 375px) {
    .row_pagination_section {
      font-size: 3.75vw !important;
    }

    .row_pagination_section select {
      font-size: 4vw !important
    }

    .page_numbers_section {
      font-size: 3.75vw !important;
    }
  }

  .nav-tabs .body_section_nav.active a.nav_tab_link {
    color: #ffffff !important;
    background: var(--portal-primary) !important;
  }

  .nav-tabs .nav-item .nav-link:not(.active) {
    /* background: #fff !important; */
  }

  .btn_login_primary {
    background-color: #004bb2;
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

  .question_details img {
    width: 35% !important;
    display: block;
    margin: 1rem auto;
  }

  @media (max-width: 500px) {
    .question_details img {
      width: 60% !important;
    }
  }

  .choices__inner {
    background-color: #ffffff;
    color: #404040;
    padding: 13px 12px !important;
    border-radius: 6px;
  }

  #notification:hover {
    color: var(--bs-primary);
  }

  .notification_menu {
    max-height: 300px;
    min-width: 16rem;
    cursor: default;
  }

  /* Notification */
  .btn-dropdown {
    padding: 0 !important;
  }

  .notification-small-size {
    font-size: 12px
  }

  #flexCheckDefault {
    color: black !important;
  }

  /* chat box */
  body {
    font-family: 'Roboto Slab', sans-serif !important;
    background: #f5faff;
  }

  a:link,
  a:visited {
    color: #444;
    text-decoration: none;
    transition: all 0.4s ease-in-out;
  }

  h1.modal-title {
    text-align: center;
    display: block;
    background: linear-gradient(to right top, #016dd8, #1398fe);
    color: #fff;
    border-radius: 50px;
  }

  /* CSS Multiple Whatsapp Chat */
  .whatsapp-name {
    font-size: 16px;
    font-weight: 600;
    padding-bottom: 0;
    margin-bottom: 0;
    line-height: 0.5;
  }

  #whatsapp-chat {
    box-sizing: border-box !important;
    outline: none !important;
    position: fixed;
    width: 350px;
    border-radius: 10px;
    /* box-shadow: 0 1px 15px rgba(32, 33, 36, 0.28);  */
    bottom: 15px;
    right: 15px;
    overflow: hidden;
    z-index: 99;
    animation-name: showchat;
    animation-duration: 1s;
    transform: scale(1);
    /* height: 210px; */
    overflow-y: hidden;
  }

  a.blantershow-chat {
    position: fixed;
    display: flex;
    font-weight: 400;
    justify-content: space-between;
    align-items: center;
    z-index: 98;
    bottom: 15px;
    right: 15px;
    font-size: 15px;
    border-radius: 30px;
  }

  a.blantershow-chat svg {
    transform: scale(1.2);
    margin: 0 10px 0 0;
  }

  .header-chat {

    background: #009688;
    background: #323236;
    color: #fff;
    padding: 10px;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
  }

  .header-chat h3 {
    margin: 0 0 10px;
  }

  .header-chat p {
    font-size: 14px;
    line-height: 1.7;
    margin: 0;
  }

  a.informasi {
    padding: 20px;
    display: block;
    overflow: hidden;
    animation-name: showhide;
    animation-duration: 0.5s;
  }

  a.informasi:hover {
    background: #f1f1f1;
  }

  .info-chat span {
    display: block;
  }

  #get-label,
  span.chat-label {
    font-size: 12px;
    color: #888;
  }

  #get-nama,
  span.chat-nama {
    margin: 5px 0 0;
    font-size: 15px;
    font-weight: 700;
    color: #222;
  }

  #get-label,
  #get-nama {
    color: #fff;
  }

  span.my-number {
    display: none;
  }


  #chat-input {
    border: none;
    width: 100%;
    height: 43px;
    outline: none;
    resize: none;
    padding: 10px;
    font-size: 14px;
  }

  a#send-it {
    /* width: 30px; */
    /* font-weight: 700; */
    padding: 10px 10px 0;
    background: #eee;
    /* border-radius: 10px; */
  }

  a#send-it svg {
    fill: #a6a6a6;
    height: 24px;
    width: 24px;
  }

  .first-msg {
    background: transparent;
    padding: 30px;
    text-align: center;
  }

  .first-msg span {
    background: #e2e2e2;
    color: #333;
    font-size: 14.2px;
    line-height: 1.7;
    border-radius: 10px;
    padding: 15px 20px;
    display: inline-block;
  }

  .blanter-msg {
    display: flex;
  }

  .start-chat {
    max-height: 50vh;
    overflow-y: scroll;
    padding-bottom: 42px;
  }

  #get-number {
    display: none;
  }

  a.close-chat {
    position: absolute;
    top: 10px;
    right: 15px;
    color: #fff;
    transition: 0.25s
  }

  a.close-chat:hover {
    color: #ff6262
  }

  @keyframes ZpjSY {
    0% {
      background-color: #b6b5ba;
    }

    15% {
      background-color: #111111;
    }

    25% {
      background-color: #b6b5ba;
    }
  }

  @keyframes hPhMsj {
    15% {
      background-color: #b6b5ba;
    }

    25% {
      background-color: #111111;
    }

    35% {
      background-color: #b6b5ba;
    }
  }

  @keyframes iUMejp {
    25% {
      background-color: #b6b5ba;
    }

    35% {
      background-color: #111111;
    }

    45% {
      background-color: #b6b5ba;
    }
  }

  @keyframes showhide {
    from {
      transform: scale(0.5);
      opacity: 0;
    }
  }

  @keyframes showchat {
    from {
      transform: scale(0);
      opacity: 0;
    }
  }

  @media screen and (max-width: 480px) {
    #whatsapp-chat {
      width: auto;
      left: 5%;
      right: 5%;
      font-size: 80%;
    }
  }

  .hide {
    display: none;
    /* animation-name: showhide; */
    animation-duration: 0.5s;
    transform: scale(1);
    opacity: 1;
  }

  .show {
    display: block;
    /* animation-name: showhide; */
    animation-duration: 0.5s;
    transform: scale(1);
    opacity: 1;
  }

  .whatsapp-message-container {
    display: flex;
    z-index: 1;
  }

  .whatsapp-message {
    padding: 7px 14px 6px;
    background-color: white;
    border-radius: 0px 8px 8px;
    position: relative;
    transition: all 0.3s ease 0s;
    opacity: 0;
    transform-origin: center top 0px;
    z-index: 2;
    box-shadow: rgba(0, 0, 0, 0.13) 0px 1px 0.5px;
    margin-top: 4px;
    margin-left: -54px;
    max-width: calc(100% - 66px);
  }

  .whatsapp-chat-body {
    padding: 20px 20px 20px 10px;
    background-color: #e6ddd4;
    position: relative;
  }

  .whatsapp-chat-body::before {
    display: block;
    position: absolute;
    content: "";
    left: 0px;
    top: 0px;
    height: 100%;
    width: 100%;
    z-index: 0;
    opacity: 0.08;
    /* background-image: url("https://elfsight.com/assets/chats/patterns/whatsapp.png"); */
  }

  .chat_box_wrap {
    display: flex;
    z-index: 1;
  }

  .eJJEeC {
    background-color: white;
    width: 52.5px;
    height: 32px;
    border-radius: 16px;
    display: flex;
    -moz-box-pack: center;
    justify-content: center;
    -moz-box-align: center;
    align-items: center;
    margin-left: 10px;
    opacity: 0;
    transition: all 0.1s ease 0s;
    z-index: 1;
    box-shadow: rgba(0, 0, 0, 0.13) 0px 1px 0.5px;
  }

  .hFENyl {
    position: relative;
    display: flex;
  }

  .ixsrax {
    height: 5px;
    width: 5px;
    margin: 0px 2px;
    border-radius: 50%;
    display: inline-block;
    position: relative;
    animation-duration: 1.2s;
    animation-iteration-count: infinite;
    animation-timing-function: linear;
    top: 0px;
    background-color: #9e9da2;
    animation-name: ZpjSY;
  }

  .dRvxoz {
    height: 5px;
    width: 5px;
    margin: 0px 2px;
    background-color: #b6b5ba;
    border-radius: 50%;
    display: inline-block;
    position: relative;
    animation-duration: 1.2s;
    animation-iteration-count: infinite;
    animation-timing-function: linear;
    top: 0px;
    animation-name: hPhMsj;
  }

  .chat_box {
    padding: 7px 14px 6px;
    background-color: white;
    position: relative;
    transition: all 0.3s ease 0s;
    opacity: 0;
    transform-origin: center top 0px;
    z-index: 2;
    box-shadow: rgba(0, 0, 0, 0.13) 0px 1px 0.5px;
    margin-top: 4px;
    margin-left: -54px;
    max-width: calc(100% - 66px);
  }

  .chat_box::before {
    position: absolute;
    background-image: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAmCAMAAADp2asXAAAABGdBTUEAALGPC/xhBQAAAAFzUkdCAK7OHOkAAACQUExURUxpccPDw9ra2m9vbwAAAAAAADExMf///wAAABoaGk9PT7q6uqurqwsLCycnJz4+PtDQ0JycnIyMjPf3915eXvz8/E9PT/39/RMTE4CAgAAAAJqamv////////r6+u/v7yUlJeXl5f///5ycnOXl5XNzc/Hx8f///xUVFf///+zs7P///+bm5gAAAM7Ozv///2fVensAAAAvdFJOUwCow1cBCCnqAhNAnY0WIDW2f2/hSeo99g1lBYT87vDXG8/6d8oL4sgM5szrkgl660OiZwAAAHRJREFUKM/ty7cSggAABNFVUQFzwizmjPz/39k4YuFWtm55bw7eHR6ny63+alnswT3/rIDzUSC7CrAziPYCJCsB+gbVkgDtVIDh+DsE9OTBpCtAbSBAZSEQNgWIygJ0RgJMDWYNAdYbAeKtAHODlkHIv997AkLqIVOXVU84AAAAAElFTkSuQmCC");
    background-position: 50% 50%;
    background-repeat: no-repeat;
    background-size: contain;
    content: "";
    top: 0px;
    width: 12px;
    height: 19px;
  }

  .chat_box_left {
    border-radius: 0px 8px 8px;
  }

  .chat_box_right {
    border-radius: 8px 0px 8px 8px;
  }

  .chat_box_left::before {
    left: -12px;
  }

  .chat_box_right::before {
    right: -12px;
    -webkit-transform: scaleX(-1);
    transform: scaleX(-1);
  }

  .bMIBDo {
    font-size: 13px;
    font-weight: 700;
    line-height: 18px;
    color: rgba(0, 0, 0, 0.4);
  }

  .iSpIQi {
    font-size: 14px;
    line-height: 19px;
    margin-top: 4px;
    color: #111111;
  }

  .iSpIQi {
    font-size: 14px;
    line-height: 19px;
    margin-top: 4px;
    color: #111111;
  }

  .cqCDVm {
    text-align: right;
    margin-top: 4px;
    font-size: 12px;
    line-height: 16px;
    color: rgba(17, 17, 17, 0.5);
    margin-right: -8px;
    margin-bottom: -4px;
  }

  .navbar_svg {
    height: 20px;
    fill: #6d6d6d;
  }

  .offcanvas {
    /* width: 280px; */
  }

  .modal-header {
    background-color: #f7f7f7;
  }

  .modal-body {
    background-color: #f7f7f7;
  }

  .login_error {
    top: 68px;
  }

  .offcanvas {
    overflow: scroll;
  }

  .fs_cs_5 {
    font-size: 1.1rem!important;
  }

  .chat_details_badge {
    width: 110px;
    font-size: 14px;
    background-color: #ffe1af;
    border: 1px solid #f1bc68;
    color: #cd7f00
  }
  @media (max-width: 575px) {
    .chat_details_badge{
      display: none
    }
  }

  .notification_dot {
    height: 22px;
    width: 22px;
    font-size: 80%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-family: monospace;
  }

</style>

  @include('components.website-preloader')
  <div class="layout-page vh-100 overflow-auto">
    <div class="w-100">
      @if (Session::has('errorMessage'))
          <div id="loginError" class="position-relative px-3">
              <div class="position-absolute login_error zindex-5 w-100" >
                  <div class="alert alert-danger mt-3 me-5 shadow">
                      <svg fill="#ff3e1d" height="30px" width="30px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
                          viewBox="0 0 52 52" xml:space="preserve">
                          <g>
                              <path d="M26,0C11.664,0,0,11.663,0,26s11.664,26,26,26s26-11.663,26-26S40.336,0,26,0z M26,50C12.767,50,2,39.233,2,26
                                  S12.767,2,26,2s24,10.767,24,24S39.233,50,26,50z"/>
                              <path d="M35.707,16.293c-0.391-0.391-1.023-0.391-1.414,0L26,24.586l-8.293-8.293c-0.391-0.391-1.023-0.391-1.414,0
                                  s-0.391,1.023,0,1.414L24.586,26l-8.293,8.293c-0.391,0.391-0.391,1.023,0,1.414C16.488,35.902,16.744,36,17,36
                                  s0.512-0.098,0.707-0.293L26,27.414l8.293,8.293C34.488,35.902,34.744,36,35,36s0.512-0.098,0.707-0.293
                                  c0.391-0.391,0.391-1.023,0-1.414L27.414,26l8.293-8.293C36.098,17.316,36.098,16.684,35.707,16.293z"/>
                          </g>
                      </svg>
                    
                      {{Session::get('errorMessage')}}
                  </div>
              </div>
          </div>
      @endif
      <div class="top_header bg-white shadow-sm py-2 position-fixed start-0 top-0 end-0 zindex-5">
          <div class="container d-flex align-items-center">
              <button class="btn btn-transparent border-0 px-2 shadow-none d-lg-none me-1" type="button" data-bs-toggle="offcanvas"
                  data-bs-target="#header_to_sidebar" aria-controls="header_to_sidebar"><i
                  class='bx bx-menu bx-sm'></i>
              </button>
              <a class="navbar-brand me-2" href="/dashboard">
                  <img src="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->logo_path) }}" class="img-fluid" width="45" height="45" alt="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->app_name) }}">
              </a>
              <nav class="navbar navbar-expand-lg">
                  <div class="container">
                      <div class="collapse navbar-collapse" id="navbarNav">
                          <ul class="navbar-nav custom_navbar_list">
                              <li class="nav-item px-1 rounded-2 m-1 mx-2">
                                  <a class="align-items-center d-flex fs-6 nav-link p-0 pt-1 border-0 btn" aria-current="page" href="{{route('user_dashboard')}}">
                                      <img src="{{url('images/dashboard_icon.png')}}" class="me-1" height="20" width="auto" alt="dashboard icon">Dashboard
                                  </a>
                              </li>
                              <li class="nav-item dropdown rounded-2 m-1 mx-2 px-1">
                                  <a class="align-items-center d-flex fs-6 nav-link p-0 pt-1 border-0 btn" href="#dropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                      <img src="{{url('images/analysis_icon.png')}}" class="me-1" height="20" width="auto" alt="reports icon"> Reports
                                      <i class='bx bxs-chevron-down small_bx_icon'></i>
                                  </a>
                                  <ul class="dropdown-menu border-0 shadow-lg rounded-3 p-2">
                                      <li>
                                          <a class="dropdown-item p-1" href="{{route('my_progress')}}">
                                              <ul class=" p-0 p-2 list-unstyled">
                                                  <li class="d-flex justify-content-start">
                                                      <div class="me-2">
                                                          <svg class="navbar_svg" xmlns="http://www.w3.org/2000/svg"
                                                              viewBox="0 0 24 24" fill="#6d6d6d"
                                                              class="">
                                                              <path d="M0 0h24v24H0V0z" fill="none"></path>
                                                              <path
                                                              d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V5h14v14zM7 10h2v7H7zm4-3h2v10h-2zm4 6h2v4h-2z">
                                                              </path>
                                                          </svg>
                                                      </div>
                                                      <div>
                                                          <div class='text-dark'>My Progress</div>
                                                          <div class="h6 text-dark my-1">Monitor and manage your practises progress.</div>
                                                      </div>
                                                  </li>
                                              </ul>
                                          </a>
                                      </li>
                                      <li>
                                          <a class="dropdown-item p-1" href="{{route('student_mastery_level')}}">
                                              <ul class=" p-0 p-2 list-unstyled">
                                                  <li class="d-flex justify-content-start">
                                                      <div class="me-2">
                                                          <svg class="navbar_svg"xmlns="http://www.w3.org/2000/svg" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 441 512.02" fill="#6d6d6d" class="group-hover:text-white ltr:mr-3 rtl:ml-3 flex-shrink-0 h-6 w-6 text-secondary">
                                                            <path d="M324.87 279.77c32.01 0 61.01 13.01 82.03 34.02 21.09 21 34.1 50.05 34.1 82.1 0 32.06-13.01 61.11-34.02 82.11l-1.32 1.22c-20.92 20.29-49.41 32.8-80.79 32.8-32.06 0-61.1-13.01-82.1-34.02-21.01-21-34.02-50.05-34.02-82.11s13.01-61.1 34.02-82.1c21-21.01 50.04-34.02 82.1-34.02zM243.11 38.08v54.18c.99 12.93 5.5 23.09 13.42 29.85 8.2 7.01 20.46 10.94 36.69 11.23l37.92-.04-88.03-95.22zm91.21 120.49-41.3-.04c-22.49-.35-40.21-6.4-52.9-17.24-13.23-11.31-20.68-27.35-22.19-47.23l-.11-1.74V25.29H62.87c-10.34 0-19.75 4.23-26.55 11.03-6.8 6.8-11.03 16.21-11.03 26.55v336.49c0 10.3 4.25 19.71 11.06 26.52 6.8 6.8 16.22 11.05 26.52 11.05h119.41c2.54 8.79 5.87 17.25 9.92 25.29H62.87c-17.28 0-33.02-7.08-44.41-18.46C7.08 432.37 0 416.64 0 399.36V62.87c0-17.26 7.08-32.98 18.45-44.36C29.89 7.08 45.61 0 62.87 0h173.88c4.11 0 7.76 1.96 10.07 5l109.39 118.34c2.24 2.43 3.34 5.49 3.34 8.55l.03 119.72c-8.18-1.97-16.62-3.25-25.26-3.79v-89.25zm-229.76 54.49c-6.98 0-12.64-5.66-12.64-12.64 0-6.99 5.66-12.65 12.64-12.65h150.49c6.98 0 12.65 5.66 12.65 12.65 0 6.98-5.67 12.64-12.65 12.64H104.56zm0 72.3c-6.98 0-12.64-5.66-12.64-12.65 0-6.98 5.66-12.64 12.64-12.64h142.52c3.71 0 7.05 1.6 9.37 4.15a149.03 149.03 0 0 0-30.54 21.14H104.56zm0 72.3c-6.98 0-12.64-5.66-12.64-12.65 0-6.98 5.66-12.64 12.64-12.64h86.2c-3.82 8.05-6.95 16.51-9.29 25.29h-76.91zm187.98 17.13 20.56 19.44 41.38-42.02c3.86-3.92 6.27-7.05 11.05-2.17l15.45 15.82c5.06 5.01 4.8 7.94.01 12.63l-59.09 58.07c-10.07 9.88-8.33 10.51-18.54.34l-36.84-36.62c-2.1-2.3-1.88-4.63.42-6.96l17.93-18.57c2.72-2.82 4.88-2.64 7.67.04z" stroke-width="2"></path>
                                                          </svg>
                                                      </div>
                                                      <div>
                                                          <div class='text-dark'>Mastery Level</div>
                                                          <div class="h6 text-dark my-1">Gauge and enhance expertise across various subjects.</div>
                                                      </div>
                                                  </li>
                                              </ul>
                                          </a>
                                      </li>
                                      
                                  </ul>
                              </li>
                              <li class="nav-item dropdown rounded-2 m-1 mx-2 px-1">
                                <a class="align-items-center d-flex fs-6 nav-link p-0 pt-1 text-dark fw-normal btn border-0" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><img src="{{url('images/learning_journey_icon.png')}}" class="me-1" height="25" width="25" alt="resources icon">Journey<i class="bx bxs-chevron-down small_bx_icon"></i></a>
                                <ul class="dropdown-menu border-0 shadow-lg rounded-3 p-2">
                                    <li>
                                      <a class="dropdown-item p-1" href="{{route('student_journey_progress')}}">
                                          <ul class="p-0 p-2 list-unstyled">
                                            <li class="d-flex justify-content-start">
                                                <div class="me-2">
                                                  <svg class="navbar_svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#6d6d6d" >
                                                    <path d="M0 0h24v24H0V0z" fill="none"></path>
                                                    <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V5h14v14zM7 10h2v7H7zm4-3h2v10h-2zm4 6h2v4h-2z"></path>
                                                  </svg>
                                                </div>
                                                <div>
                                                  <div class="text-dark">Progress</div>
                                                  <p class="h6 text-dark my-1">Monitor and manage your journey progress.</p>
                                                </div>
                                            </li>
                                          </ul>
                                      </a>
                                    </li>
                                    <li>
                                      <a class="dropdown-item p-1" href="{{route('student_journey_mastery_level')}}">
                                          <ul class="p-0 p-2 list-unstyled">
                                            <li class="d-flex justify-content-start">
                                                <div class="me-2">
                                                  <svg class="navbar_svg"xmlns="http://www.w3.org/2000/svg" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 441 512.02" fill="#6d6d6d" class="group-hover:text-white ltr:mr-3 rtl:ml-3 flex-shrink-0 h-6 w-6 text-secondary">
                                                    <path d="M324.87 279.77c32.01 0 61.01 13.01 82.03 34.02 21.09 21 34.1 50.05 34.1 82.1 0 32.06-13.01 61.11-34.02 82.11l-1.32 1.22c-20.92 20.29-49.41 32.8-80.79 32.8-32.06 0-61.1-13.01-82.1-34.02-21.01-21-34.02-50.05-34.02-82.11s13.01-61.1 34.02-82.1c21-21.01 50.04-34.02 82.1-34.02zM243.11 38.08v54.18c.99 12.93 5.5 23.09 13.42 29.85 8.2 7.01 20.46 10.94 36.69 11.23l37.92-.04-88.03-95.22zm91.21 120.49-41.3-.04c-22.49-.35-40.21-6.4-52.9-17.24-13.23-11.31-20.68-27.35-22.19-47.23l-.11-1.74V25.29H62.87c-10.34 0-19.75 4.23-26.55 11.03-6.8 6.8-11.03 16.21-11.03 26.55v336.49c0 10.3 4.25 19.71 11.06 26.52 6.8 6.8 16.22 11.05 26.52 11.05h119.41c2.54 8.79 5.87 17.25 9.92 25.29H62.87c-17.28 0-33.02-7.08-44.41-18.46C7.08 432.37 0 416.64 0 399.36V62.87c0-17.26 7.08-32.98 18.45-44.36C29.89 7.08 45.61 0 62.87 0h173.88c4.11 0 7.76 1.96 10.07 5l109.39 118.34c2.24 2.43 3.34 5.49 3.34 8.55l.03 119.72c-8.18-1.97-16.62-3.25-25.26-3.79v-89.25zm-229.76 54.49c-6.98 0-12.64-5.66-12.64-12.64 0-6.99 5.66-12.65 12.64-12.65h150.49c6.98 0 12.65 5.66 12.65 12.65 0 6.98-5.67 12.64-12.65 12.64H104.56zm0 72.3c-6.98 0-12.64-5.66-12.64-12.65 0-6.98 5.66-12.64 12.64-12.64h142.52c3.71 0 7.05 1.6 9.37 4.15a149.03 149.03 0 0 0-30.54 21.14H104.56zm0 72.3c-6.98 0-12.64-5.66-12.64-12.65 0-6.98 5.66-12.64 12.64-12.64h86.2c-3.82 8.05-6.95 16.51-9.29 25.29h-76.91zm187.98 17.13 20.56 19.44 41.38-42.02c3.86-3.92 6.27-7.05 11.05-2.17l15.45 15.82c5.06 5.01 4.8 7.94.01 12.63l-59.09 58.07c-10.07 9.88-8.33 10.51-18.54.34l-36.84-36.62c-2.1-2.3-1.88-4.63.42-6.96l17.93-18.57c2.72-2.82 4.88-2.64 7.67.04z" stroke-width="2"></path>
                                                  </svg>
                                                </div>
                                                <div>
                                                  <div class="text-dark">Mastery Level</div>
                                                  <p class="h6 text-dark my-1">Gauge and enhance expertise across various subjects.</p>
                                                </div>
                                            </li>
                                          </ul>
                                      </a>
                                    </li>
                                    <li>
                                      <a class="dropdown-item p-1" href="{{route('student_journey_performance')}}">
                                          <ul class="p-0 p-2 list-unstyled">
                                            <li class="d-flex justify-content-start">
                                                <div class="me-2">
                                                  <svg class="navbar_svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#6d6d6d">
                                                    <path d="M0 0h24v24H0V0z" fill="none"></path>
                                                    <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V5h14v14zM7 10h2v7H7zm4-3h2v10h-2zm4 6h2v4h-2z"></path>
                                                  </svg>
                                                </div>
                                                <div>
                                                  <div class="text-dark">Performance</div>
                                                  <p class="h6 text-dark my-1">Monitor and manage your journey performance.</p>
                                                </div>
                                            </li>
                                          </ul>
                                      </a>
                                    </li>
                                </ul>
                              </li>
                              <li class="nav-item dropdown rounded-2 m-1 mx-2 px-1">
                                  <a class="align-items-center d-flex fs-6 nav-link p-0 pt-1 border-0 btn" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                  <img src="{{url('images/resources_icon.png')}}" class="me-1" height="25" width="auto" alt="resources icon"> Resources
                                      <i class='bx bxs-chevron-down small_bx_icon'></i>
                                  </a>
                                  <ul class="dropdown-menu border-0 shadow-lg rounded-3 p-2">
                                    <li>
                                          <a class="dropdown-item p-1" href="{{route('parent_sets_practices')}}">
                                              <ul class=" p-0 p-2 list-unstyled">
                                                  <li class="d-flex justify-content-start">
                                                      <div class="me-2">
                                                          <svg class="navbar_svg" height="20" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="" zoomAndPan="magnify" viewBox="0 0 30 30.000001" preserveAspectRatio="xMidYMid meet" version="1.0"><defs><clipPath id="4a3716c96f"><path d="M 2.855469 2.433594 L 26.808594 2.433594 L 26.808594 26.382812 L 2.855469 26.382812 Z M 2.855469 2.433594 " clip-rule="nonzero"></path></clipPath></defs><g clip-path="url(#4a3716c96f)"><path d="M 24.261719 23.007812 L 24.261719 25.460938 C 24.261719 25.714844 24.171875 25.933594 23.992188 26.113281 C 23.8125 26.292969 23.597656 26.382812 23.34375 26.382812 L 3.78125 26.382812 C 3.53125 26.382812 3.3125 26.292969 3.132812 26.113281 C 2.957031 25.933594 2.867188 25.714844 2.867188 25.460938 L 2.867188 3.351562 C 2.867188 3.097656 2.957031 2.882812 3.132812 2.703125 C 3.3125 2.523438 3.53125 2.433594 3.78125 2.433594 L 23.34375 2.433594 C 23.597656 2.433594 23.8125 2.523438 23.992188 2.703125 C 24.171875 2.882812 24.261719 3.097656 24.261719 3.351562 L 24.261719 11.953125 C 24.261719 12.207031 24.171875 12.421875 23.992188 12.601562 C 23.8125 12.78125 23.597656 12.871094 23.34375 12.871094 C 23.089844 12.871094 22.875 12.78125 22.695312 12.601562 C 22.515625 12.421875 22.425781 12.207031 22.425781 11.953125 L 22.425781 4.273438 L 4.699219 4.273438 L 4.699219 24.539062 L 22.425781 24.539062 L 22.425781 23.007812 C 22.425781 22.75 22.515625 22.535156 22.695312 22.355469 C 22.875 22.175781 23.089844 22.085938 23.34375 22.085938 C 23.597656 22.085938 23.8125 22.175781 23.992188 22.355469 C 24.171875 22.535156 24.261719 22.75 24.261719 23.007812 Z M 26.4375 14.0625 C 26.257812 13.882812 26.042969 13.792969 25.789062 13.792969 C 25.535156 13.792969 25.320312 13.882812 25.140625 14.0625 L 19.066406 20.167969 L 16.65625 17.75 C 16.570312 17.660156 16.472656 17.589844 16.359375 17.539062 C 16.246094 17.492188 16.128906 17.464844 16.003906 17.464844 C 15.882812 17.464844 15.761719 17.488281 15.648438 17.535156 C 15.535156 17.582031 15.433594 17.648438 15.347656 17.734375 C 15.257812 17.824219 15.191406 17.925781 15.144531 18.039062 C 15.097656 18.152344 15.078125 18.273438 15.078125 18.394531 C 15.078125 18.519531 15.105469 18.636719 15.152344 18.753906 C 15.203125 18.867188 15.269531 18.964844 15.359375 19.050781 L 18.417969 22.121094 C 18.59375 22.300781 18.8125 22.390625 19.066406 22.390625 C 19.316406 22.390625 19.535156 22.300781 19.714844 22.121094 L 26.4375 15.367188 C 26.617188 15.1875 26.707031 14.96875 26.707031 14.714844 C 26.707031 14.460938 26.617188 14.242188 26.4375 14.0625 Z M 18.453125 7.34375 L 12.339844 7.34375 C 12.21875 7.34375 12.097656 7.363281 11.984375 7.410156 C 11.867188 7.453125 11.765625 7.519531 11.679688 7.605469 C 11.589844 7.695312 11.523438 7.792969 11.472656 7.910156 C 11.425781 8.023438 11.402344 8.140625 11.402344 8.265625 C 11.402344 8.390625 11.425781 8.507812 11.472656 8.625 C 11.523438 8.738281 11.589844 8.839844 11.679688 8.925781 C 11.765625 9.011719 11.867188 9.078125 11.984375 9.125 C 12.097656 9.167969 12.21875 9.191406 12.339844 9.1875 L 18.453125 9.1875 C 18.578125 9.191406 18.695312 9.167969 18.8125 9.125 C 18.925781 9.078125 19.027344 9.011719 19.117188 8.925781 C 19.203125 8.839844 19.273438 8.738281 19.320312 8.625 C 19.367188 8.507812 19.394531 8.390625 19.394531 8.265625 C 19.394531 8.140625 19.367188 8.023438 19.320312 7.910156 C 19.273438 7.792969 19.203125 7.695312 19.117188 7.605469 C 19.027344 7.519531 18.925781 7.453125 18.8125 7.410156 C 18.695312 7.363281 18.578125 7.34375 18.453125 7.34375 Z M 8.671875 9.1875 C 8.925781 9.1875 9.144531 9.097656 9.320312 8.917969 C 9.5 8.738281 9.589844 8.519531 9.589844 8.265625 C 9.589844 8.011719 9.5 7.792969 9.320312 7.613281 C 9.140625 7.433594 8.925781 7.34375 8.671875 7.34375 C 8.417969 7.34375 8.203125 7.433594 8.023438 7.613281 C 7.84375 7.796875 7.757812 8.011719 7.757812 8.265625 C 7.757812 8.519531 7.847656 8.738281 8.023438 8.917969 C 8.203125 9.097656 8.421875 9.1875 8.671875 9.1875 Z M 8.671875 14.101562 C 8.925781 14.101562 9.144531 14.011719 9.320312 13.832031 C 9.5 13.652344 9.589844 13.433594 9.589844 13.179688 C 9.589844 12.925781 9.5 12.707031 9.320312 12.527344 C 9.144531 12.347656 8.925781 12.257812 8.671875 12.257812 C 8.421875 12.257812 8.203125 12.347656 8.023438 12.527344 C 7.847656 12.707031 7.757812 12.925781 7.757812 13.179688 C 7.757812 13.433594 7.847656 13.652344 8.023438 13.832031 C 8.203125 14.011719 8.421875 14.101562 8.671875 14.101562 Z M 19.371094 13.179688 C 19.371094 12.925781 19.28125 12.707031 19.101562 12.527344 C 18.921875 12.347656 18.707031 12.257812 18.453125 12.257812 L 12.339844 12.257812 C 12.21875 12.253906 12.097656 12.277344 11.984375 12.320312 C 11.867188 12.367188 11.765625 12.433594 11.679688 12.519531 C 11.589844 12.605469 11.523438 12.707031 11.472656 12.820312 C 11.425781 12.9375 11.402344 13.054688 11.402344 13.179688 C 11.402344 13.304688 11.425781 13.421875 11.472656 13.539062 C 11.523438 13.652344 11.589844 13.753906 11.679688 13.839844 C 11.765625 13.925781 11.867188 13.992188 11.984375 14.035156 C 12.097656 14.082031 12.21875 14.105469 12.339844 14.101562 L 18.453125 14.101562 C 18.707031 14.101562 18.921875 14.011719 19.101562 13.832031 C 19.28125 13.652344 19.371094 13.433594 19.371094 13.179688 Z M 8.671875 19.015625 L 12.339844 19.015625 C 12.59375 19.015625 12.808594 18.925781 12.988281 18.742188 C 13.167969 18.5625 13.257812 18.347656 13.257812 18.09375 C 13.257812 17.839844 13.167969 17.621094 12.988281 17.441406 C 12.808594 17.261719 12.59375 17.171875 12.339844 17.171875 L 8.671875 17.171875 C 8.421875 17.171875 8.203125 17.261719 8.023438 17.441406 C 7.847656 17.621094 7.757812 17.839844 7.757812 18.09375 C 7.757812 18.347656 7.847656 18.5625 8.023438 18.742188 C 8.203125 18.925781 8.421875 19.015625 8.671875 19.015625 Z M 8.671875 19.015625 " fill-opacity="1" fill-rule="nonzero"></path></g></svg>
                                                      </div>
                                                      <div>
                                                          <div class='text-dark'>Parent Set</div>
                                                          <div class="h6 text-dark my-1">Co-create tailored learning experiences for optimal academic growth.</div>
                                                      </div>
                                                  </li>
                                              </ul>
                                          </a>
                                      </li>
                                      <li>
                                          <a class="dropdown-item p-1" href="{{route('exam_dashboard')}}">
                                              <ul class=" p-0 p-2 list-unstyled">
                                              <li class="d-flex justify-content-start">
                                                  <div class="me-2">
                                                      <svg height="20" class="navbar_svg" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" viewBox="0 0 24 24" fill="currentColor" class=""><path d="M10 11H18V9H10ZM10 14H14V12H10ZM10 8H18V6H10ZM8 18Q7.175 18 6.588 17.413Q6 16.825 6 16V4Q6 3.175 6.588 2.587Q7.175 2 8 2H20Q20.825 2 21.413 2.587Q22 3.175 22 4V16Q22 16.825 21.413 17.413Q20.825 18 20 18ZM8 16H20Q20 16 20 16Q20 16 20 16V4Q20 4 20 4Q20 4 20 4H8Q8 4 8 4Q8 4 8 4V16Q8 16 8 16Q8 16 8 16ZM8 4Q8 4 8 4Q8 4 8 4V16Q8 16 8 16Q8 16 8 16Q8 16 8 16Q8 16 8 16V4Q8 4 8 4Q8 4 8 4ZM4 22Q3.175 22 2.588 21.413Q2 20.825 2 20V6H4V20Q4 20 4 20Q4 20 4 20H18V22Z"></path></svg>
                                                  </div>
                                                  <div>
                                                      <div class='text-dark'>Exams</div>
                                                      <div class="h6 text-dark my-1"> Elevate performance through comprehensive exams sessions.</div>
                                                  </div>
                                              </li>
                                              </ul>
                                          </a>
                                      </li>
                                      <li>
                                          <a class="dropdown-item p-1" href="{{route('quiz_dashboard')}}">
                                              <ul class=" p-0 p-2 list-unstyled">
                                              <li class="d-flex justify-content-start">
                                                  <div class="me-2">
                                                      <svg height="20" class="navbar_svg" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" viewBox="0 0 24 24" fill="currentColor" class=""><g><path d="M0,0h24v24H0V0z" fill="none"></path></g><g><path d="M4,6H2v14c0,1.1,0.9,2,2,2h14v-2H4V6z M20,2H8C6.9,2,6,2.9,6,4v12c0,1.1,0.9,2,2,2h12c1.1,0,2-0.9,2-2V4 C22,2.9,21.1,2,20,2z M20,16H8V4h12V16z M13.51,10.16c0.41-0.73,1.18-1.16,1.63-1.8c0.48-0.68,0.21-1.94-1.14-1.94 c-0.88,0-1.32,0.67-1.5,1.23l-1.37-0.57C11.51,5.96,12.52,5,13.99,5c1.23,0,2.08,0.56,2.51,1.26c0.37,0.6,0.58,1.73,0.01,2.57 c-0.63,0.93-1.23,1.21-1.56,1.81c-0.13,0.24-0.18,0.4-0.18,1.18h-1.52C13.26,11.41,13.19,10.74,13.51,10.16z M12.95,13.95 c0-0.59,0.47-1.04,1.05-1.04c0.59,0,1.04,0.45,1.04,1.04c0,0.58-0.44,1.05-1.04,1.05C13.42,15,12.95,14.53,12.95,13.95z"></path></g></svg>
                                                  </div>
                                                  <div>
                                                      <div class='text-dark'>Quizzes</div>
                                                      <div class="h6 text-dark my-1">Sharpen knowledge through interactive assessments.</div>
                                                  </div>
                                              </li>
                                              </ul>
                                          </a>
                                      </li>
                                      <li>
                                          <a class="dropdown-item p-1" href="{{route('learn_practice')}}">
                                              <ul class="p-0 p-2 list-unstyled">
                                                  <li class="d-flex justify-content-start">
                                                      <div class="me-2">
                                                          <svg height="20" class="navbar_svg" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" viewBox="0 0 24 24" fill="currentColor" class=""><g><path d="M0,0h24v24H0V0z" fill="none"></path></g><g><path d="M5,20V4h2v7l2.5-1.5L12,11V4h5v7.08c0.33-0.05,0.66-0.08,1-0.08s0.67,0.03,1,0.08V4c0-1.1-0.9-2-2-2H5C3.9,2,3,2.9,3,4v16 c0,1.1,0.9,2,2,2h7.26c-0.42-0.6-0.75-1.28-0.97-2H5z M18,13c-2.76,0-5,2.24-5,5s2.24,5,5,5s5-2.24,5-5S20.76,13,18,13z M16.75,20.5v-5l4,2.5L16.75,20.5z"></path></g></svg>
                                                      </div>
                                                      <div>
                                                          <div class='text-dark'>Learn & Practises</div>
                                                          <div class="h6 text-dark my-1">Cultivate skills through engaging and purposeful learning activities.</div>
                                                      </div>
                                                  </li>
                                              </ul>
                                          </a>
                                      </li>
                                  </ul>
                              </li>
                              <li class="nav-item px-1 rounded-2 m-1 mx-2">
                                  <a class="align-items-center d-flex fs-6 nav-link p-0 pt-1 border-0 btn" aria-current="page" href="/contact">
                                  <img src="{{url('images/help_icon.png')}}" class="me-1" height="25  " width="auto" alt="help icon">Need Help
                                  </a>
                              </li>
                          </ul>
                      </div>
                  </div>
              </nav>
              <div class="d-flex align-items-center ms-auto">
                    <!-- Notification -->
                  @if($notifications['unread'] > 0)
                      <button class="btn px-2 notification_bell_btn position-relative" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                          <!-- <i class="bx bx-sm bx-bell cursor-pointer hstack text-black" id="notification"></i> -->
                          <img src="{{url('images/notification_bell.webp')}}"  width="35" height="35" id="notification" alt="notification animated bell icon">
                          <div class="bg-primary end-0 position-absolute rounded-circle text-white top-0 notification_dot notification_count">{{$notifications['unread']}}</div>
                      </button>
                  @else
                      <button class="btn px-2 notification_bell_btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                          <!-- <i class="bx bx-sm bx-bell cursor-pointer hstack text-black" id="notification"></i> -->
                          <img src="{{url('images/notification_bell.webp')}}"  width="35" height="35" id="notification" alt="notification animated bell icon">
                      </button>
                  @endif
                  <div class="dropdown profile_avatar_section">
                      <a class="btn d-flex align-items-center p-0 border-0 rounded-pill" href="#" role="button"
                          data-bs-toggle="dropdown" aria-expanded="false">
                          @if($imgpath)
                            <div class="profile_dropdown_button rounded-circle overflow-hidden shadow d-flex justify-content-center align-items-center" style="background: url('{{ url($imgpath) }}') top center no-repeat; background-size: cover;">
                          @else
                            <div class="profile_dropdown_button rounded-circle overflow-hidden shadow d-flex justify-content-center align-items-center" style="background: url('{{url('images/login_form_imagee.webp')}}') center no-repeat; background-size: cover;">
                          @endif
                          </div>
                          <span class="mx-1">
                              <i class='bx bxs-chevron-down small_bx_icon'></i>
                          </span>
                      </a>
                      <ul class="dropdown-menu dropdown-menu-end border-0 shadow-lg rounded-3 p-2">
                          <li>
                              <a class="dropdown-item p-1" href="/profile">
                                  <ul class="p-0 p-2 list-unstyled">
                                    <li class="d-flex justify-content-start">
                                        <div>
                                            <span class="fw-semibold text-dark d-block username_overflow">{{ $fullname }}</span>
                                        </div>
                                    </li>
                                  </ul>
                              </a>
                          </li>
                          <li>
                              <a class="dropdown-item p-1" href="/profile">
                                  <ul class=" p-0 p-2 list-unstyled">
                                      <li class="d-flex justify-content-start">
                                          <div class="me-2">
                                          <i class="bx bx-user small_bx_icon color_bx_icon"></i>
                                          </div>
                                          <div>
                                          <div>My Profile</div>
                                          </div>
                                      </li>
                                  </ul>
                              </a>
                          </li>
                          <li>
                              <a href="/profile?coins_shop=avatar" class="dropdown-item p-1" id="accessories_store_btn">
                                  <ul class=" p-0 p-2 list-unstyled">
                                      <li class="d-flex justify-content-start">
                                          <div class="me-2">
                                          <i class='bx bx-store small_bx_icon color_bx_icon'></i>
                                          </div>
                                          <div>
                                          <div>Coins Shop</div>
                                          </div>
                                      </li>
                                  </ul>
                              </a>
                          </li>
                          <li>
                              <button class="dropdown-item p-1" type="button" data-bs-toggle="modal" data-bs-target="#switchToParent">
                                  <ul class=" p-0 p-2 list-unstyled">
                                      <li class="d-flex justify-content-start">
                                          <div class="me-2">
                                          <i class='bx bx-reset small_bx_icon color_bx_icon'></i>
                                          </div>
                                          <div>
                                          <div>Switch to Parent</div>
                                          </div>
                                      </li>
                                  </ul>
                              </button>
                          </li>
                          <li class="dropdown-divider"></li>
                          <li>
                            <form method="POST" action="{{ route('destroy') }}">
                              @csrf
                              <button type="submit" class="dropdown-item p-1">
                                <ul class=" p-0 px-2 list-unstyled">
                                  <li class="d-flex justify-content-start">
                                    <div class="me-2">
                                      <i class='bx bx-log-out small_bx_icon color_bx_icon'></i>
                                    </div>
                                    <div>
                                      <div>Logout</div>
                                    </div>
                                  </li>
                                </ul>
                              </button>
                            </form>
                          </li>
                      </ul>
                  </div>
              </div>
            
                <div class="notification_offcanvas offcanvas offcanvas-end rounded-5 my-3 mx-3" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasRightLabel">Notifications</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body px-3">
                        <hr class="mt-0">
                        <div class="form-check">
                            <p class="form-check-label text-end" for="flexCheckDefault">
                            <span class="notification_count">{{$notifications['unread']}}</span> unread out of {{$notifications['total']}}
                            </p>
                        </div>
                        <hr class="mt-3 mb-2">
                        @if($notifications['total'] > 0)
                          @foreach($notifications['data'] as $notification)
                            <div class="read_notification cursor-pointer p-2 rounded-2" data-id="{{$notification['id']}}" data-read="@if($notification['read']) true @else false @endif">
                              <p class="title text-dark
                                @if(!$notification['read'])
                                  fw-bold
                                @endif
                              ">{{$notification['title']}}</p>
                              <p class="message line-clamp-1
                                @if(!$notification['read'])
                                  fw-semibold text-black
                                @endif
                              ">{{$notification['message']}}</p>
                              <p class="date notification-small-size">{{$notification['created_at']}}</p>
                            </div>
                            <hr class="my-2">
                          @endforeach
                        @else
                          <div class="text-center">No Notification</div>
                        @endif
                    </div>
                </div>
             
          </div>
      </div>
      <!-- small screen sidebar  -->
      <div class="offcanvas offcanvas-start shadow d-lg-none" data-bs-scroll="true"
          data-bs-backdrop="false" tabindex="-1" id="header_to_sidebar" aria-labelledby="header_to_sidebarLabel">
          <div class="offcanvas-header">
              <div class="d-flex align-items-center">
              <a class="navbar-brand me-2" href="/dashboard">
                  <img src="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->logo_path) }}" width="45" height="45" alt="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->app_name) }}">
              </a>
              <h5 class="offcanvas-title fw-semibold" id="header_to_sidebarLabel">{{ app(\App\Settings\SiteSettings::class)->app_name }}</h5>
              </div>
              <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body menu-vertical menu bg-menu-theme w-100 px-2">
              <!-- Dashboard -->
              <ul class="menu-inner py-3">
                  

                  <li class="menu-header w-100 my-1 small text-uppercase">
                      <span class="menu-header-text text-primary">Pages</span>
                  </li>

                  <li class="menu-item w-100 my-1">
                      <a href="{{route('user_dashboard')}}" class="menu-link">
                      <i class='bx bx-grid-alt small_bx_icon color_bx_icon me-1 '></i>Dashboard
                      </a>
                  </li>

                  <li class="menu-item w-100 my-1">
                      <a href="{{route('my_progress')}}" class="menu-link">
                      <span class="me-2">
                          <svg class="navbar_svg" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                              <path
                                  d="M20 7h-4V4c0-1.103-.897-2-2-2h-4c-1.103 0-2 .897-2 2v5H4c-1.103 0-2 .897-2 2v9a1 1 0 0 0 1 1h18a1 1 0 0 0 1-1V9c0-1.103-.897-2-2-2zM4 11h4v8H4v-8zm6-1V4h4v15h-4v-9zm10 9h-4V9h4v10z">
                              </path>
                          </svg>
                      </span>
                      <div>My Progress</div>
                      </a>
                  </li>

                  <li class="menu-item w-100 my-1">
                      <a href="{{route('student_mastery_level')}}" class="menu-link">
                      <span class="me-2">
                        <svg class="navbar_svg" xmlns="http://www.w3.org/2000/svg" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 441 512.02" fill="#6d6d6d">
                          <path d="M324.87 279.77c32.01 0 61.01 13.01 82.03 34.02 21.09 21 34.1 50.05 34.1 82.1 0 32.06-13.01 61.11-34.02 82.11l-1.32 1.22c-20.92 20.29-49.41 32.8-80.79 32.8-32.06 0-61.1-13.01-82.1-34.02-21.01-21-34.02-50.05-34.02-82.11s13.01-61.1 34.02-82.1c21-21.01 50.04-34.02 82.1-34.02zM243.11 38.08v54.18c.99 12.93 5.5 23.09 13.42 29.85 8.2 7.01 20.46 10.94 36.69 11.23l37.92-.04-88.03-95.22zm91.21 120.49-41.3-.04c-22.49-.35-40.21-6.4-52.9-17.24-13.23-11.31-20.68-27.35-22.19-47.23l-.11-1.74V25.29H62.87c-10.34 0-19.75 4.23-26.55 11.03-6.8 6.8-11.03 16.21-11.03 26.55v336.49c0 10.3 4.25 19.71 11.06 26.52 6.8 6.8 16.22 11.05 26.52 11.05h119.41c2.54 8.79 5.87 17.25 9.92 25.29H62.87c-17.28 0-33.02-7.08-44.41-18.46C7.08 432.37 0 416.64 0 399.36V62.87c0-17.26 7.08-32.98 18.45-44.36C29.89 7.08 45.61 0 62.87 0h173.88c4.11 0 7.76 1.96 10.07 5l109.39 118.34c2.24 2.43 3.34 5.49 3.34 8.55l.03 119.72c-8.18-1.97-16.62-3.25-25.26-3.79v-89.25zm-229.76 54.49c-6.98 0-12.64-5.66-12.64-12.64 0-6.99 5.66-12.65 12.64-12.65h150.49c6.98 0 12.65 5.66 12.65 12.65 0 6.98-5.67 12.64-12.65 12.64H104.56zm0 72.3c-6.98 0-12.64-5.66-12.64-12.65 0-6.98 5.66-12.64 12.64-12.64h142.52c3.71 0 7.05 1.6 9.37 4.15a149.03 149.03 0 0 0-30.54 21.14H104.56zm0 72.3c-6.98 0-12.64-5.66-12.64-12.65 0-6.98 5.66-12.64 12.64-12.64h86.2c-3.82 8.05-6.95 16.51-9.29 25.29h-76.91zm187.98 17.13 20.56 19.44 41.38-42.02c3.86-3.92 6.27-7.05 11.05-2.17l15.45 15.82c5.06 5.01 4.8 7.94.01 12.63l-59.09 58.07c-10.07 9.88-8.33 10.51-18.54.34l-36.84-36.62c-2.1-2.3-1.88-4.63.42-6.96l17.93-18.57c2.72-2.82 4.88-2.64 7.67.04z" stroke-width="2"></path>
                        </svg>                  
                      </span>
                      <div>Mastery Level</div>
                      </a>
                  </li>

                  <li class="menu-item w-100 my-1">
                      <a href="{{route('parent_sets_practices')}}" class="menu-link">
                      <span class="me-2">
                          <svg class="navbar_svg" height="20" xmlns="http://www.w3.org/2000/svg"
                              xmlns:xlink="http://www.w3.org/1999/xlink"
                              class="" zoomAndPan="magnify"
                              viewBox="0 0 30 30.000001" preserveAspectRatio="xMidYMid meet" version="1.0">
                              <defs>
                              <clipPath id="4a3716c96f">
                                  <path
                                  d="M 2.855469 2.433594 L 26.808594 2.433594 L 26.808594 26.382812 L 2.855469 26.382812 Z M 2.855469 2.433594 "
                                  clip-rule="nonzero" />
                              </clipPath>
                              </defs>
                              <g clip-path="url(#4a3716c96f)">
                              <path
                                  d="M 24.261719 23.007812 L 24.261719 25.460938 C 24.261719 25.714844 24.171875 25.933594 23.992188 26.113281 C 23.8125 26.292969 23.597656 26.382812 23.34375 26.382812 L 3.78125 26.382812 C 3.53125 26.382812 3.3125 26.292969 3.132812 26.113281 C 2.957031 25.933594 2.867188 25.714844 2.867188 25.460938 L 2.867188 3.351562 C 2.867188 3.097656 2.957031 2.882812 3.132812 2.703125 C 3.3125 2.523438 3.53125 2.433594 3.78125 2.433594 L 23.34375 2.433594 C 23.597656 2.433594 23.8125 2.523438 23.992188 2.703125 C 24.171875 2.882812 24.261719 3.097656 24.261719 3.351562 L 24.261719 11.953125 C 24.261719 12.207031 24.171875 12.421875 23.992188 12.601562 C 23.8125 12.78125 23.597656 12.871094 23.34375 12.871094 C 23.089844 12.871094 22.875 12.78125 22.695312 12.601562 C 22.515625 12.421875 22.425781 12.207031 22.425781 11.953125 L 22.425781 4.273438 L 4.699219 4.273438 L 4.699219 24.539062 L 22.425781 24.539062 L 22.425781 23.007812 C 22.425781 22.75 22.515625 22.535156 22.695312 22.355469 C 22.875 22.175781 23.089844 22.085938 23.34375 22.085938 C 23.597656 22.085938 23.8125 22.175781 23.992188 22.355469 C 24.171875 22.535156 24.261719 22.75 24.261719 23.007812 Z M 26.4375 14.0625 C 26.257812 13.882812 26.042969 13.792969 25.789062 13.792969 C 25.535156 13.792969 25.320312 13.882812 25.140625 14.0625 L 19.066406 20.167969 L 16.65625 17.75 C 16.570312 17.660156 16.472656 17.589844 16.359375 17.539062 C 16.246094 17.492188 16.128906 17.464844 16.003906 17.464844 C 15.882812 17.464844 15.761719 17.488281 15.648438 17.535156 C 15.535156 17.582031 15.433594 17.648438 15.347656 17.734375 C 15.257812 17.824219 15.191406 17.925781 15.144531 18.039062 C 15.097656 18.152344 15.078125 18.273438 15.078125 18.394531 C 15.078125 18.519531 15.105469 18.636719 15.152344 18.753906 C 15.203125 18.867188 15.269531 18.964844 15.359375 19.050781 L 18.417969 22.121094 C 18.59375 22.300781 18.8125 22.390625 19.066406 22.390625 C 19.316406 22.390625 19.535156 22.300781 19.714844 22.121094 L 26.4375 15.367188 C 26.617188 15.1875 26.707031 14.96875 26.707031 14.714844 C 26.707031 14.460938 26.617188 14.242188 26.4375 14.0625 Z M 18.453125 7.34375 L 12.339844 7.34375 C 12.21875 7.34375 12.097656 7.363281 11.984375 7.410156 C 11.867188 7.453125 11.765625 7.519531 11.679688 7.605469 C 11.589844 7.695312 11.523438 7.792969 11.472656 7.910156 C 11.425781 8.023438 11.402344 8.140625 11.402344 8.265625 C 11.402344 8.390625 11.425781 8.507812 11.472656 8.625 C 11.523438 8.738281 11.589844 8.839844 11.679688 8.925781 C 11.765625 9.011719 11.867188 9.078125 11.984375 9.125 C 12.097656 9.167969 12.21875 9.191406 12.339844 9.1875 L 18.453125 9.1875 C 18.578125 9.191406 18.695312 9.167969 18.8125 9.125 C 18.925781 9.078125 19.027344 9.011719 19.117188 8.925781 C 19.203125 8.839844 19.273438 8.738281 19.320312 8.625 C 19.367188 8.507812 19.394531 8.390625 19.394531 8.265625 C 19.394531 8.140625 19.367188 8.023438 19.320312 7.910156 C 19.273438 7.792969 19.203125 7.695312 19.117188 7.605469 C 19.027344 7.519531 18.925781 7.453125 18.8125 7.410156 C 18.695312 7.363281 18.578125 7.34375 18.453125 7.34375 Z M 8.671875 9.1875 C 8.925781 9.1875 9.144531 9.097656 9.320312 8.917969 C 9.5 8.738281 9.589844 8.519531 9.589844 8.265625 C 9.589844 8.011719 9.5 7.792969 9.320312 7.613281 C 9.140625 7.433594 8.925781 7.34375 8.671875 7.34375 C 8.417969 7.34375 8.203125 7.433594 8.023438 7.613281 C 7.84375 7.796875 7.757812 8.011719 7.757812 8.265625 C 7.757812 8.519531 7.847656 8.738281 8.023438 8.917969 C 8.203125 9.097656 8.421875 9.1875 8.671875 9.1875 Z M 8.671875 14.101562 C 8.925781 14.101562 9.144531 14.011719 9.320312 13.832031 C 9.5 13.652344 9.589844 13.433594 9.589844 13.179688 C 9.589844 12.925781 9.5 12.707031 9.320312 12.527344 C 9.144531 12.347656 8.925781 12.257812 8.671875 12.257812 C 8.421875 12.257812 8.203125 12.347656 8.023438 12.527344 C 7.847656 12.707031 7.757812 12.925781 7.757812 13.179688 C 7.757812 13.433594 7.847656 13.652344 8.023438 13.832031 C 8.203125 14.011719 8.421875 14.101562 8.671875 14.101562 Z M 19.371094 13.179688 C 19.371094 12.925781 19.28125 12.707031 19.101562 12.527344 C 18.921875 12.347656 18.707031 12.257812 18.453125 12.257812 L 12.339844 12.257812 C 12.21875 12.253906 12.097656 12.277344 11.984375 12.320312 C 11.867188 12.367188 11.765625 12.433594 11.679688 12.519531 C 11.589844 12.605469 11.523438 12.707031 11.472656 12.820312 C 11.425781 12.9375 11.402344 13.054688 11.402344 13.179688 C 11.402344 13.304688 11.425781 13.421875 11.472656 13.539062 C 11.523438 13.652344 11.589844 13.753906 11.679688 13.839844 C 11.765625 13.925781 11.867188 13.992188 11.984375 14.035156 C 12.097656 14.082031 12.21875 14.105469 12.339844 14.101562 L 18.453125 14.101562 C 18.707031 14.101562 18.921875 14.011719 19.101562 13.832031 C 19.28125 13.652344 19.371094 13.433594 19.371094 13.179688 Z M 8.671875 19.015625 L 12.339844 19.015625 C 12.59375 19.015625 12.808594 18.925781 12.988281 18.742188 C 13.167969 18.5625 13.257812 18.347656 13.257812 18.09375 C 13.257812 17.839844 13.167969 17.621094 12.988281 17.441406 C 12.808594 17.261719 12.59375 17.171875 12.339844 17.171875 L 8.671875 17.171875 C 8.421875 17.171875 8.203125 17.261719 8.023438 17.441406 C 7.847656 17.621094 7.757812 17.839844 7.757812 18.09375 C 7.757812 18.347656 7.847656 18.5625 8.023438 18.742188 C 8.203125 18.925781 8.421875 19.015625 8.671875 19.015625 Z M 8.671875 19.015625 "
                                  fill-opacity="1" fill-rule="nonzero" />
                              </g>
                          </svg>
                      </span>
                      <div>Parent Set</div>
                      </a>
                  </li>

                  <li class="menu-item w-100 my-1">
                      <a href="{{route('exam_dashboard')}}" class="menu-link">
                      <span class="me-2">
                          <svg height="20" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" viewBox="0 0 24 24"
                              class="navbar_svg ">
                              <path
                              d="M10 11H18V9H10ZM10 14H14V12H10ZM10 8H18V6H10ZM8 18Q7.175 18 6.588 17.413Q6 16.825 6 16V4Q6 3.175 6.588 2.587Q7.175 2 8 2H20Q20.825 2 21.413 2.587Q22 3.175 22 4V16Q22 16.825 21.413 17.413Q20.825 18 20 18ZM8 16H20Q20 16 20 16Q20 16 20 16V4Q20 4 20 4Q20 4 20 4H8Q8 4 8 4Q8 4 8 4V16Q8 16 8 16Q8 16 8 16ZM8 4Q8 4 8 4Q8 4 8 4V16Q8 16 8 16Q8 16 8 16Q8 16 8 16Q8 16 8 16V4Q8 4 8 4Q8 4 8 4ZM4 22Q3.175 22 2.588 21.413Q2 20.825 2 20V6H4V20Q4 20 4 20Q4 20 4 20H18V22Z">
                              </path>
                          </svg>
                      </span>
                      <div>Exams</div>
                      </a>
                  </li>

                  <li class="menu-item w-100 my-1">
                      <a href="{{route('quiz_dashboard')}}" class="menu-link">
                          <span class="me-2">
                              <svg height="20" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" viewBox="0 0 24 24"
                                  class="navbar_svg">
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
                          <div>Quizzes</div>
                      </a>
                  </li>

                  <li class="menu-item w-100 my-1">
                      <a href="{{route('learn_practice')}}" class="menu-link">
                          <span class="me-2">
                              <svg height="20" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" viewBox="0 0 24 24"
                                  class="navbar_svg ">
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
                          <div>Learn & Practise</div>
                      </a>
                  </li>

                  <li class="menu-item w-100 my-1">
                    <a href="{{route('student_journey_progress')}}" class="menu-link">
                        <span class="me-2">
                          <svg class="navbar_svg" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                            <path d="M20 7h-4V4c0-1.103-.897-2-2-2h-4c-1.103 0-2 .897-2 2v5H4c-1.103 0-2 .897-2 2v9a1 1 0 0 0 1 1h18a1 1 0 0 0 1-1V9c0-1.103-.897-2-2-2zM4 11h4v8H4v-8zm6-1V4h4v15h-4v-9zm10 9h-4V9h4v10z"></path>
                          </svg>
                        </span>
                        <div>Journey Progress</div>
                    </a>
                  </li>

                  <li class="menu-item w-100 my-1">
                    <a href="{{route('student_journey_mastery_level')}}" class="menu-link">
                        <span class="me-2">
                          <svg class="navbar_svg" xmlns="http://www.w3.org/2000/svg" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 441 512.02" fill="#6d6d6d">
                            <path d="M324.87 279.77c32.01 0 61.01 13.01 82.03 34.02 21.09 21 34.1 50.05 34.1 82.1 0 32.06-13.01 61.11-34.02 82.11l-1.32 1.22c-20.92 20.29-49.41 32.8-80.79 32.8-32.06 0-61.1-13.01-82.1-34.02-21.01-21-34.02-50.05-34.02-82.11s13.01-61.1 34.02-82.1c21-21.01 50.04-34.02 82.1-34.02zM243.11 38.08v54.18c.99 12.93 5.5 23.09 13.42 29.85 8.2 7.01 20.46 10.94 36.69 11.23l37.92-.04-88.03-95.22zm91.21 120.49-41.3-.04c-22.49-.35-40.21-6.4-52.9-17.24-13.23-11.31-20.68-27.35-22.19-47.23l-.11-1.74V25.29H62.87c-10.34 0-19.75 4.23-26.55 11.03-6.8 6.8-11.03 16.21-11.03 26.55v336.49c0 10.3 4.25 19.71 11.06 26.52 6.8 6.8 16.22 11.05 26.52 11.05h119.41c2.54 8.79 5.87 17.25 9.92 25.29H62.87c-17.28 0-33.02-7.08-44.41-18.46C7.08 432.37 0 416.64 0 399.36V62.87c0-17.26 7.08-32.98 18.45-44.36C29.89 7.08 45.61 0 62.87 0h173.88c4.11 0 7.76 1.96 10.07 5l109.39 118.34c2.24 2.43 3.34 5.49 3.34 8.55l.03 119.72c-8.18-1.97-16.62-3.25-25.26-3.79v-89.25zm-229.76 54.49c-6.98 0-12.64-5.66-12.64-12.64 0-6.99 5.66-12.65 12.64-12.65h150.49c6.98 0 12.65 5.66 12.65 12.65 0 6.98-5.67 12.64-12.65 12.64H104.56zm0 72.3c-6.98 0-12.64-5.66-12.64-12.65 0-6.98 5.66-12.64 12.64-12.64h142.52c3.71 0 7.05 1.6 9.37 4.15a149.03 149.03 0 0 0-30.54 21.14H104.56zm0 72.3c-6.98 0-12.64-5.66-12.64-12.65 0-6.98 5.66-12.64 12.64-12.64h86.2c-3.82 8.05-6.95 16.51-9.29 25.29h-76.91zm187.98 17.13 20.56 19.44 41.38-42.02c3.86-3.92 6.27-7.05 11.05-2.17l15.45 15.82c5.06 5.01 4.8 7.94.01 12.63l-59.09 58.07c-10.07 9.88-8.33 10.51-18.54.34l-36.84-36.62c-2.1-2.3-1.88-4.63.42-6.96l17.93-18.57c2.72-2.82 4.88-2.64 7.67.04z" stroke-width="2"></path>
                          </svg>
                        </span>
                        <div>Journey Mastery Level</div>
                    </a>
                  </li>

                  <li class="menu-item w-100 my-1">
                    <a href="{{route('student_journey_performance')}}" class="menu-link">
                        <span class="me-2">
                          <svg class="navbar_svg" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                            <path d="M20 7h-4V4c0-1.103-.897-2-2-2h-4c-1.103 0-2 .897-2 2v5H4c-1.103 0-2 .897-2 2v9a1 1 0 0 0 1 1h18a1 1 0 0 0 1-1V9c0-1.103-.897-2-2-2zM4 11h4v8H4v-8zm6-1V4h4v15h-4v-9zm10 9h-4V9h4v10z"></path>
                          </svg>
                        </span>
                        <div>Journey Performance</div>
                    </a>
                  </li>

                  <li class="menu-item w-100 my-1">
                      <a href="/contact" class="menu-link">
                          <i class='bx bx-help-circle small_bx_icon color_bx_icon me-1'></i>Need Help
                      </a>
                  </li>
              </ul>
          </div>
      </div>
      <!-- Switch to parent -->
      <div class="modal fade" id="switchToParent" tabindex="-1" aria-labelledby="switchToParentLabel" aria-hidden="true">
          <div class="modal-dialog mx-lg-auto mx-md-auto mx-sm-auto mx-0 m-2 modal-dialog-centered">
              <div class="modal-content">
                  <div class="modal-header">
                      <h4 class="modal-title fw-bold text-center text-dark ms-auto">Switch To Parent</h4>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body px-2">
                      <form method="GET" action="{{ route('login_as_parent') }}" class="card-body px-lg-5 p-1">
                      @csrf
                      @method('get')
                          <div class="text-center">
                              @if($imgpath)
                                  <img src="{{ url($imgpath) }}" class="img-fluid user_login_avatar img-thumbnail mx-auto rounded-circle my-3" width="200px" alt="profile">
                              @else 
                                  <img src="{{url('images/\user_avatar.webp')}}" class="img-fluid user_login_avatar img-thumbnail mx-auto rounded-circle my-3" width="200px" alt="profile">
                              @endif
                          </div>
                          <div class="form-floating bg-white mb-3 rounded-3">
                              @if(session()->has('parent_emails'))
                                  <label for="parent_name" class="form-label">Select Parent</label>
                                  <select class="form-select" id="parent_name" name="email" placeholder="Select Parent">
                                      @foreach(session('parent_emails') as $parents)
                                          @foreach($parents as $name => $email)
                                              <option value="{{$email}}">{{$name}}</option>
                                          @endforeach
                                      @endforeach
                                  </select> 
                              @else
                                  <input type="text" class="form-control shadow-sm" id="loginName" name="email" placeholder="Enter username">
                                  <label for="loginName" class="text-uppercase small text-dark">Username</label>
                              @endif
                          </div>
                          <div class="form-floating bg-white mb-3 position-relative">
                              <input type="password" class="form-control shadow-sm" id="loginPass" name="password"
                                  placeholder="Enter password">
                              <label for="loginPass" class="text-uppercase small text-dark">Password</label>
                              <button type="button" style="opacity: 0.75;"
                                  class="btn btn_showPass d-none shadow-none border-0 position-absolute top-0 end-0 bottom-0">
                                  <i class="bi bi-eye-slash-fill fs-5" id="showPass_icon"></i>
                              </button>
                          </div>
                          <div class="text-center">
                              <input id="login_button" class="button btn btn_login_primary button px-5 mb-2 py-2 w-100 text-uppercase fw-semibold shadow-none" type="submit" value="{{ __('Log in') }}"/>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
      <!-- avatars modal  -->
      <div class="modal fade" id="accessories_store" tabindex="-1" aria-labelledby="accessories_storeLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-xl">
              <div class="modal-content rounded-0">
                  <div class="border-0 modal-header p-0">
                      <button type="button" class="btn-close mt-0" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                      <ul class="nav nav-tabs my-2" id="myTab" role="tablist">
                          <li class="nav-item" role="presentation">
                              <button class="nav-link bg-transparent active" id="user_avatars-tab" data-bs-toggle="tab" data-bs-target="#user_avatars" type="button" role="tab" aria-controls="user_avatars" aria-selected="true">Avatars</button>
                          </li>
                          <li class="nav-item" role="presentation">
                              <button class="nav-link bg-transparent" id="fortnite-tab" data-bs-toggle="tab" data-bs-target="#fortnite" type="button" role="tab" aria-controls="fortnite" aria-selected="false">Fortnite</button>
                          </li>
                          <li class="nav-item" role="presentation">
                              <button class="nav-link bg-transparent" id="minecraft-tab" data-bs-toggle="tab" data-bs-target="#minecraft" type="button" role="tab" aria-controls="minecraft" aria-selected="false">Minecraft</button>
                          </li>
                      </ul>
                      <!-- Tab panes -->
                      <div class="avatar_store_section">                    
                          <div class="tab-content mb-4 my-3 p-0 h-75">
                              <div class="tab-pane active" id="user_avatars" role="tabpanel" aria-labelledby="user_avatars-tab" tabindex="0">
                                  <div class="avatars_spinner d-flex mx-auto spinner-border text-primary-emphasis d-none" role="status">
                                      <span class="visually-hidden">Loading...</span>
                                  </div>
                                  <div class="avatar_cards_container d-none align-items-center d-flex flex-wrap justify-content-center my-2">
                                      <div class="display_cards m-3 rounded-5 overflow-hidden">
                                          <div class="avatar_image" style="background:  url('../images/avatars/1.webp') top no-repeat; background-size: cover; height: 230px; width: 230px;">
                                              <div class="h-100 position-relative w-100" style="background: linear-gradient(359deg, #00000065, transparent 78%)">
                                                  <h2 class="bottom-0 end-0 h5 position-absolute start-0 text-center text-dark text-white">Trip Trekker</h2>
                                              </div>
                                          </div>
                                          <div class="my-3">
                                              <button class="align-items-center border border-1 border-secondary btn btn-sm d-flex disabled mx-auto p-2 px-3 rounded-pill">
                                                  <svg class="me-1" xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" style="fill: #878787;"><path d="m10 15.586-3.293-3.293-1.414 1.414L10 18.414l9.707-9.707-1.414-1.414z"></path></svg>
                                                  Owned
                                              </button>
                                          </div>
                                      </div>
                                      <div class="display_cards m-3 rounded-5 overflow-hidden">
                                          <div class="avatar_image" style="background:  url('../images/avatars/2.webp') top no-repeat; background-size: cover; height: 230px; width: 230px;">
                                              <div class="h-100 position-relative w-100" style="background: linear-gradient(359deg, #00000065, transparent 78%)">
                                                  <h2 class="bottom-0 end-0 h5 position-absolute start-0 text-center text-dark text-white">Safari Scout</h2>
                                              </div>
                                          </div>
                                          <div class="my-3">
                                              <button class="align-items-center btn btn-primary btn-sm d-flex mx-auto p-2 px-3 rounded-pill"><img src="{{url('images/reward.png')}}" height="20" width="20" alt="reward coins" class="me-1">400</button>
                                          </div>
                                      </div>
                                      <div class="display_cards m-3 rounded-5 overflow-hidden">
                                          <div class="avatar_image" style="background:  url('../images/avatars/3.webp') top no-repeat; background-size: cover; height: 230px; width: 230px;">
                                              <div class="h-100 position-relative w-100" style="background: linear-gradient(359deg, #00000065, transparent 78%)">
                                                  <h2 class="bottom-0 end-0 h5 position-absolute start-0 text-center text-dark text-white">Mic Maestro</h2>
                                              </div>
                                          </div>
                                          <div class="my-3">
                                              <button class="align-items-center btn btn-primary btn-sm d-flex mx-auto p-2 px-3 rounded-pill"><img src="{{url('images/reward.png')}}" height="20" width="20" alt="reward coins" class="me-1">450</button>
                                          </div>
                                      </div>
                                      <div class="display_cards m-3 rounded-5 overflow-hidden">
                                          <div class="avatar_image" style="background:  url('../images/avatars/4.webp') top no-repeat; background-size: cover; height: 230px; width: 230px;">
                                              <div class="h-100 position-relative w-100" style="background: linear-gradient(359deg, #00000065, transparent 78%)">
                                                  <h2 class="bottom-0 end-0 h5 position-absolute start-0 text-center text-dark text-white">Wicket Warrior</h2>
                                              </div>
                                          </div>
                                          <div class="my-3">
                                              <button class="align-items-center btn btn-primary btn-sm d-flex mx-auto p-2 px-3 rounded-pill"><img src="{{url('images/reward.png')}}" height="20" width="20" alt="reward coins" class="me-1">450</button>
                                          </div>
                                      </div>
                                      <div class="display_cards m-3 rounded-5 overflow-hidden">
                                          <div class="avatar_image" style="background:  url('../images/avatars/5.webp') top no-repeat; background-size: cover; height: 230px; width: 230px;">
                                              <div class="h-100 position-relative w-100" style="background: linear-gradient(359deg, #00000065, transparent 78%)">
                                                  <h2 class="bottom-0 end-0 h5 position-absolute start-0 text-center text-dark text-white">Presto Prodigy</h2>
                                              </div>
                                          </div>
                                          <div class="my-3">
                                              <button class="align-items-center btn btn-primary btn-sm d-flex mx-auto p-2 px-3 rounded-pill"><img src="{{url('images/reward.png')}}" height="20" width="20" alt="reward coins" class="me-1">500</button>
                                          </div>
                                      </div>
                                      <div class="display_cards m-3 rounded-5 overflow-hidden">
                                          <div class="avatar_image" style="background:  url('../images/avatars/6.webp') top no-repeat; background-size: cover; height: 230px; width: 230px;">
                                              <div class="h-100 position-relative w-100" style="background: linear-gradient(359deg, #00000065, transparent 78%)">
                                                  <h2 class="bottom-0 end-0 h5 position-absolute start-0 text-center text-dark text-white">Soccer Glider</h2>
                                              </div>
                                          </div>
                                          <div class="my-3">
                                              <button class="align-items-center btn btn-primary btn-sm d-flex mx-auto p-2 px-3 rounded-pill"><img src="{{url('images/reward.png')}}" height="20" width="20" alt="reward coins" class="me-1">650</button>
                                          </div>
                                      </div>
                                      <div class="display_cards m-3 rounded-5 overflow-hidden">
                                          <div class="avatar_image" style="background:  url('../images/avatars/7.webp') top no-repeat; background-size: cover; height: 230px; width: 230px;">
                                              <div class="h-100 position-relative w-100" style="background: linear-gradient(359deg, #00000065, transparent 78%)">
                                                  <h2 class="bottom-0 end-0 h5 position-absolute start-0 text-center text-dark text-white">Ninja Nurturer</h2>
                                              </div>
                                          </div>
                                          <div class="my-3">
                                              <button class="align-items-center btn btn-primary btn-sm d-flex mx-auto p-2 px-3 rounded-pill"><img src="{{url('images/reward.png')}}" height="20" width="20" alt="reward coins" class="me-1">800</button>
                                          </div>
                                      </div>
                                      <div class="display_cards m-3 rounded-5 overflow-hidden">
                                          <div class="avatar_image" style="background:  url('../images/avatars/8.webp') top no-repeat; background-size: cover; height: 230px; width: 230px;">
                                              <div class="h-100 position-relative w-100" style="background: linear-gradient(359deg, #00000065, transparent 78%)">
                                                  <h2 class="bottom-0 end-0 h5 position-absolute start-0 text-center text-dark text-white">Ring Ranger</h2>
                                              </div>
                                          </div>
                                          <div class="my-3">
                                              <button class="align-items-center btn btn-primary btn-sm d-flex mx-auto p-2 px-3 rounded-pill"><img src="{{url('images/reward.png')}}" height="20" width="20" alt="reward coins" class="me-1">4000</button>
                                          </div>
                                      </div>
                                      <div class="display_cards m-3 rounded-5 overflow-hidden">   
                                          <div class="avatar_image" style="background:  url('../images/avatars/9.webp') top no-repeat; background-size: cover; height: 230px; width: 230px;">
                                              <div class="h-100 position-relative w-100" style="background: linear-gradient(359deg, #00000065, transparent 78%)">
                                                  <h2 class="bottom-0 end-0 h5 position-absolute start-0 text-center text-dark text-white">Deal Dynamo</h2>
                                              </div>
                                          </div>
                                          <div class="my-3">
                                              <button class="align-items-center btn btn-primary btn-sm d-flex mx-auto p-2 px-3 rounded-pill"><img src="{{url('images/reward.png')}}" height="20" width="20" alt="reward coins" class="me-1">1000</button>
                                          </div>
                                      </div>
                                      <div class="display_cards m-3 rounded-5 overflow-hidden">
                                          <div class="avatar_image" style="background:  url('../images/avatars/10.webp') top no-repeat; background-size: cover; height: 230px; width: 230px;">
                                              <div class="h-100 position-relative w-100" style="background: linear-gradient(359deg, #00000065, transparent 78%)">
                                                  <h2 class="bottom-0 end-0 h5 position-absolute start-0 text-center text-dark text-white">Galactic Gazer</h2>
                                              </div>
                                          </div>
                                          <div class="my-3">
                                              <button class="align-items-center btn btn-primary btn-sm d-flex mx-auto p-2 px-3 rounded-pill"><img src="{{url('images/reward.png')}}" height="20" width="20" alt="reward coins" class="me-1">1400</button>
                                          </div>
                                      </div>
                                      <div class="display_cards m-3 rounded-5 overflow-hidden">
                                          <div class="avatar_image" style="background:  url('../images/avatars/11.webp') top no-repeat; background-size: cover; height: 230px; width: 230px;">
                                              <div class="h-100 position-relative w-100" style="background: linear-gradient(359deg, #00000065, transparent 78%)">
                                                  <h2 class="bottom-0 end-0 h5 position-absolute start-0 text-center text-dark text-white">Lab Luminary</h2>
                                              </div>
                                          </div>
                                          <div class="my-3">
                                              <button class="align-items-center btn btn-primary btn-sm d-flex mx-auto p-2 px-3 rounded-pill"><img src="{{url('images/reward.png')}}" height="20" width="20" alt="reward coins" class="me-1">1600</button>
                                          </div>
                                      </div>
                                      <div class="display_cards m-3 rounded-5 overflow-hidden">
                                          <div class="avatar_image" style="background:  url('../images/avatars/12.webp') top no-repeat; background-size: cover; height: 230px; width: 230px;">
                                              <div class="h-100 position-relative w-100" style="background: linear-gradient(359deg, #00000065, transparent 78%)">
                                                  <h2 class="bottom-0 end-0 h5 position-absolute start-0 text-center text-dark text-white">Gold Digger</h2>
                                              </div>
                                          </div>
                                          <div class="my-3">
                                              <button class="align-items-center btn btn-primary btn-sm d-flex mx-auto p-2 px-3 rounded-pill"><img src="{{url('images/reward.png')}}" height="20" width="20" alt="reward coins" class="me-1">2000</button>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <div class="tab-pane h-100" id="fortnite" role="tabpanel" aria-labelledby="fortnite-tab" tabindex="0">
                                  <div class="h-100 w-100 d-flex justify-content-center align-items-center">
                                      <div>
                                          <img src="{{url('images/no_record_found.png')}}" height='auto' width='250' alt="no rrecords founds">
                                          <h2 class="h5 text-center fw-normal mt-1">Stuff Not Available!</h2>
                                      </div>
                                  </div>
                              </div>
                              <div class="tab-pane h-100" id="minecraft" role="tabpanel" aria-labelledby="minecraft-tab" tabindex="0">
                                  <div class="h-100 w-100 d-flex justify-content-center align-items-center">
                                      <div>
                                          <img src="{{url('images/no_record_found.png')}}" height='auto' width='250' alt="no rrecords founds">
                                          <h2 class="h5 text-center fw-normal mt-1">Stuff Not Available!</h2>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      
      <div class="col-lg-10 col-md-11 col-sm-12 col-12 mx-auto pt-4 p-3" style="margin-top: 4rem;">
      <!-- Chat box -->
      <div id='whatsapp-chat' class='hide shadow-lg'>
        <div class='header-chat position-relative'>
          <div class='head-home d-flex align-items-center'>
            <div class='info-avatar me-2 rounded-circle' style="height: 45px; width: 45px; background: url('{{url($imgpath)}}') center top no-repeat; background-size: cover;"></div>
            <p><span class="whatsapp-name">{{$fullname}}</span></p>
          </div>
          <div class='get-new hide'>
            <div id='get-label'></div>
            <div id='get-nama'></div>
          </div>
          <a class='close-chat p-2' type='button'><i class='bx bx-x'></i></a>
        </div>
        <div class='home-chat'></div>
        <div class='start-chat bg-body'>
            <div pattern="https://elfsight.com/assets/chats/patterns/whatsapp.png" class="WhatsappChat__Component-sc-1wqac52-0 whatsapp-chat-body">
                <div class="WhatsappChat__MessageContainer-sc-1wqac52-1 chat_box_wrap">
                    <div style="opacity: 0;" class="WhatsappDots__Component-pks5bf-0 eJJEeC">
                        <div class="WhatsappDots__ComponentInner-pks5bf-1 hFENyl">
                            <div class="WhatsappDots__Dot-pks5bf-2 WhatsappDots__DotOne-pks5bf-3 ixsrax"></div>
                            <div class="WhatsappDots__Dot-pks5bf-2 WhatsappDots__DotTwo-pks5bf-4 dRvxoz"></div>
                            <div class="WhatsappDots__Dot-pks5bf-2 WhatsappDots__DotThree-pks5bf-5 kXBtNt"></div>
                        </div>
                    </div>
                    <div style="opacity: 1;" class="WhatsappChat__Message-sc-1wqac52-4 chat_box chat_box_left">
                        <small class="fs-tiny">TutorsElevenPlus Support</small>
                        <div class="text-dark mt-1">
                            Hi there 👋 
                            <br>
                            How can I help you?
                        </div>
                    </div>
                </div>
            </div>

            <div class='blanter-msg fixed-bottom'>
                <!-- <textarea id='chat-input' placeholder='Write something' maxlength='120' row='1'></textarea> -->
                <input id='chat-input' placeholder='Type a message' type='text'>
                <a type="button" id='send-it'>
                    <svg viewBox="0 0 448 448">
                    <path d="M.213 32L0 181.333 320 224 0 266.667.213 416 448 224z" />
                    </svg>
                </a>
            </div>
        </div>        
        <div id='get-number'></div>
      </div>
      <a class='blantershow-chat' title='Show Chat'>
        <div class="chat_details_badge me-2 text-center rounded-pill p-2">Chat with us</div>
        <img src="{{url('images/live_chat.png')}}" class="img-fluid" width="50" height="50" alt="TutorsElevenPlus live chat">
      </a>
            
    <script>
      // change bell icon on hover 
      $(document).ready(function(){
          $(".notification_bell_btn").mouseover(function(){
              let _this = $(this);
              _this.find("img").attr("src", "{{url('images/alarm.gif')}}")
          });
          $(".notification_bell_btn").mouseout(function(){
              let _this = $(this);
              _this.find("img").attr("src", "{{url('images/notification_bell.webp')}}")
          });
      });
      /* Whatsapp Chat Widget by www.bloggermix.com */
      $(document).on("click", ".informasi", function () {
          (document.getElementById("get-number").innerHTML = $(this)
          .children(".my-number")
          .text()),
          $(".start-chat,.get-new").addClass("show").removeClass("hide"),
          $(".home-chat,.head-home").addClass("hide").removeClass("show"),
          (document.getElementById("get-nama").innerHTML = $(this)
              .children(".info-chat")
              .children(".chat-nama")
              .text()),
          (document.getElementById("get-label").innerHTML = $(this)
              .children(".info-chat")
              .children(".chat-label")
              .text());
      }),
      $(document).on("click", ".close-chat", function () {
          $("#whatsapp-chat").addClass("hide").removeClass("show");
      }),
      $(document).on("click", ".blantershow-chat", function () {
          $("#whatsapp-chat").addClass("show").removeClass("hide");
          $(".start-chat").scrollTop($(".start-chat")[0].scrollHeight);
      });
      // login 
      const myTimeout = setTimeout(myGreeting, 5000);
      

      function myGreeting() {
        $("#loginError").fadeOut(1000,function () {
            $(this).hide();
        });
      }

      var multipleCancelButton = new Choices('#parent_name', {
              removeItemButton: false,
              searchEnabled: false,
      }); 
      $(".read_notification").click(function(){
        let _this = $(this);
        let id = $(this).data('id');
        let read = $(this).data('read').trim();
        if(read == 'false'){
          $.ajax({
              dataType: 'json',
              type: "POST",
              url: 'read/'+id+'/notification',
              data: {
                  id: id,
                  _token: '{{ csrf_token() }}'
              },
              success: function(data) {
                  if(data.success){
                      _this.find("p").removeClass("fw-bold fw-semibold text-black");
                      let count = parseInt($(".notification_count:eq(0)").text());
                      if(count > 1){
                          $(".notification_count").text(count - 1);
                      } else {
                      $(".notification_count:eq(0)").remove();
                      $(".notification_count").text(count - 1);
                      }
                  }
              },
              error: function(data, textStatus, errorThrown) {
                  var obj = data.responseJSON.errors;
                  let formError = obj[Object.keys(obj)[0]][0];
                  console.log(formError);
              },
          });
        }
        $(".notification_offcanvas").addClass("overflow-hidden");
        let title = _this.find(".title").text().trim();
        let message = _this.find(".message").text().trim();
        let date = _this.find(".date").text().trim();
        let tab = `<div class="position-absolute bg-white w-100 h-100 top-0 overflow-scroll" id="notification_detail">
        <div class="px-1 d-flex justify-content-between align-items-center">
            <i class="bx bx-chevron-left m-2 h3 cursor-pointer" id="close_notification_detail"></i>
            <p class="me-2">`+date+`</p>
        </div>
        <hr class="mt-1">
        <div class="overflow-scroll h-100 px-2 notification_detail_body">
            <p class="h5 text-dark mb-2">`+title+`</p>
            <p>`+message+`</p>
        </div>
        </div>`
        $(".notification_offcanvas").scrollTop(0).append(tab);
      });
      $(document).on("click","#close_notification_detail", function(e){
          $("#notification_detail").remove();
          $(".notification_offcanvas").removeClass("overflow-hidden");
      });
      
      // avatars_spinner
      $("#accessories_store_btn").one('click', function(){
          $(".avatars_spinner").removeClass('d-none');
          setTimeout(() => {
              $(".avatars_spinner").addClass('d-none');
              $(".avatar_cards_container").removeClass('d-none');               
          }, 1200);
      });
    </script>

