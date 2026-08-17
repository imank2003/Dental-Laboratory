 <h2>مدیریت کامنت‌ها</h2>
  
 <a href="{{ route('admin.dashboard') }}">بازگشت</a>
 
 
 @if(session('success'))
   <div class="alert alert-success">
     {{ session('success') }} 
    </div>
     @endif
     <table class="table table-bordered">
         <thead> 
            <tr>
                 <th>#</th>
                  <th>نام</th>
                   <th>ایمیل</th>
                    <th>متن کامنت</th>
                     <th>وضعیت</th>
                      <th>عملیات</th>
                     </tr>
 </thead>
      <tbody>
@forelse($comments as $comment) 
 <tr> <td>
    {{ $loop->iteration }}
    </td> <td>
        {{ $comment->full_name }}
    </td> <td>
        {{ $comment->email }}
    </td> <td>
        {{ Str::limit($comment->content, 50) }}
    </td> <td>
         @if($comment->is_approved) 
         <span class="badge bg-success">تایید شده</span>
          @else 
          <span class="badge bg-danger">در انتظار تایید</span>
           @endif 
        </td> <td>
          
              <form action="{{ route('admin.comments.update', $comment) }}" method="POST" style="display:inline;">
                 @csrf
                  @method('PUT')
                   <input type="hidden" name="is_approved" value="{{ $comment->is_approved ? 0 : 1 }}"> 
                   <button type="submit" class="btn btn-warning btn-sm"> {{ $comment->is_approved ? 'لغو تایید' : 'تایید' }} </button>
                 </form>
                  <form action="{{ route('admin.comments.destroy', $comment) }}" method="POST" style="display:inline;">
                     @csrf
                      @method('DELETE') 
                      <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('از حذف این کامنت مطمئن هستید؟')"> حذف </button>
 </form>
 </td>
 </tr>
  @empty
   <tr>
     <td colspan="6" class="text-center"> هیچ کامنتی وجود ندارد. </td>
     </tr>
      @endforelse 
    </tbody>
     </table> {{ $comments->links() }} 