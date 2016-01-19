<?php

namespace App\Http\Controllers\AM;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateAreaRequest;
use App\Http\Requests\Admin\EditAreaRequest;
use App\Area;

class AreaController extends Controller
{
    public function listAll()
    {
        $areas = Area::all();
        $dataView 	= [
            'areas'	=>	 $areas
        ];

        return view('admin.area.list', $dataView);
    }

    public function create()
    {
        return view('admin.area.create');
    }

    public function doCreate(CreateAreaRequest $request)
    {
        $area   =   new Area;

        $area->name = $request->name;


        try {
            $area->save();
            return redirect()->back()->with('message','Area has been added successfully !');
        } catch (ParseException $ex) {
            echo 'Failed to create new meal , with error message: ' . $ex->getMessage();
        }
    }

    public function update($id)
    {
        $area = Area::findOrFail($id);
        $dataView 	= [
            'area'	=>  $area
        ];

        return view('admin.area.edit', $dataView);
    }

    public function doUpdate(EditAreaRequest $request, $id)
    {
        $area   =   Area::findOrFail($id);
        $area->name = $request->name;


        try {
            $area->save();
            return redirect()->route('areas')->with('message','Area has been updated successfully !');
        } catch (ParseException $ex) {
            echo 'Failed to create new meal , with error message: ' . $ex->getMessage();
        }
    }

    public function doDelete($id)
    {
        $area  =   Area::findOrFail($id);

        try {
            $area->delete();
            return redirect()->back()->with('message','Area has been deleted successfully !');
        } catch (ParseException $ex) {
            echo 'Failed to create new meal , with error message: ' . $ex->getMessage();
        }
    }
}
