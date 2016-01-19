@extends('am.layouts.master')
@section('title')
    Line
@endsection

@section('content')
        <!-- Line Content -->
    <!-- Dashboard Header -->
    <!-- For an image header add the class 'content-header-media' and an image as in the following example -->
    <div class="content-header content-header-media">
        <!-- For best results use an image with a resolution of 2560x248 pixels (You can also use a blurred image with ratio 10:1 - eg: 1000x100 pixels - it will adjust and look great!) -->
        <img src="{{URL::asset('img/placeholders/headers/dashboard_header.jpg')}}" alt="header image" class="animation-pulseSlow">
    </div>
    <!-- END Dashboard Header -->


    <div class="row">
        @if(Session::has('message'))
            <div class="col-md-12">
                <div class="alert alert-info">
                    <i class="fa fa-history"></i>
                    {!!  Session::get('message')  !!}
                </div>
            </div>
        @endif
        <div class="col-sm-3">
            <!-- Quick Month Stats Block -->
            <div class="block">
                <!-- Quick Month Stats Title -->
                <div class="block-title">
                    <h2><i class="gi gi-charts"></i> Quick <strong>Stats</strong></h2>
                </div>
                <!-- END Quick Month Stats Title -->

                <!-- Quick Month Stats Content -->
                <table class="table table-striped table-borderless table-vcenter">
                    <tbody>
                    <tr>
                        <td>
                            <i class="fa fa-road"></i>
                            <strong>Customers</strong>
                        </td>
                        <td>{{count($doctors)}}</td>
                    </tr>
                    <tr>
                        <td>
                            <i class="fa fa-black-tie"></i>
                            <strong>Managers</strong>
                        </td>
                        <td>3</td>
                    </tr>
                    <tr>
                        <td>
                            <i class="fa fa-cube"></i>
                            <strong>Products</strong>
                        </td>
                        <td>{{count($products)}}</td>
                    </tr>

                    <tr>
                        <td>
                            <i class="fa fa-pie-chart"></i>
                            <strong>Month Coverage</strong>
                        </td>
                        <td>{{$totalMonthlyCoverage}} % </td>
                    </tr>
                    <tr>
                        <td>
                            <i class="fa fa-money"></i>
                            <strong>Month Sales</strong>
                        </td>
                        <td>{{$totalSoldProductsSalesPrice}}</td>
                    </tr>
                    </tbody>
                </table>
                <!-- END Quick Month Stats Content -->
            </div>
            <!-- END Quick Month Stats Block -->

            <div class="block">
                <div class="alert alert-info">
                    <i class="fa fa-download"></i>
                    <a href="#"> Download Doctors List </a>
                </div>
            </div>
        </div>

        <div class="col-sm-9">
            <div class="block">
                <div class="block-title">
                    <ul class="nav nav-tabs" data-toggle="tabs">
                        <li class="active">
                            <a href="#customers_tab">
                                <i class="fa fa-stethoscope"></i>
                                Customers
                            </a>
                        </li>

                        <li>
                            <a href="#managers_tab">
                                <i class="fa fa-black-tie"></i>
                                Managers
                            </a>
                        </li>

                        <li>
                            <a href="#products_tab">
                                <i class="fa fa-cube"></i>
                                Products
                            </a>
                        </li>
                        <li>
                            <a href="#coverage_tab">
                                <i class="fa fa-pie-chart"></i>
                                Coverage
                            </a>
                        </li>
                        <li>
                            <a href="#sales_tab">
                                <i class="fa fa-money"></i>
                                Sales
                            </a>
                        </li>
                        <li>
                            <a href="#history_tab">
                                <i class="fa fa-history"></i>
                                Previous Lines
                            </a>
                        </li>
                    </ul>
                </div>


                <!-- Tabs Content -->
                <div class="tab-content">
                    <!-- Begin Customers -->
                    <div class="tab-pane active" id="customers_tab">
                        <div class="block-content-full">
                            <div class="table-responsive">
                                <table id="customers-table" class="table table-vcenter table-condensed table-bordered">
                                    <thead>
                                    <tr>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">Description Name</th>
                                        <th class="text-center">Total Visits</th>
                                        <th class="text-center">Remaining Visits </th>
                                        <th class="text-center"> Products Bought </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($doctors as $singleDoctor)
                                        <tr>
                                            <td class="text-center"><a href="{{URL::route('singleDoctor', $singleDoctor->id)}}">{{$singleDoctor->name}}</a></td>
                                            <td class="text-center">{{$singleDoctor->description_name}}</td>
                                            <td class="text-center">{{$singleDoctor->visitClass->visits_count}}</td>
                                            <td class="text-center">{{$singleDoctor->visitClass->visits_count - $actualVisits[$singleDoctor->id]}}</td>
                                            <td class="text-center">
                                                <a href="" data-toggle="modal" data-target="#bought_products_{{$singleDoctor->id}}">
                                                    <i class="fa fa-eye" ></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @include('mr.modal.monthly_customer_products', $doctors)
                    </div>
                    <!-- END Customers -->

                    <!-- Begin Managers -->
                    <div class="tab-pane" id="managers_tab">
                        <div class="block-content-full">
                            <div class="table-responsive">
                                <table id="managers-table" class="table table-vcenter table-condensed table-bordered">
                                    <thead>
                                    <tr>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">Job</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($allManagers as $singleManager)
                                        <tr>
                                            <td class="text-center">{{$singleManager->name}}</td>
                                            <td class="text-center">{{$singleManager->level->title}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- END Manager -->

                    <!-- Begin Product -->
                    <div class="tab-pane" id="products_tab">
                        <div class="block-content-full">
                            <div class="table-responsive">
                                <table id="products-table" class="table table-vcenter table-condensed table-bordered">
                                    <thead>
                                    <tr>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">Price</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($products as $singleProduct)
                                        <tr>
                                            <td class="text-center">{{$singleProduct->name}}</td>
                                            <td class="text-center">{{$singleProduct->unit_price}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- END Product -->

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
                    </div>
                    <!-- END Coverage -->

                    <!-- Begin Sales -->
                    <div class="tab-pane" id="sales_tab">
                        <div class="row">
                            <div class="col-md-3">
                                <ul class="nav nav-pills nav-stacked">
                                    <li class="active">
                                        <a href="#direct" data-toggle="tab"> Direct </a>
                                    </li>
                                    <li>
                                        <a href="#indirect" tabindex="-1" data-toggle="tab"> Indirect </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-9">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="direct">
                                        <div class="block-content-full">
                                            <div class="table-responsive">
                                                <table id="sales-table" class="table table-vcenter table-condensed table-bordered">
                                                    <thead>
                                                    <tr>
                                                        <th class="text-center">Name</th>
                                                        <th class="text-center">Sold Quantity</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($totalSoldProductsSales as $product=>$quantity)
                                                        <tr>
                                                            <td class="text-center">{{$product}}</td>
                                                            <td class="text-center">{{$quantity}} Units</td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="indirect">
                                        <p> N/A </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END Sales -->

                    <!-- BEGIN HISTORY -->
                    <div class="tab-pane" id="history_tab">
                        <div class="block-content-full">
                            <div class="table-responsive">
                                <table id="mr-lines-table" class="table table-vcenter table-condensed table-bordered">
                                    <thead>
                                    <tr>
                                        <th class="text-center">Line</th>
                                        <th class="text-center">From</th>
                                        <th class="text-center">To</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($MRLines as $singleMRLine)
                                        <tr>
                                            <td class="text-center">{{$singleMRLine->line->title}}</td>
                                            <td class="text-center">{{$singleMRLine->from}}</td>
                                            <td class="text-center">{!! !is_null($singleMRLine->to) ? $singleMRLine->to: '<i><strong>NOW</strong></i>' !!}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- END HISTORY -->
                </div>
                <!-- END Tabs Content -->
            </div>
        </div>
    </div>
    <!-- END Line Content -->
@endsection

@section('custom_footer_scripts')
<script>$('#details').addClass('active');</script>
<script src="{{URL::asset('js/pages/tablesDatatables.js')}}"></script>
<script>$(function(){ TablesDatatables.init(); });</script>
<script>
    // global app configuration object
    var config = {
        routes: [
            { coverage  : "{{URL::route('ajaxCoverageBySpecialty') }}"},
        ]
    };
</script>
<script src="{{URL::asset('js/mr/coverage.js')}}"></script>
@endsection