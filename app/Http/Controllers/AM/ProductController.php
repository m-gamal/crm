<?php

namespace App\Http\Controllers\AM;

use App\Employee;
use App\Territory;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateProductRequest;
use App\Http\Requests\Admin\CreateDistributorRequest;
use App\Http\Requests\Admin\MRDistributorRequest;
use App\Http\Requests\Admin\EditProductRequest;
use App\Http\Requests\Admin\ProductTargetRequest;
use App\Http\Requests\Admin\AreaTargetRequest;
use App\Http\Requests\Admin\TerritoryTargetRequest;
use App\Product;
use App\Line;
use App\Area;
use App\Form;
use App\ProductTarget;
use App\AreaTarget;
use App\TerritoryTarget;
use App\UCP;
use App\POS;
use App\IBNS;
use Illuminate\Support\Facades\Response;
use Input;
use Maatwebsite\Excel\Facades\Excel;


class ProductController extends Controller
{
    public $month ;
    public function listAll()
    {
    	$employees = Employee::select('line_id')->where('manager_id', \Auth::user()->id)->get();
        $products = Product::whereIn('line_id', $employees)->get();

        $dataView 	= [
            'products'	=>	 $products
        ];

        return view('am.product.list', $dataView);
    }


//    /* Products Target Section */
//    public function listAllTargets()
//    {
//        $productsTarget = ProductsTarget::all();
//        $dataView 	= [
//            'productsTarget'	=>	 $productsTarget
//        ];
//
//        return view('admin.product.list_targets', $dataView);
//    }
//
//    public function productTarget()
//    {
//        $lines          =   Line::all();
//        $products       =   Product::all();
//
//        $dataView 	= [
//            'lines'	        =>  $lines,
//            'products'      =>  $products
//        ];
//
//        return view('admin.product.set_product_target', $dataView);
//    }
//
//    public function doProductTarget(ProductTargetRequest $request)
//    {
//        $productTarget                  =   new ProductTarget;
//        $productTarget->year            =   $request->year;
//        $productTarget->line_id         =   $request->line;
//        $productTarget->product_id      =   $request->product;
//        $productTarget->quantity        =   $request->quantity;
//
//        $monthsTarget['jan']            =   $request->jan;
//        $monthsTarget['feb']            =   $request->feb;
//        $monthsTarget['mar']            =   $request->mar;
//        $monthsTarget['apr']            =   $request->apr;
//        $monthsTarget['may']            =   $request->may;
//        $monthsTarget['jun']            =   $request->jun;
//        $monthsTarget['jul']            =   $request->jul;
//        $monthsTarget['aug']            =   $request->aug;
//        $monthsTarget['sep']            =   $request->sep;
//        $monthsTarget['oct']            =   $request->oct;
//        $monthsTarget['nov']            =   $request->nov;
//        $monthsTarget['dec']            =   $request->dec;
//        $monthsTargetJson               =   json_encode($monthsTarget);
//        $productTarget->months_target  =   $monthsTargetJson;
//
//        if ($productTarget->save()){
//            return redirect()->route('setProductTarget')->with('message','Product Target has been set successfully !');
//        } else {
//            return redirect()->back()->withInput();
//        }
//    }
//
//    public function areaTarget()
//    {
//        $lines              =   Line::all();
//        $productsTargets    =   ProductTarget::with('product')->get();
//
//        $dataView 	= [
//            'lines'              =>  $lines,
//            'productsTargets'    =>  $productsTargets
//        ];
//
//        return view('admin.product.set_area_target', $dataView);
//    }
//
//    public function doAreaTarget(AreaTargetRequest $request)
//    {
//        $areaTarget                     =   new AreaTarget;
//        $areaTarget->product_target_id  =   $request->product_target;
//        $areaTarget->area_id            =   $request->area;
//        $areaTarget->percent            =   $request->percent;
//        $monthsTarget['jan']            =   $request->jan;
//        $monthsTarget['feb']            =   $request->feb;
//        $monthsTarget['mar']            =   $request->mar;
//        $monthsTarget['apr']            =   $request->apr;
//        $monthsTarget['may']            =   $request->may;
//        $monthsTarget['jun']            =   $request->jun;
//        $monthsTarget['jul']            =   $request->jul;
//        $monthsTarget['aug']            =   $request->aug;
//        $monthsTarget['sep']            =   $request->sep;
//        $monthsTarget['oct']            =   $request->oct;
//        $monthsTarget['nov']            =   $request->nov;
//        $monthsTarget['dec']            =   $request->dec;
//        $monthsTargetJson               =   json_encode($monthsTarget);
//        $areaTarget->months_target      =   $monthsTargetJson;
//
//        if ($areaTarget->save()){
//            return redirect()->route('setAreaTarget')->with('message','Area Target has been set successfully !');
//        } else {
//            return redirect()->back()->withInput();
//        }
//    }
//
//    public function territoryTarget()
//    {
//        $lines          =   Line::all();
//        $areasTargets   =   AreaTarget::with('product_target')->get();
//
//        $dataView 	= [
//            'lines'             =>  $lines,
//            'areasTargets'      =>  $areasTargets
//        ];
//
//        return view('admin.product.set_territory_target', $dataView);
//    }
//
//    public function doTerritoryTarget(TerritoryTargetRequest $request)
//    {
//        $territoryTarget                     =   new TerritoryTarget;
//        $territoryTarget->area_target_id     =   $request->area_target;
//        $territoryTarget->territory_id       =   $request->territory;
//        $territoryTarget->percent            =   $request->percent;
//        $monthsTarget['jan']            =   $request->jan;
//        $monthsTarget['feb']            =   $request->feb;
//        $monthsTarget['mar']            =   $request->mar;
//        $monthsTarget['apr']            =   $request->apr;
//        $monthsTarget['may']            =   $request->may;
//        $monthsTarget['jun']            =   $request->jun;
//        $monthsTarget['jul']            =   $request->jul;
//        $monthsTarget['aug']            =   $request->aug;
//        $monthsTarget['sep']            =   $request->sep;
//        $monthsTarget['oct']            =   $request->oct;
//        $monthsTarget['nov']            =   $request->nov;
//        $monthsTarget['dec']            =   $request->dec;
//        $monthsTargetJson               =   json_encode($monthsTarget);
//        $territoryTarget->months_target =   $monthsTargetJson;
//
//        if ($territoryTarget->save()){
//            return redirect()->route('setTerritoryTarget')->with('message','Territory Target has been set successfully !');
//        } else {
//            return redirect()->back()->withInput();
//        }
//    }
//
//    public function remainingProductQuantity($productId)
//    {
//        return ProductsTarget::where('product_id', $productId)->sum('percentage');
//    }
//
//    public function isSetProductsTarget($territories)
//    {
//        $notSetProductsTargetTerritories = [];
//        foreach($territories as $id=>$name) {
//            if (ProductsTarget::where('territory_id', $id)->count() < 1){
//                $notSetProductsTargetTerritories[$id] = $name;
//            }
//        }
//        return $notSetProductsTargetTerritories;
//    }
//
//    public function updateProductTarget($productTargetId)
//    {
//        $productTarget  =   ProductsTarget::findOrFail($productTargetId);
//        $lines          =   Line::all();
//
//        $dataView 	= [
//            'lines'                 =>  $lines,
//            'productTarget'	        =>  $productTarget
//        ];
//
//        return view('admin.product.edit_target', $dataView);
//    }
//
//    public function doUpdateProductTarget($productTargetId)
//    {
//
//    }
//
//    public function doDeleteProductsTarget($productTargetId)
//    {
//        $productTarget  =   ProductsTarget::findOrFail($productTargetId);
//
//        try {
//            $productTarget->delete();
//            return redirect()->back()->with('message','Product Target has been deleted successfully !');
//        } catch (ParseException $ex) {
//            echo 'Failed to delete this target , with error message: ' . $ex->getMessage();
//        }
//    }
//
//    /* Ajax Handlers */
//
//    // Get Areas Based on Line
//    public function ajaxAreas()
//    {
//        $lineId         =   Input::get('lineId');
//        $areas          =   Area::where('line_id', $lineId)->lists('name', 'id');
//        return Response::json($areas);
//    }
//
//    // Get Territories Based on Area
//    public function ajaxTerritories()
//    {
//        $areaId         =   Input::get('areaId');
//        $territories    =   Territory::where('area_id', $areaId)->lists('name', 'id');
//        return Response::json($territories);
//    }
//
//    // Get Products Based on Area
//    public function ajaxProducts()
//    {
//        $lineId         =   Input::get('lineId');
//        $products       =   Product::where('line_id', $lineId)->lists('name', 'id');
//        return Response::json($products);
//    }
//
//    // Get quantity of product based on percentage
//    public function ajaxProductQuantity()
//    {
//        $productId                      =   Input::get('productId');
//        $productQuantity['original']    =   Product::where('id', $productId)->first()->quantity;
//        $productQuantity['remaining']   =   $productQuantity['original'] - $productQuantity['original'] * $this->remainingProductQuantity($productId);
//
//        return Response::json($productQuantity);
//    }
//
//    public function listAllDistributorsDates()
//    {
//        $allMonths  =   UCP::select('month')->distinct()->get();
//        $dataView 	= [
//            'allMonths'  =>  $allMonths
//        ];
//
//        return view('admin.product.distributors_dates', $dataView);
//    }
//
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

        $dataView 	= [
            'ibnsProducts'  =>  $ibnsProducts,
            'ibnsAreas'     =>  $ibnsAreas,
            'posProducts'   =>  $posProducts,
            'posAreas'      =>  $posAreas,
            'ucpProducts'   =>  $ucpProducts,
            'ucpAreas'      =>  $ucpAreas
        ];

        return view('am.product.list_distributors', $dataView);
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