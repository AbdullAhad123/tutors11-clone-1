<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Configure Videos - {{$subCategory['name']}} {{$skill['name']}}</title>
    <!-- rel icon -->
    <link rel="icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}">
    <meta name="description" content="{{ app(\App\Settings\SiteSettings::class)->seo_description }}">
    <meta name="author" content="{{ app(\App\Settings\SiteSettings::class)->app_name }}">
    <!-- bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
        .cursor-not-allowed{cursor:not-allowed !important}
        .practice_set_form{max-width: 900px !important;}
        #start_search:hover,#start_search:active{background: transparent;cursor: default;color: #bcc4cc !important;}
        #skill_Dropdown{max-height: 175px;}
        .font-size-13{font-size:13px;}
        input::-webkit-outer-spin-button,input::-webkit-inner-spin-button {-webkit-appearance: none;margin: 0;}
        input[type=number] {-moz-appearance: textfield;}
    </style>
</head>

<body> 
    @include('sidebar')
    @include('header')

    <section class="p-4">

        <div class="bg-white rounded-4 my-4 py-4 p-3 shadow">
            <div class="row m-0">
                <div class="col-lg-5 col-md-12 align-self-center">
                    <div class="h5 text-dark mb-0">Configure Videos</div>
                    <div class="mt-1">{{$subCategory['name']}} {{$skill['name']}}</div>
                </div>
                <div class="col-lg-7 col-md-12 d-flex justify-content-evenly">
                    @foreach ($steps as $key => $step)
                        @if($step['status'] == 'active')
                            <a href="{{$step['url']}}">
                                <button class="bg-label-primary border-primary btn mx-1">
                                    <span class="badge bg-primary circle-badge rounded-circle text-white"> {{$key + 1}} </span> 
                                    {{$step['title']}}
                                </button>
                            </a>                        
                        @else
                            <a href="{{$step['url']}}">
                                <button class="btn btn-outline-primary mx-1">
                                    <span class="badge bg-primary circle-badge rounded-circle text-white"> {{$key + 1}} </span> 
                                    {{$step['title']}}
                                </button>
                            </a> 
                        @endif
                    @endforeach
                </div>
            </div>
        </div>

        <div class="bg-white rounded-4 my-4 py-4 p-3 shadow">
            <div class="container px-0">
                <div class="row">
                    <div class="col-md-4 col-12 border-end">
                        <div class="border-bottom pb-2">
                            <svg fill="none" height="22" width="22" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path></svg>
                            <label for="filters" class="fw-medium text-dark">Filters</label>
                        </div>
                        <div class="my-3">
                            <label for="code" class="fw-medium text-dark">Code</label>
                            <input id="code" type="text" class="form-control" placeholder="Code">
                        </div>
                        <div class="my-3">
                            <label for="topic" class="fw-medium text-dark">Topic</label>
                            <div class="dropdown">
                                <input id="topic" type="text" class="form-control dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="true" placeholder="Topic">
                                <ul id="topic_Dropdown" class="dropdown-menu w-100 p-0 overflow-auto">
                                    <li class="dropdown-item text-center text-light" id="start_search">
                                        Start typing to search.
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- <div class="my-3">
                            Topic
                            <input id="topic" type="text" class="form-control" placeholder="Topic">
                        </div> -->
                        <div class="my-3">
                            <label for="tag" class="fw-medium text-dark">By Tag</label>
                            <!-- <input id="byTag" type="text" class="form-control" placeholder="Start Searching"> -->
                            <div class="dropdown">
                                <input id="tag" type="text" class="form-control dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="true" placeholder="Start Searching">
                                <ul id="tag_Dropdown" class="dropdown-menu w-100 p-0 overflow-auto">
                                    <li class="dropdown-item text-center text-light" id="start_search">
                                        Start typing to search.
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="my-3" id="difficultyFilters">
                            <label for="difficulty_level" class="fw-medium text-dark">Difficulty Level</label>
                            @foreach ($difficultyLevels as $key => $difficulty)
                                <div class="form-check mt-2">
                                    <input type="checkbox" data-difficulty="{{$difficulty['name']}}" class="form-check-input cursor-pointer" id="difficulty-check{{$difficulty['id']}}" name="difficulty-option{{$difficulty['id']}}" value="{{$difficulty['id']}}">
                                    <label class="form-check-label cursor-pointer" for="difficulty-check{{$difficulty['id']}}">{{$difficulty['name']}}</label>
                                </div>
                            @endforeach
                        </div>
                        <div class="row row-cols-2 my-4 text-center">
                            <div class="p-2">
                                <button id="resetFilter" class="btn btn-outline-secondary w-100">Reset</button>
                            </div>
                            <div class="p-2">
                                <button id="searchFilter" class="btn btn-outline-primary w-100">Search</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 col-12">
                        <div class="alert alert_success rounded-4 shadow my-3 text-dark">
                            <div class="font-black fs-5">Currently Viewing Videos</div>
                            <div class="nav mt-2" role="tablist">
                                <button class="bg-transparent border-0 text-primary active" id="view-videos-tab" data-bs-toggle="tab" data-bs-target="#view-Videos" type="button" role="tab" aria-controls="view-Videos" aria-selected="true">View Videos</button>
                                <span class="mx-2 align-self-center font-black"> | </span>
                                <button class="bg-transparent border-0 text-primary" id="add-videos-tab" data-bs-toggle="tab" data-bs-target="#add-Videos" type="button" role="tab" aria-controls="add-Videos" aria-selected="false">Add Videos</button>
                            </div>
                        </div>

                        <div class="bg-body-tertiary border p-3 rounded-4 my-3 shadow tab-content">
                            <div class="tab-pane fade active show" id="view-Videos" role="tabpanel" aria-labelledby="view-videos-tab">
                                <div>
                                    <div class="text-body text-center my-2"><span id="countLessons"></span> items found for the selected criteria.</div>
                                    <div id="noLessons" class="text-center my-4">
                                        <img src="{{url('images/no_record_found.png')}}" width="200" height="auto" alt="no records found">
                                        <h2 class="h5 text-center text-dark my-1">No Lessons</h2>
                                    </div>
                                    <div id="fetchLessons"></div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="add-Videos" role="tabpanel" aria-labelledby="add-videos-tab">
                                <div>
                                    <div class="text-body text-center my-2"><span id="countAvailableLessons"></span> items found for the selected criteria.</div>
                                    <div id="noAvailableLessons" class="text-center my-4">
                                        <img src="{{url('images/no_record_found.png')}}" width="200" height="auto" alt="no records found">
                                        <h2 class="h5 text-center text-dark my-1">No Lessons</h2>
                                    </div>
                                    <div id="AvailableLessons"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>

    </section>

    <script>
        let subCategory = {!! str_replace("'", "\'", json_encode($subCategory['id'])) !!};
        let skill = {!! str_replace("'", "\'", json_encode($skill['id'])) !!};
        let skill_name = {!! str_replace("'", "\'", json_encode($skill['name'])) !!};
        fetchLessons();
        $("#add-videos-tab").click(function(){
            addLessons();
        });
        $("#view-videos-tab").click(function(){
            fetchLessons();
        });
        function fetchLessons() {
            $.ajax({
                type: "GET",
                url: '/admin/practice/'+subCategory+'/'+skill+'/fetch-practice-videos',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    let countLessons = data['videos'].meta.pagination.total;
                    let videos = data['videos'].data;
                    $("#countLessons").text(countLessons);
                    if(countLessons > 0) {
                        $("#noLessons").hide();
                        addLessonsToView($("#fetchLessons"), videos, data['videos'].meta.pagination);
                    } else {
                        $("#countlessons").text('0');
                    }
                },
                error: function(data, textStatus, errorThrown) {
                    console.log(textStatus);
                },
            });
        };
        function addLessons() {
            $.ajax({
                type: "GET",
                url: '/admin/practice/'+subCategory+'/'+skill+'/fetch-available-videos',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    let countLessons = data['videos'].meta.pagination.total;
                    let videos = data['videos'].data;
                    $("#countAvailableLessons").text(countLessons);
                    if(countLessons > 0) {
                        $("#noAvailableLessons").hide();
                        addLessonsToView($("#AvailableLessons"), videos, data['videos'].meta.pagination);
                    }
                },
                error: function(data, textStatus, errorThrown) {
                    console.log(textStatus);
                },
            });
        };
        function addLessonsToView(_this, questions, pagination) {
            _this.empty();
            let id_selector = _this.attr('id');
            questions.forEach(function (question, i) {
                let questionIndex = ++i;
                let tab =   `<div class="bg-white rounded my-3 py-3 px-2 Lesson">
                                <div><span class="py-1 px-2 bg-label-primary font-size-13">`+skill_name+`<span></div>
                                <div class="h5 text-dark my-3">`+question.title+`</div>
                                <div class="mb-1"><span class="fw-semibold text-secondary me-2">Watch Time: </span>`+question.duration+` Minutes</div>
                                <div class="mb-1"><span class="fw-semibold text-secondary me-2">Difficulty Level: </span>`+question.difficulty+`</div>
                                <div id="addOrRemove`+id_selector+questionIndex+`"></div>
                            </div>`;
                _this.append(tab);
                if(id_selector == 'fetchLessons'){
                    $("#addOrRemove"+id_selector+questionIndex).append('<div class="fs-6 mb-2 d-flex align-items-center justify-content-between"> <div class="font-size-13 bg-label-primary px-2 py-1 rounded">'+question.code+'</div> <button class="btn btn-danger removeLesson" data-id="'+question.id+'">Remove</button> </div>');
                } else {
                    $("#addOrRemove"+id_selector+questionIndex).append('<div class="fs-6 mb-2 d-flex align-items-center justify-content-between"> <div class="font-size-13 bg-label-primary px-2 py-1 rounded">'+question.code+'</div> <button class="btn btn-primary addavailableLesson" data-id="'+question.id+'">Add</button> </div>');
                }
            });
            if(pagination.links.next){
                _this.append('<div id="loadMoreContent"><div class="text-center" id="loadMoreWrap"><button class="btn btn-sm bg-label-primary border-primary" id="loadMore" data-url="'+pagination.links.next+'">Load More</button></div></div>');
            }
        }
        $(document).on("click","#loadMore", function(e){
            let url = $(this).data("url");
            let __this = $(this);
            $.ajax({
                type: "GET",
                url: url,
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    let id_selector = __this.parents("#loadMoreContent").parent().attr("id")
                    let questions = data['videos'].data;
                    let pagination = data['videos'].meta.pagination;
                    $("#loadMoreContent").remove();
                    questions.forEach(function (question, i) {
                        let questionIndex = ++i;
                        let tab =   `<div class="bg-white rounded my-3 py-3 px-2 Lesson">
                                        <div><span class="py-1 px-2 bg-label-primary font-size-13">`+skill_name+`<span></div>
                                        <div class="h5 text-dark my-3">`+question.title+`</div>
                                        <div class="mb-1"><span class="fw-semibold text-secondary me-2">Watch Time: </span>`+question.duration+` Minutes</div>
                                        <div class="mb-1"><span class="fw-semibold text-secondary me-2">Difficulty Level: </span>`+question.difficulty+`</div>
                                        <div id="addOrRemove`+id_selector+questionIndex+question.id+`"></div>
                                    </div>`;
                        $("#"+id_selector).append(tab);
                        if(id_selector == 'fetchLessons'){
                            $("#addOrRemove"+id_selector+questionIndex+question.id).append('<div class="fs-6 mb-2 d-flex align-items-center justify-content-between"> <div class="font-size-13 bg-label-primary px-2 py-1 rounded">'+question.code+'</div> <button class="btn btn-danger removeLesson" data-id="'+question.id+'">Remove</button> </div>');
                        } else {
                            $("#addOrRemove"+id_selector+questionIndex+question.id).append('<div class="fs-6 mb-2 d-flex align-items-center justify-content-between"> <div class="font-size-13 bg-label-primary px-2 py-1 rounded">'+question.code+'</div> <button class="btn btn-primary addavailableLesson" data-id="'+question.id+'">Add</button> </div>');
                        }
                    });
                    if(pagination.links.next){
                        $("#"+id_selector).append('<div id="loadMoreContent"><div class="text-center" id="loadMoreWrap"><button class="btn btn-sm bg-label-primary border-primary" id="loadMore" data-url="'+pagination.links.next+'">Load More</button></div></div>');
                    }
                },
                error: function(data, textStatus, errorThrown) {
                    console.log(textStatus);
                },
            });
        });
        $(document).on("click",".addavailableLesson", function(e){
            let lessonId = $(this).data("id");
            let _this = $(this);
            $.ajax({
                type: "POST",
                url: '/admin/practice/'+subCategory+'/'+skill+'/add-video',
                data: {
                    video_id: lessonId,
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    _this.parents(".Lesson").remove();
                    let current_count = parseInt($("#countAvailableLessons").text());
                    $("#countAvailableLessons").text(current_count - 1);
                },
                error: function(data, textStatus, errorThrown) {
                    console.log(textStatus);
                },
            });
        });
        $(document).on("click",".removeLesson", function(e){
            let lessonId = $(this).data("id");
            let _this = $(this);
            $(this).parents(".Lesson").remove();
            $.ajax({
                type: "POST",
                url: '/admin/practice/'+subCategory+'/'+skill+'/remove-video',
                data: {
                    video_id: lessonId,
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    _this.parents(".Lesson").remove();
                    let current_count = parseInt($("#countLessons").text());
                    $("#countLessons").text(current_count - 1);
                },
                error: function(data, textStatus, errorThrown) {
                    console.log(textStatus);
                },
            });
        });
    </script>
    

</body>

</html>
