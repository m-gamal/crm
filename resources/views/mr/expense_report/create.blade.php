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
                            <input type="text" name="year" class="form-control" placeholder="Year" value="{{date('Y')}}">
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
                    <fieldset id="hotel">
                        <legend><i class="fa fa-angle-right"></i>
                            Hotel Accommodation
                            <a id="new_hotel" class="control-label" href="#"><i class="fa fa-plus"></i></a>
                        </legend>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Date</label>
                            <div class="col-md-10">
                                <input type="text" name="hotel_date" class="form-control input-datepicker" data-date-format="dd-mm-yyyy" placeholder="dd-mm-yyyy">
                                @if($errors->has('hotel_date'))
                                    <div class="alert alert-danger">
                                        <i class="fa fa-warning"></i>
                                        <strong>Error :</strong> {{$errors->first('hotel_date')}}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <!-- Jquery Tags Input (class is initialized in js/app.js -> uiInit()), for extra usage examples you can check out https://github.com/xoxco/jQuery-Tags-Input -->
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
                                <input type="text" name="hotel_meal" class="form-control" placeholder="Meals">
                                @if($errors->has('hotel_meal'))
                                    <div class="alert alert-danger">
                                        <i class="fa fa-warning"></i>
                                        <strong>Error :</strong> {{$errors->first('hotel_meal')}}
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label">Cost</label>
                            <div class="col-md-10">
                                <input type="text" name="hotel_cost" class="form-control" placeholder="Total">
                                @if($errors->has('hotel_cost'))
                                    <div class="alert alert-danger">
                                        <i class="fa fa-warning"></i>
                                        <strong>Error :</strong> {{$errors->first('hotel_cost')}}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </fieldset>
                    <fieldset class="extra_hotel" style="display:none;">
                        <legend><i class="fa fa-angle-right"></i> Hotel Accommodation </legend>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Date</label>
                            <div class="col-md-10">
                                <input type="text" name="extra_hotel_date[]" class="form-control datepicker_recurring_start" data-date-format="dd-mm-yyyy" placeholder="dd-mm-yyyy">
                                @if($errors->has('extra_hotel_date'))
                                    <div class="alert alert-danger">
                                        <i class="fa fa-warning"></i>
                                        <strong>Error :</strong> {{$errors->first('extra_hotel_date')}}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <!-- Jquery Tags Input (class is initialized in js/app.js -> uiInit()), for extra usage examples you can check out https://github.com/xoxco/jQuery-Tags-Input -->
                        <div class="form-group">
                            <label class="col-md-2 control-label">Hotel</label>
                            <div class="col-md-10">
                                <input type="text" name="extra_hotel[]" class="form-control" placeholder="Hotel">
                                @if($errors->has('extra_hotel'))
                                    <div class="alert alert-danger">
                                        <i class="fa fa-warning"></i>
                                        <strong>Error :</strong> {{$errors->first('extra_hotel')}}
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label">Meals</label>
                            <div class="col-md-10">
                                <input type="text" name="extra_hotel_meal[]" class="form-control" placeholder="Meals">
                                @if($errors->has('extra_hotel_meal'))
                                    <div class="alert alert-danger">
                                        <i class="fa fa-warning"></i>
                                        <strong>Error :</strong> {{$errors->first('extra_hotel_meal')}}
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label">Cost</label>
                            <div class="col-md-10">
                                <input type="text" name="extra_hotel_cost[]" class="form-control" placeholder="Total">
                                @if($errors->has('extra_hotel_cost'))
                                    <div class="alert alert-danger">
                                        <i class="fa fa-warning"></i>
                                        <strong>Error :</strong> {{$errors->first('extra_hotel_cost')}}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </fieldset>

                    <fieldset id="transportation">
                        <legend>
                            <i class="fa fa-angle-right"></i>
                            Transportation
                            <a id="new_transportation" class="control-label" href=""><i class="fa fa-plus"></i></a>
                        </legend>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Date</label>
                            <div class="col-md-10">
                                <input type="text" name="transportation_date" class="form-control input-datepicker" data-date-format="dd-mm-yyyy" placeholder="dd-mm-yyyy">
                                @if($errors->has('transportation_date'))
                                    <div class="alert alert-danger">
                                        <i class="fa fa-warning"></i>
                                        <strong>Error :</strong> {{$errors->first('transportation_date')}}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">City</label>
                            <div class="col-md-10">
                                <input type="text" name="transportation_city" class="form-control" placeholder="City">
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
                                <input type="text" name="transportation_cost" class="form-control" placeholder="Cost">
                                @if($errors->has('transportation_cost'))
                                    <div class="alert alert-danger">
                                        <i class="fa fa-warning"></i>
                                        <strong>Error :</strong> {{$errors->first('transportation_cost')}}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </fieldset>

                    <fieldset class="extra_transportation" style="display: none;">
                        <legend><i class="fa fa-angle-right"></i> Transportation </legend>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Date</label>
                            <div class="col-md-10">
                                <input type="text" name="extra_transportation_date[]" class="form-control datepicker_recurring_start" data-date-format="dd-mm-yyyy" placeholder="dd-mm-yyyy">
                                @if($errors->has('extra_transportation_date'))
                                    <div class="alert alert-danger">
                                        <i class="fa fa-warning"></i>
                                        <strong>Error :</strong> {{$errors->first('extra_transportation_date')}}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">City</label>
                            <div class="col-md-10">
                                <input type="text" name="extra_transportation_city[]" class="form-control" placeholder="City">
                                @if($errors->has('extra_transportation_city'))
                                    <div class="alert alert-danger">
                                        <i class="fa fa-warning"></i>
                                        <strong>Error :</strong> {{$errors->first('extra_transportation_city')}}
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label">Cost</label>
                            <div class="col-md-10">
                                <input type="text" name="extra_transportation_cost[]" class="form-control" placeholder="Cost">
                                @if($errors->has('extra_transportation_cost'))
                                    <div class="alert alert-danger">
                                        <i class="fa fa-warning"></i>
                                        <strong>Error :</strong> {{$errors->first('extra_transportation_cost')}}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </fieldset>

                    <fieldset id="meeting">
                        <legend>
                            Meetings <a id="new_meeting" class="control-label" href=""><i class="fa fa-plus"></i></a>
                        </legend>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Date</label>
                            <div class="col-md-10">
                                <input type="text" name="meeting_date" class="form-control input-datepicker" data-date-format="dd-mm-yyyy" placeholder="dd-mm-yyyy">
                                @if($errors->has('meeting_date'))
                                    <div class="alert alert-danger">
                                        <i class="fa fa-warning"></i>
                                        <strong>Error :</strong> {{$errors->first('meeting_date')}}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <!-- Jquery Tags Input (class is initialized in js/app.js -> uiInit()), for extra usage examples you can check out https://github.com/xoxco/jQuery-Tags-Input -->

                        <div class="form-group">
                            <label class="col-md-2 control-label">Group Meeting</label>
                            <div class="col-md-10">
                                <input type="text" name="meeting" class="form-control" placeholder="Group Meeting">
                                @if($errors->has('meeting'))
                                    <div class="alert alert-danger">
                                        <i class="fa fa-warning"></i>
                                        <strong>Error :</strong> {{$errors->first('meeting')}}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Cost</label>
                            <div class="col-md-10">
                                <input type="text" name="meeting_cost" class="form-control" placeholder="Total">
                                @if($errors->has('meeting_cost'))
                                    <div class="alert alert-danger">
                                        <i class="fa fa-warning"></i>
                                        <strong>Error :</strong> {{$errors->first('meeting_cost')}}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </fieldset>

                    <fieldset class="extra_meeting" style="display:none">
                        <legend>Meetings</legend>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Date</label>
                            <div class="col-md-10">
                                <input type="text" name="extra_meeting_date[]" class="form-control datepicker_recurring_start" data-date-format="dd-mm-yyyy" placeholder="dd-mm-yyyy">
                                @if($errors->has('extra_meeting_date'))
                                    <div class="alert alert-danger">
                                        <i class="fa fa-warning"></i>
                                        <strong>Error :</strong> {{$errors->first('extra_meeting_date')}}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <!-- Jquery Tags Input (class is initialized in js/app.js -> uiInit()), for extra usage examples you can check out https://github.com/xoxco/jQuery-Tags-Input -->

                        <div class="form-group">
                            <label class="col-md-2 control-label">Group Meeting</label>
                            <div class="col-md-10">
                                <input type="text" name="extra_meeting[]" class="form-control" placeholder="Group Meeting">
                                @if($errors->has('group_meeting'))
                                    <div class="alert alert-danger">
                                        <i class="fa fa-warning"></i>
                                        <strong>Error :</strong> {{$errors->first('group_meeting')}}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Cost</label>
                            <div class="col-md-10">
                                <input type="text" name="extra_meeting_cost[]" class="form-control" placeholder="Total">
                                @if($errors->has('extra_meeting_cost'))
                                    <div class="alert alert-danger">
                                        <i class="fa fa-warning"></i>
                                        <strong>Error :</strong> {{$errors->first('extra_meeting_cost')}}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>Uploads</legend>
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
                    </fieldset>
                {!! Form::close() !!}
                <!-- END Basic Form Elements Content -->
            </div>
            <!-- END Basic Form Elements Block -->
        </div>
    </div>
@endsection

@section('custom_footer_scripts')
    <script>$('#expense_report').addClass('active');</script>

    <script>

        $('#new_hotel').click(function(event){
            event.preventDefault()
            $("#hotel").append($(".extra_hotel").html());
        });

        $('#new_transportation').click(function(event){
            event.preventDefault()
            $("#transportation").append($(".extra_transportation").html());
        });

        $('#new_meeting').click(function(event){
            event.preventDefault()
            $("#meeting").append($(".extra_meeting").html());
        });

        $(document).on('focus',".datepicker_recurring_start", function(){
            $(this).datepicker();
        });
        
    </script>
@endsection