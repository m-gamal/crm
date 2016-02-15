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
                    <li>
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

        <!-- View Message -->
        <div class="col-sm-8 col-lg-9">
            <!-- View Message Block -->
            <div class="block full">
                <!-- View Message Title -->
                <div class="block-title">

                    <h2><strong>{{$message->subject}}</strong></h2>
                </div>
                <!-- END View Message Title -->
                @if(Session::has('message'))
                <div class="form-group">
                    <div class="alert alert-success alert-dismissable">
                        <i class="fa fa-check"></i>
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <b> Success : </b> {{ Session::get('message') }}
                    </div>
                </div>
                @endif

                @foreach($message->replies as $singleReply)
                <!-- Message Meta -->
                <table class="table table-borderless">
                    <tbody>
                    <tr>
                        <td class="hidden-xs">
                            <strong>
                                <label class="label label-danger">
                                    from  {{\App\Employee::findOrFail($singleReply->sender)->name}}
                                </label>
                            </strong>
                        </td>
                        <td class="text-right"><strong>{{$singleReply->created_at}}</strong></td>
                    </tr>
                    </tbody>
                </table>
                <!-- END Message Meta -->

                <!-- Message Body -->
                <p>{{$singleReply->text}}</p>

                @if($singleReply->is_attachment)
                <!-- Attachments Row -->
                <div class="row block-section">
                    <div class="col-xs-4 col-sm-2 text-center">
                        <i class="fa fa-paperclip"></i>
                        <a href="{{URL::asset('uploads/inbox/'.$singleReply->message->id.'/'.$singleReply->id.'.zip')}}"
                           download="{{$singleReply->id.'.zip'}}" target="_blank">Attachment</a>
                    </div>
                </div>
                <!-- END Attachments Row -->
                @endif
                <hr>
                <!-- END Message Body -->
                @endforeach

                    <!-- Quick Reply Form -->
                    {!!
                    Form::open([
                    'route' 	=> 	array('mrDoReply', $message->id),
                    'role' 		=> 	'form',
                    'method' 	=> 	'post',
                    'files'     =>  true
                    ])
                    !!}

                    <textarea id="message-quick-reply" name="reply" rows="5" class="form-control push-bit" placeholder="Your message.."></textarea>
                    @if($errors->has('reply'))
                        <div class="alert alert-danger">
                            <i class="fa fa-warning"></i>
                            <strong>Error :</strong> {{$errors->first('reply')}}
                        </div>
                    @endif
                    <input type="file" name="attachment" class="form-control">
                    @if($errors->has('attachment'))
                        <div class="alert alert-danger">
                            <i class="fa fa-warning"></i>
                            <strong>Error :</strong> {{$errors->first('attachment')}}
                        </div>
                    @endif
                    <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-share"></i> Reply </button>
                {!! Form::close() !!}
                <!-- END Quick Reply Form -->
            </div>
            <!-- END View Message Block -->
        </div>
        <!-- END View Message -->
    </div>
    <!-- END Inbox Content -->
@endsection

@section('custom_footer_scripts')
    <script src="{{URL::asset('js/pages/readyInbox.js')}}"></script>
    <script>$(function(){ ReadyInbox.init(); });</script>
@endsection