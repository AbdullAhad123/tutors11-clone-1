<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        @if($editFlag)
            Edit Quiz Type - {{$QuizType['name']}}
        @else 
            Create Quiz Type
        @endif
    </title>
    <!-- rel icon -->
    <link rel="icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}">
    <meta name="description" content="{{ app(\App\Settings\SiteSettings::class)->seo_description }}">
    <meta name="author" content="{{ app(\App\Settings\SiteSettings::class)->app_name }}">
</head>

<body>
    @include('sidebar')
    @include('header')

    <section class="p-4">

        <div class="d-flex justify-content-between align-items-center my-4 flex-wrap">
            <h1 class="text-dark h2 my-2"> 
                @if($editFlag)
                    Edit
                @else 
                    Create 
                @endif
                Quiz Type
                @if($editFlag)
                - {{$QuizType['name']}}
                @endif
            </h1>
            <a href="/admin/quiz-types" class="my-2"><button class="bg_primary_label border-primary btn p-2 px-3 shadow text-primary"><i class='bx bx-arrow-back'></i><span>Back</span></button></a>
        </div>

        <div class="bg-white p-4 rounded-3 shadow">
            <div class="form-group mb-4">
                <label for="name" class="text-dark fw-medium">Quiz Type Name</label>
                <input type="text" class="form-control shadow-sm mt-2 border" id="name" placeholder="Enter Name..." value="@if($editFlag){{$QuizType['name']}}@endif">
            </div>
            <div class="form-group mb-4">
                <label for="color" class="text-dark fw-medium">Color</label>
                <div class="d-flex align-items-lg-center">
                    <input class="me-2 p-0 border-0 overflow-hidden rounded cursor-pointer" type="color" id="color" name="color" @if($editFlag) value="#{{$QuizType['color']}}" @else value="#444444" @endif>
                    <input type="text" class="form-control shadow-sm border" id="colorText" value="@if($editFlag){{$QuizType['color']}}@endif">
                </div>
            </div>
            <div class="form-group mb-4">
                <label for="summernote" class="text-dark fw-medium">Description</label>
                <div class="my-3">
                    <textarea id="summernote">@if($editFlag){{$QuizType['description']}}@endif</textarea>
                </div>
            </div>
            <div class="mb-4 row">
                <div class="col-12 col-sm-8">
                    <div id="allowActiveText" class="h6 mb-1 text-dark">
                        @if($editFlag && $QuizType['is_active'])
                            In-Active
                        @else
                            Active
                        @endif
                    </div>
                    <div class="lh-1 font-size-13">Active (Shown Everywhere). In-active (Hidden Everywhere).</div>
                </div>
                <div class="col-12 col-sm-4 d-flex align-items-center justify-content-sm-end">
                    <label class="switch mt-2">
                        @if($editFlag && $QuizType['is_active'])
                            <input id="allowActive" type="checkbox" checked>
                        @else
                            <input id="allowActive" type="checkbox">
                        @endif
                        <span class="slider round"></span>
                    </label>
                </div>
            </div>
            <div class="text-end">
                <div id="formError" class="font-size-13 mb-2 text-danger"></div>
                @if($editFlag)
                    <button class="btn btn-primary my-3" id="submitButton" data-type="update" data-id="{{$QuizType['id']}}">Update</button>
                @else
                    <button class="btn btn-primary my-3" id="submitButton" data-type="create" >Create</button>
                @endif
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

        let editFlag = {!! str_replace("'", "\'", json_encode($editFlag)) !!};
        $('#color').change(function() {
            let color =  $(this).val().replace('#','');
            $("#colorText").val(color);
        });
        $('#allowActive').change(function() {
            let allowActive = $(this).is(':checked');
            if(allowActive){
                $("#allowActiveText").text("Active");
            } else {
                $("#allowActiveText").text("In-Active");
            }
        });
        $(document).on("keyup","#name", function(e){
            if($(this).val().length > 0) {
                $("#formError").text("");
            }
        });
        $("#submitButton").click(function() {
            let name = $("#name").val();
            let color =  $("#color").val().replace('#','');
            let description = $("#summernote").val();
            let is_active = $("#allowActive").is(':checked');
            let type = $(this).data("type");
            var reqUrl, reqType, id;
            if(editFlag && type == 'update'){
                id = $(this).data("id");
                reqUrl = '/admin/quiz-types/'+id;
                reqType = "PATCH";
            } else {
                reqUrl = '/admin/quiz-types';
                reqType = "POST";
            }
            if(name){
                $.ajax({
                    url: reqUrl,
                    dataType: 'json',
                    type: reqType,
                    data: {
                        color: color,
                        description: description,
                        image_path : "",
                        is_active: is_active,
                        name: name,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        if(data.success){
                            window.location.href = "/admin/quiz-types";
                        }
                    },
                    error: function(data, textStatus, errorThrown) {
                        console.log(textStatus);
                        console.log(data);
                    },
                });
            } else {
                $("#formError").text("Please enter quiz type name");
            }
        });
    </script>
</body>

</html>
