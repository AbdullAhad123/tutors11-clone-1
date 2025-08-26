<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        Approve Questions
    </title>
    <!-- rel icon -->
    <link rel="icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}">
    <meta name="description" content="{{ app(\App\Settings\SiteSettings::class)->seo_description }}">
    <meta name="author" content="{{ app(\App\Settings\SiteSettings::class)->app_name }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
    <script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>
    <!-- bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
        .cursor-not-allowed {
            cursor: not-allowed !important
        }

        #start_search:hover,
        #start_search:active {
            background: transparent;
            cursor: default;
            color: #bcc4cc !important;
        }

        .font-size-13 {
            font-size: 13px;
        }

        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input[type=number] {
            -moz-appearance: textfield;
        }

        .questionForm {
            max-width: 850px;
        }

        .choices__inner,
        .choices__input {
            background: #fff;
        }

        .question_inner_image img {
            width: 50%;
            display: block;
        }

        /* The container */
        .label_container {
            /* display: block; */
            position: relative;
            padding-left: 35px;
            /* margin-bottom: 12px; */
            cursor: pointer;
            /* font-size: 22px; */
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        /* Hide the browser's default checkbox */
        .label_container input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
            height: 0;
            width: 0;
        }

        /* Create a custom checkbox */
        .checkmark {
            position: absolute;
            top: 0;
            left: 0;
            height: 25px;
            width: 25px;
            background-color: #eee;
        }

        /* On mouse-over, add a grey background color */
        .label_container:hover input~.checkmark {
            background-color: #ccc;
        }

        /* When the checkbox is checked, add a blue background */
        .label_container input:checked~.checkmark {
            background-color: #ffae00;
        }

        /* Create the checkmark/indicator (hidden when not checked) */
        .checkmark:after {
            content: "";
            position: absolute;
            display: none;
        }

        /* Show the checkmark when checked */
        .label_container input:checked~.checkmark:after {
            display: block;
        }

        /* Style the checkmark/indicator */
        .label_container .checkmark:after {
            left: 9px;
            top: 5px;
            width: 6px;
            height: 12px;
            border: solid white;
            border-width: 0 3px 3px 0;
            -webkit-transform: rotate(45deg);
            -ms-transform: rotate(45deg);
            transform: rotate(45deg);
        }

        .choices__list--multiple .choices__item {
            background-color: #696bfc !important;
            border: #696bfc !important;
        }

        .choices[data-type*=select-multiple] .choices__button,
        .choices[data-type*=text] .choices__button {
            border-left: 1px solid #ffffff;
        }
    </style>
</head>

<body> 
    
    @include('sidebar')
    @include('header')

    <section class="p-4">

        <h1 class="text-dark my-2 mt-3">Approve Questions</h1>
        <p class="fs-5 text-dark my-2">Exercise your control by reviewing and approving questions that meet the criteria while rejecting those that don't. The power is in your hands!</p>
        
        <div class="bg-white rounded-4 p-lg-4 p-md-4 p-sm-4 p-2 my-4 shadow">
            <div class="text-end mb-4">
                <a href="/admin/approve-questions" class="text-decoration-none my-2 d-inline-flex align-items-center">
                    <button class="btn btn-outline-primary p-2 px-3">
                        <i class='bx bx-arrow-back'></i>
                        <span>
                            Back to Questions
                        </span>
                    </button>
                </a>
            </div>
            <div class="select_subject mx-3">
                <!-- $sections -->
                <h2 class="text-dark my-4">Select Subject</h3>
                @foreach($sections as $key => $section)
                    <label class="label_container fs-5 mb-3 me-4">{{$section->name}}
                        @if($key <= 0)
                            <input type="checkbox" name="subject" class="subject" value="{{$section->id}}" checked="checked">
                        @else
                            <input type="checkbox" name="subject" class="subject" value="{{$section->id}}">
                        @endif
                        <span class="checkmark rounded-2"></span>
                    </label>
                @endforeach
                <h2 class="text-dark my-4">Select Books</h2>
                <select class="form-select" id="books" multiple>
                    @foreach($books as $book)
                        <option value="{{$book->id}}">{{$book->Title}}</option>
                    @endforeach
                </select>
                <div class="my-3 text-end">
                    <button class="btn btn-primary p-2 px-3" id="continue">Get Started <i class='bx bx-chevrons-right'></i></button>
                </div>
            </div>
            <div class="approve_wrap d-none">
                <div class="align-items-center d-flex flex-wrap justify-content-between mx-1">
                    <button class="btn btn-outline-danger p-2 px-3 my-2" id="reject" data-id="">Reject <i class='bx bx-block'></i></button>
                    <button class="btn btn-outline-success p-2 px-3 my-2" id="accept" data-id=""><i class='bx bx-check-shield'></i> Approve</button>
                </div>
                <div class="questionForm m-auto p-lg-4 p-md-4 p-sm-4 p-0 my-3">
                    <div class="my-3 bg-body p-3 rounded-1 shadow-sm"></div>
                </div>
                <div class="container-fluid my-4">
                    <label for="rejectReason" class="mb-1 text-dark fs-5">Comment reason for rejection</label>
                    <div id="prevrejectReason" class="my-1"></div>
                    <textarea name="reject_reason" id="rejectReason" rows="2" class="border form-control p-3 shadow" placeholder="Type the reason..."></textarea>
                </div>
                <div class="d-flex align-items-center justify-content-between m-3">
                    <button class="btn btn-primary p-2 px-3 my-2" id="prev" data-id=""><i class='bx bx-chevrons-left'></i> Prev</button>
                    <button class="btn btn-primary p-2 px-3 my-2" id="next" data-id="">Next <i class='bx bx-chevrons-right'></i></button>
                </div>
            </div>
        </div>

    </section>

    <script>
        $(document).on('click', '#refresh', function(){
            let id = $(this).attr("data-id");
            $.ajax({
                type: "POST",
                url: '/admin/refreash-approve-questions',
                data: {
                    id: id,
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    if(data.success && data.question.id){
                        addQuestionToView(data.question);
                    } else {
                        // noQuestionToView(data);
                    }
                },
                error: function(data, textStatus, errorThrown) {
                    console.log(textStatus);
                },
            });
        });
        $(document).on('click', '#continue', function(){
            $(".select_subject").addClass("d-none");
            $(".approve_wrap").removeClass("d-none");
            localStorage.setItem('books', $("#books").val());
            localStorage.setItem('subjects', getSelectedSubjected());
            $.ajax({
                type: "POST",
                url: '/admin/fetch-yet-to-approve-questions',
                data: {
                    subjects: getSelectedSubjected(),
                    books: $("#books").val(),
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    if(data.success && data.question.id){
                        addQuestionToView(data.question);
                    } else {
                        // noQuestionToView(data);
                    }
                },
                error: function(data, textStatus, errorThrown) {
                    console.log(textStatus);
                },
            });
        });
        $(document).on('click', '#reject', function(){
            $.ajax({
                type: "POST",
                url: '/admin/reject-question-id/'+$(this).attr("data-id"),
                data: {
                    id: $(this).attr("data-id"),
                    rejectReason: $("#rejectReason").val(),
                    subjects: getSelectedSubjected(),
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    if(data.success){
                        if(data.question.id){
                            addQuestionToView(data.question);
                        } else {
                            // noQuestionToView(data);
                        }
                    }
                },
                error: function(data, textStatus, errorThrown) {
                    console.log(textStatus);
                },
            });
        });
        $(document).on('click', '#accept', function(){
            $.ajax({
                type: "POST",
                url: '/admin/approve-question-id/'+$(this).attr("data-id"),
                data: {
                    id: $(this).attr("data-id"),
                    subjects: getSelectedSubjected(),
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    if(data.success && data.question.id){
                        addQuestionToView(data.question);
                    } else {
                        // noQuestionToView(data);
                    }
                },
                error: function(data, textStatus, errorThrown) {
                    console.log(textStatus);
                },
            });
        });
        $(document).on('click', '#prev', function(){
            $.ajax({
                type: "POST",
                url: '/admin/prev-question-id/'+$(this).attr("data-id"),
                data: {
                    id: $(this).attr("data-id"),
                    subjects: getSelectedSubjected(),
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    if(data.success && data.question.id){
                        addQuestionToView(data.question);
                    } else {
                        // noQuestionToView(data);
                    }
                },
                error: function(data, textStatus, errorThrown) {
                    console.log(textStatus);
                },
            });
        });
        $(document).on('click', '#next', function(){
            $.ajax({
                type: "POST",
                url: '/admin/next-question-id/'+$(this).attr("data-id"),
                data: {
                    id: $(this).attr("data-id"),
                    subjects: getSelectedSubjected(),
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    if(data.success && data.question.id){
                        addQuestionToView(data.question);
                    } else {
                        // noQuestionToView(data);
                    }
                },
                error: function(data, textStatus, errorThrown) {
                    console.log(textStatus);
                },
            });
        });

        function addQuestionToView(question) {
            $("#reject").attr("data-id", question.id);
            $("#accept").attr("data-id", question.id);
            $("#prev").attr("data-id", question.id);
            $("#next").attr("data-id", question.id);
            $('#prevrejectReason').html(question.reject_reason);
            let div = $(".questionForm").children();
            var activeClass;
            if(question.status == 'Active'){
                activeClass = 'bg_label_published border border-success'
            } else {
                activeClass = 'bg_label_draft border border-danger'
            }
            let questionTab = `<div class="d-flex justify-content-between mb-4 border-bottom pb-3">
                <a class="align-items-center btn btn-warning d-inline-flex edit_btn px-3" target="_blank" href="/admin/questions/`+question.id+`/approve" ><i class='bx bx-edit' ></i></a> 
                <button class="btn btn-primary px-3" id="refresh" data-id="`+question.id+`" ><i class="bx bx-refresh"></i></button>
                <a class="align-items-center btn btn-warning d-inline-flex px-3" target="_blank" href="/admin/questions/`+question.id+`/cloneQuestion"><i class='bx bx-copy' ></i></a>
            </div>
            <div class="d-flex justify-content-between mb-3 flex-wrap">
                <div class="bg_primary_label border border-primary p-1 my-2 px-3 rounded">Code: `+question.code+`</div> 
                <div class="px-2 p-1 my-2 rounded shadow-sm `+activeClass+`">`+question.status+`</div>
            </div>
            <div class="text-uppercase text-dark small">`+question.created_by+`</div>
            <div class="text-uppercase text-dark small my-1">`+question.skill+`</div>
            <div class="text-uppercase text-dark small">`+question.topic+` <span class="mx-1 text-dark font-size-13">|</span>`+question.questionType+`</div>
            <h2 class="fw-normal h5 my-4 question_inner_image text-dark">`+question.question+`</h2>`;
            var answerTab = "";
            if(question.questionTypeCode == 'MSA'){
                if(question.options){
                    question.options.forEach(function(option,o){
                        let is_correct = "";
                        if(++o == question.correct_answer){
                            is_correct = "bg-label-success";
                        }
                        answerTab +=  `<div id="option" class="border d-flex my-2 rounded-3 p-2 border-success `+is_correct+`">
                            <div class="border-end py-1 px-3">
                                <span style="font-size: 13px;" class="bg-body shadow-sm text-dark px-1 rounded-1">`+o+`</span>
                            </div>
                            <div class="w-100 align-self-center px-2 option text-black">`+option.option+`</div>
                        </div>`;
                    });
                } else{
                    answerTab = `<div class="text-danger font-size-13">No option found</div>`;
                }
            } else if(question.questionTypeCode == 'ORD'){
                if(question.options){
                    question.options.forEach(function(option,o){
                        answerTab +=  `<div id="option" class="border d-flex my-2 rounded-3 p-2 border-success bg-label-success">
                            <div class="border-end py-1 px-3">
                                <span style="font-size: 13px;" class="bg-body shadow-sm text-dark px-1 rounded-1">`+(++o)+`</span>
                            </div>
                            <div class="w-100 align-self-center px-2 option text-black">`+option.option+`</div>
                        </div>`;
                    });
                } else {
                    answerTab = `<div class="text-danger font-size-13">No option found</div>`;
                }
            } else if(question.questionTypeCode == 'MTF'){
                if(question.options){
                    options = "";
                    question.options.forEach(function(option,o){
                        options +=  `<div class="col-6">
                                <div id="option" class="border d-flex my-2 rounded-3 p-2 border-success bg-label-success">
                                    <div class="border-end py-1 px-3">
                                        <span style="font-size: 13px;" class="bg-body shadow-sm text-dark px-1 rounded-1">`+(++o)+`</span>
                                    </div>
                                    <div class="w-100 align-self-center px-2 option text-black"> `+option.option+` </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div id="option" class="border d-flex my-2 rounded-3 p-2 border-success bg-label-success py-1">
                                    <div class="w-100 align-self-center px-2 option text-black"> `+option.pair+` </div>
                                </div>
                            </div>`;
                    });
                    answerTab = `<div class="row">`+options+`</div>`;
                } else {
                    answerTab = `<div class="text-danger font-size-13">No option found</div>`;
                }
            } else if(question.questionTypeCode == 'SAQ'){
                if(question.options){
                    question.options.forEach(function(option,o){
                        let is_correct = "";
                        if(++o == question.correct_answer){
                            is_correct = "bg-label-success";
                        }
                        answerTab +=  `<div id="option" class="border d-flex my-2 rounded-3 p-2 border-success `+is_correct+`">
                            <div class="border-end py-1 px-3">
                                <span style="font-size: 13px;" class="bg-body shadow-sm text-dark px-1 rounded-1">`+o+`</span>
                            </div>
                            <div class="w-100 align-self-center px-2 option text-black"> `+option.option+` </div>
                        </div>`;
                    });
                } else {
                    answerTab = `<div class="text-danger font-size-13">No option found</div>`;
                }
            } else if(question.questionTypeCode == 'TOF'){
                if(question.options){
                    question.options.forEach(function(option,o){
                        let is_correct = "";
                        if(++o == question.correct_answer){
                            is_correct = "bg-label-success";
                        }
                        answerTab +=  `<div id="option" class="border d-flex my-2 rounded-3 p-2 border-success `+is_correct+`">
                            <div class="border-end py-1 px-3">
                                <span style="font-size: 13px;" class="bg-body shadow-sm text-dark px-1 rounded-1">`+o+`</span>
                            </div>
                            <div class="w-100 align-self-center px-2 option text-black"> `+option.option+` </div>
                        </div>`;
                    });
                } else {
                    answerTab = `<div class="text-danger font-size-13">No option found</div>`;
                }
            } else if(question.questionTypeCode == 'MMA') {
                if(question.options){
                    question.options.forEach(function(option,o){
                        let is_correct = "";
                        let index = ++o;
                        if(question.correct_answer.includes(index.toString())){
                            is_correct = "bg-label-success";
                            console.log(is_correct);
                        }
                        answerTab +=  `<div id="option" class="border d-flex my-2 rounded-3 p-2 border-success `+is_correct+`">
                            <div class="border-end py-1 px-3">
                                <span style="font-size: 13px;" class="bg-body shadow-sm text-dark px-1 rounded-1">`+o+`</span>
                            </div>
                            <div class="w-100 align-self-center px-2 option text-black"> `+option.option+` </div>
                        </div>`;
                    });
                } else {
                    answerTab = `<div class="text-danger font-size-13">No option found</div>`;
                }
            } else if(question.questionTypeCode == 'FIB') {
                question.correct_answer.forEach(function(option,o){
                    answerTab +=  `<div id="option" class="border d-flex my-2 rounded-3 p-2 border-success bg-label-success">
                        <div class="border-end py-1 px-3">
                            <span style="font-size: 13px;" class="bg-body shadow-sm text-dark px-1 rounded-1">`+(++o)+`</span>
                        </div>
                        <div class="w-100 align-self-center px-2 option"> `+option+` </div>
                    </div>`;
                });
            }
            div.empty().append(questionTab+`<div class="mt-4">`+answerTab+`<div>`);
        }
        function noQuestionToView(data){
            if(!data.success){
                $(".questionForm div").append("No question in selected criteria, refresh and selected other criteria!");
            }
        }
        function getSelectedSubjected() {
            subjects = [];
            $(".subject:checkbox:checked").each(function(i){
                subjects.push($(this).val());
            });
            return subjects;
        }
        var user_roles = new Choices('#books', {
            shouldSort: true,
            removeItemButton: true,
            searchEnabled: true,
            placeholder: true, // Add a placeholder
            placeholderValue: 'Select books', // Set the placeholder text
        });
        let by_approve = {!! str_replace("'", "\'", json_encode(!request()->has('by_approve') && request()->input('by_approve') != 'true')) !!};
        if(!by_approve){
            $('.subject').prop('checked', false);
            let books = localStorage.getItem('books');
            let subjects = localStorage.getItem('subjects');
            if(subjects){
                subjects = subjects.split(",");
                subjects.forEach(function(subject){
                    $('.subject[value='+subject+']').prop('checked', true);
                });
            }
            if(books){
                books = books.split(",");
                $('#books').val(books);
            }
            $("#continue").click();
        } 
    </script>

</body>

</html>
