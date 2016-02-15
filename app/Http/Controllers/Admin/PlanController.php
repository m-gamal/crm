<?php

namespace App\Http\Controllers\Admin;

use App\Employee;
use App\Plan;
use App\AMPlan;
use App\SMPlan;
use App\LeaveRequest;
use App\AMLeaveRequest;
use App\SMLeaveRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PlanSearchRequest;
use App\Http\Requests\Admin\AMPlanSearchRequest;
use App\Http\Requests\Admin\SMPlanSearchRequest;

class PlanController extends Controller
{
    public function listAll()
    {
        return view('admin.plan.list');
    }

    public function search()
    {
        $MRs        =   Employee::where('level_id', 7)->active()->get();
        $AMs        =   Employee::where('level_id', 3)->active()->get();
        $SMs        =   Employee::where('level_id', 2)->active()->get();

        $dataView   =   [
            'MRs'   =>  $MRs,
            'AMs'   =>  $AMs,
            'SMs'   =>  $SMs
        ];
        return view('admin.search.plans.search', $dataView);
    }

    public function doSearch(PlanSearchRequest $request)
    {
        $mr                         =   $request->mr;
        $planSearchResult           =   [];
        $leaveRequestSearchResult   =   [];
        $from                       =   $request->date_from;
        $to                         =   $request->date_to;

        $allSearchedPlan = Plan::where('mr_id', $mr)->where('date', '>=', $from)
            ->where('date', '<=', $to)
            ->approved()
            ->get();

        $allSearchLeaveRequest = LeaveRequest::where('mr_id', $mr)->where('date', '>=', $from)
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


        \Session::flash('emp', $mr);
        \Session::flash('date_from', $from);
        \Session::flash('date_to', $to);
        \Session::flash('planSearchResult', $planSearchResult);
        \Session::flash('leaveRequestSearchResult', $leaveRequestSearchResult);

        return view('admin.search.plans.result', $dataView);
    }

    public function doAMSearch(AMPlanSearchRequest $request)
    {
        $am                         =   $request->am;
        $planSearchResult           =   [];
        $leaveRequestSearchResult   =   [];
        $from                       =   $request->date_from;
        $to                         =   $request->date_to;

        $allSearchedPlan = AMPlan::where('am_id', $am)->where('date', '>=', $from)
            ->where('date', '<=', $to)
            ->approved()
            ->get();

        $allSearchLeaveRequest = AMLeaveRequest::where('am_id', $am)->where('date', '>=', $from)
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


        \Session::flash('emp', $am);
        \Session::flash('date_from', $from);
        \Session::flash('date_to', $to);
        \Session::flash('planSearchResult', $planSearchResult);
        \Session::flash('leaveRequestSearchResult', $leaveRequestSearchResult);

        return view('admin.search.plans.result', $dataView);
    }

    public function doSMSearch(SMPlanSearchRequest $request)
    {
        $sm                         =   $request->sm;
        $planSearchResult           =   [];
        $leaveRequestSearchResult   =   [];
        $from                       =   $request->date_from;
        $to                         =   $request->date_to;

        $allSearchedPlan = SMPlan::where('sm_id', $sm)->where('date', '>=', $from)
            ->where('date', '<=', $to)
            ->approved()
            ->get();

        $allSearchLeaveRequest = SMLeaveRequest::where('sm_id', $sm)->where('date', '>=', $from)
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


        \Session::flash('emp', $sm);
        \Session::flash('date_from', $from);
        \Session::flash('date_to', $to);
        \Session::flash('planSearchResult', $planSearchResult);
        \Session::flash('leaveRequestSearchResult', $leaveRequestSearchResult);

        return view('admin.search.plans.result', $dataView);
    }
    public function pendingSM()
    {
        $pendingPlans = SMPlan::pending()->get();
        $dataView   =   [
            'pendingPlans'          =>  $pendingPlans,
        ];

        return view('admin.plan.pending', $dataView);
    }

    public function approveSM($id)
    {
        $plan   =   SMPlan::findOrFail($id);
        $plan->approved = 1;
        try {
            $plan->save();
            return redirect()->back()->with('message','Plan has been approved successfully !');
        } catch (ParseException $ex) {
            echo 'Failed to approve plan , with error message: ' . $ex->getMessage();
        }
    }

    public function declineSM($id)
    {
        $plan   =   SMPlan::findOrFail($id);
        $plan->approved = 0;
        try {
            $plan->save();
            return redirect()->back()->with('message','Plan has been decline successfully !');
        } catch (ParseException $ex) {
            echo 'Failed to approve plan , with error message: ' . $ex->getMessage();
        }
    }
}
