@extends('admin.layouts.master')
@section('title')
All Employees
@endsection

@section('content')
    <!-- Begin Breadcrumb -->
    <ul class="breadcrumb breadcrumb-top">
        <li><a href="{{URL::route('/')}}">Dashboard</a></li>
        <li><a href="{{URL::route('employees')}}">All Employees</a></li>
    </ul>
    <!-- END Breadcrumb -->

    <!-- Datatables Content -->
    <div class="block full">
        <div class="block-title">
            <h2>
                <strong>All</strong> Employees
                <a href="{{URL::route('addEmployee')}}" class="label label-success" title="Add New Employee">+</a>
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
                    <th class="text-center">Line</th>
                    <th class="text-center">Manager</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Level</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Actions</th>
                </tr>
                </thead>
                <tbody>
                @if(count($employees) > 0)
                @foreach($employees as $singleEmployee)
                <tr>
                    <td class="text-center">{{$singleEmployee->name}}</td>
                    <td class="text-center">{{!is_null($singleEmployee->line) ? $singleEmployee->line->title : ''}}</td>
                    <td class="text-center">{{!is_null($singleEmployee->manager) ? $singleEmployee->manager->name : ''}}</td>
                    <td class="text-center">{{$singleEmployee->email}}</td>
                    <td class="text-center">{{!is_null($singleEmployee->level) ? $singleEmployee->level->title : ''}}</td>
                    <td class="text-center">
                        @if($singleEmployee->active == 'Active')
                            <p class="label label-success">Active</p>
                        @else
                            <p class="label label-danger">Not Active</p>
                        @endif
                    </td>
                    <td class="text-center">
                        <div class="btn-group">
                            <a href="{{URL::route('editEmployee', $singleEmployee->id)}}" data-toggle="tooltip" title="Edit" class="btn btn-xs btn-default"><i class="fa fa-pencil"></i></a>
                            <a data-toggle="modal" data-target="#employee_{{$singleEmployee->id}}" title="Delete" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
                            @if($singleEmployee->level_id == 7)
                            <a href="{{URL::route('uploadDoctorsList', $singleEmployee->id)}}" title="Upload Doctors List" class="btn btn-xs btn-info">
                                <i class="fa fa-upload"></i>
                            </a>
                            @endif
                        </div>
                    </td>
                </tr>

                <div class="modal fade" id="employee_{{$singleEmployee->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            {!!
                            Form::open([
                            'route' => ['doDeleteEmployee', $singleEmployee->id],
                            'role' => 'form',
                            'method' => 'post',
                            ])
                            !!}
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel"><i><strong>Confirm the deletion</strong></i> </h4>
                            </div>
                            <div class="modal-body">
                                <h4 class="modal-title" id="myModalLabel">Are sure to delete <strong>{{$singleEmployee->name}}</strong> ? </h4>
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
<script>$('#employee').addClass('active');</script>
<script src="js/pages/tablesDatatables.js"></script>
<script>$(function(){ TablesDatatables.init(); });</script>
@endsection