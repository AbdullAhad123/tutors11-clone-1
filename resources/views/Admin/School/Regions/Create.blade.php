<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        Schools - Manage Regions - 
        @if(Auth::user()->hasRole('instructor'))
            Instructor Portal
        @elseif(Auth::user()->hasRole('admin'))
            Admin Portal
        @endif
    </title>
    <!-- rel icon -->
    <link rel="icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}">
    <meta name="description" content="{{ app(\App\Settings\SiteSettings::class)->seo_description }}">
    <meta name="author" content="{{ app(\App\Settings\SiteSettings::class)->app_name }}">
    <!-- bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }
    </style>
</head>

<body>
    @include('sidebar')
    @include('header')


    <section class="p-4">

        <h1 class="text-dark my-3 h2">Create Region</h1>
        
        @if (Session::has('errorMessage'))
            <div class="alert_failed rounded-3 p-3 d-flex align-items-center my-4"><i class='bx bx-x-circle me-1 fs-5'></i>{{Session::get('errorMessage')}}</div>
        @endif

        <div class="bg-white my-4 p-4 shadow rounded-4">
            <form class="row py-3" action="{{ route('region_store') }}" method="POST">
            @csrf
                <div class="form-group mb-4 d-grid col-sm-6 col-12">
                    <label class="fw-medium text-dark" for="name">Name</label>
                    <input type="text" name="name" id="name" placeholder="Enter Region Name" class="mt-2 form-control shadow-sm" required>
                </div>
                <div class="form-group mb-4 d-grid col-sm-6 col-12">
                    <label class="fw-medium text-dark" for="name">Slug</label>
                    <input type="text" name="slug" id="slug" placeholder="Enter Region Slug" class="mt-2 form-control shadow-sm" required>
                </div>
                <div class="form-group mb-4 d-grid col-12">
                    <label class="fw-medium text-dark" for="description">Description</label>
                    <textarea name="description" id="description" placeholder="Enter page description..." rows="4" class="mt-2 form-control shadow-sm"></textarea>
                </div>
                <div class="text-end">
                    <input type="submit" id="save" class="btn btn-primary" value="Save">
                </div>
            </form>
        </div>

    </section>


    @include('parentsidebar.sidebarending')

</body>

</html>