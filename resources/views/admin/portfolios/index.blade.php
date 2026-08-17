
<h2>لیست نمونه کارها</h2>

<a href="{{ route('admin.dashboard') }}">بازگشت</a>
<br>
<br>

<a href="{{ route('admin.portfolios.create') }}" class="btn btn-primary mb-3">
    افزودن نمونه کار
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
            <th>خدمت</th>
            <th>وضعیت</th>
            <th>تاریخ ثبت</th>
            <th>عملیات</th>
        </tr>
    </thead>

    <tbody>

    @forelse($portfolios as $portfolio)

        <tr>

            <td>{{ $loop->iteration }}</td>

            <td>

                @if($portfolio->image)

                    <img src="{{ asset('storage/' . $portfolio->image) }}"
                         width="80"
                         height="60"
                         alt="{{ $portfolio->title }}">

                @else

                    ----

                @endif

            </td>

            <td>{{ $portfolio->title }}</td>

            <td>{{ $portfolio->service->title ?? '-' }}</td>

            <td>

                @if($portfolio->is_published)

                    <span class="badge bg-success">
                        منتشر شده
                    </span>

                @else

                    <span class="badge bg-danger">
                        پیش‌نویس
                    </span>

                @endif

            </td>

            <td>{{ $portfolio->created_at?->format('Y/m/d') }}</td>

            <td>

                <a href="{{ route('admin.portfolios.show', $portfolio) }}"
                   class="btn btn-info btn-sm">
                    نمایش
                </a>

                <a href="{{ route('admin.portfolios.edit', $portfolio) }}"
                   class="btn btn-warning btn-sm">
                    ویرایش
                </a>

                <form action="{{ route('admin.portfolios.destroy', $portfolio) }}"
                      method="POST"
                      style="display:inline;">

                    @csrf
                    @method('DELETE')

                    <button type="submit"
                            class="btn btn-danger btn-sm"
                            onclick="return confirm('آیا از حذف این نمونه کار مطمئن هستید؟')">

                        حذف

                    </button>

                </form>

            </td>

        </tr>

    @empty

        <tr>

            <td colspan="7" class="text-center">
                هیچ نمونه کاری ثبت نشده است.
            </td>

        </tr>

    @endforelse

    </tbody>

</table>

{{ $portfolios->links() }}
