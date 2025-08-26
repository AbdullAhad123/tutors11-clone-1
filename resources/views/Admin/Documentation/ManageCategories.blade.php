<!doctype html>
<html>

@include('components.doc-defaulthead', ['Title' => "Manage Categories - Master Data"])

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
    <!-- navbar ends -->

    <div class="wrapper">

        <!-- SIDE BAR  -->
        @include('components.doc-sidebar')

        <!-- body starts  -->
        <article class="doc__content" data-bs-spy="scroll" data-bs-target="#list-example" data-bs-smooth-scroll="true" class="scrollspy-example" tabindex="0">

            <section class="body-section">
                <h3 class="section__title h1">Manage Categories</h3>
                <p class="my-4">Tutor 11+ supports the following categorical hierarchy.</p>
                <ol class="mt-4">
                    <li class="my-1">Categories</li>
                    <li class="my-1">Year</li>
                </ol>
                <p class="my-3">
                    For a detailed understanding, refer to the following example.
                </p>
                <p class="my-3">
                    <span class="bg-light d-inline-flex px-1 py-1 monospace_class">Categories -> Year</span>
                </p>

                <div style=" min-width: 280px;" class="col-12">
                    <img src="{{url('images\docs_img\categories.webp')}}" alt="Manage Categories" height="auto" width="auto" class="img-fluid w-100 h-100 col-12">
                    <figcaption class="text-center">Categorical Hierarchy Example</figcaption>
                </div>

            </section>

            <section class="body-sections" id="list-item-2">
                <h3 class="section__title mt-4">Categories</h3>
                <p class="my-3">To manage subjects, log in to the admin account and select
                    <span class="bg-light d-inline-flex px-1 py-1 monospace_class">Manage Categories > Categories</span>
                    from the sidebar menu.
                </p>
            </section>

            <section class="body-sections" id="list-item-3">
                <h3 class="section__title mt-5">Year</h3>
                <p class="my-3">To manage topics, log in to the admin account and select
                    <span class="bg-light d-inline-flex px-1 py-1 monospace_class">Manage Categories > Year</span>
                    from the sidebar menu.
                </p>

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
                            <li class="my-1 text-justify px-2">
                                <ul class="m-0 list-unstyled">
                                    <li class="px-3">
                                        In the syllabus selection screen, the subcategories will be displayed.
                                    </li>
                                </ul>

                            </li>
                        </ol>
                    </div>
                </div>
            </section>

            <section class="body-sections" id="list-item-4">
                <h3 class="section__title mt-5">Map Subjects to Year</h3>
                <ol class="mt-4">
                    <li class="my-2">
                        Log in to the admin account and select <span class="bg-light d-inline-flex px-1 py-1 monospace_class">Manage Categories > Year</span>
                        from the sidebar menu.
                    </li>
                    <li class="my-2">
                        Click on the <b>Map Subjects</b> button of a year, then check the Subjects from the list. You can assign multiple subjects to a year.
                    </li>
                    <li class="my-2">
                        Finally, click on the <b>Update</b> button to map the subjects.
                    </li>
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
                            <li class="my-1 text-justify px-2">
                                <ul class="m-0 list-unstyled">
                                    <li class="my-1 px-2">
                                        <b>Why Map Subjects?</b>
                                    </li>
                                    <li class="my-1 px-2">
                                        <p class="mt-2">
                                            Mapping subjects to a year is useful to fetch subjects associated with a particular year.
                                        </p>
                                    </li>
                                </ul>

                            </li>
                        </ol>
                    </div>
                </div>

            </section>

            <section class="body-section">
                <div class="row">
                    <div class="col-lg-5 mx-2 px-3 mt-3 border rounded-2  prev-inst-container">
                        <a href="/admin/docs/master-data/manage-subjects" class="text-muted">
                            <div class="text-dark d-flex justify-content-between align-items-center">
                                <ul class="list-unstyled align-items-center flex-box-container">
                                    <li class=" mt-3"><i class="fa-solid fa-arrow-left fa-lg"></i></li>
                                </ul>
                                <ul class="list-unstyled align-items-center flex-box-container text-end">
                                    <li class="next-inst-text mt-3">Master Data - Previous</li>
                                    <li>
                                        <h5 class="pre-req-text">Manage Subjects</h5>
                                    </li>
                                </ul>
                            </div>
                        </a>
                    </div>
                    <div class=" col-lg-5 mx-2 px-3 mt-3 border rounded-2  next-inst-container">
                        <a href="/admin/docs/manage-questions/question-bank" class="text-muted">
                            <div class="text-dark d-flex justify-content-between align-items-center">
                                <ul class="list-unstyled align-items-center flex-box-container">
                                    <li class="next-inst-text mt-3">Next - Manage Questions</li>
                                    <li>
                                        <h6 class="pre-req-text">Question Bank</h5>
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
                <a class="list-group-item list-group-item-action" href="#list-item-2">Categories</a>
                <a class="list-group-item list-group-item-action" href="#list-item-3">Year</a>
                <a class="list-group-item list-group-item-action" href="#list-item-4">Map Subjects to Year</a>
            </div>
        </aside>    

    </div>

    <!-- javascript includes  -->

    @include('components.doc-defaultjs')


</body>

</html>