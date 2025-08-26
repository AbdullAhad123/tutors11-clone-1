<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        @if(Auth::user()->hasRole('parent'))
            Parent 
        @elseif(Auth::user()->hasRole('teacher'))
            Teacher 
        @elseif(Auth::user()->hasRole('student'))
            Student 
        @elseif(Auth::user()->hasRole('instructor'))
            Instructor 
        @elseif(Auth::user()->hasRole('admin'))
            Admin 
        @endif
        Profile
    </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- rel icon -->
    <link rel="icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}">
    <meta name="description" content="{{ app(\App\Settings\SiteSettings::class)->seo_description }}">
    <meta name="author" content="{{ app(\App\Settings\SiteSettings::class)->app_name }}">
    <style>
        .small.text-danger {
            margin-top: -1rem; /* Adjust as needed */
        }
            .bs-gutter-x{--bs-gutter-x: 0 !important;}
            .font-size-13{font-size:13px !important}
            #imagePreview{background-size: cover;background-repeat: no-repeat;}
            #profile_photo_container {
                height: 100px;
                width: 100px;
            }
            .btn_upload_photo {
                background: linear-gradient(#43c360, #2aa457)
            }

            .btn_remove_photo {
                background: linear-gradient(#ff5252, #d72929)
            }

            .btn_save_info {
                background: #004bb2!important;  
            }

            .custom_profile_inputs {
                width: 100%;
                border: transparent;
                border-bottom: 1px solid darkgrey!important;
                display: block;
                height: 2.6em;
                font-size: 1.05rem;
                outline: none;
            }

            .custom_profile_inputs::placeholder {
                color: #868686!important;
            }

            .form_label_text {
                color: #505050;
            }

            .filled_input {
                background: #f3f9ff;
            }

            .avatar_store_section {
                height: 420px;
                width: auto;
                overflow: auto;
            }
            .display_cards {
                height: auto;
                width: auto;
                box-shadow: 0px 4px 6px 0px #0000002b !important;
            }
            
            .exp_coins_container {
                position: absolute;
                top: -15px;
                right: 0px;
            }
            .nav-pills .nav-link.active, .nav-pills .nav-link.active:hover, .nav-pills .nav-link.active:focus{
                background-color:#8080800f !important;
            }
    </style>

    <style>
        .profile_header_section {
            margin-bottom: 155px
        }
        .profile_header{
            height: 320px;
            background: linear-gradient(357deg, #0068ff36, #3800ff36) , url('../images/profile_banner.jpg') top no-repeat;
            background-size: cover;
        }
        @media (max-width: 575px) {
            .profile_header_bg {
                width: 280px!important;
            }
            .profile_header {
                height: 280px!important
            }
            .user_profile_image {
                height: 140px !important;
                width: 140px !important;
            }
            .setting_nav_tabs {
                justify-content: space-around;
            }
        }

        .quick_details{
            position: absolute;
            bottom: -130px;
            left: 0px;
            right: 0px;
        }

        .user_profile_image {
            height: 180px;
            width: 180px;
            margin: auto;
        }
        .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
            color: #2189ff !important;
            border-bottom: 2px solid #2189ff !important;
        }

        .form-control:disabled, .form-control[readonly] {
            background-color: #f7f8fa;
            opacity: 0.95;
        }

        .user_profile_photo {
            height: 100px;
            width: 100px;
            transition: 0.2s
        }

        .profile_photo_shade {
            background: #00000035;
            display: none;
            transition: 0.2s;
        }

        .user_profile_photo:hover .profile_photo_shade {
            display: block
        }

        .input_control {
            border: none !important;
            border-bottom: 1px solid #0000002e !important;
        }

        .update_information_box {
            position: relative;
        }

        .confirm_password_btn{
            top:11px;
            right:0px;
            transition: transform 3s ease-in-out;
        }     
        .current_password_btn{
            top:11px;
            right:0px;
            transition: transform 3s ease-in-out;
        }
        .new_password_btn{
            top:11px;
            right:0px;
            transition: transform 3s ease-in-out;
        } 
        .password_btn{
            top:12px;
            right:11px;
            transition: transform 3s ease-in-out;
        }

        .success_alert {
            transition: 500ms;
            transform: translateY(-120%);
            z-index: 200;
        }
        
        .show_alert {
            transition: 500ms;
            transform: translateY(0%);
        }

        .new_badge_dot {
            height: 12px !important;
            width: 12px !important;
            animation: animate_dot 2s infinite linear;
        }

        @keyframes animate_dot {
            0% {
                transform: scale(0);
            }            
            50% {
                transform: scale(1);
            }            
            100% {
                transform: scale(0);
            }            
        }
    </style>
</head>

<body>
    @include('sidebar')
    @include('header')

    @if (Auth::user()->hasrole('admin') || Auth::user()->hasrole('instructor'))
        <section class="p-4">
    @else
        <section>
    @endif


    {{--<div class="row bs-gutter-x py-4 justify-content-center">
        <div class="col-lg-8 col-md-10 col-12">
            <div class="bg-white rounded-3 shadow overflow-hidden p-3">
                <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="{{$id}}" name="id">
                    <div class="px-4">
                        <h3 class="text-dark my-3">Profile Information</h3>
                        <hr>
                        <p class="fs_cs_5 fw-medium mb-2 text-dark">Profile Photo</p>
                        <div class="overflow-hidden my-4 rounded-circle shadow mx-auto" id="profile_photo_container">
                            <input type='file' name="photo" id="imageUpload" accept=".png, .jpg, .jpeg, .webp" class="d-none"/>
                            <div id="imagePreview" ></div>
                            @if($profile_photo_path)
                                <img id="currentPhoto" height="auto" width="100" src="/{{ $profile_photo_path }}" alt="{{$first_name}} {{$last_name}}">
                            @else
                                <img class="no-profile" id="currentPhoto" height="auto" width="100" src="{{url('images/\user_avatar.webp')}}" alt="{{$first_name}} {{$last_name}}">
                            @endif
                        </div>
                        <div id="imagePreview"></div>
                        <div class="text-center my-3">
                            <button id="selectPhoto" class="text-uppercase px-3 bg-light shadow-sm fw-normal text-white btn me-2" data-bs-toggle="tooltip" data-bs-html="true" data-bs-title="Upload Photo">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24" style="fill: #2aa457;"><path d="M11 15h2V9h3l-4-5-4 5h3z"></path><path d="M20 18H4v-7H2v7c0 1.103.897 2 2 2h16c1.103 0 2-.897 2-2v-7h-2v7z"></path></svg>
                            </button>
                            <button id="removePhoto" class="text-uppercase px-3 bg-light shadow-sm fw-normal text-white btn ms-2" data-bs-toggle="tooltip" data-bs-html="true" data-bs-title="Remove Photo">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24" style="fill: #d72929"><path d="M2 3h20v4H2zm17 5H3v11a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V8h-2zm-3 6H8v-2h8v2z"></path></svg>
                            </button>
                        </div>
                        <div class="form-group mt-4 mb-3">
                            <label class="form_label_text fs_cs_5 fw-medium mb-2" for="first_name">First Name</label>
                            @if($first_name)
                                <input type="text" class="px-3 custom_profile_inputs filled_input border-0 text-dark" placeholder="First Name" name="first_name" id="first_name" value="{{$first_name}}">
                            @else
                                <input type="text" class="px-3 custom_profile_inputs text-dark" placeholder="First Name" name="first_name" id="first_name" value="{{$first_name}}">
                            @endif
                        </div>
                        <div class="form-group my-3">
                            <label class="form_label_text fs_cs_5 fw-medium mb-2" for="last_name">Last Name</label>
                            @if($last_name)
                                <input type="text" class="px-3 custom_profile_inputs filled_input border-0 text-dark" placeholder="Last Name" id="last_name" name="last_name" value="{{$last_name}}">
                            @else
                                <input type="text" class="px-3 custom_profile_inputs text-dark" placeholder="Last Name" id="last_name" name="last_name" value="{{$last_name}}">
                            @endif
                        </div>
                        <div class="form-group my-3">
                            <label class="form_label_text fs_cs_5 fw-medium mb-2" for="email">Email Address</label>
                            @if($email)
                                <input type="email" class="px-3 custom_profile_inputs filled_input border-0 text-dark" placeholder="xyz@gmail.com" id="email" name="email" value="{{$email}}">
                            @else 
                                <input type="email" class="px-3 custom_profile_inputs text-dark" placeholder="xyz@gmail.com" id="email" name="email" value="{{$email}}">
                            @endif
                        </div>
                        <div class="p-4 py-3 text-end">
                            <button type="submit" class="btn btn_save_info text-white text-uppercase px-4" id="saveProfileInfo">Save</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <div class="row bs-gutter-x py-4 justify-content-center">
        <div class="col-lg-8 col-md-10 col-12">
            <div class="bg-white rounded-3 shadow overflow-hidden p-3">
                <input type="hidden" value="{{$id}}" name="password_id" id="password_id">
                <div class="px-4">
                    <h3 class="text-dark my-3">Update Password</h3>
                    <hr class="my-4">
                    <div class="form-group my-3">
                        <label class="form_label_text fs_cs_5 fw-medium mb-2" for="current_password">Current Password:</label>
                        <input type="password" name="current_password" class="px-3 mb-3 custom_profile_inputs text-dark" placeholder="Current Password" id="current_password">
                    </div>
                    <div class="form-group my-3">
                        <label class="form_label_text fs_cs_5 fw-medium mb-2" for="password">New Password:</label>
                        <input type="password" name="password" class="px-3 custom_profile_inputs text-dark mb-3" placeholder="New Password" id="password">
                    </div>
                    <div class="form-group my-3">
                        <label class="form_label_text fs_cs_5 fw-medium mb-2" for="password_confirmation">Confirm Password:</label>
                        <input type="password" name="password_confirmation" class="px-3 mb-3 custom_profile_inputs text-dark" placeholder="Confirm Password" id="password_confirmation">
                    </div>
                    <div id="passwordErrors" class="text-danger font-size-13"></div>
                </div>
                <div class="px-4 py-3 text-end">
                    <button class="btn btn_save_info text-white text-uppercase px-4" id="savePassword">Save</button>
                </div>
            </div>
        </div>
    </div>--}}

    @if(session('error'))
        <div class="alert alert-danger shadow-sm">
            {{ session('error') }}
        </div>
    @endif

    @if(session('success'))
        <div class="alert alert-success shadow-sm text-dark">
            {{ session('success') }}
        </div>
    @endif

    <!-- Child header section -->
    <section class="profile_header_section position-relative">
        <div class="profile_header my-3 rounded-5">   
        </div>
        <div class="quick_details">
            <div class="user_profile_image rounded-circle shadow position-relative" style="background: url('{{ url($profile_photo_path) }}') top center no-repeat; background-size: cover;">
                @if(Auth::user()->hasRole('student'))    
                    <a  class="exp_coins_container bg-white shadow rounded-pill p-3 py-2 d-flex align-items-center">
                        <img src="{{url('images\reward.png')}}" height="25" width="25" alt="reward coin">
                        <span class="fw-bold m-0 ms-1 text-dark">{{$total_coins}}</span>
                    </a>
                @endif
            </div>
            <h1 class="fw-bold my-2 text-center text-dark">{{Auth::user()->first_name}} {{Auth::user()->last_name}}</h1>
            <p class="fs_cs_5 mt-2 text-center">Update and Manage your personal information in one click!</p>
        </div>
    </section>

    @if(Auth::user()->hasRole('student'))
        <section class="bg-white my-5 mb-3 p-4 rounded-4 shadow-sm">
            <ul class="nav nav-tabs setting_nav_tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link bg-transparent fw-normal px-lg-4 px-md-4 px-sm-3 px-1 active" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="true">Profile</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link bg-transparent fw-normal px-lg-4 px-md-4 px-sm-3 px-1 " id="password-tab" data-bs-toggle="tab" data-bs-target="#password" type="button" role="tab" aria-controls="password" aria-selected="true">Password</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link bg-transparent fw-normal px-lg-4 px-md-4 px-sm-3 px-1" id="avatars-tab" data-bs-toggle="tab" data-bs-target="#avatars" type="button" role="tab" aria-controls="avatars" aria-selected="false">My Avatars</button>
                </li>   
                <li class="nav-item" role="presentation">
                    <button class="nav-link bg-transparent fw-normal px-lg-4 px-md-4 px-sm-3 px-1" id="avatarShop-tab" data-bs-toggle="tab" data-bs-target="#avatarShop" type="button" role="tab" aria-controls="avatarShop" aria-selected="false">Avatars Shop</button>
                </li>
            </ul>
           
            <div class="tab-content px-1 pb-0">
                <div class="tab-pane active" id="profile" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                    <div class="d-flex align-items-center my-3">
                        <div>
                            <div class="dropdown">
                                <button id='selectPhoto' class="user_profile_photo overflow-hidden p-0 border-0 my-3 rounded-circle shadow" style="background: url('{{ url($profile_photo_path) }}'); background-position: top center; background-repeat: no-repeat; background-size: cover;">
                                    <div class="profile_photo_shade h-100 w-100">
                                        <div class=" d-flex justify-content-center h-100 w-100 align-items-center">
                                            <i class='bx bx-camera text-white' ></i>
                                        </div>
                                    </div>
                                </button>
                                <ul class="dropdown-menu">
                                    <li class='my-2'><a class="dropdown-item bg-white d-flex align-items-center" type='button' id='selectPhoto'><i class='bx fs-4 bx-image-add' ></i><span class="m-0 ms-1">Upload Photo</span></a></li>
                                    <li class='my-2 pe-3'><a class="dropdown-item bg-white d-flex align-items-center" type='button' id='selectAvatar'><i class='bx fs-4 bx-user-circle'></i><span class="m-0 ms-1">Select an Avatar</span></a></li>
                                </ul>
                            </div>
                            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                                <input type='file' name="photo" id="imageUpload" accept=".png, .jpg, .jpeg, .webp" class="d-none"/>
                                <input type="submit" id="btn_save_img" class="d-none">
                            </form>
                        </div>
                        <div class='ms-3 upload_img_data'>
                            <h2 class="h5 text-dark m-0"> {{Auth::user()->first_name}}  {{Auth::user()->last_name}}</h2>
                            <p class="mb-2 mt-1 small">Tutorselevenplus Student</p>
                        </div>
                    </div>
                    <!-- <div class="profile_settings_section my-3 mb-4">
                        <div class="d-flex justify-content-between align-items-center my-2 border-bottom pb-2 mb-3">
                            <h2 class="h4 mb-0">Profile Information</h2>
                            <div>
                                <button class="bg-transparent border border-2 border-secondary btn btn-sm rounded-3 rounded-pill shadow-sm" data-bs-toggle="modal" data-bs-target="#personal_info">
                                    Edit
                                    <i class="bx bx-edit-alt"></i>
                                </button>
                            </div>
                        </div>
                        <div class="row justify-content-between align-items-center">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="mb-4">
                                    <label for="static_first_name" class="text-uppercase">First Name</label>
                                    <input type="text" class="bg-body-tertiary py-3 form-control shadow-none text-dark-emphasis input_control rounded-4 my-1" id="static_first_name" value="{{Auth::user()->first_name}}" readonly="true">
                                </div> 
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="mb-4">
                                    <label for="static_last_name" class="text-uppercase">Last Name</label>
                                    <input type="text" class="bg-body-tertiary py-3 form-control shadow-none text-dark-emphasis input_control rounded-4 my-1" id="static_last_name" value="{{Auth::user()->last_name}}" readonly="true">
                                </div> 
                            </div>
                        </div>
                        <div class="row justify-content-between align-items-center">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="mb-4">
                                    <label for="static_email" class="text-uppercase">Email Address</label>
                                    <input type="email" class="bg-body-tertiary py-3 form-control shadow-none text-dark-emphasis input_control rounded-4 my-1" id="static_email" value="{{ Auth::user()->email }}" readonly="true">
                                </div> 
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="mb-4">
                                    <label for="static_username" class="text-uppercase">Username</label>
                                    <input type="text" class="bg-body-tertiary py-3 form-control shadow-none text-dark-emphasis input_control rounded-4 my-1" id="static_username" value="{{ Auth::user()->user_name }}" readonly="true">
                                </div> 
                            </div>
                        </div>
                        <div class="row justify-content-between align-items-center">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="mb-4">
                                    <label for="static_user_role" class="text-uppercase">User Role</label>
                                    <input type="text" class="bg-body-tertiary py-3 form-control text-uppercase shadow-none text-dark-emphasis input_control rounded-4 my-1" id="static_user_role" value="{{Auth::user()->roles[0]->name}}" readonly="true">
                                </div> 
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="mb-4">
                                    <label for="static_referral_code" class="text-uppercase">Referral Code</label>
                                    <input type="text" class="bg-body-tertiary py-3 form-control shadow-none text-dark-emphasis input_control rounded-4 my-1" id="static_referral_code" value="" readonly="true">
                                </div> 
                            </div>
                        </div>
                    </div> -->
                    <!-- <div class="modal fade" id="personal_info" tabindex="-1" aria-labelledby="personal_infoLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-body update_information_box bg-body rounded-4">
                                    <button class="btn bg-transparent border-0 shadow-none p-1 position-absolute btn-close" style='top: 35px; right: 35px;' data-bs-dismiss="modal" aria-label="Close"></button>
                                    <h2 class="h4 text-center my-1">Update Information</h2>
                                    <hr class='my-2 mb-3'>
                                    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control shadow-sm" name="first_name" id="first_name" placeholder="enter first name" value="{{ Auth::user()->first_name}}" required>
                                            <label class="text-dark" for="first_name">First Name</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control shadow-sm" name="last_name" id="last_name" placeholder="enter last name" value="{{ Auth::user()->last_name}}" required>
                                            <label class="text-dark" for="last_name">Last Name</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control shadow-sm" name="user_name" id="user_name" placeholder="enter username" value="{{ Auth::user()->user_name}}" required>
                                            <label class="text-dark" for="user_name">Username</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="email" class="form-control shadow-sm" name="email" id="email" placeholder="enter email" value="{{ Auth::user()->email}}" required>
                                            <label class="text-dark" for="email">Email Address</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="password" class="form-control shadow-sm" name="current_password" id="current_password" placeholder="current password" required>
                                            <label class="text-dark" for="current_password">Current Password</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="password" class="form-control shadow-sm" name="password" id="password" placeholder="new password" required>
                                            <label class="text-dark" for="password">New Password</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <button type="submit" class="btn btn-primary w-100 p-2">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    @csrf
                    <div class="profile_details">
                        <h3 class="fs-4 fw-bold">Profile Details</h3>
                        <div class="row justify-content-between  mt-3">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="mb-4">
                                    <label  class="text-uppercase">First Name</label>
                                    <input type="text" value="{{Auth::user()->first_name}}" name="first_name" id="first_name" placeholder="Enter First Name" class="bg-body-tertiary py-3 form-control shadow-none text-dark-emphasis input_control rounded-4 my-1" id="static_first_name"  >
                                    <span class="small my-1 text-danger d-none" id="firstName_error"></span>
                                </div> 
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="mb-4">
                                    <label class="text-uppercase" >Last Name</label>
                                    <input type="text"  value="{{Auth::user()->last_name}}" name="last_name" id="last_name"   placeholder="Enter Last Name" class="bg-body-tertiary py-3 form-control shadow-none text-dark-emphasis input_control rounded-4 my-1" id="static_last_name" >
                                    <span class="small my-1 text-danger d-none" id="lastName_error"></span>
                                </div> 
                            </div>
                        </div>
                        <div class="row justify-content-between mt-2">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="mb-4">
                                    <label  class="text-uppercase">Username</label>
                                    <input type="text"  value="{{Auth::user()->user_name}}" name="user_name" id="user_name" placeholder="Enter User Name" class="bg-body-tertiary py-3 form-control shadow-none text-dark-emphasis input_control rounded-4 my-1" >
                                    <p class="small my-1 text-danger d-none" id="userName_error"></p>
                                </div> 
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="mb-4">
                                    <label  class="text-uppercase">Current Password</label>
                                    <div class="position-relative">
                                        <input type="password" name="current_password" id="current_password" placeholder="Enter Current Password" class="bg-body-tertiary py-3 form-control shadow-none text-dark-emphasis input_control rounded-4 my-1" >
                                        <button class="btn password_btn position-absolute border-0 d-none" >
                                            <i class="fa-solid fa-eye"></i>
                                        <!-- <i class="fa-solid fa-eye-slash hide_pass_icon d-none"></i> -->
                                        </button>
                                    </div>
                                    <p class="small my-1 text-danger d-none" id="currentpass_error"></p>

                                </div> 
                            </div>
                        </div>
                        <div id="profileErrors" class="text-danger font-size-16"></div>
                    </div>
                    <button type="submit"  id="save_profile_info" class="d-flex ms-auto btn px-4 py-2 text-white rounded-5 bg-primary align-items-center">Update <i class="d-none bx bx-loader-alt bx-spin ms-1"></i></button>
                </div>
                <div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab" tabindex="0">
                    <!-- Password Setting -->
                  <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-12">
                       <img src="https://img.freepik.com/premium-vector/flat-illustration-design-cybersecurity_9206-2585.jpg?w=740" width="250" height="250" alt="">
                    </div>
                    <div class="col-lg-9 col-md-4 col-sm-12">
                    <div class="profile_details">
                        <h3 class="fs-4 fw-bold">Password Details</h3>
                        <h5 class="fs-5 mt-5">Password</h5>
                        <div class="row justify-content-between mt-3">
                            <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                                <div class="mb-4">
                                    <label class="text-uppercase">Current Password</label>   
                                    <div class="position-relative">
                                        <input type="password" id="currentpassword" placeholder="Enter Current Password" class="bg-body-tertiary py-3 form-control shadow-none text-dark-emphasis input_control rounded-4 my-1"  >
                                        <button class="position-absolute btn border-0 current_password_btn d-none" >
                                            <i class="fa-solid fa-eye"></i>
                                        </button>
                                    </div>       
                                    <p class="small my-1 text-danger d-none" id="currentpasserror"></p>                                   
                                </div> 
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                                <div class="mb-4">
                                    <label class="text-uppercase">New Password</label>
                                    <div class="position-relative">
                                        <input placeholder="Enter New Password" id="newpassword" type="password" class="bg-body-tertiary py-3 form-control shadow-none text-dark-emphasis input_control rounded-4 my-1" >
                                        <button class="position-absolute btn border-0 new_password_btn d-none" >
                                            <i class="fa-solid fa-eye"></i>
                                        </button>
                                    </div>
                                    <p class="small my-1 text-danger d-none" id="newpasserror"></p>
                                </div> 
                            </div>
                            <div class="mb-4">
                                <label class="text-uppercase">Confirm Password</label>
                                <div class="position-relative">
                                    <input placeholder="Enter Confirm Password" id="confirmpassword" type="password" class="bg-body-tertiary py-3 form-control shadow-none text-dark-emphasis input_control rounded-4 my-1" >
                                    <button class="position-absolute btn border-0 confirm_password_btn d-none">
                                        <i class="fa-solid fa-eye "></i>
                                    </button>
                                </div>
                                <p class="small my-1 text-danger d-none" id="confirmpasserror"></p>
                            </div> 
                            <div id="passwordErrors" class="text-danger font-size-16"></div>
                        </div>
                        <p class="my-2">Cann't Remember Your Current Password? <a href="/login/identify" class="text-primary">Reset Your Password</a></p>
                        <button id="save_password_info" class="d-flex ms-auto btn px-4 py-2mt-2 text-white rounded-5 bg-primary" >
                            Update <i class="d-none bx bx-loader-alt bx-spin ms-1"></i>  
                        </button>
                    </div>
                     </div>
                  </div>
                 
                </div> 
                <div class="tab-pane" id="avatars" role="tabpanel" aria-labelledby="avatars-tab" tabindex="0">
                    <div class="align-items-center d-flex flex-wrap justify-content-center my-2">
                        @if(count($user_avatars) > 0)
                            @foreach($user_avatars as $user_avatar)
                                <div class="display_cards m-3 rounded-4 overflow-hidden">
                                    <div class="avatar_image" style="background:  url({{$user_avatar->path}}) top no-repeat; background-size: cover; height: 280px; width: 280px;">
                                        <div class="h-100 position-relative w-100" style="background: linear-gradient(359deg, #00000065, transparent 78%)">
                                            <h2 class="bottom-0 end-0 h5 position-absolute start-0 text-center text-dark text-white">{{$user_avatar->title}}</h2>
                                        </div>
                                    </div>
                                    <div class="my-3 text-center" data-id="{{$user_avatar->avatar_id}}">
                                        @if($user_avatar->is_selected)
                                            <button class="align-items-center border border-1 border-secondary btn btn-sm d-flex disabled mx-auto p-2 px-3 rounded-pill" id="selected">
                                                <svg class="me-1" xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" style="fill: #878787;"><path d="m10 15.586-3.293-3.293-1.414 1.414L10 18.414l9.707-9.707-1.414-1.414z"></path></svg>
                                                Selected
                                            </button>
                                        @else
                                            <button class="btn btn-outline-primary btn-sm mx-auto p-2 px-3 rounded-pill choose_avatar">Choose Avatar</button>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        @else
                            No avatar available
                        @endif
                    </div>
                </div>
   

                <div class="tab-pane" id="avatarShop" role="tabpanel" aria-labelledby="avatarShop-tab" tabindex="0">
                    <div class="avatar_cards_container align-items-center d-flex flex-wrap justify-content-center my-2">
                        @if(count($shop_avatars) > 0)
                            @foreach($shop_avatars as $avatar)
                                <div class="display_cards m-3 rounded-4 overflow-hidden">
                                    <div class="avatar_image" style="background:  url({{$avatar['path']}}) top no-repeat; background-size: cover; height: 230px; width: 230px;">
                                        <div class="h-100 position-relative w-100" style="background: linear-gradient(359deg, #00000065, transparent 78%)">
                                            <h2 class="bottom-0 end-0 h5 position-absolute start-0 text-center text-dark text-white">{{$avatar['title']}}</h2>
                                            @php
                                                $differenceInDays = \Carbon\Carbon::parse($avatar['created_at'])->diffInDays(\Carbon\Carbon::now());
                                            @endphp
                                            @if($differenceInDays < 7)
                                                <div class="bg-warning cursor-pointer end-0 font-monospace fw-semibold m-2 position-absolute px-1 rounded-pill small text-danger text-uppercase top-0" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Newly Added Avatar!" role="status" data-bs-original-title="" title="">
                                                    <span>New</span>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="my-3">
                                        @if($avatar['status'] == "Available")
                                            <button class="align-items-center btn btn-primary btn-sm d-flex mx-auto p-2 px-3 rounded-pill purchase_avatar" data-bs-toggle="modal" data-bs-target="#purchase_avatar_{{$avatar['id']}}_confirmation"><img src="{{url('images/reward.png')}}" height="20" width="20" alt="r{{$avatar['title']}}" class="me-1">{{$avatar['points']}}</button>
                                        @else
                                            <button class="align-items-center border border-1 border-secondary btn btn-sm d-flex disabled mx-auto p-2 px-3 rounded-pill">
                                                <svg class="me-1" xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" style="fill: #878787;"><path d="m10 15.586-3.293-3.293-1.414 1.414L10 18.414l9.707-9.707-1.414-1.414z"></path></svg>
                                                Owned
                                            </button>
                                        @endif
                                    </div>
                                </div>
                                @if($avatar['status'] == "Available")
                                    <div class="modal fade" id="purchase_avatar_{{$avatar['id']}}_confirmation" tabindex="-1" aria-labelledby="{{$avatar['title']}}" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-lg">
                                            <div class="modal-content rounded-0">
                                                <div class="modal-body rounded-0 p-2">
                                                    <button class="btn bg-transparent border-0 shadow-none p-1 position-absolute btn-close" style='top: 35px; right: 35px;' data-bs-dismiss="modal" aria-label="Close"></button>
                                                    <div class="mx-auto text-center">
                                                        <form action="{{route('buy_avatar', ['id' => $avatar['id']])}}" method="post">
                                                        @csrf
                                                            <img src="{{$avatar['path']}}" width="140" height="auto" class="my-3 rounded-4" alt="{{$avatar['title']}}">
                                                            <h2 class="text-center h3">{{$avatar['title']}}</h2>
                                                            <p class="text-center my-2 fs-5">Are You sure want to buy this avatar for {{$avatar['points']}} coins?</p>
                                                            <div class="align-items-center d-flex justify-content-center my-3">
                                                                <button type="submit" class="btn btn-primary m-2 p-2 px-4 rounded-pill">Buy Now</button>
                                                                <button class="btn btn-outline-danger m-2 p-2 px-4 rounded-pill" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @else
                            No avatar available
                        @endif
                    </div>
                </div>
            </div>
        </section>
    @else
        <!-- <section class="bg-white my-5 mb-3 p-4 rounded-4 shadow-sm">
            <div class="tab-pane active" id="general" role="tabpanel" aria-labelledby="general-tab" tabindex="0">
                <div class="d-flex align-items-center my-3">
                    <div>
                        <div class="dropdown">
                            <button id='selectPhoto' class="user_profile_photo overflow-hidden p-0 border-0 my-3 rounded-circle shadow" style="background: url('{{ url($profile_photo_path) }}'); background-position: top center; background-repeat: no-repeat; background-size: cover;">
                                <div class="profile_photo_shade h-100 w-100">
                                    <div class=" d-flex justify-content-center h-100 w-100 align-items-center">
                                        <i class='bx bx-camera text-white' ></i>
                                    </div>
                                </div>
                            </button>
                           
                        </div>
                        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                            <input type='file' name="photo" id="imageUpload" accept=".png, .jpg, .jpeg, .webp" class="d-none"/>
                            <input type="submit" id="btn_save_img" class="d-none">
                        </form>
                    </div>
                    <div class='ms-3 upload_img_data'>
                        <h2 class="h5 text-dark m-0"> {{Auth::user()->first_name}}  {{Auth::user()->last_name}}</h2>
                        <p class="mb-2 mt-1 small">Tutorselevenplus 
                            @if(Auth::user()->hasRole('parent'))
                                Parent 
                            @elseif(Auth::user()->hasRole('instructor'))
                                Tutor
                            @elseif(Auth::user()->hasRole('admin'))
                                Admin
                            @endif
                        </p>
                    </div>
                </div>
                <div class="profile_settings_section my-3 mb-4">
                    <div class="d-flex justify-content-between align-items-center my-2 border-bottom pb-2 mb-3">
                        <h2 class="h4 mb-0">Profile Information</h2>
                        <div>
                            <button class="bg-transparent border border-2 border-secondary btn btn-sm rounded-3 rounded-pill shadow-sm" data-bs-toggle="modal" data-bs-target="#personal_info">
                                Edit
                                <i class="bx bx-edit-alt"></i>
                            </button>
                        </div>
                    </div>
                    <div class="row justify-content-between align-items-center">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="mb-4">
                                <label for="static_first_name" class="text-uppercase">First Name</label>
                                <input type="text" class="bg-body-tertiary py-3 form-control shadow-none text-dark-emphasis input_control rounded-4 my-1" id="static_first_name" value="{{Auth::user()->first_name}}" readonly="true">
                            </div> 
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="mb-4">
                                <label for="static_last_name" class="text-uppercase">Last Name</label>
                                <input type="text" class="bg-body-tertiary py-3 form-control shadow-none text-dark-emphasis input_control rounded-4 my-1" id="static_last_name" value="{{Auth::user()->last_name}}" readonly="true">
                            </div> 
                        </div>
                    </div>
                    <div class="row justify-content-between align-items-center">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="mb-4">
                                <label for="static_email" class="text-uppercase">Email Address</label>
                                <input type="email" class="bg-body-tertiary py-3 form-control shadow-none text-dark-emphasis input_control rounded-4 my-1" id="static_email" value="{{ Auth::user()->email }}" readonly="true">
                            </div> 
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="mb-4">
                                <label for="static_username" class="text-uppercase">Username</label>
                                <input type="text" class="bg-body-tertiary py-3 form-control shadow-none text-dark-emphasis input_control rounded-4 my-1" id="static_username" value="{{ Auth::user()->user_name }}" readonly="true">
                            </div> 
                        </div>
                    </div>
                    <div class="row justify-content-between align-items-center">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="mb-4">
                                <label for="static_user_role" class="text-uppercase">User Role</label>
                                <input type="text" class="bg-body-tertiary py-3 form-control text-uppercase shadow-none text-dark-emphasis input_control rounded-4 my-1" id="static_user_role" value="{{Auth::user()->roles[0]->name}}" readonly="true">
                            </div> 
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="mb-4">
                                <label for="static_referral_code" class="text-uppercase">Referral Code</label>
                                <input type="text" class="bg-body-tertiary py-3 form-control shadow-none text-dark-emphasis input_control rounded-4 my-1" id="static_referral_code" value="" readonly="true">
                            </div> 
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="personal_info" tabindex="-1" aria-labelledby="personal_infoLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-body update_information_box bg-body rounded-4">
                                <button class="btn bg-transparent border-0 shadow-none p-1 position-absolute btn-close" style='top: 35px; right: 35px;' data-bs-dismiss="modal" aria-label="Close"></button>
                                <h2 class="h4 text-center my-1">Update Information</h2>
                                <hr class='my-2 mb-3'>
                                <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control shadow-sm" name="first_name" id="first_name" placeholder="enter first name" value="{{ Auth::user()->first_name}}" required>
                                        <label class="text-dark" for="first_name">First Name</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control shadow-sm" name="last_name" id="last_name" placeholder="enter last name" value="{{ Auth::user()->last_name}}" required>
                                        <label class="text-dark" for="last_name">Last Name</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control shadow-sm" name="user_name" id="user_name" placeholder="enter username" value="{{ Auth::user()->user_name}}" required>
                                        <label class="text-dark" for="user_name">Username</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="email" class="form-control shadow-sm" name="email" id="email" placeholder="enter email" value="{{ Auth::user()->email}}" required>
                                        <label class="text-dark" for="email">Email Address</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="password" class="form-control shadow-sm" name="current_password" id="current_password" placeholder="current password" required>
                                        <label class="text-dark" for="current_password">Current Password</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="password" class="form-control shadow-sm" name="password" id="password" placeholder="new password" required>
                                        <label class="text-dark" for="password">New Password</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <button type="submit" class="btn btn-primary w-100 p-2">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->
        <section class="bg-white mb-3 my-5 p-2 p-md-4 rounded-4 shadow-sm">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-8">
                    <div class="nav flex-column nav-pills me-3 mt-4" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <h3 class="fs-4 fw-bold text-start">Settings</h3>
                        <button class="nav-link text-dark active btn border rounded-5 mb-1 py-2 p-0" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true" style="font-size:small"><img class="mx-2 my-1" src="../images/user_profile.png"height="20" width="20" alt="" >Profile Setting</button>
                        <button class="nav-link text-dark btn border rounded-5 mt-1 py-2 p-0" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false" style="font-size:small"><img class="mx-2 my-1" src="../images/reset-password.png"height="20" width="20" alt="" >Password Setting</button>      
                    </div>
                </div>
                <div class="col-lg-9 col-md-8 col-sm-12">
                    <div class="mx-0 mx-sm-3 p-1 p-md-4 tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab" tabindex="0">
                            <!-- Profile Setting-->
                            <div class="d-flex align-items-center my-3">
                                <div>
                                    <div class="dropdown">
                                        <button id='selectPhoto' class="user_profile_photo overflow-hidden p-0 border-0 my-3 rounded-circle shadow" style="background: url('{{ url($profile_photo_path) }}'); background-position: top center; background-repeat: no-repeat; background-size: cover;">
                                            <div class="profile_photo_shade h-100 w-100">
                                                <div class=" d-flex justify-content-center h-100 w-100 align-items-center">
                                                    <i class='bx bx-camera text-white' ></i>
                                                </div>
                                            </div>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li class='my-2'><a class="dropdown-item bg-white d-flex align-items-center" type='button' id='selectPhoto'><i class='bx fs-4 bx-image-add' ></i><span class="m-0 ms-1">Upload Photo</span></a></li>
                                            <li class='my-2 pe-3'><a class="dropdown-item bg-white d-flex align-items-center" type='button' id='selectAvatar'><i class='bx fs-4 bx-user-circle'></i><span class="m-0 ms-1">Select an Avatar</span></a></li>
                                        </ul>
                                    </div>
                                    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                        <input type='file' name="photo" id="imageUpload" accept=".png, .jpg, .jpeg, .webp" class="d-none"/>
                                        <input type="submit" id="btn_save_img" class="d-none">
                                    </form>
                                </div>
                                <div class='ms-3 upload_img_data'>
                                    <h2 class="h5 text-dark m-0"> {{Auth::user()->first_name}}  {{Auth::user()->last_name}}</h2>
                                    <p class="mb-2 mt-1 small">Tutorselevenplus Parent</p>
                                </div>
                            </div>
                            <!-- <form action="{{route('profile_detail_update') }}" method="POST" enctype="multipart/form-data"> -->
                                @csrf
                                    <div class="profile_details">
                                       <h3 class="fs-4 fw-bold">Profile Details</h3>
                                        <div class="row justify-content-between  mt-3">
                                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                <div class="mb-4">
                                                    <label  class="text-uppercase">First Name</label>
                                                    <input type="text" name="first_name"  id="first_name" value="{{ Auth::user()->first_name }}" autocomplete="off" placeholder="Enter First Name" class="bg-body-tertiary py-3 form-control shadow-none text-dark-emphasis input_control rounded-4 my-1" id="static_first_name"  >
                                                    <span class="small my-1 text-danger d-none" id="firstName_error"></span>
                                                </div> 
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                <div class="mb-4">
                                                    <label class="text-uppercase" >Last Name</label>
                                                    <input type="text"  name="last_name" id="last_name" value="{{ Auth::user()->last_name }}" autocomplete="off" placeholder="Enter Last Name" class="bg-body-tertiary py-3 form-control shadow-none text-dark-emphasis input_control rounded-4 my-1" id="static_last_name" >
                                                    <span class="small my-1 text-danger d-none" id="lastName_error"></span>
                                                </div> 
                                            </div>
                                        </div>
                                        <div class="row justify-content-between mt-2">
                                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                <div class="mb-4">
                                                    <label  class="text-uppercase">Username</label>
                                                    <input type="text"  name="user_name" id="user_name" value="{{ Auth::user()->user_name }}" autocomplete="off" placeholder="Enter User Name" class="bg-body-tertiary py-3 form-control shadow-none text-dark-emphasis input_control rounded-4 my-1" >
                                                    <p class="small my-1 text-danger d-none" id="userName_error"></p>
                                                </div> 
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                <div class="mb-4">
                                                    <label  class="text-uppercase">Email address</label>
                                                    <input type="email" name="email" id="email" value="{{ Auth::user()->email }}" autocomplete="off" placeholder="Enter Email Address" class="bg-body-tertiary py-3 form-control shadow-none text-dark-emphasis input_control rounded-4 my-1" >
                                                    <p class="small my-1 text-danger d-none" id="email_error"></p>
                                                </div> 
                                            </div>
                                            <div class="mb-4">
                                                <label  class="text-uppercase">Current Password</label>
                                                <div class="position-relative">
                                                    <input type="password" name="current_password" id="current_password" autocomplete="off" placeholder="Enter Current Password" class="bg-body-tertiary py-3 form-control shadow-none text-dark-emphasis input_control rounded-4 my-1" >
                                                    <button class="btn password_btn position-absolute border-0 d-none" >
                                                      <i class="fa-solid fa-eye"></i>
                                                   <!-- <i class="fa-solid fa-eye-slash hide_pass_icon d-none"></i> -->
                                                   </button>
                                                </div>
                                                <p class="small my-1 text-danger d-none" id="currentpass_error"></p>
                                            </div> 
                                        </div>
                                        <div id="profileErrors" class="text-danger font-size-16"></div>
                                    </div>

                                <button type="submit"  id="save_profile_info" class="d-flex ms-auto btn px-4 py-2 text-white rounded-5 bg-primary align-items-center">Update <i class="d-none bx bx-loader-alt bx-spin ms-1"></i></button>
                            <!-- </form> -->
                        </div>
                        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab" tabindex="0">
                            <!-- Password Setting -->
                            <img src="https://img.freepik.com/premium-vector/flat-illustration-design-cybersecurity_9206-2585.jpg?w=740" width="200" height="200" alt="">
                            <div class="profile_details">
                                <h3 class="fs-4 fw-bold">Password Details</h3>
                                <h5 class="fs-5 mt-5">Password</h5>
                                <div class="row justify-content-between mt-3">
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                                        <div class="mb-4">
                                            <label class="text-uppercase">Current Password</label>   
                                            <div class="position-relative">
                                                <input type="password" id="currentpassword" placeholder="Enter Current Password" class="bg-body-tertiary py-3 form-control shadow-none text-dark-emphasis input_control rounded-4 my-1"  >
                                                <button class="position-absolute btn border-0 current_password_btn d-none" >
                                                    <i class="fa-solid fa-eye"></i>
                                                </button>
                                            </div>       
                                            <p class="small my-1 text-danger d-none" id="currentpasserror"></p>                                   
                                        </div> 
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                                        <div class="mb-4">
                                            <label class="text-uppercase">New Password</label>
                                            <div class="position-relative">
                                               <input placeholder="Enter New Password" id="newpassword" type="password" class="bg-body-tertiary py-3 form-control shadow-none text-dark-emphasis input_control rounded-4 my-1" >
                                               <button class="position-absolute btn border-0 new_password_btn d-none" >
                                                    <i class="fa-solid fa-eye"></i>
                                                </button>
                                            </div>
                                            <p class="small my-1 text-danger d-none" id="newpasserror"></p>
                                        </div> 
                                    </div>
                                        <div class="mb-4">
                                            <label class="text-uppercase">Confirm Password</label>
                                            <div class="position-relative">
                                                <input placeholder="Enter Confirm Password" id="confirmpassword" type="password" class="bg-body-tertiary py-3 form-control shadow-none text-dark-emphasis input_control rounded-4 my-1" >
                                                <button class="position-absolute btn border-0 confirm_password_btn d-none">
                                                    <i class="fa-solid fa-eye "></i>
                                                </button>
                                            </div>
                                            <p class="small my-1 text-danger d-none" id="confirmpasserror"></p>
                                        </div> 
                                    </div>
                                    <div id="passwordErrors" class="text-danger font-size-16"></div>
                                </div>
                                <p class="my-2">Cann't Remember Your Current Password? <a href="/login/identify" class="text-primary">Reset Your Password</a></p>
                                <button id="save_password_info" class="d-flex ms-auto btn px-4 py-2mt-2 text-white rounded-5 bg-primary" >
                                    Update <i class="d-none bx bx-loader-alt bx-spin ms-1"></i>  
                                </button>
                            </div>
                        </div>                          
                    </div>
                </div>
            </div>
        </section>
    @endif

    </section>

    <div class="bg-success end-0 m-2 p-3 position-fixed rounded-3 small success_alert text-white top-0">Profile Changes Updated Successfully</div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"
        integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    <script>
        let greetingTime = $("#greetings_time");
        let todayTime = new Date(); 
        let hours = todayTime.getHours();
        let greeting = ''; // Initialize the greeting variable
        if (hours >= 5 && hours < 12) {
            greeting = 'Good Morning';
        } else if (hours >= 12 && hours < 16) {
            greeting = 'Good Afternoon';
        } else if (hours >= 16 && hours < 24) {
            greeting = 'Good Evening';
        } else {
            greeting = 'Good Midnight';
        }
        // Display the greeting
        greetingTime.text(greeting);

        $("#selectAvatar").click(function(){
            $("#avatars-tab").click();
        });
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    </script>
   
    <script> 
        let is_student = {!! str_replace("'", "\'", json_encode(Auth::user()->hasRole('student'))) !!};
        console.log(is_student)
        //  <!-- Profile details --> 
        $('#current_password').keyup(function () {
            if ((this.value).length > 0) {
            $('.password_btn').removeClass("d-none");
            } else {
                $('.password_btn').addClass("d-none");
            }
        });
        // Password show and hide 
        $(".password_btn").click(function() {
            $(".password_btn i").toggleClass("fa-eye fa-eye-slash");
            var passwordField = $('#current_password');
            // console.log($('#current_password').val());
            var txtPassword = passwordField.val();
            if (passwordField.attr("type") == "password") {
                passwordField.after('<input type="text" name="current_password" id="current_password" value="' + txtPassword + '" class="bg-body-tertiary py-3 form-control shadow-none text-dark-emphasis input_control rounded-4 my-1">');
                passwordField.remove();
            } else {
                passwordField.after('<input type="password" name="current_password" id="current_password" value="' + txtPassword + '" class="bg-body-tertiary py-3 form-control shadow-none text-dark-emphasis input_control rounded-4 my-1">');
                passwordField.remove();
            }
        });

        $("#save_profile_info").click(function(){  
        
            let first_name=$("#first_name").val();
            let last_name=$("#last_name").val();
            let user_name=$("#user_name").val();
            let email=$("#email").val();
            let current_password=$("#current_password").val();
            let first_name_Regex = /^[a-zA-Z\s]*$/;
            let email_Regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            let username_Regex = /^[a-zA-Z0-9]+$/;

            if(first_name=='')
            {
                $("#firstName_error").removeClass("d-none");
                $("#firstName_error").text("First name is required");
            } else if(!first_name_Regex.test(first_name)){
                $("#firstName_error").removeClass("d-none");
                $("#firstName_error").text("Special Characters and Numbers are not allowed");
            }else if (first_name.length > 25) {
                $("#firstName_error").removeClass("d-none");
                $("#firstName_error").text("First name doesn't exceed 25 characters.");
                
            } else{
                $("#firstName_error").addClass("d-none");
            }
            if(last_name=="")
            {
                $("#lastName_error").removeClass("d-none");
                $("#lastName_error").text("Last name is required");
            } else if(!first_name_Regex.test(last_name)){
                $("#lastName_error").removeClass("d-none");
                $("#lastName_error").text("Special Characters and Numbers are not allowed");
            } else if (last_name.length > 25) {
                $("#lastName_error").removeClass("d-none");
                $("#lastName_error").text("Last name doesn't exceed 25 characters."); 
            } else{
                $("#lastName_error").addClass("d-none");
            }
            if(user_name=="")
            {
                $("#userName_error").removeClass("d-none");
                $("#userName_error").text("User name is required");
            }else if (!username_Regex.test(user_name)) {
                $("#userName_error").removeClass("d-none");
                $("#userName_error").text("Special Characters are not allowed.");
            } else if(user_name.length> 25)
            {
                $("#userName_error").removeClass("d-none");
                $("#userName_error").text("User name does not exceed ");
            } else{
                $("#userName_error").addClass("d-none");
            }
            if(email=="")
            {
                $("#email_error").removeClass("d-none");
                $("#email_error").text("Email is required");
            }else if(!email_Regex.test(email)){
                $("#email_error").removeClass("d-none");
                $("#email_error").text("Invalid Email Address");
            } else{
                $("#email_error").addClass("d-none");
            }
            if(current_password=="")
            {
                $("#currentpass_error").removeClass("d-none");
                $("#currentpass_error").text("Current Password  is required");
            }else{
                $("#currentpass_error").addClass("d-none");
            }
            
            if(first_name && first_name_Regex.test(first_name) && first_name.length <=25 && last_name && first_name_Regex.test(last_name) && last_name.length  <=25 && current_password && current_password.length  >= 9 && user_name && username_Regex.test(user_name) && user_name.length  <=25  && email && email_Regex.test(email) || !email)
            {
                $(".bx-loader-alt").removeClass("d-none");
                $.ajax({
                    type: "POST",
                    url: '/parent/profile/update_profile_details',
                    data: {
                        id: '{{$id}}',
                        first_name: first_name,
                        last_name: last_name,
                        user_name:user_name,
                        email: is_student ? user_name : email,
                        current_password: current_password,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                            if(data.success){
                                $(".success_alert").addClass('show_alert').text(data.message);
                                setTimeout(function() {
                                    $(".success_alert").removeClass('show_alert');
                                    location.reload();
                                }, 5000);
                                $(".bx-loader-alt").addClass("d-none")
                            }  
                            else if(data.errors){
                                $(".bx-loader-alt").removeClass("d-none")
                                data.errors.email ? $("#email_error").removeClass('d-none').text(data.errors.email):  $("#email_error").addClass('d-none') ;
                                data.errors.password ? $("#currentpass_error").removeClass('d-none').text(data.errors.password) :  $("#currentpass_error").addClass('d-none') ;
                                data.errors.user_name ? $("#userName_error").removeClass('d-none').text(data.errors.user_name) :  $("#userName_error").addClass('d-none') ;
                            
                                $(".bx-loader-alt").addClass('d-none');
                            }      
                    },
                    error: function(data, textStatus, errorThrown) {
                        console.log(data.errors);
                    },
                });
            }
        });

        // Password details
        // passwaord show and hide
        // current password
        $('#currentpassword').keyup(function () {
            if ((this.value).length > 0) {
            $('.current_password_btn').removeClass("d-none");
            } else {
                $('.current_password_btn').addClass("d-none");
            }
        });
        $(".current_password_btn").click(function(){
            $(".current_password_btn i").toggleClass("fa-eye fa-eye-slash");
            var currentpassword=$("#currentpassword");
            var currentpassvalue=currentpassword.val();

            if(currentpassword.attr("type")=="password"){ 
                currentpassword.after('<input type="text" id="currentpassword" value="'+currentpassvalue+'" class="bg-body-tertiary py-3 form-control shadow-none text-dark-emphasis input_control rounded-4 my-1"  >');
                currentpassword.remove();
            }
            else{
                currentpassword.after('<input type="password" id="currentpassword" value="'+currentpassvalue+'" class="bg-body-tertiary py-3 form-control shadow-none text-dark-emphasis input_control rounded-4 my-1"  >');
                currentpassword.remove();
            }
        });
        // new password 
        $('#newpassword').keyup(function () {
            if ((this.value).length > 0) {
            $('.new_password_btn').removeClass("d-none");
            } else {
                $('.new_password_btn').addClass("d-none");
            }
        });
        $(".new_password_btn").click(function(){
            $(".new_password_btn i").toggleClass("fa-eye fa-eye-slash");
            var newpassword=$("#newpassword");
            var newpassvalue=newpassword.val();

            if(newpassword.attr("type")=="password"){ 
                newpassword.after('<input type="text" id="newpassword" value="'+newpassvalue+'" class="bg-body-tertiary py-3 form-control shadow-none text-dark-emphasis input_control rounded-4 my-1"  >');
                newpassword.remove();
            }
            else{
                newpassword.after('<input type="password" id="newpassword" value="'+newpassvalue+'" class="bg-body-tertiary py-3 form-control shadow-none text-dark-emphasis input_control rounded-4 my-1"  >');
                newpassword.remove();
            }
        });
        // confirm password 
        
        $('#confirmpassword').keyup(function () {
            if ((this.value).length > 0) {
            $('.confirm_password_btn').removeClass("d-none");
            } else {
                $('.confirm_password_btn').addClass("d-none");
            }
        });

        $(".confirm_password_btn").click(function(){
            $(".confirm_password_btn i").toggleClass("fa-eye fa-eye-slash");
            var confirmpassword=$("#confirmpassword");
            var confirmpassvalue=confirmpassword.val();

            if(confirmpassword.attr("type")=="password"){ 
                confirmpassword.after('<input type="text" id="confirmpassword" value="'+confirmpassvalue+'" class="bg-body-tertiary py-3 form-control shadow-none text-dark-emphasis input_control rounded-4 my-1"  >');
                confirmpassword.remove();
            }
            else{
                confirmpassword.after('<input type="password" id="confirmpassword" value="'+confirmpassvalue+'" class="bg-body-tertiary py-3 form-control shadow-none text-dark-emphasis input_control rounded-4 my-1"  >');
                confirmpassword.remove();
            }
        });

        $("#save_password_info").click(function(){
            
            let currentpassword=$("#currentpassword").val();
            let newpassword=$("#newpassword").val();
            let confirmpassword=$("#confirmpassword").val();
            if(currentpassword==''){
                $("#currentpasserror").removeClass("d-none");
                $("#currentpasserror").text("Current Password is required");
            }else if(currentpassword.length < 9)
            {
                $("#currentpasserror").removeClass("d-none");
                $("#currentpasserror").text("Invalid Current Password");
            } else{
                $("#currentpasserror").addClass("d-none");
            }
            if(newpassword=='')
            {
                $("#newpasserror").removeClass("d-none");
                $("#newpasserror").text("New Password is required");
            } else if(newpassword.length < 9)
            {
                $("#newpasserror").removeClass("d-none");
                $("#newpasserror").text("Password must be at least 9 characters");
            } else{
                $("#newpasserror").addClass("d-none");
            }
            if(confirmpassword=='')
            {
                $("#confirmpasserror").removeClass("d-none");
                $("#confirmpasserror").text("Confirm Password is required");
            }
            else if(confirmpassword!=newpassword){
                $("#confirmpasserror").removeClass("d-none");
                $("#confirmpasserror").text("Confirm Password is incorrect");
            }
            else{
                $("#confirmpasserror").addClass("d-none");
            }
            
            if(currentpassword && currentpassword.length >=9 && newpassword && newpassword.length  >= 9 && confirmpassword==newpassword)
            {
                $(".bx-loader-alt").removeClass("d-none")
            $.ajax({
                        type: "POST",
                        url: '/parent/profile/updatepassword',
                        data: {
                            id: '{{$id}}',
                            currentpassword: currentpassword,
                            newpassword: newpassword,
                            confirmpassword: confirmpassword,
                            _token: '{{ csrf_token() }}'
                        },
                        
                        success: function(data) {
                        
                            if(data.success) {
                                $(".success_alert").addClass('show_alert').text(data.message);
                                setTimeout(function() {
                                    $(".success_alert").removeClass('show_alert');
                                    location.reload();
                                }, 5000);
                            
                                $(".bx-loader-alt").addClass("d-none")
                            } else {
                                $(".bx-loader-alt").addClass("d-none")
                                $("#currentpasserror").removeClass('d-none').text(data.message);      
                            }  
                        },

                        error: function(data, textStatus, errorThrown) {
                            $(".bx-loader-alt").removeClass("d-none")
                            console.log(data);
                        },
                    });
            }
        });
        
    </script>

    <!-- Student profile -->       
    <script>

        $('#current_password, #password, #password_confirmation').on('keyup', function(){
            $("#passwordErrors").text("");
        });
        // $("#savePassword").click(function(e){
        //     let current_password = $("#current_password").val();
        //     let password = $("#password").val();
        //     let password_confirmation = $("#password_confirmation").val();
        //     if(current_password && password && password_confirmation){
        //         if(password.length >= 9){
        //             if(password == password_confirmation){
        //                 $.ajax({
        //                     type: "POST",
        //                     url: '/parent/profile/updatepassword',
        //                     data: {
        //                         id: '{{$id}}',
        //                         current_password: current_password,
        //                         password: password,
        //                         password_confirmation: password_confirmation,
        //                         _token: '{{ csrf_token() }}'
        //                     },
        //                     success: function(data) {
        //                         if(data.success){
        //                             $("#passwordErrors").removeClass("text-danger").addClass("text-success").text(data.message);
        //                         }
        //                         else {
        //                             $("#passwordErrors").text(data.message);
        //                         }
        //                     },
        //                     error: function(data, textStatus, errorThrown) {
        //                         $("#passwordErrors").text(data.message);
        //                     },
        //                 });
        //             } else {
        //                 $("#passwordErrors").text("Confirm password not matched");
        //             }
        //         } else {
        //             $("#passwordErrors").text("Password must be at least 9 characters");
        //         }
        //     } else {
        //         $("#passwordErrors").text("Please enter all required feilds");
        //     }
        // })
        $("#removePhoto").click(function(e){
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: '/parent/profile/remove-photo',
                data: {
                    id: '{{$id}}',
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    $("#currentPhoto").attr("src","/profile-photos/user-profile-icon.svg").addClass("no-profile");
                },
                error: function(data, textStatus, errorThrown) {
                    console.log(data);
                },
            });
        });
        $("#selectPhoto").click(function(e){
            e.preventDefault();
            $("#imageUpload").click();
        });
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#selectPhoto').css('background-image', 'url('+e.target.result +')');
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#imageUpload").change(function(e) {
            e.preventDefault();
            readURL(this);
            $(".upload_img_data").find("#uploadImg").remove();
            $(".upload_img_data").append('<button class="btn btn-sm btn-warning fw-semibold text-white shadow-sm" id="uploadImg"><i class="bx bx-upload"></i> Upload</button>');
        });
        $(document).on('click', '#uploadImg', function() {
            $("#btn_save_img").click();
        });
        if (window.location.href.indexOf('coins_shop=avatar') > -1) {
            // If the condition is met, click the #avatarShop-tab
            $("#avatarShop-tab").click();
        }
        $(document).on('click', '.choose_avatar', function() {
            let id = $(this).parent().data('id');
            let _this = $(this);
            $.ajax({
                type: "POST",
                url: '/select-avatar/'+id,
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    if(data.success){
                        $("#selected").replaceWith(`<button class="btn btn-outline-primary btn-sm mx-auto p-2 px-3 rounded-pill choose_avatar">Choose Avatar</button>`);
                        $(_this).replaceWith(`<button class="align-items-center border border-1 border-secondary btn btn-sm d-flex disabled mx-auto p-2 px-3 rounded-pill" id="selected"><svg class="me-1" xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" style="fill: #878787;"><path d="m10 15.586-3.293-3.293-1.414 1.414L10 18.414l9.707-9.707-1.414-1.414z"></path></svg>Selected</button>`);
                        $(".profile_dropdown_button, .user_profile_image").css({
                            "background": "url(" + data.path + ") center top no-repeat",
                            "background-size": "cover"
                        });
                    }
                },
                error: function(data, textStatus, errorThrown) {
                    console.log(data);
                },
            });
        });
    </script>
    @include('parentsidebar.sidebarending')
</body>

</html>
