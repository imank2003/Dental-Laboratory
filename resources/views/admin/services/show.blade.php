
<h2>نمایش خدمت</h2>


<table class="table table-bordered">


    <tr>
        <th style="width: 200px;">عنوان</th>
        <td>{{ $service->title }}</td>
    </tr>


    <tr>
        <th>اسلاگ</th>
        <td>{{ $service->slug }}</td>
    </tr>


    <tr>
        <th>توضیح کوتاه</th>
        <td>
            {{ $service->short_description }}
        </td>
    </tr>


    <tr>
        <th>توضیحات</th>

        <td style="white-space: pre-line;">
            {{ $service->description }}
        </td>
    </tr>


    <tr>
        <th>تصویر</th>

        <td>

            @if($service->image)

                <img src="{{ asset('storage/'.$service->image) }}"
                     width="250"
                     alt="{{ $service->title }}">

            @else

                تصویری ثبت نشده است.

            @endif

        </td>

    </tr>


    <tr>
        <th>وضعیت</th>

        <td>

            @if($service->is_published)

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

        <td>
            {{ $service->created_at?->format('Y/m/d H:i') }}
        </td>

    </tr>


    <tr>
        <th>آخرین بروزرسانی</th>

        <td>
            {{ $service->updated_at?->format('Y/m/d H:i') }}
        </td>

    </tr>


</table>


<a href="{{ route('admin.services.index') }}"
   class="btn btn-secondary">

    بازگشت

</a>


<a href="{{ route('admin.services.edit', $service) }}"
   class="btn btn-warning">

    ویرایش

</a>


<form action="{{ route('admin.services.destroy', $service) }}"
      method="POST"
      style="display:inline;">


    @csrf
    @method('DELETE')


    <button type="submit"
            class="btn btn-danger"
            onclick="return confirm('آیا از حذف این خدمت مطمئن هستید؟')">

        حذف

    </button>


</form>

