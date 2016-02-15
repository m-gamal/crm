<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExpenseReport extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'expense_report';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * The Medical Rep. belongs to
     */
    public function mr()
    {
        return $this->belongsTo('App\Employee');
    }

    public function getDateAttribute($date)
    {
        return \Carbon\Carbon::parse($date)->format('d-m-Y');
    }

    /**
     * The Hotels belongs to expense report
     */
    public function hotels()
    {
        return $this->hasMany('App\ExpenseReportHotel');
    }

    /**
     * The Transportation belongs to expense report
     */
    public function transportation()
    {
        return $this->hasMany('App\ExpenseReportTransportation');
    }

    /**
     * The Meetings belongs to expense report
     */
    public function meetings()
    {
        return $this->hasMany('App\ExpenseReportMeeting');
    }
}
