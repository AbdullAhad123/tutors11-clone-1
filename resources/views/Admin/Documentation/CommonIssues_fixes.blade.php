<!doctype html>
<html>

@include('components.doc-defaulthead', ['Title' => "Common Issues & Fixes - Others"])


<body>

    <!-- FULLSCREEN HTML CODE  -->
    <div id="full_page">
        <div class="cancel">
            <i class="fa fa-times fa_cancel_icon"></i>
        </div>
        <div class="image_section"></div>
    </div>

    <!-- navbar starts-->
    @include('components.doc-navbar')

    <div class="wrapper position-relative">

        <!-- SIDE BAR  -->
        @include('components.doc-sidebar')

        <!-- body starts  -->
        <article class="doc__content" data-bs-spy="scroll" data-bs-target="#list-example" data-bs-smooth-scroll="true" class="scrollspy-example" tabindex="0">

            <section class="body-section">
                <h3 class="section__title h1">Common Issues & Fixes</h3>
                <p class="section__title__para">This page is dedicated to fix common issues that arise in Tutor 11+</p>

            </section>

            <section class="body-sections" id="list-item-2">
                <h3 class="section__title mt-5">Site Images, Icon or Images are not loading</h3>
                <p class="my-3">To fix this, please run the following command from the terminal.</p>

                <div class="my-4 d-flex bg-light px-3 p-1 rounded-1 monospace_class position-relative" id="copy_clip_parent">
                    <i class="fa-regular fa-clone fa-lg copy_clip_icon" style="top: 45%" title="Copy"></i>
                    <div class="copy_item">
                        php artisan storage:link
                    </div>
                </div>

                <p class="my-4">Make sure symbolic links are enabled in your hosting server. Also, please check the following variables in the .env file are set as follows.</p>

                <div class="my-4 d-flex bg-light px-3 p-1 rounded-1 monospace_class position-relative" id="copy_clip_parent">
                    <i class="fa-regular fa-clone fa-lg copy_clip_icon" style="top: 45%" title="Copy"></i>
                    <div class="copy_item">
                        APP_INSTALLED=true <br>
                        APP_VERSION=current_Tutor 11+_version
                    </div>
                </div>

            </section>

            <section class="body-sections" id="list-item-3">
                <h3 class="section__title mt-5">Syllabus/Year are not showing</h3>
                <p class="my-3">You need to create subcategories and map sections to the subcategories. Then they will become visible.​ Please refer to the following page thoroughly.</p>

                <div class="px-3 mt-4 border rounded-2 next-inst-container">
                    <a href="/admin/docs/master-data/manage-categories" class="text-muted" style="text-decoration: none!important;">
                        <div class="text-dark d-flex justify-content-between align-items-center py-4">
                            <ul class="m-0 list-unstyled d-flex align-items-center flex-box-container">
                                <li class="me-2">
                                    <svg viewBox="0 0 16 16" fill="none" preserveAspectRatio="xMidYMid meet" data-rnwibasecard--1azsio2-hover="true" data-rnwi-handle="nearest" class="r-1rasi3h" style="vertical-align: middle; width: 32px; height: 32px;">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M4 .4A2.6 2.6 0 001.4 3v10A2.6 2.6 0 004 15.6h8a2.6 2.6 0 002.6-2.6V6.328a2.6 2.6 0 00-.761-1.838L10.51 1.162A2.6 2.6 0 008.672.4H4zM2.6 3A1.4 1.4 0 014 1.6h3.9v2.9a2.6 2.6 0 002.6 2.6h2.9V13a1.4 1.4 0 01-1.4 1.4H4A1.4 1.4 0 012.6 13V3zm10.733 2.9a1.399 1.399 0 00-.343-.562L9.662 2.01a1.4 1.4 0 00-.562-.343V4.5a1.4 1.4 0 001.4 1.4h2.833z" fill="currentColor"></path>
                                    </svg>
                                </li>
                                <li>
                                    <h5 class="pre-req-text mt-2">Manage Categories</h5>
                                </li>
                            </ul>
                        </div>
                    </a>
                </div>

            </section>

            <section class="body-section">
                <div class="row">
                    <div class="col-lg-5 mx-2 px-3 mt-5 border rounded-2  prev-inst-container">
                        <a href="/admin/docs/manage-tests/view-and-export-reports" class="text-muted">
                            <div class="text-dark d-flex justify-content-between align-items-center">
                                <ul class="list-unstyled align-items-center flex-box-container">
                                    <li class=" mt-3"><i class="fa-solid fa-arrow-left fa-lg"></i></li>
                                </ul>
                                <ul class="list-unstyled align-items-center flex-box-container text-end">
                                    <li class="next-inst-text mt-3">Manage Tests - Previous</li>
                                    <li>
                                        <h5 class="pre-req-text">View & Export Reports</h5>
                                    </li>
                                </ul>
                            </div>
                        </a>
                    </div>
                    <div class=" col-lg-5 mx-2 px-3 mt-5 border rounded-2  next-inst-container">
                        <a href="/admin/docs/other/change-log" class="text-muted">
                            <div class="text-dark d-flex justify-content-between align-items-center">
                                <ul class="list-unstyled align-items-center flex-box-container">
                                    <li class="next-inst-text mt-3">Next - Others</li>
                                    <li>
                                        <h5 class="pre-req-text">Change Log</h5>
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
                <a class="list-group-item list-group-item-action" href="#list-item-2">Site Images, Icon or Images are not loading</a>
                <a class="list-group-item list-group-item-action" href="#list-item-3">Syllabus/Year are not showing </a>
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