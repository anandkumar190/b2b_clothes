@extends('layouts.admin')
@section('title','Edit Product')
@section('content')
                    <!-- Start Content-->
                    <div class="container-fluid">
                        <div class="row" style="margin-top:80px;">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title margin-mb">Edit Product</h4>
                                        <ul class="nav nav-tabs nav-bordered mb-1">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                        </ul> <!-- end nav-->
                                        <div class="tab-content">
                                            <div class="tab-pane show active" id="custom-styles-preview">
                                                <form id="add_product" action="{{url('product')}}/{{$id}}" method="post" enctype="multipart/form-data">
                                                @method('PATCH')
                                                    @include('seller.product.form')
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
function findSubcategory(val)
{   
    $.ajax({
        url: "{{route('findSubcategory')}}",
        type: "post",
        data: { 'category_id' : val, '_token': '{{ csrf_token() }}'},
        success: function(data)
        {
            $('#subcategory').html(data);
        }
        });
}

function calculateYard(val)
{
    yard =  val*1.093613.toFixed(3);
    $('#yard').val(yard);
}

function calculateCM(val)
{
    cm =  val*2.54.toFixed(3);
    $('#width_cm').val(cm);
}

function calculateAmount(val)
{
    $.ajax({
        url: "{{route('calculateAmount')}}",
        type: "post",
        data: { 'ruppe' : val, '_token': '{{ csrf_token() }}'},
        success: function(data)
        {
            $('#usd').val(data.usd);
            $('#euro').val(data.euro);
        }
        });
}

$.validator.setDefaults({
        submitHandler : function(form) {
            form.submit();
        }
    });
    $("#add_product").validate({

            rules: {
                title: "required",
                description: "required",
                tags: "required",
                weave: "required",
                category: "required",
                gsm: "required",
                trade_name: "required",
                finish: "required",
                color_1: "required",
                blend_1: "required",
                percentage_1: "required",
                meter: "required",
                inr: "required",
                moq: "required",
                certificate: "required",
                insception: "required",
                test: "required",
                location: "required",
                country: "required",
            },

            messages: {
                title: "* Enter Title",
                description: "* Enter Description",
                tags: "* Enter Tags",
                weave: "* Select Weave",
                category: "* Select Category",
                gsm: "* Enter GSM",
                trade_name: "* Select Trade Name",
                finish: "* Select Finish",
                color_1: "* Select at least one Color",
                blend_1: "* Select at least one Blend",
                percentage_1: "* Enter % value",
                meter: "* Enter meter",
                inr: "* Enter INR",
                moq: "* Enter minimum quantity",
                certificate: "* Select Certificate",
                insception: "* Select Inspection",
                test: "* Select Test",
                location: "* Select Location",
                country: "*Select Country",
            }
        });

function checkBlend()
{
    let sum = 0;
    percentage_1 = $('#percentage_1').val();
    percentage_2 = $('#percentage_2').val();
    percentage_3 = $('#percentage_3').val();
    percentage_4 = $('#percentage_4').val();
    if(percentage_1)
    {
        sum = parseInt(percentage_1);
    }
    if(percentage_2)
    {
        sum = sum + parseInt(percentage_2);
    }
    if(percentage_3)
    {
        sum = sum + parseInt(percentage_3);
    }
    if(percentage_4)
    {
        sum = sum + parseInt(percentage_4);
    }
    if(sum == 100)
    {
        $('#warning').html(""); 
        $('#add_product').submit();
    }
    else if(sum > 100)
    {
        $('#warning').html("* Enter right amount of blend percentage"); 
    }
    else
    {
        $('#warning').html("* Please make sure that your blend percentage sums upto 100%");
    }
}
@endsection