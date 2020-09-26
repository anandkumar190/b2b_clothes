@extends('layouts.admin')
@section('title','Trade Name Index')
@section('content')
                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Trade Name Master</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">
                            <div class="col-12">
                                @if(Session::has('danger'))
                                <div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <strong>{{Session::get('danger')}}</strong> 
                                </div>
                                @endif
                                @if(Session::has('success'))
                                <div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <strong>{{Session::get('success')}}</strong> 
                                </div>
                                @endif

                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Trade Name List <span class="add_span_css"><a href="{{route('tradename.create')}}" class="btn btn-success">Add</a></span></h4>
                                        <p class="text-muted font-14">
                                        </p>
                                        <div class="tab-content">
                                            <div class="tab-pane show active" id="buttons-table-preview">
                                                <table id="example" class="table table-striped dt-responsive nowrap w-100">
                                                    <thead>
                                                        <tr>
                                                            <th>id</th>
                                                            <th>Trade Name</th>
                                                            <th>Status</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    </tbody>
                                                </table>                                           
                                            </div> <!-- end preview-->
                                        </div> <!-- end tab-content-->
                                    </div> <!-- end card body-->
                                </div> <!-- end card -->
                            </div><!-- end col-->
                        </div>
                        <!-- end row-->
                    </div> <!-- container -->
                </div> <!-- content -->
@endsection
@section('javascript')
$(document).ready(function() {
    $('#example').DataTable( {
        "processing": true,
        "serverSide": true,
        "ajax": "{{ route('get_tradename_data') }}",
        "columns" : [
            { "data" : "id"},
            { "data" : "trade_name"},
            { 
              data: 'is_active', 
              render: function(data) { 
                if(data == 'Active') {
                  return '<span class="badge badge-primary">'+data+'</span>' 
                }
                else {
                  return '<span class="badge badge-danger">'+data+'</span>'
                }

              },
            },
            { 
              data: 'id', 
              render: function ( data, type, row ) {
               return '<a href="{{url('/tradename')}}/'+data+'/edit" class="action-icon"> <i class="mdi mdi-pencil"></i></a><form action="{{url('/tradename')}}/'+data+'" method="POST" class="action-icon">@method('DELETE')@csrf<button class="action-icon" style="border:none;background: none;"> <i class="mdi mdi-delete"></i></form>'
               }
            },
         ]
    } );
} );
@endsection