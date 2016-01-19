<?php

namespace App\Http\Controllers\MR;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\MR\SalesSearchRequest;
use App\Product;
use App\Employee;
use App\Report;

class SaleController extends Controller
{
    public function search()
    {
        $products   =   Product::where('line_id', Employee::find(3)->line_id)->get(); //mr_session

        $dataView   =   [
            'products'  =>  $products
        ];

        return view('mr.search.sales.search', $dataView);
    }

    public function doSearch(SalesSearchRequest $request)
    {
        $searchResult   =   [];
        $from           =   $request->date_from;
        $to             =   $request->date_to;
        $products       =   $request->products;

        // mr_session
        $allSearchedReport = Report::select('sold_products')
                ->where('date', '>=', $from)
                ->where('date', '<=', $to)
                ->where('mr_id', 3)
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
        return view('mr.search.sales.result', $dataView);
    }
}
