@extends('mr.layouts.master')
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
                <div class="block-options pull-left">
                    <a href="{{URL::route('mrCreateMessage')}}" class="btn btn-alt btn-sm btn-default"><i class="fa fa-pencil"></i> Compose Message</a>
                </div>
            </div>
            <!-- END Menu Title -->

            <!-- Menu Content -->
            <ul class="nav nav-pills nav-stacked">
                <li class="active">
                    <a href="{{URL::route('mrInbox')}}">
                        <i class="fa fa-angle-right fa-fw"></i> <strong>Inbox</strong>
                    </a>
                </li>

                <li>
                    <a href="{{URL::route('mrSentMessages')}}">
                        <i class="fa fa-angle-right fa-fw"></i> <strong>Sent</strong>
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
                <h2>Inbox </h2>
            </div>
            <!-- END Messages List Title -->

            <!-- Messages List Content -->
            <div class="table-responsive">
                <table class="table table-hover table-vcenter">
                    <tbody>
                    <!-- Use the first row as a prototype for your column widths -->
                    @foreach($messages as $singleMessage)
                    <tr>
                        <td style="width: 20%;">{{\App\Employee::findOrFail($singleMessage->sender)->name}}</td>
                        <td>
                            <a href="{{URL::route('mrShowMessage', $singleMessage->id)}}"><strong>{{$singleMessage->subject}}</strong></a>
                        </td>

                        <td class="text-right" style="width: 90px;"><em>{{$singleMessage->time}}</em></td>
                    </tr>
                    @endforeach
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
<script src="js/pages/readyInbox.js"></script>
<script>$(function(){ ReadyInbox.init(); });</script>
@endsection