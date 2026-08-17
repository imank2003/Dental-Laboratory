

<h2>ویرایش نمونه کار</h2>

@if ($errors->any())

    <div class="alert alert-danger">

        <ul>

            @foreach ($errors->all() as $error)

                <li>{{ $error }}</li>

            @endforeach

        </ul>

    </div>

@endif

<form action="{{ route('admin.portfolios.update', $portfolio) }}"
      method="POST"
      enctype="multipart/form-data">

    @csrf
    @method('PUT')

    <div class="mb-3">

        <label>عنوان</label>

        <input type="text"
               name="title"
               class="form-control"
               value="{{ old('title', $portfolio->title) }}">

    </div>

    <div class="mb-3">

        <label>خدمت</label>

        <select name="service_id" class="form-control">

            @foreach($services as $service)

                <option value="{{ $service->id }}"
                    {{ old('service_id', $portfolio->service_id) == $service->id ? 'selected' : '' }}>

                    {{ $service->title }}

                </option>

            @endforeach

        </select>

    </div>

    <div class="mb-3">

        <label>توضیح کوتاه</label>

        <textarea name="short_description"
                  class="form-control"
                  rows="3">{{ old('short_description', $portfolio->short_description) }}</textarea>

    </div>

    <div class="mb-3">

        <label>توضیحات</label>

        <textarea name="description"
                  class="form-control"
                  rows="6">{{ old('description', $portfolio->description) }}</textarea>

    </div>

    <div class="mb-3">

        <label>تصویر فعلی</label>

        <br>

        @if($portfolio->image)

            <img src="{{ asset('storage/'.$portfolio->image) }}"
                 width="180">

        @else

            <p>تصویری ثبت نشده است.</p>

        @endif

    </div>

    <div class="mb-3">

        <label>تصویر جدید</label>

        <input type="file"
               name="image"
               class="form-control">

    </div>

    <div class="mb-3">

        <label>ویدئوی فعلی</label>

        <br>

        @if($portfolio->video)

            <video width="250" controls>
                <source src="{{ asset('storage/'.$portfolio->video) }}">
            </video>

        @else

            <p>ویدئویی ثبت نشده است.</p>

        @endif

    </div>

    <div class="mb-3">

        <label>ویدئوی جدید</label>

        <input type="file"
               name="video"
               class="form-control">

    </div>

<div>

    <label>وضعیت انتشار</label>

    <br><br>

    <input
        type="radio"
        name="is_published"
        value="1"
        {{ old('is_published', $portfolio->is_published) == 1 ? 'checked' : '' }}>

    <label>منتشر شود</label>

    <br>

    <input
        type="radio"
        name="is_published"
        value="0"
        {{ old('is_published', $portfolio->is_published) == 0 ? 'checked' : '' }}>

    <label>منتشر نشود</label>

</div>
    <button type="submit" class="btn btn-primary">

        بروزرسانی

    </button>

    <a href="{{ route('admin.portfolios.index') }}"
       class="btn btn-secondary">

        بازگشت

    </a>

</form>
