<?php

namespace App\Http\Request\Validation;

use App\Http\Request\Request;

class CreateApplicationRequest extends Request
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
            'name'      => 'required|string|min:3|max:180',
            'email'     => 'required|min:2|email',
            'contact'   => 'required|min:10|max:10',
            'address'   => 'required|string',
            'gender'    => 'required|not_in:""',
            'city_id'   => 'required|not_in:""',
            'current_ctc'=> 'required',
            'expected_ctc'=> 'required',
            'notice_period'=> 'required'
        ];
    }

   /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        
    }
}
