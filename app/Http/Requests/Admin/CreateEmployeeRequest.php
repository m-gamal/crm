<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

class CreateEmployeeRequest extends Request
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
            'line'          =>  'required',
            'name'          =>  'required',
            'email'         =>  'required|email',
            'password'      =>  'required',
            'level'         =>  'required',
            'hiring_date'   =>  'required|date_format:d-m-Y',
            'leaving_date'  =>  'date_format:d-m-Y',
            'photo'         =>  'required|image'
        ];
    }
}
