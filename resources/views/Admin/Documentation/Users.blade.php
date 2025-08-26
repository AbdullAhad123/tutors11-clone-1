<!doctype html>
<html>

@include('components.doc-defaulthead', ['Title' => "User - User Managemnets"])

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

    <article class="doc__content" data-bs-spy="scroll" data-bs-target="#list-example" data-bs-smooth-scroll="true"
      class="scrollspy-example" tabindex="0">

      <section class="body-section">
        <h3 class="section__title h1">Users</h3>
        <p class="section__title__para">Learn how to manage user in Tutor 11+</p>
        <p class="my-4">To manage users, log in to the admin account and select
          <span class="bg-light d-inline-flex px-1 py-1 monospace_class">Manage Users > Users</span>
          from the sidebar menu.
        </p>

      </section>

      <section class="body-sections" id="list-item-2">
        <h3 class="section__title mt-5">Enable/Disable User Registration</h3>
        <ol class="mt-4">
          <li class="my-1">
            Log in to Admin account and select
            <span class="bg-light d-inline-flex px-1 py-1 monospace_class">Settings > General Settings</span>
            from the sidebar menu.
          </li>
          <li class="my-1">
            Find the <b>Site Settings</b> and toggle <b>Enable User Registration</b> switch to enable/disable user
            registration.
          </li>
          <li class="my-1">
            Finally, click on the <b>SAVE</b> button to update the changes.
          </li>
        </ol>
      </section>

      <section class="body-sections" id="list-item-3">
        <h3 class="section__title mt-5">Create Users Manually</h3>
        <ol class="mt-4">
          <li class="my-1">
            Log in to Admin account and select
            <span class="bg-light d-inline-flex px-1 py-1 monospace_class">Manage Users > Users</span>
            from the sidebar menu.
          </li>
          <li class="my-1">
            Click on the <b>New User</b> button from the top right corner, then fill in the details.
          </li>
          <li class="my-1">
            Finally, click on the <b>Create</b> button to create the user.
          </li>
        </ol>

        <div class="my-4 d-flex bg-light p-2 rounded-1" style="border-left: 4px solid #d33d3d;">
          <div>
            <ol class="m-0 d-flex justify-content-evenly p-1 list-unstyled">
              <li class="my-1">
                <svg viewBox="0 0 16 16" class="me-2" fill="none" preserveAspectRatio="xMidYMid meet"
                  style="vertical-align: middle; width: 20px; height: 20px; color: #d33d3d;">
                  <g clip-path="url(#Alert_svg__clip0_1373_8670)" fill="currentColor">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                      d="M5.47 2.387a2.895 2.895 0 015.06 0l4.679 8.272c1.107 1.958-.267 4.441-2.53 4.441H3.32c-2.263 0-3.637-2.483-2.53-4.44l4.68-8.273zm4.015.591a1.695 1.695 0 00-2.97 0l-4.68 8.272c-.674 1.194.182 2.65 1.486 2.65h9.358c1.304 0 2.16-1.456 1.485-2.65L9.485 2.978z">
                    </path>
                    <path
                      d="M8 12.95a.9.9 0 110-1.8.9.9 0 010 1.8zM7.25 4.79c0-.27.187-.49.417-.49h.666c.23 0 .417.22.417.49v2.247c0 .462.049 1.05-.043 1.499L8.5 9.55c-.103.681-.898.68-1 0l-.207-1.014c-.091-.45-.043-1.037-.043-1.5V4.79z">
                    </path>
                  </g>
                  <defs>
                    <clipPath id="Alert_svg__clip0_1373_8670">
                      <path fill="#fff" d="M0 0h16v16H0z"></path>
                    </clipPath>
                  </defs>
                </svg>
              </li>
              <li class="my-1 text-justify px-2">
                Even after the admin creates the user manually, users still need to verify their email on the first
                login.
              </li>
            </ol>
          </div>
        </div>

        <p class="my-3">To learn how <b>User Roles</b> and <b>User Groups</b> work, visit the following sections.</p>

        <div class="px-3 mt-4 border rounded-2 next-inst-container">
          <a href="/admin/docs/user-management/user-roles" class="text-muted" style="text-decoration: none!important;">
            <div class="text-dark d-flex justify-content-between align-items-center py-4">
              <ul class="m-0 list-unstyled d-flex align-items-center flex-box-container">
                <li class="me-2">
                  <svg viewBox="0 0 16 16" fill="none" preserveAspectRatio="xMidYMid meet"
                    data-rnwibasecard--1azsio2-hover="true" data-rnwi-handle="nearest" class="r-1rasi3h"
                    style="vertical-align: middle; width: 32px; height: 32px;">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                      d="M4 .4A2.6 2.6 0 001.4 3v10A2.6 2.6 0 004 15.6h8a2.6 2.6 0 002.6-2.6V6.328a2.6 2.6 0 00-.761-1.838L10.51 1.162A2.6 2.6 0 008.672.4H4zM2.6 3A1.4 1.4 0 014 1.6h3.9v2.9a2.6 2.6 0 002.6 2.6h2.9V13a1.4 1.4 0 01-1.4 1.4H4A1.4 1.4 0 012.6 13V3zm10.733 2.9a1.399 1.399 0 00-.343-.562L9.662 2.01a1.4 1.4 0 00-.562-.343V4.5a1.4 1.4 0 001.4 1.4h2.833z"
                      fill="currentColor"></path>
                  </svg>
                </li>
                <li>
                  <h5 class="pre-req-text mt-2">User Roles</h5>
                </li>
              </ul>
            </div>
          </a>
        </div>

        <div class="px-3 mt-4 border rounded-2 next-inst-container">
          <a href="/admin/docs/user-management/user-groups" class="text-muted" style="text-decoration: none!important;">
            <div class="text-dark d-flex justify-content-between align-items-center py-4">
              <ul class="m-0 list-unstyled d-flex align-items-center flex-box-container">
                <li class="me-2">
                  <svg viewBox="0 0 16 16" fill="none" preserveAspectRatio="xMidYMid meet"
                    data-rnwibasecard--1azsio2-hover="true" data-rnwi-handle="nearest" class="r-1rasi3h"
                    style="vertical-align: middle; width: 32px; height: 32px;">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                      d="M4 .4A2.6 2.6 0 001.4 3v10A2.6 2.6 0 004 15.6h8a2.6 2.6 0 002.6-2.6V6.328a2.6 2.6 0 00-.761-1.838L10.51 1.162A2.6 2.6 0 008.672.4H4zM2.6 3A1.4 1.4 0 014 1.6h3.9v2.9a2.6 2.6 0 002.6 2.6h2.9V13a1.4 1.4 0 01-1.4 1.4H4A1.4 1.4 0 012.6 13V3zm10.733 2.9a1.399 1.399 0 00-.343-.562L9.662 2.01a1.4 1.4 0 00-.562-.343V4.5a1.4 1.4 0 001.4 1.4h2.833z"
                      fill="currentColor"></path>
                  </svg>
                </li>
                <li>
                  <h5 class="pre-req-text mt-2">User Groups</h5>
                </li>
              </ul>
            </div>
          </a>
        </div>

      </section>

      <section class="body-sections" id="list-item-4">
        <h3 class="section__title mt-5">Disable User Login</h3>
        <ol class="mt-4">
          <li class="my-1">
            log in to the admin account and select
            <span class="bg-light d-inline-flex px-1 py-1 monospace_class">Manage Users > User Hierarchy > Users</span>
            from the sidebar menu.
          </li>
          <li class="my-1">
            Click on the edit icon of a user, then change <b>Status</b> to In-active. This will disable user login and
            hide users throughout the application.
          </li>
          <li class="my-1">
            Finally, click on the <b>Update</b> button to update the details.
          </li>
        </ol>
      </section>

      <section class="body-section">
        <div class="row">
          <div class="col-lg-5 mx-2 px-3 mt-4 border rounded-2  prev-inst-container">
            <a href="/admin/docs/user-management/user-groups" class="text-muted">
              <div class="text-dark d-flex justify-content-between align-items-center">
                <ul class="list-unstyled align-items-center flex-box-container">
                  <li class=" mt-3"><i class="fa-solid fa-arrow-left fa-lg"></i></li>
                </ul>
                <ul class="list-unstyled align-items-center flex-box-container text-end">
                  <li class="next-inst-text mt-3">User Management - Previous</li>
                  <li>
                    <h5 class="pre-req-text">User Groups</h5>
                  </li>
                </ul>
              </div>
            </a>
          </div>
          <div class=" col-lg-5 mx-2 px-3 mt-4 border rounded-2  next-inst-container">
            <a href="/admin/docs/master-data/manage-subjects" class="text-muted">
              <div class="text-dark d-flex justify-content-between align-items-center">
                <ul class="list-unstyled align-items-center flex-box-container">
                  <li class="next-inst-text mt-3">Next - Master Data</li>
                  <li>
                    <h6 class="pre-req-text">Manage Subjects</h5>
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
        <a class="list-group-item list-group-item-action" href="#list-item-2">Private vs. Public Group</a>
        <a class="list-group-item list-group-item-action" href="#list-item-3">Add a User to Multiple User Groups</a>
        <a class="list-group-item list-group-item-action" href="#list-item-4">Private vs. Public Group</a>
      </div>
    </aside>

  </div>

  <!-- javascript includes  -->

  @include('components.doc-defaultjs')

</body>

</html>