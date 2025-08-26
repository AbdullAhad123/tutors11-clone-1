<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ url('Frontend_css/demo.css') }}">
    <title>Exams - Student Portal - Tutors 11 Plus</title>
    <link rel="shortcut icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
    <!-- bootstrap cdn -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
</head>

<body>
    @include('sidebar')
    @include('header')
    @include('User.Progresstopbar')

    <!-- Exam Attempts Section start -->
    <section class="Exam_Attempts px-1" id="exam_tab_section" style="display;">
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
                        @if(count($examSessions['data']) > 0)
                            <?php $i = 1; ?>
                            @foreach ($examSessions['data'] as $key => $exam)
                            <tr class="border-bottom">
                                <td class="table_text font_medium fw-normal py-2 m-0 fw-semibold" data-label="serial">
                                    <?php echo $i; ?>
                                </td>
                                <!-- <span class="bg-label-danger p-2 rounded-pill px-3 small fw-semibold">FAILED</span> -->
                                <td class="table_text font_medium fw-normal py-2 m-0" colspan="1" data-label="exam">{{ $exam['name'] }}</td>
                                <td class="table_text font_medium fw-normal py-2 m-0" colspan="1" data-label="completed">{{ $exam['completed'] }}</td>
                                <td class="table_text font_medium fw-normal py-2 m-0" colspan="1" data-label="percentage">{{ $exam['percentage'] }}</td>
                                <td class="table_text font_medium fw-normal py-2 m-0" colspan="1" data-label="score">{{ $exam['score'] }}</td>
                                <td class="table_text font_medium fw-normal py-2 m-0" colspan="1" data-label="status">
                                    @if ($exam['status'] === 'Failed')
                                        <span class="bg-label-danger p-2 rounded-pill px-3 small fw-semibold">{{ $exam['status'] }}</span>
                                    @else 
                                        <span class="bg-label-success p-2 rounded-pill px-3 small fw-semibold">{{ $exam['status'] }}</span>
                                    @endif
                                </td>
                                <td class="text-dark" colspan="1" data-label="actions">
                                    <button class="btn btn-transparent" data-bs-toggle="tooltip" data-bs-html="true" data-bs-title="View Results"><a style="color:white;"
                                        href="/exam/{{ $exam['slug'] }}/results/{{ $exam['id'] }}"><img src="{{url('images\analysis.png')}}" height="35px" width="auto" alt="analytics icon">
                                    </a></button>
                                </td>
                            </tr>
                            <?php $i++; ?>
                            @endforeach
                        @else 
                        <tr>
                            <td colspan="7">
                                <div class="text-center">
                                    <img src="{{url('images\not_found_error.png')}}" width="60" height="60" class="my-4" alt="No Result Found">
                                    <p class="text-capitalize h5 text-black mb-4">No Records Found</p>
                                </div>
                            </td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>

            <div class="col-12 col-lg-12 order-2 order-md-3 order-lg-2 mb-4">
                <div class="card bg-white rounded-0">
                    <div class="row justify-content-between align-items-center px-3 py-3 m-0">
                        <div class="col-lg-6 col-md-6 col-sm-7 col-7 d-flex align-items-center row_pagination_section">
                            <span class="me-1">
                                ROWS PER PAGE:
                            </span>
                            <select name="row_selection" id="per_page_option" class="ms-2 btn btn-primary bg-label-primary px-1">
                                @if($examSessions['meta']['pagination']['per_page'] == 10)
                                <option value="10" selected>10</option>
                                @else
                                <option value="10">10</option>
                                @endif
                                @if($examSessions['meta']['pagination']['per_page'] == 20)
                                <option value="20" selected>20</option>
                                @else
                                <option value="20">20</option>
                                @endif
                                @if($examSessions['meta']['pagination']['per_page'] == 50)
                                <option value="50" selected>50</option>
                                @else
                                <option value="50">50</option>
                                @endif
                                @if($examSessions['meta']['pagination']['per_page'] == 100)
                                <option value="100" selected>100</option>
                                @else
                                <option value="100">100</option>
                                @endif
                            </select>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-5 col-5 align-self-center text-end page_numbers_section">
                            @if($examSessions['meta']['pagination']['total'] > $examSessions['meta']['pagination']['count'])
                                @if(isset($examSessions['meta']['pagination']['links']['previous']))
                                    <span>
                                        <a href="{{$examSessions['meta']['pagination']['links']['previous']}}"><button class="btn btn-sm bg-label-dark">previous</button></a>
                                    </span>
                                @endif
                            @endif
                                <span class="mx-2">
                                    PAGE <span id="page_active">{{$examSessions['meta']['pagination']['current_page']}}</span> OF {{$examSessions['meta']['pagination']['total_pages']}}
                                </span>
                            @if($examSessions['meta']['pagination']['total'] > $examSessions['meta']['pagination']['count'])
                                @if(isset($examSessions['meta']['pagination']['links']['next']))
                                <span>
                                    <a href="{{$examSessions['meta']['pagination']['links']['next']}}"><button class="btn btn-sm bg-label-dark">Next</button></a>
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
                var current_page = {!!str_replace("'", "\'", json_encode($examSessions['meta']['pagination']['current_page'])) !!};
                if (perPage == 10) {
                    window.location.href = pathname;
                } else {
                    window.location.href = pathname + "?page=" + current_page + "&perPage=" + perPage;
                }
            }); 
        });
    </script>   

</body>

</html>