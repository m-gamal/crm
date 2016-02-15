<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LeaveRequest extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'leave_request';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * The Medical Rep. belongs to
     */
    public function mr()
    {
        return $this->belongsTo('App\Employee');
    }

    public function emp()
    {
        return $this->belongsTo('App\Employee', 'mr_id');
    }

    public function getApprovedAttribute($approved)
    {
        if ($approved == 1)
        {
            return "<span class=\"label label-success\">Approved</span>";
        } else if ($approved == 0 && $approved != NULL){
            return "<span class=\"label label-danger\">Declined</span>";
        } else if ( $approved == NULL){
            return "<span class=\"label label-info\">Pending</span>";
        }
    }

    public function scopeApproved($query)
    {
        return $query->where('approved', 1);
    }

    public static function scopePending($query)
    {
        return $query->where('approved', NULL);
    }

    public function getDateAttribute($date)
    {
        return \Carbon\Carbon::parse($date)->format('d-m-Y');
    }
}
