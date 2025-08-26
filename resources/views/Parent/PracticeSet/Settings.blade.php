<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$practiceSet['title']}} - Parent Set Details</title>
    <!-- rel icon -->
    <link rel="icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}">
    <meta name="description" content="{{ app(\App\Settings\SiteSettings::class)->seo_description }}">
    <meta name="author" content="{{ app(\App\Settings\SiteSettings::class)->app_name }}">
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

    <div class="bg-white rounded py-4">
        <div class="row m-0">
            <div class="col-lg-5 col-md-12 align-self-center">
                <div class="h5 text-dark mb-0">Question Set Settings</div>
                <div class="mt-1">{{$practiceSet['title']}}</div>
            </div>
            <div class="col-lg-7 col-md-12 d-flex justify-content-evenly">
                @foreach ($steps as $key => $step)
                    @if($step['status'] == 'active')
                        <button class="btn btn-primary mx-1"> <span class="badge bg-light circle-badge rounded-circle text-black"> {{$key + 1}} </span> {{$step['title']}} </button>
                    @else
                        <button class="btn bg-label-dark cursor-not-allowed mx-1"> <span class="badge bg-black circle-badge rounded-circle text-white"> {{$key + 1}} </span> {{$step['title']}} </button>
                    @endif
                @endforeach
            </div>
        </div>
    </div>

    <div class="rounded py-4 mt-4">
        <div class="container practice_set_form">
            <h3 class="text-dark fw-bold">2. Practise Settings</h3>
            <div class="row">
                <div class="col-md-6 border-end">
                    <div class="justify-content-between align-items-center mb-4 custom-inp-group text-dark">
                        <div>
                            <span class="fw-semibold">Allow Reward Points</span>
                            <span class="position-relative">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 cursor-pointer text-primary show_tooltip"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                <div class="bg-white position-absolute px-3 py-1 shadow start-0 rounded font-size-13 custom-tooltip d-none">
                                    <div><span class="text-success">Yes</span> - Points will be rewarded for each correct answer</div>
                                    <div><span class="text-danger">No</span> - No points will be rewarded</div>
                                </div>
                            </span>
                        </div>
                        <div>
                            <input id="allowRewardPoints" class="inp" value="true" type="hidden">
                            <span class="btn border rounded-0 text-dark radio_selector yes_selector active">Yes</span>
                            <span class="btn border rounded-0 text-dark radio_selector no_selector">No</span>
                        </div>
                    </div>
                    <div class="justify-content-between align-items-center mb-4 custom-inp-group text-dark">
                        <div>
                            <span class="fw-semibold">Points Mode</span>
                            <span class="position-relative">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 cursor-pointer text-primary show_tooltip"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                <div class="bg-white position-absolute px-3 py-1 shadow start-0 rounded font-size-13 custom-tooltip d-none">
                                    <div><span class="text-success">Yes</span> - Points will be rewarded for each correct answer</div>
                                    <div><span class="text-danger">No</span> - No points will be rewarded</div>
                                </div>
                            </span>
                        </div>
                        <div>
                            <input id="pointsMode" class="inp" value="true" type="hidden">
                            <span class="btn border rounded-0 text-dark radio_selector yes_selector active">Auto</span>
                            <span class="btn border rounded-0 text-dark radio_selector no_selector">Manual</span>
                        </div>
                    </div>
                    <div id="pointsCaSection" class="d-none justify-content-between align-items-center mb-4">
                        <div class="text-dark fw-semibold">
                            Points for Correct Answer
                        </div>
                        <div>
                            <input id="pointsCA" class="inp mt-2 form-control" type="number" min="1" placeholder="Points">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="justify-content-between align-items-center mb-4 custom-inp-group text-dark">
                        <div>
                            <span class="fw-semibold">Show Reward Popup</span>
                            <span class="position-relative">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 cursor-pointer text-primary show_tooltip"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                <div class="bg-white position-absolute px-3 py-1 shadow end-0 rounded font-size-13 custom-tooltip d-none">
                                    <div><span class="text-success">Yes</span> - Points will be rewarded for each correct answer</div>
                                    <div><span class="text-danger">No</span> - No points will be rewarded</div>
                                </div>
                            </span>
                        </div>
                        <div>
                            <input id="showRewardPopup" class="inp" value="true" type="hidden">
                            <span class="btn border rounded-0 text-dark radio_selector yes_selector active">Yes</span>
                            <span class="btn border rounded-0 text-dark radio_selector no_selector">No</span>
                        </div>
                    </div>
                </div>
            </div>
            <div id="formError" class="font-size-13 mb-2 text-danger"></div>
            <div class="text-end">
                <button id="proceedPracticeSet" class="btn btn-primary">Save & Proceed</button>
            </div>
        </div>
    </div>

   
    <script>
        $(".radio_selector").click(function(){
            $(this).addClass('active').siblings().removeClass('active');
            var option = $(this).hasClass("yes_selector");
            $(this).siblings(".inp").val(option);
            if($(this).siblings(".inp").attr("id")=="pointsMode"){
                if(option){
                    $("#pointsCaSection").addClass('d-none');
                    $("#pointsCA").val(null);
                } else {
                    $("#pointsCA").val("1");
                    $("#pointsCaSection").removeClass('d-none');
                }
            }
        });
        $(".show_tooltip").mouseover(function(){
            $(this).siblings(".custom-tooltip").removeClass('d-none');
        });
        $(".show_tooltip").mouseout(function(){
            $(this).siblings(".custom-tooltip").addClass('d-none');
        });
        $("#proceedPracticeSet").click(function(){
            // allow_rewards: true
            // auto_grading: true
            // correct_marks: null
            // show_reward_popup: true
            let practice_set_id = {!! str_replace("'", "\'", json_encode($practiceSet['id'])) !!};

            let allowRewards = /^true$/i.test($("#allowRewardPoints").val());
            let rewardPopup = /^true$/i.test($("#showRewardPopup").val());
            let autoGrading = /^true$/i.test($("#pointsMode").val());
            let correct_marks = $("#pointsCA").val()?parseInt($("#pointsCA").val()):null;

            $.ajax({
                type: "GET",
                url: '/parent-fetchIndex/practice-sets/'+practice_set_id+'/questions',
                data: {
                    allow_rewards: allowRewards,
                    auto_grading: autoGrading,
                    correct_marks: correct_marks,
                    show_reward_popup: rewardPopup,
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    console.log("success");
                    console.log(data);
                    window.location.href = "/parent-practice-sets/"+data.practice_set+"/questions";
                },
                error: function(data, textStatus, errorThrown) {
                    console.log(textStatus);
                    console.log(data);
                },
            });
    
            
        });
    </script>

</body>

</html>
