@extends('mr.layouts.master')
@section('title')
All Expenses Reports
@endsection

@section('content')
    <!-- Begin Breadcrumb -->
    <ul class="breadcrumb breadcrumb-top">
        <li><a href="{{URL::route('/')}}">Dashboard</a></li>
        <li><a href="{{URL::route('expensesReports')}}">All Expenses Reports</a></li>
    </ul>
    <!-- END Breadcrumb -->

    <!-- Datatables Content -->
    <div class="block full">
        <div class="block-title">
            <h2>
                <strong>All</strong> Expenses Reports
                <a href="{{URL::route('addExpenseReport')}}" class="label label-success" title="Add New Expense Report">+</a>
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
                    <th class="text-center">Serial</th>
                    <th class="text-center">Total</th>
                    <th class="text-center">Download Invoices <i>(ZIP file)</i></th>
                </tr>
                </thead>
                <tbody>
                @if(count($expensesReports) > 0)
                @foreach($expensesReports as $singleExpenseReport)
                <tr>
                    <td class="text-center">{{$singleExpenseReport->month}}</td>
                    <td class="text-center">{{$singleExpenseReport->date}}</td>
                    <td class="text-center">{{$singleExpenseReport->serial}}</td>
                    <td class="text-center">{{$singleExpenseReport->total}}</td>
                    <td class="text-center">
                        <a href="{{URL::asset('uploads/expenses_reports/'.$singleExpenseReport->emp_id.'/'.$singleExpenseReport->month.'/'.$singleExpenseReport->date.'.zip')}}"
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
    <!-- END Datatables Content -->
@endsection

@section('custom_footer_scripts')
<script>$('#expense_report').addClass('active');</script>
<script src="{{URL::asset('js/pages/tablesDatatables.js')}}"></script>
<script>$(function(){ TablesDatatables.init(); });</script>
@endsection