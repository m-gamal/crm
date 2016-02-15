<?php

namespace App\Http\Controllers\Admin;

use App\Message;
use App\Employee;
use App\Http\Requests\Admin\CreateMessageRequest;
use App\Http\Requests\Admin\CreateReplyRequest;
use App\Http\Controllers\Controller;
use App\MessageReply;

class InboxController extends Controller
{
    public function all()
    {
        $messages   =   Message::where('receiver', \Auth::user()->id)->get();
        $dataView   =   [
            'messages'  =>  $messages
        ];
        return view ('admin.inbox.all', $dataView);
    }

    public function create()
    {
        $employees  =   Employee::where('level_id','<>', 1)->where('active', 1)->get();
        $dataView   =   [
            'employees'  =>  $employees
        ];

        return view('admin.inbox.new', $dataView);
    }

    public function doCreate(CreateMessageRequest $request)
    {
        $message = new Message;

        $message->sender    =   \Auth::user()->id;
        $message->receiver  =   $request->employee;
        $message->subject   =   $request->subject;
        $message->time      =   \Carbon\Carbon::now()->toTimeString();
        try {
            if ($message->save()){
                $messageReply = new MessageReply();

                $messageReply->sender   =   \Auth::user()->id;
                $messageReply->msg_id   =   $message->id;
                $messageReply->text     =   $request->message;
                $messageReply->time     =   \Carbon\Carbon::now()->toTimeString();
                if ($messageReply->save()) {
                    if ($request->file('attachment')) {
                        $messageReply->is_attachment = 1;
                        $messageReply->save();
                        $extension = $request->file('attachment')->getClientOriginalExtension();
                        $request->file('attachment')->move(public_path('uploads/inbox/' . $message->id . '/'), $messageReply->id.'.'.$extension);
                    }
                }
            }

            return redirect()->back()->with('message','Message has been sent successfully !');
        } catch (ParseException $ex) {
            echo 'Failed to send message , with error message: ' . $ex->getMessage();
        }
    }

    public function sent()
    {
        $sentMessages   =   Message::where('sender', \Auth::user()->id)->get();
        $dataView       =   [
            'sentMessages'  =>  $sentMessages
        ];
        return view('admin.inbox.sent', $dataView);
    }

    public function show($id)
    {

        $message = Message::findOrFail($id);
        MessageReply::where('sender', '<>', \Auth::user()->id)->where('msg_id', $id)->where('is_read', 0)->update(['is_read'=>1]);
        $dataView   =   [
            'message'    =>  $message
        ];
        return view('admin.inbox.show', $dataView);
    }

    public function doReply(CreateReplyRequest $request, $id){
        $messageReply           =   new MessageReply;
        $messageReply->msg_id   =   $id;
        $messageReply->sender   =   \Auth::user()->id;
        $messageReply->text     =   $request->reply;
        $messageReply->time     =   \Carbon\Carbon::now()->toTimeString();
        try {
            $messageReply->save();
            if ($request->file('attachment')) {
                $messageReply->is_attachment = 1;
                $messageReply->save();
                $extension = $request->file('attachment')->getClientOriginalExtension();
                $request->file('attachment')->move(public_path('uploads/inbox/' . $id . '/'), $messageReply->id.'.'.$extension);
            }
            return redirect()->route('adminShowMessage', $id)->with('message','Message has been sent successfully !');
        } catch (ParseException $ex) {
            echo 'Failed to send message , with error message: ' . $ex->getMessage();
        }
    }
}
