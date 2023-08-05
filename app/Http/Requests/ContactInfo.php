<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactInfo extends FormRequest
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
            'phone_number'   => 'required|numeric',
            'email'          => 'required|email',
            'address'        => 'required',
        ];
    }


    public function messages()
    {

        return [
            'phone_number.required'      => 'من فضلك رقم الهاتف مطلوب',
            'phone_number.numeric'       => 'من فضلك رقم الهاتف يجب ان يكون ارقام فقط',
            'email.required'             => 'من فضلك البريد الالكتروني مطلوب',
            'email.email'                => 'من فضلك البريد الالكتروني يجب ان يكون صحيح',
            'address.required'           => 'من فضلك العنوان مطلوب',

        ];
    }
}
