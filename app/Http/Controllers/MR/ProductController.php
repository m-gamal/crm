<?php

namespace App\Http\Controllers\MR;

use App\Product;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    // Get price of product
    public function ajaxProductPrice()
    {
        $id     =   \Input::get('id');
        $price  =   Product::findOrFail($id)->unit_price;
        return $price;
    }
}
