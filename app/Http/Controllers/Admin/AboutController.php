<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAboutRequest;
use App\Http\Requests\UpdateAboutRequest;
use App\Models\About;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $about = About::first();
        return view('admin.abouts.index', compact('about'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.abouts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAboutRequest $request)
    {
        $data = $request->validated();


        if ($request->hasFile('image')) {

            $data['image'] = $request
                ->file('image')
                ->store('abouts/images', 'public');
        }


        if ($request->hasFile('video')) {

            $data['video'] = $request
                ->file('video')
                ->store('abouts/videos', 'public');
        }


        About::create($data);


        return redirect()
            ->route('admin.abouts.index')
            ->with('success', 'درباره ما ایجاد شد');
    }

    /**
     * Display the specified resource.
     */
    public function show(About $about)
    {

        return view('admin.abouts.show', compact('about'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(About $about)
    {
        return view('admin.abouts.edit', compact('about'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAboutRequest $request, About $about)
    {
        $data = $request->validated();



        if ($request->hasFile('image')) {


            if ($about->image) {

                Storage::disk('public')
                    ->delete($about->image);
            }


            $data['image'] = $request
                ->file('image')
                ->store('abouts/images', 'public');
        }




        if ($request->hasFile('video')) {


            if ($about->video) {

                Storage::disk('public')
                    ->delete($about->video);
            }


            $data['video'] = $request
                ->file('video')
                ->store('abouts/videos', 'public');
        }




        $about->update($data);



        return redirect()
            ->route('admin.abouts.index')
            ->with('success', 'درباره ما بروزرسانی شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(About $about)
    {
        if ($about->image) {

            Storage::disk('public')
                ->delete($about->image);
        }


        if ($about->video) {

            Storage::disk('public')
                ->delete($about->video);
        }


        $about->delete();



        return redirect()
            ->route('admin.abouts.index');
    }
}
