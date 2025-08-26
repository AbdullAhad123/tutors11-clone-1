<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quiz Type - Student Portal - Tutors 11 Plus</title>
    <link rel="shortcut icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}" type="image/x-icon">
    <style>
        .sessionType_card {
            height: auto;
            width: auto;
            background: linear-gradient( 142deg , #003e94 , #008bff) !important;
            transition: 0.2s;
        }
        .sessionType_card:hover {
            scale: 1.02
        }
        .quiz_cards {
            background:linear-gradient(45deg, #3391ff, #127af4);
        }
        .heading_separator {
            height: 0.4rem;
            width: 120px;
            background: var(--portal-secondary);
            border-radius: 20rem;
        }
    </style>
</head>

<body>

    @include('sidebar')
    @include('header')

    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- <div class="row" id="combine"></div> -->
        <div class="container-xxl flex-grow-1 container-p-y">
        <div class="text-start my-3">
            <button class="align-items-center border-0 btn d-flex fs-5 fw-normal ps-0" type="button" value="Back" onclick="goBack()"><i class="bx bx-left-arrow-alt fs-2 me-1" aria-hidden="true"></i>Back to Quiz</button>
        </div>
        <div class="my-3 mb-4">
            <h1 class="fw-medium m-0 mb-2 text-capitalize text-dark">Quiz Session</h1>
            <p class="fs-5 text-dark">Get ready for an engaging and knowledge-packed quiz session. Sharpen your skills and stay tuned for exciting challenges that will put your knowledge to the test. Ace the quizzes and boost your understanding of the course material. Let the learning adventure begin!</p>
        </div>
        <h2 class="fw-medium my-3 mb-4 h1 text-capitalize text-center text-dark">All Sessions</h2>
        <div class="row align-items-center justify-content-center my-3" id="combine"></div>
    </div>
    
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });

        let slug = {!! str_replace("'", "\'", json_encode($type['slug']))!!};
        var reqData = {
            type: slug
        }
        $.ajax({
            type: "GET",
            url: '/fetch-quizzes-by/' + slug,
            data: {
                reqData,
                _token: '{{ csrf_token() }}'
            },
            success: function (data) {
                let total = data.quizzes.data.length;
                if (total > 0) {
                    data.quizzes.data.forEach(function (qu) {
                        const tab=  `<div class="col-lg-6 col-md-8 col-sm-10 my-3">
                                        <a class="text-decoration-none" href="/quiz/${qu.slug}/instructions">
                                            <div class="quiz_cards shadow rounded-5 p-5 mb-2">
                                                <div class="d-flex justify-content-between">
                                                <div>
                                                    <h3 class="text-white">${qu.title}</h3>
                                                </div>
                                                <i class="bx bx-right-arrow-alt ms-1 fs-4 text-white"></i>
                                                </div>
                                                <div class="row mt-3">
                                                    <div class="col-lg-4 col-sm-4 col-md-4 text-center">
                                                        <img src="{{url('images/questions_marks_icon.webp')}}" width="50" height="50" class="img-fluid" alt="">
                                                        <h4 class="fs-6 text-white pt-2">${qu.total_questions} Questions</h4>
                                                    </div>
                                                    <div class="col-lg-4 col-sm-4 col-md-4 text-center">
                                                        <img src="{{url('images/timer.webp')}}" width="50" height="50" alt="" class="img-fluid">
                                                        <h3 class="fs-6 text-white pt-2">${qu.total_duration} Minutes</h3>
                                                    </div>
                                                    <div class="col-lg-4 col-sm-4 col-md-4 text-center">
                                                        <img src="{{url('images/practice_brain_icon.webp')}}" width="50" height="50" class="img-fluid" alt="">
                                                        <h3 class="fs-6 text-white pt-2">${qu.total_marks} Marks</h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>`;
                        setTimeout(()=>{$("#combine").append(tab),$(".load_content").addClass("d-none")},2500);
                    });
                } else {
                    let tab =   `<div class="text-center">
                                    <img src="{{url('images/no_record_found.png')}}" class='my-2' height='auto' width='280' alt="no records found">
                                    <h2 class="fw-normal h4 m-0 mb-3 text-primary">No Sessions Found</h2>
                                </div>`
                        setTimeout(()=>{$("#combine").append(tab),$(".load_content").addClass("d-none")},2500);
                }
            },
            error: function (data, textStatus, errorThrown) {
                console.log(data);
            },
        });
    </script>

</body>

</html>