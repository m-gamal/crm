<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AMReportGift extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'am_report_gift';

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
        return $this->belongsTo('App\AMReport');
    }

    /**
     * The Gift belongs to report
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
