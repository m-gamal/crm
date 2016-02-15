<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReportGift extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'report_gift';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * The Report belongs to the Gift
     */
    public function report()
    {
        return $this->belongsTo('App\Report');
    }

    /**
     * The Gift belongs to the report
     */
    public function gift()
    {
        return $this->belongsTo('App\Gift');
    }

    public function getDateAttribute($date)
    {
        return \Carbon\Carbon::parse($date)->format('d-m-Y');
    }
}
