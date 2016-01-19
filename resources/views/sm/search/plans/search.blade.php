@extends('sm.layouts.master')
@section('title')
    Plans Search
@endsection

@section('content')
    <ul class="breadcrumb breadcrumb-top">
        <li><a href="{{URL::route('/')}}">Dashboard</a></li>
        <li><a href="{{URL::route('smDoPlanSearch')}}">Plans Search</a></li>
    </ul>


    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <!-- Basic Form Elements Block -->
            <div class="block">
                <!-- Basic Form Elements Title -->
                <div class="block-title">
                    <h2><strong>Plans </strong> Search </h2>
                </div>
                <!-- END Form Elements Title -->

                <!-- Basic Form Elements Content -->
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
                            'route'     =>  'smDoPlanSearch',
                            'id'        =>  'plan_search',
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
                                    <select name="mrs[]" class="form-control select-chosen" multiple>
                                        @foreach($MRs as $singleMR)
                                            <option value="{{$singleMR->id}}">{{$singleMR->name}}</option>
                                        @endforeach
                                    </select>
                                    <span class="help-block">
                                        <i class="fa fa-info-circle"></i>
                                        <strong>You can search with multiple medical reps</strong>
                                    </span>
                                    @if($errors->has('mrs'))
                                        <div class="alert alert-danger">
                                            <i class="fa fa-warning"></i>
                                            <strong>Error :</strong> {{$errors->first('mrs')}}
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
                            'route'     =>  'amDoPlanSearch',
                            'id'        =>  'plan_search',
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
                                    <select name="mrs[]" class="form-control select-chosen" multiple>
                                        @foreach($MRs as $singleMR)
                                            <option value="{{$singleMR->id}}">{{$singleMR->name}}</option>
                                        @endforeach
                                    </select>
                                    <span class="help-block">
                                        <i class="fa fa-info-circle"></i>
                                        <strong>You can search with multiple area managers</strong>
                                    </span>
                                    @if($errors->has('mrs'))
                                        <div class="alert alert-danger">
                                            <i class="fa fa-warning"></i>
                                            <strong>Error :</strong> {{$errors->first('mrs')}}
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
                            {!!
                            Form::open([
                            'route'     =>  'amDoPlanSearch',
                            'id'        =>  'plan_search',
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
    <script>$('#plans_search').addClass('active');</script>
    <script src="{{URL::asset('js/pages/tablesDatatables.js')}}"></script>
    <script>$(function(){ TablesDatatables.init(); });</script>
@endsection