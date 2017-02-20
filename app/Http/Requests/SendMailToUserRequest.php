<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SendMailToUserRequest extends FormRequest
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
            'subject'=>'required',
            'email'=>'required|email',
            'message'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'subject.required' => 'وارد کردن موضوع اجباری است',
            'email.email' => 'ایمیل وارد شده نامعتبر است',
            'email.required' => 'وارد کردن ایمیل اجباری است',
            'message.required' => 'وارد کردن پیام اجباری است',
        ];
    }
}
