@extends('admin.layouts.master')
@section('title')
Inbox
@endsection

@section('content')
        <!-- Inbox Content -->
<div class="row">
    <!-- Inbox Menu -->
    <div class="col-sm-4 col-lg-3">
        <!-- Menu Block -->
        <div class="block full">
            <!-- Menu Title -->
            <div class="block-title clearfix">
                <div class="block-options pull-right">
                    <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-default" data-toggle="tooltip" title="Refresh"><i class="fa fa-refresh"></i></a>
                </div>
                <div class="block-options pull-left">
                    <a href="#" class="btn btn-alt btn-sm btn-default"><i class="fa fa-pencil"></i> Compose Message</a>
                </div>
            </div>
            <!-- END Menu Title -->

            <!-- Menu Content -->
            <ul class="nav nav-pills nav-stacked">
                <li class="active">
                    <a href="#">
                        <span class="badge pull-right">5</span>
                        <i class="fa fa-angle-right fa-fw"></i> <strong>Inbox</strong>
                    </a>
                </li>

                <li>
                    <a href="javascript:void(0)">
                        <i class="fa fa-angle-right fa-fw"></i> <strong>Sent</strong>
                    </a>
                </li>

                <li>
                    <a href="javascript:void(0)">
                        <i class="fa fa-angle-right fa-fw"></i> <strong>Trash</strong>
                    </a>
                </li>
            </ul>
            <!-- END Menu Content -->
        </div>
        <!-- END Menu Block -->
    </div>
    <!-- END Inbox Menu -->

    <!-- Messages List -->
    <div class="col-sm-8 col-lg-9">
        <!-- Messages List Block -->
        <div class="block">
            <!-- Messages List Title -->
            <div class="block-title">
                <div class="block-options pull-right">
                    <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-default" data-toggle="tooltip" title="Settings"><i class="fa fa-cog"></i></a>
                </div>
                <h2>Inbox <strong>(5)</strong></h2>
            </div>
            <!-- END Messages List Title -->

            <!-- Messages List Content -->
            <div class="table-responsive">
                <table class="table table-hover table-vcenter">
                    <thead>
                    <tr>
                        <td class="text-center">
                            <input type="checkbox" id="checkbox-all" name="checkbox-all">
                        </td>
                        <td colspan="3">
                            <div class="btn-group btn-group-sm">
                                <a href="javascript:void(0)" class="btn btn-default" data-toggle="tooltip" title="Delete Selected"><i class="fa fa-trash"></i></a>
                            </div>
                        </td>
                        <td class="text-right" colspan="3">
                            <strong>1-30</strong> from <strong>5250</strong>
                            <div class="btn-group btn-group-sm">
                                <a href="javascript:void(0)" class="btn btn-sm btn-default"><i class="fa fa-angle-left"></i></a>
                                <a href="javascript:void(0)" class="btn btn-sm btn-default"><i class="fa fa-angle-right"></i></a>
                            </div>
                        </td>
                    </tr>
                    </thead>
                    <tbody>
                    <!-- Use the first row as a prototype for your column widths -->
                    <tr>
                        <td class="text-center" style="width: 30px;">
                            <input type="checkbox" id="checkbox1" name="checkbox1">
                        </td>
                        <td class="text-center" style="width: 30px;">
                            <a href="javascript:void(0)" class="text-success msg-read-btn"><i class="fa fa-circle"></i></a>
                        </td>
                        <td style="width: 20%;">Debra Stanley</td>
                        <td>
                            <a href=""><strong>New Follower</strong></a>
                            <span class="text-muted">Hey, just wanted to let you know..</span>
                        </td>
                        <td class="text-center" style="width: 30px;">
                            <i class="fa fa-paperclip"></i>
                        </td>
                        <td class="text-right" style="width: 90px;"><em>just now</em></td>
                    </tr>
                    <tr>
                        <td class="text-center">
                            <input type="checkbox" id="checkbox2" name="checkbox2">
                        </td>

                        <td class="text-center">
                            <a href="javascript:void(0)" class="text-success msg-read-btn"><i class="fa fa-circle"></i></a>
                        </td>
                        <td>Sarah Cole</td>
                        <td>
                            <a href="#"><strong>Your subscription was updated</strong></a>
                            <span class="text-muted">We are glad you decided to..</span>
                        </td>
                        <td></td>
                        <td class="text-right"><em>2 min ago</em></td>
                    </tr>
                    <tr>
                        <td class="text-center">
                            <input type="checkbox" id="checkbox3" name="checkbox3">
                        </td>

                        <td class="text-center">
                            <a href="javascript:void(0)" class="text-success msg-read-btn"><i class="fa fa-circle"></i></a>
                        </td>
                        <td>Bryan Porter</td>
                        <td>
                            <a href="#"><strong>A great opportunity</strong></a>
                            <span class="text-muted">With the growing demand on..</span>
                        </td>
                        <td></td>
                        <td class="text-right"><em>10 min ago</em></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <!-- END Messages List Content -->
        </div>
        <!-- END Messages List Block -->
    </div>
    <!-- END Messages List -->
</div>
<!-- END Inbox Content -->
@endsection

@section('custom_footer_scripts')
<script src="js/pages/tablesDatatables.js"></script>
<script>$(function(){ TablesDatatables.init(); });</script>
@endsection