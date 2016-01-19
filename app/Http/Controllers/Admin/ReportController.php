<?php

namespace App\Http\Controllers\Admin;

use App\Customer;
use App\Employee;
use App\Gift;
use App\LeaveRequest;
use App\ExpenseReport;
use App\AMExpenseReport;
use App\SMExpenseReport;
use App\SMLeaveRequest;
use App\SMServiceRequest;
use App\Report;
use App\AMReport;
use App\SMReport;
use App\Product;
use App\Http\Requests\Admin\ReportSearchRequest;
use App\Http\Requests\Admin\AMReportSearchRequest;
use App\Http\Requests\Admin\SMReportSearchRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\ServiceRequest;

class ReportController extends Controller
{
    public function listAll()
    {
        return view('admin.report.list');
    }

    public function listAllRequests()
    {
        return view('admin.report.requests_lists');
    }

    public function search()
    {
        $MRs        =   Employee::where('level_id', 7)->get();
        $AMs        =   Employee::where('level_id', 3)->get();
        $SMs        =   Employee::where('level_id', 2)->get();

        $products   =   Product::all();
        $gifts      =   Gift::all();
        $doctors    =   Customer::all();

        $dataView   =   [
            'doctors'   =>  $doctors,
            'MRs'       =>  $MRs,
            'AMs'       =>  $AMs,
            'SMs'       =>  $SMs,
            'products'  =>  $products,
            'gifts'     =>  $gifts
        ];

        return view('admin.search.reports.search', $dataView);
    }

    public function doSearch(ReportSearchRequest $request)
    {
        $searchResult       =   null;
        $MR                 =   $request->mr;
        $from               =   $request->date_from;
        $to                 =   $request->date_to;
        $doctor             =   $request->doctor;
        $promoted_product   =   $request->promoted_product;
        $sample_product     =   $request->sample_product;
        $sold_product       =   $request->sold_product;
        $gift               =   $request->gift;
        $follow_up          =   $request->follow_up;
        $feedback           =   $request->feedback;
        $doubleVisit        =   $request->double_visit;

        $allReportsInRange = Report::select('report.id', 'month','date', 'doctor_id', 'mr_id', 'total_sold_products_price'
        ,'feedback','follow_up', 'double_visit_manager_id')
            ->where('date', '>=', $from)
            ->where('date', '<=', $to);


            if (!empty($MR))
            {
                $allReportsInRange->where('mr_id', $MR);
            }

            if (!empty($doctor))
            {
                $allReportsInRange->where('doctor_id', $doctor);
            }

            if (!empty($promoted_product))
            {
                $allReportsInRange->join('report_promoted_product', 'report_promoted_product.report_id', '=', 'report.id')
                                 ->where('report_promoted_product.product_id', $promoted_product);
            }

            if (!empty($sample_product))
            {
                $allReportsInRange->join('report_sample_product', 'report_sample_product.report_id', '=', 'report.id')
                    ->where('report_sample_product.product_id', $sample_product);
            }

            if (!empty($sold_product))
            {
                $allReportsInRange->join('report_sold_product', 'report_sold_product.report_id', '=', 'report.id')
                    ->where('report_sold_product.product_id', $sold_product);
            }

            if (!empty($gift))
            {
                $allReportsInRange->join('report_gift', 'report_gift.report_id', '=', 'report.id')
                    ->where('report_gift.gift_id', $gift);
            }

            if ($follow_up == 1)
            {
                $allReportsInRange->whereNotNull('report.follow_up');
            } else {
                $allReportsInRange->whereNull('report.follow_up');
            }

            if ($feedback == 1)
            {
                $allReportsInRange->whereNotNull('report.feedback');
            }else {
                $allReportsInRange->whereNull('report.feedback');
            }

            if (!empty($doubleVisit)){
                $allReportsInRange->where('report.double_visit_manager_id', '<>', '');
            }

        $searchResult = $allReportsInRange->get();
        $level          =   'mr';
        $dataView   =   [
            'searchResult'  =>  $searchResult,
            'level'         =>  $level
        ];


        \Session::flash('emp', $MR);
        \Session::flash('level', $level);
        \Session::flash('date_from', $from);
        \Session::flash('date_to', $to);
        \Session::flash('searchResult', $searchResult);


        return view('admin.search.reports.result', $dataView);
    }

    public function doAMSearch(AMReportSearchRequest $request)
    {
        $searchResult       =   null;
        $AM                 =   $request->am;
        $from               =   $request->date_from;
        $to                 =   $request->date_to;
        $doctor             =   $request->doctor;
        $promoted_product   =   $request->promoted_product;
        $sample_product     =   $request->sample_product;
        $sold_product       =   $request->sold_product;
        $gift               =   $request->gift;
        $follow_up          =   $request->follow_up;
        $feedback           =   $request->feedback;

        $allReportsInRange = AMReport::select('am_report.id', 'month','date', 'doctor_id', 'am_id', 'total_sold_products_price',
            'feedback', 'follow_up')
            ->where('date', '>=', $from)
            ->where('date', '<=', $to);


        if (!empty($AM))
        {
            $allReportsInRange->where('am_id', $AM);
        }

        if (!empty($doctor))
        {
            $allReportsInRange->where('doctor_id', $doctor);
        }

        if (!empty($promoted_product))
        {
            $allReportsInRange->join('am_report_promoted_product', 'am_report_promoted_product.report_id', '=', 'am_report.id')
                ->where('am_report_promoted_product.product_id', $promoted_product);
        }

        if (!empty($sample_product))
        {
            $allReportsInRange->join('am_report_sample_product', 'am_report_sample_product.report_id', '=', 'am_report.id')
                ->where('am_report_sample_product.product_id', $sample_product);
        }

        if (!empty($sold_product))
        {
            $allReportsInRange->join('am_report_sold_product', 'am_report_sold_product.report_id', '=', 'am_report.id')
                ->where('am_report_sold_product.product_id', $sold_product);
        }

        if (!empty($gift))
        {
            $allReportsInRange->join('am_report_gift', 'am_report_gift.report_id', '=', 'am_report.id')
                ->where('am_report_gift.gift_id', $gift);
        }

        if ($follow_up == 1)
        {
            $allReportsInRange->whereNotNull('am_report.follow_up');
        } else {
            $allReportsInRange->whereNull('am_report.follow_up');
        }

        if ($feedback == 1)
        {
            $allReportsInRange->whereNotNull('am_report.feedback');
        }else {
            $allReportsInRange->whereNull('am_report.feedback');
        }


        $searchResult = $allReportsInRange->get();
        $level          =   'am';
        $dataView   =   [
            'searchResult'  =>  $searchResult,
            'level'         =>  $level
        ];


        \Session::flash('emp', $AM);
        \Session::flash('level', $level);
        \Session::flash('date_from', $from);
        \Session::flash('date_to', $to);
        \Session::flash('searchResult', $searchResult);


        return view('admin.search.reports.result', $dataView);
    }

    public function doSMSearch(SMReportSearchRequest $request)
    {
        $searchResult       =   null;
        $SM                 =   $request->sm;
        $from               =   $request->date_from;
        $to                 =   $request->date_to;
        $doctor             =   $request->doctor;
        $promoted_product   =   $request->promoted_product;
        $sample_product     =   $request->sample_product;
        $sold_product       =   $request->sold_product;
        $gift               =   $request->gift;
        $follow_up          =   $request->follow_up;
        $feedback           =   $request->feedback;

        $allReportsInRange = SMReport::select('sm_report.id', 'month','date', 'doctor_id', 'sm_id', 'total_sold_products_price',
            'feedback','follow_up')
            ->where('date', '>=', $from)
            ->where('date', '<=', $to);


        if (!empty($SM))
        {
            $allReportsInRange->where('sm_id', $SM);
        }

        if (!empty($doctor))
        {
            $allReportsInRange->where('doctor_id', $doctor);
        }

        if (!empty($promoted_product))
        {
            $allReportsInRange->join('sm_report_promoted_product', 'sm_report_promoted_product.report_id', '=', 'sm_report.id')
                ->where('sm_report_promoted_product.product_id', $promoted_product);
        }

        if (!empty($sample_product))
        {
            $allReportsInRange->join('sm_report_sample_product', 'sm_report_sample_product.report_id', '=', 'sm_report.id')
                ->where('sm_report_sample_product.product_id', $sample_product);
        }

        if (!empty($sold_product))
        {
            $allReportsInRange->join('sm_report_sold_product', 'sm_report_sold_product.report_id', '=', 'sm_report.id')
                ->where('sm_report_sold_product.product_id', $sold_product);
        }

        if (!empty($gift))
        {
            $allReportsInRange->join('sm_report_gift', 'sm_report_gift.report_id', '=', 'sm_report.id')
                ->where('sm_report_gift.gift_id', $gift);
        }

        if ($follow_up == 1)
        {
            $allReportsInRange->whereNotNull('sm_report.follow_up');
        } else {
            $allReportsInRange->whereNull('sm_report.follow_up');
        }

        if ($feedback == 1)
        {
            $allReportsInRange->whereNotNull('sm_report.feedback');
        }else {
            $allReportsInRange->whereNull('sm_report.feedback');
        }

        $searchResult   =   $allReportsInRange->get();
        $level          =   'sm';
        $dataView   =   [
            'searchResult'  =>  $searchResult,
            'level'         =>  $level
        ];

        \Session::flash('emp', $SM);
        \Session::flash('level', $level);
        \Session::flash('date_from', $from);
        \Session::flash('date_to', $to);
        \Session::flash('searchResult', $searchResult);


        return view('admin.search.reports.result', $dataView);
    }

    public function single($level, $id)
    {
        if ($level == 'sm')
        {
            $singleReport = SMReport::findOrFail($id);
        } elseif ($level == 'am'){
            $singleReport = AMReport::findOrFail($id);
        } elseif ($level == 'mr'){
            $singleReport = Report::findOrFail($id);
        }

        $dataView 	= [
            'singleReport'	=>	 $singleReport
        ];
        return view('admin.report.single', $dataView);
    }

    public function listAllSMPendingServicesRequests()
    {
        $pendingServicesRequests =  SMServiceRequest::pending()->get();
        $dataView 	= [
            'pendingServicesRequests'	=>	 $pendingServicesRequests
        ];
        return view('admin.service_request.pending', $dataView);
    }

    public function approveSMPendingServiceRequest($id)
    {
        $serviceRequest   =   SMServiceRequest::findOrFail($id);
        $serviceRequest->approved = 1;
        try {
            $serviceRequest->save();
            return redirect()->back()->with('message','Service Request has been approved successfully !');
        } catch (ParseException $ex) {
            echo 'Failed to approve plan , with error message: ' . $ex->getMessage();
        }
    }

    public function declineSMPendingServiceRequest($id)
    {
        $serviceRequest   =   SMServiceRequest::findOrFail($id);
        $serviceRequest->approved = 0;
        try {
            $serviceRequest->save();
            return redirect()->back()->with('message','Service Request has been declined successfully !');
        } catch (ParseException $ex) {
            echo 'Failed to approve plan , with error message: ' . $ex->getMessage();
        }
    }

    public function listAllSMPendingLeaveRequests()
    {
        $pendingLeaveRequests =  SMLeaveRequest::pending()->get();
        $dataView 	= [
            'pendingLeaveRequests'	=>	 $pendingLeaveRequests
        ];

        return view('admin.leave_request.pending', $dataView);
    }

    public function approveSMPendingLeaveRequest($id)
    {
        $leaveRequest   =   SMLeaveRequest::findOrFail($id);
        $leaveRequest->approved = 1;
        try {
            $leaveRequest->save();
            return redirect()->back()->with('message','Leave Request has been approved successfully !');
        } catch (ParseException $ex) {
            echo 'Failed to approve leave request , with error message: ' . $ex->getMessage();
        }
    }

    public function declineSMPendingLeaveRequest($id)
    {
        $leaveRequest   =   SMLeaveRequest::findOrFail($id);
        $leaveRequest->approved = 0;
        try {
            $leaveRequest->save();
            return redirect()->back()->with('message','Leave Request has been declined successfully !');
        } catch (ParseException $ex) {
            echo 'Failed to approve leave request , with error message: ' . $ex->getMessage();
        }
    }

    public function listAllExpensesReports()
    {
        $expensesReports    =   ExpenseReport::all();
        $amExpensesReports  =   AMExpenseReport::all();
        $smExpensesReports  =   SMExpenseReport::all();

        $dataView 	= [
            'expensesReports'	=>	 $expensesReports,
            'amExpensesReports'	=>	 $amExpensesReports,
            'smExpensesReports'	=>	 $smExpensesReports
        ];
        return view('admin.expense_report.list', $dataView);
    }
}
