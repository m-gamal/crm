<?php

namespace App\Http\Controllers\MR;

use App\Employee;
use App\Http\Requests\MR\LineHistoryRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\MrLines;
use App\Product;
use App\Customer;
use App\Report;
use Config;
use Illuminate\Support\Facades\Redirect;
use App\VisitClass;
use App\ProductTarget;
use App\AreaTarget;
use App\TerritoryTarget;

class LineController extends Controller
{
    public static function target()
    {
        $product = 1;
        $territory = 1;

        $productTarget      =   ProductTarget::select('id', 'quantity')
            ->where('product_id', $product)
            ->where('year', 2015)
            ->first();

        $areaTarget         =   AreaTarget::select('id', 'percent', 'months_target')
            ->where('product_target_id', $productTarget['id'])
            ->first();

        $areaUnits          =   $areaTarget['percent'] * $productTarget['quantity'];

        $territoryTarget    =   TerritoryTarget::select('id', 'percent', 'months_target')
            ->where('area_target_id', $areaTarget['id'])
            ->where('territory_id', $territory)
            ->first();

        $territoryUnits     =   $areaUnits * $territoryTarget['percent'];
        $target ['jan']     =   $territoryUnits * json_decode($territoryTarget['months_target']->jan);
        $target ['feb']     =   $territoryUnits * json_decode($territoryTarget['months_target']->feb);
        $target ['mar']     =   $territoryUnits * json_decode($territoryTarget['months_target']->mar);
        $target ['apr']     =   $territoryUnits * json_decode($territoryTarget['months_target']->apr);
        $target ['may']     =   $territoryUnits * json_decode($territoryTarget['months_target']->may);
        $target ['jun']     =   $territoryUnits * json_decode($territoryTarget['months_target']->jun);
        $target ['jul']     =   $territoryUnits * json_decode($territoryTarget['months_target']->jul);
        $target ['aug']     =   $territoryUnits * json_decode($territoryTarget['months_target']->aug);
        $target ['sep']     =   $territoryUnits * json_decode($territoryTarget['months_target']->sep);
        $target ['oct']     =   $territoryUnits * json_decode($territoryTarget['months_target']->oct);
        $target ['nov']     =   $territoryUnits * json_decode($territoryTarget['months_target']->nov);
        $target ['dec']     =   $territoryUnits * json_decode($territoryTarget['months_target']->dec);
        return $target;
    }

    public function single($currentMonth)
    {
        $actualVisits               =   [];
        $MonthlyCustomerProducts    =   [];

        $doctors                    =   Customer::where('mr_id', \Auth::user()->id)->get();

        foreach($doctors as $singleDoctor)
        {

            $actualVisits [$singleDoctor->id] = Report::where('mr_id', \Auth::user()->id)
                    ->where('month', $currentMonth)
                    ->where('doctor_id', $singleDoctor->id)
                    ->count();
            $MonthlyCustomerProducts[$singleDoctor->id]    =   Customer::monthlyProductsBought([$singleDoctor->id])->toArray();
        }

        $products                   =   Product::where('line_id', Employee::findOrFail(\Auth::user()->id)->line_id)->get();
        $coverageStats              =   Employee::coverageStats(\Auth::user()->id, $currentMonth);
        $allManagers                =   Employee::yourManagers(\Auth::user()->id);
        $totalProducts              =   Employee::monthlyDirectSales(\Auth::user()->id, $currentMonth);

        $totalSoldProductsSales     =   $totalProducts['totalSoldProductsSales'];
        $totalSoldProductsSalesPrice=   $totalProducts['totalSoldProductsSalesPrice'];


        $dataView  = [
            'doctors'                       =>  $doctors,
            'MonthlyCustomerProducts'       =>  $MonthlyCustomerProducts,
            'actualVisits'                  =>  $actualVisits,
            'products'                      =>  $products,
            'totalVisitsCount'              =>  $coverageStats['totalVisitsCount'],
            'actualVisitsCount'             =>  $coverageStats['actualVisitsCount'],
            'totalMonthlyCoverage'          =>  $coverageStats['totalMonthlyCoverage'],
            'allManagers'                   =>  $allManagers,
            'totalSoldProductsSales'        =>  $totalSoldProductsSales,
            'totalSoldProductsSalesPrice'   =>  $totalSoldProductsSalesPrice,
        ];

        \Session::set('customers', $doctors);

        return view('mr.line.single', $dataView);
    }

    public function ajaxCoverageBySpecialty()
    {
        return json_encode(Employee::specialtyCoverageStats(\Auth::user()->id));
    }

    public function specialtyCoverageStats($mrId)
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

    public function history()
    {
        $dataView  = [
            'mr'   =>  Employee::where('id', \Auth::user()->id)->where('level_id', 7)->first()
        ];
        return view('mr.line.history.search', $dataView);
    }

    public function doHistory(LineHistoryRequest $request)
    {


        $year   =   $request->year;
        $month  =   $request->month;
        $line   =   isset($request->line) ? $request->line : NULL;

        $month = \Carbon\Carbon::parse($month.'-'.$year);

        $line = MrLines::select('id', 'from', 'to')
                        ->where('mr_id', \Auth::user()->id)
                        ->where('line_id', $line)
                        ->first();

        $lineFrom   = \Carbon\Carbon::parse($line->from);
        $lineTo     = \Carbon\Carbon::parse($line->to);

        if (is_null($line->to) && ! $month->gte($lineFrom) ){
            return Redirect::back()->with('message', 'You don\'t have access to this line now');
        }

        if (! $month->lte($lineTo) && $month->gte($lineFrom) )
        {
            return Redirect::back()->with('message', 'You don\'t have access to this line now');
        }

        return Redirect::route('singleLine', \Carbon\Carbon::parse($month)->format('M-Y'));
    }
}