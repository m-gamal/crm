@extends('am.layouts.master')
@section('title')
    Area Manager Dashboard
@endsection

@section('content')

    <!-- Dashboard Header -->
    <!-- For an image header add the class 'content-header-media' and an image as in the following example -->
    <div class="content-header content-header-media">
        <div class="header-section">
            <div class="row">
                <!-- Main Title (hidden on small devices for the statistics to fit) -->
                <div class="col-md-4 col-lg-6 hidden-xs hidden-sm">
                    <h1>Welcome <strong>Area Manager</strong><br><small>Manage Reports Effectively</small></h1>
                </div>
                <!-- END Main Title -->

                <!-- Top Stats -->
                <div class="col-md-8 col-lg-6">
                    <div class="row text-center">
                        <div class="col-xs-4 col-sm-4">
                            <h2 class="animation-hatch">
                                <strong>10</strong><br>
                                <small><i class="fa fa-thumbs-o-up"></i> Employees</small>
                            </h2>
                        </div>
                        <div class="col-xs-4 col-sm-4">
                            <h2 class="animation-hatch">
                                <strong>20</strong><br>
                                <small><i class="fa fa-stethoscope"></i> Customers</small>
                            </h2>
                        </div>
                        <div class="col-xs-4 col-sm-4">
                            <h2 class="animation-hatch">
                                <strong>101</strong><br>
                                <small><i class="fa fa-money"></i> Sales </small>
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

    <!-- Mini Top Stats Row -->
    <div class="row">
        <div class="col-sm-6 col-lg-3">
            <!-- Widget -->
            <a href="#" class="widget widget-hover-effect1">
                <div class="widget-simple">
                    <div class="widget-icon pull-left themed-background-fire animation-fadeIn">
                        <i class="gi gi-envelope"></i>
                    </div>
                    <h3 class="widget-content text-right animation-pullDown">
                        <strong>Messages</strong>
                        <small>0</small>
                    </h3>
                </div>
            </a>
            <!-- END Widget -->
        </div>

        <div class="col-sm-6 col-lg-3">
            <!-- Widget -->
            <a href="#" class="widget widget-hover-effect1">
                <div class="widget-simple">
                    <div class="widget-icon pull-left themed-background-autumn animation-fadeIn">
                        <i class="fa fa-cube"></i>
                    </div>
                    <h3 class="widget-content text-right animation-pullDown">
                        <strong>Products</strong>
                        <small>30</small>
                    </h3>
                </div>
            </a>
            <!-- END Widget -->
        </div>

        <div class="col-sm-6 col-lg-3">
            <!-- Widget -->
            <a href="#" class="widget widget-hover-effect1">
                <div class="widget-simple">
                    <div class="widget-icon pull-left themed-background-spring animation-fadeIn">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <h3 class="widget-content text-right animation-pullDown">
                        <strong>Plans</strong>
                        <small>14</small>
                    </h3>
                </div>
            </a>
            <!-- END Widget -->
        </div>

        <div class="col-sm-6 col-lg-3">
            <!-- Widget -->
            <a href="#" class="widget widget-hover-effect1">
                <div class="widget-simple">
                    <div class="widget-icon pull-left themed-background-amethyst animation-fadeIn">
                        <i class="fa fa-files-o"></i>
                    </div>
                    <h3 class="widget-content text-right animation-pullDown">
                        <strong>Month Reports</strong>
                        <small>50</small>
                    </h3>
                </div>
            </a>
            <!-- END Widget -->
        </div>
    </div>
    <!-- END Mini Top Stats Row -->

    <div class="row">
        <!-- Input Grid Block -->
        <div class="block">
            <!-- Input Grid Title -->
            <div class="block-title">
                <h2>Quick Search</h2>
            </div>
            <!-- END Input Grid Title -->

            <!-- Input Grid Content -->
            <form action="#" method="post" class="form-horizontal form-bordered" onsubmit="return false;">
                <div class="form-group">
                    <div class="col-md-3">
                        <label> Level</label>
                        </br>
                        <select id="example-select" name="example-select" class="form-control" size="1">
                            <option value="0">Select Level</option>
                            <option value="1">Medical Representative</option>
                            <option value="2">Area Manager</option>
                            <option value="3">Sales Manager</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label> User</label>
                        </br>
                        <select id="example-select" name="example-select" class="form-control" size="1">
                            <option value="0">Select User</option>
                            <option value="1">User1</option>
                            <option value="2">User2</option>
                            <option value="3">User3</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label> Type</label>
                        </br>
                        <select id="example-select" name="example-select" class="form-control" size="1">
                            <option value="0">Select Type</option>
                            <option value="1">Report</option>
                            <option value="2">Coverage</option>
                            <option value="3">Sales</option>
                        </select>
                    </div>

                    <div class="col-md-3">
                        <label>Date Range</label>
                        </br>
                        <div class="input-group input-daterange" data-date-format="dd/mm/yyyy">
                            <input type="text" id="example-daterange1" name="example-daterange1" class="form-control text-center" placeholder="From">
                            <span class="input-group-addon"><i class="fa fa-angle-right"></i></span>
                            <input type="text" id="example-daterange2" name="example-daterange2" class="form-control text-center" placeholder="To">
                        </div>
                    </div>
                </div>
                <div class="form-group form-actions text-center">
                    <div class="col-xs-12">
                        <button type="submit" class="btn btn-sm btn-primary col-xs-12">Search</button>
                    </div>
                </div>
            </form>
            <!-- END Input Grid Content -->
        </div>
        <!-- END Input Grid Block -->
    </div>

    <div class="row">
        <!-- Pie and Stacked Chart -->
        <div class="row">
            <div class="col-sm-6">
                <!-- Pie Chart Block -->
                <div class="block full">
                    <!-- Pie Chart Title -->
                    <div class="block-title">
                        <h2><strong>Pie</strong> Chart</h2>
                    </div>
                    <!-- END Pie Title -->

                    <!-- Pie Chart Content -->
                    <div id="chart-pie" class="chart"></div>
                    <!-- END Pie Chart Content -->
                </div>
                <!-- END Pie Chart Block -->
            </div>
        </div>
        <!-- END Pie and Stacked Chart -->
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