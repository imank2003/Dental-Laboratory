<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>خدمات</title>

</head>

<body>

<div style="background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; padding: 15px; margin-botton:20px;border-radius:5px;">
    {{ session('success') }}
</div>

    <h1>خدمات ما</h1>

    <hr>

    @forelse($services as $service)

        <div>

            @if($service->image)

                <img
                    src="{{ asset('storage/' . $service->image) }}"
                    alt="{{ $service->title }}"
                    width="250">

                <br><br>

            @endif

            <h2>

                <a href="{{ route('services.show', $service->slug) }}">

                    {{ $service->title }}

                </a>

            </h2>

            <p>

                {{ $service->short_description }}

            </p>

        </div>

        <hr>

    @empty

        <p>

            هیچ خدمتی برای نمایش وجود ندارد.

        </p>

    @endforelse



    <h2>ثبت نظر</h2>

    <form action="{{ route('comments.store') }}" method="POST">

        @csrf

        <div>

            <label>

                نام و نام خانوادگی

            </label>

            <br>

            <input
                type="text"
                name="full_name"
                value="{{ old('full_name') }}">

            @error('full_name')

                <p>{{ $message }}</p>

            @enderror

        </div>

        <br>

        <div>

            <label>

                ایمیل

            </label>

            <br>

            <input
                type="email"
                name="email"
                value="{{ old('email') }}">

            @error('email')

                <p>{{ $message }}</p>

            @enderror

        </div>

        <br>

        <div>

            <label>

                متن نظر

            </label>

            <br>

            <textarea
                name="content"
                rows="5"
                cols="50">{{ old('content') }}</textarea>

            @error('content')

                <p>{{ $message }}</p>

            @enderror

        </div>

        <br>

        <button type="submit">

            ثبت نظر

        </button>

    </form>



    <hr>

    <h2>نظرات کاربران</h2>

    @forelse($comments as $comment)

        <div>

            <strong>

                {{ $comment->full_name }}

            </strong>

            <br><br>

            <p>

                {{ $comment->content }}

            </p>

        </div>

        <hr>

    @empty

        <p>

            هنوز نظری ثبت نشده است.

        </p>

    @endforelse

</body>

</html>