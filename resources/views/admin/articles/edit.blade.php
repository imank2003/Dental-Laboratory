

<div class="container">

    <h2>ویرایش مقاله</h2>

    <form action="{{ route('admin.articles.update', $article) }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf
        @method('PUT')

        {{-- عنوان --}}
        <div class="mb-3">
            <label>عنوان</label>
            <input type="text"
                   name="title"
                   class="form-control"
                   value="{{ old('title', $article->title) }}">
        </div>

        {{-- تصویر --}}
        <div class="mb-3">
            <label>تصویر</label>

            @if($article->image)
                <br>
                <img src="{{ asset('storage/' . $article->image) }}"
                     width="200">
                <br><br>
            @endif

            <input type="file"
                   name="image"
                   class="form-control">
        </div>

        {{-- توضیح کوتاه --}}
        <div class="mb-3">
            <label>توضیح کوتاه</label>

            <textarea name="short_description"
                      class="form-control"
                      rows="3">{{ old('short_description', $article->short_description) }}</textarea>
        </div>

        {{-- توضیحات --}}
        <div class="mb-3">
            <label>توضیحات</label>

            <textarea name="description"
                      class="form-control"
                      rows="6">{{ old('description', $article->description) }}</textarea>
        </div>

        {{-- تگ ها --}}
        <div class="mb-3">
            <label>تگ ها</label>

            @foreach($tags as $tag)

                <div>

                    <label>

                        <input type="checkbox"
                               name="tags[]"
                               value="{{ $tag->id }}"

                        {{ in_array($tag->id, old('tags', $article->tags->pluck('id')->toArray()))
                            ? 'checked'
                            : '' }}>

                        {{ $tag->name }}

                    </label>

                </div>

            @endforeach

        </div>

        {{-- وضعیت انتشار --}}
        <div class="mb-3">

            <label>وضعیت انتشار</label>

            <select name="is_published"
                    class="form-control">

                <option value="1"
                    {{ old('is_published', $article->is_published) == 1 ? 'selected' : '' }}>
                    منتشر شود
                </option>

                <option value="0"
                    {{ old('is_published', $article->is_published) == 0 ? 'selected' : '' }}>
                    پیش نویس
                </option>

            </select>

        </div>

        <button type="submit"
                class="btn btn-primary">
            بروزرسانی
        </button>

        <a href="{{ route('admin.articles.index') }}"
           class="btn btn-secondary">
            بازگشت
        </a>

    </form>

</div>

