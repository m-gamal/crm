<?php

namespace App\Http\Controllers\AM;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Customer;
use App\Employee;

class CustomerController extends Controller
{
    public function search()
    {
        $MRs        =   Employee::where('manager_id', \Auth::user()->id)->get();
        $dataView   =   [
            'MRs'    => $MRs
        ];
        return view('am.customer.search', $dataView);
    }

    public function doSearch()
    {
        $mr         =   \Request::input('mr');
        $name       =   \Request::input('name');

        $query  = new Customer();

        if(!empty($mr)){
            $query = $query->where('mr_id', $mr);
        }

        if(!empty($name)){
            $query = $query->where('name', 'LIKE', '%'.$name.'%');
        }

        $searchResult   =   $query->get();

        $dataView   =   [
            'customers'  =>  $searchResult
        ];

        \Session::flash('customers', $searchResult);

        return view('am.customer.list', $dataView);
    }

    public function listAll()
    {
        $employees = Employee::select('id')->where('manager_id', \Auth::user()->id)->get();
        $customers = Customer::whereIn('mr_id', $employees)->get();

        $dataView 	=   [
            'customers'	=>	 $customers
        ];

        return view('am.customer.list', $dataView);
    }

    public function single($id)
    {
        $doctor = Customer::findOrFail($id);
        $dataView = [
            'doctor'    => $doctor
        ];
        return view('am.customer.single', $dataView);
    }
}
