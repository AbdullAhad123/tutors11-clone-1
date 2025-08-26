<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Level</title>
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

        <h1 class="my-4 text-dark h2">Edit Journey Level</h1>

        @if (Session::has('errorMessage'))
            <div class="alert_failed rounded-3 p-3 d-flex align-items-center my-4"><i class='bx bx-x-circle me-1 fs-5'></i>{{Session::get('errorMessage')}}</div>
        @endif

        <div class="container-fluid bg-white px-4 py-3 rounded-4 shadow">
            <form action="{{ route('journey_level_update', ['id' => $level->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf            
                <div class="form-group my-4 d-grid">
                    <label for="theme" class="fw-medium text-dark">Level Image</label>
                    <input type="file" name="photo" id="theme" class="form-control mt-1">
                </div>

                <div class="form-group my-4 d-grid">
                    <label for="width" class="fw-medium text-dark">Image Width</label>
                    <input type="number" name="width" id="width" class="form-control mt-1" placeholder="Enter image width..." min="1" value="{{$level->img_width}}" required>
                </div>
                
                <div class="form-group my-4 d-grid">
                    <label for="position_x" class="fw-medium text-dark">Image Position-X</label>
                    <input type="number" name="position_x" id="position_x" class="form-control mt-1" placeholder="Enter image position..." value="{{$level->img_position_x}}" required>
                </div>
                
                <div class="form-group my-4 d-grid">
                    <label for="position_y" class="fw-medium text-dark">Image Position-Y</label>
                    <input type="number" name="position_y" id="position_y" class="form-control mt-1" placeholder="Enter image position..." value="{{$level->img_position_y}}" required>
                </div>

                <div class="form-group mb-4">
                    <label for="summernote" class="fw-medium text-dark">Description</label>
                    <div class="my-3">
                        <textarea id="summernote" name="description" placeholder="Enter description...">{{$level->description}}</textarea>
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
                            @if($level->is_active)
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
                </div>
                <div class="w-100 text-end">
                    <input  type="submit" value="Update" class="btn btn-primary">
                </div>
            </form>
        </div>

    </section>

    <script  script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css">
 
    <script>
        
        $('#isActive').change(function() {
            let isActive = $(this).is(':checked');
            if(isActive){
                $("#isActiveText").text("Published");
            } else {
                $("#isActiveText").text("Draft");
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
    </script>
</body>

</html>
