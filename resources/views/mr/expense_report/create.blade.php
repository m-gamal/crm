@extends('mr.layouts.master')
@section('title')
    Add New Expense Report
@endsection

@section('content')
    <ul class="breadcrumb breadcrumb-top">
        <li><a href="{{URL::route('/')}}">Dashboard</a></li>
        <li><a href="{{URL::route('addExpenseReport')}}">Add New Expense Report</a></li>
    </ul>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <!-- Basic Form Elements Block -->
            <div class="block">
                <!-- Basic Form Elements Title -->
                <div class="block-title">
                    <h2><strong>Add New </strong> Expense Report</h2>
                </div>
                <!-- END Form Elements Title -->

                <!-- Basic Form Elements Content -->

                {!!
                Form::open([
                'route' 	=> 	'doAddExpenseReport',
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
                        <label class="col-md-2 control-label">Serial</label>
                        <div class="col-md-10">
                            <input type="text" name="serial" class="form-control" placeholder="Serial">
                            @if($errors->has('serial'))
                                <div class="alert alert-danger">
                                    <i class="fa fa-warning"></i>
                                    <strong>Error :</strong> {{$errors->first('serial')}}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Date</label>
                        <div class="col-md-10">
                            <input type="text" name="date" class="form-control input-datepicker" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd">
                            @if($errors->has('date'))
                                <div class="alert alert-danger">
                                    <i class="fa fa-warning"></i>
                                    <strong>Error :</strong> {{$errors->first('date')}}
                                </div>
                            @endif
                        </div>
                    </div>
                    <!-- Jquery Tags Input (class is initialized in js/app.js -> uiInit()), for extra usage examples you can check out https://github.com/xoxco/jQuery-Tags-Input -->
                    <fieldset>
                        <legend><i class="fa fa-angle-right"></i> Hotel Accommodation </legend>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Hotel</label>
                            <div class="col-md-10">
                                <input type="text" name="hotel" class="form-control" placeholder="Hotel">
                                @if($errors->has('hotel'))
                                    <div class="alert alert-danger">
                                        <i class="fa fa-warning"></i>
                                        <strong>Error :</strong> {{$errors->first('hotel')}}
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label">Meals</label>
                            <div class="col-md-10">
                                <input type="text" name="meals" class="form-control" placeholder="Meals">
                                @if($errors->has('meals'))
                                    <div class="alert alert-danger">
                                        <i class="fa fa-warning"></i>
                                        <strong>Error :</strong> {{$errors->first('meals')}}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </fieldset>

                    <fieldset>
                        <legend><i class="fa fa-angle-right"></i> Transportation </legend>
                        <div class="form-group">
                            <label class="col-md-2 control-label">City</label>
                            <div class="col-md-10">
                                <input type="text" name="city" class="form-control" placeholder="City">
                                @if($errors->has('city'))
                                    <div class="alert alert-danger">
                                        <i class="fa fa-warning"></i>
                                        <strong>Error :</strong> {{$errors->first('city')}}
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label">Cost</label>
                            <div class="col-md-10">
                                <input type="text" name="cost" class="form-control" placeholder="Cost">
                                @if($errors->has('cost'))
                                    <div class="alert alert-danger">
                                        <i class="fa fa-warning"></i>
                                        <strong>Error :</strong> {{$errors->first('cost')}}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </fieldset>

                    <fieldset>
                        <legend></legend>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Group Meeting</label>
                            <div class="col-md-10">
                                <input type="text" name="group_meeting" class="form-control" placeholder="Group Meeting">
                                @if($errors->has('group_meeting'))
                                    <div class="alert alert-danger">
                                        <i class="fa fa-warning"></i>
                                        <strong>Error :</strong> {{$errors->first('group_meeting')}}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Used Facilities</label>
                            <div class="col-md-10">
                                <input type="text" name="used_facilities" class="form-control" placeholder="Used Facilities">
                                @if($errors->has('used_facilities'))
                                    <div class="alert alert-danger">
                                        <i class="fa fa-warning"></i>
                                        <strong>Error :</strong> {{$errors->first('used_facilities')}}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </fieldset>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Description</label>
                        <div class="col-md-10">
                            <textarea rows="6" name="description" class="form-control"></textarea>
                            @if($errors->has('description'))
                                <div class="alert alert-danger">
                                    <i class="fa fa-warning"></i>
                                    <strong>Error :</strong> {{$errors->first('description')}}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Total</label>
                        <div class="col-md-10">
                            <input type="text" name="total" class="form-control" placeholder="Total">
                            @if($errors->has('total'))
                                <div class="alert alert-danger">
                                    <i class="fa fa-warning"></i>
                                    <strong>Error :</strong> {{$errors->first('total')}}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Invoices</label>
                        <div class="col-md-10">
                            <input type="file" name="invoices" class="form-control" multiple="multiple">
                            @if($errors->has('invoices'))
                                <div class="alert alert-danger">
                                    <i class="fa fa-warning"></i>
                                    <strong>Error :</strong> {{$errors->first('invoices')}}
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
    <script>$('#expense_report').addClass('active');</script>
@endsection