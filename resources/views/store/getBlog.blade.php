<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @if(isset($blog->keywords))
        <meta name="keywords" content="{{($blog->keywords)}}">
    @else
        <meta name="keywords" content="Eleven Plus Exam, 11+ Preparation, 11 Plus Tips, Grammar School Admissions, Selective Schools, Verbal Reasoning, Non-Verbal Reasoning, Mathematics for 11+, English for 11+, Exam Techniques, Mock Tests, Past Papers, Study Plans, Common Entrance Exam, Entrance Test Strategies, Parental Guidance for 11+, Time Management, Problem Solving, Critical Thinking, Vocabulary Building for 11+">
    @endif
    @if(isset($blog->meta_description))
        <meta name="description" content="{{($blog->meta_description)}}">
    @else
        <meta name="description" content="Discover our expert-led Eleven Plus preparation strategies to excel in your 11+ exam. Access comprehensive study materials, practise tests, and tailored tutoring to ensure your child succeeds. Start the journey to academic excellence today!">
    @endif
    <title>{{$blog->title}} | Tutorselevenplus Blogs</title>    
    <link rel="canonical" href="{{ url()->current() }}"/>
	  <link rel="alternate" href="{{ url()->current() }}" hreflang="en-gb">
    <meta name="author" content="{{ app(\App\Settings\SiteSettings::class)->app_name }}">
    <link rel="icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}">
    <meta property="og:title" content="{{$blog->title}} | Tutorselevenplus Blogs" />
    @if(isset($blog->meta_description))
      <meta property="og:description" content="{{$blog->meta_description}}" />
    @else
      <meta property="og:description" content="Discover our expert-led Eleven Plus preparation strategies to excel in your 11+ exam. Access comprehensive study materials, practise tests, and tailored tutoring to ensure your child succeeds. Start the journey to academic excellence today!" />
    @endif
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:image" content="{{url($blog->image)}}" />
    <!-- preload links  -->
    <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" as="style">
    <link rel="preload" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" as="style" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="preload" href="{{url('Frontend_css/style.css')}}" as="style">
    <link rel="preconnect" href="https://googleads.g.doubleclick.net">
    <link rel="preconnect" href="https://td.doubleclick.net">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://www.google-analytics.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- css links  -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Kanit:wght@200;300;400;500&display=swap">
    <link rel="stylesheet" href="{{url('Frontend_css/style.css')}}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    @include('components.google-tags')
    <style>
        #navbar_nav{
            background: #006ae8 !important;
        }
            .avatar {
            position: relative;
            display: inline-block;
            width: 3rem;
            height: 3rem;
            font-size: 1.25rem;
            }

        .avatar-img,
        .avatar-initials,
        .avatar-placeholder {
        width: 100%;
        height: 100%;
        border-radius: inherit;
        }

        .avatar-img {
        display: block;
        -o-object-fit: cover;
        object-fit: cover;
        }

        .avatar-initials {
        position: absolute;
        top: 0;
        left: 0;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        -ms-flex-pack: center;
        justify-content: center;
        color: #fff;
        line-height: 0;
        background-color: #a0aec0;
        }

        .avatar-placeholder {
        position: absolute;
        top: 0;
        left: 0;
        background: #a0aec0
            url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20'%3e%3cpath fill='%23fff' d='M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z'/%3e%3c/svg%3e")
            no-repeat center/1.75rem;
        }

        .avatar-indicator {
        position: absolute;
        right: 0;
        bottom: 0;
        width: 20%;
        height: 20%;
        display: block;
        background-color: #a0aec0;
        border-radius: 50%;
        }

        .avatar-group {
        display: -ms-inline-flexbox;
        display: inline-flex;
        }

        .avatar-group .avatar + .avatar {
        margin-left: -0.75rem;
        }

        .avatar-group .avatar:hover {
        z-index: 1;
        }

        .avatar-sm,
        .avatar-group-sm > .avatar {
        width: auto;
        height: auto;
        font-size: 1rem;
        }

        .avatar-sm .avatar-placeholder,
        .avatar-group-sm > .avatar .avatar-placeholder {
        background-size: 1.25rem;
        }

        .avatar-group-sm > .avatar + .avatar {
        margin-left: -0.53125rem;
        }

        .avatar-lg,
        .avatar-group-lg > .avatar {
        width: 4rem;
        height: 4rem;
        font-size: 1.5rem;
        }

        .avatar-lg .avatar-placeholder,
        .avatar-group-lg > .avatar .avatar-placeholder {
        background-size: 2.25rem;
        }

        .avatar-group-lg > .avatar + .avatar {
        margin-left: -1rem;
        }

        .avatar-light .avatar-indicator {
        box-shadow: 0 0 0 2px rgba(255, 255, 255, 0.75);
        }

        .avatar-group-light > .avatar {
        box-shadow: 0 0 0 2px rgba(255, 255, 255, 0.75);
        }

        .avatar-dark .avatar-indicator {
        box-shadow: 0 0 0 2px rgba(0, 0, 0, 0.25);
        }

        .avatar-group-dark > .avatar {
        box-shadow: 0 0 0 2px rgba(0, 0, 0, 0.25);
        }
        .avatar_logo{
          width: 40px;
          height: 40px;
          background-size: cover;
          background-position: center;
        }
        .custom_container{
          max-width: 800px;
          margin: 0 auto;
        }
        .author_circle{
          height:50px;
          width:50px;
        }
        .animated_img{
          transition: 0.3s ease;
        }
        .animated_img:hover{
          scale: 1.1;
        }
        .author_name{
          font-size: 14px;
        }
        .two_line{
          overflow: hidden;
          display: -webkit-box;
          -webkit-line-clamp: 2; /* number of lines to show */
                  line-clamp: 2; 
          -webkit-box-orient: vertical;
        }
        .related_blog_img{
          height: 250px;
          background-size: cover;
          background-position: center;
        }
        .comment_card_item {
          filter: drop-shadow(0px 3px 5px #00000030);
        }
    </style>
  
</head>
<body>
    <section style="height:72px;">
      @include('components.home-navbar')
    </section>

    <section class="col-12 col-lg-8 col-md-10 mx-auto my-4 px-3">
        <div class="d-flex align-items-center justify-content-between">
          <div class="d-flex align-items-center">
            <div class="author_circle bg-warning rounded-circle d-flex justify-content-center align-items-center text-white fs-3 fw-lighter p-2">{{ strtoupper(substr($blog->author, 0, 1)) }}</div>
            <div class="ms-2">
              <h2 class="mb-0 fs-5 fw-light">Written by {{$blog->author}}</h2>
              <p class="m-0 text-muted fw-light small">Published {{ $blog->created_at->diffForHumans() }}</p>
            </div>
          </div>
          <div>
            <button class="btn border-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
              <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);"><path d="M3 12c0 1.654 1.346 3 3 3 .794 0 1.512-.315 2.049-.82l5.991 3.424c-.018.13-.04.26-.04.396 0 1.654 1.346 3 3 3s3-1.346 3-3-1.346-3-3-3c-.794 0-1.512.315-2.049.82L8.96 12.397c.018-.131.04-.261.04-.397s-.022-.266-.04-.397l5.991-3.423c.537.505 1.255.82 2.049.82 1.654 0 3-1.346 3-3s-1.346-3-3-3-3 1.346-3 3c0 .136.022.266.04.397L8.049 9.82A2.982 2.982 0 0 0 6 9c-1.654 0-3 1.346-3 3z"></path></svg>
            </button>
            <ul class="border-0 dropdown-menu dropdown-menu-sm-end dropdown-menu-start shadow-lg">
              <li>
                <a role="button" class="align-items-center d-flex dropdown-item fw-normal py-2" id="copyLink">
                  <i class="fa fa-link me-2"></i> <span>Copy link</span>
                </a>
              </li>
              <hr class="border-secondary my-2">
              <li>
                <a href="https://api.whatsapp.com/send?text={{ request()->fullUrl() }}" target="_blank" class="align-items-center d-flex dropdown-item fw-normal py-2">
                  <svg version="1.1" height="18" width="18" class="me-2" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 418.135 418.135" style="enable-background:new 0 0 418.135 418.135;" xml:space="preserve">
                    <g>
                      <path style="fill:#7AD06D;" d="M198.929,0.242C88.5,5.5,1.356,97.466,1.691,208.02c0.102,33.672,8.231,65.454,22.571,93.536L2.245,408.429c-1.191,5.781,4.023,10.843,9.766,9.483l104.723-24.811c26.905,13.402,57.125,21.143,89.108,21.631c112.869,1.724,206.982-87.897,210.5-200.724C420.113,93.065,320.295-5.538,198.929,0.242z M323.886,322.197c-30.669,30.669-71.446,47.559-114.818,47.559c-25.396,0-49.71-5.698-72.269-16.935l-14.584-7.265l-64.206,15.212l13.515-65.607l-7.185-14.07c-11.711-22.935-17.649-47.736-17.649-73.713c0-43.373,16.89-84.149,47.559-114.819c30.395-30.395,71.837-47.56,114.822-47.56C252.443,45,293.218,61.89,323.887,92.558c30.669,30.669,47.559,71.445,47.56,114.817C371.446,250.361,354.281,291.803,323.886,322.197z" />
                      <path style="fill:#7AD06D;" d="M309.712,252.351l-40.169-11.534c-5.281-1.516-10.968-0.018-14.816,3.903l-9.823,10.008c-4.142,4.22-10.427,5.576-15.909,3.358c-19.002-7.69-58.974-43.23-69.182-61.007c-2.945-5.128-2.458-11.539,1.158-16.218l8.576-11.095c3.36-4.347,4.069-10.185,1.847-15.21l-16.9-38.223c-4.048-9.155-15.747-11.82-23.39-5.356c-11.211,9.482-24.513,23.891-26.13,39.854c-2.851,28.144,9.219,63.622,54.862,106.222c52.73,49.215,94.956,55.717,122.449,49.057c15.594-3.777,28.056-18.919,35.921-31.317C323.568,266.34,319.334,255.114,309.712,252.351z" />
                    </g>
                  </svg>
                  <span>Share on Whatsapp</span>
                </a>
              </li>
              <li>
                <a href="https://www.facebook.com/sharer/sharer.php?u={{ request()->fullUrl() }}" target="_blank" class="align-items-center d-flex dropdown-item fw-normal py-2">
                  <svg id="Layer_1" height="18" width="18" class="me-2" enable-background="new 0 0 100 100" height="512" viewBox="0 0 100 100" width="512" xmlns="http://www.w3.org/2000/svg">
                    <g id="_x30_1._Facebook">
                      <path id="Icon_11_" d="m40.437 55.166c-.314 0-6.901.002-9.939-.001-1.564-.001-2.122-.563-2.122-2.137-.002-4.043-.003-8.086 0-12.129.001-1.554.591-2.147 2.135-2.148 3.038-.002 9.589-.001 9.926-.001 0-.277-.001-6.114 0-8.802.002-3.974.711-7.778 2.73-11.261 2.067-3.565 5.075-6.007 8.93-7.419 2.469-.905 5.032-1.266 7.652-1.268 3.278-.002 6.556.001 9.835.007 1.409.002 2.034.625 2.037 2.044.006 3.803.006 7.606 0 11.408-.002 1.434-.601 2.01-2.042 2.026-2.687.029-5.376.011-8.06.119-2.711 0-4.137 1.324-4.137 4.13-.065 2.968-.027 5.939-.027 9.015.254 0 7.969-.001 11.575 0 1.638 0 2.198.563 2.198 2.21 0 4.021-.001 8.043-.004 12.064-.001 1.623-.527 2.141-2.175 2.142-3.606.002-11.291.001-11.627.001v32.545c0 1.735-.546 2.288-2.258 2.288-4.174 0-8.349.001-12.523 0-1.513 0-2.103-.588-2.103-2.101-.001-10.599-.001-32.36-.001-32.732z" fill="#3d6ad6" />
                    </g>
                  </svg>
                  <span>Share on Facebook</span>
                </a>
              </li>
              <li>
                <a href="https://twitter.com/intent/tweet?url={{ request()->fullUrl() }}" target="_blank" class="align-items-center d-flex dropdown-item fw-normal py-2">
                  <svg version="1.1" height="18" width="18" class="me-2" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                    <path style="fill:#03A9F4;" d="M512,97.248c-19.04,8.352-39.328,13.888-60.48,16.576c21.76-12.992,38.368-33.408,46.176-58.016c-20.288,12.096-42.688,20.64-66.56,25.408C411.872,60.704,384.416,48,354.464,48c-58.112,0-104.896,47.168-104.896,104.992c0,8.32,0.704,16.32,2.432,23.936c-87.264-4.256-164.48-46.08-216.352-109.792c-9.056,15.712-14.368,33.696-14.368,53.056c0,36.352,18.72,68.576,46.624,87.232c-16.864-0.32-33.408-5.216-47.424-12.928c0,0.32,0,0.736,0,1.152c0,51.008,36.384,93.376,84.096,103.136c-8.544,2.336-17.856,3.456-27.52,3.456c-6.72,0-13.504-0.384-19.872-1.792c13.6,41.568,52.192,72.128,98.08,73.12c-35.712,27.936-81.056,44.768-130.144,44.768c-8.608,0-16.864-0.384-25.12-1.44C46.496,446.88,101.6,464,161.024,464c193.152,0,298.752-160,298.752-298.688c0-4.64-0.16-9.12-0.384-13.568C480.224,136.96,497.728,118.496,512,97.248z" />
                  </svg>
                  <span>Share on Twitter</span>
                </a>
              </li>
              <li>
                <a href="https://www.linkedin.com/shareArticle?url={{ request()->fullUrl() }}" target="_blank" class="align-items-center d-flex dropdown-item fw-normal py-2">
                  <svg id="Layer_1" height="18" width="18" class="me-2" enable-background="new 0 0 100 100" height="512" viewBox="0 0 100 100" width="512" xmlns="http://www.w3.org/2000/svg"><g id="_x31_0.Linkedin" fill="#0073b1"><path d="m89.98 90v-.003h.02v-29.34c0-14.353-3.09-25.41-19.87-25.41-8.067 0-13.48 4.427-15.69 8.623h-.233v-7.283h-15.91v53.41h16.567v-26.447c0-6.963 1.32-13.697 9.943-13.697 8.497 0 8.623 7.947 8.623 14.143v26.004z"/><path d="m11.32 36.59h16.587v53.41h-16.587z"/><path d="m19.607 10c-5.304 0-9.607 4.303-9.607 9.607s4.303 9.697 9.607 9.697 9.607-4.393 9.607-9.697c-.004-5.304-4.307-9.607-9.607-9.607z"/></g></svg>
                  <span>Share on LinkedIn</span>
                </a>
              </li>
            </ul>
          </div>
        </div>
    </section>

    <section class="container-fluid overflow-scroll pt-2">
        {!!$blog->body!!}
    </section>

    {{--<section>
        <div class="d-flex align-items-center justify-content-center">
            <div class="container-fluid">

              <div class="row justify-content-center">
                <div class="col-lg-8 col-md-8 col-sm-12 col-12" id="allComments">
                  @foreach($comments as $comment)
                    <div class="px-3 py-3 rounded-bottom">
                      <div class="d-flex">
                        <div class="flex-shrink-0">
                          <div class="avatar avatar-sm rounded-circle">
                            @if($comment->image)
                              <div class="avatar_logo border rounded-circle shadow-sm" style="background-image: url({{url($comment->image)}})"></div>
                            @else
                              <div class="avatar_logo border rounded-circle shadow-sm d-flex justify-content-center align-items-center text-white" style="background-color: {{$comment->random_color}}">{{$comment->first_letter}}</div>
                            @endif
                          </div>
                        </div>
                        <div class="flex-grow-1 ms-2 ms-md-3">
                          <div class="d-flex align-items-baseline">
                            <h6 class="me-2">{{$comment->name}}</h6>
                            <span class="badge py-1 bg-white text-muted fw-normal">{{ \Carbon\Carbon::parse($comment->created_at)->diffForHumans() }}</span>
                          </div>
                          <div>{{$comment->comment}}</div>
                        </div>
                      </div>
                    </div>
                  @endforeach
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12 col-12 mt-3">
                    <div class="px-3 py-3 rounded-bottom">
                        <div class="d-flex">
                          @if(Auth::user())
                            <div class="flex-shrink-0">
                              <div class="avatar avatar-sm rounded-circle">
                                @if(Auth::user()->profile_photo_path != 'profile-photos/user-profile-icon.svg')
                                  <div class="avatar_logo border rounded-circle shadow-sm" style="background-image: url({{url(Auth::user()->profile_photo_path)}})"></div>
                                @else
                                  <div class="avatar_logo border rounded-circle shadow-sm d-flex justify-content-center align-items-center text-white" style="background-color: rgb({{mt_rand(0, 255)}} {{mt_rand(0, 255)}} {{mt_rand(0, 255)}})">{{substr(Auth::user()->first_name, 0, 1)}}</div>
                                @endif
                              </div>
                            </div>
                          @endif
                          <div class="flex-grow-1 ms-2 ms-md-3">
                            @if(!Auth::user())
                              <div class="row">
                                <div class="col-sm-6 col-12">
                                  <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control shadow-sm" id="name" placeholder="Write your name here">
                                  </div>
                                </div>
                                <div class="col-sm-6 col-12">
                                  <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control shadow-sm" id="email" placeholder="Write your email here">
                                  </div>
                                </div>
                              </div>
                            @endif
                              <div class="form-group">
                                <label for="comment">Leave a comment!</label>
                                <textarea class="form-control" rows="5" placeholder="Write a comment here" id="comment"></textarea>
                                <div class="text-end my-3">
                                  <div id="formError" class="small text-danger"></div>
                                  <button class="border-0 p-2 px-4 secondary_btn font_medium text-decoration-none" id="getcomment">
                                    <span class="text_shadow">Submit</span>
                                  </button>
                                </div>
                              </div>
                          </div>
                        </div>
                      </div>
                </div>
              </div>
            </div>
        </div>
    </section>--}}

    <section class="col-lg-8 col-md-10 col-12 mx-auto my-5 p-2">
        <div class="mb-4">
          <h2 class="display-5 text-center my-2 fw-medium">Share Your Thoughts</h2>
          <div class="heading_separator my-2 mx-auto"></div>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-12" id="allComments">
          @foreach($comments as $comment)
            <div class="my-3">
              <div class="bg-white comment_card_item border p-3 px-4 rounded-4">
                <div class="d-flex align-items-center my-2 border-bottom pb-1">
                  <div class="avatar me-2 avatar-sm rounded-circle">
                    @if($comment->image)
                      <div class="avatar_logo border rounded-circle shadow-sm" style="background-image: url({{url($comment->image)}})"></div>
                    @else
                      <div class="avatar_logo border rounded-circle shadow-sm d-flex justify-content-center align-items-center text-white" style="background-color: {{$comment->random_color}}">{{$comment->first_letter}}</div>
                    @endif
                  </div>
                  <div class="align-items-baseline d-flex justify-content-between w-100">
                    <h6 class="fs-6 fw-normal mb-0 me-2">{{$comment->name}}</h6>
                    <span class="badge bg-light border fw-light px-2 py-1 rounded-pill shadow-sm text-dark-emphasis">{{ \Carbon\Carbon::parse($comment->created_at)->diffForHumans() }}</span>
                  </div>
                </div>
                <div class="fw-light my-1">{{$comment->comment}}</div>
              </div>
            </div>
          @endforeach
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-12 mt-3">
          <div class="my-4">
            <div class="mb-4">
              <h2 class="my-2 fw-medium h3">Leave a Comment</h2>
              <div class="heading_separator my-2"></div>
            </div>
            <div class="d-flex">
              @if(Auth::user())
                <div class="flex-shrink-0">
                  <div class="avatar avatar-sm rounded-circle">
                    @if(Auth::user()->profile_photo_path != 'profile-photos/user-profile-icon.svg')
                      <div class="avatar_logo border rounded-circle shadow-sm" style="background-image: url({{url(Auth::user()->profile_photo_path)}})"></div>
                    @else
                      <div class="avatar_logo border rounded-circle shadow-sm d-flex justify-content-center align-items-center text-white" style="background-color: rgb({{mt_rand(0, 255)}} {{mt_rand(0, 255)}} {{mt_rand(0, 255)}})">{{substr(Auth::user()->first_name, 0, 1)}}</div>
                    @endif
                  </div>
                </div>
              @endif
              <div class="flex-grow-1 ms-2 ms-md-3">
                @if(!Auth::user())
                  <div class="row">
                    <div class="col-sm-6 col-12">
                      <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control fw-light my-2 p-3 shadow-sm text-capitalize" id="name" placeholder="Enter name...">
                        <p class="text-danger my-1 small d-none name_error"></p>
                      </div>
                    </div>
                    <div class="col-sm-6 col-12">
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control fw-light my-2 p-3 shadow-sm" id="email" placeholder="Enter email...">
                        <p class="text-danger my-1 small d-none email_error"></p>
                      </div>
                    </div>
                  </div>
                @endif
                  <div class="form-group">
                    <label for="comment">Comment</label>
                    <textarea class="form-control my-2 p-3 shadow-sm fw-light" rows="5" placeholder="Share you feedback..." id="comment"></textarea>
                    <p class="text-danger my-1 small d-none comment_error"></p>
                    <div class="text-end my-3">
                      <div id="formError" class="small text-danger"></div>
                      <button class="border-0 p-2 px-4 secondary_btn font_medium" id="getcomment">Submit <span class="spinner-border d-none spinner-border-sm" aria-hidden="true"></span></button>
                    </div>
                  </div>
              </div>
            </div>
          </div>
        </div>
    </section>

    @if(count($author_blogs) > 0 || count($recommended) > 0)
      <section class="bg-light p-md-5 p-3">
        <div class="container">
          @if(count($author_blogs) > 0)
            <div class="mb-4">
              <h2 class="text-center fw-medium display-6 my-2">More from {{$blog->author}}</h2>
              <div class="heading_separator mx-auto my-2"></div>
            </div>
            <div class="mb-5 my-4 row justify-content-center">
              @foreach($author_blogs as $author_blog)
                <div class="col-12 col-lg-5 col-md-6 my-3">
                  <a class="text-secondary-emphasis" href="{{route('get_blog',['slug' => $author_blog->slug])}}">
                    <div class="bg-white shadow rounded-4 overflow-hidden">
                      <div class="border-bottom">
                        <div class="related_blog_img animated_img" style="background-image:url({{url($author_blog->image)}});"></div>
                      </div>
                      <div class="p-3">
                        <p class="my-2 author_name fw-light text-dark">{{$author_blog->author}} published {{ $author_blog->created_at->diffForHumans() }}</p>
                        <h2 class="text-black fs-4 two_line">{{$author_blog->title}}</h2>
                        <p class="two_line fw-light">{{$author_blog->meta_description}}</p>
                        <p class="fw-lighter text-dark"> <i class="fa fa-spa text-warning"></i> {{ \Carbon\Carbon::parse($author_blog->created_at)->format('M d') }}</p>
                      </div>
                    </div>
                  </a>
                </div>
              @endforeach
            </div>
          @endif
          @if(count($recommended) > 0)
            <div class="mb-4">
              <h2 class="text-center fw-medium display-6 my-2">Our Top Blog Picks</h2>
              <div class="heading_separator mx-auto my-2"></div>
            </div>
            <div class="mb-5 my-4 row justify-content-center">
              @foreach($recommended as $recommended_blog)
                <div class="col-12 col-lg-5 col-md-6 my-3">
                  <a class="text-secondary-emphasis" href="{{route('get_blog',['slug' => $recommended_blog->slug])}}">
                    <div class="bg-white shadow rounded-4 overflow-hidden">
                      <div class="border-bottom">
                        <div class="related_blog_img animated_img" style="background-image:url({{url($recommended_blog->image)}});"></div>
                      </div>
                      <div class="p-3">
                        <p class="my-2 author_name fw-light text-dark">{{$recommended_blog->author}} published {{ $recommended_blog->created_at->diffForHumans() }}</p>
                        <h3 class="text-black h4 two_line">{{$recommended_blog->title}}</h3>
                        <p class="two_line fw-light">{{$recommended_blog->meta_description}}</p>
                        <p class="fw-lighter text-dark"> <i class="fa fa-spa text-warning"></i> {{ \Carbon\Carbon::parse($recommended_blog->created_at)->format('M d') }}</p>
                      </div>
                    </div>
                  </a>
                </div>
              @endforeach
            </div>
          @endif
        </div>
      </section>
    @endif
    
    
    <!-- footer  -->
    @include('components.home-footer')

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
        integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="{{url('Frontend_css/js/home.js')}}"></script>
    <script>
        $(document).ready(function(){
            $("#getcomment").click(function(){
              var comment = $("#comment").val();
              var name = "";
              if($("#name").length > 0){
                name = $("#name").val();
                email = $("#email").val();
                if(comment){
                  $("#formError").text("");
                  if(name){
                    if(email){
                      if(validateEmail(email)){
                        $("#formError").text("");
                        $("#comment").val("");
                        $("#name").val("");
                        $("#email").val("");
                        sendComment(name, email, comment);
                      } else {
                        $("#formError").text("Please enter a vaild email");
                      }
                    } else {
                      $("#formError").text("Please enter your email");
                    }
                  } else {
                    $("#formError").text("Please enter your name");
                  }
                } else {
                  $("#formError").text("Please enter a comment");
                }
              } else {
                if(comment){
                  $("#formError").text("");
                  $("#comment").val("");
                  sendComment("", "", comment);
                } else {
                  $("#formError").text("Please enter a comment");
                }
              }
            });
            function validateEmail($email) {
              var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
              return emailReg.test( $email );
            }
            function sendComment(name, email, comment){
              $("#getcomment").find(".spinner-border").removeClass("d-none");
              let blog = {!! str_replace("'", "\'", json_encode($blog->id)) !!};
              $.ajax({
                  type: "POST",
                  url: '/send_blog_comment/'+blog,
                  data: {
                      'user': name,
                      'email': email,
                      'comment': comment,
                      _token: '{{ csrf_token() }}'
                  },
                  success: function(data) {
                      $("#getcomment").find(".spinner-border").addClass("d-none");
                      if(data.success){
                        console.log(data.comment.created_at);
                        let comment = data.comment;
                        var avatar_logo = "";
                        if(comment.image){
                          avatar_logo = `<div class="avatar_logo border rounded-circle shadow-sm" style="background-image: url(/`+comment.image+`)"></div>`;
                        } else {
                          avatar_logo = `<div class="avatar_logo border rounded-circle shadow-sm d-flex justify-content-center align-items-center text-white" style="background-color: `+comment.random_color+`">`+comment.first_letter+`</div>`;
                        }
                        let tab = `<div class="my-3">
                                    <div class="bg-white comment_card_item border p-3 px-4 rounded-4">
                                      <div class="d-flex align-items-center my-2 border-bottom pb-1">
                                        <div class="avatar me-2 avatar-sm rounded-circle">`+avatar_logo+`</div>
                                        <div class="align-items-baseline d-flex justify-content-between w-100">
                                          <h6 class="fs-6 fw-normal mb-0 me-2">`+comment.name+`</h6>
                                          <span class="badge bg-light border fw-light px-2 py-1 rounded-pill shadow-sm text-dark-emphasis">0 seconds ago</span>
                                        </div>
                                      </div>
                                      <div class="fw-light my-1">`+comment.comment+`</div>
                                    </div>
                                  </div>`

                        $("#allComments").append(tab);
                      }
                  },
                  error: function(data, textStatus, errorThrown) {
                    console.log(textStatus);
                  },
              });
            }
        });
    </script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());

        gtag('config', 'G-P92SKH2Z5X');
        $(document).ready(function () {
            // window resize 
            $(window).resize(function () {
                let window_width = $(window).width();
                let sidebarNav = $("#sidebarNav");
                let sidebarBackDrop = $(".offcanvas-backdrop")
                // console.log(window_width);
                if (window_width > 992 && sidebarNav.hasClass("show")) {
                    $(sidebarNav).removeClass("show");
                    $(sidebarNav).addClass("hide");
                    $(sidebarBackDrop).addClass("d-none");
                }
            });
            // toggle navbar 
            $(window).scroll(function () {
                const scrolled = $(window).scrollTop();
                if (scrolled > 100) {
                    $("#navbar_nav").removeClass("absolute_nav bg-transparent").addClass('fixed-top fixed_nav col-lg-11 col-12');
                } else {
                    $("#navbar_nav").removeClass("fixed-top fixed_nav col-lg-11 col-12").addClass('absolute_nav bg-transparent');
                }
            });
        });
        $(".newsletter_btn").click(function (e) {
            e.preventDefault()
            let email = $("#newsletter_input").val();
            if (email) {
                $.ajax({
                    dataType: 'json',
                    type: "POST",
                    url: '/add-subscribe',
                    data: {
                        email: email,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function (data) {
                        if (data) {
                            $("#newsletter_form").empty().append('<div>Thank You for Subscribing to Our Newsletter..</div>');
                        }
                    },
                    error: function (data, textStatus, errorThrown) {
                        console.log(textStatus);
                    },
                });
            }
        });
        $("#copyLink").click(function(){
          let link = window.location.href;
          var $temp = $("<input>");
          $("body").append($temp);
          $temp.val(link).select();
          document.execCommand("copy");
          $temp.remove();
        });
    </script>

</body>

</html>