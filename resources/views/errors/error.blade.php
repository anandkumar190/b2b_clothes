@extends('layouts.auth')
@section('content')
                            
                            <div class="card-body p-4">

                                <div class="text-center">
                                    <img src="{{url('public/admin/images/startman.svg')}}" height="120" alt="File not found Image">

                                    <h1 class="text-error mt-4">500</h1>
                                    <h4 class="text-uppercase text-danger mt-3">Internal Server Error</h4>

                                    <a class="btn btn-info mt-3" href="javascript:void(0)"><i class="mdi mdi-reply"></i> We are tring to fix</a>
                                </div>

                            </div> <!-- end card-body-->
                        </div>
                        <!-- end card-->
@endsection