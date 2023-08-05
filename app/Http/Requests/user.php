<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class user extends FormRequest
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
            //   'username' => 'required',
            //          'email' => 'required|email|unique:users,email,',
            'password' => 'required|min:5|max:20',
            'confirm-password' => 'required|min:5|max:20|same:password',
        ];
    }

    public function messages()
    {

        return [

            'password.required'           => ' لا تنسي كلمة المرور الجديدة',
            'password.min'                => 'يجب أن تتكون كلمة المرور من 6 احرف او ارقام او رموز',
            'password.max'                => 'عفوا اقصي حد لكلمة المرور 20 حرف او ارقم او رموز',
            'confirm-password.required'   => 'ايضاً لا تنسي تأكيد كلمة المرور',
            'confirm-password.min'        => 'يجب أن تتكون كلمة المرور من 6 احرف او ارقام او رموز',
            'confirm-password.max'        => 'عفوا اقصي حد لكلمة المرور 20 حرف او ارقم او رموز',
            'confirm-password.same'       => 'كلمة المرور غير متطابقة',


        ];
    }
}
