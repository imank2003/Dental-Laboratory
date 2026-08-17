<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>ارتباط با ما</title>

</head>

<body>

    <h1>

        ارتباط با ما

    </h1>

    <hr>

    @if(session('success'))

        <p>

            {{ session('success') }}

        </p>

        <hr>

    @endif



    <h2>

        اطلاعات تماس

    </h2>

    <p>

        <strong>تلفن:</strong>

        {{ $setting->phone }}

    </p>

    <p>

        <strong>ایمیل:</strong>

        {{ $setting->email }}

    </p>

    <p>

        <strong>اینستاگرام:</strong>

        {{ $setting->instagram }}

    </p>

    <p>

        <strong>تلگرام:</strong>

        {{ $setting->telegram }}

    </p>

    <p>

        <strong>واتساپ:</strong>

        {{ $setting->whatsapp }}

    </p>

    <p>

        <strong>آدرس:</strong>

        {{ $setting->address }}

    </p>

    <hr>

    <h2>

        فرم ارسال پیام

    </h2>

    <form action="{{ route('contacts.store') }}" method="POST">

        @csrf

        <div>

            <label>

                نام

            </label>

            <br>

            <input
                type="text"
                name="name"
                value="{{ old('name') }}">

            @error('name')

                <p>{{ $message }}</p>

            @enderror

        </div>

        <br>

        <div>

            <label>

                شماره تماس

            </label>

            <br>

            <input
                type="text"
                name="phone"
                value="{{ old('phone') }}">

            @error('phone')

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

                موضوع

            </label>

            <br>

            <input
                type="text"
                name="subject"
                value="{{ old('subject') }}">

            @error('subject')

                <p>{{ $message }}</p>

            @enderror

        </div>

        <br>

        <div>

            <label>

                پیام

            </label>

            <br>

            <textarea
                name="message"
                rows="6"
                cols="50">{{ old('message') }}</textarea>

            @error('message')

                <p>{{ $message }}</p>

            @enderror

        </div>

        <br>

        <button type="submit">

            ارسال پیام

        </button>

    </form>

</body>

</html>