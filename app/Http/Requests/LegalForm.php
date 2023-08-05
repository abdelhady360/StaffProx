<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LegalForm extends FormRequest
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
            'name' => 'required|max:30|min:3|unique:legal_forms',
        ];
    }


    public function messages()
    {

        return [
            'name.required'   => 'من فضلك الشكل القانوني مطلوب',
            'name.max'        => ' عفواً الشكل القانوني طويل جداً ',
            'name.min'        => ' عفواً الشكل القانوني قصير جداً ',
            'name.unique'     => ' عفواً الشكل القانوني موجود بالفعل ',
        ];
    }
}
