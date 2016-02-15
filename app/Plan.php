<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'plan';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * The Medical Rep belongs to plan
     */
    public function emp()
    {
        return $this->belongsTo('App\Employee', 'mr_id');
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

    public function setDateAttribute($date)
    {
        $this->attributes['date'] = \Carbon\Carbon::parse($date)->format('Y-m-d');
    }

}