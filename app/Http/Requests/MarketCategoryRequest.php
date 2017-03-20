<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MarketCategoryRequest extends FormRequest
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
            /*
             * قوانین اعمالی بر فرم ساخت و ادیت
             */
            'name'=>'required'
        ];
    }

    public function messages()
    {
        return [
            /*
             * پیام لازم
             */
            'name.required' => 'وارد کردن دسته بندی فروشگاه اجباری است',
        ];
    }
}
