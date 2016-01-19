<?php

namespace App\Http\Controllers\SM;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Customer;
use App\Employee;

class CustomerController extends Controller
{
    public function listAll()
    {
        $AMsIds     =   Employee::select('id')->where('manager_id', 1)->get(); //sm_session
        $employees  =   Employee::select('id')->whereIn('manager_id', $AMsIds)->get();

        $customers = Customer::whereIn('mr_id', $employees)->get();

        $dataView 	=   [
            'customers'	=>	 $customers
        ];

        return view('sm.customer.list', $dataView);
    }
}
