<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Parent Set Practise - Student Portal - Tutors 11 Plus</title>
    <link rel="shortcut icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}" type="image/x-icon">
    <!-- bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  
    <style>
        .parent_practice_set_card {
            min-height: 450px;
            width: auto;
            background: #fff;
            overflow: hidden;
            transition: 0.3s;
        }

        .parent_practice_set_card:hover {
            scale: 1.01;
            box-shadow: -1px 6px 7px 0px #00000045;
        }

        .pps_image_section {
            height: 200px;
            width: 100%;
            background: url(../images/syllabus_banner.png) no-repeat center;
            background-size: 75%;
        }

        .btn_start_practice {
            background: var(--orange-primary)!important;
            color: black!important
        }
        .to_do_card_item {
            height: 100%;
            width: 100%;
            background: #003276;
            position: relative;
            overflow: hidden;
        }
        
        .to_do_card_image {
            height: 55px;
            width: 55px;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #ffffff30
        }

        .top_circle_shade {
            height: 150px;
            width: 150px;
            background: #ffffff1a;
            position: absolute;
            top: -45px;
            right: -70px;
        }

        .bottom_circle_shade {
            height: 150px;
            width: 150px;
            background: #ffffff1a;
            position: absolute;
            bottom: -45px;
            left: -70px;
        }

        /* .redeem_coins_banner {
            height: 400px;
            width: auto;
            background: linear-gradient( 315deg , #006bff , #003277);
        } */

        .pratice_sets_cards {
            height: auto;
            width: auto;
        }
        
    </style>
</head>

<body>
    @include('sidebar')
    @include('header')

    @if (Session::has('errorMessage'))
        <div class="alert alert-danger mt-3">
            <svg fill="#ff3e1d" height="30px" width="30px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 52 52" xml:space="preserve">
                <g>
                    <path d="M26,0C11.664,0,0,11.663,0,26s11.664,26,26,26s26-11.663,26-26S40.336,0,26,0z M26,50C12.767,50,2,39.233,2,26
                        S12.767,2,26,2s24,10.767,24,24S39.233,50,26,50z" />
                    <path
                        d="M35.707,16.293c-0.391-0.391-1.023-0.391-1.414,0L26,24.586l-8.293-8.293c-0.391-0.391-1.023-0.391-1.414,0
                        s-0.391,1.023,0,1.414L24.586,26l-8.293,8.293c-0.391,0.391-0.391,1.023,0,1.414C16.488,35.902,16.744,36,17,36
                        s0.512-0.098,0.707-0.293L26,27.414l8.293,8.293C34.488,35.902,34.744,36,35,36s0.512-0.098,0.707-0.293
                        c0.391-0.391,0.391-1.023,0-1.414L27.414,26l8.293-8.293C36.098,17.316,36.098,16.684,35.707,16.293z" />
                </g>
            </svg>
            {{Session::get('errorMessage')}}
        </div>
    @endif
     
    <div class="container-fluid pb-5 pt-3">
        <h1 class="text-dark fw-semibold mb-4 h2">{{$heading}}</h1> 
        <div class="row justify-content-center align-items-center">
            @if (count($practiceSets) > 0)
                @foreach($practiceSets as $practice) 
                    <div class="col-lg-4 col-md-6 col-sm-8 col-12 p-2 my-2">
                        <a href="/practice/{{$practice['slug']}}/init?parentSet=true&suggestedPracticeSetId={{$practice['suggested_id']}}">
                            <div class="to_do_card_item p-3 rounded-4 py-4">
                                <div class="top_circle_shade rounded-circle"></div>
                                <div class="bottom_circle_shade rounded-circle"></div>
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div class="to_do_card_image p-2 rounded-3">
                                        <img src="{{url('images/total_exams_img.png')}}" height='35' width='35' alt="{{$practice['title']}}">
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill='var(--portal-white)'><path d="m11.293 17.293 1.414 1.414L19.414 12l-6.707-6.707-1.414 1.414L15.586 11H6v2h9.586z"></path></svg>
                                </div>
                                <div class="to_do_card_details">
                                <div class="font-monospace my-2 px-2 p-1 d-inline-flex rounded-pill small" 
                                    style="background: white; color: #004bb2!important;">{{$practice['total_questions']}} Questions</div>
                                    <h2 class="fs-6 text-start my-2 text-white fw-light">{{$practice['title']}}</h2>
                                    <h2 class="fs-5 text-start my-2 text-white fw-normal">{{$practice['skill']}}</h2>
                                    <h2 class="fs-6 text-start mt-5 text-white fw-light">Due Date : {{$practice['due_date']}}</h2>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            @else
                <div class="w-100 text-center p-3">
                    <img src="{{url('images/no_record_found.png')}}" width='280' height='auto' alt="no records found">
                    <h2 class="text-center fw-normal h5 my-1">No Records Found!</h2>
                </div>
            @endif
        </div>
    </div>
    @include('User.ProgressScript')

</body>

</html>