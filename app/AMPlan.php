<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AMPlan extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'am_plan';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * The Area Manager belongs to plan
     */
    public function emp()
    {
        return $this->belongsTo('App\Employee', 'am_id');
    }

    public function doctor()
    {
        return $this->belongsTo('App\Customer');
    }

    public function scopeApproved($query)
    {
        return $query->where('approved', 1);
    }

    public static function scopePending($query)
    {
        return $query->where('approved', NULL);
    }

    /**
     * Format Approved Plans before displaying
     */
    public function getApprovedAttribute($approved)
    {
        if ($approved == 1)
        {
            return "<span class=\"label label-success\">Approved</span>";
        } else {
            return "<span class=\"label label-danger\">Declined</span>";
        }
    }

//    public function getDateAttribute($date)
//    {
//        return \Carbon\Carbon::parse($date)->format('d-m-Y');
//    }
}
