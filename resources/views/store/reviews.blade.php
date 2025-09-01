<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parents and Students Feedback - {{ app(\App\Settings\SiteSettings::class)->app_name}}</title>
    <meta name="description" content="Read genuine feedback from parents and students about their experiences with TutorsElevenPlus. Learn how our expert tutoring supports 11+ exam preparation and boosts confidence!">
    <meta name="keywords" content="TutorsElevenPlus feedback, parent testimonials TutorsElevenPlus, student reviews TutorsElevenPlus, 11+ tutoring feedback, customer experiences TutorsElevenPlus, effective tutoring reviews, parents' insights TutorsElevenPlus, TutorsElevenPlus success stories, online tutoring feedback, TutorsElevenPlus client testimonials, {{app(\App\Settings\KeywordsSettings::class)->keywords['home_keywords']}}">
    <meta name="author" content="{{ app(\App\Settings\SiteSettings::class)->app_name }}">
    <link rel="icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}">
    <link rel="canonical" href="{{ url()->current() }}"/>
	<link rel="alternate" href="{{ url()->current() }}" hreflang="en-gb">
    <!-- preload links  -->
    <link rel="preload" href="{{url('Frontend_css/all.css')}}" as="style">
    <link rel="preload" href="{{url('Frontend_css/style.css')}}" as="style">
    <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" as="style">
    <link rel="preconnect" href="https://googleads.g.doubleclick.net">
    <link rel="preconnect" href="https://td.doubleclick.net">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://www.google-analytics.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Kanit:wght@200;300;400;500&display=swap">
    <link rel="stylesheet" href="{{url('Frontend_css/all.css')}}" />
    <link rel="stylesheet" href="{{url('Frontend_css/style.css')}}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    @include('components.google-tags')
    <style> 
        .review_section { height: auto; width: auto; margin: 6rem auto; } .progress-1 { width: 90%; } .progress-2 { width: 75%; } .progress-3 { width: 80%; } .reviews-content { padding: 20px; margin-bottom: 1rem; border: 1px solid #ccc; border-radius: 5px; } .maths_progress_bar .progress-bar { background:#005dc1 !important; } .vr_progress_bar .progress-bar { background:#005dc1 !important; } .nvr_progress_bar .progress-bar { background:#005dc1 !important; } .progress { margin:0 !important; max-width:700px !important; } .review-line-content { overflow: hidden; display: -webkit-box; -webkit-line-clamp: 3; /* number of lines to show */ line-clamp: 3; -webkit-box-orient: vertical; height: 90px; } .review_avatar{ width: 40px; height: 40px; }
    </style>
</head>

<body>

    <!-- header  -->
    <section>
        @include('components.home-navbar')
    </section>
    <section class="review_section px-2 fixed_width py-4">
        <div class="section_heading mb-4">
            <h1 class="display-5 text-center fw-medium my-2">Our Reviews</h1>
            <div class="heading_separator mx-auto rounded-pill mb-4"></div>
            <p class="fs-5 fw-light">Discovering the expert-led Eleven Plus preparation strategies on this website was a game-changer for my child's academic journey. The comprehensive study materials, practise tests, and tailored tutoring provided an unparalleled level of support. Thanks to these resources, my child not only excelled but also gained the confidence needed for success in the 11+ exam. The commitment to academic excellence is evident, making this platform an invaluable resource for any parent aiming to ensure their child's success. Highly recommended!</p>
        </div>
        <div class="ratings d-flex align-items-center">
            <div><h2 class="fw-medium display-3">{{$avg}}</h2></div>
            <div class="p-2"><p>Out of  <br> 5 Stars</p></div>
            <div>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            </div>
        </div>
        <div class="progress-bar-div m-2">
            @foreach($rating_analysis as $key => $rate)
                <div class="">
                    <p class='my-1 fw-medium'>{{$key}} Stars</p>
                    <div class="progress  maths_progress_bar rounded-1" role="progressbar" aria-label="Warning example" aria-valuenow="{{$rate}}">
                        <div class="progress-bar h-100" style="width:{{$rate}}%;"></div>
                    </div>
                </div>
            @endforeach
            </div>
        <div class="review-container mt-5">
            <div class="section_heading mb-4">
                <h2 class="display-5 text-center fw-medium my-2 ">What Our User Say About Us</h2>
                <div class="heading_separator mx-auto rounded-pill mb-4"></div>
            </div>
            <div class="row m-0 mt-5 justify-content-center" id="reviews_wrap">
                @foreach($reviews['data'] as $review)
                    <div class="col-lg-6 col-md-8 col-sm-12">
                        <div class="reviews-content">
                            <div class="stars d-flex align-items-center">
                                @for ($i = 0; $i < 5; $i++)
                                    @if($i < $review['rating'])
                                        <i class="fa-solid fa-star text-warning"></i>
                                    @else
                                        <i class="fa-solid fa-star text-black-50"></i>
                                    @endif
                                @endfor
                                <p class="pt-3 ps-3">{{$review['rating']}} Out of 5 stars</p>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                @if($review['user_image'] != '--')
                                    <img class="rounded review_avatar" src="{{url($review['user_image'])}}" alt="{{$review['name']}}">
                                @else
                                    <div class="review_avatar align-items-center d-flex justify-content-center rounded-circle text-center text-white" style="background-color: {{$review['random_color']}};">{{$review['first_letter']}}</div>
                                @endif
                                <h5 class="mb-0 ms-2">{{$review['name']}}</h5>
                            </div>
                            <p class="review-line-content fw-light fs-5">{{$review['message']}}</p>
                            <div class="d-flex justify-content-between">
                                <a href="{{route('get_review',['id' => $review['id']])}}">Read more <i class="fa-solid fa-arrow-right ms-1"></i></a>
                                <p class="fw-medium">{{$review['date']}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            @if($load_more)
                <div class="mt-3 text-center" id="load_more_wrap">
                    <button class="align-items-center border-0 d-inline-flex load_more p-2 px-4 rounded-pill secondary_btn text-white" data-page="2">
                        Load more
                        <i class="fa fa-chevron-right ms-1 small"></i>
                    </button>
                </div>
            @endif
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
                $(".load_more").on('click', function(){
                    let page = $(this).attr("data-page");
                    // update loading icon 
                    $(this).find('i.fa').toggleClass('fa-chevron-right fa-circle-notch fa-spin')
                    $.ajax({
                        type: "GET",
                        url: '/fetch-reviews?page='+page,
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(data) {
                            data.reviews.data.forEach(function(review){
                                let stars = "";
                                let img = "";
                                for (let i = 0; i < 5; i++) {
                                    if(i < review.rating){
                                        stars += `<i class="fa-solid fa-star text-warning"></i>`;
                                    } else {
                                        stars += `<i class="fa-solid fa-star text-black-50"></i>`
                                    }
                                }

                                if(review.user_image != '--'){
                                    img = `<img class="rounded review_avatar" src="`+review.user_image+`" alt="`+review.name+`">`;
                                } else {
                                    img = `<div class="review_avatar align-items-center d-flex justify-content-center rounded-circle text-center text-white" style="background-color: `+review.random_color+`;">`+review.first_letter+`</div>`
                                }
                                let tab = `<div class="col-lg-6 col-md-8 col-sm-12">
                                    <div class="reviews-content">
                                    <div class="stars d-flex align-items-center">
                                        `+stars+`
                                        <p class="pt-3 ps-3">`+review.rating+` Out of 5 stars</p>
                                    </div>
                                    <div class="d-flex align-items-center mb-2">
                                        `+img+`
                                        <h5 class="fw-semibold ms-2 mb-0">`+review.name+`</h5>
                                    </div>
                                    <p class="review-line-content fw-light fs-5">`+review.message+`</p>
                                        <div class="d-flex justify-content-between">
                                            <a href="/review/`+review.id+`">Read more <i class="fa-solid fa-arrow-right ms-1"></i></a>
                                            <p class="fw-medium">`+review.date+`</p>
                                        </div>
                                    </div>
                                </div>`;
                                $("#reviews_wrap").append(tab);
                            });
                            $(".load_more").find('i.fa').removeClass('fa-circle-notch fa-spin').addClass('fa-chevron-right')
                            if(data.reviews.meta.pagination.links.next){
                                $(".load_more").attr("data-page",data.reviews.meta.pagination.current_page + 1)
                            } else {
                                $("#load_more_wrap").remove();
                            }
                        },
                        error: function(data, textStatus, errorThrown) {
                            console.log(textStatus);
                            console.log(data);
                        },
                    });
                });
            });
    </script>
</body>

</html>