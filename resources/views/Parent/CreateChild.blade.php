<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create New Child</title>
    <!-- rel icon -->
    <link rel="icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}">
    <meta name="description" content="{{ app(\App\Settings\SiteSettings::class)->seo_description }}">
    <meta name="author" content="{{ app(\App\Settings\SiteSettings::class)->app_name }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" integrity="sha512-ZnR2wlLbSbr8/c9AgLg3jQPAattCUImNsae6NHYnS9KrIwRdcY9DxFotXhNAKIKbAXlRnujIqUWoXXwqyFOeIQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .new_child_image {
            height: 180px;
            width: 180px;
            user-select: none;
            -webkit-user-drag: none;
        }

        .newChildForm input::placeholder {
            color: #878787;
        }

        .first_step {
            height: 50px;
            width: 50px;
            position: absolute;
            left: 10%;
            top: -23px;
            background: var(--portal-primary)
        }

        .second_step {
            height: 50px;
            width: 50px;
            position: absolute;
            left: 45%;
            top: -23px;
            background: var(--portal-primary)
        }

        .third_step {
            height: 50px;
            width: 50px;
            position: absolute;
            left: 85%;
            top: -23px;
            background: var(--portal-primary)
        }

        @media (max-width: 768px) {

            .first_step,
            .second_step,
            .third_step {
                height: 40px !important;
                width: 40px !important;
                top: -17px;
            }

            .first_step svg,
            .second_step svg,
            .third_step svg {
                height: 25px !important;
                width: 25px !important;
            }
        }

        @media (max-width: 500px) {
            .third_step {
                left: 80% !important;
            }
        }

        @media (max-width: 350px) {
            .third_step {
                left: 75% !important;
            }
        }
        .login_close_image {
            display: none;
        }

        .form_input_control {
            height: 50px;
        }
        .form_input_control::placeholder {
            color: #b0b0b0 !important;
        }
        @media(max-width:991px) {
            .responsive_image {
                display: none !important;
            }
        }

        .window_blocker {
            background: #ffffff50
        }
        .user_login_avatar {
            background: radial-gradient(#43aaff, #0080e9) !important;
        }
    </style>
</head>

<body>
    @include('sidebar')
    @include('header')

    <!-- steps  -->
    <div class="newchild_steps position-relative mb-5">
        <div class="progress m-2" style="height: 0.6rem" role="progressbar" aria-label="Basic example" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
            <div class="progress-bar" style="width: 12.33%; height: 0.6rem; background: var(--portal-primary)!important"></div>
        </div>
        <div class="first_step rounded-circle d-flex justify-content-center align-items-center shadow border" style="background: url({{url('images/create_user.gif')}}) center no-repeat; background-size: contain;"></div>
        <div class="second_step rounded-circle d-flex justify-content-center align-items-center shadow border" style="background: url({{url('images/select_plan.gif')}}) center no-repeat; background-size: contain;"></div>
        <div class="third_step rounded-circle d-flex justify-content-center align-items-center shadow border" style="background: url({{url('images/payment_checkout.gif')}}) center no-repeat; background-size: contain;"></div>
    </div>
    <!-- new child form  -->
    <div class="container-fluid bg-white py-5 p-3 mb-5 shadow rounded-4">
        <h1 class="h2 fw-semibold text-capitalize text-center text-dark">Create Child Account</h1>
        <hr>
        <div class="row mt-4">
            <div class="col-lg-5 col-md-12 col-sm-12 col-12 d-flex justify-content-center align-items-center">
                <img src="{{url('images/create_child_account.png')}}" class="responsive_image" height="auto" width="350" alt="register child isometric">
            </div>
            <div class="col-lg-7 col-md-12 col-sm-12 col-12">
                <div class="new_child_image rounded-circle overflow-hidden mx-auto">
                    <img src="{{url('images\login_form_imagee.png')}}" class="img-fluid p-0 login_form_image user_login_avatar img-thumbnail mx-auto rounded-circle my-3" width="200" alt="panda profile avatar">
                    <img src="{{url('images\logn_form_closedd_eyes.png')}}" class="img-fluid p-0 login_close_image user_login_avatar img-thumbnail mx-auto rounded-circle my-3" width="200" alt="panda profile avatar with closed eyes">
                </div>
                <form class="newChildForm" action="submit">
                    <div class="form-input my-3">
                        <label for="firstName" class="form-label fs-6 text-uppercase fw-medium text-dark">First Name</label>
                        <input type="text" id="firstName" class="form-control mt-1 shadow-sm bg-white form_input_control text-dark text-capitalize"
                            placeholder="Jennifer">
                        <span id="firstName_error" class="text-danger small"></span>
                    </div>
                    <div class="form-input my-3">
                        <label for="lastName" class="form-label fs-6 text-uppercase fw-medium text-dark">Last Name</label>
                        <input type="text" class="form-control mt-1 shadow-sm bg-white form_input_control text-dark text-capitalize" id="lastName"
                            placeholder="Chris" />
                        <span id="lastName_error" class="text-danger small"></span>
                    </div>
                    <!-- <div class="form-input my-3">
                        <label for="Email" class="form-label fs-6 text-uppercase fw-medium text-dark">Email</label>
                        <input type="email" class="form-control mt-1 shadow-sm bg-white form_input_control text-dark" id="Email"
                            placeholder="chris@example.com" />
                        <span id="Email_error" class="text-danger small"></span>
                    </div> -->
                    <div class="form-input my-3">
                        <label for="userName" class="form-label fs-6 text-uppercase fw-medium text-dark">Username</label>
                        <input type="text" class="form-control mt-1 shadow-sm bg-white form_input_control text-dark" id="userName"
                            placeholder="ChrisJennifer" />
                        <span id="userName_error" class="text-danger small"></span>
                    </div>
                    <div class="form-input my-3">
                        <label for="pass" class="form-label fs-6 text-uppercase fw-medium text-dark">Password</label>
                        <div class="position-relative">
                            <input type="password" class="form-control mt-1 shadow-sm bg-white form_input_control text-dark" id="pass"
                                placeholder="Create a password" autocomplete="new-password" />
                            <button type="button"
                                class="btn btn_showPass shadow-none d-none border-0 position-absolute top-0 bottom-0 end-0">
                                <i class="bi bi-eye-slash-fill fs-5" id="showPass_icon"></i>
                            </button>
                        </div>
                        <span id="password_error" class="text-danger small"></span>
                    </div>
                </form>
                <div class="text-end my-4">
                    <div class="mb-1 font-size-13 text-danger" id="NewUserFormError"></div>
                    <a class="btn btn-primary text-white p-2 px-3" id="createNewUser">Create Child <span class="spinner-border spinner-border-sm d-none" aria-hidden="true"></span></a>
                </div>
            </div>
        </div>
    </div>
    <div class="window_blocker vh-100 w-100 position-fixed top-0 bottom-0 end-0 start-0 d-none"></div>

    @include('parentsidebar.sidebarending')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function () {
            // password keyup 
            $("#pass").keyup(function () {
                let userPass = $("#pass").val();
                if (userPass.length > 0) {
                    $(".btn_showPass").removeClass("d-none");
                } else {
                    $(".btn_showPass").addClass("d-none");
                }
            });
            // hide show password 
            $(".btn_showPass").click(function () {
                let passwordValue = $("#pass").val();

                if ($("#pass").prop('type') === 'password') {
                    let newInput = $("<input>", {
                        class: 'form-control mt-1 shadow-sm bg-white form_input_control text-dark',
                        type: "text",
                        id: "pass",
                        value: passwordValue,
                        placeholder: 'Enter password'
                    });

                    $("#pass").replaceWith(newInput);
                    $("#showPass_icon").removeClass("bi-eye-slash-fill").addClass("bi-eye-fill");
                    $(".login_form_image").hide();
                    $(".login_close_image").show();
                } else {
                    let newInput = $("<input>", {
                        class: 'form-control mt-1 shadow-sm bg-white form_input_control text-dark',
                        type: "password",
                        id: "pass",
                        value: passwordValue,
                        placeholder: 'Enter password'
                    });

                    $("#pass").replaceWith(newInput);
                    $("#showPass_icon").removeClass("bi-eye-fill").addClass("bi-eye-slash-fill");
                    $(".login_close_image").hide();
                    $(".login_form_image").show();
                }
            });
        });
    </script>
    <!-- form validation  -->
    <script>
        $(document).ready(function () {
            $("#createNewUser").click(function () {
                let firstName = $("#firstName").val();
                let lastName = $("#lastName").val();
                // let Email = $("#Email").val();
                let userName = $("#userName").val();
                let password = $("#pass").val();
                // const email_rgex = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
                const name_rgex = /^[a-zA-Z\s]+$/;
                const username_rgex = /^[a-zA-Z0-9]+$/;

                // for first name 
                if (firstName == "") {
                    $("#firstName_error").removeClass("d-none")
                    $("#firstName_error").html("The first name field is required.")
                    $("#firstName").addClass("is-invalid")
                } else if(firstName.length > 25) {
                    $("#firstName_error").removeClass("d-none")
                    $("#firstName_error").html("First name must be less then 25 characters")
                } else if(!name_rgex.test(firstName)) {
                    $("#firstName_error").removeClass("d-none")
                    $("#firstName_error").html("Special Characters and numbers are not allowed")
                } else {
                    $("#firstName").removeClass("is-invalid")
                    $("#firstName_error").addClass("d-none")
                }
                // for last name  
                if (lastName == "") {
                    $("#lastName_error").removeClass("d-none")
                    $("#lastName_error").html("The last name field is required.")
                    $("#lastName").addClass("is-invalid")
                } else if(lastName.length > 25) {
                    $("#lastName_error").removeClass("d-none");
                    $("#lastName_error").html("Last name must be less then 25 characters");
                } else if(!name_rgex.test(lastName)) {
                    $("#lastName_error").removeClass("d-none");
                    $("#lastName_error").html("Special Characters and numbers are not allowed");
                } else {
                    $("#lastName").removeClass("is-invalid");
                    $("#lastName_error").addClass("d-none");
                }
                // for email 
                // if (Email == "") {
                //     $("#Email_error").removeClass("d-none")
                //     $("#Email_error").html("The email field is required.")
                //     $("#Email").addClass("is-invalid")
                // } else if(!email_rgex.test(Email)) {
                //     $("#Email_error").removeClass("d-none");
                //     $("#Email_error").html("Invalid Email Address");
                // } else {
                //     $("#Email").removeClass("is-invalid")
                //     $("#Email_error").addClass("d-none")
                // }
                // for user name 
                if (userName == "") {
                    $("#userName_error").removeClass("d-none")
                    $("#userName_error").html("The username field is required.")
                    $("#userName").addClass("is-invalid")
                } else if(userName.length > 25) {
                    $("#userName_error").removeClass("d-none")
                    $("#userName_error").html("User name must be less then 25 characters")
                } else if(userName.length <=2) {
                    $("#userName_error").removeClass("d-none")
                    $("#userName_error").html("User name must be greater then 3 characters")
                } else if(!username_rgex.test(userName)) {
                    $("#userName_error").removeClass("d-none");
                    $("#userName_error").html("Special Characters are not allowed");
                } else {
                    $("#userName").removeClass("is-invalid")
                    $("#userName_error").addClass("d-none")
                }
                // for password 
                if (password == "") {
                    $("#pass").addClass("border border-danger");
                    $("#password_error").removeClass("d-none")
                    $("#password_error").html("The password field is required.")
                } else if (password.length < 9) {
                    $("#pass").addClass("border border-danger");
                    $("#password_error").removeClass("d-none")
                    $("#password_error").html("Minimum 9 character password required")
                } else {
                    $("#pass").removeClass("border border-danger");
                    $("#password_error").addClass("d-none")
                }

                if (firstName && firstName.length <= 25 && name_rgex.test(firstName) && lastName && lastName.length <= 25 && name_rgex.test(lastName) && userName && userName.length > 2 && userName.length <= 25 && username_rgex.test(userName) && password && password.length >= 9){ 
                    create_child(firstName, lastName, userName, password)
                }
            });
            function create_child(firstName, lastName, userName, password){
                $.ajax({
                    dataType: 'json',
                    type: "POST",
                    url: '/create-child',
                    data: {
                        first_name: firstName,
                        last_name: lastName,
                        user_name: userName,
                        password: password,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        if(data.success){
                            $(".window_blocker").removeClass('d-none');
                            $("#createNewUser").find('.spinner-border').removeClass('d-none');
                            let reqData = {
                                user_name: data.user.user_name
                            }
                            $.ajax({
                                type: "GET",
                                url: '/switch-to-child',
                                data: {
                                    reqData,
                                    _token: '{{ csrf_token() }}'
                                },
                                success: function(data) {
                                    window.location.href = "/select-plan";
                                },
                                error: function(data, textStatus, errorThrown) {
                                    // console.log(data);
                                },
                            });
                        } else {
                            if(data.exception){
                                if(data.message.errorInfo[0] == "23000"){
                                    if (data.message.errorInfo[2].includes('users_user_name_unique')) {
                                        $("#userName_error").text("Please select different username!").removeClass('d-none')
                                    } else if (data.message.errorInfo[2].includes('users_email_unique')) {
                                        $("#Email_error").text("Please select a different email!").removeClass('d-none');
                                    } else {
                                        $("#NewUserFormError").text(data.message.errorInfo[2]).removeClass('d-none');
                                    }
                                }
                            } else {
                                $("#NewUserFormError").text(data.message);
                            }
                        }
                    },
                    error: function(data, textStatus, errorThrown) {
                        let formError = "";
                        if(data.responseJSON.errors){
                            var obj = data.responseJSON.errors;
                            formError = obj[Object.keys(obj)[0]][0];
                        } else {
                            if(data.responseJSON.message){
                                if(data.status == 419) {
                                    formError = "Please refresh the page and submit the form again.";
                                } else {
                                    formError = data.responseJSON.message;
                                }
                            }
                        }
                        $("#NewUserFormError").text(formError);
                    },
                });
            };
            $("#firstName").keyup(function() {
                const input = $(this).val();
                const name_regex = /^[a-zA-Z\s]+$/;
              
                if (input.length > 0 && input.length < 25) {
                    if (!name_regex.test(input)) {
                        $("#firstName_error").removeClass("d-none");
                        $("#firstName_error").text("Special Characters and numbers are not allowed");
                        $("#firstName").addClass("is-invalid").removeClass("is-valid");
                    } else {
                        $("#firstName").removeClass("is-invalid").addClass("is-valid");
                        $("#firstName_error").addClass("d-none");
                    }
                } else if(input.length > 25) {
                    $("#firstName_error").html("The first name field must be less than 25 characters").removeClass("d-none");
                    $("#firstName").removeClass("is-valid").addClass("is-invalid");
                }
                else {
                    $("#firstName_error").html("The first name field is required.").removeClass("d-none");
                    $("#firstName").removeClass("is-valid").addClass("is-invalid");
                } 
            }); 
            $("#lastName").keyup(function(){
                const input = $(this).val();
                const name_regex = /^[a-zA-Z\s]+$/;

                if (input.length > 0 && input.length < 25) {
                    if (!name_regex.test(input)) {
                        $("#lastName_error").removeClass("d-none");
                        $("#lastName_error").text("Special Characters and numbers are not allowed");
                        $("#lastName").addClass("is-invalid").removeClass("is-valid");
                    } else {
                        $("#lastName").removeClass("is-invalid").addClass("is-valid");
                        $("#lastName_error").addClass("d-none");
                    }
                } else if(input.length > 25) {
                    $("#lastName_error").html("The first name field must be less than 25 characters").removeClass("d-none");
                    $("#lastName").removeClass("is-valid").addClass("is-invalid");
                }else {
                    $("#lastName_error").html("The last name field is required.").removeClass("d-none");
                    $("#lastName").removeClass("is-valid").addClass("is-invalid");
                } 
            });
            // $("#Email").keyup(function() {
            //     const input = $(this).val();
            //     const Email_regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            //     if (input.length > 0) {
            //         if (!Email_regex.test(input)) {
            //             $("#Email_error").removeClass("d-none");
            //             $("#Email_error").text("Invalid email address");
            //             $("#Email").addClass("is-invalid").removeClass("is-valid");
            //         } else {
            //             $("#Email").removeClass("is-invalid").addClass("is-valid");
            //             $("#Email_error").addClass("d-none");
            //         }
            //     } else {
            //         $("#Email_error").html("The email field is required.").removeClass("d-none");
            //         $("#Email").removeClass("is-valid").addClass("is-invalid");
            //     }
            // });
            $("#userName").keyup(function() {
                const input = $(this).val();
                const name_regex = /^[a-zA-Z0-9]+$/;

                if (input.length >=3 && input.length < 25) {
                    if (!name_regex.test(input)) {
                        $("#userName_error").removeClass("d-none");
                        $("#userName_error").text("Special characters are not allowed");
                        $("#userName").addClass("is-invalid").removeClass("is-valid");
                    } else {
                        $("#userName").removeClass("is-invalid").addClass("is-valid");
                        $("#userName_error").addClass("d-none");
                      
                    }
                } 
                else if(input.length <=2 ){
                    $("#userName_error").html("The username field must be greater than 3 characters").removeClass("d-none");
                    $("#userName").removeClass("is-valid").addClass("is-invalid");
                }
                else if(input.length>25){
                    $("#userName_error").html("The username field must be less than 25 characters").removeClass("d-none");
                    $("#userName").removeClass("is-valid").addClass("is-invalid");
                }else {
                    $("#userName_error").html("The username field is required.").removeClass("d-none");
                    $("#userName").removeClass("is-valid").addClass("is-invalid");
                }
                
            });
            $("#pass").keyup(function() {
                const password = $(this).val();
                const passwordLength = password.length;

                // Reset styles and messages
                $("#pass").removeClass("border-danger border-success");
                $("#password_error").addClass("d-none");

                // Check password length and provide feedback
                if (passwordLength === 0) {
                    $("#pass").addClass("border-danger").removeClass("border-success is-valid");
                    $("#password_error").removeClass("d-none").text("The password field is required.");
                } else if (passwordLength < 9) {
                    // Weak password
                    $("#pass").addClass("border-danger").removeClass("border-success is-valid");
                    $("#password_error").removeClass("d-none").text("Password should be atleast 9 characters long.");
                } else {
                    // Strong password
                    $("#pass").addClass("border-success").removeClass("border-danger is-invalid");
                }
            });
        });
    </script>
</body>

</html>