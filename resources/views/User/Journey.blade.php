<!DOCTYPE html>
<html>
    <head>
        <title>My Journey - Student Portal - Tutors 11 Plus</title>
        <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css" as="style">
        <link rel="preload" href="{{url('Frontend_css/assets/fonts/boxicons.css')}}" as="font">
        <link rel="shortcut icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}" type="image/x-icon">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/js/bootstrap.min.js" integrity="sha512-a6ctI6w1kg3J4dSjknHj3aWLEbjitAXAjLDRUxo2wyYmDFRcz2RJuQr5M3Kt8O/TtUSp8n2rAyaXYy1sjoKmrQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <link rel="stylesheet" href="{{url('Frontend_css/assets/fonts/boxicons.css')}}">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <style>
            ::-webkit-scrollbar{width:8px!important}::-webkit-scrollbar-thumb{background:#ff9c00}::-webkit-scrollbar-track{background:#ffffff40}.go_back{box-shadow:0 0 6px 7px rgb(0 0 0 / 50%)}#journey{padding:15px 0}#journey h2{font-size:34px;letter-spacing:-.5px;color:#16141a;position:relative;display:inline-block}#journey h2::before{content:"";position:absolute;right:-3px;bottom:5px;z-index:-1;width:123px;height:16px;background-color:#ece5ff}#journey .timeline-holder{padding:75px 0 0}#journey .timeline-holder svg{margin:auto;-webkit-backface-visibility:hidden;backface-visibility:hidden}#journey .timeline-holder .mask-path{-webkit-transform:translate(329px,1403px);transform:translate(329px,1403px);stroke:#fff;stroke-dasharray:10000;stroke-dashoffset:10000}#journey .timeline-holder .path-holder{max-width:700px;position:relative;margin-left:auto}#journey .timeline-holder .year-box{position:absolute;display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-align:center;-ms-flex-align:center;align-items:center;-webkit-box-pack:center;-ms-flex-pack:center;justify-content:center;height:auto}#journey .timeline-holder .year-box .text{text-align:left;margin-right:10%}#journey .timeline-holder .year-box .text h3{font-size:18px;letter-spacing:-.18px;color:#5d36a9}#journey .timeline-holder .year-box .text h4{font-size:26px;font-weight:400;letter-spacing:-.26px;color:#16141a}#journey .timeline-holder .year-box .logo{position:relative;text-align:center}#journey .timeline-holder .year-box .logo .logo-holder{padding:3px;font-size:30px;display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-align:center;-ms-flex-align:center;align-items:center;-webkit-box-pack:center;-ms-flex-pack:center;justify-content:center;width:170px;height:170px;border-radius:100%;border:7px solid #ff9c00;background-color:#fff}.yb-2021{z-index:1}#journey .timeline-holder .year-box.yb-2020 img{max-width:150px;bottom:0}#journey .timeline-holder .year-box.yb-2020{top:8.5%;width:75%;left:3%}#journey .timeline-holder .year-box.yb-2020 .text{-webkit-transform:translate(-5%,-140%);transform:translate(-5%,-140%)}#journey .timeline-holder .year-box.yb-2020 .logo::before{top:7%;right:6%;left:auto;-webkit-transform:translateY(-50%) rotate(129deg);transform:translateY(-50%) rotate(129deg)}#journey .timeline-holder .year-box.yb-2019{top:18.5%;width:70%;left:-5%}#journey .timeline-holder .year-box.yb-2019 img{max-width:120px}#journey .timeline-holder .year-box.yb-2019-2 img{max-width:130px}#journey .timeline-holder .year-box.yb-2019 .text{-webkit-transform:translate(172%,-110%);transform:translate(172%,-110%)}#journey .timeline-holder .year-box.yb-2019 .logo::before{top:-4%;right:43%;left:auto;-webkit-transform:translateY(-50%) rotate(90deg);transform:translateY(-50%) rotate(90deg)}#journey .timeline-holder .year-box.yb-2019-2{top:20%;width:50%;left:70%}#journey .timeline-holder .year-box.yb-2019-2 .text{-webkit-transform:translate(-248%,73%);transform:translate(-248%,73%)}#journey .timeline-holder .year-box.yb-2019-2 .logo::before{top:86%;left:1%;right:auto;-webkit-transform:translateY(-50%) rotate(319deg);transform:translateY(-50%) rotate(319deg)}#journey .timeline-holder .year-box.yb-2018{top:28%;width:75%;left:-16%}#journey .timeline-holder .year-box.yb-2018 img{max-width:80px}#journey .timeline-holder .year-box.yb-2018-2 img{max-width:115px}#journey .timeline-holder .year-box.yb-2018 .text{-webkit-transform:translate(185%,210%);transform:translate(185%,210%)}#journey .timeline-holder .year-box.yb-2018 .logo::before{top:86%;right:1%;left:auto;-webkit-transform:translateY(-50%) rotate(223deg);transform:translateY(-50%) rotate(223deg)}#journey .timeline-holder .year-box.yb-2018-2{top:38%;width:75%;left:10%}#journey .timeline-holder .year-box.yb-2018-2 .text{-webkit-transform:translate(-373%,29%);transform:translate(-373%,29%)}#journey .timeline-holder .year-box.yb-2018-2 .logo::before{top:86%;left:1%;right:auto;-webkit-transform:translateY(-50%) rotate(319deg);transform:translateY(-50%) rotate(319deg)}#journey .timeline-holder .year-box.yb-2018-3{top:47.5%;width:75%;left:25%}#journey .timeline-holder .year-box.yb-2018-3 img{max-width:200px}#journey .timeline-holder .year-box.yb-2018-3 .text{-webkit-transform:translate(58%,-143%);transform:translate(58%,-143%)}#journey .timeline-holder .year-box.yb-2018-3 .logo .logo-holder{border:10px solid #e6eaeb}#journey .timeline-holder .year-box.yb-2018-3 .logo::before{border-color:transparent #e6eaeb transparent transparent;top:-4%;right:43%;left:auto;-webkit-transform:translateY(-50%) rotate(90deg);transform:translateY(-50%) rotate(90deg)}#journey .timeline-holder .year-box.yb-2017{top:57%;width:75%;left:-20%}#journey .timeline-holder .year-box.yb-2017 img{max-width:180px}#journey .timeline-holder .year-box.yb-2017 .text{-webkit-transform:translate(112%,-158%);transform:translate(112%,-158%)}#journey .timeline-holder .year-box.yb-2017 .logo::before{top:-4%;right:43%;left:auto;-webkit-transform:translateY(-50%) rotate(90deg);transform:translateY(-50%) rotate(90deg)}#journey .timeline-holder .year-box.yb-2016{top:66.5%;width:75%;left:25%}#journey .timeline-holder .year-box.yb-2016 img{max-width:140px}#journey .timeline-holder .year-box.yb-2016 .text{-webkit-transform:translate(50%,-123%);transform:translate(50%,-123%)}#journey .timeline-holder .year-box.yb-2016 .logo .logo-holder{border:10px solid #e6eaeb}#journey .timeline-holder .year-box.yb-2016 .logo::before{border-color:transparent #e6eaeb transparent transparent;top:-4%;right:43%;left:auto;-webkit-transform:translateY(-50%) rotate(90deg);transform:translateY(-50%) rotate(90deg)}#journey .timeline-holder .year-box.yb-2016-2{top:76.5%;width:75%;left:-18%}#journey .timeline-holder .year-box.yb-2016-2 img{max-width:120px}#journey .timeline-holder .year-box.yb-2016-2 .text{-webkit-transform:translate(100%,-175%);transform:translate(100%,-175%)}#journey .timeline-holder .year-box.yb-2016-2 .logo .logo-holder{border:10px solid #e6eaeb}#journey .timeline-holder .year-box.yb-2016-2 .logo::before{border-color:transparent #e6eaeb transparent transparent;top:-4%;right:43%;left:auto;-webkit-transform:translateY(-50%) rotate(90deg);transform:translateY(-50%) rotate(90deg)}#journey .timeline-holder .year-box.yb-2014{top:86%;width:75%;left:26%}#journey .timeline-holder .year-box.yb-2014 img{max-width:225px}#journey .timeline-holder .year-box.yb-2014 .text{-webkit-transform:translate(26%,-124%);transform:translate(26%,-124%)}#journey .timeline-holder .year-box.yb-2014 .logo .logo-holder{border:10px solid #e6eaeb}#journey .timeline-holder .year-box.yb-2014 .logo::before{border-color:transparent #e6eaeb transparent transparent;top:-4%;right:43%;left:auto;-webkit-transform:translateY(-50%) rotate(90deg);transform:translateY(-50%) rotate(90deg)}#journey .timeline-holder .year-box.yb-2011{top:96%;width:75%;left:-18%}#journey .timeline-holder .year-box.yb-2011 img{max-width:160px}#journey .timeline-holder .year-box.yb-2011 .text{-webkit-transform:translate(222%,10%);transform:translate(222%,10%)}#journey .timeline-holder .year-box.yb-2011 .logo .logo-holder{border:10px solid #e6eaeb}#journey .timeline-holder .year-box.yb-2011 .logo::before{border-color:transparent #e6eaeb transparent transparent;top:52%;right:-12%;left:auto;-webkit-transform:translateY(-50%) rotate(180deg);transform:translateY(-50%) rotate(180deg)}#journey .timeline-holder .yearbook{position:relative;display:inline-block}#journey .timeline-holder .yearbook ul{position:relative;font-size:15px;font-weight:400;line-height:2.83;letter-spacing:-.18px;color:#16141a;padding:0;margin:0}#journey .timeline-holder .yearbook ul li{list-style:none}#journey .timeline-holder .yearbook ul li a{color:#000;text-decoration:none;text-shadow:0 0 5px #fff;background:#fff;padding:1px 7px;border-radius:4px;box-shadow:0 0 8px 4px #000}#journey .timeline-holder .yearbook ul li.active a{color:#a381fb}#journey .timeline-holder .yearbook ul::before{content:"";position:absolute;width:16px;height:100%;opacity:.42;right:-50%;border-radius:4px;background-color:#dfdcfe}#journey .timeline-holder .yearbook .indicator{-webkit-transition:-webkit-transform 0.4s;transition:-webkit-transform 0.4s;transition:transform 0.4s;transition:transform 0.4s,-webkit-transform 0.4s;position:absolute;top:7px;right:-65%;width:28px;height:28px;border:3px solid #3f7e14;background-color:#fff;border-radius:100%;display:none}#journey .timeline-holder .yearbook .indicator::before{content:"";position:absolute;left:-10px;top:50%;-webkit-transform:translateY(-50%);transform:translateY(-50%);width:0;height:0;border-style:solid;border-width:5px 10px 5px 0;border-color:transparent #3f7e14 transparent transparent}@media only screen and (min-width:992px){#journey{padding:15px 0 0}#journey h2{font-size:50px}#journey h2::before{right:-23px;bottom:-6px;width:195px;height:36px}#journey .timeline-holder{padding:100px 0 0}#journey .timeline-holder .wrap-yearbook{position:relative}#journey .timeline-holder .year-box.yb-2020 .logo .logo-holder{font-size:56px}#journey .timeline-holder .year-box.yb-2020 .logo .logo-holder small{font-size:34px}#journey .timeline-holder .year-box.yb-2019-2 .logo .logo-holder{font-size:56px}#journey .timeline-holder .year-box.yb-2019-2 .logo .logo-holder small{font-size:34px}#journey .timeline-holder .year-box.yb-2018-2 .logo .logo-holder{font-size:56px}#journey .timeline-holder .yearbook{position:-webkit-sticky;position:sticky;top:100px}#journey .timeline-holder .yearbook ul{font-size:18px}#journey .timeline-holder .yearbook ul::before{right:-80%}#journey .timeline-holder .yearbook .indicator{right:-95%;display:block}}.cursor_not_allowed{cursor: not-allowed}
            /* .level_shade {
                background: #dfdfdfd4;
                height: 100%;
                width: 100%;
                border-radius: 50rem;
                position: absolute;top: 0;right: 0;left: 0;bottom: 0;
                display: flex; align-items: center; justify-content: center;
            } */

            .wave_parent {
                height: 100%;
                width: 100%;
                position: absolute; top: 0;left: 0;bottom: 0;
                border-radius: 50rem;
                z-index: 0;
            }

            .wave {
                background-color: #7fcfff;
                position: absolute;
                height: 200%;
                width: 200%;
                border-radius: 38%;
                left: -50%;
                transform: rotate(360deg);
                transition: all 5s ease;
                animation: wave 180s linear infinite;
            }
            @keyframes wave {
                0% { transform: rotate(0deg); }
                100% { transform: rotate(3600deg); }
            }
        </style>
    </head>
    <body style=" background-image: linear-gradient(359deg , #00000042 , #0000001f) ,  url('{{url($journey['theme_img_path'])}}');
                @if(!$journey['repeat_theme'])
                    background-size: cover;
                    background-position: center;
                @endif
            ">
        <section id="journey" class="pb-5 overflow-hidden">
            <div class="container">
                <div class="mx-4 mx-md-5 my-4 position-fixed start-0">
                    <a class="bg-white border-0 go_back p-2 rounded-circle shadow text-danger" href="/dashboard" type="button">
                        <i class="bx bx-log-out-circle position-relative fs-2" style="right: 2px;"></i>
                    </a>
                </div>
                <div class="text-center">
                    @if (Session::has('errorMessage'))
                        <p class="alert alert-danger d-inline fs-5 fw-light rounded-3 shadow-sm">{{Session::get('errorMessage')}}</p>
                    @endif
                </div>
                <!-- <h2>Our Journey</h2> -->


                <div class="row timeline-holder">
                    <div class="col-12">
                        <div class="path-holder m-auto">
                            <!-- Year Boxes -->
                            @foreach($journey->levels as $key => $level)
                                <div id="yb-2021" data-position="{{$level->position}}" class="year-box yb-2021 w-75">
                                    <img class="position-relative" src="{{url($level->img_path)}}" style="max-width: {{$level->img_width}}px;top: {{$level->img_position_y}}px;right: {{$level->img_position_x}}px;" alt="level_{{++$key}}">
                                    <div class="logo">
                                        @if(isset($level->set) && $level->set && $level->set['session_status'] != 'completed')
                                            @if($level->set['level_locked'])
                                                @if(floatval($levels_completed[$key - 2]) > 0)
                                                    <a class="logo-holder text-dark text-decoration-none position-relative" href="{{ route('init_journey_set', ['journeySet' => $level->set['slug'], 'journey' => true]) }}">
                                                        <div style="position: relative; top: -5px; z-index: 1 !important;">
                                                            <div class="d-inline-flex m-0 px-2 rounded text-center" style="background: #fff6ca;color: #ff8900;font-size: 14px !important">{{round($levels_completed[$key - 1])}}%</div>
                                                            <div class="level_title_name" style="font-size: inherit; font-weight: 500;">
                                                                {{$level->set['title']}}
                                                            </div>
                                                        </div>
                                                        <div class="wave_parent overflow-hidden">
                                                            <div class="wave" style="top: calc(100% - {{$levels_completed[$key - 1]}}%);"></div>
                                                        </div>
                                                    </a>
                                                @else
                                                    <div class="logo-holder text-dark text-decoration-none cursor_not_allowed locked_level">
                                                        <div style="position: relative; top: -5px;">
                                                            <div class="d-inline-flex m-0 px-2 rounded text-center" style="background: #ffd2d2;color: #940303;font-size: 14px !important">Locked</div>
                                                            <div  class="level_title_name" style="font-size: inherit; font-weight: 500">
                                                                {{$level->set['title']}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button type="button" class="btn btn-primary open_locked_modal visually-hidden" data-bs-toggle="modal" data-bs-target="#locked_modal">Open</button>
                                                @endif
                                            @else
                                                @if($key <= 1 || round($levels_completed[$key - 2]) > 0)
                                                    <a class="logo-holder text-dark text-decoration-none  position-relative" href="{{ route('init_journey_set', ['journeySet' => $level->set['slug'], 'journey' => true]) }}">                            
                                                        <div style="position: relative; top: -5px; z-index: 1 !important;">
                                                            <div class="d-inline-flex m-0 px-2 rounded text-center" style="background: #fff6ca;color: #ff8900;font-size: 14px !important">{{round($levels_completed[$key - 1])}}%</div>
                                                            <div class="level_title_name" style="font-size: inherit; font-weight: 500;">
                                                                {{$level->set['title']}}
                                                            </div>
                                                        </div>
                                                        <div class="wave_parent overflow-hidden">
                                                            <div class="wave" style="top: calc(100% - {{$levels_completed[$key - 1]}}%);"></div>
                                                        </div>
                                                    </a>
                                                @else
                                                    <div class="logo-holder text-dark text-decoration-none cursor_not_allowed locked_level">
                                                        <div style="position: relative; top: -5px;">
                                                            <div class="d-inline-flex m-0 px-2 rounded text-center" style="background: #ffd2d2;color: #940303;font-size: 14px !important">Locked</div>
                                                            <div  class="level_title_name" style="font-size: inherit; font-weight: 500">
                                                                {{$level->set['title']}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button type="button" class="btn btn-primary open_locked_modal visually-hidden" data-bs-toggle="modal" data-bs-target="#locked_modal">Open</button>
                                                @endif
                                            @endif
                                            @else
                                            @if($level->sets_count > 0)
                                                <div class="logo-holder border-success position-relative finished_level">
                                                    <div style="position: relative; top: -5px;">
                                                        <div class="d-inline-flex m-0 px-2 rounded text-center" style="background: #caffd6;color: #007a1c;font-size: 14px !important">Finished</div>
                                                        <div class="level_title_name" style="font-size: inherit; font-weight: 500">
                                                            {{$level->set['title']}}
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="button" class="btn btn-primary open_finished_modal visually-hidden" data-bs-toggle="modal" data-bs-target="#finished_modal">Open</button>
                                            @else
                                                <div class="logo-holder" >                            
                                                    <div class="w-100 h-100" style="background-image: url(https://cdn-icons-png.flaticon.com/512/6320/6320322.png);background-size: 55%;background-repeat: no-repeat;background-position: center;"></div>
                                                </div>
                                            @endif
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                            <!-- Year Boxes -->
                            @for ($i = 0; $i <= $svg_count; $i++)
                                @if($i == 0)
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 749.83 3559.13" enable-background="new 0 0 749.83 3559.13" xml:space="preserve">
                                        <path id="Default" transform="translate(-329 -1402.078)" fill="none" stroke="#E6EAEB" stroke-width="8" stroke-miterlimit="10" d="M 860.26 3149.84 l -320.93 -0.35 c -102.4 0 -185.42 93.59 -185.42 209.04 s 83.09 213.47 187.09 205.47 M 541 3564 L 860 3562 M 864.35 3185.88 l -320.88 0.48 c -84.33 0 -152.7 77.09 -152.7 172.19 s 68.37 172.19 152.7 172.19 M 543 3531 L 865 3526 M 868.5 3222.73 l -320.93 -0.35 c -66.7 0 -120.76 60.96 -120.76 136.15 s 54.07 136.15 120.76 136.15 M 547 3495 L 869 3489 M 871.42 2804.65 h -205 M 861.42 2877.55 h -195 M 866.42 2841.55 h -188 M 547.57 2116.89 c -66.7 0 -120.76 -60.96 -120.76 -136.15 c 0 -75.2 54.07 -136.15 120.76 -136.15 l 320.93 0.35 c 102.4 0 185.42 -93.59 185.42 -209.04 s -83.01 -209.04 -185.42 -209.04 M 543.48 2152.92 c -84.33 0 -152.7 -77.09 -152.7 -172.19 s 68.37 -172.19 152.7 -172.19 l 320.88 -0.48 c 84.33 0 152.7 -77.09 152.7 -172.19 s -68.37 -172.19 -150.06 -171.87 M 539.33 2189.78 c -102.4 0 -185.42 -93.59 -185.42 -209.04 s 83.01 -209.04 185.42 -209.04 l 320.93 0.35 c 66.7 0 120.76 -60.96 120.76 -136.15 s -54.07 -136.15 -115.02 -136.9 M 860.26 2187.16 c 66.7 0 120.76 60.96 120.76 136.15 s -54.07 136.15 -120.76 136.15 l -320.93 -0.35 c -102.4 0 -185.42 93.59 -185.42 209.04 s 83.01 209.04 185.42 209.04 M 864.35 2151.12 c 84.33 0 152.7 77.09 152.7 172.19 s -68.37 172.19 -152.7 172.19 l -320.88 0.48 c -84.33 0 -152.7 77.09 -152.7 172.19 s 68.37 172.19 152.7 172.19 M 868.5 2114.26 c 102.4 0 185.42 93.59 185.42 209.04 s -83.01 209.04 -185.42 209.04 L 547.57 2532 c -66.7 0 -120.76 60.96 -120.76 136.15 s 54.07 136.15 120.76 136.15 M 871.42 2114.26 Q 709.21 2115.63 547 2117 M 861.42 2187.16 Q 700.21 2188.58 539 2190 M 866.42 2151.16 Q 705.21 2152.08 543 2153 M 860.26 2877.54 c 66.7 0 120.76 60.96 120.76 136.15 s -54.07 136.15 -120.76 136.15 M 864.35 2841.51 c 84.33 0 152.7 77.09 152.7 172.19 s -68.37 172.19 -152.7 172.19 M 868.5 2804.65 c 102.4 0 185.42 93.59 185.42 209.04 s -83.01 209.04 -185.42 209.04 M 871.42 2804.65 h -324.42 M 861.42 2877.55 h -322.42 M 866.42 2841.55 h -188 Q 610.71 2840.775 543 2840 M 860 3562 c 66.7 0 120.76 60.96 120.76 136.15 s -54.07 136.15 -120.76 136.15 l -320.93 -0.35 c -102.4 0 -185.42 93.59 -185.42 209.04 c 0 115.45 83.01 209.04 185.42 209.04 M 539 4252 L 861 4248 M 865 3526 c 84.33 0 152.7 77.09 152.7 172.19 s -68.37 172.19 -152.7 172.19 l -320.88 0.48 c -84.33 0 -152.7 77.09 -152.7 172.19 c 0 95.09 68.37 172.19 152.7 172.19 M 543 4215 L 865 4212 M 868.5 3488.54 c 102.4 0 185.42 93.59 185.42 209.04 s -83.01 209.04 -185.42 209.04 l -320.93 -0.35 c -66.7 0 -120.76 60.96 -120.76 136.15 s 54.07 136.15 120.76 136.15 M 547 4179 L 870 4175 M 860.26 4248.24 c 66.7 0 120.76 60.96 120.76 136.15 c 0 75.2 -54.07 136.15 -120.76 136.15 l -320.93 -0.35 c -102.4 0 -185.42 93.59 -185.42 209.04 c 0 115.45 83.01 209.04 185.42 209.04 M 539 4938 L 869 4939 M 864.35 4212.21 c 84.33 0 152.7 77.09 152.7 172.19 c 0 95.1 -68.37 172.19 -152.7 172.19 l -320.88 0.48 c -84.33 0 -152.7 77.09 -152.7 172.19 c 0 95.1 68.37 172.19 152.7 172.19 M 543 4901 L 868 4901 M 868.5 4175.35 c 102.4 0 185.42 93.59 185.42 209.04 c 0 115.45 -83.01 209.04 -185.42 209.04 l -320.93 -0.35 c -66.7 0 -120.76 60.96 -120.76 136.15 c 0 75.19 54.07 136.15 120.76 136.15 M 547 4865 H 869"></path>
                                        <path mask="url('#mask')" id="Active" transform="translate(-329 -1402.078)" fill="none" stroke="{{$journey->moving_line_color}}" stroke-width="8" stroke-miterlimit="10" d="M 860.26 3149.84 l -320.93 -0.35 c -102.4 0 -185.42 93.59 -185.42 209.04 s 83.09 213.47 187.09 205.47 M 541 3564 L 860 3562 M 864.35 3185.88 l -320.88 0.48 c -84.33 0 -152.7 77.09 -152.7 172.19 s 68.37 172.19 152.7 172.19 M 543 3531 L 865 3526 M 868.5 3222.73 l -320.93 -0.35 c -66.7 0 -120.76 60.96 -120.76 136.15 s 54.07 136.15 120.76 136.15 M 547 3495 L 869 3489 M 871.42 2804.65 h -205 M 861.42 2877.55 h -195 M 866.42 2841.55 h -188 M 547.57 2116.89 c -66.7 0 -120.76 -60.96 -120.76 -136.15 c 0 -75.2 54.07 -136.15 120.76 -136.15 l 320.93 0.35 c 102.4 0 185.42 -93.59 185.42 -209.04 s -83.01 -209.04 -185.42 -209.04 M 543.48 2152.92 c -84.33 0 -152.7 -77.09 -152.7 -172.19 s 68.37 -172.19 152.7 -172.19 l 320.88 -0.48 c 84.33 0 152.7 -77.09 152.7 -172.19 s -68.37 -172.19 -150.06 -171.87 M 539.33 2189.78 c -102.4 0 -185.42 -93.59 -185.42 -209.04 s 83.01 -209.04 185.42 -209.04 l 320.93 0.35 c 66.7 0 120.76 -60.96 120.76 -136.15 s -54.07 -136.15 -115.02 -136.9 M 860.26 2187.16 c 66.7 0 120.76 60.96 120.76 136.15 s -54.07 136.15 -120.76 136.15 l -320.93 -0.35 c -102.4 0 -185.42 93.59 -185.42 209.04 s 83.01 209.04 185.42 209.04 M 864.35 2151.12 c 84.33 0 152.7 77.09 152.7 172.19 s -68.37 172.19 -152.7 172.19 l -320.88 0.48 c -84.33 0 -152.7 77.09 -152.7 172.19 s 68.37 172.19 152.7 172.19 M 868.5 2114.26 c 102.4 0 185.42 93.59 185.42 209.04 s -83.01 209.04 -185.42 209.04 L 547.57 2532 c -66.7 0 -120.76 60.96 -120.76 136.15 s 54.07 136.15 120.76 136.15 M 871.42 2114.26 Q 709.21 2115.63 547 2117 M 861.42 2187.16 Q 700.21 2188.58 539 2190 M 866.42 2151.16 Q 705.21 2152.08 543 2153 M 860.26 2877.54 c 66.7 0 120.76 60.96 120.76 136.15 s -54.07 136.15 -120.76 136.15 M 864.35 2841.51 c 84.33 0 152.7 77.09 152.7 172.19 s -68.37 172.19 -152.7 172.19 M 868.5 2804.65 c 102.4 0 185.42 93.59 185.42 209.04 s -83.01 209.04 -185.42 209.04 M 871.42 2804.65 h -324.42 M 861.42 2877.55 h -322.42 M 866.42 2841.55 h -188 Q 610.71 2840.775 543 2840 M 860 3562 c 66.7 0 120.76 60.96 120.76 136.15 s -54.07 136.15 -120.76 136.15 l -320.93 -0.35 c -102.4 0 -185.42 93.59 -185.42 209.04 c 0 115.45 83.01 209.04 185.42 209.04 M 539 4252 L 861 4248 M 865 3526 c 84.33 0 152.7 77.09 152.7 172.19 s -68.37 172.19 -152.7 172.19 l -320.88 0.48 c -84.33 0 -152.7 77.09 -152.7 172.19 c 0 95.09 68.37 172.19 152.7 172.19 M 543 4215 L 865 4212 M 868.5 3488.54 c 102.4 0 185.42 93.59 185.42 209.04 s -83.01 209.04 -185.42 209.04 l -320.93 -0.35 c -66.7 0 -120.76 60.96 -120.76 136.15 s 54.07 136.15 120.76 136.15 M 547 4179 L 870 4175 M 860.26 4248.24 c 66.7 0 120.76 60.96 120.76 136.15 c 0 75.2 -54.07 136.15 -120.76 136.15 l -320.93 -0.35 c -102.4 0 -185.42 93.59 -185.42 209.04 c 0 115.45 83.01 209.04 185.42 209.04 M 539 4938 L 869 4939 M 864.35 4212.21 c 84.33 0 152.7 77.09 152.7 172.19 c 0 95.1 -68.37 172.19 -152.7 172.19 l -320.88 0.48 c -84.33 0 -152.7 77.09 -152.7 172.19 c 0 95.1 68.37 172.19 152.7 172.19 M 543 4901 L 868 4901 M 868.5 4175.35 c 102.4 0 185.42 93.59 185.42 209.04 c 0 115.45 -83.01 209.04 -185.42 209.04 l -320.93 -0.35 c -66.7 0 -120.76 60.96 -120.76 136.15 c 0 75.19 54.07 136.15 120.76 136.15 M 547 4865 H 869"></path>
                                        <defs>
                                        <mask id="mask">
                                            <path class="mask-path" fill="none" stroke="#5EFF5C" stroke-width="83" stroke-miterlimit="10" d="M 535.4 61.6 c 84.3 0 152.7 77 152.7 172.1 s -68.4 172.2 -152.7 172.2 l -320.9 0.5 c -84.3 0 -152.7 77.1 -152.7 172.2 s 68.4 172.2 152.7 172.2 l 144.9 -1.8 h 178 l -2.1 0 C 619.7 749 688 826 688 921.1 s -68.4 172.2 -152.7 172.2 l -320.9 0.5 c -84.3 0 -152.7 77.1 -152.7 172.2 s 68.4 172.2 152.7 172.2 l 134.9 1.2 h 188 h -188 l 185.9 0 c 84.3 0 152.7 77.1 152.7 172.2 s -68.4 172.2 -152.7 172.2 l -320.9 0.5 c -84.3 0 -152.7 77.1 -152.7 172.2 s 68.4 172.2 152.7 172.2 l 19.6 -5.3 h 303.3 l -2.1 0 c 84.3 0 152.7 77.1 152.7 172.2 s -68.4 172.2 -152.7 172.2 l -320.9 0.5 c -84.3 0 -152.7 77.1 -152.7 172.2 s 68.4 172.2 152.7 172.2 l 19.6 -2.4 h 303.3 l -2.1 0 c 84.3 0 152.7 77.1 152.7 172.2 s -68.4 172.2 -152.7 172.2 l -320.9 0.5 c -84.3 0 -152.7 77.1 -152.7 172.2 s 68.4 172.2 152.7 172.2 L 543 3498" style="stroke-dashoffset: 1552;"></path>
                                        </mask>
                                        </defs>
                                    </svg>
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 749.83 3559.13" enable-background="new 0 0 749.83 3559.13" xml:space="preserve" style="top: -{{$i * 113}}px;right: -1px;position: relative;z-index: 0;">
                                        <path id="Default" transform="translate(-329 -1402.078)" fill="none" stroke="#E6EAEB" stroke-width="8" stroke-miterlimit="10" d="M 860.26 3149.84 l -320.93 -0.35 c -102.4 0 -185.42 93.59 -185.42 209.04 s 83.09 213.47 187.09 205.47 M 541 3564 L 860 3562 M 864.35 3185.88 l -320.88 0.48 c -84.33 0 -152.7 77.09 -152.7 172.19 s 68.37 172.19 152.7 172.19 M 543 3531 L 865 3526 M 868.5 3222.73 l -320.93 -0.35 c -66.7 0 -120.76 60.96 -120.76 136.15 s 54.07 136.15 120.76 136.15 M 547 3495 L 869 3489 M 871.42 2804.65 h -205 M 861.42 2877.55 h -195 M 866.42 2841.55 h -188 M 547.57 2116.89 c -66.7 0 -120.76 -60.96 -120.76 -136.15 c 0 -75.2 54.07 -136.15 120.76 -136.15 l 320.93 0.35 c 102.4 0 185.42 -93.59 185.42 -209.04 s -83.01 -209.04 -185.42 -209.04 M 543.48 2152.92 c -84.33 0 -152.7 -77.09 -152.7 -172.19 s 68.37 -172.19 152.7 -172.19 l 320.88 -0.48 c 84.33 0 152.7 -77.09 152.7 -172.19 s -68.37 -172.19 -150.06 -171.87 M 539.33 2189.78 c -102.4 0 -185.42 -93.59 -185.42 -209.04 s 83.01 -209.04 185.42 -209.04 l 320.93 0.35 c 66.7 0 120.76 -60.96 120.76 -136.15 s -54.07 -136.15 -115.02 -136.9 M 860.26 2187.16 c 66.7 0 120.76 60.96 120.76 136.15 s -54.07 136.15 -120.76 136.15 l -320.93 -0.35 c -102.4 0 -185.42 93.59 -185.42 209.04 s 83.01 209.04 185.42 209.04 M 864.35 2151.12 c 84.33 0 152.7 77.09 152.7 172.19 s -68.37 172.19 -152.7 172.19 l -320.88 0.48 c -84.33 0 -152.7 77.09 -152.7 172.19 s 68.37 172.19 152.7 172.19 M 868.5 2114.26 c 102.4 0 185.42 93.59 185.42 209.04 s -83.01 209.04 -185.42 209.04 L 547.57 2532 c -66.7 0 -120.76 60.96 -120.76 136.15 s 54.07 136.15 120.76 136.15 M 871.42 2114.26 Q 709.21 2115.63 547 2117 M 861.42 2187.16 Q 700.21 2188.58 539 2190 M 866.42 2151.16 Q 705.21 2152.08 543 2153 M 860.26 2877.54 c 66.7 0 120.76 60.96 120.76 136.15 s -54.07 136.15 -120.76 136.15 M 864.35 2841.51 c 84.33 0 152.7 77.09 152.7 172.19 s -68.37 172.19 -152.7 172.19 M 868.5 2804.65 c 102.4 0 185.42 93.59 185.42 209.04 s -83.01 209.04 -185.42 209.04 M 871.42 2804.65 h -324.42 M 861.42 2877.55 h -322.42 M 866.42 2841.55 h -188 Q 610.71 2840.775 543 2840 M 860 3562 c 66.7 0 120.76 60.96 120.76 136.15 s -54.07 136.15 -120.76 136.15 l -320.93 -0.35 c -102.4 0 -185.42 93.59 -185.42 209.04 c 0 115.45 83.01 209.04 185.42 209.04 M 539 4252 L 861 4248 M 865 3526 c 84.33 0 152.7 77.09 152.7 172.19 s -68.37 172.19 -152.7 172.19 l -320.88 0.48 c -84.33 0 -152.7 77.09 -152.7 172.19 c 0 95.09 68.37 172.19 152.7 172.19 M 543 4215 L 865 4212 M 868.5 3488.54 c 102.4 0 185.42 93.59 185.42 209.04 s -83.01 209.04 -185.42 209.04 l -320.93 -0.35 c -66.7 0 -120.76 60.96 -120.76 136.15 s 54.07 136.15 120.76 136.15 M 547 4179 L 870 4175 M 860.26 4248.24 c 66.7 0 120.76 60.96 120.76 136.15 c 0 75.2 -54.07 136.15 -120.76 136.15 l -320.93 -0.35 c -102.4 0 -185.42 93.59 -185.42 209.04 c 0 115.45 83.01 209.04 185.42 209.04 M 539 4938 L 869 4939 M 864.35 4212.21 c 84.33 0 152.7 77.09 152.7 172.19 c 0 95.1 -68.37 172.19 -152.7 172.19 l -320.88 0.48 c -84.33 0 -152.7 77.09 -152.7 172.19 c 0 95.1 68.37 172.19 152.7 172.19 M 543 4901 L 868 4901 M 868.5 4175.35 c 102.4 0 185.42 93.59 185.42 209.04 c 0 115.45 -83.01 209.04 -185.42 209.04 l -320.93 -0.35 c -66.7 0 -120.76 60.96 -120.76 136.15 c 0 75.19 54.07 136.15 120.76 136.15 M 547 4865 H 869"></path>
                                        <path mask="url('#mask')" id="Active" transform="translate(-329 -1402.078)" fill="none" stroke="{{$journey->moving_line_color}}" stroke-width="8" stroke-miterlimit="10" d="M 860.26 3149.84 l -320.93 -0.35 c -102.4 0 -185.42 93.59 -185.42 209.04 s 83.09 213.47 187.09 205.47 M 541 3564 L 860 3562 M 864.35 3185.88 l -320.88 0.48 c -84.33 0 -152.7 77.09 -152.7 172.19 s 68.37 172.19 152.7 172.19 M 543 3531 L 865 3526 M 868.5 3222.73 l -320.93 -0.35 c -66.7 0 -120.76 60.96 -120.76 136.15 s 54.07 136.15 120.76 136.15 M 547 3495 L 869 3489 M 871.42 2804.65 h -205 M 861.42 2877.55 h -195 M 866.42 2841.55 h -188 M 547.57 2116.89 c -66.7 0 -120.76 -60.96 -120.76 -136.15 c 0 -75.2 54.07 -136.15 120.76 -136.15 l 320.93 0.35 c 102.4 0 185.42 -93.59 185.42 -209.04 s -83.01 -209.04 -185.42 -209.04 M 543.48 2152.92 c -84.33 0 -152.7 -77.09 -152.7 -172.19 s 68.37 -172.19 152.7 -172.19 l 320.88 -0.48 c 84.33 0 152.7 -77.09 152.7 -172.19 s -68.37 -172.19 -150.06 -171.87 M 539.33 2189.78 c -102.4 0 -185.42 -93.59 -185.42 -209.04 s 83.01 -209.04 185.42 -209.04 l 320.93 0.35 c 66.7 0 120.76 -60.96 120.76 -136.15 s -54.07 -136.15 -115.02 -136.9 M 860.26 2187.16 c 66.7 0 120.76 60.96 120.76 136.15 s -54.07 136.15 -120.76 136.15 l -320.93 -0.35 c -102.4 0 -185.42 93.59 -185.42 209.04 s 83.01 209.04 185.42 209.04 M 864.35 2151.12 c 84.33 0 152.7 77.09 152.7 172.19 s -68.37 172.19 -152.7 172.19 l -320.88 0.48 c -84.33 0 -152.7 77.09 -152.7 172.19 s 68.37 172.19 152.7 172.19 M 868.5 2114.26 c 102.4 0 185.42 93.59 185.42 209.04 s -83.01 209.04 -185.42 209.04 L 547.57 2532 c -66.7 0 -120.76 60.96 -120.76 136.15 s 54.07 136.15 120.76 136.15 M 871.42 2114.26 Q 709.21 2115.63 547 2117 M 861.42 2187.16 Q 700.21 2188.58 539 2190 M 866.42 2151.16 Q 705.21 2152.08 543 2153 M 860.26 2877.54 c 66.7 0 120.76 60.96 120.76 136.15 s -54.07 136.15 -120.76 136.15 M 864.35 2841.51 c 84.33 0 152.7 77.09 152.7 172.19 s -68.37 172.19 -152.7 172.19 M 868.5 2804.65 c 102.4 0 185.42 93.59 185.42 209.04 s -83.01 209.04 -185.42 209.04 M 871.42 2804.65 h -324.42 M 861.42 2877.55 h -322.42 M 866.42 2841.55 h -188 Q 610.71 2840.775 543 2840 M 860 3562 c 66.7 0 120.76 60.96 120.76 136.15 s -54.07 136.15 -120.76 136.15 l -320.93 -0.35 c -102.4 0 -185.42 93.59 -185.42 209.04 c 0 115.45 83.01 209.04 185.42 209.04 M 539 4252 L 861 4248 M 865 3526 c 84.33 0 152.7 77.09 152.7 172.19 s -68.37 172.19 -152.7 172.19 l -320.88 0.48 c -84.33 0 -152.7 77.09 -152.7 172.19 c 0 95.09 68.37 172.19 152.7 172.19 M 543 4215 L 865 4212 M 868.5 3488.54 c 102.4 0 185.42 93.59 185.42 209.04 s -83.01 209.04 -185.42 209.04 l -320.93 -0.35 c -66.7 0 -120.76 60.96 -120.76 136.15 s 54.07 136.15 120.76 136.15 M 547 4179 L 870 4175 M 860.26 4248.24 c 66.7 0 120.76 60.96 120.76 136.15 c 0 75.2 -54.07 136.15 -120.76 136.15 l -320.93 -0.35 c -102.4 0 -185.42 93.59 -185.42 209.04 c 0 115.45 83.01 209.04 185.42 209.04 M 539 4938 L 869 4939 M 864.35 4212.21 c 84.33 0 152.7 77.09 152.7 172.19 c 0 95.1 -68.37 172.19 -152.7 172.19 l -320.88 0.48 c -84.33 0 -152.7 77.09 -152.7 172.19 c 0 95.1 68.37 172.19 152.7 172.19 M 543 4901 L 868 4901 M 868.5 4175.35 c 102.4 0 185.42 93.59 185.42 209.04 c 0 115.45 -83.01 209.04 -185.42 209.04 l -320.93 -0.35 c -66.7 0 -120.76 60.96 -120.76 136.15 c 0 75.19 54.07 136.15 120.76 136.15 M 547 4865 H 869"></path>
                                        <defs>
                                        <mask id="mask">
                                            <path class="mask-path" fill="none" stroke="#5EFF5C" stroke-width="83" stroke-miterlimit="10" d="M 535.4 61.6 c 84.3 0 152.7 77 152.7 172.1 s -68.4 172.2 -152.7 172.2 l -320.9 0.5 c -84.3 0 -152.7 77.1 -152.7 172.2 s 68.4 172.2 152.7 172.2 l 144.9 -1.8 h 178 l -2.1 0 C 619.7 749 688 826 688 921.1 s -68.4 172.2 -152.7 172.2 l -320.9 0.5 c -84.3 0 -152.7 77.1 -152.7 172.2 s 68.4 172.2 152.7 172.2 l 134.9 1.2 h 188 h -188 l 185.9 0 c 84.3 0 152.7 77.1 152.7 172.2 s -68.4 172.2 -152.7 172.2 l -320.9 0.5 c -84.3 0 -152.7 77.1 -152.7 172.2 s 68.4 172.2 152.7 172.2 l 19.6 -5.3 h 303.3 l -2.1 0 c 84.3 0 152.7 77.1 152.7 172.2 s -68.4 172.2 -152.7 172.2 l -320.9 0.5 c -84.3 0 -152.7 77.1 -152.7 172.2 s 68.4 172.2 152.7 172.2 l 19.6 -2.4 h 303.3 l -2.1 0 c 84.3 0 152.7 77.1 152.7 172.2 s -68.4 172.2 -152.7 172.2 l -320.9 0.5 c -84.3 0 -152.7 77.1 -152.7 172.2 s 68.4 172.2 152.7 172.2 L 543 3498" style="stroke-dashoffset: 1552;"></path>
                                        </mask>
                                        </defs>
                                    </svg>
                                @endif
                            @endfor
                        </div>
                    </div>
                    <div class="col-lg-12 d-none d-lg-block">
                        <div class="bottom-text">
                        <!-- <p>
                            Kape operates on a highly scalable proprietary SaaS-based model
                            that accommodates millions of subscribers all around the world.
                        </p> -->
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- locked  -->
        <div class="modal fade" id="locked_modal" tabindex="-1" aria-labelledby="locked_modalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="border-0 modal-content rounded-0 shadow-lg">
                    <div class="modal-body p-4 text-center">
                        <img src="{{url('images/locked_level_img.png')}}" width="270" height="auto" alt="level locked illustration">
                        <h2 class="text-center my-2">Level Locked</h2>
                        <p class="fs-5 my-2">Unlock the next level by successfully completing the current level.</p>
                        <button type="button" class="text-primary bg-transparent border-0 shadow-none text-center" data-bs-dismiss="modal">Got it!</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- finished  -->
        <div class="modal fade" id="finished_modal" tabindex="-1" aria-labelledby="finished_modalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="border-0 modal-content rounded-0 shadow-lg">
                    <div class="modal-body p-4 text-center">
                        <img src="{{url('images/finished_level_img.png')}}" width="270" height="auto" alt="level finished illustration">
                        <h2 class="text-center my-2">Level Finished</h2>
                        <p class="fs-5 my-2">Go ahead Champ! You've already finished this level.</p>
                        <button type="button" class="text-primary bg-transparent border-0 shadow-none text-center" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        
        <script>
            let mainHeight = 0
            $(".year-box").each(function(){
                let position = $(this).data('position');
                $(this).css({top: mainHeight});
                if(position == "first"){
                    $(this).css({top: mainHeight - 18, left: 22+'%'});
                } else if(position == "last"){
                    $(this).css({left: '-'+7+'%'});
                } else if (position == "odd") {
                    $(this).css({right: 51+'%'});
                } else if (position == "even") {
                    $(this).css({left: 51+'%'});
                }
                mainHeight =  mainHeight + $(this).height() + 140;
                // $(this).find(".logo-holder")

                var dynamicDiv = $(this).find(".logo-holder");
                var text = $(this).find(".logo-holder div");
                if (dynamicDiv.length > 0 && text.length > 0) {
                    var textWidth = text[0].clientWidth;
                    var scaleFactor = dynamicDiv[0].clientWidth / textWidth;
                    $(".level_title_name").css('font-size', scaleFactor < 1 ? scaleFactor * 55 + '%' : '50%');
                }
            });
            $(".path-holder").height(mainHeight);
                // Indicator
                const yearbookMenu = document.querySelector(".yearbook ul");
                const marker = document.querySelector(".indicator");
                const menuLink = document.querySelectorAll(
                "#journey .timeline-holder .yearbook ul li"
            );

            if (typeof yearbookMenu != "undefined" && yearbookMenu != null) {
                for (let i = 0; i < menuLink.length; i++) {
                    menuLink[i].addEventListener("click", function () {
                    let current = document.getElementsByClassName("active");
                    let menuItemPoition = this.offsetTop;
                    // If there's no active class
                    if (current.length > 0) {
                        current[0].className = current[0].className.replace(" active", "");
                    }
                    // Add the active class to the current/clicked button
                    this.className += " active";
                    marker.style.transform = `translateY(${menuItemPoition}px)`;
                    });
                }
            }

            const journey = document.querySelector("#journey");
            document.addEventListener("scroll", function (e) {
                let windowPosition = window.scrollY;
                let positionJourney = journey.offsetTop;
                let positionPath = windowPosition - positionJourney;
                // console.log(journey.scrollTop + position);
                let svgMask = document.querySelector(".mask-path");
                svgMask.style["stroke-dashoffset"] = 10000 - positionPath * 3;
            });
            $(".locked_level").click(function(){
                $(".open_locked_modal").click();
            });
            $(".finished_level").click(function(){
                $(".open_finished_modal").click();
            });
        </script>
    </body>
</html>