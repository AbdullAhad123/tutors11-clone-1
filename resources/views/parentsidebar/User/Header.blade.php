`<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>

    <!-- navbar for all screen  -->
    <nav class="layout-navbar mb-5 responsive-navbatr container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
        id="layout-navbar">
        <div class="align-items-xl-center d-xl-none layout-menu-toggle me-xl-0 navbar-nav">
            <a class="nav-item nav-link px-0 me-xl-4 bar_responsive" href="javascript:void(0)" type="button"
                data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                <i class="bx bx-menu bx-sm"></i>
            </a>
        </div>

        <div class="navbar-nav-right  align-items-center" id="navbar-collapse">
            <div class="row justify-content-end">
                <div class="col-lg-12 border-bottom mb-4">
                    <ul
                        class="navbar-nav all_css_padding flex-row align-items-center justify-content-end ms-auto w-px-40">
                        <!-- Place this tag where you want the button to render. -->
                        <li class="nav-item me-2">
                            <div class="d-flex align-items-center">
                                <img src="../assets/img/illustrations/coin.png" height="35" width="35"
                                    alt="XP COIN" class="me-1">
                                <span
                                    style="font-size: 1rem; letter-spacing: 1px; color: black ;font-weight: 600;">34XP</span>
                            </div>

                        </li>
                        <!-- User -->

                        <li class="nav-item navbar-dropdown dropdown-user dropdown">
                            <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                                data-bs-toggle="dropdown">
                                <div class="avatar avatar-online">
                                    <img src="https://www.kindpng.com/picc/m/490-4904536_user-3d-icon-png-transparent-png.png"
                                        alt class="h-auto rounded-circle" />
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0 me-3">
                                                <div class="avatar avatar-online">
                                                    @if($imgpath)
                                                        <img src="/{{ $imgpath }}" alt class="w-px-40 h-auto text-end rounded-3" />
                                                    @else
                                                        <img src="/profile-photos/user-profile-icon.svg" alt class="w-px-40 h-auto text-end rounded-3" style="opacity: 0.2;"/>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <span class="fw-semibold d-block">Anonymous</span>
                                                <small class="text-muted">Guest</small>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <div class="dropdown-divider"></div>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="profile.html">
                                        <i class="bx bx-user me-2"></i>
                                        <span class="align-middle">Profile</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="subscriptions.html">
                                        <i class="bx bx-pound me-2"></i>
                                        <span class="align-middle">Subscriptions</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="payments.html">
                                        <i class="bx bx-card me-2"></i>
                                        <span class="align-middle">Payments</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="">
                                        <i class="bx bx-user-plus me-2"></i>
                                        <span class="align-middle">Switch To Parent</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="signin.html">
                                        <i class="bx bx-power-off me-2"></i>
                                        <span class="align-middle">Log Out</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!--/ User -->
                    </ul>
                </div>
                <div class="col-lg-12">
                    <div class="row justify-content-around py-3">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <h4 class="math_year_heading">Quizzes</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- navbar for all screen  -->
    <nav class="layout-navbar mb-5 responsive-navbatr container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
        id="layout-navbar">
        <div class="align-items-xl-center d-xl-none layout-menu-toggle me-xl-0 navbar-nav">
            <a class="nav-item nav-link px-0 me-xl-4 bar_responsive" href="javascript:void(0)" type="button"
                data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample"
                aria-controls="offcanvasExample">
                <i class="bx bx-menu bx-sm"></i>
            </a>
        </div>
        <div class="navbar-nav-right  align-items-center" id="navbar-collapse">
            <div class="row justify-content-end">
                <div class="col-lg-12 border-bottom mb-4">
                    <ul
                        class="navbar-nav all_css_padding flex-row align-items-center justify-content-end ms-auto w-px-40">
                        <!-- Place this tag where you want the button to render. -->
                        <li class="nav-item me-2">
                            <div class="d-flex align-items-center">
                                <img src="../assets/img/illustrations/coin.png" height="35" width="35"
                                    alt="XP COIN" class="me-1">
                                <span
                                    style="font-size: 1rem; letter-spacing: 1px; color: black ;font-weight: 600;">34XP</span>
                            </div>
                        </li>
                        <!-- User -->
                        <li class="nav-item navbar-dropdown dropdown-user dropdown">
                            <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                                data-bs-toggle="dropdown">
                                <div class="avatar avatar-online">
                                    <img src="https://www.kindpng.com/picc/m/490-4904536_user-3d-icon-png-transparent-png.png"
                                        alt class="h-auto rounded-circle" />
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0 me-3">
                                                <div class="avatar avatar-online">
                                                    <img src="https://www.kindpng.com/picc/m/490-4904536_user-3d-icon-png-transparent-png.png"
                                                        alt class="w-px-40 h-auto rounded-circle" />
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <span class="fw-semibold d-block">Anonymous</span>
                                                <small class="text-muted">Guest</small>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <div class="dropdown-divider"></div>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="profile.html">
                                        <i class="bx bx-user me-2"></i>
                                        <span class="align-middle">Profile</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="subscriptions.html">
                                        <i class="bx bx-pound me-2"></i>
                                        <span class="align-middle">Subscriptions</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="payments.html">
                                        <i class="bx bx-card me-2"></i>
                                        <span class="align-middle">Payments</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="payments.html">
                                        <i class="bx bx-user-plus me-2"></i>
                                        <span class="align-middle">Switch To Parent</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="signin.html">
                                        <i class="bx bx-power-off me-2"></i>
                                        <span class="align-middle">Log Out</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!--/ User -->
                    </ul>
                </div>
                <div class="col-lg-12">
                    <div class="row justify-content-around py-3">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <h4 class="math_year_heading">Exam Result</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

</body>

</html>
