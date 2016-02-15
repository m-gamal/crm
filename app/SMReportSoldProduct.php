<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SMReportSoldProduct extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'sm_report_sold_product';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * The Report belongs to the Sold Product
     */
    public function report()
    {
        return $this->belongsTo('App\AMReport');
    }

    /**
     * The Sold products belongs to report
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
