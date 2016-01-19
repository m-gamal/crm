@extends('admin.layouts.master')
@section('title')
    Add New Customer
@endsection

@section('content')

    <ul class="breadcrumb breadcrumb-top">
        <li><a href="{{URL::route('/')}}">Dashboard</a></li>
        <li><a href="{{URL::route('addLevel')}}">Add New Customer</a></li>
    </ul>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <!-- Basic Form Elements Block -->
            <div class="block">
                <!-- Basic Form Elements Title -->
                <div class="block-title">
                    <h2><strong>Add New </strong> Customer </h2>
                </div>
                <!-- END Form Elements Title -->

                <!-- Basic Form Elements Content -->

                {!!
                Form::open([
                'route' 	=> 	'doAddCustomer',
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
                        <label class="col-md-2 control-label"> Class </label>
                        <div class="col-md-10">
                            <select id="example-chosen" name="class" class="select-chosen">
                                <option value="">Select Class</option>
                                <option value="A+">A+</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                            </select>
                            @if($errors->has('class'))
                                <div class="alert alert-danger">
                                    <i class="fa fa-warning"></i>
                                    <strong>Error :</strong> {{$errors->first('class')}}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label"> Description </label>
                        <div class="col-md-10">
                            <select id="example-chosen" name="description" class="select-chosen">
                                <option value="">Select Description</option>
                                <option value="clinic">Clinic</option>
                                <option value="polyclinic">Polyclinic</option>
                                <option value="hospital">Hospital</option>
                                <option value="pharmacy">Pharmacy</option>
                                <option value="medical_center">Medical center</option>
                            </select>
                            @if($errors->has('description'))
                                <div class="alert alert-danger">
                                    <i class="fa fa-warning"></i>
                                    <strong>Error :</strong> {{$errors->first('description')}}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Description Name</label>
                        <div class="col-md-10">
                            <input type="text" name="description_name" class="form-control" placeholder="Email" value="{{ old('description_name') }}">
                            @if($errors->has('description_name'))
                                <div class="alert alert-danger">
                                    <i class="fa fa-warning"></i>
                                    <strong>Error :</strong> {{$errors->first('description_name')}}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label"> Specialty </label>
                        <div class="col-md-10">
                            <select id="example-chosen" name="specialty" class="select-chosen">
                                <option value="">Select Specialty </option>
                                <option value="GYN">GYN</option>
                                <option value="IM">IM</option>
                                <option value="GP">GP</option>
                                <option value="Surg">Surg</option>
                                <option value="Orth">Orth</option>
                                <option value="Ped">Ped</option>
                                <option value="Ophth">Ophth</option>
                                <option value="VS">VS</option>
                            </select>
                            @if($errors->has('specialty'))
                                <div class="alert alert-danger">
                                    <i class="fa fa-warning"></i>
                                    <strong>Error :</strong> {{$errors->first('specialty')}}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Mobile</label>
                        <div class="col-md-10">
                            <input type="text" name="mobile" class="form-control" placeholder="Mobile" value="{{ old('mobile') }}">
                            @if($errors->has('mobile'))
                                <div class="alert alert-danger">
                                    <i class="fa fa-warning"></i>
                                    <strong>Error :</strong> {{$errors->first('mobile')}}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Clinic Tel.</label>
                        <div class="col-md-10">
                            <input type="text" name="clinic_tel" class="form-control" placeholder="Clinic Tele." value="{{ old('clinic_tel') }}">
                            @if($errors->has('clinic_tel'))
                                <div class="alert alert-danger">
                                    <i class="fa fa-warning"></i>
                                    <strong>Error :</strong> {{$errors->first('clinic_tel')}}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Address</label>
                        <div class="col-md-10">
                            <input type="text" name="address" class="form-control" placeholder="Address" value="{{ old('address') }}">
                            @if($errors->has('address'))
                                <div class="alert alert-danger">
                                    <i class="fa fa-warning"></i>
                                    <strong>Error :</strong> {{$errors->first('address')}}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Address Description</label>
                        <div class="col-md-10">
                            <input type="text" name="address_description" class="form-control" placeholder="Address" value="{{ old('address_description') }}">
                            @if($errors->has('address_description'))
                                <div class="alert alert-danger">
                                    <i class="fa fa-warning"></i>
                                    <strong>Error :</strong> {{$errors->first('address_description')}}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label" for="example-timepicker24">A.M Working</label>
                        <div class="col-md-10">
                            <div class="input-group bootstrap-timepicker">
                                <input type="text" name="am_working" class="form-control input-timepicker24" placeholder="AM Working">
                                <span class="input-group-btn">
                                    <a href="javascript:void(0)" class="btn btn-primary"><i class="fa fa-clock-o"></i></a>
                                </span>
                            </div>
                            @if($errors->has('am_working'))
                                <div class="alert alert-danger">
                                    <i class="fa fa-warning"></i>
                                    <strong>Error :</strong> {{$errors->first('am_working')}}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Medical Rep.</label>
                        <div class="col-md-10">
                            <select id="example-chosen" name="mr" class="select-chosen">
                                <option value="">Select a Medical Rep.</option>
                                @foreach($mrs as $singleMr)
                                    <option value="{{$singleMr->id}}" @if (old('mr') == $singleMr->id) selected="selected" @endif>{{$singleMr->name}}</option>
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
    <script>$('#customer').addClass('active');</script>
@endsection