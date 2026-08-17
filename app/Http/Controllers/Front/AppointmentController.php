<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAppointmentRequest;
use App\Http\Requests\UpdateAppointmentRequest;
use App\Models\Appointment;
use App\Models\TimeSlot;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $timeSlots = TimeSlot::orderBy('start_time')->get();
        return view('front.appointments.index', compact('timeSlots'));
    }
        public function getAvailableTimeSlots(Request $request)
    {
      
        $request->validate([
            'appointment_date' => ['required', 'date'],
        ]);

        $reservedSlots = Appointment::whereDate(
            'appointment_date',
            $request->appointment_date
        )->pluck('time_slot_id');

        $timeSlots = TimeSlot::whereNotIn('id', $reservedSlots)
            ->orderBy('start_time')
            ->get();
        return response()->json($timeSlots);
    }




    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'appointment_date' => ['required', 'date', 'after_or_equal:today'],
            'time_slot_id'      => ['required', 'exists:time_slots,id'],
            'full_name'         => ['required', 'string', 'max:255'],
            'phone'             => ['required', 'string', 'max:20'],
            'email'             => ['nullable', 'email', 'max:255'],
            'description'       => ['nullable', 'string'],
        ]);

        $exists = Appointment::whereDate('appointment_date', $validated['appointment_date'])
            ->where('time_slot_id', $validated['time_slot_id'])
            ->exists();
       
        if ($exists) {
            return back()
                ->withErrors([
                    'time_slot_id' => 'این بازه زمانی قبلاً رزرو شده است.',
                ])
                ->withInput();
        }

        Appointment::create($validated);

        return redirect()
            ->route('appointments.index')
            ->with('success', 'رزرو شما با موفقیت ثبت شد.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Appointment $appointment) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Appointment $appointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAppointmentRequest $request, Appointment $appointment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Appointment $appointment)
    {
        //
    }
}
