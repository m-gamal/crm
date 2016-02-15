<?php

namespace App\Http\Controllers\SM;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Customer;
use App\Employee;

class CustomerController extends Controller
{
    public function search()
    {
        $AMsIds     =   Employee::select('id')->where('manager_id', \Auth::user()->id)->get();
        $MRs        =   Employee::whereIn('manager_id', $AMsIds)->get();
        $dataView   =   [
            'MRs'    => $MRs
        ];
        return view('sm.customer.search', $dataView);
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

        return view('sm.customer.list', $dataView);
    }

    public function listAll()
    {
        $AMsIds     =   Employee::select('id')->where('manager_id', \Auth::user()->id)->get();
        $employees  =   Employee::select('id')->whereIn('manager_id', $AMsIds)->get();

        $customers = Customer::whereIn('mr_id', $employees)->get();

        $dataView 	=   [
            'customers'	=>	 $customers
        ];

        return view('sm.customer.list', $dataView);
    }

    public function single($id)
    {
        $doctor = Customer::findOrFail($id);
        $dataView = [
            'doctor'    => $doctor
        ];
        return view('sm.customer.single', $dataView);
    }
}
