<?php

namespace App\Http\Requests\MR;

use App\Http\Requests\Request;

class ReportSearchRequest extends Request
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
            'date_from' =>  'required',
            'date_to'   =>  'required',
            'doctors'   =>  ''
        ];
    }
}
