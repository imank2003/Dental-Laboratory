<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreAppointmentRequest extends FormRequest
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
            'appointment_date' => [
                'bail',
                'required',
                'date',
                'after_or_equal:today',
            ],

            'full_name' => [
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

            'description' => [
                'nullable',
                'string',
                'max:1000',
            ],

            'time_slot_id' => [
                'required',
                'exists:time_slots,id',
                Rule::unique('appointments')->where(function ($query) {
                    return $query->where('appointment_date', $this->appointment_date);
                })
            ],
        ];
    }
    public function messages(): array
    {
        return [
            'appointment_date.required' => 'تاریخ رزرو الزامی است.',
            'appointment_date.date' => 'تاریخ رزرو معتبر نیست.',
            'appointment_date.after_or_equal' => 'تاریخ رزرو نمی‌تواند قبل از امروز باشد.',

            'full_name.required' => 'نام و نام خانوادگی الزامی است.',
            'full_name.string' => 'نام و نام خانوادگی نامعتبر است.',
            'full_name.max' => 'نام و نام خانوادگی نباید بیشتر از ۲۵۵ کاراکتر باشد.',

            'phone.required' => 'شماره تلفن الزامی است.',
            'phone.string' => 'شماره تلفن نامعتبر است.',
            'phone.max' => 'شماره تلفن نباید بیشتر از ۲۰ کاراکتر باشد.',

            'email.email' => 'ایمیل وارد شده معتبر نیست.',
            'email.max' => 'ایمیل نباید بیشتر از ۲۵۵ کاراکتر باشد.',

            'description.string' => 'توضیحات نامعتبر است.',
            'description.max' => 'توضیحات نباید بیشتر از ۱۰۰۰ کاراکتر باشد.',

            'time_slot_id.required' => 'انتخاب بازه زمانی الزامی است.',
            'time_slot_id.exists' => 'بازه زمانی انتخاب شده معتبر نیست.',
        ];
    }
}
