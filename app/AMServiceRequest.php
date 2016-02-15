<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AMServiceRequest extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'am_service_request';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    public static function scopePending($query)
    {
        return $query->where('approved', NULL);
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

    public function emp()
    {
        return $this->belongsTo('App\Employee', 'am_id');
    }

    public function getDateAttribute($date)
    {
        return \Carbon\Carbon::parse($date)->format('d-m-Y');
    }
}
