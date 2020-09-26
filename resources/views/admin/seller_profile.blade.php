@extends('layouts.admin')
@section('title','Seller Profile')
@section('content')
                    <!-- Start Content-->
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Seller Master</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-lg-12">
                                @if(Session::has('danger'))
                                <div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <strong>{{Session::get('danger')}}</strong> 
                                </div>
                                @endif
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title margin-mb">Seller Profile</h4>
                                        <ul class="nav nav-tabs nav-bordered mb-1">
                                        </ul> <!-- end nav-->
                                        <div class="tab-content">
                                            <div class="tab-pane show active" id="custom-styles-preview">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-group mb-3">
                                                                <label for="validationCustom01">First Name</label>
                                                                <input type="text" class="form-control"
                                                                placeholder="Enter First Name" value="{{$data->f_name}}" readonly>
                                                            </div>  
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group mb-3">
                                                                <label for="validationCustom01">Last Name</label>
                                                                <input type="text" class="form-control"
                                                                placeholder="Enter Last Name" value="{{$data->l_name}}" readonly>
                                                            </div>  
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-group mb-3">
                                                                <label for="validationCustom01">Email</label>
                                                                <input type="text" class="form-control"
                                                                placeholder="Enter Email" value="{{$data->email}}" readonly>
                                                            </div>  
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group mb-3">
                                                                <label for="validationCustom01">Contact</label>
                                                                <input type="text" class="form-control"
                                                                placeholder="Enter Contact name" value="{{$data->contact}}" readonly>
                                                            </div>  
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-group mb-3">
                                                                <label for="validationCustom01">Address</label>
                                                                <input type="text" class="form-control"
                                                                placeholder="Enter your Address" value="{{$data->address}}" readonly>
                                                            </div>  
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group mb-3">
                                                                <label for="validationCustom01">Company Name</label>
                                                                <input type="text" class="form-control"
                                                                placeholder="Enter your Company name" value="{{$data->company_name}}" readonly>
                                                            </div>  
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                       
                                                            <div class="col-lg-3">
                                                                <div class="form-group mb-3">
                                                                    <label for="validationCustom01">Country</label>
                                                                    <select name="" id="" class="form-control" readonly>
                                                                            <option value="{{$data->country}}">{{$data->countryname}}</option>
                                                                    </select>
                                                                </div>  
                                                            </div>
                                                            <div class="col-lg-3">
                                                                <div class="form-group mb-3">
                                                                    <label for="validationCustom01">State</label>
                                                                    <select name="" id="" class="form-control" readonly>
                                                                            <option value="{{$data->state}}">{{$data->statename}}</option>
                                                                    </select>
                                                                </div>  
                                                            </div>
                                                            <div class="col-lg-3">
                                                                <div class="form-group mb-3">
                                                                    <label for="validationCustom01">City</label>
                                                                    <select name="" id="" class="form-control" readonly>
                                                                            <option value="{{$data->city}}">{{$data->cityname}}</option>
                                                                    </select>
                                                                </div>  
                                                            </div>
                                                        <div class="col-lg-3">
                                                            <div class="form-group mb-3">
                                                                <label for="validationCustom01">ZIP Code</label>
                                                                <input type="number" class="form-control"
                                                                placeholder="Enter your ZIP Code" name="category_name" value="{{$data->zip}}" readonly>
                                                            </div>  
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-group mb-3">
                                                                <label for="validationCustom01">PAN Number</label>
                                                                <input type="text" class="form-control"
                                                                placeholder="PAN Number" value="{{$data->pan_number}}" readonly>
                                                            </div>  
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group mb-3">
                                                                <label for="validationCustom01">GST Number</label>
                                                                <input type="text" class="form-control" id="validationCustom01"
                                                                placeholder="GST Number" value="{{$data->gst_number}}" readonly>
                                                            </div>  
                                                        </div>
                                                    </div>
                                                    @if($data->is_active == 'Inactive')
                                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#success-header-modal">Approve</button>
                                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#danger-header-modal">Decline</button>
                                                    @elseif($data->is_active == 'Approved')
                                                    <button type="button" class="btn btn-primary">Approved</button>
                                                    @if($data->is_blocked == '1')
                                                    <button type="button" class="btn btn-danger">Blocked</button>
                                                    @else
                                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#danger-block-modal">Block</button>
                                                    @endif
                                                    @elseif($data->is_active == 'Declined')
                                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#success-header-modal">Approve</button>
                                                    <button type="button" class="btn btn-danger">Declined</button>
                                                    @endif                                          
                                            </div> <!-- end preview-->
                                        </div> <!-- end tab-content-->

                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col-->
                        </div>
                        <!-- end row -->

                    </div> <!-- container -->

                </div> <!-- content -->
                <!-- Success Header Modal -->
                <div id="success-header-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="success-header-modalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header modal-colored-header bg-success">
                                <h4 class="modal-title" id="success-header-modalLabel">Approve Seller</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <form action="{{url('update_seller')}}/{{$id}}" method="post">
                            <div class="modal-body">
                             <h4 style="text-align:center;"><i class="dripicons-checkmark h1"></i> Are you sure you want to approve the seller.</h4>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success">Approve</button>
                            </div>
                            @csrf
                            <input type="hidden" name="value" value="1">
                            </form>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
                <!--Success Modal Ends  -->

                <!-- Danger Header Modal -->
                <div id="danger-header-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="danger-header-modalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header modal-colored-header bg-danger">
                                <h4 class="modal-title" id="danger-header-modalLabel">Decline Seller</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <form action="{{url('update_seller')}}/{{$id}}" method="post">
                                <div class="modal-body">
                                    <h4 style="text-align:center;margin-bottom:15px;"><i class="dripicons-wrong h1"></i> Are you sure you want to decline the seller ?</h4>
                                    <input type="text" name="reason" id="reason" class="form-control" placeholder="Enter your reason" required>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-danger">Decline</button>
                                </div>
                                <input type="hidden" name="value" value="2">
                                @csrf
                            </form>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
                 <!-- Danger Modal Ends  -->


                  <!-- Danger block Modal -->
                <div id="danger-block-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="danger-header-modalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header modal-colored-header bg-danger">
                                <h4 class="modal-title" id="danger-header-modalLabel">Block Seller</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <form action="{{url('block_seller')}}/{{$id}}" method="post">
                                <div class="modal-body">
                                    <h4 style="text-align:center;margin-bottom:15px;"><i class="dripicons-wrong h1"></i> Are you sure you want to Block the seller ?</h4>
                                    <input type="text" name="reason" id="reason" class="form-control" placeholder="Enter your reason" required>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-danger">Decline</button>
                                </div>
                                @csrf
                            </form>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
                 <!-- Danger Modal Ends  -->
@endsection