<!doctype html>
<html>

@include('components.doc-defaulthead', ['Title' => "Localization Settings - Configurations"])

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
                <h3 class="section__title h1">Localization Settings</h3>
                <p class="section__title__para">Update time zone and locale settings</p>
                <p class="my-4">Log in to the admin account and select
                    <span class="bg-light d-inline-flex px-1 py-1 monospace_class">Settings > Localization Settings</span>
                    from the sidebar menu.
                </p>
            </section>

            <section class="body-sections" id="list-item-2">
                <h5 class="section__title mt-5">Add Translations</h5>
                <p class="my-3">All the translation JSON files are stored in the <b>resources/lang</b> directory. The file names should compile with the ISO 15897 standard. </p>
                <p class="my-3">By default application ships with the <b>/resources/lang/en.json</b> file and, all the translations for the English language are present in this file.</p>
                <p class="my-3">E.g. If you wish to create an Arabic translation, follow the steps:</p>
                <ol class="mt-4">
                    <li class="my-1">Create a file named "<b>ar.json</b>" in the <b>/resources/lang</b> directory.</li>
                    <li class="my-1">Copy the content from the "<b>/resources/lang/en.json</b>" to your new "<b>/resources/lang/ar.json</b>" file.</li>
                    <li class="my-1">Edit the values for the translation keys as you wish.</li>
                    <li class="my-1">Save the file.</li>
                </ol>
                <p class="my-3">Go To <b>Localization Settings</b> and update the <b>Default Locale</b> to "ar - Arabic" from the dropdown.</p>
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
                                Translating some third party libraries' strings cannot be possible due to technical limitations.
                            </li>
                        </ol>
                    </div>
                </div>
            </section>

            <section class="body-sections" id="list-item-3">
                <h5 class="section__title mt-5">Update Locale & Timezone</h5>
                <p class="my-3">Scroll down and find the <b>Localization Settings</b> section and choose the following fields as you like. </p>
                <ul class="mt-4">
                    <li class="my-1">Default Locale (Currently only
                        <span class="bg-light d-inline-flex px-1 py-1 monospace_class">English (en)</span>
                        is supported, will add more in future)
                    </li>
                    <li class="my-1">Default Timezone </li>
                </ul>
                <div style=" min-width: 280px;" class="col-lg-10 col-md-10 col-sm-11 col-12 mx-auto mt-4">
                    <img src="{{url('images\docs_img\location-settings.webp')}}" alt="localization settings" height="auto" width="auto" class="img-fluid w-100 h-100 col-12">
                    <figcaption class="text-center">Localization Settings</figcaption>
                </div>
                <p class="my-3">Finally, click on the <b>SAVE</b> button to update the changes.</p>

                <div class="mt-4 d-flex bg-light p-2 rounded-1" style="border-left: 4px solid #346ddb;">
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
                            <li class="my-1 text-justify px-3">
                                In the database, all the timestamps will be stored in UTC by default and converted to your chosen timezone while displaying across the site/app.
                            </li>
                        </ol>
                    </div>
                </div>

            </section>

            <section class="body-section">
                <div class="row ">
                    <div class="col-lg-5 mx-2 px-3 mt-5 border rounded-2  prev-inst-container">
                        <a href="/admin/docs/configurations/site-settings" class="text-muted">
                            <div class="text-dark d-flex justify-content-between align-items-center">
                                <ul class="list-unstyled align-items-center flex-box-container">
                                    <li class=" mt-3"><i class="fa-solid fa-arrow-left fa-lg"></i></li>
                                </ul>
                                <ul class="list-unstyled align-items-center flex-box-container text-end">
                                    <li class="next-inst-text mt-3">Previous</li>
                                    <li>
                                        <h5 class="pre-req-text">Site Settings</h5>
                                    </li>
                                </ul>
                            </div>
                        </a>
                    </div>
                    <div class=" col-lg-5 mx-2 px-3 mt-5 border rounded-2  next-inst-container">
                        <a href="/admin/docs/configurations/homepage-settings" class="text-muted">
                            <div class="text-dark d-flex justify-content-between align-items-center">
                                <ul class="list-unstyled align-items-center flex-box-container">
                                    <li class="next-inst-text mt-3">Next - Configurations</li>
                                    <li>
                                        <h6 class="pre-req-text">Home Page Settings</h5>
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