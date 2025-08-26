<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Journey Set - {{$set->title}}</title>
    <!-- rel icon -->
    <link rel="icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}">
    <meta name="description" content="{{ app(\App\Settings\SiteSettings::class)->seo_description }}">
    <meta name="author" content="{{ app(\App\Settings\SiteSettings::class)->app_name }}">
    <!-- bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
        .cursor-not-allowed{cursor:not-allowed !important}
        .practice_set_form{max-width: 600px !important;}
        #start_search:hover,#start_search:active{background: transparent;cursor: default;color: #bcc4cc !important;}
        #skill_Dropdown{max-height: 175px;}
        .font-size-13{font-size:13px;}
        input::-webkit-outer-spin-button,input::-webkit-inner-spin-button {-webkit-appearance: none;margin: 0;}
        input[type=number] {-moz-appearance: textfield;}
        label, .label {color: #000;font-size: 16px;margin-bottom: 10px;}
        thead {background: #002978;color: #fff;}
        .yes_selector.active{background-color: #e8fadf !important;color: #71dd37 !important;}
        .no_selector.active{background-color: #ffe0db !important;color: #ff3e1d !important;}
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

        <div class="my-4">
            <h1 class="text-dark my-2">Journey Level Set</h1>
            <p class="text-dark fs-5 my-2">Effortlessly edit, manage and update the set of any level in journey in just a click.</p>
        </div>
    

        @if (Session::has('errorMessage'))
            <div class="alert_failed rounded-3 p-3 d-flex align-items-center my-4"><i class='bx bx-x-circle me-1 fs-5'></i>{{Session::get('errorMessage')}}</div>
        @endif

        <div class="bg-white my-4 py-4 p-3 shadow rounded-4">
            <h2 class="text-dark h4 my-3 fw-normal">Set: {{$set->title}}</h2>
            <form action="{{route('update_journey_set', ['id' => $set->id])}}" method="POST" enctype="multipart/form-data">
                @csrf            
                <div class="form-group my-4">
                    <label for="title">Title</label>
                    <input id="journey_title" type="text" name="title" placeholder="Enter a title" class="form-control" value="{{$set->title}}" required>
                </div>

                <div class="form-group my-4">
                    <label for="subtitle">Subtitle</label>
                    <input id="journey_subtitle" type="text" name="subtitle" placeholder="Enter a subtitle" class="form-control" value="{{$set->subtitle}}">
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="justify-content-between align-items-center mb-4 custom-inp-group">
                            <div>
                                <span class="label">Allow Reward Points</span>
                                <span class="position-relative">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 cursor-pointer text-primary show_tooltip"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    <div class="bg-white position-absolute px-3 py-1 shadow start-0 rounded font-size-13 custom-tooltip d-none zindex-1">
                                        <div><span class="text-success">Yes</span> - Points will be rewarded for each correct answer</div>
                                        <div><span class="text-danger">No</span> - No points will be rewarded</div>
                                    </div>
                                </span>
                            </div>
                            <div>
                                <input id="allowRewardPoints" name="allow_reward_points" class="inp" value="true" type="hidden">
                                <span class="btn border rounded-0 radio_selector yes_selector active">Yes</span>
                                <span class="btn border rounded-0 radio_selector no_selector">No</span>
                            </div>
                        </div>
                        <div class="justify-content-between align-items-center mb-4 custom-inp-group">
                            <div>
                                <span class="label">Points Mode</span>
                                <span class="position-relative">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 cursor-pointer text-primary show_tooltip"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    <div class="bg-white position-absolute px-3 py-1 shadow start-0 rounded font-size-13 custom-tooltip d-none zindex-1">
                                        <div><span class="text-success">Auto</span> - Points will be assigned based on question's default marks</div>
                                        <div><span class="text-danger">Manual</span> - Points will be assigned to each correct answered question as specified</div>
                                    </div>
                                </span>
                            </div>
                            <div>
                                <input id="pointsMode" name="points_mode" class="inp allowDropdown" value="true" type="hidden">
                                <span class="btn border rounded-0 radio_selector yes_selector active">Auto</span>
                                <span class="btn border rounded-0 radio_selector no_selector">Manual</span>
                            </div>
                        </div>
                        <div id="pointsModeSection" class="d-none justify-content-between align-items-center mb-4">
                            <div class="label">Points for Correct Answer</div>
                            <div>
                                <input id="pointsCA" name="points_ca" class="inp mt-2 form-control" type="number" min="1" placeholder="Points">
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="justify-content-between align-items-center mb-4 custom-inp-group">
                            <div>
                                <span class="label">Show Reward Popup</span>
                                <span class="position-relative">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 cursor-pointer text-primary show_tooltip"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    <div class="bg-white position-absolute px-3 py-1 shadow start-0 rounded font-size-13 custom-tooltip d-none zindex-1">
                                        <div><span class="text-success">Yes</span> - Shows reward popup on correct answer</div>
                                        <div><span class="text-danger">No</span> - No popup will be shown</div>
                                    </div>
                                </span>
                            </div>
                            <div>
                                <input id="showRewardPopup" name="show_reward_popup" class="inp" value="true" type="hidden">
                                <span class="btn border rounded-0 radio_selector yes_selector active">Yes</span>
                                <span class="btn border rounded-0 radio_selector no_selector">No</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="justify-content-between align-items-center mb-4 custom-inp-group">
                            <div>
                                <span class="label">Change Questions</span>
                                <span class="position-relative">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 cursor-pointer text-primary show_tooltip"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    <div class="bg-white position-absolute px-3 py-1 shadow start-0 rounded font-size-13 custom-tooltip d-none zindex-1">
                                        <div><span class="text-success">Yes</span> - Update the questions in this group set.</div>
                                        <div><span class="text-danger">No</span> - Won't update the questions</div>
                                    </div>
                                </span>
                            </div>
                            <div>
                                <input id="updateQuestion" name="update_question" class="inp" value="false" type="hidden">
                                <span id="yes_updateQuestion" class="btn border rounded-0 radio_selector yes_selector">Yes</span>
                                <span id="no_updateQuestion" class="btn border rounded-0 radio_selector no_selector active">No</span>
                            </div>
                        </div>
                    </div>

                    <div id="updateQuestionSection" class="d-none">
                        <div class="form-group my-3">
                            <label for="topic">Topic</label>
                            <select class="form-control" name="topic" id="topic">
                                @foreach($initialTopics as $key => $topic)
                                    @if($topic['id'] == $set->skill_id)
                                        <option value="{{$topic['id']}}" selected>{{$topic['name']}}</option>
                                    @else
                                        <option value="{{$topic['id']}}">{{$topic['name']}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group my-3" id="sub_topic_wrap">
                            <label for="sub_topic">Sub Topic</label>
                            <div class="selected_sub_topic_wrap"></div>
                            <input type="hidden" name="subtopics_arr" id="subtopics_arr" value="">
                            <select class="form-control" name="sub_topic" id="sub_topic">
                                <option value="">Select Sub-Topic</option>
                                @foreach($initialSubTopics as $key => $subTopic)
                                    <option class="select_sub_topic" data-topic-id="{{$subTopic['topic_id']}}" value="{{$subTopic['id']}}">{{$subTopic['name']}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group my-4 d-grid">
                            <label for="queNumRanger">No. of questions</label>
                            <div class="d-flex align-items-center my-2">
                                <button class="btn btn-outline-primary px-3 p-2 m-1 add_custom_range" type="button" data-value='15'>15</button>
                                <button class="btn btn-outline-primary px-3 p-2 m-1 add_custom_range" type="button" data-value='20'>20</button>
                                <button class="btn btn-outline-primary px-3 p-2 m-1 add_custom_range" type="button" data-value='25'>25</button>
                                <button class="btn btn-outline-primary px-3 p-2 m-1 add_custom_range" type="button" data-value='30'>30</button>
                            </div>
                            <input type="range" name="questions_num" id="queNumRanger" class="form-control-range shadow-none" min="0" max="30" value="0">
                            <div class="mt-2 label"><span id="totalQueNum" >0</span> Questions</div>
                        </div>
                    </div>
                </div>

                <div class="form-group mb-4">
                    <label for="journeySetDesc">Description:</label>
                    <div class="my-3">
                        <textarea id="journeySetDesc" name="description"></textarea>
                    </div>
                </div>

                <div class="mb-4 row">
                    <div class="col-12 col-sm-8">
                        <div id="journeySetIsPaidText" class="h6 mb-1 text-dark">
                            Free
                        </div>
                        <div class="lh-1 font-size-13">Paid (Accessible to only paid users). Free (Anyone can access).</div>
                    </div>
                    <div class="col-12 col-sm-4 d-flex align-items-center justify-content-sm-end">
                        <label class="switch mt-2">
                            <input id="journeySetIsPaid" name="is_paid" type="checkbox">
                            <span class="slider round"></span>
                        </label>
                    </div>
                </div>

                <div class="mb-4 row">
                    <div class="col-12 col-sm-8">
                        <div class="h6 mb-1 text-dark">
                            Status - 
                            <span id="journeySetisActiveText">
                                @if($set['is_active'] == true)
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
                            @if($set['is_active'] == true)
                                <input id="journeySetisActive" name="is_active" type="checkbox" checked>
                            @else
                                <input id="journeySetisActive" name="is_active" type="checkbox">
                            @endif
                            <span class="slider round"></span>
                        </label>
                    </div>
                </div>
                <div class="text-end">
                    <div id="formError" class="font-size-13 mb-2 text-danger"></div>
                </div>
                <div class="w-100 text-end">
                    <input type="submit" value="Update" class="btn btn-primary">
                </div>
            </form>
        </div>

    </section>

    <script  script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css">
 
    <script>
        $("#journey_title").keyup(function(){
            $("#NewTagFormError").text("");
        });
        $('#queNumRanger[type="range"]').on('input', function(){
            const $this = $(this);
            $('#totalQueNum').html($this.val());
        });
        getSubTopics($("#topic").val());
        $("#topic").change(function(){
            $(".selected_sub_topic_wrap").empty();
            $("#subtopics_arr").val("");
            getSubTopics($(this).val());
        });
        function getSubTopics(topic){
            if($("#sub_topic").find("option[data-topic-id='"+topic+"']").length > 0){
                $("#sub_topic").find("option").addClass('d-none');
                $("#sub_topic").find("option[data-topic-id='"+topic+"']").removeClass('d-none');
                $("#sub_topic_wrap").show();
            } else {
                $("#sub_topic").val("");
                $("#sub_topic_wrap").hide();
            }
        }
        $('#isActive').change(function() {
            let isActive = $(this).is(':checked');
            if(isActive){
                $("#isActiveText").text("Published");
            } else {
                $("#isActiveText").text("Draft");
            }
        });
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

        // is paid 
        $('#journeySetIsPaid').change(function() {
            let journeySetIsPaid = $(this).is(':checked');
            if(journeySetIsPaid){
                $("#journeySetIsPaidText").text("Paid");
            } else {
                $("#journeySetIsPaidText").text("Free");
                
            }
        });  
        // is active  
        $('#journeySetisActive').change(function() {
            let journeySetisActive = $(this).is(':checked');
            if(journeySetisActive){
                $("#journeySetisActiveText").text("Published");
            } else {
                $("#journeySetisActiveText").text("Draft");
            }
        }); 
        $("#yes_updateQuestion").click(function(){
            $("#updateQuestionSection").removeClass('d-none');
        });
        $("#no_updateQuestion").click(function(){
            $("#updateQuestionSection").addClass('d-none');
        });

        $(document).on("click", ".cancel_subtopic", function () {
            let idToRemove = $(this).parent().data('id');
            let subtopicsArr = $("#subtopics_arr");
            subtopicsArr.val((i, val) => val.split(',').filter(id => id != idToRemove).join(','));
            $(this).parent().remove();
        });
        $("#sub_topic").change(function() {
            var selectedText = $(this).find("option:selected").text();
            var selectedValue = $(this).find("option:selected").val();
            let length = $(".selected_sub_topic_wrap").find("#subtopic"+selectedValue).length;
            if(length < 1){
                let tab = `<div id="subtopic`+selectedValue+`" data-id="`+selectedValue+`" class="p-1 badge bg-primary d-inline-flex align-items-center mb-2 me-2"><span>`+selectedText+`</span><i class="bx bx-x border-start ms-2 cursor-pointer cancel_subtopic"></i></div>`;
                let subtopics = $("#subtopics_arr").val();
                $("#subtopics_arr").val(subtopics !== "" ? subtopics + "," + selectedValue : selectedValue);
                $(".selected_sub_topic_wrap").append(tab);
            }
        });
        
        $(document).ready(function(){
            $('#summernote, #journeySetDesc').summernote({
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
        });
        $(".add_custom_range").click(function(e) {
            e.preventDefault();
            const get_range = $(this).data('value');
            $("#queNumRanger").val(get_range);
            $("#totalQueNum").text(get_range);
        });
    </script>

</body>

</html>
