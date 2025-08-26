<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Software Errors - Admin Portal
    </title>
    <!-- rel icon -->
    <link rel="icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}">
    <meta name="description" content="{{ app(\App\Settings\SiteSettings::class)->seo_description }}">
    <meta name="author" content="{{ app(\App\Settings\SiteSettings::class)->app_name }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
    <script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>
    <!-- bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
        .font-size-13{font-size:13px;}
        .date{min-width: 200px;}
        #searchUser, #searchIp{min-width: 150px;}
        #searchMessage{min-width: 300px;}
    </style>
</head>

<body>
    @include('sidebar')
    @include('header')

    <section class="p-4">

        <div class="my-4">
            <h1 class="text-dark my-2">Errors</h1>
            <p class="text-dark my-2 fs-5">Effortlessly monitor errors on the website and portal for streamlined tracking and resolution.</p>
        </div>

        <div id="pageMessage" class="my-4"></div>

        <div class="bg-white rounded-4 shadow my-4">

            <div class="table-responsive">
                <table class="table">
                    <thead class="bg-body-secondary">
                        <th scope="col" class="font_bold text-dark fs-6 py-3 w_160">STATUS CODE</th>
                        <th scope="col" class="font_bold text-dark fs-6 py-3 w_200">USER ID</th>
                        <th scope="col" class="font_bold text-dark fs-6 py-3 w_160">IP</th>
                        <th scope="col" class="font_bold text-dark fs-6 py-3">URL</th>
                        <th scope="col" class="font_bold text-dark fs-6 py-3 w_160">LINE</th>
                        <th scope="col" class="font_bold text-dark fs-6 py-3 w_180">FILE NAME</th>
                        <th scope="col" class="font_bold text-dark fs-6 py-3 w_180">MESSAGE</th>
                        <th scope="col" class="font_bold text-dark fs-6 py-3 w_200">DATE</th>
                    </thead>
                    <tbody>
                        <tr class="row_bg_light">
                            <td class="py-4" data-label="search"></td>
                            <td class="py-4" data-label="search">
                                <input type="text" id="searchUser" class="shadow-none form-control bg-light font_normal_bold placeholder_text" placeholder="Search User Id">
                            </td>
                            <td class="py-4" data-label="search">
                                <input type="text" id="searchIp" class="shadow-none form-control bg-light font_normal_bold placeholder_text" placeholder="Search Ip">
                            </td>
                            <td class="py-4" data-label="search">
                                <input type="text" id="searchUrl" class="shadow-none form-control bg-light font_normal_bold placeholder_text" placeholder="Search Url">
                            </td>
                            <td class="py-4" data-label="search"></td>
                            <td class="py-4" data-label="search">
                                <input type="text" id="searchFileName" class="shadow-none form-control bg-light font_normal_bold placeholder_text" placeholder="Search File Name">
                            </td>
                            <td class="py-4" data-label="search">
                                <input type="text" id="searchMessage" class="shadow-none form-control bg-light font_normal_bold placeholder_text" placeholder="Search Message">
                            </td>
                            <td class="py-4" data-label="search"></td>
                        </tr>
                        @if(count($errors()['data']) > 0)
                            @foreach($errors()['data'] as $error)
                                <tr>
                                    <td class="py-4">{{$error['code']}}</td>
                                    <td class="py-4">{{$error['user_id']}}</td>
                                    <td class="py-4">{{$error['ip']}}</td>
                                    <td class="py-4">{{$error['url']}}</td>
                                    <td class="py-4">{{$error['line']}}</td>
                                    <td class="py-4">{{$error['filename']}}</td>
                                    <td class="py-4">{{$error['message']}}</td>
                                    <td class="py-4">{{$error['date']}}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="8" class="py-3 text-center">
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
                            <select name="row_selection" id="per_page_option" class="ms-2 btn btn-primary bg-label-primary px-1">
                                @if($errors()['meta']['pagination']['per_page'] == 10)
                                <option value="10" selected>10</option>
                                @else
                                <option value="10">10</option>
                                @endif
                                @if($errors()['meta']['pagination']['per_page'] == 20)
                                <option value="20" selected>20</option>
                                @else
                                <option value="20">20</option>
                                @endif
                                @if($errors()['meta']['pagination']['per_page'] == 50)
                                <option value="50" selected>50</option>
                                @else
                                <option value="50">50</option>
                                @endif
                                @if($errors()['meta']['pagination']['per_page'] == 100)
                                <option value="100" selected>100</option>
                                @else
                                <option value="100">100</option>
                                @endif
                            </select>
                        </div>

                        <div class="align-self-center">
                            @if($errors()['meta']['pagination']['total'] > $errors()['meta']['pagination']['count'])
                            @isset($errors()['meta']['pagination']['links']['previous'])
                            <span>
                                <button class="btn btn-sm bg-label-dark page_btn" data-url="prev">previous</button>
                            </span>
                            @endisset
                            @endif
                            <span class="mx-2">
                                PAGE <span id="page_active">{{$errors()['meta']['pagination']['current_page']}}</span> OF {{$errors()['meta']['pagination']['total_pages']}}
                            </span>
                            @if($errors()['meta']['pagination']['total'] > $errors()['meta']['pagination']['count'])
                            @isset($errors()['meta']['pagination']['links']['next'])
                            <span>
                                <button class="btn btn-sm bg-label-dark page_btn" data-url="next">Next</button>
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
        $(function(){
            var current_page = {!!str_replace("'", "\'", json_encode($errors()['meta']['pagination']['current_page'])) !!};
            $("#per_page_option").change(function(){
                filterSearch("perPage", $(this).val())
            });
            $('.page_btn').on('click', function(e) {
                filterSearch("page", $(this).data("url") == "next" ? current_page + 1 : current_page - 1);
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
        });
    </script>

    

</body>

</html>