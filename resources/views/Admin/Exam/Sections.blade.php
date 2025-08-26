
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Exam Sections - {{$exam['title']}}</title>
    <!-- rel icon -->
    <link rel="icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}">
    <meta name="description" content="{{ app(\App\Settings\SiteSettings::class)->seo_description }}">
    <meta name="author" content="{{ app(\App\Settings\SiteSettings::class)->app_name }}">
    <!-- bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
        .cursor-not-allowed{cursor:not-allowed !important}
        .font-size-13{font-size:13px;}
        .yes_selector.active{background-color: #efffe7 !important;color: #4b9f1d !important;border: 1px solid #4b9f1d !important;border-radius: 5px !important}
        .no_selector.active{background-color: #ffe5e1 !important;color: #e52403 !important;border: 1px solid #e52403 !important;border-radius: 5px !important}
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
        #sectionDropdown {max-height: 185px;}
    </style>
</head>

<body> 
    @include('sidebar')
    @include('header')

    <section class="p-4">

        <div class="text-start my-4 align-items-center">
            <a href="/admin/exams"><button class="btn bg_primary_label shadow border-primary text-primary p-2 px-3"><i class='bx bx-arrow-back'></i><span>Back to Exams</span></button></a>
        </div>

        <div class="bg-white rounded-4 py-4 p-3 shadow">
            <div class="row m-0">
                <div class="col-12 align-self-center my-2">
                    <div class="h5 text-dark mb-0">Exam Details</div>
                    @if(isset($editFlag) && $editFlag)
                        <div class="mt-1">{{$exam['title']}}</div>
                    @endif
                </div>
                <div class="col-12 my-2">
                    <div class="row align-items-center justify-content-evenly">
                        @if(isset($editFlag) && $editFlag)
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
                        @else
                            @foreach ($steps as $key => $step)
                                @if($step['status'] == 'active')
                                    <div class="col-lg-2 col-md-3 col-sm-6 col-6 my-1 p-1">
                                        <button class="bg_primary_label w-100 fs-6 border-primary btn"> <span class="badge bg-primary circle-badge rounded-circle text-white"> {{$key + 1}} </span> {{$step['title']}} </button>
                                    </div>
                                @else
                                    <div class="col-lg-2 col-md-3 col-sm-6 col-6 my-1 p-1">
                                        <button class="btn btn-outline-primary w-100 fs-6 cursor-not-allowed"> <span class="badge bg-primary circle-badge rounded-circle text-white"> {{$key + 1}} </span> {{$step['title']}} </button>
                                    </div>
                                @endif
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>

        @if (Session::has('errorMessage'))
            <div class="alert_failed rounded-3 p-3 d-flex align-items-center my-4"><i class='bx bx-x-circle me-1 fs-5'></i>{{Session::get('errorMessage')}}</div>
        @endif

        <div id="formMessage"></div>

        <!-- new popup -->
        <div class="modal fade" id="addSectionModal" aria-labelledby="modalToggleLabel" tabindex="-1" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title text-dark" id="modalToggleLabel">New Section</h5>
                    <button type="button" id="closeSection" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group mb-3">
                            <label for="title" class="form-label">Display Name:</label>
                            <input type="text" class="form-control" id="title" placeholder="Enter Name">
                        </div>
                        <div class="form-group mb-3">
                            <label for="section" class="form-label">Subject:</label>
                            <div class="dropdown">
                                <input type="text" class="form-control dropdown-toggle" id="section" data-id="" placeholder="Enter Section" data-bs-toggle="dropdown" aria-expanded="false" autocomplete="off">
                                <ul id="sectionDropdown" class="dropdown-menu w-100 p-0 overflow-scroll">                                
                                    <li><a class="py-2 px-3 border-bottom dropdown-item text-center text-muted">Start typing to search.</a></li>
                                </ul>
                            </div>
                        </div>
                        @if($exam['settings']['enable_negative_marking'] == true)
                            <div id="negativeMarkingSection" class="justify-content-between align-items-center mb-4">
                                <div class="justify-content-between align-items-center mb-4 custom-inp-group">
                                    <div>
                                        Negative Marking Type
                                        <span class="position-relative">
                                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 cursor-pointer text-primary show_tooltip"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                            <div class="bg-white position-absolute px-3 py-1 shadow start-0 rounded font-size-13 custom-tooltip d-none zindex-1">
                                                <div><span class="text-success">Fixed</span> - Fixed amount will be deduct from question marks</div>
                                                <div><span class="text-danger">Percentage</span> - Percentage will be deduct from question marks</div>
                                            </div>
                                        </span>
                                    </div>
                                    <div>
                                        <input id="negativeMarkingType" class="inp" value="fixed" type="hidden">
                                        <span class="btn border rounded-0 radio_selector negativeMarksTypeSelector yes_selector active">Fixed</span>
                                        <span class="btn border rounded-0 radio_selector negativeMarksTypeSelector no_selector">Percentage</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <div>
                                    Negative Marks
                                    </div>
                                    <div>
                                    <input id="negativeMarks" class="inp mt-2 form-control" type="number" min="1" placeholder="Enter Number">
                                    </div>
                            </div>
                    @endif
                    @if($exam['settings']['enable_section_cutoff'] == true)
                        <div class="form-group mb-4">
                                <div>Pass Percentage</div>
                                <div>
                                    <input id="sectionCutoff" class="inp mt-2 form-control" type="number" min="0" max="100" placeholder="Enter Percentage">
                                </div>
                        </div>
                    @endif
                    @if($exam['settings']['auto_grading'] == false)
                        <div class="form-group mb-4">
                            <div>
                                Points for Correct Answer
                            </div>
                            <div>
                                <input id="pointsCA" class="inp mt-2 form-control" type="number" min="1" placeholder="Enter Marks">
                            </div>
                        </div>
                    @endif
                    @if($exam['settings']['auto_duration'] == false)
                        <div class="form-group mb-4">
                            <div>
                                Duration (Minutes)
                            </div>
                            <div>
                                <input id="totalDuration" class="inp mt-2 form-control" type="number" min="0" placeholder="Enter Marks">
                            </div>
                        </div>
                    @endif
                        <div class="form-group mb-3">
                            <label for="sectionOrder" class="form-label">Section Order</label>
                            <input type="number" class="form-control" id="sectionOrder" placeholder="Enter Order">
                        </div>
                    
                    </div>
                    <div class="modal-footer">
                        <div class="w-100 text-end">
                            <div class="mb-1 font-size-13 text-danger" id="SectionFormError"></div>
                            <button class="btn btn-primary" id="createSection">Add</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-4 shadow my-4">
            <div class="align-items-center d-flex justify-content-between mb-4 p-3 px-4">
                <h2 class="h4 text-dark m-0">Sections</h2>
                <button class="btn rounded-4 text-uppercase create_new_btn text-white" data-bs-toggle="modal" data-bs-target="#addSectionModal"><i class='bx bx-plus-circle mb-1 text-white'></i>Create New</button>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead class="bg-body-secondary">
                        <th scope="col" class="font_bold text-dark fs-6 py-3 w_160">#</th>
                        <th scope="col" class="font_bold text-dark fs-6 py-3 w_180">DISPLAY NAME</th>
                        <th scope="col" class="font_bold text-dark fs-6 py-3 w_200">SECTION ORDER</th>
                        <th scope="col" class="font_bold text-dark fs-6 py-3 w_180">SUBJECT</th>
                        <th scope="col" class="font_bold text-dark fs-6 py-3 w_200">TOTAL QUESTIONS</th>
                        <th scope="col" class="font_bold text-dark fs-6 py-3 w_200">TOTAL DURATION</th>
                        <th scope="col" class="font_bold text-dark fs-6 py-3 w_160">TOTAL MARKS</th>
                        <th scope="col" class="font_bold text-dark fs-6 py-3 w_160">ACTIONS</th>
                    </thead>
                    <tbody id="examSectionsTable">
                        @if(count($sections()) > 0)
                            @foreach ($sections() as $key => $section)
                                <tr>
                                    <td class="py-4" data-label="serial">{{++$key}}</td>
                                    <td class="py-4" data-label="exam">{{$section['name']}}</td>
                                    <td class="py-4" data-label="exam">{{$section['section_order']}}</td>
                                    <td class="py-4" data-label="exam">{{$section['section']}}</td>
                                    <td class="py-4" data-label="exam">{{$section['total_questions']}}</td>
                                    <td class="py-4" data-label="exam">{{$section['total_duration']}}</td>
                                    <td class="py-4" data-label="exam">{{$section['total_marks']}}</td>
                                    <td class="py-4" data-label="actions" class="text-center">
                                    <svg class="cursor-pointer delete_section" data-id="{{$section['id']}}" fill="#ff0000" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 24 24" width="24px" height="24px"><path d="M 10 2 L 9 3 L 3 3 L 3 5 L 21 5 L 21 3 L 15 3 L 14 2 L 10 2 z M 4.3652344 7 L 6.0683594 22 L 17.931641 22 L 19.634766 7 L 4.3652344 7 z"/></svg>
                                    </td>
                                </tr>
                            @endforeach 
                        @else
                            <tr id="noSection">
                                <td class="text-center py-4" colspan="8">
                                    <img src="{{url('images/no_record_found.png')}}" width="200" height="auto" alt="no records found">
                                    <h2 class="text-center text-dark h5 my-1">No Records Found</h2>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

    </section>

    @include('parentsidebar.sidebarending')
    <script>
        $(document).ready(function() {
            let examId = {!! str_replace("'", "\'", json_encode($exam['id'])) !!};
            let autoDuration = {!! str_replace("'", "\'", json_encode($exam['settings']['auto_duration'])) !!};
            let autoGrading = {!! str_replace("'", "\'", json_encode($exam['settings']['auto_grading'])) !!};
            let enableSectionCutoff = {!! str_replace("'", "\'", json_encode($exam['settings']['enable_section_cutoff'])) !!};        
            let enableNegativeMarking = {!! str_replace("'", "\'", json_encode($exam['settings']['enable_negative_marking'])) !!};        
       
            // section drop down  
            $("#section").keyup(function(){
                $("#sectionDropdown").empty();
                let query = $("#section").val();
                let queryLen = $("#section").val().length;
                if(queryLen > 0){
                    $.ajax({
                        type: 'GET',
                        url: '/admin/search_sections',
                        data: {
                            query: query,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(data) {
                            if(data.sections.length > 0){
                                data.sections.forEach(function(section) {
                                    $("#sectionDropdown").append('<li><a class="py-2 px-3 border-bottom dropdown-item cursor-pointer select_section" data-id="'+section.id+'">'+section.name+'</a></li>');
                                });
                            } else {
                                $("#sectionDropdown").append('<li><a class="py-2 px-3 border-bottom dropdown-item text-center text-danger">No record found.</a></li>');
                            }
                        },
                        error: function(data, textStatus, errorThrown) {
                            console.log(textStatus);
                            var obj = data.responseJSON.errors;
                            let formError = obj[Object.keys(obj)[0]][0];
                            $("#SectionFormError").text(formError);
                        },
                    });
                } else {
                    $("#sectionDropdown").append('<li><a class="py-2 px-3 border-bottom dropdown-item text-center text-muted">Start typing to search.</a></li>');
                    $("#section").val('');
                    $("#section").attr('data-id','')
                }
            });
            // select section 
            $(document).on('click', '.select_section', function(){ 
                let id = $(this).data('id');
                let name = $(this).text().trim();
                $("#section").val(name);
                $("#section").attr('data-id', id)
            }); 
            // create section 
            $("#createSection").click(function(){
                let title = $("#title").val();
                let section = $("#section").attr("data-id");
                let section_name = $("#section").val();
                let sectionOrder = $("#sectionOrder").val();
                let negativeMarks = $("#negativeMarks").val()?$("#negativeMarks").val():null;
                let sectionCutoff = $("#sectionCutoff").val()?$("#sectionCutoff").val():null;
                let totalDuration = $("#totalDuration").val()?$("#totalDuration").val():null;
                let correctMarks = $("#pointsCA").val()?$("#pointsCA").val():null;
                let negativeMarkingType = $("#negativeMarkingType").val()?$("#negativeMarkingType").val():'fixed';
                if(title){
                    if(section){
                        if(sectionOrder){
                            if(enableNegativeMarking == true && !negativeMarks){
                                $("#SectionFormError").text("Negative marks field is required when negative marking is enabled");
                            } else {
                                if(enableSectionCutoff == true && !sectionCutoff){
                                    $("#SectionFormError").text("Section cutoff field is required when section cutoff is enabled");
                                } else {
                                    if(autoDuration == false && !totalDuration){
                                        $("#SectionFormError").text("Total duration field is required when auto duration is enabled");
                                    } else {
                                        if(autoGrading == false && !correctMarks){
                                            $("#SectionFormError").text("Correct marks field is required when auto grading is enabled");
                                        } else {
                                            $.ajax({
                                                type: "POST",
                                                url: '/admin/exams/'+examId+'/sections',
                                                data: {
                                                    name: title,
                                                    section_id: section,
                                                    section_order: sectionOrder,
                                                    total_duration: totalDuration,
                                                    auto_duration: autoDuration,
                                                    auto_grading: autoGrading,
                                                    enable_negative_marking: enableNegativeMarking,
                                                    enable_section_cutoff: enableSectionCutoff,
                                                    correct_marks: correctMarks,
                                                    negative_marking_type: negativeMarkingType,
                                                    negative_marks: negativeMarks,
                                                    section_cutoff: sectionCutoff,
                                                    section_name: section_name,
                                                    _token: '{{ csrf_token() }}'
                                                },
                                                success: function(data) {
                                                    let sNo = $("#examSectionsTable").find("tr").last().find("td").first().text()?parseInt($("#examSectionsTable").find("tr").last().find("td").first().text())+1:1;
                                                    let serial = '<td>'+sNo+'</td>';
                                                    let name = '<td>'+data.section.name+'</td>';
                                                    let order = '<td>'+data.section.section_order+'</td>';
                                                    let section = '<td>'+data.section_name+'</td>';
                                                    let total_questions = '<td>'+data.total_questions+'</td>';
                                                    let total_duration = '<td>'+data.section.total_duration/60+'</td>';
                                                    let total_marks = '<td>'+data.section.total_marks+'</td>';
                                                    let action = '<td class="text-center"><svg class="cursor-pointer delete_section" data-id="'+data.section.id+'" fill="#ff0000" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24px" height="24px"><path d="M 10 2 L 9 3 L 3 3 L 3 5 L 21 5 L 21 3 L 15 3 L 14 2 L 10 2 z M 4.3652344 7 L 6.0683594 22 L 17.931641 22 L 19.634766 7 L 4.3652344 7 z"></path></svg></td>';
                                                    $("#noSection").remove();
                                                    $("#examSectionsTable").append('<tr>'+serial+name+order+section+total_questions+total_duration+total_marks+action+'</tr>')
                                                    $("#closeSection").click();
                                                },
                                                error: function(data, textStatus, errorThrown) {
                                                    console.log(textStatus);
                                                    console.log(data);
                                                },
                                            });
                                        }
                                    }
                                }
                            }
                        } else {
                            $("#SectionFormError").text("Section order is required. please enter section order");
                        }
                    } else {
                        $("#SectionFormError").text("Please select a section from the dropdown list");
                    }
                } else {
                    $("#SectionFormError").text("Display name is required. please enter display name");
                }
            });
            // form error 
            $('#title, #section, #sectionOrder, #negativeMarks, #sectionCutoff, #totalDuration, #pointsCA').on('keyup', function() {
                $("#SectionFormError").text("");
            });
            // radio selector 
            $(".radio_selector").click(function(){
                $(this).addClass('active').siblings().removeClass('active');
                var option = $(this).hasClass("yes_selector")?'fixed':'percentage';
                $(this).siblings(".inp").val(option);
                if(option == 'fixed'){
                    $("#negativeMarks").attr("placeholder","Enter Number");
                } else {
                    $("#negativeMarks").attr("placeholder","Enter Percentage");
                }
            });
            // show tool tip  mouseover
            $(".show_tooltip").mouseover(function(){
                $(this).siblings(".custom-tooltip").removeClass('d-none');
            });
            // show tool tip  mouseout
            $(".show_tooltip").mouseout(function(){
                $(this).siblings(".custom-tooltip").addClass('d-none');
            });
            // delete section 
            $(document).on('click', '.delete_section', function(){ 
                let id = $(this).data('id');
                let _this = $(this);
                $.ajax({
                    type: "DELETE",
                    url: '/admin/exams/'+examId+'/sections/'+id,
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        $("#formMessage").empty();
                        if(data.success){
                            $("#formMessage").append('<div class="alert alert-warning text-black my-4">'+data.message+'</div>');
                            _this.parents("tr").remove();
                            if($("#examSectionsTable").find("tr").length <= 0){
                                $("#examSectionsTable").append('<tr id="noSection"><td class="text-center text-danger" colspan="8">No Records Found</td></tr>')
                            }
                        } else {
                            $("#formMessage").append('<div class="alert alert-danger my-4">'+data.message+'</div>');
                        }
                    },
                    error: function(data, textStatus, errorThrown) {
                        console.log(textStatus);
                        console.log(data);
                    },
                });
            }); 
            // ready end 
        });
    </script>

</body>

</html>
