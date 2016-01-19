@extends('sm.layouts.master')
@section('title')
    All Pending Service Request
    @endsection

    @section('content')
            <!-- Begin Breadcrumb -->
    <ul class="breadcrumb breadcrumb-top">
        <li><a href="{{URL::route('/')}}">Dashboard</a></li>
        <li><a href="{{URL::route('smPendingServicesRequests')}}">All Pending Service Requests</a></li>
    </ul>
    <!-- END Breadcrumb -->

    <!-- Datatables Content -->
    <div class="block full">
        <div class="block-title">
            <div class="block-options pull-right">
                <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-primary" data-toggle="block-toggle-content">
                    <i class="fa fa-minus"></i>
                </a>
            </div>
            <h2>
                <strong>All</strong> Pending Service Requests
            </h2>
        </div>

        <div class="block-content">
            @if(Session::has('message'))
                <div class="form-group">
                    <div class="alert alert-success alert-dismissable">
                        <i class="fa fa-check"></i>
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <b> Success : </b> {{ Session::get('message') }}
                    </div>
                </div>
            @endif
            <div class="table-responsive">
                <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                    <thead>
                    <tr>
                        <th class="text-center">Date</th>
                        <th class="text-center">Medical Rep.</th>
                        <th class="text-center">Date</th>
                        <th class="text-center">Request</th>
                        <th class="text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($pendingServicesRequests as $singleServiceRequests)
                        <tr>
                            <td class="text-center">{{$singleServiceRequests->date}}</td>
                            <td class="text-center">{{$singleServiceRequests->emp->name}}</td>
                            <td class="text-center">{{$singleServiceRequests->date}}</td>
                            <td class="text-center">{{$singleServiceRequests->request_text}}</td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a class="btn btn-xs btn-success" href="{{URL::route('adminApprovePendingServiceRequest', $singleServiceRequests->id)}}"title="Approve">
                                        <i class="fa fa-check"></i>
                                    </a>
                                    <a class="btn btn-xs btn-danger" href="{{URL::route('adminDeclinePendingServiceRequest', $singleServiceRequests->id)}}" title="Reject">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- END Datatables Content -->
@endsection

@section('custom_footer_scripts')
    <script>$('#plan').addClass('active');</script>
    <script src="{{URL::asset('js/pages/tablesDatatables.js')}}"></script>
    <script>$(function(){ TablesDatatables.init(); });</script>
@endsection