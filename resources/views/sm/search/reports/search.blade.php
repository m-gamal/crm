@extends('sm.layouts.master')
@section('title')
    Report Search
@endsection

@section('content')
    <ul class="breadcrumb breadcrumb-top">
        <li><a href="{{URL::route('/')}}">Dashboard</a></li>
        <li><a href="{{URL::route('smDoReportSearch')}}">Reports Search</a></li>
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

                <div class="block">
                    <div class="block-title">
                        <ul class="nav nav-tabs" data-toggle="tabs">
                            <li class="active">
                                <a href="#mr_tab">
                                    <i class="fa fa-users"></i>
                                    Medical Reps
                                </a>
                            </li>
                            <li>
                                <a href="#am_tab">
                                    <i class="fa fa-users"></i>
                                    Area Managers
                                </a>
                            </li>
                            <li>
                                <a href="#yours_tab">
                                    <i class="fa fa-user"></i>
                                    Yours
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="tab-content">
                        <div class="tab-pane active" id="mr_tab">
                            {!!
                            Form::open([
                            'route'     =>  'smAMDoReportSearch',
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
                                    <input type="text" name="date_from" class="form-control input-datepicker" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd"
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
                                    <input type="text" name="date_to" class="form-control input-datepicker" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd"
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
                                <label class="col-md-2 control-label">Area Manager</label>
                                <div class="col-md-10">
                                    <select name="mr" class="form-control select-chosen">
                                        <option value="">Select Area Manager</option>
                                        @foreach($AMs as $singleAM)
                                            <option value="{{$singleAM->id}}">{{$singleAM->name}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('am'))
                                        <div class="alert alert-danger">
                                            <i class="fa fa-warning"></i>
                                            <strong>Error :</strong> {{$errors->first('am')}}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Doctor</label>
                                <div class="col-md-10">
                                    <select name="doctor" id="doctors_list" class="form-control select-chosen">
                                        <option value="">Select Doctor</option>
                                        @foreach($doctors as $singleDoctor)
                                            <option value="{{$singleDoctor->id}}">{{$singleDoctor->name}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('doctor'))
                                        <div class="alert alert-danger">
                                            <i class="fa fa-warning"></i>
                                            <strong>Error :</strong> {{$errors->first('doctor')}}
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
                        <div class="tab-pane" id="am_tab">
                            {!!
                            Form::open([
                            'route'     =>  'smDoReportSearch',
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
                                    <input type="text" name="date_from" class="form-control input-datepicker" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd"
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
                                    <input type="text" name="date_to" class="form-control input-datepicker" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd"
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
                                <label class="col-md-2 control-label">Medical Rep</label>
                                <div class="col-md-10">
                                    <select name="mr" class="form-control select-chosen">
                                        <option value="">Select Medical Rep.</option>
                                        @foreach($MRs as $singleMR)
                                            <option value="{{$singleMR->id}}">{{$singleMR->name}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('mr'))
                                        <div class="alert alert-danger">
                                            <i class="fa fa-warning"></i>
                                            <strong>Error :</strong> {{$errors->first('mr')}}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Doctor</label>
                                <div class="col-md-10">
                                    <select name="doctor" id="doctors_list" class="form-control select-chosen">
                                        <option value="">Select Doctor</option>
                                        @foreach($doctors as $singleDoctor)
                                            <option value="{{$singleDoctor->id}}">{{$singleDoctor->name}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('doctor'))
                                        <div class="alert alert-danger">
                                            <i class="fa fa-warning"></i>
                                            <strong>Error :</strong> {{$errors->first('doctor')}}
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


                        <div class="tab-pane" id="yours_tab">
                            <!-- Basic Form Elements Content -->
                            {!!
                            Form::open([
                            'route'     =>  'amDoReportSearch',
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
                                    <input type="text" name="date_from" class="form-control input-datepicker" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd"
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
                                    <input type="text" name="date_to" class="form-control input-datepicker" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd"
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
                                <label class="col-md-2 control-label">Doctor</label>
                                <div class="col-md-10">
                                    <select name="doctor" id="doctors_list" class="form-control select-chosen">
                                        <option value="">Select Doctor</option>
                                        @foreach($doctors as $singleDoctor)
                                            <option value="{{$singleDoctor->id}}">{{$singleDoctor->name}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('doctor'))
                                        <div class="alert alert-danger">
                                            <i class="fa fa-warning"></i>
                                            <strong>Error :</strong> {{$errors->first('doctor')}}
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
                    </div>
                </div>
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