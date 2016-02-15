@extends('sm.layouts.master')
@section('title')
    Sales Manager Dashboard
@endsection

@section('content')
        <!-- Dashboard Header -->
    <!-- For an image header add the class 'content-header-media' and an image as in the following example -->
    <div class="content-header content-header-media">
        <div class="header-section">
            <div class="row">
                <!-- Main Title (hidden on small devices for the statistics to fit) -->
                <div class="col-md-4 col-lg-6 hidden-xs hidden-sm">
                    <h1>Welcome <strong>{{\Auth::user()->name}}</strong><br><small>Manage Reports Effectively</small></h1>
                </div>
                <!-- END Main Title -->

                <!-- Top Stats -->
                <div class="col-md-8 col-lg-6">
                    <div class="row text-center">
                        <div class="col-xs-4 col-sm-4">
                            <h2 class="animation-hatch">
                                <strong>{{$employeesCount}}</strong><br>
                                <small><i class="fa fa-thumbs-o-up"></i> Employees</small>
                            </h2>
                        </div>
                        <div class="col-xs-4 col-sm-4">
                            <h2 class="animation-hatch">
                                <strong>{{$customersCount}}</strong><br>
                                <small><i class="fa fa-stethoscope"></i> Customers</small>
                            </h2>
                        </div>
                        <div class="col-xs-4 col-sm-4">
                            <h2 class="animation-hatch">
                                <strong>{{$productsCount}}</strong><br>
                                <small><i class="fa fa-cube"></i> Product </small>
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

    <!-- Mini Top Stats Row -->
    <div class="row">
        <div class="col-md-4">
            <!-- Widget -->
            <a href="#" class="widget widget-hover-effect1">
                <div class="widget-simple">
                    <div class="widget-icon pull-left themed-background-fire animation-fadeIn">
                        <i class="gi gi-envelope"></i>
                    </div>
                    <h3 class="widget-content text-right animation-pullDown">
                        <strong>Messages</strong>
                        <small>{{(count($unread))}}</small>
                    </h3>
                </div>
            </a>
            <!-- END Widget -->
        </div>

        <div class="col-md-4">
            <!-- Widget -->
            <a href="#" class="widget widget-hover-effect1">
                <div class="widget-simple">
                    <div class="widget-icon pull-left themed-background-spring animation-fadeIn">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <h3 class="widget-content text-right animation-pullDown">
                        <strong>MR Plans</strong>
                        <small>{{$plansCount}}</small>
                    </h3>
                </div>
            </a>
            <!-- END Widget -->
        </div>

        <div class="col-md-4">
            <!-- Widget -->
            <a href="#" class="widget widget-hover-effect1">
                <div class="widget-simple">
                    <div class="widget-icon pull-left themed-background-amethyst animation-fadeIn">
                        <i class="fa fa-files-o"></i>
                    </div>
                    <h3 class="widget-content text-right animation-pullDown">
                        <strong>MR Month Reports</strong>
                        <small>{{$reportsCount}}</small>
                    </h3>
                </div>
            </a>
            <!-- END Widget -->
        </div>
    </div>
    <!-- END Mini Top Stats Row -->

    <div class="row">
        <div class="block full">
            <!-- Default Style Title -->
            <div class="block-title">
                <h2><strong>Quick Search</strong></h2>
            </div>
            <!-- END Default Style Title -->

            <!-- Default Style Content -->
            <div class="row">
                <div class="col-md-4">
                    <div class="block-section">
                        <a href="{{URL::route('smSalesSearch')}}" class="btn btn-block btn-success btn-lg">
                            <i class="fa fa-money"></i>
                            Sales Search
                        </a>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="block-section">
                        <a href="{{URL::route('smCoverageSearch')}}" class="btn btn-block btn-success btn-lg">
                            <i class="fa fa-pie-chart"></i>
                            Coverage Search
                        </a>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="block-section">
                        <a href="{{URL::route('smReportSearch')}}" class="btn btn-block btn-success btn-lg">
                            <i class="fa fa-files-o"></i>
                            Report Search
                        </a>
                    </div>
                </div>
            </div>
            <!-- END Default Style Content -->
        </div>
        <!-- END Default Style Block -->
    </div>
@endsection

@section('custom_footer_scripts')
<!-- Load and execute javascript code used only in this page -->
<script>$('#dashboard').addClass('active');</script>
    <script>
        // Pie Chart
        var chartPie = $('#chart-pie');
        $.plot(chartPie,
                [
                    {label: 'Support', data: 20},
                    {label: 'Earnings', data: 45},
                    {label: 'Sales', data: 35}
                ],
                {
                    colors: ['#333333', '#1abc9c', '#16a085'],
                    legend: {show: true},
                    series: {
                        pie: {
                            show: true,
                            radius: 1,
                            label: {
                                show: true,
                                radius: 3 / 4,
                                formatter: function(label, pieSeries) {
                                    return '<div class="chart-pie-label">' + label + '<br>' + Math.round(pieSeries.percent) + '%</div>';
                                },
                                background: {opacity: 0.75, color: '#000000'}
                            }
                        }
                    }
                }
        );
    </script>
@endsection