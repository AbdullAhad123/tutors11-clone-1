<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Exam Type - Student Portal - Tutors 11 Plus</title>
    <link rel="shortcut icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}" type="image/x-icon">
</head>
 <script>
    function goBack() {
    window.history.back()
    }
</script>
<style>
    .first_term_name {
        color: #000;
        font-size: 0.9rem;
        font-weight: 400;
    }

    .first_term_name {
        color: #000;
        font-size: 0.9rem;
        font-weight: 400;
    }

    .Start_exam_button {
        color: #fff;
        background: #696cff;
        font-size: 0.9rem;
        cursor: pointer;
    }

    .Start_exam_button:hover {
        background: #696cff;
        color: #fff;
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

<body>
    @include('sidebar')
    @include('header')

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="text-start">
            <button class="align-items-center border-0 btn d-flex fs-5 fw-normal ps-0" type="button" value="Back" onclick="goBack()"><i class="bx bx-left-arrow-alt fs-2 me-1" aria-hidden="true"></i>Back to Exams</button>
        </div>
        <div class="my-3 mb-5">
            <h1 class="fw-medium m-0 mb-2 text-capitalize text-dark">Exam Types</h1>
            <p class="fs-5 text-dark">Welcome to Exam Types Sessions! Below, you'll find comprehensive information about all the sessions related to the . Don't miss out on crucial updates and ensure you're well-prepared for a successful first term!</p>
        </div>
        <h2 class="fw-medium my-3 mb-4 h1 text-capitalize text-center text-dark">All Sessions</h2>
        <div class="row align-items-center justify-content-center my-3" id="combine">
            <div class="load_content">
                <div class="spinner-border d-flex mx-auto" role="status"></div>
                <h2 class='h5 text-center my-2'>Getting Sessions for you...</h2>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"
        integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script defer
        src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/0.6.7/js/min/perfect-scrollbar.jquery.min.js">
    </script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });

        let slug = {!! str_replace("'", "\'", json_encode($type['slug'])) !!};
        var reqData = {
            type: slug
        }
        $.ajax({
            type: "GET",
            url: '/fetch-exams-by/' + slug,
            data: {
                reqData,
                _token: '{{ csrf_token() }}'
            },
            success: function(data) {
                console.log(data)
                let total = data.exams.meta.pagination.total;
                if (total > 0) {
                    data.exams.data.forEach(function(ex) {
                        const tab=`<div class="col-lg-6 col-md-8 col-sm-10 my-3">
                                        <a class="text-decoration-none" href="/exam/${ex.slug}/instructions">
                                            <div class="quiz_cards shadow rounded-5 p-5 mb-2">
                                                <div class="d-flex justify-content-between">
                                                <div>
                                                    <h3 class="text-white">${ex.title}</h3>
                                                    </div>
                                                    <i class="bx bx-right-arrow-alt ms-1 fs-4 text-white"></i>
                                                </div>
                                                <div class="row mt-3">
                                                    <div class="col-lg-4 col-sm-4 col-md-4 text-center">
                                                        <img src="{{url('images/questions_marks_icon.webp')}}" width="50" height="50" class="img-fluid" alt="">
                                                        <h4 class="fs-6 text-white pt-2">${ex.total_questions} Questions</h4>
                                                    </div>
                                                    <div class="col-lg-4 col-sm-4 col-md-4 text-center">
                                                        <img src="{{url('images/timer.webp')}}" width="50" height="50" alt="" class="img-fluid">
                                                        <h3 class="fs-6 text-white pt-2">${ex.total_duration} Minutes</h3>
                                                    </div>
                                                    <div class="col-lg-4 col-sm-4 col-md-4 text-center">
                                                        <img src="{{url('images/practice_brain_icon.webp')}}" width="50" height="50" class="img-fluid" alt="">
                                                        <h3 class="fs-6 text-white pt-2">${ex.total_marks} Marks</h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </a></div>`;
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
            error: function(data, textStatus, errorThrown) {
                console.log(data);
            },
        });
    </script>

</body>

</html>
