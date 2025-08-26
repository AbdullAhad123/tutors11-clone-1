<!doctype html>
<html>

@include('components.doc-defaulthead', ['Title' => "Question Bank - Manage Questions"])

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
                <h3 class="section__title h1">Question Bank</h3>
                <p class="my-4">Tutor 11+ supports the following question types.</p>
                <ol class="mt-4">
                    <li class="my-1"><a href="/admin/docs/manage-questions/multiple-choice-single-answer">Multiple Choice Single Answer</a> - <span class="bg-light d-inline-flex px-1 py-1 monospace_class">MSA</span></li>
                    <li class="my-1"><a href="/admin/docs/manage-questions/multiple-choice-multiple-answer">Multiple Choice Multiple Answers</a> - <span class="bg-light d-inline-flex px-1 py-1 monospace_class">MMA</span></li>
                    <li class="my-1"><a href="/admin/docs/manage-questions/true-false">True or False</a> - <span class="bg-light d-inline-flex px-1 py-1 monospace_class">TOF</span></li>
                    <li class="my-1"><a href="/admin/docs/manage-questions/short-answer-question">Short Answer Question</a> - <span class="bg-light d-inline-flex px-1 py-1 monospace_class">SAQ</span></li>
                    <li class="my-1"><a href="/admin/docs/manage-questions/fill-in-the-blanks">Fill in the Blanks</a> - <span class="bg-light d-inline-flex px-1 py-1 monospace_class">FIB</span></li>
                    <li class="my-1"><a href="/admin/docs/manage-questions/match-the-following">Match the Following</a> - <span class="bg-light d-inline-flex px-1 py-1 monospace_class">MTF</span></li>
                    <li class="my-1"><a href="/admin/docs/manage-questions/order-sequence">Ordering/Sequence</a> - <span class="bg-light d-inline-flex px-1 py-1 monospace_class">ORD </span></li>
                </ol>

                <p class="my-4">To manage questions, log in to the admin account and select
                    <span class="bg-light d-inline-flex px-1 py-1 monospace_class">Manage Questions > Questions</span>
                    from the sidebar menu.
                </p>
                <p class="my-3">
                    To create a question, click on the <b>New Question</b> button from the top right, and choose the question type.
                </p>

                <div style=" min-width: 280px;" class="col-11">
                <img src="{{url('images\docs_img\admin_questions_edit.webp')}}" alt="admin questions edit" height="auto" width="auto" class="img-fluid w-100 h-100 col-12">
                </div>

            </section>

            <section class="body-sections" id="list-item-2">
                <h3 class="section__title mt-5">Details</h3>
                <p class="my-3">
                    In the <b>Details</b> section, select topic, enter the question and options, and select the correct answer.
                </p>
                <div style=" min-width: 280px;" class="col-10 mx-auto my-4">
                <img src="{{url('images\docs_img\question-details.webp')}}" alt="question details" height="auto" width="auto" class="img-fluid w-100 h-100 col-12">
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
                                Refer to the specific question type documentation page to learn how to configure options specific to the question type
                            </li>
                        </ol>
                    </div>
                </div>
            </section>

            <section class="body-sections" id="list-item-3">
                <h3 class="section__title mt-5">Settings</h3>
                <p class="my-3">
                    In the <b>Settings</b> section, customize the sub-topic, difficulty level, default marks, and default time to solve.
                </p>
                <div style=" min-width: 280px;" class="col-lg-7 col-md-8 col-sm-10 col-12 mx-auto my-3">
                <img src="{{url('images\docs_img\question-settings.webp')}}" alt="question settings" height="auto" width="auto" class="img-fluid w-100 h-100 col-12">
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
                                You must set Default Marks and Default Time of a question.
                                <ul class="m-0" style="list-style: disc;">
                                    <li class="my-1">
                                        <b>Default Marks</b> will be used to calculate the test total maks when auto-grading is enabled.
                                    </li>
                                    <li class="my-1">
                                        <b>Default Time </b> will be used to calculate the test total time when auto-duration is enabled.
                                    </li>
                                </ul>
                            </li>
                        </ol>
                    </div>
                </div>

            </section>

            <section class="body-sections" id="list-item-4">
                <h3 class="section__title mt-5">Solution</h3>
                <p class="my-3">
                    In the <b>Solution</b> section, provide the hint and solution to the question. You can also add a video to the solution.
                </p>
                <div class="mt-4 d-flex bg-light p-2 rounded-1" style="border-left: 4px solid #008847;">
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
                            <li class="my-1 text-justify px-3">
                                The solution can be shown in results and question set feedback. So, providing a solution to a question is a good practise.
                            </li>
                        </ol>
                    </div>
                </div>
            </section>

            <section class="body-sections" id="list-item-4">
                <h3 class="section__title mt-5">Attachment</h3>
                <p class="my-3">
                    In the <b>Attachment</b> section, choose any one of the available attachments if necessary. For more details on this, refer <a href="/admin/docs/manage-questions/question-attchments">Question Attachments</a> section.
                </p>
            </section>

            <section class="body-section">
                <div class="row">
                    <div class="col-lg-5 mx-2 px-3 mt-4 border rounded-2 prev-inst-container">
                        <a href="/admin/docs/master-data/manage-categories" class="text-muted">
                            <div class="text-dark d-flex justify-content-between align-items-center">
                                <ul class="list-unstyled align-items-center flex-box-container">
                                    <li class=" mt-3"><i class="fa-solid fa-arrow-left fa-lg"></i></li>
                                </ul>
                                <ul class="list-unstyled align-items-center flex-box-container text-end">
                                    <li class="next-inst-text mt-3">Master Data - Previous</li>
                                    <li>
                                        <h5 class="pre-req-text">Manage Categories</h5>
                                    </li>
                                </ul>
                            </div>
                        </a>
                    </div>
                    <div class=" col-lg-5 mx-2 px-3 mt-4 border rounded-2 next-inst-container">
                        <a href="/admin/docs/manage-questions/multiple-choice-single-answer" class="text-muted">
                            <div class="text-dark d-flex justify-content-between align-items-center">
                                <ul class="list-unstyled align-items-center flex-box-container">
                                    <li class="next-inst-text mt-3">Next - Question Bank</li>
                                    <li>
                                        <h6 class="pre-req-text">Multiple Choice Single Asnwer</h5>
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
                <a class="list-group-item list-group-item-action" href="#list-item-2">Details</a>
                <a class="list-group-item list-group-item-action" href="#list-item-3">Settings</a>
                <a class="list-group-item list-group-item-action" href="#list-item-4">Solution</a>
                <a class="list-group-item list-group-item-action" href="#list-item-4">Attachment</a>
            </div>
        </aside>

    </div>
    
    <!-- javascript includes  -->

    @include('components.doc-defaultjs')

</body>

</html>