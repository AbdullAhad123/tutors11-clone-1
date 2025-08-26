<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Questions - Question Bank - 
    @if(Auth::user()->hasRole('instructor'))
        Instructor Portal
    @elseif(Auth::user()->hasRole('admin'))
        Admin Portal
    @endif
    </title>
    <!-- rel icon -->
    <link rel="icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}">
    <meta name="description" content="{{ app(\App\Settings\SiteSettings::class)->seo_description }}">
    <meta name="author" content="{{ app(\App\Settings\SiteSettings::class)->app_name }}">
    <!-- bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css">
    <style>
        #searchType,
        #searchSection,
        #searchSkill,
        #searchTopic,
        #searchBook,
        #selectType,
        #searchStatus,
        .approve_status {
            min-width: 190px;
        }
        #searchQuestion{
            min-width: 500px;
        }
        .question_inner_image img {
            width: 50%;
            display: block;
        }
        .custom-bg-label-success{
            background-color: #f4ffee;
        }
        .custom-bg-label-danger{
            background-color: #fff0ed;
        }

        .border_custom_danger {
            border-bottom: 2px solid #ffcfc6!important;
        }
        .border_custom_success {
            border-bottom: 2px solid #cdffb3!important;
        }
        .w_200 {
            min-width: 200px
        } 
        .w_280 {
            min-width: 280px
        } 
        #preview_frame{
            min-height: 400px
        }
        .import_questions {
            background: 
        }
        .solution_checked{
            max-width: 32px;
        }
    </style>
</head>

<body>
    @include('sidebar')
    @include('header')

    <section class="p-4">
        <!-- <div class="container-fluid my-4">
            <div class="row">
                <div class="col-12 col-sm-6 h5 text-dark mb-0 my-2 align-self-center">
                    Questions
                </div>
                <div class="col-12 col-sm-6 text-sm-end d-flex my-2 justify-content-end">
                    <a href="/admin/import-questions" class="me-2">
                        <button class="btn bg-label-success border-success text-uppercase">Import Questions</button>
                    </a>
                    <div class="dropdown">
                        <button class="btn bg-label-primary border-primary text-uppercase dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">New Questions</button>
                        <ul class="dropdown-menu dropdown-menu-end p-0">
                            @foreach($questionTypes as $questionType)
                                <li>
                                    <a class="dropdown-item" href="/admin/questions/create?question_type={{$questionType['code']}}">{{$questionType['text']}}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    
                </div>
            </div>
        </div> -->

        <div class="my-4">
            <h1 class="text-dark my-2">Questions</h1>
            <p class="text-dark fs-5 my-3">Admin's Central Hub to Add, Manage, Update, Delete, and Track Website Questions.</p>
        </div>

        <div id="pageMessage" class="my-4"></div>

        <div class="bg-white rounded-4 shadow">
            <div class="align-items-center d-flex justify-content-end mb-4 p-3 px-4">
                <a href="/admin/import-questions" class="mx-2">
                    <button class="btn btn-primary p-2 px-3 d-inline-flex align-items-center text-uppercase"><i class='bx bx-upload' ></i> Import</button>
                </a>
                <div class="dropdown mx-2">
                    <button class="btn rounded-2 text-uppercase create_new_btn text-white dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class='bx bx-plus-circle mb-1 text-white'></i>Create new</button>
                    <ul class="dropdown-menu dropdown-menu-end p-0">
                        @foreach($questionTypes as $questionType)
                            <li>
                                <a class="dropdown-item" href="/admin/questions/create?question_type={{$questionType['code']}}">{{$questionType['text']}}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead class="bg-body-secondary">
                        <th scope="col" class="font_bold text-dark fs-6 py-3 w_180">CODE</th>
                        <th scope="col" class="font_bold text-dark fs-6 py-3 w_180">SOLUTION</th>
                        <th scope="col" class="font_bold text-dark fs-6 py-3 w_400">QUESTION</th>
                        <th scope="col" class="font_bold text-dark fs-6 py-3 w_300">BOOK</th>
                        <th scope="col" class="font_bold text-dark fs-6 py-3 w_280">TYPE</th>
                        <th scope="col" class="font_bold text-dark fs-6 py-3 w_200">SUBJECT</th>
                        <th scope="col" class="font_bold text-dark fs-6 py-3 w_280">TOPIC</th>
                        <th scope="col" class="font_bold text-dark fs-6 py-3 w_180">SUB-TOPIC</th>
                        <th scope="col" class="font_bold text-dark fs-6 py-3 w_160">STATUS</th>
                        @if(isset($type) && $type == "not-approved")
                            <th scope="col" class="font_bold text-dark fs-6 py-3 w_280">REJECT REASON</th>
                        @endif
                        <th scope="col" class="font_bold text-dark fs-6 py-3 w_200">APPROVED</th>
                        <th scope="col" class="font_bold text-dark fs-6 py-3 w_200">APPROVED BY</th>
                        <th scope="col" class="font_bold text-dark fs-6 py-3 w_200">APPROVED AT</th>
                        <th scope="col" class="font_bold text-dark fs-6 py-3 w_200">Created By</th>
                        <th scope="col" class="font_bold text-dark fs-6 py-3 w_200">DATE</th>
                        <th scope="col" class="font_bold text-dark fs-6 py-3 w_160">ACTIONS</th>
                    </thead>
                    <tbody>
                        <tr class="row_bg_light">
                            <td class="py-4" data-label="search">
                                @if(isset($_GET['code']))
                                    <input type="text" id="searchCode" data-url="code" class="shadow-none form-control bg-light font_normal_bold placeholder_text" placeholder="Search Code" value="{{$_GET['code']}}">
                                @else
                                    <input type="text" id="searchCode" data-url="code" class="shadow-none form-control bg-light font_normal_bold placeholder_text" placeholder="Search Code">
                                @endif
                            </td>
                            <td class="py-4" data-label="search">
                                <select id="selectSolution" data-url="solutionChecked" class="form-select">
                                    @if(isset($_GET['solutionChecked']) && $_GET['solutionChecked'] == 'all')
                                        <option value="all" selected>All</option>
                                    @else
                                        <option value="all">All</option>
                                    @endif
                                    @if(isset($_GET['solutionChecked']) && $_GET['solutionChecked'] == 'null')
                                        <option value="null" selected>Null</option>
                                    @else
                                        <option value="null">Null</option>
                                    @endif

                                    @if(isset($_GET['solutionChecked']) && $_GET['solutionChecked'] == 'fill')
                                        <option value="fill" selected>Has Solution</option>
                                    @else
                                        <option value="fill">Has Solution</option>
                                    @endif
                                </select>
                            </td>
                            <td class="py-4" data-label="search">
                            @if(isset($_GET['question']))
                                <input type="text" id="searchQuestion" data-url="question" class="shadow-none form-control bg-light font_normal_bold placeholder_text" placeholder="Search Title" value="{{$_GET['question']}}">
                            @else
                                <input type="text" id="searchQuestion" data-url="question" class="shadow-none form-control bg-light font_normal_bold placeholder_text" placeholder="Search Title">
                            @endif
                            </td>
                            <td class="py-4" data-label="search">
                                @if(isset($_GET['book']))
                                    <input type="text" id="searchBook" data-url="book" class="shadow-none form-control bg-light font_normal_bold placeholder_text" placeholder="Search Book" value="{{$_GET['book']}}">
                                @else
                                    <input type="text" id="searchBook" data-url="book" class="shadow-none form-control bg-light font_normal_bold placeholder_text" placeholder="Search Book">
                                @endif
                            </td>
                            <td class="py-4" data-label="search">
                                <select id="selectType" data-url="questionType" class="form-select">
                                <option selected>Select Type</option>
                                @foreach ($questionTypes as $questionType)    
                                <option value="{{$questionType['value']}}" data-value="{{$questionType['code']}}">{{$questionType['text']}}</option>
                                @endforeach
                                </select>
                            </td>
                            <td class="py-4" data-label="search">
                                @if(isset($_GET['section']))
                                    <input type="text" id="searchSection" data-url="section" class="shadow-none form-control bg-light font_normal_bold placeholder_text" placeholder="Search Subject" value="{{$_GET['section']}}">
                                @else
                                    <input type="text" id="searchSection" data-url="section" class="shadow-none form-control bg-light font_normal_bold placeholder_text" placeholder="Search Subject">
                                @endif
                            </td>
                            <td class="py-4" data-label="search">
                                @if(isset($_GET['skill']))
                                    <input type="text" id="searchSkill" data-url="skill" class="shadow-none form-control bg-light font_normal_bold placeholder_text" placeholder="Search Topic" value="{{$_GET['skill']}}">
                                @else
                                    <input type="text" id="searchSkill" data-url="skill" class="shadow-none form-control bg-light font_normal_bold placeholder_text" placeholder="Search Topic">
                                @endif
                            </td>
                            <td class="py-4" data-label="search">
                                @if(isset($_GET['topic']))
                                    <input type="text" id="searchTopic" data-url="topic" class="shadow-none form-control bg-light font_normal_bold placeholder_text" placeholder="Search Sub-topic" value="{{$_GET['topic']}}">
                                @else
                                    <input type="text" id="searchTopic" data-url="topic" class="shadow-none form-control bg-light font_normal_bold placeholder_text" placeholder="Search Sub-topic">
                                @endif
                            </td>
                            <td class="py-4" data-label="search">
                                <select id="searchStatus" data-url="status" class="form-select">
                                    <option selected>Search Status</option>
                                    <option value="1">Active</option>
                                    <option value="2">In-Active</option>
                                </select>
                            </td>
                            @if(isset($type) && $type == "not-approved")
                                <td class="py-4" data-label="empty"></td>
                            @endif
                            <td class="py-4" data-label="search">
                                <select id="QuestionStatus" data-url="status" class="form-select">
                                    <option selected>Question Status</option>
                                    <option value="approved">Approved</option>
                                    <option value="not-approved">Non Approved</option>
                                </select>
                            </td>
                            <td class="py-4" data-label="empty"></td>
                            <td class="py-4" data-label="empty"></td>
                            <td class="py-4" data-label="empty">
                                @if(isset($_GET['created_by']))
                                    <input type="text" id="searchUser" data-url="created_by" class="shadow-none form-control bg-light font_normal_bold placeholder_text" placeholder="Search User" value="{{$_GET['created_by']}}">
                                @else
                                    <input type="text" id="searchUser" data-url="created_by" class="shadow-none form-control bg-light font_normal_bold placeholder_text" placeholder="Search User">
                                @endif
                            </td>
                            <td class="py-4" data-label="empty">
                                @if(isset($_GET['date']))
                                    <input type="text" name="daterange" value="{{ \Carbon\Carbon::parse(explode('-to-', $_GET['date'])[0])->format('m/d/Y') . ' - ' . \Carbon\Carbon::parse(explode('-to-', $_GET['date'])[1])->format('m/d/Y') }}" class="shadow-none form-control bg-light font_normal_bold placeholder_text">
                                @else
                                    <input type="text" name="daterange" value="01/01/2024 - 01/8/2024" class="shadow-none form-control bg-light font_normal_bold placeholder_text">
                                @endif
                            </td>
                            <td class="py-4" data-label="empty"></td>
                        </tr>
                        @if($questions()['meta']['pagination']['count'] > 0)
                            @foreach($questions()['data'] as $question)
                                <tr class="text-black
                                    @if($type == 'all')
                                        @if($question['approve_status'] != '--')
                                            @if($question['approve_status'] == 'Approved')
                                                custom-bg-label-success border_custom_success
                                            @else
                                                custom-bg-label-danger border_custom_danger
                                            @endif
                                        @else
                                            border-bottom
                                        @endif
                                    @else
                                        border-bottom
                                    @endif
                                ">
                                    <td class="py-4" data-label="code">
                                        <span class="align-items-center bg-primary cursor-pointer d-inline-flex px-2 questionCode rounded-3 small table_bg_primary text-white">
                                            <span class="me-1">
                                                <svg class="copy" fill="#ffffff" height="20px" width="20px" style="width: 20px!important;" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 64 64" enable-background="new 0 0 64 64" xml:space="preserve">
                                                    <g id="Text-files">
                                                        <path d="M53.9791489,9.1429005H50.010849c-0.0826988,0-0.1562004,0.0283995-0.2331009,0.0469999V5.0228
                                                                    C49.7777481,2.253,47.4731483,0,44.6398468,0h-34.422596C7.3839517,0,5.0793519,2.253,5.0793519,5.0228v46.8432999
                                                                    c0,2.7697983,2.3045998,5.0228004,5.1378999,5.0228004h6.0367002v2.2678986C16.253952,61.8274002,18.4702511,64,21.1954517,64
                                                                    h32.783699c2.7252007,0,4.9414978-2.1725998,4.9414978-4.8432007V13.9861002
                                                                    C58.9206467,11.3155003,56.7043495,9.1429005,53.9791489,9.1429005z M7.1110516,51.8661003V5.0228
                                                                    c0-1.6487999,1.3938999-2.9909999,3.1062002-2.9909999h34.422596c1.7123032,0,3.1062012,1.3422,3.1062012,2.9909999v46.8432999
                                                                    c0,1.6487999-1.393898,2.9911003-3.1062012,2.9911003h-34.422596C8.5049515,54.8572006,7.1110516,53.5149002,7.1110516,51.8661003z
                                                                    M56.8888474,59.1567993c0,1.550602-1.3055,2.8115005-2.9096985,2.8115005h-32.783699
                                                                    c-1.6042004,0-2.9097996-1.2608986-2.9097996-2.8115005v-2.2678986h26.3541946
                                                                    c2.8333015,0,5.1379013-2.2530022,5.1379013-5.0228004V11.1275997c0.0769005,0.0186005,0.1504021,0.0469999,0.2331009,0.0469999
                                                                    h3.9682999c1.6041985,0,2.9096985,1.2609005,2.9096985,2.8115005V59.1567993z" />
                                                        <path d="M38.6031494,13.2063999H16.253952c-0.5615005,0-1.0159006,0.4542999-1.0159006,1.0158005
                                                                    c0,0.5615997,0.4544001,1.0158997,1.0159006,1.0158997h22.3491974c0.5615005,0,1.0158997-0.4542999,1.0158997-1.0158997
                                                                    C39.6190491,13.6606998,39.16465,13.2063999,38.6031494,13.2063999z" />
                                                        <path d="M38.6031494,21.3334007H16.253952c-0.5615005,0-1.0159006,0.4542999-1.0159006,1.0157986
                                                                    c0,0.5615005,0.4544001,1.0159016,1.0159006,1.0159016h22.3491974c0.5615005,0,1.0158997-0.454401,1.0158997-1.0159016
                                                                    C39.6190491,21.7877007,39.16465,21.3334007,38.6031494,21.3334007z" />
                                                        <path d="M38.6031494,29.4603004H16.253952c-0.5615005,0-1.0159006,0.4543991-1.0159006,1.0158997
                                                                    s0.4544001,1.0158997,1.0159006,1.0158997h22.3491974c0.5615005,0,1.0158997-0.4543991,1.0158997-1.0158997
                                                                    S39.16465,29.4603004,38.6031494,29.4603004z" />
                                                        <path d="M28.4444485,37.5872993H16.253952c-0.5615005,0-1.0159006,0.4543991-1.0159006,1.0158997
                                                                    s0.4544001,1.0158997,1.0159006,1.0158997h12.1904964c0.5615025,0,1.0158005-0.4543991,1.0158005-1.0158997
                                                                    S29.0059509,37.5872993,28.4444485,37.5872993z" />
                                                    </g>
                                                </svg>
                                                <svg class="tick" fill="#ffffff" style="display:none;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" width="50px" height="50px">
                                                    <path d="M 25 2 C 12.317 2 2 12.317 2 25 C 2 37.683 12.317 48 25 48 C 37.683 48 48 37.683 48 25 C 48 20.44 46.660281 16.189328 44.363281 12.611328 L 42.994141 14.228516 C 44.889141 17.382516 46 21.06 46 25 C 46 36.579 36.579 46 25 46 C 13.421 46 4 36.579 4 25 C 4 13.421 13.421 4 25 4 C 30.443 4 35.393906 6.0997656 39.128906 9.5097656 L 40.4375 7.9648438 C 36.3525 4.2598437 30.935 2 25 2 z M 43.236328 7.7539062 L 23.914062 30.554688 L 15.78125 22.96875 L 14.417969 24.431641 L 24.083984 33.447266 L 44.763672 9.046875 L 43.236328 7.7539062 z" />
                                                </svg>
                                            </span>
                                            <span class="questionCodeText">{{$question ['code']}}</span>
                                        </span>
                                    </td>
                                    <td class="py-4 text-center" data-label="question">
                                        @if($question['has_solution'])
                                            <img class="solution_checked" src="{{url('images/verification_tick.png')}}" alt="checked">
                                        @else
                                            <div class="badge bg-label-danger">null</div>
                                        @endif
                                    </td>
                                    <td class="py-4" data-label="question">{!!$question['question']!!}</td>
                                    <td class="py-4" data-label="type">{{$question['book']}}</td>
                                    <td class="py-4" data-label="type">{{$question['questionType']}}</td>
                                    <td class="py-4" data-label="section">{{$question['section']}}</td>
                                    <td class="py-4" data-label="skill">{{$question['skill']}}</td>
                                    <td class="py-4" data-label="topic">{{$question['topic']}}</td>
                                    <td class="py-4" data-label="status">
                                        <span class="p-1 px-3 rounded rounded-pill
                                            @if($question['status'] == 'Active')
                                                bg_label_published 
                                            @else
                                                bg_label_failed 
                                            @endif
                                            ">{{$question['status']}}</span>
                                    </td>
                                    @if(isset($type) && $type == "not-approved")
                                        <td class="py-4">{!!$question['reject_reason']!!}</td>
                                    @endif
                                    <td class="py-4" data-label="approve_status" class="approve_status">
                                            <span class="px-3 p-2 rounded 
                                            @if($question['approve_status'] != '--')
                                                @if($question['approve_status'] == 'Approved')
                                                    bg_label_published
                                                @else
                                                    bg_label_failed
                                                @endif
                                            @endif
                                            ">{{$question['approve_status']}}</span>
                                    </td>
                                    <td class="py-4" data-label="approve_by">{{$question['approve_by']}}</td>
                                    <td class="py-4" data-label="approve_datetime">{{$question['approve_datetime']}}</td>
                                    <td class="py-4" data-label="created_by" class="fs-tiny">{{$question['created_by']}}</td>
                                    <td class="py-4" data-label="created_at" class="fs-tiny">{{$question['created_at']}}</td>
                                    <td class="py-4" data-label="actions">
                                        <div class="dropdown rounded shadow-sm bg-white">
                                            <a class="nav-link dropdown-toggle text-dark" href="" data-bs-toggle="dropdown" aria-expanded="false">
                                                Actions
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-end p-0">
                                                <li>
                                                    <a class="dropdown-item" href="/admin/questions/{{$question['id']}}/approve">Approve</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item preview" type="button"  data-bs-toggle="modal" data-bs-target="#previewQuestion" data-id="{{$question['id']}}">Preview</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="/admin/questions/{{$question['id']}}/edit">Edit</a>
                                                </li>
                                                @if(Auth::user()->hasRole('admin'))
                                                    <li>
                                                        <a class="dropdown-item cursor-pointer delete" data-id="{{$question['id']}}">Delete</a>
                                                    </li>
                                                @endif
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="14">
                                    <h2 class="text-black h5 text-center pt-3">
                                        NO RECORDS FOUND
                                    </h2>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>

            <div class="col-12 col-lg-12 order-2 order-md-3 order-lg-2 mb-4">
                <div class="card">
                    <div class="px-3 py-4 d-flex justify-content-between align-items-center">
                        <div>
                            ROWS PER PAGE:
                            <select name="row_selection" id="per_page_option" class="ms-2 btn btn-primary bg_primary_label px-1">
                                @if($questions()['meta']['pagination']['per_page'] == 10)
                                <option value="10" selected>10</option>
                                @else
                                <option value="10">10</option>
                                @endif
                                @if($questions()['meta']['pagination']['per_page'] == 20)
                                <option value="20" selected>20</option>
                                @else
                                <option value="20">20</option>
                                @endif
                                @if($questions()['meta']['pagination']['per_page'] == 50)
                                <option value="50" selected>50</option>
                                @else
                                <option value="50">50</option>
                                @endif
                                @if($questions()['meta']['pagination']['per_page'] == 100)
                                <option value="100" selected>100</option>
                                @else
                                <option value="100">100</option>
                                @endif
                            </select>
                        </div>

                        <div class="align-self-center">
                            @if($questions()['meta']['pagination']['total'] > $questions()['meta']['pagination']['count'])
                            @isset($questions()['meta']['pagination']['links']['previous'])
                            <span>
                                <button class="btn btn-sm bg-label-dark page_btn" data-url="prev">previous</button>
                            </span>
                            @endisset
                            @endif
                            <span class="mx-2">
                                PAGE <span id="page_active">{{$questions()['meta']['pagination']['current_page']}}</span> OF {{$questions()['meta']['pagination']['total_pages']}}
                            </span>
                            @if($questions()['meta']['pagination']['total'] > $questions()['meta']['pagination']['count'])
                            @isset($questions()['meta']['pagination']['links']['next'])
                            <span>
                                <button class="btn btn-sm bg-label-dark page_btn" data-url="next">Next</button>
                            </span>
                            @endisset
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- preview modal  -->

    <div class="modal fade" id="previewQuestion" tabindex="-1" aria-labelledby="previewQuestionLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="previewQuestionLabel"></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-0">
                <iframe class="w-100" id="preview_frame" src="" frameborder="0"></iframe>
            </div>
            </div>
        </div>
    </div>

    @include('parentsidebar.sidebarending')

    <script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

    <script>
        $(document).ready(function(){
            var current_page = {!!str_replace("'", "\'", json_encode($questions()['meta']['pagination']['current_page'])) !!};
            // copy code  
            $(".questionCode").click(function() {
                $(".questionCode").find(".tick").css("display", "none");
                $(".questionCode").find(".copy").css("display", "inline");
                $(this).find(".tick").css("display", "inline");
                $(this).find(".copy").css("display", "none");
                let questionCodeText = $(this).find(".questionCodeText").text().trim();
                var $temp = $("<input>");
                $("body").append($temp);
                $temp.val(questionCodeText).select();
                document.execCommand("copy");
                $temp.remove();
            });
            // delete
            $(".delete").click(function() {
                let id = $(this).data("id");
                let _this = $(this);
                $.ajax({
                    type: "DELETE",
                    url: '/admin/questions/'+id,
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        $("#pageMessage").empty();
                        if(data.success){
                            _this.parents("tr").remove();
                            $("#pageMessage").append('<div class="alert alert-success text-black">'+data.message+'</div>');
                        } else {
                            $("#pageMessage").append('<div class="alert alert-danger ">'+data.message+'</div>');
                        }
                    },
                    error: function(data, textStatus, errorThrown) {
                        console.log(textStatus);
                    },
                });
            });
            // on keyup search  
            $('#searchUser, #searchCode, #searchQuestion, #searchSection, #searchBook, #searchSkill, #searchTopic').on('keyup', function(e) {
                var code = e.keyCode || e.which;
                if (code == 13) {
                    filterSearch($(this).data("url"), $(this).val());
                }
            });
            // on change search 
            $("#selectType, #searchStatus, #QuestionStatus, #selectSolution").change(function() {
                filterSearch($(this).data("url"), $(this).val());
            }); 
            // row per page 
            $('#per_page_option').on('change', function(e) {
                var perPage = parseInt($(this).val());
                var pathname = window.location.pathname;
                filterSearch("perPage", perPage);
            });
            $('.page_btn').on('click', function(e) {
                filterSearch("page", $(this).data("url") == "next" ? current_page + 1 : current_page - 1);
            });
            function filterSearch(key, value) {
                let urlParams = new URLSearchParams(window.location.search);
                let paramsObj = Array.from(urlParams.keys()).reduce(
                    (acc, val) => ({ ...acc, [val]: urlParams.get(val) }),
                    {}
                );
                if(Object.keys(paramsObj).length <= 0){
                    window.location.href = window.location.pathname + "?" + key + "=" + value;
                } else {
                    paramsObj[key] = value;
                    window.location.href = window.location.pathname + "?" + mergeQryStr(paramsObj);
                }
                function mergeQryStr(obj) {
                    let queryStr = "";
                    Object.keys(obj).forEach(key => {
                        queryStr += "&" + key + "=" + obj[key];
                    });
                    return queryStr;
                }
            }

            $(".preview").click(function() {
                let id = $(this).data("id");
                $("#preview_frame").attr("src", "/admin/questions/"+id+"/preview")
            });
            $('input[name="daterange"]').daterangepicker({
                opens: 'left'
            }, function(start, end, label) {
                filterSearch("date", start.format('YYYY-MM-DD') +"-to-"+ end.format('YYYY-MM-DD'));
            });
        });
    </script>
</body>

</html>