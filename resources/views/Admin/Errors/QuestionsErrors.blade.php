<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Questions Errors - Admin Portal
    </title>
    <!-- rel icon -->
    <link rel="icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}">
    <meta name="description" content="{{ app(\App\Settings\SiteSettings::class)->seo_description }}">
    <meta name="author" content="{{ app(\App\Settings\SiteSettings::class)->app_name }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
    <script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>
    <style>
        .font-size-13{font-size:13px;}
        .date{min-width: 200px;}
        thead tr th{min-width: 200px;}
        #preview_frame{min-height: 400px}
    </style>
</head>

<body>
    @include('sidebar')
    @include('header')

    <section class="p-4">

        <div class="my-4">
            <h1 class="text-dark my-2">Questions Issues</h1>
            <p class="text-dark fs-5 my-2">Admin can easily track and encounters all issues related to  questions in just seconds.</p>
        </div>

        <div id="pageMessage" class="my-4"></div>


        <div class="bg-white rounded-4 shadow my-4">

            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <th scope="col" class="font_bold text_black">QUESTION CODE</th>
                        <th scope="col" class="font_bold text_black">USER ID</th>
                        <th scope="col" class="font_bold text_black">MESSAGE</th>
                        <th scope="col" class="font_bold text_black">IP</th>
                        <th scope="col" class="font_bold text_black">URL</th>
                        <th scope="col" class="font_bold text_black">IS ON INDEX</th>
                        <th scope="col" class="font_bold text_black date">DATE</th>
                        <th scope="col" class="font_bold text_black">ACTION</th>
                    </thead>
                    <tbody>
                        <tr class="row_bg_light">
                            <td data-label="search"></td>
                            <td data-label="search">
                                <input type="text" id="searchUser" class="shadow-none form-control bg-light font_normal_bold placeholder_text" placeholder="Search User Id">
                            </td>
                            <td data-label="search">
                                <input type="text" id="searchMessage" class="shadow-none form-control bg-light font_normal_bold placeholder_text" placeholder="Search Message">
                            </td>
                            <td data-label="search">
                                <input type="text" id="searchIp" class="shadow-none form-control bg-light font_normal_bold placeholder_text" placeholder="Search Ip">
                            </td>
                            <td data-label="search">
                                <input type="text" id="searchUrl" class="shadow-none form-control bg-light font_normal_bold placeholder_text" placeholder="Search Url">
                            </td>
                            <td data-label="search"></td>
                            <td data-label="search"></td>
                            <td data-label="search"></td>
                        </tr>
                        @if(count($errors()['data']) > 0)
                            @foreach($errors()['data'] as $error)
                                <tr>
                                    <td data-label="code">
                                        <span class="align-items-center bg-primary cursor-pointer d-inline-flex px-2 questionCode rounded-3 small table_bg_primary text-white">
                                            <span>
                                                <svg class="copy me-1" fill="#ffffff" height="20px" width="20px" style="width: 20px!important;" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 64 64" enable-background="new 0 0 64 64" xml:space="preserve">
                                                    <g id="Text-files">
                                                        <path d="M53.9791489,9.1429005H50.010849c-0.0826988,0-0.1562004,0.0283995-0.2331009,0.0469999V5.0228
                                                                    C49.7777481,2.253,47.4731483,0,44.6398468,0h-34.422596C7.3839517,0,5.0793519,2.253,5.0793519,5.0228v46.8432999
                                                                    c0,2.7697983,2.3045998,5.0228004,5.1378999,5.0228004h6.0367002v2.2678986C16.253952,61.8274002,18.4702511,64,21.1954517,64
                                                                    h32.783699c2.7252007,0,4.9414978-2.1725998,4.9414978-4.8432007V13.9861002
                                                                    C58.9206467,11.3155003,56.7043495,9.1429005,53.9791489,9.1429005z M7.1110516,51.8661003V5.0228
                                                                    c0-1.6487999,1.3938999-2.9909999,3.1062002-2.9909999h34.422596c1.7123032,0,3.1062012,1.3422,3.1062012,2.9909999v46.8432999
                                                                    c0,1.6487999-1.393898,2.9911003-3.1062012,2.9911003h-34.422596C8.5049515,54.8572006,7.1110516,53.5149002,7.1110516,51.8661003z
                                                                    M56.8888474,59.1567993c0,1.550602-1.3055,2.8115005-2.9096985,2.8115005h-32.783699
                                                                    c-1.6042004,0-2.9097996-1.2608986-2.9097996-2.8115005v-2.2678986h26.3541946
                                                                    c2.8333015,0,5.1379013-2.2530022,5.1379013-5.0228004V11.1275997c0.0769005,0.0186005,0.1504021,0.0469999,0.2331009,0.0469999
                                                                    h3.9682999c1.6041985,0,2.9096985,1.2609005,2.9096985,2.8115005V59.1567993z" />
                                                        <path d="M38.6031494,13.2063999H16.253952c-0.5615005,0-1.0159006,0.4542999-1.0159006,1.0158005
                                                                    c0,0.5615997,0.4544001,1.0158997,1.0159006,1.0158997h22.3491974c0.5615005,0,1.0158997-0.4542999,1.0158997-1.0158997
                                                                    C39.6190491,13.6606998,39.16465,13.2063999,38.6031494,13.2063999z" />
                                                        <path d="M38.6031494,21.3334007H16.253952c-0.5615005,0-1.0159006,0.4542999-1.0159006,1.0157986
                                                                    c0,0.5615005,0.4544001,1.0159016,1.0159006,1.0159016h22.3491974c0.5615005,0,1.0158997-0.454401,1.0158997-1.0159016
                                                                    C39.6190491,21.7877007,39.16465,21.3334007,38.6031494,21.3334007z" />
                                                        <path d="M38.6031494,29.4603004H16.253952c-0.5615005,0-1.0159006,0.4543991-1.0159006,1.0158997
                                                                    s0.4544001,1.0158997,1.0159006,1.0158997h22.3491974c0.5615005,0,1.0158997-0.4543991,1.0158997-1.0158997
                                                                    S39.16465,29.4603004,38.6031494,29.4603004z" />
                                                        <path d="M28.4444485,37.5872993H16.253952c-0.5615005,0-1.0159006,0.4543991-1.0159006,1.0158997
                                                                    s0.4544001,1.0158997,1.0159006,1.0158997h12.1904964c0.5615025,0,1.0158005-0.4543991,1.0158005-1.0158997
                                                                    S29.0059509,37.5872993,28.4444485,37.5872993z" />
                                                    </g>
                                                </svg>
                                                <svg class="tick me-1" fill="#ffffff" style="display:none;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" width="50px" height="50px">
                                                    <path d="M 25 2 C 12.317 2 2 12.317 2 25 C 2 37.683 12.317 48 25 48 C 37.683 48 48 37.683 48 25 C 48 20.44 46.660281 16.189328 44.363281 12.611328 L 42.994141 14.228516 C 44.889141 17.382516 46 21.06 46 25 C 46 36.579 36.579 46 25 46 C 13.421 46 4 36.579 4 25 C 4 13.421 13.421 4 25 4 C 30.443 4 35.393906 6.0997656 39.128906 9.5097656 L 40.4375 7.9648438 C 36.3525 4.2598437 30.935 2 25 2 z M 43.236328 7.7539062 L 23.914062 30.554688 L 15.78125 22.96875 L 14.417969 24.431641 L 24.083984 33.447266 L 44.763672 9.046875 L 43.236328 7.7539062 z" />
                                                </svg>
                                            </span>
                                            <span class="questionCodeText">{{$error['question_code']}}</span>
                                        </span>
                                    </td>
                                    <td>{{$error['user_id']}}</td>
                                    <td>{{$error['message']}}</td>
                                    <td>{{$error['ip']}}</td>
                                    <td>{{$error['url']}}</td>
                                    <td>
                                        @if($error['is_index_question'])
                                            <span class="bg_label_published p-2 px-3 rounded">Yes</span>
                                        @else
                                            <span class="bg_label_draft p-2 px-3 rounded">No</span>
                                        @endif
                                    </td>
                                    <td>{{$error['date']}}</td>
                                    <td>
                                        <div>
                                            <button class="dropdown-item preview bg-lighter btn text-center w-auto mx-auto small" type="button"  data-bs-toggle="modal" data-bs-target="#previewQuestion" data-id="{{$error['question_id']}}">Preview</button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="8">
                                    <h2 class="h5 text-black text-center pt-3">
                                        No Errors to show
                                    </h2>
                                </td>
                            </tr>
                        @endif  
                    </tbody>
                </table>
            </div>

            <div class="col-12 col-lg-12 order-2 order-md-3 order-lg-2 mb-4">
                <div class="card">
                    <div class="px-3 py-4 d-flex justify-content-between align-items-center">
                        <div>
                            ROWS PER PAGE:
                            <select name="row_selection" id="per_page_option" class="ms-2 btn btn-primary bg_primary_label px-1">
                                @if($errors()['meta']['pagination']['per_page'] == 10)
                                <option value="10" selected>10</option>
                                @else
                                <option value="10">10</option>
                                @endif
                                @if($errors()['meta']['pagination']['per_page'] == 20)
                                <option value="20" selected>20</option>
                                @else
                                <option value="20">20</option>
                                @endif
                                @if($errors()['meta']['pagination']['per_page'] == 50)
                                <option value="50" selected>50</option>
                                @else
                                <option value="50">50</option>
                                @endif
                                @if($errors()['meta']['pagination']['per_page'] == 100)
                                <option value="100" selected>100</option>
                                @else
                                <option value="100">100</option>
                                @endif
                            </select>
                        </div>

                        <div class="align-self-center">
                            @if($errors()['meta']['pagination']['total'] > $errors()['meta']['pagination']['count'])
                            @isset($errors()['meta']['pagination']['links']['previous'])
                            <span>
                                <button class="btn btn-sm bg-label-dark page_btn" data-url="prev">previous</button>
                            </span>
                            @endisset
                            @endif
                            <span class="mx-2">
                                PAGE <span id="page_active">{{$errors()['meta']['pagination']['current_page']}}</span> OF {{$errors()['meta']['pagination']['total_pages']}}
                            </span>
                            @if($errors()['meta']['pagination']['total'] > $errors()['meta']['pagination']['count'])
                            @isset($errors()['meta']['pagination']['links']['next'])
                            <span>
                                <button class="btn btn-sm bg-label-dark page_btn" data-url="next">Next</button>
                            </span>
                            @endisset
                            @endif
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- preview modal  -->

        <div class="modal fade" id="previewQuestion" tabindex="-1" aria-labelledby="previewQuestionLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="previewQuestionLabel"></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-0">
                    <iframe class="w-100" id="preview_frame" src="" frameborder="0"></iframe>
                </div>
                </div>
            </div>
        </div>

    </section>

    @include('parentsidebar.sidebarending')

    <script>
        $(".questionCode").click(function() {
            $(".questionCode").find(".tick").css("display", "none");
            $(".questionCode").find(".copy").css("display", "inline");
            $(this).find(".tick").css("display", "inline");
            $(this).find(".copy").css("display", "none");
            let questionCodeText = $(this).find(".questionCodeText").text().trim();
            var $temp = $("<input>");
            $("body").append($temp);
            $temp.val(questionCodeText).select();
            document.execCommand("copy");
            $temp.remove();
        });
        $(".preview").click(function() {
            let id = $(this).data("id");
            $("#preview_frame").attr("src", "/admin/questions/"+id+"/preview")
        });
        $(function(){
            var current_page = {!!str_replace("'", "\'", json_encode($errors()['meta']['pagination']['current_page'])) !!};
            $("#per_page_option").change(function(){
                filterSearch("perPage", $(this).val())
            });
            $('.page_btn').on('click', function(e) {
                filterSearch("page", $(this).data("url") == "next" ? current_page + 1 : current_page - 1);
            });
            function filterSearch(key, value) {
                let urlParams = new URLSearchParams(window.location.search);
                let paramsObj = Array.from(urlParams.keys()).reduce(
                    (acc, val) => ({ ...acc, [val]: urlParams.get(val) }),
                    {}
                );
                if(Object.keys(paramsObj).length <= 0){
                    window.location.href = window.location.pathname + "?" + key + "=" + value;
                } else {
                    paramsObj[key] = value;
                    window.location.href = window.location.pathname + "?" + mergeQryStr(paramsObj);
                }
                function mergeQryStr(obj) {
                    let queryStr = "";
                    Object.keys(obj).forEach(key => {
                        queryStr += "&" + key + "=" + obj[key];
                    });
                    return queryStr;
                }
            } 
        });
    </script>

    

</body>

</html>