<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MessageReply extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'message_reply';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * The message
     */
    public function message()
    {
        return $this->belongsTo('App\Message', 'msg_id');
    }

    public function getDateAttribute($date)
    {
        return \Carbon\Carbon::parse($date)->format('d-m-Y');
    }
}
