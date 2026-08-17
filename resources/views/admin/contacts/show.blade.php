

<h2>جزئیات پیام ارتباط با ما</h2>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<table class="table table-bordered">

    <tr>
        <th style="width:200px;">نام</th>
        <td>{{ $contact->name }}</td>
    </tr>

    <tr>
        <th>تلفن</th>
        <td>{{ $contact->phone }}</td>
    </tr>

    <tr>
        <th>ایمیل</th>
        <td>{{ $contact->email }}</td>
    </tr>

    <tr>
        <th>موضوع</th>
        <td>{{ $contact->subject }}</td>
    </tr>

    <tr>
        <th>متن پیام</th>
        <td style="white-space: pre-line;">
            {{ $contact->message }}
        </td>
    </tr>

    <tr>
        <th>تاریخ ثبت</th>
        <td>{{ $contact->created_at->format('Y/m/d H:i') }}</td>
    </tr>

</table>

<a href="{{ route('admin.contacts.index') }}" class="btn btn-secondary">
    بازگشت
</a>

<form action="{{ route('admin.contacts.destroy', $contact) }}"
      method="POST"
      style="display:inline;">

    @csrf
    @method('DELETE')

    <button type="submit"
            class="btn btn-danger"
            onclick="return confirm('آیا از حذف این پیام مطمئن هستید؟')">

        حذف

    </button>

</form>
