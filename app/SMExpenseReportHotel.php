<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SMExpenseReportHotel extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'sm_expense_report_hotel';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * The Sales Manager belongs to expense report
     */
    public function sm()
    {
        return $this->belongsTo('App\Employee');
    }

    public function getDateAttribute($date)
    {
        return \Carbon\Carbon::parse($date)->format('d-m-Y');
    }
}
