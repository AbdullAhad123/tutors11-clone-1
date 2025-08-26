<!doctype html>
<html>

@include('components.doc-defaulthead', ['Title' => "Change Log - Others"])


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
                <h3 class="section__title h1">Change Log</h3>
                <p class="section__title__para">Change log and Version history</p>
            </section>

            <section class="body-sections" id="list-item-2">
                <h3 class="section__title mt-5">1.3.0 - 15/02/2022</h3>
            </section>

            <section class="body-sections" id="list-item-3">
                <h3 class="section__title mt-5">Fixed</h3>
                <ul class="mt-4">
                    <li class="my-2">Quiz attempts issue</li>
                    <li class="my-2">Quiz report PDF Timezone issue</li>
                    <li class="my-2">Quiz attempts issue</li>
                    <li class="my-2">High/Low Score issue in some cases</li>
                    <li class="my-2">Video playing issue in macOS</li>
                    <li class="my-2">Success/Error message quick disappearing issue</li>
                    <li class="my-2">Page titles are now translateable</li>
                </ul>
            </section>

            <section class="body-sections" id="list-item-4">
                <h3 class="section__title mt-5">Added</h3>
                <ul class="mt-4">
                    <li class="my-2">Select/Change syllabus feature</li>
                    <li class="my-2">Shuffle/randomize questions in a quiz</li>
                    <li class="my-2">Paid Quizzes, Question Sets, Lessons & Videos</li>
                    <li class="my-2">Plans & subscriptions with customized pricing</li>
                    <li class="my-2">Razorpay Payment Gateway Integration</li>
                    <li class="my-2">Bank Payments & Approvals</li>
                    <li class="my-2">Manually add users to subscription</li>
                    <li class="my-2">Add Multiple Taxes to the Order</li>
                    <li class="my-2">Direct discounts to the plans</li>
                    <li class="my-2">View/Print Invoices</li>
                    <li class="my-2">Test Schedules Calendar in User Dashboard</li>
                    <li class="my-2">Learning with Lessons</li>
                    <li class="my-2">Learning with Videos</li>
                    <li class="my-2">Search/Filter Questions, Lessons & Videos by Tags</li>
                    <li class="my-2">Enable/Disable debug mode from maintenance settings</li>
                    <li class="my-2">Improved Quiz screen and question palette</li>
                    <li class="my-2">Online/Offline detection in quiz screen</li>
                </ul>
            </section>

            <section class="body-sections" id="list-item-5">
                <h3 class="section__title mt-5">1.2.0 - 16/11/2021</h3>
            </section>

            <section class="body-sections" id="list-item-6">
                <h3 class="section__title mt-5">Fixed</h3>
                <ul class="mt-4">
                    <li class="my-2">Fixed Quiz Reports error with MariaDB</li>
                    <li class="my-2">Fixed Quiz Attempts of a User Showing in Other Student Reports</li>
                    <li class="my-2">Fixed Unable to Take Test For Multiple Students at a Time issue</li>
                </ul>
            </section>

            <section class="body-sections" id="list-item-7">
                <h3 class="section__title mt-5">Added</h3>
                <ul class="mt-4">
                    <li class="my-2">Added MariaDB Support (Version > 10.3)</li>
                    <li class="my-2">Right-to-Left (RTL) Support</li>
                    <li class="my-2">Multi-Language Translation Ready - Both User & Admin Dashboards</li>
                    <li class="my-2">Fully Configurable Custom Home Page - Top Bar, Hero, Features, Categories, Statistics, Testimonials, Footer Call-To-Action, Footer Links & Social Links</li>
                    <li class="my-2">Custom Theme Color - Primary Color & Secondary Color </li>
                    <li class="my-2">Custom Font Settings</li>
                    <li class="my-2">White Logo for Dark Backgrounds</li>
                    <li class="my-2">Fix Storage Links through Maintenance Settings</li>
                </ul>
            </section>

            <section class="body-sections" id="list-item-8">
                <h3 class="section__title mt-5">1.1.0 - 08/08/2021</h3>
            </section>

            <section class="body-sections" id="list-item-9">
                <h3 class="section__title mt-5">Fixed</h3>
                <ul class="mt-4">
                    <li class="my-2">Multiple blanks issue with Fill in the Blank (FIB) question type has been fixed</li>
                </ul>
            </section>

            <section class="body-sections" id="list-item-10">
                <h3 class="section__title mt-5">Added</h3>
                <ul class="mt-4">
                    <li class="my-2">Admin & Instructors can access the overall and detailed reports of User Quiz and Practise sessions.</li>
                    <li class="my-2">Admin & Instructors can download detailed reports of User Quiz and Practise sessions in Excel format</li>
                    <li class="my-2">Users can download their Quiz Score Report Cards in PDF format.</li>
                </ul>
            </section>

            <section class="body-sections" id="list-item-11">
                <h3 class="section__title mt-5">1.0.0 - 28/07/2021</h3>
            </section>

            <section class="body-sections" id="list-item-12">
                <h3 class="section__title mt-5">First Release</h3>
                <ul class="mt-4">
                    <li class="my-2">Admin & Instructors can access the overall and detailed reports of User Quiz and Practise sessions.</li>
                    <li class="my-2">Admin & Instructors can download detailed reports of User Quiz and Practise sessions in Excel format</li>
                    <li class="my-2">Users can download their Quiz Score Report Cards in PDF format.</li>
                </ul>
            </section>

            <section class="body-section">
                <div class="row">
                    <div class="col-lg-5 mx-2 px-3 mt-5 border rounded-2  prev-inst-container">
                        <a href="/admin/docs/other/common-issues-and-fixes" class="text-muted">
                            <div class="text-dark d-flex justify-content-between align-items-center">
                                <ul class="list-unstyled align-items-center flex-box-container">
                                    <li class=" mt-3"><i class="fa-solid fa-arrow-left fa-lg"></i></li>
                                </ul>
                                <ul class="list-unstyled align-items-center flex-box-container text-end">
                                    <li class="next-inst-text mt-3">Previous</li>
                                    <li>
                                        <h5 class="pre-req-text">Common Issues & Fixes</h5>
                                    </li>
                                </ul>
                            </div>
                        </a>
                    </div>
                    <div class=" col-lg-5 mx-2 px-3 mt-5 border rounded-2  next-inst-container">
                        <a href="/admin/docs/other/support-and-faq" class="text-muted">
                            <div class="text-dark d-flex justify-content-between align-items-center">
                                <ul class="list-unstyled align-items-center flex-box-container">
                                    <li class="next-inst-text mt-3">Next - Other</li>
                                    <li>
                                        <h5 class="pre-req-text">Support & FAQ</h5>
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
                <a class="list-group-item list-group-item-action px-1" href="#list-item-2">1.3.0 - 15/02/2022</a>
                <a class="list-group-item list-group-item-action" href="#list-item-3">Fixed</a>
                <a class="list-group-item list-group-item-action" href="#list-item-4">Added</a>
                <a class="list-group-item list-group-item-action px-1" href="#list-item-5">1.2.0 - 16/11/2021</a>
                <a class="list-group-item list-group-item-action" href="#list-item-6">Fixed</a>
                <a class="list-group-item list-group-item-action" href="#list-item-7">Added</a>
                <a class="list-group-item list-group-item-action px-1" href="#list-item-8">1.1.0 - 08/08/2021</a>
                <a class="list-group-item list-group-item-action" href="#list-item-9">Fixed</a>
                <a class="list-group-item list-group-item-action" href="#list-item-10">Added</a>
                <a class="list-group-item list-group-item-action px-1" href="#list-item-11">1.0.0 - 28/07/2021</a>
                <a class="list-group-item list-group-item-action" href="#list-item-12">First Release </a>
            </div>
        </aside>

    </div>

    <!-- javascript includes  -->

    @include('components.doc-defaultjs')

</body>

</html>