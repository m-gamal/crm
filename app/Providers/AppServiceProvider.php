<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Message;
use App\MessageReply;

use App\SMLeaveRequest;
use App\AMLeaveRequest;
use App\LeaveRequest;

use App\SMServiceRequest;
use App\AMServiceRequest;
use App\ServiceRequest;

use App\SMPlan;
use App\AMPlan;
use App\Plan;

use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // sales manager
        $smPendingRequests          =   0;
        $smPendingPlans             =   $this->getSMPendingPlans();
        $smPendingLeaveRequests     =   $this->getSMPendingLeaveRequests();
        $smPendingServicesRequests  =   $this->getSMPendingServicesRequests();


        if ($smPendingPlans != 0 || $smPendingLeaveRequests != 0 || $smPendingServicesRequests != 0) {
            $smPendingRequests = 1;
        }

        view()->share('smPendingRequests', $smPendingRequests);
        view()->share('smCountPendingPlans', $smPendingPlans);
        view()->share('smCountPendingLeaveRequests', $smPendingLeaveRequests);
        view()->share('smCountPendingServicesRequest', $smPendingServicesRequests);

        // area manager
        $amPendingRequests          =   0;
        $amPendingPlans             =   $this->getAMPendingPlans();
        $amPendingLeaveRequests     =   $this->getAMPendingLeaveRequests();
        $amPendingServicesRequests  =   $this->getAMPendingServicesRequests();


        if ($amPendingPlans != 0 || $amPendingLeaveRequests != 0 || $amPendingServicesRequests != 0) {
            $amPendingRequests = 1;
        }
        view()->share('amPendingRequests', $amPendingRequests);
        view()->share('amCountPendingPlans', $amPendingPlans);
        view()->share('amCountPendingLeaveRequests', $amPendingLeaveRequests);
        view()->share('amCountPendingServicesRequest', $amPendingServicesRequests);

        // medical rep
        $mrPendingRequests          =   0;
        $mrPendingPlans             =   $this->getMRPendingPlans();
        $mrPendingLeaveRequests     =   $this->getMRPendingLeaveRequests();
        $mrPendingServicesRequests  =   $this->getMRPendingServicesRequests();


        if ($mrPendingPlans != 0 || $mrPendingLeaveRequests != 0 || $mrPendingServicesRequests != 0) {
            $mrPendingRequests = 1;
        }

        view()->share('mrPendingRequests', $mrPendingRequests);
        view()->share('mrCountPendingPlans', $mrPendingPlans);
        view()->share('mrCountPendingLeaveRequests', $mrPendingLeaveRequests);
        view()->share('mrCountPendingServicesRequest', $mrPendingServicesRequests);
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

    // Sales Manager
    public function getAMPendingPlans(){
        $plans = AMPlan::pending()->get();
        return count($plans);
    }

    public function getAMPendingLeaveRequests(){
        $leaveRequests  = AMLeaveRequest::pending()->get();
        return count($leaveRequests);
    }

    public function getAMPendingServicesRequests(){
        $serviceRequests    = AMServiceRequest::pending()->get();
        return count($serviceRequests);
    }

    // Sales Manager
    public function getMRPendingPlans(){
        $plans = Plan::pending()->get();
        return count($plans);
    }

    public function getMRPendingLeaveRequests(){
        $leaveRequests  = LeaveRequest::pending()->get();
        return count($leaveRequests);
    }

    public function getMRPendingServicesRequests(){
        $serviceRequests    = ServiceRequest::pending()->get();
        return count($serviceRequests);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
