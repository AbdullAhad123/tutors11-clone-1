<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detailed Report - {{$practiceSet['title']}}</title>
    <!-- rel icon -->
    <link rel="icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}">
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

        <div class="d-flex justify-content-between align-items-center my-4">
            <h1 class="text-dark h2 my-2">{{$practiceSet['title']}}</h1>
            <a href="/admin/practice-sets/{{$practiceSet['id']}}/overall-report" class="my-2"><button class="btn bg_primary_label border-primary text-primary p-2 px-3"><span>Overall Report</span> <i class='bx bx-arrow-back bx-rotate-180'></i></button></a>
        </div>

        <div class="bg-white rounded-4 shadow my-4">
            <div class="align-items-center d-flex justify-content-between mb-4 p-3 px-4">
                <h2 class="h4 text-dark m-0">Detailed Report</h2>
                <a href="/admin/practice-sets/{{$practiceSet['id']}}/export-report"><button class="btn btn-outline-warning"><i class='bx bxs-download' ></i>Download Report</button></a>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead class="bg-body-secondary">
                        <th scope="col" class="font_bold text-dark py-3 fs-6 w_180">TEST TAKER</th>
                        <th scope="col" class="font_bold text-dark py-3 fs-6 w_300">COMPLETED ON</th>
                        <th scope="col" class="font_bold text-dark py-3 fs-6 w_160">POINTS EARNED</th>
                        <th scope="col" class="font_bold text-dark py-3 fs-6 w_160">ACCURACY</th>
                        <th scope="col" class="font_bold text-dark py-3 fs-6 w_180">IP</th>
                        <th scope="col" class="font_bold text-dark py-3 fs-6 w_180">STATUS</th>
                        <th scope="col" class="font_bold text-dark py-3 fs-6 w_160">ACTIONS</th>
                    </thead>                
                    <tbody>
                        @foreach($practiceSessions['data'] as $practiceSession)
                            @if(count($practiceSession) > 0)
                                <tr>
                                    <td class="py-4 text-dark" data-label="exam">{{$practiceSession['name']}}</td>
                                    <td class="py-4 text-dark" data-label="exam">{{$practiceSession['completed']}}</td>
                                    <td class="py-4 text-dark" data-label="exam">{{$practiceSession['total_points_earned']}}</td>
                                    <td class="py-4 text-dark" data-label="exam">{{$practiceSession['accuracy']}}</td>
                                    <td class="py-4 text-dark" data-label="exam">{{$practiceSession['ip']}}</td>
                                    <td class="py-4 text-dark" data-label="status">
                                        <span class="p-2 px-3 rounded small 
                                            @if($practiceSession['status'] == 'Completed')
                                                bg_label_published
                                            @else
                                                bg_label_draft
                                            @endif
                                            ">
                                            {{$practiceSession['status']}}
                                        </span>                                
                                    </td>
                                    <td class="py-4 text-dark" data-label="actions">
                                        <div class="dropdown border rounded d-inline-flex shadow-sm">
                                            <a class="nav-link dropdown-toggle" href="" data-bs-toggle="dropdown" aria-expanded="false">
                                                Actions
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-end p-0">
                                                <li>
                                                    <a class="dropdown-item" href="/admin/practice/{{$practiceSession['slug']}}/analysis/{{$practiceSession['id']}}">View Performance</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endif
                        @endforeach 
                    </tbody>                
                </table>
                
            </div>

            <div class="col-12 col-lg-12 order-2 order-md-3 order-lg-2 mb-4">
                <div class="card">
                    <div class="px-3 py-4 d-flex justify-content-between align-items-center">
                        <div>
                            ROWS PER PAGE:
                            <select name="row_selection" id="per_page_option" class="ms-2 btn btn-primary bg_primary_label px-1">
                                @if($practiceSessions['meta']['pagination']['per_page'] == 10)
                                    <option value="10" selected>10</option>
                                @else
                                    <option value="10">10</option>
                                @endif
                                @if($practiceSessions['meta']['pagination']['per_page'] == 20)
                                    <option value="20" selected>20</option>
                                @else
                                    <option value="20">20</option>
                                @endif
                                @if($practiceSessions['meta']['pagination']['per_page'] == 50)
                                    <option value="50" selected>50</option>
                                @else
                                    <option value="50">50</option>
                                @endif
                                @if($practiceSessions['meta']['pagination']['per_page'] == 100)
                                    <option value="100" selected>100</option>
                                @else
                                    <option value="100">100</option>
                                @endif
                            </select>
                        </div>
                        <div class="align-self-center">
                            @if($practiceSessions['meta']['pagination']['total'] > $practiceSessions['meta']['pagination']['count'])
                                @isset($practiceSessions['meta']['pagination']['links']['previous'])
                                    <span>
                                        <a href="{{$practiceSessions['meta']['pagination']['links']['previous']}}"><button class="btn btn-sm bg-label-dark">previous</button></a>
                                    </span>
                                @endisset
                            @endif
                            <span class="mx-2">
                                PAGE <span id="page_active">{{$practiceSessions['meta']['pagination']['current_page']}}</span> OF {{$practiceSessions['meta']['pagination']['total_pages']}}
                            </span>
                            @if($practiceSessions['meta']['pagination']['total'] > $practiceSessions['meta']['pagination']['count'])
                                @isset($practiceSessions['meta']['pagination']['links']['next'])
                                    <span>
                                        <a href="{{$practiceSessions['meta']['pagination']['links']['next']}}"><button class="btn btn-sm bg-label-dark">Next</button></a>
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
        $(document).ready(function () {
            // row per page  
            $('#per_page_option').on('change', function (e) {
                var perPage = parseInt($(this).val());
                var pathname = window.location.pathname;
                var current_page = {!! str_replace("'", "\'", json_encode($practiceSessions['meta']['pagination']['current_page'])) !!};
                if(perPage == 10){
                    window.location.href = pathname;
                } else {
                    window.location.href = pathname+"?page="+current_page+"&perPage="+perPage;
                }
            });
            // ready ends 
        });
    </script>

</body>

</html>
