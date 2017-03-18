<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Tariff2Request extends FormRequest
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
            'name'=>'required',
            'cost'=>'required',
            'tariff'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'وارد کردن نام تعرفه اجباری است',
            'cost.required' => 'وارد کردن قیمت اجباری است',
            'tariff.required' => 'وارد کردن تعرفه اجباری است',
        ];
    }
}
