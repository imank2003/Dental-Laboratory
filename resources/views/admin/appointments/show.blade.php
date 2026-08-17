<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    

    





<div class="container">

    <div class="card">

        <div class="card-header">
            <h4>جزئیات رزرو</h4>
        </div>

        <div class="card-body">

            <div class="mb-3">
                <strong>نام و نام خانوادگی:</strong>
                <p>{{ $appointment->full_name }}</p>
            </div>

            <div class="mb-3">
                <strong>شماره تماس:</strong>
                <p>{{ $appointment->phone }}</p>
            </div>

            <div class="mb-3">
                <strong>ایمیل:</strong>
                <p>{{ $appointment->email ?? '-' }}</p>
            </div>

            <div class="mb-3">
                <strong>تاریخ رزرو:</strong>
                <p>{{ $appointment->appointment_date }}</p>
            </div>

            <div class="mb-3">
                <strong>ساعت رزرو:</strong>
                <p>
                    {{ $appointment->timeSlot->start_time }}
                    -
                    {{ $appointment->timeSlot->end_time }}
                </p>
            </div>

            <div class="mb-3">
                <strong>توضیحات:</strong>
                <p>{{ $appointment->description ?? 'ندارد' }}</p>
            </div>

            <a href="{{ route('admin.appointments.index') }}"
               class="btn btn-secondary">
                بازگشت
            </a>

       

        </div>

    </div>

</div>




</body>
</html>