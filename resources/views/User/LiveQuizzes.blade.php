<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ url('Frontend_css/demo.css') }}">
    <title>Live Quizzes - Student Portal - Tutors 11 Plus</title>
    <link rel="shortcut icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}" type="image/x-icon">
    <style>
        /* slider css  start*/
        .card-slider {
            max-width: 1000px;
            margin: 0 auto;
        }

        @media screen and (max-width: 1024px) {
            .card-slider {
                width: 80%;
            }
        }

        .card-slider .card {
            position: relative;
            display: flex !important;
            flex-direction: column;
            height: 150px;
            border-radius: 3px;
            border: 1px solid rgba(0, 0, 0, 0.2);
            background-color: #fff;
            text-decoration: none;
            color: rgba(0, 0, 0, 0.9);
            transition: all 0.1s linear;
        }

        @media screen and (max-width: 600px) {
            .card-slider .card {
                height: auto;
            }
        }

        .card-slider .card .main-link {
            text-decoration: none;
            display: flex;
            flex-direction: column;
        }

        .card-slider .card .main-link:focus {
            outline: 0;
        }

        .card-slider .card .title {
            color: #000;
            margin: 0;
            padding: 10px 10px 5px 10px;
            font-size: 16px;
            font-weight: 700;
        }

        .card-slider .card .image {
            order: -1;
            position: relative;
            height: 100px;
            padding: 2px;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card-slider .card .image img {
            width: 100%;
            height: 100%;
            -o-object-fit: cover;
            object-fit: cover;
            filter: grayscale(0.5);
            transition: all 0.3s ease-in-out;
        }

        .card-slider .card .image:hover img {
            width: 110%;
            height: 110%;
        }

        .card-slider .card:hover {
            border-color: rgba(0, 0, 0, 0.4);
            box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.15);
        }

        .card-slider .card:focus .image img,
        .card-slider .card:hover .image img {
            filter: grayscale(0);
        }

        .card-slider .card a:focus {
            outline: 0;
        }

        /* slider css end */

        /* custom css start */
        .viewall_button {
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            color: #696CFF;
        }

        .number_style {
            font-size: 1rem;
            font-weight: 500;
            color: #000;
        }

        .Question_heading {
            color: #059669;
            font-size: 1rem;
            font-weight: 400;
        }

        .dot_overlay {
            width: 7px;
            height: 7px;
            background: #696CFF;
        }

        .Fixed_heading {
            color: #6a21dd;
            font-size: 0.9rem;
            font-weight: 500;
        }

        .time_styling {
            color: #000;
            font-size: 0.9rem;
            font-weight: 500;
        }

        .Fixed_schedule_time {
            background: #ebeeff;
        }

        .first_term_name {
            color: #000;
            font-size: 0.9rem;
            font-weight: 400;
        }

        .Start_exam_button {
            color: #fff;
            background: #696CFF;
            font-size: 0.9rem;
            cursor: pointer;
        }

        .Start_exam_button:hover {
            background: #696CFF;
            color: #fff;
        }

        .text-green {
            color: #059669;
        }

        /* custom css end */
    </style>
</head>

<body>
    @include('sidebar')
    @include('header')
    <div class="align-items-center d-flex justify-content-between mb-2">
        <div class="d-inline-flex position-relative">
            <h4 class="fw-semibold mb-4 mt-2 text-dark">
                Live Quizzes
                <span class="ms-1 border border-1 border-warning d-inline-flex position-absolute rounded-circle top-0"
                    style="width:15px;height:15px;padding: 2px;">
                    <span class="h-100 spinner-grow text-warning"></span>
                </span>
            </h4>
        </div>
        <span class=""> <span id="total_Schedule">0</span> Schedules Found</span>
    </div>

    <div class="container-fluid pb-4">
        <div id="schedules" class="row"></div>
    </div>
    @include('User.ProgressScript')
    <script>
        $.ajax({
            type: "GET",
            url: '/fetch-live-quizzes',
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function (data) {
                let schedules = data.schedules.data;
                let pagination = data.schedules.meta.pagination;
                $("#total_Schedule").text(pagination.count);
                schedules.forEach(function (schedule) {
                    let tab = `<div class="col-lg-6 col-md-8 col-sm-9x col-12">
                                    <div class="bg-white h-auto py-4 px-3 rounded shadow">
                                        <h3 class="mb-0 pb-4" style="color: #000; font-size: 1.1rem; font-weight: 600;">`+ schedule.title + `</h3>
                                        <div class="Fixed_schedule_time rounded h-auto py-3 px-3">
                                            <h6 class="Fixed_heading text-uppercase">`+ schedule.scheduleType + ` SCHEDULE TIME</h6>
                                            <div class="d-flex align-items-center">
                                                <i class="bx bx-calendar text-green me-3"></i>
                                                <p class="mb-0 time_styling">`+ schedule.starts_at + `</p>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <i class="bx bx-time text-danger me-3"></i>
                                                <p class="mb-0 py-4 time_styling">`+ schedule.ends_at + `</p>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <i class="bx bx-globe text-green me-3"></i>
                                                <p class="mb-0 time_styling">Timezone - `+ schedule.timezone + `</p>
                                            </div>
                                        </div>
                                        <div class="row py-4">
                                            <div class="col-4">
                                                <h5 class="number_style">`+ schedule.total_questions + `</h5>
                                                <h4 class="Question_heading">Questions</h4>
                                            </div>
                                            <div class="col-4">
                                                <h5 class="number_style">`+ schedule.total_duration + `</h5>
                                                <h4 class="Question_heading">Minutes</h4>
                                            </div>
                                            <div class="col-4">
                                                <h5 class="number_style">`+ schedule.total_marks + `</h5>
                                                <h4 class="Question_heading">Marks</h4>
                                            </div>
                                        </div>
                                        <div class="row align-items-center">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-12 my-2">
                                                <span class="first_term_name">`+ schedule.type + `</span>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-12 my-2 text-end">
                                                <div class="btn text-end">
                                                    <a href="/quiz/`+ schedule.slug + `/instructions" class="Start_exam_button rounded px-3 py-2">Start Quiz</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>`;
                    $("#schedules").append(tab);
                });
            },
            error: function (data, textStatus, errorThrown) {
                console.log(textStatus);
            },
        });
    </script>
</body>

</html>