@extends('admin.layouts.master')
@section('title')
    Upload Distributor List
@endsection

@section('content')

    <ul class="breadcrumb breadcrumb-top">
        <li><a href="{{URL::route('/')}}">Dashboard</a></li>
        <li><a href="{{URL::route('addDistributor')}}">Upload Distributor List</a></li>
    </ul>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <!-- Basic Form Elements Block -->
            <div class="block">
                <!-- Basic Form Elements Title -->
                <div class="block-title">
                    <h2><strong>Upload </strong> Distributor List </h2>
                </div>
                <!-- END Form Elements Title -->

                <!-- Basic Form Elements Content -->

                {!!
                Form::open([
                'route' 	=> 	array('doAddDistributor'),
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
                    <label class="col-md-2 control-label">List</label>
                    <div class="col-md-10">
                        <select name="name" class="form-control select-chosen">
                            <option value="">Select Distributor</option>
                            <option value="UCP">UCP</option>
                            <option value="POS">POS</option>
                            <option value="IBNS">IBNS</option>
                        </select>

                        @if($errors->has('name'))
                            <div class="alert alert-danger">
                                <i class="fa fa-warning"></i>
                                <strong>Error :</strong> {{$errors->first('name')}}
                            </div>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">List</label>
                    <div class="col-md-10">
                        <input type="file" name="list" class="form-control">
                        @if($errors->has('list'))
                            <div class="alert alert-danger">
                                <i class="fa fa-warning"></i>
                                <strong>Error :</strong> {{$errors->first('list')}}
                            </div>
                        @endif
                    </div>
                </div>

                <div class="form-group form-actions">
                    <div class="col-md-9 col-md-offset-3">
                        <button type="submit" class="btn btn-sm btn-primary">
                            <i class="fa fa-upload"></i>
                            Upload
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