<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateServiceRequest extends FormRequest
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
            'title' => [
                'bail',
                'required',
                'string',
                'max:255',
            ],

            'short_description' => [
                'required',
                'string',
                'max:500',
            ],

            'description' => [
                'required',
                'string',
            ],

            'image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:5120',
            ],

            'is_published' => [
                'sometimes',
                'boolean',
            ],

        ];
    }
    public function messages(): array
    {
        return [
            'title.required' => 'عنوان خدمت الزامی است.',
            'title.string' => 'عنوان خدمت نامعتبر است.',
            'title.max' => 'عنوان خدمت نباید بیشتر از ۲۵۵ کاراکتر باشد.',

            'short_description.required' => 'توضیح کوتاه الزامی است.',
            'short_description.string' => 'توضیح کوتاه نامعتبر است.',
            'short_description.max' => 'توضیح کوتاه نباید بیشتر از ۵۰۰ کاراکتر باشد.',

            'description.required' => 'توضیحات کامل الزامی است.',
            'description.string' => 'توضیحات کامل نامعتبر است.',

            'image.image' => 'فایل انتخاب شده باید تصویر باشد.',
            'image.mimes' => 'فرمت تصویر باید jpg، jpeg، png یا webp باشد.',
            'image.max' => 'حجم تصویر نباید بیشتر از ۵ مگابایت باشد.',

            'is_published.boolean' => 'وضعیت انتشار نامعتبر است.',
        ];
    }
}
