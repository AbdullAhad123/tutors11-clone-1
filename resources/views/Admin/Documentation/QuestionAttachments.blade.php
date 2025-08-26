<!doctype html>
<html>

@include('components.doc-defaulthead', ['Title' => "Question Attachments - Manage Questions"])


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
                <h3 class="section__title h1">Question Attachments</h3>
                <p class="my-4">Tutor 11+ supports the following attachment types.</p>
                <ol class="mt-4">
                    <li class="my-1"><a href="#list-item-2">Comprehension Passage</a></li>
                    <li class="my-1"><a href="#list-item-3">Audio</a></li>
                    <li class="my-1"><a href="#list-item-4">Video</a></li>
                    <li class="my-1"><a href="#list-item-5">Image</a></li>
                    <li class="my-1"><a href="#list-item-6">Equation</a></li>
                    <li class="my-1"><a href="#list-item-7">Table</a></li>
                    <li class="my-1"><a href="#list-item-8">Code Snippet</a></li>
                </ol>

            </section>

            <section class="body-sections" id="list-item-2">
                <h3 class="section__title mt-5">Comprehension Passage</h3>
                <p class="my-3">
                    Go to <span class="bg-light d-inline-flex px-1 py-1 monospace_class">Question Bank > Questions</span> and click on the edit icon of a question and then click on the <b>Attachment</b> section.
                </p>
                <div style=" min-width: 280px;" class="col-lg-8 col-md-9 col-sm-10 col-11 mx-auto my-4">
                    <img src="{{url('images\docs_img\comprehension-attachment.webp')}}" alt="Comprehension Attachment" height="auto" width="auto" class="img-fluid w-100 h-100 col-12">
                </div>
                <ol class="mt-4">
                    <li class="my-2">Enable attachment, and choose the attachment type as Comprehension Passage.</li>
                    <li class="my-2">Search and select Comprehension Passage from the dropdown.</li>
                    <li class="my-2">Finally, click on the <b>Update Details</b> button to save the updates.</li>
                </ol>
            </section>

            <section class="body-sections" id="list-item-3">
                <h3 class="section__title mt-5">Audio Attachment</h3>
                <p class="my-3">
                    Go to <span class="bg-light d-inline-flex px-1 py-1 monospace_class">Question Bank > Questions</span> and click on the edit icon of a question and then click on the <b>Attachment</b> section.
                </p>
                <div style=" min-width: 280px;" class="col-lg-7 col-md-8 col-sm-10 col-12 mx-auto my-3">
                    <img src="{{url('images\docs_img\audio-attachment.webp')}}" alt="Audio Attachment" height="auto" width="auto" class="img-fluid w-100 h-100 col-12">
                </div>
                <ol class="mt-4">
                    <li class="my-2">Enable attachment, and choose the attachment type as Audio.</li>
                    <li class="my-2">Choose audio format and provide the link.</li>
                    <li class="my-2">Finally, click on the <b>Update Details</b> button to save the updates.</li>
                </ol>

            </section>

            <section class="body-sections" id="list-item-4">
                <h3 class="section__title mt-5">Video Attachment</h3>
                <p class="my-3">
                    Go to <span class="bg-light d-inline-flex px-1 py-1 monospace_class">Question Bank > Questions</span> and click on the edit icon of a question and then click on the <b>Attachment</b> section.
                </p>
                <div style=" min-width: 280px;" class="col-lg-7 col-md-8 col-sm-10 col-12 mx-auto my-3">
                    <img src="{{url('images\docs_img\video-attachment.webp')}}" alt="Video Attachment" height="auto" width="auto" class="img-fluid w-100 h-100 col-12">
                </div>
                <ol class="mt-4">
                    <li class="my-2">Enable attachment, and choose the attachment type as Video.</li>
                    <li class="my-2">Choose video format and provide the link.</li>
                    <li class="my-2">Finally, click on the <b>Update Details</b> button to save the updates.</li>
                </ol>
                <div class="mt-4 d-flex bg-light p-2 rounded-1" style="border-left: 4px solid #b95e04;">
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
                                For YouTube and Vimeo, instead of the video full URL, provide a video ID.
                            </li>
                        </ol>
                    </div>
                </div>
            </section>

            <section class="body-sections" id="list-item-5">
                <h3 class="section__title mt-5">Image Attachment</h3>
                <p class="my-3">
                    Go to <span class="bg-light d-inline-flex px-1 py-1 monospace_class">Question Bank > Questions</span> and click on the edit icon of a question.
                </p>
                <div style=" min-width: 280px;" class="col-12 mx-auto my-3">
                    <img src="{{url('images\docs_img\image-attachment.webp')}}" alt="Image Attachment" height="auto" width="auto" class="img-fluid w-100 h-100 col-12">
                </div>
                <ol class="mt-4">
                    <li class="my-2">In the question editor, click on the <b>Image</b> icon.</li>
                    <li class="my-2">In the popup, provide an image URL or <b>Browse Server</b> to upload the image through the File Manager.</li>
                    <li class="my-2">Finally, click ok to insert the image.</li>
                </ol>
            </section>

            <section class="body-sections" id="list-item-6">
                <h3 class="section__title mt-5">Equation Attachment</h3>
                <p class="my-3">
                    Go to <span class="bg-light d-inline-flex px-1 py-1 monospace_class">Question Bank > Questions</span> and click on the edit icon of a question.
                </p>
                <div style=" min-width: 280px;" class="col-12 mx-auto my-3">
                    <img src="{{url('images\docs_img\equation-attachment.webp')}}" alt="Equation Attachment" height="auto" width="auto" class="img-fluid w-100 h-100 col-12">
                </div>
                <ol class="mt-4">
                    <li class="my-2">In the question editor, click on the <b>Math</b> icon.</li>
                    <li class="my-2">In the popup, provide latex of the equation in the write TeX box.</li>
                    <li class="my-2">Finally, click ok to insert the equation.</li>
                </ol>
            </section>

            <section class="body-sections" id="list-item-7">
                <h3 class="section__title mt-5">Table Attachment</h3>
                <p class="my-3">
                    Go to <span class="bg-light d-inline-flex px-1 py-1 monospace_class">Question Bank > Questions</span> and click on the edit icon of a question.
                </p>
                <div style=" min-width: 280px;" class="col-12 mx-auto my-3">
                    <img src="{{url('images\docs_img\table-attachment.webp')}}" alt="Table Attachment" height="auto" width="auto" class="img-fluid w-100 h-100 col-12">
                </div>
                <ol class="mt-4">
                    <li class="my-2">In the question editor, click on the <b>Table</b> icon.</li>
                    <li class="my-2">In the popup, select required Rows and Columns.</li>
                    <li class="my-2">Finally, click ok to insert the table.</li>
                </ol>
            </section>

            <section class="body-sections" id="list-item-8">
                <h3 class="section__title mt-5">Code Snippet Attachment</h3>
                <p class="my-3">
                    Go to <span class="bg-light d-inline-flex px-1 py-1 monospace_class">Question Bank > Questions</span> and click on the edit icon of a question.
                </p>
                <div style=" min-width: 280px;" class="col-12 mx-auto my-3">
                    <img src="{{url('images\docs_img\code-snippet-attachment.webp')}}" alt="Code Snippet Attachment" eight="auto" width="auto" class="img-fluid w-100 h-100 col-12">
                </div>
                <ol class="mt-4">
                    <li class="my-2">In the question editor, click on the <b>Image</b> icon.</li>
                    <li class="my-2">In the popup, select a language and enter the code.</li>
                    <li class="my-2">Finally, click ok to insert the snippet.</li>
                </ol>
            </section>

            <section class="body-section">
                <div class="row">
                    <div class="col-lg-5 mx-2 px-3 mt-4 border rounded-2  prev-inst-container">
                        <a href="/admin/docs/manage-questions/order-sequence" class="text-muted">
                            <div class="text-dark d-flex justify-content-between align-items-center">
                                <ul class="list-unstyled align-items-center flex-box-container">
                                    <li class=" mt-3"><i class="fa-solid fa-arrow-left fa-lg"></i></li>
                                </ul>
                                <ul class="list-unstyled align-items-center flex-box-container text-end">
                                    <li class="next-inst-text mt-3">Previous - Question Bank</li>
                                    <li>
                                        <h5 class="pre-req-text">Ordering/Sequence</h5>
                                    </li>
                                </ul>
                            </div>
                        </a>
                    </div>
                    <div class=" col-lg-5 mx-2 px-3 mt-4 border rounded-2  next-inst-container">
                        <a href="/admin/docs/manage-questions/bulk-upload-questions" class="text-muted">
                            <div class="text-dark d-flex justify-content-between align-items-center">
                                <ul class="list-unstyled align-items-center flex-box-container">
                                    <li class="next-inst-text mt-3">Next - Manage Questions</li>
                                    <li>
                                        <h6 class="pre-req-text">Bulk Upload Questions</h5>
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
                <a class="list-group-item list-group-item-action" href="#list-item-2">Comprehension Passage</a>
                <a class="list-group-item list-group-item-action" href="#list-item-3">Audio Attachment</a>
                <a class="list-group-item list-group-item-action" href="#list-item-4">Video Attachment</a>
                <a class="list-group-item list-group-item-action" href="#list-item-5">Image Attachment</a>
                <a class="list-group-item list-group-item-action" href="#list-item-6">Equation Attachment</a>
                <a class="list-group-item list-group-item-action" href="#list-item-7">Table Attachment</a>
                <a class="list-group-item list-group-item-action" href="#list-item-8">Code Snippet Attachment</a>
            </div>
        </aside>

    </div>

    <!-- javascript includes  -->

    @include('components.doc-defaultjs')

</body>

</html>