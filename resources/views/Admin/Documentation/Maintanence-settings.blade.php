<!doctype html>
<html>

@include('components.doc-defaulthead', ['Title' => "Maintenance Settings - Configurations"])


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
                <h3 class="section__title h1">Maintenance Settings</h3>
            </section>

            <section class="body-sections" id="list-item-2">
                <h3 class="section__title mt-5">Clear Application Cache</h3>
                <ol class="mt-4">
                    <li class="my-1">
                        <p class="my-4">To clear cache, log in to the admin account and select
                            <span class="bg-light d-inline-flex px-1 py-1 monospace_class">Settings > Maintenance Settings</span>
                            from the sidebar menu.
                        </p>
                    </li>
                    <li class="my-1">Then, click on the Clear Cache button and confirm the password.</li>
                </ol>
                <div class="mt-4 d-flex bg-light p-2 rounded-1" style="border-left: 4px solid #d33d3d;">
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
                                This action may slow down the application for a while.
                            </li>
                        </ol>
                    </div>
                </div>
            </section>

            <section class="body-sections" id="list-item-3">
                <h3 class="section__title mt-5">Expiring Completed Schedules</h3>
                <ol class="mt-4">
                    <li class="my-1">Test schedules that end will need to mark as expired. If you configure the task schedule, this action can take place every six hours.</p>
                    </li>
                    <li class="my-1">If not, you can manually do this operation by login to the admin account and select<span class="bg-light d-inline-flex px-1 py-1 monospace_class">Settings > Maintenance Settings</span> from the sidebar menu.</li>
                    <li class="my-1">Then, click on the Mark Completed Schedules as Expired button and confirm the password.</li>
                </ol>
            </section>

            <section class="body-section">
                <div class="row">
                    <div class="col-lg-5 mx-2 px-3 mt-3 border rounded-2  prev-inst-container">
                        <a href="/admin/docs/configurations/email-settings" class="text-muted">
                            <div class="text-dark d-flex justify-content-between align-items-center">
                                <ul class="list-unstyled align-items-center flex-box-container">
                                    <li class=" mt-3"><i class="fa-solid fa-arrow-left fa-lg"></i></li>
                                </ul>
                                <ul class="list-unstyled align-items-center flex-box-container text-end">
                                    <li class="next-inst-text mt-3">Previous</li>
                                    <li>
                                        <h5 class="pre-req-text">Email Settings</h5>
                                    </li>
                                </ul>
                            </div>
                        </a>
                    </div>
                    <div class=" col-lg-5 mx-2 px-3 mt-3 border rounded-2  next-inst-container">
                        <a href="/admin/docs/configurations/manage-files-settings" class="text-muted">
                            <div class="text-dark d-flex justify-content-between align-items-center">
                                <ul class="list-unstyled align-items-center flex-box-container">
                                    <li class="next-inst-text mt-3">Next - Configurations</li>
                                    <li>
                                        <h6 class="pre-req-text">Manage Files</h5>
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
                <a class="list-group-item list-group-item-action" href="#list-item-2">Clear Application Cache</a>
                <a class="list-group-item list-group-item-action" href="#list-item-3">Expiring Completed Schedules</a>
            </div>
        </aside>

    </div>

    <!-- javascript includes  -->

    @include('components.doc-defaultjs')

</body>

</html>