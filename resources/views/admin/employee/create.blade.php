@extends('admin.layouts.master')
@section('title')
    Add New Employee
@endsection

@section('content')

    <ul class="breadcrumb breadcrumb-top">
        <li><a href="{{URL::route('/')}}">Dashboard</a></li>
        <li><a href="{{URL::route('addLevel')}}">Add New Employee</a></li>
    </ul>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <!-- Basic Form Elements Block -->
            <div class="block">
                <!-- Basic Form Elements Title -->
                <div class="block-title">
                    <h2><strong>Add New </strong> Employee </h2>
                </div>
                <!-- END Form Elements Title -->

                <!-- Basic Form Elements Content -->

                {!!
                Form::open([
                'route' 	=> 	'doAddEmployee',
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
                        <label class="col-md-2 control-label">Line</label>
                        <div class="col-md-10">
                            <select id="example-chosen" name="line" class="select-chosen">
                                <option value="">Select a Line</option>
                                @foreach($lines as $singleLine)
                                    <option value="{{$singleLine->id}}" @if (old('line') == $singleLine->id) selected="selected" @endif>{{$singleLine->title}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('line'))
                                <div class="alert alert-danger">
                                    <i class="fa fa-warning"></i>
                                    <strong>Error :</strong> {{$errors->first('line')}}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Name</label>
                        <div class="col-md-10">
                            <input type="text" name="name" class="form-control" placeholder="Name" value="{{ old('name') }}">
                            @if($errors->has('name'))
                                <div class="alert alert-danger">
                                    <i class="fa fa-warning"></i>
                                    <strong>Error :</strong> {{$errors->first('name')}}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Email</label>
                        <div class="col-md-10">
                            <input type="text" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
                            @if($errors->has('email'))
                                <div class="alert alert-danger">
                                    <i class="fa fa-warning"></i>
                                    <strong>Error :</strong> {{$errors->first('email')}}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Password</label>
                        <div class="col-md-10">
                            <input type="password" name="password" class="form-control" placeholder="Password">
                            @if($errors->has('password'))
                                <div class="alert alert-danger">
                                    <i class="fa fa-warning"></i>
                                    <strong>Error :</strong> {{$errors->first('password')}}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Level</label>
                        <div class="col-md-10">
                            <select id ="level_input" name="level" class="select-chosen">
                                <option value="">Select a Level</option>
                                @foreach($levels as $singleLevel)
                                <option value="{{$singleLevel->id}}" @if (old('level') == $singleLevel->id) selected="selected" @endif>{{$singleLevel->title}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('level'))
                                <div class="alert alert-danger">
                                    <i class="fa fa-warning"></i>
                                    <strong>Error :</strong> {{$errors->first('level')}}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group" id="sales_manager" style="display: none;">
                        <label class="col-md-2 control-label">Sales Manager</label>
                        <div class="col-md-10">
                            <select id="example-chosen" id="sales_manager_input" name="sales_manager" class="select-chosen">
                                <option value="">Select Sales Manager</option>
                                @foreach($salesManagers as $singleSalesManager)
                                    <option value="{{$singleSalesManager->id}}">{{$singleSalesManager->name}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('sales_manager'))
                                <div class="alert alert-danger">
                                    <i class="fa fa-warning"></i>
                                    <strong>Error :</strong> {{$errors->first('sales_manager')}}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group" id="area_manager" style="display: none;">
                        <label class="col-md-2 control-label">Area Manager</label>
                        <div class="col-md-10">
                            <select id="example-chosen" id="area_manager_input" name="area_manager" class="select-chosen">
                                <option value="">Select Area Manager</option>
                                @foreach($areaManagers as $singleAreaManager)
                                    <option value="{{$singleAreaManager->id}}">{{$singleAreaManager->name}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('area_manager'))
                                <div class="alert alert-danger">
                                    <i class="fa fa-warning"></i>
                                    <strong>Error :</strong> {{$errors->first('area_manager')}}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Hiring Date</label>
                        <div class="col-md-10">
                            <input type="text" id="example-datepicker" name="hiring_date" class="form-control input-datepicker" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd" value="{{ old('hiring_date') }}">

                            @if($errors->has('hiring_date'))
                                <div class="alert alert-danger">
                                    <i class="fa fa-warning"></i>
                                    <strong>Error :</strong> {{$errors->first('hiring_date')}}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Leaving Date</label>
                        <div class="col-md-10">
                            <input type="text" id="example-datepicker" name="leaving_date" class="form-control input-datepicker" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd" value="{{ old('leaving_date') }}">

                            @if($errors->has('leaving_date'))
                                <div class="alert alert-danger">
                                    <i class="fa fa-warning"></i>
                                    <strong>Error :</strong> {{$errors->first('leaving_date')}}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Active</label>
                        <div class="col-md-10">
                            <div class="checkbox">
                                <label for="example-checkbox1">
                                    <input type="checkbox" id="example-checkbox1" name="active" value="1" @if (old('active') == "Active") checked="true" @endif>
                                </label>
                            </div>
                            @if($errors->has('active'))
                                <div class="alert alert-danger">
                                    <i class="fa fa-warning"></i>
                                    <strong>Error :</strong> {{$errors->first('active')}}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Photo</label>
                        <div class="col-md-10">
                            <input type="file" name="photo" class="form-control">
                            @if($errors->has('photo'))
                                <div class="alert alert-danger">
                                    <i class="fa fa-warning"></i>
                                    <strong>Error :</strong> {{$errors->first('photo')}}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group form-actions">
                        <div class="col-md-9 col-md-offset-3">
                            <button type="submit" class="btn btn-sm btn-primary">
                                <i class="fa fa-angle-right"></i>
                                Add
                            </button>
                            <button type="reset" class="btn btn-sm btn-warning">
                                <i class="fa fa-repeat"></i>
                                Reset
                            </button>
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
    <script>$('#employee').addClass('active');</script>
    <script>
        $('#level_input').change(function() {
            if ($(this).val() == 7)
            {
                $('#sales_manager').hide();
                $('#sales_manager_input').val('');
                $('#area_manager').show();
            } else if ($(this).val() == 3)
            {
                $('#area_manager').hide();
                $('#area_manager_input').val('');
                $('#sales_manager').show();
            }
            else {
                $('#sales_manager').hide();
                $('#area_manager').hide();
            }
        });
    </script>
@endsection