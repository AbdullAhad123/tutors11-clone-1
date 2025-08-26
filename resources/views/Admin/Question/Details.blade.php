<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
    <script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>
    <!-- bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>
        @if(isset($editFlag) && $editFlag)
            Edit Question - {{$questionType['name']}}
        @else
            Create Question
        @endif
    </title>
    <!-- rel icon -->
    <link rel="icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}">
    <meta name="description" content="{{ app(\App\Settings\SiteSettings::class)->seo_description }}">
    <meta name="author" content="{{ app(\App\Settings\SiteSettings::class)->app_name }}">

    <style>
        .cursor-not-allowed{cursor:not-allowed !important}
        .practice_set_form{max-width: 600px !important;}
        #start_search:hover,#start_search:active{background: transparent;cursor: default;color: #bcc4cc !important;}
        #skill_Dropdown{max-height: 175px;}
        .font-size-13{font-size:13px;}
        input::-webkit-outer-spin-button,input::-webkit-inner-spin-button {-webkit-appearance: none;margin: 0;}
        input[type=number] {-moz-appearance: textfield;}
        .questionForm{max-width:900px;}
        #addOption{border: 1px dashed darkgreen}
        .btn_customize_primary{background: #696cff!important; color: #fff!important;}
    </style>
</head>

<body> 
    @include('sidebar')
    @include('header')


    <section class="p-4">

        <div class="text-start my-4 align-items-center">
            <button onclick="history.back()" class="btn bg-label-primary border-primary text-primary p-2 px-3">
                <i class='bx bx-arrow-back'></i>
                <span>
                    Back to Question
                </span>
            </button>
        </div>

        <div class="bg-white rounded py-4 shadow-sm">
            <div class="row m-0">
                <div class="col-12 align-self-center">
                    <h3 class="text-dark mb-2">Question Details</h3>
                    <h5 class="mt-1">{{$questionType['name']}}</h5>
                </div>
                <div class="col-12 d-flex justify-content-evenly mt-3">
                    @if(isset($editFlag) && $editFlag)
                        @foreach ($steps as $key => $step)
                            @if($step['status'] == 'active')
                                <a class="w-100 mx-1" href="{{$step['url']}}">
                                    <button class="bg-label-primary border-primary btn w-100">
                                        <span class="badge bg-primary circle-badge rounded-circle text-white"> {{$key + 1}} </span> 
                                        {{$step['title']}}
                                    </button>
                                </a>                        
                            @else
                                <a class="w-100 mx-1"  href="{{$step['url']}}">
                                    <button class="btn btn-outline-primary w-100">
                                        <span class="badge bg-primary circle-badge rounded-circle text-white"> {{$key + 1}} </span> 
                                        {{$step['title']}}
                                    </button>
                                </a>
                            @endif
                        @endforeach
                    @else
                        @foreach ($steps as $key => $step)
                            @if($step['status'] == 'active')
                                <button class="bg-label-primary border-primary btn mx-1 w-100"> <span class="badge bg-primary circle-badge rounded-circle text-white"> {{$key + 1}} </span> {{$step['title']}} </button>
                            @else
                                <button class="btn border border-primary mx-1 cursor-not-allowed w-100"> <span class="badge bg-primary circle-badge rounded-circle text-white"> {{$key + 1}} </span> {{$step['title']}} </button>
                            @endif
                        @endforeach
                    @endif
                </div>
            </div>
        </div>

        @if (Session::has('errorMessage') && isset($editFlag) && $editFlag)
            <div class="alert alert-danger mt-3">
                <svg fill="#ff3e1d" height="30px" width="30px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
                    viewBox="0 0 52 52" xml:space="preserve">
                    <g>
                        <path d="M26,0C11.664,0,0,11.663,0,26s11.664,26,26,26s26-11.663,26-26S40.336,0,26,0z M26,50C12.767,50,2,39.233,2,26
                            S12.767,2,26,2s24,10.767,24,24S39.233,50,26,50z"/>
                        <path d="M35.707,16.293c-0.391-0.391-1.023-0.391-1.414,0L26,24.586l-8.293-8.293c-0.391-0.391-1.023-0.391-1.414,0
                            s-0.391,1.023,0,1.414L24.586,26l-8.293,8.293c-0.391,0.391-0.391,1.023,0,1.414C16.488,35.902,16.744,36,17,36
                            s0.512-0.098,0.707-0.293L26,27.414l8.293,8.293C34.488,35.902,34.744,36,35,36s0.512-0.098,0.707-0.293
                            c0.391-0.391,0.391-1.023,0-1.414L27.414,26l8.293-8.293C36.098,17.316,36.098,16.684,35.707,16.293z"/>
                    </g>
                </svg>
                {{Session::get('errorMessage')}}
            </div>
        @endif

        <div class="bg-white rounded py-4 mt-4 shadow-sm">
            <div class="questionForm m-auto px-3">

            <div class="form-group my-4 dropdown">
                    <label for="book">Book</label>
                    @if(isset($editFlag) && $editFlag)
                        <select name="book" id="book">
                            @foreach ($books as $key => $book)
                                @if($book['id'] == $question['book_id'])
                                    <option value="{{$book['id']}}" selected>{{$book['name']}}</option>
                                @else 
                                    <option value="{{$book['id']}}">{{$book['name']}}</option>
                                @endif
                            @endforeach
                        </select>
                    @else
                        <select name="book" id="book">
                            @foreach ($books as $key => $book)
                                @if(Session::get('book') != null && Session::get('book') == $book['id'])
                                    <option value="{{$book['id']}}" selected>{{$book['name']}}</option>
                                @else 
                                    <option value="{{$book['id']}}">{{$book['name']}}</option>
                                @endif
                            @endforeach
                        </select>
                    @endif
                </div>

                <div class="form-group my-4 dropdown">
                    <label for="skill_Inp">Topic</label>
                    @if(isset($editFlag) && $editFlag && $skill)
                        <input id="skill_id" type="hidden" name="skill_id" value="{{$skill['id']}}">
                        <input id="skill_Inp" type="text" class="form-control dropdown-toggle" data-id="{{$skill['id']}}" value="{{$skill['name']}}" data-trigger="0" data-toggle="dropdown" aria-expanded="true" placeholder="Search Topic" autocomplete="off">
                    @else
                        <input id="skill_id" type="hidden" name="skill_id">
                        <input id="skill_Inp" type="text" class="form-control dropdown-toggle" data-id="" data-trigger="0" data-toggle="dropdown" aria-expanded="true" placeholder="Search Topic" autocomplete="off">
                    @endif
                    <ul id="skill_Dropdown" class="dropdown-menu w-100 p-0 overflow-auto">
                        <li class="dropdown-item text-center text-light" id="start_search">
                            Start typing to search.
                        </li>
                    </ul>
                </div>

                <div class="form-group my-4">
                    <div class="d-flex justify-content-between align-items-center my-3">
                        <label for="comprehension" class='mb-0'>Comprehension</label>
                        <!-- <a type='button' data-toggle="modal" data-target="#create_media">
                            <button class="btn bg-label-primary border-primary text-uppercase">Add Media</button>
                        </a> -->
                    </div>
                    @if(isset($editFlag) && $editFlag)
                        <textarea class="form-control" name="comprehension" id="comprehension" rows="4">{!! str_replace('</p>', '', str_replace('<p>', '', $question['comprehension'])) !!}</textarea>
                    @else
                        <textarea class="form-control" name="comprehension" id="comprehension" rows="4"></textarea>
                    @endif
                </div>
                
                <div class="form-group my-4">
                    <div class="d-flex justify-content-between align-items-center my-3">
                        <label for="question" class='mb-0'>Question</label>
                        <!-- <a type='button' data-toggle="modal" data-target="#create_media">
                            <button class="btn bg-label-primary border-primary text-uppercase">Add Media</button>
                        </a> -->
                    </div>
                    @if(isset($editFlag) && $editFlag)
                        <textarea class="form-control" name="question" id="question" rows="4">{!! $question['question'] !!}</textarea>
                    @else
                        <textarea class="form-control" name="question" id="question" rows="4"></textarea>
                    @endif
                </div>

                @if($questionType['code'] == 'MSA')
                    @if(isset($editFlag) && $editFlag)
                        <div class="bg_label_published p-3 rounded-3 text-dark">
                            <div id="option_wrap">
                                @foreach($question['options'] as $key => $option)
                                    <div class="form-group my-4 options">
                                        <label for="option_{{++$key}}">Option {{$key}}:</label>
                                        <div class="my-2">
                                            @if($key == $question['correct_answer'])
                                                <input type="radio" class="correct_answer" id="option_{{$key}}_is_correct" name="correct_answer" value="{{$key}}" checked="checked">
                                            @else
                                                <input type="radio" class="correct_answer" id="option_{{$key}}_is_correct" name="correct_answer" value="{{$key}}">
                                            @endif
                                            <label for="option_{{$key}}_is_correct">Correct Answer</label>
                                        </div>
                                        <textarea class="form-control" name="option_{{$key}}" id="option_{{$key}}" rows="4">{!! str_replace('</p>', '', str_replace('<p>', '', $option['option'])) !!}</textarea>
                                    </div>
                                @endforeach
                            </div>
                            <button id="addOption" class="btn mb-3 w-100 bg-transparent text-dark">
                                Add Option
                                <span class="badge bg-black ms-1 text-white">+</span>
                            </button>
                        </div>
                    @else
                        <div class="bg_label_published p-3 rounded-3 text-dark">
                            <div id="option_wrap">
                                <div class="form-group my-4 options">
                                    <label for="option_1">Option 1:</label>
                                    <div class="my-2">
                                        <input type="radio" class="correct_answer" id="option_1_is_correct" name="correct_answer" value="1" checked="checked">
                                        <label for="option_1_is_correct">Correct Answer</label>
                                    </div>
                                    <textarea class="form-control" name="option_1" id="option_1" rows="4"></textarea>
                                </div>

                                <div class="form-group my-4 options">
                                    <label for="option_2">Option 2:</label>
                                    <div class="my-2">
                                        <input type="radio" class="correct_answer" id="option_2_is_correct" name="correct_answer" value="2">
                                        <label for="option_2_is_correct">Correct Answer</label>
                                    </div>
                                    <textarea class="form-control" name="option_2" id="option_2" rows="4"></textarea>
                                </div>
                            </div>
                            <button id="addOption" class="btn mb-3 w-100 bg-transparent text-dark">
                                Add Option
                                <span class="badge bg-black ms-1 text-white">+</span>
                            </button>
                        </div>
                    @endif
                @elseif($questionType['code'] == 'MMA')
                    <div class="bg_label_published p-3 rounded-3 text-dark">
                        <div id="option_wrap">
                            @if(isset($editFlag) && $editFlag)
                                @foreach($question['options'] as $key => $option)
                                    <div class="form-group my-4 options">
                                        <label for="option_{{++$key}}">Option {{$key}}:</label>
                                        <div class="my-2">
                                            @if(is_array($question['correct_answer']) && in_array($key, $question['correct_answer']))
                                                <input type="checkbox" class="correct_answer" id="option_{{$key}}_is_correct" value="{{$key}}" checked="checked">
                                            @else
                                                <input type="checkbox" class="correct_answer" id="option_{{$key}}_is_correct" value="{{$key}}">
                                            @endif
                                            <label for="option_{{$key}}_is_correct">Correct Answer</label>
                                        </div>
                                        <textarea class="form-control" name="option_{{$key}}" id="option_{{$key}}" rows="4">{!! str_replace('</p>', '', str_replace('<p>', '', $option['option'])) !!}</textarea>
                                    </div>
                                @endforeach
                            @else
                                <div class="form-group my-4 options">
                                    <label for="option_1">Option 1:</label>
                                    <div class="my-2">
                                        <input type="checkbox" class="correct_answer" id="option_1_is_correct" value="1" checked="checked">
                                        <label for="option_1_is_correct">Correct Answer</label>
                                    </div>
                                    <textarea class="form-control" name="option_1" id="option_1" rows="4"></textarea>
                                </div>
                                <div class="form-group my-4 options">
                                    <label for="option_2">Option 2:</label>
                                    <div class="my-2">
                                        <input type="checkbox" class="correct_answer" id="option_2_is_correct" value="2">
                                        <label for="option_2_is_correct">Correct Answer</label>
                                    </div>
                                    <textarea class="form-control" name="option_2" id="option_2" rows="4"></textarea>
                                </div>
                            @endif
                        </div>
                        <button id="addOption" class="btn mb-3 w-100 bg-transparent text-dark">
                            Add Option
                            <span class="badge bg-black ms-1 text-white">+</span>
                        </button>
                    </div>
                @elseif($questionType['code'] == 'TOF')
                    <div class="bg_label_published p-3 rounded-3 text-dark">
                        <div id="option_wrap">
                            @if(isset($editFlag) && $editFlag)
                                @foreach($question['options'] as $key => $option)
                                    <div class="form-group my-4 options">
                                        <label for="option_{{++$key}}">Option {{$key}}:</label>
                                        <div class="my-2">
                                            @if(is_array($question['correct_answer']) && in_array($key, $question['correct_answer']))
                                                <input type="radio" class="correct_answer" id="option_{{$key}}_is_correct" name="correct_answer" value="{{$key}}" checked="checked">
                                            @else
                                                <input type="radio" class="correct_answer" id="option_{{$key}}_is_correct" name="correct_answer" value="{{$key}}">
                                            @endif
                                            <label for="option_{{$key}}_is_correct">Correct Answer</label>
                                        </div>
                                        <textarea class="form-control" name="option_{{$key}}" id="option_{{$key}}" rows="4">{!! str_replace('</p>', '', str_replace('<p>', '', $option['option'])) !!}</textarea>
                                    </div>
                                @endforeach
                            @else
                                <div class="form-group my-4 options">
                                    <label for="option_1">Option 1:</label>
                                    <div class="my-2">
                                        <input type="radio" class="correct_answer" id="option_1_is_correct" name="correct_answer" value="1" checked="checked">
                                        <label for="option_1_is_correct">Correct Answer</label>
                                    </div>
                                    <textarea class="form-control" name="option_1" id="option_1" rows="4">True</textarea>
                                </div>
                                <div class="form-group my-4 options">
                                    <label for="option_2">Option 2:</label>
                                    <div class="my-2">
                                        <input type="radio" class="correct_answer" id="option_2_is_correct" name="correct_answer" value="2">
                                        <label for="option_2_is_correct">Correct Answer</label>
                                    </div>
                                    <textarea class="form-control" name="option_2" id="option_2" rows="4">False</textarea>
                                </div>
                            @endif
                        </div>
                    </div>
                @elseif($questionType['code'] == 'SAQ')
                    <div class="bg_label_published p-3 rounded-3 text-dark">
                        <div id="option_wrap">
                            @if(isset($editFlag) && $editFlag)
                                @foreach($question['options'] as $key => $option)
                                    <div class="form-group my-4 options">
                                        <label for="option_{{++$key}}">Acceptable Answer {{$key}}:</label>
                                        <div class="my-2">
                                            @if($question['correct_answer'] == $key)
                                                <input type="radio" class="correct_answer" id="option_{{$key}}_is_correct" name="correct_answer" value="{{$key}}" checked="checked">
                                            @else
                                                <input type="radio" class="correct_answer" id="option_{{$key}}_is_correct" name="correct_answer" value="{{$key}}">
                                            @endif
                                            <label for="option_{{$key}}_is_correct">Exact Answer</label>
                                        </div>
                                        <textarea class="form-control" name="option_{{$key}}" id="option_{{$key}}" rows="4">{!!$option['option']!!}</textarea>
                                    </div>
                                @endforeach
                            @else
                                <div class="form-group my-4 options">
                                    <label for="option_1">Acceptable Answer 1:</label>
                                    <div class="my-2">
                                        <input type="radio" class="correct_answer" id="option_1_is_correct" name="correct_answer" value="1" checked="checked">
                                        <label for="option_1_is_correct">Exact Answer</label>
                                    </div>
                                    <textarea class="form-control" name="option_1" id="option_1" rows="4"></textarea>
                                </div>
                            @endif
                        </div>
                        <button id="addOption" class="btn mb-3 w-100 bg-transparent text-dark">
                            Add Option
                            <span class="badge bg-black ms-1 text-white">+</span>
                        </button>
                    </div>
                @elseif($questionType['code'] == 'MTF')
                    <div class="bg_label_published p-3 rounded-3 text-dark">
                        <div class="alert bg-white mt-3 shadow-lg">
                            <span class="text-danger">
                                <svg fill="#ff3e1d" style="height: auto;" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
                                    viewBox="0 0 52 52" xml:space="preserve">
                                    <g>
                                        <path d="M26,0C11.664,0,0,11.663,0,26s11.664,26,26,26s26-11.663,26-26S40.336,0,26,0z M26,50C12.767,50,2,39.233,2,26
                                            S12.767,2,26,2s24,10.767,24,24S39.233,50,26,50z"/>
                                        <path d="M35.707,16.293c-0.391-0.391-1.023-0.391-1.414,0L26,24.586l-8.293-8.293c-0.391-0.391-1.023-0.391-1.414,0
                                            s-0.391,1.023,0,1.414L24.586,26l-8.293,8.293c-0.391,0.391-0.391,1.023,0,1.414C16.488,35.902,16.744,36,17,36
                                            s0.512-0.098,0.707-0.293L26,27.414l8.293,8.293C34.488,35.902,34.744,36,35,36s0.512-0.098,0.707-0.293
                                            c0.391-0.391,0.391-1.023,0-1.414L27.414,26l8.293-8.293C36.098,17.316,36.098,16.684,35.707,16.293z"/>
                                    </g>
                                </svg>
                                Note:
                            </span> 
                            <span class="font-size-13">
                                Enter pairs in correct order. Pairs will automatically shuffle while showing to users.
                            </span>
                        </div>
                        <div id="option_wrap">
                            @if(isset($editFlag) && $editFlag)
                                @foreach($question['options'] as $key => $option)
                                    <div class="form-group my-4 options">
                                        <label for="option_{{++$key}}_1">Pair {{$key}}:</label>
                                        <div class="d-flex">
                                            <textarea class="form-control mx-1" name="option_{{$key}}_1" id="option_{{$key}}_1" rows="4">{!! str_replace('</p>', '', str_replace('<p>', '', $option['option'])) !!}</textarea>
                                            <textarea class="form-control mx-1" name="option_{{$key}}_2" id="option_{{$key}}_2" rows="4">{!! str_replace('</p>', '', str_replace('<p>', '', $option['pair'])) !!}</textarea>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="form-group my-4 options">
                                    <label for="option_1_1">Pair 1:</label>
                                    <div class="d-flex">
                                        <textarea class="form-control mx-1" name="option_1_1" id="option_1_1" rows="4"></textarea>
                                        <textarea class="form-control mx-1" name="option_1_2" id="option_1_2" rows="4"></textarea>
                                    </div>
                                </div>
                                <div class="form-group my-4 options">
                                    <label for="option_2_1">Pair 2:</label>
                                    <div class="d-flex">
                                        <textarea class="form-control mx-1" name="option_2_1" id="option_2_1" rows="4"></textarea>
                                        <textarea class="form-control mx-1" name="option_2_2" id="option_2_2" rows="4"></textarea>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <button id="addOption" class="btn mb-3 w-100 bg-transparent text-dark">
                            Add Pair
                            <span class="badge bg-black ms-1 text-white">+</span>
                        </button>
                    </div>
                @elseif($questionType['code'] == 'ORD')
                    <div class="bg_label_published p-3 rounded-3 text-dark">
                        <div class="alert bg-white mt-3 shadow-lg">
                            <span class="text-danger">
                                <svg fill="#ff3e1d" style="height: auto;" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
                                    viewBox="0 0 52 52" xml:space="preserve">
                                    <g>
                                        <path d="M26,0C11.664,0,0,11.663,0,26s11.664,26,26,26s26-11.663,26-26S40.336,0,26,0z M26,50C12.767,50,2,39.233,2,26
                                            S12.767,2,26,2s24,10.767,24,24S39.233,50,26,50z"/>
                                        <path d="M35.707,16.293c-0.391-0.391-1.023-0.391-1.414,0L26,24.586l-8.293-8.293c-0.391-0.391-1.023-0.391-1.414,0
                                            s-0.391,1.023,0,1.414L24.586,26l-8.293,8.293c-0.391,0.391-0.391,1.023,0,1.414C16.488,35.902,16.744,36,17,36
                                            s0.512-0.098,0.707-0.293L26,27.414l8.293,8.293C34.488,35.902,34.744,36,35,36s0.512-0.098,0.707-0.293
                                            c0.391-0.391,0.391-1.023,0-1.414L27.414,26l8.293-8.293C36.098,17.316,36.098,16.684,35.707,16.293z"/>
                                    </g>
                                </svg>
                                Note:
                            </span> 
                            <span class="font-size-13">
                                Enter items in correct order. Items will automatically shuffle while showing to users.
                            </span>
                        </div>
                        <div id="option_wrap">
                            @if(isset($editFlag) && $editFlag)
                                @foreach($question['options'] as $key => $option)
                                    <div class="form-group my-4 options">
                                        <label for="option_{{++$key}}">Sequence Item {{$key}}:</label>
                                        <textarea class="form-control" name="option_{{$key}}" id="option_{{$key}}" rows="4">{!! str_replace('</p>', '', str_replace('<p>', '', $option['option'])) !!}</textarea>
                                    </div>
                                @endforeach
                            @else
                                <div class="form-group my-4 options">
                                    <label for="option_1">Sequence Item 1:</label>
                                    <textarea class="form-control" name="option_1" id="option_1" rows="4"></textarea>
                                </div>
                                <div class="form-group my-4 options">
                                    <label for="option_2">Sequence Item 2:</label>
                                    <textarea class="form-control" name="option_2" id="option_2" rows="4"></textarea>
                                </div>
                            @endif
                        </div>
                        <button id="addOption" class="btn mb-3 w-100 bg-transparent text-dark">
                            Add Option
                            <span class="badge bg-black ms-1 text-white">+</span>
                        </button>
                    </div>
                @elseif($questionType['code'] == 'FIB')
                    <div class="bg_label_published p-3 rounded-3 text-dark">    
                        <div class="alert bg-white mt-3 shadow-lg">
                            <span class="text-danger">
                                <svg fill="#ff3e1d" style="height: auto;" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
                                    viewBox="0 0 52 52" xml:space="preserve">
                                    <g>
                                        <path d="M26,0C11.664,0,0,11.663,0,26s11.664,26,26,26s26-11.663,26-26S40.336,0,26,0z M26,50C12.767,50,2,39.233,2,26
                                            S12.767,2,26,2s24,10.767,24,24S39.233,50,26,50z"/>
                                        <path d="M35.707,16.293c-0.391-0.391-1.023-0.391-1.414,0L26,24.586l-8.293-8.293c-0.391-0.391-1.023-0.391-1.414,0
                                            s-0.391,1.023,0,1.414L24.586,26l-8.293,8.293c-0.391,0.391-0.391,1.023,0,1.414C16.488,35.902,16.744,36,17,36
                                            s0.512-0.098,0.707-0.293L26,27.414l8.293,8.293C34.488,35.902,34.744,36,35,36s0.512-0.098,0.707-0.293
                                            c0.391-0.391,0.391-1.023,0-1.414L27.414,26l8.293-8.293C36.098,17.316,36.098,16.684,35.707,16.293z"/>
                                    </g>
                                </svg>
                                Note:
                            </span> 
                            <span class="font-size-13">
                                Wrap the word or words you wish to make a blank with ##(DOUBLE HASH). E.g. ##BLANK_ITEM##. The system will automatically convert them to empty blanks, and users will be provided with text boxes to enter their responses.
                            </span>
                        </div>
                    </div>
                @endif

                <!-- Add Media Modal  -->
                <!-- <div class="modal fade" id="create_media" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="create_mediaLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="create_mediaLabel">Add New Media</h1>
                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="mb-4">
                                    <label for="new_image" class="form-label">Select Image</label>
                                    <input type="file" class="form-control" id="new_image" aria-describedby="new_image">
                                </div>
                                <div class="text-end">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                        </div>
                    </div>
                </div> -->

                <div class="my-4 text-end">
                    <div id="formError" class="font-size-13 mb-2 text-danger"></div>
                    <button id="proceedForm" class="btn btn-primary px-3 p-2">Save & Proceed</button>
                </div>

            </div>
        </div>

    </section>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>  
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $(document).on("keyup","#skill_Inp", function(e){
            $("#skill_Dropdown").empty();
            var search_query = $(this).val();
            if(search_query.length > 0) {
                $.ajax({
                    type: "GET",
                    url: '/admin/search_skills',
                    data: {
                        query: search_query,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        let arrLength = data['skills'].length;
                        if(arrLength > 0) {
                            data['skills'].forEach(function(skill){
                                $("#skill_Dropdown").append('<li class="dropdown-item cursor-pointer py-1 px-3 select_skill" data-id="'+skill.id+'">'+skill.name+'</li>');
                            });
                        } else {
                            $("#skill_Dropdown").append('<li class="dropdown-item text-danger text-center">No Result Found</li>');
                        }

                    },
                    error: function(data, textStatus, errorThrown) {
                        console.log(textStatus);
                        console.log(data);
                    },
                });
            } else {
                $("#form").attr('action', '');
                $("#form").attr('method', '');
                $("#skill_id").val("");
                $("#skill_Inp").attr("data-id","");
                $("#skill_Dropdown").append('<li class="dropdown-item text-center text-light" id="start_search">Start typing to search.</li>');
            }
            // select skill 
            $(document).on("click",".select_skill", function(e){
                let selectedSkill = $(this).text().trim();
                let selectedSkillId = $(this).data("id");
                $("#form").attr('action', '/admin/import-questions/'+selectedSkillId);
                $("#form").attr('method', 'POST');
                $("#skill_id").val(selectedSkillId);
                $("#skill_Inp").val(selectedSkill);
                $("#skill_Inp").attr("data-id",selectedSkillId);
            });
            // form error 
            $(document).on("keyup","#skill_Inp, #question, #comprehension", function(e){
                $("#formError").empty();
            });
            // ready ends 
        });
        $(function(){
            $('#question').summernote({
                placeholder: 'Start Typing here...',
                tabsize: 2,
                height: 120,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'fullscreen', 'superscript', 'subscript']],
                    ['view', ['codeview', 'help']]
                ]
            });
            $('#comprehension').summernote({
                placeholder: 'Start Typing here...',
                tabsize: 2,
                height: 120,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'fullscreen', 'superscript', 'subscript']],
                    ['view', ['codeview', 'help']]
                ]
            })  
        });
        var multipleCancelButton = new Choices('#book', {
            searchEnabled: true,
            shouldSort: false
        });
        // appending custom buttons in summernote 
        $(document).ready(function(){
            $(".note-toolbar").append(`<div class="d-inline-flex"><button class="btn btn-light btn-sm rounded-0 py-1 border add_fraction"><span>1&#x2044;2</span></button></div>`);
            $(".add_fraction").click(function(){
                let _this = $(this);
                let notePlaceholder = _this.parent().parent().next().find(".note-placeholder");
                let noteEditable = _this.parent().parent().next().find(".note-editable");
                let enteredText = noteEditable.html();
                console.log(enteredText)
                $(notePlaceholder).hide();
                // $(noteEditable).empty();
                $(noteEditable).append(`&nbsp;<span style=" display: inline-grid; text-align: center;">
                        <span>A</span>
                        <hr style="margin: 0!important;padding: 0!important; display: inline; border: 0.6px solid black;">
                        <span>B</span>
                    </span>&nbsp;`);
                // if (enteredText.length > 0) {
                //     $(noteEditable).append(`<div style="display: flex; align-items: center;">
                //         `+enteredText+` &nbsp;
                //         <span style=" display: inline-grid; text-align: center;">
                //             <span>A</span>
                //             <hr style="margin: 0!important;padding: 0!important; display: inline; border: 0.6px solid black;">
                //             <span>B</span>
                //         </span>&nbsp;
                //     </div>`);
                // } else {
                //     $(noteEditable).append(`&nbsp;<span style=" display: inline-grid; text-align: center;">
                //         <span>A</span>
                //         <hr style="margin: 0!important;padding: 0!important; display: inline; border: 0.6px solid black;">
                //         <span>B</span>
                //     </span>&nbsp;`);
                // }                
            });
        });
    </script>

    @if($questionType['code'] == 'MSA')
        <script>
            var issetEditFlag = null;
            var editFlag = false;
            var questionId;
            @if(isset($editFlag) && $editFlag)
                issetEditFlag = {!! str_replace("'", "\'", json_encode(isset($editFlag))) !!};
                editFlag = {!! str_replace("'", "\'", json_encode($editFlag)) !!};
                questionId = {!! str_replace("'", "\'", json_encode($question['id'])) !!};
            @endif
            let questionTypeId = {!! str_replace("'", "\'", json_encode($questionType['id'])) !!};
            let questionTypeCode = {!! str_replace("'", "\'", json_encode($questionType['code'])) !!};
            $(document).on("click","#addOption", function(e){
                let current_number = $(".options").length + 1;
                let tab = `<div class="form-group my-4 options">
                            <label for="option_`+current_number+`">Option `+current_number+`:</label>
                            <div class="my-2">
                                <input type="radio" class="correct_answer" id="option_`+current_number+`_is_correct" name="correct_answer" value="`+current_number+`">
                                <label for="option_`+current_number+`_is_correct">Correct Answer</label>
                            </div>
                            <textarea class="form-control" name="option_`+current_number+`" id="option_`+current_number+`" rows="4"></textarea>
                        </div>`
                $("#option_wrap").append(tab);
            });
            $(document).on("click","#proceedForm", function(e){
                let book_id = $("#book").val();
                let skill_id = $("#skill_id").val()?$("#skill_id").val():null;
                let question = "<p>"+$("#question").val()+"</p>\n";
                let preferences = [];
                let correct_answer = parseInt($('.correct_answer[name=correct_answer]:checked').val());
                var options = [];
                $(".options").each(function(){
                    let option = "<p>"+$(this).find("textarea").val()+"</p>\n";
                    options.push({"option": option,"partial_weightage": 0});
                });
                if(skill_id){
                    if(question){
                        var url;
                        var method;
                        if(issetEditFlag && editFlag){
                            url = '/admin/questions/'+questionId;
                            method = "PATCH";
                        } else {
                            url = '/admin/questions';
                            method = "POST";
                        }
                        $.ajax({
                            type: method,
                            url: url,
                            data: {
                                "question": question,
                                "comprehension": $("#comprehension").val(),
                                "skill_id": skill_id,
                                "book_id": book_id,
                                "question_type_id": questionTypeId,
                                "options": options,
                                "correct_answer": correct_answer,
                                "preferences": [],
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(data) {
                                console.log(data)
                                window.location.href = "/admin/questions/"+data.question+"/settings";
                            },
                            error: function(data, textStatus, errorThrown) {
                                console.log(textStatus);
                                var obj = data.responseJSON.errors;
                                let formError = obj[Object.keys(obj)[0]][0];
                                $("#formError").text(formError);
                            },
                        });
                    } else {
                        $("#formError").text('Please enter a question');    
                    }
                } else {
                    $("#formError").text('Please select a Topic from the dropdown list');
                }
            });
        </script>
    @elseif($questionType['code'] == 'MMA')
        <script>
            var issetEditFlag = null;
            var editFlag = false;
            var questionId;
            @if(isset($editFlag) && $editFlag)
                issetEditFlag = {!! str_replace("'", "\'", json_encode(isset($editFlag))) !!};
                editFlag = {!! str_replace("'", "\'", json_encode($editFlag)) !!};
                questionId = {!! str_replace("'", "\'", json_encode($question['id'])) !!};
            @endif
            let questionTypeId = {!! str_replace("'", "\'", json_encode($questionType['id'])) !!};
            let questionTypeCode = {!! str_replace("'", "\'", json_encode($questionType['code'])) !!};
            $(document).on("click","#addOption", function(e){
                let current_number = $(".options").length + 1;
                let tab = `<div class="form-group my-4 options">
                            <label for="option_`+current_number+`">Option `+current_number+`:</label>
                            <div class="my-2">
                                <input type="checkbox" class="correct_answer" id="option_`+current_number+`_is_correct" value="`+current_number+`">
                                <label for="option_`+current_number+`_is_correct">Correct Answer</label>
                            </div>
                            <textarea class="form-control" name="option_`+current_number+`" id="option_`+current_number+`" rows="4"></textarea>
                        </div>`
                $("#option_wrap").append(tab);
            });
            $(document).on("click","#proceedForm", function(e){
                let book_id = $("#book").val();
                let skill_id = $("#skill_id").val()?$("#skill_id").val():null;
                let question = "<p>"+$("#question").val()+"</p>\n";
                let preferences = [];
                var correct_answer = [];
                var options = [];
                $(".options").each(function(){
                    let option = "<p>"+$(this).find("textarea").val()+"</p>\n";
                    options.push({"option": option,"partial_weightage": 0});
                });
                if(skill_id){
                    if(question){
                        $(".correct_answer").each(function(i){
                            if ($(this).is(':checked')) {
                                correct_answer.push(++i);
                            }
                        });
                        var url;
                        var method;
                        if(issetEditFlag && editFlag){
                            url = '/admin/questions/'+questionId;
                            method = "PATCH";
                        } else {
                            url = '/admin/questions';
                            method = "POST";
                        }
                        $.ajax({
                            type: method,
                            url: url,
                            data: {
                                "question": question,
                                "comprehension": $("#comprehension").val(),
                                "skill_id": skill_id,
                                "book_id": book_id,
                                "question_type_id": questionTypeId,
                                "options": options,
                                "correct_answer": correct_answer,
                                "preferences": [],
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(data) {
                                console.log(data)
                                window.location.href = "/admin/questions/"+data.question+"/settings";
                            },
                            error: function(data, textStatus, errorThrown) {
                                console.log(textStatus);
                                var obj = data.responseJSON.errors;
                                let formError = obj[Object.keys(obj)[0]][0];
                                $("#formError").text(formError);
                            },
                        });
                    } else {
                        $("#formError").text('Please enter a question');    
                    }
                } else {
                    $("#formError").text('Please select a topic from the dropdown list');
                }
            });
        </script>
    @elseif($questionType['code'] == 'TOF')
        <script>
            var issetEditFlag = null;
            var editFlag = false;
            var questionId;
            @if(isset($editFlag) && $editFlag)
                issetEditFlag = {!! str_replace("'", "\'", json_encode(isset($editFlag))) !!};
                editFlag = {!! str_replace("'", "\'", json_encode($editFlag)) !!};
                questionId = {!! str_replace("'", "\'", json_encode($question['id'])) !!};
            @endif
            let questionTypeId = {!! str_replace("'", "\'", json_encode($questionType['id'])) !!};
            let questionTypeCode = {!! str_replace("'", "\'", json_encode($questionType['code'])) !!};
            $(document).on("click","#proceedForm", function(e){
                let book_id = $("#book").val();
                let skill_id = $("#skill_id").val()?$("#skill_id").val():null;
                let question = "<p>"+$("#question").val()+"</p>\n";
                let preferences = [];
                var correct_answer = [];
                var options = [];
                $(".options").each(function(){
                    let option = "<p>"+$(this).find("textarea").val()+"</p>\n";
                    options.push({"option": option,"partial_weightage": 0});
                });
                if(skill_id){
                    if(question){
                        $(".correct_answer").each(function(i){
                            if ($(this).is(':checked')) {
                                correct_answer.push(++i);
                            }
                        });
                        var url;
                        var method;
                        if(issetEditFlag && editFlag){
                            url = '/admin/questions/'+questionId;
                            method = "PATCH";
                        } else {
                            url = '/admin/questions';
                            method = "POST";
                        }
                        $.ajax({
                            type: method,
                            url: url,
                            data: {
                                "question": question,
                                "comprehension": $("#comprehension").val(),
                                "skill_id": skill_id,
                                "book_id": book_id,
                                "question_type_id": questionTypeId,
                                "options": options,
                                "correct_answer": correct_answer,
                                "preferences": [],
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(data) {
                                console.log(data)
                                window.location.href = "/admin/questions/"+data.question+"/settings";
                            },
                            error: function(data, textStatus, errorThrown) {
                                console.log(textStatus);
                                var obj = data.responseJSON.errors;
                                let formError = obj[Object.keys(obj)[0]][0];
                                $("#formError").text(formError);
                            },
                        });
                    } else {
                        $("#formError").text('Please enter a question');    
                    }
                } else {
                    $("#formError").text('Please select a topic from the dropdown list');
                }
            });
        </script>
    @elseif($questionType['code'] == 'SAQ')
        <script>
            var issetEditFlag = null;
            var editFlag = false;
            var questionId;
            @if(isset($editFlag) && $editFlag)
                issetEditFlag = {!! str_replace("'", "\'", json_encode(isset($editFlag))) !!};
                editFlag = {!! str_replace("'", "\'", json_encode($editFlag)) !!};
                questionId = {!! str_replace("'", "\'", json_encode($question['id'])) !!};
            @endif
            let questionTypeId = {!! str_replace("'", "\'", json_encode($questionType['id'])) !!};
            let questionTypeCode = {!! str_replace("'", "\'", json_encode($questionType['code'])) !!};
            $(document).on("click","#addOption", function(e){
                let current_number = $(".options").length + 1;
                let tab = `<div class="form-group my-4 options">
                            <label for="option_`+current_number+`">Acceptable Answer `+current_number+`:</label>
                            <div class="my-2">
                                <input type="radio" class="correct_answer" id="option_`+current_number+`_is_correct" name="correct_answer" value="`+current_number+`">
                                <label for="option_`+current_number+`_is_correct">Exact Answer</label>
                            </div>
                            <textarea class="form-control" name="option_`+current_number+`" id="option_`+current_number+`" rows="4"></textarea>
                        </div>`
                $("#option_wrap").append(tab);
            });
            $(document).on("click","#proceedForm", function(e){
                let book_id = $("#book").val();
                let skill_id = $("#skill_id").val()?$("#skill_id").val():null;
                let question = "<p>"+$("#question").val()+"</p>\n";
                let preferences = [];
                let correct_answer = parseInt($('.correct_answer[name=correct_answer]:checked').val());
                var options = [];
                $(".options").each(function(){
                    let option = $(this).find("textarea").val();
                    options.push({"option": option,"partial_weightage": 0});
                });
                if(skill_id){
                    if(question){
                        var url;
                        var method;
                        if(issetEditFlag && editFlag){
                            url = '/admin/questions/'+questionId;
                            method = "PATCH";
                        } else {
                            url = '/admin/questions';
                            method = "POST";
                        }
                        $.ajax({
                            type: method,
                            url: url,
                            data: {
                                "question": question,
                                "comprehension": $("#comprehension").val(),
                                "skill_id": skill_id,
                                "book_id": book_id,
                                "question_type_id": questionTypeId,
                                "options": options,
                                "correct_answer": correct_answer,
                                "preferences": {case_sensitive: false, is_numeric: false},
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(data) {
                                console.log(data)
                                window.location.href = "/admin/questions/"+data.question+"/settings";
                            },
                            error: function(data, textStatus, errorThrown) {
                                console.log(textStatus);
                                var obj = data.responseJSON.errors;
                                let formError = obj[Object.keys(obj)[0]][0];
                                $("#formError").text(formError);
                            },
                        });
                    } else {
                        $("#formError").text('Please enter a question');    
                    }
                } else {
                    $("#formError").text('Please select a topic from the dropdown list');
                }
            });
        </script>
    @elseif($questionType['code'] == 'MTF')
        <script>
            var issetEditFlag = null;
            var editFlag = false;
            var questionId;
            @if(isset($editFlag) && $editFlag)
                issetEditFlag = {!! str_replace("'", "\'", json_encode(isset($editFlag))) !!};
                editFlag = {!! str_replace("'", "\'", json_encode($editFlag)) !!};
                questionId = {!! str_replace("'", "\'", json_encode($question['id'])) !!};
            @endif
            let questionTypeId = {!! str_replace("'", "\'", json_encode($questionType['id'])) !!};
            let questionTypeCode = {!! str_replace("'", "\'", json_encode($questionType['code'])) !!};
            $(document).on("click","#addOption", function(e){
                let current_number = $(".options").length + 1;
                let tab = `<div class="form-group my-4 options">
                            <label for="option_`+current_number+`_1">Pair `+current_number+`:</label>
                            <div class="d-flex">
                                <textarea class="form-control mx-1" name="option_`+current_number+`_1" id="option_`+current_number+`_1" rows="4"></textarea>
                                <textarea class="form-control mx-1" name="option_`+current_number+`_2" id="option_`+current_number+`_2" rows="4"></textarea>
                            </div>
                        </div>`;
                $("#option_wrap").append(tab);
            });
            $(document).on("click","#proceedForm", function(e){
                let book_id = $("#book").val();
                let skill_id = $("#skill_id").val()?$("#skill_id").val():null;
                let question = "<p>"+$("#question").val()+"</p>\n";
                let preferences = [];
                var options = [];
                $(".options").each(function(){
                    let pair1 = "<p>"+$(this).find("textarea").first().val()+"</p>\n";
                    let pair2 = "<p>"+$(this).find("textarea").last().val()+"</p>\n";
                    options.push({"option": pair1, "pair": pair2, "partial_weightage": 0});
                });
                if(skill_id){
                    if(question){
                        var url;
                        var method;
                        if(issetEditFlag && editFlag){
                            url = '/admin/questions/'+questionId;
                            method = "PATCH";
                        } else {
                            url = '/admin/questions';
                            method = "POST";
                        }
                        $.ajax({
                            type: method,
                            url: url,
                            data: {
                                "question": question,
                                "comprehension": $("#comprehension").val(),
                                "skill_id": skill_id,
                                "book_id": book_id,
                                "question_type_id": questionTypeId,
                                "options": options,
                                "correct_answer": "",
                                "preferences": [],
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(data) {
                                console.log(data)
                                window.location.href = "/admin/questions/"+data.question+"/settings";
                            },
                            error: function(data, textStatus, errorThrown) {
                                console.log(textStatus);
                                var obj = data.responseJSON.errors;
                                let formError = obj[Object.keys(obj)[0]][0];
                                $("#formError").text(formError);
                            },
                        });
                    } else {
                        $("#formError").text('Please enter a question');    
                    }
                } else {
                    $("#formError").text('Please select a topic from the dropdown list');
                }
            });
        </script>
    @elseif($questionType['code'] == 'ORD')
        <script>
            var issetEditFlag = null;
            var editFlag = false;
            var questionId;
            @if(isset($editFlag) && $editFlag)
                issetEditFlag = {!! str_replace("'", "\'", json_encode(isset($editFlag))) !!};
                editFlag = {!! str_replace("'", "\'", json_encode($editFlag)) !!};
                questionId = {!! str_replace("'", "\'", json_encode($question['id'])) !!};
            @endif
            let questionTypeId = {!! str_replace("'", "\'", json_encode($questionType['id'])) !!};
            let questionTypeCode = {!! str_replace("'", "\'", json_encode($questionType['code'])) !!};
            $(document).on("click","#addOption", function(e){
                let current_number = $(".options").length + 1;
                let tab = `<div class="form-group my-4 options">
                            <label for="option_`+current_number+`">Sequence Item `+current_number+`:</label>
                            <textarea class="form-control" name="option_`+current_number+`" id="option_`+current_number+`" rows="4"></textarea>
                        </div>`
                $("#option_wrap").append(tab);
            });
            $(document).on("click","#proceedForm", function(e){
                let book_id = $("#book").val();
                let skill_id = $("#skill_id").val()?$("#skill_id").val():null;
                let question = "<p>"+$("#question").val()+"</p>\n";
                let preferences = [];
                let correct_answer = parseInt($('.correct_answer[name=correct_answer]:checked').val());
                var options = [];
                $(".options").each(function(){
                    let option = "<p>"+$(this).find("textarea").val()+"</p>\n";
                    options.push({"option": option,"partial_weightage": 0});
                });
                if(skill_id){
                    if(question){
                        var url;
                        var method;
                        if(issetEditFlag && editFlag){
                            url = '/admin/questions/'+questionId;
                            method = "PATCH";
                        } else {
                            url = '/admin/questions';
                            method = "POST";
                        }
                        $.ajax({
                            type: method,
                            url: url,
                            data: {
                                "question": question,
                                "comprehension": $("#comprehension").val(),
                                "skill_id": skill_id,
                                "book_id": book_id,
                                "question_type_id": questionTypeId,
                                "options": options,
                                "correct_answer": [""],
                                "preferences": [],
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(data) {
                                console.log(data)
                                window.location.href = "/admin/questions/"+data.question+"/settings";
                            },
                            error: function(data, textStatus, errorThrown) {
                                console.log(textStatus);
                                var obj = data.responseJSON.errors;
                                let formError = obj[Object.keys(obj)[0]][0];
                                $("#formError").text(formError);
                            },
                        });
                    } else {
                        $("#formError").text('Please enter a question');    
                    }
                } else {
                    $("#formError").text('Please select a topic from the dropdown list');
                }
            });
        </script>
    @elseif($questionType['code'] == 'FIB')
        <script>
            var issetEditFlag = null;
            var editFlag = false;
            var questionId;
            @if(isset($editFlag) && $editFlag)
                issetEditFlag = {!! str_replace("'", "\'", json_encode(isset($editFlag))) !!};
                editFlag = {!! str_replace("'", "\'", json_encode($editFlag)) !!};
                questionId = {!! str_replace("'", "\'", json_encode($question['id'])) !!};
            @endif
            let questionTypeId = {!! str_replace("'", "\'", json_encode($questionType['id'])) !!};
            let questionTypeCode = {!! str_replace("'", "\'", json_encode($questionType['code'])) !!};
            $(document).on("click","#proceedForm", function(e){
                let book_id = $("#book").val();
                let skill_id = $("#skill_id").val()?$("#skill_id").val():null;
                let question = "<p>"+$("#question").val()+"</p>\n";
                let preferences = [];
                if(skill_id){
                    if(question){
                        var url;
                        var method;
                        if(issetEditFlag && editFlag){
                            url = '/admin/questions/'+questionId;
                            method = "PATCH";
                        } else {
                            url = '/admin/questions';
                            method = "POST";
                        }
                        $.ajax({
                            type: method,
                            url: url,
                            data: {
                                "question": question,
                                "comprehension": $("#comprehension").val(),
                                "skill_id": skill_id,
                                "book_id": book_id,
                                "question_type_id": questionTypeId,
                                "options": [""],
                                "correct_answer": [""],
                                "preferences": [],
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(data) {
                                console.log(data)
                                window.location.href = "/admin/questions/"+data.question+"/settings";
                            },
                            error: function(data, textStatus, errorThrown) {
                                console.log(textStatus);
                                var obj = data.responseJSON.errors;
                                let formError = obj[Object.keys(obj)[0]][0];
                                $("#formError").text(formError);
                            },
                        });
                    } else {
                        $("#formError").text('Please enter a question');    
                    }
                } else {
                    $("#formError").text('Please select a topic from the dropdown list');
                }
            });
        </script>
    @endif

</body>

</html>
