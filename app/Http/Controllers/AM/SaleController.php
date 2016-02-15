<?php

namespace App\Http\Controllers\AM;

use App\Employee;
use App\Product;
use App\Report;
use App\Http\Requests\Admin\SalesSearchRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class SaleController extends Controller
{
    public function listAll()
    {
        return view('am.sales.list');
    }

    public function search()
    {
        $employeesLines     = Employee::select('line_id')->where('manager_id', \Auth::user()->id)->get();
        $products           =   Product::where('line_id', $employeesLines)->get();

        $MRs        =   Employee::where('manager_id', \Auth::user()->id)->get();

        $dataView   =   [
            'products'  =>  $products,
            'MRs'       =>  $MRs
        ];

        return view('am.search.sales.search', $dataView);
    }

    public function doSearch(SalesSearchRequest $request)
    {
        $searchResult   =   [];
        $from           =   $request->date_from;
        $to             =   $request->date_to;
        $products       =   $request->products;
        $MRs            =   $request->mrs;

        $allSearchedReport = Report::select('sold_products')
            ->where('date', '>=', $from)
            ->where('date', '<=', $to)
            ->whereIn('mr_id', $MRs)
            ->where('sold_products' , '<>', 'NULL')
            ->get();

        foreach($allSearchedReport as $singleReport)
        {
            foreach(json_decode($singleReport) as $soldProducts){
                foreach( json_decode($soldProducts) as $singleProduct=> $quantity)
                {
                    $productName = Product::findOrFail($singleProduct)->name;
                    if (in_array($singleProduct, $products))
                    {
                        if (isset($searchResult [$productName])) {
                            $searchResult [$productName] += $quantity;
                        } else {
                            $searchResult [$productName] = $quantity;
                        }
                    }
                }
            }
        }
        $dataView   =   [
            'searchResult'  =>  $searchResult
        ];
        return view('am.search.sales.result', $dataView);
    }
}
