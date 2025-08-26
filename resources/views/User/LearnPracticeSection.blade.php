<!DOCTYPE html>
<html lang="en" >

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>{{$section->name}} - Learn & Practise - Student Portal - Tutors 11 Plus</title>
    <!-- favicon  -->
    <link rel="shortcut icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}" type="image/x-icon">
   <!-- bootstrap cdn -->
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

     <!-- fontawesome cdn -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
   <style>
        .point {
            cursor: pointer;
        }
        svg {
            height: 20px!important;
        }

        .to_do_list_card {
            height: 100px;
            width: auto;
            background: #fff;
            transition: 0.3s;
        }

        .to_do_list_card:hover {
            scale: 1.01;
        }

        .to_do_list_name{
            width: 200px;
            white-space: nowrap;
            text-overflow: ellipsis;
            overflow: hidden;
        }

        @media (max-width: 350px) {
            .to_do_list_iconparent {
                display: none;
            }
            .to_do_list_name {
                width: 150px!important;
            }
        }
        .active_topic{
            width:10px;
            height:10px;
            background-color: #40c965;
        }

    </style>
</head>

<body>
    @include('sidebar')
    @include('header')

    @php
        $count = 0;
    @endphp

    <div class="py-4 my-4 mb-5">
        <h4 class="text-dark fw-semibold mb-3 h3 "><span class="fw-semibold"></span>{{$section['name']}}</h4> 
        <ol class='p-0 m-0'>
            @foreach ($section['skills'] as $items)
                @php
                    $num = $count + 1;
                @endphp
                <li class="to_do_list_section p-2">
                    <!-- <h4 class="mb-4 text-dark">To-do List</h4>  -->
                    <div class="row">
                        <!-- <div class="col-lg-4 col-md-4 col-sm-12 col-12 my-2">
                            <a href="{{ url('/videos/' . $category['slug'] . '/' . $section['slug']) . '/' . $items['slug'] }}" class="text-decoration-none">
                                <div class="to_do_list_card p-3 rounded-3 shadow-sm">   
                                    <div class="d-flex align-items-center h-100">
                                        <div class="me-3">
                                            <img src="{{url('images\video_lessons.png')}}" height="40" width="40" alt="videos icon">
                                        </div>
                                        <div class="col-lg-10 col-md-8 col-10">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <h4 class="to_do_list_name fs-5 text-dark mb-1">
                                                        @php
                                                            if ($items['practice_videos_count'] == 0) {
                                                                echo 'No Videos';
                                                            } else {
                                                                echo $items['practice_videos_count'] . ' Videos';
                                                            }
                                                        @endphp
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div> -->
                        <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                            <div class="exam_sets bg-white  border rounded-4 p-3">
                                @if($items->practice_videos_count > 0)
                                    <a href="{{ url('/videos/' . $category['slug'] . '/' . $section['slug']) . '/' . $items['slug'] }}" class="text-decoration-none">
                                @else
                                    <a role="button" class="text-decoration-none">
                                @endif
                                    <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="py-2 px-2 h6  fw-semibold ">
                                        {{ $items['name'] }}
                                    </h5>
                                    <h5 class="py-2  fs-6 text-light-emphasis px-2 ">Year 3</h5>
                                    </div>
                                    <div class="px-2 py-3 d-flex align-items-center   ">
                                        <img src="{{url('images\video_lessons.png')}}" width="30px" alt="Practise Image">
                                        <p class="text-light-emphasis px-3">
                                        @php
                                                if ($items['practice_videos_count'] == 0) {
                                                    echo 'No Videos';
                                                } else {
                                                    echo $items['practice_videos_count'] . ' Videos';
                                                }
                                            @endphp
                                        </p>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="rounded-circle active_topic
                                        @if($items->practice_videos_count <= 0)
                                            bg-danger
                                        @endif
                                        "></div>
                                        <div>View <span class="px-1"><i class="fa-solid fa-arrow-right"></i></span></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <!-- <div class="col-lg-4 col-md-4 col-sm-12 col-12 my-2 ">
                            <a href="{{ url('/lessons/' . $category['slug'] . '/' . $section['slug']) . '/' . $items['slug'] }}" class="text-decoration-none">
                                <div class="to_do_list_card p-3 rounded-3 shadow-sm">   
                                    <div class="d-flex align-items-center h-100">
                                        <div class="me-3">
                                            <img src="{{url('images\learning.png')}}" height="40" width="40" alt="videos icon">
                                        </div>
                                        <div class="col-lg-10 col-md-8 col-10">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <h4 class="to_do_list_name fs-5 text-dark mb-1">
                                                        @php
                                                            if ($items['practice_lessons_count'] == 0) {
                                                                echo 'No Lessons';
                                                            } else {
                                                                echo $items['practice_lessons_count'] . ' Lesson';
                                                            }
                                                        @endphp
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div> -->
                        <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                            <div class="exam_sets bg-white border rounded-4 p-3">
                                @if($items->practice_lessons_count > 0)
                                    <a href="{{ url('/lessons/' . $category['slug'] . '/' . $section['slug']) . '/' . $items['slug'] }}" class="text-decoration-none">
                                @else
                                    <a role="button" class="text-decoration-none">
                                @endif
                                    <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="py-2 px-2 h6  fw-semibold ">
                                    {{ $items['name'] }}
                                    </h5>
                                    <h5 class="py-2  fs-6 text-light-emphasis px-2 ">Year 3</h5>
                                    </div>
                                    <div class="px-2 py-3 d-flex align-items-center   ">
                                        <img src="{{url('images\learning.png')}}" width="30px" alt="Practice Image">
                                        <p class="text-light-emphasis px-3"> 
                                            @php
                                                if ($items['practice_lessons_count'] == 0) {
                                                    echo 'No Lessons';
                                                } else {
                                                    echo $items['practice_lessons_count'] . ' Lesson';
                                                }
                                            @endphp</p>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="rounded-circle active_topic
                                        @if($items->practice_lessons_count <= 0)
                                            bg-danger
                                        @endif
                                        "></div>
                                        <div>View <span class="px-1"><i class="fa-solid fa-arrow-right"></i></span></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <!-- <div class="col-lg-4 col-md-4 col-sm-12 col-12 my-2">
                            @if($items['practice_sets_count'] < 1)
                                <a class="text-decoration-none">
                            @else
                                <a href="{{ url('/practice/' . $category['slug'] . '/' . $section['slug']) . '/' . $items['slug'] . '/' . 'practice-sets' }}" class="text-decoration-none">
                            @endif
                                <div class="to_do_list_card p-3 rounded-3 shadow-sm">   
                                    <div class="d-flex align-items-center h-100">
                                        <div class="me-3">
                                            <img src="{{url('images\practice.png')}}" height="40" width="40" alt="videos icon">
                                        </div>
                                        <div class="col-lg-10 col-md-8 col-10">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <h4 class="to_do_list_name fs-5 text-dark mb-1">
                                                        @php
                                                            if ($items['practice_sets_count'] == 0) {
                                                                echo 'No Practice Sets';
                                                            } else {
                                                                echo $items['practice_sets_count'] . ' Practice Sets';
                                                            }
                                                        @endphp
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>   -->
                        <div class="col-lg-4 col-md-6 col-sm-12 my-2">
                            <div class="exam_sets bg-white border rounded-4 p-3">                            
                                <a href="/student/practice-sets?subject={{$section['id']}}&topic={{$items->id}}" class="text-decoration-none">
                                    <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="py-2 px-2 h6  fw-semibold ">
                                    {{ $items['name'] }}
                                    </h5>
                                    <h5 class="py-2  fs-6 text-light-emphasis px-2 ">{{ $category['name'] }}</h5>
                                    </div>
                                    <div class="px-2 py-3 d-flex align-items-center   ">
                                        <img src="{{url('images\practice.png')}}" width="30px" alt="Practice Image">
                                        <p class="text-light-emphasis px-3">
                                        <!-- @php
                                            if ($items['practice_sets_count'] == 0) {
                                                echo 'No Question Sets';
                                            } else {
                                                echo $items['practice_sets_count'] . ' Question Sets';
                                            }
                                        @endphp -->
                                        Set Question Set
                                        </p>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="rounded-circle active_topic
                                            @if($items->practice_sets_count <= 0)
                                                bg-danger
                                            @endif
                                        "></div>
                                        <div>Set <span class="px-1"><i class="fa-solid fa-arrow-right"></i></span></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </li>  
                @php
                    $count++;
                @endphp
            @endforeach
        </ol>
    </div>

    <!-- javascript and jquery cdns  -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"
        integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/0.6.7/js/min/perfect-scrollbar.jquery.min.js">
    </script>

</body>

</html>
