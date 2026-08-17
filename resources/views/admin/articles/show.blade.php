

<div class="container">

    <h2>جزئیات مقاله</h2>

    <hr>

    <p>
        <strong>عنوان:</strong>
        {{ $article->title }}
    </p>

    <p>
        <strong>اسلاگ:</strong>
        {{ $article->slug }}
    </p>

    <p>
        <strong>تصویر:</strong><br>

        @if($article->image)
            <img src="{{ asset('storage/' . $article->image) }}"
                 width="250">
        @else
            تصویری وجود ندارد.
        @endif
    </p>

    <p>
        <strong>توضیح کوتاه:</strong><br>
        {{ $article->short_description }}
    </p>

    <p>
        <strong>توضیحات:</strong><br>
        {{ $article->description }}
    </p>

    <p>
        <strong>وضعیت:</strong>

        @if($article->is_published)
            منتشر شده
        @else
            پیش‌نویس
        @endif
    </p>

    <p>
        <strong>تگ‌ها:</strong>

        @forelse($article->tags as $tag)
            <span>{{ $tag->name }}</span>
        @empty
            <span>بدون تگ</span>
        @endforelse
    </p>

    <a href="{{ route('admin.articles.index') }}"
       class="btn btn-secondary">
        بازگشت
    </a>

    <a href="{{ route('admin.articles.edit', $article) }}"
       class="btn btn-warning">
        ویرایش
    </a>

</div>

