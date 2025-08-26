<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Exam Questions - {{$exam['title']}}</title>
    <!-- rel icon -->
    <link rel="icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}">
    <meta name="description" content="{{ app(\App\Settings\SiteSettings::class)->seo_description }}">
    <meta name="author" content="{{ app(\App\Settings\SiteSettings::class)->app_name }}">
    <!-- bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
        .cursor-not-allowed{cursor:not-allowed !important}
        .font-size-13{font-size:13px;}
        svg{height:18px;width:18px;}
        .font-black{color:#000 !important;}
        #view-questions-tab:hover,#add-questions-tab:hover{text-decoration: underline;}
        .option p{margin-bottom : 0;}
        .sectionBtn:hover{text-decoration: underline;}
    </style>
</head>

<body> 
    @include('sidebar')
    @include('header')

    <section class="p-4">    

        <div class="text-start my-4 align-items-center">
            <a href="/admin/exams"><button class="btn bg_primary_label shadow border-primary text-primary p-2 px-3"><i class='bx bx-arrow-back'></i><span>Back to Exams</span></button></a>
        </div>

        <div class="bg-white rounded-4 py-4 shadow">
            <div class="row m-0">
                <div class="col-12 align-self-center my-2">
                    <h1 class="h4 text-dark mb-0">Exam Questions</h1>
                    @if(isset($editFlag) && $editFlag)
                        <div class="mt-1">{{$exam['title']}}</div>
                    @endif
                </div>
                <div class="col-12 my-2">
                    <div class="row align-items-center justify-content-evenly">
                        @if(isset($editFlag) && $editFlag)
                            @foreach ($steps as $key => $step)
                                @if($step['status'] == 'active')
                                    <a href="{{$step['url']}}" class="col-lg-2 col-md-3 col-sm-6 col-6 my-1 p-1">
                                        <button class="bg_primary_label border-primary btn w-100 my-1 fs-6">
                                            <span class="badge bg-primary circle-badge rounded-circle text-white"> {{$key + 1}} </span> 
                                            {{$step['title']}}
                                        </button>
                                    </a>                        
                                @else
                                    <a href="{{$step['url']}}" class="col-lg-2 col-md-3 col-sm-6 col-6 my-1 p-1">
                                        <button class="btn btn-outline-primary w-100 my-1 fs-6">
                                            <span class="badge bg-primary circle-badge rounded-circle text-white"> {{$key + 1}} </span> 
                                            {{$step['title']}}
                                        </button>
                                    </a>
                                @endif
                            @endforeach
                        @else
                            @foreach ($steps as $key => $step)
                                @if($step['status'] == 'active')
                                    <div class="col-lg-2 col-md-3 col-sm-6 col-6 my-1 p-1">
                                        <button class="bg_primary_label w-100 fs-6 border-primary btn"> <span class="badge bg-primary circle-badge rounded-circle text-white"> {{$key + 1}} </span> {{$step['title']}} </button>
                                    </div>
                                @else
                                    <div class="col-lg-2 col-md-3 col-sm-6 col-6 my-1 p-1">
                                        <button class="btn btn-outline-primary w-100 fs-6 cursor-not-allowed"> <span class="badge bg-primary circle-badge rounded-circle text-white"> {{$key + 1}} </span> {{$step['title']}} </button>
                                    </div>
                                @endif
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>

        @if (Session::has('errorMessage'))
            <div class="alert_failed rounded-3 p-3 d-flex align-items-center my-4"><i class='bx bx-x-circle me-1 fs-5'></i>{{Session::get('errorMessage')}}</div>
        @endif

        <div class="bg-white rounded-4 py-4 my-4 p-2 text-dark shadow">

        <div class="mb-4 mx-0 row align-items-center">
            <div class="col-12 col-sm-8 h6 mb-1 text-dark">
                Set Questions - 
                <span id="isRandomText">
                    Randomly
                </span>
            </div>
            <div class="col-12 col-sm-4 d-flex align-items-center justify-content-sm-end">
                <label class="switch mt-2">
                    <input id="isRandom" type="checkbox" checked>
                    <span class="slider round"></span>
                </label>
            </div>
        </div>
            
                <div class="container px-1 d-none manual_div">
                    <div class="row">
                        <div class="col-md-4 col-12 border-end my-3">
                            <div class="border-bottom pb-2 d-flex align-items-center">
                                <svg class="me-1" xmlns="http://www.w3.org/2000/svg" fill="none" height="22" width="22"  viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                                <h2 class="h4 text-dark fw-medium my-0">Sections</h2>
                            </div>
                            <div class="sectionNavigator">
                                @foreach ($sections() as $key => $section)
                                    <div id="sectionNavigator_{{++$key}}" class="my-3 p-3 rounded-3 shadow text-dark section_navigator_wrap
                                    @if($key == 1)
                                        bg_label_published                                
                                    @endif
                                    ">
                                        <div class="fs-4">{{$key}}. {{$section['name']}}</div>
                                        <div class="mt-1">
                                            <button class="border-0 bg-transparent sectionBtn" data-type="add" data-id="{{$section['id']}}" data-name="{{$section['name']}}">Add Questions</button>
                                            <button class="border-0 bg-transparent sectionBtn" data-type="fetch" data-id="{{$section['id']}}" data-name="{{$section['name']}}">View Questions</button>
                                        </div>
                                    </div>
                                @endforeach 
                            </div>
                            <div class="border-bottom pb-2 d-flex align-items-center">
                                <svg class="me-1" fill="none" stroke="currentColor" height="22" width="22" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path></svg>
                                <h2 class="h4 text-dark fw-medium my-0">Filters</h2>
                            </div>
                            <div class="my-3">
                                <h2 class="h5 text-dark fw-medium my-2">Code</h2>
                                <input id="code" type="text" class="form-control" placeholder="Code">
                            </div>
                            <div class="my-3" id="typeFilters">
                                <h2 class="h5 text-dark fw-medium my-2">Type</h2>
                                @foreach ($questionTypes as $key => $type)
                                    <div class="form-check mt-2">
                                        <input type="checkbox" data-code="{{$type['code']}}" class="form-check-input cursor-pointer" id="check{{$type['id']}}" name="option{{$type['id']}}" value="{{$type['id']}}">
                                        <label class="form-check-label cursor-pointer" for="check{{$type['id']}}">{{$type['name']}}</label>
                                    </div>
                                @endforeach
                            </div>
                            <!-- <div class="my-3">
                                Topic
                                <input id="topic" type="text" class="form-control" placeholder="Topic">
                            </div> -->
                            <!-- <div class="my-3">
                                By Tag
                                <input id="byTag" type="text" class="form-control" placeholder="Start Searching">
                                <div class="dropdown">
                                    <input id="Tag" type="text" class="form-control dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="true" placeholder="Start Searching">
                                    <ul id="tag_Dropdown" class="dropdown-menu w-100 p-0 overflow-auto">
                                        <li class="dropdown-item text-center text-light" id="start_search">
                                            Start typing to search.
                                        </li>
                                    </ul>
                                </div>
                            </div> -->
                            <div class="my-3" id="difficultyFilters">
                                <h2 class="h5 text-dark fw-medium my-2">Difficulty Level</h2>
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
                        <div class="col-md-8 col-12 my-3">
                            <div id="Questions">
                                <h2 id="pleaseChooseAlert" class="bg-body-tertiary border fs-5 my-4 py-5 rounded-4 shadow text-center text-dark">Select a section to add or remove questions.</h2>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container px-1 random_div">
                    <form action="{{ route('exams.randomly.add_questions', ['exam' => $exam['id']]) }}" method="post">
                    @csrf
                        @foreach ($sections() as $i => $section)
                            <div class="mb-3">
                                Section Name: <span class="fw-bold">{{ $section['name'] }}</span>
                                <input type="hidden" name="set[{{$i}}][section_name]" value="{{$section['name']}}">
                                <input type="hidden" name="set[{{$i}}][section_id]" value="{{$section['id']}}">
                                <div class="mb-3">
                                    <label class="form-label my-2" for="limit{{$i}}"><span class="text-dark">Choose Number Of Questions</span> (<span id="total{{$i}}">0</span> Questions)</label>
                                    <input type="range" id="range{{$i}}" name="set[{{$i}}][limit]" class="form-control-range w-75 shadow-none w-100 queNumRanger" data-id="{{$i}}" min="0" max="50" value="0">
                                </div>
                            </div>
                            @if(count($sections()) > ++$i)
                                <hr class="my-4">
                            @endif
                        @endforeach
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            
        </div>

    </section>

    <script>
        $(document).ready(function () {
            let exam_id = {!! str_replace("'", "\'", json_encode($exam['id'])) !!};
            var codeSearcher;
            var questionTypes = [];
            var difficultyLevel = [];
            $(document).on("click","#searchFilter", function(){
                let code = $("#code").val();
                let sectionId = $("#sectionIndicator").data("id");
                let type = $("#sectionIndicator").data("type");
                let sectionName = $("#sectionIndicator").data("name");
                codeSearcher = code;
                $("#typeFilters").find(':checkbox:checked').each(function(i){
                    questionTypes[i] = $(this).val();
                });
                $("#difficultyFilters").find(':checkbox:checked').each(function(i){
                    difficultyLevel[i] = $(this).val();
                });
                $(".section_navigator_wrap").removeClass("bg-label-success").addClass("bg-label-success");
                $("#Questions").empty();
                if(sectionId && type){
                    if(type == "fetch"){
                        $("#Questions").append('<div id="sectionIndicator" class="alert alert-success text-dark" data-type="'+type+'" data-id="'+sectionId+'">Currently <span>Viewing</span> '+sectionName+' Questions</div>');
                        fetchQuestions(sectionId);
                    } else {
                        $("#Questions").append('<div id="sectionIndicator" class="alert alert-success text-dark" data-type="'+type+'" data-id="'+sectionId+'">Currently <span>Adding</span> '+sectionName+' Questions</div>');
                        addQuestions(sectionId);
                    }
                }
            });
            $(document).on("click","#resetFilter", function(){
                $("#code").val("");
                $("#difficultyFilters").find(":checkbox").prop('checked', false)
                $("#typeFilters").find(":checkbox").prop('checked', false)
                codeSearcher = null;
                questionTypes = [];
                difficultyLevel = [];
                let sectionId = $("#sectionIndicator").data("id");
                let type = $("#sectionIndicator").data("type");
                let sectionName = $("#sectionIndicator").data("name");
                $(".section_navigator_wrap").removeClass("bg-label-success").addClass("bg-label-success");
                $("#Questions").empty();
                if(sectionId && type){
                    if(type == "fetch"){
                        $("#Questions").append('<div id="sectionIndicator" class="alert alert-success text-dark" data-type="'+type+'" data-id="'+sectionId+'">Currently <span>Viewing</span> '+sectionName+' Questions</div>');
                        fetchQuestions(sectionId);
                    } else {
                        $("#Questions").append('<div id="sectionIndicator" class="alert alert-success text-dark" data-type="'+type+'" data-id="'+sectionId+'">Currently <span>Adding</span> '+sectionName+' Questions</div>');
                        addQuestions(sectionId);
                    }
                }
            });
            // section btn 
            $(".sectionBtn").click(function(){
                $(".section_navigator_wrap").removeClass("bg-label-success");
                $(this).parents(".section_navigator_wrap").addClass("bg-label-success");
                let type = $(this).data("type");
                let sectionId = $(this).data("id");
                let sectionName = $(this).data("name");
                $("#Questions").empty();
                // Currently Adding B Questions
                if(type == "fetch"){
                    $("#Questions").append('<div id="sectionIndicator" class="alert alert-success text-dark" data-type="'+type+'" data-id="'+sectionId+'">Currently <span>Viewing</span> '+sectionName+' Questions</div>');
                    fetchQuestions(sectionId);
                } else {
                    $("#Questions").append('<div id="sectionIndicator" class="alert alert-success text-dark" data-type="'+type+'" data-id="'+sectionId+'">Currently <span>Adding</span> '+sectionName+' Questions</div>');
                    addQuestions(sectionId);
                }
            });
            // get ajax 
            function addQuestions(sectionId) {
                $("#code").val(codeSearcher);
                questionTypes.forEach(function(questionType, ){
                    $("#typeFilters").find(":checkbox[value='"+questionType+"']").prop('checked', true)
                });
                difficultyLevel.forEach(function(difficulty, ){
                    $("#difficultyFilters").find(":checkbox[value='"+difficulty+"']").prop('checked', true)
                });
                $.ajax({
                    type: "GET",
                    url: '/admin/exams/'+exam_id+'/'+sectionId+'/fetch-available-questions',
                    data: {
                        question_types: questionTypes,
                        difficulty_levels: difficultyLevel,
                        code: codeSearcher,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        let countQuestions = data['questions'].meta.pagination.total;
                        let questions = data['questions'].data;
                        $("#countAvailableQuestions").text(countQuestions);
                        if(countQuestions > 0) {
                            $("#noAvailableQuestions").hide();
                            addQuestionsToView(questions, data['questions'].meta.pagination);
                        } else {
                            // $("#Questions").append('<div class="alert bg-label-dark fs-4 py-5 text-center text-dark">No Questions</div>')
                            $("#Questions").append(`<div class="text-center my-4">
                                <img src="{{url('images/no_record_found.png')}}" width="200" height="auto" alt="no records found">
                                <h2 class="h5 text-center text-dark my-1">No Questions</h2>
                            </div>`)
                        }
                    },
                    error: function(data, textStatus, errorThrown) {
                        console.log(textStatus);
                        console.log(data);
                    },
                });
            };
            // get ajax  
            function fetchQuestions(sectionId) {
                $("#code").val(codeSearcher);
                questionTypes.forEach(function(questionType, ){
                    $("#typeFilters").find(":checkbox[value='"+questionType+"']").prop('checked', true)
                });
                difficultyLevel.forEach(function(difficulty, ){
                    $("#difficultyFilters").find(":checkbox[value='"+difficulty+"']").prop('checked', true)
                });
                console.log(questionTypes, difficultyLevel);
                $.ajax({
                    type: "GET",
                    url: '/admin/exams/'+exam_id+'/'+sectionId+'/fetch-questions',
                    data: {
                        question_types: questionTypes,
                        difficulty_levels: difficultyLevel,
                        code: codeSearcher,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        let countQuestions = data['questions'].meta.pagination.total;
                        let questions = data['questions'].data;
                        $("#countQuestions").text(countQuestions);
                        if(countQuestions > 0) {
                            $("#noQuestions").hide();
                            addQuestionsToView(questions, data['questions'].meta.pagination);
                        } else {
                            // $("#Questions").append('<div class="alert bg-label-dark fs-4 py-5 text-center text-dark">No Questions</div>')
                            $("#Questions").append(`<div class="text-center my-4">
                                <img src="{{url('images/no_record_found.png')}}" width="200" height="auto" alt="no records found">
                                <h2 class="h5 text-center text-dark my-1">No Questions</h2>
                            </div>`)
                        }
                    },
                    error: function(data, textStatus, errorThrown) {
                        console.log(textStatus);
                        console.log(data);
                    },
                });
            };
            // add question to view 
            function addQuestionsToView(questions, pagination) {
                let _this = $("#Questions");
                let id_selector = _this.attr('id');
                _this.append('<div class=""><span id="questionCount">'+pagination.total+'</span> items found for the selected criteria.</div>');
                questions.forEach(function (question, i) {
                    let questionIndex = ++i;
                    let tab =   '<div class="px-2 py-3 my-3 bg-white question font-size-13 border rounded" data-code="'+question.code+'" data-difficulty="'+question.difficulty+'" data-type="'+question.question_type+'">' +
                                    '<span class="py-1 px-2 bg-label-primary QuestionNumber"> Q.'+questionIndex+'</span>'+
                                    '<div class="my-4 fs-6">'+question.question+'</div>'+
                                    '<div id="option'+id_selector+i+'"></div>'+
                                    '<div class="fs-6 mb-2"> <span class="me-2">Question Type: </span> <span class="text-body">'+question.question_type_name+'</span></div>'+
                                    '<div class="fs-6 mb-2"> <span class="me-2">Difficulty Level: </span> <span class="text-body">'+question.difficulty+'</span></div>'+
                                    '<div class="fs-6 mb-2"> <span class="me-2">Marks/Points: </span> <span class="text-body">'+question.marks+'</span></div>'+
                                    '<div class="fs-6 mb-2"> <span class="me-2">Attachment: </span> <span class="text-body">'+question.attachment+'</span></div>'+   
                                    '<div id="addOrRemove'+id_selector+i+'"><div>'
                                    // '<div id="addOrRemove'+id_selector+i+'" class="fs-6 mb-2 d-flex align-items-center justify-content-between"> <div class="font-size-13 bg-label-primary px-2 py-1 rounded">'+question.code+'</div> <button class="btn btn-primary addavailableQuestion" data-id="'+question.id+'">Add</button> </div>'+   
                                '</div>';
                    _this.append(tab);
                    if(question.options[0] != null) {
                        question.options.forEach(function(option, o) {
                            var indexo = o;
                            let index = ++o;
                            let correct_answer_isArray = Array.isArray(question.correct_answer);
                            if(correct_answer_isArray){
                                if(question.correct_answer.length > 1){
                                    if(index == question.correct_answer[indexo]){
                                        let option_tab = '<div class="bg-label-success border fs-6 mb-3 px-3 py-2 rounded text-body d-flex align-items-end option"> <span class="badge badge-center text-white bg-black me-2">'+index+'</span> '+option.option+' </div>';   
                                        $("#option"+id_selector+i).append(option_tab);
                                    } else {
                                        let option_tab = '<div class="border fs-6 mb-3 px-3 py-2 rounded text-body d-flex align-items-end option"> <span class="badge badge-center text-white bg-black me-2">'+index+'</span> '+option.option+' </div>';   
                                        $("#option"+id_selector+i).append(option_tab);
                                    }
                                }
                                else {
                                    if(question.correct_answer == index){
                                        let option_tab = '<div class="bg-label-success border fs-6 mb-3 px-3 py-2 rounded text-body d-flex align-items-end option"> <span class="badge badge-center text-white bg-black me-2">'+index+'</span> '+option.option+' </div>';   
                                        $("#option"+id_selector+i).append(option_tab);
                                    } else {
                                        let option_tab = '<div class="border fs-6 mb-3 px-3 py-2 rounded text-body d-flex align-items-end option"> <span class="badge badge-center text-white bg-black me-2">'+index+'</span> '+option.option+' </div>';   
                                        $("#option"+id_selector+i).append(option_tab);
                                    }
                                }
                            } else {
                                if(question.correct_answer == index){
                                    let option_tab = '<div class="bg-label-success border fs-6 mb-3 px-3 py-2 rounded text-body d-flex align-items-end option"> <span class="badge badge-center text-white bg-black me-2">'+index+'</span> '+option.option+' </div>';   
                                    $("#option"+id_selector+i).append(option_tab);
                                } else {
                                    let option_tab = '<div class="border fs-6 mb-3 px-3 py-2 rounded text-body d-flex align-items-end option"> <span class="badge badge-center text-white bg-black me-2">'+index+'</span> '+option.option+' </div>';   
                                    $("#option"+id_selector+i).append(option_tab);
                                }
                            }
                        });
                    } else {
                        if(question.correct_answer.length > 1) {
                            question.correct_answer.forEach(function(answer, a) {
                                let option_tab = '<div class="bg-label-success border fs-6 mb-3 px-3 py-2 rounded text-body d-flex align-items-end option"> <span class="badge badge-center text-white bg-black me-2">'+(++a)+'</span> '+answer+' </div>';   
                                $("#option"+id_selector+i).append(option_tab);
                            });
                        } else {
                            let option_tab = '<div class="bg-label-success border fs-6 mb-3 px-3 py-2 rounded text-body d-flex align-items-end option"> <span class="badge badge-center text-white bg-black me-2">1</span> '+question.correct_answer+' </div>';   
                            $("#option"+id_selector+i).append(option_tab);
                        }
                    } 
                    if($("#sectionIndicator").data("type") == 'fetch'){
                        $("#addOrRemove"+id_selector+i).append('<div class="fs-6 mb-2 d-flex align-items-center justify-content-between"> <div class="font-size-13 bg-label-primary px-2 py-1 rounded">'+question.code+'</div> <button class="btn btn-danger removeQuestion" data-id="'+question.id+'" data-section-id="'+$("#sectionIndicator").data("id")+'">Remove</button> </div>')
                    } else {
                        $("#addOrRemove"+id_selector+i).append('<div class="fs-6 mb-2 d-flex align-items-center justify-content-between"> <div class="font-size-13 bg-label-primary px-2 py-1 rounded">'+question.code+'</div> <button class="btn btn-primary addavailableQuestion" data-id="'+question.id+'" data-section-id="'+$("#sectionIndicator").data("id")+'">Add</button> </div>')
                    }  
                });
                if(pagination.links.next){
                    _this.append('<div id="loadMoreContent"><div class="text-center" id="loadMoreWrap"><button class="btn btn-sm bg-label-primary border-primary" id="loadMore" data-url="'+pagination.links.next+'">Load More</button></div></div>');
                }
            }
            // load more 
            $(document).on("click","#loadMore", function(e){
                let url = $(this).data("url");
                let __this = $("#Questions");
                questionTypes = [];
                difficultyLevel = [];
                $("#typeFilters").find(':checkbox:checked').each(function(i){
                    questionTypes[i] = $(this).val();
                });
                $("#difficultyFilters").find(':checkbox:checked').each(function(i){
                    difficultyLevel[i] = $(this).val();
                });
                $.ajax({
                    type: "GET",
                    url: url,
                    data: {
                        question_types: questionTypes,
                        difficulty_levels: difficultyLevel,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        let id_selector = __this.parents("#loadMoreContent").parent().attr("id")
                        let questions = data.questions.data;
                        let pagination = data.questions.meta.pagination;
                        let existingQuestions = $(".QuestionNumber").length;
                        $("#loadMoreWrap").remove();
                        questions.forEach(function (question, i) {
                            i = ++i + existingQuestions;
                            let tab =   '<div class="px-2 py-3 my-3 bg-white question font-size-13 border rounded" data-code="'+question.code+'" data-difficulty="'+question.difficulty+'" data-type="'+question.question_type+'">' +
                                            '<span class="py-1 px-2 bg-label-primary QuestionNumber"> Q.'+i+'</span>'+
                                            '<div class="my-4 fs-6">'+question.question+'</div>'+
                                            '<div id="option'+id_selector+i+'"></div>'+
                                            '<div class="fs-6 mb-2"> <span class="me-2">Question Type: </span> <span class="text-body">'+question.question_type_name+'</span></div>'+
                                            '<div class="fs-6 mb-2"> <span class="me-2">Difficulty Level: </span> <span class="text-body">'+question.difficulty+'</span></div>'+
                                            '<div class="fs-6 mb-2"> <span class="me-2">Marks/Points: </span> <span class="text-body">'+question.marks+'</span></div>'+
                                            '<div class="fs-6 mb-2"> <span class="me-2">Attachment: </span> <span class="text-body">'+question.attachment+'</span></div>'+   
                                            '<div id="addOrRemove'+id_selector+i+'"><div>'
                                            // '<div id="addOrRemove'+id_selector+i+'" class="fs-6 mb-2 d-flex align-items-center justify-content-between"> <div class="font-size-13 bg-label-primary px-2 py-1 rounded">'+question.code+'</div> <button class="btn btn-primary addavailableQuestion" data-id="'+question.id+'">Add</button> </div>'+   
                                        '</div>';
                            $("#loadMoreContent").append(tab);
                            if(question.options[0] != null) {
                                question.options.forEach(function(option, o) {
                                    var indexo = o;
                                    let index = ++o;
                                    let correct_answer_isArray = Array.isArray(question.correct_answer);
                                    if(correct_answer_isArray){
                                        if(question.correct_answer.length > 1){
                                            if(index == question.correct_answer[indexo]){
                                                let option_tab = '<div class="bg-label-success border fs-6 mb-3 px-3 py-2 rounded text-body d-flex align-items-end option"> <span class="badge badge-center text-white bg-black me-2">'+index+'</span> '+option.option+' </div>';   
                                                $("#option"+id_selector+i).append(option_tab);
                                            } else {
                                                let option_tab = '<div class="border fs-6 mb-3 px-3 py-2 rounded text-body d-flex align-items-end option"> <span class="badge badge-center text-white bg-black me-2">'+index+'</span> '+option.option+' </div>';   
                                                $("#option"+id_selector+i).append(option_tab);
                                            }
                                        }
                                        else {
                                            if(question.correct_answer == index){
                                                let option_tab = '<div class="bg-label-success border fs-6 mb-3 px-3 py-2 rounded text-body d-flex align-items-end option"> <span class="badge badge-center text-white bg-black me-2">'+index+'</span> '+option.option+' </div>';   
                                                $("#option"+id_selector+i).append(option_tab);
                                            } else {
                                                let option_tab = '<div class="border fs-6 mb-3 px-3 py-2 rounded text-body d-flex align-items-end option"> <span class="badge badge-center text-white bg-black me-2">'+index+'</span> '+option.option+' </div>';   
                                                $("#option"+id_selector+i).append(option_tab);
                                            }
                                        }
                                    } else {
                                        if(question.correct_answer == index){
                                            let option_tab = '<div class="bg-label-success border fs-6 mb-3 px-3 py-2 rounded text-body d-flex align-items-end option"> <span class="badge badge-center text-white bg-black me-2">'+index+'</span> '+option.option+' </div>';   
                                            $("#option"+id_selector+i).append(option_tab);
                                        } else {
                                            let option_tab = '<div class="border fs-6 mb-3 px-3 py-2 rounded text-body d-flex align-items-end option"> <span class="badge badge-center text-white bg-black me-2">'+index+'</span> '+option.option+' </div>';   
                                            $("#option"+id_selector+i).append(option_tab);
                                        }
                                    }
                                });
                            } else {
                                if(question.correct_answer.length > 1) {
                                    question.correct_answer.forEach(function(answer, a) {
                                        let option_tab = '<div class="bg-label-success border fs-6 mb-3 px-3 py-2 rounded text-body d-flex align-items-end option"> <span class="badge badge-center text-white bg-black me-2">'+(++a)+'</span> '+answer+' </div>';   
                                        $("#option"+id_selector+i).append(option_tab);
                                    });
                                } else {
                                    let option_tab = '<div class="bg-label-success border fs-6 mb-3 px-3 py-2 rounded text-body d-flex align-items-end option"> <span class="badge badge-center text-white bg-black me-2">1</span> '+question.correct_answer+' </div>';   
                                    $("#option"+id_selector+i).append(option_tab);
                                }
                            } 
                            if($("#sectionIndicator").data("type") == 'fetch'){
                                $("#addOrRemove"+id_selector+i).append('<div class="fs-6 mb-2 d-flex align-items-center justify-content-between"> <div class="font-size-13 bg-label-primary px-2 py-1 rounded">'+question.code+'</div> <button class="btn btn-danger removeQuestion" data-id="'+question.id+'" data-section-id="'+$("#sectionIndicator").data("id")+'">Remove</button> </div>')
                            } else {
                                $("#addOrRemove"+id_selector+i).append('<div class="fs-6 mb-2 d-flex align-items-center justify-content-between"> <div class="font-size-13 bg-label-primary px-2 py-1 rounded">'+question.code+'</div> <button class="btn btn-primary addavailableQuestion" data-id="'+question.id+'" data-section-id="'+$("#sectionIndicator").data("id")+'">Add</button> </div>')
                            } 
                        });
                        if(pagination.links.next){
                            $("#loadMoreContent").append('<div class="text-center" id="loadMoreWrap"><button class="btn btn-sm bg-label-primary border-primary" id="loadMore" data-url="'+pagination.links.next+'">Load More</button></div>');
                        }
                    },
                    error: function(data, textStatus, errorThrown) {
                        console.log(textStatus);
                        console.log(data);
                    },
                });
            });
            // add question 
            $(document).on("click",".addavailableQuestion", function(e){
                let questionId = $(this).data("id");
                let sectionId = $(this).data("section-id");
                $(this).parents(".question").remove();
                $.ajax({
                    type: "POST",
                    url: '/admin/exams/'+exam_id+'/'+sectionId+'/add-question',
                    data: {
                        question_id: questionId,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        let newCount = parseInt($("#questionCount").text()) - 1;
                        $("#questionCount").text(newCount);
                    },
                    error: function(data, textStatus, errorThrown) {
                        console.log(textStatus);
                        console.log(data);
                    },
                });
            });
            // remove question 
            $(document).on("click",".removeQuestion", function(e){
                let questionId = $(this).data("id");
                let sectionId = $(this).data("section-id");
                $(this).parents(".question").remove();
                $.ajax({
                    type: "POST",
                    url: '/admin/exams/'+exam_id+'/'+sectionId+'/remove-question',
                    data: {
                        question_id: questionId,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        let newCount = parseInt($("#questionCount").text()) - 1;
                        $("#questionCount").text(newCount);
                    },
                    error: function(data, textStatus, errorThrown) {
                        console.log(textStatus);
                        console.log(data);
                    },
                });
            });
        });  
        $('#isRandom').change(function() {
            let isRandom = $(this).is(':checked');
            if(isRandom){
                $(".manual_div").addClass('d-none');
                $(".random_div").removeClass('d-none');
                $("#isRandomText").text("Randomly");
            } else {
                $(".random_div").addClass('d-none');
                $(".manual_div").removeClass('d-none');
                $("#isRandomText").text("Manually");
            }
        }); 
        $('.queNumRanger').on('input', function(){
            const $this = $(this);
            let id = $this.data('id');
            $('#total'+id).html($this.val());
        });
    </script>
</body>

</html>
