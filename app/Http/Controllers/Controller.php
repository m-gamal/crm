<?php

namespace App\Http\Controllers;

use App\Message;
use App\MessageReply;
use App\SMLeaveRequest;
use App\SMServiceRequest;
use App\SMPlan;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use View;

abstract class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        if(\Auth::check()) { // if user logged
            $allUnread = MessageReply::select('msg_id')->where('is_read', 0)->get();
            $unread = Message::whereIn('id', $allUnread)->where('receiver', \Auth::user()->id)->get();

            $smPendingRequests = 0;
            $smPendingPlans = $this->getSMPendingPlans();
            $smPendingLeaveRequests = $this->getSMPendingLeaveRequests();
            $smPendingServicesRequests = $this->getSMPendingServicesRequests();

            if ($smPendingPlans != 0
                || $smPendingLeaveRequests != 0
                || $smPendingServicesRequests != 0
            ) {

                $smPendingRequests = 1;
            }

            View::share('unread', $unread);
            View::share('smPendingRequests', $smPendingRequests);
            View::share('smCountPendingPlans', $smPendingPlans);
            View::share('smCountPendingLeaveRequests', $smPendingLeaveRequests);
            View::share('smCountPendingServicesRequest', $smPendingServicesRequests);
        }
    }

    // Sales Manager
    public function getSMPendingPlans(){
        $plans = SMPlan::pending()->get();
        return count($plans);
    }

    public function getSMPendingLeaveRequests(){
        $leaveRequests  = SMLeaveRequest::pending()->get();
        return count($leaveRequests);
    }

    public function getSMPendingServicesRequests(){
        $serviceRequests    = SMServiceRequest::pending()->get();
        return count($serviceRequests);
    }
}
