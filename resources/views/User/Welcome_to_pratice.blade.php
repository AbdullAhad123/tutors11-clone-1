<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Start Practise - {{$practiceSet->title}}</title>
    <link rel="icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}">
    <meta name="description" content="{{ app(\App\Settings\SiteSettings::class)->seo_description }}">
    <meta name="author" content="{{ app(\App\Settings\SiteSettings::class)->app_name }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/fontawesome.min.css" integrity="sha512-siarrzI1u3pCqFG2LEzi87McrBmq6Tp7juVsdmGY1Dr8Saw+ZBAzDzrGwX3vgxX1NkioYNCFOVC0GpDPss10zQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.0/css/boxicons.min.css" integrity="sha512-pVCM5+SN2+qwj36KonHToF2p1oIvoU3bsqxphdOIWMYmgr4ZqD3t5DjKvvetKhXGc/ZG5REYTT6ltKfExEei/Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script>
        function goBack() {
            window.history.back()
        }
    </script>
    <!-- <style>
        .main_contianer{
            background-color: #f6f9ff;
        }
        .practice_results_container {
            min-height: 100vh;
            max-height: fit-content;
            width: auto;
            display: flex;
            align-items: center;
        }

        .result_card {
            height: auto;
            max-width: 600px;
        }

        .result_card_text {
            font-size: 1.1rem;
            line-height: 1.5;
            margin-bottom: 0 !important;
        }

        .main_contianer {
            height: auto;
        }

        .practice_card {
            height: auto;
            width: 100%;
        }

        .result_name {
            height: auto;
            width: auto;
        }

        .result_details {
            height: auto;
            width: auto;
        }

        .image_container {
            height: 350px;
            max-width: 500px;
            min-width: 290px;
        }
        .view_analytics {
            background: #004bb2!important;
            color: #fff!important;
        }
        .font_size_14{
            font-size: 14px;
        }
        .practice_icon
        {
            height: 40px;  
            width: 40px;  
            background-color:#317bc2;
            border:1px solid aliceblue;
            border-radius:50%;
        }
        .test-elements
        {
            color:#ff9900;
        }
        .btn-back,.btn-start{
            background:linear-gradient(45deg, #365cd6, #40a2ff)!important;
        }

        @media (max-width: 991px) {
            .quiz_image {
                display: none;
            }
        }

        .quiz_screen {
            box-shadow: 0px 0px 11px 5px #00000033 !important;
        }
    </style> -->

    <style>
        .start_session_container {
            min-height: 100vh;
            max-height: fit-content;
            width: auto;
        }
        .start_session_card {
            min-height: 600px;
            max-height: fit-content;
        }
        .heading_separator {
            height: 0.3em;
            width: 80px;
            background: #ffb800;
        }
    </style>
</head>

<body>

    <!-- <div class="main_contianer">
        <div class="practice_results_container py-3">
            <div class="result_card col-lg-4 col-md-6 col-sm-10 col-12 mx-auto shadow border rounded-3 bg-white border-dark-subtle px-5 py-4">
                <h4 class="mb-0">{{$practiceSet->title}}</h4>
                
                <p class="fs-6 fw-light">{{$skill->name}} <span class="font_size_14">{{ str_replace("-","/",substr($now, 0, strrpos($practiceSet->created_at, ' ')))}}</span></p>
                @if($set_by)
                    <p class="result_card_text"><span class="text-dark-emphasis fw-medium">Set by:</span> <span class="text-body-secondary fw-normal">{{$set_by}}</span></p>
                @endif
                <hr>
                <div class="result_name text-center">
                    <h5 class="practice_card_name fs-6 py-2 mb-0 text-secondary fw-normal">Questions</h5>
                    <h1 class="fw-bolder">{{$total_questions}}</h1>
                </div>
                <hr>
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-md-10 col-sm-12 col-12 my-2">
                    @if(Request::get('journey') !== null && Request::get('journey') == 1)
                        <a type="button" href="{{route('go_to_journey', ['journeySet' => $practiceSet->slug, 'session' => $session->code])}}" class="btn view_analytics text-uppercase w-100 mb-2">Start now</a>
                    @else
                        <a type="button" href="{{route('go_to_practice', ['practiceSet' => $practiceSet->slug, 'session' => $session->code, 'parentSet' => $parentSet])}}" class="btn view_analytics text-uppercase w-100 mb-2">Start now</a>
                    @endif
                    </div>
                </div>
                
            </div>
        </div>

        <div class="image_container mt-3 col-lg-4 col-md-6 col-sm-10 col-12 text-center mx-auto overflow-hidden">
            <img src="{{url('images\cute_monster.png')}}" width="100%" height="auto" alt="Education Monster" style="-webkit-user-drag: none; -webkit-user-select: none;">
        </div>
    </div> -->
 
    <!-- <div class="main_contianer">
        <div class="practice_results_container p-3">
            <div class="result_card mx-auto shadow  rounded-3 bg-white border-dark-subtle p-3">
                <div class="d-flex justify-content-center align-items-center position-relative">
                    <button class="btn position-absolute start-0 top-50" type="button" value="Back" onclick="goBack()"> <i class="fa fa-arrow-left fa-lg fw-normal" aria-hidden="true"></i></button>
                    <h1 class="fw-semibold my-2 mb-1 h4">{{$practiceSet->title}}</h1>
                </div>
                <h2 class="fw-normal my-1 small text-dark-emphasis text-center">{{$skill->name}} <span>{{ str_replace("-","/",substr($now, 0, strrpos($practiceSet->created_at, ' ')))}}</span></h2>
                @if($set_by)
                    <h2 class="result_card_text"><span class="fw-medium mb-2 small text-dark-emphasis text-center">Set by:</span> <span class="text-body-secondary fw-normal">{{$set_by}}</span></h2>
                @endif

                @if($set_by)
                @endif
                <hr class='my-1'>
                <div class="p-2">
                    <h2 class="fw-bold m-0 py-1 test-elements text-center h3">{{$total_questions}}</h2>
                    <p class="mb-0 text-center h5">Questions</p>
                </div>
                <hr>
                <div>
                    <h2 class="h5 my-2">Instructions</h2>
                    <ul>
                        <li class="small my-1">Find a quiet space free from distractions to enhance your concentration.</li>
                        <li class="small my-1">More you give correct answers more chances to get the badge</li>
                        <li class="small my-1">Approach this practice set as if you were taking the real exam. Follow the same rules and conditions.</li>
                        <li class="small my-1">You must complete this in one session</li>
                    </ul>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-12 col-md-10 col-sm-12 col-12 my-2">
                    @if(Request::get('journey') !== null && Request::get('journey') == 1)
                        <a type="button" href="{{route('go_to_journey', ['journeySet' => $practiceSet->slug, 'session' => $session->code])}}" class="btn view_analytics text-uppercase w-100 mb-2">Start now</a>
                        @else
                        <a type="button" href="{{route('go_to_practice', ['practiceSet' => $practiceSet->slug, 'session' => $session->code, 'parentSet' => $parentSet])}}" class="btn view_analytics text-uppercase w-100 mb-2">Start now</a>
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </div> -->
      
    <!-- <div class="bg-white m-2 m-lg-4 p-4 quiz_screen rounded-5">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-4 col-md-8 col-sm-11">    
                <div class="quiz_image">
                    <img src="{{url('images/practice_instructions.png')}}" class="img-fluid" alt="students standing with laptop in hands for practice" height="auto" width="100%">
                </div>
            </div>
            <div class="col-lg-8 col-12">
                <div class="quiz_content">
                    <div class="quiz image text-center">
                        <img src="{{url('images/stopwatch_icon.png')}}" class="img-fluid" height="70" width="70" alt="">
                        <div class="p-2">
                            <h5 class="fs-5 fw-bold">{{$practiceSet->title}}</h5>
                            <h5 class="fs-6 fw-semibold">{{$skill->name}} <span>{{ str_replace("-","/",substr($now, 0, strrpos($practiceSet->created_at, ' ')))}}</span></h5>  
                        </div>
                        <div class=" d-flex justify-content-center flex-wrap align-items-center">
                            <div class="bg-white rounded-5 shadow p-3 m-2" style="background:radial-gradient(#0083f5, #084ddc) !important">
                                <h6 class="  fw-semibold text-white m-0">Questions: {{$total_questions}}</h6>
                            </div>
                            @if($set_by)
                                <div class="bg-white rounded-5 shadow p-3 m-2" style="background:radial-gradient(#cc890b, #e79700) !important">
                                        <h6 class="fw-semibold text-white m-0">Set by: {{$set_by}}</h6>
                                </div>
                            @endif
                        </div>
                    </div>
                    <h1 class="h3 fw-bold my-1">INSTRUCTIONS:</h1>
                    <div class="instructions p-4">
                        <ul class="p-0">
                            <li class="my-1 fs-5">Find a quiet space free from distractions to enhance your concentration.</li>
                            <li class="my-1 fs-5">The more correct answers you give the more badges you can win.</li>
                            <li class="my-1 fs-5">Approach these questions as if you were taking a real exam.</li>
                            <li class="my-1 fs-5">Try to complete this in one session.</li>
                        </ul>
                    </div>
                    <div class="d-flex justify-content-between  flex-wrap align-items-center">
                        <button onclick="goBack()" class="btn btn-primary d-inline-flex align-items-center text-white fs-5 p-2 px-4 rounded-5"><i class="bx bx-left-arrow-alt fs-5 me-1"></i>Back</button>
                        @if(Request::get('journey') !== null && Request::get('journey') == 1)
                            <a href="{{route('go_to_journey', ['journeySet' => $practiceSet->slug, 'session' => $session->code])}}" type="button" class="btn btn-primary d-inline-flex align-items-center text-white fs-5 p-2 px-4 rounded-5">Start<i class="bx bx-right-arrow-alt ms-1 fs-5"></i></a>
                        @else
                            <a href="{{route('go_to_practice', ['practiceSet' => $practiceSet->slug, 'session' => $session->code, 'parentSet' => $parentSet])}}" type="button" class="btn btn-primary d-inline-flex align-items-center text-white fs-5 p-2 px-4 rounded-5">Start<i class="bx bx-right-arrow-alt ms-1 fs-5"></i></a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div> -->

    <div class="start_session_container d-flex align-items-center justify-content-center p-3">
        <div class="start_session_card bg-white p-4 shadow-lg border rounded-4 container-lg my-4">
            <h1 class="fw-bold h2 mb-2 text-dark text-uppercase text-center">{{$practiceSet->title}}</h1>
            @if(Request::get('journey') !== null && Request::get('journey') == 1)
                <p class="fs-5 text-dark text-center">Welcome to the island of {{$practiceSet->title}}. These practise questions are designed for your success. Let's kickstart your learning journey and excel in the 11+ exams.</p>
            @else 
                <p class="fs-5 text-dark text-center">Welcome to {{$practiceSet->title}}. Let's jumpstart your session to enhance weak areas and conquer the strong ones.</p>
            @endif
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-7 col-md-12 col-sm-12 col-12 my-3">
                    <div class="bg-success-subtle border border-success d-inline-flex fw-medium my-3 p-1 px-2 rounded-pill shadow-sm small text-success">{{$total_questions}} Questions to Attempt @if($set_by) Set by {{$set_by}} @endif</div>
                    <div class="mb-2">
                        <h2 class="fw-medium h4 my-1">Instructions</h2>
                        <div class="heading_separator my-1 rounded-pill"></div>
                    </div>
                    <ol class="ps-4 m-0 my-2 mb-4 list-group">
                        <li class="my-1">Find a quiet space free from distractions to enhance your concentration.</li>
                        <li class="my-1">The more correct answers you give the more badges you can win.</li>
                        <li class="my-1">Approach these questions as if you were taking a real exam.</li>
                        <li class="my-1">Try to complete this in one session.</li>
                    </ol>
                    <div class="mb-2">
                        <h2 class="fw-medium h4 my-1">Useful Tips</h2>
                        <div class="heading_separator my-1 rounded-pill"></div>
                    </div>
                    <ol class="ps-4 m-0 my-2 list-group">
                        <li class="my-1">Press left arrow key <span class="bg-secondary-subtle border border-dark-subtle px-1 rounded shadow-sm"><i class='bx bx-left-arrow-alt' ></i></span> or down arrow key <span class="bg-secondary-subtle border border-dark-subtle px-1 rounded shadow-sm"><i class='bx bx-down-arrow-alt' ></i></span> to navigate to previous question.</li>
                        <li class="my-1">Press right arrow key <span class="bg-secondary-subtle border border-dark-subtle px-1 rounded shadow-sm"><i class='bx bx-right-arrow-alt' ></i></span> or up arrow key <span class="bg-secondary-subtle border border-dark-subtle px-1 rounded shadow-sm"><i class='bx bx-up-arrow-alt' ></i></span> to navigate to next question.</li>
                        <li class="my-1">Press Escape key <span class="bg-secondary-subtle border border-dark-subtle px-1 rounded shadow-sm">Esc</span> to end the current session.</li>
                        <li class="my-1">Press Alt key <span class="bg-secondary-subtle border border-dark-subtle px-1 rounded shadow-sm">Alt</span> to report any issue on the active question.</li>
                    </ol>
                </div>
                <div class="col-lg-5 col-md-12 col-sm-12 col-12 my-3 text-center d-lg-inline-block d-none">
                    <img src="{{ url('images/start_practice_screen.jpg') }}" width="350" height="auto" alt="an illustration of smart kid learning and practicing">
                </div>
            </div>
            <div class="align-items-center d-flex flex-wrap justify-content-center justify-content-sm-end my-3">
                <button onclick="history.back()" class="btn btn-outline-primary px-3 p-2 mx-2 d-inline-flex align-items-center fw-medium my-2"><i class="bx bx-arrow-back"></i> Go back</button>
                @if(Request::get('journey') !== null && Request::get('journey') == 1)
                    <a href="{{route('go_to_journey', ['journeySet' => $practiceSet->slug, 'session' => $session->code])}}" type="button" class="btn btn-primary text-white text-decoration-none px-3 p-2 mx-2 d-inline-flex align-items-center fw-medium my-2">Start Session <i class="bx bx-arrow-back bx-rotate-180"></i></a>
                    @else
                    <a href="{{route('go_to_practice', ['practiceSet' => $practiceSet->slug, 'session' => $session->code, 'parentSet' => $parentSet])}}" type="button" class="btn btn-primary text-white text-decoration-none px-3 p-2 mx-2 d-inline-flex align-items-center fw-medium my-2">Start Session <i class="bx bx-arrow-back bx-rotate-180"></i></a>
                @endif
            </div>
        </div>
    </div>
        
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>