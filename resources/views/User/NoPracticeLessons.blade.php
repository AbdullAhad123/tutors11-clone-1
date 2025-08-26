<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>{{$section['name']}} - Learn & Practise - Student Portal - Tutors 11 Plus</title>
    <link rel="shortcut icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}" type="image/x-icon">

    <meta name="description" content="" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{ url('Frontend_css/assets/vendor/fonts/boxicons.css') }}" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"
        integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <style>
        .point {
            cursor: pointer;
        }

        .font-size-13 {
            font-size: 13px;
        }
        /* .total_session_details {
            background: #dbeaff;
            color: #00409b;
        } */

        .lesson_card_item {
            height: 100%;
            width: 100%;
            background: #005ac3;
            position: relative;
            overflow: hidden;
        }
        
        .lesson_card_image {
            height: 55px;
            width: 55px;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #ffffff30
        }

        .top_circle_shade {
            height: 150px;
            width: 150px;
            background: #ffffff1a;
            position: absolute;
            top: -45px;
            right: -70px;
        }

        .bottom_circle_shade {
            height: 150px;
            width: 150px;
            background: #ffffff1a;
            position: absolute;
            bottom: -45px;
            left: -70px;
        }
    </style>
</head>

<body>

    @include('sidebar')
    @include('header')

    <section>
        <div class="mb-4">
            <h1 class="my-2 mx-auto fw-bold mb-0 text-dark">Learning Lessons</h1>
        </div>
        <div class="row" id="practice_box_layout"></div>
        
        <div id="practice_more" class="text-center my-4"></div>
    </section>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/spectrum/1.7.1/spectrum.min.js"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/0.6.7/js/min/perfect-scrollbar.jquery.min.js">
        </script>

    <script>
        let categorySlug = {!! str_replace("'", "\'", json_encode($category['slug']))!!};
        let sectionSlug = {!! str_replace("'", "\'", json_encode($section['slug']))!!};
        let skillSlug = {!! str_replace("'", "\'", json_encode($skill['slug']))!!};
        fetchPracticeSets('/fetch-practice-lessons/' + categorySlug + '/' + sectionSlug + '/' + skillSlug);
        function fetchPracticeSets(reqUrl) {
            $.ajax({
                dataType: 'json',
                type: "GET",
                url: reqUrl,
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function (data) {
                    let lessons = data.lessons;
                    let pagination = data.pagination;
                    if (pagination.total > 0) {
                        $("#total_lessons").text(pagination.total);
                        lessons.forEach(function (lesson, i) {
                            // let tab = `<div class="col-12 pb-3 mx-auto ">
                                          
                            //                     <a href="/lessons/`+ categorySlug + `/` + sectionSlug + `/` + skillSlug + `/read?start=` + i + `&page=` + pagination.current_page + `" class="bg-white rounded py-3 px-4 d-flex justify-content-between shadow-sm">
                            //                         <div class="text-secondary-emphasis fs-5"> `+ lesson.title + ` </div>
                            //                         <div class="font-size-13 bg-body-secondary p-1 rounded ms-2 text-secondary-emphasis"> 
                            //                             <svg style="height: 15px;width: 15px;" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" viewBox="0 0 24 24" fill="currentColor" class="w-3 h-3 ltr:mr-1 rtl:ml-1"><g><rect fill="none" height="24" width="24"></rect></g><g><g><g><path d="M15,1H9v2h6V1z M11,14h2V8h-2V14z M19.03,7.39l1.42-1.42c-0.43-0.51-0.9-0.99-1.41-1.41l-1.42,1.42 C16.07,4.74,14.12,4,12,4c-4.97,0-9,4.03-9,9s4.02,9,9,9s9-4.03,9-9C21,10.88,20.26,8.93,19.03,7.39z M12,20c-3.87,0-7-3.13-7-7 s3.13-7,7-7s7,3.13,7,7S15.87,20,12,20z"></path></g></g></g></svg>
                            //                             `+ lesson.read_time + ` Min Read
                            //                         </div>
                            //                     </a>
                                            
                            //             </div>`;

                            let tab=`   <div class="col-lg-4 col-md-6 col-sm-12 col-12 my-2">
                                            <a href="/lessons/`+ categorySlug + `/` + sectionSlug + `/` + skillSlug + `/read?start=` + i + `&page=` + pagination.current_page + `" class="text-decoration-none h-100 w-100">
                                                <div class="lesson_card_item rounded-5 p-3 py-4">
                                                    <div class="top_circle_shade rounded-circle"></div>
                                                    <div class="bottom_circle_shade rounded-circle"></div>
                                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                                        <div class="lesson_card_image p-2 rounded-3">
                                                            <img src="{{url('images/learning_lesson_cap.png')}}" height='35' width='35' alt="learning lesson">
                                                        </div>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill='var(--portal-white)'><path d="m11.293 17.293 1.414 1.414L19.414 12l-6.707-6.707-1.414 1.414L15.586 11H6v2h9.586z"></path></svg>
                                                    </div>
                                                    <div class="to_do_card_details">
                                                        <p class="text-white d-flex align-items-center my-2"><i class="bx bx-time me-1 text-white"></i>`+ lesson.read_time + ` min read</p>
                                                        <h2 class="fs-3 text-start my-2 text-white fw-light">`+ lesson.title + `</h2>
                                                        <h2 class="fs-5 text-start mt-5 text-white fw-light">Lessons</h2>
                                                    </div>
                                                </div>                    
                                            </a>
                                        </div>`
                            
                            $("#practice_box_layout").append(tab);
                        });
                    } else {
                        $("#practice_box_layout").append('<div class="bg-white px-3 py-5 text-center fs-5 rounded shadow-sm mt-2 text-danger"><img src="{{url("images/\lesson.png")}}" height="75" width="75" alt="tutors lessons" /><h4 class="text-center text-dark mt-3">No Lessons Found!</h4></div>');
                    }
                    $("#practice_more").empty();
                    if (pagination.links.next) {
                        $("#practice_more").append('<button id="loadMoreBtn" class="btn btn-primary" data-url="' + pagination.links.next + '">Load More</button>');
                    }
                },
                error: function (data, textStatus, errorThrown) {
                    console.log(textStatus);
                },
            });
        }
        $(document).on('click', '#loadMoreBtn', function () {
            let url = $(this).data('url');
            fetchPracticeSets(url);
        }); 
    </script>
</body>

</html>