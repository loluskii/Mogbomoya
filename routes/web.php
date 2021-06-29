<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;

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
    return view('welcome');
});

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
});

Route::get('/auth/new-password', function () {
    return view('auth.new-password');
});




Route::get('/page', [PagesController::class, 'index']);
