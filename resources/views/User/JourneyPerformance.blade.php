<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <title>Child Journey Performance</title>
    
    <!-- rel icon -->
    <link rel="icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}">
    <meta name="description" content="{{ app(\App\Settings\SiteSettings::class)->seo_description }}">
    <meta name="author" content="{{ app(\App\Settings\SiteSettings::class)->app_name }}">
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
 <!-- bootstrap cdn -->
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    
  </head>
  <style>
    /* swiper */
    .section_swiper {
      width: auto;
      height:auto;
    }

    .swiper-slide {
      text-align: center;
      font-size: 18px;
      display: flex;
      /* justify-content: center; */
      align-items: center;
      
    }
    /* .swiper-slide img {
      display: block;
      width: 100%;
      height: 100%;
      object-fit: cover;
    } */
    /* .select_topic.active{
      color:white !important;
      background-color:var(--portal-secondary);
    } */
    .tab-body {
      min-height: 120px;
      max-height: auto;
      min-width: 210px;
      max-width: auto;
    }

    .performance-bar {
      border: 1px solid rgb(206, 206, 206);
      border-radius: 20px;
    }

    .progress-bar-wrap {  
      background-color: var(--portal-primary);
      /* width: 150px; */
      border-radius: 20px;
    }

    /* .performance-table{
      overflow-y: scroll;
      height: 500px;
      } */
    .heading_separator {
      height: 0.1rem;
      width: 120px;
      background: rgb(47, 0, 255);
    }

    .practice {
      border: 2px solid var(--portal-primary);
      border-bottom-left-radius: 20px;
      border-bottom-right-radius: 20px;
      min-height: 80px;
      max-height: auto;
      background: #f0f7ff;
    }

    .card-one {
      background: #ebffee;
      border-radius: 15px;
    }

    .card-two {
      background: #fff6e5;
      border-radius: 15px;
    }

    .card-text .button1 {
      background: #958246;
      border: none;
      text-align: center;
      border-radius: 10px;
      font-size: small;
      color: white;
      border-radius: 50rem!important;
    }

    .card-text .button2 {
      background: hsl(215, 100%, 98%);
      border: none;
      height: 40px;
      width: 150px;
      text-align: center;
      border-radius: 10px;
      font-size: small;
    }

    .button3 {
      background: hsl(215, 100%, 98%);
      border: none;
      height: 40px;
      width: 100px;
      text-align: center;
      border-radius: 10px;
      font-size: small;
    }

    .card-text .button4 {
      background: #ffd54b;
      border: none;
      text-align: center;
      border-radius: 10px;
      font-size: small;
      color: #000;
      border-radius: 50rem!important;
    }

    .card-text .button5 {
      background: hsl(215, 100%, 98%);
      border: none;
      height: 40px;
      width: 200px;
      text-align: center;
      border-radius: 10px;
      font-size: small;
    }

    .card-text .button6 {
      background: hsl(215, 100%, 98%);
      border: none;
      height: 40px;
      width: 200px;
      text-align: center;
      border-radius: 10px;
      font-size: small;
    }

    .separator {
      height: 0.2rem;
      width: 10px;
      background: rgb(236, 147, 30);
    }

    .collapse-text {
      background: #ffecd5;
      border: 2px solid #ffddb2;
      border-radius: 1rem;
    }

    .progress_bar_wrap {
      width: 15px;
      height: 0.5rem;
    }

    /* .performance-sub{
      overflow-x: scroll;
      overflow-x: hidden;
      width:500px;
      } */
    .need_practice {
      background-color: #f58c37;
    }

    .good {
      background-color: #71c6fc;
    }

    .strong {
      background-color: #478b08;
    }

    .master {
      background-color: #815fdd;
    }

    .edit {
      font-size: smaller;
    }

    .button7 {
      background: hsl(39, 100%, 94%);
      color: hsl(24, 100%, 37%);
    }

    .button8 {
      background: hsl(215, 100%, 98%);
      color: hsl(223, 78%, 44%);
    }

    .button9 {
      background: hsl(39, 100%, 94%);
      color: hsl(24, 100%, 37%);
    }

    .button10 {
      background: hsl(215, 100%, 98%);
      color: hsl(223, 78%, 44%)
    }

    .plus_section {
      overflow-x: scroll;
      overflow-y: hidden;
      width: 100%;
    }

    /* width */
    .plus_section::-webkit-scrollbar {
      height: 7px;
    }

    /* Track */
    .plus_section::-webkit-scrollbar-track {
      background: #f1f1f1;
    }

    /* Handle */
    .plus_section::-webkit-scrollbar-thumb {
      background: #c2c2c2;
    }

    /* Handle on hover */
    .plus_section::-webkit-scrollbar-thumb:hover {
      background: #b8b8b8;
    }

    .need {
      background: hsl(39, 100%, 94%);
    }

    .subjects {
      overflow-x: scroll;
      overflow-y: hidden;
      width: 100%;
    }

    .not_active_section {
      background: hsl(0, 0%, 92%);
      border: 1px solid #d2d2d2;
    }

    .student_comparison_logo {
      top: 16px;
      left: calc({{$all_comparison}}% - 10px);
    }

    .student_comparison_line {
      rotate: 90deg;
    }

    /* .select_topic.active {
      color: var(--portal-primary);
      font-weight: 500;
      border-bottom: 2px solid var(--portal-primary);
    } */

    .topic_table {
      display: none;
    }

    .topic_table.active {
      display: block;
    }

    .text-dark-black {
      color: #000000;
    }

    .mastery_level_bar {
      height: 7px;
      max-width: 130px;
    }

    .bs-gutter-x-0 {
      --bs-gutter-x: 0 !important;
    }

    .fs-7 {
      font-size: 13px;
    }

    .video_preview_btn {
      color: var(--portal-primary);
      width: fit-content;
    }

    .video_preview_btn:hover {
      text-decoration: underline;
    }

    .form-check-input:checked {
      background-color: var(--portal-primary)!important;
    }
    
    .set_practice_button {
        background: var(--portal-secondary) !important;
        color: #fff !important;
    }

    .modal_btn_link {
      color: var(--portal-primary)!important;
    }

    .w_300 {
      min-width: 300px;
    }

    .w_250 {
      min-width: 250px;
    }

    .w_200 {
      min-width: 200px;
    }

    .w_180 {
      min-width: 180px;
    }

    .w_150 {
      min-width: 150px;
    }

    .w_100 {
      min-width: 100px;
    }
    .table-responsive::-webkit-scrollbar {
      height: 0.5rem!important;
    }
    .table-responsive::-webkit-scrollbar-thumb {
      background: #8e8e8e!important;
      border-radius: 50rem;
    }
    .performance_header
    {
        background:linear-gradient(45deg, #002d3e, #5ac1e2);
    }
    .heading_separator {
        height: 0.4rem;
        width: 120px;
        background: orange;
        border-radius: 20rem;
    }
    .not_active_section
    {
      background-color:white !important;
     
    }
    .active_subject
    {
      background-color:white !important;
    }
  .progress{
    background-color:white!important;
  }
  </style>
  <style>
      .performance_header_section {
        height: auto;
        width: auto;
      }

      .section_card {
        border: 2px solid #dee2e6 !important;
      }

      .select_section_card {
        border: 2px solid var(--portal-primary) !important;
      }
      /* .average_performance {
        background-color: #ffa100;
      }

      .good_performance {
        background-color: #006eff;
      }

      .strong_performance {
        background-color: #339546;
      }

      .master_performance {
        background-color: #5028bf;
      } */

      .master_performance {
          background: radial-gradient(#ae5dd5, #6f27a2) !important;
      }

      .average_performance {
          background: radial-gradient(#ca747d, #dc3545) !important;
      }

      .good_performance {
          background: radial-gradient(#0e8eff, #084ddc) !important;
      }

      .strong_performance {
          background: radial-gradient(#ffba39, #e49500) !important;
      }

      .progress_chart {
        position: relative;
        width: 100%;
        height: 100%;
        text-align: center;
        font-size: 35px;
        line-height: 160px;
        height: 160px;
        color: #ffffff;
      }

      .progress_chart canvas {
        position: absolute;
        top: 0;
        left: 50%;
        right: 50%;
        transform: translateX(-50%);
      }

      .topics_swiper {
        height: auto;
        width: auto;
      }

      .topics_card_item {
        background: radial-gradient( #ffbc00, #ff941d) !important;
        border: none;
        min-height:140px;
        max-height:fit-content;
      }

      .practice_banner {
        height: auto;
        width: auto;
        margin: 4rem auto !important;
      }

      .btn_secondary_outlined {
        background: transparent !important;
        color: #fff !important;
        border: 2px solid var(--portal-secondary) !important;
        transition: 0.25s;
      }

      .btn_secondary_outlined:hover {
        background: linear-gradient(358deg, #ef8f00, var(--portal-secondary)) !important;
        color: #fff !important;
      }
      .heading_separator {
        height: 0.4rem;
        width: 120px;
        background: orange;
        border-radius: 20rem;
    }
  .swiper-slide{
    /* width:300px !important */
  }
  .right-arrow {
    z-index:99;
    right:10px
    
  }
  /* .fa-solid{
    font-size:50px !important
  } */

  .animated_swipe_text {
    color: #006ae7; /* Add a semicolon here */
  }
  
  .animted_arrow {
    animation: arrow_animation 3s infinite;
    position: relative;
  }

  @keyframes arrow_animation {
    0% {
      left: 0px;
    }
    35% {
      left: 6px;
    }
    70% {
      left: 0px     
    }

  }

 
  </style>
  <body> 
    @include('sidebar') 
    @include('header') 
    <!-- d-flex justify-content-between align-items-center -->
    <div class="performance_header_section bg-white p-4 rounded-3 shadow my-4">
        <div>
          <h1 class="h2 text-dark my-1">Performance Details</h1>
          <p class="fs_cs_5">Review child's performance report to identify strengths and weaknesses.</p>
          
          <div class="swiper section_swiper my-4">
            <div class="swiper-wrapper">
              @foreach($sections as $section)
                <div class="swiper-slide rounded-5">
                  <a href="/student/detailed-journey-performance?subject={{$section['id']}}" class="section_card w-100 p-2 bg-white shadow-sm rounded-5 text-center
                  @if($section['id'] == $current_section->id)
                    border-primary active
                  @endif
                  " data-subject="{{$section['id']}}">
                    <img src="
                    @if(strtolower(substr($section['name'], 0, 1)) == 'm')
                      {{ url('images/maths.png') }}
                    @elseif(strtolower(substr($section['name'], 0, 1)) == 'e')
                      {{ url('images/english.png') }}
                    @elseif(strtolower(substr($section['name'], 0, 1)) == 'v')
                      {{ url('images/verbal_reasoning.png') }}
                    @elseif(strtolower(substr($section['name'], 0, 1)) == 's')
                      {{ url('images/science.png') }}
                    @else
                      {{ url('images/non_verbal_reasoning.png') }}
                    @endif
                    " height="45" width="45" alt="{{$section['name']}}">
                    <h2 class="my-2 mt-3 text-center h5 text-dark">{{$section['name']}}</h2>
                    <div class="rounded d-inline-block py-1 px-3                   
                      @if($section['mastery_level'] == 'Needs Practice')
                        practise_perf_badge
                      @elseif($section['mastery_level'] == 'Good')
                        good_perf_badge
                      @elseif($section['mastery_level'] == 'Strong')
                        strong_perf_badge
                      @elseif($section['mastery_level'] == 'Master')
                        master_perf_badge
                      @endif
                    ">{{$section['mastery_level']}}</div>
                    <!-- <p class="my-2 text-center text-dark small">Choose a subject to assess child's performance within it.</p> -->
                  </a>
                </div>
              @endforeach
            </div>
          </div>
        </div>
    </div>

    <button class="alert alert-primary align-items-center border-primary w-100 d-flex my-5 rounded-4 shadow" role="alert" data-bs-toggle="modal" data-bs-target="#performance_metrices_popup"><i class='bx me-1 fs-5 bx-info-circle'></i>Explore! How we calculate child's performance.</button>

    <div class="modal fade" id="performance_metrices_popup" tabindex="-1" aria-labelledby="performance_metrices_popupLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content rounded-0">
          <div class="modal-header">
            <h2 class="modal-title fs-4" id="performance_metrices_popupLabel">Performance Metrics</h2>
            <button   class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="text-center py-3">
              <img src="{{url('images/performance_metrics_image.png')}}" height='auto' width='280' alt="performance metrics">
              <h2 class="mt-4 mb-2">Scoring System</h2>
              <p class="fs_cs_5">Tutorselevenplus mastery levels track child's progress based on correct answers and question difficulty. Daily updates help you see how child compares to peers. If child faces challenges, our algorithm targets specific areas for improvement.</p>
              <div class="row align-items-center my-3">
                <div class="col-lg-3 col-md-5 col-sm-6 col-12 my-2">
                  <div class="performance_card_item p-4 shadow rounded-4 average_performance">
                    <p class="text-white fw-normal fs_cs_5">Need Practise</p>
                    <p class="text-white lh-1 fs-6">0-68%</p>
                  </div>
                </div>
                <div class="col-lg-3 col-md-5 col-sm-6 col-12 my-2">
                  <div class="performance_card_item p-4 shadow rounded-4 good_performance">
                    <p class="text-white fw-normal fs_cs_5">Good</p>
                    <p class="text-white lh-1 fs-6">69-82%</p>
                  </div>
                </div>
                <div class="col-lg-3 col-md-5 col-sm-6 col-12 my-2">
                  <div class="performance_card_item p-4 shadow rounded-4 strong_performance">
                    <p class="text-white fw-normal fs_cs_5">Strong</p>
                    <p class="text-white lh-1 fs-6">83-88%</p>
                  </div>
                </div>
                <div class="col-lg-3 col-md-5 col-sm-6 col-12 my-2">
                  <div class="performance_card_item p-4 shadow rounded-4 master_performance">
                    <p class="text-white fw-normal fs_cs_5">Master</p>
                    <p class="text-white lh-1 fs-6">89-100%</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <section class="compare_performance my-5">
      <h2 class="text-dark my-1">Performance Comparision</h2>
      <p class="fs_cs_5 text-lowercase">Compare and assess {{$year}} progress with peers to elevate performance above the average.</p>
      <div class="row align-items-center justify-content-around my-4">
        <div class="col-lg-5 col-md-6 col-sm-12 col-12 my-2">
          <div class="p-3 shadow rounded-4" style='background: linear-gradient(66deg, #0043ab, #0099ff) !important'>
            <div class="my_progress_chart progress_chart" data-percent="{{$student_comparison}}" data-scale-color="#ffb400">{{$student_comparison}}%</div>
            <h2 class='fw-normal h4 text-center mt-2 text-white'>Overall Progress</h2>
            <p class="fs_cs_5 my-2 text-center text-white">Performance Score for {{$current_section->name}}</p>
          </div>
        </div>
        <div class="col-lg-5 col-md-6 col-sm-12 col-12 my-2">
          <div class="p-3 shadow rounded-4" style='background: linear-gradient(66deg, #26833a, #3eca5e) !important'>
            <div class="average_chart progress_chart" data-percent="{{$all_comparison}}" data-scale-color="#ffb400">{{$all_comparison}}%</div>
            <h2 class='fw-normal h4 text-center mt-2 text-white'>Average Progress</h2>
            <p class="fs_cs_5 my-2 text-center text-white">Average Student's Score for {{$current_section->name}}</p>
          </div>
        </div>
      </div>
    </section>
    <section class="my-3">
      <h2 class="text-dark my-1">Topics Overview</h2>
      <p class="fs_cs_5">Explore a detailed report of your child's performance in topics and subtopics to identify and address specific weaknesses in any subject area.</p>
      <p class="text-end animated_swipe_text my-2 text-primary">Swipe to see more <i class="fa-solid fa-arrow-right animted_arrow"></i></p>
      <div class="swiper topics_swiper my-4 p-2">
        <div class="swiper-wrapper " data-swiper-autoplay="1000">
          @foreach($topics as $key => $topic)
            <div class="swiper-slide rounded-5"  data-swiper-autoplay="1000">
              <button class="topics_card_item w-100 p-4 rounded-4 position-relative select_topic
                @if($key <= 0)
                  active
                @endif
              " data-topic_id="{{$topic['id']}}">
                <div class="position-absolute top-0 end-0 mx-3 my-2 selected_topics_card 
                @if($key > 0)
                  d-none
                @endif
                "><i class="bx bx-check-circle text-white fs-5"></i></div>
                <!-- <h2 class="my-2 mt-3 text-start h5 text-white fw-normal">{{$current_section->name}}</h2> -->
                <p class="my-2 text-start text-white">{{$topic['name']}}</p>
              </button>
            </div>
          @endforeach
        </div>
      </div>
      <div class="table-responsive">
        <table class="my-3 overflow-hidden bg-white rounded-4 table">
                <thead>
                  <tr style="background: #1458a5">
                    <th scope="col" class='w_250 py-3 text-white p-4 fs-6'>Name</th>
                    <th scope="col" class='w_200 py-3 text-white p-4 fs-6'>Mastery Level</th>
                    <th scope="col" class='w_200 py-3 text-white p-4 fs-6'>Last Seen</th>
                    <th scope="col" class='w_200 py-3 text-white p-4 fs-6'>Resources</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($topics as $key => $topic)
                    @foreach($topic['topics'] as $sub_topic)
                      <tr class="subtopic_wrap
                        @if($key > 0)
                          d-none
                        @endif
                      " data-topic="topic_{{$sub_topic['skill_id']}}">
                        <th class="text-black py-4" scope="row">
                          <div class="form-check ms-1">
                            <input class="cursor-pointer form-check-input shadow-none sub_topic_inp" value="{{$sub_topic['id']}}" type="checkbox" id="sub_topic_{{$sub_topic['id']}}">
                            <label class="cursor-pointer form-check-label fs-6 fw-semibold text-dark" for="sub_topic_{{$sub_topic['id']}}">{{$sub_topic['name']}}</label>
                          </div>
                        </th>
                        <td class="text-black py-4">                      
                          <div class="progress
                          @if($sub_topic['mastery_msg'] == 'Master')
                            bg-label-primary
                          @elseif($sub_topic['mastery_msg'] == 'Strong')
                            bg-label-success
                          @elseif($sub_topic['mastery_msg'] == 'Good')
                            bg-label-warning
                          @elseif($sub_topic['mastery_msg'] == 'Need Practice')
                            bg-label-danger
                          @else
                            bg-label-secondary
                          @endif
                          " role="progressbar" aria-label="{{$sub_topic['name']}}" aria-valuenow="{{$sub_topic['mastery_level']}}" aria-valuemin="0" aria-valuemax="100">
                            <div class="progress-bar 
                            @if($sub_topic['mastery_msg'] == 'Master')
                              bg-primary
                            @elseif($sub_topic['mastery_msg'] == 'Strong')
                              bg-success
                            @elseif($sub_topic['mastery_msg'] == 'Good')
                              bg-warning
                            @elseif($sub_topic['mastery_msg'] == 'Need Practice')
                              bg-danger
                            @else
                              bg-secondary
                            @endif
                            " style="width: {{$sub_topic['mastery_level']}}%"></div>
                          </div>
                          <p>{{$sub_topic['mastery_msg']}}</p>
                        </td>
                        <td class="text-black py-4">{{$sub_topic['last_seen']}}</td>
                      
                        <td class="text-black py-4">
                          <a   class="d-inline-block" data-bs-toggle="modal" data-bs-target="#video_modal_{{$sub_topic['id']}}"><i class="fa fa-play mx-1" style="color: #1264f3;"></i>Video</a>
                          <div class="modal fade" id="video_modal_{{$sub_topic['id']}}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h1 class="modal-title fs-5 text-dark-black p-2 px-4">Video</h1>
                                  <button   class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                  @if(count($sub_topic['videos']) > 0)
                                    @foreach($sub_topic['videos'] as $video)
                                      <p class="video_preview_btn mb-2 cursor-pointer py-1 px-2" data-subtopic_id="{{$sub_topic['id']}}" data-video_id="{{$video->id}}">{{$video->title}}</p>
                                      @if($video->video_type == 'youtube')
                                        <iframe  class="w-100 h-px-350 mt-4 d-none" src="https://www.youtube.com/embed/{{$video->video_link}}" frameborder="0" id="videoPreview{{$video->id}}"></iframe>
                                      @elseif($video->video_type == 'vimeo')
                                        <iframe  class="w-100 h-px-350 mt-4 d-none" src="https://player.vimeo.com/video/{{$video->video_link}}" frameborder="0" id="videoPreview{{$video->id}}"></iframe>
                                      @endif
                                    @endforeach
                                  @else
                                    <div class="alert alert-dark">Video might not have been uploaded or published on the platform!</div>
                                  @endif
                                </div>
                              </div>
                            </div>
                          </div>
                          <a   class="d-inline-block" data-bs-toggle="modal" data-bs-target="#helpsheet_modal_{{$sub_topic['id']}}"><i class="fa-solid fa-sheet-plastic fa-rotate-180 mx-1" style="color: #1264f3;"></i> Helpsheet</a>
                          <div class="modal fade" id="helpsheet_modal_{{$sub_topic['id']}}" tabindex="-1"  aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h1 class="modal-title fs-5 text-dark-black p-2 px-4">Helpsheet</h1>
                                  <button   class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body text-center">
                                  @if($sub_topic['helpsheet'])
                                    <img class="img-fluid" src="{{url($sub_topic['helpsheet'])}}" alt="{{$sub_topic['name']}}">
                                  @else
                                    <div class="alert alert-dark">Helpsheet might not have been uploaded or published on the platform!</div>
                                  @endif
                                </div>
                              </div>
                            </div>
                          </div>
                        </td>
                      </tr>
                    @endforeach
                  @endforeach
                    <!-- <tr>
                      <th class="text-black py-4" scope="row">
                        <div class="form-check ms-1">
                          <div class="form-check">
                            <input class="cursor-pointer form-check-input fs-6" type="checkbox"  >
                            <label class="cursor-pointer form-check-label fs-6 fw-semibold text-dark" > subtopic name </label>
                          </div>
                      </th>
                      <td class="text-black py-4">
                      
                        <div class="row mastery_level_bar bs-gutter-x-0 mt-1">
                        <div class="progress" role="progressbar" aria-label="Info example" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                            <div class="progress-bar bg-info text-white" style="width: 50%">50%</div>
                          </div>           
                          </div>
                      </td>

                      <td class="text-black py-4">
                        <a   class="d-inline-block" data-bs-toggle="modal"><i class="fa fa-play mx-1" style="color: #1264f3;"></i>Video</a>
                        <div class="modal fade" tabindex="-1" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h1 class="modal-title fs-5 text-dark-black p-2 px-4" >Video</h1>
                                <button   class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                  
                                      <p class="video_preview_btn mb-2 cursor-pointer py-1 px-2">Video title</p>
                                      <iframe  class="w-100 h-px-350 mt-4 d-none" src="https://www.youtube.com/embed" frameborder="0"></iframe>
                              </div>
                              
                            </div>
                          </div>
                        </div>
                        
                        <a   class="d-inline-block" data-bs-toggle="modal" ><i class="fa-solid fa-sheet-plastic fa-rotate-180 mx-1" style="color: #1264f3;"></i> Helpsheet</a>
                        <div class="modal fade" tabindex="-1"  aria-hidden="true">
                          <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h1 class="modal-title fs-5 text-dark-black p-2 px-4">Helpsheet</h1>
                                <button   class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body text-center">
                                
                                  <div class="alert alert-dark">Helpsheet might not have been uploaded or published on the platform!</div>
                                
                              </div>
                              
                            </div>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <th class="text-black py-4" scope="row">
                        <div class="form-check ms-1">
                          <div class="form-check">
                            <input class="cursor-pointer form-check-input fs-6" type="checkbox"  >
                            <label class="cursor-pointer form-check-label fs-6 fw-semibold text-dark" > subtopic name </label>
                          </div>
                      </th>
                      <td class="text-black py-4">
                      
                        <div class="row mastery_level_bar bs-gutter-x-0 mt-1">
                        
                        <div class="progress" role="progressbar" aria-label="Warning example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                          <div class="progress-bar bg-warning text-white" style="width: 75%">75%</div>
                        </div>
                            
                        </div>
                      </td>
                    
                      <td class="text-black py-4">
                        <a   class="d-inline-block" data-bs-toggle="modal"><i class="fa fa-play mx-1" style="color: #1264f3;"></i>Video</a>
                        <div class="modal fade" tabindex="-1" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h1 class="modal-title fs-5 text-dark-black p-2 px-4" >Video</h1>
                                <button   class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                  
                                      <p class="video_preview_btn mb-2 cursor-pointer py-1 px-2">Video title</p>
                                      <iframe  class="w-100 h-px-350 mt-4 d-none" src="https://www.youtube.com/embed" frameborder="0"></iframe>
                              </div>
                              
                            </div>
                          </div>
                        </div>
                        
                        <a   class="d-inline-block" data-bs-toggle="modal" ><i class="fa-solid fa-sheet-plastic fa-rotate-180 mx-1" style="color: #1264f3;"></i> Helpsheet</a>
                        <div class="modal fade" tabindex="-1"  aria-hidden="true">
                          <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h1 class="modal-title fs-5 text-dark-black p-2 px-4">Helpsheet</h1>
                                <button   class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body text-center">
                                
                                  <div class="alert alert-dark">Helpsheet might not have been uploaded or published on the platform!</div>
                                
                              </div>
                              
                            </div>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <th class="text-black py-4" scope="row">
                        <div class="form-check ms-1">
                          <div class="form-check">
                            <input class="cursor-pointer form-check-input fs-6" type="checkbox"  >
                            <label class="cursor-pointer form-check-label fs-6 fw-semibold text-dark" > subtopic name </label>
                          </div>
                      </th>
                      <td class="text-black py-4">
                      
                        <div class="row mastery_level_bar bs-gutter-x-0 mt-1">
                            <div class="progress" role="progressbar" aria-label="Warning example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                              <div class="progress-bar bg-danger text-white" style="width: 75%">75%</div>
                            </div>           
                            </div>
                      </td>
                      
                      <td class="text-black py-4">
                        <a   class="d-inline-block" data-bs-toggle="modal"><i class="fa fa-play mx-1" style="color: #1264f3;"></i>Video</a>
                        <div class="modal fade" tabindex="-1" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h1 class="modal-title fs-5 text-dark-black p-2 px-4" >Video</h1>
                                <button   class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                  
                                      <p class="video_preview_btn mb-2 cursor-pointer py-1 px-2">Video title</p>
                                      <iframe  class="w-100 h-px-350 mt-4 d-none" src="https://www.youtube.com/embed" frameborder="0"></iframe>
                              </div>
                              
                            </div>
                          </div>
                        </div>
                        
                        <a   class="d-inline-block" data-bs-toggle="modal" ><i class="fa-solid fa-sheet-plastic fa-rotate-180 mx-1" style="color: #1264f3;"></i> Helpsheet</a>
                        <div class="modal fade" tabindex="-1"  aria-hidden="true">
                          <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h1 class="modal-title fs-5 text-dark-black p-2 px-4">Helpsheet</h1>
                                <button   class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body text-center">
                                
                                  <div class="alert alert-dark">Helpsheet might not have been uploaded or published on the platform!</div>
                                
                              </div>
                              
                            </div>
                          </div>
                        </div>
                      </td>
                    </tr> -->
                </tbody>
        </table>
      </div>
      <div class="practice my-4">
        <div class="container">
          <div class="row">
            <div class="col-lg-10 col-md-8 col-sm-12 col-12">
              <p id="setPracticeText" class="fs-5 fw-normal my-4 modal_btn_link">
                <i class='bx bx-message-alt-error bx-sm'></i>  
                Set a practise in the areas that 
                @if(auth()->user()->roles()->first()->name == 'student')
                  {{auth()->user()->first_name}}
                @else
                  {{session("selected_child")['name']}}
                @endif
                 is finding the most challenging
              </p>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-12 col-12 text-center">
              <button id="setPractice" class="btn set_practice_button my-3">Set Practise</button>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="my-3 p-4">
     <div class="row justify-content-center">
      <div class="col-lg-12 col-md-12 col-sm-12 ">
        <h2 class="fw-medium mb-1 mt-4 mt-lg-5 mt-md-5 text-capitalize text-dark">Overall Progress:</h2>
        <div class="heading_separator  "></div> 
          <div class="chart bg-white rounded-5 shadow p-3 mt-3">
            <p class="fs_cs_5">Visualize your achievements and track progress and performance in a specific area with the Attainments Chart.</p>
            <div id="myChart" style="width:100%; height:500px;" class="my-3"></div>
          </div>
      </div>
      <div class="col-lg-12 col-md-12 col-12 my-4 chart-cols ">
        <h2 class="fw-medium mb-1 mt-4 mt-lg-5 mt-md-5 text-capitalize text-dark">Areas to work on:</h2>
        <div class="heading_separator  "></div>    
         <div class="topic_heading bg-white shadow rounded-5 mt-3 p-3 ">
                  <div class="row justify-content-center">
                      <div class="col-lg-4 col-md-8 col-sm-12 pt-3">
                        <div class="my-3">
                          <div class="card-one shadow rounded-5  p-lg-4 p-md-3 p-sm-2">
                            <div class="card-body p-3">
                              <p class="fs-5 my-2 text-dark-black">
                              @if(auth()->user()->roles()->first()->name == 'student')
                                {{auth()->user()->first_name}}
                              @else
                                {{session("selected_child")['name']}}
                              @endif
                                 has a strong knowledge on:</p>
                              <div class="card-text">
                                @if(count($strong_levels) > 0)
                                  @foreach($strong_levels as $strong)
                                    <button class="button4 mx-1 my-2 text-nowrap py-2 px-3 bg-success-subtle shadow-sm">{{$strong}}</button>
                                  @endforeach
                                @else
                                  <div class="text-danger fs-7 mt-2">All areas require improvement- keep going- the hard work will pay off!</div>
                                @endif
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                  <div class="col-lg-6 col-md-8 col-sm-12 pt-3">
                    <div class="my-3">
                      <div class="card-two shadow px-sm-1 px-lg-3 px-md-3 rounded-5 px-3 py-2">
                        <div class="card-body p-lg-4 p-md-3 p-sm-2">
                          <p class="fs-5 my-2 text-dark-black">
                              @if(auth()->user()->roles()->first()->name == 'student')
                                {{auth()->user()->first_name}}
                              @else
                                {{session("selected_child")['name']}}
                              @endif
                               can improve on:
                          </p>
                          <div class="card-text">
                              @if(count($weak_levels) > 0)
                                  @foreach($weak_levels as $weak)
                                    <button class="button4  my-2  py-2 px-3 shadow-sm text-start ">{{$weak}}</button>
                                  @endforeach
                                @else
                                  <div class="text-danger fs-7 mt-2">Doesn't have weak grip on any topic in {{$current_section->name}}</div>
                                @endif
                              </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                  <div class="my-4 text-center">
                    <a href="{{route('student_practice_sets_create')}}" class="btn fw-normal  px-3 set_practice_button p-3">Set practise on the area to improve</a>
                  </div>
                </div>
              </div>
            </div>
     </div>
    </section>
     
   
    
    <script>
      let rawChartData = {!! str_replace("'", "\'", json_encode($sec_year_mastery)) !!};
      let role = {!! str_replace("'", "\'", json_encode(auth()->user()->roles()->first()->name)) !!};
      let student_name = @if(auth()->user()->roles()->first()->name == 'student')
                  {!! str_replace("'", "\'", json_encode(auth()->user()->first_name)) !!}
                @else
                  {!! str_replace("'", "\'", json_encode(session("selected_child")['name'])) !!}
                @endif;
      chartData = [['Month', student_name+': Average', { role: 'style' } ]];
      Object.keys(rawChartData).forEach(function(key) {
        chartData.push([key, parseFloat(rawChartData[key]), 'color: #ffa200']);
      });
      $(".video_preview_btn").click(function(){
        let video_id = $(this).data('video_id');
        let subtopic_id = $(this).data('subtopic_id');
        $("#videoPreview"+video_id).removeClass('d-none');
        $(".video_preview_btn[data-subtopic_id="+subtopic_id+"]").remove();
      });
      $(".select_topic").click(function(){
        let topic_id = $(this).data("topic_id");
        $(".select_topic").removeClass("active");
        $(this).addClass("active");
        $(".subtopic_wrap").addClass("d-none")
        $(".subtopic_wrap[data-topic=topic_"+topic_id+"]").removeClass("d-none")
        $('.form-check-input:checkbox').prop('checked', false);
        $("#setPracticeText").html("<i class='bx bx-message-alt-error bx-sm'></i>  Set a practise in the areas that "+ student_name +" is finding the most challenging");
      });
      $(".form-check-input").change(function(){
        let len = $('.form-check-input:checkbox:checked').length;
        if(len > 0){
          $("#setPracticeText").text("Set a practise in selected areas ("+len+" Selected)");
        } else {
          $("#setPracticeText").html("<i class='bx bx-message-alt-error bx-sm'></i>   Set a practise in the areas that "+ student_name +" is finding the most challenging");
        }
      });

      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      $(window).resize(function(){
        drawChart();
      });

      function drawChart() {
        var data = google.visualization.arrayToDataTable(chartData);
        const options = {
          legend: { position: "none" },
          vAxis: {
            ticks: [
              { v: 68, f: 'Need Practice' },
              { v: 82, f: 'Good' },
              { v: 88, f: 'Strong' },
              { v: 100, f: 'Master' }
            ],
            minValue: 0,
            maxValue: 100,
          }
        };
        const chart = new google.visualization.ColumnChart(document.getElementById('myChart'));
        chart.draw(data, options);
      }
      let sub_topics_to_be_practice = [];
      $("#setPractice").click(function(){
        
        $('.form-check-input:checkbox:checked').each(function(){
          sub_topics_to_be_practice.push($(this).val());
        });
        if(sub_topics_to_be_practice.length > 0){
          let subject = $(".section_card.active").first().data("subject");
          let topic = $(".select_topic.active").first().data("topic_id");
          window.location.href = "/student/practice-sets?subject="+subject+"&topic="+topic+"&sub_topics="+sub_topics_to_be_practice.join(',');
        } else {
          window.location.href = "/student/practice-sets";
        }
      });

    </script>
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/easy-pie-chart/2.1.6/jquery.easypiechart.min.js'></script>
    <!-- Initialize Swiper -->
    
    <script>
      var swiper = new Swiper(".section_swiper", {
        slidesPerView: 1.1,
        spaceBetween: 5,
        autoplay: {
          delay: 1500,
        },
        pagination: {
          el: ".swiper-pagination",
          // clickable: true,
        },
        breakpoints: {
          425: {
            slidesPerView: 1.2,
            spaceBetween: 10,
          },
          640: {
            slidesPerView: 2.2,
            spaceBetween: 10,
          },
          768: {
            slidesPerView: 2.6,
            spaceBetween: 10,
          },
          992: {
            slidesPerView: 3,
            spaceBetween: 12,
          },
          1130: {
            slidesPerView: 3.3,
            spaceBetween: 15,
          },
          1440: {
            slidesPerView: 4,
            spaceBetween: 20,
          },
        },
      });
      var swiper = new Swiper(".topics_swiper", {
        slidesPerView: 1.1,
        spaceBetween: 5,
        // autoplay: {
        //   delay: 3500,
        //   disableOnInteraction: false,
        // },
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
        breakpoints: {
          425: {
            slidesPerView: 2,
            spaceBetween: 5,
          },
          640: {
            slidesPerView: 3.1,
            spaceBetween: 6,
          },
          768: {
            slidesPerView: 3.4,
            spaceBetween: 8,
          },
          992: {
            slidesPerView: 4,
            spaceBetween: 10,
          },
          1130: {
            slidesPerView: 4.3,
            spaceBetween: 15,
          },
          1440: {
            slidesPerView: 5,
            spaceBetween: 15,
          },
        },
      });

      // select section cards 
      // $(".section_card").click(function(){
      //   $(".section_card").removeClass("select_section_card");
      //   $(this).addClass("select_section_card")
      // });

      $(function() {
        $('.progress_chart').easyPieChart({
          size: 160,
          barColor: "#ffbc00cc",
          scaleLength: 0,
          lineWidth: 15,
          trackColor: "#ffffffba",
          lineCap: "circle",
          animate: 2000,
        });
      });

      $(".topics_card_item").click(function(){
        $(".selected_topics_card").addClass('d-none');
        $(this).find('.selected_topics_card').removeClass('d-none');
      });

    </script>
    @include('parentsidebar.sidebarending')
  </body>
</html>