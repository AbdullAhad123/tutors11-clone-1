<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blogs</title>
    <!-- rel icon -->
    <link rel="icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <meta name="description" content="{{ app(\App\Settings\SiteSettings::class)->seo_description }}">
    <meta name="author" content="{{ app(\App\Settings\SiteSettings::class)->app_name }}">
    <!-- bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
        .editor {
            position: relative;
            width: 100%;
            min-height: 40vh;
            max-height: 400px;
            margin: 0 auto;
            padding: 20px;
            background: #fcfcfc;
            border-radius: 3px;
            border: 1px solid #696cff;
            box-sizing: border-box;
            word-break: break-all;
            outline: 0;
        }

        .btn_primary_customized {
            text-transform: uppercase;
            font-size: 0.9rem;
            background-color: #696cff !important;
        }

        .btn_primary_customized:hover {
            box-shadow: 0px 0px 10px 1px #34343425;
        }

        .text_black {
            color: #181818 !important;
        }

        .font_bold {
            font-weight: 600 !important;
        }
        .font-size-13{font-size: 13px}
        .w_350 {min-width: 350px}
        .w_300 {min-width: 300px}
        .w_280 {min-width: 280px}
        .w_250 {min-width: 250px}
        .w_200 {min-width: 200px}
        .w_180 {min-width: 180px}
        .w_150 {min-width: 150px}
        .blog_image {height: 80px; width: 160px}
        .blog_descripiton {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;  
            overflow: hidden;
        }
    </style>
</head>

<body>
    @include('sidebar')
    @include('header')

    <section class="p-4">

        <div class="my-4">
            <h1 class="text-dark my-2">Blogs</h1>
            <p class="text-dark fs-5 my-2">Elevate your online presence with our Blog Hub. Seamlessly add, update, and manage blog posts to engage your audience and share compelling content effortlessly.</p>
        </div>

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
            <div class="align-items-center d-flex justify-content-between mb-4 p-3 px-4">
                <h2 class="h4 text-dark m-0">Manage Blogs</h2>
                <a href="{{route('create_blog')}}"><button class="btn rounded-2 text-uppercase create_new_btn text-white"><i class='bx bx-plus-circle mb-1 text-white'></i>Create new</button></a>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead class="bg-body-secondary">
                        <th scope="col" class="font_bold fs-5 py-3 text_black w_350">TITLE</th>
                        <th scope="col" class="font_bold fs-5 py-3 text_black w_350">SLUG </th>
                        <th scope="col" class="font_bold fs-5 py-3 text_black w_200">CATEGORY</th>
                        <th scope="col" class="font_bold fs-5 py-3 text_black w_280">IMAGE</th>
                        <th scope="col" class="font_bold fs-5 py-3 text_black w_200">AUTHOR</th>
                        <th scope="col" class="font_bold fs-5 py-3 text_black w_250">DATE</th>
                        <th scope="col" class="font_bold fs-5 py-3 text_black w_250">ACTIONS</th>
                    </thead>
                    <tbody>
                        <tr class="row_bg_light">
                            <td class="py-4" data-label="search">
                                <input type="text" data-url="title" class="search shadow-none form-control bg-light font_normal_bold placeholder_text" placeholder="Search Title">
                            </td>
                            <td class="py-4" data-label="search">
                                <input type="text" data-url="slug" class="search shadow-none form-control bg-light font_normal_bold placeholder_text" placeholder="Search Slug">
                            </td>
                            <td class="py-4" data-label="search">
                                <input type="text" data-url="category" class="search shadow-none form-control bg-light font_normal_bold placeholder_text" placeholder="Search Category">
                            </td>
                            <td class="py-4" data-label="section"></td>
                            <td class="py-4" data-label="search">
                                <input type="text" data-url="author" class="search shadow-none form-control bg-light font_normal_bold placeholder_text" placeholder="Search Author">
                            </td>
                            <td class="py-4" data-label="section"></td>
                            <td class="py-4" data-label="section"></td>
                        </tr>
                        @if($blogs()['meta']['pagination']['count'] > 0)
                            @foreach($blogs()['data'] as $blog)
                                <tr>
                                    <td class="py-4">{{$blog['title']}}</td>
                                    <td class="py-4">{{$blog['slug']}}</td>
                                    <td class="py-4">{{$blog['category']}}</td>
                                    <td class="py-4">
                                        <a href="{{url($blog['image'])}}" target="_blank">
                                            <img class="rounded" src="{{url($blog['image'])}}" alt="blog" width="50">
                                        </a> 
                                    </td>
                                    <td class="py-4">{{$blog['author']}}</td>
                                    <td class="py-4">{{$blog['created_at']}}</td>
                                    <td class="py-4" data-label="actions">
                                        <div class="border d-inline-flex dropdown rounded shadow-sm">
                                            <a class="nav-link dropdown-toggle text-dark" href="" data-bs-toggle="dropdown" aria-expanded="false">
                                                Actions
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-end p-0">
                                                <li>
                                                    <a class="dropdown-item" href="{{route('view_blog_comments', ['id' => $blog['id']])}}">View Comments</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="/blog/{{$blog['slug']}}" target="_blank">Preview</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="{{route('update_blog', ['id' => $blog['id']])}}">Edit</a>
                                                </li>
                                                <li>
                                                    <form action="{{ route('delete_blog', ['id'=> $blog['id']]) }}" method="POST">
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
                                <td colspan="7" class="py-3">
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
                                @if($blogs()['meta']['pagination']['per_page'] == 10)
                                <option value="10" selected>10</option>
                                @else
                                <option value="10">10</option>
                                @endif
                                @if($blogs()['meta']['pagination']['per_page'] == 20)
                                <option value="20" selected>20</option>
                                @else
                                <option value="20">20</option>
                                @endif
                                @if($blogs()['meta']['pagination']['per_page'] == 50)
                                <option value="50" selected>50</option>
                                @else
                                <option value="50">50</option>
                                @endif
                                @if($blogs()['meta']['pagination']['per_page'] == 100)
                                <option value="100" selected>100</option>
                                @else
                                <option value="100">100</option>
                                @endif
                            </select>
                        </div>

                        <div class="align-self-center">
                            @if($blogs()['meta']['pagination']['total'] > $blogs()['meta']['pagination']['count'])
                            @isset($blogs()['meta']['pagination']['links']['previous'])
                            <span>
                                <button class="btn btn-sm bg-label-dark page_btn" data-url="prev">previous</button>
                            </span>
                            @endisset
                            @endif
                            <span class="mx-2">
                                PAGE <span id="page_active">{{$blogs()['meta']['pagination']['current_page']}}</span> OF {{$blogs()['meta']['pagination']['total_pages']}}
                            </span>
                            @if($blogs()['meta']['pagination']['total'] > $blogs()['meta']['pagination']['count'])
                            @isset($blogs()['meta']['pagination']['links']['next'])
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
            var current_page = {!!str_replace("'", "\'", json_encode($blogs()['meta']['pagination']['current_page'])) !!};
            $('#summernote').summernote({
                placeholder: 'Start Typing here...',
                tabsize: 2,
                height: 100,
                toolbar: [
                    ['font', ['bold', 'underline', 'clear']],
                    ['superscript', ['superscript']],
                    ['subscript', ['subscript']],
                    ['strikethrough', ['strikethrough']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['insert', ['link', 'picture']],
                    ['view', ['fullscreen', 'codeview']]
                ],
                callbacks: {
                    onInit: function() {
                        $('.note-toolbar').addClass('custom-toolbar');
                    }
                }
            });
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