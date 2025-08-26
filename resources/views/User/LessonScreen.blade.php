<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$skill['name']}} Lessons - Student Portal - Tutors 11 Plus</title>
    <link rel="shortcut icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <style>
        .sidenav {
            width: 300px;
            z-index: 1;
            background-color: #111;
            overflow-x: hidden;
            transition: 0.5s;
        }

        #main {
            transition: margin-left .5s;
            padding: 16px;
            margin-left: 300px;
        }

        .cursor-pointer {
            cursor: pointer;
        }

        .lesson_btn.active {
            border-bottom: 4px solid #28a745 !important;
        }

        @media screen and (max-width: 767px) {
            .sidenav {
                width: 0;
            }

            #main {
                margin-left: 0;
            }
        }

        @media screen and (min-width: 768px) {
            .sidenav {
                width: 300px !important;
            }
        }
    </style>
</head>

<body>
    <!-- side nav  -->
    <div id="mySidenav" class="sidenav py-0 h-100 position-fixed top-0 start-0">
        <div class="bg-light d-flex justify-content-between align-items-center position-sticky top-0 px-2 pt-3 pb-2">
            <div>
                <div>{{$skill['name']}} Lessons</div>
                <div class="fw-light" style="font-size: 13px;">{{$section['name']}}</div>
            </div>
            <a class="p-0 px-3 py-1 fs-4 text-body nav-link d-md-none" href="javascript:void(0)"
                onclick="closeNav()">&times;</a>
        </div>
        <nav class="p-2" style="min-height: 100%;">
            <div id="nav-tab" role="tablist"></div>
        </nav>
        <div class="bg-light position-sticky bottom-0 d-flex justify-content-between py-4 px-2">
            <div id="prev_page" class="move_page" data-url=""><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg" style="width:22px;">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M11 15l-3-3m0 0l3-3m-3 3h8M3 12a9 9 0 1118 0 9 9 0 01-18 0z"></path>
                </svg></div>
            <div>Page <span id="current_page"></span>/<span id="total_page"></span></div>
            <div id="next_page" class="move_page" data-url=""><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg" style="width:22px;">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg></div>
        </div>
    </div>
    <!-- main body  -->
    <div id="main" class="bg-light overflow-scroll p-0 position-relative vh-100">
        <div class="bg-white py-3 px-4 shadow-sm position-sticky w-100 top-0">
            <div class="d-flex m-auto justify-content-between" style="max-width: 900px;">
                <span class="d-block d-md-none" style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
                <h5 class="fw-normal mb-0 align-self-center px-2">Lesson <span id="active_lesson_num"></span>: <span
                        id="active_lesson_name"></span></h5>
                <a href="/lessons/{{$category['slug']}}/{{$section['slug']}}/{{$skill['slug']}}"
                    class="btn btn-outline-danger opacity-75 d-flex h-100"> <span class="me-1">Exit</span> <svg
                        fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                        style="width:22px;" class="h-100">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                        </path>
                    </svg></a>
            </div>
        </div>
        <div class="my-2 p-3 m-auto" style="min-height: 90%;max-width:900px;">
            <div class="tab-content bg-white" id="nav-tabContent"></div>
        </div>
        <div class="bg-white py-3 px-4 shadow-sm position-sticky w-100 bottom-0">
            <div class="d-flex m-auto justify-content-between" style="max-width: 900px;">
                <button id="prev" class="btn btn-light border border-secondary opacity-75 d-flex align-items-center">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                        style="width: 20px;" class="me-1">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Previous
                </button>
                <button id="next" class="btn btn-light border border-secondary opacity-75 d-flex align-items-center">
                    Next
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                        style="width: 20px;" class="ms-1">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>
    
    <script>
        function openNav() {
            document.getElementById("mySidenav").style.width = "300px";
            // document.getElementById("main").style.marginLeft = "300px";
        }
        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
            // document.getElementById("main").style.marginLeft= "0";
        }
        let urlParams = new URLSearchParams(window.location.search);
        let start = urlParams.get('start') ? urlParams.get('start').toString() : 0;
        let page = urlParams.get('page') ? urlParams.get('page').toString() : 1;
        let categorySlug = {!! str_replace("'", "\'", json_encode($category['slug']))!!};
        let sectionSlug = {!! str_replace("'", "\'", json_encode($section['slug']))!!};
        let skillSlug = {!! str_replace("'", "\'", json_encode($skill['slug']))!!};
        fetchPracticeLessons('/fetch-practice-lessons/' + categorySlug + '/' + sectionSlug + '/' + skillSlug + '?page=' + page + '&withBody=1', 'default');
        function fetchPracticeLessons(reqUrl, move_page) {
            $.ajax({
                type: "GET",
                url: reqUrl,
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function (data) {
                    if (data) {
                        let lessons = data.lessons;
                        let pagination = data.pagination;
                        $("#nav-tab").empty();
                        $("#nav-tabContent").empty();
                        lessons.forEach(function (lesson, i) {
                            let index = ++i;
                            i = --i;
                            let button = `<button class="d-flex align-items-center mb-3 w-100 bg-light border-0 rounded-1 py-2 lesson_btn" data-page="` + pagination.current_page + `" id="lesson-tab-` + page + i + `" data-bs-toggle="tab" data-bs-target="#lesson-` + page + i + `" type="button" role="tab" aria-controls="lesson-` + page + i + `" aria-selected="false">
                                                <div id="serial-`+ page + i + `" class="badge me-2 fw-normal" style="background-color: #333;">` + index + `</div>
                                                <div>
                                                    <div class="lesson_title">`+ lesson.title + `</div>
                                                    <div class="align-items-center d-flex fw-light lh-sm text-start" style="font-size: 13px;"> 
                                                        <svg style="width: 12px;" class="me-1" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" viewBox="0 0 24 24" fill="currentColor"><g><rect fill="none" height="24" width="24"></rect></g><g><g><g><path d="M15,1H9v2h6V1z M11,14h2V8h-2V14z M19.03,7.39l1.42-1.42c-0.43-0.51-0.9-0.99-1.41-1.41l-1.42,1.42 C16.07,4.74,14.12,4,12,4c-4.97,0-9,4.03-9,9s4.02,9,9,9s9-4.03,9-9C21,10.88,20.26,8.93,19.03,7.39z M12,20c-3.87,0-7-3.13-7-7 s3.13-7,7-7s7,3.13,7,7S15.87,20,12,20z"></path></g></g></g></svg>    
                                                        `+ lesson.read_time + ` Min Read
                                                    </div>
                                                </div>
                                            </button>`;
                            let tab = `<div class="bg-white shadow-sm rounded py-4 px-5 tab-pane fade lesson_tab" id="lesson-` + page + i + `" role="tabpanel" aria-labelledby="lesson-tab-` + page + i + `">
                                            <h5>`+ lesson.title + `:</h5>
                                            `+ lesson.body + `
                                        </div>`;
                            $("#nav-tab").append(button);
                            $("#nav-tabContent").append(tab);
                            if (i == start) {

                                $("#lesson-tab-" + page + i).addClass("active").attr("aria-selected", "true");
                                $("#lesson-" + page + i).addClass("show active");
                                $("#active_lesson_name").text(lesson.title);
                                if (pagination.current_page > 1) {
                                    let test = pagination.current_page.toString() + 0;
                                    $("#active_lesson_num").text(parseInt(test) - 10 + index);
                                } else {
                                    $("#active_lesson_num").text(index);
                                }
                            }
                            if (pagination.current_page > 1) {
                                $("#serial-" + page + i).text(pagination.current_page * pagination.per_page - 10 + (i + 1));
                            }
                        });
                        $("#current_page").text(pagination.current_page);
                        $("#total_page").text(pagination.total_pages);
                        // prev_page next_page
                        if (pagination.links.previous) {
                            $("#prev_page").addClass("cursor-pointer").attr("data-url", pagination.links.previous);
                        } else {
                            $("#prev_page").removeClass("cursor-pointer").attr("data-url", "");
                        }
                        if (pagination.links.next) {
                            $("#next_page").addClass("cursor-pointer").attr("data-url", pagination.links.next);
                        } else {
                            $("#next_page").removeClass("cursor-pointer").attr("data-url", "");
                        }
                    }
                },
                error: function (data, textStatus, errorThrown) {
                    console.log(textStatus);
                },
            });
        }
        $(document).on('click', '#next', function () {
            let hasNext = $(".lesson_btn.active").next().length;
            if (hasNext > 0) {
                $(".lesson_btn.active").removeClass("active").next().addClass("active");
                $(".lesson_tab.active").removeClass("active show").next().addClass("active show");
                $("#active_lesson_num").text(parseInt($("#active_lesson_num").text()) + 1);
                let lesson_title = $(".lesson_btn.active").find(".lesson_title").text();
                $("#active_lesson_name").text(lesson_title);
            }
        });
        $(document).on('click', '#prev', function () {
            let hasPrev = $(".lesson_btn.active").prev().length;
            if (hasPrev > 0) {
                $(".lesson_btn.active").removeClass("active").prev().addClass("active");
                $(".lesson_tab.active").removeClass("active show").prev().addClass("active show");
                $("#active_lesson_num").text(parseInt($("#active_lesson_num").text()) - 1);
                let lesson_title = $(".lesson_btn.active").find(".lesson_title").text();
                $("#active_lesson_name").text(lesson_title);
            }
        });
        $(".move_page").click(function () {
            let url = $(this).attr("data-url");
            if (url && url != "") {
                fetchPracticeLessons(url + '&withBody=1', 'move_page');
            }
        });
        $(document).on('click', '.lesson_btn', function () {
            $("#active_lesson_num").text($(this).find(".badge").text());
            $("#active_lesson_name").text($(this).find(".lesson_title").text());
        });

    </script>
</body>

</html>