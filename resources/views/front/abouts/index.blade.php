<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>درباره ما</title>

</head>

<body>

    <h1>درباره ما</h1>

    @if($about)

        <h2>{{ $about->title }}</h2>

        @if($about->image)

            <img
                src="{{ asset('storage/' . $about->image) }}"
                alt="{{ $about->title }}"
                width="400">

        @endif

        @if($about->video)

            <br><br>

            <video width="500" controls>

                <source
                    src="{{ asset('storage/' . $about->video) }}"
                    type="video/mp4">

            </video>

        @endif

        <h3>توضیح کوتاه</h3>

        <p>

            {{ $about->short_description }}

        </p>

        <hr>

        <h3>توضیحات</h3>

        <p>

            {!! nl2br(e($about->description)) !!}

        </p>

    @else

        <p>

            اطلاعاتی برای نمایش وجود ندارد.

        </p>

    @endif

</body>

</html>