<?php

namespace App\Http\Controllers\AM;
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
        return view('am.coverage.list');
    }

    public function search()
    {
        $classes        =   VisitClass::all();
        $employees = Employee::select('id')->where('manager_id', \Auth::user()->id)->get();

        $specialties    =   Customer::select('specialty')->whereIn('mr_id', $employees)->distinct()->get();


        $MRs            =   Employee::where('manager_id', \Auth::user()->id)->get();

        $dataView   =   [
            'classes'       =>  $classes,
            'specialties'   =>  $specialties,
            'MRs'           =>  $MRs
        ];

        return view('am.search.coverage.search', $dataView);
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
        $dataView   =   [
            'searchResult'  =>  $searchResult
        ];
        return view('am.search.coverage.result', $dataView);
    }
}
