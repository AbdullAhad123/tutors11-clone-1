<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Configure Videos - Manage Learning - 
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
        .cursor-not-allowed{cursor:not-allowed !important}
        .practice_set_form{max-width: 900px !important;}
        #start_search:hover,#start_search:active{background: transparent;cursor: default;color: #bcc4cc !important;}
        #skill_Dropdown{max-height: 175px;}
        .font-size-13{font-size:13px;}
        input::-webkit-outer-spin-button,input::-webkit-inner-spin-button {-webkit-appearance: none;margin: 0;}
        input[type=number] {-moz-appearance: textfield;}
    </style>
</head>

<body> 
    @include('sidebar')
    @include('header')

    <section class="p-4">

        <div class="bg-white rounded-4 py-4 p-3 my-4 shadow">
            <div class="row m-0">
                <div class="col-lg-5 col-md-12 align-self-center">
                    <div class="h5 text-dark mb-0">Configure Videos</div>
                    <div class="mt-1">Add Videos to Learning</div>
                </div>
                <div class="col-lg-7 col-md-12 d-flex justify-content-evenly">
                    @foreach ($steps as $key => $step)
                        @if($step['status'] == 'active')
                            <a href="{{$step['url']}}">
                                <button class="bg-label-primary border-primary btn mx-1">
                                    <span class="badge bg-primary circle-badge rounded-circle text-white"> {{$key + 1}} </span> 
                                    {{$step['title']}}
                                </button>
                            </a>                        
                        @else
                            <button class="btn btn-outline-primary mx-1 proceedVideos" data-type="next">
                                <span class="badge bg-primary circle-badge rounded-circle text-white"> {{$key + 1}} </span> 
                                {{$step['title']}}
                            </button>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>

        <div id="errorMessage"></div>

        <div class="bg-white rounded-4 py-4 p-3 my-4 shadow">
            <div class="practice_set_form mx-auto">

                <div class="form-group my-4 dropdown">
                    <label class="text-dark fw-medium" for="sub_category_Inp">Year</label>
                    <input id="sub_category_Inp" type="text" class="form-control dropdown-toggle my-1 shadow-sm" data-id="" data-trigger="0" data-bs-toggle="dropdown" aria-expanded="true" placeholder="Year" autocomplete="off">
                    <ul id="sub_category_Dropdown" class="dropdown-menu w-100 p-0 overflow-auto">
                        <li class="dropdown-item text-center text-light" id="start_search">
                            Start typing to search.
                        </li>
                    </ul>
                </div>

                <div class="form-group my-4 dropdown">
                    <label class="text-dark fw-medium" for="skill_Inp">Topic</label>
                    <input id="skill_Inp" type="text" class="form-control dropdown-toggle my-1 shadow-sm" data-id="" data-trigger="0" data-bs-toggle="dropdown" aria-expanded="true" placeholder="Topic" autocomplete="off">
                    <ul id="skill_Dropdown" class="dropdown-menu w-100 p-0 overflow-auto">
                        <li class="dropdown-item text-center text-light" id="start_search">
                            Start typing to search.
                        </li>
                    </ul>
                </div>
                
                <div id="formError" class="font-size-13 mb-2 text-danger"></div>
                <div class="text-end">
                    <button class="btn btn-primary proceedVideos px-3 p-2" data-type="submit">Save & Proceed</button>
                </div>

            </div>
        </div>

    </section>

    <script>
        $('#sub_category_Inp, #skill_Inp').change(function() {
            $("#formError").text("");
            $("#errorMessage").empty();
        });
        $(document).on("keyup","#skill_Inp", function(e){
            $("#skill_Dropdown").empty();
            var search_query = $(this).val();
            if(search_query.length > 0) {
                $.ajax({
                    type: "GET",
                    url: '/admin/search_skills',
                    data: {
                        query: search_query,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        let arrLength = data['skills'].length;
                        if(arrLength > 0) {
                            data['skills'].forEach(function(skill){
                                $("#skill_Dropdown").append('<li class="dropdown-item cursor-pointer py-1 px-3 select_skill" data-id="'+skill.id+'">'+skill.name+'</li>');
                            });
                        } else {
                            $("#skill_Dropdown").append('<li class="dropdown-item text-danger text-center">No Result Found</li>');
                        }

                    },
                    error: function(data, textStatus, errorThrown) {
                        console.log(textStatus);
                        console.log(data);
                    },
                });
            } else {
                $("#skill_Inp").attr("data-id","");
                $("#skill_Dropdown").append('<li class="dropdown-item text-center text-light" id="start_search">Start typing to search.</li>');
            }
        });
        $(document).on("click",".select_skill", function(e){
            let selectedSkill = $(this).text().trim();
            let selectedSkillId = $(this).data("id");
            $("#skill_Inp").val(selectedSkill);
            $("#skill_Inp").attr("data-id",selectedSkillId);
        });
        $(document).on("keyup","#sub_category_Inp", function(e){
            $("#sub_category_Dropdown").empty();
            var search_query = $(this).val();
            if(search_query.length > 0) {
                $.ajax({
                    type: "GET",
                    url: '/admin/search_sub_categories',
                    data: {
                        query: search_query,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        let arrLength = data['subCategories'].length;
                        if(arrLength > 0) {
                            data['subCategories'].forEach(function(subCategory){
                                $("#sub_category_Dropdown").append('<li class="dropdown-item cursor-pointer py-1 px-3 select_sub_category" data-id="'+subCategory.id+'">'+subCategory.name+'</li>');
                            });
                        } else {
                            $("#sub_category_Dropdown").append('<li class="dropdown-item text-danger text-center">No Result Found</li>');
                        }

                    },
                    error: function(data, textStatus, errorThrown) {
                        console.log(textStatus);
                        console.log(data);
                    },
                });
            } else {
                $("#sub_category_Inp").attr("data-id","");
                $("#sub_category_Dropdown").append('<li class="dropdown-item text-center text-light" id="start_search">Start typing to search.</li>');
            }
        });
        $(document).on("click",".select_sub_category", function(e){
            let selectedSubCategory = $(this).text().trim();
            let selectedSubCategoryId = $(this).data("id");
            $("#sub_category_Inp").val(selectedSubCategory);
            $("#sub_category_Inp").attr("data-id",selectedSubCategoryId);
        });
        $(document).on("click",".proceedVideos", function(e){
            let type = $(this).data("type");
            let sub_category = $("#sub_category_Inp").data("id");
            let skill = $("#skill_Inp").data("id");
            $("#formError").text("");
            $("#errorMessage").empty();
            if(sub_category){
                if(skill){
                    window.location.href = "/admin/practice/"+sub_category+"/"+skill+"/videos"
                } else {
                    if(type == 'submit'){
                        $("#formError").text("Please select year from dropdown");
                    } else {
                        $("#errorMessage").append('<div class="alert alert-danger mt-3">Please save the current details to proceed!<div>')
                    }
                }
            } else {
                if(type == 'submit'){
                    $("#formError").text("Please select year from dropdown");
                } else {
                    $("#errorMessage").append('<div class="alert alert-danger mt-3">Please save the current details to proceed!<div>')
                }
            }
        });
    </script>

</body>

</html>
