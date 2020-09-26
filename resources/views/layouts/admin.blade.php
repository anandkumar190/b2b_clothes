<!DOCTYPE html>
    <html lang="en">
<head>
        <meta charset="utf-8" />
        <title>@yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{url('public/admin/images/favicon.ico')}}">
        <!-- third party css -->
        <link href="{{url('public/admin/css/vendor/dataTables.bootstrap4.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{url('public/admin/css/vendor/responsive.bootstrap4.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{url('public/admin/css/vendor/buttons.bootstrap4.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{url('public/admin/css/vendor/select.bootstrap4.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{url('public/admin/css/vendor/jquery-jvectormap-1.2.2.css')}}" rel="stylesheet" type="text/css" />
        <!-- third party css end -->
        <!-- App css -->
        <link href="{{url('public/admin/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{url('public/admin/css/app.min.css')}}" rel="stylesheet" type="text/css" id="light-style" />
        <link href="{{url('public/admin/css/app-dark.min.css')}}" rel="stylesheet" type="text/css" id="dark-style" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

    <body class="loading" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
        <!-- Begin page -->
        <div class="wrapper">
            <!-- ========== Left Sidebar Start ========== -->
          

            <div class="left-side-menu">
    
                    <!-- LOGO -->
                    <a href="index.html" class="logo text-center logo-light">
                        <span class="logo-lg">
                            <img src="assets/images/logo.png" alt="" height="16">
                        </span>
                        <span class="logo-sm">
                            <img src="assets/images/logo_sm.png" alt="" height="16">
                        </span>
                    </a>

                    <!-- LOGO -->
                    <a href="index.html" class="logo text-center logo-dark">
                        <span class="logo-lg">
                            <img src="assets/images/logo-dark.png" alt="" height="16">
                        </span>
                        <span class="logo-sm">
                            <img src="assets/images/logo_sm_dark.png" alt="" height="16">
                        </span>
                    </a>

                    <div class="h-100" id="left-side-menu-container" data-simplebar>
                        <!--- Sidemenu -->
                        <ul class="metismenu side-nav">
                            <li class="side-nav-title side-nav-item">Navigation</li>
                            @if(Auth()->user()->user_type == '1')
                            <li class="side-nav-item">
                                <a href="{{route('admin_index')}}" class="side-nav-link" aria-expanded="false">
                                    <i class="uil-home-alt"></i>
                                    <span> Dashboard </span>
                                </a>
                            </li>
                            <li class="side-nav-item">
                                <a href="javascript: void(0);" class="side-nav-link" aria-expanded="false">
                                    <i class="uil-store"></i>
                                    <span> Master Data </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="side-nav-second-level mm-collapse" aria-expanded="false">
                                    <li>
                                        <a href="{{route('category.index')}}">Category</a>
                                    </li>
                                    <li>
                                        <a href="{{route('subcategory.index')}}">Sub-Category</a>
                                    </li>
                                    <li>
                                        <a href="{{route('weave.index')}}">Weave</a>
                                    </li>
                                    <li>
                                        <a href="{{route('tradename.index')}}">Trade Name</a>
                                    </li>
                                    <li>
                                        <a href="{{route('finish.index')}}">Finish</a>
                                    </li>
                                    <li>
                                        <a href="{{route('color.index')}}">Color</a>
                                    </li>
                                    <li>
                                        <a href="{{route('blendContent.index')}}">Blend/Content</a>
                                    </li>
                                    <li>
                                        <a href="{{route('certificate.index')}}">Certificate</a>
                                    </li>
                                    <li>
                                        <a href="{{route('price.index')}}">Price</a>
                                    </li>
                                    <li>
                                        <a href="{{route('price.index')}}">Price</a>
                                    </li>
                                    <li>
                                        <a href="{{route('wrapCount.index')}}">Wrap Count</a>
                                    </li>
                                    <li>
                                        <a href="{{route('weftCount.index')}}">Weft Count</a>
                                    </li>
                                    <li>
                                        <a href="{{route('quantity.index')}}">Quantity</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="side-nav-item">
                                <a href="javascript: void(0);" class="side-nav-link" aria-expanded="false">
                                    <i class="uil-user"></i>
                                    <span> User Management </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="side-nav-second-level mm-collapse" aria-expanded="false" style="height: 0px;">
                                    <li>
                                        <a href="{{route('seller_listing')}}">Seller</a>
                                    </li>
                                </ul>
                            </li>
                            @else
                            <li class="side-nav-item">
                                <a href="{{route('seller_dashboard')}}" class="side-nav-link">
                                    <i class="uil-home-alt"></i>
                                    <span> Dashboard </span>
                                </a>
                            </li>
                            <li class="side-nav-item">
                                <a href="{{route('product.index')}}" class="side-nav-link">
                                    <i class="uil-briefcase"></i>
                                    <span> Products </span>
                                </a>
                            </li>
                            <li class="side-nav-item">
                                <a href="" class="side-nav-link">
                                    <i class="uil-briefcase"></i>
                                    <span> Orders </span>
                                </a>
                            </li>
                            @endif
                        </ul>

                        <div class="clearfix"></div>

                    </div>
                    <!-- Sidebar -left -->

                </div>


            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">
                    <!-- Topbar Start -->
                    <div class="navbar-custom">
                        <ul class="list-unstyled topbar-right-menu float-right mb-0">
                            <li class="dropdown notification-list">
                                <a class="nav-link dropdown-toggle nav-user arrow-none mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                                    aria-expanded="false">
                                    <span class="account-user-avatar"> 
                                        <img src="{{url('public/admin/images/users/avatar-1.jpg')}}" alt="user-image" class="rounded-circle">
                                    </span>
                                    <span>
                                        <span class="account-user-name">{{Auth::user()->display_name}}</span>
                                        @if(Auth::user()->user_type =='1')
                                        <span class="account-position">Admin</span>
                                        @else
                                        <span class="account-position">Seller</span>
                                        @endif
                                    </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated topbar-dropdown-menu profile-dropdown">
                                    <!-- item-->
                                    <!-- item-->
                                    @if(Auth::user()->user_type == '2')  
                                    <a href="{{url('seller_profile')}}" class="dropdown-item notify-item">
                                        <i class="mdi mdi-account-circle mr-1"></i>
                                        <span>Manage Profile</span>
                                    </a>
                                    @else
                                    <a href="{{url('admin_profile')}}" class="dropdown-item notify-item">
                                        <i class="mdi mdi-account-circle mr-1"></i>
                                        <span>Manage Profile</span>
                                    </a>
                                    @endif
                                    <!-- item-->
                                    <a href="{{url('change_password')}}/{{base64_encode(Auth::user()->id)}}" class="dropdown-item notify-item">
                                        <i class="mdi mdi-account-edit mr-1"></i>
                                        <span>Change Password</span>
                                    </a>
                                    <!-- item-->

                                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();" class="dropdown-item notify-item">
                                        <i class="mdi mdi-logout mr-1"></i>
                                        <span>Logout</span>
                                        <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!-- end Topbar -->
            @yield('content')
            <!-- Footer Start -->
            <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                @php echo date('Y'); @endphp © Hyper
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- end Footer -->
            </div>
            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->
        </div>
        <!-- END wrapper -->

        <!-- bundle -->
        <script src="{{url('public/admin/js/vendor.min.js')}}"></script>
        <script src="{{url('public/admin/js/app.min.js')}}"></script>

        <!-- third party js -->
        <script src="{{url('public/admin/js/vendor/jquery.dataTables.min.js')}}"></script>
        <script src="{{url('public/admin/js/vendor/dataTables.bootstrap4.js')}}"></script>
        <script src="{{url('public/admin/js/vendor/dataTables.responsive.min.js')}}"></script>
        <script src="{{url('public/admin/js/vendor/responsive.bootstrap4.min.js')}}"></script>
        <script src="{{url('public/admin/js/vendor/dataTables.buttons.min.js')}}"></script>
        <script src="{{url('public/admin/js/vendor/buttons.bootstrap4.min.js')}}"></script>
        <script src="{{url('public/admin/js/vendor/buttons.html5.min.js')}}"></script>
        <script src="{{url('public/admin/js/vendor/buttons.flash.min.js')}}"></script>
        <script src="{{url('public/admin/js/vendor/buttons.print.min.js')}}"></script>
        <script src="{{url('public/admin/js/vendor/dataTables.keyTable.min.js')}}"></script>
        <script src="{{url('public/admin/js/vendor/dataTables.select.min.js')}}"></script>
        <script src="{{url('public/admin/js/vendor/apexcharts.min.js')}}"></script>
        <script src="{{url('public/admin/js/vendor/jquery-jvectormap-1.2.2.min.js')}}"></script>
        <script src="{{url('public/admin/js/vendor/jquery-jvectormap-world-mill-en.js')}}"></script>
        <!-- third party js ends -->

        <!-- demo app -->
        <script src="{{url('public/admin/js/pages/demo.datatable-init.js')}}"></script>
        <script src="{{url('public/admin/js/pages/demo.dashboard.js')}}"></script>
        <script src="{{url('public/admin/js/pages/demo.profile.js')}}"></script>
        <!-- end demo js-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js"></script>
        <script>
         @yield('javascript')
      </script>
    </body>
</html>