<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'area';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * The area manager belongs to area
     */
    public function am()
    {
        return $this->belongsTo('App\Employee');
    }

    public function getDateAttribute($date)
    {
        return \Carbon\Carbon::parse($date)->format('d-m-Y');
    }

    public function line()
    {
        return $this->belongsTo('App\Line');
    }
}
