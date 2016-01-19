@extends('admin.layouts.master')

@section('title')
    Edit Territory
@endsection

@section('content')
    <ul class="breadcrumb breadcrumb-top">
        <li><a href="{{URL::route('/')}}">Dashboard</a></li>
        <li><a href="{{URL::route('editTerritory', $territory->id)}}">Edit Territory</a></li>
    </ul>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <!-- Basic Form Elements Block -->
            <div class="block">
                <!-- Basic Form Elements Title -->
                <div class="block-title">
                    <h2><strong>Edit </strong> Territory</h2>
                </div>
                <!-- END Form Elements Title -->

                <!-- Basic Form Elements Content -->

                {!!
                Form::open([
                'route' 	=> 	array('editTerritory', $territory->id),
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
                        <label class="col-md-2 control-label">Title</label>
                        <div class="col-md-10">
                            <input type="text" name="name" class="form-control" placeholder="Name" value="{{$territory->name}}">
                            @if($errors->has('name'))
                                <div class="alert alert-danger">
                                    <i class="fa fa-warning"></i>
                                    <strong>Error :</strong> {{$errors->first('name')}}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Area</label>
                        <div class="col-md-10">
                            <select id="example-chosen" name="area" class="select-chosen">
                                <option value="">Select a Level</option>
                                @foreach($areas as $singleArea)
                                    <option value="{{$singleArea->id}}" @if ($territory->area_id == $singleArea->id) selected="selected" @endif>{{$singleArea->name}}</option>
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
<script>$('#territory').addClass('active');</script>
@endsection