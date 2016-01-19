@extends('sm.layouts.master')
@section('title')
All Employees
@endsection

@section('content')
    <!-- Begin Breadcrumb -->
    <ul class="breadcrumb breadcrumb-top">
        <li><a href="{{URL::route('/')}}">Dashboard</a></li>
        <li><a href="{{URL::route('smEmployees')}}">All Employees</a></li>
    </ul>
    <!-- END Breadcrumb -->

    <!-- Datatables Content -->
    <div class="block full">
        <div class="block-title">
            <h2>
                <strong>All</strong> Employees
            </h2>

        </div>

        @if(Session::has('message'))
            <div class="alert alert-success alert-dismissable">
                <i class="fa fa-check"></i>
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <b> Success : </b> {{ Session::get('message') }}
            </div>
        @endif

        <div class="block">
            <div class="block-title">
                <ul class="nav nav-tabs" data-toggle="tabs">
                    <li class="active">
                        <a href="#mrs_tab">
                            <i class="fa fa-users"></i>
                            Medical Reps
                        </a>
                    </li>
                    <li>
                        <a href="#ams_tab">
                            <i class="fa fa-users"></i>
                            Area Managers
                        </a>
                    </li>
                </ul>
            </div>

            <div class="tab-content">
                <div class="tab-pane active" id="mrs_tab">
                    <div class="table-responsive">
                        <table class="example-datatable table table-vcenter table-condensed table-bordered">
                            <thead>
                            <tr>
                                <th class="text-center">Name</th>
                                <th class="text-center">Line</th>
                                <th class="text-center">Manager</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Level</th>
                                <th class="text-center">Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($MRs) > 0)
                                @foreach($MRs as $singleEmployee)
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
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane" id="ams_tab">
                    <div class="table-responsive">
                        <table class="example-datatable table table-vcenter table-condensed table-bordered">
                            <thead>
                            <tr>
                                <th class="text-center">Name</th>
                                <th class="text-center">Line</th>
                                <th class="text-center">Manager</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Level</th>
                                <th class="text-center">Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($AMs) > 0)
                                @foreach($AMs as $singleEmployee)
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
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- END Datatables Content -->

@endsection

@section('custom_footer_scripts')
<script>$('#employee').addClass('active');</script>
<script src="{{URL::asset('js/pages/tablesDatatables.js')}}"></script>
<script>$(function(){ TablesDatatables.init(); });</script>
@endsection