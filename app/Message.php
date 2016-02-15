<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'message';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * The Employee as sender
     */
    public function sender()
    {
        return $this->belongsTo('App\Employee', 'sender');
    }

    /**
     * The Employee as receiver
     */
    public function receiver()
    {
        return $this->belongsTo('App\Employee', 'receiver');
    }

    public function replies()
    {
        return $this->hasMany('App\MessageReply', 'msg_id');
    }

    public function getDateAttribute($date)
    {
        return \Carbon\Carbon::parse($date)->format('d-m-Y');
    }
}
