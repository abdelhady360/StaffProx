<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class authority extends FormRequest
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
            'authority' => 'required|max:255|min:5|unique:authorities',
        ];
    }


    public function messages()
    {

        return [
            'authority.required' => 'من فضلك أسم الهيئة مطلوب',
            'authority.max' => ' عفواً أسم الهيئة طويل جداً ',
            'authority.min' => ' عفواً أسم الهيئة قصير جداً ',
            'authority.unique' => ' عفواً أسم الهيئة موجود بالفعل ',
        ];
    }
}
