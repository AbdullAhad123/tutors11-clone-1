<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/"
    data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Settings</title>
    <!-- rel icon -->
    <link rel="icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}">
    <meta name="description" content="{{ app(\App\Settings\SiteSettings::class)->seo_description }}">
    <meta name="author" content="{{ app(\App\Settings\SiteSettings::class)->app_name }}">
    <style>
        .fs-13{
            font-size:13px;
        }
        .active_child {
            color: #696cff !important;
        }

        .row_bg_light {
            background-color: #f1f1f1 !important;
        }

        .placeholder_text::placeholder {
            color: #a4a4a4;
            font-size: 0.9rem;
        }

        html {
            overflow-x: hidden;
            -webkit-overflow-scrolling: scroll
        }

        .profile_form {
            max-width: 1024px;
            max-height: fit-content;
            margin: auto;
            border-radius: 10px;
            padding: 2rem 3rem 2rem 3rem;
        }

        .profile_form_heading {
            color: #1f1f1f
        }

        .label_heading {
            font-size: 1rem;
            margin-top: 2rem;
            color: #1f1f1f
        }

        .personal_info {
            display: flex;
            justify-content: space-evenly;
            align-items: center;
            flex-wrap: wrap;
            margin-top: 1rem
        }

        .form_control {
            width: 100%;
            background-color: transparent;
            border-radius: 5px;
            border: 1.5px solid #595959;
            transition: .3s
        }

        .form_control:focus {
            box-shadow: 0 0 5px 1px #4056ffa1
        }

        .update_btn {
            text-align: end
        }

        .btn_disable {
            background-color: #ff3434;
            color: #fff;
            border: 1px solid #ff3434;
            padding: .5rem 1.5rem .5rem 1.5rem;
            border-radius: 5px;
            transition: .3s
        }

        .btn_update {
            background-color: #696cff;
            color: #fff;
            border: 1px solid #696cff;
            padding: .5rem 1.5rem .5rem 1.5rem;
            border-radius: 5px;
            transition: .3s
        }

        .btn_update:hover {
            background-color: #5558e0
        }

        @media (max-width:425px) {
            .profile_form {
                padding: 1rem
            }

            .btn_update {
                font-size: .8rem !important
            }

            .btn_disable {
                font-size: .8rem !important;
                margin-top: .5rem
            }
        }

        .profile-pic {
            color: transparent;
            transition: all .3s ease;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            transition: all .3s ease;
            width: fit-content;
            margin: auto
        }

        .profile-pic input {
            display: none
        }


        .profile-pic .-label {
            cursor: pointer;
            height: 120px;
            width: 120px
        }

        .profile-pic:hover .-label {
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: rgba(0, 0, 0, .8);
            z-index: 10000;
            transition: background-color .2s ease-in-out;
            border-radius: 100px;
            margin-bottom: 0
        }

        .profile-pic span {
            display: inline-flex;
            padding: .2em;
            height: 2em
        }

        @keyframes circle-chart-fill {
            to {
                stroke-dasharray: 0 100
            }
        }

        @keyframes circle-chart-appear {
            to {
                opacity: 1;
                transform: translateY(0)
            }
        }

        .file-input {
            display: none;
        }

        .file-label {
            cursor: pointer;
        }

        .logo-previewer {
            display: flex;
            justify-content: start;
            align-items: center;
            width: 270px;
            height: 270px;
            border-radius: 10px;
            overflow: hidden;
            background-color: #eee;
        }

        .logo-previewer img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        ul#mytab::-webkit-scrollbar {
            height: 2px !important
        }

        .nav-tabs .nav-link.active, .nav-tabs .nav-item.show .nav-link {
            color: #007eff !important;
            border-bottom: 2px solid #007eff !important;
        }

        li.nav-item > button {
            width: 100px !important;
        }
    </style>
</head>

<body>
    @include('sidebar')
    @include('header')

    @if (Session::has('success'))
        <div class="alert_success rounded-3 p-3 d-flex align-items-center my-4"><i class='bx bx-check-circle me-1 fs-5'></i>{{Session::get('success')}}</div>
    @endif
    
    @if (Session::has('errorMessage'))
        <div class="alert_failed rounded-3 p-3 d-flex align-items-center my-4"><i class='bx bx-x-circle me-1 fs-5'></i>{{Session::get('errorMessage')}}</div>
    @endif

    <!-- mian container  -->
    <section class="p-4">
    
        <div class="my-4">
            <h1 class="text-dark h2 my-3">Website Settings</h1>
            <p class="text-dark fs-5 my-2">Effortlessly oversee the entire website with just a click. Manage content and actions on the website through the Website Settings.</p>
        </div>

        <div class="bg-white p-2 my-4 rounded shadow overflow-auto">
            <ul class="nav nav-tabs py-2 d-flex flex-nowrap overflow-auto justify-content-lg-around justify-content-md-around justify-content-start" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link p-2 px-3 bg-transparent active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Home</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link p-2 px-3 bg-transparent" id="top_bar-tab" data-bs-toggle="tab" data-bs-target="#top_bar-tab-pane" type="button" role="tab" aria-controls="top_bar-tab-pane" aria-selected="false">Topbar</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link p-2 px-3 bg-transparent" id="hero-tab" data-bs-toggle="tab" data-bs-target="#hero-tab-pane" type="button" role="tab" aria-controls="hero-tab-pane" aria-selected="false">Hero</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link p-2 px-3 bg-transparent" id="features-tab" data-bs-toggle="tab" data-bs-target="#features-tab-pane" type="button" role="tab" aria-controls="features-tab-pane" aria-selected="false">Features</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link p-2 px-3 bg-transparent" id="category-tab" data-bs-toggle="tab" data-bs-target="#category-tab-pane" type="button" role="tab" aria-controls="category-tab-pane" aria-selected="false">Category</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link p-2 px-3 bg-transparent" id="statistics-tab" data-bs-toggle="tab" data-bs-target="#statistics-tab-pane" type="button" role="tab" aria-controls="statistics-tab-pane" aria-selected="false">Statistics</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link p-2 px-3 bg-transparent" id="testimonial-tab" data-bs-toggle="tab" data-bs-target="#testimonial-tab-pane" type="button" role="tab" aria-controls="testimonial-tab-pane" aria-selected="false">Testimonial</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link p-2 px-3 bg-transparent" id="services-tab" data-bs-toggle="tab" data-bs-target="#services-tab-pane" type="button" role="tab" aria-controls="services-tab-pane" aria-selected="false">Service</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link p-2 px-3 bg-transparent" id="help-tab" data-bs-toggle="tab" data-bs-target="#help-tab-pane" type="button" role="tab" aria-controls="help-tab-pane" aria-selected="false">Help</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link p-2 px-3 bg-transparent" id="teacher-tab" data-bs-toggle="tab" data-bs-target="#teacher-tab-pane" type="button" role="tab" aria-controls="teacher-tab-pane" aria-selected="false">Teacher</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link p-2 px-3 bg-transparent" id="about-tab" data-bs-toggle="tab" data-bs-target="#about-tab-pane" type="button" role="tab" aria-controls="about-tab-pane" aria-selected="false">About</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link p-2 px-3 bg-transparent" id="footer-tab" data-bs-toggle="tab" data-bs-target="#footer-tab-pane" type="button" role="tab" aria-controls="footer-tab-pane" aria-selected="false">Footer</button>
                </li>
            </ul>
        </div>
        
        <div class="tab-content p-0 my-5" id="myTabContent">
            <div class="tab-pane bg-white shadow my-4 p-2 rounded-3 fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                <div class="profile_form">
                    <!-- hompage settings -->
                    <form action="{{ route('update_home_page_settings') }}" method="POST">
                    @csrf
                        <h5 class="text-dark font_bold m-0">Home Page Settings</h5>
                        <div class="mt-5 mb-4">
                            @if($homePageSettings['enable_top_bar'] == true)
                                <div class="row m-0 align-items-center justify-content-between">
                                    <div class="col-10 labelParent">
                                        <label for="name" class="text-dark  ">
                                            Enable Top Bar (<span class="enable_disable_text" data-id="3">Enabled</span>)
                                        </label>
                                    </div>
                                    <div class="col-2 inputParent">
                                        <div class="form-check form-switch text-center">
                                            <input class="form-check-input shadow-none border border-dark btn-lg enabled_text"
                                                type="checkbox" role="switch" id="enabled_text" name="enable_top_bar" checked>
                                        </div>
                                    </div>
                                </div>
                            @else 
                                <div class="row m-0 align-items-center justify-content-between">
                                    <div class="col-10 labelParent">
                                        <label for="name" class="text-dark  ">
                                            Enable Top Bar (<span class="enable_disable_text" data-id="3">Disabled</span>)
                                        </label>
                                    </div>
                                    <div class="col-2 inputParent">
                                        <div class="form-check form-switch text-center">
                                            <input class="form-check-input shadow-none border border-dark btn-lg enabled_text"
                                                type="checkbox" role="switch" id="enabled_text" name="enable_top_bar">
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="my-4">
                            @if($homePageSettings['enable_hero'] == true)
                                <div class="row m-0 align-items-center justify-content-between">
                                    <div class="col-10 labelParent">
                                        <label for="name" class="text-dark  ">
                                            <!-- printing -->
                                            Enable Hero(<span class="enable_disable_text">Enabled</span>)
                                        </label>
                                    </div>
                                    <div class="col-2 inputParent">
                                        <div class="form-check form-switch text-center">
                                            <input class="form-check-input shadow-none border border-dark btn-lg enabled_text"
                                                type="checkbox" role="switch" id="enabled_text" name="enable_hero" checked>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="row m-0 align-items-center justify-content-between">
                                    <div class="col-10 labelParent">
                                        <label for="name" class="text-dark">
                                            <!-- printing -->
                                            Enable Hero(<span class="enable_disable_text">Disabled</span>)
                                        </label>
                                    </div>
                                    <div class="col-2 inputParent">
                                        <div class="form-check form-switch text-center">
                                            <input class="form-check-input shadow-none border border-dark btn-lg enabled_text"
                                                type="checkbox" role="switch" id="enabled_text" name="enable_hero">
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="my-4">
                            @if($homePageSettings['enable_features'] == true)
                                <div class="row m-0 align-items-center justify-content-between">
                                    <div class="col-10 labelParent">
                                        <label for="name" class="text-dark  ">
                                            <!-- printing -->
                                            Enable Features (<span class="enable_disable_text">Enabled</span>)
                                        </label>
                                    </div>
                                    <div class="col-2 inputParent">
                                        <div class="form-check form-switch text-center">
                                            <input class="form-check-input shadow-none border border-dark btn-lg enabled_text"
                                                type="checkbox" role="switch" id="enabled_text" name="enable_features" checked>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="row m-0 align-items-center justify-content-between">
                                    <div class="col-10 labelParent">
                                        <label for="name" class="text-dark  ">
                                            <!-- printing -->
                                            Enable Features (<span class="enable_disable_text">Disabled</span>)
                                        </label>
                                    </div>
                                    <div class="col-2 inputParent">
                                        <div class="form-check form-switch text-center">
                                            <input class="form-check-input shadow-none border border-dark btn-lg enabled_text"
                                                type="checkbox" role="switch" id="enabled_text" name="enable_features">
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="my-4">
                            @if($homePageSettings['enable_categories'] == true)
                                <div class="row m-0 align-items-center justify-content-between">
                                    <div class="col-10 labelParent">
                                        <label for="name" class="text-dark  ">
                                            <!-- printing -->
                                            Enable Categories (<span class="enable_disable_text">Enabled</span>)
                                        </label>
                                    </div>
                                    <div class="col-2 inputParent">
                                        <div class="form-check form-switch text-center">
                                            <input class="form-check-input shadow-none border border-dark btn-lg enabled_text"
                                                type="checkbox" role="switch" id="enabled_text" name="enable_categories" checked>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="row m-0 align-items-center justify-content-between">
                                    <div class="col-10 labelParent">
                                        <label for="name" class="text-dark  ">
                                            <!-- printing -->
                                            Enable Categories (<span class="enable_disable_text">Disabled</span>)
                                        </label>
                                    </div>
                                    <div class="col-2 inputParent">
                                        <div class="form-check form-switch text-center">
                                            <input class="form-check-input shadow-none border border-dark btn-lg enabled_text"
                                                type="checkbox" role="switch" id="enabled_text" name="enable_categories">
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="my-4">
                            @if($homePageSettings['enable_stats'] == true)
                                <div class="row m-0 align-items-center justify-content-between">
                                    <div class="col-10 labelParent">
                                        <label for="name" class="text-dark  ">
                                            <!-- printing -->
                                            Enable Stats (<span class="enable_disable_text">Enabled</span>)
                                        </label>
                                    </div>
                                    <div class="col-2 inputParent">
                                        <div class="form-check form-switch text-center">
                                            <input class="form-check-input shadow-none border border-dark btn-lg enabled_text"
                                                type="checkbox" role="switch" id="enabled_text" name="enable_stats" checked>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="row m-0 align-items-center justify-content-between">
                                    <div class="col-10 labelParent">
                                        <label for="name" class="text-dark  ">
                                            <!-- printing -->
                                            Enable Stats (<span class="enable_disable_text">Disabled</span>)
                                        </label>
                                    </div>
                                    <div class="col-2 inputParent">
                                        <div class="form-check form-switch text-center">
                                            <input class="form-check-input shadow-none border border-dark btn-lg enabled_text"
                                                type="checkbox" role="switch" id="enabled_text" name="enable_stats">
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="my-4">
                            @if($homePageSettings['enable_testimonials'] == true)
                                <div class="row m-0 align-items-center justify-content-between">
                                    <div class="col-10 labelParent">
                                        <label for="name" class="text-dark  ">
                                            <!-- printing -->
                                            Enable Testimonials (<span class="enable_disable_text">Enabled</span>)
                                        </label>
                                    </div>
                                    <div class="col-2 inputParent">
                                        <div class="form-check form-switch text-center">
                                            <input class="form-check-input shadow-none border border-dark btn-lg enabled_text"
                                                type="checkbox" role="switch" id="enabled_text" name="enable_testimonials" checked>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="row m-0 align-items-center justify-content-between">
                                    <div class="col-10 labelParent">
                                        <label for="name" class="text-dark  ">
                                            <!-- printing -->
                                            Enable Testimonials (<span class="enable_disable_text">Disabled</span>)
                                        </label>
                                    </div>
                                    <div class="col-2 inputParent">
                                        <div class="form-check form-switch text-center">
                                            <input class="form-check-input shadow-none border border-dark btn-lg enabled_text"
                                                type="checkbox" role="switch" id="enabled_text" name="enable_testimonials">
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="my-4">
                            @if($homePageSettings['enable_cta'] == true)
                                <div class="row m-0 align-items-center justify-content-between">
                                    <div class="col-10 labelParent">
                                        <label for="name" class="text-dark  ">
                                            <!-- printing -->
                                            Enable CTA (<span class="enable_disable_text">Enabled</span>)
                                        </label>
                                    </div>
                                    <div class="col-2 inputParent">
                                        <div class="form-check form-switch text-center">
                                            <input class="form-check-input shadow-none border border-dark btn-lg enabled_text"
                                                type="checkbox" role="switch" id="enabled_text" name="enable_cta" checked>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="row m-0 align-items-center justify-content-between">
                                    <div class="col-10 labelParent">
                                        <label for="name" class="text-dark  ">
                                            <!-- printing -->
                                            Enable CTA (<span class="enable_disable_text">Disabled</span>)
                                        </label>
                                    </div>
                                    <div class="col-2 inputParent">
                                        <div class="form-check form-switch text-center">
                                            <input class="form-check-input shadow-none border border-dark btn-lg enabled_text"
                                                type="checkbox" role="switch" id="enabled_text" name="enable_cta">
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="my-4">
                            @if($homePageSettings['enable_our_services'] == true)
                                <div class="row m-0 align-items-center justify-content-between">
                                    <div class="col-10 labelParent">
                                        <label for="name" class="text-dark  ">
                                            <!-- printing -->
                                            Enable Our Services (<span class="enable_disable_text">Enabled</span>)
                                        </label>
                                    </div>
                                    <div class="col-2 inputParent">
                                        <div class="form-check form-switch text-center">
                                            <input class="form-check-input shadow-none border border-dark btn-lg enabled_text"
                                                type="checkbox" role="switch" id="enabled_text" name="enable_our_services" checked>
                                        </div>
                                    </div>
                                </div>
                            @else 
                                <div class="row m-0 align-items-center justify-content-between">
                                    <div class="col-10 labelParent">
                                        <label for="name" class="text-dark  ">
                                            <!-- printing -->
                                            Enable Our Services (<span class="enable_disable_text">Disabled</span>)
                                        </label>
                                    </div>
                                    <div class="col-2 inputParent">
                                        <div class="form-check form-switch text-center">
                                            <input class="form-check-input shadow-none border border-dark btn-lg enabled_text"
                                                type="checkbox" role="switch" id="enabled_text" name="enable_our_services">
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="my-4">
                            @if($homePageSettings['enable_footer'] == true)
                                <div class="row m-0 align-items-center justify-content-between">
                                    <div class="col-10 labelParent">
                                        <label for="name" class="text-dark  ">
                                            <!-- printing -->
                                            Enable Footer (<span class="enable_disable_text">Enabled</span>)
                                        </label>
                                    </div>
                                    <div class="col-2 inputParent">
                                        <div class="form-check form-switch text-center">
                                            <input class="form-check-input shadow-none border border-dark btn-lg enabled_text"
                                                type="checkbox" role="switch" id="enabled_text" name="enable_footer" checked>
                                        </div>
                                    </div>
                                </div>
                            @else 
                                <div class="row m-0 align-items-center justify-content-between">
                                    <div class="col-10 labelParent">
                                        <label for="name" class="text-dark  ">
                                            <!-- printing -->
                                            Enable Footer (<span class="enable_disable_text">Disabled</span>)
                                        </label>
                                    </div>
                                    <div class="col-2 inputParent">
                                        <div class="form-check form-switch text-center">
                                            <input class="form-check-input shadow-none border border-dark btn-lg enabled_text"
                                                type="checkbox" role="switch" id="enabled_text" name="enable_footer">
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="update_btn mt-4">
                            <button type="submit" id="updateHomePageSettings" class="btn_update shadow textuppercase">SAVE</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="tab-pane bg-white shadow my-4 p-2 rounded-3 fade" id="top_bar-tab-pane" role="tabpanel" aria-labelledby="top_bar-tab" tabindex="0">
                <div class="profile_form">
                    <!-- Hero Settings  -->
                    <form action="{{ route('update_top_bar_settings') }}" method="POST">
                    @csrf
                        <h5 class="text-dark font_bold m-0">Top Bar Settings</h5>
                        <div class="my-4">
                            <label for="name" class="text-dark font_bold">Message</label>
                            <textarea cols="40" rows="2" name="message"
                                class="text_area_div bg-transparent my-3 form-control"
                                style="min-height: 100px; max-height: 130px;">{{app(\App\Settings\TopBarSettings::class)->message}}</textarea>
                        </div>

                        <div class="my-4">
                            <label for="name" class="text-dark font_bold">Button Text</label>
                            <input type="text" class="form-control bg-transparent my-3" name="button_text"
                                value="{{app(\App\Settings\TopBarSettings::class)->button_text}}">
                        </div>

                        <div class="my-4">
                            <label for="name" class="text-dark font_bold">Button Link</label>
                            <input type="text" class="form-control bg-transparent my-3" name="button_link" value="{{app(\App\Settings\TopBarSettings::class)->button_link}}">
                        </div>

                        <div class="update_btn mt-5">
                            <button type="submit" class="btn_update shadow textuppercase">SAVE</button>
                        </div>

                    </form>
                </div>
            </div>
            <div class="tab-pane bg-white shadow my-4 p-2 rounded-3 fade" id="hero-tab-pane" role="tabpanel" aria-labelledby="hero-tab" tabindex="0">
                <div class="profile_form">
                    <!-- Hero Settings  -->
                    <form action="{{ route('update_hero_settings') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <h5 class="text-dark font_bold m-0">Hero Settings</h5>
                        <div class="my-4">
                            <label for="name" class="text-dark font_bold">Title</label>
                            <input type="text" class="form-control bg-transparent my-3" name="title"
                                value="{{$heroSettings['title']}}">
                        </div>

                        <div class="my-4">
                            <label for="name" class="text-dark font_bold">Subtitle</label>
                            <textarea cols="40" rows="2" name="subtitle"
                                class="text_area_div bg-transparent my-3 form-control"
                                style="min-height: 100px; max-height: 130px;">{{$heroSettings['subtitle']}}</textarea>
                        </div>

                        <div class="my-4">
                            <label for="name" class="text-dark font_bold">CTA Text</label>
                            <input type="text" class="form-control bg-transparent my-3" name="cta_text" value="{{$heroSettings['cta_text']}}">
                        </div>

                        <div class="my-4">
                            <label for="name" class="text-dark font_bold">CTA Link</label>
                            <input type="text" class="form-control bg-transparent my-3" name="cta_link"
                                value="{{$heroSettings['cta_link']}}">
                        </div>

                        <div class="my-4">
                            <label for="name" class="text-dark font_bold">Image</label>
                            <!-- for password  -->
                            <form class="user-select-none">
                                <!-- choose file  -->
                                <div class="row personal_info my-3">
                                    <div class="profile_photo mt-3">
                                        <div class="profile-pic m-0">
                                            <div>
                                                <div class="logo-previewer overflow-hidden">
                                                    <img class="site_logoPreview" src="{{ url('storage/'.app(\App\Settings\HeroSettings::class)->image_path) }}" alt="Preview">
                                                </div>
                                                <label for="site_logo" class="file-label bg-label-primary mt-3 d-inline-block  rounded-pill p-2 px-3 mt-3 cursor_pointer">Choose File</label>
                                                <div class="text-danger fs-13 mt-1">Acceptable formate only(png, jpg, jpeg, webp)</div>
                                                <input type="file" id="site_logo" class="file-input" accept=".png, .jpg, .jpeg, .webp" name="image_path">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <div class="update_btn mt-5">
                                <button type="submit" class="btn_update shadow textuppercase">SAVE</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
            <div class="tab-pane bg-white shadow my-4 p-2 rounded-3 fade" id="features-tab-pane" role="tabpanel" aria-labelledby="features-tab" tabindex="0">
                <div class="profile_form">
                    <form action="{{ route('update_feature_settings') }}" method="POST">
                    @csrf
                        <h5 class="text-dark font_bold m-0">Feature Settings</h5>

                        <div class="my-4">
                            <label for="name" class="text-dark font_bold">Title</label>
                            <input type="text" class="form-control bg-transparent my-3"
                                value="{{$featureSettings['title']}}" name="title">
                        </div>

                        <div class="my-4">
                            <label for="name" class="text-dark font_bold">Subtitle</label>
                            <textarea name="subtitle" cols="40" rows="2"
                                class="text_area_div bg-transparent my-3 form-control"
                                style="min-height: 100px; max-height: 130px;">{{$featureSettings['subtitle']}}</textarea>
                        </div>
                        <!-- app(\App\Settings\featureSettings::class)->feature1[0] -->
                        <div class="bg_secondary_light my-4 p-3">
                            <h5 class="text-dark font_bold m-0">Feature 1</h5>
                            <hr>
                            <div class="my-4">
                                <label for="name" class="text-dark font_bold">Caption</label>
                                <input name="feature1_caption" type="text" class="form-control bg-white my-3" value="{{app(\App\Settings\featureSettings::class)->feature1[0]}}">
                            </div>

                            <div class="my-4">
                                <label for="name" class="text-dark font_bold">Description</label>
                                <textarea name="feature1_description" cols="40" rows="2" class="text_area_div bg-white my-3 form-control"
                                    style="min-height: 100px; max-height: 130px;">{{app(\App\Settings\featureSettings::class)->feature1[1]}}</textarea>
                            </div>

                            <div class="my-4">
                                <label for="name" class="text-dark font_bold">Icon URL (100x100)</label>
                                <input type="text" name="feature1_icon_url" class="form-control bg-white my-3" value="{{app(\App\Settings\featureSettings::class)->feature1[2]}}">
                            </div>
                        </div>

                        <div class=" bg_secondary_light my-4 p-3">
                            <h5 class="text-dark font_bold m-0">Feature 2</h5>
                            <hr>
                            <div class="my-4">
                                <label for="name" class="text-dark font_bold">Caption</label>
                                <input name="feature2_caption" type="text" class="form-control bg-white my-3" value="{{app(\App\Settings\featureSettings::class)->feature2[0]}}">
                            </div>

                            <div class="my-4">
                                <label for="name" class="text-dark font_bold">Description</label>
                                <textarea name="feature2_description" cols="40" rows="2" class="text_area_div bg-white my-3 form-control"
                                    style="min-height: 100px; max-height: 130px;">{{app(\App\Settings\featureSettings::class)->feature2[1]}}</textarea>
                            </div>

                            <div class="my-4">
                                <label for="name" class="text-dark font_bold">Icon URL (100x100)</label>
                                <input name="feature2_icon_url" type="text" class="form-control bg-white my-3" value="{{app(\App\Settings\featureSettings::class)->feature2[2]}}">
                            </div>
                        </div>

                        <div class="bg_secondary_light my-4 p-3">
                            <h5 class="text-dark font_bold m-0">Feature 3</h5>
                            <hr>
                            <div class="my-4">
                                <label for="name" class="text-dark font_bold">Caption</label>
                                <input name="feature3_caption" type="text" class="form-control bg-white my-3" value="{{app(\App\Settings\featureSettings::class)->feature3[0]}}">
                            </div>

                            <div class="my-4">
                                <label for="name" class="text-dark font_bold">Description</label>
                                <textarea name="feature3_description" cols="40" rows="2"
                                    class="text_area_div bg-white my-3 form-control"
                                    style="min-height: 100px; max-height: 130px;">{{app(\App\Settings\featureSettings::class)->feature3[1]}}</textarea>
                            </div>
                            
                            <div class="my-4">
                                <label for="name" class="text-dark font_bold">Icon URL (100x100)</label>
                                <input name="feature3_icon_url" type="text" class="form-control bg-white my-3"
                                    value="{{app(\App\Settings\featureSettings::class)->feature3[2]}}">
                            </div>
                        </div>

                        <div class="bg_secondary_light my-4 p-3">
                            <h5 class="text-dark font_bold m-0">Feature 4</h5>
                            <hr>
                            <div class="my-4">
                                <label for="name" class="text-dark font_bold">Caption</label>
                                <input name="feature4_caption" type="text" class="form-control bg-white my-3" value="{{app(\App\Settings\featureSettings::class)->feature4[0]}}">
                            </div>
                            <div class="my-4">
                                <label for="name" class="text-dark font_bold">Description</label>
                                <textarea name="feature4_description" cols="40" rows="2"
                                    class="text_area_div bg-white my-3 form-control"
                                    style="min-height: 100px; max-height: 130px;">{{app(\App\Settings\featureSettings::class)->feature4[1]}}</textarea>
                            </div>
                            <div class="my-4">
                                <label for="name" class="text-dark font_bold">Icon URL (100x100)</label>
                                <input name="feature4_icon_url" type="text" class="form-control bg-white my-3"
                                    value="{{app(\App\Settings\featureSettings::class)->feature4[2]}}">
                            </div>
                        </div>

                        <div class="update_btn mt-5">
                            <button type="submit" class="btn_update shadow textuppercase">SAVE</button>
                        </div>

                    </form>
                </div>
            </div>
            <div class="tab-pane bg-white shadow my-4 p-2 rounded-3 fade" id="category-tab-pane" role="tabpanel" aria-labelledby="category-tab" tabindex="0">
                <div class="profile_form">
                    <form action="{{ route('update_category_settings') }}" method="POST">
                    @csrf
                        <h5 class="text-dark font_bold m-0">Category Settings</h5>
                        <div class="my-4">
                            <label for="name" class="text-dark font_bold">Title</label>
                            <input type="text" class="form-control bg-transparent my-3" name="title"
                                value="{{$categorySettings['title']}}">
                        </div>

                        <div class="my-4">
                            <label for="name" class="text-dark font_bold">Subtitle</label>
                            <textarea name="subtitle" cols="40" rows="2"
                                class="text_area_div bg-transparent my-3 form-control"
                                style="min-height: 100px; max-height: 130px;">{{$categorySettings['subtitle']}}</textarea>
                        </div>

                        <h5 class="text-dark font_bold m-0">Explore Page Settings</h5>
                        <div class="my-4">
                            <label for="name" class="text-dark font_bold">Title</label>
                            <input type="text" class="form-control bg-transparent my-3" name="explore_title"
                                value="{{$categorySettings['explore_title']}}">
                        </div>

                        <div class="my-4">
                            <label for="name" class="text-dark font_bold">Subtitle</label>
                            <textarea name="explore_subtitle" cols="40" rows="2"
                                class="text_area_div bg-transparent my-3 form-control"
                                style="min-height: 100px; max-height: 130px;">{{$categorySettings['explore_subtitle']}}</textarea>
                        </div>

                        <div class="my-4">
                            <label for="name" class="text-dark font_bold">Image Path</label>
                            <input type="text" class="form-control bg-transparent my-3" name="explore_image_path"
                                value="{{$categorySettings['explore_image_path']}}">
                        </div>


                        <div class="update_btn mt-5">
                            <button class="btn_update shadow textuppercase" type="submit">SAVE</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="tab-pane bg-white shadow my-4 p-2 rounded-3 fade" id="statistics-tab-pane" role="tabpanel" aria-labelledby="statistics-tab" tabindex="0">
                <div class="profile_form">
                    <form action="{{ route('update_stat_settings') }}" method="POST">
                    @csrf
                        <h5 class="text-dark font_bold m-0">Statistics Settings</h5>

                        <div class="my-4">
                            <label for="name" class="text-dark font_bold">Title</label>
                            <input type="text" class="form-control bg-transparent my-3"
                                value="{{$statSettings['title']}}" name="title">
                        </div>

                        <div class="my-4">
                            <label for="name" class="text-dark font_bold">Subtitle</label>
                            <textarea name="subtitle" cols="40" rows="2"
                                class="text_area_div bg-transparent my-3 form-control"
                                style="min-height: 100px; max-height: 130px;">{{$statSettings['subtitle']}}</textarea>
                        </div>

                        <div class="my-4">
                            <label for="name" class="text-dark font_bold">Image Path</label>
                            <input type="text" class="form-control bg-transparent my-3"
                                value="{{$statSettings['image_path']}}" name="image_path">
                        </div>

                        <div class="bg_secondary_light my-4 p-3">
                            <h5 class="text-dark font_bold m-0">Statistic 1</h5>
                            <hr>
                            <div class="my-4">
                                <label for="name" class="text-dark font_bold">Name</label>
                                <input name="stat1_name" type="text" class="form-control bg-white my-3" value="{{app(\App\Settings\statSettings::class)->stat1[1]}}">
                            </div>
                            <div class="my-4">
                                <label for="name" class="text-dark font_bold">Count</label>
                                <input name="stat1_count" type="text" class="form-control bg-white my-3" value="{{app(\App\Settings\statSettings::class)->stat1[0]}}">
                            </div>
                        </div>

                        <div class="bg_secondary_light my-4 p-3">
                            <h5 class="text-dark font_bold m-0">Statistic 2</h5>
                            <hr>
                            <div class="my-4">
                                <label for="name" class="text-dark font_bold">Name</label>
                                <input name="stat2_name" type="text" class="form-control bg-white my-3" value="{{app(\App\Settings\statSettings::class)->stat2[1]}}">
                            </div>
                            <div class="my-4">
                                <label for="name" class="text-dark font_bold">Count</label>
                                <input name="stat2_count" type="text" class="form-control bg-white my-3" value="{{app(\App\Settings\statSettings::class)->stat2[0]}}">
                            </div>

                            
                        </div>

                        <div class="bg_secondary_light my-4 p-3">
                            <h5 class="text-dark font_bold m-0">Statistic 3</h5>
                            <hr>
                            <div class="my-4">
                                <label for="name" class="text-dark font_bold">Name</label>
                                <input name="stat3_name" type="text" class="form-control bg-white my-3" value="{{app(\App\Settings\statSettings::class)->stat3[1]}}">
                            </div>
                            <div class="my-4">
                                <label for="name" class="text-dark font_bold">Count</label>
                                <input name="stat3_count" type="text" class="form-control bg-white my-3" value="{{app(\App\Settings\statSettings::class)->stat3[0]}}">
                            </div>

                        </div>

                        <div class="update_btn mt-5">
                            <button tyepe="submit" class="btn_update shadow textuppercase">SAVE</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="tab-pane bg-white shadow my-4 p-2 rounded-3 fade" id="testimonial-tab-pane" role="tabpanel" aria-labelledby="testimonial-tab" tabindex="0">
                <div class="profile_form">
                    <form action="{{ route('update_testimonial_settings') }}" method="POST">
                    @csrf
                        <h5 class="text-dark font_bold m-0">Testimonial Settings</h5>

                        <div class="my-4">
                            <label for="name" class="text-dark font_bold">Title</label>
                            <input name="title" type="text" class="form-control bg-transparent my-3"
                                value="{{$testimonialSettings['title']}}">
                        </div>

                        <div class="my-4">
                            <label for="name" class="text-dark font_bold">Subtitle</label>
                            <textarea name="subtitle" cols="40" rows="2"
                                class="text_area_div bg-transparent my-3 form-control"
                                style="min-height: 100px; max-height: 130px;">{{$testimonialSettings['subtitle']}}</textarea>
                        </div>

                        <div class="bg_secondary_light my-4 p-3">
                            <h5 class="text-dark font_bold m-0">Testimonial 1</h5>
                            <hr>
                            <div class="my-4">
                                <label for="name" class="text-dark font_bold">Name</label>
                                <input type="text" name="testimonial1_name" class="form-control bg-white my-3" value="{{app(\App\Settings\testimonialSettings::class)->testimonial1[0]}}">
                            </div>

                            <div class="my-4">
                                <label for="name" class="text-dark font_bold">Designation</label>
                                <input type="text" name="testimonial1_designation" class="form-control bg-white my-3" value="{{app(\App\Settings\testimonialSettings::class)->testimonial1[1]}}">
                            </div>

                            <div class="my-4">
                                <label for="name" class="text-dark font_bold">Message</label>
                                <textarea name="testimonial1_message" cols="40" rows="2" class="text_area_div bg-white my-3 form-control"
                                    style="min-height: 100px; max-height: 130px;">{{app(\App\Settings\testimonialSettings::class)->testimonial1[2]}}</textarea>
                            </div>

                            <div class="my-4">
                                <label for="name" class="text-dark font_bold">Image</label>
                                <input name="testimonial1_image" type="text" class="form-control bg-white my-3"
                                    value="{{app(\App\Settings\testimonialSettings::class)->testimonial1[3]}}">
                            </div>
                        </div>

                        <div class="bg_secondary_light my-4 p-3">
                            <h5 class="text-dark font_bold m-0">Testimonial 2</h5>
                            <hr>
                            <div class="my-4">
                                <label for="name" class="text-dark font_bold">Name</label>
                                <input name="testimonial2_name" type="text" class="form-control bg-white my-3" value="{{app(\App\Settings\testimonialSettings::class)->testimonial2[0]}}">
                            </div>

                            <div class="my-4">
                                <label for="name" class="text-dark font_bold">Designation</label>
                                <input name="testimonial2_designation" type="text" class="form-control bg-white my-3" value="{{app(\App\Settings\testimonialSettings::class)->testimonial2[1]}}">
                            </div>

                            <div class="my-4">
                                <label for="name" class="text-dark font_bold">Message</label>
                                <textarea name="testimonial2_message" cols="40" rows="2" class="text_area_div bg-white my-3 form-control"
                                    style="min-height: 100px; max-height: 130px;">{{app(\App\Settings\testimonialSettings::class)->testimonial2[2]}}</textarea>
                            </div>

                            <div class="my-4">
                                <label for="name" class="text-dark font_bold">Image</label>
                                <input name="testimonial2_image" type="text" class="form-control bg-white my-3"
                                    value="{{app(\App\Settings\testimonialSettings::class)->testimonial2[3]}}">
                            </div>
                        </div>

                        <div class="bg_secondary_light my-4 p-3">
                            <h5 class="text-dark font_bold m-0">Testimonial 3</h5>
                            <hr>
                            <div class="my-4">
                                <label for="name" class="text-dark font_bold">Name</label>
                                <input name="testimonial3_name" type="text" class="form-control bg-white my-3" value="{{app(\App\Settings\testimonialSettings::class)->testimonial3[0]}}">
                            </div>

                            <div class="my-4">
                                <label for="name" class="text-dark font_bold">Designation</label>
                                <input name="testimonial3_designation" type="text" class="form-control bg-white my-3" value="{{app(\App\Settings\testimonialSettings::class)->testimonial3[1]}}">
                            </div>

                            <div class="my-4">
                                <label for="name" class="text-dark font_bold">Message</label>
                                <textarea name="testimonial3_message" cols="40" rows="2" class="text_area_div bg-white my-3 form-control"
                                    style="min-height: 100px; max-height: 130px;">{{app(\App\Settings\testimonialSettings::class)->testimonial3[2]}}</textarea>
                            </div>

                            <div class="my-4">
                                <label for="name" class="text-dark font_bold">Image</label>
                                <input name="testimonial3_image" type="text" class="form-control bg-white my-3"
                                    value="{{app(\App\Settings\testimonialSettings::class)->testimonial3[3]}}">
                            </div>
                        </div>

                        <div class="bg_secondary_light my-4 p-3">
                            <h5 class="text-dark font_bold m-0">Testimonial 4</h5>
                            <hr>
                            <div class="my-4">
                                <label for="name" class="text-dark font_bold">Name</label>
                                <input name="testimonial4_name" type="text" class="form-control bg-white my-3" value="{{app(\App\Settings\testimonialSettings::class)->testimonial4[0]}}">
                            </div>

                            <div class="my-4">
                                <label for="name" class="text-dark font_bold">Designation</label>
                                <input name="testimonial4_designation" type="text" class="form-control bg-white my-3" value="{{app(\App\Settings\testimonialSettings::class)->testimonial4[1]}}">
                            </div>

                            <div class="my-4">
                                <label for="name" class="text-dark font_bold">Message</label>
                                <textarea name="testimonial4_message" cols="40" rows="2" class="text_area_div bg-white my-3 form-control"
                                    style="min-height: 100px; max-height: 130px;">{{app(\App\Settings\testimonialSettings::class)->testimonial4[2]}}</textarea>
                            </div>

                            <div class="my-4">
                                <label for="name" class="text-dark font_bold">Image</label>
                                <input name="testimonial4_image" type="text" class="form-control bg-white my-3"
                                    value="{{app(\App\Settings\testimonialSettings::class)->testimonial4[3]}}">
                            </div>
                        </div>

                        <div class="bg_secondary_light my-4 p-3">
                            <h5 class="text-dark font_bold m-0">Testimonial 5</h5>
                            <hr>
                            <div class="my-4">
                                <label for="name" class="text-dark font_bold">Name</label>
                                <input name="testimonial5_name" type="text" class="form-control bg-white my-3" value="{{app(\App\Settings\testimonialSettings::class)->testimonial5[0]}}">
                            </div>

                            <div class="my-4">
                                <label for="name" class="text-dark font_bold">Designation</label>
                                <input name="testimonial5_designation" type="text" class="form-control bg-white my-3" value="{{app(\App\Settings\testimonialSettings::class)->testimonial5[1]}}">
                            </div>

                            <div class="my-4">
                                <label for="name" class="text-dark font_bold">Message</label>
                                <textarea name="testimonial5_message" cols="40" rows="2" class="text_area_div bg-white my-3 form-control"
                                    style="min-height: 100px; max-height: 130px;">{{app(\App\Settings\testimonialSettings::class)->testimonial5[2]}}</textarea>
                            </div>

                            <div class="my-4">
                                <label for="name" class="text-dark font_bold">Image</label>
                                <input name="testimonial5_image" type="text" class="form-control bg-white my-3"
                                    value="{{app(\App\Settings\testimonialSettings::class)->testimonial5[3]}}">
                            </div>
                        </div>

                        <div class="bg_secondary_light my-4 p-3">
                            <h5 class="text-dark font_bold m-0">Testimonial 6</h5>
                            <hr>
                            <div class="my-4">
                                <label for="name" class="text-dark font_bold">Name</label>
                                <input name="testimonial6_name" type="text" class="form-control bg-white my-3" value="{{app(\App\Settings\testimonialSettings::class)->testimonial6[0]}}">
                            </div>

                            <div class="my-4">
                                <label for="name" class="text-dark font_bold">Designation</label>
                                <input name="testimonial6_designation" type="text" class="form-control bg-white my-3" value="{{app(\App\Settings\testimonialSettings::class)->testimonial6[1]}}">
                            </div>

                            <div class="my-4">
                                <label for="name" class="text-dark font_bold">Message</label>
                                <textarea name="testimonial6_message" cols="40" rows="2" class="text_area_div bg-white my-3 form-control"
                                    style="min-height: 100px; max-height: 130px;">{{app(\App\Settings\testimonialSettings::class)->testimonial6[2]}}</textarea>
                            </div>

                            <div class="my-4">
                                <label for="name" class="text-dark font_bold">Image</label>
                                <input name="testimonial6_image" type="text" class="form-control bg-white my-3"
                                    value="{{app(\App\Settings\testimonialSettings::class)->testimonial6[3]}}">
                            </div>
                        </div>

                        <div class="update_btn mt-5">
                            <button class="btn_update shadow textuppercase">SAVE</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="tab-pane bg-white shadow my-4 p-2 rounded-3 fade" id="services-tab-pane" role="tabpanel" aria-labelledby="services-tab" tabindex="0">
                <div class="profile_form">
                    <form action="{{route('update_our_services_settings')}}" method="POST">
                    @csrf
                        <h5 class="text-dark font_bold m-0">Our Services Settings</h5>
                        <div class="my-4">
                            <label for="name" class="text-dark font_bold">Title</label>
                            <input name="title" type="text" class="form-control bg-transparent my-3"
                                value="{{app(\App\Settings\OurServicesSettings::class)->title}}">
                        </div>

                        <div class="my-4">
                            <label for="name" class="text-dark font_bold">Subtitle</label>
                            <textarea name="subtitle" cols="40" rows="2"
                                class="text_area_div bg-transparent my-3 form-control"
                                style="min-height: 100px; max-height: 130px;">{{app(\App\Settings\OurServicesSettings::class)->subtitle}}</textarea>
                        </div>

                        <div class="my-4">
                            <label for="name" class="text-dark font_bold">Image Url</label>
                            <input name="image_url" type="text" class="form-control bg-transparent my-3"
                                value="{{app(\App\Settings\OurServicesSettings::class)->image_url}}">
                        </div>
                        @foreach(app(\App\Settings\OurServicesSettings::class)->services as $key => $service)
                            <div class="bg_secondary_light my-4 p-3">
                                <h5 class="text-dark font_bold m-0">Service {{++$key}}</h5>
                                <hr>
                                <div class="my-4">
                                    <div class="row m-0 align-items-center justify-content-between">
                                        <div class="col-10 labelParent">
                                            <label for="name" class="text-dark  ">
                                                Service {{$key}} (<span class="enable_disable_text">
                                                    @if($service[3])
                                                        Enabled
                                                    @else
                                                        Disabled
                                                    @endif
                                                </span>)
                                            </label>
                                        </div>
                                        <div class="col-2 inputParent">
                                            <div class="form-check form-switch text-center">
                                                @if($service[3])
                                                    <input class="form-check-input shadow-none border border-dark btn-lg enabled_text" type="checkbox" role="switch" id="enabled_text" name="service{{$key}}_enable" checked="">
                                                @else
                                                    <input class="form-check-input shadow-none border border-dark btn-lg enabled_text" type="checkbox" role="switch" id="enabled_text" name="service{{$key}}_enable">
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="my-4">
                                    <label for="name" class="text-dark font_bold">Title</label>
                                    <input type="text" name="service{{$key}}_title" class="form-control bg-white my-3" value="{{$service[0]}}">
                                </div>

                                <div class="my-4">
                                    <label for="name" class="text-dark font_bold">Subtitle</label>
                                    <input type="text" name="service{{$key}}_subtitle" class="form-control bg-white my-3" value="{{$service[1]}}">
                                </div>
                                                        
                                <div class="my-4">
                                    <label for="name" class="text-dark font_bold">Image Url</label>
                                    <input type="text" name="service{{$key}}_imageurl" class="form-control bg-white my-3" value="{{$service[2]}}">
                                </div>
                                
                                
                            </div>
                        @endforeach


                        <div class="update_btn mt-5">
                            <button class="btn_update shadow textuppercase">SAVE</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="tab-pane bg-white shadow my-4 p-2 rounded-3 fade" id="help-tab-pane" role="tabpanel" aria-labelledby="help-tab" tabindex="0">
                <div class="profile_form">
                    <!-- Testimonial Settings -->
                    <form action="{{route('update_help_settings')}}" method="POST">
                    @csrf
                        <h5 class="text-dark font_bold m-0">Help Settings</h5>
                        <div class="my-4">
                            <label for="name" class="text-dark font_bold">Title</label>
                            <input name="title" type="text" class="form-control bg-transparent my-3"
                                value="{{app(\App\Settings\HelpSettings::class)->title}}">
                        </div>

                        <div class="my-4">
                            <label for="name" class="text-dark font_bold">Subtitle</label>
                            <textarea name="subtitle" cols="40" rows="2"
                                class="text_area_div bg-transparent my-3 form-control"
                                style="min-height: 100px; max-height: 130px;">{{app(\App\Settings\HelpSettings::class)->subtitle}}</textarea>
                        </div>

                        <div class="my-4">
                            <label for="name" class="text-dark font_bold">Image Path</label>
                            <input name="image_path" type="text" class="form-control bg-transparent my-3"
                                value="{{app(\App\Settings\HelpSettings::class)->image_path}}">
                        </div>

                        @foreach(app(\App\Settings\HelpSettings::class)->faqs as $key => $faq)
                            <div class="bg_secondary_light my-4 p-3">
                                <h5 class="text-dark font_bold m-0">FAQ {{++$key}}</h5>
                                <hr>
                                <div class="my-4">
                                    <div class="row m-0 align-items-center justify-content-between">
                                        <div class="col-10 labelParent">
                                            <label for="name" class="text-dark  ">
                                                FAQ {{$key}} (<span class="enable_disable_text">
                                                    @if($faq[2])
                                                        Enabled
                                                    @else
                                                        Disabled
                                                    @endif
                                                </span>)
                                            </label>
                                        </div>
                                        <div class="col-2 inputParent">
                                            <div class="form-check form-switch text-center">
                                                @if($faq[2])
                                                    <input class="form-check-input shadow-none border border-dark btn-lg enabled_text" type="checkbox" role="switch" id="enabled_text" name="faq{{$key}}_enable" checked="">
                                                @else
                                                    <input class="form-check-input shadow-none border border-dark btn-lg enabled_text" type="checkbox" role="switch" id="enabled_text" name="faq{{$key}}_enable">
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="my-4">
                                    <label for="name" class="text-dark font_bold">Question</label>
                                    <input type="text" name="faq{{$key}}_title" class="form-control bg-white my-3" value="{{$faq[0]}}">
                                </div>

                                <div class="my-4">
                                    <label for="name" class="text-dark font_bold">Answer</label>
                                    <input type="text" name="faq{{$key}}_subtitle" class="form-control bg-white my-3" value="{{$faq[1]}}">
                                </div>
                                
                                
                            </div>
                        @endforeach

                        <h5 class="text-dark font_bold m-0">Contact Settings</h5>

                        <div class="my-4">
                            <label for="name" class="text-dark font_bold">Title</label>
                            <input name="contact_title" type="text" class="form-control bg-transparent my-3"
                                value="{{app(\App\Settings\HelpSettings::class)->contact_title}}">
                        </div>

                        <div class="my-4">
                            <label for="name" class="text-dark font_bold">Subtitle</label>
                            <textarea name="contact_subtitle" cols="40" rows="2"
                                class="text_area_div bg-transparent my-3 form-control"
                                style="min-height: 100px; max-height: 130px;">{{app(\App\Settings\HelpSettings::class)->contact_subtitle}}</textarea>
                        </div>

                        <div class="my-4">
                            <label for="name" class="text-dark font_bold">Image Path</label>
                            <input name="contact_image_path" type="text" class="form-control bg-transparent my-3"
                                value="{{app(\App\Settings\HelpSettings::class)->contact_image_path}}">
                        </div>


                        <div class="update_btn mt-5">
                            <button class="btn_update shadow textuppercase">SAVE</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="tab-pane bg-white shadow my-4 p-2 rounded-3 fade" id="teacher-tab-pane" role="tabpanel" aria-labelledby="teacher-tab" tabindex="0">
                <div class="profile_form">
                    <form action="{{route('update_teacher_settings')}}" method="POST">
                    @csrf
                        <h5 class="text-dark font_bold m-0">Teacher Settings</h5>
                        <div class="my-4">
                            <label for="name" class="text-dark font_bold">Title</label>
                            <input name="title" type="text" class="form-control bg-transparent my-3"
                                value="{{app(\App\Settings\TeacherSettings::class)->title}}">
                        </div>

                        <div class="my-4">
                            <label for="name" class="text-dark font_bold">Subtitle</label>
                            <textarea name="subtitle" cols="40" rows="2"
                                class="text_area_div bg-transparent my-3 form-control"
                                style="min-height: 100px; max-height: 130px;">{{app(\App\Settings\TeacherSettings::class)->subtitle}}</textarea>
                        </div>
                        <div class="my-4">
                            <label for="name" class="text-dark font_bold">Image Path</label>
                            <input name="image_path" type="text" class="form-control bg-transparent my-3"
                                value="{{app(\App\Settings\TeacherSettings::class)->image_path}}">
                        </div>
                        @foreach(app(\App\Settings\TeacherSettings::class)->teachers as $key => $teacher)
                            <div class="bg_secondary_light my-4 p-3">
                                <h5 class="text-dark font_bold m-0">Teachers {{++$key}}</h5>
                                <hr>
                                <div class="my-4">
                                    <div class="row m-0 align-items-center justify-content-between">
                                        <div class="col-10 labelParent">
                                            <label for="name" class="text-dark  ">
                                                Teacher {{$key}} (<span class="enable_disable_text">
                                                    @if($teacher[4])
                                                        Enabled
                                                    @else
                                                        Disabled
                                                    @endif
                                                </span>)
                                            </label>
                                        </div>
                                        <div class="col-2 inputParent">
                                            <div class="form-check form-switch text-center">
                                                @if($teacher[4])
                                                    <input class="form-check-input shadow-none border border-dark btn-lg enabled_text" type="checkbox" role="switch" id="enabled_text" name="teacher{{$key}}_enable" checked="">
                                                @else
                                                    <input class="form-check-input shadow-none border border-dark btn-lg enabled_text" type="checkbox" role="switch" id="enabled_text" name="teacher{{$key}}_enable">
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="my-4">
                                    <label for="name" class="text-dark font_bold">Name</label>
                                    <input type="text" name="teacher{{$key}}_name" class="form-control bg-white my-3" value="{{$teacher[0]}}">
                                </div>

                                <div class="my-4">
                                    <label for="name" class="text-dark font_bold">Subtitle</label>
                                    <input type="text" name="teacher{{$key}}_subtitle" class="form-control bg-white my-3" value="{{$teacher[2]}}">
                                </div>

                                <div class="my-4">
                                    <label for="name" class="text-dark font_bold">Designation</label>
                                    <input type="text" name="teacher{{$key}}_designation" class="form-control bg-white my-3" value="{{$teacher[1]}}">
                                </div>

                                <div class="my-4">
                                    <label for="name" class="text-dark font_bold">Image Url</label>
                                    <input type="text" name="teacher{{$key}}_imageurl" class="form-control bg-white my-3" value="{{$teacher[3]}}">
                                </div>
                                
                                
                            </div>
                        @endforeach


                        <div class="update_btn mt-5">
                            <button class="btn_update shadow textuppercase">SAVE</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="tab-pane bg-white shadow my-4 p-2 rounded-3 fade" id="about-tab-pane" role="tabpanel" aria-labelledby="about-tab" tabindex="0">
                <div class="profile_form">
                    <!-- Testimonial Settings -->
                    <form action="{{route('update_about_us_settings')}}" method="POST">
                    @csrf
                        <h5 class="text-dark font_bold m-0">About Us Settings</h5>
                        <div class="my-4">
                            <label for="name" class="text-dark font_bold">Title</label>
                            <input name="title" type="text" class="form-control bg-transparent my-3"
                                value="{{app(\App\Settings\AboutUsSettings::class)->title}}">
                        </div>

                        <div class="my-4">
                            <label for="name" class="text-dark font_bold">Image Url</label>
                            <input name="image_url" type="text" class="form-control bg-transparent my-3"
                                value="{{app(\App\Settings\AboutUsSettings::class)->image_url}}">
                        </div>

                        <div class="my-4">
                            <label for="name" class="text-dark font_bold">Subtitle</label>
                            <textarea name="subtitle" cols="40" rows="2"
                                class="text_area_div bg-transparent my-3 form-control"
                                style="min-height: 100px; max-height: 130px;">{{app(\App\Settings\AboutUsSettings::class)->subtitle}}</textarea>
                        </div>


                        <div class="update_btn mt-5">
                            <button type="submit" class="btn_update shadow textuppercase">SAVE</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="tab-pane bg-white shadow my-4 p-2 rounded-3 fade" id="footer-tab-pane" role="tabpanel" aria-labelledby="footer-tab" tabindex="0">
                <div class="profile_form">
                    <form action="{{ route('update_footer_settings') }}" method="POST">
                    @csrf
                    <form>
                        <h5 class="text-dark font_bold m-0">Footer Settings</h5>
                        <div class="my-4">
                            <label for="name" class="text-dark font_bold">Copyright Text</label>
                            <input name="copyright_text" type="text" class="form-control bg-transparent my-3" value="{{$footerSettings['copyright_text']}}">
                        </div>
                        
                        <div class="my-4">
                            <label for="name" class="text-dark font_bold">Find Us</label>
                            <input name="address" type="text" class="form-control bg-transparent my-3" value="{{$footerSettings['footer_address']}}">
                        </div>

                        <div class="my-4">
                            <label for="name" class="text-dark font_bold">Call us</label>
                            <input name="contact" type="text" class="form-control bg-transparent my-3" value="{{$footerSettings['footer_contact']}}">
                        </div>

                        <div class="my-4">
                            <label for="name" class="text-dark font_bold">Mail us</label>
                            <input name="email" type="text" class="form-control bg-transparent my-3" value="{{$footerSettings['footer_email']}}">
                        </div>
                        
                        <div class="my-4">
                            <label for="name" class="text-dark font_bold">Subscribe us text</label>
                            <input name="subscribe_text" type="text" class="form-control bg-transparent my-3" value="{{$footerSettings['subscribe_text']}}">
                        </div>

                        <div class="my-4">
                            @if ($footerSettings['enable_links'] == true)
                                <div class="row m-0 align-items-center justify-content-between">
                                    <div class="col-10 labelParent">
                                        <label for="name" class="text-dark  ">
                                            Enable Footer Links (<span class="enable_disable_text">Enabled</span>)
                                        </label>
                                    </div>
                                    <div class="col-2 inputParent">
                                        <div class="form-check form-switch text-center">
                                            <input name="enable_links" class="form-check-input shadow-none border border-dark btn-lg enabled_text"
                                                type="checkbox" role="switch" id="enabled_text" checked>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="row m-0 align-items-center justify-content-between">
                                    <div class="col-10 labelParent">
                                        <label for="name" class="text-dark  ">
                                            Enable Footer Links (<span class="enable_disable_text">Disabled</span>)
                                        </label>
                                    </div>
                                    <div class="col-2 inputParent">
                                        <div class="form-check form-switch text-center">
                                            <input name="enable_links" class="form-check-input shadow-none border border-dark btn-lg enabled_text"
                                                type="checkbox" role="switch" id="enabled_text">
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                        
                        <div class="bg_secondary_light my-4 p-3">
                            <div class="row justify-content-between">
                                <div class="col-8">
                                    <h5 class="text-dark font_bold m-0">Link 1</h5>
                                </div>
                                <div class="col-2">
                                    @if(app(\App\Settings\FooterSettings::class)->footer_links[0][2] == true)
                                        <div class="form-check form-switch text-end">
                                            <input name="footer_link1" class="form-check-input shadow-none border border-dark btn-lg enabled_text"
                                                type="checkbox" role="switch" id="enabled_text" checked>
                                        </div>
                                    @else
                                        <div class="form-check form-switch text-end">
                                            <input name="footer_link1" class="form-check-input shadow-none border border-dark btn-lg enabled_text"
                                                type="checkbox" role="switch" id="enabled_text">
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <hr>
                            <div class="my-4">
                                <label for="name" class="text-dark font_bold">Link Text</label>
                                <input name="footer_link1_text" type="text" class="form-control bg-white my-3" value="{{app(\App\Settings\FooterSettings::class)->footer_links[0][0]}}">
                            </div>

                            <div class="my-4">
                                <label for="name" class="text-dark font_bold">Link</label>
                                <input name="footer_link1_url" type="text" class="form-control bg-white my-3" value="{{app(\App\Settings\FooterSettings::class)->footer_links[0][1]}}">
                            </div>
                        </div>

                        <div class="bg_secondary_light my-4 p-3">
                            <div class="row justify-content-between">
                                <div class="col-8">
                                    <h5 class="text-dark font_bold m-0">Link 2</h5>
                                </div>
                                <div class="col-2">
                                    @if(app(\App\Settings\FooterSettings::class)->footer_links[1][2] == true)
                                        <div class="form-check form-switch text-end">
                                            <input name="footer_link2" class="form-check-input shadow-none border border-dark btn-lg enabled_text"
                                                type="checkbox" role="switch" id="enabled_text" checked>
                                        </div>
                                    @else 
                                        <div class="form-check form-switch text-end">
                                            <input name="footer_link2" class="form-check-input shadow-none border border-dark btn-lg enabled_text"
                                                type="checkbox" role="switch" id="enabled_text">
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <hr>
                            <div class="my-4">
                                <label for="name" class="text-dark font_bold">Link Text</label>
                                <input name="footer_link2_text" type="text" class="form-control bg-white my-3" value="{{app(\App\Settings\FooterSettings::class)->footer_links[1][0]}}">
                            </div>

                            <div class="my-4">
                                <label for="name" class="text-dark font_bold">Link</label>
                                <input name="footer_link2_url" type="text" class="form-control bg-white my-3" value="{{app(\App\Settings\FooterSettings::class)->footer_links[1][1]}}">
                            </div>

                        </div>

                        <div class="bg_secondary_light my-4 p-3">
                            <div class="row justify-content-between">
                                <div class="col-8">
                                    <h5 class="text-dark font_bold m-0">Link 3</h5>
                                </div>
                                <div class="col-2">
                                    @if(app(\App\Settings\FooterSettings::class)->footer_links[2][2] == true)
                                        <div class="form-check form-switch text-end">
                                            <input name="footer_link3" class="form-check-input shadow-none border border-dark btn-lg enabled_text"
                                                type="checkbox" role="switch" id="enabled_text" checked>
                                        </div>
                                    @else 
                                        <div class="form-check form-switch text-end">
                                            <input name="footer_link3" class="form-check-input shadow-none border border-dark btn-lg enabled_text"
                                                type="checkbox" role="switch" id="enabled_text">
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <hr>
                            <div class="my-4">
                                <label for="name" class="text-dark font_bold">Link Text</label>
                                <input name="footer_link3_text" type="text" class="form-control bg-white my-3" value="{{app(\App\Settings\FooterSettings::class)->footer_links[2][0]}}">
                            </div>

                            <div class="my-4">
                                <label for="name" class="text-dark font_bold">Link</label>
                                <input name="footer_link3_url" type="text" class="form-control bg-white my-3" value="{{app(\App\Settings\FooterSettings::class)->footer_links[2][1]}}">
                            </div>
                        </div>

                        <div class="bg_secondary_light my-4 p-3">
                            <div class="row justify-content-between">
                                <div class="col-8">
                                    <h5 class="text-dark font_bold m-0">Link 4</h5>
                                </div>
                                <div class="col-2">
                                    @if(app(\App\Settings\FooterSettings::class)->footer_links[3][2] == true)
                                    <div class="form-check form-switch text-end">
                                        <input name="footer_link4" class="form-check-input shadow-none border border-dark btn-lg enabled_text"
                                            type="checkbox" role="switch" id="enabled_text" checked>
                                    </div>
                                    @else 
                                    <div class="form-check form-switch text-end">
                                        <input name="footer_link4" class="form-check-input shadow-none border border-dark btn-lg enabled_text"
                                            type="checkbox" role="switch" id="enabled_text">
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <hr>
                            <div class="my-4">
                                <label for="name" class="text-dark font_bold">Link Text</label>
                                <input name="footer_link4_text" type="text" class="form-control bg-white my-3" value="{{app(\App\Settings\FooterSettings::class)->footer_links[3][0]}}">
                            </div>

                            <div class="my-4">
                                <label for="name" class="text-dark font_bold">Link</label>
                                <input type="text" name="footer_link4_url" class="form-control bg-white my-3" value="{{app(\App\Settings\FooterSettings::class)->footer_links[3][1]}}">
                            </div>
                        </div>

                        <div class="bg_secondary_light my-4 p-3">
                            <div class="row justify-content-between">
                                <div class="col-8">
                                    <h5 class="text-dark font_bold m-0">Link 5</h5>
                                </div>
                                <div class="col-2">
                                    @if(app(\App\Settings\FooterSettings::class)->footer_links[4][2] == true)
                                    <div class="form-check form-switch text-end">
                                        <input name="footer_link5" class="form-check-input shadow-none border border-dark btn-lg enabled_text"
                                            type="checkbox" role="switch" id="enabled_text" checked>
                                    </div>
                                    @else
                                    <div class="form-check form-switch text-end">
                                        <input name="footer_link5" class="form-check-input shadow-none border border-dark btn-lg enabled_text"
                                            type="checkbox" role="switch" id="enabled_text">
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <hr>
                            <div class="my-4">
                                <label for="name" class="text-dark font_bold">Link Text</label>
                                <input name="footer_link5_text" type="text" class="form-control bg-white my-3" value="{{app(\App\Settings\FooterSettings::class)->footer_links[4][0]}}">
                            </div>

                            <div class="my-4">
                                <label for="name" class="text-dark font_bold">Link</label>
                                <input name="footer_link5_url" type="text" class="form-control bg-white my-3" value="{{app(\App\Settings\FooterSettings::class)->footer_links[4][1]}}">
                            </div>
                        </div>

                        <div class="bg_secondary_light my-4 p-3">
                            <div class="row justify-content-between">
                                <div class="col-8">
                                    <h5 class="text-dark font_bold m-0">Link 6</h5>
                                </div>
                                <div class="col-2">
                                    @if(app(\App\Settings\FooterSettings::class)->footer_links[5][2] == true)
                                        <div class="form-check form-switch text-end">
                                            <input name="footer_link6" class="form-check-input shadow-none border border-dark btn-lg enabled_text"
                                                type="checkbox" role="switch" id="enabled_text" checked>
                                        </div>
                                    @else
                                    <div class="form-check form-switch text-end">
                                    <input name="footer_link6" class="form-check-input shadow-none border border-dark btn-lg enabled_text"
                                            type="checkbox" role="switch" id="enabled_text">
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <hr>
                            <div class="my-4">
                                <label for="name" class="text-dark font_bold">Link Text</label>
                                <input name="footer_link6_text" type="text" class="form-control bg-white my-3" value="{{app(\App\Settings\FooterSettings::class)->footer_links[5][0]}}">
                            </div>

                            <div class="my-4">
                                <label for="name" class="text-dark font_bold">Link</label>
                                <input name="footer_link6_url" type="text" class="form-control bg-white my-3" value="{{app(\App\Settings\FooterSettings::class)->footer_links[5][1]}}">
                            </div>
                        </div>

                        <div class="my-4">
                            <div class="row m-0 align-items-center justify-content-between">
                                <div class="col-10 labelParent">
                                    <label for="name" class="text-dark  ">
                                        <!-- printing -->
                                        Enable Social Links (<span class="enable_disable_text">Enabled</span>)
                                    </label>
                                </div>
                                <div class="col-2 inputParent">
                                    @if($footerSettings['enable_social_links'] == true)
                                        <div class="form-check form-switch text-center">
                                            <input name="enable_social_links" class="form-check-input shadow-none border border-dark btn-lg enabled_text"
                                                type="checkbox" role="switch" id="enabled_text" checked>
                                        </div>
                                    @else 
                                        <div class="form-check form-switch text-center">
                                            <input name="enable_social_links" class="form-check-input shadow-none border border-dark btn-lg enabled_text"
                                                type="checkbox" role="switch" id="enabled_text">
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="bg_secondary_light my-4 p-3">
                            <div class="my-2">
                                <label for="name" class="text-dark font_bold">{{app(\App\Settings\FooterSettings::class)->social_links["facebook"][0]}}</label>
                                <div class="row justify-content-between align-items-center">
                                    <div class="col-3">
                                        @if(app(\App\Settings\FooterSettings::class)->social_links["facebook"][1] == true)
                                        <div class="form-check form-switch text-center">
                                            <input name="enable_facebook"
                                                class="form-check-input my-2 shadow-none border border-dark btn-lg enabled_text"
                                                type="checkbox" role="switch" id="enabled_text" checked>
                                        </div>
                                        @else 
                                        <div class="form-check form-switch text-center">
                                            <input name="enable_facebook"
                                                class="form-check-input my-2 shadow-none border border-dark btn-lg enabled_text"
                                                type="checkbox" role="switch" id="enabled_text">
                                        </div>
                                        @endif
                                    </div>
                                    <div class="col-8">
                                        <input name="facebook_link" type="text" class="form-control bg-transparent my-2" value="{{app(\App\Settings\FooterSettings::class)->social_links['facebook'][2]}}">
                                    </div>
                                </div>
                            </div>

                            <div class="my-2">
                                <label for="name" class="text-dark font_bold">{{app(\App\Settings\FooterSettings::class)->social_links["twitter"][0]}}</label>
                                <div class="row justify-content-between align-items-center">
                                    <div class="col-3">
                                        @if(app(\App\Settings\FooterSettings::class)->social_links["twitter"][1] == true)
                                        <div class="form-check form-switch text-center">
                                            <input name="enable_twitter"
                                                class="form-check-input my-2 shadow-none border border-dark btn-lg enabled_text"
                                                type="checkbox" role="switch" id="enabled_text" checked>
                                        </div>
                                        @else 
                                        <div class="form-check form-switch text-center">
                                            <input name="enable_twitter"
                                                class="form-check-input my-2 shadow-none border border-dark btn-lg enabled_text"
                                                type="checkbox" role="switch" id="enabled_text">
                                        </div>
                                        @endif
                                    </div>
                                    <div class="col-8">
                                        <input name="twitter_link" type="text" class="form-control bg-transparent my-2" value="{{app(\App\Settings\FooterSettings::class)->social_links['twitter'][2]}}">
                                    </div>
                                </div>
                            </div>

                            <div class="my-2">
                                <label for="name" class="text-dark font_bold">{{app(\App\Settings\FooterSettings::class)->social_links["youtube"][0]}}</label>
                                <div class="row justify-content-between align-items-center">
                                    <div class="col-3">
                                        @if(app(\App\Settings\FooterSettings::class)->social_links["youtube"][1] == true)
                                        <div class="form-check form-switch text-center">
                                            <input name="enable_youtube"
                                                class="form-check-input my-2 shadow-none border border-dark btn-lg enabled_text"
                                                type="checkbox" role="switch" id="enabled_text" checked>
                                        </div>
                                        @else 
                                        <div class="form-check form-switch text-center">
                                            <input name="enable_youtube"
                                                class="form-check-input my-2 shadow-none border border-dark btn-lg enabled_text"
                                                type="checkbox" role="switch" id="enabled_text">
                                        </div>
                                        @endif
                                    </div>
                                    <div class="col-8">
                                        <input name="youtube_link" type="text" class="form-control bg-transparent my-2" value="{{app(\App\Settings\FooterSettings::class)->social_links['youtube'][2]}}">
                                    </div>
                                </div>
                            </div>

                            <div class="my-2">
                                <label for="name" class="text-dark font_bold">{{app(\App\Settings\FooterSettings::class)->social_links["instagram"][0]}}</label>
                                <div class="row justify-content-between align-items-center">
                                    <div class="col-3">
                                        @if(app(\App\Settings\FooterSettings::class)->social_links["instagram"][1] == true)
                                            <div class="form-check form-switch text-center">
                                                <input name="enable_instagram"
                                                    class="form-check-input my-2 shadow-none border border-dark btn-lg enabled_text"
                                                    type="checkbox" role="switch" id="enabled_text" checked>
                                            </div>
                                        @else 
                                            <div class="form-check form-switch text-center">
                                                <input name="enable_instagram"
                                                    class="form-check-input my-2 shadow-none border border-dark btn-lg enabled_text"
                                                    type="checkbox" role="switch" id="enabled_text">
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-8">
                                        <input name="instagram_link" type="text" class="form-control bg-transparent my-2" value="{{app(\App\Settings\FooterSettings::class)->social_links['instagram'][2]}}">
                                    </div>
                                </div>
                            </div>

                            <div class="my-2">
                                <label for="name" class="text-dark font_bold">{{app(\App\Settings\FooterSettings::class)->social_links["linkedin"][0]}}</label>
                                <div class="row justify-content-between align-items-center">
                                    <div class="col-3">
                                        @if(app(\App\Settings\FooterSettings::class)->social_links["linkedin"][1] == true)
                                            <div class="form-check form-switch text-center">
                                                <input name="enable_linkedin"
                                                    class="form-check-input my-2 shadow-none border border-dark btn-lg enabled_text"
                                                    type="checkbox" role="switch" id="enabled_text" checked>
                                            </div>
                                        @else 
                                            <div class="form-check form-switch text-center">
                                                <input name="enable_linkedin"
                                                    class="form-check-input my-2 shadow-none border border-dark btn-lg enabled_text"
                                                    type="checkbox" role="switch" id="enabled_text">
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-8">
                                        <input name="linkedin_link" type="text" class="form-control bg-transparent my-2" value="{{app(\App\Settings\FooterSettings::class)->social_links['linkedin'][2]}}">
                                    </div>
                                </div>
                            </div>

                            <div class="my-2">
                                <label for="name" class="text-dark font_bold">{{app(\App\Settings\FooterSettings::class)->social_links["github"][0]}}</label>
                                <div class="row justify-content-between align-items-center">
                                    <div class="col-3">
                                        @if(app(\App\Settings\FooterSettings::class)->social_links["github"][1] == true)
                                        <div class="form-check form-switch text-center">
                                            <input name="enable_github"
                                                class="form-check-input my-2 shadow-none border border-dark btn-lg enabled_text"
                                                type="checkbox" role="switch" id="enabled_text" checked>
                                        </div>
                                        @else 
                                        <div class="form-check form-switch text-center">
                                            <input name="enable_github"
                                                class="form-check-input my-2 shadow-none border border-dark btn-lg enabled_text"
                                                type="checkbox" role="switch" id="enabled_text">
                                        </div>
                                        @endif
                                    </div>
                                    <div class="col-8">
                                        <input name="github_link" type="text" class="form-control bg-transparent my-2" value="{{app(\App\Settings\FooterSettings::class)->social_links['github'][2]}}">
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="update_btn mt-5">
                            <button type="submit" class="btn_update shadow textuppercase">SAVE</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- <div class="profile_form">
            CTA Settings
            <form>
                <h5 class="text-dark font_bold m-0">CTA Settings</h5>

                <div class="my-4">
                    <label for="name" class="text-dark font_bold">Title</label>
                    <input type="text" class="form-control bg-transparent my-3" value="{{$ctaSettings['title']}}">
                </div>

                <div class="my-4">
                    <label for="name" class="text-dark font_bold">Subtitle</label>
                    <textarea name="description" cols="40" rows="2"
                        class="text_area_div bg-transparent my-3 form-control"
                        style="min-height: 100px; max-height: 130px;">{{$ctaSettings['subtitle']}}</textarea>
                </div>

                <div class="my-4">
                    <label for="name" class="text-dark font_bold">Button Text</label>
                    <input type="text" class="form-control bg-transparent my-3" value="{{$ctaSettings['button_text']}}">
                </div>

                <div class="my-4">
                    <label for="name" class="text-dark font_bold">Button Link</label>
                    <input type="text" class="form-control bg-transparent my-3" value="{{$ctaSettings['button_link']}}">
                </div>

                <div class="update_btn mt-5">
                    <button class="btn_update shadow textuppercase">SAVE</button>
                </div>
            </form>
        </div> -->

    </section>

    @include('parentsidebar.sidebarending')

    <script>
        $(document).ready(function () {
            $(".enabled_text").click(function(){
                let _this = $(this);
                if (_this.is(':checked')) {
                    _this.parent(".form-check").parent(".inputParent").siblings(".labelParent").find(".enable_disable_text").html("Enabled");
                }
                else {
                    _this.parent(".form-check").parent(".inputParent").siblings(".labelParent").find(".enable_disable_text").html("Disabled");
                }
            });
            $('#favicon_logo').on('change', function (e) {
                const file = e.target.files[0];
                const reader = new FileReader();
                reader.onload = function () {
                    $('.favicon_logoPreview').attr('src', reader.result);
                };
                reader.readAsDataURL(file);
            });
            $('#site_logo').on('change', function (e) {
                const file = e.target.files[0];
                const reader = new FileReader();
                reader.onload = function () {
                    $('.site_logoPreview').attr('src', reader.result);
                };
                reader.readAsDataURL(file);
            });
            $('#white_logo').on('change', function (e) {
                const file = e.target.files[0];
                const reader = new FileReader();
                reader.onload = function () {
                    $('.white_logoPreview').attr('src', reader.result);
                };
                reader.readAsDataURL(file);
            });
        });
        // $("#updateHomePageSettings").click(function(e){
        //     console.log("ok");
        // });
    </script>

</body>

</html>