<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>اخبار</title>

</head>

<body>

    <h1>

        اخبار

    </h1>

    <hr>

    @forelse($news as $item)

        <div>

            @if($item->image)

                <img
                    src="{{ asset('storage/' . $item->image) }}"
                    alt="{{ $item->title }}"
                    width="250">

                <br><br>

            @endif

            <h2>

                <a href="{{ route('news.show', $item->slug) }}">

                    {{ $item->title }}

                </a>

            </h2>

            <p>

                {{ $item->short_description }}

            </p>

            <a href="{{ route('news.show', $item->slug) }}">

                مشاهده خبر

            </a>

        </div>

        <hr>

    @empty

        <p>

            خبری برای نمایش وجود ندارد.

        </p>

    @endforelse

</body>

</html>