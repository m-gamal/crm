@extends('admin.layouts.master')

@section('title')
Products Target
@endsection

@section('content')
<!-- Line Content -->
<div class="row">
    <div class="col-sm-12">
        <!-- Tickets Block -->
        <div class="block">
            <!-- Tabs Content -->
            <div class="tab-content">
                <!-- Begin Areas -->
                <div class="tab-pane active" id="areas">
                    {!!
                    Form::open([
                        'route'     =>  'doSetProductTarget',
                        'method'    =>  'post',
                        'class'     =>  'form-horizontal form-bordered'
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
                            <label class="col-md-2 control-label" for="example-text-input">Target for Year</label>
                            <div class="col-md-10">
                                <input type="text" id="year" name="year" class="form-control" placeholder="Year"
                                value="{{ old('year') }}">
                                @if($errors->has('year'))
                                    <div class="alert alert-danger">
                                        <i class="fa fa-warning"></i>
                                        <strong>Error :</strong> {{$errors->first('year')}}
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label" for="example-select">Select Line
                            </label>
                            <div class="col-md-10">
                                <select id="lines_list" name="line" class="form-control select-chosen">
                                    <option value="">Select Line</option>
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
                            <label class="col-md-2 control-label" for="example-select">Select Product
                            </label>
                            <div class="col-md-10">
                                <select id="products_list" name="product" class="form-control select-chosen">
                                </select>
                                @if($errors->has('product'))
                                    <div class="alert alert-danger">
                                        <i class="fa fa-warning"></i>
                                        <strong>Error :</strong> {{$errors->first('product')}}
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label" for="example-text-input">Quantity</label>
                            <div class="col-md-10">
                                <input type="text" id="quantity" name="quantity" class="form-control" placeholder="Quantity"
                                       value="{{ old('quantity') }}">
                                @if($errors->has('quantity'))
                                    <div class="alert alert-danger">
                                        <i class="fa fa-warning"></i>
                                        <strong>Error :</strong> {{$errors->first('quantity')}}
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label" for="example-text-input">Jan</label>
                            <div class="col-md-8">
                                <input type="text" id="jan" name="jan" class="form-control" value="{{ old('jan') }}">
                                @if($errors->has('jan'))
                                    <div class="alert alert-danger">
                                        <i class="fa fa-warning"></i>
                                        <strong>Error :</strong> {{$errors->first('jan')}}
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label" for="example-text-input">Feb</label>
                            <div class="col-md-8">
                                <input type="text" id="feb" name="feb" class="form-control" value="{{ old('feb') }}">
                                @if($errors->has('feb'))
                                    <div class="alert alert-danger">
                                        <i class="fa fa-warning"></i>
                                        <strong>Error :</strong> {{$errors->first('feb')}}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label" for="example-text-input">Mar</label>
                            <div class="col-md-8">
                                <input type="text" id="mar" name="mar" class="form-control" value="{{ old('mar') }}">
                                @if($errors->has('mar'))
                                    <div class="alert alert-danger">
                                        <i class="fa fa-warning"></i>
                                        <strong>Error :</strong> {{$errors->first('mar')}}
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label" for="example-text-input">Apr</label>
                            <div class="col-md-8">
                                <input type="text" id="apr" name="apr" class="form-control" value="{{ old('apr') }}">
                                @if($errors->has('apr'))
                                    <div class="alert alert-danger">
                                        <i class="fa fa-warning"></i>
                                        <strong>Error :</strong> {{$errors->first('apr')}}
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label" for="example-text-input">May</label>
                            <div class="col-md-8">
                                <input type="text" id="may" name="may" class="form-control" value="{{ old('may') }}">
                                @if($errors->has('may'))
                                    <div class="alert alert-danger">
                                        <i class="fa fa-warning"></i>
                                        <strong>Error :</strong> {{$errors->first('may')}}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label" for="example-text-input">Jun</label>
                            <div class="col-md-8">
                                <input type="text" id="jun" name="jun" class="form-control" value="{{ old('jun') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label" for="example-text-input">Jul</label>
                            <div class="col-md-8">
                                <input type="text" id="jul" name="jul" class="form-control" value="{{ old('jul') }}">
                                @if($errors->has('jul'))
                                    <div class="alert alert-danger">
                                        <i class="fa fa-warning"></i>
                                        <strong>Error :</strong> {{$errors->first('jul')}}
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label" for="example-text-input">Aug</label>
                            <div class="col-md-8">
                                <input type="text" id="aug" name="aug" class="form-control" value="{{ old('aug') }}">
                                @if($errors->has('aug'))
                                    <div class="alert alert-danger">
                                        <i class="fa fa-warning"></i>
                                        <strong>Error :</strong> {{$errors->first('aug')}}
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label" for="example-text-input">Sep</label>
                            <div class="col-md-8">
                                <input type="text" id="sep" name="sep" class="form-control" value="{{ old('sep') }}">
                                @if($errors->has('sep'))
                                    <div class="alert alert-danger">
                                        <i class="fa fa-warning"></i>
                                        <strong>Error :</strong> {{$errors->first('sep')}}
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label" for="example-text-input">Oct</label>
                            <div class="col-md-8">
                                <input type="text" id="oct" name="oct" class="form-control" value="{{ old('oct') }}">
                                @if($errors->has('oct'))
                                    <div class="alert alert-danger">
                                        <i class="fa fa-warning"></i>
                                        <strong>Error :</strong> {{$errors->first('oct')}}
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label" for="example-text-input">Nov</label>
                            <div class="col-md-8">
                                <input type="text" id="nov" name="nov" class="form-control" value="{{ old('nov') }}">
                                @if($errors->has('nov'))
                                    <div class="alert alert-danger">
                                        <i class="fa fa-warning"></i>
                                        <strong>Error :</strong> {{$errors->first('nov')}}
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label" for="example-text-input">Dec</label>
                            <div class="col-md-8">
                                <input type="text" id="dec" name="dec" class="form-control" value="{{ old('dec') }}">
                                @if($errors->has('dec'))
                                    <div class="alert alert-danger">
                                        <i class="fa fa-warning"></i>
                                        <strong>Error :</strong> {{$errors->first('dec')}}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group form-actions">
                            <div class="col-md-9 col-md-offset-3">
                                <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-angle-right"></i> Submit</button>
                                <button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> Reset</button>
                            </div>
                        </div>
                    {!! Form::close() !!}
                    <!-- END Basic Form Elements Content -->
                </div>
                <!-- END Areas -->
            </div>
            <!-- END Tabs Content -->
        </div>
        <!-- END Tickets Block -->
    </div>
</div>
<!-- END Tickets Content -->
@endsection

@section('custom_footer_scripts')
<script>$('#target').addClass('active');</script>
<script src="{{URL::asset('js/custom.js')}}"></script>
@endsection