
                <h2> Dental Lablatory</h2>



<a href="{{ route('admin.articles.create') }}">create</a>
<a href="{{ route('admin.dashboard') }}">بازگشت</a>
<br>
<br>

@foreach ($articles as $article )

<a href="{{ route('admin.articles.show' , $article) }}">show</a>
<a href="{{ route('admin.articles.edit' , $article) }}">edit</a>

<form action="{{ route('admin.articles.destroy', $article) }}"
      method="POST"
      class="d-inline">

    @csrf
    @method('DELETE')

    <button type="submit"
            class="btn btn-danger btn-sm"
            onclick="return confirm('آیا از حذف این مقاله مطمئن هستید؟')">
        حذف
    </button>

</form>

<p>
    <tr>
        <td> <p>
            
            {{ $article->id }}
        </p>
        
    </td>
        <td> <p>
            
            {{ $article->title }}
        </p>
        
    </td>
      <td>
        <p>
            
            {{ $article->image }}
        </p>
    </td>
    <td>
    <td>
        <p>
            
            {{ $article->short_description }}
        </p>
    </td>
    <td>
        <p>
            
            {{ $article->description }}
        </p>
    </td>
    <p>
        
  <td>
        <p>
            
            {{ $article->slug }}
        </p>
    </td>
    <td>

        @foreach ($article->tags as  $tag)
        <span>
            {{ $tag->title }}
        </span>
        @endforeach
    </p>
@if ($article->is_published)
    Published
    @else
    Draft
@endif

</tr>
</p>    
@endforeach
{{ $articles->links() }}

