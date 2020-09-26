@extends('layouts.admin')
@section('title','Seller Dashboard')
@section('content')

                    <!-- Start Content-->
                    <div class="container-fluid">
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Dashboard</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        <div class="row">
                        
                            <div class="col-xl-12 col-lg-6">
                            @if(Session::has('danger'))
                                <div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <strong>{{Session::get('danger')}}</strong> 
                                </div>
                                @endif
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="card widget-flat">
                                            <div class="card-body">
                                                <div class="float-right">
                                                    <i class="mdi mdi-currency-usd widget-icon"></i>
                                                </div>
                                                <h5 class="text-muted font-weight-normal mt-0" title="Average Revenue">Products</h5>
                                                <h3 class="mt-3 mb-3">{{$product}}</h3>
                                            </div> <!-- end card-body-->
                                        </div> <!-- end card-->
                                    </div> <!-- end col-->
                                </div> <!-- end row -->
                            </div> <!-- end col -->

                        </div>
                        <!-- end row -->
                    </div>
                    <!-- container -->
                </div>
                <!-- content -->
                
@endsection