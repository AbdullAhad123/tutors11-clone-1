<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Question Set Details</title>
    <!-- rel icon -->
    <link rel="icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}">
    <meta name="description" content="{{ app(\App\Settings\SiteSettings::class)->seo_description }}">
    <meta name="author" content="{{ app(\App\Settings\SiteSettings::class)->app_name }}">
    <style>
        .cursor-not-allowed{cursor:not-allowed !important}
        .practice_set_form{max-width: 600px !important;}
        #start_search:hover,#start_search:active{background: transparent;cursor: default;color: #bcc4cc !important;}
        #skill_Dropdown{max-height: 175px;}
        .font-size-13{font-size:13px;}
        #title {
            border: 1px solid #dddddd;
        }

        .greeting_section {
            height: auto;
            width: auto;
            margin: 2rem auto !important;
            background: linear-gradient(147deg, #003d9c, #277cff);
        }

        .bg_label_secondary{
            background: #ffe1a6 !important;
            border: 1px solid #ffbe3f !important;
            box-shadow: 0px 3px 9px 0px #00000040;
        }

        .bg_label_gray{
            background: #eaeaea !important;
            border: 1px solid #707070 !important;
            box-shadow: 0px 3px 9px 0px #00000040;
        }
        .nav-tabs .nav-link.active, .nav-tabs .nav-item.show .nav-link {
            color: #0078ff !important;
            border-bottom: 2px solid #0078ff !important;
        }
        .select_subject_btn {
            min-height: 250px;
            max-height: fit-content;
            border: 2px solid #ffffff !important;
        }
        .select_subject_btn.subject_active {
            border: 2px solid #007eff !important;
        }
        .form-check-input:checked {
            background-color: var(--portal-secondary) !important;
            border-color: var(--portal-secondary) !important;
        }
        .accordion-button:not(.collapsed) {
            color: #0051c7 !important;
            background-color: #deebff !important;
            box-shadow: inset 0 calc(-1 * var(--bs-accordion-border-width)) 0 #6c9dce !important;
        }
    </style>
</head>

<body> 
    @include('sidebar')
    @include('header')

    <div class="greeting_section rounded-5 p-4 row m-0 align-items-center">
        <div class='col-lg-6 col-md-6 col-sm-12 col-12'>
            <h1 class="display-6 fw-medium my-1 text-capitalize text-white">Personalised Practises</h1>
            <p class="fs_cs_5 fw-light text-white">Engage in specialized practise routines crafted to address specific skill areas, ensuring focused improvement and accelerated learning for Personalised success.</p>
        </div>
        <div class='col-lg-6 col-md-6 col-sm-12 col-12 text-lg-end text-md-end text-center'>
            <img src="{{url('images\practice_sets_illustration.png')}}" height='auto' width='280' class='parent_portal_banner_image' alt="">
        </div>
    </div>

    <!-- <div class="bg-white rounded py-4">
        <div class="row m-0">
            <div class="col-lg-5 col-md-12 align-self-center">
                <h1 class="h3 fw-normal text-dark mb-0">Practice Set Details</h1>
            </div>
            <div class="col-lg-7 col-md-12 d-flex justify-content-end">
                @foreach ($steps as $key => $step)
                    @if(++$key != 2)
                        @if($step['status'] == 'active')
                            <button class="btn mx-2 p-2 px-3 bg_label_secondary"> <span class="badge bg-light circle-badge rounded-circle text-black"> {{$key + 1}} </span> {{$step['title']}} </button>
                        @else
                            <button class="btn mx-2 p-2 px-3 bg_label_gray cursor-not-allowed"> <span class="badge bg-black circle-badge rounded-circle text-white"> {{$key + 1}} </span> {{$step['title']}} </button>
                        @endif
                    @endif
                @endforeach
            </div>
        </div>
    </div> -->

    <div class="align-items-center border-bottom d-flex flex-wrap justify-content-between mt-5 my-4 pt-4 pb-0 rounded-3">
        <h2 class="fw-normal h3 text-dark">Enter Question Set Details</h2>
        <ul class="justify-content-center nav nav-tabs" id="myTab" role="tablist">
            @foreach ($steps as $key => $step)
                @if(++$key != 2)
                    @if($step['status'] == 'active')
                        <li class="nav-item" role="presentation">
                            <button class="nav-link bg-transparent active" id="details-tab" type="button">Practise {{$step['title']}}</button>
                        </li>
                    @else
                        <li class="nav-item" role="presentation">
                            <button class="nav-link bg-transparent cursor-not-allowed" id="questions-tab" type="button">Practise {{$step['title']}}</button>
                        </li>
                    @endif
                @endif
            @endforeach
            
            <!-- <li class="nav-item" role="presentation">
                <button class="nav-link bg-transparent" id="questions-tab" type="button">Practice Questions</button>
            </li> -->
        </ul>
    </div>

    <div class="my-4">
        <div>
            <div class="form-group my-4 col-sm-8">
                <label class="d-flex fs-5 mb-2 text-dark" for="title">Practise Title<button class="bg-transparent border-0 btn ms-1 p-0 shadow-none" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Enter a title of your Personalised practise set"><i class="bx text-primary bx-info-circle"></i></button></label>
                <input id="title" type="text" class="form-control fs_cs_5 fw-light p-2 px-3 shadow-sm text-dark" placeholder="Enter practise title">
                <p class="text-danger small my-2 d-none title_input_error">The title field is required</p>
            </div>
            
            <!-- <div class="d-flex align-items-center justify-content-around my-3">
                @foreach ($sections as $key => $section)
                    <label class="bg-white px-4 py-3 me-2 rounded d-inline-flex align-items-center cursor-pointer border border-2 border-white select_year
                        @if(isset($practice_subject) && $practice_subject)
                            @if($practice_subject == $section['id'])
                                border-primary
                            @endif
                        @else
                            @if($key <= 0)
                                border-primary
                            @endif
                        @endif
                    ">
                        <img src="{{$section['icon']}}" height="40" width='40' alt="{{$section['name']}}">
                        <span class="fs-5 mx-3 text-dark">{{$section['name']}}</span> 
                        @if(isset($practice_subject) && $practice_subject)
                            @if($practice_subject == $section['id'])
                                <input type="radio" class="form-check-input subject" name="subject" value="{{$section['id']}}" checked>
                            @else
                                <input type="radio" class="form-check-input subject" name="subject" value="{{$section['id']}}">
                            @endif
                        @else
                            @if($key <= 0)
                                <input type="radio" class="form-check-input subject" name="subject" value="{{$section['id']}}" checked>
                            @else
                                <input type="radio" class="form-check-input subject" name="subject" value="{{$section['id']}}">
                            @endif
                        @endif
                    </label>
                @endforeach
            </div> -->

            <div class='my-5'>
                <h2 class="fw-normal h3 my-2">Select a Subject</h2>
                <div class="row align-items-center justify-content-around">
                    @foreach ($sections as $key => $section)
                        <div class="col-lg-3 col-md-4 col-sm-6 col-8 my-2">
                            <button class="btn bg-white shadow p-4 rounded-4 select_subject_btn 
                                @if(isset($practice_subject) && $practice_subject)
                                    @if($practice_subject == $section['id'])
                                        subject_active
                                    @endif
                                @else
                                    @if($key < 1)
                                        subject_active
                                    @endif
                                @endif
                            " data-id="{{$section['id']}}">
                                <div class="text-center"><img src="{{$section['icon']}}" height='50' width='50' class='mb-2' alt="{{$section['name']}}"></div>
                                <h2 class="text-center h5 fw-normal my-2">{{$section['name']}}</h2>
                                <p class="text-center fw-light small">Select a subject to explore its topics and subtopics.</p> 
                            </button>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- <div class="form-group my-4 py-2">
                @foreach ($topics as $key => $topic)
                    <div class="topic_wrap my-3">
                        <div class="d-flex position-relative ps-4 text-black fw-semibold my-2 topic" data-section_id="{{$topic['section_id']}}">
                            @if(count($topic['subTopics']) > 0)
                                <i class="bx bx-chevron-down position-absolute start-0 h-100 d-flex align-items-center fs-4"></i>
                            @endif
                            <div class="form-check">
                                @if(isset($practice_topic) && $practice_topic && $practice_topic == $topic['id'])
                                    <input type="radio" class="form-check-input topic_inp" id="radio{{++$key}}" name="topic" value="{{$topic['id']}}" checked>
                                @else
                                    <input type="radio" class="form-check-input topic_inp" id="radio{{++$key}}" name="topic" value="{{$topic['id']}}">
                                @endif
                                <label class="cursor-pointer form-check-label fs_cs_5 ms-1 cursor-pointer fs-5 fw-normal" for="radio{{$key}}">{{$topic['name']}}</label>
                            </div>
                        </div>
                        @if(count($topic['subTopics']) > 0)
                            <div class="sub_topic_wrap mb-3 d-none" data-topic_id="{{$topic['id']}}">
                                @foreach ($topic['subTopics'] as $k => $subtopic)
                                    <div class="ms-5">
                                        <div class="form-check mb-2">
                                            @if(isset($practice_sub_topics) && count($practice_sub_topics) > 0 && in_array($subtopic['id'], $practice_sub_topics))
                                                <input class="form-check-input sub_topic_inp" type="checkbox" id="check{{$key.++$k}}" name="sub_topic" value="{{$subtopic['id']}}" checked>
                                            @else
                                                <input class="form-check-input sub_topic_inp" type="checkbox" id="check{{$key.++$k}}" name="sub_topic" value="{{$subtopic['id']}}">
                                            @endif
                                            <label class="form-check-label fs_cs_5 ms-1 cursor-pointer" for="check{{$key.$k}}">{{$subtopic['topic_name']}}</label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                @endforeach
            </div> -->

            <div class="my-5">
                <p class="fs_cs_5 fw-light">Pick a topic within the selected subject where you believe your child may need improvement. Feel free to select subtopics under each main topic, facilitating comprehensive practise and focused skill development for your child.</p>
                <div class="my-4">
                    <div class="accordion topic_wrap" id="accordionExample">
                        @foreach ($topics as $key => $topic)
                            <div class="accordion-item topic" data-section_id="{{$topic['section_id']}}">
                                <h2 class="accordion-header">
                                    @if(isset($practice_topic) && $practice_topic && $practice_topic == $topic['id'])
                                        <button class="accordion-button fw-normal" type="button" data-bs-toggle="collapse" data-id="{{$topic['id']}}" data-bs-target="#collapse{{$topic['id']}}" aria-controls="collapse{{$topic['id']}}" aria-expanded="true">{{$topic['name']}}</button>
                                    @else
                                        <button class="accordion-button fw-normal collapsed" type="button" data-bs-toggle="collapse" data-id="{{$topic['id']}}" data-bs-target="#collapse{{$topic['id']}}" aria-controls="collapse{{$topic['id']}}" aria-expanded="false">{{$topic['name']}}</button>
                                    @endif
                                </h2>
                                @if(isset($practice_topic) && $practice_topic && $practice_topic == $topic['id'])
                                    <div id="collapse{{$topic['id']}}" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                                @else
                                    <div id="collapse{{$topic['id']}}" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                @endif
                                    <div class="accordion-body p-4">
                                        <ul class="list-unstyled p-0 my-1 sub_topic_wrap">
                                            <li class="d-flex align-items-center my-2">
                                                <div class="form-check">
                                                    <input class="form-check-input selectAll" type="checkbox" id="selectAll{{$topic['id']}}" checked>
                                                    <label class="form-check-label fs_cs_5 ms-1 cursor-pointer" for="selectAll{{$topic['id']}}">Clear All</label>
                                                </div>
                                            </li>
                                            @foreach ($topic['subTopics'] as $k => $subtopic)
                                                <li class="d-flex align-items-center my-2">
                                                    <div class="form-check">
                                                        @if(isset($practice_sub_topics) && count($practice_sub_topics) > 0 && in_array($subtopic['id'], $practice_sub_topics))
                                                            <input class="form-check-input sub_topic_inp" type="checkbox" id="check{{$key.++$k}}" name="sub_topic" value="{{$subtopic['id']}}" checked>
                                                        @else
                                                            <input class="form-check-input sub_topic_inp" type="checkbox" id="check{{$key.++$k}}" name="sub_topic" value="{{$subtopic['id']}}">
                                                        @endif
                                                        <label class="form-check-label fs_cs_5 ms-1 cursor-pointer" for="check{{$key.$k}}">{{$subtopic['topic_name']}}</label>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div id="formError" class="font-size-13 mb-2 text-danger text-end"></div>
            <div class="text-end mb-5 pb-4">
                <button id="proceedPracticeSet" class="btn btn-primary">Save & Proceed</button>
            </div>
        </div>
    </div>

    <script>
        $(".select_subject_btn").click(function(){
            $(".select_subject_btn").removeClass("subject_active");
            $(this).addClass('subject_active');
            getSelectedSubjectTopics($(this).attr('data-id'), 'button');
        });
        $(".accordion-button").click(function(){
            $('.sub_topic_inp').prop('checked', false);
            $(this).parents('.topic').find('.selectAll').prop('checked', true);
            $(this).parents('.topic').find('.sub_topic_inp').prop('checked', true);
        });
        getSelectedSubjectTopics($('.select_subject_btn.subject_active').first().attr('data-id'), 'load');
        function getSelectedSubjectTopics(subject, type){
            $('.topic').addClass('d-none');
            $('.topic[data-section_id="'+subject+'"]').removeClass('d-none');
            if(type != 'load'){
                $('.sub_topic_inp').prop('checked', false);
            }
        }
        $.ajaxSetup({
            headers: {
                'X-CSRF-Token': $('meta[name=token]').attr('content')
            }
        });
        $(document).on("click","#proceedPracticeSet", function(e){
            let sub_topic = [];
            let title = $("#title").val();
            let subject = $('.select_subject_btn.subject_active').first().attr('data-id');
            let topic = $('.accordion-button[aria-expanded=true]').first().attr('data-id');
            $('.sub_topic_inp:checkbox:checked').each(function(){
                sub_topic.push($(this).val());
            });
            if (title == "") {
                $("#title").focus();
                $("#title").addClass("is-invalid")
                $(".title_input_error").removeClass("d-none");
            }
            if(title){
                if(subject !== undefined){
                    if(topic !== undefined){
                        if(sub_topic.length > 0){
                            $.ajax({
                                type: "POST",
                                url: '/parent-practice-sets',
                                data: {
                                    title: title,
                                    skill_id: topic,
                                    section_id: subject,
                                    sub_topics: sub_topic,
                                    _token: '{{ csrf_token() }}'
                                },
                                success: function(data) {
                                    window.location.href = "/parent/practice/practice-sets/"+data.practice_set+"/questions";
                                },
                                error: function(data, textStatus, errorThrown) {
                                    console.log(textStatus);
                                    console.log(data);
                                },
                            });
                        } else {
                            $("#formError").text("Please select atleast one sub-topic");
                        }
                    } else {
                        $("#formError").text("Please select topic, topic field is required");
                    }
                } else {
                    $("#formError").text("Please select subject, subject field is required");
                }
            } else {
                $("#formError").text("Title field is required");
            }
        });
        $(document).on("keyup","#title", function(e){
            if($(this).val().length > 0) {
                $("#formError").text("");
            }
        }); 
        $(".selectAll").change(function(){
            let isChecked = $(this).prop('checked');
            $(this).parents(".sub_topic_wrap").find(".sub_topic_inp").prop('checked', isChecked);
        });
    </script>
</body>

</html>
