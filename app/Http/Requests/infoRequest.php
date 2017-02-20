<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class infoRequest extends FormRequest
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
            'address'=>'required',
            'contact_tel'=>'required|digits:11',
            'telegram'=>'nullable',
            'instagram'=>'nullable',
            'photo_1'=>'nullable|image',
            'photo_2'=>'nullable|image',
            'photo_3'=>'nullable|image',
        ];
    }

    public function messages()
    {
        return [
            'address.required' => 'وارد کردن نشانی اجباری است',
            'contact_tel.required'  => 'وارد کردن شماره تلفن اجباری است',
            'contact_tel.digits' => 'شماره تلفن باید یازده رقم باشد',
            'photo_1.image' => 'فایل شماره 1 تصویر نیست',
            'photo_2.image' => 'فایل شماره 2 تصویر نیست',
            'photo_3.image' => 'فایل شماره 3 تصویر نیست',
        ];
    }
}
