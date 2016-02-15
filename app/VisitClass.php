<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VisitClass extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'visit_class';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    public function getDateAttribute($date)
    {
        return \Carbon\Carbon::parse($date)->format('d-m-Y');
    }
}
