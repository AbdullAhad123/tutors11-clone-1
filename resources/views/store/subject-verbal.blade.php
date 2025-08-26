<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="{{ app(\App\Settings\SiteSettings::class)->app_name }}">
     <meta name="keywords" content="{{app(\App\Settings\KeywordsSettings::class)->keywords['home_keywords']}}">
    <title>Comprehensive 11+ Verbal Reasoning Tutoring - {{ app(\App\Settings\SiteSettings::class)->app_name }}</title>
    <meta name="description" content="Enhance your child's eleven plus verbal reasoning skills with TutorsElevenPlus. Develop critical thinking, vocabulary, and logic for academic success.">
    <link rel="icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}">
    <link rel="canonical" href="{{ url()->current() }}"/>
	<link rel="alternate" href="{{ url()->current() }}" hreflang="en-gb">
    <!-- preload links  -->
    <link rel="preload" href="{{url('Frontend_css/style.css')}}" as="style">
    <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" as="style">
    <link rel="preconnect" href="https://googleads.g.doubleclick.net">
    <link rel="preconnect" href="https://td.doubleclick.net">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://www.google-analytics.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- css links -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Kanit:wght@200;300;400;500&display=swap">
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
                        "name": "Verbal Reasoning"
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
    <style>
        .subject_details_section {
            height: auto;
            width: auto;
            margin: 2rem auto;
        }
    </style>
</head>
<body>

  <section class="header">
   @include('components.home-navbar') @if(app(\App\Settings\HomepageSettings::class)->enable_hero)
   <header class="header_section">
      <div class="d-flex align-items-center">
         <div class="col-lg-11 col-md-12 col-sm-12 col-12 mx-auto pt-lg-4 pt-md-3 pt-0">
            <div class="row align-items-center m-0">
               <div class="align-items-center col-12 col-lg-5 col-md-10 col-sm-12 header_text_side justify-content-center mt-5 mt-lg-0 mt-md-5 mt-sm-5 my-2 p-3 py-lg-0">
                  <h1 class="display-2 text-uppercase fw-bold mt-4 text-white animate__animated animate__backInLeft">Verbal Reasoning</h1>
                  <h2 class="h5 fw-light text-white my-2 animate__animated animate__backInLeft header_heading">Master 11+ Verbal Reasoning with {{ app(\App\Settings\SiteSettings::class)->app_name }} — unravel the complexities of language, enhance critical thinking, and elevate your potential for a golden future.</h2>
               </div>
               <div class="col-12 col-lg-7 col-md-12 col-sm-12 mt-lg-5 d-flex justify-content-center"><img src="{{url('images/verbal.webp')}}" width="500px" height="auto" alt="Tutorseelevenplus learning isometric" class="animate__animated animate__bounceInRight custom_animation_duration header_image img-fluid"></div>
            </div>
         </div>
      </div>
   </header>
   @endif
</section>
@if(count($sections) > 0)
<section class="categories_section mb-0 mt-5 py-4">
   <div class="container-lg container-md">
      <div class="section_heading mb-4">
         <h2 class="display-5 text-center fw-medium my-2">{{ app(\App\Settings\SiteSettings::class)->app_name }} Subjects</h2>
         <div class="heading_separator mx-auto rounded-pill mb-4"></div>
      </div>
      <div class="categories_container">
         <div class="my-4">
            <p class="section_top_text fw-medium text-center my-1">Boost your child's logical thinking.</p>
            <p class="fst-italic text-center my-1">Verbal Reasoning tutoring prepares students for the logical and analytical aspects of the Eleven Plus exam. Learn critical thinking, deduction, and pattern recognition. Through various exercises and practise tests, students develop the skills necessary to excel in the Verbal Reasoning section.</p>
         </div>
         <div class="row align-items-center justify-content-center py-4">
            @foreach($sections as $section)
            <div class="col-11 col-lg-3 col-md-6 col-sm-6 p-0 p-lg-2 p-md-2 p-sm-2">
               <figure class="shape-box shape-box_half">
                  @if($section['year_name'] == 'Year 1') <img src="{{url('images/year_1.webp')}}" alt="{{$section['section_slug']}}"> @elseif($section['year_name'] == 'Year 3') <img src="{{url('images/year_3.webp')}}" alt="{{$section['section_slug']}}"> @elseif($section['year_name'] == 'Year 4') <img src="{{url('images/year_4.webp')}}" alt="{{$section['section_slug']}}"> @else <img src="{{url('images/year_5.webp')}}" alt="{{$section['section_slug']}}"> @endif
                  <div class="brk-abs-overlay z-index-0 bg-black opacity-60"></div>
                  <figcaption>
                     <div class="show-cont">
                        <h2 class="card-no fw-semibold">{{$section['year_name']}}</h2>
                        <h2 class="card-main-title">11+ Grammar Exams</h2>
                     </div>
                     <p class="card-content">{{$section['section_short_description']}}</p>
                     <a href="/{{$section['section_slug']}}" class="read-more-btn">View Topics</a>
                  </figcaption>
                  <span class="after"></span>
               </figure>
            </div>
            @endforeach
         </div>
      </div>
   </div>
</section>
@endif
<div class="subject_details_section fixed_width">
   <div class="row align-items-center justify-content-center m-0 my-4">
      <div class="col-lg-7 col-md-6 col-sm-12 col-12 my-1">
         <h2 class="display-5 fw-medium my-1">Boost your child's logical thinking.</h2>
         <p class="fs-5 fw-light my-1">Verbal Reasoning tutoring prepares students for the logical and analytical aspects of the Eleven Plus exam.Learn critical thinking, deduction, and pattern recognition. Through various exercises and practise tests, students develop the skills necessary to excel in the Verbal Reasoning section.</p>
      </div>
      <div class="col-lg-5 col-md-6 col-sm-12 col-12 my-1 d-flex justify-content-center"><img src="{{url('images/nonverbal-5.webp')}}" class="img-fluid" width="500" height="auto" alt="a young boy sitting on a bunch of papers and reading a book"></div>
   </div>
   <div class="row align-items-center justify-content-center m-0 my-4">
      <div class="col-lg-5 col-md-6 col-sm-12 col-12 my-1 d-flex justify-content-center"><img src="{{url('images/verbal2.webp')}}" class="img-fluid" width="500" height="auto" alt="3d render of a lady standing wth laptop with some creative ideas"></div>
      <div class="col-lg-7 col-md-6 col-sm-12 col-12 my-1">
         <h2 class="display-5 fw-medium my-1">Navigating the Landscape of Verbal Reasoning</h2>
         <p class="fs-5 fw-light my-1">Verbal Reasoning at {{ app(\App\Settings\SiteSettings::class)->app_name }} is meticulously designed to empower learners with the ability to comprehend, analyze, and draw logical conclusions from verbal information. From decoding complex passages to unraveling the subtleties of language, our curriculum aims to sharpen the analytical acumen required for success in academic assessments and beyond.</p>
      </div>
   </div>
   <div class="row align-items-center justify-content-center m-0 my-4">
      <div class="col-lg-7 col-md-6 col-sm-12 col-12 my-1">
         <h2 class="display-5 fw-medium my-1">What's Our Role in Verbal Reasoning Learning?</h2>
         <p class="fs-5 fw-light my-1">At {{ app(\App\Settings\SiteSettings::class)->app_name }}, we play the role of cognitive architects, sculpting a curriculum that not only imparts knowledge but also hones the skills needed to excel in Verbal Reasoning challenges. Our seasoned tutors, distinguished by their expertise, guide students through diverse verbal landscapes, fostering an environment where reasoning becomes a living, breathing entity.</p>
      </div>
      <div class="col-lg-5 col-md-6 col-sm-12 col-12 my-1 d-flex justify-content-center"><img src="{{url('images/verbal3.webp')}}" class="img-fluid" width="500" height="auto" alt="3d render of person talking to each other"></div>
   </div>
   <div class="row align-items-center justify-content-center m-0 my-4">
      <div class="col-lg-5 col-md-6 col-sm-12 col-12 my-1 d-flex justify-content-center"><img src="{{url('images/verbal5.webp')}}" class="img-fluid" width="500" height="auto" alt="a boy stading with bagpack watching at the board"></div>
      <div class="col-lg-7 col-md-6 col-sm-12 col-12 my-1">
         <h2 class="display-5 fw-medium my-1">Why Verbal Reasoning Matters: Unveiling the Cognitive Benefits</h2>
         <p class="fs-5 fw-light my-1">Proficiency in Verbal Reasoning goes beyond exams; it opens doors to enhanced critical thinking, effective problem-solving, and intellectual agility. Through our immersive lessons, we instill the skills necessary to navigate Verbal Reasoning challenges and beyond.</p>
      </div>
   </div>
   <div class="row align-items-center justify-content-center m-0 my-4">
      <div class="col-lg-7 col-md-6 col-sm-12 col-12 my-1">
         <h2 class="display-5 fw-medium my-1">Elevate Your Cognitive Potential</h2>
         <p class="fs-5 fw-light my-1">At {{ app(\App\Settings\SiteSettings::class)->app_name }}, we illuminate the path to Verbal Reasoning excellence. Our commitment is not just about passing exams; it's about equipping students with the cognitive tools to navigate a world where reasoning holds the power to inspire, persuade, and shape futures.</p>
      </div>
      <div class="col-lg-5 col-md-6 col-sm-12 col-12 my-1 d-flex justify-content-center"><img src="{{url('images/verbal4.webp')}}" class="img-fluid" width="500" height="auto" alt="a boy standing with books haveing a scholarship hat"></div>
   </div>
   <div class="my-4">
      <h2 class="display-5 fw-semibold text-center my-1">Conclusion</h2>
      <p class="fs-5 fw-light my-1 text-center">Join us on this captivating cognitive exploration, where the art of Verbal Reasoning unfolds as a key to unlocking academic success. At {{ app(\App\Settings\SiteSettings::class)->app_name }}, we believe that every reasoning skill acquired becomes a brushstroke in the grand canvas of your cognitive education, painting a portrait of critical thinking and intellectual finesse.</p>
   </div>
</div>
@include('components.home-footer')

  <script defer src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
        integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script defer>
        $(document).ready(function () {
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

