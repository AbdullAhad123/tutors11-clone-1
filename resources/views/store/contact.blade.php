<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{app(\App\Settings\KeywordsSettings::class)->title['contact_title']}}</title>
    <meta name="description" content="{{app(\App\Settings\KeywordsSettings::class)->description['contact_description']}}">
    <meta name="keywords" content="{{app(\App\Settings\KeywordsSettings::class)->keywords['contact_keywords']}}">      
    <link rel="icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}">
    <link rel="canonical" href="{{ url()->current() }}"/>
	<link rel="alternate" href="{{ url()->current() }}" hreflang="en-gb">
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
        input::-webkit-outer-spin-button, input::-webkit-inner-spin-button { -webkit-appearance: none; margin: 0; } /* Firefox */ input[type=number] { -moz-appearance: textfield; } .header-heading { line-height: 1.6; } .learning-image { filter: contrast(1.1); } .box_shadow { box-shadow: -1px 0px 10px 2px #00000036; }
  </style>
</head>
<body>
    <!-- contact header  -->
    <section>
        @include('components.home-navbar')
        <header class="contact_header_section">
            <div class="d-flex align-items-center">
                <div class="col-lg-11 col-md-12 col-sm-12 col-12 mx-auto py-lg-5 py-md-5 py-0">
                    <div class="row align-items-center m-0 pt-5"> 
                        <div class="align-items-center col-12 col-lg-5 col-md-10 col-sm-12 header_text_side justify-content-center mt-5 mt-lg-0 mt-md-5 mt-sm-5 my-2 p-3 py-4 py-lg-0">
                            <h1 class="display-4 fw-medium mt-4 text-white">Contact Our <br> Support Team!</h1>
                            <p class="fs-5 fw-light header_heading my-2 text-white">Get in touch with {{ app(\App\Settings\SiteSettings::class)->app_name }} via phone, email or LiveChat. Comments or questions about how our online learning packages can support your child or your school? We'd love to hear from you!</p>
                            <a href='{{app(\App\Settings\HeroSettings::class)->cta_link}}'   class="border-0 my-2 p-2 px-4 secondary_btn text-decoration-none">{{app(\App\Settings\HeroSettings::class)->cta_text}}</a>
                        </div>
                        <div class="col-12 col-lg-7 col-md-12 col-sm-12 mt-lg-5 py-2" >
                            <div class="fixed_header_media_width mx-auto">
                                <img src="{{url('images/contact_header.png')}}" width="100%" height="auto" alt="a cute boy standing with mobile" class="learning-image">  
                            </div>
                        </div>    
                    </div>    
                </div>
            </div>
        </header>
    </section>

    <!-- contact cards -->
    <section class="contact_section_title py-2 contact_features_section text-center">
        <div class="section_heading">
            <h2 class="display-5 text-center fw-medium my-2">Contact Us</h2>
        </div>
        <div class="text"><div class="decor-left"><span></span></div><p>Quick Contact</p><div class="decor-right"><span></span></div></div>
        <div class="container mt-5">
            <div class="row align-item-center">
                <div class="col-12 col-lg-4 col-md-12 col-sm-12 d-flex justify-content-center my-4">
                    <div class="card m-2 px-2">
                        <div class="card-img">
                            <img src="images/location.webp" height="250" width="250" alt="address" class="img-fluid">
                        </div>
                        <div class="card-title">
                            <h3>Address</h3>
                            <p class="text-dark">Bexleyheath , Kent, United Kingdom</p>
                        </div>
                    </div>
                </div> 
                <div class="col-12 col-lg-4 col-md-12 col-sm-12 d-flex justify-content-center my-4">
                    <div class="card m-2 px-2">
                        <div class="card-img">
                            <img src="{{url('images/open hrs.webp')}}" height="250" width="250" alt="openhrs" class="img-fluid">
                        </div>
                        <div class="card-title">
                            <h3>Open Hrs</h3>
                            <p class="text-dark">Monday to Sunday<br>9am-7pm</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4 col-md-12 col-sm-12 d-flex justify-content-center my-4">
                    <div class="card m-2 px-2">
                        <div class="card-img">
                            <img src="{{url('images/phone (2).webp')}}" height="250" width="250" alt="phone" class="img-fluid">
                        </div>
                        <div class="card-title">
                            <h3>Phone</h3>
                            <p class="text-dark">To speak to our advisors <br> 0330 043 2983</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>  

    <section class="contact container rounded-5">
        <div class="bg-light-subtle container-fluid rounded-4 box_shadow" >
            <div class="row ">
                <div class="col-lg-5 col-md-6 col-sm-12 mt-5">
                    <img src="{{url('images/contacts.png')}} " class="img-fluid my-3" width="500" height="500" alt="" >
                </div> 
                <div class="col-lg-7 col-md-6 col-sm-12 py-3">
                    <div class="col-xl-12">
                        <div class="contact_section_title float-left">
                            <div class="section_heading">
                                <h2 class="display-5 text-center fw-medium my-2">Send Your Message</h2>
                            </div>
                            <div class="text"><div class="decor-left"><span></span></div></div>
                        </div>
                        <div class="text-box float-right mb-0">
                            <p>Please share details of any incorrect questions or answers. We apologize for the error and will make corrections promptly. Share your feedback below. </p>
                        </div> 
                    </div> 
                        <div class=p-1>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12 col-12 mb-2">
                                    <div class="form-floating my-1">
                                        <input type="text" class="form-control rounded-3 shadow-none" id="name" placeholder="Enter you name">
                                        <label for="name">Name</label>
                                    </div>
                                    <p class="small m-0 text-danger" id="name_error"></p>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-12 mb-2">
                                    <div class="input-group my-2 shadow-sm rounded">
                                        <select class="input-group-text bg-transparent text-dark" id="callingcodes">
                                            <option class="text-dark text-start"value="+44">+44</option>
                                        </select>
                                        <input type="tel" name="phone" maxlength="10" id="phone" class="form-control fw-light p-3 shadow-none" value="@if(isset($billing_information['phone'])){{$billing_information['phone']}}@endif" placeholder="XXX XXXXXXX" autocomplete="on">
                                    </div>
                                    <p class="small m-0 text-danger" id="phone_error"></p>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
                                    <div class="form-floating my-1">
                                        <input  type="email" class="form-control rounded-3 shadow-none"  id="email" placeholder="name@example.com">
                                        <label for="email">Email address</label>
                                    </div>
                                    <p class="small m-0 text-danger" id="email_error"></p>
                                </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
                                <div class="form-floating my-1">
                                    <textarea name="message" id="message" rows="4" class="form-control rounded-3 shadow-none" placeholder="Write something..."></textarea>
                                    <label for="message">Message</label>
                                </div>
                                <p class="small m-0 text-danger" id="message_error"></p>
                            </div> 
                            <button   class="btn btn-primary send_btn visually-hidden"  data-bs-toggle="modal" data-bs-target="#send_modal">Launch</button>
                            <div class="modal fade" id="send_modal" tabindex="-1"  aria-hidden="true">
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
                        <div class="text-center my-3">
                          <button id="saveContact" type='button' class="border-0 text-white secondary_btn text_shadow p-2 px-4 rounded-2 rounded-pill"  data-bs-toggle="modal" data-bs-target="#sendMessage">Send Message <i class="fa-solid fa-paper-plane"></i>   <span class="spinner-border spinner-border-sm d-none" aria-hidden="true"></span> </button> 
                        
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
   
    <!-- Services Code-->
    <section class="contact_service_section py-2">
        <div class="section_heading">
            <h2 class="display-5 text-center fw-medium my-2">We are here for you</h2>
            <div class="heading_separator mx-auto rounded-pill mb-4"></div>
        </div>
        <div class="container my-5">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                    <div class="card1" href="#">
                        <i class="fa-solid fa-globe fa-2xl icon"></i>
                        <h3 class="mt-3 title h4">Connecting With You</h3>
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
                        <h3 class="mt-3  h4 title">Ensuring Your Satisfaction</h3>
                        <p class="description">Your satisfaction is our goal. We're here to resolving your</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- footer  -->
    @include('components.home-footer') 

    <script defer src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
   <script>
     function gettingCodes(){
        fetch('https://restcountries.com/v2/all')
        .then(response => response.json())
        .then(data => {
        $("#callingcodes").empty();
        let code_value = ' ';
        for(var i = 0 ; i <= data.length ; i++){
            code_value = data[i].callingCodes[0];
            if(data[i].callingCodes[0] == "44"){
                code_value = `<option class="text-dark text-start" selected value="${data[i].callingCodes[0]}">+${data[i].callingCodes[0]}</option>`
            }else{
                code_value = `<option class="text-dark text-start" value="${data[i].callingCodes[0]}">+${data[i].callingCodes[0]}</option>`
            }
            $("#callingcodes").append(code_value);
        }
    })
    }
    gettingCodes();
    
   </script>
    <script>
        $("#saveContact").click(function () {
            let name = $("#name").val();
            let email = $("#email").val();  
            let emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
            let phone = $("#phone").val();
            let phoneRegex = /^[0-9]+$/;
            let message = $("#message").val();

            if (name == "" ) {
                $("#name").addClass("is-invalid");
                $("#name_error").removeClass("d-none");
                $("#name_error").text('The name field is required.');
            } else {
                $("#name").removeClass("is-invalid");
                $("#name_error").addClass("d-none");
            }

            if (email == "" ) {
                $("#email").addClass("is-invalid");
                $("#email_error").removeClass("d-none");
                $("#email_error").text('The email field is required.');
            } else if (!emailRegex.test(email)) {
                $("#email").addClass("is-invalid");
                $("#email_error").removeClass("d-none");
                $("#email_error").text("The email address isn't valid.");
            } else {
                $("#email").removeClass("is-invalid");
                $("#email_error").addClass("d-none");
            }

            if (phone == "" ) {
                $("#phone").addClass("is-invalid");
                $("#phone_error").removeClass("d-none");
                $("#phone_error").text('The phone number field is required.');
            } else if (!phoneRegex.test(phone)) {
                $("#phone").addClass("is-invalid");
                $("#phone_error").removeClass("d-none");
                $("#phone_error").text("Special Characters and letters are not allowed");
            } else if(phone.length < 10)
            {
                $("#phone").addClass("is-invalid");
                $("#phone_error").removeClass("d-none");
                $("#phone_error").text("Phone must contain 10 digit number");
            }
            else {
                $("#phone").removeClass("is-invalid");
                $("#phone_error").addClass("d-none");
            }

            if (message == "" ) {
                $("#message").addClass("is-invalid");
                $("#message_error").removeClass("d-none");
                $("#message_error").text('The message field is required.');
            } else {
                $("#message").removeClass("is-invalid");
                $("#message_error").addClass("d-none");
            }
          
            if (name && email && emailRegex.test(email) && phone && phoneRegex.test(phone) && message) {
                $("#saveContact").find(".fa-paper-plane").addClass('d-none');
                $("#saveContact").find(".spinner-border").removeClass('d-none')
            
                $.ajax({
                    dataType: 'json',
                    type: "POST",
                    url: '/get-contact',
                    data: {
                        name: name,
                        email: email,
                        phone: phone,
                        message: message,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {

                    if (data) { 
                    $(".send_btn").click();
                    
                    }
                    $("#saveContact").find(".fa-paper-plane").removeClass('d-none');
                    $("#saveContact").find(".spinner-border").addClass('d-none')
                },
                    error: function (data, textStatus, errorThrown) {
                        console.log(textStatus);
                    },
                });
                
              
            }
         

          
        });
        
        $(document).ready(function(){
            // toggle dropdown 
            $(".dropdown_menu").slideUp(200);
            $("a.customize_dropdown").click(function(){
                $(".dropdown_menu").slideUp(200);
                var isOpen = $(this).siblings(".dropdown_menu").is(":visible");
                if (!isOpen) {
                    $(this).siblings(".dropdown_menu").slideDown(200);
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
        });
    </script>  

</body>

</html>