<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- rel icon -->
  <link rel="icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}">
  <meta name="description" content="{{ app(\App\Settings\SiteSettings::class)->seo_description }}">
  <meta name="author" content="{{ app(\App\Settings\SiteSettings::class)->app_name }}">

  <!-- Preload the font file -->
  <link rel="preload" href="{{url('Frontend_css/assets/fonts/boxicons.woff2')}}" as="font" type="font/woff2" crossorigin="anonymous">

  <!-- Preload and regular stylesheet links -->
  <link rel="preload" href="{{url('Frontend_css/assets/fonts/boxicons.css')}}" as="style" onload="this.onload=null;this.rel='stylesheet'">
  <link rel="preload" href="{{url('Frontend_css/assets/vendor/css/core.css')}}" as="style" onload="this.onload=null;this.rel='stylesheet'" class="template-customizer-core-css" />
  <link rel="preload" href="{{url('Frontend_css/assets/vendor/css/theme-default.css')}}" as="style" onload="this.onload=null;this.rel='stylesheet'" class="template-customizer-theme-css" />
  <link rel="preload" href="{{url('Frontend_css/assets/css/demo.css')}}" as="style" onload="this.onload=null;this.rel='stylesheet'" />

  <!-- Apply styles only when the font is successfully loaded -->
  <link rel="stylesheet" href="{{url('Frontend_css/assets/fonts/boxicons.css')}}" media="print" onload="this.media='all'">
  <link rel="stylesheet" href="{{url('Frontend_css/assets/vendor/css/core.css')}}" class="template-customizer-core-css" />
  <link rel="stylesheet" href="{{url('Frontend_css/assets/vendor/css/theme-default.css')}}" class="template-customizer-theme-css" />
  <link rel="stylesheet" href="{{url('Frontend_css/assets/css/demo.css')}}" />

  <!-- Vendors CSS (without preload) -->
  <link rel="stylesheet" href="{{url('Frontend_css/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />
  <link rel="stylesheet" href="{{url('Frontend_css/assets/vendor/libs/apex-charts/apex-charts.css')}}" />
  <!-- Helpers -->
  <script src="{{url('Frontend_css/assets/vendor/js/helpers.js')}}"></script>

  <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
  <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
  <script src="{{url('Frontend_css/assets/js/config.js')}}"></script>


  <title>Document</title>
</head>
<body>
    @include('components.website-preloader')
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->


        <!-- / Menu -->






  <!-- jQuery and Bootstrap scripts -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script defer src="{{url('Frontend_css/assets/vendor/libs/popper/popper.js')}}"></script>
  <script defer src="{{url('Frontend_css/assets/vendor/js/bootstrap.js')}}"></script>
  <script defer src="{{url('Frontend_css/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>

  <!-- Menu-related script -->
  <script defer src="{{url('Frontend_css/assets/vendor/js/menu.js')}}"></script>

  <!-- Vendors JS -->
  <script defer src="{{url('Frontend_css/assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>

  <!-- Main JS -->
  <script defer src="{{url('Frontend_css/assets/js/main.js')}}"></script>

  <!-- Page JS -->
  <script defer src="{{url('Frontend_css/assets/js/dashboards-analytics.js')}}"></script>

  <!-- External scripts -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css">


    <script>
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    </script>

</body>
</html>