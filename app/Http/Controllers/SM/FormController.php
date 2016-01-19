<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\FormRequest;
use App\Form;

class FormController extends Controller
{
    public function listAll()
    {
        $forms = Form::all();
        $dataView 	= [
            'forms'	=>	 $forms
        ];

        return view('admin.form.list', $dataView);
    }

    public function create()
    {
        return view('admin.form.create');
    }

    public function doCreate(FormRequest $request)
    {
        $form   =   new Form;

        $form->name = $request->name;


        try {
            $form->save();
            return redirect()->back()->with('message','Form has been added successfully !');
        } catch (ParseException $ex) {
            echo 'Failed to create new meal , with error message: ' . $ex->getMessage();
        }
    }

    public function update($id)
    {
        $form = Form::findOrFail($id);
        $dataView 	= [
            'form'	=>  $form
        ];

        return view('admin.form.edit', $dataView);
    }

    public function doUpdate(FormRequest $request, $id)
    {
        $form   =   Form::findOrFail($id);
        $form->name = $request->name;


        try {
            $form->save();
            return redirect()->route('forms')->with('message','Form has been updated successfully !');
        } catch (ParseException $ex) {
            echo 'Failed to create new meal , with error message: ' . $ex->getMessage();
        }
    }

    public function doDelete($id)
    {
        $form  =   Form::findOrFail($id);

        try {
            $form->delete();
            return redirect()->back()->with('message','Form has been deleted successfully !');
        } catch (ParseException $ex) {
            echo 'Failed to create new meal , with error message: ' . $ex->getMessage();
        }
    }
}
