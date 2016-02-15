<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AMReport extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'am_report';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * The Medical Rep. belongs to report
     */
    public function am()
    {
        return $this->belongsTo('App\Employee');
    }

    /**
     * The Area Manager belongs to report
     */
    public function emp()
    {
        return $this->belongsTo('App\Employee', 'am_id');
    }

    /**
     * The Doctor belongs to report
     */
    public function doctor()
    {
        return $this->belongsTo('App\Customer');
    }

    public function promotedProducts()
    {
        return $this->hasMany('App\AMReportPromotedProduct', 'report_id');
    }

    public function sampleProducts()
    {
        return $this->hasMany('App\AMReportSampleProduct', 'report_id');
    }

    public function gift()
    {
        return $this->hasMany('App\AMReportGift', 'report_id');
    }

    public function soldProducts()
    {
        return $this->hasMany('App\AMReportSoldProduct', 'report_id');
    }

    public function getDateAttribute($date)
    {
        return \Carbon\Carbon::parse($date)->format('d-m-Y');
    }
}
