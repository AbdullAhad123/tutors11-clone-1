<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard -     
      @if(Auth::user()->hasRole('instructor'))
        Instructor Portal
      @elseif(Auth::user()->hasRole('admin'))
          Admin Portal
      @endif</title>
    <!-- rel icon -->
    <link rel="icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}">
    <meta name="description" content="{{ app(\App\Settings\SiteSettings::class)->seo_description }}">
    <meta name="author" content="{{ app(\App\Settings\SiteSettings::class)->app_name }}">

    <style>
      .user_avater {
        background-size: cover;
        background-position: center;
      }

      .user_online_circle {
        width: 10px;
        height: 10px;
      }

      .online_users_wrap {
        max-height: 447px;
      }

      .header_section {
        height: auto;
        width: auto;
        background: #0067e5 !important;
        /* background: linear-gradient( 286deg , #003cc4 , #008eff) !important; */
        border-radius: 2rem;
      }

      .student_icons {
        height: 50px;
        width: 50px;
        background: #ff3232;
      }

      .teacher_icons {
        height: 50px;
        width: 50px;
        background: #ff9c00
      }

      @media (max-width: 768px) {
        .header_image {
          display: none !important
        }
      }

      .quick_info_cards {
        height: auto;
        width: auto;
        box-shadow: 0px 0px 4px 0px #00000017;
        border-radius: 0.9rem;
        transition: 0.25s
      }

      .quick_info_cards:hover {
        scale: 1.02;
        box-shadow: -1px 7px 5px 0px #00000024 !important
      }

      .w_120 {
        min-width: 120px !important;
      }

      .w_140 {
        min-width: 140px !important;
      }

      .w_250 {
        min-width: 250px !important;
      }

      .w_180 {
        min-width: 180px !important;
      }

      .user_photo {
        height: 40px;
        width: 40px;
        border: 1px solid #ffffff !important;
        outline: 1px solid #00ff2a;
      }

      .bg_label_online {
        background: #c2ffcc !important;
        color: #00c61f !important;
      }

      .documentation_overview {
        background: linear-gradient(315deg, #c38529, #d3a765);
      }

      .settings_section {
        background: linear-gradient(49deg, #198d5d, #00d47c);
        border-radius: 1.3rem
      }

      .docs_navigate_section {
        min-height: 300px;
        max-height: fit-content;
        width: auto;
        background: linear-gradient(108deg, #ef8f00, #ffaf37);
        border-radius: 1rem
      }

      .arrow_icon_link,
      .arrow_icon_link i.bx {
        transition: 0.2s
      }

      .arrow_icon_link:hover.arrow_icon_link i.bx {
        transform: translateX(3px)
      }

      .quick_links_section {
        min-height: 300px;
        max-height: fit-content;
        width: auto;
        background: linear-gradient(281deg, #0080ef, #0683ad);
        border-radius: 1rem
      }

      .docs_quick_links {
        color: #ffffff80;
        transition: 0.2s
      }

      .docs_quick_links:hover {
        color: #ffffff !important;
      }

      #daily_visit_chart {
        width: 100%;
        height: 400px !important;
        max-width: 100%
      }

      #instructor_progress {
        width: 100%;
        height: 500px;
      }

      .user_box {
        background: white !important;
        transition: 0.2s;
        box-shadow: 0px 0px 4px 0px #00000017;
      }

      .user_box:hover {
        scale: 1.04;
        box-shadow: 1px 6px 7px 0px #0000001f !important
      }
      .online_users_wrap {
        height: 400px !important;
      }
    </style>
</head>
<body>

    @include('sidebar')
    @include('header')

    {{--<div class="col-lg-12 mt-5">
        <div class="choose_child px-3 mt-2">
          <!-- row strat -->
          <div class="row">
            <div class="col-lg-6 col-12">
              <div class="row m-0 justify-content-center">
                @foreach($stats as $stat)
                  <div class="col-lg-6 col-md-4 col-sm-6 col-12 mb-4">
                    <div class="bg-white px-2 py-3 syllabus_customized_box shadow-lg">
                      <div class="text-center">
                        <h6 class="mt-2">{{ $stat['title'] }}</h6>
                      </div>
                      <div class="row text-center py-2">
                        <h3 class="text-primary font_bold">{{ $stat['count'] }}</h3>
                      </div>
                    </div>
                  </div>
                @endforeach
                </div>
            </div>
            <div class="col-lg-6 col-12 p-2 pb-4 pt-0">
              <div class="bg-white p-3 rounded shadow-lg h-100 overflow-auto online_users_wrap">
                <h4 class="text-dark font_bold mt-2 px-2">Online Users</h4>
              </div>
            </div>
          </div>
          <!-- row end -->

          <div class="row m-0">
            <div class="col-lg-6 col-md-6 col-sm-12 col-12 p-2">
              <div class="bg-primary bg-gradient p-4 shadow-lg">
                <h5 class="text-white font_bold my-3">To Teach To Learn Twice Over.</h5>
                <p class="text-white small my-3">
                  To get most of your account, checkout our docs to understand how this app can serve
                  you and your team.
                </p>
                <div class="col-12 text-end mb-4 mt-2">
                  <a href="/admin/docs" target="_blank">
                    <button class="btn btn-light btn-sm text-primary px-2 py-1 my-2 mb-3">ViewDocs</button>
                  </a>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-12 p-2">
              <div class="bg-light p-3 shadow-lg rounded-5">
                <h6 class="text_black font_bold mt-2 px-2">QUICK LINKS</h6>
                <div class="row m-0">
                  <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                    <ul class="list-unstyled pt-1">
                      <li class="my-1"><a href="/admin/quizzes" class="text-primary links">New Quiz Schedule</a></li>
                      <li class="my-1"><a href="/admin/quizzes/create" class="text-primary">Create New Quiz</a></li>
                      <li class="my-1"><a href="/admin/practice-sets/create" class="text-primary">Create Practise Set</a></li>
                      <li class="my-1"><a href="/admin/quizzes" class="text-primary">View Quizzes</a></li>
                      <li class="my-1"><a href="/admin/practice-sets" class="text-primary">View Practise Sets</a></li>
                    </ul>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                    <ul class="list-unstyled pt-1">
                      <li class="my-1"><a href="/admin/questions" class="text-primary">Create New Question</a></li>
                      <li class="my-1"><a href="/admin/import-questions" class="text-primary">Import Question</a></li>
                      <li class="my-1"><a href="/admin/comprehensions" class="text-primary">Create New Comprehension</a></li>
                      <li class="my-1"><a href="/admin/skills" class="text-primary">Create New Topic</a></li>
                      <li class="my-1"><a href="/admin/topics" class="text-primary">Create New Sub-topic</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
    </div>--}}

    <section class="container-p-x my-5 py-4">

      <section class="header_section p-4 rounded-4 pb-2">
          <div class="row align-items-center m-0">
            <div class="col-lg-6 col-md-6 col-sm-12 col-12 my-2">
              <h1 class="mb-2 text-white">Welcome Admin</h1>
              <p class="fs-5 text-white">Track, Manage and Update data on the website. You are in control now!</p>
              <p class="mt-3 text-white">Last 30 days active users:</p>
              <div class="d-flex flex-wrap align-items-center mb-3">
                <div class="active_students_container my-2 me-5 d-flex align-items-center">
                  <div class="student_icons me-2 rounded-circle border d-inline-flex align-items-center justify-content-center">
                    <img src="{{url('images/graduation_icon.png')}}" height="30" width="30" alt="graduation icon">
                  </div>
                  <div>
                    <h2 class="h4 fw-medium text-white my-1">{{ $total_students }}</h2>
                    <p class="fw-normal text-white my-1">Active Students</p>
                  </div>
                </div>
                <div class="active_teachers_container my-2 me-5 d-flex align-items-center">
                  <div class="teacher_icons me-2 rounded-circle border d-inline-flex align-items-center justify-content-center">                    
                    <img src="{{url('images/teacher_icon.png')}}" height="30" width="30" alt="teacher icon">
                  </div>
                  <div>
                    <h2 class="h4 fw-medium text-white my-1">{{ $total_parents }}</h2>
                    <p class="fw-normal text-white my-1">Active Parents</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-lg-6 col-md-6 col-sm-12 my-2 text-center">
              <img src="{{url('images/admin_header_bg.png')}}" height="auto" width="350" class="header_image" alt="admin isometric">
            </div>
          </div>
      </section>

      <section class="quick_overview my-5">
          <h2 class="text-dark my-2">Quick Overview</h2>
          <div class="row my-4 mb-5 align-items-center">
            @foreach($stats as $stat)
              <div class="col-lg-6 col-md-6 col-sm-12 col-12 my-2">
                <a href="/admin/{{$stat['slug']}}" class="text-decoration-none">
                  <div class="quick_info_cards d-flex w-100 align-items-center justify-content-between p-4 bg-white">
                    <div class="d-flex align-items-center">
                      <img src="{{url('images/' . $stat['key'] . '.png')}}" width="40" height="40" alt="{{$stat['title']}}">
                      <div class="ms-3">
                        <h2 class="h3 text-dark m-0">{{$stat['count']}}</h2>
                        <p class="text-dark fw-normal">{{$stat['title']}}</p>
                      </div>
                    </div>
                    <button class="bg-transparent border-0 btn btn-sm shadow-none"><i class="bx bx-right-arrow-alt text-dark fs-3"></i></button>
                  </div>
                </a>
              </div>
              @endforeach
          </div>
      </section>

      <section class="settings_section my-5 shadow p-4">
        <div class="row m-0 align-items-center">
          <div class="col-lg-6 col-md-6 col-sm-12 col-12 my-2">
            <h2 class="text-white my-2">Website Management</h2>
            <p class="text-white my-2 mb-4 fs-5">Simplify website management: effortlessly update settings, refine data, and adjust pricing plans. Enhance the user experience with streamlined control over crucial aspects of your site.</p>
            <button onclick="document.location.href='/admin/general-settings'" class="btn btn-outline-light px-3 p-2">Manage <i class='bx bx-right-arrow-alt'></i></button>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-12 col-12 my-2 text-center">
            <img src="{{url('images/admin_settings.png')}}" width="500" height="auto" class="header_image" alt="admin settings illustration">
          </div>
        </div>
      </section>

      <section class="more_info_section my-5">
          <div class="row align-items-center justify-content-centr">
            <div class="col-lg-6 col-12 my-3">
              <div class="online rounded-3 shadow p-4 bg-white">
                <div class="d-flex justify-content-between align-items-center my-2">
                  <h2 class="text-dark m-0">Online Users</h2>
                  <a class="text-primary m-0 text-decoration-none small d-flex align-items-center" href="/admin/users">View All <i class="bx bx-right-arrow-alt"></i></a>
                </div>
                <p class="text-dark fs-5">Monitor real-time online users data on admin portal.</p>
                <div class="overflow-auto online_users_wrap bg-body p-4 my-4 rounded-3"></div>
              </div>
            </div>
            <div class="col-lg-6 col-12 my-3">
              <div class="bg-white rounded-3 shadow p-4">
                <h2 class="text-dark my-2">User Joining Report</h2>
                <p class="text-dark fs-5">Track daily summary of new user sign-ups</p>
                <div id="daily_visit_chart" class="my-4"></div>
              </div>
            </div>
          </div>
      </section>

      <section class="docs_section my-5">
        <div class="row align-items-center">
          <div class="col-lg-6 col-md-6 col-sm-12 col-12 my-2">
            <div class="docs_navigate_section p-4 py-5 shadow d-flex align-items-center">
              <div class="w-100">  
                <h2 class="text-white my-2 fw-semibold">Portal Management Basics</h2>
                <p class="text-white fs-5 my-2 mb-3">Unlock the full potential of your account by delving into our documentation, understanding how this app can best serve you and your team.</p>
                <a href="/admin/docs" target="_blank" class="arrow_icon_link fw-normal text-white mb-2">Start Reading <i class="bx bx-right-arrow-alt"></i></a>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-12 col-12 my-2">
            <div class="quick_links_section p-4 shadow bg-white rounded-5 d-flex align-items-center">
              <div class="w-100">
                <h2 class="text-white my-2 fw-semibold ">Quick Links</h2>
                <div class="d-flex flex-wrap align-items-center my-3 mb-0 justify-content-between">
                  <ul class="list-unstyled p-0">
                    <li class="my-1"><a href="/admin/quizzes" class="text-white docs_quick_links">New Quiz Schedule</a></li>
                    <li class="my-1"><a href="/admin/quizzes/create" class="text-white docs_quick_links">Create New Quiz</a></li>
                    <li class="my-1"><a href="/admin/practice-sets/create" class="text-white docs_quick_links">Create Question Set</a></li>
                  
                  </ul>
                  <ul class="list-unstyled p-0">
                    <li class="my-1"><a href="/admin/quizzes" class="text-white docs_quick_links">View Quizzes</a></li>
                    <li class="my-1"><a href="/admin/practice-sets" class="text-white docs_quick_links">View Question Sets</a></li>
                    <li class="my-1"><a href="/admin/questions" class="text-white docs_quick_links">Create New Question</a></li>
                  </ul>
                  <ul class="list-unstyled p-0">
                    <li class="my-1"><a href="/admin/comprehensions" class="text-white docs_quick_links">Create New Comprehension</a></li>
                    <li class="my-1"><a href="/admin/skills" class="text-white docs_quick_links">Create New Topic</a></li>
                    <li class="my-1"><a href="/admin/topics" class="text-white docs_quick_links">Create New Sub-topic</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="progress_bar bg-white shadow p-5 my-4" style="border-radius:2rem">
        <h2 class="text-center text-dark">Data Team Progress</h2>
        <div id="instructor_progress" ></div>
      </section>
    
    </section>

    @include('parentsidebar.sidebarending')
    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>

    <script>
      am5.ready(function() {
        var root = am5.Root.new("daily_visit_chart");
    
        // Apply themes
        root.setThemes([ am5themes_Animated.new(root) ]);
    
        // Create XY chart
        var chart = root.container.children.push(
          am5xy.XYChart.new(root, {
            panX: true,
            panY: true,
            wheelX: "panX",
            wheelY: "zoomX",
            pinchZoomX: true,
            paddingLeft: 0
          })
        );
    
        // Add cursor
        var cursor = chart.set("cursor", am5xy.XYCursor.new(root, {}));
        cursor.lineX.set("forceHidden", true);
        cursor.lineY.set("forceHidden", true);
    
        // X Axis (Date Axis)
        var xAxis = chart.xAxes.push(
          am5xy.DateAxis.new(root, {
            baseInterval: { timeUnit: "day", count: 1 },
            renderer: am5xy.AxisRendererX.new(root, {
              minorGridEnabled: true,
              minGridDistance: 90
            })
          })
        );
    
        // Y Axis (Value Axis)
        var yAxis = chart.yAxes.push(
          am5xy.ValueAxis.new(root, {
            renderer: am5xy.AxisRendererY.new(root, {})
          })
        );
    
        // Line series
        var series = chart.series.push(
          am5xy.LineSeries.new(root, {
            name: "Series",
            xAxis: xAxis,
            yAxis: yAxis,
            valueYField: "value",
            valueXField: "date",
            tooltip: am5.Tooltip.new(root, {
              labelText: "{valueY}"
            })
          })
        );
    
        // Set series fills
        series.fills.template.setAll({
          fillOpacity: 0.2,
          visible: true
        });
    
        // Ensure bullets and lines are visible during zoom
        series.set("maskBullets", false);
    
        // Fetch data using AJAX
        var total_days = 300;
        var chart_data = [];
    
        $.ajax({
          type: "POST",
          url: "{{ route('user_chart_report') }}",
          data: {
            days: total_days,
            _token: '{{ csrf_token() }}'
          },
          success: function(data) {
            chart_data = data;
            processChartData(chart_data);
          },
          error: function(data, textStatus, errorThrown) {
            console.log(textStatus);
          }
        });
    
        // Function to process and set chart data
        function processChartData(data) {
          series.data.setAll(data);
        }
    
        // Animate series and chart
        series.appear(1000);
        chart.appear(1000, 100);
    
      });
    </script>
    

    <script>
      am5.ready(function() {


      // Create root element
      // https://www.amcharts.com/docs/v5/getting-started/#Root_element
      var root = am5.Root.new("instructor_progress");


      // Set themes
      // https://www.amcharts.com/docs/v5/concepts/themes/
      root.setThemes([
        am5themes_Animated.new(root)
      ]);


      // Create chart
      // https://www.amcharts.com/docs/v5/charts/xy-chart/
      var chart = root.container.children.push(am5xy.XYChart.new(root, {
        panX: true,
        panY: true,
        wheelX: "none",
        wheelY: "none",
        paddingLeft: 0
      }));

      // We don't want zoom-out button to appear while animating, so we hide it
      chart.zoomOutButton.set("forceHidden", true);


      // Create axes
      // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
      var xRenderer = am5xy.AxisRendererX.new(root, {
        minGridDistance: 30,
        minorGridEnabled: true
      });
      xRenderer.labels.template.setAll({
        rotation: -90,
        centerY: am5.p50,
        centerX: 0,
        paddingRight: 15
      });
      xRenderer.grid.template.set("visible", false);

      var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
        maxDeviation: 0.3,
        categoryField: "user",
        renderer: xRenderer
      }));

      var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
        maxDeviation: 0.3,
        min: 0,
        renderer: am5xy.AxisRendererY.new(root, {})
      }));


      // Add series
      // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
      var series = chart.series.push(am5xy.ColumnSeries.new(root, {
        name: "Series 1",
        xAxis: xAxis,
        yAxis: yAxis,
        valueYField: "value",
        categoryXField: "user"
      }));

      // Rounded corners for columns
      series.columns.template.setAll({
        cornerRadiusTL: 5,
        cornerRadiusTR: 5,
        strokeOpacity: 0
      });

      // Make each column to be of a different color
      series.columns.template.adapters.add("fill", function (fill, target) {
        return chart.get("colors").getIndex(series.columns.indexOf(target));
      });

      series.columns.template.adapters.add("stroke", function (stroke, target) {
        return chart.get("colors").getIndex(series.columns.indexOf(target));
      });

      // Add Label bullet
      series.bullets.push(function () {
        return am5.Bullet.new(root, {
          locationY: 1,
          sprite: am5.Label.new(root, {
            text: "{valueYWorking.formatNumber('#.')}",
            fill: root.interfaceColors.get("alternativeText"),
            centerY: 0,
            centerX: am5.p50,
            populateText: true
          })
        });
      });


      // Set data

      $.ajax({
        type: "POST",
        url: '/admin/questions/get-questions-counts',
        data: {
            _token: '{{ csrf_token() }}'
        },
        success: function(data) {
            if (data.success) {
              setData(data.data);
            }
        },
        error: function(data, textStatus, errorThrown) {
            console.log(textStatus);
        },
    });

      // var data = [{
      //   "country": "Sumayya",
      //   "value": 2025
      // }, {
      //   "country": "Khalid",
      //   "value": 1882
      // }, {
      //   "country": "Ahad",
      //   "value": 1809
      // }, {
      //   "country": "Namra",
      //   "value": 1322
      // }, {
      //   "country": "Daniyal",
      //   "value": 1122
      // }, {
      //   "country": "Qasim",
      //   "value": 1114
      // }, {
      //   "country": "ayesha",
      //   "value": 984
      // }, {
      //   "country": "Shoul",
      //   "value": 711
      // }, {
      //   "country": "Alisa",
      //   "value": 665
      // }, {
      //   "country": "Samad",
      //   "value": 443
      // }, {
      //   "country": "Affia",
      //   "value": 441
      // }];

      function setData(data) {
        xAxis.data.setAll(data);
        series.data.setAll(data);
      }

      // update data with random values each 1.5 sec
      // setInterval(function () {
      //   updateData();
      // }, 1500)

      // function updateData() {
      //   am5.array.each(series.dataItems, function (dataItem) {
      //     var value = dataItem.get("valueY") + Math.round(Math.random() * 300 - 150);
      //     if (value < 0) {
      //       value = 10;
      //     }
      //     // both valueY and workingValueY should be changed, we only animate workingValueY
      //     dataItem.set("valueY", value);
      //     dataItem.animate({
      //       key: "valueYWorking",
      //       to: value,
      //       duration: 600,
      //       easing: am5.ease.out(am5.ease.cubic)
      //     });
      //   })

      //   sortCategoryAxis();
      // }


      // Get series item by category
      function getSeriesItem(category) {
        for (var i = 0; i < series.dataItems.length; i++) {
          var dataItem = series.dataItems[i];
          if (dataItem.get("categoryX") == category) {
            return dataItem;
          }
        }
      }


      // Axis sorting
      function sortCategoryAxis() {

        // Sort by value
        series.dataItems.sort(function (x, y) {
          return y.get("valueY") - x.get("valueY"); // descending
          //return y.get("valueY") - x.get("valueY"); // ascending
        })

        // Go through each axis item
        am5.array.each(xAxis.dataItems, function (dataItem) {
          // get corresponding series item
          var seriesDataItem = getSeriesItem(dataItem.get("category"));

          if (seriesDataItem) {
            // get index of series data item
            var index = series.dataItems.indexOf(seriesDataItem);
            // calculate delta position
            var deltaPosition = (index - dataItem.get("index", 0)) / series.dataItems.length;
            // set index to be the same as series data item index
            dataItem.set("index", index);
            // set deltaPosition instanlty
            dataItem.set("deltaPosition", -deltaPosition);
            // animate delta position to 0
            dataItem.animate({
              key: "deltaPosition",
              to: 0,
              duration: 1000,
              easing: am5.ease.out(am5.ease.cubic)
            })
          }
        });

        // Sort axis items by index.
        // This changes the order instantly, but as deltaPosition is set,
        // they keep in the same places and then animate to true positions.
        xAxis.dataItems.sort(function (x, y) {
          return x.get("index") - y.get("index");
        });
      }


      // Make stuff animate on load
      // https://www.amcharts.com/docs/v5/concepts/animations/
      series.appear(1000);
      chart.appear(1000, 100);

      }); // end am5.ready()
    </script>
</body>

</html>