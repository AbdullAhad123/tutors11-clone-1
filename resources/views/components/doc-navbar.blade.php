<nav class="doc__navbar navbar navbar-expand-lg" id="navbar-container" style="display: none; user-select: none;">
    <div class="container-fluid col-lg-10 col-12 justify-content-between">
        <a class="navbar-brand" href="/admin/docs">
            <img src="{{ url('storage/'.app(\App\Settings\SiteSettings::class)->favicon_path) }}" class="not_full_screen" alt="tutor 11 logo" style="width: 50px;">
        </a>
        <div class="row col-10 align-items-center justify-content-center navbar-icons-parent ">
            <input class="form-control w-75 rounded-3 px-3 py-2 shadow-sm mt-2" id="search_query" type="search" placeholder="Search here...." aria-label="Search">
            <button class="btn border-0 w-25 text-end" id="doc__bar__btn"><i class="fa fa-bars fa-xl"></i></button>
        </div>
    </div>
</nav>
<ol class="top-side-navbar w-100 mt-5 pt-5" style="display: none; user-select: none;">
    <div class="row col-10 mx-auto align-items-center text-center navbar-toggle-searchbar">
        <input class="form-control w-100 rounded-3 px-3 py-2 shadow-sm" id="small_search_query" type="search" style="display: none;" placeholder="Search here...." aria-label="Search">
    </div>
    <li class="row m-0 p-2">
        <div class="col-lg-4 col-md-4 col-sm-6 col-12 my-1">
            <h5>GET STARTED</h5>
            <ul class="py-2">
                <li class="js-btn selected rounded-3"><a class="text-muted text-decoration-none p-1 px-3 d-block" href="/admin/docs">Introduction </a></li>
            </ul>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6 col-12 my-1">
            <!-- sec 2 -->
            <h5>INSTALLATION</h5>
            <ul class="py-2">
                <li class="js-btn rounded-3"><a class="text-muted text-decoration-none p-1 px-3 d-block" href="/admin/docs/pre-requisites">Pre-requisites</a></li>
                <li class="js-btn rounded-3"><a class="text-muted text-decoration-none p-1 px-3 d-block" href="/admin/docs/installation/shared-hosting">Installation - Shared Hosting</a></li>
                <li class="js-btn rounded-3"><a class="text-muted text-decoration-none p-1 px-3 d-block" href="/admin/docs/installation/cloud-vps">Installation - Cloud VPS</a></li>
                <li class="js-btn rounded-3"><a class="text-muted text-decoration-none p-1 px-3 d-block" href="/admin/docs/installation/local-host">Installation - Local Host</a></li>
                <li class="js-btn rounded-3"><a class="text-muted text-decoration-none p-1 px-3 d-block" href="/admin/docs/installation/post-installation">Post Installation Steps</a></li>
                <li class="js-btn rounded-3"><a class="text-muted text-decoration-none p-1 px-3 d-block" href="/admin/docs/installation/update-from-previous-versions">Update from Previous Versions</a></li>
                <li class="js-btn rounded-3"><a class="text-muted text-decoration-none p-1 px-3 d-block" href="/admin/docs/installation/task-scheduling">Task Scheduling</a></li>
                <li class="js-btn rounded-3"><a class="text-muted text-decoration-none p-1 px-3 d-block" href="/admin/docs/installation/using-vue.js-source-code">Using Vue.js Source Code</a></li>
            </ul>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-6 col-12 my-1">
            <!-- sec 3 -->
            <h5>CONFIGURATIONS</h5>
            <ul class="py-2">
                <li class="js-btn rounded-3"><a class="text-muted text-decoration-none p-1 px-3 d-block" href="/admin/docs/configurations/site-settings">Site Settings</a></li>
                <li class="js-btn rounded-3"><a class="text-muted text-decoration-none p-1 px-3 d-block" href="/admin/docs/configurations/localization-settings">Localization Settings</a></li>
                <li class="js-btn rounded-3"><a class="text-muted text-decoration-none p-1 px-3 d-block" href="/admin/docs/configurations/homepage-settings">Home Page Settings</a></li>
                <li class="js-btn rounded-3"><a class="text-muted text-decoration-none p-1 px-3 d-block" href="/admin/docs/configurations/email-settings">Email Settings</a></li>
                <li class="js-btn rounded-3"><a class="text-muted text-decoration-none p-1 px-3 d-block" href="/admin/docs/configurations/maintenance-settings">Maintenance Settings</a></li>
                <li class="js-btn rounded-3"><a class="text-muted text-decoration-none p-1 px-3 d-block" href="/admin/docs/configurations/manage-files-settings">Manage Files</a></li>
            </ul>
        </div>
    </li>

    <!-- FIRST ROW ENDS -->
    <li class="row m-0 p-2">
        <div class="col-lg-4 col-md-4 col-sm-6 col-12 my-1">
            <!-- sec 4 -->
            <h5>USER MANAGEMENT</h5>
            <ul class="py-2">
                <li class="js-btn rounded-3"><a class="text-muted text-decoration-none p-1 px-3 d-block" href="/admin/docs/user-management/user-roles">User Roles</a></li>
                <li class="js-btn rounded-3"><a class="text-muted text-decoration-none p-1 px-3 d-block" href="/admin/docs/user-management/user-groups">User Groups</a></li>
                <li class="js-btn rounded-3"><a class="text-muted text-decoration-none p-1 px-3 d-block" href="/admin/docs/user-management/users">Users</a></li>
            </ul>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6 col-12 my-1">
            <!-- sec 5 -->
            <h5>MASTER DATA</h5>
            <ul class="py-2">
                <li class="js-btn rounded-3"><a class="text-muted text-decoration-none p-1 px-3 d-block" href="/admin/docs/master-data/manage-subjects">Manage Subjects</a></li>
                <li class="js-btn rounded-3"><a class="text-muted text-decoration-none p-1 px-3 d-block" href="/admin/docs/master-data/manage-categories">Manage Categories</a></li>
            </ul>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-6 col-12 my-1">
            <!-- sec 6 -->
            <h5>MANAGE QUESTIONS</h5>
            <ul class="py-2">
                <li class="js-btn rounded-3 p-1 px-3  d-flex justify-content-between align-items-center" id="question-collpase-btn" role="button"><span><a class="text-muted text-decoration-none" onclick=document.location='/admin/docs/manage-questions/question-bank'>Question Bank</a></span>
                    <i class="fa-solid fa-chevron-right right_down_icon"></i>
                </li>
                <div id="side-bar-more-opt">
                    <ul class="card card-body shadow-sm bg-light border-0 px-2" style="display: none; overflow: hidden;">
                        <li class="p-1 px-2 rounded-3"><a class="text-muted text-decoration-none" href="/admin/docs/manage-questions/multiple-choice-single-answer">Multiple Choice Single Answer</a></li>
                        <li class="p-1 px-2 rounded-3"><a class="text-muted text-decoration-none" href="/admin/docs/manage-questions/multiple-choice-multiple-answer">Multiple Choice Multiple Answers</a></li>
                        <li class="p-1 px-2 rounded-3"><a class="text-muted text-decoration-none" href="/admin/docs/manage-questions/true-false">True or False</a></li>
                        <li class="p-1 px-2 rounded-3"><a class="text-muted text-decoration-none" href="/admin/docs/manage-questions/short-answer-question">Short Answer Question</a></li>
                        <li class="p-1 px-2 rounded-3"><a class="text-muted text-decoration-none" href="/admin/docs/manage-questions/fill-in-the-blanks">Fill in the Blanks</a></li>
                        <li class="p-1 px-2 rounded-3"><a class="text-muted text-decoration-none" href="/admin/docs/manage-questions/match-the-following">Match the Following</a></li>
                        <li class="p-1 px-2 rounded-3"><a class="text-muted text-decoration-none" href="/admin/docs/manage-questions/order-sequence">Ordering/Sequence</a></li>
                    </ul>
                </div>
                <li class="js-btn rounded-3"><a class="text-muted text-decoration-none p-1 px-3 d-block" href="/admin/docs/manage-questions/question-attchments">Question Attachments</a></li>
                <li class="js-btn rounded-3"><a class="text-muted text-decoration-none p-1 px-3 d-block" href="/admin/docs/manage-questions/bulk-upload-questions">Bulk Upload Questions</a></li>
            </ul>
        </div>
    </li>

    <!-- SECOND ROW ENDS  -->
    <li class="row m-0 p-2">
        <div class="col-lg-4 col-md-4 col-sm-6 col-12 my-1">
            <!-- sec 7 -->
            <h5>MANAGE TESTS</h5>
            <ul class="py-2">
                <li class="js-btn rounded-3"><a class="text-muted text-decoration-none p-1 px-3 d-block" href="/admin/docs/manage-tests/get-started">Get Started</a></li>
                <li class="js-btn rounded-3"><a class="text-muted text-decoration-none p-1 px-3 d-block" href="/admin/docs/manage-tests/practice-sets">Question Sets</a></li>
                <li class="js-btn rounded-3"><a class="text-muted text-decoration-none p-1 px-3 d-block" href="/admin/docs/manage-tests/quizzes">Quizzes</a></li>
                <li class="js-btn rounded-3"><a class="text-muted text-decoration-none p-1 px-3 d-block" href="/admin/docs/manage-tests/quiz-schedule">Quiz Schedules</a></li>
                <li class="js-btn rounded-3"><a class="text-muted text-decoration-none p-1 px-3 d-block" href="/admin/docs/manage-tests/view-and-export-reports">View & Export Reports</a></li>
            </ul>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6 col-12 my-1">
            <!-- sec 8 -->
            <h5>OTHER</h5>
            <ul class="py-2">
                <li class="js-btn rounded-3"><a class="text-muted text-decoration-none p-1 px-3 d-block" href="/admin/docs/other/common-issues-and-fixes">Common Issues & Fixes</a></li>
                <li class="js-btn rounded-3"><a class="text-muted text-decoration-none p-1 px-3 d-block" href="/admin/docs/other/change-log">Change Log</a></li>
                <li class="js-btn rounded-3"><a class="text-muted text-decoration-none p-1 px-3 d-block" href="/admin/docs/other/support-and-faq">Support & FAQ</a></li>
                <li class="js-btn rounded-3"><a class="text-muted text-decoration-none p-1 px-3 d-block" href="/admin/docs/other/credits">Credits</a></li>
                <li class="js-btn rounded-3"><a class="text-muted text-decoration-none p-1 px-3 d-block" href="/admin/docs/other/road-map">Road Map</a></li>
            </ul>
        </div>
    </li>
</ol>