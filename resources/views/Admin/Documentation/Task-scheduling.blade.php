<!doctype html>
<html>

@include('components.doc-defaulthead', ['Title' => "Task Scheduling - Installation"])

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
                <h3 class="section__title h1">Task Scheduling</h3>
                <p class="section__title__para">Learn how to setup CRON jobs for task scheduling</p>
                <p class="my-4">
                    Test schedules that end will need to mark as expired. For that, we only need to add a single cron configuration entry to our server that runs the
                    <span class="bg-light d-inline-flex px-1 py-1 monospace_class">schedule:run</span>
                    command every minute.
                </p>
            </section>

            <section class="body-sections" id="list-item-2">
                <h5 class="section__title mt-5 fw-bold">Setup Cron Job on Shared Hosting</h5>
                <p class="my-3">To set up the cron job in shared hosting, follow the below steps</p>
                <p class="my-3">Login to cPanel, go to the Cron Jobs page & add a new con job.</p>
                <p class="my-3">Minute, Hours, Days, Month, Weekday need to be set to *</p>

                <div style=" min-width: 280px;" class="col-lg-9 col-md-10 col-12 mx-auto mt-4">
                    <img src="{{url('images\docs_img\setting_cron_job_shared.webp')}}" alt="Set Cron Job on Shared Hosting" class="img-fluid w-100 h-100 col-12">
                </div>

                <p class="my-4">In the command input field, give the following command.</p>

                <div class="my-4 d-flex bg-light px-3 rounded-1 monospace_class position-relative" id="copy_clip_parent">
                    <i class="fa-regular fa-clone fa-lg copy_clip_icon" style="top: 45%" title="Copy"></i>
                    <div class="copy_item">
                        <ol class="m-0 py-1 list-unstyled">
                            <li>/usr/local/bin/php path-to-your-project/artisan schedule:run >> /dev/null 2>&1</li>
                        </ol>
                    </div>
                </div>

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
                                Change the path and PHP version according to your hosting.
                            </li>
                        </ol>
                    </div>
                </div>

            </section>

            <section class="body-sections" id="list-item-3">
                <h5 class="section__title mt-5 fw-bold">Setup Cron Job on Cloud VPS</h5>
                <p class="my-3">To set up the cron job, use the following command to edit the crontab file.</p>

                <div class="my-4 d-flex bg-light px-3 rounded-1 monospace_class position-relative" id="copy_clip_parent">
                    <i class="fa-regular fa-clone fa-lg copy_clip_icon" style="top: 45%" title="Copy"></i>
                    <div class="copy_item">
                        <ol class="m-0 py-1 list-unstyled">
                            <li>$ crontab -e</li>
                        </ol>
                    </div>
                </div>

                <p class="my-3">and add the following line to it.</p>

                <div class="my-4 d-flex bg-light px-3 rounded-1 monospace_class position-relative" id="copy_clip_parent">
                    <i class="fa-regular fa-clone fa-lg copy_clip_icon" style="top: 45%" title="Copy"></i>
                    <div class="copy_item">
                        <ol class="m-0 py-1 list-unstyled">
                            <li>* * * * * cd /path-to-your-project && php artisan schedule:run >> /dev/null 2>&1</li>
                        </ol>
                    </div>
                </div>

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
                                Replace the project path with your application path.
                            </li>
                        </ol>
                    </div>
                </div>

                <div style=" min-width: 280px;" class="col-12 mx-auto mt-4">
                    <img src="{{url('images\docs_img\setting_cron_job_cloudvps.webp')}}" alt="Set Cron Job on Cloud VPS" class="img-fluid w-100 h-100 col-12">
                </div>

                <p class="my-3">Now reload cron service.</p>

                <div class="my-4 d-flex bg-light px-3 rounded-1 monospace_class position-relative" id="copy_clip_parent">
                    <i class="fa-regular fa-clone fa-lg copy_clip_icon" style="top: 45%" title="Copy"></i>
                    <div class="copy_item">
                        <ol class="m-0 py-1 list-unstyled">
                            <li>$ sudo service cron reload</li>
                        </ol>
                    </div>
                </div>

            </section>

            <section class="body-sections" id="list-item-4">
                <h5 class="section__title mt-5 fw-bold">Run Cron Job on Local Host</h5>
                <p class="my-3">Typically, you would not add a scheduler cron entry to your local development machine. Instead, you may use the
                    <span class="bg-light d-inline-flex px-1 py-1 monospace_class">schedule:work</span>
                    Artisan command. This command will run in the foreground and invoke the scheduler every minute until you terminate the command:
                </p>
                <p class="my-3">To run Cron Job on the local machine, go to the application folder and run the following command.</p>

                <div class="my-4 d-flex bg-light px-3 rounded-1 monospace_class position-relative" id="copy_clip_parent">
                    <i class="fa-regular fa-clone fa-lg copy_clip_icon" style="top: 45%" title="Copy"></i>
                    <div class="copy_item">
                        <ol class="m-0 py-1 list-unstyled">
                            <li>$ php artisan schedule:work</li>
                        </ol>
                    </div>
                </div>

                <p class="my-3">If it is windows, then open the command prompt and run the following command.</p>

                <div class="my-4 d-flex bg-light px-3 rounded-1 monospace_class position-relative" id="copy_clip_parent">
                    <i class="fa-regular fa-clone fa-lg copy_clip_icon" style="top: 45%" title="Copy"></i>
                    <div class="copy_item">
                        <ol class="m-0 py-1 list-unstyled">
                            <li>C:\xampp\htdocs\app_folder> php artisan schedule:work</li>
                        </ol>
                    </div>
                </div>

            </section>

            <section class="body-section">
                <div class="row mt-5">
                    <div class="col-lg-5 mx-2 px-3 mt-5 border rounded-2  prev-inst-container">
                        <a href="/admin/docs/installation/update-from-previous-versions" class="text-muted">
                            <div class="text-dark d-flex justify-content-between align-items-center">
                                <ul class="list-unstyled align-items-center flex-box-container">
                                    <li class=" mt-3"><i class="fa-solid fa-arrow-left fa-lg"></i></li>
                                </ul>
                                <ul class="list-unstyled align-items-center flex-box-container text-end">
                                    <li class="next-inst-text mt-3">Previous</li>
                                    <li>
                                        <h5 class="pre-req-text">Update form Previous Versions</h5>
                                    </li>
                                </ul>
                            </div>
                        </a>
                    </div>
                    <div class=" col-lg-5 mx-2 px-3 mt-5 border rounded-2  next-inst-container">
                        <a href="/admin/docs/installation/using-vue.js-source-code" class="text-muted">
                            <div class="text-dark d-flex justify-content-between align-items-center">
                                <ul class="list-unstyled align-items-center flex-box-container">
                                    <li class="next-inst-text mt-3">Next - Installation</li>
                                    <li>
                                        <h5 class="pre-req-text">Using Vue.js Source Code</h5>
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
                <a class="list-group-item list-group-item-action" href="#list-item-2">Setup Cron Job on Shared Hosting</a>
                <a class="list-group-item list-group-item-action" href="#list-item-3">Setup Cron Job on Cloud VPS</a>
                <a class="list-group-item list-group-item-action" href="#list-item-4">Run Cron Job on Local Host</a>
            </div>
        </aside>

    </div>
    
    <!-- Copy Text Alert  -->
    <div class="copy_message bg-success-subtle shadow" style="display: none;">
        <div class="d-flex justify-content-center align-items-center h-100">
            <p class="m-0 text-success">Text Copied to Clipboard!</p>
        </div>
    </div>

    <!-- javascript includes  -->

    @include('components.doc-defaultjs')

</body>

</html>