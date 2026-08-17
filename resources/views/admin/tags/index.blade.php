

<div class="container">

    <h2>لیست تگ ها</h2>

    <br>

    <a href="{{ route('admin.tags.create') }}" class="btn btn-primary">
        ایجاد تگ
    </a>

    <br><br>

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
                <th>اسلاگ</th>
                <th>تعداد مقالات</th>
                <th>عملیات</th>
            </tr>

        </thead>

        <tbody>

        @forelse($tags as $tag)

            <tr>

                <td>{{ $loop->iteration }}</td>

                <td>{{ $tag->name }}</td>

                <td>{{ $tag->slug }}</td>

                <td>{{ $tag->articles_count }}</td>

                <td>

              

                    <a href="{{ route('admin.tags.edit', $tag) }}"
                       class="btn btn-warning btn-sm">
                        ویرایش
                    </a>

                    <form action="{{ route('admin.tags.destroy', $tag) }}"
                          method="POST"
                          class="d-inline">

                        @csrf
                        @method('DELETE')

                        <button type="submit"
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('آیا از حذف این تگ مطمئن هستید؟')">

                            حذف

                        </button>

                    </form>

                </td>

            </tr>

        @empty

            <tr>

                <td colspan="5" class="text-center">

                    هیچ تگی ثبت نشده است.

                </td>

            </tr>

        @endforelse

        </tbody>

    </table>

    {{ $tags->links() }}

</div>

