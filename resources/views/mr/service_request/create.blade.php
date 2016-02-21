@extends('mr.layouts.master')
@section('title')
    Add New Service Request
@endsection

@section('content')
    <ul class="breadcrumb breadcrumb-top">
        <li><a href="{{URL::route('/')}}">Dashboard</a></li>
        <li><a href="{{URL::route('addServiceRequest')}}">Add New Service Request</a></li>
    </ul>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <!-- Basic Form Elements Block -->
            <div class="block">
                <!-- Basic Form Elements Title -->
                <div class="block-title">
                    <h2><strong>Add New </strong> Service Request</h2>
                </div>
                <!-- END Form Elements Title -->

                <!-- Basic Form Elements Content -->

                {!!
                Form::open([
                'route' 	=> 	'doAddServiceRequest',
                'role' 		=> 	'form',
                'method' 	=> 	'post',
                'class'		=>	'form-horizontal form-bordered',
                'files'     =>  true
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
                        <label class="col-md-2 control-label">Year</label>
                        <div class="col-md-10">
                            <p class="form-control-static">{{date('Y')}}</p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Month</label>
                        <div class="col-md-10">
                            <select name="month" class="form-control select-chosen">
                                <option value="">Select Month</option>
                                <option value="Jan" @if(date('M') == 'Jan') selected @endif >Jan</option>
                                <option value="Feb" @if(date('M') == 'Feb') selected @endif>Feb</option>
                                <option value="Mar" @if(date('M') == 'Mar') selected @endif>Mar</option>
                                <option value="Apr" @if(date('M') == 'Apr') selected @endif>Apr</option>
                                <option value="May" @if(date('M') == 'May') selected @endif>May</option>
                                <option value="Jun" @if(date('M') == 'Jun') selected @endif>Jun</option>
                                <option value="Jul" @if(date('M') == 'Jul') selected @endif>Jul</option>
                                <option value="Aug" @if(date('M') == 'Aug') selected @endif>Aug</option>
                                <option value="Sep" @if(date('M') == 'Sep') selected @endif>Sep</option>
                                <option value="Oct" @if(date('M') == 'Oct') selected @endif>Oct</option>
                                <option value="Nov" @if(date('M') == 'Nov') selected @endif>Nov</option>
                                <option value="Dec" @if(date('M') == 'Des') selected @endif>Dec</option>
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
                        <label class="col-md-2 control-label">Date</label>
                        <div class="col-md-10">
                            <input type="text" name="date" class="form-control input-datepicker" data-date-format="dd-mm-yyy" placeholder="dd-mm-yyyy" value="{{date('d-m-Y')}}">
                            @if($errors->has('date'))
                                <div class="alert alert-danger">
                                    <i class="fa fa-warning"></i>
                                    <strong>Error :</strong> {{$errors->first('date')}}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Request Text</label>
                        <div class="col-md-10">
                            <textarea name="request_text" rows="5" class="form-control"></textarea>
                            @if($errors->has('request_text'))
                                <div class="alert alert-danger">
                                    <i class="fa fa-warning"></i>
                                    <strong>Error :</strong> {{$errors->first('request_text')}}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group form-actions">
                        <div class="col-md-8 col-md-offset-4">
                            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-angle-right"></i> Submit</button>
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
    <script>$('#service_request').addClass('active');</script>
@endsection