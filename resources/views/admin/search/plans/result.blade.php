@extends('admin.layouts.master')
@section('title')
    Plans Search
@endsection
@section('content')
    <ul class="breadcrumb breadcrumb-top">
        <li><a href="{{URL::route('/')}}">Dashboard</a></li>
        <li><a href="{{URL::route('adminPlanSearch')}}">Plans Search</a></li>
    </ul>

    <!-- Datatables Content -->
    <div class="block full">
        <div class="block-title">
            <div class="block-options pull-right">
                <a href="{{URL::route('adminExportPlanSearch', 'xlsx')}}">
                    <img src="{{URL::asset('img/excel.png')}}" alt="">
                </a>
                |
                <a href="{{URL::route('adminExportPlanSearch', 'pdf')}}">
                    <img src="{{URL::asset('img/pdf.png')}}" alt="">
                </a>
            </div>
            <h2>
                <strong>Plans</strong> Search Result
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
            <table id="plan-search-result" class="table table-vcenter table-condensed table-bordered">
                <thead>
                <tr>
                    <th class="text-center">Emp</th>
                    <th class="text-center">Month</th>
                    <th class="text-center">Date</th>
                    <th class="text-center">Doctor</th>
                </tr>
                </thead>
                <tbody>
                @if(count($planSearchResult) > 0)
                    @foreach($planSearchResult as $singlePlan)
                        <tr>
                            <td class="text-center">{{$singlePlan->emp->name}}</td>
                            <td class="text-center">{{$singlePlan->month}}</td>
                            <td class="text-center">{{$singlePlan->date}}</td>
                            <td class="text-center">
                                @foreach((array)json_decode($singlePlan->doctors) as $singleDoctor)
                                    <label class="label label-success">
                                        {{\App\Customer::findOrFail($singleDoctor)->name}}
                                    </label>
                                @endforeach
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>

    <div class="block full">
        <div class="block-title">
            <div class="block-options pull-right">
                <a href="{{URL::route('adminExportLeaveRequestSearch','xlsx')}}">
                    <img src="{{URL::asset('img/excel.png')}}" alt="">
                </a>
                |
                <a href="{{URL::route('adminExportLeaveRequestSearch','pdf')
                        }}">
                    <img src="{{URL::asset('img/pdf.png')}}" alt="">
                </a>
            </div>

            <h2>
                <strong>Leave Requests </strong> Search Result
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
            <table id="leave-request-search-result" class="table table-vcenter table-condensed table-bordered">
                <thead>
                <tr>
                    <th class="text-center">Employee</th>
                    <th class="text-center">Month</th>
                    <th class="text-center">Leave Request Date</th>
                    <th class="text-center">Leave Request From</th>
                    <th class="text-center">Leave Request To</th>
                    <th class="text-center">Reason</th>
                </tr>
                </thead>
                <tbody>
                @if(count($leaveRequestSearchResult) > 0)
                    @foreach($leaveRequestSearchResult as $singleLeaveRequest)
                        <tr>
                            <td class="text-center">{{$singleLeaveRequest->emp->name}}</td>
                            <td class="text-center">{{$singleLeaveRequest->month}}</td>
                            <td class="text-center">{{$singleLeaveRequest->date}}</td>
                            <td class="text-center">{{$singleLeaveRequest->leave_start}}</td>
                            <td class="text-center">{{$singleLeaveRequest->leave_end}}</td>
                            <td class="text-center">{{$singleLeaveRequest->reason}}</td>
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
    <script>$('#plans_search').addClass('active');</script>
    <script src="{{URL::asset('js/pages/tablesDatatables.js')}}"></script>
    <script>$(function(){ TablesDatatables.init(); });</script>
@endsection