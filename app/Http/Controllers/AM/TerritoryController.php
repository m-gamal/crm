<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateTerritoryRequest;
use App\Http\Requests\Admin\EditTerritoryRequest;
use App\Territory;
use App\Area;

class TerritoryController extends Controller
{
    public function listAll()
    {
        $territories = Territory::all();
        $dataView 	= [
            'territories'	=>	 $territories
        ];

        return view('admin.territory.list', $dataView);
    }

    public function create()
    {
        $areas =  Area::all();
        $dataView 	= [
            'areas'	=>	 $areas
        ];

        return view('admin.territory.create', $dataView);
    }

    public function doCreate(CreateTerritoryRequest $request)
    {

        $territory   =   new Territory;

        $territory->name    = $request->name;
        $territory->area_id = $request->area;
        try {
            $territory->save();
            return redirect()->back()->with('message','Territory has been added successfully !');
        } catch (ParseException $ex) {
            echo 'Failed to create new meal , with error message: ' . $ex->getMessage();
        }
    }

    public function update($id)
    {
        $territory = Territory::findOrFail($id);
        $areas =  Area::all();
        $dataView 	= [
            'territory'	=>  $territory,
            'areas'     =>  $areas
        ];

        return view('admin.territory.edit', $dataView);
    }

    public function doUpdate(EditTerritoryRequest $request, $id)
    {
        $territory   =   Territory::findOrFail($id);
        $territory->name    = $request->name;
        $territory->area_id = $request->area;

        try {
            $territory->save();
            return redirect()->route('territories')->with('message','Territory has been updated successfully !');
        } catch (ParseException $ex) {
            echo 'Failed to create new meal , with error message: ' . $ex->getMessage();
        }
    }

    public function doDelete($id)
    {
        $territory  =   Territory::findOrFail($id);

        try {
            $territory->delete();
            return redirect()->back()->with('message','Territory has been deleted successfully !');
        } catch (ParseException $ex) {
            echo 'Failed to create new meal , with error message: ' . $ex->getMessage();
        }
    }
}
