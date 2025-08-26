<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>{{$section['name']}} - Learn & Practise - Student Portal - Tutors 11 Plus</title>
    <link rel="shortcut icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}" type="image/x-icon">
    <style>
        .point {
            cursor: pointer;
        }

        .font-size-13 {
            font-size: 13px;
        } 

        .to_do_list_card {
            height: 100px;
            width: auto;
            background: #fff;
            transition: 0.3s;
        }

        .to_do_list_card:hover {
            scale: 1.01;
            box-shadow: -1px 6px 10px 1px #4a4a4a4a!important;
        }

        .to_do_list_name{
            width: 300px;
            white-space: nowrap;
            text-overflow: ellipsis;
            overflow: hidden;
        }

        /* media queries for managing text content  */

        @media (max-width: 1200px) {
            .to_do_list_name {
                width: 270px;
            }
        }
        @media (max-width: 900px) {
            .to_do_list_name {
                width: 215px;
            }
        }
        @media (max-width: 768px) {
            .to_do_list_name {
                width: 300px;
            }
        }
        @media (max-width: 425px) {
            .to_do_list_name {
                width: 250px;
            }
        }

        @media (max-width: 375px) {
            .to_do_list_iconparent {
                display: none;
            }
            .to_do_list_name {
                width: 225px;
            }
        }
        @media (max-width: 350px) {
            .to_do_list_name {
                width: 200px!important;
            }
        }
        @media (max-width: 320px) {
            .to_do_list_name {
                width: 180px!important;
                font-size: 7vw!important;
            }

        }

        .lesson_card_item {
            height: 100%;
            width: 100%;
            background: #005b9b;
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

    <div class="py-3 px-2">
        <h1 class="my-2 mx-auto fw-bold mb-4 text-dark">Your Question Sets</h1>
        <div class="row m-0" id="practice_box_layout"></div>
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
        fetchPracticeSets('/fetch-practice-sets/' + categorySlug + '/' + sectionSlug + '/' + skillSlug);
        function fetchPracticeSets(reqUrl) {
            $.ajax({
                dataType: 'json',
                type: "GET",
                url: reqUrl,
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function (data) {
                    let sets = data.sets.data;
                    let pagination = data.sets.meta.pagination;
                    if (pagination.total > 0) {
                        sets.forEach(function (set) {
                            // let tab = `<div class="col-lg-6 col-md-6 col-sm-12 col-12 my-2">
                            //     <a href="/practice/`+ set.slug + `/init" class="text-decoration-none">
                            //         <div class="to_do_list_card p-lg-3 p-2 rounded-3">
                            //             <div class="d-flex align-items-center h-100">
                            //                 <div class="me-3">
                            //                     <img src="{{url('images/\practice_sets_image.png')}}" height="40" width="40" alt="">
                            //                 </div>
                            //                 <div class="col-lg-10 col-md-8 col-10">
                            //                     <div class="d-flex justify-content-between align-items-center">
                            //                         <div style="flex-basis: 80%">
                            //                             <h4 class="to_do_list_name fw-normal text-dark mb-1">
                            //                                 `+ set.title + `
                            //                             </h4>
                            //                             <span class="fs-6 text-dark fw-light">
                            //                                 `+ set.total_questions + ` Practice Questions
                            //                             </span>
                            //                         </div>
                            //                         <div class="text-end to_do_list_iconparent" style="flex-basis: 20%">
                            //                             <span class="fs-5">
                            //                                 <svg class="to_do_list_icon" xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                            //                                     viewBox="0 0 24 24" style="fill: #003c74 ">
                            //                                     <path
                            //                                         d="m11.293 17.293 1.414 1.414L19.414 12l-6.707-6.707-1.414 1.414L15.586 11H6v2h9.586z">
                            //                                     </path>
                            //                                 </svg>
                            //                             </span>
                            //                         </div>
                            //                     </div>
                            //                 </div>
                            //             </div>
                            //         </div>
                            //     </a>
                            // </div>`;

                            let tab=`   <div class="col-lg-4 col-md-6 col-sm-12 col-12 my-2">
                                            <a href="/practice/`+ set.slug + `/init" class="text-decoration-none h-100 w-100">
                                                <div class="lesson_card_item rounded-5   p-3 py-4">
                                                    <div class="top_circle_shade rounded-circle"></div>
                                                    <div class="bottom_circle_shade rounded-circle"></div>
                                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                                        <div class="lesson_card_image p-2 rounded-3">
                                                            <img src="{{url('images/practice_sets_icon.png')}}" height='35' width='35' alt="Practise sets" style='filter: invert(1)'>
                                                        </div>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill='var(--portal-white)'><path d="m11.293 17.293 1.414 1.414L19.414 12l-6.707-6.707-1.414 1.414L15.586 11H6v2h9.586z"></path></svg>
                                                    </div>
                                                    <div class="to_do_card_details">
                                                        <p class="text-white my-2">`+ set.total_questions + ` Questions</p>
                                                        <h2 class="fs-3 text-start my-2 text-white fw-light">`+ set.title + `</h2>
                                                        <h2 class="fs-5 text-start mt-5 text-white fw-light">Question Sets</h2>
                                                    </div>
                                                </div>                    
                                            </a>
                                        </div>`


                            $("#practice_box_layout").append(tab);
                        });
                    } else {
                        $("#practice_box_layout").append('<div class="bg-white px-3 py-5 text-center fs-5 rounded shadow-sm mt-2 text-danger"><img src="{{url("images/\practice_sets_image.png")}}" height="75" width="75" alt="tutors lessons" /><h4 class="text-center text-dark mt-3">No Practises Found!</h4></div>');
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