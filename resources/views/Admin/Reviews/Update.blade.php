<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ app(\App\Settings\SiteSettings::class)->app_name }} - Update Review</title>
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
    </style>
</head>

<body>
    @include('sidebar')
    @include('header')

    <section class="p-4 my-4">
        <div class="bg-white p-4 my-4 rounded-4 shadow">
            <h1 class="fw-normal h4 my-2 text-dark">Update Review</h1>
            <form class="row py-3" action="{{ route('edit_review', ['id' => $review->id]) }}" method="POST">
            @csrf   
                <div class="form-group mb-4 d-grid col-lg-6 col-md-6 col-sm-6 col-12">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" placeholder="Enter Review User Name" class="mt-2 form-control" value="{{$review->name}}" required>
                </div>
                <div class="form-group mb-4 d-grid col-lg-6 col-md-6 col-sm-6 col-12">
                    <label for="user_image">Image Url <small class="text-danger">(optional)</small></label>
                    @if(isset($review->user_image))
                        <input type="text" name="user_image" id="user_image" placeholder="Enter Review User Image Url" class="mt-2 form-control" value="{{$review->user_image}}">
                    @else
                        <input type="text" name="user_image" id="user_image" placeholder="Enter Review User Image Url" class="mt-2 form-control">
                    @endif
                </div>
                <div class="form-group d-grid col-lg-6 col-md-6 col-sm-6 col-12 mb-4">
                    <label for="rating">Select Rating</label>
                    <input type="hidden" name="rating" id="rating" value="{{$review->rating}}" required>
                    <div class="d-flex">
                        @for ($i = 0; $i < 5; $i++)
                            @if($i < $review->rating)
                                <i class="fa fa-star pe-1 cursor-pointer rating_star text-warning" data-value="{{$i + 1}}"></i>
                            @else
                                <i class="fa fa-star pe-1 cursor-pointer rating_star" data-value="{{$i + 1}}"></i>                                 
                            @endif
                        @endfor
                    </div>
                </div> 
                <div class="form-group d-grid col-lg-6 col-md-6 col-sm-6 col-12 mb-4">
                    <label for="date">Pick a Date</label>
                    <input type="date" name="date" id="date" class="mt-2 form-control">
                </div>
                <div class="form-group mb-4">
                    <label for="message">Message</label>
                    <textarea class="form-control mt-2" name="message" id="message">{{$review->message}}</textarea>
                </div>    
                <!-- submit btn  -->
                <div class="text-end">
                    <input type="submit" id="save" class="btn btn-primary" value="Update">
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