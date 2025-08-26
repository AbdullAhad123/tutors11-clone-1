<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Settings - {{$quiz['title']}}</title>
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
        .yes_selector.active{background-color: #efffe7 !important;color: #4b9f1d !important;border: 1px solid #4b9f1d !important;border-radius: 5px !important}
        .no_selector.active{background-color: #ffe5e1 !important;color: #e52403 !important;border: 1px solid #e52403 !important;border-radius: 5px !important}
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
            <a href="/admin/quizzes"><button class="btn bg_primary_label shadow border-primary text-primary p-2 px-3"><i class='bx bx-arrow-back'></i><span>Back to Quizzes</span></button></a>
        </div>

        <div class="bg-white rounded-4 py-4 p-3 shadow">
            <div class="row m-0">
                <div class="col-lg-5 col-md-12 align-self-center my-2">
                    <h1 class="h4 text-dark mb-0">Quiz Settings</h1>
                    <div class="mt-1 text-capitalize">{{$quiz['title']}}</div>
                </div>
                <div class="col-lg-7 col-md-12 my-2">
                    <div class="row align-items-center justify-content-evenly">
                        @foreach ($steps as $key => $step)
                            @if($step['status'] == 'active')
                                <a href="{{$step['url']}}" class="col-lg-3 col-md-3 col-sm-6 col-6 my-1 p-1">
                                    <button class="bg_primary_label border-primary btn w-100 my-1 fs-6">
                                        <span class="badge bg-primary circle-badge rounded-circle text-white"> {{$key + 1}} </span> 
                                        {{$step['title']}}
                                    </button>
                                </a>                        
                            @else
                                <a href="{{$step['url']}}" class="col-lg-3 col-md-3 col-sm-6 col-6 my-1 p-1">
                                    <button class="btn btn-outline-primary w-100 my-1 fs-6">
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
            <div class="alert_failed rounded-3 p-3 d-flex align-items-center my-4"><i class='bx bx-x-circle me-1 fs-5'></i>{{Session::get('errorMessage')}}</div>
        @endif

        <div class="bg-white rounded-4 py-4 my-4 shadow">
            <div class="container practice_set_form">
                <div class="row border-bottom my-4">
                    <div class="col-md-6 p-3 border-end">
                        <div class="justify-content-between align-items-center mb-4 custom-inp-group">
                            <div>
                                Duration Mode
                                <span class="position-relative">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 cursor-pointer text-primary show_tooltip"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    <div class="bg-white position-absolute px-3 py-1 shadow start-0 rounded font-size-13 custom-tooltip d-none zindex-1">
                                        <div><span class="text-success">Auto</span> - Duration will be calculated based on questions' default time</div>
                                        <div><span class="text-danger">Manual</span> - Duration will be considered as specified</div>
                                    </div>
                                </span>
                            </div>
                            <div>
                                <input id="durationMode" class="inp allowDropdown" value="true" type="hidden">
                                <span class="my-1 btn border rounded-0 radio_selector yes_selector active">Auto</span>
                                <span class="my-1 btn border rounded-0 radio_selector no_selector">Manual</span>
                            </div>
                        </div>
                        <div id="durationModeSection" class="d-none justify-content-between align-items-center mb-4">
                            <div>
                                Duration (Minutes)
                            </div>
                            <div>
                                <input id="total_duration" class="inp mt-2 form-control" type="number" min="1" placeholder="Enter Duration (In Mintues)">
                            </div>
                        </div>
                        <div class="justify-content-between align-items-center mb-4 custom-inp-group">
                            <div>
                                Marks/Points Mode
                                <span class="position-relative">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 cursor-pointer text-primary show_tooltip"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    <div class="bg-white position-absolute px-3 py-1 shadow start-0 rounded font-size-13 custom-tooltip d-none zindex-1">
                                        <div><span class="text-success">Auto</span> - Marks/Points will be calculated based on questions' default marks</div>
                                        <div><span class="text-danger">Manual</span> - Marks/Points will be assigned to each question as specified</div>
                                    </div>
                                </span>
                            </div>
                            <div>
                                <input id="pointsMode" class="inp allowDropdown" value="true" type="hidden">
                                <span class="my-1 btn border rounded-0 radio_selector yes_selector active">Auto</span>
                                <span class="my-1 btn border rounded-0 radio_selector no_selector">Manual</span>
                            </div>
                        </div>
                        <div id="pointsModeSection" class="d-none justify-content-between align-items-center mb-4">
                            <div>
                                Points for Correct Answer
                            </div>
                            <div>
                                <input id="pointsCA" class="inp mt-2 form-control" type="number" min="1" placeholder="Enter Marks">
                            </div>
                        </div>
                        <div class="justify-content-between align-items-center mb-4 custom-inp-group">
                            <div>
                                Negative Marking
                                <span class="position-relative">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 cursor-pointer text-primary show_tooltip"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    <div class="bg-white position-absolute px-3 py-1 shadow start-0 rounded font-size-13 custom-tooltip d-none zindex-1">
                                        <div><span class="text-success">Yes</span> - Negative marking will be considered as specified</div>
                                        <div><span class="text-danger">No</span> - No Negative marking</div>
                                    </div>
                                </span>
                            </div>
                            <div>
                                <input id="negativeMarking" class="inp allowDropdown showOnYes" value="false" type="hidden">
                                <span class="my-1 btn border rounded-0 radio_selector yes_selector">Yes</span>
                                <span class="my-1 btn border rounded-0 radio_selector no_selector active">No</span>
                            </div>
                        </div>
                        <div id="negativeMarkingSection" class="justify-content-between align-items-center mb-4 d-none">
                            <div class="justify-content-between align-items-center mb-4 custom-inp-group">
                                <div>
                                    Negative Marking Type
                                    <span class="position-relative">
                                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 cursor-pointer text-primary show_tooltip"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                        <div class="bg-white position-absolute px-3 py-1 shadow start-0 rounded font-size-13 custom-tooltip d-none zindex-1">
                                            <div><span class="text-success">Fixed</span> - Fixed amount will be deduct from question marks</div>
                                            <div><span class="text-danger">Percentage</span> - Percentage will be deduct from question marks</div>
                                        </div>
                                    </span>
                                </div>
                                <div>
                                    <input id="negativeMarkingType" class="inp" value="true" type="hidden">
                                    <span class="btn border rounded-0 radio_selector negativeMarksTypeSelector yes_selector active">Fixed</span>
                                    <span class="btn border rounded-0 radio_selector negativeMarksTypeSelector no_selector">Percentage</span>
                                </div>
                            </div>
                            <div>
                                Negative Marks
                            </div>
                            <div>
                                <input id="negativeMarks" class="inp mt-2 form-control" type="number" min="1" placeholder="Enter Number">
                            </div>
                        </div>
                        <div class="mb-4">
                            <div>Pass Percentage</div>
                            <div><input id="passPercentage" class="inp mt-2 form-control" type="number" min="0" max="100" value="60" placeholder="Enter Percentage"></div>
                        </div>
                    </div>
                    <div class="col-md-6 p-3">
                        <div class="justify-content-between align-items-center mb-4 custom-inp-group">
                            <div>
                                Shuffle Questions
                                <span class="position-relative">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 cursor-pointer text-primary show_tooltip"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    <div class="bg-white position-absolute px-3 py-1 shadow end-0 rounded font-size-13 custom-tooltip d-none zindex-1">
                                        <div><span class="text-success">Yes</span> - Questions will be shuffled for each attempt</div>
                                        <div><span class="text-danger">No</span> - Questions will not be shuffled</div>
                                    </div>
                                </span>
                            </div>
                            <div>
                                <input id="shuffleQuestions" class="inp" value="false" type="hidden">
                                <span class="my-1 btn border rounded-0 radio_selector yes_selector">Yes</span>
                                <span class="my-1 btn border rounded-0 radio_selector no_selector active">No</span>
                            </div>
                        </div>
                        <div class="justify-content-between align-items-center mb-4 custom-inp-group">
                            <div>
                                Restrict Attempts
                                <span class="position-relative">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 cursor-pointer text-primary show_tooltip"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    <div class="bg-white position-absolute px-3 py-1 shadow start-0 rounded font-size-13 custom-tooltip d-none zindex-1">
                                        <div><span class="text-success">Yes</span> - Attempts will be restricted as specified</div>
                                        <div><span class="text-danger">No</span> - Unlimited attempts</div>
                                    </div>
                                </span>
                            </div>
                            <div>
                                <input id="restrictAttempts" class="inp allowDropdown showOnYes" value="false" type="hidden">
                                <span class="my-1 btn border rounded-0 radio_selector yes_selector">Yes</span>
                                <span class="my-1 btn border rounded-0 radio_selector no_selector active">No</span>
                            </div>
                        </div>
                        <div id="restrictAttemptsSection" class="justify-content-between align-items-center mb-4 d-none">
                            <div>
                                Number of Attempts
                            </div>
                            <div>
                                <input id="NumberOfAttempts" class="inp mt-2 form-control" type="number" min="1" placeholder="Enter Number">
                            </div>
                        </div>
                        <div class="justify-content-between align-items-center mb-4 custom-inp-group">
                            <div>
                                Disable Finish Button
                                <span class="position-relative">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 cursor-pointer text-primary show_tooltip"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    <div class="bg-white position-absolute px-3 py-1 shadow end-0 rounded font-size-13 custom-tooltip d-none zindex-1">
                                        <div><span class="text-success">Yes</span> - Test Finish button will be disabled</div>
                                        <div><span class="text-danger">No</span> - Test Finish button will be displayed</div>
                                    </div>
                                </span>
                            </div>
                            <div>
                                <input id="disableFinish" class="inp" value="false" type="hidden">
                                <span class="my-1 btn border rounded-0 radio_selector yes_selector">Yes</span>
                                <span class="my-1 btn border rounded-0 radio_selector no_selector active">No</span>
                            </div>
                        </div>
                        <div class="justify-content-between align-items-center mb-4 custom-inp-group">
                            <div>
                                Enable Question List View
                                <span class="position-relative">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 cursor-pointer text-primary show_tooltip"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    <div class="bg-white position-absolute px-3 py-1 shadow end-0 rounded font-size-13 custom-tooltip d-none zindex-1">
                                        <div><span class="text-success">Yes</span> - User can be able to see all questions as list</div>
                                        <div><span class="text-danger">No</span> - User cannot be able to see all questions as list</div>
                                    </div>
                                </span>
                            </div>
                            <div>
                                <input id="enableList" class="inp" value="true" type="hidden">
                                <span class="my-1 btn border rounded-0 radio_selector yes_selector active">Yes</span>
                                <span class="my-1 btn border rounded-0 radio_selector no_selector">No</span>
                            </div>
                        </div>
                        <div class="justify-content-between align-items-center mb-4 custom-inp-group">
                            <div>
                                Hide Solutions
                                <span class="position-relative">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 cursor-pointer text-primary show_tooltip"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    <div class="bg-white position-absolute px-3 py-1 shadow end-0 rounded font-size-13 custom-tooltip d-none zindex-1">
                                        <div><span class="text-success">Yes</span> - Solutions will not be shown in results</div>
                                        <div><span class="text-danger">No</span> - Solutions will be shown in results</div>
                                    </div>
                                </span>
                            </div>
                            <div>
                                <input id="hideSolutions" class="inp" value="false" type="hidden">
                                <span class="my-1 btn border rounded-0 radio_selector yes_selector">Yes</span>
                                <span class="my-1 btn border rounded-0 radio_selector no_selector active">No</span>
                            </div>
                        </div>
                        <div class="justify-content-between align-items-center mb-4 custom-inp-group">
                            <div>
                                Show Leaderboard
                                <span class="position-relative">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 cursor-pointer text-primary show_tooltip"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    <div class="bg-white position-absolute px-3 py-1 shadow end-0 rounded font-size-13 custom-tooltip d-none zindex-1">
                                        <div><span class="text-success">Yes</span> - Leaderboard will be shown to test takers</div>
                                        <div><span class="text-danger">No</span> - Leaderboard will not be shown to test takers</div>
                                    </div>
                                </span>
                            </div>
                            <div>
                                <input id="showLeaderboard" class="inp" value="true" type="hidden">
                                <span class="my-1 btn border rounded-0 radio_selector yes_selector active">Yes</span>
                                <span class="my-1 btn border rounded-0 radio_selector no_selector">No</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="formError" class="font-size-13 mb-2 text-danger"></div>
                <div class="text-end my-3">
                    <button id="proceedquiz" class="btn btn-primary">Save & Proceed</button>
                </div>
            </div>
        </div>

    </section>
   
    <script>
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
        $(".negativeMarksTypeSelector").click(function(){
            var option = $(this).hasClass("yes_selector");
            if(option){
                $("#negativeMarks").attr("placeholder","Enter Number")
            } else {
                $("#negativeMarks").attr("placeholder","Enter Percentage")
            }
        });
        $(".show_tooltip").mouseover(function(){
            $(this).siblings(".custom-tooltip").removeClass('d-none');
        });
        $(".show_tooltip").mouseout(function(){
            $(this).siblings(".custom-tooltip").addClass('d-none');
        });
        $("#proceedquiz").click(function(){
            let quiz_id = {!! str_replace("'", "\'", json_encode($quiz['id'])) !!};
            let auto_duration = $("#durationMode").val();
            let total_duration = $("#total_duration").val()?$("#total_duration").val():null;
            let auto_grading = $("#pointsMode").val();
            let correct_marks = $("#pointsCA").val()?$("#pointsCA").val():null;
            let enable_negative_marking = $("#negativeMarking").val();
            let negative_marking_type = $("#negativeMarkingType").val()=="true"?"fixed":"percentage";
            let negative_marks = $("#negativeMarks").val()?$("#negativeMarks").val():null;
            let cutoff = $("#passPercentage").val()?$("#passPercentage").val():null;
            let shuffle_questions = $("#shuffleQuestions").val();
            let restrict_attempts = $("#restrictAttempts").val();
            let no_of_attempts = $("#NumberOfAttempts").val()?$("#NumberOfAttempts").val():null;
            let disable_finish_button = $("#disableFinish").val();
            let list_questions = $("#enableList").val();
            let hide_solutions = $("#hideSolutions").val();
            let show_leaderboard = $("#showLeaderboard").val();
            $.ajax({
                type: "POST",
                url: '/admin/quizzes/'+quiz_id+'/settings',
                data: {
                    auto_duration: auto_duration,
                    total_duration: total_duration,
                    auto_grading: auto_grading,
                    correct_marks: correct_marks,
                    enable_negative_marking: enable_negative_marking,
                    negative_marking_type: negative_marking_type,
                    negative_marks: negative_marks,
                    cutoff: cutoff,
                    shuffle_questions: shuffle_questions,
                    restrict_attempts: restrict_attempts,
                    no_of_attempts: no_of_attempts,
                    disable_finish_button: disable_finish_button,
                    list_questions: list_questions,
                    hide_solutions: hide_solutions,
                    show_leaderboard: show_leaderboard,
                    disable_question_navigation: false,
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    console.log("success");
                    if(data.quiz){
                        window.location.href = "/admin/quizzes/"+data.quiz+"/questions";
                    }
                },
                error: function(data, textStatus, errorThrown) {
                    console.log(textStatus);
                    var obj = data.responseJSON.errors;
                    let formError = obj[Object.keys(obj)[0]][0];
                    $("#formError").text(formError);
                },
            });
            
        });
    </script>

</body>

</html>
