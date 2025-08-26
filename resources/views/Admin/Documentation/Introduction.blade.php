<!doctype html>
<html>
@include('components.doc-defaulthead', ['Title' => "Introduction"])

<body>

    <!-- FULLSCREEN HTML CODE  -->

    <div id="full_page">
        <div class="cancel">
            <i class="fa fa-times fa_cancel_icon"></i>
        </div>
        <div class="image_section"></div>
    </div>

    <!-- navbar starts  -->
        @include('components.doc-navbar')

    <div class="wrapper">

        <!-- SIDE BAR  -->
        @include('components.doc-sidebar')

        <!-- body starts  -->

        <article class="doc__content" data-bs-spy="scroll" data-bs-target="#list-example" data-bs-smooth-scroll="true" class="scrollspy-example" tabindex="0">

            <section class="body-section">
                <h3 class="section__title h1">Introduction</h3>
                <p class="section__title__para">Thank you for your interest in Tutor 11. Let's get started.</p>
            </section>

            <section class="body-sections" id="list-item-2">
                <h3 class="section__title mt-5">Hey There!</h3>
                <p class="my-3">Thank you for your interest in Tutor 11.</p>
                <p class="my-3">Tutor 11+ is an open-source online examination software and assessment tool that assists educational institutions, corporate companies to create and conduct web and mobile-based exams.</p>
                <p class="my-3">Visit the website for more details. <a target="_blank" href="https://Tutor 11+.nearchip.com/">https://Tutor 11+.nearchip.com</a></p>
                <p class="my-3">Before purchasing, review our <a href="/admin/docs/other/support-and-faq">Support & FAQ</a></p>
                <p class="my-3">This documentation covers mostly all the aspects of setting up Tutor 11+ Online Exam Software.</p>
                <p class="my-3">For any pre-sale queries or tech support, please create a ticket on <a target="_blank" href="https://nearchip.freshdesk.com/"> https://nearchip.freshdesk.com/</a>.</p>
            </section>

            <section class="body-section" id="list-item-3">
                <h3 class="section__title mt-5">Use Cases</h3>
                <ul class="mt-4">
                    <li class="my-2">Create and Conduct Quizzes, Online Exams, and Practise Tests</li>
                    <li class="my-2">Schedule and Conduct Live Exams</li>
                    <li class="my-2">Create Adaptive Learning Experience using Question Sets</li>
                    <li class="my-2">Suitable for all types of Educational Institutions, Corporates, and Individual Tutors</li>
                </ul>
            </section>

            <section class="body-section" id="list-item-4">
                <h3 class="section__title mt-5">Main Features</h3>
                <p class="my-3">The following are the features of Tutor 11+:</p>
                <ul class="mt-4">
                    <li class="my-2">
                        Multiple Exam Types
                        <ol>
                            <li class="my-2">Quizzes</li>
                            <li class="my-2">Question Sets</li>
                        </ol>
                    </li>
                    <li class="my-3">Adaptive Learning Experience</li>
                    <li class="my-3">Live Schedules</li>
                    <li class="my-3">
                        Multiple Question Types
                        <ol>
                            <li class="my-2">Multiple Choice Single Answer</li>
                            <li class="my-2">Multiple Choice Multiple Answers</li>
                            <li class="my-2">Fill in the Blanks</li>
                            <li class="my-2">Matching</li>
                            <li class="my-2">Sequence</li>
                            <li class="my-2">True/False</li>
                            <li class="my-2">Short Answer</li>
                        </ol>
                    </li>
                    <li class="my-3">
                        Question Attachment
                        <ol>
                            <li class="my-2">Comprehension Passage</li>
                            <li class="my-2">Audio File</li>
                            <li class="my-2">Video File</li>
                            <li class="my-2">Math Equation</li>
                            <li class="my-2">Image</li>
                            <li class="my-2">Tabular Data</li>
                        </ol>
                    </li>
                </ul>
            </section>

            <section class="body-section" id="list-item-5">
                <h3 class="section__title mt-5">Open Source Tech Stack</h3>
                <p class="my-3">Tutor 11+ is a Single Page Application (SPA) built on top of the Laravel (World's Leading PHP Framework) and Vue.js (Fastest JavaScript Framework).</p>
                <ul class="mt-4">
                    <li class="my-2">Laravel - <a target="_blank" href="https://www.laravel.com">https://www.laravel.com</a></li>
                    <li class="my-2">Laravel Jetstream - <a target="_blank" href="https://jetstream.laravel.com">https://jetstream.laravel.com</a></li>
                    <li class="my-2">Vue.js - <a target="_blank" href="https://www.vuejs.org">https://www.vuejs.org</a></li>
                    <li class="my-2">Inertia.js - <a target="_blank" href="https://inertiajs.com">https://inertiajs.com</a></li>
                    <li class="my-2">Tailwind CSS - <a target="_blank" href="https://tailwindcss.com">https://tailwindcss.com</a></li>
                    <li class="my-2">Prime Vue - <a target="_blank" href="https://www.primefaces.org/primevue">https://www.primefaces.org/primevue</a></li>
                    <li class="my-2">CKEditor 4 - <a target="_blank" href="https://ckeditor.com/ckeditor-4">https://ckeditor.com/ckeditor-4</a></li>
                </ul>
                <p class="my-3">See more on the <a href="/admin/docs/other/credits">credits</a> page.</p>
            </section>

            <section class="body-section">
                <div class="px-3 mt-5 border rounded-2  next-inst-container">
                    <a href="/admin/docs/pre-requisites" class="text-muted">
                        <div class="text-dark d-flex justify-content-between align-items-center">
                            <ul class="list-unstyled align-items-center flex-box-container">
                                <li class="next-inst-text mt-3">Next - Installation</li>
                                <li>
                                    <h5 class="pre-req-text">Pre-requisites</h5>
                                </li>
                            </ul>
                            <ul class="list-unstyled align-items-center flex-box-container">
                                <li class=" mt-3"><i class="fa-solid fa-arrow-right fa-lg"></i></li>
                            </ul>
                        </div>
                    </a>
                </div>
            </section>

        </article>

        <aside class=" rhs-spy bg-white h-100 p-2 pt-5">
            <h6>On This Page</h6>
            <div id="list-example" class="list-group">
                <a class="list-group-item list-group-item-action" href="#list-item-2">Hey There!</a>
                <a class="list-group-item list-group-item-action" href="#list-item-3">Use Cases</a>
                <a class="list-group-item list-group-item-action" href="#list-item-4">Main Features</a>
                <a class="list-group-item list-group-item-action" href="#list-item-5">Open Source Tech Stack</a>
            </div>
        </aside>

    </div>

    <!-- DEFUALTJS -->  
    @include('components.doc-defaultjs')

</body>

</html>