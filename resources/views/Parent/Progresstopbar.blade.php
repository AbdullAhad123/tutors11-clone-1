{{-- <div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 mb-4 order-0">
        <ul class="nav nav-tabs bg-white justify-content-center my-2" id="myTab" role="tablist" style="border-bottom: none;">
          <li class="nav-item" role="presentation">
            <button class="nav-link active body_section_nav text-dark" id="home_tab" data-bs-toggle="tab" data-bs-target="#home" type="button" 
            role="tab" aria-controls="home" aria-selected="true"><a href="{{route('progress')}}">Tests in progress</a></button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link body_section_nav text-dark" id="exam_tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" 
              role="tab" aria-controls="profile" aria-selected="false"><a href="{{route('exams')}}">Exam Attempts</a>
            </button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link body_section_nav text-dark" id="quiz_tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" 
            role="tab" aria-controls="contact" aria-selected="false"><a href="{{route('quizzes')}}">Quiz Attempts</a></button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link body_section_nav text-dark" id="practise_tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" 
            role="tab" aria-controls="contact" aria-selected="false"><a href="{{route('practices')}}">Practise Session</a></button>
          </li>
        </ul>
      </div> --}}

      <style>
        a.nav_tab_link {
          color: #0d0d0d
        }
        .nav-tabs .body_section_nav.active a.nav_tab_link {
          color: #0d0d0d
        }

        @media (max-width: 768px) {
          .small_tab_link {
            display: none;
          }
        }
        @media (max-width: 325px) {
          .nav_tab_link {
            font-size: 4vw;  
          }
        }
      </style>
      <div class="row m-0 mt-5">
        <div class="col-lg-8 col-md-10 col-sm-12 mb-4 order-0 w-100 overflow-scroll">
        <ul class="nav nav-tabs bg-white justify-content-center shadow my-2" id="myTab" role="tablist" style="border-bottom: none;">
            <li class="nav-item col-lg-3 col-md-3 col-sm-3 col-3 hstack" role="presentation">
              <button class="bg-body-secondary nav-link body_section_nav p-0" id="progress" data-bs-toggle="tab" data-bs-target="#home" type="button" 
              role="tab" aria-controls="home" aria-selected="true"><a class="rounded-5 nav_tab_link d-block py-2 px-1 text-capitalize" href="{{route('progress')}}"><span class="small_tab_link">Tests in&nbsp;</span>progress</a></button>
            </li>
            <li class="nav-item col-lg-3 col-md-3 col-sm-3 col-3 hstack" role="presentation">
                <button class="bg-body-secondary nav-link body_section_nav p-0" id="exams" data-bs-toggle="tab" data-bs-target="#profile" type="button" 
              role="tab" aria-controls="profile" aria-selected="false"><a class="rounded-5 nav_tab_link d-block py-2 px-1 text-capitalize" href="{{route('exams')}}">Exam<span class="small_tab_link">&nbsp;Attempts</span></a></button>
            </li>
            <li class="nav-item col-lg-3 col-md-3 col-sm-3 col-3 hstack" role="presentation">
              <button class="bg-body-secondary nav-link body_section_nav p-0" id="quizzes" data-bs-toggle="tab" data-bs-target="#contact" type="button" 
              role="tab" aria-controls="contact" aria-selected="false"><a class="rounded-5 nav_tab_link d-block py-2 px-1 text-capitalize" href="{{route('quizzes')}}">Quiz<span class="small_tab_link">&nbsp;Attempts</span></a></button>
            </li>
            <li class="nav-item col-lg-3 col-md-3 col-sm-3 col-3 hstack" role="presentation">
              <button class="bg-body-secondary nav-link body_section_nav p-0" id="practice" data-bs-toggle="tab" data-bs-target="#contact" type="button" 
              role="tab" aria-controls="contact" aria-selected="false"><a class="rounded-5 nav_tab_link d-block py-2 px-1 text-capitalize" href="{{route('practices')}}">Practise<span class="small_tab_link">&nbsp;Session</span></a></button>
            </li>
          </ul>
        </div>
      </div>      
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <script>
        let arr = window.location.pathname.split("/");
        let active_section = arr.slice(-1).pop();
        $("#" + active_section).addClass("active");
        $(document).ready(function () {
          $("#home_tab").click(function () {
            $("#home_tab_section").show();
            $("#exam_tab_section").hide();
            $("#quiz_tab_section").hide();
            $("#practice_tab_section").hide();
            $("#text_print").text("Test in progress")
          });
  
          $("#exam_tab").click(function () {
            $("#home_tab_section").hide();
            $("#exam_tab_section").show();
            $("#quiz_tab_section").hide();
            $("#practice_tab_section").hide();
            $("#text_print").text("Exam Attempts")
          });
  
          $("#quiz_tab").click(function () {
            $("#home_tab_section").hide();
            $("#exam_tab_section").hide();
            $("#quiz_tab_section").show();
            $("#practice_tab_section").hide();
            $("#text_print").text("Quiz Attempts")
          });
  
          $("#practise_tab").click(function () {
            $("#home_tab_section").hide();
            $("#exam_tab_section").hide();
            $("#quiz_tab_section").hide();
            $("#practice_tab_section").show();
            $("#text_print").text("practice")
          });
  
        })
  
      </script>
