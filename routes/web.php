<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EventController;
use App\Models\Event;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {

    $events = Event::all()->take(9);

    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
        'events' => $events
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::resource('admin/category', CategoryController::class)->except(['show','edit','update']);
    Route::resource('admin/event', EventController::class);
});

Route::get('event', [EventController::class, 'list'])->name('event.list');
Route::get('event/{event}', [EventController::class, 'display'])->name('event.display');