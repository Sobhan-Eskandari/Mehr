<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminCreateRequest extends FormRequest
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
            'first_name'=>'required',
            'last_name'=>'required',//یعنی لازم است
            'social_security_number'=>'required|digits:10|unique:admins,social_security_number',//باید ۱۰ رقم باشد و نمی تواند تکراری باشد
            'education'=>'nullable',//میتواند مقدار Null داشته باشد یعنی مقدار وارد نشود
            'occupation'=>'nullable',
            'state'=>'required',
            'city'=>'required',
            'address'=>'required',
            'zip'=>'nullable|unique:admins,zip|digits:10',//zip:باید از نوع فایل zip‌باشد
            'home_tel'=>'nullable|digits:11',
            'work_tel'=>'nullable|digits:11',
            'emergency_tel'=>'nullable|digits:11',
            'cell_1'=>'required|digits:11|unique:admins,cell_1',
            'cell_2'=>'nullable|digits:11|unique:admins,cell_2',
            'email'=>'required|email|unique:admins,email',//email:باید eamil باشد
            'password'=>'required|min:6|confirmed',
            'password_confirmation'=>'required|min:6',
            /*
             * در این تابع بر اساس نام هر فیلد در فرم ساخت یا ادیت ادمین قوانین لازم برای ان فیلد را تعیین میکنیم
             */
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            /*
             * در این تابع پیام ها ی اعتبار سنجی را مناسب با زبان مورد نظر تعیین میکنیم
             */
            'first_name.required' => 'وارد کردن نام اجباری است',
            'last_name.required'  => 'وارد کردن نام خانوادگی اجباری است',
            'social_security_number.required' => 'وارد کردن کد ملی اجباری است',
            'social_security_number.unique' => 'کد ملی وارد شده قبلا در سیستم ثبت شده است',
            'social_security_number.digits' => 'کد ملی باید ده رقم باشد',
            'state.required' => 'وارد کردن استان اجباری است',
            'city.required' => 'وارد کردن شهر اجباری است',
            'address.required' => 'وارد کردن آدرس اجباری است',
            'zip.unique' => 'کد پستی وارد شده قبلا در سیستم ثبت شده است',
            'zip.digits' => 'کد پستی باید ده رقم باشد',
            'home_tel.digits' => 'تلفن منزل باید یازده رقم باشد',
            'work_tel.digits' => 'تلفن محل کار باید یازده رقم باشد',
            'emergency_tel.digits' => 'تلفن ضروری باید یازده رقم باشد',
            'cell_1.required' => 'وارد کردن شماره موبایل 1 الزامی است',
            'cell_1.digits' => 'شماره موبایل 1 باید یازده رقم باشد',
            'cell_1.unique' => 'شماره موبایل 1 وارد شده قبلا در سیستم ثبت شده است',
            'cell_2.digits' => 'شماره موبایل 2 باید یازده رقم باشد',
            'cell_2.unique' => 'شماره موبایل 2 وارد شده قبلا در سیستم ثبت شده است',
            'email.required' => 'وارد کردن ایمیل اجباری است',
            'email.email' => 'ایمیل وارد شده نامعتبر است',
            'email.unique' => 'ایمیل وارد شده قبل در سیستم ثبت شده است',
            'password.required' => 'وارد کردن رمز عبور اجباری است',
            'password.min' => 'رمز عبور باید حداقل شش رقم باشد',
            'password.confirmed' => 'رمز عبور وارد شده با تأیید رمز عبور همخوانی ندارد',
            'password_confirmation.required' => 'وارد کردن تأیید رمز عبور اجباری است',
        ];
    }
}
