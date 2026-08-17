

<div class="container">

    <div class="card">

        <div class="card-header">
            <h3>ایجاد تگ</h3>
        </div>

        <div class="card-body">

            <form action="{{ route('admin.tags.store') }}" method="POST">

                @csrf

                <div class="mb-3">

                    <label class="form-label">
                        نام تگ
                    </label>

                    <input
                        type="text"
                        name="name"
                        class="form-control @error('name') is-invalid @enderror"
                        value="{{ old('name') }}"
                        placeholder="نام تگ را وارد کنید">

                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <button type="submit" class="btn btn-primary">
                    ثبت
                </button>

                <a href="{{ route('admin.tags.index') }}"
                   class="btn btn-secondary">
                    بازگشت
                </a>

            </form>

        </div>

    </div>

</div>
