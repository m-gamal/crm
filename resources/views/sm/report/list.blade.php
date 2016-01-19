@extends('sm.layouts.master')
@section('title')
All Reports
@endsection

@section('content')
    <!-- Begin Breadcrumb -->
    <ul class="breadcrumb breadcrumb-top">
        <li><a href="{{URL::route('/')}}">Dashboard</a></li>
        <li><a href="{{URL::route('smReports')}}">All Reports</a></li>
    </ul>
    <!-- END Breadcrumb -->

    <!-- Datatables Content -->
    <div class="block full">
        <div class="block-title">
            <h2>
                <strong>All</strong> Reports
                <a href="{{URL::route('smAddReport')}}" class="label label-success" title="Add New Leave Request">+</a>
            </h2>

        </div>

        @if(Session::has('message'))
            <div class="alert alert-success alert-dismissable">
                <i class="fa fa-check"></i>
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <b> Success : </b> {{ Session::get('message') }}
            </div>
        @endif

        <div class="block">
            <div class="block-title">
                <ul class="nav nav-tabs" data-toggle="tabs">
                    <li class="active">
                        <a href="#mr_tab">
                            <i class="fa fa-users"></i>
                            Medical Rep.
                        </a>
                    </li>
                    <li>
                        <a href="#am_tab">
                            <i class="fa fa-users"></i>
                            Area Manager
                        </a>
                    </li>
                    <li>
                        <a href="#yours_tab">
                            <i class="fa fa-user"></i>
                            Yours
                        </a>
                    </li>
                </ul>
            </div>

            <div class="tab-content">
                <div class="tab-pane active" id="mr_tab">
                    <div class="table-responsive">
                        <table class="example-datatable table table-vcenter table-condensed table-bordered">
                        <thead>
                        <tr>
                            <th class="class-text">#</th>
                            <th class="class-text">Medical Rep.</th>
                            <th class="text-center">Month</th>
                            <th class="text-center">Date</th>
                            <th class="text-center">Doctor</th>
                            <th class="text-center">Follow Up</th>
                            <th class="text-center">Double Visits</th>
                            <th class="text-center">Products Sold Price</th>
                            <th class="text-center">Planned ?</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($MRReports) > 0)
                            @foreach($MRReports as $singleReport)
                                <tr>
                                    <td class="text-center"><a href="{{URL::route('amMRSingleReport', $singleReport->id)}}">{{$singleReport->id}}</a></td>
                                    <td class="text-center">{{$singleReport->mr->name}}</td>
                                    <td class="text-center">{{$singleReport->month}}</td>
                                    <td class="text-center">{{$singleReport->date}}</td>
                                    <td class="text-center">{{$singleReport->doctor->name}}</td>
                                    <td class="text-center">{{$singleReport->follow_up}}</td>
                                    <td class="text-center">{{!empty($singleReport->double_visit_manager_id) ? $singleReport->double_visit_manager_id : 'N/A'}}</td>
                                    <td class="text-center">{{$singleReport->total_sold_products_price}}</td>
                                    <td class="text-center">{!! $singleReport->is_planned !!}</td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane" id="am_tab">
                    <div class="table-responsive">
                        <table class="example-datatable table table-vcenter table-condensed table-bordered">
                            <thead>
                            <tr>
                                <th class="class-text">#</th>
                                <th class="class-text">Area Manager</th>
                                <th class="text-center">Month</th>
                                <th class="text-center">Date</th>
                                <th class="text-center">Doctor</th>
                                <th class="text-center">Follow Up</th>
                                <th class="text-center">Double Visits</th>
                                <th class="text-center">Total Product Sold Price</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($AMReports) > 0)
                                @foreach($AMReports as $singleReport)
                                    <tr>
                                        <td class="text-center"><a href="{{URL::route('amYourSingleReport', $singleReport->id)}}">{{$singleReport->id}}</a></td>
                                        <td class="text-center">{{$singleReport->am->name}}</td>
                                        <td class="text-center">{{$singleReport->month}}</td>
                                        <td class="text-center">{{$singleReport->date}}</td>
                                        <td class="text-center">{{$singleReport->doctor->name}}</td>
                                        <td class="text-center">{{$singleReport->follow_up}}</td>
                                        <td class="text-center">{{!empty($singleReport->double_visit_manager_id) ? $singleReport->double_visit_manager_id : 'N/A'}}</td>
                                        <td class="text-center">{{$singleReport->total_sold_products_price}}</td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane" id="yours_tab">
                    <div class="table-responsive">
                        <table class="example-datatable table table-vcenter table-condensed table-bordered">
                            <thead>
                            <tr>
                                <th class="class-text">#</th>
                                <th class="text-center">Month</th>
                                <th class="text-center">Date</th>
                                <th class="text-center">Doctor</th>
                                <th class="text-center">Follow Up</th>
                                <th class="text-center">Double Visits</th>
                                <th class="text-center">Total Product Sold Price</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($yourReports) > 0)
                                @foreach($yourReports as $singleReport)
                                    <tr>
                                        <td class="text-center"><a href="{{URL::route('amYourSingleReport', $singleReport->id)}}">{{$singleReport->id}}</a></td>
                                        <td class="text-center">{{$singleReport->month}}</td>
                                        <td class="text-center">{{$singleReport->date}}</td>
                                        <td class="text-center">{{$singleReport->doctor->name}}</td>
                                        <td class="text-center">{{$singleReport->follow_up}}</td>
                                        <td class="text-center">{{!empty($singleReport->double_visit_manager_id) ? $singleReport->double_visit_manager_id : 'N/A'}}</td>
                                        <td class="text-center">{{$singleReport->total_sold_products_price}}</td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- END Datatables Content -->
@endsection

@section('custom_footer_scripts')
<script>$('#report').addClass('active');</script>
<script src="{{URL::asset('js/pages/tablesDatatables.js')}}"></script>
<script>$(function(){ TablesDatatables.init(); });</script>
@endsection