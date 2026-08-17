

<h2>ویرایش تنظیمات سایت</h2>

<a href="{{ route('admin.dashboard') }}">بازگشت</a>
<br>
<br>

@if ($errors->any())

    <div class="alert alert-danger">

        <ul>

            @foreach ($errors->all() as $error)

                <li>{{ $error }}</li>

            @endforeach

        </ul>

    </div>

@endif



@if(session('success'))

    <div class="alert alert-success">

        {{ session('success') }}

    </div>

@endif



<form action="{{ route('admin.settings.update') }}"
      method="POST"
      enctype="multipart/form-data">


    @csrf
    @method('PUT')



    <div class="mb-3">

        <label>شماره تماس</label>

        <input type="text"
               name="phone"
               class="form-control"
               value="{{ old('phone', $setting->phone) }}">

    </div>



    <div class="mb-3">

        <label>ایمیل</label>

        <input type="email"
               name="email"
               class="form-control"
               value="{{ old('email', $setting->email) }}">

    </div>



    <div class="mb-3">

        <label>اینستاگرام</label>

        <input type="text"
               name="instagram"
               class="form-control"
               value="{{ old('instagram', $setting->instagram) }}">

    </div>



    <div class="mb-3">

        <label>تلگرام</label>

        <input type="text"
               name="telegram"
               class="form-control"
               value="{{ old('telegram', $setting->telegram) }}">

    </div>



    <div class="mb-3">

        <label>واتساپ</label>

        <input type="text"
               name="whatsapp"
               class="form-control"
               value="{{ old('whatsapp', $setting->whatsapp) }}">

    </div>



    <div class="mb-3">

        <label>آدرس</label>

        <textarea name="address"
                  class="form-control"
                  rows="3">{{ old('address', $setting->address) }}</textarea>

    </div>



    <div class="mb-3">

        <label>متن فوتر</label>

        <textarea name="footer_text"
                  class="form-control"
                  rows="3">{{ old('footer_text', $setting->footer_text) }}</textarea>

    </div>



    <div class="mb-3">

        <label>لوگوی فعلی</label>

        <br>

        @if($setting->logo)

            <img src="{{ asset('storage/'.$setting->logo) }}"
                 width="150">

        @else

            <p>لوگویی ثبت نشده است.</p>

        @endif

    </div>



    <div class="mb-3">

        <label>لوگوی جدید</label>

        <input type="file"
               name="logo"
               class="form-control">

    </div>



    <button type="submit"
            class="btn btn-primary">

        ذخیره تنظیمات

    </button>


</form>

