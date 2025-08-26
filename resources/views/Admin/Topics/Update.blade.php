<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Sub-topic - {{$topic['name']}} </title>
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
        <h1 class="text-dark h2 my-4 h2">Edit Subtopic - {{$topic['name']}}</h1>
        <div class="bg-white shadow p-4 my-4 rounded-4">
            <div class="container p-1">
                <form action="{{ route('topics.update', ['topic' => $topic['id']]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                    <div class="form-input">
                        <div class="my-4">
                            <label class="fw-medium text-dark" for="name">New Sub-topic Name</label>
                            <input type="text" name="name" value="{{$topic['name']}}" class="form-control my-2" placeholder="New subtopic name..." id="name" required>
                            <span id="name_error" class="text-danger small d-none"></span>
                        </div>

                        <div class="my-4">
                            <label class="fw-medium text-dark" for="selectSection">Select Section</label>
                            <select class="form-select my-2 bg-transparent" id="selectSection">
                                @foreach($sections as $section)
                                    @if($current_section == $section->id)
                                        <option value="{{$section->id}}" selected>{{$section->name}}</option>
                                    @else
                                        <option value="{{$section->id}}">{{$section->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                            <span id="skill_id_error" class="text-danger small d-none"></span>
                        </div>

                        <div class="my-4">
                            <label class="fw-medium text-dark" for="skill_id">Topics</label>
                            <select class="form-select my-2 bg-transparent" name="skill_id" id="skill_id" required>
                                @foreach($skills as $skill)
                                @if($topic['skill_id'] == $skill['id'])
                                    <option value="{{$skill['id']}}" class="d-none" data-section_id="{{$skill['section_id']}}" selected>{{$skill['name']}}</option>
                                @else
                                    <option value="{{$skill['id']}}" class="d-none" data-section_id="{{$skill['section_id']}}">{{$skill['name']}}</option>
                                @endif
                                @endforeach
                            </select>
                            <span id="skill_id_error" class="text-danger small d-none"></span>
                        </div>

                        <div class="my-4">
                            <label class="fw-medium text-dark" for="helpsheet_photo">Help Sheet</label>
                            <input type="file" name="helpsheet_photo" id="helpsheet_photo" class="my-2 form-control">
                        </div>

                        <div class="my-4">
                            <label class="fw-medium text-dark" for="short_description">Description</label>
                            <textarea name="short_description" placeholder="New description..." class="text_area_div my-2 form-control" style="height: 100px;" id="short_description">{!!$topic['short_description']!!}</textarea>
                        </div>

                        <div class="my-4">
                            <div class="row m-0 align-items-center justify-content-between">
                                <div class="col-10">
                                    <label for="active_inactive_switch" class="fw-medium text-dark">
                                        <!-- printing -->
                                        <span class="active_inactive_text">
                                            @if($topic['is_active'])
                                                Active
                                            @else
                                                In-active
                                            @endif
                                        </span>
                                    </label>
                                    <p class="my-2"><b>Active</b> (Shown Everywhere). <b>In-active</b> (Hidden
                                        Everywhere).</p>
                                </div>
                                <div class="col-2">
                                    <div class="form-check form-switch text-center">
                                        @if($topic['is_active'])
                                            <input name="is_active" class="form-check-input shadow-none btn-lg" type="checkbox" role="switch" id="active_inactive_switch" checked>
                                        @else
                                            <input name="is_active" class="form-check-input shadow-none btn-lg" type="checkbox" role="switch" id="active_inactive_switch">
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="w-100 text-end my-4">
                        <div class="mb-1 font-size-13 text-danger" id="NewTagFormError"></div>
                        <input class="btn btn-primary" type="submit" value="Update">
                    </div>
                </form>
            </div>
        </div>
    </section>


    @include('parentsidebar.sidebarending')

    <script>
        getTopics($("#selectSection").val());
        $("#selectSection").change(function(){
            getTopics($(this).val());
        });
        function getTopics(id){
            $("#skill_id").find("option").addClass("d-none");
            $("#skill_id").find("option[data-section_id="+id+"]").removeClass("d-none");
        }
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
            // for getting values 
            $("#updateTopic").click(function(){

                let topicName = $("#name").val();
                let skill_id = $("#skill_id").val();
                let topicDesc = $("#description").val();
                let IsActive = $("#active_inactive_switch").is(':checked');
                let id = {!! str_replace("'", "\'", json_encode($topic['id'])) !!};

                if (topicName == "") {
                    $("#name").addClass("border-danger");
                    $("#name_error").removeClass("d-none");
                    $("#name_error").html("The name field is required");
                } else {
                    $("#name").removeClass("border-danger");
                    $("#name_error").addClass("d-none");
                }

                if (skill_id == "") {
                    $("#skill_id").addClass("border-danger");
                    $("#skill_id_error").removeClass("d-none");
                    $("#skill_id_error").html("The topic id field is required");
                } else {
                    $("#skill_id").removeClass("border-danger");
                    $("#skill_id_error").addClass("d-none");
                }

                if (topicName && skill_id) {
                    $.ajax({
                        dataType: 'json',
                        type: "PATCH",
                        url: '/admin/topics/'+id,
                        data: {
                            is_active: IsActive,
                            name: topicName,
                            short_description: topicDesc,
                            skill_id: skill_id,
                            _token:  '{{ csrf_token() }}'
                        },
                        success: function(data) {
                            if(data.success){
                                window.location.href = '/admin/topics';
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