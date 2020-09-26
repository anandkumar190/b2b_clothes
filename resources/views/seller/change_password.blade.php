@extends('layouts.admin')
@section('title','Seller Profile')
@section('content')
                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Update Password</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        @if(Session::has('success'))
                        <div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                            <strong>{{Session::get('success')}}</strong> 
                        </div>
                        @endif
                        @if(Session::has('danger'))
                        <div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                            <strong>{{Session::get('danger')}}</strong> 
                        </div>
                        @endif
                        <form id="change_password" action="{{url('update_password')}}/{{base64_encode($id)}}" method="post">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title margin-mb">Update Password</h4>
                                        <ul class="nav nav-tabs nav-bordered mb-1">
                                        </ul> <!-- end nav-->
                                        <div class="tab-content">
                                            <div class="tab-pane show active" id="custom-styles-preview">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="form-group mb-3">
                                                                <label for="validationCustom01">Old Password</label>
                                                                <div class="input-group input-group-merge">
                                                                    <input type="password" class="form-control"
                                                                    placeholder="Enter Old Password" name="old_password" id="old_password">
                                                                    <div class="input-group-append" data-password="false">
                                                                        <div class="input-group-text">
                                                                            <span class="password-eye"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <label id="old_password-error" class="error" for="old_password"></label>
                                                            </div>  
                                                        </div>
                                                    </div>
                                                     <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="form-group mb-3">
                                                                <label for="validationCustom01">New Password</label>
                                                                <div class="input-group input-group-merge">
                                                                    <input type="password" class="form-control"
                                                                    placeholder="Enter New Password" name="new_password" id="new_password" oncopy="return false" onpaste="return false">
                                                                    <div class="input-group-append" data-password="false">
                                                                        <div class="input-group-text">
                                                                            <span class="password-eye"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <label id="new_password-error" class="error" for="new_password"></label>
                                                            </div>  
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="form-group mb-3">
                                                                <label for="validationCustom01">Confirm Password</label>
                                                                <div class="input-group input-group-merge">
                                                                    <input type="password" class="form-control"
                                                                    placeholder="Enter New Password" name="confirm_new_password" id="confirm_new_password">
                                                                </div>
                                                                <label id="confirm_new_password-error" class="error" for="confirm_new_password"></label>
                                                            </div>  
                                                        </div>
                                                    </div>
                                                    <button class="btn btn-primary" type="submit">Update</button>
                                                @csrf
                                                </form> 
                                            </div> <!-- end preview-->
                                        </div> <!-- end tab-content-->
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col-->
                        </div>
                    </div> <!-- container -->
                </div> <!-- content -->
                @endsection
@section('javascript')
$.validator.setDefaults({
        submitHandler : function(form) {
            form.submit();
        }
    });
    $("#change_password").validate({
            rules: {
                old_password: "required",
                new_password:
                {
                    required: true,
                    minlength: 8
                },
                confirm_new_password: {
                    required : true,
                    minlength: 8,
                    equalTo : "#new_password"
                },
            },
            messages: {
                old_password: "* Enter Old Password",
                new_password: {
                    required: "* Enter New Password",
                    minlength: "* Password must be at least of 8 characters",
                },
                confirm_new_password: {
                    required: "* This field is required",
                    minlength: "* Password must be at least of 8 characters",
                },
            }
        });
@endsection