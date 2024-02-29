<!DOCTYPE html>
<html data-bs-theme="light" lang="en-US" dir="ltr">

  
<!-- Mirrored from prium.github.io/falcon/v3.19.0/pages/authentication/split/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 22 Nov 2023 06:21:13 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- ===============================================--><!--    Document Title--><!-- ===============================================-->
    <title>AFMAMS | Login</title>

    <!-- ===============================================--><!--    Favicons--><!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/img/favicons/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/img/favicons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/img/favicons/favicon-16x16.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicons/favicon.ico') }}">
    <link rel="manifest" href="{{ asset('assets/img/favicons/manifest.json') }}">
    <meta name="msapplication-TileImage" content="{{ asset('assets/img/favicons/mstile-150x150.png') }}">
    <meta name="theme-color" content="#ffffff">
    <script src="{{ asset('assets/js/config.js') }}"></script>
    <script src="{{ asset('vendors/simplebar/simplebar.min.js') }}"></script>


    <!-- ===============================================--><!--    Stylesheets--><!-- ===============================================-->
    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700%7cPoppins:300,400,500,600,700,800,900&amp;display=swap" rel="stylesheet">
    <link href="{{ asset('vendors/simplebar/simplebar.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/theme-rtl.min.css') }}" rel="stylesheet" id="style-rtl">
    <link href="{{ asset('assets/css/theme.min.css') }}" rel="stylesheet" id="style-default">
    <link href="{{ asset('assets/css/user-rtl.min.css') }}" rel="stylesheet" id="user-style-rtl">
    <link href="{{ asset('assets/css/user.min.css') }}" rel="stylesheet" id="user-style-default">

  </head>

  <body>
    <!-- ===============================================--><!--    Main Content--><!-- ===============================================-->
    <main class="main" id="top">
      <div class="container-fluid">
        <script>
          var isFluid = JSON.parse(localStorage.getItem('isFluid'));
          if (isFluid) {
            var container = document.querySelector('[data-layout]');
            container.classList.remove('container');
            container.classList.add('container-fluid');
          }
        </script>
        <div class="row min-vh-100 bg-100">
          <div class="col-6 d-none d-lg-block position-relative">
          <div class="bg-holder" style="background-image:url(<?php echo 'assets/img/generic/14.jpg' ?>); background-position: 50% 20%;"></div><!--/.bg-holder-->
          </div>
          <div class="col-sm-10 col-md-6 px-sm-0 align-self-center mx-auto py-5">
            <div class="row justify-content-center g-0">
              <div class="col-lg-9 col-xl-8 col-xxl-6">

                @if(session()->has("success"))
              <div class="alert alert-success">
              {{session()->get("success")}}
              </div>
            @endif
            @if(session()->has("error"))
              <div class="alert alert-success">
              {{session()->get("error")}}
              </div>
            @endif

                <div class="card">
                  <div class="card-header bg-circle-shape bg-shape text-center p-2"><a class="font-sans-serif fw-bolder fs-5 z-1 position-relative link-light" href="" data-bs-theme="light">AFMAMS</a></div>

                  
                  <div class="card-body p-4">
                    <div class="row flex-between-center">
                      <div class="col-auto">
                        <h3>Log In</h3>
                      </div>
                    </div>
                    <form method="POST" action="{{route("login.post")}}">
                      @csrf 

                      <div class="mb-3"><label class="form-label" for="split-login-username">Student ID</label><input class="form-control" id="split-login-username" type="text" name="name" />
                        @if ($errors->has('name'))
                        <span class="text-danger">
                        {{$errors->first('student-id')}}</span>
                        @endif
                      </div>
                      <div class="mb-3">
                        <div class="d-flex justify-content-between"><label class="form-label" for="split-login-password">Password</label></div><input class="form-control" id="split-login-password" type="password" name="password" required/>
                        @if ($errors->has('password'))
                        <span class="text-danger">
                        {{$errors->first('password')}}</span>
                        @endif
                      </div>
                      <div class="row flex-between-center">
                        <div class="col-auto">
                          <div class="form-check mb-0"><input class="form-check-input" type="checkbox" id="split-checkbox" /><label class="form-check-label mb-0" for="split-checkbox">Remember me</label></div>
                        </div>
                        <div class="col-auto"><a class="fs-10" href="forgot-password.html">Forgot Password?</a></div>
                      </div>
                      <div class="mb-3"><button class="btn btn-primary d-block w-100 mt-3" type="submit" name="submit">Log in</button></div>
                    </form>

                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main><!-- ===============================================--><!--    End of Main Content--><!-- ===============================================-->

    
    <!-- ===============================================--><!--    JavaScripts--><!-- ===============================================-->
    <script src="{{ asset('vendors/popper/popper.min.js') }}"></script>
    <script src="{{ asset('vendors/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendors/anchorjs/anchor.min.js') }}"></script>
    <script src="{{ asset('vendors/is/is.min.js') }}"></script>
    <script src="{{ asset('vendors/fontawesome/all.min.js') }}"></script>
    <script src="{{ asset('vendors/lodash/lodash.min.js') }}"></script>
    <script src="{{ asset('polyfill.io/v3/polyfill.min58be.js?features=window.scroll') }}"></script>
    <script src="{{ asset('vendors/list.js/list.min.js') }}"></script>
    <script src="{{ asset('assets/js/theme.js') }}"></script>

  </body>


<!-- Mirrored from prium.github.io/falcon/v3.19.0/pages/authentication/split/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 22 Nov 2023 06:21:13 GMT -->
</html>