<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Parent Set Practises</title>
    <!-- rel icon -->
    <link rel="icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}">
    <meta name="description" content="{{ app(\App\Settings\SiteSettings::class)->seo_description }}">
    <meta name="author" content="{{ app(\App\Settings\SiteSettings::class)->app_name }}">
    <style>
        .practice_card_item  {
          
            transition: 0.25s
        }

        .practice_card_item:hover {
            scale: 1.02;
        }

        .practice_card_item:hover .practice_image_fade {
            transform: translateY(0%);
        }

        .btn_set_practice {
            background: var(--portal-primary)
        }

    </style>
</head>

<body> 
    @include('sidebar')
    @include('header')
  
    <div class="row justify-content-center align-items-center m-0">
        @foreach ($practiceSets['data'] as $practiceSet)
            <div class="col-12 my-3 mx-auto">
                <div class="practice_card_item p-4 rounded-4 shadow d-flex align-items-center bg-white flex-wrap">
                    <div class="d-flex align-items-center ">
                        <div>
                            <img src="{{url('images/practice.png')}}" height='50' width='50'  alt="">
                        </div> 
                        <div class="ms-3">
                            <h2 class="text-dark fw-bold h5 h3 my-1">{{ $practiceSet['title'] }}</h2>
                            <div class="d-flex align-items-center flex-wrap my-1">
                                <p class="text-dark  mx-1 ">20-12-2023</p>
                                <p class="text-dark  mx-1 ">{{ $practiceSet['total_questions'] }} Questions</p>   
                            </div>
                        </div>
                    </div>
                    <div class="ms-lg-auto ms-md-auto ms-sm-auto mx-auto mx-lg-0 mx-md-0 mx-sm-0 my-2">
                        @if ($practiceSet['already_set'] === true)
                            <a class="btn btn-danger p-2 px-3 btn-sm text-white  secondary_btn  px-md-3 shadow-sm my-1" href="/parent-set/delete/practice/{{$practiceSet['id']}}">Unset Practise</a>
                        @else
                            <a class="btn btn-primary  p-2 px-3 btn-sm text-white px-sm-0 secondary_btn  px-md-3 shadow-sm my-1" href="/parent-set/settings/practice/{{$practiceSet['id']}}">Set Practise</a>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>

</body>

</html>
