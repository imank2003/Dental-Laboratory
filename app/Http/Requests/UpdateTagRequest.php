<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;


class UpdateTagRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255', 'unique:tags,name'],
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'نام تگ الزامی است.',
            'name.string' => 'نام تگ باید متن باشد.',
            'name.max' => 'نام تگ نباید بیشتر از ۲۵۵ کاراکتر باشد.',
            'name.unique' => 'این نام تگ قبلاً ثبت شده است.',

        ];
    }
}
