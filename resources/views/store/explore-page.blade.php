<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="{{ app(\App\Settings\SiteSettings::class)->app_name }}">
    <meta name="keywords" content="{{app(\App\Settings\KeywordsSettings::class)->keywords['explore_keywords']}}">
    <title>{{app(\App\Settings\KeywordsSettings::class)->title['explore_title']}}</title>
    <meta name="description" content="{{app(\App\Settings\KeywordsSettings::class)->description['explore_description']}}">
    <link rel="icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}">
    <link rel="canonical" href="{{ url()->current() }}"/>
	<link rel="alternate" href="{{ url()->current() }}" hreflang="en-gb">
    <link rel="preload" href="{{url('Frontend_css/style.css')}}" as="style">
    <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" as="style">
    <link rel="preconnect" href="https://googleads.g.doubleclick.net">
    <link rel="preconnect" href="https://td.doubleclick.net">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://www.google-analytics.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Kanit:wght@200;300;400;500&display=swap">
    <link rel="stylesheet" href="{{url('Frontend_css/style.css')}}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    @include('components.google-tags')
</head>
<style>
    .progress-bar {
        width: 100%;
    }
    .join-para
    {
        color:linear-gradient(3deg,white,white);
    }
    .photo_gallery_section {
        max-width: 1520px !important
    }
    .gallery_images_parent {
        cursor: pointer;
        transition: 0.25s
    }

    .gallery_images_parent:hover {
        scale: 1.04
    }

    .students_section, .categories_section {
        margin: 2rem auto !important;
    }
    .subjects_cards{
        /* background:radial-gradient(#ffb33f ,#ff5e00d1) !important */
        transition:0.40s
    }
    .subjects_cards:hover{
        scale:1.1;
    }


</style>
<body>
    <!-- header  -->
    <section class="header">
        @include('components.home-navbar')
        @if(app(\App\Settings\HomepageSettings::class)->enable_hero)
            <div class="explore-page-header flex  py-5">
                <article class="d-flex justify-content-lg-center">
                    <div class="col-lg-6 col-md-8 col-sm-11 px-3">
                        <h1 class="display-4 fw-medium mt-4 text-white">Explore Limitless <br> Learning Opportunities</h1>
                        <p class="fs-5 fw-light header_heading my-2 text-white">Explore interactive lessons, creative challenges, and more. Customise learning, unlock achievements, and ignite curiosity.</p>
                        <a href="/login" class="border-0 font_medium my-2 p-2 px-4 secondary_btn text-decoration-none"  >Get Started</a>
                    </div>
                </article>
            </div>
            <div class="learn-from-prof counter-cards mt-3 position-relative">
                <div class="container-fluid col-lg-11 col-md-12 col-sm-12 col-12 p-2 ">
                    <div class="row align-items-center justify-content-center m-0">
                        <div class="col-lg-3 col-md-6 col-sm-8 col-12 m-1 ">
                            <div class="learn-cards  learn bg-white shadow p-2 rounded-2 justify-content-center">
                                <h1 class="explore-counter text-center text-primary">4+</h1>
                                <p class="text-center display-7 fw-medium">SUBJECTS</p>
                                <p class="text-center paragraph_font fw-light ">Engaging subjects for young minds, making learning an exciting journey.</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-8 col-12 m-1">
                            <div class="learn-cards learn bg-white shadow p-2 rounded-2 text-center">
                                <h1 class="explore-counter text-center text-primary">15+</h1>
                                <p class="text-center display-7 fw-medium">YEARS EXPERIENCE</p>
                                <p class="text-center paragraph_font fw-light">Trusted for quality education, empowering students for unparalleled success.</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-8 col-12 m-1">
                            <div class="learn-cards learn bg-white shadow p-2 rounded-2 text-center">
                                <h1 class="explore-counter text-center text-primary">90k+</h1>
                                <p class="text-center display-7 fw-medium">QUESTIONS</p>
                                <p class="text-center paragraph_font fw-light">Inspiring and nurturing future leaders with personalised guidance!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </section>
    <section class="students_section mt-0">
        <div class="container">
            <div class="row align-items-center m-0">
                <div class="col-lg-5 col-md-6 col-sm-12 col-12 my-2 text-center">
                    <img src="{{url('images/tutors11_students.webp')}}" width="400" height="400" alt="a group of happy students with bags and books in hands" class="learning-image">
                </div>
                <div class="col-lg-7 col-md-6 col-sm-12 col-12 my-2">
                    <h2 class='fs-6 fw-medium mb-0 text-uppercase text_primary'><div class="decor-left px-2"><span></span></div>Tutorselevenplus Education</h2>
                    <h2 class="display-5 fw-medium my-2">Learn & Upgrade your Skills on your Schedule</h2>
                    <p class="mb-3 fs-5 fw-light">Explore a world of knowledge at your own pace with our flexible learning solutions.Enhance your academic expertise and embrace the freedom to learn on your terms, from anywhere, at any time.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- NEW CATEGORIES SECTION -->
    @if(app(\App\Settings\HomepageSettings::class)->enable_categories)
        <section class="categories_section">
            <div class="container-lg container-md">
                <div class="section_heading mb-4">
                    <h2 class="display-5 text-center fw-medium my-2">{{ app(\App\Settings\SiteSettings::class)->app_name }} Categories</h2>
                    <div class="heading_separator mx-auto rounded-pill mb-4"></div>
                </div>                              
                <div class="categories_container">
                    <div class="my-4">
                        <p class="section_top_text fw-medium text-center my-1 text-primary">{{app(\App\Settings\CategorySettings::class)->title}}</p>
                        <p class="fst-italic text-center my-1">{{app(\App\Settings\CategorySettings::class)->subtitle}}</p>
                    </div>
                    <div class="row align-items-center justify-content-center m-0">
                        <div class="col-11 col-lg-3 col-md-6 col-sm-6 p-0 p-lg-2 p-md-2 p-sm-2">
                            <figure class="shape-box shape-box_half">
                                <img loading="lazy"
                                    src=" {{url('images/year_4.webp')}}" alt="year4">
                                <div class="brk-abs-overlay z-index-0 bg-black opacity-60"></div>
                                <figcaption>
                                    <div class="show-cont">
                                        <h2 class="card-no text-uppercase fw-semibold">year 3</h2>
                                        <h2 class="card-main-title">11+ Grammar Exams</h2>
                                    </div>
                                    <p class="card-content">Transitioning to complex topics in language,  Maths, English, Verbal and Non-Verbal Reasoning encouraging critical thinking , building confidence and problem solving</p>
                                    <a href="/explore/year-3" class="read-more-btn">Explore year3 course</a>
                                </figcaption>
                                <span class="after"></span>
                            </figure>
                        </div>
                        <div class="col-11 col-lg-3 col-md-6 col-sm-6 p-0 p-lg-2 p-md-2 p-sm-2">
                            <figure class="shape-box shape-box_half">
                                <img loading="lazy"
                                    src="{{url('images/year_3.webp')}}" alt="year3">
                                <div class="brk-abs-overlay z-index-0 bg-black opacity-60"></div>
                                <figcaption>
                                    <div class="show-cont">
                                        <h2 class="card-no text-uppercase fw-semibold">year 4</h2>
                                        <h2 class="card-main-title">11+ Grammar Exams</h2>
                                    </div>
                                    <p class="card-content">Exploring advanced language,  Maths, English, Verbal and Non-Verbal Reasoning, emphasizing independent thinking and creativity</p>
                                    <a href="/explore/year-4" class="read-more-btn">Explore year4 course</a>
                                </figcaption>
                                <span class="after"></span>
                            </figure>
                        </div>
                        <div class="col-11 col-lg-3 col-md-6 col-sm-6 p-0 p-lg-2 p-md-2 p-sm-2">
                            <figure class="shape-box shape-box_half">
                                <img
                                loading="lazy" src="{{url('images/year_1.webp')}}" width=224 alt="year1">
                                <div class="brk-abs-overlay z-index-0 bg-black opacity-60"></div>
                                <figcaption>
                                    <div class="show-cont">
                                        <h2 class="card-no text-uppercase fw-semibold">year 5</h2>
                                        <h2 class="card-main-title">11+ Grammar Exams</h2>
                                    </div>
                                    <p class="card-content">Comprehensive learning in language,  Maths, English, Verbal and Non-Verbal Reasoning, equipping students for higher education levels</p>
                                    <a href="/explore/year-5" class="read-more-btn">Explore year5 course</a>
                                </figcaption>
                                <span class="after"></span>
                            </figure>
                        </div>
                        <!-- <div class="col-11 col-lg-3 col-md-6 col-sm-6 p-0 p-lg-2 p-md-2 p-sm-2">
                            <figure class="shape-box shape-box_half">
                                <img loading="lazy" src="{{url('images/year_5.webp')}}"
                                    alt="year5">
                                <div class="brk-abs-overlay z-index-0 bg-black opacity-60"></div>
                                <figcaption>
                                    <div class="show-cont">
                                        <h2 class="card-no text-uppercase fw-semibold">independent school exams</h2>
                                    </div>
                                    <p class="card-content">Foundational skills in  Maths, English, Verbal and Non-Verbal Reasoning, fostering curiosity and preparing for future learning.</p>
                                    <a href="/explore/year-1" class="read-more-btn">Explore this course</a>
                                </figcaption>
                                <span class="after"></span>
                            </figure>
                        </div> -->
                    </div>
                </div>
            </div>
        </section>
    @endif

    <!-- Join together -->
    <section class="join_together_section">
        <div class="container">
            <div class="row align-items-center justify-content-center m-0">
                <div class="col-lg-5 col-md-6 col-sm-12 col-12 text-center">
                    <img src="{{url('images/instructor.png')}}" width="400" height="400" alt="a cute boy standing with books and some creative ideas" class="learning-image">
                </div>
                <div class="col-lg-7 col-md-12 col-sm-12 col-12 my-2">
                    <div class="join-together p-5 ">
                        <h2 class="text-white display-7 fw-medium mb-3 my-2 text-capitalize">Join TutorsElevenPlus Where Dreams Transform into Reality</h2>
                        <p class="text-white fs-5 fw-light join-para">Together, let's achieve extraordinary results. Let's make amazing things happen. Join us and turn dreams into achievements!"</p>
                        <a href='/login'   class="border-0 my-2 p-2 px-4 secondary_btn text-decoration-none">Join Tutorselevenplus!</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Qualified services -->
    <section class="qualify_section">
        <div class="container">
            <div class="row align-items-center m-0">
                <div class="col-lg-6 col-md-6 col-sm-12 col-12 my-2">
                    <h2 class="display-5 fw-medium my-2">Qualifying Services</h2>
                    <p class="my-2 fs-5 fw-light">Our services cover Maths, English, Verbal and Non-Verbal Reasoning. Sessions enhance understanding, critical thinking, and confidence for 11+ exam success.</p>
                    <!-- <div class="my-4">
                        <div class="my-4">
                            <p class='my-1 paragraph_font text-uppercase fw-medium'>Maths</p>
                            <div class="progress maths_progress_bar rounded-1" role="progressbar"
                                aria-label="Warning example" aria-valuenow="75">
                                <div class="progress-bar progress-1 h-100" ></div>
                            </div>
                        </div>
                        <div class="my-4">
                            <p class='my-1 paragraph_font text-uppercase fw-medium'>English</p>
                            <div class="progress maths_progress_bar rounded-1" role="progressbar"
                                aria-label="Warning example" aria-valuenow="85">
                                <div class="progress-bar progress-1 h-100" ></div>
                            </div>
                        </div>
                        <div class="my-4">
                            <p class='my-1 paragraph_font text-uppercase fw-medium'>Verbal Reasoning</p>
                            <div class="progress vr_progress_bar rounded-1" role="progressbar"
                                aria-label="Example with label" aria-valuenow="25">
                                <div class="progress-bar progress-2 h-100" ></div>
                            </div>
                        </div>
                        <div class="my-4">
                            <p class='my-1 paragraph_font text-uppercase fw-medium'>Non-Verbal Reasoning</p>
                            <div class="progress nvr_progress_bar rounded-1" role="progressbar"
                                aria-label="Example with label" aria-valuenow="50">
                                <div class="progress-bar progress-3 h-100"></div>
                            </div>
                        </div>
                    </div> -->
                    <div class="my-4">
                        <div class="row align-items-center">
                            <div class="col-lg-6 col-md-6 col-sm-12 my-2">
                                <div class="subjects_cards p-3 shadow rounded-3 d-flex justify-content-between align-items-center">
                                    <h4 class="fs-5 fw-normal m-0">Maths</h4>
                                    <img src="{{url('images/maths.png')}}" height="35" width="35" alt="" >
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 my-2">
                                <div class="subjects_cards p-3 shadow rounded-3 d-flex justify-content-between">
                                    <h4 class="fs-5 fw-normal m-0">English</h4>
                                    <img src="{{url('images/english.png')}}" height="35" width="35" alt="">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 my-2">
                                <div class="subjects_cards p-3 shadow rounded-3 d-flex justify-content-between">
                                    <h4 class="fs-5 fw-normal m-0">Verbal</h4>
                                    <img src="{{url('images/verbal_reasoning.png')}}" height="35" width="35" alt="" >
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 my-2">
                                <div class="subjects_cards p-3 shadow rounded-3 d-flex justify-content-between">
                                    <h4 class="fs-5 fw-normal m-0">Non-Verbal</h4>
                                    <img src="{{url('images/non_verbal_reasoning.png')}}" height="35" width="35" alt="">
                                </div>
                            </div>
                        
                        </div>

                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-12 text-center">
                    <img src="{{url('images/qualify.png')}}" width="400" height="400" alt="a young boy sitting on a bench with laptops and books around" class="learning-image">
                </div>
            </div>
        </div>
    </section>
    <!-- photo gallery -->
    <section class="photo_gallery_section my-5">
        <div class="section_heading mb-4">
            <h2 class="display-5 text-center fw-medium my-2">Explore Our Student Gallery</h2>
            <div class="heading_separator mx-auto rounded-pill mb-4"></div>
        </div>
        <div class="col-lg-11 mx-auto my-5 py-3">
            <div class="row align-items-center mx-2">
                <div class="col-lg-3 col-md-3 col-sm-6 col-6 mb-lg-0 rounded-3">
                    <div class="gallery_images_parent zoomIn" >
                        <div class="gallery-image ">
                            <img loading="lazy" src="{{url('images/gallery2.webp')}}" width="231" height="154"  class="h-100 w-100 shadow-1-strong rounded-5 mb-4 learning-image border border-1 shadow-sm"
                                alt="Boat on Calm Water" />
                        </div>
                    </div>
                    <div class="gallery_images_parent zoomIn" >
                        <div class="gallery-image1">
                            <img loading="lazy" src="{{url('images/gallery_vertical-image1.webp')}}" width="231" height="300"  class="h-100 w-100 shadow-1-strong rounded-5 mb-4 learning-image border border-1 shadow-sm"
                                alt="Wintry Mountain Landscape" />
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-6  mb-lg-0">
                    <div class="gallery_images_parent zoomIn">
                        <div class="gallery-image1">
                            <img loading="lazy" src="{{url('images/gallery_vertical-image2.webp')}}"  height="346" width="231" class="h-100 w-100 shadow-1-strong rounded-5 mb-4 learning-image border border-1 shadow-sm"
                                alt="Mountains in the Clouds" />
                        </div>
                    </div>
                    <div class="gallery_images_parent zoomIn image4">
                        <div class="gallery-image1">
                            <img loading="lazy" src="{{url('images/gallery4.webp')}} " width="231" height="154" class="h-100 w-100 shadow-1-strong rounded-5 mb-4 learning-image border border-1 shadow-sm"
                                alt="Boat on Calm Water" />
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-6 mb-lg-0">
                    <div class="gallery_images_parent zoomIn">
                        <div class="gallery-image1">
                            <img loading="lazy" src="{{url('images/gallery_vertical-image3.webp')}}"   width="231" height="346" class="h-100 w-100 shadow-1-strong rounded-5 mb-4 learning-image border border-1 shadow-sm"
                                alt="Yosemite National Park" />
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-6 mb-lg-0">
                    <div class="gallery_images_parent zoomIn" class="image6">
                        <div class="gallery-image1">
                            <img loading="lazy" src="{{url('images/gallery_vertical-image5.webp')}}"  width="231" height="300" class="h-100 w-100 shadow-1-strong rounded-5 mb-4 learning-image border border-1 shadow-sm"
                                alt="Yosemite National Park" />
                        </div>
                    </div>
                    <div class="gallery_images_parent zoomIn">
                        <div class="gallery-image1" class="image7">
                            <img loading="lazy" src="{{url('images/gallery5.webp')}}"  width="231" height="200"class="h-100 w-100 shadow-1-strong rounded-5 mb-4 learning-image border border-1 shadow-sm"
                                alt="Waves at Sea" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- footer  -->
    @include('components.home-footer')

    <!-- script links  -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
        integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD"
        crossorigin="anonymous"></script>
    <script>
        $(document).ready(function () {
            // toggle dropdown 
            $(".dropdown_menu").slideUp(200);
            $("a.customize_dropdown").click(function () {
                $(".dropdown_menu").slideUp(200);
                var isOpen = $(this).siblings(".dropdown_menu").is(":visible");
                if (!isOpen) {
                    $(this).siblings(".dropdown_menu").slideDown(200);
                }
            });
            // toggle navbar 
            $(window).scroll(function () {
                const scrolled = $(window).scrollTop();
                if (scrolled > 100) {
                    $("#navbar_nav").removeClass("absolute_nav bg-transparent").addClass('fixed-top fixed_nav col-lg-11 col-12');
                } else {
                    $("#navbar_nav").removeClass("fixed-top fixed_nav col-lg-11 col-12").addClass('absolute_nav bg-transparent');
                }
            });
        });
    </script>
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script>
        // testimonialSwiper
        var swiper = new Swiper(".testimonialSwiper", {
            slidesPerView: 1.1,
            spaceBetween: 10,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            breakpoints: {
                500: {
                    slidesPerView: 1.2,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 2.4,
                    spaceBetween: 20,
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 30,
                },
                1440: {
                    slidesPerView: 3,
                    spaceBetween: 30,
                }
            },
        });
    </script>
</body>

</html>