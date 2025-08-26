<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>{{$section['name']}} - Learn & Practise - Student Portal - Tutors 11 Plus</title>
    <link rel="shortcut icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}" type="image/x-icon">

    <meta name="description" content="" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <style>
        .point {
            cursor: pointer;
        }

        .font-size-13 {
            font-size: 13px;
        }
        .video-card {
            border-radius: 8px;
            padding: 10px;
            display: flex;
            align-items: center;
        }

        .video_thumbnail {
            position: relative;
            width: 150px;
            height: 100px;
            overflow: hidden;
            border-radius: 4px;
        }

        .video_thumbnail img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .video_duration {
            position: absolute;
            bottom: 5px;
            right: 5px;
            background-color: rgba(0, 0, 0, 0.7);
            padding: 2px 5px;
            border-radius: 4px;
            color: #fff;
            font-size: 12px;
        }

        .video-info {
            margin-left: 15px;
        }

        .video-title {
            color: #000!important;
            margin: 0;
            font-size: 18px;
        }

        .video-metadata {
            margin: 5px 0;
            font-size: 14px;
            color: #777;
        }
        .level_bars{
            height:5px;
            --bs-gutter-x: 0 !important;
        }
        .VERYHIGH{background-color:#ffc3b9;}
        .HIGH{background-color:#ffe4ab;}
        .MEDIUM{background-color:#b1b1ff;}
        .EASY{background-color:#a3ecff;}
        .VERYEASY{background-color:#bfff9f;}
    </style>
</head>

<body>
    @include('sidebar')
    @include('header')

    <div class="px-2 pb-4">
        <h1 class="my-2 mx-auto fw-bold mb-4 text-dark">Learning Videos</h1>
        <div class="row justify-content-start align-items-center" id="practice_box_layout"></div>
        <div id="practice_more" class="text-center my-4"></div>
    </div>

    
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
        fetchPracticeSets('/fetch-practice-videos/' + categorySlug + '/' + sectionSlug + '/' + skillSlug);
        function fetchPracticeSets(reqUrl) {
            $.ajax({
                dataType: 'json',
                type: "GET",
                url: reqUrl,
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function (data) {
                    let videos = data.videos;
                    let pagination = data.pagination;
                    if (pagination.total > 0) {
                        videos.forEach(function (video, i) {
                            var thumbnail = "";
                            var level = "";
                            if(video.type == "youtube"){
                                thumbnail = '<img class="img-fluid rounded-3" src="http://img.youtube.com/vi/' + video.link + '/hqdefault.jpg" title="' + video.title + '" alt="' + video.title + '" />';
                            } else if(video.type == "vimeo"){
                                thumbnail = '<img class="img-fluid rounded-3" src="https://vumbnail.com/' + video.link + '.jpg" title="' + video.title + '" alt="' + video.title + '" />';
                            }
                            switch(video.difficulty) {
                                case 'VERYHIGH':
                                    level = `<div class="col-2 p-0 pe-1"><div class="VERYHIGH rounded h-100"></div></div>
                                            <div class="col-2 p-0 pe-1"><div class="VERYHIGH rounded h-100"></div></div>
                                            <div class="col-2 p-0 pe-1"><div class="VERYHIGH rounded h-100"></div></div>
                                            <div class="col-2 p-0 pe-1"><div class="VERYHIGH rounded h-100"></div></div>
                                            <div class="col-2 p-0 pe-1"><div class="VERYHIGH rounded h-100"></div></div>`;
                                    break;
                                case 'HIGH':
                                    level = `<div class="col-2 p-0 pe-1"><div class="HIGH rounded h-100"></div></div>
                                            <div class="col-2 p-0 pe-1"><div class="HIGH rounded h-100"></div></div>
                                            <div class="col-2 p-0 pe-1"><div class="HIGH rounded h-100"></div></div>
                                            <div class="col-2 p-0 pe-1"><div class="HIGH rounded h-100"></div></div>
                                            <div class="col-2 p-0 pe-1"><div class="bg-body-secondary rounded h-100"></div></div>`;
                                    break;
                                case 'MEDIUM':
                                    level = `<div class="col-2 p-0 pe-1"><div class="MEDIUM rounded h-100"></div></div>
                                            <div class="col-2 p-0 pe-1"><div class="MEDIUM rounded h-100"></div></div>
                                            <div class="col-2 p-0 pe-1"><div class="MEDIUM rounded h-100"></div></div>
                                            <div class="col-2 p-0 pe-1"><div class="bg-body-secondary rounded h-100"></div></div>
                                            <div class="col-2 p-0 pe-1"><div class="bg-body-secondary rounded h-100"></div></div>`;
                                    break;
                                case 'EASY':
                                    level = `<div class="col-2 p-0 pe-1"><div class="EASY rounded h-100"></div></div>
                                            <div class="col-2 p-0 pe-1"><div class="EASY rounded h-100"></div></div>
                                            <div class="col-2 p-0 pe-1"><div class="bg-body-secondary rounded h-100"></div></div>
                                            <div class="col-2 p-0 pe-1"><div class="bg-body-secondary rounded h-100"></div></div>
                                            <div class="col-2 p-0 pe-1"><div class="bg-body-secondary rounded h-100"></div></div>`;
                                    break;
                                default:
                                    level = `<div class="col-2 p-0 pe-1"><div class="VERYEASY rounded h-100"></div></div>
                                            <div class="col-2 p-0 pe-1"><div class="bg-body-secondary rounded h-100"></div></div>
                                            <div class="col-2 p-0 pe-1"><div class="bg-body-secondary rounded h-100"></div></div>
                                            <div class="col-2 p-0 pe-1"><div class="bg-body-secondary rounded h-100"></div></div>
                                            <div class="col-2 p-0 pe-1"><div class="bg-body-secondary rounded h-100"></div></div>`;
                            }
                            let tab = `<div class="col-lg-4 col-md-6 col-sm-6 col-12 my-2">
                                <a href="/watch/`+ categorySlug + `/` + sectionSlug + `/` + skillSlug + `/watch?start=` + i + `&page=` + pagination.current_page + `" class="text-decoration-none">
                                    <div class="video-card shadow-sm bg-white">
                                        <div class="video_thumbnail">
                                            `+thumbnail+`
                                            <span class="video_duration">`+ video.watch_time + ` Min</span>
                                        </div>
                                        <div class="video-info">
                                            <h3 class="video-title">`+ video.title + `</h3>
                                            <p class="video-metadata text-dark">
                                                <div class="row my-2 level_bars">`+level+`</div>
                                                <div class="small">• Uploaded: `+ video.created_at + `</div>
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </div>`;
                            $("#practice_box_layout").append(tab);
                            if (video.type == 'youtube') {
                                $("#" + video.code).append('<img class="img-fluid rounded-3" src="http://img.youtube.com/vi/' + video.link + '/hqdefault.jpg" title="' + video.title + '" alt="' + video.title + '" />')
                            } else {
                                $("#" + video.code).append('<img class="img-fluid rounded-3" src="https://vumbnail.com/' + video.link + '.jpg" title="' + video.title + '" alt="' + video.title + '" />')
                            }
                        });
                    } else {
                        $("#practice_box_layout").append('<div class="bg-white px-3 py-5 text-center fs-5 rounded shadow-sm mt-2 text-danger"><img src="{{url("images/video_lessons.png")}}" height="75" width="75" alt="tutors lessons" /><h4 class="text-center text-dark mt-3">No Videos Found!</h4></div>');
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