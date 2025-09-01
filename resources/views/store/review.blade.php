<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$review->name}} Thoughts about {{ app(\App\Settings\SiteSettings::class)->app_name}}</title>
    <meta name="description" content="{{$review->message}}">
    <meta name="author" content="{{ app(\App\Settings\SiteSettings::class)->app_name }}">
    <link rel="icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}">
    <link rel="canonical" href="{{ url()->current() }}"/>
	<link rel="alternate" href="{{ url()->current() }}" hreflang="en-gb">
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
        .fa-star {
            color: orange;
        }

        .text-orange {
            color: orange;
        }

        .reviews-content {

            padding: 20px;
            margin-bottom: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .like-review {
            color: blue !important;
        }

        .dislike-review {
            color: orange !important;
        }

        .icon_action {
            color: #ccc;
        }
        .reviews-second-page {
            height: auto;
            width: auto;
            margin: 6rem auto;
        }
    </style>
</head>
<body>

    <!-- header  -->
    <section>
        @include('components.home-navbar')
    </section>
    <section class="reviews-second-page pt-2">
        <div class="container-fluid col-lg-9 col-sm-12 col-md-12">
            <div class="section_heading mb-4">
                <h1 class="display-6 fw-semibold text-center my-2 ">Recommended Learning</h1>
                <div class="heading_separator mx-auto rounded-pill mb-4"></div>
            </div>
            <p class="fw-light fs-5">At TutorsElevenPlus we are proud to showcase the experiences and insights of our
                vibrant community of learners. Read the authentic reviews below to discover how our online education
                platform is making a positive impact on individuals from diverse backgrounds. From skill enhancement to
                career advancement, our courses have empowered learners to achieve their goals. Join the conversation
                and share your own experience with our community. Your journey with us is not just about courses; it's
                about transformation, growth, and success.</p>

            <div class="review-content mt-5">
                <div class="d-flex">
                    <!-- <div class="review-image">
                        <img src="../images/Testimonial1.jpg" class="rounded-circle" height="40px" width="40px" alt="">
                    </div> -->
                    <div>
                        <h5 class="fw-semibold p-2">{{$review->name}}</h5>
                        <div class="d-flex align-items-center">
                            @for ($i = 0; $i < 5; $i++)
                                @if($i < $review->rating)
                                    <i class="fa-solid fa-star text-warning"></i>
                                @else
                                    <i class="fa-solid fa-star text-black-50"></i>
                                @endif
                            @endfor
                            <div class="pt-3 ms-1">
                                <p class="text-secondary small">{{$review->rating}} Rating</p>
                            </div>
                        </div>
                        <p class="fs-5 fw-light">{{$review->message}}</p>
                        <div class="d-flex">
                            <button class="btn btn-transparent border-0 shadow-none icon_action like-review-icon like-review">
                                <i class="fa fa-thumbs-up p-1 "></i>
                            </button>
                            <button class="btn btn-transparent border-0 shadow-none icon_action dislike-review-icon">
                                <i class="fa-solid fa-thumbs-down p-1"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        {{-- <div class="section_heading mb-4">
            <h3 class="display-6 fw-semibold text-center my-2 ">Top Picks and Recommendations</h3>
            <div class="heading_separator mx-auto rounded-pill mb-4"></div>
        </div>
        <div class="review-container mt-5">
            <div class="row mt-5 justify-content-center m-0">
                <div class="col-lg-5 col-md-8 col-sm-12">
                    <div class="reviews-content">
                        <div class="stars d-flex align-items-center">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <p class="pt-3 ps-3">5 Out of 5 stars</p>
                        </div>
                        <h5 class="fw-semibold">Anum Ali</h5>
                        <p class="review-line-content fw-light fs-5">We used Katherine's tuition for our daughter and it
                            proved to be an excellent decision. Under her guidance, our daughter successfully passed
                            Kent, Bexley and Newstead Wood exams. We are deeply grateful for her unwavering support and
                            dedication. Highly recommend for anyone seeking quality 11+ tutoring.</p>
                        <div class="d-flex justify-content-between">
                            <a href="">Read more <i class="fa-solid fa-arrow-right"></i></a>
                            <p class="fw-medium">Nov-11-2020</p>
                        </div>
                    </div>

                </div>
                <div class="col-lg-5 col-md-8 col-sm-12">
                    <div class="reviews-content">
                        <div class="stars d-flex align-items-center">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <p class="pt-3 ps-3">5 Out of 5 stars</p>
                        </div>
                        <h5 class="fw-semibold">Daniel Davies</h5>
                        <p class="review-line-content fw-light fs-5">The range of courses is impressive, covering both
                            foundational and advanced topics. The platform's commitment to providing accessible and
                            high-quality education is evident throughout. As a busy professional, the flexibility to
                            learn at my own pace has been a game-changer. Five stars!</p>

                        <div class="d-flex justify-content-between">
                            <a href="">Read more <i class="fa-solid fa-arrow-right"></i></a>
                            <p class="fw-medium">Mar-28-2022</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>  --}}
    
        <div class="mx-auto my-4 text-center">
            <a href="{{ route('review') }}" class="btn btn-outline-primary d-inline-flex align-items-center justify-content-center gap-1 shadow-none p-2 px-3 back_to_reviews"><i class="fa-solid fa-arrow-left me-1"></i> Back to Reviews</a>
        </div>
    </section>
    <!-- footer start  -->
    @include('components.home-footer')

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
        integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script>
        // $(document).ready(function () {
        //     // toggle navbar 
        //     $(window).scroll(function () {
        //         const scrolled = $(window).scrollTop();
        //         if (scrolled > 100) {
        //             $("#navbar_nav").removeClass("absolute_nav bg-transparent").addClass('fixed-top fixed_nav col-lg-11 col-12');
        //         } else {
        //             $("#navbar_nav").removeClass("fixed-top fixed_nav col-lg-11 col-12").addClass('absolute_nav bg-transparent');
        //         }
        //     });
        // });

        $(document).ready(function () {
            $("#navbar_nav").removeClass("absolute_nav").addClass('fixed-top fixed_nav col-lg-11 col-12');
            $(".back_to_reviews").click(function(){
                window.history.back();
            })
        });
    </script>
</body>

</html>