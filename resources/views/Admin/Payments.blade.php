<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Payments - Monetization - 
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
    <!-- bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
        .select_custom {
            min-width: 160px;
        }
        .bg_label_pending {
            background: #e7f8ff;
            color: #00a8d3;
        }
        .bg_label_cancel {
            background: #fffcd2;
            color: #ffb617;
        }
    </style>
</head>

<body>
    @include('sidebar')
    @include('header')
    
    <section class="p-4">

        <div class="my-4">
            <h1 class="text-dark my-2">Payments</h1>
            <p class="text-dark my-2 fs-5">Admins and Instructors can easily create manual payments for students.</p>
        </div>

        <div id="pageMessage" class="my-4"></div>
        
        <div class="bg-white rounded-4 shadow my-4">
            <div class="align-items-center d-flex justify-content-between mb-4 p-3 px-4">
                <h2 class="h4 text-dark m-0">Manage payments</h2>
                <button data-bs-toggle="modal" data-bs-target="#newPaymentModal" class="btn rounded-2 text-uppercase create_new_btn text-white"><i class='bx bx-plus-circle mb-1 text-white'></i>Create new</button>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead class="bg-body-secondary">
                        <th scope="col" class="font_bold w_200 text-dark py-3 fs-6">CODE</th>
                        <th scope="col" class="font_bold w_300 text-dark py-3 fs-6">USER</th>
                        <th scope="col" class="font_bold w_300 text-dark py-3 fs-6">PLAN</th>
                        <th scope="col" class="font_bold w_180 text-dark py-3 fs-6">PRICE/MONTH</th>
                        <th scope="col" class="font_bold w_200 text-dark py-3 fs-6">DATE</th>
                        <th scope="col" class="font_bold w_200 text-dark py-3 fs-6">INVOICE NO</th>
                        <th scope="col" class="font_bold w_200 text-dark py-3 fs-6">METHOD</th>
                        <th scope="col" class="font_bold w_180 text-dark py-3 fs-6">STATUS</th>
                        <th scope="col" class="font_bold w_180 text-dark py-3 fs-6">ACTIONS</th>
                    </thead>
                    <tbody>
                        <tr class="row_bg_light">
                            <td class="py-4" data-label="search">
                                <input type="text" id="searchCode" class="shadow-none form-control bg-light font_normal_bold placeholder_text select_custom" placeholder="Search Code">
                            </td>
                            <td class="py-4" data-label="search">
                                <input type="text" id="searchUser" class="shadow-none form-control bg-light font_normal_bold placeholder_text select_custom" placeholder="Search User">
                            </td>
                            <td class="py-4" data-label="search">
                                <input type="text" id="searchPlan" class="shadow-none form-control bg-light font_normal_bold placeholder_text select_custom" placeholder="Search Plan">
                            </td>
                            <td class="py-4" data-label="search"></td>
                            <td class="py-4" data-label="search"></td>
                            <td class="py-4" data-label="search">
                                <input type="text" id="searchInvoice" class="shadow-none form-control bg-light font_normal_bold placeholder_text select_custom" placeholder="Search Invoice No">
                            </td>
                            <td class="py-4" data-label="search">
                                <input type="text" id="searchMethod" class="shadow-none form-control bg-light font_normal_bold placeholder_text select_custom" placeholder="Search Method">
                            </td>
                            <td class="py-4" data-label="search">
                                <select class="form-select select_custom">
                                    <option selected>Search Status</option>
                                    @foreach($paymentStatuses as $status)
                                    <option value="{{$status['value']}}">{{$status['text']}}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td class="py-4" data-label="search"></td>
                        </tr>
                        @if(count($payments()['data']) > 0)
                        @foreach($payments()['data'] as $payment)
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
                                    <span class="questionCodeText">{{$payment['code']}}</span>
                                </span>
                            </td>
                            <td class="py-4" data-label="exam">{{$payment['user']}}</td>
                            <td class="py-4" data-label="completed">{{$payment['plan']}}</td>
                            <td class="py-4" data-label="completed">{{$payment['amount']}}</td>
                            <td class="py-4" data-label="completed">{{$payment['date']}}</td>
                            <td class="py-4" data-label="completed">{{$payment['invoice_no']}}</td>
                            <td class="py-4" data-label="completed">{{$payment['method']}}</td>
                            <td class="py-4" data-label="status">
                                <span class="p-2 px-3 rounded small 
                                        @if($payment['status'] == 'success')
                                            bg_label_published
                                        @elseif($payment['status'] == 'pending')
                                            bg_label_pending
                                        @elseif($payment['status'] == 'failed')
                                            bg_label_draft
                                        @elseif($payment['status'] == 'cancelled')
                                            bg_label_cancel
                                        @else
                                            bg-label-dark
                                        @endif
                                        ">{{$payment['status']}}</span>
                            </td>
                            <td class="py-4" data-label="actions">
                                <div class="border d-inline-flex dropdown rounded shadow-sm">
                                    <a class="nav-link dropdown-toggle" href="" data-bs-toggle="dropdown" aria-expanded="false">
                                        Action
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end p-0">
                                        <!-- <li>
                                            <a class="dropdown-item" href="/admin/payments/{{$payment['id']}}/edit">Edit</a>
                                        </li> -->
                                        <li>
                                            <a class="dropdown-item cursor-pointer delete" data-id="{{$payment['id']}}">Delete</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="8" class="py-3 text-center">
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
                                @if($payments()['meta']['pagination']['per_page'] == 10)
                                <option value="10" selected>10</option>
                                @else
                                <option value="10">10</option>
                                @endif
                                @if($payments()['meta']['pagination']['per_page'] == 20)
                                <option value="20" selected>20</option>
                                @else
                                <option value="20">20</option>
                                @endif
                                @if($payments()['meta']['pagination']['per_page'] == 50)
                                <option value="50" selected>50</option>
                                @else
                                <option value="50">50</option>
                                @endif
                                @if($payments()['meta']['pagination']['per_page'] == 100)
                                <option value="100" selected>100</option>
                                @else
                                <option value="100">100</option>
                                @endif
                            </select>
                        </div>
                        <div class="align-self-center">
                            @if($payments()['meta']['pagination']['total'] > $payments()['meta']['pagination']['count'])
                            @isset($payments()['meta']['pagination']['links']['previous'])
                            <span>
                                <a href="{{$payments()['meta']['pagination']['links']['previous']}}"><button class="btn btn-sm bg-label-dark">previous</button></a>
                            </span>
                            @endisset
                            @endif
                            <span class="mx-2">
                                PAGE <span id="page_active">{{$payments()['meta']['pagination']['current_page']}}</span> OF {{$payments()['meta']['pagination']['total_pages']}}
                            </span>
                            @if($payments()['meta']['pagination']['total'] > $payments()['meta']['pagination']['count'])
                            @isset($payments()['meta']['pagination']['links']['next'])
                            <span>
                                <a href="{{$payments()['meta']['pagination']['links']['next']}}"><button class="btn btn-sm bg-label-dark">Next</button></a>
                            </span>
                            @endisset
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    @include('parentsidebar.sidebarending')
    
    <!-- Create New Manual Payment Modal -->
    <div class="modal fade" id="newPaymentModal" aria-labelledby="modalToggleLabel" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="modalToggleLabel">New Manual Payment</h5>
                <button type="button" id="closeNewPlan" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">

                <div class="form-group my-4 dropdown">
                    <span for="user_Inp" class="form-label">user</span>
                    <input id="user_id" type="hidden" name="user_id">
                    <input id="user_Inp" type="text" class="form-control dropdown-toggle" data-id="" data-trigger="0" data-bs-toggle="dropdown" aria-expanded="true" placeholder="Search user" autocomplete="off">
                    <ul id="user_Dropdown" class="dropdown-menu w-100 p-0 overflow-auto">
                        <li class="dropdown-item text-center text-light" id="start_search">
                            Start typing to search.
                        </li>
                    </ul>
                </div>

                <div class="form-group my-4 dropdown">
                    <span for="plan_Inp" class="form-label">Plan</span>
                    <input id="plan_id" type="hidden" name="plan_id">
                    <input id="plan_Inp" type="text" class="form-control dropdown-toggle" data-id="" data-trigger="0" data-bs-toggle="dropdown" aria-expanded="true" placeholder="Search Plan" autocomplete="off">
                    <ul id="plan_Dropdown" class="dropdown-menu w-100 p-0 overflow-auto">
                        <li class="dropdown-item text-center text-light" id="start_search">
                            Start typing to search.
                        </li>
                    </ul>
                </div>

                <div class="form-group my-4 dropdown">
                    <span for="paymentId" class="form-label">Payment Id</span>
                    <input id="paymentId" type="text" class="form-control" placeholder="Enter Payment Id" autocomplete="off">
                </div>

                <div class="form-group my-4 dropdown">
                    <span for="currency" class="form-label">Currency</span>
                    <input id="currency" type="text" class="form-control" placeholder="Enter Currency" value="GPB">
                </div>

                <div class="form-group my-4 dropdown">
                    <span for="totalAmount" class="form-label">Total Amount</span>
                    <input id="totalAmount" type="number" class="form-control" placeholder="Enter Total Amount" autocomplete="off">
                </div>

                <div class="form-group my-4 dropdown">
                    <span for="transactionId" class="form-label">Transaction Id</span>
                    <input id="transactionId" type="text" class="form-control" placeholder="Enter Transaction Id" autocomplete="off">
                </div>

                <div class="form-group my-4 dropdown">
                    <span for="referenceId" class="form-label">Reference Id</span>
                    <input id="referenceId" type="text" class="form-control" placeholder="Enter Reference Id" autocomplete="off">
                </div>

            </div>
            <div class="modal-footer">
                <div class="w-100 text-end">
                    <div class="mb-1 font-size-13 text-danger" id="NewpaymentFormError"></div>
                    <button class="btn btn-primary" id="createNewPayment">Create</button>
                </div>
            </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            // on keyup search
            $('#searchCode, #searchUser, #searchPlan, #searchInvoice, #searchMethod').on('keyup', function(e) {
                var code = e.keyCode || e.which;
                if (code == 13) {
                    let queryCode = $("#searchCode").val();
                    let queryUser = $("#searchPayment").val();
                    let queryPlan = $("#searchPlan").val();
                    let queryInvoice = $("#searchInvoice").val();
                    let queryMethod = $("#searchMethod").val();
                    let testCode = queryCode ? "&code=" + queryCode : "";
                    let testUser = queryUser ? "&user=" + queryUser : "";
                    let testPlan = queryPlan ? "&plan=" + queryPlan : "";
                    let testInvoice = queryInvoice ? "&invoice=" + queryInvoice : "";
                    let testMethod = queryMethod ? "&method=" + queryMethod : "";
                    let url = "/admin/payments?" + testCode + testUser + testPlan + testInvoice + testMethod;
                    window.location.href = url;
                }
            });
            // on change search 
            $("#searchStatus").on('change', function() {
                let selectStatus = $(this).val();
                if (selectStatus != "Search Status") {
                    let testStatus = "&status=" + selectStatus;
                    let queryCode = $("#searchCode").val();
                    let queryUser = $("#searchPayment").val();
                    let queryPlan = $("#searchPlan").val();
                    let queryInvoice = $("#searchInvoice").val();
                    let queryMethod = $("#searchMethod").val();
                    let testCode = queryCode ? "&code=" + queryCode : "";
                    let testUser = queryUser ? "&user=" + queryUser : "";
                    let testPlan = queryPlan ? "&plan=" + queryPlan : "";
                    let testInvoice = queryInvoice ? "&invoice=" + queryInvoice : "";
                    let testMethod = queryMethod ? "&method=" + queryMethod : "";
                    let url = "/admin/payments?" + testCode + testUser + testPlan + testInvoice + testMethod + testStatus;
                    window.location.href = url;
                }
            })
            // row per page 
            $('#per_page_option').on('change', function(e) {
                var perPage = parseInt($(this).val());
                var pathname = window.location.pathname;
                var current_page = {!!str_replace("'", "\'", json_encode($payments()['meta']['pagination']['current_page'])) !!};
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
        // ready ends     
        });
        $(document).on("keyup","#plan_Inp", function(e){
            $("#plan_Dropdown").empty();
            var search_query = $(this).val();
            if(search_query.length > 0) {
                $.ajax({
                    type: "GET",
                    url: '/admin/search_plans',
                    data: {
                        query: search_query,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        let arrLength = data['plans'].length;
                        if(arrLength > 0) {
                            data['plans'].forEach(function(plan){
                                $("#plan_Dropdown").append('<li class="dropdown-item cursor-pointer py-1 px-3 select_plan" data-id="'+plan.id+'">'+plan.name+'</li>');
                            });
                        } else {
                            $("#plan_Dropdown").append('<li class="dropdown-item text-danger text-center">No Result Found</li>');
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
                $("#plan_id").val("");
                $("#plan_Inp").attr("data-id","");
                $("#plan_Dropdown").append('<li class="dropdown-item text-center text-light" id="start_search">Start typing to search.</li>');
            }
        });
        $(document).on("keyup","#user_Inp", function(e){
            $("#user_Dropdown").empty();
            var search_query = $(this).val();
            if(search_query.length > 0) {
                $.ajax({
                    type: "GET",
                    url: '/admin/search_users',
                    data: {
                        query: search_query,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        let arrLength = data['users'].length;
                        if(arrLength > 0) {
                            data['users'].forEach(function(user){
                                $("#user_Dropdown").append('<li class="dropdown-item cursor-pointer py-1 px-3 select_user" data-id="'+user.id+'">'+user.name+'</li>');
                            });
                        } else {
                            $("#user_Dropdown").append('<li class="dropdown-item text-danger text-center">No Result Found</li>');
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
                $("#user_id").val("");
                $("#user_Inp").attr("data-id","");
                $("#user_Dropdown").append('<li class="dropdown-item text-center text-light" id="start_search">Start typing to search.</li>');
            }
        });
        $(document).on("click",".select_plan", function(e){
            let selectedplan = $(this).text().trim();
            let selectedplanId = $(this).data("id");
            $("#form").attr('action', '/admin/import-questions/'+selectedplanId);
            $("#form").attr('method', 'POST');
            $("#plan_id").val(selectedplanId);
            $("#plan_Inp").val(selectedplan);
            $("#plan_Inp").attr("data-id",selectedplanId);
        });
        $(document).on("click",".select_user", function(e){
            let selecteduser = $(this).text().trim();
            let selecteduserId = $(this).data("id");
            $("#form").attr('action', '/admin/import-questions/'+selecteduserId);
            $("#form").attr('method', 'POST');
            $("#user_id").val(selecteduserId);
            $("#user_Inp").val(selecteduser);
            $("#user_Inp").attr("data-id",selecteduserId);
        });
        $("#createNewPayment").click(function(){
            let user_id = $("#user_id").val()?parseInt($("#user_id").val()):null;
            let plan_id = $("#plan_id").val()?parseInt($("#plan_id").val()):null;
            let paymentId = $("#paymentId").val();
            let currency = $("#currency").val();
            let totalAmount = $("#totalAmount").val()?parseInt($("#totalAmount").val()):null;
            let transactionId = $("#transactionId").val();
            let referenceId = $("#referenceId").val();
        
            if(user_id){
                if(plan_id){
                    if(paymentId){
                        if(currency){
                            if(totalAmount){
                                $.ajax({
                                    type: "POST",
                                    url: '/admin/payments',
                                    data: {
                                        user_id: user_id,
                                        plan_id: plan_id,
                                        payment_id: paymentId,
                                        currency: currency,
                                        total_amount: totalAmount,
                                        transaction_id: transactionId,
                                        reference_id: referenceId,
                                        _token: '{{ csrf_token() }}'
                                    },
                                    success: function(data) {
                                        if(data.success){
                                            window.location.href = '/admin/payments';
                                        } else {
                                            $("#pageMessage").append('<div class="alert alert-danger ">'+data.message+'</div>');
                                        }
                                    },
                                    error: function(data, textStatus, errorThrown) {
                                        console.log(textStatus);
                                        console.log(data);
                                    },
                                });
                            } else {
                                $("#NewpaymentFormError").text("Please enter total amount");
                            }
                        } else {
                            $("#NewpaymentFormError").text("Please enter currency");
                        }
                    } else {
                        $("#NewpaymentFormError").text("Please enter payment id");
                    }
                } else {
                    $("#NewpaymentFormError").text("Please select plan from plan dropdown");
                }
            } else {
                $("#NewpaymentFormError").text("Please select user from user dropdown");
            }
        });
        $(".delete").click(function() {
            let id = $(this).data("id");
            let _this = $(this);
            $.ajax({
                type: "DELETE",
                url: '/admin/payments/'+id,
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
    </script>
</body>

</html>