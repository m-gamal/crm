<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SMReport extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'sm_report';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * The Sales Manager belongs to report
     */
    public function sm()
    {
        return $this->belongsTo('App\Employee');
    }

    /**
     * The Sales Manager belongs to report
     */
    public function emp()
    {
        return $this->belongsTo('App\Employee', 'sm_id');
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
        return $this->hasMany('App\SMReportPromotedProduct');
    }

    public function sampleProducts()
    {
        return $this->hasMany('App\SMReportSampleProduct');
    }

    public function soldProducts()
    {
        return $this->hasMany('App\SMReportSoldProduct');
    }

    public function gifts()
    {
        return $this->hasMany('App\SMReportGift');
    }
}
