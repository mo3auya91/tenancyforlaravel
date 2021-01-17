<?php

use App\Models\Tenant;
use App\Models\User;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
//    $tenant1 = Tenant::create(['id' => 'foo']);
//    $tenant1->domains()->create(['domain' => 'foo.'.env('APP_BASE_URL')]);
//
//    $tenant2 = Tenant::create(['id' => 'bar']);
//    $tenant2->domains()->create(['domain' => 'bar.'.env('APP_BASE_URL')]);
//
//    Tenant::all()->runForEach(function () {
//        User::factory()->create();
//    });

    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');
