<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $article->title }}</title>

</head>

<body>

    <a href="{{ route('articles.index') }}">

        بازگشت به مقالات

    </a>

    <hr>

    <h1>

        {{ $article->title }}

    </h1>

    @if($article->image)

        <img
            src="{{ asset('storage/' . $article->image) }}"
            alt="{{ $article->title }}"
            width="400">

        <br><br>

    @endif

    <h3>

        توضیح کوتاه

    </h3>

    <p>

        {{ $article->short_description }}

    </p>

    <hr>

    <h3>

        متن مقاله

    </h3>

    <p>

        {!! nl2br(e($article->description)) !!}

    </p>

    @if($article->tags->count())

        <hr>

        <h3>

            برچسب‌ها

        </h3>

        @foreach($article->tags as $tag)

            <span>

                {{ $tag->name }}

            </span>

        @endforeach

    @endif

</body>

</html>