<!doctype html>
<html>

@include('components.doc-defaulthead', ['Title' => "Practice Sets - Manage Tests"])

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
                <h3 class="section__title h1">Question Sets</h3>
                <p class="section__title__para">Learn how to configure question sets</p>
                <p class="my-4">Question sets help keep students engaged and prepare them for tests with immediate feedback. Students can also earn reward points through question sets. Practicing helps students focus on weak areas.</p>

                <div class="my-4 d-flex bg-light p-2 rounded-1" style="border-left: 4px solid #008847;">
                    <div>
                        <ol class="m-0 d-flex justify-content-evenly p-1 list-unstyled">
                            <li class="my-1">
                                <svg viewBox="0 0 16 16" fill="none" preserveAspectRatio="xMidYMid meet" style="vertical-align: middle; width: 20px; height: 20px; color: #008847;">
                                    <g clip-path="url(#CheckCircle_svg__clip0_1372_9763)" fill="currentColor">
                                        <path d="M11.966 5.778a.6.6 0 10-.932-.756l-4.101 5.047-1.981-2.264a.6.6 0 00-.904.79l2.294 2.622a.8.8 0 001.223-.023l4.4-5.416z"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M8 .4a7.6 7.6 0 100 15.2A7.6 7.6 0 008 .4zM1.6 8a6.4 6.4 0 1112.8 0A6.4 6.4 0 011.6 8z"></path>
                                    </g>
                                    <defs>
                                        <clipPath id="CheckCircle_svg__clip0_1372_9763">
                                            <path fill="#fff" d="M0 0h16v16H0z"></path>
                                        </clipPath>
                                    </defs>
                                </svg>
                            </li>
                            <li class="my-1 text-justify px-2">
                                Points earned from Question Sets can be used to unlock or redeem quizzes.
                            </li>
                        </ol>
                    </div>
                </div>

                <p class="my-3">
                    To manage question sets, log in to the admin/instructor account and select
                    <span class="bg-light d-inline-flex px-1 py-1 monospace_class">Tests > Question Sets</span>
                    from the sidebar menu.
                </p>
                <p class="my-3">
                    To create a question set, click on the <b>New question Set</b> button from the top right.
                </p>

                <div style=" min-width: 280px;" class="col-12 mt-4">
                    <img src="{{url('images\docs_img\pratices_sets_create.webp')}}" alt="create pratices sets" height="auto" width="auto" class="img-fluid col-12">
                </div>

            </section>
            
            <section class="body-sections" id="list-item-2">
                <h3 class="section__title mt-5">Question Set Details</h3>

                <ol class="mt-4">
                    <li class="my-2">In the <b>Details</b> section, please fill the following - Title, Year, Topic, and Description. </li>
                    <li class="my-2">Make sure to set the status to Published after adding questions.</li>
                    <li class="my-2">Finally, click on <b>Save & Proceed</b> button.</li>
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
                                Once created, you won't be able to change the topic of a question set.
                            </li>
                        </ol>
                    </div>
                </div>



            </section>
            
            <section class="body-section" id="list-item-3">
                <h3 class="section__title mt-5">Question Set Settings</h3>
                <div style=" min-width: 280px;" class="col-10 mx-auto mt-4">
                    <img src="{{url('images\docs_img\ps_settings.webp')}}" alt="pratices sets settings" height="auto" width="auto" class="img-fluid col-12">
                </div>

                <ol class="mt-4">
                    <li class="my-2">In the <b>Settings</b> section, please choose Points Mode as Auto or Manual.</li>
                    <li class="my-2">If <b>Points Mode</b> is <i>Manual</i>, please provide <b>Points for Correct Answer</b>.</li>
                    <li class="my-2">Finally, click on <b>Update Settings</b> button.</li>
                </ol>



                <div class="my-4 d-flex bg-light p-2 rounded-1" style="border-left: 4px solid #346ddb;">
                    <div>
                        <ol class="m-0 d-flex justify-content-evenly p-1 list-unstyled">
                            <li class="my-1">
                                <svg viewBox="0 0 16 16" fill="none" preserveAspectRatio="xMidYMid meet" style="vertical-align: middle; width: 20px; height: 20px; color: #346ddb;">
                                    <g clip-path="url(#InfoCircle_svg__clip0_1373_8677)" fill="currentColor">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M8 1.6a6.4 6.4 0 100 12.8A6.4 6.4 0 008 1.6zM.4 8a7.6 7.6 0 1115.2 0A7.6 7.6 0 01.4 8z"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M5.4 7a.6.6 0 01.6-.6h2a.6.6 0 01.6.6v3.9H10a.6.6 0 010 1.2H6a.6.6 0 110-1.2h1.4V7.6H6a.6.6 0 01-.6-.6z"></path>
                                        <path d="M8 3.6a.9.9 0 100 1.8.9.9 0 000-1.8z"></path>
                                    </g>
                                    <defs>
                                        <clipPath id="InfoCircle_svg__clip0_1373_8677">
                                            <path fill="#fff" d="M0 0h16v16H0z"></path>
                                        </clipPath>
                                    </defs>
                                </svg>
                            </li>
                            <li class="my-1 text-justify px-3">
                                <b>Points Mode</b>
                                <ul class="m-0" style="list-style: disc;">
                                    <li class="my-1">
                                        <b>Auto</b> - Points will be assigned based on the question's default marks
                                    </li>
                                    <li class="my-1">
                                        <b>Manual</b> - Points will be assigned to each correctly answered question as specified
                                    </li>
                                </ul>
                            </li>
                        </ol>
                    </div>
                </div>
            </section>

            <section class="body-section" id="list-item-4">
                <h3 class="section__title mt-5">Add/Remove Questions</h3>
                <p class="my-4">Go to, <b>Questions</b> Section; by default, you will be on the questions viewing screen.</p>
                <p class="my-3">To <b>ADD</b> a question to the question set, click on <b>Add Questions</b> link, and add the question by clicking on Add button</p>

                <div style=" min-width: 280px;" class="col-10 mx-auto mt-4">
                    <img src="{{url('images\docs_img\add-question.webp')}}" alt="Add Question" height="auto" width="auto" class="img-fluid col-12">
                </div>

                <div class="mt-4 d-flex bg-light p-2 rounded-1" style="border-left: 4px solid #b95e04;">
                    <div>
                        <ol class="m-0 d-flex justify-content-evenly p-1 list-unstyled">
                            <li class="my-1">
                                <svg viewBox="0 0 16 16" fill="none" preserveAspectRatio="xMidYMid meet" style="vertical-align: middle; width: 20px; height: 20px; color: #b95e04;">
                                    <g clip-path="url(#Warning_svg__clip0_1373_8672)" fill="currentColor">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M8 1.6a6.4 6.4 0 100 12.8A6.4 6.4 0 008 1.6zM.4 8a7.6 7.6 0 1115.2 0A7.6 7.6 0 01.4 8z"></path>
                                        <path d="M8 12.4a.9.9 0 110-1.8.9.9 0 010 1.8zM7.25 4.24c0-.27.187-.49.417-.49h.666c.23 0 .417.22.417.49v2.247c0 .462.049 1.05-.043 1.499L8.5 9c-.103.681-.898.68-1 0l-.207-1.014c-.091-.45-.043-1.037-.043-1.5V4.24z"></path>
                                    </g>
                                    <defs>
                                        <clipPath id="Warning_svg__clip0_1373_8672">
                                            <path fill="#fff" d="M0 0h16v16H0z"></path>
                                        </clipPath>
                                    </defs>
                                </svg>
                            </li>
                            <li class="my-1 text-justify px-3">
                                You can only <b>ADD</b> questions that belong to the topic related to the Question Set.
                            </li>
                        </ol>
                    </div>
                </div>

                <p class="my-3">
                    To <b>REMOVE</b> a question from the question set, click on the <b>View Questions</b> link and remove the question by clicking on the <b>Remove</b> button.
                </p>

                <div style=" min-width: 280px;" class="col-10 mx-auto mt-4">
                    <img src="{{url('images\docs_img\ppd_remove-question.webp')}}" alt="Remove Question" height="auto" width="auto" class="img-fluid col-12">
                </div>

            </section>

            <section class="body-section">
                <div class="row">
                    <div class="col-lg-5 mx-2 px-3 mt-5 border rounded-2  prev-inst-container">
                        <a href="/admin/docs/manage-tests/get-started" class="text-muted">
                            <div class="text-dark d-flex justify-content-between align-items-center">
                                <ul class="list-unstyled align-items-center flex-box-container">
                                    <li class=" mt-3"><i class="fa-solid fa-arrow-left fa-lg"></i></li>
                                </ul>
                                <ul class="list-unstyled align-items-center flex-box-container text-end">
                                    <li class="next-inst-text mt-3">Previous</li>
                                    <li>
                                        <h5 class="pre-req-text">Get Started</h5>
                                    </li>
                                </ul>
                            </div>
                        </a>
                    </div>
                    <div class=" col-lg-5 mx-2 px-3 mt-5 border rounded-2  next-inst-container">
                        <a href="/admin/docs/manage-tests/quizzes" class="text-muted">
                            <div class="text-dark d-flex justify-content-between align-items-center">
                                <ul class="list-unstyled align-items-center flex-box-container">
                                    <li class="next-inst-text mt-3">Next - Manage Tests</li>
                                    <li>
                                        <h5 class="pre-req-text">Quizzes</h5>
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
                <a class="list-group-item list-group-item-action" href="#list-item-2">Question Set Details</a>
                <a class="list-group-item list-group-item-action" href="#list-item-3">Question Set Settings</a>
                <a class="list-group-item list-group-item-action" href="#list-item-4">Add/Remove Questions</a>
            </div>
        </aside>
    </div>

    <!-- javascript includes  -->

    @include('components.doc-defaultjs')

</body>

</html>