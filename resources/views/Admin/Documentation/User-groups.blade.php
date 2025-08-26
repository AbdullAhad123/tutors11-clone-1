<!doctype html>
<html>

@include('components.doc-defaulthead', ['Title' => "User Groups - User Managemnets"])

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
                <h3 class="section__title h1">User Groups</h3>
                <p class="section__title__para">Learn how to manage user groups in Tutor 11+</p>
                <p class="my-4"><b>User Groups</b> are different from <b>User Roles</b>. <b>User Roles</b> are used to restricting access to the application by specific permissions, whereas <b>User Groups</b> are used to classify the users. To manage user groups, log in to the admin account and select
                    <span class="bg-light d-inline-flex px-1 py-1 monospace_class">Manage Users > User Groups</span>
                    from the sidebar menu.
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
                                User groups are useful when you schedule a test and assign it to only specific users.
                            </li>
                        </ol>
                    </div>
                </div>

                <p class="my-3">Some examples of User Groups are:</p>

                <ul class="mt-4">
                    <li class="my-1">Grade 11</li>
                    <li class="my-1">Grade 12</li>
                    <li class="my-1">Graduates</li>
                    <li class="my-1">Post Graduates</li>
                    <li class="my-1">Summer Batch</li>
                    <li class="my-1">Kindergarten</li>
                    <li class="my-1">Scholars</li>
                    <li class="my-1">Short Term</li>
                    <li class="my-1">Long Term</li>
                </ul>

                <p class="my-4">The above list is just for reference. You can create <b>Unlimited User Groups</b> of yours.</p>

            </section>

            <section class="body-sections" id="list-item-2">
                <h3 class="section__title mt-5">Private vs. Public Group</h3>
                <p class="my-3">You can also define a User Group as Public or Private.</p>

                <div class="my-4 d-flex bg-light p-1 rounded-1" style="border-left: 4px solid #346ddb;">
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
                                <ul class="m-0" style="list-style: disc;">
                                    <li>
                                        <b>Private Group</b> - Only the admin can add users to the private group
                                    </li>
                                    <li>
                                        <p class="mt-3">
                                            <b>Public Group</b> - Anyone can join the public group (This feature will be available in the next version release)
                                        </p>
                                    </li>
                                </ul>

                            </li>
                        </ol>
                    </div>
                </div>

            </section>

            <section class="body-sections" id="list-item-2">
                <h3 class="section__title mt-5">Add a User to Multiple User Groups</h3>
                <ol class="mt-4">
                    <li class="my-1">
                        log in to the admin account and select
                        <span class="bg-light d-inline-flex px-1 py-1 monospace_class">Manage Users > Users</span> from the sidebar menu.
                    </li>
                    <li class="my-1">
                        Click on the edit icon of a user, then choose User Groups from the dropdown. You can assign multiple user groups to a user.
                    </li>
                    <li class="my-1">
                        Finally, click on the <b>Update</b> button to update the details.
                    </li>
                </ol>

                <p class="my-4">
                    To learn how to manage users, visit the <a href="/admin/docs/user-management/users">Users</a> page.
                </p>
            </section>

            <section class="body-section">
                <div class="row">
                    <div class="col-lg-5 mx-2 px-3 mt-3 border rounded-2  prev-inst-container">
                        <a href="/admin/docs/user-management/user-roles" class="text-muted">
                            <div class="text-dark d-flex justify-content-between align-items-center">
                                <ul class="list-unstyled align-items-center flex-box-container">
                                    <li class=" mt-3"><i class="fa-solid fa-arrow-left fa-lg"></i></li>
                                </ul>
                                <ul class="list-unstyled align-items-center flex-box-container text-end">
                                    <li class="next-inst-text mt-3">User Management - Previous</li>
                                    <li>
                                        <h5 class="pre-req-text">User Roles</h5>
                                    </li>
                                </ul>
                            </div>
                        </a>
                    </div>
                    <div class=" col-lg-5 mx-2 px-3 mt-3 border rounded-2  next-inst-container">
                        <a href="/admin/docs/user-management/users" class="text-muted">
                            <div class="text-dark d-flex justify-content-between align-items-center">
                                <ul class="list-unstyled align-items-center flex-box-container">
                                    <li class="next-inst-text mt-3">Next - User Management</li>
                                    <li>
                                        <h6 class="pre-req-text">Users</h5>
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
                <a class="list-group-item list-group-item-action" href="#list-item-2">Private vs. Public Group</a>
                <a class="list-group-item list-group-item-action" href="#list-item-3">Add a User to Multiple User Groups</a>
            </div>
        </aside>

    </div>

   <!-- javascript includes  -->

   @include('components.doc-defaultjs')

</body>

</html>