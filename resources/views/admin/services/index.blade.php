
<h2>لیست خدمات</h2>



<a href="{{ route('admin.dashboard') }}">بازگشت</a>
<br>
<br>

<a href="{{ route('admin.services.create') }}" class="btn btn-primary mb-3">
    افزودن خدمت
</a>

@if(session('success'))

    <div class="alert alert-success">
        {{ session('success') }}
    </div>

@endif

@if(session('error'))

    <div class="alert alert-danger">
        {{ session('error') }}
    </div>

@endif


<table class="table table-bordered">

    <thead>

        <tr>
            <th>#</th>
            <th>تصویر</th>
            <th>عنوان</th>
            <th>توضیح کوتاه</th>
            <th>وضعیت</th>
            <th>تاریخ ثبت</th>
            <th>عملیات</th>
        </tr>

    </thead>


    <tbody>

    @forelse($services as $service)

        <tr>

            <td>
                {{ $loop->iteration }}
            </td>


            <td>

                @if($service->image)

                    <img src="{{ asset('storage/'.$service->image) }}"
                         width="80"
                         height="60"
                         alt="{{ $service->title }}">

                @else

                    ----

                @endif

            </td>


            <td>
                {{ $service->title }}
            </td>


            <td>
                {{ Str::limit($service->short_description, 50) }}
            </td>


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


            <td>
                {{ $service->created_at?->format('Y/m/d') }}
            </td>


            <td>

                <a href="{{ route('admin.services.show', $service) }}"
                   class="btn btn-info btn-sm">
                    نمایش
                </a>


                <a href="{{ route('admin.services.edit', $service) }}"
                   class="btn btn-warning btn-sm">
                    ویرایش
                </a>


                <form action="{{ route('admin.services.destroy', $service) }}"
                      method="POST"
                      style="display:inline;">

                    @csrf
                    @method('DELETE')


                    <button type="submit"
                            class="btn btn-danger btn-sm"
                            onclick="return confirm('آیا از حذف این خدمت مطمئن هستید؟')">

                        حذف

                    </button>

                </form>

            </td>

        </tr>


    @empty

        <tr>

            <td colspan="7" class="text-center">
                هیچ خدمتی ثبت نشده است.
            </td>

        </tr>

    @endforelse


    </tbody>

</table>


{{ $services->links() }}

