<?php

namespace App\Http\Controllers\MR;

use App\Employee;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Report;
use App\Customer;
use App\Product;
use App\Gift;
use App\Plan;
use App\ExpenseReport;
use App\LeaveRequest;
use App\ServiceRequest;
use App\Http\Requests\MR\CreateExpenseReportRequest;
use App\Http\Requests\MR\CreateLeaveRequestRequest;
use App\Http\Requests\MR\CreateServiceRequestRequest;
use App\Http\Requests\MR\CreateReportRequest;
use App\Http\Requests\MR\ReportSearchRequest;
use Input;
use Response;

class ReportController extends Controller
{

    public function listAll()
    {
        $reports = Report::where('mr_id', 3)->get(); // mr_session
        $dataView 	= [
            'reports'	=>	 $reports
        ];
        return view('mr.report.list', $dataView);
    }


    public function ajaxDoctors()
    {
        $descriptionName    =   Input::get('descriptionName');
        $doctors            =   Customer::where('description_name', $descriptionName)->lists('name', 'id');
        return Response::json($doctors);
    }

    public function create($doctorId = NULL)
    {
        $description_names  =   Customer::distinct()->select('description_name')->where('mr_id', 3)->get();
        $doctors            =   Customer::where('mr_id', 3)->get(); // mr_session
        $products           =   Product::where('line_id', Employee::find(3)->line_id)->get(); //mr_session
        $gifts              =   Gift::all();

        $dataView   =   [
            'description_names'     =>  $description_names,
            'doctors'               =>  $doctors,
            'products'              =>  $products,
            'gifts'                 =>  $gifts,
            'doctorId'              =>  !empty($doctorId) ? $doctorId : ''
        ];
        return view ('mr.report.create', $dataView);
    }

    public function doCreate(CreateReportRequest $request)
    {
        $location               =   \GeoIP::getLocation();
        $allSoldProducts        =   [];
        $report                 =   new Report();
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

        $report->mr_id                      =   '3'; // mr_session
        $report->month                      =   $request->month.'-'.$request->year;
        $report->date                       =   $request->date;
        $report->doctor_id                  =   $request->doctor;
        $report->promoted_products          =   !empty($request->promoted_products) ? json_encode($request->promoted_products) : 'NULL';;
        $report->samples_products           =   !empty($request->samples_products) ? json_encode($request->samples_products) : 'NULL';
        $report->gifts                      =   !empty($request->gifts) ? json_encode($request->gifts) : 'NULL';
        $report->sold_products              =   !empty($allSoldProducts) ? json_encode($allSoldProducts) : 'NULL';
        $report->total_sold_products_price  =   !empty($allSoldProducts) ? $this->productPrice($allSoldProducts) : '0';
        $report->feedback                   =   $request->feedback;
        $report->follow_up                  =   $request->follow_up;
        $report->double_visit_manager_id    =   $request->double_visit;
        $report->lat                        =   $location['lat'];
        $report->lon                        =   $location['lon'];
        try {
            $report->save();
            return redirect()->back()->with('message','Report has been created successfully !');
        } catch (ParseException $ex) {
            echo 'Failed to create new report , with error message: ' . $ex->getMessage();
        }
    }

    public function single($id)
    {
        $singleReport = Report::findOrFail($id);
        $dataView 	= [
            'singleReport'	=>	 $singleReport
        ];
        return view('mr.report.single', $dataView);
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

    public function listAllExpensesReports()
    {
        $expensesReports = ExpenseReport::where('mr_id', 3)->get(); // mr_session
        $dataView 	= [
            'expensesReports'	=>	 $expensesReports
        ];
        return view('mr.expense_report.list', $dataView);
    }

    public function createExpenseReport()
    {
        return view ('mr.expense_report.create');
    }

    public function doCreateExpenseReport(CreateExpenseReportRequest $request)
    {
        $expenseReport   =   new ExpenseReport();

        $expenseReport->mr_id              = '3'; // mr_session
        $expenseReport->month               = $request->month.'-'.date('Y');
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
                $request->file('invoices')//mr_session
                ->move(public_path('uploads/expenses_reports/3/' . $expenseReport->month . '/'), $expenseReport->date . '.' . $extension);
            }
            return redirect()->back()->with('message','Expense Report has been sent to your managers successfully !');
            print_r($expenseReport);
        } catch (ParseException $ex) {
            echo 'Failed to create new expense report , with error message: ' . $ex->getMessage();
        }
    }


    public function listAllLeaveRequests()
    {
        $leaveRequests = LeaveRequest::where('mr_id', 3)->get(); // mr_session
        $dataView 	= [
            'leaveRequests'	=>	 $leaveRequests
        ];
        return view('mr.leave_request.list', $dataView);
    }

    public function createLeaveRequest()
    {
        return view ('mr.leave_request.create');
    }

    public function doCreateLeaveRequest(CreateLeaveRequestRequest $request)
    {
        $leaveRequest   =   new LeaveRequest();

        $leaveRequest->mr_id      = '3'; // mr_session
        $leaveRequest->month       = $request->month.'-'.date('Y');
        $leaveRequest->date        = $request->date;
        $leaveRequest->reason      = $request->reason;
        $leaveRequest->leave_start = $request->leave_start;
        $leaveRequest->leave_end   = $request->leave_end;
        $leaveRequest->count       = $request->count;

        try {
            if ($leaveRequest->save()) {
                $extension = $request->file('docs')->getClientOriginalExtension();
                $request->file('docs')//mr_session
                ->move(public_path('uploads/leave_requests/3/' . $leaveRequest->month . '/'), $leaveRequest->date . '.' . $extension);
            }
            return redirect()->back()->with('message','Leave Request has been sent to your managers successfully !');
        } catch (ParseException $ex) {
            echo 'Failed to create new leave request , with error message: ' . $ex->getMessage();
        }
    }

    public function listAllServicesRequests()
    {
        $servicesRequests = ServiceRequest::where('mr_id', 3)->get(); // mr_session
        $dataView 	= [
            'servicesRequests'	=>	 $servicesRequests
        ];
        return view('mr.service_request.list', $dataView);
    }

    public function createServiceRequest()
    {
        return view ('mr.service_request.create');
    }

    public function doCreateServiceRequest(CreateServiceRequestRequest $request)
    {
        $serviceRequest   =   new ServiceRequest();

        $serviceRequest->mr_id         = '3'; // mr_session
        $serviceRequest->month          = $request->month.'-'.date('Y');
        $serviceRequest->date           = $request->date;
        $serviceRequest->request_text   = $request->request_text;

        try {
            $serviceRequest->save();
            return redirect()->back()->with('message','Service Request has been sent to your managers successfully !');
        } catch (ParseException $ex) {
            echo 'Failed to create new service request , with error message: ' . $ex->getMessage();
        }
    }


    public function search()
    {
        $doctors    =   Customer::where('mr_id', 3)->get(); // mr_session

        $dataView   =   [
            'doctors'  =>  $doctors
        ];

        return view('mr.search.reports.search', $dataView);
    }

    public function doSearch(ReportSearchRequest $request)
    {
        $searchResult   =   [];
        $from           =   $request->date_from;
        $to             =   $request->date_to;
        $doctors        =   $request->doctors;

        // mr_session
        $allSearchedReport = Report::where('date', '>=', $from)
            ->where('date', '<=', $to)
            ->whereIn('doctor_id', $doctors)
            ->get();

        foreach($allSearchedReport as $singleReport)
        {
            $searchResult [] = $singleReport;
        }
        $dataView   =   [
            'searchResult'  =>  $searchResult
        ];
        return view('mr.search.reports.result', $dataView);
    }

    public function ajaxVisitStatue()
    {
        $statue                 =   [];

        //Planned VS Not Planned

        $planned    =   Report::planned()->count();
        $notPlanned =   Report::notPlanned()->count();

        $statue[0]['label']    = 'Planned';
        $statue[0]['data']     = $planned;

        $statue[1]['label']    = 'Not Planned';
        $statue[1]['data']     = $notPlanned;

        return json_encode($statue);
    }

    public function plannedVsActual()
    {

        $monthlyPlansCount      =   0;
        $plannedVsActual        =   [];
        //Planned VS Actual

        // Planned Visits
        $monthlyPlans = Plan::select('doctors')->where('mr_id', 3)->where('month', date('M-Y'))->get();
        foreach($monthlyPlans as $singlePlan)
        {
            $monthlyPlansCount += count(json_decode($singlePlan->doctors));
        }

        // Actual Visits
        $actualVisits    =   Report::planned()->count();

        $plannedVsActual[0]['label']    = 'Planned';
        $plannedVsActual[0]['data']     = $monthlyPlansCount;

        $plannedVsActual[1]['label']    = 'Actual';
        $plannedVsActual[1]['data']     = $actualVisits;

        return json_encode($plannedVsActual);
    }
}
