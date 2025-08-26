<!doctype html>
<html>

@include('components.doc-defaulthead', ['Title' => "Short Answer Question - Question Bank - Manage Questions"])

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
                <h3 class="section__title h1">Short Answer Question</h3>
                <p class="section__title__para">SAQ</p>

                <p class="my-4">
                    Short answer questions allow users to provide text or numeric answers. These responses will be validated against the provided possible answers.
                </p>

                <div style=" min-width: 280px;" class="col-lg-9 col-md-10 col-sm-11 col-12 mx-auto">
                    <img src="https://938417898-files.gitbook.io/~/files/v0/b/gitbook-legacy-files/o/assets%2F-Mb1ofvkThROm6pwq71N%2F-MeYqSnpsdc-PiEy0G-C%2F-MeYsa4W2HZHgRJU4Kj5%2FSAQ.png?alt=media&token=98e8f80e-689d-4bbf-a7d8-1105da0db002" alt="" class="img-fluid w-100 h-100 col-12">
                </div>

                <ol class="mt-5">
                    <li class="my-2">
                        At least one acceptable answer needs to provide.
                    </li>
                    <li class="my-2">
                        You can add up to 10 acceptable answers in which one option is the exact answer. To add an option, click on <b>Add Option</b> button.
                    </li>
                    <li class="my-2">
                        Choose the exact answer radio button.
                    </li>
                </ol>

            </section>

            <section class="body-section">
                <div class="row">
                    <div class="col-lg-5 mx-2 px-3 mt-4 border rounded-2  prev-inst-container">
                        <a href="/admin/docs/manage-questions/true-false" class="text-muted">
                            <div class="text-dark d-flex justify-content-between align-items-center">
                                <ul class="list-unstyled align-items-center flex-box-container">
                                    <li class=" mt-3"><i class="fa-solid fa-arrow-left fa-lg"></i></li>
                                </ul>
                                <ul class="list-unstyled align-items-center flex-box-container text-end">
                                    <li class="next-inst-text mt-3">Question Bank - Previous</li>
                                    <li>
                                        <h5 class="pre-req-text">True or False</h5>
                                    </li>
                                </ul>
                            </div>
                        </a>
                    </div>
                    <div class=" col-lg-5 mx-2 px-3 mt-4 border rounded-2  next-inst-container">
                        <a href="/admin/docs/manage-questions/fill-in-the-blanks" class="text-muted">
                            <div class="text-dark d-flex justify-content-between align-items-center">
                                <ul class="list-unstyled align-items-center flex-box-container">
                                    <li class="next-inst-text mt-3">Next - Question Bank</li>
                                    <li>
                                        <h6 class="pre-req-text">Fill in the Blanks</h5>
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
            </div>
        </aside>

    </div>

    <!-- javascript includes  -->

    @include('components.doc-defaultjs')

</body>

</html>