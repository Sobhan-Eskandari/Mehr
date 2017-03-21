<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class categoryRequest extends FormRequest
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
            'name'=>'required'
        ];
    }

    /**
     * translation of the shown errors in case of any
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'وارد کردن دسته بندی سیستمی اجباری است',
        ];
    }
}
