<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$blog->title}} - Comments</title>
    <!-- rel icon -->
    <link rel="icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <meta name="description" content="{{ app(\App\Settings\SiteSettings::class)->seo_description }}">
    <meta name="author" content="{{ app(\App\Settings\SiteSettings::class)->app_name }}">
    <style>
        .w_350 {min-width: 350px}
        .w_300 {min-width: 300px}
        .w_280 {min-width: 280px}
        .w_250 {min-width: 250px}
        .w_200 {min-width: 200px}
        .w_180 {min-width: 180px}
        .w_150 {min-width: 150px}
        .user_icon{
            background-size: cover;
            background-position: center;
            width: 50px;
            height: 50px;
        }
    </style>
</head>

<body>
    @include('sidebar')
    @include('header')

    <section class="p-4">

        <h1 class="text-dark my-4">Blog Comments</h1>
        <h2 class="text-dark my-2 h4">{{$blog->title}} - Comments</h2>

        <div id="pageMessage" class="my-4">
            @if (Session::has('success'))
                <div class="alert alert-success text-black shadow-sm">
                    {{Session::get('message')}}
                </div>
            @endif
            @if (Session::has('success') && Session::get('success') == 'false')
                <div class="alert alert-danger shadow-sm">
                    {{Session::get('message')}}
                </div>
            @endif
        </div>

        <div class="bg-white rounded-4 shadow">
            <div class="table-responsive">
                <table class="table">
                    <thead class="bg-body-secondary">
                        <th scope="col" class="font_bold text-dark fs-6 py-3 w_180">USER </th>
                        <th scope="col" class="font_bold text-dark fs-6 py-3 w_180">EMAIL</th>
                        <th scope="col" class="font_bold text-dark fs-6 py-3 w_180">IMAGE</th>
                        <th scope="col" class="font_bold text-dark fs-6 py-3 w_350">COMMENT</th>
                        <th scope="col" class="font_bold text-dark fs-6 py-3 w_180">STATUS</th>
                        <th scope="col" class="font_bold text-dark fs-6 py-3 w_180">CREATED AT</th>
                        <th scope="col" class="font_bold text-dark fs-6 py-3 w_180">ACTIONS</th>
                    </thead>
                    <tbody id="examTable">
                        <tr class="row_bg_light">
                            <td data-label="search">
                                <input type="text" data-url="name" class="search shadow-none form-control bg-light font_normal_bold placeholder_text" placeholder="Search User Name">
                            </td>
                            <td data-label="search">
                                <input type="text" data-url="email" class="search shadow-none form-control bg-light font_normal_bold placeholder_text" placeholder="Search Email">
                            </td>
                            <td data-label="search"></td>
                            <td data-label="search">
                                <input type="text" data-url="comment" class="search shadow-none form-control bg-light font_normal_bold placeholder_text" placeholder="Search Comment">
                            </td>
                            <td data-label="section"></td>
                            <td data-label="section"></td>
                            <td data-label="section"></td>
                        </tr>
                        @if($comments()['meta']['pagination']['count'] > 0)
                            @foreach($comments()['data'] as $comment)
                                <tr>
                                    <td>{{$comment['name']}}</td>
                                    <td>{{$comment['email']}}</td>
                                    <td>
                                        @if($comment['image'] != '--')
                                        <a href="{{url($comment['image'])}}" target="_blank">
                                            <div class="user_icon rounded-circle shadow-sm" style="background-image:url({{url($comment['image'])}});"></div>
                                        </a> 
                                        @else
                                            <div class="user_icon rounded-circle shadow-sm text-white d-flex justify-content-center align-items-center fs-5 cursor-pointer" style="background-color:{{$comment['random_color']}};">{{$comment['first_letter']}}</div>
                                        @endif
                                    </td>
                                    <td>{{$comment['comment']}}</td>
                                    <td class="text-center">
                                        <label class="switch mt-2">
                                            @if($comment['is_active'])
                                                <input class="is_active" type="checkbox" data-id="{{$comment['id']}}" checked>
                                            @else
                                                <input class="is_active" type="checkbox" data-id="{{$comment['id']}}">
                                            @endif
                                            <span class="slider round"></span>
                                        </label>
                                    </td>
                                    <td>{{$comment['created_at']}}</td>
                                    <td data-label="actions">
                                        <div class="dropdown rounded shadow-sm bg-white text-center">
                                            <a class="nav-link dropdown-toggle text-dark" href="" data-bs-toggle="dropdown" aria-expanded="false">
                                                Actions
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-end p-0">
                                                <li>
                                                    <a class="dropdown-item" href="/blog/{{$blog->slug}}" target="_blank">Preview Blog</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="{{route('update_blog', ['id' => $blog->id])}}">Edit Blog</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="7" class="text-center">
                                    <h5 class="text-black pt-3">
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
                            <select name="row_selection" id="per_page_option" class="ms-2 btn btn-primary bg_primary_label px-1">
                                @if($comments()['meta']['pagination']['per_page'] == 10)
                                <option value="10" selected>10</option>
                                @else
                                <option value="10">10</option>
                                @endif
                                @if($comments()['meta']['pagination']['per_page'] == 20)
                                <option value="20" selected>20</option>
                                @else
                                <option value="20">20</option>
                                @endif
                                @if($comments()['meta']['pagination']['per_page'] == 50)
                                <option value="50" selected>50</option>
                                @else
                                <option value="50">50</option>
                                @endif
                                @if($comments()['meta']['pagination']['per_page'] == 100)
                                <option value="100" selected>100</option>
                                @else
                                <option value="100">100</option>
                                @endif
                            </select>
                        </div>

                        <div class="align-self-center">
                            @if($comments()['meta']['pagination']['total'] > $comments()['meta']['pagination']['count'])
                            @isset($comments()['meta']['pagination']['links']['previous'])
                            <span>
                                <button class="btn btn-sm bg-label-dark page_btn" data-url="prev">previous</button>
                            </span>
                            @endisset
                            @endif
                            <span class="mx-2">
                                PAGE <span id="page_active">{{$comments()['meta']['pagination']['current_page']}}</span> OF {{$comments()['meta']['pagination']['total_pages']}}
                            </span>
                            @if($comments()['meta']['pagination']['total'] > $comments()['meta']['pagination']['count'])
                            @isset($comments()['meta']['pagination']['links']['next'])
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
            var current_page = {!!str_replace("'", "\'", json_encode($comments()['meta']['pagination']['current_page'])) !!};
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
        $(".is_active").change(function(){
            $.ajax({
                type: "POST",
                url: '/admin/chnage-blog-comment-status/'+$(this).data("id"),
                data: {
                    id: $(this).data("id"), 
                    status: $(this).prop('checked'),
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    $("#pageMessage").empty();
                    if(data.success){
                        $("#pageMessage").append('<div class="alert alert-success shadow-sm text-black">'+data.message+'</div>');
                    } else {
                        $("#pageMessage").append('<div class="alert alert-danger shadow-sm ">'+data.message+'</div>');
                    }
                },
                error: function(data, textStatus, errorThrown) {
                    console.log(textStatus);
                },
            });
        });
    </script>

</body>

</html>