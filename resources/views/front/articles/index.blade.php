<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>مقالات</title>

</head>

<body>

    <h1>مقالات</h1>

    <hr>

    @forelse($articles as $article)

        <div>

            @if($article->image)

                <img
                    src="{{ asset('storage/' . $article->image) }}"
                    alt="{{ $article->title }}"
                    width="250">

                <br><br>

            @endif

            <h2>

                <a href="{{ route('articles.show', $article->slug) }}">

                    {{ $article->title }}

                </a>

            </h2>

            <p>

                {{ $article->short_description }}

            </p>

            <a href="{{ route('articles.show', $article->slug) }}">

                مطالعه مقاله

            </a>

        </div>

        <hr>

    @empty

        <p>

            مقاله‌ای برای نمایش وجود ندارد.

        </p>

    @endforelse

</body>

</html>