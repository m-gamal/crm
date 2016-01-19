@extends('admin.layouts.master')

@section('title')
    Edit Task
@endsection

@section('content')
    <ul class="breadcrumb breadcrumb-top">
        <li><a href="{{URL::route('/')}}">Dashboard</a></li>
        <li><a href="{{URL::route('editTask', $task->id)}}">Edit Task</a></li>
    </ul>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <!-- Basic Form Elements Block -->
            <div class="block">
                <!-- Basic Form Elements Title -->
                <div class="block-title">
                    <h2><strong>Edit </strong> Task</h2>
                </div>
                <!-- END Form Elements Title -->

                <!-- Basic Form Elements Content -->

                {!!
                Form::open([
                'route' 	=> 	array('editTask', $task->id),
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
                        <label class="col-md-2 control-label">Text</label>
                        <div class="col-md-10">
                            <textarea name="text" rows="5" class="form-control">{{$task->text}}</textarea>
                            @if($errors->has('text'))
                                <div class="alert alert-danger">
                                    <i class="fa fa-warning"></i>
                                    <strong>Error :</strong> {{$errors->first('text')}}
                                </div>
                            @endif
                        </div>
                    </div>
    
                    <div class="form-group">
                        <label class="col-md-2 control-label">Employee</label>
                        <div class="col-md-10">
                            <select name="employee" class="form-control select-chosen">
                                <option value="">Select Employee</option>
                                @foreach($employees as $singleEmployee)
                                <option value="{{$singleEmployee->id}}" @if($task->employee_id == $singleEmployee->id) selected @endif>
                                {{$singleEmployee->name}}
                                </option>
                                @endforeach
                            </select>
                            @if($errors->has('employee'))
                                <div class="alert alert-danger">
                                    <i class="fa fa-warning"></i>
                                    <strong>Error :</strong> {{$errors->first('employee')}}
                                </div>
                            @endif
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
    <script>$('#task').addClass('active');</script>
@endsection