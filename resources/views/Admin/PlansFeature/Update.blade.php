<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Plan Feature - {{$feature['name']}}</title>
    <!-- rel icon -->
    <link rel="icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}">
    <meta name="description" content="{{ app(\App\Settings\SiteSettings::class)->seo_description }}">
    <meta name="author" content="{{ app(\App\Settings\SiteSettings::class)->app_name }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
    <script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>
    <!-- bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
        .choices__list--multiple .choices__item{background-color: #696bfc;border: 1px solid #6869ed;}
        .choices[data-type*=select-multiple] .choices__button, .choices[data-type*=text] .choices__button{border-left: 1px solid #c3c3c3;}
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {-webkit-appearance: none;margin: 0;}
        input[type=number] {-moz-appearance: textfield;}
        .font-size-13{font-size:13px;}
        .cursor-not-allowed{cursor: not-allowed;}
    </style>
</head>

<body>
    @include('sidebar')
    @include('header')

    <section class="p-4">

        <h1 class="text-dark h2 my-3">Edit Plan Feature</h1>
        <h2 class="text-dark h4 my-3">{{$feature['name']}}</h2>

        <div class="bg-white p-4 my-4 shadow rounded-3">


            <div class="mb-3">
                <label class="fw-medium text-dark" for="name" class="form-label">Feature Name</label>
                <input type="text" class="form-control my-2 shadow-sm" id="name" placeholder="Enter Name" value="{{$feature['name']}}">
            </div>
            
            
            <div class="mb-3">
                <label class="fw-medium text-dark" for="description" class="form-label">Short Description (Max. 200 Characters)</label>
                <textarea class="form-control my-2 shadow-sm" name="description" id="description" rows="4" placeholder="Enter Short Description (Max. 200 Characters)">{{$feature['description']}}</textarea>
            </div>


            <div class="mb-4 row">
                <div class="col-12 col-sm-8">
                    <div class="h6 mb-1 text-dark">Status - 
                        <span id="isActiveText">
                            @if($feature['is_active']) 
                                Active
                            @else
                                In-Active
                            @endif
                        </span>
                    </div>
                    <div class="lh-1 font-size-13">Active (Shown Everywhere). In-active (Hidden Everywhere).</div>
                </div>
                <div class="col-12 col-sm-4 d-flex align-items-center justify-content-sm-end">
                    <label class="switch mt-2">
                        @if($feature['is_active']) 
                            <input id="isActive" type="checkbox" checked>
                        @else
                            <input id="isActive" type="checkbox">
                        @endif
                        <span class="slider round"></span>
                    </label>
                </div>
            </div>

            <div class="w-100 text-end">
                <div class="mb-1 font-size-13 text-danger" id="newPlanFeatureFormError"></div>
                <button class="btn btn-primary" id="editPlanFeature">Update</button>
            </div>

        </div>

    </section>

    @include('parentsidebar.sidebarending')

    <script>
        $("#isActive").change(function(){
            let check = $(this).is(':checked');
            if(check){
                $("#isActiveText").text("Active");
            } else {
                $("#isActiveText").text("In-active");
            }
        });
        
        $("#editPlanFeature").click(function(){
                let name = $("#name").val();
                let description = $("#description").val();
                let isActive = $("#isActive").is(':checked');
                if(name){
                    $.ajax({
                        url: '/admin/plan-features/update/{{$feature["id"]}}',
                        dataType: 'json',
                        type: 'POST',
                        data: {
                            name: name,
                            description: description,
                            is_active: isActive,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(data) {
                            console.log(data);
                            if(data.success){
                                window.location.href = "/admin/plan-features";
                            }
                        },
                        error: function(data, textStatus, errorThrown) {
                            console.log(textStatus);
                            console.log(data);
                        },
                    });
                } else {
                    $("#newPlanFeatureFormError").text("Plan feature name field is required, Please enter plan feature name");
                }
            });
    </script>
    
</body>

</html>