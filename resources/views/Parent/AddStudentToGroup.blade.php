<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Dashboard - Parent Portal | {{ app(\App\Settings\SiteSettings::class)->app_name }}</title>
    <!-- rel icon -->
    <link rel="icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}">
    <meta name="description" content="{{ app(\App\Settings\SiteSettings::class)->seo_description }}">
    <meta name="author" content="{{ app(\App\Settings\SiteSettings::class)->app_name }}">         
    <!-- preconnect links  -->
    <link rel="preload" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"  as="style" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="preconnect" href="https://googleads.g.doubleclick.net">
    <link rel="preconnect" href="https://td.doubleclick.net">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://www.google-analytics.com">
    <!-- css links  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flat-ui/2.3.0/css/flat-ui.min.css" integrity="sha512-6f7HT84a/AplPkpSRSKWqbseRTG4aRrhadjZezYQ0oVk/B+nm/US5KzQkyyOyh0Mn9cyDdChRdS9qaxJRHayww=="  crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <style>
        .overview_section {height: auto;width: auto;margin: 2rem auto !important;}.heading_separator {height: 0.4rem;width: 120px;background: var(--portal-secondary);border-radius: 20rem;}.overview_cards {height: auto;width: auto; background: #fff;transition: 0.25s; box-shadow: 0px 4px 10px 0px #00000024}.overview_cards:hover {transform: translateY(-5px); box-shadow: 0px 7px 13px 0px #00000040 }.overview_cards_image {height: 80px;width: 80px;display: flex;align-items: center;justify-content: center;}.select-dropdown {position: relative;display: block;width: 100%;}.select-dropdown__button {padding: 10px 35px 10px 15px;background-color: #fff;color: #616161;border: 1px solid #cecece;border-radius: 3px;cursor: pointer;width: 210px;text-align: left;}.select-dropdown__button::focus {outline: none;}.select-dropdown__button .zmdi-chevron-down {position: absolute;right: 10px;top: 12px;}.select-dropdown__list {position: absolute;display: block;left: 0;right: 0;max-height: 300px;overflow: auto;margin: 0;padding: 0;list-style-type: none;opacity: 0;pointer-events: none;transform-origin: top left;transform: scale(1, 0);transition: all ease-in-out 0.3s;z-index: 2;}.select-dropdown__list-item {display: block;list-style-type: none;padding: 10px 15px;background: #fff;border-top: 1px solid #e6e6e6;font-size: 14px;line-height: 1.4;cursor: pointer;color: #616161;transition: all ease-in-out 0.3s;}.greeting_section {height: auto;width: auto;margin: 2rem auto !important;background: linear-gradient(45deg, #005fba, #40a2ff);}.performance_section {height: auto;width: auto;margin: 2rem auto !important;}.performance_card {min-height: 200px; box-shadow: 0px 3px 8px 0px #0000006e} .master_performance_card {background: radial-gradient(#bb76dd, #9141c9) !important;}.poor_performance_card {background: radial-gradient(#85dc99, #589967) !important;}.good_performance_card {background: radial-gradient(#1e96ff, #084ddc) !important;}.average_performance_card {background: radial-gradient(#ffc352, #e79700) !important}.practice_banner {height: auto;width: auto;margin: 3rem auto !important;background: linear-gradient(289deg, #0000001c, #0000008f), url(../images/set_practice_bg.jpg) center no-repeat;background-size: cover;}.course_card {box-shadow: 0px 3px 5px 0px #0000001a !important;transition: 0.25s;}.course_card:hover {transform: translateY(-5px); box-shadow: 0px 6px 10px 0px #0000002e !important }.btn_secondary {background: linear-gradient(358deg, #ef8f00, var(--portal-secondary)) !important;color: #fff !important;}.btn_secondary_outlined {background: transparent !important;color: #fff !important;border: 2px solid var(--portal-secondary) !important;transition: 0.25s;}.btn_secondary_outlined:hover {background: linear-gradient(358deg, #ef8f00, var(--portal-secondary)) !important;color: #fff !important;}.top_circle_shade {height: 120px;width: 120px;background: #ffffff1a;position: absolute;top: -35px;right: -55px;}.disable_screen {background: #ffffff54 !important;z-index: 99999 }.refferal_section {background: linear-gradient(45deg, #005fba, #40a2ff);border-radius: 1.3rem }ul {list-style-type: none;}a, a:hover {text-decoration: none;}body .testimonial {padding: 10px 0;}body .testimonial .row .tabs {all: unset;margin-right: 50px;display: flex;flex-direction: column;}body .testimonial .row .tabs li {all: unset;display: block;position: relative;}body .testimonial .row .tabs li.active::before {position: absolute;content: "";width: 50px;height: 50px;background-color: #71b85f;border-radius: 50%;}body .testimonial .row .tabs li.active::after {position: absolute;content: "";width: 30px;height: 30px;background-color: #71b85f;border-radius: 50%;}body .testimonial .row .tabs li:nth-child(1) {align-self: flex-end;}body .testimonial .row .tabs li:nth-child(1)::before {left: 110%;bottom: -50px;}body .testimonial .row .tabs li:nth-child(1)::after {left: 97%;bottom: 130px;}body .testimonial .row .tabs li:nth-child(1) figure img {margin-left: auto;}body .testimonial .row .tabs li:nth-child(2) {align-self: flex-start;}body .testimonial .row .tabs li:nth-child(2)::before {right: 0px;top: 16%;left:336px;}body .testimonial .row .tabs li:nth-child(2)::after {bottom: 155px;border-radius: 50%;right: -120px;left:304px;}body .testimonial .row .tabs li:nth-child(2) figure img {margin-right: auto;max-width: 300px;width: 100%;margin-top: -50px;}body .testimonial .row .tabs li:nth-child(3) {align-self: flex-end;}body .testimonial .row .tabs li:nth-child(3)::before {right: 0px;top: -57%;left:145px;}body .testimonial .row .tabs li:nth-child(3)::after {top: -127px;border-radius: 50%;right: -40px;left:197px;}body .testimonial .row .tabs li:nth-child(3) figure img {margin-left: auto;margin-top: -50px;}body .testimonial .row .tabs li:nth-child(3):focus {border: 10px solid red;}body .testimonial .row .tabs li figure {position: relative;}body .testimonial .row .tabs li figure img {display: block;}body .testimonial .row .tabs li figure::after {content: "";position: absolute;top: 0;z-index: -1;width: 100%;height: 100%;border: 4px solid #dff9d9;border-radius: 50%;-webkit-transform: scale(1);-ms-transform: scale(1);transform: scale(1);-webkit-transition: 0.3s;-o-transition: 0.3s;transition: 0.3s;}body .testimonial .row .tabs li figure:hover::after {-webkit-transform: scale(1.1);-ms-transform: scale(1.1);transform: scale(1.1);}body .testimonial .row .tabs.carousel-indicators li.active figure::after {-webkit-transform: scale(1.1);-ms-transform: scale(1.1);transform: scale(1.1);}body .testimonial .row .carousel > h3 {font-size: 20px;line-height: 1.45;color: rgba(0, 0, 0, 0.5);font-weight: 600;margin-bottom: 0;}body .testimonial .row .carousel h1 {font-size: 40px;line-height: 1.225;margin-top: 23px;font-weight: 700;margin-bottom: 0;}body .testimonial .row .carousel .carousel-indicators {all: unset;padding-top: 10px;display: flex;list-style: none;}body .testimonial .row .carousel .carousel-indicators li {background: #000;background-clip: padding-box;height: 2px;}body .testimonial .row .carousel .carousel-inner .carousel-item .quote-wrapper {margin-top: 20px;}@media only screen and (max-width: 1200px) {body .testimonial .row .tabs {margin-right: 25px;}}.trophy{bottom:-117px;right:52px;}.banner_image{display:none }@media (max-width:768px) {.banner_image{display:flex }.trophy{display:none }}@media (max-width: 991px) {.responsive_image {display: none !important }}.selectChild:hover {scale: 1.01 !important;}.btn_card_login_customized {border: 1px solid var(--portal-primary) !important;background: var(--portal-primary) !important;border-radius: 5px;color: #fff !important;}.cursor-not-allowed {cursor: not-allowed !important;}img {max-width: 100%;}ul {list-style: none;}.select-dropdown {position: relative;display: block;width: 100%;}.select-dropdown__button {padding: 10px 35px 10px 15px;background-color: #fff;color: #616161;border: 1px solid #cecece;border-radius: 3px;cursor: pointer;width: 210px;text-align: left;}.select-dropdown__button::focus {outline: none;}.select-dropdown__button .zmdi-chevron-down {position: absolute;right: 10px;top: 12px;}.select-dropdown__list {position: absolute;display: block;left: 0;right: 0;max-height: 300px;overflow: auto;margin: 0;padding: 0;list-style-type: none;opacity: 0;pointer-events: none;transform-origin: top left;transform: scale(1, 0);transition: all ease-in-out 0.3s;z-index: 2;}.select-dropdown__list.active {opacity: 1;pointer-events: auto;transform: scale(1, 1);}.select-dropdown__list-item {display: block;list-style-type: none;padding: 10px 15px;background: #fff;border-top: 1px solid #e6e6e6;font-size: 14px;line-height: 1.4;cursor: pointer;color: #616161;transition: all ease-in-out 0.3s;}.answer_parent{display:none}.revive_icon{transition:.3s;transform:rotate(0);color:#74a244}.transform_icon{transition:.3s;transform:rotate(135deg);color:#c41e1ee6}.question.active::after{color:var(--secondary)!important;transform:rotate(45deg)}.question::after{content:"\002B";font-size:2.2rem;position:absolute;right:20px;transition:.2s}{background-color:#fff;color:#000;border-radius:20px;box-shadow:0 1px 4px 2px rgb(0 0 0 / 17%);margin:20px 0}.question{font-size:1.2rem;padding:20px 80px 20px 20px;position:relative;display:flex;align-items:center;cursor:pointer}.answercont{max-height:0;overflow:hidden;transition:.3s}.answer{padding:0 20px 20px;color:#444}
    </style>
</head>
<body>
    @include('sidebar')
    @include('header')
    <div class="greeting_section rounded-5 p-4 pt-lg-4 pt-md-4 pt-5 pb-0 row align-items-center">
        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
            <h1 class="fw-medium h2 mt-3 my-1 text-capitalize text-white">Welcome back, {{auth()->user()->first_name}}</h1>
            <p class="fw-light text-white">Adding a student to a teacher's group ensures personalized attention, structured learning, peer support, and efficient progress monitoring, enhancing their education.</p>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-12 text-lg-end text-md-end text-center"><img src="{{url('images/parent_portal_header.webp')}}" height="auto" width="280" class="parent_portal_banner_image" alt="an happy parent cartoon couple with learning concept"></div>
    </div>

    <h3 class="text-capitalize mb-0">Add student to teacher's group</h3>
    <p class="small text-danger">To add a student to your group, please enter their username or email, along with their password.</p>
    <form action="{{ route('add_student_to_group') }}" method="post">
        @csrf
        <div class="row bg-white my-4 py-3 px-2 rounded-4 shadow-sm">
            <div class="col-12 col-sm-6">
                <div class="form-group">
                    <label class="form-label" for="username">Username or Email</label>
                    <input class="form-control shadow-none" type="text" name="username" id="username" placeholder="Please enter username or email">
                    @error('username')
                        <div class="mb-1 small text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-12 col-sm-6">
                <div class="form-group">
                    <label class="form-label" for="password">Password</label>
                    <input class="form-control shadow-none" type="password" name="password" id="password" placeholder="Please enter password">
                    @error('password')
                        <div class="mb-1 small text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-12 text-end">
                <input class="btn btn-primary" type="submit" value="Add To Group">
            </div>
        </div>
    </form>



    @include('parentsidebar.sidebarending')
</body>

</html>
