<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StorePortfolioRequest extends FormRequest
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

            'service_id' => [
                'required',
                'exists:services,id',
            ],

            'image' => [
                'required',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:5120',
            ],

            'video' => [
                'nullable',
                'file',
                'mimes:mp4,mov,avi,webm',
                'max:20480',
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

            'is_published' => [
                'sometimes',
                'boolean',
            ],

        ];
    }
    public function messages(): array
    {
        return [
            'title.required' => 'عنوان نمونه کار الزامی است.',
            'title.string' => 'عنوان نمونه کار نامعتبر است.',
            'title.max' => 'عنوان نمونه کار نباید بیشتر از ۲۵۵ کاراکتر باشد.',

            'service_id.required' => 'انتخاب خدمت الزامی است.',
            'service_id.exists' => 'خدمت انتخاب شده معتبر نیست.',

            'image.required' => 'تصویر نمونه کار الزامی است.',
            'image.image' => 'فایل انتخاب شده باید تصویر باشد.',
            'image.mimes' => 'فرمت تصویر باید jpg، jpeg، png یا webp باشد.',
            'image.max' => 'حجم تصویر نباید بیشتر از ۵ مگابایت باشد.',

            'video.file' => 'فایل ویدئو معتبر نیست.',
            'video.mimes' => 'فرمت ویدئو باید mp4، mov، avi یا webm باشد.',
            'video.max' => 'حجم ویدئو نباید بیشتر از ۲۰ مگابایت باشد.',

            'short_description.required' => 'توضیح کوتاه الزامی است.',
            'short_description.string' => 'توضیح کوتاه نامعتبر است.',
            'short_description.max' => 'توضیح کوتاه نباید بیشتر از ۵۰۰ کاراکتر باشد.',

            'description.required' => 'توضیحات کامل الزامی است.',
            'description.string' => 'توضیحات کامل نامعتبر است.',

            'is_published.boolean' => 'وضعیت انتشار نامعتبر است.',
        ];
    }
}
