@extends('layouts.auth')
@section('title','Login')
@section('content')

                            <div class="card-body p-4">
                                
                                <div class="text-center w-75 m-auto">
                                    <h4 class="text-dark-50 text-center mt-0 font-weight-bold">Sign In</h4>
                                    <p class="text-muted mb-4">Enter your email address and password to access seller panel.</p>
                                </div>
                                

                                <form action="{{url('seller_auth_login')}}" method="post" id="admin_login">

                                    <div class="form-group">
                                        <label for="emailaddress">Email address</label>
                                        <input class="form-control" type="email" name="email" id="emailaddress" required placeholder="Enter your email">
                                    </div>

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

                                    <div class="form-group mb-0 text-center">
                                        <button class="btn btn-primary" type="submit"> Log In </button>
                                    </div>
                                @csrf
                                </form>
                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                        <div class="row mt-3">
                            <div class="col-12 text-center">
                                <p class="text-muted">Don't have an account? <a href="{{url('register')}}" class="text-muted ml-1"><b>Sign Up</b></a></p>
                            </div> <!-- end col -->
                        </div>
@endsection
@section('javascript')
$.validator.setDefaults({
        submitHandler : function(form) {
            form.submit();
        }
    });
    $("#admin_login").validate({

            rules: {
                email: {
                required: true,
                email: true
                },
                password: {
                    required: true,
                },
            },

            messages: {
                email: {
                    required: "* Enter your Email",
                    email: "* Enter valid Email",
                },
                password: {
                    required: "* Enter your Password",
                },
            }
        });
@endsection