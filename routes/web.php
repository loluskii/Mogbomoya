<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\CollectionController;
use App\Http\Requests\EmailVerificationRequest;

// use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

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

Route::get('/', [PagesController::class, 'index'])->name('index.view');

Route::get('/sign-up', function () {
    return view('auth.sign-up');
});

Route::get('interests', [PagesController::class, 'interests']);

Route::post('sign-up', [RegisterController::class, 'register'])->name('register');

Route::post('login', [LoginController::class, 'authenticate'])->name('login');

Route::get('/login', function () {

    return view('auth.login');

})->name('login.view');

Route::get('oauth/{driver}', [RegisterController::class, 'redirectToProvider'])->name('social.oauth');

Route::get('oauth/{driver}/callback', [RegisterController::class, 'handleProviderCallback'])->name('social.callback');

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::get('update/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfillUpdateEmail();

    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify.update');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('succeess', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::middleware('guest')->group(function () {
    Route::get('/auth/new-password/{token?}', function (Request $request) {
        return view('auth.new-password', ['token' => $request->token, 'email' => $request->email]);
    })->name('password.reset');

    Route::get('/auth/reset-password', function () {
        return view('auth.reset-password');
    })->name('password.request');;

    Route::post('reset-password', [ForgotPasswordController::class, 'sendEmail'])->name('user.reset.password');

    Route::post('password-update', [ForgotPasswordController::class, 'updatePassword'])->name('user.password.update');
});

Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/terms-and-condition', function () {
    return view('tandc');
});

Route::get('/privacy-policy', function () {
    return view('privacy');
});
Route::get('/s=location', function () {
    return view('search.index');
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

Route::get('/admin', function () {
    return view('admin.index');
});


Route::middleware(['auth','verified'])->group(function () {

    Route::prefix('event')->group(function () {

        Route::get('create', [EventController::class, 'index'])->name('event.index');

        Route::post('create', [EventController::class, 'create'])->name('event.create');

        Route::post('register/{event_id}', [EventController::class, 'register'])->name('event.register');

        Route::get('payment-callback', [EventController::class, 'handleCallback'])->name('event.payment.callback');

        Route::get('my-events', [EventController::class, 'myEvents'])->name('user.events');

        Route::get('event-info/{slug}', [EventController::class, 'show'])->name('event.info');

        Route::post('update-info/{slug}', [EventController::class, 'update'])->name('update.event-info');

        Route::post('send-note/{slug}', [EventController::class, 'sendNote'])->name('event.send-note');

        Route::get('add-to-collection/{event_reference}/{collection_reference}', [EventController::class, 'addToCollection'])->name('event.add_to_collection');
    });

    Route::middleware('auth')->prefix('user')->group(function () {

        Route::get('/account', [UserController::class, 'edit'])->name('user.edit');

        Route::post('update-user', [UserController::class, 'update'])->name('user.update');

        Route::post('update-user-interest', [UserController::class, 'updateInterest'])->name('user.interests.update');
        
        Route::post('change-password', [UserController::class, 'changePassword'])->name('user.update.password');

        Route::post('change-email', [UserController::class, 'changeEmail'])->name('user.update.email');

        Route::post('deactivate-user', [UserController::class, 'changeActiveStatus'])->name('user.deactivate');

        Route::get('bank-details', [BankController::class, 'index'])->name('bank.details');

        Route::post('store-bank-details', [BankController::class, 'validateBank'])->name('bank.store');

        Route::prefix('collections')->group(function () {
            Route::get('/', [CollectionController::class, 'index'])->name('user.collections');

            Route::post('/', [CollectionController::class, 'create'])->name('collection.store');

            Route::get('collection-info/{slug}', [CollectionController::class, 'show'])->name('collection.info');

        });

    });

    Route::get('events-near-me', [EventController::class, 'eventsNearMe'])->name('events.near');

    Route::any('search', [EventController::class, 'search'])->name('search');

});
