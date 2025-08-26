<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tailored 11+ Journey Planner for your Success - {{ app(\App\Settings\SiteSettings::class)->app_name }}</title>
    <meta name="description" content="Discover a personalized planner for your child's 11+ journey. Track objectives, topics, and practice questions for structured learning at TutorsElevenPlus.">
    <meta name="keywords" content="11 Plus study planner, personalized learning journey 11+, 11+ exam preparation roadmap, structured 11 Plus study plan, 11+ practice questions and topics, 11 Plus subject planner, custom 11 Plus tutoring plan, academic journey planner for 11+, 11+ exam goals and objectives, comprehensive 11+ learning schedule, {{app(\App\Settings\KeywordsSettings::class)->keywords['home_keywords']}}">    
    <meta name="author" content="{{ app(\App\Settings\SiteSettings::class)->app_name }}">
    <link rel="icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}">
    <link rel="canonical" href="{{ url()->current() }}"/>
	<link rel="alternate" href="{{ url()->current() }}" hreflang="en-gb">
    <!-- jquery link -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
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
        .line_height {line-height: 1.6}
        .about_journey, .journey_subjects {height: auto;width: auto;margin: 2rem auto}
        .journey_snapshots {height: auto;width: auto;margin: 2rem auto;background: radial-gradient(#47c36d , #1d7237)}
        .learning_journey_mockup {
            filter: drop-shadow(-5px 5px 5px #00000060);
        }

        @media (max-width: 575px) {
            .learning_journey_mockup {
                width: 280px !important
            }
        }
    </style>
</head>
<body>

    <!-- header  -->
    <section class="header">
        @include('components.home-navbar')
        @if(app(\App\Settings\HomepageSettings::class)->enable_hero)
            <header class="header_section_faq">
                <div class="d-flex align-items-center">
                    <div class="col-lg-11 col-md-12 col-sm-12 col-12 mx-auto py-lg-5 py-md-5 py-0">
                        <div class="row align-items-center m-0 pt-5"> 
                            <div class="align-items-center col-12 col-lg-5 col-md-10 col-sm-12 header_text_side justify-content-center mt-5 mt-lg-0 mt-md-5 mt-sm-5 my-2 p-3 py-4 py-lg-0">
                                <h1 class="display-4 fw-medium mt-4 text-white">Our Detailed <br> Journey Planner</h1>
                                <p class="fs-5 fw-light header_heading my-2 text-white">A Personalised roadmap for students, meticulously scheduling their learning journey. It encompasses specific learning objectives, criteria, practise questions and more, ensuring a structured and effective path to academic success.</p>
                                <a href='{{app(\App\Settings\HeroSettings::class)->cta_link}}' type="button" class="border-0 my-3 p-2 px-4 secondary_btn text-decoration-none">{{app(\App\Settings\HeroSettings::class)->cta_text}}</a>
                            </div>
                            <div class="col-12 col-lg-7 col-md-12 col-sm-12 mt-lg-5 py-2 text-center" >
                                <div class="fixed_header_media_width mx-auto">
                                    <img src="{{url('images/journey_header_image.png')}}" width="500" height="auto" alt="a cute boy standing with mobile" class="learning-image">  
                                </div>
                            </div>    
                        </div>    
                    </div>
                </div>
            </header>
        @endif
    </section> 

    <div class="about_journey fixed_width">
        <div class="row m-0 align-items-center my-2 justify-content-center">
            <div class="col-lg-8 col-md-7 col-sm-12 col-12 my-3">
                <div class="mb-4">
                    <h2 class="display-5 fw-medium my-2">What is Journey Planner?</h2>
                    <div class="heading_separator rounded-pill mb-2"></div>
                </div>
                <p class="fs-5 fw-light mb-2">Our detailed journey planner works as your personal companion for every subject. With our journey planner you can dive into interesting topics, explore detailed subtopics, and find thousands of questions in every sub-topics. This handy tool ensures you cover everything in every subject, making your learning journey both fun and effective. Join TutorsElevenplus today and make your learning journey a breeze!</p>
                <a href='/registration' type="button" class="border-0 my-2 p-2 px-4 secondary_btn text-decoration-none">Let's Get Started</a>
            </div>
            <div class="col-lg-4 col-md-5 col-sm-12 col-12 my-3 text-center">
                <img src="{{url('images/journey_planner.png')}}" width="380" height="auto" class="img-fluid" alt="a kid using laptop for studying on tutorselevenplus">
            </div>
        </div>
    </div>

    <section class="journey_snapshots my-4 py-5 p-3">
        <div class="row m-0 align-items-center my-5 justify-content-center">
            <div class="col-lg-7 col-md-6 col-sm-12 col-12 my-3">
                <div class="mb-4">
                    <h2 class="display-5 fw-medium my-2 text-white">Learning Journey</h2>
                    <div class="heading_separator rounded-pill mb-2"></div>
                </div>
                <p class="fs-5 fw-light mb-2 text-white">Our detailed journey planner works as your personal companion for every subject. With our journey planner you can dive into interesting topics, explore detailed subtopics, and find thousands of questions in every sub-topics. This handy tool ensures you cover everything in every subject, making your learning journey both fun and effective. Join TutorsElevenplus today and make your learning journey a breeze!</p>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12 col-12 my-3 text-center">
                <img src="{{url('images/learning_journey_mockup.png')}}" width="480" height="auto" class="img-fluid learning_journey_mockup" alt="a mockup of tutorselevenplus journey">
            </div>
        </div>
    </section>

    <div class="journey_subjects py-5 fixed_width">
        <div class="mb-4">
            <h2 class="display-5 text-center fw-medium my-2">Journey Subjects</h2>
            <div class="heading_separator mx-auto rounded-pill mb-2"></div>
        </div>
        <p class="fs-5 text-center fw-light mb-2">Discover tailored learning journeys for each subject. Explore our subjects and embark on a Personalised learning adventure.</p>
        <div class="row m-0 my-4 align-items-center justify-content-center">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12 my-3">
                <div class="bg-white journey_subject_card p-3 rounded shadow">
                    <div class="journey_card_img text-center"><img src="{{url('images/subject_maths.png')}}" height="auto" width="190" alt="maths icon"></div>
                    <h2 class="text-center fs-4 my-2">Maths</h2>
                    <p class="text-center my-2 fw-light">Build a solid math foundation, exploring diverse topics and honing problem-solving skills.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12 my-3">
                <div class="bg-white journey_subject_card p-3 rounded shadow">
                    <div class="journey_card_img text-center"><img src="{{url('images/subject_english.png')}}" height="auto" width="190" alt="englishs icon"></div>
                    <h2 class="text-center fs-4 my-2">English</h2>
                    <p class="text-center my-2 fw-light">Explore English through reading, writing, and communication, fostering a strong foundation.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12 my-3">
                <div class="bg-white journey_subject_card p-3 rounded shadow">
                    <div class="journey_card_img text-center"><img src="{{url('images/verbal_reasoning_image.png')}}" height="auto" width="165" alt="verbal icon"></div>
                    <h2 class="text-center fs-4 my-2">Verbal</h2>
                    <p class="text-center my-2 fw-light">Engage in the dynamic realm of verbal reasoning, cultivating robust speaking and listening skills.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12 my-3">
                <div class="bg-white journey_subject_card p-3 rounded shadow">
                    <div class="journey_card_img text-center"><img src="{{url('images/subject_nvr.png')}}" height="auto" width="190" alt="english icon"></div>
                    <h2 class="text-center fs-4 my-2">Non-verbal</h2>
                    <p class="text-center my-2 fw-light">Explore non-verbal reasoning, where your child develops visual acuity, mastering shapes and patterns</p>
                </div>
            </div>
        </div>
    </div>

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
                } else {
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
                        success: function (data) {
                            if (data) {
                                let tab = `<section class="contact-thankyou-div container-fluid my-5 text-center shadow-lg col-11 col-lg-10">
                                                <div class="p-5 ">
                                                    <img src="images/message-box.gif"  height="130px" width="130px" class="img-fluid" alt="">
                                                    <div class="section_heading">
                                                        <h2 class="display-4 text-center fw-bold my-2">ThankYou !</h2>
                                                    </div>
                                                    <div class="text-box float-right mb-0">
                                                        <p>for contacting us, we will reply promptly once your message is received.</p>
                                                    </div>
                                                    <div class="text-center my-3">
                                                        <a href="/" type='button' class="secondary_btn m-0 p-2 px-4 border-0 font_medium text-decoration-none">Back to Home </a>  
                                                    </div>
                                                </div>
                                            </section> `;
                                $(".contact_form_section").replaceWith(tab);
                            }
                        },
                        error: function (data, textStatus, errorThrown) {
                            console.log(textStatus);
                        },
                    });
                }
                else
                {
                    // $("#errormessage").append('<div class="rounded-3 bg-white mt-2 py-2 text-center"><p class="my-1 text-danger fw-bold">Something went wrong**</p> </div>')
                    console.log('error');
                }
            });
        });
    </script>
</body>

</html>