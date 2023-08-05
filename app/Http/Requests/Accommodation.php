<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use function Symfony\Component\Translation\t;

class Accommodation extends FormRequest
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
            'name'                        => 'required|max:255|min:5',
            'passport_number'             => 'required|unique:accommodations',
            'id_number'                   => 'required|numeric|unique:accommodations',
            'unified_no'                  => 'required|numeric|unique:accommodations',
            'passpor_start'               => 'required',
            'passpor_end'                 => 'required',
            'dob'                         => 'required',
            'nationality'                 => 'required',
            'sex'                         => 'required',
            'accommodation_start'         => 'required',
            'accommodation_end'           => 'required',
            'PermitWork_start'            => 'required',
            'PermitWork_end'              => 'required',

        ];
    }

    public function messages()
    {

        return [
            'name.required'                       => 'من فضلك أسم الموظف مطلوب',
            'name.min'                            => 'عفواً أسم الموظف قصير جداً',
            'name.max'                            => 'عفواً أسم الموظف طويل جدا',
            'passport_number.required'            => 'من فضلك رقم الجواز مطلوب',
            'passport_number.unique'              => 'عفواً يبدو ان الموظف موجود بـالفعل!',
            'id_number.required'                  => 'من فضلك رقم الهوية مطلوب',
            'id_number.numeric'                   => 'من فضلك يجب ان يكون رقم الهوية أرقام فقط',
            'id_number.unique'                    => 'عفواً يبدو ان الموظف موجود بـالفعل!',
            'passpor_start.required'              => 'من فضلك تاريخ إصدار الجواز مطلوب',
            'passpor_end.required'                => 'من فضلك تاريخ إنتهاء الجواز مطلوب',
            'dob.required'                        => 'من فضلك تاريخ الميلاد مطلوب',
            'nationality.required'                => 'من فضلك الجنسية مطلوبة',
            'sex.required'                        => 'من فضلك النوع مطلوب',
            'accommodation_start.required'        => 'من فضلك تاريخ إصدار الإقامة مطلوب',
            'accommodation_end.required'          => 'من فضلك تاريخ إنتهاء الإقامة مطلوب',

            'unified_no.required'                  => 'من فضلك الرقم الموحد مطلوب',
            'unified_no.numeric'                   => 'من فضلك يجب ان يكون الرقم الموحد أرقام فقط',
            'unified_no.unique'                    => 'عفواً يبدو ان الموظف موجود بـالفعل!',

            'PermitWork_start.required'           => 'من فضلك تاريخ إصدار تصريح العمل مطلوب',
            'PermitWork_end.required'             => 'من فضلك تاريخ إنتهاء تصريح العمل مطلوب',
        ];
    }
}
