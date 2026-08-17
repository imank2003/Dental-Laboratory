<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateTimeSlotRequest extends FormRequest
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
            'start_time' => ['required', 'date_format:H:i', 'before:end_time'],
            'end_time' => ['required', 'date_format:H:i', 'after:start_time'],

        ];
    }
    public function messages(): array
    {
        return [
            'start_time.required' => 'ساعت شروع الزامی است.',
            'start_time.date_format' => 'فرمت ساعت شروع معتبر نیست.',
            'start_time.before' => 'ساعت شروع باید قبل از ساعت پایان باشد.',

            'end_time.required' => 'ساعت پایان الزامی است.',
            'end_time.date_format' => 'فرمت ساعت پایان معتبر نیست.',
            'end_time.after' => 'ساعت پایان باید بعد از ساعت شروع باشد.',
        ];
    }
}
