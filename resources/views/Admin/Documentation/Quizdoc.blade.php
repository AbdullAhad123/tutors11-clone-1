<!doctype html>
<html>

@include('components.doc-defaulthead', ['Title' => "Quizzes - Manage Tests"])

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
                <h3 class="section__title h1">Quizzes</h3>
                <p class="section__title__para">Learn how to configure quizzes</p>
                <p class="mt-4 mb-3">In general, a Quiz is the shortest, most common, and most casual form of evaluation. It often implies a short or informal test.</p>
                <p class="my-2">To manage quizzes, log in to the admin/instructor account and select <span class="bg-light d-inline-flex px-1 py-1 monospace_class">Tests > Quizzes</span> from the sidebar menu.</p>
                <p class="my-2">To create a quiz, click on the <b>New Quiz</b> button from the top right.</p>


                <div style=" min-width: 280px;" class="col-12 mt-4">
                    <img src="{{url('images\docs_img\quizzes_create.webp')}}" alt="create quiz" height="auto" width="auto" class="img-fluid col-12">
                </div>

            </section>
            
            <section class="body-sections" id="list-item-2">
                <h3 class="section__title mt-5">Quiz Details</h3>

                <ol class="mt-4">
                    <li class="my-2">In the <b>Details</b> section, please fill the following - Title, Year, Quiz Type, and Description. </li>
                    <li class="my-2">
                        By default, quiz visibility is <b>Public</b>, which means anyone can access it. If you wish to restrict this to specific user groups make sure to set the visibility to <b>Private</b>. You can schedule this for specific user groups by creating a <a href="/admin/docs/manage-tests/quiz-schedule">Quiz Schedule</a>.
                    </li>
                    <li class="my-2">Make sure to set the status to <b>Published</b> after adding questions.</li>
                    <li class="my-2">Finally, click on <b>Save & Proceed</b> button.</li>
                </ol>



            </section>

            <section class="body-section" id="list-item-3">
                <h3 class="section__title mt-5">Quiz Settings</h3>
                <p class="my-3">You can customize the quiz in the <b>Settings</b> section. </p>

                <div style=" min-width: 280px;" class="col-11 mt-4">
                    <img src="{{url('images\docs_img\quiz_settings.webp')}}" alt="quiz settings" height="auto" width="auto" class="img-fluid col-12">
                </div>

                <p class="mt-5 fw-bold">Duration Mode:</p>
                <ul class="mt-2">
                    <li class="my-2"> <b>Auto</b> - Duration will be calculated based on questions' default time </li>
                    <li class="my-2"> <b>Manual</b> - Duration will be considered as specified in the <b>Duration</b> field.</li>
                </ul>

                <p class="mt-5 fw-bold">Marks/Points Mode:</p>
                <ul class="mt-2">
                    <li class="my-2"> <b>Auto</b> - Marks/Points will be calculated based on questions' default marks</li>
                    <li class="my-2"> <b>Manual</b> - Marks/Points will be assigned to each question as specified in the Marks for Correct Answer field.</li>
                </ul>

                <p class="mt-5 fw-bold">Negative Marking:</p>
                <ul class="mt-2">
                    <li class="my-2"> <b>Yes</b> - Negative marking will be considered and a specified amount will be deducted for the wrong answer.</li>
                    <li class="my-2"> <b>No</b> - No Negative marking</li>
                </ul>

                <p class="mt-5 fw-bold">Negative Marking Type:</p>
                <ul class="mt-2">
                    <li class="my-2"> <b>Fixed</b> - Fixed amount will be deduct from question marks</li>
                    <li class="my-2"> <b>Percentage</b> - Percentage will be deduct from question marks</li>
                </ul>

                <p class="mt-5 fw-bold">Pass Percentage:</p>
                <p class="my-2">It is the minimum percentage to be achieved by the test taker to declare as passed in the quiz.</p>

                <p class="mt-5 fw-bold">Restrict Attempts:</p>
                <ul class="mt-2">
                    <li class="my-2"> <b>Yes</b> - Attempts will be restricted as specified</li>
                    <li class="my-2"> <b>No</b> - Unlimited attempts</li>
                </ul>

                <p class="mt-5 fw-bold">Disable Finish Button:</p>
                <ul class="mt-2">
                    <li class="my-2"> <b>Yes</b> - Test Finish button will be disabled which means the test taker needs to wait until the timer ends to finish the quiz.</li>
                    <li class="my-2"> <b>No</b> - Test Finish button will be displayed which means the test taker can finish the quiz at any time.</li>
                </ul>

                <p class="mt-5 fw-bold">Enable Question List View:</p>
                <ul class="mt-2">
                    <li class="my-2"> <b>Yes</b> - User can be able to see all questions as list</li>
                    <li class="my-2"> <b>No</b> - User cannot be able to see all questions as list</li>
                </ul>

                <p class="mt-5 fw-bold">Hide Solutions:</p>
                <ul class="mt-2">
                    <li class="my-2"> <b>Yes</b> - Solutions will not be shown in results</li>
                    <li class="my-2"> <b>No</b> - Solutions will be shown in results</li>
                </ul>

            </section>

            <section class="body-section" id="list-item-4">
                <h3 class="section__title mt-5">Add/Remove Questions</h3>
                <p class="my-4">Go to, <b>Questions</b> Section; by default, you will be on the questions viewing screen.</p>
                <p class="my-3">To <b>ADD</b> a question to the quiz, click on <b>Add Questions</b> link, and add the question by clicking on Add button</p>

                <div style=" min-width: 280px;" class="col-11 mx-auto mt-4">
                    <img src="{{url('images\docs_img\add-quiz_question.webp')}}" alt="Add quiz question" height="auto" width="auto" class="img-fluid col-12">
                </div>

                <p class="my-4">
                    To <b>REMOVE</b> a question from the quiz, click on the <b>View Questions</b> link and remove the question by clicking on the <b>Remove</b> button.
                </p>

                <div style=" min-width: 280px;" class="col-11 mx-auto mt-4">
                    <img src="{{url('images\docs_img\remove-quiz_question.webp')}}" alt="remove quiz question" height="auto" width="auto" class="img-fluid col-12">
                </div>

            </section>

            <section class="body-section">
                <div class="row">
                    <div class="col-lg-5 mx-2 px-3 mt-5 border rounded-2  prev-inst-container">
                        <a href="/admin/docs/manage-tests/practice-sets" class="text-muted">
                            <div class="text-dark d-flex justify-content-between align-items-center">
                                <ul class="list-unstyled align-items-center flex-box-container">
                                    <li class=" mt-3"><i class="fa-solid fa-arrow-left fa-lg"></i></li>
                                </ul>
                                <ul class="list-unstyled align-items-center flex-box-container text-end">
                                    <li class="next-inst-text mt-3">Previous</li>
                                    <li>
                                        <h5 class="pre-req-text">Question Sets</h5>
                                    </li>
                                </ul>
                            </div>
                        </a>
                    </div>
                    <div class=" col-lg-5 mx-2 px-3 mt-5 border rounded-2  next-inst-container">
                        <a href="/admin/docs/manage-tests/quiz-schedule" class="text-muted">
                            <div class="text-dark d-flex justify-content-between align-items-center">
                                <ul class="list-unstyled align-items-center flex-box-container">
                                    <li class="next-inst-text mt-3">Next - Manage Tests</li>
                                    <li>
                                        <h5 class="pre-req-text">Quiz Schedules</h5>
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
                <a class="list-group-item list-group-item-action" href="#list-item-2">Quiz Details</a>
                <a class="list-group-item list-group-item-action" href="#list-item-3">Quiz Settings</a>
                <a class="list-group-item list-group-item-action" href="#list-item-4">Add/Remove Questions</a>
            </div>
        </aside>

    </div>

    <!-- javascript includes  -->

    @include('components.doc-defaultjs')

</body>

</html>