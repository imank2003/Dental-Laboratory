
<h2>نمایش نمونه کار</h2>

<table class="table table-bordered">

    <tr>
        <th style="width: 200px;">عنوان</th>
        <td>{{ $portfolio->title }}</td>
    </tr>

    <tr>
        <th>اسلاگ</th>
        <td>{{ $portfolio->slug }}</td>
    </tr>

    <tr>
        <th>خدمت</th>
        <td>{{ $portfolio->service->title ?? '-' }}</td>
    </tr>

    <tr>
        <th>توضیح کوتاه</th>
        <td>{{ $portfolio->short_description }}</td>
    </tr>

    <tr>
        <th>توضیحات</th>
        <td style="white-space: pre-line;">
            {{ $portfolio->description }}
        </td>
    </tr>

    <tr>
        <th>تصویر</th>
        <td>

            @if($portfolio->image)

                <img src="{{ asset('storage/' . $portfolio->image) }}"
                     width="250"
                     alt="{{ $portfolio->title }}">

            @else

                تصویری ثبت نشده است.

            @endif

        </td>
    </tr>

    <tr>
        <th>ویدئو</th>
        <td>

            @if($portfolio->video)

                <video width="350" controls>
                    <source src="{{ asset('storage/' . $portfolio->video) }}">
                    مرورگر شما از پخش ویدئو پشتیبانی نمی‌کند.
                </video>

            @else

                ویدئویی ثبت نشده است.

            @endif

        </td>
    </tr>

    <tr>
        <th>وضعیت</th>
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
    </tr>

    <tr>
        <th>تاریخ ثبت</th>
        <td>{{ $portfolio->created_at?->format('Y/m/d H:i') }}</td>
    </tr>

    <tr>
        <th>آخرین بروزرسانی</th>
        <td>{{ $portfolio->updated_at?->format('Y/m/d H:i') }}</td>
    </tr>

</table>

<a href="{{ route('admin.portfolios.index') }}"
   class="btn btn-secondary">
    بازگشت
</a>

<a href="{{ route('admin.portfolios.edit', $portfolio) }}"
   class="btn btn-warning">
    ویرایش
</a>

<form action="{{ route('admin.portfolios.destroy', $portfolio) }}"
      method="POST"
      style="display:inline;">

    @csrf
    @method('DELETE')

    <button type="submit"
            class="btn btn-danger"
            onclick="return confirm('آیا از حذف این نمونه کار مطمئن هستید؟')">

        حذف

    </button>

</form>
