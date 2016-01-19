@extends('admin.layouts.master')
@section('title')
All Visits Classes
@endsection

@section('content')
    <!-- Begin Breadcrumb -->
    <ul class="breadcrumb breadcrumb-top">
        <li><a href="{{URL::route('/')}}">Dashboard</a></li>
        <li><a href="{{URL::route('visitsClasses')}}">All Visits Class</a></li>
    </ul>
    <!-- END Breadcrumb -->

    <!-- Datatables Content -->
    <div class="block full">
        <div class="block-title">
            <h2>
                <strong>All</strong> Visits Classes
                <a href="{{URL::route('addVisitClass')}}" class="label label-success" title="Add New VisitClass">+</a>
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
                    <th class="text-center">Visits Number</th>
                    <th class="text-center">Actions</th>
                </tr>
                </thead>
                <tbody>
                @if(count($visitClasses) > 0)
                @foreach($visitClasses as $singleVisitClass)
                <tr>
                    <td class="text-center">
                        {{$singleVisitClass->name}}
                    </td>

                    <td class="text-center">
                        {{$singleVisitClass->visits_count}}
                    </td>
                    <td class="text-center">
                        <div class="btn-group">
                            <a href="{{URL::route('editVisitClass', $singleVisitClass->id)}}" data-toggle="tooltip" title="Edit" class="btn btn-xs btn-default">
                                <i class="fa fa-pencil"></i>
                            </a>
                            <a data-toggle="modal" data-target="#gift_{{$singleVisitClass->id}}" title="Delete" class="btn btn-xs btn-danger">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </td>
                </tr>
                <div class="modal fade" id="gift_{{$singleVisitClass->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            {!!
                            Form::open([
                            'route' => ['doDeleteVisitClass', $singleVisitClass->id],
                            'role' => 'form',
                            'method' => 'post',
                            ])
                            !!}
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel"><i><strong>Confirm the deletion</strong></i> </h4>
                            </div>
                            <div class="modal-body">
                                <h4 class="modal-title" id="myModalLabel">Are sure to delete <strong>Visit Class {{$singleVisitClass->name}}</strong> ? </h4>
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
<script>$('#visit_class').addClass('active');</script>
<script src="js/pages/tablesDatatables.js"></script>
<script>$(function(){ TablesDatatables.init(); });</script>
@endsection