<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>نمونه کارها</title>

</head>

<body>

    <h1>

        نمونه کارها

    </h1>

    <hr>

    @forelse($portfolios as $portfolio)

        <div>

            @if($portfolio->image)

                <img
                    src="{{ asset('storage/' . $portfolio->image) }}"
                    alt="{{ $portfolio->title }}"
                    width="250">

                <br><br>

            @endif

            <h2>

                <a href="{{ route('portfolios.show', $portfolio->slug) }}">

                    {{ $portfolio->title }}

                </a>

            </h2>

            <p>

                {{ $portfolio->short_description }}

            </p>

            <a href="{{ route('portfolios.show', $portfolio->slug) }}">

                مشاهده نمونه کار

            </a>

        </div>

        <hr>

    @empty

        <p>

            نمونه کاری برای نمایش وجود ندارد.

        </p>

    @endforelse

</body>

</html>