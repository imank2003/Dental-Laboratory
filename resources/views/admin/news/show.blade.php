

<h2>نمایش خبر</h2>

<table class="table table-bordered">

    <tr>
        <th style="width: 200px;">عنوان</th>
        <td>{{ $news->title }}</td>
    </tr>

    <tr>
        <th>اسلاگ</th>
        <td>{{ $news->slug }}</td>
    </tr>

    <tr>
        <th>توضیح کوتاه</th>
        <td>{{ $news->short_description }}</td>
    </tr>

    <tr>
        <th>توضیحات</th>
        <td style="white-space: pre-line;">
            {{ $news->description }}
        </td>
    </tr>

    <tr>
        <th>تصویر</th>
        <td>

            @if($news->image)

                <img src="{{ asset('storage/' . $news->image) }}"
                     alt="{{ $news->title }}"
                     width="250">

            @else

                تصویری ثبت نشده است.

            @endif

        </td>
    </tr>

    <tr>
        <th>وضعیت</th>
        <td>

            @if($news->is_published)

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
        <td>{{ $news->created_at?->format('Y/m/d H:i') }}</td>
    </tr>

    <tr>
        <th>آخرین بروزرسانی</th>
        <td>{{ $news->updated_at?->format('Y/m/d H:i') }}</td>
    </tr>

</table>

<a href="{{ route('admin.news.index') }}"
   class="btn btn-secondary">
    بازگشت
</a>

<a href="{{ route('admin.news.edit', $news) }}"
   class="btn btn-warning">
    ویرایش
</a>

<form action="{{ route('admin.news.destroy', $news) }}"
      method="POST"
      style="display:inline;">

    @csrf
    @method('DELETE')

    <button type="submit"
            class="btn btn-danger"
            onclick="return confirm('آیا از حذف این خبر مطمئن هستید؟')">

        حذف

    </button>

</form>
