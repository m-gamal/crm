@extends('admin.layouts.master')
@section('title')
Single Report
@endsection

@section('content')
    <!-- Begin Breadcrumb -->
    <ul class="breadcrumb breadcrumb-top">
        <li><a href="{{URL::route('/')}}">Dashboard</a></li>
        <li><a href="{{URL::route('adminSingleReport', $singleReport->id)}}">Single Report</a></li>
    </ul>
    <!-- END Breadcrumb -->

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <!-- Basic Form Elements Block -->
            <div class="block">
                <!-- Basic Form Elements Title -->
                <div class="block-title">
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
                        @if(!empty($singleReport['promotedProducts']))
                        @foreach($singleReport['promotedProducts'] as $singleProduct)
                            <p class="form-control-static">
                                <label class="label label-info"> {{$singleProduct->product->name}} </label>
                            </p>
                        @endforeach
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Sample Products</label>
                    <div class="col-md-9">
                        @if(!empty($singleReport['sampleProducts']))
                        @foreach($singleReport['sampleProducts'] as $singleProduct)
                        <p class="form-control-static">
                            <label class="label label-info"> {{$singleProduct->product->name}} </label>
                        </p>
                        @endforeach
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Gifts</label>
                    <div class="col-md-9">
                        @if(!empty($singleReport['gifts']))
                        @foreach($singleReport['gifts'] as $singleGift)
                            <p class="form-control-static">
                                <label class="label label-info"> {{$singleGift->gift->name}} </label>
                            </p>
                        @endforeach
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Sold Products</label>
                    <div class="col-md-9">
                        @if(!empty($singleReport['soldProducts']))
                        @foreach($singleReport['soldProducts'] as $singleProduct)
                            <p class="form-control-static">
                                <label class="label label-info"> {{$singleProduct->product->name}} </label>
                                <label class="label label-danger">[Quantity : {{$singleProduct->quantity}} Unit/s]</label>
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
                {!! Form::close() !!}
                        <!-- END Basic Form Elements Content -->
            </div>
            <!-- END Basic Form Elements Block -->
        </div>
    </div>
@endsection

@section('custom_footer_scripts')
<script>$('#reports_search').addClass('active');</script>
<script src="{{URL::asset('js/pages/tablesDatatables.js')}}"></script>
<script>$(function(){ TablesDatatables.init(); });</script>
@endsection