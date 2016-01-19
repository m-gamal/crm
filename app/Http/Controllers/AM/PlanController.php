<?php

namespace App\Http\Controllers\AM;

use App\Employee;
use App\Plan;
use App\LeaveRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PlanSearchRequest;

class PlanController extends Controller
{
    public function listAll()
    {
        return view('am.plan.list');
    }

    public function search()
    {
        $MRs         =   Employee::where('manager_id', 4)->get(); // am_session

        $dataView   =   [
            'MRs'          =>  $MRs,
        ];
        return view('am.search.plans.search', $dataView);
    }

    public function doSearch(PlanSearchRequest $request)
    {
        $mrs[]                      =   $request->mrs;
        $planSearchResult           =   [];
        $leaveRequestSearchResult   =   [];
        $from                       =   $request->date_from;
        $to                         =   $request->date_to;

        // mr_session
        $allSearchedPlan = Plan::whereIn('mr_id', $mrs)->where('date', '>=', $from)
            ->where('date', '<=', $to)
            ->approved()
            ->get();

        $allSearchLeaveRequest = AMLeaveRequest::whereIn('am_id', $mrs)->where('date', '>=', $from)
            ->where('date', '<=', $to)
            ->approved()
            ->get();

        foreach($allSearchedPlan as $singleReport)
        {
            $planSearchResult [] = $singleReport;
        }

        foreach($allSearchLeaveRequest as $singleLeaveRequest)
        {
            $leaveRequestSearchResult [] = $singleLeaveRequest;
        }


        $dataView   =   [
            'planSearchResult'          =>  $planSearchResult,
            'leaveRequestSearchResult'  =>  $leaveRequestSearchResult
        ];
        return view('am.search.plans.result', $dataView);
    }

    public function pending()
    {
        $pendingPlans = Plan::pending()->get();
        $dataView   =   [
            'pendingPlans'          =>  $pendingPlans,
        ];

        return view('am.plan.pending', $dataView);
    }

    public function approve($id)
    {
        $plan   =   Plan::findOrFail($id);
        $plan->approved = 1;
        try {
            $plan->save();
            return redirect()->back()->with('message','Plan has been approved successfully !');
        } catch (ParseException $ex) {
            echo 'Failed to approve plan , with error message: ' . $ex->getMessage();
        }
    }

    public function decline($id)
    {
        $plan   =   Plan::findOrFail($id);
        $plan->approved = 0;
        try {
            $plan->save();
            return redirect()->back()->with('message','Plan has been decline successfully !');
        } catch (ParseException $ex) {
            echo 'Failed to approve plan , with error message: ' . $ex->getMessage();
        }
    }
}
