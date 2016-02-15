<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AMReportPromotedProduct extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'am_report_promoted_product';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * The Report belongs to the Promoted Product
     */
    public function report()
    {
        return $this->belongsTo('App\AMReport');
    }

    /**
     * The Promoted products belongs to report
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
