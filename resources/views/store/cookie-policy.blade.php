<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ app(\App\Settings\SiteSettings::class)->app_name}} Cookie Policy - Learn About Data Usage</title>
    <meta name="description" content="Our cookie policy explains how TutorsElevenPlus uses cookies to improve your user experience, ensuring a seamless 11+ study journey.">
    <meta name="author" content="{{ app(\App\Settings\SiteSettings::class)->app_name }}">
    <link rel="icon" href="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}">
    <link rel="canonical" href="{{ url()->current() }}"/>
	<link rel="alternate" href="{{ url()->current() }}" hreflang="en-gb">
    <!-- preload links  -->
    <link rel="preload" href="{{url('Frontend_css/all.css')}}" as="style">
    <link rel="preload" href="{{url('Frontend_css/style.css')}}" as="style">
    <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" as="style">
    <link rel="preconnect" href="https://googleads.g.doubleclick.net">
    <link rel="preconnect" href="https://td.doubleclick.net">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://www.google-analytics.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Kanit:wght@200;300;400;500&display=swap">
    <link rel="stylesheet" href="{{url('Frontend_css/all.css')}}" />
    <link rel="stylesheet" href="{{url('Frontend_css/style.css')}}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    @include('components.google-tags')
    <style> 
        .privacy_section {
            height: auto;
            width: auto;
            margin: 6rem auto;
        }
        a {
            color: var(--primary) !important
        }
    </style>
</head>

<body>

    <section>@include('components.home-navbar')</section><section class="privacy_section fixed_width py-4"><div class="section_heading"><h1 class="display-4 text-center fw-medium text-uppercase">Tutors Cookie Policy</h1><div class="heading_separator rounded-pill mx-auto mb-4"></div></div><p class="fw-light my-4 text-center fs-5 ms-3">At TutorsElevenPlus, we are committed to safeguarding your privacy. This Cookie Policy explains how we use cookies and similar technologies on our website to enhance your browsing experience. Please read this policy carefully to understand our practises regarding cookies.</p><div class="my-5 ms-3 col-12"><h2 class="display-6 fw-normal mb-4">What Are Cookies?</h2><p class="fw-light my-3 fs-5">'Cookies' are small text files that are stored by the web browser on your computer or mobile phone. Websites use these files to store information such as personalization details or the contents of a shopping basket. Learn more about cookies at <a href="https://allaboutcookies.org/" target="_blank">www.allaboutcookies.org</a>.</p></div><div class="my-5 ms-3"><h2 class="display-6 fw-normal mb-4">Why We Uses Cookies?</h2><p class="fw-light my-3 fs-5">'At Tutorselevenplus, we use cookies to make your online learning experience as fun, safe, and smooth as possible. Cookies are like tiny helpers that make our website work better for you.</p></div><div class="my-5 ms-3"><h2 class="display-6 fw-normal mb-4">Cookies Used on This Website</h2><p class="fw-light my-3 fs-5">We use cookies on our website for the following purposes:</p><ul><li class="fw-light my-1 fs-5">To collect statistical data about website usage through 'Google Analytics.'</li><li class="fw-light my-1 fs-5">To deliver targeted and relevant advertisements.</li><li class="fw-light my-1 fs-5">To keep you logged into our website for your convenience.</li></ul></div><div class="my-5 ms-3"><h2 class="display-6 fw-normal mb-4">Disabling Cookies</h2><p class="fw-light my-3 fs-5">If you wish, you can disable cookies from your browser and delete all cookies currently stored on your computer. However, this may affect the functionality of websites you visit.</p></div><div class="my-5 ms-3"><h2 class="display-6 fw-normal mb-4">Google Analytics</h2><p class="fw-light my-3 fs-5">We use Google Analytics, a web analytics service provided by Google, Inc. Google Analytics sets cookies to evaluate website usage and compile reports for us. Google stores this information on servers in the USA.</p><p class="fw-light my-3 fs-5">By using our website, you consent to the processing of data about you by Google. Learn more about Google Analytics and how to manage cookies on their <a href="https://policies.google.com/privacy" target="_blank">Privacy Policy</a> page.</p></div><div class="my-5 ms-3"><h2 class="display-6 fw-normal mb-4">Log Files</h2><p class="fw-light my-3 fs-5">We use log files to collect standard information about visitors to our website, including IP addresses, browser types, and timestamps. This information is used for analyzing trends and improving the user experience.</p></div><div class="my-5 ms-3"><h2 class="display-6 fw-normal mb-4">Third-Party Cookies</h2><p class="fw-light my-3 fs-5">Some advertisers on our site may use cookies and web beacons. Please review the privacy policies of our advertising partners for details on their data collection practises.</p></div><div class="my-5 ms-3"><h2 class="display-6 fw-normal mb-4">Acceptance of Our Cookie Policy</h2><p class="fw-light my-3 fs-5">By using our website, you consent to our Cookie Policy and agree to its Terms and Conditions.</p></div><div class="my-5 ms-3"><h2 class="display-6 fw-normal mb-4">Cookies and your privacy</h2><p class="fw-light my-3 fs-5">We respect your privacy and will never sell or share your personal information with third parties. However, we may use cookies to collect information about your browsing activity on our website. This information is used to improve our website and deliver targeted advertising.</p></div><div class="my-5 ms-3"><h2 class="display-6 fw-normal mb-4">How to manage your cookie settings on different browsers</h2><p class="fw-light my-3 fs-5"></p><ul><li class="fw-light my-1 fs-5">Chrome: <a target="_blank" href="https://support.google.com/chrome/answer/95647?hl=en.">https://support.google.com/chrome/answer/95647?hl=en.</a></li><li class="fw-light my-1 fs-5">Firefox: <a target="_blank" href="https://support.mozilla.org/en-US/kb/cookies-information-websites-store-on-your-computer">https://support.mozilla.org/en-US/kb/cookies-information-websites-store-on-your-computer</a></li><li class="fw-light my-1 fs-5">Safari: <a target="_blank" href="https://support.apple.com/en-us/HT201265">https://support.apple.com/en-us/HT201265</a></li><li class="fw-light my-1 fs-5">Edge: <a target="_blank" href="https://support.microsoft.com/en-us/help/4027947/windows-delete-cookies">https://support.microsoft.com/en-us/help/4027947/windows-delete-cookies</a></li></ul><p></p></div><div class="my-5 ms-3"><h2 class="display-6 fw-normal mb-4">Additional Information</h2><p class="fw-light my-3 fs-5">If you have any further questions about our use of cookies, please contact us at <a href="#">contact@tutorselevenplus.co.uk</a>.</p><p class="fw-light my-3 fs-5">Please note that other websites linked from our site may have their own cookie policies.</p></div><div class="my-5 ms-3"><h2 class="display-6 fw-normal mb-4">How We Use Cookies to Enhance Your Experience</h2><p class="fw-light my-3 fs-5">At Tutorselevenplus, we are dedicated to providing you with an enriching and Personalised online learning experience. To achieve this, we utilize cookies, which are small text files stored by your web browser on your computer or mobile phone. These cookies serve as valuable tools that enhance the functionality and convenience of our website.</p></div><div class="my-5 ms-3"><h2 class="display-6 fw-normal mb-4">Stay Informed about Cookie Policies</h2><p class="fw-light my-3 fs-5">Additionally, please be aware that external websites linked from our site may have their own cookie policies. We recommend staying informed about these policies when visiting linked websites to ensure your privacy and security online.</p></div></section>@include('components.home-footer')

    <script defer src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
        integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function () {
            $("#navbar_nav").removeClass("absolute_nav").addClass('fixed-top fixed_nav col-lg-11 col-12');
        });
    </script>
</body>

</html>