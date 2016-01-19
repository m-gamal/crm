<?php

namespace App\Http\Controllers\AM;

use App\Upload;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateCustomerRequest;
use App\Http\Requests\Admin\EditCustomerRequest;
use App\Customer;
use App\Employee;
use App\Http\Requests\Admin\UploadDoctorsListRequest;

class CustomerController extends Controller
{
    public function listAll()
    {
        $employees = Employee::select('id')->where('manager_id', 4)->get(); //am_session

        $customers = Customer::whereIn('mr_id', $employees)->get();

        $dataView 	=   [
            'customers'	=>	 $customers
        ];

        return view('am.customer.list', $dataView);
    }
}
