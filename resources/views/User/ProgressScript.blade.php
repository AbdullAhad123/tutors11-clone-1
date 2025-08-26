
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<script>
  
    $(document).ready(function () {

      $("#home_tab").click(function () {
        $("#home_tab_section").show();
        $("#exam_tab_section").hide();
        $("#quiz_tab_section").hide();
        $("#practice_tab_section").hide();
        $("#text_print").text("Test in progress")
      });

      $("#exam_tab").click(function () {
        $("#home_tab_section").hide();
        $("#exam_tab_section").show();
        $("#quiz_tab_section").hide();
        $("#practice_tab_section").hide();
        $("#text_print").text("Exam Attempts")
      });

      $("#quiz_tab").click(function () {
        $("#home_tab_section").hide();
        $("#exam_tab_section").hide();
        $("#quiz_tab_section").show();
        $("#practice_tab_section").hide();
        $("#text_print").text("Quiz Attempts")
      });

      $("#practise_tab").click(function () {
        $("#home_tab_section").hide();
        $("#exam_tab_section").hide();
        $("#quiz_tab_section").hide();
        $("#practice_tab_section").show();
        $("#text_print").text("practice")
      });

    })

  </script>