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

class LineController extends Controller
{
    public function single($currentMonth)
    {
        $actualVisits               =   [];
        $MonthlyCustomerProducts    =   [];

        $doctors                    =   Customer::where('mr_id', 3)->get(); // mr_session;

        foreach($doctors as $singleDoctor)
        {
            // mr_session
            $actualVisits [$singleDoctor->id] = Report::where('mr_id', 3)
                    ->where('month', $currentMonth)
                    ->where('doctor_id', $singleDoctor->id)
                    ->count();
            $MonthlyCustomerProducts[$singleDoctor->id]    =   Customer::monthlyProductsBought([$singleDoctor->id])->toArray();
        }


        $products                   =   Product::where('line_id', Employee::findOrFail(3)->line_id)->get(); // mr_session;
        $coverageStats              =   Employee::coverageStats($currentMonth);
        $allManagers                =   Employee::yourManagers();
        $totalProducts              =   Employee::monthlyDirectSales($currentMonth);

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
        return view('mr.line.single', $dataView);
    }

    public function ajaxCoverageBySpecialty()
    {
        return json_encode(Employee::specialtyCoverageStats());
    }

    public function history()
    {
        $dataView  = [
            // mr_session
            'mr'   =>  Employee::where('id', 3)->where('level_id', 7)->first()
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
                        ->where('mr_id', 3)
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