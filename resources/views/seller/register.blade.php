@extends('layouts.auth')
@section('title','Register')
@section('content')
                                
                            <div class="card-body p-4">
                                
                                <div class="text-center w-75 m-auto">
                                    <h4 class="text-dark-50 text-center mt-0 font-weight-bold">Sign In</h4>
                                    <p class="text-muted mb-4">Don't have an account? Create your account, it takes less than a minute.</p>
                                </div>

                                <form action="{{route('seller_auth_register')}}" id="seller_register" method="post" enctype="multipart/form-data" autocomplete="off">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="avatar-upload">
                                                <div class="avatar-edit">
                                                    <input type='file' id="imageUpload" name="logo" accept=".png, .jpg, .jpeg" />
                                                    <label for="imageUpload"></label>
                                                </div>
                                                <div class="avatar-preview">
                                                    <div id="imagePreview" style="background-image: url({{url('public/images/logo.png')}});">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="emailaddress">First Name</label>
                                                <input class="form-control" type="text" name="f_name" id="f_name" required placeholder="Enter your first name">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="emailaddress">Last Name</label>
                                                <input class="form-control" type="text" name="l_name" id="lastname" required placeholder="Enter your last name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="emailaddress">Email address</label>
                                                <input class="form-control" type="email" name="email" id="emailaddress" required placeholder="Enter your email" onkeyup="checkEmail()">
                                                <small style="color:red;" id="small_email"></small>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="password">Password</label>
                                                <div class="input-group input-group-merge">
                                                    <input type="password" id="password" name="password" required class="form-control" placeholder="Enter your password">
                                                    <div class="input-group-append" data-password="false">
                                                        <div class="input-group-text">
                                                            <span class="password-eye"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <label id="password-error" class="error" for="password"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                            <label for="emailaddress">Country</label>
                                            <select name="country" id="country" class="country form-control" required onchange="getState(this.value);getPhoneCode(this.value)">
                                                    <option value="">Select</option>
                                                    @foreach($countries as $country)
                                                        <option value="{{$country->id}}">{{$country->name}}</option>
                                                    @endforeach
                                            </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label for="emailaddress">State</label>
                                                <div id="state_select">
                                                    <input type="text"  class="form-control" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label for="password">City</label>
                                                <div id="city_select">
                                                    <input type="text"  class="form-control" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                            <label for="emailaddress">ZIP Code</label>
                                            <input class="form-control" type="number" name="zip" id="zip" required placeholder="Enter your ZIP Code">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                            <label for="emailaddress">Contact</label>
                                            <div class="input-group input-group-merge">
                                                <div class="input-group-append" data-password="false">
                                                    <div class="input-group-text">
                                                        <span id="country_code"></span>
                                                    </div>
                                                </div>
                                            <input class="form-control" type="text" name="contact" id="contact" required placeholder="Enter your mobile number" onkeyup="checkContact()">
                                             </div>
                                             <label id="contact-error" class="error" for="contact" style=""></label>
                                            <small style="color:red;" id="small_contact"></small>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                            <label for="emailaddress">Addess</label>
                                            <input class="form-control" type="text" name="address" id="address" required placeholder="Enter your Address">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-9">
                                            <div class="form-group">
                                            <label for="companyname">Company Name</label>
                                            <input class="form-control" type="text" name="company_name" id="company_name" required placeholder="Enter your Company Name">
                                            </div>
                                        </div>
                                        <div class="col-lg-3" id="currency_div" style="display:none;">
                                            <div class="form-group">
                                            <label for="companyname">Currency</label>
                                            <select name="currency" id="currency" class="form-control">
                                                <option value="" selected="true" disabled>Select</option>
                                                <option value="EURO">EURO</option>
                                                <option value="USD">USD</option>
                                            </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" id="panId" style="display:none;">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                            <label for="pannumber">PAN Number</label>
                                            <input class="form-control" type="text" name="pan_number" id="pan_number" required placeholder="Enter your PAN Number">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                            <label for="pannumber">PAN File</label>
                                            <input class="form-control" type="file" name="pan_file" id="pan_file" required placeholder="Enter your PAN Number">
                                            </div>  
                                        </div>
                                    </div>
                                    <div class="row" id="gstId" style="display:none;">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                            <label for="companyname">GST Number</label>
                                            <input class="form-control" type="text" name="gst_number" id="gst_number" required placeholder="Enter your Company Name">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                            <label for="pannumber">GST File</label>
                                            <input class="form-control" type="file" name="gst_file" id="gst_file" required placeholder="Enter your PAN Number">
                                            </div>  
                                        </div>
                                    </div>
                                    <div class="form-group mb-0 text-center">
                                        <button class="btn btn-primary" type="submit" id="submit_button"> Register </button>
                                    </div>
                                    @csrf
                                </form>
                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                        <div class="row mt-3">
                            <div class="col-12 text-center">
                                <p class="text-muted">Already have account? <a href="{{url('login')}}" class="text-muted ml-1"><b>Login In</b></a></p>
                            </div> <!-- end col -->
                        </div>
@endsection
@section('javascript')

$(document).ready(function() {
    $('.country').select2();
});

$.validator.setDefaults({
        submitHandler : function(form) {
            form.submit();
        }
    });
    $("#seller_register").validate({
            rules: {
                logo: "required",
                f_name: "required",
                l_name: "required",
                email: {
                required: true,
                email: true
                },
                contact: {
                    number:true,
                    minlength:10,
                    maxlength:10,
                },
                password: {
                    required: true,
                    minlength: 8,
                },
                address: "required",
                city: "required",
                state: "required",
                country: "required",
                zip: "required",
                company_name: "required",
            },

            messages: {
                logo: "* Select Logo",
                f_name: "* Enter First Name",
                l_name: "* Enter Last Name",
                pan_file: "* Upload PAN File",
                gst_file: "* Upload GST File",
                email: {
                    required: "* Enter your Email",
                    email: "* Enter valid Email",
                },
                contact: {
                    required: "* Enter your Contact",
                    minlength: "* Please enter a valid Contact",
                    maxlength: "* Please enter a valid Contact",
                },
                password: {
                    required: "* Enter your Password",
                    minlength: "* Password must be at least of 8 characters",
                },
                address: "* Enter Address",
                city: "* Select City",
                state: "* Select State",
                country: "* Select Country",
                zip: "* Enter Zip Code",
                company_name: "* Enter Company Name",
                pan_number: {
                    required: "* Enter your PAN Number",
                    minlength: "* Please enter a valid PAN Number",
                    maxlength: "* Please enter a valid PAN Number",
                },
                gst_number: {
                    required: "* Enter your GST Number",
                    minlength: "* Please enter a valid GST Number",
                    maxlength: "* Please enter a valid GST Number",
                },

            }
        });

function getState(val)
{   
    $.ajax({
        url: "{{route('findState')}}",
        type: "post",
        data: { 'val' : val, '_token': '{{ csrf_token() }}'},
        success: function(data)
        {
            $('#state_select').html(data);
        }
        });
    if(val == '101')
    {
        $('#panId').show();
        $('#gstId').show();
    }
    else
    {
        $('#panId').hide();
        $('#gstId').hide();
        $('#currency_div').show();
    }
}

function getPhoneCode(val)
{   
    $.ajax({
        url: "{{route('findPhoneCode')}}",
        type: "post",
        data: { 'val' : val, '_token': '{{ csrf_token() }}'},
        success: function(data)
        {
            $('#country_code').html('+'+data);
        }
        });
}
function getCity(val)
{   
    $.ajax({
        url: "{{route('findCity')}}",
        type: "post",
        data: { 'val' : val, '_token': '{{ csrf_token() }}'},
        success: function(data)
        {
            $('#city_select').html(data);
        }
        });
}
@endsection
