@extends('am.layouts.master')
@section('title')
    MR Achievements
@endsection

@section('content')
    <ul class="breadcrumb breadcrumb-top">
        <li><a href="{{URL::route('/')}}">Dashboard</a></li>
        <li><a href="{{URL::route('amMRAchievement')}}">MR Achievements</a></li>
    </ul>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <!-- Basic Form Elements Block -->
            <div class="block">
                <!-- Basic Form Elements Title -->
                <div class="block-title">
                    <h2><strong>MR </strong> Achievements </h2>
                </div>
                <!-- END Form Elements Title -->

                <!-- Basic Form Elements Content -->

                {!!
                Form::open([
                'route'     =>  'amDoMRAchievement',
                'id'        =>  'line_history',
                'role' 		=> 	'form',
                'method' 	=> 	'post',
                'class'		=>	'form-horizontal form-bordered'
                ])
                !!}

                @if(Session::has('message'))
                    <div class="form-group">
                        <div class="alert alert-danger alert-dismissable">
                            <i class="fa fa-warning"></i>
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <b> Warning : </b> {{ Session::get('message') }}
                        </div>
                    </div>
                @endif

                <div class="form-group">
                    <label class="col-md-2 control-label">Year</label>
                    <div class="col-md-10">
                        <select name="year" class="form-control select-chosen">
                            <option value="2015" @if(date('Y') == '2015') selected @endif>2015</option>
                            <option value="2016" @if(date('Y') == '2016') selected @endif>2016</option>
                            <option value="2017" @if(date('Y') == '2017') selected @endif>2017</option>
                            <option value="2018" @if(date('Y') == '2018') selected @endif>2018</option>
                            <option value="2019" @if(date('Y') == '2019') selected @endif>2019</option>
                            <option value="2020" @if(date('Y') == '2020') selected @endif>2020</option>
                        </select>
                        @if($errors->has('year'))
                            <div class="alert alert-danger">
                                <i class="fa fa-warning"></i>
                                <strong>Error :</strong> {{$errors->first('year')}}
                            </div>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">Month</label>
                    <div class="col-md-10">
                        <select name="month" class="form-control select-chosen">
                            <option value="">Select Month</option>
                            <option value="Jan">Jan</option>
                            <option value="Feb">Feb</option>
                            <option value="Mar">Mar</option>
                            <option value="Apr">Apr</option>
                            <option value="May">May</option>
                            <option value="Jun">Jun</option>
                            <option value="Jul">Jul</option>
                            <option value="Aug">Aug</option>
                            <option value="Sep">Sep</option>
                            <option value="Oct">Oct</option>
                            <option value="Nov">Nov</option>
                            <option value="Dec">Dec</option>
                        </select>
                        @if($errors->has('month'))
                            <div class="alert alert-danger">
                                <i class="fa fa-warning"></i>
                                <strong>Error :</strong> {{$errors->first('month')}}
                            </div>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">Medical Rep. </label>
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
@endsection

@section('custom_footer_scripts')
    <script>$('#line_history').addClass('active');</script>
    <script src="{{URL::asset('js/pages/tablesDatatables.js')}}"></script>
    <script>$(function(){ TablesDatatables.init(); });</script>
@endsection