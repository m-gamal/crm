@extends('sm.layouts.master')
@section('title')
Single Doctor
@endsection

@section('content')
    <!-- Begin Breadcrumb -->
    <ul class="breadcrumb breadcrumb-top">
        <li><a href="{{URL::route('/')}}">Dashboard</a></li>
        <li><a href="{{URL::route('smSingleDoctor', $doctor->id)}}">Single Doctor</a></li>
    </ul>
    <!-- END Breadcrumb -->

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <!-- Basic Form Elements Block -->
            <div class="block">
                <!-- Basic Form Elements Title -->
                <div class="block-title">
                    <h2><strong>Doctor</strong> Details </h2>
                </div>
                <!-- END Form Elements Title -->

                <!-- Basic Form Elements Content -->

                {!!
                Form::open([
                'role' 		=> 	'form',
                'method' 	=> 	'post',
                'class'		=>	'form-horizontal form-bordered'
                ])
                !!}

                <div class="form-group">
                    <label class="col-md-3 control-label">Name</label>
                    <div class="col-md-9">
                        <p class="form-control-static">{{$doctor->name}}</p>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Email</label>
                    <div class="col-md-9">
                        <p class="form-control-static">{{$doctor->email}}</p>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Mobile</label>
                    <div class="col-md-9">
                        <p class="form-control-static">{{$doctor->mobile}}</p>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Clinic Tel</label>
                    <div class="col-md-9">
                        <p class="form-control-static">{{$doctor->clinic_tel}}</p>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Address </label>
                    <div class="col-md-9">
                        <p class="form-control-static">{{$doctor->address}}</p>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Address Name </label>
                    <div class="col-md-9">
                        <p class="form-control-static">{{$doctor->address_name}}</p>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Address On Map</label>
                    <div class="col-md-9">
                        {{--<div id="map" style="width: 500px;height: 400px;"></div>--}}
                        <img class='group-google-maps-preview' src='https://maps.googleapis.com/maps/api/staticmap?size=500x400&center={{$doctor->address}}&zoom=13&size=600x300&maptype=roadmap&markers=color:blue'>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Class </label>
                    <div class="col-md-9">
                        <p class="form-control-static">{{$doctor->class}}</p>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Description </label>
                    <div class="col-md-9">
                        <p class="form-control-static">{{$doctor->description}}</p>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Description Name </label>
                    <div class="col-md-9">
                        <p class="form-control-static">{{$doctor->description_name}}</p>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Specialty </label>
                    <div class="col-md-9">
                        <p class="form-control-static">{{$doctor->specialty}}</p>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">A.M Working </label>
                    <div class="col-md-9">
                        <p class="form-control-static">{{$doctor->am_working}}</p>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Time Of Visit </label>
                    <div class="col-md-9">
                        <p class="form-control-static">{{$doctor->time_of_visit}}</p>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Comment </label>
                    <div class="col-md-9">
                        <p class="form-control-static">{{$doctor->comment}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Is Active ? </label>
                    <div class="col-md-9">
                        <p class="form-control-static">{{$doctor->active}}</p>
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
<script>$('#line').addClass('active');</script>
<script src="{{URL::asset('js/pages/tablesDatatables.js')}}"></script>
<script>$(function(){ TablesDatatables.init(); });</script>
@endsection