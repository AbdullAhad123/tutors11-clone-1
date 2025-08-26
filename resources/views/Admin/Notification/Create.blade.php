<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Send Notification</title>
    <!-- rel icon -->
    <link rel="icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}">
    <meta name="description" content="{{ app(\App\Settings\SiteSettings::class)->seo_description }}">
    <meta name="author" content="{{ app(\App\Settings\SiteSettings::class)->app_name }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
    <script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>
    <!-- bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
        #users_wrap{display: none;}
        .cursor-default{cursor: default;}
    </style>
    
</head>
<body>
    @include('sidebar')
    @include('header')

    <section class="p-4">

        <div class="my-4">
            <h1 class="h2 my-2 text-dark">Send Notification</h1>
            <p class="text-dark fs-5 my-2">Admins have the ability to generate notifications, keeping users, parents, and teachers informed about new updates and important information.</p>
        </div>    

        <div class="bg-white shadow rounded-4 my-4 p-4">
            <div class="row">
                <div class="col-sm-6 col-12">
                    <div class="mb-4">
                        <label for="title">Title</label>
                        <input type="text" id="title" name="title" placeholder="Enter a title" class="form-control">
                    </div>
                </div>
                <div class="col-sm-6 col-12">
                    <div class="mb-4">
                        <label for="by_role_group">Send notification to role group</label>
                        <div class="form-check form-switch text-center">
                            <input class="form-check-input shadow-none border border-dark btn-lg" type="checkbox" role="switch" id="by_role_group" checked>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-12">
                    <div class="mb-4">
                        <label for="sms_alert">SMS alert</label>
                        <div class="form-check form-switch text-center">
                            <input class="form-check-input shadow-none border border-dark btn-lg" type="checkbox" role="switch" id="sms_alert">
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-12">
                    <div class="mb-4">
                        <label for="email_alert">E-mail alert</label>
                        <div class="form-check form-switch text-center">
                            <input class="form-check-input shadow-none border border-dark btn-lg" type="checkbox" role="switch" id="email_alert">
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-4" id="users_wrap">
                <div class="form-group dropdown">
                    <label for="user_Inp" class="mb-1">Select Users</label>
                    <div id="user_ids_wrap"></div>
                    <input id="user_Inp" type="text" class="form-control dropdown-toggle" data-id="" data-trigger="0" data-bs-toggle="dropdown" aria-expanded="true" placeholder="Search users" autocomplete="off">
                    <ul id="user_Dropdown" class="dropdown-menu w-100 p-0 overflow-auto">
                        <li class="dropdown-item text-center text-light" id="start_search">
                            Start typing to search users.
                        </li>
                    </ul>
                </div>
            </div>
            <div class="mb-4" id="roles_wrap">
                <label for="user_roles">Select User Roles</label>
                <select class="form-select mt-3 mb-0" id="user_roles" multiple>
                    @foreach($roles as $role)
                        <option class="text-capital" value="{{$role['value']}}">{{$role['text']}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="message">Message</label>
                <textarea id="message" name="message" placeholder="Enter a message" class="form-control"></textarea>
            </div>
            <div class="text-end">
                <div class="small text-danger mb-1" id="error"></div>
                <button class="btn btn-primary" id="send">Send</button>
            </div>
        </div>

    </section>

    @include('parentsidebar.sidebarending')

    <script>
        var user_roles = new Choices('#user_roles', {
            shouldSort: false,
            removeItemButton: true,
            searchEnabled: true,
            placeholder: true, // Add a placeholder
            placeholderValue: 'Select user groups', // Set the placeholder text
        });
        $("#by_role_group").change(function(){
            if($(this).is(':checked')){
                $("#users_wrap").hide();
                $("#roles_wrap").show();
            } else {
                $("#roles_wrap").hide();
                $("#users_wrap").show();
            }
        });
        $("#send").click(function(){
            let title = $("#title").val();
            let message = $("#message").val();
            let selected_user_roles = $("#user_roles").val();
            let by_role_group = $("#by_role_group").is(':checked');
            let sms_alert = $("#sms_alert").is(':checked');
            let email_alert = $("#email_alert").is(':checked');
            let selected_users = $("#user_ids_wrap span").map(function() {
                return $(this).data("id");
            }).get();
            if(title){
                if(message){
                    console.log(selected_user_roles.length, selected_user_roles.length > 0, by_role_group);
                    if(by_role_group){
                        if(selected_user_roles.length > 0){
                            sendNotification();
                        } else {
                            $("#error").text("Role group field is required, when send to role group is enabled!");
                        }
                    } else {
                        if(selected_users.length > 0){
                            sendNotification();
                        } else {
                            $("#error").text("User field is required, when send to role group is disabled!");
                        }
                    }
                } else {
                    $("#error").text("Please enter a message!");
                }
            } else {
                $("#error").text("Please enter a title!");
            } 
            function sendNotification() {
                $.ajax({
                    dataType: 'json',
                    type: "POST",
                    url: '/admin/send/notification',
                    data: {
                        title: title,
                        message: message,
                        sms_alert: sms_alert,
                        email_alert: email_alert,
                        by_role_group: by_role_group,
                        selected_users: selected_users,
                        selected_user_roles: selected_user_roles,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        if(data.success){
                            window.location.href = '/admin/notifications/show';
                        }
                    },
                    error: function(data, textStatus, errorThrown) {
                        var obj = data.responseJSON.errors;
                        let formError = obj[Object.keys(obj)[0]][0];
                        $("#error").text(formError);
                    },
                });
            }
        });

        $(document).on("keyup","#user_Inp", function(e){
            $("#user_Dropdown").empty();
            var search_query = $(this).val();
            if(search_query.length > 0) {
                var dataIdsArray = $("#user_ids_wrap span").map(function() {
                    return $(this).data("id");
                }).get();
                $.ajax({
                    type: "GET",
                    url: '/admin/search_users',
                    data: {
                        query: search_query,
                        notIds: dataIdsArray,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        let arrLength = data['users'].length;
                        if(arrLength > 0) {
                            data['users'].forEach(function(user){
                                $("#user_Dropdown").append('<li class="dropdown-item cursor-pointer py-1 px-3 select_user" data-id="'+user.id+'">'+user.name+'</li>');
                            });
                        } else {
                            if($("#user_Dropdown").children().length == 0){
                                $("#user_Dropdown").append('<li class="dropdown-item text-danger text-center">No Result Found</li>');
                            }
                        }

                    },
                    error: function(data, textStatus, errorThrown) {
                        console.log(textStatus);
                        console.log(data);
                    },
                });
            } else {
                $("#user_Dropdown").append('<li class="dropdown-item text-center text-light" id="start_search">Start typing to search.</li>');
            }
        });
        $(document).on("click",".select_user", function(e){
            let id = $(this).data("id");
            let name = $(this).text();
            $("#user_ids_wrap").append(`<span class="badge bg-label-primary py-1 mb-2 me-2 cursor-default" data-id="`+id+`">`+name+` <i class="bx bx-x fs-big d-inline cursor-pointer remove_user"></i></span>`);
            $(".select_user[data-id='"+id+"']").remove();
        });
        $(document).on("click",".remove_user", function(e){
            $(this).parent().remove();
        });
    </script>

    
</body>
</html>