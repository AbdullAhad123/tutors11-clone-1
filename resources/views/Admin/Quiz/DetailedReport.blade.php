<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detailed Report - {{$quiz['title']}}</title>
    <!-- rel icon -->
    <link rel="icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}">
    <meta name="description" content="{{ app(\App\Settings\SiteSettings::class)->seo_description }}">
    <meta name="author" content="{{ app(\App\Settings\SiteSettings::class)->app_name }}">
</head>

<body>
    @include('sidebar')
    @include('header')

    <div class="container-fluid my-4">
        <div class="row">
            <div class="col-12 col-sm-6 h5 text-dark mb-0 align-self-center">
                Detailed Report - {{$quiz['title']}}
            </div>
            <div class="col-12 col-sm-6 text-sm-end">
                <a href="/admin/quizzes/{{$quiz['id']}}/export-report">
                    <button class="btn bg-label-dark border-dark text-uppercase">Download Report</button>
                </a>
                <a href="/admin/quizzes/{{$quiz['id']}}/overall-report">
                    <button class="btn bg-label-primary border-primary text-uppercase">Overall Report</button>
                </a>
            </div>
        </div>
    </div>

    <div class="bg-white shadow-sm">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <th scope="col" class="font_bold text_black">TEST TAKER</th>
                    <th scope="col" class="font_bold text_black">COMPLETED ON</th>
                    <th scope="col" class="font_bold text_black">PERCENTAGE</th>
                    <th scope="col" class="font_bold text_black">SCORE</th>
                    <th scope="col" class="font_bold text_black">ACCURACY</th>
                    <th scope="col" class="font_bold text_black">IP</th>
                    <th scope="col" class="font_bold text_black">STATUS</th>
                    <th scope="col" class="font_bold text_black">ACTIONS</th>
                </thead>
                <tbody>
                    @foreach($quizSessions['data'] as $quizSession)
                        <tr>
                            <td data-label="exam">{{$quizSession['name']}}</td>
                            <td data-label="exam">{{$quizSession['completed']}}</td>
                            <td data-label="exam">{{$quizSession['percentage']}}</td>
                            <td data-label="exam">{{$quizSession['score']}}</td>
                            <td data-label="exam">{{$quizSession['accuracy']}}</td>
                            <td data-label="exam">{{$quizSession['ip']}}</td>
                            <td data-label="status">
                                <span class="py-1 px-2 rounded small 
                                    @if($quizSession['results']['pass_or_fail'] != 'Failed')
                                        bg-label-primary
                                    @else
                                        bg-label-danger
                                    @endif
                                    ">
                                    {{$quizSession['results']['pass_or_fail']}}
                                </span>                                
                            </td>
                            <td data-label="actions">
                                <div class="dropdown border rounded">
                                    <a class="nav-link dropdown-toggle" href="" data-bs-toggle="dropdown" aria-expanded="false">
                                        Action
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end p-0">
                                        <li>
                                            <a class="dropdown-item" href="/admin/quiz/{{$quizSession['slug']}}/results/{{$quizSession['id']}}">Results</a>
                                        </li>
                                        <!-- <li>
                                            <a class="dropdown-item" href="/admin/quiz-types/delete">Delete</a>
                                        </li> -->
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @endforeach 
                </tbody>
            </table>
        </div>

        <div class="col-12 col-lg-12 order-2 order-md-3 order-lg-2 mb-4">
            <div class="card">
                <div class="px-3 py-4 d-flex justify-content-between align-items-center">
                    <div>
                        ROWS PER PAGE:
                        <select name="row_selection" id="per_page_option" class="ms-2 btn btn-primary bg-label-primary px-1">
                            @if($quizSessions['meta']['pagination']['per_page'] == 10)
                                <option value="10" selected>10</option>
                            @else
                                <option value="10">10</option>
                            @endif
                            @if($quizSessions['meta']['pagination']['per_page'] == 20)
                                <option value="20" selected>20</option>
                            @else
                                <option value="20">20</option>
                            @endif
                            @if($quizSessions['meta']['pagination']['per_page'] == 50)
                                <option value="50" selected>50</option>
                            @else
                                <option value="50">50</option>
                            @endif
                            @if($quizSessions['meta']['pagination']['per_page'] == 100)
                                <option value="100" selected>100</option>
                            @else
                                <option value="100">100</option>
                            @endif
                        </select>
                    </div>
                    <div class="align-self-center">
                        @if($quizSessions['meta']['pagination']['total'] > $quizSessions['meta']['pagination']['count'])
                            @isset($quizSessions['meta']['pagination']['links']['previous'])
                                <span>
                                    <a href="{{$quizSessions['meta']['pagination']['links']['previous']}}"><button class="btn btn-sm bg-label-dark">previous</button></a>
                                </span>
                            @endisset
                        @endif
                        <span class="mx-2">
                            PAGE <span id="page_active">{{$quizSessions['meta']['pagination']['current_page']}}</span> OF {{$quizSessions['meta']['pagination']['total_pages']}}
                        </span>
                        @if($quizSessions['meta']['pagination']['total'] > $quizSessions['meta']['pagination']['count'])
                            @isset($quizSessions['meta']['pagination']['links']['next'])
                                <span>
                                    <a href="{{$quizSessions['meta']['pagination']['links']['next']}}"><button class="btn btn-sm bg-label-dark">Next</button></a>
                                </span>
                            @endisset
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>

    @include('parentsidebar.sidebarending')

    <script>
        $('#searchCode, #searchTitle').on('keyup', function() {
            console.log('Searching');
        });
        $('#per_page_option').on('change', function (e) {
            var perPage = parseInt($(this).val());
            var pathname = window.location.pathname;
            var current_page = {!! str_replace("'", "\'", json_encode($quizSessions['meta']['pagination']['current_page'])) !!};
            if(perPage == 10){
                window.location.href = pathname;
            } else {
                window.location.href = pathname+"?page="+current_page+"&perPage="+perPage;
            }
        });
    </script>

    <!-- @dd($quizSessions) -->
</body>

</html>
