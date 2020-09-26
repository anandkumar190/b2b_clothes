@extends('layouts.admin')
@section('title','Seller Profile')
@section('content')
                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Profile</h4>
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
                        <div class="row">
                            <div class="col-sm-12">
                                <!-- Profile -->
                                <div class="card bg-primary">
                                    <div class="card-body profile-user-box">
                                    <form action="{{url('update_profile')}}/{{$data->user_id}}" method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <div class="avatar-upload" style="margin:0px !important;max-width:200px">
                                                    <div class="avatar-edit">
                                                        <input type='file' name="logo" id="imageUpload" accept=".png, .jpg, .jpeg" />
                                                        <label for="imageUpload"></label>
                                                    </div>
                                                    <div class="avatar-preview">
                                                        <div id="imagePreview" style="background-image: url({{url('public/images/seller_logo')}}/{{$data->user_id}}/{{$data->logo}});">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-8" style="padding-top:20px;">
                                                <div class="media">
                                                    <div class="media-body">

                                                        <h4 class="mt-1 mb-1 text-white">{{Auth::user()->display_name}}</h4>
                                                        <p class="font-13 text-white-50">Seller</p>

                                                        <ul class="mb-0 list-inline text-light">
                                                            <li class="list-inline-item mr-3">
                                                                <h5 class="mb-1">{{$data->email}}</h5>
                                                                <p class="mb-0 font-13 text-white-50">Email</p>
                                                            </li>
                                                            <li class="list-inline-item">
                                                                <h5 class="mb-1">{{$data->contact}}</h5>
                                                                <p class="mb-0 font-13 text-white-50">Contact</p>
                                                            </li>
                                                        </ul>
                                                    </div> <!-- end media-body-->
                                                </div>
                                            </div> <!-- end col-->
                                        </div> <!-- end row -->

                                    </div> <!-- end card-body/ profile-user-box-->
                                </div><!--end profile/ card -->
                            </div> <!-- end col-->
                        </div>
                        <!-- end row -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title margin-mb">Edit Profile</h4>
                                        <ul class="nav nav-tabs nav-bordered mb-1">
                                        </ul> <!-- end nav-->
                                        <div class="tab-content">
                                            <div class="tab-pane show active" id="custom-styles-preview">

                                            
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-group mb-3">
                                                                <label for="validationCustom01">First Name</label>
                                                                <input type="text" class="form-control"
                                                                placeholder="Enter First Name" name="f_name" value="{{$data->f_name}}">
                                                            </div>  
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group mb-3">
                                                                <label for="validationCustom01">Last Name</label>
                                                                <input type="text" class="form-control"
                                                                placeholder="Enter Last Name" name="l_name" value="{{$data->l_name}}">
                                                            </div>  
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-group mb-3">
                                                                <label for="validationCustom01">Email</label>
                                                                <input type="text" class="form-control"
                                                                placeholder="Enter Email" name="email" value="{{$data->email}}" readonly>
                                                            </div>  
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group mb-3">
                                                                <label for="validationCustom01">Contact</label>
                                                                <input type="text" class="form-control"
                                                                placeholder="Enter Contact name" name="contact" value="{{$data->contact}}" readonly>
                                                            </div>  
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-group mb-3">
                                                                <label for="validationCustom01">Address</label>
                                                                <input type="text" class="form-control"
                                                                placeholder="Enter your Address" name="address" value="{{$data->address}}">
                                                            </div>  
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group mb-3">
                                                                <label for="validationCustom01">Company Name</label>
                                                                <input type="text" class="form-control"
                                                                placeholder="Enter your Company name" name="company_name" value="{{$data->company_name}}">
                                                            </div>  
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                    <div class="col-lg-3">
                                                                <div class="form-group mb-3">
                                                                    <label for="validationCustom01">Country</label>
                                                                    <select name="country" id="country" class="form-control" readonly>
                                                                        <option value="{{$data->country}}" selected>{{$data->countryname}}</option>
                                                                    </select>
                                                                </div>  
                                                            </div>
                                                            <div class="col-lg-3">
                                                                <div class="form-group mb-3">
                                                                    <label for="validationCustom01">State</label>
                                                                    <select name="state" id="state" class="form-control" readonly>
                                                                        <option value="{{$data->state}}" selected>{{$data->statename}}</option>
                                                                    </select>
                                                                </div>  
                                                            </div>
                                                            <div class="col-lg-3">
                                                                <div class="form-group mb-3">
                                                                    <label for="validationCustom01">City</label>
                                                                    <select name="" id="" class="form-control" readonly>
                                                                        <option value="{{$data->city}}" selected>{{$data->cityname}}</option>
                                                                    </select>
                                                                </div>  
                                                            </div>
                                                        <div class="col-lg-3">
                                                            <div class="form-group mb-3">
                                                                <label for="validationCustom01">ZIP Code</label>
                                                                <input type="number" class="form-control"
                                                                placeholder="Enter your ZIP Code" name="zip" value="{{$data->zip}}" readonly>
                                                            </div>  
                                                        </div>
                                                    </div>
                                                    @if($data->country == '101')
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-group mb-3">
                                                                <label for="validationCustom01">PAN Number</label>
                                                                <input type="text" class="form-control"
                                                                placeholder="PAN Number" name="pan_number" value="{{$data->pan_number}}" readonly>
                                                            </div>  
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group mb-3">
                                                                <label for="validationCustom01">GST Number</label>
                                                                <input type="text" class="form-control" id="validationCustom01"
                                                                placeholder="GST Number" name="gst_number" value="{{$data->gst_number}}" readonly>
                                                            </div>  
                                                        </div>
                                                    </div>
                                                    @endif
                                                    <button class="btn btn-primary" type="submit">Update</button>
                                                    <input type="hidden" name="old_image" value="{{$data->logo}}">
                                                @csrf
                                                </form> 

                                            </div> <!-- end preview-->
                                        </div> <!-- end tab-content-->

                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col-->
                        </div>
                        <!-- end row -->
                        
                    </div> <!-- container -->

                </div> <!-- content -->
                @endsection
@section('javascript')
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
@endsection