<!doctype html>
<html>

@include('components.doc-defaulthead', ['Title' => "Support & FAQ - Others"])

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
                <h3 class="section__title h1">Support & FAQ</h3>
            </section>

            <section class="body-sections" id="list-item-2">
                <h3 class="section__title mt-5">Before purchase, read the following.</h3>
                <ul class="mt-4">
                    <li class="my-2">PHP >= 7.4.10 and MySQL >= 5.7.24 is must.</li>
                    <li class="my-2">Currently, the system doesn't include a payment gateway. Tutor 11+ is primarily implemented to help educational institutions and companies conduct tests for their students and employees internally. In the coming updates, we will implement a store with payment gateways but no ETA.</li>
                    <li class="my-2">Supports all modern browsers, including Chrome, Firefox, Opera, Safari, and Edge. <b>Internet Explorer is not supported as it is discontinued</b>.</li>
                    <li class="my-2">Front-end source code implemented in Vue.js is not included in the Regular License and will be provided upon the purchase of the Extended License.</li>
                </ul>
            </section>

            <section class="body-sections" id="list-item-3">
                <h3 class="section__title mt-5">When can I request support?</h3>
                <ul class="mt-4">
                    <li class="my-2">If you have issues with the installation or configuration of functionality within Tutor 11+.</li>
                    <li class="my-2">If something is not working in the way it should.</li>
                    <li class="my-2">If you find bugs or security issues.</li>
                </ul>
            </section>

            <section class="body-sections" id="list-item-4">
                <h3 class="section__title mt-5">When is support out of the scope of Tutor 11+? </h3>
                <ul class="mt-4">
                    <li class="my-2">Requesting customization services.</li>
                    <li class="my-2">Integration with 3rd party applications (Tools, POS, ERP, SAAS, CMS, etc.)</li>
                    <li class="my-2">Integration with a new payment gateway.</li>
                    <li class="my-2">If the application core files (PHP, JS, VUE, CSS, HTML, BLADE, JSON) files are modified or edited in any way, we will not provide support unless all files are restored to their original form of the corresponding version.</li>
                    <li class="my-2">If the Database is modified (creating, updating, or deleting) manually, the support is void until a fresh install is done or a backup of the original Database is restored (if available)</li>
                </ul>
            </section>

            <section class="body-sections" id="list-item-5">
                <h3 class="section__title mt-5">Channels for Support?</h3>
                <p class="my-3">
                    We respond to item comments, but to get faster support, create a ticket on our <a target="_blank" href="https://nearchip.freshdesk.com/support/login">HelpDesk Portal</a>. Usually, we respond to tickets within 24-48 hours. However, in some cases, it can take a max of 3-5 business days, depends upon the volume of issues you mentioned in the ticket.
                </p>
            </section>

            <section class="body-sections" id="list-item-6">
                <h3 class="section__title mt-5">Refund Policy?</h3>
                <p class="my-3">Please view our refund policy here <a target="_blank" href="https://codecanyon.net/page/customer_refund_policy">https://codecanyon.net/page/customer_refund_policy </a></p>
            </section>

            <section class="body-section">
                <div class="row">
                    <div class="col-lg-5 mx-2 px-3 mt-5 border rounded-2  prev-inst-container">
                        <a href="/admin/docs/other/change-log" class="text-muted">
                            <div class="text-dark d-flex justify-content-between align-items-center">
                                <ul class="list-unstyled align-items-center flex-box-container">
                                    <li class=" mt-3"><i class="fa-solid fa-arrow-left fa-lg"></i></li>
                                </ul>
                                <ul class="list-unstyled align-items-center flex-box-container text-end">
                                    <li class="next-inst-text mt-3">Previous</li>
                                    <li>
                                        <h5 class="pre-req-text">Change Log</h5>
                                    </li>
                                </ul>
                            </div>
                        </a>
                    </div>
                    <div class=" col-lg-5 mx-2 px-3 mt-5 border rounded-2  next-inst-container">
                        <a href="/admin/docs/other/credits" class="text-muted">
                            <div class="text-dark d-flex justify-content-between align-items-center">
                                <ul class="list-unstyled align-items-center flex-box-container">
                                    <li class="next-inst-text mt-3">Next - Other</li>
                                    <li>
                                        <h5 class="pre-req-text">Credits</h5>
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
                <a class="list-group-item list-group-item-action" href="#list-item-2">Before purchase, read the following.</a>
                <a class="list-group-item list-group-item-action" href="#list-item-3">When can I request support?</a>
                <a class="list-group-item list-group-item-action" href="#list-item-4">When is support out of the scope of Tutor 11+?</a>
                <a class="list-group-item list-group-item-action" href="#list-item-5">Channels for Support?</a>
                <a class="list-group-item list-group-item-action" href="#list-item-6">Refund Policy?</a>
            </div>
        </aside>

    </div>

    <!-- javascript includes  -->

    @include('components.doc-defaultjs')

</body>

</html>