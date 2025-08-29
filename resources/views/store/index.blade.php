<!doctype html>
<html lang="en">

<head>
    <meta name="DC.title" content=" Eleven Plus Tutors" />
    <meta name="geo.region" content="GB-LND" />
    <meta name="geo.placename" content="London" />
    <meta name="geo.position" content="54.702355;-3.276575" />
    <meta name="ICBM" content="54.702355, -3.276575" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="author" content="{{ app(\App\Settings\SiteSettings::class)->app_name }}">
    <meta name="keywords" content="{{ app(\App\Settings\KeywordsSettings::class)->keywords['home_keywords'] }}">
    <title>{{ app(\App\Settings\KeywordsSettings::class)->title['home_title'] }}</title>
    <meta name="msvalidate.01" content="6842DFA93B7F9C2AD10D216BC8C4754C">
    <meta name="description" content="{{ app(\App\Settings\KeywordsSettings::class)->description['home_description'] }}">
    <link rel="canonical" href="{{ url()->current() }}">
    <link rel="alternate" href="{{ url()->current() }}" hreflang="en-gb">
    <link rel="icon" href="{{ url('storage/' . app(\App\Settings\SiteSettings::class)->favicon_path) }}">
    <link rel="preconnect" href="https://googleads.g.doubleclick.net">
    <link rel="preconnect" href="https://td.doubleclick.net">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://www.google-analytics.com">
    <link rel="preload" href="{{ url('Frontend_css/home.css') }}" as="style">
    <link rel="preload" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" as="style" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" as="style" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="preload" as="style" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css">
    <link rel="preload" href="https://fonts.googleapis.com/css2?family=Kanit:wght@200;300;400;500&display=swap" as="style" onload='this.onload=null,this.rel="stylesheet"'>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@200;300;400;500&display=swap" rel="stylesheet">
    @include('components.google-tags')
    <link rel="stylesheet" href="{{ asset('Frontend_css/home.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css">
    <link rel="preload" href="../images/header_bg_vectors.webp" as="image">
    <meta property="og:title" content="Top Eleven Plus Tutors in the UK - TutorsElevenPlus" />
    <meta property="og:description" content="Looking for expert Eleven Plus tutors? Our online platform provides comprehensive study materials, practice sets, and strategies to help students excel in the 11+ exams." />
    <meta property="og:image" content="{{ url('images/opengraph_display_image.jpg') }}" />
    <meta property="og:url" content="https://tutorselevenplus.co.uk" />
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="TutorsElevenPlus" />
    <meta property="og:locale" content="en_GB" />
    <link rel="alternate" href="https://tutorselevenplus.co.uk/ " hreflang="x-default">
    <link rel="alternate" href="https://tutorselevenplus.co.uk/ " hreflang="en-UK">
    <style>
      .header_section {
        min-height: 600px;
        max-height: fit-content;
        width: auto;
        background: url('../images/header_bg_vectors.png') center no-repeat, radial-gradient(#d860ce, #8f0283);
        background-size: cover
      }

      .svg-image {
        margin-top: -1px
      }

      .faq_question_section {
        height: auto;
        width: auto
      }

      .answer_parent {
        display: none
      }

      .service_child1 {
        background: #bbd1f4
      }

      .service_child2 {
        background: #ffe5c2
      }

      .service_child3 {
        background: #d2cdc7
      }

      .service_child4 {
        background: #ffc747
      }

      .header_heading {
        line-height: 1.6
      }

      .header_image {
        filter: contrast(1.1);
        max-width: 600px !important
      }

      .learning-image {
        box-shadow: (1px 1px 0 #00000035)
      }

      .faq_question {
        cursor: pointer
      }

      .progress,
      .progress-bar {
        height: .5rem
      }

      .team-card {
        width: 12rem
      }

      .services_card {
        height: auto
      }

      .services_image {
        height: 160px;
        width: auto
      }

      .services_image img {
        position: absolute;
        left: 50%;
        right: 50%;
        top: -75px;
        transform: translateX(-50%)
      }

      .testimonial_text {
        height: 260px;
        overflow-y: auto;
        line-height: 1.9rem !important
      }

      .testimonial_text::-webkit-scrollbar {
        width: 5px !important
      }

      .category-text {
        color: var(--primary)
      }

      .responsive_image {
        max-width: 500px !important
      }
      .ratingCard {
        height: auto;
        width: auto;
        background-color: #f8e7f6;
        padding: 0.75rem;
        border-radius: 8px;
        box-shadow: 0px 3px 5px 0 #00000042;
      }
    </style>
</head>
<style>
  .cont_wrapper {
    max-width: 1320px !important
  }

  .navDropdownMenu {
    background: #cc71c4b8;
    backdrop-filter: blur(8px);
    box-shadow: inset 0px 0 14px 3px #b35cab !important;
  }

  .navDropdownMenu li a {
    color: var(--cta_primary) !important;
    fill: var(--cta_primary) !important;
    transition: 0.25s
  }

  .navDropdownMenu li a:hover {
    background: transparent !important;
    color: var(--white) !important;
    fill: var(--white) !important;
  }

  /* top shape  */
  .section_top_shape_wave {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    overflow: hidden;
    line-height: 0;
  }

  .section_top_shape_wave svg {
    position: relative;
    display: block;
    width: calc(132% + 1.3px);
    height: 76px;
  }

  .section_top_shape_wave .shape-fill {
    fill: #FFFFFF;
  }

  /** For tablet devices **/
  @media (min-width: 768px) and (max-width: 1023px) {
    .section_top_shape_wave svg {
      width: calc(132% + 1.3px);
      height: 55px;
    }
  }

  /** For mobile devices **/
  @media (max-width: 767px) {
    .section_top_shape_wave svg {
      width: calc(132% + 1.3px);
      height: 46px;
    }
  }
  
  /* bottom shape  */
  .section_down_shape_wave {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    overflow: hidden;
    line-height: 0;
    transform: rotate(180deg);
  }

  .section_down_shape_wave svg {
    position: relative;
    display: block;
    width: calc(132% + 1.3px);
    height: 76px;
    width: 100%
  }

  .section_down_shape_wave .shape-fill {
    fill: #FFFFFF !important;
  }

  /** For tablet devices **/
  @media (min-width: 768px) and (max-width: 1023px) {
    .section_down_shape_wave svg {
      width: calc(132% + 1.3px);
      height: 55px;
    }
  }

  /** For mobile devices **/
  @media (max-width: 767px) {
    .section_down_shape_wave svg {
      width: calc(132% + 1.3px);
      height: 46px;
    }
  }
</style>
<body>
    <script type="application/ld+json">
      {
        "@context": "https://schema.org",
        "@type": "Preschool",
        "name": "Tutors Eleven Plus",
        "url": "https://tutorselevenplus.co.uk/",
        "logo": "https://tutorselevenplus.co.uk/storage/site/1704115861.webp"
      }
    </script>
    <script type="application/ld+json">
      {
        "@context": "https://schema.org/", 
        "@type": "Product", 
        "name": "Eleven Plus Tutors",
        "image": "https://tutorselevenplus.co.uk/storage/site/1704115861.webp",
        "description": "Are you looking Eleven Plus Tutors? We are the best 11 plus online tutors in UK. Our expert strategies, comprehensive study materials, and practice sets will help you ace 11+",
        "brand": {
          "@type": "Brand",
          "name": "tutorselevenplus.co.uk"
        },
        "offers": {
          "@type": "Offer",
          "url": "https://tutorselevenplus.co.uk/",
          "priceCurrency": "GBP",
          "price": "15",
          "priceValidUntil": "2025-12-31",
          "availability": "https://schema.org/InStock"
        },
        "aggregateRating": {
          "@type": "AggregateRating",
          "ratingValue": "5",
          "ratingCount": "700"
        }
      }
    </script>
    <section class="header">@include('components.home-navbar') 
      @if (app(\App\Settings\HomepageSettings::class)->enable_hero)
        <header class="header_section">
          <div class="container-lg cont_wrapper">
            <div class="d-flex justify-content-center align-items-center pt-lg-5 pt-md-4">
              <div class="row align-items-center m-0 pt-4">
                <div class="align-items-center col-12 col-lg-6 col-md-10 col-sm-12 header_text_side justify-content-center mt-5 mt-lg-0 mt-md-5 mt-sm-5 my-2 p-3 py-lg-0">
                  <p class="fs-5 fw-normal mb-0 mt-4 text-white text-uppercase">Eleven Plus Tutors</p>
                  {{-- <h1 class="display-5 fw-medium text-white">{{ app(\App\Settings\HeroSettings::class)->title }}</h1>
                  <p class="fs-5 fw-light header_heading my-2 text-white">{{ app(\App\Settings\HeroSettings::class)->subtitle }}</p> --}}
                  <h1 class="display-5 fw-medium text-white">Leading 11+ Academy in United Kingdom</h1>
                  <p class="fs-5 fw-light header_heading my-2 text-white">At TutorsElevenPlus, We help students to shine in their 11+ journey with the right guidance, learning and confidence. Get started and excel your next 11+ exams!</p>
                  <div class="subscribe_form my-3">
                    <div class="newletter_form">
                      <input class="form-control fw-normal px-3 rounded-pill newletter_form_input" id="subscribeEmailbtn" placeholder="Subscribe our newsletter">
                      <button id="submitSubscribe" aria-label="Subscribe Us">
                        <i class="fab fa-telegram-plane"></i>
                        <span class="ms-1 text-white d-none spinner-border spinner-border-sm" aria-hidden="true"></span>
                      </button>
                    </div>
                    <p class="email_error d-none text-warning my-1"></p>
                  </div>
                  <div class="align-items-center d-flex flex-wrap gap-2 my-2">
                    <a class="ratingCard align-items-center d-inline-flex gap-2 my-2 text-light" href="{{ route('review') }}">
                      <img src="{{ url('images/google_review.webp') }}" width="80" height="auto" alt="google reviews logo" />
                      <div>
                        <p class="fw-light m-0 text-secondary">Rated</p>
                        <p class="fw-medium m-0 text-dark">5/5 on Google</p>
                      </div>
                    </a>
                    <a class="ratingCard align-items-center d-inline-flex gap-2 my-2 text-light" href="{{ route('review') }}">
                      <img src="{{ url('images/trustpilot_review.webp') }}" width="80" height="auto" alt="trustpilot logo" />
                      <div>
                        <p class="fw-light m-0 text-secondary">Rated</p>
                        <p class="fw-medium m-0 text-dark">5/5 on Trustpilot</p>
                      </div>
                    </a>
                  </div>
                </div>
                <div class="col-lg-6 mt-lg-5 text-center">
                  <img src="{{ url('images/index_header_image.webp') }}" alt="{{ app(\App\Settings\SiteSettings::class)->app_name }} header image" class="header_image" height="100%" width="100%">
                </div>
              </div>
            </div>
            <div class="row align-items-center m-0 p-0 py-3 subject_cards_container container mx-auto">
                <div class="col-lg-3 col-md-5 col-sm-6 col-6 my-2 p-lg-3 p-md-3 p-sm-2 p-1">
                  <a href="{{ route('subject_english') }}" class="text-decoration-none text-muted">
                    <div class="subject_card p-2 rounded-4 text-center subject_odd_card">
                      <div class="subject_details">
                        <div class="align-items-center d-flex justify-content-center rounded-circle small subject_badge_3d text-white">1</div>
                        <span class="h5 m-0 ms-2 text-uppercase">english</span>
                      </div>
                      <img src="{{ url('images/subject_english.png') }}" width="215" height="252" class="img-fluid" alt="english">
                    </div>
                  </a>
                </div>
                <div class="col-lg-3 col-md-5 col-sm-6 col-6 my-2 p-lg-3 p-md-3 p-sm-2 p-1">
                  <a href="{{ route('subject_maths') }}" class="text-decoration-none text-muted">
                    <div class="subject_card p-2 rounded-4 text-center subject_even_card">
                      <div class="subject_details">
                        <div class="align-items-center d-flex justify-content-center rounded-circle small subject_badge_3d text-white">2</div>
                        <span class="h5 m-0 ms-2 text-uppercase">maths</span>
                      </div>
                      <img src="{{ url('images/subject_maths.png') }}" width="215" height="252" class="img-fluid" alt="maths">
                    </div>
                  </a>
                </div>
                <div class="col-lg-3 col-md-5 col-sm-6 col-6 my-2 p-lg-3 p-md-3 p-sm-2 p-1">
                  <a href="{{ route('subject_verbal_reasoning') }}" class="text-decoration-none text-muted">
                    <div class="subject_card p-2 rounded-4 text-center subject_odd_card">
                      <div class="subject_details">
                        <div class="align-items-center d-flex justify-content-center rounded-circle small subject_badge_3d text-white">3</div>
                        <span class="h5 m-0 ms-2 text-uppercase">verbal</span>
                      </div>
                      <img src="{{ url('images/verbal_reasoning_image.png') }}" width="215" height="252" class="img-fluid" alt="Verbal reasoning">
                    </div>
                  </a>
                </div>
                <div class="col-lg-3 col-md-5 col-sm-6 col-6 my-2 p-lg-3 p-md-3 p-sm-2 p-1">
                  <a href="{{ route('subject_non_verbal_reasoning') }}" class="text-decoration-none text-muted">
                    <div class="subject_card p-2 rounded-4 text-center subject_even_card">
                      <div class="subject_details">
                        <div class="align-items-center d-flex justify-content-center rounded-circle small subject_badge_3d text-white">4</div>
                        <span class="h5 m-0 ms-2 text-uppercase">non-verbal</span>
                      </div>
                      <img src="{{ url('images/subject_nvr.png') }}" width="215" height="252" class="img-fluid" alt="non-Verbal reasoning">
                    </div>
                  </a>
                </div>
            </div>
          </div>
        </header>
        <svg class="svg-image" viewBox="0 0 1920 200" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
          <path fill="#A11A96" d="M 0 0 C 485.5 0 485.5 110 971 110 L 971 110 L 971 0 L 0 0 Z" stroke-width="0"></path>
          <path fill="#A11A96" d="M 970 110 C 1445 110 1445 0 1920 0 L 1920 0 L 1920 0 L 970 0 Z" stroke-width="0"></path>
        </svg>
      @endif
    </section>
    @if (app(\App\Settings\HomepageSettings::class)->enable_features)
      <section class="about_section fixed_width row align-items-center mx-auto col-lg-11 col-md-12">
        <div class="col-lg-4 col-md-6 col-sm-12 col-10 mx-auto text-center">
          <img loading="lazy" src="images/about_boy_image.webp" alt="about us mockup" class="learning-image img-fluid" width="373" height="373">
        </div>
        <div class="col-lg-8 col-md-6 col-sm-12 col-12">
          <p class="fs_5 fw-medium mb-0 text-uppercase text_primary">What is {{ app(\App\Settings\SiteSettings::class)->app_name }}</p>
          <h2 class="display-5 fw-medium mb-3">Making education simple & fun for students</h2>
          <p class="paragraph_font fw-light">At {{ app(\App\Settings\SiteSettings::class)->app_name }}, we are proud to lead the way in online learning across the UK. We are dedicated to helping 11+ students do their best, with the support of parents and skilled teachers. Our platform provides a wide variety of practice questions, tests, and exams, making learning simple and effective through 11 Plus tuition and online lessons. Your child’s success is always our main goal.</p>
          <div class="align-items-center d-flex flex-wrap justify-content-between py-2 mb-3">
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
          </div>
          <a href="/about" aria-label="About Us" class="border-2 secondary_btn p-2 px-4 rounded-2 rounded-pill text-start text-white my-3">Learn more</a>
        </div>
      </section>
    @endif
    @if (app(\App\Settings\HomepageSettings::class)->enable_features)
      <section class="service_section p-2 fixed_width">
        <h2 class="display-5 text-center fw-medium my-4 section_heading mb-2">Why to choose <br> {{ app(\App\Settings\SiteSettings::class)->app_name }}?</h2>
        <div class="heading_separator mx-auto rounded-pill mb-4"></div>
        <div class="row m-0 services_container py-lg-5 py-md-4 py-3 p-2 justify-content-center">
          <div class="col-lg-3 col-md-5 col-sm-6 col-12 p-lg-2 p-md-2 p-1 mb-lg-0 mb-5">
            <div class="services_card service_child1 p-3 py-4 rounded-5 position-relative h-100">
              <div class="services_image position-relative mx-auto">
                <img loading="lazy" src="{{ url('images/top_quality_question_guy.webp') }}" height="220" width="220" alt="{{ app(\App\Settings\FeatureSettings::class)->feature1[0] }}" />
              </div>
              <div class="services-details d-grid">
                {{-- <h3 class="text-center my-1 text-uppercase h4">{{ app(\App\Settings\FeatureSettings::class)->feature1[0] }}</h3>
                <p class="my-2 text-center">{{ app(\App\Settings\FeatureSettings::class)->feature1[1] }}</p> --}}
                <h3 class="text-center text_primary_em my-1 text-uppercase h4">Strong Foundations</h3>
                <p class="my-2 text-center">Step-by-step learning to help children master the 11+ syllabus with confidence.</p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-5 col-sm-6 col-12 p-lg-2 p-md-2 p-1 mb-lg-0 mb-5">
            <div class="services_card service_child2 p-3 py-4 rounded-5 position-relative h-100">
              <div class="services_image position-relative mx-auto">
                <img loading="lazy" src="{{ url('images/detail_analysis_guy.webp') }}" height="220" width="220" alt="{{ app(\App\Settings\FeatureSettings::class)->feature2[0] }}" />
              </div>
              <div class="services-details d-grid">
                {{-- <h3 class="text-center my-1 text-uppercase h4">{{ app(\App\Settings\FeatureSettings::class)->feature2[0] }}</h3>
                <p class="my-2 text-center">{{ app(\App\Settings\FeatureSettings::class)->feature2[1] }}</p> --}}
                <h3 class="text-center text_secondary_em my-1 text-uppercase h4">Smart Progress</h3>
                <p class="my-2 text-center">Clear progress reports to track and support your child’s learning journey.</p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-5 col-sm-6 col-12 p-lg-2 p-md-2 p-1 mb-lg-0 mb-5">
            <div class="services_card service_child3 p-3 py-4 rounded-5 position-relative h-100">
              <div class="services_image position-relative mx-auto">
                <img loading="lazy" src="{{ url('images/exam_quiz_guy.webp') }}" height="220" width="220" alt="{{ app(\App\Settings\FeatureSettings::class)->feature3[0] }}" />
              </div>
              <div class="services-details d-grid">
                {{-- <h3 class="text-center my-1 text-uppercase h4">{{ app(\App\Settings\FeatureSettings::class)->feature3[0] }}</h3>
                <p class="my-2 text-center">{{ app(\App\Settings\FeatureSettings::class)->feature3[1] }}</p> --}}
                <h3 class="text-center text_primary_em my-1 text-uppercase h4">Real Exam Practice</h3>
                <p class="my-2 text-center">Practice with real-style tests and resources designed for 11+ success.</p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-5 col-sm-6 col-12 p-lg-2 p-md-2 p-1 mb-lg-0 mb-5">
            <div class="services_card service_child4 p-3 py-4 rounded-5 position-relative h-100">
              <div class="services_image position-relative mx-auto"><img loading="lazy" src="{{ url('images/learning_videos_guy.webp') }}" height="220" width="220" alt="{{ app(\App\Settings\FeatureSettings::class)->feature4[0] }}"></div>
              <div class="services-details d-grid">
                {{-- <h3 class="text-center my-1 text-uppercase h4">{{ app(\App\Settings\FeatureSettings::class)->feature4[0] }}</h3>
                <p class="my-2 text-center">{{ app(\App\Settings\FeatureSettings::class)->feature4[1] }}</p> --}}
                <h3 class="text-center text_secondary_em my-1 text-uppercase h4">Fun Learning Videos</h3>
                <p class="my-2 text-center">Engaging video lessons that make learning easy, clear, and enjoyable.</p>
              </div>
            </div>
          </div>
        </div>
      </section>
    @endif
    <div class="journey_banner_section p-3 py-5 row align-items-center m-0">
      <div class="col-lg-8 col-md-6 col-sm-12 col-12 my-2 header_text_side">
        <p class="fs_5 fw-medium mb-0 text-uppercase text_secondary">Detailed Journey Planner</p>
        <h2 class="fw-bold h1 text-white mb-2">Learn, Practise and Reward</h2>
        <p class="paragraph_font fw-light text-white mb-4">Our simple learning roadmap takes students step by step through the 11+ syllabus. Each subject is broken into clear topics and subtopics with fun lessons, interactive activities and full support along the way. Children complete levels as they learn and earn rewards for every step forward.</p>
        <a aria-label="Explore Our Journey" href="{{ route('detailed_journey_planner') }}" class="border-2 mt-4 mt-lg-0 mt-md-2 p-2 position-relative px-4 rounded-2 rounded-pill secondary_btn z-1 z-index-top d-inline-flex align-items-center">Explore more</a>
      </div>
      <div class="col-lg-4 col-md-5 col-sm-12 col-12 my-2 align-items-center rounded-5 text-center position-relative journey_section_image_container">
        <img loading="lazy" src="{{ url('images/journey_header_image.webp') }}" class="position-absolute bottom-0 end-0 journey_section_image learning-image img-fluid" height="425" width="425" alt="journey guys image">
      </div>
    </div>
    @if (app(\App\Settings\HomepageSettings::class)->enable_categories)
      <section class="categories_section py-4 my-5 container-lg container-md">
        <h2 class="display-5 text-center fw-medium my-2">Programmes we offer</h2>
        <div class="heading_separator mx-auto rounded-pill mb-4"></div>
        {{-- <p class="section_top_text fw-medium text-center my-1 category-text mt-4">{{ app(\App\Settings\CategorySettings::class)->title }}</p>
        <p class="fst-italic text-center my-1 mb-4">{{ app(\App\Settings\CategorySettings::class)->subtitle }}</p> --}}
        <p class="section_top_text fs_5 fw-medium text-center my-1 category-text mt-4">Learning made simple, every step of the way</p>
        <p class="fst-italic fs_5 text-center my-1 mb-4">At TutorsElevenPlus, we offer structured programmes for each stage of your child’s education. With expert tutor guidance, interactive lessons and personalised support, we help students build confidence, grow skills and enjoy their learning journey.</p>
        <div class="row align-items-center justify-content-center py-4">
          <div class="col-11 col-lg-4 col-md-6 col-sm-6 p-0 p-lg-2 p-md-2 p-sm-2">
            <figure class="shape-box shape-box_half">
              <img loading="lazy" src="{{ url('images/year_3.webp') }}" height="auto" width="100%" alt="{{ app(\App\Settings\SiteSettings::class)->app_name }} year two">
              <div class="brk-abs-overlay z-index-0 bg-black opacity-60"></div>
              <figcaption>
                <div class="show-cont">
                    <p class="card-no fw-semibold">YEAR 3</p>
                </div>
                <p class="card-content">Students begin moving into more complex topics across Maths, English, Verbal and Non-Verbal Reasoning. The focus is on building critical thinking and problem-solving skills</p>
                <a aria-label="Explore Year 3" href="/explore/year-3" class="read-more-btn">Learn more</a>
              </figcaption>
              <span class="after"></span>
            </figure>
          </div>
          <div class="col-11 col-lg-4 col-md-6 col-sm-6 p-0 p-lg-2 p-md-2 p-sm-2">
            <figure class="shape-box shape-box_half">
              <img loading="lazy" src="{{ url('images/year_4.webp') }}" height="auto" width="100%" alt="{{ app(\App\Settings\SiteSettings::class)->app_name }} year three">
              <div class="brk-abs-overlay z-index-0 bg-black opacity-60"></div>
              <figcaption>
                <div class="show-cont">
                    <p class="card-no fw-semibold">YEAR 4</p>
                </div>
                <p class="card-content">Children explore advanced concepts in Maths, English, Verbal and Non-Verbal Reasoning, while developing independent thinking and creativity</p>
                <a aria-label="Explore Year 4" href="/explore/year-4" class="read-more-btn">Learn more</a>
              </figcaption>
              <span class="after"></span>
            </figure>
          </div>
          <div class="col-11 col-lg-4 col-md-6 col-sm-6 p-0 p-lg-2 p-md-2 p-sm-2">
            <figure class="shape-box shape-box_half">
              <img loading="lazy" src="{{ url('images/year_5.webp') }}" height="auto" width="100%" alt="{{ app(\App\Settings\SiteSettings::class)->app_name }} year five">
              <div class="brk-abs-overlay z-index-0 bg-black opacity-60"></div>
              <figcaption>
                <div class="show-cont">
                  <p class="card-no fw-semibold">YEAR 5</p>
                </div>
                <p class="card-content">A well-rounded programme covering Maths, English, Verbal and Non-Verbal Reasoning, designed to prepare students for higher levels of study and future challenges</p>
                <a aria-label="Explore Year 5" href="/explore/year-5" class="read-more-btn">Learn more</a>
                </figcaption><span class="after"></span>
            </figure>
          </div>
        </div>
      </section>
    @endif
    @if (app(\App\Settings\HomepageSettings::class)->enable_testimonials)
      <section class="testimonial_section position-relative py-5">
        <div class="section_top_shape_wave">
          <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
              <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
          </svg>
        </div>
        {{-- <h2 class="display-5 text-center text-white fw-medium mb-2 mt-4 px-2">{{ app(\App\Settings\TestimonialSettings::class)->title }}</h2> --}}
        <h2 class="display-5 text-center text-white fw-medium mb-2 mt-4 px-2">Kind words from parents</h2>
        <div class="heading_separator mx-auto rounded-pill mb-1"></div>
        <div class="swiper testimonialSwiper fixed_width p-2 mb-4">
          <div class="swiper-wrapper text-center">
              @for ($i = 1; $i <= 6; ++$i)
                  <div class="swiper-slide my-5 rounded-5">
                      <div class="testimonial_card my-4 p-3">
                          <div class="testimonial_image mx-auto">
                            <img src="{{ app(\App\Settings\TestimonialSettings::class)->{"testimonial$i"}[3] }}" height="100%" width="100%" class="test-image rounded-circle" loading="lazy" alt="{{ app(\App\Settings\TestimonialSettings::class)->{"testimonial$i"}[0] }}">
                          </div>
                          <h3 class="testimonial_title h4 text-center pt-4">{{ app(\App\Settings\TestimonialSettings::class)->{"testimonial$i"}[0] }}</h3>
                          <hr class="my-2">
                          <p class="fst-italic fw-light my-3 p-1 testimonial_text text-center">{{ app(\App\Settings\TestimonialSettings::class)->{"testimonial$i"}[2] }}</p>
                          <p class="fs-5 fw-light text_secondary text-uppercase">voice&nbsp;of&nbsp;{{ app(\App\Settings\TestimonialSettings::class)->{"testimonial$i"}[1] }}
                          </p>
                      </div>
                  </div>
              @endfor
          </div>
        </div>
        <div class="section_down_shape_wave">
          <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
          </svg>
        </div>
      </section>
    @endif
    <section class="get_stared_section py-4 pb-0">
      <div class="container-lg cont_wrapper">
        <div class="row m-0">
          <div class="align-self-center col-12 col-lg-5 col-md-6 col-sm-12 text-center">
            <img loading="lazy" src="images/discovertutor.webp" alt="discover {{ app(\App\Settings\SiteSettings::class)->app_name }}" height="100%" width="100%" class="responsive_image">
          </div>
          <div class="col-lg-7 col-md-6 col-sm-12 col-12 p-3">
            <h2 class="display-5 fw-medium mb-3">Step into smarter 11+ learning environment</h2>
            <div class="heading_separator rounded-pill mb-4"></div>
            <p class="fs-5 fw-light my-4 paragraph_font">Get ready to shine in your 11+ exams with TutorsElevenPlus. Our platform offers fun lessons, interactive practice and step-by-step support from expert tutors. From verbal and non-verbal reasoning to tricky maths problems and advanced English skills, we make learning simple, enjoyable and highly effective. Start your 11+ preparation today and move forward with confidence towards success.</p>
            <a aria-label="{{ app(\App\Settings\HeroSettings::class)->cta_text }}" href="{{ app(\App\Settings\HeroSettings::class)->cta_link }}" class="border-0 my-2 p-2 px-4 rounded-5 secondary_btn text-white text-decoration-none">{{ app(\App\Settings\HeroSettings::class)->cta_text }}</a>
          </div>
        </div>
      </div>
    </section>
    <section class="contact_section row align-items-center col-lg-11 col-12 mx-auto py-3">
      <div class="col-lg-7 col-md-6 col-sm-12 col-12 my-3">
          <p class="fs_5 fw-medium mb-0 text-uppercase text_primary">Contact {{ app(\App\Settings\SiteSettings::class)->app_name }}</p>
          <h2 class="display-5 fw-medium mb-3 my-2 text-capitalize">Guiding the Way to Success</h2>
          <p class="paragraph_font fw-light">We’re here to support your child throughout their learning journey. Whether it’s understanding the 11+ exams, applying to senior schools or navigating Key Stage 2, our expert tutors are ready to help. With personalised support and a caring approach, we make the process simple, smooth and stress-free. Our goal is to give your child the confidence and guidance they need to succeed.</p>
          <p class="fw-medium m-0 text-uppercase">Connect with us:</p>
          <ul class="p-0 m-0 contact_keys_section position-relative mb-4">
              <li class="paragraph_font my-2 d-flex align-items-center fw-light">
                <i class="fa-solid fa-circle-check text_secondary paragraph_font me-2"></i>
                <span class="m-0">Livechat</span>
              </li>
              <li class="paragraph_font my-2 d-flex align-items-center fw-light">
                <i class="fa-solid fa-circle-check text_secondary paragraph_font me-2"></i>
                <span class="m-0">Mail us&nbsp;
                  <a href="mailto:contact@tutorselevenplus.co.uk">contact@tutorselevenplus.co.uk</a></span>
                </li>
          </ul>
          <a aria-label="Contact Us" href="/contact" class="border-0 p-2 px-4 rounded-5 secondary_btn text-decoration-none text-white">Contact Us</a>
      </div>
      <div class="col-lg-5 col-md-6 col-sm-12 col-12 my-3 pt-2 justify-content-center d-flex">
        <img loading="lazy" src="{{ url('images/contact_section_isometric.webp') }}" alt="contact {{ app(\App\Settings\SiteSettings::class)->app_name }}" class="learning-image img-fluid" width="500" height="500">
      </div>
    </section>
    <!-- subscribe  -->
    @include('components.pricing')
    <section class="faq_section fixed_width">
      <div class="faq_section_container p-lg-5 p-md-3 p-1 pt-2 rounded-3 shadow mx-2">
        <h2 class="h1 text-capitalize px-2 mt-4">Have queries? Get answers</h2>
        <div class="heading_separator mb-4 px-1 rounded"></div>
        <div class="row align-items-center m-0">
            <div class="col-lg-8 col-md-7 col-sm-12 col-12">
                <ul class="question_list list-unstyled faq_question_section py-4 px-0">
                    <li class="question_item shadow-sm h-auto w-auto">
                        <div
                            class="faq_question p-3 fw-medium d-flex align-items-center justify-content-between border-bottom">
                            <h3 class="fw-normal font_medium">
                                {{ app(\App\Settings\Helpsettings::class)->faqs[0][0] }}</h3><span
                                class="plus_icon"><i class="fa fa-plus fa-sm revive_icon"></i></span>
                        </div>
                        <div class="answer_parent">
                            <div class="faq_answer bg-light bg-opacity-50 fw-light p-3 d-flex align-items-center">
                                {{ app(\App\Settings\Helpsettings::class)->faqs[0][1] }}</div>
                        </div>
                    </li>
                    <li class="question_item shadow-sm h-auto w-auto">
                        <div
                            class="faq_question p-3 fw-medium d-flex align-items-center justify-content-between border-bottom">
                            <h3 class="fw-normal font_medium">
                                {{ app(\App\Settings\Helpsettings::class)->faqs[1][0] }}</h3><span
                                class="plus_icon"><i class="fa fa-plus fa-sm revive_icon"></i></span>
                        </div>
                        <div class="answer_parent">
                            <div class="faq_answer bg-light bg-opacity-50 fw-light p-3 d-flex align-items-center">
                                {{ app(\App\Settings\Helpsettings::class)->faqs[1][1] }}</div>
                        </div>
                    </li>
                    <li class="question_item shadow-sm h-auto w-auto">
                        <div
                            class="faq_question p-3 fw-medium d-flex align-items-center justify-content-between border-bottom">
                            <h3 class="fw-normal font_medium">
                                {{ app(\App\Settings\Helpsettings::class)->faqs[3][0] }}</h3><span
                                class="plus_icon"><i class="fa fa-plus fa-sm revive_icon"></i></span>
                        </div>
                        <div class="answer_parent">
                            <div class="faq_answer bg-light bg-opacity-50 fw-light p-3 d-flex align-items-center">
                                {{ app(\App\Settings\Helpsettings::class)->faqs[3][1] }}</div>
                        </div>
                    </li>
                    <li class="question_item shadow-sm h-auto w-auto">
                        <div
                            class="faq_question p-3 fw-medium d-flex align-items-center justify-content-between border-bottom">
                            <h3 class="fw-normal font_medium">
                                {{ app(\App\Settings\Helpsettings::class)->faqs[4][0] }}</h3><span
                                class="plus_icon"><i class="fa fa-plus fa-sm revive_icon"></i></span>
                        </div>
                        <div class="answer_parent">
                            <div class="faq_answer bg-light bg-opacity-50 fw-light p-3 d-flex align-items-center">
                                {{ app(\App\Settings\Helpsettings::class)->faqs[4][1] }}</div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-lg-4 col-md-5 col-sm-12 col-12 d-flex justify-content-center"><img loading="lazy"
                    src="{{ url('images/faq_section.webp') }}" alt="3d faq image" height="283" width="377"
                    class="learning-image img-fluid"></div>
        </div>
      </div>
    </section>
    @include('components.home-footer')
    <script defer src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
        integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous">
    </script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script defer src="{{ url('Frontend_css/js/home.js') }}"></script>
    <script defer>
        $(document).ready((function() {
            $(window).resize((function() {
                let e = $(window).width(),
                    a = $("#sidebarNav"),
                    s = $(".offcanvas-backdrop");
                e > 992 && a.hasClass("show") && ($(a).removeClass("show"), $(a).addClass("hide"),
                    $(s).addClass("d-none"))
            })), $(window).scroll((function() {
                $(window).scrollTop() > 100 ? $("#navbar_nav").removeClass(
                    "absolute_nav bg-transparent").addClass(
                    "fixed-top fixed_nav col-lg-11 col-12") : $("#navbar_nav").removeClass(
                    "fixed-top fixed_nav col-lg-11 col-12").addClass(
                    "absolute_nav bg-transparent")
            }))
        }));
        var swiper = new Swiper(".testimonialSwiper", {
            slidesPerView: 1,
            spaceBetween: 10,
            autoplay: {
                delay: 7500,
                disableOnInteraction: !1
            },
            breakpoints: {
                500: {
                    slidesPerView: 1.5,
                    spaceBetween: 20
                },
                768: {
                    slidesPerView: 2.4,
                    spaceBetween: 20
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 20
                },
                1440: {
                    slidesPerView: 3,
                    spaceBetween: 20
                }
            }
        });
        $("#switch_plan_duration_btn").click((function() {
            $(this).is(":checked") ? ($(".monthly_plan_button").removeClass("text_primary"), $(
                    ".yearly_plan_button").addClass("text_primary"), $(".pricing-card.yearly")
                .removeClass("d-none"), $(".pricing-card.monthly").addClass("d-none")) : ($(
                    ".yearly_plan_button").removeClass("text_primary"), $(".monthly_plan_button")
                .addClass("text_primary"), $(".pricing-card.yearly").addClass("d-none"), $(
                    ".pricing-card.monthly").removeClass("d-none"))
        }));
    </script>
    <script defer>
        $("#submitSubscribe").click(function(e) {
            e.preventDefault();
            let email = $("#subscribeEmailbtn").val();
            let print = $(this).closest('.newletter_form');
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (email == '') {
                $(".email_error").removeClass('d-none');
                $("#subscribeEmailbtn").addClass("is-invalid");
                $(".email_error").text("The email field is required");
            } else if (!emailRegex.test(email)) {
                $(".email_error").removeClass('d-none');
                $("#subscribeEmailbtn").addClass("is-invalid");
                $(".email_error").text("Invalid email address");
            } else {
                $(".email_error").addClass('d-none');
                $("#subscribeEmailbtn").removeClass("is-invalid");
                $("#subscribeEmailbtn").addClass("is-valid");
            }

            if (email && emailRegex.test(email)) {
                $("#submitSubscribe").find(".fa-telegram-plane").addClass('d-none');
                $("#submitSubscribe").find(".spinner-border").removeClass('d-none');
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
                            $(".open_newsletter").click();
                            $("#submitSubscribe").find(".fa-telegram-plane").removeClass('d-none');
                            $("#submitSubscribe").find(".spinner-border").addClass('d-none');
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
