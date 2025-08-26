<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        @if(isset($editFlag) && $editFlag)
            Edit Practise Set - {{$practiceSet['title']}}
        @else
            Create Practise Set
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
            <a href="/admin/practice-sets">
                <button class="btn bg-label-primary border-primary text-primary p-2 px-3">
                    <i class='bx bx-arrow-back'></i>
                    <span>
                        Back to Question Set
                    </span>
                </button>
            </a>
        </div>

        <div class="bg-white rounded-4 py-4 p-2 shadow">
            <div class="row m-0">
                <div class="col-lg-5 col-md-12 align-self-center my-2">
                    <h1 class="h4 text-dark my-1">Question Set Details</h1>
                    @if(isset($editFlag) && $editFlag)
                        <div class="mt-1">{{$practiceSet['title']}}</div>
                    @endif
                </div>
                <div class="col-lg-7 col-md-12 my-2">
                    <div class="row align-items-center justify-content-evenly">
                        @if(isset($editFlag) && $editFlag)
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

        <div class="bg-white rounded-4 py-4 p-3 shadow my-4">
            <div class="practice_set_form mx-auto">
                <div class="form-group my-4">
                    <label for="title" class="fw-medium text-dark">Title</label>
                    <input id="title" type="text" class="form-control" placeholder="Enter Title..." value="@if(isset($editFlag) && $editFlag){{$practiceSet['title']}}@endif">
                </div>

                <div class="form-group my-4">
                    <label for="subcategory" class="fw-medium text-dark">Year</label>
                    <select id="subcategory" class="form-select">
                        @foreach ($initialSubCategories as $key => $subcategory)
                            @if(isset($editFlag) && $editFlag && $practiceSet['sub_category_id'] == $subcategory['id'])
                                <option selected value="{{$subcategory['id']}}">{{$subcategory['name']}}</option>
                            @else
                                <option value="{{$subcategory['id']}}">{{$subcategory['name']}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <div class="form-group my-4 dropdown">
                    <label for="skill_Inp" class="fw-medium text-dark">Topic</label>
                    @if(isset($editFlag) && $editFlag)
                        <input id="skill_Inp" type="text" class="form-control dropdown-toggle" placeholder="Enter Topic..." data-id="{{$practiceSet['skill_id']}}" data-trigger="0" data-bs-toggle="dropdown" aria-expanded="true">
                    @else
                        <input id="skill_Inp" type="text" class="form-control dropdown-toggle" placeholder="Enter Topic..." data-id="" data-trigger="0" data-bs-toggle="dropdown" aria-expanded="true" autocomplete="off">
                    @endif
                    <ul id="skill_Dropdown" class="dropdown-menu w-100 p-0 overflow-auto">
                        <li class="dropdown-item text-center text-light" id="start_search">
                            Start typing to search.
                        </li>
                    </ul>
                </div>

                <div class="form-group mb-4">
                    <label for="summernote" class="fw-medium text-dark">Description</label>
                    <div class="my-3">
                        <textarea id="summernote">@if(isset($editFlag) && $editFlag){{$practiceSet['description']}}@endif</textarea>
                    </div>
                </div>
                
                <div class="mb-4 row">
                    <div class="col-12 col-sm-8">
                        <div id="isPaidText" class="h6 mb-1 text-dark">
                            @if(isset($editFlag) && $editFlag && $practiceSet['is_paid'])
                                Paid
                            @else
                                Free
                            @endif
                        </div>
                        <div class="lh-1 font-size-13">Paid (Accessible to only paid users). Free (Anyone can access).</div>
                    </div>
                    <div class="col-12 col-sm-4 d-flex align-items-center justify-content-sm-end">
                        <label class="switch mt-2">
                            @if(isset($editFlag) && $editFlag && $practiceSet['is_paid'])
                                <input id="isPaid" type="checkbox" checked>
                            @else
                                <input id="isPaid" type="checkbox">
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
                                @if(isset($editFlag) && $editFlag && $practiceSet['is_active'])
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
                            @if(isset($editFlag) && $editFlag && $practiceSet['is_active'])
                                <input id="isActive" type="checkbox" checked>
                            @else
                                <input id="isActive" type="checkbox">
                            @endif
                            <span class="slider round"></span>
                        </label>
                    </div>
                </div>
                
                <div id="formError" class="font-size-13 mb-2 text-danger"></div>
                <div class="text-end">
                    <button id="proceedPracticeSet" class="btn btn-primary my-4">
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

    <script  script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css">
 
    <script>
        $(document).ready(function(){
            $('#summernote').summernote({
                placeholder: 'Start Typing here...',
                tabsize: 2,
                height: 100,
                toolbar: [
                    ['font', ['bold', 'underline', 'clear']],
                    ['superscript', ['superscript']],
                    ['subscript', ['subscript']],
                    ['strikethrough', ['strikethrough']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['insert', ['link', 'picture']],
                    ['view', ['fullscreen', 'codeview']]
                ],
                callbacks: {
                    onInit: function() {
                        $('.note-toolbar').addClass('custom-toolbar');
                    }
                }
            });

            var issetEditFlag = null;
            var editFlag = false;
            var practiceSetId;
            @if(isset($editFlag) && $editFlag)
                issetEditFlag = {!! str_replace("'", "\'", json_encode(isset($editFlag))) !!};
                editFlag = {!! str_replace("'", "\'", json_encode($editFlag)) !!};
                practiceSetId = {!! str_replace("'", "\'", json_encode($practiceSet['id'])) !!};
            @endif        
            // is paid 
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
            // is active  
            $('#isActive').change(function() {
                let isActive = $(this).is(':checked');
                if(isActive){
                    $("#isActiveText").text("Published");
                } else {
                    $("#isActiveText").text("Draft");
                }
            });   
            // proceed practice 
            $("#proceedPracticeSet").click(function(){
                let title = $("#title").val();
                let subcategory = parseInt($("#subcategory").val());
                let selectedSkillId = parseInt($("#skill_Inp").attr("data-id"));
                let description = $("#summernote").val()?$("#summernote").val():"";
                let isPaid = $("#isPaid").is(':checked');
                let isActive = $("#isActive").is(':checked');
                if(title){
                    if(selectedSkillId){
                        var url;
                        var method;
                        if(issetEditFlag && editFlag){
                            url = '/admin/practice-sets/'+practiceSetId;
                            method = "PATCH";
                        } else {
                            url = '/admin/practice-sets';
                            method = "POST";
                        }
                        $.ajax({
                            type: method,
                            url: url,
                            data: {
                                description: description,
                                is_active: isActive,
                                is_paid: isPaid,
                                skill_id: selectedSkillId,
                                sub_category_id: subcategory,
                                title: title,
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(data) {
                                window.location.href = '/admin/practice-sets/'+data.practice_set+'/settings';
                            },
                            error: function(data, textStatus, errorThrown) {
                                console.log(textStatus);
                                console.log(data);
                            },
                        });
                    } else {
                        $("#formError").text("Please select topic from topics Dropdown");
                    }
                } else {
                    $("#formError").text("Title field is required");
                }
            });
            // on change 
            $('#title, #subcategory, #skill_Inp, #summernote, #isPaid, #isActive').change(function() {
                $("#formError").text("");
            });
            // skill search 
            $(document).on("keyup","#skill_Inp", function(e){
                $("#skill_Dropdown").empty();
                var search_query = $(this).val();
                if(search_query.length > 0) {
                    $.ajax({
                        type: "GET",
                        url: '/admin/search_skills',
                        data: {
                            query: search_query,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(data) {
                            // console.log(data);
                            let arrLength = data['skills'].length;
                            if(arrLength > 0) {
                                data['skills'].forEach(function(skill){
                                    $("#skill_Dropdown").append('<li class="dropdown-item cursor-pointer py-1 px-3 select_skill" data-id="'+skill.id+'">'+skill.name+'</li>');
                                });
                            } else {
                                $("#skill_Dropdown").append('<li class="dropdown-item text-danger text-center">No Result Found</li>');
                            }

                        },
                        error: function(data, textStatus, errorThrown) {
                            console.log(textStatus);
                            console.log(data);
                        },
                    });
                } else {
                    $("#skill_Inp").attr("data-id","");
                    $("#skill_Dropdown").append('<li class="dropdown-item text-center text-light" id="start_search">Start typing to search.</li>');
                }
            });
            // select skill 
            $(document).on("click",".select_skill", function(e){
                let selectedSkill = $(this).text().trim();
                let selectedSkillId = $(this).data("id");
                // console.log(selectedSkillId);
                $("#skill_Inp").val(selectedSkill);
                $("#skill_Inp").attr("data-trigger","1");
                $("#skill_Inp").attr("data-id",selectedSkillId);
                $("#formError").text("");
            });
            // ready ends 
        });
    </script>
</body>

</html>
