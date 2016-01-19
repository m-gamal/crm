@extends('admin.layouts.master')
@section('title')
All Products Targets
@endsection

@section('content')
    <!-- Begin Breadcrumb -->
    <ul class="breadcrumb breadcrumb-top">
        <li><a href="{{URL::route('/')}}">Dashboard</a></li>
        <li><a href="{{URL::route('products')}}">All Products Target</a></li>
    </ul>
    <!-- END Breadcrumb -->

    <!-- Datatables Content -->
    <div class="block full">
        <div class="block-title">
            <h2>
                <strong>All</strong> Products Targets
            </h2>

        </div>

        @if(Session::has('message'))
            <div class="alert alert-success alert-dismissable">
                <i class="fa fa-check"></i>
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <b> Success : </b> {{ Session::get('message') }}
            </div>
        @endif

        <div class="table-responsive">
            <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                <thead>
                <tr>
                    <th class="text-center">Year</th>
                    <th class="text-center">Product</th>
                    <th class="text-center">Territory</th>
                    <th class="text-center">Area</th>
                    <th class="text-center">Line</th>
                    <th class="text-center">Product Target</th>
                    <th class="text-center">Actions</th>
                </tr>
                </thead>
                <tbody>
                @if(count($productsTarget) > 0)
                @foreach($productsTarget as $singleProductTarget)
                <tr>
                    <td class="text-center">
                        {{$singleProductTarget->year}}
                    </td>
                    <td class="text-center">
                        {{$singleProductTarget->product->name}}
                    </td>
                    <td class="text-center">
                        {{$singleProductTarget->territory->name}}
                    </td>
                    <td class="text-center">
                        {{$singleProductTarget->area->name}}
                    </td>
                    <td class="text-center">
                        {{$singleProductTarget->line->title}}
                    </td>
                    <td class="text-center">
                        <a data-toggle="modal" data-target="#months_target_{{$singleProductTarget->id}}" class="btn btn-xs btn-info">
                            Months Target List
                        </a>
                    </td>

                    <td class="text-center">
                        <div class="btn-group">
                            <a data-toggle="modal" data-target="#target_{{$singleProductTarget->id}}" title="Delete" class="btn btn-xs btn-danger">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </td>
                </tr>
                @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
    <!-- END Datatables Content -->
    @include('admin.partials.modal')
@endsection

@section('custom_footer_scripts')
<script>$('#products_target').addClass('active');</script>
<script>$('#list_products_target').addClass('active');</script>
<script src="js/pages/tablesDatatables.js"></script>
<script>$(function(){ TablesDatatables.init(); });</script>
@endsection