<!doctype html>
<html>

@include('components.doc-defaulthead', ['Title' => "Update form Previous Versions - Installation"])

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
                <h3 class="section__title h1">Update from Previous Versions</h3>
                <p class="section__title__para">Learn how to update Tutor 11+ to a newer version.</p>
                <p class="my-4">Follow the below steps carefully to update the Tutor 11+ script. </p>
                <ol class="mt-4">
                    <li class="my-2">Take a backup of the previous installation</li>
                    <li class="my-2">Clean the previous installation</li>
                    <li class="my-2">Upload and extract the new update file from CodeCanyon</li>
                    <li class="my-2">Check directory permissions</li>
                    <li class="my-2">Check and Fix updates in the Maintenance Settings.</li>
                </ol>

                <div class="my-4 d-flex bg-light p-2 rounded-1" style="border-left: 4px solid #d33d3d;">
                    <div>
                        <ol class="my-2 d-flex justify-content-evenly p-1 list-unstyled">
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
                                <b>IMPORTANT NOTE.</b>
                                You can't update the app from one version to another by skipping the intermediate versions. You have to update one by one sequentially. For Eg. Your app's current version is 1.3.0, and the latest version is 1.5.0. You must upgrade the app to 1.4.0 first, and then you have to update to 1.5.0.
                            </li>
                        </ol>
                    </div>
                </div>
            </section>

            <section class="body-sections" id="list-item-2">
                <h5 class="section__title mt-5 fw-bold">Detailed Update Process</h5>
                <p class="my-4 fw-bold">Step 1</p>
                <p class="my-3">First things first, back up your files and database of the previous Tutor 11+ installation on your server.</p>

                <div class="my-4 d-flex bg-light p-2 rounded-1" style="border-left: 4px solid #d33d3d;">
                    <div>
                        <ol class="my-2 d-flex justify-content-evenly p-1 list-unstyled">
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
                                <b>KINDLY DON'T IGNORE.</b>
                                Be make sure to back up your files and database before updating the application. So that if anything goes wrong, you won't lose your data.
                            </li>
                        </ol>
                    </div>
                </div>

                <p class="my-4 fw-bold">Step 2</p>
                <p class="my-3">Goto the Tutor 11+ previous installation directory in the server and delete all the files and folders <b>EXCEPT</b> the
                    <span class="bg-light d-inline-flex px-1 py-1 monospace_class">/storage</span> folder and the "<span class="bg-light d-inline-flex px-1 py-1 monospace_class">.env file</span>".
                </p>
                <div class="my-4 d-flex bg-light p-2 rounded-1" style="border-left: 4px solid #d33d3d;">
                    <div>
                        <ol class="my-2 d-flex justify-content-evenly p-1 list-unstyled">
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
                                Perform this step only after you take the backup of previous files and database. If you delete the /storage folder or the .env file by mistake, upload them from the backup.
                            </li>
                        </ol>
                    </div>
                </div>


                <p class="my-4 fw-bold">Step 3</p>

                <p class="my-2">Download the zip file from CodeCanyon and extract it on your local system (PC)</p>

                <ol class="mt-4">
                    <li class="my-1">
                        Goto the "<span class="bg-light d-inline-flex px-1 py-1 monospace_class">Upgrade to 1.x.x from 1.x.x</span>" folder.
                    </li>
                    <li class="my-1">
                        You will find a zip file named
                        "<span class="bg-light d-inline-flex px-1 py-1 monospace_class">upload_this.zip</span>"
                    </li>
                    <li class="my-1">Upload this zip file to your server into the previous Tutor 11+ installation directory.</li>
                    <li class="my-2 ">Extract the zip file in the same directory.</li>
                </ol>


                <p class="my-4 fw-bold">Step 4</p>
                <p class="my-2">Make sure you have 775 permission to the following directories.</p>
                <ul class="mt-4">
                    <li class="my-1">storage/framework</li>
                    <li class="my-1">storage/logs</li>
                    <li class="my-1">bootstrap/cache</li>
                </ul>

                <p class="my-4 fw-bold">Step 5</p>
                <p class="my-2">Clear the Browser Cache and Open Browser.</p>

                <div class="my-4 d-flex bg-light p-2 rounded-1" style="border-left: 4px solid #b95e04;">
                    <div>
                        <ol class="my-2 d-flex justify-content-evenly p-1 list-unstyled">
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
                                Most browsers cache the CSS and JS files, so <b>DON'T FORGET</b> to clear the browser cache. Otherwise, updated functionality may not be visible, or you may face a broken layout/white blank screen.
                            </li>
                        </ol>
                    </div>
                </div>


                <p class="my-4 fw-bold">Step 6</p>
                <p class="my-2">Now, we need to run migrations. Visit (https://yourdomain.com/migrate) and click the run migrations button.</p>

                <div style=" min-width: 280px;" class="col-12 mt-4">
                    <img src="{{url('images\docs_img\migrate-application.JPG')}}" alt="" class="img-fluid w-100 h-100 col-12">
                    <figcaption class="text-center">App Migration Page</figcaption>
                </div>
                <p class="mt-4">Once the migration is successful, proceed to the login and fix updates.</p>

                <div style=" min-width: 280px;" class="col-12 mt-4">
                    <img src="{{url('images\docs_img\migration-successful.JPG')}}" alt="" class="img-fluid w-100 h-100 col-12">
                    <figcaption class="text-center">Migration Successful Page</figcaption>
                </div>



                <p class="my-4 fw-bold">Final Step</p>

                <div class="my-4 d-flex bg-light p-2 rounded-1" style="border-left: 4px solid #b95e04;">
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
                                After updating the application with the latest files, we must fix some settings. You can do that by performing the below steps.
                            </li>
                        </ol>
                    </div>
                </div>

                <ol class="mt-4">
                    <li class="my-2">Login to the admin account and select
                        <span class="bg-light d-inline-flex px-1 py-1 monospace_class">Settings > Maintenance Settings</span>
                        from the sidebar menu.
                    </li>
                    <li class="my-2">Then, click on the <b>Check and Fix Updates</b> button and confirm the password.</li>
                    <li class="my-2">That's it! Your application is now updated to the latest version.</li>
                </ol>

                <div style=" min-width: 280px;" class="col-12 mt-4">
                    <img src="{{url('images\docs_img\fix-updates.JPG')}}" alt="" class="img-fluid w-100 h-100 col-12">
                </div>


            </section>

            <section class="body-section">
                <div class="row mt-5">
                    <div class="col-lg-5 mx-2 px-3 mt-5 border rounded-2  prev-inst-container">
                        <a href="/admin/docs/installation/post-installation" class="text-muted">
                            <div class="text-dark d-flex justify-content-between align-items-center">
                                <ul class="list-unstyled align-items-center flex-box-container">
                                    <li class=" mt-3"><i class="fa-solid fa-arrow-left fa-lg"></i></li>
                                </ul>
                                <ul class="list-unstyled align-items-center flex-box-container text-end">
                                    <li class="next-inst-text mt-3">Previous</li>
                                    <li>
                                        <h5 class="pre-req-text">Post Installation Steps</h5>
                                    </li>
                                </ul>
                            </div>
                        </a>
                    </div>
                    <div class=" col-lg-5 mx-2 px-3 mt-5 border rounded-2  next-inst-container">
                        <a href="/admin/docs/installation/task-scheduling" class="text-muted">
                            <div class="text-dark d-flex justify-content-between align-items-center">
                                <ul class="list-unstyled align-items-center flex-box-container">
                                    <li class="next-inst-text mt-3">Next - Installation</li>
                                    <li>
                                        <h5 class="pre-req-text">Task Scheduling</h5>
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
                <a class="list-group-item list-group-item-action" href="#list-item-2">Detailed Update Process</a>
            </div>
        </aside>

    </div>

    <!-- javascript includes  -->

    @include('components.doc-defaultjs')

</body>

</html>