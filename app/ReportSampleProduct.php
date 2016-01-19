<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReportSampleProduct extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'report_sample_product';

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
        return $this->belongsTo('App\Report');
    }

    /**
     * The Samoke product belongs to the report
     */
    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
