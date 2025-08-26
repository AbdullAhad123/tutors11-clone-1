<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Import Questions - Question Bank - 
    @if(Auth::user()->hasRole('instructor'))
        Instructor Portal
    @elseif(Auth::user()->hasRole('admin'))
        Admin Portal
    @endif
    </title>
    <!-- rel icon -->
    <link rel="icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}">
    <meta name="description" content="{{ app(\App\Settings\SiteSettings::class)->seo_description }}">
    <meta name="author" content="{{ app(\App\Settings\SiteSettings::class)->app_name }}">
    <style>
        #searchType,
        #searchSection,
        #searchSkill,
        #searchTopic,
        #searchStatus {
            min-width: 150px;
        }
        .active_child {
            color: #696cff;
        }

        .row_bg_light {
            background-color: #f1f1f1 !important;
        }

        .placeholder_text::placeholder {
            color: #a4a4a4;
            font-size: 0.9rem;
        }

        @media (max-width: 430px) {
            .row>* {
                text-align: start !important;
            }
        }

        .position_absolute {
            bottom: 15px;
            right: 30px;
        }

        .copy_clip_message {
            width: 270px;
            display: none;
        }
        .code_widthy_width {
            display: block;
            width: 120px!important;
            margin: auto;
        }
        #skill_Dropdown {
            max-height: 270px;
        }
        .download_file_hover:hover{
            background-color: #28a7452b;
            transition: 0.3s ease;
        }
    </style>
</head>

<body>
    @include('sidebar')
    @include('header')

    <div class="container-xxl flex-grow-1 container-p-y">

        @if (Session::has('errorMessage'))
        <div class="alert alert-danger mt-3">
        <svg fill="#ff3e1d" height="30px" width="30px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
            viewBox="0 0 52 52" xml:space="preserve">
            <g>
                <path d="M26,0C11.664,0,0,11.663,0,26s11.664,26,26,26s26-11.663,26-26S40.336,0,26,0z M26,50C12.767,50,2,39.233,2,26
                    S12.767,2,26,2s24,10.767,24,24S39.233,50,26,50z"/>
                <path d="M35.707,16.293c-0.391-0.391-1.023-0.391-1.414,0L26,24.586l-8.293-8.293c-0.391-0.391-1.023-0.391-1.414,0
                    s-0.391,1.023,0,1.414L24.586,26l-8.293,8.293c-0.391,0.391-0.391,1.023,0,1.414C16.488,35.902,16.744,36,17,36
                    s0.512-0.098,0.707-0.293L26,27.414l8.293,8.293C34.488,35.902,34.744,36,35,36s0.512-0.098,0.707-0.293
                    c0.391-0.391,0.391-1.023,0-1.414L27.414,26l8.293-8.293C36.098,17.316,36.098,16.684,35.707,16.293z"/>
            </g>
        </svg>
        {{Session::get('errorMessage')}}
        </div>
        @endif

        <div class="d-flex justify-content-between align-items-center py-3 mb-4">
        <span>
            <h5 class="text-dark m-0">Import Questions</h5>
        </span>
        </div>

        <div
        class="row col-lg-7 col-md-8 col-sm-10 col-12 m-0 mx-auto bg-white p-2 shadow allow_user_to_select">
        <div class="col-12 py-3 px-4 my-2">
            <div class="mt-3 mb-1 text-end ">
                <a href="/assets/sample.xlsx" class="text-dark">
                    <span class="p-3 download_file_hover cursor-pointer text-center rounded-3">
                        <span class="me-2">
                            <svg height="27" viewBox="0 0 48 54.2" width="24"
                                xmlns="http://www.w3.org/2000/svg">
                                <g id="xlsx" transform="translate(-24.36 5)">
                                    <path
                                        d="M76.323,19.387h-1.3v-6.28a1.041,1.041,0,0,0-.011-.119,1.043,1.043,0,0,0-.253-.688L64.307.363S64.3.359,64.3.356a1.046,1.046,0,0,0-.212-.178c-.023-.015-.046-.028-.069-.041a1.116,1.116,0,0,0-.21-.088c-.02-.005-.037-.013-.057-.018A1.056,1.056,0,0,0,63.507,0H37.825A2.128,2.128,0,0,0,35.7,2.126V19.387H34.4a3.038,3.038,0,0,0-3.038,3.038v15.8A3.039,3.039,0,0,0,34.4,41.26h1.3V52.075A2.127,2.127,0,0,0,37.825,54.2H72.9a2.128,2.128,0,0,0,2.125-2.125V41.26h1.3a3.038,3.038,0,0,0,3.038-3.038v-15.8A3.037,3.037,0,0,0,76.323,19.387ZM37.825,2.126h24.62V13a1.063,1.063,0,0,0,1.063,1.063H72.9v5.324H37.825Zm21.532,28.98c-2.088-.727-3.451-1.883-3.451-3.711,0-2.145,1.79-3.786,4.756-3.786a7.693,7.693,0,0,1,3.207.634l-.634,2.293a5.982,5.982,0,0,0-2.629-.6c-1.231,0-1.828.56-1.828,1.213,0,.8.709,1.156,2.331,1.772,2.219.821,3.263,1.977,3.263,3.749,0,2.108-1.623,3.9-5.073,3.9a8.217,8.217,0,0,1-3.562-.765l.578-2.35a7.261,7.261,0,0,0,3.152.784c1.307,0,2-.541,2-1.362C61.464,32.094,60.867,31.646,59.357,31.105ZM54.547,34v2.388H46.694V23.812h2.855V34ZM37.576,36.384H34.331l3.637-6.361-3.507-6.211h3.264l1.1,2.294c.373.765.653,1.379.952,2.089h.036c.3-.8.541-1.362.858-2.089l1.063-2.294h3.245l-3.544,6.135,3.731,6.436H41.883l-1.138-2.276c-.465-.875-.764-1.529-1.119-2.256h-.037c-.261.727-.578,1.381-.97,2.256ZM72.9,51.5H37.825V41.26H72.9V51.5Zm.019-15.116-1.138-2.276c-.466-.876-.764-1.529-1.119-2.256h-.036c-.262.728-.579,1.38-.971,2.256l-1.043,2.276H65.361L69,30.022l-3.506-6.211h3.264l1.1,2.294c.373.765.652,1.379.951,2.089h.037c.3-.8.54-1.362.857-2.089l1.063-2.294h3.246l-3.544,6.135,3.73,6.436H72.915Z"
                                        data-name="main" fill="#1d6f42" id="main" transform="translate(-7 -5)">
                                    </path>
                                </g>
                            </svg>
                        </span>
                        <span class="text_black font_bold">Download Sample Excel</span>
                    </span>
                </a>
            </div>
            <hr>

            <form class="my-4" id="form" action="" enctype="multipart/form-data" method="">
                @csrf
                <span class="text_black font_bold">Choose Topic</span>
                <div class="form-group my-4 dropdown">
                    <input id="skill_id" type="hidden" name="skill_id">
                    <input id="skill_Inp" type="text" class="form-control dropdown-toggle" data-id="" data-trigger="0" data-bs-toggle="dropdown" aria-expanded="true" placeholder="Search Topic">
                    <ul id="skill_Dropdown" class="dropdown-menu w-100 p-0 overflow-auto">
                        <li class="dropdown-item text-center text-light" id="start_search">
                            Start typing to search.
                        </li>
                    </ul>
                </div>
                <div class="form-group mt-4">
                    <input type="file" id="questionFile"
                        name="file"
                        accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"
                        class="form-control shadow-none  bg-light font_normal_bold text_black"
                        placeholder="Choose File">
                </div>
                <div class="form-group-control mt-4 text-end">
                    <button type="submit" class="btn bg-primary text-white">UPLOAD FILE</button>
                </div>
            </form>
            <hr>

            <div class="my-3">
                <span class="text_black font_bold">Question Types</span>
                <div class="table-responsive my-4">
                    <table class="table mt-3">
                        <thead>
                            <th scope="col" class="text-center">NAME</th>
                            <th scope="col" class="text-center">ACCEPTABLE CODE</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Multiple Choice Single Answer</td>
                                <td>
                                    <div class="text-center">
                                        <span
                                            class="bg-primary text-center text-white p-1 code_widthy_width cursor-pointer copy_clip_code"
                                            data-name="MSA">
                                            <i class="bx bx-copy-alt me-2"></i>
                                            MSA
                                        </span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Multiple Choice Multiple Answers</td>
                                <td>
                                    <div class="text-center">
                                        <span
                                            class="bg-primary text-center text-white p-1 code_widthy_width cursor-pointer copy_clip_code"
                                            data-name="MMA">
                                            <i class="bx bx-copy-alt me-2"></i>
                                            MMA
                                        </span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>True or False</td>
                                <td>
                                    <div class="text-center">
                                        <span
                                            class="bg-primary text-center text-white p-1 code_widthy_width cursor-pointer copy_clip_code"
                                            data-name="TOF">
                                            <i class="bx bx-copy-alt me-2"></i>
                                            TOF
                                        </span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Short Answer</td>
                                <td>
                                    <div class="text-center">
                                        <span
                                            class="bg-primary text-center text-white p-1 code_widthy_width cursor-pointer copy_clip_code"
                                            data-name="SAQ">
                                            <i class="bx bx-copy-alt me-2"></i>
                                            SAQ
                                        </span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Match the Following</td>
                                <td>
                                    <div class="text-center">
                                        <span
                                            class="bg-primary text-center text-white p-1 code_widthy_width cursor-pointer copy_clip_code"
                                            data-name="MTF">
                                            <i class="bx bx-copy-alt me-2"></i>
                                            MTF
                                        </span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Ordering/Sequence</td>
                                <td>
                                    <div class="text-center">
                                        <span
                                            class="bg-primary text-center text-white p-1 code_widthy_width cursor-pointer copy_clip_code"
                                            data-name="MSA">
                                            <i class="bx bx-copy-alt me-2"></i>
                                            MSA
                                        </span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Fill in the Blanks</td>
                                <td>
                                    <div class="text-center">
                                        <span
                                            class="bg-primary text-center text-white p-1 code_widthy_width cursor-pointer copy_clip_code"
                                            data-name="FIB">
                                            <i class="bx bx-copy-alt me-2"></i>
                                            FIB
                                        </span>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="my-3">
                <span class="text_black font_bold">Difficulty Levels</span>
                <div class="table-responsive my-4">
                    <table class="table mt-3">
                        <thead>
                            <th scope="col" class="text-center">NAME</th>
                            <th scope="col" class="text-center">ACCEPTABLE CODE</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Very Easy</td>
                                <td>
                                    <div class="text-center">
                                        <span
                                            class="bg-primary text-center text-white p-1 code_widthy_width cursor-pointer copy_clip_code"
                                            data-name="VERYEASY">
                                            <i class="bx bx-copy-alt me-2"></i>
                                            VERYEASY
                                        </span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Easy</td>
                                <td>
                                    <div class="text-center">
                                        <span
                                            class="bg-primary text-center text-white p-1 code_widthy_width cursor-pointer copy_clip_code"
                                            data-name="EASY">
                                            <i class="bx bx-copy-alt me-2"></i>
                                            EASY
                                        </span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Medium</td>
                                <td>
                                    <div class="text-center">
                                        <span
                                            class="bg-primary text-center text-white p-1 code_widthy_width cursor-pointer copy_clip_code"
                                            data-name="MEDIUM">
                                            <i class="bx bx-copy-alt me-2"></i>
                                            MEDIUM
                                        </span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>High</td>
                                <td>
                                    <div class="text-center">
                                        <span
                                            class="bg-primary text-center text-white p-1 code_widthy_width cursor-pointer copy_clip_code"
                                            data-name="HIGH">
                                            <i class="bx bx-copy-alt me-2"></i>
                                            HIGH
                                        </span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Very High</td>
                                <td>
                                    <div class="text-center">
                                        <span
                                            class="bg-primary text-center text-white p-1 code_widthy_width cursor-pointer copy_clip_code"
                                            data-name="VERYHIGH">
                                            <i class="bx bx-copy-alt me-2"></i>
                                            VERYHIGH
                                        </span>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </div>

        <div class="position-absolute position_absolute  shadow p-3 bg-light copy_clip_message">
            <div class="">
                <div class="toast-header py-0">
                    <img src="{{url('profile-photos\title_logo.png')}}" width="20px" height="auto"
                        class="rounded me-2" alt="t11 logo">
                    <strong class="me-auto">Message</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <hr>
                <div class="toast-body px-2 py-0">
                    Your Text has been Copied
                </div>
            </div>
        </div>

    </div>

    @include('parentsidebar.sidebarending')

    <script>
        $(document).ready(function () {
            // on keyup search 
            $(document).on("keyup","#skill_Inp", function(e){
                $("#skill_Dropdown").empty();
                var search_query = $(this).val();
                if(search_query.length > 0) {
                    $.ajax({
                        type: "GET",
                        url: '/admin/search_skills',
                        data: {
                            query: search_query,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(data) {
                            let arrLength = data['skills'].length;
                            if(arrLength > 0) {
                                data['skills'].forEach(function(skill){
                                    $("#skill_Dropdown").append('<li class="dropdown-item cursor-pointer py-1 px-3 select_skill" data-id="'+skill.id+'">'+skill.name+'</li>');
                                });
                            } else {
                                $("#skill_Dropdown").append('<li class="dropdown-item text-danger text-center">No Result Found</li>');
                            }

                        },
                        error: function(data, textStatus, errorThrown) {
                            console.log(textStatus);
                            console.log(data);
                        },
                    });
                } else {
                    $("#form").attr('action', '');
                    $("#form").attr('method', '');
                    $("#skill_id").val("");
                    $("#skill_Inp").attr("data-id","");
                    $("#skill_Dropdown").append('<li class="dropdown-item text-center text-light" id="start_search">Start typing to search.</li>');
                }
            });
            // on change seacrh 
            $(document).on("click",".select_skill", function(e){
                let selectedSkill = $(this).text().trim();
                let selectedSkillId = $(this).data("id");
                $("#form").attr('action', '/admin/import-questions/'+selectedSkillId);
                $("#form").attr('method', 'POST');
                $("#skill_id").val(selectedSkillId);
                $("#skill_Inp").val(selectedSkill);
                $("#skill_Inp").attr("data-id",selectedSkillId);
            });
            // copy code 
            $(".copy_clip_code").click(function () {
                var text = $(this).text();
                var $temp = $("<input>");
                $("body").append($temp);
                $temp.val(text).select();
                document.execCommand("copy");
                $temp.remove();
                $(".copy_clip_message").slideDown()
            });
            // close btn 
            $(".btn-close").click(function () {
                $(".copy_clip_message").slideUp()
            })
            // ready ends 
        });
    </script>

</body>

</html>