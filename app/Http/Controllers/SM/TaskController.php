<?php

namespace App\Http\Controllers\Admin;


use App\Employee;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TaskRequest;
use App\Task;
use Illuminate\Support\Facades\Config;

class TaskController extends Controller
{
    public function listAll()
    {
        $tasks = Task::all();
        $dataView 	= [
            'tasks'	=>	 $tasks
        ];

        return view('admin.task.list', $dataView);
    }

    public function create()
    {
        $employees = Employee::where('level_id', '<>', 1)->get();
        $dataView 	= [
            'employees'	=>	 $employees
        ];
        return view('admin.task.create', $dataView);
    }

    public function doCreate(TaskRequest $request)
    {
        $task   =   new Task;

        $task->month        =   \Config::get('app.current_month');
        $task->text         =   $request->text;
        $task->employee_id  =   $request->employee;

        try {
            $task->save();
            return redirect()->back()->with('message','Task has been added successfully !');
        } catch (ParseException $ex) {
            echo 'Failed to create new task , with error message: ' . $ex->getMessage();
        }
    }

    public function update($id)
    {
        $task       = Task::findOrFail($id);
        $employees  = Employee::where('level_id', '<>', 1)->get();
        $dataView 	= [
            'task'	    =>  $task,
            'employees'	=>	 $employees
        ];

        return view('admin.task.edit', $dataView);
    }

    public function doUpdate(TaskRequest $request, $id)
    {
        $task               =   Task::findOrFail($id);

        $task->month        =   \Config::get('app.current_month');
        $task->text         =   $request->text;
        $task->employee_id  =   $request->employee;


        try {
            $task->save();
            return redirect()->route('tasks')->with('message','Task has been updated successfully !');
        } catch (ParseException $ex) {
            echo 'Failed to update task , with error message: ' . $ex->getMessage();
        }
    }

    public function doDelete($id)
    {
        $task  =   Task::findOrFail($id);

        try {
            $task->delete();
            return redirect()->back()->with('message','Task has been deleted successfully !');
        } catch (ParseException $ex) {
            echo 'Failed to delete task , with error message: ' . $ex->getMessage();
        }
    }
}
