<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        @if(isset($editFlag) && $editFlag)
            Edit Quiz - {{$quiz['title']}}
        @else
            Create Quiz
        @endif
    </title>
    <!-- rel icon -->
    <link rel="icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}">
    <meta name="description" content="{{ app(\App\Settings\SiteSettings::class)->seo_description }}">
    <meta name="author" content="{{ app(\App\Settings\SiteSettings::class)->app_name }}">
    <!-- bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
        .cursor-not-allowed{cursor:not-allowed !important}
        .practice_set_form{max-width: 900px !important;}
        #start_search:hover,#start_search:active{background: transparent;cursor: default;color: #bcc4cc !important;}
        #skill_Dropdown{max-height: 175px;}
        .font-size-13{font-size:13px;}
        input::-webkit-outer-spin-button,input::-webkit-inner-spin-button {-webkit-appearance: none;margin: 0;}
        input[type=number] {-moz-appearance: textfield;}
    </style>
</head>

<body> 
    @include('sidebar')
    @include('header')

    <section class="p-4">

        <div class="text-start my-4 align-items-center">
            <a href="/admin/quizzes"><button class="bg_primary_label border-primary btn p-2 px-3 shadow text-primary"><i class='bx bx-arrow-back'></i><span>Back to Quizzes</span></button></a>
        </div>

        <div class="bg-white rounded-4 py-4 p-3 shadow">
            <div class="row m-0">
                <div class="col-lg-5 col-md-12 align-self-center my-2">
                    <h1 class="h4 text-dark mb-0">Quiz Details</h1>
                    @if(isset($editFlag) && $editFlag)
                        <div class="mt-1">{{$quiz['title']}}</div>
                    @endif
                </div>
                <div class="col-lg-7 col-md-12 my-2">
                    <div class="row align-items-center justify-content-evenly">
                        @if(isset($editFlag) && $editFlag)
                            @foreach ($steps as $key => $step)
                                @if($step['status'] == 'active')
                                    <a href="{{$step['url']}}" class="col-lg-3 col-md-3 col-sm-6 col-6 my-1 p-1">
                                        <button class="bg_primary_label border-primary btn w-100 fs-6">
                                            <span class="badge bg-primary circle-badge rounded-circle text-white"> {{$key + 1}} </span> 
                                            {{$step['title']}}
                                        </button>
                                    </a>                        
                                @else
                                    <a href="{{$step['url']}}" class="col-lg-3 col-md-3 col-sm-6 col-6 my-1 p-1">
                                        <button class="btn btn-outline-primary w-100 fs-6">
                                            <span class="badge bg-primary circle-badge rounded-circle text-white"> {{$key + 1}} </span> 
                                            {{$step['title']}}
                                        </button>
                                    </a>
                                @endif
                            @endforeach
                        @else
                            @foreach ($steps as $key => $step)
                                @if($step['status'] == 'active')
                                    <div class="col-lg-3 col-md-3 col-sm-6 col-6 my-1 p-1">
                                        <button class="bg_primary_label w-100 fs-6 border-primary btn"> <span class="badge bg-primary circle-badge rounded-circle text-white"> {{$key + 1}} </span> {{$step['title']}} </button>
                                    </div>
                                @else
                                    <div class="col-lg-3 col-md-3 col-sm-6 col-6 my-1 p-1">
                                        <button class="btn btn-outline-primary w-100 fs-6 cursor-not-allowed"> <span class="badge bg-primary circle-badge rounded-circle text-white"> {{$key + 1}} </span> {{$step['title']}} </button>
                                    </div>
                                @endif
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>

        @if (Session::has('errorMessage') && isset($editFlag) && $editFlag)
            <div class="alert_failed rounded-3 p-3 d-flex align-items-center my-4"><i class='bx bx-x-circle me-1 fs-5'></i>{{Session::get('errorMessage')}}</div>
        @endif

        <div class="bg-white rounded-4 py-4 my-4 shadow">
            <div class="container practice_set_form">
                <div class="form-group my-4">
                    <label for="title" class="fw-medium text-dark">Title</label>
                    <input id="title" type="text" class="form-control shadow-sm border mt-2" placeholder="Enter title..." value="@if(isset($editFlag) && $editFlag){{$quiz['title']}}@endif">
                </div>
                <div class="row">
                    <div class="col-12 col-sm-6 mt-2 my-4">
                        <div class="form-group">
                            <label for="subcategory" class="fw-medium text-dark">Year</label>
                            <select id="subcategory" class="form-select shadow-sm border mt-2">
                                @foreach ($initialSubCategories as $key => $subcategory)
                                    @if(isset($editFlag) && $editFlag && $quiz['sub_category_id'] == $subcategory['id'])
                                        <option selected value="{{$subcategory['id']}}">{{$subcategory['name']}}</option>
                                    @else
                                    <option value="{{$subcategory['id']}}">{{$subcategory['name']}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 mt-2 my-4">
                        <div class="form-group">
                            <label for="quizType" class="fw-medium text-dark">Quiz Type</label>
                            <select id="quizType" class="form-select shadow-sm border mt-2">
                                @foreach ($quizTypes as $key => $quizType)
                                    @if(isset($editFlag) && $editFlag && $quiz['quiz_type_id'] == $quizType['id'])
                                        <option selected value="{{$quizType['id']}}">{{$quizType['name']}}</option>
                                    @else
                                        <option value="{{$quizType['id']}}">{{$quizType['name']}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="mb-4 mt-3 row">
                    <div class="col-12 col-sm-8">
                        <div id="isPaidText" class="h6 mb-1 text-dark">
                            @if(isset($editFlag) && $editFlag && $quiz['is_paid'])
                                Paid
                            @else
                                Free
                            @endif
                        </div>
                        <div class="lh-1 font-size-13">Paid (Accessible to only paid users). Free (Anyone can access).</div>
                    </div>
                    <div class="col-12 col-sm-4 d-flex align-items-center justify-content-sm-end">
                        <label class="switch mt-2">
                            @if(isset($editFlag) && $editFlag && $quiz['is_paid'])
                                <input id="isPaid" type="checkbox" checked>
                            @else
                                <input id="isPaid" type="checkbox">
                            @endif
                            <span class="slider round"></span>
                        </label>
                    </div>
                </div>
                <div class="mb-4 row" id="canRedeemWrap" style="display:none;">
                    <div class="col-12 col-sm-8">
                        <div class="h6 mb-1 text-dark">Can access with Points (
                            <span id="canRedeemText">
                                @if(isset($editFlag) && $editFlag && $quiz['can_redeem'])
                                    Yes
                                @else
                                    No
                                @endif
                            </span>
                        )</div>
                        <div class="lh-1 font-size-13">Yes (User should redeem with points to access quiz). No (Anyone can access).</div>
                    </div>
                    <div class="col-12 col-sm-4 d-flex align-items-center justify-content-sm-end">
                        <label class="switch mt-2">
                            @if(isset($editFlag) && $editFlag && $quiz['can_redeem'])
                                <input id="canRedeem" type="checkbox" checked>
                            @else
                                <input id="canRedeem" type="checkbox">
                            @endif
                            <span class="slider round"></span>
                        </label>
                    </div>
                </div>
                <div class="form-group mb-4" id="pointsRedeemWrap" style="display:none;">
                    <label>Points Required to Redeem</label>
                    <input id="Redeem" type="number" class="form-control" placeholder="Enter Points Required" min="1" value="@if(isset($editFlag) && $editFlag && $quiz['can_redeem']){{$quiz['points_required']}}@endif">
                </div>
                <div class="mb-4 row">
                    <div class="col-12 col-sm-8">
                        <div class="h6 mb-1 text-dark">Visibility - 
                            <span id="visibilityText">
                                @if(isset($editFlag) && $editFlag && $quiz['is_private'])
                                    Private
                                @else
                                    Public
                                @endif
                            </span>
                        </div>
                        <div class="lh-1 font-size-13">Private (Only scheduled user groups can access). Public (Anyone can access).</div>
                    </div>
                    <div class="col-12 col-sm-4 d-flex align-items-center justify-content-sm-end">
                        <label class="switch mt-2">
                            @if(isset($editFlag) && $editFlag && $quiz['is_private'])
                                <input id="visibility" type="checkbox" checked>
                            @else
                                <input id="visibility" type="checkbox">
                            @endif
                            <span class="slider round"></span>
                        </label>
                    </div>
                </div>
                <div class="mb-4 row">
                    <div class="col-12 col-sm-8">
                        <div class="h6 mb-1 text-dark">
                            Status - 
                            <span id="isActiveText">
                                @if(isset($editFlag) && $editFlag && $quiz['is_active'])
                                    Published
                                @else
                                    Draft
                                @endif
                            </span>
                        </div>
                        <div class="lh-1 font-size-13">Published (Shown Everywhere). Draft (Not Shown).</div>
                    </div>
                    <div class="col-12 col-sm-4 d-flex align-items-center justify-content-sm-end">
                        <label class="switch mt-2">
                            @if(isset($editFlag) && $editFlag && $quiz['is_active'])
                                <input id="isActive" type="checkbox" checked>
                            @else
                                <input id="isActive" type="checkbox">
                            @endif
                            <span class="slider round"></span>
                        </label>
                    </div>
                </div>
                <div id="formError" class="font-size-13 mb-2 text-danger"></div>
                <div class="text-end my-3">
                    <button id="proceedQuiz" class="btn btn-primary">
                        @if(isset($editFlag) && $editFlag)
                            Update Details
                        @else
                            Save & Proceed
                        @endif
                    </button>
                </div>
            </div>
        </div>

    </section>

    <script>
        var issetEditFlag = null;
        var editFlag = false;
        var quizId;
        @if(isset($editFlag) && $editFlag)
            issetEditFlag = {!! str_replace("'", "\'", json_encode(isset($editFlag))) !!};
            editFlag = {!! str_replace("'", "\'", json_encode($editFlag)) !!};
            quizId = {!! str_replace("'", "\'", json_encode($quiz['id'])) !!};
        @endif        
        $('#isPaid').change(function() {
            let isPaid = $(this).is(':checked');
            if(isPaid){
                $("#isPaidText").text("Paid");
                $("#canRedeemWrap").show();
                let canRedeem = $("#canRedeem").is(':checked');
                if(canRedeem){
                    $("#pointsRedeemWrap").show();
                } else {
                    $("#pointsRedeemWrap").hide();
                }
            } else {
                $("#isPaidText").text("Free");
                $("#canRedeemWrap").hide();
                
            }
        });
        $('#canRedeem').change(function() {
            let canRedeem = $(this).is(':checked');
            if(canRedeem){
                $("#canRedeemText").text("Yes");
                $("#pointsRedeemWrap").show();
            } else {
                $("#canRedeemText").text("No");
                $("#pointsRedeemWrap").hide();
            }
        });
        $('#visibility').change(function() {
            let visibility = $(this).is(':checked');
            if(visibility){
                $("#visibilityText").text("Private");
            } else {
                $("#visibilityText").text("Public");
            }
        });   
        $('#isActive').change(function() {
            let isActive = $(this).is(':checked');
            if(isActive){
                $("#isActiveText").text("Published");
            } else {
                $("#isActiveText").text("Draft");
            }
        });   
        $("#title").keyup(function(){
            if($(this).val().length > 0){
                $("#formError").text("");
            }
        });
        $("#proceedQuiz").click(function(){
            let canRedeem = $("#canRedeem").is(':checked');
            let isActive = $("#isActive").is(':checked');
            let isPaid = $("#isPaid").is(':checked');
            let isPrivate = $("#visibility").is(':checked');
            let pointsRequired = $("#Redeem").val()?parseInt($("#Redeem").val()):null;
            let quizType = parseInt($("#quizType").val());
            let subcategory = parseInt($("#subcategory").val());
            let title = $("#title").val();
            if(title){
                var url;
                var method;
                if(issetEditFlag && editFlag){
                    url = '/admin/quizzes/'+quizId;
                    method = "PATCH";
                } else {
                    url = '/admin/quizzes';
                    method = "POST";
                }
                $.ajax({
                    type: method,
                    url: url,
                    data: {
                        can_redeem: canRedeem,
                        description: "",
                        is_active: isActive,
                        is_paid: isPaid,
                        is_private: isPrivate,
                        points_required: pointsRequired,
                        price: 0,
                        quiz_type_id: quizType,
                        sub_category_id: subcategory,
                        title: title,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        console.log(data)
                        window.location.href = "/admin/quizzes/"+data.quiz+"/settings";
                    },
                    error: function(data, textStatus, errorThrown) {
                        console.log(textStatus);
                        var obj = data.responseJSON.errors;
                        let formError = obj[Object.keys(obj)[0]][0];
                        $("#formError").text(formError);
                    },
                });
            } else {
                $("#formError").text("Please enter a title");
            }
            
        });
    </script>

</body>

</html>
