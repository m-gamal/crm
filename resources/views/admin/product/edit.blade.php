@extends('admin.layouts.master')

@section('title')
    Edit Product
@endsection

@section('content')
    <ul class="breadcrumb breadcrumb-top">
        <li><a href="{{URL::route('/')}}">Dashboard</a></li>
        <li><a href="{{URL::route('editProduct', $product->id)}}">Edit Product</a></li>
    </ul>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <!-- Basic Form Elements Block -->
            <div class="block">
                <!-- Basic Form Elements Title -->
                <div class="block-title">
                    <h2><strong>Edit </strong> Product</h2>
                </div>
                <!-- END Form Elements Title -->

                <!-- Basic Form Elements Content -->

                {!!
                Form::open([
                'route' 	=> 	array('editProduct', $product->id),
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
                        <label class="col-md-2 control-label" for="example-select">Select Line
                        </label>
                        <div class="col-md-10">
                            <select id="lines_list" name="line" class="form-control select-chosen">
                                <option value="">Select Line</option>
                                @foreach($lines as $singleLine)
                                    <option value="{{$singleLine->id}}" @if ($product->line_id == $singleLine->id) selected="selected" @endif>{{$singleLine->title}}</option>
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
                            <input type="text" name="name" class="form-control" placeholder="Title" value="{{$product->name}}">
                            @if($errors->has('name'))
                                <div class="alert alert-danger">
                                    <i class="fa fa-warning"></i>
                                    <strong>Error :</strong> {{$errors->first('name')}}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label" for="example-select">Select Form
                        </label>
                        <div class="col-md-10">
                            <select name="form" class="form-control select-chosen">
                                <option value="">Select Line</option>
                                @foreach($forms as $singleForm)
                                    <option value="{{$singleForm->id}}" @if ($product->form_id == $singleForm->id) selected="selected" @endif>{{$singleForm->name}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('form'))
                                <div class="alert alert-danger">
                                    <i class="fa fa-warning"></i>
                                    <strong>Error :</strong> {{$errors->first('form')}}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Unit Price</label>
                        <div class="col-md-10">
                            <input type="text" name="unit_price" class="form-control" placeholder="Unit Price" value="{{$product->unit_price}}">
                            @if($errors->has('unit_price'))
                                <div class="alert alert-danger">
                                    <i class="fa fa-warning"></i>
                                    <strong>Error :</strong> {{$errors->first('unit_price')}}
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
    <script>$('#product').addClass('active');</script>
@endsection