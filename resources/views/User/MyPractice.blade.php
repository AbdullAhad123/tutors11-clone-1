<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ url('Frontend_css/demo.css') }}">
    <title>Practise - Student Portal - Tutors 11 Plus</title>
    <link rel="shortcut icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}" type="image/x-icon">
    <style>
      .table_head_section{
          background: #006ae8;
      }
      .progress_header
      {
          background:linear-gradient(45deg, #186b8b, #5ac1e2);
      }
      .progress
      {
          border-radius:50%;
      }
      .progress-heading
      {
          color:#322c75;
      }
      .heading_separator {
          height: 0.4rem;
          width: 120px;
          background: orange;
          border-radius: 20rem;
      }
      .progress_cards {
      transition: 0.25s  !important;
      }
      .progess_cards:hover {
          scale: 1.04 !important ;
      }
      .progress_bar_wrap {
        width: 15px;
        height: 0.5rem;
      }
      .need_practice {
        background-color: #f58c37;
      }

      .good {
        background-color: #71c6fc;
      }

      .strong {
        background-color: #478b08;
      }

      .master {
        background-color: #815fdd;
      }
      @media (max-width: 575px) {
        .responsive_image {
          width: 280px !important
        }
      }
    </style>
</head>

<body>


    @include('sidebar')
    @include('header')
    <!-- header progress -->
    <section>
        <div class="row progress_header p-3  rounded-5 align-items-center justify-content-center">
            <div class="col-lg-8 col-md-12 col-sm-12 ">
                <h2 class="fw-bold text-white">Your Child's Academic Journey</h2>
                <p class="text-white fs-6">Welcome to the progress report section, where you can gain valuable insights into your child's academic journey.As you navigate through this portal, you'll uncover a detailed narrative of your child's progress</p>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 d-flex justify-content-center">
                <img src="{{url('images/progress_report.png')}}" width="300" height="300" class="img-fluid"alt="">
            </div>
        </div>
    </section>
    <!-- progress cards -->
    <div class="performance_heading">
        <div class="mb-4">
            <h2 class="fw-medium mb-1 mt-4 mt-lg-5 mt-md-5 text-capitalize text-dark">Performance</h2>
            <div class="heading_separator"></div>
        </div>
      <p class="fs-5 mx-2 my-4 text-dark" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample"> How do we calculate your child’s Tutor Eleven Plus performance score? <i class="bx bx-chevron-down h2 mx-1"></i></p>
      <div class="collapse text-dark-5 mb-4 mx-2" id="collapseExample">
        <div class='fw-light fs-6'>Tutor Eleven Plus mastery levels help you keep track of your child's progress. These levels reflect how well your child is doing in their recent Tutor Eleven Plus work, and take into account both the number of correct answers and the difficulty of the questions. You'll see an update every day as we incorporate your child's work into their scores. Think of these levels as a helpful guide that shows you how your child is doing compared to others their age. If your child is not quite where they should be, Tutor Eleven Plus's algorithm will target specific areas of difficulty to ensure they progress in areas of difficulty</div>
        <section class="collapse-text">
          <div class="container my-3">
            <div class="row">
              <div class="col-lg-2 col-md-3 col-sm-6 col-6">
                <div class="d-flex my-3">
                  <div class="progress bg-transparent">
                    <span class="">
                      <i class="val"></i>
                    </span>
                    <div class="progress_bar_wrap need_practice mx-1">
                      <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                  <div class="progress bg-transparent">
                    <span class="">
                      <i class="val"></i>
                    </span>
                    <div class="progress_bar_wrap bg-white mx-1">
                      <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                  <div class="progress bg-transparent">
                    <span class="">
                      <i class="val"></i>
                    </span>
                    <div class="progress_bar_wrap bg-white mx-1">
                      <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                  <div class="progress bg-transparent">
                    <span class="">
                      <i class="val"></i>
                    </span>
                    <div class="progress_bar_wrap bg-white mx-1">
                      <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                </div>
                <p class="text-dark fw-normal fs-5">Needs Practise</p>
                <p class='text-dark'>0-68</p>
              </div>
              <div class="col-lg-2 col-md-3 col-sm-6 col-6">
                <div class="d-flex my-3">
                  <div class="progress bg-transparent">
                    <span class="">
                      <i class="val"></i>
                    </span>
                    <div class="progress_bar_wrap good mx-1">
                      <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                  <div class="progress bg-transparent">
                    <span class="">
                      <i class="val"></i>
                    </span>
                    <div class="progress_bar_wrap good mx-1">
                      <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                  <div class="progress bg-transparent">
                    <span class="">
                      <i class="val"></i>
                    </span>
                    <div class="progress_bar_wrap bg-white mx-1">
                      <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                  <div class="progress bg-transparent">
                    <span class="">
                      <i class="val"></i>
                    </span>
                    <div class="progress_bar_wrap bg-white mx-1">
                      <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                </div>
                <p class="text-dark fw-normal fs-5">Good</p>
                <p class='text-dark'>69-82</p>
              </div>
              <div class="col-lg-2 col-md-3 col-sm-6 col-6">
                <div class="d-flex my-3">
                  <div class="progress bg-transparent">
                    <span class="">
                      <i class="val"></i>
                    </span>
                    <div class="progress_bar_wrap strong mx-1">
                      <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                  <div class="progress bg-transparent">
                    <span class="">
                      <i class="val"></i>
                    </span>
                    <div class="progress_bar_wrap strong mx-1">
                      <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                  <div class="progress bg-transparent">
                    <span class="">
                      <i class="val"></i>
                    </span>
                    <div class="progress_bar_wrap strong mx-1">
                      <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                  <div class="progress bg-transparent">
                    <span class="">
                      <i class="val"></i>
                    </span>
                    <div class="progress_bar_wrap bg-white mx-1">
                      <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                </div>
                <p class="text-dark fw-normal fs-5">Strong</p>
                <p class='text-dark'>83-88</p>
              </div>
              <div class="col-lg-2 col-md-3 col-sm-6 col-6 mb-2">
                <div class="d-flex my-3">
                  <div class="progress bg-transparent">
                    <span class="">
                      <i class="val"></i>
                    </span>
                    <div class="progress_bar_wrap master mx-1">
                      <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                  <div class="progress bg-transparent">
                    <span class="">
                      <i class="val"></i>
                    </span>
                    <div class="progress_bar_wrap master mx-1">
                      <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                  <div class="progress bg-transparent">
                    <span class="">
                      <i class="val"></i>
                    </span>
                    <div class="progress_bar_wrap master mx-1">
                      <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                  <div class="progress bg-transparent">
                    <span class="">
                      <i class="val"></i>
                    </span>
                    <div class="progress_bar_wrap master mx-1">
                      <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                </div>
                <p class="text-dark fw-normal">Master</p>
                <p class='text-dark'>89-100</p>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>

    <div class="mb-4">
        <h2 class="fw-medium mb-1 mt-4 mt-lg-5 mt-md-5 text-capitalize text-dark">Child Performance</h2>
        <div class="heading_separator"></div>
    </div>
    @include('Parent.Progresstopbar')

    <section class="Practice_session" id="practice_tab_section" style="display: ;">
        <div class="child_not_selected px-2 rounded-3">
        @if ($childName == '')
            <div class="card py-4">
                <img src="{{url('images\select_child.png')}}" width="120px" height="auto" alt="" class="mt-2 mx-auto">
                <p class="py-2 text-center text-black">Please Select a Child First</p>
                <div class="rounded-2 navbar_right_button bg-transparent mx-auto mt-2 mb-4"
                    style="font-size: 17px; border: 2px solid #9a65f6;">
                    <a class="nav-link fw-medium p-1 px-2 fs-6" style="color: #9a65f6;" aria-current="page"
                        href="{{route('change_child')}}">
                        Select One
                    </a>
                </div>
            </div>
        </div>
        @else

        <div class="bg-white shadow-lg">
            <div class="table-responsive bg-light">
                <table class="table border-white">
                    <thead class="table_head_section">
                        <tr class="border-bottom">
                            <th scope="col" class="py-3" style="min-width: 100px;color:white !important;">SERIAL</th>
                            <th scope="col" class="py-3" style="min-width: 220px;color:white !important;">QUESTION SET NAME</th>
                            <th scope="col" class="py-3" style="min-width: 120px;color:white !important;">COMPLETED</th>
                            <th scope="col" class="py-3" style="min-width: 200px;color:white !important;">TOTAL POINTS EARNED</th>
                            <th scope="col" class="py-3" style="min-width: 100px;color:white !important;">ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @foreach ($practiceSessions['data'] as $practice)
                          @if(count($practice) > 0)
                            <tr>
                                <td class="fw-semibold text-dark py-3" data-label="serial">
                                    <?php echo $i; ?>
                                </td>
                                <td class="text-dark py-3 fw-semibold" data-label="exam">{{ $practice['name'] }}</td>
                                <td class="text-dark py-3" data-label="completed">{{ $practice['completed'] }}</td>
                                <td class="text-dark py-3" data-label="status">
                                    <div class="d-flex align-items-center">
                                        <img src="{{url('images\reward.png')}}" width="25" height="25" alt="reward coin">
                                        <span class="ms-1">{{ $practice['total_points_earned'] }}</span>
                                    </div>  
                                </td>
                                <td class="text-dark py-3" data-label="actions"><a 
                                    href="/practice/{{$practice['slug']}}/analysis/{{$practice['id']}}" data-bs-toggle="tooltip" data-bs-html="true" data-bs-title="View Analytics">
                                    <img src="{{url('images\analysis.png')}}" class="user-select-none" height="35px" width="auto" alt="analytics icon"></a>
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
                                @if(isset($practiceSessions['meta']['pagination']['links']['previous']))
                                    <span>
                                        <a href="{{$practiceSessions['meta']['pagination']['links']['previous']}}"><button class="btn btn-sm bg-label-dark">previous</button></a>
                                    </span>
                                @endif
                            @endif
                                <span class="mx-2">
                                    PAGE <span id="page_active">{{$practiceSessions['meta']['pagination']['current_page']}}</span> OF {{$practiceSessions['meta']['pagination']['total_pages']}}
                                </span>
                            @if($practiceSessions['meta']['pagination']['total'] > $practiceSessions['meta']['pagination']['count'])
                                @if(isset($practiceSessions['meta']['pagination']['links']['next']))
                                <span>
                                    <a href="{{$practiceSessions['meta']['pagination']['links']['next']}}"><button class="btn btn-sm bg-label-dark">Next</button></a>
                                </span>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
                
        @endif
    </section>

    {{--<div class="text-center my-3">
      <img src="{{url('images/available_soon.png')}}" class="responsive_image" width="500" height="auto" alt="an illustration of girl waiting with excitement">
      <h2 class="fw-normal h4 my-2 text-center">This functionality will soon be accessible.</h2>
    </div>--}}

    <script>
        $(document).ready(function(){
            // row per page 
            $('#per_page_option').on('change', function(e) {
                var perPage = parseInt($(this).val());
                var pathname = window.location.pathname;
                var current_page = {!! isset($practiceSessions['meta']['pagination']['current_page']) ? str_replace("'", "\'", json_encode($practiceSessions['meta']['pagination']['current_page'])) : 1 !!};
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