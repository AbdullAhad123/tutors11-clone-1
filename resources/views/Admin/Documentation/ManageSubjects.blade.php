<!doctype html>
<html>

@include('components.doc-defaulthead', ['Title' => "Manage Subjects - Master Data"])

<body>

    <!-- FULLSCREEN HTML CODE  -->

    <div id="full_page">
        <div class="cancel">
            <i class="fa fa-times fa_cancel_icon"></i>
        </div>
        <div class="image_section"></div>
    </div>

    <!-- navbar starts  -->
    <div class="wrapper">

        <!-- SIDE BAR  -->
        @include('components.doc-sidebar')

        <!-- body starts  -->
        <article class="doc__content" data-bs-spy="scroll" data-bs-target="#list-example" data-bs-smooth-scroll="true" class="scrollspy-example" tabindex="0">

            <section class="body-section">
                <h3 class="section__title h1">Manage Subjects</h3>
                <p class="my-4">Tutor 11+ supports the following subject hierarchy.</p>
                <ol class="mt-4">
                    <li class="my-1">Subjects</li>
                    <li class="my-1">Topics</li>
                    <li class="my-1">Sub-topics</li>
                </ol>
                <p class="my-3">
                    Subjects are equivalent to subjects; under the subject, you can add topics equivalent to chapters. Likewise, you can add topics under the chapter. For a detailed understanding, refer to the following example.
                </p>
                <p class="my-3">
                    <span class="bg-light d-inline-flex px-1 py-1 monospace_class">Subjects -> Topics -> Sub-topics</span>
                </p>

                <div style=" min-width: 280px;" class="col-11">
                    <img src="{{url('images\docs_img\subjects_hierarchy.webp')}}" alt="Subjects Hierarchy" height="auto" width="auto" class="img-fluid w-100 h-100 col-12">
                    <figcaption class="text-center">Subject Hierarchy Example</figcaption>
                </div>

            </section>

            <section class="body-sections" id="list-item-2">
                <h3 class="section__title mt-3">Subjects</h3>
                <p class="my-3">To manage subjects, log in to the admin account and select
                    <span class="bg-light d-inline-flex px-1 py-1 monospace_class">Manage Subjects > Subjects</span>
                    from the sidebar menu.
                </p>
            </section>

            <section class="body-sections" id="list-item-3">
                <h3 class="section__title mt-3">Topics</h3>
                <p class="my-3">To manage topics, log in to the admin account and select
                    <span class="bg-light d-inline-flex px-1 py-1 monospace_class">Manage Subjects > Topics</span>
                    from the sidebar menu.
                </p>
            </section>

            <section class="body-sections" id="list-item-4">
                <h3 class="section__title mt-3">Sub-topics</h3>
                <p class="my-3">To manage sub-topics, log in to the admin account and select
                    <span class="bg-light d-inline-flex px-1 py-1 monospace_class">Manage Subjects > Sub-topics</span>
                    from the sidebar menu.
                </p>
            </section>

            <section class="body-section">
                <div class="row">
                    <div class="col-lg-5 mx-2 px-3 mt-3 border rounded-2  prev-inst-container">
                        <a href="/admin/docs/user-management/users" class="text-muted">
                            <div class="text-dark d-flex justify-content-between align-items-center">
                                <ul class="list-unstyled align-items-center flex-box-container">
                                    <li class=" mt-3"><i class="fa-solid fa-arrow-left fa-lg"></i></li>
                                </ul>
                                <ul class="list-unstyled align-items-center flex-box-container text-end">
                                    <li class="next-inst-text mt-3">User Management - Previous</li>
                                    <li>
                                        <h5 class="pre-req-text">Users</h5>
                                    </li>
                                </ul>
                            </div>
                        </a>
                    </div>
                    <div class=" col-lg-5 mx-2 px-3 mt-3 border rounded-2  next-inst-container">
                        <a href="/admin/docs/master-data/manage-categories" class="text-muted">
                            <div class="text-dark d-flex justify-content-between align-items-center">
                                <ul class="list-unstyled align-items-center flex-box-container">
                                    <li class="next-inst-text mt-3">Next - Master Data</li>
                                    <li>
                                        <h6 class="pre-req-text">Manage Categories</h5>
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
                <a class="list-group-item list-group-item-action" href="#list-item-2">Subjects</a>
                <a class="list-group-item list-group-item-action" href="#list-item-3">Topics</a>
                <a class="list-group-item list-group-item-action" href="#list-item-4">Sub-topics</a>
            </div>
        </aside>

    </div>

    <!-- javascript includes  -->
    @include('components.doc-defaultjs')

</body>

</html>