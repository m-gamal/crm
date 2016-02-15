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
use App\MrLines;

class Employee extends Model implements AuthenticatableContract,
    AuthorizableContract,
    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'employee';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * The level belongs to employee
     */
    public function level()
    {
        return $this->belongsTo('App\Level');
    }

    /**
     * The line belongs to employee
     */
    public function line()
    {
        return $this->belongsTo('App\Line', 'line_id');
    }

    /**
     * The territory belongs to employee
     */
    public function territory()
    {
        return $this->belongsTo('App\Territory');
    }

    /**
     * The manager belongs to employee
     */
    public function manager()
    {
        return $this->belongsTo('App\Employee', 'manager_id');
    }

    /**
     * Get Employee Leaving Date
     */
    public function getLeavingDateAttribute($value)
    {
        if ($value == '0000-00-00') {
            return NULL;
        }
        return $value;
    }

    /**
     * Get Employee Avatar
     */
    public function getAvatar(){

        return Storage::get('avatars/4');
    }

    /**
     * Get Employee Status
     */
    public function getActiveAttribute($value)
    {
        $status = NULL;
        if ($value == 1) {
            $status = "Active";
        } else {
            $status = "Not Active";
        }
        return $status;
    }

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    /**
     * The Lines belongs to Medical Rep.
     */
    public function lines()
    {
        return $this->hasMany('App\MrLines', 'mr_id');
    }

    public static function coverageStats($mrId, $currentMonth)
    {
        $totalVisitsCount   =   0;
        $visitsClassCount   =   Customer::select('class')->where('mr_id', $mrId)->get()->toArray();
        foreach($visitsClassCount as $class)
        {
            $totalVisitsCount   +=   VisitClass::where('name', $class)->first()->visits_count;
        }


        $actualVisitsCount  =   Report::where('mr_id', $mrId)
        ->where('month', $currentMonth)
            ->count();
        return  [
                    'totalVisitsCount'      =>  $totalVisitsCount,
                    'actualVisitsCount'     =>  $actualVisitsCount,
                    'totalMonthlyCoverage'  =>  $totalVisitsCount != 0 ? number_format(($actualVisitsCount/$totalVisitsCount) * 100, 2) : '0'
                ];
    }

    public static function specialtyCoverageStats($mrId)
    {
        $totalVisits        =   [];
        $actualVisits       =   [];
        $specialtyCoverage  =   [];
        $specialty          =   NULL;
        $counter            =   0;

        $allSpecialties = Customer::select('specialty')->where('mr_id', $mrId)->get()->toArray();
        $allCustomersSpecialties = Customer::whereIn('specialty', $allSpecialties)->get()->toArray();

        // Get all medical rep customers specialties
        foreach($allCustomersSpecialties as $singleCustomer)
        {
            $allSpecialtyClasses[$singleCustomer['specialty']]          =   Customer::select('class')->where('specialty', $singleCustomer['specialty'])->get()->toArray();
        }

        // Get all customer classes based on specialty
        foreach($allSpecialtyClasses as $specialty => $specialtyClasses)
        {
            // Calculate total visits based on classes and specialty
            foreach($specialtyClasses as $singleSpecialtyClass) {
                if (isset($totalVisits[$specialty])) {
                    $totalVisits[$specialty] += VisitClass::where('name', $singleSpecialtyClass)->first()->visits_count;
                } else {
                    $totalVisits[$specialty] = VisitClass::where('name', $singleSpecialtyClass)->first()->visits_count;
                }
            }
        }

        // Get all doctors visited
        $doctorsVisited = Report::select('doctor_id')->where('month', date('M-Y'))->where('mr_id', $mrId)->get()->toArray();

        foreach($doctorsVisited as $singleDoctor)
        {
            // calculate actual visits
            $specialty = Customer::select('specialty')->findOrFail($singleDoctor)->first()->specialty;
            if (isset($actualVisits[$specialty])) {
                $actualVisits[$specialty] += 1;
            } else {
                $actualVisits[$specialty] = 1;
            }
        }

        foreach($allCustomersSpecialties as $singleCustomerSpecialty)
        {
            $specialty = $singleCustomerSpecialty['specialty'];
            $specialtyCoverage [$specialty] = 0;
            if (isset($specialtyCoverage [$specialty]) &&
                isset($actualVisits[$specialty]) &&
                isset($totalVisits[$specialty])) {
                $specialtyCoverage [$specialty] = number_format(($actualVisits[$specialty] / $totalVisits[$specialty]) * 100, 2);
            }
        }

        foreach ($specialtyCoverage as $specialty=>$percentage)
        {
            if (isset($specialtyCoverage [$specialty])) {
                $stats[$counter]['label']   =   $specialty;
                $stats[$counter]['data']    =   $percentage;
            }
            $counter++;
        }

        return $stats;
    }



    public static function monthlyDirectSales($mrId, $currentMonth)
    {
        $totalSoldProductsSales = [];
        $totalSoldProductsSalesPrice = 0;

        $reportsId = Report::select('id')->where('month', $currentMonth)
            ->where('mr_id', $mrId)
            ->get()
            ->toArray();

        $allSoldProducts = ReportSoldProduct::whereIn('report_id', $reportsId)->get();

        foreach($allSoldProducts as $singleReportProducts)
        {
            $productName    =   $singleReportProducts->product->name;
            $productPrice   =   $singleReportProducts->product->unit_price;
            $quantity       =   $singleReportProducts->quantity;

            $totalSoldProductsSalesPrice += ($quantity * $productPrice);

            if (isset($totalSoldProductsSales[$productName])){
                $totalSoldProductsSales[$productName] += $quantity;
            }else {
                $totalSoldProductsSales[$productName] = $quantity;
            }
        }
        return [
                'totalSoldProductsSales'        =>  $totalSoldProductsSales,
                'totalSoldProductsSalesPrice'   =>  $totalSoldProductsSalesPrice
        ];
    }

    public static function target($current_month, $product, $territory)
    {
        $current_month      =   explode('-', $current_month);
        $year               =   2016;
        $month              =   $current_month[0];
        $target             =   [];
        $productTarget      =   ProductTarget::select('id', 'quantity')
            ->where('product_id', $product)
            ->where('year', $year)
            ->first();

        if (isset($productTarget)) {
            $areaTarget = AreaTarget::select('id', 'percent', 'months_target')
                ->where('product_target_id', $productTarget['id'])
                ->first();

            $areaUnits = $areaTarget['percent'] * $productTarget['quantity'];

            if(isset($areaTarget)) {
                $territoryTarget = TerritoryTarget::select('id', 'percent', 'months_target')
                    ->where('area_target_id', $areaTarget['id'])
                    ->where('territory_id', $territory)
                    ->first();
            }

            $territoryUnits     =   $areaUnits * $territoryTarget['percent'];
            if ($territoryTarget) {
                $target ['Jan'] = $territoryUnits * json_decode($territoryTarget['months_target']->jan);
                $target ['Feb'] = $territoryUnits * json_decode($territoryTarget['months_target']->feb);
                $target ['Mar'] = $territoryUnits * json_decode($territoryTarget['months_target']->mar);
                $target ['Apr'] = $territoryUnits * json_decode($territoryTarget['months_target']->apr);
                $target ['May'] = $territoryUnits * json_decode($territoryTarget['months_target']->may);
                $target ['Jun'] = $territoryUnits * json_decode($territoryTarget['months_target']->jun);
                $target ['Jul'] = $territoryUnits * json_decode($territoryTarget['months_target']->jul);
                $target ['Aug'] = $territoryUnits * json_decode($territoryTarget['months_target']->aug);
                $target ['Sep'] = $territoryUnits * json_decode($territoryTarget['months_target']->sep);
                $target ['Oct'] = $territoryUnits * json_decode($territoryTarget['months_target']->oct);
                $target ['Nov'] = $territoryUnits * json_decode($territoryTarget['months_target']->nov);
                $target ['Dec'] = $territoryUnits * json_decode($territoryTarget['months_target']->dec);
            }
            return $target[$month];
        }

    }

    public static function generalManager()
    {
        return Employee::where('level_id', 1)->first();
    }

    public static function yourAreaManager($mrId)
    {
        $areaManager = Employee::where('id', $mrId)->where('level_id', 7)->first()->manager_id;
        return Employee::findOrFail($areaManager);
    }


    public static function yourSalesManager($mrId)
    {
        return Employee::findOrFail(Employee::yourAreaManager($mrId)->manager_id);
    }

    public static function yourManagers($mrId)
    {
        $salesManager   =   Employee::yourSalesManager($mrId);
        $areaManager    =   Employee::yourAreaManager($mrId);

        return [
            'salesManager'      =>  $salesManager,
            'areaManager'       =>  $areaManager
        ];
    }

    public static function isYourMRAsAM($MRId)
    {
        $yourId     =   \Auth::user()->id;
        return $yourId ==Employee::findOrFail($MRId)->manager_id;
    }

    public static function isYourMRAsSM($MRId)
    {
        $yourId =   \Auth::user()->id;
        $AMId   =   Employee::findOrFail($MRId)->manager_id;
        return $yourId ==  Employee::findOrFail($AMId)->manager_id;
    }

    public static function areYou($MRId)
    {
        $yourId         =   \Auth::user()->id;
        return $yourId ==   Employee::findOrFail($MRId)->id;
    }

    public function setHiringDateAttribute($date)
    {
        $this->attributes['hiring_date'] = \Carbon\Carbon::parse($date)->format('Y-m-d');
    }
}
