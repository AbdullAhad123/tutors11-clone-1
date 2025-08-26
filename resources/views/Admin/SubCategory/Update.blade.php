<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Year - {{$subCategory['name']}}</title>
    <!-- rel icon -->
    <link rel="icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}">
    <meta name="description" content="{{ app(\App\Settings\SiteSettings::class)->seo_description }}">
    <meta name="author" content="{{ app(\App\Settings\SiteSettings::class)->app_name }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
    </style>
</head>

<body>
    @include('sidebar')
    @include('header')

    <section class="p-4">
        <h1 class="text-dark my-4 h2">Update Sub-category</h1>
        <div class="bg-white p-4 my-4 shadow rounded-4">
            <div class="form-input">
                <div class="my-4">
                    <label class="fw-medium text-dark" for="newCategoryName">Year Name</label>
                    <input type="text" class="form-control my-2" id="newCategoryName" placeholder="Enter Subcategory Name" value="{{$subCategory['name']}}">
                    <span id="newCategoryName_error" class="text-danger small d-none"></span>
                </div>
                <div class="my-4">
                    <label for="category" class="fw-medium text-dark">Category</label>
                    <select name="category" id="category" class="form-select my-2">
                        @foreach($categories as $subCat)
                            @if($subCat['id'] == $subCategory['category_id'])
                                <option value="{{$subCat['id']}}" selected>{{$subCat['name']}}</option>
                            @else
                                <option value="{{$subCat['id']}}">{{$subCat['name']}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <div class="my-4">
                    <label for="type" class="fw-medium text-dark">Type</label>
                    <select name="type" id="type" class="form-select my-2">
                        @foreach($types as $type)
                            @if($type['id'] == $subCategory['sub_category_type_id'])
                                <option value="{{$type['id']}}" selected>{{$type['name']}}</option>
                            @else
                                <option value="{{$type['id']}}">{{$type['name']}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <div class="my-4">
                    <label class="fw-medium text-dark" for="shortDescription">Short Description (Max. 160 Characters)</label>
                    <textarea name="shortDescription" class="text_area_div form-control my-2"
                        style="height: 100px;" id="shortDescription" placeholder="Enter short description...">{!!$subCategory['short_description']!!}</textarea>
                </div>

                <div class="my-4">
                    <label class="fw-medium text-dark" for="summernote">Description</label>
                    <div class="my-2">
                        <textarea id="summernote" class="text-dark">{!!$subCategory['description']!!}</textarea>
                    </div>
                </div>

                <div class="my-4">
                    <div class="row m-0 align-items-center justify-content-between">
                        <div class="col-10">
                            <label for="flexSwitchCheckChecked" class="fw-medium text-dark">
                                <!-- printing -->
                                <span class="active_inactive_text">
                                    @if($subCategory['is_active'])
                                        Active
                                    @else
                                        In-active
                                    @endif
                                </span>
                            </label>
                            <p class="my-2"><b>Active</b> (Shown Everywhere). <b>In-active</b> (Hidden Everywhere).</p>
                        </div>
                        <div class="col-2 ">
                            <div class="form-check form-switch text-center">
                                @if($subCategory['is_active'])
                                    <input class="form-check-input shadow-none border border-dark btn-lg"
                                        type="checkbox" role="switch" id="flexSwitchCheckChecked" checked>
                                @else
                                    <input class="form-check-input shadow-none border border-dark btn-lg"
                                        type="checkbox" role="switch" id="flexSwitchCheckChecked">
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="w-100 text-end my-4">
                    <div class="mb-1 font-size-13 text-danger" id="formError"></div>
                    <button class="btn btn-primary" id="updatecategory">Update</button>
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
        });

        $("#updatecategory").click(function(){
            let id = {!! str_replace("'", "\'", json_encode($subCategory['id'])) !!};
            let name = $("#newCategoryName").val();
            let category = $("#category").val()?parseInt($("#category").val()):null;
            let type = $("#type").val()?parseInt($("#type").val()):null;
            let shortDescription = $("#shortDescription").val();
            let description = $("#summernote").val();
            let isAcive = $("#flexSwitchCheckChecked").is(':checked');
            if(name){
                if(category){
                    if(type){
                        $.ajax({
                            dataType: 'json',
                            type: "PATCH",
                            url: '/admin/sub-categories/'+id,
                            data: {
                                category_id: category,
                                description: description,
                                is_active: isAcive,
                                name: name,
                                short_description: shortDescription,
                                sub_category_type_id: type,
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(data) {
                                if(data.success){
                                    window.location.href = '/admin/sub-categories';
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
                        $("#formError").text("Please choose year type"); 
                    }
                } else {
                    $("#formError").text("Please choose a category");    
                }
            } else {
                $("#formError").text("year name field is required, please enter year name.");
            }
        });

    </script>

</body>

</html>