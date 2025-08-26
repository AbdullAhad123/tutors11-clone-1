<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        @if(isset($editFlag) && $editFlag)
            Edit Lesson - {{$lesson['title']}}
        @else
            Create Lesson
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
        #start_search:hover,#start_search:active{background: transparent;cursor: default;color: #bcc4cc !important}
        #skill_Dropdown, #topic_Dropdown, #tag_Inp{max-height: 175px;}
        .font-size-13{font-size:13px;}
        input::-webkit-outer-spin-button,input::-webkit-inner-spin-button {-webkit-appearance: none;margin: 0;}
        input[type=number] {-moz-appearance: textfield;}
        #addPdf{padding: 6px 10px;}
    </style>
</head>

<body> 
    @include('sidebar')
    @include('header')

    <section class="p-4">

        <div class="text-start my-4 align-items-center">
            <a href="/admin/lessons">
                <button class="btn bg-label-primary border-primary text-primary p-2 px-3">
                    <i class='bx bx-arrow-back'></i>
                    <span>
                        Back to Lesson Bank
                    </span>
                </button>
            </a>
        </div>

        <div class="bg-white rounded-4 py-4 my-4 shadow-sm">
            <div class="row m-0">
                <div class="col-lg-5 col-md-12 align-self-center">
                    <div class="h5 text-dark mb-0">
                        @if(isset($editFlag) && $editFlag)
                            Edit Lesson
                        @else
                            Create Lesson
                        @endif
                    </div>
                    @if(isset($editFlag) && $editFlag)
                        <div>
                            {{$lesson['title']}}
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <div id="errorMessage"></div>

        <div class="bg-white rounded-4 py-4 my-4 shadow-sm">
            <div class="container practice_set_form">


                <div class="form-group my-4">
                    <label class="text-dark fw-medium" for="lessonTitle">Lesson Title</label>
                    @if(isset($editFlag) && $editFlag)
                        <input id="lessonTitle" type="text" class="form-control shadow-sm my-1" placeholder="Enter lesson title" value="{{$lesson['title']}}">
                    @else
                        <input id="lessonTitle" type="text" class="form-control shadow-sm my-1" placeholder="Enter lesson title">
                    @endif
                </div>

                <div class="form-group mb-4">
                    <label class="text-dark fw-medium" for="summernote">Body</label>
                    <div class="my-3">
                    @if(isset($editFlag) && $editFlag)
                        <textarea id="summernote">{{$lesson['body']}}</textarea>
                    @else
                        <textarea id="summernote"></textarea>
                    @endif
                    </div>
                </div>
                
                <div class="form-group my-4 dropdown">
                    <label class="text-dark fw-medium" for="skill_Inp">Topic</label>
                    @if(isset($editFlag) && $editFlag)
                        @foreach($initialSkills as $skill)
                            @if($skill['id'] == $lesson['skill_id'])
                            <input id="skill_Inp" type="text" class="form-control dropdown-toggle" data-id="{{$skill['id']}}" value="{{$skill['name']}}" data-trigger="0" data-bs-toggle="dropdown" aria-expanded="true" placeholder="Select a Topic" autocomplete="off">
                            @endif
                        @endforeach
                        <ul id="skill_Dropdown" class="dropdown-menu w-100 p-0 overflow-auto">
                            @foreach($initialSkills as $skill)
                                <li class="dropdown-item cursor-pointer py-1 px-3 select_skill" data-id="{{$skill['id']}}">{{$skill['name']}}</li>
                            @endforeach
                        </ul>
                    @else
                        <input id="skill_Inp" type="text" class="form-control dropdown-toggle" data-id="" data-trigger="0" data-bs-toggle="dropdown" aria-expanded="true" placeholder="Select a Topic" autocomplete="off">
                        <ul id="skill_Dropdown" class="dropdown-menu w-100 p-0 overflow-auto">
                            <li class="dropdown-item text-center text-light" id="start_search">
                                Start typing to search.
                            </li>
                        </ul>
                    @endif
                </div>
                

                <div class="form-group my-4 dropdown">
                    <label class="text-dark fw-medium" for="topic_Inp">Sub-topic</label>
                    @if(isset($editFlag) && $editFlag)
                        @foreach($initialTopics as $topic)
                            @if($topic['id'] == $lesson['topic_id'])
                            <input id="topic_Inp" type="text" class="form-control dropdown-toggle" data-id="{{$topic['id']}}" value="{{$topic['name']}}" data-trigger="0" data-bs-toggle="dropdown" aria-expanded="true" placeholder="Select a Sub-topic" autocomplete="off">
                            @endif
                        @endforeach
                        <ul id="topic_Dropdown" class="dropdown-menu w-100 p-0 overflow-auto">
                            @foreach($initialTopics as $topic)
                                <li class="dropdown-item cursor-pointer py-1 px-3 select_topic" data-id="{{$topic['id']}}">{{$topic['name']}}</li>
                            @endforeach
                        </ul>
                    @else
                        <input id="topic_Inp" type="text" class="form-control dropdown-toggle" data-id="" data-trigger="0" data-bs-toggle="dropdown" aria-expanded="true" placeholder="Select a Sub-topic" autocomplete="off">
                        <ul id="topic_Dropdown" class="dropdown-menu w-100 p-0 overflow-auto">
                            <li class="dropdown-item text-center text-light" id="start_search">
                                Start typing to search.
                            </li>
                        </ul>
                    @endif
                </div>

                <div class="form-group my-4 dropdown">
                    <label class="text-dark fw-medium" for="tag_Inp">Tags</label>
                    @if(isset($editFlag) && $editFlag)
                        @foreach($initialTags as $tag)
                            @if($tag['id'] == $lesson['tag_id'])
                            <input id="tag_Inp" type="text" class="form-control dropdown-toggle" data-id="{{$tag['id']}}" value="{{$tag['name']}}" data-trigger="0" data-bs-toggle="dropdown" aria-expanded="true" placeholder="Select a tag" autocomplete="off">
                            @endif
                        @endforeach
                        <ul id="tag_Dropdown" class="dropdown-menu w-100 p-0 overflow-auto">
                            @foreach($initialTags as $tag)
                                <li class="dropdown-item cursor-pointer py-1 px-3 select_tag" data-id="{{$tag['id']}}">{{$tag['name']}}</li>
                            @endforeach
                        </ul>
                    @else
                        <input id="tag_Inp" type="text" class="form-control dropdown-toggle" data-id="" data-trigger="0" data-bs-toggle="dropdown" aria-expanded="true" placeholder="Select a tag" autocomplete="off">
                        <ul id="tag_Dropdown" class="dropdown-menu w-100 p-0 overflow-auto">
                            <li class="dropdown-item text-center text-light" id="start_search">
                                Start typing to search.
                            </li>
                        </ul>
                    @endif
                </div>

                <div class="form-group my-4 dropdown">
                    <label class="text-dark fw-medium" for="difficultyLevel">Difficulty Level</label>
                    <select id="difficultyLevel" class="form-select my-1 shadow-sm">
                        @foreach ($difficultyLevels as $key => $difficultyLevel)
                            @if(isset($editFlag) && $editFlag)
                                @if($lesson['difficulty_level_id'] == $difficultyLevel['id']) 
                                    <option value="{{$difficultyLevel['id']}}" selected>{{$difficultyLevel['name']}}</option>
                                @else
                                    <option value="{{$difficultyLevel['id']}}">{{$difficultyLevel['name']}}</option>
                                @endif
                            @else
                                @if($key == 0) 
                                    <option value="{{$difficultyLevel['id']}}" selected>{{$difficultyLevel['name']}}</option>
                                @else
                                    <option value="{{$difficultyLevel['id']}}">{{$difficultyLevel['name']}}</option>
                                @endif
                            @endif
                        @endforeach
                    </select>
                </div>

                <div class="form-group my-4">
                    <label class="text-dark fw-medium" for="readTime">Read Time (Minutes)</label>
                    @if(isset($editFlag) && $editFlag)
                        <input id="readTime" type="number" class="form-control" placeholder="Enter read time (in minutes)" value="{{$lesson['duration']}}" min="1">
                    @else
                    <input id="readTime" type="number" class="form-control" placeholder="Enter read time (in minutes)" value="1" min="1">
                    @endif
                </div>

                <div class="form-group mb-4 row">
                    <div class="col-12 col-sm-8">
                        <div class="h6 mb-1 text-dark">
                            <span id="isPaidText">
                                @if(isset($editFlag) && $editFlag && $lesson['is_paid'] == false)
                                    Free
                                @else
                                    Paid
                                @endif
                            </span>
                        </div>
                        <div class="lh-1 font-size-13">Paid (Accessible to only paid users). Free (Anyone can access).</div>
                    </div>
                    
                    <div class="col-12 col-sm-4 d-flex align-items-center justify-content-sm-end">
                        <label class="switch mt-2">
                        @if(isset($editFlag) && $editFlag)
                            @if($lesson['is_paid'])
                                <input id="isPaid" type="checkbox" checked>
                            @else
                                <input id="isPaid" type="checkbox">
                            @endif
                        @else
                            <input id="isPaid" type="checkbox" checked>
                        @endif
                            <span class="slider round"></span>
                        </label>
                    </div>
                </div>
                

                <div class="form-group mb-4 row">
                    <div class="col-12 col-sm-8">
                        <div class="h6 mb-1 text-dark">
                            <span id="isActiveText">
                                @if(isset($editFlag) && $editFlag && $lesson['is_active'] == false)
                                    In-active
                                @else
                                    Active
                                @endif
                            </span>
                        </div>
                        <div class="lh-1 font-size-13">Active (Shown Everywhere). In-active (Hidden Everywhere).</div>
                    </div>
                    <div class="col-12 col-sm-4 d-flex align-items-center justify-content-sm-end">
                        <label class="switch mt-2">
                            @if(isset($editFlag) && $editFlag)
                                @if($lesson['is_active'])
                                    <input id="isActive" type="checkbox" checked>
                                @else
                                    <input id="isActive" type="checkbox">
                                @endif
                            @else
                                <input id="isActive" type="checkbox" checked>
                            @endif
                            <span class="slider round"></span>
                        </label>
                    </div>
                </div>

                <div id="formError" class="font-size-13 mb-2 text-danger"></div>
                @if(isset($editFlag) && $editFlag)
                    <button class="btn btn-primary proceedLessons" data-type="update">Update</button>
                @else
                    <button class="btn btn-primary proceedLessons" data-type="submit">Save Lesson</button>
                @endif
            </div>
        </div>
        <!-- Add PDF Modal  -->
        <div class="modal fade" id="addPdfModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="addPdfLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addPdfLabel">Add PDF</h1>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-4">
                        <label class="text-dark fw-medium" for="pdf_url" class="form-label">Enter PDF Url</label>
                        <input type="text" class="form-control" id="pdf_url" aria-describedby="pdf_url">
                    </div>
                    <div class="text-end">
                        <button id="insertPdf" class="btn btn-primary">Save</button>
                    </div>
                </div>
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
                height: 140,
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
            $(".note-toolbar").append(`<div class="note-btn-group btn-group note-view"><button class="btn btn-light btn-sm border" id="addPdf" type='button' data-toggle="modal" data-target="#addPdfModal"><span>PDF</span></button></div>`);
            $(document).on('click', '#addPdf', function(){ 
                $('#addPdfModal').modal('show');
            });
            $(document).on('click', '#insertPdf', function(){ 
                $('#addPdfModal').modal('hide');
                let url = $("#pdf_url").val();
                let embedPdf = `<p><embed src="`+url+`#toolbar=0&navpanes=0" width="100%" height="400px" type="application/pdf"></p>`;
                $("#pdf_url").val("");
                let _this = $(this);
                $(".note-placeholder").hide();
                $(".note-editable").append(embedPdf);
                $("#summernote").val($("#summernote").val()+embedPdf);
            });
            

            var method = "POST";
            var url = "/admin/lessons";
            var editFlag = false;
            var lesson_Body, lessonId;
            @if(isset($editFlag) && $editFlag)
                editFlag = true;
                lesson_Body = {!! str_replace("'", "\'", json_encode($lesson['body'])) !!};
                lessonId = {!! str_replace("'", "\'", json_encode($lesson['id'])) !!};
                method = "PATCH";
                url = "/admin/lessons/"+lessonId;
            @endif
            if(editFlag){
                $("#summernote").val(lesson_Body.replaceAll("</p>", "\n").replaceAll("<p>", ""));
            } else {
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
                $(document).on("keyup","#topic_Inp", function(e){
                    $("#topic_Dropdown").empty();
                    var search_query = $(this).val();
                    if(search_query.length > 0) {
                        $.ajax({
                            type: "GET",
                            url: '/admin/search_topics',
                            data: {
                                query: search_query,
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(data) {
                                let arrLength = data['topics'].length;
                                if(arrLength > 0) {
                                    data['topics'].forEach(function(topic){
                                        $("#topic_Dropdown").append('<li class="dropdown-item cursor-pointer py-1 px-3 select_topic" data-id="'+topic.id+'">'+topic.name+' ('+topic.section_name+')</li>');
                                    });
                                } else {
                                    $("#topic_Dropdown").append('<li class="dropdown-item text-danger text-center">No Result Found</li>');
                                }

                            },
                            error: function(data, textStatus, errorThrown) {
                                console.log(textStatus);
                                console.log(data);
                            },
                        });
                    } else {
                        $("#topic_Inp").attr("data-id","");
                        $("#topic_Dropdown").append('<li class="dropdown-item text-center text-light" id="start_search">Start typing to search.</li>');
                    }
                });
                $(document).on("keyup","#tag_Inp", function(e){
                    $("#tag_Dropdown").empty();
                    var search_query = $(this).val();
                    if(search_query.length > 0) {
                        $.ajax({
                            type: "GET",
                            url: '/admin/search_tags',
                            data: {
                                query: search_query,
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(data) {
                                let arrLength = data['tags'].length;
                                if(arrLength > 0) {
                                    data['tags'].forEach(function(tag){
                                        $("#tag_Dropdown").append('<li class="dropdown-item cursor-pointer py-1 px-3 select_tag" data-id="'+tag.id+'">'+tag.name+'</li>');
                                    });
                                } else {
                                    $("#tag_Dropdown").append('<li class="dropdown-item text-danger text-center">No Result Found</li>');
                                }

                            },
                            error: function(data, textStatus, errorThrown) {
                                console.log(textStatus);
                                console.log(data);
                            },
                        });
                    } else {
                        $("#tag_Inp").attr("data-id","");
                        $("#tag_Dropdown").append('<li class="dropdown-item text-center text-light" id="start_search">Start typing to search.</li>');
                    }
                });
            }
            // on change 
            $('#topic_Inp, #skill_Inp, #lessonTitle, #summernote, #tag_Inp, #difficultyLevel, #readTime, #isPaid, #isActive').change(function() {
                $("#formError").text("");
                $("#errorMessage").empty();
            });
            // select skill
            $(document).on("click",".select_skill", function(e){
                let selectedSkill = $(this).text().trim();
                let selectedSkillId = $(this).data("id");
                $("#skill_Inp").val(selectedSkill);
                $("#skill_Inp").attr("data-id",selectedSkillId);
            });
            // select topic 
            $(document).on("click",".select_topic", function(e){
                let selectedtopic = $(this).text().trim();
                let selectedtopicId = $(this).data("id");
                $("#topic_Inp").val(selectedtopic);
                $("#topic_Inp").attr("data-id",selectedtopicId);
            });
            // select tag 
            $(document).on("click",".select_tag", function(e){
                let selectedtag = $(this).text().trim();
                let selectedtagId = $(this).data("id");
                $("#tag_Inp").val(selectedtag);
                $("#tag_Inp").attr("data-id",selectedtagId);
            });
            // is paid 
            $('#isPaid').change(function() {
                let isPaid = $(this).is(':checked');
                if(isPaid){
                    $("#isPaidText").text("Paid");
                } else {
                    $("#isPaidText").text("Free");
                }
            });   
            // is active 
            $('#isActive').change(function() {
                let isActive = $(this).is(':checked');
                if(isActive){
                    $("#isActiveText").text("Active");
                } else {
                    $("#isActiveText").text("In-active");
                }
            });
            // proceed lesson 
            $(document).on("click",".proceedLessons", function(e){
                let title = $("#lessonTitle").val();
                let bodyArr = $("#summernote").val().split("\n");
                bodyArr.forEach(function(para, i) {
                    para = '<p>'+para+'</p>';
                    bodyArr[i] = para;
                });
                let skill = $("#skill_Inp").data("id");
                let topic = $("#topic_Inp").data("id");
                let tag = $("#topic_Inp").data("id");
                let difficultyLevel = $("#difficultyLevel").val();
                let readTime = $("#readTime").val();
                let isPaid = $('#isPaid').is(':checked');
                let isActive = $('#isActive').is(':checked');
                
                if (title){
                    if(skill){
                        if(topic){
                            if(readTime){
                                $.ajax({
                                    type: method,
                                    url: url,
                                    data: {
                                        body: bodyArr.join(" "),
                                        difficulty_level_id: difficultyLevel,
                                        duration: readTime,
                                        is_active: isActive,
                                        is_paid: isPaid,
                                        skill_id: skill,
                                        tags: [topic],
                                        title: title,
                                        topic_id: topic,
                                        _token: '{{ csrf_token() }}'
                                    },
                                    success: function(data) {
                                        window.location.href = '/admin/lessons';
                                    },
                                    error: function(data, textStatus, errorThrown) {
                                        console.log(textStatus);
                                        var obj = data.responseJSON.errors;
                                        let formError = obj[Object.keys(obj)[0]][0];
                                        $("#formError").text(formError);
                                    },
                                });
                            } else {
                                $("#formError").text("Read time field is required, please enter read time");
                            }
                        } else {
                            $("#formError").text("Please select topic from dropdown");       
                        }
                    } else {
                        $("#formError").text("Please select topic from dropdown");    
                    }
                } else {
                    $("#formError").text("Lesson title field is required, please enter a title");
                }
            });
            // ready ends 
        });

    </script>
</body>

</html>
