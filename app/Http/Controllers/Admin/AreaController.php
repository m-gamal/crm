<?php

namespace App\Http\Controllers\Admin;

use App\Employee;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateAreaRequest;
use App\Http\Requests\Admin\EditAreaRequest;
use App\Area;
use App\Territory;
use App\ProductTarget;
use App\AreaTarget;
use App\TerritoryTarget;

class AreaController extends Controller
{
    public function target()
    {
        $product = 1;
        $territory = 1;

        $productTarget      =   ProductTarget::select('id', 'quantity')
            ->where('product_id', $product)
            ->where('year', 2015)
            ->first();

        $areaTarget         =   AreaTarget::select('id', 'percent', 'months_target')
                                    ->where('product_target_id', $productTarget['id'])
                                    ->first();

        $areaUnits          =   $areaTarget['percent'] * $productTarget['quantity'];

        $territoryTarget    =   TerritoryTarget::select('id', 'percent', 'months_target')
            ->where('area_target_id', $areaTarget['id'])
            ->where('territory_id', $territory)
            ->first();

        $territoryUnits     =   $areaUnits * $territoryTarget['percent'];
        $target ['jan']     =   $territoryUnits * json_decode($territoryTarget['months_target']->jan);
        $target ['feb']     =   $territoryUnits * json_decode($territoryTarget['months_target']->feb);
        $target ['mar']     =   $territoryUnits * json_decode($territoryTarget['months_target']->mar);
        $target ['apr']     =   $territoryUnits * json_decode($territoryTarget['months_target']->apr);
        $target ['may']     =   $territoryUnits * json_decode($territoryTarget['months_target']->may);
        $target ['jun']     =   $territoryUnits * json_decode($territoryTarget['months_target']->jun);
        $target ['jul']     =   $territoryUnits * json_decode($territoryTarget['months_target']->jul);
        $target ['aug']     =   $territoryUnits * json_decode($territoryTarget['months_target']->aug);
        $target ['sep']     =   $territoryUnits * json_decode($territoryTarget['months_target']->sep);
        $target ['oct']     =   $territoryUnits * json_decode($territoryTarget['months_target']->oct);
        $target ['nov']     =   $territoryUnits * json_decode($territoryTarget['months_target']->nov);
        $target ['dec']     =   $territoryUnits * json_decode($territoryTarget['months_target']->dec);
        return $target;

    }

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
        $AMs = Employee::where('level_id', 3)->active()->get();
        $dataView = [
            'AMs'   =>  $AMs
        ];
        return view('admin.area.create', $dataView);
    }

    public function doCreate(CreateAreaRequest $request)
    {
        $area   =   new Area;

        $area->name     =   $request->name;
        $area->am_id    =   $request->am;

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
        $AMs = Employee::where('level_id', 3)->active()->get();

        $dataView 	= [
            'area'	=>  $area,
            'AMs'   =>  $AMs
        ];

        return view('admin.area.edit', $dataView);
    }

    public function doUpdate(EditAreaRequest $request, $id)
    {
        $area   =   Area::findOrFail($id);
        $area->name     =   $request->name;
        $area->am_id    =   $request->am;

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
