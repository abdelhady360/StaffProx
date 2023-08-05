<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LicenseInfo extends FormRequest
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
            'license_number'   => 'required|numeric',
            'no_facility'      => 'required',
        ];
    }


    public function messages()
    {

        return [
            'license_number.required'    => 'من فضلك رقم الرخصة مطلوب',
            'license_number.numeric'     => 'عفواً رقم الرخصة يجب ان يكون ارقام فقط',
            'no_facility.required'       => 'من فضلك الشكل القانوني مطلوب',

        ];
    }
}
