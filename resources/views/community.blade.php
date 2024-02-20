<!DOCTYPE html>
<html data-bs-theme="light" lang="en-US" dir="ltr">

  
<!-- Mirrored from prium.github.io/falcon/v3.19.0/demo/navbar-vertical.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 22 Nov 2023 06:21:15 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- ===============================================--><!--    Document Title--><!-- ===============================================-->
    <title>AFMAMS | Dashboard </title>

    <!-- =============================================== -->
    <!-- Favicons -->
    <!-- =============================================== -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/images/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/images/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicon/favicon-16x16.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/favicon/favicon.ico') }}">
    <link rel="manifest" href="{{ asset('assets/images/favicons/manifest.json') }}">
    <meta name="msapplication-TileImage" content="{{ asset('assets/images/favicons/mstile-150x150.png') }}">
    <meta name="theme-color" content="#ffffff">
    <script src="{{ asset('assets/js/config.js') }}"></script>
    <script src="{{ asset('vendors/simplebar/simplebar.min.js') }}"></script>

    <!-- =============================================== -->
    <!-- Stylesheets -->
    <!-- =============================================== -->
    <link href="{{ asset('vendors/prism/prism-okaidia.css') }}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700%7cPoppins:300,400,500,600,700,800,900&amp;display=swap" rel="stylesheet">
    <link href="{{ asset('vendors/simplebar/simplebar.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/theme-rtl.min.css') }}" rel="stylesheet" id="style-rtl">
    <link href="{{ asset('assets/css/theme.min.css') }}" rel="stylesheet" id="style-default">
    <link href="{{ asset('assets/css/user-rtl.min.css') }}" rel="stylesheet" id="user-style-rtl">
    <link href="{{ asset('assets/css/user.min.css') }}" rel="stylesheet" id="user-style-default">


    <script>
      var isRTL = JSON.parse(localStorage.getItem('isRTL'));
      if (isRTL) {
        var linkDefault = document.getElementById('style-default');
        var userLinkDefault = document.getElementById('user-style-default');
        linkDefault.setAttribute('disabled', true);
        userLinkDefault.setAttribute('disabled', true);
        document.querySelector('html').setAttribute('dir', 'rtl');
      } else {
        var linkRTL = document.getElementById('style-rtl');
        var userLinkRTL = document.getElementById('user-style-rtl');
        linkRTL.setAttribute('disabled', true);
        userLinkRTL.setAttribute('disabled', true);
      }
    </script>
  </head>

  <body>
    <!-- ===============================================--><!--    Main Content--><!-- ===============================================-->
    <main class="main" id="top">
      <div class="container" data-layout="container">
        <script>
          var isFluid = JSON.parse(localStorage.getItem('isFluid'));
          if (isFluid) {
            var container = document.querySelector('[data-layout]');
            container.classList.remove('container');
            container.classList.add('container-fluid');
          }
        </script>
        <nav class="navbar navbar-light navbar-vertical navbar-expand-xl">
          <script>
            var navbarStyle = localStorage.getItem("navbarStyle");
            if (navbarStyle && navbarStyle !== 'transparent') {
              document.querySelector('.navbar-vertical').classList.add(`navbar-${navbarStyle}`);
            }
          </script>
          <div class="d-flex align-items-center">
            <div class="toggle-icon-wrapper">
              <button class="btn navbar-toggler-humburger-icon navbar-vertical-toggle" data-bs-toggle="tooltip" data-bs-placement="left" title="Toggle Navigation"><span class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>
            </div><a class="navbar-brand" href="../index.html">
              <div class="d-flex align-items-center py-3"><img class="me-2" src="{{ url ('assets/images/logo/afmams.png') }}" alt="" width="40" /><span class="font-sans-serif text-primary">AFMAMS</span></div>
            </a>
          </div>
          <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
            <div class="navbar-vertical-content scrollbar">
              <ul class="navbar-nav flex-column mb-3" id="navbarVerticalNav">
                
                <!-- Dashboard -->
                <li class="nav-item">
                    <a class="nav-link" href="dashboard" role="button" aria-expanded="false" aria-controls="dashboard">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon">
                                <span class="fas fa-chart-pie"></span>
                            </span>
                            <span class="nav-link-text ps-1">Dashboard</span>
                        </div>
                    </a>
                </li>

                <!--main menu label -->
                <li class="nav-item">
                    <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                        <div class="col-auto navbar-vertical-label">Menu</div>
                        <div class="col ps-0">
                            <hr class="mb-0 navbar-vertical-divider" />
                        </div>
                    </div>

                    <!-- Attendance-->
                    <a class="nav-link" href="attendance.blade.php" role="button">
                        <div class="d-flex align-items-center"><span class="nav-link-icon">
                                <span class="fas fa-calendar-alt"></span></span>
                            <span class="nav-link-text ps-1">Attendance</span>
                        </div>
                    </a>

                    <!-- Fines -->
                    <a class="nav-link" href="{{ url('fines.blade.php') }}" role="button">
                        <div class="d-flex align-items-center"><span class="nav-link-icon">
                                <span class="fas fa-coins"></span></span>
                            <span class="nav-link-text ps-1">Fines</span>
                        </div>
                    </a>

                    <!-- Activity-->
                    <a class="nav-link dropdown-indicator" href="#email" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="email">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon"><span class="fab fa-buromobelexperte"></span></span>
                            <span class="nav-link-text ps-1">Activity</span>
                        </div>
                    </a>
                    <ul class="nav collapse" id="email">
                    <!-- Create an Activity Bar  -->
                        <li class="nav-item">
                        <a class="nav-link" href="{{ url('create-activity.blade.php') }}">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Create an Activity</span></div>
                            </a>
                        </li>
                    <!-- Add an Evaluation Form-->
                        <li class="nav-item">
                        <a class="nav-link" href="../app/email/email-detail.html">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Evaluation Form</span></div>
                        </a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="../app/email/compose.html">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Review Excuse Form</span></div>
                        </a>
                        </li>
                    </ul>

                    <!-- Community -->
                    <a class="nav-link" href="{{ url('community.blade.php') }}" role="button">
                        <div class="d-flex align-items-center"><span class="nav-link-icon">
                                <span class="fas fa-comments"></span></span>
                            <span class="nav-link-text ps-1">Community</span>
                        </div>
                    </a>

                    <!-- About -->
                    <a class="nav-link" href="../app/chat.html" role="button">
                        <div class="d-flex align-items-center"><span class="nav-link-icon">
                                <span class="fas fa-info-circle"></span></span>
                            <span class="nav-link-text ps-1">About</span>
                        </div>
                    </a>
                </li>

              </ul>
              
            </div>
          </div>
        </nav>

        <!-- header -->
        <div class="content">
          <nav class="navbar navbar-light navbar-glass navbar-top navbar-expand">
            <button class="btn navbar-toggler-humburger-icon navbar-toggler me-1 me-sm-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalCollapse" aria-controls="navbarVerticalCollapse" aria-expanded="false" aria-label="Toggle Navigation"><span class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>
            <a class="navbar-brand me-1 me-sm-3" href="../index.html">
              <div class="d-flex align-items-center"><img class="me-2" src="<?php echo url('assets/images/logo/afmams.png') ?>" alt="" width="40" /><span class="font-sans-serif text-primary">AFMAMS</span></div>
            </a>

            <!-- search -->
            <ul class="navbar-nav align-items-center d-none d-lg-block">
              <li class="nav-item">
                <div class="search-box" data-list='{"valueNames":["title"]}'>
                  <form class="position-relative" data-bs-toggle="search" data-bs-display="static"><input class="form-control search-input fuzzy-search" type="search" placeholder="Search..." aria-label="Search" />
                    <span class="fas fa-search search-box-icon"></span>
                  </form>
                  <div class="btn-close-falcon-container position-absolute end-0 top-50 translate-middle shadow-none" data-bs-dismiss="search"><button class="btn btn-link btn-close-falcon p-0" aria-label="Close"></button></div>
                  <div class="dropdown-menu border font-base start-0 mt-2 py-0 overflow-hidden w-100">
                    <div class="scrollbar list py-3" style="max-height: 24rem;">
                      <h6 class="dropdown-header fw-medium text-uppercase px-x1 fs-11 pt-0 pb-2">Recently Browsed</h6><a class="dropdown-item fs-10 px-x1 py-1 hover-primary" href="../app/events/event-detail.html">
                        <div class="d-flex align-items-center">
                          <span class="fas fa-circle me-2 text-300 fs-11"></span>
                          <div class="fw-normal title">Pages <span class="fas fa-chevron-right mx-1 text-500 fs-11" data-fa-transform="shrink-2"></span> Events</div>
                        </div>
                      </a>
                      <a class="dropdown-item fs-10 px-x1 py-1 hover-primary" href="../app/e-commerce/customers.html">
                        <div class="d-flex align-items-center">
                          <span class="fas fa-circle me-2 text-300 fs-11"></span>
                          <div class="fw-normal title">E-commerce <span class="fas fa-chevron-right mx-1 text-500 fs-11" data-fa-transform="shrink-2"></span> Customers</div>
                        </div>
                      </a>
                      <hr class="text-200 dark__text-900" />
                      <h6 class="dropdown-header fw-medium text-uppercase px-x1 fs-11 pt-0 pb-2">Suggested Filter</h6><a class="dropdown-item px-x1 py-1 fs-9" href="../app/e-commerce/customers.html">
                        <div class="d-flex align-items-center"><span class="badge fw-medium text-decoration-none me-2 badge-subtle-warning">customers:</span>
                          <div class="flex-1 fs-10 title">All customers list</div>
                        </div>
                      </a>
                      <a class="dropdown-item px-x1 py-1 fs-9" href="../app/events/event-detail.html">
                        <div class="d-flex align-items-center"><span class="badge fw-medium text-decoration-none me-2 badge-subtle-success">events:</span>
                          <div class="flex-1 fs-10 title">Latest events in current month</div>
                        </div>
                      </a>
                      <a class="dropdown-item px-x1 py-1 fs-9" href="../app/e-commerce/product/product-grid.html">
                        <div class="d-flex align-items-center"><span class="badge fw-medium text-decoration-none me-2 badge-subtle-info">products:</span>
                          <div class="flex-1 fs-10 title">Most popular products</div>
                        </div>
                      </a>
                      <hr class="text-200 dark__text-900" />
                      <h6 class="dropdown-header fw-medium text-uppercase px-x1 fs-11 pt-0 pb-2">Files</h6><a class="dropdown-item px-x1 py-2" href="#!">
                        <div class="d-flex align-items-center">
                          <div class="file-thumbnail me-2"><img class="border h-100 w-100 object-fit-cover rounded-3" src="../assets/img/products/3-thumb.png" alt="" /></div>
                          <div class="flex-1">
                            <h6 class="mb-0 title">iPhone</h6>
                            <p class="fs-11 mb-0 d-flex"><span class="fw-semi-bold">Antony</span><span class="fw-medium text-600 ms-2">27 Sep at 10:30 AM</span></p>
                          </div>
                        </div>
                      </a>
                      <a class="dropdown-item px-x1 py-2" href="#!">
                        <div class="d-flex align-items-center">
                          <div class="file-thumbnail me-2"><img class="img-fluid" src="../assets/img/icons/zip.png" alt="" /></div>
                          <div class="flex-1">
                            <h6 class="mb-0 title">Falcon v1.8.2</h6>
                            <p class="fs-11 mb-0 d-flex"><span class="fw-semi-bold">John</span><span class="fw-medium text-600 ms-2">30 Sep at 12:30 PM</span></p>
                          </div>
                        </div>
                      </a>
                      <hr class="text-200 dark__text-900" />
                      <h6 class="dropdown-header fw-medium text-uppercase px-x1 fs-11 pt-0 pb-2">Members</h6><a class="dropdown-item px-x1 py-2" href="../pages/user/profile.html">
                        <div class="d-flex align-items-center">
                          <div class="avatar avatar-l status-online me-2">
                            <img class="rounded-circle" src="../assets/img/team/1.jpg" alt="" />
                          </div>
                          <div class="flex-1">
                            <h6 class="mb-0 title">Anna Karinina</h6>
                            <p class="fs-11 mb-0 d-flex">Technext Limited</p>
                          </div>
                        </div>
                      </a>
                      <a class="dropdown-item px-x1 py-2" href="../pages/user/profile.html">
                        <div class="d-flex align-items-center">
                          <div class="avatar avatar-l me-2">
                            <img class="rounded-circle" src="../assets/img/team/2.jpg" alt="" />
                          </div>
                          <div class="flex-1">
                            <h6 class="mb-0 title">Antony Hopkins</h6>
                            <p class="fs-11 mb-0 d-flex">Brain Trust</p>
                          </div>
                        </div>
                      </a>
                      <a class="dropdown-item px-x1 py-2" href="../pages/user/profile.html">
                        <div class="d-flex align-items-center">
                          <div class="avatar avatar-l me-2">
                            <img class="rounded-circle" src="../assets/img/team/3.jpg" alt="" />
                          </div>
                          <div class="flex-1">
                            <h6 class="mb-0 title">Emma Watson</h6>
                            <p class="fs-11 mb-0 d-flex">Google</p>
                          </div>
                        </div>
                      </a>
                    </div>
                    <div class="text-center mt-n3">
                      <p class="fallback fw-bold fs-8 d-none">No Result Found.</p>
                    </div>
                  </div>
                </div>
              </li>
            </ul>


            <ul class="navbar-nav navbar-nav-icons ms-auto flex-row align-items-center">

              <!-- lalagyan ng inbox -->
              <li class="nav-item d-none d-sm-block">
                <a class="nav-link px-0 notification-indicator notification-indicator-warning notification-indicator-fill fa-icon-wait" href="../app/e-commerce/shopping-cart.html"><span class="fas fa-inbox" data-fa-transform="shrink-7" style="font-size: 33px;"></span><span class="notification-indicator-number">1</span></a>
              </li>

              <!-- Notification -->
              <li class="nav-item dropdown">
                <a class="nav-link notification-indicator notification-indicator-primary px-0 fa-icon-wait" id="navbarDropdownNotification" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-hide-on-body-scroll="data-hide-on-body-scroll"><span class="fas fa-bell" data-fa-transform="shrink-6" style="font-size: 33px;"></span></a>
                <div class="dropdown-menu dropdown-caret dropdown-caret dropdown-menu-end dropdown-menu-card dropdown-menu-notification dropdown-caret-bg" aria-labelledby="navbarDropdownNotification">
                  <div class="card card-notification shadow-none">
                    <div class="card-header">
                      <div class="row justify-content-between align-items-center">
                        <div class="col-auto">
                          <h6 class="card-header-title mb-0">Notifications</h6>
                        </div>
                        <div class="col-auto ps-0 ps-sm-3"><a class="card-link fw-normal" href="#">Mark all as read</a></div>
                      </div>
                    </div>
                    <div class="scrollbar-overlay" style="max-height:19rem">
                      <div class="list-group list-group-flush fw-normal fs-10">
                        <div class="list-group-title border-bottom">NEW</div>
                        <div class="list-group-item">
                          <a class="notification notification-flush notification-unread" href="#!">
                            <div class="notification-avatar">
                              <div class="avatar avatar-2xl me-3">
                                <img class="rounded-circle" src="../assets/img/team/1-thumb.png" alt="" />
                              </div>
                            </div>
                            <div class="notification-body">
                              <p class="mb-1"><strong>Emma Watson</strong> replied to your comment : "Hello world 😍"</p>
                              <span class="notification-time"><span class="me-2" role="img" aria-label="Emoji">💬</span>Just now</span>
                            </div>
                          </a>
                        </div>
                        <div class="list-group-item">
                          <a class="notification notification-flush notification-unread" href="#!">
                            <div class="notification-avatar">
                              <div class="avatar avatar-2xl me-3">
                                <div class="avatar-name rounded-circle"><span>AB</span></div>
                              </div>
                            </div>
                            <div class="notification-body">
                              <p class="mb-1"><strong>Albert Brooks</strong> reacted to <strong>Mia Khalifa's</strong> status</p>
                              <span class="notification-time"><span class="me-2 fab fa-gratipay text-danger"></span>9hr</span>
                            </div>
                          </a>
                        </div>
                        <div class="list-group-title border-bottom">EARLIER</div>
                        <div class="list-group-item">
                          <a class="notification notification-flush" href="#!">
                            <div class="notification-avatar">
                              <div class="avatar avatar-2xl me-3">
                                <img class="rounded-circle" src="../assets/img/icons/weather-sm.jpg" alt="" />
                              </div>
                            </div>
                            <div class="notification-body">
                              <p class="mb-1">The forecast today shows a low of 20&#8451; in California. See today's weather.</p>
                              <span class="notification-time"><span class="me-2" role="img" aria-label="Emoji">🌤️</span>1d</span>
                            </div>
                          </a>
                        </div>
                        <div class="list-group-item">
                          <a class="border-bottom-0 notification-unread  notification notification-flush" href="#!">
                            <div class="notification-avatar">
                              <div class="avatar avatar-xl me-3">
                                <img class="rounded-circle" src="../assets/img/logos/oxford.png" alt="" />
                              </div>
                            </div>
                            <div class="notification-body">
                              <p class="mb-1"><strong>University of Oxford</strong> created an event : "Causal Inference Hilary 2019"</p>
                              <span class="notification-time"><span class="me-2" role="img" aria-label="Emoji">✌️</span>1w</span>
                            </div>
                          </a>
                        </div>
                        <div class="list-group-item">
                          <a class="border-bottom-0 notification notification-flush" href="#!">
                            <div class="notification-avatar">
                              <div class="avatar avatar-xl me-3">
                                <img class="rounded-circle" src="../assets/img/team/10.jpg" alt="" />
                              </div>
                            </div>
                            <div class="notification-body">
                              <p class="mb-1"><strong>James Cameron</strong> invited to join the group: United Nations International Children's Fund</p>
                              <span class="notification-time"><span class="me-2" role="img" aria-label="Emoji">🙋‍</span>2d</span>
                            </div>
                          </a>
                        </div>
                      </div>
                    </div>
                    <div class="card-footer text-center border-top"><a class="card-link d-block" href="../app/social/notifications.html">View all</a></div>
                  </div>
                </div>
              </li>

              <!-- profile section -->
              <li class="nav-item dropdown"><a class="nav-link pe-0 ps-2" id="navbarDropdownUser" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <div class="avatar avatar-xl">
                    <img class="rounded-circle" src="../assets/img/team/3-thumb.png" alt="" />
                  </div>
                </a>
                <div class="dropdown-menu dropdown-caret dropdown-caret dropdown-menu-end py-0" aria-labelledby="navbarDropdownUser">
                  <div class="bg-white dark__bg-1000 rounded-2 py-2">
                    <a class="dropdown-item" href="{{ url('profile-settings.blade.php') }}">Profile Settings</a>
                    <a class="dropdown-item" href="#!">Manage Admin</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="../pages/authentication/card/logout.html">Logout</a>
                  </div>
                </div>
              </li>
            </ul>
          </nav>

          <!-- division -->
          <div class="row g-3">
            <div class="col-lg-8">
              <div class="card mb-3">
                <div class="card-header bg-body-tertiary overflow-hidden">
                  <div class="d-flex align-items-center">
                    <div class="avatar avatar-m">
                      <img class="rounded-circle" src="../../assets/img/team/1.jpg" alt="" />
                    </div>
                    <div class="flex-1 ms-2">
                      <h5 class="mb-0 fs-9">Create post</h5>
                    </div>
                  </div>
                </div>
                <div class="card-body p-0">
                  <form><textarea class="shadow-none form-control rounded-0 resize-none px-x1 border-y-0 border-200" placeholder="What do you want to talk about?" rows="4"></textarea>
                    <div class="d-flex align-items-center ps-x1 border border-200"><label class="text-nowrap mb-0 me-2" for="hash-tags"><span class="fas fa-plus me-1 fs-11"></span><span class="fw-medium fs-10">Add hashtag</span></label><input class="form-control border-0 fs-10 shadow-none" id="hash-tags" type="text" placeholder="Help the right person to see" /></div>
                    <div class="row g-0 justify-content-between mt-3 px-x1 pb-3">
                      <div class="col"><button class="btn btn-tertiary btn-sm rounded-pill shadow-none d-inline-flex align-items-center fs-10 mb-0 me-1" type="button"><img class="cursor-pointer" src="../../assets/img/icons/spot-illustrations/image.svg" width="17" alt="" /><span class="ms-2 d-none d-md-inline-block">Image</span></button><button class="btn btn-tertiary btn-sm rounded-pill shadow-none d-inline-flex align-items-center fs-10 me-1" type="button"><img class="cursor-pointer" src="../../assets/img/icons/spot-illustrations/calendar.svg" width="17" alt="" /><span class="ms-2 d-none d-md-inline-block">Event</span></button></div>
                      <div class="col-auto">
                        <div class="dropdown d-inline-block me-1"><button class="btn btn-sm dropdown-toggle px-1" id="dropdownMenuButton" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="fas fa-globe-americas"></span></button>
                          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton"><a class="dropdown-item" href="#">Public</a><a class="dropdown-item" href="#">Private</a><a class="dropdown-item" href="#">Draft</a></div>
                        </div><button class="btn btn-primary btn-sm px-4 px-sm-5" type="submit">Share</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <div class="card mb-3">
                <div class="card-header bg-body-tertiary">
                  <div class="row justify-content-between">
                    <div class="col">
                      <div class="d-flex">
                        <div class="avatar avatar-2xl status-online">
                          <img class="rounded-circle" src="../../assets/img/team/4.jpg" alt="" />
                        </div>
                        <div class="flex-1 align-self-center ms-2">
                          <p class="mb-1 lh-1"><a class="fw-semi-bold" href="../../pages/user/profile.html">Rowan Atkinson</a> shared an <a href="#!">album</a></p>
                          <p class="mb-0 fs-10">11 hrs &bull; Consett, UK &bull; <span class="fas fa-globe-americas"></span></p>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <div class="dropdown font-sans-serif btn-reveal-trigger"><button class="btn btn-link text-600 btn-sm dropdown-toggle dropdown-caret-none btn-reveal" type="button" id="post-album-action" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="fas fa-ellipsis-h fs-10"></span></button>
                        <div class="dropdown-menu dropdown-menu-end py-3" aria-labelledby="post-album-action"><a class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="#!">Edit</a><a class="dropdown-item" href="#!">Report</a>
                          <div class="dropdown-divider"></div><a class="dropdown-item text-warning" href="#!">Archive</a><a class="dropdown-item text-danger" href="#!">Delete </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-body overflow-hidden">
                  <p>Rowan Sebastian Atkinson CBE is an English actor, comedian and screenwriter best known for his work on the sitcoms Blackadder and Mr. Bean.</p>
                  <div class="row mx-n1">
                    <div class="col-6 p-1"><a href="../../assets/img/generic/4.jpg" data-gallery="gallery-1"><img class="img-fluid rounded" src="../../assets/img/generic/4.jpg" alt="" /></a></div>
                    <div class="col-6 p-1"><a href="../../assets/img/generic/5.jpg" data-gallery="gallery-1"><img class="img-fluid rounded" src="../../assets/img/generic/5.jpg" alt="" /></a></div>
                    <div class="col-4 p-1"><a href="../../assets/img/gallery/4.jpg" data-gallery="gallery-1"><img class="img-fluid rounded" src="../../assets/img/gallery/4.jpg" alt="" /></a></div>
                    <div class="col-4 p-1"><a href="../../assets/img/gallery/5.jpg" data-gallery="gallery-1"><img class="img-fluid rounded" src="../../assets/img/gallery/5.jpg" alt="" /></a></div>
                    <div class="col-4 p-1"><a href="../../assets/img/gallery/3.jpg" data-gallery="gallery-1"><img class="img-fluid rounded" src="../../assets/img/gallery/3.jpg" alt="" /></a></div>
                  </div>
                </div>
                <div class="card-footer bg-body-tertiary pt-0">
                  <div class="border-bottom border-200 fs-10 py-3"><a class="text-700" href="#!">345 Likes</a> &bull; <a class="text-700" href="#!">34 Comments</a></div>
                  <div class="row g-0 fw-semi-bold text-center py-2 fs-10">
                    <div class="col-auto"><a class="rounded-2 d-flex align-items-center me-3" href="#!"><img src="../../assets/img/icons/spot-illustrations/like-active.png" width="20" alt="" /><span class="ms-1">Like</span></a></div>
                    <div class="col-auto"><a class="rounded-2 d-flex align-items-center me-3" href="#!"><img src="../../assets/img/icons/spot-illustrations/comment-active.png" width="20" alt="" /><span class="ms-1">Comment</span></a></div>
                    <div class="col-auto d-flex align-items-center"><a class="rounded-2 text-700 d-flex align-items-center" href="#!"><img src="../../assets/img/icons/spot-illustrations/share-inactive.png" width="20" alt="" /><span class="ms-1">Share</span></a></div>
                  </div>
                  <form class="d-flex align-items-center border-top border-200 pt-3">
                    <div class="avatar avatar-xl">
                      <img class="rounded-circle" src="../../assets/img/team/3.jpg" alt="" />
                    </div><input class="form-control rounded-pill ms-2 fs-10" type="text" placeholder="Write a comment..." />
                  </form>
                  <div class="d-flex mt-3">
                    <div class="avatar avatar-xl">
                      <img class="rounded-circle" src="../../assets/img/team/4.jpg" alt="" />
                    </div>
                    <div class="flex-1 ms-2 fs-10">
                      <p class="mb-1 bg-200 rounded-3 p-2"><a class="fw-semi-bold" href="../../pages/user/profile.html">Rowan Atkinson</a> She starred as Jane Porter in The <a href="#!">@Legend of Tarzan (2016)</a>, Tanya Vanderpoel in Whiskey Tango Foxtrot (2016) and as DC comics villain Harley Quinn in Suicide Squad (2016), for which she was nominated for a Teen Choice Award, and many other awards.</p>
                      <div class="px-2"><a href="#!">Like</a> &bull; <a href="#!">Reply</a> &bull; 23min </div>
                    </div>
                  </div>
                  <div class="d-flex mt-3">
                    <div class="avatar avatar-xl">
                      <img class="rounded-circle" src="../../assets/img/team/3.jpg" alt="" />
                    </div>
                    <div class="flex-1 ms-2 fs-10">
                      <p class="mb-1 bg-200 rounded-3 p-2"><a class="fw-semi-bold" href="../../pages/user/profile.html">Jessalyn Gilsig</a> Jessalyn Sarah Gilsig is a Canadian-American actress known for her roles in television series, e.g., as Lauren Davis in Boston Public, Gina Russo in Nip/Tuck, Terri Schuester in Glee, and as Siggy Haraldson on the History Channel series Vikings. 🏆</p>
                      <div class="px-2"><a href="#!">Like</a> &bull; <a href="#!">Reply</a> &bull; 3hrs </div>
                    </div>
                  </div><a class="fs-10 text-700 d-inline-block mt-2" href="#!">Load more comments (2 of 34)</a>
                </div>
              </div>
             
              <div class="card mb-3"><img class="card-img-top" src="../../assets/img/generic/13.jpg" alt="" />
                <div class="card-body overflow-hidden">
                  <div class="row justify-content-between align-items-center">
                    <div class="col">
                      <div class="d-flex">
                        <div class="calendar me-2"><span class="calendar-month">Dec</span><span class="calendar-day">31 </span></div>
                        <div class="flex-1 fs-10">
                          <h5 class="fs-9"><a href="../events/event-detail.html">FREE New Year's Eve Midnight Harbor Fireworks</a></h5>
                          <p class="mb-0">by <a href="#!">Boston Harbor Now</a></p><span class="fs-9 text-warning fw-semi-bold">$49.99 – $89.99</span>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-auto d-none d-md-block"><button class="btn btn-falcon-default btn-sm px-4" type="button">Register</button></div>
                  </div>
                </div>
                <div class="card-footer bg-body-tertiary pt-0">
                  <div class="row g-0 fw-semi-bold text-center py-2 fs-10">
                    <div class="col-auto"><a class="rounded-2 d-flex align-items-center me-3 text-700" href="#!"><img src="../../assets/img/icons/spot-illustrations/like-inactive.png" width="20" alt="" /><span class="ms-1">Like</span></a></div>
                    <div class="col-auto"><a class="rounded-2 d-flex align-items-center me-3 text-700" href="#!"><img src="../../assets/img/icons/spot-illustrations/comment-inactive.png" width="20" alt="" /><span class="ms-1">Comment</span></a></div>
                    <div class="col-auto d-flex align-items-center"><a class="rounded-2 text-700 d-flex align-items-center" href="#!"><img src="../../assets/img/icons/spot-illustrations/share-inactive.png" width="20" alt="" /><span class="ms-1">Share</span></a></div>
                  </div>
                  <form class="d-flex align-items-center border-top border-200 pt-3">
                    <div class="avatar avatar-xl">
                      <img class="rounded-circle" src="../../assets/img/team/3.jpg" alt="" />
                    </div><input class="form-control rounded-pill ms-2 fs-10" type="text" placeholder="Write a comment..." />
                  </form>
                </div>
              </div>

            </div>


            <div class="col-lg-4">
              <div class="card mb-3 mb-lg-0">
                <div class="card-header bg-body-tertiary">
                  <h5 class="mb-0">You may interested</h5>
                </div>
                <div class="card-body fs-10">
                  <div class="d-flex btn-reveal-trigger">
                    <div class="calendar"><span class="calendar-month">Feb</span><span class="calendar-day">21</span></div>
                    <div class="flex-1 position-relative ps-3">
                      <h6 class="fs-9 mb-0"><a href="../events/event-detail.html">Newmarket Nights</a></h6>
                      <p class="mb-1">Organized by <a href="#!" class="text-700">University of Oxford</a></p>
                      <p class="text-1000 mb-0">Time: 6:00AM</p>
                      <p class="text-1000 mb-0">Duration: 6:00AM - 5:00PM</p>Place: Cambridge Boat Club, Cambridge<div class="border-bottom border-dashed my-3"></div>
                    </div>
                  </div>
                  <div class="d-flex btn-reveal-trigger">
                    <div class="calendar"><span class="calendar-month">Dec</span><span class="calendar-day">31</span></div>
                    <div class="flex-1 position-relative ps-3">
                      <h6 class="fs-9 mb-0"><a href="../events/event-detail.html">31st Night Celebration</a></h6>
                      <p class="mb-1">Organized by <a href="#!" class="text-700">Chamber Music Society</a></p>
                      <p class="text-1000 mb-0">Time: 11:00PM</p>
                      <p class="text-1000 mb-0">280 people interested</p>Place: Tavern on the Greend, New York<div class="border-bottom border-dashed my-3"></div>
                    </div>
                  </div>
                  <div class="d-flex btn-reveal-trigger">
                    <div class="calendar"><span class="calendar-month">Dec</span><span class="calendar-day">16</span></div>
                    <div class="flex-1 position-relative ps-3">
                      <h6 class="fs-9 mb-0"><a href="../events/event-detail.html">Folk Festival</a></h6>
                      <p class="mb-1">Organized by <a href="#!" class="text-700">Harvard University</a></p>
                      <p class="text-1000 mb-0">Time: 9:00AM</p>
                      <p class="text-1000 mb-0">Location: Cambridge Masonic Hall Association</p>Place: Porter Square, North Cambridge
                    </div>
                  </div>
                </div>
                <div class="card-footer bg-body-tertiary p-0 border-top"><a class="btn btn-link d-block w-100" href="../events/event-list.html">All Events<span class="fas fa-chevron-right ms-1 fs-11"></span></a></div>
              </div>
            </div>
          </div>



        </div>
      </div>
    </main><!-- ===============================================--><!--    End of Main Content--><!-- ===============================================-->

    

    <!-- =============================================== -->
    <!-- JavaScripts -->
    <!-- =============================================== -->
    <script src="{{ asset('vendors/popper/popper.min.js') }}"></script>
    <script src="{{ asset('vendors/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendors/anchorjs/anchor.min.js') }}"></script>
    <script src="{{ asset('vendors/is/is.min.js') }}"></script>
    <script src="{{ asset('vendors/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('vendors/prism/prism.js') }}"></script>
    <script src="{{ asset('vendors/fontawesome/all.min.js') }}"></script>
    <script src="{{ asset('vendors/lodash/lodash.min.js') }}"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="{{ asset('vendors/list.js/list.min.js') }}"></script>
    <script src="{{ asset('assets/js/theme.js') }}"></script>

  </body>


<!-- Mirrored from prium.github.io/falcon/v3.19.0/demo/navbar-vertical.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 22 Nov 2023 06:21:15 GMT -->
</html>