<?php

namespace App\Http\Controllers\MR;

use App\LeaveRequest;


use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\MR\CreatePlanRequest;
use App\Customer;
use App\Plan;
use App\Report;
use App\Http\Requests\MR\PlanSearchRequest;

class PlanController extends Controller
{
    public function listAll()
    {
        return view('mr.plan.list');
    }

    public function ajaxPlans()
    {
        $arr = array();
        $plans =    Plan::where('mr_id', 3)->approved()->get(); // mr_session
        $leave =    LeaveRequest::where('mr_id', 3)->approved()->get();

        $i = 0;
        foreach($plans as $singlePlan)
        {
            foreach(json_decode($singlePlan['doctors']) as $singleDoctorId)
            {
                $color  =   $this->isDoctorVisited($singleDoctorId, $singlePlan['date']) == true ? 'green' : 'red';
                $url    =   ($this->isDoctorVisited($singleDoctorId, $singlePlan['date']) != true)
                            ? \URL::route('addReport', $singleDoctorId) : NULL;



                $arr[$i]['url']     =    $url;
                $arr[$i]['title']   =    Customer::findOrFail($singleDoctorId)->name;
                $arr[$i]['start']   =    $singlePlan['date'];
                $arr[$i]['color']   =    $color;
                $i++;
            }
        }

        foreach($leave as $singleLeave)
        {
            $arr[$i]['title']   =   'Holiday';
            $arr[$i]['start']   =   $singleLeave['leave_start'];
            $arr[$i]['end']     =   date('Y-m-d', strtotime($singleLeave['leave_end'] . "+1 days"));
            $arr[$i]['color']   =   '#9b59b6';
            $arr[$i]['allDay']  =   true;
            $i++;
        }

        return json_encode($arr);
    }

     public function isDoctorVisited($doctorId, $date)
     {
            // mr_session
            $visited = Report::where('mr_id', '3')->where('doctor_id', $doctorId)->where('date', '>=', $date)->count();
            if ($visited > 0){
                  return true;
            }
     }


    public function create()
    {
        $doctors = Customer::where('mr_id', 3)->get(); // mr_session
        $dataView  = [
            'doctors' =>  $doctors
        ];
        return view('mr.plan.create', $dataView);
    }

    public function doCreate(CreatePlanRequest $request)
    {
        $plan   =   new Plan();

        $plan->mr_id    =   '3'; // mr_session
        $plan->month    =   $request->month.'-'.$request->year;
        $plan->date     =   $request->date;
        $plan->doctors  =   json_encode($request->doctors);
        $plan->approved =   0;

        try {
            $plan->save();
            return redirect()->back()->with('message','Visit Plan has been sent to your managers successfully! . Wait for approval');
        } catch (ParseException $ex) {
            echo 'Failed to create new plan , with error message: ' . $ex->getMessage();
        }
    }

    public function search()
    {
        return view('mr.search.plans.search');
    }

    public function doSearch(PlanSearchRequest $request)
    {
        $planSearchResult           =   [];
        $leaveRequestSearchResult   =   [];
        $from                       =   $request->date_from;
        $to                         =   $request->date_to;

        // mr_session
        $allSearchedPlan = Plan::where('date', '>=', $from)
            ->where('date', '<=', $to)
            ->approved()
            ->get();

        $allSearchLeaveRequest = LeaveRequest::where('date', '>=', $from)
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
        return view('mr.search.plans.result', $dataView);
    }
}
