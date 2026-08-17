
<div class="container">

    <h3>ویرایش تگ</h3>

    <form action="{{ route('admin.tags.update', $tag) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">

            <label>نام تگ</label>

            <input type="text"
                   name="name"
                   class="form-control @error('name') is-invalid @enderror"
                   value="{{ old('name', $tag->name) }}">

            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror

        </div>

        <button type="submit" class="btn btn-primary">
            بروزرسانی
        </button>

        <a href="{{ route('admin.tags.index') }}"
           class="btn btn-secondary">
            بازگشت
        </a>

    </form>

</div>
