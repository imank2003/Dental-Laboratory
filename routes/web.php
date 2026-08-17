<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\TrashController as AdminTrashController;
use App\Http\Controllers\Admin\ServiceController as AdminServiceController;
use App\Http\Controllers\Admin\AboutController as AdminAboutController;
use App\Http\Controllers\Admin\AdminController as AdminController;
use App\Http\Controllers\Admin\AppointmentController as AdminAppointmentController;
use App\Http\Controllers\Admin\ArticleController as AdminArticleController;
use App\Http\Controllers\Admin\CommentController as AdminCommentController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\PortfolioController as AdminPortfolioController;
use App\Http\Controllers\Admin\TimeSlotController as AdminTimeSlotController;
use App\Http\Controllers\Admin\ProfileController as AdminProfileController;
use App\Http\Controllers\Admin\TagController as AdminTagController;
use App\Http\Controllers\Admin\SettingController as AdminSettingController;

use App\Http\Controllers\Front\ServiceController as FrontServiceController;
use App\Http\Controllers\Front\AboutController as FrontAboutController;
use App\Http\Controllers\Front\AppointmentController as FrontAppointmentController;
use App\Http\Controllers\Front\ArticleController as FrontArticleController;
use App\Http\Controllers\Front\CommentController as FrontCommentController;
use App\Http\Controllers\Front\ContactController as FrontContactController;
use App\Http\Controllers\Front\NewsController as FrontNewsController;
use App\Http\Controllers\Front\PortfolioController as FrontPortfolioController;
use App\Http\Controllers\Front\DentalController as FrontDentalController;
use App\Http\Controllers\Front\SearchController as FrontSearchController;
use PHPUnit\Metadata\Group;



Route::prefix('admin')->middleware('auth')->name('admin.')->group(function () {
    Route::resource('services', AdminServiceController::class);
    Route::resource('articles', AdminArticleController::class);
    Route::resource('comments', AdminCommentController::class);
    Route::resource('contacts', AdminContactController::class);
    Route::resource('news', AdminNewsController::class);
    Route::resource('portfolios', AdminPortfolioController::class);
    Route::resource('time-slots', AdminTimeSlotController::class);
    Route::resource('abouts', AdminAboutController::class);
    Route::resource('appointments', AdminAppointmentController::class);
    Route::resource('tags', AdminTagController::class);
    Route::get('/settings/edit', [AdminSettingController::class, 'edit'])->name('settings.edit');
    Route::put('/settings/update', [AdminSettingController::class, 'update'])->name('settings.update');



    Route::prefix('trash')->name('trash.')->group(function () {

        Route::get('/', [AdminTrashController::class, 'index'])
            ->name('index');


        Route::patch('/{type}/{id}/restore', [AdminTrashController::class, 'restore'])
            ->name('restore');


        Route::delete('/{type}/{id}/force-delete', [AdminTrashController::class, 'forceDelete'])
            ->name('forceDelete');
    });
});


Route::get('/admin/dashboard', [AdminController::class, 'index'])->middleware(['auth', 'verified'])->name('admin.dashboard');

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/profile', [AdminProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [AdminProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [AdminProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::middleware('guest')->group(function () {
    Route::get('/', [FrontDentalController::class, 'index']);
    Route::get('/about', [FrontAboutController::class, 'index'])->name('about.index');

    Route::get('/services', [FrontServiceController::class, 'index'])->name('services.index');
    Route::get('/services/{slug}', [FrontServiceController::class, 'show'])->name('services.show');

    Route::post('/comments', [FrontCommentController::class, 'store'])->name('comments.store')->middleware('throttle:3,1');

    Route::get('/articles', [FrontArticleController::class, 'index'])->name('articles.index');
    Route::get('/articles/{slug}', [FrontArticleController::class, 'show'])->name('articles.show');

    Route::get('/contacts', [FrontcontactController::class, 'index'])->name('contacts.index');
    Route::post('/contacts', [FrontcontactController::class, 'store'])->name('contacts.store')->middleware('throttle:5,1');

    Route::get('/news', [FrontnewsController::class, 'index'])->name('news.index');
    Route::get('/news/{slug}', [FrontnewsController::class, 'show'])->name('news.show');

    Route::get('/portfolios', [FrontPortfolioController::class, 'index'])->name('portfolios.index');
    Route::get('/portfolios/{slug}', [FrontPortfolioController::class, 'show'])->name('portfolios.show');

    Route::get('/appointments', [FrontAppointmentController::class, 'index'])
        ->name('appointments.index');

    Route::post('/appointments', [FrontAppointmentController::class, 'store'])
        ->name('appointments.store')->middleware('throttle:5,1');

    Route::post('/appointments/time-slots', [FrontAppointmentController::class, 'getAvailableTimeSlots'])
        ->name('appointments.time-slots')->middleware('throttle:30,1');

    Route::get('/search', [FrontSearchController::class, 'index'])
        ->name('search')->middleware('throttle:15,1');
});






