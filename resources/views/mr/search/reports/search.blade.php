@extends('mr.layouts.master')
@section('title')
    Report Search
@endsection

@section('content')
    <ul class="breadcrumb breadcrumb-top">
        <li><a href="{{URL::route('/')}}">Dashboard</a></li>
        <li><a href="{{URL::route('doReportSearch')}}">Reports Search</a></li>
    </ul>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <!-- Basic Form Elements Block -->
            <div class="block">
                <!-- Basic Form Elements Title -->
                <div class="block-title">
                    <h2><strong>Reports </strong> Search </h2>
                </div>
                <!-- END Form Elements Title -->

                <!-- Basic Form Elements Content -->

                {!!
                Form::open([
                'route'     =>  'doReportSearch',
                'id'        =>  'sales_search',
                'role' 		=> 	'form',
                'method' 	=> 	'post',
                'class'		=>	'form-horizontal form-bordered'
                ])
                !!}
                @if(Session::has('message'))
                    <div class="form-group">
                        <div class="alert alert-success alert-dismissable">
                            <i class="fa fa-check"></i>
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <b> Success : </b> {{ Session::get('message') }}
                        </div>
                    </div>
                @endif

                <div class="form-group">
                    <label class="col-md-2 control-label">Date From</label>
                    <div class="col-md-10">
                        <input type="text" name="date_from" class="form-control input-datepicker" data-date-format="dd-mm-yyyy" placeholder="dd-mm-yyyy"
                               value="{{old('date_from')}}">
                        @if($errors->has('date_from'))
                            <div class="alert alert-danger">
                                <i class="fa fa-warning"></i>
                                <strong>Error :</strong> {{$errors->first('date_from')}}
                            </div>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">Date To</label>
                    <div class="col-md-10">
                        <input type="text" name="date_to" class="form-control input-datepicker" data-date-format="dd-mm-yyyy" placeholder="dd-mm-yyyy"
                               value="{{old('date_to')}}">
                        @if($errors->has('date_to'))
                            <div class="alert alert-danger">
                                <i class="fa fa-warning"></i>
                                <strong>Error :</strong> {{$errors->first('date_to')}}
                            </div>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">Doctors</label>
                    <div class="col-md-10">
                        <select name="doctors[]" id="doctors_list" class="form-control select-chosen" multiple>
                            <option value="">Select Doctor</option>
                            @foreach($doctors as $singleDoctor)
                                <option value="{{$singleDoctor->id}}">{{$singleDoctor->name}}</option>
                            @endforeach
                        </select>
                        <span class="help-block">
                            <i class="fa fa-info-circle"></i>
                            <strong>You can search with multiple doctors</strong>
                        </span>
                        @if($errors->has('doctors'))
                            <div class="alert alert-danger">
                                <i class="fa fa-warning"></i>
                                <strong>Error :</strong> {{$errors->first('doctors')}}
                            </div>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">Promoted Products</label>
                    <div class="col-md-10">
                        <select name="promoted_product" class="form-control select-chosen">
                            <option value="">Select Product</option>
                            @foreach($products as $singleProduct)
                                <option value="{{$singleProduct->id}}">{{$singleProduct->name}}</option>
                            @endforeach
                        </select>
                        @if($errors->has('promoted_product'))
                            <div class="alert alert-danger">
                                <i class="fa fa-warning"></i>
                                <strong>Error :</strong> {{$errors->first('promoted_product')}}
                            </div>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">Samples Products</label>
                    <div class="col-md-10">
                        <select name="sample_product" class="form-control select-chosen">
                            <option value="">Select Product</option>
                            @foreach($products as $singleProduct)
                                <option value="{{$singleProduct->id}}">{{$singleProduct->name}}</option>
                            @endforeach
                        </select>
                        @if($errors->has('sample_product'))
                            <div class="alert alert-danger">
                                <i class="fa fa-warning"></i>
                                <strong>Error :</strong> {{$errors->first('sample_product')}}
                            </div>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">Gifts</label>
                    <div class="col-md-10">
                        <select name="gift" class="form-control select-chosen">
                            <option value="">Select Gift</option>
                            @foreach($gifts as $singleGift)
                                <option value="{{$singleGift->id}}">{{$singleGift->name}}</option>
                            @endforeach
                        </select>
                        @if($errors->has('gift'))
                            <div class="alert alert-danger">
                                <i class="fa fa-warning"></i>
                                <strong>Error :</strong> {{$errors->first('gift')}}
                            </div>
                        @endif
                    </div>
                </div>

                <div class="form-group" id="sold_product_form">
                    <label class="col-md-2 control-label">Sold Products</label>
                    <div class="col-md-10">
                        <select name="sold_product" id="sold_product" class="form-control select-chosen">
                            <option value="">Select Product</option>
                            @foreach($products as $singleProduct)
                                <option value="{{$singleProduct->id}}">{{$singleProduct->name}}</option>
                            @endforeach
                        </select>
                        @if($errors->has('sold_product'))
                            <div class="alert alert-danger">
                                <i class="fa fa-warning"></i>
                                <strong>Error :</strong> {{$errors->first('sold_product')}}
                            </div>
                        @endif
                    </div>
                </div>

                <div class="form-group" id="sold_product_form">
                    <label class="col-md-2 control-label">Has Follow Up</label>
                    <div class="col-md-10">
                        <input type="checkbox" name="follow_up" value="1">
                        @if($errors->has('follow_up'))
                            <div class="alert alert-danger">
                                <i class="fa fa-warning"></i>
                                <strong>Error :</strong> {{$errors->first('follow_up')}}
                            </div>
                        @endif
                    </div>
                </div>

                <div class="form-group" id="sold_product_form">
                    <label class="col-md-2 control-label">Has Feedback</label>
                    <div class="col-md-10">
                        <input type="checkbox" name="feedback" value="1">
                        @if($errors->has('feedback'))
                            <div class="alert alert-danger">
                                <i class="fa fa-warning"></i>
                                <strong>Error :</strong> {{$errors->first('feedback')}}
                            </div>
                        @endif
                    </div>
                </div>

                <div class="form-group form-actions">
                    <div class="col-md-8 col-md-offset-4">
                        <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-angle-right"></i> Search</button>
                        <button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> Reset</button>
                    </div>
                </div>
                <!-- END Select Components Content -->

                {!! Form::close() !!}
                        <!-- END Basic Form Elements Content -->
            </div>
            <!-- END Basic Form Elements Block -->
        </div>
    </div>

    <div class="row" id="search_result" style="display: none;">
        <!-- Datatables Content -->
        <div class="block full">
            <div class="block-title">
                <h2>
                    <strong>Report</strong> Search Result
                </h2>

            </div>

            <div class="table-responsive">
                <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                    <thead>
                    <tr>
                        <th class="text-center">Product Name</th>
                        <th class="text-center">Sold Quantity</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center">1</td>
                            <td class="text-center">2</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END Datatables Content -->
    </div>
@endsection

@section('custom_footer_scripts')
    <script>$('#reports_search').addClass('active');</script>
    <script src="{{URL::asset('js/pages/tablesDatatables.js')}}"></script>
    <script>$(function(){ TablesDatatables.init(); });</script>
@endsection