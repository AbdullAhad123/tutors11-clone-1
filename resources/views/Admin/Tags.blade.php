<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tags - Manage Categories - 
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>.select_custom{min-width: 160px;}</style>
</head>

<body>
    @include('sidebar')
    @include('header')
    
    <section class="p-4">

        <div class="my-4">
            <h1 class="text-dark my-2">Tags</h1>
            <p class="text-dark fs-5 my-2">Admins can ealiy manage, update and track tags for users in just a click.</p>
        </div>

        <div id="pageMessage" class="my-4"></div>

        <div class="bg-white rounded-4 shadow my-4">
            <div class="align-items-center d-flex justify-content-between mb-4 p-3 px-4">
                <h2 class="h4 text-dark m-0">Manage Tags</h2>
                <button data-bs-toggle="modal" data-bs-target="#newTagModal" class="btn rounded-2 text-uppercase create_new_btn text-white"><i class='bx bx-plus-circle mb-1 text-white'></i>Create new</button>
            </div>
            
            <div class="table-responsive">
                <table class="table">
                    <thead class="bg-body-secondary">
                        <th scope="col" class="font_bold text-dark py-3 fs-6 w_180">NAME</th>
                        <th scope="col" class="font_bold text-dark py-3 fs-6 w_180">STATUS</th>
                        <th scope="col" class="font_bold text-dark py-3 fs-6 w_180">ACTIONS</th>
                    </thead>
                    <tbody>
                        <tr class="row_bg_light">
                            <td class="py-4" data-label="search">
                                <input type="text" id="searchName" class="shadow-none form-control bg-light font_normal_bold placeholder_text select-custom" placeholder="Search Name">
                            </td>               
                            <td class="py-4" data-label="search">
                                <select class="form-select select_custom">
                                    <option selected>Search Status</option>
                                    <option value="Active">Active</option>
                                    <option value="In-Active">In-Active</option>
                                </select>
                            </td>
                            <td class="py-4" data-label="search"></td>
                        </tr>
                        @if(count($tags()['data']) > 0)
                            @foreach($tags()['data'] as $tag)
                                <tr>                        
                                    <td data-name="name">{{$tag['name']}}</td>
                                    <td data-name="status">
                                        @if($tag['status'] == 'Active')
                                            <span class="p-2 px-3 rounded small bg_label_published">Active</span>
                                        @else
                                            <span class="p-2 px-3 rounded small bg_label_draft">In-active</span>
                                        @endif
                                    </td>
                                    <td data-name="actions">
                                        <div class="border d-inline-flex dropdown rounded shadow-sm">
                                            <a class="nav-link dropdown-toggle text-muted text-center" href="" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                Action
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-end p-0">
                                                <li>
                                                    <a class="dropdown-item" href="/admin/tags/{{$tag['id']}}/edit">Edit</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item cursor-pointer delete" data-id="{{$tag['id']}}">Delete</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                        <tr>
                            <td colspan="6" class="py-3 text-center">
                                <img src="{{url('images/no_record_found.png')}}" height="auto" width="200" alt="no records found">
                                <h2 class="text-dark h4">No Records Found</h2>
                            </td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>

            <div class="col-12 col-lg-12 order-2 order-md-3 order-lg-2 mb-4">
                <div class="card">
                    <div class="px-3 py-4 d-flex justify-content-between align-items-center">
                        <div>
                            ROWS PER PAGE:
                            <select name="row_selection" id="per_page_option" class="ms-2 btn btn-primary bg_primary_label px-1">
                                @if($tags()['meta']['pagination']['per_page'] == 10)
                                    <option value="10" selected>10</option>
                                @else
                                    <option value="10">10</option>
                                @endif
                                @if($tags()['meta']['pagination']['per_page'] == 20)
                                    <option value="20" selected>20</option>
                                @else
                                    <option value="20">20</option>
                                @endif
                                @if($tags()['meta']['pagination']['per_page'] == 50)
                                    <option value="50" selected>50</option>
                                @else
                                    <option value="50">50</option>
                                @endif
                                @if($tags()['meta']['pagination']['per_page'] == 100)
                                    <option value="100" selected>100</option>
                                @else
                                    <option value="100">100</option>
                                @endif
                            </select>
                        </div>
                        <div class="align-self-center">
                            @if($tags()['meta']['pagination']['total'] > $tags()['meta']['pagination']['count'])
                                @isset($tags()['meta']['pagination']['links']['previous'])
                                    <span>
                                        <a href="{{$tags()['meta']['pagination']['links']['previous']}}"><button class="btn btn-sm bg-label-dark">previous</button></a>
                                    </span>
                                @endisset
                            @endif
                            <span class="mx-2">
                                PAGE <span id="page_active">{{$tags()['meta']['pagination']['current_page']}}</span> OF {{$tags()['meta']['pagination']['total_pages']}}
                            </span>
                            @if($tags()['meta']['pagination']['total'] > $tags()['meta']['pagination']['count'])
                                @isset($tags()['meta']['pagination']['links']['next'])
                                    <span>
                                        <a href="{{$tags()['meta']['pagination']['links']['next']}}"><button class="btn btn-sm bg-label-dark">Next</button></a>
                                    </span>
                                @endisset
                            @endif
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- create new tag modal  -->
        <div class="modal fade" id="newTagModal" aria-labelledby="modalToggleLabel" tabindex="-1" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-dark" id="modalToggleLabel">Create New Tag</h5>
                    <button type="button" id="closeNewUser" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-input">
                    <div class="my-4">
                        <label>Tag Name</label>
                        <input type="text" class="form-control mt-3" id="newTagName">
                        <span id="newTagname_error" class="text-danger small d-none"></span>
                    </div>

                    <div class="my-4">
                        <div class="row m-0 align-items-center justify-content-between">
                        <div class="col-10">
                            <label for="name" class="text_black font_bold ">
                            <!-- printing -->
                            <span class="active_inactive_text">Active</span>
                            </label>
                            <p class="my-2"><b>Active</b> (Shown Everywhere). <b>In-active</b> (Hidden
                            Everywhere).</p>
                        </div>
                        <div class="col-2 ">
                            <div class="form-check form-switch text-center">
                            <input class="form-check-input shadow-none border border-dark btn-lg" type="checkbox" role="switch" id="active_inactive_switch" checked>
                            </div>
                        </div>
                        </div>
                    </div>

                    </div>
                </div>

                <div class="modal-footer">
                    <div class="w-100 text-end">
                    <div class="mb-1 font-size-13 text-danger" id="NewTagFormError"></div>
                    <button class="btn btn-primary" id="createNewTag">Create</button>
                    </div>
                </div>
                </div>
            </div>
        </div>
        
    </section>
    
    @include('parentsidebar.sidebarending')

    <script>
        $(document).ready(function(){
            $('#searchCode, #searchName').on('keyup', function(e) {
                var code = e.keyCode || e.which;
                if (code == 13) {
                    let queryCode = $("#searchCode").val();
                    let queryUser = $("#searchName").val();
                    let testCode = queryCode ? "&code=" + queryCode : "";
                    let testUser = queryUser ? "&name=" + queryUser : "";
                    let url = "/admin/tags?" + testCode + testUser;
                    window.location.href = url;
                }
            });
            // rows per page 
            $('#per_page_option').on('change', function (e) {
                var perPage = parseInt($(this).val());
                var pathname = window.location.pathname;
                var current_page = {!! str_replace("'", "\'", json_encode($tags()['meta']['pagination']['current_page'])) !!};
                if(perPage == 10){
                    window.location.href = pathname;
                } else {
                    window.location.href = pathname+"?page="+current_page+"&perPage="+perPage;
                }
            });
            // for active inactive switch 
            $("#active_inactive_switch").click(function(){
                if ($("#active_inactive_switch").is(':checked')) {
                    $(".active_inactive_text").html("Active");
                } else {
                    $(".active_inactive_text").html("In-active");
                }
            });
            // create row  
            $("#createNewTag").click(function(){
                let TagName = $("#newTagName").val();
                let isActive = $("#active_inactive_switch").is(':checked');
                if (TagName == "") {
                    $("#newTagName").addClass("border-danger");
                    $("#newTagname_error").removeClass("d-none");
                    $("#newTagname_error").html("The name field is required");
                } else {
                    $("#newTagName").removeClass("border-danger");
                    $("#newTagname_error").addClass("d-none");
                    $.ajax({
                        dataType: 'json',
                        type: "POST",
                        url: '/admin/tags',
                        data: {
                            is_active: isActive,
                            name: TagName,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(data) {
                            if(data.success){
                                window.location.href = '/admin/tags';
                            }
                        },
                        error: function(data, textStatus, errorThrown) {
                            console.log(textStatus);
                        },
                    });
                }
            });
            // delete row 
            $(".delete").click(function() {
                let id = $(this).data("id");
                let _this = $(this);
                $.ajax({
                    type: "DELETE",
                    url: '/admin/tags/'+id,
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        $("#pageMessage").empty();
                        if(data.success){
                            _this.parents("tr").remove();
                            $("#pageMessage").append('<div class="alert_success p-3 d-flex align-items-center rounded-3 my-1"> <i class="bx bx-check-circle me-1"></i>'+data.message+'</div>');
                        } else {
                            $("#pageMessage").append('<div class="alert_failed p-3 d-flex align-items-center rounded-3 my-1"> <i class="bx bx-error-circle me-1"></i>'+data.message+'</div>');
                        }
                    },
                    error: function(data, textStatus, errorThrown) {
                        console.log(textStatus);
                    },
                });
            });
            // ready ends 
        });
    </script>
</body>

</html>
