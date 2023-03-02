<?php

use Illuminate\Http\Request;
use App\Helpers\Authenticator;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;

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

Route::get('/developer/login', function () {
    return view('developer.login');
})->name('developer.login');

Route::post('/developer/login', function (Request $request) {
    $validated = Validator::make($request->all(), [
        'username' => 'required|max:64',
        'password' => 'required|max:255'
    ])->validate();

    $authenticator = new Authenticator(config('littlegatekeeper.username'), config('littlegatekeeper.password'), config('littlegatekeeper.sessionKey'), session());
    
    if (!$authenticator->attempt($validated)) {
        session()->flash('flash.danger', __('auth.failed'));
        return redirect()->route('developer.login');
    }

    return redirect()->to('/telescope');
})->name('developer.login.action');

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

    Route::prefix('user')->group(function(){
        Route::get('change-password', function (){
            return view('profile.change-password');
        })->name('change-password');
    
        Route::get('2-factor-authentication', function (){
            return view('profile.2-factor-authentication');
        })->name('2-factor-auth');
    
        Route::get('browser-sessions', function (){
            return view('profile.browser-sessions');
        })->name('browser-sessions');
    });
    
});
