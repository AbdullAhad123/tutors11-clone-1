<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Plans - Monetization - 
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
    <script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>
    <!-- bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
        .choices__list--multiple .choices__item{background-color: #696bfc;border: 1px solid #6869ed;}
        .choices[data-type*=select-multiple] .choices__button, .choices[data-type*=text] .choices__button{border-left: 1px solid #c3c3c3;}
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {-webkit-appearance: none;margin: 0;}
        input[type=number] {-moz-appearance: textfield;}
        .font-size-13{font-size:13px;}
    </style>
</head>

<body>
    @include('sidebar')
    @include('header')

    <section class="p-4">

        <div class="my-4">
            <h1 class="text-dark my-2">Plans</h1>
            <p class="text-dark fs-5 my-2">Admins and Instructors manage student account plans, ensuring seamless subscription handling.</p>
        </div>

        <div id="pageMessage" class="my-4"></div>

        <div class="bg-white rounded-4 shadow my-4">
            <div class="align-items-center d-flex justify-content-between mb-4 p-3 px-4">
                <h2 class="h4 text-dark m-0">Manage Plans</h2>
                <button type='button' data-bs-toggle="modal" data-bs-target="#newPlanModal" class="btn rounded-2 text-uppercase create_new_btn text-white"><i class='bx bx-plus-circle mb-1 text-white'></i>Create new</button>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead class="bg-body-secondary">
                        <th scope="col" class="font_bold text-dark fs-6 py-3 w_200">CODE</th>
                        <th scope="col" class="font_bold text-dark fs-6 py-3 w_200">NAME</th>
                        <th scope="col" class="font_bold text-dark fs-6 py-3 w_200">DURATION</th>
                        <th scope="col" class="font_bold text-dark fs-6 py-3 w_200">PRICE</th>
                        <th scope="col" class="font_bold text-dark fs-6 py-3 w_200">CATEGORY</th>
                        <th scope="col" class="font_bold text-dark fs-6 py-3 w_160">STATUS</th>
                        <th scope="col" class="font_bold text-dark fs-6 py-3 w_180">ACTIONS</th>
                    </thead>
                    <tbody>
                        <tr class="row_bg_light">
                            <td class="py-4" data-label="search">
                                <input type="text" id="searchCode" class="shadow-none form-control bg-light font_normal_bold placeholder_text" placeholder="Search Code">
                            </td>
                            <td class="py-4" data-label="search">
                                <input type="text" id="searchTitle" class="shadow-none form-control bg-light font_normal_bold placeholder_text" placeholder="Search Name">
                            </td>
                            <td class="py-4" data-label="search">
                                <input type="text" id="searchDuration" class="shadow-none form-control bg-light font_normal_bold placeholder_text" placeholder="Search Duration">
                            </td>
                            <td class="py-4" data-label="search"></td>
                            <td class="py-4" data-label="search">
                                <input type="text" id="searchCategory" class="shadow-none form-control bg-light font_normal_bold placeholder_text" placeholder="Search Category">
                            </td>
                            <td class="py-4" data-label="search">
                                <select id="searchStatus" class="form-select">
                                    <option selected>Search Status</option>
                                    <option value="1">Active</option>
                                    <option value="0">In-Active</option>
                                </select>
                            </td>
                            <td class="py-4" data-label="search"></td>
                        </tr>
                        @if(count($plans()['data']) > 0)
                            @foreach($plans()['data'] as $plan)
                                <tr>
                                    <td class="py-4" data-label="code">
                                        <span class="align-items-center bg-primary cursor-pointer d-inline-flex px-2 questionCode rounded-3 small table_bg_primary text-white">
                                            <span class="me-1">
                                                <svg class="copy" fill="#ffffff" height="20px" width="20px" style="width: 20px!important;" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 64 64" enable-background="new 0 0 64 64" xml:space="preserve">
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
                                                <svg class="tick" fill="#ffffff" style="display:none;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" width="50px" height="50px">
                                                    <path d="M 25 2 C 12.317 2 2 12.317 2 25 C 2 37.683 12.317 48 25 48 C 37.683 48 48 37.683 48 25 C 48 20.44 46.660281 16.189328 44.363281 12.611328 L 42.994141 14.228516 C 44.889141 17.382516 46 21.06 46 25 C 46 36.579 36.579 46 25 46 C 13.421 46 4 36.579 4 25 C 4 13.421 13.421 4 25 4 C 30.443 4 35.393906 6.0997656 39.128906 9.5097656 L 40.4375 7.9648438 C 36.3525 4.2598437 30.935 2 25 2 z M 43.236328 7.7539062 L 23.914062 30.554688 L 15.78125 22.96875 L 14.417969 24.431641 L 24.083984 33.447266 L 44.763672 9.046875 L 43.236328 7.7539062 z" />
                                                </svg>
                                            </span>
                                            <span class="questionCodeText">{{$plan['code']}}</span>
                                        </span>
                                    </td>
                                    <td class="py-4" data-label="exam">{{$plan['name']}}</td>
                                    <td class="py-4" data-label="completed">{{$plan['duration']}}</td>
                                    <td class="py-4" data-label="completed">{{$plan['price']}} <span class="ms-1 badge 
                                            {{ $plan['is_yearly'] ? 'bg-label-primary' : 'bg-label-warning' }} 
                                    ">For Per {{ $plan['is_yearly'] ? 'Year' : 'Month' }}</span></td>
                                    <td class="py-4" data-label="completed">{{$plan['category']}}</td>
                                    <td class="py-4" data-label="status">
                                        @if($plan['status'])
                                            <span class="p-2 px-3 rounded small bg_label_published">Active</span>
                                        @else
                                            <span class="p-2 px-3 rounded small bg_label_draft">In-Active</span>
                                        @endif
                                    </td>
                                    <td class="py-4" data-label="actions">
                                        <div class="border d-inline-flex dropdown rounded shadow-sm">
                                            <a class="nav-link dropdown-toggle" href="" data-bs-toggle="dropdown" aria-expanded="false">
                                                Action
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-end p-0">
                                                <li>
                                                    <a class="dropdown-item" href="/admin/plans/{{$plan['id']}}/edit">Edit</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item delete cursor-pointer" data-id="{{$plan['id']}}">Delete</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="7" class="py-3 text-center">
                                    <img src="{{url('images/no_record_found.png')}}" height="auto" width="200" alt="no records found">
                                    <h2 class="text-dark h4">No Records Found</h2>
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
                                @if($plans()['meta']['pagination']['per_page'] == 10)
                                <option value="10" selected>10</option>
                                @else
                                <option value="10">10</option>
                                @endif
                                @if($plans()['meta']['pagination']['per_page'] == 20)
                                <option value="20" selected>20</option>
                                @else
                                <option value="20">20</option>
                                @endif
                                @if($plans()['meta']['pagination']['per_page'] == 50)
                                <option value="50" selected>50</option>
                                @else
                                <option value="50">50</option>
                                @endif
                                @if($plans()['meta']['pagination']['per_page'] == 100)
                                <option value="100" selected>100</option>
                                @else
                                <option value="100">100</option>
                                @endif
                            </select>
                        </div>
                        <div class="align-self-center">
                            @if($plans()['meta']['pagination']['total'] > $plans()['meta']['pagination']['count'])
                            @isset($plans()['meta']['pagination']['links']['previous'])
                            <span>
                                <a href="{{$plans()['meta']['pagination']['links']['previous']}}"><button class="btn btn-sm bg-label-dark">previous</button></a>
                            </span>
                            @endisset
                            @endif
                            <span class="mx-2">
                                PAGE <span id="page_active">{{$plans()['meta']['pagination']['current_page']}}</span> OF {{$plans()['meta']['pagination']['total_pages']}}
                            </span>
                            @if($plans()['meta']['pagination']['total'] > $plans()['meta']['pagination']['count'])
                            @isset($plans()['meta']['pagination']['links']['next'])
                            <span>
                                <a href="{{$plans()['meta']['pagination']['links']['next']}}"><button class="btn btn-sm bg-label-dark">Next</button></a>
                            </span>
                            @endisset
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Create New Plan Modal -->
        <div class="modal fade" id="newPlanModal" aria-labelledby="modalToggleLabel" tabindex="-1" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-dark" id="modalToggleLabel">New Plan</h5>
                    <button type="button" id="closeNewPlan" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="Category" class="form-label">Category</label>
                        <select class="form-control" id="Category" placeholder="Choose Category">
                            <option value="">Choose Category</option>
                            @foreach($subCategories as $subCategory)
                                <option value="{{$subCategory['id']}}">{{$subCategory['name']}}</option>
                            @endforeach
                        </select> 
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">Plan Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter Name">
                    </div>

                    <div class="mb-3">
                        <label for="duration" class="form-label">Duration (Months)</label>
                        <input type="number" class="form-control" id="duration" placeholder="Enter Duration (Months)" min="1" value="1">
                    </div>

                    <div class="mb-4 row">
                        <div class="col-12 col-sm-8">
                            <div class="h6 mb-1 text-dark">Is Yearly - <span id="enableYearlyText">No</span></div>
                            <div class="lh-1 font-size-13">Add yearly plans</div>
                        </div>
                        <div class="col-12 col-sm-4 d-flex align-items-center justify-content-sm-end">
                            <label class="switch mt-2">
                                <input class="enabling" id="enableYearly" type="checkbox">
                                <span class="slider round"></span>
                            </label>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="monthlyPrice" class="form-label"><span id="monthOrYearText">Monthly</span> Price</label>
                        <input type="number" class="form-control" id="monthlyPrice" placeholder="Enter Monthly Price" min="0" value="1">
                    </div>

                    <div class="mb-4 row">
                        <div class="col-12 col-sm-8">
                            <div class="h6 mb-1 text-dark">Discount - <span id="enableDiscountText">No</span></div>
                            <div class="lh-1 font-size-13">Provide direct discount to the plan</div>
                        </div>
                        <div class="col-12 col-sm-4 d-flex align-items-center justify-content-sm-end">
                            <label class="switch mt-2">
                                <input class="enabling" id="enableDiscount" type="checkbox">
                                <span class="slider round"></span>
                            </label>
                        </div>
                    </div>

                    <div class="mb-3" id="enableDiscountWrap" style="display:none;">
                        <label for="discountPercentage" class="form-label">Discount Percentage</label>
                        <input type="number" class="form-control" id="discountPercentage" placeholder="Enter Discount Percentage" min="0" value="0">
                    </div>

                    <div class="mb-4 row">
                        <div class="col-12 col-sm-8">
                            <div class="h6 mb-1 text-dark">Feature Access - <span id="featureAccessText">Unlimited</span></div>
                            <div class="lh-1 font-size-13">Unlimited (Access to all features). Restricted (Access to selected features only).</div>
                        </div>
                        <div class="col-12 col-sm-4 d-flex align-items-center justify-content-sm-end">
                            <label class="switch mt-2">
                                <input class="enabling" id="featureAccess" type="checkbox">
                                <span class="slider round"></span>
                            </label>
                        </div>
                    </div>

                    <div class="mb-3" id="featureAccessWrap" style="display:none;">
                        <label for="Features" class="form-label">Features</label>
                        <select class="form-control" id="Features" placeholder="Choose Features" multiple>
                            @foreach($features as $feature)
                                <option value="{{$feature['id']}}">{{$feature['name']}}</option>
                            @endforeach
                        </select> 
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Short Description (Max. 200 Characters)</label>
                        <textarea class="form-control" name="description" id="description" rows="4" placeholder="Enter Short Description (Max. 200 Characters)"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="sortOrder" class="form-label">Sort Order</label>
                        <input type="number" class="form-control" id="sortOrder" placeholder="Enter Sort Order" min="0" value="1">
                    </div>

                    <div class="mb-4 row">
                        <div class="col-12 col-sm-8">
                            <div class="h6 mb-1 text-dark">Popular - <span id="isPopularText">No</span></div>
                            <div class="lh-1 font-size-13">Yes (Shown as Most Popular)</div>
                        </div>
                        <div class="col-12 col-sm-4 d-flex align-items-center justify-content-sm-end">
                            <label class="switch mt-2">
                                <input id="isPopular" type="checkbox">
                                <span class="slider round"></span>
                            </label>
                        </div>
                    </div>

                    <div class="mb-4 row">
                        <div class="col-12 col-sm-8">
                            <div class="h6 mb-1 text-dark">Status - <span id="isActiveText">In-active</span></div>
                            <div class="lh-1 font-size-13">Active (Shown Everywhere). In-active (Hidden Everywhere).</div>
                        </div>
                        <div class="col-12 col-sm-4 d-flex align-items-center justify-content-sm-end">
                            <label class="switch mt-2">
                                <input id="isActive" type="checkbox">
                                <span class="slider round"></span>
                            </label>
                        </div>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <div class="w-100 text-end">
                        <div class="mb-1 font-size-13 text-danger" id="newPlanFormError"></div>
                        <button class="btn btn-primary" id="createNewPlan">Create</button>
                    </div>
                </div>
                </div>
            </div>
        </div>

    </section>

    @include('parentsidebar.sidebarending')

    <script>
        $(document).ready(function() {
            // on keyup search 
            $('#searchCode, #searchTitle , #searchDuration , #searchCategory').on('keyup', function(e) {
                var code = e.keyCode || e.which;
                if (code == 13) {
                    let queryCode = $("#searchCode").val();
                    let queryName = $("#searchTitle").val();
                    let queryDuration = $("#searchDuration").val();
                    let queryCategory = $("#searchCategory").val();
                    let testCode = queryCode ? "&code=" + queryCode : "";
                    let testName = queryName ? "&name=" + queryName : "";
                    let testDuration = queryDuration ? "&duration=" + queryDuration : "";
                    let testCategory = queryCategory ? "&category=" + queryCategory : "";
                    let url = "/admin/plans?" + testCode + testName + testDuration + testCategory;
                    window.location.href = url;
                }
            });
            // status change
            $("#searchStatus").on('change', function() {
                let selectStatus = $(this).val();
                if (selectStatus != "Search Status") {
                    let testStatus = "&status=" + selectStatus;
                    let queryCode = $("#searchCode").val();
                    let queryName = $("#searchTitle").val();
                    let queryDuration = $("#searchDuration").val();
                    let queryCategory = $("#searchCategory").val();
                    let testCode = queryCode ? "&code=" + queryCode : "";
                    let testName = queryName ? "&name=" + queryName : "";
                    let testDuration = queryDuration ? "&duration=" + queryDuration : "";
                    let testCategory = queryCategory ? "&category=" + queryCategory : "";
                    let url = "/admin/plans?" + testCode + testName + testDuration + testCategory + testStatus;
                    window.location.href = url;
                }
            })
            // row per page  
            $('#per_page_option').on('change', function(e) {
                var perPage = parseInt($(this).val());
                var pathname = window.location.pathname;
                var current_page = {!!str_replace("'", "\'", json_encode($plans()['meta']['pagination']['current_page'])) !!};
                if (perPage == 10) {
                    window.location.href = pathname;
                } else {
                    window.location.href = pathname + "?page=" + current_page + "&perPage=" + perPage;
                }
            });
            // copy code 
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
            // categroy 
            var Category = new Choices('#Category', {
                removeItemButton: false,
                searchEnabled: false
            });
            // features 
            var Features = new Choices('#Features', {
                removeItemButton: true,
                searchEnabled: true
            });
            // enabled
            $(".enabling").change(function(){
                let id = $(this).attr("id");
                let check = $(this).is(':checked');
                if(check){
                    $("#"+id+"Wrap").show();
                } else {
                    $("#"+id+"Wrap").hide();
                }
            });
            // enable yearly 
            $("#enableYearly").change(function(){
                let check = $(this).is(':checked');
                if(check){
                    $("#enableYearlyText").text("Yes");
                    $("#monthOrYearText").text("Yearly");
                } else {
                    $("#enableYearlyText").text("No");
                    $("#monthOrYearText").text("Monthly");
                }
            });

            // enable discount 
            $("#enableDiscount").change(function(){
                let check = $(this).is(':checked');
                if(check){
                    $("#enableDiscountText").text("Yes");
                } else {
                    $("#enableDiscountText").text("No");
                }
            });
            //fetaures
            $("#featureAccess").change(function(){
                let check = $(this).is(':checked');
                if(check){
                    $("#featureAccessText").text("Restricted");
                } else {
                    $("#featureAccessText").text("Unlimited");
                }
            });
            // is popular
            $("#isPopular").change(function(){
                let check = $(this).is(':checked');
                if(check){
                    $("#isPopularText").text("Yes");
                } else {
                    $("#isPopularText").text("No");
                }
            });
            // is active
            $("#isActive").change(function(){
                let check = $(this).is(':checked');
                if(check){
                    $("#isActiveText").text("Active");
                } else {
                    $("#isActiveText").text("In-active");
                }
            });
            // new plan
            $("#createNewPlan").click(function(){
                let category = $("#Category").val();
                let name = $("#name").val();
                let duration = $("#duration").val()?parseInt($("#duration").val()):null;
                let monthlyPrice = $("#monthlyPrice").val()?parseInt($("#monthlyPrice").val()):null;
                let enableDiscount = $("#enableDiscount").is(':checked');
                let discountPercentage = $("#discountPercentage").val()?parseInt($("#discountPercentage").val()):null;
                let featureAccess = $("#featureAccess").is(':checked');
                let Features = $("#Features").val();
                let description = $("#description").val();
                let sortOrder = $("#sortOrder").val()?parseInt($("#sortOrder").val()):null;
                let isPopular = $("#isPopular").is(':checked');
                let isActive = $("#isActive").is(':checked');
                let enableYearly = $("#enableYearly").is(':checked');
                if(category){
                    if(name){
                        if(duration){
                            if(monthlyPrice){
                                if(enableDiscount && !discountPercentage){
                                    $("#newPlanFormError").text("Discount percentage field is required when discount is enabled");
                                } else {
                                    if(sortOrder){
                                        $.ajax({
                                            url: '/admin/plans',
                                            dataType: 'json',
                                            type: 'POST',
                                            data: {
                                                category_id: category,
                                                category_type: "App\\Models\\SubCategory",
                                                description: description,
                                                discount_percentage: discountPercentage,
                                                duration: duration,
                                                feature_restrictions: featureAccess,
                                                features: Features,
                                                has_discount: enableDiscount,
                                                is_active: isActive,
                                                is_popular: isPopular,
                                                name: name,
                                                is_yearly: enableYearly,
                                                price: monthlyPrice,
                                                sort_order: sortOrder,
                                                _token: '{{ csrf_token() }}'
                                            },
                                            success: function(data) {
                                                if(data.success){
                                                    window.location.href = "/admin/plans";
                                                }
                                            },
                                            error: function(data, textStatus, errorThrown) {
                                                console.log(textStatus);
                                                console.log(data);
                                            },
                                        });
                                    } else {
                                        $("#newPlanFormError").text("Sort order field is required, Please enter sort order");
                                    }
                                }
                            } else {
                                $("#newPlanFormError").text("Monthly price field is required, Please enter monthly price");
                            }
                        } else {
                            $("#newPlanFormError").text("Duration field is required, Please enter duration (months)");
                        }
                    } else {
                        $("#newPlanFormError").text("Plan name field is required, Please enter plan name");
                    }
                } else {
                    $("#newPlanFormError").text("Category field is required, Please select category")
                }
            });
            // select plan
            $("input, select").change(function(){
                $("#newPlanFormError").text("");
            });
            // delete plan
            $(".delete").click(function() {
                let id = $(this).data("id");
                let _this = $(this);
                $.ajax({
                    type: "DELETE",
                    url: '/admin/plans/'+id,
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        $("#pageMessage").empty();
                        if(data.success){
                            _this.parents("tr").remove();
                            $("#pageMessage").append('<div class="alert_success p-3 d-flex align-items-center rounded-3 my-1"> <i class="bx bx-check-circle me-1"></i>'+data.message+'</div>');
                        } else {
                            $("#pageMessage").append('<div class="alert_failed p-3 d-flex align-items-center rounded-3 my-1"> <i class="bx bx-error-circle me-1"></i>'+data.message+'</div>');
                        }
                    },
                    error: function(data, textStatus, errorThrown) {
                        console.log(textStatus);
                    },
                });
            });
            // ready ends 
        });
    </script>
    
</body>

</html>