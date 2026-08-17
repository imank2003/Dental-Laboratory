<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\News;
use App\Models\Portfolio;
use App\Models\Service;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('q');

        if (!$keyword) {
            return view('front.search.index', [
                'services' => [],
                'articles' => [],
                'news' => [],
                'portfolios' => []
            ]);
        }


        $services = Service::where('title', 'like', "%$keyword%")
            ->orWhere('description', 'like', "%$keyword%")
            ->where('is_published', true)
            ->get();


        $articles = Article::where('title', 'like', "%$keyword%")
            ->orWhere('description', 'like', "%$keyword%")
            ->where('is_published', true)
            ->get();


        $news = News::where('title', 'like', "%$keyword%")
            ->orWhere('description', 'like', "%$keyword%")
            ->where('is_published', true)
            ->get();


        $portfolios = Portfolio::where('title', 'like', "%$keyword%")
            ->orWhere('description', 'like', "%$keyword%")
            ->where('is_published', true)
            ->get();


        return view('front.search.index', compact(
            'keyword',
            'services',
            'articles',
            'news',
            'portfolios'
        ));
    }
}