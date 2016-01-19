<?php

namespace App\Http\Controllers\Admin;
use App\Customer;
use App\Employee;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\VisitClass;
use App\Report;
use App\Http\Requests\Admin\CoverageSearchRequest;
class CoverageController extends Controller
{
    public function listAll()
    {
        return view('admin.coverage.list');
    }

    public function search()
    {
        $classes        =   VisitClass::all();
        $specialties    =   Customer::select('specialty')->distinct()->get();
        $MRs            =   Employee::where('level_id', 7)->get();

        $dataView   =   [
            'classes'       =>  $classes,
            'specialties'   =>  $specialties,
            'MRs'           =>  $MRs
        ];

        return view('admin.search.coverage.search', $dataView);
    }

    public function doSearch(CoverageSearchRequest $request)
    {
        $searchResult   =   null;
        $from           =   $request->date_from;
        $to             =   $request->date_to;
        $MR             =   $request->mr;
        $class          =   $request->class;
        $specialty      =   $request->specialty;



        $allReportsInRange = Report::where('date', '>=', $from)
                                    ->where('date', '<=', $to)
                                    ->where('report.mr_id', $MR);

        if (!empty($class))
        {
            $allReportsInRange->join('customer', 'report.doctor_id', '=', 'customer.id')
                ->where('class', $class);
        }

        if (!empty($specialty))
        {
            $allReportsInRange->where('specialty', $specialty);
        }

        $searchResult = $allReportsInRange->get();
        $level          =   'mr';

        $dataView   =   [
            'level'             =>  $level,
            'searchResult'      =>  $searchResult
        ];

        \Session::flash('emp', $MR);
        \Session::flash('date_from', $from);
        \Session::flash('date_to', $to);
        \Session::flash('searchResult', $searchResult);

        return view('admin.search.coverage.result', $dataView);
    }
}
