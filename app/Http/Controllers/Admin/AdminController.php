<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Appointment;
use App\Models\Article;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\News;
use App\Models\Portfolio;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Tag;
use App\Models\TimeSlot;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('admin.dashboard', [
            'servicesCount'     => Service::count(),
            'portfoliosCount'   => Portfolio::count(),
            'articlesCount'     => Article::count(),
            'tagsCount'         => Tag::count(),
            'appointmentsCount' => Appointment::count(),
            'commentsCount'     => Comment::count(),
            'contactsCount'     => Contact::count(),
            'timeSlotsCount'    => TimeSlot::count(),
            'newsCount'     => News::count(),

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
