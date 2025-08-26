<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        Schools - Manage Schools - 
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
    <!-- bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
        .min-w-200{
            min-width: 200px;
        }
    </style>
</head>

<body>
    @include('sidebar')
    @include('header')

    <section class="p-4">

        <div class="my-4">
            <h1 class="text-dark my-2">Schools</h1>
            <p class="text-dark fs-5 my-2">Simplify school management with our Schools Hub. Admins and instructors can effortlessly add, update, and manage the list of schools on the website, ensuring accurate and relevant information.</p>
        </div>

        <div id="pageMessage" class="my-4">
            @if (Session::has('success'))
                <div class="alert_success p-3 d-flex align-items-center rounded-3 my-1">
                    <i class="bx bx-check-circle me-1"></i>
                    {{Session::get('message')}}
                </div>
            @endif
        </div>

        <div class="bg-white rounded-4 shadow">
            <div class="align-items-center d-flex justify-content-between mb-4 p-3 px-4">
                <h2 class="h4 text-dark m-0">Manage Schools</h2>
                <a href="{{route('school.create')}}"><button class="btn rounded-2 text-uppercase create_new_btn text-white"><i class='bx bx-plus-circle mb-1 text-white'></i>Create new</button></a>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead class="bg-body-secondary">
                        <th scope="col" class="font_bold text-dark fs-6 py-3 w_300">NAME</th>
                        <th scope="col" class="font_bold text-dark fs-6 py-3 w_180">PHONE</th>
                        <th scope="col" class="font_bold text-dark fs-6 py-3 w_200">EMAIL</th>
                        <th scope="col" class="font_bold text-dark fs-6 py-3 w_180">IMAGE</th>
                        <th scope="col" class="font_bold text-dark fs-6 py-3 w_180">LOGO</th>
                        <th scope="col" class="font_bold text-dark fs-6 py-3 w_200">WEBSITE</th>
                        <th scope="col" class="font_bold text-dark fs-6 py-3 w_180">REGION</th>
                        <th scope="col" class="font_bold text-dark fs-6 py-3 w_200">LOCATION</th>
                        <th scope="col" class="font_bold text-dark fs-6 py-3 w_200">ADDRESS</th>
                        <th scope="col" class="font_bold text-dark fs-6 py-3 w_300">EXAM BOARDS</th>
                        <th scope="col" class="font_bold text-dark fs-6 py-3 w_200">EXAM STYLES</th>
                        <th scope="col" class="font_bold text-dark fs-6 py-3 w_200">CREATED AT</th>
                        <th scope="col" class="font_bold text-dark fs-6 py-3 W-160">ACTIONS</th>
                    </thead>
                    <tbody>
                        <tr class="row_bg_light">
                            <td class="py-4" data-label="search">
                                <input type="text" data-url="name" class="Search shadow-none form-control bg-light font_normal_bold placeholder_text" placeholder="Search">
                            </td>
                            <td class="py-4" data-label="search">
                                <input type="text" data-url="phone" class="Search shadow-none form-control bg-light font_normal_bold placeholder_text" placeholder="Search">
                            </td>
                            <td class="py-4" data-label="search">
                                <input type="text" data-url="email" class="Search shadow-none form-control bg-light font_normal_bold placeholder_text" placeholder="Search">
                            </td>
                            <td class="py-4" data-label="search"></td>
                            <td class="py-4" data-label="search"></td>
                            <td class="py-4" data-label="search">
                                <input type="text" data-url="website" class="Search shadow-none form-control bg-light font_normal_bold placeholder_text" placeholder="Search">
                            </td>
                            <td class="py-4" data-label="search">
                                <input type="text" data-url="region" class="Search shadow-none form-control bg-light font_normal_bold placeholder_text" placeholder="Search">
                            </td>
                            <td class="py-4" data-label="search"></td>
                            <td class="py-4" data-label="search">
                                <input type="text" data-url="address" class="Search shadow-none form-control bg-light font_normal_bold placeholder_text" placeholder="Search">
                            </td>
                            <td class="py-4" data-label="search">
                                <input type="text" data-url="examBoards" class="Search shadow-none form-control bg-light font_normal_bold placeholder_text" placeholder="Search">
                            </td>
                            <td class="py-4" data-label="search">
                                <input type="text" data-url="examStyles" class="Search shadow-none form-control bg-light font_normal_bold placeholder_text" placeholder="Search">
                            </td>
                            <td class="py-4" data-label="search"></td>
                            <td class="py-4" data-label="search"></td>
                        </tr>
                        @if(count($schools()['data']) > 0)
                            @foreach($schools()['data'] as $school)
                                <tr>
                                    <td class="py-4 text-dark">{{$school['name']}}</td>
                                    <td class="py-4 text-dark">{{$school['phone']}}</td>
                                    <td class="py-4 text-dark">
                                        <a href="mailto:{{$school['email']}}" target="_blank">{{$school['email']}}</a>
                                    </td>
                                    <td class="py-4 text-dark"> 
                                        <a href="{{url($school['image'])}}" target="_blank">
                                            <img class="rounded" src="{{url($school['image'])}}" alt="icon" width="50">
                                        </a> 
                                    </td>
                                    <td class="py-4 text-dark"> 
                                        <a href="{{url($school['logo'])}}" target="_blank">
                                            <img class="rounded" src="{{url($school['logo'])}}" alt="icon" width="50">
                                        </a> 
                                    </td>
                                    <td class="py-4 text-dark">
                                        <a href="mailto:{{$school['website']}}" target="_blank">{{$school['website']}}</a>
                                    </td>
                                    <td class="py-4 text-dark">{{$school['region']}}</td>
                                    <td class="py-4 text-dark">{{$school['location']}}</td>
                                    <td class="py-4 text-dark">{{$school['address']}}</td>
                                    <td class="py-4 text-dark">{{$school['exam_boards']}}</td>
                                    <td class="py-4 text-dark">{{$school['exam_styles']}}</td>
                                    <td class="py-4 text-dark">{{$school['created_at']}}</td>
                                    <td class="py-4 text-dark">
                                        <div class="border d-inline-flex dropdown rounded shadow-sm">
                                            <a class="nav-link dropdown-toggle text-center" href="" data-bs-toggle="dropdown" aria-expanded="false">
                                                Action
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-end p-0">
                                                <li>
                                                    <a class="dropdown-item" href="/admin/school/{{$school['id']}}/edit">Edit</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item delete cursor-pointer" data-id="{{$school['id']}}">Delete</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="13" class="py-4">
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
                                @if($schools()['meta']['pagination']['per_page'] == 10)
                                <option value="10" selected>10</option>
                                @else
                                <option value="10">10</option>
                                @endif
                                @if($schools()['meta']['pagination']['per_page'] == 20)
                                <option value="20" selected>20</option>
                                @else
                                <option value="20">20</option>
                                @endif
                                @if($schools()['meta']['pagination']['per_page'] == 50)
                                <option value="50" selected>50</option>
                                @else
                                <option value="50">50</option>
                                @endif
                                @if($schools()['meta']['pagination']['per_page'] == 100)
                                <option value="100" selected>100</option>
                                @else
                                <option value="100">100</option>
                                @endif
                            </select>
                        </div>
                        <div class="align-self-center">
                            @if($schools()['meta']['pagination']['total'] > $schools()['meta']['pagination']['count'])
                            @isset($schools()['meta']['pagination']['links']['previous'])
                            <span>
                                <a href="{{$schools()['meta']['pagination']['links']['previous']}}"><button class="btn btn-sm bg-label-dark">previous</button></a>
                            </span>
                            @endisset
                            @endif
                            <span class="mx-2">
                                PAGE <span id="page_active">{{$schools()['meta']['pagination']['current_page']}}</span> OF {{$schools()['meta']['pagination']['total_pages']}}
                            </span>
                            @if($schools()['meta']['pagination']['total'] > $schools()['meta']['pagination']['count'])
                            @isset($schools()['meta']['pagination']['links']['next'])
                            <span>
                                <a href="{{$schools()['meta']['pagination']['links']['next']}}"><button class="btn btn-sm bg-label-dark">Next</button></a>
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
                var current_page = {!!str_replace("'", "\'", json_encode($schools()['meta']['pagination']['current_page'])) !!};
                if (perPage == 10) {
                    window.location.href = pathname;
                } else {
                    window.location.href = pathname + "?page=" + current_page + "&perPage=" + perPage;
                }
            });
            // delete plan
            $(".delete").click(function() {
                let id = $(this).data("id");
                let _this = $(this);
                $.ajax({
                    type: "POST",
                    url: '/admin/school/delete/'+id,
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