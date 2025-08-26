<!DOCTYPE html>
    <html lang="en">
      <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="{{url('Frontend_css/analysis.css')}}">
        <title>Mastery Level Analysis</title> 
        <style>
            .options p{margin-bottom: 0;}
            .correct_answers p{margin-bottom: 0;display: inline;}
            #text_print{margin-bottom: 0;}
            .font-size-13{font-size:13px;}
        </style>
      </head>
      <body> 
        @include('sidebar') 
        @include('header') 
        <section class="mt-4"> 
            @if (count($questions) > 0)
                <div class="bg-white rounded-3 shadow-3 w-100 p-4">
                    <div id="solution_sec" class="row">
                    <div class="col-md-4 border-end">
                        <div class="nav nav-tabs justify-content-center mb-3 mb-md-0" role="tablist" id="question_nums">
                        @foreach ($questions as $key => $question) 
                            <button class="btn me-2 mt-2 
                            @if ($question['is_correct']) 
                                bg-label-success border-success
                            @else 
                                bg-label-danger border-danger  
                            @endif 
                            " id="question_{{ $key + 1 }}_tab" data-bs-toggle="tab" data-bs-target="#question_{{ $key + 1 }}" type="button" role="tab" aria-controls="question_{{ $key + 1 }}" aria-selected="true">{{ $key + 1 }}</button>
                        @endforeach 
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content rounded-0 p-0" id="question_tab_content">
                            @foreach ($questions as $key => $question) 
                                <div class="tab-pane fade 
                                @if ($key == 0) 
                                    show active
                                @endif 
                                " id="question_{{ $key + 1 }}" role="tabpanel" aria-labelledby="question_{{ $key + 1 }}_tab">
                                    <div class="d-flex justify-content-between">
                                    <div class="alert-primary px-2 rounded shadow-sm">Time Spent: {{$question['time_taken']['detailed_readable']}}</div>
                                    <div class="px-2 rounded shadow-sm 
                                    @if ($question['is_correct']) 
                                        bg-label-success border-success
                                    @else 
                                        bg-label-danger border-danger  
                                    @endif 
                                    " id="question_marks_earned">
                                        @if ($question['is_correct']) 
                                            +{{$question['marks_earned']}} Marks Earned
                                        @else 
                                            -{{$question['marks_deducted']}} Marks Deducted
                                        @endif 
                                    </div>
                                    </div>
                                    <div class="my-3 bg-body p-3 rounded-1 shadow-sm">
                                    <div>
                                        <span class="text-dark">Q{{ $key + 1 }} of {{count($questions)}} | </span>
                                        <span class="text-uppercase fs-tiny">{{$question['skill']}}</span>
                                    </div>
                                    <div class="mt-3 text-dark" id="question_sec_{{ $key + 1 }}">
                                        {!! $question['question'] !!}
                                    </div>
                                    </div>
                                    @if($question['questionType'] == 'FIB')
                                        @foreach ($question['user_answer'] as $Okey => $option)
                                            <div id="option_{{ $key + 1 }}_{{ $Okey + 1 }}" class="border d-flex mt-2 rounded-1
                                            @if($option == $question['ca'][$Okey])
                                                bg-label-success
                                            @else
                                                bg-label-danger
                                            @endif
                                            ">
                                                <div class="border-end py-1 px-3">
                                                    <span style="font-size: 13px;" class="bg-body shadow-sm text-dark px-1 rounded-1">{{ $Okey + 1 }}</span>
                                                </div>
                                                <div class="w-100 align-self-center px-2 options">{{$option}}</div>
                                            </div>
                                        @endforeach
                                        <div class="mt-3 bg-label-success py-2 px-3 border border-success text-black rounded-1">
                                            <svg class="me-1 h-px-20" style="color:#73dd37;" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                            @if(count($question['ca']) > 1)
                                                Correct answers are: 
                                                @foreach ($question['ca'] as $Ckey => $ca)
                                                    <span class="font-size-13 fw-bold text-dark mx-1">Q{{$Ckey + 1 }}.</span> {!!$ca!!}
                                                @endforeach
                                            @else
                                                Correct answer is: {!!$question['ca'][0]!!}
                                            @endif
                                        </div>
                                    @elseif($question['questionType'] == 'MSA')
                                        @foreach ($question['options'] as $Okey => $option) 
                                            <div id="option_{{ $key + 1 }}_{{ $Okey + 1 }}" class="border d-flex mt-2 rounded-1
                                                @if ($Okey+1 == $question['user_answer']) 
                                                    @if ($question['user_answer'] == $question['ca']) 
                                                        bg-label-success
                                                    @else 
                                                        bg-label-danger
                                                    @endif 
                                                @endif 
                                            ">
                                                <div class="border-end py-1 px-3">
                                                    <span style="font-size: 13px;" class="bg-body shadow-sm text-dark px-1 rounded-1">{{ $Okey + 1 }}</span>
                                                </div>
                                                <div class="w-100 align-self-center px-2 options">{!! $option !!}</div>
                                            </div>
                                        @endforeach
                                        <div class="mt-3 bg-label-success py-2 px-3 border border-success text-black rounded-1">
                                            <svg class="me-1 h-px-20" style="color:#73dd37;" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                            Correct option is: {{$question['ca']}}
                                        </div>
                                    @elseif($question['questionType'] == 'MMA')
                                        @foreach ($question['options'] as $Okey => $option)
                                            <div id="option_{{ $key + 1 }}_{{ $Okey + 1 }}" class="border d-flex mt-2 rounded-1
                                                @if(in_array($Okey + 1, $question['user_answer']))
                                                    @if(in_array($Okey + 1, $question['ca']))
                                                        bg-label-success
                                                    @else
                                                        bg-label-danger
                                                    @endif
                                                @endif
                                            ">
                                                <div class="border-end py-1 px-3">
                                                    <span style="font-size: 13px;" class="bg-body shadow-sm text-dark px-1 rounded-1">{{ $Okey + 1 }}</span>
                                                </div>
                                                <div class="w-100 align-self-center px-2 options">{!! $option !!}</div>
                                            </div>
                                        @endforeach
                                        <div class="mt-3 bg-label-success py-2 px-3 border border-success text-black rounded-1">
                                            <svg class="me-1 h-px-20" style="color:#73dd37;" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                            @if(count($question['ca']) > 1)
                                                Correct answers are: 
                                                @foreach ($question['ca'] as $Ckey => $ca)
                                                    <span class="font-size-13 fw-bold text-dark mx-1">Option{{$Ckey + 1 }}.</span> {!!$ca!!}
                                                @endforeach
                                            @else
                                                Correct answer is: {!!$question['ca'][0]!!}
                                            @endif
                                        </div>
                                    @elseif($question['questionType'] == 'TOF')
                                        @foreach ($question['options'] as $Okey => $option) 
                                            <div id="option_{{ $key + 1 }}_{{ $Okey + 1 }}" class="border d-flex mt-2 rounded-1
                                                @if ($Okey+1 == $question['user_answer'])
                                                    @if(is_array($question['ca'])) 
                                                        @if ($Okey+1 == $question['ca'][0]) 
                                                            bg-label-success
                                                        @else 
                                                            bg-label-danger
                                                        @endif 
                                                    @else 
                                                        @if ($Okey+1 == $question['ca']) 
                                                            bg-label-success
                                                        @else 
                                                            bg-label-danger
                                                        @endif 
                                                    @endif    
                                                @endif 
                                            ">
                                                <div class="border-end py-1 px-3">
                                                    <span style="font-size: 13px;" class="bg-body shadow-sm text-dark px-1 rounded-1">{{ $Okey + 1 }}</span>
                                                </div>
                                                <div class="w-100 align-self-center px-2 options">{!! $option !!}</div>
                                            </div>
                                        @endforeach
                                        
                                        <div class="mt-3 bg-label-success py-2 px-3 border border-success text-black rounded-1">
                                            <svg class="me-1 h-px-20" style="color:#73dd37;" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                            <span class="d-inline-flex"><span class="me-1">Correct answer is:</span> <span>
                                                @if(is_array($question['ca'])) 
                                                    {!!$question['options'][$question['ca'][0]-1]!!}
                                                @else
                                                    {!!$question['options'][$question['ca']-1]!!}
                                                @endif
                                            </span></span>
                                        </div>                                        
                                    @elseif($question['questionType'] == 'SAQ')
                                        <div id="option_{{ $key + 1 }}_1" class="border d-flex mt-2 py-2 px-1 rounded-1
                                            @if($question['is_correct'])
                                                bg-label-success
                                            @else
                                                bg-label-danger
                                            @endif
                                        ">
                                            <div class="w-100 align-self-center px-2 options">{!! $question['user_answer'] !!}</div>
                                        </div>
                                        <div class="mt-3 bg-label-success py-2 px-3 border border-success text-black rounded-1">
                                            <svg class="me-1 h-px-20" style="color:#73dd37;" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                            @if(count($question['ca']) > 1)
                                                Correct answers are: 
                                                @foreach ($question['ca'] as $Ckey => $ca)
                                                    <span class="font-size-13 fw-bold text-dark mx-1">Q{{$Ckey + 1 }}.</span> {!!$ca!!}
                                                @endforeach
                                            @else
                                                Correct answer is: {!!$question['ca'][0]!!}
                                            @endif
                                        </div>
                                    @elseif($question['questionType'] == 'MTF')
                                        <div class="row">
                                            <div class="col-6">
                                                @foreach($question['options']['matches'] as $mKey => $match)
                                                    <div id="option_{{ $key + 1 }}_{{ $mKey + 1 }}" class="border d-flex mt-2 rounded-1">
                                                        <div class="border-end py-1 px-3">
                                                            <span style="font-size: 13px;" class="bg-body shadow-sm text-dark px-1 rounded-1">{{ $mKey + 1 }}</span>
                                                        </div>
                                                        <div class="w-100 align-self-center px-2 options">{!! $match['value'] !!}</div>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <div class="col-6">
                                                @foreach($question['user_answer'] as $mKey => $match)
                                                    <div id="option_{{ $key + 1 }}_{{ $mKey + 1 }}" class="border d-flex mt-2 rounded-1
                                                    @if($match['id'] == $question['ca'][$mKey])
                                                        bg-label-success
                                                    @else
                                                        bg-label-danger
                                                    @endif
                                                    ">
                                                        <div class="border-end py-1 px-3">
                                                            <span style="font-size: 13px;" class="bg-body shadow-sm text-dark px-1 rounded-1">{{ $match['code'] }}</span>
                                                        </div>
                                                        <div class="w-100 align-self-center px-2 options">{!! $match['value'] !!}</div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="mt-3 bg-label-success py-2 px-3 border border-success text-black rounded-1">
                                            <svg class="me-1 h-px-20" style="color:#73dd37;" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                            Correct answers are: 
                                            @foreach($question['ca'] as $key => $ca)
                                                @foreach($question['user_answer'] as $user_answer)
                                                    @if($ca == $user_answer['id'])
                                                        <span class="font-size-13 fw-bold text-dark mx-1">Option {{ $key + 1 }}.</span> {{$user_answer['value']}}
                                                    @endif
                                                @endforeach
                                            @endforeach
                                        </div>
                                    @elseif($question['questionType'] == 'ORD')
                                        @foreach($question['user_answer'] as $mKey => $match)
                                            <div id="option_{{ $key + 1 }}_{{ $mKey + 1 }}" class="border d-flex mt-2 rounded-1
                                            @if($match['id'] == $question['ca'][$mKey])
                                                bg-label-success
                                            @else
                                                bg-label-danger
                                            @endif
                                            ">
                                                <div class="border-end py-1 px-3">
                                                    <span style="font-size: 13px;" class="bg-body shadow-sm text-dark px-1 rounded-1">{{ $match['code'] }}</span>
                                                </div>
                                                <div class="w-100 align-self-center px-2 options">{!! $match['value'] !!}</div>
                                            </div>
                                        @endforeach
                                        <div class="mt-3 bg-label-success py-2 px-3 border border-success text-black rounded-1">
                                            <svg class="me-1 h-px-20" style="color:#73dd37;" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                            Correct answers are: 
                                            @foreach($question['ca'] as $key => $ca)
                                                @foreach($question['user_answer'] as $user_answer)
                                                    @if($ca == $user_answer['id'])
                                                        <span class="font-size-13 fw-bold text-dark mx-1">Option {{ $key + 1 }}.</span> {{$user_answer['value']}}
                                                    @endif
                                                @endforeach
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            @endforeach 
                        </div>
                    </div>
                    </div>
                </div>
            @else 
                <div class="card-body bg-label-danger">No Records Found</div> 
            @endif 
        </section>
        
      </body>
    </html>