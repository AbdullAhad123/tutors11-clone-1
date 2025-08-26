<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Section - Parent Sets</title>
    <!-- rel icon -->
    <link rel="icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}">
    <meta name="description" content="{{ app(\App\Settings\SiteSettings::class)->seo_description }}">
    <meta name="author" content="{{ app(\App\Settings\SiteSettings::class)->app_name }}">
    <style>
        .category_card { height: auto; transition: 0.3s; -webkit-user-select: none; background: linear-gradient(#cf7cff, #b639ff) } .category_card:hover { scale: 1.04; } .category_card:hover .category_image_fade { transform: translateY(0%); } .custom_practice_btn { background: #004bb2!important; color: #fff!important; } /* practice */ .practice_card { display: grid; grid-template-columns: minmax(60px, 70px) 1fr; grid-gap: 5px; background-color: #fff; transition: .3s } @media (max-width:425px) { .practice_card { grid-template-columns: minmax(50px, 60px) 1fr !important } } .practice_card:hover { scale: 1.01; box-shadow: -1px 4px 10px 1px #4a4a4a4a !important } .practice_card .practice_grid_child { display: flex; justify-content: start; align-items: center; font-size: 16px } .progress { height: .75rem } @media (max-width:425px) { .practice_progress_parent { width: 100% !important } .practice_subject_image { height: 50px !important; width: 50px !important } .practice_subject_image img { height: 35px !important; width: 35px !important } .progress { height: .5rem } } @media (max-width:425px) { .practice_card_name { font-size: 5vw !important } } @media (max-width:320px) { .practice_card_name { font-size: 5vw !important } } .section_gap { height: auto; width: auto; margin: 5rem auto; } /* Choose your section cards */ .box { display: flex; margin: 25% auto; height: 100px; width: 400px; border-radius: 50px; background-color: white !important; box-shadow: 0 .1rem 2rem rgba(255,255,255,.25); } .avatar { background-image: url(https://www.winhelponline.com/blog/wp-content/uploads/2017/12/user.png); background-position: center; background-size: 80px; height: 80px; width: 80px; border-radius: 100%; background-color: white; position: relative; top: 10px; left: 10px; box-shadow : 0 0 4rem rgba(0,0,0,.25); } .content { padding: 5%; margin: 2%; color: white; } @media only screen and (max-width: 400px) { .box{ margin: 50% auto; height: 100px; width: 100%; } } @media only screen and (max-width: 250px) { .box{ margin: 50% auto; height: 100px; width: 100%; } .content { font-size: 1rem; text-align: center; } } @media only screen and (max-width: 180px) { .content { letter-spacing: .1rem; margin: 15px auto; } .avatar{ display: none; } .box { border-radius: 0; height: auto; } } .practice_Sets{ background:linear-gradient(#f39f3b ,#fd9b25cf) !important; } body{ background-color:#fcfcfc !important; } .sets{ background:linear-gradient(#0083ff, #005ab0)!important; }
    </style>
</head> 
<body>
    @include('sidebar')
    @include('header')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            <li class="breadcrumb-item active" aria-current="page">Resources</li>
            <li class="breadcrumb-item active" aria-current="page">Sets</li>
        </ol>
    </nav>
    @if($successMessage)
        <div class="alert alert-success text-dark my-3">
            <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 50 50" width="30px" height="30px"><path d="M 25 2 C 12.317 2 2 12.317 2 25 C 2 37.683 12.317 48 25 48 C 37.683 48 48 37.683 48 25 C 48 20.44 46.660281 16.189328 44.363281 12.611328 L 42.994141 14.228516 C 44.889141 17.382516 46 21.06 46 25 C 46 36.579 36.579 46 25 46 C 13.421 46 4 36.579 4 25 C 4 13.421 13.421 4 25 4 C 30.443 4 35.393906 6.0997656 39.128906 9.5097656 L 40.4375 7.9648438 C 36.3525 4.2598437 30.935 2 25 2 z M 43.236328 7.7539062 L 23.914062 30.554688 L 15.78125 22.96875 L 14.417969 24.431641 L 24.083984 33.447266 L 44.763672 9.046875 L 43.236328 7.7539062 z"/></svg>
            Custom question set added successfully!
        </div>
    @endif
    <div class="my-3">
        <!-- <div class="d-flex align-items-center justify-content-between mb-5  " style="flex-wrap: wrap;"> -->
        <!--  -->
        <section class="section_gap mt-3">
            <div class="mb-4">
                <h1 class="h2 my-3 text-dark">Customise Question Sets</h1>
                <h2 class="h5 my-3 text-dark fw-light">Create Personalised practise sessions for your child, tailored to concentrate on a particular subject.</h2> 
            </div>
            <!-- <div class="row justify-content-between align-items-center mb-3">
                @foreach ($categories['sections'] as $key => $item)
                    <?php 
                    $first = $item->name;
                    $firstword = substr($first, 0, 1);
                    ?>
                    <div class="col-lg-4 col-md-6 col-sm-12 col-12 m-0 my-3">
                        <a href="/parent-set/skills/{{$categories['slug']}}/{{$item['slug']}}"
                            class="text-decoration-none">
                            <div class="practice_card rounded-3 p-3 position-relative shadow-sm">
                                <div class="practice_title practice_grid_child justify-content-center">
                                    <div class="practice_subject_image d-flex justify-content-center align-items-center rounded-circle"
                                        style="width: 60px;height: 60px;">
                                        @if($key == 0)
                                        <img src="{{url('images\maths.png')}}" height="50"
                                            width="50" alt="subjects icon">
                                        @elseif($key == 1)
                                        <img src="{{url('images\english.png')}}" height="50"
                                            width="50" alt="subjects icon">
                                        @elseif($key == 2)
                                        <img src="{{url('images\verbal_reasoning.png')}}" height="50"
                                            width="50" alt="subjects icon">
                                        @elseif($key == 3)
                                        <img src="{{url('images\non_verbal_reasoning.png')}}" height="50"
                                            width="50" alt="subjects icon">
                                        @endif

                                    </div>
                                </div>
                                <div class="practice_progress practice_grid_child my-1">
                                    <div class="practice_progress_parent ms-2" style="width: 90%;">
                                        <h2 class="h4 mb-1 practice_card_name text-dark">{{$item['name']}}</h2>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div> -->
            <!-- <div class="row align-items-center justify-content-center mb-3">
               <div class="col-lg-4 col-md-6 col-sm-11 my-3 m-0">
                    <div class="practice_Sets text-center rounded-5 bg-white p-4 justify-content-center">
                        <img src="{{url('images/maths-testing.png')}}" width="50" height="50" class="my-2"  alt="">
                        <h2 class="text-white">Maths</h2>
                        <p class="text-white">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nihil, tenetur.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-11 my-3 m-0">
                    <div class="practice_Sets text-center rounded-5 bg-white p-4 justify-content-center">
                        <img src="{{url('images/verbal_reasoning.png')}}"width="50" height="50" class="my-2"   alt="">
                        <h2 class="text-white">Verbal</h2>
                        <p class="text-white">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nihil, tenetur.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-11 my-3 m-0">
                    <div class="practice_Sets text-center rounded-5 bg-white p-4 justify-content-center">
                        <img src="{{url('images/non_verbal_reasoning.png')}}" width="50" height="50" class="my-2"  alt="">
                        <h2 class="text-white">Non-Verbal</h2>
                        <p class="text-white">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nihil, tenetur.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-11 my-3 m-0">
                    <div class="practice_Sets text-center rounded-5 bg-white p-4 justify-content-center">
                        <img src="{{url('images/english.png')}}" width="50" height="50" class="my-2"  alt="">
                        <h2 class="text-white">English</h2>
                        <p class="text-white">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nihil, tenetur.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-11 my-3 m-0">
                    <div class="practice_Sets text-center rounded-5 bg-white p-4 justify-content-center">
                        <img src="{{url('images/science.png')}}" width="50" height="50" class="my-2" alt="">
                        <h2 class="text-white">Science</h2>
                        <p class="text-white">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nihil, tenetur.</p>
                    </div>
                </div>
            </div> -->
        </section>

        <section class="Custom_Sets">
            <div class="row sets rounded-5 align-items-center justify-content-center m-0 p-4">
                    <div class="col-lg-5 col-md-8 col-sm-12">
                        <h3 class="text-white fw-bold fs-1">Unlock Your Potential</h3>
                        <ul class="my-2">
                            <li class="my-2 text-dark fw-light text-white">Click 'Custom Practise' below</li>
                            <li class="my-2 text-dark fw-light text-white">Name your practise for a personal touch</li>
                            <li class="my-2 text-dark fw-light text-white">Choose section, topic, sub-topic, and click 'Proceed'</li>
                            <li class="my-2 text-dark fw-light text-white">Pick a date, tailor question types, set question range</li>
                            <li class="my-2 text-dark fw-light text-white"> Click 'Set Practise' to start your path to success</li>
                         </ul>
                        <div class="my-4 ">
                        <a href="/parent/practice-sets" class="btn p-2 rounded-5 px-3 bg-white text-uppercase text-primary">Custom Practise</a>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-8 col-sm-12 text-center">
                        <img src="{{url('images/practice_image.png')}}" width="500" height="auto" class="img-fluid" alt="an guy playing dart">
                    </div>
                    
             
            </div>

        </section>

    </div>

</body>
</html>
