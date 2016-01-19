<?php

namespace App\Http\Requests\AM;

use App\Http\Requests\Request;

class CreateReportRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'month'                 =>  '',
            'date'                  =>  '',
            'doctor'                =>  'required',
            'products_promoted'     =>  '',
            'product_sold'          =>  '',
            'quantity'              =>  '',
            'extra_sold_products'   =>  '',
            'extra_quantity'        =>  '',
            'gifts'                 =>  '',
            'feedback'              =>  '',
            'follow_up'             =>  ''
        ];
    }
}
