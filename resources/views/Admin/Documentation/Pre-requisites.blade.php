<!doctype html>
<html>

@include('components.doc-defaulthead', ['Title' => "Pre-Requisites"])

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
                <h3 class="section__title h1">Pre-requisites</h3>
                <p class="section__title__para">Things to know and prepare before the installation.</p>
            </section>
            
            <section class="body-sections" id="list-item-2">
                <h3 class="section__title mt-5">PHP Version</h3>
                <p class="my-3">Tutor 11+ requires PHP v7.4 with the following extensions enabled. PHP 7.4.10 is recommended.</p>
                <ul class="mt-4">
                    <li class="my-2">OpenSSL PHP Extension</li>
                    <li class="my-2">PDO PHP Extension</li>
                    <li class="my-2">Mbstring PHP Extension</li>
                    <li class="my-2">Tokenizer PHP Extension</li>
                    <li class="my-2">XML PHP Extension</li>
                    <li class="my-2">Ctype PHP Extension</li>
                    <li class="my-2">JSON PHP Extension</li>
                    <li class="my-2">ZIP PHP Extension</li>
                    <li class="my-2">FileInfo PHP Extension</li>
                    <li class="my-2">BCMath PHP Extension</li>
                    <li class="my-2">GD PHP Extension/li>
                </ul>
            </section>
            
            <section class="body-section" id="list-item-3">
                <h3 class="section__title mt-5">MySQL Version</h3>
                <p class="my-3">Tutor 11+ requires a MySQL database with support for JSON columns. MySQL 5.7.24 is recommended. Currently, we only tested MySQL and MariaDB. PostgreSQL is not yet tested.</p>
            </section>
            
            <section class="body-section" id="list-item-4">
                <h3 class="section__title mt-5">Hosting Services</h3>
                <p class="my-3">Tutor 11+ requires Linux-based shared hosting with CPanel or Cloud VPS. While Tutor 11+ works just fine on shared hosting, there might be limitations; thus, we suggest using a VPS for better performance.</p>
                <p class="my-3">Tutor 11+ works on all major managed hosting providers (GoDaddy, NameCheap, BlueHost, SiteGround, HostGator, etc.) and Cloud Providers (AWS, GCP, Azure, DigitalOcean, etc.)</p>
                <p class="my-4 fw-bold">Our Demo is powered by Digital Ocean VPS</p>
                <a target="_blank" href="https://www.digitalocean.com/?refcode=899d01009f04&utm_campaign=Referral_Invite&utm_medium=Referral_Program&utm_source=badge">
                    <img src="https://web-platforms.sfo2.cdn.digitaloceanspaces.com/WWW/Badge%201.svg" alt="">
                </a>
            </section>
            
            <section class="body-section" id="list-item-5">
                <h3 class="section__title mt-5">Application Server</h3>
                <p class="my-3">Tutor 11+ works on both Apache and NGINX. Tutor 11+ is not compatible with the Hostinger LiteSpeed web server.</p>
            </section>

            <section class="body-section" id="list-item-6">
                <h3 class="section__title mt-5">SMTP Mail Configuration</h3>
                <p class="my-3">The application MUST HAVE a working SMTP configuration for user registration and password resets. Without it, you will get an error 500 on registration.</p>
            </section>

            <section class="body-section">
                <div class="row">
                    <div class="col-lg-5 mx-2 px-3 mt-5 border rounded-2  prev-inst-container">
                        <a href="/admin/docs" class="text-muted">
                            <div class="text-dark d-flex justify-content-between align-items-center">
                                <ul class="list-unstyled align-items-center flex-box-container">
                                    <li class=" mt-3"><i class="fa-solid fa-arrow-left fa-lg"></i></li>
                                </ul>
                                <ul class="list-unstyled align-items-center flex-box-container text-end">
                                    <li class="next-inst-text mt-3">Previous</li>
                                    <li>
                                        <h5 class="pre-req-text">Introduction</h5>
                                    </li>
                                </ul>
                            </div>
                        </a>
                    </div>
                    <div class=" col-lg-5 mx-2 px-3 mt-5 border rounded-2  next-inst-container">
                        <a href="/admin/docs/installation/shared-hosting" class="text-muted">
                            <div class="text-dark d-flex justify-content-between align-items-center">
                                <ul class="list-unstyled align-items-center flex-box-container">
                                    <li class="next-inst-text mt-3">Next - Installation</li>
                                    <li>
                                        <h5 class="pre-req-text">Shared Hosting</h5>
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
                <a class="list-group-item list-group-item-action" href="#list-item-2">PHP Version</a>
                <a class="list-group-item list-group-item-action" href="#list-item-3">MySQL Version</a>
                <a class="list-group-item list-group-item-action" href="#list-item-4">Hosting Services</a>
                <a class="list-group-item list-group-item-action" href="#list-item-5">Application Server</a>
                <a class="list-group-item list-group-item-action" href="#list-item-6">SMTP Mail Configuration</a>
            </div>
        </aside>

    </div>


    <!-- DEFUALTJS -->
    
    @include('components.doc-defaultjs')

</body>

</html>