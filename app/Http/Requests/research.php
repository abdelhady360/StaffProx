<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class research extends FormRequest
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
            'name'     => 'required|min:5|max:255',
            'emirate'  => 'required',
            'url'      => 'required',
            'info'     => 'required',
            'sinfo'    => 'required',
            'doc'      => 'required',
        ];
    }

    public function messages()
    {

        return [
            'name.required'     => 'عفواً أسم الإستعلام مطلوب',
            'name.min'          => 'عفواً أسم الإستعلام قصير جداً',
            'name.max'          => 'عفواً أسم الإستعلام طويل جداً',
            'emirate.required'  => 'عفواً الإمارة مطلوبة',
            'url.required'      => 'عفواً موقع الاستعلام مطلوب',
            'info.required'     => 'عفواً وصف الاستعلام مطلوب',
            'sinfo.required'    => 'عفواً خطوات الاستعلام مطلوبة',
            'doc.required'      => 'عفواً الوثائق مطلوبة',
        ];
    }
}
