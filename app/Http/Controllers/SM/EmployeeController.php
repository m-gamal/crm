<?php

namespace App\Http\Controllers\SM;

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
        $AMsIds     =   Employee::select('id')->where('manager_id', \Auth::user()->id)->get();

        $MRs        =   Employee::whereIn('manager_id', $AMsIds)->get();
        $AMs        =   Employee::where('manager_id', \Auth::user()->id)->get();

        $dataView 	= [
            'MRs'	=>	$MRs,
            'AMs'   =>  $AMs
        ];
        return view('sm.employee.list', $dataView);
    }
}
