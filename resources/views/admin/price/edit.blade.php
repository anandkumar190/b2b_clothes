@extends('layouts.admin')
@section('title','Edit Price Rate')
@section('content')
                    <!-- Start Content-->
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Price Rate Master</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title margin-mb">Edit Price Rate</h4>
                                        <ul class="nav nav-tabs nav-bordered mb-1">
                                        </ul> <!-- end nav-->
                                        <div class="tab-content">
                                            <div class="tab-pane show active" id="custom-styles-preview">
                                                <form id="edit_price" action="{{url('price')}}/{{$id}}" method="post">
                                                @method('PATCH')
                                                @include('admin.price.form')
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
$.validator.setDefaults({
        submitHandler : function(form) {
            form.submit();
        }
    });
    $("#edit_price").validate({

            rules: {
                price_name: "required",
                price_rate : {
                    required: true,
                    number: true,
                }
            },

            messages: {
                price_name: "* Enter Price Name",
                price_rate : {
                    required: "* Enter your Price Rate",
                    number: "* Enter Valid Rate",
                }
            }
        });
@endsection