<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AreaTarget extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'area_target';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * Get Months Products Targets
     */

    public function getMonthsTargetAttribute($value)
    {
        return json_decode($value);
    }

    /**
     * Get Product Target
     */

    public function product_target()
    {
        return $this->belongsTo('App\ProductTarget');
    }

    /**
     * Get Target Line
     */

    public function line()
    {
        return $this->belongsTo('App\Line');
    }

    /**
     * Get Target Area
     */

    public function area()
    {
        return $this->belongsTo('App\Area');
    }

    /**
     * Get Target Territory
     */

    public function territory()
    {
        return $this->belongsTo('App\Territory');
    }

    /**
     * Get Target Product
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
