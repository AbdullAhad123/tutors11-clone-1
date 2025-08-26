<!doctype html>
<html>

@include('components.doc-defaulthead', ['Title' => "Cloud VPS - Installation "])

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
                <h3 class="section__title h1">Installation - Cloud VPS</h3>
                <p class="section__title__para">Learn how to install Tutor 11+ in Linux Virtual Private Server</p>
                <p class="my-3">Follow the below steps carefully to install the Tutor 11+ script in the cloud server. Your server must have PHP 7.4, MySQL 5.7.24 or higher, and Apache/NGINX. </p>
                <ol class="mt-4">
                    <li class="my-2">Configure a domain to your server public IP address</li>
                    <li class="my-2">Create a database</li>
                    <li class="my-2">Upload script downloaded from CodeCanyon to the server using WinSCP.</li>
                    <li class="my-2">Installation</li>
                </ol>
                <p class="my-3">See <span class="text-primary">Important Things to Remember</span> before installation.</p>
                <p class="my-3">The following are some useful links for configuring the Laravel application in cloud servers.</p>
                <ul class="mt-4">
                    <li class="my-2">How To Install Linux, Nginx, MySQL, PHP (LEMP Stack) on Ubuntu 20.04
                        <a target="_blank" href="https://www.digitalocean.com/community/tutorials/how-to-install-linux-nginx-mysql-php-lemp-stack-on-ubuntu-20-04">https://www.digitalocean.com/community/tutorials/how-to-install-linux-nginx-mysql-php-lemp-stack-on-ubuntu-20-04</a>
                    </li>
                    <li class="my-2">How To Install and Configure Laravel with Nginx on Ubuntu 20.04 (LEMP)
                        <a target="_blank" href="https://www.digitalocean.com/community/tutorials/how-to-install-and-configure-laravel-with-nginx-on-ubuntu-20-04">https://www.digitalocean.com/community/tutorials/how-to-install-and-configure-laravel-with-nginx-on-ubuntu-20-04</a>
                    </li>
                </ul>
                <p class="my-4 fw-bold">Our Demo is powered by Digital Ocean VPS</p>
                <a target="_blank" href="https://www.digitalocean.com/?refcode=899d01009f04&utm_campaign=Referral_Invite&utm_medium=Referral_Program&utm_source=badge">
                    <img src="https://web-platforms.sfo2.cdn.digitaloceanspaces.com/WWW/Badge%201.svg" class="not_full_screen" alt="Digital Ocean">
                </a>
                <p class="my-4">See the below video for the installation process.</p>

            </section>

            <section class="body-sections" id="list-item-2">
                <h3 class="section__title mt-5">Installation Process</h3>
                <p class="my-4 fw-bold">Step 1</p>
                <p class="my-2">Create a domain or subdomain and set A record to the server IP address in your DNS editor.</p>

                <p class="my-4 fw-bold">Step 2</p>
                <p class="my-2">Login to your putty using SSH client, create a database and assign all privileges to the database user.</p>
                <div class="my-4 d-flex bg-light p-1 rounded-1 monospace_class position-relative" id="copy_clip_parent">
                    <i class="btn bg-transparent border-0 shadow-none fa-regular fa-clone fa-lg copy_clip_icon" type="button"  title="Copy"></i>
                    <div class="copy_item">
                        <ol class=" ml-3 list-unstyled px-2">
                            <li class="my-3">$ myql -u root -p</li>
                            <li class="my-3">mysql > CREATE DATABASE Tutor 11+;</li>
                            <li class="my-3">mysql > CREATE USER 'user'@'%' IDENTIFIED WITH mysql_native_password BY 'password';</li>
                            <li class="my-3">mysql > GRANT ALL ON Tutor 11+.* TO 'Tutor 11+'@'%';</li>
                        </ol>
                    </div>
                </div>


                <p class="my-4 fw-bold">Step 3</p>
                <ul class="mt-4">
                    <li class="my-2">Download the zip file from CodeCanyon..</li>
                    <li class="my-2">Extract the zip file from your system.</li>
                    <li class="my-2">Navigate to
                        <span class="bg-light fw-bold d-inline-flex px-1 py-2 monospace_class">Fresh Installation</span>folder
                    </li>
                    <li class="my-2">Select the <b>upload_this.zip</b> file and upload it to the
                        <span class="bg-light d-inline-flex px-1 py-2 monospace_class">/var/www/app_folder</span>
                        directory of your server using WinSCP.
                    </li>
                    <li class="my-2">Extract the contents of the uploaded zip file to the same directory i.e
                        <span class="bg-light d-inline-flex px-1 py-2 monospace_class">public_html/[DOMAIN_FOLDER]</span>
                    </li>
                </ul>
                <div class="my-4 d-flex bg-light p-1 rounded-1 monospace_class position-relative" id="copy_clip_parent">
                    <i class="btn bg-transparent border-0 shadow-none fa-regular fa-clone fa-lg copy_clip_icon" type="button"  title="Copy"></i>
                    <div class="copy_item">
                        <ol class=" ml-3 list-unstyled px-2">
                            <li class="my-3">cd /var/www/your_folder <br>sudo chmod a+rwx /var/www/your_folder</li>
                            <li class="my-3">unzip upload_this.zip</li>
                            <li class="my-3">rm -r upload_this.zip</li>
                        </ol>
                    </div>
                </div>

                <ul>
                    <li class="my-2">
                        Give 775 permission to the following directories.
                        <ul class="py-2" style="list-style-type: disc;">
                            <li class="my-2">storage/framework</li>
                            <li class="my-2">storage/logs</li>
                            <li class="my-2">bootstrap/cache</li>
                        </ul>
                    </li>
                </ul>

                <div class="my-4 d-flex bg-light p-1 rounded-1 monospace_class position-relative" id="copy_clip_parent">
                    <i class="btn bg-transparent border-0 shadow-none fa-regular fa-clone fa-lg copy_clip_icon" type="button"  title="Copy"></i>
                    <div class="copy_item">
                        <ol class=" ml-3 list-unstyled px-2">
                            <li class="my-3">chown -R $USER:www-data storage <br>chown -R $USER:www-data bootstrap/cache</li>
                            <li class="my-3">chmod -R 775 storage <br>chmod -R 775 bootstrap/cache</li>
                        </ol>
                    </div>
                </div>

                <ul>
                    <li class="my-2">
                        Give 644 permission to the .env file.
                    </li>
                </ul>
                <div class="my-4 d-flex bg-light p-1 rounded-1 monospace_class position-relative" id="copy_clip_parent">
                    <i class="btn bg-transparent border-0 shadow-none fa-regular fa-clone fa-lg copy_clip_icon" type="button"  title="Copy"></i>
                    <div class="copy_item">
                        <ol class=" ml-3 list-unstyled px-2">
                            <li class="my-3">chmod 644 .env <br>chown $USER:www-data .env</li>
                        </ol>
                    </div>
                </div>


                <p class="my-4 fw-bold">Step 4</p>
                <p class="my-2">The application files are now in order, but we still need to configure Nginx to serve the content. To do this, we’ll create a new virtual host configuration file at
                    <span class="bg-light d-inline-flex px-1 py-2 monospace_class">/etc/nginx/sites-available</span>.
                </p>

                <div class="my-4 d-flex bg-light px-3 rounded-1 monospace_class position-relative" id="copy_clip_parent">
                    <i class="fa-regular fa-clone fa-lg copy_clip_icon" style="top: 45%"  title="Copy"></i>
                    <div class="copy_item">
                        <ol class="m-0 py-2 list-unstyled">
                            <li>nano /etc/nginx/sites-available/yourdomain</li>
                        </ol>
                    </div>
                </div>

                <p class="my-2">The following configuration file contains the recommended settings for Laravel applications on Nginx: Copy this content to your <span class="bg-light d-inline-flex px-1 py-2 monospace_class">/etc/nginx/sites-available/yourdomain</span> file and adjust the directory path and other values to align with your own configuration. Save and close the file when you’re done editing.</p>

                <div class="my-4 d-flex bg-light px-3 p-1 rounded-1 monospace_class position-relative" id="copy_clip_parent">
                    <i class="fa-regular fa-clone fa-lg copy_clip_icon" style="top: 5%"  title="Copy"></i>
                    <div class="copy_item">
                        server {
                        <ol class="m-0 my-3 list-unstyled px-3">
                            <li>listen 80;</li>
                            <li>server_name server_domain_or_IP;</li>
                            <li>root /var/www/your_folder/public;</li>
                        </ol>
                        <ol class="m-0 my-3 list-unstyled px-3">
                            <li>add_header X-Frame-Options "SAMEORIGIN";</li>
                            <li>add_header X-XSS-Protection "1; mode=block";</li>
                            <li>add_header X-Content-Type-Options "nosniff";</li>
                            <li class="my-3">index index.html index.htm index.php;</li>
                            <li class="my-3">charset utf-8;</li>
                            <li class="my-3">location / { <br> <span class="px-3">try_files $uri $uri/ /index.php?$query_string;</span> <br> } </li>
                            <li class="my-3">location = /favicon.ico { access_log off; log_not_found off; } <br> location = /robots.txt { access_log off; log_not_found off; }</li>
                            <li class="my-3">error_page 404 /index.php;</li>
                            <li class="mt-3">location ~ \.php$ {</li>
                            <li class="px-3"> fastcgi_pass unix:/var/run/php/php7.4-fpm.sock;</li>
                            <li class="px-3">fastcgi_index index.php;</li>
                            <li class="px-3">fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;</li>
                            <li class="px-3">include fastcgi_params;</li>
                            <li>}</li>
                            <li class="mt-3">location ~ /\.(?!well-known).* {</li>
                            <li class="px-3"> deny all;</li>
                            <li>}</li>
                        </ol>
                        }
                    </div>
                </div>

                <p class="my-2">To activate the new virtual host configuration file, create a symbolic link to
                    <span class="bg-light d-inline-flex px-1 py-1 monospace_class">yourdomain</span> in sites-enabled.
                </p>

                <div class="my-4 d-flex bg-light p-1 rounded-1 monospace_class position-relative" id="copy_clip_parent">
                    <i class="btn bg-transparent border-0 shadow-none fa-regular fa-clone fa-lg copy_clip_icon" type="button"  title="Copy"></i>
                    <div class="copy_item">
                        <ol class="m-0 px-3 list-unstyled">
                            <li class="my-2">sudo ln -s /etc/nginx/sites-available/yourdomain /etc/nginx/sites-enabled/</li>
                            <li class="my-2">sudo nginx -t</li>
                            <li class="my-2">sudo systemctl reload nginx</li>
                        </ol>
                    </div>
                </div>

                <p class="my-3 fw-bold">Step 5</p>
                <p class="my-1">Then navigate to <b>yourdomain.com/install</b> on the browser and follow the instructions.</p>
                <div style=" min-width: 280px;" class="col-12 mt-4">
                <img src="{{url('images\docs_img\installation-screen.jpg')}}" alt="installation screen" class="img-fluid col-12">
                </div>


                <p class="my-4 fw-bold">Final Step</p>
                <p class="my-2">Finally, when you are on the installation success screen, don't close the browser window directly. Instead, you must hit the <b>Click here to exit</b> the button to complete the installation.</p>
                <div style=" min-width: 280px;" class="col-12 mt-4">
                <img src="{{url('images\docs_img\success-screen.jpg')}}" alt="Installation successful" class="img-fluid col-12">
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

                <p class="my-4 fw-bold">Important Things to Remember</p>
                <ul class="mt-2 ml-3">
                    <li class="my-2">
                        Tutor 11+ <b>CAN</b> only be installed on your main domain or subdomain. For example, <b>yourdomain.com</b> or <b>app.yourdomain.com</b>. It <b>CANNOT</b> be installed in the subdirectory path of your domain, for example, <b>www.yourdomain.com/my-app</b>.
                    </li>
                    <li class="my-2">
                        You should set the domain root directory to the app's <b>/public</b> directory, not the root directory. If you set it to the root directory, it won't work and will also expose the application's sensitive data.
                    </li>
                </ul>
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
                        <a href="/admin/docs/installation/shared-hosting" class="text-muted">
                            <div class="text-dark d-flex justify-content-between align-items-center">
                                <ul class="list-unstyled align-items-center flex-box-container">
                                    <li class=" mt-3"><i class="fa-solid fa-arrow-left fa-lg"></i></li>
                                </ul>
                                <ul class="list-unstyled align-items-center flex-box-container text-end">
                                    <li class="next-inst-text mt-3">Previous</li>
                                    <li>
                                        <h5 class="pre-req-text">Shared Hosting</h5>
                                    </li>
                                </ul>
                            </div>
                        </a>
                    </div>
                    <div class=" col-lg-5 mx-2 px-3 mt-5 border rounded-2  next-inst-container">
                        <a href="/admin/docs/installation/local-host" class="text-muted">
                            <div class="text-dark d-flex justify-content-between align-items-center">
                                <ul class="list-unstyled align-items-center flex-box-container">
                                    <li class="next-inst-text mt-3">Next - Installation</li>
                                    <li>
                                        <h5 class="pre-req-text">Installation - Local Host</h5>
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
                <a class="list-group-item list-group-item-action" href="#list-item-2">Installation Process</a>
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