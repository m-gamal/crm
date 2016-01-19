<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

class EditEmployeeRequest extends Request
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
            'level'         =>  'required',
            'hiring_date'   =>  'required|date_format:Y-m-d',
            'leaving_date'  =>  'date_format:Y-m-d',
            'photo'         =>  'image'
        ];
    }
}
