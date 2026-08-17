<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
    <div class="container">
        
        <div class="card">
            
            <div class="card-header">
                <h4>ایجاد مقاله</h4>
            </div>
            
            <div class="card-body">
                
                <form action="{{ route('admin.articles.store') }}"
                method="POST"
                enctype="multipart/form-data">
                
                @csrf
                
                {{-- عنوان --}}
                <div class="mb-3">
                    <label for="title" class="form-label">عنوان</label>
                    
                    <input
                    type="text"
                    id="title"
                    name="title"
                    class="form-control @error('title') is-invalid @enderror"
                    value="{{ old('title') }}">
                    
                    @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                
                {{-- تصویر --}}
                <div class="mb-3">
                    <label for="image" class="form-label">تصویر</label>
                    
                    <input
                    type="file"
                    id="image"
                    name="image"
                    class="form-control @error('image') is-invalid @enderror">
                    
                    @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                
                {{-- توضیح کوتاه --}}
                <div class="mb-3">
                    <label for="short_description" class="form-label">
                        توضیح کوتاه
                    </label>
                    
                    <textarea
                    id="short_description"
                    name="short_description"
                    rows="3"
                    class="form-control @error('short_description') is-invalid @enderror">{{ old('short_description') }}</textarea>
                    
                    @error('short_description')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                
                {{-- توضیحات --}}
                <div class="mb-3">
                    <label for="description" class="form-label">
                        توضیحات
                    </label>
                    
                    <textarea
                    id="description"
                    name="description"
                    rows="6"
                    class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                    
                    @error('description')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                
                {{-- تگ‌ها --}}
                <div class="mb-3">
                    <label for="tags" class="form-label">
                        تگ‌ها
                    </label>
                    
                    <select
                    id="tags"
                    name="tags[]"
                    class="form-select @error('tags') is-invalid @enderror"
                    multiple>
                    
                    @foreach($tags as $tag)
                    
                    <option
                    value="{{ $tag->id }}"
                    {{ in_array($tag->id, old('tags', [])) ? 'selected' : '' }}>
                    
                                {{ $tag->name }}
                                
                            </option>
                            
                            @endforeach
                            
                        </select>
                        
                        @error('tags')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    {{-- وضعیت انتشار --}}
                    <div class="mb-4">
                        <label for="is_published" class="form-label">
                            وضعیت انتشار
                        </label>
                        
                        <select
                        id="is_published"
                        name="is_published"
                        class="form-select">
                        
                        <option value="1"
                        {{ old('is_published') == 1 ? 'selected' : '' }}>
                        منتشر شود
                    </option>
                    
                    <option value="0"
                    {{ old('is_published', 0) == 0 ? 'selected' : '' }}>
                    پیش‌نویس
                </option>
                
            </select>
        </div>
        
        <button type="submit" class="btn btn-primary">
            ثبت مقاله
        </button>
        
        <a href="{{ route('admin.articles.index') }}"
        class="btn btn-secondary">
        انصراف
    </a>
    
</form>

</div>

</div>

</div>




</body>
</html>