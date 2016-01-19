<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'report';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * The Medical Rep. belongs to report
     */
    public function mr()
    {
        return $this->belongsTo('App\Employee');
    }

    /**
     * The Medical Rep. belongs to report
     */
    public function emp()
    {
        return $this->belongsTo('App\Employee', 'mr_id');
    }
    /**
     * The Doctor belongs to report
     */
    public function doctor()
    {
        return $this->belongsTo('App\Customer');
    }

    /**
     * The Doctor Visit Class belongs to report
     */
    public function visitClass()
    {
        return $this->belongsTo('App\VisitClass');
    }
    /**
     * Format Promoted Products before displaying
     */
    public function getPromotedProductsAttribute($products)
    {
//        $allProducts = [];
//        if (!empty($products)){
//            $promotedProducts = json_decode($products);
//            foreach($promotedProducts as $singleProduct)
//            {
//                $allProducts[] = "<span class=\"label label-info\">".Product::findOrFail($singleProduct)->name."</span>";
//            }
//            return implode(' ', $allProducts);
//        }
    }


//    /**
//     * Format Sample Products before displaying
//     */
//    public function getSampleProductsAttribute($products)
//    {
//        $allProducts = [];
//        if (!empty($products)){
//            $sampleProducts = json_decode($products);
//            foreach($sampleProducts as $singleProduct)
//            {
//                $allProducts[] = "<span class=\"label label-info\">". Product::findOrFail($singleProduct)->name."</span>";
//            }
//            return implode(' ', $allProducts);
//        }
//    }
//
//
//    /**
//     * Format Gifts before displaying
//     */
//    public function getGiftsAttribute($gifts)
//    {
//        $allGifts = [];
//        if (!empty($gifts)){
//            $gifts = json_decode($gifts);
//            foreach($gifts as $singleGift)
//            {
//                $allGifts[] = "<span class=\"label label-info\">".Gift::findOrFail($singleGift)->name."</span>";
//            }
//            return implode(' ', $allGifts);
//        }
//    }


//    /**
//     * Format Sold Products before displaying
//     */
//    public function getSoldProductsAttribute($products)
//    {
//        $allProducts = [];
//        if (!empty($products)){
//            $soldProducts = json_decode($products);
//            foreach($soldProducts as $product=>$quantity)
//            {
//                $product        =   Product::findOrFail($product)->name;
//                $allProducts[]  =   "<span class=\"label label-info\"> $product : [$quantity Units]</span>";
//            }
//            return implode(' ', $allProducts);
//        }
//    }



    public function getIsPlannedAttribute($value)
    {
        $isPlanned = null ;
        $isPlanned = "<span class=\"label label-danger\"> No </span>";
        if ($value == 1)
        {
            $isPlanned = "<span class=\"label label-success\"> Yes </span>";
        }
        return $isPlanned;
    }

    public static function planned()
    {
        // mr_session
        return Report::where('mr_id', 3)->where('month', date('M-Y'))->where('is_planned', 1)->get();
    }

    public static function notPlanned()
    {
        // mr_session
        return Report::where('mr_id', 3)->where('month', date('M-Y'))->where('is_planned', 0)->get();
    }

    public function promotedProducts()
    {
        return $this->hasMany('App\ReportPromotedProduct', 'report_id');
    }

    public function sampleProducts()
    {
        return $this->hasMany('App\ReportSampleProduct', 'report_id');
    }

    public function gift()
    {
        return $this->hasMany('App\ReportGift', 'report_id');
    }

    public function soldProducts()
    {
        return $this->hasMany('App\ReportSoldProduct', 'report_id');
    }
}
