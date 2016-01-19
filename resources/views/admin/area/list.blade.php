@extends('admin.layouts.master')
@section('title')
All Areas
@endsection

@section('content')
    <!-- Begin Breadcrumb -->
    <ul class="breadcrumb breadcrumb-top">
        <li><a href="{{URL::route('/')}}">Dashboard</a></li>
        <li><a href="{{URL::route('areas')}}">All Areas</a></li>
    </ul>
    <!-- END Breadcrumb -->

    <!-- Datatables Content -->
    <div class="block full">
        <div class="block-title">
            <h2>
                <strong>All</strong> Areas
                <a href="{{URL::route('addArea')}}" class="label label-success" title="Add New Area">+</a>
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
                    <th class="text-center">Name</th>
                    <th class="text-center">Area Manager</th>
                    <th class="text-center">Actions</th>
                </tr>
                </thead>
                <tbody>
                @if(count($areas) > 0)
                @foreach($areas as $singleArea)
                <tr>
                    <td class="text-center">{{$singleArea->name}}</td>
                    <td class="text-center">{{$singleArea->am->name}}</td>
                    <td class="text-center">
                        <div class="btn-group">
                            <a href="{{URL::route('editArea', $singleArea->id)}}" data-toggle="tooltip" title="Edit" class="btn btn-xs btn-default"><i class="fa fa-pencil"></i></a>
                            <a data-toggle="modal" data-target="#area_{{$singleArea->id}}" title="Delete" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
                        </div>
                    </td>
                </tr>
                <div class="modal fade" id="area_{{$singleArea->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            {!!
                            Form::open([
                            'route' => ['doDeleteArea', $singleArea->id],
                            'role' => 'form',
                            'method' => 'post',
                            ])
                            !!}
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel"><i><strong>Confirm the deletion</strong></i> </h4>
                            </div>
                            <div class="modal-body">
                                <h4 class="modal-title" id="myModalLabel">Are sure to delete <strong>{{$singleArea->name}}</strong> ? </h4>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-primary" data-dismiss="modal">No</button>
                                <button type="submit" class="btn btn-danger">Yes</button>
                            </div>
                            {!!Form::close()!!}
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
    <!-- END Datatables Content -->
@endsection

@section('custom_footer_scripts')
<script>$('#area').addClass('active');</script>
<script src="js/pages/tablesDatatables.js"></script>
<script>$(function(){ TablesDatatables.init(); });</script>
@endsection