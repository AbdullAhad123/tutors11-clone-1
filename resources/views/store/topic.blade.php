<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boost 11+ {{$topic['name']}} learning with {{ app(\App\Settings\SiteSettings::class)->app_name }}</title>
    <meta name="description" content="{{app(\App\Settings\KeywordsSettings::class)->description['topic_description']}}">
    <link rel="canonical" href="{{ url()->current() }}"/>
	<link rel="alternate" href="{{ url()->current() }}" hreflang="en-gb">
    <meta name="author" content="{{ app(\App\Settings\SiteSettings::class)->app_name }}">
    <meta name="keywords" content="{{app(\App\Settings\KeywordsSettings::class)->keywords['topic_keywords']}}">
    <link rel="icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}">
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
        .teacher_header_section {
            min-height: 600px;
            max-height: fit-content;
            width: auto;
            background: var(--primary);
        }

        .about_features_section {
            height: auto;
            width: auto;
            margin: 3rem auto;
            position: -webkit-sticky;
         
        }
        .subject_cards{
            background: radial-gradient(#65ba7c, #348f4d) !important;
            box-shadow: 0px 1px 8px 0px #0000004a !important;
            transition: 0.25s !important;
            min-height: 250px;
        }
        .subject_cards:hover {scale: 1.04 }

        @media screen and (max-width: 800px) {
            body {
                height: auto;
            }
        } */
        .blogs_features_section {
            height: auto;
            width: auto;
            margin: 5rem auto;
        }

        .blog_feature_card {
            height: auto;
            width: 240px;
            transition: 0.3s;
        }

        .feature_card_one {
            height: 300px;
            border-radius: 45%;
            background: url('https://img.freepik.com/free-photo/view-3d-kids-library_23-2150710010.jpg') center;
            background-size: cover;
            /* filter: drop-shadow(2px 2px 1px #00000055);  */
            box-shadow: 4px 4px 0px 0px var(--lightprimary);
        }

        .feature_card_two {
            height: 300px;
            border-radius: 20%;
            background: url('https://img.freepik.com/free-photo/3d-rendering-kid-playing-digital-game_23-2150898504.jpg') center;
            background-size: cover;
            /* filter: drop-shadow(2px 2px 1px #00000055);  */
            box-shadow: 4px 4px 0px 0px var(--secondary);
        }

        .feature_card_four {
            height: 300px;
            border-top-right-radius: 25%;
            border-bottom-left-radius: 25%;
            background: url('https://img.freepik.com/free-photo/3d-rendering-cartoon-like-boy-reading-armchair_23-2150797738.jpg?t=st=1699012894~exp=1699016494~hmac=3c9337ca587a7664611f584ffbbcb3abec0fc8f4228dc397825f46717569a82a&w=826') center;
            background-size: cover;
            /* filter: drop-shadow(2px 2px 1px #00000055);  */
            box-shadow: 4px 4px 0px 0px var(--secondary);
        }

        .blog_feature_card_transform {
            position: relative;
            top: 50px;
        }

         .blog_feature_title{
            -webkit-text-fill-color: transparent;
            -webkit-text-stroke-width: 2px;
            -webkit-text-stroke-color: var(--secondary);
            letter-spacing: 2px;
            transition: 0.3s;
        }

        .blog_feature_image {
            transition: 0.3s;
        }

        .blog_feature_image:hover {
            scale: 1.04;
        }
        @media (max-width: 560px) {
            .blog_feature_card_transform {
                top: 0px;
            }
            .blog_feature_card {
                width: 280px!important;
            }
        }
        .card_shade {
            height: 120px;
            width: 120px;
            background-color: #ffffff26;
            position: absolute;
            top: -20px;
            right: -40px;
            border-radius: 50rem;
        }
    </style>
</head>
<body>

    <!-- header  -->
    <section>
        @include('components.home-navbar')
        <header class="teacher_header_section">
            <div class="d-flex align-items-center">
                <div class="col-lg-11 col-md-12 col-sm-12 col-12 mx-auto py-lg-5 py-md-5 py-0">
                    <div class="row align-items-center m-0 pt-5"> 
                        <div class="align-items-center col-12 col-lg-6 col-md-10 col-sm-12 header_text_side justify-content-center mt-5 mt-md-5 mt-sm-5 p-3 py-4 py-lg-0">
                            <h1 class="display-4 fw-medium mt-4 text-white">Explore our <br> {{$topic['name']}} Topic</h1>
                            <p class="fs-5 fw-light header_heading my-2 text-white">
                                @if($topic['short_description'])
                                    {{$topic['short_description']}}
                                @else
                                    Welcome to our exciting world of mathematics! This page is all about making math fun and easy to understand. Whether you're a math whiz or just starting your math journey, we've got something for everyone. Let's dive into the wonderful world of numbers, shapes, and patterns!
                                @endif
                            </p>
                            <div class="input-group mb-3 position-relative d-flex animate__animated animate__fadeInUp">
                                <a href='{{app(\App\Settings\HeroSettings::class)->cta_link}}' class="border-0 mt-3 p-2 px-4 secondary_btn font_medium text-decoration-none">
                                    <span class='text_shadow'>{{app(\App\Settings\HeroSettings::class)->cta_text}}</span>
                                </a>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 col-md-12 col-sm-12 py-2 justify-content-center d-flex" >
                            <div class="fixed_header_media_width mx-auto">
                                <img src="{{url('images/maths-topic.png')}}" width="100%" height="auto" style='filter: contrast(1.1);' alt="{{ app(\App\Settings\SiteSettings::class)->app_name }} learning isometric" class="animate__animated animate__bounceInRight custom_animation_duration learning-image">  
                            </div>
                        </div>    
                    </div>    
                </div>
            </div>
        </header>
    </section>

    <div class="topic-maths fixed_width my-5">
        <div class="row align-items-center rounded-3 m-0">
            <div class="col-lg-8 col-md-6 col-sm-12 col-12 my-2 header_text_side">    
                <h2 class="fw-medium h1">Embark on a Journey with Us!</h2>
                <div class="heading_separator rounded-pill mb-4"></div>
                <p class="fs-5 fw-light">{{ app(\App\Settings\SiteSettings::class)->app_name }} amazing adventure waiting for you to explore. We hope this page has sparked your curiosity and made math a little more exciting. It's a key to solving the mysteries of the universe! So, keep learning, keep having fun, and keep loving "{{ app(\App\Settings\SiteSettings::class)->app_name }}" This content structure aims to make the learning educational, interactive, and enjoyable for kids while providing useful information about math basics and its real-world applications.</p>
                <a href="" class="border-0 font_medium mt-3 p-2 px-4 secondary_btn text-decoration-none" type="button">Learn more</a>
            </div>
            <div class="col-lg-4 col-md-5 col-sm-12 col-12 my-2 align-items-center rounded-5 text-center ">
                <img src="{{url('images/mathematics.png')}}" class="img-fluid" height="auto" width="auto" alt="journey guys image">
            </div>      
        </div>  
    </div>

    <!-- cards -->
    @if(count($subtopics) > 0)
        <div class="about_features_section py-5">
            <div class="mb-4">
                <h2 class="fw-medium text-center h1">Explore Our Sub-topics</h2>
                <div class="heading_separator mx-auto rounded-pill mb-4"></div>
            </div>  
            <div class="row fixed_width my-4 align-items-center justify-content-center">
                @foreach($subtopics as $subtopic)
                    <div class="col-lg-6 col-md-8 col-sm-11">
                        <a href="{{route('sub_topic',['subject'=>$subject['slug'],'topic'=>$topic['slug'],'subtopic'=>$subtopic->slug])}}">
                            <div class="subject_cards d-flex align-items-center rounded-5 shadow p-4 my-2 position-relative">    
                                <div>
                                    <h2 class='h4 my-2 fw-medium text-white'>{{$subtopic->name}}</h2>
                                    <p class="my-2 fs-6 fw-light text-white">{{$subtopic->short_description}}</p>
                                </div>
                                <div class="card_shade"></div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
    
    @dd(app(\App\Settings\CategorySettings::class))

    <!-- services  -->
    @if(app(\App\Settings\HomepageSettings::class)->enable_features)        
        <section class="service_section p-2 fixed_width"><h2 class="display-5 text-center fw-medium my-4 section_heading mb-lg-4">Our Features<div class="heading_separator mx-auto rounded-pill mb-4"></div></h2><div class="row m-0 services_container py-lg-5 py-md-4 py-3 p-2 justify-content-center"><div class="col-lg-3 col-md-5 col-sm-6 col-12 p-lg-2 p-md-2 p-1 mb-lg-0 mb-5"><div class="services_card service_child1 p-3 py-4 rounded-5 position-relative h-100"><div class="services_image position-relative mx-auto"><img loading="lazy" src="{{url('images/top_quality_question_guy.webp')}}" height="220" width="220" alt="{{app(\App\Settings\FeatureSettings::class)->feature1[0]}}"></div><div class="services-details d-grid"><h2 class="text-center my-1 text-uppercase h4">{{app(\App\Settings\FeatureSettings::class)->feature1[0]}}</h2><p class="my-2 text-center">{{app(\App\Settings\FeatureSettings::class)->feature1[1]}}</p></div></div></div><div class="col-lg-3 col-md-5 col-sm-6 col-12 p-lg-2 p-md-2 p-1 mb-lg-0 mb-5"><div class="services_card service_child2 p-3 py-4 rounded-5 position-relative h-100"><div class="services_image position-relative mx-auto"><img loading="lazy" src="{{url('images/detail_analysis_guy.webp')}}" height="220" width="220" alt="{{app(\App\Settings\FeatureSettings::class)->feature2[0]}}"></div><div class="services-details d-grid"><h2 class="text-center my-1 text-uppercase h4">{{app(\App\Settings\FeatureSettings::class)->feature2[0]}}</h2><p class="my-2 text-center">{{app(\App\Settings\FeatureSettings::class)->feature2[1]}}</p></div></div></div><div class="col-lg-3 col-md-5 col-sm-6 col-12 p-lg-2 p-md-2 p-1 mb-lg-0 mb-5"><div class="services_card service_child3 p-3 py-4 rounded-5 position-relative h-100"><div class="services_image position-relative mx-auto"><img loading="lazy" src="{{url('images/exam_quiz_guy.webp')}}" height="220" width="220" alt="{{app(\App\Settings\FeatureSettings::class)->feature3[0]}}"></div><div class="services-details d-grid"><h2 class="text-center my-1 text-uppercase h4">{{app(\App\Settings\FeatureSettings::class)->feature3[0]}}</h2><p class="my-2 text-center">{{app(\App\Settings\FeatureSettings::class)->feature3[1]}}</p></div></div></div><div class="col-lg-3 col-md-5 col-sm-6 col-12 p-lg-2 p-md-2 p-1 mb-lg-0 mb-5"><div class="services_card service_child4 p-3 py-4 rounded-5 position-relative h-100"><div class="services_image position-relative mx-auto"><img loading="lazy" src="{{url('images/learning_videos_guy.webp')}}" height="220" width="220" alt="{{app(\App\Settings\FeatureSettings::class)->feature4[0]}}"></div><div class="services-details d-grid"><h2 class="text-center my-1 text-uppercase h4">{{app(\App\Settings\FeatureSettings::class)->feature4[0]}}</h2><p class="my-2 text-center">{{app(\App\Settings\FeatureSettings::class)->feature4[1]}}</p></div></div></div></div></section>
    @endif

    @if(app(\App\Settings\HomepageSettings::class)->enable_categories)
        <section class="categories_section py-4 my-5 container-lg container-md"><h2 class="display-5 text-center fw-medium my-2">Our Categories</h2><div class="heading_separator mx-auto rounded-pill mb-4"></div><p class="section_top_text fw-medium text-center my-1 category-text mt-4">{{app(\App\Settings\CategorySettings::class)->title}}</p><p class="fst-italic text-center my-1 mb-4">{{app(\App\Settings\CategorySettings::class)->subtitle}}</p><div class="row align-items-center justify-content-center py-4"><div class="col-11 col-lg-3 col-md-6 col-sm-6 p-0 p-lg-2 p-md-2 p-sm-2"><figure class="shape-box shape-box_half"><img loading="lazy" src="{{url('images/year_3.webp')}}" height="auto" width="100%" alt="{{ app(\App\Settings\SiteSettings::class)->app_name }} year two"><div class="brk-abs-overlay z-index-0 bg-black opacity-60"></div><figcaption><div class="show-cont"><h2 class="card-no fw-semibold">YEAR 3</h2><h2 class="card-main-title">11+ Grammar Exams</h2></div><p class="card-content">Transitioning to complex topics in language, math, and our core subjects, encouraging critical thinking and problem-solving abilities</p><a aria-label="Explore Year 3" href="/explore/year-3" class="read-more-btn">Explore Year3</a></figcaption><span class="after"></span></figure></div><div class="col-11 col-lg-3 col-md-6 col-sm-6 p-0 p-lg-2 p-md-2 p-sm-2"><figure class="shape-box shape-box_half"><img loading="lazy" src="{{url('images/year_4.webp')}}" height="auto" width="100%" alt="{{ app(\App\Settings\SiteSettings::class)->app_name }} year three"><div class="brk-abs-overlay z-index-0 bg-black opacity-60"></div><figcaption><div class="show-cont"><h2 class="card-no fw-semibold">YEAR 4</h2><h2 class="card-main-title">11+ Grammar Exams</h2></div><p class="card-content">Exploring advanced language, math, and scientific concepts, along with our core subjects, emphasizing independent thinking and creativity</p><a aria-label="Explore Year 4" href="/explore/year-4" class="read-more-btn">Explore Year4</a></figcaption><span class="after"></span></figure></div><div class="col-11 col-lg-3 col-md-6 col-sm-6 p-0 p-lg-2 p-md-2 p-sm-2"><figure class="shape-box shape-box_half"><img loading="lazy" src="{{url('images/year_5.webp')}}" height="auto" width="100%" alt="{{ app(\App\Settings\SiteSettings::class)->app_name }} year five"><div class="brk-abs-overlay z-index-0 bg-black opacity-60"></div><figcaption><div class="show-cont"><h2 class="card-no fw-semibold">YEAR 5</h2><h2 class="card-main-title">11+ Grammar Exams</h2></div><p class="card-content">Comprehensive learning in language, math, and advanced science, combined with our core subjects, equipping students for higher education levels</p><a aria-label="Explore Year 5" href="/explore/year-5" class="read-more-btn">Explore Year5</a></figcaption><span class="after"></span></figure></div></div></section>
    @endif
   
    <section class="blogs_features_section my-4">
        <div class="d-flex justify-content-evenly align-items-center flex-wrap p-2 fixed_width">
            <div class="blog_feature_card mx-3 my-2">
                <div class="blog_feature_image feature_card_one"></div>
                <h2 class="blog_feature_title text-uppercase fw-semibold text-center my-3">Video Lectures</h2>
            </div>
            <div class="blog_feature_card mx-3 my-2 mb-3 blog_feature_card_transform">
                <div class="blog_feature_image feature_card_two"></div>
                <h2 class="blog_feature_title text-uppercase fw-semibold text-center my-3">Interactive Lesson</h2>
            </div>
            <div class="blog_feature_card mx-3 my-2">
                <div class="blog_feature_image feature_card_four"></div>
                <h2 class="blog_feature_title text-uppercase fw-semibold text-center my-3">Slide Presentations</h2>
            </div>
        </div>
    </section>

    <!-- footer  -->
    @include('components.home-footer')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
        integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD"
        crossorigin="anonymous"></script>
    <script>
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