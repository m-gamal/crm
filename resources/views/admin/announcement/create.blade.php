@extends('admin.layouts.master')
@section('title')
    Add New Announcement
@endsection

@section('content')
    <ul class="breadcrumb breadcrumb-top">
        <li><a href="{{URL::route('/')}}">Dashboard</a></li>
        <li><a href="{{URL::route('addAnnouncement')}}">Add New Announcement</a></li>
    </ul>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <!-- Basic Form Elements Block -->
            <div class="block">
                <!-- Basic Form Elements Title -->
                <div class="block-title">
                    <h2><strong>Add New </strong> Announcement</h2>
                </div>
                <!-- END Form Elements Title -->

                <!-- Basic Form Elements Content -->

                {!!
                Form::open([
                'route' 	=> 	'doAddAnnouncement',
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
                        <label class="col-md-2 control-label">Level</label>
                        <div class="col-md-10">
                            <select name="level" class="form-control select-chosen">
                                <option value="">Select Level</option>
                                @foreach($levels as $singleLevel)
                                    <option value="{{$singleLevel->id}}">{{$singleLevel->title}}</option>
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

                    <div class="form-group">
                        <label class="col-md-2 control-label">Text</label>
                        <div class="col-md-10">
                            <textarea name="text" rows="5" class="form-control"></textarea>
                            @if($errors->has('text'))
                                <div class="alert alert-danger">
                                    <i class="fa fa-warning"></i>
                                    <strong>Error :</strong> {{$errors->first('text')}}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Display Start Date</label>
                        <div class="col-md-10">
                            <input type="text" id="example-datepicker" name="start" class="form-control input-datepicker" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd" value="{{ old('start') }}">

                            @if($errors->has('start'))
                                <div class="alert alert-danger">
                                    <i class="fa fa-warning"></i>
                                    <strong>Error :</strong> {{$errors->first('start')}}
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
    <script>$('#announcement').addClass('active');</script>
@endsection