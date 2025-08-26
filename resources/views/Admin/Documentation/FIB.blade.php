<!doctype html>
<html>

@include('components.doc-defaulthead', ['Title' => "Fill In The Blanks - Question Bank - Manage Questions"])


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

        <article class="doc__content" data-bs-spy="scroll" data-bs-target="#list-example" data-bs-smooth-scroll="true" class="scrollspy-example" tabindex="0">

            <section class="body-section">
                <h3 class="section__title h1">Fill in the Blanks</h3>
                <p class="section__title__para">FIB</p>

                <p class="my-4">
                    A Fill in the Blank question consists of a phrase, sentence, or paragraph with a blank space where a student provides the missing word or words. You can also create a question with multiple blanks.
                </p>

                <div style=" min-width: 280px;" class="col-lg-9 col-md-10 col-sm-11 col-12 mx-auto">
                    <img src="{{url('images\docs_img\FIB.webp')}}" alt="fill in the blanks" height="auto" width="auto" class="img-fluid w-100 h-100 col-12">
                </div>

                <p class="my-4">
                    Creating Fill in the Blanks question is pretty straightforward. In the Question Editor, type your phrase, sentence, or paragraph and wrap the word or words you wish to make a blank with double hash ##.
                </p>

                <b>E.g. ##BLANK_ITEM##</b>

                <p class="my-3">
                    The system will automatically convert them to empty blanks, and users will be provided with text boxes to enter their responses.
                </p>

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
                                Blank items are case-sensitive and space-sensitive.
                            </li>
                        </ol>
                    </div>
                </div>

            </section>
            
            <section class="body-section">
                <div class="row">
                    <div class="col-lg-5 mx-2 px-3 mt-4 border rounded-2  prev-inst-container">
                        <a href="/admin/docs/manage-questions/short-answer-question" class="text-muted">
                            <div class="text-dark d-flex justify-content-between align-items-center">
                                <ul class="list-unstyled align-items-center flex-box-container">
                                    <li class=" mt-3"><i class="fa-solid fa-arrow-left fa-lg"></i></li>
                                </ul>
                                <ul class="list-unstyled align-items-center flex-box-container text-end">
                                    <li class="next-inst-text mt-3">Question Bank - Previous</li>
                                    <li>
                                        <h5 class="pre-req-text">Short Answer Question</h5>
                                    </li>
                                </ul>
                            </div>
                        </a>
                    </div>
                    <div class=" col-lg-5 mx-2 px-3 mt-4 border rounded-2  next-inst-container">
                        <a href="/admin/docs/manage-questions/match-the-following" class="text-muted">
                            <div class="text-dark d-flex justify-content-between align-items-center">
                                <ul class="list-unstyled align-items-center flex-box-container">
                                    <li class="next-inst-text mt-3">Next - Question Bank</li>
                                    <li>
                                        <h6 class="pre-req-text">Match the Following</h5>
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