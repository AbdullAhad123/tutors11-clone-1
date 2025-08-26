<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/"
    data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Profile - Student Portal - Tutors 11 Plus</title>
    <link rel="shortcut icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}" type="image/x-icon">

    <meta name="description" content="" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />
</head>
<style>
    .profile_form {
        max-width: 920px;
        min-height: 80vh;
        max-height: fit-content;
        margin: auto;
        box-shadow: 0px 0px 15px 2px rgba(172, 172, 172, 0.412);
        border-radius: 10px;
        padding: 2rem 3rem 2rem 3rem;
        background-color: #fff;
    }

    .profile_form_heading {
        color: #1f1f1f;
    }

    .label_heading {
        font-size: 1.1rem;
        margin-top: 2rem;
        color: #1f1f1f;
    }

    .personal_info {
        display: flex;
        justify-content: space-evenly;
        align-items: center;
        flex-wrap: wrap;
        margin-top: 1rem;
    }

    .half_basis {
        flex-basis: 50%;
    }

    .form_control {
        width: 100%;
        background-color: transparent;
        border-radius: 5px;
        border: 1.5px solid #595959;
        transition: 0.3s;
    }

    .form_control:focus {
        box-shadow: 0px 0px 5px 1px #4056ffa1;
    }

    .form_divider {
        border: 1px solid #0000001a;
        margin: 3rem auto;
    }

    .update_btn {
        /* border: 1px solid red; */
        margin: 2rem auto;
        text-align: end;
    }

    .btn_regenerate {
        border: 1px solid black;
        background-color: transparent;
        color: #000000;
        padding: 0.5rem 1.5rem 0.5rem 1.5rem;
        transition: 0.3s;
    }

    .btn_regenerate:hover {
        background-color: #5558e0;
        border: 1px solid #5558e0;
        color: white;
    }

    .btn_disable {
        background-color: #ff3434;
        color: #fff;
        border: 1px solid #ff3434;
        padding: 0.5rem 1.5rem 0.5rem 1.5rem;
        border-radius: 5px;
        transition: 0.3s;
    }

    .btn_update {
        background-color: #696cff;
        color: #fff;
        border: 1px solid #696cff;
        padding: 0.5rem 1.5rem 0.5rem 1.5rem;
        border-radius: 5px;
        transition: 0.3s;
    }

    .btn_update:hover {
        background-color: #5558e0;
    }

    .two_factor_authentication_text {
        font-size: 0.95rem;
    }

    .flex_codes {
        height: fit-content;
        width: auto;
        padding: 0.3rem 1rem 0.3rem 1rem;
        border-radius: 10px;
        background-color: #edededc3;
    }

    .flex_code_list {
        list-style-type: none;
        padding: 0;
        color: black;
    }

    .flex_code_list li {
        margin-top: 0.4rem;
    }

    .browsing_list {
        height: fit-content;
        padding: 0.5rem 0rem 0.5rem 0rem;
        width: fit-content;
    }

    .browsing_list_item {
        padding-left: 0.5rem;
        color: rgb(36, 36, 36);
        display: inline-flex;
        align-items: center;
        justify-content: space-around;
    }

    .browsing_list_item_text {
        padding-left: 0.6rem;
        display: inline-flex;
        align-items: center;
        flex-wrap: wrap;
        flex: 100%;
        width: 180px !Important;
        font-size: 0.9rem;
    }

    .active_device {
        color: #03ae56;
    }


    @media (max-width: 700px) {
        .half_basis {
            flex-basis: 100%;
            margin-top: 1.5rem;
        }
    }

    @media (max-width: 425px) {
        .profile_form {
            padding: 1rem;
        }

        .btn_regenerate {
            padding: 0.5rem 0.8rem 0.5rem 0.8rem;
            font-size: 0.8rem !important;
        }

        .btn_update {
            font-size: 0.8rem !important;
        }

        .btn_disable {
            font-size: 0.8rem !important;
            margin-top: 0.5rem;
        }

    }



    .profile-pic {
        color: transparent;
        transition: all 0.3s ease;
        display: flex;
        justify-content: center;
        align-items: center;
        position: relative;
        transition: all 0.3s ease;
        width: fit-content;
        margin: auto;
    }

    .profile-pic input {
        display: none;
    }

    .profile-pic img {
        position: absolute;
        object-fit: cover;
        width: 120px;
        height: 120px;
        box-shadow: 0 0 10px 0 rgba(255, 255, 255, 0.35);
        border-radius: 100px;
        z-index: 0;
        box-shadow: 0px 0px 15px 2px rgba(0, 0, 0, 0.16);
    }

    .profile-pic .-label {
        cursor: pointer;
        height: 120px;
        width: 120px;
    }

    .profile-pic:hover .-label {
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: rgba(0, 0, 0, 0.8);
        z-index: 10000;
        color: #fafafa;
        transition: background-color 0.2s ease-in-out;
        border-radius: 100px;
        margin-bottom: 0;
    }

    .profile-pic span {
        display: inline-flex;
        padding: 0.2em;
        height: 2em;
    }
</style>

<body>

    @include('sidebar')
    @include('header')

    <?php
    $firstN = Auth::user()->first_name;
    $lastN = Auth::user()->last_name;
    $email = Auth::user()->email;
    $contact = Auth::user()->mobile;
    $imgpath = Auth::user()->profile_photo_path;

    ?>

    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Layout container -->
            <div class="layout-page vh-100 overflow-auto">
                <div class="container-xxl flex-grow-1 container-p-y">
                    <div class="profile_form">
                        <!-- for personal info  -->
                        <h4 class="profile_form_heading">Personal Information</h4>
                        <form>

                            <h4 class="label_heading">Profile Photo</h4>
                            <div class="row personal_info">
                                <div class="profile_photo">
                                    <div class="profile-pic">
                                        <label class="-label" for="file">
                                            <span class="glyphicon glyphicon-camera"></span>
                                            <span>Change Image</span>
                                        </label>
                                        <input id="file" type="file" onchange="loadFile(event)" />
                                        <img src="{{$imgpath}}" id="output" width="200" height="auto"
                                            alt="user image" />
                                    </div>
                                </div>
                            </div>
                            {{-- @dd(Auth::user()) --}}
                            <!-- for name  -->
                            <h4 class="label_heading">For Name</h4>
                            <div class="row personal_info">
                                <div class="half_basis">
                                    <input type="text" class="form_control" name="first_name" id="first_name"
                                        placeholder="First Name" value="{{$firstN}}">
                                </div>
                                <div class="half_basis">
                                    <input type="text" class="form_control" name="first_name" id="first_name"
                                        placeholder="Last Name" value="{{$lastN}}">
                                </div>
                            </div>
                            <!-- for contact  -->
                            <h4 class="label_heading">For Contact</h4>
                            <div class="row personal_info">
                                <div class="half_basis">
                                    <input type="email" class="form_control" name="email" id="email"
                                        placeholder="Email Address" value="{{$email}}">
                                </div>
                                <div class="half_basis">
                                    <input type="tel" class="form_control" name="phone" id="phone"
                                        placeholder="Phone Number" value="{{$contact}}">
                                </div>
                            </div>
                            <div class="update_btn">
                                <button class="btn_update shadow textuppercase">Update</button>
                            </div>
                        </form>
                        <div class="form_divider"></div>

                        <!-- for account Security  -->
                        <h4 class="profile_form_heading">Account Security</h4>
                        <form>
                            <!-- for password  -->
                            <h4 class="label_heading">Update Password</h4>
                            <div class="row personal_info">
                                <div class="half_basis">
                                    <input type="password" class="form_control" name="current_password"
                                        id="current_password" placeholder="Current Password">
                                </div>
                                <div class="half_basis">
                                    <input type="password" class="form_control" name="new_password" id="new_password"
                                        placeholder="New Password">
                                </div>
                            </div>
                            <div class="update_btn">
                                <button class="btn_update shadow textuppercase">Update</button>
                            </div>
                        </form>
                        <div class="form_divider"></div>

                        <!-- for two factor authentication  -->
                        <h4 class="profile_form_heading">Two Factor Authentication</h4>
                        <form id="disable_two_factor">
                            <!-- for password  -->
                            <h4 class="label_heading">You have not enabled two factor authentication.</h4>
                            <div class="row personal_info">
                                <p class="two_factor_authentication_text">
                                    When two factor authentication is enabled, you will be prompted for a secure, random
                                    token during authentication. You may retrieve this token from your phone's Google
                                    Authenticator application.
                                </p>
                            </div>
                            <div class="update_btn">
                                <button class="btn_update shadow textuppercase" id="enable_factors_btn">Enable</button>
                            </div>
                        </form>

                        <form id="enable_two_factor" style="display: none;">
                            <!-- for password  -->
                            <h4 class="label_heading">You have enabled two factor authentication.</h4>
                            <div class="row personal_info">
                                <p class="two_factor_authentication_text">
                                    When two factor authentication is enabled, you will be prompted for a secure, random
                                    token during authentication. You may retrieve this token from your phone's Google
                                    Authenticator application.
                                </p>
                            </div>
                            <h4 class="label_heading" style="margin-top: 1rem;">Two factor authentication is now
                                enabled. Scan the following QR code using your phone's authenticator application.</h4>
                            <div class="row personal_info">
                                <div>
                                    <img src="../assets/img/illustrations/QR CODE.png" height="200px" width="190px"
                                        alt="Random QR code">
                                </div>
                            </div>
                            <h4 class="label_heading" style="margin-top: 1rem;">
                                Store these recovery codes in a secure password manager. They can be used to recover
                                access to your account if your two factor authentication device is lost.
                            </h4>
                            <div class="flex_codes">
                                <ul class="flex_code_list">
                                    <li>cjlfN2AGs3-sgb0qobW9w</li>
                                    <li>XEmEFf5SVA-eFQyEDmPJi</li>
                                    <li>KpN8flwVQe-r8t8Z0vo5M</li>
                                    <li>yeuK1zvbVi-aWd3UV5Ogv</li>
                                    <li>HpcjzHGk6K-Ebk0KWQUNz</li>
                                    <li>h7v7bA2VxL-1xHiqtVKRv</li>
                                    <li>Qkcgd23vB1-B8NxekKKZz</li>
                                    <li>osw5UJDxnU-JKzcseKxUP</li>
                                </ul>
                            </div>
                            <div class="update_btn">
                                <button class="btn_regenerate">Regenerate Recovery Codes</button>
                                <button class="btn_disable" id="disable_factors_btn">Disable</button>
                            </div>
                        </form>
                        <div class="form_divider"></div>

                        <!-- for browser session  -->
                        <h4 class="profile_form_heading">Browser Sessions</h4>
                        <form id="disabled_two_factor">
                            <!-- for password  -->
                            <div class="row personal_info">
                                <p class="two_factor_authentication_text">
                                    If necessary, you may logout of all of your other browser sessions across all of
                                    your devices. Some of your recent sessions are listed below; however, this list may
                                    not be exhaustive. If you feel your account has been compromised, you should also
                                    update your password.
                                </p>
                            </div>
                            <ul class="browsing_list">
                                <li class="browsing_list_item">
                                    <span>
                                        <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            viewBox="0 0 24 24" stroke="currentColor" class="w-8 h-8 text-gray-500">
                                            <path
                                                d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                    </span>
                                    <span class="browsing_list_item_text">
                                        <span>Windows&nbsp– &nbsp</span> <span> Chrome</span><span
                                            style="font-size: 0.8rem;">103.217.178.27,</span> <span
                                            class="active_device" style="font-size: 0.8rem;">This device</span>
                                    </span>
                                </li>
                            </ul>
                            <div class="update_btn">
                                <button class="btn_regenerate">Logout Other Browser Sessions</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"
        integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $(document).ready(function () {

        })

        var loadFile = function (event) {
            var image = document.getElementById("output");
            image.src = URL.createObjectURL(event.target.files[0]);
        };

        $("#enable_factors_btn").click(function (e) {
            e.preventDefault();
            $("#disable_two_factor").fadeOut();
            $("#enable_two_factor").fadeIn();
        })

        $("#disable_factors_btn").click(function (e) {
            e.preventDefault();
            $("#disable_two_factor").fadeIn();
            $("#enable_two_factor").fadeOut();
        })

        $(".btn_update , .btn_regenerate").click(function (e) {
            e.preventDefault();
        })
    </script>

</body>

</html>