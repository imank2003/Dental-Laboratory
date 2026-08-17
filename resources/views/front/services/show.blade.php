<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $service->title }}</title>

</head>

<body>

    <a href="{{ route('services.index') }}">

        بازگشت به خدمات

    </a>

    <hr>

    <h1>

        {{ $service->title }}

    </h1>

    @if($service->image)

        <img
            src="{{ asset('storage/' . $service->image) }}"
            alt="{{ $service->title }}"
            width="350">

        <br><br>

    @endif

    <h3>

        توضیح کوتاه

    </h3>

    <p>

        {{ $service->short_description }}

    </p>

    <hr>

    <h3>

        توضیحات

    </h3>

    <p>

        {!! nl2br(e($service->description)) !!}

    </p>

</body>

</html>