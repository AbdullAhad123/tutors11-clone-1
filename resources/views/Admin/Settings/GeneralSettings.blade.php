<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/"
    data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>General Settings</title>
    <!-- rel icon -->
    <link rel="icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}">
    <meta name="description" content="{{ app(\App\Settings\SiteSettings::class)->seo_description }}">
    <meta name="author" content="{{ app(\App\Settings\SiteSettings::class)->app_name }}">
 <!-- bootstrap cdn -->
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.0/dist/boxicons.js" integrity="sha512-Dm5UxqUSgNd93XG7eseoOrScyM1BVs65GrwmavP0D0DujOA8mjiBfyj71wmI2VQZKnnZQsSWWsxDKNiQIqk8sQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <meta name="description" content="" />
    <link rel="stylesheet" href="{{url('Frontend_css/assets/css/style.css')}}" />
    <!-- public\Frontend_css\assets\css\style.css -->
</head>

<body>
    @include('sidebar')
    @include('header')

    <div id="pageMessage" class="my-4"></div>
    @if (Session::has('success'))
        <div class="alert alert-success text-dark mt-3">
            <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 50 50" width="30px" height="30px"><path d="M 25 2 C 12.317 2 2 12.317 2 25 C 2 37.683 12.317 48 25 48 C 37.683 48 48 37.683 48 25 C 48 20.44 46.660281 16.189328 44.363281 12.611328 L 42.994141 14.228516 C 44.889141 17.382516 46 21.06 46 25 C 46 36.579 36.579 46 25 46 C 13.421 46 4 36.579 4 25 C 4 13.421 13.421 4 25 4 C 30.443 4 35.393906 6.0997656 39.128906 9.5097656 L 40.4375 7.9648438 C 36.3525 4.2598437 30.935 2 25 2 z M 43.236328 7.7539062 L 23.914062 30.554688 L 15.78125 22.96875 L 14.417969 24.431641 L 24.083984 33.447266 L 44.763672 9.046875 L 43.236328 7.7539062 z"/></svg>
            {{Session::get('success')}}
        </div>
    @endif
    @if (Session::has('errorMessage'))
        <div class="alert alert-danger mt-3">
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
    @endif

    <!-- Layout wrapper -->

        <div class="container">
            <div class="d-flex justify-content-center align-items-center py-3 mb-4">
                <span>
                    <h2 class="text-dark m-0">General Settings</h2>
                </span>
            </div>
            <!-- site setting form  -->
             <div class="settings">
                    <div class="row mx-2 shadow-lg bg-white rounded-3 align-items-center justify-content-center">
                        <div class="col-lg-6 col-md-11 col-sm-12">
                            <div class="profile_form">
                                <h4 class="profile_form_heading">Site Settings</h4>
                                <form>
                                    <!-- name  -->
                                    <h5 class="label_heading">Site Name</h5>
                                    <div class="row personal_info">
                                        <div>
                                            <input type="text" class="form-control rounded-5 border bg-transparent" name="app_name" id="app_name"
                                                value="{{$siteSettings['app_name']}}">
                                        </div>
                                    </div>
                                    <!-- slogan  -->
                                    <h5 class="label_heading">Tag Line</h5>
                                    <div class="row personal_info">
                                        <div>
                                            <input type="text" class="form-control rounded-5 bg-transparent" name="app_slogan" id="app_slogan"
                                                value="{{$siteSettings['tag_line']}}" >    
                                        </div>
                                    </div>
                                    <!-- description  -->
                                    <h5 class="label_heading">Short Description</h5>
                                    <div class="row personal_info">
                                        <div>
                                            <textarea class="form-control bg-transparent " id="short_description"
                                                style="min-height: 100px!important; max-height: 150px!important">{{$siteSettings['seo_description']}}</textarea>
                                        </div>
                                    </div>
                                    <!-- user registeration  -->
                                    <div class="bg-body-secondary d-flex my-4 p-4 w-100 rounded-3">
                                        <div class="w-100">
                                            <h6>Enable User Registration</h6>
                                            @if($siteSettings['can_register'] == true)
                                            <div class="row align-items-center justify-content-between">
                                                <div class="col-10">
                                                    <label class="text-dark">
                                                        <span class="enable_disable_text text-primary">Enable</span>
                                                    </label>
                                                </div>
                                                <div class="col-2">
                                                    <div class="form-check form-switch text-center">
                                                        <input class="form-check-input shadow-none border border-dark btn-lg" checked type="checkbox" role="switch" id="enable_disable_check">
                                                    </div>
                                                </div>
                                            </div>
                                            @else
                                            <div class="row align-items-center justify-content-between">
                                                <div class="col-10">
                                                    <label class="text-dark">
                                                        <span class="enable_disable_text text-primary">Disable</span>
                                                    </label>
                                                </div>
                                                <div class="col-2">
                                                    <div class="form-check form-switch text-center">
                                                        <input class="form-check-input shadow-none border border-dark btn-lg" type="checkbox" role="switch" id="enable_disable_check">
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="update_btn">
                                        <button id="updateSiteSettings" class="btn_update shadow textuppercase">SAVE</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-11 col-sm-12">
                            <img src="{{url('images/admin_setting.png')}}" class="img-fluid" width="500" height="auto" alt="">
                        </div>
                  </div>
             </div>
            <hr class="my-5">
            <!-- site images settings  -->
            <div class="row justify-content-between align-items-center mx-auto">
                <!-- FIRST CHILD  -->
               <div class="my-3">
                    <h3 class="text-dark">Upload Your Logo</h3>
                    <p>Personalize your educational identity by seamlessly uploading your logo here</p>
               </div>
                <div class="col-lg-6 col-md-6 col-sm-10 col-12 mx-auto my-2">
                    <div class=" p-3 shadow-lg rounded-3  cardHoverEffect bg-white">
                        <h3 class="profile_form_heading text-center text-primary">Site Logo</h3>
                        <form class="user-select-none" action="{{ route('update_logo') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                            <!-- choose file  -->
                            <div class="row personal_info my-3">
                                <div class="profile_photo mt-3">
                                    <div class="profile-pic">
                                        <div>
                                            <div class="logo-previewer overflow-hidden">
                                                <img class="site_logoPreview h-auto w-100" src="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->logo_path) }}" alt="Preview">
                                            </div>
                                            <label for="site_logo" class="file-label bg-label-primary mt-3 d-inline-block  rounded-pill p-2 px-3 mt-3 cursor_pointer">Choose File</label>
                                            <input type="file" id="site_logo" name="logo_path" class="file-input" accept=".png, .jpg, .webp">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="mt-3">
                            <div class="update_btn mt-2 w-100">
                                <button id="updateSiteLogo" type="submit" class="btn_update shadow textuppercase">SAVE</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- SECOND CHILD  -->
                <!-- <div class="col-lg-4 col-md-4 col-sm-8 col-12 mx-auto my-2">
                    <div class="bg-white p-3 shadow-lg rounded-3 cardHoverEffect">
                        <h4 class="profile_form_heading">Site White Logo</h4>
                        <form class="user-select-none">
                            <div class="row personal_info my-3">
                                <div class="profile_photo mt-3">
                                    <div class="profile-pic">
                                        <div>
                                            <div class="logo-previewer overflow-hidden">
                                                <img class="white_logoPreview h-auto w-100" src="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->white_logo_path) }}" alt="Preview">
                                            </div>
                                            <label for="white_logo" class="file-label bg-label-primary mt-3 d-inline-block  rounded-pill p-2 px-3 mt-3 cursor_pointer">Choose File</label>
                                            <input type="file" id="white_logo" class="file-input" accept="image/*">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="mt-3">
                            <div class="update_btn mt-4">
                                <button id="updateSiteWhiteLogo" class="btn_update shadow textuppercase">SAVE</button>
                            </div>
                        </form>
                    </div>
                </div> -->
                <!-- THIRD CHILFD  -->
                <div class="col-lg-6 col-md-6 col-sm-10 col-12 mx-auto my-2">
                    <div class=" bg-white p-3 shadow-lg rounded-3 cardHoverEffect" >
                        <h3 class="profile_form_heading text-center text-primary">Site Favicon</h3>
                        <form class="user-select-none" action="{{ route('update_favicon') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                            <div class="row personal_info my-3">
                                <div class="profile_photo mt-3">
                                    <div class="profile-pic">
                                        <div>
                                            <div class="logo-previewer overflow-hidden">
                                                <img class="favicon_logoPreview h-auto w-100" src="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}" alt="Preview">
                                            </div>
                                            <label for="favicon_logo" class="file-label bg-label-primary mt-3 d-inline-block  rounded-pill p-2 px-3 mt-3 cursor_pointer">Choose File</label>
                                            <input type="file" id="favicon_logo" name="favicon_path" class="file-input" accept=".png, .jpg, .webp">
                                        </div>
                                    </div>
                                </div>
                            </div>
                           <hr class="mt-3">
                            <div class="update_btn mt-4 rounded-5">
                                <button id="updateSiteFavicon" type="submit" class="btn_update shadow textuppercase">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <hr class="my-5">
        </div>
    <div class="setting-intro mb-5" >
         <div class="row m-0 align-items-center  rounded-5 shadow p-3 mx-4" style="background:linear-gradient(49deg, #198d5d, #00d47c)">
            <div class="col-lg-6 col-md-8 col-sm-12 py-3">
                <h2 class="text-white">Settings</h2>
                <p class="fs-5 text-white">
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Reprehenderit minima exercitationem iste repellat eveniet, totam, esse sint magni maiores quisquam error facere saepe quos voluptatem expedita nobis modi assumenda maxime!
                </p>
            </div>
            <div class="col-lg-6 col-md-8 col-sm-12">
                <img src="{{url('images/Settings-image.png')}}" width="500" height="auto" class="img-fluid" alt="">
            </div>
         </div>
    </div>
    <!-- Layout wrapper -->
    <div class="container">
        <div class="d-flex justify-content-center align-items-center py-3 mb-4">
            <span>
                <h2 class="text-dark  m-0 text-center">Keywords Settings</h2>
            </span>
        </div>
        <!-- Keyword setting form  -->
        <div class="profile_form shadow-lg mx-3">
            <form class="user-select-none" action="{{ route('update_keyword') }}" method="POST">
                @csrf
               <div class="row">
                  <div class="col-lg-6 col-md-8 col-sm-12">
                        <div class="my-3 mb-lg-3 mb-md-3 mb-4">
                            <!-- keywords  -->
                            <h5 for="exampleInputEmail1" class="label_heading mt-3">Home page keywords</h5>
                           <input type="text" class="bg-body-tertiary border-0 form-control p-3 shadow-sm" id="home_keywords" name="home_keywords"  required  placeholder="write keywords here.." value="{{ app(\App\Settings\KeywordsSettings::class)->keywords['home_keywords'] ?? '--' }}">
                        </div>
                        <div class="my-3 mb-lg-3 mb-md-3 mb-4">
                            <!-- keywords  -->
                            <h5 for="exampleInputEmail1" class="label_heading mt-3">Pricing page keywords</h5>
                            <input type="text" class="bg-body-tertiary border-0 form-control p-3 shadow-sm" id="pricing_keywords" name="pricing_keywords" required placeholder="write keywords here.." value="{{ app(\App\Settings\KeywordsSettings::class)->keywords['pricing_keywords'] ?? '--' }}">
                        </div>
                        <div class="my-3 mb-lg-3 mb-md-3 mb-4">
                            <!-- keywords  -->
                            <h5 for="exampleInputEmail1" class="label_heading mt-3">Explore page keywords</h5>
                            <input type="text" class="bg-body-tertiary border-0 form-control p-3 shadow-sm" id="explore_keywords" name="explore_keywords" required placeholder="write keywords here.." value="{{ app(\App\Settings\KeywordsSettings::class)->keywords['explore_keywords'] ?? '--' }}">
                        </div>
                        <div class="my-3 mb-lg-3 mb-md-3 mb-4">
                        <!-- keywords  -->
                        <h5 for="exampleInputEmail1" class="label_heading mt-3">Teacher page keywords</h5>
                        <input type="text" class="bg-body-tertiary border-0 form-control p-3 shadow-sm" id="teacher_keywords" name="teacher_keywords" required placeholder="write keywords here.." value="{{ app(\App\Settings\KeywordsSettings::class)->keywords['teacher_keywords'] ?? '--' }}">
                        </div>
                        <div class="my-3 mb-lg-3 mb-md-3 mb-4">
                        <!-- keywords  -->
                            <h5 for="exampleInputEmail1" class="label_heading mt-3">Subject page keywords</h5>
                            <input type="text" class="bg-body-tertiary border-0 form-control p-3 shadow-sm" id="ssubject_keywords" name="subject_keywords"  required placeholder="write keywords here.." value="{{ app(\App\Settings\KeywordsSettings::class)->keywords['subject_keywords'] ?? '--' }}">
                        </div>
                        <div class="my-3 mb-lg-3 mb-md-3 mb-4">
                            <!-- keywords  -->
                            <h5 for="exampleInputEmail1" class="label_heading mt-3">Topic page keywords</h5>
                            <input type="text" class="bg-body-tertiary border-0 form-control p-3 shadow-sm" id="topic_keywords" name="topic_keywords" required placeholder="write keywords here.." value="{{ app(\App\Settings\KeywordsSettings::class)->keywords['topic_keywords'] ?? '--' }}">
                        </div>
                        <div class="my-3 mb-lg-3 mb-md-3 mb-4">
                            <!-- keywords  -->
                            <h5 for="exampleInputEmail1" class="label_heading mt-3">sub-topic page keywords</h5>
                            <input type="text" class="bg-body-tertiary border-0 form-control p-3 shadow-sm" id="subtopic_keywords" name="subtopic_keywords" required  placeholder="write keywords here.." value="{{ app(\App\Settings\KeywordsSettings::class)->keywords['subtopic_keywords'] ?? '--' }}">
                        </div>
                   </div>
                  <div class="col-lg-6 col-md-8 col-sm-12">
                        <div class="my-3 mb-lg-3 mb-md-3 mb-4">
                            <!-- keywords  -->
                            <h5 for="exampleInputEmail1" class="label_heading mt-3">Blogs page keywords</h5>
                            <input type="text" class="bg-body-tertiary border-0 form-control p-3 shadow-sm" id="blogs_keywords" name="blogs_keywords" required placeholder="write keywords here.." value="{{ app(\App\Settings\KeywordsSettings::class)->keywords['blogs_keywords'] ?? '--' }}">
                        </div>
                        <div class="my-3 mb-lg-3 mb-md-3 mb-4">
                            <!-- keywords  -->
                            <h5 for="exampleInputEmail1" class="label_heading mt-3">About page keywords</h5>
                            <input type="text" class="bg-body-tertiary border-0 form-control p-3 shadow-sm" id="about_keywords" name="about_keywords" required placeholder="write keywords here.." value="{{ app(\App\Settings\KeywordsSettings::class)->keywords['about_keywords'] ?? '--' }}">
                        </div>
                        <div class="my-3 mb-lg-3 mb-md-3 mb-4">
                            <!-- keywords  --> 
                            <h5 for="exampleInputEmail1" class="label_heading mt-3">Contact page keywords</h5>
                            <input type="text" class="bg-body-tertiary border-0 form-control p-3 shadow-sm" id="contact_keywords" name="contact_keywords" required placeholder="write keywords here.." value="{{ app(\App\Settings\KeywordsSettings::class)->keywords['contact_keywords'] ?? '--' }}">
                        </div>
                        <div class="my-3 mb-lg-3 mb-md-3 mb-4">
                            <!-- keywords  -->
                            <h5 for="exampleInputEmail1" class="label_heading mt-3">Help page keywords</h5>
                            <input type="text" class="bg-body-tertiary border-0 form-control p-3 shadow-sm" id="help_keywords" name="help_keywords"  required placeholder="write keywords here.." value="{{ app(\App\Settings\KeywordsSettings::class)->keywords['help_keywords'] ?? '--' }}}">
                        </div>
                        <div class="my-3 mb-lg-3 mb-md-3 mb-4">
                            <!-- keywords  -->
                            <h5 for="exampleInputEmail1" class="label_heading mt-3">School page keywords</h5>
                            <input type="text" class="bg-body-tertiary border-0 form-control p-3 shadow-sm" id="school_keywords" name="school_keywords" required placeholder="write keywords here.." value="{{ app(\App\Settings\KeywordsSettings::class)->keywords['school_keywords'] ?? '--' }}">
                        </div>
                        <div class="my-3 mb-lg-3 mb-md-3 mb-4">
                            <!-- keywords  -->
                            <h5 for="exampleInputEmail1" class="label_heading mt-3">All school page keywords</h5>
                            <input type="text" class="bg-body-tertiary border-0 form-control p-3 shadow-sm" id="school-list_keywords" name="school-list_keywords" required placeholder="write keywords here.." value="{{ app(\App\Settings\KeywordsSettings::class)->keywords['school-list_keywords'] ?? '--' }}">
                        </div>
                        <div class="my-3 mb-lg-3 mb-md-3 mb-4">
                            <!-- keywords  -->
                            <h5 for="exampleInputEmail1" class="label_heading mt-3">Region page keywords</h5>
                            <input type="text" class="bg-body-tertiary border-0 form-control p-3 shadow-sm" id="school-list_keywords" name="region_keywords" required placeholder="write keywords here.." value="{{ app(\App\Settings\KeywordsSettings::class)->keywords['region_keywords'] ?? '--' }}">
                        </div>
                  </div>
               </div>
                <div class="my-3 mb-lg-3 mb-md-3 mb-4">
                    <!-- keywords  -->
                    <h5 for="exampleInputEmail1" class="label_heading mt-3">Default keywords</h5>
                    <input type="text" class="bg-body-tertiary border-0 form-control p-3 shadow-sm" id="default_keywords" name="default_keywords"  required  placeholder="write keywords here.." value="{{ app(\App\Settings\KeywordsSettings::class)->keywords['default_keywords'] ?? '--' }}">
                </div>
                <!-- Save button  -->
                <div class="update_btn">
                    <button id="updateKeyword" class="btn btn-primary btn-lg shadow text-uppercase">Update</button>
                </div>
            </form>
        </div>
        <div class="d-flex justify-content-center align-items-center py-3 mb-4 py-3 mt-5">
            <span>
                <h2 class="text-dark m-0 text-center ">Title Settings</h2>
            </span>
        </div>
        <div class="profile_form shadow-lg">
            <form class="user-select-none" action="{{ route('update_title') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                        <div class="my-3">
                            <!-- titles  -->
                            <h5 for="exampleInputEmail1" class="label_heading mt-3">Home page title</h5>
                            <input type="text" class="bg-body-tertiary border-0 form-control p-3 shadow-sm" id="home_title" name="home_title"  required  placeholder="write title here.." value="{{ app(\App\Settings\keywordsSettings::class)->title['home_title'] ?? '--' }}">
                        </div>
                        <div class="my-3">
                            <!-- titles  -->
                            <h5 for="exampleInputEmail1" class="label_heading mt-3">Pricing page title</h5>
                            <input type="text" class="bg-body-tertiary border-0 form-control p-3 shadow-sm" id="pricing_title" name="pricing_title" required placeholder="write title here.." value="{{ app(\App\Settings\keywordsSettings::class)->title['pricing_title'] ?? '--' }}">
                        </div>
                        <div class="my-3">
                            <!-- titles  -->
                            <h5 for="exampleInputEmail1" class="label_heading mt-3">Explore page title</h5>
                            <input type="text" class="bg-body-tertiary border-0 form-control p-3 shadow-sm" id="explore_title" name="explore_title" required placeholder="write title here.." value="{{ app(\App\Settings\keywordsSettings::class)->title['explore_title'] ?? '--' }}">
                        </div>
                        <div class="my-3">
                        <!-- titles  -->
                            <h5 for="exampleInputEmail1" class="label_heading mt-3">Teacher page title</h5>
                            <input type="text" class="bg-body-tertiary border-0 form-control p-3 shadow-sm" id="teacher_title" name="teacher_title" required placeholder="write title here.." value="{{ app(\App\Settings\keywordsSettings::class)->title['teacher_title'] ?? '--' }}">
                            </div>
                        <div class="my-3">
                            <!-- titles  -->
                            <h5 for="exampleInputEmail1" class="label_heading mt-3">Blogs page title</h5>
                            <input type="text" class="bg-body-tertiary border-0 form-control p-3 shadow-sm" id="blogs_title" name="blogs_title" required placeholder="write title here.." value="{{ app(\App\Settings\keywordsSettings::class)->title['blogs_title'] ?? '--' }}">
                        </div>
                        <div class="my-3">
                            <!-- titles  -->
                            <h5 for="exampleInputEmail1" class="label_heading mt-3">About page title</h5>
                            <input type="text" class="bg-body-tertiary border-0 form-control p-3 shadow-sm" id="about_title" name="about_title" required placeholder="write title here.." value="{{ app(\App\Settings\keywordsSettings::class)->title['about_title'] ?? '--' }}">
                        </div>
                        <div class="my-3">
                            <!-- titles  -->
                            <h5 for="exampleInputEmail1" class="label_heading mt-3">sub-topic page title</h5>
                            <input type="text" class="bg-body-tertiary border-0 form-control p-3 shadow-sm" id="subtopic_title" name="subtopic_title" required  placeholder="write title here.." value="{{ app(\App\Settings\keywordsSettings::class)->title['subtopic_title'] ?? '--' }}">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-8 col-sm-12">
                       <div class="my-3">
                    <!-- titles  --> 
                            <h5 for="exampleInputEmail1" class="label_heading mt-3">Contact page title</h5>
                            <input type="text" class="bg-body-tertiary border-0 form-control p-3 shadow-sm" id="contact_title" name="contact_title" required placeholder="write title here.." value="{{ app(\App\Settings\keywordsSettings::class)->title['contact_title'] ?? '--' }}">
                        </div>
                        <div class="my-3">
                            <!-- titles  -->
                            <h5 for="exampleInputEmail1" class="label_heading mt-3">Help page title</h5>
                            <input type="text" class="bg-body-tertiary border-0 form-control p-3 shadow-sm" id="help_title" name="help_title"  required placeholder="write title here.." value="{{ app(\App\Settings\keywordsSettings::class)->title['help_title'] ?? '--' }}}">
                        </div>
                        <div class="my-3">
                            <!-- titles  -->
                            <h5 for="exampleInputEmail1" class="label_heading mt-3">School page title</h5>
                            <input type="text" class="bg-body-tertiary border-0 form-control p-3 shadow-sm" id="school_title" name="school_title" required placeholder="write title here.." value="{{ app(\App\Settings\keywordsSettings::class)->title['school_title'] ?? '--' }}">
                        </div>
                        <div class="my-3">
                            <!-- titles  -->
                            <h5 for="exampleInputEmail1" class="label_heading mt-3">All school page title</h5>
                            <input type="text" class="bg-body-tertiary border-0 form-control p-3 shadow-sm" id="school-list_title" name="school-list_title" required placeholder="write title here.." value="{{ app(\App\Settings\keywordsSettings::class)->title['school-list_title'] ?? '--' }}">
                        </div>
                        <div class="my-3">
                            <!-- titles  -->
                            <h5 for="exampleInputEmail1" class="label_heading mt-3">Region page title</h5>
                            <input type="text" class="bg-body-tertiary border-0 form-control p-3 shadow-sm" id="school-list_title" name="region_title" required placeholder="write title here.." value="{{ app(\App\Settings\keywordsSettings::class)->title['region_title'] ?? '--' }}">
                        </div>
                        <div class="my-3">
                            <!-- titles  -->
                            <h5 for="exampleInputEmail1" class="label_heading mt-3">Subject page title</h5>
                            <input type="text" class="bg-body-tertiary border-0 form-control p-3 shadow-sm" id="ssubject_title" name="subject_title"  required placeholder="write title here.." value="{{ app(\App\Settings\keywordsSettings::class)->title['subject_title'] ?? '--' }}">
                        </div>
                        <div class="my-3">
                            <!-- titles  -->
                            <h5 for="exampleInputEmail1" class="label_heading mt-3">Topic page title</h5>
                            <input type="text" class="bg-body-tertiary border-0 form-control p-3 shadow-sm" id="topic_title" name="topic_title" required placeholder="write title here.." value="{{ app(\App\Settings\keywordsSettings::class)->title['topic_title'] ?? '--' }}">
                        </div>
                    </div>
                </div>

                <div class="my-3">
                    <!-- titles  -->
                    <h5 for="exampleInputEmail1" class="label_heading mt-3">Default title</h5>
                    <input type="text" class="bg-body-tertiary border-0 form-control p-3 shadow-sm" id="default_title" name="default_title"  required  placeholder="write title here.." value="{{ app(\App\Settings\keywordsSettings::class)->title['default_title'] ?? '--' }}">
                </div>
                <!-- Save button  -->
                <div class="update_btn">
                    <button id="updateTitle" type="submit" class="btn_update shadow textuppercase">SAVE</button>
                </div>
            </form>
        </div>

        <div class="d-flex justify-content-center align-items-center py-3 mb-4 py-3 mt-5">
            <span>
                <h2 class="text-dark m-0">Description Settings</h2>
            </span>
        </div>
        <div class="profile_form shadow-lg">
            <form class="user-select-none" action="{{ route('update_description') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                        <div class="my-3">
                        <!-- description  -->
                            <h5 for="exampleInputEmail1" class="label_heading mt-3">Home page description</h5>
                            <input type="text" class="bg-body-tertiary border-0 form-control p-3 shadow-sm" id="home_description" name="home_description"  required  placeholder="write description here.." value="{{ app(\App\Settings\keywordsSettings::class)->description['home_description'] ?? '--' }}">
                        </div>
                        <div class="my-3">
                            <!-- description -->
                            <h5 for="exampleInputEmail1" class="label_heading mt-3">Pricing page description</h5>
                            <input type="text" class="bg-body-tertiary border-0 form-control p-3 shadow-sm" id="pricing_description" name="pricing_description" required placeholder="write title here.." value="{{ app(\App\Settings\keywordsSettings::class)->description['pricing_description'] ?? '--' }}">
                        </div>
                        <div class="my-3">
                            <!-- description -->
                            <h5 for="exampleInputEmail1" class="label_heading mt-3">Explore page description</h5>
                            <input type="text" class="bg-body-tertiary border-0 form-control p-3 shadow-sm" id="explore_description" name="explore_description" required placeholder="write title here.." value="{{ app(\App\Settings\keywordsSettings::class)->description['explore_description'] ?? '--' }}">
                        </div>
                        <div class="my-3">
                        <!-- description -->
                        <h5 for="exampleInputEmail1" class="label_heading mt-3">Teacher page description</h5>
                        <input type="text" class="bg-body-tertiary border-0 form-control p-3 shadow-sm" id="teacher_description" name="teacher_description" required placeholder="write description here.." value="{{ app(\App\Settings\keywordsSettings::class)->description['teacher_description'] ?? '--' }}">
                        </div>
                        <div class="my-3">
                            <!-- description -->
                            <h5 for="exampleInputEmail1" class="label_heading mt-3">Blogs page description</h5>
                            <input type="text" class="bg-body-tertiary border-0 form-control p-3 shadow-sm" id="blogs_description" name="blogs_description" required placeholder="write description here.." value="{{ app(\App\Settings\keywordsSettings::class)->description['blogs_description'] ?? '--' }}">
                        </div>
                        <div class="my-3">
                            <!-- description -->
                            <h5 for="exampleInputEmail1" class="label_heading mt-3">About page description</h5>
                            <input type="text" class="bg-body-tertiary border-0 form-control p-3 shadow-sm" id="about_description" name="about_description" required placeholder="write description here.." value="{{ app(\App\Settings\keywordsSettings::class)->description['about_description'] ?? '--' }}">
                        </div>
                        <div class="my-3">
                            <!-- description  -->
                            <h5 for="exampleInputEmail1" class="label_heading mt-3">Contact page description</h5>
                            <input type="text" class="bg-body-tertiary border-0 form-control p-3 shadow-sm" id="contact_description" name="contact_description" required placeholder="write description here.." value="{{ app(\App\Settings\keywordsSettings::class)->description['contact_description'] ?? '--' }}">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-8 col-sm-12">
                        <div class="my-3">
                        <!-- description -->
                            <h5 for="exampleInputEmail1" class="label_heading mt-3">Help page description</h5>
                            <input type="text" class="bg-body-tertiary border-0 form-control p-3 shadow-sm" id="help_description" name="help_description"  required placeholder="write description here.." value="{{ app(\App\Settings\keywordsSettings::class)->description['help_description'] ?? '--' }}}">
                        </div>
                        <div class="my-3">
                            <!-- description -->
                            <h5 for="exampleInputEmail1" class="label_heading mt-3">School page description</h5>
                            <input type="text" class="bg-body-tertiary border-0 form-control p-3 shadow-sm" id="school_description" name="school_description" required placeholder="write description here.." value="{{ app(\App\Settings\keywordsSettings::class)->description['school_description'] ?? '--' }}">
                        </div>
                        <div class="my-3">
                            <!-- description -->
                            <h5 for="exampleInputEmail1" class="label_heading mt-3">All school page description</h5>
                            <input type="text" class="bg-body-tertiary border-0 form-control p-3 shadow-sm" id="school-list_description" name="school-list_description" required placeholder="write description here.." value="{{ app(\App\Settings\keywordsSettings::class)->description['school-list_description'] ?? '--' }}">
                        </div>
                        <div class="my-3">
                            <!-- description -->
                            <h5 for="exampleInputEmail1" class="label_heading mt-3">Region page description</h5>
                            <input type="text" class="bg-body-tertiary border-0 form-control p-3 shadow-sm" id="school-list_description" name="region_description" required placeholder="write description here.." value="{{ app(\App\Settings\keywordsSettings::class)->description['region_description'] ?? '--' }}">
                        </div>
                        <div class="my-3">
                            <!-- description -->
                            <h5 for="exampleInputEmail1" class="label_heading mt-3">Subject page description</h5>
                            <input type="text" class="bg-body-tertiary border-0 form-control p-3 shadow-sm" id="ssubject_description" name="subject_description"  required placeholder="write description here.." value="{{ app(\App\Settings\keywordsSettings::class)->description['subject_description'] ?? '--' }}">
                        </div>
                        <div class="my-3">
                            <!-- description -->
                            <h5 for="exampleInputEmail1" class="label_heading mt-3">Topic page description</h5>
                            <input type="text" class="bg-body-tertiary border-0 form-control p-3 shadow-sm" id="topic_description" name="topic_description" required placeholder="write description here.." value="{{ app(\App\Settings\keywordsSettings::class)->description['topic_description'] ?? '--' }}">
                        </div>
                        <div class="my-3">
                            <!-- description -->
                            <h5 for="exampleInputEmail1" class="label_heading mt-3">sub-topic page description</h5>
                            <input type="text" class="bg-body-tertiary border-0 form-control p-3 shadow-sm" id="subtopic_description" name="subtopic_description" required  placeholder="write description here.." value="{{ app(\App\Settings\keywordsSettings::class)->description['subtopic_description'] ?? '--' }}">
                        </div>
                    </div>
                </div>
                
                
                <div class="my-3">
                    <!-- description -->
                    <h5 for="exampleInputEmail1" class="label_heading mt-3">Default description</h5>
                    <input type="text" class="bg-body-tertiary border-0 form-control p-3 shadow-sm" id="default_description" name="default_description"  required  placeholder="write description here.." value="{{ app(\App\Settings\keywordsSettings::class)->description['default_description'] ?? '--' }}">
                </div>
                <!-- Save button  -->
                <div class="update_btn">
                    <button id="updateDescription" type="submit" class="btn_update shadow textuppercase">SAVE</button>
                </div>
            </form>
        </div>
        @include('parentsidebar.sidebarending')

    <script>
        $(document).ready(function () {
            $("#enable_disable_check").click(function () {
                if ($(this).is(':checked')) {
                    $(".enable_disable_text").html('Enable')
                }
                else {
                    $(".enable_disable_text").html('Disable')
                }
            });
            $('#favicon_logo').on('change', function(e) {
                const file = e.target.files[0];
                const reader = new FileReader();
                reader.onload = function() {
                    $('.favicon_logoPreview').attr('src', reader.result );
                };
                reader.readAsDataURL(file);
            });
            $('#site_logo').on('change', function(e) {
                const file = e.target.files[0];
                const reader = new FileReader();
                reader.onload = function() {
                    $('.site_logoPreview').attr('src', reader.result );
                };
                reader.readAsDataURL(file);
            });
            $('#white_logo').on('change', function(e) {
                const file = e.target.files[0];
                const reader = new FileReader();
                reader.onload = function() {
                    $('.white_logoPreview').attr('src', reader.result );
                };
                reader.readAsDataURL(file);
            });
        });
        $("#updateSiteSettings").click(function(e){
            e.preventDefault();
            let appName = $("#app_name").val();
            let tagLine = $("#app_slogan").val();
            let seoDescription = $("#short_description").val();
            let canRegister = $("#enable_disable_check").is(':checked');
            $.ajax({
                type: "POST",
                url: '/admin/update-site-settings',
                data: {
                    app_name: appName,
                    tag_line: tagLine,
                    seo_description: seoDescription,
                    can_register: canRegister,
                    _token: '{{ csrf_token() }}'
                },
                success: function (data) {
                    $(".layout-page").scrollTop(0);
                    $("#pageMessage").empty();
                    if(data.success){
                        $("#pageMessage").append('<div class="alert alert-success text-black">'+data.message+'</div>');
                    } else {
                        $("#pageMessage").append('<div class="alert alert-danger ">'+data.message+'</div>');
                    }
                    $("#app_name").val(data.settings.app_name);
                    $("#app_slogan").val(data.settings.tag_line);
                    $("#short_description").val(data.settings.seo_description);
                    if(data.settings.can_register){
                        $('#enable_disable_check').prop('checked', true);
                        $(".enable_disable_text").text('Enable');
                    } else {
                        $('#enable_disable_check').prop('checked', false);
                        $(".enable_disable_text").text('Disable');
                    }
                },
                error: function (data, textStatus, errorThrown) {
                    console.log(data);
                },
            });
        });
    </script>

</body>

</html>
