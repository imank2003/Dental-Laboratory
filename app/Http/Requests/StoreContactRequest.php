<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => [
                'bail',
                'required',
                'string',
                'max:255',
            ],

            'phone' => [
                'required',
                'string',
                'max:20',
            ],

            'email' => [
                'nullable',
                'email',
                'max:255',
            ],

            'subject' => [
                'required',
                'string',
                'max:255',
            ],

            'message' => [
                'required',
                'string',
                'max:2000',
            ],
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'نام و نام خانوادگی الزامی است.',
            'name.string' => 'نام و نام خانوادگی نامعتبر است.',
            'name.max' => 'نام و نام خانوادگی نباید بیشتر از ۲۵۵ کاراکتر باشد.',

            'phone.required' => 'شماره تلفن الزامی است.',
            'phone.string' => 'شماره تلفن نامعتبر است.',
            'phone.max' => 'شماره تلفن نباید بیشتر از ۲۰ کاراکتر باشد.',

            'email.email' => 'ایمیل وارد شده معتبر نیست.',
            'email.max' => 'ایمیل نباید بیشتر از ۲۵۵ کاراکتر باشد.',

            'subject.required' => 'موضوع پیام الزامی است.',
            'subject.string' => 'موضوع پیام نامعتبر است.',
            'subject.max' => 'موضوع پیام نباید بیشتر از ۲۵۵ کاراکتر باشد.',

            'message.required' => 'متن پیام الزامی است.',
            'message.string' => 'متن پیام نامعتبر است.',
            'message.max' => 'متن پیام نباید بیشتر از ۲۰۰۰ کاراکتر باشد.',
        ];
    }
}
