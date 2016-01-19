<?php

namespace App\Http\Controllers\SM;
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
        $AMIds          =   Employee::select('id')->where('manager_id', 1)->get(); //sm_session

        $classes        =   VisitClass::all();

        $employees      =   Employee::select('id')->whereIn('manager_id', $AMIds)->get(); //am_session

        $specialties    =   Customer::select('specialty')->whereIn('mr_id', $employees)->distinct()->get();

        $MRs            =   Employee::whereIn('manager_id', $AMIds)->get(); // am_session

        $dataView   =   [
            'classes'       =>  $classes,
            'specialties'   =>  $specialties,
            'MRs'           =>  $MRs
        ];

        return view('sm.search.coverage.search', $dataView);
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
        return view('sm.search.coverage.result', $dataView);
    }
}
