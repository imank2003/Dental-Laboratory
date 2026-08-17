<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAppointmentRequest;
use App\Http\Requests\UpdateAppointmentRequest;
use App\Models\Appointment;
use App\Models\TimeSlot;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $appointments = Appointment::with('timeSlot')->latest()->paginate(10);
        return view('admin.appointments.index', compact('appointments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAppointmentRequest $request) {}

    /**
     * Display the specified resource.
     */
    public function show(Appointment $appointment)
    {
        // لود اطلاعات زمانی هم همراه رزرو میگیرد
        $appointment->load('timeSlot');

        return view('admin.appointments.show', compact('appointment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Appointment $appointment)
    {
            $timeSlots = TimeSlot::all();

        return view('admin.appointments.edit', compact('appointment', 'timeSlots'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAppointmentRequest $request, Appointment $appointment)
    {
             $appointment->update($request->validated());

        return redirect()
            ->route('admin.appointments.index')
            ->with('success', 'رزرو با موفقیت بروزرسانی شد.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Appointment $appointment)
    {
      $appointment->delete();

        return redirect()
            ->route('admin.appointments.index')
            ->with('success', 'رزرو با موفقیت حذف شد.');
    }
}
