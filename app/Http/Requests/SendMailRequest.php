<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SendMailRequest extends FormRequest
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
            'subject'=>'required',
            'email'=>'required|email',
            'message'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'وارد کردن نام اجباری است',
            'subject.required' => 'وارد کردن موضوع اجباری است',
            'email.required' => 'وارد کردن ایمیل اجباری است',
            'email.email' => 'ایمیل وارد شده نامعتبر است',
            'message' => 'وارد کردن پیام اجباری است',
        ];
    }
}
