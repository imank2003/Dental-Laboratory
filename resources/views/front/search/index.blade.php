<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>نتایج جستجو</title>
</head>

<body>

<h1>
    نتایج جستجو برای:
    {{ $keyword ?? '' }}
</h1>


<hr>


@if(count($services))

    <h2>خدمات</h2>

    @foreach($services as $service)

    @if ($service->slug)
        
    <div>
        
        <h3>
            <a href="{{ route('services.show', $service->slug) }}">
                {{ $service->title }}
            </a>
        </h3>
        
        <p>
            {{ $service->short_description }}
        </p>
        
    </div>
    
    @else
{{ $service->title }}    
    @endif
    @endforeach



@endif



@if(count($articles))

    <h2>مقالات</h2>

    @foreach($articles as $article)
  

@if ($article->slug)
    

<div>
<h3>
                <a href="{{ route('articles.show', $article->slug) }}">
                    {{ $article->title }}
                </a>
            </h3>

            <p>
                {{ $article->short_description }}
            </p>
            
        </div>
        @else
        {{ $article->slug }}
        @endif

    @endforeach
    
@endif



@if(count($news))

    <h2>اخبار</h2>

    @foreach($news as $item)

@if ($item->slug)
    

<div>

    <h3>
                <a href="{{ route('news.show', $item->slug) }}">
                    {{ $item->title }}
                </a>
            </h3>

            <p>
                {{ $item->short_description }}
            </p>
            
        </div>
        @else
        {{ $item->slug }}
        @endif
    @endforeach

@endif



@if(count($portfolios))

    <h2>نمونه کارها</h2>

    @foreach($portfolios as $portfolio)
@if ($portfolio->slug)
    
<div>
    
            <h3>
                <a href="{{ route('portfolios.show', $portfolio->slug) }}">
                    {{ $portfolio->title }}
                </a>
            </h3>

            <p>
                {{ $portfolio->short_description }}
            </p>
            
        </div>
        @else
        {{ $portfolio->slug }}
        @endif
    @endforeach

@endif



@if(
    !count($services) &&
    !count($articles) &&
    !count($news) &&
    !count($portfolios)
)

    <h3>
        نتیجه‌ای پیدا نشد.
    </h3>

@endif


</body>

<form action="{{ route('search') }}" method="GET">

    <input 
        type="text" 
        name="q"
        value="{{ $keyword ?? '' }}"
        placeholder="جستجو کنید..."
    >

    <button type="submit">
        جستجو
    </button>

</form>

<hr>

</html>