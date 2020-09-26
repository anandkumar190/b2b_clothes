@extends('layouts.admin')
@section('title','Admin Dashboard')
@section('content')

                    <!-- Start Content-->
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Admin Dashboard</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-xl-12 col-lg-6">

                                <div class="row">
                                    <!-- category div starts here  -->
                                    <div class="col-lg-3">
                                        <div class="card widget-flat">
                                            <div class="card-body">
                                                <div class="float-right">
                                                    <i class="mdi mdi-currency-usd widget-icon"></i>
                                                </div>
                                                <h5 class="text-muted font-weight-normal mt-0" title="Categories">Categories</h5>
                                                <h3 class="mt-3 mb-3">{{$category}}</h3>
                                            </div> <!-- end card-body-->
                                        </div> <!-- end card-->
                                    </div> 
                                    <!-- category div ends here  -->

                                    <!-- sub category div starts here  -->
                                    <div class="col-lg-3">
                                        <div class="card widget-flat">
                                            <div class="card-body">
                                                <div class="float-right">
                                                    <i class="mdi mdi-cart-plus widget-icon"></i>
                                                </div>
                                                <h5 class="text-muted font-weight-normal mt-0" title="Number of Orders">Sub-Categories</h5>
                                                <h3 class="mt-3 mb-3">{{$subcategory}}</h3>
                                            </div> <!-- end card-body-->
                                        </div> <!-- end card-->
                                    </div>
                                    <!-- sub category div ends here  -->

                                    <!-- seller div starts here  -->
                                    <div class="col-lg-3">
                                        <div class="card widget-flat">
                                            <div class="card-body">
                                                <div class="float-right">
                                                    <i class="mdi mdi-cart-plus widget-icon"></i>
                                                </div>
                                                <h5 class="text-muted font-weight-normal mt-0" title="Number of Orders">Sellers</h5>
                                                <h3 class="mt-3 mb-3">{{$seller}}</h3>
                                            </div> <!-- end card-body-->
                                        </div> <!-- end card-->
                                    </div> 
                                     <!-- seller div ends here  -->

                                    <!-- weave div starts here  -->
                                    <div class="col-lg-3">
                                        <div class="card widget-flat">
                                            <div class="card-body">
                                                <div class="float-right">
                                                    <i class="mdi mdi-cart-plus widget-icon"></i>
                                                </div>
                                                <h5 class="text-muted font-weight-normal mt-0" title="Number of Orders">Weave</h5>
                                                <h3 class="mt-3 mb-3">{{$weave}}</h3>
                                            </div> <!-- end card-body-->
                                        </div> <!-- end card-->
                                    </div>
                                     <!-- weave div ends here  -->

                                     <!-- trade div starts here  -->
                                    <div class="col-lg-3">
                                        <div class="card widget-flat">
                                            <div class="card-body">
                                                <div class="float-right">
                                                    <i class="mdi mdi-cart-plus widget-icon"></i>
                                                </div>
                                                <h5 class="text-muted font-weight-normal mt-0" title="Number of Orders">Trade Name</h5>
                                                <h3 class="mt-3 mb-3">{{$tradeName}}</h3>
                                            </div> <!-- end card-body-->
                                        </div> <!-- end card-->
                                    </div> 
                                    <!-- trade div ends here  -->

                                    <!-- finish div starts here  -->
                                    <div class="col-lg-3">  
                                        <div class="card widget-flat">
                                            <div class="card-body">
                                                <div class="float-right">
                                                    <i class="mdi mdi-cart-plus widget-icon"></i>
                                                </div>
                                                <h5 class="text-muted font-weight-normal mt-0" title="Number of Orders">Finishes</h5>
                                                <h3 class="mt-3 mb-3">{{$finish}}</h3>
                                            </div> <!-- end card-body-->
                                        </div> <!-- end card-->
                                    </div>
                                    <!-- finish div ends here  -->

                                    <!-- colors div starts here  -->
                                    <div class="col-lg-3">
                                        <div class="card widget-flat">
                                            <div class="card-body">
                                                <div class="float-right">
                                                    <i class="mdi mdi-cart-plus widget-icon"></i>
                                                </div>
                                                <h5 class="text-muted font-weight-normal mt-0" title="Number of Orders">Colors</h5>
                                                <h3 class="mt-3 mb-3">{{$color}}</h3>
                                            </div> <!-- end card-body-->
                                        </div> <!-- end card-->
                                    </div>
                                    <!-- colors div ends here  -->

                                    <!-- blends content div starts here  -->
                                    <div class="col-lg-3">
                                        <div class="card widget-flat">
                                            <div class="card-body">
                                                <div class="float-right">
                                                    <i class="mdi mdi-cart-plus widget-icon"></i>
                                                </div>
                                                <h5 class="text-muted font-weight-normal mt-0" title="Number of Orders">Blend/Contents</h5>
                                                <h3 class="mt-3 mb-3">{{$blendContent}}</h3>
                                            </div> <!-- end card-body-->
                                        </div> <!-- end card-->
                                    </div>
                                    <!-- blends content div ends here  -->

                                    <!-- certificate div starts here  -->
                                    <div class="col-lg-3">
                                        <div class="card widget-flat">
                                            <div class="card-body">
                                                <div class="float-right">
                                                    <i class="mdi mdi-cart-plus widget-icon"></i>
                                                </div>
                                                <h5 class="text-muted font-weight-normal mt-0" title="Number of Orders">Certificates</h5>
                                                <h3 class="mt-3 mb-3">{{$certificate}}</h3>
                                            </div> <!-- end card-body-->
                                        </div> <!-- end card-->
                                    </div> 
                                    <!-- certificate div ends here  -->

                                    <!-- product div starts here  -->
                                    <div class="col-lg-3">
                                        <div class="card widget-flat">
                                            <div class="card-body">
                                                <div class="float-right">
                                                    <i class="mdi mdi-cart-plus widget-icon"></i>
                                                </div>
                                                <h5 class="text-muted ml  font-weight-normal mt-0" title="Number of Orders">Products</h5>
                                                <h3 class="mt-3 mb-3">{{$product}}</h3>
                                            </div> <!-- end card-body-->
                                        </div> <!-- end card-->
                                    </div> 
                                    <!-- product div ends here  -->

                                    <!-- Wrap div starts here  -->
                                    <div class="col-lg-3">
                                        <div class="card widget-flat">
                                            <div class="card-body">
                                                <div class="float-right">
                                                    <i class="mdi mdi-cart-plus widget-icon"></i>
                                                </div>
                                                <h5 class="text-muted ml  font-weight-normal mt-0" title="Number of Orders">Wrap Count</h5>
                                                <h3 class="mt-3 mb-3">{{$WrapCount}}</h3>
                                            </div> <!-- end card-body-->
                                        </div> <!-- end card-->
                                    </div> 
                                    <!-- Wrap div ends here  -->

                                    <!-- Weft div starts here  -->
                                    <div class="col-lg-3">
                                        <div class="card widget-flat">
                                            <div class="card-body">
                                                <div class="float-right">
                                                    <i class="mdi mdi-cart-plus widget-icon"></i>
                                                </div>
                                                <h5 class="text-muted ml  font-weight-normal mt-0" title="Number of Orders">Weft Count</h5>
                                                <h3 class="mt-3 mb-3">{{$WeftCount}}</h3>
                                            </div> <!-- end card-body-->
                                        </div> <!-- end card-->
                                    </div> 
                                    <!-- Weft div ends here  -->                                    
                                    
                                </div> <!-- end row -->
                            </div> <!-- end col -->

                        </div>
                        <!-- end row -->
                    </div>
                    <!-- container -->
                </div>
                <!-- content -->
                
@endsection