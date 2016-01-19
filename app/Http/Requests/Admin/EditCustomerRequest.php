<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

class EditCustomerRequest extends Request
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
            'name'                  =>  'required',
            'email'                 =>  'email',
            'class'                 =>  'required',
            'description'           =>  '',
            'description_name'      =>  '',
            'specialty'             =>  'required',
            'mobile'                =>  'numeric',
            'clinic_tel'            =>  'numeric',
            'address'               =>  'required',
            'address_description'   =>  '',
            'am_working'            =>  '',
            'mr'                    =>  'required'
        ];
    }
}
