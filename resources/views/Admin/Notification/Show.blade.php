<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Notifications - Admin Portal </title>
    <!-- rel icon -->
    <link rel="icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}">
    <meta name="description" content="{{ app(\App\Settings\SiteSettings::class)->seo_description }}">
    <meta name="author" content="{{ app(\App\Settings\SiteSettings::class)->app_name }}">
    <!-- bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
        .select_custom {
            min-width: 160px;
        }
        .custom_tooltip{
            display: none;
            max-height: 200px;
            min-height: 60px;
            overflow-y: scroll;
            overflow-x: visible;
        }
        .custom_tooltip_wrap:hover .custom_tooltip{
            display: block;
        }
    </style>
</head>

<body>
    @include('sidebar')
    @include('header')

    <section class="p-4">
        <div class="my-4">
            <h1 class="text-dark my-2">Manage Notifications</h1>
            <p class="text-dark fs-5 my-3">Seamlessly communicate with users through instant notifications, ensuring timely updates and efficient information delivery.</p>
        </div>

        <div id="pageMessage" class="my-4"></div>

        <div class="bg-white rounded-4 shadow">
            <div class="align-items-center d-flex justify-content-between mb-4 p-3 px-4">
                <h2 class="h4 text-dark m-0">Notifications</h2>
                <a href="{{route('create_notification')}}"><button class="btn rounded-2 text-uppercase create_new_btn text-white "><i class='bx bx-plus-circle mb-1 text-white'></i>Create new</button></a>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead class="bg-body-secondary">
                        <th scope="col" class="font_bold w_200 py-3 fs-6 text-dark">TITLE</th>
                        <th scope="col" class="font_bold w_400 py-3 fs-6 text-dark">MESSAGE</th>
                        <th scope="col" class="font_bold w_180 py-3 fs-6 text-dark">SMS ALERT</th>
                        <th scope="col" class="font_bold w_180 py-3 fs-6 text-dark">EMAIL ALERT</th>
                        <th scope="col" class="font_bold w_180 py-3 fs-6 text-dark">DATE</th>
                        <th scope="col" class="font_bold w_180 py-3 fs-6 text-dark">ACTIONS</th>
                    </thead>
                    <tbody>
                        <tr class="row_bg_light">
                            <td class="py-4" data-label="search">
                                <input type="text" id="searchTitle" data-url="title" class="shadow-none form-control bg-light font_normal_bold placeholder_text select-custom" placeholder="Search Title">
                            </td>
                            <td class="py-4" data-label="search">
                                <input type="text" id="searchMessage" data-url="message" class="shadow-none form-control bg-light font_normal_bold placeholder_text select-custom" placeholder="Search Message">
                            </td>
                            <td class="py-4" data-label="search"></td>
                            <td class="py-4" data-label="search"></td>
                            <td class="py-4" data-label="search"></td>
                            <td class="py-4" data-label="search"></td>
                        </tr>
                        @if(count($notifications_data()['data']) > 0)
                            @foreach($notifications_data()['data'] as $notification)
                                <tr>
                                    <td class="py-4" data-label="title" class="custom_tooltip_wrap position-relative">
                                        {{$notification['title']}}
                                        <div class="bg-dark custom_tooltip position-absolute px-3 py-2 rounded-1 start-100 text-white top-50 w-px-200">
                                            @foreach($notification['users']['data'] as $user)
                                                <small class="tooltip_content d-flex justify-content-between align-items-center">
                                                    <span>{{$user['name']}}</span>
                                                    @if($user['read'])
                                                        <i class="bx bx-check-double text-success"></i>
                                                    @else
                                                        <i class="bx bx-check"></i>
                                                    @endif
                                                </small>
                                            @endforeach
                                        </div>
                                    </td>
                                    <td class="text-dark py-4" data-label="exam">{{$notification['message']}}</td>
                                    <td class="py-4" data-label="status">
                                        <span class="p-2 px-3 rounded small 
                                                @if($notification['sms'])   
                                                    bg_label_published
                                                @else
                                                    bg_label_draft
                                                @endif
                                                ">
                                            @if($notification['sms'])
                                                On
                                            @else
                                                Off
                                            @endif
                                        </span>
                                    </td>
                                    <td class="py-4" data-label="status">
                                        <span class="p-2 px-3 rounded small 
                                                @if($notification['email'])   
                                                    bg_label_published
                                                @else
                                                    bg_label_draft
                                                @endif
                                                ">
                                            @if($notification['email'])
                                                On
                                            @else
                                                Off
                                            @endif
                                        </span>
                                    </td>
                                    <td class="text-dark py-4" data-label="exam">{{$notification['created_at']}}</td>
                                    <td class="py-4" data-label="actions">
                                        <div class="border d-inline-flex dropdown rounded shadow-sm">
                                            <a class="nav-link dropdown-toggle" href="" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                Action
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-end p-0">
                                                <li>
                                                    <a class="dropdown-item cursor-pointer delete" data-id="{{$notification['id']}}">Delete</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6" class="py-4">
                                    <h2 class="text-dark text-center h5">NO RECORDS FOUND</h2>
                                    <div class="text-center my-3">
                                        <a href="{{route('create_notification')}}"><button class="btn rounded-2 text-uppercase create_new_btn text-white "><i class='bx bx-plus-circle mb-1 text-white'></i>Create new</button></a>
                                    </div>
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
                            <select name="row_selection" id="per_page_option"
                                class="ms-2 btn btn-primary bg_primary_label px-1">
                                @if($notifications_data()['meta']['pagination']['per_page'] == 10)
                                <option value="10" selected>10</option>
                                @else
                                <option value="10">10</option>
                                @endif
                                @if($notifications_data()['meta']['pagination']['per_page'] == 20)
                                <option value="20" selected>20</option>
                                @else
                                <option value="20">20</option>
                                @endif
                                @if($notifications_data()['meta']['pagination']['per_page'] == 50)
                                <option value="50" selected>50</option>
                                @else
                                <option value="50">50</option>
                                @endif
                                @if($notifications_data()['meta']['pagination']['per_page'] == 100)
                                <option value="100" selected>100</option>
                                @else
                                <option value="100">100</option>
                                @endif
                            </select>
                        </div>
                        <div class="align-self-center">
                            @if($notifications_data()['meta']['pagination']['total'] > $notifications_data()['meta']['pagination']['count'])
                            @isset($notifications_data()['meta']['pagination']['links']['previous'])
                            <span>
                                <a href="{{$notifications_data()['meta']['pagination']['links']['previous']}}"><button
                                        class="btn btn-sm bg-label-dark">previous</button></a>
                            </span>
                            @endisset
                            @endif
                            <span class="mx-2">
                                PAGE <span id="page_active">{{$notifications_data()['meta']['pagination']['current_page']}}</span>
                                OF {{$notifications_data()['meta']['pagination']['total_pages']}}
                            </span>
                            @if($notifications_data()['meta']['pagination']['total'] > $notifications_data()['meta']['pagination']['count'])
                            @isset($notifications_data()['meta']['pagination']['links']['next'])
                            <span>
                                <a href="{{$notifications_data()['meta']['pagination']['links']['next']}}"><button
                                        class="btn btn-sm bg-label-dark">Next</button></a>
                            </span>
                            @endisset
                            @endif
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    @include('parentsidebar.sidebarending')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css">


    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip({
                html: true, // Allow HTML content in tooltips
            });
            // on keyup search 
            $('#searchTitle, #searchMessage').on('keyup', function(e) {
                var code = e.keyCode || e.which;
                if (code == 13) {
                    let queryTitle = $("#searchTitle").val();
                    let queryMessage = $("#searchMessage").val();
                    let testTitle = queryTitle ? "&title=" + queryTitle : "";
                    let testMessage = queryMessage ? "&message=" + queryMessage : "";
                    let url = "/admin/notifications/show?" + testTitle + testMessage;
                    window.location.href = url;
                }
            });
            // row per page 
            $('#per_page_option').on('change', function(e) {
                var perPage = parseInt($(this).val());
                var pathname = window.location.pathname;
                var current_page = {!!str_replace("'", "\'", json_encode($notifications_data()['meta']['pagination']['current_page'])) !!};
                if (perPage == 10) {
                    window.location.href = pathname;
                } else {
                    window.location.href = pathname + "?page=" + current_page + "&perPage=" + perPage;
                }
            });
            // delete row 
            $(".delete").click(function() {
                let id = $(this).data("id");
                let _this = $(this);
                $.ajax({
                    type: "POST",
                    url: '/admin/notification-delete/'+id,
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        $("#pageMessage").empty();
                        if(data.success){
                            _this.parents("tr").remove();
                            $("#pageMessage").append('<div class="alert_success rounded-3 p-3 d-flex align-items-center"><i class="bx bx-check-circle me-1 fs-5"></i> ' + data.message + '</div>');
                        } else {
                            $("#pageMessage").append('<div class="alert_failed rounded-3 p-3 d-flex align-items-center"><i class="bx bx-error-circle me-1 fs-5"></i> ' + data.message + '</div>');
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