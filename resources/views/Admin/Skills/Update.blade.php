<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Topic - {{$skill['name']}}</title>
    <!-- rel icon -->
    <link rel="icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}">
    <meta name="description" content="{{ app(\App\Settings\SiteSettings::class)->seo_description }}">
    <meta name="author" content="{{ app(\App\Settings\SiteSettings::class)->app_name }}">
    <!-- bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
    @include('sidebar')
    @include('header')

    <section class="p-4">
        <h1 class="text-dark my-4 h2">Update Topic - {{$skill['name']}}</h1>
        <div class="bg-white shadow rounded-4 p-4 my-4">
            <div class="container p-1 form-input">
                <div class="my-4">
                    <label class="fw-medium text-dark" for="newSkillsName">New Topic Name</label>
                    <input value="{{$skill['name']}}" type="text" class="form-control my-2" id="newSkillsName" placeholder="Enter topic name...">
                    <span id="newSkillsName_error" class="text-danger small d-none"></span>
                </div>
    
                <div class="my-4">
                    <label class="fw-medium text-dark" for="selectNewSkills">Subject</label>
                    <select class="form-select my-2 bg-transparent" id="selectNewSkills">
                    @foreach($sections as $section)
                        @if($skill['section_id'] == $section['id'])
                            <option value="{{$section['id']}}" selected>{{$section['name']}}</option>
                        @else
                            <option value="{{$section['id']}}">{{$section['name']}}</option>
                        @endif
                    @endforeach
                    </select>
                    <span id="selectNewSkills_error" class="text-danger small d-none"></span>
                </div>
                
                <div class="my-4">
                    <label class="fw-medium text-dark" for="newDescription">Description</label>
                    <textarea name="description" class="text_area_div my-2 form-control" style="height: 100px;" id="newDescription" placeholder="Enter description...">{!!$skill['short_description']!!}</textarea>
                </div>
                    
                <div class="my-4">
                    <div class="row m-0 align-items-center justify-content-between">
                        <div class="col-10">
                            <label for="active_inactive_switch" class="fw-medium text-dark">
                                <!-- printing -->
                                <span class="active_inactive_text">
                                @if($skill['is_active'])    
                                    Active
                                @else
                                    In-active
                                @endif
                                </span>
                            </label>
                            <p class="my-2"><b>Active</b> (Shown Everywhere). <b>In-active</b> (Hidden
                                Everywhere).</p>
                        </div>
                        <div class="col-2 ">
                            <div class="form-check form-switch text-center">
                            @if($skill['is_active'])    
                                    <input class="form-check-input shadow-none border border-dark btn-lg" type="checkbox" role="switch"
                                    id="active_inactive_switch" checked>
                                @else
                                    <input class="form-check-input shadow-none border border-dark btn-lg" type="checkbox" role="switch"
                                    id="active_inactive_switch">
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="w-100 text-end my-4">
                    <div class="mb-1 font-size-13 text-danger" id="NewTagFormError"></div>
                    <button class="btn btn-primary" id="updateSkill">Update</button>
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
            // for create skill 
            $("#updateSkill").click(function(){
                let skillName = $("#newSkillsName").val();
                let selectSkills = $("#selectNewSkills").val();
                let skillDescription = $("#newDescription").val();
                let id = {!! str_replace("'", "\'", json_encode($skill['id'])) !!};
                let isActive = $("#active_inactive_switch").is(':checked');

                if (skillName == "") {
                    $("#newSkillsName").addClass("border-danger");
                    $("#newSkillsName_error").removeClass("d-none");
                    $("#newSkillsName_error").html("The name field is required");
                } else {
                    $("#newSkillsName").removeClass("border-danger");
                    $("#newSkillsName_error").addClass("d-none");
                }

                if (selectSkills == "Select Skill") {
                    $("#selectNewSkills").addClass("border-danger");
                    $("#selectNewSkills_error").removeClass("d-none");
                    $("#selectNewSkills_error").html("The subject id field is required.");
                } else {
                    $("#selectNewSkills").removeClass("border-danger");
                    $("#selectNewSkills_error").addClass("d-none");
                }

                if (skillName && selectSkills) {
                    $.ajax({
                        dataType: 'json',
                        type: "PATCH",
                        url: '/admin/skills/'+id,
                        data: {
                            is_active: isActive,
                            name: skillName,
                            section_id: selectSkills,
                            short_description: skillDescription,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(data) {
                            if(data.success){
                                window.location.href = '/admin/skills';
                            }
                        },
                        error: function(data, textStatus, errorThrown) {
                            console.log(textStatus);
                        },
                    });
                
                }
            });
        });
    </script>
</body>
</html>