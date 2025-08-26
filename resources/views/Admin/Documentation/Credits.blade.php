<!doctype html>
<html>

@include('components.doc-defaulthead', ['Title' => "Credits - Others"])

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
                <h3 class="section__title h1">Credits</h3>
                <p class="my-4">
                    Tutor 11+ is a Single Page Application (SPA) built on top of the Laravel (World's Leading PHP Framework) and Vue.js (Fastest JavaScript Framework).
                </p>

                <p class="my-3 fw-bold">Framework Credits</p>
                <ul class="mt-4">
                    <li class="my-2">Laravel - <a target="_blank" href="https://www.laravel.com">https://www.laravel.com</a></li>
                    <li class="my-2">Vue.js - <a target="_blank" href="ttps://www.vuejs.org">https://www.vuejs.org</a></li>
                    <li class="my-2">Tailwind CSS - <a target="_blank" href="https://tailwindcss.com">https://tailwindcss.com</a></li>
                </ul>

                <p class="my-3 fw-bold">Library Credits</p>
                <ul class="mt-4">
                    <li class="my-2">Laravel Jetstream - <a target="_blank" href="https://jetstream.laravel.com">https://jetstream.laravel.com</a></li>
                    <li class="my-2">Inertia.js - <a target="_blank" href="https://inertiajs.com">https://inertiajs.com</a></li>
                    <li class="my-2">Prime Vue - <a target="_blank" href="https://www.primefaces.org/primevue">https://www.primefaces.org/primevue</a></li>
                    <li class="my-2">CKEditor 4 - <a target="_blank" href="https://ckeditor.com/ckeditor-4">https://ckeditor.com/ckeditor-4</a></li>
                    <li class="my-2">Laravel Excel - <a target="_blank" href="https://github.com/maatwebsite/Laravel-Excel">https://github.com/maatwebsite/Laravel-Excel</a></li>
                    <li class="my-2">Laravel File Manager - <a target="_blank" href="https://github.com/alexusmai/laravel-file-manager"> https://github.com/alexusmai/laravel-file-manager</a></li>
                    <li class="my-2">Laravel Permission - <a target="_blank" href="https://github.com/spatie/laravel-permission">https://github.com/spatie/laravel-permission</a></li>
                    <li class="my-2">Vue Select - <a target="_blank" href="https://vue-select.org/">https://vue-select.org/</a></li>
                    <li class="my-2">Vue Good Table - <a target="_blank" href="https://xaksis.github.io/vue-good-table/">https://xaksis.github.io/vue-good-table/</a></li>
                    <li class="my-2">Sweet Alert 2 - <a target="_blank" href="https://sweetalert2.github.io/">https://sweetalert2.github.io/</a></li>
                    <li class="my-2">Chart.js - <a target="_blank" href="https://www.chartjs.org/">https://www.chartjs.org/</a></li>
                    <li class="my-2">Vue Draggable - <a target="_blank" href="https://github.com/SortableJS/Vue.Draggable">https://github.com/SortableJS/Vue.Draggable</a></li>
                    <li class="my-2">Vue Clipboard 2 - <a target="_blank" href="https://github.com/Inndy/vue-clipboard2">https://github.com/Inndy/vue-clipboard2</a></li>
                    <li class="my-2">Vuelidate - <a target="_blank" href="https://vuelidate.js.org/">https://vuelidate.js.org/</a></li>
                    <li class="my-2">Vue Perfect Scrollbar - <a target="_blank" href="https://github.com/lecion/vue-perfect-scrollbar">https://github.com/lecion/vue-perfect-scrollbar</a></li>
                </ul>

                <p class="my-3 fw-bold">Files Credits</p>
                <ul class="mt-4">
                    <li class="my-2">Reward Animation by Stephen Mos on Lottie Files (<a target="_blank" href="https://lottiefiles.com/8672-reward">https://lottiefiles.com/8672-reward</a>)</li>
                    <li class="my-2">Language Icon & Darts Icon by Pixel perfect (<a target="_blank" href="https://www.flaticon.com/authors/pixel-perfect">https://www.flaticon.com/authors/pixel-perfect</a>)</li>
                    <li class="my-2">Notification Sound - <a target="_blank" href="https://notificationsounds.com/sound-effects/insight-578">https://notificationsounds.com/sound-effects/insight-578</a></li>
                    <li class="my-2">Alarm clock free Icon by Freepik (<a target="_blank" href="https://www.flaticon.com/authors/freepik">https://www.flaticon.com/authors/freepik</a>)</li>
                    <li class="my-2">Background vector by pikisuperstar (<a target="_blank" href="https://www.freepik.com/vectors/background">https://www.freepik.com/vectors/background</a>)</li>
                </ul>
            </section>

            <section class="body-section">
                <div class="row">
                    <div class="col-lg-5 mx-2 px-3 mt-5 border rounded-2  prev-inst-container">
                        <a href="/admin/docs/other/support-and-faq" class="text-muted">
                            <div class="text-dark d-flex justify-content-between align-items-center">
                                <ul class="list-unstyled align-items-center flex-box-container">
                                    <li class=" mt-3"><i class="fa-solid fa-arrow-left fa-lg"></i></li>
                                </ul>
                                <ul class="list-unstyled align-items-center flex-box-container text-end">
                                    <li class="next-inst-text mt-3">Previous</li>
                                    <li>
                                        <h5 class="pre-req-text">Support & FAQ</h5>
                                    </li>
                                </ul>
                            </div>
                        </a>
                    </div>
                    <div class=" col-lg-5 mx-2 px-3 mt-5 border rounded-2  next-inst-container">
                        <a href="/admin/docs/other/road-map" class="text-muted">
                            <div class="text-dark d-flex justify-content-between align-items-center">
                                <ul class="list-unstyled align-items-center flex-box-container">
                                    <li class="next-inst-text mt-3">Next - Other</li>
                                    <li>
                                        <h5 class="pre-req-text">Road Map</h5>
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
            <div id="list-example" class="list-group"></div>
        </aside>

    </div>

    <!-- javascript includes  -->

    @include('components.doc-defaultjs')

</body>

</html>