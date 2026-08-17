<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreCommentRequest extends FormRequest
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
            'full_name' => [
                'bail',
                'required',
                'string',
                'max:255',
            ],

            'email' => [
                'required',
                'email',
                'max:255',
            ],

            'content' => [
                'required',
                'string',
                'min:5',
                'max:1000',
            ],
        ];
    }
    public function messages(): array
    {
        return [
            'full_name.required' => 'نام و نام خانوادگی الزامی است.',
            'full_name.string' => 'نام و نام خانوادگی نامعتبر است.',
            'full_name.max' => 'نام و نام خانوادگی نباید بیشتر از ۲۵۵ کاراکتر باشد.',

            'email.required' => 'ایمیل الزامی است.',
            'email.email' => 'ایمیل وارد شده معتبر نیست.',
            'email.max' => 'ایمیل نباید بیشتر از ۲۵۵ کاراکتر باشد.',

            'content.required' => 'متن دیدگاه الزامی است.',
            'content.string' => 'متن دیدگاه نامعتبر است.',
            'content.min' => 'متن دیدگاه باید حداقل ۵ کاراکتر باشد.',
            'content.max' => 'متن دیدگاه نباید بیشتر از ۱۰۰۰ کاراکتر باشد.',
        ];
    }
}
