<!doctype html>
<html>

@include('components.doc-defaulthead', ['Title' => "Get Started - Manage Tests"])

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
                <h3 class="section__title h1">Get Started</h3>
                <p class="my-3">Tutor 11+ supports the following forms of tests.</p>
                <ol class="mt-4">
                    <li class="my-2"><a href="/admin/docs/manage-tests/practice-sets">Question Sets</a></li>
                    <li class="my-2"><a href="/admin/docs/manage-tests/quizzes">Quizzes</a></li>
                    <li class="my-2"><span class="text-decoration-line-through">Exams</span> (Coming in Next Major Update)</li>
                </ol>
                <p class="my-3">
                    Let's explore the differences between a quiz, exam, and question set.
                </p>

            </section>

            <section class="body-section" id="list-item-2">
                <h3 class="section__title mt-5">Quiz vs. Exam vs. Question Set</h3>
                <p class="my-3">In general, a <a href="/admin/docs/manage-tests/quizzes">Quiz</a> is the shortest, most common, and most casual form of evaluation. It often implies a short or informal test. Scores may or may not factor into the student’s overall course grade.</p>
                <p class="my-3">An exam is a more formal test with sections that implies a deeper and more final assessment. The format and length of an exam are generally longer and more comprehensive than a quiz. Scores will factor into the student’s overall course grade.</p>
                <p class="my-3"><a href="/admin/docs/manage-tests/practice-sets">Question sets</a> help keep students engaged and prepare them for tests with immediate feedback. Students can also earn rewards through question sets. Practicing helps students focus on weak areas.</p>
                <p class="my-3">While there is no formal standard, these terms often refer to a hierarchy of evaluations — with a quiz as the most casual, an exam as the most serious.</p>
                <p class="my-3">Refer to the following table for more understanding.</p>

                <table class="table_group">
                    <thead class="p-2">
                        <th scope="col" class="col-3 fw-bold">Features</th>
                        <th scope="col" class="col-3 text-center fw-bold">Quiz</th>
                        <th scope="col" class="col-3 text-center fw-bold">Exam (Coming Soon)</th>
                        <th scope="col" class="col-3 text-center fw-bold">Question Set</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="fw-bold bg-transparent text-start">Purpose</td>
                            <td>Informal</td>
                            <td>Formal</td>
                            <td>Practise </td>
                        </tr>

                        <tr>
                            <td class="fw-bold bg-transparent text-start">Format</td>
                            <td>Objective</td>
                            <td>Objective & Subjective</td>
                            <td>Objective</td>
                        </tr>

                        <tr>
                            <td class="fw-bold bg-transparent text-start">Length</td>
                            <td>Short</td>
                            <td>Long</td>
                            <td>Short/Long</td>
                        </tr>

                        <tr>
                            <td class="fw-bold bg-transparent text-start">Score</td>
                            <td>Yes</td>
                            <td>Yes</td>
                            <td>No</td>
                        </tr>

                        <tr>
                            <td class="fw-bold bg-transparent text-start">Limited Time</td>
                            <td>Yes</td>
                            <td>Yes</td>
                            <td>No</td>
                        </tr>

                        <tr>
                            <td class="fw-bold bg-transparent text-start">Section Based</td>
                            <td>No</td>
                            <td>Yes</td>
                            <td>No</td>
                        </tr>

                        <tr>
                            <td class="fw-bold bg-transparent text-start">Earn Rewards</td>
                            <td>No</td>
                            <td>No</td>
                            <td>Yes</td>
                        </tr>

                        <tr>
                            <td class="fw-bold bg-transparent text-start">Feedback</td>
                            <td>On Finish</td>
                            <td>On Finish</td>
                            <td>Immediate</td>
                        </tr>

                        <tr>
                            <td class="fw-bold bg-transparent text-start">Live Schedules</td>
                            <td>Yes</td>
                            <td>Yes</td>
                            <td>No</td>
                        </tr>

                        <tr>
                            <td class="fw-bold bg-transparent text-start">User Groups </td>
                            <td>Yes</td>
                            <td>Yes</td>
                            <td>No</td>
                        </tr>

                    </tbody>
                </table>

            </section>

            <section class="body-section">
                <div class="row">
                    <div class="col-lg-5 mx-2 px-3 mt-5 border rounded-2  prev-inst-container">
                        <a href="/admin/docs/manage-questions/bulk-upload-questions" class="text-muted">
                            <div class="text-dark d-flex justify-content-between align-items-center">
                                <ul class="list-unstyled align-items-center flex-box-container">
                                    <li class=" mt-3"><i class="fa-solid fa-arrow-left fa-lg"></i></li>
                                </ul>
                                <ul class="list-unstyled align-items-center flex-box-container text-end">
                                    <li class="next-inst-text mt-3">Manage-Question - Previous</li>
                                    <li>
                                        <h5 class="pre-req-text">Bulk Upload Questions</h5>
                                    </li>
                                </ul>
                            </div>
                        </a>
                    </div>
                    <div class=" col-lg-5 mx-2 px-3 mt-5 border rounded-2  next-inst-container">
                        <a href="/admin/docs/manage-tests/practice-sets" class="text-muted">
                            <div class="text-dark d-flex justify-content-between align-items-center">
                                <ul class="list-unstyled align-items-center flex-box-container">
                                    <li class="next-inst-text mt-3">Next - Manage Tests</li>
                                    <li>
                                        <h5 class="pre-req-text">Question Sets</h5>
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
                <a class="list-group-item list-group-item-action" href="#list-item-2">Quiz vs. Exam vs. Question Set</a>
            </div>
        </aside>

    </div>

    <!-- javascript includes  -->

    @include('components.doc-defaultjs')

</body>

</html>