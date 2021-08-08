<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\InterestController;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('admin.auth.login');
})->name('login.view');

Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::post('login', [LoginController::class, 'authenticate'])->name('login');


Route::middleware('admin')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('users')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('users.index');
        Route::get('deleted', [UserController::class, 'deletedUsers'])->name('users.deleted');
        Route::get('deactivated', [UserController::class, 'deactivatedUsers'])->name('users.deactivated');
        Route::get('edit/{id}', [UserController::class, 'edit'])->name('user.edit');
        Route::post('{id}', [UserController::class, 'update'])->name('user.update');
        Route::get('delete/{id}', [UserController::class, 'delete'])->name('user.delete');
        Route::get('restore/{id}', [UserController::class, 'restore'])->name('user.restore');
    });

    Route::get('transactions', [TransactionController::class, 'index'])->name('transactions.index');

    Route::prefix('events')->group(function () {
        Route::get('/', [EventController::class, 'index'])->name('events.index');
        Route::get('registrations/{id}', [EventController::class, 'registrations'])->name('event.registrations');
    });

    Route::prefix('interests')->group(function () {
        Route::get('/', [InterestController::class, 'index'])->name('interests.index');
        Route::post('/', [InterestController::class, 'store'])->name('interest.store');
        Route::post('update/{id}', [InterestController::class, 'update'])->name('interest.update');
        Route::get('delete/{id}', [InterestController::class, 'delete'])->name('interest.delete');
        Route::get('restore/{id}', [InterestController::class, 'restore'])->name('interest.restore');
    });
});
