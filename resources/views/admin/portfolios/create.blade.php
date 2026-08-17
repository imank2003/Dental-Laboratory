
<h2>افزودن نمونه کار</h2>

@if ($errors->any())

    <div class="alert alert-danger">

        <ul>

            @foreach ($errors->all() as $error)

                <li>{{ $error }}</li>

            @endforeach

        </ul>

    </div>

@endif

<form action="{{ route('admin.portfolios.store') }}"
      method="POST"
      enctype="multipart/form-data">

    @csrf

    <div class="mb-3">

        <label>عنوان</label>

        <input type="text"
               name="title"
               class="form-control"
               value="{{ old('title') }}">

    </div>

    <div class="mb-3">

        <label>خدمت</label>

        <select name="service_id" class="form-control">

            <option value="">انتخاب خدمت</option>

            @foreach($services as $service)

                <option value="{{ $service->id }}"
                    {{ old('service_id') == $service->id ? 'selected' : '' }}>

                    {{ $service->title }}

                </option>

            @endforeach

        </select>

    </div>

    <div class="mb-3">

        <label>توضیح کوتاه</label>

        <textarea name="short_description"
                  class="form-control"
                  rows="3">{{ old('short_description') }}</textarea>

    </div>

    <div class="mb-3">

        <label>توضیحات</label>

        <textarea name="description"
                  class="form-control"
                  rows="6">{{ old('description') }}</textarea>

    </div>

    <div class="mb-3">

        <label>تصویر</label>

        <input type="file"
               name="image"
               class="form-control">

    </div>

    <div class="mb-3">

        <label>ویدئو</label>

        <input type="file"
               name="video"
               class="form-control">

    </div>

    <div class="mb-3">

        <label>

            <input type="checkbox"
                   name="is_published"
                   value="1"
                   {{ old('is_published') ? 'checked' : '' }}>

            منتشر شود

        </label>

    </div>

    <button type="submit" class="btn btn-success">

        ثبت نمونه کار

    </button>

    <a href="{{ route('admin.portfolios.index') }}"
       class="btn btn-secondary">

        بازگشت

    </a>

</form>
