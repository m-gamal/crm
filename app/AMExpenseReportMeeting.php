<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AMExpenseReportMeeting extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'am_expense_report_meeting';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * The Medical Rep. belongs to
     */
    public function am()
    {
        return $this->belongsTo('App\Employee');
    }

    public function getDateAttribute($date)
    {
        return \Carbon\Carbon::parse($date)->format('d-m-Y');
    }
}
