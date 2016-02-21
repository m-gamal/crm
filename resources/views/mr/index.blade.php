@extends('mr.layouts.master')
@section('title')
    {{\Auth::user()->name}} Dashboard
@endsection
@section('custom_styles')
    <style>
        .alert{
            padding: 24px;
            border-radius : 12px;
            -webkit-box-shadow: -7px -2px 9px -3px rgba(0,0,0,0.75);
            -moz-box-shadow: -7px -2px 9px -3px rgba(0,0,0,0.75);
            box-shadow: -7px -2px 9px -3px rgba(0,0,0,0.75);
        }
        span.announcement {
            padding-left: 20px;
            font-size: 16px;
            font-family: monospace;
            align-content: flex-start;
        }
    </style>
@endsection
@section('content')

    <!-- Dashboard Header -->
    <!-- For an image header add the class 'content-header-media' and an image as in the following example -->
    <div class="content-header content-header-media">
        <div class="header-section">
            <div class="row">
                <!-- Main Title (hidden on small devices for the statistics to fit) -->
                <div class="col-md-4 col-lg-6 hidden-xs hidden-sm">

                    <h1>Welcome <strong>[{{\Auth::user()->name}}]</strong></h1>
                </div>
                <!-- END Main Title -->

                <!-- Top Stats -->
                <div class="col-md-8 col-lg-6">
                    <div class="row text-center">
                        <div class="col-xs-4 col-sm-4">
                            <h2 class="animation-hatch">
                                <strong>{{$totalMonthlyCoverage}}%</strong><br>
                                <small><i class="fa fa-road"></i> Total Visits</small>
                            </h2>
                        </div>
                        <div class="col-xs-4 col-sm-4">
                            <h2 class="animation-hatch">
                                <strong>{{$totalSoldProductsSalesPrice}} LE</strong><br>
                                <small><i class="fa fa-money"></i> Total Sales</small>
                            </h2>
                        </div>
                        <div class="col-xs-4 col-sm-4">
                            <h2 class="animation-hatch">
                                <strong>{{$doctors}}</strong><br>
                                <small><i class="fa fa-stethoscope"></i> Customers</small>
                            </h2>
                        </div>
                    </div>
                </div>
                <!-- END Top Stats -->
            </div>
        </div>
        <!-- For best results use an image with a resolution of 2560x248 pixels (You can also use a blurred image with ratio 10:1 - eg: 1000x100 pixels - it will adjust and look great!) -->
        <img src="{{URL::asset('img/placeholders/headers/profile_header.jpg')}}" alt="header image" class="animation-pulseSlow">
    </div>
    <!-- END Dashboard Header -->
    <div class="row">
        @foreach($announcements as $singleAnnouncement)
            <div class="form-group">
                <div class="alert alert-danger alert-dismissable">
                    <p>
                        <i class="fa fa-bullhorn fa-2x"></i>
                        <span class="announcement">{{$singleAnnouncement->text}}</span>
                    </p>
                </div>
            </div>
        @endforeach
    </div>
    <div class="row">
        <!-- Input Grid Block -->
        <div class="block">
            <!-- Input Grid Title -->
            <div class="block-title">
                <h2>Quick Stats for ({{date('M')}})</h2>
            </div>
            <!-- END Input Grid Title -->

            <div class="block">
                <div class="block-title">
                    <ul class="nav nav-tabs" data-toggle="tabs">
                        <li class="active">
                            <a href="#plan_tab">
                                <i class="fa fa-calendar"></i>
                                Plans
                            </a>
                        </li>
                        <li>
                            <a href="#coverage_tab">
                                <i class="fa fa-pie-chart"></i>
                                Coverage
                            </a>
                        </li>
                        <li>
                            <a href="#report_tab">
                                <i class="fa fa-file"></i>
                                Reports
                            </a>
                        </li>
                        <li>
                            <a href="#follows_up_tab">
                                <i class="fa fa-pencil"></i>
                                Follows Up
                            </a>
                        </li>
                    </ul>
                </div>


                <!-- Tabs Content -->
                <div class="tab-content">
                    <!-- BEGIN PLAN-->
                    <div class="tab-pane active" id="plan_tab">
                        <!-- Input Grid Content -->
                        <div id="calendar"></div>
                        <!-- END Input Grid Content -->
                    </div>
                    <!-- END PLAN -->

                    <!-- Begin Coverage -->
                    <div class="tab-pane" id="coverage_tab">
                        <div class="row">
                            <div class="col-md-3">
                                <ul class="nav nav-pills nav-stacked">
                                    <li class="active">
                                        <a href="#class" data-toggle="tab"> By Class </a>
                                    </li>
                                    <li>
                                        <a href="#speciality" data-toggle="tab"> By Speciality </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-9">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="class">
                                        <div class="block full">
                                            <div class="block-title">
                                                <h2><strong>Total Monthly</strong> Coverage</h2>
                                            </div>
                                            <div class="form-group">
                                                <div class="alert alert-info alert-dismissable text-center">
                                                    <i class="fa fa-check"></i>
                                                    <b>
                                                        You have achieved {{$actualVisitsCount}}
                                                        visits from {{$totalVisitsCount}} visits
                                                    </b>
                                                </div>
                                            </div>
                                            <div class="pie-chart block-section" data-percent="{{$totalMonthlyCoverage}}" data-size="200">
                                                <span>{{$totalMonthlyCoverage}} %</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="speciality">
                                        <!-- Pie Chart Block -->
                                        <div class="block full">
                                            <!-- Pie Chart Title -->
                                            <div class="block-title">
                                                <h2><strong>Total Monthly Coverage</strong> By Speciality</h2>
                                            </div>
                                            <!-- END Pie Title -->

                                            <!-- Pie Chart Content -->
                                            <div id="chart-pie" class="chart">

                                            </div>
                                            <!-- END Pie Chart Content -->
                                        </div>
                                        <!-- END Pie Chart Block -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END Coverage -->

                    <div class="tab-pane" id="report_tab">
                        <div class="block-content-full">
                            <div class="table-responsive">
                                <table class="example-datatable table table-vcenter table-condensed table-bordered">
                                    <thead>
                                    <tr>
                                        <th class="class-text">#</th>
                                        <th class="text-center">Date</th>
                                        <th class="text-center">Doctor</th>
                                        <th class="text-center">Follow Up</th>
                                        <th class="text-center">Double Visits</th>
                                        <th class="text-center">Total Product Sold Price</th>
                                        <th class="text-center">Is Planned ?</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(count($monthlyReports) > 0)
                                        @foreach($monthlyReports as $singleReport)
                                            <tr>
                                                <td class="text-center"><a href="{{URL::route('singleReport', $singleReport->id)}}">{{$singleReport->id}}</a></td>
                                                <td class="text-center">{{$singleReport->date}}</td>
                                                <td class="text-center">{{$singleReport->doctor->name}}</td>
                                                <td class="text-center">{{$singleReport->follow_up}}</td>
                                                <td class="text-center">{{ !empty($singleReport->double_visit_manager_id) ? \App\Employee::findOrFail($singleReport->double_visit_manager_id)->name : 'N/A' }}</td>
                                                <td class="text-center">{{$singleReport->total_sold_products_price}}</td>
                                                <td class="text-center">{!! $singleReport->is_planned !!}</td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="follows_up_tab">
                        <div class="block-content-full">
                            <div class="table-responsive">
                                <table class="example-datatable table table-vcenter table-condensed table-bordered">
                                    <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">Date</th>
                                        <th class="text-center">Doctor</th>
                                        <th class="text-center">Follow Up</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(count($monthlyFollowsUp) > 0)
                                        @foreach($monthlyFollowsUp as $singleReport)
                                            <tr>
                                                <td class="text-center"><a href="{{URL::route('singleReport', $singleReport->id)}}">{{$singleReport->id}}</a></td>
                                                <td class="text-center">{{$singleReport->date}}</td>
                                                <td class="text-center">{{$singleReport->doctor->name}}</td>
                                                <td class="text-center">{{$singleReport->follow_up}}</td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Tabs Content -->
            </div>
        </div>
        <!-- END Input Grid Block -->
    </div>
@endsection

@section('custom_footer_scripts')
<!-- Load and execute javascript code used only in this page -->
<script>$('#dashboard').addClass('active');</script>
<script src="{{URL::asset('js/pages/compCalendar.js')}}"></script>
<script>$(function(){ CompCalendar.init(); });</script>
<script>
// global app configuration object
var config = {
    routes: [
        {
            plan            :   "{{URL::route('ajaxPlans') }}",
            coverage        :   "{{URL::route('ajaxCoverageBySpecialty')}}",
        }
    ]
};
</script>
<script src="{{URL::asset('js/mr/coverage.js')}}"></script>
<script src="{{URL::asset('js/mr/plan.js')}}"></script>
<script>
    $('#plan_tab').on('shown.bs.tab', function (e) {
        $('#calendar').fullCalendar('render');
    });
</script>
    <script src="{{URL::asset('js/pages/tablesDatatables.js')}}"></script>
    <script>$(function(){ TablesDatatables.init(); });</script>
@endsection