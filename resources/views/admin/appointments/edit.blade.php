<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>


    <a href="{{ route('admin.appointments.index') }}">بازگشت</a>
    


<div class="container">

    <h3 class="mb-4">ویرایش رزرو</h3>

    <form action="{{ route('admin.appointments.update', $appointment) }}"
          method="POST">

        @csrf
        @method('PUT')

        {{-- نام و نام خانوادگی --}}
        <div class="mb-3">
            <label class="form-label">نام و نام خانوادگی</label>

            <input type="text"
                   name="full_name"
                   class="form-control @error('full_name') is-invalid @enderror"
                   value="{{ old('full_name', $appointment->full_name) }}">

            @error('full_name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- شماره تماس --}}
        <div class="mb-3">
            <label class="form-label">شماره تماس</label>

            <input type="text"
                   name="phone"
                   class="form-control @error('phone') is-invalid @enderror"
                   value="{{ old('phone', $appointment->phone) }}">

            @error('phone')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- ایمیل --}}
        <div class="mb-3">
            <label class="form-label">ایمیل</label>

            <input type="email"
                   name="email"
                   class="form-control @error('email') is-invalid @enderror"
                   value="{{ old('email', $appointment->email) }}">

            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- تاریخ رزرو --}}
        <div class="mb-3">
            <label class="form-label">تاریخ رزرو</label>

            <input type="date"
                   name="appointment_date"
                   class="form-control @error('appointment_date') is-invalid @enderror"
                   value="{{ old('appointment_date', $appointment->appointment_date) }}">

            @error('appointment_date')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- بازه زمانی --}}
        <div class="mb-3">
            <label class="form-label">بازه زمانی</label>

            <select name="time_slot_id"
                    class="form-select @error('time_slot_id') is-invalid @enderror">

                @foreach($timeSlots as $timeSlot)

                    <option value="{{ $timeSlot->id }}"
                        {{ old('time_slot_id', $appointment->time_slot_id) == $timeSlot->id ? 'selected' : '' }}>

                        {{ $timeSlot->start_time }}
                        -
                        {{ $timeSlot->end_time }}

                    </option>

                @endforeach

            </select>

            @error('time_slot_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- توضیحات --}}
        <div class="mb-3">
            <label class="form-label">توضیحات</label>

            <textarea name="description"
                      rows="5"
                      class="form-control @error('description') is-invalid @enderror">{{ old('description', $appointment->description) }}</textarea>

            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">
            بروزرسانی
        </button>

        <a href="{{ route('admin.appointments.index') }}"
           class="btn btn-secondary">
            انصراف
        </a>

    </form>

</div>



    
    
</body>
</html>