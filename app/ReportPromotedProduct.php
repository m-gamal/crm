<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReportPromotedProduct extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'report_promoted_product';

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
        return $this->belongsTo('App\Report');
    }

    /**
     * The Promoted product belongs to the report
     */
    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
