<?php
  $firstN = Auth::user()->first_name;
  $lastN = Auth::user()->last_name;
  $fullname = $firstN . ' ' . $lastN;
  $imgpath = Auth::user()->profile_photo_path;
?>
<link rel="preload" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" as="style" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" onload="this.onload=null;this.rel='stylesheet'">
<!-- bootstrap cdn -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<style>
   body {
      background: #a2abc514;
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
      .profile_avatar_section {
         margin-left: auto;
      }
   }

   .nav-tabs .body_section_nav.active a.nav_tab_link {
      color: #ffffff !important;
      background: var(--portal-primary) !important;
   }

   a.nav_tab_link {
      color: #0d0d0d
   }

   thead,
   .table_head {}

   .border-bottom {
      transition: 0.18s;
   }

   .table_text {
      color: #000000 !important;
   }

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

   .nav-tabs .nav-item .nav-link:not(.active) {}

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

   .btn-dropdown {
      padding: 0 !important;
   }

   .notification-small-size {
      font-size: 12px
   }

   #flexCheckDefault {
      color: black !important;
   }

   body {
      font-family: 'Roboto Slab', sans-serif;
      background: #f8fcff;
   }

   .fs_cs_5 {
      font-size: 1.1rem !important;
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
      align-items: center;
      justify-content: space-between;
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
      padding: 10px 10px 0;
      background: #eee;
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
      animation-duration: 0.5s;
      transform: scale(1);
      opacity: 1;
   }

   .show {
      display: block;
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

   .offcanvas {}

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

<div class="layout-page">
  <!-- Content wrapper -->
  <div class="w-100">

   <div class="top_header bg-white shadow-sm py-2 position-fixed start-0 top-0 end-0 zindex-5">
      <div class="container d-flex align-items-center">
         <button class="border-0 btn d-lg-none me-1 px-2 shadow-none text-dark" aria-label="header_to_sidebar" type="button" data-bs-toggle="offcanvas" data-bs-target="#header_to_sidebar" aria-controls="header_to_sidebar"><i class="bx bx-menu bx-sm"></i></button><a class="navbar-brand me-2" href="/change-child"><img src="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->logo_path) }}" width="45" height="45" alt="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->app_name) }}"></a>
         <nav class="navbar navbar-expand-lg m-0">
            <div class="container px-0">
               <div class="collapse navbar-collapse px-2" id="navbarNav">
                  <ul class="navbar-nav custom_navbar_list">
                     <li class="nav-item px-1 rounded-2 m-1 mx-2"><a class="align-items-center d-flex fs-6 nav-link p-0 pt-1 text-dark fw-normal active" aria-current="page" href="{{route('change_child')}}"><img src="{{url('images/dashboard_icon.png')}}" class="me-1" height="20" width="20" alt="dashboard icon"> Dashboard</a></li>
                     <li class="nav-item dropdown rounded-2 m-1 mx-2 px-1">
                        <a class="align-items-center d-flex fs-6 nav-link p-0 pt-1 btn border-0 text-dark fw-normal" href="#dropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><img src="{{url('images/analysis_icon.png')}}" class="me-1" height="20" width="20" class="img-fluid" alt="reports icon"> Analysis<i class="bx bxs-chevron-down small_bx_icon"></i></a>
                        <ul class="dropdown-menu border-0 shadow-lg rounded-3 p-2">
                           <li>
                              <a class="dropdown-item p-1" href="{{route('progress')}}">
                                 <ul class="p-0 p-2 list-unstyled">
                                    <li class="d-flex justify-content-start">
                                       <div class="me-3 ms-1">
                                          <svg class="navbar_svg" xmlns="http://www.w3.org3000/svg" viewBox="0 0 24 24" fill="#6d6d6d" class="group-hover:text-white ltr:mr-3 rtl:ml-3 flex-shrink-0 h-6 w-6 text-secondary">
                                             <path d="M0 0h24v24H0V0z" fill="none"></path>
                                             <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V5h14v14zM7 10h2v7H7zm4-3h2v10h-2zm4 6h2v4h-2z"></path>
                                          </svg>
                                       </div>
                                       <div>
                                          <div class="text-dark">Progress</div>
                                          <p class="h6 text-dark my-1">Monitor and assess your child's journey.</p>
                                       </div>
                                    </li>
                                 </ul>
                              </a>
                           </li>
                           <li>
                              <a class="dropdown-item p-1" href="{{route('exams_attainment')}}">
                                 <ul class="p-0 p-2 list-unstyled">
                                    <li class="d-flex justify-content-start">
                                       <div class="me-2">
                                          <svg class="navbar_svg" xmlns="http://www.w3.org/2000/svg" width="30" height="20" viewBox="0 0 24 24">
                                             <path d="M20 7h-4V4c0-1.103-.897-2-2-2h-4c-1.103 0-2 .897-2 2v5H4c-1.103 0-2 .897-2 2v9a1 1 0 0 0 1 1h18a1 1 0 0 0 1-1V9c0-1.103-.897-2-2-2zM4 11h4v8H4v-8zm6-1V4h4v15h-4v-9zm10 9h-4V9h4v10z"></path>
                                          </svg>
                                       </div>
                                       <div>
                                          <div class="text-dark">Attainments</div>
                                          <p class="h6 text-dark my-1">Achievements and milestones reached.</p>
                                       </div>
                                    </li>
                                 </ul>
                              </a>
                           </li>
                           <li>
                              <a class="dropdown-item p-1" href="{{route('overall_time')}}">
                                 <ul class="p-0 p-2 list-unstyled">
                                    <li class="d-flex justify-content-start">
                                       <div class="me-2">
                                          <svg class="navbar_svg" xmlns="http://www.w3.org/2000/svg" width="30" height="20" viewBox="0 0 24 24">
                                             <path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm0 18c-4.411 0-8-3.589-8-8s3.589-8 8-8 8 3.589 8 8-3.589 8-8 8z"></path>
                                             <path d="M13 7h-2v6h6v-2h-4z"></path>
                                          </svg>
                                       </div>
                                       <div>
                                          <div class="text-dark">Time Spent</div>
                                          <p class="h6 text-dark my-1">Track your child's educational journey with insights on time spent</p>
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
                              <a class="dropdown-item p-1" href="{{route('parent_journey_progress')}}">
                                 <ul class="p-0 p-2 list-unstyled">
                                    <li class="d-flex justify-content-start">
                                       <div class="me-2">
                                       <svg class="navbar_svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#6d6d6d">
                                          <path d="M0 0h24v24H0V0z" fill="none"></path>
                                          <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V5h14v14zM7 10h2v7H7zm4-3h2v10h-2zm4 6h2v4h-2z"></path>
                                       </svg>
                                       </div>
                                       <div>
                                          <div class="text-dark">Progress</div>
                                          <p class="h6 text-dark my-1">Monitor your child's journey</p>
                                       </div>
                                    </li>
                                 </ul>
                              </a>
                           </li>
                           <li>
                              <a class="dropdown-item p-1" href="{{route('parent_journey_mastery_level')}}">
                                 <ul class="p-0 p-2 list-unstyled">
                                    <li class="d-flex justify-content-start">
                                       <div class="me-2">
                                       <svg class="navbar_svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#6d6d6d">
                                          <path d="M0 0h24v24H0V0z" fill="none"></path>
                                          <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V5h14v14zM7 10h2v7H7zm4-3h2v10h-2zm4 6h2v4h-2z"></path>
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
                              <a class="dropdown-item p-1" href="{{route('parent_journey_performance')}}">
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
                                          <p class="h6 text-dark my-1">Monitor child's journey performance</p>
                                       </div>
                                    </li>
                                 </ul>
                              </a>
                           </li>
                        </ul>
                     </li>
                     <li class="nav-item dropdown rounded-2 m-1 mx-2 px-1">
                        <a class="align-items-center d-flex fs-6 nav-link p-0 pt-1 text-dark fw-normal btn border-0" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><img src="{{url('images/resources_icon.png')}}" class="me-1" height="25" width="25" alt="resources icon"> Resources<i class="bx bxs-chevron-down small_bx_icon"></i></a>
                        <ul class="dropdown-menu border-0 shadow-lg rounded-3 p-2">
                           <li>
                              <a class="dropdown-item p-1" href="{{route('parent_set_section')}}">
                                 <ul class="p-0 p-2 list-unstyled">
                                    <li class="d-flex justify-content-start">
                                       <div class="me-2">
                                          <svg class="navbar_svg" fill="#6d6d6d" height="20" width="20" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512.043 512.043" xml:space="preserve">
                                             <g transform="translate(0 -1)">
                                                <g>
                                                   <g>
                                                      <path d="M443.218,136.923c-0.026-0.033-0.052-0.066-0.078-0.099c-0.435-0.522-0.891-1.036-1.388-1.533l-128-128
                                                         c-0.497-0.497-1.011-0.953-1.533-1.388c-0.032-0.027-0.066-0.052-0.099-0.078c-4.375-3.606-9.535-5.071-14.529-4.782H85.333
                                                         C73.551,1.043,64,10.594,64,22.376v469.333c0,11.782,9.551,21.333,21.333,21.333h341.333c11.782,0,21.333-9.551,21.333-21.333
                                                         V151.452C448.289,146.459,446.825,141.298,443.218,136.923z M375.163,129.043H320V73.879L375.163,129.043z M106.667,470.376
                                                         V43.709h170.667v106.667c0,11.782,9.551,21.333,21.333,21.333h106.667v298.667H106.667z"/>
                                                      <path d="M362.667,257.043H320c-11.782,0-21.333,9.551-21.333,21.333c0,11.782,9.551,21.333,21.333,21.333h42.667
                                                         c11.782,0,21.333-9.551,21.333-21.333C384,266.594,374.449,257.043,362.667,257.043z"/>
                                                      <path d="M149.333,299.709h85.333c11.782,0,21.333-9.551,21.333-21.333c0-11.782-9.551-21.333-21.333-21.333h-85.333
                                                         c-11.782,0-21.333,9.551-21.333,21.333C128,290.158,137.551,299.709,149.333,299.709z"/>
                                                      <path d="M192,129.043c11.776,0,21.333-9.557,21.333-21.333S203.776,86.376,192,86.376s-21.333,9.557-21.333,21.333
                                                         S180.224,129.043,192,129.043z"/>
                                                      <path d="M192,150.376c-23.573,0-42.667,25.003-42.667,42.667h85.333C234.667,175.379,215.573,150.376,192,150.376z"/>
                                                      <path d="M342.091,358.028c-4.011,20.075-63.637-0.427-70.997-9.408c-9.131-11.093-26.795-6.293-33.515,4.331
                                                         c-10.176,16.085-60.309,15.765-69.824,0c-14.165-23.488-51.072-2.069-36.843,21.525c22.615,37.487,89.252,42.863,126.277,17.51
                                                         c39.385,22.887,116.368,25.823,126.054-22.608C388.597,342.562,347.488,331.084,342.091,358.028z"/>
                                                   </g>
                                                </g>
                                             </g>
                                          </svg>
                                       </div>
                                       <div>
                                          <div class="text-dark">Sets</div>
                                          <p class="h6 text-dark my-1">Your Child's pathway to mastery and confidence in every subject.</p>
                                       </div>
                                    </li>
                                 </ul>
                              </a>
                           </li>
                           <li>
                              <a class="dropdown-item p-1" href="{{route('curriculum_exam')}}">
                                 <ul class="p-0 p-2 list-unstyled">
                                    <li class="d-flex justify-content-start">
                                       <div class="me-2">
                                          <svg class="navbar_svg" fill="#6d6d6d" height="20" width="20" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 392.533 392.533" xml:space="preserve">
                                             <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                             <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                             <g id="SVGRepo_iconCarrier">
                                                <g>
                                                   <g>
                                                      <path d="M292.396,324.849H99.879c-6.012,0-10.925,4.848-10.925,10.925c0,6.012,4.849,10.925,10.925,10.925h192.582 c6.012,0,10.925-4.849,10.925-10.925C303.321,329.697,298.473,324.849,292.396,324.849z"></path>
                                                   </g>
                                                </g>
                                                <g>
                                                   <g>
                                                      <path d="M292.396,277.01H99.879c-6.012,0-10.925,4.848-10.925,10.925c0,6.012,4.849,10.925,10.925,10.925h192.582 c6.012,0,10.925-4.849,10.925-10.925C303.321,281.859,298.473,277.01,292.396,277.01z"></path>
                                                   </g>
                                                </g>
                                                <g>
                                                   <g>
                                                      <path d="M196.137,45.834c-25.859,0-46.998,21.075-46.998,46.998c0,25.859,21.139,46.933,46.998,46.933 s46.998-21.075,46.998-46.998S221.996,45.834,196.137,45.834z M196.137,117.851c-13.77,0-25.083-11.313-25.083-25.083 c0-13.77,11.248-25.083,25.083-25.083s25.083,11.313,25.083,25.083C221.22,106.537,209.907,117.851,196.137,117.851z"></path>
                                                   </g>
                                                </g>
                                                <g>
                                                   <g>
                                                      <path d="M258.521,163.362c-39.887-15.515-84.752-15.515-124.638,0c-13.059,5.107-21.786,18.101-21.786,32.388v44.347 c-0.065,6.012,4.849,10.925,10.861,10.925h146.424c6.012,0,10.925-4.848,10.925-10.925V195.75 C280.307,181.463,271.58,168.469,258.521,163.362z M258.521,229.236H133.883v-33.422c0-5.301,3.168-10.214,7.887-12.024 c34.844-13.511,74.02-13.511,108.865,0c4.719,1.875,7.887,6.659,7.887,12.024V229.236z"></path>
                                                   </g>
                                                </g>
                                                <g>
                                                   <g>
                                                      <path d="M313.083,0H131.491c-8.404,0-16.291,3.232-22.238,9.18L57.018,61.414c-5.947,5.948-9.18,13.834-9.18,22.238v277.333 c0,17.39,14.158,31.547,31.547,31.547h233.762c17.39,0,31.547-14.158,31.547-31.547V31.547C344.501,14.158,330.343,0,313.083,0z M112.032,37.236v27.022H85.01L112.032,37.236z M322.715,116.816h-40.598c-6.012,0-10.925,4.849-10.925,10.925 c0,6.012,4.848,10.925,10.925,10.925h40.598v19.394h-14.869c-6.012,0-10.925,4.848-10.925,10.925 c0,6.012,4.849,10.925,10.925,10.925h14.869v181.139c0,5.366-4.331,9.697-9.632,9.697H79.192c-5.301,0-9.632-4.331-9.632-9.632 V86.044h53.398c6.012,0,10.925-4.848,10.925-10.925V21.721h179.2c5.301,0,9.632,4.331,9.632,9.632V116.816z"></path>
                                                   </g>
                                                </g>
                                             </g>
                                          </svg>
                                       </div>
                                       <div>
                                          <div class="text-dark">Curiculum</div>
                                          <p class="h6 text-dark my-1">Explore our inspiring curriculum for limitless possibilities.</p>
                                       </div>
                                    </li>
                                 </ul>
                              </a>
                           </li>
                           <li>
                              <a class="dropdown-item p-1" href="{{route('exams_question_analysis')}}">
                                 <ul class="p-0 p-2 list-unstyled">
                                    <li class="d-flex justify-content-start">
                                       <div class="me-2">
                                          <svg class="navbar_svg" xmlns="http://www.w3.org/2000/svg" width="20" height="24" viewBox="0 0 24 24">
                                             <path d="M19.071 4.929A9.97 9.97 0 0 0 12 2a9.936 9.936 0 0 0-7.071 2.929C3.04 6.818 2 9.33 2 12s1.04 5.182 2.929 7.071C6.818 20.96 9.33 22 12 22s5.182-1.04 7.071-2.929A9.936 9.936 0 0 0 22 12a9.97 9.97 0 0 0-2.929-7.071zm-1.414 12.728C16.146 19.168 14.137 20 12 20s-4.146-.832-5.657-2.343C4.832 16.146 4 14.137 4 12s.832-4.146 2.343-5.657A7.948 7.948 0 0 1 12 4v8h8a7.948 7.948 0 0 1-2.343 5.657z"></path>
                                          </svg>
                                       </div>
                                       <div>
                                          <div class="text-dark">Question Analysis</div>
                                          <p class="h6 text-dark my-1">Refine your's child's skills with precise question analysis.</p>
                                       </div>
                                    </li>
                                 </ul>
                              </a>
                           </li>
                           <li>
                              <a class="dropdown-item p-1" href="{{route('parent_mastery_level')}}">
                                 <ul class="p-0 p-2 list-unstyled">
                                    <li class="d-flex justify-content-start">
                                       <div class="me-2">
                                          <svg class="navbar_svg" xmlns="http://www.w3.org/2000/svg" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 441 512.02" fill="#6d6d6d" class="group-hover:text-white ltr:mr-3 rtl:ml-3 flex-shrink-0 h-6 w-6 text-secondary">
                                             <path d="M324.87 279.77c32.01 0 61.01 13.01 82.03 34.02 21.09 21 34.1 50.05 34.1 82.1 0 32.06-13.01 61.11-34.02 82.11l-1.32 1.22c-20.92 20.29-49.41 32.8-80.79 32.8-32.06 0-61.1-13.01-82.1-34.02-21.01-21-34.02-50.05-34.02-82.11s13.01-61.1 34.02-82.1c21-21.01 50.04-34.02 82.1-34.02zM243.11 38.08v54.18c.99 12.93 5.5 23.09 13.42 29.85 8.2 7.01 20.46 10.94 36.69 11.23l37.92-.04-88.03-95.22zm91.21 120.49-41.3-.04c-22.49-.35-40.21-6.4-52.9-17.24-13.23-11.31-20.68-27.35-22.19-47.23l-.11-1.74V25.29H62.87c-10.34 0-19.75 4.23-26.55 11.03-6.8 6.8-11.03 16.21-11.03 26.55v336.49c0 10.3 4.25 19.71 11.06 26.52 6.8 6.8 16.22 11.05 26.52 11.05h119.41c2.54 8.79 5.87 17.25 9.92 25.29H62.87c-17.28 0-33.02-7.08-44.41-18.46C7.08 432.37 0 416.64 0 399.36V62.87c0-17.26 7.08-32.98 18.45-44.36C29.89 7.08 45.61 0 62.87 0h173.88c4.11 0 7.76 1.96 10.07 5l109.39 118.34c2.24 2.43 3.34 5.49 3.34 8.55l.03 119.72c-8.18-1.97-16.62-3.25-25.26-3.79v-89.25zm-229.76 54.49c-6.98 0-12.64-5.66-12.64-12.64 0-6.99 5.66-12.65 12.64-12.65h150.49c6.98 0 12.65 5.66 12.65 12.65 0 6.98-5.67 12.64-12.65 12.64H104.56zm0 72.3c-6.98 0-12.64-5.66-12.64-12.65 0-6.98 5.66-12.64 12.64-12.64h142.52c3.71 0 7.05 1.6 9.37 4.15a149.03 149.03 0 0 0-30.54 21.14H104.56zm0 72.3c-6.98 0-12.64-5.66-12.64-12.65 0-6.98 5.66-12.64 12.64-12.64h86.2c-3.82 8.05-6.95 16.51-9.29 25.29h-76.91zm187.98 17.13 20.56 19.44 41.38-42.02c3.86-3.92 6.27-7.05 11.05-2.17l15.45 15.82c5.06 5.01 4.8 7.94.01 12.63l-59.09 58.07c-10.07 9.88-8.33 10.51-18.54.34l-36.84-36.62c-2.1-2.3-1.88-4.63.42-6.96l17.93-18.57c2.72-2.82 4.88-2.64 7.67.04z" stroke-width="2"></path>
                                          </svg>
                                       </div>
                                       <div>
                                          <div class="text-dark">Mastery Level</div>
                                          <p class="h6 text-dark my-1">Assess mastery level – a gauge of proficiency and understanding in each subject</p>
                                       </div>
                                    </li>
                                 </ul>
                              </a>
                           </li>
                        </ul>
                     </li>
                     <li class="nav-item px-1 rounded-2 m-1 mx-2"><a class="align-items-center d-flex fs-6 nav-link p-0 pt-1 text-dark fw-normal" aria-current="page" href="/contact"><img src="{{url('images/help_icon.png')}}" class="me-1" height="20" width="20" alt="help icon"> Need Help</a></li>
                  </ul>
               </div>
            </div>
         </nav>
         <div class="ms-auto navbar_right_button me-2">
            @if($notifications['unread'] > 0)
            <button class="border-0 btn p-0 position-relative notification_bell_btn shadow-none w-100" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
               <img src="{{url('images/notification_bell.webp')}}" width="40" height="40" alt="notification animated icon">
               <div class="bg-primary end-0 position-absolute rounded-circle text-white top-0 notification_dot notification_count">{{$notifications['unread']}}</div>
            </button>
            @else<button class="border-0 btn p-0 position-relative notification_bell_btn shadow-none w-100" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><img src="{{url('images/notification_bell.webp')}}" width="40" height="40" alt="notification animated icon"></button>@endif
         </div>
         <div class="notification_offcanvas offcanvas offcanvas-end rounded-5  mx-sm-1 mt-3" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
            <div class="offcanvas-header">
               <h5 class="offcanvas-title" id="offcanvasRightLabel">Notifications</h5>
               <button type="button" class="btn-close shadow-none" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body px-3">
               <hr class="mt-0">
               <div class="form-check">
                  <p class="form-check-label text-end text-light-emphasis" for="flexCheckDefault"><span class="notification_count">{{$notifications['unread']}}</span> Unread out of {{$notifications['total']}}</p>
               </div>
               <hr class="mt-3 mb-2">
               @if($notifications['total'] > 0) @foreach($notifications['data'] as $notification)
               <div class="read_notification cursor-pointer p-2 rounded-2" data-id="{{$notification['id']}}" data-read="@if($notification['read']) true @else false @endif">
                  <p class="title text-dark font-weight-bold @if(!$notification['read']) fw-bold @endif">{{$notification['title']}}</p>
                  <p class="message line-clamp-1 @if(!$notification['read']) fw-semibold text-black @endif">{{$notification['message']}}</p>
                  <p class="date notification-small-size">{{$notification['created_at']}}</p>
               </div>
               <hr class="my-2">
               @endforeach @else
               <div class="text-center">No Notification</div>
               @endif
            </div>
         </div>
         <div class="dropdown profile_avatar_section border rounded-5 p-1">
            <a class="btn d-flex align-items-center p-0 border-0 rounded-pill" aria-label="Avators" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            @if($imgpath)
               <div class="profile_dropdown_button rounded-circle overflow-hidden shadow" style="background: url({{url($imgpath)}}) center top; background-size: cover;"></div>
            @else 
               <div class="profile_dropdown_button rounded-circle overflow-hidden shadow" style="background: url({{url('profile-photos/user-profile-icon.svg')}}) center top; background-size: cover;"></div>
            @endif
               <span class="mx-1"><i class="bx bxs-chevron-down small_bx_icon"></i></span>
            </a>
            <ul class="dropdown-menu dropdown-menu-end border-0 shadow-lg rounded-3 p-2">
               <li>
                  <a class="dropdown-item p-1" href="/parent/profile">
                     <ul class="p-0 p-2 list-unstyled">
                        <li class="d-flex justify-content-start">
                           <div class="me-2"><i class="bx bx-user small_bx_icon color_bx_icon"></i></div>
                           <div>
                              <div>My Profile</div>
                           </div>
                        </li>
                     </ul>
                  </a>
               </li>
               <li>
                  <a href="{{ route('create_new_child') }}" class="dropdown-item p-1">
                     <ul class="p-0 p-2 list-unstyled">
                        <li class="d-flex justify-content-start">
                           <div class="me-2"><i class="bx bx-user-plus small_bx_icon color_bx_icon"></i></div>
                           <div>
                              <div>Add New Child</div>
                           </div>
                        </li>
                     </ul>
                  </a>
               </li>
               @if(auth()->user()->roles()->first()->name == 'teacher')
                  <li>
                     <a href="{{route('add_existing_student')}}" class="dropdown-item p-1">
                        <ul class="p-0 p-2 list-unstyled">
                           <li class="d-flex justify-content-start">
                              <div class="me-2"><i class="bx bx-user-circle small_bx_icon color_bx_icon"></i></div>
                              <div>
                                 <div>Add Existing Student</div>
                              </div>
                           </li>
                        </ul>
                     </a>
                  </li>
               @endif
               <li>
                  <a href="{{route('change_child')}}" class="dropdown-item p-1">
                     <ul class="p-0 p-2 list-unstyled">
                        <li class="d-flex justify-content-start">
                           <div class="me-2"><i class="bx bx-user-check small_bx_icon color_bx_icon"></i></div>
                           <div>
                              <div>Select Child</div>
                           </div>
                        </li>
                     </ul>
                  </a>
               </li>
               <li>
                  <a class="dropdown-item p-1" href="/child-subscriptions">
                     <ul class="p-0 p-2 list-unstyled">
                        <li class="d-flex justify-content-start">
                           <div class="me-2"><i class="bx bx-cog small_bx_icon color_bx_icon"></i></div>
                           <div>
                              <div>Subscriptions</div>
                           </div>
                        </li>
                     </ul>
                  </a>
               </li>
               <li>
                  <a class="dropdown-item p-1" href="/child-payments">
                     <ul class="p-0 p-2 list-unstyled">
                        <li class="d-flex justify-content-start">
                           <div class="me-2"><i class="bx bx-credit-card small_bx_icon color_bx_icon"></i></div>
                           <div>
                              <div>Payments</div>
                           </div>
                        </li>
                     </ul>
                  </a>
               </li>
               <li class="dropdown-divider"></li>
               <li>
                  <form method="POST" action="{{ route('destroy') }}">
                     @csrf
                     <button type="submit" class="dropdown-item p-1">
                        <ul class="p-0 px-2 list-unstyled">
                           <li class="d-flex justify-content-start">
                              <div class="me-2"><i class="bx bx-log-out small_bx_icon color_bx_icon"></i></div>
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
   </div>
   <div class="offcanvas offcanvas-start shadow d-lg-none" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="header_to_sidebar" aria-labelledby="header_to_sidebarLabel">
      <div class="offcanvas-header">
         <div class="d-flex align-items-center">
            <a class="navbar-brand me-2" href="/change-child"><img src="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->logo_path) }}" width="45" height="45" alt="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->app_name) }}"></a>
            <h5 class="offcanvas-title" id="header_to_sidebarLabel">Tutorselevenplus</h5>
         </div>
         <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body menu-vertical menu bg-menu-theme w-100">
         <ul class="menu-inner py-3">
            <li class="menu-item w-100 my-1">
               <a href="{{route('change_child')}}" class="menu-link">
                  <span class="me-2">
                     <svg xmlns="http://www.w3.org/2000/svg" class="navbar_svg" width="20" height="20" viewBox="0 0 24 24" style="fill:rgba(255,255,255,1)">
                        <path d="M19 3H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2h14c1.103 0 2-.897 2-2V5c0-1.103-.897-2-2-2zm0 2 .001 4H5V5h14zM5 11h8v8H5v-8zm10 8v-8h4.001l.001 8H15z"></path>
                     </svg>
                  </span>
                  <div>Dashboard</div>
               </a>
            </li>
            <li class="menu-header w-100 my-1 small text-uppercase"><span class="menu-header-text text-primary">Pages</span></li>
            <li class="menu-item w-100 my-1">
               <a href="{{route('progress')}}" class="menu-link">
                  <span class="me-2">
                     <svg class="navbar_svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#6d6d6d">
                        <path d="M0 0h24v24H0V0z" fill="none"></path>
                        <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V5h14v14zM7 10h2v7H7zm4-3h2v10h-2zm4 6h2v4h-2z"></path>
                     </svg>
                  </span>
                  <div>Progress</div>
               </a>
            </li>
            <li class="menu-item w-100 my-1">
               <a href="{{route('exams_attainment')}}" class="menu-link">
                  <span class="me-2">
                     <svg class="navbar_svg" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                        <path d="M20 7h-4V4c0-1.103-.897-2-2-2h-4c-1.103 0-2 .897-2 2v5H4c-1.103 0-2 .897-2 2v9a1 1 0 0 0 1 1h18a1 1 0 0 0 1-1V9c0-1.103-.897-2-2-2zM4 11h4v8H4v-8zm6-1V4h4v15h-4v-9zm10 9h-4V9h4v10z"></path>
                     </svg>
                  </span>
                  <div>Attainments</div>
               </a>
            </li>
            <li class="menu-item w-100 my-1">
               <a href="{{route('overall_time')}}" class="menu-link">
                  <span class="me-2">
                     <svg class="navbar_svg" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                        <path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm0 18c-4.411 0-8-3.589-8-8s3.589-8 8-8 8 3.589 8 8-3.589 8-8 8z"></path>
                        <path d="M13 7h-2v6h6v-2h-4z"></path>
                     </svg>
                  </span>
                  <div>Time Spent</div>
               </a>
            </li>
            <li class="menu-item w-100 my-1">
               <a href="{{route('exams_question_analysis')}}" class="menu-link">
                  <span class="me-2">
                     <svg class="navbar_svg" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path d="M19.071 4.929A9.97 9.97 0 0 0 12 2a9.936 9.936 0 0 0-7.071 2.929C3.04 6.818 2 9.33 2 12s1.04 5.182 2.929 7.071C6.818 20.96 9.33 22 12 22s5.182-1.04 7.071-2.929A9.936 9.936 0 0 0 22 12a9.97 9.97 0 0 0-2.929-7.071zm-1.414 12.728C16.146 19.168 14.137 20 12 20s-4.146-.832-5.657-2.343C4.832 16.146 4 14.137 4 12s.832-4.146 2.343-5.657A7.948 7.948 0 0 1 12 4v8h8a7.948 7.948 0 0 1-2.343 5.657z"></path>
                     </svg>
                  </span>
                  <div>Question Analysis</div>
               </a>
            </li>
            <li class="menu-item w-100 my-1">
               <a href="{{route('parent_mastery_level')}}" class="menu-link">
                  <span class="me-2">
                     <svg class="navbar_svg" xmlns="http://www.w3.org/2000/svg" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 441 512.02" fill="#6d6d6d" class="group-hover:text-white ltr:mr-3 rtl:ml-3 flex-shrink-0 h-6 w-6 text-secondary">
                        <path d="M324.87 279.77c32.01 0 61.01 13.01 82.03 34.02 21.09 21 34.1 50.05 34.1 82.1 0 32.06-13.01 61.11-34.02 82.11l-1.32 1.22c-20.92 20.29-49.41 32.8-80.79 32.8-32.06 0-61.1-13.01-82.1-34.02-21.01-21-34.02-50.05-34.02-82.11s13.01-61.1 34.02-82.1c21-21.01 50.04-34.02 82.1-34.02zM243.11 38.08v54.18c.99 12.93 5.5 23.09 13.42 29.85 8.2 7.01 20.46 10.94 36.69 11.23l37.92-.04-88.03-95.22zm91.21 120.49-41.3-.04c-22.49-.35-40.21-6.4-52.9-17.24-13.23-11.31-20.68-27.35-22.19-47.23l-.11-1.74V25.29H62.87c-10.34 0-19.75 4.23-26.55 11.03-6.8 6.8-11.03 16.21-11.03 26.55v336.49c0 10.3 4.25 19.71 11.06 26.52 6.8 6.8 16.22 11.05 26.52 11.05h119.41c2.54 8.79 5.87 17.25 9.92 25.29H62.87c-17.28 0-33.02-7.08-44.41-18.46C7.08 432.37 0 416.64 0 399.36V62.87c0-17.26 7.08-32.98 18.45-44.36C29.89 7.08 45.61 0 62.87 0h173.88c4.11 0 7.76 1.96 10.07 5l109.39 118.34c2.24 2.43 3.34 5.49 3.34 8.55l.03 119.72c-8.18-1.97-16.62-3.25-25.26-3.79v-89.25zm-229.76 54.49c-6.98 0-12.64-5.66-12.64-12.64 0-6.99 5.66-12.65 12.64-12.65h150.49c6.98 0 12.65 5.66 12.65 12.65 0 6.98-5.67 12.64-12.65 12.64H104.56zm0 72.3c-6.98 0-12.64-5.66-12.64-12.65 0-6.98 5.66-12.64 12.64-12.64h142.52c3.71 0 7.05 1.6 9.37 4.15a149.03 149.03 0 0 0-30.54 21.14H104.56zm0 72.3c-6.98 0-12.64-5.66-12.64-12.65 0-6.98 5.66-12.64 12.64-12.64h86.2c-3.82 8.05-6.95 16.51-9.29 25.29h-76.91zm187.98 17.13 20.56 19.44 41.38-42.02c3.86-3.92 6.27-7.05 11.05-2.17l15.45 15.82c5.06 5.01 4.8 7.94.01 12.63l-59.09 58.07c-10.07 9.88-8.33 10.51-18.54.34l-36.84-36.62c-2.1-2.3-1.88-4.63.42-6.96l17.93-18.57c2.72-2.82 4.88-2.64 7.67.04z" stroke-width="2"></path>
                     </svg>
                  </span>
                  <div>Mastery Level</div>
               </a>
            </li>
            <li class="menu-item w-100 my-1">
               <a href="{{route('curriculum_exam')}}" class="menu-link">
                  <span class="me-2">
                     <svg class="navbar_svg" fill="#6d6d6d" height="20" width="20" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 392.533 392.533" xml:space="preserve">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                           <g>
                              <g>
                                 <path d="M292.396,324.849H99.879c-6.012,0-10.925,4.848-10.925,10.925c0,6.012,4.849,10.925,10.925,10.925h192.582 c6.012,0,10.925-4.849,10.925-10.925C303.321,329.697,298.473,324.849,292.396,324.849z"></path>
                              </g>
                           </g>
                           <g>
                              <g>
                                 <path d="M292.396,277.01H99.879c-6.012,0-10.925,4.848-10.925,10.925c0,6.012,4.849,10.925,10.925,10.925h192.582 c6.012,0,10.925-4.849,10.925-10.925C303.321,281.859,298.473,277.01,292.396,277.01z"></path>
                              </g>
                           </g>
                           <g>
                              <g>
                                 <path d="M196.137,45.834c-25.859,0-46.998,21.075-46.998,46.998c0,25.859,21.139,46.933,46.998,46.933 s46.998-21.075,46.998-46.998S221.996,45.834,196.137,45.834z M196.137,117.851c-13.77,0-25.083-11.313-25.083-25.083 c0-13.77,11.248-25.083,25.083-25.083s25.083,11.313,25.083,25.083C221.22,106.537,209.907,117.851,196.137,117.851z"></path>
                              </g>
                           </g>
                           <g>
                              <g>
                                 <path d="M258.521,163.362c-39.887-15.515-84.752-15.515-124.638,0c-13.059,5.107-21.786,18.101-21.786,32.388v44.347 c-0.065,6.012,4.849,10.925,10.861,10.925h146.424c6.012,0,10.925-4.848,10.925-10.925V195.75 C280.307,181.463,271.58,168.469,258.521,163.362z M258.521,229.236H133.883v-33.422c0-5.301,3.168-10.214,7.887-12.024 c34.844-13.511,74.02-13.511,108.865,0c4.719,1.875,7.887,6.659,7.887,12.024V229.236z"></path>
                              </g>
                           </g>
                           <g>
                              <g>
                                 <path d="M313.083,0H131.491c-8.404,0-16.291,3.232-22.238,9.18L57.018,61.414c-5.947,5.948-9.18,13.834-9.18,22.238v277.333 c0,17.39,14.158,31.547,31.547,31.547h233.762c17.39,0,31.547-14.158,31.547-31.547V31.547C344.501,14.158,330.343,0,313.083,0z M112.032,37.236v27.022H85.01L112.032,37.236z M322.715,116.816h-40.598c-6.012,0-10.925,4.849-10.925,10.925 c0,6.012,4.848,10.925,10.925,10.925h40.598v19.394h-14.869c-6.012,0-10.925,4.848-10.925,10.925 c0,6.012,4.849,10.925,10.925,10.925h14.869v181.139c0,5.366-4.331,9.697-9.632,9.697H79.192c-5.301,0-9.632-4.331-9.632-9.632 V86.044h53.398c6.012,0,10.925-4.848,10.925-10.925V21.721h179.2c5.301,0,9.632,4.331,9.632,9.632V116.816z"></path>
                              </g>
                           </g>
                        </g>
                     </svg>
                  </span>
                  <div>Curiculum</div>
               </a>
            </li>
            <li class="menu-item w-100 my-1">
               <a href="{{route('parent_set_section')}}" class="menu-link">
                  <span class="me-2">
                     <svg class="navbar_svg" fill="#6d6d6d" height="20" width="20" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512.043 512.043" xml:space="preserve">
                        <g transform="translate(0 -1)">
                           <g>
                              <g>
                                 <path d="M443.218,136.923c-0.026-0.033-0.052-0.066-0.078-0.099c-0.435-0.522-0.891-1.036-1.388-1.533l-128-128
                                    c-0.497-0.497-1.011-0.953-1.533-1.388c-0.032-0.027-0.066-0.052-0.099-0.078c-4.375-3.606-9.535-5.071-14.529-4.782H85.333
                                    C73.551,1.043,64,10.594,64,22.376v469.333c0,11.782,9.551,21.333,21.333,21.333h341.333c11.782,0,21.333-9.551,21.333-21.333
                                    V151.452C448.289,146.459,446.825,141.298,443.218,136.923z M375.163,129.043H320V73.879L375.163,129.043z M106.667,470.376
                                    V43.709h170.667v106.667c0,11.782,9.551,21.333,21.333,21.333h106.667v298.667H106.667z"/>
                                 <path d="M362.667,257.043H320c-11.782,0-21.333,9.551-21.333,21.333c0,11.782,9.551,21.333,21.333,21.333h42.667
                                    c11.782,0,21.333-9.551,21.333-21.333C384,266.594,374.449,257.043,362.667,257.043z"/>
                                 <path d="M149.333,299.709h85.333c11.782,0,21.333-9.551,21.333-21.333c0-11.782-9.551-21.333-21.333-21.333h-85.333
                                    c-11.782,0-21.333,9.551-21.333,21.333C128,290.158,137.551,299.709,149.333,299.709z"/>
                                 <path d="M192,129.043c11.776,0,21.333-9.557,21.333-21.333S203.776,86.376,192,86.376s-21.333,9.557-21.333,21.333
                                    S180.224,129.043,192,129.043z"/>
                                 <path d="M192,150.376c-23.573,0-42.667,25.003-42.667,42.667h85.333C234.667,175.379,215.573,150.376,192,150.376z"/>
                                 <path d="M342.091,358.028c-4.011,20.075-63.637-0.427-70.997-9.408c-9.131-11.093-26.795-6.293-33.515,4.331
                                    c-10.176,16.085-60.309,15.765-69.824,0c-14.165-23.488-51.072-2.069-36.843,21.525c22.615,37.487,89.252,42.863,126.277,17.51
                                    c39.385,22.887,116.368,25.823,126.054-22.608C388.597,342.562,347.488,331.084,342.091,358.028z"/>
                              </g>
                           </g>
                        </g>
                     </svg>
                  </span>
                  <div>Sets</div>
               </a>
            </li>
            <li class="menu-item w-100 my-1">
               <a href="{{route('parent_journey_progress')}}" class="menu-link">
                  <span class="me-2">
                     <svg class="navbar_svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#6d6d6d">
                        <path d="M0 0h24v24H0V0z" fill="none"></path>
                        <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V5h14v14zM7 10h2v7H7zm4-3h2v10h-2zm4 6h2v4h-2z"></path>
                     </svg>
                  </span>
                  <div>Journey Progress</div>
               </a>
            </li>
            <li class="menu-item w-100 my-1">
               <a href="{{route('parent_journey_mastery_level')}}" class="menu-link">
                  <span class="me-2">
                     <svg class="navbar_svg" xmlns="http://www.w3.org/2000/svg" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 441 512.02" fill="#6d6d6d">
                        <path d="M324.87 279.77c32.01 0 61.01 13.01 82.03 34.02 21.09 21 34.1 50.05 34.1 82.1 0 32.06-13.01 61.11-34.02 82.11l-1.32 1.22c-20.92 20.29-49.41 32.8-80.79 32.8-32.06 0-61.1-13.01-82.1-34.02-21.01-21-34.02-50.05-34.02-82.11s13.01-61.1 34.02-82.1c21-21.01 50.04-34.02 82.1-34.02zM243.11 38.08v54.18c.99 12.93 5.5 23.09 13.42 29.85 8.2 7.01 20.46 10.94 36.69 11.23l37.92-.04-88.03-95.22zm91.21 120.49-41.3-.04c-22.49-.35-40.21-6.4-52.9-17.24-13.23-11.31-20.68-27.35-22.19-47.23l-.11-1.74V25.29H62.87c-10.34 0-19.75 4.23-26.55 11.03-6.8 6.8-11.03 16.21-11.03 26.55v336.49c0 10.3 4.25 19.71 11.06 26.52 6.8 6.8 16.22 11.05 26.52 11.05h119.41c2.54 8.79 5.87 17.25 9.92 25.29H62.87c-17.28 0-33.02-7.08-44.41-18.46C7.08 432.37 0 416.64 0 399.36V62.87c0-17.26 7.08-32.98 18.45-44.36C29.89 7.08 45.61 0 62.87 0h173.88c4.11 0 7.76 1.96 10.07 5l109.39 118.34c2.24 2.43 3.34 5.49 3.34 8.55l.03 119.72c-8.18-1.97-16.62-3.25-25.26-3.79v-89.25zm-229.76 54.49c-6.98 0-12.64-5.66-12.64-12.64 0-6.99 5.66-12.65 12.64-12.65h150.49c6.98 0 12.65 5.66 12.65 12.65 0 6.98-5.67 12.64-12.65 12.64H104.56zm0 72.3c-6.98 0-12.64-5.66-12.64-12.65 0-6.98 5.66-12.64 12.64-12.64h142.52c3.71 0 7.05 1.6 9.37 4.15a149.03 149.03 0 0 0-30.54 21.14H104.56zm0 72.3c-6.98 0-12.64-5.66-12.64-12.65 0-6.98 5.66-12.64 12.64-12.64h86.2c-3.82 8.05-6.95 16.51-9.29 25.29h-76.91zm187.98 17.13 20.56 19.44 41.38-42.02c3.86-3.92 6.27-7.05 11.05-2.17l15.45 15.82c5.06 5.01 4.8 7.94.01 12.63l-59.09 58.07c-10.07 9.88-8.33 10.51-18.54.34l-36.84-36.62c-2.1-2.3-1.88-4.63.42-6.96l17.93-18.57c2.72-2.82 4.88-2.64 7.67.04z" stroke-width="2"></path>
                     </svg>
                  </span>
                  <div>Journey Mastery Level</div>
               </a>
            </li>
            <li class="menu-item w-100 my-1">
               <a href="{{route('parent_journey_performance')}}" class="menu-link">
                  <span class="me-2">
                     <svg class="navbar_svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#6d6d6d">
                        <path d="M0 0h24v24H0V0z" fill="none"></path>
                        <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V5h14v14zM7 10h2v7H7zm4-3h2v10h-2zm4 6h2v4h-2z"></path>
                     </svg>
                  </span>
                  <div>Journey Performance</div>
               </a>
            </li>
            <li class="menu-item w-100 my-1"><a href="/contact" class="menu-link"><i class="bx bx-help-circle small_bx_icon color_bx_icon me-1"></i>Need Help</a></li>
         </ul>
      </div>
   </div>
    
   <div class="col-lg-10 col-md-11 col-sm-12 col-12 mx-auto pt-4 p-3" style="margin-top: 4rem;">

   <!-- Chat box -->
   <div id='whatsapp-chat' class='hide shadow-lg'>
      <div class='header-chat position-relative'>
         <div class='head-home d-flex align-items-center'>
            <div class='info-avatar me-2 rounded-circle' style="height: 45px; width: 45px; background: url('{{ $imgpath ? url($imgpath) : url('images/user_avatar.webp') }}') center top no-repeat; background-size: cover;"></div>
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
   </div>
   <a class='blantershow-chat'  title='Show Chat'>
      <div class="chat_details_badge me-2 text-center rounded-pill p-2">Chat with us</div>
      <img src="{{url('images/live_chat.png')}}" class="img-fluid" width="50" height="50" alt="TutorsElevenPlus live chat">
   </a>

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
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
         $("#loginError").fadeOut(4000,function () {
            $(this).hide();
         })
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
            <div class="overflow-scroll h-100 px-3 notification_detail_body">
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
         var multipleCancelButton = new Choices('#parent_name', {
                  removeItemButton: false,
                  searchEnabled: false,
         }); 
      });
      // $(".blantershow-chat").one('click', function(){
      //    $(".chat_notification_badge").remove();
      // });
   </script>