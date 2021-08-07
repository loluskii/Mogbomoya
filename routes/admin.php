<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\EventController;

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

    Route::prefix('user')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('users.index');
        Route::get('edit/{id}', [UserController::class, 'edit'])->name('users.edit');
        Route::post('{id}', [UserController::class, 'update'])->name('users.update');
        Route::get('delete/{id}', [UserController::class, 'delete'])->name('users.delete');
        Route::get('restore/{id}', [UserController::class, 'restore'])->name('users.restore');
    });

    Route::get('transactions', [TransactionController::class, 'index'])->name('transactions.index');
    Route::prefix('events')->group(function () {

        Route::get('/', [EventController::class, 'index'])->name('events.index');
        Route::get('registrations/{id}', [EventController::class, 'registrations'])->name('event.registrations');
    });


});