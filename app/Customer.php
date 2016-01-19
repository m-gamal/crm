<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Support\Facades\Storage;

class Customer extends Model implements AuthenticatableContract,
    AuthorizableContract,
    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable =
    ['name', 'email', 'class', 'description', 'description_name',
     'specialty', 'mobile', 'address', 'address_description',
    'am_working', 'time_of_visit', 'comment', 'active', 'mr_id'];
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'customer';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * The Medical Rep. belongs to customer
     */
    public function mr()
    {
        return $this->belongsTo('App\Employee', 'mr_id');
    }

    /**
     * The Class belongs to customer
     */
    public function visitClass()
    {
        return $this->belongsTo('App\VisitClass', 'class', 'name');
    }
    /**
     * Get Customer Status
     */
    public function getActiveAttribute($value)
    {
        $status =   NULL;

        if ($value == 1) {
            $status =   "Active";
        } else {
            $status =   "Not Active";
        }
        return $status;
    }

    public function setAMWorkingAttribute($value)
    {
        empty($value) ? $this->attributes['am_working'] = NULL : $this->attributes['am_working'] = $value;
    }

    public static function totalMonthlyCoverage()
    {
        $visitClass = Customer::select('class')->where('mr_id', 3)->get()->toArray();
        // mr_session
        $totalVisitsCount   =   VisitClass::whereIn('name', $visitClass)->sum('visits_count');

        $actualVisitsCount  =   Report::where('mr_id', 3) //mr_session
                                        ->where('month', date('M').'-'.date('Y'))
                                        ->count();
        return number_format(($actualVisitsCount/$totalVisitsCount) * 100, 2);
    }

    public static function monthlyProductsBought($id)
    {
        return Report::select('sold_products', 'date')->where('doctor_id', $id)->where('month', date('M-Y'))->get();
    }
}
