@extends('admin.layouts.master')
@section('title')
    Edit Employee
@endsection

@section('content')

    <ul class="breadcrumb breadcrumb-top">
        <li><a href="{{URL::route('/')}}">Dashboard</a></li>
        <li><a href="{{URL::route('editEmployee', $employee->id)}}">Edit Employee</a></li>
    </ul>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <!-- Basic Form Elements Block -->
            <div class="block">
                <!-- Basic Form Elements Title -->
                <div class="block-title">
                    <h2><strong>Edit </strong> Employee </h2>
                </div>
                <!-- END Form Elements Title -->

                <!-- Basic Form Elements Content -->

                {!!
                Form::open([
                'route' 	=> 	array('doEditEmployee', $employee->id),
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
                                <option value="{{$singleLine->id}}" @if ($employee->line_id == $singleLine->id) selected="selected" @endif>{{$singleLine->title}}</option>
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
                        <input type="text" name="name" class="form-control" placeholder="Name" value="{{$employee->name}}">
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
                        <input type="text" name="email" class="form-control" placeholder="Email" value="{{$employee->email}}">
                        @if($errors->has('email'))
                            <div class="alert alert-danger">
                                <i class="fa fa-warning"></i>
                                <strong>Error :</strong> {{$errors->first('email')}}
                            </div>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">Level</label>
                    <div class="col-md-10">
                        <select id="example-chosen" name="level" class="select-chosen">
                            <option value="">Select a Level</option>
                            @foreach($levels as $singleLevel)
                                <option value="{{$singleLevel->id}}" @if ($employee->level_id == $singleLevel->id) selected="selected" @endif>{{$singleLevel->title}}</option>
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
                @if($employee->level_id == 7)
                    <div class="form-group">
                        <label class="col-md-2 control-label">Area Manager</label>
                        <div class="col-md-10">
                            <select id="example-chosen" name="area_manager" class="select-chosen">
                                <option value="">Select Area Manager</option>
                                @foreach($areaManagers as $singleAreaManager)
                                    <option value="{{$singleAreaManager->id}}" @if ($singleAreaManager->id == $employee->manager_id) selected="selected" @endif>{{$singleAreaManager->name}}</option>
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
                @elseif($employee->level_id == 3)
                    <div class="form-group">
                        <label class="col-md-2 control-label">Sales Manager</label>
                        <div class="col-md-10">
                            <select id="example-chosen" name="sales_manager" class="select-chosen">
                                <option value="">Select Sales Manager</option>
                                @foreach($salesManagers as $singleSalesManager)
                                    <option value="{{$singleSalesManager->id}}" @if (old('sales_manager') == $employee->manager_id) selected="selected" @endif>{{$singleSalesManager->name}}</option>
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
                @endif

                <div class="form-group">
                    <label class="col-md-2 control-label">Hiring Date</label>
                    <div class="col-md-10">
                        <input type="text" id="example-datepicker" name="hiring_date" class="form-control input-datepicker" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd" value="{{$employee->hiring_date}}">

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
                        <input type="text" id="example-datepicker" name="leaving_date" class="form-control input-datepicker" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd" @if (!is_null($employee->leaving_date)) value="{{$employee->leaving_date}}" @endif>

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
                                <input type="checkbox" id="example-checkbox1" name="active" value="1" @if ($employee->active == "Active") checked="true" @endif>
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

                <div class="form-group">
                    <label class="col-md-2 control-label">Photo</label>
                    <div class="col-md-10">
                        <img src="{{URL::asset('img/avatar/'.$employee->id)}}" alt="" width="200" height="200">
                    </div>
                </div>

                <div class="form-group form-actions">
                    <div class="col-md-9 col-md-offset-3">
                        <button type="submit" class="btn btn-sm btn-primary">
                            <i class="fa fa-angle-right"></i>
                            Update
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
@endsection