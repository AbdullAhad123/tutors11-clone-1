<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="author" content="{{ app(\App\Settings\SiteSettings::class)->app_name }}">
   <meta name="keywords" content="{{app(\App\Settings\KeywordsSettings::class)->keywords['explore_keywords']}}">
   <title>Explore {{$category['name']}} - Ace the 11+ Exam | Tutorselevenplus</title>
   <meta name="description" content="{{app(\App\Settings\KeywordsSettings::class)->description['explore_description']}}">
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
   <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Kanit:wght@200;300;400;500&display=swap">
   <link rel="stylesheet" href="{{url('Frontend_css/style.css')}}" />
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
   @include('components.google-tags')
   <style>
      .subject_cards{
         background:radial-gradient(#ffc352, #e79700) !important;
         box-shadow: 0px 2px 8px 0px #00000033 !important;
         transition: 0.25s !important;
         min-height:210px;
      }
      .subject_cards:hover {scale: 1.04 }
      .blog_feature_card_transform {
         position: relative;
         top: 50px;
      } 
      .subjects {
         min-height: 250px;
      }
      .service_child1 { background: #bbd1f4 } .service_child2 { background: #ffe5c2 } .service_child3 { background: #d2cdc7 } .service_child4 { background: #ffc747 } .services_card { height: auto; } .services_image { height: 160px; width: auto; } .services_image img { position: absolute; left: 50%; right: 50%; top: -75px; transform: translateX(-50%); } .testimonial_text{height:260px;overflow-y:auto;line-height:1.9rem!important}.testimonial_text::-webkit-scrollbar{width:5px!important}
      .getStartedFixedBtn {
         position: fixed;
         top: 75%;
         right: 0;
         transform: translateY(-75%);
         z-index: 1;
      }
   </style>
</head>
<body>
   <section>
      @include('components.home-navbar')
      <header class="about_header_section d-flex align-items-center">
         <div class="container-fluid col-lg-11 col-md-12 col-sm-12 col-12 my-5 mt-5">
            <div class="row align-items-center m-0">
               <div class="col-lg-5 col-md-6 col-sm-12 col-12 mt-3">
                  <h1 class="display-4 fw-medium mt-4 text-white">Information About {{ $category['name'] }}</h1>
                  @if($category['name'] == 'Year 3')
                     <p class="fs-5 fw-light header_heading my-2 text-white">Exploring the categories on our platform can be an enjoyable and educational journey for your child. They will have the opportunity to discover new topics, enhance their skills, and have fun simultaneously.</p>
                  @elseif($category['name'] == 'Year 4')
                     <p class="fs-5 fw-light header_heading my-2 text-white">Exploring the Year 4 categories on our platform enables your child to discover and further develop essential skill sets. This is achieved in an environment designed to capture their attention whilst progressing through the topics required for academic success.</p>
                  @else
                     <p class="fs-5 fw-light header_heading my-2 text-white">The categories for our Year 5 platform are an invaluable source of learning in preparation for any upcoming exams. Children have the opportunity to learn and master new topics, enhance their skills, and still have fun!</p>
                  @endif
               </div>
               <div class="col-lg-7 col-md-6 col-sm-12 col-12 text-center"><img src="{{url('images/child_portal_header.png')}}" height="auto" width="450" class="img-fluid" alt="explore {{ $category['name'] }}"></div>
            </div>
         </div>
      </header>
   </section>
   <div class="getStartedFixedBtn">
    <a href="{{ route('regis_form') }}" class="border-0 d-inline-flex px-4 py-2 rounded-pill secondary_btn">Get Started</a>
</div>

   <div class="category_section py-5 fixed_width">
      <div class="section_heading mb-lg-4 mb-md-4 mb-2">
         <h2 class="display-5 text-center fw-medium my-2">{{$category['name']}} Tuition Program</h2>
         <div class="heading_separator mx-auto rounded-pill mb-2"></div>
      </div>
      <div class="row m-0 align-items-center my-2 justify-content-center">
         <div class="col-lg-8 col-md-7 col-sm-12 col-12 my-3">
            <h2>Creating a Brighter Future</h2>
            @if ($category['name'] == 'Year 3')
               <p class="fs-5 fw-light mb-2">Our Year 3 program has been developed with the aim to bridge any knowledge gaps and gently introduce key concepts and skills to children at an earlier stage so there is less stress in Years 4 & 5. We cover the following in our programme:</p>
               <ul class="m-0 p-0 fs-5 fw-light list-unstyled">
                  <li class="my-2 d-flex align-items-center">
                     <i class="fa-solid fa-circle-check me-1" style="color: #007bff;"></i>
                     Building Maths concepts.
                  </li>
                  <li class="my-2 d-flex align-items-center">
                     <i class="fa-solid fa-circle-check me-1" style="color: #007bff;"></i>
                     Reading & English Comprehension skills.
                  </li>
                  <li class="my-2 d-flex align-items-center">
                     <i class="fa-solid fa-circle-check me-1" style="color: #007bff;"></i>
                     Verbal Reasoning & Vocabulary.
                  </li>
                  <li class="my-2 d-flex align-items-center">
                     <i class="fa-solid fa-circle-check me-1" style="color: #007bff;"></i>
                     Introduction to Non-Verbal Reasoning.
                  </li>
               </ul>
            @elseif ($category['name'] == 'Year 4')
               <p class="fs-5 fw-light mb-2">Our Year 4 programme has been developed with the aim to bridge any outstanding knowledge gaps and build on key concepts in preparation for Year 5. From experience, we have learned that providing your child with access to our Year 4 programme gives them ample time to learn the skills needed for the 11+. This results in less stress and pressure upon entering Year 5 when all of a sudden the exams seem to loom ahead. We cover the following in our programme:</p>
               <ul class="m-0 p-0 fs-5 fw-light list-unstyled">
                  <li class="my-2 d-flex align-items-center">
                     <i class="fa-solid fa-circle-check me-1" style="color: #007bff;"></i>
                     English comprehension skills and vocabulary.
                  </li>
                  <li class="my-2 d-flex align-items-center">
                     <i class="fa-solid fa-circle-check me-1" style="color: #007bff;"></i>
                     Maths concepts and methods.
                  </li>
                  <li class="my-2 d-flex align-items-center">
                     <i class="fa-solid fa-circle-check me-1" style="color: #007bff;"></i>
                     Verbal and Non-Verbal Reasoning techniques.
                  </li>
                  <li class="my-2 d-flex align-items-center">
                     <i class="fa-solid fa-circle-check me-1" style="color: #007bff;"></i>
                     Creative writing foundation.
                  </li>
               </ul>
            @else
               <p class="fs-5 fw-light mb-2">Our Year 5 Tuition course will cover everything your child needs to pass the 11+ exams. Your child will continually be able to practise and recap the core concepts and skills required for each of the 11+ subjects. The pace shifts a gear with the ability to have a real focus on exam technique, increase of speed and working under timed conditions. Year 5 students will be more confident in knowing how to approach each paper and be exam ready. We cover the following in our programme:</p>
               <ul class="m-0 p-0 fs-5 fw-light list-unstyled">
                  <li class="my-2 d-flex align-items-center">
                     <i class="fa-solid fa-circle-check me-1" style="color: #007bff;"></i>
                     Comprehensive skills for English and Maths.
                  </li>
                  <li class="my-2 d-flex align-items-center">
                     <i class="fa-solid fa-circle-check me-1" style="color: #007bff;"></i>
                     Understanding different approaches to Verbal and Non-Verbal Reasoning.
                  </li>
                  <li class="my-2 d-flex align-items-center">
                     <i class="fa-solid fa-circle-check me-1" style="color: #007bff;"></i>
                     Creative writing techniques for super-selective schools.
                  </li>
                  <li class="my-2 d-flex align-items-center">
                     <i class="fa-solid fa-circle-check me-1" style="color: #007bff;"></i>
                     Exam techniques and speed strategies.
                  </li>
               </ul>
            @endif
         </div>
         <div class="col-lg-4 col-md-5 col-sm-12 col-12 my-3 text-center">
            <img src="{{url('images/tuition_program.png')}}" width="380" height="auto" class="img-fluid" alt="a kid using laptop for studying on tutorselevenplus">
         </div>
      </div>
   </div>

   <section class="fixed_width mb-5 p-2">
      <div class="section_heading mb-lg-4 mb-md-4 mb-2">
         <h2 class="display-5 text-center fw-medium my-2">{{$category['name']}} Subjects</h2>
         <div class="heading_separator mx-auto rounded-pill mb-2"></div>
         <p class="my-3 text-center paragraph_font">Explore the subjects we cover in our {{$category['name']}} tuition programme where we support your journey to success in the 11+ exams!</p>
      </div>
      <div class="row align-items-center justify-content-center">
         <div class="col-lg-6 col-md-6 col-sm-12 my-3">
            <a href="/subject/maths" class="text-decoration-none">
               <div class="subjects d-flex align-items-center shadow rounded-3 p-4 border">
                  <div>
                     <img src="{{url('images/maths.png')}}" width="40" height="40" alt="maths subject icon">
                     <h2 class="my-2 fs-4 text-dark">Maths</h2>
                     @if($category['name'] == 'Year 3')
                     <p class="my-2 text-dark fw-light">Discover the exciting world of maths, where your child will explore different topics and skills, establishing a robust foundation in numbers and problem-solving proficiency.</p>
                     @elseif($category['name'] == 'Year 4')
                     <p class="my-2 text-dark fw-light">Discover the exciting world of maths, where your child will build upon their foundational knowledge of numbers and problem solving skills. They will encounter new topics ahead of their school syllabus, providing them fun filled challenges along the way.</p>
                     @else
                     <p class="my-2 text-dark fw-light">Discover the exciting world of maths, where we emphasise and strengthen core mathematical concepts. With a focus on both speed and accuracy your child will become more confident as they explore different topics and skills.</p>
                     @endif
                  </div>
               </div>
            </a>
         </div>
         <div class="col-lg-6 col-md-6 col-sm-12 my-3">
            <a href="/subject/english" class="text-decoration-none">
               <div class="subjects d-flex align-items-center shadow rounded-3 p-4 border">
                  <div>
                     <img src="{{url('images/english.png')}}" width="40" height="40" alt="english subject icon">
                     <h2 class="my-2 fs-4 text-dark">English</h2>
                     @if($category['name'] == 'Year 3')
                     <p class="my-2 text-dark fw-light">Explore the english language, where your child will learn about reading, writing and communication skills, laying a strong foundation for the coming years.</p>
                     @elseif($category['name'] == 'Year 4')
                     <p class="my-2 text-dark fw-light">Enter the captivating world of the english language, where your child will learn more about reading for comprehension and inference, as well as foundational writing concepts.</p>
                     @else
                     <p class="my-2 text-dark fw-light">Discover the exciting world of maths, where we emphasise and strengthen core mathematical concepts. With a focus on both speed and accuracy your child will become more confident as they explore different topics and skills.</p>
                     @endif
                  </div>
               </div>
            </a>
         </div>
         <div class="col-lg-6 col-md-6 col-sm-12 my-3">
            <a href="/subject/verbal-reasoning" class="text-decoration-none">
               <div class="subjects d-flex align-items-center shadow rounded-3 p-4 border">
                  <div>
                     <img src="{{url('images/verbal_reasoning.png')}}" width="40" height="40" alt="verbal reasoning subject icon">
                     <h2 class="my-2 fs-4 text-dark">Verbal</h2>
                     @if($category['name'] == 'Year 3')
                     <p class="my-2 text-dark fw-light">Develop your child’s verbal reasoning skills, where they will be exposed to new and challenging vocabulary which they can practise regularly</p>
                     @elseif($category['name'] == 'Year 4')
                     <p class="my-2 text-dark fw-light">Our verbal reasoning modules will boost your child’s analytical thinking, they will be taught to think constructively and logically using their ever growing vocabulary. From de-coding complex passages to pattern recognition, our students develop the skills required for success.</p>
                     @else
                     <p class="my-2 text-dark fw-light">Immerse yourself in the exciting world of verbal reasoning, where vocabulary and logic come together like the final pieces of a well crafted puzzle. Through committed practise, students will be more confident with the different techniques they have learned and become and exam ready.</p>
                     @endif
                  </div>
               </div>
            </a>
         </div>
         <div class="col-lg-6 col-md-6 col-sm-12 my-3">
            <a href="/subject/non-verbal-reasoning" class="text-decoration-none">
               <div class="subjects d-flex align-items-center shadow rounded-3 p-4 border">
                  <div>
                     <img src="{{url('images/non_verbal_reasoning.png')}}" width="40" height="40" alt="non-verbal reasoning subject icon">
                     <h2 class="my-2 fs-4 text-dark">Non-Verbal</h2>
                     @if($category['name'] == 'Year 3')
                     <p class="my-2 text-dark fw-light">Introduce your child to the exciting world of non-verbal reasoning, where they will engage in visual activities, enhancing their ability to understand shapes and patterns without using words</p>
                     @elseif($category['name'] == 'Year 4')
                     <p class="my-2 text-dark fw-light">Open your child up to new non-verbal reasoning techniques using different ways of thinking and approaching problems. Enhance spacial awareness whilst learning how to unravel visual puzzles.</p>
                     @else
                     <p class="my-2 text-dark fw-light">Discover the varied world of non-verbal reasoning, where your child will be equipped to learn solutions for the 11+ and beyond.  From solving visual puzzles to enhancing the speed and agility with which they decipher shapes and patterns without using words.</p>
                     @endif
                  </div>
               </div>
            </a>
         </div>
      </div>
   </section>

   <div class="category_section py-5 fixed_width">
      <div class="section_heading mb-lg-4 mb-md-4 mb-2">
         <h2 class="display-5 text-center fw-medium my-2">Why Choose {{$category['name']}}?</h2>
         <div class="heading_separator mx-auto rounded-pill mb-2"></div>
      </div>
      <div class="row m-0 align-items-center my-2 justify-content-center">
         <div class="col-lg-4 col-md-5 col-sm-12 col-12 my-3 text-center">
            <img src="{{url('images/why_choose_us.png')}}" width="350" height="auto" class="img-fluid" alt="a man standing with creative ideas">
         </div>   
         <div class="col-lg-8 col-md-7 col-sm-12 col-12 my-3">
            <h2 class="h3">Pathway to Success</h2>
            @if ($category['name'] == 'Year 3')
               <p class="fs-5 fw-light mb-2">Starting your child in Year 3 provides them the foundations with which to develop essential skills, preparing them for a smooth 11+ journey. This earlier start fosters good study habits and cultivates a passion for reading, laying the groundwork for successful academic progression and pushing them ahead at school. As they progress through Year 3, they will not only acquire necessary skills but also build the confidence needed to navigate the challenges ahead.</p>
            @elseif ($category['name'] == 'Year 4')
               <p class="fs-5 fw-light mb-2">Embarking on Year 4 marks a crucial step for your child's academic journey, allowing them to further refine essential skills for 11+ success. This pivotal year nurtures effective study habits and reinforces a love for reading, ensuring well-rounded development. Year 4 provides an environment for your child to thrive academically and build the confidence needed for the challenges they'll encounter on their educational journey.</p>
            @else
               <p class="fs-5 fw-light mb-2">Stepping into Year 5 is a pivotal moment in your child's academic voyage, enabling them to enhance crucial skills essential for the upcoming 11+ exam. This significant year not only reinforces effective study habits but also deepens their passion for reading, fostering a holistic development. Year 5 acts as a transformative period, equipping your child with the knowledge and confidence to navigate the challenges ahead and excel in their academic pursuits.</p>
            @endif
         </div>
      </div>
   </div> 
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