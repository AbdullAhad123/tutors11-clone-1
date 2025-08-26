<!doctype html>
<html>

@include('components.doc-defaulthead', ['Title' => "View And Export Reports - Manage Tests"])

<body>

    <!-- FULLSCREEN HTML CODE  -->

    <div id="full_page">
        <div class="cancel">
            <i class="fa fa-times fa_cancel_icon"></i>
        </div>
        <div class="image_section"></div>
    </div>

    <!-- navbar starts-->
    @include('components.doc-navbar')

    <div class="wrapper">

        <!-- SIDE BAR  -->
        @include('components.doc-sidebar')

        <!-- body starts  -->

        <article class="doc__content" data-bs-spy="scroll" data-bs-target="#list-example" data-bs-smooth-scroll="true" class="scrollspy-example" tabindex="0">

            <section class="body-section">
                <h3 class="section__title h1">View & Export Reports</h3>
                <p class="mt-5 mb-3">You can access reports of Quiz, Quiz Schedules, and Question Sets and export them to Excel files.</p>

                <p class="mt-5 fw-bold">Access Quiz Reports</p>

                <ol class="mt-4">
                    <li class="my-2">
                        <p class="my-2">Log in to Admin/Instructor account and select <span class="bg-light d-inline-flex px-1 py-1 monospace_class">Tests > Quizzes</span> from the sidebar menu.</p>
                    </li>
                    <li class="my-2">Click on the analytics icon from the <b>Actions</b> column of a quiz.</li>
                    <li class="my-2">You will be redirected to Quiz Overall Report.</li>
                    <li class="my-2">Click on Detailed Report to access test takers.</li>
                </ol>


                <div style=" min-width: 280px;" class="col-12 mt-5">
                    <img src="{{url('images\docs_img\analytics.JPG')}}" alt="analytics" height="auto" width="auto" class="img-fluid col-12">
                </div>

                <p class="mt-5 fw-bold">Access Quiz Schedule Reports</p>

                <ol class="mt-4">
                    <li class="my-2">
                        <p class="my-2">Log in to Admin/Instructor account and select <span class="bg-light d-inline-flex px-1 py-1 monospace_class">Tests > Quizzes</span> from the sidebar menu.</p>
                    </li>
                    <li class="my-2">Click on the edit icon from the <b>Actions</b> column of a quiz.</li>
                    <li class="my-2">Then Go to Quiz Schedules.</li>
                    <li class="my-2">Click on the analytics icon from the <b>Actions</b> column of a quiz.</li>
                    <li class="my-2">You will be redirected to Quiz Schedule Overall Report.</li>
                    <li class="my-2">Click on Detailed Report to access test takers.</li>
                </ol>

                <p class="mt-5 fw-bold">Access Question Set Reports</p>

                <ol class="mt-4">
                    <li class="my-2">
                        <p class="my-2">Log in to Admin/Instructor account and select <span class="bg-light d-inline-flex px-1 py-1 monospace_class">Tests > Question Sets</span> from the sidebar menu.</p>
                    </li>
                    <li class="my-2">Click on the edit icon from the <b>Actions</b> column of a Question Set.</li>
                    <li class="my-2">You will be redirected to Question Set Overall Report.</li>
                    <li class="my-2">Click on Detailed Report to access test takers.</li>
                </ol>

            </section>

            <section class="body-section">
                <div class="row">
                    <div class="col-lg-5 mx-2 px-3 mt-5 border rounded-2  prev-inst-container">
                        <a href="/admin/docs/manage-tests/quiz-schedule" class="text-muted">
                            <div class="text-dark d-flex justify-content-between align-items-center">
                                <ul class="list-unstyled align-items-center flex-box-container">
                                    <li class=" mt-3"><i class="fa-solid fa-arrow-left fa-lg"></i></li>
                                </ul>
                                <ul class="list-unstyled align-items-center flex-box-container text-end">
                                    <li class="next-inst-text mt-3">Manage Tests - Previous</li>
                                    <li>
                                        <h5 class="pre-req-text">Quiz Schedules</h5>
                                    </li>
                                </ul>
                            </div>
                        </a>
                    </div>
                    <div class=" col-lg-5 mx-2 px-3 mt-5 border rounded-2  next-inst-container">
                        <a href="/admin/docs/other/common-issues-and-fixes" class="text-muted">
                            <div class="text-dark d-flex justify-content-between align-items-center">
                                <ul class="list-unstyled align-items-center flex-box-container">
                                    <li class="next-inst-text mt-3">Next - Others</li>
                                    <li>
                                        <h5 class="pre-req-text">Common Issues & Fixes</h5>
                                    </li>
                                </ul>
                                <ul class="list-unstyled align-items-center flex-box-container">
                                    <li class=" mt-3"><i class="fa-solid fa-arrow-right fa-lg"></i></li>
                                </ul>
                            </div>
                        </a>
                    </div>
                </div>
            </section>

        </article>

        <aside class=" rhs-spy bg-white h-100 p-2 pt-5">
            <h6>On This Page</h6>
            <div id="list-example" class="list-group">
            </div>
        </aside>

    </div>

    <!-- javascript includes  -->

    @include('components.doc-defaultjs')

</body>

</html>