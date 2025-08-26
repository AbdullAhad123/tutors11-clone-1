<!doctype html>
<html>

@include('components.doc-defaulthead', ['Title' => "Email Settings - Configurations"])



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
                <h3 class="section__title h1">Email Settings</h3>
                <p class="section__title__para">Update Email SMTP Configuration details</p>
                <p class="my-4">Log in to the admin account and select
                    <span class="bg-light d-inline-flex px-1 py-1 monospace_class">Settings > Email Page Settings</span>
                    from the sidebar menu.
                </p>
            </section>

            <section class="body-sections" id="list-item-2">
                <h3 class="section__title mt-5">Update Email SMTP Details</h3>
                <p class="my-3">Find the <b>Email SMTP Settings</b> section and customize the following fields</p>
                <ul class="mt-4">
                    <li class="my-1">Host Name</li>
                    <li class="my-1">Port Number</li>
                    <li class="my-1">User Name</li>
                    <li class="my-1">Password</li>
                    <li class="my-1">Encryption (SSL or TLS)</li>
                    <li class="my-1">From Address</li>
                    <li class="my-1">From Name</li>
                </ul>
                <p class="my-3">Finally, click on the <b>SAVE</b> button to update the changes.</p>
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
                                The application <b>MUST HAVE</b> a working SMTP configuration for user registration and password resets.
                            </li>
                        </ol>
                    </div>
                </div>
            </section>

            <section class="body-sections" id="list-item-3">
                <h3 class="section__title mt-5">Disable Email Verification Feature</h3>
                <p class="my-3">By default, <b>Email Verification</b> is mandatory in the application. If you wish, you can disable the email verification feature by following the below three steps.</p>

                <div class="my-4 d-flex bg-light p-2 rounded-1" style="border-left: 4px solid #d33d3d;">
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
                                <b>CAUTION</b> <br>
                                It is highly recommended not to disable the email verification feature to prevent fake and spammy registrations.
                            </li>
                        </ol>
                    </div>
                </div>

                <p class="my-4 fw-bold">Step 1</p>
                <p class="my-3">Comment the
                    <span class="bg-light d-inline-flex px-1 py-1 monospace_class">Features::emailVerification()</span>
                    line from features array in the
                    <span class="bg-light d-inline-flex px-1 py-1 monospace_class">config/fortify.php</span> file.
                </p>
                <p class="my-3">Before:</p>
                <div class="my-4 d-flex bg-light px-3 p-1 rounded-1 monospace_class position-relative" id="copy_clip_parent">
                    <i class="fa-regular fa-clone fa-lg copy_clip_icon" style="top: 10%" title="Copy"></i>
                    <div class="copy_item">
                        'features' => {
                        <ol class="m-0 list-unstyled px-3">
                            <li class="px-3">Features::registration(),</li>
                            <li class="px-3">Features::resetPasswords(),;</li>
                            <li class="px-3">Features::emailVerification(),</li>
                            <li class="px-3">Features::updateProfileInformation(),</li>
                            <li class="px-3">Features::updatePasswords(),</li>
                            <li class="px-3">Features::twoFactorAuthentication([
                                <ul class="list-unstyled px-3">
                                    <li class="px-2">'confirmPassword' => true,</li>
                                </ul>
                                ]),
                            </li>
                            <li>],</li>
                        </ol>
                        }
                    </div>
                </div>

                <p class="my-3">Before:</p>
                <div class="my-4 d-flex bg-light px-3 p-1 rounded-1 monospace_class position-relative" id="copy_clip_parent">
                    <i class="fa-regular fa-clone fa-lg copy_clip_icon" style="top: 10%" title="Copy"></i>
                    <div class="copy_item">
                        'features' => [
                        <ol class="m-0 list-unstyled px-3">
                            <li class="px-3">Features::registration(),</li>
                            <li class="px-3">Features::resetPasswords(),;</li>
                            <li class="px-3">//Features::emailVerification(),</li>
                            <li class="px-3">Features::updateProfileInformation(),</li>
                            <li class="px-3">Features::updatePasswords(),</li>
                            <li class="px-3">Features::twoFactorAuthentication([
                                <ul class="list-unstyled px-3">
                                    <li class="px-2">'confirmPassword' => true,</li>
                                </ul>
                                ]),
                            </li>
                            <li>],</li>
                        </ol>
                    </div>
                </div>



                <p class="my-4 fw-bold">Step 2</p>
                <p class="my-3">Remove
                    <span class="bg-light d-inline-flex px-1 py-1 monospace_class">MustVerifyEmail</span>
                    contract implementation from the
                    <span class="bg-light d-inline-flex px-1 py-1 monospace_class">User</span> class by modifying the
                    <span class="bg-light d-inline-flex px-1 py-1 monospace_class">app/Models/User.php</span> file.
                </p>
                <p class="my-3">Before:</p>
                <div class="my-4 d-flex bg-light px-3 p-1 rounded-1 monospace_class position-relative" id="copy_clip_parent">
                    <i class="fa-regular fa-clone fa-lg copy_clip_icon" style="top: 45%" title="Copy"></i>
                    <div class="copy_item">
                        use Illuminate\Contracts\Auth\MustVerifyEmail;
                    </div>
                </div>

                <p class="my-3">After:</p>
                <div class="my-4 d-flex bg-light px-3 p-1 rounded-1 monospace_class position-relative" id="copy_clip_parent">
                    <i class="fa-regular fa-clone fa-lg copy_clip_icon" style="top: 45%" title="Copy"></i>
                    <div class="copy_item">
                        //use Illuminate\Contracts\Auth\MustVerifyEmail;
                    </div>
                </div>

                <p class="mt-3">If you wish to enable the email verification again, do the opposite of the above steps.</p>

            </section>

            <section class="body-section">
                <div class="row">
                    <div class="col-lg-5 mx-2 px-3 mt-3 border rounded-2  prev-inst-container">
                        <a href="/admin/docs/configurations/homepage-settings" class="text-muted">
                            <div class="text-dark d-flex justify-content-between align-items-center">
                                <ul class="list-unstyled align-items-center flex-box-container">
                                    <li class=" mt-3"><i class="fa-solid fa-arrow-left fa-lg"></i></li>
                                </ul>
                                <ul class="list-unstyled align-items-center flex-box-container text-end">
                                    <li class="next-inst-text mt-3">Previous</li>
                                    <li>
                                        <h5 class="pre-req-text">Home Page Settings</h5>
                                    </li>
                                </ul>
                            </div>
                        </a>
                    </div>
                    <div class=" col-lg-5 mx-2 px-3 mt-3 border rounded-2  next-inst-container">
                        <a href="/admin/docs/configurations/maintenance-settings" class="text-muted">
                            <div class="text-dark d-flex justify-content-between align-items-center">
                                <ul class="list-unstyled align-items-center flex-box-container">
                                    <li class="next-inst-text mt-3">Next - Configurations</li>
                                    <li>
                                        <h6 class="pre-req-text">Maintenance Settings</h5>
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
                <a class="list-group-item list-group-item-action" href="#list-item-2">Update Email SMTP Details</a>
                <a class="list-group-item list-group-item-action" href="#list-item-3">Disable Email Verification Feature</a>
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

    </script>
</body>

</html>