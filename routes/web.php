<?php

use Illuminate\Support\Facades\Route;

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
    return redirect()->route('login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('users', App\Http\Livewire\Admin\User\Index::class)->name('user.index');
    Route::get('users/add', App\Http\Livewire\Admin\User\Create::class)->name('user.add');
    Route::get('users/{user}', App\Http\Livewire\Admin\User\Show::class)->name('user.show');
    Route::get('users/{user}/edit', App\Http\Livewire\Admin\User\Create::class)->name('user.edit');
});
