<?php

namespace App\Http\Controllers\AM;

use App\Employee;
use App\Http\Requests;
use App\Http\Requests\Admin\CreateEmployeeRequest;
use App\Http\Requests\Admin\EditEmployeeRequest;
use App\Http\Controllers\Controller;
use App\Level;
use Illuminate\Support\Facades\Hash;
use App\Line;

class EmployeeController extends Controller
{
    public function listAll()
    {
        $employees = Employee::where('manager_id', \Auth::user()->id)->get();
        $dataView 	= [
            'employees'	=>	 $employees
        ];
        return view('am.employee.list', $dataView);
    }
}
