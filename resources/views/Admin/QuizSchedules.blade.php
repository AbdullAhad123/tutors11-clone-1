
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quiz Schedules - {{$quiz['title']}}</title>
    <!-- rel icon -->
    <link rel="icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}">
    <meta name="description" content="{{ app(\App\Settings\SiteSettings::class)->seo_description }}">
    <meta name="author" content="{{ app(\App\Settings\SiteSettings::class)->app_name }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
    <script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>
    <!-- bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
        .cursor-not-allowed{cursor:not-allowed !important}
        .font-size-13{font-size:13px;}
        .yes_selector.active{background-color: #e8fadf !important;color: #71dd37 !important;}
        .no_selector.active{background-color: #ffe0db !important;color: #ff3e1d !important;}
        input::-webkit-outer-spin-button,input::-webkit-inner-spin-button {-webkit-appearance: none;}
        input[type=number] {-moz-appearance: textfield;}
        svg{height:18px;width:18px;}
        .custom-tooltip{min-width: 350px;}
        .custom-inp-group{display:flex;}
        @media screen and (max-width:767px) {.custom-tooltip{left: 0;}}
        @media screen and (max-width:547px) {.custom-tooltip{transform: translateX(-50%);min-width: 300px;}}
        @media screen and (max-width:371px) {.custom-inp-group{display: block;}}
        .choices__list--multiple .choices__item{background-color: #696bfc;border: 1px solid #6869ed;}
        .choices[data-type*=select-multiple] .choices__button, .choices[data-type*=text] .choices__button{border-left: 1px solid #c3c3c3;}
        .bg_label_cancel {
            background-color: #fffbe4 !important;
            color: #ffa700 !important;
        }
    </style>
</head>

<body> 
    @include('sidebar')
    @include('header')

    <section class="p-4">

        <div class="text-start my-4 align-items-center">
            <a href="/admin/quizzes"><button class="btn bg_primary_label shadow border-primary text-primary p-2 px-3"><i class='bx bx-arrow-back'></i><span>Back to Quizzes</span></button></a>
        </div>

        <div class="bg-white rounded-4 py-4 p-3 shadow my-4">
            <div class="row m-0">
                <div class="col-lg-5 col-md-12 align-self-center my-2">
                    <h1 class="h4 text-dark mb-0">Quiz Schedules</h1>
                    <div class="mt-1">{{$quiz['title']}}</div>
                </div>
                <div class="col-lg-7 col-md-12 my-2">
                    <div class="row align-items-center justify-content-evenly">
                        @foreach ($steps as $key => $step)
                            @if($step['status'] == 'active')
                                <a href="{{$step['url']}}" class="col-lg-3 col-md-3 col-sm-6 col-6 my-1 p-1">
                                    <button class="bg_primary_label border-primary btn w-100 my-1 fs-6">
                                        <span class="badge bg-primary circle-badge rounded-circle text-white"> {{$key + 1}} </span> 
                                        {{$step['title']}}
                                    </button>
                                </a>                        
                            @else
                                <a href="{{$step['url']}}" class="col-lg-3 col-md-3 col-sm-6 col-6 my-1 p-1">
                                    <button class="btn btn-outline-primary w-100 my-1 fs-6">
                                        <span class="badge bg-primary circle-badge rounded-circle text-white"> {{$key + 1}} </span> 
                                        {{$step['title']}}
                                    </button>
                                </a>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        @if (Session::has('errorMessage'))
            <div class="alert_failed rounded-3 p-3 d-flex align-items-center my-4"><i class='bx bx-x-circle me-1 fs-5'></i>{{Session::get('errorMessage')}}</div>
        @endif

        <!-- The Modal -->
        <div class="modal fade" id="newScheduleModal" aria-labelledby="modalToggleLabel" tabindex="-1" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-dark" id="modalToggleLabel">New Schedule</h5>
                        <button type="button" id="closeNewSchedule" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            Schedule Type
                            <div class="d-flex">
                                <div class="form-check me-3">
                                    <input class="form-check-input schedule_type" type="radio" name="schedule_type" id="fixed" value="fixed" checked>
                                    <label class="form-check-label" for="fixed">
                                        Fixed
                                    </label>
                                </div>
                                <div class="form-check me-3">
                                    <input class="form-check-input schedule_type" type="radio" name="schedule_type" id="flexible" value="flexible">
                                    <label class="form-check-label" for="flexible">
                                        Flexible
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="startDateTimeWrap">
                            <div class="col-sm-6 col-12">
                                <div class="mb-3">
                                    <label for="startDate" class="form-label">Start Date</label>
                                    <input type="date" class="form-control date" id="startDate" placeholder="Select Start Date">
                                </div>
                            </div>
                            <div class="col-sm-6 col-12">
                                <div class="mb-3">
                                    <label for="startTime" class="form-label">Start Time</label>
                                    <input type="time" class="form-control" id="startTime" placeholder="Select Start Time">
                                </div>
                            </div>
                        </div>
                        <div class="row" id="endDateTimeWrap" style="display:none;">
                            <div class="col-sm-6 col-12">
                                <div class="mb-3">
                                    <label for="endDate" class="form-label">End Date</label>
                                    <input type="date" class="form-control date" id="endDate" placeholder="Select End Date">
                                </div>
                            </div>
                            <div class="col-sm-6 col-12">
                                <div class="mb-3">
                                    <label for="endTime" class="form-label">End Time</label>
                                    <input type="time" class="form-control" id="endTime" placeholder="Select End Time">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="gracePeriod" class="form-label">Grace Period to Join (Minutes)</label>
                            <input type="number" class="form-control" id="gracePeriod" placeholder="Enter Grace Period">
                        </div>
                        <div class="mb-3">
                            <label for="scheduleUserGroups" class="form-label">Schedule to User Groups</label>
                            <div class="mb-2">
                                <input type="checkbox" id="selectAllGroups" name="selectAllGroups" value="1" class="cursor-pointer">
                                <label for="selectAllGroups" class="cursor-pointer">schedule for all groups</label>
                            </div>
                            <select class="form-control" id="scheduleUserGroups" placeholder="Select User Groups" multiple>
                                @foreach($userGroups as $userGroup)
                                    <option value="{{$userGroup['id']}}">{{$userGroup['name']}}</option>
                                @endforeach
                            </select> 
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="w-100 text-end">
                            <div class="mb-1 font-size-13 text-danger" id="newScheduleFormError"></div>
                            <button class="btn btn-primary" id="createNewSchedule">Create</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-4 shadow my-4">
            <div class="align-items-center d-flex justify-content-between mb-4 p-3 px-4">
                <h2 class="h4 text-dark m-0">Schedules</h2>
                <button class="btn rounded-4 text-uppercase create_new_btn text-white" data-bs-toggle="modal" data-bs-target="#newScheduleModal"><i class='bx bx-plus-circle mb-1 text-white'></i>Create New</button>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead class="bg-body-secondary">
                        <th scope="col" class="font_bold text-dark fs-6 py-3 w_200">CODE</th>
                        <th scope="col" class="font_bold text-dark fs-6 py-3 w_160">TYPE</th>
                        <th scope="col" class="font_bold text-dark fs-6 py-3 w_200">STARTS AT</th>
                        <th scope="col" class="font_bold text-dark fs-6 py-3 w_200">ENDS AT</th>
                        <th scope="col" class="font_bold text-dark fs-6 py-3 w_160">STATUS</th>
                        <th scope="col" class="font_bold text-dark fs-6 py-3 w_160">ACTIONS</th>
                    </thead>
                    <tbody id="quizSchedulesTable">
                        <tr class="row_bg_light">
                            <td class="py-4" data-label="search">
                                <input type="text" id="searchCode" class="shadow-none form-control bg-light font_normal_bold placeholder_text" placeholder="Search Code">
                            </td>
                            <td class="py-4" data-label="search"></td>
                            <td class="py-4" data-label="search"></td>
                            <td class="py-4" data-label="search"></td>
                            <td class="py-4" data-label="search">
                                <select class="form-select">
                                    <option selected>Search Status</option>
                                    <option value="active">Active</option>
                                    <option value="expired">Expired</option>
                                    <option value="cancelled">Cancelled</option>
                                </select>
                            </td>
                            <td class="py-4" data-label="search"></td>
                        </tr>
                        @if(count($quizSchedules()['data']) > 0)
                            @foreach($quizSchedules()['data'] as $quizSchedule)
                                <tr>
                                    <td class="py-4" data-label="serial"><span class="table_bg_primary text-white small p-2 bg-primary rounded-3">{{$quizSchedule['code']}}</span></td>
                                    <td class="py-4" data-label="exam">{{$quizSchedule['type']}}</td>
                                    <td class="py-4" data-label="exam">{{$quizSchedule['starts_at']}}</td>
                                    <td class="py-4" data-label="exam">{{$quizSchedule['ends_at']}}</td>
                                    <td class="py-4" data-label="status">
                                            <span class="p-2 px-3 rounded small 
                                            @if($quizSchedule['status'] == 'Active')
                                                bg_label_published
                                            @elseif($quizSchedule['status'] == 'Expired')
                                                bg_label_draft
                                            @elseif($quizSchedule['status'] == 'Cancelled')
                                                bg_label_cancel
                                            @else
                                                bg-label-dark
                                            @endif
                                            ">{{$quizSchedule['status']}}</span>
                                    </td>
                                    <td class="py-4" data-label="actions">
                                        <div class="border d-inline-flex dropdown rounded shadow-sm">
                                            <a class="nav-link dropdown-toggle" href="" data-bs-toggle="dropdown" aria-expanded="false">
                                                Actions
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-end p-0">
                                                <li>
                                                    <a class="dropdown-item" href="/admin/quizzes/{{$quiz['id']}}/overall-report?schedule={{$quizSchedule['id']}}">Analytics</a> 
                                                </li>
                                                <li>
                                                    <a class="dropdown-item delete_schedule cursor-pointer" data-quiz-id="{{$quiz['id']}}" data-schedule-id="{{$quizSchedule['id']}}">Delete</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach 
                        @else
                            <tr id="noQuizSchedule">
                                <td class="text-center py-4" colspan="6">
                                    <img src="{{url('images/no_record_found.png')}}" width="200" height="auto" alt="no records found">
                                    <h2 class="text-center text-dark h5 my-1">No Records Found</h2>
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
                                @if($quizSchedules()['meta']['pagination']['per_page'] == 10)
                                    <option value="10" selected>10</option>
                                @else
                                    <option value="10">10</option>
                                @endif
                                @if($quizSchedules()['meta']['pagination']['per_page'] == 20)
                                    <option value="20" selected>20</option>
                                @else
                                    <option value="20">20</option>
                                @endif
                                @if($quizSchedules()['meta']['pagination']['per_page'] == 50)
                                    <option value="50" selected>50</option>
                                @else
                                    <option value="50">50</option>
                                @endif
                                @if($quizSchedules()['meta']['pagination']['per_page'] == 100)
                                    <option value="100" selected>100</option>
                                @else
                                    <option value="100">100</option>
                                @endif
                            </select>
                        </div>
                        <div class="align-self-center">
                            @if($quizSchedules()['meta']['pagination']['total'] > $quizSchedules()['meta']['pagination']['count'])
                                @isset($quizSchedules()['meta']['pagination']['links']['previous'])
                                    <span>
                                        <a href="{{$quizSchedules()['meta']['pagination']['links']['previous']}}"><button class="btn btn-sm bg-label-dark">previous</button></a>
                                    </span>
                                @endisset
                            @endif
                            <span class="mx-2">
                                PAGE <span id="page_active">{{$quizSchedules()['meta']['pagination']['current_page']}}</span> OF {{$quizSchedules()['meta']['pagination']['total_pages']}}
                            </span>
                            @if($quizSchedules()['meta']['pagination']['total'] > $quizSchedules()['meta']['pagination']['count'])
                                @isset($quizSchedules()['meta']['pagination']['links']['next'])
                                    <span>
                                        <a href="{{$quizSchedules()['meta']['pagination']['links']['next']}}"><button class="btn btn-sm bg-label-dark">Next</button></a>
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

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var select = new Choices('#scheduleUserGroups', {
                removeItemButton: true,
            });

            var selectAllCheckbox = document.getElementById('selectAllGroups');

            selectAllCheckbox.addEventListener('change', function () {
                if(this.checked){
                    $(".choices__item--selectable").each(function(){
                        let tab = `<div class="choices__item choices__item--selectable" data-item="" data-id="`+$(this).data("id")+`" data-value="`+$(this).data("value")+`" data-custom-properties="null" data-deletable="" aria-selected="true">
                            `+$(this).text()+`
                            <button type="button" class="choices__button" data-button="" aria-label="Remove item: '`+$(this).data("value")+`'">
                                Remove item
                            </button>
                        </div>`;
                        $("#scheduleUserGroups").append(`<option value="`+$(this).data("value")+`" selected="">`+$(this).text()+`</option>`);
                        $(".choices__list.choices__list--multiple").append(tab);
                    });
                }
            });
        });
        $(document).ready(function() {
            // on keyup search  
            $('#searchCode, #searchTitle').on('keyup', function() {
                console.log('Searching');
            });
            // row per page 
            $('#per_page_option').on('change', function (e) {
                var perPage = parseInt($(this).val());
                var pathname = window.location.pathname;
                var current_page = {!! str_replace("'", "\'", json_encode($quizSchedules()['meta']['pagination']['current_page'])) !!};
                if(perPage == 10){
                    window.location.href = pathname;
                } else {
                    window.location.href = pathname+"?page="+current_page+"&perPage="+perPage;
                }
            });
            // function 
            let quiz_id = {!! str_replace("'", "\'", json_encode($quiz['id'])) !!};
            var dtToday = new Date();
            var month = dtToday.getMonth() + 1;
            var day = dtToday.getDate();
            var year = dtToday.getFullYear();
            if(month < 10)
                month = '0' + month.toString();
            if(day < 10)
                day = '0' + day.toString();
            
            var maxDate = year + '-' + month + '-' + day;
            // or instead:
            // var maxDate = dtToday.toISOString().substr(0, 10);
            $('.date').attr('min', maxDate);
            $(".schedule_type").change(function(){
                if($(this).val() == 'flexible'){
                    $("#endDateTimeWrap").show()
                } else {
                    $("#endDateTimeWrap").hide()
                }
            });
            $("#startDate, #startTime, #gracePeriod, #scheduleUserGroups, #endDate, #endTime").change(function(){
                if($(this).val().length > 0) {
                    $("#newScheduleFormError").text("");
                }
            });
            $("#createNewSchedule").click(function() {
                let schedule_type = $("#fixed").is(':checked')?'fixed':'flexible';
                let startDate = $("#startDate").val();
                let startTime = $("#startTime").val()+':00';
                let endDate = $("#endDate").val();
                let endTime = $("#endTime").val();
                let gracePeriod = $("#gracePeriod").val();
                let scheduleUserGroups = $("#scheduleUserGroups").val();
                if(startDate && startTime){
                    if(gracePeriod){
                        if(scheduleUserGroups.length > 0){
                            if(schedule_type == 'fixed'){
                                fulfillNewSchedule();
                            } else {
                                if(endDate && endTime){
                                    fulfillNewSchedule();
                                } else {
                                    $("#newScheduleFormError").text("End date time field is required when schedule type is flexible.");
                                }
                            }
                        } else {
                            $("#newScheduleFormError").text("Please select at least one user group");
                        }
                    } else {
                        $("#newScheduleFormError").text("Please enter grace period (in minutes)");
                    }
                } else {
                    $("#newScheduleFormError").text("Please enter start date and time");
                }
                function fulfillNewSchedule(){
                    $.ajax({
                        type: "POST",
                        url: '/admin/quizzes/'+quiz_id+'/schedules',
                        data: {
                            end_date: endDate?endDate:'',
                            end_time: endTime?endTime+':00':'',
                            grace_period: gracePeriod,
                            quiz_id: quiz_id,
                            schedule_type: schedule_type,
                            start_date: startDate,
                            start_time: startTime,
                            status: "active",
                            user_groups: scheduleUserGroups,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(data) {
                            if(data.success){
                                $("#newScheduleSuccess").empty();
                                $("#closeNewSchedule").click();
                                $("#newScheduleSuccess").append('<div class="alert alert-success mt-3 shadow text-black">'+data.successMessage+'</div>');
                                $("#noQuizSchedule").remove();
                                let tdCode = '<td><span class="table_bg_primary text-white small p-2 bg-primary rounded-3">'+data.schedule.code+'</span></td>';
                                let tdType = '<td class="text-capitalize">'+data.schedule.schedule_type+'</td>';
                                let tdStartsAt = '<td>'+change_date_time_formate(data.schedule.start_date, data.schedule.start_time)+'</td>';
                                let tdEndsAt = '<td>'+change_date_time_formate(data.schedule.end_date, data.schedule.end_time)+'</td>';
                                let tdStatus = checkStatus(data.schedule.status);
                                let tdAction =  '<td><div class="dropdown border rounded">'+
                                                    '<a class="nav-link dropdown-toggle" href="" data-bs-toggle="dropdown" aria-expanded="false">Action</a>'+
                                                    '<ul class="dropdown-menu dropdown-menu-end p-0" data-popper-placement="top-end">'+
                                                        '<li><a class="dropdown-item" href="/admin/quizzes/'+quiz_id+'/overall-report?schedule='+data.schedule.id+'">Analytics</a></li>'+
                                                        '<li><a class="dropdown-item delete_schedule cursor-pointer" data-quiz-id="'+quiz_id+'" data-schedule-id="'+data.schedule.id+'">Delete</a></li>'+
                                                    '</ul>'+
                                                '</div></td>';
                                $("#quizSchedulesTable").append('<tr>'+tdCode+tdType+tdStartsAt+tdEndsAt+tdStatus+tdAction+'</tr>')
                            }
                        },
                        error: function(data, textStatus, errorThrown) {
                            console.log(textStatus);
                        },
                    });
                }
            });
            function change_date_time_formate(date, time) {
                var mydate = new Date(date).toUTCString();
                var str = mydate.toString("MM DD YYYY");
                var newDate = str.split('00:00:00');
                var finalDate = newDate[0].split(' ');
                var d = finalDate[0]+' '+finalDate[2]+' '+finalDate[1]+', '+finalDate[3]


                time = time.toString ().match (/^([01]\d|2[0-3])(:)([0-5]\d)(:[0-5]\d)?$/) || [time];

                if (time.length > 1) { // If time format correct
                    time = time.slice (1);  // Remove full string match value
                    time[5] = +time[0] < 12 ? ' AM' : ' PM'; // Set AM/PM
                    time[0] = +time[0] % 12 || 12; // Adjust hours
                    time[3] = '';
                }
                let date_time = d+' '+time.join ('')
                return date_time;
            }
            function checkStatus(status){
                if(status == 'active'){
                    return '<td><span class="py-1 px-2 rounded small text-capitalize bg-label-primary">'+status+'</span></td>'
                } else if (status == 'expired') {
                    return '<td><span class="py-1 px-2 rounded small text-capitalize bg-label-warrning">'+status+'</span></td>'
                } else if (status == 'cancelled') {
                    return '<td><span class="py-1 px-2 rounded small text-capitalize bg-label-danger">'+status+'</span></td>'
                } else {
                    return '<td><span class="py-1 px-2 rounded small text-capitalize bg-label-dark">'+status+'</span></td>'
                }
            }
            $(document).on('click', '.delete_schedule', function(){ 
                let quizId = $(this).data('quiz-id');
                let scheduleId = $(this).data('schedule-id');
                let _this = $(this);
                $.ajax({
                    type: "DELETE",
                    url: '/admin/quizzes/'+quizId+'/schedules/'+scheduleId,
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        if(data.success){
                            _this.parents("tr").remove();
                            $("#newScheduleSuccess").empty();
                            $("#quizzesDialogBox").append('<div class="alert_success rounded-3 p-3 d-flex align-items-center"><i class="bx bx-check-circle me-1 fs-5"></i> ' + data.message + '</div>');
                            let recordLength = $("#quizSchedulesTable").find("tr").length;
                            if(recordLength <= 1){
                                $('#quizSchedulesTable').append(`<tr id="noQuizSchedule">
                                    <td class="text-center py-4" colspan="6">
                                        <img src="{{url('images/no_record_found.png')}}" width="200" height="auto" alt="no records found">
                                        <h2 class="text-center text-dark h5 my-1">No Records Found</h2>
                                    </td>
                                </tr>`);
                            }
                        } else {
                            $("#newScheduleSuccess").empty();
                            $("#quizzesDialogBox").append('<div class="alert_failed rounded-3 p-3 d-flex align-items-center"><i class="bx bx-error-circle me-1 fs-5"></i> ' + data.message + '</div>');
                        }
                    },
                    error: function(data, textStatus, errorThrown) {
                        console.log(textStatus);
                    },
                });
            }); 
        });
    </script>

</body>

</html>
