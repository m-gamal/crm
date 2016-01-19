<?php

namespace App\Http\Controllers\MR;

use App\Customer;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\MR\SalesSearchRequest;
use App\Product;
use App\Employee;
use App\Report;

class CustomerController extends Controller
{
    public function single($id)
    {
        $doctor = Customer::where('id', $id)->first();
        $dataView = [
            'doctor'    => $doctor
        ];
        return view('mr.doctor.single', $dataView);
    }
}
