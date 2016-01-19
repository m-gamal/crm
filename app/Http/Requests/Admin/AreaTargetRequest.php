<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

class AreaTargetRequest extends Request
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
            'product_target'=>  'required',
            'line'          =>  'required',
            'area'          =>  'required',
            'percent'       =>  'required|numeric',
            'jan'           =>  'required|numeric',
            'feb'           =>  'required|numeric',
            'mar'           =>  'required|numeric',
            'apr'           =>  'required|numeric',
            'may'           =>  'required|numeric',
            'jun'           =>  'required|numeric',
            'jul'           =>  'required|numeric',
            'aug'           =>  'required|numeric',
            'sep'           =>  'required|numeric',
            'oct'           =>  'required|numeric',
            'nov'           =>  'required|numeric',
            'dec'           =>  'required|numeric',
        ];
    }
}
