<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{app(\App\Settings\KeywordsSettings::class)->title['help_title']}}</title>
    <meta name="description" content="{{app(\App\Settings\KeywordsSettings::class)->description['help_description']}}">
    <meta name="keywords" content="{{app(\App\Settings\KeywordsSettings::class)->keywords['help_keywords']}}">    <meta name="author" content="{{ app(\App\Settings\SiteSettings::class)->app_name }}">
    <link rel="icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}">
    <link rel="canonical" href="{{ url()->current() }}"/>
	<link rel="alternate" href="{{ url()->current() }}" hreflang="en-gb">
    <!-- jquery link -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- preload links  -->
    <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" as="style">
    <link rel="preload" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" as="style" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="preload" href="{{url('Frontend_css/all.css')}}" as="style">
    <link rel="preload" href="{{url('Frontend_css/style.css')}}" as="style">
    <link rel="preconnect" href="https://googleads.g.doubleclick.net">
    <link rel="preconnect" href="https://td.doubleclick.net">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://www.google-analytics.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- css links  -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Kanit:wght@200;300;400;500&display=swap">
    <link rel="stylesheet" href="{{url('Frontend_css/all.css')}}" />
    <link rel="stylesheet" href="{{url('Frontend_css/style.css')}}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    @include('components.google-tags')
    <style>
       .header-heading
       {
        line-height: 1.6;
       }
       .header-image
       {
        margin-top: -150px;
       }
       .message-box
       {
        margin-top:20px;
       }
       .faq_question_section
       {
        height:auto;
        width:auto;
       }
       .faq_question
       {
        cursor:pointer;
       }
       .Question
       {
        font-size:1.1rem
       }
       .answer_parent
       {
        display: none;
       }
       .faq_question
       {
        cursor:pointer;
       }
       input::-webkit-outer-spin-button, input::-webkit-inner-spin-button { -webkit-appearance: none; margin: 0; }
       #phone::placeholder {
        color: #ffffff50
       }
    </style>
</head>
<body>

    <!-- header  -->
    <section class="header">
        @include('components.home-navbar')
        @if(app(\App\Settings\HomepageSettings::class)->enable_hero)
            <div class="py-5 header_section_faq ">
                <div class="container-lg cont_wrapper">
                    <div class="row g-5 align-items-center pt-5 m-0">
                        <div class="col-lg-6">
                            <h1 class="display-4 fw-medium mt-4 text-white">Explore Our <br> Help & Support</h1>
                            <p class="fs-5 fw-light header_heading my-2 mb-4 text-white" >Welcome to our Frequently Asked Questions. If you have any concerns or need further clarification, feel free to explore the topics below. We are here to assist you on your {{ app(\App\Settings\SiteSettings::class)->app_name }} journey!</p>
                            <a href='/contact' class="border-0 my-3 p-2 px-4 secondary_btn text-decoration-none rounded-pill"  >Contact Us</a>
                        </div>
                        <div class="col-12 col-lg-6 col-md-12 col-sm-12 mt-lg-5 py-2">
                            <div class="fixed_header_media_width mx-auto">
                                <img src="{{url('images/discovertutor_v2.png')}}" width="100%" height="auto" alt="a cute boy standing with mobile" class="learning-image">  
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <svg class="svg-image" viewBox="0 0 1920 200" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
            <path fill="#A8229C" d="M 0 0 C 485.5 0 485.5 110 971 110 L 971 110 L 971 0 L 0 0 Z" stroke-width="0"></path>
            <path fill="#A8229C" d="M 970 110 C 1445 110 1445 0 1920 0 L 1920 0 L 1920 0 L 970 0 Z" stroke-width="0"></path>
        </svg>
    </section> 

    <!-- Services Code-->
    <section class="contact_service_section">
        <div class="section_heading">
            <h2 class="display-5 text-center fw-medium my-2">Our Support</h2>
            <div class="heading_separator mx-auto rounded-pill mb-4"></div>
        </div>
        <div class="container my-5">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                    <div class="card1" href="#">
                        <i class="fa-solid fa-globe fa-2xl icon"></i>
                        <h3 class="h4 mt-3 title">Connecting with You</h3>
                        <p class="description">We're here to connect and assist. Contact us anytime for help and information.
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                    <div class="card1" href="#">
                        <i class="fa-solid fa-headset fa-2xl icon"></i>
                        <h3 class="mt-3 h4 title">Guiding Your Experience</h3>
                        <p class="description">Let us guide your journey. Our support team ensures a learning experience.</p> 
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                    <div class="card1" href="#">
                        <i class="fa-regular fa-face-grin-wide fa-2xl icon"></i>
                        <h3 class="mt-3 h4 title">Ensuring Your Satisfaction</h3>
                        <p class="description">Your satisfaction is our goal. We're here to resolving your</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Looking For Advice -->
    <section class="contact_section row align-items-center col-lg-11 col-12 mx-auto py-3">
      <div class="col-lg-7 col-md-6 col-sm-12 col-12 my-3">
        <h2 class="fs-6 fw-medium mb-0 text-uppercase text_primary">Contact {{ app(\App\Settings\SiteSettings::class)->app_name }}</h2>
        <h2 class="display-5 fw-medium mb-3 my-2 text-capitalize">Looking For Guidance!</h2>
        <p class="paragraph_font fw-light">We're here to help and guide your child through their education. If you have any questions about the 11+ tests, applying to senior school, or navigating Key Stage 2, don't hesitate to ask. Our dedicated team is committed to making your journey smooth and successful.</p>
        <p class="fw-medium m-0 text-uppercase">Connect with us:</p>
        <ul class="p-0 m-0 contact_keys_section position-relative mb-4">
          <li class="paragraph_font my-2 d-flex align-items-center fw-light">
            <i class="fa-solid fa-circle-check text_secondary paragraph_font me-2"></i><span class="m-0">Livechat</span>
          </li>
          <li class="paragraph_font my-2 d-flex align-items-center fw-light">
            <i class="fa-solid fa-circle-check text_secondary paragraph_font me-2"></i><span class="m-0">Mail us&nbsp;<a href="mailto:contact@tutorselevenplus.co.uk">contact@tutorselevenplus.co.uk</a></span>
          </li>
        </ul>
        <a aria-label="Contact Us" href="/contact"   class="border-0 p-2 px-4 rounded-5 secondary_btn text-decoration-none">Contact Us</a>
      </div>
      <div class="col-lg-5 col-md-6 col-sm-12 col-12 my-3 pt-2 justify-content-center d-flex">
        <img loading="lazy" src="{{url('images/contact_section_isometric.png')}}" alt="contact {{ app(\App\Settings\SiteSettings::class)->app_name }}" class="learning-image img-fluid" width="500" height="500">
      </div>
    </section>
    <!-- Contact code start -->
    <section class="contact_form_section pt-4 overflow-hidden" >
        <div class="row align-items-end justify-content-center text-center fixed_width">
            <div class="col-lg-6 col-md-10 col-sm-12 px-0  d-lg-block d-none">
                <div class="fixed_header_media_width mx-auto ">
                    <img src="{{url('images\contact_form.png')}}" class="contact_form_image" width="500" height="auto" alt="girl with books in hand tutor 11 plus" class="img-fluid" >
                </div>
            </div>
            <button class="btn btn-primary send_msg visually-hidden"  data-bs-toggle="modal" data-bs-target="#msg_modal">Launch</button>
                            <div class="modal fade" id="msg_modal" tabindex="-1"  aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content rounded-0 shadow-lg">
                                        <div class="modal-header d-flex justify-content-end border-0"><button   class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div>
                                        <div class="modal-body p-4 text-center">
                                            <img src="images/thank-you.gif" height="auto" width="280" alt="an illustration of boy submitting mails">
                                            <p class="text-center my-2 fs-5 mb-1">Thanks for contacting us, we will reply promptly once your message is received.</p>
                                            <div class="heading_separator mx-auto mb-3 px-1 rounded"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
            <div class="col-lg-6 col-md-10 col-sm-12 px-0 ">
                <h2 class="display-5 fw-medium mb-3 my-2 text-white text-capitalize">Drop a messsage!</h2>
                <div class="form-background h-100 w-100 px-3 py-4 text-center "> 
                    <div class="mb-3">
                        <div class="form-floating">
                            <input type="text" class="form-control bg-transparent text-white rounded-3 shadow-none" id="name" placeholder="name@example.com">
                            <label class='text-white' for="name">Name</label>
                        </div>
                        <p id="name_error" class="text-start text-warning"></p>
                    </div>                   
                    <div class="mb-3">
                        <div class="form-floating mb-3">
                            <input  type="email" class="form-control bg-transparent text-white rounded-3 shadow-none"  id="email" placeholder="name@example.com">
                            <label class='text-white' for="email">Email address</label>
                        </div>
                        <p id="email_error" class="text-start text-warning"></p>
                    </div>
                   <div class="mb-3">
                        <!-- <div class="form-floating mb-3">
                            <input type="tel" class="form-control bg-transparent text-white rounded-3 shadow-none" maxlength="10" id="phone" placeholder="name@example.com">
                            <label class='text-white' for="phone">Phone</label>
                        </div> -->
                        <div class="input-group my-2 shadow-sm rounded">
                            <select class="input-group-text bg-transparent text-white" id="callingcodes">
                                <option value="+44">44</option>
                            </select>
                            <input type="tel" name="phone" maxlength="10" id="phone" class="bg-transparent text-white form-control fw-light p-3 shadow-none" value="@if(isset($billing_information['phone'])){{$billing_information['phone']}}@endif" placeholder="XXX XXXXXXX" autocomplete="on">
                        </div>
                        <p id="phone_error" class="text-start text-warning"></p>
                   </div>
                   <div>
                        <div class="form-floating message-box" >
                            <textarea class="form-control bg-transparent text-white rounded-3 shadow-none" placeholder="Leave a comment here" id="message"></textarea>
                            <label class='text-white' for="message">Message</label>
                        </div>
                        <p id="message_error" class="text-start text-warning"></p>
                    </div>
                    <div id="errormessage"></div>
                       <div class="d-flex justify-content-center">
                            <div class="mb-3 position-relative d-flex animate__animated animate__fadeInUp">
                                <button id="dropmessage" class="border-0 text-white mt-3 p-2 px-4 secondary_btn font_medium text-decoration-none">
                                    <span class='text_shadow'>Drop Message  <i class="fa-solid fa-paper-plane"></i></span>
                                    <span class="spinner-border spinner-border-sm d-none" aria-hidden="true"></span>
                                </button>
                            </div>
                        </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-10 col-sm-12 px-0 d-lg-none d-block">
                <div class=" learning-image fixed_header_media_width mx-auto">
                    <img src="{{url('images\contact_form.webp')}}" class="contact_form_image" width="100%" height="auto" alt="girl with books in hand tutor 11 plus">
                </div>
            </div>
        </div>
    </section>
    <!-- thanks modal  -->
    <button type="button" class="btn btn-primary send_msg visually-hidden"  data-bs-toggle="modal" data-bs-target="#msg_modal">Launch</button>
    <div class="modal fade" id="msg_modal" tabindex="-1"  aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-0 shadow-lg">
                <div class="modal-header d-flex justify-content-end border-0"><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div>
                <div class="modal-body p-4 text-center">
                    <img src="images/thank-you.gif" height="auto" width="280" alt="an illustration of boy submitting mails">
                    <p class="text-center my-2 fs-5 mb-1">Thanks for contacting us, we will reply promptly once your message is received.</p>
                    <div class="heading_separator mx-auto mb-3 px-1 rounded"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- faq  -->
    <section class="faq_section fixed_width">
        <div class="faq_section_container p-lg-5 p-md-3 p-1 pt-2 rounded-3 shadow">
            <div class="mt-4">
                <h2 class="h1 text-capitalize">Questions? Get Answers</h2>
                <div class="heading_separator mb-4"></div>
            </div>
            <div class="row align-items-center m-0">
                <div class="col-lg-8 col-md-7 col-sm-12 col-12">
                    <div class="faq_question_section py-4" >
                        <ul class="question_list list-unstyled faq_question_section py-4 px-0"><li class="question_item shadow-sm h-auto w-auto"><div class="faq_question p-3 fw-medium d-flex align-items-center justify-content-between border-bottom"><span class="fw-normal font_medium">{{app(\App\Settings\Helpsettings::class)->faqs[0][0]}}</span><span class="plus_icon"><i class="fa fa-plus fa-sm revive_icon"></i></span></div><div class="answer_parent"><div class="faq_answer bg-light bg-opacity-50 fw-light p-3 d-flex align-items-center">{{app(\App\Settings\Helpsettings::class)->faqs[0][1]}}</div></div></li><li class="question_item shadow-sm h-auto w-auto"><div class="faq_question p-3 fw-medium d-flex align-items-center justify-content-between border-bottom"><span class="fw-normal font_medium">{{app(\App\Settings\Helpsettings::class)->faqs[1][0]}}</span><span class="plus_icon"><i class="fa fa-plus fa-sm revive_icon"></i></span></div><div class="answer_parent"><div class="faq_answer bg-light bg-opacity-50 fw-light p-3 d-flex align-items-center">{{app(\App\Settings\Helpsettings::class)->faqs[1][1]}}</div></div></li><li class="question_item shadow-sm h-auto w-auto"><div class="faq_question p-3 fw-medium d-flex align-items-center justify-content-between border-bottom"><span class="fw-normal font_medium">{{app(\App\Settings\Helpsettings::class)->faqs[3][0]}}</span><span class="plus_icon"><i class="fa fa-plus fa-sm revive_icon"></i></span></div><div class="answer_parent"><div class="faq_answer bg-light bg-opacity-50 fw-light p-3 d-flex align-items-center">{{app(\App\Settings\Helpsettings::class)->faqs[3][1]}}</div></div></li><li class="question_item shadow-sm h-auto w-auto"><div class="faq_question p-3 fw-medium d-flex align-items-center justify-content-between border-bottom"><span class="fw-normal font_medium">{{app(\App\Settings\Helpsettings::class)->faqs[4][0]}}</span><span class="plus_icon"><i class="fa fa-plus fa-sm revive_icon"></i></span></div><div class="answer_parent"><div class="faq_answer bg-light bg-opacity-50 fw-light p-3 d-flex align-items-center">{{app(\App\Settings\Helpsettings::class)->faqs[4][1]}}</div></div></li></ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-5 col-sm-12 col-12 justify-content-center d-flex ">
                    <img src="{{url('images\faq_section.png')}}" alt="3d grocery bag" height="auto" width="100%" class="learning-image">    
                </div>  
            </div>
        </div>
    </section>
    <!-- footer  -->
    @include('components.home-footer')

    <script defer src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
        integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD"
        crossorigin="anonymous"></script>
    <script defer src="{{url('Frontend_css/js/home.js')}}"></script>

  
    <script>
        // callingcodes
        function getCallingCode() {
            fetch('https://restcountries.com/v2/all')
            .then(response => response.json())
            .then(data => {
                $("#callingcodes").empty()
                let code = '';
                for(i = 0; i <= data.length; i++){
                    if (data[i].alpha2Code == "GB") {
                        code = `<option class="text-dark text-start" selected value="${data[i].callingCodes[0]}">+${data[i].callingCodes[0]}</option>`
                    } else {
                        code = `<option class="text-dark text-start" value="${data[i].callingCodes[0]}">+${data[i].callingCodes[0]}</option>`
                    }
                    $("#callingcodes").append(code);
                }
            })
        }
        getCallingCode();
        $(document).ready(function () {
            // window resize 
            $(window).resize(function(){
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
            $(window).scroll(function(){
                const scrolled = $(window).scrollTop();
                if (scrolled > 100) {
                    $("#navbar_nav").removeClass("absolute_nav bg-transparent").addClass('fixed-top fixed_nav col-lg-11 col-12');
                } else {
                    $("#navbar_nav").removeClass("fixed-top fixed_nav col-lg-11 col-12").addClass('absolute_nav bg-transparent');
                }
            }); 
            $("#dropmessage").click(function () {
                let name = $("#name").val();
                let email = $("#email").val();
                let emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
                let phone = $("#phone").val();
                let message = $("#message").val();
                let phoneRegex = /^[0-9]+$/;
                // for first name 
                if (name == "") {
                    $("#name_error").removeClass("d-none")
                    $("#name_error").html("The name field is required.")
                } else {
                    $("#name_error").addClass("d-none")
                }
                // for email 
                if (email == "") {
                    $("#email_error").removeClass("d-none")
                    $("#email_error").html("The email field is required.")
                } else if (!emailRegex.test(email)) {
                    $("#email_error").removeClass("d-none")
                    $("#email_error").html("The email address is not valid")
                } else {
                    $("#email_error").addClass("d-none")
                }
                if (phone == "") {
                    $("#phone_error").removeClass("d-none")
                    $("#phone_error").html("The phone field is required.")
                }  else if (!phoneRegex.test(phone)) {
                    $("#phone_error").removeClass("d-none");
                    $("#phone_error").html("Special Characters and letters are not allowed");
                } else if(phone.length < 10)
                {
                    $("#phone_error").removeClass("d-none");
                    $("#phone_error").html("Phone must contain 10 digit number");
                }else {
                    $("#phone_error").addClass("d-none")
                }
                if (message == "") {
                    $("#message_error").removeClass("d-none")
                    $("#message_error").html("The message field is required.")
                }
                else {
                    $("#message_error").addClass("d-none")
                }


                if (name && email && emailRegex.test(email) && phone && message)
                {
                    $("#dropmessage").find(".fa-paper-plane").addClass('d-none');
                    $("#dropmessage").find(".spinner-border").removeClass('d-none')
                    $.ajax({
                        dataType: 'json',
                        type: "POST",
                        url: '/get-contact',
                        data: {
                            name: name,
                            email: email,
                            phone: $("#callingcodes").val() + phone,
                            message: message,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(data) {
                            if (data) { 
                                $(".send_msg").click();
                                $("#dropmessage").find(".fa-paper-plane").removeClass('d-none');
                                $("#dropmessage").find(".spinner-border").addClass('d-none')
                            }
                        },
                        error: function (data, textStatus, errorThrown) {
                            console.log(textStatus);
                        },
                    });
                }
                else {
                    // $("#errormessage").append('<div class="rounded-3 bg-white mt-2 py-2 text-center"><p class="my-1 text-danger fw-bold">Something went wrong**</p> </div>')
                    console.log('error');
                }
            });

        });   
    </script>
</body>

</html>