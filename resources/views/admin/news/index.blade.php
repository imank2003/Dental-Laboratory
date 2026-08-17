
<h2>لیست اخبار</h2>

<a href="{{ route('admin.dashboard') }}">بازگشت</a>
<br>
<br>

<a href="{{ route('admin.news.create') }}" class="btn btn-primary mb-3">
    افزودن خبر
</a>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<table class="table table-bordered">

    <thead>
        <tr>
            <th>#</th>
            <th>تصویر</th>
            <th>عنوان</th>
            <th>وضعیت</th>
            <th>تاریخ ثبت</th>
            <th>عملیات</th>
        </tr>
    </thead>

    <tbody>

    @forelse($news as $item)

        <tr>

            <td>{{ $loop->iteration }}</td>

            <td>

                @if($item->image)

                    <img src="{{ asset('storage/'.$item->image) }}"
                         width="80"
                         height="60"
                         alt="{{ $item->title }}">

                @else

                    ----

                @endif

            </td>

            <td>{{ $item->title }}</td>

            <td>

                @if($item->is_published)

                    <span class="badge bg-success">
                        منتشر شده
                    </span>

                @else

                    <span class="badge bg-danger">
                        پیش نویس
                    </span>

                @endif

            </td>

            <td>{{ $item->created_at->format('Y/m/d') }}</td>

            <td>

                <a href="{{ route('admin.news.show',$item) }}"
                   class="btn btn-info btn-sm">
                    نمایش
                </a>

                <a href="{{ route('admin.news.edit',$item) }}"
                   class="btn btn-warning btn-sm">
                    ویرایش
                </a>

                <form action="{{ route('admin.news.destroy',$item) }}"
                      method="POST"
                      style="display:inline;">

                    @csrf
                    @method('DELETE')

                    <button type="submit"
                            class="btn btn-danger btn-sm"
                            onclick="return confirm('آیا از حذف این خبر مطمئن هستید؟')">

                        حذف

                    </button>

                </form>

            </td>

        </tr>

    @empty

        <tr>

            <td colspan="6" class="text-center">
                هیچ خبری ثبت نشده است.
            </td>

        </tr>

    @endforelse

    </tbody>

</table>

{{ $news->links() }}
