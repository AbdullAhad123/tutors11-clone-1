<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Attainments</title>
  <!-- rel icon -->
  <link rel="icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}">
  <meta name="description" content="{{ app(\App\Settings\SiteSettings::class)->seo_description }}">
  <meta name="author" content="{{ app(\App\Settings\SiteSettings::class)->app_name }}">
  <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
  <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
  <script src="https://cdn.amcharts.com/lib/5/radar.js"></script>
  <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
  <style>
    .chartdiv { width: 100%; height: 250px; } .navbar_right_button { font-size: 17px; } .navbar_right_button a { color: #9a65f6; } .warning_alert_message { background: #ecfff0; border: 2px solid #559363; color: #559363; border-radius: 1rem; } .warning_alert_text { color: #559363!important; } /* attainmnet header */ .progress_header { background:linear-gradient(45deg, #7d591a, #edac39); } .progress { border-radius:50%; } .progress-heading { color:#322c75; } .heading_separator { height: 0.4rem; width: 120px; background: var(--portal-secondary); border-radius: 20rem; } .nav-tabs .nav-link{ border: 2px solid #ffffff; } .nav-tabs .nav-link.active{ border: 2px solid #0b54a3 !important; } @media screen and (max-width: 554px) { /* #nav-practice-tab{ margin-top: 40px; } */ } @media (max-width: 375px) { .nav_tab_text { font-size: 4vw !important; } .nav_tab_images { width: 30px !important } } @media (max-width: 300px) { .nav_tab_text { font-size: 3.5vw !important; } .nav_tab_images { width: 25px !important } } @media screen and (max-width: 991px) and (min-width: 381px) { .learning_image{ width: 50%; } } @media screen and (max-width: 380px) { .learning_image{ width: 70%; } } .decor-left { position: relative; top: -2px; display: inline-block; width: 70px; height: 5px; background: transparent; } .decor-left:before, .decor-left:after, .decor-left span { position: absolute; top: 0; bottom: 0; background: #FFA500; content: ""; } .decor-left:before, .decor-left:after{ width: 5px; height: 5px; border-radius: 50%; } .decor-left:before {right: 0;} .decor-left:after {right: 10px;} .decor-left span { left: 0; width: 50px; height: 1px; margin: 2px 0; } .report_serial {max-width: 50px;}
    .w_140 {min-width: 140px}
    .w_300 {min-width: 300px}
    .w_200 {min-width: 200px}
    @media (max-width: 575px) {
      .responsive_image {
        width: 280px !important
      }
    }
  </style>
</head>

<body>
  @include('sidebar')
  @include('header')
  <nav class='mb-4' style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
    aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item fw-light small text-dark">Dashboard</li>
      <li class="breadcrumb-item fw-light small text-dark">Analysis</li>
      <li class="breadcrumb-item fw-light active small text-primary" aria-current="page">Attainments</li>
    </ol>
  </nav>
  <!-- Attainements header -->
  <section class="progress_header p-4 rounded-5">
    <div class="row align-items-center justify-content-center m-0">
      <div class="col-lg-8 col-md-12 col-sm-12 ">
        <h2 class="fw-bold text-white">Milestones and Achievements</h2>
        <p class="text-white fs-6">Discover and celebrate your child's accomplishments! Explore academic successes, creative endeavors, and more in this dedicated space. Your child's journey, their achievements, all in one place.</p>
      </div>
      <div class="col-lg-4 col-md-12 col-sm-12 d-flex justify-content-center">
        <img src="{{url('images\achievment_child.png')}}" width="300" height="300" class="img-fluid"alt="">
      </div>
    </div>
  </section>
  @if ($childName == '')
    <div class="mb-5 my-3 p-3 shadow w-100 warning_alert_message" role="alert">
      <div class="align-items-center d-flex h-100 w-100">
        <i class='bx bx-info-circle bx-flashing fs-3' style='color: #559363'></i>
        <p class="h5 m-0 ms-2 warning_alert_text">The red line represents the average student percentage.</p>
      </div>
    </div>
    <div class="tab-content bg-white my-4 mb-5 shadow" id="nav-tabContent">
      <div class="tab-pane fade show active" id="nav-exam" role="tabpanel" aria-labelledby="nav-exam-tab">
        <div class="chart-container bar-line">
          <canvas id="examBarChart" width="700"></canvas>
        </div>
      </div>
      <div class="tab-pane fade" id="nav-quiz" role="tabpanel" aria-labelledby="nav-quiz-tab">
        <div class="chart-container bar-line">
          <canvas id="quizBarChart" width="700"></canvas>
        </div>
      </div>
      <div class="tab-pane fade" id="nav-practice" role="tabpanel" aria-labelledby="nav-practice-tab">
        <div class="chart-container bar-line">
          <canvas id="practiceBarChart" width="700"></canvas>
        </div>
      </div>
    </div>
  @else
  <p class="my-4 text-danger opacity-75">
    <svg xmlns="http://www.w3.org/2000/svg" width="15.08434" height="25" viewBox="0 0 15.08434 50.52673" creator="Katerina Limpitsouni">
      <path d="M6.82597,43.00961c1.29614,.1767,2.22034,1.152,2.57466,2.36426,.17995,.61566,.20412,1.20299,.02686,1.79945-.15947,.53656-.5373,1.03752-.98907,1.33238-.13456,.08782-.27524,.16455-.41968,.23468-.10404,.05051-.18194,.07931-.37649,.13757-.15606,.04673-.31441,.08194-.47437,.11222-.13672,.02588,.03939,.00091-.09928,.01512-.1003,.01028-.2009,.01768-.30166,.02141-.16405,.00608-.3284,.00299-.49212-.00883-.03576-.00258-.25917-.0271-.13938-.01039-.08731-.01217-.17423-.0287-.26048-.04682-.15978-.03357-.31777-.07579-.47276-.12719-.07117-.0236-.1419-.04894-.21163-.07652,.09286,.03673-.12204-.05665-.16175-.07668-.14368-.07247-.28283-.1539-.41608-.24412-.0292-.01977-.19602-.1483-.115-.08173-.06666-.05477-.13107-.11232-.1933-.17206-.06237-.05987-.12259-.12198-.18007-.18658-.01953-.02195-.13261-.16224-.07034-.07967-.10699-.14184-.19933-.29636-.27895-.45502-.07519-.14985-.08496-.18253-.14036-.37754-.02512-.0884-.04664-.17781-.06424-.26802-.00751-.03852-.01457-.07727-.02028-.1161-.01901-.12931,.00836,.09591-.00205-.03436-.01359-.17005-.01787-.34021-.0089-.51066,.01211-.23001,.00908-.20201,.05798-.4276,.16143-.74467,.50024-1.35894,1.03506-1.88165,.52166-.50985,1.18609-.82013,1.87399-.83749,.96351-.02432,.96721-1.52441,0-1.5-1.94125,.049-3.50448,1.44972-4.17333,3.20858-.67569,1.77686-.16236,3.76916,1.37207,4.90767,1.40558,1.0429,3.39528,1.1638,4.96964,.45817,1.664-.74581,2.55847-2.51727,2.33052-4.30131-.25267-1.97748-1.70872-3.93514-3.78045-4.21758-.40082-.05464-.80521,.09666-.92259,.52383-.09612,.3498,.11986,.86752,.52383,.92259h0Z" fill="#dd404d" origin="undraw"></path>
      <path d="M6.94482,34.97424c-1.60825-5.17464-2.73778-10.52642-3.75147-15.84445-.53875-2.82637-1.03192-5.66732-1.36909-8.52555-.22002-1.86514-.55032-3.94035-.24476-5.81542,.42371-2.60009,3.64404-3.14035,5.81721-3.20211,1.52228-.04326,3.19884-.13366,4.51247,.77103,.73104,.50347,1.47114,1.17006,1.60978,2.03698,.2937,1.83646-.20554,3.91588-.55283,5.70849-.52583,2.71412-1.21314,5.39728-1.95023,8.06083-1.56865,5.66847-3.31037,11.35327-5.51749,16.8102-.36182,.89458,1.08853,1.28362,1.44642,.39876,2.11331-5.22501,3.78818-10.66041,5.31412-16.08146,.83927-2.98156,1.62371-5.98796,2.20025-9.03269,.36894-1.94839,.82587-4.09689,.53042-6.08582C14.65072,1.89168,12.14327,.40601,10.02478,.14955,6.95729-.22179,3.3337-.053,1.18581,2.43197-.05507,3.86759-.05341,5.4445,.032,7.27813c.12803,2.74883,.54563,5.49081,.99289,8.20286,1.10129,6.67786,2.46268,13.42202,4.47351,19.89201,.28558,.91888,1.73406,.52674,1.44642-.39876h0Z" fill="#dd404d"></path>
    </svg>
    Red line indicates average student percentage
  </p>
  <nav class="my-5">
    <div class="nav nav-tabs justify-content-center border-0" id="nav-tab" role="tablist">
      <button class="nav-link w-auto mx-1 bg-white border-0 shadow-sm pt-0 rounded active" id='nav-exam-tab' data-bs-toggle='tab' data-bs-target='#nav-exam' type='button' role='tab' aria-controls='nav-exam' aria-selected='true'><img class='nav_tab_images translate-middle-y' src="{{url('images/top_quality_question_guy.png')}}" heigh='50' width='50' alt="exams"><div class="nav_tab_text">Exams</div></button>
      <button class="nav-link w-auto mx-1 bg-white border-0 shadow-sm pt-0 rounded" id='nav-quiz-tab' data-bs-toggle='tab' data-bs-target='#nav-quiz' type='button' role='tab' aria-controls='nav-quiz' aria-selected='false'><img class='nav_tab_images translate-middle-y' src="{{url('images/exam_quiz_guy.png')}}" heigh='50' width='50' alt="quiz"><div class="nav_tab_text">Quizzes</div></button>
      <button class="nav-link w-auto mx-1 bg-white border-0 shadow-sm pt-0 rounded" id='nav-practice-tab' data-bs-toggle='tab' data-bs-target='#nav-practice' type='button' role='tab' aria-controls='nav-practice' aria-selected='false'><img class='nav_tab_images translate-middle-y' src="{{url('images/learning_videos_guy.png')}}" heigh='50' width='50' alt="practice"><div class="nav_tab_text">Practises</div></button>
    </div>
  </nav>
  <div class="tab-content p-0" id="nav-tabContent">
    <div class="tab-pane fade show active" id="nav-exam" role="tabpanel" aria-labelledby="nav-exam-tab">
      <h2 class="mb-4 h3">Exam Accomplishments</h2>
      <div class="chart-container bar-line bg-white shadow rounded-5 p-sm-4 py-4 px-0">
        @if(count($chartData['labels']) > 0)
          <canvas class="px-2 px-sm-0" id="examBarChart" width="700"></canvas>
        @else
          No Record
        @endif
      </div>
      <section class="students_section my-5">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-6 col-12">
                    <h2 class='fs-6 fw-medium mb-0 text-uppercase text-primary'>
                        <div class="decor-left me-1"><span></span></div>Tutors Eleven Plus Education
                    </h2>
                    <h2 class="display-5 fw-medium">Learn & Upgrade Your Child's Skills</h2>
                    <p class="mb-3 paragraph_font fw-light">
                      Empower your child's growth by refining and advancing their skills through continuous learning and improvement. Active parent engagement in exam results nurtures support, identifies challenges, and strengthens communication, playing a pivotal role in a child's academic success and overall development.
                    </p>
                </div>
                <div class="col-lg-6 col-12 text-center">
                    <img src="{{url('images\tutors11_students.png')}}" width="400" height="400" alt="15+year of Experience" class="img-fluid learning_image" data-aos="zoom-in">
                </div>
            </div>
        </div>
      </section>
      <div id="examChartsWrap" class="row"></div>
    </div>
    <div class="tab-pane fade" id="nav-quiz" role="tabpanel" aria-labelledby="nav-quiz-tab">
      <h2 class="mb-4 h3">Quiz Accomplishments</h2>
      <div class="chart-container bar-line bg-white shadow rounded-5 p-sm-4 py-4 px-0">
        @if(count($quizChartData['labels']) > 0)
          <canvas class="px-2 px-sm-0" id="quizBarChart" width="700"></canvas>
        @else
          No Record
        @endif
      </div>
      <section class="students_section my-5">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-6 col-12">
                    <h2 class='fs-6 fw-medium mb-0 text-uppercase text-primary'>
                        <div class="decor-left me-1"><span></span></div>Tutors Eleven Plus Education
                    </h2>
                    <h2 class="display-5 fw-medium">Improve and enhance your child's skills</h2>
                    <p class="mb-3 paragraph_font fw-light">
                      Celebrate your child's quiz achievements, acknowledging their effort and knowledge. Encourage a love for learning and boost confidence through recognition of their accomplishments.
                    </p>
                </div>
                <div class="col-lg-6 col-12 text-center">
                    <img src="{{url('images\pricing_header.webp')}}" width="400" height="400" alt="15+year of Experience" class="img-fluid learning_image" data-aos="zoom-in">
                </div>
            </div>
        </div>
      </section>
      <div id="quizChartsWrap" class="row"></div>
    </div>
    <div class="tab-pane fade" id="nav-practice" role="tabpanel" aria-labelledby="nav-practice-tab">
      <!-- <h2 class="mb-4 h3">Practice Accomplishments</h2>
      <div class="chart-container bar-line bg-white shadow rounded-5 p-sm-4 py-4 px-0">
        @if(count($practiceChartData['labels']) > 0)
          <canvas class="px-2 px-sm-0" id="practiceBarChart" width="700"></canvas>
        @else
          No Record
        @endif
      </div>
      <section class="students_section my-5">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-6 col-12">
                    <h2 class='fs-6 fw-medium mb-0 text-uppercase text-primary'>
                        <div class="decor-left me-1"><span></span></div>Tutors Eleven Plus Education
                    </h2>
                    <h2 class="display-5 fw-medium">Practice to Upgrade Child's Skills</h2>
                    <p class="mb-3 paragraph_font fw-light">
                      Acknowledge your child's practice milestones and achievements, encouraging dedication and instilling confidence. Recognizing their efforts cultivates a positive attitude toward learning and future accomplishments.
                    </p>
                </div>
                <div class="col-lg-6 col-12 text-center">
                    <img src="{{url('images\pricing_contact.webp')}}" width="400" height="400" alt="15+year of Experience" class="img-fluid learning_image" data-aos="zoom-in">
                </div>
            </div>
        </div>
      </section>
      <div id="practiceChartsWrap" class="row"></div> -->
      <div class="text-center my-3">
        <img src="{{url('images/available_soon.png')}}" class="responsive_image" width="500" height="auto" alt="an illustration of girl waiting with excitement">
        <h2 class="fw-normal h4 my-2 text-center">This functionality will soon be accessible.</h2>
        <a href="/dashboard" class="btn btn-primary text-white px-3 p-2 my-3">Go to Dashboard</a>
      </div>
    </div>
  </div>
  @endif

  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script>
    var examChartLabels = {!! str_replace("'", "\'", json_encode($chartData['labels']))!!};
    var RawexamChartDatasets = {!! str_replace("'", "\'", json_encode($chartData['datasets'][0]['data']))!!};
    var examaveragePercentage = {!! str_replace("'", "\'", json_encode($chartData['averagePercentage']))!!};

    var quizChartLabels = {!! str_replace("'", "\'", json_encode($quizChartData['labels']))!!};
    var RawquizChartDatasets = {!! str_replace("'", "\'", json_encode($quizChartData['datasets'][0]['data']))!!};
    var quizaveragePercentage = {!! str_replace("'", "\'", json_encode($quizChartData['quizAveragePercentage']))!!};

    var practiceChartLabels = {!! str_replace("'", "\'", json_encode($practiceChartData['labels']))!!};
    var RawpracticeChartDatasets = {!! str_replace("'", "\'", json_encode($practiceChartData['datasets'][0]['data']))!!};
    var practiceaveragePercentage = {!! str_replace("'", "\'", json_encode($practiceChartData['averagePercentage']))!!};

    examChartDatasets = [];
    examChartLabels.forEach(function (label, i) {
      examChartDatasets.push({ examName: label, examPercentage: RawexamChartDatasets[i].x })
    });

    const exams = examChartDatasets.reduce((items, item) => {
      let { x, examPercentage } = item;
      let itemIndex = items.findIndex(item => item.x === x);
      let searchIndex = items.findIndex((x) => x.examName == item['examName']);
      if (searchIndex === -1) {
        items.push({ 'examName': item['examName'], 'examPercentage': [item['examPercentage']] });
      } else {
        let resultObject = items.find(x => x.examName === item['examName'])
        resultObject.examPercentage.push(item['examPercentage']);
      }
      return items;
    }, []);


    quizChartDatasets = [];
    quizChartLabels.forEach(function (label, i) {
      quizChartDatasets.push({ quizName: label, quizPercentage: RawquizChartDatasets[i].x })
    });


    const quizzes = quizChartDatasets.reduce((items, item) => {
      let { x, quizPercentage } = item;
      let itemIndex = items.findIndex(item => item.x === x);
      let searchIndex = items.findIndex((x) => x.quizName == item['quizName']);
      if (searchIndex === -1) {
        items.push({ 'quizName': item['quizName'], 'quizPercentage': [item['quizPercentage']] });
      } else {
        let resultObject = items.find(x => x.quizName === item['quizName'])
        resultObject.quizPercentage.push(item['quizPercentage']);
      }
      return items;
    }, []);

    practiceChartDatasets = [];
    practiceChartLabels.forEach(function (label, i) {
      practiceChartDatasets.push({ practiceName: label, practicePercentage: RawpracticeChartDatasets[i].x })
    });

    const practices = practiceChartDatasets.reduce((items, item) => {
      let { x, practicePercentage } = item;
      let itemIndex = items.findIndex(item => item.x === x);
      let searchIndex = items.findIndex((x) => x.practiceName == item['practiceName']);
      if (searchIndex === -1) {
        items.push({ 'practiceName': item['practiceName'], 'practicePercentage': [item['practicePercentage']] });
      } else {
        let resultObject = items.find(x => x.practiceName === item['practiceName'])
        resultObject.practicePercentage.push(item['practicePercentage']);
      }
      return items;
    }, []);

    var examLength = Object.keys(exams).length;
    var quizLength = Object.keys(quizzes).length;
    var practiceLength = Object.keys(practices).length;

    var callBarChart = function () {
      var barLine = null;

      var canvas = document.getElementById("examBarChart");
      
      

      var examName = [];
      var examPercentage = [];
      var examColor = [];
      var examBorderColor = [];
      $(function(){
        $("#examBarChart").css("height", examLength * 50);
      });

      for (var i = 0; i < examLength; i++) {
        let randomColorNumber = randomNumber();
        let average = array => array.reduce((a, b) => a + b) / exams[i]["examPercentage"].length;
        if (average(exams[i]["examPercentage"]).toFixed(2) > 0) {
          examName.push(exams[i]["examName"]);
          examPercentage.push(average(exams[i]["examPercentage"]).toFixed(2));
          examColor.push("rgba("+randomColorNumber+", 0.50)");
          examBorderColor.push("rgba("+randomColorNumber+", 1)");
          // examColor.push("#005fba");
        } else {
          examName.push(exams[i]["examName"]);
          examPercentage.push(0.50);
          examColor.push("#ffcdc4");
          examBorderColor.push("#ffcdc4");
        }
      }

      var data = {
        labels: examName,
        datasets: [
          {
            label: "Percentage",
            backgroundColor: examColor,
            borderColor: examBorderColor,
            fill: true,
            borderWidth: 2,
            borderRadius: Number.MAX_VALUE,
            borderSkipped: false,
            data: examPercentage
          }
        ]
      };

      var ctx = document.getElementById("examBarChart").getContext("2d");

      const verticalLine = {
        renderVerticalLine: function (chartInstance, pointIndex, i) {
          const xaxis = chartInstance.scales["x-axis-0"];
          const yaxis = chartInstance.scales["y-axis-0"];
          const context = chartInstance.chart.ctx;

          // render vertical line
          context.beginPath();

          if (i === 0) {
            context.strokeStyle = "#DA1726";
          } else if (i === 1) {
            context.strokeStyle = "#FFDD40";
          } else if (i === 2) {
            context.strokeStyle = "#47CF73";
          }

          context.moveTo(xaxis.getPixelForValue(pointIndex), yaxis.top);
          context.lineTo(xaxis.getPixelForValue(pointIndex), yaxis.bottom);
          context.stroke();
        },

        afterDatasetsDraw: function (chart, easing) {
          if (chart.config.lineAtIndex) {
            var index = [];
            index = chart.config.lineAtIndex;
            for (i = 0; i < index.length; i++) {
              this.renderVerticalLine(chart, index[i], i);
            }
          }
        }
      };

      Chart.plugins.register(verticalLine);

      if (barLine != null) {
        barLine.remove();
      }

      barLine = new Chart(ctx, {
        type: "horizontalBar",
        data: data,
        // borderColor: '#de1616',
        // backgroundColor: '#16de2b',
        options: {
          responsive: true,
          maintainAspectRatio: false,
          aspectRatio: 2,
          legend: {
            display: false
          },
          scales: {
            xAxes: [
              {
                display: true,
                ticks: {
                  display: true,
                  fontColor: "#0a5fba",
                  beginAtZero: true,
                  stepSize: 10,
                  max: 100
                },
                gridLines: {
                  display: false
                }
              }
            ],
            yAxes: [
              {
                barPercentage: 0.4,
                ticks: {
                  display: true,
                  fontColor: "#222"
                },
                gridLines: {
                  display: false
                }
              }
            ]
          }
        },
        label: "Progress",
        datasetFill: true,
        lineAtIndex: [examaveragePercentage]
      });
    };
    var callQuizChart = function () {
      var barLine = null;
      var canvas = document.getElementById("quizBarChart");
      var quizName = [];
      var quizPercentage = [];
      var quizColor = [];
      var quizBorderColor = [];
      $(function(){
        $("#quizBarChart").css("height", quizLength * 50);
      });

      for (var i = 0; i < quizLength; i++) {
        let randomColorNumber = randomNumber();
        let average = array => array.reduce((a, b) => a + b) / quizzes[i]["quizPercentage"].length;
        if (average(quizzes[i]["quizPercentage"]).toFixed(2) > 0) {
          quizName.push(quizzes[i]["quizName"]);
          quizPercentage.push(average(quizzes[i]["quizPercentage"]).toFixed(2));
          quizColor.push("rgba("+randomColorNumber+", 0.50)");
          quizBorderColor.push("rgba("+randomColorNumber+", 1)");
          // quizColor.push("#005fba");
        } else {
          quizName.push(quizzes[i]["quizName"]);
          quizPercentage.push(0.50);
          quizColor.push("#ffcdc4");
          quizBorderColor.push("#ffcdc4");
        }
      }

      var data = {
        labels: quizName,
        datasets: [
          {
            label: "Percentage",
            backgroundColor: quizColor,
            fill: true,
            data: quizPercentage,
            borderColor: quizBorderColor,
            borderWidth: 2,
            borderRadius: Number.MAX_VALUE,
            borderSkipped: false,
          }
        ]
      };

      var ctx = document.getElementById("quizBarChart").getContext("2d");

      const verticalLine = {
        renderVerticalLine: function (chartInstance, pointIndex, i) {
          const xaxis = chartInstance.scales["x-axis-0"];
          const yaxis = chartInstance.scales["y-axis-0"];
          const context = chartInstance.chart.ctx;

          // render vertical line
          context.beginPath();

          if (i === 0) {
            context.strokeStyle = "#DA1726";
          } else if (i === 1) {
            context.strokeStyle = "#FFDD40";
          } else if (i === 2) {
            context.strokeStyle = "#47CF73";
          }

          context.moveTo(xaxis.getPixelForValue(pointIndex), yaxis.top);
          context.lineTo(xaxis.getPixelForValue(pointIndex), yaxis.bottom);
          context.stroke();
        },

        afterDatasetsDraw: function (chart, easing) {
          if (chart.config.lineAtIndex) {
            var index = [];
            index = chart.config.lineAtIndex;
            for (i = 0; i < index.length; i++) {
              this.renderVerticalLine(chart, index[i], i);
            }
          }
        }
      };

      Chart.plugins.register(verticalLine);

      if (barLine != null) {
        barLine.remove();
      }

      barLine = new Chart(ctx, {
        type: "horizontalBar",
        data: data,
        // borderColor: '#de1616',
        // backgroundColor: '#16de2b',
        options: {
          responsive: true,
          maintainAspectRatio: false,
          aspectRatio: 2,
          legend: {
            display: false
          },
          scales: {
            xAxes: [
              {
                display: true,
                ticks: {
                  display: true,
                  fontColor: "#696bfc",
                  beginAtZero: true,
                  stepSize: 10,
                  max: 100
                },
                gridLines: {
                  display: false
                }
              }
            ],
            yAxes: [
              {
                barPercentage: 0.4,
                ticks: {
                  display: true,
                  fontColor: "#222"
                },
                gridLines: {
                  display: false
                }
              }
            ]
          }
        },
        label: "Progress",
        lineAtIndex: [quizaveragePercentage]
      });
    };
    var callPracticeChart = function () {
      var barLine = null;

      var canvas = document.getElementById("practiceBarChart");
      

      var practiceName = [];
      var practicePercentage = [];
      var practiceColor = [];
      var practiceBorderColor = [];
      $(function(){
        $("#practiceBarChart").css("height", practiceLength * 50);
      });
      for (var i = 0; i < practiceLength; i++) {
        let randomColorNumber = randomNumber();
        let average = array => array.reduce((a, b) => a + b) / practices[i]["practicePercentage"].length;
        if (average(practices[i]["practicePercentage"]).toFixed(2) > 0) {
          practiceName.push(practices[i]["practiceName"]);
          practicePercentage.push(average(practices[i]["practicePercentage"]).toFixed(2));
          practiceColor.push("rgba("+randomColorNumber+", 0.50)");
          practiceBorderColor.push("rgba("+randomColorNumber+", 1)");
          // practiceColor.push("#005fba");
        } else {
          practiceName.push(practices[i]["practiceName"]);
          practicePercentage.push(0.50);
          practiceColor.push("#ffcdc4");
          practiceBorderColor.push("#ffcdc4");
        }
      }

      var data = {
        labels: practiceName,
        datasets: [
          {
            label: "Percentage",
            backgroundColor: practiceColor,
            fill: true,
            data: practicePercentage,
            borderColor: practiceBorderColor,
            borderWidth: 2,
            borderRadius: Number.MAX_VALUE,
            borderSkipped: false,
          }
        ]
      };

      var ctx = document.getElementById("practiceBarChart").getContext("2d");

      const verticalLine = {
        renderVerticalLine: function (chartInstance, pointIndex, i) {
          const xaxis = chartInstance.scales["x-axis-0"];
          const yaxis = chartInstance.scales["y-axis-0"];
          const context = chartInstance.chart.ctx;

          // render vertical line
          context.beginPath();

          if (i === 0) {
            context.strokeStyle = "#DA1726";
          } else if (i === 1) {
            context.strokeStyle = "#FFDD40";
          } else if (i === 2) {
            context.strokeStyle = "#47CF73";
          }

          context.moveTo(xaxis.getPixelForValue(pointIndex), yaxis.top);
          context.lineTo(xaxis.getPixelForValue(pointIndex), yaxis.bottom);
          context.stroke();
        },

        afterDatasetsDraw: function (chart, easing) {
          if (chart.config.lineAtIndex) {
            var index = [];
            index = chart.config.lineAtIndex;
            for (i = 0; i < index.length; i++) {
              this.renderVerticalLine(chart, index[i], i);
            }
          }
        }
      };

      Chart.plugins.register(verticalLine);

      if (barLine != null) {
        barLine.remove();
      }

      barLine = new Chart(ctx, {
        type: "horizontalBar",
        data: data,
        // borderColor: '#de1616',
        // backgroundColor: '#16de2b',
        options: {
          responsive: true,
          maintainAspectRatio: false,
          aspectRatio: 2,
          legend: {
            display: false
          },
          scales: {
            xAxes: [
              {
                display: true,
                ticks: {
                  display: true,
                  fontColor: "#696bfc",
                  beginAtZero: true,
                  stepSize: 10,
                  max: 100
                },
                gridLines: {
                  display: false
                }
              }
            ],
            yAxes: [
              {
                barPercentage: 0.4,
                ticks: {
                  display: true,
                  fontColor: "#222"
                },
                gridLines: {
                  display: false
                }
              }
            ]
          }
        },
        label: "Progress",
        lineAtIndex: [practiceaveragePercentage]
      });
    };
    if(examLength > 0){
      callBarChart();
    }
    if(quizLength > 0){
      callQuizChart();
    }
    if(practiceLength > 0){
      callPracticeChart();
    }

    function randomNumber() {
      return Math.floor(Math.random() * 256)+", "+Math.floor(Math.random() * 256)+", "+Math.floor(Math.random() * 256);
    }

  </script>

  <script>
    var examChartLabels = {!! str_replace("'", "\'", json_encode($chartData['labels']))!!};
    var RawexamChartDatasets = {!! str_replace("'", "\'", json_encode($chartData['datasets'][0]['data']))!!};
    var examaveragePercentage = {!! str_replace("'", "\'", json_encode($chartData['averagePercentage']))!!};
    examChartDatasets = [];
    examChartLabels.forEach(function (label, i) {
      examChartDatasets.push({ examName: label, examPercentage: RawexamChartDatasets[i].x })
    });

    const exams2 = examChartDatasets.reduce((items, item) => {
      let { x, examPercentage } = item;
      let itemIndex = items.findIndex(item => item.x === x);
      let searchIndex = items.findIndex((x) => x.examName == item['examName']);
      if (searchIndex === -1) {
        items.push({ 'examName': item['examName'], 'examPercentage': [item['examPercentage']] });
      } else {
        let resultObject = items.find(x => x.examName === item['examName'])
        resultObject.examPercentage.push(item['examPercentage']);
      }
      return items;
    }, []);
    var examLength = Object.keys(exams2).length;


    var examPercentage = [];

    for (var i = 0; i < examLength; i++) {
      let randomColorNumber = randomNumber();
      let average = array => array.reduce((a, b) => a + b) / exams2[i]["examPercentage"].length;
      let x = {
        name: exams2[i]["examName"],
        average: Math.floor(average(exams2[i]["examPercentage"]))
      }
      examPercentage.push(x);
    }
    if(examPercentage.length > 0){
      $("#examChartsWrap").append(`<h2 class="h3">Individual Exam Report:</h2>`);
      let table = `<div class="table-responsive bg-white p-3 rounded-4 shadow mt-3"><table class="table">
        <thead>
          <tr>
            <th class="w_140 report_serial" scope="col">Serial</th>
            <th class="w_300 report_exam" scope="col">Exam</th>
            <th class="w_200 report_average" scope="col">Average</th>
            <th class="w_200 report_level" scope="col">Level</th>
          </tr>
        </thead>
        <tbody id="examTbody"></tbody>
      </table></div>`;
      $("#examChartsWrap").append(table);
      examPercentage.forEach(function (exam, i) {
        let progressbarStatus = "";
        let badgeColor = "";
        let level = "";
        switch (true) {
          case (exam.average >= 0 && exam.average <= 68):
            progressbarStatus = "bg-danger";
            badgeColor = "bg-label-danger";
            level = "Need Practice";
            break;
          case (exam.average >= 69 && exam.average <= 82):
            progressbarStatus = "bg-warning";
            badgeColor = "bg-label-warning";
            level = "Good";
            break;
          case (exam.average >= 83 && exam.average <= 88):
            progressbarStatus = "bg-success";
            badgeColor = "bg-label-success";
            level = "Strong";
            break;
          case (exam.average >= 89 && exam.average <= 100):
            progressbarStatus = "bg-primary";
            badgeColor = "bg-label-primary";
            level = "Master";
            break;
          default:
            progressbarStatus = "bg-light";
            badgeColor = "bg-label-secondary";
            level = "Need Practice";
            break;
        }
        let tab = `<tr>
            <th scope="row">`+(++i)+`</th>
            <td>`+exam.name+`</td>
            <td><div class="progress" role="progressbar" aria-label="`+exam.name+`" aria-valuenow="`+exam.average+`" aria-valuemin="0" aria-valuemax="100"><div class="progress-bar text-white bg-opacity-75 `+progressbarStatus+`" style="width: `+exam.average+`%"></div></div></td>
            <td><span class="badge me-1 fs-tiny fw-normal `+badgeColor+`">`+level+`</span></td>
          </tr>`;
        
        $("#examTbody").append(tab);
      });
    }
  </script>

  <script>
    var quizChartLabels = {!! str_replace("'", "\'", json_encode($quizChartData['labels']))!!};
    var RawquizChartDatasets = {!! str_replace("'", "\'", json_encode($quizChartData['datasets'][0]['data']))!!};
    var quizaveragePercentage = {!! str_replace("'", "\'", json_encode($quizChartData['quizAveragePercentage']))!!};
    quizChartDatasets = [];
    quizChartLabels.forEach(function (label, i) {
      quizChartDatasets.push({ quizName: label, quizPercentage: RawquizChartDatasets[i].x })
    });

    const quizs2 = quizChartDatasets.reduce((items, item) => {
      let { x, quizPercentage } = item;
      let itemIndex = items.findIndex(item => item.x === x);
      let searchIndex = items.findIndex((x) => x.quizName == item['quizName']);
      if (searchIndex === -1) {
        items.push({ 'quizName': item['quizName'], 'quizPercentage': [item['quizPercentage']] });
      } else {
        let resultObject = items.find(x => x.quizName === item['quizName'])
        resultObject.quizPercentage.push(item['quizPercentage']);
      }
      return items;
    }, []);
    var quizLength = Object.keys(quizs2).length;


    var quizPercentage = [];

    for (var i = 0; i < quizLength; i++) {
      let randomColorNumber = randomNumber();
      let average = array => array.reduce((a, b) => a + b) / quizs2[i]["quizPercentage"].length;
      let x = {
        name: quizs2[i]["quizName"],
        average: Math.floor(average(quizs2[i]["quizPercentage"]))
      }
      quizPercentage.push(x);
    }
    if(quizPercentage.length > 0){
      $("#quizChartsWrap").append(`<h2 class="h3">Individual Quiz Report:</h2>`);
      let table = `<div class="table-responsive bg-white p-3 rounded-4 shadow mt-3"><table class="table">
        <thead>
          <tr>
            <th class="w_140 report_serial" scope="col">Serial</th>
            <th class="w_300 report_quiz" scope="col">Quiz</th>
            <th class="w_200 report_average" scope="col">Average</th>
            <th class="w_200 report_level" scope="col">Level</th>
          </tr>
        </thead>
        <tbody id="quizTbody"></tbody>
      </table></div>`;
      $("#quizChartsWrap").append(table);
      quizPercentage.forEach(function (quiz, i) {
        let progressbarStatus = "";
        let badgeColor = "";
        let level = "";
        switch (true) {
          case (quiz.average >= 0 && quiz.average <= 68):
            progressbarStatus = "bg-danger";
            badgeColor = "bg-label-danger";
            level = "Need Practice";
            break;
          case (quiz.average >= 69 && quiz.average <= 82):
            progressbarStatus = "bg-warning";
            badgeColor = "bg-label-warning";
            level = "Good";
            break;
          case (quiz.average >= 83 && quiz.average <= 88):
            progressbarStatus = "bg-success";
            badgeColor = "bg-label-success";
            level = "Strong";
            break;
          case (quiz.average >= 89 && quiz.average <= 100):
            progressbarStatus = "bg-primary";
            badgeColor = "bg-label-primary";
            level = "Master";
            break;
          default:
            progressbarStatus = "bg-light";
            badgeColor = "bg-label-secondary";
            level = "Need Practice";
            break;
        }
        let tab = `<tr>
            <th scope="row">`+(++i)+`</th>
            <td>`+quiz.name+`</td>
            <td><div class="progress" role="progressbar" aria-label="`+quiz.name+`" aria-valuenow="`+quiz.average+`" aria-valuemin="0" aria-valuemax="100"><div class="progress-bar text-white bg-opacity-75 `+progressbarStatus+`" style="width: `+quiz.average+`%"></div></div></td>
            <td><span class="badge me-1 fs-tiny fw-normal `+badgeColor+`">`+level+`</span></td>
          </tr>`;
        
        $("#quizTbody").append(tab);
      });
    }
  </script>

  <script>
    var practiceChartLabels = {!! str_replace("'", "\'", json_encode($practiceChartData['labels']))!!};
    var RawpracticeChartDatasets = {!! str_replace("'", "\'", json_encode($practiceChartData['datasets'][0]['data']))!!};
    var practiceaveragePercentage = {!! str_replace("'", "\'", json_encode($practiceChartData['averagePercentage']))!!};

    practiceChartDatasets = [];
    practiceChartLabels.forEach(function (label, i) {
      practiceChartDatasets.push({ practiceName: label, practicePercentage: RawpracticeChartDatasets[i].x })
    });

    const practice2 = practiceChartDatasets.reduce((items, item) => {
      let { x, practicePercentage } = item;
      let itemIndex = items.findIndex(item => item.x === x);
      let searchIndex = items.findIndex((x) => x.practiceName == item['practiceName']);
      if (searchIndex === -1) {
        items.push({ 'practiceName': item['practiceName'], 'practicePercentage': [item['practicePercentage']] });
      } else {
        let resultObject = items.find(x => x.practiceName === item['practiceName'])
        resultObject.practicePercentage.push(item['practicePercentage']);
      }
      return items;
    }, []);
    var practiceLength = Object.keys(practice2).length;


    var practicePercentage = [];

    for (var i = 0; i < practiceLength; i++) {
      let randomColorNumber = randomNumber();
      let average = array => array.reduce((a, b) => a + b) / practice2[i]["practicePercentage"].length;
      let x = {
        name: practice2[i]["practiceName"],
        average: Math.floor(average(practice2[i]["practicePercentage"]))
      }
      practicePercentage.push(x);
    }
    if(practicePercentage.length > 0){
      $("#practiceChartsWrap").append(`<h2 class="h3">Individual Practice Report:</h2>`);
      let table = `<div class="table-responsive bg-white p-3 rounded-4 shadow mt-3"><table class="table">
        <thead>
          <tr>
            <th class="w_140 report_serial" scope="col">Serial</th>
            <th class="w_300 report_practice" scope="col">Practice</th>
            <th class="w_200 report_average" scope="col">Average</th>
            <th class="w_200 report_level" scope="col">Level</th>
          </tr>
        </thead>
        <tbody id="practiceTbody"></tbody>
      </table></div>`;
      $("#practiceChartsWrap").append(table);
      practicePercentage.forEach(function (practice, i) {
        let progressbarStatus = "";
        let badgeColor = "";
        let level = "";
        switch (true) {
          case (practice.average >= 0 && practice.average <= 68):
            progressbarStatus = "bg-danger";
            badgeColor = "bg-label-danger";
            level = "Need Practice";
            break;
          case (practice.average >= 69 && practice.average <= 82):
            progressbarStatus = "bg-warning";
            badgeColor = "bg-label-warning";
            level = "Good";
            break;
          case (practice.average >= 83 && practice.average <= 88):
            progressbarStatus = "bg-success";
            badgeColor = "bg-label-success";
            level = "Strong";
            break;
          case (practice.average >= 89 && practice.average <= 100):
            progressbarStatus = "bg-primary";
            badgeColor = "bg-label-primary";
            level = "Master";
            break;
          default:
            progressbarStatus = "bg-light";
            badgeColor = "bg-label-secondary";
            level = "Need Practice";
            break;
        }
        let tab = `<tr>
            <th scope="row">`+(++i)+`</th>
            <td>`+practice.name+`</td>
            <td><div class="progress" role="progressbar" aria-label="`+practice.name+`" aria-valuenow="`+practice.average+`" aria-valuemin="0" aria-valuemax="100"><div class="progress-bar text-white bg-opacity-75 `+progressbarStatus+`" style="width: `+practice.average+`%"></div></div></td>
            <td><span class="badge me-1 fs-tiny fw-normal `+badgeColor+`">`+level+`</span></td>
          </tr>`;
        
        $("#practiceTbody").append(tab);
      });
    }
  </script>

  @include('User.ProgressScript')
</body>

</html>