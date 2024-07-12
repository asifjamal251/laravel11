<!doctype html>
<html lang="en">
<head>

    <meta charset="utf-8" />
    <title>{{get_app_setting('title')}} | {{Str::title(str_replace('-', ' ', request()->segment(2)))}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    {{-- <link rel="manifest" href="/manifest.json"> --}}

    <!-- App favicon -->
    <link rel="shortcut icon" href="admin-assets/images/favicon.ico">

    <!-- Layout config Js -->
  
    <!-- Bootstrap Css -->
    <link href="{{asset('admin-assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{asset('admin-assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{asset('admin-assets/css/app.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="{{asset('admin-assets/css/custom.min.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

</head>

<body>

    <div class="auth-page-wrapper pt-5">
        <!-- auth page bg -->
        <div class="auth-one-bg-position auth-one-bg" id="auth-particles">
            <div class="bg-overlay"></div>

            <div class="shape">
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1440 120">
                    <path d="M 0,36 C 144,53.6 432,123.2 720,124 C 1008,124.8 1296,56.8 1440,40L1440 140L0 140z"></path>
                </svg>
            </div>
        </div>

        <!-- auth page content -->
        <div class="auth-page-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center mt-sm-5 mb-4 text-white-50">
                            <div>
                                <a href="index-2.html" class="d-inline-block auth-logo">
                                    <img src="{{asset(get_app_setting('logo')??'assets/images/logo-light.png')}}" alt="" height="20">
                                </a>
                            </div>
                            <p class="mt-3 fs-15 fw-medium">Power by AR Technology</p>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">

                       

                        <div class="card mt-4">

                             @if (Session::has('message') && Session::get('class') == 'error')
                                   <div style="z-index: 11">
                                    <div style="border:none;border-radius: 0;" id="borderedToast4" class="toast toast-border-danger overflow-hidden show w-100" role="alert" aria-live="assertive" aria-atomic="true">
                                        <div class="toast-body">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0 me-2">
                                                    <i class="ri-alert-line align-middle"></i>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="mb-0">{{Session::get('message')}}</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif

                            <div class="card-body p-4">
                                <div class="text-center mt-2">
                                    <h5 class="text-primary">Welcome Back !</h5>
                                    <p class="text-muted">Sign in to continue to Velzon.</p>
                                </div>
                                <div class="p-2 mt-4">
                                    

<<<<<<< HEAD
                                    {{ html()->form('POST')->route('admin.login.post')->open() }}

                                        <div class="mb-3 {{ $errors->has('email') ? ' has-error' : '' }}">
                                            {{html()->label('Email')->for('email')->class('form-label')}}
                                            {{html()->email('email')->class('form-control')->id('email')->placeholder('Email')}}
                                            <small class="text-danger">{{ $errors->first('email') }}</small>
                                        </div>


                                        <div class="mb-3 {{ $errors->has('password') ? ' has-error' : '' }}">
                                            {{html()->label('Password')->for('password')->class('form-label')}}
                                            <div class="position-relative auth-pass-inputgroup mb-3">
                                                {{html()->password('password')->class('form-control')->id('email')->placeholder('Password')}}
                                                <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                                                <small class="text-danger">{{ $errors->first('password') }}</small>
=======
                                    <form action="https://themesbrand.com/velzon/html/saas/index.html">

                                        <div class="mb-3">
                                            <label for="username" class="form-label">Username</label>
                                            <input type="text" class="form-control" id="username" placeholder="Enter username">
                                        </div>

                                        <div class="mb-3">
                                            <div class="float-end">
                                                <a href="auth-pass-reset-basic.html" class="text-muted">Forgot password?</a>
                                            </div>
                                            <label class="form-label" for="password-input">Password</label>
                                            <div class="position-relative auth-pass-inputgroup mb-3">
                                                <input type="password" class="form-control pe-5 password-input" placeholder="Enter password" id="password-input">
                                                <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
>>>>>>> origin/main
                                            </div>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="auth-remember-check">
                                            <label class="form-check-label" for="auth-remember-check">Remember me</label>
                                        </div>

                                        <div class="mt-4">
                                            <button class="btn btn-success w-100" type="submit">Sign In</button>
                                        </div>
<<<<<<< HEAD
                                    {{ html()->form()->close() }}
=======
                                    </form>
>>>>>>> origin/main

                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->

                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end auth page content -->

        <!-- footer -->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <p class="mb-0 text-muted">&copy;
                               Medicos. Crafted with <i class="mdi mdi-heart text-danger"></i> by AR Technology
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->
    </div>
    <!-- end auth-page-wrapper -->

    <!-- JAVASCRIPT -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{asset('admin-assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('admin-assets/libs/simplebar/simplebar.min.js')}}"></script>
    <script src="{{asset('admin-assets/libs/node-waves/waves.min.js')}}"></script>
    <script src="{{asset('admin-assets/libs/feather-icons/feather.min.js')}}"></script>
    <script src="{{asset('admin-assets/js/pages/plugins/lord-icon-2.1.0.js')}}"></script>
    <script src="{{asset('admin-assets/js/pages/password-addon.init.js')}}"></script>
<<<<<<< HEAD
    <script src="{{asset('admin-assets/js/pages/password-addon.init.js')}}"></script>
=======
>>>>>>> origin/main
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

    @if (Session::has('message'))
        <script type="text/javascript">
            Toastify({
                text: "{{Session::get('message')}}",
                duration: 3000,
                close: true,
                gravity: "top", // `top` or `bottom`
                position: "right", // `left`, `center` or `right`
                stopOnFocus: true, // Prevents dismissing of toast on hover
                className: "{{Session::get('class')}}",

            }).showToast();
           // Command: toastr["{{Session::get('class')}}"](" {{Session::get('message')}}")
        </script>
    @endif
</body>
</html>