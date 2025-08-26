<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{url('Frontend_css/demo.css')}}">
    <title>Quizzes - Student Portal - Tutors 11 Plus</title>
    <link rel="shortcut icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}" type="image/x-icon">
    <!-- bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        
</head>

<body>

    @include('sidebar')
    @include('header')
    @include('User.Progresstopbar')
    <section class="Quiz_Attempts px-1" id="quiz_tab_section" style="display:;">
    <div class="bg-white shadow table-responsive border_rounded m-1">
            <table class="table table-hover table-striped p-3">
                <thead class='table_head'>
                       <tr class="border-bottom">
                            <th scope="col" class="py-3 px-3 font_medium w_200 table_text fs-6">SERIAL</th>
                            <th scope="col" class="py-3 px-3 font_medium w_200 table_text fs-6" style="min-width: 150px">Quiz NAME</th>
                            <th scope="col" class="py-3 px-3 font_medium w_200 table_text fs-6">COMPLETED</th>
                            <th scope="col" class="py-3 px-3 font_medium w_200 table_text fs-6">PERCENTAGE</th>
                            <th scope="col" class="py-3 px-3 font_medium w_200 table_text fs-6">SCORE</th>
                            <th scope="col" class="py-3 px-3 font_medium w_200 table_text fs-6">STATUS</th>
                            <th scope="col" class="py-3 px-3 font_medium w_200 table_text fs-6">ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1; ?>
                        @foreach ($quizSessions['data'] as $quiz)
                                @if($quiz)
                                <tr class="border-bottom">
                                    <td class="table_text font_medium fw-normal py-2 m-0 fw-semibold" data-label="serial">
                                        <?php echo $i;?>
                                    </td>
                                    <td class="table_text font_medium fw-normal py-2 m-0" data-label="exam">{{ $quiz['name'] }}</td>
                                    <td class="table_text font_medium fw-normal py-2 m-0" data-label="completed">{{ $quiz['completed'] }}</td>
                                    <td class="table_text font_medium fw-normal py-2 m-0" data-label="percentage">{{ $quiz['percentage'] }}</td>
                                    <td class="table_text font_medium fw-normal py-2 m-0" data-label="score">{{ $quiz['score'] }}</td>
                                    <td class="table_text font_medium fw-normal py-2 m-0" data-label="status">
                                        @if ($quiz['status'] === 'Failed')
                                            <span class="bg-label-danger p-2 rounded-pill px-3 small fw-semibold">{{ $quiz['status'] }}</span>
                                        @else 
                                            <span class="bg-label-success p-2 rounded-pill px-3 small fw-semibold">{{ $quiz['status'] }}</span>
                                        @endif
                                    </td>
                                    <td class="text-dark" data-label="actions">
                                        <button class="btn btn-transparent" data-bs-toggle="tooltip" data-bs-html="true" data-bs-title="View Results"><a style="color:white;"
                                            href="/quiz/{{$quiz['slug']}}/results/{{$quiz['id']}}"><img src="{{url('images\analysis.png')}}" height="35px" width="auto" alt="analytics icon">
                                        </a></button>
                                    </td>
                                </tr>
                                <?php $i++;?>
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
                                @if(isset($quizSessions['meta']['pagination']['links']['previous']))
                                    <span>
                                        <a href="{{$quizSessions['meta']['pagination']['links']['previous']}}"><button class="btn btn-sm bg-label-dark">previous</button></a>
                                    </span>
                                @endif
                            @endif
                                <span class="mx-2">
                                    PAGE <span id="page_active">{{$quizSessions['meta']['pagination']['current_page']}}</span> OF {{$quizSessions['meta']['pagination']['total_pages']}}
                                </span>
                            @if($quizSessions['meta']['pagination']['total'] > $quizSessions['meta']['pagination']['count'])
                                @if(isset($quizSessions['meta']['pagination']['links']['next']))
                                <span>
                                    <a href="{{$quizSessions['meta']['pagination']['links']['next']}}"><button class="btn btn-sm bg-label-dark">Next</button></a>
                                </span>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        $(document).ready(function(){
            // row per page 
            $('#per_page_option').on('change', function(e) {
                var perPage = parseInt($(this).val());
                var pathname = window.location.pathname;
                var current_page = {!!str_replace("'", "\'", json_encode($quizSessions['meta']['pagination']['current_page'])) !!};
                if (perPage == 10) {
                    window.location.href = pathname;
                } else {
                    window.location.href = pathname + "?page=" + current_page + "&perPage=" + perPage;
                }
            }); 
        });
    </script>

    @include('User.ProgressScript')

</body>

</html>