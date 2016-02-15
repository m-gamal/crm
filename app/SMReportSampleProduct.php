<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SMReportSampleProduct extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'sm_report_sample_product';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * The Report belongs to the Sample Product
     */
    public function report()
    {
        return $this->belongsTo('App\AMReport');
    }

    /**
     * The Sample products belongs to report
     */
    public function product()
    {
        return $this->belongsTo('App\Product');
    }

    public function getDateAttribute($date)
    {
        return \Carbon\Carbon::parse($date)->format('d-m-Y');
    }
}
