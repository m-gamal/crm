@extends('admin.layouts.master')
@section('title')
    Edit Customer
@endsection

@section('content')

    <ul class="breadcrumb breadcrumb-top">
        <li><a href="{{URL::route('/')}}">Dashboard</a></li>
        <li><a href="{{URL::route('editCustomer', $customer->id)}}">Edit Customer</a></li>
    </ul>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <!-- Basic Form Elements Block -->
            <div class="block">
                <!-- Basic Form Elements Title -->
                <div class="block-title">
                    <h2><strong>Edit </strong> Customer </h2>
                </div>
                <!-- END Form Elements Title -->

                <!-- Basic Form Elements Content -->

                {!!
                Form::open([
                'route' 	=> 	array('doEditCustomer', $customer->id),
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
                        <input type="text" name="name" class="form-control" placeholder="Name" value="{{$customer->name}}">
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
                        <input type="text" name="email" class="form-control" placeholder="Email" value="{{$customer->email}}">
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
                            <option value="" >Select Class</option>
                            <option value="A+" @if ($customer->class == 'A+') selected="selected" @endif >A+</option>
                            <option value="A" @if ($customer->class == 'A') selected="selected" @endif >A</option>
                            <option value="B" @if ($customer->class == 'B') selected="selected" @endif >B</option>
                            <option value="C" @if ($customer->class == 'C') selected="selected" @endif >C</option>
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
                            <option value="clinic" @if ($customer->description == 'clinic') selected="selected" @endif >Clinic</option>
                            <option value="polyclinic" @if ($customer->description == 'polyclinic') selected="selected" @endif >Polyclinic</option>
                            <option value="hospital" @if ($customer->description == 'hospital') selected="selected" @endif >Hospital</option>
                            <option value="pharmacy" @if ($customer->description == 'pharmacy') selected="selected" @endif >Pharmacy</option>
                            <option value="medical_center" @if ($customer->description == 'medical_center') selected="selected" @endif >Medical center</option>
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
                        <input type="text" name="description_name" class="form-control" placeholder="Description Name" value="{{$customer->description_name}}">
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
                            <option value="GYN" @if ($customer->specialty == 'GYN') selected="selected" @endif>GYN</option>
                            <option value="IM" @if ($customer->specialty == 'IM') selected="selected" @endif>IM</option>
                            <option value="GP" @if ($customer->specialty == 'GP') selected="selected" @endif>GP</option>
                            <option value="Surg" @if ($customer->specialty == 'Surg') selected="selected" @endif>Surg</option>
                            <option value="Orth" @if ($customer->specialty == 'Orth') selected="selected" @endif>Orth</option>
                            <option value="Ped" @if ($customer->specialty == 'Ped') selected="selected" @endif>Ped</option>
                            <option value="Ophth" @if ($customer->specialty == 'Ophth') selected="selected" @endif>Ophth</option>
                            <option value="VS" @if ($customer->specialty == 'VS') selected="selected" @endif>VS</option>
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
                        <input type="text" name="mobile" class="form-control" placeholder="Mobile" value="{{ $customer->mobile }}">
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
                        <input type="text" name="clinic_tel" class="form-control" placeholder="Clinic Tele." value="{{ $customer->clinic_tel }}">
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
                        <input type="text" name="address" class="form-control" placeholder="Address" value="{{ $customer->address }}">
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
                        <input type="text" name="address_description" class="form-control" placeholder="Address" value="{{ $customer->address_description }}">
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
                            <input type="text"  name="am_working" class="form-control input-timepicker24" placeholder="AM Working" value="{{ $customer->am_working }}">
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
                            <option value="">Select a Level</option>
                            @foreach($mrs as $singleMr)
                                <option value="{{$singleMr->id}}" @if ($customer->mr_id == $singleMr->id) selected="selected" @endif>{{$singleMr->name}}</option>
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
                    <label class="col-md-2 control-label"> Time Of Visit </label>
                    <div class="col-md-10">
                        <div class="input-group bootstrap-timepicker">
                            <input type="text"  name="time_of_visit" class="form-control input-timepicker24" placeholder="Time Of Visit" value="{{ $customer->time_of_visit }}">
                                <span class="input-group-btn">
                                    <a href="javascript:void(0)" class="btn btn-primary"><i class="fa fa-clock-o"></i></a>
                                </span>
                        </div>
                        @if($errors->has('time_of_visit'))
                            <div class="alert alert-danger">
                                <i class="fa fa-warning"></i>
                                <strong>Error :</strong> {{$errors->first('time_of_visit')}}
                            </div>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">Comment</label>
                    <div class="col-md-10">
                        <textarea type="text" rows="5" name="comment" class="form-control">{{$customer->comment}}</textarea>
                        @if($errors->has('comment'))
                            <div class="alert alert-danger">
                                <i class="fa fa-warning"></i>
                                <strong>Error :</strong> {{$errors->first('comment')}}
                            </div>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">Active</label>
                    <div class="col-md-10">
                        <div class="checkbox">
                            <label for="example-checkbox1">
                                <input type="checkbox" id="example-checkbox1" name="active" value="1" @if ($customer->active == "Active") checked="true" @endif>
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
    <script>$('#customer').addClass('active');</script>
@endsection