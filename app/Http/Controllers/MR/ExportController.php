<?php

namespace App\Http\Controllers\MR;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\SMReport;
use App\AMReport;
use App\Report;
use App\Employee;
use App\Plan;
use App\Http\Requests\Admin\PlanSearchRequest;

class ExportController extends Controller
{
    public function singleReport($id, $type)
    {
        $singleReport = Report::findOrFail($id);
        \Excel::create('report-'.$singleReport->date,
            function($excel)use($singleReport)  {
            $excel->sheet('report', function($sheet) use($singleReport){
                $sheet->setAllBorders('thin');
                $sheet->loadView('mr.export.single_report')->with('singleReport', $singleReport);
            });
        })->export($type);
    }

    public function planSearch($type)
    {
        $planSearchResult           =   \Session::get('planSearchResult');
        $from                       =   \Session::get('date_from');
        $to                         =   \Session::get('date_to');

        \Excel::create('plan-search',
            function($excel)use($planSearchResult, $from, $to)  {
                $excel->sheet('from-'.$from.'-to-'.$to, function($sheet) use($planSearchResult, $from, $to) {
                    $sheet->setAllBorders('thin');
                    $sheet->loadView('mr.export.search_plan_result')
                        ->with('planSearchResult', $planSearchResult)
                        ->with('date_from', $from)
                        ->with('date_to', $to);
                });
            })->export($type);
    }


    public function leaveRequestSearch($type)
    {
        $leaveRequestSearchResult   =   \Session::get('leaveRequestSearchResult');
        $from                       =   \Session::get('date_from');
        $to                         =   \Session::get('date_to');

        \Excel::create('leave-request-search',
            function($excel)use($leaveRequestSearchResult, $from, $to)  {
                $excel->sheet('from-'.$from.'-to-'.$to, function($sheet) use($leaveRequestSearchResult, $from, $to) {
                    $sheet->setAllBorders('thin');
                    $sheet->loadView('mr.export.search_leave_request_result')
                        ->with('leaveRequestSearchResult', $leaveRequestSearchResult)
                        ->with('date_from', $from)
                        ->with('date_to', $to);
                });
            })->export($type);
    }

    public function salesSearch($type)
    {
        $productSales               =   \Session::get('productSales');
        $from                       =   \Session::get('date_from');
        $to                         =   \Session::get('date_to');

        \Excel::create('sales-search',
            function($excel)use($productSales, $from, $to)  {
                $excel->sheet('from-'.$from.'-to-'.$to, function($sheet) use($productSales, $from, $to) {
                    $sheet->setAllBorders('thin');
                    $sheet->loadView('mr.export.search_sales_result')
                        ->with('productSales', $productSales)
                        ->with('date_from', $from)
                        ->with('date_to', $to);
                });
            })->export($type);
    }

    public function coverageSearch($type)
    {
        $searchResult               =   \Session::get('searchResult');
        $from                       =   \Session::get('date_from');
        $to                         =   \Session::get('date_to');

        \Excel::create('coverage-search',
            function($excel)use($searchResult, $from, $to)  {
                $excel->sheet('from-'.$from.'-to-'.$to, function($sheet) use($searchResult, $from, $to) {
                    $sheet->setAllBorders('thin');
                    $sheet->loadView('mr.export.search_coverage_result')
                        ->with('searchResult', $searchResult)
                        ->with('date_from', $from)
                        ->with('date_to', $to);
                });
            })->export($type);
    }


    public function reportSearch($type)
    {
        $searchResult               =   \Session::get('searchResult');
        $from                       =   \Session::get('date_from');
        $to                         =   \Session::get('date_to');

        \Excel::create('report-search',
            function($excel)use($searchResult, $from, $to)  {
                $excel->sheet('from-'.$from.'-to-'.$to, function($sheet) use($searchResult, $from, $to) {
                    $sheet->setAllBorders('thin');
                    $sheet->loadView('mr.export.search_report_result')
                        ->with('searchResult', $searchResult)
                        ->with('date_from', $from)
                        ->with('date_to', $to);
                });
            })->export($type);
    }

    public function plans($type)
    {
        $plans               =   Plan::where('month', \config('app.current_month'))->where('mr_id', \Auth::user()->id)->get();

        \Excel::create('plans',
            function($excel)use($plans)  {
                $excel->sheet('plans', function($sheet) use($plans) {
                    $sheet->setAllBorders('thin');
                    $sheet->loadView('mr.export.plans')
                        ->with('plans', $plans);
                });
            })->export($type);
    }
}