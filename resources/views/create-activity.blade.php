<!DOCTYPE html>
<html data-bs-theme="light" lang="en-US" dir="ltr">


<!-- Mirrored from prium.github.io/falcon/v3.19.0/demo/navbar-vertical.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 22 Nov 2023 06:21:15 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- ===============================================--><!--    Document Title--><!-- ===============================================-->
  <title>AFMAMS | Create Activity </title>

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
    <link href="{{ asset('vendors/choices/choices.min.css')}}" rel="stylesheet" />


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
            <div class="d-flex align-items-center py-3"><img class="me-2" src="{{ url('assets/images/logo/afmams.png') }}" alt="" width="40" /><span class="font-sans-serif text-primary">AFMAMS</span></div>
          </a>
        </div>
        <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
          <div class="navbar-vertical-content scrollbar">
            <ul class="navbar-nav flex-column mb-3" id="navbarVerticalNav">

              <!-- Dashboard -->
              <li class="nav-item">
                <a class="nav-link" href="{{ url('dashboard') }}" role="button" aria-expanded="false" aria-controls="dashboard">
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
                <a class="nav-link" href="{{ url('attendance.blade.php') }}" role="button">
                  <div class="d-flex align-items-center"><span class="nav-link-icon">
                      <span class="fas fa-calendar-alt"></span></span>
                    <span class="nav-link-text ps-1">Attendance</span>
                  </div>
                </a>

                <!-- Fines -->
                <a class="nav-link" href="{{ url('fines.blade.php') }} role=" button">
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
          <!-- division -->
            <div class="card mb-3">
              <div class="card-body">
                <div class="row flex-between-center">
                  <div class="col-md">
                    <h5 class="mb-2 mb-md-0">Create Activity</h5>
                  </div>
                </div>
              </div>
            </div>
            <div>
              @if($errors->any())
              <ul>

              @foreach($errors->all() as $error)
              <li>
                {{$error}}
              </li>

              @endforeach
              </ul>

              @endif
            </div>
            <div class="card cover-image mb-3"><img class="card-img-top" src="{{ url('assets/img/generic/13.jpg') }}" alt="" /><input class="d-none" id="upload-cover-image" type="file" /><label class="cover-image-file-input" for="upload-cover-image"><span class="fas fa-camera me-2"></span><span>Change cover photo</span></label></div>
            <div class="row g-0"> 
              <div class="col-lg-12 pe-lg-2">
                <div class="card mb-3">
                  <div class="card-header">
                    <h5 class="mb-0">Activity Details</h5>
                  </div>
                  <div class="card-body bg-body-tertiary">
                    <form method="post" id="form1" action="{{route('create-activity.store')}}" class="dropzone dropzone-multiple p-0" id="my-awesome-dropzone" data-dropzone="data-dropzone">
                      @csrf
                      @method('post')
                      <div class="row gx-2">
                        <div class="col-12 mb-3"><label class="form-label" for="event-name">Activity Title</label><input class="form-control" id="event-name" type="text" placeholder="Activity Title" name="title"/></div>
                        <div class="col-sm-6 mb-3"><label class="form-label" for="start-date">Start Date</label><input class="form-control datetimepicker" id="start-date" type="text" placeholder="yyyy-mm-dd" name="date_start" data-options='{"dateFormat":"y/m/d","disableMobile":true}' /></div>
                        <div class="col-sm-6 mb-3"><label class="form-label" for="start-time">Start Time</label><input class="form-control datetimepicker" id="start-time" type="text" placeholder="hh:mm" name="start_time" data-options='{"enableTime":true,"noCalendar":true,"dateFormat":"H:i","disableMobile":true}' /></div>
                        <div class="col-sm-6 mb-3"><label class="form-label" for="end-date">End Date</label><input class="form-control datetimepicker" id="end-date" type="text" placeholder="yyyy-mm-dd" name="date_end" data-options='{"dateFormat":"y/m/d","disableMobile":true}' /></div>
                        <div class="col-sm-6 mb-3"><label class="form-label" for="end-time">End Time</label><input class="form-control datetimepicker" id="end-time" type="text" placeholder="hh:mm" name="end_time" data-options='{"enableTime":true,"noCalendar":true,"dateFormat":"H:i","disableMobile":true}' /></div>
                        <div class="col-sm-6"><label class="form-label" for="registration-deadline">Registration Deadline</label><input class="form-control datetimepicker" id="registration-deadline" type="text" placeholder="yyyy-mm-dd" name="registration_deadline" data-options='{"dateFormat":"y/m/d","disableMobile":true}' /></div>
                        <div class="col-sm-6"><label class="form-label" for="registration-fee">Registration Fee</label><input class="form-control" id="registration-fee" type="text" placeholder="₱ 00.00" name="registration_fee"/></div>
                        <div class="border-bottom border-dashed my-3"></div>



                      <!-- Organizer Dropdown -->
                      <div class="col-sm-6 mb-3">
                          <label class="form-label" for="organizer">Organizer</label>
                          <select class="form-select" id="organizerSelect" name="organizer">
                              <option id="default" value="default">Select Organizer...</option>
                              <option id="institution" value="institution">Institution</option>
                              <option id="department" value="department">Department</option>
                              <option id="organization" value="organization">Organization</option>
                          </select>
                      </div>

                      <!-- Department Dropdown - Initially Hidden -->
                      <div class="col-sm-6 mb-3" id="departmentDropdown" style="display:none;">
                          <label class="form-label" for="specific-dept">Specific Department</label>
                          <select class="form-select" id="departmentSelect" name="department_name">
                              <option value="defaultdep" selected disabled>Select Department</option>
                              @foreach($departments as $department)
                                  <option value="{{$department->department_name}}" name="department_name">
                                      {{$department->department_name}}
                                  </option>
                              @endforeach
                          </select>
                          
                      </div>

                      <!-- Organization Dropdown - Initially Hidden -->
                      <div class="col-sm-6 mb-3" id="organizationDropdown" style="display:none;">
                          <label class="form-label" for="specific-org">Specific Organization</label>
                          <select class="form-select js-choice" id="organizationSelect" multiple="multiple" size="1" name="organizerMultiple" data-options='{"removeItemButton":true,"placeholder":true}'>
                              <option value="defaultorg" selected disabled>Select Organization</option>
                              @foreach($organizations as $organization)
                                  <option value="{{$organization->organization_name}}" name="organization_name">
                                      {{$organization->organization_name}}
                                  </option>
                              @endforeach
                          </select>
                        
                      </div>

                      <script>
                        document.getElementById('organizerSelect').addEventListener('change', function() {
                            var organizer = this.value;
                            if (organizer == 'department') {
                                document.getElementById('departmentDropdown').style.display = 'block'; // Show department dropdown
                                document.getElementById('organizationDropdown').style.display = 'none'; // Hide organization dropdown
                                document.getElementById('selectedOrganization').value = 'defaultorg'; // Set value of organization to null
                            } else if (organizer == 'organization') {
                                document.getElementById('departmentDropdown').style.display = 'none'; // Hide department dropdown
                                document.getElementById('organizationDropdown').style.display = 'block'; // Show organization dropdown
                                document.getElementById('selectedDepartment').value = 'defaultdep'; // Set value of department to null
                            } else if (organizer == 'institution') {
                                document.getElementById('departmentDropdown').style.display = 'none'; // Hide department dropdown
                                document.getElementById('organizationDropdown').style.display = 'none'; // Hide organization dropdown
                                document.getElementById('selectedDepartment').value = ''; // Set value of department to null
                                document.getElementById('selectedOrganization').value = ''; // Set value of organization to null
                            }
                        });
                    </script>

                      



  
                        <div class="col-12">
                          <div class="border-bottom border-dashed my-3"></div>
                        </div>
                        <div class="col-12"><label class="form-label" for="description">Description</label><textarea class="form-control" id="description" name="description"  rows="6"></textarea></div>

                        <div class="border-bottom border-dashed my-3"></div>

                        <!-- upload photos -->
                        <div class="card-header">
                            <h5 class="mb-1">Upload Photos</h5>
                        </div>
                        <div class="fallback">
                            <input name="file" type="file" multiple="multiple" />
                        </div>
                        <div class="dz-message" data-dz-message="data-dz-message">
                            <img class="me-2" src="{{ asset('assets/img/icons/cloud-upload.svg') }}" width="25" alt="" />
                            Drop your files here
                        </div>
                        <div class="dz-preview dz-preview-multiple m-0 d-flex flex-column">
                            <div class="d-flex media align-items-center mb-3 pb-3 border-bottom btn-reveal-trigger">
                                <img class="dz-image" src="{{ asset('assets/img/generic/image-file-2.png') }}" alt="..." data-dz-thumbnail="data-dz-thumbnail" />
                                <div class="flex-1 d-flex flex-between-center">
                                    <div>
                                        <h6 data-dz-name="data-dz-name"></h6>
                                        <div class="d-flex align-items-center">
                                            <p class="mb-0 fs-10 text-400 lh-1" data-dz-size="data-dz-size"></p>
                                            <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress=""></span></div>
                                        </div>
                                    </div>
                                    <div class="dropdown font-sans-serif">
                                        <button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal dropdown-caret-none" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span class="fas fa-ellipsis-h"></span>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end border py-2">
                                            <a class="dropdown-item" href="#!" data-dz-remove="data-dz-remove">Remove File</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="border-bottom border-dashed my-3"></div>
                        <h6>Listing Privacy</h6>
                        <div class="mb-3 form-check"><input class="form-check-input" id="customRadio4" type="radio" name="listingPrivacy" checked="checked" /><label class="form-label mb-0" for="customRadio4"> <strong>Public</strong></label>
                          <div class="form-text mt-0">Discoverable by anyone on City College of Calapan.</div>
                        </div>
                        <div class="mb-3 form-check"><input class="form-check-input" id="customRadio5" type="radio" name="listingPrivacy" /><label class="form-label mb-0" for="customRadio5"> <strong>Private</strong></label>
                          <div class="form-text mt-0">Accessible only by organization and department specified. </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>

            <div class="card mt-3">
              <div class="card-body">
                <div class="row justify-content-between align-items-center">
                  <div class="col-md">
                    <h5 class="mb-2 mb-md-0">Nice Job! You're almost done</h5>
                  </div>
                  <div class="col-auto"><button class="btn btn-falcon-default btn-sm me-2" type="submit" form="form1">Save</button></div>
                </div>
              </div>
            </div>


        </div>
      </nav>

      <!-- header -->
      <div class="content">
        <nav class="navbar navbar-light navbar-glass navbar-top navbar-expand">
          <button class="btn navbar-toggler-humburger-icon navbar-toggler me-1 me-sm-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalCollapse" aria-controls="navbarVerticalCollapse" aria-expanded="false" aria-label="Toggle Navigation"><span class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>
          <a class="navbar-brand me-1 me-sm-3" href="../index.html">
            <div class="d-flex align-items-center"><img class="me-2" src="{{ url('assets/images/logo/afmams.png') }}" alt="" width="40" /><span class="font-sans-serif text-primary">AFMAMS</span></div>
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
        <div class="card mb-3">
          <div class="card-body">
            <div class="row flex-between-center">
              <div class="col-md">
                <h5 class="mb-2 mb-md-0">Create Activity</h5>
              </div>
            </div>
          </div>
        </div>
        <div>
          @if($errors->any())
          <ul>

            @foreach($errors->all() as $error)
            <li>
              {{$error}}
            </li>

            @endforeach
          </ul>

          @endif
        </div>
        <div class="card cover-image mb-3"><img class="card-img-top" src="{{ url('assets/img/generic/13.jpg') }}" alt="" /><input class="d-none" id="upload-cover-image" type="file" /><label class="cover-image-file-input" for="upload-cover-image"><span class="fas fa-camera me-2"></span><span>Change cover photo</span></label></div>
        <div class="row g-0">
          <div class="col-lg-12 pe-lg-2">
            <div class="card mb-3">
              <div class="card-header">
                <h5 class="mb-0">Activity Details</h5>
              </div>
              <div class="card-body bg-body-tertiary">
                <form method="post" id="form1" action="{{route('create-activity.store')}}" class="dropzone dropzone-multiple p-0" id="my-awesome-dropzone" data-dropzone="data-dropzone">
                  @csrf
                  @method('post')
                  <div class="row gx-2">
                    <div class="col-12 mb-3"><label class="form-label" for="event-name">Activity Title</label><input class="form-control" id="event-name" type="text" placeholder="Activity Title" name="title" /></div>
                    <div class="col-sm-6 mb-3"><label class="form-label" for="start-date">Start Date</label><input class="form-control datetimepicker" id="start-date" type="text" placeholder="yyyy-mm-dd" name="date_start" data-options='{"dateFormat":"y/m/d","disableMobile":true}' /></div>
                    <div class="col-sm-6 mb-3"><label class="form-label" for="start-time">Start Time</label><input class="form-control datetimepicker" id="start-time" type="text" placeholder="hh:mm" name="start_time" data-options='{"enableTime":true,"noCalendar":true,"dateFormat":"H:i","disableMobile":true}' /></div>
                    <div class="col-sm-6 mb-3"><label class="form-label" for="end-date">End Date</label><input class="form-control datetimepicker" id="end-date" type="text" placeholder="yyyy-mm-dd" name="date_end" data-options='{"dateFormat":"y/m/d","disableMobile":true}' /></div>
                    <div class="col-sm-6 mb-3"><label class="form-label" for="end-time">End Time</label><input class="form-control datetimepicker" id="end-time" type="text" placeholder="hh:mm" name="end_time" data-options='{"enableTime":true,"noCalendar":true,"dateFormat":"H:i","disableMobile":true}' /></div>
                    <div class="col-sm-6"><label class="form-label" for="registration-deadline">Registration Deadline</label><input class="form-control datetimepicker" id="registration-deadline" type="text" placeholder="yyyy-mm-dd" name="registration_deadline" data-options='{"dateFormat":"y/m/d","disableMobile":true}' /></div>
                    <div class="col-sm-6"><label class="form-label" for="registration-fee">Registration Fee</label><input class="form-control" id="registration-fee" type="text" placeholder="₱ 00.00" name="registration_fee" /></div>
                    <div class="border-bottom border-dashed my-3"></div>

                    <!-- Department Text Field Here -->







                    <div class="col-12">
                      <div class="border-bottom border-dashed my-3"></div>
                    </div>
                    <div class="col-12"><label class="form-label" for="description">Description</label><textarea class="form-control" id="description" name="description" rows="6"></textarea></div>

                    <div class="border-bottom border-dashed my-3"></div>

                    <!-- upload photos -->
                    <div class="card-header">
                      <h5 class="mb-1">Upload Photos</h5>
                    </div>
                    <div class="fallback">
                      <input name="file" type="file" multiple="multiple" />
                    </div>
                    <div class="dz-message" data-dz-message="data-dz-message">
                      <img class="me-2" src="{{ asset('assets/img/icons/cloud-upload.svg') }}" width="25" alt="" />
                      Drop your files here
                    </div>
                    <div class="dz-preview dz-preview-multiple m-0 d-flex flex-column">
                      <div class="d-flex media align-items-center mb-3 pb-3 border-bottom btn-reveal-trigger">
                        <img class="dz-image" src="{{ asset('assets/img/generic/image-file-2.png') }}" alt="..." data-dz-thumbnail="data-dz-thumbnail" />
                        <div class="flex-1 d-flex flex-between-center">
                          <div>
                            <h6 data-dz-name="data-dz-name"></h6>
                            <div class="d-flex align-items-center">
                              <p class="mb-0 fs-10 text-400 lh-1" data-dz-size="data-dz-size"></p>
                              <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress=""></span></div>
                            </div>
                          </div>
                          <div class="dropdown font-sans-serif">
                            <button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal dropdown-caret-none" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <span class="fas fa-ellipsis-h"></span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end border py-2">
                              <a class="dropdown-item" href="#!" data-dz-remove="data-dz-remove">Remove File</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>


                    <div class="border-bottom border-dashed my-3"></div>
                    <h6>Listing Privacy</h6>
                    <div class="mb-3 form-check"><input class="form-check-input" id="customRadio4" type="radio" name="listingPrivacy" checked="checked" /><label class="form-label mb-0" for="customRadio4"> <strong>Public</strong></label>
                      <div class="form-text mt-0">Discoverable by anyone on City College of Calapan.</div>
                    </div>
                    <div class="mb-3 form-check"><input class="form-check-input" id="customRadio5" type="radio" name="listingPrivacy" /><label class="form-label mb-0" for="customRadio5"> <strong>Private</strong></label>
                      <div class="form-text mt-0">Accessible only by organization and department specified. </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>

        <div class="card mt-3">
          <div class="card-body">
            <div class="row justify-content-between align-items-center">
              <div class="col-md">
                <h5 class="mb-2 mb-md-0">Nice Job! You're almost done</h5>
              </div>
              <div class="col-auto"><button class="btn btn-falcon-default btn-sm me-2" type="submit" form="form1">Save</button></div>
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


  <!-- JavaScript to Toggle Dropdowns based on Organizer Selection -->
  <script>
    window.onload = function() {
      document.getElementById('organizer').addEventListener('change', function() {
        var departmentDropdown = document.getElementById('departmentDropdown');
        var organizationDropdown = document.getElementById('organizationDropdown');

        // Reset dropdowns
        departmentDropdown.style.display = 'none';
        organizationDropdown.style.display = 'none';

        // Show/hide dropdowns based on organizer selection
        if (this.value === 'department') {
          departmentDropdown.style.display = 'block';
        } else if (this.value === 'organization') {
          organizationDropdown.style.display = 'block';
        }
      });
    };
  </script>

</body>


<!-- Mirrored from prium.github.io/falcon/v3.19.0/demo/navbar-vertical.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 22 Nov 2023 06:21:15 GMT -->

</html>