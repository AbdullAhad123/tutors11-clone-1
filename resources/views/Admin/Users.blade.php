<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Users - Manage User - 
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
    <script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>
    <!-- bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
        .select_custom {min-width: 160px;}
        .choices {margin-bottom: 0;}
        .font-size-13{font-size:13px}
        .name_cell, .online_status{min-width:200px;}
        .last-seen-text{
            font-size:11px;
        }
    </style>
</head>

<body> 
    @include('sidebar')
    @include('header')

    <section class="p-4">
    
        <div class="my-4">
            <div class="d-flex align-items-center">
                <h1 class="text-dark my-2">Users</h1>
                {{-- <button id="lastSeen" class="btn btn-outline-primary btn-sm h-100 ms-2">
                    <i class="bx bx-sort"></i>
                    Sort By Last Seen
                </button> --}}
                <select class="ms-2 form-select w-auto cursor-pointer border-dark-subtle" id="lastSeen">
                    <option value="" disabled selected>Last Seen</option>
                    @foreach ($timeRanges as $key => $timeRange)
                        <option value="{{ $key }}">{{ $timeRange }}</option>
                    @endforeach
                </select>
                
            </div>
            <p class="text-dark fs-5 my-2">Admin can manage users on website and portal. You can edit , update , delete and manage details of users account in just one click. Read our <a href="/admin/docs/user-management/users" target="_blank" class="text-primary text-decoration-none">docs</a> for quick start.</p>
        </div>

        <div id="pageMessage" class="my-4"></div>

        <div class="bg-white rounded-4 shadow my-4">
            <div class="align-items-center d-flex justify-content-between mb-4 p-3 px-4">
                <h2 class="h4 text-dark m-0">Manage Users</h2>
                <button data-bs-toggle="modal" data-bs-target="#newUserModal" class="btn rounded-2 text-uppercase create_new_btn text-white"><i class='bx bx-plus-circle mb-1 text-white'></i>Create new</button>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead class="bg-body-secondary">
                        <th scope="col" class="font_bold fs-6 py-3 text-dark w_200 name_cell">IP ADDRESS</th>
                        <th scope="col" class="font_bold fs-6 py-3 text-dark w_200 name_cell">NAME</th>
                        <th scope="col" class="font_bold fs-6 py-3 text-dark w_180">Username</th>
                        <th scope="col" class="font_bold fs-6 py-3 text-dark w_300">EMAIL</th>
                        {{-- <th scope="col" class="font_bold fs-6 py-3 text-dark w_300">PHONE</th> --}}
                        <th scope="col" class="font_bold fs-6 py-3 text-dark w_180">ROLE</th>
                        <th scope="col" class="font_bold fs-6 py-3 text-dark w_160">STATUS</th>
                        <th scope="col" class="font_bold fs-6 py-3 text-dark w_160">GROUPS</th>
                        <th scope="col" class="font_bold fs-6 py-3 text-dark w_160">ACTIONS</th>
                    </thead>
                    <tbody>
                        <tr class="row_bg_light">
                            <td class="py-4" data-label="search">
                                <input type="text" id="ipAddress" class="shadow-none form-control bg-light font_normal_bold placeholder_text select-custom" placeholder="Search Ip Adress">
                            </td>
                            <td class="py-4" data-label="search">
                                <input type="text" id="searchName" class="shadow-none form-control bg-light font_normal_bold placeholder_text select-custom" placeholder="Search Name">
                            </td>
                            <td class="py-4" data-label="search">
                                <input type="text" id="searchUserName" class="shadow-none form-control bg-light font_normal_bold placeholder_text select-custom" placeholder="Search Username">
                            </td>
                            <td class="py-4" data-label="search">
                                <input type="text" id="searchEmail" class="shadow-none form-control bg-light font_normal_bold placeholder_text select-custom" placeholder="Search Email">
                            </td>
                            {{-- <td class="py-4" data-label="search">
                                <input type="text" id="searchMobile" class="shadow-none form-control bg-light font_normal_bold placeholder_text select-custom" placeholder="Search Phone">
                            </td> --}}
                            <td class="py-4" data-label="search">
                                <select class="form-select select_custom" id="selectRole">
                                    <option selected>Search Role</option>
                                    @foreach($roles as $role)
                                    <option value="{{$role['value']}}">{{$role['text']}}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td class="py-4" data-label="search">
                                <select class="form-select select_custom" id="searchStatus">
                                    <option selected>Search Status</option>
                                    <option value="1">Active</option>
                                    <option value="0">In-Active</option>
                                </select>
                            </td>
                            <td class="py-4" data-label="search"></td>
                            <td class="py-4" data-label="search"></td>
                        </tr>
                        @if(count($users()['data']) > 0)
                            @foreach($users()['data'] as $user)
                                <tr>
                                    <!-- <td class="py-4" data-label="last_seen">
                                        @if($user['last_seen'])
                                            @if($user['last_seen'] >= now()->subMinutes(2))
                                                <div class="d-flex align-items-center">
                                                    <span class="text-success">Online</span> 
                                                    <span class="d-block rounded-circle bg-success ms-1" style="height: 8px;width: 8px;"></span>
                                                </div>
                                            @else
                                                <span class="text-muted small">Last seen {{ \Carbon\Carbon::parse($user['last_seen'])->diffForHumans() }}</span>
                                            @endif
                                        @else
                                            --
                                        @endif
                                    </td> -->
                                    <td class="py-4" data-label="ip_address">
                                        @if($user['ip_address'])
                                            {{$user['ip_address']}}
                                        @else
                                            <span class="fs-tiny py-1 px-2 rounded bg_label_draft">Null</span>
                                        @endif
                                    </td>
                                    <td class="py-4" data-label="exam">{{$user['fullName']}}
                                        @if($user['last_seen'])
                                            @if($user['last_seen'] >= now()->subMinutes(2))
                                                <div class="d-flex align-items-center">
                                                    <span class="text-success last-seen-text">Online</span> 
                                                    <span class="d-block rounded-circle bg-success ms-1 small" style="height: 8px;width: 8px;"></span>
                                                </div>
                                            @else
                                                <br>
                                                <span class="text-muted last-seen-text">Last seen {{ \Carbon\Carbon::parse($user['last_seen'])->diffForHumans() }}</span>
                                            @endif
                                        @else
                                            <br>
                                            <span class="text-muted small">---</span>
                                        @endif  
                                    </td>
                                    <td class="py-4" data-label="completed">{{$user['userName']}}</td>
                                    <td class="py-4" data-label="completed">{{$user['email']}}</td>
                                    {{-- <td class="py-4" data-label="mobile">
                                        @if($user['mobile'])
                                            {{$user['mobile']}}
                                        @else
                                            <span class="fs-tiny py-1 px-2 rounded bg_label_draft">Null</span>
                                        @endif
                                    </td> --}}
                                    <td class="py-4" data-label="completed" class="text-capitalize">{{$user['role']}}</td>
                                    <td class="py-4" data-label="status">
                                        @if($user['status'])
                                            <span class="p-2 px-3 rounded small bg_label_published">Active</span>
                                        @else
                                            <span class="p-2 px-3 rounded small bg_label_draft">In-Active</span>
                                        @endif
                                    </td>
                                    <td class="py-4" data-label="groups">
                                        @if(count($user['groups']) > 0)
                                            @foreach($user['groups'] as $group)
                                                <span class="badge bg_primary_label me-1 text-none">{{ $group['name'] }}</span>
                                            @endforeach
                                        @endif
                                    </td>
                                    <td class="py-4" data-label="actions">
                                        <div class="border d-inline-flex dropdown rounded shadow-sm">
                                            <a class="nav-link dropdown-toggle" href="" data-bs-toggle="dropdown" aria-expanded="false">
                                                Actions
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-end p-0">
                                                <li>
                                                    <a class="dropdown-item cursor-pointer login" data-id="{{$user['id']}}">Login</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="/admin/users/{{$user['id']}}/edit">Edit</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item cursor-pointer delete" data-id="{{$user['id']}}">Delete</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="7" class="py-3 text-center">
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
                            <select name="row_selection" id="per_page_option" class="ms-2 btn bg_primary_label border border-rprimary px-1">
                                @if($users()['meta']['pagination']['per_page'] == 10)
                                <option value="10" selected>10</option>
                                @else
                                <option value="10">10</option>
                                @endif
                                @if($users()['meta']['pagination']['per_page'] == 20)
                                <option value="20" selected>20</option>
                                @else
                                <option value="20">20</option>
                                @endif
                                @if($users()['meta']['pagination']['per_page'] == 50)
                                <option value="50" selected>50</option>
                                @else
                                <option value="50">50</option>
                                @endif
                                @if($users()['meta']['pagination']['per_page'] == 100)
                                <option value="100" selected>100</option>
                                @else
                                <option value="100">100</option>
                                @endif
                            </select>
                        </div>
                        <div class="align-self-center">
                            @if($users()['meta']['pagination']['total'] > $users()['meta']['pagination']['count'])
                                @php
                                    // Retrieve the query parameters
                                    $queryParams = request()->query();
                        
                                    // Get previous and next links, using null coalescing operator to prevent undefined index error
                                    $previousLink = $users()['meta']['pagination']['links']['previous'] ?? null;
                                    $nextLink = $users()['meta']['pagination']['links']['next'] ?? null;
                        
                                    // Current page number
                                    $currentPage = $users()['meta']['pagination']['current_page'];
                        
                                    // Append lastSeen if it exists in the query parameters
                                    if (isset($queryParams['lastSeen'])) {
                                        $queryParams['lastSeen'] = 'true';
                                    }
                        
                                    // Function to build query string without the page parameter
                                    function buildQueryString($params) {
                                        // Remove 'page' key to avoid duplication and then rebuild query string
                                        unset($params['page']);
                                        return http_build_query($params);
                                    }
                        
                                    // Set page parameter for the Previous and Next links
                                    $previousPage = max(1, $currentPage - 1); // Prevent going below page 1
                                    $nextPage = $currentPage + 1;
                        
                                    // Update the links to include the correct page
                                    if ($previousLink) {
                                        $previousLink = preg_replace('/(\?|&)page=[^&]*/', '', $previousLink); // Remove existing page parameter
                                        $previousLink .= '?page=' . $previousPage . '&' . buildQueryString($queryParams);
                                    }
                                    if ($nextLink) {
                                        $nextLink = preg_replace('/(\?|&)page=[^&]*/', '', $nextLink); // Remove existing page parameter
                                        $nextLink .= '?page=' . $nextPage . '&' . buildQueryString($queryParams);
                                    }
                                @endphp
                                
                                @if($previousLink)
                                    <span>
                                        <a href="{{ $previousLink }}">
                                            <button class="btn btn-sm bg-label-dark">Previous</button>
                                        </a>
                                    </span>
                                @endif
                            @endif
                        
                            <span class="mx-2">
                                PAGE <span id="page_active">{{ $users()['meta']['pagination']['current_page'] }}</span> OF {{ $users()['meta']['pagination']['total_pages'] }}
                            </span>
                            
                            @if($users()['meta']['pagination']['total'] > $users()['meta']['pagination']['count'])
                                @if($nextLink)
                                    <span>
                                        <a href="{{ $nextLink }}">
                                            <button class="btn btn-sm bg-label-dark">Next</button>
                                        </a>
                                    </span>
                                @endif
                            @endif
                        </div>              
                    </div>
                </div>
            </div>
        </div>

        <!-- Create New user Modal -->
        <div class="modal fade" id="newUserModal" aria-labelledby="modalToggleLabel" tabindex="-1" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <!-- modal header  -->
                    <div class="modal-header">
                        <h5 class="modal-title text-dark" id="modalToggleLabel">Create New User</h5>
                        <button type="button" id="closeNewUser" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <!-- modal body  -->
                    <div class="modal-body">
                        <div class="form-input">

                            <div class="my-4">
                                <label>First Name</label>
                                <input type="text" id="firstName" class="form-control mt-3" placeholder="Enter First Name">
                                <span id="firstName_error" class="text-danger small"></span>
                            </div>

                            <div class="my-4">
                                <label>Last Name</label>
                                <input type="text" id="lastName" class="form-control mt-3" placeholder="Enter Second Name">
                                <span id="lastName_error" class="text-danger small"></span>
                            </div>

                            <div class="my-4">
                                <label>Email</label>
                                <input type="email" id="Email" class="form-control mt-3" placeholder="Enter Email">
                                <span id="Email_error" class="text-danger small"></span>
                            </div>

                            <div class="my-4">
                                <label>Username</label>
                                <input type="text" id="userName" class="form-control mt-3" placeholder="Enter Username">
                                <span id="userName_error" class="text-danger small"></span>
                            </div>

                            <div class="my-4">
                                <label>User Role</label>
                                <select class="form-select mt-3 mb-0" id="userRole">
                                    <!-- userGroups roles -->
                                    @foreach($roles as $role)
                                    <option value="{{$role['value']}}">{{$role['text']}}</option>
                                    @endforeach
                                </select>
                                <span id="userRole_error" class="text-danger small"></span>
                            </div>

                            <div class="my-4">
                                <label>User Groups (Optional)</label>
                                <select class="form-select my-3" id="userGroup" multiple>
                                    @foreach($userGroups as $userGroup)
                                    <option value="{{$userGroup['id']}}">{{$userGroup['name']}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="my-4">
                                <label>Password</label>
                                <input type="password" class="form-control mt-3" id="pass" placeholder="Enter Password" autocomplete="new-password">
                                <span id="password_error" class="text-danger small"></span>
                            </div>

                            <div class="mb-4 row">
                                <div class="col-12 col-sm-8">
                                    <div class="h6 mb-1 text-dark">Email Verified - 
                                        <span id="EmailActiveText">No</span>
                                    </div>
                                    <div class="lh-1 font-size-13">Yes (Email Verified). No (Email not verified).</div>
                                </div>
                                <div class="col-12 col-sm-4 d-flex align-items-center justify-content-sm-end">
                                    <label class="switch mt-2">
                                        <input id="EmailActive" type="checkbox" class="emailActive_field">
                                        <span class="slider round"></span>
                                    </label>
                                </div>

                            </div>

                            <div class="mb-4 row">
                                <div class="col-12 col-sm-8">
                                    <div class="h6 mb-1 text-dark">Status - <span id="isActiveText">In-active</span></div>
                                    <div class="lh-1 font-size-13">Active (Shown Everywhere). In-active (Hidden Everywhere).</div>
                                </div>
                                <div class="col-12 col-sm-4 d-flex align-items-center justify-content-sm-end">
                                    <label class="switch mt-2">
                                        <input id="isActive" type="checkbox">
                                        <span class="slider round"></span>
                                    </label>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- modal footer  -->
                    <div class="modal-footer">
                        <div class="w-100 text-end">
                            <div class="mb-1 font-size-13 text-danger" id="NewUserFormError"></div>
                                <button class="btn btn-primary" id="createNewUser">Create New User</button>
                            </div>
                        </div>
                    </div>     
                </div>
            </div>
        </div>

    </section>

    @include('parentsidebar.sidebarending')

    <script>
        $(document).ready(function(){
            // on keyup seaching 
            $('#searchName, #searchUserName, #searchEmail, #ipAddress').on('keyup', function(e) {
                var code = e.keyCode || e.which;
                if (code == 13) {
                    let ipAddress = $("#ipAddress").val();
                    let queryName = $("#searchName").val();
                    let queryUsername = $("#searchUserName").val();
                    let queryEmail = $("#searchEmail").val();
                    let testName = queryName ? "&fullName=" + queryName : "";
                    let testUsername = queryUsername ? "&userName=" + queryUsername : "";
                    let testEmail = queryEmail ? "&email=" + queryEmail : "";
                    let testIpAddress = ipAddress ? "&ipAddress=" + ipAddress : "";
                    let url = "/admin/users?" + testName + testUsername + testEmail + testIpAddress;
                    window.location.href = url;
                }
            });
            // $('#lastSeen').on('click', function() {
            //     window.location.href = "/admin/users?lastSeen=true";
            // });
            $("#lastSeen").on('change', function() {
                if($(this).val()) {
                    window.location.href = "/admin/users?lastSeen="+$(this).val();
                }
            });
            // on change seaching 
            $("#selectRole").on('change', function() {
                let selectRole = $(this).val();
                if (selectRole != "Search Role") {
                    let testRole = "&role=" + selectRole;
                    let queryName = $("#searchName").val();
                    let queryUsername = $("#searchUserName").val();
                    let queryEmail = $("#searchEmail").val();
                    let testName = queryName ? "&fullName=" + queryName : "";
                    let testUsername = queryUsername ? "&userName=" + queryUsername : "";
                    let testEmail = queryEmail ? "&email=" + queryEmail : "";
                    let url = "/admin/users?" + testName + testUsername + testEmail + testRole;
                    window.location.href = url;
                }
            })
            // on change seaching 
            $("#searchStatus").on('change', function() {
                let selectStatus = $(this).val();
                if (selectStatus != "Search Status") {
                    let testStatus = "&status=" + selectStatus;
                    let queryName = $("#searchName").val();
                    let queryUsername = $("#searchUserName").val();
                    let queryEmail = $("#searchEmail").val();
                    let testName = queryName ? "&fullName=" + queryName : "";
                    let testUsername = queryUsername ? "&userName=" + queryUsername : "";
                    let testEmail = queryEmail ? "&email=" + queryEmail : "";
                    let url = "/admin/users?" + testName + testUsername + testEmail + testStatus;
                    window.location.href = url;
                }
            });
            // new user 
            $("#createNewUser").click(function() {
                let firstName = $("#firstName").val();
                let lastName = $("#lastName").val();
                let Email = $("#Email").val();
                let userName = $("#userName").val();
                let userGroup = $("#userGroup").val();
                let userRole = $("#userRole").val();
                let password = $("#pass").val();

                // for first name 
                if (firstName == "") {
                    $("#firstName_error").removeClass("d-none")
                    $("#firstName_error").html("The first name field is required.")
                    $("#firstName").addClass("border-danger")
                } else {
                    $("#firstName").removeClass("border-danger")
                    $("#firstName_error").addClass("d-none")
                }
                // for last name  
                if (lastName == "") {
                    $("#lastName_error").removeClass("d-none")
                    $("#lastName_error").html("The last name field is required.")
                    $("#lastName").addClass("border-danger")
                } else {
                    $("#lastName").removeClass("border-danger")
                    $("#lastName_error").addClass("d-none")
                }
                // for email 
                if (Email == "") {
                    $("#Email_error").removeClass("d-none")
                    $("#Email_error").html("The email field is required.")
                    $("#Email").addClass("border-danger")
                } else {
                    $("#Email").removeClass("border-danger")
                    $("#Email_error").addClass("d-none")
                }
                // for Username 
                if (userName == "") {
                    $("#userName_error").removeClass("d-none")
                    $("#userName_error").html("The username field is required.")
                    $("#userName").addClass("border-danger")
                } else {
                    $("#userName").removeClass("border-danger")
                    $("#userName_error").addClass("d-none")
                }
                // for user role 
                if (userRole == null) {
                    $("#userRole_error").removeClass("d-none")
                    $("#userRole_error").html("The user role field is required.")

                } else {
                    $("#userRole_error").addClass("d-none")
                }
                // for password 
                if (password == "") {
                    $("#password_error").removeClass("d-none")
                    $("#password_error").html("The password field is required.")
                    $("#pass").addClass("border-danger")
                } else {
                    $("#pass").removeClass("border-danger")
                    $("#password_error").addClass("d-none")
                }
                // email is active 
                if (firstName && lastName && Email && userName && userRole && password) {
                    let EmailActive = $('#EmailActive').is(':checked');
                    let IsActive = $('#isActive').is(':checked');
                    $.ajax({
                        dataType: 'json',
                        type: "POST",
                        url: '/admin/users',
                        data: {
                            email: Email,
                            email_verified_at: EmailActive,
                            first_name: firstName,
                            is_active: IsActive,
                            last_name: lastName,
                            password: password,
                            role: userRole,
                            user_groups: userGroup,
                            user_name: userName,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(data) {
                            console.log(data);
                            if(data.success){
                                window.location.href = '/admin/users';
                            }
                        },
                        error: function(data, textStatus, errorThrown) {
                            console.log(textStatus);
                            var obj = data.responseJSON.errors;
                            let formError = obj[Object.keys(obj)[0]][0];
                            $("#NewUserFormError").text(formError);
                        },
                    });
                }

            })
            // user role 
            var userRole = new Choices('#userRole', {
                removeItemButton: true,
                searchEnabled: false
            }); 
            // user group 
            var userGroup = new Choices('#userGroup', {
                removeItemButton: true,
                searchEnabled: false
            });
            // rows perpage 
            $('#per_page_option').on('change', function(e) {
                var perPage = parseInt($(this).val());
                var pathname = window.location.pathname;
                var current_page = {!!str_replace("'", "\'", json_encode($users()['meta']['pagination']['current_page'])) !!};
                if (perPage == 10) {
                    window.location.href = pathname;
                } else {
                    window.location.href = pathname + "?page=" + current_page + "&perPage=" + perPage;
                }
            });
            // email active 
            $("#EmailActive").change(function(){
                let EmailActive = $(this).is(':checked');
                if(EmailActive){
                    $("#EmailActiveText").text("Yes");
                } else {
                    $("#EmailActiveText").text("No");
                }
            });
            // status active 
            $("#isActive").change(function(){
                let isActive = $(this).is(':checked');
                if(isActive){
                    $("#isActiveText").text("Active");
                } else {
                    $("#isActiveText").text("In-active");
                }
            });
            // form filled 
            $("#firstName, #lastName, #Email, #userName, #userRole, #userGroup, #password, #EmailActive, #isActive").change(function(){
                $("#NewUserFormError").text("");
            });
            // delete user  
            $(".delete").click(function() {
                let id = $(this).data("id");
                let _this = $(this);
                $.ajax({
                    type: "DELETE",
                    url: '/admin/users/'+id,
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
            $(".login").click(function() {
                let id = $(this).data("id");
                $.ajax({
                    type: "POST",
                    url: '/admin/user/login/'+id,
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        if(data.success){
                            window.location.href = data.url;
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