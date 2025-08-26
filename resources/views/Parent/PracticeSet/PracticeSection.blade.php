<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{url('Frontend_css/style1.css')}}">
    <title>Practise Section</title>
    <!-- rel icon -->
    <link rel="icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}">
    <meta name="description" content="{{ app(\App\Settings\SiteSettings::class)->seo_description }}">
    <meta name="author" content="{{ app(\App\Settings\SiteSettings::class)->app_name }}">
     <!-- bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
 <!-- bootstrap cdn -->
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

     <!-- fontawesome cdn -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <style>
        .font-size-13{font-size:13px}
        .total_session_details {background: #dbeaff; color: #00409b;}
        .exam_sets:hover {
            scale: 1.01;
            box-shadow: -1px 4px 10px 1px #4a4a4a4a !important
        }
        .exam_sets
        {
            background-color:#fdfdfd!important
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
    <!-- Main Content  -->
    <div class="p-2">
            <div class="row justify-content-between align-items-center mb-3">
                <div class="col-md-6 col-sm-6 col-12 my-2 ">
                    <h3 class="text-dark fw-semibold mb-0 ">{{$section['name']}}</h3> 
                </div>
                <div class="col-md-6 col-sm-6 col-12 text-end my-2">
                    <span class="p-2 px-3 rounded-pill total_session_details">
                        <span id="total_lessons">{{count($section['skills'])}}</span> TOPICS FOUND
                    </span>
                </div>
            </div>
          
            <div class="row align-items-center">
                @foreach ($section['skills'] as $key => $skills)
                    <div class="col-lg-4 col-md-6 col-sm-12 py-2">
                        <div class="exam_sets bg-white  border rounded-4 p-3">
                            @if($skills['practice_sets_count'] > 0)
                                <a href="/parent-set/{{$category['slug']}}/{{$section['slug']}}/{{$skills['slug']}}/practice-sets">
                            @else
                                <a role="button">
                            @endif
                                <div class="d-flex justify-content-between align-items-center">
                                <h5 class="py-2 px-2 h6  fw-semibold ">
                                    <span class="me-2 h6  fw-semibold ">
                                        {{ ++$key }}.
                                    </span>
                                    {{$skills['name']}}
                                </h5>
                                <h5 class="py-2  fs-6 text-light-emphasis px-2 text-nowrap">{{$category->name}}</h5>
                                </div>
                                <div class="px-2 py-3  ">
                                    <p class="text-light-emphasis">{{$skills['practice_sets_count']}} Question Sets</p>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    @if($skills['practice_sets_count'] > 0)
                                        <div class="rounded-circle active_topic"></div>
                                    @else
                                        <div class="rounded-circle active_topic bg-danger"></div>
                                    @endif
                                    <div class="px-2 text-primary">View <span class="px-1"><i class="fa-solid fa-arrow-right"></i></span></div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
    </div> 

</body>

</html>
