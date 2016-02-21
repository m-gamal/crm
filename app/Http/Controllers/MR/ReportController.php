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
use App\ExpenseReportHotel;
use App\ExpenseReportTransportation;
use App\ExpenseReportMeeting;
use App\LeaveRequest;
use App\ServiceRequest;
use App\Http\Requests\MR\CreateExpenseReportRequest;
use App\Http\Requests\MR\CreateLeaveRequestRequest;
use App\Http\Requests\MR\CreateServiceRequestRequest;
use App\Http\Requests\MR\CreateReportRequest;
use App\Http\Requests\MR\ReportSearchRequest;
use Input;
use Response;
use App\ReportPromotedProduct;
use App\ReportSoldProduct;
use App\ReportSampleProduct;
use App\ReportGift;

class ReportController extends Controller
{

    public function listAll()
    {
        $reports = Report::where('mr_id', \Auth::user()->id)->get();
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
        $description_names  =   Customer::distinct()->select('description_name')->where('mr_id', \Auth::user()->id)->get();
        $doctors            =   Customer::where('mr_id', \Auth::user()->id)->get();
        $products           =   Product::where('line_id', Employee::find(\Auth::user()->id)->line_id)->get();
        $gifts              =   Gift::all();
        $allManagers        =   Employee::yourManagers(\Auth::user()->id);

        $dataView   =   [
            'description_names'     =>  $description_names,
            'doctors'               =>  $doctors,
            'products'              =>  $products,
            'gifts'                 =>  $gifts,
            'doctorId'              =>  !empty($doctorId) ? $doctorId : '',
            'allManagers'           =>  $allManagers
        ];

        if (!empty($doctorId)) {
            \Session::set('planned_visit', 1);
        }
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
        $double_visit_manager   =   $request->double_visit_manager;

        if (!empty($soldProduct)) {
            $allSoldProducts[$soldProduct] = $quantity;
        }

        if (!empty($extraSoldProducts)) {
            foreach ($extraSoldProducts as $key => $singleSoldProduct) {
                $allSoldProducts[$singleSoldProduct] = $extraQuantity[$key];
            }
        }

        $report->mr_id                      =   \Auth::user()->id;
        $report->month                      =   $request->month.'-'.$request->year;
        $report->date                       =   $request->date;
        $report->doctor_id                  =   $request->doctor;
        $report->total_sold_products_price  =   !empty($allSoldProducts) ? $this->productPrice($allSoldProducts) : '0';
        $report->feedback                   =   $request->feedback;
        $report->follow_up                  =   $request->follow_up;
        $report->lat                        =   $location['lat'];
        $report->lon                        =   $location['lon'];
        $report->double_visit_manager_id    =   !empty($double_visit_manager) ? $double_visit_manager : NULL;
        $report->is_planned                 =   !empty(\Session::has('planned_visit')) ? 1 : 0;


        try {
            if ($report->save()){

                if (!empty($request->promoted_products)) {
                    foreach ($request->promoted_products as $singleProduct) {
                        $promotedProduct    =   new ReportPromotedProduct();
                        $promotedProduct->report_id     = $report->id;
                        $promotedProduct->product_id    = $singleProduct;
                        $promotedProduct->save();
                    }
                }

                if (!empty($request->samples_products)) {
                    foreach ($request->samples_products as $singleProduct) {
                        $sampleProduct      =   new ReportSampleProduct();
                        $sampleProduct->report_id   = $report->id;
                        $sampleProduct->product_id  = $singleProduct;
                        $sampleProduct->save();
                    }
                }

                if (!empty($request->gifts)) {
                    foreach ($request->gifts as $singleGift) {
                        $gift               =   new ReportGift();
                        $gift->report_id    = $report->id;
                        $gift->gift_id      = $singleGift;
                        $gift->save();
                    }
                }

                if (!empty($request->sold_product))
                {
                    $soldProduct                =   new ReportSoldProduct();
                    $soldProduct->report_id     =   $report->id;
                    $soldProduct->product_id    =   $request->sold_product;
                    $soldProduct->quantity      =   $request->quantity;
                    $soldProduct->save();
                }

                if (!empty($extraSoldProducts)) {
                    foreach ($extraSoldProducts as $key => $singleSoldProduct) {
                        $soldProduct                =   new ReportSoldProduct();
                        $soldProduct->report_id     =   $report->id;
                        $soldProduct->product_id    =   $singleSoldProduct;
                        $soldProduct->quantity      =   $extraQuantity[$key];
                        $soldProduct->save();
                    }
                }
            }
            if (\Session::get('planned_visit') == 1){
                return redirect()->route('plans')->with('message','Report has been created successfully !');
            }
            return redirect()->back()->with('message','Report has been created successfully !');

        } catch (ParseException $ex) {
            echo 'Failed to create new report , with error message: ' . $ex->getMessage();
        }
    }

    public function single($id)
    {
        $singleReport = Report::findOrFail($id);
        $singleReport['promotedProducts']   =   ReportPromotedProduct::select('product_id')
            ->where('report_id', $id)
            ->get();

        $singleReport['sampleProducts']     =   ReportSampleProduct::select('product_id')
            ->where('report_id', $id)
            ->get();

        $singleReport['gifts']              =   ReportGift::select('gift_id')
            ->where('report_id', $id)
            ->get();

        $singleReport['soldProducts']       =   ReportSoldProduct::select('product_id', 'quantity')
            ->where('report_id', $id)
            ->get();

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
        $expensesReports = ExpenseReport::where('mr_id', \Auth::user()->id)->get();
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
        $totalCost                      =   0;
        $expenseReport                  =   new ExpenseReport();
        $expenseReport->mr_id           =   \Auth::user()->id;
        $expenseReport->month           =   $request->month.'-'.$request->year;

        if ($expenseReport->save()) {
            $expenseReportId                        =   $expenseReport->id;
            $expenseReportHotel                     =   new ExpenseReportHotel;
            $expenseReportHotel->date               =   $request->hotel_date;
            $expenseReportHotel->expense_report_id  =   $expenseReportId;
            $expenseReportHotel->hotel              =   $request->hotel;
            $expenseReportHotel->meal               =   $request->hotel_meal;
            $expenseReportHotel->cost               =   $request->hotel_cost;
            $totalCost                              +=  $request->hotel_cost;
            $expenseReportHotel->save();

            if (is_array($request->extra_hotel_date)) {
                for ($i = 0; $i < count($request->extra_hotel_date); $i++) {
                    if (!empty($request->extra_hotel_date[$i])
                        &&  !empty($request->extra_hotel[$i])
                        &&  !empty($request->extra_hotel_meal[$i])
                        &&  !empty($request->extra_hotel_cost[$i])
                    ) {
                        $expenseReportHotel = new ExpenseReportHotel;
                        $expenseReportHotel->date               =   $request->extra_hotel_date[$i];
                        $expenseReportHotel->expense_report_id  =   $expenseReportId;
                        $expenseReportHotel->hotel              =   $request->extra_hotel[$i];
                        $expenseReportHotel->meal               =   $request->extra_hotel_meal[$i];
                        $expenseReportHotel->cost               =   $request->extra_hotel_cost[$i];
                        $totalCost += $request->extra_hotel_cost[$i];
                        $expenseReportHotel->save();
                    }
                }
            }



            $expenseReportTransportation = new ExpenseReportTransportation;
            $expenseReportTransportation->date              =   $request->transportation_date;
            $expenseReportTransportation->expense_report_id =   $expenseReportId;
            $expenseReportTransportation->city              =   $request->transportation_city;
            $expenseReportTransportation->cost              =   $request->transportation_cost;
            $totalCost                                      +=  $request->transportation_cost;
            $expenseReportTransportation->save();

            if (is_array($request->extra_transportation_date)) {
                for ($i = 0; $i < count($request->extra_transportation_date); $i++) {
                    if (!empty($request->extra_transportation_date[$i])
                        &&  !empty($request->extra_transportation_city[$i])
                        &&  !empty($request->extra_transportation_cost[$i])
                    ) {
                        $expenseReportTransportation = new ExpenseReportTransportation;
                        $expenseReportTransportation->date = $request->extra_transportation_date[$i];
                        $expenseReportTransportation->expense_report_id = $expenseReportId;
                        $expenseReportTransportation->city = $request->extra_transportation_city[$i];
                        $expenseReportTransportation->cost = $request->extra_transportation_cost[$i];
                        $totalCost += $request->extra_transportation_cost[$i];
                        $expenseReportTransportation->save();
                    }
                }
            }


            $expenseReportMeeting           = new ExpenseReportMeeting;
            $expenseReportMeeting->date     = $request->meeting_date;
            $expenseReportMeeting->expense_report_id = $expenseReportId;
            $expenseReportMeeting->meeting  = $request->meeting;
            $expenseReportMeeting->cost     = $request->meeting_cost;
            $totalCost                      += $request->meeting_cost;
            $expenseReportMeeting->save();

            if (is_array($request->extra_meeting_date)) {
                for ($i = 0; $i < count($request->extra_meeting_date); $i++) {
                    if (!empty($request->extra_meeting_date[$i])
                        &&  !empty($request->extra_meeting[$i])
                        &&  !empty($request->extra_meeting_cost[$i])
                    ) {
                        $expenseReportMeeting           = new ExpenseReportMeeting;
                        $expenseReportMeeting->date                 =   $request->extra_meeting_date[$i];
                        $expenseReportMeeting->expense_report_id    =   $expenseReportId;
                        $expenseReportMeeting->meeting              =   $request->extra_meeting[$i];
                        $expenseReportMeeting->cost                 =   $request->extra_meeting_cost[$i];
                        $totalCost += $request->extra_meeting_cost[$i];
                        $expenseReportMeeting->save();
                    }
                }
            }

            $expenseReport = ExpenseReport::findOrFail($expenseReportId);
            $expenseReport->total = $totalCost;
            $expenseReport->save();

            if (!empty($request->file('invoices'))) {
                try {
                    $extension = $request->file('invoices')->getClientOriginalExtension();
                    $request->file('invoices')
                        ->move(public_path('uploads/expenses_reports/' . \Auth::user()->id . '/' . $expenseReport->month . '/'), $expenseReport->id . '.' . $extension);
                    return redirect()->back()->with('message', 'Expense Report has been sent to your managers successfully !');
                    print_r($expenseReport);
                } catch (ParseException $ex) {
                    echo 'Failed to create new expense report , with error message: ' . $ex->getMessage();
                }
            }
            return redirect()->back()->with('message', 'Expense Report has been sent to your managers successfully !');
        }
    }


    public function listAllLeaveRequests()
    {
        $leaveRequests = LeaveRequest::where('mr_id', \Auth::user()->id)->get();
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

        $leaveRequest->mr_id        = \Auth::user()->id;
        $leaveRequest->month        = $request->month.'-'.date('Y');
        $leaveRequest->date         = $request->date;
        $leaveRequest->reason       = $request->reason;
        $leaveRequest->leave_start  = $request->leave_start;
        $leaveRequest->leave_end    = $request->leave_end;
        $leaveRequest->count        = $request->count;

        try {
            if ($leaveRequest->save()) {
                $extension = $request->file('docs')->getClientOriginalExtension();
                $request->file('docs')
                ->move(public_path('uploads/leave_requests/'. \Auth::user()->id.'/'.$leaveRequest->month . '/'), $leaveRequest->date . '.' . $extension);
            }
            return redirect()->back()->with('message','Leave Request has been sent to your managers successfully !');
        } catch (ParseException $ex) {
            echo 'Failed to create new leave request , with error message: ' . $ex->getMessage();
        }
    }

    public function listAllServicesRequests()
    {
        $servicesRequests = ServiceRequest::where('mr_id', \Auth::user()->id)->get();
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

        $serviceRequest->mr_id          = \Auth::user()->id;
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
        $doctors    =   Customer::where('mr_id', \Auth::user()->id)->get();
        $MRLine     =   Employee::findOrFail(\Auth::user()->id)->line_id;
        $products   =   Product::where('line_id', $MRLine)->get();
        $gifts      =   Gift::all();

        $dataView   =   [
            'doctors'  =>  $doctors,
            'products'  =>  $products,
            'gifts'     =>  $gifts
        ];

        return view('mr.search.reports.search', $dataView);
    }

    public function doSearch(ReportSearchRequest $request)
    {
        $searchResult       =   null;
        $from               =   date('Y-m-d', strtotime($request->date_from));
        $to                 =   date('Y-m-d', strtotime($request->date_to));
        $doctors            =   $request->doctors;
        $promoted_product   =   $request->promoted_product;
        $sample_product     =   $request->sample_product;
        $sold_product       =   $request->sold_product;
        $gift               =   $request->gift;
        $follow_up          =   $request->follow_up;
        $feedback           =   $request->feedback;

        $allReportsInRange = Report::where('date', '>=', $from)
            ->where('date', '<=', $to)
            ->where('mr_id', \Auth::user()->id);

        if (!empty($doctors))
        {
            $allReportsInRange->whereIn('doctor_id', $doctors);
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
            $allReportsInRange->where('report.feedback', '<>', '');
        } else {
            $allReportsInRange->whereNull('report.feedback');
        }

        $searchResult = $allReportsInRange->get();

        $dataView   =   [
            'searchResult'  =>  $searchResult
        ];

        \Session::flash('date_from', $from);
        \Session::flash('date_to', $to);
        \Session::flash('searchResult', $searchResult);

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
        $monthlyPlans = Plan::select('doctors')->where('mr_id', \Auth::user()->id)->where('month', date('M-Y'))->get();
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
