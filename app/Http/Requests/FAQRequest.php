<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FAQRequest extends FormRequest
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
             * قوانین اعمال شده روی فلید های ساخت یا ادیت faq
             */
            'question' => 'required',//لزوم مقدار داشتن
            'answer' => 'required',
        ];
    }

    public function messages()
    {
        return [
            /*
             *تابع مسیج های لازم
             */
            'question.required' => 'وارد کردن سوال اجباری است',
            'answer.required' => 'وارد کردن جواب اجباری است',
        ];
    }
}
