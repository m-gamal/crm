<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\SMReport;
use App\AMReport;
use App\Report;
use App\Employee;
use App\Http\Requests\Admin\PlanSearchRequest;

class ExportController extends Controller
{
    public function singleReport($level, $id, $type)
    {
        if ($level == 'sm')
        {
            $singleReport = SMReport::findOrFail($id);
        } elseif ($level == 'am'){
            $singleReport = AMReport::findOrFail($id);
        } elseif ($level == 'mr'){
            $singleReport = Report::findOrFail($id);
        }


        \Excel::create('report-'.$level.'-'.$singleReport->emp->name.'-'.$singleReport->date,
            function($excel)use($singleReport)  {
            $excel->sheet('report', function($sheet) use($singleReport){
                $sheet->setAllBorders('thin');
                $sheet->loadView('admin.export.single_report')->with('singleReport', $singleReport);
            });
        })->export($type);
    }

    public function planSearch($type)
    {
        $planSearchResult           =   \Session::get('planSearchResult');
        $emp                        =   Employee::findOrFail(\Session::get('emp'))->name;
        $from                       =   \Session::get('date_from');
        $to                         =   \Session::get('date_to');

        \Excel::create('plan-search',
            function($excel)use($planSearchResult, $emp, $from, $to)  {
                $excel->sheet('from-'.$from.'-to-'.$to, function($sheet) use($planSearchResult, $emp, $from, $to) {
                    $sheet->setAllBorders('thin');
                    $sheet->loadView('admin.export.search_plan_result')
                        ->with('planSearchResult', $planSearchResult)
                        ->with('emp', $emp)
                        ->with('date_from', $from)
                        ->with('date_to', $to);
                });
            })->export($type);
    }


    public function leaveRequestSearch($type)
    {
        $leaveRequestSearchResult   =   \Session::get('leaveRequestSearchResult');
        $emp                        =   Employee::findOrFail(\Session::get('emp'))->name;
        $from                       =   \Session::get('date_from');
        $to                         =   \Session::get('date_to');

        \Excel::create('leave-request-search',
            function($excel)use($leaveRequestSearchResult, $emp, $from, $to)  {
                $excel->sheet('from-'.$from.'-to-'.$to, function($sheet) use($leaveRequestSearchResult, $emp, $from, $to) {
                    $sheet->setAllBorders('thin');
                    $sheet->loadView('admin.export.search_leave_request_result')
                        ->with('leaveRequestSearchResult', $leaveRequestSearchResult)
                        ->with('emp', $emp)
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
                    $sheet->loadView('admin.export.search_sales_result')
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
        $emp                        =   Employee::findOrFail(\Session::get('emp'))->name;

        \Excel::create('coverage-search',
            function($excel)use($searchResult, $emp, $from, $to)  {
                $excel->sheet('from-'.$from.'-to-'.$to, function($sheet) use($searchResult,$emp, $from, $to) {
                    $sheet->setAllBorders('thin');
                    $sheet->loadView('admin.export.search_coverage_result')
                        ->with('emp', $emp)
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
        $emp                        =   Employee::findOrFail(\Session::get('emp'))->name;
        $level                      =   \Session::get('level');

        \Excel::create('report-search',
            function($excel)use($searchResult, $emp, $level, $from, $to)  {
                $excel->sheet('from-'.$from.'-to-'.$to, function($sheet) use($searchResult,$emp, $level, $from, $to) {
                    $sheet->setAllBorders('thin');
                    $sheet->loadView('admin.export.search_report_result')
                        ->with('emp', $emp)
                        ->with('level', $level)
                        ->with('searchResult', $searchResult)
                        ->with('date_from', $from)
                        ->with('date_to', $to);
                });
            })->export($type);
    }
}
