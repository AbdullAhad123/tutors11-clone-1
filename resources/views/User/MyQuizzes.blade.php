<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{url('Frontend_css/demo.css')}}">
    <title>Quizzes - Student Portal - Tutors 11 Plus</title>
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

    <!-- Quiz Attempts Section  -->
    <section class="Quiz_Attempts" id="quiz_tab_section" style="display:;">
        <div class="child_not_selected bg-white">
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
            <div class="table-responsive">
                <table class="table border-white">
                    <thead class="table_head_section">
                        <tr class="border-bottom">
                            <th scope="col" class="py-3 " style="color:white !important;">SERIAL</th>
                            <th scope="col" class="py-3" style="min-width: 150px;color:white !important;">Quiz NAME</th>
                            <th scope="col" class="py-3" style="color:white !important;" >COMPLETED</th>
                            <th scope="col" class="py-3" style="color:white !important;">PERCENTAGE</th>
                            <th scope="col" class="py-3" style="color:white !important;">SCORE</th>
                            <th scope="col" class="py-3" style="color:white !important;">STATUS</th>
                            <th scope="col" class="py-3" style="color:white !important;">ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($quizSessions['data']) > 0)
                            <?php $i=1; ?>
                            @foreach ($quizSessions['data'] as $quiz)
                              @if($quiz)
                                <tr class="border_bottom">
                                    <td class="table_text font_medium fw-normal py-2 px-4 m-0 fw-semibold" data-label="serial">
                                        <?php echo $i;?>
                                    </td>
                                    <td class="table_text font_medium fw-normal py-2 m-0 fw-semibold" data-label="exam">{{ $quiz['name'] }}</td>
                                    <td class="table_text font_medium fw-normal py-2 m-0" data-label="completed">{{ $quiz['completed'] }}</td>
                                    <td class="table_text font_medium fw-normal py-2 m-0" data-label="percentage">{{ $quiz['percentage'] }}</td>
                                    <td class="table_text font_medium fw-normal py-2 m-0" data-label="score">{{ $quiz['score'] }}</td>
                                    <td class="table_text font_medium fw-normal py-2 m-0" data-label="status">
                                    @if ($quiz['status'] === 'Failed')
                                        <span class="bg-label-danger p-2 rounded-pill px-3 small fw-semibold user-select-none">{{ $quiz['status'] }}</span>
                                    @else 
                                        <span class="bg-label-success p-2 rounded-pill px-3 small fw-semibold user-select-none">{{ $quiz['status'] }}</span>
                                    @endif
                                        <!-- <span class="bg-label-danger p-2 rounded-pill px-3 small fw-semibold" style="color: #ff2b2b!important ;">{{ $quiz['status']}}</span> -->
                                    </td>
                                    <td data-label="actions"><a href="/quiz/{{ $quiz['slug'] }}/results/{{ $quiz['id'] }}" data-bs-toggle="tooltip" data-bs-html="true" data-bs-title="View Results"
                                            class="py-4">
                                            <img src="{{url('images\analysis.png')}}" class="user-select-none" height="35px" width="auto" alt="analytics icon"></a></td>
                                </tr>
                                <?php $i++;?>
                              @endif
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

            <div class="col-12 col-lg-12 order-2 order-md-3 order-lg-2">
                <div class="card bg-lighter rounded-0">
                    <div class="row justify-content-between align-items-center px-3 py-3">
                        <div class="col-lg-6 col-md-6 col-sm-7 col-7 d-flex align-items-center row_pagination_section">
                            <span class="me-1">
                                ROWS PER PAGE:
                            </span>
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
                        <div class="col-lg-6 col-md-6 col-sm-5 col-5 align-self-center text-end page_numbers_section">
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
    @endif
    @include('User.ProgressScript')

</body>

</html>