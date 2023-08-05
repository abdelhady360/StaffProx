<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanieName extends FormRequest
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
            'name' => 'required|max:30|min:3|unique:companies',

        ];
    }

    public function messages()
    {

        return [
            'name.required' => 'من فضلك أسم الشركة مطلوب',
            'name.max' => ' عفواً أسم الشركة طويل جداً ',
            'name.min' => ' عفواً أسم الشركة قصير جداً ',
            'name.unique' => ' عفواً أسم الشركة موجود بالفعل ',
        ];
    }
}
