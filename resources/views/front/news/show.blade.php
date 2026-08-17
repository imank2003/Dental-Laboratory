<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $news->title }}</title>

</head>

<body>

    <a href="{{ route('news.index') }}">

        بازگشت به اخبار

    </a>

    <hr>

    <h1>

        {{ $news->title }}

    </h1>

    @if($news->image)

        <img
            src="{{ asset('storage/' . $news->image) }}"
            alt="{{ $news->title }}"
            width="400">

        <br><br>

    @endif

    <h3>

        توضیح کوتاه

    </h3>

    <p>

        {{ $news->short_description }}

    </p>

    <hr>

    <h3>

        متن خبر

    </h3>

    <p>

        {!! nl2br(e($news->description)) !!}

    </p>

</body>

</html>