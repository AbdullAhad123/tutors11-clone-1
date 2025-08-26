<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ url('Frontend_css/demo.css') }}">
    <title>Past Journeys - Student Portal - Tutors 11 Plus</title>
    <link rel="shortcut icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}" type="image/x-icon">
         <!-- bootstrap cdn -->
         <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    
</head>

<body>

    @include('sidebar')
    @include('header') 
    <div class="row m-0 mt-5">
        <div class="mb-4 w-100 px-0">
            <ul class="nav nav-tabs bg-white justify-content-center shadow my-2" id="myTab" role="tablist" style="border-bottom: none;">
                <li class="nav-item col-sm-6 col-12 hstack" role="presentation">
                    <button class="nav-link body_section_nav p-0 bg-white" id="progress" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="false">
                        <a style="color: black" class="nav_tab_link d-block py-2 px-1 text-capitalize" href="{{route('student_journey_progress')}}">In-progress</a>
                    </button>
                </li>
                <li class="nav-item col-sm-6 col-12 hstack" role="presentation">
                    <button class="nav-link body_section_nav p-0" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">
                        <a style="color: black" class="nav_tab_link d-block py-2 px-1 text-capitalize text-white bg-primary" href="{{route('my_journey')}}">Past Journeys</a>
                    </button>
                </li>
            </ul>
        </div>
    </div>

    <section class="journey_session px-1" id="journey_tab_section" style="display: ;">
    <div class="bg-white shadow table-responsive border_rounded m-1">
            <table class="table table-hover table-striped p-3">
                <thead class='table_head'>
                       <tr class="border-bottom">
                            <th scope="col" class="py-3 px-3 font_medium w_200 table_text fs-6">SERIAL</th>
                            <th scope="col" class="py-3 px-3 font_medium w_200 table_text fs-6" style="min-width: 150px">Question Sets Name</th>
                            <th scope="col" class="py-3 px-3 font_medium w_200 table_text fs-6" style="min-width: 100px">ATTEMPT</th>
                            <th scope="col" class="py-3 px-3 font_medium w_200 table_text fs-6">COMPLETED</th>
                            <th scope="col" class="py-3 px-3 font_medium w_200 table_text fs-6">TOTAL POINTS EARNED</th>
                            <th scope="col" class="py-3 px-3 font_medium w_200 table_text fs-6">ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @foreach ($journeySessions['data'] as $journey)
                            @if(count($journey) > 0)
                                <tr class="border-bottom">
                
                                    <td class="table_text font_medium fw-normal py-2 m-0 fw-semibold" data-label="serial">
                                        <?php echo $i; ?>
                                    </td>
                                    <td class="table_text font_medium fw-normal py-2 m-0" data-label="name">{{ $journey['name'] }}</td>
                                    <td class="table_text font_medium fw-normal py-2 m-0" data-label="subtitle">{{ $journey['subtitle'] }}</td>
                                    <td class="table_text font_medium fw-normal py-2 m-0" data-label="completed">{{ $journey['completed'] }}</td>
                                    <td class="table_text font_medium fw-normal py-2 m-0" data-label="status">
                                        <span class="bg-label-warning p-2 rounded-pill px-3">
                                            {{ $journey['total_points_earned'] }}
                                        </span>
                                    </td>
                                    <td class="table_text font_medium fw-normal py-2 m-0" data-label="actions">
                                        <button class="btn bg-transparent border-0" data-bs-toggle="tooltip" data-bs-html="true" data-bs-title="View Analytics"><a class="text-white"
                                            href="/journey/{{$journey['slug']}}/analysis/{{$journey['id']}}">
                                        <img src="{{url('images\analysis.png')}}" height="35px" width="auto" alt="analytics icon"></a>
                                        </button>
                                    </td>
                                </tr>
                                <?php $i++; ?>
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
                                @if($journeySessions['meta']['pagination']['per_page'] == 10)
                                <option value="10" selected>10</option>
                                @else
                                <option value="10">10</option>
                                @endif
                                @if($journeySessions['meta']['pagination']['per_page'] == 20)
                                <option value="20" selected>20</option>
                                @else
                                <option value="20">20</option>
                                @endif
                                @if($journeySessions['meta']['pagination']['per_page'] == 50)
                                <option value="50" selected>50</option>
                                @else
                                <option value="50">50</option>
                                @endif
                                @if($journeySessions['meta']['pagination']['per_page'] == 100)
                                <option value="100" selected>100</option>
                                @else
                                <option value="100">100</option>
                                @endif
                            </select>
                        </div>
                        <div class="align-self-center">
                            @if($journeySessions['meta']['pagination']['total'] > $journeySessions['meta']['pagination']['count'])
                                @if(isset($journeySessions['meta']['pagination']['links']['previous']))
                                    <span>
                                        <a href="{{$journeySessions['meta']['pagination']['links']['previous']}}"><button class="btn btn-sm bg-label-dark">previous</button></a>
                                    </span>
                                @endif
                            @endif
                                <span class="mx-2">
                                    PAGE <span id="page_active">{{$journeySessions['meta']['pagination']['current_page']}}</span> OF {{$journeySessions['meta']['pagination']['total_pages']}}
                                </span>
                            @if($journeySessions['meta']['pagination']['total'] > $journeySessions['meta']['pagination']['count'])
                                @if(isset($journeySessions['meta']['pagination']['links']['next']))
                                <span>
                                    <a href="{{$journeySessions['meta']['pagination']['links']['next']}}"><button class="btn btn-sm bg-label-dark">Next</button></a>
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
                var current_page = {!!str_replace("'", "\'", json_encode($journeySessions['meta']['pagination']['current_page'])) !!};
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