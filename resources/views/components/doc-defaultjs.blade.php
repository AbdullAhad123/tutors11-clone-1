<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
  integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
  crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>

  $(document).ready(function () {
    // open more options 
    $(".right_down_icon").click(function () {
      if ($("i.right_down_icon").hasClass("fa-chevron-down")) {
        $("i.right_down_icon").removeClass("fa-chevron-down");
        $("i.right_down_icon").addClass("fa-chevron-right");
        $(".card-body").slideUp(200);

      } else {
        $("i.right_down_icon").removeClass("fa-chevron-right");
        $("i.right_down_icon").addClass("fa-chevron-down");
        $(".card-body").slideDown(200);
      }
    });
    // toggle css on html 
    $("#doc__bar__btn").click(function () {
      $(".top-side-navbar").slideToggle(500)
      if ($("html").css("overflow") == "visible") {
        $("html").css("overflow", "hidden");
      } else {
        $("html").css("overflow", "visible");
      }
    });
    // FOR FULLSCREEN IMAGES 
    $("img").click(function () {
      // showing image on fullscreen 
      if($(this).hasClass("not_full_screen")) {
        return;
      } else {
        $("#full_page").fadeIn(200);
        $(".wrapper").hide();
        $("html").css("overflow", "hidden");
        var imgurl = $(this).attr('src').replaceAll("\\", "/");
        $(".image_section").css("background", "url(" + imgurl + ")");
      }
      
    });
    // exiting fullscreen   
    $(".fa_cancel_icon").click(function () {
      $(".wrapper").show();
      $("#full_page").fadeOut(200);
      $("html").css("overflow", "auto")
    });
    // copy to clipboard 
    $(".copy_clip_icon").click(function () {
        let _this = $(this).siblings(".copy_item");
        let copy_text = _this.text();
        var textToCopy = copy_text;
        var tempInput = $("<input>");
        $("body").append(tempInput);
        tempInput.val(textToCopy).select();
        document.execCommand("copy");
        tempInput.remove();
        $(".copy_message").slideDown(150);
        setTimeout(function() {
          $(".copy_message").slideUp(150);
        }, 2000);

    });
    // arrya object 
    const Docs_list = [
        { "text": "introduction", "link": "/admin/docs" },
        { "text": "pre-requisites", "link": "/admin/docs/pre-requisites" },
        { "text": "installation - shared hosting", "link": "/admin/docs/installation/shared-hosting" },
        { "text": "installation - cloud vps", "link": "/admin/docs/installation/cloud-vps" },
        { "text": "installation - local host", "link": "/admin/docs/installation/local-host" },
        { "text": "post installation steps", "link": "/admin/docs/installation/post-installation" },
        { "text": "update from previous versions", "link": "/admin/docs/installation/update-from-previous-versions" },
        { "text": "task scheduling", "link": "/admin/docs/installation/task-scheduling" },
        { "text": "using vue.js source code", "link": "/admin/docs/installation/using-vue.js-source-code" },
        { "text": "site settings", "link": "/admin/docs/configurations/site-settings" },
        { "text": "localization settings", "link": "/admin/docs/configurations/localization-settings" },
        { "text": "home page settings", "link": "/admin/docs/configurations/homepage-settings" },
        { "text": "email settings", "link": "/admin/docs/configurations/email-settings" },
        { "text": "maintenance settings", "link": "/admin/docs/configurations/maintenance-settings" },
        { "text": "manage files", "link": "/admin/docs/configurations/manage-files-settings" },
        { "text": "user roles", "link": "/admin/docs/user-management/user-roles" },
        { "text": "user groups", "link": "/admin/docs/user-management/user-groups" },
        { "text": "users", "link": "/admin/docs/user-management/users" },
        { "text": "manage subjects", "link": "/admin/docs/master-data/manage-subjects" },
        { "text": "manage categories", "link": "/admin/docs/master-data/manage-categories" },
        { "text": "question bank", "link": "/admin/docs/manage-questions/question-bank" },
        { "text": "multiple choice single answer", "link": "/admin/docs/manage-questions/multiple-choice-single-answer" },
        { "text": "multiple choice multiple answers", "link": "/admin/docs/manage-questions/multiple-choice-multiple-answer" },
        { "text": "true or false", "link": "/admin/docs/manage-questions/true-false" },
        { "text": "short answer question", "link": "/admin/docs/manage-questions/short-answer-question" },
        { "text": "fill in the blanks", "link": "/admin/docs/manage-questions/fill-in-the-blanks" },
        { "text": "match the following", "link": "/admin/docs/manage-questions/match-the-following" },
        { "text": "ordering/sequence", "link": "/admin/docs/manage-questions/order-sequence" },
        { "text": "question attachments", "link": "/admin/docs/manage-questions/question-attchments" },
        { "text": "bulk upload questions", "link": "/admin/docs/manage-questions/bulk-upload-questions" },
        { "text": "get started", "link": "/admin/docs/manage-tests/get-started" },
        { "text": "practise sets", "link": "/admin/docs/manage-tests/practice-sets" },
        { "text": "quizzes", "link": "/admin/docs/manage-tests/quizzes" },
        { "text": "quiz schedules", "link": "/admin/docs/manage-tests/quiz-schedule" },
        { "text": "view & export reports", "link": "/admin/docs/manage-tests/view-and-export-reports" },
        { "text": "common issues & fixes", "link": "/admin/docs/other/common-issues-and-fixes" },
        { "text": "change log", "link": "/admin/docs/other/change-log" },
        { "text": "support & faq", "link": "/admin/docs/other/support-and-faq" },
        { "text": "credits", "link": "/admin/docs/other/credits" },
        { "text": "road map", "link": "/admin/docs/other/road-map" }
    ];
    // hide scrollbar on show 
    $('#searchModal').on('shown.bs.modal', function () {
        $('html').addClass('modal-open');
        $("aside.doc__nav").addClass('h-100 modal-open');
    });
    // show scrollbar on hide 
    $('#searchModal').on('hidden.bs.modal', function () {
        $('html').removeClass('modal-open');
        $("aside.doc__nav").removeClass('h-100 modal-open');
    });
    // loop for appending items in Search List 
    let Searching_list = $(".search_list");
    for (let i = 0; i < Docs_list.length; i++) {
        // console.log(Docs_list[i].text);
        let List_item = `
            <li class="searchList_Item border p-2">
                <div class="d-flex justify-content-between align-items-center">
                    <a class="text-dark text-capitalize p-1 px-3 d-block" style="font-size: 1.05rem; text-decoration: none!important" href="`+Docs_list[i].link+`">`+Docs_list[i].text+`</a>
                    <i class="fa fa-search" style="color: #c6c6c6;"></i>
                </div>
            </li>
        `
        // appending list item in List 
        Searching_list.append(List_item);
    };
    // search query and filteration 
    $("#search").keyup(function(){
        let _this = $(this);
        // show searching list on key up 
        if ($(_this).length >= 1) {
            $(Searching_list).fadeIn()
        }
        // filtering the matches 
        let user_input = _this.val().toLowerCase();
        $(".searchList_Item").filter(function() {
            let filteration = $(this).toggle($(this).text().toLowerCase().indexOf(user_input) > -1);
            let isVisible = $(".searchList_Item:visible").length;
            if (isVisible === 0) {
                let not_found = 
                `<li class="searchList_Item border p-2">
                    <span class="text-dark text-capitalize p-1 px-3 d-block" style="font-size: 1.05rem;">No Items Found</span>
                </li>`
                Searching_list.html(not_found);
            }
        });
    });
  });

</script>