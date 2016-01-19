<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AMExpenseReport extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'am_expense_report';

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
}
