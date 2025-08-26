<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        Question Setting - {{$questionType['name']}}
    </title>
    <!-- rel icon -->
    <link rel="icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}">
    <meta name="description" content="{{ app(\App\Settings\SiteSettings::class)->seo_description }}">
    <meta name="author" content="{{ app(\App\Settings\SiteSettings::class)->app_name }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
    <script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>
    <!-- bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <style>
        .cursor-not-allowed{cursor:not-allowed !important}
        #start_search:hover,#start_search:active{background: transparent;cursor: default;color: #bcc4cc !important;}
        .font-size-13{font-size:13px;}
        input::-webkit-outer-spin-button,input::-webkit-inner-spin-button {-webkit-appearance: none;margin: 0;}
        input[type=number] {-moz-appearance: textfield;}
        .questionForm{max-width:900px;}
        .choices__inner, .choices__input {background: #fff;}
    </style>
</head>

<body> 
    @include('sidebar')
    @include('header')
    <section class="p-4">

        <div class="text-start my-4 align-items-center">
            <button onclick="history.back()" class="btn bg-label-primary border-primary text-primary p-2 px-3">
                <i class='bx bx-arrow-back'></i>
                <span>
                    Back to Question
                </span>
            </button>
        </div>

        <div class="bg-white rounded py-4 shadow-sm">
            <div class="row m-0">
                <div class="col-12 align-self-center">
                    <div class="h5 text-dark mb-0">Question Settings</div>
                    <div class="mt-1">{{$questionType['name']}}</div>
                </div>
                <div class="col-12 d-flex justify-content-evenly mt-3">
                    @if(isset($editFlag) && $editFlag)
                        @foreach ($steps as $key => $step)
                            @if($step['status'] == 'active')
                                <a class="w-100 mx-1" href="{{$step['url']}}">
                                    <button class="bg-label-primary border-primary btn w-100">
                                        <span class="badge bg-primary circle-badge rounded-circle text-white"> {{$key + 1}} </span> 
                                        {{$step['title']}}
                                    </button>
                                </a>                        
                            @else
                                <a class="w-100 mx-1"  href="{{$step['url']}}">
                                    <button class="btn btn-outline-primary w-100">
                                        <span class="badge bg-primary circle-badge rounded-circle text-white"> {{$key + 1}} </span> 
                                        {{$step['title']}}
                                    </button>
                                </a>
                            @endif
                        @endforeach
                    @else
                        @foreach ($steps as $key => $step)
                            @if($step['status'] == 'active')
                                <button class="bg-label-primary border-primary btn mx-1 w-100"> <span class="badge bg-primary circle-badge rounded-circle text-white"> {{$key + 1}} </span> {{$step['title']}} </button>
                            @else
                                <button class="btn btn-outline-primary mx-1 cursor-not-allowed w-100"> <span class="badge bg-primary circle-badge rounded-circle text-white"> {{$key + 1}} </span> {{$step['title']}} </button>
                            @endif
                        @endforeach
                    @endif
                </div>
            </div>
        </div>

        @if (Session::has('errorMessage') && isset($editFlag) && $editFlag)
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

        <div class="bg-white rounded py-4 mt-4 shadow-sm">
            <div class="questionForm m-auto px-3">
            
                <div class="form-group my-4">
                    <label for="skill" class="form-label">Topic</label>
                    <select class="form-control" id="skill">
                        @foreach($initialSkills as $skill)
                            <option value="{{$skill['id']}}">{{$skill['name']}}</option>
                        @endforeach
                    </select> 
                </div>
                
                <div class="form-group my-4">
                    <label for="topic" class="form-label">Sub-topic</label>
                    <select class="form-control" id="topic" placeholder="Select Sub-topic">
                        <option value="">Select a sub-topic</option>
                        @foreach($initialTopics as $topic)
                            <option value="{{$topic['id']}}">{{$topic['name']}}</option>
                        @endforeach
                    </select> 
                </div>

                <div class="form-group my-4">
                    <label for="tag" class="form-label">Tag</label>
                    <select class="form-control" id="tag" placeholder="Select a Tag" multiple>
                        @foreach($initialTags as $tag)
                            <option value="{{$tag['name']}}">{{$tag['name']}}</option>
                        @endforeach
                    </select> 
                </div>

                <div class="form-group my-4">
                    <label for="difficultyLevel" class="form-label">Difficulty Level</label>
                    <select class="form-control" id="difficultyLevel">
                        @foreach($difficultyLevels as $difficultyLevel)
                            @if($difficultyLevel['name'] == 'Easy')
                                <option value="{{$difficultyLevel['id']}}" selected>{{$difficultyLevel['name']}}</option>
                            @else 
                                <option value="{{$difficultyLevel['id']}}">{{$difficultyLevel['name']}}</option>
                            @endif
                        @endforeach
                    </select> 
                </div>

                <div class="form-group my-4">
                    <label for="marks_points">Default Marks/Grade Points</label>
                    <input type="number" class="form-control" name="marks_points" id="marks_points" value="1">
                </div>

                <div class="form-group my-4">
                    <label for="time_to_solve">Default Time To Solve (Seconds)</label>
                    <input type="number" class="form-control" name="time_to_solve" id="time_to_solve" value="60">
                </div>

                <div class="mb-4 row">
                    <div class="col-12 col-sm-8">
                        <div id="allowActiveText" class="h6 mb-1 text-dark">
                            @if($editFlag && $question['is_active'])
                                In-Active
                            @else
                                Active
                            @endif
                        </div>
                        <div class="lh-1 font-size-13">Active (Shown Everywhere). In-active (Hidden Everywhere).</div>
                    </div>
                    <div class="col-12 col-sm-4 d-flex align-items-center justify-content-sm-end">
                        <label class="switch mt-2">
                            @if($editFlag && $question['is_active'])
                                <input id="allowActive" type="checkbox" checked>
                            @else
                                <input id="allowActive" type="checkbox">
                            @endif
                            <span class="slider round"></span>
                        </label>
                    </div>
                </div>


                <div class="my-4 text-end">
                    <div id="formError" class="font-size-13 mb-2 text-danger"></div>
                    <button id="proceedForm" class="btn btn-primary">Update Settings</button>
                </div>

            </div>
        </div>

    </section>

    <script>
        let questionId = {!! str_replace("'", "\'", json_encode($question['id'])) !!};
        $(document).on("change","#skill, #topic, #tag, #difficultyLevel, #marks_points, #time_to_solve, #allowActive", function(e){
            $("#formError").empty();
        });
        var multipleCancelButton = new Choices('#skill, #topic, #tag, #difficultyLevel', {
            removeItemButton: true,
            placeholder: true,
            allowHTML: true,
            allowClear: true,
            searchEnabled: false,
            itemSelectText: '',
            shouldSort: false,
        });

        $("#proceedForm").click(function(){
            let skill = $("#skill").val();
            let topic = $("#topic").val()?$("#topic").val():null;
            let tag = $("#tag").val()?$("#tag").val():null;
            let difficultyLevel = $("#difficultyLevel").val();
            let marks_points = $("#marks_points").val();
            let time_to_solve = $("#time_to_solve").val();
            let allowActive = $('#allowActive').is(':checked');
            if(skill){
                if(topic){
                    if(difficultyLevel){
                        if(marks_points){
                            if(time_to_solve){
                                $.ajax({
                                    url: '/admin/questions/'+questionId+'/settings',
                                    dataType: 'json',
                                    type: 'POST',
                                    data: {
                                        default_marks: parseInt(marks_points),
                                        default_time: parseInt(time_to_solve),
                                        difficulty_level_id: parseInt(difficultyLevel),
                                        is_active: allowActive,
                                        skill_id: parseInt(skill),
                                        tags: tag,
                                        topic_id: parseInt(topic),
                                        _token: '{{ csrf_token() }}'
                                    },
                                    success: function(data) {
                                        if(data){
                                            window.location.href = "/admin/questions/"+data.question+"/solution";
                                        }
                                    },
                                    error: function(data, textStatus, errorThrown) {
                                        console.log(textStatus);
                                        console.log(data);
                                    },
                                });
                            } else {
                                $("#formError").text("Time to solve field is required, please enter time to solve field");
                            }
                        } else {
                            $("#formError").text("Default points field is required, please enter default points field");
                        }
                    } else {
                        $("#formError").text("Difficulty Level field is required, please select difficulty level field");    
                    }
                }
                else {
                    $("#formError").text("Sub-topic field is required, please select sub-topic field");
                }
            } else {
                $("#formError").text("Topic field is required, please select topic field");
            }
        });

    </script>


</body>

</html>
