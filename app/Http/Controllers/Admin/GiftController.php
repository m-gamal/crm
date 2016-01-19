<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateGiftRequest;
use App\Http\Requests\Admin\EditGiftRequest;
use App\Gift;

class GiftController extends Controller
{
    public function listAll()
    {
        $gifts = Gift::all();
        $dataView 	= [
            'gifts'	=>	 $gifts
        ];

        return view('admin.gift.list', $dataView);
    }

    public function create()
    {
        return view('admin.gift.create');
    }

    public function doCreate(CreateGiftRequest $request)
    {
        $gift   =   new Gift;

        $gift->name          = $request->name;
        $gift->quantity      = $request->quantity;

        try {
            $gift->save();
            return redirect()->back()->with('message','Gift has been added successfully !');
        } catch (ParseException $ex) {
            echo 'Failed to create new meal , with error message: ' . $ex->getMessage();
        }
    }

    public function single($id)
    {
        //  return view ('admin.gift.single');
    }

    public function update($id)
    {
        $gift = Gift::findOrFail($id);
        $dataView 	= [
            'gift'	=>  $gift
        ];

        return view('admin.gift.edit', $dataView);
    }

    public function doUpdate(EditGiftRequest $request, $id)
    {
        $gift   =   Gift::findOrFail($id);

        $gift->name          = $request->name;
        $gift->quantity      = $request->quantity;


        try {
            $gift->save();
            return redirect()->route('gifts')->with('message','Gift has been updated successfully !');
        } catch (ParseException $ex) {
            echo 'Failed to create new meal , with error message: ' . $ex->getMessage();
        }
    }

    public function doDelete($id)
    {
        $gift  =   Gift::findOrFail($id);

        try {
            $gift->delete();
            return redirect()->back()->with('message','Gift has been deleted successfully !');
        } catch (ParseException $ex) {
            echo 'Failed to create new meal , with error message: ' . $ex->getMessage();
        }
    }
}
