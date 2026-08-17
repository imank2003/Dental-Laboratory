

<h2>پیام‌های ارتباط با ما</h2>

<a href="{{ route('admin.dashboard') }}">بازگشت</a>
<br>
<br>

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
            <th>تلفن</th>
            <th>ایمیل</th>
            <th>موضوع</th>
            <th>تاریخ ثبت</th>
            <th>عملیات</th>
        </tr>
    </thead>

    <tbody>

    @forelse($contacts as $contact)

        <tr>

            <td>{{ $loop->iteration }}</td>

            <td>{{ $contact->name }}</td>

            <td>{{ $contact->phone }}</td>

            <td>{{ $contact->email }}</td>

            <td>{{ $contact->subject }}</td>

            <td>{{ $contact->created_at->format('Y/m/d') }}</td>

            <td>

                <a href="{{ route('admin.contacts.show', $contact) }}" class="btn btn-info btn-sm">
                    نمایش
                </a>

                <form action="{{ route('admin.contacts.destroy', $contact) }}"
                      method="POST"
                      style="display:inline;">

                    @csrf
                    @method('DELETE')

                    <button type="submit"
                            class="btn btn-danger btn-sm"
                            onclick="return confirm('آیا از حذف این پیام مطمئن هستید؟')">

                        حذف

                    </button>

                </form>

            </td>

        </tr>

    @empty

        <tr>
            <td colspan="7" class="text-center">
                هیچ پیامی ثبت نشده است.
            </td>
        </tr>

    @endforelse

    </tbody>

</table>

{{ $contacts->links() }}

