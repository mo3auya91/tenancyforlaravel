<?php

use App\Models\Tenant;
use App\Models\User;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/create', function () {
    $tenant1 = Tenant::create(['id' => 'foo']);
    $tenant1->domains()->create(['domain' => 'foo.' . env('APP_BASE_URL')]);

    $tenant2 = Tenant::create(['id' => 'bar']);
    $tenant2->domains()->create(['domain' => 'bar.' . env('APP_BASE_URL')]);

    $tenant3 = Tenant::create(['id' => 'moauya']);
    $tenant3->domains()->create(['domain' => 'moauya.tk']);

    Tenant::all()->runForEach(function () {
        User::factory()->create();
    });
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    //return User::all();
    return Inertia::render('Dashboard');
})->name('dashboard');
