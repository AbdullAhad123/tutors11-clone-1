<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Journey Progress - Student Portal - Tutors 11 Plus</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}" type="image/x-icon">
    <!-- bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
      .button { width: 70px; height: 30px; color: #fff; background-color: #003277; border: none; border-radius: 90px; box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1); transition: all 0.3s ease 0s; cursor: pointer; outline: none; } .button:hover { background-color: #13274F; box-shadow: #003277; color: white; transform: translateY(-7px); } .border_rounded { border-radius: 1rem!important; } .font_medium { font-size: 1rem!important; } .filter_btn { background-color: #fff !important; border-radius: 0.25rem } .w_200 { min-width: 200px; } .w_300 { min-width: 300px; } .w_250 { min-width: 250px; } .table-responsive::-webkit-scrollbar { height: 0.5rem!important; } .table-responsive::-webkit-scrollbar-thumb { background: #8e8e8e!important; border-radius: 50rem; } /* progress header */ .progress_header { background:linear-gradient(45deg, #007bff, #007bff); } .progress { border-radius:50%; } .progress-heading { color:#322c75; } .heading_separator { height: 0.4rem; width: 120px; background: orange; border-radius: 20rem; } .progress_cards { transition: 0.25s !important; } .progess_cards:hover { scale: 1.04 !important ; } .progress_bar_wrap { width: 15px; height: 0.5rem; } .need_journey { background-color: #f58c37; } .good { background-color: #71c6fc; } .strong { background-color: #478b08; } .master { background-color: #815fdd; } .master_performance { background: radial-gradient(#ae5dd5, #6f27a2) !important; } .average_performance { background: radial-gradient(#ca747d, #dc3545) !important; } .good_performance { background: radial-gradient(#0e8eff, #084ddc) !important; } .strong_performance { background: radial-gradient(#ffba39, #e49500) !important; }
    </style>
</head>

<body>
    @include('sidebar')
    @include('header')
    <nav class='mb-4' style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item fw-light small text-dark">Dashboard</li>
        <li class="breadcrumb-item fw-light small text-dark">Analysis</li>
        <li class="breadcrumb-item fw-light active small text-primary" aria-current="page">Progress</li>
      </ol>
    </nav>

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

    <button class="alert alert-primary align-items-center border-primary w-100 d-flex my-5 rounded-4 shadow" role="alert" data-bs-toggle="modal" data-bs-target="#performance_metrices_popup"><i class='bx me-1 fs-5 bx-info-circle'></i>Explore! How we calculate child's performance.</button>

    <div class="modal fade" id="performance_metrices_popup" tabindex="-1" aria-labelledby="performance_metrices_popupLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content rounded-0">
          <div class="modal-header">
            <h2 class="modal-title fs-4" id="performance_metrices_popupLabel">Performance Metrics</h2>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="text-center py-3">
              <img src="{{url('images/performance_metrics_image.png')}}" height='auto' width='280' alt="performance metrics">
              <h2 class="mt-4 mb-2">Scoring System</h2>
              <p class="fs_cs_5">Tutorselevenplus mastery levels track child's progress based on correct answers and question difficulty. Daily updates help you see how child compares to peers. If child faces challenges, our algorithm targets specific areas for improvement.</p>
              <div class="row align-items-center my-3">
                <div class="col-lg-3 col-md-5 col-sm-6 col-12 my-2">
                  <div class="performance_card_item p-4 shadow rounded-4 average_performance">
                    <p class="text-white fw-normal fs_cs_5">Need Practise</p>
                    <p class="text-white lh-1 fs-6">0-68%</p>
                  </div>
                </div>
                <div class="col-lg-3 col-md-5 col-sm-6 col-12 my-2">
                  <div class="performance_card_item p-4 shadow rounded-4 good_performance">
                    <p class="text-white fw-normal fs_cs_5">Good</p>
                    <p class="text-white lh-1 fs-6">69-82%</p>
                  </div>
                </div>
                <div class="col-lg-3 col-md-5 col-sm-6 col-12 my-2">
                  <div class="performance_card_item p-4 shadow rounded-4 strong_performance">
                    <p class="text-white fw-normal fs_cs_5">Strong</p>
                    <p class="text-white lh-1 fs-6">83-88%</p>
                  </div>
                </div>
                <div class="col-lg-3 col-md-5 col-sm-6 col-12 my-2">
                  <div class="performance_card_item p-4 shadow rounded-4 master_performance">
                    <p class="text-white fw-normal fs_cs_5">Master</p>
                    <p class="text-white lh-1 fs-6">89-100%</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="mb-4">
        <h2 class="fw-medium mb-1 mt-4 mt-lg-5 mt-md-5 text-capitalize text-dark">Child Performance</h2>
        <div class="heading_separator"></div>
    </div>
    <div class="row m-0 mt-5">
        <div class="mb-4 w-100 px-0">
            <ul class="nav nav-tabs bg-white justify-content-center shadow my-2" id="myTab" role="tablist" style="border-bottom: none;">
                <li class="nav-item col-sm-6 col-12 hstack" role="presentation">
                    <button class="nav-link body_section_nav p-0" id="progress" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="false">
                        <a style="color: black" class="nav_tab_link d-block py-2 px-1 text-capitalize text-white bg-primary" href="{{route('parent_journey_progress')}}">In-progress</a>
                    </button>
                </li>
                <li class="nav-item col-sm-6 col-12 hstack" role="presentation">
                    <button class="nav-link body_section_nav p-0 bg-white" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">
                        <a style="color: black" class="nav_tab_link d-block py-2 px-1 text-capitalize" href="{{route('my_child_journey')}}">Past Journeys</a>
                    </button>
                </li>
            </ul>
        </div>
    </div>
      
    @if ($childName == '')
        <section id="home_tab_section" style="display:;">
            <div class="col-12 col-lg-12 order-2 order-md-3 order-lg-2 mb-4">
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
        </section>
    @else
        <!-- <div class="row justify-content-between align-items-center m-0 my-3">
            <div class="col-lg-6 col-md-6 col-sm-12 col-12 my-3">
                <div class="d-flex align-items-center mx-lg-start mx-md-start mx-auto">
                    <input type="text" name="table_filter" id="table_filter" class="border-0 font_medium form-control fw-light m-1 p-2 px-3 shadow-sm text-dark" placeholder='Search here...'>
                    <button class="filter_btn d-flex justify-content-center align-items-center p-2 px-3 m-1 shadow-sm border-0" aria-labelledby='table_filter'>
                        <i class='bx bx-filter'></i>
                        Filter
                    </button>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-12 my-3 text-end">
                <div class="dropdown dropdown-menu-end">
                    <button class="btn btn-transparent shadow-sm bg-white text-dark" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Sort By <i class='bx bx-chevron-down' ></i>
                    </button>
                    <ul class="dropdown-menu shadow">
                        <li><a class="dropdown-item" href="#"></a></li>
                        <li><a class="dropdown-item" href="#"> </a></li>
                        <li><a class="dropdown-item" href="#"></a></li>
                    </ul>
                </div>
            </div>
        </div> -->
        @if(count($journey_sessions) > 0)
            <div class="bg-white shadow table-responsive border_rounded m-1">
                <table class="table table-hover table-striped p-3">
                    <thead class='table_head'>
                        <tr class="border-bottom">
                            <th scope="col" class="py-3 px-3 font_medium w_200 table_text">Serial</th>
                            <th scope="col" class="py-3 font_medium w_300 table_text">Test Name</th>
                            <th scope="col" class="py-3 font_medium w_250  table_text">Topic</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white" >
                        @foreach($journey_sessions as $key => $sess)
                          @if(count($sess) > 0)
                            <tr class='border-bottom'>
                              <td><p class="font_medium fw-normal table_text py-2 px-3">{{++$key}}</p></td>
                              <td><p class="table_text font_medium fw-normal py-2 m-0">{{$sess['title']}}</p></td>
                              <td><p class="table_text font_medium fw-normal py-2 m-0">{{$sess['skill']}}</p></td>
                            </tr>
                          @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <section id="home_tab_section">
                <div class="col-12 col-lg-12 order-2 order-md-3 order-lg-2 mb-4 shadow rounded-3 ">
                    <div class="card">
                        <div class="text-center">
                            <img src="{{url('images\not_found_error.png')}}" width="60" height="60" class="my-4" alt="No Result Found">
                            <p class="text-capitalize h5 text-black mb-4">No Sessions Found</p>
                        </div>
                    </div>
                </div>
            </section>
        @endif
    @endif
    
    @include('User.ProgressScript')
 
</body>

</html>