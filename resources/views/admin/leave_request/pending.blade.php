@extends('admin.layouts.master')
@section('title')
    All Pending Leave Request
    @endsection

    @section('content')
            <!-- Begin Breadcrumb -->
    <ul class="breadcrumb breadcrumb-top">
        <li><a href="{{URL::route('/')}}">Dashboard</a></li>
        <li><a href="{{URL::route('adminSMPendingLeaveRequests')}}">All Pending Leave Requests</a></li>
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
                <strong>All</strong> Pending Leave Requests
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
                        <th class="text-center">Sales Manager</th>
                        <th class="text-center">Reason</th>
                        <th class="text-center">Leave Start</th>
                        <th class="text-center">Leave End</th>
                        <th class="text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($pendingLeaveRequests as $singleLeaveRequests)
                        <tr>
                            <td class="text-center">{{$singleLeaveRequests->date}}</td>
                            <td class="text-center">{{$singleLeaveRequests->emp->name}}</td>
                            <td class="text-center">{{$singleLeaveRequests->reason}}</td>
                            <td class="text-center">{{$singleLeaveRequests->leave_start}}</td>
                            <td class="text-center">{{$singleLeaveRequests->leave_end}}</td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a class="btn btn-xs btn-success" href="{{URL::route('adminApprovePendingLeaveRequest', $singleLeaveRequests->id)}}"title="Approve">
                                        <i class="fa fa-check"></i>
                                    </a>
                                    <a class="btn btn-xs btn-danger" href="{{URL::route('adminDeclinePendingLeaveRequest', $singleLeaveRequests->id)}}" title="Reject">
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