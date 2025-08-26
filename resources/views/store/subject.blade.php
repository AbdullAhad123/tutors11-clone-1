<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elevate your skills: Mastering {{$subject['name']}} at {{ app(\App\Settings\SiteSettings::class)->app_name }}</title>
    <meta name="description" content="{{app(\App\Settings\KeywordsSettings::class)->description['subject_description']}}">
    <meta name="keywords" content="{{app(\App\Settings\KeywordsSettings::class)->keywords['subject_keywords']}}">
    <link rel="canonical" href="{{ url()->current() }}"/>
	<link rel="alternate" href="{{ url()->current() }}" hreflang="en-gb">
    <meta name="author" content="{{ app(\App\Settings\SiteSettings::class)->app_name }}">
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
        .teacher_header_section { min-height: 600px; max-height: fit-content; width: auto; background: var(--primary); } .container-cards { height: 100%; margin: auto; display: flex; align-items: center; justify-content: space-evenly; } .card { position: relative; padding: 1rem; width: 350px; height: 450px; box-shadow: -1px 15px 30px -12px rgb(32, 32, 32); border-radius: 0.9rem; background-color: var(--red-card); color: var(--text); cursor: pointer; } .product-image { height: 230px; width: 100%; transform: translate(0, -1.5rem); transition: transform 500ms ease-in-out; filter: drop-shadow(5px 10px 15px rgba(8, 9, 13, 0.4)); } .product-info { text-align: center; } .card:hover .product-image { transform: translate(-1.5rem, -7rem) rotate(-20deg); } .product-info h2 { font-size: 1.4rem; font-weight: 600; } .product-info p { margin: 0.4rem; font-size: 0.8rem; font-weight: 600; } .price { font-size: 1.2rem; font-weight: 500; } .btn { display: flex; justify-content: space-evenly; align-items: center; margin-top: 0.8rem; } .buy-btn { background-color: var(--btn); padding: 0.6rem 3.5rem; font-weight: 600; font-size: 1rem; transition: 300ms ease; } .buy-btn:hover { background-color: var(--btn-hover); } .fav { box-sizing: border-box; background: #fff; padding: 0.5rem 0.5rem; border: 1px solid#000; display: grid; place-items: center; } .svg { height: 25px; width: 25px; fill: #fff; transition: all 500ms ease; } .fav:hover .svg { fill: #000; } @media screen and (max-width: 800px) { body { height: auto; } .container-cards { padding: 2rem 0; width: 100%; flex-direction: column; gap: 3rem; } } .cards { display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem; margin: 4rem 5vw; padding: 0; list-style-type: none; } .card-teacher { position: relative; display: block; height: 100%; border-radius: calc(var(--curve) * 1px); overflow: hidden; text-decoration: none; } .card__image { width: 100%; height: auto; } .card__overlay { position: absolute; bottom: 0; left: 0; right: 0; z-index: 1; border-radius: calc(var(--curve) * 1px); background-color: var(--surface-color); transform: translateY(100%); transition: .2s ease-in-out; background: #fceffc; } .card-teacher:hover .card__overlay { transform: translateY(0); } .card__header { position: relative; display: flex; align-items: center; gap: 2em; padding: 2em; border-radius: calc(var(--curve) * 1px) 0 0 0; background-color: var(--surface-color); transform: translateY(-100%); transition: .2s ease-in-out; background: rgb(252, 239, 252); } .card__arc { width: 80px; height: 80px; position: absolute; bottom: 100%; right: 0; z-index: 1; } .card__arc path { fill: rgb(252, 239, 252); d: path("M 40 80 c 22 0 40 -22 40 -40 v 40 Z"); } .card-teacher:hover .card__header { transform: translateY(0); } .card__thumb { flex-shrink: 0; width: 50px; height: 50px; border-radius: 50%; } .card__title { font-size: 1em; margin: 0 0 .3em; color: #6A515E; } .card__tagline { display: block; margin: 1em 0; font-family: "MockFlowFont"; font-size: .8em; color: #D7BDCA; } .card__status { font-size: .8em; color: #D7BDCA; } .card__description { padding: 0 2em 2em; margin: 0; color: #D7BDCA; font-family: "MockFlowFont"; display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 3; overflow: hidden; } .container-image { transform: perspective(50rem) rotateY(14deg); transition: 0.3s } .container-image:hover { scale: 1.03; transform: perspective(50rem) rotateY(0); } .container-image .card-text { width: 75%; /* max-height: auto; min-height: 250px; */ object-fit: cover; border-radius: 30px; background: linear-gradient(250deg , white , #e3e3e3); transform-origin: center; transition: 0.3s; filter: drop-shadow(-3px 2px 5px #00000065); } .container-image { max-width: 600px; max-height: auto; min-height: 200px; display: flex; justify-content: center; align-items: center; gap: 20px; } .container-image .card-text:hover { transform: perspective(800px) rotateY(0deg); opacity: 1; } .teachers_section { height: auto; width: auto; margin: 5rem auto; } .teacher_registration { height: auto; width: auto; margin: 5rem auto; } .about_features_card { box-shadow: 0px 3px 6px 1px #00000040; } .cards-teacher{ min-width: 70%; max-width: 85%; } */ .blogs_features_section { height: auto; width: auto; margin: 5rem auto; } .blog_feature_card { height: auto; width: 240px; transition: 0.3s; } .feature_card_one { height: 300px; border-radius: 45%; background: url('https://img.freepik.com/free-photo/view-3d-kids-library_23-2150710010.jpg') center; background-size: cover; /* filter: drop-shadow(2px 2px 1px #00000055); */ box-shadow: 4px 4px 0px 0px var(--lightprimary); } .feature_card_two { height: 300px; border-radius: 20%; background: url('https://img.freepik.com/free-photo/3d-rendering-kid-playing-digital-game_23-2150898504.jpg') center; background-size: cover; /* filter: drop-shadow(2px 2px 1px #00000055); */ box-shadow: 4px 4px 0px 0px var(--secondary); } .feature_card_three { height: 300px; border-top-left-radius: 50%; border-bottom-left-radius: 50%; background: url('https://img.freepik.com/free-photo/3d-rendering-cartoon-like-boy-reading-armchair_23-2150797738.jpg?t=st=1699012894~exp=1699016494~hmac=3c9337ca587a7664611f584ffbbcb3abec0fc8f4228dc397825f46717569a82a&w=826') center; background-size: cover; /* filter: drop-shadow(2px 2px 1px #00000055); */ box-shadow: 4px 4px 0px 0px var(--lightprimary); } .feature_card_four { height: 300px; border-top-right-radius: 25%; border-bottom-left-radius: 25%; background: url('https://img.freepik.com/free-photo/3d-rendering-cartoon-like-boy-reading-armchair_23-2150797738.jpg?t=st=1699012894~exp=1699016494~hmac=3c9337ca587a7664611f584ffbbcb3abec0fc8f4228dc397825f46717569a82a&w=826') center; background-size: cover; /* filter: drop-shadow(2px 2px 1px #00000055); */ box-shadow: 4px 4px 0px 0px var(--secondary); } .subject_cards{ background: radial-gradient(#65ba7c, #348f4d) !important; box-shadow: 0px 2px 8px 0px #00000033 !important; transition: 0.25s !important; min-height:250px; } .subject_cards:hover {scale: 1.02 } .blog_feature_card_transform { position: relative; top: 50px; } .blog_feature_title{ -webkit-text-fill-color: transparent; -webkit-text-stroke-width: 2px; -webkit-text-stroke-color: var(--secondary); letter-spacing: 2px; transition: 0.3s; } .blog_feature_image { transition: 0.3s; } .blog_feature_image:hover { scale: 1.04; } @media (max-width: 560px) { .blog_feature_card_transform { top: 0px; } .blog_feature_card { width: 280px!important; } }
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
    <script type="application/ld+json">
      {
        "@context":"http://schema.org",
        "@graph": [
          { 
            "@id":"https://tutorselevenplus.co.uk",
            "@type":"EducationalOrganization",
            "name":"{!! app(\App\Settings\SiteSettings::class)->app_name !!}",
            "url":"https://tutorselevenplus.co.uk/",
            "logo":"{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}",
            "keywords": "{{app(\App\Settings\KeywordsSettings::class)->keywords['home_keywords']}}",
            "description": "{{app(\App\Settings\KeywordsSettings::class)->description['home_description']}}",
            "address": {
              "@type": "PostalAddress",
              "addressLocality": "Bexleyheath",
              "addressRegion": "England",
              "postalCode": "DA7 4UN",
              "streetAddress": "Barrington Primary School",
              "addressCountry": "UK"
            },
            "alumni": [
              @foreach($reviews as $key => $review)
              {
                "@type": "Person",
                "name": "{{$review->name}}",
                "alumniOf": {
                  "@type": "OrganizationRole",
                  "alumniOf": {
                      "@type": "School",
                      "name": "{!! app(\App\Settings\SiteSettings::class)->app_name !!}",
                      "sameAs": "https://tutorselevenplus.co.uk"
                  },
                  "startDate": "{{$review->date}}"
                }
              }@if(count($reviews) > ++$key),@endif
              @endforeach
            ],
            "location": {
              "@type": "Place",
              "geo": {
                "@type": "GeoCoordinates",
                "latitude": "51.4641627",
                "longitude": "0.1245825"
              },
              "name": "{!! app(\App\Settings\SiteSettings::class)->app_name !!}",
              "logo":"{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}"
            },
            "contactPoint":[{
              "@type":"ContactPoint",
              "telephone":"+44-1632-960891", 
              "contactType":"sales",
              "areaServed":["UK"]
            }],
            "sameAs":[
              "https://www.linkedin.com/in/tutors-elevenplus-9a6469298",
              "https://www.youtube.com/@TutorsElevenplus",
              "https://www.facebook.com/tutorselevenplus",
              "https://twitter.com/tutorelevenplus",
              "https://www.tiktok.com/@tutorselevenplus"
              ],
            "aggregateRating":{
              "@type":"AggregateRating",
              "ratingValue":5,
              "reviewCount":{{count($reviews)}}
            },
            "review": [
              @foreach($reviews as $key => $review)
                {
                  "@type": "Review",
                  "author": {
                    "@type": "Person",
                    "name": "{{$review->name}}"
                  },
                  "datePublished": "{{$review->date}}",
                  "name": "{{$review->name}}",
                  "reviewBody": "{{$review->message}}",
                  "reviewRating": {
                    "@type": "Rating",
                    "ratingValue": "{{$review->rating}}"
                  }
                }@if(count($reviews) > ++$key),@endif
              @endforeach
            ]
          },
          {
            "@type": "BreadcrumbList",
            "name":"{!! app(\App\Settings\SiteSettings::class)->app_name !!}",
            "itemListElement": [
                {
                    "@type": "ListItem",
                    "position": 1,
                    "item": {
                        "@id":"https://tutorselevenplus.co.uk",
                        "name":"{!! app(\App\Settings\SiteSettings::class)->app_name !!}"
                    }
                },
                {
                    "@type": "ListItem",
                    "position": 2,
                    "item": {
                        "@id":"{{ url()->current() }}",
                        "name": "{{ $subject == 'science' ? 'Science' : 'Maths'  }}"
                    }
                }
            ]
          },
          @foreach($sections as $key => $section)
          {
            "@id": "{{route('subject', ['subject' => $section['section_slug']])}}",
            "@type": "Course",
            "name": "{{$section['section_name']}}",
            "courseCode": "{{$section['section_slug']}}",
            "description": "{{ $section['section_short_description'] ? $section['section_short_description'] : ($section['year_description'] ? $section['year_description'] : app(\App\Settings\KeywordsSettings::class)->description['home_description']) }}",
            "provider": {
              "@type": "Organization",
              "name": "{!! app(\App\Settings\SiteSettings::class)->app_name !!}",
              "url": "https://tutorselevenplus.co.uk",
              "sameAs": "https://tutorselevenplus.co.uk"
            },
            "publisher": {
                "@type": "Organization",
                "name": "{!! app(\App\Settings\SiteSettings::class)->app_name !!}",
                "url": "https://tutorselevenplus.co.uk",
                "sameAs": "https://tutorselevenplus.co.uk"
            },
            "aggregateRating": {
                "@type": "AggregateRating",
                "ratingValue": 5,
                "ratingCount": {{$reviews->sum('rating')}},
                "reviewCount": {{count($reviews)}}
            },
            "offers": [
                @foreach($plans as $pKey => $plan)
                    {
                        "@type": "Offer",
                        "availability": "https://schema.org/InStock",
                        "category": "{{$section['section_name']}}",
                        "priceCurrency": "GBP",
                        "price": "{{ $plan->price }}"
                    }@if(count($plans) > ++$pKey),@endif
                @endforeach
            ],
            "hasCourseInstance": [
                @foreach($plans as $pKey => $plan)
                  {
                    "@type": "CourseInstance",
                    "courseMode": ["online"],
                    "courseSchedule": {
                      "@type": "Schedule",
                      "duration": "P{{$plan->duration}}M",
                      "repeatFrequency": ["monthly"],
                      "repeatCount": {{$plan->duration}}
                    },
                    "offers": {
                      "@type": "Offer",
                      "price": "{{ $plan->price }}",
                      "priceCurrency": "GBP"
                    }
                  }@if(count($plans) > ++$pKey),@endif
                @endforeach
            ],
            "totalHistoricalEnrollment": {{$total_students}},
            "datePublished": "{{ $section['section_created_at'] }}",
            "educationalLevel": "Advanced",
            "inLanguage": "en"
            @if(count($section['topics']) > 0)
                ,
                "syllabusSections": [
                    @foreach($section['topics'] as $tKey => $topic)
                        {
                            "@type": "Syllabus",
                            "name": "{{$topic['name']}}",
                            "description": "{{ $topic['short_description'] ?: ($section['section_short_description'] ?: ($section['year_description'] ?: app(\App\Settings\KeywordsSettings::class)->description['home_description'])) }}",
                            "hasPart": [
                                @foreach($topic['sub_topics'] as $sKey => $sub_topic)
                                    {
                                        "@type": "Syllabus",
                                        "name": "{{$sub_topic->name}}",
                                        "description": "{{ $sub_topic->short_description ?: $topic['short_description'] ?: ($section['section_short_description'] ?: ($section['year_description'] ?: app(\App\Settings\KeywordsSettings::class)->description['home_description'])) }}"
                                    }@if(count($topic['sub_topics']) > ++$sKey),@endif
                                @endforeach
                            ]
                        }@if(count($section['topics']) > ++$tKey),@endif
                    @endforeach
                ]
            @endif
          }@if(count($sections) > ++$key),@endif
          @endforeach
        ]
      }
    </script>
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
                            <h1 class="display-4 fw-medium mt-4 text-white">Explore our <br> {{$subject['name']}} Details</h1>
                            <p class="fs-5 fw-light header_heading my-2 text-white">{{$subject['short_description']}}</p>
                            <div class="input-group mb-3 position-relative d-flex">
                                <a href='{{app(\App\Settings\HeroSettings::class)->cta_link}}' class="border-0 mt-3 p-2 px-4 secondary_btn font_medium text-decoration-none">{{app(\App\Settings\HeroSettings::class)->cta_text}}</a>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 col-md-12 col-sm-12 py-2 justify-content-center d-flex" >
                            <div class="fixed_header_media_width mx-auto">
                                <img src="{{url('images\maths-topic.png')}}" width="100%" height="auto" style='filter: contrast(1.1);' alt="{{ app(\App\Settings\SiteSettings::class)->app_name }} learning isometric" class="img-fluid learning-image">  
                            </div>
                        </div>    
                    </div>    
                </div>
            </div>
        </header>
    </section>

    <div class="topic-maths fixed_width my-5">
        <div class="row align-items-baseline m-0">
            <div class="col-lg-8 col-md-6 col-sm-12 col-12 my-2">    
                <h2 class="fw-medium h1">Let's Begin a Learning Adventure Together!</h2>
                <div class="heading_separator rounded-pill mb-4"></div>
                <p class="fs-5 fw-light">Welcome to TutorsElevenPlus – your gateway to an exciting journey of learning! Here, we explore the fascinating worlds of math, English, verbal reasoning, and non-verbal reasoning. Every new thing you discover sparks your curiosity, turning learning into a truly exciting adventure.</p>
            </div>
            <div class="col-lg-4 col-md-5 col-sm-12 col-12 my-2 text-center ">
                <img src="{{url('images/mathematics.png')}}" class="img-fluid" height="auto" width="auto" alt="journey guys image">
            </div>      
        </div>  
    </div>

    <!-- cards -->
    @if(count($topics) > 0)
        <div class="about_features_section fixed_width py-3">
            <div class="mb-4">
                <h2 class="fw-medium text-center h1">Explore Our Topics</h2>
                <div class="heading_separator mx-auto rounded-pill mb-4"></div>
            </div>
            <div class="row my-4 align-items-center justify-content-center m-0">
                @foreach($topics as $topic)
                    <div class="col-lg-6 col-md-8 col-sm-11">
                        <a href="{{route('topic',['subject_region'=>$subject['slug'],'topic_school'=>$topic->slug])}}">
                            <div class="subject_cards d-flex align-items-center rounded-5 shadow p-4 my-2 position-relative">    
                                <div>
                                    <h2 class='h4 my-2 fw-medium text-white'>{{$topic->name}}</h2>
                                    <p class="my-2 fs-6 fw-light text-white">{{$topic->short_description}}</p>
                                </div>
                                <div class="card_shade"></div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
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