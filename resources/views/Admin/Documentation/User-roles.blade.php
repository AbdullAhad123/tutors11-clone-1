<!doctype html>
<html>

@include('components.doc-defaulthead', ['Title' => "User Roles - User Managemnets"])

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

        <article class="doc__content col-9" data-bs-spy="scroll" data-bs-target="#list-example" data-bs-smooth-scroll="true" class="scrollspy-example" tabindex="0">

            <section class="body-section">
                <h3 class="section__title h1">User Roles</h3>
                <p class="section__title__para">Learn about roles in Tutor 11+</p>
                <p class="my-4">Tutor 11+ supports the following roles.</p>
                <ul class="mt-4">
                    <li class="my-1"> <b>Admin</b> - Manage users, resources, configurations, and master data</li>
                    <li class="my-1"> <b>Instructor</b> - Manage questions, exams, and schedules</li>
                    <li class="my-1"> <b>Student</b> - Access quizzes, exams, and question sets</li>
                    <li class="my-1"> <b>Guest</b> - Access quizzes, exams, and question sets</li>

            </section>
            
            <section class="body-sections" id="list-item-2">
                <h3 class="section__title mt-5">Assign a Role to User</h3>
                <ol class="mt-4">
                    <li class="my-1">
                        Log in to the admin account and select <span class="bg-light d-inline-flex px-1 py-1 monospace_class">Manage Users > Users</span> from the sidebar menu.
                    </li>
                    <li class="my-1">
                        Click on the edit icon of a user, then select User Role from the dropdown.
                    </li>
                    <li class="my-1">
                        Finally, click on the <b>Update</b> button to update the details.
                    </li>
                </ol>
                <p class="my-4">To learn how to manage users, visit the <a href="/admin/docs/user-management/users">Users</a> page.</p>

                <div class="px-3 mt-4 border rounded-2 next-inst-container">
                    <a href="/admin/docs/user-management/users" class="text-muted" style="text-decoration: none!important;">
                        <div class="text-dark d-flex justify-content-between align-items-center py-4">
                            <ul class="m-0 list-unstyled d-flex align-items-center flex-box-container">
                                <li class="me-2">
                                    <svg viewBox="0 0 16 16" fill="none" preserveAspectRatio="xMidYMid meet" data-rnwibasecard--1azsio2-hover="true" data-rnwi-handle="nearest" class="r-1rasi3h" style="vertical-align: middle; width: 32px; height: 32px;">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M4 .4A2.6 2.6 0 001.4 3v10A2.6 2.6 0 004 15.6h8a2.6 2.6 0 002.6-2.6V6.328a2.6 2.6 0 00-.761-1.838L10.51 1.162A2.6 2.6 0 008.672.4H4zM2.6 3A1.4 1.4 0 014 1.6h3.9v2.9a2.6 2.6 0 002.6 2.6h2.9V13a1.4 1.4 0 01-1.4 1.4H4A1.4 1.4 0 012.6 13V3zm10.733 2.9a1.399 1.399 0 00-.343-.562L9.662 2.01a1.4 1.4 0 00-.562-.343V4.5a1.4 1.4 0 001.4 1.4h2.833z" fill="currentColor"></path>
                                    </svg>
                                </li>
                                <li>
                                    <h5 class="pre-req-text mt-2">Users</h5>
                                </li>
                            </ul>
                        </div>
                    </a>
                </div>

            </section>

            <section class="body-section">
                <div class="row">
                    <div class="col-lg-5 mx-2 px-3 mt-3 border rounded-2  prev-inst-container">
                        <a href="/admin/docs/configurations/manage-files-settings" class="text-muted">
                            <div class="text-dark d-flex justify-content-between align-items-center">
                                <ul class="list-unstyled align-items-center flex-box-container">
                                    <li class=" mt-3"><i class="fa-solid fa-arrow-left fa-lg"></i></li>
                                </ul>
                                <ul class="list-unstyled align-items-center flex-box-container text-end">
                                    <li class="next-inst-text mt-3">Previous - Configurations </li>
                                    <li>
                                        <h5 class="pre-req-text">Manage Files</h5>
                                    </li>
                                </ul>
                            </div>
                        </a>
                    </div>
                    <div class=" col-lg-5 mx-2 px-3 mt-3 border rounded-2  next-inst-container">
                        <a href="/admin/docs/user-management/user-groups" class="text-muted">
                            <div class="text-dark d-flex justify-content-between align-items-center">
                                <ul class="list-unstyled align-items-center flex-box-container">
                                    <li class="next-inst-text mt-3">Next - User Management</li>
                                    <li>
                                        <h6 class="pre-req-text">User Groups</h5>
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
                <a class="list-group-item list-group-item-action" href="#list-item-2">Assign a Role to User</a>
                <a class="list-group-item list-group-item-action" href="#list-item-3">Disable Email Verification Feature</a>
            </div>
        </aside>

    </div>

    <!-- javascript includes  -->

    @include('components.doc-defaultjs')

</body>

</html>