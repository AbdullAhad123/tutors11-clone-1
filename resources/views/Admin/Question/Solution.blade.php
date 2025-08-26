<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        Question Solution - {{$questionType['name']}}
    </title>
    <!-- rel icon -->
    <link rel="icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}">
    <meta name="description" content="{{ app(\App\Settings\SiteSettings::class)->seo_description }}">
    <meta name="author" content="{{ app(\App\Settings\SiteSettings::class)->app_name }}">
    <style>
        .cursor-not-allowed{cursor:not-allowed !important}
        #start_search:hover,#start_search:active{background: transparent;cursor: default;color: #bcc4cc !important;}
        .font-size-13{font-size:13px;}
        input::-webkit-outer-spin-button,input::-webkit-inner-spin-button {-webkit-appearance: none;margin: 0;}
        input[type=number] {-moz-appearance: textfield;}
        .questionForm{max-width:900px;}
        .choices__inner, .choices__input {background: #fff;}
        .yes_selector.active, .videoTypeSelector.active{background-color: #e8fadf !important;color: #71dd37 !important; border: 1px solid #71dd37 !important;}
        .no_selector.active{background-color: #ffe0db !important;color: #ff3e1d !important; border: 1px solid #ff3e1d !important;}
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

        <div class="bg-white rounded-3 py-4 shadow">
            <div class="row m-0">
                <div class="col-12 align-self-center">
                    <div class="h5 text-dark mb-0">Question Solutions</div>
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

        <div class="bg-white rounded-3 py-4 my-4 shadow">
            <div class="questionForm m-auto px-3">
                
                <div class="form-group my-4">
                    <label for="solution" class="text-dark fs-5">Solution</label>
                    @if(isset($editFlag) && $editFlag)
                    <textarea class="form-control shadow-sm mt-1" name="solution" id="solution" rows="4" placeholder="Enter solution">{!! $question['solution'] !!}</textarea>
                    @else
                    <textarea class="form-control shadow-sm mt-1" name="solution" id="solution" rows="4" placeholder="Enter solution"></textarea>
                    @endif
                </div>

                <div class="justify-content-between align-items-center mb-4 custom-inp-group">
                    <div class="text-dark fs-5">Solution's Video</div>
                    <div class="my-2">
                        <input id="enableSolutionVideo" class="inp allowDropdown showOnYes" value="false" type="hidden">
                        <span class="btn border rounded-3 radio_selector yes_selector">Enable</span>
                        <span class="btn border rounded-3 radio_selector no_selector active">Disable</span>
                    </div>
                </div>
                <div id="enableSolutionVideoSection" class="d-none justify-content-between align-items-center mb-4">

                    <div class="justify-content-between align-items-center mb-4 custom-inp-group">
                        <div>Video Type (Supported YouTube, Vimeo)</div>
                        <div id="videoTypeWrap">
                            <input id="videoType" class="inp" value="youtube" type="hidden">
                            <span class="btn border rounded-0 radio_selector videoTypeSelector active" data-video-type="youtube">YouTube Video</span>
                            <span class="btn border rounded-0 radio_selector videoTypeSelector" data-video-type="vimeo">Vimeo Video</span>
                        </div>
                    </div>

                    <div>
                        Video ID
                    </div>
                    <div>
                        <div class="input-group border rounded">
                            <input id="videoId" type="text" class="inp border-0 form-control shadow-sm mt-1">
                            <div class="input-group-append">
                                <button class="bg-label-primary btn px-3 py-0 rounded-0 h-100" id="videoPreviewBtn">
                                    <svg fill="#696bfc" style="height:auto;" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
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
                </div>

                <div class="form-group my-4">
                    <label for="hint" class="text-dark fs-5">Hint</label>
                    @if(isset($editFlag) && $editFlag)
                    <textarea class="form-control shadow-sm mt-1" name="hint" id="hint" rows="4" placeholder="Enter hint">{!! $question['hint'] !!}</textarea>
                    @else
                    <textarea class="form-control shadow-sm mt-1" name="hint" id="hint" rows="4" placeholder="Enter hint"></textarea>
                    @endif
                </div>

                <div class="my-4 text-end">
                    <div id="formError" class="font-size-13 mb-2 text-danger"></div>
                    <button id="proceedForm" class="btn btn-primary">Update</button>
                </div>

            </div>
        </div>

    </section>
 
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>  
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

    <script>
        let questionId = {!! str_replace("'", "\'", json_encode($question['id'])) !!};
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
        $(".videoTypeSelector").click(function(){
            let type = $(this).data("video-type");
            $(this).siblings(".inp").val(type);
            $("#videoPreview").empty().attr("src", "").hide();
            $("#videoId").val("");
        });
        $(document).on("keyup","#videoId", function(e){
            $("#formError").empty();
            $("#videoError").empty();
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
            } else {
                $("#videoError").text("Please enter video id");
            }
        });
        $("#proceedForm").click(function(){
            
            let solution = $("#solution").val()?"<p>"+$("#solution").val()+"</p>\n":"";
            let hint = $("#hint").val()?"<p>"+$("#hint").val()+"</p>\n":"";
            let enableSolutionVideo = /^true$/i.test($("#enableSolutionVideo").val());
            let solution_video = {
                video_type: $("#videoTypeWrap").find(".active").data("video-type"), 
                link: $("#videoId").val()
            }
            if(enableSolutionVideo && !solution_video.link){
                $("#videoError").text("Video id field is required when solution video is enabled");
            } else {
                $.ajax({
                    url: '/admin/questions/'+questionId+'/solution',
                    dataType: 'json',
                    type: 'POST',
                    data: {
                        hint: hint,
                        solution: solution,
                        solution_has_video: enableSolutionVideo,
                        solution_video: solution_video,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        if(data){
                            window.location.href = "/admin/questions/"+data.question+"/attachment";
                        }
                    },
                    error: function(data, textStatus, errorThrown) {
                        console.log(textStatus);
                        console.log(data);
                    },
                });
            }
            // hint: ""
            // solution: ""
            // solution_has_video: false
            // solution_video: {video_type: "youtube", link: ""}
        });
        $('#solution').summernote({
            placeholder: 'Start Typing here...',
            tabsize: 2,
            height: 120,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'fullscreen', 'superscript', 'subscript']],
                ['view', ['codeview', 'help']]
            ]
        });
        $('#hint').summernote({
            placeholder: 'Start Typing here...',
            tabsize: 2,
            height: 120,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'fullscreen', 'superscript', 'subscript']],
                ['view', ['codeview', 'help']]
            ]
        });
    </script>

</body>

</html>
