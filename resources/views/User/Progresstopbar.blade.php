<style>
    .nav-tabs .body_section_nav.active a.nav_tab_link {
        color: #ffffff !important;
        background: var(--portal-primary) !important;
    }
    a.nav_tab_link {
          color: #0d0d0d
        }
       
        @media (max-width: 768px) {
          .small_tab_link {
            display: none;
          }
        }
        @media (max-width: 335px) {
          .nav_tab_link {
            font-size: 4.2vw;  
          }
        }
</style>
<div class="row m-0 mt-5">
    <div class="mb-4 w-100 px-0">
        <ul class="nav nav-tabs bg-white justify-content-center shadow my-2" id="myTab" role="tablist" style="border-bottom: none;">
            <li class="nav-item col-lg-3 col-md-3 col-sm-3 col-3 hstack" role="presentation">
                <button class="nav-link body_section_nav p-0 bg-white" id="progress" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="false">
                    <a style="color: black" class="nav_tab_link d-block py-2 px-1 text-capitalize" href="{{route('my_progress')}}">Progress</a>
                </button>
            </li>
            <li class="nav-item col-lg-3 col-md-3 col-sm-3 col-3 hstack" role="presentation">
                <button class="nav-link body_section_nav p-0 bg-white" id="exams" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">
                    <a style="color: black" class="nav_tab_link d-block py-2 px-1 text-capitalize" href="{{route('my_exams')}}">Exam</a>
                </button>
            </li>
            <li class="nav-item col-lg-3 col-md-3 col-sm-3 col-3 hstack" role="presentation">
                <button class="nav-link body_section_nav p-0 bg-white" id="quizzes" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">
                    <a style="color: black" class="nav_tab_link d-block py-2 px-1 text-capitalize" href="{{route('my_quizzes')}}">Quiz</a>
                </button>
            </li>
            <li class="nav-item col-lg-3 col-md-3 col-sm-3 col-3 hstack" role="presentation">
                <button class="nav-link body_section_nav p-0 bg-white" id="practice" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">
                    <a style="color: black" class="nav_tab_link d-block py-2 px-1 text-capitalize" href="{{route('my_practice')}}">Practise</a>
                </button>
            </li>
        </ul>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"
    integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function(){
        let path= window.location.pathname;
        if (path == '/my-exams') {
            $("#exams").removeClass('bg-white').addClass('bg-primary');
            $("#exams a").addClass('text-white');
        } else if (path == '/my-progress') {
            $("#progress").removeClass('bg-white').addClass('bg-primary');
            $("#progress a").addClass('text-white');
        } else if (path == '/my-quizzes') {
            $("#quizzes").removeClass('bg-white').addClass('bg-primary');
            $("#quizzes a").addClass('text-white');
        } else if (path == '/my-practice') {
            $("#practice").removeClass('bg-white').addClass('bg-primary');
            $("#practice a").addClass('text-white');
        }
    })
</script>
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