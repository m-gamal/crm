@extends('admin.layouts.master')
@section('title')
    Write New Message
@endsection

@section('content')
    <!-- Inbox Content -->
    <div class="row">
        <!-- Inbox Menu -->
        <div class="col-sm-4 col-lg-3">
            <!-- Menu Block -->
            <div class="block full">
                <!-- Menu Content -->
                <ul class="nav nav-pills nav-stacked">
                    <li>
                        <a href="{{URL::route('adminInbox')}}">
                            <i class="fa fa-angle-right fa-fw"></i> <strong>Inbox</strong>
                        </a>
                    </li>

                    <li>
                        <a href="{{URL::route('adminSentMessages')}}">
                            <i class="fa fa-angle-right fa-fw"></i> <strong>Sent</strong>
                        </a>
                    </li>
                </ul>
                <!-- END Menu Content -->
            </div>
            <!-- END Menu Block -->
        </div>
        <!-- END Inbox Menu -->

        <!-- Compose Message List -->
        <div class="col-sm-8 col-lg-9">
            <!-- Compose Message Block -->
            <div class="block">
                <!-- Compose Message Content -->
                    {!!
                    Form::open([
                    'route' 	=> 	'adminDoCreateMessage',
                    'role' 		=> 	'form',
                    'method' 	=> 	'post',
                    'class'		=>	'form-horizontal form-bordered',
                    'files'     =>  true
                    ])
                    !!}
                    @if(Session::has('message'))
                        <div class="form-group">
                            <div class="alert alert-success alert-dismissable">
                                <i class="fa fa-check"></i>
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <b> Success : </b> {{ Session::get('message') }}
                            </div>
                        </div>
                    @endif
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="compose-to">To</label>
                        <div class="col-md-10">
                            <select name="employees[]" class="form-control select-chosen" multiple>
                                @foreach($employees as $singleEmployee)
                                    <option value="{{$singleEmployee->id}}" {{$singleEmployee->id == old('employee') ? 'selected' : ''}}>
                                        {{$singleEmployee->name}} [{{$singleEmployee->level->title}}]
                                    </option>
                                @endforeach
                            </select>
                            @if($errors->has('employee'))
                                <div class="alert alert-danger">
                                    <i class="fa fa-warning"></i>
                                    <strong>Error :</strong> {{$errors->first('employee')}}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="compose-subject">Subject</label>
                        <div class="col-md-10">
                            <input type="text" name="subject" class="form-control" placeholder="Subject" value="{{old('subject')}}">
                            @if($errors->has('subject'))
                                <div class="alert alert-danger">
                                    <i class="fa fa-warning"></i>
                                    <strong>Error :</strong> {{$errors->first('subject')}}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="compose-message">Message</label>
                        <div class="col-md-10">
                            <textarea name="message" rows="20" class="form-control" placeholder="Your message.." >{{old('message')}}</textarea>
                            @if($errors->has('message'))
                                <div class="alert alert-danger">
                                    <i class="fa fa-warning"></i>
                                    <strong>Error :</strong> {{$errors->first('message')}}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="compose-to">Attachment</label>
                        <div class="col-md-10">
                            <input type="file" name="attachment" class="form-control">
                            @if($errors->has('attachment'))
                                <div class="alert alert-danger">
                                    <i class="fa fa-warning"></i>
                                    <strong>Error :</strong> {{$errors->first('attachment')}}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group form-actions">
                        <div class="col-md-9 col-md-offset-3">
                            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-share"></i> Send</button>
                        </div>
                    </div>
                {!! Form::close() !!}
                <!-- END Compose Message Content -->
            </div>
            <!-- END Compose Message Block -->
        </div>
        <!-- END Compose Message -->
    </div>
    <!-- END Inbox Content -->
@endsection

@section('custom_footer_scripts')
    <script src="js/pages/tablesDatatables.js"></script>
    <script>$(function(){ TablesDatatables.init(); });</script>
@endsection