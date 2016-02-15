<?php

namespace App\Http\Controllers\MR;

use App\Product;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\IBNS;
use App\POS;
use App\UCP;

class ProductController extends Controller
{
    // Get price of product
    public function ajaxProductPrice()
    {
        $id     =   \Input::get('id');
        $price  =   Product::findOrFail($id)->unit_price;
        return $price;
    }

    public function listAllDistributors()
    {
        $ibnsAreas          =   [];
        $posAreas           =   [];
        $ucpAreas           =   [];

        // IBNS
        $ibnsProducts       =   IBNS::select('product_name', 'code')->distinct()->get()->toArray();
        foreach($ibnsProducts as $singleProduct)
        {
            $ibnsAreas[$singleProduct['code']] = $this->getIBNSAreas($singleProduct['code']);
        }

        // POS
        $posProducts       =   POS::select('product_name', 'code')->distinct()->get()->toArray();
        foreach($posProducts as $singleProduct)
        {
            $posAreas[$singleProduct['code']] = $this->getPOSAreas($singleProduct['code']);
        }

        // UCP
        $ucpProducts       =   UCP::select('product_name', 'code')->distinct()->get()->toArray();
        foreach($ucpProducts as $singleProduct)
        {
            $ucpAreas[$singleProduct['code']] = $this->getUCPAreas($singleProduct['code']);
        }

        $dataView 	=   [
            'ibnsProducts'  =>  $ibnsProducts,
            'ibnsAreas'     =>  $ibnsAreas,
            'posProducts'   =>  $posProducts,
            'posAreas'      =>  $posAreas,
            'ucpProducts'   =>  $ucpProducts,
            'ucpAreas'      =>  $ucpAreas
        ];

        return view('mr.product.list_distributors', $dataView);
    }

    public function getIBNSAreas($productCode)
    {
        return IBNS::select('id', 'area', 'quantity', 'mrs_percents')->where('code', $productCode)->get()->toArray();
    }

    public function getPOSAreas($productCode)
    {
        return POS::select('id', 'area', 'quantity', 'mrs_percents')->where('code', $productCode)->get()->toArray();
    }

    public function getUCPAreas($productCode)
    {
        return UCP::select('id', 'area', 'quantity', 'mrs_percents')->where('code', $productCode)->get()->toArray();
    }
}
