@extends('mr.layouts.master')
@section('title')
Single Report
@endsection

@section('content')
    <!-- Begin Breadcrumb -->
    <ul class="breadcrumb breadcrumb-top">
        <li><a href="{{URL::route('/')}}">Dashboard</a></li>
        <li><a href="{{URL::route('singleReport', $singleReport->id)}}">Single Report</a></li>
    </ul>
    <!-- END Breadcrumb -->

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <!-- Basic Form Elements Block -->
            <div class="block">
                <!-- Basic Form Elements Title -->
                <div class="block-title">
                    <div class="block-options pull-right">
                        <a href="{{URL::route('mrExportSingleReport',
                        array(\Request::segment(3), 'xlsx'))}}">
                            <img src="{{URL::asset('img/excel.png')}}" alt="">
                        </a>
                        |
                        <a href="{{URL::route('mrExportSingleReport',
                        array(\Request::segment(3), 'pdf'))
                        }}">
                            <img src="{{URL::asset('img/pdf.png')}}" alt="">
                        </a>
                    </div>
                    <h2><strong>Report</strong> Details </h2>
                </div>
                <!-- END Form Elements Title -->

                <!-- Basic Form Elements Content -->

                {!!
                Form::open([
                'role' 		=> 	'form',
                'method' 	=> 	'post',
                'class'		=>	'form-horizontal form-bordered'
                ])
                !!}

                <div class="form-group">
                    <label class="col-md-3 control-label">Date</label>
                    <div class="col-md-9">
                        <p class="form-control-static">{{$singleReport->date}}</p>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Doctor</label>
                    <div class="col-md-9">
                        <p class="form-control-static">{{$singleReport->doctor->name}}</p>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Promoted Products</label>
                    <div class="col-md-9">
                        @if($singleReport['promotedProducts'])
                        @foreach($singleReport['promotedProducts'] as $singlePromotedProduct)
                            <p class="label label-info">
                                {{$singlePromotedProduct->product->name}}
                            </p>
                        @endforeach
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Sample Products</label>
                    <div class="col-md-9">
                        @if($singleReport['sampleProducts'])
                        @foreach($singleReport['sampleProducts'] as $singleProduct)
                        <p class="label label-info">
                            {{$singleProduct->product->name}}
                        </p>
                        @endforeach
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Gifts</label>
                    <div class="col-md-9">
                        @if($singleReport['gifts'])
                        @foreach($singleReport['gifts'] as $singleGift)
                            <p class="label label-info">
                                {{$singleGift->gift->name}}
                            </p>
                        @endforeach
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Sold Products</label>
                    <div class="col-md-9">
                        @if($singleReport['soldProducts'])
                        @foreach($singleReport['soldProducts'] as $singleProduct)
                            <p class="label label-info">
                                {{$singleProduct->product->name}} [{{$singleProduct->quantity}} Units]
                            </p>
                        @endforeach
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Total Sold Products Price </label>
                    <div class="col-md-9">
                        <p class="form-control-static">{{$singleReport->total_sold_products_price}}</p>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Feedback</label>
                    <div class="col-md-9">
                        <p class="form-control-static">{{$singleReport->feedback}}</p>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Follow Up</label>
                    <div class="col-md-9">
                        <p class="form-control-static">{{$singleReport->follow_up}}</p>
                    </div>
                </div>

                @if(Request::segment(1) == 'mr')
                <div class="form-group">
                    <label class="col-md-3 control-label">Double Visit with</label>
                    <div class="col-md-9">
                        <p class="form-control-static">
                            {!! $singleReport->double_visit_manger_id != 'NULL' ? \App\Employee::findOrFail($singleReport->double_visit_manager_id)->name : "<i>N/A</i>" !!}
                        </p>
                    </div>
                </div>
                @endif
                <div class="form-group">
                    <label class="col-md-3 control-label">Location</label>
                    <div class="col-md-9">
                        <img class='group-google-maps-preview' src='http://maps.googleapis.com/maps/api/staticmap?size=500x400&center={{$singleReport->lat}},{{$singleReport->lon}}&zoom=16&size=200x200&sensor=false'>
                    </div>
                </div>
                {!! Form::close() !!}
                        <!-- END Basic Form Elements Content -->
            </div>
            <!-- END Basic Form Elements Block -->
        </div>
    </div>
@endsection

@section('custom_footer_scripts')
<script>$('#report').addClass('active');</script>
<script src="{{URL::asset('js/pages/tablesDatatables.js')}}"></script>
<script>$(function(){ TablesDatatables.init(); });</script>
@endsection