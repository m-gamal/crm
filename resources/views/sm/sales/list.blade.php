@extends('admin.layouts.master')
@section('title')
All Sales
@endsection

@section('content')
    <!-- Begin Breadcrumb -->
    <ul class="breadcrumb breadcrumb-top">
        <li><a href="{{URL::route('/')}}">Dashboard</a></li>
        <li><a href="{{URL::route('sales')}}">All Sales</a></li>
    </ul>
    <!-- END Breadcrumb -->

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <!-- Basic Form Elements Block -->
            <div class="block">
                <!-- Basic Form Elements Title -->
                <div class="block-title">
                    <h2><strong>Search On Sales </strong></h2>
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
                    <label class="col-md-2 control-label">Type</label>
                    <div class="col-md-10">
                        <select id="example-chosen" name="mr" class="select-chosen">
                            <option value="#">All</option>
                            <option value="#">Direct</option>
                            <option value="#">InDirect</option>
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
                    <label class="col-md-2 control-label">Product</label>
                    <div class="col-md-10">
                        <select id="example-chosen" name="product" class="select-chosen">
                            <option value="#">Product 1</option>
                            <option value="#">Product 2</option>
                            <option value="#">Product 3</option>
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
                    <label class="col-md-2 control-label">From Date</label>
                    <div class="col-md-10">
                        <input type="text" name="plan_from_date" class="form-control input-datepicker" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd" value="{{ old('hiring_date') }}">

                        @if($errors->has('plan_from_date'))
                            <div class="alert alert-danger">
                                <i class="fa fa-warning"></i>
                                <strong>Error :</strong> {{$errors->first('plan_from_date')}}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">To Date</label>
                    <div class="col-md-10">
                        <input type="text" name="plan_to_date" class="form-control input-datepicker" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd" value="{{ old('hiring_date') }}">

                        @if($errors->has('plan_to_date'))
                            <div class="alert alert-danger">
                                <i class="fa fa-warning"></i>
                                <strong>Error :</strong> {{$errors->first('plan_to_date')}}
                            </div>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">Medical Rep.</label>
                    <div class="col-md-10">
                        <select id="example-chosen" name="mr" class="select-chosen">
                            <option value="">Select a Medical Rep.</option>
                            <option value="#">Medical Rep.</option>
                        </select>
                        @if($errors->has('mr'))
                            <div class="alert alert-danger">
                                <i class="fa fa-warning"></i>
                                <strong>Error :</strong> {{$errors->first('mr')}}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-group form-actions">
                    <div class="col-md-9 col-md-offset-3">
                        <button type="submit" class="btn btn-sm btn-primary">
                            <i class="fa fa-angle-right"></i>
                            Search
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

    <!-- Datatables Content -->
    <div class="block full">
        <div class="block-title">
            <div class="block-options pull-right">
                <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-primary" data-toggle="block-toggle-content">
                    <i class="fa fa-minus"></i>
                </a>
            </div>
            <h2>
                <strong>All</strong> Sales Results
            </h2>

        </div>

        <div class="block-content">
            <div class="table-responsive">
                <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                    <thead>
                    <tr>
                        <th class="text-center">Type</th>
                        <th class="text-center">Product</th>
                        <th class="text-center">Medical Rep.</th>
                        <th class="text-center">Actions</th>
                    </tr>
                    </thead>
                    <tbody>


                    <tr>
                        <td class="text-center">date</td>
                        <td class="text-center">date</td>
                        <td class="text-center">Name</td>
                        <td class="text-center">
                            <div class="btn-group">
                                <a class="btn btn-xs btn-info" href=""title="Check Details On Calendar">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a data-toggle="modal" data-target="#" class="btn btn-xs btn-success" href=""title="Check Details On Graph">
                                    <i class="fa fa-pie-chart"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- END Datatables Content -->
@endsection

@section('custom_footer_scripts')
<script>$('#sales').addClass('active');</script>
<script src="js/pages/tablesDatatables.js"></script>
<script>$(function(){ TablesDatatables.init(); });</script>
@endsection