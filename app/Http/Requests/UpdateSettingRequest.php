<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateSettingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::user()->is_admin;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'phone' => [
                'required',
                'string',
                'max:20',
            ],

            'email' => [
                'required',
                'email',
                'max:255',
            ],

            'instagram' => [
                'nullable',
                'string',
                'max:255',
            ],

            'telegram' => [
                'nullable',
                'string',
                'max:255',
            ],

            'whatsapp' => [
                'nullable',
                'string',
                'max:20',
            ],

            'address' => [
                'required',
                'string',
                'max:1000',
            ],

            'logo' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp,svg',
                'max:5120',
            ],

            'footer_text' => [
                'nullable',
                'string',
                'max:500',
            ],
        ];
    }
    public function messages(): array
    {
        return [
            'phone.required' => 'شماره تلفن الزامی است.',
            'phone.string' => 'شماره تلفن نامعتبر است.',
            'phone.max' => 'شماره تلفن نباید بیشتر از ۲۰ کاراکتر باشد.',

            'email.required' => 'ایمیل الزامی است.',
            'email.email' => 'ایمیل وارد شده معتبر نیست.',
            'email.max' => 'ایمیل نباید بیشتر از ۲۵۵ کاراکتر باشد.',

            'instagram.string' => 'مقدار اینستاگرام نامعتبر است.',
            'instagram.max' => 'مقدار اینستاگرام نباید بیشتر از ۲۵۵ کاراکتر باشد.',

            'telegram.string' => 'مقدار تلگرام نامعتبر است.',
            'telegram.max' => 'مقدار تلگرام نباید بیشتر از ۲۵۵ کاراکتر باشد.',

            'whatsapp.string' => 'مقدار واتساپ نامعتبر است.',
            'whatsapp.max' => 'مقدار واتساپ نباید بیشتر از ۲۰ کاراکتر باشد.',

            'address.required' => 'آدرس الزامی است.',
            'address.string' => 'آدرس نامعتبر است.',
            'address.max' => 'آدرس نباید بیشتر از ۱۰۰۰ کاراکتر باشد.',

            'logo.image' => 'فایل انتخاب شده باید تصویر باشد.',
            'logo.mimes' => 'فرمت لوگو باید jpg، jpeg، png، webp یا svg باشد.',
            'logo.max' => 'حجم لوگو نباید بیشتر از ۲ مگابایت باشد.',

            'footer_text.string' => 'متن فوتر نامعتبر است.',
            'footer_text.max' => 'متن فوتر نباید بیشتر از ۵۰۰ کاراکتر باشد.',
        ];
    }
}
