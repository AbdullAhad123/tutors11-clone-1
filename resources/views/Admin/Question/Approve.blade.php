<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
    <script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>
    <title>Approve Question - {{$questionType['name']}}</title>
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
        .questionForm{max-width:650px;}
        #addOption{border: 1px dashed darkgreen}
        .choices__inner, .choices__input {background: #fff;}
        .yes_selector.active, .videoTypeSelector.active{background-color: #e8fadf !important;color: #71dd37 !important;}
        .no_selector.active{background-color: #ffe0db !important;color: #ff3e1d !important;}
    </style>
</head>

<body> 
    @include('sidebar')
    @include('header')
    <div class="questiontext-start my-4 align-items-center">
        <button onclick="history.back()" class="btn bg-label-primary border-primary text-primary p-2 px-3">
            <i class='bx bx-arrow-back'></i>
            <span>
                Back to Question
            </span>
        </button>
    </div>
    <!-- working here -->
    <!-- @if(!request()->has('by_approve') && request()->input('by_approve') != 'true')
    @endif -->

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
        <div class="px-3 d-sm-flex justify-content-between">
            <div class="h5 text-dark mb-0">Question Details</div>
            <div>{{$questionType['name']}}</div>
        </div>
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
                <div class="d-flex">
                    @if(isset($editFlag) && $editFlag && $skill)
                        <input id="skill_id" type="hidden" name="skill_id" value="{{$skill['id']}}">
                        <input id="skill_Inp" type="text" class="form-control dropdown-toggle" data-id="{{$skill['id']}}" value="{{$skill['name']}}" data-trigger="0" data-bs-toggle="dropdown"
                        aria-expanded="true" placeholder="Search Topic" autocomplete="off">
                    @else
                        <input id="skill_id" type="hidden" name="skill_id">
                        <input id="skill_Inp" type="text" class="form-control dropdown-toggle" 
                        data-id="" data-trigger="0" data-bs-toggle="dropdown" aria-expanded="true" placeholder="Search Topic" autocomplete="off">
                    @endif
                    <button class="btn btn-sm bg-label-primary border-primary text-uppercase ms-2" style="white-space: pre;" data-bs-toggle="modal" data-bs-target="#newSkillsModal">New Topic</button>
                    <ul id="skill_Dropdown" class="dropdown-menu w-100 p-0 overflow-auto">
                        <li class="dropdown-item text-center text-light" id="start_search">
                            Start typing to search.
                        </li>
                    </ul>
                </div>
            </div>


            <div class="form-group my-4">
                <label for="comprehension">Comprehension</label>
                @if(isset($editFlag) && $editFlag)
                    <textarea class="form-control" name="comprehension" id="comprehension" rows="4">{!! str_replace('</p>', '', str_replace('<p>', '', $question['comprehension'])) !!}</textarea>
                @else
                    <textarea class="form-control" name="comprehension" id="comprehension" rows="4"></textarea>
                @endif
            </div>
            
            <div class="form-group my-4">
                <label for="question">Question</label>
                @if(isset($editFlag) && $editFlag)
                    <textarea class="form-control" name="question" id="question" rows="4">{!! $question['question'] !!}</textarea>
                @else
                    <textarea class="form-control" name="question" id="question" rows="4"></textarea>
                @endif
            </div>

            @if($questionType['code'] == 'MSA')
                @if(isset($editFlag) && $editFlag)
                    <div class="bg-label-success px-3 py-1 rounded-3 text-dark">
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
                    <div class="bg-label-success px-3 py-1 rounded-3 text-dark">
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
                <div class="bg-label-success px-3 py-1 rounded-3 text-dark">
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
                <div class="bg-label-success px-3 py-1 rounded-3 text-dark">
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
                <div class="bg-label-success px-3 py-1 rounded-3 text-dark">
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
                <div class="bg-label-success px-3 py-1 rounded-3 text-dark">
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
                <div class="bg-label-success px-3 py-1 rounded-3 text-dark">
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
                <div class="bg-label-success px-3 py-1 rounded-3 text-dark">    
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
<!-- subtopic -->
            
            <div class="form-group my-4">
                <label for="topic" class="form-label">Sub-topic</label>
                <div class="d-flex">
                    <select class="form-control" id="topic" placeholder="Select Sub-topic">
                        <option value="">Select a sub-topic</option>
                        @foreach($initialTopics as $topic)
                            @if(isset($topic_id['id']) && $topic_id['id'] == $topic['id'])
                                <option value="{{$topic['id']}}" selected="selected">{{$topic['name']}}</option>
                            @else
                                <option value="{{$topic['id']}}">{{$topic['name']}}</option>
                            @endif
                        @endforeach
                    </select> 
                    <button class="btn btn-sm bg-label-primary border-primary text-uppercase ms-2" style="white-space: pre;" data-bs-toggle="modal" data-bs-target="#newTopicModal">New Sub-Topic</button>
                </div>
            </div>  
<!-- end subtopic -->


<!-- tag -->
            <div class="form-group my-4">
                <label for="tag" class="form-label">Tag</label>
                <div class="d-flex align-items-center">
                    <div class="w-100">
                        <select class="form-control" id="tag" placeholder="Select a Tag" multiple>
                            @foreach($initialTags as $tag)
                                <option value="{{$tag['name']}}">{{$tag['name']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button class="btn btn-sm bg-label-primary border-primary text-uppercase ms-2 h-100" style="white-space: pre;" data-bs-toggle="modal" data-bs-target="#newTagModal">new tag</button>
                </div>
            </div>
<!-- end tag -->

            <div class="form-group my-4">
                <label for="difficultyLevel" class="form-label">Difficulty Level</label>
                <select class="form-control" id="difficultyLevel">
                    @foreach($difficultyLevels as $difficultyLevel)
                        @if($difficultyLevel['id'] == 2)
                            <option value="{{$difficultyLevel['id']}}" selected>{{$difficultyLevel['name']}}</option>
                        @else
                            <option value="{{$difficultyLevel['id']}}">{{$difficultyLevel['name']}}</option>
                        @endif
                    @endforeach
                </select> 
            </div>

            <div class="form-group my-4">
                <label for="marks_points">Default Marks/Grade Points</label>
                <input type="number" class="form-control" name="marks_points" id="marks_points" value="1">
            </div>

            <div class="form-group my-4">
                <label for="time_to_solve">Default Time To Solve (Seconds)</label>
                <input type="number" class="form-control" name="time_to_solve" id="time_to_solve" value="60">
            </div>


            <div class="form-group my-4">
                <label for="solution">Solution</label>
                <textarea class="form-control" name="solution" id="solution" rows="4" placeholder="Enter solution">{!! $question['solution'] !!}</textarea>
            </div>

            <div class="justify-content-between align-items-center mb-4 custom-inp-group">
                <div>Enable Solution Video</div>
                <div>
                    <input id="enableSolutionVideo" class="inp allowDropdown showOnYes" value="false" type="hidden">
                    <span class="btn border rounded-0 radio_selector yes_selector">Yes</span>
                    <span class="btn border rounded-0 radio_selector no_selector active">No</span>
                </div>
            </div>
            <div id="enableSolutionVideoSection" class="d-none justify-content-between align-items-center mb-4">

                <div class="justify-content-between align-items-center mb-4 custom-inp-group">
                    <div>Video Type (Supported YouTube, Vimeo)</div>
                    <div id="videoTypeWrap">
                        <input id="videoType" class="inp" value="youtube" type="hidden">
                        <span class="btn border rounded-0 radio_selector videoTypeSelector active" data-video-type="youtube">YouTube Video</span>
                        <span class="btn border rounded-0 radio_selector videoTypeSelector" data-video-type="vimeo">Vimeo Video</span>
                    </div>
                </div>

                
                
                <div>
                    Video ID
                </div>
                <div>
                    <div class="input-group border rounded">
                        <input id="videoId" type="text" class="inp border-0 form-control">
                        <div class="input-group-append">
                            <button class="bg-label-primary btn px-3 py-0 rounded-0 h-100" id="videoPreviewBtn">
                                <svg fill="#696bfc" style="height:auto;" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
                                    viewBox="0 0 60 60" xml:space="preserve">
                                    <g>
                                        <path d="M45.563,29.174l-22-15c-0.307-0.208-0.703-0.231-1.031-0.058C22.205,14.289,22,14.629,22,15v30
                                            c0,0.371,0.205,0.711,0.533,0.884C22.679,45.962,22.84,46,23,46c0.197,0,0.394-0.059,0.563-0.174l22-15
                                            C45.836,30.64,46,30.331,46,30S45.836,29.36,45.563,29.174z M24,43.107V16.893L43.225,30L24,43.107z"/>
                                        <path d="M30,0C13.458,0,0,13.458,0,30s13.458,30,30,30s30-13.458,30-30S46.542,0,30,0z M30,58C14.561,58,2,45.439,2,30
                                            S14.561,2,30,2s28,12.561,28,28S45.439,58,30,58z"/>
                                    </g>
                                </svg>
                                Preview
                            </button>
                        </div>
                    </div>

                    <div id="videoError" class="font-size-13 my-2 text-danger"></div>
                    <iframe id="videoPreview" class="w-100 h-px-350 mt-4" src="" frameborder="0" style="display:none;"></iframe>
                </div>
            </div>

            <div class="form-group my-4">
                <label for="hint">Hint</label>
                <textarea class="form-control" name="hint" id="hint" rows="4" placeholder="Enter hint">{!! $question['hint'] !!}</textarea>
            </div>

            <div class="justify-content-between align-items-center mb-4 custom-inp-group">
                <div>Enable Question Attachment</div>
                <div>
                    <input id="enableAttachment" class="inp allowDropdown showOnYes" value="false" type="hidden">
                    <span class="btn border rounded-0 radio_selector yes_selector">Yes</span>
                    <span class="btn border rounded-0 radio_selector no_selector active">No</span>
                </div>
            </div>

            <div id="enableAttachmentSection" class="d-none justify-content-between align-items-center mb-4">
                <div class="d-inline-flex">
                    <div class="me-2">
                        <input class="cursor-pointer attachment_type" type="radio" id="comprehension2" name="attachment_type" value="comprehension">
                        <label class="cursor-pointer" for="comprehension2">Comprehension Passage</label>
                    </div>
                    <div class="me-2">
                        <input class="cursor-pointer attachment_type" type="radio" id="video" name="attachment_type" value="video">
                        <label class="cursor-pointer" for="video">Video</label>
                    </div>
                </div>
                <div class="attachment_type_sections" style="display:none;" id="comprehensionSection"> 
                    <div class="form-group my-4">
                        <label for="initialComprehensions" class="form-label">Comprehension Passage</label>
                        <select class="form-control" id="initialComprehensions">
                            @foreach($initialComprehensions as $comprehension)
                                <option value="{{$comprehension['id']}}">{{$comprehension['title']}}</option>
                            @endforeach
                        </select> 
                    </div>
                </div>
                <div class="attachment_type_sections" style="display:none;" id="videoSection">
                    <div class="justify-content-between align-items-center my-4 custom-inp-group">
                        <div>Video Type (Supported YouTube, Vimeo)</div>
                        <div id="videoTypeWrap">
                            <input id="attachmentVideoType" class="inp" value="youtube" type="hidden">
                            <span class="btn border rounded-0 radio_selector videoTypeSelector active" data-video-type="youtube">YouTube Video</span>
                            <span class="btn border rounded-0 radio_selector videoTypeSelector" data-video-type="vimeo">Vimeo Video</span>
                        </div>
                    </div>

                    <div class="my-4">
                        <div>
                            Video ID
                        </div>
                        <div>
                            <div class="input-group border rounded">
                                <input id="attachmentVideoId" type="text" class="inp border-0 form-control">
                                <div class="input-group-append">
                                    <button class="bg-label-primary btn px-3 py-0 rounded-0 h-100" id="videoPreviewBtn">
                                        <svg fill="#696bfc" style="height:auto;" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
                                            viewBox="0 0 60 60" xml:space="preserve">
                                            <g>
                                                <path d="M45.563,29.174l-22-15c-0.307-0.208-0.703-0.231-1.031-0.058C22.205,14.289,22,14.629,22,15v30
                                                    c0,0.371,0.205,0.711,0.533,0.884C22.679,45.962,22.84,46,23,46c0.197,0,0.394-0.059,0.563-0.174l22-15
                                                    C45.836,30.64,46,30.331,46,30S45.836,29.36,45.563,29.174z M24,43.107V16.893L43.225,30L24,43.107z"/>
                                                <path d="M30,0C13.458,0,0,13.458,0,30s13.458,30,30,30s30-13.458,30-30S46.542,0,30,0z M30,58C14.561,58,2,45.439,2,30
                                                    S14.561,2,30,2s28,12.561,28,28S45.439,58,30,58z"/>
                                            </g>
                                        </svg>
                                        Preview
                                    </button>
                                </div>
                            </div>

                            <div id="videoError" class="font-size-13 my-2 text-danger"></div>
                            <iframe id="videoPreview" class="w-100 h-px-350 mt-4" src="" frameborder="0" style="display:none;"></iframe>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mb-4 row">
                <div class="col-12 col-sm-8">
                    <div id="allowActiveText" class="h6 mb-1 text-dark">
                        @if($question['is_active'])
                            Active
                        @else
                            In-Active
                        @endif
                    </div>
                    <div class="lh-1 font-size-13">Active (Shown Everywhere). In-active (Hidden Everywhere).</div>
                </div>
                <div class="col-12 col-sm-4 d-flex align-items-center justify-content-sm-end">
                    <label class="switch mt-2">
                        @if($editFlag && $question['is_active'])
                            <input id="allowActive" type="checkbox" checked>
                        @else
                            <input id="allowActive" type="checkbox">
                        @endif
                        <span class="slider round"></span>
                    </label>
                </div>
            </div>

            <div class="mb-4 row">
                <div class="col-12 col-sm-8">
                    <div id="" class="h6 mb-1 text-dark">
                        Approve Status
                    </div>
                    <div class="lh-1 font-size-13">Approved (Shown Everywhere). Not Approved (Hidden Everywhere).</div>
                </div>
                <div class="col-12 col-sm-4 d-flex align-items-center justify-content-sm-end">
                    <label class="switch mt-2">
                        @if($editFlag && $question['approve_status'])
                            <input id="approveStatus" type="checkbox" checked>
                        @else
                            <input id="approveStatus" type="checkbox">
                        @endif
                        <span class="slider round"></span>
                    </label>
                </div>
            </div>

            <div class="my-4 text-end">
                <div id="formError" class="font-size-13 mb-2 text-danger"></div>
                <button id="proceedForm" class="btn btn-primary">Save & Proceed</button>
            </div>

        </div>
    </div>
    <!-- new skill Modal  -->
    <div class="modal fade" id="newSkillsModal" aria-labelledby="modalToggleLabel" 
    tabindex="-1" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-dark" id="modalToggleLabel">Create New Topic</h5>
                    <button type="button" id="closeNewUser" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-input">
                        <div class="my-4">
                            <label>New Topic Name</label>
                            <input type="text" class="form-control mt-3" id="newSkillsName">
                            <span id="newSkillsName_error" class="text-danger small d-none"></span>
                        </div>
    
                        <div class="my-4">
                            <label>Subject</label>
                            <select class="form-select mt-3 bg-transparent" id="selectNewSkills">
                            @foreach($sections as $section)
                                    <option value="{{$section['id']}}">{{$section['name']}}</option>
                                @endforeach
                            </select>
                            <span id="selectNewSkills_error" class="text-danger small d-none"></span>
                        </div>
    
                        <div class="my-4">
                            <label>Short Description</label>
                            <textarea name="description" cols="40" rows="2" class="text_area_div my-3 form-control"
                                style="max-height: 100px;" id="newDescription"></textarea>
                        </div>
                    
                        <div class="my-4">
                            <div class="row m-0 align-items-center justify-content-between">
                                <div class="col-10">
                                    <label for="name" class="text_black font_bold ">
                                        <!-- printing -->
                                        <span class="active_inactive_text">Active</span>
                                    </label>
                                    <p class="my-2"><b>Active</b> (Shown Everywhere). <b>In-active</b> (Hidden
                                        Everywhere).</p>
                                </div>
                                <div class="col-2 ">
                                    <div class="form-check form-switch text-center">
                                        <input class="form-check-input shadow-none border border-dark btn-lg" type="checkbox" role="switch"
                                            id="active_inactive_switch" checked>
                                    </div>
                                </div>
                            </div>
                        </div>
                
                    </div>
                </div>

                <div class="modal-footer">
                    <div class="w-100 text-end">
                        <div class="mb-1 font-size-13 text-danger" id="NewTagFormError"></div>
                        <button class="btn btn-primary" id="createNewSkill">Create</button>
                    </div>
                </div>

            </div>
        </div>
    </div>

     <!-- new skill Modal  -->
     <div class="modal fade" id="newTopicModal" aria-labelledby="modalToggleLabel" tabindex="-1" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-dark" id="modalToggleLabel">Create New Sub-topic</h5>
                    <button type="button" id="closeNewUser" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-input">
                        <div class="my-4">
                            <label>New Sub-topic Name</label>
                            <input type="text" class="form-control mt-3" id="newTopicName">
                            <span id="newTopicName_error" class="text-danger small d-none"></span>
                        </div>

                        <div class="my-4">
                            <label>Topics</label>
                            <select class="form-select mt-3 bg-transparent" id="selectTopic">
                              
                                @foreach($skills as $skill)
                                    <option value="{{$skill['id']}}">{{$skill['name']}}</option>
                                @endforeach
                            </select>
                            <span id="selectTopic_error" class="text-danger small d-none"></span>
                        </div>

                        <div class="my-4">
                            <label>Description</label>
                            <textarea name="description" cols="40" rows="2" class="text_area_div my-3 form-control"
                                style="max-height: 100px;" id="newDescription"></textarea>
                        </div>

                        <div class="my-4">
                            <div class="row m-0 align-items-center justify-content-between">
                                <div class="col-10">
                                    <label for="name" class="text_black font_bold ">
                                        <!-- printing -->
                                        <span class="active_inactive_text">Active</span>
                                    </label>
                                    <p class="my-2"><b>Active</b> (Shown Everywhere). <b>In-active</b> (Hidden
                                        Everywhere).</p>
                                </div>
                                <div class="col-2 ">
                                    <div class="form-check form-switch text-center">
                                        <input class="form-check-input shadow-none border border-dark btn-lg"
                                            type="checkbox" role="switch" id="active_inactive_switch" checked>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <div class="w-100 text-end">
                        <div class="mb-1 font-size-13 text-danger" id="NewTagFormError"></div>
                        <button class="btn btn-primary" id="createNewTopic">Create</button>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- create new tag modal  -->
    <div class="modal fade" id="newTagModal" aria-labelledby="modalToggleLabel" tabindex="-1" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="modalToggleLabel">Create New Tag</h5>
                <button type="button" id="closeNewUser" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-input">
                <div class="my-4">
                    <label>Tag Name</label>
                    <input type="text" class="form-control mt-3" id="newTagName">
                    <span id="newTagname_error" class="text-danger small d-none"></span>
                </div>

                <div class="my-4">
                    <div class="row m-0 align-items-center justify-content-between">
                    <div class="col-10">
                        <label for="name" class="text_black font_bold ">
                        <!-- printing -->
                        <span class="active_inactive_text">Active</span>
                        </label>
                        <p class="my-2"><b>Active</b> (Shown Everywhere). <b>In-active</b> (Hidden
                        Everywhere).</p>
                    </div>
                    <div class="col-2 ">
                        <div class="form-check form-switch text-center">
                        <input class="form-check-input shadow-none border border-dark btn-lg" type="checkbox" role="switch" id="active_inactive_switch" checked>
                        </div>
                    </div>
                    </div>
                </div>

                </div>
            </div>

            <div class="modal-footer">
                <div class="w-100 text-end">
                <div class="mb-1 font-size-13 text-danger" id="NewTagFormError"></div>
                <button class="btn btn-primary" id="createNewTag">Create</button>
                </div>
            </div>
            </div>
        </div>
    </div>


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
                let has_attachment = /^true$/i.test($("#enableAttachment").val());
                let attachment_comprehension_id = $("#initialComprehensions").val();
                let attachment_type = $('.attachment_type[name=attachment_type]:checked').val()?$('.attachment_type[name=attachment_type]:checked').val():null;
                let attachment_options = null;
                let attachmentVideoType = $("#attachmentVideoType").val();
                let attachmentVideoId = $("#attachmentVideoId").val().trim();
                if(attachment_type && attachment_type == 'video'){
                    attachment_options = {video_type: attachmentVideoType, link: attachmentVideoId}
                }
                let solution = $("#solution").val()?"<p>"+$("#solution").val()+"</p>\n":"";
                let hint = $("#hint").val()?"<p>"+$("#hint").val()+"</p>\n":"";
                let enableSolutionVideo = /^true$/i.test($("#enableSolutionVideo").val());
                let solution_video = {
                    video_type: $("#videoTypeWrap").find(".active").data("video-type"), 
                    link: $("#videoId").val()
                }
                let topic = $("#topic").val()?$("#topic").val():null;
                let tag = $("#tag").val()?$("#tag").val():null;
                let difficultyLevel = $("#difficultyLevel").val();
                let marks_points = $("#marks_points").val();
                let time_to_solve = $("#time_to_solve").val();
                let allowActive = $('#allowActive').is(':checked');
                let approveStatus = $('#approveStatus').is(':checked');
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
                        if(difficultyLevel){
                            if(marks_points){
                                if(time_to_solve){
                                    if(enableSolutionVideo && !solution_video.link){
                                        $("#videoError").text("Video id field is required when solution video is enabled");
                                    } else {
                                        if(has_attachment && attachment_type == 'video' && !attachmentVideoId){
                                            $("#videoError").text("Video id field is required when solution video is enabled");
                                        } else {
                                            var url;
                                            var method;
                                            if(issetEditFlag && editFlag){
                                                url = '/admin/questions/'+questionId+'/approve';
                                                method = "POST";
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
                                                    "default_marks": parseInt(marks_points),
                                                    "default_time": parseInt(time_to_solve),
                                                    "difficulty_level_id": parseInt(difficultyLevel),
                                                    "is_active": allowActive,
                                                    "approve_status": approveStatus,
                                                    "tags": tag,
                                                    "topic_id": topic?parseInt(topic):null,
                                                    "hint": hint,
                                                    "solution": solution,
                                                    "solution_has_video": enableSolutionVideo,
                                                    "solution_video": solution_video,
                                                    "attachment_options": attachment_options,
                                                    "attachment_type": attachment_type,
                                                    "comprehension_id": attachment_comprehension_id,
                                                    "has_attachment": has_attachment,
                                                    _token: '{{ csrf_token() }}'
                                                },
                                                success: function(data) {
                                                    let by_approve = {!! str_replace("'", "\'", json_encode(!request()->has('by_approve') && request()->input('by_approve') != 'true')) !!};
                                                    if(!by_approve){
                                                        window.location.href = "/admin/approve-questions?by_approve=true";
                                                    } else {
                                                        window.location.href = "/admin/questions";
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
                                    }
                                } else {
                                    $("#formError").text("Time to solve field is required, please enter time to solve field");
                                }
                            } else{
                                $("#formError").text("Default points field is required, please enter default points field");
                            }
                        } else {
                            $("#formError").text("Difficulty Level field is required, please select difficulty level field");    
                        }
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
                let has_attachment = /^true$/i.test($("#enableAttachment").val());
                let attachment_comprehension_id = $("#initialComprehensions").val();
                let attachment_type = $('.attachment_type[name=attachment_type]:checked').val()?$('.attachment_type[name=attachment_type]:checked').val():null;
                let attachment_options = null;
                let attachmentVideoType = $("#attachmentVideoType").val();
                let attachmentVideoId = $("#attachmentVideoId").val().trim();
                if(attachment_type && attachment_type == 'video'){
                    attachment_options = {video_type: attachmentVideoType, link: attachmentVideoId}
                }
                let solution = $("#solution").val()?"<p>"+$("#solution").val()+"</p>\n":"";
                let hint = $("#hint").val()?"<p>"+$("#hint").val()+"</p>\n":"";
                let enableSolutionVideo = /^true$/i.test($("#enableSolutionVideo").val());
                let solution_video = {
                    video_type: $("#videoTypeWrap").find(".active").data("video-type"), 
                    link: $("#videoId").val()
                }
                let topic = $("#topic").val()?$("#topic").val():null;
                let tag = $("#tag").val()?$("#tag").val():null;
                let difficultyLevel = $("#difficultyLevel").val();
                let marks_points = $("#marks_points").val();
                let time_to_solve = $("#time_to_solve").val();
                let allowActive = $('#allowActive').is(':checked');
                let approveStatus = $('#approveStatus').is(':checked');
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
                        if(difficultyLevel){
                            if(marks_points){
                                if(time_to_solve){
                                    if(enableSolutionVideo && !solution_video.link){
                                        $("#videoError").text("Video id field is required when solution video is enabled");
                                    } else {
                                        if(has_attachment && attachment_type == 'video' && !attachmentVideoId){
                                            $("#videoError").text("Video id field is required when solution video is enabled");
                                        } else {
                                            $(".correct_answer").each(function(i){
                                                if ($(this).is(':checked')) {
                                                    correct_answer.push(++i);
                                                }
                                            });
                                            var url;
                                            var method;
                                            if(issetEditFlag && editFlag){
                                                url = '/admin/questions/'+questionId+'/approve';
                                                method = "POST";
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
                                                    "default_marks": parseInt(marks_points),
                                                    "default_time": parseInt(time_to_solve),
                                                    "difficulty_level_id": parseInt(difficultyLevel),
                                                    "is_active": allowActive,
                                                    "approve_status": approveStatus,
                                                    "tags": tag,
                                                    "topic_id": topic?parseInt(topic):null,
                                                    "hint": hint,
                                                    "solution": solution,
                                                    "solution_has_video": enableSolutionVideo,
                                                    "solution_video": solution_video,
                                                    "attachment_options": attachment_options,
                                                    "attachment_type": attachment_type,
                                                    "comprehension_id": attachment_comprehension_id,
                                                    "has_attachment": has_attachment,
                                                    _token: '{{ csrf_token() }}'
                                                },
                                                success: function(data) {
                                                    let by_approve = {!! str_replace("'", "\'", json_encode(!request()->has('by_approve') && request()->input('by_approve') != 'true')) !!};
                                                    if(!by_approve){
                                                        window.location.href = "/admin/approve-questions?by_approve=true";
                                                    } else {
                                                        window.location.href = "/admin/questions";
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
                                    }
                                } else {
                                    $("#formError").text("Time to solve field is required, please enter time to solve field");
                                }
                            } else{
                                $("#formError").text("Default points field is required, please enter default points field");
                            }
                        } else {
                            $("#formError").text("Difficulty Level field is required, please select difficulty level field");    
                        }
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
                let has_attachment = /^true$/i.test($("#enableAttachment").val());
                let attachment_comprehension_id = $("#initialComprehensions").val();
                let attachment_type = $('.attachment_type[name=attachment_type]:checked').val()?$('.attachment_type[name=attachment_type]:checked').val():null;
                let attachment_options = null;
                let attachmentVideoType = $("#attachmentVideoType").val();
                let attachmentVideoId = $("#attachmentVideoId").val().trim();
                if(attachment_type && attachment_type == 'video'){
                    attachment_options = {video_type: attachmentVideoType, link: attachmentVideoId}
                }
                let solution = $("#solution").val()?"<p>"+$("#solution").val()+"</p>\n":"";
                let hint = $("#hint").val()?"<p>"+$("#hint").val()+"</p>\n":"";
                let enableSolutionVideo = /^true$/i.test($("#enableSolutionVideo").val());
                let solution_video = {
                    video_type: $("#videoTypeWrap").find(".active").data("video-type"), 
                    link: $("#videoId").val()
                }
                let topic = $("#topic").val()?$("#topic").val():null;
                let tag = $("#tag").val()?$("#tag").val():null;
                let difficultyLevel = $("#difficultyLevel").val();
                let marks_points = $("#marks_points").val();
                let time_to_solve = $("#time_to_solve").val();
                let allowActive = $('#allowActive').is(':checked');
                let approveStatus = $('#approveStatus').is(':checked');
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
                        if(difficultyLevel){
                            if(marks_points){
                                if(time_to_solve){
                                    if(enableSolutionVideo && !solution_video.link){
                                        $("#videoError").text("Video id field is required when solution video is enabled");
                                    } else {
                                        if(has_attachment && attachment_type == 'video' && !attachmentVideoId){
                                            $("#videoError").text("Video id field is required when solution video is enabled");
                                        } else {
                                            $(".correct_answer").each(function(i){
                                                if ($(this).is(':checked')) {
                                                    correct_answer.push(++i);
                                                }
                                            });
                                            var url;
                                            var method;
                                            if(issetEditFlag && editFlag){
                                                url = '/admin/questions/'+questionId+'/approve';
                                                method = "POST";
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
                                                    "default_marks": parseInt(marks_points),
                                                    "default_time": parseInt(time_to_solve),
                                                    "difficulty_level_id": parseInt(difficultyLevel),
                                                    "is_active": allowActive,
                                                    "approve_status": approveStatus,
                                                    "tags": tag,
                                                    "topic_id": topic?parseInt(topic):null,
                                                    "hint": hint,
                                                    "solution": solution,
                                                    "solution_has_video": enableSolutionVideo,
                                                    "solution_video": solution_video,
                                                    "attachment_options": attachment_options,
                                                    "attachment_type": attachment_type,
                                                    "comprehension_id": attachment_comprehension_id,
                                                    "has_attachment": has_attachment,
                                                    _token: '{{ csrf_token() }}'
                                                },
                                                success: function(data) {
                                                    let by_approve = {!! str_replace("'", "\'", json_encode(!request()->has('by_approve') && request()->input('by_approve') != 'true')) !!};
                                                    if(!by_approve){
                                                        window.location.href = "/admin/approve-questions?by_approve=true";
                                                    } else {
                                                        window.location.href = "/admin/questions";
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
                                    }
                                } else {
                                    $("#formError").text("Time to solve field is required, please enter time to solve field");
                                }
                            } else{
                                $("#formError").text("Default points field is required, please enter default points field");
                            }
                        } else {
                            $("#formError").text("Difficulty Level field is required, please select difficulty level field");    
                        }
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
                let has_attachment = /^true$/i.test($("#enableAttachment").val());
                let attachment_comprehension_id = $("#initialComprehensions").val();
                let attachment_type = $('.attachment_type[name=attachment_type]:checked').val()?$('.attachment_type[name=attachment_type]:checked').val():null;
                let attachment_options = null;
                let attachmentVideoType = $("#attachmentVideoType").val();
                let attachmentVideoId = $("#attachmentVideoId").val().trim();
                if(attachment_type && attachment_type == 'video'){
                    attachment_options = {video_type: attachmentVideoType, link: attachmentVideoId}
                }
                let solution = $("#solution").val()?"<p>"+$("#solution").val()+"</p>\n":"";
                let hint = $("#hint").val()?"<p>"+$("#hint").val()+"</p>\n":"";
                let enableSolutionVideo = /^true$/i.test($("#enableSolutionVideo").val());
                let solution_video = {
                    video_type: $("#videoTypeWrap").find(".active").data("video-type"), 
                    link: $("#videoId").val()
                }
                let topic = $("#topic").val()?$("#topic").val():null;
                let tag = $("#tag").val()?$("#tag").val():null;
                let difficultyLevel = $("#difficultyLevel").val();
                let marks_points = $("#marks_points").val();
                let time_to_solve = $("#time_to_solve").val();
                let allowActive = $('#allowActive').is(':checked');
                let approveStatus = $('#approveStatus').is(':checked');
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
                        if(difficultyLevel){
                            if(marks_points){
                                if(time_to_solve){
                                    if(enableSolutionVideo && !solution_video.link){
                                        $("#videoError").text("Video id field is required when solution video is enabled");
                                    } else {
                                        if(has_attachment && attachment_type == 'video' && !attachmentVideoId){
                                            $("#videoError").text("Video id field is required when solution video is enabled");
                                        } else {
                                            var url;
                                            var method;
                                            if(issetEditFlag && editFlag){
                                                url = '/admin/questions/'+questionId+'/approve';
                                                method = "POST";
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
                                                    "default_marks": parseInt(marks_points),
                                                    "default_time": parseInt(time_to_solve),
                                                    "difficulty_level_id": parseInt(difficultyLevel),
                                                    "is_active": allowActive,
                                                    "approve_status": approveStatus,
                                                    "tags": tag,
                                                    "topic_id": topic?parseInt(topic):null,
                                                    "hint": hint,
                                                    "solution": solution,
                                                    "solution_has_video": enableSolutionVideo,
                                                    "solution_video": solution_video,
                                                    "attachment_options": attachment_options,
                                                    "attachment_type": attachment_type,
                                                    "comprehension_id": attachment_comprehension_id,
                                                    "has_attachment": has_attachment,
                                                    _token: '{{ csrf_token() }}'
                                                },
                                                success: function(data) {
                                                    let by_approve = {!! str_replace("'", "\'", json_encode(!request()->has('by_approve') && request()->input('by_approve') != 'true')) !!};
                                                    if(!by_approve){
                                                        window.location.href = "/admin/approve-questions?by_approve=true";
                                                    } else {
                                                        window.location.href = "/admin/questions";
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
                                    }
                                } else {
                                    $("#formError").text("Time to solve field is required, please enter time to solve field");
                                }
                            } else{
                                $("#formError").text("Default points field is required, please enter default points field");
                            }
                        } else {
                            $("#formError").text("Difficulty Level field is required, please select difficulty level field");    
                        }
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
                let has_attachment = /^true$/i.test($("#enableAttachment").val());
                let attachment_comprehension_id = $("#initialComprehensions").val();
                let attachment_type = $('.attachment_type[name=attachment_type]:checked').val()?$('.attachment_type[name=attachment_type]:checked').val():null;
                let attachment_options = null;
                let attachmentVideoType = $("#attachmentVideoType").val();
                let attachmentVideoId = $("#attachmentVideoId").val().trim();
                if(attachment_type && attachment_type == 'video'){
                    attachment_options = {video_type: attachmentVideoType, link: attachmentVideoId}
                }
                let solution = $("#solution").val()?"<p>"+$("#solution").val()+"</p>\n":"";
                let hint = $("#hint").val()?"<p>"+$("#hint").val()+"</p>\n":"";
                let enableSolutionVideo = /^true$/i.test($("#enableSolutionVideo").val());
                let solution_video = {
                    video_type: $("#videoTypeWrap").find(".active").data("video-type"), 
                    link: $("#videoId").val()
                }
                let topic = $("#topic").val()?$("#topic").val():null;
                let tag = $("#tag").val()?$("#tag").val():null;
                let difficultyLevel = $("#difficultyLevel").val();
                let marks_points = $("#marks_points").val();
                let time_to_solve = $("#time_to_solve").val();
                let allowActive = $('#allowActive').is(':checked');
                let approveStatus = $('#approveStatus').is(':checked');
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
                        if(difficultyLevel){
                            if(marks_points){
                                if(time_to_solve){
                                    if(enableSolutionVideo && !solution_video.link){
                                        $("#videoError").text("Video id field is required when solution video is enabled");
                                    } else {
                                        if(has_attachment && attachment_type == 'video' && !attachmentVideoId){
                                            $("#videoError").text("Video id field is required when solution video is enabled");
                                        } else {
                                            var url;
                                            var method;
                                            if(issetEditFlag && editFlag){
                                                url = '/admin/questions/'+questionId+'/approve';
                                                method = "POST";
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
                                                    "default_marks": parseInt(marks_points),
                                                    "default_time": parseInt(time_to_solve),
                                                    "difficulty_level_id": parseInt(difficultyLevel),
                                                    "is_active": allowActive,
                                                    "approve_status": approveStatus,
                                                    "tags": tag,
                                                    "topic_id": topic?parseInt(topic):null,
                                                    "hint": hint,
                                                    "solution": solution,
                                                    "solution_has_video": enableSolutionVideo,
                                                    "solution_video": solution_video,
                                                    "attachment_options": attachment_options,
                                                    "attachment_type": attachment_type,
                                                    "comprehension_id": attachment_comprehension_id,
                                                    "has_attachment": has_attachment,
                                                    _token: '{{ csrf_token() }}'
                                                },
                                                success: function(data) {
                                                    let by_approve = {!! str_replace("'", "\'", json_encode(!request()->has('by_approve') && request()->input('by_approve') != 'true')) !!};
                                                    if(!by_approve){
                                                        window.location.href = "/admin/approve-questions?by_approve=true";
                                                    } else {
                                                        window.location.href = "/admin/questions";
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
                                    }
                                } else {
                                    $("#formError").text("Time to solve field is required, please enter time to solve field");
                                }
                            } else{
                                $("#formError").text("Default points field is required, please enter default points field");
                            }
                        } else {
                            $("#formError").text("Difficulty Level field is required, please select difficulty level field");    
                        }
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
                let has_attachment = /^true$/i.test($("#enableAttachment").val());
                let attachment_comprehension_id = $("#initialComprehensions").val();
                let attachment_type = $('.attachment_type[name=attachment_type]:checked').val()?$('.attachment_type[name=attachment_type]:checked').val():null;
                let attachment_options = null;
                let attachmentVideoType = $("#attachmentVideoType").val();
                let attachmentVideoId = $("#attachmentVideoId").val().trim();
                if(attachment_type && attachment_type == 'video'){
                    attachment_options = {video_type: attachmentVideoType, link: attachmentVideoId}
                }
                let solution = $("#solution").val()?"<p>"+$("#solution").val()+"</p>\n":"";
                let hint = $("#hint").val()?"<p>"+$("#hint").val()+"</p>\n":"";
                let enableSolutionVideo = /^true$/i.test($("#enableSolutionVideo").val());
                let solution_video = {
                    video_type: $("#videoTypeWrap").find(".active").data("video-type"), 
                    link: $("#videoId").val()
                }
                let topic = $("#topic").val()?$("#topic").val():null;
                let tag = $("#tag").val()?$("#tag").val():null;
                let difficultyLevel = $("#difficultyLevel").val();
                let marks_points = $("#marks_points").val();
                let time_to_solve = $("#time_to_solve").val();
                let allowActive = $('#allowActive').is(':checked');
                let approveStatus = $('#approveStatus').is(':checked');
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
                        if(difficultyLevel){
                            if(marks_points){
                                if(time_to_solve){
                                    if(enableSolutionVideo && !solution_video.link){
                                        $("#videoError").text("Video id field is required when solution video is enabled");
                                    } else {
                                        if(has_attachment && attachment_type == 'video' && !attachmentVideoId){
                                            $("#videoError").text("Video id field is required when solution video is enabled");
                                        } else {
                                            var url;
                                            var method;
                                            if(issetEditFlag && editFlag){
                                                url = '/admin/questions/'+questionId+'/approve';
                                                method = "POST";
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
                                                    "default_marks": parseInt(marks_points),
                                                    "default_time": parseInt(time_to_solve),
                                                    "difficulty_level_id": parseInt(difficultyLevel),
                                                    "is_active": allowActive,
                                                    "approve_status": approveStatus,
                                                    "tags": tag,
                                                    "topic_id": topic?parseInt(topic):null,
                                                    "hint": hint,
                                                    "solution": solution,
                                                    "solution_has_video": enableSolutionVideo,
                                                    "solution_video": solution_video,
                                                    "attachment_options": attachment_options,
                                                    "attachment_type": attachment_type,
                                                    "comprehension_id": attachment_comprehension_id,
                                                    "has_attachment": has_attachment,
                                                    _token: '{{ csrf_token() }}'
                                                },
                                                success: function(data) {
                                                    let by_approve = {!! str_replace("'", "\'", json_encode(!request()->has('by_approve') && request()->input('by_approve') != 'true')) !!};
                                                    if(!by_approve){
                                                        window.location.href = "/admin/approve-questions?by_approve=true";
                                                    } else {
                                                        window.location.href = "/admin/questions";
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
                                    }
                                } else {
                                    $("#formError").text("Time to solve field is required, please enter time to solve field");
                                }
                            } else{
                                $("#formError").text("Default points field is required, please enter default points field");
                            }
                        } else {
                            $("#formError").text("Difficulty Level field is required, please select difficulty level field");    
                        }
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
                let has_attachment = /^true$/i.test($("#enableAttachment").val());
                let attachment_comprehension_id = $("#initialComprehensions").val();
                let attachment_type = $('.attachment_type[name=attachment_type]:checked').val()?$('.attachment_type[name=attachment_type]:checked').val():null;
                let attachment_options = null;
                let attachmentVideoType = $("#attachmentVideoType").val();
                let attachmentVideoId = $("#attachmentVideoId").val().trim();
                if(attachment_type && attachment_type == 'video'){
                    attachment_options = {video_type: attachmentVideoType, link: attachmentVideoId}
                }
                let solution = $("#solution").val()?"<p>"+$("#solution").val()+"</p>\n":"";
                let hint = $("#hint").val()?"<p>"+$("#hint").val()+"</p>\n":"";
                let enableSolutionVideo = /^true$/i.test($("#enableSolutionVideo").val());
                let solution_video = {
                    video_type: $("#videoTypeWrap").find(".active").data("video-type"), 
                    link: $("#videoId").val()
                }
                let topic = $("#topic").val()?$("#topic").val():null;
                let tag = $("#tag").val()?$("#tag").val():null;
                let difficultyLevel = $("#difficultyLevel").val();
                let marks_points = $("#marks_points").val();
                let time_to_solve = $("#time_to_solve").val();
                let allowActive = $('#allowActive').is(':checked');
                let approveStatus = $('#approveStatus').is(':checked');
                let book_id = $("#book").val();
                let skill_id = $("#skill_id").val()?$("#skill_id").val():null;
                let question = "<p>"+$("#question").val()+"</p>\n";
                let preferences = [];
                if(skill_id){
                    if(question){
                        if(difficultyLevel){
                            if(marks_points){
                                if(time_to_solve){
                                    if(enableSolutionVideo && !solution_video.link){
                                        $("#videoError").text("Video id field is required when solution video is enabled");
                                    } else {
                                        if(has_attachment && attachment_type == 'video' && !attachmentVideoId){
                                            $("#videoError").text("Video id field is required when solution video is enabled");
                                        } else {
                                            var url;
                                            var method;
                                            if(issetEditFlag && editFlag){
                                                url = '/admin/questions/'+questionId+'/approve';
                                                method = "POST";
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
                                                    "default_marks": parseInt(marks_points),
                                                    "default_time": parseInt(time_to_solve),
                                                    "difficulty_level_id": parseInt(difficultyLevel),
                                                    "is_active": allowActive,
                                                    "approve_status": approveStatus,
                                                    "tags": tag,
                                                    "topic_id": topic?parseInt(topic):null,
                                                    "hint": hint,
                                                    "solution": solution,
                                                    "solution_has_video": enableSolutionVideo,
                                                    "solution_video": solution_video,
                                                    "attachment_options": attachment_options,
                                                    "attachment_type": attachment_type,
                                                    "comprehension_id": attachment_comprehension_id,
                                                    "has_attachment": has_attachment,
                                                    _token: '{{ csrf_token() }}'
                                                },
                                                success: function(data) {
                                                    let by_approve = {!! str_replace("'", "\'", json_encode(!request()->has('by_approve') && request()->input('by_approve') != 'true')) !!};
                                                    if(!by_approve){
                                                        window.location.href = "/admin/approve-questions?by_approve=true";
                                                    } else {
                                                        window.location.href = "/admin/questions";
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
                                    }
                                } else {
                                    $("#formError").text("Time to solve field is required, please enter time to solve field");
                                }
                            } else{
                                $("#formError").text("Default points field is required, please enter default points field");
                            }
                        } else {
                            $("#formError").text("Difficulty Level field is required, please select difficulty level field");    
                        }
                    } else {
                        $("#formError").text('Please enter a question');    
                    }
                } else {
                    $("#formError").text('Please select a topic from the dropdown list');
                }
            });
        </script>
    @endif
    <script  script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css">
    <script>
        var questionId = {!! str_replace("'", "\'", json_encode($question['id'])) !!};
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
                height: 100,
                toolbar: [
                    ['font', ['bold', 'underline', 'clear']],
                    ['superscript', ['superscript']],
                    ['subscript', ['subscript']],
                    ['strikethrough', ['strikethrough']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['insert', ['link', 'picture']],
                    ['view', ['fullscreen', 'codeview']],
                    ['table', ['table']],
                ],
                callbacks: {
                    onInit: function() {
                        $('.note-toolbar').addClass('custom-toolbar');
                    }
                }
            });
            $('#comprehension').summernote({
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
                    ['view', ['fullscreen', 'codeview']],
                    ['table', ['table']],
                ],
                callbacks: {
                    onInit: function() {
                        $('.note-toolbar').addClass('custom-toolbar');
                    }
                }
            });
            $(".note-btn[aria-label='Table']").click(function() {
                $(".dropdown-menu[aria-label='Table']").toggleClass('d-block top-100');
            });
            $('#solution, #hint').summernote({
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
        });
        var multipleCancelButton = new Choices('#book, #skill, #difficultyLevel, #initialComprehensions', {
            searchEnabled: true,
            shouldSort: false
        });
        var tagButton = new Choices('#tag', {
            searchEnabled: true,
            shouldSort: false
        });
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
        $(".videoTypeSelector").click(function(){
            let type = $(this).data("video-type");
            $(this).siblings(".inp").val(type);
            $("#videoPreview").empty().attr("src", "").hide();
            $("#videoId").val("");
        });
        $(document).on("keyup","#videoId", function(e){
            $("#formError").empty();
            $("#videoError").empty();
        });
        $("#videoPreviewBtn").click(function(){
            let videoId = $("#videoId").val();
            let type = $("#videoType").val();
            var url;
            if (type == "youtube"){
                url = "https://www.youtube.com/embed/"+videoId;
            } else {
                url = "https://player.vimeo.com/video/"+videoId
            }
            if(videoId){
                $("#videoPreview").attr("src", url).show();
            } else {
                $("#videoError").text("Please enter video id");
            }
        });
        $(document).on("change",".attachment_type", function(e){
            let checked = $(this).is(':checked');
            let attachment_type = $(this).val();
            $(".attachment_type_sections").hide();
            if(checked){
                if(attachment_type == "comprehension"){
                    $("#comprehensionSection").show();
                    $("#videoSection").hide();
                } else {
                    $("#videoSection").show();
                    $("#comprehensionSection").hide();
                }
            }
        });
        // select skill 
        $(document).on("click",".select_skill", function(e){
            let selectedSkill = $(this).text().trim();
            let selectedSkillId = $(this).data("id");
            $("#form").attr('action', '/admin/import-questions/'+selectedSkillId);
            $("#form").attr('method', 'POST');
            $("#skill_id").val(selectedSkillId);
            $("#skill_Inp").val(selectedSkill);
            $("#skill_Inp").attr("data-id",selectedSkillId);
            $.ajax({
                type: "POST",
                url: '/admin/questions/'+questionId+'/'+selectedSkillId+'/skill_update',
                data: {
                    "skill_id": selectedSkillId,
                    "id": questionId,
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    console.log(data.initialSubTopics)
                    $("#topic").empty();
                    $("#topic").append('<option value="">Select a sub-topic</option>');
                    data.initialSubTopics.forEach(function (subtopic) {
                        $("#topic").append('<option value="'+subtopic.id+'">'+subtopic.name+'</option>');
                    });
                },
                error: function(data, textStatus, errorThrown) {
                    console.log(textStatus);
                },
            });
        });

        $("#createNewSkill").click(function(){
            let skillName = $("#newSkillsName").val();
            let selectSkills = $("#selectNewSkills").val();
            let skillDescription = $("#newDescription").val();
            let isActive = $("#active_inactive_switch").is(':checked');
            if (skillName == "") {
                $("#newSkillsName").addClass("border-danger");
                $("#newSkillsName_error").removeClass("d-none");
                $("#newSkillsName_error").html("The topic name field is required");
            } else {
                $("#newSkillsName").removeClass("border-danger");
                $("#newSkillsName_error").addClass("d-none");
            }
            if (selectSkills == "") {
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
                    type: "POST",
                    url: '/admin/skills',
                    data: {
                        is_active: isActive,
                        name: skillName,
                        section_id: selectSkills,
                        short_description: skillDescription,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        if(data.success){
                            $('#newSkillsModal').modal('toggle');
                        
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
        });

        $("#createNewTopic").click(function(){
            let topicName = $("#newTopicName").val();
            let selectTopic = $("#selectTopic").val();
            let topicDesc = $("#newDescription").val();
            let IsActive = $("#active_inactive_switch").is(':checked');

            if (topicName == "") {
                $("#newTopicName").addClass("border-danger");
                $("#newTopicName_error").removeClass("d-none");
                $("#newTopicName_error").html("The name field is required");
            } else {
                $("#newTopicName").removeClass("border-danger");
                $("#newTopicName_error").addClass("d-none");
            }

            if (selectTopic == "") {
                $("#selectTopic").addClass("border-danger");
                $("#selectTopic_error").removeClass("d-none");
                $("#selectTopic_error").html("The sub-topic id field is required");
            } else {
                $("#selectTopic").removeClass("border-danger");
                $("#selectTopic_error").addClass("d-none");
            }

            if (topicName && selectTopic) {
                console.log(selectTopic);
                $.ajax({
                    dataType: 'json',
                    type: "POST",
                    url: '/admin/topics',
                    data: {
                        is_active: IsActive,
                        name: topicName,
                        short_description: topicDesc,
                        skill_id: selectTopic,
                        _token:  '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        if(data.success){
                            $('#newTopicModal').modal('toggle');  
                        }
                    },
                    error: function(data, textStatus, errorThrown) {
                        console.log(textStatus);
                    },
                });

                $("#createNewTopic").click(function(){

                    let topicName = $("#newTopicName").val();
                    let selectTopic = $("#selectTopic").val();
                    let topicDesc = $("#newDescription").val();
                    let IsActive = $("#active_inactive_switch").is(':checked');

                    if (topicName == "") {
                        $("#newTopicName").addClass("border-danger");
                        $("#newTopicName_error").removeClass("d-none");
                        $("#newTopicName_error").html("The name field is required");
                    } else {
                        $("#newTopicName").removeClass("border-danger");
                        $("#newTopicName_error").addClass("d-none");
                    }

                    if (selectTopic == "") {
                        $("#selectTopic").addClass("border-danger");
                        $("#selectTopic_error").removeClass("d-none");
                        $("#selectTopic_error").html("The sub-topic id field is required");
                    } else {
                        $("#selectTopic").removeClass("border-danger");
                        $("#selectTopic_error").addClass("d-none");
                    }

                    if (topicName && selectTopic) {
                        console.log(selectTopic);
                        $.ajax({
                            dataType: 'json',
                            type: "POST",
                            url: '/admin/topics',
                            data: {
                                is_active: IsActive,
                                name: topicName,
                                short_description: topicDesc,
                                skill_id: selectTopic,
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
            }    
        });
        $("#createNewTag").click(function(){
            let TagName = $("#newTagName").val();
            let isActive = $("#active_inactive_switch").is(':checked');
            if (TagName == "") {
                $("#newTagName").addClass("border-danger");
                $("#newTagname_error").removeClass("d-none");
                $("#newTagname_error").html("The name field is required");
            } else {
                $("#newTagName").removeClass("border-danger");
                $("#newTagname_error").addClass("d-none");
                $.ajax({
                    dataType: 'json',
                    type: "POST",
                    url: '/admin/tags',
                    data: {
                        is_active: isActive,
                        name: TagName,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        if(data.success){
                            $('#newTagModal').modal('toggle');
                            tagButton.setChoices(
                                    [
                                        { value: TagName, label: TagName, selected: true },
                                    ],
                                    'value',
                                    'label',
                                    false,
                            );
                        }
                    },
                    error: function(data, textStatus, errorThrown) {
                        console.log(textStatus);
                    },
                });
            }
        });
    </script>
</body>

</html>
