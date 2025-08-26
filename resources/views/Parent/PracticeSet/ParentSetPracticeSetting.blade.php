<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Parent Set Practises Settings</title>
    <!-- rel icon -->
    <link rel="icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}">
    <meta name="description" content="{{ app(\App\Settings\SiteSettings::class)->seo_description }}">
    <meta name="author" content="{{ app(\App\Settings\SiteSettings::class)->app_name }}">
    <style>
       body {
        background-color: #333;
        color: #aaa;
        font-family: "Josefin Sans";
        }
        .is__past__date{
            color: #bbbbbb !important;
            cursor: not-allowed !important;
        }
        .calendar {
        width: 350px;
        margin: 50px auto 0;
        -webkit-user-select: none;
        }

        .calendar__month {
        font-size: 20px;
        font-weight: 800;
        padding: 10px 0;
        width: 100%;
        position: relative;
        }

        .cal-month__previous,
        .cal-month__next {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
        width: 30px;
        /* height: 30px; */
        text-align: center;
        }
        /* .cal-month__previous:hover,
        .cal-month__next:hover {
        background-color: #42A5F5;
        box-shadow: 0 5px 5px -5px rgba(0, 0, 0, 0.75);
        border-radius: 50%;
        font-weight: 800;
        color: #111;
        } */

        .cal-month__next {
        right: 0;
        }

        .cal-month__current {
        text-align: center;
        color: #333333;
        }

        .cal-head__day,
        .cal-body__day {
        display: inline-block;
        width: 50px;
        height: 50px;
        float: left;
        }

        .cal-body__week,
        .calendar__head {
        display: block;
        height: 50px;
        width: 350px;
        }

        .calendar__head {
        line-height: 50px;
        position: relative;
        }
        .calendar__head:after {
        content: " ";
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 1px;
        background-color: #90CAF9;
        }

        .cal-body__day {
        color: #777;
        line-height: 50px;
        text-align: center;
        cursor: pointer;
        }

        /* .cal-day__month--current {
        color: #e1e1e1;
        } */

        .cal-day__day--today {
        font-weight: 800;
        color: #2196f3;
        }

        .cal-day__day--selected {
        background-color: #006ae7;
        box-shadow: 0 5px 10px -5px rgba(0, 0, 0, 0.75);
        border-radius: 50%;
        color: #fff;
        }
        
        .btn_set_practice {
            background: linear-gradient(#2a86f3, #006ae8);
        }
    </style>
</head>

<body>
    @include('sidebar')
    @include('header')


    <div class="container bg-white w-100 h-75 py-4 shadow-sm rounded-3 mx-auto" style="min-width:375px">
        <div class="row m-0 justify-content-evenly">
            <div class="col-lg-5 col-md-6 col-sm-12 col-12 py-3">
                <div class="calendar">
                    <div class="calendar__month">
                        <div class="cal-month__previous">
                            <svg height="30px" width="30px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
                                viewBox="0 0 512 512" xml:space="preserve">
                                <circle style="fill:#006ae7;" cx="256" cy="256" r="256"/>
                                <path style="fill:#006ae7;" d="M494.98,347.929L385.812,238.761l-120.96,24.264l-73.688-73.688l-34.878,81.303l13.153,52.336
                                    l173.777,173.777C412.858,471.516,468.421,416.925,494.98,347.929z"/>
                                <g>
                                    <path style="fill:#fff;" d="M385.812,238.761H197.358v-36.202c0-6.606-3.775-12.631-9.719-15.513
                                        c-5.946-2.882-13.012-2.113-18.199,1.979l-67.722,53.441c-4.143,3.269-6.559,8.256-6.559,13.533s2.417,10.264,6.559,13.533
                                        l67.722,53.441c3.101,2.448,6.877,3.706,10.681,3.706c2.557,0,5.129-0.569,7.516-1.726c5.944-2.881,9.719-8.907,9.719-15.513
                                        v-36.202H385.81v-34.476H385.812z"/>
                                </g>
                                <path style="fill:#fff;" d="M95.158,256c0,5.277,2.417,10.264,6.559,13.533l67.722,53.441c3.101,2.448,6.877,3.706,10.681,3.706
                                    c2.557,0,5.129-0.569,7.516-1.726c5.944-2.881,9.719-8.907,9.719-15.513v-36.202H385.81V256H95.158z"/>
                            </svg>
                        </div>
                        <div class="cal-month__current"></div>
                        <div class="cal-month__next">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="30px" height="30px" viewBox="0 0 1000 1000" xml:space="preserve">
                                <rect x="0" y="0" width="100%" height="100%" fill="#ffffff"/>
                                <g transform="matrix(-1.1364 0 0 1.1364 500.0145 500.0145)" id="458203">
                                <g style="" vector-effect="non-scaling-stroke">
                                        <g transform="matrix(1.5625 0 0 1.5625 0 0)" id="Layer_1">
                                <circle style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; is-custom-font: none; font-file-url: none; fill: #006ae7; fill-rule: nonzero; opacity: 1;" cx="0" cy="0" r="256"/>
                                </g>
                                        <g transform="matrix(1.5625 0 0 1.5625 108.8015 136.0078)" id="Layer_1">
                                <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; is-custom-font: none; font-file-url: none; fill: #006ae7; fill-rule: nonzero; opacity: 1;" transform=" translate(-325.633, -343.045)" d="M 494.98 347.929 L 385.812 238.761 l -120.96 24.264 l -73.688 -73.688 l -34.878 81.303 l 13.153 52.336 l 173.777 173.777 C 412.858 471.516 468.421 416.925 494.98 347.929 z" stroke-linecap="round"/>
                                </g>
                                        <g transform="matrix(1.5625 0 0 1.5625 -24.2414 -0.0015)" id="Layer_1">
                                <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; is-custom-font: none; font-file-url: none; fill: #fff; fill-rule: nonzero; opacity: 1;" transform=" translate(-240.4855, -255.999)" d="M 385.812 238.761 H 197.358 v -36.202 c 0 -6.606 -3.775 -12.631 -9.719 -15.513 c -5.946 -2.882 -13.012 -2.113 -18.199 1.979 l -67.722 53.441 c -4.143 3.269 -6.559 8.256 -6.559 13.533 s 2.417 10.264 6.559 13.533 l 67.722 53.441 c 3.101 2.448 6.877 3.706 10.681 3.706 c 2.557 0 5.129 -0.569 7.516 -1.726 c 5.944 -2.881 9.719 -8.907 9.719 -15.513 v -36.202 H 385.81 v -34.476 H 385.812 z" stroke-linecap="round"/>
                                </g>
                                        <g transform="matrix(1.5625 0 0 1.5625 -24.2438 55.2187)" id="Layer_1">
                                <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; is-custom-font: none; font-file-url: none; fill: #fff; fill-rule: nonzero; opacity: 1;" transform=" translate(-240.484, -291.34)" d="M 95.158 256 c 0 5.277 2.417 10.264 6.559 13.533 l 67.722 53.441 c 3.101 2.448 6.877 3.706 10.681 3.706 c 2.557 0 5.129 -0.569 7.516 -1.726 c 5.944 -2.881 9.719 -8.907 9.719 -15.513 v -36.202 H 385.81 V 256 H 95.158 z" stroke-linecap="round"/>
                                </g>
                                </g>
                                </g>
                            </svg>
                        </div>
                    </div>
                    <div class="calendar__head">
                        <div class="cal-head__day"></div>
                        <div class="cal-head__day"></div>
                        <div class="cal-head__day"></div>
                        <div class="cal-head__day"></div>
                        <div class="cal-head__day"></div>
                        <div class="cal-head__day"></div>
                        <div class="cal-head__day"></div>
                    </div>
                    <div class="calendar__body">
                        <div class="cal-body__week">
                        <div class="cal-body__day"></div>
                        <div class="cal-body__day"></div>
                        <div class="cal-body__day"></div>
                        <div class="cal-body__day"></div>
                        <div class="cal-body__day"></div>
                        <div class="cal-body__day"></div>
                        <div class="cal-body__day"></div>
                        </div>
                        <div class="cal-body__week">
                        <div class="cal-body__day"></div>
                        <div class="cal-body__day"></div>
                        <div class="cal-body__day"></div>
                        <div class="cal-body__day"></div>
                        <div class="cal-body__day"></div>
                        <div class="cal-body__day"></div>
                        <div class="cal-body__day"></div>
                        </div>
                        <div class="cal-body__week">
                        <div class="cal-body__day"></div>
                        <div class="cal-body__day"></div>
                        <div class="cal-body__day"></div>
                        <div class="cal-body__day"></div>
                        <div class="cal-body__day"></div>
                        <div class="cal-body__day"></div>
                        <div class="cal-body__day"></div>
                        </div>
                        <div class="cal-body__week">
                        <div class="cal-body__day"></div>
                        <div class="cal-body__day"></div>
                        <div class="cal-body__day"></div>
                        <div class="cal-body__day"></div>
                        <div class="cal-body__day"></div>
                        <div class="cal-body__day"></div>
                        <div class="cal-body__day"></div>
                        </div>
                        <div class="cal-body__week">
                        <div class="cal-body__day"></div>
                        <div class="cal-body__day"></div>
                        <div class="cal-body__day"></div>
                        <div class="cal-body__day"></div>
                        <div class="cal-body__day"></div>
                        <div class="cal-body__day"></div>
                        <div class="cal-body__day"></div>
                        </div>
                        <div class="cal-body__week">
                        <div class="cal-body__day"></div>
                        <div class="cal-body__day"></div>
                        <div class="cal-body__day"></div>
                        <div class="cal-body__day"></div>
                        <div class="cal-body__day"></div>
                        <div class="cal-body__day"></div>
                        <div class="cal-body__day"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12 col-12 py-3">
                <div class="form-group">
                    <div class="input my-3">
                        <label for="title" class="text-dark" style="font-size: 1.2rem; font-weight: 600;">Title
                            <span class="text-danger">*</span></label>
                        <input id="practice_title" type="text" value="{{ $practiceTitle }}"
                            class="form-control py-2 my-2" placeholder="Title">
                    </div>
                    <div class="input my-3">
                        <label for="title" class="text-dark" style="font-size: 1.2rem; font-weight: 600;">Total {{ $total_questions }}
                            Questions <span class="text-danger">*</span></label> <br>
                        <input id="total_questions" type="range" min="0" max="{{ $total_questions }}"
                            step="1" class="border-0 w-75 py-2 my-2" value="0">
                        <div>
                            <span class="text-start"><span id="questSelectedCount">0</span> question selected</span>
                        </div>
                    </div>
                    <div class="text-danger fw-light text-center text-uppercase fs-tiny" id="form_error"></div>
                    <div class="input my-3">
                        <button class="btn btn_set_practice text-white shadow w-100 py-2 fw-semibold formfill text-uppercase">Set Practise</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://momentjs.com/downloads/moment-with-locales.js"></script>

    <script>
        // datepicker start
       class Calendar {
  
        constructor () {
            this.monthDiv = document.querySelector('.cal-month__current')
            this.headDivs = document.querySelectorAll('.cal-head__day')
            this.bodyDivs = document.querySelectorAll('.cal-body__day')
            this.nextDiv = document.querySelector('.cal-month__next')
            this.prevDiv = document.querySelector('.cal-month__previous')
        }
        
        init () {
            moment.locale(window.navigator.userLanguage || window.navigator.language) 
            
            this.month = moment()
            this.today = this.selected = this.month.clone()
            this.weekDays = moment.weekdaysShort(true)
            
            this.headDivs.forEach((day, index) => {
            day.innerText = this.weekDays[index]
            })
            
            this.nextDiv.addEventListener('click', _ => { this.addMonth() })
            this.prevDiv.addEventListener('click', _ => { this.removeMonth() })
            
            this.bodyDivs.forEach(day => {
            day.addEventListener('click', e => {
                const date = +e.target.innerHTML < 10 ? `0${e.target.innerHTML}` : e.target.innerHTML

                if (e.target.classList.contains('cal-day__month--next')) {
                this.selected = moment(`${this.month.add(1, 'month').format('YYYY-MM')}-${date}`)
                } else if (e.target.classList.contains('cal-day__month--previous')) {
                this.selected = moment(`${this.month.subtract(1, 'month').format('YYYY-MM')}-${date}`)
                } else {
                this.selected = moment(`${this.month.format('YYYY-MM')}-${date}`)
                }

                this.update()
            })
            })
            
            this.update()
        }
        
        update () {
            this.calendarDays = {
            first: this.month.clone().startOf('month').startOf('week').date(),
            last: this.month.clone().endOf('month').date()
            }
            
            this.monthDays = {
            lastPrevious: this.month.clone().subtract(1,'months').endOf('month').date(),
            lastCurrent: this.month.clone().endOf('month').date()
            }
            
            this.monthString = this.month.clone().format('MMMM YYYY')
            
            this.draw()
        }
        
        addMonth () {
            this.month.add(1, 'month')
            
            this.update()
        }
        
        removeMonth () {
            this.month.subtract(1, 'month')
            
            this.update()
        }
        
        draw () {
            const nowDate = this.today.clone().format('DD MMMM YYYY');
            const monthArr = ["January","February","March","April","May","June","July","August","September","October","November","December"];
            this.monthDiv.innerText = this.monthString
        
            let index = 0

            if (this.calendarDays.first > 1) {
                for (let day = this.calendarDays.first; day <= this.monthDays.lastPrevious; index ++) {

                    let funcDay = day++
                    let funcMonth = monthArr[parseInt(this.month.clone().format('MM')) - 2];
                    let funcDate;
                    if(funcMonth != undefined){
                        funcDate = funcDay + ' ' + funcMonth + ' ' + this.month.clone().format('YYYY')
                    } else{
                        funcDate = funcDay + ' ' +  monthArr[11] + ' ' + (parseInt(this.month.clone().format('YYYY'))-1)
                    }
                    let checkPastDate =  calculatePastDate(funcDate);
                    if(checkPastDate == false){
                        this.bodyDivs[index].classList.add('is__past__date');
                    } else{
                        this.bodyDivs[index].classList.remove('is__past__date');
                    }
                    
                    
                    this.bodyDivs[index].innerText = funcDay

                    this.cleanCssClasses(false, index)

                    this.bodyDivs[index].classList.add('cal-day__month--previous')
                } 
            }

            let isNextMonth = false
            for (let day = 1; index <= this.bodyDivs.length - 1; index ++) {
            if (day > this.monthDays.lastCurrent) {
                day = 1
                isNextMonth = true
            }


            this.cleanCssClasses(true, index);


            if (!isNextMonth) {
                let funcDate = day + ' ' + this.monthString;
                let checkPastDate =  calculatePastDate(funcDate);
                if (day === this.today.date() && this.today.isSame(this.month, 'day')) {
                this.bodyDivs[index].classList.add('cal-day__day--today') 
                }

                if (day === this.selected.date() && this.selected.isSame(this.month, 'month') && checkPastDate) {
                    this.bodyDivs[index].classList.add('cal-day__day--selected'); 
                }
                if(checkPastDate == false){
                    this.bodyDivs[index].classList.add('is__past__date');
                } else {
                    this.bodyDivs[index].classList.remove('is__past__date');
                }         
                this.bodyDivs[index].classList.add('cal-day__month--current');
            } else {
                // this.month.clone().format('YYYY')
                // console.log(day);
                let funcMonth = monthArr[parseInt(this.month.clone().format('MM'))];
                let funcDate;
                if(funcMonth == undefined){
                    funcDate = day + ' ' +  monthArr[0] + ' ' + (parseInt(this.month.clone().format('YYYY'))+1)
                } else{
                    funcDate = day + ' ' +  funcMonth + ' ' + parseInt(this.month.clone().format('YYYY'))
                }
                let checkPastDate =  calculatePastDate(funcDate);
                if(checkPastDate == false){
                    this.bodyDivs[index].classList.add('is__past__date');
                } else {
                    this.bodyDivs[index].classList.remove('is__past__date');
                }  
                this.bodyDivs[index].classList.add('cal-day__month--next');
            }

            this.bodyDivs[index].innerText = day++
            }
            function calculatePastDate(date){
                let newDate = Date.parse(date);
                let newNowDate = Date.parse(nowDate);
                if(newDate >= newNowDate){
                    // console.log(newDate + " is greater than or equal to today");
                    return true
                } else{
                    // console.log(newDate + " is less than today");
                    return false
                }
            }
        }

        
        cleanCssClasses (selected, index) {
            this.bodyDivs[index].classList.contains('cal-day__month--next') && 
            this.bodyDivs[index].classList.remove('cal-day__month--next')
            this.bodyDivs[index].classList.contains('cal-day__month--previous') && 
            this.bodyDivs[index].classList.remove('cal-day__month--previous')
            this.bodyDivs[index].classList.contains('cal-day__month--current') &&
            this.bodyDivs[index].classList.remove('cal-day__month--current')
            this.bodyDivs[index].classList.contains('cal-day__day--today') && 
            this.bodyDivs[index].classList.remove('cal-day__day--today')
            if (selected) {
            this.bodyDivs[index].classList.contains('cal-day__day--selected') && 
                this.bodyDivs[index].classList.remove('cal-day__day--selected') 
            }
        }
        }

        const cal = new Calendar()
        cal.init()
        // datepicker end
        $("#practice_title").keyup(function(){
            if($(this).val().length > 0) {
                form_error('');
            }
        });
        $('#total_questions').change( function() { 
            $("#questSelectedCount").text($(this).val());
            let total_questions = $(this).val();
            if(total_questions > 0){
                form_error('');
            }
        });
        $('#total_questions').change( function() { 
            $("#questSelectedCount").text($(this).val());
            let total_questions = $(this).val();
            if(total_questions > 0){
                form_error('');
            }
        });
        $(".cal-body__day").click(function(){
            form_error('');   
        })
        $('.formfill').click(function() {
            let total_questions = $('#total_questions').val();
            if(total_questions > 0){
                let month = $(".cal-month__current").text();
                let day = $(".cal-day__day--selected").text();
                if(!day){
                    form_error('Please select Due Date'); 
                } else {
                    form_error('');
                    let checkPastDate =  calculatePastDate(day+' '+month);                    
                    if(checkPastDate.success){
                        var title = $("#practice_title").val().trim();
                        if(!title){
                            form_error('Please enter a title')
                        } else{
                            let custom = {!! str_replace("'", "\'", json_encode($custom)) !!};
                            let practiceId = {{ $practiceId }}; 
                            var location = window.location.href;                           
                            $.ajax({
                                type: "POST",
                                url: '/parent-set/add/practice',
                                data : {
                                    custom: custom,
                                    title: title,
                                    practiceId: practiceId.toString(),
                                    due_date: checkPastDate.date,
                                    total_questions: parseInt(total_questions),
                                    _token: '{{ csrf_token() }}'
                                },
                                success: function(data, textStatus, xhr) {
                                    if(data.success){
                                        window.location.href = "/parent-set/section?success=true";
                                    }
                                },
                                error: function(data, textStatus, errorThrown) {
                                    console.log(data);
                                    
                                },
                            });
                        }
                    } else {
                        form_error('Please select a valid date')
                    }
                }
            }
            else{
                form_error('Please select Questions');
            }
        });
        function form_error(text){
            $("#form_error").text(text)
        }
        function calculatePastDate(date){
            var today = moment();
            var currentDate = today.format('DD MMM YYYY');
            let newDate = Date.parse(date);
            let newNowDate = Date.parse(currentDate);
            var i;
            if(newDate >= newNowDate){
                i = {
                    date: date,
                    success: true
                }
            } else{
                i = {
                    date: date,
                    success: false
                }
            }
            return i;
        }
        // let custom = {!! str_replace("'", "\'", json_encode($custom)) !!};
        // $('.formfill').click(function() {
        //     var today = "2023-04-28T10:06:05.230Z";
        //     var practice_title = $("#practice_title").val();
        //     var total_questions = $("#total_questions").val();
        //     var practiceId = {{ $practiceId }};
        //     $.ajax({
        //         type: "POST",
        //         url: '/parent-set/add/practice',
        //         data: {
        //             custom: custom,
        //             title: practice_title,
        //             practiceId: practiceId.toString(),
        //             due_date: today,
        //             total_questions: parseInt(total_questions),
        //             _token: '{{ csrf_token() }}'
        //         },
        //         success: function(data) {
        //             // window.location.href = "/parent-set/section";
        //         },
        //         error: function(data, textStatus, errorThrown) {
        //         },
        //     });

        // });
    </script>

</body>

</html>
