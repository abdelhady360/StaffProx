<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class companie extends FormRequest
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
            'name' => 'required|min:5|max:255',
            'license_start' => 'required',
            'license_end' => 'required',
            'icp_start' => 'required',
            'icp_end' => 'required',
            'no_facility' => 'required',
            'emirate' => 'required',
            'insurance_end' => 'required',
            'license_number'=> 'required|numeric',
            'phone_number' => 'required|numeric',
            'email' => 'required|email',
            'address' => 'required|min:5|max:255',
        ];
    }

    public function messages()
    {

        return [
            'name.required'            => 'من فضلك أسم الشركة مطلوب',
            'name.min'                 => 'عفواً أسم الشركة قصير جداً',
            'name.max'                 => 'عفواً أسم الشركة طويل جداً ',
            'license_start.required'   => 'من فضلك تاريخ الرخصة مطلوب',
            'license_end.required'     => 'من فضلك تاريخ إنتهاء الرخصة مطلوب',
            'icp_start.required'       => 'من فضلك تاريخ إشتراك أكونت ICP مطلوب',
            'icp_end.required'         => 'من فضلك تاريخ إنتهاء أكونت ICP مطلوب',
            'no_facility.required'     => 'من فضلك الشكل القانوني مطلوب',
            'emirate.required'         => 'من فضلك الإمارة مطلوبة',
            'insurance_end.required'   => 'من فضلك تاريخ إنتهاء التأمين مطلوب',
            'license_number.required'  => 'من فضلك رقم الرخصة مطلوب',
            'license_number.numeric'   => 'من فضلك يجب ان يكون رقم الرخصه أرقام فقط',
            'phone_number.required'    => 'من فضلك رقم الهاتف مطلوب',
            'phone_number.numeric'     => 'من فضلك يجب ان يكون رقم الهاتف أرقام فقط',
            'email.required'           => 'من فضلك Email مطلوب',
            'email.email'              => 'من فضلك يجب كتابة Email بشكل صحيح',
            'address.required'         => 'من فضلك العنوان مطلوب',
            'address.min'              => 'عفواً العنوان قصير جداً',
            'address.max'              => 'عفواً العنوان طويل جداً',
        ];
    }
}
