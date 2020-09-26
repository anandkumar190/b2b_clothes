@extends('layouts.admin')
@section('title','Create Sub-Category')
@section('content')
                    <!-- Start Content-->
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Sub-Category Master</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title margin-mb">Add Sub-Category</h4>
                                        <ul class="nav nav-tabs nav-bordered mb-1">
                                        </ul> <!-- end nav-->
                                        <div class="tab-content">
                                            <div class="tab-pane show active" id="custom-styles-preview">
                                                <form id="add_subcategory" action="{{route('subcategory.store')}}" method="post">
                                                @include('admin.subcategory.form')
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
    $("#add_subcategory").validate({

            rules: {
                category_id: "required",
                sub_category_name: "required",
            },

            messages: {
                category_id: "* Select Category",
                sub_category_name: "* Enter Sub-Category name",
            }
        });
@endsection