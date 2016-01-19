<?php

namespace App\Http\Controllers\Admin;

use App\Upload;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateCustomerRequest;
use App\Http\Requests\Admin\EditCustomerRequest;
use App\Customer;
use App\Employee;
use App\Http\Requests\Admin\UploadDoctorsListRequest;
use Request;

class CustomerController extends Controller
{
    public function search()
    {
        $MRs        =   Employee::where('level_id', 7)->active()->get();
        $dataView   =   [
            'MRs'    => $MRs
        ];
        return view('admin.customer.search', $dataView);
    }

    public function doSearch()
    {
        $mr         =   Request::input('mr');
        $name       =   Request::input('name');

        $query  = new Customer();

        if(!empty($mr)){
            $query = $query->where('mr_id', $mr);
        }

        if(!empty($name)){
            $query = $query->where('name', 'LIKE', '%'.$name.'%');
        }

        $searchResult   =   $query->get();
//
        $dataView   =   [
            'customers'  =>  $searchResult
        ];

        return view('admin.customer.list', $dataView);
    }

    public function listAll()
    {
        $customers  = Customer::all();
        $dataView 	= [
            'customers'	=>	 $customers
        ];

        return view('admin.customer.list', $dataView);
    }

    public function single($id)
    {
        $doctor = Customer::findOrFail($id);
        $dataView = [
            'doctor'    => $doctor
        ];
        return view('admin.customer.single', $dataView);
    }

    public function create()
    {
        $mrs        = Employee::where('level_id', 7)->active()->get();
        $dataView   =  [
            'mrs'   => $mrs
        ];
        return view('admin.customer.create', $dataView);
    }

    public function doCreate(CreateCustomerRequest $request)
    {
        $customer   =   new Customer;

        $customer->name                 = $request->name;
        $customer->email                = $request->email;
        $customer->class                = $request->class;
        $customer->description          = $request->description;
        $customer->description_name     = $request->description_name;
        $customer->specialty            = $request->specialty;
        $customer->mobile               = $request->mobile;
        $customer->clinic_tel           = $request->clinic_tel;
        $customer->address              = $request->address;
        $customer->address_description  = $request->address_description;
        $customer->am_working           = $request->am_working;
        $customer->mr_id                = $request->mr;
        $customer->active               = $request->active;
        try {
            $customer->save();
            return redirect()->back()->with('message','Customer has been added successfully !');
//            print_r($customer);
        } catch (ParseException $ex) {
            echo 'Failed to create new customer , with error message: ' . $ex->getMessage();
        }
    }

    public function update($id)
    {
        $customer   = Customer::findOrFail($id);
        $mrs        = Employee::where('level_id', 7)->active()->get();
        $dataView 	= [
            'customer'	=>  $customer,
            'mrs'       =>  $mrs
        ];

        return view('admin.customer.edit', $dataView);
    }

    public function doUpdate(EditCustomerRequest $request, $id)
    {
        $customer   =   Customer::findOrFail($id);

        $customer->name                 = $request->name;
        $customer->email                = $request->email;
        $customer->class                = $request->class;
        $customer->description          = $request->description;
        $customer->description_name     = $request->description_name;
        $customer->specialty            = $request->specialty;
        $customer->mobile               = $request->mobile;
        $customer->clinic_tel           = $request->clinic_tel;
        $customer->address              = $request->address;
        $customer->address_description  = $request->address_description;
        $customer->am_working           = $request->am_working;
        $customer->mr_id                = $request->mr;
        $customer->active               = $request->active;

        try {
            $customer->save();
            return redirect()->route('customers')->with('message','Customer has been updated successfully !');
            print_r($customer);
        } catch (ParseException $ex) {
            echo 'Failed to create new meal , with error message: ' . $ex->getMessage();
        }
    }

    public function doDelete($id)
    {
        $customer  =   Customer::findOrFail($id);

        try {
            $customer->delete();
            return redirect()->back()->with('message', 'Customer has been deleted successfully !');
        } catch (ParseException $ex) {
            echo 'Failed to create new meal , with error message: ' . $ex->getMessage();
        }
    }

    public function upload($mrId)
    {
        $dataView 	= [
            'mrId'       =>  $mrId
        ];

        return view('admin.employee.upload_doctors_list', $dataView);
    }

    public function doUpload (UploadDoctorsListRequest $request, $mrId)
    {
        $extension = $request->file('list')->getClientOriginalExtension();
        $request->file('list')->move(public_path('uploads/doctors_list/'.$mrId), 'doctors_list.'.$extension);

        \Excel::load(public_path('uploads/doctors_list/'.$mrId.'/doctors_list.xlsx'), function($reader) use ($mrId){
            $results = $reader->get();

            foreach ($results as $row) {
                Customer::create([
                    'name'                  => $row->name,
                    'email'                 => $row->email,
                    'class'                 => $row->class,
                    'description'           => $row->description,
                    'description_name'      => $row->description_name,
                    'specialty'             => $row->specialty,
                    'mobile'                => $row->mobile,
                    'clinic_tel'            => $row->clinic_tel,
                    'address'               => $row->address,
                    'address_description'   => $row->address_description,
                    'am_working'            => $row->am_working,
                    'time_of_visit'         => $row->time_of_visit,
                    'comment'               => $row->comment,
                    'active'                =>  1,
                    'mr_id'                 => $mrId
                ]);
            }
        });

        return redirect()->back()->with('message', 'Customer List has been uploaded successfully !');
    }
}
