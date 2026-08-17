<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $portfolio->title }}</title>

</head>

<body>

    <a href="{{ route('portfolios.index') }}">

        بازگشت به نمونه کارها

    </a>

    <hr>

    <h1>

        {{ $portfolio->title }}

    </h1>

    @if($portfolio->image)

        <img
            src="{{ asset('storage/' . $portfolio->image) }}"
            alt="{{ $portfolio->title }}"
            width="400">

        <br><br>

    @endif

    @if($portfolio->video)

        <video width="500" controls>

            <source
                src="{{ asset('storage/' . $portfolio->video) }}"
                type="video/mp4">

            مرورگر شما از پخش ویدئو پشتیبانی نمی‌کند.

        </video>

        <br><br>

    @endif

    <h3>

        توضیح کوتاه

    </h3>

    <p>

        {{ $portfolio->short_description }}

    </p>

    <hr>

    <h3>

        توضیحات

    </h3>

    <p>

        {!! nl2br(e($portfolio->description)) !!}

    </p>

    <h3>{{ $portfolio->title }}</h3>

<p>{{ $portfolio->short_description }}</p>

<p>
    خدمت:
    <a href="{{ route('services.show', $portfolio->service->slug) }}">
        {{ $portfolio->service->title }}
    </a>
</p>

<a href="{{ route('portfolios.show', $portfolio->slug) }}">
    مشاهده نمونه کار
</a>

</body>

</html>