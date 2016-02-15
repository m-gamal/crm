<?php

namespace App\Http\Controllers\MR;

use App\Customer;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\MR\SalesSearchRequest;
use App\Product;
use App\Employee;
use App\Report;
use App\ReportSampleProduct;
use App\ReportPromotedProduct;
use App\ReportSoldProduct;
use App\ReportGift;

class SaleController extends Controller
{
    public function search()
    {
        $products   =   Product::where('line_id', Employee::find(\Auth::user()->id)->line_id)->get();
        $doctors    =   Customer::where('mr_id', \Auth::user()->id)->get();

        $dataView   =   [
            'products'  =>  $products,
            'doctors'   =>  $doctors
        ];

        return view('mr.search.sales.search', $dataView);
    }

    public function doSearch(SalesSearchRequest $request)
    {
        $productSales   =   [];
        $from           =   $request->date_from;
        $to             =   $request->date_to;
        $product        =   $request->product;
        $doctor         =   $request->doctor;

        $allSearchedReport = Report::select('id')->where('date', '>=', $from)->where('date', '<=', $to);

        if(!empty($MR)){
            $allSearchedReport =    $allSearchedReport->where('mr_id', \Auth::user()->id);
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
            'searchResult'  =>  $productSales
        ];


        \Session::flash('date_from', $from);
        \Session::flash('date_to', $to);
        \Session::flash('productSales', $productSales);

        return view('mr.search.sales.result', $dataView);
    }
}
