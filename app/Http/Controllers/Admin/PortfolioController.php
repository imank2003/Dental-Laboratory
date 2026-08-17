<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePortfolioRequest;
use App\Http\Requests\UpdatePortfolioRequest;
use App\Models\Portfolio;
use App\Models\Service;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $portfolios = Portfolio::with('service')->latest()->paginate(10);
        return view('admin.portfolios.index', compact('portfolios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $services = Service::all();
        return view('admin.portfolios.create', compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePortfolioRequest $request)
    {
        $data = $request->validated();

        $data['slug'] = Str::slug($data['title']);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('portfolios', 'public');
        }

        if ($request->hasFile('video')) {
            $data['video'] = $request->file('video')->store('portfolios', 'public');
        }

        Portfolio::create($data);

        return redirect()
            ->route('admin.portfolios.index')
            ->with('success', 'نمونه کار با موفقیت ایجاد شد.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Portfolio $portfolio)
    {
        return view('admin.portfolios.show', compact('portfolio'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Portfolio $portfolio)
    {
        $services = Service::all();

        return view('admin.portfolios.edit', compact('portfolio', 'services'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePortfolioRequest $request, Portfolio $portfolio)
    {
        $data = $request->validated();

        $data['slug'] = Str::slug($data['title']);

        if ($request->hasFile('image')) {

            if ($portfolio->image) {
                Storage::disk('public')->delete($portfolio->image);
            }

            $data['image'] = $request->file('image')->store('portfolios', 'public');
        }

        if ($request->hasFile('video')) {

            if ($portfolio->video) {
                Storage::disk('public')->delete($portfolio->video);
            }

            $data['video'] = $request->file('video')->store('portfolios', 'public');
        }

        $portfolio->update($data);

        return redirect()
            ->route('admin.portfolios.index')
            ->with('success', 'نمونه کار با موفقیت بروزرسانی شد.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Portfolio $portfolio)
    {
        if ($portfolio->image) {
            Storage::disk('public')->delete($portfolio->image);
        }

        if ($portfolio->video) {
            Storage::disk('public')->delete($portfolio->video);
        }

        $portfolio->delete();

        return redirect()
            ->route('admin.portfolios.index')
            ->with('success', 'نمونه کار با موفقیت حذف شد.');
    }
}
