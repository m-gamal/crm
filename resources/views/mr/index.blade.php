@extends('mr.layouts.master')
@section('title')
    Medical Rep. Dashboard
@endsection

@section('content')

    <!-- Dashboard Header -->
    <!-- For an image header add the class 'content-header-media' and an image as in the following example -->
    <div class="content-header content-header-media">
        <div class="header-section">
            <div class="row">
                <!-- Main Title (hidden on small devices for the statistics to fit) -->
                <div class="col-md-4 col-lg-6 hidden-xs hidden-sm">
                    {{--mr_session--}}
                    <h1>Welcome <strong>[Amr Mohamed]</strong></h1>
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
        <img src="img/placeholders/headers/profile_header.jpg" alt="header image" class="animation-pulseSlow">
    </div>
    <!-- END Dashboard Header -->
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
                            <a href="#visit_statue_tab">
                                <i class="fa fa-file"></i>
                                Visits Statue
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
                                        <a href="#speciality" tabindex="-1" data-toggle="tab"> By Speciality </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-9">
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
                                <div class="tab-pane fade" id="speciality">
                                    <!-- Pie Chart Block -->
                                    <div class="block full">
                                        <!-- Pie Chart Title -->
                                        <div class="block-title">
                                            <h2><strong>Pie</strong> Chart</h2>
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
                    <!-- END Coverage -->
                    <div class="tab-pane" id="report_tab">
                        <div class="block-content-full">
                            <div class="table-responsive">
                                <table id="example-table" class="table table-vcenter table-condensed table-bordered">
                                    <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">Date</th>
                                        <th class="text-center">Description Name</th>
                                        <th class="text-center">Doctor </th>
                                        <th class="text-center">Is Planned ? </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($monthlyReports as $singleReport)
                                        <tr>
                                            <td class="text-center">{{$singleReport->id}}</td>
                                            <td class="text-center">{{$singleReport->date}}</td>
                                            <td class="text-center">{{$singleReport->doctor->description_name}}</td>
                                            <td class="text-center">{{$singleReport->doctor->name}}</td>
                                            <td class="text-center">{!! $singleReport->is_planned !!}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- BEGIN PLAN-->
                    <div class="tab-pane fade" id="visit_statue_tab">
                        <!-- Input Grid Content -->

                        <!-- END Input Grid Content -->
                    </div>
                    <!-- END PLAN -->
                </div>
                <!-- END Tabs Content -->
            </div>

            <!-- Pie Chart Block -->
            <div class="block full">
                <!-- Pie Chart Title -->
                <div class="block-title">
                    <h2><strong>Visits</strong> Statue</h2>
                </div>
                <!-- END Pie Title -->

                <!-- Pie Chart Content -->
                <div id="visit-chart-pie" class="chart"></div>
                <!-- END Pie Chart Content -->


                <!-- Pie Chart Content -->
                <div id="planned-vs-actual-chart-pie" class="chart"></div>
                <!-- END Pie Chart Content -->

            </div>
            <!-- END Pie Chart Block -->
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
            visitStatue     :   "{{URL::route('ajaxVisitStatue')}}",
            plannedVsActual :   "{{URL::route('ajaxPlannedVsActual')}}"
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
<script src="{{URL::asset('js/mr/visit_statue.js')}}"></script>
    <script src="{{URL::asset('js/mr/planned_vs_actual.js')}}"></script>
@endsection