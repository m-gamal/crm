<?php

namespace App\Http\Requests\MR;

use App\Http\Requests\Request;

class CreateExpenseReportRequest extends Request
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
            'month'                 =>  'required',
            'year'                  =>  'required|numeric',
            'hotel_date'            =>  '',
            'hotel'                 =>  '',
            'hotel_meal'            =>  '',
            'hotel_cost'            =>  'numeric',
            'transportation_date'   =>  '',
            'transportation_city'   =>  '',
            'transportation_cost'   =>  'numeric',
            'meeting_date'          =>  '',
            'meeting'               =>  '',
            'meeting_cost'          =>  'numeric',
            'invoices'              =>  'mimes:zip'
        ];
    }
}
