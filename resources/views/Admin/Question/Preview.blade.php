<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        Question Setting - {{$questionType['name']}}
    </title>
    <!-- rel icon -->
    <link rel="icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}">
    <meta name="description" content="{{ app(\App\Settings\SiteSettings::class)->seo_description }}">
    <meta name="author" content="{{ app(\App\Settings\SiteSettings::class)->app_name }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
    <script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>

    <style>
        .cursor-not-allowed{cursor:not-allowed !important}
        #start_search:hover,#start_search:active{background: transparent;cursor: default;color: #bcc4cc !important;}
        .font-size-13{font-size:13px;}
        input::-webkit-outer-spin-button,input::-webkit-inner-spin-button {-webkit-appearance: none;margin: 0;}
        input[type=number] {-moz-appearance: textfield;}
        .questionForm{max-width:750px;}
        .choices__inner, .choices__input {background: #fff;}
        .question_inner_image img {
            width: 50%;
            display: block;
        }
    </style>
</head>

<body> 
    @include('sidebar')

    <div class="bg-white rounded py-4 shadow-sm w-100">
        <div class="questionForm m-auto px-3">
            <div class="my-3 bg-body p-3 rounded-1 shadow-sm">
                <div class="d-flex flex-wrap justify-content-between">
                    <div class="alert-primary px-2 rounded shadow-sm mb-3">Code: {{$question['code']}}</div> 
                    <div class="px-2 rounded shadow-sm mb-3 
                    @if($question['status'] == 'Active')
                        bg-label-primary border-primary
                    @else
                        bg-label-danger border-danger
                    @endif
                    ">{{$question['status']}}</div>
                </div>
                <div class="text-uppercase fs-tiny">{{$question['skill']}} <span class="mx-1 text-dark font-size-13">|</span> {{$question['questionType']}}</div>
                <div class="mt-3 text-dark question_inner_image">
                    {!!$question['question']!!}
                </div>
                <div class="mt-4">
                    @if($question['questionTypeCode'] == "MSA")
                        @if($question['options'])
                            @foreach($question['options'] as $key => $option)
                                <div id="option" class="border d-flex mt-2 rounded-1
                                    @if(++$key == $question['correct_answer'])
                                        bg-label-success
                                    @endif
                                ">
                                    <div class="border-end py-1 px-3">
                                        <span style="font-size: 13px;" class="bg-body shadow-sm text-dark px-1 rounded-1">{{$key}}</span>
                                    </div>
                                    <div class="w-100 align-self-center px-2 option text-black"> {!!$option['option']!!} </div>
                                </div>
                            @endforeach
                        @else
                            <div class="text-danger font-size-13">No option found</div>
                        @endif
                    @elseif($question['questionTypeCode'] == "MMA")
                        @if($question['options'])
                            @foreach($question['options'] as $key => $option)
                                <div id="option" class="border d-flex mt-2 rounded-1
                                    @if(in_array(++$key, $question['correct_answer']))
                                        bg-label-success
                                    @endif
                                ">
                                    <div class="border-end py-1 px-3">
                                        <span style="font-size: 13px;" class="bg-body shadow-sm text-dark px-1 rounded-1">{{$key}}</span>
                                    </div>
                                    <div class="w-100 align-self-center px-2 option text-black"> {!!$option['option']!!} </div>
                                </div>
                            @endforeach
                        @else
                            <div class="text-danger font-size-13">No option found</div>
                        @endif
                    @elseif($question['questionTypeCode'] == "TOF")
                        @if($question['options'])
                            @foreach($question['options'] as $key => $option)
                                <div id="option" class="border d-flex mt-2 rounded-1
                                    @if(++$key == $question['correct_answer'][0])
                                        bg-label-success
                                    @endif
                                ">
                                    <div class="border-end py-1 px-3">
                                        <span style="font-size: 13px;" class="bg-body shadow-sm text-dark px-1 rounded-1">{{$key}}</span>
                                    </div>
                                    <div class="w-100 align-self-center px-2 option text-black"> {!!$option['option']!!} </div>
                                </div>
                            @endforeach
                        @else
                            <div class="text-danger font-size-13">No option found</div>
                        @endif
                    @elseif($question['questionTypeCode'] == "SAQ")
                        @if($question['options'])
                            @foreach($question['options'] as $key => $option)
                                <div id="option" class="border d-flex mt-2 rounded-1
                                    @if(++$key == $question['correct_answer'])
                                        bg-label-success
                                    @endif
                                ">
                                    <div class="border-end py-1 px-3">
                                        <span style="font-size: 13px;" class="bg-body shadow-sm text-dark px-1 rounded-1">{{$key}}</span>
                                    </div>
                                    <div class="w-100 align-self-center px-2 option text-black"> {!!$option['option']!!} </div>
                                </div>
                            @endforeach
                        @else
                            <div class="text-danger font-size-13">No option found</div>
                        @endif
                    @elseif($question['questionTypeCode'] == "MTF")
                        @if($question['options'])
                            <div class="row">
                                @foreach($question['options'] as $key => $option)
                                    <div class="col-6">
                                        <div id="option" class="border d-flex mt-2 rounded-1 bg-label-success">
                                            <div class="border-end py-1 px-3">
                                                <span style="font-size: 13px;" class="bg-body shadow-sm text-dark px-1 rounded-1">{{++$key}}</span>
                                            </div>
                                            <div class="w-100 align-self-center px-2 option text-black"> {!!$option['option']!!} </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div id="option" class="border d-flex mt-2 rounded-1 bg-label-success py-1">
                                            <div class="w-100 align-self-center px-2 option text-black"> {!!$option['pair']!!} </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="text-danger font-size-13">No option found</div>
                        @endif
                    @elseif($question['questionTypeCode'] == "ORD")
                    @if($question['options'])
                        @foreach($question['options'] as $key => $option)
                            <div id="option" class="border d-flex mt-2 rounded-1 bg-label-success">
                                <div class="border-end py-1 px-3">
                                    <span style="font-size: 13px;" class="bg-body shadow-sm text-dark px-1 rounded-1">{{++$key}}</span>
                                </div>
                                <div class="w-100 align-self-center px-2 option text-black"> {!!$option['option']!!} </div>
                            </div>
                        @endforeach
                    @else
                        <div class="text-danger font-size-13">No option found</div>
                    @endif
                    @elseif($question['questionTypeCode'] == "FIB")
                    @if(is_array($question['correct_answer']))
                        @foreach($question['correct_answer'] as $key => $correct_answer)
                            <div id="option" class="border d-flex mt-2 rounded-1 bg-label-success">
                                <div class="border-end py-1 px-3">
                                    <span style="font-size: 13px;" class="bg-body shadow-sm text-dark px-1 rounded-1">{{++$key}}</span>
                                </div>
                                <div class="w-100 align-self-center px-2 option">{{$correct_answer}}</div>
                            </div>
                        @endforeach
                    @else
                        {{-- Handle single string answer --}}
                        <div id="option" class="border d-flex mt-2 rounded-1 bg-label-success">
                            <div class="border-end py-1 px-3">
                                <span style="font-size: 13px;" class="bg-body shadow-sm text-dark px-1 rounded-1">1</span>
                            </div>
                            <div class="w-100 align-self-center px-2 option">{{$question['correct_answer']}}</div>
                        </div>
                    @endif
                @else
                        @dd($question)
                    @endif
                </div>
            </div>
        </div>
    </div>
</body>

</html>
