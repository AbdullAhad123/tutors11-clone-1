<?php use Illuminate\Support\Str; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{app(\App\Settings\KeywordsSettings::class)->title['school-list_title']}}</title>
    <meta name="description" content="{{app(\App\Settings\KeywordsSettings::class)->description['school-list_description']}}">
    <meta name="author" content="{{ app(\App\Settings\SiteSettings::class)->app_name }}">
    <meta name="keywords" content="{{app(\App\Settings\KeywordsSettings::class)->keywords['school-list_keywords']}}">
    <link rel="icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}">
    <link rel="canonical" href="{{ url()->current() }}"/>
	<link rel="alternate" href="{{ url()->current() }}" hreflang="en-gb">
    <link rel="preload" href="{{url('Frontend_css/style.css')}}" as="style">
    <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" as="style">
    <link rel="preconnect" href="https://googleads.g.doubleclick.net">
    <link rel="preconnect" href="https://td.doubleclick.net">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://www.google-analytics.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Kanit:wght@200;300;400;500&display=swap">
    <link rel="stylesheet" href="{{url('Frontend_css/style.css')}}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    @include('components.google-tags')


    <style>
        .card_img{
            height: 250px;
            background-size: cover;
            background-position: center;
        }
        .list_section_cards {
            margin-top: 5rem;
        }

        /* .school_card_item {
            transition: 0.3s;
            
        }
        .school_card_item:hover {
            scale: 1.02
        } */
         .school_hover_div{
            transform: translateY(100%);
            height: 100%;
            width: 100%;
            background-color: #ffe4ab3b;
            transition: transform 0.30s;
            
         }
         .school_card_item:hover .school_hover_div {
            transform: translateY(0);
        
         }
       
    </style>
</head>
<body>
    
@include('components.website-preloader')
<nav class="navbar navbar-expand-lg fixed-top fixed_nav py-1 col-lg-11 col-12 py-2" id="navbar_nav">
   <div class="container-fluid col-xl-10 col-lg-12 col-md-12 col-sm-12 col-12 py-1">
      <a class="m-0 navbar-brand p-0 me-lg-3" href="/"><img src="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->logo_path) }}" width="45" height="45" class="img-fluid" alt="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->app_name) }}"></a>
      <div>
         <ul class="navbar-nav m-0 align-items-center d-lg-none d-inline-block">
            @if(Auth::user() == null)
            <li class="nav-item mx-1 d-inline-flex"><a role="button" href="/registration" class="border-2 outlined_secondary_btn p-2 px-3 rounded-2 rounded-pill small">Signup</a></li>
            @else
            <li class="nav-item mx-1 d-none"><a role="button" href="/registration" class="border-2 outlined_secondary_btn p-2 px-3 rounded-2 rounded-pill small">Signup</a></li>
            @endif @if(Auth::user() == null)
            <li class="nav-item d-inline-flex"><a role="button" href="/login" class="border-2 secondary_btn p-2 px-3 rounded-2 rounded-pill small">Login</a></li>
            @else @if(Auth::user()->hasRole('student'))
            <li class="nav-item d-inline-flex"><a role="button" href="/dashboard" class="border-2 secondary_btn p-2 px-3 rounded-2 rounded-pill small @if(Request::is('change-syllabus')) active @endif">Dashboard</a></li>
            @elseif(Auth::user()->hasRole('parent'))
            <li class="nav-item d-inline-flex"><a role="button" href="/change-child" class="border-2 secondary_btn p-2 px-3 rounded-2 rounded-pill small @if(Request::is('change-child')) active @endif">Dashboard</a></li>
            @elseif(Auth::user()->hasRole('instructor'))
            <li class="nav-item d-inline-flex"><a role="button" href="/instructor/dashboard" class="border-2 secondary_btn p-2 px-3 rounded-2 rounded-pill small @if(Request::is('instructor/dashboard')) active @endif">Dashboard</a></li>
            @elseif(Auth::user()->hasRole('admin'))
            <li class="nav-item d-inline-flex"><a role="button" href="/admin/dashboard" class="border-2 d-inline-flex secondary_btn p-2 px-3 rounded-2 rounded-pill small @if(Request::is('admin/dashboard')) active @endif">Dashboard</a></li>
            @elseif(Auth::user()->hasRole('teacher'))
            <li class="nav-item d-inline-flex"><a role="button" href="/change-child" class="border-2 secondary_btn p-2 px-3 rounded-2 rounded-pill small @if(Request::is('change-child')) active @endif">Dashboard</a></li>
            @endif @endif
         </ul>
         <svg class="navbar-toggler border-0 text-white shadow-none px-1 navbar_menu ms-1" xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 24 24" style="fill:#fff" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop" aria-controls="offcanvasTop" aria-label="navbar Navigation">
            <path d="M4 6h16v2H4zm0 5h16v2H4zm0 5h16v2H4z"></path>
         </svg>
      </div>
      <div class="collapse navbar-collapse align-items-center justify-content-lg-between" id="navbarNav">
         <ul class="navbar-nav">
            <li class="nav-item text-center mx-2"><a aria-label="Home" class="nav-link border-0 px-2" href="/">Home</a></li>
            <li class="nav-item text-center mx-2"><a aria-label="Explore Pricings" class="nav-link border-0 px-2" href="/pricing">Pricings</a></li>
            <li class="nav-item text-center dropdown mx-2">
               <button class="nav-link customize_dropdown border-0 px-2 bg-transparent text-white" type="button" data-bs-toggle="dropdown" aria-expanded="false"><span>Learn With Us</span> <i class="fa fa-chevron-down fa-xs small ms-1 dropdown_toggle_icon"></i></button>
               <ul class="border-0 dropdown-menu dropdown-menu-start p-2 rounded-1 shadow-lg">
                  @php $loggedIn = Auth::user() != null; $isStudent = $loggedIn && Auth::user()->hasRole('student'); @endphp
                  <li><a class="align-items-baseline d-flex dropdown-item fw-normal p-2" href="{{ $isStudent ? '/quizzes' : '/login' }}"><i class="fa-regular fa-file-lines"></i> <span class="ms-2">Quizzes</span></a></li>
                  <li><a class="align-items-baseline d-flex dropdown-item fw-normal p-2" href="{{ $isStudent ? '/learn-practice' : '/login' }}"><i class="fa-solid fa-graduation-cap"></i> <span class="ms-2">Learn and Practise</span></a></li>
               </ul>
            </li>
            <li class="nav-item text-center dropdown mx-2">
               <button class="nav-link customize_dropdown border-0 px-2 bg-transparent text-white" type="button" data-bs-toggle="dropdown" aria-expanded="false"><span>Explore Hub</span> <i class="fa fa-chevron-down fa-xs small ms-1 dropdown_toggle_icon"></i></button>
               <ul class="border-0 dropdown-menu dropdown-menu-start p-2 rounded-1 shadow-lg">
                  <li>
                     <a class="align-items-baseline d-flex dropdown-item fw-normal p-2" href="/blogs">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="black">
                           <path d="M19.875 3H4.125C2.953 3 2 3.897 2 5v14c0 1.103.953 2 2.125 2h15.75C21.047 21 22 20.103 22 19V5c0-1.103-.953-2-2.125-2zm0 16H4.125c-.057 0-.096-.016-.113-.016-.007 0-.011.002-.012.008L3.988 5.046c.007-.01.052-.046.137-.046h15.75c.079.001.122.028.125.008l.012 13.946c-.007.01-.052.046-.137.046z"></path>
                           <path d="M6 7h6v6H6zm7 8H6v2h12v-2h-4zm1-4h4v2h-4zm0-4h4v2h-4z"></path>
                        </svg>
                        <span class="ms-2">Blogs</span>
                     </a>
                  </li>
                  <li><a class="align-items-baseline d-flex dropdown-item fw-normal p-2" href="/explore"><i class="fa-solid fa-earth-europe"></i> <span class="ms-2">Explore</span></a></li>
                  <li><a class="align-items-baseline d-flex dropdown-item fw-normal p-2" href="{{route('school_list' , ['page' => 1])}}"><i class="fa-solid fa-school"></i> <span class="ms-2">Schools</span></a></li>
               </ul>
            </li>
            <li class="nav-item text-center dropdown mx-2">
               <button class="nav-link customize_dropdown border-0 px-2 bg-transparent text-white" type="button" data-bs-toggle="dropdown" aria-expanded="false"><span>More For You</span> <i class="fa fa-chevron-down fa-xs small ms-1 dropdown_toggle_icon"></i></button>
               <ul class="border-0 dropdown-menu dropdown-menu-start p-2 rounded-1 shadow-lg">
                  <li><a class="align-items-baseline d-flex dropdown-item fw-normal p-2" href="/about"><i class="fa-solid fa-people-group"></i> <span class="ms-2">About Us</span></a></li>
                  <li><a class="align-items-baseline d-flex dropdown-item fw-normal p-2" href="/contact"><i class="fa-solid fa-headset"></i> <span class="ms-2">Contact Us</span></a></li>
                  <li><a class="align-items-baseline d-flex dropdown-item fw-normal p-2" href="/help"><i class="fa-solid fa-circle-info"></i> <span class="ms-2">Help & Support</span></a></li>
                  <li><a class="align-items-baseline d-flex dropdown-item fw-normal p-2" href="/reviews"><i class="fa-solid fa-star text-reset"></i> <span class="ms-2">Reviews</span></a></li>
               </ul>
            </li>
         </ul>
         <ul class="align-items-center m-0 navbar-nav">
            <li class="nav-item mx-2 d-lg-flex d-none"><a role="button" href="/registration" class="border-2 outlined_secondary_btn p-2 px-4 rounded-2 rounded-pill py-2">Signup</a></li>
            @if(Auth::user() == null)
            <li class="nav-item mx-2 d-lg-flex d-none"><a role="button" href="/login" class="border-2 secondary_btn p-2 px-4 rounded-2 rounded-pill py-2 text_shadow">Login</a></li>
            @else @if(Auth::user()->hasRole('student'))
            <li class="nav-item mx-2 d-lg-flex d-none"><a role="button" href="/dashboard" class="border-2 secondary_btn p-2 px-4 rounded-2 rounded-pill py-2 text_shadow @if(Request::is('change-syllabus')) active @endif">Dashboard</a></li>
            @elseif(Auth::user()->hasRole('parent'))
            <li class="nav-item mx-2 d-lg-flex d-none"><a role="button" href="/change-child" class="border-2 secondary_btn p-2 px-4 rounded-2 rounded-pill py-2 @if(Request::is('change-child')) active @endif">Dashboard</a></li>
            @elseif(Auth::user()->hasRole('instructor'))
            <li class="nav-item mx-2 d-lg-flex d-none"><a role="button" href="/instructor/dashboard" class="border-2 secondary_btn p-2 px-4 rounded-2 rounded-pill py-2 @if(Request::is('instructor/dashboard')) active @endif">Dashboard</a></li>
            @elseif(Auth::user()->hasRole('admin'))
            <li class="nav-item mx-2 d-lg-flex d-none"><a role="button" href="/admin/dashboard" class="border-2 d-inline-flex secondary_btn p-2 px-4 rounded-2 rounded-pill py-2 @if(Request::is('admin/dashboard')) active @endif">Dashboard</a></li>
            @elseif(Auth::user()->hasRole('teacher'))
            <li class="nav-item mx-2 d-lg-flex d-none"><a role="button" href="/change-child" class="border-2 secondary_btn p-2 px-4 rounded-2 rounded-pill py-2 @if(Request::is('change-child')) active @endif">Dashboard</a></li>
            @endif @endif
         </ul>
      </div>
   </div>
</nav>
<div class="offcanvas offcanvas-top vh-100" data-bs-scroll="true" tabindex="-1" id="offcanvasTop" aria-labelledby="offcanvasTopLabel">
   <div class="offcanvas-header customize_sidebar_header">
      <a aria-label="Home" class="text-decoration-none text-dark d-flex align-items-center" href="/"><img src="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->logo_path) }}" width="45" height="45" class="" alt="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->app_name) }}"> </a>
      <button type="button" class="border-0 bg-transparent" data-bs-dismiss="offcanvas" aria-label="Close">
         <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 24 24" style="stroke:#0f67f5">
            <path d="m16.192 6.344-4.243 4.242-4.242-4.242-1.414 1.414L10.535 12l-4.242 4.242 1.414 1.414 4.242-4.242 4.243 4.242 1.414-1.414L13.364 12l4.242-4.242z"></path>
         </svg>
      </button>
   </div>
   <hr>
   <div class="offcanvas-body" style="list-style:none">
      <ul class="list-unstyled m-0">
         <li class="nav-item my-3"><a aria-label="Home" class="nav-link border-0 px-2" href="/">Home</a></li>
         <li class="nav-item my-3"><a aria-label="Explore Pricings" class="nav-link border-0 px-2" href="/pricing">Pricings</a></li>
         <li class="nav-item my-3">
            <a aria-label="Learn With Us" class="nav-link border-0 px-2 nav_dropdown_btn" data-bs-toggle="collapse" href="#learnWithUs" role="button" aria-expanded="false" aria-controls="learnWithUs">
               Learn With Us 
               <svg xmlns="http://www.w3.org/2000/svg" class="dropdown_svg_icon" width="16" height="16" viewBox="0 0 24 24">
                  <path d="M16.939 7.939 12 12.879l-4.939-4.94-2.122 2.122L12 17.121l7.061-7.06z"></path>
               </svg>
            </a>
            <div class="collapse" id="learnWithUs">
               <div class="p-2"><a class="nav-link p-2 fw-normal text-white" href="{{ $isStudent ? '/quizzes' : '/login' }}">Quizzes</a> <a class="nav-link p-2 fw-normal text-white" href="{{ $isStudent ? '/learn-practice' : '/login' }}">Learn and Practise</a></div>
            </div>
         </li>
         <li class="nav-item my-3">
            <a aria-label="Explore Tutors Eleven Plus" class="nav-link border-0 px-2 nav_dropdown_btn" data-bs-toggle="collapse" href="#exploreTutors" role="button" aria-expanded="false" aria-controls="exploreTutors">
               Explore Tutors 11+ 
               <svg xmlns="http://www.w3.org/2000/svg" class="dropdown_svg_icon" width="16" height="16" viewBox="0 0 24 24">
                  <path d="M16.939 7.939 12 12.879l-4.939-4.94-2.122 2.122L12 17.121l7.061-7.06z"></path>
               </svg>
            </a>
            <div class="collapse" id="exploreTutors">
               <div class="p-2"><a class="nav-link p-2 fw-normal text-white" href="/blogs">Blogs</a> <a class="nav-link p-2 fw-normal text-white" href="/explore">Explore</a> <a class="nav-link p-2 fw-normal text-white" href="{{route('school_list' , ['page' => 1])}}">Schools</a></div>
            </div>
         </li>
         <li class="nav-item my-3">
            <a aria-label="More For You" class="nav-link border-0 px-2 nav_dropdown_btn" data-bs-toggle="collapse" href="#moreforyou" role="button" aria-expanded="false" aria-controls="moreforyou">
               More For You 
               <svg xmlns="http://www.w3.org/2000/svg" class="dropdown_svg_icon" width="16" height="16" viewBox="0 0 24 24">
                  <path d="M16.939 7.939 12 12.879l-4.939-4.94-2.122 2.122L12 17.121l7.061-7.06z"></path>
               </svg>
            </a>
            <div class="collapse" id="moreforyou">
               <div class="p-2"><a class="nav-link p-2 fw-normal text-white" href="/about">About Us</a> <a class="nav-link p-2 fw-normal text-white" href="/contact">Contact Us</a> <a class="nav-link p-2 fw-normal text-white" href="/help">Help & Support</a> <a class="nav-link p-2 fw-normal text-white" href="/reviews">Reviews</a></div>
            </div>
         </li>
      </ul>
   </div>
</div>

    <section class="list_section_cards py-5 fixed_width">
        <div class="section_heading mb-4">
            <h1 class="display-5 fw-medium my-2 text-center">School Categories</h1>
            <div class="heading_separator mx-auto rounded-pill mb-4"></div>
        </div>

        @if(count($schools['data']) > 0)
            <div class="row m-0 align-items-center py-4">
                @foreach($schools['data'] as $school)
                    {{--<div class="col-lg-4 col-md-6 col-sm-12 col-12 my-3">
                        <a href="{{route('topic',['subject_region' => $school['region_slug'], 'topic_school'=> $school['slug']])}}" class="border d-block list-cards rounded-4 school_card_item shadow overflow-hidden">
                        <h3 class="fw-semibold fs-4 p-3 m-2 mt-3 text-dark-emphasis">{{$school['name']}}</h3>
                        <div class="card_img w-100" style="background-image:url({{url($school['image'])}});"></div>
                            <div class="p-3 d-flex justify-content-between">
                                <p class="fw-normal list-card-title my-2 " style="color:orange">Type: {{$school['type']}}</p>
                                <p class="fw-normal list-card-title my-2 " style="color:orange">Region: {{$school['region_slug']}}</p>
                            </div>
                        </a>
                    </div>--}}
                        <div class="col-lg-4 col-md-6 col-sm-12 col-12 my-3">
                           <div class="p-3 rounded-4 school_card_item shadow border position-relative overflow-hidden">
                              <div class="mx-auto overflow-hidden rounded-circle school_picture shadow" style="height: 180px; width: 180px; background: url({{url($school['image'])}}) center; background-size: cover;"></div>    
                              <div class="school_details my-3">
                                 <h2 class="fs-4 text-center my-1 text-dark">{{$school['name']}}</h2>
                                 <div class="align-items-center flex-wrap d-flex justify-content-between my-3">
                                    <p class="fw-normal m-0 text-warning"><span class="fw-medium">Type: {{$school['type']}}</span> </p>
                                    <p class="fw-normal m-0 text-warning"><span class="fw-medium">Region: </span>{{$school['region']}}</p>
                                 </div>
                              </div>
                              <div class="bottom-0 end-0 position-absolute school_hover_div start-0">
                                 <div class="d-flex align-items-center h-100 w-100 justify-content-center">
                                    <a role="button" href="{{route('topic',['subject_region' => $school['region_slug'], 'topic_school'=> $school['slug']])}}" class="border-2 secondary_btn text-white p-2 px-4 rounded-2 rounded-pill py-2">Visit School</a>
                                 </div>
                              </div> 
                           </div>
                        </div> 
                        
                @endforeach
            </div>
           
            @if($schools['meta']['pagination']['total_pages'] > 1)
                <div class="d-flex justify-content-between">
                    @if(isset($schools['meta']['pagination']['links']['previous']))
                        <a class="btn btn_free_trial p-2 px-4" href="{{route('school_list' , ['page' => $schools['meta']['pagination']['current_page'] - 1])}}">Previous</a>
                    @else
                        <div style="height:1px;width:1px;"></div>
                    @endif
                    @if(isset($schools['meta']['pagination']['links']['next']))
                        <a class="btn btn_free_trial p-2 px-4" href="{{route('school_list' , ['page' => $schools['meta']['pagination']['current_page'] + 1])}}">Next</a>
                    @else
                        <div style="height:1px;width:1px;"></div>
                    @endif
                </div>
            @endif
        @endif
    </section>
    
    <!-- footer  -->
    @include('components.home-footer')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
        integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD"
        crossorigin="anonymous"></script>
      
</body>

</html>