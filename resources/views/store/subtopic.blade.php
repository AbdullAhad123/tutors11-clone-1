<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Master {{$subtopic['name']}} Skills of {{$topic['name']}} | {{$subject['name']}} | {{ app(\App\Settings\SiteSettings::class)->app_name }}</title>
    <meta name="description" content="{{app(\App\Settings\KeywordsSettings::class)->description['subtopic_description']}}">
    <link rel="canonical" href="{{ url()->current() }}"/>
	<link rel="alternate" href="{{ url()->current() }}" hreflang="en-gb">
    <meta name="author" content="{{ app(\App\Settings\SiteSettings::class)->app_name }}">
    <meta name="keywords" content="{{app(\App\Settings\KeywordsSettings::class)->keywords['subtopic_keywords']}}">
    <link rel="icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}">
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
        .teacher_header_section {
            min-height: 600px;
            max-height: fit-content;
            width: auto;
            background: var(--primary);
        }

        .teacher_registration {
            height: auto;
            width: auto;
            margin: 2.5rem auto;
        }
        @media (max-width: 768px) {
            .journey_section_image {
                top: -15px !important;
                transform: translate(-50%) !important;
                left: 50% !important;
            }
        }
        .journey_banner_section {
            background: radial-gradient(#ffcd83, #ffb548) !important;
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
                        <div class="align-items-center col-12 col-lg-6 col-md-10 col-sm-12 header_text_side justify-content-center mt-5 mt-lg-0 mt-md-5 mt-sm-5 my-2 p-3 py-4 py-lg-0">
                            <h1 class="display-4 fw-medium mt-4 text-white">Exploring the <br> World of {{$subtopic['name']}}</h1>
                            <p class="fs-5 fw-light header_heading my-2 text-white">
                                @if($subtopic['short_description'])
                                    {{$subtopic['short_description']}}
                                @else
                                    We have a wide range of experienced and qualified teachers who are passionate about helping kids learn and succeed. Whether your child needs help with a specific subject, or they just need some extra support, we have a tutor who is perfect for them
                                @endif
                            </p>
                            <div class="input-group mb-3 position-relative d-flex animate__animated animate__fadeInUp">
                                <a href='{{app(\App\Settings\HeroSettings::class)->cta_link}}' class="border-0 mt-3 p-2 px-4 secondary_btn font_medium text-decoration-none">
                                    <span class='text_shadow'>{{app(\App\Settings\HeroSettings::class)->cta_text}}</span>
                                </a>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 col-md-12 col-sm-12 mt-lg-5 py-2 justify-content-center d-flex" >
                            <div class="fixed_header_media_width mx-auto">
                                <img src="{{url('images\journey_guys.png')}}" width="100%" height="auto" style='filter: contrast(1.1);' alt="TutorsElevenPlus learning isometric" class="animate__animated animate__bounceInRight custom_animation_duration learning-image">  
                            </div>
                        </div>    
                    </div>    
                </div>
            </div>
        </header>
    </section>

    <section class="teacher_registration">
        <div class="row align-items-center col-lg-11 col-12 mx-auto">
            <div class="col-lg-7 col-md-6 col-sm-12 col-12 my-3">
                <h2 class="display-5 fw-medium my-2 text-capitalize">Journeying through us!</h2>
                <div class="heading_separator rounded-pill mb-4"></div>
                <p class="paragraph_font fw-light">Calling all educators! Join TutorsElevenPlus as a tutor or teacher and embark on an enriching journey of online teaching. Our user-friendly online portals empower you to create question sets, exams, and quizzes tailored for your students. Take control and make a difference in children's education. Sign up today and inspire young minds while enjoying the convenience of online teaching. Your expertise will shape a brighter future!</p>
                <div class="my-4">
                </div>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12 col-12 my-3 pt-2 text-end">
                <img src="https://img.freepik.com/premium-photo/polydimensional-learning-3d-school-scene-with-teacher-kids-isolated-background_789916-2769.jpg?w=1380"  width="100%"
                    height="auto" alt="teacher teaching childrens">
            </div>
        </div>
    </section>

    @if(count($subtopics) > 0)
        <section class="blogs_section_cards fixed_width my-4">
            <div class="section_heading mb-4">
                <h2 class="display-5 text-center fw-medium my-2">{{$subtopic['name']}} Details</h2>
                <div class="heading_separator mx-auto rounded-pill mb-4"></div>
            </div>  
            <div class="row m-0 align-ittems-center py-4">
                @foreach($subtopics as $subtopic_data)
                    <div class="col-lg-5 col-md-6 col-sm-12 col-12 my-3">
                        <a href="{{route('sub_topic',['subject'=>$subject['slug'],'topic'=>$topic['slug'],'subtopic'=>$subtopic['slug']])}}">
                            <div class="bg-white shadow p-3 rounded d-flex align-items-center">
                                <div>
                                    <h2 class="fw-medium fs-4 text-dark my-2">{{$subtopic_data['name']}}</h2>
                                    <p class="fs-6 fw-light my-2 text-dark">
                                        @if($subtopic_data['short_description'])
                                            {{$subtopic_data['short_description']}}
                                        @else
                                            Understanding the Fundamental Concept of {{$subtopic_data['name']}}
                                        @endif
                                    </p>
                                </div> 
                                <img src="{{ url('images/sub-topics.png') }}" height="100" width="100" alt="an opened book with creative ideas" class="img-fluid rounded ms-3 mt-2">
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </section>
    @endif

    <section class="journey_banner_section p-3 py-5 row align-items-center m-0">
        <div class="col-lg-8 col-md-6 col-sm-12 col-12 my-2 header_text_side">
            <p class="mb-1 fs-5 fw-light">Student portal!</p>
            <h2 class="fw-bold h1">Detailed Journey Planner</h2>
            <p class="paragraph_font fw-light">With our detailed learning journey planner, students embark on a structured educational path. We cover multiple topics and subtopics in every subject, offering engaging lessons, interactive activities, and Personalised guidance for a comprehensive learning experience.</p>
            <a aria-label="Explore Our Journey" href="{{route('detailed_journey_planner')}}" type="button" class="border-2 mt-4 mt-lg-0 mt-md-2 p-2 position-relative px-4 rounded-2 rounded-pill secondary_btn z-1 z-index-top">Explore Our Journey</a>
        </div>
        <div class="col-lg-4 col-md-5 col-sm-12 col-12 my-2 align-items-center rounded-5 text-center position-relative journey_section_image_container">
            <img loading="lazy" src="{{url('images/journey_header_image.png')}}" class="position-absolute bottom-0 end-0 journey_section_image learning-image img-fluid" height="auto" width="auto" alt="journey guys image">
        </div>
    </section>

    <section class="stats_section fixed_width my-5 py-4">
        <div class="row m-0 align-items-center justify-content-center">
            <div class="col-lg-4 col-md-4 col-sm-6 col-12 my-3">
                <div class="bg-white border p-4 rounded-4 shadow">
                    <h2 class="h1 my-1 text-center text-primary">4+</h2>
                    <h2 class="my-2 text-center h5">SUBJECTS</h2> 
                    <hr class="my-1" />
                    <p class="fw-light my-3 text-center">Engaging subjects for young minds, making learning an exciting journey.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-12 my-3">
                <div class="bg-white border p-4 rounded-4 shadow">
                    <h2 class="h1 my-1 text-center text-primary">15+</h2>
                    <h2 class="my-2 text-center h5">YEARS EXPERIENCE</h2> 
                    <hr class="my-1" />
                    <p class="fw-light my-3 text-center">Trusted for quality education, empowering students for unparalleled success.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-12 my-3">
                <div class="bg-white border p-4 rounded-4 shadow">
                    <h2 class="h1 my-1 text-center text-primary">90k+</h2>
                    <h2 class="my-2 text-center h5">QUESTIONS</h2> 
                    <hr class="my-1" />
                    <p class="fw-light my-3 text-center">Providing individualized assistance to inspire and develop future leaders.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- footer  -->
    @include('components.home-footer')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
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