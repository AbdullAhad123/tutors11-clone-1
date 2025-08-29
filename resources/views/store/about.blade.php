<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="{{ app(\App\Settings\SiteSettings::class)->app_name }}">
    <meta name="keywords" content="{{ app(\App\Settings\KeywordsSettings::class)->keywords['about_keywords'] }}">
    <title>{{ app(\App\Settings\KeywordsSettings::class)->title['about_title'] }}</title>
    <meta name="description" content="{{ app(\App\Settings\KeywordsSettings::class)->description['about_description'] }}">
    <link rel="canonical" href="{{ url()->current() }}" />
    <link rel="alternate" href="{{ url()->current() }}" hreflang="en-gb">
    <link rel="icon" href="{{ url('storage/' . app(\App\Settings\SiteSettings::class)->favicon_path) }}">
    <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" as="style">
    <link rel="preload" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" as="style">
    <link rel="preconnect" href="https://googleads.g.doubleclick.net">
    <link rel="preconnect" href="https://td.doubleclick.net">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://www.google-analytics.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Kanit:wght@200;300;400;500&display=swap">
    <link rel="stylesheet" href="{{ url('Frontend_css/all.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    @include('components.google-tags')
    <style>
        /* footer */
        .myGallery .item {
            position: relative;
            overflow: hidden
        }

        .explore-counter,
        .header-icons,
        .sub_title {
            color: var(--secondary)
        }

        .get_stared_section {
            height: auto;
            width: auto;
            margin: 4rem auto
        }

        .about_header_section {
            min-height: 600px;
            max-height: fit-content;
            width: auto;
            background: radial-gradient(var(--lightprimary), var(--primary))
        }

        .carousel-inner {
            background: #000047;
            border-radius: 0 100px;
            color: #fff;
            min-height: 350px;
            max-height: auto;
            height: 100%
        }

        @media (max-width:600px) {
            body {
                display: block
            }
        }

        .about-parent-div {
            overflow: hidden;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            line-height: 1.2
        }

        @media only screen and (max-width:767px) and (min-width:400px) {
            .learning-image {
                width: 300px
            }
        }

        @media only screen and (max-width:400px) and (min-width:280px) {
            .learning-image {
                width: 250px
            }
        }

        .about-parent-div {
            -webkit-line-clamp: 7;
            line-clamp: 7
        }

        .learning-image {
            box-shadow: (1px 1px 0 #00000035)
        }

        .about_header_section {
            min-height: 600px;
            max-height: fit-content;
            width: auto;
            background: var(--primary);
        }

        /* slider */
        .carousel-inner {
            background: var(--lighter_primary);
            border-bottom-right-radius: 200px;
            border-top-left-radius: 150px;
            border-bottom-left-radius: 150px;
            border-top-right-radius: 30px;
            color: white;
            min-height: 450px;
            max-height: auto;
            height: 90%;
            overflow: hidden;
        }

        .carousel-item p {
            line-height: 30px;
        }

        .carousel,
        .active {
            height: 100%;
        }

        .aboutuss {
            background-color: transparent;
            border: 1px solid #040541;
            border-radius: 100px;
            max-width: 250px;
            min-width: 180px;
            height: 250px;
            margin: 20px auto;
            -webkit-animation: rescale 2s infinite;
            animation: rescale 8s infinite;
            position: absolute;
        }

        @-webkit-keyframes rescale {
            0% {
                transform: rotate(0deg);
            }

            10% {
                transform: rotate(36deg);
            }

            20% {
                transform: rotate(72deg);
            }

            30% {
                transform: rotate(108deg);
            }

            40% {
                transform: rotate(144deg);
            }

            50% {
                transform: rotate(180deg);
            }

            60% {
                transform: rotate(216deg);
            }

            70% {
                transform: rotate(252deg);
            }

            80% {
                transform: rotate(288deg);
            }

            90% {
                transform: rotate(334deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        @keyframes rescale {
            0% {
                transform: rotate(0deg);
            }

            10% {
                transform: rotate(36deg);
            }

            20% {
                transform: rotate(72deg);
            }

            30% {
                transform: rotate(108deg);
            }

            40% {
                transform: rotate(144deg);
            }

            50% {
                transform: rotate(180deg);
            }

            60% {
                transform: rotate(216deg);
            }

            70% {
                transform: rotate(252deg);
            }

            80% {
                transform: rotate(288deg);
            }

            90% {
                transform: rotate(334deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        .parent_section {
            height: auto;
            width: auto;
            margin: 4rem auto;
        }

        .get_stared_section {
            height: auto;
            width: auto;
            margin: 4rem auto;
        }

        .header-heading {
            line-height: 1.6;
        }

        .learning-image {
            filter: contrast(1.1);
        }

        .fa-quote-left {
            color: rgb(6, 7, 26);
        }

        .responsive_image {
            max-width: 500px !important;
        }
    </style>
</head>

<body>
    <section class="position-relative">
        @include('components.home-navbar')
        <header class="about_header_section">
            <div class="d-flex align-items-center">
                <div class="col-lg-11 col-md-12 col-sm-12 col-12 mx-auto py-lg-5 py-md-5 py-0">
                    <div class="row align-items-center m-0 pt-5">
                        <div class="align-items-center col-12 col-lg-5 col-md-10 col-sm-12 header_text_side justify-content-center mt-5 mt-lg-0 mt-md-5 mt-sm-5 my-2 p-3 py-4 py-lg-0">
                            <h1 class="display-4 fw-medium mt-4 text-white">Explore About <br> {{ app(\App\Settings\SiteSettings::class)->app_name }}</h1>
                            <p class="fs-5 fw-light header_heading my-2 text-white">{{ app(\App\Settings\SiteSettings::class)->app_name }} is a ground-breaking online platform that provides a dynamic learning experience for students preparing to excel in the 11+ exams in the United Kingdom.</p>
                            <a href="{{ app(\App\Settings\HeroSettings::class)->cta_link }}" class="border-0 d-inline-flex align-items-center my-2 p-2 px-4 secondary_btn text-decoration-none rounded-pill">Get started with us</a>
                        </div>
                        <div class="col-12 col-lg-7 col-md-12 col-sm-12 mt-lg-5 py-2 text-center">
                            <div class="fixed_header_media_width mx-auto">
                                <img src="{{ url('images/about-us.webp') }}" height="500" width="500" alt="{{ app(\App\Settings\SiteSettings::class)->app_name }} learning isometric" class="learning-image img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <svg class="svg-image" viewBox="0 0 1920 200" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
            <path fill="#A8229C" d="M 0 0 C 485.5 0 485.5 110 971 110 L 971 110 L 971 0 L 0 0 Z" stroke-width="0"></path>
            <path fill="#A8229C" d="M 970 110 C 1445 110 1445 0 1920 0 L 1920 0 L 1920 0 L 970 0 Z" stroke-width="0"></path>
        </svg>
    </section>
    @if (app(\App\Settings\HomepageSettings::class)->enable_features)
    <section class="about_section fixed_width row align-items-center mx-auto col-lg-11 col-md-12">
        <div class="col-lg-4 col-md-6 col-sm-12 col-10 mx-auto text-center">
          <img loading="lazy" src="images/about_boy_image.webp" alt="about us mockup" class="learning-image img-fluid" width="373" height="373">
        </div>
        <div class="col-lg-8 col-md-6 col-sm-12 col-12">
          <p class="fs_5 fw-medium mb-0 text-uppercase text_primary">What is {{ app(\App\Settings\SiteSettings::class)->app_name }}?</p>
          <h2 class="display-5 fw-medium mb-3">Making learning simple, fun & effective</h2>
          <p class="paragraph_font mb-2 fw-light">At {{ app(\App\Settings\SiteSettings::class)->app_name }}, we are proud to be a leading online learning platform across the UK. Our mission is to help children succeed in the 11+ exams, with full support from parents and expert tutors.</p>
          <p class="paragraph_font mb-2 fw-light">We provide a wide range of practice questions, interactive quizzes, and realistic mock exams, so children can prepare step by step and grow in confidence. Through engaging online lessons and tailored tuition, we make 11+ preparation both enjoyable and effective.</p>
          <p class="paragraph_font mb-4 fw-light">Your child’s progress and success will always be our top priority.</p>
          {{-- <div class="align-items-center d-flex flex-wrap justify-content-between py-2 mb-3">
              <p class="paragraph_font m-0 ms-2 d-flex align-items-center m-2">
                <i class="fa-solid fa-circle-check text_secondary paragraph_font me-2"></i>
                Question Sets
              </p>
              <p class="paragraph_font ms-2 d-flex align-items-center m-2">
                <i class="fa-solid fa-circle-check text_secondary paragraph_font me-2"></i>
                Learning Journeys
              </p>
              <p class="paragraph_font ms-2 d-flex align-items-center m-2">
                <i class="fa-solid fa-circle-check text_secondary paragraph_font me-2"></i>
                Live Exams & Tests
              </p>
          </div> --}}
          <a href="/about" aria-label="About Us" class="border-2 secondary_btn p-2 px-4 rounded-2 rounded-pill text-start text-white my-3">Learn more</a>
        </div>
      </section>
    @endif
    <section class="parent_section py-4">
        <div class="row fixed_width">
            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="aboutuss"></div>
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner p-5">
                        <div class="carousel-item active py-5">
                            <h2 class="mt-2 mb-3 text_primary_em h4 fw-medium" class="parents-testimonial-heading">What parents say about us</h2>
                            <i class="fas fa-quote-left"></i>
                            <p class="about-parent-div text-dark fw-normal fs-6 fst-italic">I am also very impressed with the detailed performance
                                reports that {{ app(\App\Settings\SiteSettings::class)->app_name }} provides. These
                                reports show me exactly how my children are performing in each area of the 11 Plus
                                syllabus. This information has been invaluable in helping me to track their progress and
                                to identify any areas where they need additional support. Overall, I am extremely happy
                                with {{ app(\App\Settings\SiteSettings::class)->app_name }}. I believe that it is a
                                valuable resource for any parent who is serious about helping their child.
                            </p>
                        </div>
                        <div class="carousel-item mt-3 py-5">
                            <h2 class="mt-2 mb-3 text_primary_em h4 fw-medium" class="parents-testimonial-heading">What parents say about us</h2>
                            <i class="fas fa-quote-left"></i>
                            <p class="about-parent-div text-dark fw-normal fs-6 fst-italic">I am so grateful for
                                {{ app(\App\Settings\SiteSettings::class)->app_name }}.
                                {{ app(\App\Settings\SiteSettings::class)->app_name }} helped her to feel more
                                confident and prepared. She loved using the interactive exercises and practise tests,
                                and she found the video lessons to be very helpful. I am so happy that we found
                                {{ app(\App\Settings\SiteSettings::class)->app_name }}. It is a fantastic resource for
                                11+ preparation.
                            </p>
                        </div>
                        <div class="carousel-item mt-3 py-5">
                            <h2 class="mt-2 mb-3 text_primary_em h4 fw-medium" class="parents-testimonial-heading">What parents say about us</h2>
                            <i class="fas fa-quote-left"></i>
                            <p class="about-parent-div text-dark fw-normal fs-6 fst-italic">
                                {{ app(\App\Settings\SiteSettings::class)->app_name }} is the best e-learning website.
                                My son has been using {{ app(\App\Settings\SiteSettings::class)->app_name }} for
                                several months now, and he has made significant progress. The resources are
                                comprehensive and engaging, and the Personalised learning plans are really effective. I
                                am very impressed with {{ app(\App\Settings\SiteSettings::class)->app_name }}, and I
                                would highly recommend it to any parent who is looking for a way to help their child
                                succeed in the 11+ exams.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12 col-12 d-flex justify-content-center"><img
                    src="{{ url('images/parent-review.webp') }}" height="100%" width="100%" style="max-width:500px"
                    alt=""></div>
        </div>
    </section>
    @if (app(\App\Settings\HomepageSettings::class)->enable_features)
        <section class="service_section py-2 fixed_width">
            <div class="section_heading mb-lg-4 mb-md-4 mb-2">
                <h2 class="display-5 text-center fw-medium my-2">{{ app(\App\Settings\SiteSettings::class)->app_name }}
                    Features</h2>
                <div class="heading_separator mx-auto rounded-pill mb-4"></div>
            </div>
            <div class="row m-0 services_container py-lg-5 py-md-4 py-3 p-2 justify-content-center">
                <div class="col-lg-3 col-md-5 col-sm-6 col-12 p-lg-2 p-md-2 p-1 mb-lg-0 mb-5">
                    <div class="services_card service_child1 p-3 py-4 rounded-5 position-relative">
                        <div class="services_image position-relative mx-auto"><img
                                src="{{ url('images/top_quality_question_guy.webp') }}" height="220"
                                width="220" alt="{{ app(\App\Settings\FeatureSettings::class)->feature1[0] }}"
                                class="img-fluid"></div>
                        <div class="services-details">
                            <h2 class="text-center my-1 text-uppercase h4">
                                {{ app(\App\Settings\FeatureSettings::class)->feature1[0] }}</h2>
                            <p class="my-2 text-center">{{ app(\App\Settings\FeatureSettings::class)->feature1[1] }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-5 col-sm-6 col-12 p-lg-2 p-md-2 p-1 mb-lg-0 mb-5">
                    <div class="services_card service_child2 p-3 py-4 rounded-5 position-relative">
                        <div class="services_image position-relative mx-auto"><img
                                src="{{ url('images/detail_analysis_guy.webp') }}" height="220" width="220"
                                alt="{{ app(\App\Settings\FeatureSettings::class)->feature2[0] }}" class="img-fluid">
                        </div>
                        <div class="services-details">
                            <h2 class="text-center my-1 text-uppercase h4">
                                {{ app(\App\Settings\FeatureSettings::class)->feature2[0] }}</h2>
                            <p class="my-2 text-center">{{ app(\App\Settings\FeatureSettings::class)->feature2[1] }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-5 col-sm-6 col-12 p-lg-2 p-md-2 p-1 mb-lg-0 mb-5">
                    <div class="services_card service_child3 p-3 py-4 rounded-5 position-relative">
                        <div class="services_image position-relative mx-auto"><img
                                src="{{ url('images/exam_quiz_guy.webp') }}" height="220" width="220"
                                alt="{{ app(\App\Settings\FeatureSettings::class)->feature3[0] }}" class="img-fluid">
                        </div>
                        <div class="services-details">
                            <h2 class="text-center my-1 text-uppercase h4">
                                {{ app(\App\Settings\FeatureSettings::class)->feature3[0] }}</h2>
                            <p class="my-2 text-center">{{ app(\App\Settings\FeatureSettings::class)->feature3[1] }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-5 col-sm-6 col-12 p-lg-2 p-md-2 p-1 mb-lg-0 mb-5">
                    <div class="services_card service_child4 p-3 py-4 rounded-5 position-relative">
                        <div class="services_image position-relative mx-auto"><img
                                src="{{ url('images/learning_videos_guy.webp') }}" height="220" width="220"
                                alt="{{ app(\App\Settings\FeatureSettings::class)->feature4[0] }}" class="img-fluid">
                        </div>
                        <div class="services-details">
                            <h2 class="text-center my-1 text-uppercase h4">
                                {{ app(\App\Settings\FeatureSettings::class)->feature4[0] }}</h2>
                            <p class="my-2 text-center">{{ app(\App\Settings\FeatureSettings::class)->feature4[1] }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    <section class="get_stared_section">
        <div class="row m-0 align-items-center">
            <div class="align-self-center text-center col-12 col-lg-5 col-md-6 col-sm-12">
                <img src="images/discovertutor.webp" alt="discover {{ app(\App\Settings\SiteSettings::class)->app_name }}" height="100%" width="100%" class="responsive_image">
            </div>
            <div class="col-lg-7 col-md-6 col-sm-12 col-12 p-3">
                <h2 class="display-5 fw-medium mb-3">Step into smarter 11+ learning environment</h2>
                <div class="heading_separator rounded-pill mb-4"></div>
                <p class="fs-5 fw-light my-4 paragraph_font">Get ready to shine in your 11+ exams with TutorsElevenPlus. Our platform offers fun lessons, interactive practice and step-by-step support from expert tutors. From verbal and non-verbal reasoning to tricky maths problems and advanced English skills, we make learning simple, enjoyable and highly effective. Start your 11+ preparation today and move forward with confidence towards success.</p>
                <a aria-label="{{ app(\App\Settings\HeroSettings::class)->cta_text }}" href="{{ app(\App\Settings\HeroSettings::class)->cta_link }}" class="border-0 my-2 p-2 px-4 rounded-5 secondary_btn text-white text-decoration-none">{{ app(\App\Settings\HeroSettings::class)->cta_text }}</a>
            </div>
        </div>
    </section>
    <section class="my-4 fixed_width">
        <div class="section_heading mb-4">
            <h2 class="display-5 text-center fw-medium my-2">About {{ app(\App\Settings\SiteSettings::class)->app_name }}</h2>
            <div class="heading_separator mx-auto rounded-pill mb-4"></div>
        </div>
        <div class="row align-items-center justify-content-center m-0">
            <div class="col-12 col-lg-7 col-md-12 col-sm-12">
                <p class="fw-light fs-5">We are a friendly and experienced team with backgrounds in education, finance, and analytics. Over the years, we have helped many children prepare for the 11+ exams for both grammar and selective private schools. We are not only qualified but also caring, approachable, and passionate about helping children learn.</p>
                <p class="fw-light fs-5">Using our experience, we have created a modern online platform that gives children the best chance to succeed. We know the 11+ journey can feel stressful for both children and parents, so our aim is to make it as smooth and stress-free as possible. We offer clear guidance and personal support at every step of the way.</p>
                <p class="fw-light fs-5">Our step-by-step plan helps students build confidence and become strong candidates by exam day. We work closely with children and also encourage parents to be part of the journey. We believe every child has the ability to succeed, and together—teachers, parents, and students—we can make that success possible.</p>
            </div>
            <div class="col-12 col-lg-5 col-md-7 col-sm-12 mx-auto">
                <img src="{{ url('images/about-story.webp') }}" width="100%" height="100%" alt="{{ app(\App\Settings\SiteSettings::class)->app_name }} about">
            </div>
        </div>
    </section>
    @include('components.home-footer')
    <script defer src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
    <script>
        $(document).ready((function() {
            $(".dropdown_menu").slideUp(200), $("a.customize_dropdown").click((function() {
                $(".dropdown_menu").slideUp(200), $(this).siblings(".dropdown_menu").is(
                    ":visible") || $(this).siblings(".dropdown_menu").slideDown(200)
            })), $(window).scroll((function() {
                $(window).scrollTop() > 100 ? $("#navbar_nav").removeClass(
                    "absolute_nav bg-transparent").addClass(
                    "fixed-top fixed_nav col-lg-11 col-12") : $("#navbar_nav").removeClass(
                    "fixed-top fixed_nav col-lg-11 col-12").addClass(
                    "absolute_nav bg-transparent")
            }))
        }));
    </script>
</body>

</html>
