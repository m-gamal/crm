@extends('sm.layouts.master')
@section('title')
All Service Requests
@endsection

@section('content')
    <!-- Begin Breadcrumb -->
    <ul class="breadcrumb breadcrumb-top">
        <li><a href="{{URL::route('/')}}">Dashboard</a></li>
        <li><a href="{{URL::route('smServicesRequests')}}">All Services Requests</a></li>
    </ul>
    <!-- END Breadcrumb -->

    <!-- Datatables Content -->
    <div class="block full">
        <div class="block-title">
            <h2>
                <strong>All</strong> Service Requests
                <a href="{{URL::route('smAddServiceRequest')}}" class="label label-success" title="Add New Service Request">+</a>
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
            <table class="example-datatable table table-vcenter table-condensed table-bordered">
                <thead>
                <tr>
                    <th class="text-center">Month</th>
                    <th class="text-center">Date</th>
                    <th class="text-center">Request</th>
                    <th class="text-center">Status</th>
                </tr>
                </thead>
                <tbody>
                @if(count($servicesRequests) > 0)
                @foreach($servicesRequests as $singleServiceRequest)
                <tr>
                    <td class="text-center">{{$singleServiceRequest->month}}</td>
                    <td class="text-center">{{$singleServiceRequest->date}}</td>
                    <td class="text-center">{{$singleServiceRequest->request_text}}</td>
                    <td class="text-center">{!! $singleServiceRequest->approved !!}</td>
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
<script>$('#service_request').addClass('active');</script>
<script src="{{URL::asset('js/pages/tablesDatatables.js')}}"></script>
<script>$(function(){ TablesDatatables.init(); });</script>
@endsection