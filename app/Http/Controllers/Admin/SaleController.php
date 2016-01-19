<?php

namespace App\Http\Controllers\Admin;

use App\AMReportSoldProduct;
use App\Customer;
use App\Employee;
use App\Product;
use App\Report;
use App\AMReport;
use App\ReportSoldProduct;
use App\SMReportSoldProduct;
use App\SMReport;
use App\Http\Requests\Admin\SalesSearchRequest;
use App\Http\Requests\Admin\AMSalesSearchRequest;
use App\Http\Requests\Admin\SMSalesSearchRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class SaleController extends Controller
{
    public function listAll()
    {
        return view('admin.sales.list');
    }

    public function search()
    {
        $products   =   Product::all();
        $doctors    =   Customer::all();
        $MRs        =   Employee::where('level_id', 7)->get();
        $AMs        =   Employee::where('level_id', 3)->get();
        $SMs        =   Employee::where('level_id', 2)->get();

        $dataView   =   [
            'products'  =>  $products,
            'doctors'   =>  $doctors,
            'MRs'       =>  $MRs,
            'AMs'       =>  $AMs,
            'SMs'       =>  $SMs
        ];

        return view('admin.search.sales.search', $dataView);
    }

    public function doSearch(SalesSearchRequest $request)
    {
        $productSales   =   [];
        $from           =   $request->date_from;
        $to             =   $request->date_to;
        $product        =   $request->product;
        $doctor         =   $request->doctor;
        $MR             =   $request->mr;

        $allSearchedReport = Report::select('id')->where('date', '>=', $from)->where('date', '<=', $to);

        if(!empty($MR)){
            $allSearchedReport =    $allSearchedReport->where('mr_id', $MR);
        }

        if(!empty($doctor))
        {
            $allSearchedReport  =   $allSearchedReport->where('doctor_id', $doctor);
        }

        $searchResult = ReportSoldProduct::whereIn('report_id', $allSearchedReport->get());

        if(!empty($product)){
            $searchResult->where('product_id', $product);
        }


        foreach($searchResult->get() as $singleResult)
        {
            if(isset($productSales[$singleResult->product->name])){
                $productSales[$singleResult->product->name] +=   $singleResult->quantity;
            } else {
                $productSales[$singleResult->product->name] =   $singleResult->quantity;
            }
        }

        $dataView   =   [
            'productSales'  =>  $productSales
        ];


        \Session::flash('date_from', $from);
        \Session::flash('date_to', $to);
        \Session::flash('productSales', $productSales);


        return view('admin.search.sales.result', $dataView);
    }


    public function doAMSearch(AMSalesSearchRequest $request)
    {
        $productSales   =   [];
        $from           =   $request->date_from;
        $to             =   $request->date_to;
        $product        =   $request->product;
        $doctor         =   $request->doctor;
        $AM             =   $request->am;

        $allSearchedReport = AMReport::select('id')->where('date', '>=', $from)->where('date', '<=', $to);

        if(!empty($AM)){
            $allSearchedReport =    $allSearchedReport->where('am_id', $AM);
        }

        if(!empty($doctor))
        {
            $allSearchedReport  =   $allSearchedReport->where('doctor_id', $doctor);
        }

        $searchResult = AMReportSoldProduct::whereIn('report_id', $allSearchedReport->get());

        if(!empty($product)){
            $searchResult->where('product_id', $product);
        }


        foreach($searchResult->get() as $singleResult)
        {
            if(isset($productSales[$singleResult->product->name])){
                $productSales[$singleResult->product->name] +=   $singleResult->quantity;
            } else {
                $productSales[$singleResult->product->name] =   $singleResult->quantity;
            }
        }
        $dataView   =   [
            'productSales'  =>  $productSales
        ];

        \Session::flash('date_from', $from);
        \Session::flash('date_to', $to);
        \Session::flash('productSales', $productSales);

        return view('admin.search.sales.result', $dataView);
    }

    public function doSMSearch(SMSalesSearchRequest $request)
    {
        $productSales   =   [];
        $from           =   $request->date_from;
        $to             =   $request->date_to;
        $product        =   $request->product;
        $doctor         =   $request->doctor;
        $SM             =   $request->sm;

        $allSearchedReport = SMReport::select('id')->where('date', '>=', $from)->where('date', '<=', $to);

        if(!empty($SM)){
            $allSearchedReport =    $allSearchedReport->where('sm_id', $SM);
        }

        if(!empty($doctor))
        {
            $allSearchedReport  =   $allSearchedReport->where('doctor_id', $doctor);
        }

        $searchResult = SMReportSoldProduct::whereIn('report_id', $allSearchedReport->get());

        if(!empty($product)){
            $searchResult->where('product_id', $product);
        }


        foreach($searchResult->get() as $singleResult)
        {
            if(isset($productSales[$singleResult->product->name])){
                $productSales[$singleResult->product->name] +=   $singleResult->quantity;
            } else {
                $productSales[$singleResult->product->name] =   $singleResult->quantity;
            }
        }

        $dataView   =   [
            'productSales'  =>  $productSales
        ];

        \Session::flash('date_from', $from);
        \Session::flash('date_to', $to);
        \Session::flash('productSales', $productSales);

        return view('admin.search.sales.result', $dataView);
    }
}