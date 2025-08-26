<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}">
  <meta name="description" content="{{ app(\App\Settings\SiteSettings::class)->seo_description }}">
  <meta name="author" content="{{ app(\App\Settings\SiteSettings::class)->app_name }}">

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet"
  />

  <!-- Icons. Uncomment required icon fonts -->
  <link rel="stylesheet" href="{{url('Frontend_css/assets/fonts/boxicons.css')}}">

  <!-- Core CSS -->
  <link rel="stylesheet" href="{{url('Frontend_css/assets/vendor/css/core.css')}}" class="template-customizer-core-css" />
  <link rel="stylesheet" href="{{url('Frontend_css/assets/vendor/css/theme-default.css')}}" class="template-customizer-theme-css" />
  <link rel="stylesheet" href="{{url('Frontend_css/assets/css/demo.css')}}" />

  <!-- Vendors CSS -->
  <link rel="stylesheet" href="{{url('Frontend_css/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />

  <link rel="stylesheet" href="{{url('Frontend_css/assets/vendor/libs/apex-charts/apex-charts.css')}}" />

  <!-- Page CSS -->

  <!-- Helpers -->
  <script src="{{url('Frontend_css/assets/vendor/js/helpers.js')}}"></script>

  <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
  <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
  <script src="{{url('Frontend_css/assets/js/config.js')}}"></script>


  <title>Document</title>
  <style>
    /* hover effect at svg */
.menu-item{
  transition: 0.3s;
}
.menu-item:hover span svg{
  fill: #696cff;
}
  </style>
</head>
<body>
  

<!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar">
  <div class="layout-container">
    <!-- Menu -->


    <!-- / Menu -->





    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{url('Frontend_css/assets/vendor/libs/jquery/jquery.js')}}"></script>
    <script src="{{url('Frontend_css/assets/vendor/libs/popper/popper.js')}}"></script>
    <script src="{{url('Frontend_css/assets/vendor/js/bootstrap.js')}}"></script>
    <script src="{{url('Frontend_css/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>

    <script src="{{url('Frontend_css/assets/vendor/js/menu.js')}}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{url('Frontend_css/assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>

    <!-- Main JS -->
    <script src="{{url('Frontend_css/assets/js/main.js')}}"></script>

    <!-- Page JS -->
    <script src="{{url('Frontend_css/assets/js/dashboards-analytics.js')}}"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>

      $(document).ready(function () {

        $("#home_tab").click(function () {
          $("#home_tab_section").show();
          $("#exam_tab_section").hide();
          $("#quiz_tab_section").hide();
          $("#practice_tab_section").hide();
          $("#text_print").text("Test in progress")
        });

        $("#exam_tab").click(function () {
          $("#home_tab_section").hide();
          $("#exam_tab_section").show();
          $("#quiz_tab_section").hide();
          $("#practice_tab_section").hide();
          $("#text_print").text("Exam Attempts")
        });

        $("#quiz_tab").click(function () {
          $("#home_tab_section").hide();
          $("#exam_tab_section").hide();
          $("#quiz_tab_section").show();
          $("#practice_tab_section").hide();
          $("#text_print").text("Quiz Attempts")
        });

        $("#practise_tab").click(function () {
          $("#home_tab_section").hide();
          $("#exam_tab_section").hide();
          $("#quiz_tab_section").hide();
          $("#practice_tab_section").show();
          $("#text_print").text("practice")
        });

        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))

      })

    </script>

      </body>
      </html>
