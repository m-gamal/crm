@extends('admin.layouts.master')
@section('title')
All Expenses Reports
@endsection

@section('content')
    <!-- Begin Breadcrumb -->
    <ul class="breadcrumb breadcrumb-top">
        <li><a href="{{URL::route('/')}}">Dashboard</a></li>
        <li><a href="{{URL::route('adminExpensesReports')}}">All Expenses Reports</a></li>
    </ul>
    <!-- END Breadcrumb -->

    <!-- Datatables Content -->
    <div class="block full">
        <div class="block-title">
            <h2>
                <strong>All</strong> Expenses Reports
            </h2>

        </div>

        <div class="row">
            <div class="col-md-12">
                <!-- Basic Form Elements Block -->
                <div class="block">
                    <div class="block-title">
                        <ul class="nav nav-tabs" data-toggle="tabs">
                            <li class="active">
                                <a href="#mr_tab">
                                    <i class="fa fa-users"></i>
                                    Medical Reps
                                </a>
                            </li>
                            <li>
                                <a href="#am_tab">
                                    <i class="fa fa-users"></i>
                                    Area Managers
                                </a>
                            </li>
                            <li>
                                <a href="#sm_tab">
                                    <i class="fa fa-user"></i>
                                    Sales Manager
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
                                        <th class="text-center">Medical Rep</th>
                                        <th class="text-center">Month</th>
                                        <th class="text-center">Date</th>
                                        <th class="text-center">Serial</th>
                                        <th class="text-center">Total</th>
                                        <th class="text-center">Download Invoices <i>(ZIP file)</i></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(count($expensesReports) > 0)
                                        @foreach($expensesReports as $singleExpenseReport)
                                            <tr>
                                                <td class="text-center">{{$singleExpenseReport->mr->name}}</td>
                                                <td class="text-center">{{$singleExpenseReport->month}}</td>
                                                <td class="text-center">{{$singleExpenseReport->date}}</td>
                                                <td class="text-center">{{$singleExpenseReport->serial}}</td>
                                                <td class="text-center">{{$singleExpenseReport->total}}</td>
                                                <td class="text-center">
                                                    <a href="{{URL::asset('uploads/expenses_reports/'.$singleExpenseReport->mr_id.'/'.$singleExpenseReport->month.'/'.$singleExpenseReport->date.'.zip')}}"
                                                       download="{{$singleExpenseReport->date.'.zip'}}" target="_blank">
                                                        <i class="fa fa-download"></i>
                                                    </a>
                                                </td>
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
                                        <th class="text-center">Area Manager</th>
                                        <th class="text-center">Month</th>
                                        <th class="text-center">Date</th>
                                        <th class="text-center">Serial</th>
                                        <th class="text-center">Total</th>
                                        <th class="text-center">Download Invoices <i>(ZIP file)</i></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(count($amExpensesReports) > 0)
                                        @foreach($amExpensesReports as $singleExpenseReport)
                                            <tr>
                                                <td class="text-center">{{$singleExpenseReport->am->name}}</td>
                                                <td class="text-center">{{$singleExpenseReport->month}}</td>
                                                <td class="text-center">{{$singleExpenseReport->date}}</td>
                                                <td class="text-center">{{$singleExpenseReport->serial}}</td>
                                                <td class="text-center">{{$singleExpenseReport->total}}</td>
                                                <td class="text-center">
                                                    <a href="{{URL::asset('uploads/expenses_reports/'.$singleExpenseReport->am_id.'/'.$singleExpenseReport->month.'/'.$singleExpenseReport->date.'.zip')}}"
                                                       download="{{$singleExpenseReport->date.'.zip'}}" target="_blank">
                                                        <i class="fa fa-download"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="tab-pane" id="sm_tab">
                            <div class="table-responsive">
                                <table class="example-datatable table table-vcenter table-condensed table-bordered">
                                    <thead>
                                    <tr>
                                        <th class="text-center">Sales Manager</th>
                                        <th class="text-center">Month</th>
                                        <th class="text-center">Date</th>
                                        <th class="text-center">Serial</th>
                                        <th class="text-center">Total</th>
                                        <th class="text-center">Download Invoices <i>(ZIP file)</i></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(count($smExpensesReports) > 0)
                                        @foreach($smExpensesReports as $singleExpenseReport)
                                            <tr>
                                                <td class="text-center">{{$singleExpenseReport->sm->name}}</td>
                                                <td class="text-center">{{$singleExpenseReport->month}}</td>
                                                <td class="text-center">{{$singleExpenseReport->date}}</td>
                                                <td class="text-center">{{$singleExpenseReport->serial}}</td>
                                                <td class="text-center">{{$singleExpenseReport->total}}</td>
                                                <td class="text-center">
                                                    <a href="{{URL::asset('uploads/expenses_reports/'.$singleExpenseReport->sm_id.'/'.$singleExpenseReport->month.'/'.$singleExpenseReport->date.'.zip')}}"
                                                       download="{{$singleExpenseReport->date.'.zip'}}" target="_blank">
                                                        <i class="fa fa-download"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- END Basic Form Elements Block -->
            </div>
        </div>
    </div>
    <!-- END Datatables Content -->
@endsection

@section('custom_footer_scripts')
<script>$('#expense_report').addClass('active');</script>
<script src="{{URL::asset('js/pages/tablesDatatables.js')}}"></script>
<script>$(function(){ TablesDatatables.init(); });</script>
@endsection