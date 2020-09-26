@extends('layouts.admin')
@section('title','Edit Blend Content Name')
@section('content')
                    <!-- Start Content-->
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Blend Content Master</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title margin-mb">Edit Blend Content Name</h4>
                                        <ul class="nav nav-tabs nav-bordered mb-1">
                                        </ul> <!-- end nav-->
                                        <div class="tab-content">
                                            <div class="tab-pane show active" id="custom-styles-preview">
                                                <form id="edit_blend" action="{{url('blendContent')}}/{{$id}}" method="post">
                                                @method('PATCH')
                                                @include('admin.blendContent.form')
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
    $("#edit_blend").validate({

            rules: {
                blend_content_name: "required",
            },

            messages: {
                blend_content_name: "* Enter Blend Name",
            }
        });
@endsection