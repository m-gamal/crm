@extends('sm.layouts.master')
@section('title')
    List All Distributors
    @endsection

    @section('content')

    <!-- Dashboard Header -->
    <!-- For an image header add the class 'content-header-media' and an image as in the following example -->
    <div class="row">
        <!-- Input Grid Block -->
        <div class="block">
            <!-- Input Grid Title -->
            <div class="block-title">
                <h2>Distributors Lists</h2>
            </div>
            <!-- END Input Grid Title -->

            <div class="block">
                <div class="block-title">
                    <ul class="nav nav-tabs" data-toggle="tabs">
                        <li class="active">
                            <a href="#ucp_tab">
                                <i class="fa fa-calendar"></i>
                                UCP
                            </a>
                        </li>
                        <li>
                            <a href="#pos_tab">
                                <i class="fa fa-pie-chart"></i>
                                POS
                            </a>
                        </li>
                        <li>
                            <a href="#ibns_tab">
                                <i class="fa fa-file"></i>
                                IBNS
                            </a>
                        </li>
                    </ul>
                </div>


                <!-- Tabs Content -->
                <div class="tab-content">
                    <div class="tab-pane active" id="ucp_tab">
                        <div class="block-content-full">
                            <div class="portlet box green">
                                <div class="portlet-body">
                                    @foreach($ucpProducts as $key=>$singleProduct)
                                        <div class="panel-group accordion" id="ucp">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">
                                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#ucp" href="#product_{{$singleProduct['code']}}">
                                                            {{$singleProduct['product_name']}}
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="product_{{$singleProduct['code']}}" class="panel-collapse collapse">
                                                    <div class="panel-body">
                                                        <div class="table-responsive">
                                                            <table  class="ucp-datatable table table-vcenter table-condensed table-bordered">
                                                                <thead>
                                                                <tr>
                                                                    <th>Area</th>
                                                                    <th>Qty</th>
                                                                    <th>MRs Percent</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                @foreach($ucpAreas[$singleProduct['code']] as $key=>$singleAreaProduct)
                                                                    <tr>
                                                                        <td class="">{{$singleAreaProduct['area']}}</td>
                                                                        <td class="">{{$singleAreaProduct['quantity']}}</td>
                                                                        <td class="">
                                                                            @foreach((array)json_decode($singleAreaProduct['mrs_percents']) as $MR => $percent)
                                                                                @if(\App\Employee::isYourMRAsSM($MR))
                                                                                {{\App\Employee::findOrFail($MR)->name. ' ['. $percent*100 . '%]'}}
                                                                                @endif
                                                                            @endforeach
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="pos_tab">
                        <div class="block-content-full">
                            <div class="portlet box green">
                                <div class="portlet-body">
                                    @foreach($posProducts as $key=>$singleProduct)
                                        <div class="panel-group accordion" id="pos">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">
                                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#pos" href="#product_{{$singleProduct['code']}}">
                                                            {{$singleProduct['product_name']}}
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="product_{{$singleProduct['code']}}" class="panel-collapse collapse">
                                                    <div class="panel-body">
                                                        <div class="table-responsive">
                                                            <table class="pos-datatable table table-vcenter table-condensed table-bordered">
                                                                <thead>
                                                                <tr>
                                                                    <th>Area</th>
                                                                    <th>Qty</th>
                                                                    <th>MRs Percent</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                @foreach($posAreas[$singleProduct['code']] as $key=>$singleAreaProduct)
                                                                    <tr>
                                                                        <td class="">{{$singleAreaProduct['area']}}</td>
                                                                        <td class="">{{$singleAreaProduct['quantity']}}</td>
                                                                        <td class="">
                                                                            @foreach((array)json_decode($singleAreaProduct['mrs_percents']) as $MR => $percent)
                                                                                @if(\App\Employee::isYourMRAsSM($MR))
                                                                                    {{\App\Employee::findOrFail($MR)->name. ' ['. $percent*100 . '%]'}}
                                                                                @endif
                                                                            @endforeach
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="ibns_tab">
                        <div class="block-content-full">
                            <div class="portlet box green">
                                <div class="portlet-body">
                                    @foreach($ibnsProducts as $key=>$singleProduct)
                                    <div class="panel-group accordion" id="ibns">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#ibns" href="#product_{{$singleProduct['code']}}">
                                                        {{$singleProduct['product_name']}}
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="product_{{$singleProduct['code']}}" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <div class="table-responsive">
                                                        <table class="ibns-datatable table table-vcenter table-condensed table-bordered">
                                                            <thead>
                                                            <tr>
                                                                <th>Area</th>
                                                                <th>Qty</th>
                                                                <th>MRs Percent</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($ibnsAreas[$singleProduct['code']] as $key=>$singleAreaProduct)
                                                                <tr>
                                                                    <td class="">{{$singleAreaProduct['area']}}</td>
                                                                    <td class="">{{$singleAreaProduct['quantity']}}</td>
                                                                    <td class="">
                                                                        @foreach((array)json_decode($singleAreaProduct['mrs_percents']) as $MR => $percent)
                                                                            @if(\App\Employee::isYourMRAsSM($MR))
                                                                                {{\App\Employee::findOrFail($MR)->name. ' ['. $percent*100 . '%]'}}
                                                                            @endif
                                                                        @endforeach
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    @endforeach
                                </div>
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

    <script>$('#distributor').addClass('active');</script>
    <script src="{{URL::asset('js/pages/tablesDatatables.js')}}"></script>
    <script>$(function(){ TablesDatatables.init(); });</script>
@endsection