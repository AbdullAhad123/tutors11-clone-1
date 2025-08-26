<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Question Transfer</title>
    <!-- rel icon -->
    <link rel="icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}">
    <meta name="description" content="{{ app(\App\Settings\SiteSettings::class)->seo_description }}">
    <meta name="author" content="{{ app(\App\Settings\SiteSettings::class)->app_name }}">
    <!-- bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body> 
    @include('sidebar')
    @include('header')

    <section class="p-4">

        <div class="my-4">
            <h1 class="text-dark my-2">Question Transfer</h1>
            <p class="fs-5 text-dark my-2">Admins can effortlessly move questions between topics and subtopics with just one click, streamlining content management.</p>
        </div>

        @if (Session::has('success'))
            <div class="alert alert_success align-items-center d-flex my-4 p-3">
                <i class="bx bx-check-circle me-1"></i>
                {{Session::get('success')}}
            </div>
        @endif

        <div class="bg-white p-4 rounded-3 shadow">
            <form action="{{route('change_topics')}}" method="post">
            @csrf
                <h1 class="mb-0 h5 mt-4 text-dark"><span id="totalQues">0</span> Questions In Selected Area</h1>
                <div class="row">
                    <div class="col-12 col-sm-4">
                        <div class="my-4">
                            <label for="old_section" class="form-label">Old Subject:</label>
                            <select id="old_section" class="form-select">
                                @foreach($sections as $section)
                                    <option value="{{$section->id}}">{{$section->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-sm-4">
                        <div class="my-4">
                            <label for="old_topic" class="form-label">Old Topic:</label>
                            <select name="old_topic" id="old_topic" class="form-select" required>
                                @foreach($topics as $topic)
                                    <option class="topic_option" value="{{$topic->id}}" data-topic_id="{{$topic->id}}" data-section_id="{{$topic->section_id}}">{{$topic->name}}</option>
                                @endforeach
                                <option value="">--</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-sm-4">
                        <div class="my-4">
                            <label for="old_sub_topic" class="form-label">Old Sub-Topic:</label>
                            <select name="old_sub_topic" id="old_sub_topic" class="form-select" required>
                                @foreach($sub_topics as $subtopic)
                                    <option class="sub_topic_option" value="{{$subtopic->id}}" data-sub_topic_id="{{$subtopic->id}}" data-topic_id="{{$subtopic->skill_id}}">{{$subtopic->name}}</option>
                                @endforeach
                                <option value="">--</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-sm-4">
                        <div class="my-4">
                            <label for="new_section" class="form-label">New Subject:</label>
                            <select id="new_section" class="form-select">
                                @foreach($sections as $section)
                                    <option value="{{$section->id}}">{{$section->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-sm-4">
                        <div class="my-4">
                            <label for="new_topic" class="form-label">New Topic:</label>
                            <select name="new_topic" id="new_topic" class="form-select" required>
                                @foreach($topics as $topic)
                                    <option class="topic_option" value="{{$topic->id}}" data-topic_id="{{$topic->id}}" data-section_id="{{$topic->section_id}}">{{$topic->name}}</option>
                                @endforeach
                                <option value="">--</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-sm-4">
                        <div class="my-4">
                            <label for="new_sub_topic" class="form-label">New Sub-Topic:</label>
                            <select name="new_sub_topic" id="new_sub_topic" class="form-select" required>
                                @foreach($sub_topics as $subtopic)
                                    <option class="sub_topic_option" value="{{$subtopic->id}}" data-topic_id="{{$subtopic->skill_id}}">{{$subtopic->name}}</option>
                                @endforeach
                                <option value="">--</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="my-4 text-end">
                    <input type="submit" value="Change" class="btn btn-primary px-3 p-2">
                </div>
            </form>
        </div>

   </section>

   <script>
        getting_old_topic($("#old_section").val());
        getting_new_topic($("#new_section").val());
        $("#old_section").change(function() {
            getting_old_topic($(this).val());
        });
        $("#new_section").change(function() {
            getting_new_topic($(this).val());
        });
        $("#old_topic").change(function() {
            getting_old_subtopic($(this).val());
        });
        $("#new_topic").change(function() {
            getting_new_subtopic($(this).val());
        });
        $("#old_sub_topic").change(function() {
            getting_total_ques($("#old_topic").val(), $(this).val())
        });
        function getting_old_topic(section){
            $("#old_topic").find(".topic_option").addClass("d-none");
            $("#old_topic").val($("#old_topic").find(".topic_option[data-section_id="+section+"]").first().val());
            $("#old_topic").find(".topic_option[data-section_id="+section+"]").removeClass("d-none");
            getting_old_subtopic($("#old_topic").find(".topic_option").not('.d-none').first().data("topic_id"));
        }
        function getting_new_topic(section){
            $("#new_topic").find(".topic_option").addClass("d-none");
            $("#new_topic").val($("#new_topic").find(".topic_option[data-section_id="+section+"]").first().val());
            $("#new_topic").find(".topic_option[data-section_id="+section+"]").removeClass("d-none");
            getting_new_subtopic($("#new_topic").find(".topic_option").not('.d-none').first().data("topic_id"));
        }
        function getting_old_subtopic(topic){
            $("#old_sub_topic").find(".sub_topic_option").addClass("d-none");
            $("#old_sub_topic").val($("#old_sub_topic").find(".sub_topic_option[data-topic_id="+topic+"]").first().val());
            $("#old_sub_topic").find(".sub_topic_option[data-topic_id="+topic+"]").removeClass("d-none");
            getting_total_ques(topic, $("#old_sub_topic").find(".sub_topic_option").not('.d-none').first().data("sub_topic_id"));
        }
        function getting_new_subtopic(topic){
            $("#new_sub_topic").find(".sub_topic_option").hide();        
            $("#new_sub_topic").val($("#new_sub_topic").find(".sub_topic_option[data-topic_id="+topic+"]").first().val());
            $("#new_sub_topic").find(".sub_topic_option[data-topic_id="+topic+"]").show();
        }
        function getting_total_ques(topic, sub_topic) {
            $.ajax({
                url: '/admin/topic-selector/questions',
                dataType: 'json',
                type: 'POST',
                data: {
                    topic: topic,
                    sub_topic: sub_topic,
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    if(data){
                        $("#totalQues").text(data.count);
                    }
                },
                error: function(data, textStatus, errorThrown) {
                    console.log(textStatus);
                    console.log(data);
                },
            });
        }
   </script>
</body>

</html>
