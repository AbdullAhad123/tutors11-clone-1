<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        @if(isset($editFlag) && $editFlag)
            Edit Video - {{$video['title']}}
        @else
            Create Video
        @endif
    </title>
    <!-- rel icon -->
    <link rel="icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}">
    <meta name="description" content="{{ app(\App\Settings\SiteSettings::class)->seo_description }}">
    <meta name="author" content="{{ app(\App\Settings\SiteSettings::class)->app_name }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
        .videoTypeSelector.active{background-color: #e8fadf !important;color: #71dd37 !important;}
        .editor {position: relative;width: 100%;min-height: 40vh;max-height: 400px;margin: 0 auto;padding: 20px;background: #fcfcfc;border-radius: 3px;border: 1px solid #696cff;box-sizing: border-box;word-break: break-all;outline: 0;}
        .btn_primary_customized {text-transform: uppercase;font-size: 0.9rem;background-color: #696cff !important;}
        .btn_primary_customized:hover {box-shadow: 0px 0px 10px 1px #34343425;}
        .text_black {color: #181818 !important;}
        .font_bold {font-weight: 600 !important;}
        .activeTab {color: white;background-color: purple;}
        #skill_Dropdown, #topic_Dropdown, #tag_Inp{max-height: 175px;}
        input::-webkit-outer-spin-button,input::-webkit-inner-spin-button {-webkit-appearance: none;margin: 0;}
        input[type=number] {-moz-appearance: textfield;}
        .font-size-13{font-size:13px;}
    </style>
</head>

<body>
    @include('sidebar')
    @include('header')

    <section class="p-4">

        <div class="text-start my-4 align-items-center">
            <a href="/admin/videos">
            <button class="btn bg-label-primary border-primary text-primary p-2 px-3">
                <i class='bx bx-arrow-back'></i>
                <span>
                    Back to Video Bank
                </span>
            </button>
            </a>
        </div>

        <div class="bg-white rounded-4 py-4 p-3 my-4 shadow">
            <div class="form-input">
                <div class="my-2 p-2">
                    <label for="videoTitle" class="text-dark fw-medium">Video Title</label>
                    <div class="my-3">
                        @if(isset($editFlag) && $editFlag)
                            <input type="text" class="form-control my-1" id="videoTitle" placeholder="Enter video title" value="{{$video['title']}}">
                        @else
                            <input type="text" class="form-control my-1" id="videoTitle" placeholder="Enter video title">
                        @endif
                        <span class="text-danger small d-none" data-name="name error" id="videoTitleError">This Field is required*</span>
                    </div>
                </div>

                <div class="justify-content-between align-items-center mb-4 custom-inp-group">
                    <div class="text_black font_bold mb-3">Video Type (Supported YouTube, Vimeo)</div>
                    <div id="videoTypeWrap">
                        @if(isset($editFlag) && $editFlag && $video['video_type'] == 'vimeo')
                            <input id="videoType" class="inp" value="vimeo" type="hidden">
                        @else
                            <input id="videoType" class="inp" value="youtube" type="hidden">
                        @endif
                        <span class="btn border rounded-0 radio_selector videoTypeSelector 
                            @if(isset($editFlag) && $editFlag)
                                @if(isset($editFlag) && $editFlag && $video['video_type'] == 'youtube')
                                    active
                                @endif
                            @else
                                active
                            @endif
                        " data-video-type="youtube">YouTube Video</span>
                        <span class="btn border rounded-0 radio_selector videoTypeSelector
                        @if(isset($editFlag) && $editFlag && $video['video_type'] == 'vimeo')
                            active
                        @endif
                        " data-video-type="vimeo">Vimeo Video</span>
                    </div>
                </div>

                <div class="my-2 p-2">
                    <label for="videoId" class="text-dark fw-medium">Video Id</label>
                    <div class="my-3">
                        <div class="d-flex border rounded">
                            @if(isset($editFlag) && $editFlag)
                                <input type="text" class="form-control border-0" id="videoId" value="{{$video['video_link']}}">
                            @else
                                <input type="text" class="form-control border-0" id="videoId">
                            @endif
                            <button class="btn bg-label-primary rounded-0 px-4 py-1 d-flex align-items-lg-center" id="videoPreviewBtn">
                                <svg fill="#696bfc" style="height:auto;" class="me-1" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
                                    viewBox="0 0 60 60" xml:space="preserve">
                                    <g>
                                        <path d="M45.563,29.174l-22-15c-0.307-0.208-0.703-0.231-1.031-0.058C22.205,14.289,22,14.629,22,15v30
                                            c0,0.371,0.205,0.711,0.533,0.884C22.679,45.962,22.84,46,23,46c0.197,0,0.394-0.059,0.563-0.174l22-15
                                            C45.836,30.64,46,30.331,46,30S45.836,29.36,45.563,29.174z M24,43.107V16.893L43.225,30L24,43.107z"/>
                                        <path d="M30,0C13.458,0,0,13.458,0,30s13.458,30,30,30s30-13.458,30-30S46.542,0,30,0z M30,58C14.561,58,2,45.439,2,30
                                            S14.561,2,30,2s28,12.561,28,28S45.439,58,30,58z"/>
                                    </g>
                                </svg>
                                Preview
                            </button>
                        </div>
                        
                    </div>

                    <div id="videoError" class="font-size-13 my-2 text-danger"></div>
                    <iframe id="videoPreview" class="w-100 h-px-350 mt-4" src="" frameborder="0" style="display:none;"></iframe>
                </div>

                <div class="form-group mb-4">
                    <label for="summernote" class="text-dark fw-medium">Body</label>
                    <div class="my-3">
                        <textarea id="summernote"></textarea>
                        <span class="text-danger small d-none" data-bs-name="des error" id="videoBodyError">This Field is required*</span>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="form-group my-4 dropdown">
                            <label for="skill_Inp" class="text-dark fw-medium">Topic</label>
                            @if(isset($editFlag) && $editFlag)
                                @foreach($initialSkills as $skill)
                                    @if($skill['id'] == $video['skill_id'])
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
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-group my-4 dropdown">
                            <label for="topic_Inp" class="text-dark fw-medium">Sub-topic</label>
                            @if(isset($editFlag) && $editFlag && $initialTopics)
                                @foreach($initialTopics as $topic)
                                    @if($topic['id'] == $video['topic_id'])
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
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-group my-4 dropdown">
                            <label for="tag_Inp" class="text-dark fw-medium">Tags</label>
                            @if(isset($editFlag) && $editFlag && isset($video['tag']))
                                @foreach($initialTags as $tag)
                                    @if($tag['id'] == $video['tag_id'])
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
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-group my-4 dropdown">
                            <label for="difficultyLevel" class="text-dark fw-medium">Difficulty Level</label>
                            <select id="difficultyLevel" class="form-select">
                                @foreach ($difficultyLevels as $key => $difficultyLevel)
                                    @if(isset($editFlag) && $editFlag)
                                        @if($video['difficulty_level_id'] == $difficultyLevel['id']) 
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
                    </div>
                </div>

                <div class="form-group my-4">
                    <label for="watchTime">Watch Time (Minutes)</label>
                    @if(isset($editFlag) && $editFlag)
                        <input id="watchTime" type="number" class="form-control" placeholder="Enter watch time (in minutes)" value="{{$video['duration']}}" min="1">
                    @else
                    <input id="watchTime" type="number" class="form-control" placeholder="Enter watch time (in minutes)" value="1" min="1">
                    @endif
                </div>

                <div class="form-group mb-4 row">
                    <div class="col-12 col-sm-8">
                        <div class="h6 mb-1 text-dark">
                            <span id="isPaidText">
                                @if(isset($editFlag) && $editFlag && $video['is_paid'] == false)
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
                            @if($video['is_paid'])
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
                                @if(isset($editFlag) && $editFlag && $video['is_active'] == false)
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
                                @if($video['is_active'])
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
                <div class="text-end my-4">
                    @if(isset($editFlag) && $editFlag)
                        <button class="btn btn-primary proceedVideo" data-type="update">Update</button>
                    @else
                        <button class="btn btn-primary proceedVideo" data-type="submit">Save video</button>
                    @endif
                </div>

            </div>
        </div>

    </section>

    @include('parentsidebar.sidebarending')

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
        });

        var method = "POST";
        var url = "/admin/videos";
        var editFlag = false;
        var video_Body, videoId, initialTopics;
        @if(isset($editFlag) && $editFlag)
            editFlag = true;
            video_Body = {!! str_replace("'", "\'", json_encode($video['description'])) !!};
            videoId = {!! str_replace("'", "\'", json_encode($video['id'])) !!};
            initialTopics = {!! str_replace("'", "\'", json_encode($initialTopics)) !!};
            method = "PATCH";
            url = "/admin/videos/"+videoId;
        @endif
        if(editFlag && initialTopics.length < 1){
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
                                    $("#topic_Dropdown").append('<li class="dropdown-item cursor-pointer py-1 px-3 select_topic" data-id="'+topic.id+'">'+topic.name+'</li>');
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
        }
        if(editFlag){
            if(video_Body){
                $("#summernote").val(video_Body.replaceAll("</p>", "\n").replaceAll("<p>", ""));
            }
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
                                    $("#topic_Dropdown").append('<li class="dropdown-item cursor-pointer py-1 px-3 select_topic" data-id="'+topic.id+'">'+topic.name+'</li>');
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
        $(document).on("click",".select_skill", function(e){
            let selectedSkill = $(this).text().trim();
            let selectedSkillId = $(this).data("id");
            $("#skill_Inp").val(selectedSkill);
            $("#skill_Inp").attr("data-id",selectedSkillId);
        });
        $(document).on("click",".select_topic", function(e){
            let selectedtopic = $(this).text().trim();
            let selectedtopicId = $(this).data("id");
            $("#topic_Inp").val(selectedtopic);
            $("#topic_Inp").attr("data-id",selectedtopicId);
        });
        $(document).on("click",".select_tag", function(e){
            let selectedtag = $(this).text().trim();
            let selectedtagId = $(this).data("id");
            $("#tag_Inp").val(selectedtag);
            $("#tag_Inp").attr("data-id",selectedtagId);
        });
        $(".videoTypeSelector").click(function(){
            let type = $(this).data("video-type");
            $(this).addClass('active');
            $(this).siblings(".inp").val(type);
            $(this).siblings(".videoTypeSelector").removeClass('active');
            $("#videoPreview").empty().attr("src", "").hide();
            $("#videoId").val("");
        });
        $("#videoPreviewBtn").click(function(){
            let videoId = $("#videoId").val();
            let type = $("#videoType").val();
            var url;
            if (type == "youtube"){
                url = "https://www.youtube.com/embed/"+videoId;
            } else {
                url = "https://player.vimeo.com/video/"+videoId
            }

            if(videoId){
                $("#videoPreview").attr("src", url).show();
                $("#videoError").text("");
            } else {
                $("#videoError").text("Please enter video id");
            }
        });
        $(document).on("click",".proceedVideo", function(e){
            let title = $("#videoTitle").val();
            let bodyArr = $("#summernote").val().split("\n");
            bodyArr.forEach(function(para, i) {
                para = '<p>'+para+'</p>';
                bodyArr[i] = para;
            });
            let skill = $("#skill_Inp").attr("data-id");
            let topic = $("#topic_Inp").attr("data-id");
            let tag = $("#tag_Inp").attr("data-id");
            let difficultyLevel = $("#difficultyLevel").val();
            let watchTime = $("#watchTime").val();
            let isPaid = $('#isPaid').is(':checked');
            let isActive = $('#isActive').is(':checked');
            let videoId = $("#videoId").val();
            let videoType = $("#videoType").val();
            if (title){
                if(skill){
                    if(videoId){
                        if(watchTime){
                            $.ajax({
                                type: method,
                                url: url,
                                data: {
                                    description: bodyArr.join(" "),
                                    difficulty_level_id: difficultyLevel,
                                    duration: watchTime,
                                    is_active: isActive,
                                    is_paid: isPaid,
                                    skill_id: skill,
                                    tags: [topic],
                                    title: title,
                                    topic_id: topic,
                                    thumbnail: "",
                                    video_link: videoId,
                                    video_type: videoType,
                                    _token: '{{ csrf_token() }}'
                                },
                                success: function(data) {
                                    // console.log(data)
                                    window.location.href = '/admin/videos';
                                },
                                error: function(data, textStatus, errorThrown) {
                                    console.log(textStatus);
                                    // var obj = data.responseJSON.errors;
                                    // let formError = obj[Object.keys(obj)[0]][0];
                                    // $("#formError").text(formError);
                                },
                            });
                        } else {
                            $("#formError").text("watch time field is required, please enter watch time");
                        }
                    } else {
                        $("#formError").text("Video id field is required, please enter video id");
                    }
                } else {
                    console.log("error");
                    $("#formError").text("Please select topic from dropdown");    
                }
            } else {
                $("#formError").text("Video title field is required, please enter a title");
            }
            
        });
        $('#videoTitle, #videoType, #videoId, #summernote, #skill_Inp, #topic_Inp, #tag_Inp, #difficultyLevel, #watchTime, #isPaid, #isActive').change(function() {
            $("#formError").text("");
        });
    </script>

</body>

</html>