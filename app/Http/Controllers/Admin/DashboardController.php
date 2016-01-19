<?php

namespace App\Http\Controllers\Admin;

use App\Customer;
use App\Employee;
use App\Product;
use App\Plan;
use App\Report;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $dataView = [
            'productsCount'     =>  Product::count(),
            'plansCount'        =>  Plan::where('month', \Config::get('app.current_month'))->count(),
            'reportsCount'      =>  Report::where('month', \Config::get('app.current_month'))->count(),
            'customersCount'    =>  Customer::count(),
            'employeesCount'    =>  Employee::count()
        ];
        return view('admin.index', $dataView);
    }

    public function lock()
    {
        return view('admin.partials.lock');
    }
}
