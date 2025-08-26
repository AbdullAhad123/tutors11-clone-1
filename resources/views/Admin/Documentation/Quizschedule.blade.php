<!doctype html>
<html>

@include('components.doc-defaulthead', ['Title' => "Quiz Schedules - Manage Tests"])

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
                <h3 class="section__title h1">Quiz Schedules</h3>
                <p class="section__title__para">Learn how to schedule quizzes to user groups</p>
                <p class="my-4">You can schedule quizzes to explicitly provide access to user groups for a specific time period. Tutor11 supports two types of schedules.</p>

                <ol class="mt-4">
                    <li class="my-2"><a href="#list-item-2">Fixed Schedule</a></li>
                    <li class="my-2"><a href="#list-item-3">Flexible Schedule</a></li>
                </ol>

                <p class="my-3">
                    To manage Quiz Schedules, go to
                    <span class="bg-light d-inline-flex px-1 py-1 monospace_class">Tests > Quizzes</span>
                    and click on the clock icon of a quiz.
                </p>

                <ol class="mt-4">
                    <li class="my-2">
                        To create a new schedule, click on the <b>New Schedule</b> button in the top right corner.
                    </li>
                    <li class="my-2">
                        Select <b>Schedule Type</b>, Timings and, <b>User Groups</b>.
                    </li>
                    <li class="my-2">
                        Make sure to set status as <b>Active</b>.
                    </li>
                    <li class="my-2">
                        Finally, click on <b>Create</b>.
                    </li>
                </ol>

                <div class="my-4 d-flex bg-light p-2 rounded-1" style="border-left: 4px solid #d33d3d;">
                    <div>
                        <ol class="m-0 d-flex justify-content-evenly p-1 list-unstyled">
                            <li class="my-1">
                                <svg viewBox="0 0 16 16" class="me-2" fill="none" preserveAspectRatio="xMidYMid meet" style="vertical-align: middle; width: 20px; height: 20px; color: #d33d3d;">
                                    <g clip-path="url(#Alert_svg__clip0_1373_8670)" fill="currentColor">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M5.47 2.387a2.895 2.895 0 015.06 0l4.679 8.272c1.107 1.958-.267 4.441-2.53 4.441H3.32c-2.263 0-3.637-2.483-2.53-4.44l4.68-8.273zm4.015.591a1.695 1.695 0 00-2.97 0l-4.68 8.272c-.674 1.194.182 2.65 1.486 2.65h9.358c1.304 0 2.16-1.456 1.485-2.65L9.485 2.978z"></path>
                                        <path d="M8 12.95a.9.9 0 110-1.8.9.9 0 010 1.8zM7.25 4.79c0-.27.187-.49.417-.49h.666c.23 0 .417.22.417.49v2.247c0 .462.049 1.05-.043 1.499L8.5 9.55c-.103.681-.898.68-1 0l-.207-1.014c-.091-.45-.043-1.037-.043-1.5V4.79z"></path>
                                    </g>
                                    <defs>
                                        <clipPath id="Alert_svg__clip0_1373_8670">
                                            <path fill="#fff" d="M0 0h16v16H0z"></path>
                                        </clipPath>
                                    </defs>
                                </svg>
                            </li>
                            <li class="my-1 text-justify px-2">
                                You can't edit/update once the quiz schedule starts or expired. You may need to create a new schedule.
                            </li>
                        </ol>
                    </div>
                </div>

                <p class="my-2">
                    Further, read below to know more about schedule types.
                </p>

            </section>

            <section class="body-sections" id="list-item-2">
                <h3 class="section__title mt-5">Fixed Schedule</h3>

                <ul class="mt-4">
                    <li class="my-2">In <b>Fixed Schedule</b>, you need to specify <b>Start Date</b> and <b>Start Time</b>. </li>
                    <li class="my-2">Quiz <b>End Date</b> and <b>End Time</b> will be calculated based on Quiz Duration. </li>
                    <li class="my-2">You can define a grace period to ensure safe access to the test takers at least 5 minutes.</li>
                    <li class="my-2">Test takers can start the quiz between the quiz start time and grace period.</li>
                    <li class="my-2">Quiz strictly finished on <b>End Date Time</b>.</li>
                </ul>

                <div style=" min-width: 280px;" class="col-10 mx-auto mt-4">
                    <img src="{{url('images\docs_img\fixed-schedule.webp')}}" alt="Fixed Schedule" height="auto" width="auto" class="img-fluid col-12">
                </div>


                <p class="mt-4 mb-3">
                    E.g., If you have a defined quiz of 60 minutes and the quiz start time is 9 AM, then the quiz would forcefully end at 10 AM. However, if the test taker logs in and starts the exam at 09:10 AM, they would have only 50 minutes to complete it.
                </p>

                <p class="my-3">
                    If you specify the grace period as 10 minutes, the test taker can start the quiz between 9 AM and 09:10 AM. However, if the test taker tries to start the quiz after 09:10 AM, they won't start the quiz as the grace period has been completed.
                </p>

            </section>

            <section class="body-sections" id="list-item-3">
                <h3 class="section__title mt-5">Flexible Schedule</h3>

                <ul class="mt-4">
                    <li class="my-2">In Flexible Schedule, you need to specify both <b>Start Date</b> and <b>Start Time</b>.</li>
                    <li class="my-2">Test takers can start the quiz anytime between Start Date Time and End Date Time.</li>
                </ul>

                <div style=" min-width: 280px;" class="col-10 mx-auto mt-4">
                <img src="{{url('images\docs_img\flexible-schedule.webp')}}" alt="Flexible Schedule" height="auto" width="auto" class="img-fluid col-12">
                </div>


                <p class="mt-4 mb-3">
                    E.g., If you have a defined quiz of 60 minutes and the quiz flexible schedule time is 9 AM to 6 PM. If the test taker logs in and starts the exam at 2 PM, the quiz will end at 3 PM. If another test taker logs in and starts the exam the 05:30 PM, then the quiz would end at 06:30 PM even the schedule ends at 6 PM.
                </p>

            </section>

            <section class="body-section">
                <div class="row">
                    <div class="col-lg-5 mx-2 px-3 mt-5 border rounded-2  prev-inst-container">
                        <a href="/admin/docs/manage-tests/quizzes" class="text-muted">
                            <div class="text-dark d-flex justify-content-between align-items-center">
                                <ul class="list-unstyled align-items-center flex-box-container">
                                    <li class=" mt-3"><i class="fa-solid fa-arrow-left fa-lg"></i></li>
                                </ul>
                                <ul class="list-unstyled align-items-center flex-box-container text-end">
                                    <li class="next-inst-text mt-3">Previous</li>
                                    <li>
                                        <h5 class="pre-req-text">Quizzes</h5>
                                    </li>
                                </ul>
                            </div>
                        </a>
                    </div>
                    <div class=" col-lg-5 mx-2 px-3 mt-5 border rounded-2  next-inst-container">
                        <a href="/admin/docs/manage-tests/view-and-export-reports" class="text-muted">
                            <div class="text-dark d-flex justify-content-between align-items-center">
                                <ul class="list-unstyled align-items-center flex-box-container">
                                    <li class="next-inst-text mt-3">Next - Manage Tests</li>
                                    <li>
                                        <h5 class="pre-req-text">View & Export Reports</h5>
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
                <a class="list-group-item list-group-item-action" href="#list-item-2">Fixed Schedule</a>
                <a class="list-group-item list-group-item-action" href="#list-item-3">Flexible Schedule</a>
            </div>
        </aside>

    </div>

    <!-- javascript includes  -->

    @include('components.doc-defaultjs')

</body>

</html>