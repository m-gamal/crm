<?php

namespace App\Http\Controllers\SM;

use App\Customer;
use App\Employee;
use App\Product;
use App\SMPlan;
use App\SMReport;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $AMsIds     =   Employee::select('id')->where('manager_id', \Auth::user()->id)->get();
        $employees  =   Employee::select('line_id')->whereIn('manager_id', $AMsIds)->get(); //am_session

        $products   =   Product::whereIn('line_id', $employees)->get();

        $employeesId=   Employee::select('id')->whereIn('manager_id', $AMsIds)->get();
        $customers  =   Customer::whereIn('mr_id', $employeesId)->get();

        $MRs        =   Employee::whereIn('manager_id', $AMsIds)->get();
        $AMs        =   Employee::where('manager_id', \Auth::user()->id)->get();

        $dataView = [
            'productsCount'     =>  count($products),
            'plansCount'        =>  SMPlan::where('month', \Config::get('app.current_month'))->count(),
            'reportsCount'      =>  SMReport::where('month', \Config::get('app.current_month'))->count(),
            'customersCount'    =>  count($customers),
            'employeesCount'    =>  count($MRs) + count($AMs)
        ];
        return view('sm.index', $dataView);
    }
}