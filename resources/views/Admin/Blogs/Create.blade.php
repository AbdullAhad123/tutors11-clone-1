<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Blog</title>
    <!-- rel icon -->
    <link rel="icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <meta name="description" content="{{ app(\App\Settings\SiteSettings::class)->seo_description }}">
    <meta name="author" content="{{ app(\App\Settings\SiteSettings::class)->app_name }}">
    <!-- bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
        .editor {
            position: relative;
            width: 100%;
            min-height: 40vh;
            max-height: 400px;
            margin: 0 auto;
            padding: 20px;
            background: #fcfcfc;
            border-radius: 3px;
            border: 1px solid #696cff;
            box-sizing: border-box;
            word-break: break-all;
            outline: 0;
        }

        .btn_primary_customized {
            text-transform: uppercase;
            font-size: 0.9rem;
            background-color: #696cff !important;
        }

        .btn_primary_customized:hover {
            box-shadow: 0px 0px 10px 1px #34343425;
        }

        .text_black {
            color: #181818 !important;
        }

        .font_bold {
            font-weight: 600 !important;
        }
        .font-size-13{font-size: 13px}
        .w_350 {min-width: 350px}
        .w_300 {min-width: 300px}
        .w_280 {min-width: 280px}
        .w_250 {min-width: 250px}
        .w_200 {min-width: 200px}
        .w_180 {min-width: 180px}
        .note-editable  {
            min-height: 350px!important;
            max-height: auto!important;
        }
    </style>
</head>

<body>
    @include('sidebar')
    @include('header')

    <section class="p-4">

        <h1 class="text-dark h2 my-3">Create Blog</h1>

        <div class="bg-white my-4 p-4 rounded-4 shadow">
            <form class="row py-3" id="myForm" action="{{ route('store_blog') }}" method="POST" enctype="multipart/form-data">
            @csrf   
                <div class="form-group mb-4 d-grid col-lg-6 col-md-6 col-sm-6 col-12">
                    <label class="fw-medium text-dark" for="title">Title</label>
                    <input type="text" name="title" id="title" placeholder="Enter Blog Title" class="mt-2 form-control shadow-sm" required>
                </div>
                <div class="form-group mb-4 d-grid col-lg-6 col-md-6 col-sm-6 col-12">
                    <label class="fw-medium text-dark" for="author">Author</label>
                    <input type="text" name="author" id="author" placeholder="Enter Author Name" class="mt-2 form-control shadow-sm" required>
                </div>
                <div class="form-group mb-4 d-grid col-lg-6 col-md-6 col-sm-6 col-12">
                    <label class="fw-medium text-dark" for="slug">Slug</label>
                    <input type="text" name="slug" id="slug" placeholder="Enter Slug Name" class="mt-2 form-control shadow-sm" required>
                    @if (Session::has('slug_exists'))
                        <small class="text-danger mt-2">The requested slug is already in use. Please select a different slug.</small>
                    @endif
                </div>
                <div class="form-group mb-4 d-grid col-lg-6 col-md-6 col-sm-6 col-12">
                    <label class="fw-medium text-dark" for="blogCategory">Blog Category</label>
                    <select class="form-select mt-2" id="blogCategory" name="catgeory" required>
                        <option selected>Select Category</option>
                        <option value="Educational">Educational Blog</option>
                        <option value="Student">Student Blog</option>
                        <option value="Parent">Parent Blog</option>
                        <option value="Teachers">Teachers Blog</option>
                    </select>
                </div>
                <div class="form-group  d-grid col-lg-6 col-md-6 col-sm-6 col-12 mb-4">
                    <label class="fw-medium text-dark" for="image">Select an Image</label>
                    <input type="file" name="image" id="image" class="mt-2 form-control shadow-sm" accept="image/png, image/jpeg, image/jpg, image/webp" required>
                    @if ($errors->has('image'))
                        <div id="imageError" class="text-danger mt-2">{{ $errors->first('image') }}</div>
                    @else
                        <div id="imageError" class="text-danger small mt-1">Max File Size: 2MB</div>
                    @endif
                </div> 
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-12 mb-4">
                    <label class="fw-medium text-dark" for="date">Pick a Date</label>
                    <input type="date" name="date" id="date" class="mt-2 form-control shadow-sm" required>
                </div>
                <div class="form-group mb-4 d-grid col-lg-6 col-md-6 col-sm-6 col-12">
                    <label class="fw-medium text-dark" for="keywords">Keywords</label>
                    <input type="text" name="keywords" id="keywords" placeholder="Enter Blog keywords" class="mt-2 form-control shadow-sm" required>
                </div>
                <div class="form-group mb-4 d-grid col-lg-6 col-md-6 col-sm-6 col-12">
                    <label class="fw-medium text-dark" for="meta_description">Meta Description</label>
                    <input type="text" name="meta_description" id="meta_description" placeholder="Enter Meta Description" class="mt-2 form-control shadow-sm" required>
                </div>
                <div class="form-group mb-4">
                    <textarea class="form-control mt-2" name="body" id="body"></textarea>
                </div>    
                <!-- submit btn  -->
                <div class="text-end">
                    @if (Session::has('null_body'))
                        <div class="text-danger mt-2">{{session('null_body')}}</div>
                    @endif
                    <input type="submit" id="save" class="btn btn-primary" value="Create Blog">
                </div>
            </form>
        </div>

    </section>

    @include('parentsidebar.sidebarending')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css">

    <script>
        $(document).ready(function(){
            $('#body').summernote({
                placeholder: 'Start Typing here...',
                tabsize: 2,
                height: 100,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'fullscreen', 'superscript', 'subscript']],
                    ['view', ['codeview', 'help']]
                ],
                callbacks: {
                    onInit: function() {
                        $('.note-toolbar').addClass('custom-toolbar');
                    }
                }
            });
            // $(document).on("click","#save", function(e){
            //     e.preventDefault();
            //     let title = $('#title').val(); 
            //     let author = $('#author').val(); 
            //     let category = $('#blogCategory  ').val();
            //     let image = $('#image').val();
            //     let date = $('#date').val();
            //     let body = $('#body').val();
            //     console.log('title =' + title, 'author =' + author, 'category =' + category, 'image =' + image, 'date =' + date, 'body =' + body)
            //     // $.ajax({
            //     //     type: "GET",
            //     //     url: "question/"+id+"/topic",
            //     //     data: {
            //     //         _token: '{{ csrf_token() }}'
            //     //     },
            //     //     success: function(data) {
            //     //         if(data.initialTopics.length > 0){
            //     //             // working here
            //     //             _this.empty();
            //     //             if(selected == '--'){
            //     //                 _this.append("<option value='0' selected>--</option>")
            //     //             } else {
            //     //                 _this.append("<option value='0'>--</option>")
            //     //             }
            //     //             data.initialTopics.forEach(function(initialTopic, i) {
            //     //                 if(selected == initialTopic.id){
            //     //                     _this.append("<option value='"+initialTopic.id+"' selected>"+initialTopic.name+"</option>")
            //     //                 } else {
            //     //                     _this.append("<option value='"+initialTopic.id+"'>"+initialTopic.name+"</option>")
            //     //                 }
            //     //             });
            //     //         }
            //     //     },
            //     //     error: function(data, textStatus, errorThrown) {
            //     //         console.log(textStatus);
            //     //     },
            //     // });
            // });
        });
        document.getElementById('myForm').addEventListener('submit', function(event) {
            var fileInput = document.getElementById('image');
            var fileSize = fileInput.files[0].size; // Get file size in bytes
            var maxSize = 2 * 1024 * 1024; // 2MB in bytes

            if (fileSize > maxSize) {
                document.getElementById('imageError').innerHTML = 'The image size should be less than 2MB.';
                document.getElementById('image').focus();
                event.preventDefault();
            }
        });
    </script>

</body>

</html>