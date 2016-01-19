<?php

namespace App\Http\Controllers\Admin;

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
        $employees = Employee::all();
        $dataView 	= [
            'employees'	=>	 $employees
        ];
        return view('admin.employee.list', $dataView);
    }

    public function create()
    {
        $lines          =   Line::all();
        $levels         =   Level::all();
        $salesManagers  =   Employee::where('level_id', 2)->get();
        $areaManagers   =   Employee::where('level_id', 3)->get();
        $dataView 	= [
            'lines'             =>  $lines,
            'levels'	        =>  $levels,
            'salesManagers'     =>  $salesManagers,
            'areaManagers'      =>  $areaManagers,
        ];

        return view('admin.employee.create', $dataView);
    }

    public function doCreate(CreateEmployeeRequest $request)
    {
        $employee = new Employee;
        $employee->line_id          =    $request->line;
        $employee->name             =    $request->name;
        $employee->email            =    $request->email;
        $employee->password         =    Hash::make($request->password);
        $employee->level_id         =    $request->level;
        if ($request->level == 7)
        {
            $employee->manager_id       =    $request->area_manager;
        } else if($request->level == 3) {
            $employee->manager_id       =    $request->sales_manager;
        }

        $employee->hiring_date      =    $request->hiring_date;
        $employee->leaving_date     =    empty($request->leaving_date) ? NULL : $request->leaving_date;
        $employee->active           =    $request->active;

        try {
            if ($employee->save()) {
                $imgExtension = $request->file('photo')->getClientOriginalExtension();
                $request->file('photo')
                    ->move(public_path('img/avatar'), $employee->id);
            }
            return redirect()->back()
                ->withInput($request->except('password'))
                ->with('message','Employee has been added successfully !');
        } catch (ParseException $ex) {
            echo 'Failed to create new employee , with error message: ' . $ex->getMessage();
        }
    }

    public function update($id)
    {
        $lines      =   Line::all();
        $levels     =   Level::all();
        $employee   =   Employee::findOrFail($id);
        $salesManagers =   Employee::where('level_id', 2)->get();
        $areaManagers  =   Employee::where('level_id', 3)->get();

        $dataView 	= [
            'lines'         =>  $lines,
            'levels'    	=>	$levels,
            'employee'      =>  $employee,
            'salesManagers' =>  $salesManagers,
            'areaManagers'  =>  $areaManagers
        ];

        return view('admin.employee.edit', $dataView);
    }

    public function doUpdate(EditEmployeeRequest $request, $id)
    {
        $employee = Employee::findOrFail($id);
        $employee->line_id          =    $request->line;
        $employee->name             =    $request->name;
        $employee->email            =    $request->email;
        $employee->level_id         =    $request->level;
        if ($request->level == 7)
        {
            $employee->manager_id       =    $request->area_manager;
        } else if($request->level == 3) {
            $employee->manager_id       =    $request->sales_manager;
        }

        $employee->hiring_date      =    $request->hiring_date;
        $employee->leaving_date     =    empty($request->leaving_date) ? NULL : $request->leaving_date;
        $employee->active           =    $request->active;


        try {
            $employee->save();
            if ($request->file('photo')) {
                // Delete Old Photo
                $this->deletAvatar($id);
                $request->file('photo')
                    ->move(public_path('img/avatar'), $employee->id);
            }
            return redirect()->route('employees')->with('message','Employee has been updated successfully !');
        } catch (ParseException $ex) {
            echo $ex->getMessage();
        }
    }

    public function doDelete($id)
    {
        $employee  =   Employee::findOrFail($id);

        try {
            $this->deletAvatar($id);
            $employee->delete();
            return redirect()->back()->with('message','Employee has been deleted successfully !');
        } catch (ParseException $ex) {
            echo 'Failed to delete this employee , with error message: ' . $ex->getMessage();
        }
    }

    public function deletAvatar($id)
    {
        try {
            \File::delete(public_path('img/avatar/' . $id));
        } catch (ParseException $ex) {
            echo 'Failed to delete the photo, with error message: ' . $ex->getMessage();
        }

    }
}
