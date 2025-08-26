<!doctype html>
<html>

@include('components.doc-defaulthead', ['Title' => "Ordering/Sequence - Question Bank - Manage Questions"])

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
                <h3 class="section__title h1">Ordering/Sequence</h3>
                <p class="section__title__para">ORD</p>

                <p class="my-4">
                    An ordering/sequence question consists of a scrambled list of related words, phrases, pictures, or symbols. The User needs to arrange them in a logical order/sequence.
                </p>

                <div style=" min-width: 280px;" class="col-lg-9 col-md-10 col-sm-11 col-12 mx-auto">
                    <img src="{{url('images\docs_img\ORD.webp')}}" alt="" class="img-fluid w-100 h-100 col-12">
                </div>

                <ol class="mt-5">
                    <li class="my-2">
                        Minimum two items need to provide.
                    </li>
                    <li class="my-2">
                        You can add up to 10 items. To add an item, click on <b>Add Sequence</b> Item button.
                    </li>
                    <li class="my-2">
                        Enter items in correct order/sequence. Items will automatically shuffle while showing to users.
                    </li>
                </ol>

            </section>
            
            <section class="body-section">
                <div class="row">
                    <div class="col-lg-5 mx-2 px-3 mt-4 border rounded-2  prev-inst-container">
                        <a href="/admin/docs/manage-questions/match-the-following" class="text-muted">
                            <div class="text-dark d-flex justify-content-between align-items-center">
                                <ul class="list-unstyled align-items-center flex-box-container">
                                    <li class=" mt-3"><i class="fa-solid fa-arrow-left fa-lg"></i></li>
                                </ul>
                                <ul class="list-unstyled align-items-center flex-box-container text-end">
                                    <li class="next-inst-text mt-3">Question Bank - Previous</li>
                                    <li>
                                        <h5 class="pre-req-text">Match The Following</h5>
                                    </li>
                                </ul>
                            </div>
                        </a>
                    </div>
                    <div class=" col-lg-5 mx-2 px-3 mt-4 border rounded-2  next-inst-container">
                        <a href="/admin/docs/manage-questions/question-attchments" class="text-muted">
                            <div class="text-dark d-flex justify-content-between align-items-center">
                                <ul class="list-unstyled align-items-center flex-box-container">
                                    <li class="next-inst-text mt-3">Next - Manage Questions</li>
                                    <li>
                                        <h6 class="pre-req-text">Question Attachments</h5>
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