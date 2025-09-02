<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>{{ app(\App\Settings\KeywordsSettings::class)->title['pricing_title'] }}</title>
    <meta name="description" content="{{ app(\App\Settings\KeywordsSettings::class)->description['pricing_description'] }}">
    <meta name="keywords" content="{{ app(\App\Settings\KeywordsSettings::class)->keywords['pricing_keywords'] }}">
    <meta name="author" content="{{ app(\App\Settings\SiteSettings::class)->app_name }}">
    <link rel="icon" href="{{ url('storage/' . app(\App\Settings\SiteSettings::class)->favicon_path) }}">
    <link rel="canonical" href="{{ url()->current() }}">
    <link rel="alternate" href="{{ url()->current() }}" hreflang="en-gb"><!-- Preload and preconnect links -->
    <link rel="preload" href="{{ url('Frontend_css/all.css') }}" as="style" onload='this.onload=null,this.rel="stylesheet"'>
    <link rel="preload" href="{{ url('Frontend_css/style.css') }}" as="style" onload='this.onload=null,this.rel="stylesheet"'>
    <link rel="preload" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" as="style" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" as="style" onload='this.onload=null,this.rel="stylesheet"'>
    <link rel="preload" href="https://fonts.googleapis.com/css2?family=Kanit:wght@200;300;400;500&display=swap" as="style" onload='this.onload=null,this.rel="stylesheet"'>
    <link rel="preconnect" href="https://googleads.g.doubleclick.net">
    <link rel="preconnect" href="https://td.doubleclick.net">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://www.google-analytics.com">
    <!-- CSS links -->
    <link rel="stylesheet" href="{{ url('Frontend_css/all.css') }}">
    <link rel="stylesheet" href="{{ url('Frontend_css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Kanit:wght@200;300;400;500&display=swap">
    @include('components.google-tags')
    <style>
        .pricings_section {
            height: auto;
            width: auto;
            margin: 4rem auto;
        }

        .monthly_pricing_text {
            color: #000;
            font-size: 1.15rem
        }

        .yearly_pricing_text {
            color: #000;
            font-size: 1.15rem
        }

        .header-heading {
            line-height: 1.6;
        }

        .learning-image {
            filter: contrast(1.1);
        }

        .responsive_image {
            max-width: 500px !important;
        }
    </style>
</head>
<body>

    <section>
        @include('components.home-navbar')
        <header class="pricing_header_section">
            <div class="container-lg cont_wrapper">
                <div class="d-flex align-items-center">
                    <div class="py-lg-5 py-md-5 py-0">
                        <div class="row align-items-center m-0 pt-5">
                            <div class="align-items-center col-12 col-lg-6 col-md-10 col-sm-12 header_text_side justify-content-center mt-5 mt-lg-0 mt-md-5 mt-sm-5 my-2 p-3 py-4 py-lg-0">
                                <h1 class="display-4 fw-medium mt-4 text-white">Discover Our <br> Subscription Plans!</h1>
                                <p class="fs-5 fw-light header_heading my-2 text-white">Discover the pricing and subscription plans we offer. From budget-friendly options to premium packages, we have a solution to match your needs and preferences. Explore our offerings and find the perfect fit for you.</p>
                                <a href="#pricing_section" class="border-0 d-inline-flex align-items-center my-2 p-2 px-4 secondary_btn text-decoration-none rounded-pill">See pricings</a>
                            </div>
                            <div class="col-12 col-lg-6 col-md-12 col-sm-12 mt-lg-5 py-2 justify-content-center d-flex">
                                <div class="fixed_header_media_width mx-auto">
                                    <img src="{{ url('images/pricing_header.png') }}" width="500" height="500" alt="a small kid standing with bag" class="learning-image">
                                </div>
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
    <section class="get_stared_section mb-5">
        <div class="row m-0 align-items-center">
            <div class="align-self-center text-center col-12 col-lg-5 col-md-6 col-sm-12">
                <img src="images/discovertutor_v2.png" alt="discover {{ app(\App\Settings\SiteSettings::class)->app_name }}" height="100%" width="100%" class="responsive_image">
            </div>
            <div class="col-lg-7 col-md-6 col-sm-12 col-12 p-3">
                <h2 class="display-5 fw-medium mb-3">Step into smarter 11+ learning environment</h2>
                <div class="heading_separator rounded-pill mb-4"></div>
                <p class="fs-5 fw-light my-4 paragraph_font">Get ready to shine in your 11+ exams with TutorsElevenPlus. Our platform offers fun lessons, interactive practice and step-by-step support from expert tutors. From verbal and non-verbal reasoning to tricky maths problems and advanced English skills, we make learning simple, enjoyable and highly effective. Start your 11+ preparation today and move forward with confidence towards success.</p>
                <a aria-label="{{ app(\App\Settings\HeroSettings::class)->cta_text }}" href="{{ app(\App\Settings\HeroSettings::class)->cta_link }}" class="border-0 my-2 p-2 px-4 rounded-5 secondary_btn text-white text-decoration-none">{{ app(\App\Settings\HeroSettings::class)->cta_text }}</a>
            </div>
        </div>
    </section>
    @include('components.pricing')
    <section class="contact_section my-5">
        <div class="row align-items-center col-lg-10 col-12 mx-auto">
            <div class="col-lg-5 col-md-6 col-sm-12 col-12 my-3 pt-2 text-end justify-content-center d-flex">
                <div class="fixed_header_media_width mx-auto">
                    <img src="{{ url('images/pricing_contact.png') }}" width="400" height="400" alt="cute boy with suggestions" class="learning-image img-fluid">
                </div>
            </div>
            <div class="col-lg-7 col-md-6 col-sm-12 col-12 my-3">
                <h2 class="fs-6 fw-medium mb-0 text-uppercase text_primary">What’s Best for Your Child?</h2>
                <h2 class="display-5 fw-medium my-2">Guiding every step of the learning journey</h2>
                <p class="paragraph_font my-0 fw-light">At TutorsElevenPlus, your child’s success is always our priority. From 11+ exam preparation to school admissions and Key Stage 2 learning, we offer expert support at every stage. Our flexible plans for Years 3, 4, and 5 are designed to fit your child’s needs and give them the confidence to achieve their goals. Together, we can build the foundation for a bright future.</p>
                <div class="contact_keys_section position-relative mb-3">
                    <ul class="p-2 m-0">
                        <li class="paragraph_font my-2 d-flex align-items-center fw-light">
                            <i class="fa-solid fa-circle-check text_secondary paragraph_font me-2"></i>
                            <span>Comprehensive Support: Guidance for 11+ exams, school admissions, and Key Stage 2 learning.</span>
                        </li>
                        <li class="paragraph_font my-2 d-flex align-items-center fw-light"><i class="fa-solid fa-circle-check text_secondary paragraph_font me-2"></i> 
                            <span>Flexible Learning Plans: Tailored options for Year 3, Year 4, and Year 5.</span>
                        </li>
                        <li class="paragraph_font my-2 d-flex align-items-center fw-light"><i class="fa-solid fa-circle-check text_secondary paragraph_font me-2"></i>
                            <span>Personalised Approach: Support designed around your child’s unique learning journey.</span>
                        </li>
                    </ul>
                </div>
                <a href="/contact" class="border-0 my-3 p-2 px-4 secondary_btn text-decoration-none rounded-pill">Enquire now</a>
            </div>
        </div>
    </section>
    <!-- footer  -->
    @include('components.home-footer')
    <script defer src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
    <script defer src="{{ url('Frontend_css/js/home.js') }}"></script>
    <script defer>
        $("#selectCategory").change((function() {
            let t = $(this).val();
            $(".category_wrap").removeClass("active"), $("." + t).addClass("active")
        })), $(document).ready((function() {
            $("#pricingDurationSwitch").on("change", (function() {
                const t = $(this).is(":checked");
                $(this).is(":checked") ? ($(".yearly_pricing_text").addClass("text_secondary"), $(
                        ".monthly_pricing_text").removeClass("text_primary")) : ($(
                        ".yearly_pricing_text").removeClass("text_secondary"), $(
                        ".monthly_pricing_text").addClass("text_primary")), $(".pricing_cards")
                    .each((function() {
                        const e = $(this),
                            a = e.find(".plan_price"),
                            n = (e.find(".yearly_plan"), parseFloat(a.text()));
                        if (t) {
                            const t = (12 * n).toFixed(2);
                            a.text(t), $(".plan_duration").hide()
                        } else {
                            const t = (n / 12).toFixed(2);
                            a.text(t), $(".plan_duration").show()
                        }
                    }))
            }))
        })), $("#switch_plan_duration_btn").click((function() {
            $(this).is(":checked") ? ($(".monthly_plan_button").removeClass("text-primary-emphasis"), $(
                    ".yearly_plan_button").addClass("text-primary-emphasis"), $(".pricing-card.yearly")
                .removeClass("d-none"), $(".pricing-card.monthly").addClass("d-none")) : ($(
                    ".yearly_plan_button").removeClass("text-primary-emphasis"), $(".monthly_plan_button")
                .addClass("text-primary-emphasis"), $(".pricing-card.yearly").addClass("d-none"), $(
                    ".pricing-card.monthly").removeClass("d-none"))
        }));
    </script>
</body>

</html>
