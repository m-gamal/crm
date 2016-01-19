@extends('admin.layouts.master')
@section('title')
All Announcements
@endsection

@section('content')
    <!-- Begin Breadcrumb -->
    <ul class="breadcrumb breadcrumb-top">
        <li><a href="{{URL::route('/')}}">Dashboard</a></li>
        <li><a href="{{URL::route('announcements')}}">All Announcements</a></li>
    </ul>
    <!-- END Breadcrumb -->

    <!-- Datatables Content -->
    <div class="block full">
        <div class="block-title">
            <h2>
                <strong>All</strong> Announcements
                <a href="{{URL::route('addAnnouncement')}}" class="label label-success" title="Add New Announcement">+</a>
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
                    <th class="text-center">Level</th>
                    <th class="text-center">Month</th>
                    <th class="text-center">Start</th>
                    <th class="text-center">Text</th>
                    <th class="text-center">Actions</th>
                </tr>
                </thead>
                <tbody>
                @if(count($announcements) > 0)
                @foreach($announcements as $singleAnnouncement)
                <tr>
                    <td class="text-center">{{$singleAnnouncement->level->title}}</td>
                    <td class="text-center">{{$singleAnnouncement->month}}</td>
                    <td class="text-center">{{$singleAnnouncement->start}}</td>
                    <td class="text-center">{{$singleAnnouncement->text}}</td>
                    <td class="text-center">
                        <div class="btn-group">
                            <a href="{{URL::route('editAnnouncement', $singleAnnouncement->id)}}" data-toggle="tooltip" title="Edit" class="btn btn-xs btn-default"><i class="fa fa-pencil"></i></a>
                            <a data-toggle="modal" data-target="#announcement_{{$singleAnnouncement->id}}" title="Delete" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
                        </div>
                    </td>
                </tr>
                <div class="modal fade" id="announcement_{{$singleAnnouncement->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            {!!
                            Form::open([
                            'route' => ['doDeleteAnnouncement', $singleAnnouncement->id],
                            'role' => 'form',
                            'method' => 'post',
                            ])
                            !!}
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel"><i><strong>Confirm the deletion</strong></i> </h4>
                            </div>
                            <div class="modal-body">
                                <h4 class="modal-title" id="myModalLabel">Are sure to delete this announcement ? </h4>
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
<script>$('#announcement').addClass('active');</script>
<script src="{{URL::asset('js/pages/tablesDatatables.js')}}"></script>
<script>$(function(){ TablesDatatables.init(); });</script>
@endsection