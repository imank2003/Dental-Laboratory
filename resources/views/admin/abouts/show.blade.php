
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

@if ($about)
    {{ route('admin.abouts.index') }}
@endif
    <a href="{{ route('admin.abouts.index') }}">
        بازگشت
    </a>

    <form action="{{ route('admin.abouts.destroy', $about) }}" method="POST">
    @csrf
    @method('DELETE')

    <button type="submit" class="btn btn-danger">
        حذف
    </button>
</form>
<p>
    <tr>
        <td> <p>
            
            {{ $about?->id }}
        </p>
        
    </td>
        <td> <p>
            
            {{ $about?->title }}
        </p>
        
    </td>
    <td>
        <p>
            
            {{ $about?->short_description }}
        </p>
    </td>
    <td>
        <p>
            
            {{ $about?->description }}
        </p>
    </td>
      <td>
        <p>
            
            @if ($about->image)
            <img src="{{ asset('storage/' . $about->image) }}" alt="About Image">
                
            @endif
        </p>
    </td>
      <td>
        <p>
            @if ($about->image)
            <video width="500" controls>
                <source src="{{ asset('storage/' . $about->video) }}" alt="About Image">>
            </video>
            @endif
        
        </p>
    </td>
      <td>
        <p>

                        @if ($about->is_published)
             published
                @else
             none
            @endif
        </p>
    </td>
</tr>
</p>


</body>
</html>