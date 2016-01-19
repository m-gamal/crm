<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\Admin\CreateLevelRequest;
use App\Http\Requests\Admin\EditLevelRequest;
use App\Http\Controllers\Controller;
use App\Level;

class LevelController extends Controller
{
    public function listAll()
    {
        $levels = Level::all();
        $dataView 	= [
            'levels'	=>	 $levels
        ];

        return view('admin.level.list', $dataView);
    }

    public function create()
    {
        return view('admin.level.create');
    }

    public function doCreate(CreateLevelRequest $request)
    {
        $level   =   new Level;

        $level->title = $request->title;


        try {
            $level->save();
            return redirect()->back()->with('message','Level has been added successfully !');
        } catch (ParseException $ex) {
            echo 'Failed to create new meal , with error message: ' . $ex->getMessage();
        }
    }

    public function update($id)
    {
        $level = Level::findOrFail($id);
        $dataView 	= [
            'level'	=>  $level
        ];

        return view('admin.level.edit', $dataView);
    }

    public function doUpdate(EditLevelRequest $request, $id)
    {
        $level   =   Level::findOrFail($id);
        $level->title = $request->title;


        try {
            $level->save();
            return redirect()->route('levels')->with('message','Level has been updated successfully !');
        } catch (ParseException $ex) {
            echo 'Failed to create new meal , with error message: ' . $ex->getMessage();
        }
    }

    public function doDelete($id)
    {
        $level  =   Level::findOrFail($id);

        try {
            $level->delete();
            return redirect()->back()->with('message','Level has been deleted successfully !');
        } catch (ParseException $ex) {
            echo 'Failed to create new meal , with error message: ' . $ex->getMessage();
        }
    }
}
