<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class visa extends FormRequest
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
            'name'               => 'required|max:255|min:5',
            'passport_number'    => 'required|unique:visas',
            'passpor_start'      => 'required',
            'passpor_end'        => 'required',
            'dob'                => 'required',
            'nationality'        => 'required',
            'sex'                => 'required',
            'visa_start'         => 'required',
            'visa_end'           => 'required',

        ];
    }

    public function messages()
    {

        return [
            'name.required'              => 'من فضلك أسم الموظف مطلوب',
            'name.min'                   => 'عفواً أسم الموظف قصير جداً',
            'name.max'                   => 'عفواً أسم الموظف طويل جداً',
            'passport_number.required'   => 'من فضلك رقم الجواز مطلوب',
            'passport_number.unique'     => 'عفواً يبدو ان الموظف موجود بـالفعل!',
            'passpor_start.required'     => 'من فضلك تاريخ إصدار الجواز مطلوب',
            'passpor_end.required'       => 'من فضلك تاريخ إنتهاء الجواز مطلوب',
            'dob.required'               => 'من فضلك تاريخ الميلاد مطلوب',
            'nationality.required'       => 'من فضلك الجنسية مطلوبة',
            'sex.required'               => 'من فضلك النوع مطلوب',
            'visa_start.required'        => 'من فضلك تاريخ إصدار التأشيرة مطلوب',
            'visa_end.required'          => 'من فضلك تاريخ إنتهاء التأشيرة مطلوب',
        ];
    }
}
