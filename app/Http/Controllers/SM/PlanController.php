<?php

namespace App\Http\Controllers\SM;

use App\Employee;
use App\Customer;
use App\SMPlan;
use App\AMPlan;
use App\Plan;
use App\SMReport;
use App\SMLeaveRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\SM\PlanSearchRequest;
use App\Http\Requests\SM\CreatePlanRequest;

class PlanController extends Controller
{
    public function listAll()
    {
        return view('sm.plan.list_all');
    }

    public function ajaxPlans()
    {
        $arr    =   array();
        $plans  =   SMPlan::where('sm_id', \Auth::user()->id)->approved()->get();
        $leave  =   SMLeaveRequest::where('sm_id', \Auth::user()->id)->approved()->get();

        $i = 0;
        foreach($plans as $singlePlan)
        {
            foreach((array)json_decode($singlePlan['doctors']) as $singleDoctorId)
            {
                $color  =   $this->isDoctorVisited($singleDoctorId, $singlePlan['date']) == true ? 'green' : 'red';
                $url    =   ($this->isDoctorVisited($singleDoctorId, $singlePlan['date']) != true)
                    ? \URL::route('smAddReport', $singleDoctorId) : NULL;


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
        $visited = SMReport::where('sm_id',\Auth::user()->id)->where('doctor_id', $doctorId)->where('date', '>=', $date)->count();
        if ($visited > 0){
            return true;
        }
    }


    public function create()
    {
        $AMsIds     =   Employee::select('id')->where('manager_id', \Auth::user()->id)->get();
        $employees  =   Employee::select('id')->whereIn('manager_id', $AMsIds)->get();
        $doctors    =   Customer::whereIn('mr_id', $employees)->get();

        $dataView  = [
            'doctors' =>  $doctors
        ];

        return view('sm.plan.create', $dataView);
    }

    public function doCreate(CreatePlanRequest $request)
    {
        $plan           =   new SMPlan();

        $plan->sm_id    =   \Auth::user()->id;
        $plan->month    =   $request->month.'-'.$request->year;
        $plan->date     =   $request->date;
        $plan->doctors  =   json_encode($request->doctors);

        try {
            $plan->save();
            return redirect()->back()->with('message','Visit Plan has been sent to your managers successfully! . Wait for approval');
        } catch (ParseException $ex) {
            echo 'Failed to create new plan , with error message: ' . $ex->getMessage();
        }
    }
    public function search()
    {
        $AMs        =   Employee::select('id')->where('manager_id', \Auth::user()->id)->get();
        $MRs        =   Employee::whereIn('manager_id', $AMs)->get();

        $dataView   =   [
            'MRs'          =>  $MRs,
        ];
        return view('sm.search.plans.search', $dataView);
    }

    public function doSearch(PlanSearchRequest $request)
    {
        $mrs[]                      =   $request->mrs;
        $planSearchResult           =   [];
        $leaveRequestSearchResult   =   [];
        $from                       =   $request->date_from;
        $to                         =   $request->date_to;

        $allSearchedPlan = Plan::whereIn('mr_id', $mrs)->where('date', '>=', $from)
            ->where('date', '<=', $to)
            ->approved()
            ->get();

        $allSearchLeaveRequest = SMLeaveRequest::whereIn('sm_id', $mrs)->where('date', '>=', $from)
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
        return view('sm.search.plans.result', $dataView);
    }

    public function pending()
    {
        $pendingPlans = AMPlan::pending()->get();
        $dataView   =   [
            'pendingPlans'          =>  $pendingPlans,
        ];

        return view('sm.plan.pending', $dataView);
    }

    public function approve($id)
    {
        $plan   =   AMPlan::findOrFail($id);
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
        $plan   =   AMPlan::findOrFail($id);
        $plan->approved = 0;
        try {
            $plan->save();
            return redirect()->back()->with('message','Plan has been decline successfully !');
        } catch (ParseException $ex) {
            echo 'Failed to approve plan , with error message: ' . $ex->getMessage();
        }
    }
}
