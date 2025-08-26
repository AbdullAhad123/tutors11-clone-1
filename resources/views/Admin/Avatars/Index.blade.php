<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Avatars</title>
    <!-- rel icon -->
    <link rel="icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <meta name="description" content="{{ app(\App\Settings\SiteSettings::class)->seo_description }}">
    <meta name="author" content="{{ app(\App\Settings\SiteSettings::class)->app_name }}">
    <!-- bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <style>
            .w_350 {min-width: 350px}
            .w_300 {min-width: 300px}
            .w_280 {min-width: 280px}
            .w_250 {min-width: 250px}
            .w_200 {min-width: 200px}
            .w_180 {min-width: 180px}
            .w_150 {min-width: 150px}
        </style>
</head>

<body>
    @include('sidebar')
    @include('header')

    <section class="p-4">

        <div class="my-4">
            <h1 class="text-dark my-2">Avatars</h1>
            <p class="text-dark fs-6 my-2">User avatars play a crucial role in engaging users by adding a personal touch to online interactions.</p>
        </div>

        <div id="pageMessage" class="my-4">
            @if (Session::has('success'))
                    <div class="alert 
                    @if (Session::get('success') == 'true')
                        alert-success text-black
                    @else
                        alert-danger
                    @endif
                     shadow-sm">
                        {{Session::get('message')}}
                    </div>
            @endif
        </div>

        <div class="bg-white rounded-4 shadow">
            <div class="align-items-center d-flex justify-content-between mb-4 p-3 px-4">
                <h2 class="h4 text-dark m-0">Manage Avatars</h2>
                <a href="{{route('create_avatar')}}"><button class="btn rounded-2 text-uppercase create_new_btn text-white"><i class='bx bx-plus-circle mb-1 text-white'></i>Create new</button></a>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead class="bg-body-secondary">
                        <th scope="col" class="font_bold fs-6 py-3 text_black">SNO</th>
                        <th scope="col" class="font_bold fs-6 py-3 text_black w_250 ">TITLE</th>
                        <th scope="col" class="font_bold fs-6 py-3 text_black w_250">AVATAR</th>
                        <th scope="col" class="font_bold fs-6 py-3 text_black w_250">REDEEM POINTS</th>
                        <th scope="col" class="font_bold fs-6 py-3 text_black w_280">DESCRIPTION</th>
                        <th scope="col" class="font_bold fs-6 py-3 text_black w_150">STATUS</th>
                        <th scope="col" class="font_bold fs-6 py-3 text_black w_200">CREATED BY</th>
                        <th scope="col" class="font_bold fs-6 py-3 text_black w_180">CREATED AT</th>
                        <th scope="col" class="font_bold fs-6 py-3 text_black w_150">ACTIONS</th>
                    </thead>
                    <tbody>
                        <tr class="row_bg_light">
                            <td class="py-4"></td>
                            <td class="py-4" data-label="title">
                                @if(request()->has('title'))
                                    <input type="text" data-url="title" value="{{ request('title') }}" class="search shadow-none form-control bg-light font_normal_bold placeholder_text" placeholder="Search Title">
                                @else
                                    <input type="text" data-url="title" class="search shadow-none form-control bg-light font_normal_bold placeholder_text" placeholder="Search Title">                                
                                @endif
                            </td>
                            <td class="py-4" data-label="path">
                                @if(request()->has('path'))
                                    <input type="text" data-url="path" value="{{ request('path') }}" class="search shadow-none form-control bg-light font_normal_bold placeholder_text" placeholder="Search Avatar Path">
                                @else
                                    <input type="text" data-url="path" class="search shadow-none form-control bg-light font_normal_bold placeholder_text" placeholder="Search Avatar Path">
                                @endif
                            </td>
                            <td class="py-4" data-label="points">
                                @if(request()->has('points'))
                                    <input type="text" data-url="points" value="{{ request('points') }}" class="search shadow-none form-control bg-light font_normal_bold placeholder_text" placeholder="Search Description">
                                @else
                                    <input type="text" data-url="points" class="search shadow-none form-control bg-light font_normal_bold placeholder_text" placeholder="Search Description">
                                @endif
                            </td>
                            <td class="py-4" data-label="description">
                                @if(request()->has('description'))
                                    <input type="text" data-url="description" value="{{ request('description') }}" class="search shadow-none form-control bg-light font_normal_bold placeholder_text" placeholder="Search Description">
                                @else
                                    <input type="text" data-url="description" class="search shadow-none form-control bg-light font_normal_bold placeholder_text" placeholder="Search Description">
                                @endif
                            </td>
                            <td class="py-4"></td>
                            <td class="py-4" data-label="created_by">
                                <input type="text" data-url="created_by" class="search shadow-none form-control bg-light font_normal_bold placeholder_text" placeholder="Search User">
                            </td>
                            <td class="py-4"></td>
                            <td class="py-4"></td>
                        </tr>
                        @if($avatars()['meta']['pagination']['count'] > 0)
                            @foreach($avatars()['data'] as $key => $avatar)
                                <tr>
                                    <td class="py-4">{{++$key}}</td>
                                    <td class="py-4">{{$avatar['title']}}</td>
                                    <td class="py-4">
                                        <a href="{{$avatar['path']}}" target="_blank">
                                            <img class="rounded" src="{{$avatar['path']}}" alt="{{$avatar['title']}}" width="50">
                                        </a> 
                                    </td>
                                    <td class="py-4">{{$avatar['points']}}</td>
                                    <td class="py-4">{{$avatar['description']}}</td>
                                    <td class="py-4">
                                        <span class="badge 
                                            @if($avatar['is_active'])
                                                bg-label-primary
                                            @else
                                                bg-label-danger                                            
                                            @endif
                                            ">
                                                @if($avatar['is_active'])
                                                    Active
                                                @else
                                                    In-active
                                                @endif
                                        </span>
                                    </td>
                                    <td class="py-4">{{$avatar['created_by']}}</td>
                                    <td class="py-4">{{$avatar['created_at']}}</td>
                                    <td class="py-4" data-label="actions">
                                        <div class="border d-inline-flex dropdown rounded shadow-sm">
                                            <a class="nav-link dropdown-toggle text-dark" href="" data-bs-toggle="dropdown" aria-expanded="false">
                                                Actions
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-end p-0">
                                                <li>
                                                    <a class="dropdown-item" href="{{route('edit_avatar', ['id' => $avatar['id']])}}">Edit</a>
                                                </li>
                                                <li>
                                                    <form action="{{route('delete_avatar', ['id' => $avatar['id']])}}" method="POST">
                                                        @csrf
                                                        <input class="dropdown-item" type="submit" value="Delete">
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="9" class="py-3">
                                    <h2 class="text-black my-2 h5 pt-3">
                                        NO RECORDS FOUND
                                    </h2>
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
                                @if($avatars()['meta']['pagination']['per_page'] == 10)
                                <option value="10" selected>10</option>
                                @else
                                <option value="10">10</option>
                                @endif
                                @if($avatars()['meta']['pagination']['per_page'] == 20)
                                <option value="20" selected>20</option>
                                @else
                                <option value="20">20</option>
                                @endif
                                @if($avatars()['meta']['pagination']['per_page'] == 50)
                                <option value="50" selected>50</option>
                                @else
                                <option value="50">50</option>
                                @endif
                                @if($avatars()['meta']['pagination']['per_page'] == 100)
                                <option value="100" selected>100</option>
                                @else
                                <option value="100">100</option>
                                @endif
                            </select>
                        </div>

                        <div class="align-self-center">
                            @if($avatars()['meta']['pagination']['total'] > $avatars()['meta']['pagination']['count'])
                            @isset($avatars()['meta']['pagination']['links']['previous'])
                            <span>
                                <button class="btn btn-sm bg-label-dark page_btn" data-url="prev">previous</button>
                            </span>
                            @endisset
                            @endif
                            <span class="mx-2">
                                PAGE <span id="page_active">{{$avatars()['meta']['pagination']['current_page']}}</span> OF {{$avatars()['meta']['pagination']['total_pages']}}
                            </span>
                            @if($avatars()['meta']['pagination']['total'] > $avatars()['meta']['pagination']['count'])
                            @isset($avatars()['meta']['pagination']['links']['next'])
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css">

    <script>
        $(document).ready(function(){
            var current_page = {!!str_replace("'", "\'", json_encode($avatars()['meta']['pagination']['current_page'])) !!};
            // row per page 
            $('#per_page_option').on('change', function(e) {
                var perPage = parseInt($(this).val());
                var pathname = window.location.pathname;
                filterSearch("perPage", perPage);
            });
            $('.page_btn').on('click', function(e) {
                filterSearch("page", $(this).data("url") == "next" ? current_page + 1 : current_page - 1);
            });
            // on keyup search  
            $('.search').on('keyup', function(e) {
                var code = e.keyCode || e.which;
                if (code == 13) {
                    filterSearch($(this).data("url"), $(this).val());
                }
            });
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
    </script>

</body>

</html>