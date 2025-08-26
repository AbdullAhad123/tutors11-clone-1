<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Single Questions Transfer</title>
    <!-- rel icon -->
    <link rel="icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}">
    <meta name="description" content="{{ app(\App\Settings\SiteSettings::class)->seo_description }}">
    <meta name="author" content="{{ app(\App\Settings\SiteSettings::class)->app_name }}">
    <!-- bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
    <script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>
    <style>
        .choices{margin-bottom: 5px;}
        .choices__inner, .choices__input {background: #fff;}
        .choices__list--multiple .choices__item{background-color: #0062d3;border: 1px solid #0053b5;}
        .choices[data-type*=select-multiple] .choices__button, .choices[data-type*=text] .choices__button{border-left: 1px solid #0053b5;}
    </style>
</head>

<body> 
    @include('sidebar')
    @include('header')

    <section class="p-4">

        <div class="my-4">
            <h1 class="text-dark my-2">Single Questions Transfer</h1>
            <p class="fs-5 text-dark my-2">Admins can effortlessly move questions between topics and subtopics with just one click, streamlining content management.</p>
        </div>

        @if (Session::has('error'))
            <div class="alert alert-danger align-items-center d-flex my-4 p-3 shadow-sm">
                <i class="bx bx-x-circle me-1"></i>
                {{Session::get('error')}}
            </div>
        @endif

        <div class="bg-white p-4 rounded-3 shadow">
            <form action="{{route('change_questions_topics')}}" method="post" onsubmit="return validateForm()">
            @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="form-group my-4">
                            <label for="questionCodes" class="form-label">Question Codes</label>
                            <input class="form-control choices__input" name="codes" id="questionCodes" type="text" placeholder="Enter question codes">
                            <small class="text-danger mt-2" id="codes_error"></small>
                        </div>
                    </div>
                    <div class="col-12 col-sm-4">
                        <div class="my-4">
                            <label for="new_section" class="form-label">New Subject:</label>
                            <select id="new_section" class="form-select" name="subject">
                                @foreach($sections as $section)
                                    <option value="{{$section->id}}">{{$section->name}}</option>
                                @endforeach
                            </select>
                            <small class="text-danger mt-2" id="section_error"></small>
                        </div>
                    </div>
                    <div class="col-12 col-sm-4">
                        <div class="my-4">
                            <label for="new_topic" class="form-label">New Topic:</label>
                            <select name="topic" id="new_topic" class="form-select" required>
                                @foreach($topics as $topic)
                                    <option class="topic_option" value="{{$topic->id}}" data-topic_id="{{$topic->id}}" data-section_id="{{$topic->section_id}}">{{$topic->name}}</option>
                                @endforeach
                                <option value="">--</option>
                            </select>
                            <small class="text-danger mt-2" id="topic_error"></small>
                        </div>
                    </div>
                    <div class="col-12 col-sm-4">
                        <div class="my-4">
                            <label for="new_sub_topic" class="form-label">New Sub-Topic:</label>
                            <select name="sub_topic" id="new_sub_topic" class="form-select" required>
                                @foreach($sub_topics as $subtopic)
                                    <option class="sub_topic_option" value="{{$subtopic->id}}" data-topic_id="{{$subtopic->skill_id}}">{{$subtopic->name}}</option>
                                @endforeach
                                <option value="">--</option>
                            </select>
                            <small class="text-danger mt-2" id="subtopic_error"></small>
                        </div>
                    </div>
                </div>
                <div class="my-4 text-end">
                    <input type="submit" value="Update" class="btn btn-primary px-3 p-2">
                </div>
            </form>
        </div>

   </section>
   <script>
        getting_new_topic($("#new_section").val());
        $("#new_section").change(function() {
            getting_new_topic($(this).val());
        });
        $("#new_topic").change(function() {
            getting_new_subtopic($(this).val());
        });
        function getting_new_topic(section){
            $("#new_topic").find(".topic_option").addClass("d-none");
            $("#new_topic").val($("#new_topic").find(".topic_option[data-section_id="+section+"]").first().val());
            $("#new_topic").find(".topic_option[data-section_id="+section+"]").removeClass("d-none");
            getting_new_subtopic($("#new_topic").find(".topic_option").not('.d-none').first().data("topic_id"));
        }
        function getting_new_subtopic(topic){
            $("#new_sub_topic").find(".sub_topic_option").hide();        
            $("#new_sub_topic").val($("#new_sub_topic").find(".sub_topic_option[data-topic_id="+topic+"]").first().val());
            $("#new_sub_topic").find(".sub_topic_option[data-topic_id="+topic+"]").show();
        }
        var textUniqueVals = new Choices('#questionCodes', {
          allowHTML: true,
          duplicateItemsAllowed: false,
          editItems: true,
          removeItemButton: true,
        });
        function validateForm(event) {
            // Check if at least one of the required fields has a non-empty value
            var codes = $("#questionCodes").val();
            var subject = $("#new_section").val();
            var topic = $("#new_topic").val();
            var subTopic = $("#new_sub_topic").val();
            if(codes === ''){
                $("#codes_error").text("Please enter atleast one code");
            } else {
                $("#codes_error").text("");
            }
            if(subject === ''){
                $("#section_error").text("Please select subject");
            } else {
                $("#section_error").text("");
            }
            if(topic === ''){
                $("#topic_error").text("Please select topic");
            } else {
                $("#topic_error").text("");
            }
            if(subTopic === ''){
                $("#subtopic_error").text("Please select sub topic");
            } else {
                $("#subtopic_error").text("");
            }
            if(codes === '' || subject === '' || topic === '' || subTopic === '' || event.key === 'Enter'){
                return false;
            }
            return true;
        }
   </script>

</body>

</html>
