<!doctype html>
<html>
@include('components.doc-defaulthead', ['Title' => "Shared Hosting - Installation"])

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
        <h3 class="section__title h1">Installation - Shared Hosting</h3>
        <p class="section__title__para">Learn how to install Tutor 11+ script in shared hosting</p>
        <p class="my-3">Tutor 11+ requires PHP v7.4 with the following extensions enabled. PHP 7.4.10 is recommended.</p>
        <ol class="mt-4">
          <li class="my-2">Configure a domain or subdomain</li>
          <li class="my-2">Create a database</li>
          <li class="my-2">Upload script downloaded from CodeCanyon</li>
          <li class="my-2">Installation</li>
        </ol>
        <p class="my-3">See <span class="text-primary">Important Things to Remember</span> before installation.</p>
        <p class="my-4 fw-bold">Our Demo is powered by Digital Ocean VPS</p>
        <a target="_blank" href="https://www.digitalocean.com/?refcode=899d01009f04&utm_campaign=Referral_Invite&utm_medium=Referral_Program&utm_source=badge">
          <img src="https://web-platforms.sfo2.cdn.digitaloceanspaces.com/WWW/Badge%201.svg" class="not_full_screen" alt="Digital Ocean">
        </a>
        <p class="my-4">See the below video for the installation process.</p>

        <div style="min-width: 280px;height: 400px; position: relative;" class="text-center col-12 my-2">
          <iframe src="https://cdn.iframe.ly/CH1QF0t" class="w-100" style="top: 0; left: 0; width: 100%; height: 100%; position: absolute; border: 0;" allowfullscreen="" scrolling="no" allow="accelerometer *; clipboard-write *; encrypted-media *; gyroscope *; picture-in-picture *;"></iframe>
        </div>

      </section>

      <section class="body-sections" id="list-item-2">
        <h3 class="section__title mt-5">Installation Process</h3>
        <p class="my-4 fw-bold">Step 1</p>
        <p class="my-2">Create a domain or subdomain in the cPanel. Set root directory to </p>
        <p class=" bg-light d-inline-flex px-1 py-2 monospace_class">public_html/[DOMAIN_FOLDER]/public</p>
        <div style="min-width: 280px;" class="col-12 text-center my-2">
          <img src="{{url('images\docs_img\create_domian.webp')}}" alt="create a Subdomain " class="img-fluid col-12">
        </div>
        <p class="my-2">If you have only a single domain, then set the primary domain root directory to
          <span class="bg-light d-inline-flex px-1 py-2 monospace_class">public_html/public</span>
        </p>

        <p class="my-4 fw-bold">Step 2</p>
        <p class="my-2">Create a database and assign all privileges to the database user. </p>
        <div style=" min-width: 20px; position: relative;" class="text-center my-3">
          <img src="{{url('images\docs_img\create-database.jpg')}}" alt="create a database" class="img-fluid col-12 mb-3">
        </div>


        <p class="my-4 fw-bold">Step 3</p>
        <ul class="mt-4">
          <li class="my-2">Download the zip file from CodeCanyon.</li>
          <li class="my-2">Extract the zip file from your system.</li>
          <li class="my-2">Navigate to
            <span class="bg-light fw-bold d-inline-flex px-1 py-2 monospace_class">Fresh Installation</span>folder
          </li>
          <li class="my-2">Select the <b>upload_this.zip</b> file and upload it to the
            <span class="bg-light d-inline-flex px-1 py-2 monospace_class">public_html/[DOMAIN_FOLDER]</span>
            directory of your hosting.
          </li>
          <li class="my-2">Extract the contents of the uploaded zip file to the same directory i.e
            <span class="bg-light d-inline-flex px-1 py-2 monospace_class">public_html/[DOMAIN_FOLDER]</span>
          </li>
          <li class="my-2">
            Give 775 permission to the following directories.
            <ul class="py-2" style="list-style-type: disc;">
              <li class="my-2">storage/framework</li>
              <li class="my-2">storage/logs</li>
              <li class="my-2">bootstrap/cache</li>
            </ul>
          </li>
        </ul>
        <div style=" min-width: 280px;" class="col-12">
          <img src="{{url('images\docs_img\upload-script.jpg')}}" alt="upload script to file manager" class="img-fluid col-12">
        </div>


        <p class="my-4 fw-bold">Step 4</p>
        <p class="my-2">Then navigate to <b> yourdomain.com/install </b> on the browser and follow the instructions.</p>
        <div style=" min-width: 280px;" class="col-12">
          <img src="{{url('images\docs_img\installation-screen.jpg')}}" alt="installation screen" class="img-fluid col-12">
        </div>


        <p class="my-4 fw-bold">Final Step</p>
        <p class="my-2">Finally, when you are on the installation success screen, don't close the browser window directly. Instead, you must hit the <b>Click here to exit</b> the button to complete the installation. </p>
        <div style=" min-width: 280px;" class="col-12">
          <img src="{{url('images\docs_img\success-screen.jpg')}}" alt="Installation successful" class="img-fluid col-12">
        </div>
        <div class="my-4 d-flex bg-light p-2 rounded-1" style="border-left: 4px solid #d33d3d;">
          <div>
            <p class="my-2 align-items-center p-1">
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
              <span>If the installation fails due to server issues, fix them and: </span>
            </p>
            <ol class="mt-2 ml-3" style="list-style: inside decimal;">
              <li class="my-2">Delete all the tables in the existing database or make a new database.</li>
              <li class="my-2">Delete the <b>storage/installed</b> file of the app in the sever</li>
              <li class="my-2">Replace the .env file on the server with the .env file from the downloaded script.</li>
              <li class="my-2">Finally, start the installation again by visiting <b>yourdomain.com/install</b>.</li>
            </ol>
          </div>
        </div>

        <p class="my-4 fw-bold">Important Things to Remember</p>
        <ul class="mt-2 ml-3">
          <li class="my-2">
            Tutor 11+ <b>CAN</b> only be installed on your main domain or subdomain. For example, <b>yourdomain.com</b> or <b>app.yourdomain.com</b>. It <b>CANNOT</b> be installed in the subdirectory path of your domain, for example, <b>www.yourdomain.com/my-app</b>.
          </li>
          <li class="my-2">
            You should set the domain root directory to the app's <b>/public</b> directory, not the root directory. If you set it to the root directory, it won't work and will also expose the application's sensitive data.
          </li>
        </ul>
      </section>

      <section class="body-section" id="list-item-3">
        <h3 class="section__title mt-5">Installation Support</h3>
        <div class="my-4 d-flex bg-light p-2 rounded-1" style="border-left: 4px solid #346ddb;">
          <div>
            <ol class="my-2 d-flex justify-content-evenly p-1 list-unstyled">
              <li class="my-1">
                <svg viewBox="0 0 16 16" fill="none" preserveAspectRatio="xMidYMid meet" style="vertical-align: middle; width: 20px; height: 20px; color: #346ddb;">
                  <g clip-path="url(#InfoCircle_svg__clip0_1373_8677)" fill="currentColor">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M8 1.6a6.4 6.4 0 100 12.8A6.4 6.4 0 008 1.6zM.4 8a7.6 7.6 0 1115.2 0A7.6 7.6 0 01.4 8z"></path>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M5.4 7a.6.6 0 01.6-.6h2a.6.6 0 01.6.6v3.9H10a.6.6 0 010 1.2H6a.6.6 0 110-1.2h1.4V7.6H6a.6.6 0 01-.6-.6z"></path>
                    <path d="M8 3.6a.9.9 0 100 1.8.9.9 0 000-1.8z"></path>
                  </g>
                  <defs>
                    <clipPath id="InfoCircle_svg__clip0_1373_8677">
                      <path fill="#fff" d="M0 0h16v16H0z"></path>
                    </clipPath>
                  </defs>
                </svg>
              </li>
              <li class="my-1 text-justify px-2">
                Please raise a ticket on our support portal if you have any issues with the installation within the Tutor 11+ application.
              </li>
            </ol>
          </div>
        </div>

        <div class="my-4 d-flex bg-light p-2 rounded-1" style="border-left: 4px solid #d33d3d;">
          <div>
            <ol class="my-2 d-flex justify-content-evenly p-1 list-unstyled">
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
                We cannot provide fixes that are related to your web hosting or server environment. Therefore, if your hosting or server environment is different than what is listed in the above section, you’ll need to determine if it will work before purchasing. Server setup and configuration are not in our scope of support.
              </li>
            </ol>
          </div>
        </div>
      </section>

      <section class="body-section">
        <div class="row">
          <div class="col-lg-5 mx-2 px-3 mt-5 border rounded-2  prev-inst-container">
            <a href="/admin/docs/pre-requisites" class="text-muted">
              <div class="text-dark d-flex justify-content-between align-items-center">
                <ul class="list-unstyled align-items-center flex-box-container">
                  <li class=" mt-3"><i class="fa-solid fa-arrow-left fa-lg"></i></li>
                </ul>
                <ul class="list-unstyled align-items-center flex-box-container text-end">
                  <li class="next-inst-text mt-3">Previous</li>
                  <li>
                    <h5 class="pre-req-text">Pre-requisties</h5>
                  </li>
                </ul>
              </div>
            </a>
          </div>
          <div class=" col-lg-5 mx-2 px-3 mt-5 border rounded-2  next-inst-container">
            <a href="/admin/docs/installation/cloud-vps" class="text-muted">
              <div class="text-dark d-flex justify-content-between align-items-center">
                <ul class="list-unstyled align-items-center flex-box-container">
                  <li class="next-inst-text mt-3">Next - Installation</li>
                  <li>
                    <h5 class="pre-req-text">Installation - Cloud VPS</h5>
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
        <a class="list-group-item list-group-item-action" href="#list-item-2">Installation Process</a>
        <a class="list-group-item list-group-item-action" href="#list-item-3">Installation Support</a>
      </div>
    </aside>

  </div>

  <!-- javascript includes  -->

  @include('components.doc-defaultjs')



</body>

</html>