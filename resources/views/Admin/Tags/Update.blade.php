<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Tag - {{$tag['name']}}</title>
    <!-- rel icon -->
    <link rel="icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}">
    <meta name="description" content="{{ app(\App\Settings\SiteSettings::class)->seo_description }}">
    <meta name="author" content="{{ app(\App\Settings\SiteSettings::class)->app_name }}">
    <!-- bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>.select_custom{min-width: 160px;}</style>
</head>

<body>
    @include('sidebar')
    @include('header')

    <section class="p-4">
        <h1 class="text-dark my-4 h2">Update Tags - {{$tag['name']}}</h1>
        <div class="bg-white rounded-4 shadow p-4 my-4">
            <div class="container form-input">
                <div class="mb-4">
                    <label for="newTagName" class="fw-medium text-dark">Tag Name</label>
                    <input type="text" class="form-control my-2" id="newTagName" value="{{$tag['name']}}">
                    <span id="newTagname_error" class="text-danger small d-none"></span>
                </div>
                <div class="my-4">
                    <div class="row m-0 align-items-center justify-content-between">
                    <div class="col-10">
                        <label for="active_inactive_switch" class="fw-medium text-dark">
                        <!-- printing -->
                        <span class="active_inactive_text">
                            @if($tag['status'] == 'Active')
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
                            @if($tag['status'] == 'Active')
                                <input class="form-check-input shadow-none border border-dark btn-lg" type="checkbox" role="switch" id="active_inactive_switch" checked>
                            @else
                                <input class="form-check-input shadow-none border border-dark btn-lg" type="checkbox" role="switch" id="active_inactive_switch">
                            @endif
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            <div class="w-100 text-end">
                <div class="mb-1 font-size-13 text-danger" id="NewTagFormError"></div>
                <button class="btn btn-primary" id="updateTag">Update</button>
            </div>
        </div>
    </section>

    @include('parentsidebar.sidebarending')

    <script>
        $(document).ready(function(){
            // for active inactive switch 
            $("#active_inactive_switch").click(function(){
                if ($("#active_inactive_switch").is(':checked')) {
                    $(".active_inactive_text").html("Active");
                } else {
                    $(".active_inactive_text").html("In-active");
                }
            });
            // for creating tag 
            $("#updateTag").click(function(){
                let id = {!! str_replace("'", "\'", json_encode($tag['id'])) !!};
                let TagName = $("#newTagName").val();
                let isActive = $("#active_inactive_switch").is(':checked');
                if (TagName == "") {
                    $("#newTagName").addClass("border-danger");
                    $("#newTagname_error").removeClass("d-none");
                    $("#newTagname_error").html("The name field is required");
                } else {
                    $("#newTagName").removeClass("border-danger");
                    $("#newTagname_error").addClass("d-none");
                    $.ajax({
                        dataType: 'json',
                        type: "PATCH",
                        url: '/admin/tags/'+id,
                        data: {
                            is_active: isActive,
                            name: TagName,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(data) {
                            if(data.success){
                                window.location.href = '/admin/tags';
                            }
                        },
                        error: function(data, textStatus, errorThrown) {
                            console.log(textStatus);
                        },
                    });
                }
            });
        // ready ends 
        });
    </script>

</body>

</html>
