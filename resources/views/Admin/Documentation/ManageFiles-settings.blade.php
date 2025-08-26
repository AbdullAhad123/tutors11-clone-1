<!doctype html>
<html>

@include('components.doc-defaulthead', ['Title' => "Manage Files Settings - Configurations"])

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
                <h3 class="section__title h1">Manage Files</h3>
                <p class="section__title__para">Organize and manage files and uploads in Tutor 11+</p>
                <p class="mt-4 mb-3">By default, Tutor 11+ ships with an integrated File Manager. You can access the File Manager by log in to the admin account and select
                    <span class="bg-light d-inline-flex px-1 py-1 monospace_class"> File Manager</span>
                    from the sidebar menu.
                </p>
                <p class="my-1">This action will open the File Manager in a new tab.</p>

                <div style=" min-width: 280px;" class="col-11 mt-4">
                    <img src="{{url('images\docs_img\file_manager.webp')}}" alt="File Manager" height="auto" width="auto" class="img-fluid col-12">
                    <figcaption class="text-center">Tutor 11+ File Manager</figcaption>
                </div>

                <p class="mt-4">The File Manager will help you in:</p>
                <ul class="mt-1">

                    <li class="my-1">Creating files</li>
                    <li class="my-1">Creating folders</li>
                    <li class="my-1">Copying / Cutting Folders and Files</li>
                    <li class="my-1">Renaming</li>
                    <li class="my-1">Uploading files (multi-upload)</li>
                    <li class="my-1">Downloading files</li>
                    <li class="my-1">Viewing images</li>
                </ul>

                <p class="mt-4">It also ships with:</p>
                <ul class="mt-1">
                    <li class="my-1">Audio player</li>
                    <li class="my-1">Video player</li>
                    <li class="my-1">Image cropper</li>


            </section>

            <section class="body-sections" id="list-item-2">
                <h3 class="section__title mt-5">Get the URL of a File</h3>
                <p class="my-3">To get the URL of a file, select the file, right-click to open a context menu, and click on <b>Properties</b> from the context menu.</p>

                <div style=" min-width: 280px;" class="col-11 mt-4">
                    <img src="{{url('images\docs_img\file-manager-actions.jpg')}}" alt="file manager menu" height="auto" width="auto" class="img-fluid col-12">
                    <figcaption class="text-center">File Context Menu and Properties</figcaption>
                </div>

                <p class="my-4">
                    In the properties modal, click on the <span class="bg-light d-inline-flex px-1 py-1 monospace_class">Get URL</span> button to view the URL. You can copy the URL to the clipboard by clicking on the copy icon.
                </p>

                <div style=" min-width: 280px;" class="col-lg-7 col-md-8 col-sm-10 col-12 mx-auto mt-4">
                    <img src="{{url('images\docs_img\file-manager-copy.webp')}}" alt="file manager actions" height="auto" width="auto" class="img-fluid col-12">
                    <figcaption class="text-center">Copy the File URL</figcaption>
                </div>

            </section>

            <section class="body-sections" id="list-item-3">
                <h3 class="section__title mt-5">File Manager Limitations</h3>
                <p class="my-3">Remember, moving or renaming files in the File Manager won't update the paths of any entities as they are stored in the database columns, and the file manager is nothing to do with the database. It only shows the files on your application disks.</p>

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
                                You need to manually update the paths of entities whenever you rename or move the file. So be cautious.
                            </li>
                        </ol>
                    </div>
                </div>

                <p class="my-4">
                    E.g., If you give an audio file link for the question attachment as /path/audio/sample.mp3 in the question editor, you rename it as /path/audio/toefl.mp3 in the file manager. The file renames, but it won't update the audio link of the question. You need to edit the question and update the audio link with the new path.
                </p>

            </section>

            <section class="body-section">
                <div class="row">
                    <div class="col-lg-5 mx-2 px-3 mt-3 border rounded-2  prev-inst-container">
                        <a href="/admin/docs/configurations/maintenance-settings" class="text-muted">
                            <div class="text-dark d-flex justify-content-between align-items-center">
                                <ul class="list-unstyled align-items-center flex-box-container">
                                    <li class=" mt-3"><i class="fa-solid fa-arrow-left fa-lg"></i></li>
                                </ul>
                                <ul class="list-unstyled align-items-center flex-box-container text-end">
                                    <li class="next-inst-text mt-3">Configurations - Previous</li>
                                    <li>
                                        <h5 class="pre-req-text">Maintenance Settings</h5>
                                    </li>
                                </ul>
                            </div>
                        </a>
                    </div>
                    <div class=" col-lg-5 mx-2 px-3 mt-3 border rounded-2  next-inst-container">
                        <a href="/admin/docs/user-management/user-roles" class="text-muted">
                            <div class="text-dark d-flex justify-content-between align-items-center">
                                <ul class="list-unstyled align-items-center flex-box-container">
                                    <li class="next-inst-text mt-3">Next - User Management</li>
                                    <li>
                                        <h6 class="pre-req-text"> User Roles</h5>
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
                <a class="list-group-item list-group-item-action" href="#list-item-2">Get the URL of a File</a>
                <a class="list-group-item list-group-item-action" href="#list-item-3">File Manager Limitations</a>
            </div>
        </aside>

    </div>

    <!-- javascript includes  -->

    @include('components.doc-defaultjs')
</body>

</html>