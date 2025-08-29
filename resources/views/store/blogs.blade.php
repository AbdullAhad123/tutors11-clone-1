<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="{{ app(\App\Settings\SiteSettings::class)->app_name }}">
    <meta name="keywords" content="{{ app(\App\Settings\KeywordsSettings::class)->keywords['blogs_keywords'] }}">
    <title>{{ app(\App\Settings\KeywordsSettings::class)->title['blogs_title'] }}</title>
    <meta name="description"
        content="{{ app(\App\Settings\KeywordsSettings::class)->description['blogs_description'] }}">
    <link rel="canonical" href="{{ url()->current() }}" />
    <link rel="alternate" href="{{ url()->current() }}" hreflang="en-gb">
    <link rel="icon" href="{{ url('storage/' . app(\App\Settings\SiteSettings::class)->favicon_path) }}">
    <!-- Preload and preconnect links -->
    <link rel="preload" href="{{ url('Frontend_css/all.css') }}" as="style">
    <link rel="preload" href="{{ url('Frontend_css/blog.css') }}" as="style">
    <link rel="preload" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
        as="style" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
        crossorigin="anonymous">
    <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" as="style"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preload" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" as="style">
    <link rel="preconnect" href="https://googleads.g.doubleclick.net">
    <link rel="preconnect" href="https://td.doubleclick.net">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://www.google-analytics.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preload" href="https://fonts.googleapis.com/css2?family=Kanit:wght@200;300;400;500&display=swap"
        as="style">
    <!-- CSS links -->
    <link rel="stylesheet" href="{{ url('Frontend_css/all.css') }}" />
    <link rel="stylesheet" href="{{ url('Frontend_css/blog.css') }}" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Kanit:wght@200;300;400;500&display=swap">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    @include('components.google-tags')
    <style>
        .blogs_features_section {
            height: auto;
            width: auto;
            margin: 2rem auto
        }

        .blog_feature_card {
            height: auto;
            width: 240px;
            transition: .3s
        }

        .feature_card_one {
            height: 300px;
            border-radius: 45%;
            background: url(images/education-image.webp) center;
            background-size: cover;
            box-shadow: 4px 4px 0 0 var(--lightprimary)
        }

        .feature_card_two {
            height: 300px;
            border-radius: 20%;
            background: url(images/student-image.webp) center;
            background-size: cover;
            box-shadow: 4px 4px 0 0 var(--secondary)
        }

        .feature_card_three {
            height: 300px;
            border-top-left-radius: 50%;
            border-bottom-left-radius: 50%;
            background: url(images/parent-blog.webp) center;
            background-size: cover;
            box-shadow: 4px 4px 0 0 var(--lightprimary)
        }

        .feature_card_four {
            height: 300px;
            border-top-right-radius: 25%;
            border-bottom-left-radius: 25%;
            background: url(images/blog-teacher.webp) center;
            background-size: cover;
            box-shadow: 4px 4px 0 0 var(--secondary)
        }

        .blog_feature_card_transform {
            position: relative;
            top: 50px
        }

        .blog_feature_title {
            -webkit-text-fill-color: transparent;
            -webkit-text-stroke-width: 1px;
            -webkit-text-stroke-color: var(--primary);
            letter-spacing: 2px;
            transition: .3s;
        }

        .blog_feature_image {
            transition: .3s
        }

        .blog_feature_image:hover {
            scale: 1.04
        }

        @media (max-width:560px) {
            .blog_feature_card_transform {
                top: 0
            }

            .blog_feature_card {
                width: 280px !important
            }
        }

        .newsletter_section {
            min-height: 350px;
            max-height: fit-content;
            margin: 4rem auto;
            background: linear-gradient(251deg, #ffe4bc, #ffd599);
            border-radius: 6rem
        }

        .form-input {
            display: flex
        }

        @media (max-width:375px) {
            .form-input {
                display: block
            }

            .newsletter_btn {
                width: 100%
            }

            .newsletter_section {
                border-radius: 1rem
            }
        }

        .newsletter_btn {
            background: var(--secondary);
            color: var(--white);
            transition: .25s;
            transition: .25s
        }

        .newsletter_btn:hover {
            scale: 1.08
        }

        .newsletter_input {
            outline: 0
        }

        .newsletter_input::placeholder {
            color: #00000085
        }

        .newsletter_input:focus {
            outline: 1px solid var(--secondary)
        }

        .blogs_section_cards {
            height: auto;
            width: auto;
            margin: 3rem auto
        }

        .blog_card {
            max-height: fit-content
        }

        .view_blog {
            transform: translateY(100%)
        }

        .blog_details {
            height: auto
        }

        .blog_card:hover .view_blog {
            transform: translateY(0)
        }

        .blog_card {
            min-height: 200px;
            width: auto;
            cursor: pointer
        }

        .blog_image {
            height: auto;
            min-height: 200px;
            overflow: hidden
        }

        .view_blog {
            height: 100%;
            width: 100%;
            background: linear-gradient(to top, #030303a8, #00000000);
            display: flex;
            justify-content: center;
            align-items: center;
            transition: .25s
        }

        .view_blog span {
            font-size: 1.1rem;
            font-weight: 500
        }

        .badge_primary_customized {
            background: linear-gradient(to top, #62863f, #78ac3f);
            color: #f2f2f2
        }

        .analytics_section,
        .section_text {
            transition: .3s
        }

        a {
            color: #222
        }

        .blog_subtitle {
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            line-clamp: 2;
            -webkit-box-orient: vertical
        }

        .blog_category_name {
            font-size: 14px;
            color: var(--secondary)
        }

        .read-more-arrow {
            height: 25px;
            width: 25px;
            background-color: var(--secondary);
            color: #fff
        }

        .blogs-card-title:hover {
            color: orange
        }

        .blogs-category {
            color: var(--primary)
        }

        .read-more-arrow:hover {
            background-color: var(--dark_primary)
        }

        .read-more-text {
            color: var(--dark_primary)
        }

        .blog_img {
            background-size: cover;
            height: 250px;
            background-position: center
        }
    </style>
</head>

<body>

    <section>
        @include('components.home-navbar')
        <header class="pricing_header_section">
            <div class="container-lg cont_wrapper">
                <div class="d-flex align-items-center">
                    <div class="row align-items-center m-0 pt-5">
                        <div class="align-items-center col-12 col-lg-6 col-md-10 col-sm-12 header_text_side justify-content-center mt-5 mt-lg-0 mt-md-5 mt-sm-5 my-2 p-3 py-4 py-lg-0">
                            <h1 class="display-4 fw-medium mt-4 text-white">Explore knowledge, tips & inspiration</h1>
                            <p class="fs-5 fw-light header_heading my-2 text-white">Dive into our diverse blog collection, filled with useful tips, expert advice, and inspiring ideas. From exam preparation to learning strategies, our blogs are designed to guide parents and motivate students on their educational journey.</p>
                            <a href="/about" class="d-inline-flex border-0 mt-3 p-2 px-4 secondary_btn rounded-pill text-decoration-none">Join {{ app(\App\Settings\SiteSettings::class)->app_name }}!</a>
                        </div>
                        <div class="col-12 col-lg-6 col-md-12 col-sm-12 mt-lg-5 py-2">
                            <div class="fixed_header_media_width mx-auto">
                                <img src="{{ url('images/blogs_header.webp') }}" width="500" height="500" alt="cute boy reading a paper" class="img-fluid" />
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
    <section class="blogs_features_section mb-5">
        <div class="d-flex justify-content-evenly align-items-center flex-wrap p-2 fixed_width mb-4">
            <div class="blog_feature_card mx-3 my-2">
                <div class="blog_feature_image feature_card_three"></div>
                <h2 class="blog_feature_title fs-3 text-uppercase fw-semibold text-center my-3">Parents Guide</h2>
            </div>
            <div class="blog_feature_card mx-3 my-2 blog_feature_card_transform">
                <div class="blog_feature_image feature_card_two"></div>
                <h2 class="blog_feature_title fs-3 text-uppercase fw-semibold text-center my-3">Students Guide</h2>
            </div>
            <div class="blog_feature_card mx-3 my-2">
                <div class="blog_feature_image feature_card_one"></div>
                <h2 class="blog_feature_title fs-3 text-uppercase fw-semibold text-center my-3">Educational Guide</h2>
            </div>
            <div class="blog_feature_card mx-3 my-2 blog_feature_card_transform">
                <div class="blog_feature_image feature_card_four"></div>
                <h2 class="blog_feature_title fs-3 text-uppercase fw-semibold text-center my-3">Teachers Guide</h2>
            </div>
        </div>
    </section>
    <section class="blogs_section_cards fixed_width mt-5">
        <div class="section_heading mb-4 mt-4">
            <h2 class="display-5 text-center fw-bold my-2">Explore All Blogs</h2>
            <div class="heading_separator mx-auto rounded-pill mb-4"></div>
        </div>
        @if (count($blogs['data']) > 0)
            <div class="row m-0 align-items-center py-4">
                @foreach ($blogs['data'] as $blog)
                    <div class="col-lg-4 col-md-6 col-sm-12 col-12 my-3">
                        <div class="h-100 d-grid rounded-4 border blog-cards shadow-sm">
                            <div class="d-flex justify-content-between">
                                <p class="text-secondary p-3 m-2 small">{{ $blog['created_at'] }}</p>
                                <p class="p-3 m-2 blogs-category">{{ $blog['category'] }}</p>
                            </div>
                            <h4 class="fw-medium blogs-card-title p-1 m-2 mt-0 text-dark-emphasis">{{ $blog['title'] }}</h4>
                            <div class="blog_img" style="background-image:url(&#34;{{ url($blog['image']) }}&#34;)"></div>
                            <div class="d-flex justify-content-between align-items-center read-more p-1 py-2 m-2">
                                <a href="{{ route('get_blog', ['slug' => $blog['slug']]) }}" class="text-decoration-none fw-bold fs-6 ms-2 read-more-text">Read More </a>
                                <a class="align-items-center d-flex justify-content-center read-more-arrow rounded-circle" href="{{ route('get_blog', ['slug' => $blog['slug']]) }}"><i class="fa-solid fa-arrow-right" style="color:#fff"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            @endif @if ($blogs['meta']['pagination']['total_pages'] > 1)
                <div class="d-flex justify-content-between">
                    @if (isset($blogs['meta']['pagination']['links']['previous']))
                        <a class="btn btn-dark" href="{{ $blogs['meta']['pagination']['links']['previous'] }}">Prev</a> @else<div style="height:1px;width:1px"></div>
                    @endif @if (isset($blogs['meta']['pagination']['links']['next']))
                        <a class="btn btn-dark" href="{{ $blogs['meta']['pagination']['links']['next'] }}">Next</a> @else<div style="height:1px;width:1px"></div>
                    @endif
                </div>
            @endif
    </section>
    <!-- footer start  -->
    @include('components.home-footer')

    <script defer src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script defer src="{{ url('Frontend_css/js/home.js') }}"></script>
    <script defer>
        $(document).ready(function() {
            // window resize 
            $(window).resize(function() {
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
            $(window).scroll(function() {
                const scrolled = $(window).scrollTop();
                if (scrolled > 100) {
                    $("#navbar_nav").removeClass("absolute_nav bg-transparent").addClass(
                        'fixed-top fixed_nav col-lg-11 col-12');
                } else {
                    $("#navbar_nav").removeClass("fixed-top fixed_nav col-lg-11 col-12").addClass(
                        'absolute_nav bg-transparent');
                }
            });
        });
        $(".newsletter_btn").click(function(e) {
            e.preventDefault()
            let email = $("#newsletter_input").val();
            if (email) {
                $.ajax({
                    dataType: 'json',
                    type: "POST",
                    url: '/add-subscribe',
                    data: {
                        email: email,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        if (data) {
                            $("#newsletter_form").empty().append(
                                '<div>Thank You for Subscribing to Our Newsletter..</div>');
                        }
                    },
                    error: function(data, textStatus, errorThrown) {
                        console.log(textStatus);
                    },
                });
            }
        });
    </script>
</body>

</html>
