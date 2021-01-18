<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;

/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| Here you can register the tenant routes for your application.
| These routes are loaded by the TenantRouteServiceProvider.
|
| Feel free to customize them however you want. Good luck!
|
*/

Route::middleware([
    'web',
    InitializeTenancyByDomain::class,
    PreventAccessFromCentralDomains::class,
])->group(function () {
    Route::get('/', function () {
        //dd(auth('web')->user());
        //dd(get_class(request()->user()));
        //dd(\App\Models\User::all());
        return 'This is your multi-tenant application. The id of the current tenant is ' . tenant('id');
    });
});
//Route::middleware([
//    'auth:sanctum',
//    'verified'
//])->get('/dashboard', function () {
//    //return User::all();
//    return Inertia::render('Dashboard');
//})->name('dashboard');
