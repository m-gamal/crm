<?php

namespace App\Http\Controllers\AM;

use App\Customer;
use App\Employee;
use Illuminate\Http\Request;
use App\Product;
use App\Plan;
use App\Report;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('am.index');
    }

    public function lock()
    {
        return view('am.partials.lock');
    }
}
