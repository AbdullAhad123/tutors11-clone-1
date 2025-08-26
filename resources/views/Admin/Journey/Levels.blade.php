<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Journey Settings</title>
    <!-- rel icon -->
    <link rel="icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}">
    <meta name="description" content="{{ app(\App\Settings\SiteSettings::class)->seo_description }}">
    <meta name="author" content="{{ app(\App\Settings\SiteSettings::class)->app_name }}">
    <!-- bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
        .cursor-not-allowed{cursor:not-allowed !important}
        .practice_set_form{max-width: 900px !important;}
        #start_search:hover,#start_search:active{background: transparent;cursor: default;color: #bcc4cc !important;}
        #skill_Dropdown{max-height: 175px;}
        .font-size-13{font-size:13px;}
        input::-webkit-outer-spin-button,input::-webkit-inner-spin-button {-webkit-appearance: none;margin: 0;}
        input[type=number] {-moz-appearance: textfield;}
        label, .label {color: #000;font-size: 16px;margin-bottom: 10px;}
        thead {background: #002978;color: #fff;}
        .yes_selector.active{background-color: #e8fadf !important;color: #71dd37 !important;}
        .no_selector.active{background-color: #ffe0db !important;color: #ff3e1d !important;}
        .custom-tooltip{min-width: 350px;}
        .custom-inp-group{display:flex;}
        @media screen and (max-width:767px) {.custom-tooltip{left: 0;}}
        @media screen and (max-width:547px) {.custom-tooltip{transform: translateX(-50%);min-width: 300px;}}
        @media screen and (max-width:371px) {.custom-inp-group{display: block;}}
    </style>
</head>

<body> 
    @include('sidebar')
    @include('header')

    <section class="p-4">

        <div class="bg-white rounded-4 py-4 p-3 shadow my-4">
            <div class="d-flex align-items-center justify-content-between">
                <h1 class="text-dark my-2 h3">Journey Settings</h1>
                <button class="btn bg_primary_label border-primary text-primary p-2 px-3" data-bs-toggle="modal" data-bs-target="#newLevel">Add New Level</button>
            </div>
        </div>

        @if (Session::has('errorMessage'))
            <div class="alert_failed rounded-3 p-3 d-flex align-items-center my-4"><i class='bx bx-x-circle me-1 fs-5'></i>{{Session::get('errorMessage')}}</div>
        @endif

        <div class="bg-white rounded-4 py-4 shadow my-4">
            <div class="px-3">
                <div class="progress">
                    @if(count($levels['data']) > 0)
                        <div class="progress-bar w-75" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100">
                    @else
                        <div class="progress-bar w-50" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100">
                    @endif
                </div>
            </div>
        </div>

        <div class="container-fluid">
            @if(count($levels['data']) > 0)
                <div class="py-4">
                    @foreach($levels['data'] as $key => $level)
                    <div class="py-4 border-botom">
                        <div class="row mb-2">
                            <div class="col-sm-8 col-12">
                                <h3 class="text-dark d-flex align-items-center">Level {{++$key}} <img src="{{url($level['image_path'])}}" width="50" alt="{{$level['code']}}" class="ms-3 rounded-circle border border-2"></h3> 
                                <p>Set By: {{$level['setBy']}}</p>
                            </div>
                            <div class="col-sm-4 col-12 d-flex align-items-center justify-content-center justify-content-sm-end">
                                <div>
                                    <button class="btn btn-primary mt-2 new_test" data-id="{{$level['id']}}" data-level="{{$key}}">Add Test</button>
                                    <div class="dropdown d-inline">
                                        <button class="btn mt-2 p-1" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class='bx bx-dots-vertical-rounded bx-sm'></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="{{ route('journey_level_edit', ['id' => $level['id']]) }}">Edit</a></li>
                                            <li>
                                                <form action="{{ route('journey_level_delete', ['id'=> $level['id']]) }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <input class="dropdown-item" type="submit" value="Delete">
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                    <button class="btn mt-2 p-1" type="button" data-bs-toggle="collapse" href="#jrnyLevel_{{$key}}" role="button" aria-expanded="false" aria-controls="jrnyLevel_{{$key}}">
                                        <i class='bx bx-chevron-down bx-sm'></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="collapse mt-4" id="jrnyLevel_{{$key}}">
                            <div class="table-responsive shadow-sm rounded-2">
                                <table class="table">
                                    <thead>
                                        <th scope="col" class="text-white">CODE</th>
                                        <th scope="col" class="text-white">TITLE</th>
                                        <th scope="col" class="text-white">SUBTITLE</th>
                                        <th scope="col" class="text-white">QUESTIONS</th>
                                        <th scope="col" class="text-white">YEAR</th>
                                        <th scope="col" class="text-white">TOPIC</th>
                                        <th scope="col" class="text-white">STATUS</th>
                                        <th scope="col" class="text-white">ACTIONS</th>
                                    </thead>
                                    <tbody id="journey_set_level_{{$level['id']}}">
                                        @foreach($level['sets']['data'] as $set)
                                            <tr>
                                                <td data-label="code">
                                                    <span class="align-items-center bg-primary cursor-pointer d-inline-flex px-2 questionCode rounded-3 small table_bg_primary text-white">
                                                        <span>
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
                                                        <span class="questionCodeText ms-2">{{$set['code']}}</span>
                                                    </span>
                                                </td>
                                                <td data-label="title">{{$set['title']}}</td>
                                                <td data-label="subtitle">{{$set['subtitle']}}</td>
                                                <td data-label="questions">{{$set['questions']}}</td>
                                                <td data-label="year">{{$set['year']}}</td>
                                                <td data-label="topic">{{$set['topic']}}</td>
                                                <td>
                                                    <span class="py-1 px-2 rounded small 
                                                        @if($set['status'] == 'Published')
                                                            bg-label-primary
                                                        @else
                                                            bg-label-danger
                                                        @endif
                                                    ">{{$set['status']}}</span>
                                                </td>
                                                <td data-label="actions">
                                                    <div class="dropdown border rounded">
                                                        <a class="nav-link dropdown-toggle" href="" data-bs-toggle="dropdown" aria-expanded="false">
                                                            Action
                                                        </a>
                                                        <ul class="dropdown-menu dropdown-menu-end p-0">
                                                            <li>
                                                                <a class="dropdown-item" href="{{ route('journey_level_set_edit', ['id'=> $set['id']]) }}" target="_blank" rel="noopener noreferrer">
                                                                    Edit
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <form action="{{ route('journey_level_set_delete', ['id'=> $set['id']]) }}" method="POST" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <input class="dropdown-item" type="submit" value="Delete">
                                                                </form>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            @else
                <div class="text-center">
                    <div class="my-5">
                        <h4>No Level Created Yet</h4>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newLevel">Add New Level</button>
                    </div>
                    <img class="w-25" src="https://cdn-icons-png.flaticon.com/512/7486/7486760.png" alt="No_level">
                </div>
            @endif
        </div>

        <!-- New Level Modal  -->
        <div class="modal fade" id="newLevel" aria-labelledby="modalToggleLabel">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-dark" id="modalToggleLabel">Create New Level</h5>
                        <button type="button" id="closeNewUser" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('journey_create_level') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <input type="hidden" name="id" value="{{ $journey->id }}" required>
                        <div class="modal-body">
                            <div class="form-group my-4 d-grid">
                                <label for="theme">Level Image</label>
                                <input type="file" name="photo" id="theme" class="mt-2 form-control" required>
                            </div>

                            <div class="form-group my-4 d-grid">
                                <label for="width">Image Width</label>
                                <input type="number" name="width" id="width" class="mt-2 form-control" min="1" value="1" required>
                            </div>
                            
                            <div class="form-group my-4 d-grid">
                                <label for="position_x">Image Position-X</label>
                                <input type="number" name="position_x" id="position_x" class="mt-2 form-control" value="1" required>
                            </div>
                            
                            <div class="form-group my-4 d-grid">
                                <label for="position_y">Image Position-Y</label>
                                <input type="number" name="position_y" id="position_y" class="mt-2 form-control" value="1" required>
                            </div>

                            <div class="form-group mb-4">
                                <label for="summernote">Description:</label>
                                <div class="my-3">
                                    <textarea id="summernote" name="description"></textarea>
                                </div>
                            </div>
                            <div class="mb-4 row">
                                <div class="col-12 col-sm-8">
                                    <div class="h6 mb-1 text-dark">
                                        Status - 
                                        <span id="isActiveText">Published</span>
                                    </div>
                                    <div class="lh-1 font-size-13">Published (Shown Everywhere). Draft (Not Shown).</div>
                                </div>
                                <div class="col-12 col-sm-4 d-flex align-items-center justify-content-sm-end">
                                    <label class="switch mt-2">
                                        <input name="is_active" id="isActive" type="checkbox" checked>
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="text-end">
                                <div id="formError" class="font-size-13 mb-2 text-danger"></div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="w-100 text-end">
                                <input  type="submit" value="Save & Proceed" class="btn btn-primary">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- New Test Modal -->
        <div class="modal fade" id="newTest" aria-labelledby="modalToggleLabel">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-dark" id="modalToggleLabel">Create <span id="level_num"></span> Level Test</h5>
                        <button type="button" id="closeNewUser" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>     
                    <input type="hidden" name="id" id="level_id">
                    <div class="modal-body">
                        <div class="form-group my-4">
                            <label for="title">Title</label>
                            <input id="journey_title" type="text" name="title" placeholder="Enter a title" class="form-control" required>
                        </div>

                        <div class="form-group my-4">
                            <label for="subtitle">Subtitle</label>
                            <input id="journey_subtitle" type="text" name="subtitle" placeholder="Enter a subtitle" class="form-control">
                        </div>

                        <div class="form-group my-4">
                            <label for="topic">Topic</label>
                            <select class="form-control" name="topic" id="topic">
                                @foreach($initialTopics as $key => $topic)
                                    <option value="{{$topic['id']}}">{{$topic['name']}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group my-4" id="sub_topic_wrap">
                            <label for="sub_topic">Sub Topic</label>
                            <div class="selected_sub_topic_wrap"></div>
                            <input type="hidden" name="subtopics_arr" id="subtopics_arr" value="">
                            <select class="form-control" name="sub_topic" id="sub_topic">
                                <option value="">Select Sub-Topic</option>
                                @foreach($initialSubTopics as $key => $subTopic)
                                    <option class="select_sub_topic" data-topic-id="{{$subTopic['topic_id']}}" value="{{$subTopic['id']}}">{{$subTopic['name']}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="justify-content-between align-items-center mb-4 custom-inp-group">
                                    <div>
                                        <span class="label">Allow Reward Points</span>
                                        <span class="position-relative">
                                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 cursor-pointer text-primary show_tooltip"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                            <div class="bg-white position-absolute px-3 py-1 shadow start-0 rounded font-size-13 custom-tooltip d-none zindex-1">
                                                <div><span class="text-success">Yes</span> - Points will be rewarded for each correct answer</div>
                                                <div><span class="text-danger">No</span> - No points will be rewarded</div>
                                            </div>
                                        </span>
                                    </div>
                                    <div>
                                        <input id="allowRewardPoints" class="inp" value="true" type="hidden">
                                        <span class="btn border rounded-0 radio_selector yes_selector active">Yes</span>
                                        <span class="btn border rounded-0 radio_selector no_selector">No</span>
                                    </div>
                                </div>
                                <div class="justify-content-between align-items-center mb-4 custom-inp-group">
                                    <div>
                                        <span class="label">Points Mode</span>
                                        <span class="position-relative">
                                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 cursor-pointer text-primary show_tooltip"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                            <div class="bg-white position-absolute px-3 py-1 shadow start-0 rounded font-size-13 custom-tooltip d-none zindex-1">
                                                <div><span class="text-success">Auto</span> - Points will be assigned based on question's default marks</div>
                                                <div><span class="text-danger">Manual</span> - Points will be assigned to each correct answered question as specified</div>
                                            </div>
                                        </span>
                                    </div>
                                    <div>
                                        <input id="pointsMode" class="inp allowDropdown" value="true" type="hidden">
                                        <span class="btn border rounded-0 radio_selector yes_selector active">Auto</span>
                                        <span class="btn border rounded-0 radio_selector no_selector">Manual</span>
                                    </div>
                                </div>
                                <div id="pointsModeSection" class="d-none justify-content-between align-items-center mb-4">
                                    <div class="label">Points for Correct Answer</div>
                                    <div>
                                        <input id="pointsCA" class="inp mt-2 form-control" type="number" min="1" placeholder="Points">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="justify-content-between align-items-center mb-4 custom-inp-group">
                                    <div>
                                        <span class="label">Show Reward Popup</span>
                                        <span class="position-relative">
                                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 cursor-pointer text-primary show_tooltip"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                            <div class="bg-white position-absolute px-3 py-1 shadow start-0 rounded font-size-13 custom-tooltip d-none zindex-1">
                                                <div><span class="text-success">Yes</span> - Shows reward popup on correct answer</div>
                                                <div><span class="text-danger">No</span> - No popup will be shown</div>
                                            </div>
                                        </span>
                                    </div>
                                    <div>
                                        <input id="showRewardPopup" class="inp" value="true" type="hidden">
                                        <span class="btn border rounded-0 radio_selector yes_selector active">Yes</span>
                                        <span class="btn border rounded-0 radio_selector no_selector">No</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group my-4 d-grid">
                            <label for="queNumRanger">No. of questions</label>
                            <div class="d-flex align-items-center my-2">
                                <button class="btn btn-outline-primary px-3 p-2 m-1 add_custom_range" type="button" data-value='15'>15</button>
                                <button class="btn btn-outline-primary px-3 p-2 m-1 add_custom_range" type="button" data-value='20'>20</button>
                                <button class="btn btn-outline-primary px-3 p-2 m-1 add_custom_range" type="button" data-value='25'>25</button>
                                <button class="btn btn-outline-primary px-3 p-2 m-1 add_custom_range" type="button" data-value='30'>30</button>
                            </div>
                            <input type="range" name="questions_num" id="queNumRanger" class="form-control-range shadow-none" min="0" max="30" value="0">
                            <div class="mt-2 label"><span id="totalQueNum" >0</span> Questions</div>
                        </div>

                        <div class="form-group mb-4">
                            <label for="journeySetDesc">Description:</label>
                            <div class="my-3">
                                <textarea id="journeySetDesc"></textarea>
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <div class="col-12 col-sm-8">
                                <div id="journeySetIsPaidText" class="h6 mb-1 text-dark">
                                    Free
                                </div>
                                <div class="lh-1 font-size-13">Paid (Accessible to only paid users). Free (Anyone can access).</div>
                            </div>
                            <div class="col-12 col-sm-4 d-flex align-items-center justify-content-sm-end">
                                <label class="switch mt-2">
                                    <input id="journeySetIsPaid" name="is_paid" type="checkbox">
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <div class="col-12 col-sm-8">
                                <div class="h6 mb-1 text-dark">
                                    Status - 
                                    <span id="journeySetisActiveText">
                                        Draft
                                    </span>
                                </div>
                                <div class="lh-1 font-size-13">Published (Shown Everywhere). Draft (Not Shown).</div>
                            </div>
                            <div class="col-12 col-sm-4 d-flex align-items-center justify-content-sm-end">
                                <label class="switch mt-2">
                                    <input id="journeySetisActive" name="is_active" type="checkbox">
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="w-100 text-end">
                            <div class="mb-1 font-size-13 text-danger" id="NewTagFormError"></div>
                            <input id="createNewJourneySet" value="Save & Proceed" class="btn btn-primary">
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    
    <script  script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css">
 
    <script>
        $("#createNewJourneySet").click(function(){
            let title = $("#journey_title").val();
            let subtitle = $("#journey_subtitle").val();
            let topic = $("#topic").val();
            let sub_topic = $("#sub_topic").val();
            let subtopics_arr = $("#subtopics_arr").val();
            let allowRewardPoints = $("#allowRewardPoints").val();
            let pointsMode = $("#pointsMode").val();
            let correct_marks = $("#pointsCA").val()?$("#pointsCA").val():null;
            let showRewardPopup = $("#showRewardPopup").val();
            let questions = $("#queNumRanger").val();
            let desc = $("#journeySetDesc").val();
            let is_paid = $("#journeySetIsPaid").is(':checked');
            let is_active = $("#journeySetisActive").is(':checked');
            let level_id = $("#level_id").val();
            let journey_id = {!! str_replace("'", "\'", json_encode($journey->id)) !!}
            if(title){
                if(pointsMode == true && !correct_marks){
                    $("#NewTagFormError").text("The correct marks field is required when auto grading is false.");
                } else {
                    $.ajax({
                        type: "POST",
                        url: '/admin/journey-sets/'+journey_id+'/'+level_id+'/add-set',
                        data: {
                            title: title,
                            subtitle: subtitle,
                            topic: topic,
                            sub_topic: sub_topic,
                            subtopics_arr: subtopics_arr,
                            allow_rewards: allowRewardPoints,
                            auto_grading: pointsMode,
                            correct_marks: correct_marks,
                            show_reward_popup: showRewardPopup,
                            questions: questions,
                            description: desc,
                            is_paid: is_paid,
                            is_active: is_active,
                            level_id: level_id,
                            journey_id: journey_id,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(data) {
                            if(data.success){
                                let set = data.journeySet.data;
                                $('#newTest').modal('hide');
                                let status_class = set.status == "Published" ? "bg-label-primary" : "bg-label-danger";
                                let tab = `<tr>
                                            <td data-label="code">
                                                <span class="align-items-center bg-primary cursor-pointer d-inline-flex px-2 questionCode rounded-3 small table_bg_primary text-white">
                                                    <span>
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
                                                    <span class="questionCodeText ms-2">`+set.code+`</span>
                                                </span>
                                            </td>
                                            <td data-label="title">`+set.title+`</td>
                                            <td data-label="subtitle">`+set.subtitle+`</td>
                                            <td data-label="questions">`+set.questions+`</td>
                                            <td data-label="year">`+set.year+`</td>
                                            <td data-label="topic">`+set.topic+`</td>
                                            <td>
                                                <span class="py-1 px-2 rounded small `+status_class+`">`+set.status+`</span>
                                            </td>
                                            <td data-label="actions">
                                                <div class="dropdown border rounded">
                                                    <a class="nav-link dropdown-toggle" href="" data-bs-toggle="dropdown" aria-expanded="false">
                                                        Action
                                                    </a>
                                                    <ul class="dropdown-menu dropdown-menu-end p-0">
                                                        <li>
                                                            <a class="dropdown-item" href="`+set.id+`">Analytics</a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item" href="`+set.id+`">Edit</a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item delete cursor-pointer" data-id="`+set.id+`">Delete</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>`;
                                $("#journey_set_level_"+level_id).append(tab);
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
            } else {
                $("#NewTagFormError").text("Please enter all details, title field is required.");
            }
        });
        $("#journey_title").keyup(function(){
            $("#NewTagFormError").text("");
        });
        $('#queNumRanger[type="range"]').on('input', function(){
            const $this = $(this);
            $('#totalQueNum').html($this.val());
        });
        getSubTopics($("#topic").val());
        $("#topic").change(function(){
            $(".selected_sub_topic_wrap").empty();
            $("#subtopics_arr").val("");
            getSubTopics($(this).val());
        });
        function getSubTopics(topic){
            if($("#sub_topic").find("option[data-topic-id='"+topic+"']").length > 0){
                $("#sub_topic").find("option").addClass('d-none');
                $("#sub_topic").find("option[data-topic-id='"+topic+"']").removeClass('d-none');
                $("#sub_topic_wrap").show();
            } else {
                $("#sub_topic").val("");
                $("#sub_topic_wrap").hide();
            }
        }
        $(".new_test").click(function(){
            $('#newTest').modal('show');
            $('#level_id').val($(this).data('id'));
            $('#level_num').text($(this).data('level'));
        });
        $('#isActive').change(function() {
            let isActive = $(this).is(':checked');
            if(isActive){
                $("#isActiveText").text("Published");
            } else {
                $("#isActiveText").text("Draft");
            }
        });
        // radio selector 
        $(".radio_selector").click(function(){
                $(this).addClass('active').siblings().removeClass('active');
                var option = $(this).hasClass("yes_selector");
                $(this).siblings(".inp").val(option);
                if($(this).siblings(".inp").hasClass("allowDropdown")){
                    let input = $(this).siblings(".inp");
                    let id = $(this).siblings(".inp").attr("id");
                    let showOnYes = $(this).siblings(".inp").hasClass("showOnYes");
                    if(showOnYes){
                        if(option){
                            $("#"+id+"Section").removeClass('d-none');
                            input.val("true");
                        } else {
                            input.val("false");
                            $("#"+id+"Section").addClass('d-none');
                        }
                    } else {
                        if(option){
                            $("#"+id+"Section").addClass('d-none');
                            input.val("true");
                        } else {
                            input.val("false");
                            $("#"+id+"Section").removeClass('d-none');
                        }
                    }
                }
            });
            // negative marks 
            $(".negativeMarksTypeSelector").click(function(){
                var option = $(this).hasClass("yes_selector");
                if(option){
                    $("#negativeMarks").attr("placeholder","Enter Number")
                } else {
                    $("#negativeMarks").attr("placeholder","Enter Percentage")
                }
            });
            // show tooltip mouseover
            $(".show_tooltip").mouseover(function(){
                $(this).siblings(".custom-tooltip").removeClass('d-none');
            });
            // show tooltip mouseout 
            $(".show_tooltip").mouseout(function(){
                $(this).siblings(".custom-tooltip").addClass('d-none');
            });

        // is paid 
        $('#journeySetIsPaid').change(function() {
            let journeySetIsPaid = $(this).is(':checked');
            if(journeySetIsPaid){
                $("#journeySetIsPaidText").text("Paid");
            } else {
                $("#journeySetIsPaidText").text("Free");
                
            }
        });  
        // is active  
        $('#journeySetisActive').change(function() {
            let journeySetisActive = $(this).is(':checked');
            if(journeySetisActive){
                $("#journeySetisActiveText").text("Published");
            } else {
                $("#journeySetisActiveText").text("Draft");
            }
        }); 

        $(document).on("click", ".cancel_subtopic", function () {
            let idToRemove = $(this).parent().data('id');
            let subtopicsArr = $("#subtopics_arr");
            subtopicsArr.val((i, val) => val.split(',').filter(id => id != idToRemove).join(','));
            $(this).parent().remove();
        });
        $("#sub_topic").change(function() {
            var selectedText = $(this).find("option:selected").text();
            var selectedValue = $(this).find("option:selected").val();
            let length = $(".selected_sub_topic_wrap").find("#subtopic"+selectedValue).length;
            if(length < 1){
                let tab = `<div id="subtopic`+selectedValue+`" data-id="`+selectedValue+`" class="p-1 badge bg-primary d-inline-flex align-items-center mb-2 me-2"><span>`+selectedText+`</span><i class="bx bx-x border-start ms-2 cursor-pointer cancel_subtopic"></i></div>`;
                let subtopics = $("#subtopics_arr").val();
                $("#subtopics_arr").val(subtopics !== "" ? subtopics + "," + selectedValue : selectedValue);
                $(".selected_sub_topic_wrap").append(tab);
            }
        });
        
        $(document).ready(function(){
            $('#summernote, #journeySetDesc').summernote({
                placeholder: 'Start Typing here...',
                tabsize: 2,
                height: 100,
                toolbar: [
                    ['font', ['bold', 'underline', 'clear']],
                    ['superscript', ['superscript']],
                    ['subscript', ['subscript']],
                    ['strikethrough', ['strikethrough']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['insert', ['link', 'picture']],
                    ['view', ['fullscreen', 'codeview']]
                ],
                callbacks: {
                    onInit: function() {
                        $('.note-toolbar').addClass('custom-toolbar');
                    }
                }
            });
        });
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
        $(".add_custom_range").click(function(e) {
            e.preventDefault();
            const get_range = $(this).data('value');
            $("#queNumRanger").val(get_range);
            $("#totalQueNum").text(get_range);
        });
    </script>
</body>

</html>
