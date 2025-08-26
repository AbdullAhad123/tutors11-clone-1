<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ app(\App\Settings\SiteSettings::class)->app_name }} - Manage Reviews</title>
    <!-- rel icon -->
    <link rel="icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <meta name="description" content="{{ app(\App\Settings\SiteSettings::class)->seo_description }}">
    <meta name="author" content="{{ app(\App\Settings\SiteSettings::class)->app_name }}">
    <!-- bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    @include('sidebar')
    @include('header')
    
    <section class="p-4">

        <div class="my-4">
            <h1 class="text-dark my-2">Manage Reviews</h1>
            <p class="text-dark fs-5 my-3">Easily manage, add, and update website reviews for a curated and up-to-date user experience.</p>
        </div>

        <div id="pageMessage" class="my-4">
            @if (Session::has('success'))
                <div class="alert_success rounded-3 p-3 d-flex align-items-center">
                    {{Session::get('message')}}
                </div>
            @endif
            @if (Session::has('success') && Session::get('success') == 'false')
                <div class="alert_failed rounded-3 p-3 d-flex align-items-center">
                    {{Session::get('message')}}
                </div>
            @endif
        </div>

        <div class="bg-white rounded-4 shadow">
            <div class="align-items-center d-flex justify-content-between mb-4 p-3 px-4">
                <h2 class="h4 text-dark m-0">Reviews</h2>
                <a href="{{route('create_review')}}"><button class="btn rounded-2 text-uppercase create_new_btn text-white "><i class='bx bx-plus-circle mb-1 text-white'></i>Create new</button></a>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead class="bg-body-secondary">
                        <th scope="col" class="font_bold text-dark py-3 fs-6 w_200">NAME</th>
                        <th scope="col" class="font_bold text-dark py-3 fs-6 w_350">IMAGE</th>
                        <th scope="col" class="font_bold text-dark py-3 fs-6 w_200">RATING</th>
                        <th scope="col" class="font_bold text-dark py-3 fs-6 w_400">MESSAGE</th>
                        <th scope="col" class="font_bold text-dark py-3 fs-6 w_180">DATE</th>
                        <th scope="col" class="font_bold text-dark py-3 fs-6 w_160">ACTIONS</th>
                    </thead>
                    <tbody>
                        <tr class="row_bg_light">
                            <td class="py-4" data-label="search">
                                <input type="text" data-url="name" class="search shadow-none form-control bg-light font_normal_bold placeholder_text" placeholder="Search Name">
                            </td>
                            <td></td>
                            <td></td>
                            <td class="py-4" data-label="search">
                                <input type="text" data-url="message" class="search shadow-none form-control bg-light font_normal_bold placeholder_text" placeholder="Search Message">
                            </td>
                            <td class="py-4" data-label="section"></td>
                            <td class="py-4" data-label="section"></td>
                        </tr>
                        @if($reviews()['meta']['pagination']['count'] > 0)
                            @foreach($reviews()['data'] as $review)
                                <tr>
                                    <td class="py-4 text-dark">{{$review['name']}}</td>
                                    <td class="py-4">
                                        @if($review['user_image'] != '--')
                                            <img class="rounded w-auto" src="{{url($review['user_image'])}}" alt="{{$review['name']}}">
                                        @else
                                            <div class="review_avatar align-items-center d-flex h-px-40 justify-content-center rounded-circle text-center text-white w-px-40" style="background-color: {{$review['random_color']}};">{{$review['first_letter']}}</div>
                                        @endif
                                    </td>
                                    <td class="py-4">
                                        <div class="d-flex">
                                            @for ($i = 0; $i < 5; $i++)
                                                @if($i < $review['rating'])
                                                    <i class="fa fa-star me-1 text-warning"></i>
                                                @else
                                                    <i class="fa fa-star me-1"></i>                                    
                                                @endif
                                            @endfor
                                        </div>
                                    </td>
                                    <td class="py-4 text-dark">{{$review['message']}}</td>
                                    <td class="py-4 text-dark">{{$review['date']}}</td>
                                    <td class="py-4 text-dark" data-label="actions">
                                        <div class="border d-inline-flex dropdown rounded shadow-sm">
                                            <a class="nav-link dropdown-toggle text-dark" href="" data-bs-toggle="dropdown" aria-expanded="false">
                                                Actions
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-end p-0">
                                                <li>
                                                    <a class="dropdown-item" href="{{route('update_review', ['id' => $review['id']])}}">Edit</a>
                                                </li>
                                                <li>
                                                    <form action="{{ route('delete_review', ['id'=> $review['id']]) }}" method="POST">
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
                                <td colspan="6" class="py-4">
                                    <h2 class="text-dark text-center h5">NO RECORDS FOUND</h2>
                                    <div class="text-center my-3">
                                        <a href="{{route('create_review')}}"><button class="btn rounded-2 text-uppercase create_new_btn text-white "><i class='bx bx-plus-circle mb-1 text-white'></i>Create new</button></a>
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
                            <select name="row_selection" id="per_page_option" class="ms-2 btn btn-primary bg_primary_label px-1">
                                @if($reviews()['meta']['pagination']['per_page'] == 10)
                                <option value="10" selected>10</option>
                                @else
                                <option value="10">10</option>
                                @endif
                                @if($reviews()['meta']['pagination']['per_page'] == 20)
                                <option value="20" selected>20</option>
                                @else
                                <option value="20">20</option>
                                @endif
                                @if($reviews()['meta']['pagination']['per_page'] == 50)
                                <option value="50" selected>50</option>
                                @else
                                <option value="50">50</option>
                                @endif
                                @if($reviews()['meta']['pagination']['per_page'] == 100)
                                <option value="100" selected>100</option>
                                @else
                                <option value="100">100</option>
                                @endif
                            </select>
                        </div>

                        <div class="align-self-center">
                            @if($reviews()['meta']['pagination']['total'] > $reviews()['meta']['pagination']['count'])
                            @isset($reviews()['meta']['pagination']['links']['previous'])
                            <span>
                                <button class="btn btn-sm bg-label-dark page_btn" data-url="prev">previous</button>
                            </span>
                            @endisset
                            @endif
                            <span class="mx-2">
                                PAGE <span id="page_active">{{$reviews()['meta']['pagination']['current_page']}}</span> OF {{$reviews()['meta']['pagination']['total_pages']}}
                            </span>
                            @if($reviews()['meta']['pagination']['total'] > $reviews()['meta']['pagination']['count'])
                            @isset($reviews()['meta']['pagination']['links']['next'])
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
        $(document).ready(function(){
            var current_page = {!!str_replace("'", "\'", json_encode($reviews()['meta']['pagination']['current_page'])) !!};
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