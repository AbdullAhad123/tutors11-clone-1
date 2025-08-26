<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/"
    data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Email Subscriptions - Admin Portal | {{ app(\App\Settings\SiteSettings::class)->app_name }}</title>
    <!-- rel icon -->
    <link rel="icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}">
    <meta name="description" content="{{ app(\App\Settings\SiteSettings::class)->seo_description }}">
    <meta name="author" content="{{ app(\App\Settings\SiteSettings::class)->app_name }}">
    <meta name="description" content="" />
    <!-- bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

</head>

<body>
    @include('sidebar')
    @include('header')

    <section class="p-4">
        <div class="bg-white shadow-sm rounded">
        <div class="table-responsive">
                <table class="table">
                    <thead class="bg-body-secondary">
                        <th scope="col" class="font_bold text-dark fs-6 py-3">SNO.</th>
                        <th scope="col" class="font_bold text-dark fs-6 py-3 w_180">EMAIL</th>
                        <th scope="col" class="font_bold text-dark fs-6 py-3 w_180">DATE</th>
                    </thead>
                    <tbody>
                        <tr class="row_bg_light">
                            <td class="py-4"></td>
                            <td class="py-4">
                                <input type="text" data-url="email" class="search shadow-none form-control bg-light font_normal_bold placeholder_text" placeholder="Search Email">
                            </td>
                            <td class="py-4" data-label="search"></td>
                        </tr>
                        @if(count($users()['data']) > 0)
                            @foreach($users()['data'] as $key => $user)
                                <tr>
                                    <td class="py-4 text-dark">{{++$key}}</td>
                                    <td class="py-4 text-dark">{{$user['email']}}</td>
                                    <td class="py-4 text-dark">{{$user['created_at']}}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="3" class="py-4">
                                    <h2 class="text-dark my-2 h5">
                                        NO RECORDS FOUND
                                    </h5>
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
                            <select name="row_selection" id="per_page_option" class="ms-2 btn btn-primary bg-label-primary px-1">
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
                            @isset($users()['meta']['pagination']['links']['previous'])
                            <span>
                                <a href="{{$users()['meta']['pagination']['links']['previous']}}"><button class="btn btn-sm bg-label-dark">previous</button></a>
                            </span>
                            @endisset
                            @endif
                            <span class="mx-2">
                                PAGE <span id="page_active">{{$users()['meta']['pagination']['current_page']}}</span> OF {{$users()['meta']['pagination']['total_pages']}}
                            </span>
                            @if($users()['meta']['pagination']['total'] > $users()['meta']['pagination']['count'])
                            @isset($users()['meta']['pagination']['links']['next'])
                            <span>
                                <a href="{{$users()['meta']['pagination']['links']['next']}}"><button class="btn btn-sm bg-label-dark">Next</button></a>
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

    <script>
        $(document).ready(function() {
            // row per page  
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
            $('.search').on('keyup', function(e) {
                var code = e.keyCode || e.which;
                if (code == 13) {
                    filterSearch($(this).data("url"), $(this).val());
                }
            });

            function filterSearch(key, value) {
                let urlParams = new URLSearchParams(window.location.search);
                let paramsObj = Array.from(urlParams.keys()).reduce(
                    (acc, val) => ({ ...acc, [val]: urlParams.get(val) }),
                    {}
                );
                if(Object.keys(paramsObj).length <= 0){
                    window.location.href = window.location.pathname + "?" + key + "=" + value;
                } else {
                    paramsObj[key] = value;
                    window.location.href = window.location.pathname + "?" + mergeQryStr(paramsObj);
                }
                function mergeQryStr(obj) {
                    let queryStr = "";
                    Object.keys(obj).forEach(key => {
                        queryStr += "&" + key + "=" + obj[key];
                    });
                    return queryStr;
                }
            }
            // ready ends 
        });

    </script>


</body>

</html>