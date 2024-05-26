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

              @if(auth()->check()) <!-- Assuming the user is authenticated -->
                    @if(auth()->user()->user_role === 'admin')
                        <!-- Dashboard for admin or officer -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}" role="button" aria-expanded="false" aria-controls="dashboard">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon">
                                        <span class="fas fa-chart-pie"></span>
                                    </span>
                                    <span class="nav-link-text ps-1">Dashboard</span>
                                </div>
                            </a>
                        </li>
                    @elseif(auth()->user()->user_role === 'officer')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('officer.home') }}" role="button" aria-expanded="false" aria-controls="dashboard">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon">
                                        <span class="fas fa-chart-pie"></span>
                                    </span>
                                    <span class="nav-link-text ps-1">Dashboard</span>
                                </div>
                            </a>
                        </li>
                    @else
                        <!-- Dashboard for student -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('student.home') }}" role="button" aria-expanded="false" aria-controls="dashboard">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon">
                                        <span class="fas fa-home"></span>
                                    </span>
                                    <span class="nav-link-text ps-1">Home</span>
                                </div>
                            </a>
                        </li>
                    @endif
                @endif

                <!--main menu label -->
                <li class="nav-item">
                    <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                        <div class="col-auto navbar-vertical-label">Menu</div>
                        <div class="col ps-0">
                            <hr class="mb-0 navbar-vertical-divider" />
                        </div>
                    </div>

                    <!-- Attendance -->
                    @if(auth()->user()->user_role === 'admin')
                        <a class="nav-link" href="{{ route('list') }}" role="button">
                            <div class="d-flex align-items-center">
                                <span class="nav-link-icon">
                                    <span class="fas fa-calendar-alt"></span>
                                </span>
                                <span class="nav-link-text ps-1">Attendance</span>
                            </div>
                        </a>
                    @elseif(auth()->user()->user_role === 'officer')
                        <a class="nav-link" href="{{ route('officer.list') }}" role="button">
                            <div class="d-flex align-items-center">
                                <span class="nav-link-icon">
                                    <span class="fas fa-calendar-alt"></span>
                                </span>
                                <span class="nav-link-text ps-1">Attendance</span>
                            </div>
                        </a>
                    <!-- Student -->
                    @else
                        <a class="nav-link" href="{{ route('list') }}" role="button">
                            <div class="d-flex align-items-center">
                                <span class="nav-link-icon">
                                    <span class="fas fa-calendar-alt"></span>
                                </span>
                                <span class="nav-link-text ps-1">Attendance History</span>
                            </div>
                        </a>
                    @endif
                </li>

                <li class="nav-item">
                    <!-- Fines -->
                    @if(auth()->user()->user_role === 'admin' || auth()->user()->user_role === 'officer')
                        <a class="nav-link" href="{{ url('fines.blade.php') }}" role="button">
                            <div class="d-flex align-items-center">
                                <span class="nav-link-icon">
                                    <span class="fas fa-coins"></span>
                                </span>
                                <span class="nav-link-text ps-1">Fines</span>
                            </div>
                        </a>
                    @else
                        <a class="nav-link" href="{{ url('fines.blade.php') }}" role="button">
                            <div class="d-flex align-items-center">
                                <span class="nav-link-icon">
                                    <span class="fas fa-coins"></span>
                                </span>
                                <span class="nav-link-text ps-1">Summary of Fines</span>
                            </div>
                        </a>
                    @endif
                </li>

                <li class="nav-item">
                    <!-- Activity -->
                    <a class="nav-link dropdown-indicator" href="#email" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="email">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon">
                                <span class="fab fa-buromobelexperte"></span>
                            </span>
                            <span class="nav-link-text ps-1">Activity</span>
                        </div>
                    </a>
                    <ul class="nav collapse" id="email">
                        @if(auth()->user()->user_role === 'admin')
                            <!-- Create an Activity -->
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('create') }}">
                                    <div class="d-flex align-items-center">
                                        <span class="nav-link-text ps-1">Create an Activity</span>
                                    </div>
                                </a>
                            </li>


                            <!-- Evaluation Form -->
                            <li class="nav-item">
                                <a class="nav-link" href="../app/email/email-detail.html">
                                    <div class="d-flex align-items-center">
                                        <span class="nav-link-text ps-1">Evaluation Form</span>
                                    </div>
                                </a>
                            </li>
                            <!-- Review Excuse Form -->
                            <li class="nav-item">
                                <a class="nav-link" href="../app/email/compose.html">
                                    <div class="d-flex align-items-center">
                                        <span class="nav-link-text ps-1">Review Excuse Form</span>
                                    </div>
                                </a>
                            </li>
                        @elseif(auth()->user()->user_role === 'officer')
                            <!-- Create an Activity -->
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('officer.create', Auth::user()->department_id) }}">
                                    <div class="d-flex align-items-center">
                                        <span class="nav-link-text ps-1">Create an Activity</span>
                                    </div>
                                </a>
                            </li>


                            <!-- Evaluation Form -->
                            <li class="nav-item">
                                <a class="nav-link" href="../app/email/email-detail.html">
                                    <div class="d-flex align-items-center">
                                        <span class="nav-link-text ps-1">Evaluation Form</span>
                                    </div>
                                </a>
                            </li>
                            <!-- Review Excuse Form -->
                            <li class="nav-item">
                                <a class="nav-link" href="../app/email/compose.html">
                                    <div class="d-flex align-items-center">
                                        <span class="nav-link-text ps-1">Review Excuse Form</span>
                                    </div>
                                </a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="">
                                    <div class="d-flex align-items-center">
                                        <span class="nav-link-text ps-1">Activity Details</span>
                                    </div>
                                </a>
                            </li>

                            <!-- Evaluation Form -->
                            <li class="nav-item">
                                <a class="nav-link" href="../app/email/email-detail.html">
                                    <div class="d-flex align-items-center">
                                        <span class="nav-link-text ps-1">Evaluation Form</span>
                                    </div>
                                </a>
                            </li>
                            <!-- Review Excuse Form -->
                            <li class="nav-item">
                                <a class="nav-link" href="../app/email/compose.html">
                                    <div class="d-flex align-items-center">
                                        <span class="nav-link-text ps-1">Excuse Application</span>
                                    </div>
                                </a>
                            </li>

                        @endif
                    </ul>

                <li class="nav-item">
                    @if(auth()->user()->user_role === 'admin')
                    <!-- Community -->
                    <a class="nav-link" href="{{ route('topics.index') }}" role="button">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon">
                                <span class="fas fa-comments"></span>
                            </span>
                            <span class="nav-link-text ps-1">Community</span>
                        </div>
                    </a>
                    @elseif(auth()->user()->user_role === 'officer')
                    <!-- Community -->
                    <a class="nav-link" href="{{ route('officer.topics.index') }}" role="button">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon">
                                <span class="fas fa-comments"></span>
                            </span>
                            <span class="nav-link-text ps-1">Community</span>
                        </div>
                    </a>
                    @endif
                </li>

                <li class="nav-item">
                    <!-- About -->
                    <a class="nav-link" href="../app/chat.html" role="button">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon">
                                <span class="fas fa-info-circle"></span>
                            </span>
                            <span class="nav-link-text ps-1">About</span>
                        </div>
                    </a>
                </li>
              </ul>

            </div>
          </div>
        </nav>
