

<div class="container">

    <h3 class="mb-4">ویرایش درباره ما</h3>

    <form action="{{ route('admin.abouts.update', $about) }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf
        @method('PUT')

        {{-- عنوان --}}
        <div class="mb-3">
            <label class="form-label">عنوان</label>

            <input type="text"
                   name="title"
                   class="form-control @error('title') is-invalid @enderror"
                   value="{{ old('title', $about->title) }}">

            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- توضیح کوتاه --}}
        <div class="mb-3">
            <label class="form-label">توضیح کوتاه</label>

            <textarea name="short_description"
                      rows="3"
                      class="form-control @error('short_description') is-invalid @enderror">{{ old('short_description', $about->short_description) }}</textarea>

            @error('short_description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- توضیحات --}}
        <div class="mb-3">
            <label class="form-label">توضیحات</label>

            <textarea name="description"
                      rows="6"
                      class="form-control @error('description') is-invalid @enderror">{{ old('description', $about->description) }}</textarea>

            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- تصویر --}}
        <div class="mb-3">
            <label class="form-label">تصویر</label>

            @if($about->image)
                <div class="mb-2">
                    <img src="{{ asset('storage/'.$about->image) }}"
                         width="200"
                         class="img-thumbnail">
                </div>
            @endif

            <input type="file"
                   name="image"
                   class="form-control @error('image') is-invalid @enderror">

            @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- ویدئو --}}
        <div class="mb-3">
            <label class="form-label">ویدئو</label>

            @if($about->video)
                <div class="mb-2">
                    <video width="300" controls>
                        <source src="{{ asset('storage/'.$about->video) }}" type="video/mp4">
                    </video>
                </div>
            @endif

            <input type="file"
                   name="video"
                   class="form-control @error('video') is-invalid @enderror">

            @error('video')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- وضعیت انتشار --}}
        <div class="mb-3">
            <label class="form-label">وضعیت انتشار</label>

            <select name="is_published"
                    class="form-select @error('is_published') is-invalid @enderror">

                <option value="1"
                    {{ old('is_published', $about->is_published) ? 'selected' : '' }}>
                    منتشر شود
                </option>

                <option value="0"
                    {{ !old('is_published', $about->is_published) ? 'selected' : '' }}>
                    پیش‌نویس
                </option>

            </select>

            @error('is_published')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button class="btn btn-warning">
            بروزرسانی
        </button>

    </form>

</div>

