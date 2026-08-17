<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTimeSlotRequest;
use App\Http\Requests\UpdateTimeSlotRequest;
use App\Models\TimeSlot;

class TimeSlotController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $timeSlots = TimeSlot::orderBy('start_time')->paginate(10);
        return view('admin.time-slots.index', compact('timeSlots'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.time-slots.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTimeSlotRequest $request)
    {
        TimeSlot::create($request->validated());

        return redirect()
            ->route('admin.time-slots.index')
            ->with('success', 'بازه زمانی با موفقیت ایجاد شد.');
    }

    /**
     * Display the specified resource.
     */
    public function show(TimeSlot $timeSlot)
    {
      
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TimeSlot $timeSlot)
    {
        return view('admin.time-slots.edit', compact('timeSlot'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTimeSlotRequest $request, TimeSlot $timeSlot)
    {
        $timeSlot->update($request->validated());

        return redirect()
            ->route('admin.time-slots.index')
            ->with('success', 'بازه زمانی با موفقیت بروزرسانی شد.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TimeSlot $timeSlot)
    {

        // اگر این بازه زمانی رزرو دارد، حذف نشود.
        if ($timeSlot->appointments()->exists()) {
            return redirect()
                ->route('admin.time-slots.index')
                ->with('error', 'این بازه زمانی دارای رزرو است و قابل حذف نیست.');
        }

        $timeSlot->delete();

        return redirect()
            ->route('admin.time-slots.index')
            ->with('success', 'بازه زمانی با موفقیت حذف شد.');
    }
}
