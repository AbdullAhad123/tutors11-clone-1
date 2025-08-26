<!doctype html>
<html>

@include('components.doc-defaulthead', ['Title' => "Local Host - Installation "])

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
    <!-- navbar ends -->

    <div class="wrapper">

        <!-- SIDE BAR  -->
        @include('components.doc-sidebar')

        <!-- body starts  -->
        <article class="doc__content" data-bs-spy="scroll" data-bs-target="#list-example" data-bs-smooth-scroll="true" class="scrollspy-example" tabindex="0">

            <section class="body-section">
                <h3 class="section__title h1">Installation - Local Host</h3>
                <p class="my-3">Follow the below steps carefully to install the Tutor 11+ script in the localhost. Your computer must have PHP 7.4, MySQL 5.7.24 or higher, and Apache.</p>
                <ol class="mt-4">
                    <li class="my-2">Configure environment</li>
                    <li class="my-2">Create a database</li>
                    <li class="my-2">Upload script downloaded from CodeCanyon to the XAMPP root folder.</li>
                    <li class="my-2">Installation</li>
                </ol>
                <p class="my-3">See <span class="text-primary">Important Things to Remember</span> before installation.</p>
                <p class="my-4 fw-bold">Our Demo is powered by Digital Ocean VPS</p>
                <a target="_blank" href="https://www.digitalocean.com/?refcode=899d01009f04&utm_campaign=Referral_Invite&utm_medium=Referral_Program&utm_source=badge">
                    <img src="https://web-platforms.sfo2.cdn.digitaloceanspaces.com/WWW/Badge%201.svg" class="not_full_screen" alt="Digital Ocean">
                </a>
                <p class="my-4">See the below video for the installation process.</p>

                <div style="min-width: 280px;height: 400px; position: relative;" class="text-center col-12 my-2">
                    <iframe src="https://cdn.iframe.ly/CH1QF0t" class="col-12" style="top: 0; left: 0; width: 100%; height: 100%; position: absolute; border: 0;" allowfullscreen="" scrolling="no" allow="accelerometer *; clipboard-write *; encrypted-media *; gyroscope *; picture-in-picture *;"></iframe>
                </div>

            </section>

            <section class="body-sections" id="list-item-1">
                <h3 class="section__title mt-5">Installation Process</h3>
                <p class="my-4 fw-bold">Step 1</p>
                <p class="my-2">Download & Install XAMPP, preferably version 7.4.21 / PHP 7.4.21, in your local system using the following link.
                    <a target="_blank" href="https://www.apachefriends.org/download.html">https://www.apachefriends.org/download.html</a>
                </p>
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
                            <li class="my-1 text-justify px-2">
                                Instead of XAMPP, you can use WAMP, Laragon, Laravel Sail, or any other LAMP stack. The script just works. All you need to have is PHP >= 7.4.10 and MySQL >= 5.7.24 installed and configured properly. In this example, we are using XAMPP.
                            </li>
                        </ol>
                    </div>
                </div>
                <p class="my-2">Now open the XAMPP Control Panel and then Start <b>Apache</b> and <b>MySQL</b>.
                </p>

                <p class="my-4 fw-bold">Step 2</p>
                <p class="my-2">Open phpMyAdmin and create a new database.</p>
                <div style=" min-width: 20px; position: relative;" class="text-center my-3">
                    <img src="{{url('images\docs_img\create-database.webp')}}" alt="create a database" class="img-fluid w-100 h-100 col-12 mb-3">
                </div>


                <p class="my-4 fw-bold">Step 3</p>
                <p class="my-2">Now copy the script upload_this.zip file downloaded from CodeCanyon into the server root folder.</p>
                <p class="my-2">E.g.<span class="bg-light d-inline-flex px-1 py-1 monospace_class">C:\xampp\htdocs</span></p>
                <p class="my-2">Extract the <b>upload_this.zip </b> file in the same folder.</p>
                <div class="my-4 d-flex bg-light p-2 rounded-1" style="border-left: 4px solid #346ddb;">
                    <div>
                        <ol class=" m-0 my-2 d-flex justify-content-evenly p-1 list-unstyled">
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
                                Tutor 11+ <b>CAN</b> only be installed on your main domain or subdomain. For example, <b>http://localhost or yourdomain.dev</b>. It <b>CANNOT</b> be installed in the subdirectory path of your domain, for example, <b> yourdomain.dev/my-app or localhost/my-app</b>.
                                <p class="mt-3">
                                    If your app directory is not the same as the server root directory, consider <a href="#list-item-3">creating a virtual host</a>.
                                </p>
                            </li>
                        </ol>
                    </div>
                </div>


                <p class="my-4 fw-bold">Step 4</p>
                <p class="my-2">Now visit <a href="http://Tutor 11+.test/install">http://localhost/install</a> on the browser and follow the installation instructions.</p>
                <div style=" min-width: 280px;" class="col-12 mt-4">
                    <img src="{{url('images\docs_img\installation-screen.jpg')}}" alt="Installation screen" class="img-fluid w-100 h-100 col-12">
                    <figcaption class="text-center">Installer Start Screen</figcaption>
                </div>

                <div style=" min-width: 280px;" class="col-12 mt-4">
                    <img src="{{url('images\docs_img\requirements-screen.jpg')}}" alt="Requirements Screen" class="img-fluid w-100 h-100 col-12">
                    <figcaption class="text-center">Requirements Screen</figcaption>
                </div>

                <div style=" min-width: 280px;" class="col-12 mt-4">
                    <img src="{{url('images\docs_img\permissions-screen.jpg')}}" alt="Permissions Screen" class="img-fluid w-100 h-100 col-12">
                    <figcaption class="text-center">Permissions Screen</figcaption>
                </div>

                <div style=" min-width: 280px;" class="col-12 mt-4">
                    <img src="{{url('images\docs_img\configuraction-screen.jpg')}}" alt="Configuration Screen" class="img-fluid w-100 h-100 col-12">
                    <figcaption class="text-center">Configuration Screen</figcaption>
                </div>

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
                                We suggest using Form Wizard Setup for editing environment settings. If you are using Classic Text Editor for editing Environment Settings, please make sure you click on the Save .env button after editing the .env file and before proceeding to the further installation
                            </li>
                        </ol>
                    </div>
                </div>

                <div style=" min-width: 280px;" class="col-12 mt-4">
                    <img src="{{url('images\docs_img\local-environment-screen.jpg')}}" alt="Environment Screen" class="img-fluid w-100 h-100 col-12">
                    <figcaption class="text-center">Environment Screen</figcaption>
                </div>

                <div style=" min-width: 280px;" class="col-12 mt-4">
                    <img src="{{url('images\docs_img\database-screen.jpg')}}" alt="Database Screen" class="img-fluid w-100 h-100 col-12">
                    <figcaption class="text-center">Database Screen</figcaption>
                </div>

                <div style=" min-width: 280px;" class="col-12 mt-4">
                    <img src="{{url('images\docs_img\application-screen.jpg')}}" alt="Application Screen" class="img-fluid w-100 h-100 col-12">
                    <figcaption class="text-center">Install</figcaption>
                </div>


                <p class="my-4 fw-bold">Final Step</p>
                <p class="my-2">Finally, when you are on the installation success screen, don't close the browser window directly. Instead, you must hit the <b>Click here to exit</b> the button to complete the installation. </p>
                <div style=" min-width: 280px;" class="col-12">
                    <img src="{{url('images\docs_img\success-screen.jpg')}}" alt="Installation Successful" class="img-fluid w-100 h-100 col-12">
                </div>
                <div class="my-4 d-flex bg-light p-2 rounded-1" style="border-left: 4px solid #d33d3d;">
                    <div>
                        <p class="my-2 align-items-center p-1">
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
                            <span>If the installation fails due to server issues, fix them and: </span>
                        </p>
                        <ol class="mt-2 ml-3" style="list-style: inside decimal;">
                            <li class="my-2">Delete all the tables in the existing database or make a new database.</li>
                            <li class="my-2">Delete the <b>storage/installed</b> file of the app in the sever</li>
                            <li class="my-2">Replace the .env file on the server with the .env file from the downloaded script.</li>
                            <li class="my-2">Finally, start the installation again by visiting <b>yourdomain.com/install</b>.</li>
                        </ol>
                    </div>
                </div>

            </section>

            <section class="body-section" id="list-item-2">
                <h3 class="section__title mt-5">Create a Virtual Host (Optional)</h3>
                <p class="my-2">If you want to configure a virtual host instead of localhost in the URL, you can create a virtual host in the Apache virtual hosts configuration file.</p>
                <p class="my-2">Open the <span class="bg-light d-inline-flex px-1 py-2 monospace_class">C:\xampp\apache\conf\extra\httpd-vhosts.conf</span>
                    file and paste the below configuration into it.</p>
                <div class="my-4 d-flex bg-light p-1 rounded-1 monospace_class position-relative" id="copy_clip_parent">
                    <i class="btn bg-transparent border-0 shadow-none fa-regular fa-clone fa-lg copy_clip_icon" type="button" title="Copy"></i>
                    <div class="copy_item">
                        <ol class=" ml-3 list-unstyled px-2">
                            <li class="mt-3">&ltVirtualHost *:80&gt</li>
                            <li class="px-4">DocumentRoot "C:/xampp/htdocs/public"</li>
                            <li class="px-4">ServerName yourdomain.dev</li>
                            <li class="mb-3">&lt/VirtualHost&gt</li>
                        </ol>
                    </div>
                </div>

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
                            <li class="my-1 text-justify px-2">
                                If your installation is in a different path, change <b>DocumentRoot</b> according to your application path.
                                <br>
                                You should set the document root to the app's <b>/public</b> directory, not the root directory. If you set it to the root directory, it won't work.
                            </li>
                        </ol>
                    </div>
                </div>

                <p class="my-2">Now you need to update your Windows hosts file. Open
                    <span class="bg-light d-inline-flex px-1 py-2 monospace_class">C:\Windows\System32\drivers\etc\hosts</span>
                    file and add the following line to it.
                </p>

                <div class="my-4 d-flex bg-light p-1 rounded-1 monospace_class position-relative" id="copy_clip_parent">
                    <i class="btn bg-transparent border-0 shadow-none fa-regular fa-clone fa-lg copy_clip_icon" type="button" title="Copy"></i>
                    <div class="copy_item">
                        <ol class="m-0 list-unstyled px-2">
                            <li>127.0.0.1 yourdomain.dev</li>
                        </ol>
                    </div>
                </div>

                <div style="min-width: 280px;" class="col-12">
                    <img src="{{url('images\docs_img\virtual_host_window.webp')}}" alt="Virtual Host Wnidow" class="img-fluid w-100 h-100 col-12">
                </div>

                <p class="mt-4">Now, restart the Apache from the XAMPP control panel.</p>

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
                                If you configure the virtual host after installation, manually edit the .env file in the application root folder and replace the APP_URL property with the new host.
                                <br>
                                Eg: <span class="bg-light d-inline-flex px-1 py-1 monospace_class">APP_URL=http://localhost</span>
                                to
                                <span class="bg-light d-inline-flex px-1 py-1 monospace_class">APP_URL=http://Tutor 11+.test</span>
                            </li>
                        </ol>
                    </div>
                </div>
            </section>

            <section class="body-section" id="list-item-3">
                <h3 class="section__title mt-5">Installation Support</h3>
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
                            <li class="my-1 text-justify px-2">
                                Please raise a ticket on our support portal if you have any issues with the installation within the Tutor 11+ application.
                            </li>
                        </ol>
                    </div>
                </div>

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
                                We cannot provide fixes that are related to your web hosting or server environment. Therefore, if your hosting or server environment is different than what is listed in the above section, you’ll need to determine if it will work before purchasing. Server setup and configuration are not in our scope of support.
                            </li>
                        </ol>
                    </div>
                </div>
            </section>

            <section class="body-section">
                <div class="row">
                    <div class="col-lg-5 mx-2 px-3 mt-5 border rounded-2  prev-inst-container">
                        <a href="/admin/docs/installation/cloud-vps" class="text-muted">
                            <div class="text-dark d-flex justify-content-between align-items-center">
                                <ul class="list-unstyled align-items-center flex-box-container">
                                    <li class=" mt-3"><i class="fa-solid fa-arrow-left fa-lg"></i></li>
                                </ul>
                                <ul class="list-unstyled align-items-center flex-box-container text-end">
                                    <li class="next-inst-text mt-3">Previous</li>
                                    <li>
                                        <h5 class="pre-req-text">Installation - Cloud VPS</h5>
                                    </li>
                                </ul>
                            </div>
                        </a>
                    </div>
                    <div class=" col-lg-5 mx-2 px-3 mt-5 border rounded-2  next-inst-container">
                        <a href="/admin/docs/installation/post-installation" class="text-muted">
                            <div class="text-dark d-flex justify-content-between align-items-center">
                                <ul class="list-unstyled align-items-center flex-box-container">
                                    <li class="next-inst-text mt-3">Next - Installation</li>
                                    <li>
                                        <h5 class="pre-req-text">Post Installation Steps</h5>
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
                <a class="list-group-item list-group-item-action" href="#list-item-1">Installation Process</a>
                <a class="list-group-item list-group-item-action" href="#list-item-2">Create a Virtual Host</a>
                <a class="list-group-item list-group-item-action" href="#list-item-3">Installation Support</a>
            </div>
        </aside>

    </div>

    <!-- Copy Text Alert  -->
    <div class="copy_message bg-success-subtle shadow" style="display: none;">
        <div class="d-flex justify-content-center align-items-center h-100">
            <p class="m-0 text-success">Text Copied to Clipboard!</p>
        </div>
    </div>
    
    <!-- DEFUALTJS -->

    @include('components.doc-defaultjs')

</body>

</html>