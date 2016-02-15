@extends('mr.layouts.master')
@section('title')
    Report Search
@endsection

@section('content')
    <ul class="breadcrumb breadcrumb-top">
        <li><a href="{{URL::route('/')}}">Dashboard</a></li>
        <li><a href="{{URL::route('doReportSearch')}}">Report Search</a></li>
    </ul>

    <!-- Datatables Content -->
    <div class="block full">
        <div class="block-title">
            <div class="block-options pull-right">
                <a href="{{URL::route('mrExportReportSearch', 'xlsx')}}">
                    <img src="{{URL::asset('img/excel.png')}}" alt="">
                </a>
                |
                <a href="{{URL::route('mrExportReportSearch', 'pdf')}}">
                    <img src="{{URL::asset('img/pdf.png')}}" alt="">
                </a>
            </div>
            <h2>
                <strong>Report</strong> Search Result
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
                    <th class="text-center">Doctor</th>
                    <th class="text-center">Follow Up</th>
                    <th class="text-center">Double Visits</th>
                    <th class="text-center">Total Product Sold Price</th>
                </tr>
                </thead>
                <tbody>
                @if(count($searchResult) > 0)
                    @foreach($searchResult as $singleReport)
                        <tr>
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
    <!-- END Datatables Content -->
@endsection

@section('custom_footer_scripts')
    <script>$('#reports_search').addClass('active');</script>
    <script src="{{URL::asset('js/pages/tablesDatatables.js')}}"></script>
    <script>$(function(){ TablesDatatables.init(); });</script>
@endsection