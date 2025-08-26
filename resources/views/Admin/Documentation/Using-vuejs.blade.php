<!doctype html>
<html>

@include('components.doc-defaulthead', ['Title' => "Using Vue.js Source Code - Installation"])

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
                <h3 class="section__title h1">Using Vue.js Source Code</h3>
                <p class="section__title__para">Learn how to get and setup Vue.js source code</p>
                <p class="my-4">Front-end developer source code implemented in Vue.js is not included in the Regular License and will be provided upon purchasing the Extended License.</p>
            </section>

            <section class="body-sections" id="list-item-2">
                <h5 class="section__title mt-5 fw-bold">How to get Unminified Vue.js Source Code</h5>
                <ul class="mt-4">
                    <li class="my-1">The default script download from CodeCanyon doesn't include Vue.js source code as the same file is shared between Regular and Extended licenses. </li>
                    <li class="my-1">You need to request files by raising a support ticket from our helpdesk or directly send an email to support@nearchip.freshdesk.com with your extended license purchase code.</li>
                    <li class="my-1">Our team will verify your purchase and will send the files.</li>
                </ul>

            </section>

            <section class="body-sections" id="list-item-3">
                <h5 class="section__title mt-5 fw-bold">How to integrate Vue.js Source Code</h5>
                <p class="my-3">Kindly follow the below instructions to use the VUE sour</p>
                <p class="my-3">You must have the <b>Node version v14.15.4</b> and the <b>npm version 6.14.10</b>. </p>

                <div class="my-4 d-flex bg-light p-2 rounded-1" style="border-left: 4px solid #346ddb;">
                    <div>
                        <ol class="my-2 d-flex justify-content-evenly p-1 list-unstyled">
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
                                As you know, mismatching node versions are always buggy. If it is other than these, you need to figure out if any errors are found in builds
                            </li>
                        </ol>
                    </div>
                </div>

                <ol class="mt-4">
                    <li class="my-2">Download and extract the sent <b>js.zip</b> file to your local pc. </li>
                    <li class="my-2">Copy the content to the application <b>resources/js</b> directory. </li>
                    <li class="my-2">Remove or overwrite the existing <b>bootstrap.js</b> and <b>app.js</b> from the application <b>resources/js</b> directory.</li>
                    <li class="my-2">Install the dependencies by running <span class="bg-light d-inline-flex px-1 py-1 monospace_class">npm install</span>.</li>
                    <li class="my-2">Then run <span class="bg-light d-inline-flex px-1 py-1 monospace_class">npm run dev</span>.</li>
                    <li class="my-2">If you are deploying the application to a production server, then use <span class="bg-light d-inline-flex px-1 py-1 monospace_class">npm run production</span>.</li>
                </ol>
                <p class="my-3">If you have any further issues, feel free to raise a ticket. We are glad to help you.</p>

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
                                <b>We kindly request you secure the Vue.js source files and not share them outside of you or your organization.</b>
                            </li>
                        </ol>
                    </div>
                </div>

            </section>

            <section class="body-section">
                <div class="row ">
                    <div class="col-lg-5 mx-2 px-3 mt-5 border rounded-2  prev-inst-container">
                        <a href="/admin/docs/installation/task-scheduling" class="text-muted">
                            <div class="text-dark d-flex justify-content-between align-items-center">
                                <ul class="list-unstyled align-items-center flex-box-container">
                                    <li class=" mt-3"><i class="fa-solid fa-arrow-left fa-lg"></i></li>
                                </ul>
                                <ul class="list-unstyled align-items-center flex-box-container text-end">
                                    <li class="next-inst-text mt-3">Previous - Installation</li>
                                    <li>
                                        <h5 class="pre-req-text">Task Scheduling</h5>
                                    </li>
                                </ul>
                            </div>
                        </a>
                    </div>
                    <div class=" col-lg-5 mx-2 px-3 mt-5 border rounded-2  next-inst-container">
                        <a href="/admin/docs/configurations/site-settings" class="text-muted">
                            <div class="text-dark d-flex justify-content-between align-items-center">
                                <ul class="list-unstyled align-items-center flex-box-container">
                                    <li class="next-inst-text mt-3">Next - Configurations</li>
                                    <li>
                                        <h5 class="pre-req-text">Site Settings</h5>
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
                <a class="list-group-item list-group-item-action" href="#list-item-2">How to get Unminified Vue.js Source Code</a>
                <a class="list-group-item list-group-item-action" href="#list-item-3">How to integrate Vue.js Source Code</a>
            </div>
        </aside>

    </div>
    
    <!-- javascript includes  -->

    @include('components.doc-defaultjs')

</body>

</html>