<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MrLines extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'mr_lines';

//    protected $dates = ['from', 'to'];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * The MR Line belongs to line
     */
    public function line()
    {
        return $this->belongsTo('App\Line');
    }

//    public function getFromAttribute($from)
//    {
//        return \Carbon\Carbon::parse($from);
//    }
//
//    public function getToAttribute($to)
//    {
//        if ($to != NULL) {
//            return \Carbon\Carbon::parse($to);
//        }
//    }

    public function getDateAttribute($date)
    {
        return \Carbon\Carbon::parse($date)->format('d-m-Y');
    }
}