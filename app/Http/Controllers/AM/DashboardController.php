<?php

namespace App\Http\Controllers\AM;

use App\Customer;
use App\Employee;
use App\Product;
use App\AMPlan;
use App\AMReport;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $employees  =   Employee::select('line_id')->where('manager_id', \Auth::user()->id)->get();
        $products   =   Product::whereIn('line_id', $employees)->get();

        $employees  =   Employee::select('id')->where('manager_id', \Auth::user()->id)->get();
        $customers  =   Customer::whereIn('mr_id', $employees)->get();
        $employees  =   Employee::where('manager_id', \Auth::user()->id)->get();
        $dataView = [
            'productsCount'     =>  count($products),
            'plansCount'        =>  AMPlan::where('month', \Config::get('app.current_month'))->count(),
            'reportsCount'      =>  AMReport::where('month', \Config::get('app.current_month'))->count(),
            'customersCount'    =>  count($customers),
            'employeesCount'    =>  count($employees)
        ];
        return view('am.index', $dataView);
    }
}