<?php use Illuminate\Support\Str; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eleven Plus Tutors in {{ $region->name }} - TutorsElevenPlus</title>
    <meta name="description" content="{{ $region->description }}">

    <meta name="author" content="{{ app(\App\Settings\SiteSettings::class)->app_name }}">
    <meta name="keywords" content="{{ app(\App\Settings\KeywordsSettings::class)->keywords['region_keywords'] }}">
    <link rel="canonical" href="{{ url()->current() }}" />
    <link rel="alternate" href="{{ url()->current() }}" hreflang="en-gb">
    <link rel="icon" href="{{ url('storage/' . app(\App\Settings\SiteSettings::class)->favicon_path) }}">
    <!-- preload links  -->
    <link rel="preload" href="{{ url('Frontend_css/all.css') }}" as="style">
    <link rel="preload" href="{{ url('Frontend_css/style.css') }}" as="style">
    <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        as="style">
    <link rel="preconnect" href="https://googleads.g.doubleclick.net">
    <link rel="preconnect" href="https://td.doubleclick.net">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://www.google-analytics.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- css links -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Kanit:wght@200;300;400;500&display=swap">
    <link rel="stylesheet" href="{{ url('Frontend_css/all.css') }}" />
    <link rel="stylesheet" href="{{ url('Frontend_css/style.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    @include('components.google-tags')
    <style>
        .region_header_section {
            background: radial-gradient(var(--lightprimary), var(--primary));
        }

        .region-list-one li {
            font-size: 18px;
            font-weight: 500;
            text-decoration: underline;
        }

        .region-list-two li {
            font-size: 18px;
            font-weight: 500;
            text-decoration: underline;
        }

        .region_text_section p {
            font-size: 18px;
        }

        .line_height {
            line-height: 1.8;
        }
        a {
            color: var(--primary) !important
        }
    </style>
</head>

<body>
    <section>@include('components.home-navbar')<header class="region_header_section py-5">
            <div class="col-lg-11 col-md-12 col-sm-12 col-12 mx-auto py-lg-5 py-md-5 py-0">
                <div class="row align-items-center m-0">
                    <div class="col-12 col-lg-6 col-md-10 col-sm-12 mt-5 py-5">
                        <h1 class="display-6 fw-bold mt-4 text-white">Eleven Plus Tutors in {{ $region->name }}</h1>
                        <p class="h5 fw-light text-white my-1 line_height">{{ $region->description }}</p>
                    </div>
                    <div class="col-12 col-lg-6 col-md-12 col-sm-12">
                        <div class="fixed_header_media_width mx-auto"><img
                                src="{{ url('images/region-school-header.png') }}" width="100%" height="auto"
                                alt="TutorsElevenPlus learning isometric" class="learning-image img-fluid"></div>
                    </div>
                </div>
            </div>
        </header>
    </section>
    <section class="region_text_section my-5 py-3">
        <div class="container">
            <div class="row align-items-center">
                <div class="align-items-center col-12 col-lg-6 col-md-12 col-sm-12">
                    <p class="fw-light mb-1 my-1 line_height"><span class="text_primary fw-normal">‘ Information is the
                            Key of success’</span> is a valid motto in the context of the Tutorselevenplus.</p>
                    <p class="fw-light mb-1 my-3 line_height">Tests are different in various places and schools. They
                        have different ways of testing and specific rules for getting into a school. This website is all
                        about giving you fair advice on every part of this process. The main goal is to help you
                        understand everything and guide you through the complicated steps of moving your child to a new
                        school.</p>
                    <p class="fw-light mb-1 my-3 line_height">Within each geographical section, you'll discover details
                        regarding admissions to the 100 grammar schools still present in UK. Additionally, comprehensive
                        information is provided about the partially selective schools found in specific regions</p>
                    <p class="fw-light mb-1 my-3 line_height">We are always grateful for contributions to this site from
                        those with detailed local knowledge. If you think you have more information to add, please send
                        us an email. <a
                            href="https://mail.google.com/mail/u/0/?tab=rm&ogbl#inbox?compose=GTvVlcSBmlwGfVkCvjcNcbdTBcCRVjDHlKNHjZBBjWjgVkrDHtjfvmDxCZZVLRjKNGnlRGdRkwvSM"
                            target="_blank">contact@tutorselevenplus.co.uk</a></p>
                </div>
                <div class="col-12 col-lg-6 col-md-12 col-sm-12 d-flex justify-content-center"><img
                        src="{{ url('images/school_regions_image.jpg') }}" height="100%" width="100%"
                        alt="a concept of learning"></div>
            </div>
        </div>
    </section>
    <section class="region_section my-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-md-8 col-sm-12 col-12">
                    <h2 class="fw-bold">Regions</h2>
                    <p class="fw-light my-2 fs-5 line_height">Providing information on selective schools in each area,
                        along with details about their admission procedures and testing processes.</p>
                    <div class="row">
                        <div class="region-list-one col-12 my-3">
                            <ul class="list-unstyled">
                                @foreach ($schools as $school)
                                    <a
                                        href="{{ route('topic', ['subject_region' => $school->regionData->slug, 'topic_school' => $school->slug]) }}">
                                        <li class="my-2"><i class="fa fa-caret-right fa-2xl mx-2"
                                                style="color:#fab383"></i>{{ $school->name }}</li>
                                    </a>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- footer  -->
    @include('components.home-footer')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
        integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous">
    </script>

</body>

</html>
