@extends('admin.layouts.master')
@section('title')
    Medical Rep. Distributor
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
                'route' 	=> 	array('doMRDistributor', $distributor, $productAreaId),
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
                    <label class="col-md-2 control-label">Medical Rep.</label>
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

                <div class="form-group">
                    <label class="col-md-2 control-label">Percent</label>
                    <div class="col-md-10">
                        <input type="text" name="percent" class="form-control" value="{{old('percent')}}">
                        @if($errors->has('percent'))
                            <div class="alert alert-danger">
                                <i class="fa fa-warning"></i>
                                <strong>Error :</strong> {{$errors->first('percent')}}
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