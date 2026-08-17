
<h2>ویرایش خدمت</h2>


@if ($errors->any())

    <div class="alert alert-danger">

        <ul>

            @foreach ($errors->all() as $error)

                <li>{{ $error }}</li>

            @endforeach

        </ul>

    </div>

@endif



<form action="{{ route('admin.services.update', $service) }}"
      method="POST"
      enctype="multipart/form-data">


    @csrf
    @method('PUT')



    <div class="mb-3">

        <label>عنوان</label>

        <input type="text"
               name="title"
               class="form-control"
               value="{{ old('title', $service->title) }}">

    </div>



    <div class="mb-3">

        <label>توضیح کوتاه</label>

        <textarea name="short_description"
                  class="form-control"
                  rows="3">{{ old('short_description', $service->short_description) }}</textarea>

    </div>



    <div class="mb-3">

        <label>توضیحات</label>

        <textarea name="description"
                  class="form-control"
                  rows="6">{{ old('description', $service->description) }}</textarea>

    </div>



    <div class="mb-3">

        <label>تصویر فعلی</label>

        <br>

        @if($service->image)

            <img src="{{ asset('storage/'.$service->image) }}"
                 width="180"
                 alt="{{ $service->title }}">

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



<div>

    <label>وضعیت انتشار</label>

    <br><br>

    <input
        type="radio"
        name="is_published"
        value="1"
        {{ old('is_published', $service->is_published) == 1 ? 'checked' : '' }}>

    <label>منتشر شود</label>

    <br>

    <input
        type="radio"
        name="is_published"
        value="0"
        {{ old('is_published', $service->is_published) == 0 ? 'checked' : '' }}>

    <label>منتشر نشود</label>

</div>




    <button type="submit"
            class="btn btn-primary">

        بروزرسانی

    </button>



    <a href="{{ route('admin.services.index') }}"
       class="btn btn-secondary">

        بازگشت

    </a>



</form>

