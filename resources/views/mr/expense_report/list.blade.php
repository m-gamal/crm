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
                    <th class="text-center">Hotel</th>
                    <th class="text-center">Transportation</th>
                    <th class="text-center">Meeting</th>
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
                    <td class="text-center">
                        <a data-toggle="modal" data-target="#expense_hotel_{{$singleExpenseReport->id}}" class="btn btn-xs btn-danger">
                            Hotels
                        </a>
                    </td>

                    <td class="text-center">
                        <a data-toggle="modal" data-target="#expense_transportation_{{$singleExpenseReport->id}}" class="btn btn-xs btn-danger">
                            Transportation
                        </a>
                    </td>

                    <td class="text-center">
                        <a data-toggle="modal" data-target="#expense_meeting_{{$singleExpenseReport->id}}" class="btn btn-xs btn-danger">
                            Meeting
                        </a>
                    </td>
                    <td class="text-center">{{$singleExpenseReport->total}}</td>
                    <td class="text-center">
                        <a href="{{URL::asset('uploads/expenses_reports/'.$singleExpenseReport->mr_id.'/'.$singleExpenseReport->month.'/'.$singleExpenseReport->id.'.zip')}}"
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

    @if($expensesReports)
    @foreach($expensesReports as $singleExpenseReport)
        <div class="modal fade" id="expense_hotel_{{$singleExpenseReport->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel"><i><strong>Hotel Details</strong></i> </h4>
                    </div>
                    <div class="modal-body">
                        <table id="products_target" class="table table-vcenter table-condensed table-bordered">
                            <thead>
                            <tr>
                                <th class="text-center">Date</th>
                                <th class="text-center">Hotel</th>
                                <th class="text-center">Meal</th>
                                <th class="text-center">Cost</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($singleExpenseReport->hotels as $singleHotel)
                                <tr>
                                    <td class="text-center">{{$singleHotel->date}}</td>
                                    <td class="text-center">{{$singleHotel->hotel}}</td>
                                    <td class="text-center">{{$singleHotel->meal}}</td>
                                    <td class="text-center">{{$singleHotel->cost}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="expense_transportation_{{$singleExpenseReport->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel"><i><strong>Transporation Details</strong></i> </h4>
                    </div>
                    <div class="modal-body">
                        <table id="products_target" class="table table-vcenter table-condensed table-bordered">
                            <thead>
                            <tr>
                                <th class="text-center">Date</th>
                                <th class="text-center">City</th>
                                <th class="text-center">Cost</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($singleExpenseReport->transportation as $singleTransportation)
                                <tr>
                                    <td class="text-center">{{$singleTransportation->date}}</td>
                                    <td class="text-center">{{$singleTransportation->city}}</td>
                                    <td class="text-center">{{$singleTransportation->cost}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="expense_meeting_{{$singleExpenseReport->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel"><i><strong>Meeting Details</strong></i> </h4>
                    </div>
                    <div class="modal-body">
                        <table id="products_target" class="table table-vcenter table-condensed table-bordered">
                            <thead>
                            <tr>
                                <th class="text-center">Date</th>
                                <th class="text-center">Meeting</th>
                                <th class="text-center">Cost</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($singleExpenseReport->meetings as $singleMeeting)
                                <tr>
                                    <td class="text-center">{{$singleMeeting->date}}</td>
                                    <td class="text-center">{{$singleMeeting->meeting}}</td>
                                    <td class="text-center">{{$singleMeeting->cost}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @endif
    <!-- END Datatables Content -->
@endsection

@section('custom_footer_scripts')
<script>$('#expense_report').addClass('active');</script>
<script src="{{URL::asset('js/pages/tablesDatatables.js')}}"></script>
<script>$(function(){ TablesDatatables.init(); });</script>
@endsection