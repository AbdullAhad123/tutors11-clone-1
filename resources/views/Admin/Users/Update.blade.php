<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update User - {{$user['first_name']}} {{$user['last_name']}}</title>
    <!-- rel icon -->
    <link rel="icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}">
    <meta name="description" content="{{ app(\App\Settings\SiteSettings::class)->seo_description }}">
    <meta name="author" content="{{ app(\App\Settings\SiteSettings::class)->app_name }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
    <script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>
    <style>
        .select_custom {min-width: 160px;}
        .choices {margin-bottom: 0;}
        .font-size-13{font-size:13px}
    </style>
</head>

<body>
    @include('sidebar')
    @include('header')

    <section class="p-4">

        <h1 class="text-dark my-3 h2">Update User Details</h1>
        <h2 class="text-dark my-3 h4">{{$user['first_name']}} {{$user['last_name']}}</h2>

        <div class="bg-white form-input p-4 rounded-4 shadow my-4">

            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="my-4">
                        <label class="text-dark fw-medium" for="firstName">First Name</label>
                        <input type="text" id="firstName" class="form-control mt-3" placeholder="Enter First Name" value="{{$user['first_name']}}">
                        <span id="firstName_error" class="text-danger small"></span>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="my-4">
                        <label class="text-dark fw-medium" for="lastName">Last Name</label>
                        <input type="text" id="lastName" class="form-control mt-3" placeholder="Enter Last Name" value="{{$user['last_name']}}">
                        <span id="lastName_error" class="text-danger small"></span>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="mb-4">
                        <label class="text-dark fw-medium" for="Email">Email</label>
                        <input type="email" id="Email" class="form-control mt-3" placeholder="Enter Email" value="{{$user['email']}}">
                        <span id="Email_error" class="text-danger small"></span>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="mb-4">
                        <label class="text-dark fw-medium" for="userName">User Name</label>
                        <input type="text" id="userName" class="form-control mt-3" placeholder="Enter User Name" value="{{$user['user_name']}}">
                        <span id="userName_error" class="text-danger small"></span>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="mb-4">
                        <label class="text-dark fw-medium" for="userRole">User Role</label>
                        <select class="form-select mt-3 mb-0" id="userRole">
                            <option value="">Choose User Role</option>
                            @foreach($roles as $i => $role)
                                @if($role['text'] == $user_role)
                                    <option value="{{$role['value']}}" selected>{{$role['text']}}</option>
                                @else
                                    <option value="{{$role['value']}}">{{$role['text']}}</option>
                                @endif
                            @endforeach
                        </select>
                        <span id="userRole_error" class="text-danger small"></span>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="mb-4">
                        <label class="text-dark fw-medium" for="userGroup">User Groups</label>
                        <select class="form-select my-3" id="userGroup" multiple>
                            @foreach($selectedUserGroups as $key => $selectedUserGroup)
                                <option value="{{$selectedUserGroup}}" selected>{{$key}}</option>
                            @endforeach
                            @foreach($userGroups as $UserGroup)
                                @if(!in_array($UserGroup['id'], $selectedUserGroupsIds->toArray()))
                                    <option value="{{$UserGroup['id']}}">{{$UserGroup['name']}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
            
            </div>

            <div class="mb-4">
                <label class="text-dark fw-medium" for="pass">Password</label>
                <input type="password" class="form-control mt-3" id="pass" placeholder="Enter Password" autocomplete="new-password">
                <span id="password_error" class="text-danger small"></span>
            </div>

            <div class="mb-4 row">
                <div class="col-12 col-sm-8">
                    <div class="h6 mb-1 text-dark">Email Verified - 
                        <span id="EmailActiveText">
                            @if($user['email_verified_at'])
                                Yes
                            @else
                                No
                            @endif
                        </span>
                    </div>
                    <div class="lh-1 font-size-13">Yes (Email Verified). No (Email not verified).</div>
                </div>
                <div class="col-12 col-sm-4 d-flex align-items-center justify-content-sm-end">
                    <label class="switch mt-2">
                        @if($user['email_verified_at'])
                            <input id="EmailActive" type="checkbox" class="emailActive_field" checked>
                        @else
                            <input id="EmailActive" type="checkbox" class="emailActive_field">
                        @endif
                        <span class="slider round"></span>
                    </label>
                </div>

            </div>

            <div class="mb-4 row">
                <div class="col-12 col-sm-8">
                    <div class="h6 mb-1 text-dark">Status - 
                        <span id="isActiveText">
                            @if($user['is_active'])
                                Active
                            @else
                                In-active
                            @endif
                        </span>
                    </div>
                    <div class="lh-1 font-size-13">Active (Shown Everywhere). In-active (Hidden Everywhere).</div>
                </div>
                <div class="col-12 col-sm-4 d-flex align-items-center justify-content-sm-end">
                    <label class="switch mt-2">
                        @if($user['is_active'])
                            <input id="isActive" type="checkbox" checked>
                        @else
                            <input id="isActive" type="checkbox">
                        @endif
                        <span class="slider round"></span>
                    </label>
                </div>

            </div>

            <div class="modal-footer">
                <div class="w-100 text-end">
                    <div class="mb-1 font-size-13 text-danger" id="NewUserFormError"></div>
                    <button class="btn btn-primary" id="updateUser">Update</button>
                </div>
            </div>
        </div>

    </section>

    @include('parentsidebar.sidebarending')

        
    <script>
        let id = {!! str_replace("'", "\'", json_encode($user['id'])) !!};
        $("#updateUser").click(function() {
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
            // for user name 
            if (userName == "") {
                $("#userName_error").removeClass("d-none")
                $("#userName_error").html("The username field is required.")
                $("#userName").addClass("border-danger")
            } else {
                $("#userName").removeClass("border-danger")
                $("#userName_error").addClass("d-none")
            }
            // for user role 
            if (userRole == null || !userRole) {
                $("#userRole_error").removeClass("d-none")
                $("#userRole_error").html("The user role field is required.")

            } else {
                $("#userRole_error").addClass("d-none")
            }
            // for password 
            // if (password == "") {
            //     $("#password_error").removeClass("d-none")
            //     $("#password_error").html("The password field is required.")
            //     $("#pass").addClass("border-danger")
            // } else {
            //     $("#pass").removeClass("border-danger")
            //     $("#password_error").addClass("d-none")
            // }
            // email is active 




            if (firstName && lastName && Email && userName && userRole) {
                let EmailActive = $('#EmailActive').is(':checked');
                let IsActive = $('#isActive').is(':checked');
                $.ajax({
                    dataType: 'json',
                    type: "POST",
                    url: '/admin/users/'+id,
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


        var userRole = new Choices('#userRole', {
            shouldSort: false,
            removeItemButton: true,
            searchEnabled: false
        });

        var userGroup = new Choices('#userGroup', {
            removeItemButton: true,
            searchEnabled: true
        });
        $("#EmailActive").change(function(){
            let EmailActive = $(this).is(':checked');
            if(EmailActive){
                $("#EmailActiveText").text("Yes");
            } else {
                $("#EmailActiveText").text("No");
            }
        });
        $("#isActive").change(function(){
            let isActive = $(this).is(':checked');
            if(isActive){
                $("#isActiveText").text("Active");
            } else {
                $("#isActiveText").text("In-active");
            }
        });
        $("#firstName, #lastName, #Email, #userName, #userRole, #userGroup, #password, #EmailActive, #isActive").change(function(){
            $("#NewUserFormError").text("");
        });
    </script>

</body>

</html>