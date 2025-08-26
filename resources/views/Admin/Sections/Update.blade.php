<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Subject - {{$section['name']}}</title>
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

        <h1 class="text-dark my-4 h2">Edit Subject - {{$section['name']}}</h1>

        <div class="bg-white shadow my-4 p-4 rounded-4">
            <div class="container form-input">
                <div class="my-4">
                    <label for="newSectionName" class="text-dark fw-medium">Subject</label>
                    <input type="text" class="form-control my-2" id="newSectionName" value="{{$section['name']}}" placeholder="Enter subject name...">
                    <span id="newSectionName_error" class="text-danger small d-none"></span>
                </div>
                <div class="my-4">
                    <label for="Sectiondescription" class="text-dark fw-medium">Description</label>
                    <textarea name="description" placeholder="Enter description..." class="text_area_div my-2 form-control"
                        style="height: 120px;" id="Sectiondescription">{!!$section['short_description']!!}</textarea>
                </div>
                <div class="my-4">
                    <div class="row m-0 align-items-center justify-content-between">
                        <div class="col-10">
                            <label for="active_inactive_switch" class="text-dark fw-medium">
                                <!-- printing -->
                                <span class="active_inactive_text">
                                    @if($section['is_active'])
                                        Active
                                    @else
                                        In-active
                                    @endif
                                </span>
                            </label>
                            <p class="my-2 text-dark"><b>Active</b> (Shown Everywhere). <b>In-active</b> (Hidden
                                Everywhere).</p>
                        </div>
                        <div class="col-2 ">
                            <div class="form-check form-switch text-center">
                                @if($section['is_active'])
                                    <input class="form-check-input shadow-none btn-lg" type="checkbox" role="switch" id="active_inactive_switch" checked>
                                @else
                                    <input class="form-check-input shadow-none btn-lg" type="checkbox" role="switch" id="active_inactive_switch">
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-100 text-end my-3">
                    <div class="mb-1 font-size-13 text-danger" id="NewTagFormError"></div>
                    <button class="btn btn-primary" id="updateSection">Create</button>
                </div>
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
                console.log("Is active");
            } else {
                $(".active_inactive_text").html("In-active");
                console.log("Not active");
            }
        });
        // for section name 
        $("#updateSection").click(function(){
            let id = {!! str_replace("'", "\'", json_encode($section['id'])) !!};
            let SectionName = $("#newSectionName").val();
            let SectionDesc = $("#Sectiondescription").val();
            let isActive = $("#active_inactive_switch").is(':checked')
            if (SectionName == "") {
                $("#newSectionName").addClass("border-danger");
                $("#newSectionName_error").removeClass("d-none");
                $("#newSectionName_error").html("The name field is required");
            } else {
                $("#newSectionName").removeClass("border-danger");
                $("#newSectionName_error").addClass("d-none");
                $.ajax({
                    dataType: 'json',
                    type: "PATCH",
                    url: '/admin/sections/'+id,
                    data: {
                        icon_path: "",
                        is_active: isActive,
                        name: SectionName,
                        short_description: SectionDesc,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        if(data.success){
                            window.location.href = '/admin/sections';
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
        })
    });

    </script>
</body>

</html>
