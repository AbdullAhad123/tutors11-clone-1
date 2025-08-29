@if (app(\App\Settings\HomepageSettings::class)->enable_footer)
  <footer class="footer_section text-center text-lg-start text-muted">
    <section class="align-items-center border-bottom d-flex fixed_width justify-content-center justify-content-lg-between py-4 p-3">
      <div class="me-5 d-none d-lg-block"><span class="text-white">Get connected with us on social networks:</span></div>
      <div>
        <a target="_blank" href="https://www.facebook.com/tutorselevenplus/" class="footer_bg_facebook footer_icons_link rounded-circle d-inline-flex justify-content-center align-items-center mx-1" aria-label="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
        <a target="_blank" href="https://www.instagram.com/tutorselevenplus/" class="footer_bg_instagram footer_icons_link rounded-circle d-inline-flex justify-content-center align-items-center mx-1" aria-label="Instagram"><i class="fa-brands fa-instagram"></i> </a>
        <a target="_blank" href="https://www.linkedin.com/in/tutors-elevenplus-9a6469298/" class="footer_bg_linkedin footer_icons_link rounded-circle d-inline-flex justify-content-center align-items-center mx-1" aria-label="LinkedIn"><i class="fa-brands fa-linkedin"></i> </a>
        <a target="_blank" href="https://www.youtube.com/@TutorsElevenplus/" class="footer_bg_youtube footer_icons_link rounded-circle d-inline-flex justify-content-center align-items-center mx-1" aria-label="YouTube"><i class="fa-brands fa-youtube"></i> </a>
        <a target="_blank" href="https://twitter.com/tutorelevenplus/" class="footer_bg_twitter footer_icons_link rounded-circle d-inline-flex justify-content-center align-items-center mx-1" aria-label="Twitter">
          <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
            <path d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z" />
          </svg>
        </a>
        <a target="_blank" href="https://www.tiktok.com/@tutorselevenplus/" class="footer_icons_link footer_bg_tiktok rounded-circle d-inline-flex justify-content-center align-items-center mx-1" aria-label="TikTok"><i class="fa-brands fa-tiktok"></i></a>
      </div>
    </section>
    <section class="w-100">
      <div class="fixed_width text-center mt-5">
        <div class="row m-0 mt-3">
            <div class="col-md-12 col-lg-4 col-xl-3 mx-auto mb-4">
              <div class="d-flex align-items-center justify-content-start my-3">
                <a class="navbar-brand" href="/">
                  <img src="{{ url('storage/' . app(\App\Settings\SiteSettings::class)->logo_path) }}" width="45" height="45" class="img-fluid" alt="{{ url('storage/' . app(\App\Settings\SiteSettings::class)->app_name) }}">
                </a>
                <span class="m-0 ms-2 h4 text-white">{{ app(\App\Settings\SiteSettings::class)->app_name }}</span>
              </div>
              <p class="text-white fw-light text-start">TutorsElevenPlus is a ground-breaking online platform that provides a dynamic learning experience for students</p>
            </div>
            <div class="col-6 col-lg-2 col-md-6 col-sm-6 col-xl-2 mb-4 mx-auto">
                <h2 class="fw-medium h5 my-2 text-start text-uppercase text-white">Quick Links</h2>
                <div class="footer_heading_line mb-4"></div>
                <ul class="list-unstyled m-0">
                    <li class="footer_list_item my-3"><a href="/">Home</a></li>
                    <li class="footer_list_item my-3"><a href="/blogs">Blogs</a></li>
                    <li class="footer_list_item my-3"><a href="/pricing">pricing plans</a></li>
                    <li class="footer_list_item my-3"><a href="{{ route('school_list', ['page' => 1]) }}">Schools</a></li>
                    <li class="footer_list_item my-3"><a href="/help">Help & Support</a></li>
                    <li class="footer_list_item my-3"><a href="/registration">Create an Account</a></li>
                </ul>
            </div>
            <div class="col-6 col-lg-2 col-md-6 col-sm-6 col-xl-2 mb-4 mx-auto">
                <h2 class="fw-medium h5 my-2 text-start text-uppercase text-white">Explore</h2>
                <div class="footer_heading_line mb-4"></div>
                <ul class="list-unstyled m-0">
                    <li class="footer_list_item my-3"><a href="/explore">Explore</a></li>
                    <li class="footer_list_item my-3"><a href="/reviews">Reviews</a></li>
                    <li class="footer_list_item my-3"><a href="/about">About Us</a></li>
                    <li class="footer_list_item my-3"><a href="/contact">Contact Us</a></li>
                    <li class="footer_list_item my-3"><a href="/cookie-policy">Cookie Policy</a></li>
                    <li class="footer_list_item my-3"><a href="/privacy-policy">Privacy Policy</a></li>
                </ul>
            </div>
            <div class="col-md-6 col-lg-3 col-xl-3 col-sm-12 col-12 mx-auto mb-md-4 mb-4">
                <div class="footer-widget">
                    <h2 class="fw-medium h5 my-2 text-start text-uppercase text-white">subscribe</h2>
                    <div class="footer_heading_line mb-4"></div>
                    <div class="text-white fw-light text-start mb-3">
                      <p>Don't miss out on our latest blogs, subscribe by completing the form below</p>
                    </div>
                    <div class="subscribe-form-parent">
                      <div class="subscribe-form">
                        <input class="form-control rounded-pill px-3" id="subscribeEmail" placeholder="Enter email to subscribe"> 
                        <button id="submitSubscribebtn" aria-label="Subscribe with Telegram">
                          <i class="fab fa-telegram-plane"></i> 
                          <span class="ms-1 text-white d-none spinner-border spinner-border-sm" aria-hidden="true"></span>
                        </button>
                      </div>
                      <p class="my-1 text-warning fw-light text-start subscribeEmail_error d-none"></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center p-4 text-white fw-normal border-top">&copy; {{ date('Y') }} {{ app(\App\Settings\FooterSettings::class)->copyright_text }} <a href="/" class="text-reset">{{ app(\App\Settings\SiteSettings::class)->app_name }}</a></div>
      </div>
    </section>
  </footer>
  <!-- subscribe  -->
  <button type="button" class="btn btn-primary open_newsletter visually-hidden" data-bs-toggle="modal" data-bs-target="#subscribe_modal">Launch</button>
  <div class="modal fade" id="subscribe_modal" tabindex="-1" aria-labelledby="subscribe_modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content rounded-0 shadow-lg">
        <div class="modal-header d-flex justify-content-end border-0"><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div>
        <div class="modal-body p-4 text-center">
          <img src="{{ url('images/subscribe_email_image.webp') }}" height="auto" width="280" alt="an illustration of boy submitting mails">
          <h2 class="text-center my-2 mb-1">Thanks for Subscribing!</h2>
          <div class="heading_separator mx-auto mb-3 px-1 rounded"></div>
          <p class="fs-5 my-2 fw-light">Stay in the loop! Receive our latest updates and information right in your inbox.</p>
        </div>
      </div>
    </div>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script>
      $("#submitSubscribebtn").click((function(e) {
          e.preventDefault();
          let s = $("#subscribeEmail").val(),
              r = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
          "" == s ? ($(".subscribeEmail_error").removeClass("d-none"), $(".subscribeEmail_error").text(
                  "The email field is required")) : r.test(s) ? $(".subscribeEmail_error").addClass(
              "d-none") : ($(".subscribeEmail_error").removeClass("d-none"), $(".subscribeEmail_error").text(
                  "Invalid email address")), s && r.test(s) && ($("#submitSubscribebtn").find(
                  ".fa-telegram-plane").addClass("d-none"), $("#submitSubscribebtn").find(
                  ".spinner-border").removeClass("d-none"), $.ajax({
                  dataType: "json",
                  type: "POST",
                  url: "/add-subscribe",
                  data: {
                      email: s,
                      _token: "{{ csrf_token() }}"
                  },
                  success: function(e) {
                      e && ($(".open_newsletter").click(), $("#submitSubscribebtn").find(
                          ".fa-telegram-plane").removeClass("d-none"), $(
                          "#submitSubscribebtn").find(".spinner-border").addClass(
                          "d-none"))
                  },
                  error: function(e, s, r) {
                      console.log(s)
                  }
              }))
      }));
  </script>
@endif
<script>
  $(".whatsapp_icon").on("mouseover", (function() {
    $(".whatsapp_contact_text").text("Whatsapp")
  })), $(".whatsapp_icon").on("mouseout", (function() {
    $(".whatsapp_contact_text").text("Contact")
  }));
</script>
