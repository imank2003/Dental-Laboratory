
<h2>افزودن خدمت جدید</h2>


@if ($errors->any())

    <div class="alert alert-danger">

        <ul>

            @foreach ($errors->all() as $error)

                <li>{{ $error }}</li>

            @endforeach

        </ul>

    </div>

@endif



<form action="{{ route('admin.services.store') }}"
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

        <label>

            <input type="checkbox"
                   name="is_published"
                   value="1"
                   {{ old('is_published') ? 'checked' : '' }}>


            منتشر شود

        </label>

    </div>




    <button type="submit"
            class="btn btn-success">

        ثبت خدمت

    </button>



    <a href="{{ route('admin.services.index') }}"
       class="btn btn-secondary">

        بازگشت

    </a>



</form>

