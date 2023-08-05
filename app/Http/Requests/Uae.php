<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Uae extends FormRequest
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
            'uae' => 'required|max:30|min:3|unique:uaes',
        ];
    }


    public function messages()
    {

        return [
            'uae.required'      => 'من فضلك اسم الإمارة مطلوب',
            'uae.max'           => ' عفواً اسم الإمارة طويل جداً ',
            'uae.min'           => ' عفواً اسم الإمارة قصير جداً ',
            'uae.unique'        => ' عفواً اسم الإمارة موجود بالفعل ',
        ];
    }

}
