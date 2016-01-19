<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateVisitClassRequest;
use App\Http\Requests\Admin\EditVisitClassRequest;
use App\VisitClass;

class VisitClassController extends Controller
{
    public function listAll()
    {
        $visitClasses = VisitClass::all();
        $dataView 	= [
            'visitClasses'	=>	 $visitClasses
        ];

        return view('admin.visit_class.list', $dataView);
    }

    public function create()
    {
        return view('admin.visit_class.create');
    }

    public function doCreate(CreateVisitClassRequest $request)
    {
        $visitClass   =   new VisitClass;

        $visitClass->name           = $request->name;
        $visitClass->visits_count   = $request->visits_count;

        try {
            $visitClass->save();
            return redirect()->back()->with('message','Visit Class has been added successfully !');
        } catch (ParseException $ex) {
            echo 'Failed to create new meal , with error message: ' . $ex->getMessage();
        }
    }

    public function single($id)
    {
        //  return view ('admin.visit_class.single');
    }

    public function update($id)
    {
        $visitClass = VisitClass::findOrFail($id);
        $dataView 	= [
            'visitClass'	=>  $visitClass
        ];

        return view('admin.visit_class.edit', $dataView);
    }

    public function doUpdate(EditVisitClassRequest $request, $id)
    {
        $visitClass   =   VisitClass::findOrFail($id);

        $visitClass->name           = $request->name;
        $visitClass->visits_count   = $request->visits_count;


        try {
            $visitClass->save();
            return redirect()->route('visitsClasses')->with('message','VisitClass has been updated successfully !');
        } catch (ParseException $ex) {
            echo 'Failed to create new meal , with error message: ' . $ex->getMessage();
        }
    }

    public function doDelete($id)
    {
        $visitClass  =   VisitClass::findOrFail($id);

        try {
            $visitClass->delete();
            return redirect()->back()->with('message','VisitClass has been deleted successfully !');
        } catch (ParseException $ex) {
            echo 'Failed to create new meal , with error message: ' . $ex->getMessage();
        }
    }
}