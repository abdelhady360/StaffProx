<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Transactions extends FormRequest
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
            'lfees' => 'required|numeric',
            'ofees' => 'required|numeric',
            'url' => 'required|url',
            'emirate' => 'required',
            'authority'=>'required',
            'info' => 'required',
            'sinfo' => 'required',
            'note' => 'required',
            'doc' => 'required',
        ];
    }


    public function messages()
    {

        return [
            'name.required'             => 'من فضلك أسم الخدمة مطلوب',
            'name.min'                  => 'من فضلك أسم الخدمة قصير جداً',
            'name.max'                  => 'من فضلك أسم الخدمة طويل جداً',
//            'name.unique'               => 'عفواُ الخدمة موجودة',
            'lfees.required'            => 'من فضلك رسوم حكومية مطلوبة',
            'lfees.numeric'             => 'من فضلك رسوم الحكومية يجب ان تكون أرقام فقط',
            'ofees.required'            => 'من فضلك رسوم المكتب مطلوبة',
            'ofees.numeric'             => 'من فضلك رسوم المكتب يجب ان تكون أرقام فقط',
            'emirate.required'          => 'من فضلك الإمارة مطلوبة',
            'authority.required'        => 'من فضلك الهيئة مطلوبة',
            'url.required'              => 'من فضلك موقع المعاملة مطلوب',
            'url.url'                   => 'من فضلك اضف عنوان موقع الخدمة بشكل صحيح',
            'info.required'             => 'من فضلك وصف الخدمة مطلوب',
            'sinfo.required'            => 'هن فضلك خطوات للخدمة مطلوبة',
            'note.required'             => 'من فضلك ملاحظات الخدمة مطلوبة',
            'doc.required'              => 'من فضلك المستندات مطلوبة',
        ];
    }
}
