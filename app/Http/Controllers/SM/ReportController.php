<?php

namespace App\Http\Controllers\SM;

use App\AMReport;
use App\AMReportGift;
use App\AMReportPromotedProduct;
use App\AMReportSampleProduct;
use App\AMReportSoldProduct;
use App\ReportGift;
use App\ReportPromotedProduct;
use App\ReportSampleProduct;
use App\ReportSoldProduct;
use App\Customer;
use App\Employee;
use App\Gift;
use App\LeaveRequest;
use App\SMLeaveRequest;
use App\SMExpenseReport;
use App\SMServiceRequest;
use App\Report;
use App\Product;
use App\Http\Requests\Admin\ReportSearchRequest;
use App\Http\Requests\AM\CreateExpenseReportRequest;
use App\Http\Requests\AM\CreateLeaveRequestRequest;
use App\Http\Requests\AM\CreateServiceRequestRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\ServiceRequest;
use App\Http\Requests\AM\CreateReportRequest;
use App\SMReport;

class ReportController extends Controller
{
    public function listAll()
    {
        $AMIds          =   Employee::select('id')->where('manager_id', 1)->get(); //sm_session

        $employees      =   Employee::select('id')->whereIn('manager_id', $AMIds)->get();
        $MRReports      =   Report::whereIn('mr_id', $employees)->get();

        $AMReports      =   AMReport::whereIn('am_id', $AMIds)->get();

        $yourReports    =   SMReport::where('sm_id', 1)->get(); // sm_session

        $dataView 	= [
            'MRReports'	    =>  $MRReports,
            'AMReports'     =>  $AMReports,
            'yourReports'   =>  $yourReports
        ];

        return view('sm.report.list', $dataView);
    }

    public function listAllRequests()
    {
        return view('sm.report.requests_lists');
    }

    public function search()
    {
        $products   =   Product::all();
        $gifts      =   Gift::all();
        $doctors    =   Customer::all();

        $AMsIds     =   Employee::select('id')->where('manager_id', 1)->get(); //sm_session
        $MRs        =   Employee::whereIn('manager_id', $AMsIds)->get();

        $dataView   =   [
            'doctors'   =>  $doctors,
            'products'  =>  $products,
            'gifts'     =>  $gifts,
            'MRs'       =>  $MRs
        ];

        return view('sm.search.reports.search', $dataView);
    }

    public function doSearch(ReportSearchRequest $request)
    {
        $searchResult       =   null;
        $from               =   $request->date_from;
        $to                 =   $request->date_to;
        $doctor             =   $request->doctor;
        $promoted_product   =   $request->promoted_product;
        $sample_product     =   $request->sample_product;
        $sold_product       =   $request->sold_product;
        $gift               =   $request->gift;
        $follow_up          =   $request->follow_up;
        $feedback           =   $request->feedback;

        $allReportsInRange = AMReport::select('am_report.id', 'month','date', 'doctor_id', 'am_id', 'total_sold_products_price')
            ->where('date', '>=', $from)
            ->where('date', '<=', $to)
            ->where('am_id', 4);


        if (!empty($doctor))
        {
            $allReportsInRange->where('doctor_id', $doctor);
        }

        if (!empty($promoted_product))
        {
            $allReportsInRange->join('report_promoted_product', 'report_promoted_product.report_id', '=', 'am_report.id')
                ->where('report_promoted_product.product_id', $promoted_product);
        }

        if (!empty($sample_product))
        {
            $allReportsInRange->join('report_sample_product', 'report_sample_product.report_id', '=', 'report.id')
                ->where('report_sample_product.product_id', $sample_product);
        }

        if (!empty($sold_product))
        {
            $allReportsInRange->join('report_sold_product', 'report_sold_product.report_id', '=', 'am_report.id')
                ->where('report_sold_product.product_id', $sold_product);
        }

        if (!empty($gift))
        {
            $allReportsInRange->join('report_gift', 'report_gift.report_id', '=', 'am_report.id')
                ->where('report_gift.gift_id', $gift);
        }

        if ($follow_up == 1)
        {
            $allReportsInRange->where('am_report.follow_up', '<>', '');
        }

        if ($feedback == 1)
        {
            $allReportsInRange->where('am_report.feedback', '<>', '');
        }

        $searchResult = $allReportsInRange->get();

        $dataView   =   [
            'searchResult'  =>  $searchResult
        ];

        return view('sm.search.reports.result', $dataView);
    }

    public function MRSearch()
    {
        $MRs        =   Employee::where('manager_id', 4)->get(); // am_session
        $products   =   Product::all();
        $gifts      =   Gift::all();
        $doctors    =   Customer::all();

        $dataView   =   [
            'doctors'   =>  $doctors,
            'MRs'       =>  $MRs,
            'products'  =>  $products,
            'gifts'     =>  $gifts
        ];

        return view('sm.search.reports.mr_search', $dataView);
    }

    public function doMRSearch(ReportSearchRequest $request)
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

        $allReportsInRange = Report::select('report.id', 'month','date', 'doctor_id', 'mr_id', 'total_sold_products_price')
            ->where('date', '>=', $from)
            ->where('date', '<=', $to);


            if (!empty($MRs))
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
                $allReportsInRange->where('report.follow_up', '<>', '');
            }

            if ($feedback == 1)
            {
                $allReportsInRange->where('report.feedback', '<>', '');
            }

        $searchResult = $allReportsInRange->get();

        $dataView   =   [
            'searchResult'  =>  $searchResult
        ];

        return view('sm.search.reports.mr_result', $dataView);
    }

    public function ajaxDoctors()
    {
        $descriptionName    =   Input::get('descriptionName');
        $doctors            =   Customer::where('description_name', $descriptionName)->lists('name', 'id');
        return Response::json($doctors);
    }

    public function create($doctorId = NULL)
    {
        $employees          =   Employee::select('id')->where('manager_id', 4)->get(); //am_session
        $description_names  =   Customer::distinct()->select('description_name')
                                        ->whereIn('mr_id', $employees)->get();

        $doctors            =   Customer::whereIn('mr_id', $employees)->get();

        $employeesLines     = Employee::select('line_id')->where('manager_id', 4)->get(); //am_session

        $products           =   Product::where('line_id', $employeesLines)->get();


        $gifts              =   Gift::all();

        $dataView   =   [
            'description_names'     =>  $description_names,
            'doctors'               =>  $doctors,
            'products'              =>  $products,
            'gifts'                 =>  $gifts,
            'doctorId'              =>  !empty($doctorId) ? $doctorId : ''
        ];
        return view ('sm.report.create', $dataView);
    }

    public function doCreate(CreateReportRequest $request)
    {
        $location               =   \GeoIP::getLocation();
        $allSoldProducts        =   [];
        $report                 =   new AMReport();
        $soldProduct            =   $request->sold_product;
        $quantity               =   $request->quantity;
        $extraSoldProducts      =   $request->extra_sold_products;
        $extraQuantity          =   $request->extra_quantity;

        if (!empty($soldProduct)) {
            $allSoldProducts[$soldProduct] = $quantity;
        }

        if (!empty($extraSoldProducts)) {
            foreach ($extraSoldProducts as $key => $singleSoldProduct) {
                $allSoldProducts[$singleSoldProduct] = $extraQuantity[$key];
            }
        }

        $report->am_id                      =   '4'; // am_session
        $report->month                      =   $request->month.'-'.$request->year;
        $report->date                       =   $request->date;
        $report->doctor_id                  =   $request->doctor;
        $report->total_sold_products_price  =   !empty($allSoldProducts) ? $this->productPrice($allSoldProducts) : '0';
        $report->feedback                   =   $request->feedback;
        $report->follow_up                  =   $request->follow_up;
        $report->lat                        =   $location['lat'];
        $report->lon                        =   $location['lon'];
        try {
            if ($report->save()){

                if (!empty($request->promoted_products)) {
                    foreach ($request->promoted_products as $singleProduct) {
                        $promotedProduct    =   new AMReportPromotedProduct();
                        $promotedProduct->report_id     = $report->id;
                        $promotedProduct->product_id    = $singleProduct;
                        $promotedProduct->save();
                    }
                }

                if (!empty($request->samples_products)) {
                    foreach ($request->samples_products as $singleProduct) {
                        $sampleProduct      =   new AMReportSampleProduct();
                        $sampleProduct->report_id   = $report->id;
                        $sampleProduct->product_id  = $singleProduct;
                        $sampleProduct->save();
                    }
                }

                if (!empty($request->gifts)) {
                    foreach ($request->gifts as $singleGift) {
                        $gift               =   new AMReportGift();
                        $gift->report_id    = $report->id;
                        $gift->gift_id      = $singleGift;
                        $gift->save();
                    }
                }


                if (!empty($request->sold_product))
                {
                    $soldProduct                =   new AMReportSoldProduct();
                    $soldProduct->report_id     =   $report->id;
                    $soldProduct->product_id    =   $request->sold_product;
                    $soldProduct->quantity      =   $request->quantity;
                    $soldProduct->save();
                }

                if (!empty($extraSoldProducts)) {
                    foreach ($extraSoldProducts as $key => $singleSoldProduct) {
                        $soldProduct                =   new AMReportSoldProduct();
                        $soldProduct->report_id     =   $report->id;
                        $soldProduct->product_id    =   $singleSoldProduct;
                        $soldProduct->quantity      =   $extraQuantity[$key];
                        $soldProduct->save();
                    }
                }
            }

            return redirect()->back()->with('message','Report has been created successfully !');
        } catch (ParseException $ex) {
            echo 'Failed to create new report , with error message: ' . $ex->getMessage();
        }
    }

    public function productPrice($allSoldProducts)
    {
        $totalSoldProductsPrice = NULL;
        if (!empty($allSoldProducts)){
            foreach ($allSoldProducts as $productId=>$quantity) {
                $productPrice           =   Product::findOrFail($productId)->unit_price;
                $totalSoldProductsPrice += $productPrice * $quantity;
            }
        }
        return $totalSoldProductsPrice;
    }

    public function singleMR($id)
    {
        $singleReport = Report::findOrFail($id);
        $singleReport['promotedProducts']   =   ReportPromotedProduct::select('product_id')
            ->where('report_id', $singleReport->id)
            ->get();

        $singleReport['sampleProducts']     =   ReportSampleProduct::select('product_id')
            ->where('report_id', $singleReport->id)
            ->get();

        $singleReport['gifts']              =   ReportGift::select('gift_id')
            ->where('report_id', $singleReport->id)
            ->get();

        $singleReport['soldProducts']       =   ReportSoldProduct::select('product_id', 'quantity')
            ->where('report_id', $singleReport->id)
            ->get();

        $dataView 	= [
            'singleReport'	=>	 $singleReport
        ];
        return view('sm.report.single', $dataView);
    }

    public function singleYours($id)
    {
        $singleReport = AMReport::findOrFail($id);
        $singleReport['promotedProducts']   =   AMReportPromotedProduct::select('product_id')
                                                                        ->where('report_id', $singleReport->id)
                                                                        ->get();

        $singleReport['sampleProducts']     =   AMReportSampleProduct::select('product_id')
                                                                    ->where('report_id', $singleReport->id)
                                                                    ->get();

        $singleReport['gifts']              =   AMReportGift::select('gift_id')
                                                            ->where('report_id', $singleReport->id)
                                                            ->get();

        $singleReport['soldProducts']       =   AMReportSoldProduct::select('product_id', 'quantity')
                                                                    ->where('report_id', $singleReport->id)
                                                                    ->get();

        $dataView 	= [
            'singleReport'	=>	 $singleReport
        ];
        return view('sm.report.single', $dataView);
    }

//    public function listAllPendingServicesRequests()
//    {
//        $employees = Employee::select('id')->where('manager_id', 4)->get(); //am_session
//
//        $pendingServicesRequests =  ServiceRequest::pending()->where('emp_id', $employees)->get();
//
//        $dataView 	= [
//            'pendingServicesRequests'	=>	 $pendingServicesRequests
//        ];
//
//        return view('sm.service_request.pending', $dataView);
//    }

//    public function approvePendingServiceRequest($id)
//    {
//        $serviceRequest   =   ServiceRequest::findOrFail($id);
//        $serviceRequest->approved = 1;
//        try {
//            $serviceRequest->save();
//            return redirect()->back()->with('message','Service Request has been approved successfully !');
//        } catch (ParseException $ex) {
//            echo 'Failed to approve service request , with error message: ' . $ex->getMessage();
//        }
//    }
//
//    public function declinePendingServiceRequest($id)
//    {
//        $serviceRequest   =   ServiceRequest::findOrFail($id);
//        $serviceRequest->approved = 0;
//        try {
//            $serviceRequest->save();
//            return redirect()->back()->with('message','Service Request has been declined successfully !');
//        } catch (ParseException $ex) {
//            echo 'Failed to decline service request , with error message: ' . $ex->getMessage();
//        }
//    }

//    public function listAllPendingLeaveRequests()
//    {
//        $employees = Employee::select('id')->where('manager_id', 4)->get(); //am_session
//        $pendingLeaveRequests =  LeaveRequest::pending()->where('emp_id', $employees)->get();
//
//        $dataView 	= [
//            'pendingLeaveRequests'	=>	 $pendingLeaveRequests
//        ];
//
//        return view('sm.leave_request.pending', $dataView);
//    }

//    public function approvePendingLeaveRequest($id)
//    {
//        $leaveRequest   =   LeaveRequest::findOrFail($id);
//        $leaveRequest->approved = 1;
//        try {
//            $leaveRequest->save();
//            return redirect()->back()->with('message','Leave Request has been approved successfully !');
//        } catch (ParseException $ex) {
//            echo 'Failed to approve leave request , with error message: ' . $ex->getMessage();
//        }
//    }

//    public function declinePendingLeaveRequest($id)
//    {
//        $leaveRequest   =   LeaveRequest::findOrFail($id);
//        $leaveRequest->approved = 0;
//        try {
//            $leaveRequest->save();
//            return redirect()->back()->with('message','Leave Request has been declined successfully !');
//        } catch (ParseException $ex) {
//            echo 'Failed to decline leave request , with error message: ' . $ex->getMessage();
//        }
//    }

    public function createExpenseReport()
    {
        return view ('sm.expense_report.create');
    }

    public function doCreateExpenseReport(CreateExpenseReportRequest $request)
    {
        $expenseReport   =   new SMExpenseReport();

        $expenseReport->sm_id              = '1'; // am_session
        $expenseReport->month               = $request->month.'-'.$request->month;
        $expenseReport->serial              = $request->serial;
        $expenseReport->date                = $request->date;
        $expenseReport->hotel               = $request->hotel;
        $expenseReport->meals               = $request->meals;
        $expenseReport->city                = $request->city;
        $expenseReport->cost                = $request->cost;
        $expenseReport->group_meeting       = $request->group_meeting;
        $expenseReport->used_facilities     = $request->used_facilities;
        $expenseReport->description         = $request->description;
        $expenseReport->total               = $request->total;

        try {
            if ($expenseReport->save()) {
                $extension = $request->file('invoices')->getClientOriginalExtension();
                $request->file('invoices')//_session
                ->move(public_path('uploads/expenses_reports/1/' . $expenseReport->month . '/'), $expenseReport->date . '.' . $extension);
            }
            return redirect()->back()->with('message','Expense Report has been sent to your managers successfully !');
            print_r($expenseReport);
        } catch (ParseException $ex) {
            echo 'Failed to create new expense report , with error message: ' . $ex->getMessage();
        }
    }

    public function listAllExpensesReports()
    {
        $expensesReports =  SMExpenseReport::where('sm_id', 1)->get();
        $dataView 	= [
            'expensesReports'	=>	 $expensesReports
        ];
        return view('sm.expense_report.list', $dataView);
    }


    public function listAllLeaveRequests()
    {
        $leaveRequests = SMLeaveRequest::where('sm_id', 1)->get(); // mr_session
        $dataView 	= [
            'leaveRequests'	=>	 $leaveRequests
        ];
        return view('sm.leave_request.list', $dataView);
    }

    public function createLeaveRequest()
    {
        return view ('sm.leave_request.create');
    }

    public function doCreateLeaveRequest(CreateLeaveRequestRequest $request)
    {
        $leaveRequest   =   new LeaveRequest();

        $leaveRequest->sm_id       = '1'; // mr_session
        $leaveRequest->month        = $request->month.'-'.$request->year;
        $leaveRequest->date         = $request->date;
        $leaveRequest->reason       = $request->reason;
        $leaveRequest->leave_start  = $request->leave_start;
        $leaveRequest->leave_end    = $request->leave_end;
        $leaveRequest->count        = $request->count;

        try {
            if ($leaveRequest->save()) {
                $extension = $request->file('docs')->getClientOriginalExtension();
                $request->file('docs')//am_session
                ->move(public_path('uploads/leave_requests/1/' . $leaveRequest->month . '/'), $leaveRequest->date . '.' . $extension);
            }
            return redirect()->back()->with('message','Leave Request has been sent to your managers successfully !');
        } catch (ParseException $ex) {
            echo 'Failed to create new leave request , with error message: ' . $ex->getMessage();
        }
    }

    public function listAllServicesRequests()
    {
        $servicesRequests = SMServiceRequest::where('sm_id', 1)->get(); // mr_session
        $dataView 	= [
            'servicesRequests'	=>	 $servicesRequests
        ];
        return view('sm.service_request.list', $dataView);
    }

    public function createServiceRequest()
    {
        return view ('sm.service_request.create');
    }

    public function doCreateServiceRequest(CreateServiceRequestRequest $request)
    {
        $serviceRequest   =   new SMServiceRequest();

        $serviceRequest->sm_id         = '1'; // mr_session
        $serviceRequest->month          = $request->month.'-'.$request->year;
        $serviceRequest->date           = $request->date;
        $serviceRequest->request_text   = $request->request_text;

        try {
            $serviceRequest->save();
            return redirect()->back()->with('message','Service Request has been sent to your managers successfully !');
        } catch (ParseException $ex) {
            echo 'Failed to create new service request , with error message: ' . $ex->getMessage();
        }
    }
}
