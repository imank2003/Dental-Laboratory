

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
    
    
    <a href="{{ route('admin.time-slots.create') }}">create</a>
    
    
    <a href="{{ route('admin.dashboard') }}">بازگشت</a>
    
    <br>
    <br>
    <br>
    <br>
    @foreach ($timeSlots as $timeSlot )
    
    @if (session('success'))
    <div class="a;ert alert-succes">
        {{ session('success') }}
    </div>
    @endif

    
    <a href="{{ route('admin.time-slots.edit' , $timeSlot) }}">edit</a>
    
    
    <form action="{{ route('admin.time-slots.destroy', $timeSlot) }}"
          method="POST"
          class="d-inline">
    
        @csrf
        @method('DELETE')
    
        <button type="submit"
                class="btn btn-danger btn-sm"
                onclick="return confirm('آیا از حذف این بازه زمانی مطمئن هستید؟')">
            حذف
        </button>
    
    </form>
    
    <p>
        <tr>
            <td> <p>
                
                {{ $timeSlot->id }}
            </p>
            
        </td>
            
            <td> <p>
                
                {{ $timeSlot->start_time }}
            </p>
            
        </td>
        <td> <p>
            
            {{ $timeSlot->end_time }}
        </p>
        
    </td>
    
</tr>
</p>    
@endforeach
{{ $timeSlots->links() }}




</body>
</html>