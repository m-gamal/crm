@extends('mr.layouts.master')
@section('title')
All Leave Requests
@endsection

@section('content')
    <!-- Begin Breadcrumb -->
    <ul class="breadcrumb breadcrumb-top">
        <li><a href="{{URL::route('/')}}">Dashboard</a></li>
        <li><a href="{{URL::route('leaveRequests')}}">All Leave Requests</a></li>
    </ul>
    <!-- END Breadcrumb -->

    <!-- Datatables Content -->
    <div class="block full">
        <div class="block-title">
            <h2>
                <strong>All</strong> Leave Requests
                <a href="{{URL::route('addLeaveRequest')}}" class="label label-success" title="Add New Leave Request">+</a>
            </h2>

        </div>

        @if(Session::has('message'))
            <div class="alert alert-success alert-dismissable">
                <i class="fa fa-check"></i>
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <b> Success : </b> {{ Session::get('message') }}
            </div>
        @endif

        <div class="table-responsive">
            <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                <thead>
                <tr>
                    <th class="text-center">Month</th>
                    <th class="text-center">Date</th>
                    <th class="text-center">Reason</th>
                    <th class="text-center">From</th>
                    <th class="text-center">To</th>
                    <th class="text-center">Download Docs <i>(ZIP file)</i></th>
                    <th class="text-center">Status</th>
                </tr>
                </thead>
                <tbody>
                @if(count($leaveRequests) > 0)
                @foreach($leaveRequests as $singleLeaveRequest)
                <tr>
                    <td class="text-center">{{$singleLeaveRequest->month}}</td>
                    <td class="text-center">{{$singleLeaveRequest->date}}</td>
                    <td class="text-center">{{$singleLeaveRequest->reason}}</td>
                    <td class="text-center">{{$singleLeaveRequest->leave_start}}</td>
                    <td class="text-center">{{$singleLeaveRequest->leave_end}}</td>
                    <td class="text-center">
                        <a href="{{URL::asset('uploads/leave_requests/'.$singleLeaveRequest->mr_id.'/'.$singleLeaveRequest->month.'/'.$singleLeaveRequest->date.'.zip')}}"
                        download="{{$singleLeaveRequest->date.'.zip'}}" target="_blank">
                            <i class="fa fa-download"></i>
                        </a>
                    </td>
                    <td class="text-center">{!! $singleLeaveRequest->approved !!}</td>
                </tr>
                @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
    <!-- END Datatables Content -->
@endsection

@section('custom_footer_scripts')
<script>$('#leave_request').addClass('active');</script>
<script src="js/pages/tablesDatatables.js"></script>
<script>$(function(){ TablesDatatables.init(); });</script>
@endsection