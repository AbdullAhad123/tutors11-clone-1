<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Settings - {{$practiceSet['title']}}</title>
    <!-- rel icon -->
    <link rel="icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}">
    <meta name="description" content="{{ app(\App\Settings\SiteSettings::class)->seo_description }}">
    <meta name="author" content="{{ app(\App\Settings\SiteSettings::class)->app_name }}">
    <!-- bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
        .cursor-not-allowed{cursor:not-allowed !important}
        .font-size-13{font-size:13px;}
        .yes_selector.active{background-color: #e8fadf !important;color: #71dd37 !important;}
        .no_selector.active{background-color: #ffe0db !important;color: #ff3e1d !important;}
        input::-webkit-outer-spin-button,input::-webkit-inner-spin-button {-webkit-appearance: none;}
        input[type=number] {-moz-appearance: textfield;}
        svg{height:18px;width:18px;}
        .custom-tooltip{min-width: 350px;}
        .custom-inp-group{display:flex;}
        @media screen and (max-width:767px) {.custom-tooltip{left: 0;}}
        @media screen and (max-width:547px) {.custom-tooltip{transform: translateX(-50%);min-width: 300px;}}
        @media screen and (max-width:371px) {.custom-inp-group{display: block;}}
    </style>
</head>

<body> 
    @include('sidebar')
    @include('header')

    <section class="p-4">

        <div class="text-start my-4 align-items-center">
            <a href="/admin/practice-sets">
                <button class="btn bg-label-primary border-primary text-primary p-2 px-3">
                    <i class='bx bx-arrow-back'></i>
                    <span>
                        Back to Practise Set
                    </span>
                </button>
            </a>
        </div>

        <div class="bg-white rounded-4 py-4 p-3 shadow">
            <div class="row m-0">
                <div class="col-lg-5 col-md-12 my-2 ">
                    <h1 class="h4 text-dark my-1">Practise Set Settings</h1>
                    <div class="mt-1">{{$practiceSet['title']}}</div>
                </div>
                <div class="col-lg-7 col-md-12 my-2">
                    <div class="row align-items-center justify-content-evenly">
                        @foreach ($steps as $key => $step)
                            @if($step['status'] == 'active')
                                <a href="{{$step['url']}}" class="col-lg-3 col-md-3 col-sm-6 col-6 my-1 p-1">
                                    <button class="bg_primary_label border-primary btn mx-1 w-100 fs-6">
                                        <span class="badge bg-primary circle-badge rounded-circle text-white"> {{$key + 1}} </span> 
                                        {{$step['title']}}
                                    </button>
                                </a>                        
                            @else
                                <a href="{{$step['url']}}" class="col-lg-3 col-md-3 col-sm-6 col-6 my-1 p-1">
                                    <button class="btn btn-outline-primary mx-1 w-100 fs-6">
                                        <span class="badge bg-primary circle-badge rounded-circle text-white"> {{$key + 1}} </span> 
                                        {{$step['title']}}
                                    </button>
                                </a>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        @if (Session::has('errorMessage'))
            <div class="alert alert-danger mt-3">
                <svg fill="#ff3e1d" height="30px" width="30px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
                    viewBox="0 0 52 52" xml:space="preserve">
                    <g>
                        <path d="M26,0C11.664,0,0,11.663,0,26s11.664,26,26,26s26-11.663,26-26S40.336,0,26,0z M26,50C12.767,50,2,39.233,2,26
                            S12.767,2,26,2s24,10.767,24,24S39.233,50,26,50z"/>
                        <path d="M35.707,16.293c-0.391-0.391-1.023-0.391-1.414,0L26,24.586l-8.293-8.293c-0.391-0.391-1.023-0.391-1.414,0
                            s-0.391,1.023,0,1.414L24.586,26l-8.293,8.293c-0.391,0.391-0.391,1.023,0,1.414C16.488,35.902,16.744,36,17,36
                            s0.512-0.098,0.707-0.293L26,27.414l8.293,8.293C34.488,35.902,34.744,36,35,36s0.512-0.098,0.707-0.293
                            c0.391-0.391,0.391-1.023,0-1.414L27.414,26l8.293-8.293C36.098,17.316,36.098,16.684,35.707,16.293z"/>
                    </g>
                </svg>
                {{Session::get('errorMessage')}}
            </div>
        @endif

        <div class="bg-white rounded-4 py-4 my-4 p-3 shadow">
            <div class="container practice_set_form">
                <div class="row">
                    <div class="col-md-6 border-end">
                        <div class="justify-content-between align-items-center mb-4 custom-inp-group">
                            <div>
                                Allow Reward Points
                                <span class="position-relative">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 cursor-pointer text-primary show_tooltip"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    <div class="bg-white position-absolute px-3 py-1 shadow start-0 rounded font-size-13 custom-tooltip d-none zindex-1">
                                        <div><span class="text-success">Yes</span> - Points will be rewarded for each correct answer</div>
                                        <div><span class="text-danger">No</span> - No points will be rewarded</div>
                                    </div>
                                </span>
                            </div>
                            <div>
                                <input id="allowRewardPoints" class="inp" value="true" type="hidden">
                                <span class="btn border rounded-0 radio_selector yes_selector active">Yes</span>
                                <span class="btn border rounded-0 radio_selector no_selector">No</span>
                            </div>
                        </div>
                        <div class="justify-content-between align-items-center mb-4 custom-inp-group">
                            <div>
                                Points Mode
                                <span class="position-relative">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 cursor-pointer text-primary show_tooltip"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    <div class="bg-white position-absolute px-3 py-1 shadow start-0 rounded font-size-13 custom-tooltip d-none zindex-1">
                                        <div><span class="text-success">Auto</span> - Points will be assigned based on question's default marks</div>
                                        <div><span class="text-danger">Manual</span> - Points will be assigned to each correct answered question as specified</div>
                                    </div>
                                </span>
                            </div>
                            <div>
                                <input id="pointsMode" class="inp allowDropdown" value="true" type="hidden">
                                <span class="btn border rounded-0 radio_selector yes_selector active">Auto</span>
                                <span class="btn border rounded-0 radio_selector no_selector">Manual</span>
                            </div>
                        </div>
                        <div id="pointsModeSection" class="d-none justify-content-between align-items-center mb-4">
                            <div>
                                Points for Correct Answer
                            </div>
                            <div>
                                <input id="pointsCA" class="inp mt-2 form-control" type="number" min="1" placeholder="Points">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="justify-content-between align-items-center mb-4 custom-inp-group">
                            <div>
                                Show Reward Popup
                                <span class="position-relative">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 cursor-pointer text-primary show_tooltip"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    <div class="bg-white position-absolute px-3 py-1 shadow end-0 rounded font-size-13 custom-tooltip d-none zindex-1">
                                        <div><span class="text-success">Yes</span> - Shows reward popup on correct answer</div>
                                        <div><span class="text-danger">No</span> - No popup will be shown</div>
                                    </div>
                                </span>
                            </div>
                            <div>
                                <input id="showRewardPopup" class="inp" value="true" type="hidden">
                                <span class="btn border rounded-0 radio_selector yes_selector active">Yes</span>
                                <span class="btn border rounded-0 radio_selector no_selector">No</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="formError" class="font-size-13 mb-2 text-danger"></div>
                <div class="text-end my-3">
                    <button id="proceedpractice_sets" class="btn btn-primary">Save & Proceed</button>
                </div>
            </div>
        </div>

    </section>
   
    <script>
        $(document).ready(function() {
            // radio selector 
            $(".radio_selector").click(function(){
                $(this).addClass('active').siblings().removeClass('active');
                var option = $(this).hasClass("yes_selector");
                $(this).siblings(".inp").val(option);
                if($(this).siblings(".inp").hasClass("allowDropdown")){
                    let input = $(this).siblings(".inp");
                    let id = $(this).siblings(".inp").attr("id");
                    let showOnYes = $(this).siblings(".inp").hasClass("showOnYes");
                    if(showOnYes){
                        if(option){
                            $("#"+id+"Section").removeClass('d-none');
                            input.val("true");
                        } else {
                            input.val("false");
                            $("#"+id+"Section").addClass('d-none');
                        }
                    } else {
                        if(option){
                            $("#"+id+"Section").addClass('d-none');
                            input.val("true");
                        } else {
                            input.val("false");
                            $("#"+id+"Section").removeClass('d-none');
                        }
                    }
                }
            });
            // negative marks 
            $(".negativeMarksTypeSelector").click(function(){
                var option = $(this).hasClass("yes_selector");
                if(option){
                    $("#negativeMarks").attr("placeholder","Enter Number")
                } else {
                    $("#negativeMarks").attr("placeholder","Enter Percentage")
                }
            });
            // show tooltip mouseover
            $(".show_tooltip").mouseover(function(){
                $(this).siblings(".custom-tooltip").removeClass('d-none');
            });
            // show tooltip mouseout 
            $(".show_tooltip").mouseout(function(){
                $(this).siblings(".custom-tooltip").addClass('d-none');
            });
            // proceed practice 
            $("#proceedpractice_sets").click(function(){
                let practice_sets_id = {!! str_replace("'", "\'", json_encode($practiceSet['id'])) !!};
                let allowRewardPoints = $("#allowRewardPoints").val();
                let pointsMode = $("#pointsMode").val();
                let correct_marks = $("#pointsCA").val()?$("#pointsCA").val():null;
                let showRewardPopup = $("#showRewardPopup").val();
                if(pointsMode == true && !correct_marks){
                    $("#formError").text("The correct marks field is required when auto grading is false.");
                } else {
                    $.ajax({
                        type: "POST",
                        url: '/admin/practice-sets/'+practice_sets_id+'/settings',
                        data: {
                            allow_rewards: allowRewardPoints,
                            auto_grading: pointsMode,
                            correct_marks: correct_marks,
                            show_reward_popup: showRewardPopup,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(data) {
                            console.log("success");
                            if(data.practice_set){
                                window.location.href = "/admin/practice-sets/"+data.practice_set+"/questions";
                            }
                        },
                        error: function(data, textStatus, errorThrown) {
                            console.log(textStatus);
                            var obj = data.responseJSON.errors;
                            let formError = obj[Object.keys(obj)[0]][0];
                            $("#formError").text(formError);
                        },
                    });
                }
            });
            // ready ends 
        });
    </script>

</body>

</html>
