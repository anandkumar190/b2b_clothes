<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8" />
        <title>Seller Blocked</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="" name="description" />
        <meta content="Coderthemes" name="author" />
        <link rel="shortcut icon" href="assets/images/favicon.ico">
        <link href="{{url('public/admin/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{url('public/admin/css/app.min.css')}}" rel="stylesheet" type="text/css" id="light-style" />
        <link href="{{url('public/admin/css/app-dark.min.css')}}" rel="stylesheet" type="text/css" id="dark-style" />

    </head>

    <body class="loading authentication-bg" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>

        <div class="account-pages mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="card">
                            <!-- Logo -->
                            <div class="card-header pt-4 pb-4 text-center bg-primary">
                                    <span><img src="{{url('public/admin/images/logo.png')}}" alt="" height="18"></span>
                            </div>
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <h1 class="text-error">BL<i class="mdi mdi-emoticon-sad"></i>CK</h1>
                                    <h4 class="text-uppercase text-danger mt-3">Your Account has been blocked</h4>
                                    <p class="text-muted mt-3">Please contact with admin to unblock the account for further access.</p>
                                    <p>Mail to - <strong><a href="mailto:robil.sharma38@gmail.com">robil.sharma38@gmail.com</a> </strong></p>
                                </div>
                            </div> <!-- end card-body-->
                        </div>
                        <!-- end card -->
                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->
        <footer class="footer footer-alt">
        @php echo date('Y'); @endphp © Hyper
        </footer>
        <script src="{{url('public/admin/js/vendor.min.js')}}"></script>
        <script src="{{url('public/admin/js/app.min.js')}}"></script>
    </body>
</html>
