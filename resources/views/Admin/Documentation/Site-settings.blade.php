<!doctype html>
<html>

@include('components.doc-defaulthead', ['Title' => "Site Settings - Configurations"])

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
                <h3 class="section__title h1">Site Settings</h3>
                <p class="section__title__para">Update site meta tags and logo</p>
                <p class="my-4">Log in to the admin account and select
                    <span class="bg-light d-inline-flex px-1 py-1 monospace_class">Settings > General Settings</span>
                    from the sidebar menu.
                </p>
            </section>

            <section class="body-sections" id="list-item-2">
                <h5 class="section__title mt-5">Update Site Details</h5>
                <p class="my-3">Find the <b>Site Settings</b> section and customize the following fields as you like.</p>
                <ul class="mt-4">
                    <li class="my-1">Site Name</li>
                    <li class="my-1">Tag Line</li>
                    <li class="my-1">SEO Description</li>
                    <li class="my-1">Site Logo</li>
                    <li class="my-1">Site Favicon</li>
                </ul>
            </section>

            <section class="body-sections" id="list-item-3">
                <h5 class="section__title mt-5">Update Site Logo File</h5>
                <p class="my-3">To update the <b>Site Logo</b>, click on the <b>SELECT A NEW LOGO</b> button, choose the image file from your computer files.</p>
                <div style=" min-width: 280px;" class="col-lg-6 col-md-7 col-sm-10 col-12 mx-auto mt-5">
                    <img src="{{url('images\docs_img\site_logo_update.webp')}}" alt="updating site logo" height="auto" width="auto" class="img-fluid w-100 h-100 col-12">
                    <figcaption class="text-center">Migration Successful Page</figcaption>
                </div>
            </section>

            <section class="body-sections" id="list-item-4">
                <h5 class="section__title mt-5">Update Site Favicon</h5>
                <p class="my-3">To update the <b>Site Favicon</b>, click on the <b>SELECT A NEW ICON</b> button, choose the image file from your computer files.</p>
                <p class="my-3">Finally, click on the <b>SAVE</b> button to update the changes.</p>
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
                                Only JPG or PNG files are accepted. The maximum file size is 512KB.
                            </li>
                        </ol>
                    </div>
                </div>
            </section>

            <section class="body-section">
                <div class="row ">
                    <div class="col-lg-5 mx-2 px-3 mt-5 border rounded-2  prev-inst-container">
                        <a href="/admin/docs/installation/using-vue.js-source-code" class="text-muted">
                            <div class="text-dark d-flex justify-content-between align-items-center">
                                <ul class="list-unstyled align-items-center flex-box-container">
                                    <li class=" mt-3"><i class="fa-solid fa-arrow-left fa-lg"></i></li>
                                </ul>
                                <ul class="list-unstyled align-items-center flex-box-container text-end">
                                    <li class="next-inst-text mt-3">Previous - Installation</li>
                                    <li>
                                        <h5 class="pre-req-text">Using Vue.js Source Code</h5>
                                    </li>
                                </ul>
                            </div>
                        </a>
                    </div>
                    <div class=" col-lg-5 mx-2 px-3 mt-5 border rounded-2  next-inst-container">
                        <a href="/admin/docs/configurations/localization-settings" class="text-muted">
                            <div class="text-dark d-flex justify-content-between align-items-center">
                                <ul class="list-unstyled align-items-center flex-box-container">
                                    <li class="next-inst-text mt-3">Next - Configurations</li>
                                    <li>
                                        <h5 class="pre-req-text">Localization Settings</h5>
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
                <a class="list-group-item list-group-item-action" href="#list-item-2">Update Site Details</a>
                <a class="list-group-item list-group-item-action" href="#list-item-3">Update Site Logo File</a>
                <a class="list-group-item list-group-item-action" href="#list-item-4">Update Site Favicon</a>
            </div>
        </aside>

    </div>

    <!-- javascript includes  -->

    @include('components.doc-defaultjs')

</body>

</html>