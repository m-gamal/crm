<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

class SMPlanSearchRequest extends Request
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
            'sm'        =>  'required',
            'date_from' =>  'required',
            'date_to'   =>  'required'
        ];
    }
}
