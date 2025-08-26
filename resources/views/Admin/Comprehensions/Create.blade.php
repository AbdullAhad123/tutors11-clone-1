<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        @if($editFlag)
            Edit Comprehension - {{$comprehension['title']}}
        @else
            Create Comprehension
        @endif
    </title>
    <!-- rel icon -->
    <link rel="icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <meta name="description" content="{{ app(\App\Settings\SiteSettings::class)->seo_description }}">
    <meta name="author" content="{{ app(\App\Settings\SiteSettings::class)->app_name }}">
    <!-- bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
        .editor {
            position: relative;
            width: 100%;
            min-height: 40vh;
            max-height: 400px;
            margin: 0 auto;
            padding: 20px;
            background: #fcfcfc;
            border-radius: 3px;
            border: 1px solid #696cff;
            box-sizing: border-box;
            word-break: break-all;
            outline: 0;
        }

        .btn_primary_customized {
            text-transform: uppercase;
            font-size: 0.9rem;
            background-color: #696cff !important;
        }

        .btn_primary_customized:hover {
            box-shadow: 0px 0px 10px 1px #34343425;
        }

        .text_black {
            color: #181818 !important;
        }

        .font_bold {
            font-weight: 600 !important;
        }
    </style>
</head>

<body>
    @include('sidebar')
    @include('header')


    <section class="p-4">

        <div class="bg-white shadow rounded-4 p-4 my-4">
            <h1 class="text-dark my-2 h2">Comprehension</h1>
            <div class="form-input">
                <div class="my-2 p-2">
                    <label class="text-dark fw-medium" for="textComp">Comprehension Title</label>
                    <div class="my-1">
                        @if($editFlag)
                            <input type="text" class="form-control my-1" placeholder="Enter Comprehension Title..." id="textComp" value="{{$comprehension['title']}}">
                        @else
                            <input type="text" class="form-control my-1" placeholder="Enter Comprehension Title..." id="textComp">
                        @endif
                            <span class="text-danger small d-none" data-name="name error" id="textCompError">This Field is required*</span>
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label class="text-dark fw-medium" for="summernote">Body:</label>
                    <div class="my-3">
                        @if($editFlag)
                            <textarea id="summernote"></textarea>
                        @else
                            <textarea id="summernote"></textarea>
                        @endif
                        <span class="text-danger small d-none" data-bs-name="des error" id="descriptionCompError">This Field is required*</span>
                    </div>
                </div>

                <div class="my-4">
                    <div class="row m-0 align-items-center justify-content-between">
                        <div class="col-10">
                            <label class="text-dark fw-medium" for="name">
                                <!-- printing -->
                                <span class="active_inactive_text">Active</span>
                            </label>
                            <p class="my-2"><b>Active</b> (Shown Everywhere). <b>In-active</b> (Hidden
                                Everywhere).</p>
                        </div>
                        <div class="col-2 ">
                            <div class="form-check form-switch text-center">
                            @if($editFlag && $comprehension['is_active'] == false)
                                <input class="form-check-input shadow-none border border-dark btn-lg" type="checkbox" role="switch" id="isActive">
                            @else
                                <input class="form-check-input shadow-none border border-dark btn-lg" type="checkbox" role="switch" id="isActive" checked>
                            @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="my-4 p-2">
                    <div class="text-end">
                        <div id="formError" class="font-size-13 mb-2 text-danger"></div>
                        <button class="btn btn-primary" id="proceedComprehension">
                            @if($editFlag)
                                Update
                            @else
                                Create
                            @endif
                        </button>
                    </div>
                </div>

            </div>
        </div>

    </section>

    @include('parentsidebar.sidebarending')

    <script  script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css">


    <script>
        $(document).ready(function(){
            // summer note 
            $('#summernote').summernote({
                placeholder: 'Start Typing here...',
                tabsize: 2,
                height: 200,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'fullscreen', 'superscript', 'subscript']],
                    ['view', ['codeview', 'help']]
                ],
                callbacks: {
                    onInit: function() {
                        $('.note-toolbar').addClass('custom-toolbar');
                    }
                }
            });

            var editFlag = false;
            var desc, comprehensionId;
            var method = "POST";
            var url = "/admin/comprehensions";
            @if($editFlag)
                editFlag = true;
                desc = {!! str_replace("'", "\'", json_encode($comprehension['body'])) !!};
                comprehensionId = {!! str_replace("'", "\'", json_encode($comprehension['id'])) !!};
                var method = "PATCH";
                var url = "/admin/comprehensions/"+comprehensionId;
            @endif
            if(editFlag){
                $("#summernote").val(desc.replaceAll("</p>", "\n").replaceAll("<p>", ""));
            }
            $("#proceedComprehension").click(function() {
                let titleCom = $("#textComp").val();
                let descComp = $("#summernote").val();
                if (titleCom == "") {
                    $("#textCompError").removeClass("d-none");
                } else {
                    $("#textCompError").addClass("d-none");
                }
                if (descComp == "") {
                    $("#descriptionCompError").removeClass("d-none");
                } else {
                    $("#descriptionCompError").addClass("d-none");
                }

                if(titleCom && descComp){
                    let isActive = $('#isActive').is(':checked');
                    let bodyArr = $("#summernote").val().split("\n");
                    bodyArr.forEach(function(para, i) {
                        para = '<p>'+para+'</p>';
                        bodyArr[i] = para;
                    });
                    
                    $.ajax({
                        type: method,
                        url: url,
                        data: {
                            body: bodyArr.join(" "),
                            is_active: isActive,
                            title: titleCom,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(data) {
                            console.log(data)
                            if(data.success){
                                window.location.href = "/admin/comprehensions";
                            }
                        },
                        error: function(data, textStatus, errorThrown) {
                            console.log(textStatus);
                            var obj = data.responseJSON.errors;
                            let formError = obj[Object.keys(obj)[0]][0];
                            $("#formError").text(formError);
                        },
                    });
                }
            });
            // error 
            $(document).on("keyup","#textComp, #summernote", function(e){
                $("#formError").empty();
            });
        });
    </script>
</body>

</html>