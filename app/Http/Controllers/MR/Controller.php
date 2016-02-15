<?php
namespace App\Http\Controllers\MR;

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

    }
}
