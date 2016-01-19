<?php

namespace App\Http\Controllers\Admin;

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
        $products = Product::all();
        $dataView 	= [
            'products'	=>	 $products
        ];

        return view('admin.product.list', $dataView);
    }

    public function create()
    {
        $lines  = Line::all();
        $forms  = Form::all();
        $dataView 	= [
            'lines'	=>	 $lines,
            'forms'	=>	 $forms
        ];

        return view('admin.product.create', $dataView);
    }

    public function doCreate(CreateProductRequest $request)
    {

        $product   =   new Product;

        $product->line_id       = $request->line;
        $product->name          = $request->name;
        $product->form_id       = $request->form;
        $product->unit_price    = $request->unit_price;

        try {
            $product->save();
            return redirect()->back()->with('message','Product has been added successfully !');
        } catch (ParseException $ex) {
            echo 'Failed to delete this product , with error message: ' . $ex->getMessage();
        }
    }

    public function single($id)
    {
            //        return view ('admin.product.single');
    }

    public function update($id)
    {
        $lines = Line::all();
        $forms = Form::all();
        $product = Product::findOrFail($id);
        $dataView 	= [
            'product'	=>  $product,
            'lines'     =>  $lines,
            'forms'     =>  $forms
        ];

        return view('admin.product.edit', $dataView);
    }

    public function doUpdate(EditProductRequest $request, $id)
    {
        $product   =   Product::findOrFail($id);

        $product->line_id       = $request->line;
        $product->name          = $request->name;
        $product->unit_price    = $request->unit_price;

        try {
            $product->save();
            return redirect()->route('products')->with('message','Product has been updated successfully !');
        } catch (ParseException $ex) {
            echo 'Failed to update this product , with error message: ' . $ex->getMessage();
        }
    }

    public function doDelete($id)
    {
        $product  =   Product::findOrFail($id);

        try {
            $product->delete();
            return redirect()->back()->with('message','Product has been deleted successfully !');
        } catch (ParseException $ex) {
            echo 'Failed to delete this product , with error message: ' . $ex->getMessage();
        }
    }

    /* Products Target Section */
    public function listAllTargets()
    {
        $productsTarget = ProductsTarget::all();
        $dataView 	= [
            'productsTarget'	=>	 $productsTarget
        ];

        return view('admin.product.list_targets', $dataView);
    }

    public function productTarget()
    {
        $lines          =   Line::all();
        $products       =   Product::all();

        $dataView 	= [
            'lines'	        =>  $lines,
            'products'      =>  $products
        ];

        return view('admin.product.set_product_target', $dataView);
    }

    public function doProductTarget(ProductTargetRequest $request)
    {
        $productTarget                  =   new ProductTarget;
        $productTarget->year            =   $request->year;
        $productTarget->line_id         =   $request->line;
        $productTarget->product_id      =   $request->product;
        $productTarget->quantity        =   $request->quantity;

        $monthsTarget['jan']            =   $request->jan;
        $monthsTarget['feb']            =   $request->feb;
        $monthsTarget['mar']            =   $request->mar;
        $monthsTarget['apr']            =   $request->apr;
        $monthsTarget['may']            =   $request->may;
        $monthsTarget['jun']            =   $request->jun;
        $monthsTarget['jul']            =   $request->jul;
        $monthsTarget['aug']            =   $request->aug;
        $monthsTarget['sep']            =   $request->sep;
        $monthsTarget['oct']            =   $request->oct;
        $monthsTarget['nov']            =   $request->nov;
        $monthsTarget['dec']            =   $request->dec;
        $monthsTargetJson               =   json_encode($monthsTarget);
        $productTarget->months_target  =   $monthsTargetJson;

        if ($productTarget->save()){
            return redirect()->route('setProductTarget')->with('message','Product Target has been set successfully !');
        } else {
            return redirect()->back()->withInput();
        }
    }

    public function areaTarget()
    {
        $lines              =   Line::all();
        $productsTargets    =   ProductTarget::with('product')->get();

        $dataView 	= [
            'lines'              =>  $lines,
            'productsTargets'    =>  $productsTargets
        ];

        return view('admin.product.set_area_target', $dataView);
    }

    public function doAreaTarget(AreaTargetRequest $request)
    {
        $areaTarget                     =   new AreaTarget;
        $areaTarget->product_target_id  =   $request->product_target;
        $areaTarget->area_id            =   $request->area;
        $areaTarget->percent            =   $request->percent;
        $monthsTarget['jan']            =   $request->jan;
        $monthsTarget['feb']            =   $request->feb;
        $monthsTarget['mar']            =   $request->mar;
        $monthsTarget['apr']            =   $request->apr;
        $monthsTarget['may']            =   $request->may;
        $monthsTarget['jun']            =   $request->jun;
        $monthsTarget['jul']            =   $request->jul;
        $monthsTarget['aug']            =   $request->aug;
        $monthsTarget['sep']            =   $request->sep;
        $monthsTarget['oct']            =   $request->oct;
        $monthsTarget['nov']            =   $request->nov;
        $monthsTarget['dec']            =   $request->dec;
        $monthsTargetJson               =   json_encode($monthsTarget);
        $areaTarget->months_target      =   $monthsTargetJson;

        if ($areaTarget->save()){
            return redirect()->route('setAreaTarget')->with('message','Area Target has been set successfully !');
        } else {
            return redirect()->back()->withInput();
        }
    }

    public function territoryTarget()
    {
        $lines          =   Line::all();
        $areasTargets   =   AreaTarget::with('product_target')->get();

        $dataView 	= [
            'lines'             =>  $lines,
            'areasTargets'      =>  $areasTargets
        ];

        return view('admin.product.set_territory_target', $dataView);
    }

    public function doTerritoryTarget(TerritoryTargetRequest $request)
    {
        $territoryTarget                     =   new TerritoryTarget;
        $territoryTarget->area_target_id     =   $request->area_target;
        $territoryTarget->territory_id       =   $request->territory;
        $territoryTarget->percent            =   $request->percent;
        $monthsTarget['jan']            =   $request->jan;
        $monthsTarget['feb']            =   $request->feb;
        $monthsTarget['mar']            =   $request->mar;
        $monthsTarget['apr']            =   $request->apr;
        $monthsTarget['may']            =   $request->may;
        $monthsTarget['jun']            =   $request->jun;
        $monthsTarget['jul']            =   $request->jul;
        $monthsTarget['aug']            =   $request->aug;
        $monthsTarget['sep']            =   $request->sep;
        $monthsTarget['oct']            =   $request->oct;
        $monthsTarget['nov']            =   $request->nov;
        $monthsTarget['dec']            =   $request->dec;
        $monthsTargetJson               =   json_encode($monthsTarget);
        $territoryTarget->months_target =   $monthsTargetJson;

        if ($territoryTarget->save()){
            return redirect()->route('setTerritoryTarget')->with('message','Territory Target has been set successfully !');
        } else {
            return redirect()->back()->withInput();
        }
    }

    public function remainingProductQuantity($productId)
    {
        return ProductsTarget::where('product_id', $productId)->sum('percentage');
    }

    public function isSetProductsTarget($territories)
    {
        $notSetProductsTargetTerritories = [];
        foreach($territories as $id=>$name) {
            if (ProductsTarget::where('territory_id', $id)->count() < 1){
                $notSetProductsTargetTerritories[$id] = $name;
            }
        }
        return $notSetProductsTargetTerritories;
    }

    public function updateProductTarget($productTargetId)
    {
        $productTarget  =   ProductsTarget::findOrFail($productTargetId);
        $lines          =   Line::all();

        $dataView 	= [
            'lines'                 =>  $lines,
            'productTarget'	        =>  $productTarget
        ];

        return view('admin.product.edit_target', $dataView);
    }

    public function listProductTarget()
    {

        $productTargets     =   ProductTarget::all();

        $dataView   =   [
            'productTargets'    =>  $productTargets,
        ];
        return view ('admin.product.list_product_targets', $dataView);
    }

    public function listAreaTarget($productTargetId)
    {

        $areaTargets     =   AreaTarget::where('product_target_id', $productTargetId)->get();

        $dataView   =   [
            'areaTargets'    =>  $areaTargets,
        ];
        return view ('admin.product.list_area_targets', $dataView);
    }

    public function listTerritoryTarget($areaTargetId)
    {

        $territoryTargets     =   TerritoryTarget::where('area_target_id', $areaTargetId)->get();

        $dataView   =   [
            'territoryTargets'    =>  $territoryTargets,
        ];
        return view ('admin.product.list_territory_targets', $dataView);
    }
    public function doDeleteProductsTarget($productTargetId)
    {
        $productTarget  =   ProductsTarget::findOrFail($productTargetId);

        try {
            $productTarget->delete();
            return redirect()->back()->with('message','Product Target has been deleted successfully !');
        } catch (ParseException $ex) {
            echo 'Failed to delete this target , with error message: ' . $ex->getMessage();
        }
    }

    /* Ajax Handlers */

    // Get Areas Based on Line
    public function ajaxAreas()
    {
        $lineId         =   Input::get('lineId');
        $areas          =   Area::where('line_id', $lineId)->lists('name', 'id');
        return Response::json($areas);   
    }

    // Get Territories Based on Area
    public function ajaxTerritories()
    {
        $areaId         =   Input::get('areaId');
        $territories    =   Territory::where('area_id', $areaId)->lists('name', 'id');
        return Response::json($territories);
    }

    // Get Products Based on Area
    public function ajaxProducts()
    {
        $lineId         =   Input::get('lineId');
        $products       =   Product::where('line_id', $lineId)->lists('name', 'id');
        return Response::json($products);
    }

    // Get quantity of product based on percentage
    public function ajaxProductQuantity()
    {
        $productId                      =   Input::get('productId');
        $productQuantity['original']    =   Product::where('id', $productId)->first()->quantity;
        $productQuantity['remaining']   =   $productQuantity['original'] - $productQuantity['original'] * $this->remainingProductQuantity($productId);

        return Response::json($productQuantity);
    }

    public function listAllDistributorsDates()
    {
        $allMonths  =   UCP::select('month')->distinct()->get();
        $dataView 	= [
            'allMonths'  =>  $allMonths
        ];

        return view('admin.product.distributors_dates', $dataView);
    }

    public function listAllDistributors()
    {
        $ibnsAreas  = [];
        $posAreas   = [];
        $ucpAreas   = [];

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

        return view('admin.product.list_distributors', $dataView);
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
    public function addDistributor()
    {
        return view('admin.product.upload_distributor');
    }

    public function doAddDistributor(CreateDistributorRequest $request)
    {
        $name = $request->name;
        $extension = $request->file('list')->getClientOriginalExtension();
        if (!is_null($name)) {
            if ($request->file('list')->move(public_path('uploads/distributors'), $name . '.' . $extension)){
                $this->$name(); // call dis function
                return redirect()->route('addDistributor')->with('message', "$name Distributor List has been uploaded successfully !");
            }
        }
    }

    public function IBNS()
    {
        Excel::load(public_path('uploads/distributors').'/IBNS.xlsx', function($reader) {

            $results = $reader->get();
            foreach($results as $key=>$row){
                if (!is_null($row->item_name) && !is_null($row->brick_name) && !is_null($row->total_qty)) {
                    $itemName   =   $row->item_name;
                    $itemCode   =   $row->item_code;
                    $month      =   date('M-Y');

                    $ibns               =   new IBNS();
                    $ibns->month        =   config('app.current_month');
                    $ibns->code         =   $itemCode;
                    $ibns->product_name =   $itemName;
                    $ibns->area         =   $row->brick_name;
                    $ibns->quantity     =   $row->total_qty;
                    $ibns->save();

                } else if(is_null($row->item_name) && !is_null($row->brick_name) && !is_null($row->total_qty)){
                    $ibns               =   new IBNS();
                    $ibns->month        =   config('app.current_month');
                    $ibns->code         =   $itemCode;
                    $ibns->product_name =   $itemName;
                    $ibns->area         =   $row->brick_name;
                    $ibns->quantity     =   $row->total_qty;
                    $ibns->save();
                }
            }
        });
    }

    public function UCP()
    {
        Excel::load(public_path('uploads/distributors').'/UCP.xlsx', function($reader) {
            $results = $reader->get();
            $areas =
                ['حلوان','دسوق','شبين الكوم' , 'الفيوم', 'سوهاج الجديد', 'دمنهور', 'طموه', 'شبرا مصر', 'الزاوية',
                'المطرية', 'عين شمس', 'م.الجديدة', 'ش الخيمة', 'ش القناطر', 'وسط البلد', 'المهندسين', 'الهرم',
                'العريش', 'م.نصر', 'امبابة', 'المعادى', 'دار السلام', 'البراجيل', 'بورسعيد','الدخيلة', 'سموحة',
                'السويس', 'العصافرة', 'كفر الدوار', 'المنيا', 'بنى مزار', 'اسيوط', 'سوهاج', 'القوصية', 'نجع حمادى', 'قنا',
                'الاقصر', 'بنى سويف' , 'جرجا', 'كفر الشيخ', 'الفلكى', 'اسماعلية', 'محرم بك', 'السواح', 'منصورة غ',
                'الغردقة', 'منصورة ش', 'كفر الزيات', 'المحلة', 'المأمون', 'الاستاد', 'المنزلة', 'ميت غمر',
                'شربين', 'دمياط', 'ابو كبير', 'بلبيس', 'القومية', 'الزهور', 'ايتاى البارود', 'بنها', 'قويسنا',
                'اشمون', 'اسوان', 'فيصل'];

            foreach($results as $key=>$row){
                $i = 0;
                if (!is_null($results[$key]['name']))
                {
                    $itemName = $results[$key]['name'];
                    $itemCode = $results[$key]['code'];
                    if ($results[$key]['name'] == 'Stock')
                    {
                        continue;
                    }
                    unset($results[$key]['name']);
                    unset($results[$key]['code']);

                    foreach($row as $area=>$qty)
                    {
                        if ($i < count($areas)) {
                            $ucp                =   new UCP();
                            $ucp->month         =   config('app.current_month');
                            $ucp->code          =   $itemCode;
                            $ucp->product_name  =   $itemName;
                            $ucp->area          =   $areas[$i];
                            $ucp->quantity      =   $qty;
                            $ucp->save();
                            $i++;

                        } else {
                            $i = 0;
                        }
                    }
                }
            }
        });
    }

    public function POS()
    {
        Excel::load(public_path('uploads/distributors').'/POS.xls', function($reader) {
            $results = $reader->get();
            $areas  =   ['ميامي', 'القباري', 'مينا البصل', 'الفلكى', 'النزهة', 'كفر الزيات', 'دمنهور', 'طنطا', 'المحلة',
                'المنصورة', 'دكرنس', 'دمياط', 'شبين الكوم', 'الناصرية', 'دمنهور 2', 'الزقازيق', 'بنها 2',
                'المطرية', 'مصر الجديدة', 'مدينة نصر', 'عين شمس', 'روض الفرج', 'الجيزة', 'خاتم المرسلين',
                'حلوان', 'امبابة 1', 'مسطرد', 'امبابة 2', 'الفيوم', 'بني سويف', 'المنيا', 'اسيوط', 'سوهاج',
                'قنا', 'المنيا 2'];

            foreach($results as $key=>$row){
                $i = 0;
                if (!is_null($results[$key][0]))
                {
                    if ($results[$key][0] == 'Total Units' || $results[$key][0] == 'Total Values'){
                        unset($results[$key][0]);
                        continue;
                    }
                    $itemName = $results[$key][0];
                    $itemCode = $results[$key]['product_code'];

                    unset($results[$key][0]);
                    unset($results[$key]['product_code']);

                    foreach($row as $area=>$qty)
                    {
                        if ($area == 'total' || $area == 'total_bonus') {
                            unset($area);
                            continue;
                        }

                        if ($i < count($areas)) {
//                            echo date('M-Y') . '->' . $itemName . '->' . $itemCode . '->' . $areas[$i] . '->' . $qty . '<br>';
                            $pos                =   new POS();
                            $pos->month         =   config('app.current_month');;
                            $pos->code          =   $itemCode;
                            $pos->product_name  =   $itemName;
                            $pos->area          =   $areas[$i];
                            $pos->quantity      =   $qty;
                            $pos->save();
                            $i++;
                        } else {
                            $i =0;
                        }
                    }
                }
            }
        } ,'UTF-8');
    }

    public function MRDistributor($distributor, $productAreaId)
    {

        $MR     =   Employee::where('level_id', 7)->active()->get();

        $dataView 	= [
            'MRs'           =>  $MR,
            'distributor'   =>  $distributor,
            'productAreaId' =>  $productAreaId
        ];

        return view('admin.product.mr_distributor', $dataView);
    }

    public function doMRDistributor (MRDistributorRequest $request, $distributor, $productAreaId )
    {
        $distributorPercent [$request->mr] = $request->percent;
        $string     =   "$request->mr:$request->percent";

        if ($distributor == 'IBNS'){
            $ibns = IBNS::findOrFail($productAreaId);
            if (is_null($ibns->mrs_percents)){
                $ibns->mrs_percents = json_encode($distributorPercent);
                $ibns->save();
                return redirect()->route('MRDistributor')->with('message','Percent has been set successfully !');
            } else {
                $tempArray[]        = json_decode($ibns->mrs_percents, true);
                $tempArray[]        = $distributorPercent;
                $ibns->mrs_percents = json_encode($tempArray);
                $ibns->save();
                return redirect()->route('MRDistributor')->with('message','Percent has been updated successfully !');
            }

        }

        if ($distributor == 'POS'){
            $pos = POS::findOrFail($productAreaId);
            if (is_null($pos->mrs_percents)){
                $pos->mrs_percents = json_encode($distributorPercent);
                $pos->save();
                return redirect()->route('MRDistributor')->with('message','Percent has been set successfully !');
            } else {
                $tempArray[]        = json_decode($pos->mrs_percents, true);
                $tempArray[]        = $distributorPercent;
                $pos->mrs_percents = json_encode($tempArray);
                $pos->save();
                return redirect()->route('MRDistributor')->with('message','Percent has been updated successfully !');
            }
        }

        if ($distributor == 'UCP'){
            $ucp = UCP::findOrFail($productAreaId);
            if (is_null($ucp->mrs_percents)){
                $ucp->mrs_percents = json_encode($distributorPercent);
                $ucp->save();
                return redirect()->route('MRDistributor')->with('message','Percent has been set successfully !');
            } else {
                $tempArray[]            = json_decode($ucp->mrs_percents, true);
                $tempArray[]            = $distributorPercent;
                $ucp->mrs_percents      = json_encode($tempArray);
                $ucp->save();

                return redirect()->route('MRDistributor')->with('message','Percent has been updated successfully !');
            }
        }
    }
}