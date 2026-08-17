<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Article;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::with('tags')->latest()->paginate(10);
        return view('admin.articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
            $tags = Tag::all();

        return view('admin.articles.create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request)
    {


        $data = $request->validated();

        $data['slug'] = Str::slug($data['title']);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('articles', 'public');
        }

        $article = Article::create($data);

        if ($request->filled('tags')) {
            $article->tags()->attach($request->tags);
        }

        return redirect()
            ->route('admin.articles.index')
            ->with('success', 'مقاله با موفقیت ایجاد شد.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        $article->load('tags');

        return view('admin.articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        $tags = Tag::all();

        return view('admin.articles.edit', compact('article', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {
        $data = $request->validated();

        $data['slug'] = Str::slug($data['title']);

        if ($request->hasFile('image')) {

            if ($article->image) {
                Storage::disk('public')->delete($article->image);
            }

            $data['image'] = $request->file('image')->store('articles', 'public');
        }

        $article->update($data);

        $article->tags()->sync($request->tags ?? []);

        return redirect()
            ->route('admin.articles.index')
            ->with('success', 'مقاله با موفقیت بروزرسانی شد.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        if ($article->image) {
            Storage::disk('public')->delete($article->image);
        }

        $article->tags()->detach();

        $article->delete();

        return redirect()
            ->route('admin.articles.index')
            ->with('success', 'مقاله با موفقیت حذف شد.');
    }
}
