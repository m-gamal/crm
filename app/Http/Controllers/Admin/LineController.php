<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateLineRequest;
use App\Http\Requests\Admin\EditLineRequest;
use App\Http\Requests\Admin\MRAchievementRequest;
use App\Line;
use App\Employee;
use App\MrLines;
use Redirect;
use App\Customer;
use App\Report;
use App\ReportSoldProduct;
use App\Product;

class LineController extends Controller
{
    public function listAll()
    {
        $lines = Line::all();
        $dataView 	= [
            'lines'	=>	 $lines
        ];

        return view('admin.line.list', $dataView);
    }

    public function create()
    {
        return view('admin.line.create');
    }

    public function doCreate(CreateLineRequest $request)
    {
        $line   =   new Line;

        $line->title = $request->title;


        try {
            $line->save();
            return redirect()->back()->with('message','Line has been added successfully !');
        } catch (ParseException $ex) {
            echo 'Failed to create new meal , with error message: ' . $ex->getMessage();
        }
    }

    public function single1($id)
    {

    }

    public static function test()
    {
        $mrId           =   '3';
        $currentMonth   =   'Dec-2015';


        $totalSoldProductsSales = [];
        $totalSoldProductsSalesPrice = 0;

        $reportsId = Report::select('id')->where('month', $currentMonth)
            ->where('mr_id', $mrId)
            ->get()
            ->toArray();

        $allSoldProducts = ReportSoldProduct::whereIn('report_id', $reportsId)->get();

        foreach($allSoldProducts as $singleReportProducts)
        {
            $productName    =   $singleReportProducts->product->name;
            $productPrice   =   $singleReportProducts->product->unit_price;
            $quantity       =   $singleReportProducts->quantity;

            $totalSoldProductsSalesPrice += ($quantity * $productPrice);

            if (isset($totalSoldProductsSales[$productName])){
                $totalSoldProductsSales[$productName] += $quantity;
            }else {
                $totalSoldProductsSales[$productName] = $quantity;
            }
        }
        return [
            'totalSoldProductsSales'        =>  $totalSoldProductsSales,
            'totalSoldProductsSalesPrice'   =>  $totalSoldProductsSalesPrice
        ];

        print_r($totalSoldProductsSales);
        print_r($totalSoldProductsSalesPrice);

    }

    public function single($mr, $currentMonth)
    {
        $month                      =   explode('-', $currentMonth)[0];

        $actualVisits               =   [];
        $MonthlyCustomerProducts    =   [];
        $MRLine                     =   [];
        $doctors                    =   Customer::where('mr_id', $mr)->get();

        foreach($doctors as $singleDoctor)
        {
            // mr_session
            $actualVisits [$singleDoctor->id] = Report::where('mr_id', $mr)
                ->where('month', $currentMonth)
                ->where('doctor_id', $singleDoctor->id)
                ->count();
            $MonthlyCustomerProducts[$singleDoctor->id]    =   Customer::monthlyProductsBought([$singleDoctor->id])->toArray();
        }


        $products                   =   Product::where('line_id', Employee::findOrFail($mr)->line_id)->get();
        $coverageStats              =   Employee::coverageStats($mr, $currentMonth);
        $allManagers                =   Employee::yourManagers($mr);
        $totalProducts              =   Employee::monthlyDirectSales($mr, $currentMonth);

        $totalSoldProductsSales     =   $totalProducts['totalSoldProductsSales'];
        $totalSoldProductsSalesPrice=   $totalProducts['totalSoldProductsSalesPrice'];
        $currentMonth               =   \Carbon\Carbon::parse($currentMonth);
        $lines = MrLines::select('line_id', 'from', 'to')->where('mr_id', $mr)->get();

        foreach($lines as $line) {
            $lineFrom = \Carbon\Carbon::parse($line->from);
            $lineTo = \Carbon\Carbon::parse($line->to);

            if (!$currentMonth->lte($lineTo) && $currentMonth->gte($lineFrom) )
            {
                $MRLine = MrLines::where('mr_id', $mr)->where('line_id', $line->line_id)->get();
            }
        }

        $dataView  = [
            'doctors'                       =>  $doctors,
            'MonthlyCustomerProducts'       =>  $MonthlyCustomerProducts,
            'actualVisits'                  =>  $actualVisits,
            'products'                      =>  $products,
            'totalVisitsCount'              =>  $coverageStats['totalVisitsCount'],
            'actualVisitsCount'             =>  $coverageStats['actualVisitsCount'],
            'totalMonthlyCoverage'          =>  $coverageStats['totalMonthlyCoverage'],
            'allManagers'                   =>  $allManagers,
            'totalSoldProductsSales'        =>  $totalSoldProductsSales,
            'totalSoldProductsSalesPrice'   =>  $totalSoldProductsSalesPrice,
            'MRLines'                       =>  $MRLine,
            'mr'                            =>  $mr,
            'month'                         =>  $month
        ];
        return view('admin.line.single', $dataView);
    }

    public function update($id)
    {
        $line = Line::findOrFail($id);
        $dataView 	= [
            'line'	=>  $line
        ];

        return view('admin.line.edit', $dataView);
    }

    public function doUpdate(EditLineRequest $request, $id)
    {
        $line   =   Line::findOrFail($id);
        $line->title = $request->title;


        try {
            $line->save();
            return redirect()->route('lines')->with('message','Line has been updated successfully !');
        } catch (ParseException $ex) {
            echo 'Failed to update this line , with error message: ' . $ex->getMessage();
        }
    }

    public function doDelete($id)
    {
        $line  =   Line::findOrFail($id);

        try {
            $line->delete();
            return redirect()->back()->with('message','Line has been deleted successfully !');
        } catch (ParseException $ex) {
            echo 'Failed to delete this line , with error message: ' . $ex->getMessage();
        }
    }

    public function achievement()
    {
        $dataView  = [
            // mr_session
            'lines'     =>  Line::all(),
            'MRs'       =>  Employee::where('level_id', 7)->get()
        ];
        return view('admin.line.history.search', $dataView);
    }

    public function doAchievement(MRAchievementRequest $request)
    {


        $year   =   $request->year;
        $month  =   $request->month;
        $mr     =   $request->mr;

        $month = \Carbon\Carbon::parse($month.'-'.$year);


        return Redirect::route('adminSingleLine', array($mr, \Carbon\Carbon::parse($month)->format('M-Y')));
    }
}
