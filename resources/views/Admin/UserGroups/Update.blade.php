<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update User Group - {{$userGroup['name']}}</title>
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

        <h1 class="text-dark h2 my-4">Edit User Group</h1>
        
        <div class="bg-white shadow rounded-4 p-4">
            <div class="form-input">
                <div class="my-4">
                    <label class="text-dark fw-medium" for="newUserGroupName">User Group Name</label>
                    <input type="text" class="form-control mt-3" placeholder="Name" id="newUserGroupName" value="{{$userGroup['name']}}">
                    <span id="newUserGroupName_error" class="text-danger small d-none"></span>
                </div>
                <div class="my-4">
                    <label class="text-dark fw-medium" for="summernote">Description (Max. 1000 Characters)</label>
                    <div class="my-3">
                        <textarea id="summernote">{!!$userGroup['description']!!}</textarea>
                    </div>
                </div>
                <div class="my-4">
                    <div class="row m-0 align-items-center justify-content-between">
                    <div class="col-10">
                        <label class="text-dark fw-medium" for="active_inactive_switch">
                        <span class="active_inactive_text">
                            @if($userGroup['is_active'])
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
                        @if($userGroup['is_active'])
                            <input class="form-check-input shadow-none border border-dark btn-lg" type="checkbox" role="switch" id="active_inactive_switch" checked="checked">
                        @else
                            <input class="form-check-input shadow-none border border-dark btn-lg" type="checkbox" role="switch" id="active_inactive_switch">
                        @endif
                        </div>
                    </div>
                    </div>
                </div>
                <div class="my-4">
                    <div class="row m-0 align-items-center justify-content-between">
                    <div class="col-10">
                        <label class="text-dark fw-medium" for="public_private_check">
                        <span class="public_private_text">
                            @if($userGroup['is_private'])
                                Private
                            @else
                                Public
                            @endif
                        </span>
                        Group </label>
                        <p class="my-2">Private Group (Only admin can add users). Public Group (Anyone can join)</p>
                    </div>
                    <div class="col-2">
                        <div class="form-check form-switch text-center">
                            @if($userGroup['is_private'])
                                <input class="form-check-input shadow-none border border-dark btn-lg" type="checkbox" role="switch" id="public_private_check" checked>
                            @else
                                <input class="form-check-input shadow-none border border-dark btn-lg" type="checkbox" role="switch" id="public_private_check">
                            @endif
                        </div>
                    </div>
                    </div>
                </div>
                <div class="my-4">
                    <div class="text-end">
                        <div class="formError" class="font-size-13 text-danger"></div>
                        <button class="btn btn_primary_customized shadow-sm text-white" id="updateUserGroup">Update</button>
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

        $("#updateUserGroup").click(function(){
            let id = {!! str_replace("'", "\'", json_encode($userGroup['id'])) !!};
            let name = $("#newUserGroupName").val();
            let description = $("#summernote").val();
            let isActive = $('#active_inactive_switch').is(':checked');
            let isPrivate = $('#public_private_check').is(':checked');
            if(name){
                $.ajax({
                    dataType: 'json',
                    type: "PATCH",
                    url: '/admin/user-groups/'+id,
                    data: {
                        description: description,
                        is_active: isActive,
                        is_private: isPrivate,
                        name: name,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        if(data.success){
                            window.location.href = '/admin/user-groups';
                        }
                    },
                    error: function(data, textStatus, errorThrown) {
                        console.log(textStatus);
                        var obj = data.responseJSON.errors;
                        let formError = obj[Object.keys(obj)[0]][0];
                        $("#NewUserFormError").text(formError);
                    },
                });
            } else {
                $("#formError").text("User group name field is required, please enter user group name.");
            }
        });

    </script>

</body>

</html>