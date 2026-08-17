<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    /** @use HasFactory<\Database\Factories\AppointmentFactory> */
    use HasFactory;

    protected $fillable = [
        'appointment_date',
        'full_name',
        'phone',
        'email',
        'description',
        'time_slot_id',
    ];

    public function timeSlot()
    {
        return $this->belongsTo(TimeSlot::class);
    }

    protected function casts(): array
    {
        return [
            'appointment_date' => 'date',
        ];
    }
protected function appointmentDate(): Attribute
    {
        return Attribute::make(
            get: fn($value) => substr($value, 0, 10),
        );
    }
}
