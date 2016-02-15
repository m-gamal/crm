<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'product';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * The Form belongs to product
     */
    public function form()
    {
        return $this->belongsTo('App\Form');
    }

    /**
     * The Form belongs to product
     */
    public function line()
    {
        return $this->belongsTo('App\Line');
    }

    public function getDateAttribute($date)
    {
        return \Carbon\Carbon::parse($date)->format('d-m-Y');
    }
}
