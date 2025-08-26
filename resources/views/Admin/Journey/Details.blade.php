<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        @if($editFlag)
            Edit Journey - {{$journey['subject']}} 
        @else
            New Journey
        @endif
    </title>
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
        label {color: #000;font-size: 16px;margin-bottom: 10px;}
    </style>
</head>

<body> 
    @include('sidebar')
    @include('header')

    <section class="p-4">

        <div class="bg-white rounded-4 py-4 p-3 shadow my-4">
            <div class="d-flex align-items-center justify-content-between">
                <h1 class="text-dark my-2 h3">
                    @if($editFlag)
                        Edit Journey - {{$journey['subject']}} 
                    @else
                        Creating New Journey
                    @endif
                </h1>
                <button class="btn bg-label-primary border-primary text-primary p-2 px-3" onclick="history.back()"><i class='bx bx-arrow-back'></i><span>Go Back</span></button>
            </div>
        </div>

        @if (Session::has('errorMessage'))
            <div class="alert_failed rounded-3 p-3 d-flex align-items-center my-4"><i class='bx bx-x-circle me-1 fs-5'></i>{{Session::get('errorMessage')}}</div>
        @endif

        <div class="bg-white rounded-4 py-4 p-3 shadow my-4">
            <div class="px-1">
                <div class="progress">
                    <div class="progress-bar w-px-20" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
            <div class="practice_set_form mx-auto">
                @if($editFlag)
                    <form action="{{ route('journey_update', ['id' => $raw_journey->id]) }}" method="POST" enctype="multipart/form-data">
                @else
                    <form action="{{ route('journey_create') }}" method="POST" enctype="multipart/form-data">
                @endif
                @csrf
                    <div class="form-group my-4">
                        <label for="year" class="fw-medium text-dark">Select Year</label>
                        <select name="year" id="year" class="form-select" required>
                            @foreach($years as $key => $year)
                                @if($editFlag)
                                    @if($year['id'] == $raw_journey->sub_category_id)
                                        <option value="{{$year['id']}}" selected>{{$year['name']}}</option>
                                    @else
                                        <option value="{{$year['id']}}">{{$year['name']}}</option>
                                    @endif
                                @else
                                    @if($key <= 0)
                                        <option value="{{$year['id']}}" selected>{{$year['name']}}</option>
                                    @else
                                        <option value="{{$year['id']}}">{{$year['name']}}</option>
                                    @endif
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group my-4">
                        <label for="subject" class="fw-medium text-dark">Select Subject</label>
                        <select name="subject" id="subject" class="form-select" required>
                            <option value="">Select a subject</option>
                            @foreach($subjects as $key => $subject)
                                @if($editFlag && $subject['id'] == $raw_journey->section_id)
                                    <option id="subject_{{$subject['id']}}" class="d-none" value="{{$subject['id']}}" selected>{{$subject['name']}}</option>
                                @else
                                    <option id="subject_{{$subject['id']}}" class="d-none" value="{{$subject['id']}}">{{$subject['name']}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4 row">
                        <div class="col-12 col-sm-8">
                            <div class="h6 mb-1 text-dark">
                                Repeat Theme
                            </div>
                            <div class="lh-1 font-size-13">True (Theme Background Will Be Repeated). False (Theme Background Will Not Be Repeated).</div>
                        </div>
                        <div class="col-12 col-sm-4 d-flex align-items-center justify-content-sm-end">
                            <label class="switch mt-2">
                                @if($editFlag && $raw_journey->repeat_theme == true)
                                    <input name="repeat_theme" id="repeatTheme" type="checkbox" checked>
                                @else
                                    <input name="repeat_theme" id="repeatTheme" type="checkbox">
                                @endif
                                <span class="slider round"></span>
                            </label>
                        </div>
                    </div>
                    <div class="form-group my-4 d-grid">
                        <label for="theme" class="fw-medium text-dark">Journey Theme</label>
                        @if($editFlag)
                            <input type="file" name="theme" id="theme" class="form-control">
                        @else
                            <input type="file" name="theme" id="theme" class="form-control" required>
                        @endif
                    </div> 
                    <div class="form-group my-4 d-grid">
                        <label for="icon" class="fw-medium text-dark">Journey Icon</label>
                        @if($editFlag)
                            <input type="file" name="icon" id="icon" class="form-control">
                        @else
                            <input type="file" name="icon" id="icon" class="form-control" required>
                        @endif
                    </div> 
                    <div class="form-group my-4 d-grid">
                        <label for="line_color" class="fw-medium text-dark">Line Color</label>
                        <span class="d-flex align-items-center">
                            <span class="me-2">Select:</span>
                            @if($editFlag)
                                <input type="color" name="line_color" id="line_color" value="{{$raw_journey->moving_line_color}}" required>
                            @else
                                <input type="color" name="line_color" id="line_color" required>
                            @endif
                        </span>
                    </div> 
                    <div class="form-group mb-4">
                        <label for="summernote" class="fw-medium text-dark">Description</label>
                        <div class="my-1">
                            <textarea id="summernote" name="description">@if($editFlag){{$raw_journey->description}}@endif</textarea>
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
                                @if($editFlag && $raw_journey->is_active == true)
                                    <input name="is_active" id="isActive" type="checkbox" checked>
                                @else
                                    <input name="is_active" id="isActive" type="checkbox">
                                @endif
                                <span class="slider round"></span>
                            </label>
                        </div>
                    </div>
                    <div class="text-end">
                        <div id="formError" class="font-size-13 mb-2 text-danger"></div>
                        @if($editFlag)
                            <input  type="submit" value="Update" class="btn btn-primary">
                        @else
                            <input  type="submit" value="Save & Proceed" class="btn btn-primary">
                        @endif 
                    </div>
                </form>
            </div>
        </div>

    </section>
    
    <script  script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css">
 
    <script>
        var sub_category_sections = {!! str_replace("'", "\'", json_encode($SubCategorySections)) !!};
        sortingYear($("#year").val());
        $("#year").change(function(){
            sortingYear($(this).val());
        });
         function sortingYear(year) {
            sub_category_sections.forEach(function (val) {
                if(val.sub_category_id == year){
                    console.log(val.sub_category_id , year);
                    $("#subject_"+val.section_id).removeClass("d-none")
                } else {
                    $("#subject_"+val.section_id).addClass("d-none")
                }
            });
         }
         $('#isActive').change(function() {
                let isActive = $(this).is(':checked');
                if(isActive){
                    $("#isActiveText").text("Published");
                } else {
                    $("#isActiveText").text("Draft");
                }
            });
        $(document).ready(function(){
            $('#summernote').summernote({
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
    </script>
</body>

</html>
