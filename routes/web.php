<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
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
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

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

Route::get('/events/new-event', function () {
    return view('events.new-event.index');
});

Route::get('/events/info', function () {
    return view('events.info');
});

Route::get('/sign-up', function () {
    return view('auth.sign-up');
});

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('oauth/{driver}', [LoginController::class, 'redirectToProvider'])->name('social.oauth');

Route::get('oauth/{driver}/callback', [LoginController::class, 'handleProviderCallback'])->name('social.callback');

Route::get('/auth/new-password', function () {
    return view('auth.new-password');
});
