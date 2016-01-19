<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ProductsTarget;

class Territory extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'territory';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * The territory belongs to area
     */
    public function area()
    {
        return $this->belongsTo('App\Area');
    }
}