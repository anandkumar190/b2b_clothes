<!DOCTYPE html>
<html lang="en">
    
<head>
        <meta charset="utf-8" />
        <title>@yield('title','Auth')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{url('public/admin/images/favicon.ico')}}">
        <!-- App css -->
        <link href="{{url('public/admin/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{url('public/admin/css/app.min.css')}}" rel="stylesheet" type="text/css" id="light-style" />
        <link href="{{url('public/admin/css/app-dark.min.css')}}" rel="stylesheet" type="text/css" id="dark-style" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="{{url('public/admin/css/select2.css')}}" rel="stylesheet" />
    </head>

    <body class="loading authentication-bg" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
        <div class="account-pages mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                        <div class="col-lg-7">
                            @if(Session::has('success'))
                            <div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <strong>{{Session::get('success')}}</strong> 
                            </div>
                            @endif
                        </div>
                        @if($type == '1')
                        <div class="col-lg-offset-3 col-lg-6 col-lg-offset-3">
                        @elseif($type == '2')
                        <div class="col-lg-12">
                        @endif
                        <div class="card">

                            <!-- Logo -->
                            <div class="card-header pt-4 pb-4 text-center bg-primary">
                                <a href="index.html">
                                    <span><img src="{{url('public/admin/images/logo.png')}}" alt="" height="18"></span>
                                </a>
                            </div>

                            @yield('content')

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

        <!-- bundle -->
        <script src="{{url('public/admin/js/vendor.min.js')}}"></script>
        <script src="{{url('public/admin/js/app.min.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
        <script>
            @yield('javascript')
            @yield('javascript_section')
        </script>
    </body>
    <script>
        function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#imagePreview').css('background-image', 'url('+e.target.result +')');
            $('#imagePreview').hide();
            $('#imagePreview').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#imageUpload").change(function() {
    readURL(this);
});
    </script>

</html>
