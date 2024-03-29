<?php

use App\Helpers\Authenticator;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return to_route('login');
});

Route::get('/developer/login', App\Http\Livewire\Developer\Login::class)->name('developer.login');
Route::get('/developer/dashboard', App\Http\Livewire\Developer\Dashboard::class)->name('developer.dashboard');
Route::get('/developer/logout', function(){
    $authenticator = new Authenticator(config('littlegatekeeper.username'), config('littlegatekeeper.password'), config('littlegatekeeper.sessionKey'), session());
    $authenticator->logout();
    return redirect()->route('developer.login');
})->name('developer.logout');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('customers', App\Http\Livewire\Admin\Customer\Index::class)->name('customer.index');
    Route::get('customers/{customer}', App\Http\Livewire\Admin\Customer\Show::class)->name('customer.show');

    Route::prefix('user')->group(function () {
        Route::get('change-password', function () {
            return view('profile.change-password');
        })->name('change-password');

        Route::get('2-factor-authentication', function () {
            return view('profile.2-factor-authentication');
        })->name('2-factor-auth');

        Route::get('browser-sessions', function () {
            return view('profile.browser-sessions');
        })->name('browser-sessions');
    });
});