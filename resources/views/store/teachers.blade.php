<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{app(\App\Settings\KeywordsSettings::class)->title['teacher_title']}}</title>
    <meta name="description" content="{{app(\App\Settings\KeywordsSettings::class)->description['teacher_description']}}">
    <meta name="keywords" content="{{app(\App\Settings\KeywordsSettings::class)->keywords['teacher_keywords']}}">    
    <meta name="author" content="{{ app(\App\Settings\SiteSettings::class)->app_name }}">       
    <link rel="canonical" href="{{ url()->current() }}"/>
	<link rel="alternate" href="{{ url()->current() }}" hreflang="en-gb">
    <link rel="icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}">
    <link rel="preload" href="{{url('Frontend_css/style.css')}}" as="style">
    <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" as="style">
    <link rel="preconnect" href="https://googleads.g.doubleclick.net">
    <link rel="preconnect" href="https://td.doubleclick.net">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://www.google-analytics.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Kanit:wght@200;300;400;500&display=swap">
    <link rel="stylesheet" href="{{url('Frontend_css/style.css')}}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    @include('components.google-tags')
    <style>
        .teacher_header_section { min-height: 600px; max-height: fit-content; width: auto; background: var(--primary); } .teachers .teachers-cards-section:hover { cursor: pointer; } .teachers .teachers-cards-text { cursor: pointer; } .teachers .teachers-cards-section { height: 350px; width: 100%; background-position: center; background-size: cover; background-repeat: no-repeat; position: relative; } .teachers .teachers-cards-text h3 { font-size: 1.3rem; color: #000; font-weight: 600; } .teachers .teachers-cards-text h6 { color: #000; font-size: 0.9rem; font-weight: 400; } .teachers .teachers-cards-text p { font-size: 1rem; font-weight: 400; color: #6F6F6F; } .header-section { background: hsl(227, 57%, 11%); } .teacher-section { background: hsl(227, 57%, 11%); } .private-tution { background: hsl(0, 0%, 92%); } .private-tution .card-body { background: white; height: 350px; } .btn button { font-family: "Montserrat", sans-serif; display: inline-block; border: none; outline: none; border-radius: 0.2rem; color: var(--text); cursor: pointer; } .product-image img { max-width: 90%; height: 80%; user-select: none; } /*===== CARD =====*/ .about_features_section { height: auto; width: auto; margin: 3rem auto; background:linear-gradient(319deg, #4399ff, var(--primary)); position: -webkit-sticky; } .container-cards { height: 100%; margin: auto; display: flex; align-items: center; justify-content: space-evenly; } .card { position: relative; padding: 1rem; width: 350px; height: 450px; box-shadow: -1px 15px 30px -12px rgb(32, 32, 32); border-radius: 0.9rem; background-color: var(--red-card); color: var(--text); cursor: pointer; } .product-image { height: 230px; width: 100%; transform: translate(0, -1.5rem); transition: transform 500ms ease-in-out; filter: drop-shadow(5px 10px 15px rgba(8, 9, 13, 0.4)); } .product-info { text-align: center; } .card:hover .product-image { transform: translate(-1.5rem, -7rem) rotate(-20deg); } .product-info h2 { font-size: 1.4rem; font-weight: 600; } .product-info p { margin: 0.4rem; font-size: 0.8rem; font-weight: 600; } .price { font-size: 1.2rem; font-weight: 500; } .btn { display: flex; justify-content: space-evenly; align-items: center; margin-top: 0.8rem; } .buy-btn { background-color: var(--btn); padding: 0.6rem 3.5rem; font-weight: 600; font-size: 1rem; transition: 300ms ease; } .buy-btn:hover { background-color: var(--btn-hover); } .fav { box-sizing: border-box; background: #fff; padding: 0.5rem 0.5rem; border: 1px solid#000; display: grid; place-items: center; } .svg { height: 25px; width: 25px; fill: #fff; transition: all 500ms ease; } .fav:hover .svg { fill: #000; } @media screen and (max-width: 800px) { body { height: auto; } .container-cards { padding: 2rem 0; width: 100%; flex-direction: column; gap: 3rem; } } .cards { display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem; margin: 4rem 5vw; padding: 0; list-style-type: none; } .card-teacher { position: relative; display: block; height: 100%; border-radius: calc(var(--curve) * 1px); overflow: hidden; text-decoration: none; } .card__image { width: 100%; height: auto; } .card__overlay { position: absolute; bottom: 0; left: 0; right: 0; z-index: 1; border-radius: calc(var(--curve) * 1px); background-color: var(--surface-color); transform: translateY(100%); transition: .2s ease-in-out; background: #fceffc; } .card-teacher:hover .card__overlay { transform: translateY(0); } .card__header { position: relative; display: flex; align-items: center; gap: 2em; padding: 2em; border-radius: calc(var(--curve) * 1px) 0 0 0; background-color: var(--surface-color); transform: translateY(-100%); transition: .2s ease-in-out; background: rgb(252, 239, 252); } .card__arc { width: 80px; height: 80px; position: absolute; bottom: 100%; right: 0; z-index: 1; } .card__arc path { fill: rgb(252, 239, 252); d: path("M 40 80 c 22 0 40 -22 40 -40 v 40 Z"); } .card-teacher:hover .card__header { transform: translateY(0); } .card__thumb { flex-shrink: 0; width: 50px; height: 50px; border-radius: 50%; } .card__title { font-size: 1em; margin: 0 0 .3em; color: #6A515E; } .card__tagline { display: block; margin: 1em 0; font-family: "MockFlowFont"; font-size: .8em; color: #D7BDCA; } .card__status { font-size: .8em; color: #D7BDCA; } .card__description { padding: 0 2em 2em; margin: 0; color: #D7BDCA; font-family: "MockFlowFont"; display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 3; overflow: hidden; } .container-image { transform: perspective(50rem) rotateY(14deg); transition: 0.3s } .container-image:hover { scale: 1.03; transform: perspective(50rem) rotateY(0); } .container-image .card-text { width: 75%; max-height: auto; min-height: 250px; object-fit: cover; border-radius: 30px; background: linear-gradient(250deg , white , #e3e3e3); transform-origin: center; transition: 0.3s; filter: drop-shadow(-3px 2px 5px #00000065); } .container-image { max-width: 600px; max-height: auto; min-height: 200px; display: flex; justify-content: center; align-items: center; gap: 20px; } .container-image .card-text:hover { transform: perspective(800px) rotateY(0deg); opacity: 1; } .teachers_section { height: auto; width: auto; margin: 4rem auto; } .teacher_registration { height: auto; width: auto; margin: 3rem auto; } .about_features_card { box-shadow: 0px 3px 6px 1px #00000040; } .cards-teacher{ min-width: 70%; max-width: 85%; } .header-heading { line-height: 1.6; } .learning-image { filter: contrast(1.1); }
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
                        <div class="col-12 col-lg-5 col-md-10 col-sm-12 mt-4 my-2">
                            <h1 class="display-3 fw-bold mt-4 text-capitalize text-white">Educate, Motivate, Elevate With Us!</h1>
                            <p class="fs-5 fw-light text-white my-1 header-heading">We have a wide range of experienced and qualified teachers who are passionate about helping kids learn and succeed. Whether your child needs help with a specific subject, or they just need some extra support, we have a tutor who is perfect for them</p>
                            <a type="button" href='{{app(\App\Settings\HeroSettings::class)->cta_link}}' class="border-0 my-2 p-2 px-4 secondary_btn font_medium text-decoration-none">{{app(\App\Settings\HeroSettings::class)->cta_text}}</a>
                        </div>
                        <div class="col-12 col-lg-7 col-md-12 col-sm-12 mt-lg-5 py-2 justify-content-center d-flex" >
                            <div class="fixed_header_media_width mx-auto">
                                <img src="{{url('images/teacher_section.webp')}}" width="100%" height="auto" alt="a teacher standing with whote board" class="learning-image">  
                            </div>
                        </div>    
                    </div>    
                </div>
            </div>
        </header>
    </section>
    <!-- three column -->
    <!-- <section class="about_features_section fixed_width">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-8 col-12">
                    <div class="about_features_card bg-white p-3 rounded text-center fw-light" >
                        <div class="my-3">
                            <img src="images/star-icon.png" height="75" width="75" class="img-fluid" alt="">
                        </div>
                        <p class='paragraph_font my-2'>All of our tutors are enhanced DBS checked and have extensive experience in KS2 tutoring</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-8 col-12">
                    <div class="about_features_card bg-white p-3 rounded text-center fw-light">
                        <div class="my-3">
                            <img src="images/check-icon.png" height="75" width="75" class="img-fluid" alt="">
                        </div>
                        <p class='paragraph_font my-2'>We'll match you with a subject specialist based on your child's needs learning goals</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-8 col-12" style="text-align:center">
                    <div class="about_features_card bg-white p-3 rounded text-center fw-light">
                        <div class="my-3">
                            <img src="images/review-icon.png" height="75" width="75" class="img-fluid" alt="">
                        </div>
                        <p class='paragraph_font my-2'>Not happy with your first lesson? We give you a refund or replacement tutor for free!</p>
                    </div>
                </div>
            </div>
        </div>
    </section> -->

    <!-- registration  -->
    <section class="teacher_registration py-2">
        <div class="row align-items-center col-lg-11 col-12 mx-auto">
            <div class="col-lg-8 col-md-6 col-sm-12 col-12 my-3">
                <h2 class="display-4 fw-medium mb-3 my-2 text-capitalize">Get Started As A Tutor!</h2>
                <p class="paragraph_font fw-light">Calling all educators! Join {{ app(\App\Settings\SiteSettings::class)->app_name }} as a tutor or teacher and embark on an enriching journey of online teaching. Our user-friendly online portals empower you to create questions sets, exams, and tests tailored for your students. Take control and make a difference in children's education. Sign up today and inspire young minds while enjoying the convenience of online teaching. Your expertise will shape a brighter future!</p>
                <div class="my-4">
                    <a href='/registration' type="button" class="border-0 my-2 p-2 px-4 secondary_btn text-decoration-none">Signup As A Tutor!</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 col-12 my-3 pt-2 text-end">
                <img loading="lazy" src="{{url('images/carttonic_teacher_image.webp')}}" width="100%" height="auto" alt="get started as a teacher image">
            </div>
        </div>
    </section>

    <!-- cards -->
    <div class="about_features_section py-2">
        <div class="row fixed_width my-4">
            <div class="col-lg-4">
                <div class="container-image">
                    <div class="card-text text-center m-3">
                        <p class="mt-5">Loved by over</p>
                        <h2 class='h4'>1,000 Families </h2>
                        <img loading="lazy"  src="{{url('images/star-icon.webp')}}" height="60" width="60" class="img-fluid" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="container-image">
                    <div class="card-text text-center m-3">
                        <p class="mt-5">Qualified from top <br> UK universities</p>
                        <h2 class='h4'>Leading UK Tutors</h2>
                        <img  loading="lazy"  src="{{url('images/review-icon.webp')}}" height="60" width="60" class="img-fluid" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="container-image m-3">
                    <div class="card-text text-center">
                        <p class="mt-5">Prepare with confidence</p>
                        <h2 class='h4'>90,000+ Questions </h2>
                        <img loading="lazy"  src="{{url('images/check-icon.webp')}}" height="60" width="60" class="img-fluid" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- our teachers -->
    <section class="teachers_section py-2">
        <div class="section_heading mb-4 container-fluid text-center">
            <h2 class="display-5 fw-medium my-2 mb-3 text-capitalize">{{app(\App\Settings\TeacherSettings::class)->title}}</h2>
            <div class="heading_separator mx-auto rounded-pill mb-4"></div>
            <p>{{app(\App\Settings\TeacherSettings::class)->subtitle}}</p>
        </div>   
        <ul class="cards mt-5">
            @foreach(app(\App\Settings\TeacherSettings::class)->teachers as $teacher)
                @if($teacher[4])
                    <li class="cards-teacher mx-auto">
                        <div class="card-teacher rounded-5 shadow-lg">
                            <img loading="lazy"  src="{{$teacher[3]}}" class="card__image" width="265" height="345" alt="{{$teacher[0]}}" />
                            <div class="card__overlay">
                                <div class="card__header">
                                    <svg class="card__arc" xmlns="http://www.w3.org/2000/svg"><path /></svg>
                                    <img loading="lazy"  class="card__thumb" src="{{$teacher[3]}}" alt="{{$teacher[0]}}" width="265" height="345" />
                                    <div class="card__header-text">
                                        <h3 class="card__title text-black fw-bold">{{$teacher[0]}}</h3>
                                        <span class="card__status text-black">{{$teacher[1]}}</span>
                                    </div>
                                </div>
                                <p class="card__description text-black">{{$teacher[2]}}</p>
                            </div>
                        </div>
                    </li>
                @endif
            @endforeach
        </ul>
    </section>
    <!-- footer  -->
    @include('components.home-footer')

    <script defer src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
        integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD"
        crossorigin="anonymous"></script>
    <script defer>
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