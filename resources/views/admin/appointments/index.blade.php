

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
    <h2> Dental Lablatory</h2>    
    
    
    <a href="{{ route('admin.dashboard') }}">بازگشت</a>
    
    <br>
    @if ($appointments)
        null
    @endif
    
    
    @foreach ($appointments as $appointment )
    
    @if (session('success'))
    <div class="a;ert alert-succes">
        {{ session('success') }}
    </div>
    @endif
    
    <a href="{{ route('admin.appointments.edit' , $appointment) }}">edit</a>
    <a href="{{ route('admin.appointments.show' , $appointment) }}">show</a>
    <form action="{{ route('admin.appointments.destroy', $appointment) }}"
    method="POST"
    class="d-inline">
    
    @csrf
    @method('DELETE')
    
    <button type="submit"
    class="btn btn-danger btn-sm"
    onclick="return confirm('آیا از حذف این رزرو مطمئن هستید؟')">
    حذف
</button>

</form>


<p>
    <tr>
        <td> <p>
            
            {{ $appointment->id }}
        </p>
        
    </td>
    <td> <p>
        
        {{ $appointment->full_name }}
    </p>
    
</td>
<td>
    <p>
        
        {{ $appointment->appointment_date }}
    </p>
</td>
<td>
    <p>
        
        {{ $appointment->timeSlot->start_time }}
    </p>
</td>
<td>
    <p>
        
        {{ $appointment->timeSlot->end_time }}
    </p>
</td>
<td>
    <p>
        
        {{ $appointment->phone }}
    </p>
</td>
<td>
    <p>
        
        {{ $appointment['email'] ?? '-' }}
    </p>
</td>
<td>
    <p>
        
        {{ $appointment->description }}
        
        
    </p>
</td>
</tr>
</p>    
@endforeach
{{ $appointments->links() }}



</body>
</html>