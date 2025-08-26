<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create New Avatar</title>
    <!-- rel icon -->
    <link rel="icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <meta name="description" content="{{ app(\App\Settings\SiteSettings::class)->seo_description }}">
    <meta name="author" content="{{ app(\App\Settings\SiteSettings::class)->app_name }}">
    <!-- bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
        /* Remove the up and down arrows from number input */
        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input[type="number"] {
            -moz-appearance: textfield; /* Firefox */
        }
    </style>
</head>

<body>
    @include('sidebar')
    @include('header')

    <section class="p-4">

        <h1 class="text-dark h2 my-3">Create Avatar</h1>

        <div class="bg-white my-4 p-4 rounded-4 shadow">
            <form class="row py-3" action="{{ route('upload_avatar') }}" method="POST" enctype="multipart/form-data">
            @csrf   
                <div class="form-group mb-4 col-lg-6 col-md-6 col-sm-6 col-12">
                    <label class="fw-medium text-dark" for="title">Title</label>
                    <input type="text" name="title" id="title" placeholder="Enter Avatar Title" class="mt-2 form-control shadow-sm" required>
                </div>
                <div class="form-group mb-4 col-lg-6 col-md-6 col-sm-6 col-12">
                    <label class="fw-medium text-dark" for="points">Points to redeem</label>
                    <input type="number" name="points" id="points" value="1" placeholder="Enter Points To Redeem" class="mt-2 form-control shadow-sm" required min="1" oninput="validity.valid||(value='');">
                </div>
                <div class="form-group mb-4 col-lg-6 col-md-6 col-sm-6 col-12 mb-4">
                    <label class="fw-medium text-dark" for="avatar">Select Avatar</label>
                    <input type="file" name="avatar" id="avatar" class="mt-2 form-control shadow-sm" required accept="image/jpeg, image/jpg, image/png, image/webp">
                    <small class="text-danger fw-light fs-tiny mt-1">Max File Size: 2Mb</small>
                </div> 
                <div class="form-group mb-4 col-lg-6 col-md-6 col-sm-6 col-12">
                    <label class="fw-medium text-dark" for="sort">Ordering Number</label>
                    <input type="number" name="sort" id="sort" value="1" placeholder="Enter Ordering Number" class="mt-2 form-control shadow-sm" required min="1" oninput="validity.valid||(value='');">
                </div>

                <div class="mb-4 col-12">
                    <div class="row">
                        <div class="col-12 col-sm-8">
                            <div class="h6 mb-1 text-dark">Status - <span id="isActiveText">Active</span></div>
                            <div class="lh-1 small">Active (Shown Everywhere). In-active (Hidden Everywhere).</div>
                        </div>
                        <div class="col-12 col-sm-4 d-flex align-items-center justify-content-sm-end">
                            <label class="switch mt-2">
                                <input id="isActive" name="is_active" type="checkbox" checked>
                                <span class="slider round"></span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group mb-4 col-12">
                    <label class="fw-medium text-dark" for="description">Short Description</label>
                    <textarea class="form-control mt-2" name="description" id="description" rows="4"></textarea>
                </div>    
                <!-- submit btn  -->
                <div class="text-end">
                    <input type="submit" id="save" class="btn btn-primary" value="Create">
                </div>
            </form>
        </div>

    </section>

    @include('parentsidebar.sidebarending')

    <script>
        // is active
        $("#isActive").change(function(){
            let check = $(this).is(':checked');
            if(check){
                $("#isActiveText").text("Active");
            } else {
                $("#isActiveText").text("In-active");
            }
        });
    </script>

</body>

</html>