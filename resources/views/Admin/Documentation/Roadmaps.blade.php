<!doctype html>
<html>

@include('components.doc-defaulthead', ['Title' => "Road Map - Others"])


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
    <div class="wrapper">

        <!-- SIDE BAR  -->
        @include('components.doc-sidebar')

        <!-- body starts  -->
        <article class="doc__content" data-bs-spy="scroll" data-bs-target="#list-example" data-bs-smooth-scroll="true" class="scrollspy-example" tabindex="0">

            <section class="body-section">
                <h3 class="section__title h1">Road Map</h3>
                <p class="section__title__para">Tutor 11+ Development Road Map</p>
            </section>

            <section class="body-section" id="list-item-2">
                <h3 class="section__title mt-5">Tutor 11+ Development Road Map - Information Purpose Only</h3>
                <p class="my-3">Web and Mobile apps are different products in CodeCanyon.</p>
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
                                After our release, CodeCanyon might take 4-7 days to review the application and approve. Then only it will be available for download.
                            </li>
                        </ol>
                    </div>
                </div>

            </section>

            <section class="body-section" id="list-item-3">
                <h3 class="section__title mt-5">Upcoming Release Schedule.</h3>
                <p class="mt-3 mb-1">For more detailed development progress, kindly visit our project public board </p>
                <a href="https://trello.com/b/bOCPDLNM/Tutor 11+-roadmap" target="_blank">https://trello.com/b/bOCPDLNM/Tutor 11+-roadmap</a>

                <table class="table_group my-5">
                    <thead class="p-2">
                        <th scope="col" class="col-4 fw-bold">Date</th>
                        <th scope="col" class="col-4 fw-bold">Version</th>
                        <th scope="col" class="col-4 fw-bold">Release Features</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td class=" bg-transparent text-start"><span class="text-decoration-line-through">05 Jan 2022</span> (<em>Update Re-sumbitted by disabling licensing server for now - Under Review by CodeCanyon</em>) </td>
                            <td class=" bg-transparent text-start">1.3.0</td>
                            <td class=" bg-transparent text-start">Lessons & Videos, Monthly/Quarterly/Annual Subscription Packages. Offline Payments & Razorpay Payment Gateways Integration.</td>
                        </tr>

                        <tr>
                            <td class=" bg-transparent text-start">TBA</td>
                            <td class=" bg-transparent text-start">1.4.0</td>
                            <td class=" bg-transparent text-start">License Activation, Revenue Monetization from Admin Panel. Paypal, Stripe Payment Gateways Integration.</td>
                        </tr>

                        <tr>
                            <td class=" bg-transparent text-start">TBA</td>
                            <td class=" bg-transparent text-start">1.5.0</td>
                            <td class=" bg-transparent text-start">Sectional Exams, Midtrans & Mercadopago Payment Gateways.</td>
                        </tr>

                    </tbody>
                </table>

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
                            <ul class="list-unstyled m-0">
                                <li class="my-1 text-justify px-3">
                                    <b>Note</b>: All the to-be features listed above are information purpose only, have no expected arrival date, and absolutely no guarantee/warranty/refund will be provided.
                                </li>
                                <li class="text-justify px-3">Feature priorities may upgrade/downgrade based on our users' feedback.</li>
                            </ul>

                        </ol>
                    </div>
                </div>


            </section>

            <section class="body-section">
                <div class="px-3 mt-5 border rounded-2  next-inst-container">
                    <a href="/admin/docs/other/credits" class="text-muted">
                        <div class="text-dark d-flex justify-content-between align-items-center">
                            <ul class="list-unstyled align-items-center flex-box-container">
                                <li class=" mt-3"><i class="fa-solid fa-arrow-left fa-lg"></i></li>
                            </ul>
                            <ul class="text-end list-unstyled align-items-center flex-box-container">
                                <li class="next-inst-text mt-3">Previous</li>
                                <li>
                                    <h5 class="pre-req-text">Credits</h5>
                                </li>
                            </ul>
                        </div>
                    </a>
                </div>
            </section>

        </article>

        <aside class=" rhs-spy bg-white h-100 p-2 pt-5">
            <h6>On This Page</h6>
            <div id="list-example" class="list-group">
                <a class="list-group-item list-group-item-action" href="#list-item-2">Tutor 11+ Development Road</a>
                <a class="list-group-item list-group-item-action" href="#list-item-3">Upcoming Release Schedule.</a>
            </div>
        </aside>

    </div>


    
    <!-- javascript includes  -->

    @include('components.doc-defaultjs')

</body>

</html>