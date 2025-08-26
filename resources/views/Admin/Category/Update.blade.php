<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Category - {{$category['name']}}</title>
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
        .font-size-13{font-size: 13px}
        #short_description {
            height: 100px
        }
    </style>
</head>

<body>
    @include('sidebar')
    @include('header')

    <section class="p-4">
        <h1 class="text-dark my-4 h2">Update Category</h1>
        <div class="bg-white shadow rounded-4 p-4 my-4">
            <div class="form-input">
                <div class="my-4">
                    <label class="text-dark fw-medium" for="newcategoryName">Category Name</label>
                    <input type="text" class="form-control mt-3" placeholder="Enter category name..." id="newcategoryName" value="{{$category['name']}}">
                    <span id="newcategoryName_error" class="text-danger small d-none"></span>
                </div>
                <div class="my-4">
                    <label class="text-dark fw-medium" for="short_description">Short Description (Max. 160 Characters)</label>
                    <div class="my-3">
                        <textarea class="form-control" id="short_description" placeholder="Enter short description...">{!!$category['short_description']!!}</textarea>
                    </div>
                </div>
                <div class="my-4">
                    <label class="text-dark fw-medium" for="summernote">Description</label>
                    <div class="my-3">
                        <textarea id="summernote">{!!$category['description']!!}</textarea>
                    </div> 
                </div>
                <div class="my-4">
                    <div class="row m-0 align-items-center justify-content-between">
                    <div class="col-10">
                        <label class="text-dark fw-medium" for="active_inactive_switch">
                        <span class="active_inactive_text">
                            @if($category['is_active'])
                                Active
                            @else
                                In-active
                            @endif
                        </span>
                        </label>
                        <p class="my-2">Active (Shown Everywhere). In-active (Hidden Everywhere).</p>
                    </div>
                    <div class="col-2">
                        <div class="form-check form-switch text-center">
                            @if($category['is_active'])
                                <input class="form-check-input shadow-none btn-lg" type="checkbox" role="switch" id="active_inactive_switch" checked="checked">
                            @else
                                <input class="form-check-input shadow-none btn-lg" type="checkbox" role="switch" id="active_inactive_switch">
                            @endif
                        </div>
                    </div>
                    </div>
                </div>
                <div class="my-4">
                    <div class="text-end">
                        <div class="formError" class="font-size-13 text-danger"></div>
                        <button class="btn btn-primary shadow-sm" id="updatecategory">Update</button>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </section>

    @include('parentsidebar.sidebarending')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script>
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
            $("#updatecategory").click(function(){
                let id = {!! str_replace("'", "\'", json_encode($category['id'])) !!};
                let name = $("#newcategoryName").val();
                let description = $("#summernote").val();
                let shortDescription = $("#short_description").val();
                let isActive = $('#active_inactive_switch').is(':checked');
                if(name){
                    $.ajax({
                        dataType: 'json',
                        type: "PATCH",
                        url: '/admin/categories/'+id,
                        data: {
                            description: description,
                            is_active: isActive,
                            name: name,
                            short_description: shortDescription,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(data) {
                            if(data.success){
                                window.location.href = '/admin/categories';
                            }
                        },
                        error: function(data, textStatus, errorThrown) {
                            console.log(textStatus);
                            var obj = data.responseJSON.errors;
                            let formError = obj[Object.keys(obj)[0]][0];
                            $("#formError").text(formError);
                        },
                    });
                } else {
                    $("#formError").text("Category name field is required, please enter Category name.");
                }
            });
        });
    </script>

</body>

</html>