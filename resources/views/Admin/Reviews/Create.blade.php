<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Reviews - {{ app(\App\Settings\SiteSettings::class)->app_name }}</title>
    <!-- rel icon -->
    <link rel="icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <meta name="description" content="{{ app(\App\Settings\SiteSettings::class)->seo_description }}">
    <meta name="author" content="{{ app(\App\Settings\SiteSettings::class)->app_name }}">
    <!-- bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
        .rating_star.hovered{
            color:#f4ab33 !important;
        }

        #message {
            min-height: 180px !important;
            max-height: 180px !important;
        }
    </style>
</head>

<body>
    @include('sidebar')
    @include('header')

    <section class="p-4">

        <div class="bg-white p-4 my-4 rounded-4 shadow">
            <h1 class="fw-semibold h3 my-3 text-dark">New Review</h1>
            <form class="row py-3" action="{{ route('store_review') }}" method="POST" enctype="multipart/form-data">
            @csrf   
                <div class="form-group mb-4 d-grid col-lg-6 col-md-6 col-sm-6 col-12">
                    <label class="text-dark fw-medium" for="name">Name</label>
                    <input type="text" name="name" id="name" placeholder="Enter Review User Name" class="mt-2 form-control" required>
                </div>
                <div class="form-group mb-4 d-grid col-lg-6 col-md-6 col-sm-6 col-12">
                    <label class="text-dark fw-medium" for="user_image">Image Url <small class="text-danger">(optional)</small></label>
                    <input type="text" name="user_image" id="user_image" placeholder="Enter Review User Image Url" class="mt-2 form-control">
                </div>
                <div class="form-group d-grid col-lg-6 col-md-6 col-sm-6 col-12 mb-4">
                    <label class="text-dark fw-medium" for="rating">Select Rating</label>
                    <input type="hidden" name="rating" id="rating" value="5" required>
                    <div class="d-flex">
                        <i class="fa fa-star pe-1 cursor-pointer rating_star" data-value="1"></i>
                        <i class="fa fa-star pe-1 cursor-pointer rating_star" data-value="2"></i>
                        <i class="fa fa-star pe-1 cursor-pointer rating_star" data-value="3"></i>
                        <i class="fa fa-star pe-1 cursor-pointer rating_star" data-value="4"></i>
                        <i class="fa fa-star pe-1 cursor-pointer rating_star" data-value="5"></i>
                    </div>
                </div> 
                <div class="form-group d-grid col-lg-6 col-md-6 col-sm-6 col-12 mb-4">
                    <label class="text-dark fw-medium" for="date">Pick a Date</label>
                    <input type="date" name="date" id="date" class="mt-2 form-control" required>
                </div>
                <div class="form-group mb-4">
                    <label class="text-dark fw-medium" for="message">Message</label>
                    <textarea class="form-control mt-2" placeholder="Enter Message..." name="message" id="message"></textarea>
                </div>    
                <!-- submit btn  -->
                <div class="text-end">
                    <input type="submit" id="save" class="btn btn-primary" value="Save">
                </div>
            </form>
        </div>

    </section>

    @include('parentsidebar.sidebarending')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css">

    <script>
        $(document).ready(function(){
            $(".rating_star").click(function(){
                let rating = $(this).data("value");
                $("#rating").val(rating);
                $(".rating_star").removeClass("text-warning");
                $(this).addClass("text-warning").prevAll().addClass("text-warning");
            });
            $(".rating_star").mouseenter(function(){
                $(this).addClass("hovered").prevAll().addClass("hovered");
            });
            $(".rating_star").mouseleave(function(){
                $(".rating_star").removeClass("hovered");
            });
        });
    </script>

</body>

</html>