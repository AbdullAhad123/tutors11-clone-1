<aside class="doc__nav" style="user-select: none;">

    <div id="fixed-sidebar"> 
        <div class="d-flex justify-content-between">
            <a class="navbar-brand navbar_brand w-100" href="/admin/docs"></a>
        </div>
        <div class="search_bar position-relative rounded-3 shadow-sm my-4" id="search_bar">
                <input class="form-control p-2 px-3 m-0" type="text"
                placeholder="Search" autocomplete="off" aria-label="Search" readonly data-bs-toggle="modal" data-bs-target="#searchModal">
                <div class="position-absolute top-0 end-0 d-flex justify-content-center align-items-center h-100 p-3 bg-body-tertiary">
                    <i class="fa fa-search fa-md" style="color: #6a6a6a"></i>
                </div>
            </div>
        <!-- <input class="form-control col-6 rounded-3 px-3 py-2 mt-3 shadow-sm" type="text" placeholder="Search here...." autocomplete="off"  aria-label="Search" data-bs-toggle="modal" data-bs-target="#searchModal"> -->

        <!-- sec 1 -->
        <h6 class="Components_heading my-3">GET STARTED</h6>
        <ul class="py-2">
            <li class="js-btn selected rounded-3"><a class="text-muted text-decoration-none p-1 px-3 d-block" href="/admin/docs">Introduction </a></li>
        </ul>

        <!-- sec 2 -->
        <h6 class="Components_heading my-3">INSTALLATION</h6>
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
        <!-- sec 3 -->
        <h6 class="Components_heading my-3">CONFIGURATIONS</h6>
        <ul class="py-2">
            <li class="js-btn rounded-3"><a class="text-muted text-decoration-none p-1 px-3 d-block" href="/admin/docs/configurations/site-settings">Site Settings</a></li>
            <li class="js-btn rounded-3"><a class="text-muted text-decoration-none p-1 px-3 d-block" href="/admin/docs/configurations/localization-settings">Localization Settings</a></li>
            <li class="js-btn rounded-3"><a class="text-muted text-decoration-none p-1 px-3 d-block" href="/admin/docs/configurations/homepage-settings">Home Page Settings</a></li>
            <li class="js-btn rounded-3"><a class="text-muted text-decoration-none p-1 px-3 d-block" href="/admin/docs/configurations/email-settings">Email Settings</a></li>
            <li class="js-btn rounded-3"><a class="text-muted text-decoration-none p-1 px-3 d-block" href="/admin/docs/configurations/maintenance-settings">Maintenance Settings</a></li>
            <li class="js-btn rounded-3"><a class="text-muted text-decoration-none p-1 px-3 d-block" href="/admin/docs/configurations/manage-files-settings">Manage Files</a></li>
        </ul>
        <!-- sec 4 -->
        <h6 class="Components_heading my-3">USER MANAGEMENT</h6>
        <ul class="py-2">
            <li class="js-btn rounded-3"><a class="text-muted text-decoration-none p-1 px-3 d-block" href="/admin/docs/user-management/user-roles">User Roles</a></li>
            <li class="js-btn rounded-3"><a class="text-muted text-decoration-none p-1 px-3 d-block" href="/admin/docs/user-management/user-groups">User Groups</a></li>
            <li class="js-btn rounded-3"><a class="text-muted text-decoration-none p-1 px-3 d-block" href="/admin/docs/user-management/users">Users</a></li>
        </ul>
        <!-- sec 5 -->
        <h6 class="Components_heading my-3">MASTER DATA</h6>
        <ul class="py-2">
            <li class="js-btn rounded-3"><a class="text-muted text-decoration-none p-1 px-3 d-block" href="/admin/docs/master-data/manage-subjects">Manage Subjects</a></li>
            <li class="js-btn rounded-3"><a class="text-muted text-decoration-none p-1 px-3 d-block" href="/admin/docs/master-data/manage-categories">Manage Categories</a></li>
        </ul>
        <!-- sec 6 -->
        <h6 class="Components_heading my-3">MANAGE QUESTIONS</h6>
        <ul class="py-2">
            <li class="js-btn rounded-3 d-flex justify-content-between align-items-center p-1 px-3" id="question-collpase-btn"  role="button"><span>
                    <a class="text-muted text-decoration-none" onclick=document.location='/admin/docs/manage-questions/question-bank'>Question Bank</a></span>
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
        <!-- sec 7 -->
        <h6 class="Components_heading my-3">MANAGE TESTS</h6>
        <ul class="py-2">
            <li class="js-btn rounded-3"><a class="text-muted text-decoration-none p-1 px-3 d-block" href="/admin/docs/manage-tests/get-started">Get Started</a></li>
            <li class="js-btn rounded-3"><a class="text-muted text-decoration-none p-1 px-3 d-block" href="/admin/docs/manage-tests/practice-sets">Question Sets</a></li>
            <li class="js-btn rounded-3"><a class="text-muted text-decoration-none p-1 px-3 d-block" href="/admin/docs/manage-tests/quizzes">Quizzes</a></li>
            <li class="js-btn rounded-3"><a class="text-muted text-decoration-none p-1 px-3 d-block" href="/admin/docs/manage-tests/quiz-schedule">Quiz Schedules</a></li>
            <li class="js-btn rounded-3"><a class="text-muted text-decoration-none p-1 px-3 d-block" href="/admin/docs/manage-tests/view-and-export-reports">View & Export Reports</a></li>
        </ul>
        <!-- sec 8 -->
        <h6 class="Components_heading my-3">OTHER</h6>
        <ul class="py-2">
            <li class="js-btn rounded-3"><a class="text-muted text-decoration-none p-1 px-3 d-block" href="/admin/docs/other/common-issues-and-fixes">Common Issues & Fixes</a></li>
            <li class="js-btn rounded-3"><a class="text-muted text-decoration-none p-1 px-3 d-block" href="/admin/docs/other/change-log">Change Log</a></li>
            <li class="js-btn rounded-3"><a class="text-muted text-decoration-none p-1 px-3 d-block" href="/admin/docs/other/support-and-faq">Support & FAQ</a></li>
            <li class="js-btn rounded-3"><a class="text-muted text-decoration-none p-1 px-3 d-block" href="/admin/docs/other/credits">Credits</a></li>
            <li class="js-btn rounded-3"><a class="text-muted text-decoration-none p-1 px-3 d-block" href="/admin/docs/other/road-map">Road Map</a></li>
        </ul>
    </div>

</aside>

<div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true" aria-scroll="false">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body">
        <div class="search_parent position-relative">
            <div class="search_bar position-relative rounded-3 shadow-sm">
                <input class="form-control p-3 m-0" id="search" type="text"
                placeholder="Type to search items..." autocomplete="off" aria-label="Search" maxlength="50">
                <div class="position-absolute top-0 end-0 d-flex justify-content-center align-items-center h-100 p-3 bg-body-tertiary">
                    <i class="fa fa-search fa-lg"></i>
                </div>
            </div>
            <ul class="search_list list-unstyled shadow-sm border-0 my-2" style="display: none;">   </ul>
        </div>
      </div>
    </div>
  </div>
</div>
