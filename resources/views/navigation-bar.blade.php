
<!DOCTYPE html>
<html data-bs-theme="light" lang="en-US" dir="ltr">


  
<!-- Mirrored from prium.github.io/falcon/v3.19.0/demo/navbar-vertical.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 22 Nov 2023 06:21:15 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- ===============================================--><!--    Document Title--><!-- ===============================================-->
    <title>Falcon | Dashboard &amp; Web App Template</title>

    <!-- ===============================================--><!--    Favicons--><!-- ===============================================-->
    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/img/favicons/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/img/favicons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/img/favicons/favicon-16x16.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicons/favicon.ico') }}">
    <link rel="manifest" href="{{ asset('assets/img/favicons/manifest.json') }}">
    <meta name="msapplication-TileImage" content="{{ asset('assets/img/favicons/mstile-150x150.png') }}">
    <meta name="theme-color" content="#ffffff">
    <script src="{{ asset('assets/js/config.js') }}"></script>
    <script src="{{ asset('vendors/simplebar/simplebar.min.js') }}"></script>

    <!-- Stylesheets -->
    <link href="{{ asset('vendors/prism/prism-okaidia.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/simplebar/simplebar.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/theme-rtl.min.css') }}" rel="stylesheet" id="style-rtl">
    <link href="{{ asset('assets/css/theme.min.css') }}" rel="stylesheet" id="style-default">
    <link href="{{ asset('assets/css/user-rtl.min.css') }}" rel="stylesheet" id="user-style-rtl">
    <link href="{{ asset('assets/css/user.min.css') }}" rel="stylesheet" id="user-style-default">


    <!-- ===============================================--><!--    JavaScripts--><!-- ===============================================-->
    <script src="{{ asset('vendors/popper/popper.min.js') }}"></script>
    <script src="{{ asset('vendors/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendors/anchorjs/anchor.min.js') }}"></script>
    <script src="{{ asset('vendors/is/is.min.js') }}"></script>
    <script src="{{ asset('vendors/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('vendors/prism/prism.js') }}"></script>
    <script src="{{ asset('vendors/fontawesome/all.min.js') }}"></script>
    <script src="{{ asset('vendors/lodash/lodash.min.js') }}"></script>
    <script src="{{ asset('polyfill.io/v3/polyfill.min58be.js?features=window.scroll') }}"></script>
    <script src="{{ asset('vendors/list.js/list.min.js') }}"></script>
    <script src="{{ asset('assets/js/theme.js') }}"></script>

    
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
          if(isFluid) {
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
                  <button class="btn navbar-toggler-humburger-icon navbar-vertical-toggle" data-bs-toggle="tooltip" data-bs-placement="left" title="Toggle Navigation">
                      <span class="navbar-toggle-icon"><span class="toggle-line"></span></span>
                  </button>
              </div>
              <a class="navbar-brand" href="{{ url('../index.html') }}">
                  <div class="d-flex align-items-center py-3">
                      <img class="me-2" src="{{ asset('assets/img/icons/spot-illustrations/falcon.png') }}" alt="" width="40" />
                      <span class="font-sans-serif text-primary">falcon</span>
                  </div>
              </a>
          </div>

          <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
              <div class="navbar-vertical-content scrollbar">
                  <ul class="navbar-nav flex-column mb-3" id="navbarVerticalNav">
                      <!-- Homepage -->
                      <li class="nav-item"><!-- parent pages-->
                          <a class="nav-link dropdown-indicator" href="#dashboard" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="dashboard">
                              <div class="d-flex align-items-center">
                                  <span class="nav-link-icon">
                                      <span class="fas fa-chart-pie"></span>
                                  </span>
                                  <span class="nav-link-text ps-1">Dashboard</span>
                              </div>
                          </a>
                      </li>

                      <!-- Main Menu -->
                      <li class="nav-item"><!-- label-->
                          <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                              <div class="col-auto navbar-vertical-label">Menu</div>
                              <div class="col ps-0">
                                  <hr class="mb-0 navbar-vertical-divider" />
                              </div>
                          </div>

                          <!-- Attendance-->
                          <a class="nav-link" href="../app/calendar.html" role="button">
                              <div class="d-flex align-items-center"><span class="nav-link-icon">
                                      <span class="fas fa-calendar-alt"></span></span>
                                  <span class="nav-link-text ps-1">Attendance</span>
                              </div>
                          </a>

                          <!-- Fines -->
                          <a class="nav-link" href="../app/chat.html" role="button">
                              <div class="d-flex align-items-center"><span class="nav-link-icon">
                                      <span class="fas fa-comments"></span></span>
                                  <span class="nav-link-text ps-1">Fines</span>
                              </div>
                          </a>

                          <!-- Activity-->
                          <a class="nav-link dropdown-indicator" href="#email" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="email">
                              <div class="d-flex align-items-center">
                                  <span class="nav-link-icon"><span class="fas fa-envelope-open"></span></span>
                                  <span class="nav-link-text ps-1">Activity</span>
                              </div>
                          </a>
                          <ul class="nav collapse" id="email">
                              <li class="nav-item"><a class="nav-link" href="../app/email/inbox.html">
                                      <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Inbox</span></div>
                                  </a><!-- more inner pages--></li>
                              <li class="nav-item"><a class="nav-link" href="../app/email/email-detail.html">
                                      <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Email detail</span></div>
                                  </a><!-- more inner pages--></li>
                              <li class="nav-item"><a class="nav-link" href="../app/email/compose.html">
                                      <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Compose</span></div>
                                  </a><!-- more inner pages--></li>
                          </ul>

                          <!-- Community -->
                          <a class="nav-link" href="../app/chat.html" role="button">
                              <div class="d-flex align-items-center"><span class="nav-link-icon">
                                      <span class="fas fa-comments"></span></span>
                                  <span class="nav-link-text ps-1">Community</span>
                              </div>
                          </a>

                          <!-- About -->
                          <a class="nav-link" href="../app/chat.html" role="button">
                              <div class="d-flex align-items-center"><span class="nav-link-icon">
                                      <span class="fas fa-comments"></span></span>
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
            <button class="btn navbar-toggler-humburger-icon navbar-toggler me-1 me-sm-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalCollapse" aria-controls="navbarVerticalCollapse" aria-expanded="false" aria-label="Toggle Navigation">
                <span class="navbar-toggle-icon"><span class="toggle-line"></span></span>
            </button>
            <a class="navbar-brand me-1 me-sm-3" href="{{ url('../index.html') }}">
                <div class="d-flex align-items-center"><img class="me-2" src="{{ asset('assets/img/icons/spot-illustrations/falcon.png') }}" alt="" width="40" /><span class="font-sans-serif text-primary">falcon</span></div>
            </a>
            <ul class="navbar-nav align-items-center d-none d-lg-block">
                <li class="nav-item">
                    <div class="search-box" data-list='{"valueNames":["title"]}'>
                        <form class="position-relative" data-bs-toggle="search" data-bs-display="static">
                            <input class="form-control search-input fuzzy-search" type="search" placeholder="Search..." aria-label="Search" />
                            <span class="fas fa-search search-box-icon"></span>
                        </form>
                        <div class="btn-close-falcon-container position-absolute end-0 top-50 translate-middle shadow-none" data-bs-dismiss="search">
                            <button class="btn btn-link btn-close-falcon p-0" aria-label="Close"></button>
                        </div>
                        <!-- Add your dropdown content here -->
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav navbar-nav-icons ms-auto flex-row align-items-center">
                <!-- Theme Switch Dropdown -->
                <li class="nav-item ps-2 pe-0">
                    <div class="dropdown theme-control-dropdown">
                        <a class="nav-link d-flex align-items-center dropdown-toggle fa-icon-wait fs-9 pe-1 py-0" href="#" role="button" id="themeSwitchDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="fas fa-sun fs-7" data-fa-transform="shrink-2" data-theme-dropdown-toggle-icon="light"></span>
                            <span class="fas fa-moon fs-7" data-fa-transform="shrink-3" data-theme-dropdown-toggle-icon="dark"></span>
                            <span class="fas fa-adjust fs-7" data-fa-transform="shrink-2" data-theme-dropdown-toggle-icon="auto"></span>
                        </a>
                        <!-- Add your theme switch dropdown content here -->
                    </div>
                </li>
                <!-- End Theme Switch Dropdown -->

                <!-- Shopping Cart -->
                <li class="nav-item d-none d-sm-block">
                    <a class="nav-link px-0 notification-indicator notification-indicator-warning notification-indicator-fill fa-icon-wait" href="../app/e-commerce/shopping-cart.html">
                        <span class="fas fa-shopping-cart" data-fa-transform="shrink-7" style="font-size: 33px;"></span>
                        <span class="notification-indicator-number">1</span>
                    </a>
                </li>
                <!-- End Shopping Cart -->

                <!-- Notification Section -->
                <li class="nav-item dropdown">
                    <a class="nav-link notification-indicator notification-indicator-primary px-0 fa-icon-wait" id="navbarDropdownNotification" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-hide-on-body-scroll="data-hide-on-body-scroll">
                        <span class="fas fa-bell" data-fa-transform="shrink-6" style="font-size: 33px;"></span>
                    </a>
                    <!-- Add your notification dropdown content here -->
                </li>
                <!-- End Notification Section -->

                <!-- Profile Settings Section -->
                <li class="nav-item dropdown">
                    <a class="nav-link pe-0 ps-2" id="navbarDropdownUser" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="avatar avatar-xl">
                            <img class="rounded-circle" src="{{ asset('assets/img/team/3-thumb.png') }}" alt="" />
                        </div>
                    </a>
                    <!-- Add your profile settings dropdown content here -->
                </li>
                <!-- End Profile Section -->
            </ul>
          </nav>
        </div>
      </div>
    </main><!-- ===============================================--><!--    End of Main Content--><!-- ===============================================-->


  </body>


<!-- Mirrored from prium.github.io/falcon/v3.19.0/demo/navbar-vertical.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 22 Nov 2023 06:21:15 GMT -->
</html>