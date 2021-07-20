<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;

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

Route::get('/', [PagesController::class, 'index']);

Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/terms-and-condition', function () {
    return view('tandc');
});

Route::get('/privacy-policy', function () {
    return view('privacy');
});

Route::get('/faq', function () {
    return view('help-center.faq');
});

Route::get('/help-center', function () {
    return view('help-center.help-center');
});

Route::get('/site-map', function () {
    return view('site-map');
});

Route::get('/event/create', function () {
    return view('events.new-event.index');
});

Route::get('/events/info', function () {
    return view('events.info');
});

Route::get('/sign-up', function () {
    return view('auth.sign-up');
});

Route::post('sign-up', [RegisterController::class, 'register'])->name('register');

Route::post('login', [LoginController::class, 'authenticate'])->name('login');

Route::get('/login', function () {
    return view('auth.login');
})->name('login.view');

Route::get('oauth/{driver}', [RegisterController::class, 'redirectToProvider'])->name('social.oauth');

Route::get('oauth/{driver}/callback', [RegisterController::class, 'handleProviderCallback'])->name('social.callback');


Route::get('/auth/new-password', function () {
    return view('auth.new-password');
});

Route::get('/auth/reset-password', function () {
    return view('auth.reset-password');
});

Route::get('/account', function () {
    return view('user.index');
});

Route::get('/user/bank-details', function () {
    return view('user.bank-details');
});

Route::get('/collections', function () {
    return view('user.collections');
});

Route::get('/my-events', function () {
    return view('user.my-events');
});

Route::get('/s=location', function () {
    return view('search.index');
});

