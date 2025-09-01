<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="{{ app(\App\Settings\SiteSettings::class)->app_name }}">
     <meta name="keywords" content="{{app(\App\Settings\KeywordsSettings::class)->keywords['home_keywords']}}">
    <title>Comprehensive 11+ Non-verbal Reasoning Tutoring - {{ app(\App\Settings\SiteSettings::class)->app_name }}</title>
    <meta name="description" content="Boost your child's eleven plus non-verbal reasoning skills with TutorsElevenPlus. Develop spatial awareness and pattern recognition for exam excellence.">
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
    <!-- css links -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Kanit:wght@200;300;400;500&display=swap">
    <link rel="stylesheet" href="{{url('Frontend_css/all.css')}}" />
    <link rel="stylesheet" href="{{url('Frontend_css/style.css')}}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    @include('components.google-tags')
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
                        "name": "Non-Verbal Reasoning"
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
<style>
    .subject_details_section {
        height: auto;
        width: auto;
        margin: 2rem auto;
    }
</style>
<body>

    <section class="header">@include('components.home-navbar') @if(app(\App\Settings\HomepageSettings::class)->enable_hero)<header class="header_section"><div class="d-flex align-items-center"><div class="col-lg-11 col-md-12 col-sm-12 col-12 mx-auto pt-lg-4 pt-md-3 pt-0"><div class="row align-items-center m-0"><div class="align-items-center col-12 col-lg-5 col-md-10 col-sm-12 header_text_side justify-content-center mt-5 mt-lg-0 mt-md-5 mt-sm-5 my-2 p-3 py-lg-0"><h1 class="display-2 text-uppercase fw-bold mt-4 text-white">Non-Verbal Reasoning</h1><h2 class="h5 fw-light text-white my-2 header_heading">Master 11+ Non-Verbal Reasoning with {{ app(\App\Settings\SiteSettings::class)->app_name }} — unravel visual puzzles, enhance spatial awareness. Elevate your potential for a golden future.</h2></div><div class="col-12 col-lg-7 col-md-12 col-sm-12 mt-lg-5 d-flex justify-content-center"><img src="{{url('images/subject5.webp')}}" width="500" height="auto" alt="Tutorselevenplus learning isometric" class="header_image img-fluid"></div></div></div></div></header>@endif</section>@if(count($sections) > 0)<section class="categories_section mb-0 mt-5 py-4"><div class="container-lg container-md"><div class="section_heading mb-4"><h2 class="display-5 text-center fw-medium my-2">{{ app(\App\Settings\SiteSettings::class)->app_name }} Subjects</h2><div class="heading_separator mx-auto rounded-pill mb-4"></div></div><div class="categories_container"><div class="my-4"><p class="section_top_text fw-medium text-center my-1">Prepare your child for the visual challenges.</p><p class="fst-italic text-center my-1">Non-Verbal Reasoning focuses on enhancing visual and spatial reasoning abilities. Topics such as series, cubes, and spatial awareness are covered. Through hands-on exercises and practical examples, students build the non-verbal reasoning skills required for success in the Eleven Plus exam.</p></div><div class="row align-items-center justify-content-center py-4">@foreach($sections as $section)<div class="col-11 col-lg-3 col-md-6 col-sm-6 p-0 p-lg-2 p-md-2 p-sm-2"><figure class="shape-box shape-box_half">@if($section['year_name'] == 'Year 1') <img src="{{url('images/year_1.webp')}}" alt="{{$section['section_slug']}}"> @elseif($section['year_name'] == 'Year 3') <img src="{{url('images/year_3.webp')}}" alt="{{$section['section_slug']}}"> @elseif($section['year_name'] == 'Year 4') <img src="{{url('images/year_4.webp')}}" alt="{{$section['section_slug']}}"> @else <img src="{{url('images/year_5.webp')}}" alt="{{$section['section_slug']}}"> @endif<div class="brk-abs-overlay z-index-0 bg-black opacity-60"></div><figcaption><div class="show-cont"><h2 class="card-no fw-semibold">{{$section['year_name']}}</h2><h2 class="card-main-title">11+ Grammar Exams</h2></div><p class="card-content"></p><a href="/{{$section['section_slug']}}" class="read-more-btn">View Topics</a></figcaption><span class="after"></span></figure></div>@endforeach</div></div></div></section>@endif<div class="subject_details_section fixed_width"><div class="row align-items-center justify-content-center m-0 my-4"><div class="col-lg-7 col-md-6 col-sm-12 col-12 my-1"><h2 class="display-5 fw-medium my-1">Non-Verbal Reasoning Mastery for 11+</h2><p class="fs-5 fw-light my-1">Embark on a visual odyssey with {{ app(\App\Settings\SiteSettings::class)->app_name }}, where the art of Non-Verbal Reasoning unfolds in a tapestry of visual puzzles and enhanced spatial awareness. Non-Verbal Reasoning is not just a subject; it's a gateway to unraveling the complexities of visual patterns, shapes, and logical reasoning.</p></div><div class="col-lg-5 col-md-6 col-sm-12 col-12 my-1 d-flex justify-content-center"><img src="{{url('images/nonverbal-1.webp')}}" class="img-fluid" width="500" height="auto" alt="a kid reading book on a table on blue background"></div></div><div class="row align-items-center justify-content-center m-0 my-4"><div class="col-lg-5 col-md-6 col-sm-12 col-12 my-1 d-flex justify-content-center"><img src="{{url('images/nonverbal-3.webp')}}" class="img-fluid" width="500" height="auto" alt="a boy standing with achievements and having books in hand"></div><div class="col-lg-7 col-md-6 col-sm-12 col-12 my-1"><h2 class="display-5 fw-medium my-1">Navigating the Visual Landscape of Non-Verbal Reasoning</h2><p class="fs-5 fw-light my-1">Non-Verbal Reasoning at {{ app(\App\Settings\SiteSettings::class)->app_name }} is meticulously designed to empower learners with the ability to comprehend, analyze, and solve visual puzzles. From mastering abstract patterns to enhancing spatial awareness, our curriculum aims to sharpen the visual acumen required for success in academic assessments and beyond.</p></div></div><div class="row align-items-center justify-content-center m-0 my-4"><div class="col-lg-7 col-md-6 col-sm-12 col-12 my-1"><h2 class="display-5 fw-medium my-1">What's Our Role in Non-Verbal Reasoning Learning?</h2><p class="fs-5 fw-light my-1">At {{ app(\App\Settings\SiteSettings::class)->app_name }}, we play the role of visual architects, crafting a curriculum that not only imparts knowledge but also hones the skills needed to excel in visual reasoning challenges. Our seasoned tutors, distinguished by their expertise, guide students through diverse visual landscapes, fostering an environment where visual concepts become a living, breathing entity.</p></div><div class="col-lg-5 col-md-6 col-sm-12 col-12 my-1 d-flex justify-content-center"><img src="{{url('images/nonverbal-2.webp')}}" class="img-fluid" width="500" height="auto" alt="a boy standing with tablet in hand with some creative ideas"></div></div><div class="row align-items-center justify-content-center m-0 my-4"><div class="col-lg-5 col-md-6 col-sm-12 col-12 my-1 d-flex justify-content-center"><img src="{{url('images/nonverbal-4.webp')}}" class="img-fluid" width="500" height="auto" alt="3d render of boy standing with bagpack"></div><div class="col-lg-7 col-md-6 col-sm-12 col-12 my-1"><h2 class="display-5 fw-medium my-1">Why Non-Verbal Reasoning Matters: Unveiling the Visual Benefits</h2><p class="fs-5 fw-light my-1">Proficiency in Non-Verbal Reasoning goes beyond exams; it opens doors to enhanced visual reasoning, pattern recognition, and spatial intelligence. Through our immersive lessons, we instill the skills necessary to navigate Non-Verbal Reasoning challenges and beyond.</p></div></div><div class="row align-items-center justify-content-center m-0 my-4"><div class="col-lg-7 col-md-6 col-sm-12 col-12 my-1"><h2 class="display-5 fw-medium my-1">Elevate Your Visual Potential</h2><p class="fs-5 fw-light my-1">At {{ app(\App\Settings\SiteSettings::class)->app_name }}, we illuminate the path to Non-Verbal Reasoning excellence. Our commitment is not just about passing exams; it's about equipping students with the visual tools to navigate a world where visual reasoning holds the power to inspire, solve, and shape futures.</p></div><div class="col-lg-5 col-md-6 col-sm-12 col-12 my-1 d-flex justify-content-center"><img src="{{url('images/nonverbal-5.webp')}}" class="img-fluid" width="500" height="auto" alt="a boy sitting on a bunch of papers with book in hands"></div></div><div class="my-lg-5 my-md-5 my-sm-4 my-1"><h2 class="display-5 fw-medium text-center my-1">Conclusion</h2><p class="fs-5 fw-light my-1 text-center">Join us on this captivating visual exploration, where the art of Non-Verbal Reasoning unfolds as a key to unlocking academic success. At {{ app(\App\Settings\SiteSettings::class)->app_name }}, we believe that every visual concept learned becomes a pattern in the grand mosaic of your visual education, solving puzzles and paving the way for a future adorned with enhanced spatial awareness and intellectual finesse.</p></div></div>@include('components.home-footer')

    <script defer src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
        integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script defer>
        $(document).ready(function () {
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

