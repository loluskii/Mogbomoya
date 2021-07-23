<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\BankController;

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

Route::prefix('event')->group(function () {

    Route::get('create', function () {
        return view('events.new-event.index');
    })->name('event.index')->middleware('auth');

    Route::post('create', [EventController::class, 'create'])->name('event.create');

    // Route::get('info', function () {
    //     return view('events.info');
    // })->name('event.info');

    Route::get('my-events', [EventController::class, 'index'])->name('user.events')->middleware('auth');

    Route::get('event-info/{slug}', [EventController::class, 'show'])->name('event.info')->middleware('auth');

    Route::post('update-info/{slug}', [EventController::class, 'update'])->name('update.event-info')->middleware('auth');
});

Route::middleware('auth')->prefix('user')->group(function () {

    Route::get('/account', [UserController::class, 'edit'])->name('user.edit')->middleware('auth');

    Route::post('update-user', [UserController::class, 'update'])->name('user.update')->middleware('auth');
    
    Route::post('change-password', [UserController::class, 'changePassword'])->name('user.update.password')->middleware('auth');

    Route::post('deactivate-user', [UserController::class, 'changeActiveStatus'])->name('user.deactivate')->middleware('auth');

    Route::get('bank-details', [BankController::class, 'index'])->name('bank.details')->middleware('auth');

    Route::post('store-bank-details', [BankController::class, 'validateBank'])->name('bank.store')->middleware('auth');

    Route::get('/collections', function () {
        return view('user.collections');
    })->name('user.collections');
});

Route::get('/s=location', function () {
    return view('search.index');
});


Route::get('/payment/callback', [PaymentController::class, 'handleGatewayCallback'])->name('payment.callback');
Route::post('/pay', [PaymentController::class, 'redirectToGateway'])->name('pay');

